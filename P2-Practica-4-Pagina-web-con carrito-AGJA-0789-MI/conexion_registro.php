<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registro.php');
    exit();
}

$nombre = trim((string) ($_POST['nombre'] ?? ''));
$direccion = trim((string) ($_POST['direccion'] ?? ''));
$telefono = trim((string) ($_POST['telefono'] ?? ''));
$ciudad = trim((string) ($_POST['ciudad'] ?? ''));
$estado = trim((string) ($_POST['estado'] ?? ''));
$codigoPostal = trim((string) ($_POST['codigo_postal'] ?? ''));
$fechaNacimiento = trim((string) ($_POST['fecha_nacimiento'] ?? ''));
$correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';
$fechaValida = DateTime::createFromFormat('!Y-m-d', $fechaNacimiento);

if ($nombre === ''
    || strlen($nombre) > 100
    || $direccion === ''
    || strlen($direccion) > 200
    || $telefono === ''
    || strlen($telefono) > 15
    || $ciudad === ''
    || strlen($ciudad) > 100
    || $estado === ''
    || strlen($estado) > 100
    || $codigoPostal === ''
    || strlen($codigoPostal) > 10
    || !$fechaValida
    || $fechaValida->format('Y-m-d') !== $fechaNacimiento
    || !$correo
    || strlen($correo) > 100
    || !is_string($password)
    || $password === '') {
    $conexion->close();
    header('Location: registro.php?error=datos');
    exit();
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conexion->prepare(
    'INSERT INTO usuarios (nombre, direccion, telefono, ciudad, estado, codigo_postal, fecha_nacimiento, correo, password)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

if (!$stmt) {
    error_log('No se pudo preparar el registro de usuario: ' . $conexion->error);
    $conexion->close();
    http_response_code(500);
    exit('No se pudo registrar la cuenta. Inténtalo más tarde.');
}

$stmt->bind_param(
    'sssssssss',
    $nombre,
    $direccion,
    $telefono,
    $ciudad,
    $estado,
    $codigoPostal,
    $fechaNacimiento,
    $correo,
    $passwordHash
);

$registroExitoso = $stmt->execute();
$errorDuplicado = $stmt->errno === 1062;
if (!$registroExitoso && !$errorDuplicado) {
    error_log('No se pudo registrar el usuario: ' . $stmt->error);
}

$stmt->close();
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del registro</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; background: #f4f6f9; color: #333; }
        .card { width: 100%; max-width: 520px; padding: 32px; border-radius: 8px; background: #fff; text-align: center; box-shadow: 0 2px 10px rgba(0, 0, 0, .1); }
        h1 { margin-bottom: 15px; color: #1428a0; font-size: 1.5rem; }
        p { line-height: 1.5; }
        a { display: inline-block; margin-top: 20px; padding: 12px 24px; border-radius: 5px; background: #1428a0; color: #fff; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <main class="card">
        <?php if ($registroExitoso) { ?>
            <h1>Cuenta creada correctamente</h1>
            <p>La cuenta de <?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?> ya está registrada. Inicia sesión para comprar.</p>
            <a href="inicio_sesion.php">Ir a Cuenta</a>
        <?php } else { ?>
            <h1><?php echo $errorDuplicado ? 'Correo ya registrado' : 'No se pudo crear la cuenta'; ?></h1>
            <p><?php echo $errorDuplicado ? 'Ese correo ya tiene una cuenta. Prueba iniciar sesión.' : 'Verifica los datos e inténtalo nuevamente.'; ?></p>
            <a href="<?php echo $errorDuplicado ? 'inicio_sesion.php' : 'registro.php'; ?>"><?php echo $errorDuplicado ? 'Ir a Cuenta' : 'Volver al registro'; ?></a>
        <?php } ?>
    </main>
</body>
</html>
