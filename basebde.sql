-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 31 mars 2020 à 00:37
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
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `Prenom`, `Nom`, `Password`, `Mail`, `Niveau`) VALUES
(17, 'Idrissa', 'NDIAYE', '$2y$10$Zc0at.J4RcknJY4kEG4o3OfM8nM5y3i/OPWLWXnqfVx69RJ48DL4e', 'idrissa.ndiaye00@epsi.fr', 'B3'),
(18, 'Idrissa', 'NDIAYE', '$2y$10$Fjs49A0apwv5Ywexy0t0de9Makw1.xoTqzxKNnUupwd4sdShfjnQ.', 'idrissa.ndiaye@epsi.fr', 'I1'),
(19, 'Idrissa', 'NDIAYE', '$2y$10$2Le5L1h7k7Buq3Zrpi7A8ucCoC8GoxjcqWFaXFsI59rIDfOL09mgS', 'idrissa.ndiaye15@epsi.fr', 'B1'),
(20, 'Idrissa', 'NDIAYE', '$2y$10$j7xMATw51.tjI7w3fn9WJeHA8Yn3pXQCdnRl6zkhyS/65IT657pA.', 'idrissa.ndiaye152@epsi.fr', 'B1'),
(21, 'Idrissa', 'NDIAYE', '$2y$10$xZ8LuoMWMoempA.kMm70zuf8LbyIY3D8Z.V/mWLZ1lbZKGw90u3LO', 'idrissa.ndiayeun@epsi.fr', 'B3');

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
