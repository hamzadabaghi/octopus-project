-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 11:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancers`
--

CREATE TABLE `cancers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreCancer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupeCancer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cancers`
--

INSERT INTO `cancers` (`id`, `titreCancer`, `groupeCancer`) VALUES
(1, 'Cavite Orale', ''),
(2, 'Larynx', ''),
(3, 'Nasopharynx', 'Pharynx'),
(4, 'Hypopharynx', 'Pharynx'),
(5, 'Oropharynx', 'Pharynx');

-- --------------------------------------------------------

--
-- Table structure for table `contre_indication_operations`
--

CREATE TABLE `contre_indication_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreContreIndication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OperationMedicale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contre_indication_operations`
--

INSERT INTO `contre_indication_operations` (`id`, `titreContreIndication`, `OperationMedicale`, `cancer`) VALUES
(1, 'Etat general patient', 'chirurgie', 1),
(2, 'extension', 'chirurgie', 1),
(3, 'Etat general du patient', 'chimiotherapie', 1),
(4, 'Resistance de la tumeur', 'chimiotherapie', 1),
(5, 'Etat general du patient', 'radiotherapie', 1),
(6, 'Volume tumoral', 'radiotherapie', 1),
(7, 'Envahissement locoregional', 'radiotherapie', 1),
(8, 'Radiotherapie anterieure', 'radiotherapie', 1),
(9, 'Non sensibilite de la tumeur', 'radiotherapie', 1),
(10, 'Etat general patient', 'chirurgie', 5),
(11, 'extension', 'chirurgie', 5),
(12, 'Etat general du patient', 'chimiotherapie', 5),
(13, 'Resistance de la tumeur', 'chimiotherapie', 5),
(14, 'Etat general du patient', 'radiotherapie', 5),
(15, 'Volume tumoral', 'radiotherapie', 5),
(16, 'Envahissement locoregional', 'radiotherapie', 5),
(17, 'Radiotherapie anterieure', 'radiotherapie', 5),
(18, 'Non sensibilite de la tumeur', 'radiotherapie', 5),
(19, 'Etat general patient', 'chirurgie', 3),
(20, 'Pas un traitement de 1ere intension', 'chirurgie', 3),
(21, 'extension', 'chirurgie', 3),
(22, 'Etat general du patient', 'chimiotherapie', 3),
(23, 'Resistance de la tumeur', 'chimiotherapie', 3),
(24, 'Etat general du patient', 'radiotherapie', 3),
(25, 'Volume tumoral', 'radiotherapie', 3),
(26, 'Envahissement locoregional', 'radiotherapie', 3),
(27, 'Radiotherapie anterieure', 'radiotherapie', 3),
(28, 'Non sensibilite de la tumeur', 'radiotherapie', 3),
(29, 'Etat general patient', 'chirurgie', 4),
(30, 'Pas un traitement de 1ere intension', 'chirurgie', 4),
(31, 'extension', 'chirurgie', 4),
(32, 'Etat general du patient', 'chimiotherapie', 4),
(33, 'Resistance de la tumeur', 'chimiotherapie', 4),
(34, 'Etat general du patient', 'radiotherapie', 4),
(35, 'Volume tumoral', 'radiotherapie', 4),
(36, 'Envahissement locoregional', 'radiotherapie', 4),
(37, 'Radiotherapie anterieure', 'radiotherapie', 4),
(38, 'Non sensibilite de la tumeur', 'radiotherapie', 4),
(39, 'Etat general patient', 'chirurgie', 2),
(40, 'Pas un traitement de 1ere intension', 'chirurgie', 2),
(41, 'extension', 'chirurgie', 2),
(42, 'Etat general du patient', 'chimiotherapie', 2),
(43, 'Resistance de la tumeur', 'chimiotherapie', 2),
(44, 'Etat general du patient', 'radiotherapie', 2),
(45, 'Volume tumoral', 'radiotherapie', 2),
(46, 'Envahissement locoregional', 'radiotherapie', 2),
(47, 'Radiotherapie anterieure', 'radiotherapie', 2),
(48, 'Non sensibilite de la tumeur', 'radiotherapie', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ctnms`
--

CREATE TABLE `ctnms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titrecTNM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupeCTNM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL,
  `p16` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctnms`
--

INSERT INTO `ctnms` (`id`, `titrecTNM`, `groupeCTNM`, `cancer`, `p16`) VALUES
(1, 'Tx', 'T', 1, ''),
(2, 'T1', 'T', 1, ''),
(3, 'T2', 'T', 1, ''),
(4, 'T3', 'T', 1, ''),
(5, 'T4a', 'T', 1, ''),
(6, 'T4b', 'T', 1, ''),
(7, 'Nx', 'N', 1, ''),
(8, 'N0', 'N', 1, ''),
(9, 'N1', 'N', 1, ''),
(10, 'N2a', 'N', 1, ''),
(11, 'N2b', 'N', 1, ''),
(12, 'N2c', 'N', 1, ''),
(13, 'N3a', 'N', 1, ''),
(14, 'N3b', 'N', 1, ''),
(15, 'M0', 'M', 1, ''),
(16, 'M1', 'M', 1, ''),
(17, 'cTx', 'cT', 5, 'positif'),
(18, 'cT1', 'cT', 5, 'positif'),
(19, 'cT2', 'cT', 5, 'positif'),
(20, 'cT3', 'cT', 5, 'positif'),
(21, 'cT4', 'cT', 5, 'positif'),
(22, 'cNx', 'cN', 5, 'positif'),
(23, 'cN0', 'cN', 5, 'positif'),
(24, 'cN1', 'cN', 5, 'positif'),
(25, 'cN2', 'cN', 5, 'positif'),
(26, 'cN3', 'cN', 5, 'positif'),
(27, 'M0', 'M', 5, 'positif'),
(28, 'M1', 'M', 5, 'positif'),
(29, 'cTx', 'cT', 5, ''),
(30, 'cT1', 'cT', 5, ''),
(31, 'cT2', 'cT', 5, ''),
(32, 'cT3', 'cT', 5, ''),
(33, 'cT4a', 'cT', 5, 'negatif'),
(34, 'cT4b', 'cT', 5, 'negatif'),
(35, 'cNx', 'cN', 5, ''),
(36, 'cN0', 'cN', 5, ''),
(37, 'cN1', 'cN', 5, ''),
(38, 'cN2a', 'cN', 5, 'negatif'),
(39, 'cN2b', 'cN', 5, 'negatif'),
(40, 'cN2c', 'cN', 5, 'negatif'),
(41, 'cN3a', 'cN', 5, 'negatif'),
(42, 'cN3b', 'cN', 5, 'negatif'),
(43, 'cN3c', 'cN', 5, 'negatif'),
(44, 'M0', 'M', 5, ''),
(45, 'M1', 'M', 5, ''),
(46, 'cTx', 'cT', 3, ''),
(47, 'cT1', 'cT', 3, ''),
(48, 'cT2', 'cT', 3, ''),
(49, 'cT3', 'cT', 3, ''),
(50, 'cT4', 'cT', 3, ''),
(51, 'cNx', 'cN', 3, ''),
(52, 'cN0', 'cN', 3, ''),
(53, 'cN1', 'cN', 3, ''),
(54, 'cN2', 'cN', 3, ''),
(55, 'cN3', 'cN', 3, ''),
(56, 'M0', 'M', 3, ''),
(57, 'M1', 'M', 3, ''),
(58, 'cTx', 'cT', 4, ''),
(59, 'cT1', 'cT', 4, ''),
(60, 'cT2', 'cT', 4, ''),
(61, 'cT3', 'cT', 4, ''),
(62, 'cT4', 'cT', 4, ''),
(63, 'cNx', 'cN', 4, ''),
(64, 'cN0', 'cN', 4, ''),
(65, 'cN1', 'cN', 4, ''),
(66, 'cN2', 'cN', 4, ''),
(67, 'cN3', 'cN', 4, ''),
(68, 'M0', 'M', 4, ''),
(69, 'M1', 'M', 4, ''),
(70, 'cTx', 'Tumeurs supraglottiques', 2, ''),
(71, 'cT1', 'Tumeurs supraglottiques', 2, ''),
(72, 'cT2', 'Tumeurs supraglottiques', 2, ''),
(73, 'cT3', 'Tumeurs supraglottiques', 2, ''),
(74, 'cT4a', 'Tumeurs supraglottiques', 2, ''),
(75, 'cT4b', 'Tumeurs supraglottiques', 2, ''),
(76, 'cTx', 'Tumeurs sous glottiques', 2, ''),
(77, 'cT1', 'Tumeurs sous glottiques', 2, ''),
(78, 'cT2', 'Tumeurs sous glottiques', 2, ''),
(79, 'cT3', 'Tumeurs sous glottiques', 2, ''),
(80, 'cT4a', 'Tumeurs sous glottiques', 2, ''),
(81, 'cT4b', 'Tumeurs sous glottiques', 2, ''),
(82, 'cTx', 'Tumeurs glottiques', 2, ''),
(83, 'cTis', 'Tumeurs glottiques', 2, ''),
(84, 'cT1a', 'Tumeurs glottiques', 2, ''),
(85, 'cT1b', 'Tumeurs glottiques', 2, ''),
(86, 'cT2', 'Tumeurs glottiques', 2, ''),
(87, 'cT3', 'Tumeurs glottiques', 2, ''),
(88, 'cT4a', 'Tumeurs glottiques', 2, ''),
(89, 'cT4b', 'Tumeurs glottiques', 2, ''),
(90, 'cNx', 'cN', 2, ''),
(91, 'cN0a', 'cN', 2, ''),
(92, 'cN0b', 'cN', 2, ''),
(93, 'cN0c', 'cN', 2, ''),
(94, 'cN2a', 'cN', 2, ''),
(95, 'cN2b', 'cN', 2, ''),
(96, 'cN2c', 'cN', 2, ''),
(97, 'cN3a', 'cN', 2, ''),
(98, 'cN3b', 'cN', 2, ''),
(99, 'M0', 'M', 2, ''),
(100, 'M1', 'M', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `decisions`
--

CREATE TABLE `decisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idDossier` bigint(20) UNSIGNED NOT NULL,
  `decision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`decision`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreDepartement` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ORL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `titreDepartement`, `created_at`, `updated_at`) VALUES
(1, 'ORL', NULL, NULL),
(2, 'Neurochirurgie', NULL, NULL),
(3, 'Chirurgie Digestive', NULL, NULL),
(4, 'Traumatologie', NULL, NULL),
(5, 'Urologie', NULL, NULL),
(6, 'Gynecologie', NULL, NULL),
(7, 'Dermatologie', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateN` date NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TypeHt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FMP` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`FMP`)),
  `cT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `M` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p16` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cTumeurs_supraglottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cTumeurs_sous_glottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cTumeurs_glottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pTumeurs_supraglottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pTumeurs_sous_glottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pTumeurs_glottiques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIChirurgie` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CIChirurgie`)),
  `CIChimiotherapie` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CIChimiotherapie`)),
  `CIRadiotherapie` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CIRadiotherapie`)),
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'non traité',
  `cancer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resultat_premier_traitement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`resultat_premier_traitement`)),
  `chimiotherapie_premiere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rechute` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`Rechute`)),
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `professeurMessage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_m_p_s`
--

CREATE TABLE `f_m_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreFMP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupeFMP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `f_m_p_s`
--

INSERT INTO `f_m_p_s` (`id`, `titreFMP`, `groupeFMP`, `cancer`) VALUES
(1, 'Emboles neoplasiques', 'Histologie ', 1),
(2, 'Engainement perinerveux', 'Histologie ', 1),
(3, 'Index mitotique eleve', 'Histologie ', 1),
(4, 'Differenciation cellulaire pauvre', 'Histologie ', 1),
(5, 'Berges chirurgicales atteinte (positive ou moins de 5mm)=R+', 'Histologie ', 1),
(6, 'Rupture capsulaire de ganglion metastatique', 'Histologie ', 1),
(7, 'Etat general altere ou patient immunodeprime', 'Histologie ', 1),
(8, 'Croissance tumorale rapide', '', 1),
(9, 'Absence de HPV (pour cancer oropharynx)', '', 1),
(10, 'Sous type histologique de moins bon pronostic', '', 1),
(11, 'Emboles neoplasiques', 'Histologie ', 5),
(12, 'Engainement perinerveux', 'Histologie ', 5),
(13, 'Index mitotique eleve', 'Histologie ', 5),
(14, 'Differenciation cellulaire pauvre', 'Histologie ', 5),
(15, 'Berges chirurgicales atteinte (positives ou moins de 5mm)=R+', 'Histologie ', 5),
(16, 'Rupture capsulaire de ganglion metastatique', 'Histologie ', 5),
(17, 'Etat general altere ou patient immunodeprime', 'Histologie ', 5),
(18, 'Croissance tumorale rapide', '', 5),
(19, 'Absence de HPV', '', 5),
(20, 'Sous type histologique de moins bon pronostic', '', 5),
(21, 'Emboles neoplasiques', 'Histologie ', 3),
(22, 'Engainement perinerveux', 'Histologie ', 3),
(23, 'Index mitotique eleve (Temps de doublement potentiel)', 'Histologie ', 3),
(24, 'Differenciation cellulaire pauvre', 'Histologie ', 3),
(25, 'Berges chirurgicales atteinte (positives ou moins de 5mm)=R+', 'Histologie ', 3),
(26, 'Rupture capsulaire de ganglion metastatique', 'Histologie ', 3),
(27, 'Etat general altere ou patient immunodeprime', 'Histologie ', 3),
(28, 'Croissance tumorale rapide', 'Histologie ', 3),
(29, 'Sous type histologique de moins bon pronostic', 'Histologie ', 3),
(30, 'TNM stagging', '', 3),
(31, 'Non sterilisation nasopharyngee et ganglionnaire', '', 3),
(32, 'Schema therapeutique', '', 3),
(33, 'ADN serique viral plasmatique (risque de M+ et de rechutes est plus elevee si taux serique de le ADN virale est eleve)', '', 3),
(34, 'Emboles neoplasiques', 'Histologie', 4),
(35, 'Engainement perinerveux', 'Histologie', 4),
(36, 'Index mitotique eleve', 'Histologie', 4),
(37, 'Differenciation cellulaire pauvre', 'Histologie', 4),
(38, 'Berges chirurgicales atteintes (positives ou moins de 5mm)=R+', 'Histologie', 4),
(39, 'Rupture capsulaire de ganglion metastatique', 'Histologie', 4),
(40, 'Etat general altere ou patient immunodeprime', 'Histologie', 4),
(41, 'Croissance tumorale rapide', '', 4),
(42, 'Absence de HPV', '', 4),
(43, 'Sous type histologique de moins bon pronostic', '', 4),
(44, 'Emboles neoplasiques', 'Histologie', 2),
(45, 'Engainement perinerveux', 'Histologie', 2),
(46, 'Index mitotique eleve', 'Histologie', 2),
(47, 'Differenciation cellulaire pauvre', 'Histologie', 2),
(48, 'Berges chirurgicales atteintes (positives ou moins de 5mm)=R+', 'Histologie', 2),
(49, 'Rupture capsulaire de ganglion metastatique', 'Histologie', 2),
(50, 'Etat general altere ou patient immunodeprime', 'Histologie', 2),
(51, 'Croissance tumorale rapide', '', 2),
(52, 'Sous type histologique de moins bon pronostic', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `localisation_cancers`
--

CREATE TABLE `localisation_cancers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreLocalisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `localisation_cancers`
--

INSERT INTO `localisation_cancers` (`id`, `titreLocalisation`, `cancer`) VALUES
(1, 'langue mobile', 1),
(2, 'plancher buccal', 1),
(3, 'trigone retromolaire', 1),
(4, 'face interne de la joue', 1),
(5, 'palais', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_16_045741_create_dossiers_table', 1),
(5, '2020_04_17_195140_create_decisions_table', 1),
(6, '2020_04_18_014821_create_rcps_table', 1),
(7, '2020_04_19_204427_create_opinions_table', 1),
(8, '2020_04_20_082256_create_cancers_table', 1),
(9, '2020_04_20_082414_create_type_histologiques_table', 1),
(10, '2020_04_20_082444_create_f_m_p_s_table', 1),
(11, '2020_04_20_082508_create_contre_indication_operations_table', 1),
(12, '2020_04_20_082542_create_localisation_cancers_table', 1),
(13, '2020_04_20_082613_create_ctnms_table', 1),
(14, '2020_04_20_082628_create_ptnms_table', 1),
(15, '2020_05_22_233846_create_departement_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idProf` bigint(20) UNSIGNED NOT NULL,
  `idDossier` bigint(20) UNSIGNED NOT NULL,
  `opnProf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opnApp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`opnApp`)),
  `RP` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `opnAutresProfs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`opnAutresProfs`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ptnms`
--

CREATE TABLE `ptnms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titrepTNM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupepTNM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL,
  `p16` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ptnms`
--

INSERT INTO `ptnms` (`id`, `titrepTNM`, `groupepTNM`, `cancer`, `p16`) VALUES
(1, 'Tx', 'T', 1, ''),
(2, 'T1', 'T', 1, ''),
(3, 'T2', 'T', 1, ''),
(4, 'T3', 'T', 1, ''),
(5, 'T4a', 'T', 1, ''),
(6, 'T4b', 'T', 1, ''),
(7, 'Nx', 'N', 1, ''),
(8, 'N0', 'N', 1, ''),
(9, 'N1', 'N', 1, ''),
(10, 'N2a', 'N', 1, ''),
(11, 'N2b', 'N', 1, ''),
(12, 'N2c', 'N', 1, ''),
(13, 'N3a', 'N', 1, ''),
(14, 'N3b', 'N', 1, ''),
(15, 'pTx', 'pT', 5, 'positif'),
(16, 'pT1', 'pT', 5, 'positif'),
(17, 'pT2', 'pT', 5, 'positif'),
(18, 'pT3', 'pT', 5, 'positif'),
(19, 'pT4', 'pT', 5, 'positif'),
(20, 'pNx', 'pN', 5, 'positif'),
(21, 'pN0', 'pN', 5, 'positif'),
(22, 'pN1', 'pN', 5, 'positif'),
(23, 'pN2', 'pN', 5, 'positif'),
(24, 'pN3', 'pN', 5, 'positif'),
(25, 'pTx', 'pT', 5, ''),
(26, 'pT1', 'pT', 5, ''),
(27, 'pT2', 'pT', 5, ''),
(28, 'pT3', 'pT', 5, ''),
(29, 'pT4a', 'pT', 5, 'negatif'),
(30, 'pT4b', 'pT', 5, 'negatif'),
(31, 'pNx', 'pN', 5, ''),
(32, 'pN0', 'pN', 5, ''),
(33, 'pN1', 'pN', 5, ''),
(34, 'pN2a', 'pN', 5, 'negatif'),
(35, 'pN2b', 'pN', 5, 'negatif'),
(36, 'pN2c', 'pN', 5, 'negatif'),
(37, 'pN3a', 'pN', 5, 'negatif'),
(38, 'pN3b', 'pN', 5, 'negatif'),
(39, 'pTx', 'pT', 3, ''),
(40, 'pT1', 'pT', 3, ''),
(41, 'pT2', 'pT', 3, ''),
(42, 'pT3', 'pT', 3, ''),
(43, 'pT4', 'pT', 3, ''),
(44, 'pNx', 'pN', 3, ''),
(45, 'pN0', 'pN', 3, ''),
(46, 'pN1', 'pN', 3, ''),
(47, 'pN2', 'pN', 3, ''),
(48, 'pN3', 'pN', 3, ''),
(49, 'M0', 'M', 3, ''),
(50, 'M1', 'M', 3, ''),
(51, 'pTx', 'pT', 4, ''),
(52, 'pT1', 'pT', 4, ''),
(53, 'pT2', 'pT', 4, ''),
(54, 'pT3', 'pT', 4, ''),
(55, 'pT4', 'pT', 4, ''),
(56, 'pNx', 'pN', 4, ''),
(57, 'pN0', 'pN', 4, ''),
(58, 'pN1', 'pN', 4, ''),
(59, 'pN2', 'pN', 4, ''),
(60, 'pN3', 'pN', 4, ''),
(61, 'M0', 'M', 4, ''),
(62, 'M1', 'M', 4, ''),
(63, 'pTx', 'Tumeurs supraglottiques', 2, ''),
(64, 'pTis', 'Tumeurs supraglottiques', 2, ''),
(65, 'pT1', 'Tumeurs supraglottiques', 2, ''),
(66, 'pT2', 'Tumeurs supraglottiques', 2, ''),
(67, 'pT3', 'Tumeurs supraglottiques', 2, ''),
(68, 'pT4a', 'Tumeurs supraglottiques', 2, ''),
(69, 'pT4b', 'Tumeurs supraglottiques', 2, ''),
(70, 'pTx', 'Tumeurs sous glottiques', 2, ''),
(71, 'pTis', 'Tumeurs sous glottiques', 2, ''),
(72, 'pT1', 'Tumeurs sous glottiques', 2, ''),
(73, 'pT2', 'Tumeurs sous glottiques', 2, ''),
(74, 'pT3', 'Tumeurs sous glottiques', 2, ''),
(75, 'pT4a', 'Tumeurs sous glottiques', 2, ''),
(76, 'pT4b', 'Tumeurs sous glottiques', 2, ''),
(77, 'pTx', 'Tumeurs glottiques', 2, ''),
(78, 'pTis', 'Tumeurs glottiques', 2, ''),
(79, 'pT1a', 'Tumeurs glottiques', 2, ''),
(80, 'pT1b', 'Tumeurs glottiques', 2, ''),
(81, 'pT2', 'Tumeurs glottiques', 2, ''),
(82, 'pT3', 'Tumeurs glottiques', 2, ''),
(83, 'pT4a', 'Tumeurs glottiques', 2, ''),
(84, 'pT4b', 'Tumeurs glottiques', 2, ''),
(85, 'pNx', 'pN', 2, ''),
(86, 'pN0a', 'pN', 2, ''),
(87, 'pN0b', 'pN', 2, ''),
(88, 'pN0c', 'pN', 2, ''),
(89, 'pN2a', 'pN', 2, ''),
(90, 'pN2b', 'pN', 2, ''),
(91, 'pN2c', 'pN', 2, ''),
(92, 'pN3a', 'pN', 2, ''),
(93, 'pN3b', 'pN', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `rcps`
--

CREATE TABLE `rcps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idDossier` bigint(20) UNSIGNED NOT NULL,
  `finish` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_histologiques`
--

CREATE TABLE `type_histologiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titreTypeHisto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupeTypeHisto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cancer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_histologiques`
--

INSERT INTO `type_histologiques` (`id`, `titreTypeHisto`, `groupeTypeHisto`, `cancer`) VALUES
(1, 'Carcinome epidemoide bien differencie', 'Tumeurs malignes epitheliales', 1),
(2, 'Carcinome epidermoide moyennement differencie', 'Tumeurs malignes epitheliales', 1),
(3, 'Carcinome epidermoide acantholythique', 'Tumeurs malignes epitheliales', 1),
(4, 'Carcinome adeno-squameux', 'Tumeurs malignes epitheliales', 1),
(5, 'Carcinome a cellules fusiformes carcinome cuniculatum', 'Tumeurs malignes epitheliales', 1),
(6, 'Carcinome a cellules acineuses', 'Tumeurs des glandes salivaires', 1),
(7, 'Carcinome muco-epidermoide', 'Tumeurs des glandes salivaires', 1),
(8, 'Carcinome adenoide kystique', 'Tumeurs des glandes salivaires', 1),
(9, 'Carcinome neuro-endocrine', '', 1),
(10, 'Fibrosarcome', 'Tumeur du tissu mou ', 1),
(11, 'Histiocytofibrome malin', 'Tumeur du tissu mou ', 1),
(12, 'Liposarcome', 'Tumeur du tissu mou ', 1),
(13, 'Leiomyosarcome', 'Tumeur du tissu mou ', 1),
(14, 'Rhabdomyosarcome', 'Tumeur du tissu mou ', 1),
(15, 'Angiosarcome', 'Tumeur du tissu mou ', 1),
(16, 'Sarcome de Kaposi', 'Tumeur du tissu mou ', 1),
(17, 'Melanome', '', 1),
(18, 'Lymphome de Hodgkin', 'Lymphome', 1),
(19, 'Lymphome diffus a grande cellules B', 'Lymphome', 1),
(20, 'Lymphome NK/ T extraganglionnaire', 'Lymphome', 1),
(21, 'Tumeur / sarcome folliculaire a cellules dendritiques', 'Lymphome', 1),
(22, 'Plasmocytome extramedullaire', 'Lymphome', 1),
(23, 'Carcinome epidemoide bien differencie', 'Tumeurs malignes epitheliales', 5),
(24, 'Carcinome epidermoide moyennement differencie', 'Tumeurs malignes epitheliales', 5),
(25, 'Carcinome epidermoide acantholythique', 'Tumeurs malignes epitheliales', 5),
(26, 'Carcinome adeno-squameux', 'Tumeurs malignes epitheliales', 5),
(27, 'Carcinome a cellules fusiformes carcinome cuniculatum', 'Tumeurs malignes epitheliales', 5),
(28, 'Carcinome a cellules acineuses', 'Tumeurs des glandes salivaires', 5),
(29, 'Carcinome muco-epidermoide', 'Tumeurs des glandes salivaires', 5),
(30, 'Carcinome adenoide kystique', 'Tumeurs des glandes salivaires', 5),
(31, 'Carcinome neuro-endocrine', '', 5),
(32, 'Fibrosarcome', 'Tumeur du tissu mou ', 5),
(33, 'Histiocytofibrome malin', 'Tumeur du tissu mou ', 5),
(34, 'Liposarcome', 'Tumeur du tissu mou ', 5),
(35, 'Leiomyosarcome', 'Tumeur du tissu mou ', 5),
(36, 'Rhabdomyosarcome', 'Tumeur du tissu mou ', 5),
(37, 'Angiosarcome', 'Tumeur du tissu mou ', 5),
(38, 'Sarcome de Kaposi', 'Tumeur du tissu mou ', 5),
(39, 'Melanome', '', 5),
(40, 'Lymphome de Hodgkin', 'Lymphome', 5),
(41, 'Lymphome diffus a grande cellules B', 'Lymphome', 5),
(42, 'Lymphome NK/ T extraganglionnaire', 'Lymphome', 5),
(43, 'Tumeur / sarcome folliculaire a cellules dendritiques', 'Lymphome', 5),
(44, 'Plasmocytome extramedullaire', 'Lymphome', 5),
(45, 'Carcinome indifferencie de type naso-pharynge (UCNT)', 'Carcinomes', 3),
(46, 'Carcinome non keratinise', 'Carcinomes', 3),
(47, 'Carcinome epidermoide keratinise', 'Carcinomes', 3),
(48, 'Carcinome epidermoide basaloide', 'Carcinomes', 3),
(49, 'Adenocarcinome naso-pharynge papillaire', 'Adenocarcinome', 3),
(50, 'Carcinome de type salivaire', 'Adenocarcinome', 3),
(51, 'Carcinome muco-epidermoide', 'Adenocarcinome de type salivaire', 3),
(52, 'Carcinome adenoide kystique', 'Adenocarcinome de type salivaire', 3),
(53, 'Carcinome neuro-endocrine', '', 3),
(54, 'Fibrosarcome', 'Tumeur du tissu mou ', 3),
(55, 'Histiocytofibrome malin', 'Tumeur du tissu mou ', 3),
(56, 'Liposarcome', 'Tumeur du tissu mou ', 3),
(57, 'Leiomyosarcome', 'Tumeur du tissu mou ', 3),
(58, 'Rhabdomyosarcome', 'Tumeur du tissu mou ', 3),
(59, 'Angiosarcome', 'Tumeur du tissu mou ', 3),
(60, 'Sarcome de Kaposi', 'Tumeur du tissu mou ', 3),
(61, 'Lymphome de Hodgkin', 'Lymphome', 3),
(62, 'Lymphome diffus a grande cellules B', 'Lymphome', 3),
(63, 'Lymphome NK/ T extraganglionnaire', 'Lymphome', 3),
(64, 'Tumeur / sarcome folliculaire a cellules dendritiques', 'Lymphome', 3),
(65, 'Plasmocytome extramedullaire', 'Lymphome', 3),
(66, 'Chondrosarcome', 'Tumeurs osseuses et cartilagineuses', 3),
(67, 'Osteosarcome', 'Tumeurs osseuses et cartilagineuses', 3),
(68, 'Metastases', '', 3),
(69, 'Melanome', '', 3),
(70, 'Carcinome verruqueux', 'Carcinomes epidermoide', 4),
(71, 'Carcinome basaloide', 'Carcinomes epidermoide', 4),
(72, 'Carcinome epidermoide bien differencie', 'Carcinomes epidermoide', 4),
(73, 'Carcinome epidermoide moyennement differencie', 'Carcinomes epidermoide', 4),
(74, 'Carcinome epidermoide papillaire', 'Carcinomes epidermoide', 4),
(75, 'Carcinome a cellules fusiformes', 'Carcinomes epidermoide', 4),
(76, 'Carcinome epidermoide acantholytique', 'Carcinomes epidermoide', 4),
(77, 'Carcinome adeno-squameux', 'Carcinomes epidermoide', 4),
(78, 'Carcinome a cellules geantes', 'Carcinomes epidermoide', 4),
(79, 'Carcinome muco-epidermoide', 'Adenocarcinome de type salivaire', 4),
(80, 'Carcinome adenoide kystique', 'Adenocarcinome de type salivaire', 4),
(81, 'Carcinome neuro-endocrine', '', 4),
(82, 'Fibrosarcome', 'Tumeur du tissu mou', 4),
(83, 'Histiocytofibrome malin', 'Tumeur du tissu mou', 4),
(84, 'Liposarcome', 'Tumeur du tissu mou', 4),
(85, 'Leiomyosarcome', 'Tumeur du tissu mou', 4),
(86, 'Rhabdomyosarcome', 'Tumeur du tissu mou', 4),
(87, 'Angiosarcome', 'Tumeur du tissu mou', 4),
(88, 'Sarcome de Kaposi', 'Tumeur du tissu mou', 4),
(89, 'Melanome', '', 4),
(90, 'Tumeurs osseuses et cartilagineuses', '', 4),
(91, 'Metastases', '', 4),
(92, 'Carcinome epidermoide [bien ou moyennement differencie ou variante(e.g. verruqueux ou basaloide)]', '', 2),
(93, 'Carcinome glandes salivaires accessoires', '', 2),
(94, 'Adenocarcinome non salivaire', '', 2),
(95, 'Carcinome neuro-endocrine', '', 2),
(96, 'Carcinoma de type non determine', '', 2),
(97, 'Sarcome', '', 2),
(98, 'melanome', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'resident',
  `specialite` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'medecin',
  `dateN` date NOT NULL DEFAULT '1995-01-01',
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no-image.png',
  `departement` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `specialite`, `dateN`, `telephone`, `image`, `departement`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'resident', 'resident', 'medecin', '1995-01-01', '0', 'no-image.png', 1, 'residentCHU@gmail.com', NULL, '$2y$10$2W5jfoRx7pacORZsDva03OPzb6gS/RRvQogC9iKkf/vJwapnFyD.S', NULL, '2020-05-15 23:36:00', '2020-05-15 23:36:00'),
(2, 'admin', 'admin', 'admin', '1995-01-01', '0123456789', 'scrum_abstract_1630402110.png', 1, 'contact.octopuschu@gmail.com', NULL, '$2y$10$i.E3Ff6tZRrvorL1pq3GcOlLligJNj05y47.FVZhLWY1C1uV3aysW', NULL, '2020-05-15 23:40:00', '2021-08-31 08:28:31'),
(3, 'Azdad', 'Anas', 'Chirurgien', '1999-07-12', '+121 456 789', '1_1630402783.jpg', 1, 'anas.azdad@gmail.com', NULL, '$2y$10$oYM7SVebibaSD2/l9PgacuRObMQd1K22N.lYkrbDSVyDZfeCUjeZm', NULL, '2021-08-31 08:33:06', '2021-08-31 08:39:43'),
(4, 'Dabaghi', 'Hamza', 'Oncologue', '1998-02-08', '+121 456 789', '3_1630402633.jpg', 1, 'hamza.dabaghi@gmail.com', NULL, '$2y$10$FYLCUS6aaeKqEzi7UMft0OCvnBZZ3xnDuwUpQUwzfGGC5W2/M3CDi', NULL, '2021-08-31 08:33:57', '2021-08-31 08:37:13'),
(5, 'Alaoui', 'Sanae', 'radiothérapeute', '1997-01-11', '+121 456 789', '2_1630402733.jpg', 1, 'sanae.alaoui@gmail.com', NULL, '$2y$10$wsfWovCWEcPjzHVOBEFYueLoWW9yOeVgRaHcdiwps4a3Y/ef4CtQW', NULL, '2021-08-31 08:34:45', '2021-08-31 08:38:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancers`
--
ALTER TABLE `cancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contre_indication_operations`
--
ALTER TABLE `contre_indication_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contre_indication_operations_cancer_foreign` (`cancer`);

--
-- Indexes for table `ctnms`
--
ALTER TABLE `ctnms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctnms_cancer_foreign` (`cancer`);

--
-- Indexes for table `decisions`
--
ALTER TABLE `decisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decisions_iddossier_foreign` (`idDossier`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_m_p_s`
--
ALTER TABLE `f_m_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_m_p_s_cancer_foreign` (`cancer`);

--
-- Indexes for table `localisation_cancers`
--
ALTER TABLE `localisation_cancers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localisation_cancers_cancer_foreign` (`cancer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opinions_iddossier_foreign` (`idDossier`),
  ADD KEY `opinions_idprof_foreign` (`idProf`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ptnms`
--
ALTER TABLE `ptnms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ptnms_cancer_foreign` (`cancer`);

--
-- Indexes for table `rcps`
--
ALTER TABLE `rcps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rcps_iddossier_foreign` (`idDossier`);

--
-- Indexes for table `type_histologiques`
--
ALTER TABLE `type_histologiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_histologiques_cancer_foreign` (`cancer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_departement_foreign` (`departement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancers`
--
ALTER TABLE `cancers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contre_indication_operations`
--
ALTER TABLE `contre_indication_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ctnms`
--
ALTER TABLE `ctnms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `decisions`
--
ALTER TABLE `decisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_m_p_s`
--
ALTER TABLE `f_m_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `localisation_cancers`
--
ALTER TABLE `localisation_cancers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ptnms`
--
ALTER TABLE `ptnms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `rcps`
--
ALTER TABLE `rcps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_histologiques`
--
ALTER TABLE `type_histologiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contre_indication_operations`
--
ALTER TABLE `contre_indication_operations`
  ADD CONSTRAINT `contre_indication_operations_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ctnms`
--
ALTER TABLE `ctnms`
  ADD CONSTRAINT `ctnms_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `decisions`
--
ALTER TABLE `decisions`
  ADD CONSTRAINT `decisions_iddossier_foreign` FOREIGN KEY (`idDossier`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `f_m_p_s`
--
ALTER TABLE `f_m_p_s`
  ADD CONSTRAINT `f_m_p_s_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `localisation_cancers`
--
ALTER TABLE `localisation_cancers`
  ADD CONSTRAINT `localisation_cancers_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_iddossier_foreign` FOREIGN KEY (`idDossier`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opinions_idprof_foreign` FOREIGN KEY (`idProf`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ptnms`
--
ALTER TABLE `ptnms`
  ADD CONSTRAINT `ptnms_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rcps`
--
ALTER TABLE `rcps`
  ADD CONSTRAINT `rcps_iddossier_foreign` FOREIGN KEY (`idDossier`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `type_histologiques`
--
ALTER TABLE `type_histologiques`
  ADD CONSTRAINT `type_histologiques_cancer_foreign` FOREIGN KEY (`cancer`) REFERENCES `cancers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_departement_foreign` FOREIGN KEY (`departement`) REFERENCES `departement` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
