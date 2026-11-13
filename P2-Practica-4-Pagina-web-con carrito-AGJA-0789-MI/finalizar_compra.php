<?php
session_start();
require_once 'conexion.php';

// Garantiza que la compra solo sea procesada si hay una sesión activa, formulario de pago enviado y productos en el carrito
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['carrito']) || empty($_SESSION['carrito']) || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: carrito.php");
    exit();
}

$id_usuario = intval($_SESSION['usuario_id']);
$titular    = $conexion->real_escape_string($_POST['titular']);
$tarjeta    = $_POST['tarjeta'];

// Mascarilla para registrar solo los últimos 4 dígitos por motivos de seguridad
$numero_oculto = "**** **** **** " . substr($tarjeta, -4);

// 1. Calcula el monto total
$monto_total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $monto_total += ($item['precio'] * $item['cantidad']);
}

$compra_exitosa = true;

// 2. Registra el pago con tarjeta en la tabla 'pagos_tarjeta'
$sql_pago = "INSERT INTO pagos_tarjeta (id_usuario, titular_tarjeta, numero_tarjeta_oculto, monto_total) 
            VALUES ($id_usuario, '$titular', '$numero_oculto', $monto_total)";

if ($conexion->query($sql_pago) === TRUE) {
    
    // 3. Registra cada producto en la tabla 'compras' vinculándolo al usuario
    foreach ($_SESSION['carrito'] as $item) {
        $nombre_producto = $conexion->real_escape_string($item['nombre']);
        $precio          = floatval($item['precio']);
        $cantidad        = intval($item['cantidad']);
        $subtotal        = $precio * $cantidad;

        $sql_compra = "INSERT INTO compras (id_usuario, nombre_producto, precio, cantidad, subtotal, metodo_pago) 
                       VALUES ($id_usuario, '$nombre_producto', $precio, $cantidad, $subtotal, 'Tarjeta de Crédito')";

        if (!$conexion->query($sql_compra)) {
            $compra_exitosa = false;
            break;
        }
    }
} else {
    $compra_exitosa = false;
}

// 4. AL CONCRETARSE EL PAGO Y LA COMPRA CON ÉXITO, SE LIMPIA EL CARRITO
if ($compra_exitosa) {
    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Orden Confirmada</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333333;
            text-align: center;
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: auto;
        }

        h2 {
            color: #1428a0;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            color: #555555;
            margin-bottom: 25px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            background-color: #1428a0;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        a:hover {
            background-color: #0d1b70;
        }
    </style>
</head>
<body>

    <div class="card">
        <?php if ($compra_exitosa) { ?>
            <h2>¡Pago Aprobado y Compra Registrada!</h2>
            <p>Estimado(a) <strong><?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></strong>, el cobro con la tarjeta finalizada en <strong><?php echo $numero_oculto; ?></strong> y los productos han sido registrados correctamente en MySQL.</p>
            <p style="color: #00a86b; font-weight: bold; margin-bottom: 25px;">✓ El pago fue procesado con éxito y tu carrito se ha vaciado.</p>
            <a href="index.html">Volver a la Tienda</a>
        <?php } else { ?>
            <h2 style="color: red;">Error al Procesar la Compra</h2>
            <p><?php echo $conexion->error; ?></p>
            <a href="carrito.php">Volver al Carrito</a>
        <?php } ?>
    </div>

</body>
</html>
<?php
$conexion->close();
?>