<form id="frmAgregarSucursales" method="POST" onsubmit="return agregarSucursales()">
    <div class="modal fade" id="modalAgregarSucursales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo Sucursales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    </div>		
                    <div class="col-sm-6">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="frmActualizarSucursales" method="POST" onsubmit="return actualizarSucursales()">
        <div class="modal fade" id="modalActualizarSucursales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Sucursales</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-sm-6 d-none" >
                        <label for="id_sucursal">id_sucursal</label>
                        <input type="hidden" name="id_sucursal" id="id_sucursal" class="form-control" required="">
                    </div>
        
                      <div class="col-sm-6">
                          <label for="descripcion">Descripción</label>
                          <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                      </div>		
                      <div class="col-sm-6">
                          <label for="direccion">Direccion</label>
                          <input type="text" name="direccion" id="direccion" class="form-control" required>
                      </div>
                </div>
                    </div>
                    <div class="modal-footer">
                        <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                        <button class="btn btn-success">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>