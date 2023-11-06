<?php
require_once '../../../clases/Recibidos.php';

if(isset($_GET['id_recibido'])){
    $respuesta = Recibidos::obtenerDatosRecibidos('WHERE id_recibido='. $_GET['id_recibido']);
    $respuesta = $respuesta[0];

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
                    <h4>INFORMÁTICA N°: <?php echo $respuesta['id_recibido'] ?></h4>
                </div>
                <div class="col-12 titulopie" style="margin-bottom:50px">
                    <h4>SEÑOR/A ENCARGADO/A</h4>
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-8 titulopie">
                    <h4 class="">Presente</h4>
                    <p>EL DEPARTAMENTO DE INFOMÁTICA DE LA CIRCUNSCRIPCIÓN JUDICIAL CENTRAL DE SAN LORENZO
                    <p>le hace entrega de su equipo <?php echo $respuesta['nombreEquipoA'] ?> reparado</p>
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
                        <?php echo $mostrar ['procedencia']; ?>
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


<?php
require_once '../../../clases/Prestamos.php';

if(isset($_GET['id_recibido'])){
    $mostrar = Prestamos::obtenerDatosPrestamos('WHERE id_recibido='. $_GET['id_recibido']);
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
                <h4>INFORMÁTICA N°: <?php echo $mostrar['id_recibido'] ?></h4>
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