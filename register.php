<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una cuenta</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
    <style>
      body {
        background-image: url("../css/montaniosa.jpg");
        background-size: cover;
        
      } 
      .login{
        margin-top: 25px;
        margin: 25px 125px;
      }
      
      .login .card {
        background: rgba(0, 0, 0, .6);
      }

      .login label{
        font-size: 16px;
        color: #ccc;
      }
      .login input{
        font-size: 20px !important;
        color: #fff;
      }

      .login textarea{
        font-size: 20px !important;
        color: #fff;
      }

      .modal{
        color: white;
        background: black;
      }
      .modal-footer{
        color: white;
        background: salmon;
      }
      .blacknoit{
        background: black;
      }
    </style>
    <script>

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, 'd mm yyyy');
  });
    </script>
<body>
<?php
require("../conexion.php");
$tokensito = rand(100000000000000, 999999999999999);
$sql = "SELECT * FROM clientes WHERE token LIKE '$tokensito'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  echo '<script> erroregister(); </script>';
  exit;
}else{
}
?>
<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("../usuario/area-usuarios.php");
}
if(isset($_SESSION['pin'])){
  header("location: ../clientes/create-pin.php");
}
if(isset($_SESSION['cliente'])){
  header("location: ../clientes/area-clientes.php");
}
session_destroy();
?>
<div class="padre registrorio">
<div class="row login">
<div class="col s9 14 offset-14">
<div class="card">
<div class="card-action red white-text">
<h3>Registrarse en Asier Bank</h3>
</div>
<form method="post">
<div class="card-content ">
<div class="row">
<div class="input-field col s3">
<label for="nombrazzo" class="validate">Nombre y Apellidos</label>
<input type="text" name="nombrazzo" id="nombrazzo" required maxlength="100">
</div>
<div class="input-field col s3">
<label for="dniolopulta" class="validate">DNI</label>
<input type="text" name="dniolopulta" id="dniolopulta" required maxlength="8">
</div>
<div class="input-field col s3">
<label for="naximento" class="active">Fecha de Nacimiento</label>
<input type="date" placeholder="" class="form-control" name="naximento" id="naximento" required>

</div></div>
<div class="row">
<div class="input-field col s3">
<label for="telesona" class="validate">Teléfono</label>
<input type="number" name="telesona" id="telesona" required max="999999999">
</div>
<div class="input-field col s6">
<label for="domisadio" class="validate">Domicilio</label>
<input type="text" maxlength="125" id="domisadio" name="domisadio" required>
</div>
</div>
<p>
      <label>
        <input type="checkbox" required/>
        <span>Al seleccionar la casilla aceptas los términos de <a target="_blank" href="#">Asier Bank</a></span>
      </label>
    </p>
<div class="form-field" align="right">
<a href="#modal1" class="modal-trigger">Ayuda de Registro</a>
</div>
<div class="form-field" align="right">
<a href="./login.php">¿Cambiaste de idea? Acceder</a>
</div>
<div class="center-align">
<button type="SUBMIT" name="smit45" id="smit45" class="btn-large red"><i class="fas fa-user-plus"></i></button>
</div><br>
</div>
</div>
</div>
</div>
</div>
  </div>
</form>

  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Ayuda de Registro</h4>
      <p>Como observas al registratte no te piden ninguna contraseña debido a nuestra amplia seguridad el primer acceso deberás hacerle con el DNI introducido y en PIN deberás insertar el token: <?php echo $tokensito ?> el cual será tu token de cuenta a partir de ahora, si sigue teniendo dudas, acceda a <a href="cuestiones-frecuentes.php">Cuestiones Frecuentes</a></p><br>
<div align="right">
<a href="#!" class="modal-close waves-effect blacknoit waves-red btn-flat" align="right">Cerrar</a>
    </div>
    </div>

<?php
if(isset($_POST['smit45'])){
  $dni = mysqli_real_escape_string($conexion, $_POST['dniolopulta']);
  $nombre = mysqli_real_escape_string($conexion, $_POST['nombrazzo']);
  $token = $tokensito;
  $nacimiento = mysqli_real_escape_string($conexion, $_POST['naximento']);
  $telefono = mysqli_real_escape_string($conexion, $_POST['telesona']);
  $domicilio = mysqli_real_escape_string($conexion, $_POST['domisadio']);
  if(!strcasecmp($nombre, 'Asier Bank')){
    echo '<script> userinvalid(); </script>';exit;
  }elseif(!strcasecmp($nombre, 'Admin')){
    echo '<script> userinvalid(); </script>';exit;
  }elseif(!strcasecmp($nombre, 'bank')){
    echo '<script> userinvalid(); </script>';exit;
  }else{
    
  }
  $sql = "SELECT * FROM clientes WHERE telefono LIKE '$telefono'";
  $resultado = mysqli_query($conexion, $sql);
  if(mysqli_affected_rows($conexion)>0){
    echo '<script> teleusado(); </script>';exit;
  }
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
      echo '<script> dniusado();  </script>';
      exit;
    }
    $sql="INSERT INTO clientes(nombre, domicilio, dni, nacimiento, token, telefono, nacimiento_trunk, saldo, banned, pin, flash, pro, desconocidos) VALUES ('$nombre','$domicilio','$dni','$nacimiento','$token','$telefono','$nacimiento','0','0', '0' , '0', '0', '0')";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
      echo '<script> clienteagregado(); </script>';
    }else{
      echo '<script> error(); </script>';
    }
  }
?>
<script src="../css/font.js"></script>
</body>
</html>