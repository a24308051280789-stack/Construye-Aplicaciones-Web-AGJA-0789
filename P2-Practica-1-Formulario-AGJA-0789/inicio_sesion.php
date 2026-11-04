<?php
// Incluye la conexión a MySQL desde conexion.php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica 1 AGJA 0789 - Usuarios Registrados</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background: #f4f6f9; color: #333; display: flex; flex-direction: column; min-height: 100vh; }

        header { background: #1428a0; color: white; text-align: center; padding: 20px 10px; }
        header h1 { font-size: 1.8rem; margin-bottom: 5px; }
        header p { font-size: 0.9rem; opacity: 0.9; }

        nav { background: #0d1b70; text-align: center; display: flex; justify-content: center; flex-wrap: wrap; }
        nav a { color: white; text-decoration: none; padding: 15px 25px; display: inline-block; font-weight: bold; font-size: 1rem; }
        nav a:hover, nav a.active { background: white; color: #1428a0; }

        .contenedor { width: 92%; max-width: 950px; margin: 30px auto; flex: 1; background: white; padding: 35px 25px; border-radius: 6px; border: 1px solid #ddd; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        h2 { color: #1428a0; margin-bottom: 20px; font-size: 1.5rem; text-align: left; }

        /* Estilos de Tabla fluidos y legibles */
        .table-responsive { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ccc; }
        th { background-color: #f5f5f5; color: #333; padding: 12px 10px; text-align: left; font-size: 0.95rem; }
        td { padding: 12px 10px; font-size: 0.9rem; }
        tr:nth-child(even) { background-color: #fafafa; }

        footer { background: #102285; color: white; text-align: center; padding: 15px; font-size: 0.85rem; margin-top: auto; line-height: 1.4; }
    </style>
</head>
<body>

    <header>
        <h1>Samsung Store</h1>
        <p>P2-Practica 1 Formulario AGJA 0789</p>
    </header>

    <nav>
        <a href="./index.html">Productos</a>
        <a href="./index.html#registro">Registro de Usuario</a>
        <a href="./inicio_sesion.php" class="active">Usuarios Registrados</a>
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
                echo "<p style='color: #777; margin-top: 15px;'>Aún no hay usuarios registrados en la base de datos.</p>";
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