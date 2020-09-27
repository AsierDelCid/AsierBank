<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Notificaciones</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });
    </script>
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['usuario'])){

    }else{
        header("location: ./area-clientes.php");
    }
    require("../conexion.php");
    $dnimi = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $rango = $fila['rango'];
        }
    }else{
        echo '<h3 align="center"><i class="far fa-smile-beam"></i>&nbsp;No tienes notificaciones, estas al día&nbsp;<i class="far fa-smile-beam"></i></h3>';
    }

    if($banmi != 0){
        header("../area-clientes.php");exit;
    }
    $contador = 0;
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $contador++;
        }
    }
require("./navbar.php");
echo '<h3 align="center">Consultar todas tus Notificaciones</h3><hr>';
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '   <table>
        <thead>
          <tr>
              <th>Emisor</th>
              <th>Fecha</th>
              <th>Texto</th>
          </tr>
        </thead>

        <tbody>';
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            if($rango < 3){
                $emisario = $fila['emisor'];
                echo '<tr>
                <td>' . $emisario . '</td>
                <td>' . $fila['fecha'] . '</td>
                <td>' . $fila['texto'] . '
              </tr>';
            }else{
                $bademi = $fila['emisor'];
                $emisario = substr($bademi, 0, -5);
                echo '<tr>
                <td>' . $emisario . '*****</td>
                <td>' . $fila['fecha'] . '</td>
                <td>' . $fila['texto'] . '
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
                <td><form method="post"> <button type="SUBMIT" class="btn-floating btn-large waves-effect waves-light red" id="smit6575" name="smit6575"><i class="fas fa-trash-alt"></i></button></td>
                <input type="hidden" value="' . $fila['id_db'] . '" id="supadi" name="supadi"> 
              </tr>';
            }
        }
        if(isset($_POST['smit6575'])){
            $id = $_POST['supadi'];
            $sql = "DELETE FROM notificaciones WHERE id_db LIKE '$id'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                echo '<script> deletnot(); </script>';
            }else{
                echo '<script> error(); </script>';exit;
            }
        }
        echo ' </tbody>
        </table>';
    }else{
        echo '<br><br><br><h3 align="center"><i class="far fa-smile-beam"></i>&nbsp;No tienes notificaciones, estas al día&nbsp;<i class="far fa-smile-beam"></i></h3>';
    }
?>
</body>
</html>