<?php
require_once '../../../clases/Prestamos.php';

if(isset($_GET['id_prestamo'])){
    $mostrar = Prestamos::obtenerDatosPrestamos('WHERE id_prestamo='. $_GET['id_prestamo']);
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../../img//logoicono.ico" width="30%">
            </a>
        </div>
    </nav>
  
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 titulopie" style="margin-bottom:50px">
                <h4>INFORMÁTICA N°: <?php echo $mostrar['id_prestamo'] ?></h4>
            </div>
            <div class="col-12 titulopie" style="margin-bottom:50px">
                <h4>SEÑOR/A ENCARGADO/A</h4>
            </div>
        </div>  
        <div class="row">
            <div class="col-xs-8 titulopie">
                <h4 class="">Presente</h4>
                <p>EL DEPARTAMENTO DE INFOMÁTICA DE LA CIRCUNSCRIPCIÓN JUDICIAL CENTRAL DE SAN LORENZO
                <p>le hace entrega de su equipo <?php echo $mostrar['nombreEquipoA'] ?> </p>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th><h4>Oficina origen</h4></th>
                <th><h4>Oficina destino</h4></th>
                <th><h4>Cantidad</h4></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $mostrar['nombre_oficina_origen']; ?></td>
                <td><?php echo $mostrar['nombre_oficina_destino']; ?></td>
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