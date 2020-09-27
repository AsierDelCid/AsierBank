<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar FlashPhone</title>
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
    <style>
    .blackhover:hover{
        color: black;
    }
    </style>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['cliente'])){

    }else{
        header("Location: ./area-clientes.php");exit;
    }
    $dnimi = $_SESSION['cliente'];
    require("../conexion.php");
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $tel = $fila['telefono'];
            $flash = $fila['flash'];
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    if($flash != 0){
        header("location: ./transacciones.php");exit;
    }

    ?>
<div class="container">
<h3 align="center"><i class="fas fa-bolt"></i>&nbsp;Activar FlashPhone&nbsp;<i class="fas fa-bolt"></i></h3><hr>

    <br>
    <h3 align="center">¿Estas Seguro que deseas activar la opción?</h3><br>
    <div class="row">
    <div class="col s6">
    <a href="./transacciones.php">
    <button class="btn waves-effect waves-light btn-block red">No, gracias</button>
    </a>
    </div>
    <div class="col s6">
    <form action="" method="post">
    <button type="SUBMIT" name="flashutil" id="flashutil" class="btn waves-effect waves-light btn-block red"><i class="fas fa-bolt"></i>&nbsp;Activar</button>
    </form>
    </div>
    </div><br><br>
    <div class="salmonete">
    <h5><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;Al activar Flash Phone podrás enviar y recibir dinero a través de un número de teléfono, es decir, al activar esta opción <b>totalmente gratuita</b> podrás darle utilidad al número de teléfono vinculado a tu cuenta-> <?php echo $tel; ?></h5>
    </div>

    </div>


    <?php
    if(isset($_POST['flashutil'])){
        $sql = "UPDATE clientes SET flash='1' WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> flash(); </script><br>';
        echo '<div align="center"><a href="./transacciones.php" style="text-decoration: none;" class="btn-large red blackhover waves-effect">REGRESAR</a></div>';
    }else{
        echo '<script> flashed(); </script><br>';
        echo '<div align="center"><a href="./transacciones.php" style="text-decoration: none;" class="btn-large red blackhover waves-effect">REGRESAR</a></div>';
    }
    }
    ?>
</body>
</html>