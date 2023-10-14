<?php  
  include "header.php";//entra el header
  if (isset ($_SESSION ['usuario']) && $_SESSION ['usuario']['rol']==2){//validación de inicio de sesión - admin
    require_once "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion =$con->conectar();

  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Asignación de Equipos</h1>
            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
                <i class="fas fa-plus-circle"></i> Asignar Equipo</button>
                <hr>
                <div id="tablaAsignacionesLoad"></div>
            </p>
        </div>
    </div>
</div>

<?php 
include "asignacion/modalAsignar.php"; 
include "footer.php"; 
?>    
<script src="../js/asignacion/asignacion.js"></script>

<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
  ?>
