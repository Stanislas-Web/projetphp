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
-- Structure de la table `ventes`
--

CREATE TABLE IF NOT EXISTS `ventes` (
  `idVente` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(100) NOT NULL,
  `quantiteArticle` int(20) NOT NULL,
  `prixArticle` int(20) NOT NULL,
  `totalArticle` int(20) NOT NULL,
  `dateVente` date NOT NULL,
  `tempsVente` time NOT NULL,
  `idArticle` int(11) NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idVente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ventes`
--

INSERT INTO `ventes` (`idVente`, `nomArticle`, `quantiteArticle`, `prixArticle`, `totalArticle`, `dateVente`, `tempsVente`, `idArticle`, `identifiantAdministrateur`) VALUES
(1, 'Momo Petit Sachet', 2, 500, 1000, '2019-08-12', '14:55:10', 3, 'Admin'),
(2, 'Momo Petit Sachet', 1, 500, 500, '2019-08-12', '15:02:56', 3, 'Admin'),
(3, 'Momo Petit Sachet', 2, 500, 1000, '2019-08-12', '15:03:50', 3, 'Admin'),
(4, 'NescafÃ©', 18, 300, 5400, '2019-08-12', '18:22:30', 1, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
