<!-- start footer Area -->
<footer class="footer-area" style="padding:10px">
  <div style="padding:0 15px;margin:0 15px;">


    <div class="row d-flex justify-content-between">
      <h4 class="col-12 footer-text m-0 text-white pt-10" style="padding-bottom:10px">KONTAK</h4>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><i class="fa fa-map-marker pr-15" aria-hidden="true"></i> Jalan Surabaya 2A Malang</p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><i class="fa fa-phone pr-15" aria-hidden="true"></i>(0341) 551 971</p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><i class="fa fa-envelope-o pr-15" aria-hidden="true"></i>piketbanjir@jasatirta1.com</p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><i class="fa fa-clock-o pr-15" aria-hidden="true"></i>Senin - Jumat : 07:00 - 16:00</p>
    </div>
    <div class="row d-flex justify-content-between" style="padding-top:10px">
      <h4 class="col-12 footer-text m-0 text-white pt-10" style="padding-bottom:10px">LINK</h4>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><a href="http://jasatirta1.co.id/id_ID/" target="_blank"  style="color:white"><img src="<?php echo base_url();?>assets/img/logo.png" alt="" style="width:25px;padding-right:7px" title="" />Perum Jasa Tirta I</a></p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><a href="https://www.bmkg.go.id" target="_blank"  style="color:white"><img src="<?php echo base_url();?>assets/img/bmkg.png" alt="" style="width:25px;padding-right:7px" title="" />BMKG</a></p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><a href="https://bnpb.go.id/" target="_blank"  style="color:white"><img src="<?php echo base_url();?>assets/img/bnpb.png" alt="" style="width:25px;padding-right:7px" title="" />BNPB</a></p>
      <p class="col-sm-12 col-lg-3 footer-text m-0 text-white "><a href="http://sda.pu.go.id/" target="_blank"  style="color:white"><img src="<?php echo base_url();?>assets/img/sda.jpg" alt="" style="width:25px;padding-right:7px" title="" /> Dirjen SDA PUPR</a></p>
    </div>
      <div class="row d-flex justify-content-between">
        <p class="col-lg-8 col-sm-12 footer-text m-0 text-white" style="padding-top:10px;">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Perusahaan Umum Jasa Tirta I
          <!-- This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
  </div>
</footer>
<!-- End footer Area -->

<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/easing.min.js"></script>
<script src="<?php echo base_url();?>assets/js/hoverIntent.js"></script>
<script src="<?php echo base_url();?>assets/js/superfish.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url();?>assets/js/parallax.min.js"></script>
<script src="<?php echo base_url();?>assets/js/mail-script.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script>

function validateText(id)
{
  if($("#"+id).val()==null || $("#"+id).val()=="")
  {
    var div = $("#"+id).closest("div");
    div.removeClass("has-success");
    $("#glypcn"+id).remove();
    div.addClass("has-error has-feedback");
    div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
    $('.password-validate').removeClass("hide");
    return false;
  }
  else{
    var div = $("#"+id).closest("div");
    div.removeClass("has-error");
    $("#glypcn"+id).remove();
    div.addClass("has-success has-feedback");
    div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
    $('.password-validate').addClass("hide");
    return true;
  }

}

function validateEmail(id)
{
  var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
  if(!email_regex.test($("#"+id).val()))
  {
    var div = $("#"+id).closest("div");
    // var b = $("#"+id).closest("b");
    div.removeClass("has-success");
    $("#glypcn"+id).remove();
    div.addClass("has-error has-feedback");
    $('.email-validate').removeClass("hide");
    div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
    return false;
  }
  else{
    var div = $("#"+id).closest("div");
    div.removeClass("has-error");
    $("#glypcn"+id).remove();
    div.addClass("has-success has-feedback");
    div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
    $('.email-validate').addClass("hide");
    return true;
  }

}

$(document).ready(
  function()
  {
    $("#contactButton").click(function()
    {
      if(validateEmail("contactEmail")&&validateText("contactPassword"))
      {
        $("form#contactForm").submit();
      }
      else{
        return false;
      }
    }

  );
}


);
</script>
