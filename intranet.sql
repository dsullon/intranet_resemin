-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-04-2016 a las 17:08:53
-- Versión del servidor: 5.5.48-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tdr_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `UqNombreCategoria` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(2, 'Boletines'),
(1, 'Noticias');

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
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `idPadre` int(11) DEFAULT '0',
  `publicado` enum('si','no') DEFAULT 'si',
  `idPagina` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `nombre`, `idPadre`, `publicado`, `idPagina`) VALUES
(1, 'Nosotros', 0, 'si', 1),
(2, 'Nosotros', 0, 'si', 0),
(3, 'La Empresa', 2, 'si', 0),
(4, 'Misión - Visión', 2, 'si', 0),
(5, 'Actividades', 0, 'si', 0);

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
  `contenido` longtext,
  `creadoPor` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `ultimaModificacion` datetime DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `publicado` enum('si','no') DEFAULT 'no',
  PRIMARY KEY (`idPagina`),
  UNIQUE KEY `UQTituloPagina` (`titulo`),
  KEY `fkUsuarioModificaPagina_idx` (`modificadoPor`),
  KEY `FkUsuarioPagina_idx` (`creadoPor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`idPagina`, `titulo`, `contenido`, `creadoPor`, `fechaCreacion`, `ultimaModificacion`, `modificadoPor`, `publicado`) VALUES
(1, 'Nosotros', '<div>\r\n	<u><strong>MISI&Oacute;N</strong></u></div>\r\n<div>\r\n	RESEMIN S.A. Es una empresa establecida en Enero de 1989 por un grupo de profesionales, t&eacute;cnicos y operarios, cuya constituci&oacute;n es para brindar servicios de Dise&ntilde;o &ndash; Fabricaci&oacute;n, Mantenimiento &ndash; Reparaci&oacute;n y Venta de Repuestos, cumpliendo los est&aacute;ndares de calidad seg&uacute;n norma ISO 9001:2000, y que paralelamente fortalece nuestro Servicio de Perforaci&oacute;n de rocas mejorando continuamente para la satisfacci&oacute;n del cliente.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Buscamos destacar en el mercado nacional e internacional por los tiempos de entrega de los productos y servicios, la innovaci&oacute;n de nuestros dise&ntilde;os de acuerdo a las necesidades del cliente.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<u><strong>VISI&Oacute;N</strong></u></div>\r\n<div>\r\n	Llegar a ser y mantenernos a nivel nacional como la empresa que sea la primera opci&oacute;n y primera elecci&oacute;n en la unidad de negocio de Jumbos de perforaci&oacute;n de rocas con marca propia RAPTOR trabajando con tecnolog&iacute;a de punta, procesos de gesti&oacute;n certificado y material humano competente y comprometido.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<u><strong>VALORES</strong></u></div>\r\n<div>\r\n	Nuestros valores</div>\r\n<ul>\r\n	<li>\r\n		HONESTIDAD</li>\r\n	<li>\r\n		PUNTUALIDAD</li>\r\n	<li>\r\n		EFICIENCIA</li>\r\n	<li>\r\n		RESPONSABILIDAD</li>\r\n	<li>\r\n		POLITICA DE CALIDAD</li>\r\n</ul>\r\n<div>\r\n	El compromiso de RESEMIN S.A. es brindar una mejora continua en la satisfacci&oacute;n plena a las necesidades de nuestros clientes de la Industria Minera en base a los requerimientos de productos y servicios que ellos nos encargan, en los siguientes rubros:</div>\r\n<ul>\r\n	<li>\r\n		Dise&ntilde;o y fabricaci&oacute;n de equipos de perforaci&oacute;n de rocas.</li>\r\n	<li>\r\n		Mantenimiento y/o Reparaci&oacute;n de equipos de Perforaci&oacute;n de Rocas.</li>\r\n	<li>\r\n		Venta de Repuestos y Componentes para Equipos de Perforaci&oacute;n.</li>\r\n	<li>\r\n		Servicios de Perforaci&oacute;n de Roca.</li>\r\n</ul>\r\n', 1, '2016-03-12 05:52:18', '2016-03-28 23:48:58', 1, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `contenido` longtext,
  `imagen` varchar(80) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `creadoPor` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `ultimaModificacion` datetime DEFAULT NULL,
  `publicado` enum('si','no') DEFAULT 'no',
  PRIMARY KEY (`idPublicacion`),
  KEY `FkCategoriaPublicacion_idx` (`idCategoria`),
  KEY `FkUsuarioPublicacion_idx` (`creadoPor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPublicacion`, `titulo`, `contenido`, `imagen`, `idCategoria`, `creadoPor`, `fechaCreacion`, `modificadoPor`, `ultimaModificacion`, `publicado`) VALUES
(1, 'Convenio UPC', '<p>Como hemos visto, ambos conceptos hacen referencia a un cierto grado de libertad asociado el software, siendo la mayor diferencia el plano de aplicación de esa libertad. En el caso del Open Source la libertad se centra en la esfera de desarrollo, en la que los desarrolladores comparten acceso al código original y opcionalmente a las modificaciones realizadas en este por otros partners de desarrollo, generando así sinergias entre programadores y la mejora colectiva del código. Por su parte el Free Software centra su esfera de libertad en el plano de los usuarios, los cuales son libres de utilizar y redistribuir el código a su antojo, modificarlo y adaptarlo a sus necesidades.\n\nOtra de las diferencias más evidentes es la que radica en el coste del software para el usuario final. Pues si bien bajo la bandera del Free Software puede recibirse una remuneración por el trabajo realizado siempre y cuando se entregue al cliente el código fuente del mismo, los desarrolladores que se engloban bajo el Open Source distribuyen directamente todo código generado sin ningún tipo de remuneración.\n\nAsí pues Software Libre es aquel que respeta la libertad de todos los usuarios que adquirieron el software para ser usado, copiado, estudiado, modificado, y/o redistribuido libremente de varias formas. Es muy importante aclarar que el Software Libre establece muchas libertades pero no es necesariamente gratuito. Con esto quiero decir que conservando su carácter libre (respetando las libertades), puede ser distribuido de manera comercial, garantizando siempre sus derechos de modificación y redistribución.</p>', '3.jpg', 1, 1, '2016-04-01 17:49:56', 1, '2016-04-01 17:49:56', 'si'),
(2, 'Taller de Liderazgo', '<p>En el último fin de semana se llevó a cabo el tercer taller de liderazgo, el cual fue promovido por la gerencia de recursos humanos en coordinacion con Gerencia General.</p>', NULL, 2, 1, '2016-04-01 18:48:43', 1, '2016-04-01 18:48:43', 'si'),
(3, 'Convenio UPC', '<div>\r\n	Resemin S.A. genera y mantiene alianzas estrat&eacute;gicas con instituciones educativas, cient&iacute;ficas, tecnol&oacute;gicas y culturales de primer nivel, as&iacute; como con entidades gubernamentales y organismos internacionales, creando relaciones mutuamente beneficiosas. Estos v&iacute;nculos se materializan a trav&eacute;s de convenios que deben ser conocidos por la comunidad universitaria.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Otras alianzas internacionales</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Katholischer Akademischer Ausl&auml;nder-Dienst (KAAD) es una instituci&oacute;n perteneciente a la Iglesia cat&oacute;lica alemana, fundada en 1958. Su misi&oacute;n es brindar apoyo a estudiantes e investigadores de Latinoam&eacute;rica, Asia, Africa, Oriente Pr&oacute;ximo y Medio y Europa del Este. KAAD concreta este apoyo mediante el otorgamiento de becas de posgrado y de investigaci&oacute;n en Alemania en las distintas disciplinas universitarias.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Para mayor informaci&oacute;n sobre el Kaad-Per&uacute; ingrese a la p&aacute;gina web haciendo clic aqu&iacute;.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	ICALA es una asociaci&oacute;n sin fines de lucro financiada por la acci&oacute;n episcopal ADVENIAT desde 1969 y dedicada a la promoci&oacute;n de posgraduados latinoamericanos y alemanes. Su objetivo es fomentar, en consonancia con la fe cristiana, la reflexi&oacute;n cient&iacute;fica sobre el hombre y la sociedad, sobre la econom&iacute;a y la educaci&oacute;n.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Para mayor informaci&oacute;n sobre el Icala-Per&uacute; ingrese a la p&aacute;gina web haciendo clic aqu&iacute;.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	ref.&nbsp;<a href="http://www.pucp.edu.pe/la-universidad/pucp-internacional/convenios-internacionales/">http://www.pucp.edu.pe/la-universidad/pucp-internacional/convenios-internacionales/</a></div>\r\n', NULL, 1, 1, '2016-04-01 23:11:38', 1, '2016-04-01 23:11:38', NULL),
(4, 'Convenio Educativos', '<div>\r\n	<img alt="" src="/intranet_resemin/img/publicaciones/images/upc.png" style="width: 289px; height: 289px; float: left;" />Resemin S.A. genera y mantiene alianzas estrat&eacute;gicas con instituciones educativas, cient&iacute;ficas, tecnol&oacute;gicas y culturales de primer nivel, as&iacute; como con entidades gubernamentales y organismos internacionales, creando relaciones mutuamente beneficiosas. Estos v&iacute;nculos se materializan a trav&eacute;s de convenios que deben ser conocidos por la comunidad universitaria.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Otras alianzas internacionales</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Katholischer Akademischer Ausl&auml;nder-Dienst (KAAD) es una instituci&oacute;n perteneciente a la Iglesia cat&oacute;lica alemana, fundada en 1958. Su misi&oacute;n es brindar apoyo a estudiantes e investigadores de Latinoam&eacute;rica, Asia, Africa, Oriente Pr&oacute;ximo y Medio y Europa del Este. KAAD concreta este apoyo mediante el otorgamiento de becas de posgrado y de investigaci&oacute;n en Alemania en las distintas disciplinas universitarias.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Para mayor informaci&oacute;n sobre el Kaad-Per&uacute; ingrese a la p&aacute;gina web haciendo clic aqu&iacute;.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	ICALA es una asociaci&oacute;n sin fines de lucro financiada por la acci&oacute;n episcopal ADVENIAT desde 1969 y dedicada a la promoci&oacute;n de posgraduados latinoamericanos y alemanes. Su objetivo es fomentar, en consonancia con la fe cristiana, la reflexi&oacute;n cient&iacute;fica sobre el hombre y la sociedad, sobre la econom&iacute;a y la educaci&oacute;n.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Para mayor informaci&oacute;n sobre el Icala-Per&uacute; ingrese a la p&aacute;gina web haciendo clic aqu&iacute;.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	ref.&nbsp;<a href="http://www.pucp.edu.pe/la-universidad/pucp-internacional/convenios-internacionales/">http://www.pucp.edu.pe/la-universidad/pucp-internacional/convenios-internacionales/</a></div>\r\n', NULL, 1, 1, '2016-04-01 23:12:00', 1, '2016-04-01 23:15:56', 'si');

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
  ADD CONSTRAINT `FkUsuarioCreaPagina` FOREIGN KEY (`creadoPor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioModificaPagina` FOREIGN KEY (`modificadoPor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `FkCategoriaPublicacion` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FkUsuarioPublicacion` FOREIGN KEY (`creadoPor`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FkNivelUsuario` FOREIGN KEY (`idNivel`) REFERENCES `niveles` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
