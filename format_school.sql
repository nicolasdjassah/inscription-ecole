-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 jan. 2022 à 11:08
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
-- Base de données : `format_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `emploi_du_temps`
--

CREATE TABLE `emploi_du_temps` (
  `IDEMP` int(11) NOT NULL,
  `IDPRO` int(11) DEFAULT NULL,
  `IDPER` int(11) DEFAULT NULL,
  `HEUREDEBUT` int(11) DEFAULT NULL,
  `HEUREFIN` int(11) DEFAULT NULL,
  `JOUR` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emploi_du_temps`
--

INSERT INTO `emploi_du_temps` (`IDEMP`, `IDPRO`, `IDPER`, `HEUREDEBUT`, `HEUREFIN`, `JOUR`) VALUES
(18, NULL, 17, 7, 17, 'mardi');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `IDPER` int(11) NOT NULL,
  `IDROLE` int(11) NOT NULL,
  `NOMPER` longtext DEFAULT NULL,
  `PRENOMPRO` longtext DEFAULT NULL,
  `ADRESSEPER` longtext DEFAULT NULL,
  `TELEPHONEPER` int(11) DEFAULT NULL,
  `EMAILPER` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`IDPER`, `IDROLE`, `NOMPER`, `PRENOMPRO`, `ADRESSEPER`, `TELEPHONEPER`, `EMAILPER`) VALUES
(17, 33, 'Ogou', 'Appolinaire', 'Lomé ', 2147483647, 'Ogouappo@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `IDPRO` int(11) NOT NULL,
  `NOMPRO` longtext DEFAULT NULL,
  `PRENOMPRO` longtext DEFAULT NULL,
  `ADRESSEPRO` longtext DEFAULT NULL,
  `TELEPHONEPRO` int(11) DEFAULT NULL,
  `EMAILPRO` longtext DEFAULT NULL,
  `COURS` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`IDPRO`, `NOMPRO`, `PRENOMPRO`, `ADRESSEPRO`, `TELEPHONEPRO`, `EMAILPRO`, `COURS`) VALUES
(10, 'Agbo', 'Serge', 'Lomé ', 2147483647, 'King4serge@gmail.com', 'JAVA'),
(12, 'Akanaté', 'David', 'Lomé ', 99294937, 'AkaDavid@gmail.com', 'SGBD');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `IDROLE` int(11) NOT NULL,
  `NOMROLE` longtext DEFAULT NULL,
  `SALAIREROLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`IDROLE`, `NOMROLE`, `SALAIREROLE`) VALUES
(21, 'DIRECTEUR GEGERAL', 500000),
(22, 'SECRETAIRE GENERAL', 150000),
(23, 'COMPTABLE', 100000),
(24, 'RESPONSABLE DE FILIÈRE ', 90000),
(25, 'SECRETAIRE', 60000),
(26, 'PROFESSEUR', 180000),
(27, 'RECTEUR', 200000),
(28, 'VIGIL', 30000),
(32, 'AGENT D\'ENTRETIEN', 25000),
(33, 'INFORMATICIEN', 200000),
(34, 'LABORANTIN ', 70000),
(35, 'INFIRMIER', 70000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD PRIMARY KEY (`IDEMP`),
  ADD KEY `FK_CONSULTER` (`IDPER`),
  ADD KEY `FK_RECEVOIR` (`IDPRO`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`IDPER`),
  ADD KEY `FK_AVOIR` (`IDROLE`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`IDPRO`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDROLE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `IDEMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `IDPER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `IDPRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `IDROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  ADD CONSTRAINT `FK_CONSULTER` FOREIGN KEY (`IDPER`) REFERENCES `personnels` (`IDPER`),
  ADD CONSTRAINT `FK_RECEVOIR` FOREIGN KEY (`IDPRO`) REFERENCES `professeurs` (`IDPRO`);

--
-- Contraintes pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`IDROLE`) REFERENCES `role` (`IDROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
