-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2016 a las 11:16:18
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `theworldcycle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adreca`
--

CREATE TABLE IF NOT EXISTS `adreca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrer` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `pis` int(11) DEFAULT NULL,
  `porta` int(11) DEFAULT NULL,
  `postal` int(11) NOT NULL,
  `id_ciutat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `adreca`
--

INSERT INTO `adreca` (`id`, `carrer`, `numero`, `pis`, `porta`, `postal`, `id_ciutat`) VALUES
(2, 'C/Maria Trulls Algué', 53, NULL, NULL, 8700, 1),
(3, 'C/Calaf', 103, 1, 2, 8700, 1),
(4, 'C/Masquefa', 9, 1, 1, 98765, 13),
(6, 'C/Masquefa', 9, 1, 1, 98765, 1),
(9, 'C/Valencia', 2, 3, 3, 9876, 15),
(10, 'C/Castelloli', 3, NULL, NULL, 8700, 1),
(27, 'C/Calaf', 12, 1, 1, 12345, 17),
(28, '', 0, NULL, NULL, 0, 18),
(29, '', 0, NULL, NULL, 0, 18),
(30, '', 0, NULL, NULL, 0, 18),
(31, '', 0, NULL, NULL, 0, 18),
(32, '', 0, NULL, NULL, 0, 18),
(33, '', 0, NULL, NULL, 0, 18),
(34, '', 0, NULL, NULL, 0, 18),
(35, '', 0, NULL, NULL, 0, 18),
(36, '', 0, NULL, NULL, 0, 18),
(37, '', 0, NULL, NULL, 0, 18),
(38, 'C/Maria Trulls algue', 12, NULL, NULL, 870, 1),
(39, 'C/Maria Trulls algue', 45, NULL, NULL, 8700, 1),
(40, 'C/Calaf', 2, NULL, NULL, 12345, 2),
(41, '', 0, NULL, NULL, 0, 18),
(42, 'C/Valencia', 1, NULL, NULL, 12345, 19),
(43, '', 0, NULL, NULL, 0, 18),
(44, 'C/Maria Trulls', 32, NULL, NULL, 34567, 17),
(45, 'C/Maria Trulls', 2, NULL, NULL, 23123, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciutat`
--

CREATE TABLE IF NOT EXISTS `ciutat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `id_provinciaregio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `ciutat`
--

INSERT INTO `ciutat` (`id`, `nom`, `id_provinciaregio`) VALUES
(1, 'Igualada', 1),
(2, 'Cervera', 2),
(3, 'Barcelona', 1),
(4, 'Girona', 3),
(5, 'Lleida', 2),
(6, 'La Pobla de Claramunt', 1),
(7, 'Olot', 3),
(8, 'Sitges', 1),
(9, 'Montbui', 1),
(10, 'Calaf', 1),
(12, 'Sant Genis', 1),
(13, 'Tarragona', 4),
(15, 'Cuenca', 5),
(17, 'Bellpuig', 2),
(19, 'Mollerussa', 2),
(20, 'Capallades', 1),
(21, 'Santander', 6),
(22, 'Santiago de Compostela', 7),
(23, 'Valencia', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrassenya`
--

CREATE TABLE IF NOT EXISTS `contrassenya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `contrassenya`
--

INSERT INTO `contrassenya` (`id`, `password`) VALUES
(35, '250cf8b51c773f3f8dc8b4be867a9a02'),
(36, '202cb962ac59075b964b07152d234b70'),
(37, '189bbbb00c5f1fb7fba9ad9285f193d1'),
(38, '3350073dd991a43b05aedf4969ea7e46'),
(39, '1775223eeeb515c77a7f201db191af09'),
(40, 'd41d8cd98f00b204e9800998ecf8427e'),
(41, '1aabac6d068eef6a7bad3fdf50a05cc8'),
(42, '77963b7a931377ad4ab5ad6a9cd718aa'),
(43, 'b1207b95b13116469b29ef83963ee0ab'),
(44, '47bce5c74f589f4867dbd57e9ca9f808'),
(45, 'b601badd1d4dfcd6e01b3f1ff702f959');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nom`) VALUES
(3, 'Espanya'),
(4, 'França'),
(5, 'Alemanya'),
(6, 'Portugal'),
(7, 'Italia'),
(8, 'Finlandia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provinciaregio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provinciaregio` (`id`, `nom`, `id_pais`) VALUES
(1, 'Barcelona', 3),
(2, 'Lleida', 3),
(3, 'Girona', 3),
(4, 'Tarragona', 3),
(5, 'Cuenca', 3),
(6, 'Santander', 3),
(7, 'La Coruna', 3),
(8, 'Valencia', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correu` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `cognom1` varchar(45) NOT NULL,
  `cognom2` varchar(45) DEFAULT NULL,
  `hd` varchar(4) NOT NULL,
  `telefon` int(11) NOT NULL,
  `data_naix` date NOT NULL,
  `data_inici` date NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_adreca` int(11) NOT NULL,
  `id_contrassenya` int(11) NOT NULL,
  `id_estat` int(11) NOT NULL,
  PRIMARY KEY (`id`,`correu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`id`, `correu`, `nom`, `cognom1`, `cognom2`, `hd`, `telefon`, `data_naix`, `data_inici`, `id_roles`, `id_adreca`, `id_contrassenya`, `id_estat`) VALUES
(3, 'rogercat23@gmail.com', 'Roger', 'Freixes', 'Ribalta', '', 617317321, '1991-03-03', '1991-03-27', 2, 1, 37, 1),
(4, 'prova@gmail.com', 'Joan', 'Castells', 'Lopez', '', 234534653, '1998-03-12', '1998-05-28', 1, 1, 37, 1),
(6, 'cep@cep.net', 'Antonio', 'Dominiguez', 'Gomez', '', 432345467, '1967-12-01', '2015-10-14', 1, 1, 37, 1),
(7, 'sergio@gmail.com', 'Sergio', 'Ruiz', 'Muntaner', '', 123123123, '1990-03-03', '2015-10-15', 1, 1, 37, 1),
(11, 'ramon@gmail.com', 'Ramon', 'Freixes', 'Batalla', '', 123123123, '1960-03-25', '2015-10-15', 1, 1, 37, 1),
(12, 'llull@gmail.com', 'Llull', 'Murcia', 'Fernandez', '', 12345678, '1990-05-21', '2015-10-29', 1, 1, 37, 1),
(13, 'juanlopez@gmail.com', 'Juan', 'Lopez', 'Fernandez', '', 123456789, '1992-05-10', '2015-11-12', 1, 7, 39, 1),
(14, 'joseluis@gmail.com', 'Jose Luis', 'Sanchez', 'Arroyo', '', 123456789, '1999-03-23', '2015-11-19', 1, 8, 37, 1),
(15, 'ciber@gmail.com', 'Ciber', 'Ciber1', 'Ciber2', '', 98765432, '1991-04-23', '2015-11-24', 1, 9, 37, 1),
(16, 'prova23@gmail.com', 'Prova', 'Prova', 'Prova', '', 987654321, '1991-03-24', '2015-11-24', 1, 10, 37, 1),
(17, 'albert@gmail.com', 'Albert', 'Vialata', 'Fernadez', '', 123456789, '1991-03-02', '1991-03-07', 1, 1, 37, 1),
(30, 'aaaa@gmail.com', 'Aa', 'Bb', 'Cc', '', 123456789, '1990-02-12', '2016-01-12', 1, 27, 44, 1),
(43, 'carme@gmail.com', 'Carme', 'Palmes', 'Montes', '', 123456789, '1991-03-23', '2016-01-13', 1, 39, 45, 1),
(44, 'jordi@gmail.com', 'Jordi', 'Duran', 'Martinez', '', 213456782, '2008-01-02', '2016-01-13', 1, 40, 45, 1),
(45, '', '', '', '', '', 0, '1970-01-01', '2016-01-13', 1, 41, 40, 1),
(49, 'prova22@gmail.com', 'Ramon', 'Freixes', 'Batalla', '', 123456779, '2016-01-05', '2016-01-14', 1, 45, 45, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
