<!-- Modal -->
<!-- onsubmit es para recargar el campo y este en blanco-->
<form id="frmAgregarRecibido" method="POST" onsubmit="return agregarNuevaRecepcion()">
    <div class="modal fade" id="modalAgregarRecibido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Recepción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="idEquipo">Tipo de Equipo</label>
                    <?php
                        //$idUsuario = $_SESSION['usuario']['id'];//pasa el id usuario que inicio sesion 
                        $sql ="SELECT
                                    t_cat_equipos.id_equipo AS idEquipo,
                                    t_cat_equipos.nombre AS tipoEquipo
                              FROM
                                    t_cat_equipos";
                        $respuesta = mysqli_query ($conexion,$sql);
                    ?>
                    <select name="idEquipo" id="idEquipo" class="form-control" required>
                    <option value="">Seleciona un dispositivo</option>
                        <?php while ($mostrar = mysqli_fetch_array($respuesta)){?>
                            <option value="<?php echo $mostrar ['idEquipo'];?>"><?php echo $mostrar ['tipoEquipo']; ?></option>
                        <?php }?>
                    </select>

                    <label for="nombreEquipo"> Nombre Equipo</label>
                    <input type="text" class="form-control" id="nombreEquipo" name="nombreEquipo" required>

                    <label for="rotulado"> Rotulado</label>
                    <input type="text" class="form-control" id="rotulado" name="rotulado" required>

                    <label for="numeroSerie"> Numero de Serie/Service Tag</label>
                    <input type="text" class="form-control" id="numeroSerie" name="numeroSerie" required>

                    <label for="ciudad"> Ciudad</label>
                    <select name="ciudad" id="ciudad" class="form-control" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="San Lorenzo">San Lorenzo</option>
                        <option value="Lambare">Lambare</option>
                        <option value="J. Augusto Saldivar">J. Augusto Saldivar</option>
                    </select>
                    
                    <label for="procedencia"> Procedencia</label>
                    <select name="procedencia" id="procedencia" class="form-control" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="CONSEJO DE ADMINISTRACION - CENTRAL">CONSEJO DE ADMINISTRACION - CENTRAL</option>
                        <option value="TRIBUNAL DE APELACION PENAL ">TRIBUNAL DE APELACION PENAL </option>
                        <option value="TRIBUNAL DE LA NIÑEZ Y ADOLESCENCIA">TRIBUNAL DE LA NIÑEZ Y ADOLESCENCIA</option>
                        <option value="TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL PRIMERA SALA">TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL PRIMERA SALA</option>
                        <option value="TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL SEGUNDA SALA">TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL SEGUNDA SALA</option>
                        <option value="ADMINISTRACION">ADMINISTRACION</option>
                        <option value="CORREO">CORREO</option>
                        <option value="TESORERIA">TESORERIA</option>
                        <option value="PRESUPUESTO">PRESUPUESTO</option>
                        <option value="CONTABILIDAD">CONTABILIDAD</option>
                        <option value="PATRIMONIO Y SUMINISTRO">PATRIMONIO Y SUMINISTRO</option>
                        <option value="SUMINISTRO">SUMINISTRO</option>
                        <option value="SERVICIOS GENERALES">SERVICIOS GENERALES</option>
                        <option value="OBRA CIVIL">OBRA CIVIL</option>
                        <option value="UNIDAD OPERAT. DE CONTRATACIONES- U.O.C">UNIDAD OPERAT. DE CONTRATACIONES- U.O.C</option>
                        <option value="INFORMATICA">INFORMATICA</option>
                        <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                        <option value="CONTROL DE PERSONAL">CONTROL DE PERSONAL</option>
                        <option value="OFICINA DE INSPECTORIA">OFICINA DE INSPECTORIA</option>
                      
                    </select>

                    <label for="problema"> Problema</label>
                    <textarea type="text" class="form-control" id="problema" name="problema" required></textarea>
                    
                    <label for="recibido"> Recibido por</label>
                    <select name="recibido" id="recibido" class="form-control" required>
                        <option value="">Seleccione una opcion</option>
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

                    <label for="responsable"> Responsable</label>
                    <input type="text" class="form-control" id="responsable" name="responsable">

                   <label for="estado"> Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="1">Pendiente</option>
                        <option value="0">Entregado</option>
                        <option value="2">De Baja</option>
                    </select>

                    </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</form>