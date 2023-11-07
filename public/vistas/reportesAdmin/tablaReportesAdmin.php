<?php
    session_start();
    require_once "../../../clases/Reportes.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $contador = 1;//suma los reportes de auno
    $idUsuario = $_SESSION['usuario']['id'];//pasa el id usuario que inicio sesion
    $reporte = new Reportes();
    $where = null;
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if(isset($_POST['filtro'])){
        // Iterar sobre el array $_POST
        foreach ($_POST as $campo => $valor) {
            unset($_POST['filtro']);
            // Si el valor es vacío, eliminarlo del array
            if (empty($valor)) {
                unset($_POST[$campo]);
            }
        }

        if(count($_POST)){
            foreach ($_POST as $campo => $valor) {
                // Si el nombre del campo termina en _hasta, agregar un where con la condición between
                if (preg_match('/_hasta$/', $campo)) {
                    // Validar si existe la variable sin el _hasta
                    $campo_sin_hasta = str_replace('_hasta', '', $campo);
                    if (isset($_POST[$campo_sin_hasta])) {
                        $_POST[$campo_sin_hasta] = $_POST[$campo_sin_hasta] ? $_POST[$campo_sin_hasta] : $valor;
                        $where[] = "{$campo_sin_hasta} BETWEEN '{$_POST[$campo_sin_hasta]}' AND '{$valor}' ";
                    }
                } else {
                    if(!array_key_exists($campo.'_hasta', $_POST)){
                        // Crear un where con la key y el value
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

<div id="contenedor-form" class="d-none">
    <form id="frmFiltrarSolucionReporte"  method="POST" onsubmit="return obtenerSoluciones()" enctype="multipart/form-data">
        <div class="" id="modalFiltrarSolucionReporte">
            <div class="modal-dialog-" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Filtrar Reportes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="filtro" name="filtro" value="true">
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <select name="estatus" id="estatus" class ="form-control">
                                <option value="">Todos</option>
                                <option value="1">Abierto</option>
                                <option value="0">Cerrado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usuario_tecnico">Técnico</label>
                            <select name="usuario_tecnico" id="usuario_tecnico" class="form-control">
                                <option value="">Todos</option>
                                <option value="Elsidia Caballero">Elsidia Caballero</option>
                                <option value="Gaspar Sosa">Gaspar Sosa</option>
                                <option value="Leonardo Villasanti">Leonardo Villasanti</option>
                                <option value="Marcos Fernández">Marcos Fernández</option>
                                <option value="Estela Humada">Estela Humada</option>
                                <option value="Mathias Alvarez">Mathias Alvarez</option>
                                <option value="Ernesto Barrios">Ernesto Barrios</option>
                                <option value="Rodrigo Invernizzi">Rodrigo Invernizzi</option>
                                <option value="José Ricardo">José Ricardo</option>
                                <option value="Nicolas Acosta">Nicolas Acosta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" min="1998-01-01">
                        </div>
                        <div class="form-group">
                            <label for="fecha_hasta">Fecha Hasta</label>
                            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" min="1998-01-01">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" onclick="toogleFormGrid()">Cerrar</a>
                        <button class="btn btn-success">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            <th>Solución</th>
            <th>Imagen de solución</th>
            <th>Eliminar</th>
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
                    <button class="btn btn-info btn-sm" 
                            onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte'];?>')"
                            data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                            <i class="fas fa-tools"></i>
                    </button>
                    <?php echo $mostrar ['solucion']; ?>
                </th>
                <th>
                    <?php if($mostrar ['imagen_solucion']){ ?>
                    <div style="max-height: 200px;">
                    <img class="img-fluid" style="max-height: 200px;" src="<?php echo $mostrar ['imagen_solucion']; ?>">
                    </div>

                    <?php } ?>
                </th>
                <th>
                    <button class="btn btn-danger btn-sm"
                        onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']?>)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
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

<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaReporteAdminDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            },
            dom: 'Bfrtip', 
            buttons: {
                buttons : [
                    {
                        extend : 'copy', 
                        className : 'btn btn-outline-info', 
                        text : '<i class="fas fa-copy"></i> Copiar'
                    },
                    {
                        extend : 'csv', 
                        className : 'btn btn-outline-secondary', 
                        text : '<i class="fas fa-file-csv"></i> Csv'
                    },
                    {
                        extend : 'excel', 
                        className : 'btn btn-outline-success', 
                        text : '<i class="fas fa-file-excel"></i> Xls'
                    },
                    {
                        extend : 'pdf', 
                        className : 'btn btn-outline-danger', 
                        text : '<i class="fas fa-file-pdf"></i> Pdf'
                    },
                    {
                        extend : 'print', 
                        className : 'btn btn-outline-dark', 
                        text : '<i class="fas fa-print"></i> Imprimir'
                    }
                ],
                dom: {
                    button : {
                        className: 'btn'
                    }
                }
            }
        });
    });
</script>
