<?php
// Delete Usuarios
$datos = [
    'id_usuario' => $_POST['id_usuario']
];

include "../../../clases/Usuarios.php";
echo Usuarios::eliminarUsuarios($datos);