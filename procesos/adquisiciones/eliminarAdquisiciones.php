<?php
    // Delete Adquisiciones
    $datos = [
    'id_adquisicion ' => $_POST['id_adquisicion']
    ];

    include "../../clases/Adquisiciones.php";
    echo Adquisiciones::eliminarAdquisiciones($datos);