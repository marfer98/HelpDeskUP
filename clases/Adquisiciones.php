<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    require_once "Conexion.php";
    require_once "Articulos.php";

    class Adquisiciones extends Articulos{
        public static function obtenerDatosAdquisiciones($where=null){
            $sql = '
            SELECT DISTINCT * FROM (
                SELECT 
                    ad.id_adquisicion,
                    ad.id_articulo,
                    a.nombreEquipoA,
                    a.id_equipo,
                    e.nombre as nombre_equipo,
                    a.rotulado,
                    a.marca,
                    a.modelo,
                    a.numeroSerie,
                    a.descripcion,
                    a.memoria,
                    a.tipo_ram,
                    a.disco_duro,
                    a.procesador,
                    a.sistema_operativo,
                    ad.id_proveedor,
                    p.nombre as nombre_proveedor,
                    ad.cantidad
                FROM t_adquisiciones ad
                    JOIN t_articulos a ON a.id_articulo = ad.id_articulo
                    JOIN t_cat_equipos e ON a.id_equipo = e.id_equipo
                    JOIN t_proveedores p ON ad.id_proveedor = p.id_proveedor
            )tmp
            '.$where;
            return Conexion::select($sql); 
        }
      
        public static function agregarAdquisiciones($datos){
            $adquisicion = self::obtenerDatosAdquisiciones('
                WHERE 
                    id_articulo = '.$datos['id_articulo'].' AND
                    id_proveedor = '.$datos['id_proveedor'].' 
            ');

            if(!$adquisicion){
                $articulo = self::agregarArticulos($datos);

                $sql = '
                    INSERT INTO t_adquisiciones (
                        id_articulo, 
                        id_proveedor, 
                        cantidad
                    ) VALUES (
                        :id_articulo, 
                        :id_proveedor, 
                        :cantidad
                    )';
                $datos = [
                    ':id_articulo' => $datos['id_articulo'],
                    ':id_proveedor' => $datos['id_proveedor'],
                    ':cantidad' => $datos['cantidad']
                ];
                $respuesta = Conexion::execute($sql,$datos);
            }else{
                $respuesta = 'Esta adquisición ya se ha realizado.';
            }
            
            return $respuesta;
        }
      
        public static function actualizarAdquisiciones($datos){
            self::actualizarArticulos($datos);
            $sql = '
                UPDATE t_adquisiciones 
                SET 
                    id_articulo = :id_articulo,
                    id_proveedor = :id_proveedor,
                    cantidad = :cantidad 
                WHERE id_adquisicion = :id_adquisicion';
            $datos = [
                ':id_articulo' => $datos['id_articulo'],
                ':id_proveedor' => $datos['id_proveedor'],
                ':cantidad' => $datos['cantidad'],
                ':id_adquisicion' => $datos['id_adquisicion']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public static function eliminarAdquisiciones($id){
            $sql = '
            DELETE FROM t_adquisiciones
            WHERE id_adquisicion = :id_adquisicion';
            $datos = [
                ':id_adquisicion' => $id['id_adquisicion']
            ];
            return Conexion::execute($sql,$datos);
        }
    }

?>
