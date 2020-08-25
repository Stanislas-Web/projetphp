-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Août 2019 à 18:40
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `ravitaillements`
--

CREATE TABLE IF NOT EXISTS `ravitaillements` (
  `idRavitaillement` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(100) NOT NULL,
  `quantiteArticle` int(11) NOT NULL,
  `prixArticle` int(11) NOT NULL,
  `dateRavitaillement` date NOT NULL,
  `tempsRavitaillement` time NOT NULL,
  `idArticle` int(11) NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idRavitaillement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `ravitaillements`
--

INSERT INTO `ravitaillements` (`idRavitaillement`, `nomArticle`, `quantiteArticle`, `prixArticle`, `dateRavitaillement`, `tempsRavitaillement`, `idArticle`, `identifiantAdministrateur`) VALUES
(3, 'NescafÃ©', 12, 300, '2019-08-12', '09:20:38', 1, 'Admin'),
(34, 'Momo Petit Sachet', 0, 500, '2019-08-12', '14:55:03', 3, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
