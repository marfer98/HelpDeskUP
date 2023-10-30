<?php  //validación de inicio de sesión
  include "header.php"; 
  if (isset ($_SESSION ['usuario']) && $_SESSION ['usuario']['rol']== 2){
  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Administrar Usuarios</h1>
            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                <i class="fas fa-plus-circle"></i> Agregar Usuario
                </button>
                <hr>
                <div id="tablaUsuariosLoad"></div>
            </p>
            <div style="height: 700px"></div>
        </div>
    </div>
<?php 
    include "usuarios/modalAgregar.php";
    include "usuarios/modalActualizar.php";
    include "usuarios/modalResetPassword.php";
    include "footer.php"; 
?>
<script src="../js/usuarios/usuario.js"></script>
<script src="../js/oficinas/oficina.js"></script>
<?php
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
?>