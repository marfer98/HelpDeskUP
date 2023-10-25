<?php  //validación de inicio de sesión
  include "header.php"; 
  
  if (isset ($_SESSION ['usuario']) && $_SESSION ['usuario']['rol']== 2){
  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Administrar Prestamos</h1>
            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrestamos">
                    <i class="fas fa-plus-circle"></i>
                    Agregar Prestamos
                </button>
                <hr>
                <div id="tablaPrestamosLoad"></div>
            </p>
            <div style="height: 700px"></div>
        </div>
    </div>

<?php 
    include "prestamos/modalAgregarPrestamos.php";
    
    require_once "footer.php"; 
?>
<script src="../js/prestamos/prestamos.js"></script>
<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
?>
