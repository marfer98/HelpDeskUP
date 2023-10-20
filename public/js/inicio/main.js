// Función para validar un formulario
function validar(form) {
  // Obtenemos todos los campos del formulario
  const fields = $(form).find("input, select, textarea");
  error = false

  // Iteramos por cada campo
  fields.each((i, field) => {
    // Si el campo es requerido
    if ($(field).attr("required")) {
      // Verificamos que tenga valor
      if (!field.value) {
        // Mostramos un mensaje de error
        $(field).addClass("is-invalid");
        error = true
        return false;
      }
    }

    // Verificamos el tipo de dato
    let type = $(field).attr("type");
    if (type === "email") {
      // Verificamos que sea una dirección de correo electrónico válida
      if (!/[a-zA-Z0-9@._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/.test(field.value)) {
        // Mostramos un mensaje de error
        $(field).addClass("is-invalid");
        error = true
        return false;
      }
    }
  });

  // Todos los campos son válidos
  console.log(error)
  eval($(form).attr('afterValidate'))();
  return false;
}

// Función para eliminar la palabra "return" y los paréntesis
function eliminarReturn(texto) {
    let returnRegex = /return\s+([a-zA-Z0-9]+)\((.*)\)/;
    let parensRegex = /\((.*)\)/;
    // Buscamos la palabra "return" y los paréntesis
    const matches = returnRegex.exec(texto);

    // Si encontramos una coincidencia
    if (matches) {
        // Eliminamos la coincidencia
        let resultado = texto.replace(matches[0], matches[1]);

        // Eliminamos los paréntesis
        resultado = resultado.replace(parensRegex, "");

        // Devolvemos el resultado
        return resultado;
    }

    // Si no encontramos una coincidencia
    return texto;
}

window.onload = (event) => {
  // Obtenemos todos los formularios de la página
  const formularios = document.querySelectorAll("form");

  // Recorremos los formularios
  for (const formulario of formularios) {
    // Obtenemos la función de envío del formulario
    const funcion = formulario.getAttribute("onsubmit");

    // Actualizamos la función de envío del formulario
    formulario.setAttribute("onsubmit", `return validar('#${formulario.id}')`);

    // Agregamos la función de validación después del envío
    formulario.setAttribute("afterValidate", eliminarReturn(funcion), "");
  }
};

const toCamelCase = (snakeCaseString) => {
  return snakeCaseString
     .split('_')
     .map((word) => word[0].toUpperCase() + word.substring(1))
     .join('');
};
 
function generarJS(tabla, campos) {
  // Obtenemos los datos de la tabla
  const nombreTabla = tabla.replace("t_", "");
  const nombreTablaCamel = toCamelCase(nombreTabla)
  const camposTitulo = convertirSnakeCaseAMayusculas(campos)
  console.info(nombreTablaCamel+'.js')
  // Generamos la tabla HTML
  const tablaHTML = `
  //jquery
  $(document).ready(function(){
      $("#tabla${nombreTablaCamel}Load").load("${nombreTablaCamel}/tabla${nombreTablaCamel}.php");
  });
  function agregar${nombreTablaCamel}(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregar${nombreTablaCamel}').serialize(),
        url:"../../procesos/${nombreTablaCamel}/agregar${nombreTablaCamel}.php",
        success:function(respuesta){
           // console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tabla${nombreTablaCamel}Load").load("${nombreTablaCamel}/tabla${nombreTablaCamel}.php");//recarga del formulario
                $('#frmAgregar${nombreTablaCamel}')[0].reset();//reiniciar el formulario de agregado 
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
  
  function obtenerDatos${nombreTablaCamel}(id_${nombreTabla},elementoPadre='body'){
    // alert(id_${nombreTabla});
    $.ajax({
        type: "POST",
        data: "id_${nombreTabla}=" + id_${nombreTabla},//mandar el id ${nombreTablaCamel}
        url: "../../procesos/${nombreTablaCamel}/obtenerDatos${nombreTablaCamel}.php",
        success:function(respuesta){
            respuesta= jQuery.parseJSON(respuesta)[0];//envio de respuesta valida
            //console.log(respuesta);
            $(elementoPadre+' #id_${nombreTabla}').val(respuesta['id_${nombreTabla}']);
            ${campos.map(campo => `
              $(elementoPadre+' #${campo}').val(respuesta['${campo}']);`).join("\t\t") 
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            console.error(textStatus);
            console.error(errorThrown);
        }
    });
  }
  
  function actualizar${nombreTablaCamel}(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizar${nombreTablaCamel}').serialize(),
        url: "../../procesos/${nombreTablaCamel}/actualizar${nombreTablaCamel}.php",
        success:function(respuesta){
            // console.log(respuesta);
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $("#tabla${nombreTablaCamel}Load").load("${nombreTablaCamel}/tabla${nombreTablaCamel}.php");//recarga del formulario
                $('#modalActualizar${nombreTablaCamel}').modal('hide');
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
  
  function eliminar${nombreTablaCamel}(id_${nombreTabla}){//la funcion trae un id de reporte
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
                data: "id_${nombreTabla}=" + id_${nombreTabla},//manda,os como dato el id del reporte que queremos eliminar 
                url: "../../procesos/${nombreTablaCamel}/eliminar${nombreTablaCamel}.php",
                success:function(respuesta){
                    //console.log(respuesta);
                    if (respuesta ==1){
                        $("#tabla${nombreTablaCamel}Load").load("${nombreTablaCamel}/tabla${nombreTablaCamel}.php");
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
  `

  console.log(tablaHTML); 
}

 function convertirSnakeCaseAMayusculas(array) {
    return array.map((valor) => {
      // Convertimos el valor a mayúsculas en el primer caracter
      const valorMayusculas = valor.charAt(0).toUpperCase() + valor.slice(1);

      // Reemplazamos los guiones bajos por espacios
      return valorMayusculas.replace("_", " ");
    });
}
 
 function generarTablaHTML(tabla, campos) {
   // Obtenemos los datos de la tabla
   const nombreTabla = tabla.replace("t_", "");
   const nombreTablaCamel = toCamelCase(nombreTabla)
   const camposTitulo = convertirSnakeCaseAMayusculas(campos)
   console.info('tabla'+nombreTablaCamel+'.php')
   // Generamos la tabla HTML
   const tablaHTML = `
      <?php
        require_once "../../../clases/${nombreTablaCamel}.php";
      
        $respuesta = ${nombreTablaCamel}::obtenerDatos${nombreTablaCamel}();
      ?>
     <table class="table table-sm table-bordered dt-responsive nowrap" id="tabla${nombreTablaCamel}DataTable" style="width:100%">
       <thead>
         <th>${camposTitulo.join("</th>\n\t\t<th>")}</th>
         <th>Editar</th>
         <th>Eliminar</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
                <td><?php echo $mostrar['${campos.join("']; ?></td>\n\t\t\t  <td><?php echo $mostrar['")}']; ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" 
                        data-target="#modalActualizar${nombreTablaCamel}" 
                        onclick= "obtenerDatos${nombreTablaCamel}(<?php echo $mostrar ['id_${nombreTablaCamel}']?>,'#modalActualizar${nombreTablaCamel}')"> 
                        <i class=" fas fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm"
                    onclick= "eliminar${nombreTablaCamel}(<?php echo $mostrar ['id_${nombreTablaCamel}']?>)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
           </tr>
         <?php } ?>
       </tbody>
     </table>
   `;
 
   console.log(tablaHTML); 
}
 
 function generarModalAgregar(tabla, campos) {
    const nombreTabla = tabla.replace("t_", "");
    const nombreTablaCamel = toCamelCase(nombreTabla)
    const camposTitulo = convertirSnakeCaseAMayusculas(campos)
    console.info('modalAgregar'+nombreTablaCamel+'.php')
    let html = `
    <form id="frmAgregar${nombreTablaCamel}" method="POST" onsubmit="return agregar${nombreTablaCamel}()">
    <div class="modal fade" id="modalAgregar${nombreTablaCamel}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Agregar Nuevo ${nombreTablaCamel}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
    `
    i=0
    html += campos.map(campo => `
                  <div class="col-sm-4">
                      <label for="${campo}">${camposTitulo[i++]}</label>
                      <input type="text" name="${campo}" id="${campo}" class="form-control" required>
                  </div>`).join("\t\t") 

    html += `\n\t\t\t</div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</form>
    `
    // form Actualizar
    html += `
    <form id="frmActualizar${nombreTablaCamel}" method="POST" onsubmit="return actualizar${nombreTablaCamel}()">
        <div class="modal fade" id="modalActualizar${nombreTablaCamel}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Editar ${nombreTablaCamel}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-sm-4 d-none" >
                        <label for="id_${nombreTabla}">id_${nombreTabla}</label>
                        <input type="hidden" name="id_${nombreTabla}" id="id_${nombreTabla}" class="form-control" required="">
                    </div>
        `
        i=0
        html += campos.map(campo => `
                      <div class="col-sm-4">
                          <label for="${campo}">${camposTitulo[i++]}</label>
                          <input type="text" name="${campo}" id="${campo}" class="form-control" required>
                      </div>`).join("\t\t") 

        html += `\n\t\t\t</div>
                    </div>
                    <div class="modal-footer">
                        <span class="btn btn-danger" data-dismiss="modal">Cerrar</span>
                        <button class="btn btn-success">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `
   // Devolvemos las tres funciones
     console.log(html); 
}
 
 function generarFunciones(tabla, campos) {
   // Obtenemos el nombre de la tabla en camelCase
   const nombreTabla = tabla.replace("t_", "");
   const nombreTablaCamel = toCamelCase(nombreTabla)
   
   // Generamos la consulta SELECT
   const consultaSelect = `
   public static function obtenerDatos${nombreTablaCamel}($where=null){
       $sql = '
       SELECT \n\t\t\tid_${nombreTabla},\n\t\t\t${campos.join(",\n\t\t\t")}
       FROM ${tabla}
       '.$where;
       return Conexion::select($sql); 
   }`;
   // Generamos la función SELECT
   const obtenerDatos = () => {
     return consultaSelect;
   };
   // Generamos la consulta INSERT
   const consultaInsert = `
   public static function agregar${nombreTablaCamel}($datos){
       $sql = '
       INSERT INTO ${tabla} (
           ${campos.join(", \n\t\t\t  ")}
       ) VALUES (
           ${campos.map(campo => ":" + campo).join(", \n\t\t\t  ")}
       )';
       $datos = [
         ${campos.map(campo => "':"+ campo +"' => $datos['" + campo+"']").join(",\n\t\t")}
       ];
       return Conexion::execute($sql,$datos);
   }`;
   // Generamos la función INSERT
   const agregar = () => {
     return consultaInsert;
   };
   // Generamos la consulta UPDATE
   const consultaUpdate = `
   public static function actualizar${nombreTablaCamel}($datos){
       $sql = '
       UPDATE ${tabla} 
       SET 
         ${campos.map(campo => campo + " = :" + campo).join(",\n\t\t")} 
       WHERE id_${nombreTabla} = :id_${nombreTabla}';
       $datos = [
         ${campos.map(campo => "':"+ campo +"' => $datos['" + campo+"']").join(",\n\t\t")},
         ':id_${nombreTabla}' => $datos['id_${nombreTabla}']
       ];
       return Conexion::execute($sql,$datos);
   }`;
   // Generamos la función UPDATE
   const actualizar = () => {
     return consultaUpdate;
   };
   const consultaDelete = `
   public static function eliminar${nombreTablaCamel}($id){
        $sql = '
        DELETE FROM ${nombreTabla}
        WHERE id_${nombreTabla} = :id_${nombreTabla}';
        $datos = [
         ':id_${nombreTabla}' => $id['id_${nombreTabla}']
        ];
        return Conexion::execute($sql,$datos);
    }`;
  // Generamos la función DELETE
  const eliminar = () => {
   return consultaDelete;
  };

  generarModalAgregar(tabla, campos)

  generarTablaHTML(tabla, campos)

  generarJS(tabla, campos)

  generarProcesos(tabla,campos)

  // Devolvemos las tres funciones
  console.log(obtenerDatos() +'\n' + agregar()+'\n' +actualizar()+'\n' +eliminar());

  return {
    obtenerDatos,
    agregar,
    actualizar,
      eliminar, 
  };
}
 
function generarProcesos(tabla,campos){
  const nombreTabla = tabla.replace("t_", "");
  const nombreTablaCamel = toCamelCase(nombreTabla)
  const camposTitulo = convertirSnakeCaseAMayusculas(campos)
  console.info('obtener'+nombreTablaCamel+'.php')
  console.info('actualizar'+nombreTablaCamel+'.php')
  console.info('agregar'+nombreTablaCamel+'.php')
  console.info('eliminar'+nombreTablaCamel+'.php')
  let php = `
    <?php
      // Obtener ${nombreTablaCamel}
      $id_${nombreTabla} = $_POST['id_${nombreTabla}'];
      include "../../clases/${nombreTablaCamel}.php";
      $where = "WHERE id_${nombreTabla} = $id_${nombreTabla}";
      echo json_encode(${nombreTablaCamel}::obtenerDatos${nombreTablaCamel}($where));
      `
  
  php += ` 
    <?php
      // Update ${nombreTablaCamel}
      $datos = [
        ${campos.map(campo => "'"+ campo +"' => $_POST['" + campo+"']").join(",\n\t\t")},
        'id_${nombreTabla}' => $datos['id_${nombreTabla}']       
      ];

      include "../../clases/${nombreTablaCamel}.php";
      echo ${nombreTablaCamel}::actualizar${nombreTablaCamel}($datos);
  `
  php += `
    <?php
      // Insert ${nombreTablaCamel}
      $datos = [
        ${campos.map(campo => "'"+ campo +"' => $_POST['" + campo+"']").join(",\n\t\t")}
      ];
      include "../../clases/${nombreTablaCamel}.php";
      $${nombreTablaCamel} = new ${nombreTablaCamel}();
      echo $${nombreTablaCamel}->agregar${nombreTablaCamel}($datos);
  `
  php += ` 
    <?php
      // Delete ${nombreTablaCamel}
      $datos = [
        'id_${nombreTabla} ' => $_POST['id_${nombreTabla}']
      ];

      include "../../clases/${nombreTablaCamel}.php";
      echo ${nombreTablaCamel}::eliminar${nombreTablaCamel}($datos);
  `
  echo(php)
}

// Ejemplo de uso
const funciones = generarFunciones("t_adquisiciones", [
  "id_articulo", 
  'id_proveedor',
  'cantidad'
]);
 
 
 