<?php

    $datos = array(//ARRAY DE POST QUE SE ENVIAN
        'idUsuario' => $_POST['idUsuario'],
        'nombre' => $_POST['nombre'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'nombreUsuario' => $_POST['nombreUsuariou'],
        'idRol' => $_POST['idRol'],
        'ubicacion' => $_POST['ubicacionu'],
        'id_oficina' => $_POST['id_oficina'],
        'id_sucursal' => $_POST['id_sucursal'],
        'prioridad' => $_POST['prioridad'], 
    );
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->actualizarUsuario($datos);
    