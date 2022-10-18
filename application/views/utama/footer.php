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
<script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/OpenLayers.js"></script>
<script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)


    var lonLat = new OpenLayers.LonLat( 112.2791952 ,-7.5611895 ).transform(epsg4326, projectTo);


    var zoom=9;
    map.setCenter (lonLat, zoom);
    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
      <?php foreach($data as $row){ ?>
    // Define markers as "features" of the vector layer:

    semua = String("<p style='font-size:15px;line-height:20px;margin-bottom:7px'><strong>Daerah :</strong> <?php echo $row['nama'];?><br>"
    +"<strong>Nama Stasiun :</strong> <?php echo $row['nama_station']?><br>"
    +"<strong>Tipe :</strong> <?php echo $row['objecttype']?><br>"
    +"<strong>Tinggi Permukaan Air :</strong> <?php echo $row['tma']?><br>"
    +"<strong>Status Siaga :</strong> <?php echo $row['wl_siaga']?><br>"
    +"<strong>Waktu :</strong> <?php echo $row['DATETIME']?><br>"
    +"<div style='width:100%;text-align:center'>"
    +"<a class='genric-btn info radius' style='height: 30px;line-height: 30px;font-size: 13px;color:white' onclick='peta_detail(\"<?php echo $this->encrypt->encode($row['TableData']); ?>\")'>Detail</a>"
    +"</div>"
    +"</p>");

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( <?php echo $row['x']?> ,<?php echo $row['y']?> ).transform(epsg4326, projectTo),
            {description:semua} ,
            <?php if($row['wl_siaga']=='NORMAL'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/biru.png'?>', graphicHeight: 25, graphicWidth: 25, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($row['wl_siaga']=='HIJAU'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/hijau-01.png'?>', graphicHeight: 25, graphicWidth: 25, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($row['wl_siaga']=='KUNING'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/kuning-01.png'?>', graphicHeight: 25, graphicWidth: 25, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($row['wl_siaga']=='MERAH'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/merah-01.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
        );
    vectorLayer.addFeatures(feature);


  <?php } ?>
  map.addLayer(vectorLayer);



    //Add a selector control to the vectorLayer with popup functions
    var controls = {
      selector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
    };

    function createPopup(feature) {
      feature.popup = new OpenLayers.Popup.FramedCloud("pop",
          feature.geometry.getBounds().getCenterLonLat(),
          null,
          '<div class="markerContent">'+feature.attributes.description+'</div>',
          null,
          true,
          function() { controls['selector'].unselectAll(); }
      );
      //feature.popup.closeOnMove = true;
      map.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }

    map.addControl(controls['selector']);
    controls['selector'].activate();


$(".table-toogle").click(function(){
  $('.arrow').toggleClass("right down");
  $('.div-home-2').toggleClass("display-show display-hide");

});

    function goHome(){
      window.location = "<?php  echo base_url('index.php/home/');?>";
    }

    function search_func(val){
      if(val=='')
      {alert('data pencarian tidak boleh kosong');}
      else{
        val = val.replace(/ /g,'-');
        window.location = "<?php  echo base_url('index.php/home/search/'); ?>"+val;
      }
    }
    function peta_detail(encrypt){
      // console.log(encrypt);
      window.location = "<?php  echo base_url('index.php/home/home_detail/'); ?>"+encrypt;
    }

    $(document).ready(
      function()
      {
        $(".search-daerah").keyup(function(event) {
            if (event.keyCode === 13) {
                search_func($('.search-daerah').val());
            }
        });
        $(".search-daerah-2").keyup(function(event) {
            if (event.keyCode === 13) {
                search_func($('.search-daerah-2').val());
            }
        });
    }


    );


</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2q-Y__8vpee-_eKUx1qQE0IJ3XUf8Ns&callback=initMap" type="text/javascript"></script>

</body>
</html>
