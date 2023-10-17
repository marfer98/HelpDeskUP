<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Sucursales {

        public function agregarNuevaSucursal($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "INSERT INTO t_sucursales(
                        descripcion, 
                        direccion)
                    VALUES (
                        :descripcion
                        :direccion
                        :correo
                    )";
  
            $respuesta = Conexion::select($sql,[
                ':descripcion'  => $datos['descripcion'],
                ':direccion'    => $datos['telefonoOfdireccionicina'],
            ]);

            return $respuesta;
        }  
}
?>