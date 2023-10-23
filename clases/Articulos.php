<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Articulos{
        public static function obtenerDatosArticulos($where=null){
            $sql = '
                SELECT 
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
                FROM t_articulos
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
    }
?>