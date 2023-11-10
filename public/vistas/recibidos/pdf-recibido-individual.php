<?php
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(E_ALL);

require_once '../../../clases/Conexion.php';
require_once '../../../clases/Recibidos.php';

if(isset($_GET['id_recibido'])){

    $sql = "SELECT DISTINCT * FROM (SELECT
                recepcion.id_recepcion AS idRecepcion,
                recepcion.ciudad AS ciudad,
                equipo.nombre AS tipoEquipo,
                recepcion.nombre_equipo AS nombreEquipo,
                recepcion.estatus AS estado,
                recepcion.rotulado AS rotulado,
                recepcion.numero_serie AS numeroSerie,
                recepcion.procedencia AS procedencia,
                recepcion.fecha_recepcion AS fechaRecepcion,
                equipo.id_equipo AS idEquipo,
                recepcion.descripcion_problema AS descripcionProblema,
                recepcion.recibido AS recibido,
                recepcion.responsable AS responsable,
                recepcion.descripcion_solucion AS descripcionSolucion,
                recepcion.fecha_entrega AS fechaEntrega,
                recepcion.nombre_tecnico AS tecnico,
                recepcion.informe_tecnico AS informeTecnico
            FROM
                t_recepcion AS recepcion
            INNER JOIN t_cat_equipos AS equipo
            ON
                recepcion.id_equipo = equipo.id_equipo)V_TMP ".
            'WHERE idRecepcion='. $_GET['id_recibido'];
    $mostrar = Conexion::select($sql);
    $mostrar = $mostrar [0];

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
        <div class="container">
            <div class="row">
            <a class="navbar-brand" href="inicio.php" style="
                min-height: 60px;
                min-width: 90px;
                background-image: url(http://helpdeskup.great-site.net/public/img/logoicono.ico);
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                margin-bottom: 50px;
            ">
            </a>
                <div class="col-12 titulopie" style="">
                    <h4>INFORMÁTICA N°: <?php echo $mostrar['idRecepcion'] ?></h4>
                </div>
                <div class="col-12 titulopie" style="margin-bottom:50px">
                    <h4>SEÑOR/A ENCARGADO/A</h4>
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-8 titulopie">
                    <h4 class="">Presente</h4>
                    <p>EL DEPARTAMENTO DE INFOMÁTICA DE LA CIRCUNSCRIPCIÓN JUDICIAL CENTRAL DE SAN LORENZO
                    <p>le hace entrega de su equipo <?php echo $mostrar['nombreEquipo'] ?> reparado</p>
                </div>
            </div>
            
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                        <th><h4 class="titulo">Equipo</h4></th>
                        <th><h4 class="titulo">Nro. Serie</h4></th>
                        <th><h4 class="titulo">Patrimonial</h4></th>
                        <th><h4 class="titulo">Origen</h4></th>
                        <th><h4 class="titulo">Estado</h4></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <?php echo $mostrar ['tipoEquipo']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['numeroSerie']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['rotulado']; ?>
                    </th>
                    <th>
                        <?php echo $mostrar ['procedencia'].' '.$mostrar ['ciudad']; ?>
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
                    
                </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-8 titulopie">
                    <p>Sin otro particular, le deseamos éxitos en sus funciones
                    <p>Atentamente</p>
                </div>
            </div>

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

