<?php
    // Update Asignacion
    $datos = [
        'id_oficina'    => $_POST['id_oficina'],
        'id_articulo'   => $_POST['id_articulo'],
        'id_asignacion' => $_POST['id_asignacion'] ,
        'cantidad'      => $_POST['cantidad'],     
    ];

    include "../../clases/Asignacion.php";
    echo Asignacion::actualizarAsignacion($datos);