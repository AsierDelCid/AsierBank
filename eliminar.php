<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
    </script>
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['usuario'])){

    }else{
        header("location: ../login/login.php");exit;
    }
    require("../conexion.php");
    $contador = 0;
$sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $contador++;
    }
}
    require("./navbar.php");
    $user = mysqli_real_escape_string($conexion, $_POST['userfox']);
    $sql = "DELETE FROM usuarios WHERE username LIKE '$user'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> eliminadofast();</script>';
    }else{
        echo '<script> comprueba(); </script>';
    }
    ?>
</body>
</html>