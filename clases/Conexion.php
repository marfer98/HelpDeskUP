<?php //conexion de la base de datos 
class Conexion {
    public static function conectar(){
        $host   = "localhost"; 
        $bbdd   = "helpdesk"; 
        $user   = "root";
        $pass   = '';
        $puerto = '3306', 
        $opcionesPDO = [];
        $driver = 'mysql';

        try {
            $dsn = "$driver:host=$host;dbname=$bbdd;port=$puerto";
            $dbh = new PDO($dsn, $user, $pass, $opcionesPDO);
            
            $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_SILENT);
            $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_WARNING);
            $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $dbh;
    
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $conexion;
    }
    
    public static function select($sql, $parametros = [], $tipoPDOFech = PDO::FETCH_ASSOC){
        $conexion = $this->conectar;
        $query = $conexion->prepare($sql);
       
        try {
            $sqlResult = $query->execute($parametros);
    
            if ($sqlResult) {
                $sqlResult = $query->fetchAll($tipoPDOFech);
                $sqlResult = count($sqlResult) > 0 ? $sqlResult : false;
    
            }else{
                $sqlResult = false;
            }
    
            if (DEPURAR){
                ScPHP::dev_echo('Debug de sql_secure_lookup:');
                ScPHP::dev_var_dump($sql);
                ScPHP::dev_var_dump($parametros);
                ScPHP::dev_var_dump($tipoPDOFech);
                ScPHP::dev_var_dump($sqlResult);
            }
    
            return $sqlResult;
    
        } catch (Exception $e) {
            ScPHP::dev_var_dump('Hubo un error: ');
            ScPHP::dev_var_dump($e);
            return false;
        }
    }

    public static function execute($sql, $parametros = null){
        $conexion = $this->conectar;
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

}