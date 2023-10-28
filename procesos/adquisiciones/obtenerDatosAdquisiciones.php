<?php
    // Obtener Adquisiciones
    $id_adquisicion = $_POST['id_adquisicion'];
    include "../../clases/Adquisiciones.php";
    $where = "WHERE id_adquisicion = $id_adquisicion";
    echo json_encode(Adquisiciones::obtenerDatosAdquisiciones($where));