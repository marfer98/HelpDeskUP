<?php
    require_once '../../../clases/Usuarios.php';
    require_once '../../../clases/Roles.php';
    $usuario = new Usuarios;
    $respuesta = $usuario->obtenerDatosUsuarios();
?>
<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <th>Cod Oficina</th>
        <th>Nombre Oficina</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Sucursal</th>
        <th>Ubicacion</th>
        <th>Nombre Rol</th>
        <th>Reset Password</th>
        <th>Cambiar Rol</th>
        <th>Activar</th>

        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php foreach ($respuesta as $mostrar){
    ?>
        <tr>
            <th>
                <?php echo $mostrar ['idOficina']; ?>
            </th> 
            <th>
                <?php echo $mostrar ['nombreOficina']; ?>
            </th>
            <th>
                <?php echo $mostrar ['telefono']; ?>
            </th>
            <th>
                <?php echo $mostrar ['correo']; ?>
            </th>
            <th>
                <?php echo $mostrar ['nombreUsuario']; ?>
            </th>
            <th>
                <?php echo $mostrar ['sucursal']; ?>
            </th>
            <th>
                <?php echo $mostrar ['ubicacion']; ?>
            </th>
            <th>
                <?php echo $mostrar ['rol']; ?>
            </th>
            <th>
                <button class="btn btn-success btn-sm"
                    data-toggle="modal" data-target="#modalResetPassword"
                    onclick="agregarIdUsuarioReset(<?php echo $mostrar ['idUsuario']?>)"> 
                    <i class="fas fa-retweet"></i> 
                </button>
            </th>
           <th>
                <button class="btn btn-warning btn-sm">
                    <i class=" fas fa-exchange-alt"></i>
                </button>
            </th>
            <th>
                <?php
                    if($mostrar['estatus'] == 1){
                ?>
                <!-- condicional activo e inactivo -->
                <button class="btn btn-secondar btn-sm" 
                    onclick= "cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)"> 
                    <span class="fas fa-power-off"></span> Off
                </button>
                <?php 
                    }else if($mostrar['estatus'] == 0) {
                ?>
                <button class="btn btn-success btn-sm" 
                    onclick= "cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                    <span class="fas fa-power-off"></span> On
                </button>
                <?php  
                }
                ?>
            </th>
            
            <th>
                <button class="btn btn-warning btn-sm" data-toggle="modal" 
                    data-target="#modalActualizarUsuarios" 
                    onclick= "obtenerDatosUsuario(<?php echo $mostrar ['idUsuario']?>)"> 
                    <i class=" fas fa-edit"></i>
                </button>
            </th>
            <th>
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </th>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaUsuariosDataTable').DataTable({
            language :{ //esto es una propiedad 
                url: "../datatable/es_es.json"
            }
        });
    });
</script>