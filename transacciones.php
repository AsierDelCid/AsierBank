<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción Cliente</title>
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

    </script>
</head>
<body>
<?php
session_start(); 
if(isset($_SESSION['cliente'])){

}else{
    header("location: ../login/login.php");exit;
}
require("../conexion.php");
$dni = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $flash = $fila['flash'];
    }
}
if($banmi != 0){
    header("location: ./area-clientes.php");exit;
}
if($flash == 0){

}else{
    header("location: transaccion-flash.php");exit;
}
require("./navbar.php");
?>
    <div class="container">
    <h3 align="center">Transacciones inmediatas solo tiene un nombre: Asier Bank</h3><br>   
    <div class="row">
    <div class="col s6">
    <a href="./transaccion-token.php">
    <button class="btn waves-effect waves-light btn-block red">Realizar Transacción</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./activar-flash.php" class="modal-trigger">
    <button class="btn waves-effect waves-light btn-block red">Activar FlashPhone</button>
    </a>
    </div>
    </div><br>
    <div class="salmonete">
    <h5><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;Actualmente tienes limitadas las transacciones a Token de Cuenta si desea recibir y enviar dinero por teléfono <a href="./activar-flash.php" class="waves-effect" style="text-decoration: none; color: #3b83bd">activa FlashPhone</a></h5>
    </div><br><br>
    <div align="center">
    <a href="./panel.php">
    <button class="btn red fa-2x waves-effect waves-light">Regresar</button>
    </a>
    </div>
    </div>
    <?php

    ?>
</body>
</html>