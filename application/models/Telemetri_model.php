<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Telemetri_model extends CI_Model {

  public $db;

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->db = $this->load->database('default', TRUE);
    $this->load->helper('date');
  }
  
  public function get_huluhilir_ws1(){
	$this->db->select('id,nama,TableData,objecttype,indexhuluhilir');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
    $this->db->where('ws',1);
	$this->db->where('GSMWaterlevel',1);
    $this->db->where('objecttype!=',null);
	$this->db->order_by('indexhuluhilir',"ASC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  
  public function get_huluhilir_ws2(){
	$this->db->select('id,nama,TableData,objecttype,indexhuluhilir');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
	$this->db->where('ws',2);
    $this->db->where('GSMWaterlevel',1);
    $this->db->where('objecttype!=',null);
	$this->db->order_by('indexhuluhilir',"ASC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  
  public function get_huluhilir_arr_ws1(){
    $this->db->select('id,nama,x,y,TableData,objecttype,indexhuluhilir');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
	$this->db->where('ws',1);
    $this->db->where('GSMRainfall',1);
    $this->db->where('objecttype!=',null);
	$this->db->order_by('indexhuluhilir',"ASC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  
  public function get_huluhilir_arr_ws2(){
    $this->db->select('id,nama,x,y,TableData,objecttype,indexhuluhilir');
    $this->db->from('tb_master_station_position');
    $this->db->where('sigab_enabled',1);
	$this->db->where('ws',2);
    $this->db->where('GSMRainfall',1);
    $this->db->where('objecttype!=',null);
	$this->db->order_by('indexhuluhilir',"ASC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  
  public function get_table_array_new_tele($table){
    $count = 0;
    // $table1234 = Array();
    foreach ($table as $value) {
		if ($this->db->table_exists($value) ){
			if($this->db->field_exists('discharge_inflow', $value)){
				$this->db->select('id,nama_station,wl_siaga,tma,discharge,discharge_inflow,datetime,disch_siaga,disch_inf_siaga');
			}else{
				$this->db->select('id,nama_station,wl_siaga,tma,discharge,datetime,disch_siaga');
			}
        
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
  
  public function get_table_array_arr_new_tele($table){

    // $table = Array();
    $count = 0;
    foreach ($table as $value) {
		if ($this->db->table_exists($value) ){
			$this->db->select('id,nama_station,hourly_rf,cumulative,siaga,datetime');
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
 
}

?>