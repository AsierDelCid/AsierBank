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
?>
<div class="container">
<h1 align="center">Cuestiones Frecuentes</h1>
  <ul class="collapsible">
    <li>
      <div class="collapsible-header"><h5>1.- ¿Como funcionan los planes?</h5></div>
      <div class="collapsible-body"><span><h6>1.- ¿Como funcionan los planes? </h6>Los planes del cliente son los siguientes: <b>cliente básico</b>, <b>cliente flash</b> y <b>cliente PRO</b> y estos te dan diferentes ventajas desde no pagar intereses por transferir hasta transferir dinero por teléfono
    </li> 
    <li>
      <div class="collapsible-header"><h5>2.- Recomendaciones ante la elección de plan</h5></div>
      <div class="collapsible-body"><span><h6>2.- Recomendaciones ante la elección de plan</h6>Usted eligió Asier Bank como su banco y ahora pretende saber lo que son los planes, exactamente, los planes son ventjas a largo plazo que te ofrece el banco por una abonación de pago único, el mejor plan es el PRO aunque tambien es el más caro (199€) nosotros siempre recomendamos obviamente el PRO para que no se deban pagar intereses por realizar transferencias ya que si eliges otro plan existen intereses por las transferencias, si eliges el plan Flash (Gratis) deberás pagara intereses del 5% por la transferencia y si no has elegido ningún plan y eres un cliente básico deberás pagar el 10% de intereses, al final, si no vas a realizar muchas transferencias <b>te resulta mejor el plan Flash</b> aunque si sabes que vas a realizar muchas transferencias deberás contratar el PRO <br><h6>¿Como Cambiar de Plan?</h6> Desde Ajustes del Cliente acceda a <a href="./ajustes-plan.php">Tu Plan</a> desde ahí podrás darte de baja en el plan actual que tengas, contratar nuevo plan mejorarle o bajarse a un plan distinto</span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>3.- Seguridad</h5></div>
      <div class="collapsible-body"><span><h6>3.- La seguridad</h6><br>La seguridad de nuestros usuarios es de vital importancia para nosotros, así proveendo, de una seguridad avanzada a cualquier plan desde el cliente básico (sin selección de ningún plan) hasta el cliente PRO, nuestra seguridad se compone de un filtro de carácteres mysqli_real_escape_string para detectar todos los carácteres que puedan realizar un efecto no deseado sobre la base de datos, además de, consultas preparadas, como ves nuestra seguridad es muy avanzada de forma general pero como sabemos que vuestros datos son importantes ninguna persona podrá entrar a vuestra cuenta ya que como ves el banquero puede crearte la cuenta o puedes creartela tu desde la web pero siempre tienes que elegir tu el PIN sin necesidad de terceros, este pin pasa a la base de datos totalmente encriptado por medio de <a target="_blank" href="https://www.php.net/manual/es/function.hash.php">hash</a> <i class="fas fa-external-link-alt"></i> (Nivel 10) ¡Ni siquiera nosotros podemos acceder a tu cuenta! por lo que no se preocupe ya que nuestra seguridad es mas avanzada que la mayoría del resto </span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>4.- PIN de Acceso</h5></div>
      <div class="collapsible-body"><span><h6>4.- Pin de Acceso</h6><br>Si es la primera vez que accedes al sistema y te registras en el no tendrás ningun PIN de acceso y deberás iniciar sesión con tu DNI y con el token de cuenta que te aparece al darle a "Ayuda de registro" mientras estás realizando el registro solo es válido el que observas mientras realizas el registro, si no consigues obtenerle, presentando tu DNI en cualquier oficina Asier Bank te dicen el Token de Cuenta, al acceder por primera vez deberás crear un pin que no se te olvide desde 4 digitos hasta 6 pueden ser alfanuméricos (incluir letras y números) aunque recomendamos que sean numéricos por la poca longevidad del pin y para hacerlo más común </span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>5.- Como Cambiar de Plan</h5></div>
      <div class="collapsible-body"><span><h6>5.- Como cambiar de Plan</h6><br>Para cambiar de plan debes iniciar sesión en tu cuenta, con tu PIN, todo ya configurado, en la parte superior observarás una barra en la que hay una opción "Ajutes del Cliente" al presionarla te aparecerán múltiples opciones deberás acceder a "Tu Plan" desde ahí puedes ver tu plan mejorarlo o degradarlo</span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>6.- Como Realizar transferencias</h5></div>
      <div class="collapsible-body"><span><h6>6.- Como Realizar transferencias</h6><br>Para realizar transferencias debes acceder al menu de color rojo superior ir a "Ajutes del Cliente" y acceder a "Panel" desde panel puedes acceder a la opción "Realizar Transferencia" y dependiendo del plan que tengas contratado si tienes Flash o PRO podrás realizar transferencia por teléfono, etc....</span></div>
    </li>
    <li>
      <div class="collapsible-header"><h5>7.- Sigo teniendo más dudas</h5></div>
      <div class="collapsible-body"><span><h6>7.- Si sigues teniendo más dudas óngase en contacto con una oficina desde nuestro sistema accediendo a su cuenta desde la barra de navegación "Ajustes Cliente" accede a "Panel" y en Panel acceder a "Notificaciones" y "Enviar notificación al Banco" y ellos muy simpáticamente te aclararán la duda</span></div>
    </li>
  </ul>













  </div>
</body>
</html>