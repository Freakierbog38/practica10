-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 07:18 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorias`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pushProfe` (IN `_nombre` VARCHAR(128), IN `_carrera` INT, IN `_rol` INT, IN `_correo` VARCHAR(255), IN `_password` VARCHAR(128))  BEGIN
	INSERT INTO profesor(nombre, carrera) VALUES (_nombre, _carrera);
    SET @id_prof = @@IDENTITY;
    INSERT INTO login(correo, password, rol, user) VALUES (_correo, _password, _rol, @id_prof);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` int(11) NOT NULL,
  `tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `carrera`, `tutor`) VALUES
('1530001', 'Juan Lopez', 1, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `alumnofull`
-- (See below for the actual view)
--
CREATE TABLE `alumnofull` (
`matricula` varchar(10)
,`nombre` varchar(255)
,`carrera` varchar(255)
,`tutor` varchar(128)
);

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'Ingenieria en Tecnologias de la Informacion'),
(2, 'Ingenieria Mecatronica'),
(3, 'Licenciatura en Administracion de Pequeñas y Medianas Empresas'),
(4, 'Ingenieria en Tecnologias de Manufactura'),
(5, 'Ingenieria en Sistemas Automotrices'),
(6, 'Ninguna');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `correo`, `password`, `user`, `rol`) VALUES
(1, 'almazan@email.com', '123ABC', 5, 2),
(2, 'ramirez@email.com', 'abc', 6, 2),
(4, 'jr@email.com', 'abce', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`numero`, `nombre`, `carrera`, `foto`) VALUES
(5, 'Almazan', 1, 'user.png'),
(6, 'Ramirez', 2, 'user.png'),
(8, 'Jose Ramos', 6, 'user.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `profull`
-- (See below for the actual view)
--
CREATE TABLE `profull` (
`numero` int(11)
,`nombre` varchar(128)
,`carrera` varchar(255)
,`foto` varchar(255)
,`correo` varchar(255)
,`password` varchar(128)
,`rol` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `alumnofull`
--
DROP TABLE IF EXISTS `alumnofull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumnofull`  AS  select `a`.`matricula` AS `matricula`,`a`.`nombre` AS `nombre`,`c`.`nombre` AS `carrera`,`p`.`nombre` AS `tutor` from ((`alumno` `a` join `carrera` `c`) join `profesor` `p`) where ((`a`.`carrera` = `c`.`id`) and (`p`.`numero` = `a`.`tutor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `profull`
--
DROP TABLE IF EXISTS `profull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profull`  AS  select `p`.`numero` AS `numero`,`p`.`nombre` AS `nombre`,`c`.`nombre` AS `carrera`,`p`.`foto` AS `foto`,`l`.`correo` AS `correo`,`l`.`password` AS `password`,`l`.`rol` AS `rol` from ((`profesor` `p` join `login` `l`) join `carrera` `c`) where ((`c`.`id` = `p`.`carrera`) and (`l`.`user` = `p`.`numero`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`),
  ADD KEY `tutor` (`tutor`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `carrera` (`carrera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `profesor` (`numero`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user`) REFERENCES `profesor` (`numero`);

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carrera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
