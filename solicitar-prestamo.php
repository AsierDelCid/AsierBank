<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Préstamo</title>
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
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    require("./navbar.php");
    ?>
    <div class="container">
    <h3 align="center">Solicitar Préstamo</h3><hr>
    <form action="" method="post">
    <div class="row">
    <div class="input-field col s6">
    <input type="text" id="prestaniona" name="prestaniona" required>
    <label for="prestaniona">Nombre y Apellidos</label>
    </div>
    <div class="input-field col s6">
    <input type="number" id="prestanioca" name="prestanioca" required>
    <label for="prestaniona">Cantidad del Préstamo</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
    <textarea name="prestaniocaus" id="prestaniocaus" cols="30" rows="10" class="materialize-textarea" required></textarea>
    <label for="prestaniocaus">Causa del Préstamo</label>
    </div>
    </div>
    <div align="right">
    <button type="submit" id="smit7475" name="smit7475" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-envelope-open-text"></i></button>
    </div>
    </form>
    </div>
    <?php
    $fecha = date("d/m/Y H:i");
    if(isset($_POST['smit7475'])){
        $autor = mysqli_real_escape_string($conexion, $_POST['prestaniona']);
        $cantidad = mysqli_real_escape_string($conexion, $_POST['prestanioca']);
        $causa = mysqli_real_escape_string($conexion, $_POST['prestaniocaus']);
        $sql = "INSERT INTO notificaciones(fecha, texto, emisor, receptor, readed, cprestamo, autor) VALUES ('$fecha','$causa','$dnimi','Asier Bank','0','$cantidad', '$autor')";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> prestsend(); </script>';exit;
        }
    }
    ?>
</body>
</html>