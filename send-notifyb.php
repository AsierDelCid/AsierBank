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
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    require("./navbar.php");
    ?>
    <div class="container">
    <h3 align="center">Enviar Notificación al Banco</h3><hr>
    <form action="" method="post">
    <div class="row">
    <div class="input-field col s12">
    <textarea name="testaso" class="materialize-textarea" id="testaso" cols="30" rows="10"></textarea>
    <label for="testaso">Texto de la Notificación</label>
    <div align="right">
    <button type="submit" name="smit35775" id="smit35775" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-paper-plane"></i></button></div>
    </form>
    </div>
    </div>
    
    <?php
    $fecha = date("d/m/Y H:i");
    if(isset($_POST['smit35775'])){
$texto = mysqli_real_escape_string($conexion, $_POST['testaso']);
$sql = "INSERT INTO notificaciones(fecha, texto, emisor, receptor, readed) VALUES ('$fecha','$texto','$dnimi','Asier Bank','0')";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    echo '<script> notifysend(); </script>';
}else{
    echo 'Warning: Error 484657589344';exit;
}
    }

?>
    
    </div>
</body>
</html>