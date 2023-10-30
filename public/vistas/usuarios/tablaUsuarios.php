<?php
require_once '../../../clases/Usuarios.php';
require_once '../../../clases/Roles.php';
$usuario = new Usuarios;
$respuesta = $usuario->obtenerDatosUsuarios();
?>
<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
    <thead>
    <th>Usuario</th>
    <th>Sucursal</th>
    <!--<th>Cod Oficina</th>-->
    <th>Nombre Oficina</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Ubicacion</th>
    <th>Rol</th>
    <th>Reset Password</th>
    <th>Cambiar Rol</th>
    <th>Activar</th>
    <th>Editar</th>
    <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach ($respuesta as $mostrar) {
        ?>
        <tr>
            <td><?php echo $mostrar ['nombreUsuario']; ?></td>
            <td><?php echo $mostrar ['sucursal']; ?></td>
            <!--<td><?php echo $mostrar ['id_oficina']; ?></td>-->
            <td><?php echo $mostrar ['nombreOficina']; ?></td>
            <td><?php echo $mostrar ['telefono']; ?></td>
            <td><?php echo $mostrar ['correo']; ?></td>
            <td><?php echo $mostrar ['ubicacion']; ?></td>
            <td><?php echo $mostrar ['rol']; ?></td>
            <td>
                <button class="btn btn-success btn-sm"
                        data-toggle="modal" data-target="#modalResetPassword"
                        onclick="agregarIdUsuarioReset(<?php echo $mostrar ['idUsuario'] ?>)">
                    <i class="fas fa-retweet"></i>
                </button>
            </td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="cambioRolUsuario(<?php echo $mostrar['idUsuario'] ?>,  <?php echo $mostrar ['rol']; ?>)">
                    <i class=" fas fa-exchange-alt"></i>
                </button>
            </td>
            <td>
                <?php
                if ($mostrar['estatus'] == 1) {
                    ?>
                    <!-- condicional activo e inactivo -->
                    <button class="btn btn-secondar btn-sm"
                            onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                        <span class="fas fa-power-off"></span> Off
                    </button>
                    <?php
                } else if ($mostrar['estatus'] == 0) {
                    ?>
                    <button class="btn btn-success btn-sm"
                            onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                        <span class="fas fa-power-off"></span> On
                    </button>
                    <?php
                }
                ?>
            </td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#modalActualizarUsuarios"
                        onclick="obtenerDatosUsuario(<?php echo $mostrar ['idUsuario'] ?>,'#frmActualizarUsuario')">
                    <i class=" fas fa-edit"></i>
                </button>
            </td>
            <td>
                <button class="btn btn-danger btn-sm"
                        onclick="eliminarUsuarios(<?php echo $mostrar ['idUsuario'] ?>)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    //datatable 
    $(document).ready(function () {
        $('#tablaUsuariosDataTable').DataTable({
            language: { //esto es una propiedad
                url: "../datatable/es_es.json"
            }
        });
    });
</script>