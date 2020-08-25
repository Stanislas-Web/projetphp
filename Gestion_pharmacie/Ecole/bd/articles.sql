-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Août 2019 à 18:25
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
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(100) NOT NULL,
  `quantiteArticle` int(11) NOT NULL,
  `prixArticle` int(20) NOT NULL,
  `dateArticle` date NOT NULL,
  `tempsArticle` time NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `nomArticle`, `quantiteArticle`, `prixArticle`, `dateArticle`, `tempsArticle`, `identifiantAdministrateur`) VALUES
(1, 'NescafÃ©', 30, 300, '2019-08-07', '13:21:02', 'Admin'),
(2, 'Spaghetti Roni Petit', 67, 850, '2019-08-07', '14:19:54', 'Admin'),
(3, 'Momo Petit Sachet', 10, 100, '2019-08-07', '15:27:36', 'Admin'),
(4, 'Blue band', 28, 400, '2019-08-07', '18:03:17', 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
