<!DOCTYPE html>
<html>
<head>
  <style>
    #map {
      width: 100%;
      height: 400px;
      background-color: grey;
    }
  </style>
</head>
<body>
  <h3>My Google Maps Demo</h3>
  <div id="map" style="width:50%;height:400px;"></div>
</body>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj-2jqN80dN53Vgp4dzO2jL_NcajouIQ0&callback=initMap">
</script>

<script type="text/javascript">
  function initMap() {
    var uluru = {lat: 23.164102, lng: 90.1896805};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>
</html>