<?php
    session_start();
    require_once "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $con = new Conexion();
    $conexion = $con->conectar();
    $contador = 1;//suma los reportes de auno
    $idUsuario = $_SESSION['usuario']['id'];//pasa el id usuario que inicio sesion 
    $sql ="    SELECT
                    reporte.id_reporte AS idReporte,
                    reporte.id_usuario AS idUsuario,
                    oficina.nombre AS nombreOficina,
                    equipo.id_equipo AS idEquipo,
                    equipo.nombre AS nombreEquipo,
                    reporte.descripcion_problema AS problema ,
                    reporte.solucion_problema AS solucion,
                    reporte.usuario_tecnico AS usuarioTecnico,
                    reporte.estatus AS estatus,
                    reporte.fecha AS fecha 
                FROM
                    t_reportes AS reporte
                INNER JOIN t_usuarios AS usuario
                ON
                    reporte.id_usuario = usuario.id_usuario
                INNER JOIN t_oficina AS oficina
                ON
                    usuario.id_oficina = oficina.id_oficina
                INNER JOIN t_cat_equipos AS equipo
                ON
                    reporte.id_equipo = equipo.id_equipo AND reporte.id_usuario = '$idUsuario'";
    $respuesta = Conexion::select($sql);
?>


<table class="table table-sm table-bordered dt-responsive nowrap" 
       id="tablaReporteClienteDataTable" style="width:100%">
    <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Dispositivo</th>
        <th>Fecha</th>
        <th>Descripción</th>
        <th>Estatus</th>        
        <th>Solucion</th>
        <th>Eliminar</th>

    </thead>
    <tbody>
        <?php foreach ($respuesta as $mostrar){?>
        <tr>
            <th>
                <?php echo $contador++; ?>
                <!--El contador muestra un Número de reporte no así un ID -->
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
                <?php echo $mostrar ['solucion']; ?>
            </th>
            <th>
                <?php 
                    if ($mostrar ['solucion'] == ""){ 
                ?>
                    <button class="btn btn-danger btn-sm"
                        onclick="eliminarReporteCliente(<?php echo $mostrar['idReporte']?>)">Eliminar
                    </button>
                <?php
                    }
                ?>
            </th>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaReporteClienteDataTable').DataTable({
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