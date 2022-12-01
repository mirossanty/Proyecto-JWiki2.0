<?php
include('conexion/conexion.php');
session_start();
if(!isset($_SESSION['idusuario'])){
header("Location:../login.php");
}
//mostrar informacion de usuario logueado
$iduser=$_SESSION['idusuario'];
$sql="SELECT usuario,nombreR FROM usuario WHERE idusuario='$iduser'";
$resultado=$conexion->query($sql);
$row=$resultado->fetch_assoc();//array asociativo
$sql="SELECT idtema,tema FROM tema";
$resultado=$conexion->query($sql);
$ID = $_GET['idreferencia']; //obtener id de url
$referencia= "SELECT idreferencia,referencia,idtema FROM referencia WHERE idreferencia = '$ID'";
$resultadoreferencia = $conexion->query($referencia);
$fila= $resultadoreferencia->fetch_assoc();

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
        <i class='bx bxl-java' ></i>
        <span class="logo_name"><center>JWiki</center></span>
       </div>
       <div class="user slide-content">
        <div class="perfil">
          <div class="img">
            <center>
                <img src="../img/usuario.png" alt="">
            </center>
          </div>
          <div class="name">
            <h4 class="text-center text-white"><?php
                  echo utf8_decode($row['nombreR']);
                  ?></h4>
          </div>
        </div>
       </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Contenido JWiki</span>
          </a>
          <?php
                  if ($_SESSION['idrol']==1) {
                
                  ?>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Usuarios</a></li>
          </ul>
        </li>
        <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Usuarios</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Temas</a></li>
          <li><a href="verAdmin.php">Ver usuarios</a></li>
          <li><a href="agregarAdmin.php">Agregar usuarios</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Ver contenido</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
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
            <i class='bx bx-collection' ></i>
            <span class="link_name">Agregar contenido </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
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
            <i class='bx bx-collection' ></i>
            <span class="link_name">Perfil</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
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
        <div class="profile_name"></div>
        <div class="job"> <li>
        <a href="cerrarsesion.php">
          <span class="link_name">Cerrar sesi&oacute;n</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php">Volver al inicio</a></li>
        </ul>
      </li></div>
      </div>
      </div>
      
    </div>
  </li> 
</ul>
</div>

<section class="home-section">
<div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="titulo"><h2>Editar Subpárrafo agregado</h2z></span>
</div>
<div class="container f-c texto">
    <br>
    <div class="container form">
    <form action="<?php $_SERVER["PHP_SELF"]?>"method="post">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Referencias</span>
  </div>
  <input type="text" class="form-control" aria-label="Username" name="referencia" value="<?php echo $fila['referencia']; ?>"aria-describedby="basic-addon1">
</div>
<div class="row mt">
         <label class="col-sm-2 col-sm-2 control-label">Temas</label>
          		<div class="col-lg-4">
          			<div class="form-panel">
                      <select class="form-control" name="temas" required>
            <?php
                while ($fila=$resultado->fetch_assoc()) {?> 
                <option value="<?php echo $fila['idtema'] ?>"><?php echo $fila['tema']  ?></option>
            <?php
                }
            ?>
		</select>
                    </div>
                </div>
</div>
<br>
<input class="form-control" type="hidden" name="ID" value="<?php echo $ID; ?>">
<button type="submit" name="editar"class="btn btn-secondary btn-lg btn-block mx-auto btn-e texto-enlace">Editar</button>
</form>
<?php
if (isset($_POST["editar"])) {
  $referencia = $_POST['referencia'];
  $temas= $_POST['temas'];
  $id= $_POST['ID'];
  $sqlmodificar = "UPDATE referencia SET
  referencia= '$referencia',
  idtema= '$temas'
   WHERE idreferencia= '$id'";
  $modificado = $conexion->query($sqlmodificar);
  if ($modificado>0) {
    echo "<script>
  alert('Registro editado exitosamente');
  window.location='ver-referencia.php';</script>";
  }else{
    echo "<script>
    alert('Error al modificar');
    window.location='ver-referencia.php';</script>";
  }
}

?>
<br><br>
</section>


<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>