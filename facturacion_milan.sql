-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-12-2018 a las 12:12:28
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
(1, 'Barberia', 1, '2018-12-05');

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
(1, 1, 1, 'prueba', 1, 555);

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

--
-- Volcado de datos para la tabla `tb_detalle_gastos`
--

INSERT INTO `tb_detalle_gastos` (`codi_detalle_gastos`, `codi_gastos`, `cantidad`, `descripcion`, `precio`) VALUES
(1, 1, 1, 'gasa absorbente no esteril', 6800),
(2, 1, 1, 'brocha en abanico', 4900);

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
(1, 1, 1, 1, '2018-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados`
--

CREATE TABLE `tb_empleados` (
  `id` int(11) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono_principal` varchar(15) NOT NULL,
  `telefono_secundario` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cargo_ocupacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_empleados`
--

INSERT INTO `tb_empleados` (`id`, `cedula`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `telefono_principal`, `telefono_secundario`, `email`, `cargo_ocupacion`) VALUES
(1, '18190473', 'Daniel', 'Mejia', '2018-12-12', 'dswawa', 'adawd', 'awdawd', 'awdawd', 'awdawda'),
(2, '1096248891', 'ANA LUCIA', 'ESTEPA CABRALES', '1969-12-31', 'CALLE 43A #24 BOSA LA LIBERTAD', '3004565227', '', 'ANALUCACABRALES@HOTMAIL.COM', 'MANICURISTA'),
(3, '1030699648', 'YENIFER ALEXANDRA', 'SUAREZ CASTRO', '1969-12-31', 'CALLE 54 C SUR # 87-21', '3224268739', '', 'JENNIFER18_09@HOTMAIL.COM', 'ESTETICISTA'),
(4, '146583230', 'ITALO JOSE', 'GOYO SILVA', '1992-11-01', 'CALLE 54D BIS # 88H', '3123055683', '', 'ITALOGOYOOPSU@GMAIL.COM', 'ESTETICISTA');

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
(1, '0001', '2018-12-05', 1, '555.00', '0.00', '555.00');

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

--
-- Volcado de datos para la tabla `tb_gastos`
--

INSERT INTO `tb_gastos` (`codi_gastos`, `fech_emis`, `monto_neto`, `monto_iva`, `monto_total`) VALUES
(1, '2018-12-04', '11700.00', '0.00', '11700.00');

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
(1, 'Generica');

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
(1, 'producto', 1, 1, 0, 2000, 5000, 5, 1, '2018-12-05');

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
(1, 1, 8);

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
(1, '3142687819', 'JULIETH ', 'LOPEZ', NULL, NULL, '06/12/2018', 'BOSA', NULL, NULL, NULL, '3142687819', '3142687819', '3142687819', NULL, NULL, '594b5a31a8ed8a091a566201d3ca232d'),
(3, '3228628091', 'MIGUEL ANGEL', 'PICO', NULL, NULL, '06/12/2018', 'BOSA ', NULL, NULL, NULL, '3228628091', '3228628091', '3228628091', NULL, NULL, '79d713de061f7af0c6be6d4607578ca3'),
(4, '', 'ARCIBELLY ', 'SOTO', NULL, NULL, '', '', NULL, NULL, NULL, '3023084830', '', 'ARCIBELLYSOTO', NULL, NULL, '5aec3e01b4247430c1da2f9e880bac12'),
(5, '5090618712', 'Daniel Alejandro', 'Pinto', NULL, NULL, '08/12/2018', 'Engativa', NULL, NULL, NULL, '3004515218', '', 'holadanielmejia@gmail.com', NULL, NULL, '594b5a31a8ed8a091a566201d3ca232d');

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
-- Estructura de tabla para la tabla `tb_reporte_empleados`
--

CREATE TABLE `tb_reporte_empleados` (
  `id_reporte` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_detalle_factura` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `tb_reporte_empleados`
--

INSERT INTO `tb_reporte_empleados` (`id_reporte`, `id_empleado`, `id_detalle_factura`, `fecha`) VALUES
(1, 0, 1, '2018-12-05'),
(2, 1, 1, '2018-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_status_factura`
--

CREATE TABLE `tb_status_factura` (
  `codi_status` int(11) NOT NULL,
  `descrip_status_factura` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Usuario', 'Admin', '12345678', 'Administrador del Sistema', 'b433ce675b32a824e24d762ca0fa1ba9', 1, 2);

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
-- Indices de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
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
-- Indices de la tabla `tb_reporte_empleados`
--
ALTER TABLE `tb_reporte_empleados`
  ADD PRIMARY KEY (`id_reporte`);

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
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_categorias_productos`
--
ALTER TABLE `tb_categorias_productos`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `codi_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_gastos`
--
ALTER TABLE `tb_detalle_gastos`
  MODIFY `codi_detalle_gastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_puntos`
--
ALTER TABLE `tb_detalle_puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_expediente`
--
ALTER TABLE `tb_expediente`
  MODIFY `codi_exp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `codi_factu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_gastos`
--
ALTER TABLE `tb_gastos`
  MODIFY `codi_gastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_marcas`
--
ALTER TABLE `tb_marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_puntaje_cliente`
--
ALTER TABLE `tb_puntaje_cliente`
  MODIFY `codi_puntaje_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_puntos_posteo`
--
ALTER TABLE `tb_puntos_posteo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_regi_cli`
--
ALTER TABLE `tb_regi_cli`
  MODIFY `codi_clie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_regi_pers_cont`
--
ALTER TABLE `tb_regi_pers_cont`
  MODIFY `codi_cont` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_reporte_empleados`
--
ALTER TABLE `tb_reporte_empleados`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_status_factura`
--
ALTER TABLE `tb_status_factura`
  MODIFY `codi_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_user_reg`
--
ALTER TABLE `tb_user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
