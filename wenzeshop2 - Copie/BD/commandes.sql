-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 15 Août 2019 à 17:26
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `wenzeshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `telephoneClient` varchar(50) NOT NULL,
  `communeClient` varchar(50) NOT NULL,
  `quartierClient` varchar(50) NOT NULL,
  `numeroClient` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `quantiteProduit` int(11) NOT NULL,
  `prixProduit` int(20) NOT NULL,
  `dateCommande` date NOT NULL,
  `tempsCommande` time NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`idCommande`, `nomClient`, `telephoneClient`, `communeClient`, `quartierClient`, `numeroClient`, `nomProduit`, `quantiteProduit`, `prixProduit`, `dateCommande`, `tempsCommande`) VALUES
(1, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Choux', 3, 2000, '2019-08-15', '14:30:28'),
(2, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Matembele', 5, 1000, '2019-08-15', '14:30:28'),
(3, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Bitabe', 12, 1000, '2019-08-15', '14:30:28'),
(4, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Ndunda', 1, 1000, '2019-08-15', '14:30:28'),
(5, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Choux', 3, 2000, '2019-08-15', '14:37:39'),
(6, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Matembele', 5, 1000, '2019-08-15', '14:37:39'),
(7, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Bitabe', 12, 1000, '2019-08-15', '14:37:39'),
(8, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Ndunda', 1, 1000, '2019-08-15', '14:37:39'),
(9, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Choux', 3, 2000, '2019-08-15', '14:38:23'),
(10, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Matembele', 5, 1000, '2019-08-15', '14:38:23'),
(11, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Bitabe', 12, 1000, '2019-08-15', '14:38:23'),
(12, 'makengo', '+243826016607', 'matete', 'mutoto', 7, 'Ndunda', 1, 1000, '2019-08-15', '14:38:23'),
(13, 'nanikafuako', '+243826016607', 'lemba', 'fghjk', 23, 'Ndunda', 1, 1000, '2019-08-15', '15:15:57'),
(14, 'nanikafuako', '+243826016607', 'lemba', 'fghjk', 23, 'Bitabe', 4, 1000, '2019-08-15', '15:15:57'),
(15, 'nanikafuako', '+243826016607', 'lemba', 'fghjk', 23, 'Pondu', 1, 1500, '2019-08-15', '15:15:57'),
(16, 'admin', '+243826016607', 'matete', 'mutoto', 23, 'Ndunda', 1, 1000, '2019-08-15', '17:49:08'),
(17, 'admin', '+243826016607', 'matete', 'mutoto', 23, 'Pondu', 1, 1500, '2019-08-15', '17:49:08'),
(18, 'makengo', '+243826016607', 'matete', 'mutoto', 23, 'Bitabe', 4, 1000, '2019-08-15', '18:55:39'),
(19, 'makengo', '+243826016607', 'matete', 'mutoto', 23, 'Pondu', 1, 1500, '2019-08-15', '18:55:39');
