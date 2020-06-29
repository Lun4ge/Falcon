
<script>
  var markerver = false;
  var marker;

function initMap() {

    var latitude = 39.02432180967976;
    var longitude = -8.792141373055756;
      
    var LatLng = {lat: latitude, lng: longitude};
    
    var options = {
    zoom: 15,
    disableDefaultUI: true,
    disableDoubleClickZoom: true,
    center:LatLng,
    draggableCursor:'default',
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

google.maps.event.addListener(map,"click",function(event) {   
      
      var clickedlat = event.latLng.lat();
      var clickedlon = event.latLng.lng();

      document.getElementById("lat").value = clickedlat;
      document.getElementById("lng").value =  clickedlon;     

      if(markerver == true){
  marker.setMap(null);
}else if(markerver == false){
  markerver = true;}

         marker = new google.maps.Marker({
      position: new google.maps.LatLng(clickedlat,clickedlon),
      map: map
    });   
});
}
</script>
