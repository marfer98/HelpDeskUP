<?php

    $datos = array(//ARRAY DE POST QUE SE ENVIAN
        'idUsuario'     =>$_POST['idUsuario'], 
        'nombre'       =>$_POST['nombreu'],
        'telefono'     =>$_POST['telefonou'], 
        'correo'       =>$_POST['correou'],
        'nombreUsuario'=>$_POST['nombreUsuariou'],  
        'idRol'        =>$_POST['idRolu'],
        'ubicacion'    =>$_POST['ubicacionu']    
    );
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->actualizarUsuario($datos);
    