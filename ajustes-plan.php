<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones PRO</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
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
        header("location: ./area-clientes.php");exit;
    }
    require("../conexion.php");
    $dnimi = $_SESSION['cliente'];
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
    $resultados = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
            $banmi = $fila['banned'];
            $promi = $fila['pro'];
            $flashmi = $fila['flash'];
        }
    }
    if($banmi != 0){
        header("location: ./area-clientes.php");exit;
    }
    require("./navbar.php");
    if($promi == '1'){
        $plan = 'PRO';
    ?>
    <div class="container">
    <h3 align="center">Activado el</h3>
    <h1 align="center">P<i class="fab fa-r-project fa-2x"></i>O</h1>
    <div class="row">
    <div class="col s6">
    <form action="./pro-options.php">
    <button type="submit" class="btn btn-large btn-block waves-effect waves-light red">Opciones PRO&nbsp;&nbsp;<i class="fab fa-r-project fa-2x"></i></button>
    </form>
    </div>
    <div class="col s6">
    <form action="./des-pro.php">
    <button type="submit" class="btn btn-large btn-block waves-effect waves-light red">Desactivar PRO &nbsp; <i class="fas fa-user-minus"></i></button>
    </form>
    </div>
    </div>
    </div>
    <?php
    }elseif($flashmi == '1'){
        $plan = "Flash";
    ?>
    <div class="container">
    <div class="row">
    <div class="col s3"></div>
    <div class="col s6"><br><br>
    <div style="border: 1px black solid; border-radius: 10px;" align="center">
    <h3>
    <i class="fas fa-bolt"></i> Activado Flash <i class="fas fa-bolt"></i></h3>
    <p align="right"><a href="./desactivar-flash.php">¿Desea Desactivarlo?</a>&nbsp;&nbsp;</p>
    </div>
    </div>
    </div><br><br><br>
    <a href="./cambia-plan.php"><h3 align="center">Mejorar Plan</h3></a>



    </div>
    <?php
    }else{
        $plan = "No Contratado";
    ?>
    <div class="row"><br><br><br>
    <div class="col s3"></div>
    <div class="col s5">
    <div style="border: 1px black solid; border-radius: 10px; margin-left: 5em; padding: 10px;">
    <h2 align="center">No tiene contratado ningún plan</h2>
    <a href="./cambia-plan.php"><h4 align="center">Contrata Uno</a>
</div>
</div>
</div>

    <?php
    }
    ?><br><br><br><br><br>
    <div class="row">
    <div class="col s3"></div>
    <div class="col s5">
    <div style="border: 2px black solid; margin-left: 10em;">
    <h5 align="center">Plan Contratado: <b><?php echo $plan; ?></b></h5>
    <?php
    if($plan == 'PRO'){
    ?>
    <a href="./des-pro.php"><h6 align="center">Degradar Plan</h6></a>
    <?php
    }elseif($plan == 'Flash'){
    ?>
    <a href="./desactivar-flash.php"><h6 align="center">Degradar Plan</h6></a>
    <a href="./pro-panel.php"><h6 align="center">Mejorar Plan</h6></a>
    <?php
    }else{

    }
    ?>
    </div>
    </div>
    </div>
</body>
</html>