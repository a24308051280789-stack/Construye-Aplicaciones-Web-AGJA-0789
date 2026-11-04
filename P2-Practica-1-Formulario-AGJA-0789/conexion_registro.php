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
    // Interrumpe la ejecución del script y muestra el mensaje de error de la conexión
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtiene el valor del campo 'nombre' enviado por el formulario mediante el método POST
$nombre   = $_POST['nombre'];

// Obtiene el valor del campo 'correo' enviado por el formulario mediante el método POST
$correo   = $_POST['correo'];

// Obtiene el valor del campo 'telefono' enviado por el formulario mediante el método POST
$telefono = $_POST['telefono'];

// Obtiene el valor del campo 'password' enviado por el formulario mediante el método POST
$password = $_POST['password'];

// Construye la consulta SQL para insertar los datos recibidos en la tabla 'usuarios'
$sql = "INSERT INTO usuarios (nombre, correo, telefono, password) 
        VALUES ('$nombre', '$correo', '$telefono', '$password')";

?>
<!DOCTYPE html>
<!-- Define el tipo de documento como HTML5 -->
<html lang="es">
<head>
    <!-- Define la codificación de caracteres en UTF-8 -->
    <meta charset="UTF-8">
    
    <!-- Configura el título que aparecerá en la pestaña del navegador -->
    <title>Estado del Registro</title>
    
    <!-- Inicio de la sección de estilos CSS para la página de confirmación -->
    <style>
        /* Define la tipografía, fondo y alineación general del cuerpo */
        body { font-family: Arial, sans-serif; background: #f4f6f9; text-align: center; padding: 50px 20px; margin: 0; }
        
        /* Estiliza la tarjeta contenedor de la respuesta */
        .card { background: white; border-radius: 8px; padding: 30px; display: inline-block; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 500px; width: 100%; box-sizing: border-box; }
        
        /* Aplica color azul institucional al título */
        h2 { color: #1428a0; margin-bottom: 15px; }
        
        /* Estiliza el botón/enlace para volver a la página principal */
        a { display: inline-block; margin-top: 20px; text-decoration: none; background: #1428a0; color: white; padding: 12px 24px; border-radius: 5px; font-weight: bold; }
        a:hover { background: #0d1b70; }
    </style>
</head>
<body>
    <!-- Contenedor principal de la tarjeta de respuesta -->
    <div class="card">
        <?php 
        // Ejecuta la consulta SQL e evalúa si la inserción fue exitosa
        if ($conexion->query($sql) === TRUE): 
        ?>
            <!-- Muestra mensaje de éxito en caso de registrarse correctamente -->
            <h2>¡Usuario Registrado con Éxito!</h2>
            
            <!-- Confirma el nombre del usuario insertado sanitizando la salida con htmlspecialchars -->
            <p>Los datos de <strong><?php echo htmlspecialchars($nombre); ?></strong> se guardaron correctamente en MySQL.</p>
        <?php 
        // Bloque que se ejecuta si ocurrió un error durante la inserción SQL
        else: 
        ?>
            <!-- Muestra mensaje de error en color rojo -->
            <h2 style="color: red;">Error al Registrar</h2>
            
            <!-- Imprime la descripción técnica del error proporcionada por MySQL -->
            <p><?php echo $conexion->error; ?></p>
        <?php 
        // Finaliza la estructura condicional de PHP
        endif; 
        ?>
        
        <!-- Enlace explícito a index.html en la raíz local de esta práctica -->
        <a href="./index.html">Volver a la Tienda</a>
    </div>
</body>
</html>
<?php
// Cierra formalmente la conexión a la base de datos MySQL
$conexion->close();
?>