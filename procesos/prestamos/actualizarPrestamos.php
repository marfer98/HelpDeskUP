<?php
      // Update Prestamos
      $datos = [
            'id_articulo' => $_POST['id_articulo'],
            'id_oficina_origen' => $_POST['id_oficina_origen'],
            'id_oficina_destino' => $_POST['id_oficina_destino'],
            'cantidad' => $_POST['cantidad'],
            'estado' => $_POST['estado'],
            'id_prestamo' => $datos['id_prestamo']       
      ];

      include "../../clases/Prestamos.php";
      echo Prestamos::actualizarPrestamos($datos);