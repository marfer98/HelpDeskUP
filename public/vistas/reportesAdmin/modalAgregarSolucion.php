<form id="frmAgregarSolucionReporte"  method="POST" onsubmit="return agregarSolucionReporte()" enctype="multipart/form-data">
 <!-- Modal -->


    <div class="modal fade" id="modalAgregarSolucionReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escribe la solucion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id ="idReporte" name="idReporte" hidden>
                    <label for="solucion">Descripción de la solución</label>
                    <textarea name="solucion" id="solucion" required class="form-control"></textarea>
                    <label for="estatus">Estatus</label>
                    <select name="estatus" id="estatus" class ="form-control">
                        <option value="1">Abierto</option>
                        <option value="0">Cerrado</option>
                    </select>
                    <label for="usuarioTecnico">Tecnico</label>
                    <select name="usuarioTecnico" id="usuarioTecnico" class="form-control">
                        <option value="">Seleccione una opción</option>
                        <option value="Elsidia Caballero">Elsidia Caballero</option>
                        <option value="Gaspar Sosa">Gaspar Sosa</option>
                        <option value="Leonardo Villasanti">Leonardo Villasanti</option>
                        <option value="Marcos Fernández">Marcos Fernández</option>
                        <option value="Estela Humada">Estela Humada</option>
                        <option value="Mathias Alvarez">Mathias Alvarez</option>
                        <option value="Ernesto Barrios">Ernesto Barrios</option>
                        <option value="Rodrigo Invernizzi">Rodrigo Invernizzi</option>
                        <option value="José Ricardo">José Ricardo</option>
                        <option value="Nicolas Acosta">Nicolas Acosta</option>
                    </select>
                    <div class="col-12 p-0">
                        <label for="formFile" class="form-label">Foto de la solución</label>
                        <input class="form-control" type="file" name="imagen_solucion" id="imagen_solucion" accept="image/jpeg, image/png">
                        <span class="text-danger">* El tamaño máximo de la imagen es de 2 MB.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>