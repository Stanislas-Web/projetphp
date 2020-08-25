-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 15 Juillet 2019 à 09:46
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
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `nomAgence` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `dateMessage` date NOT NULL,
  `tempsMessage` time NOT NULL,
  `idClient` int(11) NOT NULL,
  `idSociete` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`idMessage`, `nomClient`, `nomAgence`, `message`, `dateMessage`, `tempsMessage`, `idClient`, `idSociete`, `idAgence`) VALUES
(1, '', 'baboma', 'bonjour', '2019-07-14', '21:37:37', 1, 1, 1),
(2, 'Umba DI ndangi', 'baboma', 'Salut', '2019-07-15', '10:46:18', 1, 1, 1);
