<?php
    $idReporte = $_POST['idReporte'];
    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->eliminarReporteCliente($idReporte); //segun el id de reporte se iran eliminando 