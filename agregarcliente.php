<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
</head>
<body class="container">
<?php
//------- Verficar que el Token no esté usado -----//
session_start();
if(isset($_SESSION['usuario'])){
  require("../conexion.php");
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
require("../conexion.php");
$tokensito = rand(100000000000000, 999999999999999);
$sql = "SELECT * FROM clientes WHERE token LIKE '$tokensito'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  echo '<script> errorcliente(); </script>';
  exit;
}else{
}
?>
<i class="fas fa-badge-check"></i>
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Agregar Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
<form action="" method="post">
 
    <div class="row">
    <div class="input-field col s7">
    <i class="fas fa-user-circle prefix"></i>
          <input id="nameappp" name="nameappp" type="text" class="validate" required autocomplete="off">
          <label for="nameappp">Nombre y Apellidos</label>
        </div>

        <div class="input-field col s5">
        <i class="fas fa-phone-alt prefix"></i>
        <input type="number" name="telesone" id="" class="validate" required autocomplete="off"> 
        <label for="telesone">Teléfono</label>
        </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
    <i class="fas fa-house-user prefix"></i>
          <input id="diresion" name="diresion" type="text" class="validate" required autocomplete="off">
          <label for="diresion">Domicilio</label>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s6">
    <i class="fas fa-id-card prefix"></i>
          <input id="dnise" name="dnise" type="number" class="validate" required autocomplete="off" max="99999999">
          <label for="dnise">DNI</label>
        </div>
    <div class="input-field col s6">
    <i class="fas fa-birthday-cake prefix"></i>
          <input id="cumpleanito" name="cumpleanito" type="date" class="datepicker" value="" required autocomplete="off">
          <span class="helper-text">Fecha de Nacimiento</span>
        </div>
    </div>
    <div align="right">
    <button type="SUBMIT" id="forgetto" name="forgetto" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-user-plus"></i>
    
    </button>
    
    </form>

    <?php
    mysqli_set_charset($conexion, "utf-8"); 
    if(isset($_POST['forgetto'])){
    $nombre = mysqli_real_escape_string($conexion, $_POST['nameappp']);
    $domicilio = mysqli_real_escape_string($conexion, $_POST['diresion']);
    $token = $tokensito;
    $nacimiento = mysqli_real_escape_string($conexion, $_POST['cumpleanito']);
    $dni = mysqli_real_escape_string($conexion, $_POST['dnise']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telesone']);
    if(!strcasecmp($nombre, 'Asier Bank')){
      echo '<script> userinvalid(); </script>';exit;
    }elseif(!strcasecmp($nombre, 'admin')){
      echo '<script> userinvalid(); </script>';exit;
    }elseif(!strcasecmp($nombre, 'bank')){
      echo '<script> userinvalid(); </script>';exit;
    }else{
      
    }
    //---- Verificar que el DNI no este usado -----//
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
      echo '<script> dniusado();  </script>';
      exit;
    }
    if(!strcmp("", $nombre)){
      echo '<script> campos();  </script>';
      exit;
    }
    if(!strcmp("", $telefono)){
      echo '<script> campos(); </script>';
      exit;
    }
    if(!strcmp("", $domicilio)){
      echo '<script> campos(); </script>';
      exit;
    }
    if(!strcmp("", $dni)){
      echo '<script> campos(); </script>';
      exit;
    }
    $sql = "SELECT * FROM clientes WHERE telefono LIKE '$telefono'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
      echo '<script> teleusado(); </script>';exit;
    }
    $consulta = "INSERT INTO clientes(nombre, domicilio, dni, token, nacimiento, telefono, nacimiento_trunk, saldo, banned, pin, flash, pro, desconocidos) VALUES ('$nombre','$domicilio','$dni','$token', '$nacimiento', '$telefono', '$nacimiento', '0', '0', '0', '0', '0', '0')";
    $resultado = mysqli_query($conexion, $consulta);
    if(mysqli_affected_rows($conexion)>0){
      echo '<script> clienteagregado(); </script>';
    }else{
      echo 'Warning: Error 48939896434';exit;
    }
  }
}else{
  header("location: ../login/login.php");
}

    ?>
</body>
</html>