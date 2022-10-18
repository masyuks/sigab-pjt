<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->library('encrypt');
	$this->load->helper('download');
	$this->load->model('Registrasi_model', 'registrasi_model');
	if(empty(($this->session->userdata('disclaimer'))))
	{
	redirect('disclaimer');
	}
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
    $this->load->view('utama/header');
    $this->load->view('help/help');
    $this->load->view('utama/footer_help');
  }
}
