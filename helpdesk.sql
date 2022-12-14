-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2022 a las 20:19:54
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion`
--

CREATE TABLE `t_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
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
  `sistema_operativo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_asignacion`
--

INSERT INTO `t_asignacion` (`id_asignacion`, `id_oficina`, `id_equipo`, `nombreEquipoA`, `rotulado`, `marca`, `modelo`, `numeroSerie`, `descripcion`, `memoria`, `tipo_ram`, `disco_duro`, `procesador`, `sistema_operativo`) VALUES
(4, 3, 2, '', NULL, 'HP', 'gamer', 'verde', 'Aca va la descripción', '32gb', NULL, '1tb', 'i9', NULL),
(7, 5, 9, '', NULL, 'EPSON', 'PRO', 'Blanco', 'Impresora tipo fotocopiadora ', '', NULL, '', '', NULL),
(10, 1, 2, '', NULL, '1', 'GT547', NULL, 'descrip', 'RAM', NULL, 'DIS', 'PRO', NULL),
(12, 5, 1, 'nombre equipo', NULL, 'Marca', 'Modelo', 'tag', 'Descripción', 'memoria', NULL, 'disco duro', 'procesador ', NULL),
(13, 3, 1, 'APE2SE001', NULL, 'HP', '250g7', '4A185048W', 'Pc nueva', '8GB', NULL, '250GB', 'i3', NULL),
(15, 8, 1, 'ETPC001', NULL, 'HP', 'HP All-in-One ', '4A185048X', '', '8GB', NULL, '500 GB', 'i3', NULL),
(16, 7, 2, 'MDEPC001', NULL, 'DELL', 'AX800', 'AJRE1000', 'PC negro nuevo con mouse, teclado y un parlante ', '8GB', NULL, '250 gb', 'i3 8th', NULL),
(18, 3, 9, 'APE2SE006', '', 'Marca', 'GT547', '4A185048W', '', '', '', '', '', 'Windows 10 32 bits'),
(19, 3, 6, 'nombre equipo', 'ram', 'marca', 'modelo', 'tag', '', '', 'ram', '', '', 'Windows 10 32 bits'),
(20, 3, 2, 'nombre equipo', 'DD4', 'CANNON', 'GT547', 'tag', '', '3GB', 'DD4', 'disco duro', 'i3', 'Windows 7 64 bits');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_equipos`
--

CREATE TABLE `t_cat_equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_cat_equipos`
--

INSERT INTO `t_cat_equipos` (`id_equipo`, `nombre`, `descripcion`) VALUES
(1, 'PC', 'fas fa-desktop'),
(2, 'Laptop', 'fas fa-laptop'),
(5, 'Monitor', 'fas fa-desktop'),
(6, 'Fotocopiadora', 'fas fa-print'),
(9, 'Impresora', 'fas fa-print');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `fecha_insert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`, `fecha_insert`) VALUES
(1, 'cliente', 'Es un cliente', '2022-01-03 11:44:18'),
(2, 'admin', 'Es el Administrador del sistema', '2022-01-03 11:44:18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_oficina`
--

INSERT INTO `t_oficina` (`id_oficina`, `nombre`, `telefono`, `correo`, `fecha_insert`) VALUES
(1, 'Informática', '0981288060', 'marferantonio@gmail.com', '2022-01-03 08:47:00'),
(3, 'apelación', '12454', 'apel@gmail.com', '2022-01-03 09:12:43'),
(4, 'Mesa de Entrada', '11111111', 'MESA@GMAIL.COM', '2022-01-03 09:19:17'),
(5, 'telecentro', '0981288060', 'telecentrocsj@gmail.com', '2022-01-04 10:49:36'),
(7, 'Mesa de Entrada', '4545445', 'MESA@GMAIL.COM', '2022-02-03 08:05:33'),
(8, 'Estadisticas', '000', 'estadisticas@gmail.com', '2022-02-03 08:07:45'),
(9, 'Administración ', '5470', 'admin@gmail.com', '2022-03-10 09:19:23'),
(13, 'Tesoreria', '-', '-', '2022-03-22 08:24:55'),
(14, 'Correo', '-', '-', '2022-03-22 08:25:15'),
(15, 'Contabilidad', '-', '-', '2022-03-22 08:33:33'),
(16, 'Obra Civil', '-', '-', '2022-03-22 08:33:54'),
(17, 'Recursos Humanos', '-', '-', '2022-03-22 08:34:10'),
(18, 'Control Personal', '-', '-', '2022-03-22 08:34:23'),
(19, 'Oficina de Inspectoria', '-', '-', '2022-03-22 08:34:38'),
(20, 'Facilitadores Judiciales ', '-', '-', '2022-03-22 08:35:09');

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
  `informe_tecnico` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_recepcion`
--

INSERT INTO `t_recepcion` (`id_recepcion`, `id_equipo`, `nombre_equipo`, `fecha_recepcion`, `rotulado`, `numero_serie`, `ciudad`, `procedencia`, `descripcion_problema`, `recibido`, `responsable`, `descripcion_solucion`, `fecha_entrega`, `estatus`, `nombre_tecnico`, `informe_tecnico`) VALUES
(1, 1, 'PCMES21', '2022-03-15 12:25:25', '1998-2222-229', '4A185048W', 'San Lorenzo', 'Procedencia', 'Problema', 'Recibido', 'Responsable', 'x', 'Fecha de Entrega', 2, 'Marcos Fernández', 'Informe'),
(3, 1, 'PCMES21', '2022-03-15 13:59:58', '1998-2222-229', '4A185048W', 'San Lorenzo', 'RECURSOS HUMANOS', 'error 404', 'Gente', 'Responsable', 'X', 'Fecha de Entrega', 2, 'Marcos Fernández', 'a'),
(6, 9, 'IMPRE338', '2022-03-17 09:30:10', 'IMP-2222-229', '4A185048IMP', 'San Lorenzo', 'TRIBUNAL DE LA NIÑEZ Y ADOLESCENCIA', 'No enciende', 'Leonardo Villasanti', 'a', 'x', '16.04.22', 0, '', ''),
(8, 1, 'nombre equipo', '2022-03-17 10:33:34', 'rotulado', 'tag', 'San Lorenzo', 'INFORMATICA', 'no', 'Marcos Fernández', 'Responsable', 'solucionado ', '16.03.22', 0, '', ''),
(16, 1, 'nombre equipo', '2022-03-29 08:18:29', '1998-2222-229', '4A185048W', 'San Lorenzo', 'TRIBUNAL DE APELACION CIVIL, COMERCIAL Y LABORAL SEGUNDA SALA', 'x', 'Ernesto Barrios', 'Responsable', 'X', 'Fecha de Entrega', 2, 'Marcos Fernández', '');

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
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_reportes`
--

INSERT INTO `t_reportes` (`id_reporte`, `id_usuario`, `id_equipo`, `id_usuario_tecnico`, `usuario_tecnico`, `descripcion_problema`, `solucion_problema`, `estatus`, `fecha`) VALUES
(40, 5, 2, 1, '', 'tengo una falla en mi office...', 'estamos trabajando en la solución', 1, '2022-04-04 09:01:01'),
(41, 5, 2, 1, 'Elsidia Caballero', 'x', 'solucionado', 0, '2022-04-04 09:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_insert` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_oficina`, `usuario`, `password`, `ubicacion`, `activo`, `fecha_insert`) VALUES
(1, 2, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Primer piso', 1, '2022-01-03 08:57:33'),
(3, 2, 3, 'Rocio ', '011c945f30ce2cbafc452f39840f025693339c42', 'Tercer Piso', 1, '2022-01-03 09:19:17'),
(5, 1, 7, 'MDE001', '6e6484c552ab654fe83a243bdf159a35bcd81dcb', 'Planta baja', 1, '2022-02-03 08:05:33'),
(6, 1, 8, 'ESTA001', 'e8040662711125241cdab6e1da4f6b24587dd8a5', 'Planta baja', 1, '2022-02-03 08:07:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_oficina` (`id_oficina`),
  ADD KEY `id_equipo` (`id_equipo`);

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
  ADD PRIMARY KEY (`id_oficina`);

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
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkoficina_idx` (`id_oficina`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id_oficina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asignacion`
--
ALTER TABLE `t_asignacion`
  ADD CONSTRAINT `t_asignacion_ibfk_1` FOREIGN KEY (`id_oficina`) REFERENCES `t_oficina` (`id_oficina`),
  ADD CONSTRAINT `t_asignacion_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
