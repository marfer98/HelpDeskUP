<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$id_sucursal = $_POST['id_sucursal'];
include "../../clases/Sucursales.php";
$where = "WHERE id_sucursal = $id_sucursal";
echo json_encode(Sucursales::obtenerDatosSucursales($where));