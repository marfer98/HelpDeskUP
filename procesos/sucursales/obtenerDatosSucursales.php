<?php
$id_sucursal = $_POST['id_sucursal'];
include "../../clases/Sucursales.php";
$where = "WHERE id_sucursal = $id_sucursal";
echo json_encode(Sucursales::obtenerDatosSucursales($where));