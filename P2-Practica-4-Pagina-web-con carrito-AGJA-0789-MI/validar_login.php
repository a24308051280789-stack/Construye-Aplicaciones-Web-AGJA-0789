<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inicio_sesion.php');
    exit();
}

$correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

if (!$correo || !is_string($password) || $password === '') {
    header('Location: inicio_sesion.php?error=1');
    exit();
}

$stmt = $conexion->prepare(
    'SELECT id_usuario, nombre, correo, password FROM usuarios WHERE correo = ? LIMIT 1'
);
if (!$stmt) {
    error_log('No se pudo preparar la consulta de inicio de sesión: ' . $conexion->error);
    http_response_code(500);
    exit('No se pudo iniciar sesión. Inténtalo más tarde.');
}

$stmt->bind_param('s', $correo);
if (!$stmt->execute()) {
    error_log('No se pudo ejecutar la consulta de inicio de sesión: ' . $stmt->error);
    http_response_code(500);
    exit('No se pudo iniciar sesión. Inténtalo más tarde.');
}

$stmt->bind_result($usuarioId, $usuarioNombre, $usuarioCorreo, $passwordGuardada);
if ($stmt->fetch() && (password_verify($password, $passwordGuardada) || hash_equals($passwordGuardada, $password))) {
    $usarHash = password_get_info($passwordGuardada)['algo'] !== null;
    session_regenerate_id(true);
    $_SESSION['usuario_id'] = (int) $usuarioId;
    $_SESSION['usuario_nombre'] = $usuarioNombre;
    $_SESSION['usuario_correo'] = $usuarioCorreo;
    $destino = $_SESSION['login_redirect'] ?? 'index.html';
    if (!in_array($destino, array('carrito.php', 'pago.php'), true)) {
        $destino = 'index.html';
    }
    unset($_SESSION['login_redirect']);
    $stmt->close();

    if (!$usarHash) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $updateStmt = $conexion->prepare('UPDATE usuarios SET password = ? WHERE id_usuario = ?');
        if ($updateStmt) {
            $idActualizar = (int) $usuarioId;
            $updateStmt->bind_param('si', $passwordHash, $idActualizar);
            if (!$updateStmt->execute()) {
                error_log('No se pudo actualizar la contraseña al formato seguro: ' . $updateStmt->error);
            }
            $updateStmt->close();
        } else {
            error_log('No se pudo preparar la actualización segura de la contraseña: ' . $conexion->error);
        }
    }

    $conexion->close();
    header('Location: ' . $destino);
    exit();
}

$stmt->close();
$conexion->close();
header('Location: inicio_sesion.php?error=1');
exit();
?>