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
    header("location: ../login/login.php");
    exit;
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
    header("location: ../login/login.php");exit;
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


<div class="container" align="center"><br>
<h3>Consultar Usuarios</h3>
<br><br>
<div class="row">
<div class="col s2">
</div>
<form method="post">
<div class="input-field col s6">
<i class="fas fa-user-tie prefix"></i>
<input type="text" id="userato" name="userato" required autocomplete="off">
<label for="userato">Nombre o Nombre de Usuario</label>
</div>
<div class="col s1">
<button id="fertista" type="SUBMIT" name="fertista" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-search"></i></button><br><br><br></form>
</div>
</div>
</div>
<?php
if(isset($_POST['fertista'])){
    $filtro = mysqli_real_escape_string($conexion, $_POST['userato']);
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$filtro' OR nombre LIKE '$filtro%'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion) > 0){
        echo '<div class="container"><br>';
        echo '<table>
        <thead>
          <tr>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Rango</th>
              <th>Token</th>
              <th>Estado</th>
              <th>Extras</th>
          </tr>
        </thead>
    
        <tbody>';
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $nombre = $fila['nombre'];
            $useryou = $fila['username'];
            $rangyou = $fila['rango'];
            $tokenyou = $fila['token'];
            $banyou = $fila['banned'];
            if($rangyou == 1){
                $rankilo = 'Alumno';
            }
            if($rangyou == 2){
                $rankilo = 'Banquero';
            }
            if($rangyou == 3){
                $rankilo = 'Administrador';
            }
            if($rangyou == 4){
                $rankilo = 'Director';
            }
            if($banyou != 0){
                $banstyle = 'Suspendido';
            }else{
                $banstyle = 'Admitido';
            }
            echo '
              <tr>
                <td>'. $useryou . '</td>
                <td>' . $nombre . '</td>
                <td>' . $rankilo . '</td>
                <td>' . $tokenyou . '</td>
                <td>' . $banstyle . '</td>
                <td><form method="post" action="./desblock-user.php"><button type="SUBMIT" id="smit837" class="btn-floating btn-large waves-effect waves-light red" name="smit837"><i class="fas fa-lock-open"></i></button>
                <input type="hidden" id="uglubulu" name="uglubulu" value="' . $useryou . '">
                </form></tr>';
        }
        echo '
        </tbody></table>';
        }


    
}
?>
</body>
</html>