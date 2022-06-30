<?php

namespace App\Controllers;

use \App\Models\M_akun;


class Akun extends BaseController
{
    protected $m_akun;
    public function __construct()
    {
        $this->m_akun = new M_akun();
    }
    public function index()
    {
        return view('/akun/tabel');
    }
    public function read()
    {
        $data = $this->m_akun->findAll();
        foreach ($data as $key => $value) {
            $data[$key]['id'] = '<div class="d-block text-nowrap">';
            $data[$key]['id'] .= "<button onclick=\"edit($value[id])\"id=\"$value[id]\"class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></button>";
            $data[$key]['id'] .= "<button onclick=\"hapus($value[id])\"id=\"$value[id]\"class=\"ml-1 btn btn-danger\"><i class=\"fa fa-trash\"></i></button>";
            $data[$key]['id'] .= '</div>';
        }
        echo json_encode($data);
    }
    public function create()
    {
        if (!$this->validate([
            'nama_create' => 'required|is_unique[akun.nama]',
            'username_create' => 'required',
            'password_create' => 'required',
            'nohp_create' => 'required',
            'email_create' => 'required'
        ])) {
            $validator = \Config\Services::validation();
            $data = [
                'error' => [
                    'nama_create' => $validator->getError('nama_create'),
                    'username_create' => $validator->getError('username_create'),
                    'password_create' => $validator->getError('password_create'),
                    'nohp_create' => $validator->getError('nohp_create'),
                    'email_create' => $validator->getError('email_create')
                ]
            ];
            echo json_encode($data);
        } else {
            $this->m_akun->save([
                'nama' => $this->request->getVar('nama_create'),
                'username' => $this->request->getVar('username_create'),
                'password' => password_hash($this->request->getVar('password_create'), PASSWORD_DEFAULT),
                'nohp' => $this->request->getVar('nohp_create'),
                'email' => $this->request->getVar('email_create')
            ]);
            echo json_encode('sukses');
        }
    }
    public function edit($id)
    {
        $tabel = $this->m_akun->where(['id' => $id])->first();
        echo json_encode($tabel);
    }
    public function delete($id)
    {
        $data = $this->m_akun->delete($id);
        if ($data) {
            print_r(json_encode(array('status' => true, 'msg' => 'berhasil di hapus')));
        } else {
            print_r(array('status' => false, 'msg' => 'gagal dihpaus'));
        }
    }
    public function update()
    {
        if (!$this->validate([
            'nama_update' => 'required',
            'username_update' => 'required',
            'nohp_update' => 'required',
            'email_update' => 'required'
        ])) {
            $validator = \Config\Services::validation();
            $data = [
                'error' => [
                    'nama_update' => $validator->getError('nama_update'),
                    'nohp_update' => $validator->getError('nohp_update'),
                    'email_update' => $validator->getError('email_update'),

                ]
            ];
            echo json_encode($data);
        } else {
            $this->m_akun->save([
                'id' => $this->request->getVar('id_update'),
                'nama' => $this->request->getVar('nama_update'),
                'username' => $this->request->getVar('username_update'),
                'password' => password_hash($this->request->getVar('password_update'), PASSWORD_DEFAULT),
                'nohp' => $this->request->getVar('nohp_update'),

                'email' => $this->request->getVar('email_update')
            ]);
            echo json_encode('sukses');
        }
    }
}
