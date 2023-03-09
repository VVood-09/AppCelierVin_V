-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 07:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bouteilles`
--

CREATE TABLE `bouteilles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `prix_saq` double(8,2) DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) NOT NULL,
  `provenance_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bouteilles`
--

INSERT INTO `bouteilles` (`id`, `nom`, `image`, `code_saq`, `pays`, `description`, `prix_saq`, `url_saq`, `url_img`, `format`, `provenance_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Rempel, Wilkinson and Heathcote Compatible mobile service-desk', NULL, NULL, NULL, 'Est aperiam voluptas recusandae qui architecto quam maxime quibusdam quos natus est corporis velit.', NULL, NULL, NULL, '852 ml', 11, 2, '2023-03-07 23:01:35', '2023-03-07 23:01:35'),
(2, 'Homenick LLC Organic well-modulated challenge', NULL, NULL, NULL, 'Debitis est libero accusamus a culpa labore vel ullam quas odit molestiae.', NULL, NULL, NULL, '564 ml', 32, 3, '2023-03-07 23:01:35', '2023-03-07 23:01:35'),
(3, 'Morar and Sons Versatile systemic task-force', NULL, NULL, NULL, 'Accusamus eum quas ut iste excepturi ipsam.', NULL, NULL, NULL, '546 ml', 12, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(4, 'Keeling, Hackett and Huels Seamless logistical budgetarymanagement', NULL, NULL, NULL, 'Dolores quis officiis molestiae pariatur voluptates vero rem explicabo molestiae ut deleniti.', NULL, NULL, NULL, '633 ml', 47, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(5, 'Hyatt and Sons Public-key eco-centric hub', NULL, NULL, NULL, 'Sit quam repellat ducimus possimus sed ut id officia quia similique similique.', NULL, NULL, NULL, '365 ml', 21, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(6, 'Gutkowski-Hackett Upgradable coherent analyzer', NULL, NULL, NULL, 'Explicabo accusantium aliquid vel cupiditate quae et reiciendis.', NULL, NULL, NULL, '313 ml', 20, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(7, 'Mayert-Russel Profit-focused well-modulated artificialintelligence', NULL, NULL, NULL, 'Reprehenderit aut possimus voluptas sit minima ex.', NULL, NULL, NULL, '698 ml', 24, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(8, 'Block-Bartell Fully-configurable nextgeneration processimprovement', NULL, NULL, NULL, 'Repudiandae voluptatem veritatis nam laborum ut voluptates.', NULL, NULL, NULL, '829 ml', 25, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(9, 'Windler, Larkin and Brakus Quality-focused intermediate synergy', NULL, NULL, NULL, 'Sint qui distinctio perspiciatis ut non et.', NULL, NULL, NULL, '480 ml', 49, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(10, 'Bauch and Sons Robust object-oriented algorithm', NULL, NULL, NULL, 'Repellendus et voluptas numquam quam sint fuga quo.', NULL, NULL, NULL, '618 ml', 9, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(11, 'Waters, Auer and Cummings Exclusive content-based model', NULL, NULL, NULL, 'Incidunt qui fugiat pariatur occaecati aut exercitationem molestiae aut a nostrum.', NULL, NULL, NULL, '650 ml', 18, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(12, 'Kreiger Inc Synchronised methodical knowledgeuser', NULL, NULL, NULL, 'Aut accusamus veritatis autem qui et quia dolor.', NULL, NULL, NULL, '895 ml', 16, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(13, 'Parker-Barton Robust reciprocal function', NULL, NULL, NULL, 'Minima aut et voluptas in iste beatae reprehenderit.', NULL, NULL, NULL, '930 ml', 31, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(14, 'Sawayn, Pollich and Greenholt Multi-layered executive synergy', NULL, NULL, NULL, 'Deserunt ratione saepe voluptatibus pariatur ratione et debitis rem eos eveniet quaerat recusandae.', NULL, NULL, NULL, '326 ml', 27, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(15, 'Auer, Mertz and Corkery Compatible user-facing functionalities', NULL, NULL, NULL, 'Iusto et eaque et et vel sed tenetur sit doloremque porro.', NULL, NULL, NULL, '834 ml', 6, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(16, 'Parker, Little and Graham Reactive system-worthy project', NULL, NULL, NULL, 'Quos officia asperiores velit aspernatur aut aut sit.', NULL, NULL, NULL, '653 ml', 13, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(17, 'Feeney Group Vision-oriented transitional policy', NULL, NULL, NULL, 'Distinctio nam vel quae ex maiores quis occaecati maiores et.', NULL, NULL, NULL, '465 ml', 31, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(18, 'Waelchi-Collier Polarised empowering blockchain', NULL, NULL, NULL, 'Voluptatem est nemo consequatur quas quas cum nostrum unde quis.', NULL, NULL, NULL, '739 ml', 11, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(19, 'Treutel, Rowe and Schumm Business-focused systematic help-desk', NULL, NULL, NULL, 'Consequatur dolorem qui dignissimos ratione animi dicta sit architecto voluptatem totam incidunt repellendus est.', NULL, NULL, NULL, '557 ml', 1, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(20, 'Boehm-Adams Seamless client-server firmware', NULL, NULL, NULL, 'Ut at rerum voluptas enim a tempora sunt aliquam quia officia quia aut aut.', NULL, NULL, NULL, '719 ml', 36, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(21, 'Balistreri, Mante and Abshire Vision-oriented analyzing project', NULL, NULL, NULL, 'Aut culpa adipisci quia facilis explicabo rerum dignissimos quidem.', NULL, NULL, NULL, '921 ml', 11, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(22, 'Murphy LLC Optimized modular paradigm', NULL, NULL, NULL, 'Harum praesentium consequatur eius a modi pariatur neque et et repellat qui maxime.', NULL, NULL, NULL, '908 ml', 12, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(23, 'Tillman Group Mandatory foreground hub', NULL, NULL, NULL, 'Dignissimos aut officiis ea vero iste eaque sed sit atque optio veniam hic.', NULL, NULL, NULL, '653 ml', 40, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(24, 'Jerde LLC Synergized bottom-line info-mediaries', NULL, NULL, NULL, 'Expedita voluptas porro porro possimus quia sint dolorem alias incidunt aut et.', NULL, NULL, NULL, '285 ml', 40, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(25, 'McDermott-Weissnat Secured clear-thinking encryption', NULL, NULL, NULL, 'Ipsam aut nulla eos repellat in voluptas minus in qui non perferendis repudiandae voluptates.', NULL, NULL, NULL, '986 ml', 23, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(26, 'Marquardt-Doyle Horizontal reciprocal flexibility', NULL, NULL, NULL, 'Animi officiis incidunt vero quos debitis eum ad doloribus.', NULL, NULL, NULL, '922 ml', 11, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(27, 'Ryan, Kiehn and Kihn Organic context-sensitive project', NULL, NULL, NULL, 'Deserunt nemo aspernatur qui deleniti adipisci tenetur vel ducimus veritatis et.', NULL, NULL, NULL, '272 ml', 8, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(28, 'Stamm Group Customizable systemic orchestration', NULL, NULL, NULL, 'Ab voluptatem doloribus sed qui quis et debitis atque doloremque sit odit.', NULL, NULL, NULL, '600 ml', 28, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(29, 'Streich Inc Integrated 6thgeneration data-warehouse', NULL, NULL, NULL, 'Quia dolorum pariatur ipsum ea sit placeat enim nostrum aliquam ea aperiam natus nam aliquam.', NULL, NULL, NULL, '552 ml', 20, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(30, 'DuBuque Ltd Multi-layered mobile attitude', NULL, NULL, NULL, 'Enim atque sed vel iure voluptatem velit et rerum quidem suscipit quibusdam.', NULL, NULL, NULL, '407 ml', 9, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(31, 'McCullough PLC Progressive composite knowledgebase', NULL, NULL, NULL, 'Provident a voluptatibus unde pariatur laborum aut nemo velit tenetur ratione nisi est laboriosam.', NULL, NULL, NULL, '558 ml', 29, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(32, 'Klocko, Legros and Senger Expanded secondary function', NULL, NULL, NULL, 'Occaecati aspernatur pariatur fuga eos qui reiciendis est culpa odio alias quasi ipsam.', NULL, NULL, NULL, '974 ml', 16, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(33, 'Walsh, Ratke and Will Ameliorated systematic infrastructure', NULL, NULL, NULL, 'Consequuntur tempora sit ex porro id qui aut.', NULL, NULL, NULL, '439 ml', 19, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(34, 'Smith Group Function-based secondary conglomeration', NULL, NULL, NULL, 'Eos debitis fugiat est eius hic inventore.', NULL, NULL, NULL, '421 ml', 1, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(35, 'Gottlieb-Padberg Profit-focused dynamic time-frame', NULL, NULL, NULL, 'Repellat ipsum provident eveniet molestiae corrupti numquam omnis.', NULL, NULL, NULL, '348 ml', 46, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(36, 'Sawayn-Luettgen Fundamental solution-oriented GraphicInterface', NULL, NULL, NULL, 'Ut ea dolorum ullam quia ea natus.', NULL, NULL, NULL, '686 ml', 3, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(37, 'Hermiston-Reynolds Upgradable uniform circuit', NULL, NULL, NULL, 'Tenetur maxime harum adipisci id distinctio similique qui et fugiat.', NULL, NULL, NULL, '767 ml', 35, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(38, 'Schaefer Group Assimilated full-range database', NULL, NULL, NULL, 'Quae quae esse voluptatem aut ipsum saepe iusto fuga porro eum ducimus vel autem.', NULL, NULL, NULL, '396 ml', 38, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(39, 'Krajcik-Schowalter Synchronised actuating migration', NULL, NULL, NULL, 'Odit consequuntur recusandae et amet repudiandae nesciunt facilis laborum iure repellat illum sit.', NULL, NULL, NULL, '279 ml', 42, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(40, 'Kuhn, Halvorson and Adams Monitored explicit product', NULL, NULL, NULL, 'Error et vel aut inventore rem minus est vel et voluptatibus aspernatur.', NULL, NULL, NULL, '572 ml', 22, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(41, 'Ernser Ltd De-engineered background securedline', NULL, NULL, NULL, 'Aut modi ducimus sit suscipit autem vero officia et error et rerum ducimus possimus.', NULL, NULL, NULL, '518 ml', 45, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(42, 'Larkin-Cassin Universal solution-oriented strategy', NULL, NULL, NULL, 'Ipsum eaque voluptas facere accusantium voluptates non quia impedit minus ratione.', NULL, NULL, NULL, '554 ml', 29, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(43, 'Kirlin, Wiegand and Auer Reactive optimal challenge', NULL, NULL, NULL, 'Qui inventore nobis omnis doloremque cum deleniti pariatur.', NULL, NULL, NULL, '948 ml', 41, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(44, 'Carroll-Bauch Team-oriented eco-centric customerloyalty', NULL, NULL, NULL, 'Quae nam repudiandae tenetur ut inventore odit.', NULL, NULL, NULL, '965 ml', 45, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(45, 'Mills-Kiehn Organized methodical product', NULL, NULL, NULL, 'Facilis veniam veritatis nihil est voluptates iste dolorem.', NULL, NULL, NULL, '747 ml', 1, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(46, 'Gulgowski, Wilderman and Bartell Self-enabling modular support', NULL, NULL, NULL, 'Quidem adipisci excepturi voluptas vitae doloremque deserunt molestiae sed odio id omnis eaque.', NULL, NULL, NULL, '258 ml', 16, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(47, 'Doyle Ltd Re-contextualized stable approach', NULL, NULL, NULL, 'Eum omnis et repellat omnis iste delectus aut voluptate laboriosam iusto minima dicta.', NULL, NULL, NULL, '627 ml', 38, 2, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(48, 'White-Wilderman Distributed content-based GraphicalUserInterface', NULL, NULL, NULL, 'Quasi eos tempora et laudantium esse doloribus quaerat.', NULL, NULL, NULL, '501 ml', 29, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(49, 'Roob, Gleichner and Bogan Cross-group value-added capacity', NULL, NULL, NULL, 'Omnis quas iste est quia earum rerum sunt pariatur.', NULL, NULL, NULL, '503 ml', 5, 3, '2023-03-07 23:01:36', '2023-03-07 23:01:36'),
(50, 'Bernier, Miller and Dooley Exclusive radical benchmark', NULL, NULL, NULL, 'Quo nam at ut voluptatum repudiandae aperiam enim dolorem quas inventore doloribus necessitatibus inventore sed.', NULL, NULL, NULL, '846 ml', 34, 1, '2023-03-07 23:01:36', '2023-03-07 23:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `celliers`
--

CREATE TABLE `celliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `bouteille_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liste_bouteilles`
--

CREATE TABLE `liste_bouteilles` (
  `bouteille_id` bigint(20) UNSIGNED NOT NULL,
  `cellier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_07_150050_create_permissions_table', 1),
(5, '2023_03_07_150051_create_users_table', 1),
(6, '2023_03_07_150302_create_celliers_table', 1),
(7, '2023_03_07_150323_create_provenances_table', 1),
(8, '2023_03_07_150345_create_types_table', 1),
(9, '2023_03_07_150444_create_bouteilles_table', 1),
(10, '2023_03_07_150503_create_liste_bouteilles_table', 1),
(11, '2023_03_07_150520_create_notes_table', 1),
(12, '2023_03_07_150535_create_commentaires_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note` int(11) NOT NULL,
  `bouteille_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'utilisateur', NULL, NULL),
(2, 'administrateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provenances`
--

CREATE TABLE `provenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pays` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provenances`
--

INSERT INTO `provenances` (`id`, `pays`, `created_at`, `updated_at`) VALUES
(1, 'Liberia', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(2, 'Hong Kong', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(3, 'Macedonia', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(4, 'Botswana', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(5, 'Swaziland', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(6, 'French Guiana', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(7, 'Liechtenstein', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(8, 'Japan', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(9, 'Nigeria', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(10, 'Pitcairn Islands', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(11, 'Portugal', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(12, 'British Indian Ocean Territory (Chagos Archipelago)', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(13, 'Bosnia and Herzegovina', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(14, 'Hong Kong', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(15, 'Belarus', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(16, 'Tuvalu', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(17, 'Samoa', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(18, 'Cuba', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(19, 'Philippines', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(20, 'Falkland Islands (Malvinas)', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(21, 'Turks and Caicos Islands', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(22, 'Greenland', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(23, 'Saint Pierre and Miquelon', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(24, 'Costa Rica', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(25, 'Kiribati', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(26, 'Ethiopia', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(27, 'Equatorial Guinea', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(28, 'Northern Mariana Islands', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(29, 'Central African Republic', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(30, 'Honduras', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(31, 'Saudi Arabia', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(32, 'Jersey', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(33, 'Lesotho', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(34, 'Guyana', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(35, 'Palau', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(36, 'Oman', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(37, 'Dominica', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(38, 'Tanzania', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(39, 'Saint Martin', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(40, 'Palestinian Territories', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(41, 'Lebanon', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(42, 'Japan', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(43, 'Japan', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(44, 'Greece', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(45, 'India', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(46, 'Malta', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(47, 'Iraq', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(48, 'Nicaragua', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(49, 'Martinique', '2023-03-07 22:44:55', '2023-03-07 22:44:55'),
(50, 'Kenya', '2023-03-07 22:44:55', '2023-03-07 22:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Vin rouge', NULL, NULL),
(2, 'Vin blanc', NULL, NULL),
(3, 'Vin rosé', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bouteilles`
--
ALTER TABLE `bouteilles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bouteilles_provenance_id_foreign` (`provenance_id`),
  ADD KEY `bouteilles_type_id_foreign` (`type_id`);

--
-- Indexes for table `celliers`
--
ALTER TABLE `celliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `celliers_user_id_foreign` (`user_id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_bouteille_id_foreign` (`bouteille_id`),
  ADD KEY `commentaires_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `liste_bouteilles`
--
ALTER TABLE `liste_bouteilles`
  ADD PRIMARY KEY (`bouteille_id`,`cellier_id`),
  ADD KEY `liste_bouteilles_cellier_id_foreign` (`cellier_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`bouteille_id`,`user_id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provenances`
--
ALTER TABLE `provenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bouteilles`
--
ALTER TABLE `bouteilles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `celliers`
--
ALTER TABLE `celliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provenances`
--
ALTER TABLE `provenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bouteilles`
--
ALTER TABLE `bouteilles`
  ADD CONSTRAINT `bouteilles_provenance_id_foreign` FOREIGN KEY (`provenance_id`) REFERENCES `provenances` (`id`),
  ADD CONSTRAINT `bouteilles_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `celliers`
--
ALTER TABLE `celliers`
  ADD CONSTRAINT `celliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `liste_bouteilles`
--
ALTER TABLE `liste_bouteilles`
  ADD CONSTRAINT `liste_bouteilles_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `liste_bouteilles_cellier_id_foreign` FOREIGN KEY (`cellier_id`) REFERENCES `celliers` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
