<?php

namespace App\Controllers;
use App\Models\M_Masterdata;

class Masterdata extends BaseController
{
    protected $m_masterdata;
    public function __construct()
    {
        $this->m_masterdata= new M_Masterdata();
    }
    public function index()
    {
            $tabel = $this->m_masterdata->gettabel();
$data =[
    'tabel'=> $tabel
];

return view ('pages/tabel',$data);

    }
    public function create(){

        return view ('/pages/create');
    }
    public function save(){
        $this->m_masterdata->save([
       
            'user_nama' => $this->request->getVar('user_nama'),
            'user_no_hp' => $this->request->getVar('user_no_hp'),
            'user_email' => $this->request->getVar('user_email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);
        return redirect()->to('/pages/tabel');

    }
    public function update($id)
    {
        $tabel = $this->m_masterdata->first($id);
    
        $data=['tabel'=>$tabel];
       
        return view ('/pages/update',$data);
    }
    public function hupdate($id){
        $this->m_masterdata->save([
            'user_id' => $id,
            'user_nama' => $this->request->getVar('user_nama'),
            'user_no_hp' => $this->request->getVar('user_no_hp'),
            'user_email' => $this->request->getVar('user_email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);

        return redirect()->to('/pages/tabel');
    }
    public function delete($id){
        $this->m_masterdata->delete($id);
        return redirect()->to('/pages/tabel');
    }
   
}