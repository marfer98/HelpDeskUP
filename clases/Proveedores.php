<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Proveedores{
        public function obtenerDatosProveedores($where=null){
            $sql = '
            SELECT 
                nombre,
                direccion,
                telefono
            FROM proveedores
            '.$where;
            return Conexion::select($sql); 
        }
      
        public function agregarNuevoProveedor($datos){
            $sql = '
            INSERT INTO proveedores (
                nombre, 
                direccion, 
                telefono
            ) VALUES (
                :nombre, 
                :direccion, 
                :telefono
            )';
            $datos = [
                ':nombre' => $datos['nombre'],
                ':direccion' => $datos['direccion'],
                ':telefono' => $datos['telefono']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function actualizarProveedor($datos){
            $sql = '
            UPDATE proveedores 
            SET 
              nombre = :nombre,
              direccion = :direccion,
              telefono = :telefono 
            WHERE id_proveedores = :id_proveedores';
            $datos = [
                ':nombre' => $datos['nombre'],
                ':direccion' => $datos['direccion'],
                ':telefono' => $datos['telefono'],
                ':id_proveedores' => $datos['id_proveedores']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public function eliminarProveedor($id){
            $sql = '
            DELETE FROM proveedores
            WHERE id_proveedores = :id_proveedores';
            $datos = [
                ':id_proveedores' => $id
            ];
            return Conexion::execute($sql,$datos);
        }
    }
?>