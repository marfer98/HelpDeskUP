<?php
require_once "../../../clases/Adquisiciones.php";

$respuesta = Adquisiciones::obtenerDatosAdquisicionesAuditoria();
?>
     <table class="table table-sm table-bordered dt-responsive nowrap" id="tablaAdquisicionesDataTable" style="width:100%">
       <thead>
            <th>Proveedor</th>
            <th>Tipo de equipo</th>
            <th>Nombre Artículo</th>
            <th>Rotulado</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>NumeroSerie</th>
            <th>Descripción</th>
            <th>Memoria</th>
            <th>Tipo ram</th>
            <th>Disco duro</th>
            <th>Procesador</th>
            <th>Sistema operativo</th>
            <th>Cantidad</th>
            <th>Usuario</th>
            <th>Tipo Operación</th>
            <th>Fecha de auditoría</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
                <td><?php echo $mostrar['nombre_proveedor']; ?></td>
                <td><?php echo $mostrar['nombre_equipo']; ?></td>
                <td><?php echo $mostrar['nombreEquipoA']; ?></td>
                <td><?php echo $mostrar['rotulado']; ?></td>
                <td><?php echo $mostrar['marca']; ?></td>
                <td><?php echo $mostrar['modelo']; ?></td>
                <td><?php echo $mostrar['numeroSerie']; ?></td>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td><?php echo $mostrar['memoria']; ?></td>
                <td><?php echo $mostrar['tipo_ram']; ?></td>
                <td><?php echo $mostrar['disco_duro']; ?></td>
                <td><?php echo $mostrar['procesador']; ?></td>
                <td><?php echo $mostrar['sistema_operativo']; ?></td>
                <td><?php echo $mostrar['cantidad']; ?></td>
                <th><?php echo $mostrar ['usuario']; ?></th> 
                <th><?php echo $mostrar ['tipo_operacion']; ?></th> 
                <th><?php echo $mostrar ['fecha_insert_auditoria']; ?></th> 
           </tr>
         <?php } ?>
       </tbody>
     </table>
<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaAdquisicionesDataTable').DataTable({
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
                    }
                    
                ],
                dom: {
                    button : {
                        className: 'btn'
                    }
                }
            }
        });
        checkDTButtons(); // Call the function to start the process
    });

    function checkDTButtons() {
        let myIntervalId; // Rename intervalId to myIntervalId

        if ($('.dt-buttons').length) {
            if(!$('#btn-imprimir').length){
                $('.dt-buttons').append(`
                    <button id="btn-imprimir" class="btn buttons-print btn-outline-dark" tabindex="0" aria-controls="tablaReporteAdminDataTable" type="button">
                        <a target="_blank" href="./adquisiciones/pdf-adquisiciones-auditoria-completo.php<?php echo ($_POST ? "?".(http_build_query($_POST)) : '') ?>" style="color: inherit !important;text-decoration: none !important;">   
                            <span>
                                <i class="fas fa-print"></i> Imprimir
                            </span>
                        </a>
                    </button>
                `);
            }
            

            clearInterval(myIntervalId);
        } else {
            setTimeout(checkDTButtons, 1000);
        }
    }

</script>