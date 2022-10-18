<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disclaimer extends CI_Controller {

  public function __construct() {
    parent::__construct();

    }

  public function index()
  {
    $this->load->view('utama/disclaimer');
  }

  public function disclaimer(){
    $array_session=	array(
      'disclaimer'    => 'true',
    );
    $this->session->set_userdata($array_session);
    redirect('home');
  }

}
