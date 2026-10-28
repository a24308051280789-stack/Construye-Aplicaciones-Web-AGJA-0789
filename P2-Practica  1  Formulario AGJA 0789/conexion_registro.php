<?php
$servidor   = "localhost";
$usuario    = "root";
$password   = "";
$db_nombre  = "tienda_samsung";

// Conectar con MySQL
$conexion = new mysqli($servidor, $usuario, $password, $db_nombre);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Recibir las variables enviadas por el formulario
$nombre   = $_POST['nombre'];
$correo   = $_POST['correo'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

// Inserción de datos
$sql = "INSERT INTO usuarios (nombre, correo, telefono, password) 
        VALUES ('$nombre', '$correo', '$telefono', '$password')";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado del Registro</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; text-align: center; padding: 50px; }
        .card { background: white; border-radius: 8px; padding: 30px; display: inline-block; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #1428a0; }
        a { display: inline-block; margin-top: 15px; text-decoration: none; background: #1428a0; color: white; padding: 10px 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <?php if ($conexion->query($sql) === TRUE): ?>
            <h2>¡Usuario Registrado con Éxito!</h2>
            <p>Los datos de <strong><?php echo htmlspecialchars($nombre); ?></strong> se guardaron correctamente en MySQL.</p>
        <?php else: ?>
            <h2 style="color: red;">Error al Registrar</h2>
            <p><?php echo $conexion->error; ?></p>
        <?php endif; ?>
        
        <a href="index.php">Volver a la Tienda</a>
    </div>
</body>
</html>
<?php
$conexion->close();
?>