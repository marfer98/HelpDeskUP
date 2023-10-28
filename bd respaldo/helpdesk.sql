-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql110.ezyro.com
-- Tiempo de generación: 24-10-2023 a las 06:33:03
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
-- Estructura de tabla para la tabla `t_adquisiciones`
--

CREATE TABLE `t_adquisiciones` (
  `id_adquisicion` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_adquisiciones`
--

INSERT INTO `t_adquisiciones` (`id_adquisicion`, `id_articulo`, `id_proveedor`, `cantidad`, `fecha_insert`) VALUES
(1, 1, 1, 100, '2023-10-20 14:24:30'),
(3, 29, 1, 100, '2023-10-23 10:25:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_articulos`
--

CREATE TABLE `t_articulos` (
  `id_articulo` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `nombreEquipoA` varchar(255) NOT NULL,
  `rotulado` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `numeroSerie` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `memoria` varchar(255) DEFAULT NULL,
  `tipo_ram` varchar(255) DEFAULT NULL,
  `disco_duro` varchar(255) DEFAULT NULL,
  `procesador` varchar(255) DEFAULT NULL,
  `sistema_operativo` varchar(255) DEFAULT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_articulos`
--

INSERT INTO `t_articulos` (`id_articulo`, `id_equipo`, `id_proveedor`, `nombreEquipoA`, `rotulado`, `marca`, `modelo`, `numeroSerie`, `descripcion`, `memoria`, `tipo_ram`, `disco_duro`, `procesador`, `sistema_operativo`, `fecha_insert`) VALUES
(1, 1, 1, 'PC de oficina', '', 'Toshiba', 'RG-506', 'vrg0787k7', '', '', NULL, NULL, '', 'Windows 10 64 bits', '2023-10-20 14:26:37'),
(4, 2, 0, '', NULL, 'HP', 'gamer', 'verde', 'Aca va la descripción', '32gb', NULL, '1tb', 'i9', NULL, '2023-10-14 09:16:53'),
(7, 9, 0, '', NULL, 'EPSON', 'PRO', 'Blanco', 'Impresora tipo fotocopiadora ', '', NULL, '', '', NULL, '2023-10-14 09:16:53'),
(10, 2, 0, '', NULL, '1', 'GT547', NULL, 'descrip', 'RAM', NULL, 'DIS', 'PRO', NULL, '2023-10-14 09:16:53'),
(12, 1, 0, 'nombre equipo', NULL, 'Marca', 'Modelo', 'tag', 'Descripción', 'memoria', NULL, 'disco duro', 'procesador ', NULL, '2023-10-14 09:16:53'),
(13, 1, 0, 'APE2SE001', NULL, 'HP', '250g7', '4A185048W', 'Pc nueva', '8GB', NULL, '250GB', 'i3', NULL, '2023-10-14 09:16:53'),
(15, 1, 0, 'ETPC001', NULL, 'HP', 'HP All-in-One ', '4A185048X', '', '8GB', NULL, '500 GB', 'i3', NULL, '2023-10-14 09:16:53'),
(16, 2, 0, 'MDEPC001', NULL, 'DELL', 'AX800', 'AJRE1000', 'PC negro nuevo con mouse, teclado y un parlante ', '8GB', NULL, '250 gb', 'i3 8th', NULL, '2023-10-14 09:16:53'),
(18, 9, 0, 'APE2SE006', '', 'Marca', 'GT547', '4A185048W', '', '', '', '', '', 'Windows 10 32 bits', '2023-10-14 09:16:53'),
(19, 6, 0, 'nombre equipo', 'ram', 'marca', 'modelo', 'tag', '', '', 'ram', '', '', 'Windows 10 32 bits', '2023-10-14 09:16:53'),
(20, 2, 0, 'nombre equipo', 'DD4', 'CANNON', 'GT547', 'tag', '', '3GB', 'DD4', 'disco duro', 'i3', 'Windows 7 64 bits', '2023-10-14 09:16:53'),
(24, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:00:38'),
(25, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:14:53'),
(26, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:16:35'),
(27, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:18:27'),
(28, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:25:25'),
(29, 2, 1, 'Asus GN-545', '', 'ASUS', 'GN-545', '', '', '8GB', NULL, NULL, 'I3 5000', 'Windows 10 64 bits', '2023-10-23 10:25:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion`
--

CREATE TABLE `t_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_oficina`, `id_articulo`, `cantidad`, `fecha_insert`) VALUES
(4, 3, 4, 0, '2023-10-14 09:16:53'),
(7, 5, 7, 0, '2023-10-14 09:16:53'),
(10, 1, 10, 0, '2023-10-14 09:16:53'),
(12, 5, 12, 0, '2023-10-14 09:16:53'),
(13, 3, 13, 0, '2023-10-14 09:16:53'),
(15, 8, 15, 0, '2023-10-14 09:16:53'),
(16, 7, 16, 0, '2023-10-14 09:16:53'),
(18, 3, 18, 0, '2023-10-14 09:16:53'),
(19, 3, 19, 0, '2023-10-14 09:16:53'),
(20, 3, 20, 0, '2023-10-14 09:16:53'),
(24, 3, 16, 0, '2023-10-18 11:15:02'),
(25, 8, 18, 0, '2023-10-18 11:18:39'),
(26, 8, 18, 0, '2023-10-18 11:19:22'),
(27, 9, 7, 0, '2023-10-19 14:00:19'),
(28, 9, 19, 0, '2023-10-19 14:01:35'),
(29, 9, 7, 0, '2023-10-19 14:03:40'),
(31, 9, 18, 0, '2023-10-19 14:04:08'),
(32, 15, 18, 0, '2023-10-19 14:04:56'),
(33, 3, 18, 0, '2023-10-19 14:05:29'),
(34, 3, 19, 0, '2023-10-20 14:10:00'),
(35, 18, 7, 0, '2023-10-23 09:14:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_equipos`
--

CREATE TABLE `t_cat_equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cat_equipos`
--

INSERT INTO `t_cat_equipos` (`id_equipo`, `nombre`, `descripcion`, `fecha_insert`) VALUES
(1, 'PC', 'fas fa-desktop', '2023-10-14 09:17:11'),
(2, 'Laptop', 'fas fa-laptop', '2023-10-14 09:17:11'),
(5, 'Monitor', 'fas fa-desktop', '2023-10-14 09:17:11'),
(6, 'Fotocopiadora', 'fas fa-print', '2023-10-14 09:17:11'),
(9, 'Impresora', 'fas fa-print', '2023-10-14 09:17:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `prioridad` int(11) NOT NULL,
  `fecha_insert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`, `prioridad`, `fecha_insert`) VALUES
(1, 'cliente', 'Es un cliente', 1, '2022-01-03 11:44:18'),
(2, 'admin', 'Es el Administrador del sistema', 10, '2022-01-03 11:44:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_oficina`
--

CREATE TABLE `t_oficina` (
  `id_oficina` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fecha_insert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_oficina`
--

INSERT INTO `t_oficina` (`id_oficina`, `nombre`, `telefono`, `correo`, `fecha_insert`) VALUES
(1, 'AdministraciÃ³n', '0981288060', 'ofi7@helpdesk.com', '2022-01-03 08:47:00'),
(3, 'ApelaciÃ³n', '12454', 'apel@gmail.com', '2022-01-03 09:12:43'),
(4, 'Mesa de Entrada', '0962812685', 'mesadeentrada@helpdesk.com', '2022-01-03 09:19:17'),
(5, 'telecentro', '0981288060', 'telecentrocsj@gmail.com', '2022-01-04 10:49:36'),
(7, 'Mesa de Entrada 1', '4545445', 'MESA@GMAIL.COM', '2022-02-03 08:05:33'),
(8, 'Estadisticas', '000', 'estadisticas@gmail.com', '2022-02-03 08:07:45'),
(9, 'AdministraciÃ³n ', '5471', 'admin@gmail.com', '2022-03-10 09:19:23'),
(13, 'Tesoreria', '0988002933', 'tesoreria@helpdesk.com', '2022-03-22 08:24:55'),
(14, 'Correo', '0998417063', 'correo@helpdesk.com', '2022-03-22 08:25:15'),
(15, 'Contabilidad', '0998844888', 'contabilidad@helpdesk.com', '2022-03-22 08:33:33'),
(16, 'Obra Civil', '0960237256', 'obracivil@helpdesk.com', '2022-03-22 08:33:54'),
(17, 'Recursos Humanos', '0990700821', 'recursoshumanos@helpdesk.com', '2022-03-22 08:34:10'),
(18, 'Control Personal', '0986795392', 'controlpersonal@helpdesk.com', '2022-03-22 08:34:23'),
(19, 'Oficina de Inspectoria', '0973303802', 'oficinadeinspectoria@helpdesk.com', '2022-03-22 08:34:38'),
(20, 'Facilitadores Judiciales ', '0991386847', 'facilitadoresjudiciales@helpdesk.com', '2022-03-22 08:35:09'),
(78, 'Prueba', '09812431242', 'ererer@erer', '2023-10-19 13:58:01'),
(80, 'Mitxel', '09812431242', 'ererer_@etert', '2023-10-19 14:06:35'),
(81, 'Oficina 5', '0984848', 'ofi5@gmail.com', '2023-10-20 11:44:19'),
(82, 'Oficina 7', '0959465484', 'ofi7@gmail.com', '2023-10-23 10:42:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proveedores`
--

CREATE TABLE `t_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_proveedores`
--

INSERT INTO `t_proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `fecha_insert`) VALUES
(1, 'Entregas S.A.', 'AsunciÃ³n', 6969, '2023-10-20 11:17:26'),
(2, 'Promex', 'Av. SebastiÃ¡n L.', 98546545, '2023-10-23 10:33:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recepcion`
--

CREATE TABLE `t_recepcion` (
  `id_recepcion` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(255) DEFAULT NULL,
  `fecha_recepcion` datetime NOT NULL DEFAULT current_timestamp(),
  `rotulado` varchar(255) DEFAULT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `procedencia` varchar(255) DEFAULT NULL,
  `descripcion_problema` varchar(255) DEFAULT NULL,
  `recibido` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `descripcion_solucion` varchar(255) DEFAULT NULL,
  `fecha_entrega` varchar(255) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `nombre_tecnico` varchar(255) NOT NULL,
  `informe_tecnico` varchar(255) DEFAULT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_recepcion`
--

INSERT INTO `t_recepcion` (`id_recepcion`, `id_equipo`, `nombre_equipo`, `fecha_recepcion`, `rotulado`, `numero_serie`, `ciudad`, `procedencia`, `descripcion_problema`, `recibido`, `responsable`, `descripcion_solucion`, `fecha_entrega`, `estatus`, `nombre_tecnico`, `informe_tecnico`, `fecha_insert`) VALUES
(1, 1, 'PCMES21', '2022-03-15 12:25:25', '1998-2222-229', '4A185048W', 'San Lorenzo', 'Procedencia', 'Problema', 'Recibido', 'Responsable', 'x', 'Fecha de Entrega', 2, 'Marcos Fernández', 'Informe', '2023-10-14 09:17:35'),
(3, 1, 'PCMES21', '2022-03-15 13:59:58', '1998-2222-229', '4A185048W', 'San Lorenzo', 'RECURSOS HUMANOS', 'error 404', 'Gente', 'Responsable', 'X', 'Fecha de Entrega', 2, 'Marcos Fernández', 'a', '2023-10-14 09:17:35'),
(6, 9, 'IMPRE338', '2022-03-17 09:30:10', 'IMP-2222-229', '4A185048IMP', 'San Lorenzo', 'TRIBUNAL DE LA NIÑEZ Y ADOLESCENCIA', 'No enciende', 'Leonardo Villasanti', 'a', 'x', '16.04.22', 0, '', '', '2023-10-14 09:17:35'),
(8, 1, 'nombre equipo', '2022-03-17 10:33:34', 'rotulado', 'tag', 'San Lorenzo', 'INFORMATICA', 'no', 'Marcos Fernández', 'Responsable', 'solucionado ', '16.03.22', 0, '', '', '2023-10-14 09:17:35'),
(16, 1, 'nombre equipo', '2022-03-29 08:18:29', '1998-2222-229', '4A185048W', 'San Lorenzo', 'TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL SEGUNDA SALA', 'x', 'Ernesto Barrios', 'Responsable', 'X', 'Fecha de Entrega', 2, 'Marcos Fernández', '', '2023-10-14 09:17:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes`
--

CREATE TABLE `t_reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_usuario_tecnico` int(11) DEFAULT NULL,
  `usuario_tecnico` varchar(60) DEFAULT NULL,
  `descripcion_problema` text NOT NULL,
  `solucion_problema` text DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_reportes`
--

INSERT INTO `t_reportes` (`id_reporte`, `id_usuario`, `id_equipo`, `id_usuario_tecnico`, `usuario_tecnico`, `descripcion_problema`, `solucion_problema`, `estatus`, `fecha`, `fecha_insert`) VALUES
(41, 5, 2, 1, 'Elsidia Caballero', 'x', 'solucionado', 0, '2022-04-04 09:03:45', '2023-10-14 09:17:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_sucursales`
--

CREATE TABLE `t_sucursales` (
  `id_sucursal` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_sucursales`
--

INSERT INTO `t_sucursales` (`id_sucursal`, `descripcion`, `direccion`, `estado`, `fecha_insert`) VALUES
(1, 'Sajonia L', 'Mariano Roque Alonso & Testanova, AsunciÃ³n', 1, '2023-10-14 10:09:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_insert` datetime DEFAULT current_timestamp(),
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_oficina`, `usuario`, `nombre`, `password`, `ubicacion`, `activo`, `fecha_insert`, `id_sucursal`) VALUES
(1, 2, 1, 'admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Primer piso', 1, '2022-01-03 08:57:33', 1),
(3, 2, 3, 'Rocio ', '', '011c945f30ce2cbafc452f39840f025693339c42', 'Tercer Piso', 1, '2022-01-03 09:19:17', 1),
(5, 1, 7, 'MDE001', '', '6e6484c552ab654fe83a243bdf159a35bcd81dcb', 'Planta baja', 0, '2022-02-03 08:05:33', 1),
(6, 2, 8, 'ESTA001', '', 'e8040662711125241cdab6e1da4f6b24587dd8a5', 'Planta baja', 0, '2022-02-03 08:07:45', 1),
(7, 2, 21, 'ererer', '', 'd4ccbc79af1c084468bbe0049c7085f2d7d55857', 'Lejos', 1, '2023-10-18 14:43:20', 1),
(11, 1, 76, '6767', '', '494358ffd9f44efeb1fc508318faa0224e6578e7', '', 1, '2023-10-19 13:55:34', 1),
(12, 1, 78, 'mitxel', '', '909f0c9b6de433b23a81fe89fac55fa7510bd83d', 'Cambio', 1, '2023-10-19 13:58:01', 1),
(13, 1, 80, 'mitxeltr', '', '224886ce66d5feef1581d6d55cc57d55165e54f9', '', 1, '2023-10-19 14:06:35', 1),
(14, 2, 82, 'ofi7', '', '8cb2237d0679ca88db6464eac60da96345513964', '', 1, '2023-10-23 10:42:32', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_adquisiciones`
--
ALTER TABLE `t_adquisiciones`
  ADD PRIMARY KEY (`id_adquisicion`);

--
-- Indices de la tabla `t_articulos`
--
ALTER TABLE `t_articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_oficina` (`id_oficina`),
  ADD KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `t_cat_equipos`
--
ALTER TABLE `t_cat_equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_oficina`
--
ALTER TABLE `t_oficina`
  ADD PRIMARY KEY (`id_oficina`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `t_proveedores`
--
ALTER TABLE `t_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `t_recepcion`
--
ALTER TABLE `t_recepcion`
  ADD PRIMARY KEY (`id_recepcion`),
  ADD KEY `FK_equipo` (`id_equipo`);

--
-- Indices de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `t_sucursales`
--
ALTER TABLE `t_sucursales`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD UNIQUE KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fkoficina_idx` (`id_oficina`),
  ADD KEY `fkRoles_idx` (`id_rol`),
  ADD KEY `fk_usuarios_sucursales` (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_adquisiciones`
--
ALTER TABLE `t_adquisiciones`
  MODIFY `id_adquisicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_articulos`
--
ALTER TABLE `t_articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `t_cat_equipos`
--
ALTER TABLE `t_cat_equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_oficina`
--
ALTER TABLE `t_oficina`
  MODIFY `id_oficina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `t_proveedores`
--
ALTER TABLE `t_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_recepcion`
--
ALTER TABLE `t_recepcion`
  MODIFY `id_recepcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `t_reportes`
--
ALTER TABLE `t_reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `t_sucursales`
--
ALTER TABLE `t_sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_articulos`
--
ALTER TABLE `t_articulos`
  ADD CONSTRAINT `t_articulos_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipos` (`id_equipo`);

--
-- Filtros para la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD CONSTRAINT `t_asignacion_ibfk_1` FOREIGN KEY (`id_oficina`) REFERENCES `t_oficina` (`id_oficina`),
  ADD CONSTRAINT `t_asignacion_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `t_articulos` (`id_articulo`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fk_usuarios_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `t_sucursales` (`id_sucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
