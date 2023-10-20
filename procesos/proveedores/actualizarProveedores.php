<?php
    // Update Proveedores
    $datos = [
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono'],
        'id_proveedor' => $_POST['id_proveedor']       
    ];

    include "../../clases/Proveedores.php";
    echo Proveedores::actualizarProveedores($datos);