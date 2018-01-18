-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  
-- Généré le :  Jeu 18 Janvier 2018 à 14:08
-- Version du serveur :  5.5.58-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `LeFil`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(40) NOT NULL,
  `preview` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `publishDate` varchar(100) NOT NULL,
  `articlePath` varchar(200) NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `title`, `author`, `preview`, `category`, `publishDate`, `articlePath`) VALUES
(256, 1, 'Nouveau TEST', 'Natan', 'YKUTGJH', '', '2017-12-12', '/LeFil/2017/12/12/1513107931_Nouveau-TEST.php'),
(257, 1, 'HELLO', 'Natan', 'kjkjd', '', '2017-12-21', '/LeFil/2017/12/21/1513858981_HELLO.php'),
(258, 1, 'Gorafil', 'Jeremstar', 'Goral', '', '2017-12-29', '/LeFil/2017/12/21/1513859069_Gorafil.php');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(280) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `cas_user_name` varchar(20) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=10 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `cas_user_name`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, '', 'Natan', 'natan.danous@gmail.com', '$2y$10$AS.gyyh3dQjdweWbPJ7ROuIQLWNLhXBmRnDeLmTL18AblwfU1Hi6.', '2017-12-06 09:52:25'),
(9, 'danousna', 'danou', 'natan.danous@etu.utc.fr', '$2y$10$RWkh/pDiQm2C.eXOsDZaLeq62/ibmXSmEkrTgk6NeEC9RY3zfh7w.', '2017-12-11 14:51:08');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
