# JWiki 2.0

Sitio web para estudiantes que quieren aprender Java, con recursos visuales: videos, ejemplos de código e imágenes. Proyecto de titulación de TSU, realizado en equipo. Enfocado a alumnos de la carrera de Desarrollo de software de la UTSV con dificultad para el aprendizaje del lenguaje de programación Java

## Funcionalidades
- Registro e inicio de sesión con tres niveles de usuario: administrador, estudiante y colaborador
- Contenido sobre Java con videos, código e imágenes
- Panel de administración
- Formulario de contacto

## Tecnologías
- **Backend:** PHP
- **Base de datos:** MySQL, diseñada con MySQL Workbench
- **Frontend:** HTML, CSS, JavaScript
- **Entorno local:** XAMPP
## Estructura
- `admin-jwiki/`: panel de administración
- `admin-jwiki/conexion/`: conexión a la base de datos
- `php/`: Plantilla usada para el panel de administración, lógica del registro de usuarios, conexión a BD.

## Estado del proyecto
Proyecto académico de 2022. El archivo de la base de datos original ya no se conserva, por lo que las instrucciones de instalación están pendientes. Mejoras planeadas:
- Migrar el acceso a la base de datos a PDO con consultas preparadas
- Guardar contraseñas con `password_hash()`
- Agregar un `schema.sql` con datos de prueba

## Autores
Miroslava Santiago Luis ([github.com/mirossanty](https://github.com/mirossanty)), Juan José LM y Ángel Josué GC.
