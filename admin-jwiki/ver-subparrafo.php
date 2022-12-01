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

$subparrafo= "SELECT subparrafo.idsubparrafo,subparrafo.subparrafo,subparrafo.no_subparrafo,subtema.subtema FROM subparrafo AS subparrafo 
INNER JOIN subtema AS subtema ON subparrafo.idsubtema = subtema.idsubtema;";
$resultadosubparrafo= $conexion->query($subparrafo);
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
      <i class='bx bx-menu'></i>
      <span class="titulo"><h2>Lista de subpárrafos registrados</h2z></span>
</div>
<div class="container f-c">
    <br>
    <div class="table">
    <table class="table table-bordered border-dark">
  <caption>Lista de párrafos</caption>
  <thead>
    <tr>
      <th scope="col">Subpárrafo</th>
      <!-- <th scope="col">Apellidos</th> -->
      <th scope="col">No.subpárrafos</th>
      <!-- <th scope="col">Profesión</th> -->
      <th scope="col">Subtema</th>
    </tr>
  </thead>
  <tbody>
  <?php
                               while ($regsubparrafo=$resultadosubparrafo->fetch_array(MYSQLI_BOTH)) {
                                echo "<tr>
                                <td>".$regsubparrafo['subparrafo']."</td>
                                <td>".$regsubparrafo['no_subparrafo']."</td>
                                <td>".$regsubparrafo['subtema']."</td>
                                <td><span class='label label-info label-mini'></span></td>
                                <td><a class='btn btn-primary' href='editar-subparrafo.php?idsubparrafo=".$regsubparrafo['idsubparrafo']."' role='button'>Editar✏️</a></td>

                                <td><a class='btn btn-danger' href='eliminar-subparrafo.php?idsubparrafo=".$regsubparrafo['idsubparrafo']."' role='button'>🗑️</a></td>
                                
                            </tr>";
                               }
                               ?> 
  </tbody>
</table>
    </div>
    <br>
</div>
</section>

<script src="../js/script.js"></script>
<script src="../js/script2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>