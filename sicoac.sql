-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2019 a las 13:08:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicoac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `detalles` text NOT NULL,
  `fecha_asistencia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `id_estudiante`, `id_materia`, `detalles`, `fecha_asistencia`) VALUES
(2, 2, 2, 'LlegÃ³ tarde ', '2019-10-21 10:25:51'),
(3, 2, 4, '', '2019-10-21 11:06:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_salones`
--

CREATE TABLE `horario_salones` (
  `id` int(11) NOT NULL,
  `id_salones` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `dia_semana` varchar(50) NOT NULL DEFAULT '',
  `hora_entrada` varchar(50) NOT NULL DEFAULT '',
  `hora_salida` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario_salones`
--

INSERT INTO `horario_salones` (`id`, `id_salones`, `materia`, `dia_semana`, `hora_entrada`, `hora_salida`) VALUES
(1, 2, 2, 'Lunes', '6:15am', '7:00am'),
(3, 2, 2, 'Lunes', '7:00am', '7:45am'),
(4, 1, 4, 'Martes', '1:00pm', '1:45pm'),
(5, 3, 2, 'Miercoles', '10:45am', '11:30am'),
(6, 3, 2, 'Miercoles', '11:30am', '12:15pm'),
(7, 2, 4, 'Jueves', '6:15am', '7:00am'),
(8, 2, 4, 'Lunes', '7:45am', '8:30am'),
(9, 1, 4, 'Martes', '1:45pm', '2:30pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `docente` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` text NOT NULL,
  `creditos` int(11) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `docente`, `nombre`, `descripcion`, `creditos`, `grupo`, `estado`) VALUES
(2, 3, 'InformÃ¡tica  1', 'Informatica bÃ¡sica', 4, 'Ingenieria de Sistemas', 1),
(4, 9, 'CÃ¡lculo Integral', 'Calculos matematicos', 4, 'Ingenieria de Sistemas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_materia`
--

CREATE TABLE `miembros_materia` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `miembros_materia`
--

INSERT INTO `miembros_materia` (`id`, `id_materia`, `id_estudiante`) VALUES
(4, 2, 8),
(5, 2, 10),
(6, 2, 11),
(7, 2, 2),
(8, 4, 2),
(9, 4, 8),
(10, 4, 10),
(11, 4, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_acceso`
--

CREATE TABLE `nivel_acceso` (
  `id` int(11) NOT NULL,
  `nivel` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_acceso`
--

INSERT INTO `nivel_acceso` (`id`, `nivel`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administrador'),
(4, 'Estudiante/Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Salon 001', 'Info'),
(2, 'Salon 002', 'Info'),
(3, ' Sala InformÃ¡tica 01', 'Aula de Sistemas'),
(4, 'Sala InformÃ¡tica 02', 'Aula de Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(255) NOT NULL,
  `pnombre` varchar(50) NOT NULL,
  `snombre` varchar(50) NOT NULL,
  `papellido` varchar(50) NOT NULL,
  `sapellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nivel_acceso` int(11) DEFAULT '1',
  `genero` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `pnombre`, `snombre`, `papellido`, `sapellido`, `correo`, `direccion`, `telefono`, `usuario`, `clave`, `foto`, `nivel_acceso`, `genero`, `estado`) VALUES
(1, 'Ronaldo', 'Aldair', 'Sinning', 'Montero', 'ronalsimon_77@hotmail.es', 'Las Mercedez', '3045349268', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 3, 1, 1),
(2, 'Fabian', 'Marcelo', 'Coley', 'Aguas', 'novedad7@gmail.com', 'Las Mercedes', '30135563345', '1102872306', 'e00230fd32b03a4d99aae2894afa6372', '', 1, 1, 1),
(3, 'Ingred', 'MarÃ­a', 'Montero', 'Salgado', 'ingred77@hotmail.com', 'Las Mercedes', '3013556334', '32750861', 'e00230fd32b03a4d99aae2894afa6372', '', 2, 2, 1),
(8, 'Yosmiris', 'MarÃ­a', 'BeltrÃ¡n', 'Salgado', 'dasdas@gmail.com', 'Las Mercedes', '3013556334', '452122111', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 2, 1),
(9, 'Osnaider', 'Enrrique', 'Gonzales ', 'Narvaes', 'ingred77@hotmail.com', 'Crra 32 # 11 - 12 ', '3013556334', '5411223231', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 1, 1),
(10, 'AndrÃ©s', 'Fernando', 'Viera', 'Narvaes', 'novedad7@gmail.com', 'Crra 24 # 10 - 20 ', '4544545414', '123123131231', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, 1),
(11, 'Jenny', 'Isabel', 'Sinning', 'Montero', 'yennysinning@gmail.com', 'Las Mercedes', '3013556334', '2312312312312', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_asistencia_estudiante` (`id_estudiante`),
  ADD KEY `FK_asistencia_materia` (`id_materia`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_salones`
--
ALTER TABLE `horario_salones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_horario_salones_salones` (`id_salones`),
  ADD KEY `FK_horario_salones_materia` (`materia`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_materia_estado` (`estado`),
  ADD KEY `FK_materia_usuarios` (`docente`);

--
-- Indices de la tabla `miembros_materia`
--
ALTER TABLE `miembros_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_materia_horario_materia` (`id_materia`),
  ADD KEY `FK_materia_horario_horario_2` (`id_estudiante`);

--
-- Indices de la tabla `nivel_acceso`
--
ALTER TABLE `nivel_acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_usuarios_nivel_acceso` (`nivel_acceso`),
  ADD KEY `FK_usuarios_estado` (`estado`),
  ADD KEY `FK_usuarios_genero` (`genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario_salones`
--
ALTER TABLE `horario_salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `miembros_materia`
--
ALTER TABLE `miembros_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nivel_acceso`
--
ALTER TABLE `nivel_acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_asistencia_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `FK_asistencia_materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`);

--
-- Filtros para la tabla `horario_salones`
--
ALTER TABLE `horario_salones`
  ADD CONSTRAINT `FK_horario_salones_materia` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_horario_salones_salones` FOREIGN KEY (`id_salones`) REFERENCES `salones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `FK_materia_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_materia_usuarios` FOREIGN KEY (`docente`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `miembros_materia`
--
ALTER TABLE `miembros_materia`
  ADD CONSTRAINT `FK_materia_horario_horario_2` FOREIGN KEY (`id_estudiante`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_materia_horario_materia` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuarios_genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuarios_nivel_acceso` FOREIGN KEY (`nivel_acceso`) REFERENCES `nivel_acceso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
