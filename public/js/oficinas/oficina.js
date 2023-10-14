$(document).ready(function(){//JQUERY
    $('#tablaOficinasLoad').load("oficinas/tablaOficina.php")//esa tabla esta en la vista de oficina 
});

function agregarNuevaOficina(){
    //alert ("oiko");//ver si funciona el js

    $.ajax({
        type: "POST",
        data: $('#frmAgregarOficina').serialize(),
        url:"../../procesos/usuarios/crud/agregarNuevaOficina.php",
        success:function(respuesta){
           // console.log(respuesta);
            respuesta = respuesta.trim();//trim para reiniciar el formulario
            if(respuesta == 1){
                $("#tablaOficinasLoad").load("oficinas/tablaOficina.php");//recarga del formulario 
                $('#frmAgregarOficina')[0].reset();//reiniciar el formulario de agregado 
                Swal.fire(":D","Agregado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL AGREGAR" + respuesta, "error"); //sweet aler 2
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