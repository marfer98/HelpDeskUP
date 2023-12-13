<?php
    // Delete Proveedores
    $datos = [
        'id_proveedor' => $_POST['id_proveedor']
    ];

    include "../../clases/Proveedores.php";
    echo Proveedores::eliminarProveedores($datos);
