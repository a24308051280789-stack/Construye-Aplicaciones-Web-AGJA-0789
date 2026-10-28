<?php
$servidor   = "localhost";
$usuario    = "root";
$password   = "";
$db_nombre  = "tienda_samsung";

$conexion = new mysqli($servidor, $usuario, $password, $db_nombre);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica 1 Formulario AGJA 0789 - Samsung Store</title>
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #1428a0;
            color: white;
            text-align: center;
            padding: 15px;
        }

        nav {
            background-color: #0d1b70;
            text-align: center;
        }

        .tab-btn {
            background: none;
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }

        .tab-btn.active {
            background-color: #f4f6f9;
            color: #1428a0;
        }

        .contenedor {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
            flex: 1;
        }

        .tab-content {
            display: none;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tab-content.active {
            display: block;
        }

        h2 {
            color: #1428a0;
            margin-bottom: 15px;
        }

        .catalogo {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .producto {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            width: 180px;
            background: #fafafa;
        }

        .producto img {
            width: 100%;
            height: 120px;
            object-fit: contain;
        }

        .categoria-tag {
            font-size: 0.75rem;
            background: #e0e7ff;
            color: #1428a0;
            padding: 2px 6px;
            border-radius: 4px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button[type="submit"] {
            background-color: #1428a0;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #1428a0;
            color: white;
            padding: 8px;
        }

        td {
            padding: 8px;
            text-align: left;
        }

        footer {
            background-color: #102285;
            color: white;
            text-align: center;
            padding: 12px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <header>
        <h1>Samsung Store</h1>
    </header>

    <nav>
        <button class="tab-btn active" onclick="openTab(event, 'productos')">Productos</button>
        <button class="tab-btn" onclick="openTab(event, 'registro')">Registro de Usuario</button>
        <button class="tab-btn" onclick="openTab(event, 'usuarios')">Usuarios Registrados</button>
    </nav>

    <div class="contenedor">

        <div id="productos" class="tab-content active">
            <h2>Catálogo de Productos Samsung</h2>
            <div class="catalogo">
                
                <div class="producto">
                    <span class="categoria-tag">Teléfonos</span>
                    <img src="https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=300" alt="Galaxy S24 Ultra">
                    <h3>Galaxy S24 Ultra</h3>
                    <p>$24,999 MXN</p>
                </div>

                <div class="producto">
                    <span class="categoria-tag">Audífonos</span>
                    <img src="https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=300" alt="Galaxy Buds2 Pro">
                    <h3>Galaxy Buds2 Pro</h3>
                    <p>$3,499 MXN</p>
                </div>

                <div class="producto">
                    <span class="categoria-tag">Relojes</span>
                    <img src="https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?w=300" alt="Galaxy Watch6">
                    <h3>Galaxy Watch6</h3>
                    <p>$5,999 MXN</p>
                </div>

                <div class="producto">
                    <span class="categoria-tag">Tablets</span>
                    <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=300" alt="Galaxy Tab S9">
                    <h3>Galaxy Tab S9</h3>
                    <p>$14,999 MXN</p>
                </div>

            </div>
        </div>

        <div id="registro" class="tab-content">
            <h2>Formulario de Registro de Usuario</h2>
            
            <form action="conexion_registro.php" method="POST">
                
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez">

                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required placeholder="ejemplo@correo.com">

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required placeholder="10 dígitos">

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">

                <button type="submit">Registrar Usuario</button>
            </form>
        </div>

        <div id="usuarios" class="tab-content">
            <h2>Lista de Usuarios Registrados (Base de Datos SQL)</h2>
            
            <?php
            if ($conexion && !$conexion->connect_error) {
                $sql = "SELECT id_usuario, nombre, correo, telefono, fecha_registro FROM usuarios ORDER BY id_usuario DESC";
                $resultado = $conexion->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                    echo "<table>";
                    echo "<tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Fecha de Registro</th>
                          </tr>";
                    
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_usuario']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['fecha_registro']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='color: #777;'>Aún no hay usuarios registrados en la base de datos.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error al conectar con la base de datos MySQL.</p>";
            }
            ?>
        </div>

    </div>

    <script>
        function openTab(evt, tabName) {
            let i, tabContent, tabBtns;
            
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].classList.remove("active");
            }
            
            tabBtns = document.getElementsByClassName("tab-btn");
            for (i = 0; i < tabBtns.length; i++) {
                tabBtns[i].classList.remove("active");
            }
            
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }
    </script>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>
<?php
if ($conexion) {
    $conexion->close();
}
?>