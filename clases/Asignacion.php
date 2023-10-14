<?php
    require_once "Conexion.php";

    class Asignacion extends Conexion{
        public function agregarAsignacion($datos){
            $sql ="
                INSERT INTO t_asignacion (
                    id_oficina, 
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
                VALUES (
                    :id_oficina, 
                    :id_equipo,
                    :nombreEquipoA,
                    :rotulado, 
                    :marca, 
                    :modelo, 
                    :numeroSerie, 
                    :descripcion, 
                    :memoria, 
                    :tipo_ram,
                    :disco_duro, 
                    :procesador,
                    :sistema_operativo)";
     
            //VIENE DEL PROCESO asignar.php
            $respuesta = Conexion::select($sql,[
                ':idOficina'            => $datos['idOficina'], 
                ':idEquipo'             => $datos['idEquipo'],
                ':nombreEquipoA'        => $datos['nombreEquipoA'],
                ':rotulado'             => $datos['rotulado'],
                ':marca'                => $datos['marca'],
                ':modelo'               => $datos['modelo'],
                ':numeroSerie'          => $datos['numeroSerie'],
                ':descripcion'          => $datos['descripcion'],
                ':memoria'              => $datos['memoria'],
                ':tipoRam'              => $datos['tipoRam'],
                ':discoDuro'            => $datos['discoDuro'],
                ':procesador'           => $datos['procesador'],
                ':sistemaOperativo'     => $datos['sistemaOperativo']

            ]);
            return $respuesta;
        }

        public function eliminarAsignacion($idAsignacion){
            $sql = "DELETE FROM t_asignacion 
                    WHERE id_asignacion = :id_asignacion";
            
            $respuesta = Conexion::execute($sql,[
                ':idAsignacion' => $idAsignacion
            ]);

            return $respuesta;
        }
    }

?>

