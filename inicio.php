


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script src="css/materialize.min.js"></script>
    <script src="tostadas.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="./css/indice.png" type="image/x-icon">
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
require("./conexion.php");
if(isset($_SESSION['usuario'])){}else{
  header("Location: ./login/login.php");
  exit;
}
$usermi = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $rankmi = $fila['rango'];
    $banmi = $fila['banned'];
  }
}
if($banmi != 0){
  header("location: ./usuarios/area-usuarios.php");exit;
}
$contador = 0;
$sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $contador++;
    }
}
if($rankmi == 1){
?>
<nav>
    <div class="nav-wrapper red ">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;Área del Usuario</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
<li><a href="./usuarios/view-notify.php"><i class="fas fa-envelope"></i> Notificaciones (<?php echo $contador; ?>)</a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Ajustes de Usuario <i class="fas fa-caret-down"></i></a></li>
        <li><a href="./cerrarsesion.php"><i class="fas fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>


  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="./usuarios/ajustes-usuario.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./inicio.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./usuarios/area-usuarios.php"><i class="fas fa-at"></i> Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./usuarios/admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./cerrarsesion.php"><i class="fas fa-power-off"></i> Logout</a></li>
  </ul>
    <div class="container">
    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Asier Bank&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    <div class="row">
    <div class="col s6">
    <a href="./clientes/agregarcliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-user-plus"></i> Agregar Cliente</i></button>
    </a>
    </div>
    <div class="col s6">
    <a href="./clientes/consultarcliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-user-cog"></i></i> Consultar Clientes</i></button>
    </a>
    </div>
    </div>
 
    <div class="row">
    <div class="col s6">
    <a href="./clientes/transacciones-clientes.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-history"></i> Transacciones del Cliente</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./clientes/editar-cliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-edit"></i> Editar Cliente</i></button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <a href="./usuarios/gest-prestamos.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-tasks"></i> Consultar Préstamos</button>
    </a>
    </div>
    </div>
    </a>
    
    </div>
<?php 
}else{
 ?>
 <nav>
    <div class="nav-wrapper red ">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;Área del Usuario</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
<li><a href="./usuarios/view-notify.php"><i class="fas fa-envelope"></i> Notificaciones (<?php echo $contador; ?>)</a></li>
        <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Ajustes de Usuario <i class="fas fa-caret-down"></i></a></li>
        <li><a href="./cerrarsesion.php"><i class="fas fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>


  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="./usuarios/ajustes-usuario.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./inicio.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./usuarios/area-usuarios.php"><i class="fas fa-at"></i> Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./usuarios/admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./cerrarsesion.php"><i class="fas fa-power-off"></i> Logout</a></li>
  </ul>
    <div class="container">
    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Asier Bank&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    <div class="row">
    <div class="col s4">
    <a href="./clientes/agregarcliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-user-plus"></i> Agregar Cliente</i></button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/consultarcliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-user-cog"></i></i> Consultar Clientes</i></button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/eliminarcliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-user-times"></i> Eliminar Cliente</i></button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s6">
    <a href="./saldo/agregarsaldo.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-coins"></i> Ingresar Dinero</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./saldo/retirarsaldo.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-coins"></i> Retirar Dinero</i></button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s4">
    <a href="./clientes/transacciones-clientes.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-history"></i> Transacciones del Cliente</button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/editar-cliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-edit"></i> Editar Cliente</i></button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/suspender-cliente.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-ban"></i> Suspender Cliente</button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s6">
    <a href="./usuarios/prestamo.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-money-check-alt"></i> Realizar Préstamo</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./usuarios/pagar-prestamo.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-money-bill-wave"></i> Pagar Préstamo</button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <a href="./usuarios/gest-prestamos.php">
    <button class="btn waves-effect waves-light btn-block red" type="submit" name="action"><i class="fas fa-tasks"></i> Consultar Préstamos</button>
    </a>
    </div>
    </div>
    <?php
}
    ?>
</body>
</html>