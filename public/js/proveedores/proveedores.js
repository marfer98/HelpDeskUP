//jquery
$(document).ready(function(){
    $("#tablaProveedoresLoad").load("proveedores/tablaProveedores.php");
});
function agregarProveedores(){
  $.ajax({
      type: "POST",
      data: $('#frmAgregarProveedores').serialize(),
      url:"../../procesos/proveedores/agregarProveedores.php",
      success:function(respuesta){
         // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaProveedoresLoad").load("proveedores/tablaProveedores.php");//recarga del formulario
              $('#frmAgregarProveedores')[0].reset();//reiniciar el formulario de agregado 
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

function obtenerDatosProveedores(id_proveedor,elementoPadre='body'){
// alert(id_proveedor);
  $.ajax({
      type: "POST",
      data: "id_proveedor=" + id_proveedor,//mandar el id Proveedores
      url: "../../procesos/proveedores/obtenerDatosProveedores.php",
      success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre+' #id_proveedor').val(respuesta['id_proveedor']);		
            $(elementoPadre+' #nombre').val(respuesta['nombre']);		
            $(elementoPadre+' #direccion').val(respuesta['direccion']);		
            $(elementoPadre+' #telefono').val(respuesta['telefono']);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR);
          console.error(textStatus);
          console.error(errorThrown);
      }
  });
}

function actualizarProveedores(){
  $.ajax({
      type: "POST",
      data: $('#frmActualizarProveedores').serialize(),
      url: "../../procesos/proveedores/actualizarProveedores.php",
      success:function(respuesta){
          // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaProveedoresLoad").load("proveedores/tablaProveedores.php");//recarga del formulario
              $('#modalActualizarProveedores').modal('hide');
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

function eliminarProveedores(id_proveedor){//la funcion trae un id de reporte
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
                data: "id_proveedor=" + id_proveedor,//manda,os como dato el id del reporte que queremos eliminar 
                url: "../../procesos/proveedores/eliminarProveedores.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tablaProveedoresLoad").load("proveedores/tablaProveedores.php");
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
  