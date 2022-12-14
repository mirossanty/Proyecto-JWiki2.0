<?php
include('conexion/conexion.php');
session_start();
if(!isset($_SESSION['idusuario'])){
header("Location:../acceder.php");
}
//mostrar informacion de usuario logueado
$iduser=$_SESSION['idusuario'];
$sql="SELECT usuario,nombreR FROM usuario WHERE idusuario='$iduser'";
$resultado=$conexion->query($sql);
$row=$resultado->fetch_assoc();//array asociativo
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
<style>
  body{
    background-color: #E4E9F7;
  }
</style>
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
            <h4 class="text-center text-white"><!--nombre borrado--></h4>
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
          <li><a href="ver-parrafo.php">Ver p??rrafos</a></li>
          <li><a href="ver-subparrafo.php">Ver subp??rrafos</a></li>
          <li><a href="ver-subtema.php">Ver subtemas</a></li>
          <li><a href="ver-video.php">Ver v??deos</a></li>
          <li><a href="ver-codigo.php">Ver c??digo agregado</a></li>
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
          <li><a href="agregar-parrafo.php">Agregar p??rrafo </a></li>
          <li><a href="agregar-subparrafo.php">Agregar subp??rrafo </a></li>
          <li><a href="agregar-subtema.php">Agregar subtema </a></li>
          <li><a href="agregar-video.php">Agregar v??deo </a></li>
          <li><a href="agregar-codigo.php">Agregar c??digo </a></li>

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
        <div class="profile_name"><?php
                  echo utf8_decode($row['nombreR']);
                  ?></div>
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
    <span class="titulo"><h2>Bienvenido al panel de colaboradores</h2z></span>
  </div>
  <hr>
  
  <h4>De parte del equipo JWiki...</h4>
  <p class="text-justify">Te damos la bienvenida a JWiki. En esta secci??n de JWiki podr??s agregar la informaci??n que como colaborador tienes derecho de aportar.</p>
  <p class="text-justify">En la secci??n de la derecha encontrar??s las diferentes opciones para agregar informaci??n, desde p??rrafos a un tema de tu elecci??n, hasta c??digo de ejemplo que ser?? un gran aporte para los visitantes a la wiki y nuestros colaboradores.Ten en cuenta que todos podemos poner nuestro granito de arena para construir y alimentar la wiki, pero hazlo con responsabilidad para ayudar a todos los lectores.</p>
  <b>Notas de los creadores de JWiki</b> 
  <p>
    <div class="container">
        <ol>
                <li class="text-justify">En las secciones de p??rrafo,subtema y subparrafo est?? la opci??n de colocar el n??mero de posici??n en el que queremos colocar ya sea el p??rrafo, subtema o subparrafo; sin embargo hay que tomar en cuenta que si la posici??n que elijas como colaborador esta ocupada, se colocar?? tu contenido en el siguiente lugar disponible. Por ejemplo si elijes la 1 y se encuentra ocupada, se colocara en el dos si se encuentra libre.</li>
                <li class="text-justify">Para colocar el link en la secci??n de v??deos, te recomendamos subir tu ejemplo a youtube y seguido de esto, colocar el link que se genera cuando se coloca la opcion de compartir e incrustrar como html<></li>
                <li class="text-justify">Te sugerimos siempre verificar antes de guardar tu informaci??n si estas en el tema o subtema que escogiste, para evitar que se suba en otra secci??n que no corresponde.</li>
                                
        </ol>
    </div>
  </p>
</section>


<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>