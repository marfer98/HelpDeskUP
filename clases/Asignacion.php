<?php

    require_once "Conexion.php";
    require_once "Adquisiciones.php";

    class Asignacion{
        public static function obtenerDatosAsignacion($where=null){
            $sql = '/*v_asignacion*/
            SELECT DISTINCT * FROM (
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
                    a.sistema_operativo AS sistema_operativo,
                    asg.cantidad
                FROM t_asignacion asg
                    INNER JOIN t_articulos AS a ON asg.id_articulo = a.id_articulo
                    INNER JOIN t_oficina AS o ON asg.id_oficina = o.id_oficina
                )v_asignacion
            '.$where;
            return Conexion::select($sql); 
        }

        public static function agregarAsignacion($datos,$getId = false,$validarAdquisicion=true){
            $adquisicion = false;

            if($validarAdquisicion){
                $adquisicion = Adquisiciones::obtenerDatosAdquisiciones("
                    WHERE 
                        id_articulo = ".$datos['id_articulo']." AND
                        cantidad >= ".$datos['cantidad']."
                ");
            }
            
            // Resta de cantidad de Adquisición
            if($adquisicion || !$validarAdquisicion){
                if($validarAdquisicion){
                    $adquisicion = $adquisicion[0];
                    Adquisiciones::actualizarAdquisiciones([
                        'cantidad'          => $adquisicion['cantidad'] - $datos['cantidad'],
                        'id_adquisicion'   => $adquisicion['id_adquisicion'], 
                        'id_articulo'      => $adquisicion['id_articulo'],
                        'id_proveedor'     => $adquisicion['id_proveedor'],
                    ],false,false);
                }

                $sql ="
                    INSERT INTO t_asignacion (
                        id_oficina, 
                        id_articulo,
                        cantidad)
                    VALUES (
                        :id_oficina, 
                        :id_articulo,
                        :cantidad
                        )";
        
                //VIENE DEL PROCESO asignar.php
                $respuesta = Conexion::execute($sql,[
                    ':id_oficina'    => $datos['id_oficina'], 
                    ':id_articulo'  => $datos['id_articulo'],
                    ':cantidad'     => $datos['cantidad'],
                ]);
                return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos); 
            }else{
                return ' Equipo con cantidad insuficiente';
            }

        }

        public static function eliminarAsignacion($id_asignacion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "DELETE FROM t_asignacion 
                    WHERE id_asignacion = :id_asignacion";
            
            $respuesta = Conexion::execute($sql,[
                ':id_asignacion' => $id_asignacion['id_asignacion']
            ]);

            return $respuesta;
        }

        public static function actualizarAsignacion($datos,$getId = false){
            $asignacion = self::obtenerDatosAsignacion("
                WHERE 
                    id_oficina != ".$datos['id_oficina']." AND
                    id_asignacion = ".$datos['id_asignacion']." 
            ");
        
            // Devuelve a adquisición en caso de seleccionar Oficina distinta y con menor cantidad de equipos
            Adquisiciones::devolverStockAquisiciones($datos);

            $datos['cantidad'] = $asignacion ? $asignacion[0]['cantidad'] + $datos['cantidad'] : $datos['cantidad'];

            $sql = '
                UPDATE t_asignacion 
                SET 
                    id_oficina = :id_oficina,
                    id_articulo = :id_articulo,
                    cantidad = :cantidad 
                WHERE id_asignacion = :id_asignacion';
            $datos = [
                ':id_oficina' => $datos['id_oficina'],
                ':id_articulo' => $datos['id_articulo'],
                ':id_asignacion' => $datos['id_asignacion'],
                ':cantidad' => $datos['cantidad'],
            ];
            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }

        public static function actualizarAsignacionPrestamos($datos,$getId = false){
            $asignacion = self::obtenerDatosAsignacion("
                WHERE 
                    -- id_oficina != ".$datos['id_oficina']." AND
                    id_asignacion = ".$datos['id_asignacion']." 
            ");
        
            //Adquisiciones::devolverStockAquisiciones($datos);

            $datos['cantidad'] = $asignacion ? $asignacion[0]['cantidad'] + $datos['cantidad'] : $datos['cantidad'];

            $sql = '
                UPDATE t_asignacion 
                SET 
                    id_oficina = :id_oficina,
                    id_articulo = :id_articulo,
                    cantidad = :cantidad 
                WHERE id_asignacion = :id_asignacion';
            $datos = [
                ':id_oficina' => $datos['id_oficina'],
                ':id_articulo' => $datos['id_articulo'],
                ':id_asignacion' => $datos['id_asignacion'],
                ':cantidad' => $datos['cantidad'],
            ];
            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }
        
    }

    

?>
