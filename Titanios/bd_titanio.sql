-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2016 a las 16:34:23
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_titanio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `rec_id` int(3) NOT NULL,
  `rec_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `rec_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `rec_foto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rec_estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'activo',
  `rec_incidencias` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`rec_id`, `rec_nombre`, `rec_descripcion`, `rec_foto`, `rec_estado`, `rec_incidencias`) VALUES
(1, 'Aula Teoría', 'Aula planta primera. Aforo 35 personas.', '1', 'activo', ''),
(2, 'Aula Teoría', 'Aula planta segunda. Aforo 35 personas.', '2', 'activo', '0'),
(3, 'Aula Teoría', 'Aula planta tercera. Aforo 25 personas.', '3', 'activo', '0'),
(4, 'Aula Teoría', 'Aula planta cuarta. Aforo 30 personas.', '4', 'activo', '0'),
(5, 'Aula Informática', 'Aula planta primera. Aforo 15 personas.', '5', 'activo', ''),
(6, 'Aula Informática', 'Aula planta segunda. Aforo 30 personas.', '6', 'activo', '0'),
(7, 'Despacho Entrevista', 'Despacho 1. Individual.', '7', 'activo', '0'),
(8, 'Despacho Entrevista', 'Despacho 2. Compartido.', '8', 'activo', '0'),
(9, 'Sala de Reuniones', 'Planta baja. Tiene proyector y aforo de 20 personas.', '9', 'activo', '0'),
(10, 'Proyector', 'Proyector de LCD', '10', 'activo', '0'),
(11, 'Carro Portátiles', 'Contiene 10 portatiles DELL i7', '11', 'activo', '0'),
(12, 'Portátil', 'Thosiba Satellite P50', '12', 'activo', '0'),
(13, 'Portátil', 'HP Pavilion 15 Notebook PC', '13', 'activo', '0'),
(14, 'Portátil', 'Asus UX31E', '14', 'activo', '0'),
(15, 'Móvil', 'Nokia 5310 (Contiene el juego de la serpiente).', '15', 'activo', '0'),
(16, 'Móvil', 'ONE Plus 2 (Candy Crush integrado)', '16', 'activo', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `res_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `res_finicio` datetime NOT NULL,
  `res_ffin` datetime DEFAULT NULL,
  `res_estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`res_id`, `usu_id`, `rec_id`, `res_finicio`, `res_ffin`, `res_estado`) VALUES
(3, 1, 1, '2016-11-25 18:00:00', '2016-11-28 19:00:00', 'Oculta'),
(4, 1, 2, '2016-11-07 18:00:00', '2016-11-18 17:00:00', 'Visible'),
(5, 1, 3, '2016-11-07 17:00:00', '2016-11-09 18:00:00', 'Oculta'),
(6, 1, 4, '2016-11-07 17:29:46', '2016-11-07 18:34:12', 'Visible'),
(7, 1, 9, '2016-11-07 18:24:45', '2016-11-07 18:28:14', 'Visible'),
(8, 1, 6, '2016-11-07 18:00:00', '2016-11-07 19:00:00', 'Oculta'),
(9, 1, 7, '2016-11-07 18:29:54', '2016-11-07 18:37:30', 'Visible'),
(13, 1, 2, '2016-11-07 19:52:06', '2016-11-07 19:52:09', 'Visible'),
(14, 1, 16, '2016-11-07 19:52:23', '2016-11-07 19:55:10', 'Visible'),
(15, 1, 15, '2016-11-07 20:00:01', '2016-11-07 20:01:40', 'Visible'),
(16, 1, 13, '2016-11-07 20:01:05', '2016-11-08 17:06:44', 'Visible'),
(17, 1, 15, '2016-11-07 20:03:35', '2016-11-07 20:03:44', 'Visible'),
(18, 1, 16, '2016-11-07 20:03:38', '2016-11-07 20:03:50', 'Visible'),
(25, 2, 2, '2016-11-08 13:39:11', '2016-11-08 15:05:49', 'Visible'),
(26, 1, 6, '2016-11-08 13:41:43', '2016-11-08 17:06:53', 'Visible'),
(27, 1, 2, '2016-11-08 15:18:21', '2016-11-08 17:06:52', 'Visible'),
(28, 1, 3, '2016-11-08 15:19:04', '2016-11-08 17:06:52', 'Visible'),
(29, 1, 15, '2016-11-08 15:32:56', '2016-11-08 17:06:51', 'Visible'),
(31, 2, 4, '2016-11-08 16:46:17', '2016-11-08 17:06:50', 'Visible'),
(32, 1, 7, '2016-11-08 16:50:56', '2016-11-08 17:06:49', 'Visible'),
(33, 3, 10, '2016-11-08 16:54:02', '2016-11-08 17:06:48', 'Visible'),
(35, 1, 8, '2016-11-08 17:01:48', '2016-11-08 17:06:47', 'Visible'),
(36, 1, 11, '2016-11-08 17:02:01', '2016-11-08 17:06:53', 'Visible'),
(37, 3, 14, '2016-11-08 17:00:00', '2016-11-08 20:00:00', 'Visible'),
(41, 1, 2, '2016-11-08 17:11:05', '2016-11-09 19:24:05', 'Visible'),
(43, 1, 2, '2016-11-18 18:06:31', '2016-11-18 18:06:35', 'Visible'),
(45, 1, 1, '2016-11-01 08:00:00', '2016-11-02 08:00:00', 'Visible'),
(46, 1, 2, '2016-11-01 08:00:00', '2016-11-02 08:00:00', 'Visible'),
(47, 1, 2, '2016-10-30 08:00:00', '2016-10-31 08:00:00', 'Visible'),
(48, 2, 1, '2016-11-24 08:00:00', '2016-11-24 08:00:00', 'Visible'),
(49, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Visible'),
(50, 2, 2, '2016-11-22 08:00:00', '2016-11-22 08:00:00', 'Visible'),
(51, 2, 1, '2016-11-22 08:00:00', '2016-11-22 08:00:00', 'Visible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos`
--

CREATE TABLE `tbl_tipos` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(12) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pwd` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `usu_categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `usu_estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usu_id`, `usu_usuario`, `usu_pwd`, `usu_categoria`, `usu_estado`) VALUES
(1, 'david.marin', '1234', 'profesor', 'inactivo'),
(2, 'sergio.jimenez', '1234', 'profesor', 'activo'),
(3, 'agnes.plans', 'admin', 'administrador', 'activo'),
(4, 'ignasi.romero', '1234', 'profesor', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`res_id`);

--
-- Indices de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `rec_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
