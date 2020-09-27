<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción Teléfono</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">   
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });

    </script>
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['cliente'])){

    }else{
        header("location: ./area-clientes.php");exit;
    }
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $pro = $fila['pro'];
            $banmi = $fila['banned'];
            $flashmi = $fila['flash'];
            $saldomi = $fila['saldo'];
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }

    require("./navbar.php");

    ?>
    <h2 align="center">&nbsp;Cambiar Plan&nbsp;</h2><hr>
<br>
<div class="row">
    <div class="col s4">
    <h5 align="center" style="color: #efb810">Ventajas del Miembro PRO <sup><i style="color: black;" class="fab fa-r-project"></i></sup></h5>
    <ul>
    <div style="border: 1px black solid; border-radius: 10px; padding: 10px;">
    <li><h6 align="center">Hasta 100.000€ de transferencia telefónica&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Comunicarse con otros clientes&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Comunicarse con el banco&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Transferencia por token Ilimitada sin intereses&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">No pagar intereses por las transacciones&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Preferente en cuanto a comunicación&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Seguridad Avanzada&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <br>
    <div align="center">
    <?php
    if($pro == '0'){
    ?> 
    <form action="./contrat-pro.php" method="post">
    <?php
    $fecha = date("d/m/Y H:i");
    ?>
    <button type="submit" id="smit4751" name="smit4751" style="background: #efb810; border-radius: 5px;" class="btn btn-large waves-effect waves-light">Contratar 199€</button>
    <input type="hidden" name="fechaso" id="fechaso" value="<?php echo $fecha ?>">
    </form>
    <?php
    }else{
?>
<a class="tooltipped" data-position="top" data-tooltip="¡Ya está contratado!">
    <button type="submit" style="background: #efb810; border-radius: 5px;" class="btn btn-large waves-effect waves-light red">Contratado</button>
   </a>

<?php
    }
   
    ?>
    </div>
    </div>

</ul>
    </div>

    <div class="col s4">
    <h5 align="center" style="color: #124b89;">Ventajas del Miembro Flash <sup><i style="color: black;"class="fas fa-bolt"></i></sup></h5>
    <ul>
    <div style="border: 1px black solid; border-radius: 10px; padding: 10px;">
    <li><h6 align="center">Transferencia Telefónica (Hasta 1.000€)&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Comunicarse con otros clientes&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Comunicarse con el banco&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Transferencia por token de hasta 10.000€&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">No pagar intereses por las transacciones (5%)&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Preferente en cuanto a comunicación&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Seguridad Avanzada&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <br>
    <div align="center">
    <?php
    if($flashmi == '0'){
    ?>
    <form action="./activar-flash.php">
    <button type="submit" style="background: #efb810; border-radius: 5px;" class="btn btn-large waves-effect waves-light red">Contratar - GRATIS</button>
    </form>
    <?php
    }else{
    ?>
     <a class="tooltipped" data-position="top" data-tooltip="¡Ya está contratado!">
    <button type="submit" style="background: #efb810; border-radius: 5px;" class="btn btn-large waves-effect waves-light red">Contratado</button>
   </a>
    <?php
    }
    ?>
    </div>
    </div>

</ul>
    </div>


    <div class="row">
    <div class="col s4">
    <h5 align="center">Ventajas del Cliente Básico <sup><i style="color: black;" class="fas fa-user"></i></sup></h5>
    <ul>
    <div style="border: 1px black solid; border-radius: 10px; padding: 10px;">
    <li><h6 align="center">Transferencia Telefónica&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Comunicarse con otros clientes&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Comunicarse con el banco&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">Transferencia por token de hasta 100€&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <li><h6 align="center">No pagar intereses por las transacciones (10%)&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Preferente en cuanto a comunicación&nbsp;&nbsp;<i style="color: red;"class="fas fa-times"></i></h6></li>
    <li><h6 align="center">Seguridad Avanzada&nbsp;&nbsp;<i style="color: green;" class="fas fa-check"></i></h6></li>
    <br>
    <div align="center">
    <form action="">
    </form>
    </div>
    </div>

</ul>
    </div>


    </div>
    <div class="container">
    <p class="salmonete"><i class="fas fa-2x fa-exclamation-circle"></i>&nbsp;Al contratar el miembro PRO se activa automáticamente el FLASH a la vez, es decir, tendrás activado el miembro flash y el miembro PRO</p>
   </div>

</body>
</html>