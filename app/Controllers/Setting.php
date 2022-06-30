<?php

namespace App\Controllers;

use \App\Models\M_ctransaksi;

use \App\Models\M_setting;
use CodeIgniter\HTTP\Message;

$email_smtp = \Config\Services::email();

class Setting extends BaseController
{
	protected $m_setting;
	private $m_ctransaksi;
	public function __construct()
	{
		$this->m_ctransaksi = new M_ctransaksi();
		$this->m_setting = new M_setting();
	}
	public function index()
	{

		return view('setting/tabel');
	}
	public function tampilsatu()
	{
		$id = 1;
		$q = $this->m_setting->voice($id);
		if ($q[0]->set_invoice_cooldown == 364) {
			// $this->m_setting->gmail($id);
			$this->m_setting->wa($id);
			echo "<script>history.back(-1)</script>";
		} else if ($q[0]->set_invoice_cooldown == 7) {
			// $this->m_setting->gmail($id);
			$this->m_setting->wa($id);
			echo "<script>history.back(-1)</script>";
		}
		// else if ($q[0]->set_invoice_cooldown <= 0) {
		// 	$this->m_setting->gmail($id);
		// 	echo "durasi habis";
		// 	echo "<script>history.back(-1)</script>";
		// 	// echo "waktu   hari";
		// }
		else {
			echo "selamat datang";
			echo "<script>history.back(-1)</script>";
		}
	}
}
