<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar Préstamo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?php
    session_start();
    require("../conexion.php");
    if(isset($_SESSION['usuario'])){
        $usermi = $_SESSION['usuario'];
        $sql = "SELECT * FROM usuarios WHERE username LIKE '$usermi'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rankmi = $fila['rango'];
            }
        }else{
            exit;
        }
        if($rankmi < 2){
            header("location: ../inicio.php");
            exit;
        }
    }else{
        header("location: ../login/login.php");exit;
    }
    ?>
     <div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Pagar Préstamo&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
    <form action="" method="post">
    <div class="row">
    <div class="col s3">
    </div>
    <div class="input-field col s5">
    <input type="number" id="supad" name="supad" required autocomplete="off">
    <label for="supad">Dni / TOKEN</label>
    </div>
    <div class="col s3">
    <button type="submit" id="smit5289" name="smit5289" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-paper-plane"></i></button>
    </div>
    </div>
    </form>
    <?php
    if(isset($_POST['smit5289'])){
        mysqli_set_charset($conexion, 'utf-8');
        $filtro = mysqli_real_escape_string($conexion, $_POST['supad']);
        $sql = "SELECT * FROM clientes WHERE dni LIKE '$filtro' OR token LIKE '$filtro'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $dni = $fila['dni'];
                $token = $fila['token'];
            }
        }else{echo '<script> comprueba(); </script>';exit;}
        $sql = "SELECT * FROM prestamos WHERE dni LIKE '$dni'";
        $resultado = mysqli_query($conexion, $sql);
        if(mysqli_affected_rows($conexion)>0){
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $cantidad = $fila['cantidad'];
                $rason = $fila['razon'];
                $fecha = $fila['razon'];
                $estado = $fila['estado'];
                $id = $fila['id_db'];
                if($estado == 'si'){
                    $estatus = 'Activo';
                }else{
                    $estatus = 'Pagado';
                }
            }
            if($estado == 'no'){
                echo '<script> pagato(); </script>';exit;
            }
        }else{echo '<script> comprueba(); </script>';exit;}
        ?>
    <div class="container">
        <form method="post" action="./pagando-p.php">
<div class="row"><div class="col s2"></div><div class="input-field col s3">
<input type="text" id="uluporto" name="uluporto" class="form-control" required autocomplete="off">
<label for="uluporto" class="validate">Cantidad a pagar</label></div>
<div class="input-field col s5">
<textarea name="causionen" class="materialize-textarea" id="causionen" cols="30" rows="10" required></textarea>
<label for="causionen" class="validate">Concepto de la Transacción</label></div>
<div class="col s2">
<button id="arstazio" name="arstazio" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-plus"></i></button>
</div>
<input type="hidden" name="fechinnnna" id="fechinnnna" value="<?php echo date('d/m/Y H:i')  ?>" readonly>
<input type="hidden" name="ratxon" id="ratxon" value="<?php echo $rason  ?>" readonly>
<input type="hidden" name="fesa" id="fesa" value="<?php echo date("d/m/Y H:i")  ?>" readonly>
<input type="hidden" name="restatul" id="restatul" value="<?php echo $estatus  ?>" readonly>
<input type="hidden" name="cantisad" id="cantisad" value="<?php echo $cantidad  ?>" readonly>
<input type="hidden" name="dnicras" id="dnicras" value="<?php echo $dni  ?>" readonly>
<input type="hidden" name="idasnio" id="idasnio" value="<?php echo $id  ?>" readonly>
</form>
</div>
<?php
    }
    ?>
</body>
</html>