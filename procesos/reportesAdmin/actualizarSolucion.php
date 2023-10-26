<?php
    session_start();
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    // Recibir la imagen del AJAX.

    $blob = file_get_contents('php://input');

    // Mostrar el blob en el navegador.
   

    /*$name = $_FILES['img']['name'];
    $type = $_FILES['img']['type'];
    $data = file_get_contents($_FILES['img']['tmp_name']);
*/
    var_dump($_POST);

    // Guardar la imagen en el disco duro.
    $nombreImagen = uniqid() . '.jpg';
    //$imagen = file_get_contents('php://input');


    $datos = array(
        'idReporte'       => $_POST['idReporte'],
        'solucion'        => $_POST['solucion'],
        'estatus'         => $_POST['estatus'],
        'usuarioTecnico'  => $_POST['usuarioTecnico'],
        'idUsuario'       => $_SESSION['usuario']['id'],  //hace referencia al usuario que arreglo, 
                                                   //por eso toma el inicio de sesión
        'imagen_solucion' => $_POST['imagen_solucion_blob'],
    );

    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->actualizarSolucion($datos);//metodo
?>
