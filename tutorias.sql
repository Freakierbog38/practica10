-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 09:57 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `editProfe` (`_numero` INT, `_nombre` VARCHAR(128), `_carrera` INT, `_correo` VARCHAR(255), `_password` VARCHAR(128))  BEGIN
	UPDATE profesor SET nombre=_nombre, carrera=_carrera WHERE numero=_numero;
    UPDATE login SET correo=_correo, password=_password WHERE user=_numero;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `poProfe` (`_numero` INT)  BEGIN
	DELETE FROM login WHERE user = _numero;
    DELETE FROM profesor WHERE numero = _numero;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pushProfe` (IN `_nombre` VARCHAR(128), IN `_carrera` INT, IN `_rol` INT, IN `_correo` VARCHAR(255), IN `_password` VARCHAR(128), IN `_foto` VARCHAR(128))  BEGIN
	INSERT INTO profesor(nombre, carrera, foto) VALUES (_nombre, _carrera, _foto);
    SET @id_prof = @@IDENTITY;
    INSERT INTO login(correo, password, rol, user) VALUES (_correo, _password, _rol, @id_prof);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tutoriaIndi` (`_tutor` INT, `_tipo` VARCHAR(128), `_alumno` INT, `_tema` VARCHAR(255), `_obser` TEXT, `_fecha` DATE, `_hora` TIME)  BEGIN
	INSERT INTO sesion_tutoria (tutor,tema,tipo,hora,fecha,observaciones) VALUES (_tutor,_tema,_tipo,_hora,_fecha,_obser);
    INSERT INTO alumno_tutoria (id_tutoria, id_alumno) VALUES (@@IDENTITY, _alumno);
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
('1530001', 'Juan Lopez', 1, 5),
('1530002', 'Joshua Serrano', 5, 10);

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
-- Table structure for table `alumno_tutoria`
--

CREATE TABLE `alumno_tutoria` (
  `id_alumno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_tutoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Stand-in structure for view `fulltuto`
-- (See below for the actual view)
--
CREATE TABLE `fulltuto` (
`id` int(11)
,`tutor` varchar(128)
,`fecha` date
,`hora` time
,`tipo` varchar(128)
,`tema` varchar(255)
,`observaciones` text
);

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
(4, 'joser@email.com', 'abce', 8, 1),
(5, 'admin@email.com', 'admin', 9, 0),
(6, 'ce@email.com', 'abce', 10, 2);

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
(8, 'Jose Ramos', 6, 'user.png'),
(9, 'Administrador', 6, 'user.png'),
(10, 'Crazy Eight', 5, 'user.png');

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
-- Table structure for table `sesion_tutoria`
--

CREATE TABLE `sesion_tutoria` (
  `id` int(11) NOT NULL,
  `tutor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tema` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `alumnofull`
--
DROP TABLE IF EXISTS `alumnofull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumnofull`  AS  select `a`.`matricula` AS `matricula`,`a`.`nombre` AS `nombre`,`c`.`nombre` AS `carrera`,`p`.`nombre` AS `tutor` from ((`alumno` `a` join `carrera` `c`) join `profesor` `p`) where ((`a`.`carrera` = `c`.`id`) and (`p`.`numero` = `a`.`tutor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `fulltuto`
--
DROP TABLE IF EXISTS `fulltuto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fulltuto`  AS  select `st`.`id` AS `id`,`p`.`nombre` AS `tutor`,`st`.`fecha` AS `fecha`,`st`.`hora` AS `hora`,`st`.`tipo` AS `tipo`,`st`.`tema` AS `tema`,`st`.`observaciones` AS `observaciones` from (`sesion_tutoria` `st` join `profesor` `p`) where (`st`.`tutor` = `p`.`numero`) ;

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
-- Indexes for table `alumno_tutoria`
--
ALTER TABLE `alumno_tutoria`
  ADD PRIMARY KEY (`id_alumno`,`id_tutoria`),
  ADD KEY `id_tutoria` (`id_tutoria`);

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
-- Indexes for table `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor` (`tutor`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `alumno_tutoria`
--
ALTER TABLE `alumno_tutoria`
  ADD CONSTRAINT `alumno_tutoria_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`matricula`),
  ADD CONSTRAINT `alumno_tutoria_ibfk_2` FOREIGN KEY (`id_tutoria`) REFERENCES `sesion_tutoria` (`id`);

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

--
-- Constraints for table `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD CONSTRAINT `sesion_tutoria_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `profesor` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
