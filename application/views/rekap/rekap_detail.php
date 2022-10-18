

<!-- Start we-offer Area -->
<section class="we-offer-area section-gap" id="offer">
	<div style="padding:0 15px;margin:0 15px;" class="div-rekap">

		<div class="row">
			<div class="col-md-12 col-lg-4">

				<div class="row pb-10">

					<div class="row" style="width:100%">
						<div class="col-9">
							<h4 class="pl-15 pb-10 pt-10"><a href="<?php  echo base_url('index.php/rekap/'); ?>"><i class="fa fa-arrow-left" aria-hidden="true" style="padding-right:10px;"></i></a>Detail Informasi</h4>
						</div>
						</div>

						<div class="row pt-10 pl-15" style="width:100%">
							<div class="pl-15 col-12">
							<img id="myImg" src="<?php echo base_url();echo 'files/rekapbanjir/';echo $data[0]['path_foto']?>" style="width:100%;">
					</div>
					</div>
					<div class="hrc"></div>

					<p class="detail-informasi-text">X</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $new['x']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Y</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $new['y']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Tahun</p>
					<p class="detail-informasi-text f700 clr2 "><?php echo $data[0]['tahun']?></p>
					<div class="hrc"></div>


					<p class="detail-informasi-text">Tanggal mulai banjir</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['TANGGAL_MULAI']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Tanggal selesai banjir</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['TANGGAL_AKHIR']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Desa</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['desa']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Sungai</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['river']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Kecamatan</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['kecamatan']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Kabupaten Kota</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['kabkota']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Nama WS</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['nama']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Tinggi Genangan</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $data[0]['tinggi_genangan']?> cm</p>
					<div class="hrc"></div>

					<p class="detail-informasi-text f700 clr2">Keterangan</p>
					<p class="detail-informasi-text"></p>
					<p class="detail-informasi-text" style="width:100%"><?php echo $data[0]['keterangan']?></p>
					<div class="hrc"></div>


				</div>

	</div>

	<div class="col-md-12 col-lg-8 pt-10 zindex-0">
		<!-- <div id="map" class="maps">
	</div> -->
	<div id="mapdiv" class="maps"></div>
</div>

</div>

</div>
</section>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<!-- End we-offer Area -->
