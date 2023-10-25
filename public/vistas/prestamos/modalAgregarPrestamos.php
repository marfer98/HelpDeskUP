<form id="frmAgregarPrestamos" method="POST" onsubmit="return agregarPrestamos()">
    <div class="modal fade" id="modalAgregarPrestamos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo Prestamos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
    
                  <div class="col-sm-4">
                      <label for="id_articulo">Id articulo</label>
                      <input type="text" name="id_articulo" id="id_articulo" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="id_oficina_origen">Id oficina_origen</label>
                      <input type="text" name="id_oficina_origen" id="id_oficina_origen" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="nombre_oficina_origen">Nombre oficina_origen</label>
                      <input type="text" name="nombre_oficina_origen" id="nombre_oficina_origen" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="id_oficina_destino">Id oficina_destino</label>
                      <input type="text" name="id_oficina_destino" id="id_oficina_destino" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="nombre_oficina_destino">Nombre oficina_destino</label>
                      <input type="text" name="nombre_oficina_destino" id="nombre_oficina_destino" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="cantidad">Cantidad</label>
                      <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                  </div>		
                  <div class="col-sm-4">
                      <label for="estado">Estado</label>
                      <input type="text" name="estado" id="estado" class="form-control" required>
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
    
    <form id="frmActualizarPrestamos" method="POST" onsubmit="return actualizarPrestamos()">
        <div class="modal fade" id="modalActualizarPrestamos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Prestamos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 d-none" >
                                <label for="id_prestamo">id_prestamo</label>
                                <input type="hidden" name="id_prestamo" id="id_prestamo" class="form-control" required="">
                            </div>
                
                            <div class="col-sm-4">
                                <label for="id_articulo">Id articulo</label>
                                <input type="text" name="id_articulo" id="id_articulo" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="id_oficina_origen">Id oficina_origen</label>
                                <input type="text" name="id_oficina_origen" id="id_oficina_origen" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="nombre_oficina_origen">Nombre oficina_origen</label>
                                <input type="text" name="nombre_oficina_origen" id="nombre_oficina_origen" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="id_oficina_destino">Id oficina_destino</label>
                                <input type="text" name="id_oficina_destino" id="id_oficina_destino" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="nombre_oficina_destino">Nombre oficina_destino</label>
                                <input type="text" name="nombre_oficina_destino" id="nombre_oficina_destino" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                            </div>		
                            <div class="col-sm-4">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" required>
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