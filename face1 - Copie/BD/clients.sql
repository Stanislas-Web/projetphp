-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 13 Juillet 2019 à 13:19
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
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `communeClient` varchar(50) NOT NULL,
  `quartierClient` varchar(50) NOT NULL,
  `rueClient` varchar(50) NOT NULL,
  `numeroClient` varchar(50) NOT NULL,
  `typeClient` varchar(50) NOT NULL,
  `dateClient` date NOT NULL,
  `tempsClient` time NOT NULL,
  `idAgence` int(11) NOT NULL,
  `idSociete` int(11) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idClient`, `nomClient`, `communeClient`, `quartierClient`, `rueClient`, `numeroClient`, `typeClient`, `dateClient`, `tempsClient`, `idAgence`, `idSociete`) VALUES
(1, 'jh', 'd', 'r', 'er', 'r', 'd', '2019-07-12', '13:46:26', 19, 2),
(2, 'FGH', 'FGH', 'RTY', 'DFG', '12', 'ORD', '2019-07-12', '21:46:50', 1, 3),
(3, 'jkll', 'mkll', 'jkll;', 'kklll', 'lll', 'll', '2019-07-12', '21:53:40', 1, 3),
(4, 'jhyt', 'oilk', 'ghj', 'ret', '12', 'lkj', '2019-07-12', '21:57:22', 1, 3),
(5, 'fghh', 'jkkll', 'klll', 'dffgg', 'ghhhj', 'fgghh', '2019-07-12', '21:58:47', 1, 3),
(7, 'Umba DI ndangi', 'Matete', 'mutoto', 'mutoto', '7 A/BIS', 'ordinaire', '2019-07-13', '00:06:45', 20, 2),
(8, 'hjk', 'oilk', 'ghj', 'nkk', 'kklk', 'ordinaire', '2019-07-13', '00:59:22', 20, 2),
(9, 'Cardozo', 'Kintambo', 'Lomani', 'Lisala', '12', 'Ordinaire', '2019-07-13', '14:53:53', 20, 2);
