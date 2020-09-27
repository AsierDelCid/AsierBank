<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
$usuariomi = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuariomi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $rankmi = $fila['rango'];
            $banmi = $fila['banned'];
        }
    }
}else{
    header("../login/login.php");
}
if($banmi != 0){
    header("../usuarios/area-usuarios.php");
}
?>
<div class="row">
<div class="col s4">
<a href="./editar-cliente.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Editar Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    <?php
    $dni = mysqli_real_escape_string($conexion, $_POST['dnisupad1']);
    $nuevo1 = mysqli_real_escape_string($conexion, $_POST['namento1']);
    $nuevo2 = mysqli_real_escape_string($conexion, $_POST['namento2']);
    if($nuevo1 != $nuevo2){
        echo '<script> confirmaciono(); </script>';
        exit;
    }
    
    $sql = "UPDATE clientes SET nombre='$nuevo1' WHERE dni LIKE '$dni'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> actualizado(); </script>';
    }
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $nombre = $fila['nombre'];
            $telefono = $fila['telefono'];
            $domicilio = $fila['domicilio'];
        }
    }
    echo '<h4>Resumen del Cliente</h4>';
    echo '<hr>
    Nombre y Apellidos: <b>' . $nombre . '</b><br>
    Teléfono: <b>' . $telefono . '</b><br>
    Domicilio: <b>' . $domicilio . '<br>
    <hr>
    ';
    ?>
    <div align="center">
    <a href="./editar-cliente.php" class="btn-large red" style="text-decoration: none;">Regresar</a>
    </div>
</body>
</html>