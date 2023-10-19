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
  eval($('form').attr('afterValidate'))();
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
  var funcion = $('form').attr('onsubmit')
  $('form').attr('onsubmit',`return validar('#${$('form').attr('id')}')`)
  $('form').attr('afterValidate',eliminarReturn(funcion),'')
  var funcion = $('form').attr('onsubmit')
  console.log(eliminarReturn(funcion))
};

const toCamelCase = (snakeCaseString) => {
  return snakeCaseString
     .split('_')
     .map((word) => word[0].toUpperCase() + word.substring(1))
     .join('');
 };
 
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
   // Generamos la tabla HTML
   const tablaHTML = `
     <table class="table table-sm table-bordered dt-responsive nowrap" id="tabla${nombreTablaCamel}DataTable" style="width:100%">
       <thead>
         <th>${camposTitulo.join("</th>\n\t\t<th>")}</th>
       </thead>
       <tbody>
         <?php foreach ($respuesta as $mostrar) { ?>
           <tr>
             <?php foreach ($mostrar as $valor) { ?>
               <td><?php echo $valor['${campos.join("']; ?></td>\n\t\t\t  <td><?php echo $valor['")}']; ?></td>
             <?php } ?>
           </tr>
         <?php } ?>
       </tbody>
     </table>
   `;
 
   console.log(tablaHTML); 
 }
 
 function generarHtml(tabla, campos) {
    campos = campos.map(campo => `
     <div class="col-sm-4">
         <label for="${campo}">Nombre del equipo</label>
         <input type="text" name="${campo}" id="${campo}" class="form-control">
     </div>`).join("\t\t") 
   // Devolvemos las tres funciones
     console.log(campos); 
 }
 
 function generarFunciones(tabla, campos) {
   // Obtenemos el nombre de la tabla en camelCase
   const nombreTabla = tabla.replace("t_", "");
   const nombreTablaCamel = toCamelCase(nombreTabla)
   // Generamos la consulta SELECT
   const consultaSelect = `
   public function obtenerDatos${nombreTablaCamel}($where=null){
       $sql = '
       SELECT \n\t\t${campos.join(",\n\t\t")}
       FROM ${nombreTabla}
       '.$where;
       return Conexion::select($sql); 
   }`;
   // Generamos la función SELECT
   const obtenerDatos = () => {
     return consultaSelect;
   };
   // Generamos la consulta INSERT
   const consultaInsert = `
   public function agregarNuevo${nombreTablaCamel}($datos){
       $sql = '
       INSERT INTO ${nombreTabla} (
           ${campos.join(", \n\t\t  ")}
       ) VALUES (
           ${campos.map(campo => ":" + campo).join(", \n\t\t  ")}
       )';
       $datos = [
         ${campos.map(campo => "':"+ campo +"' => $datos['" + campo+"']").join(",\n\t\t")}
       ];
       return Conexion::execute($sql,$datos);
   }`;
   // Generamos la función INSERT
   const agregarNuevo = () => {
     return consultaInsert;
   };
   // Generamos la consulta UPDATE
   const consultaUpdate = `
   public function actualizar${nombreTablaCamel}($datos){
       $sql = '
       UPDATE ${nombreTabla} 
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
   public function eliminar${nombreTablaCamel}($id){
        $sql = '
        DELETE FROM ${nombreTabla}
        WHERE id_${nombreTabla} = :id_${nombreTabla}';
        $datos = [
         ':id_${nombreTabla}' => $id
        ];
        return Conexion::execute($sql,$datos);
    }`;
  // Generamos la función DELETE
  const eliminar = () => {
   return consultaDelete;
  };
 
     generarHtml(tabla, campos)
 
     generarTablaHTML(tabla, campos)
     
   // Devolvemos las tres funciones
     console.log(obtenerDatos() +'\n' + agregarNuevo()+'\n' +actualizar()+'\n' +eliminar()); // UPDATE usuarios SET id_rol = :id_rol, id_oficina = :id_oficina, usuario = :usuario, nombre = :nombre, password = :password, ubicacion = :ubicacion, activo = :activo WHERE id = :id
   return {
     obtenerDatos,
     agregarNuevo,
     actualizar,
        eliminar, 
   };
 }
 
// Ejemplo de uso
const funciones = generarFunciones("t_adquisiciones", [
  "id_articulo", 
  'id_proveedor',
  'cantidad'
]);
 
 
 