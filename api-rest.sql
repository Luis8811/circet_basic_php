-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-09-2024 a las 21:05:18
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api-rest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` text NOT NULL,
  `id_cliente` text NOT NULL,
  `llave_secreta` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `id_cliente`, `llave_secreta`, `created_at`, `updated_at`) VALUES
(1, 'Luis Manuel', 'Suárez González', 'calidadfreelance@gmail.com', 'a2ya10a1Dr1WY/GrB99.zssr.4n6ex0cy5MS3cBNe6G0MhHEKwgwYnzugb4K', 'o2yo12oPGJq.G72z9uF39Hw8bEYte3SGa6WkBslKwmgN2BDTpjq4rTmJUR26', '2019-12-13 23:34:37', '2019-12-13 23:34:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `instructor` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` float NOT NULL,
  `id_creador` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `instructor`, `imagen`, `precio`, `id_creador`, `created_at`, `updated_at`) VALUES
(1, 'Introducción a la economía', 'Curso básico de economía', 'Juan Ramón Rallo', 'curso.jpg', 235, 1, '2024-09-23 06:35:25', '2024-09-23 06:35:25'),
(5, 'Curso de Reiki', 'Curso básico de Reiki', 'Oyama Riu', 'meditar.jpg', 321, 1, '2024-09-23 06:48:45', '2024-09-23 06:48:45'),
(6, 'Inglés básico', 'Curso de 60 horas nivel B2', 'Linda Moore', 'speaking_english.jpg', 200, 1, '2024-09-23 07:00:57', '2024-09-23 07:00:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
