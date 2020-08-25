-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 28 Juin 2019 à 13:31
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
-- Structure de la table `adhesions`
--

CREATE TABLE IF NOT EXISTS `adhesions` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantInscription` varchar(20) NOT NULL,
  `motDePasseInscription` varchar(20) NOT NULL,
  `photoProfil` varchar(100) NOT NULL,
  `dateInscription` date NOT NULL,
  `tempsInscription` time NOT NULL,
  `idSociete` int(11) NOT NULL,
  PRIMARY KEY (`idInscription`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adhesions`
--

INSERT INTO `adhesions` (`idInscription`, `identifiantInscription`, `motDePasseInscription`, `photoProfil`, `dateInscription`, `tempsInscription`, `idSociete`) VALUES
(1, 'Nsiluanzambi', 'p', 'IMG_20190622_121247_621[1].jpg', '2019-06-23', '12:15:36', 2),
(2, 'Mambweni', 'mambweni', 'IMG_0764.JPG', '2019-06-25', '16:44:41', 3);
