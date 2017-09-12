function initMap() {
    var uluru = {lat: 23.164102, lng: 90.1896805};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }

  console.log("apwoekpowakepoawk");