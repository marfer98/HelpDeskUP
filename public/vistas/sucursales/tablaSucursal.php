<?php
    require_once "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    
    $sql ="    SELECT 
                    descripcion,
                    direccion
                FROM t_sucursales s";
    $respuesta = Conexion::select($sql);
?>
<table class="table table-sm dt-responsive nowrap" id="tablaSucursalDataTable" style="width:100%">
    <thead>
        <th>Nombre</th>
        <th>Dirección</th>
        
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php foreach ($respuesta as $mostrar){
    ?>
        <tr>
            <th>
                <?php echo $mostrar ['descripcion']; ?>
            </th>
            <th>
                <?php echo $mostrar ['direccion']; ?>
            </th>      
            <th>
                <button class="btn btn-warning btn-sm"> Editar</button>
            </th>
            <th>
                <button class="btn btn-danger btn-sm"> Eliminar</button>
            </th>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaSucursalDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>