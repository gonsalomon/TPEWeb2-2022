-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2022 a las 23:05:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_mueble`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueble`
--

CREATE TABLE `mueble` (
  `id_mueble` int(11) NOT NULL,
  `mueble` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mueble`
--

INSERT INTO `mueble` (`id_mueble`, `mueble`, `descripcion`, `precio`, `id_categoria`) VALUES
(1, 'Mesa de algarrobo', 'Mesa para 6 sillas, con opción de ampliación a 8 sillas', 24999, 6),
(2, 'Silla algarrobo-recto', 'Silla de algarrobo con respaldo recto.', 6999, 6),
(3, 'Silla algarrobo-curvo', 'Silla de algarrobo con una curva en el respaldo.', 9999, 6),
(4, 'Bajomesadas de 3 cuerpos', 'Bajomesadas con 3 espacios, con libertad para asignar el uso del espacio', 37999, 3),
(5, 'Alacena', 'Alacena de 1,80m con 3 secciones.', 33999, 3),
(6, 'Cama de 1 plaza', 'Cama de 1,80m x 80cm, para colchón de 1 plaza.', 12999, 4),
(7, 'Cama queen-size', 'Cama de 1,90m x 1,50m, para colchón de 2 plazas formato queen-size, con 4 cajones.', 40999, 4),
(8, 'Cama king-size', 'Cama de 2m x 2m, para colchón de 2 plazas formato king-size, con 6 cajones.', 62499, 4),
(9, 'Placard [consultar precio]', 'Interiores de placard en diversas presentaciones y materiales, consultar precios por nuestras vías de contacto', 69999, 4),
(10, 'Mueble p/bacha c/estantes', 'Mueble para situar debajo de la bacha del baño (a proveer por el cliente), con flexibilidad para asignar el uso del espacio', 17999, 5),
(11, 'Estantería varias secciones', 'Estantería con variedad de secciones, ideal para almacenar elementos de consumo frecuente en un baño.', 26999, 5),
(15, 'Deck (rodeando pileta) [consultar precios]', 'Un deck de pino que rodea una pileta, consultar precios por nuestras vías de contacto', 49999, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD PRIMARY KEY (`id_mueble`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mueble`
--
ALTER TABLE `mueble`
  MODIFY `id_mueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `mueble_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
