<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Reportes extends Conexion{
        public function agregarReporteCliente($datos){
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_equipo,
                                            descripcion_problema)
                    VALUES (
                        :idUsuario,
                        :idEquipo,
                        :problema)";
            $respuesta = Conexion::select($sql,[
                ":idUsuario"    => $datos['idUsuario'],
                ":idEquipo"     => $datos['idEquipo'],
                ":problema"     => $datos['problema'],
            ]);

            return $respuesta;
        }
            public function eliminarReporteCliente($idReporte){
                $sql = "DELETE FROM t_reportes WHERE id_reporte = :idReporte?";
                $respuesta = Conexion::execute($sql,[
                    ":idReporte" => $idReporte
                ]);

                return $respuesta;
            }
            public function obtenerSolucion($idReporte){
                $sql = "SELECT solucion_problema, estatus, usuario_tecnico
                 FROM t_reportes WHERE id_reporte = ':idReporte'";
                $reporte = Conexion::select($sql,[
                    ":idReporte" => $idReporte
                ])[0];

                $datos = array(
                    "idReporte"        => $idReporte,
                    "estatus"          => $reporte['estatus'],
                    "solucion"         => $reporte['solucion_problema'],
                    "usuarioTecnico"   => $reporte['usuario_tecnico']

                );

                return $datos;
            }
            public function actualizarSolucion($datos){ //ESTO ES UN METODO
                $sql ="UPDATE
                            t_reportes
                        SET
                            id_usuario_tecnico = :idUsuario,
                            solucion_problema = :solucion,
                            estatus = :estatus,
                            usuario_tecnico = :usuarioTecnico
                        WHERE
                            id_reporte = :idReporte";

                $respuesta = Conexion::execute($sql,[
                    ":idUsuario"        => $datos['idUsuario'],
                    ":solucion"         => $datos['solucion'],
                    ":estatus"          => $datos['estatus'],
                    ":usuarioTecnico"   => $datos['usuarioTecnico'],
                    ":idReporte"        => $datos['idReporte']
                ]);
                return $respuesta;
            }
    }
?>