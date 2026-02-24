-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2026 a las 21:01:09
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
-- Base de datos: `kb94`
--
CREATE DATABASE IF NOT EXISTS `kb94` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kb94`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarClientesFrecuentes` ()   BEGIN

SELECT 	ot.idCliente, 
		clientes.nombre, 
        clientes.telefono1, 
        COUNT(ot.idOT) AS concurrencia
FROM ot 
INNER JOIN clientes 
ON ot.idCliente = clientes.idCliente
GROUP BY ot.idCliente
ORDER BY COUNT(ot.idOT) DESC
LIMIT 10
; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarModelosMasIngresados` ()   BEGIN

SELECT 	marcas.marca,
		modelos.modelo,
        COUNT(ot.idModelo) AS veces_ingresadas
FROM ot
INNER JOIN modelos
ON ot.idModelo = modelos.idModelo

INNER JOIN marcas
on modelos.idMarca = marcas.idMarca

GROUP BY modelos.modelo
ORDER BY COUNT(ot.idModelo) DESC
LIMIT 10;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarServicioTecnico` ()   BEGIN

SELECT 	'' AS detalles,
		ot.idOT,
		ot.fechaIngreso,
        ot.idCliente,
        clientes.nombre,
        clientes.telefono1,
        marcas.idMarca,
        marcas.marca,
        ot.idModelo,
        modelos.modelo,
        ot.idTecnico,
        tecnicos.nombre,
        ot.falla,
        ot.observaciones,
        ot.presupuesto,
        ot.fechaCierre,
        ot.fechaEntrega,
        '' AS opciones
        
FROM ot
INNER JOIN clientes on ot.idCliente = clientes.idCliente
INNER JOIN modelos on ot.idModelo = modelos.idModelo
INNER JOIN marcas on modelos.idMarca = marcas.idMarca
INNER JOIN tecnicos on ot.idTecnico = tecnicos.idTecnico

ORDER BY ot.idOT DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerDatosDashboard` ()   BEGIN
DECLARE totalingresos int;
DECLARE totalpresupuestados int;
DECLARE totalcerrados int;
DECLARE totalentregados int;
DECLARE totalganancias float;
DECLARE totalclientes int;

SET totalingresos = (SELECT count(fechaingreso) FROM ot);
SET totalpresupuestados = (SELECT COUNT(presupuesto) FROM ot);
SET totalcerrados = (SELECT COUNT(fechaCierre) FROM ot);
SET totalentregados = (SELECT COUNT(fechaEntrega) FROM ot);
SET totalganancias = (SELECT SUM(importe) FROM movimientos);
SET totalclientes = (SELECT COUNT(nombre) FROM clientes);

SELECT 	ifnull(totalingresos,0) AS totalingresos,
		ifnull(totalpresupuestados,0) AS totalpresupuestados,
        ifnull(totalcerrados,0) AS totalcerrados,
        ifnull(totalentregados,0) AS totalentregados,
        ifnull(round(totalganancias,2),0) AS totalganancias,
        ifnull(totalclientes,0) AS totalclientes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerVentasMesActual` ()   BEGIN

SELECT 	movimientos.fechaMovi AS fecha_venta,
		SUM(round(movimientos.importe,2)) AS total_venta
FROM movimientos
WHERE date(movimientos.fechaMovi) >= date(last_day(now() - INTERVAL 1 month) + INTERVAL 1 day)
AND
date(movimientos.fechaMovi) <= last_day(date(CURRENT_DATE))
GROUP BY movimientos.fechaMovi;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `telefono1` varchar(15) DEFAULT NULL,
  `telefono2` varchar(15) DEFAULT NULL,
  `dni` int(9) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_cp` (`cp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `cp`, `telefono1`, `telefono2`, `dni`) VALUES
(1, 'Marta Leiva', 342, '3415987654', '1234', 756),
(3, 'Jonathan Perez', 2000, '3415987654', '576', 543),
(4, 'Martina Alegre', 2000, '3410303456', '0303', 846),
(5, 'Macarena oliva', 2000, '3415972926', '', 0),
(6, 'Macarena Oliva Olmos', 2000, '0303456', '977656', 0),
(7, 'Troncha Toro', 2152, '', '', 6666),
(8, 'Roberto Ruben', 2152, '', '', 0),
(9, 'maria antoñeta', 2152, 'la ñeta', 'esto esta mal', 0),
(10, 'maria isabel', 2152, 'asd', 'asdasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `cp` int(4) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  PRIMARY KEY (`cp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`cp`, `localidad`) VALUES
(342, 'Santa Fe'),
(2000, 'Rosario'),
(2126, 'Pueblo Ester'),
(2152, 'Granadero Baigorria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(25) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `marca`) VALUES
(1, 'Samsung'),
(2, 'Motorola'),
(3, 'Xiaomi'),
(4, 'Iphone'),
(5, 'Lenovo'),
(6, 'Kodak'),
(7, 'ZTE'),
(8, 'HTC'),
(9, 'OPPO'),
(10, 'Generico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `idModelo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelo` varchar(25) NOT NULL,
  `idMarca` int(11) NOT NULL,
  PRIMARY KEY (`idModelo`),
  KEY `id_marca` (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`idModelo`, `modelo`, `idMarca`) VALUES
(9, 'G84 5g', 2),
(10, '6g', 4),
(11, '7p', 4),
(12, 'J7 (j700)', 1),
(13, 'J7 Neo (j701)', 1),
(14, 'X', 4),
(15, '11P', 4),
(16, 'X', 2),
(17, 'G24', 2),
(18, 'G22', 2),
(19, 'XS', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `idMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fechaMovi` date NOT NULL,
  `idOT` int(8) UNSIGNED DEFAULT NULL,
  `idTipoMovi` int(11) UNSIGNED NOT NULL,
  `importe` decimal(18,2) NOT NULL,
  `detalle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMovimiento`),
  KEY `fk_tipomovimiento` (`idTipoMovi`),
  KEY `fk_ot` (`idOT`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idMovimiento`, `fechaMovi`, `idOT`, `idTipoMovi`, `importe`, `detalle`) VALUES
(1, '2024-10-21', 3, 1, 8000.00, NULL),
(2, '2024-10-21', NULL, 1, -3500.50, 'comida'),
(3, '2024-10-22', NULL, 1, 1500.00, 'Templado'),
(4, '2025-09-25', 6, 2, 67776.00, '+temp'),
(5, '2026-02-01', 3, 2, 13000.00, NULL),
(6, '2026-02-01', 3, 2, 13000.00, 'seña'),
(7, '2026-02-22', NULL, 1, 0.00, 'pa la coca'),
(8, '2026-02-22', NULL, 1, 0.00, 'pa la coca'),
(9, '2026-02-22', NULL, 1, 0.00, '4'),
(10, '2026-02-22', NULL, 1, 0.00, ''),
(12, '2026-02-21', NULL, 2, -50000.00, 'Alquiler'),
(13, '2026-02-22', NULL, 1, 11.00, 'Efectivo'),
(14, '2026-02-22', NULL, 2, 222.00, 'Alvaro Transferencia'),
(15, '2026-02-22', NULL, 3, 333.00, 'Claudio Transferencia'),
(16, '2026-02-23', NULL, 1, -900.00, 'Galletas'),
(17, '2026-02-23', 8, 2, 1500.00, 'seña'),
(18, '2026-02-23', 9, 3, 250.00, 'Cobro de reparación OT #9'),
(19, '2026-02-24', 5, 3, 28000.00, 'Cobro de reparación OT #5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ot`
--

CREATE TABLE IF NOT EXISTS `ot` (
  `idOT` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fechaIngreso` date NOT NULL,
  `idCliente` int(8) UNSIGNED NOT NULL,
  `idTecnico` int(8) UNSIGNED NOT NULL,
  `idModelo` int(10) UNSIGNED NOT NULL,
  `falla` varchar(130) NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `presupuesto` decimal(18,2) DEFAULT NULL,
  `fechaCierre` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  PRIMARY KEY (`idOT`),
  KEY `fk_tecnico` (`idTecnico`),
  KEY `fk_cliente` (`idCliente`),
  KEY `fk_modelo` (`idModelo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ot`
--

INSERT INTO `ot` (`idOT`, `fechaIngreso`, `idCliente`, `idTecnico`, `idModelo`, `falla`, `observaciones`, `presupuesto`, `fechaCierre`, `fechaEntrega`) VALUES
(1, '2024-10-20', 1, 1, 13, 'Falla al cargar', 'Deja cargador', NULL, NULL, NULL),
(2, '2024-10-20', 3, 2, 9, 'Esta frase contiene exactamente ciento treinta caracteres para que puedas verificar la capacidad de tu columna en la base de datos', 'Esta cadena de texto fue diseñada específicamente para llegar a los doscientos caracteres de extensión. Sirve para verificar que el almacenamiento de datos sea correcto y no se corte el contenido.', 35000.00, '2026-01-28', NULL),
(3, '2024-10-20', 3, 3, 14, 'Falla al cargar', 'carga lenta', 5000.00, NULL, NULL),
(4, '2024-10-26', 1, 1, 9, 'No enciende', 'R:AbananadoT:placa doblada', 9.09, NULL, NULL),
(5, '2024-10-25', 1, 2, 13, 'modulo ', 'x', 38000.00, '2024-10-25', '2025-02-04'),
(6, '2025-09-25', 3, 1, 11, 'aplastado', 'doblado', 34443.00, '2025-09-26', NULL),
(7, '2026-01-29', 4, 3, 14, 'manchas en pantalla', 'olor raro', 20000.00, '2026-01-26', NULL),
(8, '2026-01-29', 4, 1, 9, 'anda pero no prende ', 'qsy lala qq', 5.00, NULL, NULL),
(9, '2026-02-21', 3, 2, 13, 'Presup gral', 'chequeo gral', 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `idTecnico` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`idTecnico`, `nombre`) VALUES
(1, 'Alvaro'),
(2, 'Claudio'),
(3, 'Combinado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimientos`
--

CREATE TABLE IF NOT EXISTS `tipomovimientos` (
  `idTipoMovi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcionMovi` varchar(40) NOT NULL,
  PRIMARY KEY (`idTipoMovi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipomovimientos`
--

INSERT INTO `tipomovimientos` (`idTipoMovi`, `descripcionMovi`) VALUES
(1, 'Efectivo'),
(2, 'Transferencia (A)'),
(3, 'Transferencia (C)');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cp` FOREIGN KEY (`cp`) REFERENCES `localidades` (`cp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `id_marca` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_ot` FOREIGN KEY (`idOT`) REFERENCES `ot` (`idOT`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipomovimiento` FOREIGN KEY (`idTipoMovi`) REFERENCES `tipomovimientos` (`idTipoMovi`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ot`
--
ALTER TABLE `ot`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`idModelo`) REFERENCES `modelos` (`idModelo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tecnico` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`idTecnico`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
