<?php
include('conexion/conexion.php');
$ID = $_GET['idvideo'];
$eliminarvideo= "DELETE FROM video WHERE idvideo = '$ID'";
$resultado = $conexion->query($eliminarvideo);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-video.php';</script>";
  $conexion->close();
?>