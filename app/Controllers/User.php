<?php

namespace App\Controllers;

use \App\Models\M_user;

class User extends BaseController
{

	protected $m_user;
	public function __construct()
	{
		$this->m_user = new M_user();
	}
	public function index()
	{
		// $data = ['validation' => \Config\Services::validation()];
		return view('/user/tabel');
	}
	public function dt_users()
	{
		$data = $this->m_user->findAll();
		foreach ($data as $key => $value) {
			$data[$key]['user_id'] = '<div class="d-block text-nowrap">';
			$data[$key]['user_id'] .= "<button  onclick=\"edit($value[user_id])\"id=\"$value[user_id]\"class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></button>";
			$data[$key]['user_id'] .= "<button  onclick=\"hapus($value[user_id])\"id=\"$value[user_id]\" class=\"ml-1 btn btn-danger\"><i class=\"fa fa-trash\"></i></button>";
			$data[$key]['user_id'] .= '</div>';
		}
		echo json_encode($data);
	}
	// public function create()
	// {
	// 	$data = [
	// 		'validation' => \Config\Services::validation()
	// 	];
	// 	return view('/user/create', $data);
	// }
	public function validation()
	{
		if (!$this->validate(
			[
				'user_nama_create'    => 'required|is_unique[user.user_nama]',
				'user_no_hp_create'   => 'required|is_unique[user.user_no_hp]',
				'user_email_create' => 'required|is_unique[user.user_email]',
				'username_create' => 'required|is_unique[user.username]',
				'password_create' => 'required',
				'status_create' => 'required'
			]
		)) {
			$validator = \Config\Services::validation();
			$data = [
				'error' => [
					'user_nama_create' => $validator->getError('user_nama_create'),
					'user_no_hp_create' => $validator->getError('user_no_hp_create'),
					'user_email_create' => $validator->getError('user_email_create'),
					'username_create' => $validator->getError('username_create'),
					'password_create' => $validator->getError('password_create'),
					'status_create' => $validator->getError('status_create')
				]

			];
			echo json_encode($data);
		} else {
			$this->m_user->save([
				'user_nama' => $this->request->getVar('user_nama_create'),
				'user_no_hp' => $this->request->getVar('user_no_hp_create'),
				'user_email' => $this->request->getVar('user_email_create'),
				'username' => $this->request->getVar('username_create'),
				'password' => password_hash($this->request->getVar('password_create'), PASSWORD_DEFAULT),
				'created_by' => session()->get('user_id'),
				'status' => $this->request->getVar('status_create')
			]);
			echo json_encode('sukses');
		}
	}
	public function delete($id)
	{
		$data =  $this->m_user->delete($id);
		if ($data) {
			print_r(json_encode(array('status' => true, 'msg' => 'berhasil dihapus!')));
		} else {
			print_r(json_encode(array('status' => false, 'msg' => 'gagal dihapus!')));
		}
	}
	public function get_tabel($id)
	{
		$tabel = $this->m_user->where(['user_id' => $id])->first();
		echo json_encode($tabel);
	}
	public function hupdate()
	{
		if (!$this->validate(
			[
				'user_nama_update'    => 'required',
				'user_no_hp_update'   => 'required',
				'user_email_update' => 'required',
				'username_update' => 'required',
				// 'password_update' => 'required',
				'status_update' => 'required'
			]
		)) {
			$validator = \Config\Services::validation();
			$data = [
				'error' => [
					'user_nama_update' => $validator->getError('user_nama_update'),
					'user_no_hp_update' => $validator->getError('user_no_hp_update'),
					'user_email_update' => $validator->getError('user_email_update'),
					'username_update' => $validator->getError('username_update'),
					// 'password_update' => $validator->getError('password_update'),
					'status_update' => $validator->getError('status_update')
				]

			];
			echo json_encode($data);
		} else {
			$this->m_user->save([
				'user_id' => $this->request->getVar('user_id_update'),
				'user_nama' => $this->request->getVar('user_nama_update'),
				'user_no_hp' => $this->request->getVar('user_no_hp_update'),
				'user_email' => $this->request->getVar('user_email_update'),
				'username' => $this->request->getVar('username_update'),
				'password' => password_hash($this->request->getVar('password_update'), PASSWORD_DEFAULT),
				'updated_by' => session()->get('user_id'),
				'status' => $this->request->getVar('status_update')

			]);
			echo json_encode('sukses');
		}
	}
}
