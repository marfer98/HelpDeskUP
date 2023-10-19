<?php

    require_once "Conexion.php";

    class Adquisicion{
        public function obtenerDatosAdquisiciones($where=null){
            $sql = '
            SELECT 
              id_articulo,
              id_proveedor,
              cantidad
            FROM adquisiciones
            '.$where;
            return Conexion::select($sql); 
        }
      
        public function agregarNuevaAdquisicion($datos){
            $sql = '
            INSERT INTO adquisiciones (
                id_articulo, 
                id_proveedor, 
                cantidad
            ) VALUES (
                :id_articulo, 
                :id_proveedor, 
                :cantidad
            )';
            $datos = [
              ':id_articulo' => $datos['id_articulo'],
              ':id_proveedor' => $datos['id_proveedor'],
              ':cantidad' => $datos['cantidad']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function actualizarAdquisicion($datos){
            $sql = '
            UPDATE adquisiciones 
            SET 
                id_articulo = :id_articulo,
                id_proveedor = :id_proveedor,
                cantidad = :cantidad 
            WHERE id_adquisiciones = :id_adquisiciones';
            $datos = [
                ':id_articulo' => $datos['id_articulo'],
                ':id_proveedor' => $datos['id_proveedor'],
                ':cantidad' => $datos['cantidad'],
                ':id_adquisiciones' => $datos['id_adquisiciones']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function eliminarAdquisicion($id){
            $sql = '
            DELETE FROM adquisiciones
            WHERE id_adquisiciones = :id_adquisiciones';
            $datos = [
                ':id_adquisiciones' => $id
            ];
            return Conexion::execute($sql,$datos);
        }
    }

?>
