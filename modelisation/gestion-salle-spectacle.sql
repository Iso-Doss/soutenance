-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 18 fév. 2023 à 12:01
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
-- Base de données : `gestion-salle-spectacle`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `num-artiste` int(11) NOT NULL,
  `nom-artiste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `num-piece` int(11) NOT NULL,
  `libelle-piece` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `representation`
--

CREATE TABLE `representation` (
  `num-representation` int(11) NOT NULL,
  `date-representation` date NOT NULL,
  `heure-debut-representation` time NOT NULL,
  `heure-fin-representation` time NOT NULL,
  `num-spectacle` int(11) NOT NULL,
  `num-salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `representation-artiste`
--

CREATE TABLE `representation-artiste` (
  `id` int(11) NOT NULL,
  `num-representation` int(11) NOT NULL,
  `num-artiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `num-salle` int(11) NOT NULL,
  `capacite` int(11) NOT NULL,
  `type-salle` varchar(255) NOT NULL,
  `nom-proprietaire` varchar(255) NOT NULL,
  `prenom-proprietaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle-piece`
--

CREATE TABLE `salle-piece` (
  `id` int(11) NOT NULL,
  `num-salle` int(11) NOT NULL,
  `num-piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

CREATE TABLE `spectacle` (
  `num-spectacle` int(11) NOT NULL,
  `nom-spectacle` varchar(255) NOT NULL,
  `num-artiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `code-ticket` int(11) NOT NULL,
  `libelle-ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket-representation`
--

CREATE TABLE `ticket-representation` (
  `id` int(11) NOT NULL,
  `num-representation` int(11) NOT NULL,
  `code-ticket` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `nombre-ticket-vendu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `date-naissance` date DEFAULT NULL,
  `nom-utilisateur` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `est-actif` tinyint(4) NOT NULL DEFAULT '0',
  `est-supprimer` tinyint(4) NOT NULL DEFAULT '0',
  `creer-le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mise-a-jour-le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenoms`, `sexe`, `date-naissance`, `nom-utilisateur`, `email`, `telephone`, `motdepasse`, `profil`, `est-actif`, `est-supprimer`, `creer-le`, `mise-a-jour-le`) VALUES
(1, 'DOSSOU', 'Israel', NULL, NULL, NULL, 'doss.israel@gmail.com', NULL, '9f192f3316b7d896f9845296e7aa67586a16c18a', 'ADMINISTRATEUR', 0, 0, '2023-02-17 18:44:09', NULL),
(2, 'DOSSOU', 'Israel', NULL, NULL, NULL, 'iso.doo@gmail.com', NULL, '9f192f3316b7d896f9845296e7aa67586a16c18a', 'ADMINISTRATEUR', 1, 0, '2023-02-17 18:45:39', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`num-artiste`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`num-piece`);

--
-- Index pour la table `representation`
--
ALTER TABLE `representation`
  ADD PRIMARY KEY (`num-representation`),
  ADD KEY `num-spectacle` (`num-spectacle`),
  ADD KEY `num-salle` (`num-salle`);

--
-- Index pour la table `representation-artiste`
--
ALTER TABLE `representation-artiste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num-representation` (`num-representation`),
  ADD KEY `num-artiste` (`num-artiste`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`num-salle`);

--
-- Index pour la table `salle-piece`
--
ALTER TABLE `salle-piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num-salle` (`num-salle`),
  ADD KEY `num-piece` (`num-piece`);

--
-- Index pour la table `spectacle`
--
ALTER TABLE `spectacle`
  ADD PRIMARY KEY (`num-spectacle`),
  ADD KEY `num-artiste` (`num-artiste`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`code-ticket`);

--
-- Index pour la table `ticket-representation`
--
ALTER TABLE `ticket-representation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`num-representation`),
  ADD KEY `num-representation` (`num-representation`),
  ADD KEY `code-ticket` (`code-ticket`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `num-artiste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `num-piece` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `representation`
--
ALTER TABLE `representation`
  MODIFY `num-representation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `representation-artiste`
--
ALTER TABLE `representation-artiste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `num-salle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle-piece`
--
ALTER TABLE `salle-piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `spectacle`
--
ALTER TABLE `spectacle`
  MODIFY `num-spectacle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `code-ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ticket-representation`
--
ALTER TABLE `ticket-representation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `representation`
--
ALTER TABLE `representation`
  ADD CONSTRAINT `representation_ibfk_1` FOREIGN KEY (`num-spectacle`) REFERENCES `spectacle` (`num-spectacle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `representation_ibfk_2` FOREIGN KEY (`num-salle`) REFERENCES `salle` (`num-salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `representation-artiste`
--
ALTER TABLE `representation-artiste`
  ADD CONSTRAINT `powepowe` FOREIGN KEY (`num-representation`) REFERENCES `representation` (`num-representation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `representation-artiste_ibfk_1` FOREIGN KEY (`num-artiste`) REFERENCES `artiste` (`num-artiste`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `salle-piece`
--
ALTER TABLE `salle-piece`
  ADD CONSTRAINT `salle-piece_ibfk_1` FOREIGN KEY (`num-piece`) REFERENCES `piece` (`num-piece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salle-sfvsvs` FOREIGN KEY (`num-salle`) REFERENCES `salle` (`num-salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `spectacle`
--
ALTER TABLE `spectacle`
  ADD CONSTRAINT `spectacle_ibfk_1` FOREIGN KEY (`num-artiste`) REFERENCES `artiste` (`num-artiste`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ticket-representation`
--
ALTER TABLE `ticket-representation`
  ADD CONSTRAINT `lhlhnlhlk` FOREIGN KEY (`num-representation`) REFERENCES `representation` (`num-representation`),
  ADD CONSTRAINT `ticket-representation_ibfk_1` FOREIGN KEY (`code-ticket`) REFERENCES `ticket` (`code-ticket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
