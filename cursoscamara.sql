-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2022 a las 09:59:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursoscamara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duration` int(4) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_telephone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `web_link` varchar(255) DEFAULT NULL,
  `pdf_link` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `start_date`, `end_date`, `duration`, `place`, `schedule`, `contact_email`, `contact_telephone`, `description`, `web_link`, `pdf_link`, `image_link`, `status`) VALUES
(1, 'CURSO DE VIGILANTE DE SEGURIDAD', '2021-12-01', '2021-12-30', 120, 'Cámara de Comercio de Toledo', 'De lunes a viernes, de 9:00 a 15:00 horas', 'esperanza@camaratoledo.com', '925285428', 'El objetivo de este curso es preparar vigilantes de seguridad para la obtención de la certificación acreditativa correspondiente, expedida en un centro de formación de personal de seguridad privada homologado por el Ministerio del Interior.', 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/vigilante-de-seguridad-en-toledo/', 'https://camaratoledo.com/wp-content/uploads/2021/11/vigilante-seguridad-toledo.pdf', NULL, 'finalizado'),
(2, 'CURSO DE CAMARERA/O DE PISOS', NULL, NULL, 215, 'Cámara de Comercio de Toledo', 'De lunes a viernes, de 8:00 a 14:30 horas', NULL, '925822561', 'El objetivo de este curso es preparar vigilantes de seguridad para la obtención de la certificación acreditativa correspondiente, expedida en un centro de formación de personal de seguridad privada homologado por el Ministerio del Interior.', 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/curso-de-camarera-o-de-pisos-en-talavera/', 'https://camaratoledo.com/wp-content/uploads/2021/03/camarera-de-pisos-talavera-2021.pdf', NULL, 'proximamente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
