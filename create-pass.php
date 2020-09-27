<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar PIN</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <style>
    .salmon{
        background: salmon;
    }
    #usernoino{
        font-size: 65px;
    }
    </style>
</head>
<body>
<nav>
    <div class="nav-wrapper red">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;Asier Bank </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href=""><i class="fas fa-users"></i> Área de Clientes</a></li>
        <li><a href=""><i class="fas fa-wrench"></i> Ajustes</a></li>
        <li><a href="../cerrarsesion.php"><i class="fas fa-power-off"></button></i></a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <?php
    require("../conexion.php");
    session_start();
    if(isset($_SESSION['password'])){
    $tooken = $_SESSION['password'];
    $sql = "SELECT * FROM usuarios WHERE token='$tooken'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array(($resultado), MYSQLI_ASSOC)){
            $nombre = $fila['nombre'];
            $rango = $fila['rango'];
            $user = $fila['username'];
            if($rango == 1){
                $rankillo = 'Alumno';
            }elseif($rango == 2){
                $rankillo = 'Banquero';
            }elseif($rango == 3){
                $rankillo = 'Administrador';
            }elseif($rango == 4){
                $rankillo = 'Director';
            }else{
                echo '<script> error(); </script>';
                exit;
            }
        }
        echo '<div class="row">';
        echo '<div class="col s5>';
        echo '</div>';
        echo '<div class="col s7">';
        echo '<h3 id="usernoino">Bienvenid@ <b>' . $nombre . '</b></h3>';
        echo '<h5>Ahora debes crear una contraseña para acceder a tu cuenta</h5><br>';
    
        ?>
<form method="post">
<div class="row">
<div class="input-field col s6">
<input type="password" id="pincreate" name="pincreate" max="999999" min="1111" autcomplete="off" required> 
<label for="pincreate">Nueva Contraseña</label>
</div>
<div class="input-field col s6">
<input type="password" id="pincreate2" name="pincreate2" max="999999" min="1111" autocomplete="off" required>  
<label for="pincreate2" max="999999" min="1">Confirmar nueva contraseña</label>
</div>
</div>
<div align="center">
<button type="SUBMIT" class="btn-large red" id="smit467" name="smit467">Confirmar nueva contraseña</button>
</div>
</form>
        <?php
    }
    }else{
        header("location: ../login/login.php");exit;
    }
    if(isset($_POST['logitout'])){
        session_destroy();
        header("../login/login.php");
    }

    if(isset($_POST['smit467'])){
        $pin1 = mysqli_real_escape_string($conexion, $_POST['pincreate']);
        $pin2 = mysqli_real_escape_string($conexion, $_POST['pincreate2']);
        if(!strcmp($pin1, $pin2)){
            if(strlen($pin1)<4){
                echo '<script> excha2(); </script>';
                exit;
            }
            $pin_hass = password_hash($pin2, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET pass='$pin_hass' WHERE token='$tooken'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                echo '<script> pinOk(); </script>';
                session_destroy();
                session_start();
                $_SESSION['usuario'] = $user;
                header("location: ./area-usuarios.php");
            }else{
                echo '<script> error(); </script>';
            }
        }else{
            echo '<script> confirmaciono(); </script>';exit;
        }
    }
    ?>
    </div>
</body>
</html>