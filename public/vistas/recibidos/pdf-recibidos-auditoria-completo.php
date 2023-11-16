<?php
require_once '../../../clases/Adquisiciones.php';


require_once "../../../clases/Conexion.php"; //ponemos las relaciones de la bd para luego insertar datos en las tablas
    $con = new Conexion();
    $sql = "SELECT
                recepcion.id_recepcion AS id_recepcion,
                recepcion.ciudad AS ciudad,
                equipo.nombre AS tipoEquipo,
                recepcion.nombre_equipo AS nombreEquipo,
                recepcion.estatus AS estado,
                recepcion.rotulado AS rotulado,
                recepcion.numero_serie AS numeroSerie,
                recepcion.procedencia AS procedencia,
                recepcion.fecha_recepcion AS fechaRecepcion,
                equipo.id_equipo AS id_equipo,
                recepcion.descripcion_problema AS descripcionProblema,
                recepcion.recibido AS recibido,
                recepcion.responsable AS responsable,
                recepcion.descripcion_solucion AS descripcionSolucion,
                recepcion.fecha_entrega AS fechaEntrega,
                recepcion.nombre_tecnico AS tecnico,
                recepcion.informe_tecnico AS informeTecnico,
                u.id_usuario,
                u.usuario,
                recepcion.tipo_operacion,
                fecha_insert_auditoria
            FROM
                t_recepcion_auditoria AS recepcion
            JOIN t_usuarios u ON recepcion.id_usuario = u.id_usuario
            LEFT JOIN t_cat_equipos AS equipo
            ON
                recepcion.id_equipo = equipo.id_equipo
            ORDER BY recepcion.id_recepcion_auditoria DESC";
    $respuesta = Conexion::select($sql);

if($respuesta){
    $mostrar = $respuesta[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../../public/datatable/buttons.dataTables.min.css">
    <title>HelpDesk</title>
</head>

<body>
     
  <body>
    <div class="container m-0 p-0">
        <div class="row">
            <a class="navbar-brand ml-3" href="inicio.php" style="
                min-height: 60px;
                min-width: 90px;
                background-image: url(http://helpdeskup.great-site.net/public/img/logoicono.ico);
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                margin-bottom: 50px;
            "></a>
        </div>  
        <table class="table table-sm table-bordered dt-responsive nowrap" 
                id="tablaRecibidoDataTable" style="width:100%">
            <thead>
                <th>Ciudad</th>
                <th>Tipo Equipo</th>
                <th>Nombre Equipo</th>
                <th>Estado</th>
                <th>Rotulado</th>
                <th>Tag/Serie</th>
                <th>Fecha de Recepción</th>
                <th>Procedencia</th>
                <th>Problema</th>
                <th>Recibido por</th>
                <th>Responsable / Teléfono</th>
                <th>Solución</th>
                <th>Fecha de Entrega</th>
                <th>Nombre Técnico</th>
                <th>Informe Técnico</th>
                <th>Usuario</th>
                <th>Tipo Operación</th>
                <th>Fecha de auditoría</th>
            </thead>
            <tbody>
                <?php
                    foreach ($respuesta as $mostrar){
                ?>
                <tr>
                    <th>
                        <?php echo $mostrar ['ciudad']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['tipoEquipo']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['nombreEquipo']; ?>
                    </th>
                    <th>
                    <?php 
                            $estado = $mostrar['estado'];
                            $cadenaEstatus ='<span class="badge bg-warning">Abierto</span>';
                            if ($estado == 0){
                                $cadenaEstatus ='<span class="badge bg-success">Entregado</span>';
                            }if ($estado == 2){
                                $cadenaEstatus ='<span class="badge bg-danger">De Baja</span>';}
                            echo $cadenaEstatus;
                        ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['rotulado']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['numeroSerie']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['fechaRecepcion']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['procedencia']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['descripcionProblema']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['recibido']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['responsable']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['descripcionSolucion']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['fechaEntrega']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['tecnico']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['informeTecnico']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['usuario']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['tipo_operacion']; ?>
                    </th> 
                    <th>
                        <?php echo $mostrar ['fecha_insert_auditoria']; ?>
                    </th> 
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
  </body>
    <script>
        window.print();
    </script>
</html>
<?php

}else{

    echo '<p>No se ha encontrado informe</p>';

}