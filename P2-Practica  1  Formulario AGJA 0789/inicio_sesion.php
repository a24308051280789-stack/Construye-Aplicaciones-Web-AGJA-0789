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
    // Muestra mensaje de error si la conexión falla
    echo "<p style='color: red;'>Error al conectar con la base de datos MySQL.</p>";
    // Detiene la ejecución del script
    exit();
}

// Construye la consulta SQL para seleccionar todos los registros ordenados desde el más reciente
$sql = "SELECT id_usuario, nombre, correo, telefono, fecha_registro FROM usuarios ORDER BY id_usuario DESC";

// Ejecuta la consulta SQL en la base de datos
$resultado = $conexion->query($sql);

// Evalúa si la consulta devolvió al menos un registro
if ($resultado && $resultado->num_rows > 0) {
    // Genera la tabla HTML para mostrar los resultados
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha de Registro</th>
          </tr>";
    
    // Obtiene cada fila devuelta por la consulta MySQL
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        // Muestra los campos sanitizando la salida con htmlspecialchars
        echo "<td>" . htmlspecialchars($fila['id_usuario']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['fecha_registro']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Muestra un mensaje en caso de que no existan registros en la tabla
    echo "<p style='color: #777;'>Aún no hay usuarios registrados en la base de datos.</p>";
}

// Cierra formalmente la conexión a la base de datos MySQL
$conexion->close();
?>