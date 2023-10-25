<?php
    require_once "../../../clases/Sucursales.php";
  
    $respuesta = Sucursales::obtenerDatosSucursales();
?>
<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaSucursalesDataTable" style="width:100%">
       <thead>
            <th>Descripcion</th>
		    <th>Direccion</th>
            <th>Editar</th>
            <th>Eliminar</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td><?php echo $mostrar['direccion']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizarSucursales" 
                        onclick= "obtenerDatosSucursales(<?php echo $mostrar ['id_sucursal']?>,'#modalActualizarSucursales')"> 
                        <i class=" fas fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm"
                    onclick= "eliminarSucursales(<?php echo $mostrar ['id_sucursal']?>)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
           </tr>
         <?php } ?>
       </tbody>
     </table>

<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaSucursalesDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>