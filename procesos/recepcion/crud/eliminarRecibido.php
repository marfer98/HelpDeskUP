<?php
    $idRecepcion = $_POST['idRecepcion'];
    include "../../../clases/Recibidos.php";
    $Recibidos = new Recibidos();
    echo $Recibidos->eliminarRecibido($idRecepcion); //segun el id de reporte se iran eliminando 



  

