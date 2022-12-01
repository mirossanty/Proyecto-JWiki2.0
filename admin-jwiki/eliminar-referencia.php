<?php
include('conexion/conexion.php');
$ID = $_GET['idreferencia'];
$eliminarreferencia= "DELETE FROM referencia WHERE idreferencia = '$ID'";
$resultado = $conexion->query($eliminarreferencia);
echo "<script>
  alert('Registro eliminado exitosamente');
  window.location='ver-referencia.php';</script>";
  $conexion->close();
?>