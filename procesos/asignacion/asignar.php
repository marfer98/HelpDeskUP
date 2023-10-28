<?php
    //print_r($_POST);

$datos = array(
    'id_oficina'     => $_POST['id_oficina'],
    'id_articulo'   => $_POST['id_articulo'],
    'cantidad'      => $_POST['cantidad'],
);

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();
echo $Asignacion->agregarAsignacion($datos);
