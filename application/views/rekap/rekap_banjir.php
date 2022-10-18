

<!-- Start we-offer Area -->
<div class=" loading hide">Loading&#8230;</div>
<section class="we-offer-area section-gap" id="offer">

	<!-- // -->
	<div class="nav-new display-hide">
		<div class="row pb-10" style="margin:10px;max-height:550px">


			<div class="col-10" style="padding:0;border-right:2px solid white">
			</div>
			<div class="col-2 pointer" style="padding:0;text-align:right;padding-bottom:10px" onclick="$('.nav-new').addClass('display-hide');$('.nav-new').removeClass('display-show');">
				<i class="lnr lnr-cross" style="font-size:25px;font-weight:bold;color:red;padding-top:3px;line-height:38px"></i>
			</div>

			<div class="col-12" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
				<p class="mb-0 clr2 f700">Nama Desa</p>
			</div>
			<div class="div-home-2 display-show row" style="Width:100%;max-height:470px;overflow-x: scroll; margin:0">
				<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
					<p class="mb-0 clr2 fw500">Pencarian belum ditemukan</p>
				</div>

			</div>

		</div>
	</div>
	<!-- // -->



	<div style="padding:0 15px;margin:0 15px;" class="div-rekap">

		<div class="row" style="justify-content:center">



			<div class="col-md-12" style="display:flex">
				<div class="nav-special pointer" style="padding-right:10px" onclick="$('.nav-new').addClass('display-show');$('.nav-new').removeClass('display-hide');">
					<i class="lnr lnr-menu" style="font-size:30px;color:red;font-weight:bold;line-height:40px"></i>
				</div>
        <div class="single-element-widget ">
          <div class="default-select display-inline zindex-996" id="default-select">
            <select class="zindex-996">
              <option value="" disabled>Pilih tahun</option>
              <option value="2015" <?php if(date("Y")=='2015'){echo "selected"; }?>>2015</option>
              <option value="2016" <?php if(date("Y")=='2016'){echo "selected"; }?>>2016</option>
              <option value="2017" <?php if(date("Y")=='2017'){echo "selected"; }?>>2017</option>
              <option value="2018" <?php if(date("Y")=='2018'){echo "selected"; }?>>2018</option>
              <option value="2019" <?php if(date("Y")=='2019'){echo "selected"; }?>>2019</option>
              <option value="2020" <?php if(date("Y")=='2020'){echo "selected"; }?>>2020</option>
              <option value="2021" <?php if(date("Y")=='2021'){echo "selected"; }?>>2021</option>
              <option value="2022" <?php if(date("Y")=='2022'){echo "selected"; }?>>2022</option>
            </select>
          </div>
        </div>
        <button class="genric-btn success radius searchButton" style="margin-left:5px" onclick="cariSearch();">Cari</button>
			</div>

			<div class="navbar-second col-md-12 pt-10">
				<div class="div-home row table-toogle" style="Width:100%;height:auto; margin:0;cursor:pointer;">
					<div class="col-12" style="padding:10px 15px;margin-bottom:4px;background-color:#e6e6e6">
						<p class="mb-0 clr2 f700">Nama Desa<i class="arrow right"></i></p>
					</div>
				</div>
				<div class="div-home-2 display-show row" style="Width:100%;max-height:470px;overflow-x: scroll; margin:0">
					<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">
						<p class="mb-0 clr2 fw500">Pencarian belum ditemukan</p>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-lg-12 pt-10 zindex-0">
				<!-- <div id="map" class="maps">
				</div> -->
				<div id="mapdiv" class="maps"></div>
			</div>

		</div>

	</div>
</section>
<!-- End we-offer Area -->
