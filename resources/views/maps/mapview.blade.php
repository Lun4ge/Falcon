
<?php $contador = 0 ?>
@foreach ($alllocais as $one)
    <?php $arrayLocaisLat[$contador] = array($one->Latitude);
    $arrayLocaisLong[$contador] = array($one->Longitude);
    $arrayLocaisType[$contador] = array($one->tipolocal);
    $arrayLocaisId[$contador] = array($one->id);
    $contador++?>
@endforeach

<script>
function initMap() {
  
   var arrayLocaisLat = <?php echo json_encode($arrayLocaisLat); ?>;
   var arrayLocaisLong = <?php echo json_encode($arrayLocaisLong); ?>;

   var arrayLocaisType = <?php echo json_encode($arrayLocaisType); ?>;
   var arrayLocaisId = <?php echo json_encode($arrayLocaisId); ?>;

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
    var image;
    var value;

    for(let i = 0; i < arrayLocaisLat.length; i++){

           value = arrayLocaisType[i]; 
           switch(value[0]){
          case "Policia": image = "/images/mapsicons/Pred.png"; break;
          case "Restaurante": image = "/images/mapsicons/Rest.png"; break;
          case "Alojamento": image = "/images/mapsicons/Alu.png"; break;
          case "Casa de Vinhos": image = "/images/mapsicons/CVinhos.png"; break;
          case "Escola": image = "/images/mapsicons/Escola.png"; break;
          case "Farmacia": image = "/images/mapsicons/Farm.png"; break;
          case "Centro de Saude": image = "/images/mapsicons/CSaude.png"; break;
          case "Bomba de Gasolina": image = "/images/mapsicons/Bomba.png"; break;}
        
        iconLocais = {
        url: image,
        scaledSize: new google.maps.Size(40, 65)};

      marker = new google.maps.Marker({
      position: new google.maps.LatLng(arrayLocaisLat[i],arrayLocaisLong[i]),
      map: map,
      icon : iconLocais
      });

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
     return function() {
      map.setZoom(16);
      map.setCenter(marker.getPosition());
      
      for(let ia = 0; ia < arrayLocaisLat.length; ia++){
        document.getElementById("id"+arrayLocaisId[ia]).style.width = "0%";
      }
      document.getElementById("id"+arrayLocaisId[i]).style.width = "30%";
    }
 })(marker, i));
}
}
</script>