<!-- Modal -->
<!-- onsubmit es para recargar el campo y este en blanco-->
<form id="frmActualizarRecibido" method="POST" onsubmit="return actualizarRecepcion()">
    <div class="modal fade" id="modalActualizarRecibido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Recepción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="text" id ="idRecepcion" name="idRecepcion" hidden>

                    <label for="descripcionSolucion"> Solución</label>
                    <textarea type="text" class="form-control" id="descripcionSolucion" name="descripcionSolucion" required></textarea>

                    <label for="fechaEntrega"> Fecha de Entrega</label>
                    <input type="text" class="form-control" id="fechaEntrega" name="fechaEntrega">

                    <label for="estado"> Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <option value="1">Pendiente</option>
                        <option value="0">Entregado</option>
                        <option value="2">De Baja</option>
                    </select>

                    <label for="tecnico">Nombre Técnico</label>
                    <select name="tecnico" id="tecnico" class="form-control" required>
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

                    <label for="informeTecnico"> Informe Técnico</label>
                    <textarea type="text" class="form-control" id="informeTecnico" name="informeTecnico" ></textarea>
                    
                </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</form>