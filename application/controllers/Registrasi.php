<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

  public function __construct() {
    parent::__construct();
   // die('Untuk registrasi harap hubungi Perum Jasa Tirta I');
    $this->load->model('Registrasi_model', 'model');
    $this->load->library('encrypt');
     // $this->load->library('email');

    if(empty(($this->session->userdata('disclaimer'))))
    {
      redirect('disclaimer');
    }
  }

  public function index()
  {
    $this->load->view('utama/header');
    $this->load->view('registrasi/login');
    $this->load->view('utama/footer_login');
  }

  public function login(){
    $email = strip_tags(trim($this->input->post('email')));
    $password = strip_tags(trim($this->input->post('password')));
    $email = $this->security->xss_clean($email);
    $password = $this->security->xss_clean($password);

    if($email==''||$password==''){
      redirect('registrasi');
    }

    $password =md5(sha1($password));
    $check = $this->model->findUser($email,$password);
    if($check ==false){
      $this->session->set_flashdata('message', 'Email/password salah');
      redirect('registrasi');
    }
    else{
      if($check[0]['status']==0){
        $this->session->set_flashdata('message', 'Akun anda belum aktif');
        redirect('registrasi');
      }
      else{
        //here
        $handler = $this->model->getUser($email);
        $array_session=	array(
          'id'    => $handler[0]['id'],
          'email'    => $handler[0]['email'],
          'instansi' => $handler[0]['instansi'],
          'nama' => $handler[0]['nama'],
        );
        $this->session->set_userdata($array_session);
        redirect('home');
      }
    }
  }

  public function register(){
    $this->load->view('utama/header');
    $this->load->view('registrasi/register');
    $this->load->view('utama/footer_register');
  }

  public function register_function(){

    $nama = strip_tags(trim($this->input->post('nama')));
    $email = strip_tags(trim($this->input->post('email')));
    $password = strip_tags(trim($this->input->post('password')));
    $instansi = strip_tags(trim($this->input->post('instansi')));
    $phone = strip_tags(trim($this->input->post('phone')));
    $kota = strip_tags(trim($this->input->post('kota')));
    $alamat = strip_tags(trim($this->input->post('alamat')));

    $nama = $this->security->xss_clean($nama);
    $email = $this->security->xss_clean($email);
    $password = $this->security->xss_clean($password);
    $instansi = $this->security->xss_clean($instansi);
    $phone = $this->security->xss_clean($phone);
    $kota = $this->security->xss_clean($kota);
    $alamat = $this->security->xss_clean($alamat);

    //--
    if($nama==''||$email==''||$password==''||$instansi==''||$phone==''||$kota==''||$alamat==''){
      redirect('registrasi/register');
    }
    //--

    //--
    $check = $this->model->findEmail($email);
    if($check==false){
      $this->session->set_flashdata('nama123',$nama );
      $this->session->set_flashdata('email',$email );
      $this->session->set_flashdata('password',$password );
      $this->session->set_flashdata('instansi',$instansi );
      $this->session->set_flashdata('phone',$phone );
      $this->session->set_flashdata('kota',$kota );
      $this->session->set_flashdata('alamat',$alamat );
      $this->session->set_flashdata('message', 'Email sudah ada');
      redirect('registrasi/register');
    }
    //--
    $tgl_registrasi = date('Y-m-d H:i:s');
    $status = 0;
    $tgl_aktivasi = '';
    $password =md5(sha1($password));

    $id_handler = $this->model->get_id_user();
    if($id_handler==false){
      $id = 1;
    }
    else{
      $id = $id_handler[0]['id']+1;
    }
    // var_dump($id);
    // exit();

    $handler =  $this->model->insertRegister($id,$nama,$email,$instansi,$phone,$alamat,$kota,$status,$password,$tgl_registrasi,$tgl_aktivasi);
    $handler = $this->model->getUser($email);
    $id = $handler[0]['id'];
    $id_encode = $this->encrypt->encode($id);
    $this->email_smtp($id_encode,$email);
    redirect('registrasi/aktivasi_akun');

  }

  public function aktivasi_akun(){
    $this->load->view('utama/header');
    $this->load->view('registrasi/tunggu-aktivasi');
    $this->load->view('utama/footer_aktivasi');
  }


  public function test(){
    $check = $this->model->findTest();
    // $handler = $this->model->getUser('reynaldoalfaputra@gmail.com');
    // var_dump($handler[0]['id']);
    // $check = $this->model->delete();
    var_dump($check);
  }

  public function email_smtp($id_encode,$email){
    $config = Array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.googlemail.com',
       'smtp_port' => 465,
       'smtp_user' => 'piketbanjir@jasatirta1.com',
       'smtp_pass' => 'PiketBanjirOK1234',
       'mailtype' => 'html',
       'charset' => 'iso-8859-1'
      );
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('piketbanjir@jasatirta1.com', 'Piket Banjir');
      $this->email->to($email);
      $this->email->subject('Aktivasi akun Sigab');
      $this->email->message("Klik <strong><a href='https://sigab.jasatirta1.co.id/index.php/registrasi/aktivasi_register/$id_encode' target='_blank' rel='noopener'>disini</a></strong> untuk aktivasi akun sigab.");
      // $this->email->message('Ini adalah email percobaan untuk Tutorial CodeIgniter: Mengirim Email via Gmail SMTP menggunakan Email Library CodeIgniter @ recodeku.blogspot.com');
      if (!$this->email->send()) {
       show_error($this->email->print_debugger());
      }else{
        // echo 'Success to send email';
      redirect('registrasi/aktivasi_akun');
      }
     }

     public function aktivasi_register($id=''){
      $id = $this->encrypt->decode($id);
      if($id==''){
        redirect('registrasi');
      }
      $id_handler = $this->model->findId($id);
      if($id_handler==false){
        redirect('registrasi');
      }
      else{
      $status = 1;
      $tgl_aktivasi = date('Y-m-d H:i:s');
      $handler =  $this->model->updateRegister($id,$status,$tgl_aktivasi);

      $this->session->set_flashdata('aktif', 'Akun kamu telah aktif');
      redirect('registrasi');
     }

     }



}
