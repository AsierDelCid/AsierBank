<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Saldo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
</head>
<body class="container">
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Ingresar Dinero&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
<?php
require("../conexion.php");
session_start();
if(isset($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
  $resultado = mysqli_query($conexion, $sql);
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
      $ban = $fila['banned'];
  }
  if($ban == 0){

  }else{
      session_destroy();
      header("location: ../login/login.php");
  }
if(isset($_POST['arstazio'])){
    $saldo = $_POST['saldoxin'];
    $filtro = $_POST['filtroxi'];
    $fecha = $_POST['fechinnnna'];
    $causa = $_POST['causionen'];
    $dni = $_POST['dnisassssso'];
    $token = $_POST['tokenitxo'];
                           $anadir = mysqli_real_escape_string($conexion, $_POST['uluporto']);
                           $saldo_final = $saldo + $anadir;
                           $sql = "UPDATE clientes SET saldo='$saldo_final' WHERE token='$filtro' OR dni='$filtro'";
                           $resultado = mysqli_query($conexion, $sql);
                           if(mysqli_affected_rows($conexion)>0){
                            $sql = "INSERT INTO transacciones(dni, tokenre, cantidad, razon, fecha, tipo, tokenem) VALUES ('$dni','$token','$anadir','$causa','$fecha', 'Ingreso', 'Asier Bank')";
                            $resultado = mysqli_query($conexion, $sql);
                            if(mysqli_affected_rows($conexion)>0){
                              echo '<script> IngresoOk(); </script>';
                            echo '<div class="alert alert-success" role="alert">
                            Se ha ingresado correctamente la cantidad de:<b> ' . $anadir . '€</b> y el saldo final de la cuenta será de:<b> ' . $saldo_final . '€</b>
                          </div>';
                            }else{
                                echo '<div class="alert alert-danger" role="alert">
                            Comprueba los datos introducidos
                          </div>';
                            }
                           }else{
                            echo '<div class="alert alert-danger" role="alert">
                            Comprueba los datos introducidos
                          </div>';
                           }
                       }
                      }
                       ?>
</body>
</html>