-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-07-2021 a las 21:58:10
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaPSE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `codigo` int(10) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`codigo`, `nombre`) VALUES
(0, 'A continuación seleccione su banco'),
(1001, 'BANCO DE BOGOTA DESARROLLO 2013'),
(1002, 'BANCO POPULAR'),
(1004, 'Banco union Colombia Credito'),
(1005, 'BANCO UNION COLOMBIANO FD2'),
(1006, 'ITAU'),
(1007, 'BANCOLOMBIA QA'),
(1009, 'CITIBANK COLOMBIA S.A.'),
(1010, 'BANCO GNB COLOMBIA (ANTES HSBC)'),
(1012, 'BANCO GNB SUDAMERIS'),
(1013, 'BBVA COLOMBIA S.A.'),
(1019, 'SCOTIABANK COLPATRIA DESARROLLO'),
(1022, 'BANCO UNION COLOMBIANO'),
(1023, 'BANCO DE OCCIDENTE'),
(1032, 'BANCO CAJA SOCIAL DESARROLLO'),
(1035, 'BANCO TEQUENDAMA'),
(1039, 'BANCO DE BOGOTA'),
(1040, 'BANCO AGRARIO'),
(1051, 'BANCO DAVIVIENDA'),
(1052, 'BANCO COMERCIAL AVVILLAS S.A.'),
(1055, 'Banco Web Service ACH WSE 3.0'),
(1058, 'BANCO CREDIFINANCIERA'),
(1059, 'BANCAMIA'),
(1060, 'BANCO PICHINCHA S.A.'),
(1061, 'BANCO COOMEVA S.A. - BANCOOMEVA'),
(1062, 'BANCO FALABELLA'),
(1065, 'BANCO SANTANDER COLOMBIA'),
(1066, 'BANCO COOPERATIVO COOPCENTRAL'),
(1069, 'BANCO SERFINANZA'),
(1077, 'BANKA'),
(1078, 'SCOTIABANK COLPATRIA UAT'),
(1080, 'BANCO AGRARIO QA DEFECTOS'),
(1081, 'BANCO AGRARIO DESARROLLO'),
(1097, 'DALE'),
(1101, 'Banco PSE'),
(1151, 'RAPPIPAY'),
(1203, 'BANCO PRODUCTOS POR SEPARADO'),
(1283, 'COOPERATIVA FINANCIERA DE ANTIOQUIA'),
(1289, 'COOPERATIVA FINANCIERA COTRAFA'),
(1292, 'CONFIAR COOPERATIVA FINANCIERA'),
(1303, 'GIROS Y FINANZAS COMPAÑIA DE FINANCIAMIENTO S.A'),
(1305, 'SEIVY – GM FINANCIAL'),
(1370, 'COLTEFINANCIERA'),
(1508, 'NEQUI CERTIFICACION'),
(1513, 'BBVA DESARROLLO'),
(1551, 'DAVIPLATA'),
(1552, 'BAN.CO'),
(1558, 'CREDIFIANCIERA'),
(1637, 'IRIS'),
(1801, 'MOVII S.A'),
(9988, 'prueba restriccion'),
(10071, 'BANCOLOMBIA DESARROLLO'),
(10072, 'BANCOLOMBIA DATAPOWER'),
(10322, 'BANCO CAJA SOCIAL'),
(10512, 'BANCO DAVIVIENDA Desarrollo'),
(121212, 'Prueba Steve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Referencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Referencia`, `Descripcion`, `Valor`) VALUES
('D3456778', 'Lenovo TAB4 10', 600000),
('G4354678', 'Huawei Media Pad T5', 560000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Contraseña` varchar(8000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `idUsuario`, `Contraseña`) VALUES
('admin', 1, '$2y$10$gCrTB6k9RjKtjZC6bO5CDeYXoHjymbz94qHSZ3DtEt.NDM3mRngei'),
('admin2', 2, '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Referencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
