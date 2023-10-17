<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Oficinas extends Conexion{

        public function agregarNuevaOficina($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "INSERT INTO t_oficina (
                        nombre, 
                        telefono, 
                        correo)
                    VALUES (
                        :nombre
                        :telefono
                        :correo
                    )";
  
            //los datos traigo de agregarNuevaOficina.php 
            $respuesta = Conexion::select($sql,[
                ':nombreOficina'    => $datos['nombreOficina'],
                ':telefonoOficina'  => $datos['telefonoOficina'],
                ':correoOficina'    => $datos['correoOficina']
            ]);

            return $respuesta;

        }  
}
?>