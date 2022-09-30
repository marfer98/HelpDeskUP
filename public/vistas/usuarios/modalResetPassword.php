<form id="frmActualizarPassword" onsubmit="return resetPassword()" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Resetear Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <!-- Este input sirva porque si no hay un ID no se puede hacer el UPDATE-->
                <input type="text" hidden id="idUsuarioReset" name="idUsuarioReset">
                <label for="">Escribe el password</label>
                <input type="text" 
                    id="passwordReset" 
                    name="passwordReset" 
                    class="form-control"
                    required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button  class="btn btn-success">Cambiar</button>
            </div>
            </div>
        </div>
    </div>
</form>