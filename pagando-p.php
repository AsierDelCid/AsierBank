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

     $dni = $_POST['dnicras'];
     $cantidadNo = $_POST['cantisad'];
     $anadir = $_POST['uluporto'];
     $rason = $_POST['causionen'];
     $cantidad = $_POST['uluporto'];
     $fecha = $_POST['fesa'];
     $id = $_POST['idasnio'];
     
     $saldo_final = $cantidadNo - $anadir;
     if($saldo_final < 0){
         header("location: ./pagar-prestamo.php");
         exit;
     }
     if($saldo_final == 0){
         $estatus = 'no';
     }else{
         $estatus = 'si';
     }
     $sql = "UPDATE prestamos SET cantidad='$saldo_final', estado='$estatus', ultpago='$fecha' WHERE dni LIKE '$dni' and id_db LIKE '$id'";
     $resultado = mysqli_query($conexion, $sql);
     if(mysqli_affected_rows($conexion)>0){
         echo '<script> actualizado(); </script>';
         echo '<div class="alert alert-success container" role="alert">
                            Se ha pagado correctamente la cantidad de:<b> ' . $anadir . '€</b> del préstamo y faltaría por pagar:<b> ' . $saldo_final . '€</b>
                          </div>';
     }
     ?>
</div>
</body>
</html>