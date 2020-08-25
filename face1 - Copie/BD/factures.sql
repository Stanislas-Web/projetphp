-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 13 Juillet 2019 à 13:18
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
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `idFacture` int(11) NOT NULL AUTO_INCREMENT,
  `moisFacture` varchar(50) NOT NULL,
  `pdfFacture` varchar(100) NOT NULL,
  `dateFacture` date NOT NULL,
  `tempsFacture` time NOT NULL,
  `idClient` int(11) NOT NULL,
  `idSociete` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  PRIMARY KEY (`idFacture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`idFacture`, `moisFacture`, `pdfFacture`, `dateFacture`, `tempsFacture`, `idClient`, `idSociete`, `idAgence`) VALUES
(1, 'Juillet 2019', 'facture.pdf', '2019-07-13', '00:50:17', 7, 2, 20),
(2, 'Juillet 2019', 'C.pdf', '2019-07-13', '01:00:01', 8, 2, 20),
(3, 'Fevrier 2019', 'facture.pdf', '2019-07-13', '15:02:38', 9, 2, 20);
