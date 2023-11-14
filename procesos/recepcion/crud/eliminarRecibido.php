<?php
    $id_recepcion = $_POST['id_recepcion'];
    include "../../../clases/Recibidos.php";
    $Recibidos = new Recibidos();
    echo $Recibidos->eliminarRecibido($id_recepcion); //segun el id de reporte se iran eliminando 



  

