


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../css/tostadas.js"></script>
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
require("../conexion.php");
if(isset($_SESSION['usuario'])){}else{
  header("Location: ../login/login.php");
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
  header("location: ./area-usuarios.php");exit;
}
$contador = 0;
$sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $contador++;
    }
}
require("./navbar.php");
?>
<div class="container">
<h3 align="center">Administrar Notificaciones</h3><hr><br>
<?php
if($contador == 0){
?>
<form action="./cons-notify.php">
<button type="submit" class="btn waves-effect waves-light btn-block red">Consultar Notificaciones</button>
</form><br>
<?php
}else{
?>
<form action="./cons-notify.php">
<button type="submit" class="btn waves-effect waves-light btn-block red">Consultar Notificaciones (<?php echo $contador; ?>)</button>
</form><br>
<?php
}
if($rankmi < 2){

}else{
?>
<form action="./send-notify.php">
<button type="submit" class="btn waves-effect waves-light btn-block red">Enviar Notificacion</button>
</form>
<?php
}
?>
</div>
</body>
</html>