<?php
session_start();

// Verifica que el usuario tenga sesión iniciada y productos en el carrito
if (!isset($_SESSION['usuario_id'])) {
    header("Location: inicio_sesion.php?requerido=1");
    exit();
}

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit();
}

// Calcula el monto total a pagar
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += ($item['precio'] * $item['cantidad']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Pago con Tarjeta</title>
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

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            padding: 15px 20px;
            display: inline-block;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .contenedor-pago {
            width: 92%;
            max-width: 500px;
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
            margin-bottom: 15px;
            text-align: center;
            font-size: 1.5rem;
        }

        .total-resumen {
            background-color: #f8f9fa;
            border: 1px dashed #1428a0;
            padding: 12px;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            color: #1428a0;
            margin-bottom: 25px;
            border-radius: 4px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            text-align: left;
        }

        label {
            font-weight: bold;
            font-size: 0.9rem;
            color: #444444;
        }

        input {
            padding: 11px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 0.95rem;
            width: 100%;
        }

        .row-tarjeta {
            display: flex;
            gap: 10px;
        }

        .btn-pagar {
            background-color: #00d285;
            color: #ffffff;
            padding: 14px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            transition: background-color 0.2s;
        }

        .btn-pagar:hover {
            background-color: #00a86b;
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
            <a href="carrito.php">Volver al Carrito</a>
        </div>
        <div style="color: #ffffff; font-weight: bold; padding: 15px 0;">
            Cliente: <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>
        </div>
    </nav>

    <div class="contenedor-pago">
        <h2>Formulario de Pago con Tarjeta</h2>
        
        <div class="total-resumen">
            Monto Total a Pagar: $<?php echo number_format($total, 2); ?> MXN
        </div>

        <form action="finalizar_compra.php" method="POST">
            <div class="form-group">
                <label for="titular">Nombre del Titular de la Tarjeta:</label>
                <input type="text" id="titular" name="titular" required placeholder="Como aparece en la tarjeta">
            </div>

            <div class="form-group">
                <label for="tarjeta">Número de Tarjeta de Crédito:</label>
                <input type="text" id="tarjeta" name="tarjeta" required maxlength="16" pattern="[0-9]{16}" placeholder="16 dígitos sin espacios">
            </div>

            <div class="row-tarjeta">
                <div class="form-group" style="flex: 1;">
                    <label for="expiracion">Fecha de Expiración:</label>
                    <input type="text" id="expiracion" name="expiracion" required placeholder="MM/AA" maxlength="5">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label for="cvc">Código CVC / CVV:</label>
                    <input type="password" id="cvc" name="cvc" required maxlength="4" pattern="[0-9]{3,4}" placeholder="3 dígitos">
                </div>
            </div>

            <button type="submit" class="btn-pagar">Autorizar Pago de $<?php echo number_format($total, 2); ?> MXN</button>
        </form>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>