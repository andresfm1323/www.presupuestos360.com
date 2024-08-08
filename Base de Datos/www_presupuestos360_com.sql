-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2024 a las 21:32:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `www.presupuestos360.com`
--
CREATE DATABASE IF NOT EXISTS `www.presupuestos360.com` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `www.presupuestos360.com`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuarios` int(255) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Cedula` int(20) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Cargo` varchar(30) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contraseña` varchar(70) NOT NULL,
  `Fecha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuarios`, `Nombre`, `Apellidos`, `Cedula`, `Correo`, `Cargo`, `Usuario`, `Contraseña`, `Fecha`) VALUES
(1, 'Andrés Felipe', 'Marín Martínez', 1094926338, 'andresf1323@gmail.com', 'Ingeniero Civil - Especializad', 'andresf1323', '$2y$10$JVKqUt8C7xUNLHW1LzxcH.lIcatYL3wMyjSkJr2/FtFB0YiXmDmuS', '16/07/24'),
(2, 'Juan Pablo', 'Marín Martínez', 1094955413, 'juanmarinm.96@gmail.com', 'Arquitecto - Contratista', 'juanmarin96', '$2y$10$YEGMaPqCYrB2AHB5GTerquiUuCsEYPsyTPb91B.GPWDke0crItTo.', '17/07/24'),
(3, 'Luis', 'Marin', 1094926337, 'luis@hotmail.com', 'Arquitecto - en Provisionalida', 'luis123', '$2y$10$JRLt9mSKA93AUoM2X0NiYeom44lge.SL5/6ltaj.okgSwXwdUeO8G', '27/07/24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuarios` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
