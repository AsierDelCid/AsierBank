<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción Token</title>
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
require("../conexion.php");
require("./navbar.php");
session_start(); 
if(isset($_SESSION['cliente'])){

}else{
    header("location: ../login/login.php");exit;
}
$dnimi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $tokenmi = $fila['token'];
    }
}else{
    exit;
}
if($banmi != 0){
    header("location: ./area-clientes.php");
}
?>
<div class="container">
<h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Enviar Dinero&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    
    <span>Necesita el Token de la persona a enviar dinero</span><br><br>
    <form method="post">
    <div class="input-field">
          <input id="agregaso" name="agregaso" type="number" class="validate" required autocomplete="off">
          <label for="agregaso">Token de la Cuenta</label>
        </div>
        <div align="right">
        <button id="pustup" type="SUBMIT" name="pustup" class="btn-floating btn-large waves-effect waves-light green"><i class="fas fa-paper-plane"></i></button></div>
        </form>
        </div>

        <?php
        if(isset($_POST['pustup'])){
            $tokenfor = mysqli_real_escape_string($conexion, $_POST['agregaso']);
            if($tokenfor == $tokenmi){
                echo '<script> enviartuno(); </script>';exit;
            }
            $sql = "SELECT * FROM clientes WHERE token LIKE '$tokenfor'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){

            }else{
                echo '<script> comprueba(); </script>';exit;
            }
?>

<div class="container">
<form method="post" action="./trashoy-token.php">
<div class="row"><div class="input-field col s3">
<input type="text" id="uluporto" name="uluporto" class="form-control" required autocomplete="off">
<label for="uluporto" class="validate">Cantidad a Transferir</label></div>
<div class="input-field col s5">
<textarea name="causionen" class="materialize-textarea" id="causionen" cols="30" rows="10" required></textarea>
<label for="causionen" class="validate">Concepto de la Transacción</label></div>
<div class="col s2">
<button id="arstazio" name="arstazio" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-plus"></i></button>
</div>
<input type="hidden" name="tokenfor" id="tokenfor" value="<?php echo $tokenfor  ?>" readonly>
<input type="hidden" name="fechinnnna" id="fechinnnna" value="<?php echo date('d/m/Y H:i')  ?>" readonly>
<input type="hidden" name="filtroxi" id="filtroxi" value="<?php echo $filtro  ?>" readonly>
<input type="hidden" name="tokenitxo" id="tokenitxo" value="<?php echo $token  ?>" readonly>
<input type="hidden" name="dnisassssso" id="dnisassssso" value="<?php echo $dni  ?>" readonly>
</form>
</div>
            <?php
        }
        ?>
</body>
</html>