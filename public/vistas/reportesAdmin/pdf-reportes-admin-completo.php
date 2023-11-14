<?php
    session_start();

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    require_once "../../../clases/Reportes.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $contador = 1;//suma los reportes de auno
    $reporte = new Reportes();
    $where = null;
?>

<?php
    if(isset($_GET)){
        // Iterar sobre el array $_GET
        foreach ($_GET as $campo => $valor) {
            // Si el valor es vacío, eliminarlo del array
            if (empty($valor) && $valor !== '0') {
                unset($_GET[$campo]);
            }
        }

        if(count($_GET)){

            foreach ($_GET as $campo => $valor) {
                // Si el nombre del campo termina en _hasta, agregar un where con la condición between
                if (preg_match('/_hasta$/', $campo)) {
                    // Validar si existe la variable sin el _hasta
                    $campo_sin_hasta = str_replace('_hasta', '', $campo);
                    if (isset($_GET[$campo_sin_hasta])) {
                        $_GET[$campo_sin_hasta] = $_GET[$campo_sin_hasta] ? $_GET[$campo_sin_hasta] : $valor;
                        $where[] = "{$campo_sin_hasta} BETWEEN '{$_GET[$campo_sin_hasta]}' AND '{$valor}' ";
                    }
                } else {
                    if(!array_key_exists($campo.'_hasta', $_GET)){
                        // Crear un where con la key y el value
                        $key = strtotime($valor) ? "date($campo)" : $campo; 
                        $where[] = "{$campo} = '{$valor}'";
                    }
                }
            }
            
            // Convertir el array de wheres en una cadena
            $where = 'WHERE '.implode(' AND ', $where);
        }
        
    }

    $respuesta = $reporte->obtenerDatosReportes($where);
    $respuesta = $respuesta ? : [];
    $arrayResultado = [];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../../public/datatable/buttons.dataTables.min.css">
    <title>HelpDesk</title>
</head>

<body>
  
    <body>
        <div class="container">
            <div class="row">
            <a class="navbar-brand" href="inicio.php" style="
                min-height: 60px;
                min-width: 90px;
                background-image: url(http://helpdeskup.great-site.net/public/img/logoicono.ico);
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                margin-bottom: 50px;
            ">
            </a>
            </div>  
            
            <div id="contenedor-grid" class="d-block">
                <table class="table table-sm table-bordered dt-responsive nowrap" 
                    id="tablaReporteAdminDataTable" style="width:100%">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dispositivo</th>
                        <th>Fecha</th>
                        <th>Descripción Problema</th>
                        <th>Estatus</th>
                        <th>Técnico</th>
                        <th>Imagen de solución</th>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($respuesta as $mostrar){?>
                        <tr>
                            <th>
                                <?php echo $contador++; 

                                //Contadores
                                $clave = ($mostrar['estatus']) ?  'Abierto' : 'Cerrado';
                                if (!isset($arrayResultado['Estatus'][$clave])) {
                                    $arrayResultado['Estatus'][$clave] = ['total' => 0];
                                }
                                $arrayResultado['Estatus'][$clave]['total']++;

                                $clave = $mostrar['nombreOficina'];
                                if (!isset($arrayResultado['Oficina'][$clave])) {
                                    $arrayResultado['Oficina'][$clave] = ['total' => 0];
                                }
                                $arrayResultado['Oficina'][$clave]['total']++;

                                $clave = $mostrar['usuarioTecnico'];
                                if (!isset($arrayResultado['Técnico'][$clave])) {
                                    $arrayResultado['Técnico'][$clave] = ['total' => 0];
                                }
                                $arrayResultado['Técnico'][$clave]['total']++;

                                //var_dump($arrayResultado);
                                    
                                ?>
                                <!--El contador muestra un Número de reporte no así un ID -->
                            </th>
                            <th>
                                <?php echo $mostrar ['nombreOficina']; ?>
                            </th>
                            <th>
                                <?php echo $mostrar ['nombreEquipo']; ?>
                            </th>
                            <th>
                                <?php echo $mostrar ['fecha']; ?>
                            </th>
                            <th>
                                <?php echo $mostrar ['problema']; ?>
                            </th>
                        
                            <th>
                                <?php 
                                    $estatus = $mostrar['estatus'];
                                    $cadenaEstatus ='<span class="badge bg-danger">Abierto</span>';
                                    if ($estatus == 0){
                                        $cadenaEstatus ='<span class="badge bg-success">Cerrado</span>';
                                    }
                                    echo $cadenaEstatus;
                                ?>
                            </th>
                            <th>
                                <?php echo $mostrar ['usuarioTecnico']; ?>
                            </th>
                            <th>
                                <?php if($mostrar ['imagen_solucion']){ ?>
                                <div style="max-height: 200px;">
                                <img class="img-fluid" style="max-height: 200px;" src="<?php echo $mostrar ['imagen_solucion']; ?>">
                                </div>

                                <?php } ?>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="contenedor-totales">
                    <h2>Totales</h2>
                    <hr>
                    <div id="contenedor-table-totales">
                        <?php
                        echo '<table id="table-totales" class="table table-sm table-bordered dt-responsive nowrap">';
                        foreach ($arrayResultado as $clave => $valor) {
                        echo '<thead>
                                    <tr>';
                        echo '        <th>' . $clave . '</th>';
                        echo '    </tr>
                                </thead>
                                <tbody>';
                        foreach ($valor as $claveR => $registro) {
                            echo '<tr class="py-0">      
                                    <td class="pr-2 py-0">'. ($claveR ? : '(Vacío)') .'</td>
                                    <td class="px-2 py-0">'. $registro['total'] . '</td> 
                                </tr>';
                        }

                        }
                        echo '</tbody></table>';
                        ?>
                    </div>
                
                </div>
            </div>
        </div>
    </body>
    <script>
        window.print();
    </script>
</html>

