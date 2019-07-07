-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2019 a las 11:12:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `brmtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `ClientId` int(11) NOT NULL,
  `ClientName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`ClientId`, `ClientName`) VALUES
(1, 'Pablo'),
(2, 'Pablo'),
(3, 'Pablo'),
(4, 'Pablo'),
(5, 'David'),
(6, 'Andres'),
(7, 'Paola'),
(8, 'dsfsdf'),
(9, 'Lina'),
(10, 'Maria'),
(11, 'Liliana'),
(12, 'fdgfd'),
(13, 'asdsa'),
(14, 'dsfsd'),
(15, ''),
(16, 'dfgfd'),
(17, 'ghjhg'),
(18, 'Pablo'),
(19, 'dsffgfdg'),
(20, 'asdsa'),
(21, 'Sandra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `InvoiceTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`InvoiceId`, `ClientId`, `ProductId`, `InvoiceTotal`) VALUES
(1, 19, 3, 3000),
(2, 20, 3, 3000),
(3, 21, 3, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lot`
--

CREATE TABLE `lot` (
  `LotNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lot`
--

INSERT INTO `lot` (`LotNumber`) VALUES
(0),
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductPrice` double NOT NULL,
  `LotNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `ExpirationDate`, `Quantity`, `ProductPrice`, `LotNumber`) VALUES
(2, 'Proteina', '2019-07-31', 2, 2000, 1),
(3, 'Papas', '2019-07-18', 10, 3000, 1),
(6, 'Proteina', '2019-07-25', 2, 5000, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientId`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD KEY `ClientId` (`ClientId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indices de la tabla `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`LotNumber`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `LotNumber` (`LotNumber`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `ClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`LotNumber`) REFERENCES `lot` (`LotNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
