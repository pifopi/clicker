-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 04 Février 2017 à 08:27
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `id_questionnaire` int(11) NOT NULL,
  `numero_question` int(11) NOT NULL,
  `question` text NOT NULL,
  `bonne_reponse` enum('a','b','c','d') NOT NULL,
  `activation_question` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_question`, `id_questionnaire`, `numero_question`, `question`, `bonne_reponse`, `activation_question`) VALUES
(166, 123541, 1, 'De combien de classes une classe fille peut-elle heriter ?', 'a', 0),
(167, 123541, 2, 'Qu offre Java avec les interfaces java.util.Collection et java.util.Map ? ', 'a', 0),
(168, 123541, 3, 'World of Warcraft est developpe par :', 'c', 0),
(169, 123541, 4, 'World of Warcraft est un :', 'd', 0),
(170, 123541, 5, 'What frequency range is the High Frequency band ?', 'a', 0),
(171, 123541, 6, 'What does EPROM stand for ?', 'a', 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id_questionnaire` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id_questionnaire`, `id_utilisateur`) VALUES
(123541, 'prof_gael');

-- --------------------------------------------------------

--
-- Structure de la table `reponse_eleve`
--

CREATE TABLE `reponse_eleve` (
  `id_reponse_eleve` int(11) NOT NULL,
  `id_utilisateur` text NOT NULL,
  `id_questionnaire` int(11) NOT NULL,
  `numero_question` int(11) NOT NULL,
  `reponse` enum('a','b','c','d') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse_eleve`
--

INSERT INTO `reponse_eleve` (`id_reponse_eleve`, `id_utilisateur`, `id_questionnaire`, `numero_question`, `reponse`, `date`) VALUES
(64, 'etudiant1', 123541, 1, 'b', '2017-02-04 06:50:32'),
(65, 'etudiant_asmae', 123541, 1, 'a', '2017-02-04 06:50:36'),
(66, 'etudiant1', 123541, 1, 'a', '2017-02-04 06:50:59'),
(67, 'etudiant_asmae', 123541, 1, 'a', '2017-02-04 06:51:00'),
(68, 'etudiant_asmae', 123541, 2, 'a', '2017-02-04 06:51:36'),
(69, 'etudiant1', 123541, 2, 'a', '2017-02-04 06:51:39'),
(70, 'etudiant1', 123541, 3, 'c', '2017-02-04 06:51:56'),
(71, 'etudiant_asmae', 123541, 3, 'c', '2017-02-04 06:51:58'),
(72, 'etudiant1', 123541, 4, 'd', '2017-02-04 06:52:21'),
(73, 'etudiant_asmae', 123541, 4, 'c', '2017-02-04 06:52:23'),
(74, 'etudiant_asmae', 123541, 5, 'd', '2017-02-04 06:52:40'),
(75, 'etudiant1', 123541, 5, 'd', '2017-02-04 06:52:41'),
(76, 'etudiant1', 123541, 6, 'd', '2017-02-04 06:53:08'),
(77, 'etudiant_asmae', 123541, 6, 'b', '2017-02-04 06:53:10');

-- --------------------------------------------------------

--
-- Structure de la table `reponse_prof`
--

CREATE TABLE `reponse_prof` (
  `id_reponse` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `numero_reponse` enum('a','b','c','d') NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse_prof`
--

INSERT INTO `reponse_prof` (`id_reponse`, `id_question`, `numero_reponse`, `reponse`) VALUES
(889, 166, 'a', '1'),
(890, 166, 'b', '2'),
(891, 166, 'c', '3'),
(892, 166, 'd', '4'),
(893, 167, 'a', 'Les interfaces dont heritent les collections presentes.'),
(894, 167, 'b', 'Rien, ces interfaces n existent pas.'),
(895, 167, 'c', 'Rien, ce ne sont pas des interfaces mais des classes.'),
(896, 167, 'd', 'Rien, ces interfaces n ont pas d implementation.'),
(897, 168, 'a', 'Activision'),
(898, 168, 'b', 'Pegi.info'),
(899, 168, 'c', 'Blizzard'),
(900, 168, 'd', 'MMO Studio'),
(901, 169, 'a', 'RPG'),
(902, 169, 'b', 'MMO'),
(903, 169, 'c', 'FPS'),
(904, 169, 'd', 'MMORPG'),
(905, 170, 'a', '100 kHz'),
(906, 170, 'b', '1 GHz'),
(907, 170, 'c', '30 to 300 MHz'),
(908, 170, 'd', '3 to 30 MHz'),
(909, 171, 'a', 'Electric Programmable Read Only Memory'),
(910, 171, 'b', 'Erasable Programmable Read Only Memory'),
(911, 171, 'c', 'Evaluable Philotic Random Optic Memory'),
(912, 171, 'd', 'Every Person Requires One Mind');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` varchar(255) NOT NULL,
  `mot_de_pass` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `mot_de_pass`, `statut`, `nom`, `prenom`, `mail`) VALUES
('etudiant1', 'etudiant1', '2', 'etudiant1', 'etudiant1', 'etudiant1@gmail.com'),
('etudiant_asmae', 'asmae', '2', 'asmaeasmae', 'asmae', 'asmae@asmae.com'),
('etudiant_gael', 'etudiant_gael', '2', 'etudiant_gael', 'etudiant_gael', 'etudiant_gael@gmail.com'),
('gael', 'gael', '1', 'gael', 'gael', 'gael@gmail.com'),
('prof_gael', 'prof_gael', '1', 'prof_gael', 'prof_gael', 'prof_gael@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_questionnaire` (`id_questionnaire`),
  ADD KEY `reponse` (`bonne_reponse`),
  ADD KEY `id_reponse` (`bonne_reponse`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  ADD PRIMARY KEY (`id_reponse_eleve`);

--
-- Index pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123542;
--
-- AUTO_INCREMENT pour la table `reponse_eleve`
--
ALTER TABLE `reponse_eleve`
  MODIFY `id_reponse_eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT pour la table `reponse_prof`
--
ALTER TABLE `reponse_prof`
  MODIFY `id_reponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=913;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
