<?php
include("admin-jwiki/conexion/conexion.php");
session_start();
if(isset($_SESSION['idusuario'])){
header("Location:admin-jwiki/admin.php");
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
header('Location:admin-jwiki/admin.php');
}else{
echo "<script>
alert('Usuario o contraseña incorrectos');
window.location='acceder.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <!-- CSS -->
    <link rel="stylesheet" href="css/acceder.css">
    <title>Acceder</title>
</head>
<body>
<div class="modal-wrapper">
    <div class="login-wrapper">
      <div class="collapsed-section hidden">
        <div class="hide-section">
          <h2 class="collapsed-heading">¿Ya tienes una cuenta?</h2>
          <p class="collapsed-text"><br>Presiona el siguiente botón</p>
            <button class="collapsed-btn" onclick="toggleOpen()">Registrarse</button>
        </div>
      </div>
      <div class="form-wrapper login">
        <h2 class="form-heading">Ingresa a tu perfil</h2>
        <form  action="<?php $_SERVER["PHP_SELF"];?>" method="POST" class="form login">
          <span>Ingresa tus datos:</span>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-key"></i>
            <input type="password" name="contrasena" placeholder="Contraseña" value="">
          </div>
          <a href="index.php" id="forgot-password">Volver al inicio</a>
          <button class="form-btn" name="ingresar"type="submit">Entrar</button>
        </form>
      </div>
    </div>
    <div class="signup-wrapper">
      <div class="collapsed-section">
        <div class="hide-section">
          <h2 class="collapsed-heading">¿Eres nuevo aquí?</h2>
          <p class="collapsed-text">Rellena todos los campos<br>¡y unete a nosotros!</p>
            <button class="collapsed-btn" onclick="toggleOpen()">Registrarse</button>
        </div>
      </div>

      <?php
// session_start();
// if(isset($_SESSION['usuario'])){
// header("location: php/bienvenido.php");
// }   /*al iniciar sesion desde login manda a esa direccion "bienvenido.php"*/
include('admin-jwiki/conexion/conexion.php');
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
      <div class="form-wrapper signup hidden">
        <h4 class="form-heading">Registrate</h4>
        <div class="other-icons">
        <form action="registroProceso.php" method="POST" class="form login">
          <!-- <span>Ingresa tus datos</span> -->
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nombre" name="nombre" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Apellidos" name="apellidos" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Usuario" name="usuario" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Correo electrónico" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Profesion" name="profesion" value="">
          </div>
          <div class="input-field">
            <i class="fas fa-key"></i>
            <input type="password" name="contrasena" placeholder="Contraseña" value="">
          </div>
          <label for="TipoUser"></label>
               <select class="form-control"id="TipoUser"name="tipo_rol">
              
              <?php
              while ($fila=$resultado->fetch_assoc()) {?> 
  <option value="<?php echo $fila['idrol'] ?>"><?php echo $fila['rol']  ?></option>
                <?php
                }
             
              ?>
               </select>
          <button class="form-btn" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </div>
<script src="js/acceder.js"></script>
</body>
</html>