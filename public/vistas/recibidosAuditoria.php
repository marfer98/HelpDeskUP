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
            <h1 class="fw_light">Auditoría de Recibidos para reparación</h1>
            <div id="tablaRecibidosLoad">

            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php"; 
?>    
<script src="../js/recibidos/recibidosAuditoria.js"></script>

<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
  ?>
