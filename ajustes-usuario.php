<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar PIN</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
    <style>
    .salmon{
        background: salmon;
    }
    #usernoino{
        font-size: 65px;
    }
    .ndecoration{
        decoration: none;
    }
    .salmonete{
      background: #ff3827;
      padding: 15px;
      border-radius: 10px;
      color: white;
      font-weight: bold;
    }
    </style>
</head>
<body>
<?php 
?>

    <?php
    require("../conexion.php");
    session_start();
    if(isset($_SESSION['usuario'])){
        $contador = 0;
        $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $contador++;
            }
        }
        require("./navbar.php");
       echo '<div class="container">';
        $usuariomi = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuariomi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $nombre = $fila['nombre'];
                $id = $fila['id_db'];
                $passw = $fila['pass'];
                $banned = $fila['banned'];
            }
        }else{exit;}

        echo '<div class="row">';
        echo '<div class="col s5>';
        echo '</div>';
        echo '<div class="col s7">';
        echo '<h4 id="usernoino" align="center">Bienvenid@ a Ajustes</h4> <br><br>';
        if($banned != 0){
            header("location: area-usuarios.php");
        }
        ?>

<ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="fas fa-key"></i> Contraseña</div>
      <div class="collapsible-body">
      <div class="row">
      <form method="post">
      <div class="input-field col s12">
      <input type="password" id="passwordchan" name="passwordchan" required>
      <label for="passwordchan" class="validate">Contraseña actual</label>
      </div></div>
      <div class="row">
      <div class="input-field col s6">
      <input type="password" id="passwordchanv1" name="passwordchanv1" required autocomplete="off">
      <label for="passwordchanv1" class="validate">Nueva contraseña</label>
      </div>
      <div class="input-field col s6">
      <input type="password" id="passwordchanv2" name="passwordchanv2" required autocomplete="off">
      <label for="passwordchanv2" class="validate">Confirmar Contraseña</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="saveandto" name="saveandto" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </form>
      </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-user"></i> Nombre y Apellidos</div>
      <div class="collapsible-body">
      <form method="post">
      <div class="row">
      <div class="input-field col s6">
      <input type="text" class="password" id="namento1" autocomplete="off" name="namento1" required>
      <label for="namento1" class="validate">Nuevo nombre y apellidos</label>
      </div>
      <div class="input-field col s6">
      <input type="text" id="namento2" name="namento2" autocomplete="off" required>
      <label for="namento2" class="validate">Confirmar nombre y apellidos</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie" name="orticarie" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </form>
      </div>
      </div>
    </li>
  </ul>
  <div class="row">
  <div class="col s4">
  <form action="" method="post"><button type="submit" id="smit293" name="smit293" class="btn-large red"><i class="fas fa-times"></i> Eliminar Cuenta</a></button></form>
  </div>
  <div class="col s4"></div>
  <div class="col s4">
  <form method="post"><a href="#modal5"><button type="submit" id="smit429" name="smit429" class="btn-large red"><i class="fas fa-ban"></i> Desactivar Cuenta</button></a></form>
  </div>
  </div><br><br>
  <p class="salmonete"><i class="fas fa-2x fa-exclamation-circle"></i> Si eliminas tu cuenta no podrás volver a recuperarla, y todos los datos almacenados en ella se borrararán dejándolos inexistentes, si la desactivas un administrador puede volvertela a activar</p>
  

  <div id="modal5" class="modal">
    <div class="modal-content">
      <h4>¿Deseas Eliminar Cuenta?</h4>
      <p>Si eliminas tu cuenta jamás podrás volver a recuperarla, además, perderás todos los datos que tengas en ella ¿estás seguro que deseas hacerlo?</p><br>
      <form method="post"><button type="submit"><a href="#!" class="modal-close waves-effect blacknoit waves-green btn-flat" align="right">Cerrar</a></form></button>

    </div>
    </div>
  
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="ajustes-usuario.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="../inicio.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./area-usuarios.php"><i class="fas fa-at"></i> Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="#!"><i class="fas fa-user-shield"></i> Admin</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="../cerrarsesion.php"><i class="fas fa-power-off"></i> Logout</a></li>
  </ul>
        <?php
            if(isset($_POST['saveandto'])){
                $pass = $_POST['passwordchan'];
                $pass1 = $_POST['passwordchanv1'];
                $pass2 = $_POST['passwordchanv2'];
                global $passw;
                if(password_verify($pass, $passw)){
                    if($pass1 == $pass2){
                        $pass_hass = password_hash($pass1, PASSWORD_DEFAULT);
                        $sql = "UPDATE usuarios SET pass='$pass_hass' WHERE username LIKE '$usuariomi'";
                        $resultado = mysqli_query($conexion, $sql);
                        if(mysqli_affected_rows($conexion)>0){
                            echo '<script> actualizado(); </script>';
                        }
                    }else{

                        echo '<script> comprueba(); </script>';
                        exit;
                    }
                }else{
                    echo '<script> comprueba(); </script>';
                    exit;
                }
            }
            if(isset($_POST['smit293'])){
                $sql = "DELETE FROM usuarios WHERE username LIKE '$usuariomi'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    header("location: ../login/login.php");
                }
            }

            if(isset($_POST['smit429'])){
                $sql = "UPDATE usuarios SET banned='1' WHERE username LIKE '$usuariomi'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    session_destroy();
                    echo '<script> blocked(); </script>';
                }
            }
            if(isset($_POST['orticarie'])){
                $name1 = $_POST['namento1'];
                $name2 = $_POST['namento2'];
                if($name1 == $name2){
                    $sql = "UPDATE usuarios SET nombre='$name1' WHERE username LIKE '$usuariomi'";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_affected_rows($conexion)>0){
                        echo '<script> actualizado(); </script>';
                    }
                }else{
                    echo '<script> comprueba(); </script>';
                }
            }
    
    }else{
        header("location: ../login/login.php");
        exit;
}

    ?>
    </div>
</body>
</html>