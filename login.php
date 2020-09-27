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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, options);
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
session_start();
if(isset($_SESSION['usuario'])){
  header("location: ../usuarios/area-usuarios.php");
  exit;
}
if(isset($_SESSION['pin'])){
  header("location: ../clientes/create-pin.php");
  exit;
}
if(isset($_SESSION['cliente'])){
  header("location: ../clientes/area-clientes.php");
  exit;
}
session_destroy();
?>
<div class="padre margenin">
<div class="row login">
<div class="col s5 14 offset-14 margenin">
<div class="card margenin">
<div class="card-action red white-text">
<h3>Login como Cliente</h3>
</div>
<form method="post">
<div class="card-content ">
<div class="input-field">
<i class="fas fa-id-card prefix fa-2x"></i>
<label for="dnisupaaa" class="validate">DNI</label>
<input type="number" name="dnisupaaa" id="dnisupaaa" maxlength="7" required>
</div><br>
<div class="input-field">
<i class="fas fa-key prefix fa-2x" ></i>
<label for="passnaitunia" class="validate">PIN</label>
<input type="password" id="passnaitunia" name="passnaitunia" id="passnaitunia" minlength="4" required>
</div><br>
<div class="form-field" align="right">
<a href="#modal1" class="modal-trigger">Ayuda de Inicio de Sesión</a>
</div>
<div class="form-field" align="right">
<a href="./register.php">¿No tienes Cuenta?. Créate una</a>
</div><br>
<div class="form-field center-align">
<button type="SUBMIT" id="smit985" name="smit985" class="btn-large red">Acceder</button>
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
<p><a href="./login-user.php">Hacer login como Usuario</a></p>
<p><a href="./passwordchao.php">He olvidado el PIN de mi Cuenta</a></p>
<p><a href="./cuestiones-frecuentes.php">Cuestiones Frecuentes</a></p>
<div align="right">
<a href="#!" class="modal-close waves-effect blacknoit waves-red btn-flat whitesuck" align="right">Cerrar</a>
    </div>
    </div>

    <?php
    if(isset($_POST['smit985'])){
      require("../conexion.php");
      $dni = mysqli_real_escape_string($conexion, $_POST['dnisupaaa']);
      $pin = $_POST['passnaitunia'];
      $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
      $resultado = mysqli_query($conexion, $sql);
      if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array(($resultado), MYSQLI_ASSOC)){
          $ban = $fila['banned'];
          $dnie = $fila['dni'];
          $token = $fila['token'];
          $pinb = $fila['pin'];
          $contador = 0;
          if($pinb == '0'){
            if($token == $pin){
              if($ban == 0){
              session_start();
              $_SESSION['pin'] = $token;
              header("location: ../clientes/create-pin.php");
              }else{
                echo '<script> blocked(); </script>';exit;
              }
            }else{
              echo '<script> revisedatos(); </script>';
              exit;
            }
          }else{
            if(password_verify($pin, $pinb)){
              $contador++;
            }
            if($contador > 0){
              if($ban == 0){
              session_start();
              $_SESSION['cliente'] = $dnie;
              header("location: ../clientes/area-clientes.php");
              }else{
                echo '<script> blocked(); </script>';exit;
              }
            }else{
              echo '<script> revisedatos(); </script>';exit;
            }
          }
        }
      }else{
        echo '<script> dninexist(); </script>';
        exit;
      }
    }
    ?>
    
      
</body>
</html>