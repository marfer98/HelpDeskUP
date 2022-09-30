$(document).ready(function(){
   $("#tablaReporteClienteLoad").load("reportesCliente/tablaReporteCliente.php");
});

function agregarNuevoReporte(){
    $.ajax({
        type: "POST",
        data: $('#frmNuevoReporte').serialize(),
        url:"../../procesos/reporteCliente/agregarNuevoReporte.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaReporteClienteLoad").load("reportesCliente/tablaReporteCliente.php");//recarga del formulario
                $('#modalCrearReportes').modal('hide');
                $('#frmNuevoReporte')[0].reset();//reiniciar el formulario de agregado 
                Swal.fire(":D","Agregado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR" + respuesta, "error"); //sweet aler 2
            }
        }
    });
    return false;
}
function eliminarReporteCliente(idReporte){//la funcion trae un id de reporte
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
                data: "idReporte=" + idReporte,//manda,os como dato el id del reporte que queremos eliminar 
                url: "../../procesos/reporteCliente/eliminarReporteCliente.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tablaReporteClienteLoad").load("reportesCliente/tablaReporteCliente.php");
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