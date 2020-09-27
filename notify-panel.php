<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Notificaciones</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
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
    if(isset($_SESSION['cliente'])){

    }else{
        header("location: ./area-clientes.php");exit;
    }
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $promi = $fila['pro'];
            $flashmi = $fila['flash'];
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    ?>
    <div class="container">
    <h3 align="center">Panel de Notificaciones</h3><hr>
    <div class="row">
    <div class="col s12">
    <form action="./consultar-notify.php">
    <button class="btn-block btn-large red">Consultar Notificaciones</button>
    </form>
    </div>
    </div>
    <div class="row">
    <div class="col s12">
    <form action="./send-notifyb.php">
    <button class="btn-block btn-large red">Enviar Notificación al Banco</button>
    </form>
    </div>
    </div>



    </div>
</body>
</html>