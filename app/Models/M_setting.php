<?php

namespace App\Models;

use App\Controllers\ClientTransaksi;
use CodeIgniter\Model;
use PhpParser\Node\Stmt\Echo_;

class M_setting extends Model
{
    protected $table      = 'setting';
    protected $primaryKey = 'id';
    protected $dateFormat = 'datetime';
    protected $allowedFields = ['set_invoice_cooldown', 'set_email', 'set_wa', 'set_keterangan_perpanjangan'];

    public function exp()
    {
        return  $this->db->table('setting')
            ->where(['set_invoice_cooldown <=' => 0])
            ->selectCount('set_invoice_cooldown')
            ->get()
            ->getResult();
    }
    public function voice($id)
    {
        return $this->table('setting')->select('set_invoice_cooldown')->where(['id' => $id])->get()->getResult();
    }

    public function gmail($id)
    {
        $w = $this->table('setting')->select('set_email')->where(['id' => $id])->get()->getResult();
        $e = $this->table('setting')->select('set_invoice_cooldown')->where(['id' => $id])->get()->getResult();
        $waktu = $e[0]->set_invoice_cooldown;

        $data = [
            'durasi' => $waktu
        ];
        $el =  view('/template/email', $data);

        $email_smtp = \Config\Services::email();
        $email_smtp->setFrom("rahmanfaturaja123@gmail.com", "blitaris");
        $email_smtp->setTo($w[0]->set_email);
        $email_smtp->setSubject("PEMBERITAHUAN");
        $email_smtp->setMessage($el);
        $email_smtp->send();
    }
    public function wa($id)
    {
        $wwaktu = $this->table('setting')->select('set_invoice_cooldown')->where(['id' => $id])->get()->getResult();
        $waktu = $wwaktu[0]->set_invoice_cooldown;
        $no = $this->table('setting')->select('set_wa')->where(['id' => $id])->get()->getResult();
        $isi = "masa sewa website anda tinggal $waktu hari ";
        $no1 = $no[0]->set_wa;
        echo "<script>window.open('https://api.whatsapp.com/send?phone=$no1&text=$isi&source=&data=','_blank')</script>";
    }
    public function API($method, $url, $data)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }
}
