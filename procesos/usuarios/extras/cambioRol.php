<?php
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $idUsuario = $_POST['idUsuario'];
    $rol   = $_POST['rol'];
    
    echo $Usuarios->cambioRolUsuario($idUsuario, $rol);

?>