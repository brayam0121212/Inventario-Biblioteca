-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2020 a las 06:20:10
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: inventario_biblioteca
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `codi_libro` int(11) NOT NULL,
  `titulo_libro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `autor_libro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publi` date DEFAULT NULL,
  `resena_libro` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codi_libro`, `titulo_libro`, `autor_libro`, `fecha_publi`, `resena_libro`) VALUES
(5, 'Tarzán', 'ashdashdiuas', '1998-05-02', 'ksdhashdoaigsdouyasg'),
(8, 'Odisea', 'Homero', '1789-02-15', 'sdaidaidbaybaudybudhd'),
(9, 'Alicia en el país de las maravillas', 'Juanansasoisda', '1798-04-12', 'ajskajsjdnkjasndlksnakdjnslakd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `codi_prestamo` int(11) NOT NULL,
  `libro_codi` int(11) NOT NULL,
  `id_encargado` int(11) NOT NULL,
  `nombre_encargado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_pres` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`codi_prestamo`, `libro_codi`, `id_encargado`, `nombre_encargado`, `fecha_pres`) VALUES
(13, 5, 1004074887, 'Johan Smith', '2020-10-22'),
(14, 8, 1007250610, 'Sol Ángel', '2020-10-22'),
(17, 9, 1008523455, 'Salomé', '2020-10-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `codi_sesion` int(11) NOT NULL,
  `usuario_sesion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_sesion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`codi_sesion`, `usuario_sesion`, `contrasena_sesion`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usua_prestamo`
--

CREATE TABLE `usua_prestamo` (
  `id_usua` int(11) NOT NULL,
  `nom_usua` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usua` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usua_prestamo`
--

INSERT INTO `usua_prestamo` (`id_usua`, `nom_usua`, `apellido_usua`) VALUES
(1004074887, 'Johan Smith', 'Torrez Real'),
(1007250610, 'Sol Ángel', 'Torrez Real'),
(1008523455, 'Salomé', 'Cespedes Real');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codi_libro`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`codi_prestamo`),
  ADD KEY `libro_codi` (`libro_codi`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`codi_sesion`);

--
-- Indices de la tabla `usua_prestamo`
--
ALTER TABLE `usua_prestamo`
  ADD PRIMARY KEY (`id_usua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `codi_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `codi_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `codi_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`libro_codi`) REFERENCES `libro` (`codi_libro`),
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`id_encargado`) REFERENCES `usua_prestamo` (`id_usua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
