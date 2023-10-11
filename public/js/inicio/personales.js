function datosPersonalesInicio(idUsuario){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url:"../../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
           // console.log(respuesta);
            respuesta = jQuery.parseJSON(respuesta);
            $('#nombre').text(respuesta['nombreUsuario']);
            $('#telefono').text(respuesta['telefono']);
            $('#correo').text(respuesta['correo']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
}