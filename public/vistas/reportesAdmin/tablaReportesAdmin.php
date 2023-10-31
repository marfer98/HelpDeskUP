<?php
    session_start();
    require_once "../../../clases/Reportes.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $contador = 1;//suma los reportes de auno
    $idUsuario = $_SESSION['usuario']['id'];//pasa el id usuario que inicio sesion
    $reporte = new Reportes();
    $respuesta = $reporte->obtenerDatosReportes();
?>


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
                $clave = ($mostrar['estatus']) ? 'Cerrado' : 'Abierto' ;
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
                <!--El contador muestra un numero de reporte no así un ID -->
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
