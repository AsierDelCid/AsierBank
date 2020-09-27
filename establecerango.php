<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar PIN</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
    </script>
</head>
<body>
<?php
require("../conexion.php");
 $contador = 0;
 $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
 $resultado = mysqli_query($conexion, $sql);
 if(mysqli_affected_rows($conexion)>0){
     while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
         $contador++;
     }
 }
require("./navbar.php"); ?>
    <?php
    $rank = $_POST['selectazione'];
    session_start();
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE  '$usuario'";
        $filtro = $_POST['usernion'];
        $resultado = mysqli_query($conexion, $sql);
        if($filtro == $_SESSION['usuario']){
            echo '<script> notu(); </script>';
            exit;
        }
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rango = $fila['rango'];
            }
        }else{
            exit;
        }
        if($rango < 3){
            header("location: ./area-usuarios.php");
        }
        if(isset($_POST['savechangum'])){
            if("1" == $rank){
                $rankillo = "1";
            }elseif("2" == $rank){
                $rankillo = "2";
            }elseif("3" == $rank){
                $rankillo = "3";  
            }elseif("4" == $rank){
                $rankillo = "4";
            }else{
                echo '<script> comprueba(); </script>';exit;
            }
            $usuariopo = $filtro;
            if($rango < $rankillo){
                echo '<script> menorango </script>';
                exit;
            }
            $sql = "UPDATE usuarios SET rango='$rankillo' WHERE username LIKE '$usuariopo'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                echo '<script> actualizado(); </script>';
            }else{
                echo '<script> comprueba(); </script>';
            }
        }
        }else{
            header("location: ../login/login.php");exit;
        }
        $sql = "SELECT * FROM usuarios WHERE username LIKE '$filtro'";
        $resultado = mysqli_query($conexion, $sql);
        while($fila =mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $nombreap = $fila['nombre'];
            $userapp = $fila['username'];
            $rango = $fila['rango'];
            if($rango == 1){
                $rankilo = 'Alumno';
            }
            if($rango == 2){
                $rankilo = 'Banquero';
            }
            if($rango == 3){
                $rankilo = 'Administrador';
            }
            if($rango == 4){
                $rankilo = 'Director';
            }
            echo '<br><br><br><hr>';
            echo 'Nombre y Apellidos: <b>' . $nombreap . '</b><br>';
            echo 'Nombre de usuario: <b>' . $userapp . '</b><br>';
            echo 'Rango: <b>' . $rankilo . '</b><br>';
            echo '<hr>';

        }
    ?>



    <?php

    ?>
</body>
</html>