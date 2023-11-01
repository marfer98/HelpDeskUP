<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);
      // Update Prestamos
      $datos = [
            'id_articulo' => $_POST['id_articulo'],
            'id_oficina_origen' => $_POST['id_oficina_origen'],
            'id_oficina_destino' => $_POST['id_oficina_destino'],
            'cantidad' => $_POST['cantidad'],
            'estado' => $_POST['estado'],
            'id_prestamo' => $_POST['id_prestamo']       
      ];

      include "../../clases/Prestamos.php";
      echo Prestamos::actualizarPrestamos($datos);