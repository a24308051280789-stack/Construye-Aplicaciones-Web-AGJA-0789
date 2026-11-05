<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-practica 3 AGJA 0789 - Registro de Usuario</title>
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
            text-align: center; 
            display: flex; 
            justify-content: center; 
            flex-wrap: wrap; 
        }

        nav a { 
            color: #ffffff; 
            text-decoration: none; 
            padding: 15px 20px; 
            display: inline-block; 
            font-weight: bold; 
            font-size: 0.95rem; 
            transition: background-color 0.2s, color 0.2s;
        }

        nav a:hover, 
        nav a.active { 
            background-color: #ffffff; 
            color: #1428a0; 
        }

        .contenedor { 
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
            margin-bottom: 25px; 
            text-align: center; 
            font-size: 1.5rem; 
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
        <p>P2-practica 3- Sitio Web con Formulario AGJA 0789</p>
    </header>

    <nav>
        <a href="index.html">Inicio</a>
        <a href="telefonos.html">Teléfonos</a>
        <a href="audifonos.html">Audífonos</a>
        <a href="tecnologia.html">Tecnología</a>
        <a href="televisores.html">Televisores</a>
        <a href="registro.php" class="active">Registro de Usuario</a>
        <a href="inicio_sesion.php">Usuarios Registrados</a>
    </nav>

    <div class="contenedor">
        <h2>Formulario de Registro de Usuario</h2>
        <form action="conexion_registro.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez">
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required placeholder="ejemplo@correo.com">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required placeholder="10 dígitos">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>