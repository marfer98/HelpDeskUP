<?php
    // Update Oficina
    $datos = [
        'nombre' => $_POST['nombre'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'id_oficina' => $_POST['id_oficina']       
    ];

    include "../../clases/Oficinas.php";
    echo Oficinas::actualizarOficina($datos);