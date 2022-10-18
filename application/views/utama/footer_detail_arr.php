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

    var lonLat = new OpenLayers.LonLat( <?php echo $detail[0]['x'];?> ,<?php echo $detail[0]['y'];?>).transform(epsg4326, projectTo);


    var zoom=14;
    map.setCenter (lonLat, zoom);
    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
      <?php foreach($data as $row){ ?>
    // Define markers as "features" of the vector layer:

    semua = String("<p style='font-size:15px;line-height:20px;'><strong>Daerah :</strong> <?php echo $detail[0]['nama'];?><br>"
    +"<strong>Nama Stasiun :</strong> <?php echo $table[0]['nama_station']?><br>"
    +"<strong>Curah Hujan :</strong> <?php echo $table[0]['hourly_rf']?> mm<br>"
    +"<strong>Kumulatif :</strong> <?php echo $table[0]['cumulative']?> mm<br>"
    +"</p>");
    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( <?php echo $detail[0]['x'];?> ,<?php echo $detail[0]['y'];?> ).transform(epsg4326, projectTo),
            {description:semua} ,
            <?php if($table[0]['siaga']=='NORMAL') { if($table[0]['hourly_rf']==0 ){ ?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/biru-arr.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } else { ?>
              {externalGraphic: '<?php echo base_url();echo 'assets/img/rain-01.png'?>', graphicHeight: 30, graphicWidth: 25, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } } ?>
            <?php if($table[0]['siaga']=='HIJAU'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/hijau-arr.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($table[0]['siaga']=='KUNING'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/kuning-arr.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($table[0]['siaga']=='MERAH'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/merah-arr.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
            <?php } ?>
            <?php if($table[0]['siaga']=='SIAGA'){?>
            {externalGraphic: '<?php echo base_url();echo 'assets/img/merah-arr.png'?>', graphicHeight: 25, graphicWidth: 20, graphicXOffset:-12, graphicYOffset:-25  }
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

  </script>
<script>
  var map;
      function initMap() {

      var infowindow = new google.maps.InfoWindow();

      var myLatLng = {lat: <?php echo $detail[0]['y'];?>, lng: <?php echo $detail[0]['x'];?>};

      map = new google.maps.Map(document.getElementById("map"), {
        center: {lat:  <?php echo $detail[0]['y'];?>, lng:  <?php echo $detail[0]['x'];?>},
        zoom: 12
      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      });

      semua = String("<p style='font-size:15px;line-height:20px;'><strong>Daerah :</strong> <?php echo $detail[0]['nama'];?><br>"
      +"<strong>Nama Stasiun :</strong> <?php echo $table[0]['nama_station']?><br>"
      +"<strong>Curah Hujan :</strong> <?php echo $table[0]['hourly_rf']?> mm<br>"
      +"<strong>Kumulatif :</strong> <?php echo $table[0]['cumulative']?> mm<br>"
      +"</p>");

      marker.infowindow = new google.maps.InfoWindow({ content: semua });

      google.maps.event.addListener(marker, 'click', function () {
        infowindow.close();
        this.infowindow.open(map, this);
      });
    }

    function downloadPDF(){
      $('#myModal').modal('show');
    }

    function downloadPDF1(){
      window.location = "<?php  echo base_url('index.php/home/getPDF/'); ?><?php echo $id; ?>";
    }


    function validateText(id)
    {
      if($("#"+id).val()==null || $("#"+id).val()=="")
      {
        var div = $("#"+id).closest("div");
        div.removeClass("has-success");
        $("#glypcn"+id).remove();
        div.addClass("has-error has-feedback");
        div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
        $('.instansi-validate').removeClass("hide");
        return false;
      }
      else{
        var div = $("#"+id).closest("div");
        div.removeClass("has-error");
        $("#glypcn"+id).remove();
        div.addClass("has-success has-feedback");
        div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
        $('.instansi-validate').addClass("hide");
        return true;
      }

    }

    function validateEmail(id)
    {
      var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
      if(!email_regex.test($("#"+id).val()))
      {
        var div = $("#"+id).closest("div");
        // var b = $("#"+id).closest("b");
        div.removeClass("has-success");
        $("#glypcn"+id).remove();
        div.addClass("has-error has-feedback");
        $('.email-validate').removeClass("hide");
        div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
        return false;
      }
      else{
        var div = $("#"+id).closest("div");
        div.removeClass("has-error");
        $("#glypcn"+id).remove();
        div.addClass("has-success has-feedback");
        div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
        $('.email-validate').addClass("hide");
        return true;
      }

    }

    $(document).ready(
      function()
      {
        $("#contactButton").click(function()
        {
          if(validateText("contactInstansi")&&validateEmail("contactEmail"))
          {
            $("form#contactForm").submit();
          }
          else{
            return false;
          }
        }

      );
    }


    );

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE2q-Y__8vpee-_eKUx1qQE0IJ3XUf8Ns&callback=initMap" type="text/javascript"></script>

</body>
</html>
