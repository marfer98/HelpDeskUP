-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2022 a las 11:41:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_oficina`, `id_equipo`, `marca`, `modelo`, `color`, `descripcion`, `memoria`, `disco_duro`, `procesador`) VALUES
(1, 4, 1, 'Marca', 'Modelo', 'Color', 'Descripcion', 'memoria', 'disco duro', 'procesador '),
(4, 3, 2, 'HP', 'gamer', 'verde', 'vamos a ver si funciona ', '32gb', '1tb', 'i9'),
(5, 3, 5, 'Logitech', 'AX108', 'Negro con Gris', 'Nuevo', '', '', ''),
(6, 1, 6, 'JBL', 'GO 2', 'NEGRO', '', '', '', ''),
(7, 5, 9, 'EPSON', 'PRO', 'Blanco', 'Impresora tipo fotocopiadora ', '', '', '');

--
-- Volcado de datos para la tabla `t_cat_equipos`
--

INSERT INTO `t_cat_equipos` (`id_equipo`, `nombre`, `descripcion`) VALUES
(1, 'PC', 'fas fa-desktop'),
(2, 'Laptop', 'fas fa-laptop'),
(5, 'Mouse', 'fas fa-mouse'),
(6, 'Parlante', 'fas fa-volume-up'),
(9, 'Impresora', 'fas fa-print');

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`, `fecha_insert`) VALUES
(1, 'cliente', 'Es un cliente', '2022-01-03 11:44:18'),
(2, 'admin', 'Es el Administrador del sistema', '2022-01-03 11:44:18');

--
-- Volcado de datos para la tabla `t_oficina`
--

INSERT INTO `t_oficina` (`id_oficina`, `nombre`, `telefono`, `correo`, `fecha_insert`) VALUES
(1, 'Informática', '0981288060', 'marferantonio@gmail.com', '2022-01-03 08:47:00'),
(3, 'apelación', '12454', 'apel@gmail.com', '2022-01-03 09:12:43'),
(4, 'Mesa de Entrada', '11111111', 'MESA@GMAIL.COM', '2022-01-03 09:19:17'),
(5, 'telecentro', '0981288060', 'telecentrocsj@gmail.com', '2022-01-04 10:49:36');

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_oficina`, `usuario`, `password`, `ubicacion`, `activo`, `fecha_insert`) VALUES
(1, 2, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Primer piso', 1, '2022-01-03 08:57:33'),
(3, 1, 3, 'Rocio ', '8cb2237d0679ca88db6464eac60da96345513964', 'Tercer Piso', 1, '2022-01-03 09:19:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
