<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: inicio_sesion.php');
    exit();
}

require_once 'conexion.php';
$stmt = $conexion->prepare(
    'SELECT nombre, direccion, telefono, ciudad, estado, codigo_postal, fecha_nacimiento, correo
     FROM usuarios WHERE id_usuario = ? LIMIT 1'
);

if (!$stmt) {
    error_log('No se pudo preparar la consulta de cuenta: ' . $conexion->error);
    http_response_code(500);
    exit('No se pudo cargar la cuenta. Inténtalo más tarde.');
}

$usuarioId = (int) $_SESSION['usuario_id'];
$stmt->bind_param('i', $usuarioId);
if (!$stmt->execute()) {
    error_log('No se pudo cargar la cuenta: ' . $stmt->error);
    http_response_code(500);
    exit('No se pudo cargar la cuenta. Inténtalo más tarde.');
}

$stmt->bind_result($nombre, $direccion, $telefono, $ciudad, $estado, $codigoPostal, $fechaNacimiento, $correo);
if (!$stmt->fetch()) {
    $stmt->close();
    $conexion->close();
    $_SESSION = array();
    session_destroy();
    header('Location: inicio_sesion.php?error=1');
    exit();
}
$stmt->close();
$conexion->close();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function escaparCuenta($valor)
{
    return htmlspecialchars((string) ($valor ?? ''), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Samsung Store</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { min-height: 100vh; display: flex; flex-direction: column; background: #f4f6f9; color: #333; }
        header { padding: 20px 10px; background: #1428a0; color: #fff; text-align: center; }
        nav { padding: 12px 20px; background: #0d1b70; }
        nav a { color: #fff; font-weight: bold; text-decoration: none; }
        main { flex: 1; width: 92%; max-width: 700px; margin: 30px auto; padding: 30px; border: 1px solid #ddd; border-radius: 6px; background: #fff; box-shadow: 0 2px 8px rgba(0, 0, 0, .05); }
        h2 { margin-bottom: 8px; color: #1428a0; text-align: center; }
        .subtitulo { margin-bottom: 24px; color: #555; text-align: center; }
        dl { display: grid; grid-template-columns: minmax(150px, 1fr) 2fr; gap: 12px; }
        dt { font-weight: bold; }
        dd { overflow-wrap: anywhere; }
        .acciones { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-top: 28px; }
        .acciones a, .acciones button { display: inline-block; padding: 11px 18px; border: 0; border-radius: 4px; background: #1428a0; color: #fff; font-size: .95rem; font-weight: bold; text-decoration: none; cursor: pointer; }
        .acciones button { background: #b42318; }
        footer { margin-top: auto; padding: 15px; background: #102285; color: #fff; font-size: .85rem; line-height: 1.4; text-align: center; }
        @media (max-width: 520px) { main { padding: 22px 18px; } dl { grid-template-columns: 1fr; gap: 5px; } dd { margin-bottom: 10px; } }
    </style>
</head>
<body>
    <header>
        <h1>Samsung Store</h1>
        <p>Mi Cuenta</p>
    </header>
    <nav><a href="index.html">Volver a la tienda</a></nav>
    <main>
        <h2><?php echo escaparCuenta($nombre); ?></h2>
        <p class="subtitulo">Información de tu cuenta</p>
        <dl>
            <dt>Nombre</dt><dd><?php echo escaparCuenta($nombre); ?></dd>
            <dt>Dirección</dt><dd><?php echo escaparCuenta($direccion); ?></dd>
            <dt>Teléfono</dt><dd><?php echo escaparCuenta($telefono); ?></dd>
            <dt>Ciudad</dt><dd><?php echo escaparCuenta($ciudad); ?></dd>
            <dt>Estado</dt><dd><?php echo escaparCuenta($estado); ?></dd>
            <dt>Código postal</dt><dd><?php echo escaparCuenta($codigoPostal); ?></dd>
            <dt>Fecha de nacimiento</dt><dd><?php echo escaparCuenta($fechaNacimiento); ?></dd>
            <dt>Correo electrónico</dt><dd><?php echo escaparCuenta($correo); ?></dd>
        </dl>
        <div class="acciones">
            <a href="carrito.php">Ir al carrito</a>
            <form action="cerrar_sesion.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo escaparCuenta($_SESSION['csrf_token']); ?>">
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </main>
    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>
</body>
</html>
