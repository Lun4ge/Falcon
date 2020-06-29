<?php 
$lati = $only->Latitude;
$longi = $only->Longitude;
?>

<script>
  var lati = <?php echo $lati; ?>;
  var longi = <?php echo $longi; ?>;
  
function initMap() {
    var latitude = 39.02432180967976;
    var longitude = -8.792141373055756;
      
    var LatLng = {lat: latitude, lng: longitude};

    var options = {
    zoom: 15,
    disableDefaultUI: true,
    disableDoubleClickZoom: true,
    center:LatLng,
    styles:[
      {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#3c3737"
            }
        ]
    },
  {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#F8E08E"
            }
        ]
    },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
      
    ]
  },
  {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#cecece"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "color": "#9b9b9b"
            }
        ]
    },
  {
    "featureType": "transit",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  }
]
  }

    var map = new google.maps.Map(document.getElementById('map'),options);
    
       LatLng = {lat: lati, lng: longi};
           var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'Ponto no map'
    });
}
</script>