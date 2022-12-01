<?php
include('conexion/conexion.php');
$ID = $_GET['idparrafo'];
$eliminarparrafo= "DELETE FROM parrafo WHERE idparrafo = '$ID'";
$resultado = $conexion->query($eliminarparrafo);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-parrafo.php';</script>";
  $conexion->close();
?>