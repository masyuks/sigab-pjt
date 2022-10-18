<section class="we-offer-area section-gap" id="offer">
  <div style="padding:0 15px;margin:0 15px;">
  <div class="div-rekap" class="container">
    <h3 class="mb-30">Register</h3>
    <form id="contactForm" action="<?php echo base_url(). 'index.php/registrasi/register_function'; ?>" method="post">

    <div class="form-group">
      <label for="contactNama" class="col-sm-2 control-label">Nama<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="nama" type="text" class="form-control" value="<?php if($this->session->flashdata('nama123')==TRUE){ echo $this->session->flashdata('nama123'); }?>" autocomplete="on" id="contactNama">
        <b class="nama-validate hide">Nama salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactEmail" class="col-sm-2 control-label">Email<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="email" type="email" class="form-control"  autocomplete="on" id="contactEmail">
        <b class="email-validate hide">Email salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactPassword" class="col-sm-2 control-label">Password<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="password" type="password" class="form-control" value="<?php if($this->session->flashdata('password')==TRUE){ echo $this->session->flashdata('password'); }?>" autocomplete="on" id="contactPassword">
        <b class="password-validate hide">Password salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactInstansi" class="col-sm-2 control-label">Instansi<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="instansi" type="text" class="form-control" value="<?php if($this->session->flashdata('instansi')==TRUE){ echo $this->session->flashdata('instansi'); }?>" autocomplete="on" id="contactInstansi">
        <b class="instansi-validate hide">Instansi salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactPhone" class="col-sm-2 control-label">Nomor Telepon<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="phone" type="number" class="form-control" value="<?php if($this->session->flashdata('phone')==TRUE){ echo $this->session->flashdata('phone'); }?>" autocomplete="on" id="contactPhone">
        <b class="phone-validate hide">Nomor Telepon salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactAlamat" class="col-sm-2 control-label">Alamat<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="alamat" type="text" class="form-control" value="<?php if($this->session->flashdata('alamat')==TRUE){ echo $this->session->flashdata('alamat'); }?>" autocomplete="on" id="contactAlamat">
        <b class="alamat-validate hide">Alamat salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactKota" class="col-sm-2 control-label">Kota<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="kota" type="text" class="form-control" value="<?php if($this->session->flashdata('kota')==TRUE){ echo $this->session->flashdata('kota'); }?>" autocomplete="on" id="contactKota">
        <b class="kota-validate hide">Kota salah</b>
      </div>
    </div>


    <div style="width:100;padding-left:16px">
    <button type="button" class="btn btn-info" id="contactButton" >Register</button>
    <?php if($this->session->flashdata('message')==TRUE) { ?>
    <b style="padding-left:10px;"><?php echo $this->session->flashdata('message');  ?></b>
  <?php }; ?>
    </div>
  </form>

  <p style="width:100;padding-left:16px;padding-top:10px">
    Sudah punya akun ? <a href="<?php  echo base_url('index.php/registrasi'); ?>"> klik disini </a>
  </p>

  </div>
  </div>

</section>
