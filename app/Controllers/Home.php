<?php

namespace App\Controllers;

use App\Models\M_client;
use App\Models\M_setting;

class Home extends BaseController
{
	protected $m_client;
	protected $m_setting;
	public function __construct()
	{
		$this->m_client = new M_client();
		$this->m_setting = new M_setting();
	}
	public function grafik()
	{
		$tahun = $this->request->getVar('tahun');

		$data = [
			'tabel' => $this->m_client->tabel(),
			'tabel1' => $this->m_setting->exp(),
			'tabel2' => $this->m_client->customerperbulan($tahun),

		];
		echo json_encode($data);
	}
	public function index()
	{
		return view('pages/dashboard');
	}
	public function dashboard()
	{
		return view('wa_tetsting');
	}
	public function grafik1()
	{
		$tahun = $this->request->getVar('tahun');
		$data = [
			'tabel' => $this->m_client->customerperbulan($tahun)
		];
		echo json_encode($data);
	}
}
