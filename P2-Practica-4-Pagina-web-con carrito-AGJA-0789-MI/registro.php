<?php
// Inicia o reanuda la sesión PHP
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-practica 3 AGJA 0789 - Crear Cuenta</title>
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

        .contenedor {
            width: 92%;
            max-width: 650px;
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

        form {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1 1 calc(50% - 15px);
            min-width: 220px;
            gap: 5px;
            text-align: left;
        }

        .form-group.full-width {
            flex-basis: 100%;
        }

        .form-group label {
            font-weight: bold;
            font-size: 0.9rem;
            color: #444444;
        }

        label {
            font-weight: bold;
            font-size: 0.9rem;
            color: #444444;
        }

        input {
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 0.95rem;
            width: 100%;
        }

        button[type="submit"] {
            background-color: #1428a0;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            transition: background-color 0.2s;
        }

        button[type="submit"]:hover {
            background-color: #0d1b70;
        }

        .error-msg {
            margin-bottom: 18px;
            padding: 10px;
            border: 1px solid #a61b1b;
            border-radius: 4px;
            background: #fbeaea;
            color: #a61b1b;
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

    <div class="contenedor">
        <h2>Crear una cuenta</h2>
        <?php if (isset($_GET['error']) && $_GET['error'] === 'datos') { ?>
            <p class="error-msg">Revisa que todos los datos estén completos y tengan un formato válido.</p>
        <?php } ?>
        <form action="conexion_registro.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" maxlength="200" required placeholder="Calle, número y colonia">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" maxlength="15" required placeholder="Teléfono de contacto">
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" maxlength="10" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-group full-width">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" maxlength="100" required placeholder="ejemplo@correo.com">
            </div>

            <div class="form-group full-width">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Crea una contraseña">
            </div>

            <button type="submit" class="form-group full-width">Registrar Usuario</button>
        </form>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>