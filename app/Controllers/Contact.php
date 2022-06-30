<?php

namespace App\Controllers;

use \App\Models\M_contact;
use PHPUnit\Framework\Constraint\JsonMatches;

class contact extends BaseController
{
    protected $m_contact;
    public function __construct()
    {
        $this->m_contact = new M_contact();
    }
    public function index()
    {
        return view('/contact/tabel');
    }
    public function read()
    {
        $data = $this->m_contact->findAll();
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
            'nama_create' => 'required|is_unique[contact.nama]',
            'nohp_create' => 'required',
            'email_create' => 'required'
        ])) {
            $validator = \Config\Services::validation();
            $data = [
                'error' => [
                    'nama_create' => $validator->getError('nama_create'),
                    'nohp_create' => $validator->getError('nohp_create'),
                    'email_create' => $validator->getError('email_create')
                ]
            ];
            echo json_encode($data);
        } else {
            $this->m_contact->save([
                'nama' => $this->request->getVar('nama_create'),
                'nohp' => $this->request->getVar('nohp_create'),
                'email' => $this->request->getVar('email_create')
            ]);
            echo json_encode('sukses');
        }
    }
    public function edit($id)
    {
        $tabel = $this->m_contact->where(['id' => $id])->first();
        echo json_encode($tabel);
    }
    public function delete($id)
    {
        $data = $this->m_contact->delete($id);
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
            $this->m_contact->save([
                'id' => $this->request->getVar('id_update'),
                'nama' => $this->request->getVar('nama_update'),
                'nohp' => $this->request->getVar('nohp_update'),
                'email' => $this->request->getVar('email_update')
            ]);
            echo json_encode('sukses');
        }
    }
}
