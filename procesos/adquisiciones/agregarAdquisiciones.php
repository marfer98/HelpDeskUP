<?php
    // Insert Adquisiciones
    $datos = [
        'id_articulo' => $_POST['id_articulo'],
        'nombreEquipoA' => $_POST['nombreEquipoA'],
        'id_equipo' => $_POST['id_equipo'],
        'id_proveedor' => $_POST['id_proveedor'],
        'rotulado' => $_POST['rotulado'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'numeroSerie' => $_POST['numeroSerie'],
        'descripcion' => $_POST['descripcion'],
        'memoria' => $_POST['memoria'],
        'tipo_ram' => $_POST['tipo_ram'],
        'disco_duro' => $_POST['disco_duro'],
        'procesador' => $_POST['procesador'],
        'sistema_operativo' => $_POST['sistema_operativo'],
        'nombre_equipo' => $_POST['nombre_equipo'],
        'cantidad' => $_POST['cantidad']
    ];
    include "../../clases/Adquisiciones.php";
    $Adquisiciones = new Adquisiciones();
    echo $Adquisiciones->agregarAdquisiciones($datos);