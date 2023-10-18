<!-- Modal -->
<!-- onsubmit es para recargar el campo y este en blanco-->
<form id="frmAgregarSucursal" method="POST" onsubmit="return agregarNuevaSucursal()">
    <div class="modal fade" id="modalAgregarSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Sucursal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="descripcion"> Nombre</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="direccion"> Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
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