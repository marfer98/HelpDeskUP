
  //jquery
$(document).ready(function(){
    $("#tablaPrestamosLoad").load("prestamos/tablaPrestamos.php");
});
function agregarPrestamos(){
  $.ajax({
      type: "POST",
      data: $('#frmAgregarPrestamos').serialize(),
      url:"../../procesos/prestamos/agregarPrestamos.php",
      success:function(respuesta){
         // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaPrestamosLoad").load("prestamos/tablaPrestamos.php");//recarga del formulario
              $('#frmAgregarPrestamos')[0].reset();//reiniciar el formulario de agregado 
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

function obtenerDatosPrestamos(id_prestamo,elementoPadre='body'){
  // alert(id_prestamo);
  $.ajax({
      type: "POST",
      data: "id_prestamo=" + id_prestamo,//mandar el id Prestamos
      url: "../../procesos/prestamos/obtenerDatosPrestamos.php",
      success:function(respuesta){
          respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
          //console.log(respuesta);
          $(elementoPadre+' #id_prestamo').val(respuesta['id_prestamo']);
          
            $(elementoPadre+' #id_articulo').val(respuesta['id_articulo']);		
            $(elementoPadre+' #id_oficina_origen').val(respuesta['id_oficina_origen']);		
            $(elementoPadre+' #nombre_oficina_origen').val(respuesta['nombre_oficina_origen']);		
            $(elementoPadre+' #id_oficina_destino').val(respuesta['id_oficina_destino']);		
            $(elementoPadre+' #nombre_oficina_destino').val(respuesta['nombre_oficina_destino']);		
            $(elementoPadre+' #cantidad').val(respuesta['cantidad']);		
            $(elementoPadre+' #estado').val(respuesta['estado']);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR);
          console.error(textStatus);
          console.error(errorThrown);
      }
  });
}

function actualizarPrestamos(){
  $.ajax({
      type: "POST",
      data: $('#frmActualizarPrestamos').serialize(),
      url: "../../procesos/prestamos/actualizarPrestamos.php",
      success:function(respuesta){
          // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaPrestamosLoad").load("prestamos/tablaPrestamos.php");//recarga del formulario
              $('#modalActualizarPrestamos').modal('hide');
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

function eliminarPrestamos(id_prestamo){//la funcion trae un id de reporte
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
              data: "id_prestamo=" + id_prestamo,//manda,os como dato el id del reporte que queremos eliminar 
              url: "../../procesos/prestamos/eliminarPrestamos.php",
              success:function(respuesta){
                  //console.log(respuesta);
                  if (respuesta ==1){
                      $("#tablaPrestamosLoad").load("prestamos/tablaPrestamos.php");
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

function obtenerSelectPrestamos(elementoPadre,where = null){
    $.ajax({
        type: "POST",
        data: "where=" + where,//mandar el id Prestamos
        url: "../../procesos/prestamos/obtenerDatosPrestamos.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre+' #id_prestamo').val(respuesta['id_prestamo']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
}

