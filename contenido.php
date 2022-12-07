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
    <title> Contenido </title>
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
      <button type="button" class="btn btn-blue" onclick="cambiarModo()">Oscuro / Claro</button>
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
          <?php
            }
          ?>
        </ul>
      </li>
    
    <?php
     }
    ?>
      
    <div class="profile-details">
      <div class="profile-content">
        <img src="img/logo2.jpeg" alt="profileImg">
        <div class="name-job">
        <!-- <div class="profile_name"><?php
                  echo utf8_decode($row['nombreR']);
                  ?></div> -->
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
  <?php
    if(isset($_GET['idtema'])){
      $idtema= $_GET['idtema'];
      $sentencia_tema = $bd->prepare("SELECT * FROM tema WHERE idtema=?;");
      $sentencia_tema->execute([$idtema]);
      $tema = $sentencia_tema->fetch(PDO::FETCH_OBJ);
  
      $sentencia = $bd->prepare("SELECT * FROM parrafo inner join tema on parrafo.idtema = tema.idtema WHERE parrafo.idtema=? ORDER BY no_parrafo;");
      $sentencia->execute([$idtema]);
      $parrafos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  
      $sentencia_codigo = $bd->prepare("SELECT * FROM codigo WHERE idtema=?;");
      $sentencia_codigo->execute([$idtema]);
      $codigos = $sentencia_codigo->fetchAll(PDO::FETCH_OBJ);
  
      $sentencia_referencia = $bd->prepare("SELECT * FROM referencia WHERE idtema=? order by referencia asc;");
      $sentencia_referencia->execute([$idtema]);
      $referencias = $sentencia_referencia->fetchAll(PDO::FETCH_OBJ);
  
      $sentencia_video = $bd->prepare("SELECT * FROM video WHERE idtema=?;");
      $sentencia_video->execute([$idtema]);
      $videos = $sentencia_video->fetchAll(PDO::FETCH_OBJ); 
  
     $sentencia_subtema = $bd->prepare("SELECT * FROM subtema WHERE idtema=? order by no_subtema;");
      $sentencia_subtema->execute([$idtema]);
      $subtemas = $sentencia_subtema->fetchAll(PDO::FETCH_OBJ); 
  ?>
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="titulo"><h2><?php echo $tema->tema; ?></h2></span>
    </div>
    <hr>
  <br><br>
    <?php
      foreach($parrafos as $dato){
    ?>
      <p><?php echo $dato->parrafo; ?></p>
    <?php
      }
    ?>
    <?php
      foreach($subtemas as $dato){
      $idsubtema = $dato->idsubtema;
    ?>
    <h4 class="subtitulo"><?php echo $dato->subtema; ?></h4>
      <?php
        $sentencia_ps = $bd->prepare("SELECT * FROM subparrafo WHERE idsubtema=$idsubtema order by no_subparrafo;");
        $sentencia_ps->execute();
        $subparrafos = $sentencia_ps->fetchAll(PDO::FETCH_OBJ);
        foreach($subparrafos as $dato2){
      ?>
      <p><?php echo $dato2->subparrafo; ?></p>
      <?php
         }
      ?>
      <?php
        }
      ?>
    <br>
  <div class="recursos">
    <h3 class="subtitulo">Recursos visuales</h3>
    <hr><br>
  </div>
  <div class="video">
    <?php
      foreach ($codigos as $dato){
    ?>
    <center>
      <h3 class="subtitulo">Ejemplo pr&aacute;ctico</h3>
      <div class="card" style="width: 40rem;">
        <img src="<?php echo 'img/codigos/'.$dato->ruta_imagen; ?>" class="card-img-top" alt="...">
        <div class="card-body exp">
          <p class="card-text"><?php echo $dato->explicacion; ?></p>
        </div>
      </div>
      </center>
    <?php
      }
    ?>
  </div>
  <br>
  <div class="video">
    <?php
      foreach($videos as $dato){
    ?>
    <center>
      <h3 class="subtitulo">Video tutorial</h3>
      <div class="card text-dark bg-light mb-3" style="max-width: 40rem;">
        <div class="card-header tit-v"><h4 class="text-white"><b><?php echo $dato->titulo ?></b></h4></div>
          <div class="card-body exp">
            <iframe width="560" height="315" src="<?php echo $dato->ruta_video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </center>
      <?php
      }
      ?>
  </div>
  <br>
  <div class="referencias">
    <h3 class="subtitulo">Referencias</h3>
    <hr>
    <div class="container-fluid">
      <?php
        foreach ($referencias as $dato){
          echo "<ul>";
            echo "<li>".$dato->referencia."</li>";
          echo "</ul>";
        }
      ?>
    </div>
  </div>
<?php
  }else{
?>
  <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="titulo"><h2>Bienvenido al contendio de JWiki</h2></span>
  </div>
    <hr>
      <br><br>
      <p class="texto">En esta sección encontraras todos los temas referentes a Java y podras consultarlos siempre que quieras y necesites.
      En cada nivel de se encuentra un tema que puede ser de tu interés, a la vez se muestran videos y fragmentos de ejemplo de código asi como ejemplos prácticos. Finalmente para poder ser mas de ayuda para tus trabajos académicos si eres un maestro o estudiante, al final adjuntamos las fuentes consultadas de la información de nuestro contenido.
      Y recuerda que si puedes imaginarlo puedes programarlo...</p>
<?php
  }
?>
</section>

 
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/oscuro.js"></script>
</body>
</html>