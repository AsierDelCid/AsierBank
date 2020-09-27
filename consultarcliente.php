<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
</head>
<body class="container">
<?php
require("../conexion.php");
session_start();
if(isset($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
  $resultado = mysqli_query($conexion, $sql);
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
      $ban = $fila['banned'];
  }
  if($ban == 0){

  }else{
      session_destroy();
      header("location: ../login/login.php");
  }
?>
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Administrar Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    <span>Puedes consultar un cliente desde un DNI, nombre y apellidos o token de la cuenta</span><br><br>

    <form action="" method="post">
    <div class="input-field">
          <input id="filtroxxti" name="filtroxxti" type="text" class="validate" required autocomplete="off">
          <label for="filtroxxti">Dato a Filtrar</label>
        </div>
        <div align="right">
        <button id="sendokai" name="sendokai" class="btn-floating btn-large waves-effect waves-light green"><i class="fas fa-paper-plane"></i></button><br><br>
        </div>
    </form>


    <?php
    if(isset($_POST['sendokai'])){
        $fecha = date('Y');
        $busqueda = mysqli_real_escape_string($conexion, $_POST['filtroxxti']);
        mysqli_set_charset($conexion, "utf-8");
        $sql = "SELECT * FROM clientes WHERE token LIKE '$busqueda' OR dni LIKE '$busqueda' OR nombre LIKE '$busqueda%'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '      <table class="responsive-table">
            <thead>
              <tr>
                  <th>Nombre y Apellidos</th>
                  <th>Domicilio</th>
                  <th>DNI</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Teléfono</th>
                  <th>Tóken de la Cuenta</th>
                  <th>Dinero de la Cuenta</th>
                  <th>Extras</th>
              </tr>
            </thead>
    
            <tbody>';
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
              $dni = $fila['dni'];
                $diferencia = $fecha - $fila['nacimiento_trunk'];
                $tokenat = $fila['token'];
            echo '     <tr>
                    <td>' . $fila['nombre'] . '</td>
                    <td>' . $fila['domicilio'] . '</td>
                    <td>' . $fila['dni'] . '</td>
                    <td>' . date("d/m/Y", strtotime($fila['nacimiento'])) . '&nbsp;(' . $diferencia . ')' . '</td>
                    <td>' . $fila['telefono'] . '</td>
                    <td>' . $fila['token'] . '</td>
                    <td>' . $fila['saldo'] . '€</td>
                    <td><form method="post" action="./desblocked.php"><button type="SUBMIT" class="btn-floating btn-large waves-effect waves-light green"><i class="fas fa-unlock"></i></button>
                    <input type="hidden" value="' . $dni . ' "id="repertorio" name="repertorio">
                    </form>

                  </tr>';
                  
            }
            echo '</tbody><br><br>';
            
        }else{
            echo '<script> datosno(); </script>';
          exit;
        }

    }
}
?>
</body>
</html>