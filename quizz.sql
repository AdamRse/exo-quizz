SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `id_questions` int(11) NOT NULL,
  `good_ans` tinyint(1) NOT NULL,
  `difficulty` int(11) DEFAULT NULL,
  `statement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `bonus_per_sec` int(11) DEFAULT NULL,
  `time_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `score_u_c` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(31) NOT NULL,
  `answer` int(11) NOT NULL,
  `attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `users` (
  `pseudo` varchar(31) NOT NULL,
  `attempt_cpt` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL,
  `color` varchar(31) NOT NULL,
  `hi_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `score_u_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `answer` (`answer`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`pseudo`);
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `score_u_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `score_u_c`
  ADD CONSTRAINT `score_u_c_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `users` (`pseudo`),
  ADD CONSTRAINT `score_u_c_ibfk_2` FOREIGN KEY (`answer`) REFERENCES `choices` (`id`),
  ADD CONSTRAINT `score_u_c_ibfk_3` FOREIGN KEY (`answer`) REFERENCES `choices` (`id`);
COMMIT;