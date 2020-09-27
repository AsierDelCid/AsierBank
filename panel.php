<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script src="../js/jquery.js"></script>
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
require("../conexion.php");
if(isset($_SESSION['cliente'])){}else{
  header("Location: ./login/login.php");
  exit;
}
$usermi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$usermi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $rankmi = $fila['banned'];
    $promi = $fila['pro'];
  }
}else{
  exit;
}
if($rankmi != 0){
    header("location: ./area-clientes.php");exit;
}
require("./navbar.php");
?>
    <div class="container">
    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Asier Bank&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    <div class="row">
    <div class="col s6">
    <a href="./transacciones.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-exchange-alt"></i> Realizar Transferencia</i></button>
    </a>
    </div>
    <?php
    $dnimi = $usermi;
    $contador = 0;
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE '$dnimi' and readed LIKE '0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
      while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $contador++;
      }
    }
    if($contador != 0){
    ?>
    <div class="col s6">
    <a href="./notify-panel.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-bell"></i> Notificaciones (<?php echo $contador; ?>)</button>
    </a>
    </div>
    </div>
    <?php
    }elseif($contador == 0){

    
    ?>
 <div class="col s6">
    <a href="./notify-panel.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-bell"></i> Notificaciones</button>
    </a>
    </div>
    </div>
    <?php
    }else{
      exit;
    }
    ?>
    <div class="row">
    <div class="col s6">
    <a href="./consultar-transacciones.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-history"></i> Transacciones del Cliente</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./solicitar-prestamo.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-comment-dollar"></i> Solicitar Préstamo</i></button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <a href="./consultar-prestamos.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-tasks"></i> Consultar Préstamos</button>
    </a>
    </div>
    </div>
    <?php
    if($promi != 0){
    ?>
    <div class="row">
    <div class="col s12">
    <a href="./pro-options.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action">Opciones P<i class="fab fa-r-project"></i>O</button>
    </a>
    </div>
    </div>
    <?php
    }
    ?>
    </a>
    
    </div>
    <?php
     ?>
    </body>
    </html>