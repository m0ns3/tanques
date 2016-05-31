<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <!-- <link rel="shortcut icon" href=""> -->
  <title>Monitoreo de niveles de agua</title>

  <!-- Bootstrap core CSS -->
  <link href="http://localhost/tanques/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="http://localhost/tanques/css/estilos.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://localhost/tanques/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#recargable").load('cargar2.php');
      function cargando(){
       $("#recargable").load('cargar2.php');

      }
      setInterval(cargando, 10000);
    });
  </script>
</head>
<body>
    <br>
    <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="row">
        <div  class="col-md-12"><h3 class="text-center"><strong>Panel de Control</strong></h3></div>
      </div>
    </div>
    <div class="panel-body">
      <div id="recargable"></div>
    </div>
  </div>
  

  <div id="mp">
    <a href="http://localhost/tanques/panel3.php">Mapa</a>
  </div>


</body>
</html>

