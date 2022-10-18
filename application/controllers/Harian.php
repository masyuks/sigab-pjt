<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harian extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->model('Home_model', 'model');
	$this->load->model('Harian_model', 'harian_model');
	$this->load->model('Registrasi_model', 'registrasi_model');
	$this->load->library('encrypt');
	$this->load->helper('download');

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

    //--get highlight
		//--get date dan data
    $date_harian = $this->harian_model->get_last_date_harian();
    // var_dump($date_harian);
    // exit();
		$date_highlight = date('Y-m-d');
    $test123['data'] = $this->harian_model->get_data($date_harian[0]['TANGGAL_BUAT']);

    // var_dump($test123['data']);
    // exit();

		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);
		// var_dump($test123['highlight']);
		// exit();
		//--pecah normal tidak ditampilkan
		$temp_highlight['data'] = array();

		if($test123['highlight']!=false){
		foreach ($test123['highlight'] as $data) {
			$substr= substr($data['highlight'],1,6);
			if($substr != 'NORMAL'){
				array_push($temp_highlight['data'],$data);
			}
		}
		}
		$test123['highlight'] = $temp_highlight['data'];

		$test123['search'] = array(
		    'status' => false,
		    'parameter' => '',
		);

		// var_dump($test123);
		// exit();

    $this->load->view('utama/header');
    $this->load->view('harian/harian',$test123);
    $this->load->view('utama/footer_harian');
  }

	public function getPDF($parameter=''){

		$email='';
		$instansi='';
		$nama='';
		$check=true;
		$objecttype='';
		if($parameter==''){
			$email = strip_tags(trim($this->input->post('email')));
			$instansi = strip_tags(trim($this->input->post('instansi')));
			$nama = strip_tags(trim($this->input->post('nama')));
			$id = $this->input->post('id');
		}
		else{
			$id = $this->input->post('id');
		}
		//false
		if ($email==''||$instansi==''||$id==''){
			if(empty(($this->session->userdata('email'))))
			{
				$check = false;
				$this->session->sess_destroy();
				redirect('home');
			}
		}
		//true
		if($check==true){
			if(empty(($this->session->userdata('email'))))
			{
				$array_session=	array(
					'email'    => $email,
					'instansi' => $instansi,
					'nama' => $nama,
				);
				$this->session->set_userdata($array_session);
			}

			$this->downloadPDF($id);

		}

	}

	public function downloadPDF($parameter){
		$parameter = $this->encrypt->decode($parameter);
		if($parameter!=''){
			// $email = $this->session->userdata('email');
			// $instansi = $this->session->userdata('instansi');
			// $nama = $this->session->userdata('nama');
			// $file_name = $parameter;
			// $ip = getenv('REMOTE_ADDR');
			// $date_download = date('Y-m-d H:i:s');
			// $this->db->trans_begin();
			// $id_handler = $this->model->get_id_log();
			// if($id_handler==false){
			// 	$id = 1;
			// }
			// else{
			// 	$id = $id_handler[0]['id']+1;
			// }
			// $handler = $this->model->insert_log($id,$instansi,$email,$ip,$file_name,$date_download,$nama);
			// $this->db->trans_complete();

		$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
		);
		$pth    =   file_get_contents(base_url()."files/dataharian/".$parameter, false, stream_context_create($arrContextOptions));
		$nme    =   $parameter;
		force_download($nme, $pth);
	}

	}

	public function test(){

		$date_harian = $this->harian_model->get_last_date_harian();
    // var_dump($date_harian);
    // exit();
		$date_highlight = date('Y-m-d');
		// $date_highlight = date( "Y-m-d", strtotime( $date_highlight . "-1 day"));
    $test123['data'] = $this->harian_model->get_data($date_highlight);
		var_dump($test123);
		exit();

	$handler = $this->harian_model->get_data_test();
	var_dump($handler);
	var_dump($date_harian[0]['TANGGAL_BUAT']);

}
}
