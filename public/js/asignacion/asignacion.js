$(document).ready(function(){//JQUERY
    $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php")//esa tabla esta en la vista de oficina 
});

function asignarEquipo(){
    //alert ("oiko");
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../../procesos/asignacion/asignar.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta ==1){
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php")
                Swal.fire(":D","Asignado con exito","success");

            }else{
                Swal.fire(":(","Error al asignar: " + respuesta,"error");

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
    return false //para que no recargue la función 
}

function obtenerDatosAsignacion(id_asignacion,elementoPadre='body'){
    // alert(id_asignacion);
    $.ajax({
        type: "POST",
        data: "id_asignacion=" + id_asignacion,//mandar el id Asignacion
        url: "../../procesos/asignacion/obtenerDatosAsignacion.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre+' #id_asignacion').val(respuesta['id_asignacion']);
            
              $(elementoPadre+' #id_oficina').val(respuesta['id_oficina']);		
              $(elementoPadre+' #nombre_oficina').val(respuesta['nombre_oficina']);		
              $(elementoPadre+' #id_articulo').val(respuesta['id_articulo']);	
              $(elementoPadre+' #id_articulo_text').val(respuesta['nombreEquipoA']);
              $(elementoPadre+' #nombreEquipoA').val(respuesta['nombreEquipoA']);		
              $(elementoPadre+' #rotulado').val(respuesta['rotulado']);		
              $(elementoPadre+' #marca').val(respuesta['marca']);		
              $(elementoPadre+' #modelo').val(respuesta['modelo']);		
              $(elementoPadre+' #numeroSerie').val(respuesta['numeroSerie']);		
              $(elementoPadre+' #descripcion').val(respuesta['descripcion']);		
              $(elementoPadre+' #memoria').val(respuesta['memoria']);		
              $(elementoPadre+' #tipo_ram').val(respuesta['tipo_ram']);		
              $(elementoPadre+' #disco_duro').val(respuesta['disco_duro']);		
              $(elementoPadre+' #procesador').val(respuesta['procesador']);		
              $(elementoPadre+' #sistema_operativo').val(respuesta['sistema_operativo']);
              $(elementoPadre+' #cantidad').val(respuesta['cantidad']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
  }

function actualizarAsignacion(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarAsignacion').serialize(),
        url: "../../procesos/asignacion/actualizarAsignacion.php",
        success:function(respuesta){
            // console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php");//recarga del formulario
                $('#modalActualizarAsignacion').modal('hide');
                Swal.fire(":D","Actualizado con EXITO","success");
                $('#modalActualizarAsignacion').modal('hide'); // Práctica xd
            }else{
                Swal.fire(":(","ERROR AL ACTUALIZAR" + respuesta, "error"); //sweet aler 2
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
    return false;
  }

//Funcion para eliminar la asignacion
function eliminarAsignacion(id_asignacion){ //sweetalert con confirmación 
    Swal.fire({
        title: '¿Estas seguro de eliminar?',
        text: "Una vez eliminado no podrá ser recuperado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "id_asignacion=" + id_asignacion,//manda,os como dato el id de la asignacion que queremos eliminar 
                url: "../../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php")
                        Swal.fire(":D","Eliminado con exito","success");
                    }else{
                        Swal.fire(":(","Error al Eliminar" + respuesta,"error");
        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(jqXHR);
                    console.error(textStatus);
                    console.error(errorThrown);
                }
            });
        }
      })
    return false //para que no recargue la función 
}

