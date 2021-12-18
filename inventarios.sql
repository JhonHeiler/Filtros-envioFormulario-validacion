-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2021 a las 19:36:24
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'carta'),
(2, 'escolares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(3, 'kalley'),
(4, 'samsung');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(11) COLLATE utf8_bin NOT NULL,
  `identificacion` int(15) NOT NULL,
  `tipo_identificacion_id` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(30) COLLATE utf8_bin NOT NULL,
  `clave` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `telefono`, `identificacion`, `tipo_identificacion_id`, `id_sexo`, `correo`, `direccion`, `clave`) VALUES
(1, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 223456543, 1, 1, 'heylerty7@gmail.com', 'LA VICTO', '12345678'),
(3, 'carlo', 'Mosquera cordoba', '3234960276', 2147483647, 1, 1, 'heylerty@gmail.com', 'LA VICTO', '234567898765'),
(6, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 0, 1, 1, 'heylerty7@gmail.com', 'LA VICTO', '234567890'),
(7, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 3456789, 1, 2, 'HEYLERTY7@GMAIL.COM', 'LA VICTO', '34567876'),
(8, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 22345678, 1, 1, 'heylerty7@gmail.com', 'LA VICTO', '234567'),
(9, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 3456787, 1, 2, 'heylerty7@gmail.com', 'LA VICTO', '456776543'),
(10, 'ingrit', 'Mosquera cordoba', '3234960276', 1, 1, 1, 'heylerty7@gmail.com', 'LA VICTO', '3456'),
(11, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 234567567, 1, 1, 'heylerty7@gmail.com', 'LA VICTO', '3456784355'),
(12, 'Jhon Heiler', 'Mosquera cordoba', '3234960276', 34567654, 1, 2, 'heylerty7@gmail.com', 'LA VICTO', '34567876543');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_marca` int(11) NOT NULL,
  `modelo` varchar(50) COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_provedor` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `id_marca`, `modelo`, `stock`, `fecha`, `id_provedor`, `referencia`, `descripcion`, `id_categoria`) VALUES
(2, 'davidsaaaaannn', 3, '2015', 33, '2021-11-09', 1, '33', '5ttyee', 2),
(3, 'Comfachoco', 3, 'casax', 7654, '2021-11-14', 1, 'sui', 'queda floja', 2),
(5, 'carlo', 4, 'casax', 34, '2021-11-21', 1, 'sui', 'queda floja', 1),
(6, 'JHON HEILER', 3, 'casax', 23, '2021-11-06', 2, '34', '45', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_provedor` int(11) NOT NULL,
  `num_docu` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(50) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_provedor`, `num_docu`, `nombre`, `telefono`, `direccion`) VALUES
(1, '234456', 'david', '4567887654', 'buenos aire'),
(2, '456543', 'alex', '356543', 'buenos aire');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `tipo_sexo` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `tipo_sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `tipo_identificacion_id` int(11) NOT NULL,
  `nombre_tipo_identificacion` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`tipo_identificacion_id`, `nombre_tipo_identificacion`) VALUES
(1, 'Cédula de Ciudadanía '),
(2, 'Tarjeta de identidad '),
(3, 'Registro civil');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `tipo_identificacion_fk` (`tipo_identificacion_id`),
  ADD KEY `sexo_fk` (`id_sexo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_marca` (`id_marca`),
  ADD KEY `fk_categoria` (`id_categoria`),
  ADD KEY `fk_proveedor` (`id_provedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_provedor`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`tipo_identificacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_provedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `tipo_identificacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `sexo_fk` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `tipo_identificacion_fk` FOREIGN KEY (`tipo_identificacion_id`) REFERENCES `tipo_identificacion` (`tipo_identificacion_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_provedor`) REFERENCES `proveedores` (`id_provedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
