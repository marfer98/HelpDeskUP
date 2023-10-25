<?php
    // Obtener Prestamos
    $id_prestamo = $_POST['id_prestamo'];
    include "../../clases/Prestamos.php";
    $where = "WHERE id_prestamo = $id_prestamo";
    echo json_encode(Prestamos::obtenerDatosPrestamos($where));