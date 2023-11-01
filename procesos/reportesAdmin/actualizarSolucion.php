<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Recibir la imagen del AJAX.

$imagen = null;

if (isset($_FILES['imagen_solucion'])) {
    $image = $_FILES['imagen_solucion']['tmp_name'];
    $imgContenido = $image ? addslashes(file_get_contents($image)): null;

    $imagen = $imgContenido ? file_get_contents($_FILES["imagen_solucion"]["tmp_name"]) : null;

// Convertimos la imagen a base64
    $base64 = $imagen ? base64_encode($imagen) : null;
    $imagen = $base64 ? 'data:' . $_FILES['imagen_solucion']['type'] . ';base64,' . $base64 : null;
}

$datos = array(
    'idReporte' => $_POST['idReporte'],
    'solucion' => $_POST['solucion'],
    'estatus' => $_POST['estatus'],
    'usuarioTecnico' => $_POST['usuarioTecnico'],
    'idUsuario' => $_SESSION['usuario']['id'],  //hace referencia al usuario que arreglo,
    //por eso toma el inicio de sesión
    'imagen_solucion' => $imagen,
);

include "../../clases/Reportes.php";
$Reportes = new Reportes();
echo $Reportes->actualizarSolucion($datos);//metodo
?>
