<section class="we-offer-area section-gap" id="offer">
  <div class="div-rekap" style="padding:0 15px;margin:0 15px;">
  <div class="container">
    <?php if($this->session->flashdata('aktif')==TRUE) { ?>
      <b style=""><?php echo $this->session->flashdata('aktif');  ?></b>
    <?php }; ?>
    <h3 class="mb-30">Login </h3>
    <form id="contactForm" action="<?php echo base_url(). 'index.php/registrasi/login'; ?>" method="post">
    <div class="form-group">
      <label for="contactEmail" class="col-sm-2 control-label">Email<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="email" type="email" class="form-control" id="contactEmail">
        <b class="email-validate hide">Email salah</b>
      </div>
    </div>

    <div class="form-group">
      <label for="contactPassword" class="col-sm-2 control-label">Password<sup>*</sup></label>
      <div class="col-sm-12">
        <input name="password" type="password" class="form-control" id="contactPassword">
        <b class="password-validate hide">Password harus diisi</b>
      </div>
    </div>
    <div style="width:100;padding-left:16px">
    <button type="button" class="btn btn-info" id="contactButton" >Login</button>
    <?php if($this->session->flashdata('message')==TRUE) { ?>
    <b style="padding-left:10px;"><?php echo $this->session->flashdata('message');  ?></b>
  <?php }; ?>
    </div>
  </form>
   <!--
  <p style="width:100;padding-left:16px;padding-top:10px">
    Belum punya akun ? <a href="<?php  echo base_url('index.php/registrasi/register'); ?>"> klik disini </a>
  </p>
   -->

  </div>
  </div>

</section>
