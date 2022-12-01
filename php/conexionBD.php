<!-- <?php

//$conexion = mysqli_connect("127.0.0.1:3308", "root", "9254", "bdjwiki");


?>   -->
<?php
  $contrasena = '9254';
  $usuario = 'root';
  $nombrebd= 'bdjwiki1.2';
  try {
     $bd = new PDO(
        'mysql:host=127.0.0.1:3308;
         dbname='. $nombrebd,
        $usuario,
         $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") //formato utf-8
     );
  } catch (Exception $e) {
     echo "Error de conexión ". $e->getMessage();
  } 
?>