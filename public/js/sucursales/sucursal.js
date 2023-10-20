//jquery
$(document).ready(function(){
    $("#tablaSucursalesLoad").load("sucursales/tablaSucursales.php");
});
function agregarSucursales(){
  $.ajax({
      type: "POST",
      data: $('#frmAgregarSucursales').serialize(),
      url:"../../procesos/sucursales/agregarSucursales.php",
      success:function(respuesta){
         // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaSucursalesLoad").load("sucursales/tablaSucursales.php");//recarga del formulario
              $('#frmAgregarSucursales')[0].reset();//reiniciar el formulario de agregado 
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

function obtenerDatosSucursales(id_sucursal){
// alert(id_sucursal);
  $.ajax({
      type: "POST",
      data: "id_sucursal=" + id_sucursal,//mandar el id Sucursales
      url: "../../procesos/sucursales/obtenerDatosSucursales.php",
      success:function(respuesta){
          respuesta= jQuery.parseJSON(respuesta);//envio de respuesta valida
          //console.log(respuesta);
          
            $('#descripcion').val(respuesta['descripcion']);		
            $('#direccion').val(respuesta['direccion']);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR);
          console.error(textStatus);
          console.error(errorThrown);
      }
  });
}

function actualizarSucursales(){
  $.ajax({
      type: "POST",
      data: $('#frmActualizarSucursales').serialize(),
      url: "../../procesos/sucursales/actualizarSucursales.php",
      success:function(respuesta){
          // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaSucursalesLoad").load("sucursales/tablaSucursales.php");//recarga del formulario
              $('#modalActualizarSucursales').modal('hide');
              Swal.fire(":D","Actualizado con EXITO","success");
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