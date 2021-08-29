-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-03-2021 a las 15:38:53
-- Versión del servidor: 10.4.14-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u727057842_sacvadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_compras`
--

CREATE TABLE `abono_compras` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_plansepare`
--

CREATE TABLE `abono_plansepare` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_venta`
--

CREATE TABLE `abono_venta` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abono_venta`
--

INSERT INTO `abono_venta` (`id`, `id_sucursal`, `id_factura`, `valor`, `descripcion`, `fecha`) VALUES
(1, 1, 2, 50000, 'abono plan separe', '2021-02-05'),
(2, 1, 2, 310000, 'cancela factura', '2021-02-06'),
(4, 1, 102, 200000, 'Cuota Inicial', '2021-02-22'),
(5, 1, 102, 180000, '', '2021-02-26'),
(6, 1, 231, 80000, 'Primer Abono ', '2021-03-03'),
(7, 1, 231, 10000, '', '2021-03-06'),
(8, 1, 231, 80000, 'abono (sin anotar en factura, no la trajeron) se anoto \r\n', '2021-03-08'),
(9, 1, 231, 20000, '', '2021-03-08'),
(10, 1, 373, 300000, 'cuota inicial ', '2021-03-12'),
(11, 1, 391, 320000, '', '2021-03-13'),
(12, 1, 391, 50000, '', '2021-03-13'),
(13, 1, 231, 20000, '', '2021-03-15'),
(14, 1, 439, 30000, '', '2021-03-17'),
(15, 1, 231, 70000, 'se llevo el equipo ', '2021-03-17'),
(16, 1, 439, 50000, '', '2021-03-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `id_sucursal`, `nombre`) VALUES
(1, 1, 'telefono'),
(2, 1, 'tablet'),
(4, 1, 'reloj'),
(5, 1, 'manos libres'),
(6, 1, 'cargador'),
(7, 1, 'cables'),
(8, 1, 'memoria'),
(9, 1, 'parlante'),
(10, 1, 'reproductor'),
(11, 1, 'diadema'),
(12, 1, 'tdt'),
(13, 1, 'control'),
(14, 1, 'mause'),
(15, 1, 'teclado'),
(16, 1, 'bateria'),
(17, 1, 'mono pop'),
(18, 1, 'protector '),
(19, 1, 'soporte'),
(20, 1, 'diadema'),
(21, 1, 'tripode '),
(22, 1, 'pop shaker'),
(23, 1, 'sim car'),
(24, 1, 'aro'),
(25, 1, 'vidrios'),
(26, 1, 'adaptadores'),
(27, 1, 'exibidores'),
(28, 1, 'cabezote'),
(29, 1, 'bluetooth xiaomi'),
(30, 1, 'radio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `id_sucursal`, `nombre`, `nit`, `direccion`, `departamento`, `ciudad`, `email`, `telefono`) VALUES
(1, 1, 'VENTAS PORMOSTRADOR', '999999999', 'DIR', 'CORDOBA', 'SAHAGUN', 'mostradorl@mostrador.com', '30000000'),
(2, 1, 'CERLI OTERO ', '30576137', 'Cr11 12-30', 'CORDOBA', 'SAHAGUN', '', '3113560972'),
(3, 1, 'ROSELIS SUAREZ', '92542811-7', 'Cr6 18-16', 'CORDOBA', 'SAHAGUN', 'expresscelu833@gmail.com', '3235925796'),
(4, 1, 'CARMEN HOYOS ', '30566307', 'Barrio  San Isidro ', 'CORDOBA', 'SAHAGUN', '', '3235289780'),
(5, 1, 'GENNYS PACHECO', '30565995', 'calle 1-1b ', 'CORDOBA', 'SAHAGUN', '', '3212665096'),
(6, 1, 'ALFREDO MACEA ', '1069505044', 'barrio Benardo Duque ', 'CORDOBA', 'SAHAGUN', '', '3106172110'),
(7, 2, 'MOSTRADOR', '99999999', 'DIR', 'CORDOBA', 'CHINU', 'email@email.com', '7777777'),
(8, 1, 'EDISON GIL MENESES ', '78759993', 'Cr11 12-30', 'CORDOBA', 'SAHAGUN', '', '3023876039');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes_producto`
--

CREATE TABLE `componentes_producto` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalles` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `numero_factura` int(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `tipo` int(255) DEFAULT NULL,
  `plazo` int(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_proveedor` int(255) DEFAULT NULL,
  `detalle_compra` text DEFAULT NULL,
  `sub_total` int(255) DEFAULT NULL,
  `iva` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_sucursal`, `numero_factura`, `fecha`, `hora`, `tipo`, `plazo`, `fecha_vencimiento`, `id_proveedor`, `detalle_compra`, `sub_total`, `iva`, `total`, `saldo`) VALUES
(1, 1, 1120, '2021-02-20', '16:37:05', 0, 0, '2021-02-20', 1, '[{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"2\",\"precio\":\"420000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"840000\"},{\"id\":\"16\",\"codigo\":\"16\",\"descripcion\":\"telefono alcatel 1c\",\"cantidad\":\"2\",\"precio\":\"177000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"354000\"},{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"3\",\"precio\":\"28000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"84000\"},{\"id\":\"301\",\"codigo\":\"300\",\"descripcion\":\"moto g8 power lite\",\"cantidad\":\"1\",\"precio\":\"525000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"525000\"},{\"id\":\"18\",\"codigo\":\"18\",\"descripcion\":\"telefono a01\",\"cantidad\":\"1\",\"precio\":\"355000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"355000\"},{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"precio\":\"230000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"230000\"},{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"precio\":\"315000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"315000\"},{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"telefono spark 6 go 64gb\",\"cantidad\":\"1\",\"precio\":\"380000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"380000\"},{\"id\":\"299\",\"codigo\":\"298\",\"descripcion\":\"parlante mt-03\",\"cantidad\":\"3\",\"precio\":\"35000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"105000\"},{\"id\":\"300\",\"codigo\":\"299\",\"descripcion\":\"parlante f52\",\"cantidad\":\"3\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"135000\"},{\"id\":\"302\",\"codigo\":\"301\",\"descripcion\":\"parlate f686\",\"cantidad\":\"3\",\"precio\":\"42000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"126000\"},{\"id\":\"303\",\"codigo\":\"302\",\"descripcion\":\"parlante mt-285\",\"cantidad\":\"3\",\"precio\":\"15000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"45000\"},{\"id\":\"304\",\"codigo\":\"303\",\"descripcion\":\"parlante jc-222\",\"cantidad\":\"4\",\"precio\":\"50000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"200000\"}]', 0, 0, 3694000, 0),
(2, 1, 1122, '2021-02-20', '17:14:03', 0, 0, '2021-02-20', 1, '[{\"id\":\"305\",\"codigo\":\"304\",\"descripcion\":\"parlante mt-8857\",\"cantidad\":\"5\",\"precio\":\"15000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"75000\"},{\"id\":\"306\",\"codigo\":\"305\",\"descripcion\":\"parlante mt-641\",\"cantidad\":\"2\",\"precio\":\"55000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"110000\"},{\"id\":\"307\",\"codigo\":\"306\",\"descripcion\":\"radio mt-r039bt\",\"cantidad\":\"3\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"135000\"},{\"id\":\"308\",\"codigo\":\"307\",\"descripcion\":\"radio xb-52urt\",\"cantidad\":\"3\",\"precio\":\"30000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"90000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"155\",\"precio\":\"1200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"186000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"83\",\"precio\":\"600\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"49800\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"30\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"126000\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"wash case\",\"cantidad\":\"74\",\"precio\":\"6500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"481000\"},{\"id\":\"297\",\"codigo\":\"296\",\"descripcion\":\"cable sparta  bolsa  \",\"cantidad\":\"10\",\"precio\":\"3500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"35000\"},{\"id\":\"163\",\"codigo\":\"163\",\"descripcion\":\"control contro del juegos x3\",\"cantidad\":\"1\",\"precio\":\"39000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"39000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"18\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"144000\"},{\"id\":\"275\",\"codigo\":\"275\",\"descripcion\":\"telefono note 8 64gb\",\"cantidad\":\"1\",\"precio\":\"575000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"575000\"},{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"precio\":\"315000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"315000\"},{\"id\":\"14\",\"codigo\":\"14\",\"descripcion\":\"telefono moto e6 play\",\"cantidad\":\"1\",\"precio\":\"310000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"310000\"}]', 0, 0, 2670800, 0),
(3, 1, 1123, '2021-02-20', '17:22:30', 0, 0, '2021-02-20', 1, '[{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"precio\":\"230000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"230000\"},{\"id\":\"310\",\"codigo\":\"309\",\"descripcion\":\"banda sunfit\",\"cantidad\":\"2\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"90000\"},{\"id\":\"313\",\"codigo\":\"312\",\"descripcion\":\"bluetooth s-03 plus\",\"cantidad\":\"1\",\"precio\":\"25000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"25000\"},{\"id\":\"311\",\"codigo\":\"310\",\"descripcion\":\"parlante pc a1\",\"cantidad\":\"1\",\"precio\":\"46000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"46000\"},{\"id\":\"312\",\"codigo\":\"311\",\"descripcion\":\"parlante pc jr 5141\",\"cantidad\":\"1\",\"precio\":\"25000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"25000\"}]', 0, 0, 416000, 0),
(4, 1, 1140, '2021-02-24', '17:46:07', 0, 0, '2021-02-24', 1, '[{\"id\":\"261\",\"codigo\":\"261\",\"descripcion\":\"telefono moto e4 plus\",\"cantidad\":\"1\",\"precio\":\"348000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"348000\"},{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"21\",\"precio\":\"27000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"567000\"},{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"precio\":\"425000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"425000\"},{\"id\":\"28\",\"codigo\":\"28\",\"descripcion\":\"telefono sky p4\",\"cantidad\":\"1\",\"precio\":\"123000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"123000\"},{\"id\":\"59\",\"codigo\":\"59\",\"descripcion\":\"tablet alcatel 3g\",\"cantidad\":\"1\",\"precio\":\"275000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"275000\"},{\"id\":\"315\",\"codigo\":\"314\",\"descripcion\":\"poco x3 128gb \",\"cantidad\":\"1\",\"precio\":\"955000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"955000\"},{\"id\":\"317\",\"codigo\":\"316\",\"descripcion\":\"aro de luz 33\",\"cantidad\":\"2\",\"precio\":\"62000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"124000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"21\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"88200\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"4\",\"precio\":\"6500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"26000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"2\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"16000\"},{\"id\":\"316\",\"codigo\":\"315\",\"descripcion\":\"manillas banda\",\"cantidad\":\"2\",\"precio\":\"9000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"18000\"},{\"id\":\"259\",\"codigo\":\"259\",\"descripcion\":\"exibidores para celular\",\"cantidad\":\"14\",\"precio\":\"1500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"21000\"}]', 0, 0, 2986200, 0),
(6, 1, 1422, '2021-03-01', '14:17:14', 0, 0, '2021-03-01', 1, '[{\"id\":\"320\",\"codigo\":\"319\",\"descripcion\":\"pop 2f\",\"cantidad\":\"3\",\"precio\":\"220000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"660000\"},{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"precio\":\"315000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"315000\"},{\"id\":\"17\",\"codigo\":\"17\",\"descripcion\":\"telefono a01 core\",\"cantidad\":\"1\",\"precio\":\"270000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"270000\"},{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"2\",\"precio\":\"225000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"450000\"},{\"id\":\"318\",\"codigo\":\"317\",\"descripcion\":\"sky h5\",\"cantidad\":\"2\",\"precio\":\"179000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"358000\"},{\"id\":\"319\",\"codigo\":\"318\",\"descripcion\":\"table sky a7\",\"cantidad\":\"1\",\"precio\":\"205000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"205000\"},{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"precio\":\"420000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"420000\"},{\"id\":\"271\",\"codigo\":\"271\",\"descripcion\":\"telefono alcatel 1b\",\"cantidad\":\"1\",\"precio\":\"225000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"225000\"},{\"id\":\"25\",\"codigo\":\"25\",\"descripcion\":\"telefono iswang kronno\",\"cantidad\":\"1\",\"precio\":\"153000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"153000\"},{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"2\",\"precio\":\"138000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"276000\"},{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"spark 6 go 64gb\",\"cantidad\":\"2\",\"precio\":\"375000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"750000\"},{\"id\":\"321\",\"codigo\":\"320\",\"descripcion\":\"bluetooth x72-tws\",\"cantidad\":\"2\",\"precio\":\"37000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"74000\"},{\"id\":\"322\",\"codigo\":\"321\",\"descripcion\":\"microfono qy-920\",\"cantidad\":\"1\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"45000\"},{\"id\":\"323\",\"codigo\":\"322\",\"descripcion\":\"dvd\",\"cantidad\":\"1\",\"precio\":\"67000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"67000\"}]', 0, 0, 4268000, 0),
(7, 1, 1424, '2021-03-01', '14:29:01', 0, 0, '2021-03-01', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"10\",\"precio\":\"5000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"50000\"},{\"id\":\"325\",\"codigo\":\"324\",\"descripcion\":\"consola de juegos as p3\",\"cantidad\":\"1\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"45000\"},{\"id\":\"327\",\"codigo\":\"326\",\"descripcion\":\"consola de juegos 41-619\",\"cantidad\":\"1\",\"precio\":\"50000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"50000\"},{\"id\":\"328\",\"codigo\":\"327\",\"descripcion\":\"consola de juegos in-620\",\"cantidad\":\"1\",\"precio\":\"55000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"55000\"},{\"id\":\"324\",\"codigo\":\"323\",\"descripcion\":\"consola de juegos as p1-01\",\"cantidad\":\"1\",\"precio\":\"43000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"43000\"},{\"id\":\"335\",\"codigo\":\"334\",\"descripcion\":\"parlante pc bl-k8\",\"cantidad\":\"1\",\"precio\":\"30000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"30000\"},{\"id\":\"329\",\"codigo\":\"328\",\"descripcion\":\"teclado sencillo pc\",\"cantidad\":\"1\",\"precio\":\"22000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"22000\"},{\"id\":\"330\",\"codigo\":\"329\",\"descripcion\":\"router nia lv-wr08\",\"cantidad\":\"1\",\"precio\":\"60000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"},{\"id\":\"331\",\"codigo\":\"330\",\"descripcion\":\"parlante s1 sport\",\"cantidad\":\"1\",\"precio\":\"70000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"70000\"},{\"id\":\"332\",\"codigo\":\"331\",\"descripcion\":\"bluetooth carro lv-v3\",\"cantidad\":\"2\",\"precio\":\"10000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"20000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"6\",\"precio\":\"10000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"10\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"80000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"6\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"25200\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"50\",\"precio\":\"1200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"}]', 0, 0, 670200, 0),
(8, 1, 1425, '2021-03-01', '14:45:15', 0, 0, '2021-03-01', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"10\",\"precio\":\"800\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"8000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"8\",\"precio\":\"1300\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"10400\"},{\"id\":\"333\",\"codigo\":\"332\",\"descripcion\":\"popo shoker fino\",\"cantidad\":\"12\",\"precio\":\"3500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"42000\"},{\"id\":\"334\",\"codigo\":\"333\",\"descripcion\":\"tripode de celular\",\"cantidad\":\"4\",\"precio\":\"10000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"40000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"10\",\"precio\":\"1500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"15000\"}]', 0, 0, 115400, 0),
(9, 1, 1450, '2021-03-06', '13:53:26', 0, 0, '2021-03-06', 1, '[{\"id\":\"20\",\"codigo\":\"20\",\"descripcion\":\"telefono a12\",\"cantidad\":\"1\",\"precio\":\"558000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"558000\"},{\"id\":\"9\",\"codigo\":\"9\",\"descripcion\":\"telefono m2401\",\"cantidad\":\"1\",\"precio\":\"88000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"88000\"},{\"id\":\"14\",\"codigo\":\"14\",\"descripcion\":\"telefono moto e6 play\",\"cantidad\":\"1\",\"precio\":\"308000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"308000\"},{\"id\":\"336\",\"codigo\":\"335\",\"descripcion\":\"note 9s 6 ram \",\"cantidad\":\"1\",\"precio\":\"795000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"795000\"},{\"id\":\"334\",\"codigo\":\"333\",\"descripcion\":\"tripode de celular\",\"cantidad\":\"5\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"40000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"17\",\"precio\":\"7500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"127500\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"6\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"25200\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"32\",\"precio\":\"7000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"224000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"30\",\"precio\":\"1200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"36000\"}]', 0, 0, 2201700, 0),
(10, 1, 1248, '2021-03-12', '13:08:06', 0, 0, '2021-03-12', 1, '[{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"2\",\"precio\":\"140000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"280000\"},{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"2\",\"precio\":\"415000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"830000\"},{\"id\":\"339\",\"codigo\":\"338\",\"descripcion\":\"samsung a02s \",\"cantidad\":\"1\",\"precio\":\"475000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"475000\"},{\"id\":\"60\",\"codigo\":\"60\",\"descripcion\":\"telefono a11\",\"cantidad\":\"1\",\"precio\":\"490000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"490000\"},{\"id\":\"338\",\"codigo\":\"337\",\"descripcion\":\"note 10 \",\"cantidad\":\"1\",\"precio\":\"695000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"695000\"},{\"id\":\"340\",\"codigo\":\"339\",\"descripcion\":\"poco m3 64gb \",\"cantidad\":\"1\",\"precio\":\"560000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"560000\"},{\"id\":\"341\",\"codigo\":\"340\",\"descripcion\":\"hot 10 lite\",\"cantidad\":\"1\",\"precio\":\"350000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"350000\"},{\"id\":\"344\",\"codigo\":\"343\",\"descripcion\":\"hot 10 \",\"cantidad\":\"1\",\"precio\":\"428000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"428000\"},{\"id\":\"345\",\"codigo\":\"344\",\"descripcion\":\"power bank 10 mah\",\"cantidad\":\"2\",\"precio\":\"35000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"70000\"},{\"id\":\"346\",\"codigo\":\"345\",\"descripcion\":\"nano gel \",\"cantidad\":\"5\",\"precio\":\"4000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"20000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"15\",\"precio\":\"1000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"15000\"},{\"id\":\"347\",\"codigo\":\"346\",\"descripcion\":\"mause clk \",\"cantidad\":\"2\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"16000\"},{\"id\":\"348\",\"codigo\":\"347\",\"descripcion\":\"p20-11 clk 4.0a t.c\",\"cantidad\":\"5\",\"precio\":\"10500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"52500\"},{\"id\":\"349\",\"codigo\":\"348\",\"descripcion\":\"p2011 clk 4.0a v8\",\"cantidad\":\"5\",\"precio\":\"10000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"50000\"}]', 0, 0, 4331500, 0),
(11, 1, 1249, '2021-03-12', '13:37:04', 0, 0, '2021-03-12', 1, '[{\"id\":\"350\",\"codigo\":\"349\",\"descripcion\":\"pop shoker agua \",\"cantidad\":\"3\",\"precio\":\"3000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"9000\"},{\"id\":\"351\",\"codigo\":\"350\",\"descripcion\":\"pop shoker  anillos \",\"cantidad\":\"4\",\"precio\":\"3500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"14000\"},{\"id\":\"353\",\"codigo\":\"352\",\"descripcion\":\"manos libre cqm 03 \",\"cantidad\":\"5\",\"precio\":\"8500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"42500\"},{\"id\":\"352\",\"codigo\":\"351\",\"descripcion\":\"parlante bt  6118\",\"cantidad\":\"2\",\"precio\":\"30000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"},{\"id\":\"354\",\"codigo\":\"353\",\"descripcion\":\"holder 5b-1\",\"cantidad\":\"2\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"16000\"},{\"id\":\"355\",\"codigo\":\"354\",\"descripcion\":\"holder s02-22\",\"cantidad\":\"2\",\"precio\":\"5000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"10000\"},{\"id\":\"361\",\"codigo\":\"360\",\"descripcion\":\"camara web \",\"cantidad\":\"2\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"90000\"},{\"id\":\"356\",\"codigo\":\"355\",\"descripcion\":\"cargador universal pantalla \",\"cantidad\":\"6\",\"precio\":\"3500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"21000\"},{\"id\":\"357\",\"codigo\":\"356\",\"descripcion\":\"pluyin carro completo \",\"cantidad\":\"2\",\"precio\":\"4500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"9000\"},{\"id\":\"358\",\"codigo\":\"357\",\"descripcion\":\"manos libres akg \",\"cantidad\":\"20\",\"precio\":\"2800\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"56000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"30\",\"precio\":\"5000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"150000\"},{\"id\":\"359\",\"codigo\":\"358\",\"descripcion\":\"protector tablet catrera \",\"cantidad\":\"4\",\"precio\":\"12000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"48000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"6\",\"precio\":\"10000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"9\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"37800\"}]', 0, 0, 623300, 0),
(12, 1, 1462, '2021-03-16', '13:19:49', 0, 0, '2021-03-16', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"8\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"64000\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"2\",\"precio\":\"7000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"14000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"4\",\"precio\":\"2000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"8000\"},{\"id\":\"362\",\"codigo\":\"361\",\"descripcion\":\"jbl filps \",\"cantidad\":\"1\",\"precio\":\"345000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"345000\"},{\"id\":\"363\",\"codigo\":\"362\",\"descripcion\":\"cable inteligente ms01\",\"cantidad\":\"3\",\"precio\":\"6500\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"19500\"},{\"id\":\"365\",\"codigo\":\"364\",\"descripcion\":\"manillas \",\"cantidad\":\"5\",\"precio\":\"12000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"60000\"},{\"id\":\"316\",\"codigo\":\"315\",\"descripcion\":\"manillas banda\",\"cantidad\":\"16\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"128000\"},{\"id\":\"367\",\"codigo\":\"366\",\"descripcion\":\"b mobile ax 1078\",\"cantidad\":\"2\",\"precio\":\"205000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"410000\"},{\"id\":\"128\",\"codigo\":\"128\",\"descripcion\":\"cables 2x1\",\"cantidad\":\"6\",\"precio\":\"2000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"12000\"},{\"id\":\"370\",\"codigo\":\"369\",\"descripcion\":\"cable 2x1 3metros\",\"cantidad\":\"3\",\"precio\":\"3000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"9000\"},{\"id\":\"371\",\"codigo\":\"370\",\"descripcion\":\"cable de poder \",\"cantidad\":\"4\",\"precio\":\"6000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"24000\"}]', 0, 0, 1093500, 0),
(13, 1, 1469, '2021-03-18', '16:54:10', 0, 0, '2021-03-18', 1, '[{\"id\":\"17\",\"codigo\":\"17\",\"descripcion\":\"telefono a01 core\",\"cantidad\":\"2\",\"precio\":\"265000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"530000\"},{\"id\":\"271\",\"codigo\":\"271\",\"descripcion\":\"telefono alcatel 1b\",\"cantidad\":\"2\",\"precio\":\"230000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"460000\"},{\"id\":\"43\",\"codigo\":\"43\",\"descripcion\":\"telefono epik k503t\",\"cantidad\":\"1\",\"precio\":\"185000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"185000\"},{\"id\":\"261\",\"codigo\":\"261\",\"descripcion\":\"telefono moto e4 plus\",\"cantidad\":\"1\",\"precio\":\"350000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"350000\"},{\"id\":\"276\",\"codigo\":\"276\",\"descripcion\":\"redmi 9 32gb\",\"cantidad\":\"1\",\"precio\":\"450000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"450000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"25\",\"precio\":\"8000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"200000\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"15\",\"precio\":\"7000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"105000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"28\",\"precio\":\"4200\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"117600\"},{\"id\":\"50\",\"codigo\":\"50\",\"descripcion\":\"telefono movic a6003\",\"cantidad\":\"2\",\"precio\":\"235000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"470000\"},{\"id\":\"372\",\"codigo\":\"371\",\"descripcion\":\"k2\",\"cantidad\":\"2\",\"precio\":\"180000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"360000\"},{\"id\":\"375\",\"codigo\":\"373\",\"descripcion\":\"k4\",\"cantidad\":\"2\",\"precio\":\"245000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"490000\"},{\"id\":\"49\",\"codigo\":\"49\",\"descripcion\":\"telefono movic heros 7\",\"cantidad\":\"1\",\"precio\":\"240000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"240000\"},{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"2\",\"precio\":\"230000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"460000\"},{\"id\":\"373\",\"codigo\":\"372\",\"descripcion\":\"t6002\",\"cantidad\":\"2\",\"precio\":\"240000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"480000\"}]', 0, 0, 4897600, 0),
(14, 1, 1470, '2021-03-18', '16:55:50', 0, 0, '2021-03-18', 1, '[{\"id\":\"275\",\"codigo\":\"275\",\"descripcion\":\"telefono note 8 64gb\",\"cantidad\":\"1\",\"precio\":\"585000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"585000\"},{\"id\":\"376\",\"codigo\":\"374\",\"descripcion\":\"a21s 128gb \",\"cantidad\":\"1\",\"precio\":\"685000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"685000\"}]', 0, 0, 1270000, 0),
(15, 1, 1471, '2021-03-19', '10:35:44', 0, 0, '2021-03-19', 1, '[{\"id\":\"378\",\"codigo\":\"376\",\"descripcion\":\"alcatel  1e \",\"cantidad\":\"2\",\"precio\":\"122000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"244000\"},{\"id\":\"277\",\"codigo\":\"277\",\"descripcion\":\"redmi 9a 32g\",\"cantidad\":\"1\",\"precio\":\"410000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"410000\"},{\"id\":\"243\",\"codigo\":\"243\",\"descripcion\":\"aro de luz\",\"cantidad\":\"3\",\"precio\":\"60000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"180000\"},{\"id\":\"377\",\"codigo\":\"375\",\"descripcion\":\"diadema gamer \",\"cantidad\":\"2\",\"precio\":\"45000\",\"descuento\":\"0\",\"impuesto\":0,\"subtotal\":\"90000\"}]', 0, 0, 924000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_cliente`
--

CREATE TABLE `compras_cliente` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras_cliente`
--

INSERT INTO `compras_cliente` (`id`, `id_sucursal`, `id_cliente`, `valor`, `num_factura`, `fecha`) VALUES
(1, 1, 1, 33000, 2, '2021-02-13'),
(2, 1, 2, 360000, 3, '2021-02-13'),
(3, 1, 1, 1406998, 4, '2021-02-13'),
(4, 1, 1, 861000, 5, '2021-02-13'),
(5, 1, 1, 755000, 6, '2021-02-13'),
(6, 1, 1, 644996, 7, '2021-02-13'),
(7, 1, 1, 140000, 8, '2021-02-13'),
(8, 1, 1, 1345000, 9, '2021-02-13'),
(9, 1, 1, 70000, 10, '2021-02-13'),
(10, 1, 1, 264998, 11, '2021-02-13'),
(11, 1, 1, 182800, 12, '2021-02-13'),
(12, 1, 1, 354996, 13, '2021-02-13'),
(13, 1, 1, 477000, 14, '2021-02-13'),
(14, 1, 1, 65000, 15, '2021-02-13'),
(16, 1, 1, 10000, 16, '2021-02-13'),
(17, 1, 1, 35000, 17, '2021-02-13'),
(18, 1, 1, 306000, 18, '2021-02-13'),
(19, 1, 1, 316000, 18, '2021-02-13'),
(20, 1, 1, 20000, 19, '2021-02-13'),
(21, 1, 1, 62000, 20, '2021-02-14'),
(22, 1, 1, 62000, 20, '2021-02-14'),
(23, 1, 1, 10000, 21, '2021-02-14'),
(24, 1, 1, 15000, 22, '2021-02-14'),
(25, 1, 1, 45000, 23, '2021-02-14'),
(26, 1, 1, 8000, 24, '2021-02-14'),
(27, 1, 1, 10000, 25, '2021-02-14'),
(28, 1, 1, 10000, 26, '2021-02-14'),
(29, 1, 1, 5000, 27, '2021-02-14'),
(30, 1, 1, 10000, 28, '2021-02-14'),
(31, 1, 1, 136000, 29, '2021-02-15'),
(32, 1, 1, 104998, 30, '2021-02-15'),
(33, 1, 1, 200000, 31, '2021-02-15'),
(34, 1, 1, 20000, 32, '2021-02-15'),
(35, 1, 1, 10000, 33, '2021-02-15'),
(37, 1, 1, 46000, 34, '2021-02-16'),
(38, 1, 1, 25000, 35, '2021-02-16'),
(39, 1, 0, 15000, 36, '2021-02-16'),
(41, 1, 0, 218000, 37, '2021-02-16'),
(44, 1, 0, 13000, 40, '2021-02-17'),
(43, 1, 0, 43000, 39, '2021-02-16'),
(45, 1, 0, 27000, 41, '2021-02-17'),
(46, 1, 0, 58000, 42, '2021-02-17'),
(47, 1, 0, 42000, 43, '2021-02-17'),
(48, 1, 0, 15000, 44, '2021-02-17'),
(49, 1, 0, 40000, 45, '2021-02-17'),
(50, 1, 0, 10000, 46, '2021-02-17'),
(51, 1, 0, 64000, 47, '2021-02-17'),
(52, 1, 0, 35000, 48, '2021-02-17'),
(53, 1, 0, 395000, 49, '2021-02-17'),
(54, 1, 0, 28000, 50, '2021-02-17'),
(55, 1, 0, 15000, 51, '2021-02-17'),
(56, 1, 0, 10000, 52, '2021-02-18'),
(57, 1, 0, 41000, 53, '2021-02-18'),
(58, 1, 0, 20000, 54, '2021-02-18'),
(59, 1, 0, 645000, 55, '2021-02-18'),
(60, 1, 0, 8000, 56, '2021-02-18'),
(61, 1, 0, 90000, 57, '2021-02-18'),
(62, 1, 0, 30000, 58, '2021-02-18'),
(63, 1, 0, 42000, 59, '2021-02-18'),
(64, 1, 0, 25000, 60, '2021-02-18'),
(65, 1, 0, 380000, 61, '2021-02-18'),
(66, 1, 0, 42000, 62, '2021-02-18'),
(67, 1, 0, 10000, 63, '2021-02-18'),
(68, 1, 0, 42000, 64, '2021-02-18'),
(69, 1, 0, 8000, 65, '2021-02-18'),
(75, 1, 1, 530000, 71, '2021-02-19'),
(74, 1, 1, 190000, 70, '2021-02-19'),
(72, 1, 1, 20000, 68, '2021-02-19'),
(73, 1, 1, 18000, 69, '2021-02-19'),
(76, 1, 1, 30000, 72, '2021-02-19'),
(77, 1, 1, 293000, 73, '2021-02-19'),
(78, 1, 1, 20000, 74, '2021-02-19'),
(79, 1, 1, 505000, 75, '2021-02-19'),
(80, 1, 1, 20000, 76, '2021-02-19'),
(81, 1, 1, 10000, 77, '2021-02-20'),
(82, 1, 1, 75000, 78, '2021-02-20'),
(83, 1, 1, 25000, 79, '2021-02-20'),
(84, 1, 1, 15000, 80, '2021-02-20'),
(85, 1, 1, 15000, 81, '2021-02-20'),
(86, 1, 1, 12000, 82, '2021-02-20'),
(87, 1, 1, 15000, 83, '2021-02-20'),
(88, 1, 1, 22000, 84, '2021-02-20'),
(89, 1, 1, 30000, 85, '2021-02-20'),
(92, 1, 1, 38000, 88, '2021-02-20'),
(91, 1, 1, 355000, 87, '2021-02-20'),
(93, 1, 1, 23000, 89, '2021-02-21'),
(94, 1, 1, 310000, 90, '2021-02-21'),
(95, 1, 1, 5000, 91, '2021-02-21'),
(96, 1, 1, 15000, 92, '2021-02-21'),
(97, 1, 1, 65000, 93, '2021-02-21'),
(98, 1, 1, 57000, 94, '2021-02-21'),
(99, 1, 1, 20000, 95, '2021-02-21'),
(100, 1, 1, 10000, 96, '2021-02-21'),
(101, 1, 1, 420000, 97, '2021-02-21'),
(102, 1, 1, 5000, 98, '2021-02-22'),
(103, 1, 1, 18000, 99, '2021-02-22'),
(104, 1, 1, 380000, 100, '2021-02-22'),
(105, 1, 1, 47000, 101, '2021-02-22'),
(106, 1, 1, 25000, 102, '2021-02-22'),
(107, 1, 1, 10000, 103, '2021-02-22'),
(108, 1, 1, 23000, 104, '2021-02-22'),
(109, 1, 1, 245000, 105, '2021-02-22'),
(110, 1, 1, 15000, 106, '2021-02-22'),
(111, 1, 1, 35000, 107, '2021-02-22'),
(112, 1, 1, 25000, 108, '2021-02-22'),
(113, 1, 1, 28000, 109, '2021-02-23'),
(114, 1, 1, 0, 110, '0000-00-00'),
(115, 1, 1, 10000, 110, '2021-02-23'),
(116, 1, 1, 13000, 111, '2021-02-23'),
(117, 1, 1, 25000, 112, '2021-02-23'),
(121, 1, 1, 25000, 116, '2021-02-23'),
(119, 1, 1, 13000, 114, '2021-02-23'),
(120, 1, 1, 5000, 115, '2021-02-23'),
(122, 1, 1, 20000, 117, '2021-02-23'),
(123, 1, 1, 15000, 118, '2021-02-23'),
(124, 1, 1, 300000, 119, '2021-02-23'),
(125, 1, 1, 15000, 120, '2021-02-23'),
(126, 1, 1, 8000, 121, '2021-02-23'),
(127, 1, 1, 20000, 122, '2021-02-23'),
(128, 1, 1, 15000, 123, '2021-02-23'),
(129, 1, 1, 33000, 124, '2021-02-23'),
(130, 1, 1, 483000, 125, '2021-02-24'),
(131, 1, 1, 145000, 126, '2021-02-24'),
(132, 1, 1, 15000, 127, '2021-02-24'),
(133, 1, 1, 8000, 128, '2021-02-24'),
(134, 1, 1, 8000, 129, '2021-02-24'),
(135, 1, 1, 10000, 130, '2021-02-24'),
(136, 1, 1, 10000, 131, '2021-02-24'),
(137, 1, 1, 15000, 132, '2021-02-24'),
(138, 1, 1, 10000, 133, '2021-02-24'),
(139, 1, 1, 32000, 134, '2021-02-24'),
(140, 1, 1, 60000, 135, '2021-02-24'),
(141, 1, 1, 70000, 136, '2021-02-24'),
(142, 1, 1, 12000, 137, '2021-02-24'),
(143, 1, 1, 15000, 138, '2021-02-24'),
(144, 1, 1, 5000, 139, '2021-02-25'),
(145, 1, 1, 280000, 140, '2021-02-25'),
(146, 1, 1, 400000, 141, '2021-02-25'),
(147, 1, 1, 15000, 142, '2021-02-25'),
(148, 1, 1, 10000, 143, '2021-02-25'),
(149, 1, 1, 5000, 144, '2021-02-25'),
(150, 1, 1, 20000, 145, '2021-02-25'),
(151, 1, 1, 10000, 146, '2021-02-25'),
(152, 1, 1, 20000, 147, '2021-02-25'),
(153, 1, 1, 10000, 148, '2021-02-25'),
(154, 1, 1, 10000, 149, '2021-02-25'),
(155, 1, 1, 10000, 150, '2021-02-25'),
(156, 1, 1, 35000, 151, '2021-02-25'),
(157, 1, 1, 38000, 152, '2021-02-25'),
(158, 1, 1, 23000, 153, '2021-02-25'),
(159, 1, 1, 25000, 154, '2021-02-25'),
(160, 1, 1, 90000, 155, '2021-02-26'),
(161, 1, 1, 5000, 156, '2021-02-26'),
(162, 1, 1, 40000, 157, '2021-02-26'),
(163, 1, 1, 25000, 158, '2021-02-26'),
(164, 1, 1, 35000, 159, '2021-02-26'),
(165, 1, 1, 10000, 160, '2021-02-26'),
(166, 1, 1, 150000, 161, '2021-02-26'),
(167, 1, 1, 22000, 162, '2021-02-26'),
(168, 1, 1, 15000, 163, '2021-02-26'),
(169, 1, 1, 3000, 164, '2021-02-26'),
(170, 1, 1, 10000, 165, '2021-02-26'),
(171, 1, 1, 8000, 166, '2021-02-26'),
(172, 1, 1, 10000, 167, '2021-02-27'),
(173, 1, 1, 40000, 168, '2021-02-27'),
(174, 1, 1, 28000, 169, '2021-02-27'),
(175, 1, 1, 13000, 170, '2021-02-27'),
(176, 1, 1, 160000, 171, '2021-02-27'),
(177, 1, 1, 13000, 172, '2021-02-27'),
(178, 1, 1, 80000, 173, '2021-02-27'),
(179, 1, 1, 160000, 174, '2021-02-27'),
(180, 1, 1, 55000, 175, '2021-02-27'),
(181, 1, 1, 405000, 176, '2021-02-27'),
(182, 1, 1, 23000, 177, '2021-02-27'),
(183, 1, 1, 15000, 178, '2021-02-27'),
(184, 1, 1, 300000, 179, '2021-02-27'),
(185, 1, 1, 10000, 180, '2021-02-27'),
(186, 1, 1, 5000, 181, '2021-02-27'),
(187, 1, 1, 20000, 182, '2021-02-28'),
(188, 1, 1, 25000, 183, '2021-02-28'),
(189, 1, 1, 140000, 184, '2021-02-28'),
(190, 1, 1, 193000, 185, '2021-02-28'),
(191, 1, 1, 105000, 186, '2021-02-28'),
(192, 1, 1, 5000, 187, '2021-03-01'),
(193, 1, 1, 20000, 188, '2021-03-01'),
(194, 1, 1, 160000, 189, '2021-03-01'),
(195, 1, 1, 15000, 190, '2021-03-01'),
(196, 1, 1, 18000, 191, '2021-03-01'),
(197, 1, 1, 10000, 192, '2021-03-01'),
(198, 1, 1, 15000, 193, '2021-03-01'),
(199, 1, 1, 360000, 194, '2021-03-01'),
(200, 1, 1, 15000, 195, '2021-03-01'),
(201, 1, 1, 22000, 196, '2021-03-01'),
(202, 1, 1, 10000, 197, '2021-03-01'),
(203, 1, 1, 270000, 198, '2021-03-01'),
(207, 1, 1, 5000, 202, '2021-03-01'),
(205, 1, 1, 22000, 200, '2021-03-01'),
(206, 1, 1, 25000, 201, '2021-03-01'),
(208, 1, 1, 80000, 203, '2021-03-01'),
(209, 1, 1, 32000, 204, '2021-03-02'),
(210, 1, 1, 35000, 205, '2021-03-02'),
(211, 1, 1, 5000, 206, '2021-03-02'),
(212, 1, 1, 8000, 207, '2021-03-02'),
(213, 1, 1, 15000, 208, '2021-03-02'),
(214, 1, 1, 10000, 209, '2021-03-02'),
(215, 1, 1, 10000, 210, '2021-03-02'),
(216, 1, 1, 620000, 211, '2021-03-02'),
(217, 1, 1, 35000, 212, '2021-03-02'),
(218, 1, 1, 15000, 213, '2021-03-02'),
(219, 1, 1, 15000, 214, '2021-03-02'),
(220, 1, 1, 35000, 215, '2021-03-02'),
(221, 1, 1, 25000, 216, '2021-03-02'),
(222, 1, 1, 30000, 217, '2021-03-02'),
(223, 1, 1, 37000, 218, '2021-03-02'),
(224, 1, 1, 0, 219, '0000-00-00'),
(225, 1, 1, 3000, 219, '2021-03-02'),
(226, 1, 1, 10000, 220, '2021-03-02'),
(227, 1, 1, 10000, 221, '2021-03-02'),
(228, 1, 1, 40000, 222, '2021-03-02'),
(229, 1, 1, 8000, 223, '2021-03-02'),
(230, 1, 1, 460000, 224, '2021-03-03'),
(231, 1, 1, 10000, 225, '2021-03-03'),
(232, 1, 1, 10000, 226, '2021-03-03'),
(233, 1, 1, 25000, 227, '2021-03-03'),
(234, 1, 1, 160000, 228, '2021-03-03'),
(235, 1, 4, 280000, 229, '2021-03-03'),
(236, 1, 1, 65000, 230, '2021-03-03'),
(237, 1, 1, 25000, 231, '2021-03-03'),
(238, 1, 1, 153000, 232, '2021-03-03'),
(239, 1, 1, 70000, 233, '2021-03-03'),
(240, 1, 1, 20000, 234, '2021-03-03'),
(241, 1, 1, 10000, 235, '2021-03-03'),
(242, 1, 1, 40000, 236, '2021-03-03'),
(243, 1, 1, 413000, 237, '2021-03-03'),
(244, 1, 1, 5000, 238, '2021-03-03'),
(245, 1, 1, 45000, 239, '2021-03-03'),
(246, 1, 1, 25000, 240, '2021-03-03'),
(247, 1, 1, 25000, 241, '2021-03-03'),
(248, 1, 1, 0, 242, '0000-00-00'),
(249, 1, 1, 40000, 242, '2021-03-03'),
(250, 1, 1, 90000, 243, '2021-03-03'),
(251, 1, 1, 3000, 244, '2021-03-04'),
(252, 1, 1, 25000, 245, '2021-03-04'),
(253, 1, 1, 200000, 246, '2021-03-04'),
(254, 1, 1, 10000, 247, '2021-03-04'),
(255, 1, 1, 23000, 248, '2021-03-04'),
(256, 1, 1, 15000, 249, '2021-03-04'),
(257, 1, 1, 10000, 250, '2021-03-04'),
(258, 1, 1, 15000, 251, '2021-03-04'),
(259, 1, 1, 5000, 252, '2021-03-04'),
(260, 1, 1, 5000, 253, '2021-03-04'),
(261, 1, 1, 50000, 254, '2021-03-04'),
(262, 1, 1, 8000, 255, '2021-03-04'),
(263, 1, 1, 35000, 256, '2021-03-04'),
(264, 1, 1, 10000, 257, '2021-03-04'),
(265, 1, 1, 35000, 258, '2021-03-05'),
(266, 1, 1, 8000, 259, '2021-03-05'),
(267, 1, 1, 795000, 260, '2021-03-05'),
(268, 1, 1, 33000, 261, '2021-03-05'),
(269, 1, 1, 25000, 262, '2021-03-05'),
(270, 1, 1, 20000, 263, '2021-03-05'),
(271, 1, 1, 32000, 264, '2021-03-05'),
(272, 1, 1, 10000, 265, '2021-03-05'),
(273, 1, 1, 35000, 266, '2021-03-05'),
(274, 1, 1, 35000, 267, '2021-03-05'),
(275, 1, 1, 50000, 268, '2021-03-05'),
(276, 1, 1, 10000, 269, '2021-03-05'),
(277, 1, 1, 35000, 270, '2021-03-05'),
(278, 1, 1, 15000, 271, '2021-03-05'),
(279, 1, 1, 35000, 272, '2021-03-05'),
(280, 1, 1, 13000, 273, '2021-03-05'),
(281, 1, 1, 20000, 274, '2021-03-05'),
(282, 1, 1, 15000, 275, '2021-03-05'),
(283, 1, 1, 38000, 276, '2021-03-05'),
(284, 1, 1, 10000, 277, '2021-03-05'),
(285, 1, 1, 35000, 278, '2021-03-05'),
(286, 1, 1, 55000, 279, '2021-03-05'),
(287, 1, 1, 10000, 280, '2021-03-05'),
(288, 1, 1, 33000, 281, '2021-03-06'),
(289, 1, 1, 25000, 282, '2021-03-06'),
(290, 1, 1, 25000, 283, '2021-03-06'),
(291, 1, 1, 50000, 284, '2021-03-06'),
(292, 1, 1, 20000, 285, '2021-03-06'),
(293, 1, 1, 15000, 286, '2021-03-06'),
(294, 1, 1, 85000, 287, '2021-03-06'),
(295, 1, 1, 10000, 288, '2021-03-06'),
(296, 1, 1, 10000, 289, '2021-03-06'),
(297, 1, 1, 15000, 290, '2021-03-06'),
(298, 1, 1, 38000, 291, '2021-03-06'),
(299, 1, 1, 10000, 292, '2021-03-06'),
(300, 1, 1, 138000, 293, '2021-03-06'),
(301, 1, 1, 40000, 294, '2021-03-07'),
(302, 1, 1, 12000, 295, '2021-03-07'),
(303, 1, 1, 12000, 296, '2021-03-07'),
(304, 1, 1, 10000, 297, '2021-03-08'),
(305, 1, 1, 12000, 298, '2021-03-08'),
(306, 1, 1, 5000, 299, '2021-03-08'),
(307, 1, 1, 10000, 300, '2021-03-08'),
(314, 1, 1, 15000, 306, '2021-03-08'),
(310, 1, 1, 10000, 302, '2021-03-08'),
(311, 1, 1, 23000, 303, '2021-03-08'),
(312, 1, 1, 5000, 304, '2021-03-08'),
(313, 1, 1, 20000, 305, '2021-03-08'),
(315, 1, 1, 126000, 307, '2021-03-08'),
(316, 1, 1, 10000, 308, '2021-03-08'),
(317, 1, 1, 10000, 309, '2021-03-08'),
(318, 1, 1, 20000, 310, '2021-03-08'),
(319, 1, 1, 59000, 311, '2021-03-08'),
(320, 1, 1, 40000, 312, '2021-03-08'),
(321, 1, 1, 35000, 313, '2021-03-08'),
(322, 1, 1, 23000, 314, '2021-03-08'),
(323, 1, 1, 12000, 315, '2021-03-09'),
(324, 1, 1, 50000, 316, '2021-03-09'),
(325, 1, 1, 10000, 317, '2021-03-09'),
(326, 1, 1, 10000, 318, '2021-03-09'),
(327, 1, 1, 15000, 319, '2021-03-09'),
(328, 1, 1, 3000, 320, '2021-03-09'),
(329, 1, 1, 14000, 321, '2021-03-09'),
(330, 1, 1, 10000, 322, '2021-03-09'),
(331, 1, 1, 23000, 323, '2021-03-09'),
(332, 1, 1, 12000, 324, '2021-03-09'),
(333, 1, 1, 8000, 325, '2021-03-09'),
(334, 1, 1, 10000, 326, '2021-03-09'),
(335, 1, 1, 46000, 327, '2021-03-09'),
(336, 1, 1, 15000, 328, '2021-03-09'),
(337, 1, 1, 10000, 329, '2021-03-09'),
(338, 1, 1, 30000, 330, '2021-03-09'),
(339, 1, 1, 69000, 331, '2021-03-09'),
(340, 1, 1, 47000, 332, '2021-03-09'),
(341, 1, 1, 50000, 333, '2021-03-10'),
(342, 1, 1, 15000, 334, '2021-03-10'),
(343, 1, 1, 25000, 335, '2021-03-10'),
(344, 1, 1, 15000, 336, '2021-03-10'),
(345, 1, 1, 470000, 337, '2021-03-10'),
(346, 1, 1, 10000, 338, '2021-03-10'),
(347, 1, 1, 15000, 339, '2021-03-10'),
(348, 1, 1, 35000, 340, '2021-03-10'),
(349, 1, 1, 15000, 341, '2021-03-10'),
(350, 1, 1, 15000, 342, '2021-03-10'),
(351, 1, 1, 10000, 343, '2021-03-10'),
(352, 1, 1, 35000, 344, '2021-03-10'),
(353, 1, 1, 10000, 345, '2021-03-10'),
(354, 1, 1, 5000, 346, '2021-03-10'),
(355, 1, 1, 19998, 347, '2021-03-10'),
(356, 1, 1, 10000, 348, '2021-03-10'),
(357, 1, 1, 173000, 349, '2021-03-10'),
(358, 1, 1, 15000, 350, '2021-03-10'),
(359, 1, 1, 35000, 351, '2021-03-10'),
(360, 1, 1, 10000, 352, '2021-03-10'),
(361, 1, 1, 25000, 353, '2021-03-10'),
(362, 1, 1, 50000, 354, '2021-03-11'),
(363, 1, 1, 15000, 355, '2021-03-11'),
(364, 1, 1, 50000, 356, '2021-03-11'),
(365, 1, 1, 15000, 357, '2021-03-11'),
(366, 1, 1, 5000, 358, '2021-03-11'),
(367, 1, 1, 5000, 359, '2021-03-11'),
(368, 1, 1, 10000, 360, '2021-03-11'),
(369, 1, 1, 22000, 361, '2021-03-11'),
(370, 1, 1, 30000, 362, '2021-03-11'),
(371, 1, 1, 55000, 363, '2021-03-11'),
(372, 1, 1, 10000, 364, '2021-03-11'),
(373, 1, 1, 10000, 365, '2021-03-11'),
(374, 1, 1, 432000, 366, '2021-03-12'),
(375, 1, 1, 3000, 367, '2021-03-12'),
(376, 1, 1, 40000, 368, '2021-03-12'),
(377, 1, 1, 10000, 369, '2021-03-12'),
(378, 1, 5, 750000, 370, '2021-03-12'),
(379, 1, 1, 183000, 371, '2021-03-12'),
(380, 1, 1, 15000, 372, '2021-03-12'),
(381, 1, 1, 10000, 373, '2021-03-12'),
(382, 1, 1, 10000, 374, '2021-03-12'),
(383, 1, 1, 10000, 375, '2021-03-12'),
(384, 1, 1, 12000, 376, '2021-03-12'),
(385, 1, 1, 10000, 377, '2021-03-12'),
(386, 1, 1, 10000, 378, '2021-03-12'),
(387, 1, 1, 10000, 379, '2021-03-12'),
(388, 1, 1, 25000, 380, '2021-03-12'),
(389, 1, 1, 13000, 381, '2021-03-12'),
(390, 1, 1, 15000, 382, '2021-03-12'),
(391, 1, 1, 18000, 383, '2021-03-13'),
(392, 1, 1, 270000, 384, '2021-03-13'),
(393, 1, 1, 5000, 385, '2021-03-13'),
(394, 1, 1, 25000, 386, '2021-03-13'),
(395, 1, 1, 10000, 387, '2021-03-13'),
(396, 1, 6, 370000, 388, '2021-03-13'),
(397, 1, 1, 12000, 389, '2021-03-13'),
(398, 1, 1, 20000, 390, '2021-03-13'),
(399, 1, 1, 15000, 391, '2021-03-13'),
(400, 1, 1, 10000, 392, '2021-03-13'),
(401, 1, 1, 27000, 393, '2021-03-13'),
(402, 1, 1, 100000, 394, '2021-03-13'),
(403, 1, 1, 13000, 395, '2021-03-13'),
(404, 1, 1, 10000, 396, '2021-03-13'),
(405, 1, 1, 150000, 397, '2021-03-13'),
(406, 1, 1, 78000, 398, '2021-03-13'),
(407, 1, 1, 90000, 399, '2021-03-13'),
(408, 1, 1, 530000, 400, '2021-03-14'),
(409, 1, 1, 13000, 401, '2021-03-14'),
(410, 1, 1, 330000, 402, '2021-03-14'),
(411, 1, 1, 60000, 403, '2021-03-14'),
(412, 1, 1, 15000, 404, '2021-03-14'),
(413, 1, 1, 0, 405, '0000-00-00'),
(414, 1, 1, 48000, 405, '2021-03-14'),
(415, 1, 1, 246000, 406, '2021-03-14'),
(416, 1, 1, 60000, 407, '2021-03-15'),
(417, 1, 1, 30000, 408, '2021-03-15'),
(418, 1, 1, 15000, 409, '2021-03-15'),
(419, 1, 1, 18000, 410, '2021-03-15'),
(420, 1, 1, 575000, 411, '2021-03-15'),
(421, 1, 1, 5000, 412, '2021-03-15'),
(422, 1, 1, 5000, 413, '2021-03-15'),
(423, 1, 1, 5000, 414, '2021-03-15'),
(424, 1, 1, 6000, 415, '2021-03-15'),
(425, 1, 1, 20000, 416, '2021-03-16'),
(426, 1, 1, 260000, 417, '2021-03-16'),
(428, 1, 1, 38000, 418, '2021-03-16'),
(429, 1, 1, 3000, 419, '2021-03-16'),
(430, 1, 1, 12000, 420, '2021-03-16'),
(431, 1, 1, 45000, 421, '2021-03-16'),
(432, 1, 1, 10000, 422, '2021-03-16'),
(433, 1, 1, 30000, 423, '2021-03-16'),
(434, 1, 1, 0, 424, '0000-00-00'),
(435, 1, 1, 10000, 424, '2021-03-16'),
(436, 1, 1, 15000, 425, '2021-03-16'),
(437, 1, 1, 25000, 426, '2021-03-16'),
(438, 1, 1, 35000, 427, '2021-03-16'),
(439, 1, 1, 333000, 428, '2021-03-17'),
(440, 1, 1, 20000, 429, '2021-03-17'),
(441, 1, 1, 20000, 430, '2021-03-17'),
(442, 1, 1, 0, 431, '0000-00-00'),
(443, 1, 1, 10000, 431, '2021-03-17'),
(444, 1, 1, 10000, 432, '2021-03-17'),
(445, 1, 1, 8000, 433, '2021-03-17'),
(446, 1, 1, 15000, 434, '2021-03-17'),
(447, 1, 1, 270000, 435, '2021-03-17'),
(448, 1, 1, 15000, 436, '2021-03-17'),
(449, 1, 1, 23000, 437, '2021-03-17'),
(450, 1, 1, 18000, 438, '2021-03-18'),
(451, 1, 1, 13000, 439, '2021-03-18'),
(452, 1, 1, 3000, 440, '2021-03-18'),
(453, 1, 1, 15000, 441, '2021-03-18'),
(454, 1, 1, 55000, 442, '2021-03-18'),
(455, 1, 1, 25000, 443, '2021-03-18'),
(456, 1, 1, 33000, 444, '2021-03-18'),
(457, 1, 1, 10000, 445, '2021-03-18'),
(458, 1, 1, 10000, 446, '2021-03-18'),
(459, 1, 1, 23000, 447, '2021-03-18'),
(460, 1, 1, 13000, 448, '2021-03-18'),
(461, 1, 1, 440000, 449, '2021-03-18'),
(462, 1, 1, 700000, 450, '2021-03-18'),
(463, 1, 1, 50000, 451, '2021-03-18'),
(464, 1, 1, 8000, 452, '2021-03-18'),
(465, 1, 1, 38000, 453, '2021-03-18'),
(466, 1, 1, 20000, 454, '2021-03-19'),
(467, 1, 1, 10000, 455, '2021-03-19'),
(468, 1, 1, 10000, 456, '2021-03-19'),
(479, 1, 1, 250000, 465, '2021-03-20'),
(470, 1, 1, 0, 458, '0000-00-00'),
(471, 1, 1, 0, 458, '0000-00-00'),
(472, 1, 1, 5000, 458, '2021-03-19'),
(473, 1, 1, 10000, 459, '2021-03-19'),
(474, 1, 1, 25000, 460, '2021-03-19'),
(475, 1, 1, 22000, 461, '2021-03-19'),
(476, 1, 1, 10000, 462, '2021-03-19'),
(477, 1, 1, 33000, 463, '2021-03-19'),
(478, 1, 1, 10000, 464, '2021-03-19'),
(480, 1, 1, 10000, 466, '2021-03-20'),
(481, 1, 1, 26000, 467, '2021-03-20'),
(482, 1, 1, 26000, 467, '2021-03-20'),
(483, 1, 1, 10000, 468, '2021-03-20'),
(484, 1, 1, 420000, 469, '2021-03-20'),
(485, 1, 1, 265000, 470, '2021-03-20'),
(486, 1, 1, 25000, 471, '2021-03-20'),
(487, 1, 1, 10000, 472, '2021-03-20'),
(488, 1, 1, 15000, 473, '2021-03-20'),
(489, 1, 1, 10000, 474, '2021-03-20'),
(491, 1, 1, 15000, 476, '2021-03-20'),
(492, 1, 1, 10000, 477, '2021-03-20'),
(493, 1, 1, 15000, 478, '2021-03-20'),
(494, 1, 1, 22000, 479, '2021-03-20'),
(495, 1, 1, 5000, 480, '2021-03-20'),
(496, 1, 1, 25000, 481, '2021-03-21'),
(497, 1, 1, 20000, 482, '2021-03-21'),
(498, 1, 1, 13000, 483, '2021-03-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_producto`
--

CREATE TABLE `compra_producto` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_proveedor`
--

CREATE TABLE `compra_proveedor` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `num_fectura` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `regimen` varchar(255) DEFAULT NULL,
  `eslogan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_empresa`
--

INSERT INTO `datos_empresa` (`id`, `id_sucursal`, `nit`, `nombre`, `direccion`, `departamento`, `ciudad`, `telefono`, `celular`, `email`, `regimen`, `eslogan`) VALUES
(1, 1, '1', 'CELUEXPRESS', 'CR 6 18 - 16', 'Cordoba', 'Sahagun', '0', '3015556353', 'expresscelu833@gmail.com', 'Regimen Simplificado', 'a tu alcance '),
(2, 2, '23180357-9', 'PUNTO TECNOLOGICON 15', 'calle 15 carrera 7 -51 local 01', 'CORDOBA', 'CHINU', '', '3005328556', 'puntotecnologico16@gmail.com', 'simplificado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devol_cliente`
--

CREATE TABLE `devol_cliente` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `codigo` int(255) DEFAULT NULL,
  `id_cliente` int(255) DEFAULT NULL,
  `num_factura` int(255) DEFAULT NULL,
  `productos` text DEFAULT NULL,
  `valor` int(255) DEFAULT NULL,
  `iva` int(255) DEFAULT NULL,
  `utilidad` int(255) DEFAULT NULL,
  `costo` int(255) DEFAULT NULL,
  `fecha` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devol_proveedor`
--

CREATE TABLE `devol_proveedor` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `codigo` int(255) DEFAULT NULL,
  `id_proveedor` int(255) DEFAULT NULL,
  `num_factura` int(255) DEFAULT NULL,
  `productos` text DEFAULT NULL,
  `valor` int(255) DEFAULT NULL,
  `iva` int(255) DEFAULT NULL,
  `costo` int(255) DEFAULT NULL,
  `fecha` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `id_sucursal`, `fecha`, `descripcion`, `valor`) VALUES
(2, 1, '2021-02-18', 'Compra de paños (Factura)', 3000),
(3, 1, '2021-02-18', 'Agua ', 1000),
(4, 1, '2021-02-19', 'MOTO TAXI PARA LA CASA, JESU', 2000),
(5, 1, '2021-02-23', 'MOTO TAXI JESU PASAJE DE IDA.', 2000),
(6, 1, '2021-02-24', 'agua', 1000),
(7, 1, '2021-02-24', 'compras de toallas Familia', 3200),
(8, 1, '2021-02-24', 'MOTO TAXI', 2000),
(9, 1, '2021-02-25', 'AGUA', 1000),
(10, 1, '2021-02-25', 'MOTO TAXI', 2000),
(11, 1, '2021-02-26', 'Pago de la Factura de Luz ', 36500),
(12, 1, '2021-02-26', 'MOTO TAXI', 4000),
(13, 1, '2021-02-27', 'PASAJES', 4000),
(14, 1, '2021-03-01', 'agua ', 1000),
(15, 1, '2021-03-02', 'Instalación del cableado extra para el internet. ', 70000),
(16, 1, '2021-03-03', 'Toallas', 4400),
(17, 1, '2021-03-03', 'Agua ? ', 2000),
(18, 1, '2021-03-03', 'Pintura y Tiner \r\nfactura 58000\r\nadicional mas Tiner  20000', 78000),
(19, 1, '2021-03-04', 'Mano De Obra (Esteras)', 100000),
(20, 1, '2021-03-05', 'recarga celular ', 6000),
(21, 1, '2021-03-05', 'ARRIENDO (Marzo)', 800000),
(22, 1, '2021-03-05', 'agua', 1000),
(23, 1, '2021-03-06', 'agua ', 1000),
(24, 1, '2021-02-15', 'nominas (Jesús) ', 250000),
(25, 1, '2021-02-15', 'Nomina (Mary)', 250000),
(26, 1, '2021-02-28', 'Nomina (Jesus)', 250000),
(27, 1, '2021-02-28', 'Nomina (Mary)', 250000),
(28, 1, '2021-03-09', 'PAÑITOS \r\n', 3400),
(29, 1, '2021-03-10', 'agua y marcador ', 3000),
(30, 1, '2021-03-12', 'compra de clorox y desinfectante ', 9000),
(34, 1, '2021-03-17', 'pael ', 2600),
(32, 1, '2021-03-12', 'agua', 1000),
(35, 1, '2021-03-17', 'agua', 1000),
(36, 1, '2021-03-18', 'agua', 1000),
(37, 1, '2021-03-19', 'agua', 1500),
(38, 1, '2021-03-20', 'agua', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciar_punto_venta`
--

CREATE TABLE `iniciar_punto_venta` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `basecaja` int(11) NOT NULL,
  `totalingresos` int(11) NOT NULL,
  `totalgastos` int(11) NOT NULL,
  `montoentregado` int(11) NOT NULL,
  `diferencia` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `iniciar_punto_venta`
--

INSERT INTO `iniciar_punto_venta` (`id`, `id_sucursal`, `fecha_inicio`, `fecha_cierre`, `basecaja`, `totalingresos`, `totalgastos`, `montoentregado`, `diferencia`, `estado`) VALUES
(1, 1, '2021-02-05', '2021-02-05', 150000, 83000, 0, 83000, 0, 0),
(2, 1, '2021-02-06', '2021-02-06', 150000, 1736998, 0, 1736998, 0, 0),
(3, 1, '2021-02-07', '2021-02-07', 150000, 879000, 0, 879000, 0, 0),
(4, 1, '2021-02-08', '2021-02-08', 150000, 803000, 0, 803000, 0, 0),
(5, 1, '2021-02-09', '2021-02-09', 150000, 644996, 0, 644996, 0, 0),
(6, 1, '2021-02-10', '2021-02-10', 150000, 1565000, 0, 1565000, 0, 0),
(7, 1, '2021-02-11', '2021-02-11', 150000, 447798, 0, 447800, 2, 0),
(8, 1, '2021-02-12', '2021-02-12', 150000, 831996, 0, 832000, 4, 0),
(9, 1, '2021-02-13', '2021-02-13', 150000, 460000, 0, 460000, 0, 0),
(10, 1, '2021-02-14', '2021-02-14', 150000, 175000, 0, 175000, 0, 0),
(11, 1, '2021-02-15', '2021-02-16', 150000, 541998, 0, 542000, 2, 0),
(12, 1, '2021-02-16', '2021-02-17', 150000, 416000, 0, 416000, 0, 0),
(13, 1, '2021-02-17', '2021-02-18', 150000, 793000, 0, 793000, 0, 0),
(14, 1, '2021-02-18', '2021-02-19', 150000, 1391000, 4000, 1387000, 0, 0),
(15, 1, '2021-02-19', '2021-02-20', 150000, 1713000, 2000, 1711000, 0, 0),
(16, 1, '2021-02-20', '2021-02-21', 150000, 823500, 0, 823500, 0, 0),
(17, 1, '2021-02-21', '2021-02-21', 150000, 592000, 0, 592000, 0, 0),
(18, 1, '2021-02-22', '2021-02-23', 150000, 742000, 0, 747000, 5000, 0),
(19, 1, '2021-02-23', '2021-02-24', 150000, 1085000, 2000, 1083000, 0, 0),
(20, 1, '2021-02-24', '2021-02-24', 150000, 265000, 6200, 258800, 0, 0),
(21, 1, '2021-02-25', '2021-02-25', 150000, 916000, 3000, 913000, 0, 0),
(22, 1, '2021-02-26', '2021-02-26', 150000, 593000, 40500, 552500, 0, 0),
(23, 1, '2021-02-27', '2021-02-27', 150000, 1317000, 4000, 1313000, 0, 0),
(24, 1, '2021-02-28', '2021-02-28', 150000, 489000, 0, 489000, 0, 0),
(25, 1, '2021-03-01', '2021-03-01', 150000, 1052000, 1000, 1051000, 0, 0),
(26, 1, '2021-03-02', '2021-03-02', 150000, 998000, 70000, 928000, 0, 0),
(27, 1, '2021-03-03', '2021-03-04', 150000, 1761000, 84400, 1676600, 0, 0),
(28, 1, '2021-03-04', '2021-03-04', 150000, 436500, 100000, 336500, 0, 0),
(29, 1, '2021-03-05', '2021-03-05', 150000, 1409000, 807000, 602000, 0, 0),
(30, 1, '2021-03-06', '2021-03-06', 150000, 484000, 1000, 483000, 0, 0),
(31, 1, '2021-03-07', '2021-03-07', 150000, 64000, 0, 64000, 0, 0),
(32, 1, '2021-03-08', '2021-03-08', 150000, 533000, 0, 533000, 0, 0),
(33, 1, '2021-03-09', '2021-03-09', 150000, 404000, 3400, 400600, 0, 0),
(34, 1, '2021-03-10', '2021-03-10', 150000, 1012998, 3000, 1010000, 2, 0),
(35, 1, '2021-03-11', '2021-03-12', 150000, 709000, 0, 709000, 0, 0),
(36, 1, '2021-03-12', '2021-03-12', 150000, 676000, 10000, 666000, 0, 0),
(37, 1, '2021-03-13', '2021-03-13', 150000, 1223000, 0, 1222000, -1000, 0),
(38, 1, '2021-03-14', '2021-03-14', 150000, 1242000, 0, 1243000, 1000, 0),
(39, 1, '2021-03-15', '2021-03-15', 150000, 749000, 0, 749000, 0, 0),
(40, 1, '2021-03-16', '2021-03-16', 150000, 503000, 0, 493000, -10000, 0),
(41, 1, '2021-03-17', '2021-03-17', 150000, 554000, 3600, 550400, 0, 0),
(42, 1, '2021-03-18', '2021-03-18', 150000, 1504000, 1000, 1503000, 0, 0),
(43, 1, '2021-03-19', '2021-03-19', 150000, 155000, 1500, 153500, 0, 0),
(44, 1, '2021-03-20', '2021-03-20', 150000, 1108000, 1000, 1107000, 0, 0),
(45, 1, '2021-03-21', '2021-03-21', 150000, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `descripcion`, `porcentaje`) VALUES
(1, '2.2 % de interes por mora', 2.2),
(2, '3.0 % de interes por mora', 3),
(3, '3.5 % de interes por mora', 3.5),
(4, '4.0 % de interes por mora', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `nombre`) VALUES
(1, 'Mesa NÂ°1'),
(2, 'Mesa NÂ°2'),
(3, 'Mesa NÂ°3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noexistente`
--

CREATE TABLE `noexistente` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noexistente`
--

INSERT INTO `noexistente` (`id`, `id_sucursal`, `fecha`, `valor`, `detalles`) VALUES
(1, 1, '2021-02-06', 20000, '2 hidrogel'),
(2, 1, '2021-02-07', 18000, '2 hidrogel'),
(3, 1, '2021-02-08', 8000, 'cambio de cinta pover'),
(4, 1, '2021-02-10', 10000, '1 hidro gel'),
(5, 1, '2021-02-13', 14000, 'sofware note 8'),
(6, 1, '2021-02-18', 11000, 'venta de parlante para computador Ref. BL-A11 '),
(7, 1, '2021-02-20', 3500, 'forro universal'),
(8, 1, '2021-02-23', 6000, 'Venta de manilla xiaomi '),
(9, 1, '2021-02-28', 6000, 'Vidrio Para Tablet'),
(10, 1, '2021-03-03', 10000, 'Software con el señor Julián '),
(11, 1, '2021-03-04', 22500, 'Display J5 (ganancia)'),
(12, 1, '2021-03-05', 40000, 'Servicio Técnico, Pin de Carga-Cuenta '),
(13, 1, '2021-03-09', 10000, 'HIDROGEL'),
(15, 1, '2021-03-15', 10000, 'hidrogel ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `producto_stock` int(11) NOT NULL,
  `cliente_mora` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `id_sucursal`, `producto_stock`, `cliente_mora`) VALUES
(1, 1, 221, 0),
(2, 2, 221, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `num_inicio_factura` int(255) DEFAULT NULL,
  `generar_codigo` int(11) NOT NULL,
  `codigo_prod` int(11) NOT NULL,
  `num_plansepare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id`, `id_sucursal`, `num_inicio_factura`, `generar_codigo`, `codigo_prod`, `num_plansepare`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `codigo` int(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `tipo` int(255) DEFAULT NULL,
  `id_plazo` int(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_cliente` int(255) DEFAULT NULL,
  `detalle_venta` text DEFAULT NULL,
  `sub_total` int(255) DEFAULT NULL,
  `iva` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `utilidad` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perdida`
--

CREATE TABLE `perdida` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perdida`
--

INSERT INTO `perdida` (`id`, `id_sucursal`, `fecha`, `detalles`, `total`, `descripcion`) VALUES
(2, 1, '2021-02-19', '[{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"subtotal\":\"4500\"}]', 4500, 'No la lee los equipos '),
(3, 1, '2021-02-23', '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"subtotal\":\"1200\"}]', 1200, 'vidrio que le cayo sucio y se daño'),
(4, 1, '2021-02-24', '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"subtotal\":\"1200\"}]', 1200, 'no le quedo bien al celular del cliente '),
(5, 1, '2021-02-25', '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"subtotal\":\"1200\"}]', 1200, 'PARTIDO '),
(6, 1, '2021-03-19', '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"subtotal\":\"2400\"}]', 2400, 'partidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plansepare`
--

CREATE TABLE `plansepare` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `plazo` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `detalle_venta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazo`
--

CREATE TABLE `plazo` (
  `id` int(255) NOT NULL,
  `decripcion` varchar(255) DEFAULT NULL,
  `num_dias` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plazo`
--

INSERT INTO `plazo` (`id`, `decripcion`, `num_dias`) VALUES
(1, 'plazo de 5 Dias', 5),
(2, 'plazo de 10 Dias', 10),
(3, 'plazo de 15 Dias', 15),
(4, 'plazo de 30 Dias', 30),
(5, 'plazo de 45 Dias', 45),
(6, 'plazo de 60 Dias', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_vendor` int(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `costo` int(255) DEFAULT NULL,
  `precioventa` int(255) DEFAULT NULL,
  `utilidad` int(255) DEFAULT NULL,
  `id_categoria` int(255) DEFAULT NULL,
  `can_inicial` int(255) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `codigo_fabr` varchar(255) DEFAULT NULL,
  `cantidad_min` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `id_sucursal`, `id_vendor`, `codigo`, `nombre`, `costo`, `precioventa`, `utilidad`, `id_categoria`, `can_inicial`, `imagen`, `codigo_fabr`, `cantidad_min`) VALUES
(2, 1, 0, '1', 'telefono neo m6', 34000, 50000, 0, 1, 3, '0', '0', 4),
(7, 1, 0, '7', 'telefono lesia', 28000, 50000, 0, 1, 3, '0', '0', 3),
(8, 1, 0, '8', 'telefono m2402', 55000, 80000, 0, 1, 1, '0', '0', 1),
(9, 1, 0, '9', 'telefono m2401', 85000, 130000, 0, 1, 4, '0', '0', 2),
(10, 1, 0, '10', 'telefono nokia 110', 85000, 110000, 0, 1, 2, '0', '0', 2),
(11, 1, 0, '11', 'telefono virzon v205', 105000, 170000, 0, 1, 0, '0', '0', 2),
(12, 1, 0, '12', 'telefono kat b26', 190000, 250000, 0, 1, 1, '0', '0', 2),
(13, 1, 0, '13', 'telefono poco m3 128gb', 660000, 730000, 0, 1, 1, '0', '0', 1),
(14, 1, 0, '14', 'telefono moto e6 play', 310000, 360000, 0, 1, 2, '0', '0', 2),
(15, 1, 0, '15', 'telefono alcatel 1', 162000, 210000, 0, 1, 1, '0', '0', 1),
(16, 1, 0, '16', 'telefono alcatel 1c', 175000, 220000, 0, 1, 3, '0', '0', 2),
(17, 1, 0, '17', 'telefono a01 core', 265000, 300000, 0, 1, 2, '0', '0', 2),
(18, 1, 0, '18', 'telefono a01', 358000, 400000, 0, 1, 2, '0', '0', 2),
(20, 1, 0, '20', 'telefono a12', 555000, 630000, 0, 1, 1, '0', '0', 2),
(21, 1, 0, '21', 'telefono a21s 64gb', 655000, 700000, 0, 1, 1, '0', '0', 1),
(22, 1, 0, '22', 'telefono hyundai e475', 138000, 170000, 0, 1, 3, '0', '0', 0),
(23, 1, 0, '23', 'telefono hyundai e504', 193000, 230000, 0, 1, 3, '0', '0', 2),
(24, 1, 0, '24', 'telefono hyundai e553', 205000, 240000, 0, 1, 2, '0', '0', 2),
(25, 1, 0, '25', 'telefono iswang kronno', 153000, 200000, 0, 1, 2, '0', '0', 2),
(26, 1, 0, '26', 'telefono unonu w50', 150000, 180000, 0, 1, 1, '0', '0', 2),
(27, 1, 0, '27', 'telefono unonu w4001', 120000, 160000, 0, 1, 2, '0', '0', 2),
(28, 1, 0, '28', 'telefono sky p4', 123000, 150000, 0, 1, 0, '0', '0', 2),
(29, 1, 0, '29', 'telefono camon 15 air', 485000, 520000, 0, 1, 1, '0', '0', 2),
(30, 1, 0, '30', 'telefono y 5 2019', 347000, 400000, 0, 1, 1, '0', '0', 1),
(31, 1, 0, '31', 'telefono y6p', 492000, 530000, 0, 1, 1, '0', '0', 2),
(32, 1, 0, '32', 'telefono y7p', 562000, 590000, 0, 1, 1, '0', '0', 2),
(33, 1, 0, '33', 'telefono honor 7s', 295000, 330000, 0, 1, 1, '0', '0', 2),
(34, 1, 0, '34', 'telefono honor 8a', 357000, 400000, 0, 1, 1, '0', '0', 2),
(35, 1, 0, '35', 'telefono moto c', 220000, 250000, 0, 1, 2, '0', '0', 2),
(36, 1, 0, '36', 'telefono moto g8 plus', 667000, 700000, 0, 1, 1, '0', '0', 2),
(37, 1, 0, '37', 'telefono moto g7 play', 427000, 480000, 0, 1, 1, '0', '0', 2),
(38, 1, 0, '38', 'telefono moto g7', 567000, 580000, 0, 1, 1, '0', '0', 2),
(39, 1, 0, '39', 'telefono moto g9 play', 597000, 650000, 0, 1, 1, '0', '0', 2),
(40, 1, 0, '40', 'telefono moto one macro', 557000, 580000, 0, 1, 1, '0', '0', 2),
(41, 1, 0, '41', 'telefono moto one fusion 128gb', 652000, 700000, 0, 1, 0, '0', '0', 2),
(42, 1, 0, '42', 'telefono zte l130', 128000, 160000, 0, 1, 1, '0', '0', 2),
(43, 1, 0, '43', 'telefono epik k503t', 183000, 230000, 0, 1, 1, '0', '0', 1),
(44, 1, 0, '44', 'telefono a31', 755000, 830000, 0, 1, 1, '0', '0', 2),
(45, 1, 0, '45', 'telefono note 8 128gb', 605000, 650000, 0, 1, 2, '0', '0', 1),
(46, 1, 0, '46', 'telefono epik k573', 255000, 270000, 0, 1, 1, '0', '0', 2),
(47, 1, 0, '47', 'telefono spark 6 go 32gb', 310000, 370000, 0, 1, 2, '0', '0', 2),
(48, 1, 0, '48', 'spark 6 go 64gb', 375000, 420000, 0, 1, 0, '0', '0', 1),
(49, 1, 0, '49', 'telefono movic heros 7', 250000, 300000, 0, 1, 2, '0', '0', 2),
(50, 1, 0, '50', 'telefono movic a6003', 230000, 270000, 0, 1, 2, '0', '0', 2),
(51, 1, 0, '51', 'telefono movic a6001', 225000, 270000, 0, 1, 3, '0', '0', 1),
(52, 1, 0, '52', 'telefono redmi 9 64gb', 535000, 590000, 0, 1, 0, '0', '0', 1),
(53, 1, 0, '53', 'telefono redmi 9c 32gb', 480000, 530000, 0, 1, 1, '0', '0', 1),
(54, 1, 0, '54', 'telefono redmi 9c 64gb', 515000, 570000, 0, 1, 1, '0', '0', 1),
(55, 1, 0, '55', 'telefono note 9s 4 ram 128gb', 700000, 780000, 0, 1, 0, '0', '0', 2),
(56, 1, 0, '56', 'tablet blaytec ', 225000, 250000, 0, 2, 1, '0', '0', 1),
(57, 1, 0, '57', 'tablet logic', 135000, 160000, 0, 2, 0, '0', '0', 1),
(58, 1, 0, '58', 'tablet virzo', 200000, 250000, 0, 2, 1, '0', '0', 1),
(59, 1, 0, '59', 'tablet alcatel 3g', 275000, 310000, 0, 2, 1, '0', '0', 2),
(60, 1, 0, '60', 'telefono a11', 505000, 580000, 0, 1, 1, '0', '0', 2),
(61, 1, 0, '61', 'reloj band 5 de xiaomi', 130000, 160000, 0, 4, 1, '0', '0', 1),
(62, 1, 0, '62', 'bluetooth earbuds xiaomi', 70000, 100000, 0, 5, 2, '0', '0', 1),
(63, 1, 0, '63', 'cargador mt-17', 7000, 15000, 0, 6, 6, '0', '0', 5),
(64, 1, 0, '64', 'cargador mt-24', 7000, 15000, 0, 6, 10, '0', '0', 5),
(65, 1, 0, '65', 'cargador iphone', 14000, 30000, 0, 6, 5, '0', '0', 5),
(66, 1, 0, '66', 'cargador mt-16', 8000, 18000, 0, 6, 9, '0', '0', 5),
(67, 1, 0, '67', 'spartan  c109', 9000, 18000, 0, 6, 6, '0', '0', 6),
(68, 1, 0, '68', 'spartan c107', 9000, 18000, 0, 6, 10, '0', '0', 10),
(69, 1, 0, '69', 'cargador mt25', 7000, 15000, 0, 6, 10, '0', '0', 5),
(70, 1, 0, '70', 'spartan c104', 8500, 18000, 0, 6, 10, '0', '0', 10),
(71, 1, 0, '71', 'cargador mt-21', 9000, 20000, 0, 6, 9, '0', '0', 5),
(73, 1, 0, '73', 'cargador mt-23', 8500, 18000, 0, 6, 7, '0', '0', 5),
(74, 1, 0, '74', 'cargador turbo g4 plus', 8000, 20000, 0, 6, 10, '0', '0', 5),
(75, 1, 0, '75', 'cargador clk 3a 01c tipo c', 8000, 20000, 0, 6, 7, '0', '0', 5),
(76, 1, 0, '76', 'cargador clk 3a 02v v8', 7000, 15000, 0, 6, 6, '0', '0', 15),
(77, 1, 0, '77', 'cargador pluyin mt-12', 3000, 10000, 0, 6, 4, '0', '0', 7),
(78, 1, 0, '78', 'cargador qc-01 v8', 10000, 20000, 0, 6, 5, '0', '0', 10),
(79, 1, 0, '79', 'cargador qc-01 tipo c', 10000, 20000, 0, 6, 8, '0', '0', 10),
(80, 1, 0, '80', 'cargador v8 sencillo', 2300, 5000, 0, 6, 15, '0', '0', 5),
(81, 1, 0, '81', 'cargador v3 sencillo', 2300, 5000, 0, 6, 18, '0', '0', 5),
(82, 1, 0, '82', 'cargador clk 2a-01 v8', 5000, 12000, 140, 6, 7, '0', '0', 18),
(83, 1, 0, '83', 'cargador clk 3 -02 tipo c', 7000, 18000, 0, 6, 9, '0', '0', 9),
(84, 1, 0, '84', 'cargador ridex 2a', 2800, 10000, 0, 6, 18, '0', '0', 5),
(85, 1, 0, '85', 'cargador motorola ', 12000, 45000, 0, 6, 3, '0', '0', 3),
(86, 1, 0, '86', 'cargador huawei', 12000, 45000, 0, 6, 2, '0', '0', 5),
(87, 1, 0, '87', 'cargador samsung', 12000, 45000, 0, 6, 3, '0', '0', 5),
(88, 1, 0, '88', 'manos libres m-02', 6500, 15000, 0, 5, 5, '0', '0', 5),
(89, 1, 0, '89', 'manos libres m-01', 3500, 10000, 0, 5, 11, '0', '0', 5),
(90, 1, 0, '90', 'manos libres sky plus', 4500, 10000, 0, 5, 5, '0', '0', 5),
(91, 1, 0, '91', 'manos libres finos surtidno', 7000, 15000, 0, 5, 71, '0', '0', 5),
(92, 1, 0, '92', 'manos libres xt 838 drxb 810', 7000, 15000, 0, 5, 12, '0', '0', 5),
(93, 1, 0, '93', 'manos libres s5-s6-j69-t83', 3000, 10000, 0, 5, 27, '0', '0', 5),
(94, 1, 0, '94', 'manos libres xt835 - an92-xt1no', 6000, 15000, 0, 5, 30, '0', '0', 5),
(95, 1, 0, '95', 'manos libres a16', 9000, 25000, 0, 5, 2, '0', '0', 5),
(96, 1, 0, '96', 'manos libres an 23 - an 75-an1no', 6000, 15000, 0, 5, 18, '0', '0', 5),
(97, 1, 0, '97', 'manos libres iphono', 11000, 25000, 0, 5, 5, '0', '0', 5),
(98, 1, 0, '98', 'manos libres an 64 - mt-12', 5000, 15000, 0, 5, 12, '0', '0', 5),
(99, 1, 0, '99', 'manos libres j5', 2000, 5000, 0, 5, 14, '0', '0', 5),
(100, 1, 0, '100', 'manos libres m-16', 6000, 15000, 0, 5, 4, '0', '0', 5),
(101, 1, 0, '101', 'manos libres m-12', 5000, 15000, 0, 5, 4, '0', '0', 5),
(102, 1, 0, '102', 'manos libres rt2110', 3500, 10000, 0, 5, 6, '0', '0', 5),
(103, 1, 0, '103', 'manos libres 5830-r- samsung', 4000, 15000, 0, 5, 5, '0', '0', 5),
(104, 1, 0, '104', ' bluetooth k340 yookie', 26000, 40000, 0, 5, 2, '0', '0', 2),
(105, 1, 0, '105', 'bluetooth earbeans bt', 55000, 80000, 0, 5, 0, '0', '0', 1),
(106, 1, 0, '106', 'bluetood earbuds a8l', 50000, 80000, 0, 5, 1, '0', '0', 1),
(107, 1, 0, '107', 'bluetooth  airs pro', 24000, 50000, 0, 5, 2, '0', '0', 1),
(108, 1, 0, '108', 'bluetooth mtf m-10', 25000, 50000, 0, 5, 2, '0', '0', 2),
(109, 1, 0, '109', 'bluetooth bt mt-k2 martech', 40000, 60000, 0, 5, 2, '0', '0', 2),
(110, 1, 0, '110', 'cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118', 4500, 15000, 0, 7, 37, '0', '0', 56),
(111, 1, 0, '111', 'cables bolsa v8 b.e', 2500, 10000, 0, 7, 15, '0', '0', 18),
(112, 1, 0, '112', 'cables v8 d.o', 3500, 10000, 185, 7, 20, '0', '0', 20),
(113, 1, 0, '113', 'cables iphone bolsa económica ', 4500, 12000, 166, 7, 4, '0', '0', 10),
(116, 1, 0, '116', 'cables inteligente', 9000, 25000, 0, 7, 5, '0', '0', 5),
(117, 1, 0, '117', 'cable iphone tipo original', 8500, 20000, 0, 7, 0, '0', '0', 5),
(118, 1, 0, '118', 'cables mt 115 android', 3000, 10000, 0, 7, 9, '0', '0', 5),
(119, 1, 0, '119', 'cable mt-118', 3500, 10000, 0, 7, 0, '0', '0', 5),
(120, 1, 0, '120', 'cables clk tpu-01', 3500, 10000, 0, 7, 14, '0', '0', 5),
(121, 1, 0, '121', 'cables spartan d-202', 4000, 12000, 0, 7, 18, '0', '0', 5),
(123, 1, 0, '123', 'cables spartan d-216', 3500, 12000, 0, 7, 6, '0', '0', 5),
(124, 1, 0, '124', 'cables sin bolsa', 2000, 5000, 0, 7, 20, '0', '0', 5),
(125, 1, 0, '125', 'cables 1x1 auxiliar', 3500, 10000, 0, 7, 9, '0', '0', 5),
(126, 1, 0, '126', 'cables3x3', 3000, 10000, 0, 7, 5, '0', '0', 5),
(127, 1, 0, '127', 'cables hdmi 1.5 metros', 6000, 15000, 0, 7, 6, '0', '0', 5),
(128, 1, 0, '128', 'cables 2x1', 2000, 10000, 0, 7, 7, '0', '0', 2),
(129, 1, 0, '129', 'cables 1x1 5 metros', 4500, 12000, 0, 7, 1, '0', '0', 5),
(130, 1, 0, '130', 'memoria micros grabada', 4500, 15000, 0, 8, 62, '0', '0', 5),
(131, 1, 0, '131', 'memoria micro 4gb', 9500, 15000, 0, 8, 5, '0', '0', 5),
(132, 1, 0, '132', 'memoria micro 8gb', 10500, 20000, 0, 8, 17, '0', '0', 5),
(133, 1, 0, '133', 'memoria micro 16bg', 11500, 25000, 0, 8, 8, '0', '0', 6),
(134, 1, 0, '134', 'memoria micro 32gb', 14000, 30000, 0, 8, 1, '0', '0', 5),
(135, 1, 0, '135', 'memoria micro 64gb', 29000, 45000, 0, 8, 1, '0', '0', 5),
(136, 1, 0, '135', 'memoria usb 4gb', 9500, 15000, 0, 8, 17, '0', '0', 20),
(137, 1, 0, '136', 'memoria usb 8gb', 10500, 20000, 0, 8, 18, '0', '0', 20),
(138, 1, 0, '137', 'memoria usb 16gb', 11500, 25000, 0, 8, 3, '0', '0', 2),
(139, 1, 0, '138', 'memoria usb 32gb', 14000, 30000, 0, 8, 3, '0', '0', 1),
(140, 1, 0, '140', 'memoria usb 64gb', 29000, 45000, 0, 8, 1, '0', '0', 5),
(141, 1, 0, '141', 'memoria multilector', 2500, 6000, 0, 8, 5, '0', '0', 5),
(142, 1, 0, '142', 'memoria microlector', 1800, 5000, 0, 8, 6, '0', '0', 5),
(143, 1, 0, '143', 'parlante 313 bt', 29000, 45000, 0, 9, 2, '0', '0', 2),
(144, 1, 0, '144', 'parlante p-46', 90000, 130000, 0, 9, 3, '0', '0', 3),
(145, 1, 0, '145', 'parlante kts-1149a', 70000, 110000, 0, 9, 2, '0', '0', 2),
(146, 1, 0, '146', 'parlante martech 1805', 100000, 150000, 0, 9, 2, '0', '0', 2),
(147, 1, 0, '147', 'parlante martech 1804', 100000, 150000, 0, 9, 2, '0', '0', 2),
(148, 1, 0, '148', 'parlante 6.5 f65', 60000, 75000, 0, 9, 3, '0', '0', 2),
(149, 1, 0, '149', 'parlante on-301 pequeno', 15000, 25000, 0, 9, 8, '0', '0', 2),
(150, 1, 0, '150', 'parlante nd6008', 105000, 150000, 0, 9, 1, '0', '0', 3),
(151, 1, 0, '151', 'parlante bs105', 30000, 50000, 0, 9, 1, '0', '0', 2),
(152, 1, 0, '152', 'parlante mt-1637 bt', 22000, 40000, 0, 9, 2, '0', '0', 2),
(153, 1, 0, '153', 'reproductor mp3 pantalla', 12000, 25000, 0, 10, 1, '0', '0', 2),
(154, 1, 0, '154', 'reproductor mp3 sin pantalla', 7500, 15000, 0, 10, 2, '0', '0', 2),
(155, 1, 0, '155', 'diadema lkd 100', 26000, 35000, 0, 11, 3, '0', '0', 2),
(156, 1, 0, '156', 'diadema sky plus mb23', 27000, 40000, 0, 11, 1, '0', '0', 2),
(157, 1, 0, '157', 'diadema n65', 24000, 35000, 0, 11, 5, '0', '0', 2),
(158, 1, 0, '158', 'diadema dmz112', 29000, 50000, 0, 11, 3, '0', '0', 2),
(159, 1, 0, '159', 'diadema gato bk1', 65000, 100000, 0, 11, 2, '0', '0', 2),
(160, 1, 0, '160', 'diadema gamer', 70000, 95000, 0, 11, 1, '0', '0', 2),
(161, 1, 0, '161', 'cargador royal 3a', 9000, 20000, 0, 6, 30, '0', '0', 2),
(162, 1, 0, '162', 'tdt ', 40000, 55000, 0, 12, 9, '0', '0', 2),
(163, 1, 0, '163', 'control contro del juegos x3', 39000, 60000, 0, 13, 1, '0', '0', 2),
(164, 1, 0, '164', 'mause l200', 16000, 25000, 0, 14, 1, '0', '0', 1),
(165, 1, 0, '165', 'mause 6m01', 10000, 20000, 0, 14, 0, '0', '0', 2),
(167, 1, 0, '167', 'mause w330', 15000, 30000, 0, 14, 1, '0', '0', 2),
(168, 1, 0, '168', 'mause ss-3858', 7500, 18000, 140, 14, 1, '0', '0', 1),
(169, 1, 0, '169', 'mause jk032', 14000, 25000, 0, 14, 1, '0', '0', 2),
(170, 1, 0, '170', 'mause z32', 18000, 30000, 0, 14, 1, '0', '0', 2),
(171, 1, 0, '171', 'mause gm03', 13000, 28000, 0, 14, 1, '0', '0', 2),
(172, 1, 0, '172', 'mause a30', 17000, 28000, 0, 14, 0, '0', '0', 2),
(173, 1, 0, '173', 'teclado ze960', 27000, 40000, 0, 15, 1, '0', '0', 2),
(174, 1, 0, '174', 'teclado k328', 20000, 30000, 0, 15, 1, '0', '0', 2),
(175, 1, 0, '175', 'teclado combo ze-930', 29000, 60000, 0, 15, 1, '0', '0', 2),
(176, 1, 0, '176', 'parlante ms1710', 21000, 40000, 0, 9, 2, '0', '0', 2),
(177, 1, 0, '177', 'parlante jr5161', 510000, 620000, 0, 9, 1, '0', '0', 2),
(178, 1, 0, '178', 'parlante jr5181', 630000, 720000, 0, 9, 1, '0', '0', 2),
(179, 1, 0, '179', 'bateria j5 AAA', 15000, 30000, 0, 16, 5, '0', '0', 5),
(180, 1, 0, '180', 'bateria j5', 10000, 20000, 0, 16, 1, '0', '0', 5),
(181, 1, 0, '181', 'bateria j5 original', 20000, 50000, 0, 16, 3, '0', '0', 5),
(182, 1, 0, '182', 'bateria j6', 20000, 50000, 0, 16, 1, '0', '0', 2),
(183, 1, 0, '183', 'bateria j7 prime', 32000, 60000, 0, 16, 1, '0', '0', 2),
(184, 1, 0, '184', 'bateria j7 original', 20000, 45000, 0, 16, 0, '0', '0', 2),
(185, 1, 0, '185', 'bateria j2', 10000, 20000, 0, 16, 3, '0', '0', 2),
(186, 1, 0, '186', 'bateria s3 mini', 8000, 20000, 0, 16, 3, '0', '0', 2),
(187, 1, 0, '187', 'bateria s5', 10000, 20000, 0, 16, 2, '0', '0', 2),
(188, 1, 0, '188', 'bateria j1 ace', 10000, 20000, 0, 16, 3, '0', '0', 2),
(189, 1, 0, '189', 'bateria ace 4', 7000, 20000, 0, 16, 2, '0', '0', 2),
(190, 1, 0, '190', 'bateria s4 mini', 9000, 20000, 0, 16, 2, '0', '0', 2),
(191, 1, 0, '191', 'bateria s4', 7000, 20000, 0, 16, 1, '0', '0', 2),
(192, 1, 0, '192', 'bateria s3', 8000, 20000, 0, 16, 3, '0', '0', 2),
(193, 1, 0, '193', 'bateria j1', 10000, 20000, 0, 16, 1, '0', '0', 2),
(194, 1, 0, '194', 'bateria sm 5830', 5000, 15000, 0, 16, 2, '0', '0', 2),
(195, 1, 0, '195', 'bateria s2', 7000, 15000, 0, 16, 1, '0', '0', 2),
(196, 1, 0, '196', 'bateria sm 8260', 6000, 15000, 0, 16, 1, '0', '0', 2),
(197, 1, 0, '197', 'bateria ace 3', 8000, 20000, 0, 16, 1, '0', '0', 2),
(198, 1, 0, '198', 'bateria f250', 3500, 10000, 0, 16, 3, '0', '0', 2),
(199, 1, 0, '199', 'bateria mate 8', 25000, 50000, 0, 16, 1, '0', '0', 2),
(200, 1, 0, '200', 'bateria y7 prime', 24000, 50000, 0, 16, 1, '0', '0', 2),
(201, 1, 0, '201', 'bateria p30 lite', 24000, 50000, 0, 16, 1, '0', '0', 2),
(202, 1, 0, '202', 'bateria y 625', 9000, 20000, 0, 16, 1, '0', '0', 2),
(203, 1, 0, '203', 'mono pop xt10', 20000, 35000, 0, 17, 3, '0', '0', 2),
(204, 1, 0, '204', 'protector bolsa sumergible', 8000, 20000, 0, 18, 1, '0', '0', 0),
(205, 1, 0, '205', 'protector brasalete', 15000, 25000, 0, 18, 1, '0', '0', 0),
(206, 1, 0, '206', 'soporte jolder de carro', 7000, 15000, 0, 19, 0, '0', '0', 2),
(207, 1, 0, '207', 'diadema jr', 50000, 70000, 0, 11, 1, '0', '0', 2),
(208, 1, 0, '208', 'bateria y5II', 9000, 20000, 0, 16, 3, '0', '0', 2),
(209, 1, 0, '209', 'bateria psmart', 17000, 45000, 0, 16, 1, '0', '0', 2),
(210, 1, 0, '210', 'bateria mate 20 lite', 29000, 50000, 0, 16, 1, '0', '0', 2),
(211, 1, 0, '211', 'bateria p9 lite', 29000, 50000, 0, 16, 1, '0', '0', 2),
(212, 1, 0, '212', 'bateria p10 lite', 21000, 45000, 0, 16, 1, '0', '0', 2),
(213, 1, 0, '213', 'parlante j&r 5162', 650000, 750000, 0, 9, 0, '0', '0', 1),
(214, 1, 0, '214', 'bateria moto g1', 19000, 45000, 0, 16, 1, '0', '0', 2),
(215, 1, 0, '215', 'bateria e6 play', 29000, 50000, 0, 16, 1, '0', '0', 2),
(216, 1, 0, '216', 'bateria e6 plus', 29000, 50000, 0, 16, 1, '0', '0', 2),
(217, 1, 0, '217', 'bateria g7 power', 29000, 50000, 0, 16, 1, '0', '0', 2),
(218, 1, 0, '218', 'bateria e5 play', 29000, 50000, 0, 16, 2, '0', '0', 2),
(219, 1, 0, '219', 'bateria e5 play', 29000, 50000, 0, 16, 2, '0', '0', 2),
(220, 1, 0, '220', 'bateria moto c', 19000, 40000, 0, 16, 0, '0', '0', 2),
(221, 1, 0, '221', 'bateria iphone 5s', 21000, 40000, 0, 16, 1, '0', '0', 2),
(222, 1, 0, '222', 'bateria iphone 5g', 21000, 40000, 0, 16, 1, '0', '0', 2),
(223, 1, 0, '223', 'bateria iphone 6s', 23000, 20000, 0, 16, 1, '0', '0', 2),
(224, 1, 0, '224', 'bateria iphone 7g', 31000, 50000, 0, 16, 1, '0', '0', 2),
(225, 1, 0, '225', 'bateria 1112 nokia', 3500, 10000, 0, 16, 8, '0', '0', 5),
(226, 1, 0, '226', 'bateria 6101 nokia', 3500, 10000, 0, 16, 9, '0', '0', 5),
(227, 1, 0, '227', 'bateria 1100 nokia', 3500, 10000, 0, 16, 9, '0', '0', 5),
(228, 1, 0, '228', 'bateria bl 4c', 3500, 10000, 0, 16, 7, '0', '0', 5),
(229, 1, 0, '229', 'bateria u3', 14000, 25000, 0, 16, 2, '0', '0', 2),
(230, 1, 0, '230', 'bateria pop c7', 9000, 20000, 0, 16, 4, '0', '0', 2),
(231, 1, 0, '231', 'parlante 12 ndw-12', 180000, 250000, 0, 9, 1, '0', '0', 2),
(232, 1, 0, '232', 'parlante tg 104', 36000, 55000, 0, 9, 1, '0', '0', 2),
(233, 1, 0, '233', 'parlante tg 104', 36000, 55000, 0, 9, 1, '0', '0', 2),
(234, 1, 0, '234', 'parlante tg 138', 48000, 70000, 0, 9, 1, '0', '0', 2),
(235, 1, 0, '235', 'tripode j&r', 42000, 60000, 0, 21, 3, '0', '0', 2),
(236, 1, 0, '236', 'tripode steren', 40000, 55000, 0, 21, 2, '0', '0', 2),
(237, 1, 0, '237', 'tripode pequeno', 30000, 45000, 0, 21, 0, '0', '0', 2),
(238, 1, 0, '238', 'pop soker', 2000, 5000, 0, 22, 52, '0', '0', 2),
(239, 1, 0, '239', 'sim car claro y movistar', 1500, 3000, 0, 23, 32, '0', '0', 2),
(240, 1, 0, '240', 'sim car tigo', 1000, 3000, 0, 23, 9, '0', '0', 2),
(241, 1, 0, '241', 'manos libres samsung original', 23000, 35000, 0, 5, 2, '0', '0', 2),
(242, 1, 0, '242', 'parlante mt-28 mini speaker', 9000, 20000, 0, 9, 5, '0', '0', 5),
(243, 1, 0, '243', 'aro de luz', 55000, 80000, 0, 24, 3, '0', '0', 2),
(244, 1, 0, '244', 'protector latex 7', 8500, 15000, 0, 18, 3, '0', '0', 4),
(245, 1, 0, '245', 'protector  latex 8 y 9', 10000, 20000, 0, 18, 3, '0', '0', 3),
(246, 1, 0, '246', 'protector  carteras universal', 3500, 10000, 0, 18, 8, '0', '0', 9),
(247, 1, 0, '247', 'protector  silicon cover', 8000, 15000, 0, 18, 274, '0', '0', 268),
(248, 1, 0, '248', 'protector antichoques surtido', 4200, 10000, 0, 18, 479, '0', '0', 456),
(249, 1, 0, '249', 'protector silicon case original', 10000, 25000, 0, 18, 171, '0', '0', 169),
(250, 1, 0, '250', 'vidrios sensillo', 800, 5000, 0, 25, 143, '0', '0', 86),
(251, 1, 0, '251', 'vidrios 5d y ceramicado', 1200, 10000, 0, 25, 373, '0', '0', 284),
(252, 1, 0, '252', 'cabezote', 2500, 10000, 0, 28, 3, '0', '0', 2),
(253, 1, 0, '253', 'adaptadores', 1000, 3000, 0, 26, 10, '0', '0', 13),
(257, 1, 0, '257', 'caja de chuzoz', 800, 1000, 0, 1, 100, '0', '0', 10),
(258, 1, 0, '258', 'exibidores para reloj', 1500, 2000, 0, 1, 5, '0', '0', 2),
(259, 1, 0, '259', 'exibidores para celular', 1500, 2000, 0, 1, 134, '0', '0', 5),
(260, 1, 0, '260', 'telefono moto e7 plus', 490000, 580000, 0, 1, 1, '0', '0', 1),
(261, 1, 0, '261', 'telefono moto e4 plus', 345000, 400000, 0, 1, 2, '0', '0', 2),
(262, 1, 0, '262', 'telefono nokia 106', 67000, 90000, 0, 1, 1, '0', '0', 2),
(264, 1, 0, '264', 'telefono mobula 1701-1703', 27000, 45000, 0, 1, 13, '0', '0', 2),
(265, 1, 0, '265', 'telefono kenxinda c1', 27000, 35000, 0, 1, 12, '0', '0', 2),
(266, 1, 0, '266', 'telefono rp nokia 106', 27000, 45000, 0, 1, 1, '0', '0', 1),
(268, 1, 0, '268', 'telefono a10s', 425000, 470000, 0, 1, 3, '0', '0', 1),
(269, 1, 0, '269', 'telefono zte l8', 170000, 200000, 0, 1, 1, '0', '0', 2),
(270, 1, 0, '270', 'telefono alcatel 1v', 242000, 270000, 0, 1, 0, '0', '0', 2),
(271, 1, 0, '271', 'telefono alcatel 1b', 225000, 260000, 15, 1, 1, '0', '0', 0),
(272, 1, 0, '272', 'telefono zte a3 lite', 208000, 250000, 0, 1, 1, '0', '0', 2),
(274, 1, 0, '274', 'teléfono a51', 950000, 1030000, 8, 1, 1, '', '', 1),
(275, 1, 0, '275', 'telefono note 8 64gb', 575000, 630000, 9, 1, 2, '', '', 1),
(276, 1, 0, '276', 'redmi 9 32gb', 480000, 540000, 12, 1, 1, '', '', 1),
(277, 1, 0, '277', 'redmi 9a 32g', 410000, 450000, 9, 1, 1, '', '', 1),
(278, 1, 0, '278', 'note 9 pro 128gb', 940000, 1020000, 8, 1, 1, '', '', 1),
(279, 1, 0, '279', 'reloj nexo', 55000, 90000, 63, 4, 2, '', '', 2),
(280, 1, 0, '280', 'parlante sp-901', 90000, 120000, 33, 9, 0, '', '', 1),
(281, 1, 0, '281', 'bluetooth spartan', 14000, 25000, 78, 5, 2, '', '', 1),
(282, 1, 0, '282', 'mouse w920', 12000, 25000, 108, 14, 1, '', '', 1),
(283, 1, 0, '283', 'mouse m11', 9000, 18000, 100, 14, 2, '', '', 1),
(284, 1, 0, '283', 'teclado combo ws610', 32000, 55000, 71, 15, 1, '', '', 1),
(285, 1, 0, '284', 'cargador mtf bolsa', 6000, 15000, 150, 6, 12, '', '', 10),
(286, 1, 0, '285', 'cargador hw-300 tipo c', 8000, 15000, 87, 6, 10, '', '', 5),
(287, 1, 0, '286', 'cargador hw-300 v8', 7500, 15000, 100, 6, 15, '', '', 10),
(288, 1, 0, '287', 'cargador samsung s7', 7500, 15000, 100, 6, 14, '', '', 10),
(289, 1, 0, '288', 'cargador spartan c130', 7000, 15000, 114, 6, 14, '', '', 10),
(290, 1, 0, '289', 'cargador spartan s401', 6000, 15000, 150, 6, 11, '', '', 10),
(291, 1, 0, '290', 'cargador spartan c118', 5800, 15000, 158, 6, 14, '', '', 10),
(292, 1, 0, '291', 'cargador spartan j502 tipo c', 9000, 20000, 122, 6, 6, '', '', 3),
(293, 1, 0, '292', 'cargador spartan  j501 v8', 8500, 18000, 111, 6, 6, '', '', 3),
(294, 1, 0, '293', 'cargador spartan moto turbo tipo c', 11000, 25000, 127, 6, 6, '', '', 3),
(295, 1, 0, '294', 'cargador spartan moto turbo v8', 10000, 22000, 120, 6, 5, '', '', 3),
(296, 1, 0, '295', 'cable mtf mt-122', 4500, 10000, 122, 7, 10, '', '', 5),
(297, 1, 0, '296', 'cable sparta  bolsa  ', 3500, 8000, 128, 7, 39, '', '', 15),
(298, 1, 0, '297', 'cable tipo c economico', 3500, 8000, 128, 7, 20, '', '', 10),
(299, 1, 0, '298', 'parlante mt-1903', 35000, 55000, 57, 9, 2, '', '', 3),
(300, 1, 0, '299', 'parlante f52', 45000, 65000, 44, 9, 3, '', '', 1),
(301, 1, 0, '300', 'moto g8 power lite', 525000, 600000, 14, 1, 1, '', '', 1),
(302, 1, 0, '301', 'parlante f686', 42000, 65000, 54, 9, 3, '', '', 3),
(303, 1, 0, '302', 'parlante mt-285', 15000, 25000, 66, 9, 3, '', '', 1),
(304, 1, 0, '303', 'parlante jc-222', 50000, 70000, 40, 9, 2, '', '', 1),
(305, 1, 0, '304', 'parlante mt-887', 15000, 25000, 66, 9, 2, '', '', 5),
(306, 1, 0, '305', 'parlante mt-641', 55000, 80000, 45, 9, 2, '', '', 1),
(307, 1, 0, '306', 'radio mt-r039bt', 45000, 65000, 44, 9, 3, '', '', 1),
(308, 1, 0, '307', 'radio xb-521urt', 30000, 50000, 66, 30, 2, '', '', 3),
(309, 1, 0, '308', 'protector wash case', 6500, 15000, 130, 18, 114, '', '', 74),
(310, 1, 0, '309', 'banda sunfit', 45000, 75000, 66, 4, 2, '', '', 1),
(311, 1, 0, '310', 'parlante pc a1', 46000, 65000, 41, 9, 1, '', '', 1),
(312, 1, 0, '311', 'parlante pc jr 5141', 25000, 35000, 40, 9, 0, '', '', 1),
(313, 1, 0, '312', 'bluetooth s-03 plus', 25000, 45000, 80, 5, 1, '', '', 1),
(314, 1, 0, '313', ' corn k2 - k3 - k5', 27000, 35000, 29, 1, 11, '', '', 10),
(315, 1, 0, '314', 'poco x3 128gb ', 955000, 1030000, 7, 1, 1, '', '', 1),
(316, 1, 0, '315', 'manillas banda', 9000, 15000, 66, 4, 17, '', '', 1),
(317, 1, 0, '316', 'aro de luz 33', 62000, 90000, 45, 24, 0, '', '', 1),
(318, 1, 0, '317', 'sky h5', 179000, 210000, 17, 1, 2, '', '', 1),
(319, 1, 0, '318', 'table sky a7', 205000, 240000, 17, 2, 1, '', '', 1),
(320, 1, 0, '319', 'pop 2f', 220000, 280000, 27, 1, 2, '', '', 1),
(321, 1, 0, '320', 'bluetooth x72-tws', 37000, 60000, 62, 5, 1, '', '', 1),
(322, 1, 0, '321', 'microfono qy-920', 45000, 60000, 33, 9, 1, '', '', 1),
(323, 1, 0, '322', 'dvd', 67000, 100000, 49, 10, 1, '', '', 1),
(324, 1, 0, '323', 'consola de juegos as p1-01', 43000, 65000, 51, 10, 1, '', '', 1),
(325, 1, 0, '324', 'consola de juegos as p3', 45000, 70000, 55, 10, 1, '', '', 1),
(326, 1, 0, '325', 'consola de juegos 41-619', 50000, 75000, 50, 10, 0, '', '', 1),
(327, 1, 0, '326', 'consola de juegos 41-619', 50000, 75000, 50, 10, 1, '', '', 1),
(328, 1, 0, '327', 'consola de juegos in-620', 55000, 80000, 45, 10, 1, '', '', 1),
(329, 1, 0, '328', 'teclado sencillo pc', 22000, 30000, 36, 15, 1, '', '', 1),
(330, 1, 0, '329', 'router nia lv-wr08', 60000, 90000, 50, 13, 1, '', '', 1),
(331, 1, 0, '330', 'parlante s1 sport', 70000, 100000, 42, 9, 1, '', '', 1),
(332, 1, 0, '331', 'bluetooth carro lv-v3', 10000, 20000, 100, 5, 2, '', '', 1),
(333, 1, 0, '332', 'popo shoker fino', 3500, 10000, 185, 22, 12, '', '', 1),
(334, 1, 0, '333', 'tripode de celular', 10000, 20000, 100, 21, 7, '', '', 1),
(335, 1, 0, '334', 'parlante pc bl-k8', 30000, 45000, 50, 9, 1, '', '', 1),
(336, 1, 0, '335', 'note 9s 6 ram ', 795000, 860000, 8, 1, 1, '', '', 1),
(337, 1, 0, '336', 'spartan c119 ', 6500, 15000, 130, 6, 8, '', '', 11),
(338, 1, 0, '337', 'note 10 ', 695000, 750000, 7, 1, 1, '', '', 1),
(339, 1, 0, '338', 'samsung a02s ', 475000, 530000, 11, 1, 1, '', '', 1),
(340, 1, 0, '339', 'poco m3 64gb ', 560000, 610000, 8, 1, 1, '', '', 1),
(341, 1, 0, '340', 'hot 10 lite', 350000, 400000, 14, 1, 1, '', '', 1),
(344, 1, 0, '343', 'hot 10 ', 428000, 480000, 12, 1, 1, '', '', 1),
(345, 1, 0, '344', 'power bank 10 mah', 35000, 55000, 57, 16, 2, '', '', 1),
(346, 1, 0, '345', 'nano gel ', 4000, 15000, 275, 25, 4, '', '', 1),
(347, 1, 0, '346', 'mause clk ', 8000, 15000, 87, 14, 2, '', '', 1),
(348, 1, 0, '347', 'p20-11 clk 4.0a t.c', 10500, 22000, 109, 6, 5, '', '', 1),
(349, 1, 0, '348', 'p2011 clk 4.0a v8', 10000, 20000, 100, 6, 5, '', '', 1),
(350, 1, 0, '349', 'pop shoker agua ', 3000, 12000, 300, 22, 3, '', '', 1),
(351, 1, 0, '350', 'pop shoker  anillos ', 3500, 10000, 185, 22, 4, '', '', 1),
(352, 1, 0, '351', 'parlante bt  6118', 30000, 60000, 100, 9, 2, '', '', 1),
(353, 1, 0, '352', 'manos libre ckm 03 ', 8000, 20000, 150, 5, 3, '', '', 5),
(354, 1, 0, '353', 'holder 5b-1', 8000, 20000, 150, 19, 2, '', '', 1),
(355, 1, 0, '354', 'holder s02-22', 5000, 15000, 200, 19, 2, '', '', 1),
(356, 1, 0, '355', 'cargador universal pantalla ', 3500, 10000, 185, 6, 6, '', '', 1),
(357, 1, 0, '356', 'pluyin carro completo ', 4500, 12000, 166, 6, 2, '', '', 1),
(358, 1, 0, '357', 'manos libres akg ', 2800, 10000, 257, 5, 18, '', '', 1),
(359, 1, 0, '358', 'protector tablet catrera ', 12000, 25000, 108, 18, 3, '', '', 1),
(360, 1, 0, '359', 'pop shoker  economicos ', 2000, 8000, 300, 22, 0, '', '', 1),
(361, 1, 0, '360', 'camara web ', 45000, 80000, 77, 4, 2, '', '', 1),
(362, 1, 0, '361', 'jbl filps ', 345000, 430000, 24, 9, 1, '', '', 1),
(363, 1, 0, '362', 'cable inteligente ms01', 6500, 15000, 130, 7, 3, '', '', 1),
(364, 1, 0, '363', 'manillas sencillas', 8000, 15000, 87, 4, 0, '', '', 1),
(365, 1, 0, '364', 'manillas ', 12000, 20000, 66, 4, 5, '', '', 1),
(366, 1, 0, '365', 'manillas ', 12000, 20000, 66, 4, 0, '', '', 1),
(367, 1, 0, '366', 'b mobile ax 1078', 205000, 250000, 21, 1, 2, '', '', 1),
(368, 1, 0, '367', 'manillas sencillas ', 8000, 15000, 87, 4, 0, '', '', 1),
(369, 1, 0, '368', 'manilla ', 12000, 25000, 108, 4, 0, '', '', 1),
(370, 1, 0, '369', 'cable 2x1 3metros', 3000, 12000, 300, 7, 3, '', '', 1),
(371, 1, 0, '370', 'cable de poder ', 6000, 20000, 233, 7, 4, '', '', 1),
(372, 1, 0, '371', 'k2', 180000, 240000, 33, 1, 1, '', '', 1),
(373, 1, 0, '372', 't6002', 240000, 290000, 20, 1, 2, '', '', 1),
(375, 1, 0, '373', 'k4', 245000, 290000, 18, 1, 2, '', '', 1),
(376, 1, 0, '374', 'a21s 128gb ', 685000, 750000, 9, 1, 1, '', '', 1),
(377, 1, 0, '375', 'diadema gamer ', 45000, 65000, 44, 11, 2, '', '', 1),
(378, 1, 0, '376', 'alcatel  1e ', 122000, 160000, 31, 1, 2, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `vendedor` varchar(255) DEFAULT NULL,
  `tel_vendedor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `id_sucursal`, `nombre`, `nit`, `direccion`, `departamento`, `ciudad`, `email`, `telefono`, `vendedor`, `tel_vendedor`) VALUES
(1, 1, 'CeluAccesorios Claro ', '92542811-7', 'Cr11 12-30', 'Cordoba', 'Sahagun', 'cristianvergara532@gmail.com', '3176632340', 'Cristian Vergara', '3017677997');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retenciones`
--

CREATE TABLE `retenciones` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `retenciones`
--

INSERT INTO `retenciones` (`id`, `nombre`, `porcentaje`) VALUES
(1, 'Retención en la fuente', 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_sucursal`, `nombre`, `password`, `estado`, `tipo`) VALUES
(2, 1, 'admin', '$2y$04$rpDIYAjzqFaLYtC7ktA1k.trDOd66Br07Y0fYYKGiSXwnemSwRzXe', 1, 'admin'),
(4, 1, 'juan', '$2y$04$j0Fo6Ld/VtH.ix3c8jYuJOyFHEs3i4ZOrZa3I2pDYu06Pgx0L3TcC', 1, 'admin'),
(5, 0, 'usuariobasico', '$2y$04$VMSoZmsQrQ3nn8LfcMidbOwx23m/XchWZOW4.urJZUGuqHxHxjMP2', 1, 'usuario'),
(6, 1, 'administrador', '$2y$04$OBcVhQ4GX.cFYozgQprvi.saYODrsQiYYmB0ybJ3o22N0KwEp7i8i', 1, 'admin'),
(7, 1, 'oscar', '$2y$04$btdcqS/h95x3D/vsYfel6OHdcy0XzmymtqMtIopFpa9YXzf.Td69O', 1, 'admin'),
(8, 1, 'celuexpress', '$2y$04$3GU3/wUsmbeb.d2XcqJ3hOoFLq7u46/BfNiNKRiIwFgM12Wgc3YYe', 1, 'usuario'),
(9, 2, 'katy', '$2y$04$DgfDj2aZs8zyfp2EJMJMPuqzSSvAzlg0yvV.tqbA9WtiRzns/dIL2', 1, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosucursal`
--

CREATE TABLE `usuariosucursal` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `passwoord` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vanta_producto`
--

CREATE TABLE `vanta_producto` (
  `id` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vanta_producto`
--

INSERT INTO `vanta_producto` (`id`, `id_sucursal`, `id_producto`, `cantidad`, `num_factura`, `fecha`) VALUES
(1, 1, 203, 1, 2, '2021-02-05'),
(2, 1, 111, 1, 2, '2021-02-05'),
(3, 1, 47, 1, 3, '2021-02-05'),
(4, 1, 99, 1, 4, '2021-02-06'),
(5, 1, 247, 6, 4, '2021-02-06'),
(6, 1, 45, 2, 4, '2021-02-06'),
(7, 1, 251, 5, 4, '2021-02-06'),
(8, 1, 238, 1, 4, '2021-02-06'),
(9, 1, 251, 5, 5, '2021-02-07'),
(10, 1, 250, 1, 5, '2021-02-07'),
(11, 1, 45, 1, 5, '2021-02-07'),
(12, 1, 266, 1, 5, '2021-02-07'),
(13, 1, 104, 1, 5, '2021-02-07'),
(14, 1, 253, 1, 5, '2021-02-07'),
(15, 1, 249, 1, 5, '2021-02-07'),
(16, 1, 132, 1, 5, '2021-02-07'),
(17, 1, 137, 1, 5, '2021-02-07'),
(18, 1, 247, 1, 5, '2021-02-07'),
(19, 1, 251, 4, 6, '2021-02-08'),
(20, 1, 248, 4, 6, '2021-02-08'),
(21, 1, 239, 1, 6, '2021-02-08'),
(22, 1, 240, 2, 6, '2021-02-08'),
(23, 1, 266, 2, 6, '2021-02-08'),
(24, 1, 48, 1, 6, '2021-02-08'),
(25, 1, 247, 4, 6, '2021-02-08'),
(26, 1, 97, 1, 6, '2021-02-08'),
(27, 1, 75, 1, 6, '2021-02-08'),
(28, 1, 76, 1, 6, '2021-02-08'),
(29, 1, 99, 1, 6, '2021-02-08'),
(30, 1, 86, 1, 6, '2021-02-08'),
(31, 1, 117, 1, 6, '2021-02-08'),
(32, 1, 251, 6, 7, '2021-02-09'),
(33, 1, 76, 1, 7, '2021-02-09'),
(34, 1, 75, 1, 7, '2021-02-09'),
(35, 1, 240, 1, 7, '2021-02-09'),
(36, 1, 248, 3, 7, '2021-02-09'),
(37, 1, 77, 1, 7, '2021-02-09'),
(38, 1, 99, 1, 7, '2021-02-09'),
(39, 1, 111, 1, 7, '2021-02-09'),
(40, 1, 125, 1, 7, '2021-02-09'),
(41, 1, 51, 1, 7, '2021-02-09'),
(42, 1, 137, 1, 7, '2021-02-09'),
(43, 1, 120, 1, 7, '2021-02-09'),
(44, 1, 2, 1, 7, '2021-02-09'),
(45, 1, 163, 1, 7, '2021-02-09'),
(46, 1, 245, 1, 7, '2021-02-09'),
(47, 1, 119, 1, 7, '2021-02-09'),
(48, 1, 249, 1, 7, '2021-02-09'),
(49, 1, 103, 1, 7, '2021-02-09'),
(50, 1, 248, 3, 8, '2021-02-10'),
(51, 1, 239, 1, 8, '2021-02-10'),
(52, 1, 119, 1, 8, '2021-02-10'),
(53, 1, 99, 1, 8, '2021-02-10'),
(54, 1, 130, 1, 8, '2021-02-10'),
(55, 1, 243, 1, 8, '2021-02-10'),
(56, 1, 117, 1, 9, '2021-02-10'),
(57, 1, 242, 1, 9, '2021-02-10'),
(58, 1, 249, 1, 9, '2021-02-10'),
(59, 1, 251, 2, 9, '2021-02-10'),
(60, 1, 1, 1, 9, '2021-02-10'),
(61, 1, 45, 1, 9, '2021-02-10'),
(62, 1, 60, 1, 9, '2021-02-10'),
(63, 1, 263, 1, 10, '2021-02-10'),
(64, 1, 251, 5, 11, '2021-02-11'),
(65, 1, 247, 2, 11, '2021-02-11'),
(66, 1, 248, 3, 11, '2021-02-11'),
(67, 1, 103, 2, 11, '2021-02-11'),
(68, 1, 1, 1, 11, '2021-02-11'),
(69, 1, 153, 1, 11, '2021-02-11'),
(70, 1, 75, 1, 11, '2021-02-11'),
(71, 1, 108, 1, 11, '2021-02-11'),
(72, 1, 76, 1, 11, '2021-02-11'),
(73, 1, 250, 1, 12, '2021-02-11'),
(74, 1, 239, 1, 12, '2021-02-11'),
(75, 1, 77, 1, 12, '2021-02-11'),
(76, 1, 279, 1, 12, '2021-02-11'),
(77, 1, 207, 1, 12, '2021-02-11'),
(78, 1, 251, 7, 13, '2021-02-12'),
(79, 1, 113, 1, 13, '2021-02-12'),
(80, 1, 26, 1, 13, '2021-02-12'),
(81, 1, 238, 1, 13, '2021-02-12'),
(82, 1, 248, 1, 13, '2021-02-12'),
(83, 1, 239, 1, 13, '2021-02-12'),
(84, 1, 240, 1, 13, '2021-02-12'),
(85, 1, 82, 1, 13, '2021-02-12'),
(86, 1, 247, 3, 13, '2021-02-12'),
(87, 1, 250, 1, 14, '2021-02-12'),
(88, 1, 239, 1, 14, '2021-02-12'),
(89, 1, 249, 2, 14, '2021-02-12'),
(90, 1, 248, 1, 14, '2021-02-12'),
(91, 1, 162, 1, 14, '2021-02-12'),
(92, 1, 14, 1, 14, '2021-02-12'),
(93, 1, 76, 1, 14, '2021-02-12'),
(94, 1, 206, 1, 15, '2021-02-13'),
(95, 1, 251, 2, 15, '2021-02-13'),
(96, 1, 248, 1, 15, '2021-02-13'),
(97, 1, 247, 1, 15, '2021-02-13'),
(98, 1, 251, 1, 16, '2021-02-13'),
(99, 1, 3, 1, 17, '2021-02-13'),
(100, 1, 251, 6, 18, '2021-02-13'),
(101, 1, 247, 4, 18, '2021-02-13'),
(102, 1, 248, 2, 18, '2021-02-13'),
(103, 1, 249, 1, 18, '2021-02-13'),
(104, 1, 22, 1, 18, '2021-02-13'),
(105, 1, 249, 1, 19, '2021-02-13'),
(106, 1, 81, 1, 20, '2021-02-14'),
(107, 1, 250, 2, 20, '2021-02-14'),
(108, 1, 120, 1, 20, '2021-02-14'),
(109, 1, 248, 2, 20, '2021-02-14'),
(110, 1, 251, 2, 20, '2021-02-14'),
(111, 1, 121, 1, 21, '2021-02-14'),
(112, 1, 247, 1, 22, '2021-02-14'),
(113, 1, 79, 1, 23, '2021-02-14'),
(114, 1, 82, 1, 23, '2021-02-14'),
(115, 1, 248, 1, 23, '2021-02-14'),
(116, 1, 251, 1, 24, '2021-02-14'),
(117, 1, 251, 1, 25, '2021-02-14'),
(118, 1, 121, 1, 26, '2021-02-14'),
(119, 1, 99, 1, 27, '2021-02-14'),
(120, 1, 251, 1, 28, '2021-02-14'),
(121, 1, 240, 1, 29, '2021-02-15'),
(122, 1, 3, 1, 29, '2021-02-15'),
(123, 1, 99, 1, 29, '2021-02-15'),
(124, 1, 65, 1, 29, '2021-02-15'),
(125, 1, 78, 1, 29, '2021-02-15'),
(126, 1, 247, 1, 29, '2021-02-15'),
(127, 1, 251, 1, 29, '2021-02-15'),
(128, 1, 251, 3, 30, '2021-02-15'),
(129, 1, 247, 3, 30, '2021-02-15'),
(130, 1, 239, 1, 30, '2021-02-15'),
(131, 1, 246, 1, 30, '2021-02-15'),
(132, 1, 83, 1, 30, '2021-02-15'),
(133, 1, 251, 1, 31, '2021-02-15'),
(134, 1, 157, 1, 31, '2021-02-15'),
(135, 1, 280, 1, 31, '2021-02-15'),
(136, 1, 136, 1, 32, '2021-02-15'),
(137, 1, 239, 1, 32, '2021-02-15'),
(138, 1, 238, 1, 32, '2021-02-15'),
(139, 1, 248, 1, 33, '2021-02-15'),
(140, 1, 249, 1, 34, '2021-02-15'),
(141, 1, 239, 1, 34, '2021-02-15'),
(142, 1, 248, 2, 34, '2021-02-15'),
(143, 1, 250, 1, 34, '2021-02-15'),
(144, 1, 165, 1, 35, '2021-02-15'),
(145, 1, 290, 1, 36, '2021-02-16'),
(146, 1, 119, 1, 37, '2021-02-16'),
(147, 1, 247, 1, 37, '2021-02-16'),
(148, 1, 251, 4, 37, '2021-02-16'),
(149, 1, 240, 1, 37, '2021-02-16'),
(150, 1, 266, 1, 37, '2021-02-16'),
(151, 1, 142, 1, 37, '2021-02-16'),
(152, 1, 246, 1, 37, '2021-02-16'),
(153, 1, 297, 1, 37, '2021-02-16'),
(154, 1, 249, 2, 37, '2021-02-16'),
(155, 1, 264, 1, 37, '2021-02-16'),
(156, 1, 103, 1, 39, '2021-02-16'),
(157, 1, 239, 1, 39, '2021-02-16'),
(158, 1, 95, 1, 39, '2021-02-16'),
(159, 1, 239, 1, 40, '2021-02-17'),
(160, 1, 77, 1, 40, '2021-02-17'),
(161, 1, 82, 1, 42, '2021-02-17'),
(162, 1, 247, 1, 42, '2021-02-17'),
(163, 1, 138, 1, 42, '2021-02-17'),
(164, 1, 248, 1, 42, '2021-02-17'),
(165, 1, 143, 1, 43, '2021-02-17'),
(166, 1, 103, 1, 44, '2021-02-17'),
(167, 1, 76, 1, 45, '2021-02-17'),
(168, 1, 247, 1, 45, '2021-02-17'),
(169, 1, 228, 1, 45, '2021-02-17'),
(170, 1, 251, 1, 46, '2021-02-17'),
(171, 1, 249, 2, 47, '2021-02-17'),
(172, 1, 130, 2, 47, '2021-02-17'),
(173, 1, 266, 1, 48, '2021-02-17'),
(174, 1, 47, 1, 49, '2021-02-17'),
(175, 1, 110, 1, 49, '2021-02-17'),
(176, 1, 88, 1, 49, '2021-02-17'),
(177, 1, 251, 1, 49, '2021-02-17'),
(178, 1, 190, 1, 50, '2021-02-17'),
(179, 1, 111, 1, 50, '2021-02-17'),
(180, 1, 247, 1, 51, '2021-02-17'),
(181, 1, 110, 1, 52, '2021-02-17'),
(182, 1, 239, 1, 53, '2021-02-17'),
(183, 1, 240, 1, 53, '2021-02-17'),
(184, 1, 266, 1, 53, '2021-02-17'),
(185, 1, 110, 1, 54, '2021-02-18'),
(186, 1, 251, 1, 54, '2021-02-18'),
(187, 1, 275, 1, 55, '2021-02-18'),
(188, 1, 239, 1, 56, '2021-02-18'),
(189, 1, 251, 1, 56, '2021-02-18'),
(190, 1, 262, 1, 57, '2021-02-18'),
(191, 1, 247, 2, 58, '2021-02-18'),
(192, 1, 249, 1, 59, '2021-02-18'),
(193, 1, 238, 1, 59, '2021-02-18'),
(194, 1, 248, 1, 59, '2021-02-18'),
(195, 1, 99, 1, 59, '2021-02-18'),
(196, 1, 247, 1, 60, '2021-02-18'),
(197, 1, 251, 1, 60, '2021-02-18'),
(198, 1, 247, 1, 61, '2021-02-18'),
(199, 1, 251, 1, 61, '2021-02-18'),
(200, 1, 14, 1, 61, '2021-02-18'),
(201, 1, 251, 1, 62, '2021-02-18'),
(202, 1, 180, 1, 62, '2021-02-18'),
(203, 1, 247, 1, 62, '2021-02-18'),
(204, 1, 251, 1, 63, '2021-02-18'),
(205, 1, 110, 1, 64, '2021-02-18'),
(206, 1, 249, 1, 64, '2021-02-18'),
(207, 1, 251, 1, 64, '2021-02-18'),
(208, 1, 251, 1, 65, '2021-02-18'),
(209, 1, 248, 1, 68, '2021-02-18'),
(210, 1, 251, 1, 68, '2021-02-18'),
(211, 1, 251, 1, 69, '2021-02-18'),
(212, 1, 246, 1, 69, '2021-02-18'),
(213, 1, 248, 2, 70, '2021-02-19'),
(214, 1, 251, 2, 70, '2021-02-19'),
(215, 1, 157, 1, 70, '2021-02-19'),
(216, 1, 247, 1, 70, '2021-02-19'),
(217, 1, 87, 1, 70, '2021-02-19'),
(218, 1, 180, 1, 70, '2021-02-19'),
(219, 1, 220, 1, 70, '2021-02-19'),
(220, 1, 268, 1, 71, '2021-02-19'),
(221, 1, 247, 1, 71, '2021-02-19'),
(222, 1, 239, 1, 71, '2021-02-19'),
(223, 1, 251, 1, 71, '2021-02-19'),
(224, 1, 158, 1, 71, '2021-02-19'),
(225, 1, 248, 1, 72, '2021-02-19'),
(226, 1, 251, 1, 72, '2021-02-19'),
(227, 1, 110, 1, 72, '2021-02-19'),
(228, 1, 51, 1, 73, '2021-02-19'),
(229, 1, 239, 1, 73, '2021-02-19'),
(230, 1, 248, 1, 73, '2021-02-19'),
(231, 1, 251, 1, 73, '2021-02-19'),
(232, 1, 238, 2, 74, '2021-02-19'),
(233, 1, 77, 1, 74, '2021-02-19'),
(234, 1, 250, 1, 75, '2021-02-19'),
(235, 1, 268, 1, 75, '2021-02-19'),
(236, 1, 247, 1, 75, '2021-02-19'),
(237, 1, 251, 1, 75, '2021-02-19'),
(238, 1, 90, 1, 75, '2021-02-19'),
(239, 1, 251, 2, 76, '2021-02-19'),
(240, 1, 243, 1, 78, '2021-02-19'),
(241, 1, 78, 1, 79, '2021-02-19'),
(242, 1, 99, 2, 80, '2021-02-19'),
(243, 1, 142, 1, 80, '2021-02-19'),
(244, 1, 99, 1, 81, '2021-02-20'),
(245, 1, 248, 1, 81, '2021-02-20'),
(246, 1, 290, 1, 82, '2021-02-20'),
(247, 1, 251, 1, 83, '2021-02-20'),
(248, 1, 78, 1, 84, '2021-02-20'),
(249, 1, 130, 1, 85, '2021-02-20'),
(250, 1, 131, 1, 85, '2021-02-20'),
(266, 1, 250, 1, 91, '2021-02-21'),
(265, 1, 248, 1, 90, '2021-02-21'),
(264, 1, 250, 1, 90, '2021-02-21'),
(263, 1, 17, 1, 90, '2021-02-21'),
(262, 1, 130, 1, 89, '2021-02-21'),
(261, 1, 251, 1, 89, '2021-02-21'),
(260, 1, 251, 2, 88, '2021-02-20'),
(259, 1, 249, 1, 88, '2021-02-20'),
(267, 1, 82, 1, 92, '2021-02-21'),
(275, 1, 248, 1, 96, '2021-02-21'),
(274, 1, 91, 1, 95, '2021-02-21'),
(273, 1, 90, 1, 94, '2021-02-21'),
(272, 1, 264, 1, 94, '2021-02-21'),
(276, 1, 261, 1, 97, '2021-02-21'),
(277, 1, 250, 1, 97, '2021-02-21'),
(278, 1, 251, 1, 97, '2021-02-21'),
(279, 1, 248, 1, 97, '2021-02-21'),
(280, 1, 99, 1, 98, '2021-02-22'),
(281, 1, 131, 1, 99, '2021-02-22'),
(282, 1, 239, 1, 99, '2021-02-22'),
(284, 1, 250, 1, 101, '2021-02-22'),
(285, 1, 95, 1, 101, '2021-02-22'),
(286, 1, 180, 1, 101, '2021-02-22'),
(287, 1, 133, 1, 102, '2021-02-22'),
(288, 1, 248, 1, 103, '2021-02-22'),
(289, 1, 73, 1, 104, '2021-02-22'),
(290, 1, 239, 1, 104, '2021-02-22'),
(291, 1, 24, 1, 105, '2021-02-22'),
(292, 1, 290, 1, 106, '2021-02-22'),
(293, 1, 249, 1, 107, '2021-02-22'),
(294, 1, 251, 1, 107, '2021-02-22'),
(295, 1, 251, 1, 108, '2021-02-22'),
(296, 1, 291, 1, 108, '2021-02-22'),
(297, 1, 248, 1, 109, '2021-02-23'),
(298, 1, 80, 1, 109, '2021-02-23'),
(299, 1, 100, 1, 109, '2021-02-23'),
(300, 1, 110, 1, 110, '2021-02-23'),
(301, 1, 100, 1, 111, '2021-02-23'),
(302, 1, 93, 1, 112, '2021-02-23'),
(303, 1, 238, 2, 112, '2021-02-23'),
(304, 1, 250, 1, 112, '2021-02-23'),
(318, 1, 248, 1, 121, '2021-02-23'),
(311, 1, 251, 1, 116, '2021-02-23'),
(310, 1, 248, 1, 116, '2021-02-23'),
(308, 1, 247, 1, 114, '2021-02-23'),
(309, 1, 238, 1, 115, '2021-02-23'),
(317, 1, 247, 1, 120, '2021-02-23'),
(314, 1, 248, 1, 118, '2021-02-23'),
(315, 1, 238, 1, 118, '2021-02-23'),
(316, 1, 59, 1, 119, '2021-02-23'),
(319, 1, 248, 2, 122, '2021-02-23'),
(320, 1, 247, 1, 123, '2021-02-23'),
(321, 1, 247, 1, 124, '2021-02-23'),
(322, 1, 248, 1, 124, '2021-02-23'),
(323, 1, 251, 1, 124, '2021-02-23'),
(324, 1, 268, 1, 125, '2021-02-24'),
(325, 1, 251, 1, 125, '2021-02-24'),
(326, 1, 247, 1, 125, '2021-02-24'),
(327, 1, 28, 1, 126, '2021-02-24'),
(328, 1, 99, 1, 126, '2021-02-24'),
(329, 1, 247, 1, 127, '2021-02-24'),
(330, 1, 251, 1, 128, '2021-02-24'),
(331, 1, 251, 1, 129, '2021-02-24'),
(332, 1, 251, 1, 130, '2021-02-24'),
(333, 1, 226, 1, 131, '2021-02-24'),
(334, 1, 250, 1, 132, '2021-02-24'),
(335, 1, 248, 1, 132, '2021-02-24'),
(336, 1, 248, 1, 133, '2021-02-24'),
(337, 1, 237, 1, 134, '2021-02-24'),
(338, 1, 314, 1, 135, '2021-02-24'),
(339, 1, 116, 1, 135, '2021-02-24'),
(340, 1, 82, 1, 136, '2021-02-24'),
(341, 1, 120, 1, 136, '2021-02-24'),
(342, 1, 252, 1, 136, '2021-02-24'),
(343, 1, 90, 2, 136, '2021-02-24'),
(344, 1, 248, 1, 136, '2021-02-24'),
(345, 1, 247, 1, 136, '2021-02-24'),
(346, 1, 90, 1, 137, '2021-02-24'),
(347, 1, 76, 1, 138, '2021-02-24'),
(348, 1, 99, 1, 139, '2021-02-25'),
(349, 1, 51, 1, 140, '2021-02-25'),
(350, 1, 48, 1, 141, '2021-02-25'),
(351, 1, 247, 1, 142, '2021-02-25'),
(352, 1, 248, 1, 143, '2021-02-25'),
(353, 1, 80, 1, 144, '2021-02-25'),
(354, 1, 132, 1, 145, '2021-02-25'),
(355, 1, 251, 1, 146, '2021-02-25'),
(356, 1, 132, 1, 147, '2021-02-25'),
(357, 1, 251, 1, 148, '2021-02-25'),
(358, 1, 119, 1, 149, '2021-02-25'),
(359, 1, 93, 1, 150, '2021-02-25'),
(360, 1, 312, 1, 151, '2021-02-25'),
(361, 1, 266, 1, 152, '2021-02-25'),
(362, 1, 240, 1, 152, '2021-02-25'),
(363, 1, 252, 1, 153, '2021-02-25'),
(364, 1, 101, 1, 154, '2021-02-25'),
(365, 1, 251, 1, 154, '2021-02-25'),
(366, 1, 262, 1, 155, '2021-02-26'),
(367, 1, 250, 1, 156, '2021-02-26'),
(368, 1, 237, 1, 157, '2021-02-26'),
(369, 1, 251, 1, 158, '2021-02-26'),
(370, 1, 248, 1, 158, '2021-02-26'),
(371, 1, 266, 1, 159, '2021-02-26'),
(372, 1, 89, 1, 160, '2021-02-26'),
(373, 1, 28, 1, 161, '2021-02-26'),
(374, 1, 305, 1, 162, '2021-02-26'),
(375, 1, 103, 1, 163, '2021-02-26'),
(376, 1, 239, 1, 164, '2021-02-26'),
(377, 1, 251, 1, 165, '2021-02-26'),
(378, 1, 251, 1, 166, '2021-02-26'),
(379, 1, 248, 1, 167, '2021-02-27'),
(380, 1, 65, 1, 168, '2021-02-27'),
(381, 1, 137, 1, 169, '2021-02-27'),
(382, 1, 110, 1, 169, '2021-02-27'),
(383, 1, 247, 1, 170, '2021-02-27'),
(384, 1, 22, 1, 171, '2021-02-27'),
(385, 1, 239, 1, 171, '2021-02-27'),
(386, 1, 131, 1, 172, '2021-02-27'),
(387, 1, 159, 1, 173, '2021-02-27'),
(388, 1, 22, 1, 174, '2021-02-27'),
(389, 1, 284, 1, 175, '2021-02-27'),
(390, 1, 48, 1, 176, '2021-02-27'),
(391, 1, 250, 1, 177, '2021-02-27'),
(392, 1, 251, 1, 177, '2021-02-27'),
(393, 1, 238, 1, 177, '2021-02-27'),
(394, 1, 240, 1, 177, '2021-02-27'),
(395, 1, 285, 1, 178, '2021-02-27'),
(396, 1, 17, 1, 179, '2021-02-27'),
(397, 1, 84, 1, 180, '2021-02-27'),
(398, 1, 99, 1, 181, '2021-02-27'),
(399, 1, 248, 2, 182, '2021-02-28'),
(400, 1, 251, 1, 183, '2021-02-28'),
(401, 1, 238, 1, 183, '2021-02-28'),
(402, 1, 248, 1, 183, '2021-02-28'),
(403, 1, 150, 1, 184, '2021-02-28'),
(404, 1, 25, 1, 185, '2021-02-28'),
(405, 1, 239, 1, 185, '2021-02-28'),
(406, 1, 304, 1, 186, '2021-02-28'),
(407, 1, 130, 1, 186, '2021-02-28'),
(408, 1, 248, 2, 186, '2021-02-28'),
(409, 1, 80, 1, 187, '2021-03-01'),
(410, 1, 251, 2, 188, '2021-03-01'),
(411, 1, 247, 1, 189, '2021-03-01'),
(412, 1, 150, 1, 189, '2021-03-01'),
(413, 1, 247, 1, 190, '2021-03-01'),
(414, 1, 251, 1, 191, '2021-03-01'),
(415, 1, 248, 1, 191, '2021-03-01'),
(416, 1, 251, 1, 192, '2021-03-01'),
(417, 1, 247, 1, 193, '2021-03-01'),
(418, 1, 14, 1, 194, '2021-03-01'),
(419, 1, 251, 1, 194, '2021-03-01'),
(420, 1, 131, 1, 195, '2021-03-01'),
(421, 1, 249, 1, 196, '2021-03-01'),
(422, 1, 251, 1, 197, '2021-03-01'),
(423, 1, 270, 1, 198, '2021-03-01'),
(428, 1, 99, 1, 202, '2021-03-01'),
(425, 1, 95, 1, 200, '2021-03-01'),
(426, 1, 247, 1, 201, '2021-03-01'),
(427, 1, 251, 1, 201, '2021-03-01'),
(429, 1, 248, 1, 203, '2021-03-01'),
(430, 1, 206, 1, 203, '2021-03-01'),
(431, 1, 76, 1, 203, '2021-03-01'),
(432, 1, 334, 1, 203, '2021-03-01'),
(433, 1, 82, 1, 203, '2021-03-01'),
(434, 1, 110, 1, 203, '2021-03-01'),
(435, 1, 295, 1, 204, '2021-03-02'),
(436, 1, 251, 1, 204, '2021-03-02'),
(437, 1, 266, 1, 205, '2021-03-02'),
(438, 1, 99, 1, 206, '2021-03-02'),
(439, 1, 225, 1, 207, '2021-03-02'),
(440, 1, 136, 1, 208, '2021-03-02'),
(441, 1, 110, 1, 209, '2021-03-02'),
(442, 1, 251, 1, 210, '2021-03-02'),
(443, 1, 20, 1, 211, '2021-03-02'),
(444, 1, 314, 1, 212, '2021-03-02'),
(445, 1, 247, 1, 213, '2021-03-02'),
(446, 1, 103, 1, 214, '2021-03-02'),
(447, 1, 314, 1, 215, '2021-03-02'),
(448, 1, 249, 1, 216, '2021-03-02'),
(449, 1, 251, 1, 217, '2021-03-02'),
(450, 1, 249, 1, 217, '2021-03-02'),
(451, 1, 314, 1, 218, '2021-03-02'),
(452, 1, 239, 1, 218, '2021-03-02'),
(453, 1, 239, 1, 219, '2021-03-02'),
(454, 1, 251, 1, 220, '2021-03-02'),
(455, 1, 110, 1, 221, '2021-03-02'),
(456, 1, 220, 1, 222, '2021-03-02'),
(457, 1, 251, 1, 223, '2021-03-02'),
(458, 1, 268, 1, 224, '2021-03-03'),
(459, 1, 110, 1, 225, '2021-03-03'),
(460, 1, 80, 1, 226, '2021-03-03'),
(461, 1, 99, 1, 226, '2021-03-03'),
(462, 1, 73, 1, 227, '2021-03-03'),
(463, 1, 11, 1, 228, '2021-03-03'),
(774, 1, 250, 1, 434, '2021-03-17'),
(465, 1, 8, 1, 230, '2021-03-03'),
(466, 1, 180, 1, 231, '2021-03-03'),
(467, 1, 28, 1, 232, '2021-03-03'),
(468, 1, 239, 1, 232, '2021-03-03'),
(469, 1, 8, 1, 233, '2021-03-03'),
(470, 1, 334, 1, 234, '2021-03-03'),
(471, 1, 251, 1, 235, '2021-03-03'),
(472, 1, 184, 1, 236, '2021-03-03'),
(473, 1, 48, 1, 237, '2021-03-03'),
(474, 1, 240, 1, 237, '2021-03-03'),
(475, 1, 250, 1, 237, '2021-03-03'),
(476, 1, 99, 1, 238, '2021-03-03'),
(477, 1, 248, 1, 239, '2021-03-03'),
(478, 1, 247, 1, 239, '2021-03-03'),
(479, 1, 251, 2, 239, '2021-03-03'),
(480, 1, 103, 1, 240, '2021-03-03'),
(481, 1, 239, 1, 240, '2021-03-03'),
(482, 1, 248, 1, 240, '2021-03-03'),
(483, 1, 251, 1, 241, '2021-03-03'),
(484, 1, 247, 1, 241, '2021-03-03'),
(485, 1, 110, 2, 242, '2021-03-03'),
(486, 1, 317, 1, 243, '2021-03-03'),
(487, 1, 239, 1, 244, '2021-03-04'),
(488, 1, 247, 1, 245, '2021-03-04'),
(489, 1, 251, 1, 245, '2021-03-04'),
(490, 1, 23, 1, 246, '2021-03-04'),
(491, 1, 120, 1, 247, '2021-03-04'),
(492, 1, 247, 1, 248, '2021-03-04'),
(493, 1, 251, 1, 248, '2021-03-04'),
(494, 1, 136, 1, 249, '2021-03-04'),
(495, 1, 82, 1, 250, '2021-03-04'),
(496, 1, 76, 1, 251, '2021-03-04'),
(497, 1, 99, 1, 252, '2021-03-04'),
(498, 1, 250, 1, 253, '2021-03-04'),
(499, 1, 99, 1, 254, '2021-03-04'),
(500, 1, 151, 1, 254, '2021-03-04'),
(501, 1, 248, 1, 255, '2021-03-04'),
(502, 1, 247, 1, 256, '2021-03-04'),
(503, 1, 251, 1, 256, '2021-03-04'),
(504, 1, 77, 1, 256, '2021-03-04'),
(505, 1, 251, 1, 257, '2021-03-04'),
(506, 1, 248, 1, 258, '2021-03-05'),
(507, 1, 82, 1, 258, '2021-03-05'),
(508, 1, 247, 1, 258, '2021-03-05'),
(509, 1, 248, 1, 259, '2021-03-05'),
(510, 1, 55, 1, 260, '2021-03-05'),
(511, 1, 247, 1, 260, '2021-03-05'),
(512, 1, 157, 1, 261, '2021-03-05'),
(513, 1, 95, 1, 262, '2021-03-05'),
(514, 1, 248, 2, 263, '2021-03-05'),
(515, 1, 137, 1, 264, '2021-03-05'),
(516, 1, 110, 1, 264, '2021-03-05'),
(517, 1, 248, 1, 265, '2021-03-05'),
(518, 1, 149, 1, 266, '2021-03-05'),
(519, 1, 266, 1, 267, '2021-03-05'),
(520, 1, 163, 1, 268, '2021-03-05'),
(521, 1, 82, 1, 269, '2021-03-05'),
(522, 1, 157, 1, 270, '2021-03-05'),
(523, 1, 309, 1, 271, '2021-03-05'),
(524, 1, 157, 1, 272, '2021-03-05'),
(525, 1, 103, 1, 273, '2021-03-05'),
(526, 1, 65, 1, 274, '2021-03-05'),
(527, 1, 76, 1, 275, '2021-03-05'),
(528, 1, 247, 2, 276, '2021-03-05'),
(529, 1, 252, 1, 276, '2021-03-05'),
(530, 1, 225, 1, 277, '2021-03-05'),
(531, 1, 266, 1, 278, '2021-03-05'),
(532, 1, 65, 1, 279, '2021-03-05'),
(533, 1, 247, 1, 279, '2021-03-05'),
(534, 1, 90, 1, 280, '2021-03-05'),
(535, 1, 251, 2, 281, '2021-03-06'),
(536, 1, 247, 1, 281, '2021-03-06'),
(537, 1, 131, 1, 282, '2021-03-06'),
(538, 1, 142, 1, 282, '2021-03-06'),
(539, 1, 309, 1, 283, '2021-03-06'),
(540, 1, 251, 1, 283, '2021-03-06'),
(541, 1, 90, 1, 284, '2021-03-06'),
(542, 1, 103, 1, 284, '2021-03-06'),
(543, 1, 309, 1, 284, '2021-03-06'),
(544, 1, 251, 1, 284, '2021-03-06'),
(545, 1, 90, 1, 285, '2021-03-06'),
(546, 1, 126, 1, 285, '2021-03-06'),
(547, 1, 76, 1, 286, '2021-03-06'),
(548, 1, 105, 1, 287, '2021-03-06'),
(549, 1, 251, 1, 288, '2021-03-06'),
(550, 1, 251, 1, 289, '2021-03-06'),
(551, 1, 309, 1, 290, '2021-03-06'),
(552, 1, 249, 1, 291, '2021-03-06'),
(553, 1, 251, 1, 291, '2021-03-06'),
(554, 1, 253, 1, 291, '2021-03-06'),
(555, 1, 248, 1, 292, '2021-03-06'),
(556, 1, 317, 1, 293, '2021-03-06'),
(557, 1, 76, 1, 293, '2021-03-06'),
(558, 1, 251, 1, 293, '2021-03-06'),
(559, 1, 250, 1, 293, '2021-03-06'),
(560, 1, 248, 2, 293, '2021-03-06'),
(561, 1, 152, 1, 294, '2021-03-07'),
(562, 1, 247, 1, 295, '2021-03-07'),
(563, 1, 110, 1, 296, '2021-03-07'),
(564, 1, 99, 2, 297, '2021-03-08'),
(565, 1, 285, 1, 298, '2021-03-08'),
(566, 1, 250, 1, 299, '2021-03-08'),
(567, 1, 251, 1, 300, '2021-03-08'),
(575, 1, 248, 1, 306, '2021-03-08'),
(570, 1, 90, 1, 302, '2021-03-08'),
(571, 1, 251, 1, 303, '2021-03-08'),
(572, 1, 247, 1, 303, '2021-03-08'),
(573, 1, 99, 1, 304, '2021-03-08'),
(574, 1, 249, 1, 305, '2021-03-08'),
(576, 1, 250, 1, 306, '2021-03-08'),
(577, 1, 90, 1, 307, '2021-03-08'),
(578, 1, 262, 1, 307, '2021-03-08'),
(579, 1, 239, 1, 307, '2021-03-08'),
(580, 1, 281, 1, 307, '2021-03-08'),
(581, 1, 248, 1, 308, '2021-03-08'),
(582, 1, 251, 1, 309, '2021-03-08'),
(583, 1, 99, 1, 310, '2021-03-08'),
(584, 1, 247, 1, 310, '2021-03-08'),
(585, 1, 2, 1, 311, '2021-03-08'),
(586, 1, 248, 1, 311, '2021-03-08'),
(587, 1, 247, 1, 312, '2021-03-08'),
(588, 1, 238, 1, 312, '2021-03-08'),
(589, 1, 110, 2, 312, '2021-03-08'),
(590, 1, 76, 1, 313, '2021-03-08'),
(591, 1, 249, 1, 313, '2021-03-08'),
(592, 1, 251, 1, 314, '2021-03-08'),
(593, 1, 247, 1, 314, '2021-03-08'),
(594, 1, 118, 1, 315, '2021-03-09'),
(595, 1, 151, 1, 316, '2021-03-09'),
(596, 1, 251, 1, 317, '2021-03-09'),
(597, 1, 251, 1, 318, '2021-03-09'),
(598, 1, 247, 1, 319, '2021-03-09'),
(599, 1, 239, 1, 320, '2021-03-09'),
(600, 1, 251, 1, 321, '2021-03-09'),
(601, 1, 251, 1, 322, '2021-03-09'),
(602, 1, 78, 1, 323, '2021-03-09'),
(603, 1, 73, 1, 324, '2021-03-09'),
(604, 1, 113, 1, 325, '2021-03-09'),
(605, 1, 251, 1, 326, '2021-03-09'),
(606, 1, 103, 1, 327, '2021-03-09'),
(607, 1, 241, 1, 327, '2021-03-09'),
(608, 1, 103, 1, 328, '2021-03-09'),
(609, 1, 251, 1, 329, '2021-03-09'),
(610, 1, 139, 1, 330, '2021-03-09'),
(611, 1, 266, 1, 331, '2021-03-09'),
(612, 1, 248, 1, 331, '2021-03-09'),
(613, 1, 251, 1, 331, '2021-03-09'),
(614, 1, 291, 1, 331, '2021-03-09'),
(615, 1, 291, 2, 332, '2021-03-09'),
(616, 1, 90, 1, 332, '2021-03-09'),
(617, 1, 250, 1, 332, '2021-03-09'),
(618, 1, 308, 1, 333, '2021-03-10'),
(619, 1, 309, 1, 334, '2021-03-10'),
(620, 1, 230, 1, 335, '2021-03-10'),
(621, 1, 288, 1, 336, '2021-03-10'),
(622, 1, 268, 1, 337, '2021-03-10'),
(623, 1, 250, 1, 337, '2021-03-10'),
(624, 1, 248, 1, 338, '2021-03-10'),
(625, 1, 337, 1, 339, '2021-03-10'),
(628, 1, 309, 1, 342, '2021-03-10'),
(627, 1, 309, 1, 341, '2021-03-10'),
(629, 1, 228, 1, 343, '2021-03-10'),
(630, 1, 314, 1, 344, '2021-03-10'),
(631, 1, 252, 1, 345, '2021-03-10'),
(632, 1, 142, 1, 346, '2021-03-10'),
(633, 1, 252, 3, 347, '2021-03-10'),
(634, 1, 77, 1, 348, '2021-03-10'),
(635, 1, 22, 1, 349, '2021-03-10'),
(636, 1, 246, 1, 349, '2021-03-10'),
(637, 1, 240, 1, 349, '2021-03-10'),
(638, 1, 309, 1, 350, '2021-03-10'),
(639, 1, 314, 1, 351, '2021-03-10'),
(640, 1, 238, 2, 352, '2021-03-10'),
(641, 1, 282, 1, 353, '2021-03-10'),
(642, 1, 87, 1, 354, '2021-03-11'),
(643, 1, 291, 1, 355, '2021-03-11'),
(644, 1, 251, 2, 356, '2021-03-11'),
(645, 1, 247, 2, 356, '2021-03-11'),
(646, 1, 248, 1, 357, '2021-03-11'),
(647, 1, 250, 1, 357, '2021-03-11'),
(648, 1, 250, 1, 358, '2021-03-11'),
(649, 1, 250, 1, 359, '2021-03-11'),
(650, 1, 110, 1, 360, '2021-03-11'),
(651, 1, 247, 1, 361, '2021-03-11'),
(652, 1, 251, 1, 361, '2021-03-11'),
(653, 1, 247, 2, 362, '2021-03-11'),
(654, 1, 227, 1, 363, '2021-03-11'),
(655, 1, 80, 1, 363, '2021-03-11'),
(656, 1, 251, 1, 363, '2021-03-11'),
(657, 1, 248, 1, 363, '2021-03-11'),
(658, 1, 130, 1, 363, '2021-03-11'),
(659, 1, 238, 1, 363, '2021-03-11'),
(660, 1, 252, 1, 364, '2021-03-11'),
(661, 1, 251, 1, 365, '2021-03-11'),
(679, 1, 304, 1, 371, '2021-03-12'),
(678, 1, 243, 1, 371, '2021-03-12'),
(677, 1, 239, 1, 371, '2021-03-12'),
(676, 1, 244, 1, 371, '2021-03-12'),
(675, 1, 213, 1, 370, '2021-03-12'),
(674, 1, 251, 1, 369, '2021-03-12'),
(673, 1, 248, 2, 368, '2021-03-12'),
(672, 1, 251, 2, 368, '2021-03-12'),
(671, 1, 253, 1, 367, '2021-03-12'),
(680, 1, 66, 1, 371, '2021-03-12'),
(681, 1, 113, 1, 371, '2021-03-12'),
(682, 1, 247, 1, 372, '2021-03-12'),
(683, 1, 228, 1, 373, '2021-03-12'),
(684, 1, 251, 1, 374, '2021-03-12'),
(685, 1, 251, 1, 375, '2021-03-12'),
(686, 1, 346, 1, 376, '2021-03-12'),
(687, 1, 358, 1, 377, '2021-03-12'),
(688, 1, 251, 1, 378, '2021-03-12'),
(689, 1, 251, 1, 379, '2021-03-12'),
(690, 1, 172, 1, 380, '2021-03-12'),
(691, 1, 247, 1, 381, '2021-03-12'),
(692, 1, 309, 1, 382, '2021-03-12'),
(693, 1, 289, 1, 383, '2021-03-13'),
(694, 1, 51, 1, 384, '2021-03-13'),
(695, 1, 250, 1, 385, '2021-03-13'),
(696, 1, 309, 1, 386, '2021-03-13'),
(697, 1, 251, 1, 386, '2021-03-13'),
(698, 1, 251, 1, 387, '2021-03-13'),
(699, 1, 261, 1, 388, '2021-03-13'),
(715, 1, 262, 1, 399, '2021-03-13'),
(701, 1, 358, 1, 390, '2021-03-13'),
(702, 1, 103, 1, 390, '2021-03-13'),
(703, 1, 309, 1, 391, '2021-03-13'),
(704, 1, 251, 1, 392, '2021-03-13'),
(705, 1, 113, 1, 393, '2021-03-13'),
(706, 1, 130, 1, 393, '2021-03-13'),
(707, 1, 262, 1, 394, '2021-03-13'),
(708, 1, 247, 1, 395, '2021-03-13'),
(709, 1, 251, 1, 396, '2021-03-13'),
(710, 1, 57, 1, 397, '2021-03-13'),
(711, 1, 139, 1, 398, '2021-03-13'),
(712, 1, 314, 1, 398, '2021-03-13'),
(713, 1, 251, 1, 398, '2021-03-13'),
(714, 1, 250, 1, 398, '2021-03-13'),
(716, 1, 276, 1, 400, '2021-03-14'),
(717, 1, 251, 1, 401, '2021-03-14'),
(718, 1, 253, 1, 401, '2021-03-14'),
(719, 1, 17, 1, 402, '2021-03-14'),
(720, 1, 248, 1, 402, '2021-03-14'),
(721, 1, 78, 1, 402, '2021-03-14'),
(722, 1, 337, 1, 403, '2021-03-14'),
(723, 1, 359, 1, 403, '2021-03-14'),
(724, 1, 133, 1, 403, '2021-03-14'),
(725, 1, 206, 1, 404, '2021-03-14'),
(726, 1, 79, 1, 405, '2021-03-14'),
(727, 1, 247, 1, 405, '2021-03-14'),
(728, 1, 251, 1, 405, '2021-03-14'),
(729, 1, 43, 1, 406, '2021-03-14'),
(730, 1, 248, 1, 406, '2021-03-14'),
(731, 1, 250, 1, 406, '2021-03-14'),
(732, 1, 239, 1, 406, '2021-03-14'),
(733, 1, 248, 2, 407, '2021-03-15'),
(734, 1, 136, 1, 407, '2021-03-15'),
(735, 1, 247, 1, 407, '2021-03-15'),
(736, 1, 285, 1, 407, '2021-03-15'),
(737, 1, 309, 1, 408, '2021-03-15'),
(738, 1, 247, 1, 408, '2021-03-15'),
(739, 1, 337, 1, 409, '2021-03-15'),
(740, 1, 251, 1, 410, '2021-03-15'),
(741, 1, 248, 1, 410, '2021-03-15'),
(742, 1, 52, 1, 411, '2021-03-15'),
(743, 1, 251, 1, 412, '2021-03-15'),
(744, 1, 238, 1, 413, '2021-03-15'),
(745, 1, 99, 1, 414, '2021-03-15'),
(746, 1, 111, 1, 415, '2021-03-15'),
(747, 1, 137, 1, 416, '2021-03-16'),
(748, 1, 271, 1, 417, '2021-03-16'),
(750, 1, 155, 1, 418, '2021-03-16'),
(751, 1, 239, 1, 419, '2021-03-16'),
(759, 1, 305, 1, 426, '2021-03-16'),
(753, 1, 265, 1, 421, '2021-03-16'),
(754, 1, 251, 1, 422, '2021-03-16'),
(755, 1, 251, 1, 423, '2021-03-16'),
(756, 1, 249, 1, 423, '2021-03-16'),
(757, 1, 251, 1, 424, '2021-03-16'),
(758, 1, 82, 1, 425, '2021-03-16'),
(760, 1, 76, 1, 427, '2021-03-16'),
(761, 1, 248, 2, 427, '2021-03-16'),
(762, 1, 247, 1, 428, '2021-03-17'),
(763, 1, 249, 1, 428, '2021-03-17'),
(764, 1, 16, 1, 428, '2021-03-17'),
(765, 1, 321, 1, 428, '2021-03-17'),
(766, 1, 314, 1, 428, '2021-03-17'),
(767, 1, 251, 1, 429, '2021-03-17'),
(768, 1, 99, 2, 429, '2021-03-17'),
(769, 1, 251, 1, 430, '2021-03-17'),
(770, 1, 248, 1, 430, '2021-03-17'),
(771, 1, 120, 1, 431, '2021-03-17'),
(772, 1, 251, 1, 432, '2021-03-17'),
(773, 1, 251, 1, 433, '2021-03-17'),
(775, 1, 248, 1, 434, '2021-03-17'),
(777, 1, 76, 1, 436, '2021-03-17'),
(778, 1, 251, 1, 437, '2021-03-17'),
(779, 1, 247, 1, 437, '2021-03-17'),
(780, 1, 353, 1, 438, '2021-03-18'),
(781, 1, 110, 1, 439, '2021-03-18'),
(782, 1, 239, 1, 440, '2021-03-18'),
(795, 1, 41, 1, 450, '2021-03-18'),
(788, 1, 241, 1, 444, '2021-03-18'),
(785, 1, 299, 1, 442, '2021-03-18'),
(786, 1, 247, 1, 443, '2021-03-18'),
(787, 1, 251, 1, 443, '2021-03-18'),
(796, 1, 247, 1, 451, '2021-03-18'),
(791, 1, 251, 1, 447, '2021-03-18'),
(792, 1, 247, 1, 447, '2021-03-18'),
(793, 1, 247, 1, 448, '2021-03-18'),
(794, 1, 277, 1, 449, '2021-03-18'),
(797, 1, 251, 1, 451, '2021-03-18'),
(798, 1, 353, 1, 451, '2021-03-18'),
(799, 1, 111, 1, 451, '2021-03-18'),
(800, 1, 251, 1, 452, '2021-03-18'),
(801, 1, 314, 1, 453, '2021-03-18'),
(802, 1, 239, 1, 453, '2021-03-18'),
(803, 1, 248, 1, 454, '2021-03-19'),
(804, 1, 251, 1, 454, '2021-03-19'),
(805, 1, 251, 1, 455, '2021-03-19'),
(806, 1, 251, 1, 456, '2021-03-19'),
(818, 1, 372, 1, 465, '2021-03-20'),
(808, 1, 238, 1, 458, '2021-03-19'),
(809, 1, 251, 1, 459, '2021-03-19'),
(810, 1, 249, 1, 460, '2021-03-19'),
(811, 1, 251, 1, 461, '2021-03-19'),
(812, 1, 247, 1, 461, '2021-03-19'),
(813, 1, 119, 1, 462, '2021-03-19'),
(814, 1, 238, 1, 463, '2021-03-19'),
(815, 1, 253, 1, 463, '2021-03-19'),
(816, 1, 249, 1, 463, '2021-03-19'),
(817, 1, 251, 1, 464, '2021-03-19'),
(819, 1, 251, 1, 466, '2021-03-20'),
(820, 1, 239, 1, 467, '2021-03-20'),
(821, 1, 251, 1, 467, '2021-03-20'),
(822, 1, 247, 1, 467, '2021-03-20'),
(823, 1, 251, 1, 467, '2021-03-20'),
(824, 1, 239, 1, 467, '2021-03-20'),
(825, 1, 247, 1, 467, '2021-03-20'),
(826, 1, 251, 1, 468, '2021-03-20'),
(827, 1, 48, 1, 469, '2021-03-20'),
(828, 1, 271, 1, 470, '2021-03-20'),
(829, 1, 248, 1, 470, '2021-03-20'),
(830, 1, 250, 1, 470, '2021-03-20'),
(831, 1, 251, 1, 471, '2021-03-20'),
(832, 1, 316, 1, 471, '2021-03-20'),
(833, 1, 251, 1, 472, '2021-03-20'),
(834, 1, 309, 1, 473, '2021-03-20'),
(835, 1, 251, 1, 474, '2021-03-20'),
(837, 1, 247, 1, 476, '2021-03-20'),
(838, 1, 93, 1, 477, '2021-03-20'),
(839, 1, 247, 1, 478, '2021-03-20'),
(840, 1, 250, 2, 479, '2021-03-20'),
(841, 1, 82, 1, 479, '2021-03-20'),
(842, 1, 238, 1, 480, '2021-03-20'),
(843, 1, 247, 1, 481, '2021-03-21'),
(844, 1, 251, 1, 481, '2021-03-21'),
(845, 1, 251, 1, 482, '2021-03-21'),
(846, 1, 119, 1, 482, '2021-03-21'),
(847, 1, 103, 1, 483, '2021-03-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `codigo` int(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `tipo` int(255) DEFAULT NULL,
  `id_plazo` int(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_cliente` int(255) DEFAULT NULL,
  `detalle_venta` text DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `utilidad` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `id_sucursal`, `codigo`, `fecha`, `hora`, `tipo`, `id_plazo`, `fecha_vencimiento`, `id_cliente`, `detalle_venta`, `total`, `saldo`, `utilidad`) VALUES
(1, 1, 2, '2021-02-05', '09:56:09', 0, 0, '2021-02-05', 1, '[{\"id\":\"203\",\"codigo\":\"203\",\"descripcion\":\"mono pop xt10\",\"cantidad\":\"1\",\"costo\":\"20000\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"},{\"id\":\"111\",\"codigo\":\"111\",\"descripcion\":\"cables bolsa v8\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"8000\",\"descuento\":\"0\",\"subtotal\":\"8000\"}]', 33000, 0, 10500),
(2, 1, 3, '2021-02-05', '10:09:23', 1, 1, '2021-02-18', 2, '[{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"360000\",\"descuento\":\"0\",\"subtotal\":\"360000\"}]', 360000, 0, 50000),
(3, 1, 4, '2021-02-06', '10:46:39', 0, 0, '2021-02-06', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"6\",\"costo\":\"8000\",\"precio\":\"14833\",\"descuento\":\"0\",\"subtotal\":\"88998\"},{\"id\":\"45\",\"codigo\":\"45\",\"descripcion\":\"telefono note 8 128gb\",\"cantidad\":\"2\",\"costo\":\"605000\",\"precio\":\"635000\",\"descuento\":\"0\",\"subtotal\":\"1270000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"5\",\"costo\":\"1200\",\"precio\":\"7600\",\"descuento\":\"0\",\"subtotal\":\"38000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"}]', 1406998, 0, 138998),
(4, 1, 5, '2021-02-07', '11:12:06', 0, 0, '2021-02-07', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"5\",\"costo\":\"1200\",\"precio\":\"9600\",\"descuento\":\"0\",\"subtotal\":\"48000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"45\",\"codigo\":\"45\",\"descripcion\":\"telefono note 8 128gb\",\"cantidad\":\"1\",\"costo\":\"605000\",\"precio\":\"660000\",\"descuento\":\"0\",\"subtotal\":\"660000\"},{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"},{\"id\":\"104\",\"codigo\":\"104\",\"descripcion\":\"manos libres bluetooth k340\",\"cantidad\":\"1\",\"costo\":\"26000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"},{\"id\":\"253\",\"codigo\":\"253\",\"descripcion\":\"adaptadores\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"2600\",\"descuento\":\"0\",\"subtotal\":\"2600\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"descuento\":\"0\",\"subtotal\":\"22000\"},{\"id\":\"132\",\"codigo\":\"132\",\"descripcion\":\"memoria micro 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"137\",\"codigo\":\"136\",\"descripcion\":\"memoria usb 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"22000\",\"descuento\":\"0\",\"subtotal\":\"22000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"11400\",\"descuento\":\"0\",\"subtotal\":\"11400\"}]', 861000, 0, 156200),
(5, 1, 6, '2021-02-08', '11:25:22', 0, 0, '2021-02-08', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"4\",\"costo\":\"1200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"40000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"4\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"40000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"2\",\"costo\":\"1000\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"6000\"},{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"2\",\"costo\":\"27000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"70000\"},{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"telefono spark 6 go 64gb\",\"cantidad\":\"1\",\"costo\":\"375000\",\"precio\":\"400000\",\"descuento\":\"0\",\"subtotal\":\"400000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"4\",\"costo\":\"8000\",\"precio\":\"14500\",\"descuento\":\"0\",\"subtotal\":\"58000\"},{\"id\":\"97\",\"codigo\":\"97\",\"descripcion\":\"manos libres iphono\",\"cantidad\":\"1\",\"costo\":\"11000\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"},{\"id\":\"75\",\"codigo\":\"75\",\"descripcion\":\"cargador clk 3a 01c tipo c\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"23000\",\"descuento\":\"0\",\"subtotal\":\"23000\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02 v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"86\",\"codigo\":\"86\",\"descripcion\":\"cargador huawei\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"40000\",\"descuento\":\"0\",\"subtotal\":\"40000\"},{\"id\":\"117\",\"codigo\":\"117\",\"descripcion\":\"cable iphone tipo original\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"30000\",\"descuento\":\"0\",\"subtotal\":\"30000\"}]', 755000, 0, 220400),
(6, 1, 7, '2021-02-09', '11:40:24', 0, 0, '2021-02-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"6\",\"costo\":\"1200\",\"precio\":\"10833\",\"descuento\":\"0\",\"subtotal\":\"64998\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02 v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"75\",\"codigo\":\"75\",\"descripcion\":\"cargador clk 3a 01c tipo c\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"3\",\"costo\":\"4200\",\"precio\":\"10666\",\"descuento\":\"0\",\"subtotal\":\"31998\"},{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador playin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"111\",\"codigo\":\"111\",\"descripcion\":\"cables bolsa v8\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"125\",\"codigo\":\"125\",\"descripcion\":\"cables 1x1 auxiliar\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"270000\",\"descuento\":\"0\",\"subtotal\":\"270000\"},{\"id\":\"137\",\"codigo\":\"136\",\"descripcion\":\"memoria usb 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"120\",\"codigo\":\"120\",\"descripcion\":\"cables clk tpu-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"2\",\"codigo\":\"1\",\"descripcion\":\"telefono neo m6\",\"cantidad\":\"1\",\"costo\":\"34000\",\"precio\":\"50000\",\"descuento\":\"0\",\"subtotal\":\"50000\"},{\"id\":\"163\",\"codigo\":\"163\",\"descripcion\":\"control contro del juegos x3\",\"cantidad\":\"1\",\"costo\":\"39000\",\"precio\":\"60000\",\"descuento\":\"0\",\"subtotal\":\"60000\"},{\"id\":\"245\",\"codigo\":\"245\",\"descripcion\":\"forro latex 8 y 9\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"}]', 644996, 0, 258696),
(7, 1, 8, '2021-02-10', '11:56:32', 0, 0, '2021-02-10', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"3\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"30000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"12000\",\"descuento\":\"0\",\"subtotal\":\"12000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"243\",\"codigo\":\"243\",\"descripcion\":\"aro de luz\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"75000\",\"descuento\":\"0\",\"subtotal\":\"75000\"}]', 140000, 0, 60900),
(8, 1, 9, '2021-02-10', '11:59:11', 0, 0, '2021-02-10', 1, '[{\"id\":\"117\",\"codigo\":\"117\",\"descripcion\":\"cable iphone tipo original\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"},{\"id\":\"242\",\"codigo\":\"242\",\"descripcion\":\"parlante speker pequeno\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"1\",\"codigo\":\"1\",\"descripcion\":\"telefono kenxinda c1\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"},{\"id\":\"45\",\"codigo\":\"45\",\"descripcion\":\"telefono note 8 128gb\",\"cantidad\":\"1\",\"costo\":\"605000\",\"precio\":\"675000\",\"descuento\":\"0\",\"subtotal\":\"675000\"},{\"id\":\"60\",\"codigo\":\"60\",\"descripcion\":\"telefono a11\",\"cantidad\":\"1\",\"costo\":\"505000\",\"precio\":\"565000\",\"descuento\":\"0\",\"subtotal\":\"565000\"}]', 1345000, 0, 178100),
(9, 1, 10, '2021-02-10', '12:00:12', 0, 0, '2021-02-10', 1, '[{\"id\":\"263\",\"codigo\":\"263\",\"descripcion\":\"telefono alcatel 1066\",\"cantidad\":\"1\",\"costo\":\"51000\",\"precio\":\"70000\",\"descuento\":\"0\",\"subtotal\":\"70000\"}]', 70000, 0, 19000),
(10, 1, 11, '2021-02-11', '12:09:51', 0, 0, '2021-02-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"5\",\"costo\":\"1200\",\"precio\":\"9200\",\"descuento\":\"0\",\"subtotal\":\"46000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"2\",\"costo\":\"8000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"30000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"3\",\"costo\":\"4200\",\"precio\":\"8666\",\"descuento\":\"0\",\"subtotal\":\"25998\"},{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"2\",\"costo\":\"4000\",\"precio\":\"14000\",\"descuento\":\"0\",\"subtotal\":\"28000\"},{\"id\":\"1\",\"codigo\":\"1\",\"descripcion\":\"telefono kenxinda c1\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"40000\",\"descuento\":\"0\",\"subtotal\":\"40000\"},{\"id\":\"153\",\"codigo\":\"153\",\"descripcion\":\"reproductor mp3 pantalla\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"75\",\"codigo\":\"75\",\"descripcion\":\"cargador clk 3a 01c tipo c\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"108\",\"codigo\":\"108\",\"descripcion\":\"manos libres bt m-10\",\"cantidad\":\"1\",\"costo\":\"25000\",\"precio\":\"40000\",\"descuento\":\"0\",\"subtotal\":\"40000\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02 v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"}]', 264998, 0, 143398),
(11, 1, 12, '2021-02-11', '12:15:22', 0, 0, '2021-02-13', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"2800\",\"descuento\":\"0\",\"subtotal\":\"2800\"},{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador playin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"279\",\"codigo\":\"279\",\"descripcion\":\"reloj nexo\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"100000\",\"descuento\":\"0\",\"subtotal\":\"100000\"},{\"id\":\"207\",\"codigo\":\"207\",\"descripcion\":\"diadema jr\",\"cantidad\":\"1\",\"costo\":\"50000\",\"precio\":\"65000\",\"descuento\":\"0\",\"subtotal\":\"65000\"}]', 182800, 0, 72500),
(12, 1, 13, '2021-02-12', '12:23:19', 0, 0, '2021-02-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"7\",\"costo\":\"1200\",\"precio\":\"9714\",\"descuento\":\"0\",\"subtotal\":\"67998\"},{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"26\",\"codigo\":\"26\",\"descripcion\":\"telefono unonu w50\",\"cantidad\":\"1\",\"costo\":\"150000\",\"precio\":\"200000\",\"descuento\":\"0\",\"subtotal\":\"200000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"3\",\"costo\":\"8000\",\"precio\":\"13666\",\"descuento\":\"0\",\"subtotal\":\"40998\"}]', 354996, 0, 154396),
(13, 1, 14, '2021-02-12', '12:27:29', 0, 0, '2021-02-13', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"2000\",\"descuento\":\"0\",\"subtotal\":\"2000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"2\",\"costo\":\"10000\",\"precio\":\"22500\",\"descuento\":\"0\",\"subtotal\":\"45000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"162\",\"codigo\":\"162\",\"descripcion\":\"tdt \",\"cantidad\":\"1\",\"costo\":\"40000\",\"precio\":\"50000\",\"descuento\":\"0\",\"subtotal\":\"50000\"},{\"id\":\"14\",\"codigo\":\"14\",\"descripcion\":\"telefono moto e6 play\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"350000\",\"descuento\":\"0\",\"subtotal\":\"350000\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02 v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"}]', 477000, 0, 93500),
(14, 1, 15, '2021-02-13', '12:43:58', 0, 0, '2021-02-13', 1, '[{\"id\":\"206\",\"codigo\":\"206\",\"descripcion\":\"soporte jolder de carro\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"17000\",\"descuento\":\"0\",\"subtotal\":\"17000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"14000\",\"descuento\":\"0\",\"subtotal\":\"28000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"descuento\":\"0\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"12000\",\"descuento\":\"0\",\"subtotal\":\"12000\"}]', 65000, 0, 43400),
(16, 1, 16, '2021-02-13', '13:36:55', 0, 0, '2021-02-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(17, 1, 17, '2021-02-13', '15:50:42', 0, 0, '2021-02-13', 1, '[{\"id\":\"3\",\"codigo\":\"3\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(18, 1, 18, '2021-02-13', '17:14:05', 0, 0, '2021-02-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"6\",\"costo\":\"1200\",\"precio\":\"9000\",\"descuento\":\"0\",\"subtotal\":\"54000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"4\",\"costo\":\"8000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"60000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"descuento\":\"0\",\"subtotal\":\"22000\"},{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"1\",\"costo\":\"138000\",\"precio\":\"160000\",\"descuento\":\"0\",\"subtotal\":\"160000\"}]', 316000, 0, 120400),
(19, 1, 19, '2021-02-13', '17:31:11', 0, 0, '2021-02-13', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"}]', 20000, 0, 10000),
(20, 1, 20, '2021-02-14', '09:21:44', 0, 0, '2021-02-14', 1, '[{\"id\":\"81\",\"codigo\":\"81\",\"descripcion\":\"cargador v3 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"2\",\"costo\":\"800\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"120\",\"codigo\":\"120\",\"descripcion\":\"cables clk tpu-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"9500\",\"descuento\":\"0\",\"subtotal\":\"19000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"9000\",\"descuento\":\"0\",\"subtotal\":\"18000\"}]', 62000, 0, 43800),
(21, 1, 21, '2021-02-14', '09:23:45', 0, 0, '2021-02-14', 1, '[{\"id\":\"121\",\"codigo\":\"121\",\"descripcion\":\"cables spartan d-202\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 6000),
(22, 1, 22, '2021-02-14', '09:56:58', 0, 0, '2021-02-14', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(23, 1, 23, '2021-02-14', '10:40:49', 0, 0, '2021-02-14', 1, '[{\"id\":\"79\",\"codigo\":\"79\",\"descripcion\":\"cargador qc-01 tipo c\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"descuento\":\"0\",\"subtotal\":\"22000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"descuento\":\"0\",\"subtotal\":\"8000\"}]', 45000, 0, 25800),
(24, 1, 24, '2021-02-14', '10:46:09', 0, 0, '2021-02-14', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"descuento\":\"0\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(25, 1, 25, '2021-02-14', '12:02:59', 0, 0, '2021-02-14', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(26, 1, 26, '2021-02-14', '12:54:14', 0, 0, '2021-02-14', 1, '[{\"id\":\"121\",\"codigo\":\"121\",\"descripcion\":\"cables spartan d-202\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 6000),
(27, 1, 27, '2021-02-14', '13:05:46', 0, 0, '2021-02-14', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(28, 1, 28, '2021-02-14', '13:11:15', 0, 0, '2021-02-14', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(29, 1, 29, '2021-02-15', '10:42:23', 0, 0, '2021-02-15', 1, '[{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"3\",\"codigo\":\"3\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"},{\"id\":\"65\",\"codigo\":\"65\",\"descripcion\":\"cargador iphono\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"45000\",\"descuento\":\"0\",\"subtotal\":\"45000\"},{\"id\":\"78\",\"codigo\":\"78\",\"descripcion\":\"cargador qc-01 v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"descuento\":\"0\",\"subtotal\":\"8000\"}]', 136000, 0, 72800),
(30, 1, 30, '2021-02-15', '12:24:22', 0, 0, '2021-02-15', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"3\",\"costo\":\"1200\",\"precio\":\"10666\",\"descuento\":\"0\",\"subtotal\":\"31998\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"3\",\"costo\":\"8000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"45000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"246\",\"codigo\":\"246\",\"descripcion\":\"forro carteras universal\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"83\",\"codigo\":\"83\",\"descripcion\":\"cargador clk 3a - 02\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"descuento\":\"0\",\"subtotal\":\"15000\"}]', 104998, 0, 65398),
(31, 1, 31, '2021-02-15', '15:09:21', 0, 0, '2021-02-15', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"},{\"id\":\"157\",\"codigo\":\"157\",\"descripcion\":\"diadema n65\",\"cantidad\":\"1\",\"costo\":\"24000\",\"precio\":\"35000\",\"descuento\":\"0\",\"subtotal\":\"35000\"},{\"id\":\"280\",\"codigo\":\"280\",\"descripcion\":\"parlante sp-901\",\"cantidad\":\"1\",\"costo\":\"90000\",\"precio\":\"155000\",\"descuento\":\"0\",\"subtotal\":\"155000\"}]', 200000, 0, 84800),
(32, 1, 32, '2021-02-15', '17:51:22', 0, 0, '2021-02-15', 1, '[{\"id\":\"136\",\"codigo\":\"135\",\"descripcion\":\"memoria usb 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"12000\",\"descuento\":\"0\",\"subtotal\":\"12000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"}]', 20000, 0, 7000),
(33, 1, 33, '2021-02-15', '17:53:55', 0, 0, '2021-02-15', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"descuento\":\"0\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(35, 1, 34, '2021-02-15', '09:09:53', 0, 0, '2021-02-15', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"descuento\":\"0\",\"subtotal\":\"20000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"descuento\":\"0\",\"subtotal\":\"3000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"9000\",\"descuento\":\"0\",\"subtotal\":\"18000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"descuento\":\"0\",\"subtotal\":\"5000\"}]', 46000, 0, 25300),
(36, 1, 35, '2021-02-15', '09:10:53', 0, 0, '2021-02-15', 1, '[{\"id\":\"165\",\"codigo\":\"165\",\"descripcion\":\"mause 6m01\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"descuento\":\"0\",\"subtotal\":\"25000\"}]', 25000, 0, 15000),
(37, 1, 36, '2021-02-16', '15:58:56', 0, 0, '2021-02-16', 1, '[{\"id\":\"290\",\"codigo\":\"289\",\"descripcion\":\"cargador spartan s401\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 9000),
(39, 1, 37, '2021-02-16', '18:11:41', 0, 0, '2021-02-16', 1, '[{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"4\",\"costo\":\"1200\",\"precio\":\"9000\",\"subtotal\":\"36000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"142\",\"codigo\":\"142\",\"descripcion\":\"memoria microlector\",\"cantidad\":\"1\",\"costo\":\"1800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"246\",\"codigo\":\"246\",\"descripcion\":\"forro carteras universal\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"297\",\"codigo\":\"296\",\"descripcion\":\"cable sparta  bolsa  \",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"2\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"44000\"},{\"id\":\"264\",\"codigo\":\"264\",\"descripcion\":\"telefono mobula 1701-1703\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"50000\",\"subtotal\":\"50000\"}]', 218000, 0, 117900),
(41, 1, 39, '2021-02-16', '17:53:51', 0, 0, '2021-02-16', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"95\",\"codigo\":\"95\",\"descripcion\":\"manos libres a16\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 43000, 0, 28500),
(42, 1, 40, '2021-02-17', '09:07:59', 0, 0, '2021-02-17', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador playin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 13000, 0, 8500),
(43, 1, 41, '2021-02-17', '09:21:22', 0, 0, '2021-02-17', 1, '[{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 27000, 0, 18000),
(44, 1, 42, '2021-02-17', '09:24:35', 0, 0, '2021-02-17', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"138\",\"codigo\":\"137\",\"descripcion\":\"memoria usb 16gb\",\"cantidad\":\"1\",\"costo\":\"11500\",\"precio\":\"25000\",\"subtotal\":\"25000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 58000, 0, 29300),
(45, 1, 43, '2021-02-17', '10:12:54', 0, 0, '2021-02-17', 1, '[{\"id\":\"143\",\"codigo\":\"143\",\"descripcion\":\"parlante 313 bt\",\"cantidad\":\"1\",\"costo\":\"29000\",\"precio\":\"42000\",\"subtotal\":\"42000\"}]', 42000, 0, 13000),
(46, 1, 44, '2021-02-17', '10:58:00', 0, 0, '2021-02-17', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 11000),
(47, 1, 45, '2021-02-17', '14:21:12', 0, 0, '2021-02-17', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02 v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"228\",\"codigo\":\"228\",\"descripcion\":\"bateria bl 4c\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 40000, 0, 21500),
(48, 1, 46, '2021-02-17', '14:27:45', 0, 0, '2021-02-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(49, 1, 47, '2021-02-17', '15:07:40', 0, 0, '2021-02-17', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"2\",\"costo\":\"10000\",\"precio\":\"21000\",\"subtotal\":\"42000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"2\",\"costo\":\"4500\",\"precio\":\"11000\",\"subtotal\":\"22000\"}]', 64000, 0, 35000),
(50, 1, 48, '2021-02-17', '15:06:53', 0, 0, '2021-02-17', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(51, 1, 49, '2021-02-17', '17:12:20', 0, 0, '2021-02-17', 1, '[{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"360000\",\"subtotal\":\"360000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"88\",\"codigo\":\"88\",\"descripcion\":\"manos libres m-02\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 395000, 0, 72800),
(52, 1, 50, '2021-02-17', '17:58:58', 0, 0, '2021-02-17', 1, '[{\"id\":\"190\",\"codigo\":\"190\",\"descripcion\":\"bateria s4 mini\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"111\",\"codigo\":\"\",\"descripcion\":\"cables bolsa v8 b.e\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 28000, 0, 16500),
(53, 1, 51, '2021-02-17', '18:24:35', 0, 0, '2021-02-17', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(54, 1, 52, '2021-02-17', '19:39:53', 0, 0, '2021-02-18', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(55, 1, 53, '2021-02-17', '08:34:37', 0, 0, '2021-02-17', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 41000, 0, 11500),
(56, 1, 54, '2021-02-18', '09:11:21', 0, 0, '2021-02-18', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 14300),
(57, 1, 55, '2021-02-18', '16:45:28', 0, 0, '2021-02-18', 1, '[{\"id\":\"275\",\"codigo\":\"275\",\"descripcion\":\"telefono note 8 64gb\",\"cantidad\":\"1\",\"costo\":\"575000\",\"precio\":\"645000\",\"subtotal\":\"645000\"}]', 645000, 0, 70000),
(58, 1, 56, '2021-02-18', '16:47:15', 0, 0, '2021-02-18', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 8000, 0, 5300),
(59, 1, 57, '2021-02-18', '16:48:19', 0, 0, '2021-02-18', 1, '[{\"id\":\"262\",\"codigo\":\"262\",\"descripcion\":\"telefono nokia 106\",\"cantidad\":\"1\",\"costo\":\"67000\",\"precio\":\"90000\",\"subtotal\":\"90000\"}]', 90000, 0, 23000),
(60, 1, 58, '2021-02-18', '16:49:12', 0, 0, '2021-02-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"2\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"30000\"}]', 30000, 0, 14000),
(61, 1, 59, '2021-02-18', '16:50:39', 0, 0, '2021-02-18', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 42000, 0, 23800),
(62, 1, 60, '2021-02-18', '18:00:35', 0, 0, '2021-02-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15800),
(63, 1, 61, '2021-02-18', '18:03:18', 0, 0, '2021-02-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"14\",\"codigo\":\"14\",\"descripcion\":\"telefono moto e6 play\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"355000\",\"subtotal\":\"355000\"}]', 380000, 0, 60800),
(64, 1, 62, '2021-02-18', '18:12:44', 0, 0, '2021-02-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"180\",\"codigo\":\"180\",\"descripcion\":\"bateria j5\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 42000, 0, 22800),
(65, 1, 63, '2021-02-18', '18:14:55', 0, 0, '2021-02-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(66, 1, 64, '2021-02-18', '18:33:20', 0, 0, '2021-02-18', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 42000, 0, 26300),
(67, 1, 65, '2021-02-18', '18:59:51', 0, 0, '2021-02-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(70, 1, 68, '2021-02-18', '20:00:12', 0, 0, '2021-02-19', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 14600),
(71, 1, 69, '2021-02-18', '20:01:03', 0, 0, '2021-02-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"246\",\"codigo\":\"246\",\"descripcion\":\"forro carteras universal\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 18000, 0, 13300),
(72, 1, 70, '2021-02-19', '12:46:28', 0, 0, '2021-02-19', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"157\",\"codigo\":\"157\",\"descripcion\":\"diadema n65\",\"cantidad\":\"1\",\"costo\":\"24000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"87\",\"codigo\":\"87\",\"descripcion\":\"cargador samsung\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"40000\",\"subtotal\":\"40000\"},{\"id\":\"180\",\"codigo\":\"180\",\"descripcion\":\"bateria j5\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"220\",\"codigo\":\"220\",\"descripcion\":\"bateria moto c\",\"cantidad\":\"1\",\"costo\":\"19000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 190000, 0, 106200),
(73, 1, 71, '2021-02-19', '14:14:22', 0, 0, '2021-02-19', 1, '[{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"costo\":\"425000\",\"precio\":\"465000\",\"subtotal\":\"465000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"2000\",\"subtotal\":\"2000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"158\",\"codigo\":\"158\",\"descripcion\":\"diadema dmz112\",\"cantidad\":\"1\",\"costo\":\"29000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 530000, 0, 65300),
(74, 1, 72, '2021-02-19', '14:15:21', 0, 0, '2021-02-19', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 30000, 0, 20100),
(75, 1, 73, '2021-02-19', '15:53:43', 0, 0, '2021-02-19', 1, '[{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"270000\",\"subtotal\":\"270000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 293000, 0, 61100),
(76, 1, 74, '2021-02-19', '16:47:11', 0, 0, '2021-02-19', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"},{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador pluyin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 13000),
(77, 1, 75, '2021-02-19', '17:56:03', 0, 0, '2021-02-19', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"costo\":\"425000\",\"precio\":\"470000\",\"subtotal\":\"470000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 505000, 0, 65500),
(78, 1, 76, '2021-02-19', '18:18:16', 0, 0, '2021-02-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 17600),
(79, 1, 77, '2021-02-19', '19:06:24', 0, 0, '2021-02-20', 1, '[{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(80, 1, 78, '2021-02-19', '19:28:43', 0, 0, '2021-02-20', 1, '[{\"id\":\"243\",\"codigo\":\"243\",\"descripcion\":\"aro de luz\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"75000\",\"subtotal\":\"75000\"}]', 75000, 0, 20000),
(81, 1, 79, '2021-02-19', '19:29:35', 0, 0, '2021-02-20', 1, '[{\"id\":\"78\",\"codigo\":\"78\",\"descripcion\":\"cargador qc-01 v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 15000),
(82, 1, 80, '2021-02-19', '20:01:28', 0, 0, '2021-02-20', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"},{\"id\":\"142\",\"codigo\":\"142\",\"descripcion\":\"memoria microlector\",\"cantidad\":\"1\",\"costo\":\"1800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 15000, 0, 9200),
(83, 1, 81, '2021-02-20', '08:37:44', 0, 0, '2021-02-20', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 15000, 0, 8800),
(84, 1, 82, '2021-02-20', '08:51:08', 0, 0, '2021-02-20', 1, '[{\"id\":\"290\",\"codigo\":\"289\",\"descripcion\":\"cargador spartan s401\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 6000),
(85, 1, 83, '2021-02-20', '09:33:02', 0, 0, '2021-02-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 13800),
(86, 1, 84, '2021-02-20', '12:36:47', 0, 0, '2021-02-20', 1, '[{\"id\":\"78\",\"codigo\":\"78\",\"descripcion\":\"cargador qc-01 v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 22000, 0, 12000),
(87, 1, 85, '2021-02-20', '14:22:34', 0, 0, '2021-02-20', 1, '[{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"131\",\"codigo\":\"131\",\"descripcion\":\"memoria micro 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 30000, 0, 16000);
INSERT INTO `venta` (`id`, `id_sucursal`, `codigo`, `fecha`, `hora`, `tipo`, `id_plazo`, `fecha_vencimiento`, `id_cliente`, `detalle_venta`, `total`, `saldo`, `utilidad`) VALUES
(89, 1, 87, '2021-02-20', '18:08:33', 0, 0, '2021-02-20', 1, '[{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"270000\",\"subtotal\":\"270000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"3\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"30000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"3\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"45000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 355000, 0, 98200),
(90, 1, 88, '2021-02-20', '18:36:56', 0, 0, '2021-02-20', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"9000\",\"subtotal\":\"18000\"}]', 38000, 0, 25600),
(91, 1, 89, '2021-02-20', '19:31:26', 0, 0, '2021-02-21', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 23000, 0, 17300),
(92, 1, 90, '2021-02-20', '19:33:59', 0, 0, '2021-02-21', 1, '[{\"id\":\"17\",\"codigo\":\"17\",\"descripcion\":\"telefono a01 core\",\"cantidad\":\"1\",\"costo\":\"265000\",\"precio\":\"300000\",\"subtotal\":\"300000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"7000\",\"subtotal\":\"7000\"}]', 310000, 0, 40000),
(93, 1, 91, '2021-02-21', '10:05:02', 0, 0, '2021-02-21', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(94, 1, 92, '2021-02-21', '10:11:42', 0, 0, '2021-02-21', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 10000),
(95, 1, 93, '2021-02-21', '10:40:10', 0, 0, '2021-02-21', 1, '[{\"id\":\"149\",\"codigo\":\"149\",\"descripcion\":\"parlante on-301 pequeno\",\"cantidad\":\"1\",\"costo\":\"15000\",\"precio\":\"30000\",\"subtotal\":\"30000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 65000, 0, 36800),
(96, 1, 94, '2021-02-21', '10:44:44', 0, 0, '2021-02-21', 1, '[{\"id\":\"264\",\"codigo\":\"264\",\"descripcion\":\"telefono mobula 1701-1703\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"45000\",\"subtotal\":\"45000\"},{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 57000, 0, 25500),
(97, 1, 95, '2021-02-21', '11:15:41', 0, 0, '2021-02-21', 1, '[{\"id\":\"91\",\"codigo\":\"91\",\"descripcion\":\"manos libres finos surtidno\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 13000),
(98, 1, 96, '2021-02-21', '12:06:19', 0, 0, '2021-02-21', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(99, 1, 97, '2021-02-21', '12:36:25', 0, 0, '2021-02-21', 1, '[{\"id\":\"261\",\"codigo\":\"261\",\"descripcion\":\"telefono moto e4 plus\",\"cantidad\":\"1\",\"costo\":\"345000\",\"precio\":\"395000\",\"subtotal\":\"395000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 420000, 0, 68800),
(100, 1, 98, '2021-02-22', '09:10:34', 0, 0, '2021-02-22', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(101, 1, 99, '2021-02-22', '09:44:02', 0, 0, '2021-02-22', 1, '[{\"id\":\"131\",\"codigo\":\"131\",\"descripcion\":\"memoria micro 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 18000, 0, 7000),
(102, 1, 100, '2021-02-22', '10:18:33', 1, 5, '2021-04-08', 3, '[{\"id\":\"47\",\"codigo\":\"47\",\"descripcion\":\"telefono spark 6 go 32gb\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"380000\",\"subtotal\":\"380000\"}]', 380000, 0, 70000),
(103, 1, 101, '2021-02-22', '11:06:11', 0, 0, '2021-02-22', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"95\",\"codigo\":\"95\",\"descripcion\":\"manos libres a16\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"180\",\"codigo\":\"180\",\"descripcion\":\"bateria j5\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 47000, 0, 27200),
(104, 1, 102, '2021-02-22', '11:38:58', 0, 0, '2021-02-22', 1, '[{\"id\":\"133\",\"codigo\":\"133\",\"descripcion\":\"memoria micro 16bg\",\"cantidad\":\"1\",\"costo\":\"11500\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 13500),
(105, 1, 103, '2021-02-22', '14:02:50', 0, 0, '2021-02-22', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(106, 1, 104, '2021-02-22', '15:05:22', 0, 0, '2021-02-22', 1, '[{\"id\":\"73\",\"codigo\":\"73\",\"descripcion\":\"cargador mt-23\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 23000, 0, 13000),
(107, 1, 105, '2021-02-22', '16:09:51', 0, 0, '2021-02-22', 1, '[{\"id\":\"24\",\"codigo\":\"24\",\"descripcion\":\"telefono hyundai e553\",\"cantidad\":\"1\",\"costo\":\"205000\",\"precio\":\"245000\",\"subtotal\":\"245000\"}]', 245000, 0, 40000),
(108, 1, 106, '2021-02-22', '17:38:12', 0, 0, '2021-02-22', 1, '[{\"id\":\"290\",\"codigo\":\"289\",\"descripcion\":\"cargador spartan s401\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 9000),
(109, 1, 107, '2021-02-22', '17:50:56', 0, 0, '2021-02-22', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"forro silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 35000, 0, 23800),
(110, 1, 108, '2021-02-22', '18:21:21', 0, 0, '2021-02-22', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"291\",\"codigo\":\"290\",\"descripcion\":\"cargador spartan c118\",\"cantidad\":\"1\",\"costo\":\"5800\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 25000, 25000, 18000),
(111, 1, 109, '2021-02-22', '19:11:20', 0, 0, '2021-02-23', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"80\",\"codigo\":\"80\",\"descripcion\":\"cargador v8 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"100\",\"codigo\":\"100\",\"descripcion\":\"manos libres m-16\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 28000, 0, 15500),
(112, 1, 110, '2021-02-22', '19:36:38', 0, 0, '2021-02-23', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(113, 1, 111, '2021-02-22', '19:55:08', 0, 0, '2021-02-23', 1, '[{\"id\":\"100\",\"codigo\":\"100\",\"descripcion\":\"manos libres m-16\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 7000),
(114, 1, 112, '2021-02-22', '19:57:29', 0, 0, '2021-02-23', 1, '[{\"id\":\"93\",\"codigo\":\"93\",\"descripcion\":\"manos libres s5-s6-j69-t83\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 25000, 25000, 17200),
(116, 1, 114, '2021-02-22', '20:00:33', 0, 0, '2021-02-23', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 5000),
(117, 1, 115, '2021-02-22', '20:03:18', 0, 0, '2021-02-23', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(118, 1, 116, '2021-02-23', '09:27:02', 0, 0, '2021-02-23', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 25000, 0, 19600),
(119, 1, 117, '2021-02-23', '11:10:52', 0, 0, '2021-02-23', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 20000, 0, 10800),
(120, 1, 118, '2021-02-23', '09:42:22', 0, 0, '2021-02-23', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 15000, 0, 8800),
(121, 1, 119, '2021-02-23', '09:57:28', 0, 0, '2021-02-23', 1, '[{\"id\":\"59\",\"codigo\":\"59\",\"descripcion\":\"tablet alcatel 3g\",\"cantidad\":\"1\",\"costo\":\"275000\",\"precio\":\"300000\",\"subtotal\":\"300000\"}]', 300000, 0, 25000),
(122, 1, 120, '2021-02-23', '13:48:19', 0, 0, '2021-02-23', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"forro silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(123, 1, 121, '2021-02-23', '14:51:52', 0, 0, '2021-02-23', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"forro antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 3800),
(124, 1, 122, '2021-02-23', '15:58:22', 0, 0, '2021-02-23', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 11600),
(125, 1, 123, '2021-02-23', '17:15:46', 0, 0, '2021-02-23', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(126, 1, 124, '2021-02-23', '18:00:11', 0, 0, '2021-02-23', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 33000, 0, 19600),
(127, 1, 125, '2021-02-23', '19:11:02', 0, 0, '2021-02-24', 1, '[{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"costo\":\"425000\",\"precio\":\"460000\",\"subtotal\":\"460000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 483000, 0, 48800),
(128, 1, 126, '2021-02-23', '19:40:31', 0, 0, '2021-02-24', 1, '[{\"id\":\"28\",\"codigo\":\"28\",\"descripcion\":\"telefono sky p4\",\"cantidad\":\"1\",\"costo\":\"123000\",\"precio\":\"140000\",\"subtotal\":\"140000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 145000, 0, 20000),
(129, 1, 127, '2021-02-24', '10:44:49', 0, 0, '2021-02-24', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(130, 1, 128, '2021-02-24', '10:59:48', 0, 0, '2021-02-24', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(131, 1, 129, '2021-02-24', '11:27:45', 0, 0, '2021-02-24', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(132, 1, 130, '2021-02-24', '11:57:45', 0, 0, '2021-02-24', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(133, 1, 131, '2021-02-24', '13:36:34', 0, 0, '2021-02-24', 1, '[{\"id\":\"226\",\"codigo\":\"226\",\"descripcion\":\"bateria 6101 nokia\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(134, 1, 132, '2021-02-24', '15:51:01', 0, 0, '2021-02-24', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 15000, 0, 10000),
(135, 1, 133, '2021-02-24', '16:22:37', 0, 0, '2021-02-24', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(136, 1, 134, '2021-02-24', '17:52:13', 0, 0, '2021-02-24', 1, '[{\"id\":\"237\",\"codigo\":\"237\",\"descripcion\":\"tripode pequeno\",\"cantidad\":\"1\",\"costo\":\"30000\",\"precio\":\"32000\",\"subtotal\":\"32000\"}]', 32000, 0, 2000),
(137, 1, 135, '2021-02-24', '17:53:57', 0, 0, '2021-02-24', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"116\",\"codigo\":\"116\",\"descripcion\":\"cables inteligente\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 60000, 0, 24000),
(138, 1, 136, '2021-02-24', '19:28:42', 0, 0, '2021-02-24', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"120\",\"codigo\":\"120\",\"descripcion\":\"cables clk tpu-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"2\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 70000, 0, 37800),
(139, 1, 137, '2021-02-24', '19:54:11', 0, 0, '2021-02-24', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 7500),
(140, 1, 138, '2021-02-24', '20:01:54', 0, 0, '2021-02-24', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(141, 1, 139, '2021-02-25', '08:50:31', 0, 0, '2021-02-25', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(142, 1, 140, '2021-02-25', '09:15:51', 0, 0, '2021-02-25', 1, '[{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"280000\",\"subtotal\":\"280000\"}]', 280000, 0, 55000),
(143, 1, 141, '2021-02-25', '10:29:10', 0, 0, '2021-02-25', 1, '[{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"telefono spark 6 go 64gb\",\"cantidad\":\"1\",\"costo\":\"375000\",\"precio\":\"400000\",\"subtotal\":\"400000\"}]', 400000, 0, 25000),
(144, 1, 142, '2021-02-25', '11:16:10', 0, 0, '2021-02-25', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(145, 1, 143, '2021-02-25', '11:31:49', 0, 0, '2021-02-25', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(146, 1, 144, '2021-02-25', '14:06:39', 0, 0, '2021-02-25', 1, '[{\"id\":\"80\",\"codigo\":\"80\",\"descripcion\":\"cargador v8 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 2700),
(147, 1, 145, '2021-02-25', '14:58:23', 0, 0, '2021-02-25', 1, '[{\"id\":\"132\",\"codigo\":\"132\",\"descripcion\":\"memoria micro 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 9500),
(148, 1, 146, '2021-02-25', '15:51:45', 0, 0, '2021-02-25', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(149, 1, 147, '2021-02-25', '16:02:02', 0, 0, '2021-02-25', 1, '[{\"id\":\"132\",\"codigo\":\"132\",\"descripcion\":\"memoria micro 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 9500),
(150, 1, 148, '2021-02-25', '16:02:53', 0, 0, '2021-02-25', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(151, 1, 149, '2021-02-25', '16:10:32', 0, 0, '2021-02-25', 1, '[{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(152, 1, 150, '2021-02-25', '16:13:48', 0, 0, '2021-02-25', 1, '[{\"id\":\"93\",\"codigo\":\"93\",\"descripcion\":\"manos libres s5-s6-j69-t83\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7000),
(153, 1, 151, '2021-02-25', '16:53:46', 0, 0, '2021-02-25', 1, '[{\"id\":\"312\",\"codigo\":\"311\",\"descripcion\":\"parlante pc jr 5141\",\"cantidad\":\"1\",\"costo\":\"25000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 10000),
(154, 1, 152, '2021-02-25', '17:43:35', 0, 0, '2021-02-25', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 38000, 0, 10000),
(155, 1, 153, '2021-02-25', '19:42:28', 0, 0, '2021-02-25', 1, '[{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"23000\",\"subtotal\":\"23000\"}]', 23000, 0, 20500),
(156, 1, 154, '2021-02-25', '19:59:46', 0, 0, '2021-02-25', 1, '[{\"id\":\"101\",\"codigo\":\"101\",\"descripcion\":\"manos libres m-12\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 18800),
(157, 1, 155, '2021-02-26', '09:07:38', 0, 0, '2021-02-26', 1, '[{\"id\":\"262\",\"codigo\":\"262\",\"descripcion\":\"telefono nokia 106\",\"cantidad\":\"1\",\"costo\":\"67000\",\"precio\":\"90000\",\"subtotal\":\"90000\"}]', 90000, 0, 23000),
(158, 1, 156, '2021-02-26', '09:08:32', 0, 0, '2021-02-26', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(159, 1, 157, '2021-02-26', '09:09:29', 0, 0, '2021-02-26', 1, '[{\"id\":\"237\",\"codigo\":\"237\",\"descripcion\":\"tripode pequeno\",\"cantidad\":\"1\",\"costo\":\"30000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 40000, 0, 10000),
(160, 1, 158, '2021-02-26', '09:10:27', 0, 0, '2021-02-26', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 19600),
(161, 1, 159, '2021-02-26', '09:20:13', 0, 0, '2021-02-26', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(162, 1, 160, '2021-02-26', '09:23:50', 0, 0, '2021-02-26', 1, '[{\"id\":\"89\",\"codigo\":\"89\",\"descripcion\":\"manos libres m-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(163, 1, 161, '2021-02-26', '13:49:02', 0, 0, '2021-02-26', 1, '[{\"id\":\"28\",\"codigo\":\"28\",\"descripcion\":\"telefono sky p4\",\"cantidad\":\"1\",\"costo\":\"123000\",\"precio\":\"150000\",\"subtotal\":\"150000\"}]', 150000, 0, 27000),
(164, 1, 162, '2021-02-26', '15:49:31', 0, 0, '2021-02-26', 1, '[{\"id\":\"305\",\"codigo\":\"304\",\"descripcion\":\"parlante mt-887\",\"cantidad\":\"1\",\"costo\":\"15000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 22000, 0, 7000),
(165, 1, 163, '2021-02-26', '16:20:57', 0, 0, '2021-02-26', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 11000),
(166, 1, 164, '2021-02-26', '17:42:14', 0, 0, '2021-02-26', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500),
(167, 1, 165, '2021-02-26', '18:13:50', 0, 0, '2021-02-26', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(168, 1, 166, '2021-02-26', '18:40:38', 0, 0, '2021-02-26', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(169, 1, 167, '2021-02-27', '11:26:19', 0, 0, '2021-02-27', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(170, 1, 168, '2021-02-27', '12:14:26', 0, 0, '2021-02-27', 1, '[{\"id\":\"65\",\"codigo\":\"65\",\"descripcion\":\"cargador iphone\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 40000, 0, 26000),
(171, 1, 169, '2021-02-27', '13:46:15', 0, 0, '2021-02-27', 1, '[{\"id\":\"137\",\"codigo\":\"136\",\"descripcion\":\"memoria usb 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 28000, 0, 13000),
(172, 1, 170, '2021-02-27', '14:59:13', 0, 0, '2021-02-27', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 5000),
(173, 1, 171, '2021-02-27', '15:13:28', 0, 0, '2021-02-27', 1, '[{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"1\",\"costo\":\"138000\",\"precio\":\"158000\",\"subtotal\":\"158000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"2000\",\"subtotal\":\"2000\"}]', 160000, 0, 20500),
(174, 1, 172, '2021-02-27', '15:15:10', 0, 0, '2021-02-27', 1, '[{\"id\":\"131\",\"codigo\":\"131\",\"descripcion\":\"memoria micro 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 3500),
(175, 1, 173, '2021-02-27', '15:15:50', 0, 0, '2021-02-27', 1, '[{\"id\":\"159\",\"codigo\":\"159\",\"descripcion\":\"diadema gato bk1\",\"cantidad\":\"1\",\"costo\":\"65000\",\"precio\":\"80000\",\"subtotal\":\"80000\"}]', 80000, 0, 15000),
(176, 1, 174, '2021-02-27', '15:44:31', 0, 0, '2021-02-27', 1, '[{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"1\",\"costo\":\"138000\",\"precio\":\"160000\",\"subtotal\":\"160000\"}]', 160000, 0, 22000),
(177, 1, 175, '2021-02-27', '15:55:56', 0, 0, '2021-02-27', 1, '[{\"id\":\"284\",\"codigo\":\"283\",\"descripcion\":\"teclado combo ws610\",\"cantidad\":\"1\",\"costo\":\"32000\",\"precio\":\"55000\",\"subtotal\":\"55000\"}]', 55000, 0, 23000),
(178, 1, 176, '2021-02-27', '16:40:00', 0, 0, '2021-02-27', 1, '[{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"spark 6 go 64gb\",\"cantidad\":\"1\",\"costo\":\"375000\",\"precio\":\"405000\",\"subtotal\":\"405000\"}]', 405000, 0, 30000),
(179, 1, 177, '2021-02-27', '16:45:10', 0, 0, '2021-02-27', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 23000, 0, 18000),
(180, 1, 178, '2021-02-27', '16:51:50', 0, 0, '2021-02-27', 1, '[{\"id\":\"285\",\"codigo\":\"284\",\"descripcion\":\"cargador mtf bolsa\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 9000),
(181, 1, 179, '2021-02-27', '17:22:58', 0, 0, '2021-02-27', 1, '[{\"id\":\"17\",\"codigo\":\"17\",\"descripcion\":\"telefono a01 core\",\"cantidad\":\"1\",\"costo\":\"265000\",\"precio\":\"300000\",\"subtotal\":\"300000\"}]', 300000, 0, 35000),
(182, 1, 180, '2021-02-27', '17:24:16', 0, 0, '2021-02-27', 1, '[{\"id\":\"84\",\"codigo\":\"84\",\"descripcion\":\"cargador ridex 2a\",\"cantidad\":\"1\",\"costo\":\"2800\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7200),
(183, 1, 181, '2021-02-27', '18:06:19', 0, 0, '2021-02-27', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(184, 1, 182, '2021-02-28', '10:21:34', 0, 0, '2021-02-28', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 11600),
(185, 1, 183, '2021-02-28', '11:24:10', 0, 0, '2021-02-28', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 17600),
(186, 1, 184, '2021-02-28', '11:25:29', 0, 0, '2021-02-28', 1, '[{\"id\":\"150\",\"codigo\":\"150\",\"descripcion\":\"parlante nd6008\",\"cantidad\":\"1\",\"costo\":\"105000\",\"precio\":\"140000\",\"subtotal\":\"140000\"}]', 140000, 0, 35000),
(187, 1, 185, '2021-02-28', '12:18:24', 0, 0, '2021-02-28', 1, '[{\"id\":\"25\",\"codigo\":\"25\",\"descripcion\":\"telefono iswang kronno\",\"cantidad\":\"1\",\"costo\":\"153000\",\"precio\":\"190000\",\"subtotal\":\"190000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 193000, 0, 38500),
(188, 1, 186, '2021-02-28', '12:23:12', 0, 0, '2021-02-28', 1, '[{\"id\":\"304\",\"codigo\":\"303\",\"descripcion\":\"parlante jc-222\",\"cantidad\":\"1\",\"costo\":\"50000\",\"precio\":\"70000\",\"subtotal\":\"70000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 105000, 0, 42100),
(189, 1, 187, '2021-03-01', '08:55:08', 0, 0, '2021-03-01', 1, '[{\"id\":\"80\",\"codigo\":\"80\",\"descripcion\":\"cargador v8 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 2700),
(190, 1, 188, '2021-03-01', '10:22:54', 0, 0, '2021-03-01', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 17600),
(191, 1, 189, '2021-03-01', '12:22:29', 0, 0, '2021-03-01', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"150\",\"codigo\":\"150\",\"descripcion\":\"parlante nd6008\",\"cantidad\":\"1\",\"costo\":\"105000\",\"precio\":\"145000\",\"subtotal\":\"145000\"}]', 160000, 0, 47000),
(192, 1, 190, '2021-03-01', '13:32:16', 0, 0, '2021-03-01', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(193, 1, 191, '2021-03-01', '14:48:07', 0, 0, '2021-03-01', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 18000, 0, 12600),
(194, 1, 192, '2021-03-01', '15:07:30', 0, 0, '2021-03-01', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(195, 1, 193, '2021-03-01', '15:10:05', 0, 0, '2021-03-01', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(196, 1, 194, '2021-03-01', '15:23:48', 0, 0, '2021-03-01', 1, '[{\"id\":\"14\",\"codigo\":\"14\",\"descripcion\":\"telefono moto e6 play\",\"cantidad\":\"1\",\"costo\":\"310000\",\"precio\":\"355000\",\"subtotal\":\"355000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 360000, 0, 48800),
(197, 1, 195, '2021-03-01', '16:33:54', 0, 0, '2021-03-01', 1, '[{\"id\":\"131\",\"codigo\":\"131\",\"descripcion\":\"memoria micro 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 5500),
(198, 1, 196, '2021-03-01', '16:34:41', 0, 0, '2021-03-01', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 22000, 0, 12000),
(199, 1, 197, '2021-03-01', '16:50:07', 0, 0, '2021-03-01', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(200, 1, 198, '2021-03-01', '17:40:09', 0, 0, '2021-03-01', 1, '[{\"id\":\"270\",\"codigo\":\"270\",\"descripcion\":\"telefono alcatel 1v\",\"cantidad\":\"1\",\"costo\":\"242000\",\"precio\":\"270000\",\"subtotal\":\"270000\"}]', 270000, 0, 28000),
(202, 1, 200, '2021-03-01', '17:41:44', 0, 0, '2021-03-01', 1, '[{\"id\":\"95\",\"codigo\":\"95\",\"descripcion\":\"manos libres a16\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 22000, 0, 13000),
(203, 1, 201, '2021-03-01', '17:47:07', 0, 0, '2021-03-01', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15800),
(204, 1, 202, '2021-03-01', '18:32:53', 0, 0, '2021-03-01', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(205, 1, 203, '2021-03-01', '19:15:25', 0, 0, '2021-03-01', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"206\",\"codigo\":\"206\",\"descripcion\":\"soporte jolder de carro\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"334\",\"codigo\":\"333\",\"descripcion\":\"tripode de celular\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 80000, 0, 42300),
(206, 1, 204, '2021-03-02', '08:55:32', 0, 0, '2021-03-02', 1, '[{\"id\":\"295\",\"codigo\":\"294\",\"descripcion\":\"cargador spartan moto turbo v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 32000, 0, 20800),
(207, 1, 205, '2021-03-02', '09:52:23', 0, 0, '2021-03-02', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(208, 1, 206, '2021-03-02', '09:54:15', 0, 0, '2021-03-02', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(209, 1, 207, '2021-03-02', '09:56:33', 0, 0, '2021-03-02', 1, '[{\"id\":\"225\",\"codigo\":\"225\",\"descripcion\":\"bateria 1112 nokia\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 4500),
(210, 1, 208, '2021-03-02', '10:12:55', 0, 0, '2021-03-02', 1, '[{\"id\":\"136\",\"codigo\":\"135\",\"descripcion\":\"memoria usb 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 5500),
(211, 1, 209, '2021-03-02', '10:16:31', 0, 0, '2021-03-02', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(212, 1, 210, '2021-03-02', '12:32:39', 0, 0, '2021-03-02', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(213, 1, 211, '2021-03-02', '13:02:22', 0, 0, '2021-03-02', 1, '[{\"id\":\"20\",\"codigo\":\"20\",\"descripcion\":\"telefono a12\",\"cantidad\":\"1\",\"costo\":\"555000\",\"precio\":\"620000\",\"subtotal\":\"620000\"}]', 620000, 0, 65000),
(214, 1, 212, '2021-03-02', '13:36:46', 0, 0, '2021-03-02', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(215, 1, 213, '2021-03-02', '13:51:46', 0, 0, '2021-03-02', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(216, 1, 214, '2021-03-02', '14:02:01', 0, 0, '2021-03-02', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 15000, 11000),
(217, 1, 215, '2021-03-02', '15:33:46', 0, 0, '2021-03-02', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(218, 1, 216, '2021-03-02', '16:12:43', 0, 0, '2021-03-02', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 15000),
(219, 1, 217, '2021-03-02', '17:07:07', 0, 0, '2021-03-02', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 30000, 0, 18800),
(220, 1, 218, '2021-03-02', '17:59:59', 0, 0, '2021-03-02', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"2000\",\"subtotal\":\"2000\"}]', 37000, 0, 8500),
(221, 1, 219, '2021-03-02', '18:07:23', 0, 0, '2021-03-02', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500),
(222, 1, 220, '2021-03-02', '18:36:37', 0, 0, '2021-03-02', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(223, 1, 221, '2021-03-02', '18:47:49', 0, 0, '2021-03-02', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(224, 1, 222, '2021-03-02', '18:59:38', 0, 0, '2021-03-02', 1, '[{\"id\":\"220\",\"codigo\":\"220\",\"descripcion\":\"bateria moto c\",\"cantidad\":\"1\",\"costo\":\"19000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 40000, 0, 21000),
(225, 1, 223, '2021-03-02', '19:23:01', 0, 0, '2021-03-02', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(226, 1, 224, '2021-03-03', '10:13:00', 0, 0, '2021-03-03', 1, '[{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"costo\":\"425000\",\"precio\":\"460000\",\"subtotal\":\"460000\"}]', 460000, 0, 35000),
(227, 1, 225, '2021-03-03', '10:14:39', 0, 0, '2021-03-03', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(228, 1, 226, '2021-03-03', '10:15:22', 0, 0, '2021-03-03', 1, '[{\"id\":\"80\",\"codigo\":\"80\",\"descripcion\":\"cargador v8 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 10000, 0, 5700),
(229, 1, 227, '2021-03-03', '11:14:23', 0, 0, '2021-03-03', 1, '[{\"id\":\"73\",\"codigo\":\"73\",\"descripcion\":\"cargador mt-23\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 16500),
(230, 1, 228, '2021-03-03', '11:18:52', 0, 0, '2021-03-03', 1, '[{\"id\":\"11\",\"codigo\":\"11\",\"descripcion\":\"telefono virzon v205\",\"cantidad\":\"1\",\"costo\":\"105000\",\"precio\":\"160000\",\"subtotal\":\"160000\"}]', 160000, 0, 55000),
(231, 1, 229, '2021-03-17', '16:54:45', 1, 6, '2021-05-16', 4, '[{\"id\":\"50\",\"codigo\":\"50\",\"descripcion\":\"telefono movic a6003\",\"cantidad\":\"1\",\"costo\":\"230000\",\"precio\":\"280000\",\"subtotal\":\"280000\"}]', 280000, 0, 50000),
(232, 1, 230, '2021-03-03', '12:52:37', 0, 0, '2021-03-03', 1, '[{\"id\":\"8\",\"codigo\":\"8\",\"descripcion\":\"telefono m2402\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"65000\",\"subtotal\":\"65000\"}]', 65000, 0, 10000),
(233, 1, 231, '2021-03-03', '12:59:03', 0, 0, '2021-03-03', 1, '[{\"id\":\"180\",\"codigo\":\"180\",\"descripcion\":\"bateria j5\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 15000),
(234, 1, 232, '2021-03-03', '14:45:03', 0, 0, '2021-03-03', 1, '[{\"id\":\"28\",\"codigo\":\"28\",\"descripcion\":\"telefono sky p4\",\"cantidad\":\"1\",\"costo\":\"123000\",\"precio\":\"150000\",\"subtotal\":\"150000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 153000, 0, 28500),
(235, 1, 233, '2021-03-03', '14:45:37', 0, 0, '2021-03-03', 1, '[{\"id\":\"8\",\"codigo\":\"8\",\"descripcion\":\"telefono m2402\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"70000\",\"subtotal\":\"70000\"}]', 70000, 0, 15000),
(236, 1, 234, '2021-03-03', '14:53:44', 0, 0, '2021-03-03', 1, '[{\"id\":\"334\",\"codigo\":\"333\",\"descripcion\":\"tripode de celular\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 10000),
(237, 1, 235, '2021-03-03', '15:40:28', 0, 0, '2021-03-03', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(238, 1, 236, '2021-03-03', '15:44:45', 0, 0, '2021-03-03', 1, '[{\"id\":\"184\",\"codigo\":\"184\",\"descripcion\":\"bateria j7 original\",\"cantidad\":\"1\",\"costo\":\"20000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 40000, 0, 20000),
(239, 1, 237, '2021-03-03', '17:00:12', 0, 0, '2021-03-03', 1, '[{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"spark 6 go 64gb\",\"cantidad\":\"1\",\"costo\":\"375000\",\"precio\":\"408000\",\"subtotal\":\"408000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"2000\",\"subtotal\":\"2000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 413000, 0, 36200),
(240, 1, 238, '2021-03-03', '17:34:02', 0, 0, '2021-03-03', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(241, 1, 239, '2021-03-03', '17:57:14', 0, 0, '2021-03-03', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 45000, 0, 30400),
(242, 1, 240, '2021-03-03', '19:11:11', 0, 0, '2021-03-03', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15300),
(243, 1, 241, '2021-03-03', '19:26:45', 0, 0, '2021-03-03', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 25000, 0, 15800),
(244, 1, 242, '2021-03-03', '19:37:20', 0, 0, '2021-03-03', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"2\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 11000),
(245, 1, 243, '2021-03-03', '19:59:54', 0, 0, '2021-03-03', 1, '[{\"id\":\"317\",\"codigo\":\"316\",\"descripcion\":\"aro de luz 33\",\"cantidad\":\"1\",\"costo\":\"62000\",\"precio\":\"90000\",\"subtotal\":\"90000\"}]', 90000, 0, 28000),
(246, 1, 244, '2021-03-04', '10:02:21', 0, 0, '2021-03-04', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500);
INSERT INTO `venta` (`id`, `id_sucursal`, `codigo`, `fecha`, `hora`, `tipo`, `id_plazo`, `fecha_vencimiento`, `id_cliente`, `detalle_venta`, `total`, `saldo`, `utilidad`) VALUES
(247, 1, 245, '2021-03-04', '10:03:09', 0, 0, '2021-03-04', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15800),
(248, 1, 246, '2021-03-04', '10:04:58', 0, 0, '2021-03-04', 1, '[{\"id\":\"23\",\"codigo\":\"23\",\"descripcion\":\"telefono hyundai e504\",\"cantidad\":\"1\",\"costo\":\"193000\",\"precio\":\"200000\",\"subtotal\":\"200000\"}]', 200000, 0, 7000),
(249, 1, 247, '2021-03-04', '10:05:51', 0, 0, '2021-03-04', 1, '[{\"id\":\"120\",\"codigo\":\"120\",\"descripcion\":\"cables clk tpu-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(250, 1, 248, '2021-03-04', '12:12:48', 0, 0, '2021-03-04', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 23000, 0, 13800),
(251, 1, 249, '2021-03-04', '12:13:26', 0, 0, '2021-03-04', 1, '[{\"id\":\"136\",\"codigo\":\"135\",\"descripcion\":\"memoria usb 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 5500),
(252, 1, 250, '2021-03-04', '12:14:34', 0, 0, '2021-03-04', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5000),
(253, 1, 251, '2021-03-04', '12:16:50', 0, 0, '2021-03-04', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(254, 1, 252, '2021-03-04', '15:30:57', 0, 0, '2021-03-04', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(255, 1, 253, '2021-03-04', '16:48:27', 0, 0, '2021-03-04', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(256, 1, 254, '2021-03-04', '17:11:44', 0, 0, '2021-03-04', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"151\",\"codigo\":\"151\",\"descripcion\":\"parlante bs105\",\"cantidad\":\"1\",\"costo\":\"30000\",\"precio\":\"45000\",\"subtotal\":\"45000\"}]', 50000, 0, 18000),
(257, 1, 255, '2021-03-04', '17:57:03', 0, 0, '2021-03-04', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 3800),
(258, 1, 256, '2021-03-04', '19:20:55', 0, 0, '2021-03-04', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador pluyin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 35000, 0, 22800),
(259, 1, 257, '2021-03-04', '19:44:37', 0, 0, '2021-03-04', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(260, 1, 258, '2021-03-05', '09:35:29', 0, 0, '2021-03-05', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 35000, 0, 17800),
(261, 1, 259, '2021-03-05', '09:41:44', 0, 0, '2021-03-05', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 3800),
(262, 1, 260, '2021-03-05', '11:10:54', 0, 0, '2021-03-05', 1, '[{\"id\":\"55\",\"codigo\":\"55\",\"descripcion\":\"telefono note 9s 4 ram 128gb\",\"cantidad\":\"1\",\"costo\":\"700000\",\"precio\":\"780000\",\"subtotal\":\"780000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 795000, 0, 87000),
(263, 1, 261, '2021-03-05', '11:15:46', 0, 0, '2021-03-05', 1, '[{\"id\":\"157\",\"codigo\":\"157\",\"descripcion\":\"diadema n65\",\"cantidad\":\"1\",\"costo\":\"24000\",\"precio\":\"33000\",\"subtotal\":\"33000\"}]', 33000, 0, 9000),
(264, 1, 262, '2021-03-05', '11:16:48', 0, 0, '2021-03-05', 1, '[{\"id\":\"95\",\"codigo\":\"95\",\"descripcion\":\"manos libres a16\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 16000),
(265, 1, 263, '2021-03-05', '12:40:42', 0, 0, '2021-03-05', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 20000, 0, 11600),
(266, 1, 264, '2021-03-05', '12:41:47', 0, 0, '2021-03-05', 1, '[{\"id\":\"137\",\"codigo\":\"136\",\"descripcion\":\"memoria usb 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 32000, 0, 17000),
(267, 1, 265, '2021-03-05', '13:03:04', 0, 0, '2021-03-05', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(268, 1, 266, '2021-03-05', '13:38:34', 0, 0, '2021-03-05', 1, '[{\"id\":\"149\",\"codigo\":\"149\",\"descripcion\":\"parlante on-301 pequeno\",\"cantidad\":\"1\",\"costo\":\"15000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 20000),
(269, 1, 267, '2021-03-05', '13:57:03', 0, 0, '2021-03-05', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(270, 1, 268, '2021-03-05', '14:02:03', 0, 0, '2021-03-05', 1, '[{\"id\":\"163\",\"codigo\":\"163\",\"descripcion\":\"control contro del juegos x3\",\"cantidad\":\"1\",\"costo\":\"39000\",\"precio\":\"50000\",\"subtotal\":\"50000\"}]', 50000, 0, 11000),
(271, 1, 269, '2021-03-05', '15:07:02', 0, 0, '2021-03-05', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5000),
(272, 1, 270, '2021-03-05', '15:48:14', 0, 0, '2021-03-05', 1, '[{\"id\":\"157\",\"codigo\":\"157\",\"descripcion\":\"diadema n65\",\"cantidad\":\"1\",\"costo\":\"24000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 11000),
(273, 1, 271, '2021-03-05', '16:20:40', 0, 0, '2021-03-05', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(274, 1, 272, '2021-03-05', '16:55:50', 0, 0, '2021-03-05', 1, '[{\"id\":\"157\",\"codigo\":\"157\",\"descripcion\":\"diadema n65\",\"cantidad\":\"1\",\"costo\":\"24000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 11000),
(275, 1, 273, '2021-03-05', '16:56:32', 0, 0, '2021-03-05', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 9000),
(276, 1, 274, '2021-03-05', '17:02:26', 0, 0, '2021-03-05', 1, '[{\"id\":\"65\",\"codigo\":\"65\",\"descripcion\":\"cargador iphone\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 6000),
(277, 1, 275, '2021-03-05', '17:25:09', 0, 0, '2021-03-05', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(278, 1, 276, '2021-03-05', '18:41:40', 0, 0, '2021-03-05', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"2\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"30000\"},{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 38000, 0, 19500),
(279, 1, 277, '2021-03-05', '18:54:27', 0, 0, '2021-03-05', 1, '[{\"id\":\"225\",\"codigo\":\"225\",\"descripcion\":\"bateria 1112 nokia\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(280, 1, 278, '2021-03-05', '19:06:25', 0, 0, '2021-03-05', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(281, 1, 279, '2021-03-05', '19:27:05', 0, 0, '2021-03-05', 1, '[{\"id\":\"65\",\"codigo\":\"65\",\"descripcion\":\"cargador iphone\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"40000\",\"subtotal\":\"40000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 55000, 0, 33000),
(282, 1, 280, '2021-03-05', '19:38:58', 0, 0, '2021-03-05', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(283, 1, 281, '2021-03-06', '08:49:58', 0, 0, '2021-03-06', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"9000\",\"subtotal\":\"18000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 33000, 0, 22600),
(284, 1, 282, '2021-03-06', '08:51:23', 0, 0, '2021-03-06', 1, '[{\"id\":\"131\",\"codigo\":\"131\",\"descripcion\":\"memoria micro 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"142\",\"codigo\":\"142\",\"descripcion\":\"memoria microlector\",\"cantidad\":\"1\",\"costo\":\"1800\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 13700),
(285, 1, 283, '2021-03-06', '11:18:03', 0, 0, '2021-03-06', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 17300),
(286, 1, 284, '2021-03-06', '12:09:19', 0, 0, '2021-03-06', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 50000, 0, 33800),
(287, 1, 285, '2021-03-06', '12:26:34', 0, 0, '2021-03-06', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"126\",\"codigo\":\"126\",\"descripcion\":\"cables3x3\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 12500),
(288, 1, 286, '2021-03-06', '15:01:33', 0, 0, '2021-03-06', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(289, 1, 287, '2021-03-06', '15:11:59', 0, 0, '2021-03-06', 1, '[{\"id\":\"105\",\"codigo\":\"105\",\"descripcion\":\"bluetooth earbeans bt\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"85000\",\"subtotal\":\"85000\"}]', 85000, 0, 30000),
(290, 1, 288, '2021-03-06', '15:13:10', 0, 0, '2021-03-06', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(291, 1, 289, '2021-03-06', '16:03:31', 0, 0, '2021-03-06', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(292, 1, 290, '2021-03-06', '16:04:36', 0, 0, '2021-03-06', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(293, 1, 291, '2021-03-06', '16:08:26', 0, 0, '2021-03-06', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"13000\",\"subtotal\":\"13000\"},{\"id\":\"253\",\"codigo\":\"253\",\"descripcion\":\"adaptadores\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 38000, 0, 25800),
(294, 1, 292, '2021-03-06', '17:19:20', 0, 0, '2021-03-06', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(295, 1, 293, '2021-03-06', '19:16:52', 0, 0, '2021-03-06', 1, '[{\"id\":\"317\",\"codigo\":\"316\",\"descripcion\":\"aro de luz 33\",\"cantidad\":\"1\",\"costo\":\"62000\",\"precio\":\"90000\",\"subtotal\":\"90000\"},{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"18000\"}]', 138000, 0, 58600),
(296, 1, 294, '2021-03-07', '09:03:15', 0, 0, '2021-03-07', 1, '[{\"id\":\"152\",\"codigo\":\"152\",\"descripcion\":\"parlante mt-1637 bt\",\"cantidad\":\"1\",\"costo\":\"22000\",\"precio\":\"40000\",\"subtotal\":\"40000\"}]', 40000, 0, 18000),
(297, 1, 295, '2021-03-07', '10:47:05', 0, 0, '2021-03-07', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 4000),
(298, 1, 296, '2021-03-07', '11:02:54', 0, 0, '2021-03-07', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 7500),
(299, 1, 297, '2021-03-08', '08:55:44', 0, 0, '2021-03-08', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"}]', 10000, 0, 6000),
(300, 1, 298, '2021-03-08', '09:38:54', 0, 0, '2021-03-08', 1, '[{\"id\":\"285\",\"codigo\":\"284\",\"descripcion\":\"cargador mtf bolsa\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 6000),
(301, 1, 299, '2021-03-08', '10:07:24', 0, 0, '2021-03-08', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(302, 1, 300, '2021-03-08', '11:14:41', 0, 0, '2021-03-08', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 10000, 8800),
(305, 1, 302, '2021-03-08', '11:35:06', 0, 0, '2021-03-08', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(306, 1, 303, '2021-03-08', '11:39:40', 0, 0, '2021-03-08', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 23000, 0, 13800),
(307, 1, 304, '2021-03-08', '11:40:11', 0, 0, '2021-03-08', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(308, 1, 305, '2021-03-08', '12:15:01', 0, 0, '2021-03-08', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 10000),
(309, 1, 306, '2021-03-08', '14:28:52', 0, 0, '2021-03-08', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 15000, 0, 10000),
(310, 1, 307, '2021-03-08', '15:16:27', 0, 0, '2021-03-08', 1, '[{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"262\",\"codigo\":\"262\",\"descripcion\":\"telefono nokia 106\",\"cantidad\":\"1\",\"costo\":\"67000\",\"precio\":\"90000\",\"subtotal\":\"90000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"281\",\"codigo\":\"281\",\"descripcion\":\"bluetooth spartan\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"23000\",\"subtotal\":\"23000\"}]', 126000, 0, 39000),
(311, 1, 308, '2021-03-08', '15:22:25', 0, 0, '2021-03-08', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(312, 1, 309, '2021-03-08', '16:35:51', 0, 0, '2021-03-08', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(313, 1, 310, '2021-03-08', '16:36:40', 0, 0, '2021-03-08', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 20000, 0, 10000),
(314, 1, 311, '2021-03-08', '16:53:33', 0, 0, '2021-03-08', 1, '[{\"id\":\"2\",\"codigo\":\"1\",\"descripcion\":\"telefono neo m6\",\"cantidad\":\"1\",\"costo\":\"34000\",\"precio\":\"50000\",\"subtotal\":\"50000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"9000\",\"subtotal\":\"9000\"}]', 59000, 0, 20800),
(315, 1, 312, '2021-03-08', '18:07:38', 0, 0, '2021-03-08', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"2\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 40000, 0, 21000),
(316, 1, 313, '2021-03-08', '19:22:59', 0, 0, '2021-03-08', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 35000, 0, 18000),
(317, 1, 314, '2021-03-08', '20:05:20', 0, 0, '2021-03-08', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 23000, 0, 13800),
(318, 1, 315, '2021-03-09', '10:36:29', 0, 0, '2021-03-09', 1, '[{\"id\":\"118\",\"codigo\":\"118\",\"descripcion\":\"cables mt 115 android\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 9000),
(319, 1, 316, '2021-03-09', '10:37:13', 0, 0, '2021-03-09', 1, '[{\"id\":\"151\",\"codigo\":\"151\",\"descripcion\":\"parlante bs105\",\"cantidad\":\"1\",\"costo\":\"30000\",\"precio\":\"50000\",\"subtotal\":\"50000\"}]', 50000, 0, 20000),
(320, 1, 317, '2021-03-09', '10:38:13', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 10000, 8800),
(321, 1, 318, '2021-03-09', '10:38:13', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(322, 1, 319, '2021-03-09', '12:05:15', 0, 0, '2021-03-09', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(323, 1, 320, '2021-03-09', '12:06:12', 0, 0, '2021-03-09', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500),
(324, 1, 321, '2021-03-09', '12:23:07', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"14000\",\"subtotal\":\"14000\"}]', 14000, 0, 12800),
(325, 1, 322, '2021-03-09', '13:14:29', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(326, 1, 323, '2021-03-09', '13:59:28', 0, 0, '2021-03-09', 1, '[{\"id\":\"78\",\"codigo\":\"78\",\"descripcion\":\"cargador qc-01 v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"23000\",\"subtotal\":\"23000\"}]', 23000, 0, 13000),
(327, 1, 324, '2021-03-09', '14:01:26', 0, 0, '2021-03-09', 1, '[{\"id\":\"73\",\"codigo\":\"73\",\"descripcion\":\"cargador mt-23\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 3500),
(328, 1, 325, '2021-03-09', '14:02:06', 0, 0, '2021-03-09', 1, '[{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 3500),
(329, 1, 326, '2021-03-09', '14:29:50', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(330, 1, 327, '2021-03-09', '15:24:54', 0, 0, '2021-03-09', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"13000\",\"subtotal\":\"13000\"},{\"id\":\"241\",\"codigo\":\"241\",\"descripcion\":\"manos libres samsung original\",\"cantidad\":\"1\",\"costo\":\"23000\",\"precio\":\"33000\",\"subtotal\":\"33000\"}]', 46000, 0, 19000),
(331, 1, 328, '2021-03-09', '17:12:49', 0, 0, '2021-03-09', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 11000),
(332, 1, 329, '2021-03-09', '17:54:57', 0, 0, '2021-03-09', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(333, 1, 330, '2021-03-09', '18:21:38', 0, 0, '2021-03-09', 1, '[{\"id\":\"139\",\"codigo\":\"138\",\"descripcion\":\"memoria usb 32gb\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"30000\",\"subtotal\":\"30000\"}]', 30000, 0, 16000),
(334, 1, 331, '2021-03-09', '19:50:33', 0, 0, '2021-03-09', 1, '[{\"id\":\"266\",\"codigo\":\"266\",\"descripcion\":\"telefono rp nokia 106\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"291\",\"codigo\":\"290\",\"descripcion\":\"cargador spartan c118\",\"cantidad\":\"1\",\"costo\":\"5800\",\"precio\":\"16000\",\"subtotal\":\"16000\"}]', 69000, 0, 30800),
(335, 1, 332, '2021-03-09', '19:53:03', 0, 0, '2021-03-09', 1, '[{\"id\":\"291\",\"codigo\":\"290\",\"descripcion\":\"cargador spartan c118\",\"cantidad\":\"2\",\"costo\":\"5800\",\"precio\":\"15000\",\"subtotal\":\"30000\"},{\"id\":\"90\",\"codigo\":\"90\",\"descripcion\":\"manos libres sky plus\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 47000, 0, 30100),
(336, 1, 333, '2021-03-10', '09:23:23', 0, 0, '2021-03-10', 1, '[{\"id\":\"308\",\"codigo\":\"307\",\"descripcion\":\"radio xb-521urt\",\"cantidad\":\"1\",\"costo\":\"30000\",\"precio\":\"50000\",\"subtotal\":\"50000\"}]', 50000, 0, 20000),
(337, 1, 334, '2021-03-10', '10:10:48', 0, 0, '2021-03-10', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(338, 1, 335, '2021-03-10', '10:47:31', 0, 0, '2021-03-10', 1, '[{\"id\":\"230\",\"codigo\":\"230\",\"descripcion\":\"bateria pop c7\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 16000),
(339, 1, 336, '2021-03-10', '10:48:12', 0, 0, '2021-03-10', 1, '[{\"id\":\"288\",\"codigo\":\"287\",\"descripcion\":\"cargador samsung s7\",\"cantidad\":\"1\",\"costo\":\"7500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7500),
(340, 1, 337, '2021-03-10', '11:52:54', 0, 0, '2021-03-10', 1, '[{\"id\":\"268\",\"codigo\":\"268\",\"descripcion\":\"telefono a10s\",\"cantidad\":\"1\",\"costo\":\"425000\",\"precio\":\"465000\",\"subtotal\":\"465000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 470000, 0, 44200),
(341, 1, 338, '2021-03-10', '11:53:23', 0, 0, '2021-03-10', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5800),
(342, 1, 339, '2021-03-10', '12:45:02', 0, 0, '2021-03-10', 1, '[{\"id\":\"337\",\"codigo\":\"336\",\"descripcion\":\"spartan c119 \",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(343, 1, 340, '2021-03-10', '09:51:39', 0, 0, '2021-03-10', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(344, 1, 341, '2021-03-10', '12:46:22', 0, 0, '2021-03-10', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(345, 1, 342, '2021-03-10', '15:57:53', 0, 0, '2021-03-10', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(346, 1, 343, '2021-03-10', '15:58:24', 0, 0, '2021-03-10', 1, '[{\"id\":\"228\",\"codigo\":\"228\",\"descripcion\":\"bateria bl 4c\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(347, 1, 344, '2021-03-10', '15:58:53', 0, 0, '2021-03-10', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(348, 1, 345, '2021-03-10', '15:59:21', 0, 0, '2021-03-10', 1, '[{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7500),
(349, 1, 346, '2021-03-10', '17:00:37', 0, 0, '2021-03-10', 1, '[{\"id\":\"142\",\"codigo\":\"142\",\"descripcion\":\"memoria microlector\",\"cantidad\":\"1\",\"costo\":\"1800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3200),
(350, 1, 347, '2021-03-10', '17:13:21', 0, 0, '2021-03-10', 1, '[{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"3\",\"costo\":\"2500\",\"precio\":\"6666\",\"subtotal\":\"19998\"}]', 19998, 0, 12498),
(351, 1, 348, '2021-03-10', '17:17:52', 0, 0, '2021-03-10', 1, '[{\"id\":\"77\",\"codigo\":\"77\",\"descripcion\":\"cargador pluyin mt-12\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7000),
(352, 1, 349, '2021-03-10', '17:18:30', 0, 0, '2021-03-10', 1, '[{\"id\":\"22\",\"codigo\":\"22\",\"descripcion\":\"telefono hyundai e475\",\"cantidad\":\"1\",\"costo\":\"138000\",\"precio\":\"160000\",\"subtotal\":\"160000\"},{\"id\":\"246\",\"codigo\":\"246\",\"descripcion\":\"protector  carteras universal\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"240\",\"codigo\":\"240\",\"descripcion\":\"sim car tigo\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 173000, 0, 30500),
(353, 1, 350, '2021-03-10', '17:30:34', 0, 0, '2021-03-10', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(354, 1, 351, '2021-03-10', '17:44:57', 0, 0, '2021-03-10', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 35000, 0, 8000),
(355, 1, 352, '2021-03-10', '18:36:37', 0, 0, '2021-03-10', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"}]', 10000, 0, 6000),
(356, 1, 353, '2021-03-10', '19:16:58', 0, 0, '2021-03-10', 1, '[{\"id\":\"282\",\"codigo\":\"282\",\"descripcion\":\"mouse w920\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 13000),
(357, 1, 354, '2021-03-11', '09:33:40', 0, 0, '2021-03-11', 1, '[{\"id\":\"87\",\"codigo\":\"87\",\"descripcion\":\"cargador samsung\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"50000\",\"subtotal\":\"50000\"}]', 50000, 0, 38000),
(358, 1, 355, '2021-03-11', '09:34:40', 0, 0, '2021-03-11', 1, '[{\"id\":\"291\",\"codigo\":\"290\",\"descripcion\":\"cargador spartan c118\",\"cantidad\":\"1\",\"costo\":\"5800\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 9200),
(359, 1, 356, '2021-03-11', '09:35:32', 0, 0, '2021-03-11', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"2\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"30000\"}]', 50000, 0, 31600),
(360, 1, 357, '2021-03-11', '10:09:48', 0, 0, '2021-03-11', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 15000, 0, 10000),
(361, 1, 358, '2021-03-11', '12:34:04', 0, 0, '2021-03-11', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(362, 1, 359, '2021-03-11', '13:24:18', 0, 0, '2021-03-11', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(363, 1, 360, '2021-03-11', '14:14:29', 0, 0, '2021-03-11', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 5500),
(364, 1, 361, '2021-03-11', '15:05:47', 0, 0, '2021-03-11', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"14000\",\"subtotal\":\"14000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 22000, 0, 12800),
(365, 1, 362, '2021-03-11', '15:25:31', 0, 0, '2021-03-11', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"2\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"30000\"}]', 30000, 0, 14000),
(366, 1, 363, '2021-03-11', '16:07:46', 0, 0, '2021-03-11', 1, '[{\"id\":\"227\",\"codigo\":\"227\",\"descripcion\":\"bateria 1100 nokia\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"80\",\"codigo\":\"80\",\"descripcion\":\"cargador v8 sencillo\",\"cantidad\":\"1\",\"costo\":\"2300\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 55000, 0, 37300),
(367, 1, 364, '2021-03-11', '16:21:25', 0, 0, '2021-03-11', 1, '[{\"id\":\"252\",\"codigo\":\"252\",\"descripcion\":\"cabezote\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7500),
(368, 1, 365, '2021-03-11', '16:31:56', 0, 0, '2021-03-11', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(369, 1, 366, '2021-03-11', '09:31:52', 0, 0, '2021-03-12', 1, '[{\"id\":\"305\",\"codigo\":\"304\",\"descripcion\":\"parlante mt-887\",\"cantidad\":\"1\",\"costo\":\"15000\",\"precio\":\"25000\",\"subtotal\":\"25000\"},{\"id\":\"84\",\"codigo\":\"84\",\"descripcion\":\"cargador ridex 2a\",\"cantidad\":\"1\",\"costo\":\"2800\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"3\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"45000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"14000\",\"subtotal\":\"14000\"},{\"id\":\"271\",\"codigo\":\"271\",\"descripcion\":\"telefono alcatel 1b\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"260000\",\"subtotal\":\"260000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"2\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"10000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"87\",\"codigo\":\"87\",\"descripcion\":\"cargador samsung\",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"38000\",\"subtotal\":\"38000\"}]', 432000, 0, 139700),
(370, 1, 367, '2021-03-12', '09:49:40', 0, 0, '2021-03-12', 1, '[{\"id\":\"253\",\"codigo\":\"253\",\"descripcion\":\"adaptadores\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 2000),
(371, 1, 368, '2021-03-12', '10:17:39', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"2\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"20000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 40000, 0, 29200),
(372, 1, 369, '2021-03-12', '10:21:12', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(373, 1, 370, '2021-03-12', '10:24:01', 1, 5, '2021-04-26', 5, '[{\"id\":\"213\",\"codigo\":\"213\",\"descripcion\":\"parlante j&r 5162\",\"cantidad\":\"1\",\"costo\":\"650000\",\"precio\":\"750000\",\"subtotal\":\"750000\"}]', 750000, 450000, 100000),
(374, 1, 371, '2021-03-12', '11:50:36', 0, 0, '2021-03-12', 1, '[{\"id\":\"244\",\"codigo\":\"244\",\"descripcion\":\"protector latex 7\",\"cantidad\":\"1\",\"costo\":\"8500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"243\",\"codigo\":\"243\",\"descripcion\":\"aro de luz\",\"cantidad\":\"1\",\"costo\":\"55000\",\"precio\":\"75000\",\"subtotal\":\"75000\"},{\"id\":\"304\",\"codigo\":\"303\",\"descripcion\":\"parlante jc-222\",\"cantidad\":\"1\",\"costo\":\"50000\",\"precio\":\"70000\",\"subtotal\":\"70000\"},{\"id\":\"66\",\"codigo\":\"66\",\"descripcion\":\"cargador mt-16\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 183000, 0, 55500),
(375, 1, 372, '2021-03-12', '12:06:18', 0, 0, '2021-03-12', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(376, 1, 373, '2021-03-12', '12:37:26', 0, 0, '2021-03-12', 1, '[{\"id\":\"228\",\"codigo\":\"228\",\"descripcion\":\"bateria bl 4c\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(377, 1, 374, '2021-03-12', '13:26:21', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(378, 1, 375, '2021-03-12', '14:36:32', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(379, 1, 376, '2021-03-12', '14:56:17', 0, 0, '2021-03-12', 1, '[{\"id\":\"346\",\"codigo\":\"345\",\"descripcion\":\"nano gel \",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 8000),
(380, 1, 377, '2021-03-12', '14:57:06', 0, 0, '2021-03-12', 1, '[{\"id\":\"358\",\"codigo\":\"357\",\"descripcion\":\"manos libres akg \",\"cantidad\":\"1\",\"costo\":\"2800\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7200),
(381, 1, 378, '2021-03-12', '16:02:27', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(382, 1, 379, '2021-03-12', '16:29:28', 0, 0, '2021-03-12', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(383, 1, 380, '2021-03-12', '17:07:12', 0, 0, '2021-03-12', 1, '[{\"id\":\"172\",\"codigo\":\"172\",\"descripcion\":\"mause a30\",\"cantidad\":\"1\",\"costo\":\"17000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 8000),
(384, 1, 381, '2021-03-12', '18:24:55', 0, 0, '2021-03-12', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 5000),
(385, 1, 382, '2021-03-12', '18:54:09', 0, 0, '2021-03-12', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(386, 1, 383, '2021-03-13', '09:48:39', 0, 0, '2021-03-13', 1, '[{\"id\":\"289\",\"codigo\":\"288\",\"descripcion\":\"cargador spartan c130\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"18000\",\"subtotal\":\"18000\"}]', 18000, 0, 11000),
(387, 1, 384, '2021-03-13', '09:49:14', 0, 0, '2021-03-13', 1, '[{\"id\":\"51\",\"codigo\":\"51\",\"descripcion\":\"telefono movic a6001\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"270000\",\"subtotal\":\"270000\"}]', 270000, 0, 45000),
(388, 1, 385, '2021-03-13', '10:57:11', 0, 0, '2021-03-13', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 4200),
(389, 1, 386, '2021-03-13', '10:57:57', 0, 0, '2021-03-13', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 17300),
(390, 1, 387, '2021-03-13', '10:58:32', 0, 0, '2021-03-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(391, 1, 388, '2021-03-13', '11:08:37', 1, 1, '2021-03-23', 6, '[{\"id\":\"261\",\"codigo\":\"261\",\"descripcion\":\"telefono moto e4 plus\",\"cantidad\":\"1\",\"costo\":\"345000\",\"precio\":\"370000\",\"subtotal\":\"370000\"}]', 370000, 0, 25000),
(392, 1, 389, '2021-03-13', '19:51:57', 0, 0, '2021-03-14', 1, '[{\"id\":\"290\",\"codigo\":\"289\",\"descripcion\":\"cargador spartan s401\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 6000),
(393, 1, 390, '2021-03-13', '12:09:24', 0, 0, '2021-03-13', 1, '[{\"id\":\"358\",\"codigo\":\"357\",\"descripcion\":\"manos libres akg \",\"cantidad\":\"1\",\"costo\":\"2800\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 20000, 0, 13200),
(394, 1, 391, '2021-03-13', '12:23:19', 0, 0, '2021-03-13', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(395, 1, 392, '2021-03-13', '14:12:08', 0, 0, '2021-03-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(396, 1, 393, '2021-03-13', '15:10:42', 0, 0, '2021-03-13', 1, '[{\"id\":\"113\",\"codigo\":\"113\",\"descripcion\":\"cables iphone bolsa económica \",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"12000\",\"subtotal\":\"12000\"},{\"id\":\"130\",\"codigo\":\"130\",\"descripcion\":\"memoria micros grabada\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 27000, 0, 18000),
(397, 1, 394, '2021-03-13', '15:25:08', 0, 0, '2021-03-13', 1, '[{\"id\":\"262\",\"codigo\":\"262\",\"descripcion\":\"telefono nokia 106\",\"cantidad\":\"1\",\"costo\":\"67000\",\"precio\":\"100000\",\"subtotal\":\"100000\"}]', 100000, 0, 33000),
(398, 1, 395, '2021-03-13', '15:25:36', 0, 0, '2021-03-13', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 5000),
(399, 1, 396, '2021-03-13', '16:28:56', 0, 0, '2021-03-13', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(400, 1, 397, '2021-03-13', '16:50:01', 0, 0, '2021-03-13', 1, '[{\"id\":\"57\",\"codigo\":\"57\",\"descripcion\":\"tablet logic\",\"cantidad\":\"1\",\"costo\":\"135000\",\"precio\":\"150000\",\"subtotal\":\"150000\"}]', 150000, 0, 15000),
(401, 1, 398, '2021-03-13', '19:42:56', 0, 0, '2021-03-13', 1, '[{\"id\":\"139\",\"codigo\":\"138\",\"descripcion\":\"memoria usb 32gb\",\"cantidad\":\"1\",\"costo\":\"14000\",\"precio\":\"32000\",\"subtotal\":\"32000\"},{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"33000\",\"subtotal\":\"33000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 78000, 0, 35000),
(402, 1, 399, '2021-03-13', '20:02:46', 0, 0, '2021-03-13', 1, '[{\"id\":\"262\",\"codigo\":\"262\",\"descripcion\":\"telefono nokia 106\",\"cantidad\":\"1\",\"costo\":\"67000\",\"precio\":\"90000\",\"subtotal\":\"90000\"}]', 90000, 0, 23000),
(403, 1, 400, '2021-03-14', '09:24:01', 0, 0, '2021-03-14', 1, '[{\"id\":\"276\",\"codigo\":\"276\",\"descripcion\":\"redmi 9 32gb\",\"cantidad\":\"1\",\"costo\":\"480000\",\"precio\":\"530000\",\"subtotal\":\"530000\"}]', 530000, 0, 50000),
(404, 1, 401, '2021-03-14', '09:25:57', 0, 0, '2021-03-14', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"253\",\"codigo\":\"253\",\"descripcion\":\"adaptadores\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 13000, 0, 10800);
INSERT INTO `venta` (`id`, `id_sucursal`, `codigo`, `fecha`, `hora`, `tipo`, `id_plazo`, `fecha_vencimiento`, `id_cliente`, `detalle_venta`, `total`, `saldo`, `utilidad`) VALUES
(405, 1, 402, '2021-03-14', '09:28:01', 0, 0, '2021-03-14', 1, '[{\"id\":\"17\",\"codigo\":\"17\",\"descripcion\":\"telefono a01 core\",\"cantidad\":\"1\",\"costo\":\"265000\",\"precio\":\"300000\",\"subtotal\":\"300000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"78\",\"codigo\":\"78\",\"descripcion\":\"cargador qc-01 v8\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 330000, 0, 50800),
(406, 1, 403, '2021-03-14', '09:47:33', 0, 0, '2021-03-14', 1, '[{\"id\":\"337\",\"codigo\":\"336\",\"descripcion\":\"spartan c119 \",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"359\",\"codigo\":\"358\",\"descripcion\":\"protector tablet catrera \",\"cantidad\":\"1\",\"costo\":\"12000\",\"precio\":\"20000\",\"subtotal\":\"20000\"},{\"id\":\"133\",\"codigo\":\"133\",\"descripcion\":\"memoria micro 16bg\",\"cantidad\":\"1\",\"costo\":\"11500\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 60000, 0, 30000),
(407, 1, 404, '2021-03-14', '11:34:55', 0, 0, '2021-03-14', 1, '[{\"id\":\"206\",\"codigo\":\"206\",\"descripcion\":\"soporte jolder de carro\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(408, 1, 405, '2021-03-14', '11:37:58', 0, 0, '2021-03-14', 1, '[{\"id\":\"79\",\"codigo\":\"79\",\"descripcion\":\"cargador qc-01 tipo c\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 48000, 0, 28800),
(409, 1, 406, '2021-03-14', '12:26:18', 0, 0, '2021-03-14', 1, '[{\"id\":\"43\",\"codigo\":\"43\",\"descripcion\":\"telefono epik k503t\",\"cantidad\":\"1\",\"costo\":\"183000\",\"precio\":\"230000\",\"subtotal\":\"230000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 246000, 0, 56500),
(410, 1, 407, '2021-03-15', '10:12:31', 0, 0, '2021-03-15', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"9000\",\"subtotal\":\"18000\"},{\"id\":\"136\",\"codigo\":\"135\",\"descripcion\":\"memoria usb 4gb\",\"cantidad\":\"1\",\"costo\":\"9500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"285\",\"codigo\":\"284\",\"descripcion\":\"cargador mtf bolsa\",\"cantidad\":\"1\",\"costo\":\"6000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 60000, 0, 28100),
(411, 1, 408, '2021-03-15', '14:56:18', 0, 0, '2021-03-15', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 30000, 0, 15500),
(412, 1, 409, '2021-03-15', '15:18:17', 0, 0, '2021-03-15', 1, '[{\"id\":\"337\",\"codigo\":\"336\",\"descripcion\":\"spartan c119 \",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(413, 1, 410, '2021-03-15', '15:39:02', 0, 0, '2021-03-15', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"9000\",\"subtotal\":\"9000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"9000\",\"subtotal\":\"9000\"}]', 18000, 0, 12600),
(414, 1, 411, '2021-03-15', '15:56:29', 0, 0, '2021-03-15', 1, '[{\"id\":\"52\",\"codigo\":\"52\",\"descripcion\":\"telefono redmi 9 64gb\",\"cantidad\":\"1\",\"costo\":\"535000\",\"precio\":\"575000\",\"subtotal\":\"575000\"}]', 575000, 0, 40000),
(415, 1, 412, '2021-03-15', '15:59:08', 0, 0, '2021-03-15', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3800),
(416, 1, 413, '2021-03-15', '16:22:05', 0, 0, '2021-03-15', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(417, 1, 414, '2021-03-15', '18:26:48', 0, 0, '2021-03-15', 1, '[{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(418, 1, 415, '2021-03-15', '18:43:34', 0, 0, '2021-03-15', 1, '[{\"id\":\"111\",\"codigo\":\"111\",\"descripcion\":\"cables bolsa v8 b.e\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"6000\",\"subtotal\":\"6000\"}]', 6000, 0, 3500),
(419, 1, 416, '2021-03-16', '09:02:24', 0, 0, '2021-03-16', 1, '[{\"id\":\"137\",\"codigo\":\"136\",\"descripcion\":\"memoria usb 8gb\",\"cantidad\":\"1\",\"costo\":\"10500\",\"precio\":\"20000\",\"subtotal\":\"20000\"}]', 20000, 0, 9500),
(420, 1, 417, '2021-03-16', '09:46:44', 0, 0, '2021-03-16', 1, '[{\"id\":\"271\",\"codigo\":\"271\",\"descripcion\":\"telefono alcatel 1b\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"260000\",\"subtotal\":\"260000\"}]', 260000, 260000, 35000),
(422, 1, 418, '2021-03-16', '10:36:30', 0, 0, '2021-03-16', 1, '[{\"id\":\"155\",\"codigo\":\"155\",\"descripcion\":\"diadema lkd 100\",\"cantidad\":\"1\",\"costo\":\"26000\",\"precio\":\"38000\",\"subtotal\":\"38000\"}]', 38000, 0, 12000),
(423, 1, 419, '2021-03-16', '10:37:45', 0, 0, '2021-03-16', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500),
(424, 1, 420, '2021-03-16', '17:44:59', 0, 0, '2021-03-16', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 12000, 0, 8000),
(425, 1, 421, '2021-03-16', '12:54:41', 0, 0, '2021-03-16', 1, '[{\"id\":\"265\",\"codigo\":\"265\",\"descripcion\":\"telefono kenxinda c1\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"45000\",\"subtotal\":\"45000\"}]', 45000, 0, 18000),
(426, 1, 422, '2021-03-16', '16:10:29', 0, 0, '2021-03-16', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(427, 1, 423, '2021-03-16', '16:53:24', 0, 0, '2021-03-16', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"22000\",\"subtotal\":\"22000\"}]', 30000, 0, 18800),
(428, 1, 424, '2021-03-16', '17:28:49', 2, 0, '2021-03-16', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(429, 1, 425, '2021-03-16', '17:40:20', 0, 0, '2021-03-16', 1, '[{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 10000),
(430, 1, 426, '2021-03-16', '18:18:13', 0, 0, '2021-03-16', 1, '[{\"id\":\"305\",\"codigo\":\"304\",\"descripcion\":\"parlante mt-887\",\"cantidad\":\"1\",\"costo\":\"15000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 10000),
(431, 1, 427, '2021-03-16', '19:37:24', 0, 0, '2021-03-16', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"2\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"20000\"}]', 35000, 0, 19600),
(432, 1, 428, '2021-03-17', '11:33:41', 0, 0, '2021-03-17', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"23000\",\"subtotal\":\"23000\"},{\"id\":\"16\",\"codigo\":\"16\",\"descripcion\":\"telefono alcatel 1c\",\"cantidad\":\"1\",\"costo\":\"175000\",\"precio\":\"200000\",\"subtotal\":\"200000\"},{\"id\":\"321\",\"codigo\":\"320\",\"descripcion\":\"bluetooth x72-tws\",\"cantidad\":\"1\",\"costo\":\"37000\",\"precio\":\"60000\",\"subtotal\":\"60000\"},{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"}]', 333000, 0, 76000),
(433, 1, 429, '2021-03-17', '12:22:50', 0, 0, '2021-03-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"99\",\"codigo\":\"99\",\"descripcion\":\"manos libres j5\",\"cantidad\":\"2\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"10000\"}]', 20000, 0, 14800),
(434, 1, 430, '2021-03-17', '13:45:11', 0, 0, '2021-03-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 14600),
(435, 1, 431, '2021-03-17', '14:22:26', 0, 0, '2021-03-17', 1, '[{\"id\":\"120\",\"codigo\":\"120\",\"descripcion\":\"cables clk tpu-01\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(436, 1, 432, '2021-03-17', '14:28:02', 0, 0, '2021-03-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(437, 1, 433, '2021-03-17', '14:31:50', 0, 0, '2021-03-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(438, 1, 434, '2021-03-17', '17:09:19', 0, 0, '2021-03-17', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 15000, 0, 10000),
(439, 1, 435, '2021-03-17', '17:33:48', 1, 5, '2021-05-01', 8, '[{\"id\":\"320\",\"codigo\":\"319\",\"descripcion\":\"pop 2f\",\"cantidad\":\"1\",\"costo\":\"220000\",\"precio\":\"270000\",\"subtotal\":\"270000\"}]', 270000, 190000, 50000),
(440, 1, 436, '2021-03-17', '17:55:11', 0, 0, '2021-03-17', 1, '[{\"id\":\"76\",\"codigo\":\"76\",\"descripcion\":\"cargador clk 3a 02v v8\",\"cantidad\":\"1\",\"costo\":\"7000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8000),
(441, 1, 437, '2021-03-17', '19:59:28', 0, 0, '2021-03-17', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 23000, 0, 13800),
(442, 1, 438, '2021-03-18', '09:29:32', 0, 0, '2021-03-18', 1, '[{\"id\":\"353\",\"codigo\":\"352\",\"descripcion\":\"manos libre ckm 03 \",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"18000\",\"subtotal\":\"18000\"}]', 18000, 0, 10000),
(443, 1, 439, '2021-03-18', '09:30:37', 0, 0, '2021-03-18', 1, '[{\"id\":\"110\",\"codigo\":\"110\",\"descripcion\":\"cables mt-105  mt-113 mt-116 mt-102 mt-108 mt-118\",\"cantidad\":\"1\",\"costo\":\"4500\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 8500),
(444, 1, 440, '2021-03-18', '09:59:11', 0, 0, '2021-03-18', 1, '[{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 3000, 0, 1500),
(445, 1, 441, '2021-03-18', '15:03:49', 0, 0, '2021-03-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(446, 1, 442, '2021-03-18', '12:09:12', 0, 0, '2021-03-18', 1, '[{\"id\":\"299\",\"codigo\":\"298\",\"descripcion\":\"parlante mt-1903\",\"cantidad\":\"1\",\"costo\":\"35000\",\"precio\":\"55000\",\"subtotal\":\"55000\"}]', 55000, 0, 20000),
(447, 1, 443, '2021-03-18', '12:56:10', 0, 0, '2021-03-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15800),
(448, 1, 444, '2021-03-18', '17:12:05', 0, 0, '2021-03-18', 1, '[{\"id\":\"241\",\"codigo\":\"241\",\"descripcion\":\"manos libres samsung original\",\"cantidad\":\"1\",\"costo\":\"23000\",\"precio\":\"33000\",\"subtotal\":\"33000\"}]', 33000, 0, 10000),
(449, 1, 445, '2021-03-18', '18:30:52', 0, 0, '2021-03-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(450, 1, 446, '2021-03-18', '18:30:34', 0, 0, '2021-03-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(451, 1, 447, '2021-03-18', '18:21:35', 0, 0, '2021-03-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 23000, 0, 13800),
(452, 1, 448, '2021-03-18', '18:22:33', 0, 0, '2021-03-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 5000),
(453, 1, 449, '2021-03-18', '18:26:00', 0, 0, '2021-03-18', 1, '[{\"id\":\"277\",\"codigo\":\"277\",\"descripcion\":\"redmi 9a 32g\",\"cantidad\":\"1\",\"costo\":\"410000\",\"precio\":\"440000\",\"subtotal\":\"440000\"}]', 440000, 0, 30000),
(454, 1, 450, '2021-03-18', '19:03:08', 0, 0, '2021-03-18', 1, '[{\"id\":\"41\",\"codigo\":\"41\",\"descripcion\":\"telefono moto one fusion 128gb\",\"cantidad\":\"1\",\"costo\":\"652000\",\"precio\":\"700000\",\"subtotal\":\"700000\"}]', 700000, 0, 48000),
(455, 1, 451, '2021-03-18', '19:30:17', 0, 0, '2021-03-18', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"353\",\"codigo\":\"352\",\"descripcion\":\"manos libre ckm 03 \",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"18000\",\"subtotal\":\"18000\"},{\"id\":\"111\",\"codigo\":\"111\",\"descripcion\":\"cables bolsa v8 b.e\",\"cantidad\":\"1\",\"costo\":\"2500\",\"precio\":\"7000\",\"subtotal\":\"7000\"}]', 50000, 0, 30300),
(456, 1, 452, '2021-03-18', '19:40:26', 0, 0, '2021-03-18', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"}]', 8000, 0, 6800),
(457, 1, 453, '2021-03-18', '20:03:27', 0, 0, '2021-03-18', 1, '[{\"id\":\"314\",\"codigo\":\"313\",\"descripcion\":\" corn k2 - k3 - k5\",\"cantidad\":\"1\",\"costo\":\"27000\",\"precio\":\"35000\",\"subtotal\":\"35000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"}]', 38000, 0, 9500),
(458, 1, 454, '2021-03-19', '10:38:50', 0, 0, '2021-03-19', 1, '[{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 14600),
(459, 1, 455, '2021-03-19', '10:40:00', 0, 0, '2021-03-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 10000, 8800),
(460, 1, 456, '2021-03-19', '10:40:18', 0, 0, '2021-03-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(462, 1, 458, '2021-03-19', '11:30:34', 0, 0, '2021-03-19', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(463, 1, 459, '2021-03-19', '11:32:05', 0, 0, '2021-03-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(464, 1, 460, '2021-03-19', '12:04:00', 0, 0, '2021-03-19', 1, '[{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 25000, 0, 15000),
(465, 1, 461, '2021-03-19', '13:13:10', 0, 0, '2021-03-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"14000\",\"subtotal\":\"14000\"}]', 22000, 0, 12800),
(466, 1, 462, '2021-03-19', '15:37:36', 0, 0, '2021-03-19', 1, '[{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 6500),
(467, 1, 463, '2021-03-19', '16:08:09', 0, 0, '2021-03-19', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"},{\"id\":\"253\",\"codigo\":\"253\",\"descripcion\":\"adaptadores\",\"cantidad\":\"1\",\"costo\":\"1000\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"249\",\"codigo\":\"249\",\"descripcion\":\"protector silicon case original\",\"cantidad\":\"1\",\"costo\":\"10000\",\"precio\":\"25000\",\"subtotal\":\"25000\"}]', 33000, 0, 20000),
(468, 1, 464, '2021-03-19', '17:52:03', 0, 0, '2021-03-19', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(469, 1, 465, '2021-03-20', '09:20:39', 0, 0, '2021-03-20', 1, '[{\"id\":\"372\",\"codigo\":\"371\",\"descripcion\":\"k2\",\"cantidad\":\"1\",\"costo\":\"180000\",\"precio\":\"250000\",\"subtotal\":\"250000\"}]', 250000, 0, 70000),
(470, 1, 466, '2021-03-20', '11:58:26', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(471, 1, 467, '2021-03-20', '12:35:13', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"8000\",\"subtotal\":\"8000\"},{\"id\":\"239\",\"codigo\":\"239\",\"descripcion\":\"sim car claro y movistar\",\"cantidad\":\"1\",\"costo\":\"1500\",\"precio\":\"3000\",\"subtotal\":\"3000\"},{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 26000, 0, 15300),
(472, 1, 468, '2021-03-20', '12:39:40', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(473, 1, 469, '2021-03-20', '14:09:09', 0, 0, '2021-03-20', 1, '[{\"id\":\"48\",\"codigo\":\"48\",\"descripcion\":\"spark 6 go 64gb\",\"cantidad\":\"1\",\"costo\":\"375000\",\"precio\":\"420000\",\"subtotal\":\"420000\"}]', 420000, 0, 45000),
(474, 1, 470, '2021-03-20', '14:13:29', 0, 0, '2021-03-20', 1, '[{\"id\":\"271\",\"codigo\":\"271\",\"descripcion\":\"telefono alcatel 1b\",\"cantidad\":\"1\",\"costo\":\"225000\",\"precio\":\"250000\",\"subtotal\":\"250000\"},{\"id\":\"248\",\"codigo\":\"248\",\"descripcion\":\"protector antichoques surtido\",\"cantidad\":\"1\",\"costo\":\"4200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"1\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 265000, 0, 35000),
(475, 1, 471, '2021-03-20', '14:49:57', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"316\",\"codigo\":\"315\",\"descripcion\":\"manillas banda\",\"cantidad\":\"1\",\"costo\":\"9000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 25000, 0, 14800),
(476, 1, 472, '2021-03-20', '15:37:00', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(477, 1, 473, '2021-03-20', '15:44:57', 0, 0, '2021-03-20', 1, '[{\"id\":\"309\",\"codigo\":\"308\",\"descripcion\":\"protector wash case\",\"cantidad\":\"1\",\"costo\":\"6500\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 8500),
(478, 1, 474, '2021-03-20', '17:30:45', 0, 0, '2021-03-20', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 8800),
(480, 1, 476, '2021-03-20', '17:31:57', 0, 0, '2021-03-20', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(481, 1, 477, '2021-03-20', '17:37:07', 0, 0, '2021-03-20', 1, '[{\"id\":\"93\",\"codigo\":\"93\",\"descripcion\":\"manos libres s5-s6-j69-t83\",\"cantidad\":\"1\",\"costo\":\"3000\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 10000, 0, 7000),
(482, 1, 478, '2021-03-20', '17:44:41', 0, 0, '2021-03-20', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"}]', 15000, 0, 7000),
(483, 1, 479, '2021-03-20', '18:45:12', 0, 0, '2021-03-20', 1, '[{\"id\":\"250\",\"codigo\":\"250\",\"descripcion\":\"vidrios sensillo\",\"cantidad\":\"2\",\"costo\":\"800\",\"precio\":\"5000\",\"subtotal\":\"10000\"},{\"id\":\"82\",\"codigo\":\"82\",\"descripcion\":\"cargador clk 2a-01 v8\",\"cantidad\":\"1\",\"costo\":\"5000\",\"precio\":\"12000\",\"subtotal\":\"12000\"}]', 22000, 0, 15400),
(484, 1, 480, '2021-03-20', '19:42:30', 0, 0, '2021-03-20', 1, '[{\"id\":\"238\",\"codigo\":\"238\",\"descripcion\":\"pop soker\",\"cantidad\":\"1\",\"costo\":\"2000\",\"precio\":\"5000\",\"subtotal\":\"5000\"}]', 5000, 0, 3000),
(485, 1, 481, '2021-03-21', '09:38:42', 0, 0, '2021-03-21', 1, '[{\"id\":\"247\",\"codigo\":\"247\",\"descripcion\":\"protector  silicon cover\",\"cantidad\":\"1\",\"costo\":\"8000\",\"precio\":\"15000\",\"subtotal\":\"15000\"},{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 25000, 0, 15800),
(486, 1, 482, '2021-03-21', '09:41:26', 0, 0, '2021-03-21', 1, '[{\"id\":\"251\",\"codigo\":\"251\",\"descripcion\":\"vidrios 5d y ceramicado\",\"cantidad\":\"1\",\"costo\":\"1200\",\"precio\":\"10000\",\"subtotal\":\"10000\"},{\"id\":\"119\",\"codigo\":\"119\",\"descripcion\":\"cable mt-118\",\"cantidad\":\"1\",\"costo\":\"3500\",\"precio\":\"10000\",\"subtotal\":\"10000\"}]', 20000, 0, 15300),
(487, 1, 483, '2021-03-21', '09:42:48', 0, 0, '2021-03-21', 1, '[{\"id\":\"103\",\"codigo\":\"103\",\"descripcion\":\"manos libres 5830-r- samsung\",\"cantidad\":\"1\",\"costo\":\"4000\",\"precio\":\"13000\",\"subtotal\":\"13000\"}]', 13000, 0, 9000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono_compras`
--
ALTER TABLE `abono_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `abono_plansepare`
--
ALTER TABLE `abono_plansepare`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `abono_venta`
--
ALTER TABLE `abono_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes_producto`
--
ALTER TABLE `componentes_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `compras_cliente`
--
ALTER TABLE `compras_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_proveedor`
--
ALTER TABLE `compra_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devol_cliente`
--
ALTER TABLE `devol_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `devol_proveedor`
--
ALTER TABLE `devol_proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iniciar_punto_venta`
--
ALTER TABLE `iniciar_punto_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `noexistente`
--
ALTER TABLE `noexistente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perdida`
--
ALTER TABLE `perdida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plansepare`
--
ALTER TABLE `plansepare`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plazo`
--
ALTER TABLE `plazo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuariosucursal`
--
ALTER TABLE `usuariosucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vanta_producto`
--
ALTER TABLE `vanta_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono_compras`
--
ALTER TABLE `abono_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `abono_plansepare`
--
ALTER TABLE `abono_plansepare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `abono_venta`
--
ALTER TABLE `abono_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `componentes_producto`
--
ALTER TABLE `componentes_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compras_cliente`
--
ALTER TABLE `compras_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT de la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_proveedor`
--
ALTER TABLE `compra_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `devol_cliente`
--
ALTER TABLE `devol_cliente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devol_proveedor`
--
ALTER TABLE `devol_proveedor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `iniciar_punto_venta`
--
ALTER TABLE `iniciar_punto_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `intereses`
--
ALTER TABLE `intereses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noexistente`
--
ALTER TABLE `noexistente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perdida`
--
ALTER TABLE `perdida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `plansepare`
--
ALTER TABLE `plansepare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plazo`
--
ALTER TABLE `plazo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `retenciones`
--
ALTER TABLE `retenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuariosucursal`
--
ALTER TABLE `usuariosucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vanta_producto`
--
ALTER TABLE `vanta_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=848;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
