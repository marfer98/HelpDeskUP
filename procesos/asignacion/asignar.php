<?php
    //print_r($_POST);

$datos = array(
    
    'idOficina'             => $_POST['idOficina'],
    'idEquipo'              => $_POST['idEquipo'],
    'nombreEquipoA'         => $_POST['nombreEquipoA'],
    'rotulado'              => $_POST['rotulado'],
    'marca'                 => $_POST['marca'],
    'modelo'                => $_POST['modelo'],
    'numeroSerie'           => $_POST['numeroSerie'],
    'descripcion'           => $_POST['descripcion'],
    'memoria'               => $_POST['memoria'],
    'tipoRam'               => $_POST['tipoRam'],
    'discoDuro'             => $_POST['discoDuro'],
    'procesador'            => $_POST['procesador'],
    'sistemaOperativo'      => $_POST['sistemaOperativo']
);

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();
echo $Asignacion->agregarAsignacion($datos);
