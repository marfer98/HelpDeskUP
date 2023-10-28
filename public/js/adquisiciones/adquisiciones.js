 //jquery
$(document).ready(function(){
    $("#tablaAdquisicionesLoad").load("adquisiciones/tablaAdquisiciones.php");
});

function agregarAdquisiciones(){
  $.ajax({
      type: "POST",
      data: $('#frmAgregarAdquisiciones').serialize(),
      url:"../../procesos/adquisiciones/agregarAdquisiciones.php",
      success:function(respuesta){
         // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaAdquisicionesLoad").load("adquisiciones/tablaAdquisiciones.php");//recarga del formulario
              $('#frmAgregarAdquisiciones')[0].reset();//reiniciar el formulario de agregado 
              Swal.fire(":D","Agregado con EXITO","success");
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

function obtenerDatosAdquisiciones(id_adquisicion,elementoPadre='body'){
  // alert(id_adquisicion);
  $.ajax({
      type: "POST",
      data: "id_adquisicion=" + id_adquisicion,//mandar el id Adquisiciones
      url: "../../procesos/adquisiciones/obtenerDatosAdquisiciones.php",
      success:function(respuesta){
          respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
          //console.log(respuesta);
          $(elementoPadre+' #id_adquisicion').val(respuesta['id_adquisicion']);
          
            $(elementoPadre+' #id_articulo').val(respuesta['id_articulo']);		
            $(elementoPadre+' #nombreEquipoA').val(respuesta['nombreEquipoA']);		
            $(elementoPadre+' #id_equipo').val(respuesta['id_equipo']);		
            $(elementoPadre+' #id_proveedor').val(respuesta['id_proveedor']);		
            $(elementoPadre+' #rotulado').val(respuesta['rotulado']);		
            $(elementoPadre+' #marca').val(respuesta['marca']);		
            $(elementoPadre+' #modelo').val(respuesta['modelo']);		
            $(elementoPadre+' #numeroSerie').val(respuesta['numeroSerie']);		
            $(elementoPadre+' #descripcion').val(respuesta['descripcion']);		
            $(elementoPadre+' #memoria').val(respuesta['memoria']);		
            $(elementoPadre+' #tipo_ram').val(respuesta['tipo_ram']);		
            $(elementoPadre+' #disco_duro').val(respuesta['disco_duro']);		
            $(elementoPadre+' #procesador').val(respuesta['procesador']);		
            $(elementoPadre+' #sistema_operativo').val(respuesta['sistema_operativo']);		
            $(elementoPadre+' #nombre_equipo').val(respuesta['nombre_equipo']);		
            $(elementoPadre+' #cantidad').val(respuesta['cantidad']);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR);
          console.error(textStatus);
          console.error(errorThrown);
      }
  });
}

function actualizarAdquisiciones(){
  $.ajax({
      type: "POST",
      data: $('#frmActualizarAdquisiciones').serialize(),
      url: "../../procesos/adquisiciones/actualizarAdquisiciones.php",
      success:function(respuesta){
          // console.log(respuesta);
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $("#tablaAdquisicionesLoad").load("adquisiciones/tablaAdquisiciones.php");//recarga del formulario
              $('#modalActualizarAdquisiciones').modal('hide');
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

function eliminarAdquisiciones(id_adquisicion){//la funcion trae un id de reporte
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
              data: "id_adquisicion=" + id_adquisicion,//manda,os como dato el id del reporte que queremos eliminar 
              url: "../../procesos/adquisiciones/eliminarAdquisiciones.php",
              success:function(respuesta){
                  //console.log(respuesta);
                  if (respuesta ==1){
                      $("#tablaAdquisicionesLoad").load("adquisiciones/tablaAdquisiciones.php");
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