<?php
    include "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql ="    SELECT 
                    t_oficina.nombre as nombreOficina, 
                    t_oficina.telefono as telefonoOficina, 
                    t_oficina.correo as correoOficina 
    
                 FROM t_oficina";
    $respuesta = mysqli_query ($conexion,$sql);
?>
<table class="table table-sm dt-responsive nowrap" id="tablaOficinaDataTable" style="width:100%">
    <thead>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)){
    ?>
        <tr>
            <th>
                <?php echo $mostrar ['nombreOficina']; ?>
            </th>
            <th>
                <?php echo $mostrar ['telefonoOficina']; ?>
            </th>
            <th>
                <?php echo $mostrar ['correoOficina']; ?>
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
        $('#tablaOficinaDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>