<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Reportes extends Conexion{
        public function agregarReporteCliente($datos){
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_equipo,
                                            descripcion_problema)
                    VALUES (
                        :idUsuario,
                        :id_equipo,
                        :problema)";
            $respuesta = Conexion::execute($sql,[
                ":idUsuario"    => $datos['idUsuario'],
                ":id_equipo"     => $datos['id_equipo'],
                ":problema"     => $datos['problema'],
            ]);

            return $respuesta;
        }

        public function eliminarReporteCliente($idReporte){
            $sql = "DELETE FROM t_reportes WHERE id_reporte = :idReporte";
            $respuesta = Conexion::execute($sql,[
                ":idReporte" => $idReporte
            ]);

            return $respuesta;
        }

        public function obtenerSolucion($idReporte){
            $sql = "SELECT solucion_problema, estatus, usuario_tecnico,imagen_solucion
                FROM t_reportes WHERE id_reporte = :idReporte";
            $reporte = Conexion::select($sql,[
                ":idReporte" => $idReporte
            ])[0];

            $datos = array(
                "idReporte"        => $idReporte,
                "estatus"          => $reporte['estatus'],
                "solucion"         => $reporte['solucion_problema'],
                "usuarioTecnico"   => $reporte['usuario_tecnico'],
                "imagen_solucion"   => $reporte['imagen_solucion'],
            );

            return $datos;
        }

        public function actualizarSolucion($datos){ //ESTO ES UN METODO
            $solucion = obtenerSolucion($datos['idReporte']);
            
            $sql ="UPDATE
                        t_reportes
                    SET
                        id_usuario_tecnico = :idUsuario,
                        solucion_problema = :solucion,
                        estatus = :estatus,
                        usuario_tecnico = :usuarioTecnico,
                        imagen_solucion = :imagen_solucion
                    WHERE
                        id_reporte = :idReporte";

            $respuesta = Conexion::execute($sql,[
                ":idUsuario"        => $datos['idUsuario'],
                ":solucion"         => $datos['solucion'],
                ":estatus"          => $datos['estatus'],
                ":usuarioTecnico"   => $datos['usuarioTecnico'],
                ":idReporte"        => $datos['idReporte'],
                ':imagen_solucion'  => $datos['imagen_solucion'] ? : $solucion['imagen_solucion'],
            ]);
            return $respuesta;
        }

        public function obtenerDatosReportes($where=null){
            $sql = "/*v_reportes*/
                SELECT * FROM (SELECT reporte.id_reporte           AS idReporte,
                        reporte.id_usuario           AS idUsuario,
                        oficina.nombre               AS nombreOficina,
                        equipo.id_equipo             AS id_equipo,
                        equipo.nombre                AS nombreEquipo,
                        reporte.usuario_tecnico      AS usuarioTecnico,
                        reporte.descripcion_problema AS problema,
                        reporte.solucion_problema    AS solucion,
                        reporte.estatus              AS estatus,
                        reporte.fecha                AS fecha,
                        imagen_solucion
                FROM   t_reportes AS reporte
                        INNER JOIN t_usuarios AS usuario
                                ON reporte.id_usuario = usuario.id_usuario
                        INNER JOIN t_oficina AS oficina
                                ON usuario.id_oficina = oficina.id_oficina
                        INNER JOIN t_cat_equipos AS equipo
                                ON reporte.id_equipo = equipo.id_equipo
                        INNER JOIN t_cat_roles tcr
                                ON tcr.id_rol = usuario.id_rol
                ORDER  BY 
                    reporte.estatus DESC, 
                    usuario.prioridad DESC,
                    reporte.fecha DESC
                )reporte
                $where
                ";
            return Conexion::select($sql);
        }
    }
?>