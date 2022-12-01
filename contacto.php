<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/contacto.css">
    <title>Document</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-dark bg-jwiki1">
        <a class="navbar-brand texto-enlace nav-item" href="index.php">
            <img src="img/arrow-back.png" width="32" height="32" class="d-inline-block align-top" alt="">
             Volver al inicio
        </a>
        <span class="navbar-text-active titulo text-white"><h4>CONTACTO</h4></span>
    </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <img src="img/logo.png" class="mx-auto" alt="">
            </div>
            <div class="row agradecimiento">
                <h1 class="mx-auto titulo">¡Gracias por visitar JWiki!</h1>
                <p class="mx-auto text-center texto">Agradecemos que haya visitado JWiki y que  quiera ponerse en contacto con nosotros. Puede utilizar el siguiente formulario para env&iacute;ar su mensaje y nosotros lo atenderemos a la brevedad respondiendo al correo electr&oacute;nico introducido en el formulario.</p>
            </div>
            <hr>
            <form action="https://formspree.io/f/xqkjwrby" id="form" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text caja-form texto" id="basic-addon1">Nombre</span>
                            </div>
                            <input type="text" class="form-control texto" id="name" placeholder="Nombre completo" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text caja-form texto" id="basic-addon2">Correo electr&oacute;nico</span>
                            </div>
                            <input type="text" class="form-control texto" id="email" placeholder="Correo electr&oacute;nico" name="_replyto" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text caja-form texto">Mensaje</span>
                            </div>
                            <textarea class="form-control texto" id="msj" placeholder="Escribe tu mensaje" name="message" required></textarea>
                        </div>
                        <br>
                        <div>
                            <input type="submit" id="btn-enviar" class="btn btn-enviar btn-lg btn-block texto" value="ENVIAR">
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-justify texto"> JWiki es una aplicaci&oacute;n desarrada por alumnos de la carrera de Ing. en Desarrollo y Gesti&oacute;n de Software de la Universidad Tecnol&oacute;gica del Sureste de Veracruz, dicha universidad se encuentra en la siguiente ubicaci&oacute;n. </p>
                        <div class="ubicacion">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15174.00518360293!2d-94.4017236!3d18.0483335!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfacfdae8bf7da4c1!2sUniversidad%20Tecnol%C3%B3gica%20del%20Sureste%20de%20Veracruz!5e0!3m2!1ses!2smx!4v1668303458058!5m2!1ses!2smx" width="650" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div> 
                    </div>                  
                </div>    
            </form>
        </div>
    </main>
    <br>
    <div>

  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #1c2331"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4"
             style="background-color: #6351ce"
             >
      <!-- Left -->
      <div class="me-5">
        <span class="texto">Contactanos a trav&eacute;s de nuestras redes sociales:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="#" class="text-white me-4">
          <img src="img/ico-face.png" alt="">
        </a>
        <a href="" class="text-white me-4">
          <img src="img/ico-twitter.png" alt="">
        </a>
        <a href="" class="text-white me-4">
          <img src="img/ico-insta.png" alt="">
        </a>
        <a href="" class="text-white me-4">
          <img src="img/ico-linkendin.png" alt="">
        </a>
        <a href="" class="text-white me-4">
          <img src="img/ico-git.png" alt="">
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3 texto"
         style="background-color: rgb(138, 108, 247)"
         >
      © 2022 Copyright:
      <a class="text-white" href="#"
         >JWiki - UTSV - IDGS</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>