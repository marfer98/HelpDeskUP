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
function obtenerDatosUsuario(idUsuario){
  // alert(idUsuario);
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,//mandar el id usuario
        url: "../../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta);//envio de respuesta valida
            //console.log(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#nombreu').val(respuesta['nombreOficina']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#nombreUsuariou').val(respuesta['nombreUsuario']);
           // $('#idRolu').val(respuesta['id_rol']);
            $('#idRolu').val(respuesta['id_rol']);
            $('#ubicacionu').val(respuesta['ubicacion']);


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
                Swal.fire(":(","ERROR AL ACTUALIZAR" + respuesta, "error"); 
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