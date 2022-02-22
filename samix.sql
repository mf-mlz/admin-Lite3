-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2022 a las 21:32:51
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `samix`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN` (IN `CORREO` VARCHAR(100), IN `PASS` VARCHAR(300))  BEGIN
IF EXISTS(SELECT id_usuario FROM usuario WHERE CORREO = correo_usuario AND PASS = password_usuario) 
THEN
SELECT "1"; -- EXISTE EL USUARIO
ELSE
SELECT "0"; -- NO EXISTE EL USUARIO
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN_USER` (IN `CORREO` VARCHAR(100))  SELECT
usuario.id_usuario,
usuario.nombre_usuario,
usuario.apellidoP_usuario,
usuario.apellidoM_usuario,
usuario.correo_usuario,
usuario.password_usuario,
usuario.id_rol,
usuario.estatus_usuario,
rol.nombre_rol
FROM
usuario 
INNER JOIN rol ON usuario.id_rol = rol.id_rol
WHERE correo_usuario = BINARY CORREO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VISTA_CLIENTE` ()  SELECT
*
FROM
Clientes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VISTA_USER` ()  SELECT
usuario.id_usuario,
usuario.nombre_usuario,
usuario.apellidoP_usuario,
usuario.apellidoM_usuario,
usuario.correo_usuario,
rol.nombre_rol,
usuario.estatus_usuario
FROM
usuario 
INNER JOIN rol ON usuario.id_rol = rol.id_rol$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id-cliente` int(11) NOT NULL,
  `nombre-cliente` varchar(120) NOT NULL,
  `apellidoP-cliente` varchar(120) NOT NULL,
  `apellidoM-cliente` varchar(120) NOT NULL,
  `correo-cliente` varchar(120) NOT NULL,
  `telefono-cliente` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id-cliente`, `nombre-cliente`, `apellidoP-cliente`, `apellidoM-cliente`, `correo-cliente`, `telefono-cliente`) VALUES
(1, 'Ana', 'Martinez', 'Labra', 'ana-client@samix.com', '7714334090');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'INVITADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellidoP_usuario` varchar(50) NOT NULL,
  `apellidoM_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(300) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estatus_usuario` enum('ACTIVO','INACTIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellidoP_usuario`, `apellidoM_usuario`, `correo_usuario`, `password_usuario`, `id_rol`, `estatus_usuario`) VALUES
(1, 'FERNANDA', 'MARTINEZ', 'LABRA', 'maryfer.martinez@samix.com', '$2y$12$/n.yB3ALdXhsCgQbU6BEJO4BWwMugRHkpkCDCtYgNy6CMHdCGQnC.', 1, 'ACTIVO'),
(2, 'EJEMPLO', 'CURSO', 'TEST', 'test@samix.com', '$2y$12$XlWyDTvBqdiRrh/kcn4OAOgqZKs8fFxDjYiyiUau1RB2Co.zn0veu', 1, 'INACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id-cliente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id-cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
