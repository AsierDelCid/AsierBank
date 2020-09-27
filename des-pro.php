<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desactivar PRO</title>
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
    header("location: ./area-clientes.php");
}
require("../conexion.php");
$dnimi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $promi = $fila['pro'];
        $banmi = $fila['banned'];
        $saldomi = $fila['saldo'];
        $tokenmi = $fila['token'];
    }
}else{
    echo 'Warning: Error 444748567';exit;
}
if($banmi != 0){
    header("location: ./area-clientes.php");exit;
}
if($promi == '0'){
    header("location: ./area-clientes.php");exit;
}
?>
<div class="container">
    <h3 align="center">¿Estas seguro que deseas desactivarlo?&nbsp;<sup><i class="fab fa-r-project"></i></sup></h3>
    <div align="right"><span>Solo se te devolverá el 50% (99€)</span></div><br><br>
    <div class="row">
    <div class="col s6">
    <form action="./area-clientes.php" method="post">
    <button type="submit" class="btn btn-large waves-effect waves-light blue btn-block">No, gracias</button>
    </form>
    </div>
    <div class="col s6">
    <form action="" method="post">
    <button type="submit" id="smit4765" name="smit4765" class="btn btn-large waves-effect waves-light blue btn-block">Si, quiero desactivarla</button>
    </form>
    </div>
    </div>


    <br><br>

    <h1 align="center">P<i class="fab fa-r-project fa-4x"></i>O</h1>
    </div>


    <?php
    $fecha = date("d/m/Y H:i");
    if(isset($_POST['smit4765'])){
        $sql = "UPDATE clientes SET pro='0' WHERE dni LIKE '$dnimi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){

        }else{
            echo 'Warning: Error 47385434566';
        }
        $sql = "INSERT INTO transacciones(dni, tokenre, cantidad, razon, fecha, tipo, tokenem) VALUES ('$dnimi','$tokenmi','99','Devolución Plan PRO','$fecha','PagoON','Asier Bank')";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)){

        }else{
            echo 'Warning: Error 584635773';exit;
        }
        $moneynew = $saldomi + 99;
        $sql = "UPDATE clientes SET saldo='$moneynew' WHERE dni LIKE '$dnimi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> despro(); </script>';
        }else{
            echo 'Warning: Error 439485852';exit;
        }
    }
    ?>
</body>
</html>