-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2008 a las 10:40:54
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias_dias_no_laborables`
--

CREATE TABLE IF NOT EXISTS `asistencias_dias_no_laborables` (
  `id` int(11) NOT NULL auto_increment,
  `dia` varchar(2) NOT NULL,
  `mes` varchar(2) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `asistencias_dias_no_laborables`
--

INSERT INTO `asistencias_dias_no_laborables` (`id`, `dia`, `mes`, `ano`, `descripcion`) VALUES
(1, '1', '1', '2008', 'Fin de Año'),
(2, '19', '4', '2008', 'Día de la Independencia'),
(3, '1', '5', '2008', 'Día del Trabajador'),
(4, '4', '5', '2008', 'Día de la Independencia de Margarita'),
(5, '24', '6', '2008', 'Batalla de Carabobo'),
(6, '0', '0', '0', 'Firma del Acta de la Independencia'),
(7, '24', '7', '2008', 'Natalicio del Libertador'),
(8, '31', '7', '2008', 'Batalla de Matasiete'),
(9, '15', '8', '2008', 'Día de Nuestra Señora de La Asunción'),
(10, '4', '9', '2008', 'Día del Empleado Público'),
(11, '8', '9', '2008', 'Día de Nuestra Señora del Valle'),
(12, '12', '10', '2008', 'Día de la Resistencia Indígena'),
(13, '27', '11', '2008', 'Día de Escudos y Armas'),
(14, '25', '12', '2008', 'Natividad de Jesús'),
(15, '4', '2', '2008', 'Carnaval'),
(16, '5', '2', '2008', 'Carnaval'),
(17, '20', '3', '2008', 'Semana Santa'),
(18, '21', '3', '2008', 'Semana Santa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_actividades`
--

CREATE TABLE IF NOT EXISTS `gestion_actividades` (
  `id` int(11) NOT NULL,
  `nombre` text character set latin1 NOT NULL,
  `fecha_inicio` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `cod_plan_operativo` varchar(10) character set latin1 NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `gestion_actividades`
--

INSERT INTO `gestion_actividades` (`id`, `nombre`, `fecha_inicio`, `duracion`, `cod_plan_operativo`, `completados`, `tiempo_ejecucion`) VALUES
(50, 'Actividad II organizacion y sistemas', '2008-06-27', 23, '61', 100, 2),
(49, 'Actividad organizacion y sistemas', '2008-06-25', 20, '61', 50, 2),
(4, 'Actividad III organizacion y sistemas', '2008-07-03', 20, '62', 100, 0),
(3, 'Actividad II organizacion y sistemas', '2008-07-01', 20, '62', 50, 0),
(5, 'actividad IV', '2008-07-01', 20, '61', 100, 2),
(6, 'Prueba definitiva', '2008-07-01', 20, '62', 100, 2),
(7, 'unimar', '2008-07-01', 20, '61', 100, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_direcciones`
--

CREATE TABLE IF NOT EXISTS `gestion_direcciones` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) default NULL,
  `nombre` text character set utf8 NOT NULL,
  `mision` text NOT NULL,
  `vision` text NOT NULL,
  `codigo_organizacion` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcar la base de datos para la tabla `gestion_direcciones`
--

INSERT INTO `gestion_direcciones` (`id`, `codigo`, `nombre`, `mision`, `vision`, `codigo_organizacion`) VALUES
(47, '31', 'Organizacion y sistemas', 'mision', 'vision', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_fases`
--

CREATE TABLE IF NOT EXISTS `gestion_fases` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `duracion` int(11) NOT NULL,
  `cod_actividad` varchar(11) NOT NULL,
  `estado` int(1) NOT NULL default '0',
  `fecha_actualizacion` date NOT NULL,
  `tiempo_ejecucion` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Volcar la base de datos para la tabla `gestion_fases`
--

INSERT INTO `gestion_fases` (`id`, `nombre`, `fecha_inicio`, `duracion`, `cod_actividad`, `estado`, `fecha_actualizacion`, `tiempo_ejecucion`) VALUES
(116, 'fase 1', '2008-07-01', 8, '6', 2, '2008-07-09', 2),
(115, 'fase 2', '2008-07-03', 12, '5', 2, '2008-07-09', 2),
(114, 'fase 1', '2008-07-01', 8, '5', 2, '2008-07-09', 2),
(113, 'fase II', '2008-07-07', 1, '4', 2, '2008-07-09', 0),
(111, 'Fase b', '2008-07-03', 12, '3', 0, '0000-00-00', 0),
(112, 'fase ', '2008-07-03', 7, '4', 2, '2008-07-09', 2),
(110, 'Fase a', '2008-07-01', 8, '3', 2, '2008-07-09', 2),
(76, 'Fase B', '2008-07-04', 7, '49', 1, '2008-07-09', 2),
(75, 'Fase A', '2008-07-01', 12, '49', 2, '2008-07-07', 2),
(74, 'Fase III organizacion y sistemas', '2008-07-03', 10, '50', 2, '2008-07-08', 2),
(73, 'Fase II organizacion y sistemas', '2008-07-04', 5, '50', 2, '2008-07-08', 2),
(72, 'Fase organizacion y sistemas', '2008-07-01', 8, '50', 2, '2008-07-08', 2),
(117, 'fase 2', '2008-07-03', 12, '6', 2, '2008-07-09', 2),
(118, 'fase 1', '2008-07-01', 8, '7', 2, '2008-07-09', 2),
(119, 'fase 2', '2008-07-03', 12, '7', 2, '2008-07-09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obje_objo_dir`
--

CREATE TABLE IF NOT EXISTS `gestion_obje_objo_dir` (
  `id` int(11) NOT NULL auto_increment,
  `cod_obj_e_dir` varchar(10) NOT NULL,
  `cod_obj_o_dir` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcar la base de datos para la tabla `gestion_obje_objo_dir`
--

INSERT INTO `gestion_obje_objo_dir` (`id`, `cod_obj_e_dir`, `cod_obj_o_dir`) VALUES
(30, '52', '75'),
(28, '52', '67'),
(26, '51', '71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obje_org_dir`
--

CREATE TABLE IF NOT EXISTS `gestion_obje_org_dir` (
  `id` int(11) NOT NULL auto_increment,
  `cod_obj_e_org` varchar(10) NOT NULL,
  `cod_obj_e_dir` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`,`cod_obj_e_org`,`cod_obj_e_dir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Volcar la base de datos para la tabla `gestion_obje_org_dir`
--

INSERT INTO `gestion_obje_org_dir` (`id`, `cod_obj_e_org`, `cod_obj_e_dir`) VALUES
(98, '21', '51'),
(99, '21', '52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obj_estrategicos`
--

CREATE TABLE IF NOT EXISTS `gestion_obj_estrategicos` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `codigo_plan_estrategico` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL,
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Volcar la base de datos para la tabla `gestion_obj_estrategicos`
--

INSERT INTO `gestion_obj_estrategicos` (`id`, `codigo`, `nombre`, `descripcion`, `codigo_plan_estrategico`, `completados`, `tiempo_ejecucion`) VALUES
(62, '24', 'Objetivo estrategico IV', 'descripcion', '11', 0, 0),
(61, '23', 'Objetivo estrategico III', 'descripcion', '11', 0, 0),
(60, '22', 'Objetivo estrategico II', 'descripcion', '11', 0, 0),
(59, '21', 'Objetivo estrategico contraloria', 'descripcion', '11', 88, 2),
(68, '82', 'Obj Est 2', 'Descripción del Obj Est 2', '71', 0, 0),
(67, '81', 'Obj Est 1', 'Descripción del Obj Est 1', '71', 0, 0),
(70, '78', '7888888', '88888887', '21', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obj_estrategicos_direcciones`
--

CREATE TABLE IF NOT EXISTS `gestion_obj_estrategicos_direcciones` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `cod_plan_e_dir` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Volcar la base de datos para la tabla `gestion_obj_estrategicos_direcciones`
--

INSERT INTO `gestion_obj_estrategicos_direcciones` (`id`, `codigo`, `nombre`, `descripcion`, `cod_plan_e_dir`, `completados`, `tiempo_ejecucion`) VALUES
(67, '52', 'Objetivo estrategico II organizacion y sistemas', 'descripcion', '41', 88, 1),
(66, '51', 'Objetivo estrategico organizacion y sistemas', 'ds', '41', 88, 2),
(68, '98', '98 al 7888888', '98 al 7888888', '71', 0, 0),
(69, '88', '88888888', '88888888', '71', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obj_operativos`
--

CREATE TABLE IF NOT EXISTS `gestion_obj_operativos` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text,
  `descripcion` text NOT NULL,
  `cod_plan_o_dir` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `gestion_obj_operativos`
--

INSERT INTO `gestion_obj_operativos` (`id`, `codigo`, `nombre`, `descripcion`, `cod_plan_o_dir`, `completados`, `tiempo_ejecucion`) VALUES
(36, '67', 'Objetivo operativo II organizacion y sistemas', 'descripcion', '62', 75, 1),
(37, '75', 'Objetivo operativo III organizacion y sistemas', 'descripcion', '62', 100, 1),
(34, '71', 'Objetivo operativo organizacion y sistemas', 'sd', '61', 88, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_obj_operativos_actividades`
--

CREATE TABLE IF NOT EXISTS `gestion_obj_operativos_actividades` (
  `id` int(11) NOT NULL auto_increment,
  `cod_actividad` varchar(10) NOT NULL,
  `cod_obj_operativo` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Volcar la base de datos para la tabla `gestion_obj_operativos_actividades`
--

INSERT INTO `gestion_obj_operativos_actividades` (`id`, `cod_actividad`, `cod_obj_operativo`) VALUES
(41, '7', '71'),
(40, '6', '67'),
(39, '5', '71'),
(38, '4', '75'),
(37, '3', '67'),
(18, '50', '71'),
(17, '49', '71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_planes_estrategicos`
--

CREATE TABLE IF NOT EXISTS `gestion_planes_estrategicos` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text,
  `aqo_inicio` varchar(4) NOT NULL,
  `aqo_fin` varchar(4) NOT NULL,
  `codigo_organizacion` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Volcar la base de datos para la tabla `gestion_planes_estrategicos`
--

INSERT INTO `gestion_planes_estrategicos` (`id`, `codigo`, `nombre`, `aqo_inicio`, `aqo_fin`, `codigo_organizacion`, `completados`, `tiempo_ejecucion`) VALUES
(58, '12', 'Plan Estrategico 2007-2011', '2007', '2011', '1', 0, 0),
(57, '11', 'Plan estrategico contraloria', '2008', '2009', '1', 22, 2),
(64, '21', 'Plan Estratégico FUNCENE 2008-2011', '2008', '2011', '33', 0, 0),
(65, '75', 'Plan 75', '1975', '2075', '33', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_planes_estrategicos_direcciones`
--

CREATE TABLE IF NOT EXISTS `gestion_planes_estrategicos_direcciones` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `aqo_inicio` int(4) NOT NULL,
  `aqo_fin` int(4) NOT NULL,
  `cod_direccion` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Volcar la base de datos para la tabla `gestion_planes_estrategicos_direcciones`
--

INSERT INTO `gestion_planes_estrategicos_direcciones` (`id`, `codigo`, `nombre`, `aqo_inicio`, `aqo_fin`, `cod_direccion`, `completados`, `tiempo_ejecucion`) VALUES
(161, '123', 'Plan', 2008, 2009, '31', 0, 0),
(160, '42', 'Plan estrategico II organizacion y sistemas', 2008, 2009, '31', 0, 0),
(158, '41', 'Plan estrategico organizacion y sistemas', 2007, 2008, '31', 88, 2),
(163, '71', 'Plan Estra FUNCENE 01 2008-2011', 2008, 2011, '33', 0, 0),
(164, '88', 'plan est 88 2008 2011', 2008, 2011, '33', 0, 0),
(165, '98', '33', 33, 33, '33', 0, 0),
(166, '78', 'Pl es dir 75', 975, 2075, '33', 0, 0),
(167, '66', '1966', 1966, 1966, '33', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_planes_operativos`
--

CREATE TABLE IF NOT EXISTS `gestion_planes_operativos` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(10) NOT NULL,
  `nombre` text NOT NULL,
  `aqo_inicio` int(4) NOT NULL,
  `aqo_fin` int(4) NOT NULL,
  `cod_direccion` varchar(10) NOT NULL,
  `completados` int(3) NOT NULL default '0',
  `tiempo_ejecucion` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcar la base de datos para la tabla `gestion_planes_operativos`
--

INSERT INTO `gestion_planes_operativos` (`id`, `codigo`, `nombre`, `aqo_inicio`, `aqo_fin`, `cod_direccion`, `completados`, `tiempo_ejecucion`) VALUES
(67, '62', 'Plan operativo II organizacion y sistemas', 2007, 2008, '31', 88, 1),
(66, '61', 'Plan operativo organizacion y sistemas', 2008, 2009, '31', 88, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_plan_e_org_dir`
--

CREATE TABLE IF NOT EXISTS `gestion_plan_e_org_dir` (
  `id` int(11) NOT NULL auto_increment,
  `cod_plan_e_org` varchar(10) NOT NULL,
  `cod_plan_e_dir` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Volcar la base de datos para la tabla `gestion_plan_e_org_dir`
--

INSERT INTO `gestion_plan_e_org_dir` (`id`, `cod_plan_e_org`, `cod_plan_e_dir`) VALUES
(164, '11', '123'),
(163, '11', '42'),
(161, '11', '41'),
(178, '75', '66'),
(181, '21', '71'),
(174, '75', '78'),
(182, '75', '71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_plan_e_o_dir`
--

CREATE TABLE IF NOT EXISTS `gestion_plan_e_o_dir` (
  `id` int(11) NOT NULL auto_increment,
  `cod_plan_e_dir` varchar(10) NOT NULL,
  `cod_plan_o_dir` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcar la base de datos para la tabla `gestion_plan_e_o_dir`
--

INSERT INTO `gestion_plan_e_o_dir` (`id`, `cod_plan_e_dir`, `cod_plan_o_dir`) VALUES
(57, '41', '62'),
(56, '41', '61');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_relacion_actividades_fases`
--

CREATE TABLE IF NOT EXISTS `gestion_relacion_actividades_fases` (
  `precedida` int(11) NOT NULL,
  `fase` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `gestion_relacion_actividades_fases`
--

INSERT INTO `gestion_relacion_actividades_fases` (`precedida`, `fase`) VALUES
(75, 76),
(73, 74),
(72, 73);
