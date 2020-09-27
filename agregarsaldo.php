<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Saldo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
</head>
<body class="container">
<?php
session_start();
require("../conexion.php");
if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
    $resultado = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $ban = $fila['banned'];
        $rankmi = $fila['rango'];
    }
    if($ban != 0){
        header("../usuarios/area-usuarios.php");
    }else{

    }
    if($rankmi < 2){
        header("location: ../usuarios/area-usuarios.php");
    }
?>
<div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Ingresar Dinero&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
    <span>Puedes ingresar dinero desde su DNI o Token de Cuenta</span><br><br>
    <form method="post">
    <div class="input-field">
          <input id="agregaso" name="agregaso" type="number" class="validate" required autocomplete="off">
          <label for="agregaso">Ingresar Dinero</label>
        </div>
        <div align="right">
        <button id="pustup" type="SUBMIT" name="pustup" class="btn-floating btn-large waves-effect waves-light green"><i class="fas fa-paper-plane"></i></button></div>
        </form>
        <?php
        if(isset($_POST['pustup'])){
            $zona = date_default_timezone_get();
            $filtro = mysqli_real_escape_string($conexion, $_POST['agregaso']);
            $sql = "SELECT * FROM clientes WHERE token LIKE '$filtro' OR dni LIKE '$filtro'";
            $resultado = mysqli_query($conexion, $sql);
            if(mysqli_affected_rows($conexion)>0){
                   while($row = mysqli_fetch_array(($resultado), MYSQLI_ASSOC)){
                       $saldo = $row['saldo']; 
                       $token = $row['token'];
                       $dni = $row['dni'];?>
<form method="post" action="./agregacionsaldo.php">
<div class="row"><div class="input-field col s3">
<input type="text" id="uluporto" name="uluporto" class="form-control" required autocomplete="off">
<label for="uluporto" class="validate">Cantidad a Añadir</label></div>
<div class="input-field col s5">
<textarea name="causionen" class="materialize-textarea" id="causionen" cols="30" rows="10" required></textarea>
<label for="causionen" class="validate">Concepto de la Transacción</label></div>
<div class="col s2">
<button id="arstazio" name="arstazio" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-plus"></i></button>
</div>
<input type="hidden" name="saldoxin" id="saldoxin" value="<?php echo $saldo  ?>" readonly>
<input type="hidden" name="fechinnnna" id="fechinnnna" value="<?php echo date('d/m/Y H:i')  ?>" readonly>
<input type="hidden" name="filtroxi" id="filtroxi" value="<?php echo $filtro  ?>" readonly>
<input type="hidden" name="tokenitxo" id="tokenitxo" value="<?php echo $token  ?>" readonly>
<input type="hidden" name="dnisassssso" id="dnisassssso" value="<?php echo $dni  ?>" readonly>
</form>
                      <?php if(isset($_POST['arstazio'])){
                           $anadir = mysqli_real_escape_string($conexion, $_POST['uluporto']);
                           $saldo_final = $saldo + $anadir;
                           $sql = "UPDATE clientes SET saldo='$saldo_final' WHERE token='$filtro' OR dni='$filtro'";
                           $resultado = mysqli_query($conexion, $sql);
                           if(mysqli_affected_rows($conexion)>0){
                            echo '<div class="alert alert-success" role="alert">
                            Se ha agregado correctamente el saldo: ' . $anadir . 'y el saldo final será: ' . $saldo_final . '
                          </div>';
                           }
                       }
            }

            }else{
                echo '<script> datosno(); </script>';

            }
        }
    }else{
        header("location: ../login/login.php");
    }
        ?>
</body>
</html>