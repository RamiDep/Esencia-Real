-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2026 a las 19:11:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perfumes_esencia_real`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_perfume`
--

CREATE TABLE `marca_perfume` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL COMMENT 'Nombre de la marca al que pertenece el perfume',
  `pais_marca` varchar(100) NOT NULL COMMENT 'Pais de la marca',
  `descripcion_marca` varchar(255) NOT NULL,
  `imagen_marca` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfumes`
--

CREATE TABLE `perfumes` (
  `perfume_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL COMMENT 'Relacionado con la tabla marcas',
  `id_proveedor` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL COMMENT 'precio de costo del perfume',
  `costo_botella_completa` decimal(10,2) NOT NULL COMMENT 'precio de la botella completa sin descarts',
  `volumen_botella` int(11) NOT NULL COMMENT 'Volumen en ML.',
  `genero` tinyint(4) NOT NULL COMMENT '1 = hombre\r\n2 = mujer\r\n3 = Ambos',
  `tipo` tinyint(4) NOT NULL COMMENT '1 = Eau de Toilette\r\n2 = Eau de Parfum\r\n3 = Extrait de Parfum',
  `descripcion` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = activo\r\n0 = inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `id_presentacion` int(11) NOT NULL,
  `perfume_id` int(11) NOT NULL,
  `tamano_ml` int(11) DEFAULT NULL COMMENT 'Por ahora solo tiene tamaños(mililitros) de:\r\n3 Ml\r\n5 Ml\r\n10 Ml',
  `precio_venta` decimal(10,2) DEFAULT NULL COMMENT 'Precio de venta del tamaño de los descarsts',
  `status` tinyint(4) NOT NULL COMMENT '1 = disponible\r\n0 = no disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(150) NOT NULL,
  `empresa_proveedor` varchar(150) NOT NULL,
  `telefono_proveedor` varchar(20) DEFAULT NULL,
  `email_proveedor` varchar(150) DEFAULT NULL,
  `direccion_proveedor` text DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_proveedor` tinyint(4) DEFAULT NULL COMMENT '1 = Activo\r\n0 = No activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `last_name_fat` varchar(30) NOT NULL,
  `last_name_mot` varchar(30) NOT NULL,
  `user_user` varchar(40) NOT NULL COMMENT 'Nombre del usuario que dio de alta, no hace referencia al nombre propio',
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `numer_phone` varchar(10) NOT NULL,
  `rol_user` tinyint(4) NOT NULL COMMENT '[1] = Administrador',
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL COMMENT '[0] = inactivo,\r\n[1] = Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `last_name_fat`, `last_name_mot`, `user_user`, `email`, `password`, `numer_phone`, `rol_user`, `date_create`, `status`) VALUES
(1, 'Ramiro ', 'Cortes', 'Morales', 'ramiro.cortes', 'developerSoftware23@gmail.com', '22ea04c3854c083a235188060b5df072', '4341031181', 1, '2026-05-31 00:38:21', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca_perfume`
--
ALTER TABLE `marca_perfume`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`perfume_id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD PRIMARY KEY (`id_presentacion`),
  ADD KEY `perfume_id` (`perfume_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca_perfume`
--
ALTER TABLE `marca_perfume`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `perfume_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD CONSTRAINT `perfumes_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marca_perfume` (`id_marca`),
  ADD CONSTRAINT `perfumes_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD CONSTRAINT `presentaciones_ibfk_1` FOREIGN KEY (`perfume_id`) REFERENCES `perfumes` (`perfume_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
