<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Rekap_model', 'model');
    $this->load->model('Registrasi_model', 'registrasi_model');
    $this->load->library('encrypt');

    if(empty(($this->session->userdata('disclaimer'))))
    {
      redirect('disclaimer');
    }
    if(empty(($this->session->userdata('email'))))
    {
      $this->session->unset_userdata('email');
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
    $this->load->view('rekap/rekap_banjir');
    $this->load->view('utama/footer_rekap');
  }

  public function getRekap(){
    // $year = 2019;
    $year = $this->security->xss_clean($this->input->post('year'));
    if($year==''){
      $response = array(
        'message' => "Access Denied",
      );
      // echo 'error';
      $this->output
      ->set_status_header(400)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
      ->_display();
      exit;
    }



    $this->db->trans_begin();
    $handler['data'] = $this->model->get_rekap($year);
    $this->db->trans_complete();

    if ($this->db->trans_status() === false || $handler['data']===false) {
      $this->db->trans_rollback();
      $response = array(
        'message' => "Message Error",
      );
      // echo 'error';
      $this->output
      ->set_status_header(400)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
      ->_display();
      exit;
    }
    else{
      $this->db->trans_commit();
      //urutkan berdasarkan abjad
      function compareByName($a, $b) {
        return strcmp($a["desa"], $b["desa"]);
      }
      usort($handler['data'], 'compareByName');
      //
      foreach ($handler['data'] as $value) {
        $handler['key'][] = $this->encrypt->encode($value['id']);
      }
      $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode(['status'=>'true','data'=>$handler], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
      ->_display();
      exit;
    }

  }

  public function rekap_detail($parameter){

    if($parameter==''){
      redirect('home');
    }
    $id = $this->encrypt->decode($parameter);
    $handler['data'] = $this->model->get_rekap_detail($id);

    if($handler['data']==false){
      redirect('home');
    }

    function fraction_to_min_sec($coord)
    {
      $isnorth = $coord>=0;
      $coord = abs($coord);
      $deg = floor($coord);
      $coord = ($coord-$deg)*60;
      $min = floor($coord);
      $sec = floor(($coord-$min)*60);
      // return array($deg, $min, $sec, $isnorth ? 'N' : 'S');
      // or if you want the string representation
      return sprintf("%d&deg;%d'%d\"%s", $deg, $min, $sec, $isnorth ? 'N' : 'S');
    }

    $handler['new']['x'] =fraction_to_min_sec($handler['data'][0]['x']);
    $handler['new']['y'] =fraction_to_min_sec($handler['data'][0]['y']);

    $this->load->view('utama/header');
    $this->load->view('rekap/rekap_detail',$handler);
    $this->load->view('utama/footer_detail_rekap');


  }

}
