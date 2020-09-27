<?php
session_start(); 
if(isset($_SESSION['cliente'])){

}else{
    header("location: ../login/login.php");exit;
}
require("../conexion.php");
$dnimi = $_SESSION['cliente'];
$sql = "UPDATE clientes SET flash='0' WHERE dni LIKE '$dnimi'";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion)>0){
    header("location: ./transacciones.php");exit;
}else{
    header("location: ./transacciones.php");exit;
}

?>