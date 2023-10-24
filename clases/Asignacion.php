<?php

    require_once "Conexion.php";

    class Asignacion{
        public static function obtenerDatosAsignacion($where=null){
            $sql = 'SELECT DISTINCT * FROM (
                SELECT 
                    asg.id_asignacion,
                    asg.id_oficina,
                    o.nombre as nombre_oficina,
                    asg.id_articulo,
                    a.nombreEquipoA,
                    a.rotulado AS rotulado,
                    a.marca AS marca,
                    a.modelo AS modelo,
                    a.numeroSerie AS numeroSerie,
                    a.descripcion AS descripcion,
                    a.memoria AS memoria,
                    a.tipo_ram AS tipo_ram,  
                    a.disco_duro AS disco_duro,
                    a.procesador AS procesador,
                    a.sistema_operativo AS sistema_operativo
                FROM t_asignacion asg
                    INNER JOIN t_articulos AS a ON asg.id_articulo = a.id_articulo
                    INNER JOIN t_oficina AS o ON asg.id_oficina = o.id_oficina
                )v_asignacion
            '.$where;
            return Conexion::select($sql); 
        }

        public static function agregarAsignacion($datos){
            $sql ="
                INSERT INTO t_asignacion (
                    id_oficina, 
                    id_articulo)
                VALUES (
                    :idOficina, 
                    :id_articulo
                    )";
     
            //VIENE DEL PROCESO asignar.php
            $respuesta = Conexion::execute($sql,[
                ':idOficina'            => $datos['idOficina'], 
                ':id_articulo'          => $datos['id_articulo'],
            ]);
            return $respuesta;
        }

        public static function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "DELETE FROM t_asignacion 
                    WHERE id_asignacion = :id_asignacion";
            
            $respuesta = Conexion::execute($sql,[
                ':id_asignacion' => $idAsignacion['idAsignacion']
            ]);

            return $respuesta;
        }

        public static function actualizarAsignacion($datos,$getId = false){
            $sql = '
            UPDATE t_asignacion 
            SET 
                id_oficina = :id_oficina,
                id_articulo = :id_articulo 
            WHERE id_asignacion = :id_asignacion';
            $datos = [
                ':id_oficina' => $datos['id_oficina'],
                ':id_articulo' => $datos['id_articulo'],
                ':id_asignacion' => $datos['id_asignacion']
            ];
            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }
    }

    

?>
