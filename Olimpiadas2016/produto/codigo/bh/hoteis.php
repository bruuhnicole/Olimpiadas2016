<?php
$style = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<style>
html, body, #map-canvas  {
  margin: 0;
  padding: 0;
  height: 100%;
}

#map-canvas {
  width:500px;
  height:480px;
}</style>';
include("../include/cabecalho.php"); 
?>
    <!--Hoteis-->
    <div id="hoteis" class="section scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <h3><b>Hotéis</b></h3><br>
                        <div class = "col-sm-8 col-md-4">
                            <div class = "thumbnail">
                                 <img src = "../images/hotel-impar.JPEG">
                            </div>
                              
                            <div class = "caption">
                                 <a href="#myMapModal" id = "suite" class="btn" data-toggle="modal"><h3><i>Ímpar Suítes Expominas</i></h3></a>
                                 <p style="text-align: justify;">Com localização privilegiada, situado na região oeste da capital mineira, o Ímpar Suítes Expominas visa atender a crescente demanda local. O novo hotel Ímpar se encontra a apenas 1KM do maior espaço para convenções, feiras congressos e turismo em geral de MG, o Centro de Convenções Expominas.</p>
                            </div>
                        </div>
                        <div class = "col-sm-8 col-md-4">
                            <div class = "thumbnail">
                                 <img src = "../images/hotel-ramada.jpg">
                            </div>
                              
                            <div class = "caption">
                                 <a href="#myMapModal" id ="ramada" class="btn" data-toggle="modal"><h3><i>Hotel Ramada Minas Casa</i></h3></a>
                                 <p style="text-align: justify;">Ramada Encore Minascasa está localizado em Belo Horizonte e oferece quartos modernos com WiFi gratuito. Há um bar no local e o restaurante do Ramada serve refeições à la carte ou buffet. No Ramada Encore, você pode saborear diariamente o buffet de café da manhã com frutas da estação, sucos naturais e pães.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>  
<!--<a href="#myMapModal" class="btn" data-toggle="modal">Launch Map Modal</a><-->

<div class="modal fade" id="myMapModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div id="map-canvas" class=""></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



<?php

$scripts = "<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
<script>

var map;
if(true || id == 'Ramada')
{
  var myCenter=new google.maps.LatLng(-19.877069, -43.929164);
}else {
  var myCenter=new google.maps.LatLng(-19.926725, -43.979959);
}      
            
var marker=new google.maps.Marker({
    position:myCenter
});

function initialize() {
  var mapProp = {
      // center:myCenter,
      zoom: 18,
      draggable: false,
      scrollwheel: false,
      mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  map=new google.maps.Map(document.getElementById('map-canvas'),mapProp);
  marker.setMap(map);
    
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map, marker);    
  });

  $('#ramada').on('click', function() {
    setMap(new google.maps.LatLng(-19.877069, -43.929164));
  });

  $('#suite').on('click', function() {
    setMap(new google.maps.LatLng(-19.926725, -43.979959));
  }); 
};
google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, 'resize', resizingMap());

$('#myMapModal').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   resizeMap();
});

function setMap(center) {
  map.setCenter(center);
  marker=new google.maps.Marker({ position:center });   
  marker.setMap(map);
}

function resizeMap() {
   if(typeof map =='undefined') return;
   setTimeout( function(){resizingMap();} , 400);
};

function resizingMap() {
   if(typeof map =='undefined') return;
   var center = map.getCenter();
   google.maps.event.trigger(map, 'resize');
   map.setCenter(center); 
};
</script>
";
include("../include/rodape.php"); ?>








