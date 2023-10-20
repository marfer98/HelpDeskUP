<!-- Modal -->
<?php
require_once "../../../clases/Conexion.php";
?>
<form id="frmAgregarAdquisiciones" method="POST" onsubmit="return agregarAdquisiciones()">
    <div class="modal fade" id="modalAgregarAdquisiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo Adquisiciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Tipo de Equipo</label>
                            <?php //agarra el ID de la oficina 
                                $sql = "SELECT  id_equipo, nombre
                                FROM t_cat_equipos ORDER BY nombre";
                                $respuesta = Conexion::select($sql)
                            ?>
                            <select name="id_equipo" id="id_equipo" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <?php foreach($respuesta as $mostrar){?>
                                    <option value="<?php echo $mostrar['id_equipo'];?>"><?php echo $mostrar ['nombre'];?></option>
                                <?php }?><!-- Cierre del while -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Articulos</label>
                            <?php //agarra el ID de la oficina 
                                $sql = "SELECT  id_equipo, nombre
                                FROM t_cat_equipos ORDER BY nombre";
                                $respuesta = Conexion::select($sql)
                            ?>
                            <select name="id_articulo" id="id_articulo" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                <?php foreach($respuesta as $mostrar){?>
                                    <option value="<?php echo $mostrar['id_articulo'];?>"><?php echo $mostrar ['nombreEquipoA'];?></option>
                                <?php }?><!-- Cierre del while -->
                            </select>
                        </div>
                    </div>	
                    <div class="col-sm-4">
                        <label for="nombreEquipoA">NombreEquipoA</label>
                        <input type="text" name="nombreEquipoA" id="nombreEquipoA" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="id_proveedor">Id proveedor</label>
                        <input type="text" name="id_proveedor" id="id_proveedor" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="rotulado">Rotulado</label>
                        <input type="text" name="rotulado" id="rotulado" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="numeroSerie">NumeroSerie</label>
                        <input type="text" name="numeroSerie" id="numeroSerie" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="memoria">Memoria</label>
                        <input type="text" name="memoria" id="memoria" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="tipo_ram">Tipo ram</label>
                        <input type="text" name="tipo_ram" id="tipo_ram" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="disco_duro">Disco duro</label>
                        <input type="text" name="disco_duro" id="disco_duro" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="procesador">Procesador</label>
                        <input type="text" name="procesador" id="procesador" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="sistema_operativo">Sistema operativo</label>
                        <input type="text" name="sistema_operativo" id="sistema_operativo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                    <label>Articulos</label>
                        <?php //agarra el ID de la oficina 
                            $sql = "SELECT  id_proveedor, nombre
                            FROM t_proveedores ORDER BY nombre";
                            $respuesta = Conexion::select($sql)
                        ?>
                        <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            <?php foreach($respuesta as $mostrar){?>
                                <option value="<?php echo $mostrar['id_proveedor'];?>"><?php echo $mostrar ['id_proveedor'];?></option>
                            <?php }?><!-- Cierre del while -->
                        </select>
                    </div>		
                    <div class="col-sm-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" name="cantidad" id="cantidad" class="form-control" required>
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
    
<form id="frmActualizarAdquisiciones" method="POST" onsubmit="return actualizarAdquisiciones()">
    <div class="modal fade" id="modalActualizarAdquisiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Adquisiciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-4 d-none" >
                    <label for="id_adquisiciones">id_adquisiciones</label>
                    <input type="hidden" name="id_adquisiciones" id="id_adquisiciones" class="form-control" required="">
                </div>
    
                    <div class="col-sm-4">
                        <label for="id_articulo">Id articulo</label>
                        <input type="text" name="id_articulo" id="id_articulo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="nombreEquipoA">NombreEquipoA</label>
                        <input type="text" name="nombreEquipoA" id="nombreEquipoA" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="id_equipo">Id equipo</label>
                        <input type="text" name="id_equipo" id="id_equipo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="id_proveedor">Id proveedor</label>
                        <input type="text" name="id_proveedor" id="id_proveedor" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="rotulado">Rotulado</label>
                        <input type="text" name="rotulado" id="rotulado" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="numeroSerie">NumeroSerie</label>
                        <input type="text" name="numeroSerie" id="numeroSerie" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="memoria">Memoria</label>
                        <input type="text" name="memoria" id="memoria" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="tipo_ram">Tipo ram</label>
                        <input type="text" name="tipo_ram" id="tipo_ram" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="disco_duro">Disco duro</label>
                        <input type="text" name="disco_duro" id="disco_duro" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="procesador">Procesador</label>
                        <input type="text" name="procesador" id="procesador" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="sistema_operativo">Sistema operativo</label>
                        <input type="text" name="sistema_operativo" id="sistema_operativo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="nombre_equipo">Nombre equipo</label>
                        <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control" required>
                    </div>		
                    <div class="col-sm-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" name="cantidad" id="cantidad" class="form-control" required>
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
                            <select name="id_equipo" id="id_equipo" class="form-control" required>
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