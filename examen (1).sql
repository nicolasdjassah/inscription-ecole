-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 mars 2022 à 07:57
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examen`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idinscri` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenoms` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `username` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idinscri`, `nom`, `prenoms`, `password`, `date`, `adresse`, `telephone`, `email`, `genre`, `profil`, `username`) VALUES
(1, 'A', 'B', '92f2fd99879b0c2466ab8648afb63c49032379c1', '2022-03-23', 'kara', '90225474', 'nicolasdjassah@gmail.com', 'Feminin', 'Administration', 'a.b'),
(2, 'nico', 'lolo', '92f2fd99879b0c2466ab8648afb63c49032379c1', '2022-03-22', 'lomegan', '90225474', 'nike@gmail.com', 'Masculin', 'Professeurs', 'nico.lolo'),
(3, 'king', 'le roi', '6a62415b43a0268f38f117f076dce135705d7895', '2022-03-22', 'Gabon', '97580552', 'king@gmail.com', 'Masculin', 'Professeurs', 'king.le roi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idinscri`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idinscri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
