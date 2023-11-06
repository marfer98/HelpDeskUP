
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
    

    $.ajax({
        type: "POST",
        data: "id_prestamo=" + id_prestamo,//mandar el id Prestamos
        url: "../../procesos/prestamos/obtenerDatosPrestamos.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            //Listar solo la misma oficina
            obtenerSelectHtml('#frmActualizarPrestamos','#id_oficina_origen','oficina','id_oficina','nombre','Oficinas','WHERE id_oficina = '+respuesta['id_oficina_origen'])
            //Listar todo menos la misma oficina
            obtenerSelectHtml('#frmActualizarPrestamos','#id_oficina_destino','oficina','id_oficina','nombre','Oficinas','WHERE id_oficina != '+respuesta['id_oficina_origen'])
            //Listar solo articulos que están en una oficina
            obtenerSelectHtml('#frmActualizarPrestamos','#id_articulo','articulos','id_articulo','nombre','Articulos','WHERE asg.cantidad > 0 AND asg.id_oficina = '+respuesta['id_oficina_origen'])

            setTimeout(function(){
                $(elementoPadre+' #id_prestamo').val(respuesta['id_prestamo']);
                $(elementoPadre+' #id_articulo').val(respuesta['id_articulo']);		
                $(elementoPadre+' #id_oficina_origen').val(respuesta['id_oficina_origen']);		
                $(elementoPadre+' #nombre_oficina_origen').val(respuesta['nombre_oficina_origen']);		
                $(elementoPadre+' #id_oficina_destino').val(respuesta['id_oficina_destino']);		
                $(elementoPadre+' #nombre_oficina_destino').val(respuesta['nombre_oficina_destino']);		
                $(elementoPadre+' #cantidad').val(respuesta['cantidad']);		
                $(elementoPadre+' #estado').val(respuesta['estado'] != 2 ? respuesta['estado'] : null);
            }, 1500);
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

function descargarInformePDF(id){
    window.open('http://helpdeskup.unaux.com/public/vistas/prestamos/pdf-prestamos-individual.php?id_prestamo='+id,'Imprmir informe','width=600,height=800,left=50,top=50,toolbar=yes');
}

$('select#id_oficina_origen').on('change', function(e,o) {
    // Ejecutar la función JavaScript.
   let id_oficina = ($(e.currentTarget).find('option:selected').val())

   //Listar todo menos la misma oficina
   obtenerSelectHtml('#frmAgregarPrestamos','#id_oficina_destino','oficina','id_oficina','nombre','Oficinas','WHERE id_oficina != '+id_oficina)
   //Listar solo articulos que están en una oficina
   obtenerSelectHtml('#frmAgregarPrestamos','#id_articulo','articulos','id_articulo','nombre','Articulos','WHERE asg.cantidad > 0 AND asg.id_oficina = '+id_oficina)

});