<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Audífonos</title>
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
            <a href="audifonos.php" class="active">Audífonos</a>
            <a href="tecnologia.php">Tecnología</a>
            <a href="televisores.php">Televisores</a>
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
        <h2>Catálogo de Audífonos y Equipos de Audio</h2>
        <div class="catalogo">
            <div class="producto">
                <img src="buds2_pro.jpg" alt="Galaxy Buds2 Pro">
                <h3>Galaxy Buds2 Pro</h3>
                <p>$3,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_1">
                    <input type="hidden" name="nombre" value="Galaxy Buds2 Pro">
                    <input type="hidden" name="precio" value="3499">
                    <input type="hidden" name="imagen" value="buds2_pro.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="buds2.jpg" alt="Galaxy Buds2">
                <h3>Galaxy Buds2</h3>
                <p>$2,199.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_2">
                    <input type="hidden" name="nombre" value="Galaxy Buds2">
                    <input type="hidden" name="precio" value="2199">
                    <input type="hidden" name="imagen" value="buds2.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="buds_fe.jpg" alt="Galaxy Buds FE">
                <h3>Galaxy Buds FE</h3>
                <p>$1,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_3">
                    <input type="hidden" name="nombre" value="Galaxy Buds FE">
                    <input type="hidden" name="precio" value="1499">
                    <input type="hidden" name="imagen" value="buds_fe.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="buds_live.jpg" alt="Galaxy Buds Live">
                <h3>Galaxy Buds Live</h3>
                <p>$1,899.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_4">
                    <input type="hidden" name="nombre" value="Galaxy Buds Live">
                    <input type="hidden" name="precio" value="1899">
                    <input type="hidden" name="imagen" value="buds_live.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="buds_pro.jpg" alt="Galaxy Buds Pro">
                <h3>Galaxy Buds Pro</h3>
                <p>$2,799.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_5">
                    <input type="hidden" name="nombre" value="Galaxy Buds Pro">
                    <input type="hidden" name="precio" value="2799">
                    <input type="hidden" name="imagen" value="buds_pro.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="akg_typec.jpg" alt="AKG Type-C Earphones">
                <h3>AKG Type-C</h3>
                <p>$499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_6">
                    <input type="hidden" name="nombre" value="AKG Type-C">
                    <input type="hidden" name="precio" value="499">
                    <input type="hidden" name="imagen" value="akg_typec.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="akg_35mm.jpg" alt="AKG 3.5mm Earphones">
                <h3>AKG 3.5mm</h3>
                <p>$399.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_7">
                    <input type="hidden" name="nombre" value="AKG 3.5mm">
                    <input type="hidden" name="precio" value="399">
                    <input type="hidden" name="imagen" value="akg_35mm.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="buds_wireless.jpg" alt="Galaxy Buds Wireless">
                <h3>Galaxy Buds Wireless</h3>
                <p>$1,299.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_8">
                    <input type="hidden" name="nombre" value="Galaxy Buds Wireless">
                    <input type="hidden" name="precio" value="1299">
                    <input type="hidden" name="imagen" value="buds_wireless.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="level_u2.jpg" alt="Level U2 Wireless">
                <h3>Level U2 Wireless</h3>
                <p>$899.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_9">
                    <input type="hidden" name="nombre" value="Level U2 Wireless">
                    <input type="hidden" name="precio" value="899">
                    <input type="hidden" name="imagen" value="level_u2.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="akg_y500.jpg" alt="AKG Y500 Wireless">
                <h3>AKG Y500 Wireless</h3>
                <p>$2,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="aud_10">
                    <input type="hidden" name="nombre" value="AKG Y500 Wireless">
                    <input type="hidden" name="precio" value="2499">
                    <input type="hidden" name="imagen" value="akg_y500.jpg">
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