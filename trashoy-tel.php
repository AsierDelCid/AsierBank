<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción Teléfono</title>
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
        header("location: ../login/login.php");exit;
    }
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $tokenmi = $fila['token'];
            $saldoA = $fila['saldo'];
            $promi = $fila['pro'];
            $flashmi = $fila['flash'];
        }
    }else{
        exit;
    }
    if(isset($_POST['uluporto'])){

    }else{
        header("location: ./transacciones.php");exit;
    }
    $anadir = mysqli_real_escape_string($conexion, $_POST['uluporto']);
    $tokenfor = mysqli_real_escape_string($conexion, $_POST['tokenfor']);
    $concepto = mysqli_real_escape_string($conexion, $_POST['causionen']);
    $fecha = $_POST['fechinnnna'];
    echo '<div class="row"><div class="col s3" style="margin-left: 5em;"></div><div class="col s5">';
    echo '<br><div class="salmonete">';
    echo '<h5 align="center">Para: &nbsp;<i class="fas fa-phone-alt"></i>&nbsp;<b>' . $tokenfor . '</b><br></h5><hr>';
    echo '<h5 align="center">Cantidad: <b>' . $anadir . '€ (Sin Intereses)</b><br></h5></div></div></div>';

    if($promi == '0'){
        $interes = 5;
        if($anadir > 1000){
            echo '<script> cambiaplan(); </script>';
            header("location: ./cambia-plan.php");exit;
        }
    }else{
        $interes = 0;
        if($anadir > 100000){
            header("location: ./cambia-plan.php");
            echo '<script> notant(); </script>';exit;
        }
    }
 

    
    $interes1 = $anadir * $interes;
    $interes2 = $interes1 / 100;
    $saldon = $saldoA - $anadir;
    $total = $anadir + $interes2;
    $cantiti = $saldoA - $total;

    if($saldon <= 0){
        echo '<script> moremoney(); </script>';exit;
    }
    $sql = "SELECT * FROM clientes WHERE telefono LIKE '$tokenfor'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $saldoa = $fila['saldo'];
            $dnifor = $fila['dni'];
            $flashfor = $fila['flash'];
            $banfor = $fila['banned'];
            $tokenyou = $fila['token'];
        }
    }else{
        echo 'Warning: Error 57489325';
        exit;
    }
    if($flashfor == 0){
        echo '<script> noflashfor(); </script> <div align="center">';
        echo '<a href="./transacciones.php" class="btn waves-effect waves-light red">Regresar</a></div>';
        exit;
    }
    if($banfor != 0){
        echo '<script> blocked(); </script>';exit;
    }
    $sql = "UPDATE clientes SET saldo='$cantiti' WHERE token LIKE '$tokenmi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){

    }else{
        echo 'Warning: Error 47477935';
        exit;
    }
    $sql = "INSERT INTO transacciones(dni, tokenre, cantidad, razon, fecha, tipo, tokenem) VALUES ('$dnimi','$tokenyou','$anadir','$concepto','$fecha','transem','$tokenmi')";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){

    }else{
        echo 'Warning-> Error: 14756583';
        exit;
    }
    $sql = "INSERT INTO transacciones(dni, tokenre, cantidad, razon, fecha, tipo, tokenem) VALUES ('$dnifor','$tokenyou','$anadir','$concepto','$fecha','transre','$tokenmi')";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){

    }else{
        echo 'Warning-> Error: 7465758366';
        exit;
    }
    $saldon = $saldoa + $anadir;
    $sql = "UPDATE clientes SET saldo='$saldon' WHERE telefono LIKE '$tokenfor'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        echo '<script> transferido(); </script>';
    }else{
        exit;
    }
    $tokenew = substr($tokenyou, 0, -10);
    $tokenminew = substr($tokenmi, 0, -10);
    echo '<br><br>';
    echo '<div class="container">';
    echo '<div class="row"><div class="col s5"></div><div class="col s2"><a id="dersasta" class="link" onclick="guardararch()">Guardar Recibo</a></div></div>';
    echo '<h3 align="center">Recibo de la Transacción</h3><hr>';
    echo '<h5 align="center">Enviado a: &nbsp;<b><i class="fas fa-phone-alt"></i>&nbsp;' . $tokenfor . '</b> y token: &nbsp;<b><i class="fas fa-money-check-alt"></i>&nbsp;' . $tokenew . '**********</b></h5>';
    echo '<h5 align="center">Fecha y Hora: <b>' . $fecha . '</b></h5>';
    echo '<h5 align="center">Causa: <b>' . $concepto . '</b></h5>';
    echo '<h5 align="center">Cantidad: <b>' . $total . '€ (Con Intereses)</b></h5>';
    if($promi == '1'){
    echo '<h5 align="center">Estado: <b>Pagado de forma Online (<i style="color: #3b83bd; "class="fab fa-r-project"></i>)</b> <i class="fas fa-check" style="color: green"></i></h5>';
    }else{
        echo '<h5 align="center">Estado: <b>Pagado de forma Online (<i style="color: #ffae00;" class="fas fa-bolt"></i>)</b> <i class="fas fa-check" style="color: green"></i></h5>';
    }
    echo '<a href="./transacciones.php" class="btn waves-effect waves-light red">Regresar</a>';
    echo '</div>';
    ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

</body>
</html>