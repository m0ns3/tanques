<?php 
  require 'database.php';

  $objdatabase = new Database();

  $sql = $objdatabase->prepare('SELECT Id, Id_Movil, EVE, Ser_Fecha, Ser_Hora
                                FROM  `sudamericana_reportes` 
                                -- WHERE EVE =04
                                -- OR EVE =07
                                -- GROUP BY Id_Movil
                                ORDER BY Id DESC '
                                );
  $sql->execute();

  $result = $sql->fetchAll();

  foreach ($result as $key => $value) {
    ?>
       <div class="row seleccionado">
        <div class="text-center col-md-2"><?php echo $value['Id'];?></div>
        <div class="text-center col-md-2"><?php echo $value['Id_Movil'];?></div>
        <div class="text-center col-md-2"><?php echo $value['Ser_Fecha'];?></div>
        <div class="text-center col-md-2"><?php echo $value['Ser_Hora'];?></div>
        <div class="text-center col-md-4">
          <span class=" 
            <?php if ($value['EVE'] == (07)) {
              echo "label label-success";
            } else echo "label label-danger"; 
            ?>"
            ><?php echo $value['EVE'];?>    
          </span>
        </div>
      </div>
    <?php
  }
?>
