<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <script src="../css/materialize.min.js"></script>
    <script src="../js/tostadas.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../css/indice.png" type="image/x-icon">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
    </script>
</head>
<body>
    <?php
session_start();
if(isset($_SESSION['usuario'])){
}else{
    header("../login/login.php");
}
require("../conexion.php");

    ?>
    
    <div class="container">
    <div class="row">
<div class="col s4">
<a href="../inicio.php"><i class="fa-3x far fa-hand-point-left"></i></a></div>

    <h1 align="center"><i class="fas fa-university"></i>&nbsp;&nbsp;&nbsp;Editar Cliente&nbsp;&nbsp;&nbsp;<i class="fas fa-university"></i></h1><hr>
    </div>
    </div>
    <form action="" method="post">
    <div class="row">
    <div class="col s3">
    </div>
    <div class="input-field col s5">
    <input type="text" id="supad" name="supad" required autocomplete="off">
    <label for="supad">Dni del Cliente</label>
    </div>
    <div class="col s3">
    <button type="submit" id="smit5385" name="smit5385" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-paper-plane"></i></button>
    </div>
    </div>
    </form>
<?php
if(isset($_POST['smit5385'])){
    $dni = mysqli_real_escape_string($conexion, $_POST['supad']);
    $sql = "SELECT * FROM clientes WHERE dni LIKE '$dni'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion)>0){
        while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $dniOk = $fila['dni'];
            $nombraso = $fila['dni'];

            if($dniOk != $dni){
                echo '<script> comprueba(); </script>';exit;
        
    }
}
    }else{
        echo '<script> comprueba(); </script>';exit;
    }
?>
<div class="container">
<ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="far fa-user"></i>Nombre y Apellidos</div>
      <div class="collapsible-body"> <form method="post" action="edit-name.php">
      <div class="row">
      <div class="input-field col s6">
      <input type="text" class="password" id="namento1" autocomplete="off" name="namento1" required>
      <label for="namento1" class="validate">Nuevo nombre y apellidos</label>
      </div>
      <div class="input-field col s6">
      <input type="text" id="namento2" name="namento2" autocomplete="off" required>
      <label for="namento2" class="validate">Confirmar nombre y apellidos</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie" name="orticarie" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      <input type="hidden" name="dnisupad1" id="dnisupad1" value="<?php echo $dniOk; ?>">
      </form></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-phone-alt"></i>Teléfono</div>
      <div class="collapsible-body"> <form method="post" action="./edit-phone.php">
      <div class="row">
      <div class="input-field col s6">
      <input type="text" class="password" id="telesonas" autocomplete="off" name="telesonas" required>
      <label for="telesonas" class="validate">Nuevo teléfono</label>
      </div>
      <div class="input-field col s6">
      <input type="text" id="telesonasv2" name="telesonasv2" autocomplete="off" required>
      <label for="telesonasv2" class="validate">Confirmar teléfono</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie" name="orticarie" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
      <input type="hidden" name="dnisupad2" id="dnisupad2" value="<?php echo $dniOk; ?>">
      </form></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="fas fa-house-user"></i>Domicilio</div>
      <div class="collapsible-body"> <form method="post" action="./edit-domicilio.php">
      <div class="row">
      <div class="input-field col s6">
      <textarea autocomplete="off" class="materialize-textarea" name="domisiliado" id="" cols="30" rows="10"></textarea>
      <label for="namento1" class="validate">Nuevo Domicilio</label>
      </div>
      <div class="input-field col s6">
      <textarea autocomplete="off" id="domisiliadov2" name="domisiliadov2" class="materialize-textarea" name="domisiliado" cols="30" rows="10" required></textarea>
      <label for="domisiliado" class="validate">Confirmar nuevo domicilio</label><br>
      </div>
      </div>
      <div align="right">
      <button type="SUBMIT" id="orticarie3" name="orticarie3" class="btn-floating btn-large waves-effect waves-light red"><i class="far fa-save"></i></button>
     <input type="hidden" name="dnisupad3" id="dnisupad3" value="<?php echo $dniOk; ?>">
      </form></div>
    </li>
  </ul>
  
    </div>

<?php
if(isset($_POST['orticarie3'])){
  echo '<script> blocked(); </script>';
}








}
?>
</body>
</html>