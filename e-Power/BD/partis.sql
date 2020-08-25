-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Juin 2019 à 20:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `epower`
--

-- --------------------------------------------------------

--
-- Structure de la table `partis`
--

CREATE TABLE IF NOT EXISTS `partis` (
  `idParti` int(11) NOT NULL AUTO_INCREMENT,
  `nomParti` varchar(100) NOT NULL,
  `descriptionParti` text NOT NULL,
  `logoParti` varchar(100) NOT NULL,
  `dateParti` date NOT NULL,
  `tempsParti` time NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idParti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `partis`
--

INSERT INTO `partis` (`idParti`, `nomParti`, `descriptionParti`, `logoParti`, `dateParti`, `tempsParti`, `identifiantAdministrateur`) VALUES
(1, 'Union pour la Democratie et le Progres Social', 'Fatshi', 'IMG_20190623_010118_865.jpg', '2019-06-23', '01:52:52', 'Admin'),
(2, 'Union pour la Nation Congolaise', 'Parti cher Ã  Vital Kamerhe', 'IMG_20190623_010142_669.jpg', '2019-06-23', '01:55:25', 'Admin'),
(3, 'Mouvement de LibÃ©ration du Congo', 'Parti cher Ã  Jean Pierre Bemba', 'b.JPG', '2019-06-25', '16:29:33', 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
