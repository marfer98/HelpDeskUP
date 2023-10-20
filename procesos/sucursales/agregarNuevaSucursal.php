<?php
    $datos =array (
        "descripcion" =>$_POST["descripcion"],
        "direccion" =>$_POST["direccion"], 
    );
include "../../clases/Sucursales.php";
$Sucursal = new Sucursales();
echo $Sucursal->agregarSucursales($datos);