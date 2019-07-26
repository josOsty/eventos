-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2019 a las 23:14:43
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asis`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_cargo` (`c_idcargo` INTEGER(11), `c_cargo` VARCHAR(60), `accion` VARCHAR(20))  BEGIN
if(accion ='guardar')then
 INSERT INTO cargos (id,cargo)VALUES(c_idcargo,c_cargo);
end if;
if(accion ='modificar')then
update cargos set cargo=c_cargo where  cargos.id=c_idcargo;
end if;
if(accion='eliminar')then
delete from cargos where id =c_idcargo;
end if;
if(accion='mostrar')then
select * from cargos;
end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL DEFAULT '00:00:00',
  `entrada_tarde` time NOT NULL,
  `salida_tarde` time NOT NULL,
  `id_evento` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `id_personal`, `fecha`, `hora_entrada`, `hora_salida`, `entrada_tarde`, `salida_tarde`, `id_evento`) VALUES
(21, 1, '2019-07-24', '04:19:16', '05:15:44', '05:17:10', '05:22:03', NULL),
(22, 6, '2019-07-24', '05:54:32', '05:54:36', '00:00:01', '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_mensual`
--

CREATE TABLE `asistencia_mensual` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(1) NOT NULL,
  `d3` int(1) NOT NULL,
  `d4` int(1) NOT NULL,
  `d5` int(1) NOT NULL,
  `d6` int(1) NOT NULL,
  `d7` int(1) NOT NULL,
  `d8` int(1) NOT NULL,
  `d9` int(1) NOT NULL,
  `d10` int(1) NOT NULL,
  `d11` int(1) NOT NULL,
  `d12` int(1) NOT NULL,
  `d13` int(1) NOT NULL,
  `d14` int(1) NOT NULL,
  `d15` int(1) NOT NULL,
  `d16` int(1) NOT NULL,
  `d17` int(1) NOT NULL,
  `d18` int(1) NOT NULL,
  `d19` int(1) NOT NULL,
  `d20` int(1) NOT NULL,
  `d21` int(1) NOT NULL,
  `d22` int(1) NOT NULL,
  `d23` int(1) NOT NULL,
  `d24` int(1) NOT NULL,
  `d25` int(1) NOT NULL,
  `d26` int(1) NOT NULL,
  `d27` int(1) NOT NULL,
  `d28` int(1) NOT NULL,
  `d29` int(1) NOT NULL,
  `d30` int(1) NOT NULL,
  `d31` int(1) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia_mensual`
--

INSERT INTO `asistencia_mensual` (`id`, `cedula`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `mes`, `anio`) VALUES
(1, '1724461262', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, '07', 2019),
(2, '0654897916', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '07', 2019),
(3, '1724564188', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '07', 2019),
(4, '1724564185', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '07', 2019),
(5, '0705947422', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '07', 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Docente'),
(3, 'Estudiantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `departamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `departamento`) VALUES
(1, 'Desarrollo del Software'),
(2, 'Marketing'),
(3, 'Diseño de Modas'),
(4, 'Gastronomia'),
(5, 'Guianza Turistica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `evento`, `direccion`, `fecha`, `foto`) VALUES
(11, 'feista de gala ', 'ojsdhf', '0000-00-00', 'vistas/img/usuarios/ojsdhf/227.jpg'),
(12, 'fiestas quito', 'j', '0000-00-00', 'vistas/img/eventos/j/776.jpg'),
(13, 'limpieza de laboratorio CENEPA', 'CENEPA', '0000-00-00', 'vistas/img/eventos/CENEPA/976.jpg'),
(14, 'Pasarela Diseño de Modas', 'CENEPA ', '2019-07-24', 'vistas/img/eventos/CENEPA /614.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `cedula`, `nombres`, `apellidos`, `fecha_nacimiento`, `telefono`, `direccion`, `id_cargo`, `id_departamento`) VALUES
(3, '0654897916', 'juan', 'chavez', '1998-05-14', '(2315) 646-8496', 'la ciuedaenaskdoaioo', 1, 1),
(5, '1724564185', 'jose', 'ostaiza', '1995-01-04', '(0231) 864-9499', 'nbsbdhabuwbbsudwb', 3, 2),
(6, '1724564188', 'luis', 'hernandez', '1995-05-05', '(1354) 879-7979', 'la merced k', 3, 3),
(7, '0705947422', 'Marisol', 'Maldonado', '1994-10-01', '(1564) 687-8998', '5 de junio', 3, 1),
(8, '0705947422', 'dfgdfg', 'dfgdfgdfg', '1995-01-04', '(0213) 545-4666', '5 de junio', 3, 1),
(9, '1779849465', 'Daniela', 'Ostaiza', '1994-10-01', '0992512049', 'la merced s452-55 y 8 de febrero', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(2, 'jose ostaiza ', 'jose', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/jose/346.jpg', 1, '2019-07-24 15:58:34', '2019-07-24 20:58:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencia_mensual`
--
ALTER TABLE `asistencia_mensual`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `asistencia_mensual`
--
ALTER TABLE `asistencia_mensual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
