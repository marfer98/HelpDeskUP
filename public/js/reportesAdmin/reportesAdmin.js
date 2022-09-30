$(document).ready(function(){
    $("#tablaReporteAdminLoad").load("reportesAdmin/tablaReportesAdmin.php");
 });
 function eliminarReporteAdmin(idReporte){//la funcion trae un id de reporte
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
                        $("#tablaReporteAdminLoad").load("reportesAdmin/tablaReportesAdmin.php");
                        Swal.fire(":D","Eliminado con exito","success");
        
                    }else{
                        Swal.fire(":(","Error al Eliminar" + respuesta,"error");
        
                    }
                }
            });
        }
      })
    return false; //para que no recargue la función 
}

//funcion para que al dar clic abra la modal pero tambien nos tiene que traer el reporte de solucion que ya tenia o que tiene en ese momento
// y mostrar si no tiene no pasa nada 
function obtenerDatosSolucion(idReporte){
    $.ajax({
        type: "POST",
        data: "idReporte=" + idReporte,
        url:"../../procesos/reportesAdmin/obtenerSalucion.php",
        success:function(respuesta){
           //console.log(respuesta);
           respuesta = jQuery.parseJSON(respuesta);
           //console.log(respuesta['idReporte']);
           $('#idReporte').val(respuesta['idReporte']);
           $('#solucion').val(respuesta['solucion']); //referencia del archivo Reportes.php del array de la funcion obtenerSolucion         
           $('#usuarioTecnico').val(respuesta['usuarioTecnico']);
           $('#estatus').val(respuesta['estatus']);
        }
    });
}
function agregarSolucionReporte(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarSolucionReporte').serialize(),
        url:"../../procesos/reportesAdmin/actualizarSolucion.php",
     /*   error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                console.log('Not connect.\n Verify Network.'); 
            } else if (jqXHR.status == 404) {
                console.log('Requested page not found. [404]'); 
            } else if (jqXHR.status == 500) {
                console.log('Internal Server Error [500].');  
            } else if (exception === 'parsererror') {
                console.log( 'Requested JSON parse failed.'); 
            } else if (exception === 'timeout') {
                console.log( 'Time out error.'); 
            } else if (exception === 'abort') {
                console.log('Ajax request aborted.');  
            } else {
                console.log('Uncaught Error.\n' + jqXHR.responseText); 
            }
        },*/
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();//quita los espacios
            if(respuesta == 1){
                Swal.fire(":D","Agregado con EXITO","success");
                $('#modalAgregarSolucion').modal('hide');
                $("#tablaReporteAdminLoad").load("reportesAdmin/tablaReportesAdmin.php");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR" + respuesta, "error"); //sweet aler 2
            }

        }
    });
    return false;
}