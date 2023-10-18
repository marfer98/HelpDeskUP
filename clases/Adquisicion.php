<?php

    require_once "Conexion.php";

    class Adquisicion{
        public function agregarAdquisicion($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql ="
                INSERT INTO t_adquisicion (
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

        public function eliminarAdquisicion($idAdquisicion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "DELETE FROM t_adquisicion 
                    WHERE id_adquisicion = :id_adquisicion";
            
            $respuesta = Conexion::execute($sql,[
                ':idAdquisicion' => $idAdquisicion
            ]);

            return $respuesta;
        }
    }

?>
