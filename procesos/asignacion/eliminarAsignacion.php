<?php
    // Delete Asignacion
    $datos = [
        'idAsignacion' => $_POST['idAsignacion']
    ];

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();

    echo $Asignacion->eliminarAsignacion($datos);


?>