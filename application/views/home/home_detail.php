

<!-- Start we-offer Area -->
<section class="we-offer-area section-gap" id="offer">
	<div style="padding:0 15px;margin:0 15px;" class="div-rekap">

		<div class="row">
			<div class="col-md-12 col-lg-4">

				<div class="row pb-10">

					<div class="row" style="width:100%">
						<div class="col-9">
							<h4 class="pl-15 pt-10"><a href="<?php  echo base_url('index.php/home/'); ?>"><i class="fa fa-arrow-left" aria-hidden="true" style="padding-right:10px;"></i></a>Detail Informasi</h4>
						</div>
						<div class="col-3" style="text-align:right;padding-right:0;padding-left:0">
							<?php	if(empty(($this->session->userdata('email')))) { ?>

						<?php }else{ ?>
							<a href="#" class="genric-btn primary radius ml-15" style="padding:0 20px;line-height:35px" onclick="downloadPDF1()">PDf</a>
						<?php } ?>
						</div>
					</div>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Nama Stasiun</p>
					<p class="detail-informasi-text f700 clr2 "><?php echo $detail[0]['nama']?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Tipe Stasiun</p>
					<p class="detail-informasi-text f700 clr2">Water Level</p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Terakhir di update</p>
					<p class="detail-informasi-text f700 clr2"><?php echo $table[0]['DATETIME'] ?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Status Siaga Elevasi</p>
					<p class="st-siaga
					<?php if($table[0]['wl_siaga']=='NORMAL'){ ?>siaga-biru<?php } ?>
					<?php  if($table[0]['wl_siaga']=='HIJAU'){ ?>siaga-hijau<?php } ?>
					<?php  if($table[0]['wl_siaga']=='KUNING'){ ?>siaga-kuning<?php } ?>
					<?php  if($table[0]['wl_siaga']=='MERAH'){ ?>siaga-merah<?php } ?>
					clr2 f700"><?php echo $table[0]['wl_siaga'] ?></p>
					<div class="hrc"></div>

					<p class="detail-informasi-text">Status Siaga Debit</p>
					<p class="st-siaga
					<?php if($table[0]['disch_siaga']=='NORMAL'){ ?>siaga-biru<?php } ?>
					<?php  if($table[0]['disch_siaga']=='HIJAU'){ ?>siaga-hijau<?php } ?>
					<?php  if($table[0]['disch_siaga']=='KUNING'){ ?>siaga-kuning<?php } ?>
					<?php  if($table[0]['disch_siaga']=='MERAH'){ ?>siaga-merah<?php } ?>
					clr2 f700"><?php echo $table[0]['disch_siaga'] ?></p>
					<div class="hrc"></div>


				</div>
				<?php if($detail[0]['objecttype']=='RIVER'){ ?>
					<div class="progress-table-wrap mb-10" style="height:320px">
						<div class="progress-table">
							<div class="table-head">
								<div class="coloumn-1">JAM</div>
								<div class="coloumn-1">TMA <br><span class="lowercase">(m)</span></div>
								<div class="coloumn-1">Debit<br><span class="lowercase">(m3/s)</span></div>
							</div>

							<?php for($i=0;$i<count($table);$i++) { ?>
								<div class="table-row
								<?php  if($table[$i]['wl_siaga']=='HIJAU'){ ?>siaga-hijau f700<?php } ?>
								<?php  if($table[$i]['wl_siaga']=='KUNING'){ ?>siaga-kuning f700<?php } ?>
								<?php  if($table[$i]['wl_siaga']=='MERAH'){ ?>siaga-merah color-white f700<?php } ?>
								">
								<div class="coloumn-1"><?php echo $time[$i] ?></div>
								<div class="coloumn-1"><?php echo sprintf("%.2f",str_replace(',','.',$table[$i]['tma'])) ?></div>
								<div class="coloumn-1"><?php echo sprintf("%.2f",$table[$i]['discharge']) ?></div>
							</div>
						<?php }  ?>

					</div>
				</div>
			<?php }else{  ?>
				<div class="progress-table-wrap mb-10" style="height:320px">
					<div class="progress-table">
						<div class="table-head">
							<div class="coloumn-1">JAM</div>
							<div class="coloumn-1">TMA</div>
							<div class="coloumn-1">INFLOW <span class="lowercase">(m3/s)</span></div>
							<div class="coloumn-1">OUTFLOW <span class="lowercase">(m3/s)</span></div>
						</div>

						<?php for($i=0;$i<count($table);$i++) { ?>
							<div class="table-row
							<?php  if($table[$i]['wl_siaga']=='HIJAU'){ ?>siaga-hijau f700<?php } ?>
							<?php  if($table[$i]['wl_siaga']=='KUNING'){ ?>siaga-kuning f700<?php } ?>
							<?php  if($table[$i]['wl_siaga']=='MERAH'){ ?>siaga-merah color-white f700<?php } ?>
							">
							<div class="coloumn-1"><?php echo $time[$i] ?></div>
							<div class="coloumn-1"><?php echo sprintf("%.2f",$table[$i]['tma']) ?></div>
							<div class="coloumn-1"><?php echo sprintf("%.2f",$table[$i]['discharge_inflow']) ?></div>
							<div class="coloumn-1"><?php echo sprintf("%.2f",$table[$i]['discharge']) ?></div>
						</div>
					<?php }  ?>

				</div>
			</div>
		<?php } ?>

	</div>

	<div class="col-md-12 col-lg-8 pt-10 zindex-0">
		<!-- <div id="map" class="maps">
	</div> -->
	<div id="mapdiv" class="maps"></div>
</div>

</div>

</div>
</section>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Download PDF</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p class="pl-15">Sebelum melakukan download dapat mengisi form dibawah<sup>*</sup></p>
				<form id="contactForm" action="<?php echo base_url(). 'index.php/home/getPDF'; ?>" method="post">
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
					<input name="id" type="hidden" value="<?php echo $id;?>">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="contactButton" >Kirim</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- End we-offer Area -->
