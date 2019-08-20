-- Ejecutar antes del siguiente script
--GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'root' WITH GRANT OPTION;



-- Ejecutar despues del grant
--DROP DATABASE MYCLASS;
CREATE DATABASE MYCLASS;
USE MYCLASS;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2019 a las 13:45:03
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myclass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `ID` int(10) NOT NULL,
  `CODIGO` varchar(255) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `CAPACIDAD` int(10) NOT NULL DEFAULT 30,
  `COD_OWNER` varchar(255) NOT NULL,
  `PRIVADO` tinyint(1) NOT NULL,
  `TEMATICA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `AGREGADOR` varchar(255) NOT NULL,
  `FAMILIA_PROF` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `CODIGO` varchar(255) NOT NULL,
  `COD_GRUPO` varchar(255) NOT NULL,
  `TITLE_TAREA` varchar(255) NOT NULL,
  `BODY_TAREA` varchar(255) NOT NULL,
  `FECHA_ENTREGA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usergroup`
--

CREATE TABLE `usergroup` (
  `COD_USER` varchar(255) NOT NULL,
  `COD_GROUP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usernotas`
--

CREATE TABLE `usernotas` (
  `COD_USER` varchar(255) NOT NULL,
  `COD_TAREA` varchar(255) NOT NULL,
  `ENTREGA` varchar(255) DEFAULT '0',
  `NOTA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(10) NOT NULL,
  `CODIGO` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL,
  `PASSWD` varchar(255) NOT NULL,
  `AVATAR` varchar(255) NOT NULL DEFAULT 'www.myclass.es/img/avatardefault.jpg',
  `NOMBRE_FULL` varchar(255) NOT NULL,
  `FAMILIA_PROF` varchar(255) NOT NULL,
  `FECHA_REG` datetime NOT NULL,
  `EDAD` int(10) NOT NULL,
  `DNI` varchar(255) DEFAULT NULL,
  `ADMIN_VALUE` tinyint(1) NOT NULL DEFAULT 0,
  `SEXO` CHAR(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`CODIGO`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `user_group_fk` (`COD_OWNER`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`FAMILIA_PROF`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `task_group_fk` (`COD_GRUPO`);

--
-- Indices de la tabla `usergroup`
--
ALTER TABLE `usergroup`
  ADD KEY `user_cod_fk` (`COD_USER`),
  ADD KEY `group_cod_fk` (`COD_GROUP`);

--
-- Indices de la tabla `usernotas`
--
ALTER TABLE `usernotas`
  ADD KEY `user_notas_fk` (`COD_USER`),
  ADD KEY `task_notas_fk` (`COD_TAREA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CODIGO`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `AVATAR` (`AVATAR`),
  ADD KEY `user_prof_fk` (`FAMILIA_PROF`);


CREATE TABLE `amigos` (
  `ID` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `USER1` varchar(255) DEFAULT NULL,
  `USER2` varchar(255) DEFAULT NULL,
  `ESTADO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `user_group_fk` FOREIGN KEY (`COD_OWNER`) REFERENCES `usuario` (`CODIGO`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `task_group_fk` FOREIGN KEY (`COD_GRUPO`) REFERENCES `grupo` (`CODIGO`);

--
-- Filtros para la tabla `usergroup`
--
ALTER TABLE `usergroup`
  ADD CONSTRAINT `group_cod_fk` FOREIGN KEY (`COD_GROUP`) REFERENCES `grupo` (`CODIGO`),
  ADD CONSTRAINT `user_cod_fk` FOREIGN KEY (`COD_USER`) REFERENCES `usuario` (`CODIGO`);

--
-- Filtros para la tabla `usernotas`
--
ALTER TABLE `usernotas`
  ADD CONSTRAINT `task_notas_fk` FOREIGN KEY (`COD_TAREA`) REFERENCES `tareas` (`CODIGO`),
  ADD CONSTRAINT `user_notas_fk` FOREIGN KEY (`COD_USER`) REFERENCES `usuario` (`CODIGO`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `AMIGOS`
  ADD KEY `existe_usuarios_fk` (`USER1`),
  ADD KEY `existe_usuario2_fk` (`USER2`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AMIGOS`
--
ALTER TABLE `AMIGOS`
  ADD CONSTRAINT `existe_usuario2_fk` FOREIGN KEY (`USER2`) REFERENCES `usuario` (`CODIGO`),
  ADD CONSTRAINT `existe_usuarios_fk` FOREIGN KEY (`USER1`) REFERENCES `usuario` (`CODIGO`);
