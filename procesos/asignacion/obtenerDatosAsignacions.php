<?php
      // Obtener Asignacion
      $where = $_POST['where'];
      include "../../clases/Asignacion.php";
      echo json_encode(Asignacion::obtenerDatosAsignacion($where));