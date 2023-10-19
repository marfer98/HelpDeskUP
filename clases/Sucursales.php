<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Sucursales {
        public function obtenerDatosSucursales($where=null){
            $sql = '
            SELECT 
              descripcion,
              direccion
            FROM sucursales
            '.$where;
            return Conexion::select($sql); 
        }
      
        public function agregarNuevaSucursal($datos){
            $sql = '
            INSERT INTO sucursales (
                descripcion, 
                direccion
            ) VALUES (
                :descripcion, 
                :direccion
            )';
            $datos = [
              ':descripcion' => $datos['descripcion'],
              ':direccion' => $datos['direccion']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function actualizarSucursal($datos){
            $sql = '
            UPDATE sucursales 
            SET 
              descripcion = :descripcion,
              direccion = :direccion 
            WHERE id_sucursales = :id_sucursales';
            $datos = [
              ':descripcion' => $datos['descripcion'],
              ':direccion' => $datos['direccion'],
              ':id_sucursales' => $datos['id_sucursales']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function eliminarSucursal($id){
            $sql = '
            DELETE FROM sucursales
            WHERE id_sucursales = :id_sucursales';
            $datos = [
            ':id_sucursales' => $id
            ];
            return Conexion::execute($sql,$datos);
        }
        
    }
?>