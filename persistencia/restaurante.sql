-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2020 a las 04:05:32
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Diego', 'Machado', '100@100.com', 'f899139df5e1059396431415e770c6dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chef`
--

CREATE TABLE `chef` (
  `idchef` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tarjetaprofesional` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chef`
--

INSERT INTO `chef` (`idchef`, `nombre`, `apellido`, `correo`, `clave`, `tarjetaprofesional`) VALUES
(1, 'Ferran', 'Adrià', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b', '123'),
(2, 'Gordon', 'Ramsay', '2@2.com', 'c81e728d9d4c2f636f067f89cc14862c', '456'),
(3, 'Alain', 'Ducasse', '3@3.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `cedula` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `cedula`) VALUES
(1, 'Pedro', 'Picapiedra', '10@10.com', 'd3d9446802a44259755d38e6d163e820', 1, 123),
(2, 'Pantera', 'Rosa', '20@20.com', '98f13708210194c475687be6106a3b84', 0, 456),
(3, 'Goku', 'Fernandez', '30@30.com', '34173cb38f07f89ddbebc2ac9128303f', 0, 789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `montoFinal` double NOT NULL,
  `pedido_idpedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `montoFinal`, `pedido_idpedido`) VALUES
(1, 37000, 1),
(2, 37000, 1),
(3, 60000, 2),
(4, 60000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `numero_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`idmesa`, `nombre`, `numero_personas`) VALUES
(1, 'Mesa 1', 2),
(2, 'Mesa 2', 4),
(3, 'Mesa 3', 8),
(4, 'Mesa 4', 12),
(5, 'Mesa 5', 2),
(6, 'Mesa 6', 4),
(7, 'Mesa 7', 8),
(8, 'Mesa 8', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `reserva_idreserva` int(11) NOT NULL,
  `chef_idchef` int(11) DEFAULT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `reserva_idreserva`, `chef_idchef`, `estado`) VALUES
(1, 1, 1, '1'),
(2, 2, 2, '1'),
(3, 4, 2, '1'),
(4, 5, 3, '1'),
(5, 6, 1, '1'),
(6, 7, 1, '1'),
(7, 8, 2, '1'),
(8, 9, 3, '1'),
(9, 10, 1, '1'),
(10, 11, 1, '1'),
(11, 12, 2, '1'),
(12, 13, 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_plato`
--

CREATE TABLE `pedido_plato` (
  `Pedido_idpedido` int(11) NOT NULL,
  `Plato_idplato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_plato`
--

INSERT INTO `pedido_plato` (`Pedido_idpedido`, `Plato_idplato`, `cantidad`, `descripcion`) VALUES
(1, 2, 2, 'sin cilantro'),
(1, 4, 2, 'sin descripcion'),
(2, 1, 3, 'sin platano'),
(3, 3, 3, 'sin tomillo'),
(4, 4, 4, 'sin descripcion'),
(5, 1, 2, 'sin papa'),
(6, 2, 9, 'sin descripcion'),
(7, 1, 2, 'sin platano'),
(8, 4, 2, 'sin descripcion'),
(9, 3, 4, 'sin cilantro'),
(10, 1, 3, 'sin platano'),
(11, 2, 2, 'sin cilantro'),
(12, 3, 2, 'sin descripcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idplato` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`idplato`, `nombre`, `precio`, `foto`) VALUES
(1, 'Fritanga', '20000', '2532020015820.jpg'),
(2, 'Changua', '10000', '2532020015836.jpg'),
(3, 'Ajiaco', '15000', '2532020015908.jpg'),
(4, 'Tamal', '8500', '2532020015927.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `idrecepcionista` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`idrecepcionista`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Bruce', ' Lee', '1000@1000.com', 'a9b7ba70783b617e9998dc4dd82eb3c5'),
(2, 'Sylvester', 'Stallone', '2000@2000.com', '08f90c1a417155361a5c4b8d297e0d78'),
(3, 'Arnold', 'Schwarzenegger', '3000@3000.com', 'e93028bdc1aacdfb3687181f2031765d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `recepcionista_idrecepcionista` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `hora`, `fecha`, `cliente_idcliente`, `mesa_idmesa`, `recepcionista_idrecepcionista`, `estado`) VALUES
(1, '21:00:00', '2020-03-25', 1, 1, 1, 0),
(2, '16:00:00', '2020-03-26', 1, 2, 3, 0),
(3, '17:00:00', '2020-03-26', 1, 3, 2, 0),
(4, '16:00:00', '2020-03-16', 3, 1, 3, 0),
(5, '17:00:00', '2020-03-16', 2, 3, 1, 0),
(6, '18:00:00', '2020-03-16', 1, 5, 3, 0),
(7, '20:00:00', '2020-03-17', 1, 6, 1, 0),
(8, '20:00:00', '2020-03-17', 2, 7, 2, 0),
(9, '19:00:00', '2020-03-17', 3, 7, 3, 0),
(10, '19:00:00', '2020-03-18', 1, 2, 1, 0),
(11, '21:00:00', '2020-03-19', 1, 5, 1, 0),
(12, '16:00:00', '2020-03-19', 2, 2, 2, 0),
(13, '18:00:00', '2020-03-20', 3, 5, 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`idchef`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `fk_Factura_Pedido1_idx` (`pedido_idpedido`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_Pedido_Reserva1_idx` (`reserva_idreserva`),
  ADD KEY `fk_Pedido_Chef1_idx` (`chef_idchef`);

--
-- Indices de la tabla `pedido_plato`
--
ALTER TABLE `pedido_plato`
  ADD PRIMARY KEY (`Pedido_idpedido`,`Plato_idplato`),
  ADD KEY `fk_Pedido_has_Plato_Plato1_idx` (`Plato_idplato`),
  ADD KEY `fk_Pedido_has_Plato_Pedido1_idx` (`Pedido_idpedido`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`idplato`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`idrecepcionista`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_Reserva_Cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_Reserva_Mesa1_idx` (`mesa_idmesa`),
  ADD KEY `fk_Reserva_Recepcionista1_idx` (`recepcionista_idrecepcionista`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `chef`
--
ALTER TABLE `chef`
  MODIFY `idchef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  MODIFY `idrecepcionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_Pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Chef1` FOREIGN KEY (`chef_idchef`) REFERENCES `chef` (`idchef`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_Reserva1` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_plato`
--
ALTER TABLE `pedido_plato`
  ADD CONSTRAINT `fk_Pedido_has_Plato_Pedido1` FOREIGN KEY (`Pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_has_Plato_Plato1` FOREIGN KEY (`Plato_idplato`) REFERENCES `plato` (`idplato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Recepcionista1` FOREIGN KEY (`recepcionista_idrecepcionista`) REFERENCES `recepcionista` (`idrecepcionista`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
