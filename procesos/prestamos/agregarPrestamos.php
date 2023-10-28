<?php
    // Insert Prestamos
    $datos = [
        'id_articulo' => $_POST['id_articulo'],
        'id_oficina_origen' => $_POST['id_oficina_origen'],
        'id_oficina_destino' => $_POST['id_oficina_destino'],
        'cantidad' => $_POST['cantidad'],
        'estado' => $_POST['estado']
    ];
    include "../../clases/Prestamos.php";
    $Prestamos = new Prestamos();
    echo $Prestamos->agregarPrestamos($datos);