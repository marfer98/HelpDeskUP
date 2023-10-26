<?php
    // Obtener Oficina
    $where = $_POST['where'];
    include "../../clases/Oficinas.php";
    echo json_encode(Oficinas::obtenerDatosOficina($where));