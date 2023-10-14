<?php  //validación de inicio de sesión
  include "header.php"; 
  if (isset ($_SESSION ['usuario']) && $_SESSION ['usuario']['rol']== 2){
  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Administrar Oficinas</h1>
            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOficina">
                    <i class="fas fa-plus-circle"></i>
                    Agregar Oficinas
                </button>
                <hr>
                <div id="tablaOficinasLoad"></div>
            </p>
            <div style="height: 700px"></div>
        </div>
    </div>

<?php 
    include "oficinas/modalAgregarOficina.php";
    
    include "footer.php"; 
?>
<script src="../js/oficinas/oficina.js"></script>
<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
?>