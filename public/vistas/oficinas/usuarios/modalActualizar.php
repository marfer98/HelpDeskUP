<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
    require_once '../../clases/Roles.php';
    require_once '../../clases/Sucursales.php';
?>
<!-- Modal -->
<!--onsubmit es para recargar el campo y este en blanco-->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
    <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <!--la U al final hace referencia al UPDATE-->
                        <input type="text " id="idUsuario" name="idUsuario" hidden>
                        <input type="text " id="id_oficina" name="id_oficina" hidden>
                        <div class="col-sm-12">
                            <label for="nombreu"> Nombre</label>
                            <input type="text" class="form-control" id="nombreu" name="nombreu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="telefonou"> Telefono</label>
                            <input type="text" class="form-control" id="telefonou" name="telefonou" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="correou"> Correo</label>
                            <input type="mail" class="form-control" id="correou" name="correou" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="nombreUsuariou"> Usuario</label>
                            <input type="text" class="form-control" id="nombreUsuariou" name="nombreUsuariou" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="idRol"> Rol usuario</label>
                            <select name="idRol" id="idRol" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                <?php
                                    $roles = new Roles;
                                    $roles = $roles->obtenerDatosRoles();
                                    foreach($roles as $rol){
                                        echo "<option value='".$rol['id_rol']."'>".$rol['nombre']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="id_sucursal"> Sucursal</label>
                            <select name="id_sucursal" id="id_sucursal" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    $sucursal = new Sucursales;
                                    $sucursal = $sucursal->obtenerDatosSucursales();
                                    foreach($sucursal as $sucu){
                                        echo "<option value='".$sucu['id_sucursal']."'>".$sucu['descripcion']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="ubicacionu"> Ubicación</label>
                            <textarea name="ubicacionu" id="ubicacionu" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal">Cancelar</span>
                    <button class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>