<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['usuario'])){
 require("../conexion.php");
$tokensito = rand(100000000000000, 999999999999999);
$sql = "SELECT * FROM usuarios WHERE token LIKE '$tokensito'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  echo '<script> error(); </script>';
  exit;
}else{
}
        $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $rango = $fila['rango'];
        }
        if($rango < 3){
            header("location: ./area-usuarios.php");exit;
        }
        if($rango == 3){
            header("location: ./agregar-user-admin.php");exit;
        }
    }
    $contador = 0;
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $contador++;
        }
    }
?>
<?php require("./navbar.php"); ?>
<div class="container">
<h3 align="center">Agregar Usuario</h3>
<form method="post">
<div class="row">
<div class="input-field col s12">
<i class="fas fa-user-tie prefix"></i>
<input type="text" id="nombresillo" name="nombresillo" required required autocomplete="off">
<label for="nombresillo">Nombre y Apellidos</label>
</div>
</div>
<div class="row">
<div class="input-field col s4">
<select name="rankilota" class="browser-default" id="rankilota" required>
<option value="0" disabled selected>Eliga su rango</option>
<option value="1">Alumno</option>
<option value="2">Banquero</option>
<option value="3">Administrador</option>
<option value="4">Director</option>
</select>
</div>
<div class="input-field col s4">
<i class="far fa-user prefix"></i>
<input type="text" id="userappnom" name="userappnom" required required autocomplete="off">
<label for="userappnom">Nombre de Usuario</label>
</div>
<div class="input-field col s4">
<select name="estatumno" id="estatumno" class="browser-default" required>
<option value="0" disabled selected>Eliga su Estado</option>
<option value="1">Admitido</option>
<option value="2">Prohibido</option>
</select><br><br>
</div>
</div>
<div class="row">
<div class="col s4">
<a href="#modal1" class="modal-trigger" style="background: black; padding: 20px; border-radius: 10px; font-size: 20px;">*NOTA</a>
</div>
<div class="col s6"></div>
<div align="right"> 
<button type="submit" id="creatofrembonia" name="creatofrembonia" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-user-plus"></i></button>
</div>
</div>
</form>
</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal black whiteso">
    <div class="modal-content whiteso">
      <h4 style="color: white;">¿Como hará login el Usuario?</h4>
      <p style="color: white;">Como te has fijado no puedes poner una contraseña al usuario ¿porqué? simplemente por seguridad, pero no se preocupe la primera vez que acceda tendrá que poner en nombre de usuario el que ha generado usted y de contraseña deberá poner el token de usuario: <b><?php echo $tokensito; ?> </b>de esta forma su primera vez al acceder deberá crear de forma obligatoria una <a style="color: blue;">contraseña</a></p>
      <div align="right">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">OKAY</a>
      </div>
    </div>
  </div>


</div>
        <?php
        if(isset($_POST['creatofrembonia'])){
            $name = mysqli_real_escape_string($conexion, $_POST['nombresillo']);
            $rango = mysqli_real_escape_string($conexion, $_POST['rankilota']);
            $estado = mysqli_real_escape_string($conexion, $_POST['estatumno']);
            $user = mysqli_real_escape_string($conexion, $_POST['userappnom']);
            if($estado == 1){
                $estaita = 0;
            }else{
                $estaita = 1;
            }
            $sql = "SELECT * FROM usuarios WHERE username LIKE '$user'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $comparativa = $fila['username'];
                    if($user == $comparativa){
                        echo '<script> userused(); </script>';exit;
                    }
                }
            }
            $sql = "INSERT INTO usuarios(username, pass, rango, banned, nombre, token) VALUES ('$user','0','$rango','$estaita','$name', '$tokensito')";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                echo '<script> masuser(); </script>';
            }else{
                echo '<script> error(); </script>';
            }
        }
    }else{
        header("location: ../login/login.php");
        exit;
    }
    ?>
</body>
</html>