-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2025 a las 15:48:07
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
-- Base de datos: `db_5tocuatri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ba`
--

CREATE TABLE `ba` (
  `numero_c` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo_c` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ba`
--

INSERT INTO `ba` (`numero_c`, `name`, `email`, `tipo_c`, `pass`) VALUES
('120706051420', 'Marco', 'giovannivalentine68@gmail.com', 'Debito', '295de6'),
('161079442953', 'giooooo', 'gioo1718@gmail.com', 'Ahorro', '64a22e'),
('212602251514', 'Gladis', 'giovannidevjr@gmail.com', 'Debito', '6be7da'),
('384969174999', 'Marco', '23040140@alumno.utc.edu.mx', 'Debito', '75673c'),
('391558353462', 'Hernan Giovanni Davila Duque', 'gioo1718@gmail.com', 'Debito', '7a0ef0'),
('403522675260', 'marco el toys', 'giovannivalentine68@gmail.com', 'Debito', '9fe255'),
('404758792302', 'gio', 'giovannidevjr@gmail.com', 'Ahorro', '18a6c8'),
('511478534436', 'marco el toys', 'gioo1718@gmail.com', 'Debito', '8f096a'),
('662956703222', 'Gladis Lizeht', 'giovannidevjr@gmail.com', 'Debito', '7b3a58'),
('919452299861', 'Lizeth', 'giovannidevjr@gmail.com', 'Debito', '57b1e7'),
('959072284318', 'Marco', 'cherry@gmail.com', 'Debito', 'ca4fa9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ba`
--
ALTER TABLE `ba`
  ADD PRIMARY KEY (`numero_c`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
