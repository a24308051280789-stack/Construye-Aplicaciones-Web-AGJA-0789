<?php
// Define la dirección del servidor de la base de datos (local)
$servidor   = "localhost";

// Define el usuario por defecto de MySQL en XAMPP
$usuario    = "root";

// Define la contraseña (por defecto en XAMPP está vacía)
$password   = "";

// Define el nombre de la base de datos a utilizar
$db_nombre  = "tienda_samsung";

// Crea la conexión a la base de datos MySQL usando la extensión mysqli
$conexion = new mysqli($servidor, $usuario, $password, $db_nombre);

// Verifica si ocurrió un error durante la conexión a la base de datos
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>