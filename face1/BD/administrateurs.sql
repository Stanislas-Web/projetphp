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
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `identifiantConnexion` varchar(20) NOT NULL,
  `motDePasseConnexion` varchar(20) NOT NULL,
  `dateAdministrateur` date NOT NULL,
  `tempsAdministrateur` time NOT NULL,
  `identifiantAdministrateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`idAdministrateur`, `identifiantConnexion`, `motDePasseConnexion`, `dateAdministrateur`, `tempsAdministrateur`, `identifiantAdministrateur`) VALUES
(1, 'Mister E', 'Mister E', '2019-06-16', '10:05:09', 'Admin'),
(2, 'Nsiluanzambi', 'nsiluanzambi', '2019-06-16', '18:46:15', 'Mister E'),
(3, 'Moise', 'moise', '2019-06-16', '18:58:26', 'Nsiluanzambi'),
(4, 'Makengo Pembele', 'mp', '2019-06-17', '18:43:38', 'Mister E');
