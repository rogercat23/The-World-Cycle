-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2015 a las 12:52:46
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
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `body` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`) VALUES
(1, 'Benvingut', 'primer cop'),
(2, 'Benvingut 2', 'segoncop'),
(3, 'Proces', 'cos noticia'),
(4, 'Adeu', 'Fins un altre'),
(5, 'Proces', 'cos noticia 2'),
(6, 'Adeu', 'Fins un altre'),
(8, 'Bon nadal', 'Que passeu be');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(25) NOT NULL,
  `COGNOMS` varchar(25) NOT NULL,
  `CIUTAT` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`ID`, `NOM`, `COGNOMS`, `CIUTAT`) VALUES
(1, 'Roger', 'Freixes Ribalta', 'Igualada'),
(2, 'Alex', 'Moreu', 'Barcelona'),
(3, 'Ramon', 'Aguilar', 'Barcelona'),
(4, 'Oskar', 'Vincent', 'Helsinki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
