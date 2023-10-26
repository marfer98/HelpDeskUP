<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Articulos{
        public static function obtenerDatosArticulos($where=null){
            $sql = '
                /*v_articulos*/
                SELECT DISTINCT * FROM (
                    SELECT 
                        a.id_articulo,
                        a.id_equipo,
                        e.nombre as nombre_equipo,
                        a.id_proveedor,
                        p.nombre as nombre_proveedor,
                        a.nombreEquipoA,
                        a.rotulado,
                        a.marca,
                        a.modelo,
                        a.numeroSerie,
                        a.descripcion,
                        a.memoria,
                        a.tipo_ram,
                        a.disco_duro,
                        a.procesador,
                        a.sistema_operativo
                    FROM t_articulos a
                    JOIN t_cat_equipos e ON a.id_equipo = e.id_equipo
                    JOIN t_proveedores p ON a.id_proveedor = p.id_proveedor
                ) v_articulos
                '.$where;
            return Conexion::select($sql); 
        }
      
        public static function agregarArticulos($datos,$getId = false){
            $sql = '
            INSERT INTO t_articulos (
                id_equipo, 
                id_proveedor, 
                nombreEquipoA, 
                rotulado, 
                marca, 
                modelo, 
                numeroSerie, 
                descripcion, 
                memoria, 
                tipo_ram, 
                disco_duro, 
                procesador, 
                sistema_operativo
            ) VALUES (
                :id_equipo, 
                :id_proveedor, 
                :nombreEquipoA, 
                :rotulado, 
                :marca, 
                :modelo, 
                :numeroSerie, 
                :descripcion, 
                :memoria, 
                :tipo_ram, 
                :disco_duro, 
                :procesador, 
                :sistema_operativo
            )';
            $datos = [
                ':id_equipo' => $datos['id_equipo'],
                ':id_proveedor' => $datos['id_proveedor'],
                ':nombreEquipoA' => $datos['nombreEquipoA'],
                ':rotulado' => $datos['rotulado'],
                ':marca' => $datos['marca'],
                ':modelo' => $datos['modelo'],
                ':numeroSerie' => $datos['numeroSerie'],
                ':descripcion' => $datos['descripcion'],
                ':memoria' => $datos['memoria'],
                ':tipo_ram' => $datos['tipo_ram'],
                ':disco_duro' => $datos['disco_duro'],
                ':procesador' => $datos['procesador'],
                ':sistema_operativo' => $datos['sistema_operativo']
            ];
            return !$getId ? Conexion::execute($sql,$datos) : Conexion::execute_id($sql,$datos);
        }
      
        public static function actualizarArticulos($datos){
            $sql = '
            UPDATE t_articulos 
            SET 
                id_equipo = :id_equipo,
                id_proveedor = :id_proveedor,
                nombreEquipoA = :nombreEquipoA,
                rotulado = :rotulado,
                marca = :marca,
                modelo = :modelo,
                numeroSerie = :numeroSerie,
                descripcion = :descripcion,
                memoria = :memoria,
                tipo_ram = :tipo_ram,
                disco_duro = :disco_duro,
                procesador = :procesador,
                sistema_operativo = :sistema_operativo 
            WHERE id_articulo = :id_articulo';
            $datos = [
                ':id_equipo' => $datos['id_equipo'],
                ':id_proveedor' => $datos['id_proveedor'],
                ':nombreEquipoA' => $datos['nombreEquipoA'],
                ':rotulado' => $datos['rotulado'],
                ':marca' => $datos['marca'],
                ':modelo' => $datos['modelo'],
                ':numeroSerie' => $datos['numeroSerie'],
                ':descripcion' => $datos['descripcion'],
                ':memoria' => $datos['memoria'],
                ':tipo_ram' => $datos['tipo_ram'],
                ':disco_duro' => $datos['disco_duro'],
                ':procesador' => $datos['procesador'],
                ':sistema_operativo' => $datos['sistema_operativo'],
                ':id_articulo' => $datos['id_articulo']
            ];
            return Conexion::execute($sql,$datos);
        }
      
        public static function eliminarArticulos($id){
            $sql = '
            DELETE FROM t_articulos
            WHERE id_articulo = :id_articulo';
            $datos = [
                ':id_articulo' => $id
            ];
            return Conexion::execute($sql,$datos);
        }

        public static function obtenerDatosArticulosParaSelect($where = null){
            $sql = "SELECT DISTINCT a.id_articulo, CONCAT_WS('',
                        CASE
                            WHEN nombre IS NOT NULL THEN CONCAT(nombre,' - ')
                            ELSE ''
                        END,
                        CASE
                            WHEN nombreEquipoA IS NOT NULL THEN CONCAT(nombreEquipoA,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN rotulado IS NOT NULL THEN CONCAT(rotulado,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN marca IS NOT NULL THEN CONCAT(marca,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN modelo IS NOT NULL THEN CONCAT(modelo,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN numeroSerie IS NOT NULL THEN CONCAT(numeroSerie,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN memoria IS NOT NULL THEN CONCAT(memoria,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN tipo_ram IS NOT NULL THEN CONCAT(tipo_ram,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN disco_duro IS NOT NULL THEN CONCAT(disco_duro,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN procesador IS NOT NULL THEN CONCAT(procesador,' ')
                            ELSE ''
                        END,
                        CASE
                            WHEN sistema_operativo IS NOT NULL THEN CONCAT(sistema_operativo,' ')
                            ELSE ''
                        END
                    ) AS nombre
                    FROM t_articulos a
                    JOIN t_cat_equipos e ON e.id_equipo = a.id_equipo
                    LEFT JOIN t_adquisiciones ad ON a.id_articulo = ad.id_articulo
                    LEFT JOIN t_asignacion asg ON a.id_articulo = asg.id_articulo
                    $where
                    ORDER BY nombre";

            return Conexion::select($sql);
        }
    }
?>