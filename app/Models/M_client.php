<?php

namespace App\Models;

use CodeIgniter\Model;

class M_client extends Model
{


    protected $table      = 'client';
    protected $primaryKey = 'client_id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_time';
    protected $updatedField  = 'updated_time';
    protected $allowedFields = ['client_kode', 'client_nama', 'client_website', 'client_no_telp', 'client_no_wa', 'client_email', 'client_keterangan', 'client_tgl_daftar', 'created_by', 'updated_by', 'status'];


    public function gettabel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['client_id' => $id])->first();
    }
    public function tabel()
    {
        return  $this->db->table('client')->selectCount('client_nama')
            ->get()->getResult();
    }
    public function customerperbulan($tahun)
    {
        $data = [
            [
                'label' => 'januari',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '01'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],
            [
                'label' => 'februari',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '02'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],
            [
                'label' => 'maret',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '03'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],
            [
                'label' => 'april',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '04'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],
            [
                'label' => 'mei',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '05'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],
            [
                'label' => 'juni',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '06'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'juli',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '07'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'agustus',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '08'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'september',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '09'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'oktober',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '10'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'november',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '11'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ], [
                'label' => 'desember',
                'jumlah' => $this->db->table('client')->where([('year(client.client_tgl_daftar)') => $tahun])
                    ->where([('Month(client.client_tgl_daftar)') => '12'])
                    ->selectCount('client_tgl_daftar')
                    ->get()
                    ->getResult()
            ],

        ];
        return $data;
    }
}
