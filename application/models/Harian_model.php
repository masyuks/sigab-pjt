<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Harian_model extends CI_Model {

  public function get_last_date_harian(){
      $this->db->select("to_char(\"tanggal_buat\", 'YYYY-MM-DD')as tanggal_buat",false);
      $this->db->from('tb_data_harian');
      $this->db->where("published =", 1);
      $this->db->limit(1);
      $this->db->order_by('id',"DESC");
      $query = $this->db->get();

      if ($query && $query->num_rows() > 0) {
      return $query->result_array();
      } else {
          return false;
      }
  }

  public function get_data_test(){
    $this->db->select('*');
    $this->db->from('tb_data_harian');
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  public function get_data($date){
    $this->db->select('tb_data_harian.tanggal_buat as tanggal_buat,tb_data_harian.filename as filename,rm_obyek_ws.nama,rm_obyek_ws.x,rm_obyek_ws.y');
    $this->db->from('tb_data_harian');
    $this->db->join('rm_obyek_ws','tb_data_harian.id_ws=rm_obyek_ws.id');
    $this->db->where("to_char(\"tanggal_buat\", 'YYYY-MM-DD') = '$date'");
    $this->db->where("tb_data_harian.published =", 1);
    $this->db->order_by('tb_data_harian.id',"DESC");
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }


  }

}
