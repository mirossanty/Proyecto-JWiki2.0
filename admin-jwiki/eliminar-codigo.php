<?php
include('conexion/conexion.php');
$ID = $_GET['idcodigo'];
$eliminarcodigo= "DELETE FROM codigo WHERE idcodigo = '$ID'";
$resultado = $conexion->query($eliminarcodigo);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-codigo.php';</script>";
  $conexion->close();
?>