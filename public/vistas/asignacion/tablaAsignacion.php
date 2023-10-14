<?php
    include "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $sql ="    SELECT
                    oficina.id_oficina AS idOficina,
                    oficina.nombre AS nombreOficina,
                    equipo.id_equipo AS idEquipo,
                    equipo.nombre AS nombreEquipo,
                    asignacion.id_asignacion AS idAsignacion,
                    asignacion.nombreEquipoA AS nombreEquipoA,
                    asignacion.rotulado AS rotulado,
                    asignacion.marca AS marca,
                    asignacion.modelo AS modelo,
                    asignacion.numeroSerie AS numeroSerie,
                    asignacion.descripcion AS descripcion,
                    asignacion.memoria AS memoria,
                    asignacion.tipo_ram AS tipoRam,  
                    asignacion.disco_duro AS discoDuro,
                    asignacion.procesador AS procesador,
                    asignacion.sistema_operativo AS sistemaOperativo 
                FROM
                    t_asignacion AS asignacion
                INNER JOIN t_oficina AS oficina
                ON
                    asignacion.id_oficina = oficina.id_oficina
                INNER JOIN t_cat_equipos AS equipo
                ON
                    asignacion.id_equipo = equipo.id_equipo";
    $respuesta = Conexion::select($sql);
?>
<table class="table table-sm table-bordered dt-responsive nowrap"
        id="tablaAsignacionDataTable" style="width:100%">
    <thead>
        <th>Oficina</th>
        <th>Equipo</th>
        <th>Nombre Equipo</th>
        <th>Rotulado</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie/Tag</th>
        <th>Descripción</th>
        <th>Memoria</th>
        <th>Tipo de Ram</th>
        <th>Disco Duro</th>
        <th>Procesador</th>
        <th>Sistema Operativo</th>
        <th>ID Equipo</th>

        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach ($respuesta as $mostrar ){?>
        <tr>
            <td>
                <?php echo $mostrar ['nombreOficina']; ?>
            </td>
            <td>
                <?php echo $mostrar ['nombreEquipo']; ?>
            </td>
            <td>
                <?php echo $mostrar ['nombreEquipoA']; ?>
            </td>
            <td>
                <?php echo $mostrar ['rotulado']; ?>
            </td>
            <td>
                <?php echo $mostrar ['marca']; ?>
            </td>
            <td>
                <?php echo $mostrar ['modelo']; ?>
            </td>
            <td>
                <?php echo $mostrar ['numeroSerie']; ?>
            </td>
            <td>
                <?php echo $mostrar ['descripcion']; ?>
            </td>
            <td>
                <?php echo $mostrar ['memoria']; ?>
            </td>
            <td>
                <?php echo $mostrar ['tipoRam']; ?>
            </td>
            <td>
                <?php echo $mostrar ['discoDuro']; ?>
            </td>
            <td>
                <?php echo $mostrar ['procesador']; ?>
            </td>
            <td>
                <?php echo $mostrar ['sistemaOperativo']; ?>
            </td>
            <td>
                <?php echo $mostrar ['idEquipo'];  ?>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion']?>)">
                <i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaAsignacionDataTable').DataTable({
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