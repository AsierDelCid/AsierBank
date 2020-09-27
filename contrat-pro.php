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
$fecha = $_POST['fechaso'];
$dnimi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $pro = $fila['pro'];
        $flashmi = $fila['flash'];
        $saldomi = $fila['saldo'];
        $tokenmi = $fila['token'];
    }
}
require("./navbar.php");
if($banmi != 0){
    header("location: ./area-clientes.php");exit;
}
if($pro == '1'){
    echo '<h2 align="center">Ya tiene contratado el Plan PRO</h2>';
    echo '<div align="center"><h4><a href="des-pro.php">¿Desea desactivarlo?</a></h4></div>';
    ;exit;
}
if(isset($fecha)){

}else{
    echo 'Warning: Error 389395763';exit;
}
    $saldonew = $saldomi - 199;
    if($saldonew < 0){
        echo '<script> moremoney(); </script>';exit;
    }
    $sql = "UPDATE clientes SET saldo='$saldonew' WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){

    }else{
        echo 'Warning: Error 48474332';exit;
    }
    $sql = "INSERT INTO transacciones(dni, tokenre, cantidad, razon, fecha, tipo, tokenem) VALUES ('$dnimi','Asier Bank','199','Plan PRO-> Asier Bank','$fecha','PagoO','$tokenmi')";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){

    }else{
        echo 'Warning: Error 48474332';exit;
    }
    if($flashmi == '1'){
        $sql = "UPDATE clientes SET pro='1' WHERE dni LIKE '$dnimi'";
        $resultado = mysqli_query($conexion, $sql); 
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> contratado(); </script>';
            echo '<h3 align="center">Bienvenido al</h3><br>';
            echo '<h1 align="center">P<i class="fab fa-r-project fa-4x"></i>O</h1>';
        }else{
            echo 'Warning: Error 47389246';exit;
        }
    }else{
        $sql = "UPDATE clientes SET pro='1', flash='1' WHERE dni LIKE '$dnimi'";
        $resultado = mysqli_query($conexion, $sql); 
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> contratado(); </script>';
            echo ' <h3 align="center">Bienvenido al</h3><br>';
echo '<h1 align="center">P<i class="fab fa-r-project fa-4x"></i>O</h1>';
        }else{
            echo 'Warning: Error 47389246';exit;
        }
    }


?>
</body>
</html>