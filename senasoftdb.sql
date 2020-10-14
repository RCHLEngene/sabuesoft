-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 15:03:06
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senasoftdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL,
  `numerofactura` int(11) DEFAULT NULL,
  `numeroordencompra` int(11) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombreempresa` varchar(100) DEFAULT NULL,
  `logoempresa` varchar(500) DEFAULT NULL,
  `regimentributario` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `resolucionDIAN` varchar(100) DEFAULT NULL,
  `fechainicioresolucion` date DEFAULT NULL,
  `iniciofacturacion` int(11) DEFAULT NULL,
  `finalfacturacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesfacturas`
--

CREATE TABLE `detallesfacturas` (
  `id` int(11) NOT NULL,
  `idfactura` int(11) DEFAULT NULL,
  `idproducto` varchar(30) DEFAULT NULL,
  `precioventa` decimal(18,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `totaliva` decimal(18,2) DEFAULT NULL,
  `totaldescuento` decimal(18,2) DEFAULT NULL,
  `valortotal` decimal(18,2) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `id` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` varchar(30) DEFAULT NULL,
  `preciopedido` decimal(18,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `totaliva` decimal(18,2) DEFAULT NULL,
  `totaldescuento` decimal(18,2) DEFAULT NULL,
  `valortotal` decimal(18,2) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `numeroconsecutivo` int(11) NOT NULL,
  `referenciapago` varchar(100) DEFAULT NULL,
  `fechaemision` date DEFAULT NULL,
  `fechaoportuna` date DEFAULT NULL,
  `idmediopago` int(11) DEFAULT NULL,
  `fechapago` date DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idsede` int(11) DEFAULT NULL,
  `idvendedor` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `valorfactura` decimal(18,2) DEFAULT NULL,
  `descuento` decimal(18,2) DEFAULT NULL,
  `subtotal` decimal(18,2) DEFAULT NULL,
  `iva` decimal(18,2) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediospagos`
--

CREATE TABLE `mediospagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numeroconsecutivo` int(11) NOT NULL,
  `referenciapago` varchar(100) DEFAULT NULL,
  `fechaemision` date DEFAULT NULL,
  `fechaoportuna` date DEFAULT NULL,
  `idmediopago` int(11) DEFAULT NULL,
  `fechapago` date DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `idsede` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `valorpedido` decimal(18,2) DEFAULT NULL,
  `descuento` decimal(18,2) DEFAULT NULL,
  `subtotal` decimal(18,2) DEFAULT NULL,
  `iva` decimal(18,2) DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` varchar(30) NOT NULL,
  `referencia` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `stockminimino` int(11) DEFAULT NULL,
  `stockmaximo` int(11) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `idbodega` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `preciocosto` decimal(18,2) DEFAULT NULL,
  `precioventa` decimal(18,2) DEFAULT NULL,
  `porcentajeiva` decimal(18,2) DEFAULT NULL,
  `descuento` decimal(18,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombreproveedor` varchar(100) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` varchar(20) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(20) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`numeroconsecutivo`),
  ADD KEY `idvendedor` (`idvendedor`),
  ADD KEY `idsede` (`idsede`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idmediopago` (`idmediopago`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `mediospagos`
--
ALTER TABLE `mediospagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numeroconsecutivo`),
  ADD KEY `idsede` (`idsede`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idmediopago` (`idmediopago`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idtipo` (`idtipo`),
  ADD KEY `idbodega` (`idbodega`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idmarca` (`idmarca`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idciudad` (`idciudad`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `numeroconsecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mediospagos`
--
ALTER TABLE `mediospagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numeroconsecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD CONSTRAINT `bodegas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detallesfacturas`
--
ALTER TABLE `detallesfacturas`
  ADD CONSTRAINT `detallesfacturas_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detallesfacturas_ibfk_2` FOREIGN KEY (`id`) REFERENCES `facturas` (`numeroconsecutivo`);

--
-- Filtros para la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`id`) REFERENCES `pedidos` (`numeroconsecutivo`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idvendedor`) REFERENCES `vendedores` (`id`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idsede`) REFERENCES `sedes` (`id`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `facturas_ibfk_4` FOREIGN KEY (`idmediopago`) REFERENCES `mediospagos` (`id`);

--
-- Filtros para la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mediospagos`
--
ALTER TABLE `mediospagos`
  ADD CONSTRAINT `mediospagos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idsede`) REFERENCES `sedes` (`id`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`idmediopago`) REFERENCES `mediospagos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipos` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`idbodega`) REFERENCES `bodegas` (`id`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_5` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `productos_ibfk_6` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_ibfk_1` FOREIGN KEY (`idciudad`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `sedes_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD CONSTRAINT `tipos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
