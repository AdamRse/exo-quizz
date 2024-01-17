-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 17 jan. 2024 à 20:19
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `id` int NOT NULL,
  `id_questions` int NOT NULL,
  `good_ans` tinyint(1) NOT NULL,
  `difficulty` int DEFAULT NULL,
  `statement` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `statement` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `points` int NOT NULL,
  `bonus_per_sec` int DEFAULT NULL,
  `time_answer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `score_u_c`
--

CREATE TABLE `score_u_c` (
  `id` int NOT NULL,
  `pseudo` varchar(31) COLLATE utf8mb4_general_ci NOT NULL,
  `answer` int NOT NULL,
  `attempt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `pseudo` varchar(31) COLLATE utf8mb4_general_ci NOT NULL,
  `attempt_cpt` int NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'orange',
  `hi_score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pseudo`, `attempt_cpt`, `avatar`, `color`, `hi_score`) VALUES
('yes', 0, '9', 'orange', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `score_u_c`
--
ALTER TABLE `score_u_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `answer` (`answer`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `score_u_c`
--
ALTER TABLE `score_u_c`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `score_u_c`
--
ALTER TABLE `score_u_c`
  ADD CONSTRAINT `score_u_c_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `users` (`pseudo`),
  ADD CONSTRAINT `score_u_c_ibfk_2` FOREIGN KEY (`answer`) REFERENCES `choices` (`id`),
  ADD CONSTRAINT `score_u_c_ibfk_3` FOREIGN KEY (`answer`) REFERENCES `choices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
