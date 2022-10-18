

<!-- Start we-offer Area -->
<section class="we-offer-area section-gap" id="offer">
	<div style="padding:0 15px;margin:0 15px;" class="div-rekap">

		<div class="row" style="justify-content:center">

			<div class="col-md-12" style="width:95%;max-width:95%;border-radius: 25px;background: #f3f3f3;padding: 5px 10px;padding-top: 10px;">
				<marquee behavior="scroll" direction="left" class="f700">
					<?php
					/*
					if($highlight!=false) { foreach($highlight as $row){
						echo $row['highlight'];
						echo "<span style='padding-right:200px'></span>";
					}
					}
					*/
					?>

				</marquee>
			</div>

			<div class="col-md-12 col-lg-12 pt-10">

				<div class="row pb-10">

					<div class="div-home row table-toogle" style="Width:100%;height:auto; margin:0;cursor:pointer;">
						<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Tanggal</p>
						</div>
						<div class="col-4 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">WS</p>
						</div>
						<div class="col-4 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Unduh</p>
						</div>
					</div>
					<div class="div-home-2 display-show row" style="Width:100%;max-height:454px;overflow-x: scroll; margin:0">

							<?php	if(empty(($this->session->userdata('nama')))) { ?>
								<div class="col-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<p class="mb-0 clr2 fw500" >Untuk download PDF harap registrasi terlebih dahulu</p>
								</div>
							<?php } else { ?>
								<?php if($data[0]!=NULL){ foreach($data as $row){ ?>
								<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<p class="mb-0 clr2 fw500" ><?php echo $row['tanggal_buat']?></p>
								</div>
								<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
  									<p class="mb-0 clr2 fw500" ><?php echo $row['nama']?></p>
								</div>
								<?php	if(empty(($this->session->userdata('email')))) { ?>
								<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<a onclick="downloadPDF()" class="genric-btn primary radius ml-15" style="padding:0 20px;line-height:35px">PDF</a>
								</div>
								<?php }else{ ?>
								<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<a href="<?php echo base_url('index.php/harian/downloadPDF/');echo $this->encrypt->encode($row['filename']);?> " class="genric-btn primary radius ml-15" style="padding:0 20px;line-height:35px">PDf</a>
								</div>
									<?php } ?>
							<?php } }else{ ?>
								<div class="col-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<p class="mb-0 clr2 fw500" >Data belum ditemukan</p>
								</div>
							<?php } } ?>


				</div>
			</div>
			<?php if($data[0]==NULL){ ?>
				<div style="padding-bottom:150px"></div>
			<?php }  ?>
			</div>

			<!-- <div class="col-md-12 col-lg-8 pt-10 zindex-0">
				<div id="mapdiv" class="maps"></div>
			</div> -->

		</div>

	</div>
</section>
<!-- End we-offer Area -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Download PDF</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p class="pl-15">Sebelum melakukan download dapat mengisi form dibawah<sup>*</sup></p>
				<form id="contactForm" action="<?php echo base_url(). 'index.php/harian/getPDF'; ?>" method="post">
					<div class="form-group">
						<label for="contactEmail" class="col-sm-2 control-label">Nama<sup>*</sup></label>
						<div class="col-sm-12">
							<input name="nama" type="text" class="form-control" id="contactNama">
							<b class="nama-validate hide">Nama salah</b>
						</div>
					</div>
					<div class="form-group">
						<label for="contactEmail" class="col-sm-2 control-label">Instansi<sup>*</sup></label>
						<div class="col-sm-12">
							<input name="instansi" type="text" class="form-control" id="contactInstansi">
							<b class="instansi-validate hide">Instansi salah</b>
						</div>
					</div>
					<div class="form-group">
						<label for="contactEmail" class="col-sm-2 control-label">Email<sup>*</sup></label>
						<div class="col-sm-12">
							<input name="email" type="email" class="form-control" id="contactEmail">
							<b class="email-validate hide">Email salah</b>
						</div>
					</div>
					<input name="id" type="hidden" value="<?php $this->encrypt->encode($row['filename']);?>">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="contactButton" >Kirim</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
