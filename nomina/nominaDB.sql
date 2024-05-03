-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 17:08:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ID` int(255) NOT NULL,
  `ID-Asistencia` int(255) NOT NULL,
  `Empleado` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora-Entrada` time NOT NULL,
  `Hora-Salida` time NOT NULL,
  `Horas-Trabajadas` time NOT NULL,
  `ID-Empleado` int(255) NOT NULL,
  `Opcion` enum('entrada','salida') NOT NULL DEFAULT 'entrada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ID`, `ID-Asistencia`, `Empleado`, `Fecha`, `Hora-Entrada`, `Hora-Salida`, `Horas-Trabajadas`, `ID-Empleado`, `Opcion`) VALUES
(65, 0, '', '2024-04-17', '15:43:55', '00:00:00', '00:00:00', 1001, 'entrada'),
(66, 0, '', '2024-04-17', '15:52:09', '00:00:00', '00:00:00', 1001, 'entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `id_deduccion` int(11) NOT NULL,
  `nombre_deduccion` varchar(100) NOT NULL,
  `tipo_deduccion` enum('Porcentaje','Monto Fijo') NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`id_deduccion`, `nombre_deduccion`, `tipo_deduccion`, `valor`) VALUES
(1, 'Impuesto sobre la Renta (ISR)', 'Porcentaje', 0.00),
(2, 'Seguro Social (SFS)', 'Monto Fijo', 0.00),
(3, 'Administración de Fondos de Pensiones (AFP)', 'Porcentaje', 0.00),
(4, 'Seguro de Salud', 'Monto Fijo', 0.00),
(5, 'Préstamos', 'Monto Fijo', 0.00),
(6, 'Descuentos por Beneficios', 'Monto Fijo', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID` int(255) NOT NULL,
  `ID-Empleado` int(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Genero` varchar(255) NOT NULL,
  `Contacto` varchar(80) NOT NULL,
  `Departamento` varchar(255) NOT NULL,
  `Cargo` varchar(255) NOT NULL,
  `Salario` int(255) NOT NULL,
  `Fecha-Ingreso` date NOT NULL,
  `id_estado_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `ID-Empleado`, `Nombre`, `Apellido`, `Genero`, `Contacto`, `Departamento`, `Cargo`, `Salario`, `Fecha-Ingreso`, `id_estado_empleado`) VALUES
(1, 1001, 'Juan', 'Péreza', 'Masculino', 'Juanpere@gmail.com', 'Ventas', 'Vendedor', 25000, '2024-04-15', 5),
(14, 1002, 'María', 'Rodríguez', 'Femenino', 'Mariarod@gmail.com', 'Recursos Humanos', 'Analista de RRHH', 3000, '2023-02-15', 1),
(15, 1003, 'Hans', 'Lopez', 'Masculino', 'Cirujans@gmail.com', 'Medicina', 'Cirujano Plastico', 500000, '2010-06-23', 1),
(16, 1004, 'Laura', 'Martínez', 'Femenino', 'laura@example.com', 'IT', 'Desarrollador', 4000, '2023-03-05', 3),
(17, 1005, 'David', 'García', 'Masculino', 'david@example.com', 'Finanzas', 'Contador', 3800, '2023-01-20', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_empleados`
--

CREATE TABLE `estados_empleados` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_empleados`
--

INSERT INTO `estados_empleados` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Suspendido'),
(4, 'Despedido'),
(5, 'Jubilado'),
(6, 'En Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `username`, `password`) VALUES
(2, 'admin', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`id_deduccion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_estado_empleado` (`id_estado_empleado`);

--
-- Indices de la tabla `estados_empleados`
--
ALTER TABLE `estados_empleados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `id_deduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estados_empleados`
--
ALTER TABLE `estados_empleados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_estado_empleado`) REFERENCES `estados_empleados` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
