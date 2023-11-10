<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Recibidos{
        public function agregarNuevaRecepcion($datos){
            $sql = "INSERT INTO t_recepcion (   
                        id_equipo,
                        nombre_equipo,
                        rotulado,
                        numero_serie,
                        ciudad,
                        procedencia,
                        descripcion_problema,
                        recibido,
                        responsable,
                        estatus)
                    VALUES (
                        :id_equipo,
                        :nombre_equipo,
                        :rotulado,
                        :numero_serie,
                        :ciudad,
                        :procedencia,
                        :descripcion_problema,
                        :recibido,
                        :responsable,
                        :estatus
                    )";
            $respuesta = Conexion::execute($sql, [
                                        ':id_equipo'            => $datos['idEquipo'],
                                        ':nombre_equipo'        => $datos['nombreEquipo'],
                                        ':rotulado'             => $datos['rotulado'],
                                        ':numero_serie'         => $datos['numeroSerie'],
                                        ':ciudad'               => $datos['ciudad'],
                                        ':procedencia'          => $datos['procedencia'],
                                        ':descripcion_problema' => $datos['problema'],
                                        ':recibido'             => $datos['recibido'],
                                        ':responsable'          => $datos['responsable'],
                                        ':estatus'              => $datos['estado']
                                    ]);
            return $respuesta;

        } 

        public function eliminarRecibido($idRecepcion){
            $sql = "DELETE FROM t_recepcion WHERE id_recepcion = :idRecepcion";
            $respuesta = Conexion::execute($sql,[
                ':idRecepcion' => $idRecepcion
            ]);
            return $respuesta;
        }

        public function obtenerDatosRecepcion($idRecepcion){
            $sql = "SELECT descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion
                    WHERE  id_recepcion = :idRecepcion";
            $respuesta = Conexion::select($sql,[
                ':idRecepcion' => $idRecepcion
            ]);

            $recepcion = $respuesta[0];

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
            $sql ="UPDATE t_recepcion
                   SET  
                        descripcion_solucion    = :descripcionSolucion,
                        fecha_entrega           = :fechaEntrega,
                        estatus                 = :estado,
                        nombre_tecnico          = :tecnico,
                        informe_tecnico         = :informeTecnico
                    WHERE
                        id_recepcion = :idRecepcion";
           $respuesta = Conexion::execute($sql,[
                                        ':descripcionSolucion'  => $datos['descripcionSolucion'],
                                        ':fechaEntrega'         => $datos['fechaEntrega'],
                                        ':estado'               => $datos['estado'],
                                        ':tecnico'              => $datos['tecnico'],
                                        ':informeTecnico'       => $datos['informeTecnico'],
                                        ':idRecepcion'          => $datos['idRecepcion']
                                    ]);
            return $respuesta;
        }

        public function agregarNuevaRecepcionAuditoria($datos){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "INSERT INTO t_recepcion (   
                        id_equipo,
                        nombre_equipo,
                        rotulado,
                        numero_serie,
                        ciudad,
                        procedencia,
                        descripcion_problema,
                        recibido,
                        responsable,
                        estatus)
                    VALUES (
                        :id_equipo,
                        :nombre_equipo,
                        :rotulado,
                        :numero_serie,
                        :ciudad,
                        :procedencia,
                        :descripcion_problema,
                        :recibido,
                        :responsable,
                        :estatus
                    )";
            $respuesta = Conexion::execute($sql, [
                                        ':id_equipo'            => $datos['idEquipo'],
                                        ':nombre_equipo'        => $datos['nombreEquipo'],
                                        ':rotulado'             => $datos['rotulado'],
                                        ':numero_serie'         => $datos['numeroSerie'],
                                        ':ciudad'               => $datos['ciudad'],
                                        ':procedencia'          => $datos['procedencia'],
                                        ':descripcion_problema' => $datos['problema'],
                                        ':recibido'             => $datos['recibido'],
                                        ':responsable'          => $datos['responsable'],
                                        ':estatus'              => $datos['estado']
                                    ]);
            return $respuesta;

        } 

        public function obtenerDatosRecepcionAuditoria($idRecepcion){
            $conexion = Conexion::conectar(); //traemos la conexion
            $sql = "SELECT descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion
                    WHERE  id_recepcion = :idRecepcion";
            $respuesta = Conexion::select($sql,[
                ':idRecepcion' => $idRecepcion
            ]);

            $recepcion = $respuesta[0];

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
}
?>