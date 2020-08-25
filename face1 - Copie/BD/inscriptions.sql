-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 28 Juin 2019 à 13:32
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
-- Structure de la table `inscriptions`
--

CREATE TABLE IF NOT EXISTS `inscriptions` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantInscription` varchar(20) NOT NULL,
  `motDePasseInscription` varchar(20) NOT NULL,
  `dateInscription` date NOT NULL,
  `tempsInscription` time NOT NULL,
  `idSociete` int(20) NOT NULL,
  PRIMARY KEY (`idInscription`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `inscriptions`
--

INSERT INTO `inscriptions` (`idInscription`, `identifiantInscription`, `motDePasseInscription`, `dateInscription`, `tempsInscription`, `idSociete`) VALUES
(1, 'Mister E', 'mistere', '2019-06-23', '08:47:39', 2),
(2, 'mlc', 'mlc', '2019-06-25', '16:32:21', 3);
