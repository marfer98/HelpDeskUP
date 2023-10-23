<!-- Modal -->
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once "../../clases/Conexion.php";

?>

<form id="frmActualizarAdquisiciones_" method="POST" onsubmit="return actualizarAdquisiciones()">
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
                                <label>Articulo</label>
                                <?php //agarra el ID de la oficina 
                                    $sql = "SELECT  id_articulo, CONCAT_WS('',
                                        CASE
                                            WHEN nombre IS NOT NULL THEN CONCAT(nombre,' - ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN nombreEquipoA IS NOT NULL THEN CONCAT(nombreEquipoA,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN rotulado IS NOT NULL THEN CONCAT(rotulado,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN marca IS NOT NULL THEN CONCAT(marca,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN modelo IS NOT NULL THEN CONCAT(modelo,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN numeroSerie IS NOT NULL THEN CONCAT(numeroSerie,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN memoria IS NOT NULL THEN CONCAT(memoria,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN tipo_ram IS NOT NULL THEN CONCAT(tipo_ram,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN disco_duro IS NOT NULL THEN CONCAT(disco_duro,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN procesador IS NOT NULL THEN CONCAT(procesador,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN sistema_operativo IS NOT NULL THEN CONCAT(sistema_operativo,' ')
                                            ELSE ''
                                        END
                                    ) AS nombre
                                    FROM t_articulos a
                                    JOIN t_cat_equipos e ON e.id_equipo = a.id_equipo
                                    ORDER BY nombre";
                                    $respuesta = Conexion::select($sql)
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
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control">
                            </div>
                            <div class="col-sm-6">
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
                        <button class="btn btn-success">Asignar</button>
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
                                <label>Articulo</label>
                                <?php //agarra el ID de la oficina 
                                    $sql = "SELECT  id_articulo, CONCAT_WS('',
                                        CASE
                                            WHEN nombre IS NOT NULL THEN CONCAT(nombre,' - ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN nombreEquipoA IS NOT NULL THEN CONCAT(nombreEquipoA,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN rotulado IS NOT NULL THEN CONCAT(rotulado,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN marca IS NOT NULL THEN CONCAT(marca,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN modelo IS NOT NULL THEN CONCAT(modelo,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN numeroSerie IS NOT NULL THEN CONCAT(numeroSerie,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN memoria IS NOT NULL THEN CONCAT(memoria,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN tipo_ram IS NOT NULL THEN CONCAT(tipo_ram,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN disco_duro IS NOT NULL THEN CONCAT(disco_duro,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN procesador IS NOT NULL THEN CONCAT(procesador,' ')
                                            ELSE ''
                                        END,
                                        CASE
                                            WHEN sistema_operativo IS NOT NULL THEN CONCAT(sistema_operativo,' ')
                                            ELSE ''
                                        END
                                    ) AS nombre
                                    FROM t_articulos a
                                    JOIN t_cat_equipos e ON e.id_equipo = a.id_equipo
                                    ORDER BY nombre";
                                    $respuesta = Conexion::select($sql)
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
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control">
                            </div>
                            <div class="col-sm-6">
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
                        <button class="btn btn-success">Asignar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

