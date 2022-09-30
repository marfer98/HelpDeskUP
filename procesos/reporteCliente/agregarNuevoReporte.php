<?php
/*ESTE ES EL ARCHIVO DEL POST, SE MUESTRA TODO LO QUE SE VA A ENVIAR PARA ALMACENAR-->
<!-- "->" significa que llama a la funcion-->
<!-- en el echo se le pasa el nombre del array que creamos*/
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    $datos = array(
        'idEquipo'  => $_POST['idEquipo'],
        'problema'  => $_POST['problema'],
        'idUsuario' => $idUsuario
    );

    include "../../clases/Reportes.php";

    $Reportes = new Reportes();
    echo $Reportes->agregarReporteCliente($datos); //metodo es agregarReporteCliente
?>