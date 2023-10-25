//jquery
$(document).ready(function(){
    $("#tablaOficinaLoad").load("oficinas/tablaOficina.php");
});
function agregarOficina(){
  $.ajax({
      type: "POST",
      data: $('#frmAgregarOficina').serialize(),
      url:"../../procesos/oficina/agregarOficina.php",
      success:function(respuesta){
         // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaOficinaLoad").load("oficinas/tablaOficina.php");//recarga del formulario
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

function obtenerDatosOficina(id_oficina,elementoPadre='body'){
  // alert(id_oficina);
  $.ajax({
      type: "POST",
      data: "id_oficina=" + id_oficina,//mandar el id Oficina
      url: "../../procesos/oficina/obtenerDatosOficina.php",
      success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre+' #id_oficina').val(respuesta['id_oficina']);
            $(elementoPadre+' #nombre').val(respuesta['nombre']);		
            $(elementoPadre+' #telefono').val(respuesta['telefono']);		
            $(elementoPadre+' #correo').val(respuesta['correo']);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR);
          console.error(textStatus);
          console.error(errorThrown);
      }
  });
}

function actualizarOficina(){
  $.ajax({
      type: "POST",
      data: $('#frmActualizarOficina').serialize(),
      url: "../../procesos/oficina/actualizarOficina.php",
      success:function(respuesta){
          // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaOficinaLoad").load("oficina/tablaOficina.php");//recarga del formulario
              $('#modalActualizarOficina').modal('hide');
              Swal.fire(":D","Actualizado con EXITO","success");
          }else{
              Swal.fire(":(","ERROR AL ACTUALIZAR: " + respuesta, "error"); //sweet aler 2
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

function eliminarOficina(id_oficina){//la funcion trae un id de reporte
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
                data: "id_oficina=" + id_oficina,//manda,os como dato el id del reporte que queremos eliminar 
                url: "../../procesos/oficina/eliminarOficina.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tablaOficinaLoad").load("oficinas/tablaOficina.php");
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
    return false //para que no recargue la función 
  }