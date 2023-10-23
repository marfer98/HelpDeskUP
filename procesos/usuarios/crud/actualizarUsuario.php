<?php

    $datos = array(//ARRAY DE POST QUE SE ENVIAN
        'idUsuario' => $_POST['idUsuario'],
        'nombre' => $_POST['nombreu'],
        'telefono' => $_POST['telefonou'],
        'correo' => $_POST['correou'],
        'nombreUsuario' => $_POST['nombreUsuariou'],
        'idRol' => $_POST['idRol'],
        'ubicacion' => $_POST['ubicacionu'],
        'id_oficina' => $_POST['id_oficina'],
        'id_sucursal' => $_POST['id_sucursal']
    );
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->actualizarUsuario($datos);
    