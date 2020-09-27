<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Notificación</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        header("Location: ./area-clientes.php");exit;
    }
    require("../conexion.php");
    $usermi = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $rankmi = $fila['rango'];
        }
    }
    if($banmi != 0){
        header("location: ./area-usuarios.php");exit;
    }
    if($rankmi < 2){
        header("location: ./view-notify.php");exit;
    }
    $contador = 0;
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE 'Asier Bank' and readed='0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $contador++;
        }
    }
    require("./navbar.php");
    ?>
    <form action="" method="post">
    <div class="container">
    <h2 align="center">Enviar Notificación</h2><hr>
    <div class="row">
    <div class="input-field col s6">
    <input type="text" id="inputso" name="inputso" required>
    <label for="inputso">DNI Receptor</label>
    </div>
    <div class="input-field col s6">
    <input type="text" id="ersato" name="ersato" value="Asier Bank" readonly>
    <label for="ersato">Enviado desde</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
    <textarea name="textasso" id="textasso" cols="30" rows="10" class="materialize-textarea" required></textarea>
    <label for="textasso">Texto de la Notificación</label>
    </div>
    </div>
    <div align="right">
    <button type="submit" id="smit6476" name="smit6476" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-paper-plane fa-2x"></i></button>
   </div>
    </div>
    </form>

    <?php
    $fecha = date("d/m/Y H:i");
    if(isset($_POST['smit6476'])){
        $para = mysqli_real_escape_string($conexion, $_POST['inputso']);
        $texto = mysqli_real_escape_string($conexion, $_POST['textasso']);
        $sql = "SELECT * FROM clientes WHERE dni LIKE '$para'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){

        }else{
            echo '<script> comprueba(); </script>';exit;
        }

        $sql = "UPDATE notificaciones SET readed='1' WHERE dni LIKE '$para'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){

        }else{
        }

        $sql = "INSERT INTO notificaciones(fecha, texto, emisor, receptor, readed) VALUES ('$fecha','$texto','Asier Bank','$para','0')";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> notifysend(); </script>';
        }else{
            exit;
        }

    }
    ?>
</body>
</html>