<?php 
    //print_r ($_POST);
 $datos = array( //Array donde va lo que almacenaremos de usuario
    "nombre"         => $_POST['nombre'], //indica los datos que seran insertados
    "telefono"       => $_POST['telefono'],  
    "correo"         => $_POST['correo'], 
    "nombreUsuario"  => $_POST['nombreUsuario'], 
    "password"       => sha1($_POST['password']), //encriptación de contraseña
    "idRol"          => $_POST['idRol'], 
    "ubicacion"      => $_POST['ubicacion'],
    'id_sucursal' => $_POST['id_sucursal'] ,
    'id_oficina' => $_POST['id_oficina'] ,
   
 );

    include "../../../clases/Usuarios.php";

    $Usuarios = new Usuarios(); // creacion de un nuevo objeto
    echo $Usuarios->agregaNuevoUsuario($datos);

    