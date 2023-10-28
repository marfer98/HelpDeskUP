<form method="POST" id="frmNuevoReporte" onsubmit="return agregarNuevoReporte()">
    
<!-- Modal -->
<div class="modal fade" id="modalCrearReportes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <label for="idEquipo">Mis Dispositivos</label>

                <?php
                $idUsuario = $_SESSION['usuario']['id'];//pasa el id usuario que inicio sesion 
                    $sql="SELECT
                            asignacion.id_asignacion AS id_asignacion,
                            equipo.id_equipo AS idEquipo,
                            equipo.nombre AS nombreEquipo
                            
                        FROM
                            t_asignacion AS asignacion
                        INNER JOIN t_articulos AS a
                        ON
                            a.id_articulo = asignacion.id_articulo
                        INNER JOIN t_cat_equipos AS equipo
                        ON
                            a.id_equipo = equipo.id_equipo
                        WHERE
                            asignacion.id_oficina =(
                            SELECT
                                id_oficina
                            FROM
                                t_usuarios
                            WHERE
                                id_usuario = '$idUsuario ')";
                $respuesta = Conexion::select($sql);

               ?>
                
                <select name="idEquipo" id="idEquipo" class="form-control" required>
                    <option value="">Seleciona un dispositivo</option>
                    <?php foreach ($respuesta as $mostrar){?>
                        <option value="<?php echo $mostrar ['idEquipo'];?>"><?php echo $mostrar ['nombreEquipo']; ?></option>
                    <?php }?>
                </select>
                <label for="problema">Describe un problema</label>
                <textarea name="problema" id="problema" class="form-control" required></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-success">Crear Reporte</button>
            </div>
        </div>
    </div>
</div>
</form>