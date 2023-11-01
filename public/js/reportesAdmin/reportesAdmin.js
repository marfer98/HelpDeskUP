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
                        Swal.fire(":(","Error al Eliminar: " + respuesta,"error");
        
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
    return false; //para que no recargue la función 
}

//funcion para que al dar clic abra la modal pero tambien nos tiene que traer el reporte de solucion que ya tenia o que tiene en ese momento
// y mostrar si no tiene no pasa nada 
function obtenerDatosSolucion(idReporte){
    $.ajax({
        type: "POST",
        data: "idReporte=" + idReporte,
        url:"../../procesos/reportesAdmin/obtenerSolucion.php",
        success:function(respuesta){
           //console.log(respuesta);
           respuesta = jQuery.parseJSON(respuesta);
           //console.log(respuesta['idReporte']);
           $('#idReporte').val(respuesta['idReporte']);
           $('#solucion').val(respuesta['solucion']); //referencia del archivo Reportes.php del array de la funcion obtenerSolucion         
           $('#usuarioTecnico').val(respuesta['usuarioTecnico']);
           $('#estatus').val(respuesta['estatus']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
}
function agregarSolucionReporte(){

    //const imagen = convertirBlob('imagen_solucion');//document.querySelector('#imagen_solucion').files[0];

    $.ajax({
        type: "POST",
        data: $('#frmAgregarSolucionReporte').serialize(),//+'&imagen_solucion_blob='+imagen,//new FormData(document.getElementById("frmAgregarSolucionReporte")),
        url:"../../procesos/reportesAdmin/actualizarSolucion.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();//quita los espacios
            if(respuesta == 1){
                Swal.fire(":D","Agregado con EXITO","success");
                $('#modalAgregarSolucion').modal('hide');
                $("#tablaReporteAdminLoad").load("reportesAdmin/tablaReportesAdmin.php");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR: " + respuesta, "error"); //sweet aler 2
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

function convertirBlob(id = "imagen_solucion") {
    const input = document.getElementById(id);
    let file = input.files[0];
  
    // Encode the file using the FileReader API
    const reader = new FileReader();
    prueaba = reader.onloadend = () => {
        // Get the dataURL
        const dataURL = reader.result;

        // Convert the dataURL to a string
        const string = dataURL;
        echo(string)

        $('#imagen_solucion_blob').html('puta')
        $('#imagen_solucion_blob').val(string)
        // Return the string
        return string;
    };
    return prueaba;
}

function toogleFormGrid(){
    dev_dom_class_toogle('contenedor-grid','d-none','d-block')
    dev_dom_class_toogle('contenedor-form','d-none','d-block')
}

function obtenerSoluciones(){
    $.ajax({
        type: "POST",
        data: $('#frmFiltrarSolucionReporte').serialize(),
        url:"./reportesAdmin/tablaReportesAdmin.php",
        success:function(respuesta){
            //console.log(respuesta);
            //respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta['idReporte']);
            $("#tablaReporteAdminLoad").html(respuesta)
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
    return false;
}