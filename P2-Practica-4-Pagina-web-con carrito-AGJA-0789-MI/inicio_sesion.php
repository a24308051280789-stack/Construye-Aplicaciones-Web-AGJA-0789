<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-practica 4 AGJA 0789 - Iniciar Sesión</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
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

        .nav-links a:hover {
            background-color: #ffffff;
            color: #1428a0;
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

        .contenedor-login {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card-login {
            background-color: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            border-radius: 6px;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .logo-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1428a0;
            margin-bottom: 20px;
        }

        .card-login h2 {
            color: #1428a0;
            font-size: 1.6rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .card-login p.subtitulo {
            color: #555555;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            color: #444444;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 4px;
            color: #333333;
            font-size: 0.95rem;
            outline: none;
        }

        .link-olvido {
            display: block;
            text-align: left;
            color: #1428a0;
            font-size: 0.85rem;
            text-decoration: none;
            margin-top: 5px;
            margin-bottom: 25px;
        }

        .link-olvido:hover {
            text-decoration: underline;
        }

        .btn-siguiente {
            width: 100%;
            background-color: #1428a0;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-siguiente:hover {
            background-color: #0d1b70;
        }

        .crear-cuenta-box {
            margin-top: 25px;
            font-size: 0.9rem;
            color: #444444;
        }

        .crear-cuenta-box a {
            color: #1428a0;
            text-decoration: none;
            font-weight: bold;
            margin-left: 4px;
        }

        .crear-cuenta-box a:hover {
            text-decoration: underline;
        }

        .error-msg {
            background-color: #fbeaea;
            color: #a61b1b;
            padding: 10px;
            border-radius: 4px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            border: 1px solid #a61b1b;
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
    <link rel="stylesheet" href="nav.css">
</head>
<body>

    <header>
        <h1>Samsung Store</h1>
        <p>P2-practica 4- Sitio Web con Formulario AGJA 0789</p>
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
            <a href="carrito.php" class="btn-login-nav">Carrito</a>
            <a href="cuenta.php" class="btn-login-nav">Cuenta</a>
        </div>
    </nav>

    <div class="contenedor-login">
        <div class="card-login">
            <div class="logo-brand">
                <span>Samsung Store</span>
            </div>

            <h2>Iniciar sesión</h2>
            <p class="subtitulo">Usar su cuenta de la tienda.</p>

            <?php if (isset($_GET['requerido'])) { ?>
                <div class="error-msg">Debes iniciar sesión para acceder al carrito y realizar una compra.</div>
            <?php } ?>

            <?php if (isset($_GET['error'])) { ?>
                <div class="error-msg">Correo o contraseña incorrectos. Intente de nuevo.</div>
            <?php } ?>

            <form action="validar_login.php" method="POST">
                <div class="form-group">
                    <label for="correo">Correo electrónico o número de teléfono</label>
                    <input type="email" id="correo" name="correo" required placeholder="ejemplo@correo.com">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••">
                </div>

                <a href="#" class="link-olvido">¿Olvidaste tu contraseña?</a>

                <button type="submit" class="btn-siguiente">Siguiente</button>
            </form>

            <div class="crear-cuenta-box">
                ¿No tienes cuenta? <a href="registro.php">Crear una cuenta</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>