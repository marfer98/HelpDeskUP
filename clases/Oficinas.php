<?php 
    include "Conexion.php"; //se incluye la conexion a la bd
    class Oficinas extends Conexion{

        public function agregarNuevaOficina($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "INSERT INTO t_oficina (nombre, 
                                           telefono, 
                                           correo)
                    VALUES (?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sss",
                                       //$idOficina, //los datos traigo de agregarNuevaOficina.php 
                                        $datos['nombreOficina'],
                                        $datos['telefonoOficina'],
                                        $datos['correoOficina']);
            
            $respuesta = $query->execute();
            return $respuesta;

        }  
}
?>