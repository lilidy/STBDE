-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 avr. 2020 à 14:45
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basebde`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin__mbrebde_`
--

DROP TABLE IF EXISTS `admin__mbrebde_`;
CREATE TABLE IF NOT EXISTS `admin__mbrebde_` (
  `IdUser` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `Poste` varchar(25) NOT NULL,
  `EstPresident` tinyint(1) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Niveau` varchar(25) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `IdEvent` int(11) NOT NULL AUTO_INCREMENT,
  `NomEvent` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `DateEvent` datetime NOT NULL,
  `HeureDebut` time NOT NULL,
  `HeureFin` time NOT NULL,
  `LieuEvent` varchar(50) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`IdEvent`),
  KEY `Evenement_Admin__MbreBDE__FK` (`IdUser`,`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `idee`
--

DROP TABLE IF EXISTS `idee`;
CREATE TABLE IF NOT EXISTS `idee` (
  `IdIdee` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleIdee` varchar(500) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdIdee`),
  KEY `Idee_Utilisateur_FK` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `IdPartenaire` int(11) NOT NULL AUTO_INCREMENT,
  `NomPartenaire` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `LienLogo` varchar(50) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`IdPartenaire`),
  KEY `Partenaire_Admin__MbreBDE__FK` (`IdUser`,`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `IdPost` int(11) NOT NULL AUTO_INCREMENT,
  `NomEvenenments` varchar(80) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `LienImage` varchar(200) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  PRIMARY KEY (`IdPost`),
  KEY `POST_Admin__MbreBDE__FK` (`IdUser`,`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

DROP TABLE IF EXISTS `retour`;
CREATE TABLE IF NOT EXISTS `retour` (
  `IdRetour` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleRetour` varchar(500) NOT NULL,
  `IdUser` int(11) NOT NULL,
  PRIMARY KEY (`IdRetour`),
  KEY `Retour_Utilisateur_FK` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Niveau` varchar(25) NOT NULL,
  `EstAdmin` tinyint(1) NOT NULL,
  `EstPresident` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `Prenom`, `Nom`, `Password`, `Mail`, `Niveau`, `EstAdmin`, `EstPresident`) VALUES
(82, 'Idrissa', 'NDIAYE', '$2y$10$Tz31oL/HYPkopoufzhzmGu2NrGs6vUX7b8K.2fAWD0u21CISVv0tq', 'idrissa.ndiaye@epsi.fr', 'I2', 0, 0),
(83, 'Idrissa', 'NDIAYE', '$2y$10$.depbmZMkhinYzVAS9IE/en.xmtedBp4V1cBIsFGSqkWhJ6cdsO5K', 'idrissa.ndiaye11@epsi.fr', 'B3', 0, 0),
(84, 'Idrissa', 'NDIAYE', '$2y$10$AOJEyzwJ1P4WW0qXLxXI7etUNUwmyWrzrnen0WMh/t1bi9l1tRYda', 'idrissa.ndiayeun@epsi.fr', 'B2', 0, 0),
(85, 'idi', 'xsx', '$2y$10$FfhOSKzEGXQGUe3FCb3tzOZfygmpSz26eL/LeZ/c/9Y3ebeUexls2', 'idri@wis.fr', 'WIS3', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin__mbrebde_`
--
ALTER TABLE `admin__mbrebde_`
  ADD CONSTRAINT `Admin__MbreBDE__Utilisateur_FK` FOREIGN KEY (`IdUser`) REFERENCES `utilisateur` (`IdUser`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `Evenement_Admin__MbreBDE__FK` FOREIGN KEY (`IdUser`,`IdAdmin`) REFERENCES `admin__mbrebde_` (`IdUser`, `IdAdmin`);

--
-- Contraintes pour la table `idee`
--
ALTER TABLE `idee`
  ADD CONSTRAINT `Idee_Utilisateur_FK` FOREIGN KEY (`IdUser`) REFERENCES `utilisateur` (`IdUser`);

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `Partenaire_Admin__MbreBDE__FK` FOREIGN KEY (`IdUser`,`IdAdmin`) REFERENCES `admin__mbrebde_` (`IdUser`, `IdAdmin`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `POST_Admin__MbreBDE__FK` FOREIGN KEY (`IdUser`,`IdAdmin`) REFERENCES `admin__mbrebde_` (`IdUser`, `IdAdmin`);

--
-- Contraintes pour la table `retour`
--
ALTER TABLE `retour`
  ADD CONSTRAINT `Retour_Utilisateur_FK` FOREIGN KEY (`IdUser`) REFERENCES `utilisateur` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
