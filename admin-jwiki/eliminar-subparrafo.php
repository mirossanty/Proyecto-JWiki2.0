<?php
include('conexion/conexion.php');
$ID = $_GET['idsubparrafo'];
$eliminarsubparrafo= "DELETE FROM subparrafo WHERE idsubparrafo = '$ID'";
$resultado = $conexion->query($eliminarsubparrafo);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-subparrafo.php';</script>";
  $conexion->close();
?>