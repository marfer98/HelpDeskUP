<?php
    session_start(); //inicia la sesión con estos dos requisitos 
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']); //enciptación de contraseña del usuario
    
    include "../../../clases/Usuarios.php";
    $Usuario = new Usuarios();


    echo $Usuario->loginUsuario($usuario,$password);


?>