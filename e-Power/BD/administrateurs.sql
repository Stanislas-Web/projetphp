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
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantConnexion` varchar(20) NOT NULL,
  `motDePasseConnexion` varchar(20) NOT NULL,
  `dateAdministrateur` date NOT NULL,
  `tempsAdministrateur` time NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`idAdministrateur`, `identifiantConnexion`, `motDePasseConnexion`, `dateAdministrateur`, `tempsAdministrateur`, `identifiantAdministrateur`) VALUES
(1, 'Mister E', 'Mister E', '2019-06-16', '10:05:09', 'Admin'),
(2, 'Nsiluanzambi', 'nsiluanzambi', '2019-06-16', '18:46:15', 'Mister E'),
(3, 'Moise', 'moise', '2019-06-16', '18:58:26', 'Nsiluanzambi'),
(4, 'Makengo Pembele', 'mp', '2019-06-17', '18:43:38', 'Mister E');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
