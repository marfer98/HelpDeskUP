<?php
    // Update Asignacion
    $datos = [
        'id_oficina' => $_POST['id_oficina'],
        'id_articulo' => $_POST['id_articulo'],
        'id_asignacion' => $datos['id_asignacion']       
    ];

    include "../../clases/Asignacion.php";
    echo Asignacion::actualizarAsignacion($datos);