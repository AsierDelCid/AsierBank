<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar</title>
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
        require("../conexion.php");
        $usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE  '$usuario'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rango = $fila['rango'];
                $banmi = $fila['banned'];
            }
        }else{
            exit;
        }
        if($rango < 3){
            header("location: area-usuarios.php");exit;
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
    ?>
<?php require("./navbar.php"); ?>


  <div class="container" align="center"><br>
  <h3>Eliga la opción de Administrador que desea</h3><br><br>
  <div class="row">
  <div class="col s6">
  <a href="./admin-users-director.php">
    <button class="btn waves-effect waves-light btn-block red btn-large btn-block" type="submit" name="action"><i class="fas fa-hand-holding-usd"></i> Promover o Degradar Usuario</button>
    </a>
    </div>
  <div class="col s6">
  <a href="./consultar-user.php">
    <button class="btn waves-effect waves-light btn-block red btn-large btn-block" type="submit" name="action"><i class="fas fa-search"></i> Consultar Usuario</button>
    </a>
    </div>
  </div>
  <div class="row">
  <div class="col s6">
  <a href="./eliminar-user-director.php">
    <button class="btn waves-effect waves-light btn-block red btn-large btn-block" type="submit" name="action"><i class="fas fa-user-minus"></i> Eliminar Usuario</button>
    </a>
    </div>
  <div class="col s6">
  <a href="./agregar-user-director.php">
    <button class="btn waves-effect waves-light btn-block red btn-large btn-block" type="submit" name="action"><i class="fas fa-user-plus"></i> Agregar Usuario</button>
    </a>
    </div>
  </div>
  <div class="row">
  <div class="col s12">
  <a href="./ban-user-director.php">
    <button class="btn waves-effect waves-light btn-block red btn-large btn-block" type="submit" name="action"><i class="fas fa-ban"></i> Bloquear Usuario</button>
    </a>
    </div>
  </div> 






<?php
    }else{
        header("location: ../login/login.php");
        exit;
    }
  ?>
</body>
</html>




