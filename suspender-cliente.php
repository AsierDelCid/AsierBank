<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suspender Cliente</title>
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
    require("../conexion.php");
    session_start();
    if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE username LIKE '$usuario'";
    $resultado = mysqli_query($conexion, $sql);
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $ban = $fila['banned'];
        $rankmi = $fila['rango'];
    }
    if($ban == 0){

    }else{
        session_destroy();
        header("location: ../login/login.php");
    }
    if($rankmi < 2){
        header("location: ../usuarios/area-usuarios.php");
    }
        ?>
        <div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Suspender Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    <div class="row" align="center">
    <span>Puedes suspender / desbloquear a un cliente desde su DNI o token de cuenta</span>
    </div>
<form method="post">
<div class="row">
<div class="col s2">
</div>
<div class="input-field col s8">
<input type="text" id="filtrnianto" name="filtrnianto" required>
<label for="filtrnianto" class="validate">Suspender Cliente</label>
</div>
<div class="col s1">
<button type="SUBMIT" id="forgettista" name="forgettista" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-ban"></i></button>
</div>
</div>
</form>


        <?php
        if(isset($_POST['forgettista'])){
            $filtro = mysqli_real_escape_string($conexion, $_POST['filtrnianto']);
            $sql = "SELECT * FROM clientes WHERE dni LIKE '$filtro' OR token LIKE '$filtro'";
            $resultado = mysqli_query($conexion, $sql);
            $contador = 0;
            if(mysqli_affected_rows($conexion)>0){
                while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $ban = $fila['banned'];
                    $token = $fila['token'];
                    if($ban == 0){
                        $contador++;
                    }
                    if($ban == 1){
                        $contador+=2;
                    }
                }
            }else{
                echo '<script> comprueba(); </script>';
                exit;
            }
            if($contador == 1){
                $sql ="UPDATE clientes SET banned='1' WHERE token LIKE '$token'";
                $resultado = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion)>0){
                    echo '<script> blocked(); </script>';
                }else{
                    echo '<script> error(); </script>';exit;
                }
            }else{
                if($contador == 2){
                    $sql = "UPDATE clientes SET banned='0' WHERE token LIKE '$token'";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_affected_rows($conexion)>0){
                        echo '<script> unban(); </script>';
                    }else{
                        echo '<script> error(); </script>';
                    }
                }
            }
            
        }
    }
    ?>
</body>
</html>