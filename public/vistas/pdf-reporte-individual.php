
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/plantilla.css">
    <link rel="stylesheet" href="../datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../public/datatable/buttons.dataTables.min.css">

    <title>HelpDesk</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img//logoicono.ico" width="30%">
            </a>
        </div>
    </nav>
  
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Nro. Factura:       </div>
            </div>
            <div class="col-xs-2">
                <div id="numerofactura"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Autorizacion:       </div>
            </div>
            <div class="col-xs-5">
                <div id="numeroauto"></div>
            </div>
        </div>   
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Fecha Emision: </div>
            </div>
            <div class="col-xs-2">
                <div id="fechaemision"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">RUC Cliente:   </div>
            </div>
            <div class="col-xs-5">
                <div id="rucCliente"></div>
            </div>
        </div>  
       
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Telefono:      </div>
            </div>
            <div class="col-xs-2">
                <div id="telefono"></div>
            </div>            
            <div class="col-xs-2">
                <div class="titulo">Direccion:     </div>
            </div>
            <div class="col-xs-5">
                <div id="direccion"></div>
            </div>
        </div>          
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Nombres/Razon: </div>
            </div>
            <div class="col-xs-6">
                <div id="razon"></div>
            </div>
        </div>    
        
        <table class="table table-bordered">
        <thead>
          <tr>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;Codigo&nbsp;&nbsp;&nbsp;</h4></th>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Descripcion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;Cant.&nbsp;&nbsp;&nbsp;</h4></th>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;P.Unit.&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Dscto.&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
                <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td class="codigo"></td>
              <td class="descripcion"></td>
              <td class="cantidad izq"></td>
              <td class="precio izq"></td>
              <td class="descuento izq"></td>
              <td class="subtotal izq"></td>
          </tr>
        </tbody>
      </table>
        
        <div class="row">
            <div class="col-xs-8 titulopie">
                Debo y pagare incondicionalmente a la orden de _____ la cantidad de _________ en esra ciudad de Quito
                En  caso de  mora me  comprometo a  pagar el interes del _____ anual  desde su  vencimiento  hasta la 
                cancelacion  de  la  deuda. En  el evento de juicio me someto a los jueces de la ciudad de Quito y al 
                procedimiento  ejecutivo  o  verbal  sumario a eleccion de _____ sin protesto eximese de presentacion 
                para el pago y de aviso por falta del mismo. 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5 titulopie">
                QUITO, ______ DE ____________ DEL ______</div>
            <div class="col-xs-1"><img src="images/blanco.png"></div>
            <div class="col-xs-2">
                <img src="images/cliente.png">
            </div>
        </div>
    </div>
  </body>
</html>