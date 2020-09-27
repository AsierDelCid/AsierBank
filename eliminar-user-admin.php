<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
        require("../conexion.php");
        $usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE  '$usuario'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rankmi = $fila['rango'];
                $banmi = $fila['banned'];
            }
        }else{
            exit;
        }
        if($rankmi < 3){
            header("location: ./area-usuarios.php");exit;
        }
        if($rankmi == 4){
          header("location: ./eliminar-user-director.php");exit;
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
require("./navbar.php");  ?>

  <div class="container" align="center"><br>
  <h3>Eliminar Usuarios</h3>
<br><br>
<div class="row">
<div class="col s3">
</div>
<form method="post">
<div class="input-field col s6">
<i class="fas fa-user-tie prefix"></i>
<input type="text" id="userato" name="userato" required>
<label for="userato">Nombre de Usuario</label>
</div>
<div class="col s1">
<button id="efertonia" type="SUBMIT" name="efertonia" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-search"></i></button><br><br><br></form>
</div>
</div>
  </div>





  



  <?php
  if(isset($_POST['efertonia'])){
      $filtro = $_POST['userato'];
      $sql = "SELECT * FROM usuarios WHERE username LIKE '$filtro'";
      $resultado = mysqli_query($conexion, $sql);
      if(mysqli_affected_rows($conexion)>0){
          while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
              $nombre = $fila['nombre'];
              $rangyou = $fila['rango'];
              $username = $fila['username'];
              $banned = $fila['banned'];
              if($rangyou == $rankmi){
                echo '<script> mismorango(); </script>';
                exit;
              }
              if($rankmi < $rangyou){
                echo '<script> menorango(); </script>';
                exit;
              }
              if($rangyou == 1){
                $ranking = "Alumno";
            }elseif($rangyou == 2){
                $ranking = "Banquero";
            }elseif($rangyou == 3){
                $ranking = "Administrador";
            }else{
                $ranking = "Director";
            }
  
            if($banned == 0){
  
            }else{
                echo '<script> blocked(); </script>';
                exit;
            }
          echo '<div class="container"><br>';
          echo '<table>
          <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Rango</th>
            </tr>
          </thead>
  
          <tbody>
            <tr>
              <td>'. $username . '</td>
              <td>' . $nombre . '</td>
              <td>' . $ranking . '</td>
  
            </tr>
          </tbody><br>
          </table><br>
          <div align="right">
          <form method="post"action="eliminar.php">
          <button type="SUBMIT" id="smit438" name="smit438" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-user-minus"></i></button>
          <input type="hidden" value="' . $username . '" id="userfox" name="userfox">
          </form>
          </div>
          ';

  }
      }else{
        echo '<script> comprueba(); </script>';
  }
}
    }else{
      header("location: ../login/login.php");exit;
    }
  ?>
</body>
</html>