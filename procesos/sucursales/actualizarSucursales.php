<?php
    // Update Sucursales
    $datos = [
        'descripcion' => $_POST['descripcion'],
        'direccion' => $_POST['direccion'],
        'id_sucursal' => $_POST['id_sucursal']       
    ];

    include "../../clases/Sucursales.php";
    echo Sucursales::actualizarSucursales($datos);