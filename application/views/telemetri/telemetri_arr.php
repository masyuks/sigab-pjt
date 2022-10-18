

<!-- Start we-offer Area -->
<meta http-equiv="refresh" content="900"/>

<section class="we-offer-area section-gap" id="offer">

	<!-- // -->
	<div class="nav-new display-hide" >
		<div class="row pb-10" style="margin:10px">


			<div class="col-5" style="padding:0;border-right:2px solid white">
				<a href="<?php  echo base_url('index.php/telemetri/'); ?>" class="genric-btn default" style="width:100%;">WATER LEVEL</a>
			</div>
			<div class="col-5" style="padding:0;">
				<a href="#" class="genric-btn success" style="width:100%;">POS HUJAN</a>
			</div>
			<div class="col-2 pointer" style="padding:0;text-align:center" onclick="$('.nav-new').addClass('display-hide');$('.nav-new').removeClass('display-show');">
				<i class="lnr lnr-cross" style="font-size:25px;font-weight:bold;color:red;padding-top:3px;line-height:38px"></i>
			</div>
			<div class="div-home row table-toogle" style="Width:100%;height:auto; margin-top:5px;cursor:pointer;text-align:center">
				<div class="col-12" style="margin-left:15px;padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
					<p class="mb-0 clr2 f700">Wilayah Sungai <i class="arrow right"></i></p>
				</div>
			</div>
			<div class="div-home-2 display-show row" style="Width:100%;max-height:470px;overflow-x: scroll; margin:0">
					<a style="width:100%;display:inherit;cursor:pointer">
						<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;text-align:center">
							<p class="mb-0 clr2 fw500"><a href="<?php  echo base_url('index.php/telemetri/arr_ws1/'); ?>" style="width:100%;">Wilayah Sungai Brantas</a></p>
						</div>
					</a>
					<a style="width:100%;display:inherit;cursor:pointer" onclick="<?php base_url('index.php/telemetri/arr_ws2/'); ?>)">
						<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;text-align:center">
							<p class="mb-0 clr2 fw500"><a href="<?php  echo base_url('index.php/telemetri/arr_ws2/'); ?>" style="width:100%;">Wilayah Sungai Bengawan Solo</a></p>
						</div>
					</a>
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

			<div class="navbar-second col-md-12 pt-10">

				<div class="row pb-10">


					<div class="col-6" style="padding:0;border-right:2px solid white">
						<a href="<?php  echo base_url('index.php/telemetri/'); ?>" class="genric-btn default" style="width:100%;">WATER LEVEL</a>
					</div>
					<div class="col-6" style="padding:0;">
						<a href="#" class="genric-btn success" style="width:100%;">POS HUJAN</a>
					</div>
					<div class="div-home row table-toogle" style="Width:100%;height:auto; margin-top:5px;cursor:pointer;text-align:center">
				<div class="col-12" style="margin-left:15px;padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
					<p class="mb-0 clr2 f700">Wilayah Sungai <i class="arrow right"></i></p>
				</div>
			</div>
			<div class="div-home-2 display-show row" style="Width:100%;max-height:470px;overflow-x: scroll; margin:0">
					<a style="width:100%;display:inherit;cursor:pointer">
						<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;text-align:center">
							<p class="mb-0 clr2 fw500"><a href="<?php  echo base_url('index.php/telemetri/arr_ws1/'); ?>" style="width:100%;">Wilayah Sungai Brantas</a></p>
						</div>
					</a>
					<a style="width:100%;display:inherit;cursor:pointer" onclick="<?php base_url('index.php/telemetri/index_ws2/'); ?>)">
						<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;text-align:center">
							<p class="mb-0 clr2 fw500"><a href="<?php  echo base_url('index.php/telemetri/arr_ws1/'); ?>" style="width:100%;">Wilayah Sungai Bengawan Solo</a></p>
						</div>
					</a>
			</div>

				</div>
			</div>

			<div class="col-md-12 col-lg-12 pt-10 zindex-0">
				<div class="row pb-10">

					<div class="div-home row table-toogle" style="Width:100%;height:auto; margin:0;cursor:pointer;">
						<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Lokasi</p>
						</div>
						<div class="col-2 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
							<p class="mb-0 clr2 f700">Terakhir Update</p>
						</div>
						<div class="col-3 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6;text-align:right">
							<p class="mb-0 clr2 f700">Curah Hujan<br><span class="lowercase">(mm)</p>
						</div>
						<div class="col-3 " style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6;text-align:right">
							<p class="mb-0 clr2 f700">Cumulative<br><span class="lowercase">(mm)</p>
						</div>
					</div>
					<div class="div-home-2 display-show row" style="Width:100%;max-height:454px;overflow-x: scroll; margin:0">
						<?php foreach($data as $row){ ?>
						<div class="col-4" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
							<p class="mb-0 clr2 fw500" ><?php echo $row['nama']?></p>
						</div>
						<div class="col-2" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
  							<p class="mb-0 clr2 fw500" ><?php echo date('Y-m-d H:i',(strtotime($row['DATETIME'])));?></p>
						</div>
						<div class="col-3" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5;text-align:right">
  							<p class="mb-0 clr2 fw500" ><?php echo sprintf("%.2f",str_replace(',','.',$row['hourly_rf'])) ?></p>
						</div>
						<div class="col-3"  <?php  if($row['siaga']=='NORMAL'){ ?>style="padding:10px 15px;margin-bottom:4px;text-align:right;background-color:#f5f5f5"<?php } ?>
											<?php  if($row['siaga']=='HIJAU'){ ?>style="padding:10px 15px;margin-bottom:4px;text-align:right;background-color:#c4fb6d"<?php } ?>
											<?php  if($row['siaga']=='KUNING'){ ?>style="padding:10px 15px;margin-bottom:4px;text-align:right;background-color:#fddb3a"<?php } ?>
											<?php  if($row['siaga']=='MERAH'){ ?>style="padding:10px 15px;margin-bottom:4px;text-align:right;background-color:#fa163f"<?php } ?>
											<?php  if($row['siaga']=='SIAGA'){ ?>style="padding:10px 15px;margin-bottom:4px;text-align:right;background-color:#fa163f"<?php } ?> >
							<p class="mb-0 fw500" <?php  if($row['siaga']=='MERAH' || $row['siaga']=='SIAGA'){ ?>style="color:#ffffff"<?php } else{?>style="color:#222222"<?php }?>>
							<?php echo sprintf("%.2f",str_replace(',','.',$row['cumulative'])) ?></p>
						</div>
						
						<?php }?>
					</div>
			</div>
			<?php if($data[0]==NULL){ ?>
				<div style="padding-bottom:150px"></div>
			<?php }  ?>
			</div>

		</div>

	</div>
</section>
<!-- End we-offer Area -->
