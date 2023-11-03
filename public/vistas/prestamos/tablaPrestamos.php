<?php
    require_once "../../../clases/Prestamos.php";
    
    $respuesta = Prestamos::obtenerDatosPrestamos();
    ?>
    <table class="table table-sm table-bordered dt-responsive nowrap" id="tablaPrestamosDataTable" style="width:100%">
       <thead>
            <th>Nombre Equipo</th>
            <th>Oficina origen</th>
            <th>Oficina destino</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Informe PDF</th>
            <th>Editar</th>
            <th>Eliminar</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
                <td><?php echo $mostrar['nombreEquipoA']; ?></td>
                <td><?php echo $mostrar['nombre_oficina_origen']; ?></td>
                <td><?php echo $mostrar['nombre_oficina_destino']; ?></td>
                <td><?php echo $mostrar['cantidad']; ?></td>
                <td><?php 
                    echo ($mostrar['estado'] == 1) ? 
                        '<span class="badge bg-success">Confirmado</span>' :
                        ( ($mostrar['estado'] == 0) ?'<span class="badge bg-danger">Rechazado</span>' :'<span class="badge bg-warning">Pendiente</span>' );?>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizarPrestamos" 
                        onclick= "descargarInformePDF(<?php echo $mostrar ['id_prestamo']?>,'#modalActualizarPrestamos')"> 
                        <i class="fa fa-file-pdf"></i>
                    </button>
                </td>
                <?php
                if(!in_array($mostrar['estado'],[1,0])){ ?>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizarPrestamos" 
                        onclick= "obtenerDatosPrestamos(<?php echo $mostrar ['id_prestamo']?>,'#modalActualizarPrestamos')"> 
                        <i class=" fas fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm"
                    onclick= "eliminarPrestamos(<?php echo $mostrar ['id_prestamo']?>)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
                <?php }else{ ?>
                <td></td> 
                <td></td>
                <?php } ?>
           </tr>
         <?php } ?>
       </tbody>
    </table>
<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaPrestamosDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>