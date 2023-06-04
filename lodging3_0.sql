-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 04-06-2023 a las 00:07:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lodging3.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL,
  `Nro_Documento` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Genero` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Nro_Documento`, `Nombre`, `Apellido`, `Telefono`, `Genero`) VALUES
(14, 1, 'Abigail', 'Ducuara', 35423525, 'F'),
(15, 8, 'Ruben', 'Lozano', 3241567, 'M'),
(16, 9, 'Pedro', 'Lopez', 2147483647, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `Nro_Factura` int(11) NOT NULL,
  `Nro_servicio` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `valor_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`Nro_Factura`, `Nro_servicio`, `descripcion`, `valor_total`) VALUES
(1002, 3, 'Lavandería durante la estancia', 40),
(1003, 4, 'Acceso al gimnasio durante la estancia', 20),
(1004, 5, 'Traslado al aeropuerto', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Nro_empleado` int(11) NOT NULL,
  `Nro_Documento` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `sueldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Nro_empleado`, `Nro_Documento`, `nombre`, `cargo`, `sueldo`) VALUES
(2, 2, 'Maria', 'Conserje', 1800),
(3, 3, 'Pedro', 'Camarero', 1500),
(4, 4, 'Luisa', 'Mantenimiento', 1600),
(5, 5, 'Carlos', 'Gerente', 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_habitacion`
--

CREATE TABLE `estado_habitacion` (
  `Id_EstadoHabitacion` int(11) NOT NULL,
  `Disponibilidad` varchar(50) NOT NULL,
  `Nro_Habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_habitacion`
--

INSERT INTO `estado_habitacion` (`Id_EstadoHabitacion`, `Disponibilidad`, `Nro_Habitacion`) VALUES
(1, 'Disponible', 101),
(2, 'Ocupada', 102),
(3, 'Mantenimiento', 103),
(4, 'Reservada', 104),
(5, 'Fuera de servicio', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `Nro_Factura` int(11) NOT NULL,
  `Nro_reserva` int(11) NOT NULL,
  `Fecha_factura` date NOT NULL,
  `Total_pagar` float NOT NULL,
  `Id_Metodo_Pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`Nro_Factura`, `Nro_reserva`, `Fecha_factura`, `Total_pagar`, `Id_Metodo_Pago`) VALUES
(1002, 2, '2023-01-02', 200, 2),
(1003, 3, '2023-01-03', 120, 3),
(1004, 4, '2023-01-04', 180, 4),
(1005, 5, '2023-01-05', 250, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `Nro_Habitacion` int(11) NOT NULL,
  `Id_Tipohabitacion` int(11) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`Nro_Habitacion`, `Id_Tipohabitacion`, `Capacidad`, `Costo`) VALUES
(101, 1, 1, 80),
(102, 2, 2, 120),
(103, 3, 2, 140),
(104, 4, 2, 180),
(105, 5, 4, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_actualizaciones`
--

CREATE TABLE `historial_actualizaciones` (
  `Nro_Documento` int(11) NOT NULL,
  `Fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `Id_Metodo_Pago` int(11) NOT NULL,
  `Tipo_pago` varchar(50) NOT NULL,
  `Nro_Factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`Id_Metodo_Pago`, `Tipo_pago`, `Nro_Factura`) VALUES
(1, 'Tarjeta de crédito', 1001),
(2, 'Efectivo', 1002),
(3, 'Transferencia bancaria', 1003),
(4, 'PayPal', 1004),
(5, 'Cheque', 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Nro_reserva` int(11) NOT NULL,
  `Nro_Documento` int(11) NOT NULL,
  `Nro_Habitacion` int(11) NOT NULL,
  `Estado_Reserva` varchar(50) NOT NULL,
  `Fecha_Reserva` date NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `Alojamiento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`Nro_reserva`, `Nro_Documento`, `Nro_Habitacion`, `Estado_Reserva`, `Fecha_Reserva`, `Fecha_Ingreso`, `Fecha_Salida`, `Alojamiento`) VALUES
(2, 2, 102, 'Confirmada', '2023-01-02', '2023-01-06', '2023-01-10', 'Hotel ABC'),
(3, 3, 103, 'Pendiente', '2023-01-03', '2023-01-07', '2023-01-09', 'Hotel ABC'),
(4, 4, 104, 'Cancelada', '2023-01-04', '2023-01-08', '2023-01-12', 'Hotel ABC'),
(5, 5, 105, 'Confirmada', '2023-01-05', '2023-01-09', '2023-01-11', 'Hotel ABC');

--
-- Disparadores `reserva`
--
DELIMITER $$
CREATE TRIGGER `reserva_insert_a` AFTER INSERT ON `reserva` FOR EACH ROW BEGIN
    UPDATE Usuario
    SET Fecha_registro = NOW()
    WHERE Nro_Documento = NEW.Nro_Documento;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Nro_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `Valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Nro_servicio`, `nombre_servicio`, `Valor`) VALUES
(1, 'Servicio de habitación', 50),
(2, 'Desayuno buffet', 15),
(3, 'Lavandería', 20),
(4, 'Gimnasio', 10),
(5, 'Traslado al aeropuerto', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `Id_Tipohabitacion` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`Id_Tipohabitacion`, `Tipo`, `Descripcion`) VALUES
(1, 'Individual', 'Habitación individual con una cama individual'),
(2, 'Doble', 'Habitación doble con dos camas individuales'),
(3, 'Matrimonial', 'Habitación con una cama matrimonial'),
(4, 'Suite', 'Suite con sala de estar y dormitorio'),
(5, 'Familiar', 'Habitación familiar con varias camas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nro_Documento` int(11) NOT NULL,
  `Numero` varchar(30) NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Fecha_restablecimiento` date NOT NULL,
  `Fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nro_Documento`, `Numero`, `Calle`, `Telefono`, `Email`, `Contraseña`, `Fecha_restablecimiento`, `Fecha_registro`) VALUES
(1, '12345678', 'Calle Principal', 123456789, 'Juan1@gmail.com', 'djfk1', '2023-01-01', '2023-01-01'),
(2, '23456789', 'Calle Secundaria', 987654321, 'Maria2@gmail.com', 'yu342', '2023-01-01', '2023-01-01'),
(3, '34567890', 'Calle Central', 567891234, 'Pedro3@gmail.com', 'kdl*34', '2023-01-01', '2023-01-01'),
(4, '45678901', 'Calle Principal', 246813579, 'Luisa4@gmail.com', 'jkhhj', '2023-01-01', '2023-01-01'),
(5, '56789012', 'Calle Secundaria', 135792468, 'Carlos5@gmail.com', 'ewgq*23', '2023-01-01', '2023-01-01'),
(6, '0015677', 'Calle Principal B', 987654321, 'Luis1@example.com', 'cueir9*', '2023-05-01', '2023-05-01'),
(7, '0024567', 'Avenida Secundaria A', 123456789, 'Jorge2@example.com', 'cjfd*', '2023-05-01', '2023-05-01'),
(8, '8976798', 'principal', 345678, 'ikl@gmail.com', '231.*', '2022-04-07', '2023-05-10'),
(9, '345678', 'principal', 23456787, 'lu@gmail.com', '231.*', '2022-03-02', '2023-05-27');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `after_usuario_update` AFTER UPDATE ON `usuario` FOR EACH ROW BEGIN
    INSERT INTO Historial_Actualizaciones (Nro_Documento, Fecha_actualizacion)
    VALUES (OLD.Nro_Documento, NOW());
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Nro_Documento` (`Nro_Documento`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `Nro_servicio` (`Nro_servicio`),
  ADD KEY `FK_Detalle_Factura_Facturacion` (`Nro_Factura`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Nro_empleado`),
  ADD KEY `Nro_Documento` (`Nro_Documento`);

--
-- Indices de la tabla `estado_habitacion`
--
ALTER TABLE `estado_habitacion`
  ADD PRIMARY KEY (`Id_EstadoHabitacion`),
  ADD KEY `Nro_Habitacion` (`Nro_Habitacion`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`Nro_Factura`),
  ADD KEY `Id_Metodo_Pago` (`Id_Metodo_Pago`),
  ADD KEY `FK_Facturacion_Reserva` (`Nro_reserva`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`Nro_Habitacion`),
  ADD KEY `Id_Tipohabitacion` (`Id_Tipohabitacion`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`Id_Metodo_Pago`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Nro_reserva`),
  ADD KEY `FK_Reserva_Usuario` (`Nro_Documento`),
  ADD KEY `FK_Reserva_Habitacion` (`Nro_Habitacion`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Nro_servicio`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`Id_Tipohabitacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Nro_Documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Nro_Documento`) REFERENCES `usuario` (`Nro_Documento`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `FK_Detalle_Factura_Facturacion` FOREIGN KEY (`Nro_Factura`) REFERENCES `facturacion` (`Nro_Factura`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`Nro_Factura`) REFERENCES `facturacion` (`Nro_Factura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`Nro_servicio`) REFERENCES `servicio` (`Nro_servicio`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Nro_Documento`) REFERENCES `usuario` (`Nro_Documento`);

--
-- Filtros para la tabla `estado_habitacion`
--
ALTER TABLE `estado_habitacion`
  ADD CONSTRAINT `estado_habitacion_ibfk_1` FOREIGN KEY (`Nro_Habitacion`) REFERENCES `habitacion` (`Nro_Habitacion`);

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `FK_Facturacion_Reserva` FOREIGN KEY (`Nro_reserva`) REFERENCES `reserva` (`Nro_reserva`) ON DELETE CASCADE,
  ADD CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`Nro_reserva`) REFERENCES `reserva` (`Nro_reserva`),
  ADD CONSTRAINT `facturacion_ibfk_2` FOREIGN KEY (`Id_Metodo_Pago`) REFERENCES `metodo_pago` (`Id_Metodo_Pago`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`Id_Tipohabitacion`) REFERENCES `tipo_habitacion` (`Id_Tipohabitacion`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_Reserva_Habitacion` FOREIGN KEY (`Nro_Habitacion`) REFERENCES `habitacion` (`Nro_Habitacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Reserva_Usuario` FOREIGN KEY (`Nro_Documento`) REFERENCES `usuario` (`Nro_Documento`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`Nro_Documento`) REFERENCES `usuario` (`Nro_Documento`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`Nro_Habitacion`) REFERENCES `habitacion` (`Nro_Habitacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
