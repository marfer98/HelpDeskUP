<?php
    // Obtener Articulos
    $where = $_POST['where'];
    include "../../clases/Articulos.php";
    echo json_encode(Articulos::obtenerDatosArticulosParaSelect($where));