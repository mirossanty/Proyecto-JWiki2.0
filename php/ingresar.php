<?php
include("../admin-jwiki/conexion/conexion.php");
session_start();
if(isset($_SESSION['idusuario'])){
header("Location:../admin-jwiki/admin.php");
}
if(!empty($_POST)){
$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
$contrasena = mysqli_real_escape_string($conexion,$_POST['contrasena']);
$contrasena_encriptada=sha1($contrasena);
$sql= "SELECT idusuario,idrol FROM usuario WHERE usuario='$usuario'  AND contrasena='$contrasena_encriptada'";
$resultado=$conexion->query($sql);
$fila=$resultado->num_rows; //verificar si obtuvo registros
if($fila>0){
$fila=$resultado->fetch_assoc(); 
$_SESSION['idusuario']=$fila['idusuario'];
$_SESSION['idrol']=$fila['idrol'];
header('Location:../admin-jwiki/admin.php');
}else{
echo "<script>
alert('Usuario o contraseña incorrectos');
window.location='../acceder.php';</script>";
  }
}
?>