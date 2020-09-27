<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Notificación</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  </script>
  <style>
      .salmonetes{
    background: #3b83bd;
    padding: 15px;
    border-radius: 10px;
    color: white;
} 
  </style>
</head>
<body>
<nav>
    <div class="nav-wrapper blue ">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;<i class="fab fa-r-project"></i>Opciones PRO</a>
      <ul id="nav-mobile" style="text-decoration: none;" class="right hide-on-med-and-down">
<li><a href="./panel.php" style="text-decoration: none;"><i class="fas fa-tools"></i>&nbsp;&nbsp;Panel del Cliente</a></li>
        <li><a class='dropdown-trigger' href='#' style="text-decoration: none;" data-target='dropdown1'>Ajustes de Cliente <i class="fas fa-caret-down"></i></a></li>
        <li><a href="../cerrarsesion.php" style="text-decoration: none;"><i class="fas fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>


  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="./ajustes-cliente.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./panel.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./area-clientes.php"><i class="fas fa-at"></i>Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./tus-datos.php"><i class="far fa-user"></i>Tus Datos</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./ajustes-plan.php"><i class="fas fa-money-bill"></i>Tu Plan</a></li>
  </ul>
    <?php
    session_start();
    if(isset($_SESSION['cliente'])){

    }else{
        header("location: ./area-clientes.php");exit;
    }
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $promi = $fila['pro'];
        $desc = $fila['desconocidos'];
    }
}
if($promi == 0){
    header("location: ./area-clientes.php");exit;
}
if($desc == 0){
  echo '<h3 align="center">Necesitas tener activadas las notificaciones desconocidas para usar esta opción</h3><br><br><h1 align="center">P<i class="fab fa-r-project fa-2x"></i>O</h1><br><br><h5 align="center"><a href="./ajustes-cliente.php">Acceda a Ajustes para Cambiarlo</a></h5>';exit;
}
    ?>
    <form action="" method="post">
    <div class="row">
    <div class="col s4" style="">
    <h1>P<i class="fab fa-r-project"></i>O</h1>
    </div>
    <div class="col s5">
    <h2>Enviar Notificación</h2>
    </div>
    </div>
    <div class="container">
    <div class="row">
    <div class="input-field col s7">
    <input type="number" id="reseptor" name="reseptor">
    <label for="reseptor">DNI (Receptor)</label>
    </div>
    <div class="col s1"></div>
    <div class="input-field col s3">
    <label>
        <input type="checkbox" value="checked" id="marcaso" name="marcaso" />
        <span>Resaltar signo PRO</span>
      </label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
    <textarea class="materialize-textarea" name="testaso" id="testaso" cols="30" rows="10"></textarea>
    <label for="testaso">Texto de la notificación</label>
    </div>
    </div>
    <div class="row">
        <div align="right">
            <button type="submit" id="smit4752" name="smit4752" class="btn-floating btn-large waves-effect waves-light blue"><i class="far fa-paper-plane"></i></button>
        </div>
    </div>
</form>



    <p class="salmonetes"><i class="fas fa-2x fa-exclamation-circle"></i>&nbsp;Ten en cuenta que al no ser un mensaje oficial del Banco esta notificación puede ser hasta borrada por el receptor, además, se le avisará que la notificación no es oficial del Banco, por lo que, no intentes estafarle u otro delito, la inundación de mensajes a una persona esta penada con el bloqueo permanente de cuenta, además, no se reembolsará el importe del Plan PRO</p>

    </div>


    <?php
    $fecha = date("d/m/Y H:i");
    if(isset($_POST['smit4752'])){
      $texto = mysqli_real_escape_string($conexion, $_POST['testaso']);
      $receptor = mysqli_real_escape_string($conexion, $_POST['reseptor']);
      $sql = "SELECT * FROM clientes WHERE dni LIKE '$receptor'";
      $resultado = mysqli_query($conexion, $sql);
      if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
          $desc = $fila['desconocidos'];
        }
      }else{
        echo '<script> comprueba(); </script>';exit;
      }
      if($desc == 0){
        echo '<script> nopermit(); </script>';exit;
      }
      if($receptor == $dnimi){
        echo '<script> notuno(); </script>';exit;
      }
      if(isset($_POST['marcaso'])){
        $staito = '1';
      }else{
        $staito = '0';
      }
      $sql = "INSERT INTO notificaciones(fecha, texto, emisor, receptor, readed, optional) VALUES ('$fecha','$texto','$dnimi','$receptor','0', '$staito')";
      $resultado = mysqli_query($conexion, $sql);
      if(mysqli_affected_rows($conexion)>0){
        echo '<script> notifysend(); </script>';
      }else{
        echo 'Warning: Error 474875255';exit;
      }

    }
    ?>
</body>
</html>