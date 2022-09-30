function loginUsuario(){
    $.ajax ({
        type: "POST",
        data: $('#frmLogin').serialize(), //fomulario de login en index html
        url: "../procesos/usuarios/login/loginUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim(); //para que no devuelva con espacio
            if (respuesta == 1){
                window.location.href="vistas/inicio.php";

            }else{
                Swal.fire(":(","ERROR AL INGRESAR " + respuesta, "error"); //sweet aler 2
            }
        }
    });
    return false;

}