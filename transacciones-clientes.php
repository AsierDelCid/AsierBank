<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacciones Cliente</title>
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

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Transacciones Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    <span>Puedes observar las transacciones de un cliente desde su DNI o token de cuenta</span><br><br>

    <form action="" method="post">
    <div class="row">
    <div class="col s2"></div>
    <div class="input-field col s7">
          <input id="furtona" name="furtona" type="number" class="validate" required>
          <label for="furtona">Transacciones Cliente</label>
        </div>
        <div align="right" class="col s1">
        <button id="urtonixa" type="SUBMIT" name="urtonixa" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-search"></i></button><br><br>
        </div>
        </div>
    </form>

    <?php
    if(isset($_POST['urtonixa'])){
        require("../conexion.php");
        $busqueda = mysqli_real_escape_string($conexion, $_POST['furtona']);
        $sql = "SELECT * FROM clientes WHERE token LIKE '$busqueda' OR dni LIKE '$busqueda'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){

        }else{
            echo '<script> comprueba(); </script>';
            exit;
        }
        $sql = "SELECT * FROM transacciones WHERE tokenre LIKE '$busqueda' OR dni LIKE '$busqueda' OR tokenem LIKE '$busqueda'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '<table>
            <thead>
              <tr>
                  <th>Fecha</th>
                  <th>Emisor</th>
                  <th>Receptor</th>
                  <th>Cantidad</th>
                  <th>Tipo</th>
                  <th>Razón</th>
              </tr>
            </thead>
    
            <tbody>';
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $dniyou = $fila['dni'];
                $emisor = $fila['tokenem'];
                $receptor = $fila['tokenre'];
                $cantitat = $fila['cantidad'];
                $rason = $fila['razon'];
                $fecha = $fila['fecha'];
                $tipo = $fila['tipo'];
                if($fila['tokenre'] == 'Asier Bank'){
                  $receptor = 'Asier Bank';
                }else{

                  
                }
                echo ' 
                  <tr>
                    <td>' . $fecha . '</td>
                    <td>' . $emisor . '</td>
                    <td>' . $receptor . '</td>
                    <td>' . $cantitat . '€</td>
                    <td>' . $tipo . '</td>
                    <td>' . $rason . '</td>
                  </tr>
              ';
            }
            echo '        </tbody>
            </table>';
        }
    }
  }else{
    header("location: ../login/login.php");
  }
    ?>
</body>
</html>