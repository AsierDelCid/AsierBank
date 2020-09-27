<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda PRO</title>
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
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
    </script>
</head>
<body>
<?php
session_start(); 
if(isset($_SESSION['cliente'])){

}else{
    header("Location: ./area-clientes.php");exit;
}
require("../conexion.php");
$dnimi = $_SESSION['cliente'];
$sql = "SELECT * FROM clientes WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $banmi = $fila['banned'];
        $promi = $fila['pro'];
    }
}else{
    echo 'Warning: Error 84858592';exit;
}
if($banmi != 0){
    header("location: ./area-clientes.php");exit;
}
?>
<nav>
    <div class="nav-wrapper blue ">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;<i class="fab fa-r-project"></i>Ayuda PRO</a>
      <ul id="nav-mobile" style="text-decoration: none;" class="right hide-on-med-and-down">
<li><a href="./panel.php" style="text-decoration: none;"><i class="fas fa-tools"></i>&nbsp;&nbsp;Panel del Cliente</a></li>
        <li><a class='dropdown-trigger' href='#' style="text-decoration: none;" data-target='dropdown1'>Ajustes de Cliente <i class="fas fa-caret-down"></i></a></li>
        <li><a href="../cerrarsesion.php" style="text-decoration: none;"><i class="fas fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>


  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="./ajustes-cliente.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./panel.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./area-clientes.php"><i class="fas fa-at"></i>Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./tus-datos.php"><i class="far fa-user"></i>Tus Datos</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./ajutes-plan.php"><i class="fas fa-money-bill"></i>Tu Plan</a></li>
  </ul>

<div class="container">
<h1 align="center">P<i class="fab fa-r-project fa-2x"></i>O</h1>
  <ul class="collapsible">
    <li>
      <div class="collapsible-header"><h5>1.- ¿Porqué utilizar el PRO? <i class="fab fa-r-project"></i></h5></div>
      <div class="collapsible-body"><span><h6>1.- ¿Porqué utilizar el PRO? </h6>El PRO está dedicado a <b>entidades profesionales</b> así cuales necesitan transferir grandes cantidades de dinero o poder comunicarse con ellos, como su nombre indica PRO está referido a <b>Proffessional</b>, como está referido a grandes entidades tiene un costo, esta opción aconsejamos tenerla a grandes empresas en cambio a otras personas pueden utiliar <b>totalmente gratis</b> el Flash que aunque no tenga los mismos privilegios a una persona le puede ayudar bastante más <br> <h6>1.2.- Diferencia entre el PRO y otros Planes</h6>La principal diferencia entre otros planes y el PRO es que con el pro <b>no pagas intereses</b> por las transferencias que realizes en cambio con el <b>flash</b> pagas un 5% de intereses por transacción y por ser un <b>cliente básico</b> pagas un 10% de intereses por la transferencia, todas las diferencias son las siguientes: <ul>
      <li>-> Hasta 100.000€ por transferencia telefónica &nbsp;<i style="color: green;"class="fas fa-check"></i></li>
      <li>-> Comunicarse con otros clientes &nbsp;<i style="color: green;"class="fas fa-check"></i></li>
      <li>-> No pagar intereses por las Transacciones &nbsp;<i style="color: green;"class="fas fa-check"></i></li>
      <li>-> Preferente en cuanto a comunicación &nbsp;<i style="color: green;"class="fas fa-check"></i></li>

      </ul></span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>2.- Recomendaciones ante la elección de plan</h5></div>
      <div class="collapsible-body"><span><h6>2.- Recomendaciones ante la elección de plan</h6>Usted eligió Asier Bank como su banco y ahora pretende saber lo que son los planes, exactamente, los planes son ventjas a largo plazo que te ofrece el banco por una abonación de pago único, el mejor plan es el PRO aunque tambien es el más caro (199€) nosotros siempre recomendamos obviamente el PRO para que no se deban pagar intereses por realizar transferencias ya que si eliges otro plan existen intereses por las transferencias, si eliges el plan Flash (Gratis) deberás pagara intereses del 5% por la transferencia y si no has elegido ningún plan y eres un cliente básico deberás pagar el 10% de intereses, al final, si no vas a realizar muchas transferencias <b>te resulta mejor el plan Flash</b> aunque si sabes que vas a realizar muchas transferencias deberás contratar el PRO <br><h6>¿Como Cambiar de Plan?</h6> Desde Ajustes del Cliente acceda a <a href="./ajustes-plan.php">Tu Plan</a> desde ahí podrás darte de baja en el plan actual que tengas, contratar nuevo plan mejorarle o bajarse a un plan distinto</span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>3.- Seguridad</h5></div>
      <div class="collapsible-body"><span><h6>3.- La seguridad</h6><br>La seguridad de nuestros usuarios es de vital importancia para nosotros, así proveendo, de una seguridad avanzada a cualquier plan desde el cliente básico (sin selección de ningún plan) hasta el cliente PRO, nuestra seguridad se compone de un filtro de carácteres mysqli_real_escape_string para detectar todos los carácteres que puedan realizar un efecto no deseado sobre la base de datos, además de, consultas preparadas, como ves nuestra seguridad es muy avanzada de forma general pero como sabemos que vuestros datos son importantes ninguna persona podrá entrar a vuestra cuenta ya que como ves el banquero puede crearte la cuenta o puedes creartela tu desde la web pero siempre tienes que elegir tu el PIN sin necesidad de terceros, este pin pasa a la base de datos totalmente encriptado por medio de <a target="_blank" href="https://www.php.net/manual/es/function.hash.php">hash</a> <i class="fas fa-external-link-alt"></i> (Nivel 10) ¡Ni siquiera nosotros podemos acceder a tu cuenta! por lo que no se preocupe ya que nuestra seguridad es mas avanzada que la mayoría del resto </span></div>
    </li>
  </ul>













  </div>
</body>
</html>