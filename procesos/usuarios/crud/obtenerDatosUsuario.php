<?php
$idUsuario =$_POST['idUsuario'];
include "../../../clases/Usuarios.php";
$Usuarios = new Usuarios(); // creacion de un nuevo objeto
echo json_encode(array_map('utf8_encode',$Usuarios->obtenerDatosUsuario($idUsuario)));//regresa un string con formato json