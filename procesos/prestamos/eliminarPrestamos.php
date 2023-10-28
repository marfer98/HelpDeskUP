<?php
    // Delete Prestamos
    $datos = [
        'id_prestamo' => $_POST['id_prestamo']
    ];

    include "../../clases/Prestamos.php";
    echo Prestamos::eliminarPrestamos($datos);