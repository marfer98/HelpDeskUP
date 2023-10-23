<?php
    //print_r($_POST);

$datos = array(
    'idOficina'             => $_POST['idOficina'],
    'id_articulo'           => $_POST['id_articulo'],
);

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();
echo $Asignacion->agregarAsignacion($datos);
