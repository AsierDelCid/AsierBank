<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones PRO</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  </script>
</head>
<body>
    <?php
session_start();
if(isset($_SESSION['cliente'])){

}else{
    header("location: ./area-clientes.php");
}
require("../conexion.php");
$dnimi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $promi = $fila['pro'];
    }
}
if($promi == 0){
    header("location: ./area-clientes.php");exit;
}

?>
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
  <div class="container">
  <h1 align="center">P<i class="fab fa-r-project fa-2x"></i>O</h1><br>
  <div class="row">
    <div class="col s12">
    <a href="./send-notify.php">
    <button class="btn waves-effect waves-light btn-block blue" type="submit" name="action"><i class="far fa-paper-plane"></i>&nbsp;&nbsp;Enviar Notificación</button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <a href="./ayuda-pro.php">
    <button class="btn waves-effect waves-light btn-block blue" type="submit" name="action"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Ayuda</button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <a href="./des-pro.php">
    <button class="btn waves-effect waves-light btn-block blue" type="submit" name="action"><i class="fas fa-user-minus"></i>&nbsp;&nbsp;Desactivar PRO</button>
    </a>
    </div>
    </div>


    </div>
</body>
</html>