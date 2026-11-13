-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2026 a las 03:18:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_samsung`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT 'Tarjeta de Crédito',
  `fecha_compra` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_usuario`, `nombre_producto`, `precio`, `cantidad`, `subtotal`, `metodo_pago`, `fecha_compra`) VALUES
(1, 9, 'Galaxy Buds2', 2199.00, 1, 2199.00, 'Tarjeta de Crédito (simulación)', '2026-11-11 09:19:46'),
(2, 9, 'Galaxy S24 Plus', 19999.00, 1, 19999.00, 'Tarjeta de Crédito (simulación)', '2026-11-11 09:28:37'),
(5, 9, 'Galaxy S24 Ultra', 24999.00, 1, 24999.00, 'Tarjeta de Crédito', '2026-11-11 09:42:48'),
(6, 9, 'Watch6 Classic', 6999.00, 1, 6999.00, 'Tarjeta de Crédito', '2026-11-11 09:42:48'),
(7, 9, 'Galaxy Buds2 Pro', 3499.00, 1, 3499.00, 'Tarjeta de Crédito', '2026-11-11 09:47:19'),
(8, 9, 'Galaxy Buds2', 2199.00, 1, 2199.00, 'Tarjeta de Crédito', '2026-11-12 09:07:27'),
(9, 9, 'Galaxy S24 Ultra', 24999.00, 1, 24999.00, 'Tarjeta de Crédito', '2026-11-12 09:21:42'),
(10, 9, 'Galaxy Buds2', 2199.00, 1, 2199.00, 'Tarjeta de Crédito', '2026-11-12 09:21:42'),
(11, 20, 'Neo QLED 8K 75\"', 65999.00, 1, 65999.00, 'Tarjeta de Crédito', '2026-11-12 09:43:39'),
(12, 20, 'SmartTag2 Pack 4', 1499.00, 1, 1499.00, 'Tarjeta de Crédito', '2026-11-12 10:08:11'),
(13, 21, 'OLED 4K 65\"', 34999.00, 2, 69998.00, 'Tarjeta de Crédito', '2026-11-12 19:10:47'),
(14, 21, 'Crystal UHD 50\"', 8999.00, 1, 8999.00, 'Tarjeta de Crédito', '2026-11-12 19:10:47'),
(15, 21, 'Soundbar Q990C', 18999.00, 1, 18999.00, 'Tarjeta de Crédito', '2026-11-12 19:10:47'),
(16, 21, 'The Sero 43\"', 21999.00, 1, 21999.00, 'Tarjeta de Crédito', '2026-11-12 19:10:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_tarjeta`
--

CREATE TABLE `pagos_tarjeta` (
  `id_pago` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titular_tarjeta` varchar(150) NOT NULL,
  `numero_tarjeta_oculto` varchar(20) NOT NULL,
  `monto_total` decimal(10,2) NOT NULL,
  `fecha_pago` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos_tarjeta`
--

INSERT INTO `pagos_tarjeta` (`id_pago`, `id_usuario`, `titular_tarjeta`, `numero_tarjeta_oculto`, `monto_total`, `fecha_pago`) VALUES
(1, 9, 'abraham', '**** **** **** 3456', 3499.00, '2026-11-11 09:47:19'),
(2, 9, 'ertdftgyhukjlikmghfg', '**** **** **** 3567', 2199.00, '2026-11-12 09:07:27'),
(3, 9, 'asdfnk', '**** **** **** 6347', 27198.00, '2026-11-12 09:21:42'),
(4, 20, 'Abraham', '**** **** **** 5432', 65999.00, '2026-11-12 09:43:39'),
(5, 20, 'errdtfgyl', '**** **** **** 2567', 1499.00, '2026-11-12 10:08:11'),
(6, 21, 'Abraham Adame', '**** **** **** 7654', 119995.00, '2026-11-12 19:10:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `categoria`, `precio`, `imagen`) VALUES
(1, 'Galaxy S24 Ultra', 'telefonos', 24999.00, 's24_ultra.jpg'),
(2, 'Galaxy S24 Plus', 'telefonos', 19999.00, 's24_plus.jpg'),
(3, 'Galaxy S24', 'telefonos', 15999.00, 's24.jpg'),
(4, 'Galaxy Z Fold5', 'telefonos', 29999.00, 'z_fold5.jpg'),
(5, 'Galaxy Z Flip5', 'telefonos', 17999.00, 'z_flip5.jpg'),
(6, 'Galaxy A54 5G', 'telefonos', 6999.00, 'a54.jpg'),
(7, 'Galaxy A34 5G', 'telefonos', 4999.00, 'a34.jpg'),
(8, 'Galaxy A24', 'telefonos', 3999.00, 'a24.jpg'),
(9, 'Galaxy A14', 'telefonos', 2999.00, 'a14.jpg'),
(10, 'Galaxy S23 FE', 'telefonos', 11999.00, 's23_fe.jpg'),
(11, 'Galaxy Buds2 Pro', 'audifonos', 3499.00, 'buds2_pro.jpg'),
(12, 'Galaxy Buds2', 'audifonos', 2199.00, 'buds2.jpg'),
(13, 'Galaxy Buds FE', 'audifonos', 1499.00, 'buds_fe.jpg'),
(14, 'Galaxy Buds Live', 'audifonos', 1899.00, 'buds_live.jpg'),
(15, 'Galaxy Buds Pro', 'audifonos', 2799.00, 'buds_pro.jpg'),
(16, 'AKG Type-C Earphones', 'audifonos', 499.00, 'akg_typec.jpg'),
(17, 'AKG 3.5mm Earphones', 'audifonos', 399.00, 'akg_35mm.jpg'),
(18, 'Galaxy Buds Wireless', 'audifonos', 1299.00, 'buds_wireless.jpg'),
(19, 'Level U2 Wireless', 'audifonos', 899.00, 'level_u2.jpg'),
(20, 'AKG Y500 Wireless', 'audifonos', 2499.00, 'akg_y500.jpg'),
(21, 'Galaxy Watch6 Classic', 'tecnologia', 6999.00, 'watch6_classic.jpg'),
(22, 'Galaxy Watch6 40mm', 'tecnologia', 5499.00, 'watch6_40mm.jpg'),
(23, 'Galaxy Watch5 Pro', 'tecnologia', 7999.00, 'watch5_pro.jpg'),
(24, 'Galaxy Watch5 44mm', 'tecnologia', 4499.00, 'watch5_44mm.jpg'),
(25, 'Galaxy Fit3', 'tecnologia', 999.00, 'fit3.jpg'),
(26, 'SmartTag2 Pack 4', 'tecnologia', 1499.00, 'smarttag2_pack.jpg'),
(27, 'Cargador Inalámbrico Trio', 'tecnologia', 1899.00, 'cargador_trio.jpg'),
(28, 'Battery Pack 10,000mAh', 'tecnologia', 799.00, 'battery_pack.jpg'),
(29, 'Cargador 45W Super Fast', 'tecnologia', 699.00, 'cargador_45w.jpg'),
(30, 'SmartTag2 Individual', 'tecnologia', 499.00, 'smarttag2.jpg'),
(31, 'Neo QLED 8K 75\"', 'televisores', 65999.00, 'tv_neo_qled.jpg'),
(32, 'OLED 4K 65\" S90C', 'televisores', 34999.00, 'tv_oled_65.jpg'),
(33, 'The Frame 55\" QLED', 'televisores', 22999.00, 'tv_the_frame.jpg'),
(34, 'Crystal UHD 4K 50\"', 'televisores', 8999.00, 'tv_crystal_50.jpg'),
(35, 'The Serif 43\" QLED', 'televisores', 17999.00, 'tv_the_serif.jpg'),
(36, 'The Sero 43\" Giratorio', 'televisores', 21999.00, 'tv_the_sero.jpg'),
(37, 'Soundbar HW-Q990C', 'televisores', 18999.00, 'soundbar_q990c.jpg'),
(38, 'Proyector The Freestyle', 'televisores', 12999.00, 'proyector_freestyle.jpg'),
(39, 'Crystal UHD 4K 65\"', 'televisores', 13999.00, 'tv_crystal_65.jpg'),
(40, 'QLED 4K 55\" Q60C', 'televisores', 11999.00, 'tv_qled_55.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `direccion` varchar(200) NOT NULL DEFAULT '',
  `ciudad` varchar(100) NOT NULL DEFAULT '',
  `estado` varchar(100) NOT NULL DEFAULT '',
  `codigo_postal` varchar(10) NOT NULL DEFAULT '',
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `telefono`, `password`, `fecha_registro`, `direccion`, `ciudad`, `estado`, `codigo_postal`, `fecha_nacimiento`) VALUES
(1, 'exrdtukn', 'fdcgk@fesgryjli', '6562345678', 'esrtdfhnkm', '2026-10-27 16:23:57', '', '', '', '', NULL),
(2, 'Abraham', 'abraham@gmail', '6567577890', '10junio999', '2026-10-28 01:58:33', '', '', '', '', NULL),
(3, 'rdttflk', 'erdtfjk@tryui', '3456789', 'erdtgyuhjn', '2026-11-03 16:42:03', '', '', '', '', NULL),
(4, 'erstrdfj', 'ersfthk@trdgfthukjl', '1010010101', '0101010010', '2026-11-04 16:30:22', '', '', '', '', NULL),
(5, 'leticia Meza', 'zame-cbtis128@gmail.com', '6566191934', '789456', '2026-11-04 16:38:10', '', '', '', '', NULL),
(6, 'trcfnj', 'trdtfh#@rtyvgbynu', '567890', '5467890-', '2026-11-05 17:27:30', '', '', '', '', NULL),
(8, 'Abraham', 'abraham5@gmail.com', '6567575813', '10junio', '2026-11-06 17:32:00', '', '', '', '', NULL),
(9, 'Abraham', 'abraham@gmail.com', '6567575813', '10junio', '2026-11-11 16:17:34', '', '', '', '', NULL),
(20, 'Abraham', 'abraham522@gmail.com', '6567575813', '$2y$10$VXEUL/FEZuZgV6mwuA8WuOjgcilndU/ElmNabLci3Zpaqpap9J9ZK', '2026-11-12 16:41:17', 'mexico 68', 'juarez', 'chihuahua', '32640', '2009-06-10'),
(21, 'Abraham', 'a.24308051280789@cbtis128.edu.mx', '6567575813', '$2y$10$jxMsECscVFOBV1XTJGziCu6GoMog3ahVymay2VvolbezXoiBRQ2rC', '2026-11-13 02:01:30', 'mexico 68', 'juarez', 'chihuahua', '76788', '2007-02-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pagos_tarjeta`
--
ALTER TABLE `pagos_tarjeta`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pagos_tarjeta`
--
ALTER TABLE `pagos_tarjeta`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pagos_tarjeta`
--
ALTER TABLE `pagos_tarjeta`
  ADD CONSTRAINT `pagos_tarjeta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
