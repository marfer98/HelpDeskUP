<?php  //validación de inicio de sesión
  include "header.php"; 
  if (isset ($_SESSION ['usuario']) && $_SESSION['usuario']['rol']== 1){
      require_once "../../clases/Conexion.php";
      $con = new Conexion();
      $conexion = $con->conectar();
  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Reportes de clientes</h1>
            <p class="lead">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReportes">
            <i class="fas fa-plus-circle"></i> Crear reporte</button>
            <hr>
            <div id="tablaReporteClienteLoad"></div>
            </p>
        </div>
    </div>
</div>

<?php 

    include "footer.php";
    include "reportesCliente/modalCrearReporte.php";
?>
<script src="../js/reportesCliente/reportesCliente.js"></script>
<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
?>
