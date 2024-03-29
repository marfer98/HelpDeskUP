<?php 
require_once "Conexion.php";
require_once "Asignacion.php";

class Oficinas{
    public static function obtenerDatosOficina($where=null){
        $sql = '
        SELECT 
            id_oficina,
            nombre,
            telefono,
            correo
        FROM t_oficina
        '.$where;
        return Conexion::select($sql); 
    }

    public static function agregarOficina($datos,$getId=false){
        $sql = '
        INSERT INTO t_oficina (
            nombre, 
            telefono, 
            correo
        ) VALUES (
            :nombre, 
            :telefono, 
            :correo
        )';
        $datos = [
            ':nombre' => $datos['nombre'],
            ':telefono' => $datos['telefono'],
            ':correo' => $datos['correo']
        ];
        return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
    }

    public static function actualizarOficina($datos,$getId=false){
        $sql = '
        UPDATE t_oficina 
        SET 
            nombre = :nombre,
            telefono = :telefono,
            correo = :correo 
        WHERE id_oficina = :id_oficina;
        ';
        $datos = [
            ':nombre' => $datos['nombre'],
            ':telefono' => $datos['telefono'],
            ':correo' => $datos['correo'],
            ':id_oficina' => $datos['id_oficina']
        ];
        return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
    }

    public static function eliminarOficina($id){
        $oficina = Asignacion::obtenerDatosAsignacion('WHERE id_oficina = '.$id['id_oficina']);
        $oficina = $oficina ? $oficina[0] : ['id_asignacion'=>null];
        Asignacion::eliminarAsignacion(['id_asignacion'=>$oficina['id_asignacion']]);
        
        $sql = '
            DELETE FROM t_oficina
            WHERE id_oficina = :id_oficina';
        $datos = [
            ':id_oficina' => $id['id_oficina']
        ];
        return Conexion::execute($sql,$datos);
    }

    public static function obtenerIdOficina($idUsuario){
        
        //obtener el id 
        $sql = "SELECT 
                    oficina.id_oficina as id_oficina 
                FROM 
                    t_usuarios as usuarios 
                INNER JOIN 
                    t_oficina as oficina 
                    ON usuarios.id_oficina = oficina.id_oficina 
                    AND usuarios.id_usuario = :idUsuario";
        $respuesta = Conexion::select($sql,[
            ':idUsuario' => $idUsuario
        ]);

        return $respuesta[0]['id_oficina'];
    }
}
?>