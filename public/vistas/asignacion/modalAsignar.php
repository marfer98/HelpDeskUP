<!-- Modal -->
<form id="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()">
    <div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nombre de Oficina</label>
                            <?php //agarra el ID de la oficina 
                                $sql = "SELECT id_oficina, nombre
                                FROM t_oficina ORDER BY nombre";
                                $respuesta = Conexion::select($sql)
                            ?>

                            <select name="idOficina" id="idOficina" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <?php foreach($respuesta as $mostrar){?>
                                    <option value="<?php echo $mostrar['id_oficina'];?>"><?php echo $mostrar ['nombre'];?></option>
                                    <?php }?><!-- Cierre del while -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Tipo de Equipo</label>
                            <?php //agarra el ID de la oficina 
                                $sql = "SELECT  id_equipo, nombre
                                FROM t_cat_equipos ORDER BY nombre";
                                $respuesta = Conexion::select($sql)
                            ?>
                            <select name="idEquipo" id="idEquipo" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <?php foreach($respuesta as $mostrar){?>
                                    <option value="<?php echo $mostrar['id_equipo'];?>"><?php echo $mostrar ['nombre'];?></option>
                                    <?php }?><!-- Cierre del while -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nombreEquipoA">Nombre del equipo</label>
                            <input type="text" name="nombreEquipoA" id="nombreEquipoA" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="rotulado">Rotulado</label>
                            <input type="text" name="rotulado" id="rotulado" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="marca">Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="modelo">Modelo</label>
                            <input type="text" name="modelo" id="modelo" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="numeroSerie">Numero de Serie/Service Tag</label>
                            <input type="text" name="numeroSerie" id="numeroSerie" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="memoria">Memoria</label>
                            <input type="text" name="memoria" id="memoria" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="tipoRam">Tipo de Ram</label>
                            <input type="text" name="tipoRam" id="tipoRam" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="discoDuro">Disco Duro</label>
                            <input type="text" name="discoDuro" id="discoDuro" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="procesador">Procesador</label>
                            <input type="text" name="procesador" id="procesador" class="form-control">
                        </div>
                            <div class="col-sm-4">
                                <label for="sistemaOperativo"> Sistema Operativo</label>
                                <select name="sistemaOperativo" id="sistemaOperativo" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Windows XP 32 bits">Windows XP 32 bits</option>
                                    <option value="Windows XP 64 bits">Windows XP 64 bits</option>
                                    <option value="Windows 7 32 bits">Windows 7 32 bits</option>
                                    <option value="Windows 7 64 bits">Windows 7 64 bits</option>
                                    <option value="Windows 8 32 bits">Windows 8 32 bits</option>
                                    <option value="Windows 8 64 bits">Windows 8 64 bits</option>
                                    <option value="Windows 10 32 bits">Windows 10 32 bits</option>
                                    <option value="Windows 10 64 bits">Windows 10 64 bits</option>
                                </select>
                            </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Asignar</button>
                    </div>
                </div>
            </div>
        </div>
</form>