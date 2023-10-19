<?php //conexion de la base de datos 
// ezyro


class Conexion {
    public static function conectar(){
        $host   = "sql110.ezyro.com"; 
        $bbdd   = "ezyro_35208593_helpdesk"; 
        $user   = "ezyro_35208593";
        $pass   = '7ae22595a4b9';
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
            echo('<p>Hubo un error: '.$sql.': '.implode(',',$parametros).'</p>');
            print_r([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args'][0],
                'params' => $exception->getTrace()[0]['args'][1],
            ]);
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
            print_r([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args'][0],
                'params' => $exception->getTrace()[0]['args'][1],
            ]);
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
            print_r([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args'][0],
                'params' => $exception->getTrace()[0]['args'][1],
            ]);
            return false;
        }
    }

}
