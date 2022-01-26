-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 25 jan. 2022 à 09:00
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
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` enum('debit','credit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `type`) VALUES
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
(1, 1, 'courant', 1000, 'USD', 'Livret A'),
(2, 2, 'epargne', 306, 'EUR', 'Livret B'),
(3, 3, 'compte joint', 3600, 'USD', 'Livret C'),
(4, 4, 'courant', 830, 'USD', 'Livret'),
(5, 5, 'epargne', 1250, 'EUR', 'Livret'),
(6, 2, 'epargne', 12500, 'EUR', 'Livret');

-- --------------------------------------------------------

--
-- Structure de la table `Opération`
--

CREATE TABLE `Opération` (
  `IDop` int(10) NOT NULL,
  `IDB` int(10) NOT NULL,
  `IDc` int(11) DEFAULT NULL,
  `NOMop` char(20) NOT NULL,
  `MONTANTop` int(100) NOT NULL,
  `DATEop` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Opération`
--

INSERT INTO `Opération` (`IDop`, `IDB`, `IDc`, `NOMop`, `MONTANTop`, `DATEop`) VALUES
(1, 1, 1, 'MCdo', 16, '2022-01-24'),
(2, 2, 3, 'paintBall', 40, '2022-01-13'),
(3, 3, 8, 'Cheque', 800, '2021-12-26'),
(4, 4, 9, 'taff', 2400, '2022-01-01'),
(5, 5, 4, 'Navigo', 38, '2022-01-04'),
(6, 2, 6, 'GrandeRecree', 50, '2021-12-15');

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
  ADD PRIMARY KEY (`IDB`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Index pour la table `Opération`
--
ALTER TABLE `Opération`
  ADD PRIMARY KEY (`IDop`),
  ADD KEY `IDB` (`IDB`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
  ADD CONSTRAINT `compte_bancaire_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `Utilisateur` (`IDuser`);

--
-- Contraintes pour la table `Opération`
--
ALTER TABLE `Opération`
  ADD CONSTRAINT `opération_ibfk_1` FOREIGN KEY (`IDB`) REFERENCES `Compte_bancaire` (`IDB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
