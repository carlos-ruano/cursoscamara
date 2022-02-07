-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 08:00:02
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
  `contact_email` varchar(255) DEFAULT 'camaratoledo@camaratoledo.com',
  `contact_telephone` varchar(255) DEFAULT '925822561',
  `description` text DEFAULT NULL,
  `web_link` varchar(255) DEFAULT 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/',
  `pdf_link` varchar(255) DEFAULT '	https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/	',
  `image_link` varchar(255) NOT NULL DEFAULT 'default_img.jpg',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `start_date`, `end_date`, `duration`, `place`, `schedule`, `contact_email`, `contact_telephone`, `description`, `web_link`, `pdf_link`, `image_link`, `status`) VALUES
(1, 'CURSO DE VIGILANTE DE SEGURIDAD', '2021-12-01', '2021-12-30', NULL, 'Cámara de Comercio de Toledo', 'De lunes a viernes, de 9:00 a 15:00 horas', '', '', 'El objetivo de este curso es preparar vigilantes de seguridad para la obtención de la certificación acreditativa correspondiente, expedida en un centro de formación de personal de seguridad privada homologado por el Ministerio del Interior.', 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/vigilante-de-seguridad-en-toledo/', 'https://camaratoledo.com/wp-content/uploads/2021/11/vigilante-seguridad-toledo.pdf', 'vigilante-seguridad.jpg', 'disponible'),
(2, 'CURSO DE CAMARERA/O DE PISOS', NULL, NULL, 215, 'Cámara de Comercio de Toledo', 'De lunes a viernes, de 8:00 a 14:30 horas', NULL, '925822561', 'El objetivo de este curso es preparar vigilantes de seguridad para la obtención de la certificación acreditativa correspondiente, expedida en un centro de formación de personal de seguridad privada homologado por el Ministerio del Interior.', 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/curso-de-camarera-o-de-pisos-en-talavera/', 'https://camaratoledo.com/wp-content/uploads/2021/03/camarera-de-pisos-talavera-2021.pdf', 'auxiliar-camarero.jpg', 'disponible'),
(3, 'CURSO DE OPERACIONES BÁSICAS CON FIBRA ÓPTICA E INSTALACIÓN DE PLACAS SOLARES ', NULL, NULL, 215, 'Cámara de Comercio, Plaza del Pan, 11. Talavera de la Reina.', 'De lunes a viernes, de 9 a 14 horas', NULL, '925822561', 'A jóvenes mayores de 16 y menores de 29 años beneficiarios del Sistema de Garantía Juvenil interesados en el sector de las placas solares.', 'https://camaratoledo.com/programa-integral-de-cualificacion-y-empleo-pice/cursos-de-formacion-pice/operaciones-basicas-con-fibra-optica-e-instalacion-de-placas-solares/', NULL, 'fibra-optica.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `garantia` date DEFAULT NULL,
  `pice` date DEFAULT NULL,
  `orientation` date DEFAULT NULL,
  `observations` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `dni`, `telephone`, `garantia`, `pice`, `orientation`, `observations`) VALUES
(1, 'Carlos', 'Dominguez', '11111111N', '664106030', '2022-02-05', '2022-02-05', '2022-02-06', 'Todo bien'),
(2, 'holasdff', 'asss', '11111111N', 'a', '2022-02-05', '2022-02-05', '2022-02-06', 'asa'),
(5, 'carlitos', 'sadd', 'wewew', 'wewewe', '2022-02-10', '2022-02-23', '2022-02-26', 'wewewew'),
(6, 'ads', 'sad', '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(7, 'wdeew', 'weddew', '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(8, 'dadasd', 'sadasda', '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(9, 'adsad', 'asdsd', '', '', '0000-00-00', '0000-00-00', '0000-00-00', ''),
(10, 'hola', 'holis', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students_courses`
--

CREATE TABLE `students_courses` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `students_courses`
--

INSERT INTO `students_courses` (`student_id`, `course_id`) VALUES
(1, 1),
(2, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$mRJUvsDMIeb159a3a9FkNeHC7NXusLOwLvXHTrlgOwb7qfrRjERQG', 'admin'),
(4, 'adminis', 'adminis@gmail.com', '$2y$10$pXAyIIvKy/P.LBMKamOjDuwIYnveIYDKHVlDQMO7iUG1R8MDI/hBO', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `student_courses_course_fk` (`course_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `student_courses_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `student_courses_student_fk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
