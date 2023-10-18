<?php

    require_once "Conexion.php";

    class Asignacion{
        public function agregarAsignacion($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
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

        public function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "DELETE FROM t_asignacion 
                    WHERE id_asignacion = :id_asignacion";
            
            $respuesta = Conexion::execute($sql,[
                ':idAsignacion' => $idAsignacion
            ]);

            return $respuesta;
        }
    }

?>
