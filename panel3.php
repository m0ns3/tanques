<!doctype html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/markerwithlabel.js"></script> 
      <style>
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
         
        }
        #mapa {
          height: 93%;
          width: 80%;
          float: left;
          position: relative;
        }
        .labels {
              color: red;
              background-color: wheat;
              font-family: "Lucida Grande", "Arial", sans-serif;
              font-size: 10px;
              font-weight: bold;
              text-align: center;
              width: 40px;     
              border: 2px solid black;
              white-space: nowrap;
         }
      </style>
  </head>
  <body style="width:100%; height:100%">
    <?php ////////////////////////////////////
        require 'database.php';
        $objdatabase = new Database();
        $sql = $objdatabase->prepare('SELECT Id, Id_Movil, EVE, Ser_Fecha, Ser_Hora, Latitud, Longitud
                                FROM  `sudamericana_monitoreo`
                                ORDER BY Id DESC '
                                );
        $sql->execute();
        $result = $sql->fetchAll();

        $marcadores = '[';
        foreach ($result as $key => $value) {
              $marcadores=$marcadores. "['".$value['Id_Movil']."',' Fecha ".$value['Ser_Fecha']." ".$value['Ser_Hora']."'," .$value['Latitud'].",".$value['Longitud'].",".$value['EVE']."]";
              $marcadores= $marcadores.",";
            }
        $marcadores = $marcadores.']';
        echo 'var marcadores ='.$marcadores;
      ?>
    <script type="text/javascript">

      function initialize() { 
        var clat = -34.427710000;
        var clon = -58.874275000;
        var zz =12;
        var map = new google.maps.Map(document.getElementById('mapa'), {
          zoom: zz,
          center: new google.maps.LatLng(clat,clon),
          mapTypeId: google.maps.MapTypeId.ROAD
          });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < marcadores.length; i++) {  
          var ico;
          if (marcadores[i][4]>4){
           
            ico= 'https://cdn4.iconfinder.com/data/icons/32x32-free-design-icons/32/Ok.png'
          }else{
      
            ico= 'https://cdn4.iconfinder.com/data/icons/32x32-free-design-icons/32/Cancel.png';
          
          };

          var marker = new MarkerWithLabel({
            position: new google.maps.LatLng(marcadores[i][2], marcadores[i][3]),
            map: map,
            icon: ico,
            title: marcadores[i][0],
            labelContent: marcadores[i][0],
            labelAnchor: new google.maps.Point(22, 0),
            labelClass: "labels", // the CSS class for the label
            labelStyle: {opacity: 0.75}
          });
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent('<h3>Movil ' +marcadores[i][0]+'</h3>'+marcadores[i][1]);
              infowindow.open(map, marker);
            };
          })(marker, i));
        }
    } 

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
   
       <div id="mapa"></div>
    
  </body>
</html>