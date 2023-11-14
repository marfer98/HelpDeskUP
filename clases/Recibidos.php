<?php 
    if(!isset($_SESSION)){
        session_start();
    }


    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);


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
                        ':id_equipo'            => $datos['id_equipo'],
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

        public function eliminarRecibido($id_recepcion,$getId=false){
            $sql = "DELETE FROM t_recepcion WHERE id_recepcion = :id_recepcion";
            
            $datos = [
                ':id_recepcion' => $id_recepcion
            ];

            $datosRecibido = self::obtenerDatosRecepcion("WHERE id_recepcion = $id_recepcion");
            
            if($datosRecibido){
                $datosRecibido = $datosRecibido[0];
                $datosRecibido['id_recepcion'] = $id_recepcion;
                self::agregarNuevaRecepcionAuditoria($datosRecibido,'delete');
            }

            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }

        public function obtenerDatosRecepcion($id_recepcion){
            $sql = "SELECT descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion
                    WHERE  id_recepcion = :id_recepcion";
            $respuesta = Conexion::select($sql,[
                ':id_recepcion' => $id_recepcion
            ]);

            var_dump($sql);
            var_dump($id_recepcion);

            $recepcion = $respuesta[0];

            $datos = array(
                "id_recepcion"         => $id_recepcion,
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
                        id_recepcion = :id_recepcion";
            $datos = [
                        ':descripcionSolucion'  => $datos['descripcionSolucion'],
                        ':fechaEntrega'         => $datos['fechaEntrega'],
                        ':estado'               => $datos['estado'],
                        ':tecnico'              => $datos['tecnico'],
                        ':informeTecnico'       => $datos['informeTecnico'],
                        ':id_recepcion'          => $datos['id_recepcion']
                    ];
            
            $datosRecibidoResult = self::obtenerDatosRecepcion($datosRecibido['id_recepcion']);
            
            if($datosRecibido){
                $datosRecibido = $datosRecibido[0];
                $datosRecibido['id_recepcion'] = $id_recepcion;
                $datosRecibido = array_merge($datosRecibidoResult, $datosRecibido, function ($a, $b) {
                    return $b;
                });
                self::agregarNuevaRecepcionAuditoria($datosRecibido,'delete');
            }

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
                        ':id_recepcion'         => $datos['id_recepcion'], 
                        ':id_equipo'            => $datos['id_equipo'],
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

        public function obtenerDatosRecepcionAuditoria($id_recepcion){
            $sql = "SELECT id_recepcion, descripcion_solucion, estatus, fecha_entrega, nombre_tecnico, informe_tecnico
                    FROM   t_recepcion_auditoria
                    WHERE  id_recepcion = :id_recepcion";

            $respuesta = Conexion::select($sql,[
                ':id_recepcion' => $id_recepcion
            ]);

            $recepcion = $respuesta[0];

            $datos = array(
                "id_recepcion"         => $id_recepcion,
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