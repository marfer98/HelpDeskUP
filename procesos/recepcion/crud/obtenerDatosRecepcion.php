<?php
$id_recepcion = $_POST['id_recepcion'];
include "../../../clases/Recibidos.php";
$Recibidos = new Recibidos(); // creacion de un nuevo objeto
echo json_encode($Recibidos->obtenerDatosRecepcion($id_recepcion));//regresa un string con formato json




