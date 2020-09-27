


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script src="css/materialize.min.js"></script>
    <script src="tostadas.js"></script>
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
</head>
<body>
<?php
if(isset($_SESSION['usuario'])){
?>

    <div class="container">
    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Asier Bank&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    <div class="row">
    <div class="col s4">
    <a href="./clientes/agregarcliente.php">
    <button class="btn waves-effect waves-light btn-block" type="submit" name="action"><i class="fas fa-user-plus"></i> Agregar Cliente</i></button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/consultarcliente.php">
    <button class="btn waves-effect waves-light btn-block" type="submit" name="action"><i class="fas fa-user-cog"></i></i> Consultar Clientes</i></button>
    </a>
    </div>
    <div class="col s4">
    <a href="./clientes/eliminarcliente.php">
    <button class="btn waves-effect waves-light btn-block" type="submit" name="action"><i class="fas fa-user-times"></i> Eliminar Cliente</i></button>
    </a>
    </div>
    </div>
    <div class="row">
    <div class="col s6">
    <a href="./saldo/agregarsaldo.php">
    <button class="btn waves-effect waves-light btn-block" type="submit" name="action"><i class="fas fa-coins"></i> Ingresar Dinero</button>
    </a>
    </div>
    <div class="col s6">
    <a href="./saldo/retirarsaldo.php">
    <button class="btn waves-effect waves-light btn-block" type="submit" name="action"><i class="fas fa-coins"></i> Retirar Dinero</i></button>
    </a>
    </div>
    </div>
    </div>
<?php }else{
    header("Location: ./login/login.php");
}
 ?>
</body>
</html>