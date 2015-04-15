-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Avril 2015 à 10:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `anglais`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) CHARACTER SET latin1 NOT NULL,
  `rep1` varchar(50) CHARACTER SET latin1 NOT NULL,
  `rep2` varchar(50) CHARACTER SET latin1 NOT NULL,
  `rep3` varchar(50) CHARACTER SET latin1 NOT NULL,
  `rep4` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_theme` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `rep1`, `rep2`, `rep3`, `rep4`, `id_theme`) VALUES
(1, 'When has tea become the favourite drink of the English?', '1750', '1610', '1560', '1830', 1),
(2, 'When was the London''s Underground inaugurated ?', '1863', '1883', '1893', '1903', 1),
(3, 'Which is the oldest university of United Kingdom?', 'Oxford', 'Cambridge', 'Queen''s University', 'St Andrew''s University', 1),
(4, 'Who was the last English king to be killed in battle?', 'Richard III', 'William II', 'Henry IV', 'George II', 1),
(5, 'Where does the name "Big Ben" come from?', 'Sir Benjamin Hall, MP', 'Benjamin Franklin', 'Benjamin Caunt, a bare-knuckle boxer', 'Benjamin Disraeli, british Prime Minister', 1),
(6, 'Which of the following English kings never married?', 'William II', 'Henry II', 'George II', 'Edward II', 1),
(7, 'Who is the longest reigning monarch in Britain?', 'Queen Victoria', 'Henry V', 'Queen Elizabeth I', 'George II', 1),
(8, 'Which disease killed Robert the Bruce?', 'Leprosy', 'Syphillis', 'Bubonic Plague', 'Typhoid', 1),
(9, 'How many children did Queen Victoria have?', '8', '7', '6', '9', 1),
(10, 'sdrth', '"Dieu et mon droit" and "Honi soit qui mal y pense', '"God and my right" and "Evil be to who evil thinks', '"In God we trust"', '"God save the Queen"', 1),
(11, 'In which battle was Horatio Nelson fatally wounded?', 'Battle of Trafalgar', 'Battle of Waterloo', 'Battle of Standford bridge', 'Battle of the Boyne', 1),
(12, 'In which war was the Victoria Cross first awarded?', 'The Crimean War', 'The Gulf War', 'World War II', 'World War I', 1),
(13, 'In which British city was Guy Fawkes born and Dick Turpin killed?', 'York', 'London', 'Leeds', 'Birmingham', 1),
(14, 'What is the earliest recorded Roman town in England', 'Colchester', 'London', 'York', 'Chelmsford', 1),
(15, 'How many wives did Henry VIII divorce?', '2', '4', '3', '1', 1),
(16, 'Which is officially Britain''s second city?', 'None of the above- there isn''t one', 'Birmingham', 'Manchester', 'Edinburgh', 2),
(17, 'Which is the UK''s largest lake?', 'Lough Neagh in Northern Ireland', 'Lake Windermere in England', 'Loch Lomond in Scotland', 'Loch Ness in Scotland', 2),
(18, 'How far apart are Edinburgh and Glasgow?', '32 miles', '43 miles', '50 miles ', '62 miles ', 2),
(19, 'Douglas is the capital of the Isle of Man. But which nation is it nearest?', 'Scotland', 'England', 'Northern Ireland ', 'Wales', 2),
(20, 'What percentage of people in the UK live in a town or city?', '80%', '50%', '99%', '90%', 2),
(21, 'Who wrote Wutherthing Heigths?', 'Emily Brontë', 'Charlotte Brontë', 'Jane Austen', 'William Shakespeare', 7),
(22, 'During which century does William Shakespeare live?', 'XVIth century', 'XVth century', 'XVIIth century', 'XVIIIth century', 7),
(23, 'Who wrote Jane Eyre?', 'Charlotte Brontë', 'Emily Brontë', 'Jane Austen', 'Wiliam Shakespeare', 7),
(24, 'Who wrote Othello?', 'William Shakespeare', 'John Keats', 'William Wordsworth', 'Lord Byron', 7),
(25, 'Who wrote Pride and Prejudice?', 'Jane Austen', 'Mary Shelley', 'Emily Brontë', 'John Keats', 7),
(26, 'I found _____ hat.', 'your', 'you''re', 'you', 'youre', 3),
(27, 'She is _____ girlfriend.', 'his', 'is', 'he''s', 'he is', 3),
(28, 'Register early if you would like to attend next Tuesday’s _____ on project management.', 'seminar', 'reason', 'policy', 'scene', 6),
(29, 'The organizers of the trip reminded participants to _____ at the steps of the city hall at 2:00 P.M.', 'meet', 'combine', 'see', 'go', 6),
(30, 'Paul Brown resigned last Monday from his position as _____ executive of the company.', 'chief', 'fine', 'large', 'front', 6),
(31, 'The financial audit of Soft Peach Software _____ completed on Wednesday by a certified accounting firm.\r\n', 'was', 'were', 'to be', 'having been', 5),
(32, 'Maria Vásquez has a wide range of experience, _____ worked in technical, production, and marketing positions.', 'having', 'has', 'having had', 'had', 5),
(33, 'Tickets will not be redeemable for cash or credit at any time, _____ will they be replaced if lost or stolen.', 'nor', 'but', 'only', 'though', 4),
(34, 'The recent worldwide increase in oil prices has led to a _____ demand for electric vehicles.', 'greater', 'greatest', 'greatness', 'greatly', 4),
(35, 'Mr Inlaw comes from the NDP, _____ his supporters.', 'do', 'come', 'are', 'well', 4),
(36, 'He would starve to death rather than _____ a loan.', 'ask', 'to ask', 'have asked', 'to have asked', 5),
(37, 'Have you ever seen a real _____ scorpion ?', 'live', 'life', 'lives', 'Life', 3);

-- --------------------------------------------------------

--
-- Structure de la table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0',
  `theme` int(2) DEFAULT NULL,
  `note` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `statistics`
--

INSERT INTO `statistics` (`id`, `id_user`, `score`, `theme`, `note`) VALUES
(4, 2, 19, 1, 0),
(5, 2, 36, 99, 0),
(6, 2, 37, 99, 0),
(7, 3, 36, 99, 0),
(8, 3, 36, 2, 0),
(9, 4, 19, 2, 0),
(10, 3, 55, 99, 0),
(11, 3, 18241900, 99, 0),
(12, 3, 1858, 99, 0),
(13, 3, 5469, 99, 0),
(14, 3, 5616, 99, 3),
(15, 3, 3722, 2, 10),
(16, 3, 1878, 99, 1),
(17, 3, 0, 1, 0),
(18, 3, 1887, 1, 1),
(19, 2, 7446, 99, 4),
(20, 2, 7446, 99, 4),
(21, 2, 3785, 99, 2),
(22, 2, 5541, 1, 3);

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
(4, 'Grammar'),
(1, 'History'),
(7, 'Literature'),
(8, 'Politics and busines'),
(9, 'Series/Cinema/Music'),
(3, 'Spelling'),
(6, 'Vocabulary');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(10000) NOT NULL,
  `maxscore` int(10) DEFAULT '0',
  `nbparties` int(10) NOT NULL DEFAULT '0',
  `nbQts` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `mdp`, `maxscore`, `nbparties`, `nbQts`) VALUES
(2, 'Paul', 'Cottin', 'paulcottin@gmail.com', '$2y$10$Lu/7UYwwuMPbRxiSUZCrDeWuF1vkfqx4sySRDTq9rLKVV42TcBMYO', 54, 6, 0),
(3, 'Vlad', 'Poutine', 'vlad@kremlin.ru', '$2y$10$.5cMat7IQ6FeU70TDtFtF.IhqXvXLrg4IqdFQD79PbjdBvZ7mEjBS', 0, 0, 0),
(4, 'aa', 'aa', 'aa@aa.com', '$2y$10$WFs/7MbfUQRj70qLevBQdOwjHrGtrmSA7IGoy.O.OC0kXX0vWFwOK', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
