<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Proveedores{
        public static function obtenerDatosProveedores($where=null){
            $sql = '
            select * from (SELECT 
                id_proveedor,
                nombre,
                direccion,
                telefono
            FROM t_proveedores
            where estado = 1) as t_proveedores
            '.$where;
            return Conexion::select($sql); 
        }
     
        public static function agregarProveedores($datos){
            $sql = '
            INSERT INTO t_proveedores (
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
     
        public static function actualizarProveedores($datos){
            $sql = '
            UPDATE t_proveedores 
            SET 
                nombre = :nombre,
                direccion = :direccion,
                telefono = :telefono 
            WHERE id_proveedor = :id_proveedor';
            $datos = [
                ':nombre' => $datos['nombre'],
                ':direccion' => $datos['direccion'],
                ':telefono' => $datos['telefono'],
                ':id_proveedor' => $datos['id_proveedor']
            ];
            return Conexion::execute($sql,$datos);
        }
     
        public static function eliminarProveedores($id){
            /*
            $sql = '
                DELETE FROM t_proveedores
                WHERE id_proveedor = :id_proveedor';
            $datos = [
                ':id_proveedor' => $id['id_proveedor']
            ];
            */
            
            $sql = '
                UPDATE t_proveedores 
                SET 
                    estado = 0
                WHERE id_proveedor = :id_proveedor';
            $datos = [
        
                ':id_proveedor' => $id['id_proveedor']
            ];

            return Conexion::execute($sql,$datos);
        }
    }
?>