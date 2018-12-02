-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-12-2018 a las 08:54:28
-- Versión del servidor: 5.5.52-MariaDB
-- Versión de PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion_milan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividad_posteo`
--

CREATE TABLE `tb_actividad_posteo` (
  `id` int(11) NOT NULL,
  `actividad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_actividad_posteo`
--

INSERT INTO `tb_actividad_posteo` (`id`, `actividad`) VALUES
(1, 'Seguir página de MilanBC en Facebook'),
(2, 'Seguir página de MilanBC en Instagram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caja`
--

CREATE TABLE `tb_caja` (
  `id_caja` int(11) NOT NULL,
  `fecha_caja` datetime DEFAULT NULL,
  `saldopordia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_caja`
--

INSERT INTO `tb_caja` (`id_caja`, `fecha_caja`, `saldopordia`) VALUES
(1, '2018-07-06 00:00:00', 168000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias_productos`
--

CREATE TABLE `tb_categorias_productos` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `status_categoria` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categorias_productos`
--

INSERT INTO `tb_categorias_productos` (`id_categoria`, `categoria`, `status_categoria`, `fecha_creacion`) VALUES
(1, 'Categoria Prueba', 1, '2018-11-27'),
(2, 'Servicios', 1, '2018-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria_puntaje`
--

CREATE TABLE `tb_categoria_puntaje` (
  `id_puntaje` int(11) NOT NULL,
  `nombre_categoria` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `puntaje_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categoria_puntaje`
--

INSERT INTO `tb_categoria_puntaje` (`id_puntaje`, `nombre_categoria`, `images`, `puntaje_categoria`) VALUES
(1, 'Bronce', NULL, 10),
(2, 'Silver', NULL, 15),
(3, 'Gold', NULL, 20),
(4, 'Platium', NULL, 30),
(5, 'Diamond', NULL, 50),
(6, 'New', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_config`
--

CREATE TABLE `tb_config` (
  `id_config` int(11) NOT NULL,
  `nombre_emp` varchar(255) DEFAULT NULL,
  `nregistro_emp` varchar(255) DEFAULT NULL,
  `imglogo_emp` varchar(255) DEFAULT NULL,
  `impuesto_emp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_config`
--

INSERT INTO `tb_config` (`id_config`, `nombre_emp`, `nregistro_emp`, `imglogo_emp`, `impuesto_emp`) VALUES
(1, 'Tecnología y Desarrollo Jirehpro,C.A', 'J-40135922-1', 'images/Jirehpro_logo.png', '12'),
(2, 'Dr. Cell', '0', 'images/Jirehpro_logo3.png', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_factura`
--

CREATE TABLE `tb_detalle_factura` (
  `codi_detalle` int(11) NOT NULL,
  `codi_factu` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `id_producto` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de la Venta o Factura';

--
-- Volcado de datos para la tabla `tb_detalle_factura`
--

INSERT INTO `tb_detalle_factura` (`codi_detalle`, `codi_factu`, `cantidad`, `descripcion`, `id_producto`, `precio`) VALUES
(1, 1, 1, 'Corte de Cabello', 3, 5000),
(2, 2, 1, 'Corte de barba', 2, 25554),
(3, 3, 1, 'efefesef', 3, 3444),
(4, 4, 1, 'Productio', 1, 655465464),
(5, 5, 1, 'Productos prueba', 1, 46546465),
(6, 6, 1, 'Corte de baraba', 2, 3232),
(7, 7, 1, 'Corte de barba', 2, 2147483647),
(8, 8, 1, 'corte de cabello', 3, 5000),
(9, 9, 1, 'Producto', 1, 5000),
(10, 9, 1, 'Barba', 2, 5555),
(11, 9, 1, 'cabello', 3, 34344),
(12, 10, 2, 'Producto', 1, 22222),
(13, 11, 1, 'prueba', 1, 555),
(14, 11, 1, 'barba', 2, 434),
(15, 11, 1, 'cabello', 3, 322);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_gastos`
--

CREATE TABLE `tb_detalle_gastos` (
  `codi_detalle_gastos` int(11) NOT NULL,
  `codi_gastos` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `precio` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de los Gastos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_puntos`
--

CREATE TABLE `tb_detalle_puntos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `puntos_asignados` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_detalle_puntos`
--

INSERT INTO `tb_detalle_puntos` (`id`, `id_cliente`, `id_servicio`, `puntos_asignados`, `fecha_asignacion`) VALUES
(1, 3, 3, 10, '2018-12-01'),
(2, 3, 2, 2, '2018-12-01'),
(3, 3, 3, 10, '2018-12-01'),
(4, 5, 1, 1, '2018-12-01'),
(5, 5, 1, 1, '2018-12-01'),
(6, 5, 2, 1, '2018-12-01'),
(7, 5, 2, 2, '2018-12-01'),
(8, 5, 3, 3, '2018-12-01'),
(9, 5, 1, 1, '2018-12-01'),
(10, 5, 2, 2, '2018-12-01'),
(11, 5, 3, 3, '2018-12-01'),
(12, 5, 1, 1, '2018-12-01'),
(13, 5, 1, 1, '2018-12-01'),
(14, 5, 2, 2, '2018-12-01'),
(15, 5, 3, 3, '2018-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_expediente`
--

CREATE TABLE `tb_expediente` (
  `codi_exp` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(25000) DEFAULT NULL,
  `codi_clie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `codi_factu` int(11) NOT NULL,
  `num_control` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fech_emis` date DEFAULT '0000-00-00',
  `codi_clie` int(11) DEFAULT NULL,
  `monto_neto` decimal(10,2) DEFAULT NULL,
  `monto_iva` decimal(10,2) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para el registro de las facturas';

--
-- Volcado de datos para la tabla `tb_factura`
--

INSERT INTO `tb_factura` (`codi_factu`, `num_control`, `fech_emis`, `codi_clie`, `monto_neto`, `monto_iva`, `monto_total`) VALUES
(1, '0001', '2018-12-01', 3, '5000.00', '0.00', '5000.00'),
(2, '0002', '2018-12-01', 3, '25554.00', '0.00', '25554.00'),
(3, '0003', '2018-12-01', 3, '344.00', '0.00', '344.00'),
(4, '0004', '2018-12-01', 5, '99999999.99', '0.00', '99999999.99'),
(5, '0005', '2018-12-01', 5, '46546465.00', '0.00', '46546465.00'),
(6, '0006', '2018-12-01', 5, '3232.00', '0.00', '3232.00'),
(7, '0007', '2018-12-01', 5, '99999999.99', '0.00', '99999999.99'),
(8, '0008', '2018-12-01', 5, '0.00', '0.00', '0.00'),
(9, '0009', '2018-12-01', 5, '44899.00', '0.00', '44899.00'),
(10, '00010', '2018-12-01', 5, '0.00', '0.00', '0.00'),
(11, '00011', '2018-12-01', 5, '1311.00', '0.00', '1311.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_gastos`
--

CREATE TABLE `tb_gastos` (
  `codi_gastos` int(11) NOT NULL,
  `fech_emis` date DEFAULT '0000-00-00',
  `monto_neto` decimal(10,2) DEFAULT NULL,
  `monto_iva` decimal(10,2) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para el registro de los gastos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion_marca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_marcas`
--

INSERT INTO `tb_marcas` (`id_marca`, `descripcion_marca`) VALUES
(1, 'generica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `cantidad_producto` int(11) DEFAULT NULL,
  `costo_producto` int(11) DEFAULT NULL,
  `precio_producto` int(11) DEFAULT NULL,
  `minimo_stock` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id_producto`, `descripcion_producto`, `id_categoria`, `id_marca`, `cantidad_producto`, `costo_producto`, `precio_producto`, `minimo_stock`, `puntaje`, `fecha_creacion`) VALUES
(1, 'Producto prueba', 2, 1, 42, 2, 3, 3, 1, '2018-11-29'),
(2, 'Corte de barba', 2, 1, 58, 1000, 1000, 10, 2, '2018-11-29'),
(3, 'Corte de cabello', 2, 1, 13, 2500, 1500, 10, 3, '2018-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_puntaje_cliente`
--

CREATE TABLE `tb_puntaje_cliente` (
  `codi_puntaje_cliente` int(11) NOT NULL,
  `codi_cliente` int(11) DEFAULT NULL,
  `puntaje_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_puntaje_cliente`
--

INSERT INTO `tb_puntaje_cliente` (`codi_puntaje_cliente`, `codi_cliente`, `puntaje_cliente`) VALUES
(1, 3, 22),
(2, 5, 37),
(3, 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_puntos_posteo`
--

CREATE TABLE `tb_puntos_posteo` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `puntos_asignados` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_posteo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `tb_puntos_posteo`
--

INSERT INTO `tb_puntos_posteo` (`id`, `id_cliente`, `puntos_asignados`, `id_actividad`, `fecha_posteo`) VALUES
(1, 5, 8, 2, '2018-12-01'),
(2, 5, 8, 1, '2018-12-01'),
(3, 6, 8, 1, '2018-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_regi_cli`
--

CREATE TABLE `tb_regi_cli` (
  `codi_clie` int(11) NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nomb_clie` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_clie` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `rif_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nit_clie` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fech_clie` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `dire_clie` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `pais_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciud_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esta_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tele_clie` varchar(14) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `tele_clie_opci` varchar(14) COLLATE utf8_spanish2_ci DEFAULT 'NA',
  `email` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cont_espe_clie` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_modificado` date DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_regi_cli`
--

INSERT INTO `tb_regi_cli` (`codi_clie`, `cedula`, `nomb_clie`, `ape_clie`, `rif_clie`, `nit_clie`, `fech_clie`, `dire_clie`, `pais_clie`, `ciud_clie`, `esta_clie`, `tele_clie`, `tele_clie_opci`, `email`, `cont_espe_clie`, `fecha_modificado`, `password`) VALUES
(1, '12345678', 'Pedro', 'Gonzales', NULL, NULL, '02/11/2018', 'Alguna por alli', NULL, NULL, NULL, '12345678', '87654321', 'prueba@mail.com', NULL, NULL, 'eb0a191797624dd3a48fa681d3061212'),
(2, '14852963', 'Maria', 'Gonzales', NULL, NULL, '02/11/2018', 'Alguna por allí', NULL, NULL, NULL, '123456789', '9874563210', 'maria@mail.com', NULL, NULL, 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, '4487878', 'Daniel', 'Pinto', NULL, NULL, '29/11/2018', 'Urb. Las rosas,  Sector la explanada, Edifih-44', NULL, NULL, NULL, '04241930146', '04241930146', 'holadanielmejia@gmail.com', NULL, NULL, 'd5802d05bbf0881de2fd823c9560619e'),
(4, '18592301', 'Erain', 'Moya', NULL, NULL, '29/11/2018', 'Alguna por alli', NULL, NULL, NULL, '12345678998765', '1234567894', 'evmoya.89@gmail.com', NULL, NULL, '3fc0a7acf087f549ac2b266baf94b8b1'),
(5, '233445', 'Alex', 'Pinto', NULL, NULL, '01/12/2018', 'Urb. Las rosas,  Sector la explanada, Edifih-44', NULL, NULL, NULL, '04241930146', '04241930146', 'danielmejia140488@gmail.com', NULL, NULL, 'eb0a191797624dd3a48fa681d3061212'),
(6, '24455', 'Daniel Alejandro', 'Pinto', NULL, NULL, '01/12/2018', 'Urb. Las rosas,  Sector la explanada, Edifih-44', NULL, NULL, NULL, '04241930146', '04241930146', 'master@mail.com', NULL, NULL, 'eb0a191797624dd3a48fa681d3061212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_regi_pers_cont`
--

CREATE TABLE `tb_regi_pers_cont` (
  `codi_cont` int(11) NOT NULL,
  `nomb_cont` varchar(50) NOT NULL,
  `apel_cont` varchar(50) NOT NULL,
  `cargo_cont` varchar(50) NOT NULL,
  `tele_cont` varchar(11) NOT NULL,
  `corr_cont` varchar(50) NOT NULL,
  `codi_clie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_status_factura`
--

CREATE TABLE `tb_status_factura` (
  `codi_status` int(11) NOT NULL,
  `descrip_status_factura` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_status_factura`
--

INSERT INTO `tb_status_factura` (`codi_status`, `descrip_status_factura`) VALUES
(1, 'Pagada'),
(2, 'Por Cobrar'),
(3, 'Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user_reg`
--

CREATE TABLE `tb_user_reg` (
  `id` int(11) NOT NULL,
  `nom_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ape_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ced_usuario` varchar(8) NOT NULL,
  `car_usuario` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tip_usuario` int(1) NOT NULL,
  `id_config` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_user_reg`
--

INSERT INTO `tb_user_reg` (`id`, `nom_usuario`, `ape_usuario`, `ced_usuario`, `car_usuario`, `password`, `tip_usuario`, `id_config`) VALUES
(300, 'Daniel', 'Mejia', '18190473', 'Gerente General', 'eb0a191797624dd3a48fa681d3061212', 1, 2),
(301, 'Admin', 'Milan', '00000000', 'Administrador', '7ce501ef908fa56fe85be6ef50605c44', 1, 1),
(302, 'Erain', 'Moya', '18592301', 'Gerente General', '3fc0a7acf087f549ac2b266baf94b8b1', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actividad_posteo`
--
ALTER TABLE `tb_actividad_posteo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_caja`
--
ALTER TABLE `tb_caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `tb_categorias_productos`
--
ALTER TABLE `tb_categorias_productos`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_categoria_puntaje`
--
ALTER TABLE `tb_categoria_puntaje`
  ADD PRIMARY KEY (`id_puntaje`);

--
-- Indices de la tabla `tb_config`
--
ALTER TABLE `tb_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  ADD PRIMARY KEY (`codi_detalle`);

--
-- Indices de la tabla `tb_detalle_gastos`
--
ALTER TABLE `tb_detalle_gastos`
  ADD PRIMARY KEY (`codi_detalle_gastos`);

--
-- Indices de la tabla `tb_detalle_puntos`
--
ALTER TABLE `tb_detalle_puntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_expediente`
--
ALTER TABLE `tb_expediente`
  ADD PRIMARY KEY (`codi_exp`),
  ADD KEY `codi_clie` (`codi_clie`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`codi_factu`);

--
-- Indices de la tabla `tb_gastos`
--
ALTER TABLE `tb_gastos`
  ADD PRIMARY KEY (`codi_gastos`);

--
-- Indices de la tabla `tb_marcas`
--
ALTER TABLE `tb_marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tb_puntaje_cliente`
--
ALTER TABLE `tb_puntaje_cliente`
  ADD PRIMARY KEY (`codi_puntaje_cliente`);

--
-- Indices de la tabla `tb_puntos_posteo`
--
ALTER TABLE `tb_puntos_posteo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_regi_cli`
--
ALTER TABLE `tb_regi_cli`
  ADD PRIMARY KEY (`codi_clie`);

--
-- Indices de la tabla `tb_regi_pers_cont`
--
ALTER TABLE `tb_regi_pers_cont`
  ADD PRIMARY KEY (`codi_cont`);

--
-- Indices de la tabla `tb_status_factura`
--
ALTER TABLE `tb_status_factura`
  ADD PRIMARY KEY (`codi_status`);

--
-- Indices de la tabla `tb_user_reg`
--
ALTER TABLE `tb_user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_caja`
--
ALTER TABLE `tb_caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_categorias_productos`
--
ALTER TABLE `tb_categorias_productos`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_categoria_puntaje`
--
ALTER TABLE `tb_categoria_puntaje`
  MODIFY `id_puntaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_config`
--
ALTER TABLE `tb_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  MODIFY `codi_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_gastos`
--
ALTER TABLE `tb_detalle_gastos`
  MODIFY `codi_detalle_gastos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_puntos`
--
ALTER TABLE `tb_detalle_puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_expediente`
--
ALTER TABLE `tb_expediente`
  MODIFY `codi_exp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `codi_factu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_gastos`
--
ALTER TABLE `tb_gastos`
  MODIFY `codi_gastos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_marcas`
--
ALTER TABLE `tb_marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_puntaje_cliente`
--
ALTER TABLE `tb_puntaje_cliente`
  MODIFY `codi_puntaje_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_puntos_posteo`
--
ALTER TABLE `tb_puntos_posteo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_regi_cli`
--
ALTER TABLE `tb_regi_cli`
  MODIFY `codi_clie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_regi_pers_cont`
--
ALTER TABLE `tb_regi_pers_cont`
  MODIFY `codi_cont` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_status_factura`
--
ALTER TABLE `tb_status_factura`
  MODIFY `codi_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_user_reg`
--
ALTER TABLE `tb_user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
