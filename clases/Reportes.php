<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Reportes extends Conexion{
        public function agregarReporteCliente($datos){
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_equipo,
                                            descripcion_problema)
                    VALUES (?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iis', $datos['idUsuario'], // estos datos traigo del POST "agregarNuevoReporte.php"
                                      $datos['idEquipo'],
                                      $datos['problema']);
            $respuesta = $query->execute();
            $query->close(); //funcion que se utiliza pasa cerrar la conexión con una base de datos anteriormente abierta, en este caso por ser una tabla secundaria
            return $respuesta;
        }
            public function eliminarReporteCliente($idReporte){
                $sql = "DELETE FROM t_reportes WHERE id_reporte = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('i', $idReporte);
                $respuesta = $query->execute();
                $query->close(); 
                return $respuesta;
            }
            public function obtenerSolucion($idReporte){
                $sql = "SELECT solucion_problema, estatus, usuario_tecnico
                 FROM t_reportes WHERE id_reporte ='$idReporte'";
                $respuesta = mysqli_query($conexion,$sql);
                $reporte =  mysqli_fetch_array($respuesta);

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
                            id_usuario_tecnico = ?,
                            solucion_problema = ?,
                            estatus = ?,
                            usuario_tecnico = ?
                        WHERE
                            id_reporte = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('isisi', $datos['idUsuario'], 
                                            $datos['solucion'], 
                                            $datos['estatus'],
                                            $datos['usuarioTecnico'],
                                            $datos['idReporte']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }
    }
?>