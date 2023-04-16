<?php
include('conexion/conexion.php');
$ID = $_GET['idusuario'];
// $eliminarusuario= "DELETE FROM usuario WHERE idusuario = '$ID'";
// $resultado = $conexion->query($eliminarusuario);
// echo "<script>
//   alert('Registro eliminado exitosamente');
//   window.location='verAdmin.php';</script>";
//   $conexion->close();

// Obtener datos del usuario antes de eliminarlo
$obtenerUsuario = "SELECT usuario, contrasena, idrol, nombreR, apellidos, email, profesion FROM usuario WHERE idusuario = '$ID'";
$resultadoUsuario = $conexion->query($obtenerUsuario);
if ($resultadoUsuario->num_rows > 0) {
  $filaUsuario = $resultadoUsuario->fetch_assoc();
  $usuario = $filaUsuario['usuario'];
  $contrasena = $filaUsuario['contrasena'];
  $idrol = $filaUsuario['idrol'];
  $nombreR = $filaUsuario['nombreR'];
  $email = $filaUsuario['email'];
  $profesion = $filaUsuario['profesion'];

  // Eliminar usuario de la tabla usuario
  $eliminarUsuario = "DELETE FROM usuario WHERE idusuario = '$ID'";
  $resultadoEliminarUsuario = $conexion->query($eliminarUsuario);
  if ($resultadoEliminarUsuario) {
    // Insertar usuario en tabla listaNegra
    $insertarListaNegra = "INSERT INTO listanegra (usuario_list, contrasena_list, idrol_list, nombreR_list, email_list, profesion_list) VALUES ('$usuario', '$contrasena', '$idrol', '$nombreR', '$email', '$profesion')";
    $resultadoListaNegra = $conexion->query($insertarListaNegra);
    if ($resultadoListaNegra) {
      echo "<script>alert('Usuario agregado a la lista negra exitosamente');</script>";
    } else {
      echo "<script>alert('Error al agregar usuario a la lista negra');</script>";
    }
  } else {
    echo "<script>alert('Error al eliminar usuario');</script>";
  }
} else {
  echo "<script>alert('No se encontró el usuario');</script>";
}

echo "<script>window.location='verAdmin.php';</script>";

$conexion->close();
