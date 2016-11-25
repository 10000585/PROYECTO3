-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2016 a las 19:46:40
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
-- Estructura de tabla para la tabla `tbl_incidencias`
--

CREATE TABLE `tbl_incidencias` (
  `inc_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `inc_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `inc_estado` varchar(12) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `rec_id` int(3) NOT NULL,
  `rec_nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `rec_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `rec_foto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rec_estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Disponible',
  `tip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`rec_id`, `rec_nombre`, `rec_descripcion`, `rec_foto`, `rec_estado`, `tip_id`) VALUES
(1, 'Aula Teoria', 'Aula planta primera. Aforo 25 personas.', '01.png', 'Disponible', 0),
(2, 'Aula Teoria', 'Aula planta segunda. Aforo 35 personas.', '02.png', 'Disponible', 0),
(3, 'Aula Teoria', 'Aula planta tercera. Aforo 25 personas.', '03.png', 'Disponible', 0),
(4, 'Aula Teoria', 'Aula planta cuarta. Aforo 30 personas.', '04.png', 'Disponible', 0),
(5, 'Aula Informatica', 'Aula planta primera. Aforo 15 personas.', '05.png', 'Disponible', 0),
(6, 'Aula Informatica', 'Aula planta segunda. Aforo 30 personas.', '06.png', 'Disponible', 0),
(7, 'Despacho Entrevista', 'Despacho 1. Individual.', '07.png', 'Disponible', 0),
(8, 'Despacho Entrevista', 'Despacho 2. Compartido.', '08.png', 'Disponible', 0),
(9, 'Sala de Reuniones', 'Planta baja. Tiene proyector y aforo de 20 personas.', '09.png', 'Disponible', 0),
(10, 'Proyector', 'Proyector de LCD', '10.png', 'Disponible', 0),
(11, 'Carro portatiles', 'Contiene 10 portatiles DELL i7', '11.png', 'Disponible', 0),
(12, 'Portatil', 'Thosiba Satellite P50', '12.png', 'Disponible', 0),
(13, 'Portatil', 'HP Pavilion 15 Notebook PC', '13.png', 'Disponible', 0),
(14, 'Portatil', 'Asus UX31E', '14.png', 'Disponible', 0),
(15, 'Movil', 'Nokia 5310 (Contiene el juego de la serpiente).', '15.png', 'Disponible', 0),
(16, 'Movil', 'ONE Plus 2 (Candy Crush integrado)', '16.png', 'Disponible', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `res_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `res_finicio` datetime NOT NULL,
  `res_ffin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`res_id`, `usu_id`, `rec_id`, `res_finicio`, `res_ffin`) VALUES
(3, 1, 1, '2016-11-07 18:19:28', '2016-11-07 18:26:04'),
(4, 1, 2, '2016-11-07 17:50:32', '2016-11-07 18:05:06'),
(5, 1, 3, '2016-11-07 17:29:36', '2016-11-07 18:30:41'),
(6, 1, 4, '2016-11-07 17:29:46', '2016-11-07 18:34:12'),
(7, 1, 9, '2016-11-07 18:24:45', '2016-11-07 18:28:14'),
(8, 1, 6, '2016-11-07 18:29:48', '2016-11-07 18:36:57'),
(9, 1, 7, '2016-11-07 18:29:54', '2016-11-07 18:37:30'),
(10, 1, 1, '2016-11-07 18:38:48', '2016-11-07 18:38:53'),
(11, 1, 1, '2016-11-07 19:47:57', '2016-11-07 19:48:07'),
(12, 1, 1, '2016-11-07 19:49:58', '2016-11-07 19:50:27'),
(13, 1, 2, '2016-11-07 19:52:06', '2016-11-07 19:52:09'),
(14, 1, 16, '2016-11-07 19:52:23', '2016-11-07 19:55:10'),
(15, 1, 15, '2016-11-07 20:00:01', '2016-11-07 20:01:40'),
(16, 1, 13, '2016-11-07 20:01:05', '2016-11-08 17:06:44'),
(17, 1, 15, '2016-11-07 20:03:35', '2016-11-07 20:03:44'),
(18, 1, 16, '2016-11-07 20:03:38', '2016-11-07 20:03:50'),
(19, 2, 1, '2016-11-08 00:00:00', '2016-11-08 16:56:03'),
(21, 1, 1, '2016-11-08 13:32:58', '2016-11-08 17:06:46'),
(22, 1, 1, '2016-11-08 13:33:10', '2016-11-08 17:06:56'),
(23, 1, 1, '2016-11-08 13:34:20', '2016-11-08 17:06:55'),
(24, 1, 1, '2016-11-08 13:37:52', '2016-11-08 17:06:54'),
(25, 1, 2, '2016-11-08 13:39:11', '2016-11-08 15:05:49'),
(26, 1, 6, '2016-11-08 13:41:43', '2016-11-08 17:06:53'),
(27, 1, 2, '2016-11-08 15:18:21', '2016-11-08 17:06:52'),
(28, 1, 3, '2016-11-08 15:19:04', '2016-11-08 17:06:52'),
(29, 1, 15, '2016-11-08 15:32:56', '2016-11-08 17:06:51'),
(30, 1, 1, '2016-11-08 15:34:07', '2016-11-08 17:06:50'),
(31, 1, 4, '2016-11-08 16:46:17', '2016-11-08 17:06:50'),
(32, 1, 7, '2016-11-08 16:50:56', '2016-11-08 17:06:49'),
(33, 1, 10, '2016-11-08 16:54:02', '2016-11-08 17:06:48'),
(34, 1, 1, '2016-11-08 16:56:09', '2016-11-08 17:06:47'),
(35, 1, 8, '2016-11-08 17:01:48', '2016-11-08 17:06:47'),
(36, 1, 11, '2016-11-08 17:02:01', '2016-11-08 17:06:53'),
(37, 1, 14, '2016-11-08 17:02:50', '2016-11-08 17:06:45'),
(38, 1, 1, '2016-11-08 17:07:01', '2016-11-08 17:08:46'),
(39, 2, 1, '2016-11-08 17:09:08', '2016-11-08 17:09:16'),
(40, 2, 1, '2016-11-08 17:10:47', '2016-11-09 19:24:28'),
(41, 1, 2, '2016-11-08 17:11:05', '2016-11-09 19:24:05');

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
  `usu_categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usu_id`, `usu_usuario`, `usu_pwd`, `usu_categoria`) VALUES
(1, 'david.marin', '1234', 'profesor'),
(2, 'sergio.jimenez', '12345', 'profesor'),
(3, 'agnes.plans', 'admin', 'administrador'),
(4, 'ignasi.romero', '123456', 'profesor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD PRIMARY KEY (`inc_id`);

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
-- AUTO_INCREMENT de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `rec_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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
