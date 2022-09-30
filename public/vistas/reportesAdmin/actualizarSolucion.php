<?php
    session_start();
    $datos = array(
        'idReporte' => $_POST['idReporte'],
        'solucion'  => $_POST['solucion'],
        'estatus'   => $_POST['estatus'],
        'usuarioTecnico'=> $_POST['usuarioTecnico'],
        'idUsuario' => $_SESSION['usuario']['id']  //hace referencia al usuario que arreglo, 
                                                   //por eso toma el inicio de sesión
    );

    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->actualizarSolucion($datos);//metodo
?>
