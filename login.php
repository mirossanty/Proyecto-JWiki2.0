<?php
include("admin-jwiki/conexion/conexion.php");
session_start();
if (isset($_SESSION['idusuario'])) {
  header("Location:admin-JWiki/bienvenido.php");
}
if (!empty($_POST)) {
  $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
  $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
  $contrasena_encriptada = sha1($contrasena);
  $sql = "SELECT idusuario,idrol FROM usuario WHERE usuario='$usuario'  AND contrasena='$contrasena_encriptada'";
  $resultado = $conexion->query($sql);
  $fila = $resultado->num_rows; //verificar si obtuvo registros
  if ($fila > 0) {
    $fila = $resultado->fetch_assoc();
    $_SESSION['idusuario'] = $fila['idusuario'];
    $_SESSION['idrol'] = $fila['idrol'];
    header('Location:admin-JWiki/admin.php');
  } else {
    echo "<script>
alert('Usuario o contraseña incorrectos');
window.location='login.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="img/favicon_Jwiki.ico" type="image/x-icon">
  <title>Acceso</title>
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="css/estilos-login.css">
  <!-- Fuentes -->

  <script src="https://kit.fontawesome.com/2a8c4fb58f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">

</head>

<body>
  <!-- ID Particles.js -->
  <div id="particles-js"></div>
  <header class="contenedor header">

    <div class="container">
      <form class="box-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">

        <div class="box-title">
          <h2>Iniciar Sesi&oacute;n</h2>
        </div>

        <div class="box-inputs">

          <div class="inputs-email">
            <input type="text" name="usuario" id="usuario" class="input">
            <label for="email" class="label-inputs">Usuario:</label>
          </div>

          <div class="inputs-password">
            <input type="password" name="contrasena" id="contrasena" class="input" placeholder="Type your password">
            <label for="password" class="label-inputs">Contraseña:</label>
          </div>

          <div class="box-btn-login">
            <button class="btn-login" name="ingresar" type="submit" value="enter">Entrar</button>
          </div>
        </div>

        <div class="box-register">
          <p>¿Aun no tienes una cuenta? <a href="register.php">Crea una</a></p>
          <center>
            <p><a href="index.php">Regresar al Inicio</a></p>
          </center>
        </div>

        <div class="break-line">
          <p>O</p>
        </div>

        <div class="box-midias">
          <div class="midia">
            <a href="#" class="link-midias">
              <i class="fa fa-facebook"></i>
            </a>
          </div>

          <div class="midia">
            <a href="#" class="link-midias">
              <i class="fa fa-google"></i>
            </a>
          </div>

          <div class="midia">
            <a href="#" class="link-midias">
              <i class="fa fa-twitter-square"></i>
            </a>
          </div>
        </div>

      </form>
      <div class="hero">
        <p>Bienvenido a</p>
        <h1>Jwiki<h1>
      </div>
    </div>

    <!-- JS Particles.js -->
    <script src="js/particles.min.js"></script>
    <script src="js/particlesjs-config.json"></script>
    <script>
      // Obtener el campo de entrada "usuario" y agregar un evento "input"
      const usuarioInput = document.getElementById("usuario");
      usuarioInput.addEventListener("input", function() {
        // Obtener el valor actual del campo de entrada "usuario"
        const usuarioValor = usuarioInput.value;
        // Verificar si el valor tiene menos de 3 caracteres
        if (usuarioValor.length < 3) {
          // Cambiar el color del borde a rojo
          usuarioInput.style.borderColor = "red";
        } else {
          // Cambiar el color del borde a verde
          usuarioInput.style.borderColor = "green";
        }
      });
    </script>

    <!-- JS FontAwesome -->
</body>

</html>