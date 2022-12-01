<?php
// session_start();
// if(isset($_SESSION['usuario'])){
// header("location: php/bienvenido.php");
// }   /*al iniciar sesion desde login manda a esa direccion "bienvenido.php"*/
include('../admin-jwiki/conexion/conexion.php');
$sql="SELECT idrol,rol FROM rol WHERE idrol=2";
$resultado=$conexion->query($sql);
if(!empty($_POST)){
    $nombreR = mysqli_real_escape_string($conexion,$_POST['nombreR']);
    $apellidos = mysqli_real_escape_string($conexion,$_POST['apellidos']);
    $email = mysqli_real_escape_string($conexion,$_POST['email']);
    $profesion = mysqli_real_escape_string($conexion,$_POST['profesion']);
    $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
    $rolusuario =$_POST['tipo_rol'];
    $contrasena = mysqli_real_escape_string($conexion,$_POST['contrasena']);
    $contrasena_encriptada=sha1($contrasena);

    $sqlusuario= "SELECT idusuario FROM usuario WHERE usuario='$usuario'";
    $resultadousuario = $conexion->query($sqlusuario);
    $filas = $resultadousuario->num_rows;
    if ($filas>0) {
echo "<script>
alert('El usuario ya existe');
window.location='acceder.php';</script>";
    }else{
        $sqlusuario2 = "INSERT INTO usuario(usuario,contrasena,idrol,nombreR,apellidos,email,profesion) VALUES ('$usuario','$contrasena_encriptada','$rolusuario','$nombreR','$apellidos','$email','$profesion')";
         $resultadouser=$conexion->query($sqlusuario2);
         
        if ($resultadouser>0) {
            echo "<script>
alert('Registro exitoso');
window.location='login.php';</script>";
        }else{
            echo "<script>
alert('Error al registrarse');
window.location='acceder.php';</script>";
        }
    }
}
?> 