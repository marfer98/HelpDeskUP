<?php
    // Insert Proveedores
    $datos = [
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'telefono' => $_POST['telefono']
    ];
    include "../../clases/Proveedores.php";
    $Proveedores = new Proveedores();
    echo $Proveedores->agregarProveedores($datos);
   