<?php
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array (//sacado de la modal "modalResetPassword.php"
        "password"  => sha1($_POST['passwordReset']),
        "idUsuario" => $_POST['idUsuarioReset']
    );
    echo $Usuarios->resetPassword($datos);

?>