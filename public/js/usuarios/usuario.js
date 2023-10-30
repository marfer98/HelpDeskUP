//jquery
$(document).ready(function(){
    $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
});


function agregarNuevoUsuario(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url:"../../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
           // console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");//recarga del formulario
                $('#frmAgregarUsuario')[0].reset();//reiniciar el formulario de agregado 
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

function obtenerDatosUsuario(idUsuario,elementoPadre='body'){
  // alert(idUsuario);
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,//mandar el id usuario
        url: "../../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta);//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre + ' #idUsuario').val(respuesta['idUsuario']);
            $(elementoPadre + ' #nombre').val(respuesta['nombreOficina']);
            $(elementoPadre + ' #telefono').val(respuesta['telefono']);
            $(elementoPadre + ' #correo').val(respuesta['correo']);
            $(elementoPadre + ' #nombreUsuariou').val(respuesta['nombreUsuario']);
            $(elementoPadre + ' #id_oficina').val(respuesta['id_oficina']);
            $(elementoPadre + ' #idRol').val(respuesta['id_rol']);
            $(elementoPadre + ' #ubicacionu').val(respuesta['ubicacion']);
            $(elementoPadre + ' #prioridad').val(respuesta['prioridad']);
            
            obtenerDatosOficina(respuesta['id_oficina'],'#frmActualizarUsuario')

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
}

function actualizarUsuario(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../../procesos/usuarios/crud/actualizarUsuario.php",
        success:function(respuesta){
            // console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");//recarga del formulario
                $('#modalActualizarUsuarios').modal('hide');
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

function agregarIdUsuarioReset(idUsuario){
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword(){
    $.ajax({
        type: "POST",
        data:$('#frmActualizarPassword').serialize(),
        url:"../../procesos/usuarios/extras/resetPassword.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta);
            if(respuesta == 1){
                $('#modalResetPassword').modal('hide');
                Swal.fire(":D","Actualizado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL ACTUALIZAR: " + respuesta, "error"); 
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

function cambioEstatusUsuario(idUsuario, estatus){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../../procesos/usuarios/extras/cambioEstatus.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                Swal.fire(":D","Cambio de estado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL CAMBIAR ESTADO" + respuesta, "error"); 
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }  
    });
}

function eliminarUsuarios(id_usuario){//la funcion trae un id de reporte
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
                data: "id_usuario=" + id_usuario,//manda,os como dato el id del reporte que queremos eliminar
                url: "../../procesos/usuarios/crud/eliminarUsuarios.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
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



function cambioRolUsuario(idUsuario, rol){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&rol=" + rol,
        url: "../../procesos/usuarios/extras/cambioRol.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                Swal.fire(":D","Cambio de estado con EXITO","success");
            }else{
                Swal.fire(":(","ERROR AL CAMBIAR ESTADO" + respuesta, "error");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
}

$('#frmActualizarUsuario #id_oficina').on('change', function(e,o) {
    // Ejecutar la función JavaScript.
   let id_oficina = ($(e.currentTarget).find('option:selected').val())

   obtenerDatosOficina(id_oficina,'#frmActualizarUsuario')
});