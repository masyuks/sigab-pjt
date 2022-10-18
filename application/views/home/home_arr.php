

<!-- Start we-offer Area -->
<section class="we-offer-area section-gap" id="offer">

	<!-- // -->
	<div class="nav-new display-hide" >
		<div class="row pb-10" style="margin:10px">


			<div class="col-5" style="padding:0;border-right:2px solid white">
				<a href="<?php  echo base_url('index.php/home/'); ?>" class="genric-btn default" style="width:100%;">WATER LEVEL</a>
			</div>
			<div class="col-5" style="padding:0;">
				<a href="#" class="genric-btn success " style="width:100%;">POS HUJAN</a>
			</div>
			<div class="col-2 pointer" style="padding:0;text-align:center" onclick="$('.nav-new').addClass('display-hide');$('.nav-new').removeClass('display-show');">
				<i class="lnr lnr-cross" style="font-size:25px;font-weight:bold;color:red;padding-top:3px;line-height:38px"></i>
			</div>

			<div class="col-12" style="padding:0;padding-bottom:10px;">
				<div class="input-group-icon mt-10">
					<input type="text" value="<?php echo $search['parameter'] ?>" placeholder="Cari Stasiun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Stasiun'" required="" class="single-input search-daerah" style="padding-left:20px;background:#f3f3f3">
					<?php if($search['parameter']==false){ ?>
					<div onclick="search_func_arr($('.search-daerah').val())" class="icon" style="right:20px;left:inherit;cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i></div>
				<?php } else{ ?>
					<a href="<?php  echo base_url('index.php/home/arr'); ?>">
					<div  class="icon" style="right:20px;left:inherit;cursor:pointer"><i class="fa fa-close" aria-hidden="true"></i></div>
				</a>
				<?php } ?>
				</div>
			</div>

			<div class="div-home row table-toogle" style="Width:100%;height:auto; margin:0;cursor:pointer;">
				<div class="col-6" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
					<p class="mb-0 clr2 f700">Nama Stasiun</p>
				</div>
				<div class="col-6 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
					<p class="mb-0 clr2 f700">Status <i class="arrow right"></i></p>
				</div>
			</div>
			<div class="div-home-2 display-show row" style="Width:100%;max-height:470px;overflow-x: scroll; margin:0">
				<?php foreach($data as $row){ ?>
					<a style="width:100%;display:inherit;cursor:pointer" onclick="peta_detail('<?php echo $this->encrypt->encode($row['TableData']); ?>')">
						<div class="col-md-6" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;">
							<p class="mb-0 clr2 fw500"><?php echo $row['nama']?></p>
						</div>
						<div class="col-md-6"	style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
							<p class="mb-0 clr2 fw500"><?php echo $row['siaga']?></p>
							<div
							<?php if($row['siaga']=='NORMAL'){ ?>class="siaga-biru"<?php } ?>
							<?php  if($row['siaga']=='HIJAU'){ ?>class="siaga-hijau "<?php } ?>
							<?php  if($row['siaga']=='KUNING'){ ?>class="siaga-kuning "<?php } ?>
							<?php  if($row['siaga']=='MERAH'){ ?>class="siaga-merah"<?php } ?>
							<?php  if($row['siaga']=='SIAGA'){ ?>class="siaga-merah"<?php } ?>
							style="border-radius: 50%;border: 2px solid #ffffff;width: 20px;height: 20px; display: inline-block;position: absolute;right: 0;top:13px;margin-right: 10px;"></div>
						</div>
					</a>

				<?php } ?>

			</div>

		</div>
	</div>
	<!-- // -->

	<div style="padding:0 15px;margin:0 15px;" class="div-rekap">

		<div class="row" style="justify-content:center">
			<div class="nav-special col-lg-1 pointer" style="text-align:center"  onclick="$('.nav-new').addClass('display-show');$('.nav-new').removeClass('display-hide');">
				<i class="lnr lnr-menu" style="font-size:30px;color:red;font-weight:bold;line-height:40px"></i>
			</div>
			<div class="col-lg-11 col-md-12" style="width:95%;max-width:95%;border-radius: 25px;background: #f3f3f3;padding: 5px 10px;padding-top: 10px;">
				<marquee behavior="scroll" direction="left" class="f700">
					<?php foreach($highlight as $row){
						echo $row['highlight'];
						echo "<span style='padding-right:200px'></span>";
					}
					?>

				</marquee>
			</div>

			<div class="navbar-second col-md-12 pt-10">

				<div class="row pb-10">


					<div class="col-6" style="padding:0;border-right:2px solid white">
						<a href="<?php  echo base_url('index.php/home/'); ?>" class="genric-btn default" style="width:100%;">WATER LEVEL</a>
					</div>
					<div class="col-6" style="padding:0;">
						<a href="#" class="genric-btn success " style="width:100%;">POS HUJAN</a>
					</div>

					<div class="col-12" style="padding:0;padding-bottom:10px;">
						<div class="input-group-icon mt-10">
							<input type="text" value="<?php echo $search['parameter'] ?>" placeholder="Cari Stasiun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Stasiun'" required="" class="single-input search-daerah-2" style="padding-left:20px;background:#f3f3f3">
							<?php if($search['parameter']==false){ ?>
							<div onclick="search_func_arr($('.search-daerah-2').val())" class="icon" style="right:20px;left:inherit;cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i></div>
						<?php } else{ ?>
							<a href="<?php  echo base_url('index.php/home/arr'); ?>">
							<div  class="icon" style="right:20px;left:inherit;cursor:pointer"><i class="fa fa-close" aria-hidden="true"></i></div>
						</a>
						<?php } ?>
						</div>
					</div>

					<div class="div-home row table-toogle" style="Width:100%;height:auto; margin:0;cursor:pointer;">
						<div class="col-6" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Nama Stasiun</p>
						</div>
						<div class="col-6 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Status <i class="arrow right"></i></p>
						</div>
					</div>
					<div class="div-home-2 display-show row" style="Width:100%;max-height:352px;overflow-x: scroll; margin:0">
						<?php foreach($data as $row){ ?>
							<a style="width:100%;display:inherit;cursor:pointer" onclick="peta_detail('<?php echo $this->encrypt->encode($row['TableData']); ?>')">
								<div class="col-md-6" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;">
									<p class="mb-0 clr2 fw500"><?php echo $row['nama']?></p>
								</div>
								<div class="col-md-6"	style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
									<p class="mb-0 clr2 fw500"><?php echo $row['siaga']?></p>
									<div
									<?php if($row['siaga']=='NORMAL'){ ?>class="siaga-biru"<?php } ?>
									<?php  if($row['siaga']=='HIJAU'){ ?>class="siaga-hijau "<?php } ?>
									<?php  if($row['siaga']=='KUNING'){ ?>class="siaga-kuning "<?php } ?>
									<?php  if($row['siaga']=='MERAH'){ ?>class="siaga-merah"<?php } ?>
									<?php  if($row['siaga']=='SIAGA'){ ?>class="siaga-merah"<?php } ?>
									style="border-radius: 50%;border: 2px solid #ffffff;width: 20px;height: 20px; display: inline-block;position: absolute;right: 0;top:13px;margin-right: 10px;"></div>
								</div>
							</a>

						<?php } ?>

					</div>

				</div>
			</div>

			<div class="col-md-12 col-lg-12 pt-10 zindex-0">
				<div id="mapdiv" class="maps">
					<h3 style="position: absolute;z-index: 9999;right: 35px;top:20px">Pos Hujan</h3>
				</div>
				<!-- <div id="map" class="maps">
				</div> -->
			</div>

		</div>

	</div>
</section>
<!-- End we-offer Area -->
