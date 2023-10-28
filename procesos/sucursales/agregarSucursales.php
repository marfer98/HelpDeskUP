<?php
    // Insert Sucursales
    $datos = [
        'descripcion' => $_POST['descripcion'],
        'direccion' => $_POST['direccion']
    ];
    include "../../clases/Sucursales.php";
    $Sucursales = new Sucursales();
    echo $Sucursales->agregarSucursales($datos);