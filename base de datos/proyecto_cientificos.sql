-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2020 at 09:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_cientificos`
--

-- --------------------------------------------------------

--
-- Table structure for table `asignado_a`
--

CREATE TABLE `asignado_a` (
  `Cientifico` varchar(8) NOT NULL,
  `Proyecto` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asignado_a`
--

INSERT INTO `asignado_a` (`Cientifico`, `Proyecto`) VALUES
('E', '1'),
('E', '2'),
('J', '1'),
('P', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cientificos`
--

CREATE TABLE `cientificos` (
  `DNI` varchar(8) NOT NULL,
  `Nombre_apellidos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cientificos`
--

INSERT INTO `cientificos` (`DNI`, `Nombre_apellidos`) VALUES
('E', 'Estefania Henao'),
('J', 'Jaime Henao'),
('P', 'Paula Montoya'),
('S', 'Santiago Lopera');

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `id` char(4) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Horas` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`id`, `Nombre`, `Horas`) VALUES
('1', 'investigacion tics', 29),
('2', 'hacking moderno', 44),
('3', 'inteligencia artificial', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asignado_a`
--
ALTER TABLE `asignado_a`
  ADD KEY `CIENTIFICO` (`Cientifico`,`Proyecto`),
  ADD KEY `proyecto_asignado` (`Proyecto`);

--
-- Indexes for table `cientificos`
--
ALTER TABLE `cientificos`
  ADD PRIMARY KEY (`DNI`);

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asignado_a`
--
ALTER TABLE `asignado_a`
  ADD CONSTRAINT `cientifico_asignado` FOREIGN KEY (`Cientifico`) REFERENCES `cientificos` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proyecto_asignado` FOREIGN KEY (`Proyecto`) REFERENCES `proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
