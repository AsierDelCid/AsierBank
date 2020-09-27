<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes Cliente</title>
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
<?php require("./navbar.php"); ?>
  <div class="container">
    <?php
    require("../conexion.php");
    session_start();
   if(isset($_SESSION['cliente'])){

   }else{
       header("location: ../login/login.php");exit;
   }
        $usuariomi = $_SESSION['cliente'];
        $sql = "SELECT * FROM clientes WHERE dni LIKE '$usuariomi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $nombre = $fila['nombre'];
                $id = $fila['id_db'];
                $passw = $fila['pin'];
                $banned = $fila['banned'];
                $desc = $fila['desconocidos'];
            }
        

        echo '<div class="row">';
        echo '<div class="col s5>';
        echo '</div>';
        echo '<div class="col s7">';
        echo '<h4 id="usernoino" align="center">Bienvenid@ a Ajustes</h4> <br><br>';
        if($banned != 0){
            header("location: area-clientes.php");
        }
        if($desc == '1'){
            $permiso = 'Permitidas';
        }else{
            $permiso = 'Prohibidas';
        }
    
        ?>

<ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="fas fa-key"></i> PIN</div>
      <div class="collapsible-body">
      <div class="row">
      <form method="post">
      <div class="input-field col s12">
      <input type="password" id="passwordchan" name="passwordchan" required maxlength="6">
      <label for="passwordchan" class="validate">PIN actual</label>
      </div></div>
      <div class="row">
      <div class="input-field col s6">
      <input type="password" id="passwordchanv1" name="passwordchanv1" required autocomplete="off" maxlength="6">
      <label for="passwordchanv1" class="validate">Nuevo PIN</label>
      </div>
      <div class="input-field col s6">
      <input type="password" id="passwordchanv2" name="passwordchanv2" required autocomplete="off" maxlength="6">
      <label for="passwordchanv2" class="validate">Confirmar PIN</label><br>
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
      <button type="SUBMIT" id="orticarie23" name="orticarie23" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </form>
      </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-phone-alt"></i> Teléfono</div>
      <div class="collapsible-body">
      <form method="post">
      <div class="row">
      <div class="input-field col s6">
      <input type="number" class="password" id="telsona1" name="telsona1" autocomplete="off" name="namento1" required>
      <label for="namento1" class="validate">Nuevo teléfono</label>
      </div>
      <div class="input-field col s6">
      <input type="number" id="telsona2" name="telsona2" autocomplete="off" required>
      <label for="namento2" class="validate">Confirmar teléfono</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie75" name="orticarie75" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </form>
      </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-house-user"></i> Domicilio</div>
      <div class="collapsible-body">
      <form method="post">
      <div class="row">
      <div class="input-field col s8">
      <input type="text" class="password" id="domisiliado" autocomplete="off" name="domisiliado" required>
      <label for="namento1" class="validate">Nuevo Domicilio</label>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie175" name="orticarie175" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </form>
      </div>
      </div>
    </li>
    <li>
    <div class="collapsible-header"><i class="fas fa-user-secret"></i> Notificaciones Desconocidas</div>
      <div class="collapsible-body">
      <form method="post">
      <div class="row">
      <div class="input-field col s6">
      <select name="optionando" id="optionando" class="browser-default">
      <option value="permitido">Permitir notificaciones desconocidas</option>
      <option value="nope">No permitir notificaciones desconocidas</option>
      </select>
      </div> 
      <div class="col s1"></div>
      <div class="col s2">
      <button type="SUBMIT" id="smit48768" name="smit48768" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      </div>
      </div>
    </li>
  </ul>
  <div class="row">
  <div class="col s4"></div>
  <div class="col s4">
  <form method="post"><a href="#modal5"><button type="submit" id="smit429" name="smit429" class="btn-large red"><i class="fas fa-ban"></i> Desactivar Cuenta</button></a></form>
  </div>
  </div><br><br>
  <p class="salmonete"><i class="fas fa-2x fa-exclamation-circle"></i>&nbsp;Si desactivas tu cuenta no podrás acceder a ella aunque un banquero de una oficina o administrador de web te la podría volver a activar, úsese en el caso de robo de dinero o fraude</p>
  

  <div id="modal5" class="modal">
    <div class="modal-content">
      <h4>¿Deseas Eliminar Cuenta?</h4>
      <p><i class="fas fa-exclamation-circle"></i>Si desactivas tu cuenta no podrás acceder a ella aunque un banquero de una oficina o administrador de web te la podría volver a activar, úsese en el caso de robo de dinero o fraude</p><br>
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
                $pass = mysqli_real_escape_string($conexion, $_POST['passwordchan']);
                $pass1 = mysqli_real_escape_string($conexion, $_POST['passwordchanv1']);
                $pass2 = mysqli_real_escape_string($conexion, $_POST['passwordchanv2']);
                global $passw;
                if(password_verify($pass, $passw)){
                    if($pass1 == $pass2){
                        $pass_hass = password_hash($pass1, PASSWORD_DEFAULT);
                        $sql = "UPDATE clientes SET pin='$pass_hass' WHERE dni LIKE '$usuariomi'";
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
                $sql = "DELETE FROM clientes WHERE dni LIKE '$usuariomi'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    header("location: ../login/login.php");
                }
            }

            if(isset($_POST['smit429'])){
                $sql = "UPDATE clientes SET banned='1' WHERE dni LIKE '$usuariomi'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    session_destroy();
                    echo '<script> blocked(); </script>';
                }
            }
            if(isset($_POST['orticarie23'])){
                $name1 = mysqli_real_escape_string($conexion, $_POST['namento1']);
                $name2 = $_POST['namento2'];
                if($name1 == $name2){
                    $sql = "UPDATE clientes SET nombre='$name1' WHERE dni LIKE '$usuariomi'";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_affected_rows($conexion)>0){
                        echo '<script> actualizado(); </script>';
                    }
                }else{
                    echo '<script> comprueba(); </script>';
                }
            }

            if(isset($_POST['orticarie75'])){
                $tel1 = mysqli_real_escape_string($conexion, $_POST['telsona1']);
                $tel2 = mysqli_real_escape_string($conexion, $_POST['telsona2']);
                if($tel1 == $tel2){
                    $sql = "UPDATE clientes SET telefono='$tel1' WHERE dni LIKE '$usuariomi'";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_affected_rows($conexion)>0){
                        echo '<script> actualizado(); </script>';
                    }
                }else{
                    echo '<script> comprueba(); </script>';
                }
            }
            if(isset($_POST['orticarie175'])){
                $dom = mysqli_real_escape_string($conexion, $_POST['domisiliado']);

                    $sql = "UPDATE clientes SET domicilio='$dom' WHERE dni LIKE '$usuariomi'";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_affected_rows($conexion)>0){
                        echo '<script> actualizado(); </script>';
                    }
            }

            if(isset($_POST['smit48768'])){
                $selectation = $_POST['optionando'];
                if($selectation == 'permitido'){
                    $status = '1';
                }else{
                    $status = '0';
                }
                $sql = "UPDATE clientes SET desconocidos='$status' WHERE dni LIKE '$usuariomi'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    if($status == '1'){
                        echo '<script> permitdes(); </script>';
                    }else{
                        echo '<script> nopedes(); </script>';
                    }
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