$(document).ready(function(){//JQUERY
    $('#tablaAdquisicionesLoad').load("adquisicion/tablaAdquisicion.php")//esa tabla esta en la vista de oficina 
});

function asignarEquipo(){
    //alert ("oiko");
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../../procesos/adquisicion/asignar.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta ==1){
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAdquisicionesLoad').load("adquisicion/tablaAdquisicion.php")
                Swal.fire(":D","Asignado con exito","success");

            }else{
                Swal.fire(":(","Error al asignar" + respuesta,"error");

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

//Funcion para eliminar la adquisicion
function eliminarAdquisicion(idAdquisicion){ //sweetalert con confirmación 
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
                data: "idAdquisicion=" + idAdquisicion,//manda,os como dato el id de la adquisicion que queremos eliminar 
                url: "../../procesos/adquisicion/eliminarAdquisicion.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $('#tablaAdquisicionesLoad').load("adquisicion/tablaAdquisicion.php")
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

