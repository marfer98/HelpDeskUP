<?php //conexion de la base de datos 
// ezyro


class Conexion {
    public static function conectar(){
        $host   = "sql211.infinityfree.com";
        $bbdd   = "if0_35387711_helpdesk";
        $user   = "if0_35387711";
        $pass   = 'hrKn5rlTg4E';
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
            
            //$dbh->setAttribute();

        } catch (PDOException $exception){
            echo $exception->getMessage();
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

        } catch (Exception $exception) {
            echo('<p>Hubo un error: '.$sql.': '.implode(',',$parametros).'</p>');
            print_r([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args'],
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

        } catch (Exception $exception) {
            $errores = ([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args']
            ]);

            //var_dump(strpos($errores['error'], 'Duplicate entry') !== false);

            if(strpos($errores['error'], 'Duplicate entry') !== false){
                echo(' Datos ya se han cargado previamente');
            }else{
                echo('<p>Hubo un error: '.$sql.': '.implode(',',$parametros).'</p>');
                print_r($errores['error']);
            }
            return false;
        }

    }


    public static function execute_id($sql, $parametros = [], $tipoPDOFech = PDO::FETCH_ASSOC){
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);

        try {
            $execResult = $query->execute($parametros);

            return $execResult ? $conexion->lastInsertId() : false;

        } catch (Exception $exception) {
            $errores = ([
                'error' => $exception->getMessage(),
                'query' => $exception->getTrace()[0]['args']
            ]);

            //var_dump(strpos($errores['error'], 'Duplicate entry') !== false);

            if(strpos($errores['error'], 'Duplicate entry') !== false){
                echo(' Datos ya se han cargado previamente');
            }else{
                echo('<p>Hubo un error: '.$sql.': '.implode(',',$parametros).'</p>');
                print_r();
            }
            return false;
        }
    }

}


