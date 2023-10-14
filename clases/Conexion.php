<?php //conexion de la base de datos 
    class Conexion {
        public function conectar(){
            $servidor = "localhost";
            $usuario  = "root";
            $password = "";
            $bd       = "helpdesk";
            $conexion = mysqli_connect ($servidor,$usuario,$password,$bd);
            return $conexion;
        }

        function sc_sql_conexion($host, $bbdd, $user, $pass, $puerto = '3306', $opcionesPDO = [], $driver='mysql'){
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

        }

        function sc_sql_select($conexion, $sql, $parametros = [], $tipoPDOFech = PDO::FETCH_ASSOC, $depurar = false){
            $query = $conexion->prepare($sql);

            try {
                $sqlResult = $query->execute($parametros);

                if ($sqlResult) {
                    $sqlResult = $query->fetchAll($tipoPDOFech);
                    $sqlResult = count($sqlResult) > 0 ? $sqlResult : false;

                }else{
                    $sqlResult = false;
                }

                if ($depurar){
                    sc_echo('Debug de sc_sql_secure_lookup (4):');
                    sc_var_dump($sql);
                    sc_var_dump($parametros);
                    sc_var_dump($tipoPDOFech);
                    sc_var_dump($sqlResult);
                }

                return $sqlResult;

            } catch (Exception $e) {
                sc_var_dump('Hubo un error: ');
                sc_var_dump($e);
                return false;
            }
        }

        function sc_sql_execute($conexion, $sql, $parametros = null, $depurar = false){
            $query = $conexion->prepare($sql);

            try {
                $execResult = $query->execute($parametros);

                if ($depurar){
                    sc_echo('Debug de sc_sql_secure_lookup (4):');
                    sc_var_dump($sql);
                    sc_var_dump($parametros);
                    sc_var_dump($execResult);
                }

                return !!( $execResult );

            } catch (Exception $e) {
                sc_var_dump('Hubo un error: ');
                sc_var_dump($e);
                return false;
            }

        }

//Falta corregir
    function sc_sql_lookup($sql){
        global $pdoLibreria;
        $query = $pdoLibreria->prepare($sql);

        try {
            $sqlResult = $query->execute(array());

            if ($sqlResult) {
                $sqlResult = $query->fetchAll(PDO::FETCH_ASSOC);
                return $sqlResult;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return '<p class="alert-danger">No funcionó</p>';
        }
    }

    function sc_sql_secure_lookup($sql,$array=null,$depurar=false){
        global $pdoLibreria;
        $query     = $pdoLibreria->prepare($sql);
        $sqlResult = false;

        try {
            $sqlResult = $query->execute($array);

            if ($sqlResult) {
                $sqlResult = $query->fetchAll(PDO::FETCH_ASSOC);
                $query = null;

                if ($depurar){
                    sc_echo('Debug de sc_sql_secure_lookup (3):');
                    sc_var_dump($sql);
                    sc_var_dump($array);
                    sc_var_dump($sqlResult);
                }

                if (count($sqlResult)==0){
                    foreach ($array as &$valor){
                        $valor = htmlentities($valor);
                    }
                }

                return count($sqlResult) != 0 ? $sqlResult:false;
            }else{
                return $datos[0][0] = false;
            }
        } catch (Exception $e) {
            sc_var_dump('Hubo un error: ');
            sc_var_dump($e);
            return false;
        }
    }

    function sc_sql_exec_sql($sql,$array=null){
        global $pdoLibreria;
        $query = $pdoLibreria->prepare($sql);

        foreach ( $array as &$valor){
            $valor = (is_string($valor)) ? nl2br( htmlentities($valor) ) : $valor;
        }

        try {
            return $query->execute($array);
        } catch (Exception $exception) {
            echo $exception;
            return false;
        }
    }


}