<?php
    require_once "../../../clases/Proveedores.php";
    
    $respuesta = Proveedores::obtenerDatosProveedores();
    ?>
    <table class="table table-sm table-bordered dt-responsive nowrap" id="tablaProveedoresDataTable" style="width:100%">
       <thead>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Editar</th>
            <th>Eliminar</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['direccion']; ?></td>
                <td><?php echo $mostrar['telefono']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizarProveedores" 
                        onclick= "obtenerDatosProveedores(<?php echo $mostrar ['id_proveedor']?>,'#modalActualizarProveedores')"> 
                        <i class=" fas fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm"
                    onclick= "eliminarProveedores(<?php echo $mostrar ['id_proveedor']?>)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
           </tr>
         <?php } ?>
       </tbody>
       </table>
   