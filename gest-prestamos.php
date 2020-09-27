<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Préstamos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <style>
    .resaltar{
        color: red;
    }
    .good{
        color: green;
    }
    </style>
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
    }else{
        header("location: ../login/login.php");exit;
    }
    ?>
     <div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Consultar Préstamos&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
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
            echo '<table>
            <thead>
              <tr>
                  <th>DNI</th>
                  <th>Fecha del Préstamo</th>
                  <th>Razón</th>
                  <th>Último Pago</th>
                  <th>Estado</th>
                  <th>Cantidad a Pagar aún</th>
                  <th>Cantidad Inicial</th>
                  <th>Sin Intereses</th>
              </tr>
            </thead>
    
            <tbody>';
            while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                if($fila['estado'] == 'no'){
                $tokensits = $fila['token'];
                $cantidad = $fila['cantidad'];
                $rason = $fila['razon'];
                $fecha = $fila['fecha'];
                $estado = $fila['estado'];
                $last_pay = $fila['ultpago'];
                $cinicial = $fila['cinicial'];
                $intereses = $fila['intereses'];
                $sin_tereses = $cinicial - $intereses;
                if($estado == 'si'){
                    $estatus = 'Activo';
                }else{
                    $estatus = 'Pagado';
                }
                if($estado == 'si'){
                    $estaito = 'Activo';
                }else{
                    $estaito = 'Pagado';
                }
                echo '<tr>
                <td>' . $dni . '</td>
                <td>' . $fecha . '</td>
                <td>' . $rason . '</td>
                <td>' . $last_pay . '</td>
                <td class="good">' . $estaito . '</td>
                <td>' . $cantidad . '€</td>
                <td>' . $cinicial . '€</td>
                <td>' . $sin_tereses . '€ &nbsp;&nbsp;(' . $intereses . '€)</td>
              </tr>';
            }else{
                $tokensits = $fila['token'];
                $cantidad = $fila['cantidad'];
                $rason = $fila['razon'];
                $fecha = $fila['fecha'];
                $estado = $fila['estado'];
                $last_pay = $fila['ultpago'];
                $cinicial = $fila['cinicial'];
                $intereses = $fila['intereses'];
                $sin_tereses = $cinicial - $intereses;
                if($estado == 'si'){
                    $estatus = 'Activo';
                }else{
                    $estatus = 'Pagado';
                }
                if($estado == 'si'){
                    $estaito = 'Activo';
                }else{
                    $estaito = 'Pagado';
                }
                echo '<tr>
                <td>' . $dni . '</td>
                <td>' . $fecha . '</td>
                <td>' . $rason . '</td>
                <td>' . $last_pay . '</td>
                <td class="resaltar">' . $estaito . '</td>
                <td>' . $cantidad . '€</td>
                <td>' . $cinicial . '€</td>
                <td>' . $sin_tereses . '€ &nbsp;&nbsp;(' . $intereses . '€)</td>
              </tr>';
            }
            }

        }else{echo '<script> comprueba(); </script>';exit;}
        ?>

<?php
    }
    ?>
</body>
</html>