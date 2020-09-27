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
        $promi = $fila['pro'];
    }
}
if($banmi != 0){
    header("location: ./area-clientes.php");exit;
}
if($flash == 1){

}else{
    header("location: ./transacciones.php");exit;
}
require("./navbar.php");
?>
    <div class="container">
    <h3 align="center">Transacciones inmediatas solo tiene un nombre: Asier Bank</h3><br>   
    <div class="row">
    <div class="col s6">
    <a href="./transaccion-token.php">
    <button class="btn waves-effect waves-light btn-block red">Transacción-> Token</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./transaccion-tel.php" class="modal-trigger">
    <button class="btn waves-effect waves-light btn-block red">Transacción-> Teléfono</button>
    </a>
    </div>
    </div><br>
<br><br>
    <div align="center">
    <a href="./panel.php">
    <button class="btn red fa-2x waves-effect waves-light">Regresar</button>
    </a>
    </div><br><br><br><br>

<?php
if($promi == '1'){
?>
<div class="row">
<div class="col s3"></div>
<div class="col s6">
<div style="border: 1px black solid; border-radius: 10px;">
<h4 align="center">&nbsp;P&nbsp;&nbsp;<em><i class="fab fa-r-project"></i></em>&nbsp;&nbsp;O</h4>
<p align="right"><a href="./des-pro.php" style="text-decoration: none;">¿Desactivar Plan PRO?&nbsp;&nbsp;</a></p>
<p align="right">Asier Bank Original&nbsp;&nbsp;</p>
</div>
</div>
</div>
<?php
}elseif($flash == '1'){
?>
<div class="row">
<div class="col s3"></div>
<div class="col s6">
<div style="border: 1px black solid; border-radius: 10px;">
<h4 align="center"><i class="fas fa-bolt"></i>&nbsp;Activado FlashPhone&nbsp;<i class="fas fa-bolt"></i></h4>
<p align="right"><a href="./desactivar-flash.php" style="text-decoration: none;">¿Desactivar FlashPhone?&nbsp;&nbsp;</a></p>
<p align="right">Asier Bank Original&nbsp;&nbsp;</p>
</div>
</div>
</div>

<?php
}else{exit;}
?>
    </div>
    <?php

    ?>
</body>
</html>