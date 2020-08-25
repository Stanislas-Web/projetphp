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
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenuCommentaire` text NOT NULL,
  `dateCommentaire` date NOT NULL,
  `tempsCommentaire` time NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  `identifiantUtilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `contenuCommentaire`, `dateCommentaire`, `tempsCommentaire`, `idAnnonce`, `identifiantUtilisateur`) VALUES
(7, 'Ba bololÃ©', '2019-06-25', '16:46:53', 3, 'Mambweni');
