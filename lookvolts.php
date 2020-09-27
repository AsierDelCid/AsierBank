<?php
session_start();
$contador = 0;
require("../conexion.php");
$sql = "SELECT * FROM notificaciones WHERE receptor='Asier Bank'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
  while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $contador++;
  }
}else{
  exit;
}

?>