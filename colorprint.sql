-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2019 a las 20:10:10
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colorprint`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarcuenta` (IN `p0` INT(11))  NO SQL
INSERT INTO cuenta VALUES(null,@p0)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarmuni` (IN `p0` CHAR(30), IN `p1` INT(11))  NO SQL
INSERT INTO municipio VALUES(null,@p0,@p1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarnotas` (IN `p0` CHAR(30), IN `p1` VARCHAR(100), IN `p2` INT(11))  NO SQL
INSERT INTO notas VALUES(null,@p0,@p1,@p2)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id_acciones` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_acciones`, `id_rol`, `id_permiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 3),
(10, 2, 4),
(11, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoracompras`
--

CREATE TABLE `bitacoracompras` (
  `id_bicompra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacoracompras`
--

INSERT INTO `bitacoracompras` (`id_bicompra`, `id_compra`, `fecha`) VALUES
(3, 6, '2019-04-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoraventa`
--

CREATE TABLE `bitacoraventa` (
  `id_biventa` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacoraventa`
--

INSERT INTO `bitacoraventa` (`id_biventa`, `id_venta`, `fecha`) VALUES
(1, 16, '2019-04-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cliente` char(50) NOT NULL,
  `giro` varchar(50) DEFAULT NULL,
  `numero_nit` int(11) DEFAULT NULL,
  `numero_registro` int(11) NOT NULL,
  `id_muni` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `numero_fax` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contantos` varchar(50) DEFAULT NULL,
  `saldo_acumu` double NOT NULL,
  `limite_credito` double NOT NULL,
  `id_forma` int(11) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `aplica_reten` varchar(50) NOT NULL,
  `codigo_vendedor` int(11) DEFAULT NULL,
  `ultifechapago` date NOT NULL,
  `creadopor` varchar(50) NOT NULL,
  `fechacreacion` date NOT NULL,
  `id_tipocli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `giro`, `numero_nit`, `numero_registro`, `id_muni`, `telefono`, `numero_fax`, `correo`, `contantos`, `saldo_acumu`, `limite_credito`, `id_forma`, `dias_credito`, `id_cuenta`, `aplica_reten`, `codigo_vendedor`, `ultifechapago`, `creadopor`, `fechacreacion`, `id_tipocli`) VALUES
(1, 'papa johns', 'Empresa', 1564961239, 125454, 1, 7596345, 5367569, 'papajohns@gamil.com', '7563149', 1000.52, 750.5, 4, 10, 1, 'si', 159648, '2019-09-19', 'Miguel', '2019-04-10', 1),
(4, 'Farmacia San Nicolas', 'Farmacia', 2147483647, 129454, 12, 7596645, 5367566, 'sannicolas@gamil.com', '7963149', 2000.52, 950.5, 4, 10, 2, 'si', 159648, '0000-00-00', 'Miguel', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `numerodocumento` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `bodega` varchar(50) NOT NULL,
  `id_tipodoc` int(11) NOT NULL,
  `serie_costo` double NOT NULL,
  `id_tipocompra` int(11) NOT NULL,
  `id_forma` int(11) NOT NULL,
  `id_origencom` int(11) NOT NULL,
  `num_registro` int(11) NOT NULL,
  `num_compra` int(11) NOT NULL,
  `dai` varchar(50) NOT NULL,
  `doc_excluidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `numerodocumento`, `id_proveedor`, `direccion`, `bodega`, `id_tipodoc`, `serie_costo`, `id_tipocompra`, `id_forma`, `id_origencom`, `num_registro`, `num_compra`, `dai`, `doc_excluidos`) VALUES
(1, 456324, 1, 'San salvador', 'General', 1, 100.5, 1, 3, 1, 196346, 456321, 'si', 169345),
(2, 556324, 1, 'San salvador mejicanos', 'General', 1, 600.5, 1, 3, 1, 996346, 656321, 'no', 169349),
(3, 756324, 2, 'San salvador mejicanos', 'General', 1, 600.5, 1, 3, 1, 996346, 656321, 'no', 169349),
(6, 656324, 1, 'San salvador mejicanos', 'General', 1, 600.5, 1, 3, 1, 996346, 656321, 'no', 169349);

--
-- Disparadores `compra`
--
DELIMITER $$
CREATE TRIGGER `bitacompra` AFTER INSERT ON `compra` FOR EACH ROW INSERT INTO bitacoracompras(id_compra,fecha) VALUES(NEW.id_compra,"2019/04/04")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` double NOT NULL,
  `descuento` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `cantidad`, `id_producto`, `precio`, `descuento`, `id_cliente`, `total`) VALUES
(1, 10, 3, 0.3, 0.2, 1, 0.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `cuenta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `cuenta`) VALUES
(1, '100000'),
(9, '123456'),
(8, '147852'),
(6, '159753'),
(5, '753645'),
(2, '753698'),
(12, '756126'),
(10, '789456'),
(3, '851697'),
(7, '852369'),
(4, '964123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dep` int(11) NOT NULL,
  `departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dep`, `departamento`) VALUES
(1, 'Ahuachapán'),
(2, 'Santa Ana'),
(3, 'Sonsonate'),
(4, 'Usulután'),
(5, 'San Miguel'),
(7, 'La Unión'),
(8, 'La Libertad'),
(9, 'Chalatenango'),
(10, 'Cuscatlán'),
(11, 'San Salvador'),
(12, 'La Paz'),
(13, 'Cabañas'),
(14, 'San Vicente'),
(15, 'Morazán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_detallecom` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio_uni` double NOT NULL,
  `total_exeno` double NOT NULL,
  `total_grabado` double NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id_detallecom`, `id_producto`, `cantidad`, `descripcion`, `precio_uni`, `total_exeno`, `total_grabado`, `id_compra`) VALUES
(1, 1, 1000, 'hojas para imprimir', 0.5, 400, 350, 1),
(2, 1, 1000, 'hojas para imprimir', 0.5, 400, 350, 3),
(3, 1, 1000, 'hojas para imprimir', 0.5, 400, 350, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_detalleven` int(11) NOT NULL,
  `card_producto` int(11) NOT NULL,
  `umd` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` double NOT NULL,
  `v_nosujeta` varchar(50) NOT NULL,
  `v_efecta` varchar(50) NOT NULL,
  `t_p` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `total_gravado` double NOT NULL,
  `precio` double NOT NULL,
  `v_conversion` varchar(50) NOT NULL,
  `u_conversion` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Id_factura` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

CREATE TABLE `formapago` (
  `id_forma` int(11) NOT NULL,
  `forma_pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`id_forma`, `forma_pago`) VALUES
(4, 'Contra-entrega'),
(3, 'Credito'),
(1, 'Efectivo'),
(2, 'Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_tipocompra`
--

CREATE TABLE `id_tipocompra` (
  `id_tipocompra` int(11) NOT NULL,
  `tipo_compra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `id_tipocompra`
--

INSERT INTO `id_tipocompra` (`id_tipocompra`, `tipo_compra`) VALUES
(1, 'Gravada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_muni` int(11) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_muni`, `municipio`, `id_dep`) VALUES
(1, 'Apaneca', 1),
(2, 'Metapán', 2),
(3, 'Acajutla', 3),
(4, 'California', 4),
(5, 'Comacarán', 5),
(6, 'Bolívar', 7),
(7, 'Antiguo Cuscatlán', 8),
(8, 'Santa Rita', 9),
(9, 'Cojutepeque', 10),
(10, 'Aguilares', 11),
(11, 'El Rosario', 12),
(12, 'Sensuntepeque', 13),
(13, 'Apastepeque', 14),
(14, 'Arambala', 15),
(15, 'Mejicanos', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `nombre_nota` varchar(40) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `nombre_nota`, `descripcion`, `id_usuario`) VALUES
(1, '100 impresiones ', 'venta de 100 impresiones para el viernes', 4),
(2, 'comprar', 'comprar papel a que ya no queda mucho', 3),
(3, 'comprar tinta', 'comprar tinta de color negro ', 5),
(4, 'venta clandestina ', 'vender un banner para el miercoles', 1),
(7, 'hola', 'jnjkdncdc dcbhjdhcbd', 1),
(8, 'ddsd', 'zdcsdfdsccd', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origencompra`
--

CREATE TABLE `origencompra` (
  `id_origencom` int(11) NOT NULL,
  `origen_com` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `origencompra`
--

INSERT INTO `origencompra` (`id_origencom`, `origen_com`) VALUES
(1, 'Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `permisos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permisos`) VALUES
(6, 'Ajustes'),
(3, 'Compras'),
(7, 'Gestion'),
(5, 'Graficos'),
(1, 'Inicio'),
(2, 'Usuarios'),
(4, 'Ventas');

--
-- Disparadores `permisos`
--
DELIMITER $$
CREATE TRIGGER `eliminaracc` BEFORE DELETE ON `permisos` FOR EACH ROW DELETE FROM acciones WHERE id_permiso = OLD.id_permiso
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produto`
--

CREATE TABLE `produto` (
  `id_producto` int(11) NOT NULL,
  `nombre_produc` varchar(50) NOT NULL,
  `precio_uni` double NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `produto`
--

INSERT INTO `produto` (`id_producto`, `nombre_produc`, `precio_uni`, `descripcion`, `id_proveedor`) VALUES
(1, 'Impresiones blanca y y negro', 0.5, 'Impresiones en blanco y negro a mayoreo son mas economicas', 1),
(2, 'Banner', 10, 'bannner que su precion empienza desde los 10 dolares ', 2),
(3, 'hola', 0.5, 'Impresiones en blanco y negro a mayoreo son mas economicas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_prove` varchar(50) NOT NULL,
  `nit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_prove`, `nit`) VALUES
(1, 'Super Selectos ', '697.123.653-1'),
(2, 'Facela', '597.123.653-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `roles`) VALUES
(1, 'Administrador'),
(2, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucu` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucu`, `ubicacion`) VALUES
(1, 'Oficina central', 'San Salvador, El Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

CREATE TABLE `tipocliente` (
  `id_tipocli` int(11) NOT NULL,
  `tipo_cliete` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`id_tipocli`, `tipo_cliete`) VALUES
(1, 'Empresa'),
(2, 'Perona particular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_tipodoc` int(11) NOT NULL,
  `tipo_docmento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_tipodoc`, `tipo_docmento`) VALUES
(1, 'Compra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofacturacion`
--

CREATE TABLE `tipofacturacion` (
  `id_tipofac` int(11) NOT NULL,
  `facturacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipofacturacion`
--

INSERT INTO `tipofacturacion` (`id_tipofac`, `facturacion`) VALUES
(9, 'Factura dos'),
(8, 'Factura uno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id_tipocom` int(11) NOT NULL,
  `tipo_compro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_comprobante`
--

INSERT INTO `tipo_comprobante` (`id_tipocom`, `tipo_compro`) VALUES
(1, 'Crédito Fical'),
(2, 'Factura Consumidor final'),
(6, 'Factura de devolucion'),
(3, 'Nota de Crédito'),
(4, 'Nota debito'),
(5, 'TICKET');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_venta`
--

CREATE TABLE `tipo_venta` (
  `id_tipoven` int(11) NOT NULL,
  `tipo_venta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_venta`
--

INSERT INTO `tipo_venta` (`id_tipoven`, `tipo_venta`) VALUES
(2, 'Exenta'),
(1, 'Gravad'),
(3, 'tasa 0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `genero` text NOT NULL,
  `fecha_na` date NOT NULL,
  `nombre_usu` varchar(50) NOT NULL DEFAULT 'not null',
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `genero`, `fecha_na`, `nombre_usu`, `correo`, `clave`, `id_rol`) VALUES
(1, 'juancarlos', 'perez', 'Masculino', '2019-04-10', 'juan', 'juan@gmail.com', '*3201D8859FC4A85C2D6CC707F8E61DD81BCDD0C5', 1),
(3, 'Miguel', 'Gonzalez', 'Masculino', '2000-03-08', 'miguel10', 'miguel@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 1),
(4, 'Marcos', 'Lopez', 'Masculino', '2000-04-08', 'marcos7', 'marcos@gmail.com', '*5DAED8F111B3266434ACBF8D1F51472C9990E810', 1),
(5, 'Manuel', 'Reyes', 'Masculino', '2000-03-09', 'manuel777', 'manuel@gmail.com', '*88E42FA3C24929B9CC84876121F976CC5A5B19D7', 2),
(7, 'alonso', 'gonzalez', 'Masculino', '1999-05-05', 'al10', 'alonso@gmail.com', '123456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_tipocom` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_forma` int(11) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `punto_venta` varchar(50) NOT NULL,
  `contacto` int(11) DEFAULT NULL,
  `id_tipoven` int(11) NOT NULL,
  `id_tipofac` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nota_remision` varchar(50) NOT NULL,
  `num_pedido` int(11) NOT NULL,
  `bodega` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_sucursal`, `id_tipocom`, `id_cliente`, `direccion`, `id_forma`, `dias_credito`, `punto_venta`, `contacto`, `id_tipoven`, `id_tipofac`, `id_usuario`, `nota_remision`, `num_pedido`, `bodega`) VALUES
(3, 1, 1, 1, 'San salvador', 3, 10, 'Origen', 785236, 2, 8, 3, '100 impresiones', 523698, 'general'),
(7, 1, 1, 1, 'San miguel', 3, 15, 'Origen', 765236, 3, 9, 1, '10000 impresiones', 923698, 'general'),
(10, 1, 1, 1, 'mi casa', 3, 15, 'Origen', 765236, 3, 9, 1, '10000 impresiones', 923698, 'general'),
(16, 1, 1, 1, 'mi casita', 3, 15, 'Origen', 765236, 3, 9, 1, '10000 impresiones', 923698, 'general');

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `bitaventa` AFTER INSERT ON `ventas` FOR EACH ROW INSERT INTO bitacoraventa(id_venta,fecha) VALUES(NEW.id_venta, "2019/04/04")
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_acciones`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `bitacoracompras`
--
ALTER TABLE `bitacoracompras`
  ADD PRIMARY KEY (`id_bicompra`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `bitacoraventa`
--
ALTER TABLE `bitacoraventa`
  ADD PRIMARY KEY (`id_biventa`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `numero_nit` (`numero_nit`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `giro` (`giro`),
  ADD KEY `id_muni` (`id_muni`),
  ADD KEY `id_forma` (`id_forma`),
  ADD KEY `id_cuenta` (`id_cuenta`),
  ADD KEY `id_tipocli` (`id_tipocli`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `numerodocumento` (`numerodocumento`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_tipodoc` (`id_tipodoc`),
  ADD KEY `id_tipocompra` (`id_tipocompra`),
  ADD KEY `id_forma` (`id_forma`),
  ADD KEY `id_origencom` (`id_origencom`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `cuenta` (`cuenta`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id_detallecom`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id_detalleven`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `formapago`
--
ALTER TABLE `formapago`
  ADD PRIMARY KEY (`id_forma`),
  ADD UNIQUE KEY `forma_pago` (`forma_pago`);

--
-- Indices de la tabla `id_tipocompra`
--
ALTER TABLE `id_tipocompra`
  ADD PRIMARY KEY (`id_tipocompra`),
  ADD UNIQUE KEY `tipo_compra` (`tipo_compra`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_muni`),
  ADD UNIQUE KEY `municipio` (`municipio`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD UNIQUE KEY `nombre_nota` (`nombre_nota`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `origencompra`
--
ALTER TABLE `origencompra`
  ADD PRIMARY KEY (`id_origencom`),
  ADD UNIQUE KEY `origen_com` (`origen_com`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD UNIQUE KEY `permisos` (`permisos`);

--
-- Indices de la tabla `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_produc` (`nombre_produc`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `nombre_prove` (`nombre_prove`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `roles` (`roles`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD UNIQUE KEY `nombre_sucu` (`nombre_sucu`),
  ADD UNIQUE KEY `ubicacion` (`ubicacion`);

--
-- Indices de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  ADD PRIMARY KEY (`id_tipocli`),
  ADD UNIQUE KEY `tipo_cliete` (`tipo_cliete`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_tipodoc`),
  ADD UNIQUE KEY `tipo_docmento` (`tipo_docmento`);

--
-- Indices de la tabla `tipofacturacion`
--
ALTER TABLE `tipofacturacion`
  ADD PRIMARY KEY (`id_tipofac`),
  ADD UNIQUE KEY `facturacion` (`facturacion`);

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id_tipocom`),
  ADD UNIQUE KEY `tipo_compro` (`tipo_compro`);

--
-- Indices de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  ADD PRIMARY KEY (`id_tipoven`),
  ADD UNIQUE KEY `tipo_venta` (`tipo_venta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usu` (`nombre_usu`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_tipocom` (`id_tipocom`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_forma` (`id_forma`),
  ADD KEY `id_tipoven` (`id_tipoven`),
  ADD KEY `id_tipofac` (`id_tipofac`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id_acciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bitacoracompras`
--
ALTER TABLE `bitacoracompras`
  MODIFY `id_bicompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bitacoraventa`
--
ALTER TABLE `bitacoraventa`
  MODIFY `id_biventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id_detallecom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id_detalleven` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formapago`
--
ALTER TABLE `formapago`
  MODIFY `id_forma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `id_tipocompra`
--
ALTER TABLE `id_tipocompra`
  MODIFY `id_tipocompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_muni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `origencompra`
--
ALTER TABLE `origencompra`
  MODIFY `id_origencom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `produto`
--
ALTER TABLE `produto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  MODIFY `id_tipocli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_tipodoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipofacturacion`
--
ALTER TABLE `tipofacturacion`
  MODIFY `id_tipofac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  MODIFY `id_tipocom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  MODIFY `id_tipoven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `acciones_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`),
  ADD CONSTRAINT `acciones_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `bitacoracompras`
--
ALTER TABLE `bitacoracompras`
  ADD CONSTRAINT `bitacoracompras_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Filtros para la tabla `bitacoraventa`
--
ALTER TABLE `bitacoraventa`
  ADD CONSTRAINT `bitacoraventa_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_muni`) REFERENCES `municipio` (`id_muni`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_forma`) REFERENCES `formapago` (`id_forma`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`),
  ADD CONSTRAINT `cliente_ibfk_4` FOREIGN KEY (`id_tipocli`) REFERENCES `tipocliente` (`id_tipocli`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_tipodoc`) REFERENCES `tipodocumento` (`id_tipodoc`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_tipocompra`) REFERENCES `id_tipocompra` (`id_tipocompra`),
  ADD CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`id_forma`) REFERENCES `formapago` (`id_forma`),
  ADD CONSTRAINT `compra_ibfk_5` FOREIGN KEY (`id_origencom`) REFERENCES `origencompra` (`id_origencom`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `cotizaciones_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `produto` (`id_producto`),
  ADD CONSTRAINT `cotizaciones_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `produto` (`id_producto`),
  ADD CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_tipocom`) REFERENCES `tipo_comprobante` (`id_tipocom`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`id_forma`) REFERENCES `formapago` (`id_forma`),
  ADD CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`id_tipoven`) REFERENCES `tipo_venta` (`id_tipoven`),
  ADD CONSTRAINT `ventas_ibfk_6` FOREIGN KEY (`id_tipofac`) REFERENCES `tipofacturacion` (`id_tipofac`),
  ADD CONSTRAINT `ventas_ibfk_7` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
