-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Août 2019 à 18:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wenzeshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(20) NOT NULL,
  `categorieProduit` varchar(20) NOT NULL,
  `prixProduit` varchar(10) NOT NULL,
  `logoProduit` varchar(100) NOT NULL,
  `dateProduit` date NOT NULL,
  `tempsProduit` time NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `categorieProduit`, `prixProduit`, `logoProduit`, `dateProduit`, `tempsProduit`, `identifiantAdministrateur`) VALUES
(1, 'fgh', 'rty', '500', '1.jpg', '2019-08-01', '17:06:54', 'Aspic'),
(2, 'pondu', 'legume', '1500', '2.jpg', '2019-08-01', '18:10:46', 'Aspic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
