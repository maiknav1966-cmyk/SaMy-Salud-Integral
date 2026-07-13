-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2026 a las 22:04:58
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
-- Base de datos: `hospital_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `edad`, `sexo`, `telefono`, `direccion`, `diagnostico`, `fecha_ingreso`) VALUES
(1, 'Rosa Maria', 'Martinez Roa', 19, 'Femenino', '5545451232', 'Prol Juan Aldama', 'Gripe', '2026-07-05'),
(2, 'Victor Mario', 'Nava Sanchez', 21, 'Masculino', '5555555555', 'Francisco Sarabia', 'tos', '2026-07-07'),
(3, 'Jarumi', 'Aguilar Franco', 19, 'Femenino', '5514563259', 'Calle Hidalgo', 'Gripe', '2026-07-05'),
(4, 'Emmanuel', 'Alcantara Romero', 19, 'Masculino', '5512369874', 'Av Juarez', 'Tos', '2026-06-07'),
(5, 'Orlando', 'Alvarado Rodriguez', 19, 'Masculino', '5545451234', 'Calle San Juan', 'Fiebre', '2026-05-09'),
(6, 'Carlos Roberto', 'Avilés López', 23, 'Masculino', '5545451235', 'Calle Morelos', 'Dolor de cabeza', '2026-07-05'),
(7, 'Angel Ricardo', 'Bautista Machuca', 23, 'Masculino', '5545451236', 'Av Universidad', 'Faringitis', '2026-07-01'),
(8, 'Diego', 'Bautista Machuca', 22, 'Masculino', '5545451237', 'Av Universidad', 'Resfriado', '2026-06-29'),
(9, 'Esteban Emilio', 'Cardenas Arguelles', 19, 'Masculino', '5545451238', 'Calle Independencia', 'Dolor de garganta', '2026-06-12'),
(10, 'Isacc Moyses', 'Chavez Ramírez', 19, 'Masculino', '5545451239', 'Calle Reforma', 'Alergia', '2026-06-26'),
(11, 'Ricardo Aaron', 'Cordoba Hernández', 19, 'Masculino', '5545451240', 'Av Juarez', 'Dolor de espalda', '2026-07-03'),
(12, 'Emilio', 'Corrales Martínez', 19, 'Masculino', '5545451241', 'Calle Oaxaca', 'Gastroenteritis', '2026-07-01'),
(13, 'Erika', 'Cruz Perez', 19, 'Femenino', '5545451242', 'Calle Veracruz', 'Infección', '2026-03-06'),
(14, 'Miguel Esteban', 'Galicia Casarroja', 19, 'Masculino', '5545451243', 'Calle Puebla', 'Fiebre', '2026-07-01'),
(15, 'Yarely Jimena', 'Guzman Ibarra', 19, 'Femenino', '5545451244', 'Calle Guerrero', 'Tos', '2026-07-02'),
(16, 'Jose Alfredo', 'Guzman Mejia', 20, 'Masculino', '5545451245', 'Calle Hidalgo', 'Gripe', '2026-07-03'),
(17, 'Ana Paola', 'Jimenez Mejía', 19, 'Femenino', '5545451246', 'Av Juarez', 'Faringitis', '2026-06-29'),
(18, 'Ezequiel', 'Lima Ramírez', 21, 'Masculino', '5545451247', 'Calle Morelos', 'Dolor de cabeza', '2026-06-26'),
(19, 'Grecia Valeria', 'Lopez Lima', 20, 'Femenino', '5545451248', 'Calle 5 de Mayo', 'Resfriado', '2026-06-29'),
(20, 'Christian', 'López Rivero', 19, 'Masculino', '5545451249', 'Calle Independencia', 'Dolor de garganta', '2026-07-04'),
(21, 'Fabiola Abril', 'Morales Barragán', 19, 'Femenino', '5545451251', 'Calle Guerrero', 'Infección', '2026-06-30'),
(22, 'Luz Areli', 'Padilla Tufiño', 20, 'Femenino', '5545451253', 'Calle Oaxaca', 'Fiebre', '2026-06-24'),
(23, 'Jaqueline', 'Peralta Cárdenas', 19, 'Femenino', '5545451254', 'Calle Veracruz', 'Gripe', '2026-07-24'),
(24, 'Julissa Magnolia', 'Perez Amaro', 19, 'Femenino', '5545451255', 'Av. Juárez', 'Dolor de cabeza', '2026-07-04'),
(25, 'María Cecilia', 'Ramírez Díaz', 19, 'Femenino', '5545451256', 'Calle Morelos', 'Resfriado', '2026-07-02'),
(26, 'Karen Ariadna', 'Rueda Estrada', 22, 'Femenino', '5545451257', 'Calle Independencia', 'Faringitis', '2026-07-01'),
(27, 'Ken Mitsuo', 'Salgado Rivera', 23, 'Masculino', '5545451258', 'Av. Insurgentes', 'Dolor de garganta', '2026-06-29'),
(28, 'Yordan', 'Sandoval Muñoz', 19, 'Masculino', '5545451259', 'Calle Reforma', 'Alergia', '2026-06-30'),
(29, 'Jenifer', 'Soriano Pascual', 19, 'Femenino', '5545451260', 'Calle Puebla', 'Tos', '2026-07-03'),
(30, 'Angel', 'Torres Velázquez', 19, 'Masculino', '5545451261', 'Calle Guerrero', 'Gripe', '2026-07-03'),
(31, 'Dana Paola', 'Valencia Rios', 19, 'Femenino', '5545451262', 'Av. Juárez', 'Fiebre', '2026-07-03'),
(32, 'Carlos Iván', 'Villa Vazquez', 19, 'Masculino', '5545451263', 'Calle Hidalgo', 'Dolor de cabeza', '2026-07-04'),
(33, 'Miguel Ángel', 'Villanueva De La Rosa', 19, 'Masculino', '5545451264', 'Calle Oaxaca', 'Resfriado', '2026-07-04'),
(34, 'Jose Rodrigo', 'Villarreal Ramírez', 20, 'Masculino', '5545451265', 'Calle Veracruz', 'Faringitis', '2026-06-26'),
(35, 'Jesús', 'Yañez Bautista', 22, 'Masculino', '5545451266', 'Av. Insurgentes', 'Dolor de garganta', '2026-07-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
