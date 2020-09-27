<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suspender Usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        header("./area-usuarios.php");
    }
    require("../conexion.php");
    $usermi = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $rankmi = $fila['rango'];
            $banmi = $fila['banned'];
        }
    }
    if($rankmi < 3){
        header("location: ./area-usuarios.php");exit;
    }
    if($rankmi == 3){
        header("location: ./ban-user-admin.php");exit;
    }
    if($banmi != 0){
        header("location: ./area-usuarios.php");exit;
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
    <div class="container">
<h3 align="center">Suspender Usuarios</h3><hr>
<div align="center">
<span>Para bloquear usuarios escriba su nombre de usuario y para desbloquearlo vuélavlo a escribir</span></div><br><br>
    <form method="post">
<div class="row">
<div class="col s2">
</div>
<div class="input-field col s8">
<input type="text" id="filtropo" name="filtropo" required autocomplete="off">
<label for="filtrnianto" class="validate">Nombre de Usuario</label>
</div>
<div class="col s1">
<button type="SUBMIT" id="portillo" name="portillo" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-ban"></i></button>
</div>
</div>
</div>
</form>


<?php
if(isset($_POST['portillo'])){
    $useryou = mysqli_real_escape_string($conexion, $_POST['filtropo']);
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$useryou'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $rankyou = $fila['rango'];
            $banyou = $fila['banned'];
        }
    }else{
        echo'<script> comprueba(); </script>';exit;
    }
    if($rankmi == $rankyou){
        echo '<script> mismorango(); </script>';
        exit;
    }
    if($rankmi < $rankyou){
        echo '<script> menorango </script>';
        exit;
    }
    if($banyou == 0){
    $sql = "UPDATE usuarios SET banned='1' WHERE username LIKE '$useryou'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> blocked(); </script>';
    }else{
        echo '<script> error(); </script>';
    }
}elseif($banyou == 1){
    $sql = "UPDATE usuarios SET banned='0' WHERE username LIKE '$useryou'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> unban(); </script>';
    }else{
        echo '<script> error(); </script>';
    }
}
}
?>
</body>
</html>