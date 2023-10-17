$(function() {
    console.log('Se ha cargado funcion');
    $('#tablaSucursalesLoad').load("sucursales/tablaSucursal.php")//esa tabla esta en la vista de sucursal 
});

function agregarNuevaSucursal(){
    //alert ("oiko");//ver si funciona el js

    $.ajax({
        type: "POST",
        data: $('#frmAgregarSucursal').serialize(),
        url:"../../procesos/usuarios/crud/agregarNuevaSucursal.php",
        success:function(respuesta){
           // console.log(respuesta);
            respuesta = respuesta.trim();//trim para reiniciar el formulario
            if(respuesta == 1){
                $("#tablaSucursalesLoad").load("sucursales/tablaSucursal.php");//recarga del formulario 
                $('#frmAgregarSucursal')[0].reset();//reiniciar el formulario de agregado 
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