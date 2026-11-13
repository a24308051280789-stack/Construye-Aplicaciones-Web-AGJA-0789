<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Tecnología</title>
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
            <a href="tecnologia.php" class="active">Tecnología</a>
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
        <h2>Catálogo de Tecnología y Accesorios</h2>
        <div class="catalogo">
            <div class="producto">
                <img src="watch6_classic.jpg" alt="Galaxy Watch6 Classic">
                <h3>Watch6 Classic</h3>
                <p>$6,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_1">
                    <input type="hidden" name="nombre" value="Watch6 Classic">
                    <input type="hidden" name="precio" value="6999">
                    <input type="hidden" name="imagen" value="watch6_classic.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="watch6_40mm.jpg" alt="Galaxy Watch6 40mm">
                <h3>Watch6 40mm</h3>
                <p>$5,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_2">
                    <input type="hidden" name="nombre" value="Watch6 40mm">
                    <input type="hidden" name="precio" value="5499">
                    <input type="hidden" name="imagen" value="watch6_40mm.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="watch5_pro.jpg" alt="Galaxy Watch5 Pro">
                <h3>Watch5 Pro</h3>
                <p>$7,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_3">
                    <input type="hidden" name="nombre" value="Watch5 Pro">
                    <input type="hidden" name="precio" value="7999">
                    <input type="hidden" name="imagen" value="watch5_pro.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="watch5_44mm.jpg" alt="Galaxy Watch5 44mm">
                <h3>Watch5 44mm</h3>
                <p>$4,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_4">
                    <input type="hidden" name="nombre" value="Watch5 44mm">
                    <input type="hidden" name="precio" value="4499">
                    <input type="hidden" name="imagen" value="watch5_44mm.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="fit3.jpg" alt="Galaxy Fit3">
                <h3>Galaxy Fit3</h3>
                <p>$999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_5">
                    <input type="hidden" name="nombre" value="Galaxy Fit3">
                    <input type="hidden" name="precio" value="999">
                    <input type="hidden" name="imagen" value="fit3.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="smarttag2_pack.jpg" alt="SmartTag2 Pack 4">
                <h3>SmartTag2 Pack 4</h3>
                <p>$1,499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_6">
                    <input type="hidden" name="nombre" value="SmartTag2 Pack 4">
                    <input type="hidden" name="precio" value="1499">
                    <input type="hidden" name="imagen" value="smarttag2_pack.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="cargador_trio.jpg" alt="Cargador Inalámbrico Trio">
                <h3>Cargador Trio</h3>
                <p>$1,899.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_7">
                    <input type="hidden" name="nombre" value="Cargador Trio">
                    <input type="hidden" name="precio" value="1899">
                    <input type="hidden" name="imagen" value="cargador_trio.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="battery_pack.jpg" alt="Battery Pack 10,000mAh">
                <h3>Battery Pack 10k</h3>
                <p>$799.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_8">
                    <input type="hidden" name="nombre" value="Battery Pack 10k">
                    <input type="hidden" name="precio" value="799">
                    <input type="hidden" name="imagen" value="battery_pack.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="cargador_45w.jpg" alt="Cargador 45W Super Fast">
                <h3>Cargador 45W</h3>
                <p>$699.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_9">
                    <input type="hidden" name="nombre" value="Cargador 45W">
                    <input type="hidden" name="precio" value="699">
                    <input type="hidden" name="imagen" value="cargador_45w.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="smarttag2.jpg" alt="SmartTag2 Individual">
                <h3>SmartTag2</h3>
                <p>$499.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tec_10">
                    <input type="hidden" name="nombre" value="SmartTag2">
                    <input type="hidden" name="precio" value="499">
                    <input type="hidden" name="imagen" value="smarttag2.jpg">
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