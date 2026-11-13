<?php
session_start();

$esAgregar = $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['accion'])
    && $_POST['accion'] === 'agregar';

if (!isset($_SESSION['usuario_id']) && !$esAgregar) {
    $_SESSION['login_redirect'] = 'carrito.php';
    header('Location: inicio_sesion.php?requerido=1');
    exit();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($esAgregar) {
    $id_producto = $_POST['id_producto'];
    $nombre      = $_POST['nombre'];
    $precio      = floatval($_POST['precio']);
    $imagen      = $_POST['imagen'];

    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $id_producto) {
            $item['cantidad'] += 1;
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        $_SESSION['carrito'][] = array(
            'id'       => $id_producto,
            'nombre'   => $nombre,
            'precio'   => $precio,
            'imagen'   => $imagen,
            'cantidad' => 1
        );
    }

    $seccionesCatalogo = array(
        'telefonos.php',
        'audifonos.php',
        'tecnologia.php',
        'televisores.php'
    );
    $paginaOrigen = basename(parse_url($_SERVER['HTTP_REFERER'] ?? '', PHP_URL_PATH) ?: '');
    $destino = in_array($paginaOrigen, $seccionesCatalogo, true) ? $paginaOrigen : 'carrito.php';
    header('Location: ' . $destino);
    exit();
}

if (isset($_GET['eliminar'])) {
    $id_eliminar = $_GET['eliminar'];
    foreach ($_SESSION['carrito'] as $index => $item) {
        if ($item['id'] == $id_eliminar) {
            unset($_SESSION['carrito'][$index]);
            break;
        }
    }
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}

if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Carrito de Compras</title>
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #1428a0;
            color: #ffffff;
            text-align: center;
            padding: 20px 10px;
        }

        header h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        header p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        nav {
            background-color: #0d1b70;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            padding: 15px 20px;
            display: inline-block;
            font-weight: bold;
            font-size: 0.95rem;
            transition: background-color 0.2s, color 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background-color: #ffffff;
            color: #1428a0;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-user .btn-cart-nav {
            background-color: #ff9900;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .nav-user .btn-login-nav {
            background-color: #00d285;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .contenedor {
            width: 92%;
            max-width: 950px;
            margin: 30px auto;
            flex: 1;
            background-color: #ffffff;
            padding: 35px 25px;
            border-radius: 6px;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #1428a0;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th {
            background-color: #1428a0;
            color: #ffffff;
            padding: 12px;
            text-align: center;
            font-size: 0.95rem;
        }

        td {
            padding: 12px;
            text-align: center;
            font-size: 0.9rem;
        }

        .prod-img-td {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .total-box {
            text-align: right;
            font-size: 1.2rem;
            font-weight: bold;
            color: #1428a0;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .acciones-cart {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-vaciar {
            background-color: #d9534f;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .btn-comprar {
            background-color: #00d285;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 1rem;
        }

        .btn-eliminar {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            background-color: #102285;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            font-size: 0.85rem;
            margin-top: auto;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <header>
        <h1>Samsung Store</h1>
        <p>P2-Practica-4-Pagina-web-con carrito-AGJA-0789</p>
    </header>

    <nav>
        <div class="nav-links">
            <a href="index.html">Inicio</a>
            <a href="telefonos.php">Teléfonos</a>
            <a href="audifonos.php">Audífonos</a>
            <a href="tecnologia.php">Tecnología</a>
            <a href="televisores.php">Televisores</a>
        </div>
        <div class="nav-user">
            <a href="carrito.php" class="btn-cart-nav">🛒 Carrito (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
            <a href="cuenta.php" class="btn-login-nav">Cuenta</a>
        </div>
    </nav>

    <div class="contenedor">
        <h2>Productos en tu Carrito de Compras</h2>

        <?php if (empty($_SESSION['carrito'])) { ?>
            <p style="text-align: center; color: #777; margin: 30px 0;">Tu carrito de compras está vacío.</p>
            <div style="text-align: center;">
                <a href="index.html" class="btn-comprar" style="background-color: #1428a0;">Ir a la Tienda</a>
            </div>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $item) {
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="Producto" class="prod-img-td"></td>
                            <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                            <td>$<?php echo number_format($item['precio'], 2); ?> MXN</td>
                            <td><?php echo $item['cantidad']; ?></td>
                            <td>$<?php echo number_format($subtotal, 2); ?> MXN</td>
                            <td><a href="carrito.php?eliminar=<?php echo urlencode($item['id']); ?>" class="btn-eliminar">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="total-box">
                Total a Pagar: $<?php echo number_format($total, 2); ?> MXN
            </div>

            <div class="acciones-cart">
                <a href="carrito.php?vaciar=1" class="btn-vaciar">Vaciar Carrito</a>
                <a href="pago.php" class="btn-comprar">Proceder al Pago</a>
            </div>
        <?php } ?>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>