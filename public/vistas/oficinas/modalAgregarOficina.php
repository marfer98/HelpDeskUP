<!-- Modal -->
<!-- onsubmit es para recargar el campo y este en blanco--><form id="frmAgregarOficina" method="POST" onsubmit="return agregarOficina()">
    <div class="modal fade" id="modalAgregarOficina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo Oficina</h5>
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
                      <label for="telefono">Telefono</label>
                      <input type="text" name="telefono" id="telefono" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="correo">Correo</label>
                      <input type="text" name="correo" id="correo" class="form-control" required>
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
    
    <form id="frmActualizarOficina" method="POST" onsubmit="return actualizarOficina()">
        <div class="modal fade" id="modalActualizarOficina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Oficina</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-sm-4 d-none" >
                        <label for="id_oficina">id_oficina</label>
                        <input type="hidden" name="id_oficina" id="id_oficina" class="form-control" required="">
                    </div>
        
                      <div class="col-sm-4">
                          <label for="nombre">Nombre</label>
                          <input type="text" name="nombre" id="nombre" class="form-control" required>
                      </div>		
                      <div class="col-sm-4">
                          <label for="telefono">Telefono</label>
                          <input type="text" name="telefono" id="telefono" class="form-control" required>
                      </div>		
                      <div class="col-sm-4">
                          <label for="correo">Correo</label>
                          <input type="text" name="correo" id="correo" class="form-control" required>
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