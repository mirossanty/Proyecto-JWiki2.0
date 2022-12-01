<?php
include('conexion/conexion.php');
$ID = $_GET['idsubtema'];
$eliminarsubtema= "DELETE FROM subtema WHERE idsubtema = '$ID'";
$resultado = $conexion->query($eliminarsubtema);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-subtema.php';</script>";
  $conexion->close();
?>