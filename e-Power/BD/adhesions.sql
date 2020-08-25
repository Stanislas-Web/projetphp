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
-- Structure de la table `adhesions`
--

CREATE TABLE IF NOT EXISTS `adhesions` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantInscription` varchar(20) NOT NULL,
  `motDePasseInscription` varchar(20) NOT NULL,
  `photoProfil` varchar(100) NOT NULL,
  `dateInscription` date NOT NULL,
  `tempsInscription` time NOT NULL,
  `idParti` int(11) NOT NULL,
  PRIMARY KEY (`idInscription`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adhesions`
--

INSERT INTO `adhesions` (`idInscription`, `identifiantInscription`, `motDePasseInscription`, `photoProfil`, `dateInscription`, `tempsInscription`, `idParti`) VALUES
(1, 'Nsiluanzambi', 'p', 'IMG_20190622_121247_621[1].jpg', '2019-06-23', '12:15:36', 2),
(2, 'Mambweni', 'mambweni', 'IMG_0764.JPG', '2019-06-25', '16:44:41', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
