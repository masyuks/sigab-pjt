<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Registrasi_model extends CI_Model {

  public $db;

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->db = $this->load->database('default', TRUE);
    $this->load->helper('date');
  }

  public function findUser($email,$password){
    $this->db->select('*');
    $this->db->from('tb_data_users');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function findId($id){
    $this->db->select('*');
    $this->db->from('tb_data_users');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findEmail($email){
    $this->db->select('*');
    $this->db->from('tb_data_users');
    $this->db->where('email',$email);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function findTest(){
    $this->db->select('*');
    $this->db->from('tb_data_users');
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function getUser($email){
    $this->db->select('*');
    $this->db->from('tb_data_users');
    $this->db->where('email',$email);
    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function get_id_user(){
    $query = $this->db->get("tb_data_users");
    if ($query && $query->num_rows() > 0) {
      $this->db->select('id');
      $this->db->from('tb_data_users');
      $this->db->order_by('id',"DESC");
      $this->db->limit(1);
      $query = $this->db->get();
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function insertRegister($id,$nama,$email,$instansi,$phone,$alamat,$kota,$status,$password,$tgl_registrasi,$tgl_aktivasi){
    $query="insert into \"tb_data_users\" values($id,'$nama','$email','$instansi','$phone','$alamat','$kota','$status','$password',(TO_DATE('$tgl_registrasi', 'yyyy/mm/dd hh24:mi:ss')),'$tgl_aktivasi')";
    $this->db->query($query);
  }

  public function updateRegister($id,$status,$tgl_aktivasi){

    $this->db->query("UPDATE \"tb_data_users\" SET \"status\"=$status,  \"tgl_aktivasi\" = (TO_DATE('$tgl_aktivasi', 'yyyy/mm/dd hh24:mi:ss')) WHERE \"id\"=$id ");
    return $this->db->affected_rows();

  }

  public function delete(){
    $this->db->where("email", "reynaldoalfaputra@gmail.com");
    $this->db->delete("tb_data_users");
  }




}
