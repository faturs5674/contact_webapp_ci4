<?php

namespace App\Controllers;

use App\Models\M_client;

class client extends BaseController
{
    protected $m_client;
    public function __construct()
    {
        $this->m_client = new M_client();
    }
    public function index()
    {
        // $id = 7;
        $data = [
            // 'tabel' => $this->m_client->where(['client_id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('/client/tabel', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('/client/create', $data);
    }
    public function validation()
    {
        if (!$this->validate(
            [
                'client_kode'    => 'required|is_unique[client.client_kode]',
                'client_nama'   => 'required|is_unique[client.client_nama]',
                'client_website' => 'required|is_unique[client.client_website]',
                'client_no_telp' => 'required|is_unique[client.client_no_telp]|numeric',
                'client_no_wa' => 'required|is_unique[client.client_no_wa]|numeric',
                'client_email' => 'required|is_unique[client.client_email]',
                'client_keterangan' => 'required',
                'client_tgl_daftar' => 'required',
                'status_create' => 'required'
            ]
        )) {
            $validator = \Config\Services::validation();
            $data = [
                'error' => [
                    'client_kode' => $validator->getError('client_kode'),
                    'client_nama' => $validator->getError('client_nama'),
                    'client_website' => $validator->getError('client_website'),
                    'client_no_telp' => $validator->getError('client_no_telp'),
                    'client_no_wa' => $validator->getError('client_no_wa'),
                    'client_email' => $validator->getError('client_email'),
                    'client_keterangan' => $validator->getError('client_keterangan'),
                    'client_tgl_daftar' => $validator->getError('client_tgl_daftar'),
                    'status_create' => $validator->getError('status_create')
                ]

            ];
            echo json_encode($data);
        } else {
            $this->m_client->save([
                'client_kode' => $this->request->getVar('client_kode'),
                'client_nama' => $this->request->getVar('client_nama'),
                'client_website' => $this->request->getVar('client_website'),
                'client_no_telp' => $this->request->getVar('client_no_telp'),
                'client_no_wa' => $this->request->getVar('client_no_wa'),
                'client_email' => $this->request->getVar('client_email'),
                'client_keterangan' => $this->request->getVar('client_keterangan'),
                'client_tgl_daftar' => $this->request->getVar('client_tgl_daftar'),
                'created_by' => session()->get('user_id'),
                'status' => $this->request->getVar('status_create')
            ]);
            echo json_encode('sukses');
        }
    }


    public function get_tabel($id)
    {
        $tabel = $this->m_client->where(['client_id' => $id])->first();
        echo json_encode($tabel);
    }

    public function hupdate()
    {
        if (!$this->validate(
            [
                'client_kode_update'    => 'required',
                'client_nama_update'   => 'required',
                'client_website_update' => 'required',
                'client_no_telp_update' => 'required|numeric',
                'client_no_wa_update' => 'required|numeric',
                'client_email_update' => 'required',
                'client_keterangan_update' => 'required',
                'datepicker_update' => 'required',
                'status_update' => 'required'
            ]
        )) {
            $validator = \Config\Services::validation();
            $data = [
                'error' => [
                    'client_kode' => $validator->getError('client_kode_update'),
                    'client_nama' => $validator->getError('client_nama_update'),
                    'client_website' => $validator->getError('client_website_update'),
                    'client_no_telp' => $validator->getError('client_no_telp_update'),
                    'client_no_wa' => $validator->getError('client_no_wa_update'),
                    'client_email' => $validator->getError('client_email_update'),
                    'client_keterangan_update' => $validator->getError('client_keterangan_update'),
                    'client_tgl_daftar' => $validator->getError('datepicker_update'),
                    'status' => $validator->getError('status_update')
                ]

            ];
            echo json_encode($data);
        } else {
            $this->m_client->save([
                'client_id' => $this->request->getVar('client_id_update'),
                'client_kode' => $this->request->getVar('client_kode_update'),
                'client_nama' => $this->request->getVar('client_nama_update'),
                'client_website' => $this->request->getVar('client_website_update'),
                'client_no_telp' => $this->request->getVar('client_no_telp_update'),
                'client_no_wa' => $this->request->getVar('client_no_wa_update'),
                'client_email' => $this->request->getVar('client_email_update'),
                'client_keterangan' => $this->request->getVar('client_keterangan_update'),
                'client_tgl_daftar' => $this->request->getVar('datepicker_update'),
                'updated_by' => session()->get('user_id'),
                'status' => $this->request->getVar('status_update')
            ]);
            echo json_encode('sukses');
        }
    }
    public function delete($id)
    {
        $data =  $this->m_client->delete($id);
        if ($data) {
            print_r(json_encode(array('status' => true, 'msg' => 'berhasil dihapus!')));
        } else {
            print_r(json_encode(array('status' => false, 'msg' => 'gagal dihapus!')));
        }
    }

    public function dt_users()
    {
        $data = $this->m_client->findAll();
        foreach ($data as $key => $value) {
            $data[$key]['client_id'] = '<div class="d-block text-nowrap">';
            $data[$key]['client_id'] .= "<button  onclick=\"edit($value[client_id])\"id=\"$value[client_id]\"class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></button>";
            $data[$key]['client_id'] .= "<button  onclick=\"hapus($value[client_id])\"id=\"$value[client_id]\" class=\"ml-1 btn btn-danger\"><i class=\"fa fa-trash\"></i></button>";
            $data[$key]['client_id'] .= "<button onclick=\"transaksi($value[client_id])\"id=\"$value[client_id]\"class=\"ml-1 btn btn-success\"><i class=\"fa fa-plus\"></i></button>";
            $data[$key]['client_id'] .= '</div>';
        }
        echo json_encode($data);
    }
}
