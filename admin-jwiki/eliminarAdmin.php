<?php
include('conexion/conexion.php');
$ID = $_GET['idusuario'];
$eliminarusuario= "DELETE FROM usuario WHERE idusuario = '$ID'";
$resultado = $conexion->query($eliminarusuario);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='verAdmin.php';</script>";
  $conexion->close();
?>