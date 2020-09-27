<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción Teléfono</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['cliente'])){

    }else{
        header("Location: ../login/login.php");exit;
    }
    $dnimi = $_SESSION['cliente'];
    require("../conexion.php");
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $tokenmi = $fila['token'];
            $telmi = $fila['telefono'];
            $domi = $fila['domicilio'];
            $nombre = $fila['nombre'];
            $desc = $fila['desconocidos'];
        }
    }
    if($desc == '1'){
      $permiso = 'Permitidas';
    }else{
      $permiso = 'Prohibidas';
    }
    require("./navbar.php");
    echo '<br><div class="container"> <h3 align="center">Datos Personales</h3>';
    echo '

    <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="far fa-user"></i>Nombre y Apellidos</div>
      <div class="collapsible-body"><h5> ' . $nombre . '</h5></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-money-check-alt"></i>Tóken de Cuenta</div>
      <div class="collapsible-body"><h5>' . $tokenmi . '</h5></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-house-user"></i>Domicilio</div>
      <div class="collapsible-body"><h5>' . $domi . '</h5></div>
    </li>
    <li>
    <div class="collapsible-header"><i class="fas fa-phone-alt"></i>Teléfono</div>
    <div class="collapsible-body"><h5>' . $telmi . '</h5></div>
  </li>
  </ul>

     <br><br>   
     <h5>Notificaciones Desconocidas: <b>' . $permiso . '</b></h5><br><br>';



echo '<p class="salmonete"><i class="fas fa-2x fa-exclamation-circle"></i>&nbsp;Esta pestaña es únicamente para consultar tus datos personales actuales si deseas editarlos acceda a <a href="./ajustes-cliente.php">ajustes</a></p>';
    echo '</div>';
    ?>
</body>
</html>