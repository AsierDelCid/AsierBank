<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <style>
    .sombrat{
      box-shadow: 5px 5px 5px;
    }
    .salmonete{
      background: #ff3827;
      padding: 15px;
      border-radius: 10px;
      color: white;
      font-weight: bold;
    }
    </style>

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
    if(isset($_SESSION['usuario'])){
      
        require("../conexion.php");
        $usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $nombre = $fila['nombre'];
            $rango = $fila['rango'];
            $ban = $fila['banned'];
        }
        }else{
          exit;
        }
        if($ban == 0){
        
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
require("./navbar.php");
?>        
  <br>
  <div class="container">
  <?php
  echo '<h3 class="sombrat">Bienvenid@ ' . $nombre . '</h3><br><br>';
  ?>
  <div class="row">
  <div class="col s8" align="center">
  </div>
  </div>
<?php
if(!strcmp($rango, '4')){
  $ranking = 'Director';
}
if(!strcmp($rango, '3')){
  $ranking = 'Administrador';
}
if(!strcmp($rango, '2')){
  $ranking = 'Banquero';
}
if(!strcmp($rango, '1')){
  $ranking = 'Alumno';
}
echo '<h5>Rango de la cuenta: <b>' . $ranking . '</b></h5>';
echo '<h5>Nombre y Apellidos: <b>' . $nombre . '</b></h5><br><br>';
echo '<div class="salmonete">
<p><i class="fas fa-2x fa-exclamation-circle"></i> Este es el áre del usuario desde aquí puedes administrar las fucniones del banco, si te fijas aquí (en inicio) aparece tu rango y nombre y en la parte superior tienes una barra de navegación, para funciones generales acceda a "Ajustes de Usuario" y a "Panel" y te aparecerán las opciones generales, desde notificaciones puedes ver si tienes notificaciones o enviar a los clientes notificaciones y desde ajustes del usuario podrás realizar: en ajustes cambiar tu contraseña y tu nombre desde inicio podrás acceder al inicio desde admin podrás administrar usuarios teniendo un rango mínimo de Administrador y Logout para cerrar sesión</p>
</div>
';

    }else{
      if($ban == 1){
        session_destroy();
        header("location: ../login/login.php");
        exit;
      }else{
        echo '<script> blockedt(); </script>';
      }
    }
  }else{
    header("location: ../login/login.php");
    exit;
  }
  
    ?>
</body>
</html>