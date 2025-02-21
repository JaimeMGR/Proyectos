-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 11:58:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubdeportivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `codigo_socio` int(11) DEFAULT NULL,
  `codigo_servicio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `codigo_socio`, `codigo_servicio`, `fecha`, `hora`, `estado`) VALUES
(1, 1, 1, '2024-01-20', '10:00:00', 0),
(4, 1, 4, '2024-04-05', '12:00:00', 0),
(10, 4, 1, '2024-11-20', '17:00:00', 0),
(43, 8, 4, '2024-11-07', '18:00:00', 1),
(44, 8, 4, '2024-11-07', '18:00:00', 1),
(49, 4, 2, '2024-11-23', '17:00:00', 1),
(51, 4, 1, '2024-11-30', '17:00:00', 0),
(53, 4, 4, '2024-11-30', '10:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categorias` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id`, `nombre`, `categorias`, `foto`) VALUES
(1, 'Maxi Fernández', 'Boxeo - K1', 'maxi.png'),
(2, 'Borja Álvarez el Miura', 'Muay Thai - Boxeo', 'borja.png'),
(3, 'Juan Pedro Titos Lechuga', 'Judo', 'juampe.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--

CREATE TABLE `mensajes_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo`, `contenido`, `imagen`, `fecha_publicacion`) VALUES
(1, 'Nueva clase de Krav Maga', 'A partir de este mes ofrecemos clases de Krav Maga los sábados.', 'kravmaga.jpg', '2024-02-01'),
(2, 'Campeonato de muay thai', 'Prepárate para el campeonato anual de muay thai el próximo mes.', 'muaythai.jpg', '2024-03-15'),
(3, 'Promoción en clases de Boxeo', '¡Descuento especial en clases de boxeo durante este mes!', 'boxeo.jpg', '2024-04-10'),
(4, 'Combate benéfico en Granada 10', 'Se va a realizar un combate benéfico donde se donará todo lo recibido a clubes afectados por la Dana', 'combate.jpg', '2024-11-06'),
(22, 'El boxeador león se juega el título mundial', 'Amador Ribas, también conocido como \"Capitán Salami\" o también como \"Boxeador León\", se presentará este fin de semana en un combate por el título mundial de peso pesado situado en Londres el dóia 23 de Noviembre a las 11pm hora española', 's7FrXK7sIG5ZI9OBEWn8l7.webp', '2024-11-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `codigo_servicio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`codigo_servicio`, `descripcion`, `precio`, `duracion`, `imagen`) VALUES
(1, 'Boxeo', 18, 100, '../../imagenes/clasebox.jpg'),
(2, 'Muay Thai', 20, 90, '../../imagenes/clasemuaythai.jpg'),
(3, 'K1', 19, 60, '../../imagenes/clasek1.jpg'),
(4, 'Judo', 17, 60, '../../imagenes/clasejudo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id_socio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id_socio`, `nombre`, `edad`, `contrasena`, `usuario`, `telefono`, `foto`) VALUES
(1, 'Juan Pérez', 28, 'password123', 'juanperez', '123456789', 'siemprenoya.jpeg'),
(3, 'Carlos López', 24, 'mypassword', 'Estik', '555555555', 'stik.jpeg'),
(4, 'Jaime Molina Granados', 21, '$2y$10$ePhyUebSnXYXJM660QB5D.9s7Sd2668Y/VN8BZ8k.3fqATNnvTOF6', 'JaimeMGR', '668533704', 'WIN_20241105_09_19_41_Pro.jpg'),
(7, 'Jose Pablo Gómez Gómez', 21, '$2y$10$jMxYt6I2emiKMtqDa/bwG.hQH7WCYraQPYiGvpuPMA7AE4EOv32VW', 'Josepa', '856452478', 'muere-eduardo-gomez-actor-de-aqui-no-hay-quien-viva-o-la-que-se-avecina.jpg'),
(8, 'Rubén García Lorenzo', 23, '$2y$10$pruX8ojwa4U2cfJrWxs3P.LDd8Lkg0bSN115Cli5hQHI2c5m6lN7y', 'RubencioTolete', '636988355', '1700768015260.jpg'),
(9, 'Perindola', 45, 'password1', 'LaPerindola', '+34949487324', 'mqdefault.jpg'),
(10, 'Pedro Sánchez', 30, 'password2', 'PerroSanche', '612345678', 'perrosanchez.jpeg'),
(29, 'Wolfi', 22, '$2y$10$jgNme6GG6K5Cm6CRQsyMeOPGLrvUR.fgbkTNY2cIJzTMV7eVaJr6.', 'Wolfiwapo', '+34856473285', 'images.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

CREATE TABLE `testimonio` (
  `id_testimonio` int(11) NOT NULL,
  `autor` int(11) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id_testimonio`, `autor`, `contenido`, `fecha`) VALUES
(1, 4, 'Las clases de boxeo son intensas y muy efectivas.', '2024-01-15'),
(3, 3, 'El Judo es exactamente lo que estaba buscando.', '2024-03-05'),
(24, 1, 'Excelente servicio, muy satisfecho con el trato recibido.', '2024-01-15'),
(26, 1, 'Excelente servicio, muy satisfecho con el trato recibido.', '2024-01-15'),
(27, 3, 'La experiencia fue buena, aunque podría mejorar.', '2024-01-17'),
(28, 4, 'Un servicio excepcional, repetiré sin duda.', '2024-01-18'),
(30, 1, 'Excelente servicio, muy satisfecho con el trato recibido.', '2024-01-15'),
(31, 3, 'La experiencia fue buena, aunque podría mejorar.', '2024-01-17'),
(32, 4, 'Un servicio excepcional, repetiré sin duda.', '2024-01-18'),
(34, 1, 'Excelente servicio, muy satisfecho con el trato recibido.', '2024-01-15'),
(35, 3, 'La experiencia fue buena, aunque podría mejorar.', '2024-01-17'),
(36, 7, 'La calidad del servicio es inmejorable.', '2024-01-21'),
(38, 1, 'Excelente servicio, muy satisfecho con el trato recibido.', '2024-01-15'),
(39, 3, 'La experiencia fue buena, aunque podría mejorar.', '2024-01-17'),
(40, 7, 'La calidad del servicio es inmejorable.', '2024-01-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `codigo_socio` (`codigo_socio`),
  ADD KEY `codigo_servicio` (`codigo_servicio`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`codigo_servicio`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id_socio`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  ADD PRIMARY KEY (`id_testimonio`),
  ADD KEY `autor` (`autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `codigo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`codigo_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`codigo_servicio`) REFERENCES `servicio` (`codigo_servicio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `testimonio`
--
ALTER TABLE `testimonio`
  ADD CONSTRAINT `testimonio_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
