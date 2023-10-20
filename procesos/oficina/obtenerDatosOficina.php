<?php
    // Obtener Oficina
    $id_oficina = $_POST['id_oficina'];
    include "../../clases/Oficinas.php";
    $where = "WHERE id_oficina = $id_oficina";
    echo json_encode(Oficinas::obtenerDatosOficina($where));