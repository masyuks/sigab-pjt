<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="codepixer">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Sistem Informasi Siaga Banjir</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!--
  CSS
  ============================================= -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/linearicons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
</head>

<style>
body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
}

.bg-alpha-black{
  background-color:rgba(0, 0, 0, 0.9);
}

.red-disclaimer{
  color : #dc1c1c;
}

.disclaimer-height{
  max-height: 460px;
  overflow: scroll;
}

@media (max-width: 768px) {
    .disclaimer-height{
		height: 350px;
	}
}

</style>

<body class=" bg-alpha-black">
  <div class="container">

    <div class="row d-flex justify-content-center" style="background:#f9f9ff;padding:15px;border-radius:10px;padding-top:50px;padding-bottom:50px;">
      <div class="menu-content col-lg-11">
        <div class="title text-center disclaimer-height">
          <h1 class="mb-10 red-disclaimer" style="font-size:50px">Disclaimer</h1>
          <h5 class="mb-20" style="line-height:25px !important;font-size:17px;">Informasi yang terdapat dalam website sigab.jasatirta1.co.id ini adalah untuk tujuan umum saja. Informasi ini disediakan oleh sigab.jasatirta1.co.id dan kami senantiasa berusaha untuk menjaga informasi yang aktual dan benar. Kami tidak membuat pernyataan atau jaminan apapun, tersurat maupun tersirat, tentang akurasi kelengkapan, kesesuaian, atau ketersediaan ke situs web atau informasi, produk, jasa, atau gambar terkait yang terdapat pada website ini untuk tujuan apapun. Setiap ketergantungan yang anda tempatkan pada informasi tersebut adalah risiko anda sendiri.

Dalam hal apapun kami tidak bertanggung jawab atas kerugian atau kerusakan termasuk tanpa batasan, kerugian tidak langsung atau kerusakan apapun yang timbul dari hilangnya data atau keuntungan yang timbul dari penggunaan website ini.

Melalui website ini anda dapat me-link ke situs-situs lain yang tidak di bawah kendali sigab.jasatirta1.co.id. Kami tidak memiliki kontrol atas isi, sifat dan ketersediaan situs-situs tersebut.

Setiap upaya dilakukan untuk menjaga situs web dan berjalan lancar. Namun, sigab.jasatirta1.co.id tidak bertanggung jawab atas website yang sementara tidak tersedia karena masalah teknis di luar kendali kami</h5>
          <button class="genric-btn success radius" style="font-size:16px;height:50px;" onclick="disclaimer_agree()">Lanjut</button>
        </div>
      </div>
    </div>

  </div>

</body>
<script>
function disclaimer_agree(){
  window.location = "<?php  echo base_url('index.php/disclaimer/disclaimer'); ?>";
}
</script>
</html>
