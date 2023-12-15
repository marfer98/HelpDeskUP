<?php
    require_once "Conexion.php";
    require_once "Adquisiciones.php";
    require_once "Asignacion.php";
    require_once "Oficinas.php";
    
class Prestamos extends Asignacion{
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
                p.estado,
                p.fecha_insert
            FROM t_prestamos p
            JOIN t_articulos a ON a.id_articulo = p.id_articulo
            JOIN t_oficina o1 ON p.id_oficina_origen = o1.id_oficina
            JOIN t_oficina o2 ON p.id_oficina_destino = o2.id_oficina
            ORDER BY p.fecha_insert
        )v_prestamos
        '.$where.'
        ORDER BY estado , fecha_insert desc
        ';
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
        $prestado = true;

        if($datos['estado'] == 1){
            // Baja el stock actual
            $asignacion = self::obtenerDatosAsignacion("
                WHERE 
                    id_oficina = ".$datos['id_oficina_origen']." AND
                    id_articulo = ".$datos['id_articulo']." AND
                    cantidad >= ".$datos['cantidad']." 
            ");
//var_dump($asignacion);
            if($asignacion){
                $asignacion = $asignacion[0];
                Asignacion::actualizarAsignacionPrestamos([
                    'id_asignacion' => $asignacion['id_asignacion'],
                    'id_oficina' => $datos['id_oficina_origen'],
                    'id_articulo' => $datos['id_articulo'],
                    'cantidad' => $asignacion['cantidad'] - $datos['cantidad'],
                ]);

                $asignacionDestino = self::obtenerDatosAsignacion("
                    WHERE 
                        id_oficina = ".$datos['id_oficina_destino']." AND
                        id_articulo = ".$datos['id_articulo']." 
                ");
//var_dump( $asignacionDestino);
                if($asignacionDestino){
                    $asignacionDestino = $asignacionDestino[0];
                    $asignacionNueva = Asignacion::actualizarAsignacionPrestamos([
                        'id_asignacion' => $asignacionDestino['id_asignacion'],
                        'id_oficina' => $datos['id_oficina_destino'],
                        'id_articulo' => $datos['id_articulo'],
                        'cantidad' => $datos['cantidad'],
                    ]);
                }else{
                    $asignacionNueva = Asignacion::agregarAsignacion([
                        'id_oficina' => $datos['id_oficina_destino'],
                        'id_articulo' => $datos['id_articulo'],
                        'cantidad' => $asignacion['cantidad'] + $datos['cantidad'],
                    ],false,false);
                    
                }

//var_dump($asignacionNueva);

            }else{
                return false;
            }
            
        }

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