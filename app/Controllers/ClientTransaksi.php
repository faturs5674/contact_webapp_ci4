<?php

namespace App\Controllers;

use \App\Models\M_ctransaksi;
use \App\Models\M_setting;

class ClientTransaksi extends BaseController

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
		return view('client_transaksi/tabel');
	}
	public function ctransaksi()
	{
		$day_finish   = date("d");
		$month_finish = date("m");
		$years_finish = date("Y");
		$day_start    = date("d", strtotime($this->request->getVar('client_transaksi_date_start')));
		$month_start  = date("m", strtotime($this->request->getVar('client_transaksi_date_start')));
		$years_start  = date("Y", strtotime($this->request->getVar('client_transaksi_date_start')));
		$durasi_sewa = $this->request->getVar('client_transaksi_date_finish') * 365;
		$math_month_finish = $month_finish * 30;
		$math_years_finish  = $years_finish * 30 * 12;
		$math_month_start = $month_start * 30;
		$math_years_start = $years_start * 30 * 12;
		$math_finish = $day_finish + $math_month_finish + $math_years_finish;
		$math_start  = $day_start + $math_month_start + $math_years_start;
		$set_coldown = $durasi_sewa - ($math_finish - $math_start);


		$this->m_ctransaksi->save([
			'client_id' => $this->request->getVar('client_id_transaksi'),
			'client_transaksi_date_start' => $this->request->getVar('client_transaksi_date_start'),
			'client_transaksi_date_finish' => $this->request->getVar('client_transaksi_date_finish'),
			'created_by' => session()->get('user_id'),
			'status' => $this->request->getVar('status')
		]);
		$this->m_setting->save([
			'set_invoice_cooldown' => $set_coldown,
			'set_email' => $this->request->getVar('email_setting'),
			'set_wa' => $this->request->getVar('wa_setting'),
			'set_keterangan_perpanjangan' => $this->request->getVar('perpanjangan')
		]);
		// session()->setFlashdata('pesan', 'transaksi berhasil di lakukan');

		return redirect()->to('/clienttransaksi/index');
	}
	public function dt_tabel()
	{
		$data = $this->m_ctransaksi->getclient();
		echo json_encode($data);
	}
	public function get($id)
	{
		$q = $this->m_ctransaksi->pembaruan($id);
		$w = $this->m_ctransaksi->pembaruan1($id);
		$day_start    = date("d", strtotime($q[0]->client_transaksi_date_start));
		$month_start  = date("m", strtotime($q[0]->client_transaksi_date_start));
		$years_start  = date("Y", strtotime($q[0]->client_transaksi_date_start));
		$day_finish   = date("d");
		$month_finish = date("m");
		$years_finish = date("Y");
		$durasi_sewa =  $w[0]->client_transaksi_date_finish * 365;
		$math_month_finish = $month_finish * 30;
		$math_years_finish  = $years_finish * 30 * 12;
		$math_month_start = $month_start * 30;
		$math_years_start = $years_start * 30 * 12;
		$math_finish = $day_finish + $math_month_finish + $math_years_finish;
		$math_start  = $day_start + $math_month_start + $math_years_start;
		$set_coldown = $durasi_sewa - ($math_finish - $math_start);
		$this->m_setting->save([
			'id' => $id,
			'set_invoice_cooldown' => $set_coldown
		]);

		$q =	$this->m_setting->voice($id);
		if ($q[0]->set_invoice_cooldown == 365) {
			$this->m_setting->gmail($id);
		} else if ($q[0]->set_invoice_cooldown == 7) {
			$this->m_setting->gmail($id);
			echo "7 hari lagii";
		} else {
			echo "selamat datang";
		}
	}
}
