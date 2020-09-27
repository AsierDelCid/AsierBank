<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
</head>
<body>
    <?php
    session_start();
    require("../conexion.php");
    if(isset($_SESSION['cliente'])){
        $usermi = $_SESSION['cliente'];
        $sql = "SELECT * FROM clientes WHERE dni LIKE '$usermi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rankmi = $fila['banned'];
            }
        }else{
            exit;
        }
if($rankmi != 0){
    header("location: ./area-clientes.php");exit;
}
require("./navbar.php");
$sql = "SELECT * FROM prestamos WHERE dni LIKE '$usermi' ORDER BY cantidad  DESC";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    echo '      <table>
    <thead>
      <tr>
          <th>Cantidad a Pagar Aún</th>
          <th>Estado</th>
          <th>Razón del Préstamo</th>
          <th>Fecha de Inicio</th>
          <th>Último Pago</th>
          <th>Cantidad Inicial <br>(Sin Intereses)</th>
          <th>Intereses</th>
      </tr>
    </thead>

    <tbody>';
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        if($fila['estado'] == 'no'){
            $estado = 'Pagado';
        }else{
            $estado = 'Activo';
        }
        echo '
        <tr>
            <td>' . $fila['cantidad'] . '€</td>
            <td>' . $estado . '</td>
            <td>' . $fila['razon'] . '</td>
            <td>' . $fila['fecha'] . '</td>
            <td>' . $fila['ultpago'] . '</td>
            <td>' . $fila['cinicial'] . '€</td>
            <td>' . $fila['intereses'] . '€</td>
          </tr>';
    }
}else{
    echo '<br><br><br><div class="row"><div class="col s3"></div><div style="border: 1px black solid; margin-left: 4em; border-radius: 10px;" class="col s5"><i class="far fa-frown fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-frown fa-3x"></i><h3 align="center">No tienes ningún préstamo concedido, <a href="./solicitar-prestamo.php">solicita uno</a></div></div>';
}
    }
    ?>
</body>
</html>