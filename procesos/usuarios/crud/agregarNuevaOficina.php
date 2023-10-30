<?php 
    //print_r ($_POST);
 $datos = array( //Array donde va lo que almacenaremos de usuario
    "nombreOficina"         => $_POST['nombreOficina'], //indica los datos que seran insertados
    "telefonoOficina"       => $_POST['telefonoOficina'],  
    "correoOficina"         => $_POST['correoOficina'], 
    "prioridad"             => $_POST['prioridad'], 
 );
    include "../../../clases/Oficinas.php";
    $Oficinas = new Oficinas(); // creacion de un nuevo objeto
    echo $Oficinas->agregarNuevaOficina($datos);