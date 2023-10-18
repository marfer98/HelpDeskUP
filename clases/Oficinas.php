<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Oficinas{

        public function agregarNuevaOficina($datos){
            $sql = "INSERT INTO t_oficina (
                        nombre, 
                        telefono, 
                        correo)
                    VALUES (
                        :nombreOficina
                        :telefonoOficina
                        :correoOficina
                    )";
  
            //los datos traigo de agregarNuevaOficina.php 
            $respuesta = Conexion::execute($sql,[
                ':nombreOficina'    => $datos['nombreOficina'],
                ':telefonoOficina'  => $datos['telefonoOficina'],
                ':correoOficina'    => $datos['correoOficina']
            ]);

            return $respuesta;

        }  

        public function agregarOficina($datos){
            // Insertamos datos en la tabla oficina
            $sql = "INSERT INTO t_oficina (  
                        nombre,
                        telefono,
                        correo)
                    VALUES (
                        :nombre,
                        :telefono,
                        :correo
                    )";
                    
            $idOficina = Conexion::execute_id($sql,[
                ':nombre'   => $datos['nombre'],
                ':telefono' => $datos['telefono'],
                ':correo'   => $datos['correo']
            ]);

            return $idOficina;
        }

        public function actualizarOficina ($datos){
            
            $idOficina = self::obtenerIdOficina($datos['idUsuario']);
            $sql = "UPDATE t_oficina SET  nombre    = :nombre,
                                          telefono  = :telefono,
                                          correo    = :correo 
                                          WHERE id_oficina = :id_oficina";
            
            $respuesta = Conexion::execute($sql,[
                ':nombre'       => $datos['nombre'],
                ':telefono'     => $datos['telefono'],
                ':correo'       => $datos['correo'],
                ':id_oficina'   => $idOficina
            ]);

            return $respuesta;
        }

        public function obtenerIdOficina($idUsuario){
            
            //obtener el id 
            $sql = "SELECT 
                        oficina.id_oficina as idOficina 
                    FROM 
                        t_usuarios as usuarios 
                    INNER JOIN 
                        t_oficina as oficina 
                        ON usuarios.id_oficina = oficina.id_oficina 
                        AND usuarios.id_usuario = :idUsuario";
            $respuesta = Conexion::select($sql,[
                ':idUsuario' => $idUsuario
            ]);

            return $respuesta[0]['idOficina'];
        }
}
?>