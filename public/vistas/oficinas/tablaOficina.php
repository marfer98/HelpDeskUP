<?php

ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
require_once "../../../clases/Oficinas.php";

$respuesta = Oficinas::obtenerDatosOficina();
?>
<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaOficinaDataTable" style="width:100%">
    <thead>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php foreach ($respuesta as $mostrar) { ?>
        <tr>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" 
                    data-target="#modalActualizarOficina" 
                    onclick= "obtenerDatosOficina(<?php echo $mostrar ['id_oficina']?>,'#modalActualizarOficina')"> 
                    <i class=" fas fa-edit"></i>
                </button>
            </td>
            <td>
                <button class="btn btn-danger btn-sm"
                onclick= "eliminarOficina(<?php echo $mostrar ['id_oficina']?>)">
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
        $('#tablaOficinaDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>