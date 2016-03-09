-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2016 a las 00:48:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `UqNombreCategoria` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext,
  `idUsuario` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `FkPublicacion_Comentario_idx` (`idPublicacion`),
  KEY `FkUsuarioComentario_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navegacion`
--

CREATE TABLE IF NOT EXISTS `navegacion` (
  `idNavegacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `idPadre` int(11) DEFAULT '0',
  `publicado` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`idNavegacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNivel`),
  UNIQUE KEY `UqDescripcionNivel` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idNivel`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` longtext,
  `palabrasClaves` longtext,
  `encabezado` varchar(80) DEFAULT NULL,
  `contenido` longtext,
  `creadoPor` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `ultimaModificacion` datetime DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `publicado` enum('yes','no') DEFAULT 'no',
  `idNavegacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPagina`),
  KEY `FkUsuarioPagina_idx` (`creadoPor`),
  KEY `fkUsuarioModificaPagina_idx` (`modificadoPor`),
  KEY `FkNavegacionPagina_idx` (`idNavegacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `detalle` longtext,
  `urlImagen` varchar(80) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idUsuarioCreador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPublicacion`),
  KEY `FkCategoriaPublicacion_idx` (`idCategoria`),
  KEY `FkUsuarioPublicacion_idx` (`idUsuarioCreador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(40) DEFAULT NULL,
  `clave` varchar(40) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidoPaterno` varchar(40) DEFAULT NULL,
  `apellidoMaterno` varchar(40) DEFAULT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `urlAvatar` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `UqNickUsuario` (`nick`),
  UNIQUE KEY `UqEmailUsuario` (`email`),
  KEY `FkNivelUsuario_idx` (`idNivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nick`, `clave`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `idNivel`, `email`, `urlAvatar`) VALUES
(1, 'dsullon', '202cb962ac59075b964b07152d234b70', 'Donald Alexander', 'Sullon', 'Porras', '1982-03-18 00:00:00', 1, 'donald.sullon@outlook.com', 'http://localhost/intranet_resemin/img/dsullon.jpg'),
(2, 'fabal', '202cb962ac59075b964b07152d234b70', 'Fran', 'Abal', 'Paucar', '1984-05-10 00:00:00', 2, 'fran.abal@resemin.com', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FkPublicacionComentario` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idPublicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioComentario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `FkNavegacionPagina` FOREIGN KEY (`idNavegacion`) REFERENCES `navegacion` (`idNavegacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioCreaPagina` FOREIGN KEY (`creadoPor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioModificaPagina` FOREIGN KEY (`modificadoPor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `FkCategoriaPublicacion` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioPublicacion` FOREIGN KEY (`idUsuarioCreador`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FkNivelUsuario` FOREIGN KEY (`idNivel`) REFERENCES `niveles` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
