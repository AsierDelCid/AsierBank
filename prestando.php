<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Realizar Préstamo&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
    <?php
     session_start();
     require("../conexion.php");
     if(isset($_SESSION['usuario'])){
         $usermi = $_SESSION['usuario'];
         $sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
         $resultado = mysqli_query($conexion, $sql);
         if(mysqli_affected_rows($conexion)>0){
             while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                 $rankmi = $fila['rango'];
             }
         }else{
             exit;
         }
         if($rankmi < 2){
             header("location: ../inicio.php");exit;
         }
     }else{
         header("location: ../login/login.php");exit;
     }


     //------------------------------------------------//

     $dni = $_POST['dnisupar'];
     $filtro = $_POST['filtroxi'];
     $fecha = $_POST['fechinnnna'];
     $rason = $_POST['causionen'];
     $cantidad = $_POST['uluporto'];
     $intereses = $_POST['interesado'];
     $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
     $resultado = mysqli_query($conexion, $sql);
     while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
         $token = $fila['token'];
     }
     $ok = $cantidad * $intereses;
     $intereses = $ok / 100;
     $cantidad = $cantidad + $intereses;
     $sql = "INSERT INTO prestamos (dni, token, cantidad, razon, fecha, estado, cinicial, intereses) VALUES ('$dni','$token','$cantidad','$rason','$fecha', 'si', '$cantidad', '$intereses')";
     $resultado = mysqli_query($conexion, $sql);
     if(mysqli_affected_rows($conexion)>0){
         echo '<script> prestamoOk(); </script>';
         header("location: ./prestamo.php");
     }else{
         echo '<script> error(); </script>';
    }
    ?>
    <div align="center">
    <a href="./prestamo.php" class="btn-large red">Regresar</a>
</div>
</body>
</html>