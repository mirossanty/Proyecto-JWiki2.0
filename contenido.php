<?php
include 'php/conexionBD.php';
$sentencia =$bd->query("SELECT * FROM nivel;");
$niveles = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="css/estilo-sidebar.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/contenido.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-java' ></i>
        <span class="logo_name">JWiki</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Indice</span>
        </a>
        <?php
          foreach ($niveles as $dato){
        ?>
        <!-- <ul class="sub-menu blank">
          <li><a class="link_name" href="#<?php echo "nivel".$dato -> idnivel ?>"><?php echo $dato -> nivel ?></a></li>
        </ul> -->
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
           <i class='bx bx-collection' ></i>
           <span class="link_name"><?php echo $dato -> nivel ?></span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu" id="<?php echo "nivel".$dato -> idnivel ?>">
        <?php
          $idnivel = $dato -> idnivel;
          /*echo "<li>".$idnivel."</li>";
          exit();*/
          $consulta =$bd->query("SELECT * FROM tema WHERE idnivel = $idnivel ORDER BY no_tema;");
          $temas = $consulta->fetchAll(PDO::FETCH_OBJ);
          foreach ($temas as $dato_tema){
        ?>
          <li><a class="link_name" href="#<?php echo "nivel".$dato -> idnivel ?>"><?php echo $dato -> nivel ?></a></li>
          <li><a href="contenido.php?idtema=<?php echo $dato_tema -> idtema ?>"><?php echo $dato_tema -> tema ?></a></li>
          <!-- <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li> -->
          <?php
            }
          ?>
        </ul>
      </li>
    
    <?php
     }
    ?>
      <!-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Nivel Intermedio</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Nivel Intermedio</  a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
          </ul>
        </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Nivel Avanzado</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Nivel Avanzado</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li> -->
    <div class="profile-details">
      <div class="profile-content">
        <img src="img/logo2.jpeg" alt="profileImg">
        <div class="name-job">
        <div class="profile_name"></div>
        <div class="job"> <li>
        <a href="index.php">
          <span class="link_name">Volver al inicio</span>
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
      <span class="titulo"><h2>Bienvenido al contenido de JWiki</h2z></span>
    </div>
    <hr>
<br><br>
<!-- <p class="texto">En esta sección encontraras todos los temas referentes a Java y podras consultarlos siempre que quieras y necesites.
En cada nivel de se encuentra un tema que puede ser de tu interés, a la vez se muestran videos y fragmentos de ejemplo de código asi como ejemplos prácticos. Finalmente para poder ser mas de ayuda para tus trabajos académicos si eres un maestro o estudiante, al final adjuntamos las fuentes consultadas de la información de nuestro contenido.
Y recuerda que si puedes imaginarlo puedes programarlo...</p> -->
  <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <br>
  <h3 class="subtitulo">Subtema</h3>
  <br>
  <p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <br>
  <div class="video">
    <center>
    <h3 class="subtitulo">Ejemplo pratico</h3>
    <div class="card" style="width: 40rem;">
      <img src="" class="card-img-top" alt="...">
      <div class="card-body exp">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    </center>
  </div>
  <br>
  <div class="video">
    <center>
      <h3 class="subtitulo">Video tutorial</h3>
      <div class="card text-dark bg-light mb-3" style="max-width: 40rem;">
        <div class="card-header tit-v"><h4 class="text-white"><b>Titulo video</b></h4></div>
          <div class="card-body exp">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yUQsB6YeiXA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </center>
  </div>
<div class="referencias">
  <h3 class="subtitulo">Referencias</h3>
  <hr>
  <ol class="container-fluid">
    <li>Referencia 1</li>
    <li>Referencia 2</li>
  </ol>
</div>
</section>

 
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>