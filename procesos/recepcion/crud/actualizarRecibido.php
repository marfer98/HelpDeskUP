<?php
//print_r ($_POST);
     $datos = array(
        'id_recepcion'           => $_POST['id_recepcion'],    
        'descripcionSolucion'   => $_POST['descripcionSolucion'],
        'fechaEntrega'          => $_POST['fechaEntrega'],
        'estado'                => $_POST['estado'],
        'tecnico'               => $_POST['tecnico'],
        'informeTecnico'        => $_POST['informeTecnico']);
        
        include "../../../clases/Recibidos.php";
        $Recibidos = new Recibidos(); // creacion de un nuevo objeto
        echo $Recibidos->actualizarRecepcion($datos);
?>


