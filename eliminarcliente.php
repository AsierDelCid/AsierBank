<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
</head>
<body class="container">
<?php
session_start();
if(isset($_SESSION['usuario'])){
  require("../conexion.php");
  $usuario = $_SESSION['usuario'];
  $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
  $resultado = mysqli_query($conexion, $sql);
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
      $ban = $fila['banned'];
      $rank = $fila['rango'];
  }
  if($ban == 0){

  }else{
      session_destroy();
      header("location: ../login/login.php");
  }
  if($rank < 2){
    header("location: ../usuarios/area-usuarios.php");
  }
?>
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Eliminar Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    <span>Puedes eliminar un cliente desde su DNI o token de cuenta</span><br><br>

    <form action="" method="post">
    <div class="input-field">
          <input id="furtona" name="furtona" type="number" class="validate" required>
          <label for="furtona">Eliminar Cliente</label>
        </div>
        <div align="right">
        <button id="urtonixa" type="SUBMIT" name="urtonixa" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-user-times"></i></button><br><br>
        </div>
    </form>

    <?php
    if(isset($_POST['urtonixa'])){
        require("../conexion.php");
        $busqueda = mysqli_real_escape_string($conexion, $_POST['furtona']);
        $sql = "SELECT * FROM clientes WHERE token LIKE '$busqueda' OR dni LIKE '$busqueda'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
          echo '<script> modalistica(); </script>';
          ?>
          <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  <?php
        $sql = "DELETE FROM clientes WHERE dni LIKE '$busqueda' OR token LIKE '$busqueda'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
          echo '<script> eliminasi(); </script>';
            echo '<div class="alert alert-success" role="alert">
            Se ha eliminado correctamente (<b>' . $busqueda . '</b>)
          </div>';
        }else{
          echo '<script> datosno(); </script>';
            echo '<div align="center" class="alert alert-danger" role="alert">
            No existen los datos introducidos
          </div>';
          exit;
        }
      }else{
        echo '<script> datosno(); </script>';
            echo '<div class="alert alert-danger" align="center" role="alert">
            No existen los datos introducidos
          </div>';
          exit;
      }
    }
  }else{
    header("location: ../login/login.php");
  }
    ?>
</body>
</html>