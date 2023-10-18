-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql110.ezyro.com
-- Tiempo de generación: 18-10-2023 a las 09:52:40
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ezyro_35208593_helpdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion`
--

CREATE TABLE `t_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_oficina`, `id_articulo`, `fecha_insert`) VALUES
(4, 3, 4, '2023-10-14 09:16:53'),
(7, 5, 7, '2023-10-14 09:16:53'),
(10, 1, 10, '2023-10-14 09:16:53'),
(12, 5, 12, '2023-10-14 09:16:53'),
(13, 3, 13, '2023-10-14 09:16:53'),
(15, 8, 15, '2023-10-14 09:16:53'),
(16, 7, 16, '2023-10-14 09:16:53'),
(18, 3, 18, '2023-10-14 09:16:53'),
(19, 3, 19, '2023-10-14 09:16:53'),
(20, 3, 20, '2023-10-14 09:16:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_oficina` (`id_oficina`),
  ADD KEY `id_articulo` (`id_articulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD CONSTRAINT `t_asignacion_ibfk_1` FOREIGN KEY (`id_oficina`) REFERENCES `t_oficina` (`id_oficina`),
  ADD CONSTRAINT `t_asignacion_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `t_articulos` (`id_articulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
