<?php
      // Obtener Asignacion
      $id_asignacion = $_POST['id_asignacion'];
      include "../../clases/Asignacion.php";
      $where = "WHERE id_asignacion = $id_asignacion";
      echo json_encode(Asignacion::obtenerDatosAsignacion($where));