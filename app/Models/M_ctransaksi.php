<?php

namespace App\Models;

use App\Controllers\ClientTransaksi;
use CodeIgniter\Model;

class M_ctransaksi extends Model
{
    protected $table      = 'client_transaksi';
    protected $primaryKey = 'client_transaksi_id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_time';
    protected $updatedField  = 'updated_time';
    protected $allowedFields = ['client_transaksi_date_start', 'client_id', 'client_transaksi_date_finish', 'created_by', 'updated_by', 'status'];

    public function getclient()
    {
        return  $this->db->table('client')
            ->join('client_transaksi', 'client_transaksi.client_id=client.client_id')
            ->join('setting', 'setting.id=client_transaksi.client_transaksi_id')
            ->get()->getResultArray();
    }

    public function pembaruan($id)
    {
        return $this->table('client_transaksi')
            ->select('client_transaksi_date_start')
            ->where(['client_transaksi_id' => $id])
            ->get()->getResult();
    }
    public function pembaruan1($id)
    {
        return $this->table('client_transaksi')
            ->select('client_transaksi_date_finish')
            ->where(['client_transaksi_id' => $id])
            ->get()->getResult();
    }
}
