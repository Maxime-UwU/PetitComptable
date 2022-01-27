-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 26 jan. 2022 à 08:22
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

INSERT INTO `Compte_bancaire`(`IDB`,`IDuser`,`Type`,`Provision`,`DeviseCompte`,`NOMcompte` ) VALUES
                                                                                                (1, 1, 'Courant', 500, 'EUR', 'LCL'),
                                                                                                (2, 1, 'Livret A', 900, 'USD', 'economie'),
                                                                                                (3, 1, 'Courant', 150, 'EUR', 'oui');

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
-- Index pour la table `Operation`
--
ALTER TABLE `Operation`
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
-- AUTO_INCREMENT pour la table `Operation`
--
ALTER TABLE `Utilisateur`
    MODIFY `IDuser` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Operation`
--
ALTER TABLE `Operation`
    MODIFY `IDop` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Compte_bancaire`
--
ALTER TABLE `Compte_bancaire`
    MODIFY `IDB` int(10) NOT NULL AUTO_INCREMENT;

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
    ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`IDB`) REFERENCES `Compte_bancaire` (`IDB`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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