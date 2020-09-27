<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
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
        overflow: hidden;
      }
      .login{
        margin-top: 25px
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
      $(function() {

var $body = $(document);
$body.bind('scroll', function() {
    // "Disable" the horizontal scroll.
    if ($body.scrollLeft() !== 0) {
        $body.scrollLeft(0);
    }
});

}); 
    </script>
<body>
<?php
if(isset($_SESSION['usuario'])){
  header("../usuario/area-usuarios.php");
}
if(isset($_SESSION['pin'])){
  header("location: ../clientes/create-pin.php");
}
if(isset($_SESSION['cliente'])){
  header("location: ../clientes/area-clientes.php");
}
?>
<div class="padre margenin">
<div class="row login">
<div class="col s5 14 offset-14 margenin">
<div class="card margenin">
<div class="card-action red white-text">
<h3>Login como Usuario</h3>
</div>
<form method="post">
<div class="card-content ">
<div class="input-field">
<i class="fas fa-user-tie prefix"></i>
<label for="opertolio" class="validate">Nombre de Usuario</label>
<input type="text" name="opertolio" id="opertolio" required autocomplete="off">
</div><br>
<div class="input-field">
<i class="fas fa-lock prefix"></i>
<label for="contrenista" class="validate">Contraseña</label>
<input type="password" id="contrenista" name="contrenista" minlength="4" required autocomplete="off">
</div>
<div class="form-field" align="right">
<a href="./login.php">Regresar</a>
</div><br>
<div class="form-field center-align">
<button type="SUBMIT" id="smit985" name="smit648" class="btn-large red">Acceder</button>
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
      <h4>Ayuda de Inicio de Sesión</h4>
      <p>Nosotros para ayudarte a inicar sesión te podemos proveer de las siguientes formas, si tras leer todo sigues teniendo dudas, acceda a <a href="cuestionesfrecuentes.php">Cuestiones Frecuentes</a></p><br>
<p><a href="login-usuario.php">Hacer login como Usuario</a></p>
<p><a href="passwordchao.php">He olvidado el PIN de mi Cuenta</a></p>
<p><a href="passwordchao.php">Cuestiones Frecuentes</a></p>
<div align="right">
<a href="#!" class="modal-close waves-effect blacknoit waves-green btn-flat" align="right">Cerrar</a>
    </div>
    </div>

    <?php
    if(isset($_POST['smit648'])){
      require("../conexion.php");
      $user = mysqli_real_escape_string($conexion, $_POST['opertolio']);
      $contrasena = mysqli_real_escape_string($conexion, $_POST['contrenista']);
      $sql = "SELECT * FROM usuarios WHERE username LIKE '$user'";
      $resultado = mysqli_query($conexion, $sql);
      if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array(($resultado), MYSQLI_ASSOC)){
          $userOk = $fila['username'];
          $passOk = $fila['pass'];
          $ban = $fila['banned'];
          $token = $fila['token'];
          $contador = 0;
          if($passOk == 0){
            if($contrasena == $token){
              session_start();
              $_SESSION['password'] = $token;
              header("location: ../usuarios/create-pass.php");
            }
          }
          if(password_verify($contrasena, $passOk)){
            $contador++;
          }else{
            echo '<script> comprueba(); </script>';exit;
          }
          if($ban != 0){
            echo '<script> blocked(); </script>';
            exit;
        }
              if($contador > 0){
                if($ban == 0){
                  session_start();
                  $_SESSION['usuario'] = $userOk;
                  header("location: ../usuarios/area-usuarios.php");
              }else{
                      if ($ban == date('Y/m/d')){
                          $sql = "UPDATE usuarios SET banned='0' WHERE username = $userOk";
                          $resultado = mysqli_query($conexion, $resultado);
                          echo '<script> unban(): </script>';
                      }
                  }
              }else{
                echo '<script> compruebe(); </script>';
              }
          }
      }else{
        echo '<script> revisedatos(); </script>';
      }
    }
    
    ?>
</body>
</html>