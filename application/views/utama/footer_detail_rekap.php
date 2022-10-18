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

var lonLat = new OpenLayers.LonLat( <?php echo $data[0]['x'];?> ,<?php echo $data[0]['y'];?>).transform(epsg4326, projectTo);


var zoom=14;
map.setCenter (lonLat, zoom);
var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
<?php foreach($data as $row){ ?>
  // Define markers as "features" of the vector layer:

  semua = String("<p style='font-size:15px;line-height:20px;'>"
  +"<img style='max-width:300px;height:auto' src='<?php echo base_url();echo 'files/rekapbanjir/';echo $data[0]['path_foto']?>'></img><br>"
  +"</p>");
  var feature = new OpenLayers.Feature.Vector(
    new OpenLayers.Geometry.Point( <?php echo $data[0]['x'];?> ,<?php echo $data[0]['y'];?> ).transform(epsg4326, projectTo),
    {description:semua} ,
    {externalGraphic: '<?php echo base_url();echo 'assets/img/biru.png'?>', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
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

//--
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2q-Y__8vpee-_eKUx1qQE0IJ3XUf8Ns&callback=initMap" type="text/javascript"></script>

</body>
</html>
