<?php
    session_start();
    include "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
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
                    reporte.usuario_tecnico AS usuarioTecnico,
                    reporte.descripcion_problema AS problema ,
                    reporte.solucion_problema AS solucion,
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
                    reporte.id_equipo = equipo.id_equipo 
                    ORDER BY reporte.fecha DESC";
    $respuesta = mysqli_query ($conexion,$sql);
?>


<table class="table table-sm table-bordered dt-responsive nowrap" 
       id="tablaReporteAdminDataTable" style="width:100%">
    <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Dispositivo</th>
        <th>Fecha</th>
        <th>Descripción Problema</th>
        <th>Estatus</th>
        <th>Técnico</th>
        <th>Solución</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        
        <?php while ($mostrar = mysqli_fetch_array($respuesta)){?>
        <tr>
            <th>
                <?php echo $contador++; ?>
                <!--El contador muestra un numero de reporte no así un ID -->
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
                <?php echo $mostrar ['usuarioTecnico']; ?>
            </th>
            <th>
                <button class="btn btn-info btn-sm" 
                        onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte'];?>')"
                        data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                        <i class="fas fa-tools"></i>
                </button>
                <?php echo $mostrar ['solucion']; ?>
            </th>

            <th>
                <button class="btn btn-danger btn-sm"
                    onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']?>)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </th>
        </tr>
      <?php } ?>
    </tbody>
</table>
<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaReporteAdminDataTable').DataTable({
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
