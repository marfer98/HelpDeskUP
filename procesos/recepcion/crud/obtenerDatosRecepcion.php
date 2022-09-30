<?php
$idRecepcion = $_POST['idRecepcion'];
include "../../../clases/Recibidos.php";
$Recibidos = new Recibidos(); // creacion de un nuevo objeto
echo json_encode($Recibidos->obtenerDatosRecepcion($idRecepcion));//regresa un string con formato json




