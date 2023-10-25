<?php  //validación de inicio de sesión
  include "header.php"; 
  if (isset ($_SESSION ['usuario']) && $_SESSION['usuario']['rol']== 1){ //LE AGREGUE OFICINA

    include "../../clases/Asignacion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    //TOQUE ACA PARA QUE ME MUESTRE LO DE LA OFICINA TOMANDO SU ID
    $idUsuario =  $_SESSION['usuario']['id'] ;
    $sql= "SELECT 
                oficina.id_oficina AS id_oficina
            FROM
                t_usuarios AS usuario
                    INNER JOIN
                t_oficina AS oficina ON usuario.id_oficina = oficina.id_oficina
                    AND usuario.id_usuario = '$idUsuario'";
        $respuesta = Conexion::select($sql);
        $id_oficina = $respuesta[0]['id_oficina'];

        $sql = " SELECT
                oficina.id_oficina AS id_oficina,
                oficina.nombre AS nombreOficina,
                equipo.id_equipo AS idEquipo,
                equipo.nombre AS nombreEquipo,
                asignacion.id_asignacion AS id_asignacion,
                a.nombreEquipoA AS nombreEquipoA,
                a.marca AS marca,
                a.modelo AS modelo,
                a.numeroSerie AS numeroSerie,
                a.descripcion AS descripcion,
                a.memoria AS memoria,
                a.disco_duro AS discoDuro,
                a.procesador AS procesador,
                equipo.descripcion AS imagen
            FROM
                t_asignacion AS asignacion
            INNER JOIN t_articulos AS a
            ON
                asignacion.id_articulo = a.id_articulo
            INNER JOIN t_oficina AS oficina
            ON
                asignacion.id_oficina = oficina.id_oficina
            INNER JOIN t_cat_equipos AS equipo
            ON
                a.id_equipo = equipo.id_equipo AND asignacion.id_oficina = '$id_oficina'";

        $respuesta = Conexion::select($sql);
  ?>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw_light">Mis Dispositivos</h1>
            <p class="lead">
                <div class="row">
                    <?php foreach($respuesta as $mostrar ){?>
                    <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body"> <!--muestra los equipos asignados-->
                            <h4>
                                <span class="<?php echo $mostrar ['imagen'];?>"></span> 
                                <?php echo $mostrar ['nombreEquipo']; ?> 
                            </h4>
                            <p><?php echo $mostrar ['descripcion']; ?></p>
                            <ul>
                                <li>Nombre del Equipo: <?php echo $mostrar ['nombreEquipoA'];?></li>
                                <li>Marca: <?php echo $mostrar ['marca'];?></li>
                                <li>Modelo: <?php echo $mostrar ['modelo'];?></li>
                                <li>Serie/Tag: <?php echo $mostrar ['numeroSerie'];?></li>
                                <li>Memoria: <?php echo $mostrar ['memoria'];?></li>
                                <li>Disco Duro: <?php echo $mostrar ['discoDuro'];?></li>
                                <li>Procesador: <?php echo $mostrar ['procesador'];?></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <?php } ?><!--fin del while-->
                </div>
            </p>
            <div style="height: 700px"></div>
        </div>
    </div>
</div>
<?php
include "footer.php"; 
?>  

<?php include "footer.php"; 
    }else{//FIN DEL IF
        header ("location:../index.html");
    }  
  ?>
