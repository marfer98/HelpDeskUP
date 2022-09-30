<!-- Modal -->
<!-- onsubmit es para recargar el campo y este en blanco-->
<form id="frmAgregarOficina" method="POST" onsubmit="return agregarNuevaOficina()">
    <div class="modal fade" id="modalAgregarOficina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Oficina</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="nombreOficina"> Nombre</label>
                            <input type="text" class="form-control" id="nombreOficina" name="nombreOficina" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="telefonoOficina"> Telefono</label>
                            <input type="text" class="form-control" id="telefonoOficina" name="telefonoOficina" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="correoOficina"> Correo</label>
                            <input type="mail" class="form-control" id="correoOficina" name="correoOficina" required>
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