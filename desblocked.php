<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
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
<body>
<?php
session_start();
if(isset($_SESSION['usuario'])){
    require("../conexion.php");
    $usermi = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
        }
    }else{exit;}
    if($banmi != 0){
        header("location: ../usuarios/area-usuarios.php");exit;
    }
    $dniyou = $_POST['repertorio'];
    $sql = "UPDATE clientes SET pin='0' WHERE dni = '$dniyou'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> actualizado(); </script>';
        header("location: ./consultarcliente.php");
        echo '<script> actualizado(); </script>';
    }else{
        echo '<script> error(); </script>';
        header("location: ./consultarcliente.php");
    }
}


?>
</body>
</html>