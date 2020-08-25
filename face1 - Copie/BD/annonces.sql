-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 28 Juin 2019 à 13:31
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `face`
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
  `idSociete` int(11) NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idAnnonce`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`idAnnonce`, `titreAnnonce`, `descriptionAnnonce`, `imageAnnonce`, `dateAnnonce`, `tempsAnnonce`, `idSociete`, `identifiantAdministrateur`) VALUES
(2, 'Novelas !', 'Novelas doit etre fermÃ©...\r\n\r\nDixit le Directeur de Cabinet du PrÃ©sident de la RÃ©publique', 'IMG_20190623_091424_687.jpg', '2019-06-23', '10:42:38', 2, 'Mister E'),
(3, 'LÃ©opards', 'Les lÃ©opards ont fait honte...', 'IMG_4757.JPG', '2019-06-25', '16:42:45', 3, 'mlc');
