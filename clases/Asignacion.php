<?php
    include "Conexion.php";

    class Asignacion extends Conexion{
        public function agregarAsignacion($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql ="INSERT INTO t_asignacion (id_oficina, 
                                            id_equipo,
                                            nombreEquipoA,
                                            rotulado, 
                                            marca, 
                                            modelo, 
                                            numeroSerie, 
                                            descripcion, 
                                            memoria, 
                                            tipo_ram,
                                            disco_duro, 
                                            procesador,
                                            sistema_operativo)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssssssssss',$datos['idOficina'], //VIENE DEL PROCESO asignar.php
                                                $datos['idEquipo'],
                                                $datos['nombreEquipoA'],
                                                $datos['rotulado'],
                                                $datos['marca'],
                                                $datos['modelo'],
                                                $datos['numeroSerie'],
                                                $datos['descripcion'],
                                                $datos['memoria'],
                                                $datos['tipoRam'],
                                                $datos['discoDuro'],
                                                $datos['procesador'],
                                                $datos['sistemaOperativo']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql =" DELETE FROM t_asignacion 
                    WHERE id_asignacion = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }

?>

