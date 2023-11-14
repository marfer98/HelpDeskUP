<!-- Modal -->
<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";
?>

<form id="frmActualizarAdquisiciones" method="POST" onsubmit="return actualizarAdquisiciones()">
    <div class="modal fade" id="modalActualizarAdquisiciones" tabindex="-1" role="dialog" aria-labelledby="frmActualizarAdquisiciones" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Adquisición de Equipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_adquisicion" id="id_adquisicion" class="form-control" required>
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
                                <label>Proveedor</label>
                                <?php //agarra el ID de la oficina 
                                    $sql = "SELECT  id_proveedor, nombre
                                    FROM t_proveedores ORDER BY nombre";
                                    $respuesta = Conexion::select($sql)
                                ?>
                                <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php foreach($respuesta as $mostrar){?>
                                        <option value="<?php echo $mostrar['id_proveedor'];?>"><?php echo $mostrar ['nombre'];?></option>
                                    <?php }?><!-- Cierre del while -->
                                </select>
                            </div>	
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Artículo</label>
                                <?php //agarra el ID del articulo
                                    $respuesta = Articulos::obtenerDatosArticulosParaSelect();
                                ?>
                                <select name="id_articulo" id="id_articulo" class="form-control" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                        foreach ($respuesta as $mostrar) {
                                            $posicion = strpos($mostrar['nombre'], '-');
                                            $categoria = substr($mostrar['nombre'], 0, $posicion);
                                            $articulo = substr($mostrar['nombre'], $posicion + 1);

                                            // Agrega el artículo al array de la categoría correspondiente
                                            $arrayCategoria[$categoria][] = [$mostrar['id_articulo'], $articulo];
                                        }

                                    // Itera sobre los arrays de categorías
                                    foreach ($arrayCategoria as $categoria => $articulos) {
                                        echo "<optgroup label='$categoria'>";
                                        foreach ($articulos as $articulo) {
                                            echo "<option value='".$articulo[0]."'>".$articulo[1]."</option>";
                                        }
                                        echo "</optgroup>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="nombreEquipoA">Nombre del equipo</label>
                                <input type="text" name="nombreEquipoA" id="nombreEquipoA" class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="rotulado">Rotulado</label>
                                <input type="text" name="rotulado" id="rotulado" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="numeroSerie">Número de Serie/Service Tag</label>
                                <input type="text" name="numeroSerie" id="numeroSerie" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcion">Descripción</label>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="procesador">Procesador</label>
                                <input type="text" name="procesador" id="procesador" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="sistema_operativo"> Sistema Operativo</label>
                                <select name="sistema_operativo" id="sistema_operativo" class="form-control">
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
                        <button class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="frmAgregarAdquisiciones" method="POST" onsubmit="return agregarAdquisiciones()">
    <div class="modal fade" id="modalAgregarAdquisiciones" tabindex="-1" role="dialog" aria-labelledby="frmAgregarAdquisiciones" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Adquisición de Equipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
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
                                <label>Proveedor</label>
                                <?php //agarra el ID de la oficina 
                                    $sql = "SELECT  id_proveedor, nombre
                                    FROM t_proveedores ORDER BY nombre";
                                    $respuesta = Conexion::select($sql)
                                ?>
                                <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php foreach($respuesta as $mostrar){?>
                                        <option value="<?php echo $mostrar['id_proveedor'];?>"><?php echo $mostrar ['nombre'];?></option>
                                    <?php }?><!-- Cierre del while -->
                                </select>
                            </div>	
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="nombreEquipoA">Nombre del equipo</label>
                                <input type="text" name="nombreEquipoA" id="nombreEquipoA" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="rotulado">Rotulado</label>
                                <input type="text" name="rotulado" id="rotulado" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="numeroSerie">Número de Serie/Service Tag</label>
                                <input type="text" name="numeroSerie" id="numeroSerie" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcion">Descripción</label>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="procesador">Procesador</label>
                                <input type="text" name="procesador" id="procesador" class="form-control">
                            </div>
                                <div class="col-sm-6">
                                    <label for="sistema_operativo"> Sistema Operativo</label>
                                    <select name="sistema_operativo" id="sistema_operativo" class="form-control">
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
                        <button class="btn btn-success">Adquirir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

