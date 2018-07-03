<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function distance_on_geo(lat1, lon1, lat2, lon2) {

  // Converte graus para radianos
  lat1 = lat1 * Math.PI/ 180.0;
  lon1 = lon1 * Math.PI / 180.0;
 
  lat2 = lat2 * Math.PI / 180.0;
  lon2 = lon2 * Math.PI / 180.0;
  // radius terra metros
   r = 6378100;
  // P
  rho1 = r * Math.cos(lat1);
  z1 = r * Math.sin(lat1);
  x1 = rho1 * Math.cos(lon1);
  y1 = rho1 * Math.sin(lon1);
  // Q
  rho2 = r * Math.cos(lat2);
  z2 = r * Math.sin(lat2);
  x2 = rho2 * Math.cos(lon2);
  y2 = rho2 * Math.sin(lon2);
  // Ponto
  dot = (x1 * x2 + y1 * y2 + z1 * z2);
  cos_theta = dot / (r * r);
  theta = Math.acos(cos_theta);
  // Distance METROS
 metros = (r * theta).toFixed(2);
 return metros;
}


   Coord=[];
   Coord = JSON.parse(localStorage.getItem("carRoute"));

lt=0;
lg=0;
ltl=0;
lgl=0;
lts=0;
lgs=0;

timel='';
times='';

/*DUAS ULTIMAS POSIÇÕES PARA CALCULO VELOCIDADE*/
ltl = parseFloat(Coord[Coord.length-1].lat);
lgl = parseFloat(Coord[Coord.length-1].lng);
timel = parseInt(Coord[Coord.length-1].time_);

lts = parseFloat(Coord[Coord.length-2].lat);
lgs = parseFloat(Coord[Coord.length-2].lng);
times = parseInt(Coord[Coord.length-2].time_);
last = {lat: ltl, lng: lgl};

max='';
maxItem='';
min='';
minItem='';


for(i=0; i<Coord.length; i++) {
    var item = Coord[i];
    if(item['lat'] > max) {
     max = parseInt(item['lat']);
     maxItem = item;
     }
    }
    max_lat=maxItem.lat;

for(i=0; i<Coord.length; i++) {
    var item = Coord[i];
    if(item['lng'] > max) {
     max = parseInt(item['lng']);
     maxItem = item;
     }
    }
  max_lng=parseFloat(maxItem.lng);

for(i=0; i<Coord.length; i++) {
    var item = Coord[i];
    if(item['lng'] < min) {
     min = item['lng'];
     minItem = item;
     }
    }
    min_lng = parseFloat(minItem.lng);

    for(i=0; i<Coord.length; i++) {
    var item = Coord[i];
    if(item['lat'] > min) {
     min = item['lat'];
     minItem = item;
     }
    }
      min_lat = parseFloat(minItem.lat);

auto_dist = distance_on_geo(lts, lgs, ltl, lgl);
auto_time_s = (timel - times) / 1000.0;
speed_mps = auto_dist / auto_time_s;
speed_kph = ((speed_mps * 3600.0) / 1000).toFixed(2);
dist=parseFloat(auto_dist).toFixed(0)+"m";
pr = Coord[Coord.length-2].matricula.substring(0,2);
sc = Coord[Coord.length-2].matricula.substring(2,4);
tr = Coord[Coord.length-2].matricula.substring(4,6);

m = pr+"-"+sc+"-"+tr;
ss= "Matricula: "+m+"\nVelocidade: "+speed_kph+"km/h";
/*
\nDistância:  "+dist+"\nTempo: "+auto_time_s+"''\nVelocidade: "+speed_kph+"km/h";
*/
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
  /*zoom: 12, center: {lat: lt, lng: lg}*/
  });

  var roadPath = new google.maps.Polyline({
    path: Coord,
    geodesic: true,
    strokeColor: '#550000',
    strokeOpacity: 0.3,
    strokeWeight: 6
  });

var marker = new google.maps.Marker({
    position: last,
    map: map,
    title:ss,
    animation: google.maps.Animation.BOUNCE
    });


    setTimeout(function() {
        marker.setAnimation(null)
    }, 1500);

    var bounds = new google.maps.LatLngBounds();
    var sw = new google.maps.LatLng(min_lat, max_lng);
    var ne = new google.maps.LatLng(max_lat, min_lng);
    bounds.extend(sw);
    bounds.extend(ne);
    map.fitBounds(bounds);
  roadPath.setMap(map);

}

setTimeout(function(){
$.getScript( "https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc", function( data, textStatus, jqxhr ) {
  /*console.log( textStatus ); // Success
  jqxhr.status == '200' ? alert('ok') : alert('ko');*/
});
}, 500);


    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  </body>
</html>
