<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Roles{
        public function obtenerDatosRoles($where=null){
            $sql = '
            SELECT 
                id_rol,
                nombre,
                descripcion
            FROM t_cat_roles
            '.$where;
            return Conexion::select($sql); 
        }
     
        public function agregarNuevoRol($datos){
            $sql = '
            INSERT INTO t_cat_roles (
                id_rol, 
                nombre, 
                descripcion
            ) VALUES (
                :id_rol, 
                :nombre, 
                :descripcion
            )';
            $datos = [
                ':id_rol' => $datos['id_rol'],
                ':nombre' => $datos['nombre'],
                ':descripcion' => $datos['descripcion'],
            ];
            return Conexion::execute($sql,$datos);
        }
     
        public function actualizarRol($datos){
            $sql = '
            UPDATE t_cat_roles 
            SET 
                id_rol = :id_rol,
                nombre = :nombre,
                descripcion = :descripcion
            WHERE id_cat_roles = :id_cat_roles';
            $datos = [
                ':id_rol' => $datos['id_rol'],
                ':nombre' => $datos['nombre'],
                ':descripcion' => $datos['descripcion'],
                ':id_cat_roles' => $datos['id_cat_roles']
            ];
            return Conexion::execute($sql,$datos);
        }
     
        public function eliminarRol($id){
            $sql = '
            DELETE FROM t_cat_roles
            WHERE id_cat_roles = :id_cat_roles';
            $datos = [
                ':id_cat_roles' => $id
            ];
            return Conexion::execute($sql,$datos);
        }
    }
?>