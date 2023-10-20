<?php
    // Insert Sucursales
    $datos = [
        'descripcion' => $datos['descripcion'],
        'direccion' => $datos['direccion']
    ];
    include "../../clases/Sucursales.php";
    $Sucursales = new Sucursales();
    echo $Sucursales->agregarSucursales($datos);