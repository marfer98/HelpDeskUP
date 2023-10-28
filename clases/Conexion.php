<?php //conexion de la base de datos 

class Conexion {
    public static function conectar(){
        $host   = "localhost";
        $bbdd   = "if0_35201982_helpdesk";
        $user   = "root";
        $pass   = '';
        $puerto = '3306';
        $opcionesPDO = [];
        $driver = 'mysql';
        $dbh    = false;

        try {
            $dsn = "$driver:host=$host;dbname=$bbdd;port=$puerto";
            $dbh = new PDO($dsn, $user, $pass, $opcionesPDO);

            if(!$dbh){
                $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_SILENT);
                $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_WARNING);
                $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $dbh;
            }
    
        } catch (PDOException $e){
            echo $e->getMessage();
            die();
        }

        return $dbh;
    }
    
    public static function select($sql, $parametros = [], $tipoPDOFech = PDO::FETCH_ASSOC){
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);
       
        try {
            $sqlResult = $query->execute($parametros);
    
            if ($sqlResult) {
                $sqlResult = $query->fetchAll($tipoPDOFech);
                $sqlResult = count($sqlResult) > 0 ? $sqlResult : false;
    
            }else{
                $sqlResult = false;
            }
    
            return $sqlResult;
    
        } catch (Exception $e) {
            var_dump('Hubo un error: ');
            var_dump($e);
            return false;
        }
    }

    public static function execute($sql, $parametros = null){
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);
    
        try {
            $execResult = $query->execute($parametros);
        
            return !!( $execResult );
    
        } catch (Exception $e) {
            echo('Hubo un error: ');
            var_dump($e);
            return false;
        }
    
    }


    public static function execute_id($sql, $parametros = [], $tipoPDOFech = PDO::FETCH_ASSOC){
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);
    
        try {
            $execResult = $query->execute($parametros);
        
            return $execResult ? $conexion->lastInsertId() : false;
    
        } catch (Exception $e) {
            echo('Hubo un error: ');
            var_dump($e);
            return false;
        }
    }

}