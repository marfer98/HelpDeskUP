<?php
    // Insert Oficina
    $datos = [
        'nombre' => $_POST['nombre'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo']
    ];
    include "../../clases/Oficinas.php";
    $Oficina = new Oficinas();
    echo $Oficina->agregarOficina($datos);