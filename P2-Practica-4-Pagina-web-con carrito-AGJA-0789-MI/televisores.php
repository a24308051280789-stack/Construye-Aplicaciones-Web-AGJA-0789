<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Televisores</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333333; display: flex; flex-direction: column; min-height: 100vh; }
        header { background-color: #1428a0; color: #ffffff; text-align: center; padding: 20px 10px; }
        header h1 { font-size: 1.8rem; margin-bottom: 5px; }
        header p { font-size: 0.9rem; opacity: 0.9; }
        nav { background-color: #0d1b70; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .nav-links { display: flex; flex-wrap: wrap; }
        .nav-links a { color: #ffffff; text-decoration: none; padding: 15px 20px; display: inline-block; font-weight: bold; font-size: 0.95rem; transition: background-color 0.2s, color 0.2s; }
        .nav-links a:hover, .nav-links a.active { background-color: #ffffff; color: #1428a0; }
        .nav-user { display: flex; align-items: center; gap: 12px; }
        .btn-cart-nav { display: flex; align-items: center; gap: 6px; background-color: #ff9900; color: #ffffff; text-decoration: none; padding: 6px 14px; border-radius: 4px; font-weight: bold; font-size: 0.9rem; transition: background-color 0.2s; }
        .btn-cart-nav:hover { background-color: #e68a00; }
        .img-logo-cart { width: 24px; height: 24px; object-fit: contain; }
        .nav-user .btn-login-nav { background-color: #00d285; color: #ffffff; text-decoration: none; padding: 10px 18px; border-radius: 4px; font-weight: bold; font-size: 0.9rem; }
        .contenedor { width: 92%; max-width: 950px; margin: 30px auto; flex: 1; background-color: #ffffff; padding: 35px 25px; border-radius: 6px; border: 1px solid #dddddd; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); }
        h2 { color: #1428a0; margin-bottom: 25px; text-align: center; font-size: 1.5rem; }
        .catalogo { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
        .producto { border: 1px solid #e0e0e0; padding: 15px; text-align: center; width: 200px; background-color: #fafafa; border-radius: 6px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); display: flex; flex-direction: column; justify-content: space-between; }
        .producto img { width: 100%; height: 130px; object-fit: contain; margin-bottom: 10px; border-radius: 4px; }
        .producto h3 { font-size: 0.95rem; margin: 8px 0 5px; color: #111111; }
        .producto p { color: #1428a0; font-weight: bold; font-size: 1rem; margin-bottom: 10px; }
        .btn-add-cart { background-color: #1428a0; color: #ffffff; border: none; padding: 8px 12px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 0.85rem; width: 100%; transition: background-color 0.2s; }
        .btn-add-cart:hover { background-color: #0d1b70; }
        footer { background-color: #102285; color: #ffffff; text-align: center; padding: 15px; font-size: 0.85rem; margin-top: auto; line-height: 1.4; }
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
            <a href="televisores.php" class="active">Televisores</a>
        </div>
        <div class="nav-user">
            <a href="carrito.php" class="btn-cart-nav">
                <img src="carrito.jpg" alt="Carrito" class="img-logo-cart">
                <span>(<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</span>
            </a>
            <a href="cuenta.php" class="btn-login-nav">Cuenta</a>
        </div>
    </nav>

    <div class="contenedor">
        <h2>Catálogo de Televisores y Smart TVs</h2>
        <div class="catalogo">
            <div class="producto">
                <img src="tv_neo_qled.jpg" alt="Neo QLED 8K 75">
                <h3>Neo QLED 8K 75"</h3>
                <p>$65,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_1">
                    <input type="hidden" name="nombre" value='Neo QLED 8K 75"'>
                    <input type="hidden" name="precio" value="65999">
                    <input type="hidden" name="imagen" value="tv_neo_qled.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_oled_65.jpg" alt="OLED 4K 65 S90C">
                <h3>OLED 4K 65"</h3>
                <p>$34,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_2">
                    <input type="hidden" name="nombre" value='OLED 4K 65"'>
                    <input type="hidden" name="precio" value="34999">
                    <input type="hidden" name="imagen" value="tv_oled_65.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_the_frame.jpg" alt="The Frame 55 QLED">
                <h3>The Frame 55"</h3>
                <p>$22,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_3">
                    <input type="hidden" name="nombre" value='The Frame 55"'>
                    <input type="hidden" name="precio" value="22999">
                    <input type="hidden" name="imagen" value="tv_the_frame.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_crystal_50.jpg" alt="Crystal UHD 4K 50">
                <h3>Crystal UHD 50"</h3>
                <p>$8,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_4">
                    <input type="hidden" name="nombre" value='Crystal UHD 50"'>
                    <input type="hidden" name="precio" value="8999">
                    <input type="hidden" name="imagen" value="tv_crystal_50.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_the_serif.jpg" alt="The Serif 43 QLED">
                <h3>The Serif 43"</h3>
                <p>$17,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_5">
                    <input type="hidden" name="nombre" value='The Serif 43"'>
                    <input type="hidden" name="precio" value="17999">
                    <input type="hidden" name="imagen" value="tv_the_serif.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_the_sero.jpg" alt="The Sero 43 Giratorio">
                <h3>The Sero 43"</h3>
                <p>$21,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_6">
                    <input type="hidden" name="nombre" value='The Sero 43"'>
                    <input type="hidden" name="precio" value="21999">
                    <input type="hidden" name="imagen" value="tv_the_sero.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="soundbar_q990c.jpg" alt="Soundbar HW-Q990C">
                <h3>Soundbar Q990C</h3>
                <p>$18,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_7">
                    <input type="hidden" name="nombre" value="Soundbar Q990C">
                    <input type="hidden" name="precio" value="18999">
                    <input type="hidden" name="imagen" value="soundbar_q990c.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="proyector_freestyle.jpg" alt="Proyector The Freestyle">
                <h3>The Freestyle</h3>
                <p>$12,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_8">
                    <input type="hidden" name="nombre" value="The Freestyle">
                    <input type="hidden" name="precio" value="12999">
                    <input type="hidden" name="imagen" value="proyector_freestyle.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_crystal_65.jpg" alt="Crystal UHD 4K 65">
                <h3>Crystal UHD 65"</h3>
                <p>$13,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_9">
                    <input type="hidden" name="nombre" value='Crystal UHD 65"'>
                    <input type="hidden" name="precio" value="13999">
                    <input type="hidden" name="imagen" value="tv_crystal_65.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="tv_qled_55.jpg" alt="QLED 4K 55 Q60C">
                <h3>QLED 4K 55"</h3>
                <p>$11,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tv_10">
                    <input type="hidden" name="nombre" value='QLED 4K 55"'>
                    <input type="hidden" name="precio" value="11999">
                    <input type="hidden" name="imagen" value="tv_qled_55.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>Todos Los Derechos Reservados 2026</p>
        <p>Adame Gallardo Jose Abraham / 0789 / 5-J / Construye aplicaciones Web</p>
    </footer>
</body>
</html>
