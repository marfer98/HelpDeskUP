<?php
    session_start(); //iniciar sesión 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/plantilla.css">
    <link rel="stylesheet" href="../datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../public/datatable/buttons.dataTables.min.css">

    <title>HelpDesk</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img//logoicono.ico" width="30%">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="inicio.php">
                        <span class="fas fa-home"></span> Inicio</a>
                    </li>
                <?php if ($_SESSION['usuario']['rol'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="misDispositivos.php">
                            <span class="fas fa-server"></span> Mis Dispositivos</a>
                            <!-- /*referencia a los archivos que contienen el codigo*/ -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="misReportes.php">
                            <i class="fas fa-file-alt"></i> Reportes de Soporte</a>
                        </li>
                    <?php }else if($_SESSION['usuario']['rol'] == 2){?> <!-- cierra el if de la vista del usuario -->
                        <!-- vista del administrador -->
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-building"></i> Direcciones
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="oficinas.php">
                                    <i class="fas fa-building"></i> Oficinas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="sucursales.php">
                                    <i class="fas fa-building"></i> Sucursales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="proveedores.php">
                                    <i class="fas fa-building"></i> Proveedores</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">
                            <i class="fas fa-users"></i> Usuarios</a>
                        </li>
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-building"></i> Articulos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="adquisicion.php">
                                    <i class="fas fa-shopping-cart"></i> Adquisición</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="asignacion.php">
                                    <i class="fas fa-user-plus"></i> Asignación</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="prestamos.php">
                                    <i class="fas fa-hand-holding-usd"></i> Prestamos</a>
                                </li>
                            </ul>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="recibidos.php">
                            <i class="fas fa-exchange-alt"></i> Recibidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportes.php">
                            <i class="fas fa-file-alt"></i> Reportes</a>
                        </li>
                    <?php }?>
                    <li class="nav-item dropdown" >
                        <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-cog"></i> Usuario: <?php echo $_SESSION['usuario']['nombre']; ?><!-- muestra el nombre del ususario -->
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">
                            <i class="fas fa-user-edit"></i> Editar Datos</a></li>
                             <!-- donde nos lleva la opcion salir -->
                            <li><a style="color:red" class="dropdown-item" href="../../procesos/usuarios/login/salir.php">
                            <i class="fas fa-sign-out-alt"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>