<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

    require_once "Conexion.php";
    require_once "Oficinas.php";

    class Usuarios extends Oficinas{
        public static function loginUsuario($usuario,$password){
            // Validar si el usuario existe
            $sql = "SELECT id_usuario FROM t_usuarios WHERE usuario = '$usuario'";
            $respuesta = Conexion::select($sql);
        
            if ($respuesta && count($respuesta)>0) {
                // El usuario existe
        
                // Validar si la contraseña es correcta
                $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
                $respuesta = Conexion::select($sql);
        
                if ($respuesta && count($respuesta)>0) {
                    // La contraseña es correcta
        
                    // Crear una sesion del usuario
                    if ($respuesta[0]['activo']==1) {
                        $_SESSION['usuario']['nombre']  = $respuesta[0]['usuario']; // toma el usuario
                        $_SESSION['usuario']['id']      = $respuesta[0]['id_usuario']; // toma el id del usuario
                        $_SESSION['usuario']['rol']     = $respuesta[0]['id_rol']; // toma el rol del usuario
                        return 1; 
                    }else{
                        return 'El usuario se encuentra inactivo'; 
                    }
                } else {
                    // La contraseña es incorrecta
                    return 'La contraseña es incorrecta';
                }
            } else {
                // El usuario no existe
                return 'No se ha encontrado usuario';
            }
        }
        

        public static function agregaNuevoUsuario($datos){
            //$id_oficina = self::agregarOficina($datos,true);
            
                $sql ="INSERT INTO t_usuarios ( 
                            id_rol,
                            id_oficina,
                            usuario,
                            password,
                            ubicacion,
                            id_sucursal,
                            prioridad
                            )
                        VALUES (
                            :id_rol,
                            :id_oficina,
                            :usuario,
                            :password,
                            :ubicacion,
                            :id_sucursal,
                            :prioridad
                        )";                                       
                                  
                $respuesta = Conexion::execute($sql,[
                    ':id_rol'       => $datos['idRol'],
                    ':id_oficina'   => $datos['id_oficina'],
                    ':usuario'      => $datos['nombreUsuario'],
                    ':password'     => $datos['password'],
                    ':ubicacion'    => $datos['ubicacion'],
                    ':id_sucursal'  => $datos['id_sucursal'],
                    ':prioridad'  => $datos['prioridad'],
                ]);
                
                return $respuesta;


        }

        public static function obtenerDatosUsuario($idUsuario){
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario as nombreUsuario,
                        roles.nombre as rol,
                        usuarios.id_rol AS id_rol,
                        usuarios.prioridad AS prioridad,
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
                        LEFT JOIN
                    t_oficina AS oficina ON usuarios.id_oficina = oficina.id_oficina
                    LEFT JOIN
                    t_sucursales AS s ON usuarios.id_sucursal = s.id_sucursal
                    WHERE  usuarios.id_usuario = :idUsuario";// Obtener todos los datos del usuario
            $respuesta = Conexion::select($sql,[
                ':idUsuario' => $idUsuario
            ]);

            //var_dump($sql);

            $usuario = $respuesta[0];
            
            $datos = array( //ARRAY DE POST QUE SE ENVIAN
                'idUsuario'      => $usuario['idUsuario'],
                'nombreUsuario'  => $usuario['nombreUsuario'],
                'rol'            => $usuario['rol'],
                'id_rol'         => $usuario['id_rol'],
                'ubicacion'      => $usuario['ubicacion'],
                'estatus'        => $usuario['estatus'],
                'nombreOficina'  => $usuario['nombreOficina'],
                'telefono'       => $usuario['telefono'],
                'correo'         => $usuario['correo'],
                'id_oficina'     => $usuario['id_oficina'],
                'prioridad'     => $usuario['prioridad'],
            );

            return $datos;
        }

        public static function actualizarUsuario($datos){
            //hace referencia a que se actualizo con exito 
                $exitoOficina = self::actualizarOficina($datos); // exito al actualizar

                $sql = "UPDATE t_usuarios SET id_rol   = :idRol,
                                             usuario   = :nombreUsuario,
                                             ubicacion = :ubicacion,
                                             id_sucursal = :id_sucursal,
                                             id_oficina = :id_oficina,
                                             prioridad = :prioridad
                        WHERE id_usuario = :idUsuario";                     
                                           
                $respuesta = Conexion::execute($sql,[
                    ':idRol'            => $datos['idRol'],
                    ':nombreUsuario'    => $datos['nombreUsuario'],
                    ':ubicacion'        => $datos['ubicacion'],
                    ':idUsuario'        => $datos['idUsuario'],
                    ':id_sucursal'      => $datos['id_sucursal'],
                    ':id_oficina'      => $datos['id_oficina'],
                    ':prioridad'      => $datos['prioridad'],
                    
                ]);

                return $respuesta;
        }

        public static function resetPassword($datos){
            
            $sql = "UPDATE t_usuarios
                    SET password = :password
                    WHERE id_usuario = :idUsuario";
            
            $respuesta = Conexion::execute($sql,[
                ':password'     => $datos['password'],
                ':idUsuario'    => $datos['idUsuario']
            ]);

            return $respuesta;
        }

        public static function cambioEstatusUsuario($idUsuario, $estatus){
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

        public static function cambioRolUsuario($idUsuario, $rol){
            $rol = ($rol == 1) ? 2 : 1;

            $sql = "UPDATE t_usuarios
                    SET id_rol = :id_rol
                    WHERE id_usuario = :idUsuario";

            $respuesta = Conexion::execute($sql,[
                ':id_rol'      => $rol,
                ':idUsuario'    => $idUsuario
            ]);

            return $respuesta;
        }
    
        public static function obtenerDatosUsuarios(){
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario as nombreUsuario,
                        roles.nombre as rol,
                        usuarios.id_rol AS id_rol,
                        usuarios.prioridad AS prioridad,
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
                        LEFT JOIN
                    t_oficina AS oficina ON usuarios.id_oficina = oficina.id_oficina
                        LEFT JOIN
                    t_sucursales AS s ON usuarios.id_sucursal = s.id_sucursal
                    ";// Obtener todos los datos del usuario
            $respuesta = Conexion::select($sql,[
                //':idUsuario' => $idUsuario
            ]);

            return $respuesta;
        }
        
        public static function eliminarUsuarios($id){
            $sql = '
        DELETE FROM t_usuarios
        WHERE id_usuario = :id_usuario';
            $datos = [
                ':id_usuario' => $id['id_usuario']
            ];
            return Conexion::execute($sql,$datos);
        }
}

?>