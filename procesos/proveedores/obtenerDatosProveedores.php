<?php
    // Obtener Proveedores
    $id_proveedor = $_POST['id_proveedor'];
    include "../../clases/Proveedores.php";
    $where = "WHERE id_proveedor = $id_proveedor";
    echo json_encode(Proveedores::obtenerDatosProveedores($where));