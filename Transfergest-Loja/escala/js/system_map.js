var markers = [];

var markersArray = [];
var map;
var marker;


function StartMapPositions(){
    LoadMap();
    ShowAll();
}



function LoadMap() {
    var mapOptions = {
    center: new google.maps.LatLng(37.1494055,-8.2273884),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("mymap"), mapOptions);
        ShowAll();
};


function SetMarker(position) {
    //Set Marker on Map.
    var data = markers[position];
    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: data.icon,
        title: data.equipa
    });
    markersArray.push(marker);
};

/* CRIA/MOSTRA TODOS OS ELEMENTOS DA EQUIPA NO MAPA */
function ShowAll(){
    markers = JSON.parse(localStorage.getItem("markers"));
      if (markers == null || markers.length < 1){
      return false;
      }
      else {
       for(i=0;i<markers.length;i++){
        markers[i].icon='markers/'+i+'_Marker'+markers[i].equipa.charAt(0)+'.png';
        SetMarker(i);
       }  
     }
}

/* APAGAR TODOS OS MARKERS DA EQUIPA E METE NOVAS POSIÇÕES NO MAPA */
function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray.length = 0;
}

