<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Rekap_model extends CI_Model {

  public function get_rekap($year){
    $this->db->select('id,path_foto,river,x,y,desa');
    $this->db->select("to_char(\"tanggal_mulai\", 'YYYY-MM-DD')as tanggal_mulai",false);
    $this->db->select("to_char(\"tanggal_akhir\", 'YYYY-MM-DD')as tanggal_akhir",false);
    $this->db->from('tb_data_rekapbanjir');
      $this->db->where('tahun =',$year);

    $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
    return $query->result_array();
    } else {
        return false;
    }

  }

  public function get_rekap_detail($id){
    $this->db->select('tb_data_rekapbanjir.id as id,tb_data_rekapbanjir.tahun as tahun,tb_data_rekapbanjir.path_foto as path_foto,tb_data_rekapbanjir.river as river,tb_data_rekapbanjir.x as x,tb_data_rekapbanjir.y as y,tb_data_rekapbanjir.desa as desa,tb_data_rekapbanjir.kecamatan as kecamatan,tb_data_rekapbanjir.kabkota as kabkota,tb_data_rekapbanjir.keterangan as keterangan,tb_data_rekapbanjir.tinggi_genangan as tinggi_genangan,rm_obyek_ws.nama as nama');
    $this->db->select("to_char(\"tanggal_mulai\", 'YYYY-MM-DD')as tanggal_mulai",false);
    $this->db->select("to_char(\"tanggal_akhir\", 'YYYY-MM-DD')as tanggal_akhir",false);
    $this->db->from('tb_data_rekapbanjir');
    $this->db->join('rm_obyek_ws' , 'tb_data_rekapbanjir.id_ws = rm_obyek_ws.id');
    $this->db->where('tb_data_rekapbanjir.id =',$id);
      $query = $this->db->get();
    if ($query && $query->num_rows() > 0) {
    return $query->result_array();
    } else {
        return false;
    }
  }

}
