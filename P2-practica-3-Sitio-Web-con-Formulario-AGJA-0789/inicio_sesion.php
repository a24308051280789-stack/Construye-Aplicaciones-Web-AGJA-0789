<?php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-practica 3 AGJA 0789 - Usuarios Registrados</title>
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
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f5f5f5;
            color: #333333;
            padding: 12px 10px;
            text-align: left;
            font-size: 0.95rem;
        }

        td {
            padding: 12px 10px;
            font-size: 0.9rem;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
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
        <a href="registro.php">Registro de Usuario</a>
        <a href="inicio_sesion.php" class="active">Usuarios Registrados</a>
    </nav>

    <div class="contenedor">
        <h2>Lista de Usuarios Registrados (Base de Datos SQL)</h2>
        <div class="table-responsive">
            <?php
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
                echo "<p style='color: #777777; margin-top: 15px;'>Aún no hay usuarios registrados en la base de datos.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>

</body>
</html>
<?php
$conexion->close();
?>