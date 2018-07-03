<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
  </head>
  <body>
<div>
DE:
<input type="text" id="regcol_7">
<input type="text" id="regcol_21">
<input type="text" id="regcol_200">

PARA:
<input type="text" id="regcol_8">
<input type="text" id="regcol_23">
<input type="text" id="regcol_201">

<input id="saida" type="hidden"></div>

</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDStLYcYnL_jyIcmrChfZ3rGp71WBHHBmc&libraries=places&callback=initAutocomplete"async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>

    function initAutocomplete() {
        var defaultBounds = new google.maps.LatLngBounds(
          new google.maps.LatLng(35.985275, -9.792110),
          new google.maps.LatLng(40.428699, -2.233517)
        );
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('regcol_7')),
            {bounds: defaultBounds,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);

        autocomplete_to = new google.maps.places.Autocomplete(
            (document.getElementById('regcol_8')),
            {bounds: defaultBounds,componentRestrictions: {country: 'pt'}},
            {types: ['geocode']});
        autocomplete_to.addListener('place_changed', fillInAddressTo);
    }

    function fillInAddressTo() {
        var place_to = autocomplete_to.getPlace();

console.log(place_to);
        $("#saida").html(place_to.adr_address);
        zn = $("span.locality").text();
        var lat_to = parseFloat(place_to.geometry.location.lat()).toFixed(7);
        var lng_to = parseFloat(place_to.geometry.location.lng()).toFixed(7);
        document.getElementById('regcol_23').value= lat_to+', '+lng_to;
        document.getElementById('regcol_201').value = zn;
      }


     function fillInAddress() {
        var place = autocomplete.getPlace();

console.log(place);

        $("#saida").html(place.adr_address);
        zn = $("span.locality").text();
        var lat = parseFloat(place.geometry.location.lat()).toFixed(7);
        var lng = parseFloat(place.geometry.location.lng()).toFixed(7);
        document.getElementById('regcol_21').value= lat+', '+lng;
        document.getElementById('regcol_200').value = zn;
      }
    </script>
  </body>
</html>