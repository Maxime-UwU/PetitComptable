-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 27 jan. 2022 à 09:53
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ptitcomp`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `IDc` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` enum('debit','credit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`IDc`, `name`, `type`) VALUES
(1, 'Alimentaire', 'debit'),
(2, 'Vestimentaire', 'debit'),
(3, 'Loisir', 'debit'),
(4, 'Transport', 'debit'),
(5, 'Logement', 'debit'),
(6, 'Autres', 'debit'),
(7, 'Virement', 'credit'),
(8, 'Dépôt', 'credit'),
(9, 'Salaire', 'credit'),
(10, 'Autres', 'credit');

-- --------------------------------------------------------

--
-- Structure de la table `Compte_bancaire`
--

CREATE TABLE `Compte_bancaire` (
  `IDB` int(10) NOT NULL,
  `IDuser` int(10) NOT NULL,
  `Type` char(20) NOT NULL,
  `Provision` int(100) NOT NULL,
  `DeviseCompte` char(10) NOT NULL,
  `NOMcompte` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Compte_bancaire`
--

INSERT INTO `Compte_bancaire` (`IDB`, `IDuser`, `Type`, `Provision`, `DeviseCompte`, `NOMcompte`) VALUES
(28, 1, 'courant', 1222, 'courant', 'antony'),
(29, 1, 'courant', 844, 'courant', 'anto'),
(38, 1, 'compte joint', 1234, 'courant', 'fvgsgb'),
(39, 1, 'compte joint', 1234, 'courant', 'fvgsgb'),
(40, 1, 'epargne', 1, 'courant', 'azerty'),
(41, 1, 'courant', 9999, 'courant', 'mpolk'),
(42, 1, 'compte joint', 5555, 'courant', 'wxcvb'),
(44, 1, 'epargne', 66666, 'courant', 'vrsve'),
(45, 1, 'epargne', 444, 'EUR', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `Operation`
--

CREATE TABLE `Operation` (
  `IDop` int(10) NOT NULL,
  `IDB` int(10) NOT NULL,
  `IDc` int(11) DEFAULT NULL,
  `NOMop` char(20) NOT NULL,
  `MONTANTop` int(100) NOT NULL,
  `DATEop` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Operation`
--

INSERT INTO `Operation` (`IDop`, `IDB`, `IDc`, `NOMop`, `MONTANTop`, `DATEop`) VALUES
(1, 28, 1, 'vesv', 324, '5345-03-12'),
(2, 45, 1, 'yolo', 123, '2002-11-12'),
(3, 45, 1, 'antony', 90, '2002-11-12'),
(4, 45, 1, 'vsb', 124, '1111-11-11'),
(5, 45, 1, 'cqc', 123, '2222-12-11');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `IDuser` int(10) NOT NULL,
  `EMAILuser` char(100) NOT NULL,
  `MDPuser` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`IDuser`, `EMAILuser`, `MDPuser`) VALUES
(1, 'jean.charle@gmail.com', 'jean1234'),
(2, 'jean.CLAUDE@gmail.com', 'clauden1234'),
(3, 'jean.mark@gmail.com', 'markj1234'),
(4, 'jean.pierre@gmail.com', 'pierre1234'),
(5, 'jean.michel@gmail.com', 'michel1234'),
(6, 'jade@gmail.com', 'jade1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IDc`);

--
-- Index pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
  ADD PRIMARY KEY (`IDB`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Index pour la table `Operation`
--
ALTER TABLE `Operation`
  ADD PRIMARY KEY (`IDop`),
  ADD KEY `IDB` (`IDB`),
  ADD KEY `Operation_category_idC_fk` (`IDc`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`IDuser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `IDc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
  MODIFY `IDB` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `Operation`
--
ALTER TABLE `Operation`
  MODIFY `IDop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `IDuser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
  ADD CONSTRAINT `compte_bancaire_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `Utilisateur` (`IDuser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Operation`
--
ALTER TABLE `Operation`
  ADD CONSTRAINT `Operation_category_idC_fk` FOREIGN KEY (`IDc`) REFERENCES `category` (`IDc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`IDB`) REFERENCES `Compte_bancaire` (`IDB`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
