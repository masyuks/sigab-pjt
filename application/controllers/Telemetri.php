<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telemetri extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model', 'model');
		$this->load->model('Registrasi_model', 'registrasi_model');
		$this->load->model('Telemetri_model', 'tele_model');
		$this->load->library('encrypt');

		if(empty(($this->session->userdata('email'))))
		{
			redirect('registrasi');
		}
		else{
			$check = $this->registrasi_model->findEmail($this->session->userdata('email'));
			if($check==true){
				$this->session->unset_userdata('email');
				redirect('registrasi');
			}
		}
	}


	public function index()
	{
		$temp['data'] = $this->tele_model->get_huluhilir_ws1();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_wl'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			$table[]=$value['TableData'];
		}
		$table1234 = Array();
		$handler['table'] = $this->tele_model->get_table_array_new_tele($table);
		
		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);
		

		$this->load->view('utama/header');
		$this->load->view('telemetri/telemetri', $test123);
		$this->load->view('utama/footer');

	}
	
	public function ws2()
	{
		$temp['data'] = $this->tele_model->get_huluhilir_ws2();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_wl'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			$table[]=$value['TableData'];
		}
		$table1234 = Array();
		$handler['table'] = $this->tele_model->get_table_array_new_tele($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);
		

		$this->load->view('utama/header');
		$this->load->view('telemetri/telemetri', $test123);
		$this->load->view('utama/footer');
	}
	
	
	public function arr_ws1()
	{
		$temp['data'] = $this->tele_model->get_huluhilir_arr_ws1();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_rf'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			$table[]=$value['TableData'];
		}
		$table1234 = Array();
		$handler['table'] = $this->tele_model->get_table_array_arr_new_tele($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);
		

		$this->load->view('utama/header');
		$this->load->view('telemetri/telemetri_arr', $test123);
		$this->load->view('utama/footer');
		
	}
	
	public function arr_ws2()
	{
		$temp['data'] = $this->tele_model->get_huluhilir_arr_ws2();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_rf'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			$table[]=$value['TableData'];
		}
		$table1234 = Array();
		$handler['table'] = $this->tele_model->get_table_array_arr_new_tele($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		
		
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);
		$test123['nilai'] = 100;

		$this->load->view('utama/header');
		$this->load->view('telemetri/telemetri_arr', $test123);
		$this->load->view('utama/footer');
		
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('instansi');
		$this->session->unset_userdata('email');
		$this->session->set_userdata($array_session);
		redirect('home');

	}


	public function test_q()
	{
		$handler['data'] = $this->model->ambil_log();
		var_dump(	$handler['data']);

		exit();

		// $this->load->view('utama/header');
		// $this->load->view('tablepdf');
		// $this->load->view('utama/footer');

	}
}
