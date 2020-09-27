<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuario</title>
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
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
    </script>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['usuario'])){
}else{
    header("../login/login.php");exit;
}
require("../conexion.php");
$userpro = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE username LIKE '$userpro'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $rangmi = $fila['rango'];
    }
}else{
    exit;
}
if($rangmi < 3){
    header("location: ../login/login.php");
}

if($banmi != 0){
    header("location: ./area-usuarios.php");
}
?>
<?php  
 $contador = 0;
 $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
 $resultado = mysqli_query($conexion, $sql);
 if(mysqli_affected_rows($conexion)>0){
     while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
         $contador++;
     }
 }
require("./navbar.php"); ?>
<?php
$usuario = mysqli_real_escape_string($conexion, $_POST['uglubulu']);
$sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banyou = $fila['banned'];
        $tokenyou = $fila['token'];
    }
}
if($banyou != 0){
    echo '<script> blocked(); </script>';
    exit;
}
$sql = "UPDATE usuarios SET pass='0' WHERE username LIKE '$usuario'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    echo '<script> actualizado(); </script><div class="container">';
    echo '<h4 class="salmonete"> El usuario deberá acceder con su nombre de usuario-><b>' . $usuario . '</b> y en contraseña deberá poner su token-><b>' . $tokenyou . ' </b>al acceder deberá crear obligatoriamente una contraseña por seguridad</h4><br><br>  <div align="center">
    <a href="./consultar-user.php" class="btn-large red">Regresar</a> </div></div>';
}else{
    echo '<script> error(); </script>';
    header("location: ./consultar-user.php");
}
?>
</body>
</html>