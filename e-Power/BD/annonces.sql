-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Juin 2019 à 19:59
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
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `idAnnonce` int(11) NOT NULL AUTO_INCREMENT,
  `titreAnnonce` varchar(100) NOT NULL,
  `descriptionAnnonce` text NOT NULL,
  `imageAnnonce` varchar(100) NOT NULL,
  `dateAnnonce` date NOT NULL,
  `tempsAnnonce` time NOT NULL,
  `idParti` int(11) NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idAnnonce`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`idAnnonce`, `titreAnnonce`, `descriptionAnnonce`, `imageAnnonce`, `dateAnnonce`, `tempsAnnonce`, `idParti`, `identifiantAdministrateur`) VALUES
(2, 'Novelas !', 'Novelas doit etre fermÃ©...\r\n\r\nDixit le Directeur de Cabinet du PrÃ©sident de la RÃ©publique', 'IMG_20190623_091424_687.jpg', '2019-06-23', '10:42:38', 2, 'Mister E'),
(3, 'LÃ©opards', 'Les lÃ©opards ont fait honte...', 'IMG_4757.JPG', '2019-06-25', '16:42:45', 3, 'mlc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
