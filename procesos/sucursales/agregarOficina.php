<?php
    //session_start()
    
    
    $datos =array (
        "nombre"   =>$_POST["nombre"],
        "telefono" =>$_POST["telefono"], 
        "correo"   =>$_POST["correo"]
    );
include "../../clases/Sucursales.php";
$Oficina = new Oficina();
echo $Oficina->agregarOficina($datos);