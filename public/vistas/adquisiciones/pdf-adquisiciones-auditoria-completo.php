<?php
require_once '../../../clases/Adquisiciones.php';


$respuesta = Adquisiciones::obtenerDatosAdquisicionesAuditoria();

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
        <table class="table table-sm table-bordered dt-responsive nowrap" id="tablaAdquisicionesDataTable" style="width:100%">
            <thead>
                <th>Proveedor</th>
                <th>Tipo de equipo</th>
                <th>Nombre Artículo</th>
                <th>Rotulado</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>NumeroSerie</th>
                <th>Descripción</th>
                <th>Memoria</th>
                <th>Tipo ram</th>
                <th>Disco duro</th>
                <th>Procesador</th>
                <th>Sistema operativo</th>
                <th>Cantidad</th>
                <th>Usuario</th>
                <th>Tipo Operación</th>
                <th>Fecha de auditoría</th>
            </thead>
            <tbody>
                <?php foreach ($respuesta as $mostrar) { ?>
                <tr>
                    <td><?php echo $mostrar['nombre_proveedor']; ?></td>
                    <td><?php echo $mostrar['nombre_equipo']; ?></td>
                    <td><?php echo $mostrar['nombreEquipoA']; ?></td>
                    <td><?php echo $mostrar['rotulado']; ?></td>
                    <td><?php echo $mostrar['marca']; ?></td>
                    <td><?php echo $mostrar['modelo']; ?></td>
                    <td><?php echo $mostrar['numeroSerie']; ?></td>
                    <td><?php echo $mostrar['descripcion']; ?></td>
                    <td><?php echo $mostrar['memoria']; ?></td>
                    <td><?php echo $mostrar['tipo_ram']; ?></td>
                    <td><?php echo $mostrar['disco_duro']; ?></td>
                    <td><?php echo $mostrar['procesador']; ?></td>
                    <td><?php echo $mostrar['sistema_operativo']; ?></td>
                    <td><?php echo $mostrar['cantidad']; ?></td>
                    <th><?php echo $mostrar ['usuario']; ?></th> 
                    <th><?php echo $mostrar ['tipo_operacion']; ?></th> 
                    <th><?php echo $mostrar ['fecha_insert_auditoria']; ?></th> 
                </tr>
                <?php } ?>
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