<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promover I Degradar</title>
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
                $rangmi = $fila['rango'];
            }
        }else{
            exit;
        }
        if($rangmi < 3){
            header("location: area-usuarios.php");exit;
        }
    if($rangmi == 4){
      header("location: ./admin-users-director.php");exit;
    } 
    $contador = 0;
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $contador++;
        }
    }
    
    ?>
<?php  require("./navbar.php"); ?>


  <div class="container" align="center"><br>
  <h3>Empezemos a Administrar Usuarios</h3>
<br><br>
<div class="row">
<div class="col s2">
</div>
<form method="post">
<div class="input-field col s6">
<i class="fas fa-user-tie prefix"></i>
<input type="text" id="userato" name="userato" required autocomplete="off">
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
              if($rangyou == 1){
                $ranking = "Alumno";
            }elseif($rangyou == 2){
                $ranking = "Banquero";
            }elseif($rangyou == 3){
                $ranking = "Administrador";
            }else{
                $ranking = "Director";
            }
            if($rangmi == $rangyou){
              echo '<script> mismorango(); </script>';
              exit;
            }
            if($rangyou == 4){
              echo '<script> menorango(); </script>';
              exit;
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
          </tbody></table>';
?>
<div class="row">
<div class="input-field col s9">
<form action="./establecerango.php" method="post">
<select name="selectazione" id="selectazione" class="browser-default form-control" required> 
<option value="" disabled selected>Seleccione el Rango</option>
<option value="1">Alumno</option>
<option value="2">Banquero</option>
</select>
</div>
<button class="btn-floating btn-large waves-effect waves-light red" name="savechangum" id="savechangum" type="SUBMIT"><i class="fas fa-paper-plane"></i></button>
<input type="hidden" name="usernion" id="usernion" value="<?php echo $username ?>">
</div>
</form>

<?php      
        
          }
        }
        if(isset($_POST['savechangum'])){
            echo 'Hola';
            echo $_POST['selectazione']; 
        }

?>




<?php
  }
}else{
    header("location: ../login/login.php");
    exit;
  }
  ?>
</body>
</html>