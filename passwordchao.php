<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>He olvidado mi PIN</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
</head>
<body>
    <?php
    ?>
    <div class="container">
    <form action="" method="post">
    <h3 align="center">He olvidado mi PIN</h3><hr>
    <div class="row">
    <div class="input-field col s6">
    <input type="number" name="dniss2" id="dniss2" required>
    <label for="dniss2">Escribe tu DNI</label>
    </div>
    <div class="input-field col s6">
    <select name="urgesias" id="urgesias" required class="browser-default"> 
    <option value="null" disabled selected>Eliga una opción</option>
    <option value="urgente">Es urgente</option>
    <option value="urgente">No es urgente</option>
    </select>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
    <textarea name="testaso" id="testaso" cols="30" rows="10" class="materialize-textarea" required></textarea>
    <label for="testaso">Escriba su situación</label>
    </div>
    </div>
    <div align="right">
<button type="submit" name="smit485885" id="smit485885" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-paper-plane"></i></button></div>

</form>
<br><br><br><br>
    <a href="./login.php">Regresar</a>
    </div>

    <?php
    $fecha = date("d/m/Y H:i");
    require("../conexion.php");
if(isset($_POST['smit485885'])){
$dnifor = mysqli_real_escape_string($conexion, $_POST['dniss2']);
$texto = mysqli_real_escape_string($conexion, $_POST['testaso']);
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnifor'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
    }
}else{
    echo '<script> dninexist(); </script>';exit;
}
if($banmi != 0){
    echo '<script> blocked(); </script>';exit;
}

$sql = "INSERT INTO notificaciones(fecha, texto, emisor, receptor, readed) VALUES ('$fecha','$texto','$dnifor','Asier Bank','0')";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    echo '<script> prestsend(); </script>';
}else{
    echo '<script> error(); </script>';exit;
}




}

?>
</body>
</html>