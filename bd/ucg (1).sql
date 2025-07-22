-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2025 at 08:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucg`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `dateaffectation` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_promotion` varchar(50) DEFAULT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`id`, `dateaffectation`, `anneeacademique`, `id_promotion`, `id_cours`) VALUES
(1, '2025-07-20', '2025-2026', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribution`
--

CREATE TABLE `attribution` (
  `id` int(11) NOT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_cours` int(11) DEFAULT NULL,
  `matriculeenseignant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribution`
--

INSERT INTO `attribution` (`id`, `anneeacademique`, `id_semestre`, `id_cours`, `matriculeenseignant`) VALUES
(1, '2025-2026', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cote`
--

CREATE TABLE `cote` (
  `id_cote` int(11) NOT NULL,
  `gradedevaluation` text DEFAULT NULL,
  `dateevalaluation` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `id_attribution` int(11) DEFAULT NULL,
  `id_inscription` int(11) DEFAULT NULL,
  `cote_tp` double NOT NULL,
  `cote_interro` double NOT NULL,
  `cote_exam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cote`
--

INSERT INTO `cote` (`id_cote`, `gradedevaluation`, `dateevalaluation`, `anneeacademique`, `id_attribution`, `id_inscription`, `cote_tp`, `cote_interro`, `cote_exam`) VALUES
(2, '', '2025-07-21', '2025-2026', 1, 2, 2, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `unitedenseignement` text DEFAULT NULL,
  `nomcours` text DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `volumehoraire` int(11) DEFAULT NULL,
  `promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `unitedenseignement`, `nomcours`, `credit`, `volumehoraire`, `promotion`) VALUES
(1, 'okkook', 'okkkko', 23, 12, 6),
(3, 'finance', 'math financiere', 2, 30, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cours_decale`
--

CREATE TABLE `cours_decale` (
  `id_cours` varchar(50) DEFAULT NULL,
  `nomcours` text DEFAULT NULL,
  `id_affectation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nomdepartement` text DEFAULT NULL,
  `idfaculte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nomdepartement`, `idfaculte`) VALUES
(1, 'economie politi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `matricule` varchar(10) NOT NULL,
  `nom` text DEFAULT NULL,
  `postnom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `motdepasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`matricule`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `motdepasse`) VALUES
('ENS0002', 'kambale', 'kamala', 'albert', 'M', '0971402590', 'aM0a40202Ma');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `postnom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `etatcivil` text DEFAULT NULL,
  `lieudenaissance` text DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `nationalite` text DEFAULT NULL,
  `provincedorigine` text DEFAULT NULL,
  `villedorigine` text DEFAULT NULL,
  `territoirecommune` text DEFAULT NULL,
  `ecoleorigine` text DEFAULT NULL,
  `pourcentage` double DEFAULT NULL,
  `anneediplome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `etatcivil`, `lieudenaissance`, `datedenaissance`, `adresse`, `nationalite`, `provincedorigine`, `villedorigine`, `territoirecommune`, `ecoleorigine`, `pourcentage`, `anneediplome`) VALUES
(2, 'qwwww', 'ww', 'www', 'F', '0977139499', 'KKK', 'KKK', '2025-07-07', 'KKKKK', NULL, 'KKKK', 'KKKK', 'KKKK', NULL, 65, '2OK');

-- --------------------------------------------------------

--
-- Table structure for table `faculte`
--

CREATE TABLE `faculte` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculte`
--

INSERT INTO `faculte` (`id`, `nom`) VALUES
(2, 'economie'),
(3, 'imk'),
(4, 'jnjkkkkk'),
(5, 'llllllll');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nomfiliere` text DEFAULT NULL,
  `iddepartement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `nomfiliere`, `iddepartement`) VALUES
(1, 'mmmmmmmm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `motdepasse` text NOT NULL,
  `dateinscription` date DEFAULT NULL,
  `anneeacademique` text DEFAULT NULL,
  `idetudiant` int(11) DEFAULT NULL,
  `idpromotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id`, `matricule`, `motdepasse`, `dateinscription`, `anneeacademique`, `idetudiant`, `idpromotion`) VALUES
(2, 'ECO0001/2025', 'wW0w13902Fww', '2025-07-19', '2025-2026', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `nompromotion` text DEFAULT NULL,
  `idfiliere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `nompromotion`, `idfiliere`) VALUES
(6, 'L1 ECONO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `nomsemestre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nomsemestre`) VALUES
(1, 'premier semestre'),
(2, 'second semestre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribution`
--
ALTER TABLE `attribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cote`
--
ALTER TABLE `cote`
  ADD PRIMARY KEY (`id_cote`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cote`
--
ALTER TABLE `cote`
  MODIFY `id_cote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
