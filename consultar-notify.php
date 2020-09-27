<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Notificaciones</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });
    </script>
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['cliente'])){
    }else{
        header("location: ../login/login.php");exit;
    }
    $contador = 0;
    $nulacion = 0;
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];

        }
    }else{
        echo 'Warning: Error 4675634566';exit;
    }

    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    require("./navbar.php");
    $sql = "SELECT * FROM notificaciones WHERE receptor LIKE '$dnimi' and readed='0'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<div class="container" align="center"><h2 align="center"> Notificaciones </h2><hr>';
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            if($fila['emisor'] == 'Asier Bank'){
            $supa = $fila['emisor'];
                    if($fila['readed'] == 0){
                    echo '<div class="row"><div class="col s3"></div><div class="col s6"><div 
                    class="salmonete">
                    <form method="post"><div align="center"><button type="SUBMIT" class="btn-floating btn-large waves-effect waves-light red" id="smit5448" name="smit5448"><i class="fas fa-times"></i></button></div>
            <h3 align="left">Asier Bank&nbsp;<sup><a style="color: blue;"class="tooltipped" data-position="top" data-tooltip="¡Usuario Verificado!"><i class="far fa-check-circle"></i></a></sup></h3><br>' . $fila['texto'] . '<br><br><p align="right">' . $fila['fecha'] . '</p></div></div></div><br>
            <input type="hidden" value="' . $fila['id_db'] . '" id="filtraxiun" name="filtraxiun"></form>';
            $nulacion++;
                    }else{
    
                    
                    }
                }else{
                    if($fila['optional'] == '1'){
                    $supa = $fila['emisor'];
                    $emisario = $fila['emisor'];
                    $eminew = substr($emisario, 0, -5);
                    if($fila['readed'] == 0){
                    echo '<div class="row"><div class="col s3"></div><div class="col s6"><div 
                    class="salmonete">
                    <form method="post"><button type="SUBMIT" class="btn-floating btn-large waves-effect waves-light red" id="smit5448" name="smit5448"><i class="fas fa-times"></i></button>
            <h3 align="left">' . $eminew . '***** <sup><a style="color: blue;"class="tooltipped" data-position="top" data-tooltip="Usuario No Verificado"><i class="fab fa-r-project"></i></a></sup></h3><br>' . $fila['texto'] . '<br><br><p align="right">' . $fila['fecha'] . '</p></div></div></div><br>
            <input type="hidden" value="' . $fila['id_db'] . '" id="filtraxiun" name="filtraxiun"></form>';
            $nulacion++;

                    }else{
    
                    
                    }
                }else{
                    $supa = $fila['emisor'];
                    $emisario = $fila['emisor'];
                    $eminew = substr($emisario, 0, -5);
                    if($fila['readed'] == 0){
                    echo '<div class="row"><div class="col s3"></div><div class="col s6"><div 
                    class="salmonete">
                    <form method="post"><button type="SUBMIT" class="btn-floating btn-large waves-effect waves-light red" id="smit5448" name="smit5448"><i class="fas fa-times"></i></button>
            <h3 align="left">' . $eminew . '*****</h3><br>' . $fila['texto'] . '<br><br><p align="right">' . $fila['fecha'] . '</p></div></div></div><br>
            <input type="hidden" value="' . $fila['id_db'] . '" id="filtraxiun" name="filtraxiun"></form>';
            $nulacion++;

                }
                }
                
        }
        if($nulacion > 0){

        }else{
            echo '<h3 align="center"><i class="far fa-smile-beam"></i>&nbsp;No tienes notificaciones, estas al día&nbsp;<i class="far fa-smile-beam"></i></h3>';
        }
    }

    if(isset($_POST['smit5448'])){
        $filtro = $_POST['filtraxiun'];
        $sql = "UPDATE notificaciones SET readed='1' WHERE id_db LIKE '$filtro'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            echo '<script> readednow(); </script>';
        }
    }
}else{
    echo '<h3 align="center"><i class="far fa-smile-beam"></i>&nbsp;No tienes notificaciones, estas al día&nbsp;<i class="far fa-smile-beam"></i></h3>';
}
    echo '<div class="container" align="center">';
    echo '<br><br><br><h4><a href="./all-notify.php">Ver todas las Notificaciones</a></h4>';
    echo '</div>';
    ?>

</body>
</html>