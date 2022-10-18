<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Home_model extends CI_Model {

  public $db;

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->db = $this->load->database('default', TRUE);
    $this->load->helper('date');
  }

  public function ambil_log(){
    $this->db->select('*');
    $this->db->from('tb_data_log');
      $this->db->order_by('id',"DESC");
    // $this->db->from('tb_data_rekapbanjir');
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  //home ambil awlr master
  //masih sementara karena dev
  public function ambil_data(){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('validpos', 'TRUE');
    $this->db->where('TableData IS NOT NULL');
    $this->db->where('sigab_enabled',1);
    $this->db->where('SIAGAWaterlevel','TRUE');
    $this->db->where('id !=',118);
    // $this->db->where('SIAGADisch','TRUE');
    // $this->db->where('nama','Gadang');

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //new
  public function ambil_data_all(){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
    $this->db->where('GSMWaterlevel',1);
    $this->db->where('objecttype!=',null);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }
  public function ambil_data_all_arr(){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
    $this->db->where('GSMRainfall',1);
    $this->db->where('objecttype!=',null);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  public function ambil_data_search_new($search){
    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
    $this->db->where('GSMWaterlevel',1);
    $this->db->where('objecttype!=',null);
      $this->db->where('nama =',$search);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function ambil_data_search_test(){
    $this->db->select('*');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
    $this->db->where('GSMWaterlevel',1);
    $this->db->where('objecttype!=',null);
      $this->db->where('TableData =','tb_wl_Padangan');
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //sama dari ambil data
  //masih sementara karena dev
  public function ambil_data_search($search){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('validpos', 'TRUE');
    $this->db->where('TableData IS NOT NULL');
    $this->db->where('sigab_enabled',1);
    $this->db->where('SIAGAWaterlevel','TRUE');
    $this->db->where('id !=',118);
    $this->db->where('nama =',$search);
    // $this->db->where('SIAGADisch','TRUE');
    // $this->db->where('nama','Gadang');

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  //home ambi arr master
  //masih sementara karena dev
  public function ambil_data_arr(){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('id =',1);
    $this->db->or_where('id =',2);
    // $this->db->where('SIAGADisch','TRUE');
    // $this->db->where('nama','Gadang');

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }


  }

  //sama kayak ambil data arr + inc search
  //masih sementara karena dev
  public function ambil_data_arr_search($search){

    $this->db->select('id,nama,x,y,TableData,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('GSMRainfall',1);
    $this->db->where('nama =',$search);

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }


  }

  //home ambil awlr detail table
  public function get_table_array($table){

    // $table = Array();
    $count = 0;
    foreach ($table as $value) {

      $this->db->select('id,nama_station,wl_siaga,tma,datetime');
      $this->db->from($value);
      $this->db->limit(1);
      $this->db->order_by('id',"DESC");

      $query = $this->db->get();
      if ($query && $query->num_rows() > 0) {
        $table123[$count] = $query->result_array();
        array_push($table123[$count],$value);
      }
      $count++;

    }
    return $table123;

  }

  public function get_table_array_new($table){
    $count = 0;
    // $table1234 = Array();
    foreach ($table as $value) {
      if ($this->db->table_exists($value) ){
        $this->db->select('id,nama_station,wl_siaga,tma');
        $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD HH24:MI')as datetime",false);
        $this->db->from($value);
        $this->db->limit(1);
        $this->db->order_by('datetime',"DESC");

        $query = $this->db->get();
        if ($query && $query->num_rows() > 0) {
          $table1234[$count] = $query->result_array();
          array_push($table1234[$count],$value);
        }
        $count++;
      }
    }
    return $table1234;
  }


  //home ambil arr detail table
  public function get_table_array_arr($table){

    // $table = Array();
    $count = 0;
    foreach ($table as $value) {

      $this->db->select('id,nama_station,hourly_rf,cumulative,datetime,siaga');
      $this->db->from($value);
      $this->db->limit(1);
      $this->db->order_by('id',"DESC");

      $query = $this->db->get();
      if ($query && $query->num_rows() > 0) {
        $table123[$count] = $query->result_array();
        array_push($table123[$count],$value);
      }
      $count++;

    }
    return $table123;

  }

  public function get_table_array_arr_new($table){

    // $table = Array();
    $count = 0;
    foreach ($table as $value) {
      if ($this->db->table_exists($value) ){
      $this->db->select('id,nama_station,hourly_rf,cumulative,siaga');
      $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD HH24:MI')as datetime",false);
      $this->db->from($value);
      $this->db->limit(1);
      $this->db->order_by('datetime',"DESC");

      $query = $this->db->get();
      if ($query && $query->num_rows() > 0) {
        $table123[$count] = $query->result_array();
        array_push($table123[$count],$value);
      }
      $count++;

    }
    }
    return $table123;

  }


  public function get_table_selected($table){

    $this->db->select('id,nama,x,y,objecttype');
    $this->db->from('tb_master_station_position');
    $this->db->where('TableData',$table);

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  //ambil tanggal terakhir dari table
  public function get_last_date_table($table){
    $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD')as datetime",false);
    $this->db->from($table);
    $this->db->limit(1);
    $this->db->order_by('datetime',"DESC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //ga pake
  public function get_last_date_table_test($table){
    $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD')as datetime",false);
    $this->db->from($table);
    $this->db->limit(1);
    $this->db->order_by("datetime","DESC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //home_Detail awlr
  public function get_table_awlr($table,$date_temp,$date_temp_2,$objecttype){

    if($objecttype=='RIVER'){
      $this->db->select('id,nama_station,wl_siaga,tma,discharge');
    }
    else{
      $this->db->select('nama_station,wl_siaga,tma,discharge_inflow,discharge');
    }

    $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD HH24:MI')as datetime",false);
    $this->db->from($table);
    $this->db->where("to_char(\"datetime\", 'YYYY-MM-DD') = '$date_temp'");
    $this->db->or_where("to_char(\"datetime\", 'YYYY-MM-DD') = '$date_temp_2'");
    $this->db->order_by('datetime',"DESC");
    $query = $this->db->get();


    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //home_detail arr
  public function get_table_arr($table,$date_temp,$date_temp_2){

    $this->db->select('nama_station,siaga,hourly_rf,cumulative');
    $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD HH24:MI')as datetime",false);
    $this->db->from($table);
    $this->db->where("to_char(\"datetime\", 'YYYY-MM-DD') = '$date_temp'");
    $this->db->or_where("to_char(\"datetime\", 'YYYY-MM-DD') = '$date_temp_2'");
    $this->db->order_by('datetime',"DESC");
    $query = $this->db->get();


    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //ambil tanggal terakhir highlight
  public function get_last_date_highlight(){
    $this->db->select("to_char(\"date_broadcast\", 'YYYY-MM-DD')as date_broadcast",false);
    $this->db->from('aq_highlight');
    $this->db->limit(1);
    $this->db->order_by('id',"DESC");
    $query = $this->db->get();

    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  //ambil highlight
  public function get_highlight($date){

    $this->db->select('highlight');
    $this->db->from('aq_highlight');
    $this->db->where("to_char(\"date_broadcast\", 'YYYY-MM-DD') = '$date'");
    $this->db->order_by('id',"DESC");
    $query = $this->db->get();


    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function get_id_log(){
    $query = $this->db->get("tb_data_log");
    if ($query && $query->num_rows() > 0) {
      $this->db->select('id');
      $this->db->from('tb_data_log');
      $this->db->order_by('id',"DESC");
      $this->db->limit(1);
      $query = $this->db->get();
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function insert_log($id,$instansi,$email,$ip,$file_name,$date_download,$nama,$id_user){
    $query="insert into \"tb_data_log\" values('$id','$instansi','$email','$ip','$file_name',(TO_DATE('$date_download', 'yyyy/mm/dd hh24:mi:ss')),'$nama','$id_user')";
    $this->db->query($query);

    // $this->db->set('id',1);
    // $this->db->set('instansi',$instansi);
    // $this->db->set('email',$email);
    // $this->db->set('ip',$ip);
    // $this->db->set('file_name',$file_name);
    // $this->db->set('date_download',"to_date('$date_download','yyyy/mm/dd hh24:mi:ss')",false);
    // $new['id'] = 1;
    // $new['instansi'] = $instansi;
    // $new['email'] = $email;
    // $new['ip'] = $ip;
    // $new['file_name'] = $file_name;
    // $new['date_download'] = TO_DATE($date, 'YYYY/MM/DD HH:MI:SS');
    // $this->db->insert('tb_data_log');
  }

  // public function get_table($table){
  //
  //   // $date = "2015-01-23";
  //   // $curr_date = $date->format('Y-m-d ');
  //   $this->db->select('id,nama_station,wl_siaga,tma');
  // $this->db->select("TO_CHAR(\"datetime\",YYYY-MM-DD HH:24:MI')as datetime",false);
  //   $this->db->select("to_char(\"datetime\", 'YYYY-MM-DD')as datetime",false);
  //   $this->db->from($table);
  //   $this->db->where("to_char(\"datetime\", 'YYYY-MM-DD') = '$date_temp'");
  //   $query = $this->db->get();
  //
  //   if ($query && $query->num_rows() > 0) {
  //   return $query->result_array();
  //   } else {
  //       return false;
  //   }
  // }


}
