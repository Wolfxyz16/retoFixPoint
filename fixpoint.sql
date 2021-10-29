-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 08:26:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fixpoint`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `cod_alquiler` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_herramienta` int(11) NOT NULL,
  `fecha_prealquiler` date DEFAULT NULL,
  `fecha_alquiler_inicio` date NOT NULL,
  `fecha_alquiler_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `cod_herramienta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca_y_modelo` varchar(100) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `disponibilidad` enum('Disponible','No Disponible') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`cod_herramienta`, `nombre`, `marca_y_modelo`, `foto`, `disponibilidad`) VALUES
(1, 'Alicate de corte (Acesa)', 'Acesa', '/herramientas/Alicate de corte (Acesa).jpg', 'Disponible'),
(2, 'Alicate Grupillas 19-60 (Irimo)', 'Irimo', '/herramientas/Alicate Grupillas 19-60 (Irimo).jpg', 'Disponible'),
(3, 'Alicate Grupillas 19-60 (Palmera)', 'Palmera', '/herramientas/Alicate Grupillas 19-60 (Palmera).jpg', 'Disponible'),
(4, 'Alicate Grupillas Hembra (Garant)', 'Garant', '/herramientas/Alicate Grupillas Hembra (Garant).jpg', 'Disponible'),
(5, 'Alicate Grupillas Hembra 19-60 (Irimo)', 'Irimo', '/herramientas/Alicate Grupillas Hembra 19-60 (Irimo).jpg', 'Disponible'),
(6, 'Alicate Grupillas normalmente cerrado (Garant)', 'Garant', '/herramientas/Alicate Grupillas normalmente cerrado (Garant).jpg', 'Disponible'),
(7, 'Alicate Grupillas o anillos elasticos con muelle (Palmera)', 'Palmera', '/herramientas/Alicate Grupillas o anillos elasticos con muelle (Palmera).jpg', 'Disponible'),
(8, 'Alicate Punta acodada (Palmera 200)', 'Palmera 200', '/herramientas/Alicate Punta acodada (Palmera 200).jpg', 'Disponible'),
(9, 'Alicate punta acodada con corte (Holex)', 'Holex', '/herramientas/Alicate punta acodada con corte (Holex).jpg', 'Disponible'),
(10, 'Alicate Punta acodada grupillas 19-60 (Will)', 'Will', '/herramientas/Alicate Punta acodada grupillas 19-60 (Will).jpg', 'Disponible'),
(11, 'Alicate Punta acodada grupillas con muelle 19-60 (Irimo)', 'Irimo', '/herramientas/Alicate Punta acodada grupillas con muelle 19-60 (Irimo).jpg', 'Disponible'),
(12, 'Alicate Punta acodada grupillas con muelle 19-60 (Palmera)', 'Palmera', '/herramientas/Alicate Punta acodada grupillas con muelle 19-60 (Palmera).jpg', 'Disponible'),
(13, 'Alicate Punta redonda Muelle (Acesa)', 'Acesa', '/herramientas/Alicate Punta redonda Muelle (Acesa).jpg', 'Disponible'),
(14, 'Alicate puntas redondeadas 19-60 (Palmera)', 'Palmera', '/herramientas/Alicate puntas redondeadas 19-60 (Palmera).jpg', 'Disponible'),
(15, 'Alicates Punta Plana', NULL, '/herramientas/Alicates Punta Plana.jpg', 'Disponible'),
(16, 'Alicates Universales (Palmera)', 'Palmera', '/herramientas/Alicates Universales (Palmera).jpg', 'Disponible'),
(17, 'Calibre 150mm (Mitutoyo 150)', 'Mitutoyo 150', '/herramientas/Calibre 150mm (Mitutoyo 150).jpg', 'Disponible'),
(18, 'Calibre 150mm (Saturn)', 'Saturn', '/herramientas/Calibre 150mm (Saturn).jpg', 'Disponible'),
(19, 'Calibre 150mm', NULL, '/herramientas/Calibre 150mm.jpg', 'Disponible'),
(20, 'Calibre Medid 150mm (Medid)', 'Medid', '/herramientas/Calibre Medid 150mm (Medid).jpg', 'Disponible'),
(21, 'Llave fija plana 6-7', NULL, '/herramientas/Llave fija plana 6-7.jpg', 'Disponible'),
(22, 'Llave fija plana 8-9', NULL, '/herramientas/Llave fija plana 8-9.jpg', 'Disponible'),
(23, 'Llave fija plana 10-11', NULL, '/herramientas/Llave fija plana 10-11.jpg', 'Disponible'),
(24, 'Llave fija plana 12-13', NULL, '/herramientas/Llave fija plana 12-13.jpg', 'Disponible'),
(25, 'Llave fija plana 14-15', NULL, '/herramientas/Llave fija plana 14-15.jpg', 'Disponible'),
(26, 'Llave fija plana 16-17', NULL, '/herramientas/Llave fija plana 16-17', 'Disponible'),
(27, 'Llave fija plana 18-19', NULL, '/herramientas/Llave fija plana 18-19.jpg', 'Disponible'),
(28, 'Llave fija plana 20-22', NULL, '/herramientas/Llave fija plana 20-22.jpg', 'Disponible'),
(29, 'Llave fija plana 21-23', NULL, '/herramientas/Llave fija plana 21-23.jpg', 'Disponible'),
(30, 'Llave fija plana 24-27', NULL, '/herramientas/Llave fija plana 24-27.jpg', 'Disponible'),
(31, 'Llave fija plana 25-28', NULL, '/herramientas/Llave fija plana 25-28.jpg', 'Disponible'),
(32, 'Llave fija plana 30-32', NULL, '/herramientas/Llave fija plana 30-32.jpg', 'Disponible'),
(33, 'Martillo de bola', NULL, '/herramientas/Martillo de bola.jpg', 'Disponible'),
(34, 'Martillo de teflon', NULL, '/herramientas/Martillo de teflon.jpg', 'Disponible'),
(35, 'Martillo duch', NULL, '/herramientas/Martillo duch.jpg', 'Disponible'),
(36, 'Maza', NULL, '/herramientas/Maza', 'Disponible'),
(37, 'PISTOLA DE CALOR (WURTH HLG 2000)', 'WURTH HLG 2000', '/herramientas/PISTOLA DE CALOR (WURTH HLG 2000).jpg', 'Disponible'),
(38, 'Radial (HITACHI)', 'HITACHI', '/herramientas/Radial (HITACHI).jpg', 'Disponible'),
(39, 'Taladro (Black&Decker BL 400)', 'Black&Decker BL 400', '/herramientas/Taladro (Black&Decker BL 400).jpg', 'Disponible'),
(40, 'Taladro (DEXTER POWER)', 'DEXTER POWER', '/herramientas/Taladro (DEXTER POWER).jpg', 'Disponible'),
(41, 'Taladro percutor (POWERPLUS)', 'POWERPLUS', '/herramientas/Taladro percutor (POWERPLUS).jpg', 'Disponible'),
(42, 'Tenaza de Sujección ajustable (Holex)', 'Holex', '/herramientas/Tenaza de Sujección ajustable (Holex).jpg', 'Disponible'),
(43, 'Tenazas (Palmera)', 'Palmera', '/herramientas/Tenazas (Palmera).jpg', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manuales`
--

CREATE TABLE `manuales` (
  `cod_manual` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `fichero` varchar(100) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `cod_autor` int(11) DEFAULT NULL,
  `aprobado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `manuales`
--

INSERT INTO `manuales` (`cod_manual`, `titulo`, `fichero`, `portada`, `cod_autor`, `aprobado`) VALUES
(1, 'Aspiradora Rowenta Modelo Ro5348EA', '/manuales/archivos/Aspiradora_Rowenta_Modelo_Ro5348EA.pdf', '/manuales/portadas/Aspiradora Rowenta Modelo Ro5348EA.png', 1, 1),
(2, 'Caladora Casals VC 60 2', '/manuales/archivos/Caladora_Casals_VC_60_2.pdf', '/manuales/portadas/Caladora Casals VC 60 2.png', 1, 1),
(3, 'Carrete de pesca Pole 30', '/manuales/archivos/Carrete_de_pesca_Pole_30.pdf', '/manuales/portadas/Carrete de pesca Pole 30.png', 1, 1),
(4, 'Cizalla YOSAN', '/manuales/archivos/Cizalla_YOSAN.pdf', '/manuales/portadas/Cizalla YOSAN.png', 1, 1),
(5, 'Maquina Afeitar Phillips 3 cabezales', '/manuales/archivos/Maquina_Afeitar_Phillips_3_cabezales.pdf', '/manuales/portadas/Maquina Afeitar Phillips 3 cabezales.png', 1, 1),
(6, 'Motor minarelli am6 49cc', '/manuales/archivos/Motor_minarelli_am6_49cc.pdf', '/manuales/portadas/Motor minarelli am6 49cc.png', 1, 1),
(7, 'RADIAL BAVARIA BAG 115', '/manuales/archivos/RADIAL_BAVARIA_BAG_115.pdf', '/manuales/portadas/RADIAL BAVARIA BAG 115.png', 1, 1),
(8, 'Radial RDM', '/manuales/archivos/Radial_RDM.pdf', '/manuales/portadas/Radial RDM.png', 1, 1),
(9, 'Radial Uni Work', '/manuales/archivos/Radial_Uni_Work.pdf', '/manuales/portadas/Radial Uni Work.png', 1, 1),
(10, 'ROTOMARTILLO METABO BH E 6024 CONTACT', '/manuales/archivos/ROTOMARTILLO_METABO_BH_E_6024_CONTACT.pdf', '/manuales/portadas/ROTOMARTILLO METABO BH E 6024 CONTACT.png', 1, 1),
(11, 'SECADOR PELO SILVERCREST', '/manuales/archivos/SECADOR_PELO_SILVERCREST.pdf', '/manuales/portadas/SECADOR PELO SILVERCREST.png', 1, 1),
(12, 'Taladro Bosch GSB 13 RE', '/manuales/archivos/Taladro_Bosch_GSB_13_RE.pdf', '/manuales/portadas/Taladro Bosch GSB 13 RE.png', 1, 1),
(13, 'Taladro de cable Black&Decker bd 160', '/manuales/archivos/Taladro_de_cable_Blackdecker_bd_160.pdf', '/manuales/portadas/Taladro de cable Black&Decker bd 160.png', 1, 1),
(14, 'TALADRO PERCUTOR DE CABLE CASALS C-5002P', '/manuales/archivos/TALADRO_PERCUTOR_DE_CABLE_CASALS_C-5002P.pdf', '/manuales/portadas/TALADRO PERCUTOR DE CABLE CASALS C-5002P.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_user` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_user`, `name`, `surname`, `mail`, `password`) VALUES
(1, 'Administrador', 'Administrador', 'admin', '527a16f01a7530ee9e4f52d3d2d7907fbfdd90c6be3e91516df17a8d97803c7580c8092eb57c6b38193f1e865948fd51b552d17d201a28ad5542cb6debb4378f');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`cod_alquiler`),
  ADD KEY `cod_user` (`cod_user`),
  ADD KEY `cod_herramienta` (`cod_herramienta`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`cod_herramienta`);

--
-- Indices de la tabla `manuales`
--
ALTER TABLE `manuales`
  ADD PRIMARY KEY (`cod_manual`),
  ADD KEY `cod_autor` (`cod_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `cod_alquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `cod_herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `manuales`
--
ALTER TABLE `manuales`
  MODIFY `cod_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `usuarios` (`cod_user`),
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`cod_herramienta`) REFERENCES `herramientas` (`cod_herramienta`);

--
-- Filtros para la tabla `manuales`
--
ALTER TABLE `manuales`
  ADD CONSTRAINT `manuales_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `usuarios` (`cod_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
