
<form id="frmAgregarProveedores" method="POST" onsubmit="return agregarProveedores()">
    <div class="modal fade" id="modalAgregarProveedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo Proveedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
    
                  <div class="col-sm-4">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="direccion">Dirección</label>
                      <input type="text" name="direccion" id="direccion" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="telefono">Teléfono</label>
                      <input type="text" name="telefono" id="telefono" class="form-control" required>
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
    
    <form id="frmActualizarProveedores" method="POST" onsubmit="return actualizarProveedores()">
        <div class="modal fade" id="modalActualizarProveedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Proveedores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-sm-4 d-none" >
                        <label for="id_proveedor">id_proveedor</label>
                        <input type="hidden" name="id_proveedor" id="id_proveedor" class="form-control" required="">
                    </div>
        
                      <div class="col-sm-4">
                          <label for="nombre">Nombre</label>
                          <input type="text" name="nombre" id="nombre" class="form-control" required>
                      </div>		
                      <div class="col-sm-4">
                          <label for="direccion">Dirección</label>
                          <input type="text" name="direccion" id="direccion" class="form-control" required>
                      </div>		
                      <div class="col-sm-4">
                          <label for="telefono">Teléfono</label>
                          <input type="text" name="telefono" id="telefono" class="form-control" required>
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
