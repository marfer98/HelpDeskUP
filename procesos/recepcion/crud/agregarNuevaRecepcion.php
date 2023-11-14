<?php 
    //print_r ($_POST);
      $datos = array( //Array donde va lo que almacenaremos de usuario
         "id_equipo"        => $_POST['id_equipo'],//indica los datos que seran insertados
         "nombreEquipo"    => $_POST['nombreEquipo'],
         "rotulado"        => $_POST['rotulado'],
         "numeroSerie"     => $_POST['numeroSerie'], 
         "ciudad"          => $_POST['ciudad'],
         "procedencia"     => $_POST['procedencia'],
         "problema"        => $_POST['problema'],
         "recibido"        => $_POST['recibido'],
         "responsable"     => $_POST['responsable'],
         "estado"          => $_POST['estado']);

    include "../../../clases/Recibidos.php";

    $Recibidos = new Recibidos(); // creacion de un nuevo objeto
    echo $Recibidos->agregarNuevaRecepcion($datos);

