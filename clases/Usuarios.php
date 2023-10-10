<?php 
    include "Conexion.php"; //se incluye la conexion a la bd
    
    class Usuarios extends Conexion{
        public function loginUsuario($usuario,$password){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$password'";//condicion para el ingreso desde la base de datos

                $respuesta = Conexion::select($sql);//respuesta de la base de datos

            if (count($respuesta)>0) { // Si retorta un respuesta la bd
                $datosUsuario = ($respuesta[0]);
                
                // Crear una sesion del usuario
                if ($datosUsuario['activo']==1) {
                    $_SESSION['usuario']['nombre']  = $datosUsuario['usuario']; // toma el usuario
                    $_SESSION['usuario']['id']      = $datosUsuario['id_usuario']; // toma el id del usuario
                    $_SESSION['usuario']['rol']     = $datosUsuario['id_rol']; // toma el rol del usuario
                    return 1; 
                }else{
                    return 0; 
                }
            }else{
                return 0;
            }

        }

        public function agregaNuevoUsuario($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $idOficina = self::agregarOficina($datos);
            
            if ($idOficina > 0) {
                $sql ="INSERT INTO t_usuarios ( 
                            id_rol,
                            id_oficina,
                            usuario,
                            password,
                            ubicacion)
                        VALUES (
                            :id_rol,
                            :id_oficina,
                            :usuario,
                            :password,
                            :ubicacion
                        )";                                       
                                  
                $respuesta = Conexion::select($sql,[
                    ':id_rol'       => $datos['idRol'],
                    ':id_oficina'   => $idOficina,
                    ':usuario'      => $datos['nombreUsuario'],
                    ':password'     => $datos['password'],
                    ':ubicacion'    => $datos['ubicacion']
                ]);
                
                return $respuesta;
            }else {
                return 0;
            }

            //insertamos datos en la tabla usuarios
 
        }

        public function agregarOficina($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
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

        public function obtenerDatosUsuario($idUsuario){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario as nombreUsuario,
                        roles.nombre as rol,
                        usuarios.id_rol AS id_rol,
                        usuarios.ubicacion as ubicacion,
                        usuarios.activo as estatus,
                        usuarios.id_oficina as idOficina,
                        oficina.nombre AS nombreOficina,
                        oficina.telefono AS telefono,
                        oficina.correo AS correo
                    FROM
                    t_usuarios AS usuarios
                        INNER JOIN
                    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                    t_oficina AS oficina ON usuarios.id_oficina = oficina.id_oficina
                    AND usuarios.id_usuario= '$idUsuario'";//obtener todos los datos del usuario
            $respuesta = mysqli_query($conexion,$sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array( //ARRAY DE POST QUE SE ENVIAN
                'idUsuario'      => $usuario['idUsuario'],
                'nombreUsuario'  => $usuario['nombreUsuario'],
                'rol'            => $usuario['rol'],
                'id_rol'         => $usuario['id_rol'],
                'ubicacion'      => $usuario['ubicacion'],
                'estatus'        => $usuario['estatus'],
                'idOficina'      => $usuario['idOficina'],
                'nombreOficina'  => $usuario['nombreOficina'],
                'telefono'       => $usuario['telefono'],
                'correo'         => $usuario['correo']
            );
            return $datos;
        }

        public function actualizarUsuario($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            //hace referencia a que se actualizo con exito 
            $exitoOficina= self::actualizarOficina($datos); // exito al actualizar

            if ($exitoOficina){
                $sql ="UPDATE t_usuarios SET id_rol    =?,
                                             usuario   =?,
                                             ubicacion =? 
                       WHERE id_usuario = ?"  ;
                $query = $conexion->prepare($sql);
                $query->bind_param('issi', $datos['idRol'],
                                           $datos['nombreUsuario'],
                                           $datos['ubicacion'],
                                           $datos['idUsuario']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }

        public function actualizarOficina ($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $idOficina = self::obtenerIdOficina($datos['idUsuario']);
            $sql = "UPDATE t_oficina SET  nombre    = ?,
                                          telefono  = ?,
                                          correo    = ? 
                                          WHERE id_oficina = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssi',$datos['nombre'],
                                      $datos['telefono'],
                                      $datos['correo'],
                                      $idOficina);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerIdOficina($idUsuario){
            $conexion = Conexion::conectar(); //traemos la conexion
            //obtener el id 
            $sql = "SELECT 
                        oficina.id_oficina as idOficina 
                    FROM 
                        t_usuarios as usuarios 
                    INNER JOIN 
                        t_oficina as oficina 
                        ON usuarios.id_oficina = oficina.id_oficina 
                        AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $idOficina = mysqli_fetch_array($respuesta)['idOficina'];

            return $idOficina;
        }

        public function resetPassword($datos){
            $conexion = Conexion::conectar(); 
            $sql = "UPDATE t_usuarios
                    SET password = ?
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('si',$datos['password'],
                                    $datos['idUsuario']);
            
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function cambioEstatusUsuario($idUsuario, $estatus){
            $conexion = Conexion::conectar();
            if ($estatus ==1) {
                $estatus = 0;
            }else {
                $estatus = 1;
            }
           $sql = "UPDATE t_usuarios
                    SET activo = ?
                    WHERE id_usuario = ?";
                       
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        
    }
?>