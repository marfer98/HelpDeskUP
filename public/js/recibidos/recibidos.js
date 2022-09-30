//jquery
$(document).ready(function(){
    $("#tablaRecibidosLoad").load("recibidos/tablaRecibidos.php");
});

function agregarNuevaRecepcion(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarRecibido').serialize(),
        url:"../../procesos/recepcion/crud/agregarNuevaRecepcion.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaRecibidosLoad").load("recibidos/tablaRecibidos.php");//recarga del formulario
                $('#frmAgregarRecibido')[0].reset();//reiniciar el formulario de agregado 
                Swal.fire(":D","Agregado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR" + respuesta, "error"); //sweet aler 2
            }
        }
    });
    return false;
}


function eliminarRecibido(idRecepcion){//la funcion trae un id de reporte
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
                data: "idRecepcion=" + idRecepcion,//manda,os como dato el id del reporte que queremos eliminar 
                url: "../../procesos/recepcion/crud/eliminarRecibido.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tablaRecibidosLoad").load("recibidos/tablaRecibidos.php");
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
function obtenerDatosRecebido(idRecepcion){
  //  alert(idRecepcion);
    $.ajax({
        type: "POST",
        data: "idRecepcion=" + idRecepcion,
        url:"../../procesos/recepcion/crud/obtenerDatosRecepcion.php",
        success:function(respuesta){
           console.log(respuesta);
           respuesta = jQuery.parseJSON(respuesta);
           console.log(respuesta['idRecepcion']);
           //referencia de la clase Recibidos.php del array de la funcion obtenerSolucion         
           $('#idRecepcion').val(respuesta['idRecepcion']);
           $('#solucion').val(respuesta['solucion']);
           $('#fechaEntrega').val(respuesta['fechaEntrega']);
           $('#estado').val(respuesta['estado']); 
           $('#tecnico').val(respuesta['tecnico']); 
           $('#informeTecnico').val(respuesta['informeTecnico']); 
        }
    });
}
 function actualizarRecepcion(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarRecibido').serialize(),
        url:"../../procesos/recepcion/crud/actualizarRecibido.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();//quita los espacios
            if(respuesta == 1){
                Swal.fire(":D","Agregado con EXITO","success");
                $("#tablaRecibidosLoad").load("recibidos/tablaRecibidos.php");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR" + respuesta, "error"); //sweet aler 2
            }

        }
    });
    return false;
 }
