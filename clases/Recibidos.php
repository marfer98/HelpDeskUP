<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Recibidos{
        public function agregarNuevaRecepcion($datos,$getId=false){
            $datosRecepcion = $datos;
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
            $datos = [
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
                    ];
            
            $id = Conexion::execute_id($sql,$datos);
            $datosRecepcion['id_recepcion'] = $id;

            self::agregarNuevaRecepcionAuditoria($datosRecepcion,'insert');

            return !$getId ? !!$id : $id;

        } 

        public function eliminarRecibido($idRecepcion,$getId=false){
            $sql = "DELETE FROM t_recepcion WHERE id_recepcion = :idRecepcion";
            
            $datos = [
                ':idRecepcion' => $idRecepcion
            ];

            $datosRecibido = self::obtenerDatosRecepcion("WHERE id_recepcion = $idRecepcion");
            
            if($datosRecibido){
                $datosRecibido = $datosRecibido[0];
                $datosRecibido['id_recepcion'] = $idRecepcion;
                self::agregarNuevaRecepcionAuditoria($datosRecibido,'delete');
            }

            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
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

        public function actualizarRecepcion($datos,$getId=false){
            $datosRecibido = $datos;

            $sql ="UPDATE t_recepcion
                   SET  
                        descripcion_solucion    = :descripcionSolucion,
                        fecha_entrega           = :fechaEntrega,
                        estatus                 = :estado,
                        nombre_tecnico          = :tecnico,
                        informe_tecnico         = :informeTecnico
                    WHERE
                        id_recepcion = :idRecepcion";
            $datos = [
                        ':descripcionSolucion'  => $datos['descripcionSolucion'],
                        ':fechaEntrega'         => $datos['fechaEntrega'],
                        ':estado'               => $datos['estado'],
                        ':tecnico'              => $datos['tecnico'],
                        ':informeTecnico'       => $datos['informeTecnico'],
                        ':idRecepcion'          => $datos['idRecepcion']
                    ];
            $datosRecibido['id_recepcion'] = $datosRecibido['idRecepcion'];
            unset($datosRecibido['idRecepcion']);

            self::auditoriaRecibidos($datosRecibido,'update');

            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }

        public function agregarNuevaRecepcionAuditoria($datos,$tipoOperacion,$getId=false){
            $datosRecibido = $datos;
            $sql = "INSERT INTO t_recepcion_auditoria (  
                        id_recepcion, 
                        id_equipo,
                        nombre_equipo,
                        rotulado,
                        numero_serie,
                        ciudad,
                        procedencia,
                        descripcion_problema,
                        recibido,
                        responsable,
                        estatus,
                        id_usuario,
                        tipo_operacion)
                    VALUES (
                        :id_recepcion, 
                        :id_equipo,
                        :nombre_equipo,
                        :rotulado,
                        :numero_serie,
                        :ciudad,
                        :procedencia,
                        :descripcion_problema,
                        :recibido,
                        :responsable,
                        :estatus,
                        :id_usuario,
                        :tipo_operacion
                    )";
            $datos = [
                        ':id_recepcion'         => $datos['idRecepcion'], 
                        ':id_equipo'            => $datos['idEquipo'],
                        ':nombre_equipo'        => $datos['nombreEquipo'],
                        ':rotulado'             => $datos['rotulado'],
                        ':numero_serie'         => $datos['numeroSerie'],
                        ':ciudad'               => $datos['ciudad'],
                        ':procedencia'          => $datos['procedencia'],
                        ':descripcion_problema' => $datos['problema'],
                        ':recibido'             => $datos['recibido'],
                        ':responsable'          => $datos['responsable'],
                        ':estatus'              => $datos['estado'],
                        ':id_usuario'           => $_SESSION['usuario']['id'],
                        ':tipo_operacion'       => $tipoOperacion,
                    ];

            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);

        } 

        public function obtenerDatosRecepcionAuditoria($idRecepcion){
            $sql = "SELECT id_recepcion, descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion_auditoria
                    WHERE  id_recepcion = :idRecepcion";

            $respuesta = Conexion::select($sql,[
                ':idRecepcion' => $idRecepcion
            ]);

            $recepcion = $respuesta[0];

            $datos = array(
                "idRecepcion"         => $idRecepcion,
                "solucion"            => $recepcion['descripcion_solucion'],
                "fechaEntrega"        => $recepcion['fecha_entrega'],
                "estado"              => $recepcion['estatus'],
                "tecnico"             => $recepcion['nombre_tecnico'],
                "informeTecnico"      => $recepcion['informe_tecnico'],
                
            );
            return $datos;
        } 
}
?>