<?php
    // Delete Asignacion
    $datos = [
        'id_asignacion' => $_POST['id_asignacion']
    ];

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();

    echo $Asignacion->eliminarAsignacion($datos);


?>