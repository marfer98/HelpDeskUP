<?php
require_once '../../../clases/Adquisiciones.php';

if(isset($_GET['id_adquisicion'])){
    $mostrar = Adquisiciones::obtenerDatosAdquisiciones('WHERE id_adquisicion='. $_GET['id_adquisicion']);
    $mostrar = $mostrar[0];

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
            "></a>
            <div class="col-12 titulopie" style="margin-bottom:50px">
                <h4>INFORMÁTICA N°: <?php echo $mostrar['id_adquisicion'] ?></h4>
            </div>
            <div class="col-12 titulopie" style="margin-bottom:50px">
                <h4>SEÑOR/A ENCARGADO/A</h4>
            </div>
        </div>  
        <div class="row">
            <div class="col-xs-8 titulopie">
                <h4 class="">Presente</h4>
                <p>El DEPARTAMENTO DE INFOMÁTICA le hace entrega de su equipo <?php echo $mostrar['nombreEquipoA'] ?> con las siguientes características</p>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th><h4>Tipo de equipo</h4></th>
                    <th><h4>Marca</h4></th>
                    <th><h4>Modelo</h4></th>
                    <th><h4>Memoria</h4></th>
                    <th><h4>Disco duro</h4></th>
                    <th><h4>Cantidad</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $mostrar['nombre_equipo']; ?></td>
                    <td><?php echo $mostrar['marca']; ?></td>
                    <td><?php echo $mostrar['modelo']; ?></td>
                    <td><?php echo $mostrar['tipo_ram']; ?></td>
                    <td><?php echo $mostrar['disco_duro']; ?></td>
                    <td><?php echo $mostrar['cantidad']; ?></td>
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