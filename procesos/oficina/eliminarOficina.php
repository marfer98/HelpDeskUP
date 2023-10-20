<?php
    // Delete Oficina
    $datos = [
        'id_oficina' => $_POST['id_oficina']
    ];

    include "../../clases/Oficinas.php";
    echo Oficinas::eliminarOficina($datos);