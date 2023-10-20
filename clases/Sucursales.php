<?php 
    require_once "Conexion.php"; //se incluye la conexion a la bd
    class Sucursales {
      public static function obtenerDatosSucursales($where=null){
          $sql = '
          SELECT 
            id_sucursal,
            descripcion,
            direccion
          FROM t_sucursales
          '.$where;
          return Conexion::select($sql); 
      }
  
      public static function agregarSucursales($datos){
          $sql = '
          INSERT INTO t_sucursales (
              descripcion, 
              direccion
          ) VALUES (
              :descripcion, 
              :direccion
          )';
          $datos = [
              ':descripcion' => $datos['descripcion'],
              ':direccion' => $datos['direccion']
          ];
          return Conexion::execute($sql,$datos);
      }
  
      public static function actualizarSucursales($datos){
          $sql = '
          UPDATE t_sucursales 
          SET 
            descripcion = :descripcion,
            direccion = :direccion 
          WHERE id_sucursal = :id_sucursal';
          $datos = [
            ':descripcion' => $datos['descripcion'],
            ':direccion' => $datos['direccion'],
            ':id_sucursal' => $datos['id_sucursal']
          ];
          return Conexion::execute($sql,$datos);
      }
  
      public static function eliminarSucursales($id){
          $sql = '
          DELETE FROM sucursales
          WHERE id_sucursal = :id_sucursal';
          $datos = [
            ':id_sucursal' => $id['id_sucursal']
          ];
          return Conexion::execute($sql,$datos);
      }
        
    }
?>