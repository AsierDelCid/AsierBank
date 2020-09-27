<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Clientes</title>
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
    }else{
        header("location: ../login/login.php");exit;
    }
   require("./navbar.php");
   $dni = $_SESSION['cliente'];
   require("../conexion.php");
   $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
   $resultado = mysqli_query($conexion, $sql);
   if(mysqli_affected_rows($conexion)>0){
       while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
           $banmi = $fila['banned'];
           $nombre = $fila['nombre'];
           $saldo = $fila['saldo'];
       }
   }
   if($banmi != 0){
       header("Location: ../cerrarsesion.php");
   }
   echo "<br><div class='container' align='center'><h3>Bienvenid@ " . $nombre . "</h3></div>"
   ?><br><br>
   <div class="container">
<h4 align="center">Ahora debes elegir la acción que deseas realizar desde <a href="./panel.php"> Ajustes > Panel</a></h4>
</div><br>
<div class="row">
<div class="col s4"></div>
<div class="col s4">
<div class="container">
<h3 align="center" class="salmonete"><?php echo $saldo; ?>€</h3></div></div></div>
<div class="row" align="center">
<div class="col s3"></div>
<div class="col s6">
<div class="container" style="border: 1px black solid; border-radius: 10px;">
<h4><i class="fab fa-apple"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-piggy-bank"></i> Asier Bank <i class="fas fa-piggy-bank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-windows"></i></i></h4>
<p>Para más información acceda a una de nuestras oficinas Asier Bank</p>
</div></div>
<div class="col s3"></div>
</div>
    <?php
    
    ?>
</body>
</html>