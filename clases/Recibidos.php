<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Recibidos extends Conexion{

        public function agregarNuevaRecepcion($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "INSERT INTO t_recepcion (   id_equipo,
                                                nombre_equipo,
                                                rotulado,
                                                numero_serie,
                                                ciudad,
                                                procedencia,
                                                descripcion_problema,
                                                recibido,
                                                responsable,
                                                estatus)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("isssssssss",
                                        //los datos traigo de agregarNuevaRecepcion.php 
                                        $datos['idEquipo'],
                                        $datos['nombreEquipo'],
                                        $datos['rotulado'],
                                        $datos['numeroSerie'],
                                        $datos['ciudad'],
                                        $datos['procedencia'],
                                        $datos['problema'],
                                        $datos['recibido'],
                                        $datos['responsable'],
                                        $datos['estado']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;

        } 
        public function eliminarRecibido($idRecepcion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "DELETE FROM t_recepcion WHERE id_recepcion = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idRecepcion);
            $respuesta = $query->execute();
            $query->close(); 
            return $respuesta;
        }
        public function obtenerDatosRecepcion($idRecepcion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "SELECT descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion
                    WHERE  id_recepcion ='$idRecepcion'";
            $respuesta = mysqli_query($conexion,$sql);
            $recepcion =  mysqli_fetch_array($respuesta);

            $datos = array(
                "idRecepcion"         => $idRecepcion,
                "solucion"            => $recepcion['descripcion_solucion'],
                "fechaEntrega"        => $recepcion['fecha_entrega'], // $recepcion['fecha_entrega'] agarra como esta en la base de datos 
                "estado"              => $recepcion['estatus'],
                "tecnico"             => $recepcion['nombre_tecnico'],
                "informeTecnico"      => $recepcion['informe_tecnico'],
                
            );
            return $datos;
        } 
        public function actualizarRecepcion($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql ="UPDATE t_recepcion
                   SET  
                        descripcion_solucion = ?,
                        fecha_entrega = ?,
                        estatus = ?,
                        nombre_tecnico = ?,
                        informe_tecnico =?
                    WHERE
                        id_recepcion = ?";
            $query = $conexion->prepare($sql);
                                       
            $query->bind_param('ssissi', $datos['descripcionSolucion'],
                                        $datos['fechaEntrega'],
                                        $datos['estado'],
                                        $datos['tecnico'],
                                        $datos['informeTecnico'],
                                        $datos['idRecepcion']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

}
?>