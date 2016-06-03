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
    <!--Atracoes-->
    <div id="atracoes" class="section scrollspy">
        <div class="container">
            <div class="row">                
                <div class="col s12">

                    <div>
                        <h3><b>Atrações Turísticas</b></h3><br>

                        <div class = "col-sm-8 col-md-4">
                            <div class = "thumbnail">
                                 <img src = "../images/atracao.jpg">
                            </div>
                              
                            <div class = "caption">
                              <a style="font-size: 24px;" href="#myMapModal" id = "palacio" class="btn" data-toggle="modal"><i class="glyphicon glyphicon-map-marker"></i> Palácio das Artes</a>
                                 <p style="text-align: justify;">O Palácio das Artes é um complexo cultural que fomenta e difunde a arte e a cultura e proporciona uma multiplicidade de experiências para o público visitante. Localizado na Av. Afonso Pena, na região central de Belo Horizonte, e ladeado pela biodiversidade do Parque Municipal, é um dos raros espaços no país e na América Latina que reúne, num mesmo local, diversos equipamentos culturais: Grande Teatro, Teatro João Ceschiatti, Sala Juvenal Dias, Cine Humberto Mauro Grande Galeria Alberto da Veiga Guignard, Galeria Genesco Murta, Galeria Arlinda Corrêa Lima e Espaço Mari’Stella Tristão.</p>
                            </div>
                        </div>


                        <div class = "col-sm-8 col-md-4">
                            <div class = "thumbnail">
                                 <img src = "../images/museu.jpg">
                            </div>
                              
                            <div class = "caption">
                              <a style="font-size: 24px;" href="#myMapModal" id = "museu" class="btn" data-toggle="modal"><i class="glyphicon glyphicon-map-marker"></i> Museu de Arte e Ofício</a>
                                 <p style="text-align: justify;">O Museu de Artes e Ofícios é um museu brasileiro localizado na cidade de Belo Horizonte. Inaugurado em 14 de dezembro de 2005, é o primeiro empreendimento museológico brasileiro dedicado integralmente ao tema do trabalho, das artes e ofícios no país. Com 9.000 m² de área, o museu está instalado no conjunto histórico da antiga Estação Central da Estrada de Ferro Central do Brasil, na Praça Rui Barbosa, mais conhecida como Praça da Estação. No mesmo local funcionam ainda hoje uma estação de metrô e um ramal ferroviário. É um dos museus mais bem estruturados do Brasil em termos de organização, estrutura para as exposições e uso de recursos audiovisuais.</p>
                            </div>
                        </div>

                        
                        <div class = "col-sm-8 col-md-4">
                            <div class = "thumbnail">
                                 <img src = "../images/igrejinha.jpg">
                            </div>
                              
                            <div class = "caption">
                              <a style="font-size: 24px;" href="#myMapModal" id = "ingreja" class="btn" data-toggle="modal"><i class="glyphicon glyphicon-map-marker"></i> Igrejinha da Pampulha</a>
                                 <p style="text-align: justify;">Uma das principais atrações do conjunto arquitetônico e urbanístico da Pampulha, a Igreja São Francisco de Assis, emoldurada pelas águas da lagoa, reúne as genialidades do arquiteto Oscar Niemeyer, do paisagista Burle Marx e do pintor Cândido Portinari. A combinação gerou a construção em tons azuis, com linhas e curvas totalmente revestida por azulejos e pelos painéis que retratam a Via Sacra e a imagem de São Francisco.</p>
                            </div>
                        </div>

                </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myMapModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Mapa de Localização</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div id="map-canvas" class=""></div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <br><br><br><br>

<?php 
$scripts = "<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
<script>

var map;
if(true || id == 'igreja')
{
  var myCenter=new google.maps.LatLng(-19.85836, -43.97903);
}
if(true || id == 'museu')
{
  var myCenter=new google.maps.LatLng(-19.916954, -43.933573);
}
if(true || id == 'palacio')
{
  var myCenter=new google.maps.LatLng(-19.925655, -43.933444);
}  
            
var marker=new google.maps.Marker({
    position:myCenter
});

function initialize() {
  var mapProp = {
      zoom: 17,
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

  $('#palacio').on('click', function() {
    setMap(new google.maps.LatLng(-19.925655, -43.933444));
  });

  $('#museu').on('click', function() {
    setMap(new google.maps.LatLng(-19.916954, -43.933573));
  }); 

  $('#ingreja').on('click', function() {
    setMap(new google.maps.LatLng(-19.85836, -43.97903));
  }); 
};

google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, 'resize', resizingMap());

$('#myMapModal').on('show.bs.modal', function() {
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
