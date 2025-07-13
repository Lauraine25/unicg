-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 juil. 2025 à 02:25
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ucg`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id_affectation` varchar(50) NOT NULL,
  `dateaffectation` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_promotion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE `attribution` (
  `id_attribution` int(11) NOT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_semestre` varchar(50) DEFAULT NULL,
  `id_cours` varchar(50) DEFAULT NULL,
  `matriculeenseignant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cote`
--

CREATE TABLE `cote` (
  `id_cote` double NOT NULL,
  `gradedevaluation` text DEFAULT NULL,
  `dateevalaluation` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_attribution` int(11) DEFAULT NULL,
  `id_affectationa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` varchar(50) NOT NULL,
  `unitedenseignement` text DEFAULT NULL,
  `nomcours` text DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `volumehoraire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours_decale`
--

CREATE TABLE `cours_decale` (
  `id_cours` varchar(50) DEFAULT NULL,
  `nomcours` text DEFAULT NULL,
  `id_affectation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `iddepartement` varchar(50) NOT NULL,
  `nomdepartement` text DEFAULT NULL,
  `idfaculte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `matriculeenseignant` varchar(50) NOT NULL,
  `nomenseignant` text DEFAULT NULL,
  `postnomenseigant` text DEFAULT NULL,
  `prenomenseigant` text DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `telephone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(50) NOT NULL,
  `nom` text DEFAULT NULL,
  `postnom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `etatcivil` text DEFAULT NULL,
  `lieudenaissance` text DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `nationalité` text DEFAULT NULL,
  `provincedorigine` text DEFAULT NULL,
  `villedorigine` text DEFAULT NULL,
  `territoirecommune` text DEFAULT NULL,
  `ecoleorigine` text DEFAULT NULL,
  `pourcentage` double DEFAULT NULL,
  `anneediplome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faculté`
--

CREATE TABLE `faculté` (
  `idfaculte` varchar(50) NOT NULL,
  `nomfaculte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` varchar(50) NOT NULL,
  `nomfilière` text DEFAULT NULL,
  `iddepartement` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` varchar(50) NOT NULL,
  `dateinscription` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` varchar(50) NOT NULL,
  `nompromotion` text DEFAULT NULL,
  `id_filiere` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` varchar(50) DEFAULT NULL,
  `nomsemestre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id_affectation`);

--
-- Index pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD PRIMARY KEY (`id_attribution`);

--
-- Index pour la table `cote`
--
ALTER TABLE `cote`
  ADD PRIMARY KEY (`id_cote`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`iddepartement`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`matriculeenseignant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `faculté`
--
ALTER TABLE `faculté`
  ADD PRIMARY KEY (`idfaculte`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id_attribution` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
