-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 26 Avril 2015 à 11:42
-- Version du serveur: 5.5.43-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tp_miniged`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_categorie`
--

CREATE TABLE IF NOT EXISTS `tp_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tp_categorie`
--

INSERT INTO `tp_categorie` (`id`, `name`) VALUES
(1, 'Informatique'),
(2, 'Politique'),
(3, 'Médecine'),
(4, 'Biologie'),
(5, 'Articles'),
(6, 'Histoire');

-- --------------------------------------------------------

--
-- Structure de la table `tp_document`
--

CREATE TABLE IF NOT EXISTS `tp_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),

  INDEX `fk_document_categorie_idx` (`cat_id` ASC),
  CONSTRAINT `fk_document_categorie`
	FOREIGN KEY (`cat_id`)
	REFERENCES `tp_categorie` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
