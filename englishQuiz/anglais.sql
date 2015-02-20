-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Février 2015 à 16:19
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `anglais`
--
CREATE DATABASE IF NOT EXISTS `anglais` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `anglais`;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `rep1` varchar(50) NOT NULL,
  `rep2` varchar(50) NOT NULL,
  `rep3` varchar(50) NOT NULL,
  `rep4` varchar(50) NOT NULL,
  `id_theme` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `rep1`, `rep2`, `rep3`, `rep4`, `id_theme`) VALUES
(1, 'Question1', 'rep 1', 'rep 2', 'rep 3', 'rep 4', 1),
(2, 'Question 2', 'rep 1', 'rep 2', 'rep 3', 'rep 4', 1),
(3, 'first question', '1rst', '2nd', '3rd', '4th', 0),
(5, 'une question', 'true', 'false1', 'false2', 'false3', 0),
(10, 'sdrth', 'drt', 'srt', 'st', 'srth', 3);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(2) NOT NULL,
  `nom_theme` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_theme` (`nom_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`id`, `nom_theme`) VALUES
(5, 'Conjugation'),
(2, 'Geography'),
(4, 'Grammary'),
(1, 'History'),
(7, 'Literature'),
(8, 'Politics and busines'),
(9, 'Series/Cinema/Music'),
(3, 'Spelling'),
(6, 'Vocabulary');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
