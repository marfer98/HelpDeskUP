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
    });
</script>