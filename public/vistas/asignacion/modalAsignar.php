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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Asignar</button>
                    </div>
                </div>
            </div>
        </div>
</form>