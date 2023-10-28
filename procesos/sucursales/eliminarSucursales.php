<?php
    // Delete Sucursales
    $datos = [
        'id_sucursal' => $_POST['id_sucursal']
    ];

    include "../../clases/Sucursales.php";
    echo Sucursales::eliminarSucursales($datos);