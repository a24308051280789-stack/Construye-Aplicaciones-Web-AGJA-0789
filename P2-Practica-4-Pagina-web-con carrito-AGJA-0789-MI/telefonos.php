<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2-Practica-4 AGJA 0789 - Teléfonos</title>
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
            <a href="telefonos.php" class="active">Teléfonos</a>
            <a href="audifonos.php">Audífonos</a>
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
        <h2>Catálogo de Teléfonos Inteligentes</h2>
        <div class="catalogo">
            <div class="producto">
                <img src="s24_ultra.jpg" alt="Galaxy S24 Ultra">
                <h3>Galaxy S24 Ultra</h3>
                <p>$24,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_1">
                    <input type="hidden" name="nombre" value="Galaxy S24 Ultra">
                    <input type="hidden" name="precio" value="24999">
                    <input type="hidden" name="imagen" value="s24_ultra.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="s24_plus.jpg" alt="Galaxy S24 Plus">
                <h3>Galaxy S24 Plus</h3>
                <p>$19,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_2">
                    <input type="hidden" name="nombre" value="Galaxy S24 Plus">
                    <input type="hidden" name="precio" value="19999">
                    <input type="hidden" name="imagen" value="s24_plus.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="s24.jpg" alt="Galaxy S24">
                <h3>Galaxy S24</h3>
                <p>$15,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_3">
                    <input type="hidden" name="nombre" value="Galaxy S24">
                    <input type="hidden" name="precio" value="15999">
                    <input type="hidden" name="imagen" value="s24.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="z_fold5.jpg" alt="Galaxy Z Fold5">
                <h3>Galaxy Z Fold5</h3>
                <p>$29,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_4">
                    <input type="hidden" name="nombre" value="Galaxy Z Fold5">
                    <input type="hidden" name="precio" value="29999">
                    <input type="hidden" name="imagen" value="z_fold5.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="z_flip5.jpg" alt="Galaxy Z Flip5">
                <h3>Galaxy Z Flip5</h3>
                <p>$17,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_5">
                    <input type="hidden" name="nombre" value="Galaxy Z Flip5">
                    <input type="hidden" name="precio" value="17999">
                    <input type="hidden" name="imagen" value="z_flip5.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="a54.jpg" alt="Galaxy A54 5G">
                <h3>Galaxy A54 5G</h3>
                <p>$6,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_6">
                    <input type="hidden" name="nombre" value="Galaxy A54 5G">
                    <input type="hidden" name="precio" value="6999">
                    <input type="hidden" name="imagen" value="a54.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="a34.jpg" alt="Galaxy A34 5G">
                <h3>Galaxy A34 5G</h3>
                <p>$4,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_7">
                    <input type="hidden" name="nombre" value="Galaxy A34 5G">
                    <input type="hidden" name="precio" value="4999">
                    <input type="hidden" name="imagen" value="a34.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="a24.jpg" alt="Galaxy A24">
                <h3>Galaxy A24</h3>
                <p>$3,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_8">
                    <input type="hidden" name="nombre" value="Galaxy A24">
                    <input type="hidden" name="precio" value="3999">
                    <input type="hidden" name="imagen" value="a24.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="a14.jpg" alt="Galaxy A14">
                <h3>Galaxy A14</h3>
                <p>$2,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_9">
                    <input type="hidden" name="nombre" value="Galaxy A14">
                    <input type="hidden" name="precio" value="2999">
                    <input type="hidden" name="imagen" value="a14.jpg">
                    <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                </form>
            </div>
            <div class="producto">
                <img src="s23_fe.jpg" alt="Galaxy S23 FE">
                <h3>Galaxy S23 FE</h3>
                <p>$11,999.00 MXN</p>
                <form action="carrito.php" method="POST">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id_producto" value="tel_10">
                    <input type="hidden" name="nombre" value="Galaxy S23 FE">
                    <input type="hidden" name="precio" value="11999">
                    <input type="hidden" name="imagen" value="s23_fe.jpg">
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