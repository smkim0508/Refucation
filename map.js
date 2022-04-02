// Initialize and add the map

function initMap() {
    // The location of Uluru
    const uluru = { lat: 0, lng: 0 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru

  }

const marker = new google.maps.Marker({
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: uluru,
    map: map,
  });

var onChangeHandler = function() {
    DisplayPoint(map);
  };

function DisplayPoint(map) {

    var latitutde = window.prompt("lat? ");
    var longitude = window.prompt("long? ");
    var latLng = new google.maps.LatLng(lat, lng);
    marker.setPosition(latLng);
    map.panTo(latLng);

}

