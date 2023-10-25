<?php
    require_once "Conexion.php";
    require_once "Oficinas.php";

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    class Usuarios extends Oficinas{
        public function loginUsuario($usuario,$password){
            $sql = "SELECT * FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$password'";//condicion para el ingreso desde la base de datos

                $respuesta = Conexion::select($sql);//respuesta de la base de datos

            if ($respuesta && count($respuesta)>0) { // Si retorta un respuesta la bd
                $datosUsuario = ($respuesta[0]);
                
                // Crear una sesion del usuario
                if ($datosUsuario['activo']==1) {
                    $_SESSION['usuario']['nombre']  = $datosUsuario['usuario']; // toma el usuario
                    $_SESSION['usuario']['id']      = $datosUsuario['id_usuario']; // toma el id del usuario
                    $_SESSION['usuario']['rol']     = $datosUsuario['id_rol']; // toma el rol del usuario
                    return 1; 
                }else{
                    return 'El usuario se encuentra inactivo'; 
                }
            }else{
                return 'No se ha encontrado usuario';
            }

        }

        public function agregaNuevoUsuario($datos){
            $id_oficina = self::agregarOficina($datos,true);
            
            if ($id_oficina > 0) {
                $sql ="INSERT INTO t_usuarios ( 
                            id_rol,
                            id_oficina,
                            usuario,
                            password,
                            ubicacion,
                            id_sucursal)
                        VALUES (
                            :id_rol,
                            :id_oficina,
                            :usuario,
                            :password,
                            :ubicacion,
                            :id_sucursal
                        )";                                       
                                  
                $respuesta = Conexion::execute($sql,[
                    ':id_rol'       => $datos['idRol'],
                    ':id_oficina'   => $id_oficina,
                    ':usuario'      => $datos['nombreUsuario'],
                    ':password'     => $datos['password'],
                    ':ubicacion'    => $datos['ubicacion'],
                    ':id_sucursal'  => $datos['id_sucursal']
                ]);
                
                return $respuesta;
            }else {
                return 0;
            }

            //insertamos datos en la tabla usuarios
 
        }

        public function obtenerDatosUsuario($idUsuario){
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario as nombreUsuario,
                        roles.nombre as rol,
                        usuarios.id_rol AS id_rol,
                        usuarios.ubicacion as ubicacion,
                        usuarios.activo as estatus,
                        usuarios.id_oficina as id_oficina,
                        oficina.nombre AS nombreOficina,
                        oficina.telefono AS telefono,
                        oficina.correo AS correo,
                        oficina.id_oficina,
                        s.id_sucursal,
                        s.descripcion as sucursal
                    FROM
                    t_usuarios AS usuarios
                        INNER JOIN
                    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                    t_oficina AS oficina ON usuarios.id_oficina = oficina.id_oficina
                    LEFT JOIN
                    t_sucursales AS s ON usuarios.id_sucursal = s.id_sucursal
                    WHERE  usuarios.id_usuario = :idUsuario";// Obtener todos los datos del usuario
            $respuesta = Conexion::select($sql,[
                ':idUsuario' => $idUsuario
            ]);

            $usuario = $respuesta[0];
            
            $datos = array( //ARRAY DE POST QUE SE ENVIAN
                'idUsuario'      => $usuario['idUsuario'],
                'nombreUsuario'  => $usuario['nombreUsuario'],
                'rol'            => $usuario['rol'],
                'id_rol'         => $usuario['id_rol'],
                'ubicacion'      => $usuario['ubicacion'],
                'estatus'        => $usuario['estatus'],
                'id_oficina'      => $usuario['id_oficina'],
                'nombreOficina'  => $usuario['nombreOficina'],
                'telefono'       => $usuario['telefono'],
                'correo'         => $usuario['correo'],
                'id_oficina'     => $usuario['id_oficina'],
            );

            return $datos;
        }

        public function actualizarUsuario($datos){
            //hace referencia a que se actualizo con exito 
            $exitoOficina = self::actualizarOficina($datos); // exito al actualizar

            if ($exitoOficina){
                $sql = "UPDATE t_usuarios SET id_rol   = :idRol,
                                             usuario   = :nombreUsuario,
                                             ubicacion = :ubicacion,
                                             id_sucursal = :id_sucursal
                        WHERE id_usuario = :idUsuario";                     
                                           
                $respuesta = Conexion::execute($sql,[
                    ':idRol'            => $datos['idRol'],
                    ':nombreUsuario'    => $datos['nombreUsuario'],
                    ':ubicacion'        => $datos['ubicacion'],
                    ':idUsuario'        => $datos['idUsuario'],
                    ':id_sucursal'      => $datos['id_sucursal'],
                ]);

                return $respuesta;
            }else{
                return 0;
            }
        }

        public function resetPassword($datos){
            
            $sql = "UPDATE t_usuarios
                    SET password = :password
                    WHERE id_usuario = :idUsuario";
            
            $respuesta = Conexion::execute($sql,[
                ':password'     => $datos['password'],
                ':idUsuario'    => $datos['idUsuario']
            ]);

            return $respuesta;
        }

        public function cambioEstatusUsuario($idUsuario, $estatus){
            $estatus = ($estatus == 1) ? 0 : 1;
                
            $sql = "UPDATE t_usuarios
                    SET activo = :estatus
                    WHERE id_usuario = :idUsuario";
                       
            $respuesta = Conexion::execute($sql,[
                ':estatus'      => $estatus, 
                ':idUsuario'    => $idUsuario
            ]);

            return $respuesta;
        }
    
        public function obtenerDatosUsuarios(){
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario as nombreUsuario,
                        roles.nombre as rol,
                        usuarios.id_rol AS id_rol,
                        usuarios.ubicacion as ubicacion,
                        usuarios.activo as estatus,
                        usuarios.id_oficina as id_oficina,
                        oficina.nombre AS nombreOficina,
                        oficina.telefono AS telefono,
                        oficina.correo AS correo,
                        s.id_sucursal,
                        s.descripcion as sucursal
                    FROM
                    t_usuarios AS usuarios
                         JOIN
                    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                        INNER JOIN
                    t_oficina AS oficina ON usuarios.id_oficina = oficina.id_oficina
                         JOIN
                    t_sucursales AS s ON usuarios.id_sucursal = s.id_sucursal
                    ";// Obtener todos los datos del usuario
            $respuesta = Conexion::select($sql,[
                //':idUsuario' => $idUsuario
            ]);

            return $respuesta;
        }
}

?>