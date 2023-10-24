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
                        <div class="col-sm-12">
                            <label for="cantidad">Nombre Equipo</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
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

<form id="frmActualizarAsignacion" method="POST" onsubmit="return actualizarAsignacion()">
        <div class="modal fade" id="modalActualizarAsignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar Asignacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4 d-none" >
                                <label for="id_asignacion">id_asignacion</label>
                                <input type="hidden" name="id_asignacion" id="id_asignacion" class="form-control" required="">
                            </div>
                
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
                            <div class="col-sm-4">
                                <label for="cantidad">Nombre Equipo</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                            </div>	
                            <div class="col-sm-4">
                                <label for="nombreEquipoA">Nombre Equipo</label>
                                <input type="text" disabled name="nombreEquipoA" id="nombreEquipoA" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="rotulado">Rotulado</label>
                                <input type="text" disabled name="rotulado" id="rotulado" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="marca">Marca</label>
                                <input type="text" disabled name="marca" id="marca" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="modelo">Modelo</label>
                                <input type="text" disabled name="modelo" id="modelo" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="numeroSerie">NumeroSerie</label>
                                <input type="text" disabled name="numeroSerie" id="numeroSerie" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" disabled name="descripcion" id="descripcion" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="memoria">Memoria</label>
                                <input type="text" disabled name="memoria" id="memoria" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="tipo_ram">Tipo ram</label>
                                <input type="text" disabled name="tipo_ram" id="tipo_ram" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="disco_duro">Disco duro</label>
                                <input type="text" disabled name="disco_duro" id="disco_duro" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="procesador">Procesador</label>
                                <input type="text" disabled name="procesador" id="procesador" class="form-control" >
                            </div>		
                            <div class="col-sm-4">
                                <label for="sistema_operativo">Sistema operativo</label>
                                <input type="text" disabled name="sistema_operativo" id="sistema_operativo" class="form-control" >
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