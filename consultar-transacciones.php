<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Transacciones</title>
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
if(isset($_SESSION['cliente'])){
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
        }
    }else{exit;}
    if($banmi != 0){
        header("./area-clientes.php");exit;
    }
    require("./navbar.php");
}
echo '<h3 align="center">Consultar Transacciones</h3><br><br>';
$sql = "SELECT * FROM transacciones WHERE dni LIKE '$dnimi' ORDER by id_db DESC";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
echo ' <div class="container"><table>
<thead>
  <tr>
      <th>Receptor</th>
      <th>Emisario</th>
      <th>Fecha</th>
      <th>Cantidad</th>
      <th>Razón</th>
      <th>Tipo</th>
  </tr>
</thead>

<tbody>';
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        if($fila['tipo'] == 'Ingreso'){
            $tipum = "Ingreso";
            $cantidad = '+' . $fila['cantidad'];
        }elseif($fila['tipo'] == 'Retirada'){
            $tipum = "Retirada";
            $cantidad = '-' . $fila['cantidad'];
        }elseif($fila['tipo'] == 'PagoO'){
            $tipum = "Pago Online";
            $cantidad = '-' . $fila['cantidad'];
        }elseif($fila['tipo'] == 'PagoON'){
            $tipum = "Pago Online";
            $cantidad = '+' . $fila['cantidad'];
        }elseif($fila['tipo'] == 'transem'){
            $tipum = "Transferencia";
            $cantidad = '-' . $fila['cantidad'];
        }elseif($fila['tipo'] == 'transre'){
            $tipum = "Transferencia";
            $cantidad = '+' . $fila['cantidad'];
        }
        if($fila['tokenem'] != 'Asier Bank'){
            $emisario = $fila['tokenem'];
            $emisarionew = substr($emisario, 0, -10);
        }else{
            $emisarionew = 'Asier Bank';
        }
        if($fila['tokenre'] != 'Asier Bank'){
            $emisario = $fila['tokenre'];
            $emisariofew = substr($emisario, 0, -10);
        }else{
            $emisariofew = 'Asier Bank';
        }
        echo ' <tr>';
        if($emisariofew == 'Asier Bank'){
            echo '<td>' . $emisariofew . '</td>';
            }else{
                echo '<td>' . $emisariofew . '**********</td>';
            }
        if($emisarionew == 'Asier Bank'){
        echo '<td>' . $emisarionew . '</td>';
        }else{
            echo '<td>' . $emisarionew . '**********</td>';
        }
        echo '
        <td>' . $fila['fecha'] . '</td>
        <td>' . $cantidad . '€</td>
        <td>' . $fila['razon'] . '</td>
        <td>' . $tipum . '</td>
      </tr>';
    }
  echo ' </tbody>
    </table></div>';
}else{
    
    echo '<div class="row"><div class="col s3"></div> <div class="col s6"><h5 align="center" class="salmonete"><i class="far fa-frown"></i>&nbsp;&nbsp;&nbsp;No existen datos de Transacciones&nbsp;&nbsp;&nbsp;<i class="far fa-frown"></i></div></div></h5>';
}
?>
    
</body>
</html>