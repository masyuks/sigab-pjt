<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model', 'model');
		$this->load->model('Registrasi_model', 'registrasi_model');
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
		$temp['data'] = $this->model->ambil_data_all();
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
		$handler['table'] = $this->model->get_table_array_new($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		// var_dump($test123['data']);

		//--urutkan berdasarkan abjad
		function compareByName($a, $b) {
			return strcmp($a["nama"], $b["nama"]);
		}
		usort($test123['data'], 'compareByName');

		//--urutkan berdasarkan merah kuning hijau normal
		$temp['data'] = array();
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='MERAH' || $data['disch_siaga']=='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='KUNING' && $data['disch_siaga']!='MERAH'){
				array_push($temp['data'],$data);
			} 
			else if($data['disch_siaga']=='KUNING' && $data['wl_siaga']!='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='HIJAU' && $data['disch_siaga']!='MERAH' && $data['disch_siaga']!='KUNING'){
				array_push($temp['data'],$data);
			}
			else if($data['disch_siaga']=='KUNING' && $data['wl_siaga']!='MERAH' && $data['wl_siaga']!='KUNING'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='NORMAL' && $data['disch_siaga']!='MERAH' && $data['disch_siaga']!='KUNING' && $data['disch_siaga']!='HIJAU'){
				array_push($temp['data'],$data);
			}
			else if($data['disch_siaga']=='KUNING' && $data['wl_siaga']!='MERAH' && $data['wl_siaga']!='KUNING' && $data['wl_siaga']!='HIJAU'){
				array_push($temp['data'],$data);
			}
		}
		$test123['data'] = $temp['data'];

		//--get highlight
		//--get date dan data
		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		// var_dump($date_highlight);
		// exit();
		$test123['highlight'] = $this->model->get_highlight($date_highlight);

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


		$this->load->view('utama/header');
		$this->load->view('home/home', $test123);
		$this->load->view('utama/footer');



	}

	public function test()
	{

		$temp['data'] = $this->model->ambil_data_all();
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
		$handler['table'] = $this->model->get_table_array_new($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);
			}
		}
		var_dump($test123['data']);
		exit();

		// $temp['data'] = $this->model->ambil_data_search_test();
		// // $date_temp = $last_date[0]['DATETIME'];
		// $last_date = $this->model->get_last_date_table_test('tb_wl_Padangan');
		// $date_temp = $last_date[0]['DATETIME'];
		// $date_temp = date('Y-m-d',(strtotime($date_temp)));
		// $date_temp_2 = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date_temp) ) ));
		// $handler['table'] = $this->model->get_table_awlr('tb_wl_Dengkeng',$date_temp,$date_temp_2,'RIVER');
		// var_dump($handler);
		//
		// exit();
		// $date_highlight = $this->model->get_last_date_highlight();
		// var_dump($date_highlight);
		// $date_highlight =  date('Y-m-d', strtotime('-1 day', strtotime($date_raw)))
		// $second_date = strtotime('-1 day', $first_date);
		// $date_highlight = date('Y-m-d');
		// $date_highlight = date( "Y-m-d", strtotime( $date_highlight . "-5 day"));
		// var_dump($date_highlight);
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		// $test123['highlight'] = $this->model->get_highlight($date_highlight);
		// var_dump($test123);
		//--
		$temp['data'] = $this->model->ambil_data_all_arr();
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
		$handler['table'] = $this->model->get_table_array_arr_new($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);

			}

		}
		var_dump($test123);
	}

	public function indexbackup()
	{

		$handler['data'] = $this->model->ambil_data();
		foreach ($handler['data'] as $value) {
			$table[]=$value['TableData'];
		}

		//--ambil data per table
		$table123 = Array();
		$handler['table'] = $this->model->get_table_array($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);

			}

		}

		//--urutkan berdasarkan abjad
		function compareByName($a, $b) {
			return strcmp($a["nama"], $b["nama"]);
		}
		usort($test123['data'], 'compareByName');

		//--urutkan berdasarkan merah kuning hijau normal
		$temp['data'] = array();
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='KUNING'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='HIJAU'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='NORMAL'){
				array_push($temp['data'],$data);
			}
		}
		$test123['data'] = $temp['data'];

		//--get highlight
		//--get date dan data
		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);

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


		$this->load->view('utama/header');
		$this->load->view('home/home', $test123);
		$this->load->view('utama/footer');


	}

	// public function index2()
	// {
	//
	// 	$temp['data'] = $this->model->ambil_data_all();
	// 	foreach ($temp['data'] as $value) {
	// 		$substr= substr($value['TableData'],0,5);
	// 		if($substr=='tb_wl'){
	// 			$handler['data'][] = $value;
	// 		}
	// 	}
	// 	// var_dump($temp['data']);
	// 	// exit();
	// 	foreach ($handler['data'] as $value) {
	// 		$table[]=$value['TableData'];
	// 	}
	// 	$table1234 = Array();
	// 	$handler['table'] = $this->model->get_table_array_new($table);
	// 	// var_dump($handler['table']);
	// 	// exit();
	//
	//
	// 	//--gabungkan master dan data per table
	// 	$test123['data'] = Array();
	// 	foreach ($handler['table'] as $table) {
	// 		foreach ($handler['data'] as $data) {
	// 			if($data['TableData']==$table[1])
	// 			$test123['data'][] = array_merge($data, $table[0]);
	// 		}
	// 	}
	// 	var_dump($test123['data']);
	// 	exit();
	//
	// 	//--urutkan berdasarkan abjad
	// 	function compareByName($a, $b) {
	// 		return strcmp($a["nama"], $b["nama"]);
	// 	}
	// 	usort($test123['data'], 'compareByName');
	//
	// 	//--urutkan berdasarkan merah kuning hijau normal
	// 	$temp['data'] = array();
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['wl_siaga']=='MERAH'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['wl_siaga']=='KUNING'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['wl_siaga']=='HIJAU'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['wl_siaga']=='NORMAL'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	$test123['data'] = $temp['data'];
	//
	// 	//--get highlight
	// 	//--get date dan data
	// 	$date_highlight = $this->model->get_last_date_highlight();
	// 	$test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
	//
	// 	//--pecah normal tidak ditampilkan
	// 	$temp_highlight['data'] = array();
	// 	foreach ($test123['highlight'] as $data) {
	// 		$substr= substr($data['highlight'],1,6);
	// 		if($substr != 'NORMAL'){
	// 			array_push($temp_highlight['data'],$data);
	// 		}
	// 	}
	// 	$test123['highlight'] = $temp_highlight['data'];
	//
	// 	$test123['search'] = array(
	// 		'status' => false,
	// 		'parameter' => '',
	// 	);
	//
	//
	// 	$this->load->view('utama/header');
	// 	$this->load->view('home/home', $test123);
	// 	$this->load->view('utama/footer');
	//
	//
	// }

	// public function testNew(){
	//
	// 	$temp['data'] = $this->model->ambil_data_all();
	// 	foreach ($temp['data'] as $value) {
	// 		$substr= substr($value['TableData'],0,5);
	// 		if($substr=='tb_wl'){
	// 			$handler['data'][] = $value;
	// 		}
	// 	}
	// 	foreach ($handler['data'] as $value) {
	// 		$table[]=$value['TableData'];
	// 	}
	// 	$table1234 = Array();
	// 	$handler['table'] = $this->model->get_table_array_new($table);
	//
	// 	//--gabungkan master dan data per table
	// 	$test123['data'] = Array();
	// 	foreach ($handler['table'] as $table) {
	// 		foreach ($handler['data'] as $data) {
	// 			if($data['TableData']==$table[1])
	// 			$test123['data'][] = array_merge($data, $table[0]);
	// 		}
	// 	}
	// 	var_dump($test123['data']);
	// 	exit();
	//
	//
	//
	//
	// }

	//sama kayak fungsi index , ada tambahan where
	public function search($parameter)
	{

		if($parameter==''){
			redirect('home');
		}

		$search_found = false;
		$temp['data'] = $this->model->ambil_data_all();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_wl'){
				$handler['find'][] = $value;
			}
		}
		foreach ($handler['find'] as $value) {
			$table[]=$value['TableData'];
			$nama = str_replace(' ', '-', $value['nama']);
			if(strtolower($nama)==strtolower($parameter)){
				$search_found = true;
				$search = $value['nama'];
			}
		}

		//lakukan search
		//old
		// $search_found = false;
		// $handler['find'] = $this->model->ambil_data();
		// foreach ($handler['find'] as $value) {
		// 	$table[]=$value['TableData'];
		// 	$nama = str_replace(' ', '-', $value['nama']);
		// 	if(strtolower($nama)==strtolower($parameter)){
		// 		$search_found = true;
		// 		$search = $value['nama'];
		// 	}
		// }

		if($search_found==false){
			redirect('home');
		}

		$handler['data'] = $this->model->ambil_data_search_new($search);
		// var_dump($handler['data']);
		// exit();

		//--ambil data per table
		$table1234 = Array();
		$handler['table'] = $this->model->get_table_array_new($table);
		// var_dump($handler['table']);
		// exit();

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);

			}

		}

		//--urutkan berdasarkan abjad
		function compareByName($a, $b) {
			return strcmp($a["nama"], $b["nama"]);
		}
		usort($test123['data'], 'compareByName');

		//--urutkan berdasarkan merah kuning hijau normal
		$temp['data'] = array();
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='KUNING'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='HIJAU'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['wl_siaga']=='NORMAL'){
				array_push($temp['data'],$data);
			}
		}
		$test123['data'] = $temp['data'];

		//--get highlight
		//--get date dan data
		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);

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
			'status' => true,
			'parameter' => $search,
		);

		$this->load->view('utama/header');
		$this->load->view('home/home', $test123);
		$this->load->view('utama/footer');

	}


	public function arr()
	{
		$temp['data'] = $this->model->ambil_data_all_arr();
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
		$handler['table'] = $this->model->get_table_array_arr_new($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);

			}

		}

		//--urutkan berdasarkan abjad
		function compareByName($a, $b) {
			return strcmp($a["nama"], $b["nama"]);
		}
		usort($test123['data'], 'compareByName');

		//--urutkan berdasarkan merah kuning hijau normal
		$temp['data'] = array();
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='KUNING'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='HIJAU'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='SIAGA'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='NORMAL'){
				array_push($temp['data'],$data);
			}
		}
		$test123['data'] = $temp['data'];

		//--get highlight
		//--get date dan data
		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);

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

		$this->load->view('utama/header');
		$this->load->view('home/home_arr', $test123);
		$this->load->view('utama/footer_arr');

	}
	// public function backuparr()
	// {
	// 	$handler['data'] = $this->model->ambil_data_arr();
	// 	foreach ($handler['data'] as $value) {
	// 		$table[]=$value['TableData'];
	// 	}
	//
	// 	//--ambil data per table
	// 	$table123 = Array();
	// 	$handler['table'] = $this->model->get_table_array_arr($table);
	//
	// 	//--gabungkan master dan data per table
	// 	$test123['data'] = Array();
	// 	foreach ($handler['table'] as $table) {
	// 		foreach ($handler['data'] as $data) {
	// 			if($data['TableData']==$table[1])
	// 			$test123['data'][] = array_merge($data, $table[0]);
	//
	// 		}
	//
	// 	}
	//
	// 	//--urutkan berdasarkan abjad
	// 	function compareByName($a, $b) {
	// 		return strcmp($a["nama"], $b["nama"]);
	// 	}
	// 	usort($test123['data'], 'compareByName');
	//
	// 	//--urutkan berdasarkan merah kuning hijau normal
	// 	$temp['data'] = array();
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='MERAH'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='KUNING'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='HIJAU'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='NORMAL'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	$test123['data'] = $temp['data'];
	//
	// 	//--get highlight
	// 	//--get date dan data
	// 	$date_highlight = $this->model->get_last_date_highlight();
	// 	$test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
	//
	// 	//--pecah normal tidak ditampilkan
	// 	$temp_highlight['data'] = array();
	// 	foreach ($test123['highlight'] as $data) {
	// 		$substr= substr($data['highlight'],1,6);
	// 		if($substr != 'NORMAL'){
	// 			array_push($temp_highlight['data'],$data);
	// 		}
	// 	}
	// 	$test123['highlight'] = $temp_highlight['data'];
	//
	//
	// 	$test123['search'] = array(
	// 		'status' => false,
	// 		'parameter' => '',
	// 	);
	//
	// 	$this->load->view('utama/header');
	// 	$this->load->view('home/home_arr', $test123);
	// 	$this->load->view('utama/footer_arr');
	//
	//
	// }
	// public function arr2()
	// {
	// 	$temp['data'] = $this->model->ambil_data_all_arr();
	// 	foreach ($temp['data'] as $value) {
	// 		$substr= substr($value['TableData'],0,5);
	// 		if($substr=='tb_rf'){
	// 			$handler['data'][] = $value;
	// 		}
	// 	}
	// 	foreach ($handler['data'] as $value) {
	// 		$table[]=$value['TableData'];
	// 	}
	// 	$table1234 = Array();
	// 	$handler['table'] = $this->model->get_table_array_arr_new($table);
	//
	// 	//--gabungkan master dan data per table
	// 	$test123['data'] = Array();
	// 	foreach ($handler['table'] as $table) {
	// 		foreach ($handler['data'] as $data) {
	// 			if($data['TableData']==$table[1])
	// 			$test123['data'][] = array_merge($data, $table[0]);
	//
	// 		}
	//
	// 	}
	//
	// 	//--urutkan berdasarkan abjad
	// 	function compareByName($a, $b) {
	// 		return strcmp($a["nama"], $b["nama"]);
	// 	}
	// 	usort($test123['data'], 'compareByName');
	//
	// 	//--urutkan berdasarkan merah kuning hijau normal
	// 	$temp['data'] = array();
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='MERAH'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='KUNING'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='HIJAU'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	foreach ($test123['data'] as $data) {
	// 		if($data['siaga']=='NORMAL'){
	// 			array_push($temp['data'],$data);
	// 		}
	// 	}
	// 	$test123['data'] = $temp['data'];
	//
	// 	//--get highlight
	// 	//--get date dan data
	// 	$date_highlight = $this->model->get_last_date_highlight();
	// 	$test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
	//
	// 	//--pecah normal tidak ditampilkan
	// 	$temp_highlight['data'] = array();
	// 	foreach ($test123['highlight'] as $data) {
	// 		$substr= substr($data['highlight'],1,6);
	// 		if($substr != 'NORMAL'){
	// 			array_push($temp_highlight['data'],$data);
	// 		}
	// 	}
	// 	$test123['highlight'] = $temp_highlight['data'];
	//
	//
	// 	$test123['search'] = array(
	// 		'status' => false,
	// 		'parameter' => '',
	// 	);
	//
	// 	$this->load->view('utama/header');
	// 	$this->load->view('home/home_arr', $test123);
	// 	$this->load->view('utama/footer_arr');
	//
	//
	// }

	public function search_arr($parameter)
	{
		if($parameter==''){
			redirect('home/arr');
		}
		$search_found = false;
		$search_found = false;
		$temp['data'] = $this->model->ambil_data_all_arr();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_rf'){
				$handler['find'][] = $value;
			}
		}
		foreach ($handler['find'] as $value) {
			$table[]=$value['TableData'];
			$nama = str_replace(' ', '-', $value['nama']);
			if(strtolower($nama)==strtolower($parameter)){
				$search_found = true;
				$search = $value['nama'];
			}
		}

		//lakukan search
		//old
		// $search_found = false;
		// $handler['find'] = $this->model->ambil_data_arr();
		// foreach ($handler['find'] as $value) {
		// 	$table[]=$value['TableData'];
		// 	$nama = str_replace(' ', '-', $value['nama']);
		// 	if(strtolower($nama)==strtolower($parameter)){
		// 		$search_found = true;
		// 		$search = $value['nama'];
		// 	}
		// }

		if($search_found==false){
			redirect('home/arr');
		}

		$handler['data'] = $this->model->ambil_data_arr_search($search);

		//--ambil data per table
		$table123 = Array();
		$handler['table'] = $this->model->get_table_array_arr_new($table);

		//--gabungkan master dan data per table
		$test123['data'] = Array();
		foreach ($handler['table'] as $table) {
			foreach ($handler['data'] as $data) {
				if($data['TableData']==$table[1])
				$test123['data'][] = array_merge($data, $table[0]);

			}

		}

		//--urutkan berdasarkan abjad
		function compareByName($a, $b) {
			return strcmp($a["nama"], $b["nama"]);
		}
		usort($test123['data'], 'compareByName');

		//--urutkan berdasarkan merah kuning hijau normal
		$temp['data'] = array();
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='MERAH'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='KUNING'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='HIJAU'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='SIAGA'){
				array_push($temp['data'],$data);
			}
		}
		foreach ($test123['data'] as $data) {
			if($data['siaga']=='NORMAL'){
				array_push($temp['data'],$data);
			}
		}
		$test123['data'] = $temp['data'];

		//--get highlight
		//--get date dan data
		// $date_highlight = $this->model->get_last_date_highlight();
		// $test123['highlight'] = $this->model->get_highlight($date_highlight[0]['DATE_BROADCAST']);
		$date_highlight = date('Y-m-d');
		$test123['highlight'] = $this->model->get_highlight($date_highlight);

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
			'status' => true,
			'parameter' => $search,
		);

		$this->load->view('utama/header');
		$this->load->view('home/home_arr', $test123);
		$this->load->view('utama/footer_arr');


	}



	public function home_detail($parameter)
	{
		if($parameter==''){
			redirect('home');
		}

		$var_table = $this->encrypt->decode($parameter);

		$url_found = false;

		$handler['data'] = $this->model->ambil_data_all();
		foreach ($handler['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_wl'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			if($value['TableData']==$var_table){
				$url_found = true;
				$objecttype = $value['objecttype'];
			}
		}
		// var_dump($objecttype);
		// exit();
		//--old style
		//--dont remove
		// $handler['data'] = $this->model->ambil_data();
		// foreach ($handler['data'] as $value) {
		// 	if($value['TableData']==$var_table){
		// 		$url_found = true;
		// 		$objecttype = $value['objecttype'];
		// 	}
		// }
		//--end old style

		if($url_found==false){
			redirect('home');
		}


		$last_date = $this->model->get_last_date_table($var_table);
		$date_temp = $last_date[0]['DATETIME'];
		$date_temp = date('Y-m-d',(strtotime($date_temp)));
		$date_temp_2 = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date_temp) ) ));
		// $date_temp_2 = explode("-",$date_temp);
		// $numb = ((int)$date_temp_2[2])-1;
		// $date_temp_2 = $date_temp_2[0]."-".$date_temp_2[1]."-".$numb;

		$handler['table'] = $this->model->get_table_awlr($var_table,$date_temp,$date_temp_2,$objecttype);
		// var_dump($handler['table']);
		// exit();

		//-- Fungsi ganti . dengan 0
		$posisi_for = 0;
		foreach ($handler['table'] as $data) {
			if($objecttype=='RIVER'){
				if(substr($data['discharge'],0,1)=='.'){
					$handler['table'][$posisi_for]['discharge']= "0".$handler['table'][$posisi_for]['discharge'] ;
				}
			}
			else{
				if(substr($data['discharge_inflow'],0,1)=='.'){
					$handler['table'][$posisi_for]['discharge_inflow']= "0".$handler['table'][$posisi_for]['discharge_inflow'] ;
				}
				if(substr($data['discharge'],0,1)=='.'){
					$handler['table'][$posisi_for]['discharge']= "0".$handler['table'][$posisi_for]['discharge'] ;
				}
			}
			$posisi_for+=1;
		}

		function explode24Hours($hour){
			$return = false;
			for($i=0;$i<25;$i++){
				if($i<10){$hourcreate = "0".$i.":00";}
				else{$hourcreate = $i.":00";}
				if($hourcreate==$hour){
					$return = true;
				}
			}
			return $return;
		}

		function super_unique($array,$key)
		{
			$temp_array = [];
			foreach ($array as &$v) {
				if (!isset($temp_array[$v[$key]]))
				$temp_array[$v[$key]] =& $v;
			}
			$array = array_values($temp_array);
			return $array;

		}

		//-- Fungsi remove selain explode24Hours
		$posisi_for = 0;
		foreach ($handler['table'] as $data) {
			$explode = explode(" ",$data['DATETIME']);
			$checkexplode = explode24Hours($explode[1]);
			if($checkexplode==false){
				unset($handler['table'][$posisi_for]);
			}
			$posisi_for+=1;
		}
		//--

		//-- hilangkan data yang double
		$handler['table'] = array_map("unserialize", array_unique(array_map("serialize", $handler['table'])));
		$handler['table'] = super_unique($handler['table'],'DATETIME');
		//-- urutkan setelah dihapus index array
		$handler['table'] = array_values($handler['table']);
		// var_dump($handler['table']);
		// exit();
		//-- finish

		foreach ($handler['table'] as $data) {
			$explode = explode(" ",$data['DATETIME']);
			$handler['time'][] = $explode[1];
		}

		$handler['detail'] = $this->model->get_table_selected($var_table);
		$handler['id'] = $parameter;
		// var_dump($handler['detail']);
		// exit();

		$this->load->view('utama/header',$handler);
		$this->load->view('home/home_detail');
		$this->load->view('utama/footer_detail');


	}

	public function home_detail_arr($parameter)
	{
		if($parameter==''){
			redirect('home');
		}

		$var_table = $this->encrypt->decode($parameter);

		$url_found = false;
		$handler['data'] = $this->model->ambil_data_all_arr();
		foreach ($handler['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_rf'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			if($value['TableData']==$var_table){
				$url_found = true;
				$objecttype = $value['objecttype'];
			}
		}

		//old
		//dont remove
		// $url_found = false;
		// $handler['data'] = $this->model->ambil_data_arr();
		// foreach ($handler['data'] as $value) {
		// 	if($value['TableData']==$var_table){
		// 		$url_found = true;
		// 	}
		// }
		//
		// if($url_found==false){
		// 	redirect('home');
		// }


		$last_date = $this->model->get_last_date_table($var_table);
		$date_temp = $last_date[0]['DATETIME'];
		$date_temp = date('Y-m-d',(strtotime($date_temp)));
		$date_temp_2 = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date_temp) ) ));
		// $date_temp_2 = explode("-",$date_temp);
		// $numb = ((int)$date_temp_2[2])-1;
		// $date_temp_2 = $date_temp_2[0]."-".$date_temp_2[1]."-".$numb;

		$handler['table'] = $this->model->get_table_arr($var_table,$date_temp,$date_temp_2);

		function explode24Hours($hour){
			$return = false;
			for($i=0;$i<25;$i++){
				if($i<10){$hourcreate = "0".$i.":00";}
				else{$hourcreate = $i.":00";}
				if($hourcreate==$hour){
					$return = true;
				}
			}
			return $return;
		}

		function super_unique($array,$key)
		{
			$temp_array = [];
			foreach ($array as &$v) {
				if (!isset($temp_array[$v[$key]]))
				$temp_array[$v[$key]] =& $v;
			}
			$array = array_values($temp_array);
			return $array;

		}

		//-- Fungsi remove selain explode24Hours
		$posisi_for = 0;
		foreach ($handler['table'] as $data) {
			$explode = explode(" ",$data['DATETIME']);
			$checkexplode = explode24Hours($explode[1]);
			if($checkexplode==false){
				unset($handler['table'][$posisi_for]);
			}
			$posisi_for+=1;
		}
		//--

		//-- hilangkan data yang double
		$handler['table'] = array_map("unserialize", array_unique(array_map("serialize", $handler['table'])));
		$handler['table'] = super_unique($handler['table'],'DATETIME');
		//-- urutkan setelah dihapus index array
		$handler['table'] = array_values($handler['table']);
		//-- finish

		foreach ($handler['table'] as $data) {
			$explode = explode(" ",$data['DATETIME']);
			$handler['time'][] = $explode[1];
		}

		$handler['detail'] = $this->model->get_table_selected($var_table);
		$handler['id'] = $parameter;

		$this->load->view('utama/header',$handler);
		$this->load->view('home/home_detail_arr');
		$this->load->view('utama/footer_detail_arr');


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
			$id = $this->encrypt->decode($this->input->post('id'));
		}
		else{
			$id = $this->encrypt->decode($parameter);
		}
		$url_found = false;
		//check from awlr
		$temp['data'] = $this->model->ambil_data_all();
		foreach ($temp['data'] as $value) {
			$substr= substr($value['TableData'],0,5);
			if($substr=='tb_wl'){
				$handler['data'][] = $value;
			}
		}
		foreach ($handler['data'] as $value) {
			if($value['TableData']==$id){
				$url_found = true;
				$posisi='awlr';
				$objecttype = $value['objecttype'];
			}
		}
		//check from arr
		if($url_found==false){
			$temp['data'] = $this->model->ambil_data_all_arr();
			foreach ($temp['data'] as $value) {
				$substr= substr($value['TableData'],0,5);
				if($substr=='tb_rf'){
					$handler['data'][] = $value;
				}
			}
			foreach ($handler['data'] as $value) {
				if($value['TableData']==$id){
					$url_found = true;
					$posisi='arr';
				}
			}
		}

		// var_dump($posisi);
		// exit();
		//check from awlr
		//old
		// $handler['data'] = $this->model->ambil_data();
		// foreach ($handler['data'] as $value) {
		// 	if($value['TableData']==$id){
		// 		$url_found = true;
		// 		$posisi='awlr';
		// 	}
		// }
		//check from arr
		//old
		// $handler['data'] = $this->model->ambil_data_arr();
		// foreach ($handler['data'] as $value) {
		// 	if($value['TableData']==$id){
		// 		$url_found = true;
		// 		$posisi='arr';
		// 	}
		// }

		//false
		if($url_found==false){
			$this->session->sess_destroy();
			redirect('home');
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

			// echo 'download pdf';
			$this->convertpdf($id,$posisi);

		}

	}

	public function destroySession(){
		$this->session->sess_destroy();
		redirect('home');
	}

	//fungsi ini copy paste
	//jika dev sudah development harus diganti
	public function convertpdf($table='',$type=''){

		if($table==''||$type==''){
			redirect('home');
		}

		$var_table = $table;
		$type = $type;
		// $var_table = 'tb_rf_pujon';
		// $type = 'arr';
		//
		// $var_table = 'tb_wl_gedogo';
		// $var_table = 'tb_wl_sutami';
		// $type = 'awlr';

		//function awlr
		//belum fix karena masih dev
		//copy dari home-detail
		// var_dump($type);
		// exit();
		if($type=='awlr'){

			$url_found = false;
			$handler['data'] = $this->model->ambil_data_all();
			foreach ($handler['data'] as $value) {
				$substr= substr($value['TableData'],0,5);
				if($substr=='tb_wl'){
					$handler['data'][] = $value;
				}
			}
			foreach ($handler['data'] as $value) {
				if($value['TableData']==$var_table){
					$url_found = true;
					$objecttype = $value['objecttype'];
				}
			}



			//old
			// $url_found = false;
			// $handler['data'] = $this->model->ambil_data();
			// foreach ($handler['data'] as $value) {
			// 	if($value['TableData']==$var_table){
			// 		$url_found = true;
			// 		$objecttype = $value['objecttype'];
			// 	}
			// }

			if($url_found==false){
				redirect('home');
			}

			$last_date = $this->model->get_last_date_table($var_table);
			$date_temp = $last_date[0]['DATETIME'];
			$date_temp = date('Y-m-d',(strtotime($date_temp)));
			$date_temp_2 = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date_temp) ) ));
			$handler['table'] = $this->model->get_table_awlr($var_table,$date_temp,$date_temp_2,$objecttype);
			//-- Fungsi ganti . dengan 0
			$posisi_for = 0;
			foreach ($handler['table'] as $data) {
				if($objecttype=='RIVER'){
					if(substr($data['discharge'],0,1)=='.'){
						$handler['table'][$posisi_for]['discharge']= "0".$handler['table'][$posisi_for]['discharge'] ;
					}
				}
				else{
					if(substr($data['discharge_inflow'],0,1)=='.'){
						$handler['table'][$posisi_for]['discharge_inflow']= "0".$handler['table'][$posisi_for]['discharge_inflow'] ;
					}
					if(substr($data['discharge'],0,1)=='.'){
						$handler['table'][$posisi_for]['discharge']= "0".$handler['table'][$posisi_for]['discharge'] ;
					}
				}
				$posisi_for+=1;
			}
			//--

			function explode24Hours($hour){
				$return = false;
				for($i=0;$i<25;$i++){
					if($i<10){$hourcreate = "0".$i.":00";}
					else{$hourcreate = $i.":00";}
					if($hourcreate==$hour){
						$return = true;
					}
				}
				return $return;
			}

			function super_unique($array,$key)
			{
				$temp_array = [];
				foreach ($array as &$v) {
					if (!isset($temp_array[$v[$key]]))
					$temp_array[$v[$key]] =& $v;
				}
				$array = array_values($temp_array);
				return $array;

			}

			//-- Fungsi remove selain explode24Hours
			$posisi_for = 0;
			foreach ($handler['table'] as $data) {
				$explode = explode(" ",$data['DATETIME']);
				$checkexplode = explode24Hours($explode[1]);
				if($checkexplode==false){
					unset($handler['table'][$posisi_for]);
				}
				$posisi_for+=1;
			}
			//--

			//-- hilangkan data yang double
			$handler['table'] = array_map("unserialize", array_unique(array_map("serialize", $handler['table'])));
			$handler['table'] = super_unique($handler['table'],'DATETIME');
			//-- urutkan setelah dihapus index array
			$handler['table'] = array_values($handler['table']);
			//-- finish

			foreach ($handler['table'] as $data) {
				$explode = explode(" ",$data['DATETIME']);
				$handler['time'][] = $explode[1];
			}
			$handler['detail'] = $this->model->get_table_selected($var_table);

		}
		//function arr
		//belum fix karena masih dev
		//copy dari home-detail-arr
		else{
			$url_found = false;

			$url_found = false;
			$handler['data'] = $this->model->ambil_data_all_arr();
			foreach ($handler['data'] as $value) {
				$substr= substr($value['TableData'],0,5);
				if($substr=='tb_rf'){
					$handler['data'][] = $value;
				}
			}
			foreach ($handler['data'] as $value) {
				if($value['TableData']==$var_table){
					$url_found = true;
					$objecttype = $value['objecttype'];
				}
			}
			// $handler['data'] = $this->model->ambil_data_arr();
			// foreach ($handler['data'] as $value) {
			// 	if($value['TableData']==$var_table){
			// 		$url_found = true;
			// 	}
			// }

			if($url_found==false){
				redirect('home');
			}


			$last_date = $this->model->get_last_date_table($var_table);
			$date_temp = $last_date[0]['DATETIME'];
			$date_temp = date('Y-m-d',(strtotime($date_temp)));
			$date_temp_2 = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date_temp) ) ));


			$handler['table'] = $this->model->get_table_arr($var_table,$date_temp,$date_temp_2);

			function explode24Hours($hour){
				$return = false;
				for($i=0;$i<25;$i++){
					if($i<10){$hourcreate = "0".$i.":00";}
					else{$hourcreate = $i.":00";}
					if($hourcreate==$hour){
						$return = true;
					}
				}
				return $return;
			}

			function super_unique($array,$key)
			{
				$temp_array = [];
				foreach ($array as &$v) {
					if (!isset($temp_array[$v[$key]]))
					$temp_array[$v[$key]] =& $v;
				}
				$array = array_values($temp_array);
				return $array;

			}

			//-- Fungsi remove selain explode24Hours
			$posisi_for = 0;
			foreach ($handler['table'] as $data) {
				$explode = explode(" ",$data['DATETIME']);
				$checkexplode = explode24Hours($explode[1]);
				if($checkexplode==false){
					unset($handler['table'][$posisi_for]);
				}
				$posisi_for+=1;
			}
			//--

			//-- hilangkan data yang double
			$handler['table'] = array_map("unserialize", array_unique(array_map("serialize", $handler['table'])));
			$handler['table'] = super_unique($handler['table'],'DATETIME');
			//-- urutkan setelah dihapus index array
			$handler['table'] = array_values($handler['table']);
			//-- finish

			foreach ($handler['table'] as $data) {
				$explode = explode(" ",$data['DATETIME']);
				$handler['time'][] = $explode[1];
			}

			$handler['detail'] = $this->model->get_table_selected($var_table);

		}
		$handler['type_table'] = $type;
		// $root = $this->config->item('base_url');
		// var_dump($root);
		// exit();

		// $html = $this->load->view('tablepdf', $handler);
		ini_set('memory_limit', '256M');
		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf=new mPDF('utf-8', array(190,430));
		// $pdf->SetHTMLHeader('<img src="./assets/img/header.png"/>',true);
		// $pdf->SetHTMLFooter('<img src="' . base_url() . 'assets/img/footer.png"/>');
		$html = $this->load->view('tablepdf', $handler,true);
		$pdf->SetWatermarkText('JASA TIRTA I');
		$pdf->showWatermarkText = true;
		$pdf->showImageErrors = true;
		$pdf->AddPage('', // L - landscape, P - portrait
		'', '', '', '',
		0, // margin_left
		0, // margin right
		0, // margin top
		0, // margin bottom
		0, // margin header
		0); // margin footer
		$pdf->WriteHTML($html);
		if($type=='awlr'){
		$output = 'Waterlevel_'.$handler['detail'][0]['nama'].'_'. date('Y_m_d_H_i_s') . '_.pdf';
		}
		else{
			$output = 'PosHujan_'.$handler['detail'][0]['nama'].'_'. date('Y_m_d_H_i_s') . '_.pdf';
		}
		$pdf->Output("$output", 'I');
		// exit();

		//--Insert Data Log
		$email = $this->session->userdata('email');
		$instansi = $this->session->userdata('instansi');
		$nama = $this->session->userdata('nama');
		$id_user = $this->session->userdata('id');
		$file_name = $output;
		$ip = getenv('REMOTE_ADDR');
		$date_download = date('Y-m-d H:i:s');
		$this->db->trans_begin();
		$id_handler = $this->model->get_id_log();
		if($id_handler==false){
			$id = 1;
		}
		else{
			$id = $id_handler[0]['id']+1;
		}
		// var_dump($id);
		// exit();
		$handler = $this->model->insert_log($id,$instansi,$email,$ip,$file_name,$date_download,$nama,$id_user);
		$this->db->trans_complete();

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
