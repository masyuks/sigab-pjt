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
function initmap(){
  map = new OpenLayers.Map("mapdiv");
  map.addLayer(new OpenLayers.Layer.OSM());

  var center = new OpenLayers.LonLat( 112.618634 ,-7.960996 )
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );
  var zoom=9;
  var lonLat = new OpenLayers.LonLat(112.618634 ,-7.960996 )
  .transform(
    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
    map.getProjectionObject() // to Spherical Mercator Projection
  );

  var markers = new OpenLayers.Layer.Markers( "Markers" );
  map.addLayer(markers);
  // markers.addMarker(new OpenLayers.Marker(lonLat));
  map.setCenter (center, zoom);
}
initmap();

function initMapSearch(data,key){
  // console.log('here');
  map = new OpenLayers.Map("mapdiv");
  map.addLayer(new OpenLayers.Layer.OSM());

  epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
  projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)


  var lonLat = new OpenLayers.LonLat( 112.2791952 ,-7.5611895 ).transform(epsg4326, projectTo);


  var zoom=9;
  map.setCenter (lonLat, zoom);
  var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
    // Define markers as "features" of the vector layer:
    for(i=0;i<data.length;i++){
    semua = String("<p style='font-size:15px;line-height:20px;margin-bottom:7px;min-width:200px'><strong>Desa : </strong>"+data[i].desa+" <br>"
    +"<strong>Mulai banjir : </strong>"+data[i].TANGGAL_MULAI+"<br>"
    +"<strong>Akhir banjir : </strong>"+data[i].TANGGAL_AKHIR+"<br>"
    +"<strong>FOTO : </strong><br>"
    +"<img style='max-height:70px;width:auto' src='<?php echo base_url();echo 'files/rekapbanjir/'?>"+data[i].path_foto+"'></img><br>"
    +"<div style='width:100%;text-align:center'>"
    +"<a class='genric-btn info radius' style='height: 30px;line-height: 30px;font-size: 13px;color:white' onclick='peta_detail(\""+key[i]+"\")'>Detail</a>"
    +"</div>"
    +"</p>");

    var feature = new OpenLayers.Feature.Vector(
      // new OpenLayers.Geometry.Point( data[i].y ,data[i].x ).transform(epsg4326, projectTo),
      new OpenLayers.Geometry.Point( data[i].x ,data[i].y ).transform(epsg4326, projectTo),
      {description:semua} ,
      {externalGraphic: '<?php echo base_url();echo 'assets/img/biru.png'?>', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
    );
    vectorLayer.addFeatures(feature);
    }
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
}

function cariSearch(){
  $('.loading').removeClass('hide');
  var year = $('#default-select option:selected').val();
  if(year!=''){
  var formDataNew = new FormData();
  formDataNew.append('year',year );
  $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>index.php/rekap/getRekap',
    data: formDataNew,
    cache : false,
    processData: false,
    contentType: false,
    success: function (data) {
      $('.loading').addClass('hide');
      var data1 = data.data.data;
      var key = data.data.key;
      $('.olMapViewport').remove();
      appendData(data1,key);
      initMapSearch(data1,key);
    },
    error: function (data) {
      $('.loading').addClass('hide');
      // alert('error');
      $('.olMapViewport').remove();
      initmap();
      alert('pencarian tidak ditemukan');
      $('.div-home-2 .col-md-12').remove();
      var search =
          '<div class="col-md-12" style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">' +
            '<p class="mb-0 clr2 fw500">Pencarian tidak ditemukan</p>' +
          '</div>';
      $(search).appendTo('.div-home-2');
    }
  });
}
}

function appendData(data,key){

  $('.div-home-2 .col-md-12').remove();
  for(i=0;i<data.length;i++){
  var search =
      '<div class="col-md-12 pointer" onclick="peta_detail(\''+key[i]+'\')"  style="padding:10px 15px;margin-bottom:4px;background-color:#f5f5f5">' +
        '<p class="mb-0 clr2 fw500">'+data[i].desa+'</p>' +
      '</div>';
  $(search).appendTo('.div-home-2');
}

}

function peta_detail(encrypt){
  // console.log(encrypt);
  window.location = "<?php  echo base_url('index.php/rekap/rekap_detail/'); ?>"+encrypt;
}

$(".table-toogle").click(function(){
  $('.arrow').toggleClass("right down");
  $('.div-home-2').toggleClass("display-show display-hide");

});
setTimeout(
  function()
  {
    $('.searchButton').click();
 }, 500);
</script>


</body>
</html>
