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
                Swal.fire(":(","Error al asignar" + respuesta,"error");

            }
        }
    });
    return false //para que no recargue la función 
}

//Funcion para eliminar la asignacion
function eliminarAsignacion(idAsignacion){ //sweetalert con confirmación 
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
                data: "idAsignacion=" + idAsignacion,//manda,os como dato el id de la asignacion que queremos eliminar 
                url: "../../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php")
                        Swal.fire(":D","Eliminado con exito","success");
                    }else{
                        Swal.fire(":(","Error al Eliminar" + respuesta,"error");
        
                    }
                }
            });
        }
      })
    return false //para que no recargue la función 
}

