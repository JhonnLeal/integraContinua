-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 01:49:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citasmedicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestra_especialidad`
--

CREATE TABLE `maestra_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maestra_especialidad`
--

INSERT INTO `maestra_especialidad` (`id_especialidad`, `nombre_especialidad`, `estado`) VALUES
(1, 'Medico general', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestra_roll`
--

CREATE TABLE `maestra_roll` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maestra_roll`
--

INSERT INTO `maestra_roll` (`idRol`, `nombreRol`, `estado`) VALUES
(1, 'Cotizante', 1),
(2, 'Beneficiario', 1),
(3, 'Independiente', 1),
(4, 'Administrador', 1),
(5, 'Medico', 1),
(6, 'Asistente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(11) NOT NULL,
  `nombreP` varchar(255) DEFAULT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `emailP` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `tipoDocP` varchar(255) DEFAULT NULL,
  `numeroDocP` varchar(255) DEFAULT NULL,
  `tipoP` varchar(255) DEFAULT NULL,
  `telefonoP` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nombreP`, `apellidoP`, `direccion`, `emailP`, `fechaNacimiento`, `genero`, `tipoDocP`, `numeroDocP`, `tipoP`, `telefonoP`, `password`, `fechaCreacion`, `estado`) VALUES
(1, 'Beto', 'Pardo', 'calle falsa 123', 'Beto@correo.com', '1999-04-22', '2', '1', '1234567', '1', '123456', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2025-05-23 04:24:56', 1),
(2, 'Juan', 'Perez', 'calle falsa 123', 'juanperez@correo.com', '1978-04-22', '2', '4', '1234568', '5', '123456', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2025-05-23 04:24:56', 1),
(3, 'ana', 'gomez', 'calle falsa 123', 'ana@correo.com', '1980-04-23', '1', '1', '1234569', '4', '123456', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2025-05-23 04:24:56', 1),
(4, 'james', 'izquierdo', 'Calle Falsa 123', 'james@correo.com', '1980-04-28', '2', '1', '123456789', '1', '123456', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2025-05-23 04:24:56', 1),
(5, 'alicia', 'contreras', 'Calle Falsa 123', 'alicia@correo.com', '1990-04-29', '1', '1', '789666555', '3', '123456', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2025-05-23 04:24:56', 1);

--
-- Disparadores `pacientes`
--
DELIMITER $$
CREATE TRIGGER `tr_insertar_permiso_paciente` AFTER INSERT ON `pacientes` FOR EACH ROW BEGIN
    -- Verificar si el tipoP es menor o igual a 3
    IF NEW.tipoP <= 3 THEN
        -- Insertar en la tabla usuario_permiso
        INSERT INTO usuario_permiso (idusuario, idpermiso)
        VALUES (NEW.idpaciente, 2);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'escritorio'),
(2, 'citas'),
(3, 'consultas'),
(4, 'historiaClinica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(1, 1, 1),
(3, 3, 2),
(4, 2, 4),
(5, 4, 4),
(6, 5, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `maestra_especialidad`
--
ALTER TABLE `maestra_especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `maestra_roll`
--
ALTER TABLE `maestra_roll`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `maestra_especialidad`
--
ALTER TABLE `maestra_especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maestra_roll`
--
ALTER TABLE `maestra_roll`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
