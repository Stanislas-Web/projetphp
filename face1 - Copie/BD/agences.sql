-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 01 Juillet 2019 à 14:11
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
-- Structure de la table `agences`
--

CREATE TABLE IF NOT EXISTS `agences` (
  `idAgence` int(11) NOT NULL AUTO_INCREMENT,
  `nomAgence` varchar(50) NOT NULL,
  `communeAgence` varchar(50) NOT NULL,
  `rueAgence` varchar(50) NOT NULL,
  `quartierAgence` varchar(50) NOT NULL,
  `numeroAgence` varchar(50) NOT NULL,
  `dateAgence` date NOT NULL,
  `tempsAgence` time NOT NULL,
  `idSociete` int(11) NOT NULL,
  PRIMARY KEY (`idAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `agences`
--

