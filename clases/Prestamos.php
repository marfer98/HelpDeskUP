<?php
    require_once "Conexion.php";
    require_once "Adquisiciones.php";
    require_once "Asignacion.php";
    require_once "Oficinas.php";
    
class Prestamos{
    public static function obtenerDatosPrestamos($where=null){
        $sql = '
        SELECT 
            id_prestamo,
            id_articulo,
            id_oficina_origen,
            nombre_oficina_origen,
            id_oficina_destino,
            nombre_oficina_destino,
            cantidad,
            estado
        FROM t_prestamos
        '.$where;
        return Conexion::select($sql); 
    }
 
    public static function agregarPrestamos($datos,$getId = false){
        $sql = '
        INSERT INTO t_prestamos (
            id_articulo, 
            id_oficina_origen, 
            id_oficina_destino, 
            cantidad, 
            estado
        ) VALUES (
            :id_articulo, 
            :id_oficina_origen, 
            :id_oficina_destino, 
            :cantidad, 
            :estado
        )';
        $datos = [
            ':id_articulo' => $datos['id_articulo'],
            ':id_oficina_origen' => $datos['id_oficina_origen'],
            ':id_oficina_destino' => $datos['id_oficina_destino'],
            ':cantidad' => $datos['cantidad'],
            ':estado' => $datos['estado']
        ];
        return !$$respuesta = !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos); 
    }
 
    public static function actualizarPrestamos($datos,$getId = false){
        $sql = '
        UPDATE t_prestamos 
        SET 
            id_articulo = :id_articulo,
            id_oficina_origen = :id_oficina_origen,
            id_oficina_destino = :id_oficina_destino,
            cantidad = :cantidad,
            estado = :estado 
        WHERE id_prestamo = :id_prestamo';
        $datos = [
            ':id_articulo' => $datos['id_articulo'],
            ':id_oficina_origen' => $datos['id_oficina_origen'],
            ':id_oficina_destino' => $datos['id_oficina_destino'],
            ':cantidad' => $datos['cantidad'],
            ':estado' => $datos['estado'],
            ':id_prestamo' => $datos['id_prestamo']
        ];
        return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
    }
 
    public static function eliminarPrestamos($id){
        $sql = '
        DELETE FROM t_prestamos
        WHERE id_prestamo = :id_prestamo';
        $datos = [
        ':id_prestamo' => $id['id_prestamo']
        ];
        return Conexion::execute($sql,$datos);
    }
}