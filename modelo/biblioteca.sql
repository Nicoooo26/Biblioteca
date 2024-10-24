-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-11-2023 a las 00:21:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

-- Borramos la base de datos si existe
DROP DATABASE IF EXISTS `biblioteca`;
-- Creamos la base de datos
CREATE DATABASE `biblioteca`;
-- Seleccionamos la base de datos
USE `biblioteca`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `editorial` varchar(255) DEFAULT NULL,
  `autor` varchar(255) NOT NULL,
  `prestado` tinyint(1) NOT NULL DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `ISBN`, `titulo`, `editorial`, `autor`, `prestado`, `imagen`, `borrado`) VALUES
(1, '978-0061120084', 'To Kill a Mockingbird', 'HarperCollins', 'Harper Lee', 1, 'img/toKillaMochingbird.png', 0),
(3, '978-0142407332', 'The Catcher in the Rye', 'Little, Brown and Company', 'J.D. Salinger', 1, 'img/theCatcherinTheRye.png', 0),
(4, '978-1400032716', 'The Great Gatsby', 'Scribner', 'F. Scott Fitzgerald', 0, 'img/theGreatGatsby.png', 0),
(5, '978-0141439969', 'Pride and Prejudice', 'Penguin Classics', 'Jane Austen', 0, 'img/PrideAndPrejudice.png', 0),
(6, '978-0446310789', 'To Kill a Mockingbird', 'Warner Books', 'Harper Lee', 0, 'img/toKillaMochingbird.png', 0),
(7, '978-0452284234', 'Brave New World', 'Harper Perennial Modern Classics', 'Aldous Huxley', 0, NULL, 0),
(8, '978-0679783273', 'One Hundred Years of Solitude', 'Harper Perennial', 'Gabriel García Márquez', 0, NULL, 0),
(9, '978-0743273565', 'The Odyssey', 'Scribner', 'Homer', 0, NULL, 0),
(10, '978-1982130534', 'EL BARCO ANDANTE', 'Carwwee', 'Jaime Hernandex', 0, NULL, 0),
(11, '978-1982131111', 'La casa Blaca', 'Donostiarra', 'Carmen', 0, NULL, 0),
(12, '978-1235675431', 'alfredito el patito', 'Vanterica', 'Gonzalo Ramos', 0, NULL, 0),
(33, '978-0061120000', 'La nutria', 'Donostiara', 'Fede', 0, NULL, 0),
(34, '978-0061120012', 'Monje', 'Vale', 'Jorge', 0, NULL, 0),
(35, '978-0061120011', 'Jenas', 'Burme', 'Carolina', 0, NULL, 0),
(37, '978-1982131452', 'La casa Blanca', 'Donostiarra', 'Carmen', 0, NULL, 0),
(38, '978-4335675431', 'alfredito el patito', 'Vanterica', 'Gonzalo Ramos', 0, NULL, 1),
(39, '978-5461120020', 'El último suspiro', 'Aire Editorial', 'Ana Aire', 0, NULL, 0),
(40, '978-3361120030', 'Cuentos de la Luna', 'Nocturna Ediciones', 'Luis Luna', 0, NULL, 0),
(41, '978-2361120040', 'La Rosa Prohibida', 'Amor Libros', 'Isabel Amor', 0, NULL, 0),
(42, '978-4361120050', 'El Misterio del Silencio', 'Editorial Sereno', 'Samuel Silencio', 0, NULL, 0),
(43, '978-0061120060', 'El Juego de las Sombras', 'Sombras Ediciones', 'Laura Sombra', 0, NULL, 0),
(44, '978-0061120070', 'Aventuras en el Bosque', 'Naturaleza Libros', 'Nacho Natural', 0, NULL, 0),
(45, '978-0061120080', 'Secretos del Pasado', 'Historia Publicaciones', 'Elena Historia', 0, NULL, 0),
(46, '978-0061120090', 'El Poder de las Estrellas', 'Estelar Libros', 'Esteban Estelar', 0, NULL, 0),
(47, '978-0061120100', 'La Ruta del Tesoro', 'Aventuras Editoriales', 'Tomás Tesorero', 0, NULL, 0),
(48, '978-0061120110', 'Enigmas del Cosmos', 'Cosmos Ediciones', 'Carla Cósmica', 0, NULL, 0),
(49, '978-0061120120', 'La Flor del Desierto', 'Desierto Flores', 'Fabián Flor', 0, NULL, 0),
(50, '978-0061120130', 'Cuentos del Mar Azul', 'Marino Libros', 'María Marinera', 0, NULL, 0),
(51, '978-0061120140', 'El Laberinto de los Sueños', 'Sueños Laberinto', 'Santiago Soñador', 0, NULL, 0),
(52, '978-0061120150', 'El Secreto de la Montaña', 'Montaña Misteriosa', 'Marta Montañera', 0, NULL, 0),
(53, '978-0061120160', 'El Misterio de la Noche', 'Nocturna Ediciones', 'Nicolás Nocturno', 0, NULL, 0),
(54, '978-0061120170', 'Cuentos del Viento', 'Viento Libros', 'Viviana Ventosa', 0, NULL, 1),
(55, '978-0061120180', 'Aventuras en el Espacio', 'Espacio Ediciones', 'Eva Espacial', 0, NULL, 0),
(58, '978-0061120210', 'Cuentos del Océano Profundo', 'Océano Profundo Libros', 'Oscar Oceánico', 0, NULL, 0),
(59, '978-0061120220', 'El Secreto del Castillo Encantado', 'Castillo Mágico Ediciones', 'Carlos Castillo', 0, NULL, 0),
(60, '978-0061120230', 'Aventuras en la Ciudad', 'Ciudad Ediciones', 'Carmen Ciudadana', 0, NULL, 0),
(61, '978-0061120240', 'El Bosque Encantado', 'Libros Mágicos', 'Mónica Mágica', 0, NULL, 1),
(64, '978-0142407311', 'The alchemist', 'HarperOne', 'Paul Coelho', 0, 'img/theAlchemist.png', 0),
(65, '978-1419832716', 'Cars', 'Carsesie', 'Dani Romero', 0, 'img/cars.png', 0),
(66, '978-1400032712', 'Ceinicienta', 'Danoss', 'Elvis Catro', 0, 'img/cenicienta.png', 0),
(67, '978-0061111084', 'Odisea', 'Casteja', 'Coke', 0, 'img/odisea.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_libro` int(255) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `borrado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_usuario`, `id_libro`, `fecha_inicio`, `fecha_fin`, `borrado`) VALUES
(43, 4, 2, '2023-11-10', '2023-12-10', 0),
(45, 8, 65, '2023-11-10', '2023-12-10', 1),
(47, 8, 5, '2023-11-10', '2023-12-10', 1),
(62, 2, 3, '2023-11-14', '2023-12-14', 1),
(63, 4, 1, '2023-11-14', '2023-12-14', 1),
(64, 4, 4, '2023-11-16', '2023-12-16', 1),
(65, 4, 6, '2023-11-16', '2023-12-16', 1),
(70, 4, 4, '2023-11-18', '2023-12-18', 1),
(71, 4, 10, '2023-11-18', '2023-12-18', 1),
(72, 4, 1, '2023-11-18', '2023-12-18', 1),
(73, 4, 66, '2023-11-18', '2023-12-18', 1),
(74, 4, 64, '2023-11-18', '2023-12-18', 1),
(75, 4, 6, '2023-11-18', '2023-12-18', 1),
(76, 4, 58, '2023-11-18', '2023-12-18', 1),
(77, 4, 4, '2023-11-18', '2023-12-18', 1),
(78, 4, 53, '2023-11-18', '2023-12-18', 1),
(79, 4, 1, '2023-11-18', '2023-12-18', 1),
(80, 4, 6, '2023-11-18', '2023-12-18', 1),
(81, 4, 9, '2023-11-18', '2023-12-18', 1),
(82, 4, 4, '2023-11-18', '2023-12-18', 1),
(83, 2, 1, '2023-11-23', '2023-12-23', 0),
(84, 4, 3, '2023-11-23', '2023-12-23', 0);

--
-- Disparadores `prestamos`
--
DELIMITER $$
CREATE TRIGGER `before_insert_prestamos` BEFORE INSERT ON `prestamos` FOR EACH ROW BEGIN
  SET NEW.fecha_fin = DATE_ADD(NEW.fecha_inicio, INTERVAL 1 MONTH);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL DEFAULT 'estandar',
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `usuario`, `contrasena`, `email`, `pais`, `tipo`, `id`) VALUES
('joan', 'inga', 'joan', '$2y$10$X2pdQeKbEuDJ2jg4Tr0Rr.D2atpRPdD7LTVYZUkBqUEbI3ztWL.uC', 'joan@gmail.com', 'ecuador', 'estandar', 2),
('nicolas', 'guanuna', 'admin', '$2y$10$MDQQNFub0D3XtFJarCLNA.6cicRdOPm8KB4uU6bI60g2LmdC/VkHu', 'nicogpfubol@gmail.com', 'España', 'admin', 4),
('antonio', 'galex', 'antonio12', '$2y$10$Fnz2.OONaaW3wJE9yoSJ0ehcIoVDrEB2bHW1/FYQDk67WPX8vhLxK', 'anotnio@gmail.com', 'alemania', 'estandar', 5),
('ramon', 'ramon', 'ramon', '$2y$10$vrjy8qlYbRP9gZtwxSUThuOdMOhnfWaxb77WAW0Yap7oonlH.FuQS', 'ramon@gmail.com', 'finlandia', 'estandar', 6),
('Antonio', 'Rodrgieuz', 'anotiiii', '$2y$10$8Q23RxDjmwL/efILtPfHnuaxAlJVcGOHMjFviFhunTmQq0HpZ1GqG', 'antoni@gmail.com', '', 'estandar', 7),
('Natalia', 'Aguirre', 'nacty', '$2y$10$hQ8qts5/GEP0de2FNCcCEO/ieX/MQOiZ4U./vXH5wpb3hEDNNvLVq', 'nataliaaaaa7777@gmail.com', 'Alemania', 'estandar', 8),
('fesf', 'fsef', 'fsefse', '$2y$10$6re6OzFOm69cwKvCwKo/k.mSaJQLCDayBYW8C4wYfMSBPDUsGEx8i', 'fsefs@gmail.com', 'fesf', 'estandar', 9),
('Fede', 'Valverde', 'fede', '$2y$10$YopeoWabrWwqSkVF3yiSP.FNNgXidJ4c5yfd2i3NMaiqe6uQEv0My', 'fede@gmail.com', 'uruguay', 'estandar', 10),
('Antonio', 'Orozco', 'Orozco', '$2y$10$MixeYLTUzlrpxLu8vqE.iOwQ7HQGbjaciT71dc22iKqz7TNzsggzi', 'orozco@gmail.com', 'Francia', 'estandar', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userUnique` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
