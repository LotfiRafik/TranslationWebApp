-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2020 at 12:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_2cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `wilaya` varchar(255) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `firstname`, `lastname`, `tel`, `fax`, `wilaya`, `commune`, `adress`) VALUES
(1, 'gl_bouchafa@esi.dz', '123', 'Lotfi Rafik', 'Bouchafa', '0551824453', '0231594615', 'Alger', 'Birkhadem', '308 Coop soummam');

-- --------------------------------------------------------

--
-- Table structure for table `demande_traduction`
--

CREATE TABLE `demande_traduction` (
  `devis_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demande_traduction`
--

INSERT INTO `demande_traduction` (`devis_id`, `traducteur_id`, `date`) VALUES
(6, 1, '2020-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `langue_s` varchar(255) NOT NULL,
  `langue_d` varchar(255) NOT NULL,
  `traduction_type` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `assermente` tinyint(1) NOT NULL DEFAULT 0,
  `file_path` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `client_id`, `nom`, `prenom`, `email`, `tel`, `adresse`, `langue_s`, `langue_d`, `traduction_type`, `comment`, `assermente`, `file_path`, `date`) VALUES
(6, 1, 'Bouchafa', 'Lotfi', 'gl_bouchafa@esi.dz', '545', 'adzdaz', 'Arabe', 'Anglais', 1, '', 0, 'DevisDocuments/6.pdf', '2020-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `devis_traducteur`
--

CREATE TABLE `devis_traducteur` (
  `devis_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devis_traducteur`
--

INSERT INTO `devis_traducteur` (`devis_id`, `traducteur_id`) VALUES
(6, 1),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`id`) VALUES
('Albanais'),
('Allemand'),
('Amharique'),
('Anglais'),
('Arabe'),
('Arménien'),
('Azéri'),
('Basque'),
('Bengali'),
('Biélorusse'),
('Birman'),
('Bosniaque'),
('Bulgare'),
('Catalan'),
('Cebuano'),
('Chichewa'),
('Chinois'),
('Cingalais'),
('Coréen'),
('Croate'),
('Danois'),
('Espagnol'),
('Espéranto'),
('Estonien'),
('Finnois'),
('Français'),
('Grec'),
('Hawaïen'),
('Hébreu'),
('Hindi'),
('Hongrois'),
('Indonésien'),
('Irlandais'),
('Islandais'),
('Italien'),
('Japonais'),
('Kurde'),
('Latin'),
('Lituanien'),
('Luxembourgeois'),
('Macédonien'),
('Malaisien'),
('Mongol'),
('Néerlandais'),
('Népalais'),
('Norvégien'),
('Persan'),
('Philippin'),
('Polonais'),
('Portugais'),
('Roumain'),
('Russe'),
('Serbe'),
('Slovaque'),
('Slovène'),
('Somali'),
('Soundanais'),
('Suédois'),
('Tchèque'),
('Thaï'),
('Turc'),
('Ukrainien'),
('Urdu'),
('Vietnamien');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `devis_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`devis_id`, `traducteur_id`, `date`, `prix`) VALUES
(6, 1, '2020-01-15', 54);

-- --------------------------------------------------------

--
-- Table structure for table `traducteur`
--

CREATE TABLE `traducteur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `wilaya` varchar(255) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `langue1` varchar(255) DEFAULT NULL,
  `langue2` varchar(255) DEFAULT NULL,
  `langue3` varchar(255) DEFAULT NULL,
  `langue4` varchar(255) DEFAULT NULL,
  `langue5` varchar(255) DEFAULT NULL,
  `assermente` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traducteur`
--

INSERT INTO `traducteur` (`id`, `email`, `password`, `firstname`, `lastname`, `tel`, `fax`, `wilaya`, `commune`, `adress`, `langue1`, `langue2`, `langue3`, `langue4`, `langue5`, `assermente`) VALUES
(1, 'belhadj_said@gmail.com', '123', 'Said', 'Belhadj', '031562570', '031563050', 'Oran', 'Es-Senia', '50 Rue des martyrs', 'Arabe', 'Français', 'Anglais', NULL, NULL, 0),
(2, 'helali_karim@gmail.com', '123', 'karim', 'helali', '035562570', '035563050', 'Boumerdes', 'Boumderdes-centre', '3500 Rue de la liberté', 'Arabe', 'Turc', NULL, NULL, NULL, 1),
(3, 'bouroubi_taous@gmail.com', '123', 'Taous', 'Bouroubi', '023562570', '023562570', 'Alger', 'Oued samar', '68 rue de la gare', 'Arabe', 'Anglais', 'Espagnol', NULL, NULL, 0),
(4, 'Sebaa_Djamila@gmail.com', '123', 'Djamila', 'Sebaa', '026562570', '026563050', 'El-Oued', 'Djamaa', '30 Rue des dunes', 'Arabe', 'Français', NULL, NULL, NULL, 1),
(5, 'Hazi_Farouk@gmail.com', '123', 'Farouk', 'Hazi', '025562570', '025563050', 'Tizi-ouzou', 'Freha', '10 Rue des oliviers', 'Arabe', 'Anglais', 'Chinois', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `traduction`
--

CREATE TABLE `traduction` (
  `devis_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `note` enum('0','1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traduction`
--

INSERT INTO `traduction` (`devis_id`, `traducteur_id`, `file_path`, `note`) VALUES
(6, 1, 'TraductionDocuments/6_1.pdf', '4');

-- --------------------------------------------------------

--
-- Table structure for table `traduction_type`
--

CREATE TABLE `traduction_type` (
  `id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traduction_type`
--

INSERT INTO `traduction_type` (`id`, `description`) VALUES
(1, 'FINANCIÈRE'),
(2, 'GÉNÉRAL'),
(3, 'JUDICIAIRE'),
(4, 'JURIDIQUE'),
(5, 'LITTÉRAIRE'),
(6, 'LÉGALE'),
(7, 'SCIENTIFIQUE'),
(8, 'TECHNIQUE'),
(9, 'WEB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demande_traduction`
--
ALTER TABLE `demande_traduction`
  ADD PRIMARY KEY (`devis_id`,`traducteur_id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langue_s_id` (`langue_s`),
  ADD KEY `langue_d_id` (`langue_d`),
  ADD KEY `type_id` (`traduction_type`);

--
-- Indexes for table `devis_traducteur`
--
ALTER TABLE `devis_traducteur`
  ADD PRIMARY KEY (`devis_id`,`traducteur_id`),
  ADD KEY `traducteur_id` (`traducteur_id`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`devis_id`,`traducteur_id`);

--
-- Indexes for table `traducteur`
--
ALTER TABLE `traducteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langue_id` (`langue1`),
  ADD KEY `langue2_id` (`langue2`),
  ADD KEY `langue3_id` (`langue3`),
  ADD KEY `langue4_id` (`langue4`),
  ADD KEY `langue5_id` (`langue5`);

--
-- Indexes for table `traduction`
--
ALTER TABLE `traduction`
  ADD PRIMARY KEY (`devis_id`,`traducteur_id`);

--
-- Indexes for table `traduction_type`
--
ALTER TABLE `traduction_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `traducteur`
--
ALTER TABLE `traducteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `traduction_type`
--
ALTER TABLE `traduction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande_traduction`
--
ALTER TABLE `demande_traduction`
  ADD CONSTRAINT `devistrad_id` FOREIGN KEY (`devis_id`,`traducteur_id`) REFERENCES `offre` (`devis_id`, `traducteur_id`);

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `langue_d_id` FOREIGN KEY (`langue_d`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `langue_s_id` FOREIGN KEY (`langue_s`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `type_id` FOREIGN KEY (`traduction_type`) REFERENCES `traduction_type` (`id`);

--
-- Constraints for table `devis_traducteur`
--
ALTER TABLE `devis_traducteur`
  ADD CONSTRAINT `devis_id` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `trad__id` FOREIGN KEY (`traducteur_id`) REFERENCES `traducteur` (`id`);

--
-- Constraints for table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `devis_trad_id` FOREIGN KEY (`devis_id`,`traducteur_id`) REFERENCES `devis_traducteur` (`devis_id`, `traducteur_id`);

--
-- Constraints for table `traducteur`
--
ALTER TABLE `traducteur`
  ADD CONSTRAINT `langue2_id` FOREIGN KEY (`langue2`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `langue3_id` FOREIGN KEY (`langue3`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `langue4_id` FOREIGN KEY (`langue4`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `langue5_id` FOREIGN KEY (`langue5`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `langue_id` FOREIGN KEY (`langue1`) REFERENCES `langue` (`id`);

--
-- Constraints for table `traduction`
--
ALTER TABLE `traduction`
  ADD CONSTRAINT `DevisTradId` FOREIGN KEY (`devis_id`,`traducteur_id`) REFERENCES `demande_traduction` (`devis_id`, `traducteur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
