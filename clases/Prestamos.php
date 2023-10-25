<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    require_once "Conexion.php";
    require_once "Adquisiciones.php";
    require_once "Asignacion.php";
    require_once "Oficinas.php";
    
class Prestamos{
    public static function obtenerDatosPrestamos($where=null){
        $sql = '/*v_prestamos*/
        SELECT * FROM (
            SELECT 
                p.id_prestamo,
                p.id_articulo,
                a.nombreEquipoA,
                p.id_oficina_origen,
                o1.nombre as nombre_oficina_origen,
                p.id_oficina_destino,
                o2.nombre as nombre_oficina_destino,
                p.cantidad,
                p.estado
            FROM t_prestamos p
            JOIN t_articulos a ON a.id_articulo = p.id_articulo
            JOIN t_oficina o1 ON p.id_oficina_origen = o1.id_oficina
            JOIN t_oficina o2 ON p.id_oficina_destino = o2.id_oficina
        )v_prestamos
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
        return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos); 
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