<?php
include('conexion/conexion.php');
session_start();
if (!isset($_SESSION['idusuario'])) {
  header("Location:../login.php");
}
//mostrar informacion de usuario logueado
$iduser = $_SESSION['idusuario'];
$sql = "SELECT usuario,contrasena,nombreR,apellidos,email,profesion FROM usuario WHERE idusuario='$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc(); //array asociativo

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Panel colaboradores</title>
  <link rel="stylesheet" href="../css/estilo-sidebar.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
  <!-- CSS -->
  <link rel="stylesheet" href="../css/admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-java'></i>
      <span class="logo_name">
        <center>JWiki</center>
      </span>
    </div>
    <div class="user slide-content">
      <div class="perfil">
        <div class="img">
          <center>
            <img src="../img/usuario.png" alt="">
          </center>
        </div>
        <div class="name">
          <h4 class="text-center text-white"><!--nombre borrado--></h4>
        </div>
      </div>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Contenido JWiki</span>
        </a>
        <?php
        if ($_SESSION['idrol'] == 1) {

        ?>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Usuarios</a></li>
          </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection'></i>
            <span class="link_name">Usuarios</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Temas</a></li>
          <li><a href="verAdmin.php">Ver usuarios</a></li>
          <li><a href="agregarAdmin.php">Agregar usuarios</a></li>
          <li><a href="ver-listaNegra.php">Ver lista negra</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection'></i>
            <span class="link_name">Ver contenido</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Ver contenido</a></li>
          <li><a href="ver-parrafo.php">Ver párrafos</a></li>
          <li><a href="ver-subparrafo.php">Ver subpárrafos</a></li>
          <li><a href="ver-subtema.php">Ver subtemas</a></li>
          <li><a href="ver-video.php">Ver vídeos</a></li>
          <li><a href="ver-codigo.php">Ver código agregado</a></li>
          <li><a href="ver-referencia.php">Ver referencias</a></li>

        </ul>
      </li>
    <?php } ?>
    <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bx-collection'></i>
          <span class="link_name">Agregar contenido </span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Agregar contenido </a></li>
        <li><a href="agregar-parrafo.php">Agregar párrafo </a></li>
        <li><a href="agregar-subparrafo.php">Agregar subpárrafo </a></li>
        <li><a href="agregar-subtema.php">Agregar subtema </a></li>
        <li><a href="agregar-video.php">Agregar vídeo </a></li>
        <li><a href="agregar-codigo.php">Agregar código </a></li>

      </ul>
    </li>
    <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bx-collection'></i>
          <span class="link_name">Perfil</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">Perfil</a></li>
        <li><a href="perfil.php">Ver Perfil</a></li>
      </ul>
    </li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="../img/logo2.jpeg" alt="profileImg">
        <div class="name-job">
          <div class="profile_name"><?php
                                    echo utf8_decode($row['nombreR']);
                                    ?></div>
          <div class="job">
            <li>
              <a href="cerrarsesion.php">
                <span class="link_name">Cerrar sesi&oacute;n</span>
              </a>
              <ul class="sub-menu blank">
                <li><a class="link_name" href="index.php">Volver al inicio</a></li>
              </ul>
            </li>
          </div>
        </div>
      </div>

    </div>
    </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="titulo">
        <h2>Editar tu perfil de colaborador</h2z>
      </span>
    </div>
    <div class="container f-c texto">
      <br>
      <div class="container form">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Nombre</span>
            </div>
            <input type="text" name="nombreR" class="form-control" placeholder="Nombre" value="<?php echo $row['nombreR']; ?>" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Apellidos</span>
            </div>
            <input type="text" name="apellidos" class="form-control" class="form-control" value="<?php echo $row['apellidos']; ?>" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Profesión</span>
            </div>
            <input type="text" name="profesion" value="<?php echo $row['profesion']; ?>" class="form-control" placeholder="Profesión" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Usuario</span>
            </div>
            <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <input type="text" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email" name="email" required>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">@Email</span>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" aria-label="Recipient's username" name="pass" required>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Contraseña</span>
            </div>
          </div>
          <br>
          <input type="hidden" name="ID" value="<?php echo $iduser; ?>">
          <button type="submit" name="editar" class="btn btn-secondary btn-lg btn-block mx-auto btn-e texto-enlace">Editar</button>
        </form>
        <?php
        if (isset($_POST["editar"])) {
          $usuario = $_POST["usuario"];
          $nombreR = $_POST["nombreR"];
          $apellidos = $_POST["apellidos"];
          $email = $_POST["email"];
          $profesion = $_POST["profesion"];
          $id = $_POST["ID"];
          if ($_POST["pass"] == "") {
            $password = $row["contrasena"];
          } else {
            $password = sha1($_POST["pass"]);
          }

          $sqlmodificar = "UPDATE usuario SET usuario = '$usuario',
                      contrasena ='$password',
                      nombreR ='$nombreR',
                      apellidos = '$apellidos',
                      email ='$email',
                      profesion = '$profesion'
          WHERE idusuario = '$id' ";

          $modificado = $conexion->query($sqlmodificar);
          if ($modificado > 0) {
            echo "<script>
            alert('Tus datos han sido modificados exitosamente');
            window.location='perfil.php';
            </script>";
          } else {
            echo "<script>
            alert('Error al Modificar');
            window.location='perfil.php';
            </script>";
          }
        }
        $conexion->close();
        ?>
        <br><br>
  </section>


  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>