<?php  //validación de inicio de sesión
  include "header.php"; 
  if (isset ($_SESSION ['usuario']) && $_SESSION ['usuario']['rol']==2){
  ?>

<!-- VISTA DEL ADMINISTRADOR-->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw_light">Gestionar reportes de usuarios</h1>
                <a href="#" class="text-black" onclick="toogleFormGrid()"><i class="fa fa-filter" aria-hidden="true"></i></a>
            </div>
            
            <hr>
            <p class="lead">
                <div id="tablaReporteAdminLoad"></div>  
            </p>
        </div>
    </div>
</div>
<?php
    include "reportesAdmin/modalAgregarSolucion.php";
    include "footer.php"; 
?>
<script src="../js/reportesAdmin/reportesAdmin.js"></script>
<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
?>
