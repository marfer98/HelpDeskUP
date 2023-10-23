<?php
require_once "../../../clases/Reportes.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
$contador = 1;//suma los reportes de auno
$idUsuario = $_POST['idReporte'];//pasa el id usuario que inicio sesion
$reporte = new Reportes();
$respuesta = $reporte->obtenerSolucion($idReporte);