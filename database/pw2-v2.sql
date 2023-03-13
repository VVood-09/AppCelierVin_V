-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 mars 2023 à 14:20
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pw2`
--

-- --------------------------------------------------------

--
-- Structure de la table `bouteilles`
--

CREATE TABLE `bouteilles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_saq` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `url_saq` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bouteilles`
--

INSERT INTO `bouteilles` (`id`, `nom`, `image`, `code_saq`, `pays`, `description`, `prix`, `url_saq`, `format`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Pfannerstill and Sons Future-proofed interactive firmware', NULL, NULL, 'Andorra', 'Autem excepturi rerum dolores minus sequi optio eum illum ex.', '3', NULL, '847 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(2, 'Grimes Inc Expanded discrete knowledgeuser', NULL, NULL, 'Sierra Leone', 'Non quis sit sunt sunt beatae et inventore esse ratione et minus maxime.', '0', NULL, '321 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(3, 'Kuvalis, Durgan and Bruen Organized zerodefect benchmark', NULL, NULL, 'Macedonia', 'Impedit et qui consequatur minima beatae nostrum accusantium reprehenderit vel omnis.', '6', NULL, '851 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(4, 'Littel-Boehm Stand-alone global access', NULL, NULL, 'Iceland', 'Quos nulla voluptatem eveniet rerum ut aspernatur commodi vel tenetur excepturi aut.', '6', NULL, '605 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(5, 'Predovic, Brown and Hessel Down-sized nextgeneration application', NULL, NULL, 'United Kingdom', 'Odit quo natus quis vel provident fugit hic laudantium deserunt vel.', '5', NULL, '842 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(6, 'Hyatt-Schiller Facetoface 24/7 time-frame', NULL, NULL, 'South Africa', 'Suscipit consequatur asperiores reiciendis vitae qui deleniti dolorem.', '4', NULL, '811 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(7, 'Gutmann-Gorczany Focused multimedia systemengine', NULL, NULL, 'Brunei Darussalam', 'Quasi quae aut sed enim non expedita dolor iusto fugiat.', '9', NULL, '532 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(8, 'Ratke, Schimmel and Wolf Adaptive disintermediate time-frame', NULL, NULL, 'Algeria', 'Nostrum facere nobis nemo veritatis doloremque molestiae veritatis praesentium porro.', '3', NULL, '831 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(9, 'Hane Group Seamless uniform productivity', NULL, NULL, 'Suriname', 'Consequuntur corporis accusantium perspiciatis dicta quisquam nihil nemo ut impedit quis et sequi quibusdam.', '0', NULL, '953 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(10, 'Gleason, Reichel and Corwin Polarised contextually-based analyzer', NULL, NULL, 'Bermuda', 'Laborum amet culpa vitae corporis hic nam necessitatibus aliquam sed ut.', '6', NULL, '547 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(11, 'Harris-Wiza Automated heuristic capacity', NULL, NULL, 'Lesotho', 'Illum quidem et enim at nostrum aut.', '5', NULL, '812 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(12, 'Hoppe, Toy and Friesen Mandatory even-keeled challenge', NULL, NULL, 'Burkina Faso', 'Doloribus rerum sed aliquid velit delectus nihil nisi et aut inventore dolorem.', '5', NULL, '470 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(13, 'Schultz-Goldner User-centric 3rdgeneration moderator', NULL, NULL, 'Sweden', 'Incidunt optio ut enim commodi eos corrupti nostrum cumque amet sed enim laudantium.', '3', NULL, '970 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(14, 'Stracke, Ziemann and Aufderhar De-engineered object-oriented hierarchy', NULL, NULL, 'Cameroon', 'Delectus a sit rerum nostrum commodi earum voluptatem ipsum dolore nostrum corporis excepturi consequatur.', '4', NULL, '931 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(15, 'Lang, Haag and Jacobs Synchronised system-worthy methodology', NULL, NULL, 'Christmas Island', 'Incidunt tempora in ut in similique rem.', '9', NULL, '312 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(16, 'Rohan, Parker and Turcotte Focused multimedia implementation', NULL, NULL, 'Morocco', 'Consequatur culpa quia minima non dolorum quidem maiores eos quia.', '5', NULL, '998 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(17, 'Dooley-Kemmer Function-based stable adapter', NULL, NULL, 'Cuba', 'Voluptas neque aut ut eos voluptatem cumque et aut.', '7', NULL, '259 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(18, 'Waelchi Inc Exclusive modular collaboration', NULL, NULL, 'Guatemala', 'Ea sunt rerum non illo ullam et quos velit.', '2', NULL, '545 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(19, 'Mitchell-Paucek Exclusive needs-based knowledgeuser', NULL, NULL, 'Tanzania', 'Molestias minus voluptas quis nobis iste atque aliquid.', '0', NULL, '316 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(20, 'McDermott PLC Profit-focused upward-trending GraphicalUserInterface', NULL, NULL, 'Cyprus', 'Voluptas tempora eos sapiente rerum esse aut dolorem voluptas.', '0', NULL, '334 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(21, 'Parisian, Spinka and Lemke Versatile assymetric framework', NULL, NULL, 'South Africa', 'Itaque sit velit provident odio consequatur sit inventore eum autem eum repellendus consequuntur.', '8', NULL, '615 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(22, 'Heathcote Ltd Multi-channelled hybrid challenge', NULL, NULL, 'Turkmenistan', 'Totam quibusdam similique itaque ut porro eaque voluptatem.', '0', NULL, '591 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(23, 'Paucek-Powlowski De-engineered composite alliance', NULL, NULL, 'Angola', 'Praesentium ipsa sit odio ut minima libero recusandae laborum est iure voluptas sunt.', '2', NULL, '522 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(24, 'Muller LLC Polarised didactic service-desk', NULL, NULL, 'Nigeria', 'Et rerum ea quas sit officiis quasi provident.', '1', NULL, '858 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(25, 'Cummings, Pfannerstill and Keeling Front-line transitional complexity', NULL, NULL, 'Malta', 'Maiores ut mollitia fugiat qui voluptatem odio architecto.', '7', NULL, '417 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(26, 'Harber-Braun Adaptive motivating data-warehouse', NULL, NULL, 'Ukraine', 'Quo consequuntur quia consequuntur placeat praesentium autem.', '3', NULL, '632 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(27, 'Daugherty LLC Vision-oriented zerodefect definition', NULL, NULL, 'Jordan', 'Sit facere quaerat nihil blanditiis qui repellat vel.', '0', NULL, '492 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(28, 'Bechtelar and Sons Phased full-range software', NULL, NULL, 'French Polynesia', 'Facere autem odit delectus omnis aliquam aut quia dolore impedit reprehenderit.', '6', NULL, '369 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(29, 'Haley, Wilkinson and Kulas Cross-platform attitude-oriented parallelism', NULL, NULL, 'Nepal', 'Doloribus quod porro est nostrum laboriosam dolore fuga vero et magnam dicta nihil molestiae.', '7', NULL, '569 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(30, 'Runolfsdottir Ltd Triple-buffered secondary hierarchy', NULL, NULL, 'Saudi Arabia', 'Quis eius eaque debitis doloribus nihil occaecati omnis aut error reprehenderit eaque sit aut.', '5', NULL, '735 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(31, 'Smitham-Labadie Customizable client-server implementation', NULL, NULL, 'Grenada', 'Aspernatur nihil sunt dolor et ipsa fugiat earum aperiam eaque assumenda eos.', '6', NULL, '907 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(32, 'Runolfsson, Jakubowski and Konopelski Profit-focused interactive help-desk', NULL, NULL, 'British Indian Ocean Territory (Chagos Archipelago)', 'Fugiat et voluptas sequi unde quo sunt vero aliquam voluptas.', '6', NULL, '776 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(33, 'Vandervort LLC Decentralized upward-trending projection', NULL, NULL, 'Fiji', 'Repellat veniam molestias iure ratione ipsum reiciendis.', '2', NULL, '815 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(34, 'Skiles-Greenfelder Fundamental methodical database', NULL, NULL, 'Macedonia', 'Doloremque quae aut et quia repellat magni autem repellendus laborum.', '0', NULL, '304 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(35, 'Yost-Keebler Function-based leadingedge frame', NULL, NULL, 'Guatemala', 'Repellendus repellat beatae rerum at eaque quo.', '9', NULL, '392 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(36, 'Schiller, Schuppe and Balistreri Reactive multimedia parallelism', NULL, NULL, 'Togo', 'Minus quis ipsa id pariatur velit quis aut sunt consequatur recusandae voluptatem perspiciatis.', '8', NULL, '451 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(37, 'Turcotte-Cassin Advanced explicit strategy', NULL, NULL, 'Timor-Leste', 'Quaerat aspernatur repellat amet laboriosam numquam consequatur.', '2', NULL, '998 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(38, 'Hansen-Wilderman Compatible tertiary pricingstructure', NULL, NULL, 'Uganda', 'Cupiditate consequatur assumenda necessitatibus in sint voluptates aut.', '4', NULL, '385 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(39, 'Emard Group Centralized intermediate artificialintelligence', NULL, NULL, 'South Africa', 'Id est et totam vel sunt labore animi.', '3', NULL, '267 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(40, 'Jakubowski, Hill and Baumbach Ergonomic empowering access', NULL, NULL, 'Paraguay', 'Aut dicta eos aut ut eaque et mollitia distinctio ut soluta.', '4', NULL, '374 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(41, 'O\'Hara Group Implemented optimizing solution', NULL, NULL, 'Zimbabwe', 'Ea placeat atque excepturi libero perspiciatis eveniet necessitatibus voluptatem nihil quasi voluptas et vel.', '8', NULL, '871 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(42, 'Tromp Group Function-based full-range paradigm', NULL, NULL, 'Libyan Arab Jamahiriya', 'Enim quaerat culpa beatae hic dolorem velit.', '7', NULL, '858 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(43, 'Metz Inc Innovative systematic focusgroup', NULL, NULL, 'Canada', 'Excepturi atque accusantium qui amet quo repellendus ullam minus voluptas corporis.', '2', NULL, '319 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(44, 'Kris, Schaden and Goldner Future-proofed reciprocal instructionset', NULL, NULL, 'Thailand', 'Voluptas neque sunt quis inventore et quae fuga ut molestiae.', '2', NULL, '334 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(45, 'Greenholt and Sons Switchable analyzing securedline', NULL, NULL, 'Moldova', 'Perferendis consequuntur architecto repellendus quis occaecati amet rerum consequatur sapiente.', '2', NULL, '567 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(46, 'Reichert, Ankunding and Harber Visionary background knowledgeuser', NULL, NULL, 'Martinique', 'Sint dolorem qui aut ducimus nihil magnam voluptates recusandae quis aut.', '7', NULL, '361 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(47, 'Friesen, Smitham and Jones Proactive hybrid function', NULL, NULL, 'Venezuela', 'Deserunt est corrupti atque dolore reiciendis maxime eligendi repellendus aut.', '1', NULL, '310 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(48, 'Robel, McGlynn and Heathcote Future-proofed even-keeled focusgroup', NULL, NULL, 'Niue', 'Et quisquam laborum incidunt dolore veritatis veniam incidunt omnis.', '4', NULL, '986 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(49, 'Heidenreich, Lakin and Runte Progressive incremental artificialintelligence', NULL, NULL, 'Australia', 'Id impedit qui saepe voluptate odio esse placeat voluptatem.', '7', NULL, '348 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(50, 'Romaguera, Bailey and Ebert Sharable human-resource website', NULL, NULL, 'Yemen', 'Aut nulla voluptatem ut deserunt quia qui error eligendi animi quis.', '5', NULL, '325 ml', NULL, '2023-03-10 03:05:14', '2023-03-10 03:05:14'),
(69, '19 Crimes Cabernet-Sauvignon Limestone Coast', 'https://www.saq.com/media/catalog/product/1/2/12824197-1_1578411313.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '12824197', 'Australie', 'Pastille de goût : Aromatique et charnu', NULL, 'https://www.saq.com/fr/12824197', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(70, '19 Crimes Shiraz/Grenache/Mataro', 'https://www.saq.com/media/catalog/product/1/2/12073995-1_1643120137.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '12073995', 'Australie', 'Pastille de goût : Aromatique et souple', NULL, 'https://www.saq.com/fr/12073995', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(71, '655 Miles Cabernet Sauvignon Lodi', 'https://www.saq.com/media/catalog/product/1/4/14139863-1_1578552320.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14139863', 'États-Unis', 'Pastille de goût : Aromatique et souple', NULL, 'https://www.saq.com/fr/14139863', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(72, 'A&D Wines Monologo Arinto P24 2022', 'https://www.saq.com/media/catalog/product/1/4/14296666-1_1580258418.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14296666', 'Portugal', 'A&D Wines Monologo Arinto P24', NULL, 'https://www.saq.com/fr/14296666', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(73, 'AA Badenhorst Riviera Secateurs Swartland 2021', 'https://www.saq.com/media/catalog/product/1/3/13995027-1_1659561948.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '13995027', 'Afrique du Sud', 'AA Badenhorst Riviera Secateurs Swartland', NULL, 'https://www.saq.com/fr/13995027', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(74, 'Adega de Pegões Colheita Seleccionada IGP Peninsula de Setubal', 'https://www.saq.com/media/catalog/product/1/0/10838801-1_1640276466.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '10838801', 'Portugal', 'Pastille de goût : Aromatique et rond', NULL, 'https://www.saq.com/fr/10838801', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(75, 'Adega de Penalva Dão', 'https://www.saq.com/media/catalog/product/1/3/13746485-1_1578541826.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '13746485', 'Portugal', 'Pastille de goût : Fruité et généreux', NULL, 'https://www.saq.com/fr/13746485', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(76, 'Adega de Penalva Dão 2021', 'https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '12728904', 'Portugal', 'Pastille de goût : Fruité et vif', NULL, 'https://www.saq.com/fr/12728904', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(77, 'Adega de Penalva Maceration pelliculaire Dão 2021', 'https://www.saq.com/media/catalog/product/1/3/13844317-1_1578543322.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '13844317', 'Portugal', 'Pastille de goût : Fruité et vif', NULL, 'https://www.saq.com/fr/13844317', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(78, 'Agnes Paquet Bourgogne Pinot noir Le Croquamots 2020', 'https://www.saq.com/media/catalog/product/1/1/11510268-1_1580622325.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '11510268', 'France', 'Agnes Paquet Bourgogne Pinot noir Le Croquamots', NULL, 'https://www.saq.com/fr/11510268', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(79, 'Agterpaaie Swartland 2020', 'https://www.saq.com/media/catalog/product/1/5/15071477-1_1671814258.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '15071477', 'Afrique du Sud', 'Pastille de goût : Aromatique et souple', NULL, 'https://www.saq.com/fr/15071477', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(80, 'Alain Brumont La Gascogne', 'https://www.saq.com/media/catalog/product/1/3/13950347-1_1605819950.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '13950347', 'France', 'Pastille de goût : Fruité et vif', NULL, 'https://www.saq.com/fr/13950347', '3 L', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(81, 'Alain Brumont Madiran Tour Bouscassé 2019', 'https://www.saq.com/media/catalog/product/1/2/12284303-1_1639701932.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '12284303', 'France', 'Pastille de goût : Aromatique et charnu', NULL, 'https://www.saq.com/fr/12284303', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(82, 'Alain Chavy Puligny Montrachet 2020', 'https://www.saq.com/media/catalog/product/1/5/15020602-1_1677084658.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '15020602', 'France', 'Alain Chavy Puligny Montrachet', NULL, 'https://www.saq.com/fr/15020602', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(83, 'Alain Chavy Saint-Aubin Premier Cru En Remilly 2020', 'https://www.saq.com/media/catalog/product/1/5/15020629-1_1675890353.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '15020629', 'France', 'Alain Chavy Saint-Aubin Premier Cru En Remilly', NULL, 'https://www.saq.com/fr/15020629', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(84, 'Alain Lorieux Chinon Expression 2019', 'https://www.saq.com/media/catalog/product/8/7/873257-1_1629320456.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '873257', 'France', 'Alain Lorieux Chinon Expression', NULL, 'https://www.saq.com/fr/873257', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(85, 'Alastro Planeta Sicilia 2021', 'https://www.saq.com/media/catalog/product/1/4/14475242-1_1592505014.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14475242', 'Italie', 'Alastro Planeta Sicilia', NULL, 'https://www.saq.com/fr/14475242', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(86, 'Albert Mann Riesling Grand Cru Furstentum 2019', 'https://www.saq.com/media/catalog/product/1/4/14526011-1_1661976051.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14526011', 'France', 'Albert Mann Riesling Grand Cru Furstentum', NULL, 'https://www.saq.com/fr/14526011', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(87, 'Aldo Conterno Conca Tre Pile 2019', 'https://www.saq.com/media/catalog/product/1/4/14581985-1_1604421791.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14581985', 'Italie', 'Aldo Conterno Conca Tre Pile', NULL, 'https://www.saq.com/fr/14581985', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(88, 'Aldo Conterno Langhe Quartetto 2019', 'https://www.saq.com/media/catalog/product/1/5/15031310-1_1674681963.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '15031310', 'Italie', 'Aldo Conterno Langhe Quartetto', NULL, 'https://www.saq.com/fr/15031310', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(89, 'Alex Foillard Beaujolais Villages 2021', 'https://www.saq.com/media/catalog/product/1/4/14786198-1_1639503353.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '14786198', 'France', 'Alex Foillard Beaujolais Villages', NULL, 'https://www.saq.com/fr/14786198', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(90, 'Alias Croizet-Bages Pauillac 2019', 'https://www.saq.com/media/catalog/product/1/5/15036014-1_1667404562.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '15036014', 'France', 'Alias Croizet-Bages Pauillac', NULL, 'https://www.saq.com/fr/15036014', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(91, 'Alma Negra M Blend Mendoza 2019', 'https://www.saq.com/media/catalog/product/1/1/11156895-1_1580613917.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '11156895', 'Argentine', 'Pastille de goût : Aromatique et charnu', NULL, 'https://www.saq.com/fr/11156895', '750 ml', 'Vin rouge', '2023-03-11 00:30:25', '2023-03-11 00:30:25'),
(92, 'Alois Lageder Riff delle Venezie 2021', 'https://www.saq.com/media/catalog/product/1/3/13897427-1_1659561948.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166', '13897427', 'Italie', 'Alois Lageder Riff delle Venezie', NULL, 'https://www.saq.com/fr/13897427', '750 ml', 'Vin blanc', '2023-03-11 00:30:25', '2023-03-11 00:30:25');

-- --------------------------------------------------------

--
-- Structure de la table `celliers`
--

CREATE TABLE `celliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bouteille_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_bouteilles`
--

CREATE TABLE `liste_bouteilles` (
  `bouteille_id` bigint(20) UNSIGNED NOT NULL,
  `cellier_id` bigint(20) UNSIGNED NOT NULL,
  `qte` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_100000_create_password_resets_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2023_03_07_150050_create_permissions_table', 1),
(35, '2023_03_07_150051_create_users_table', 1),
(36, '2023_03_07_150302_create_celliers_table', 1),
(37, '2023_03_07_150323_create_provenances_table', 1),
(38, '2023_03_07_150345_create_types_table', 1),
(39, '2023_03_07_150444_create_bouteilles_table', 1),
(40, '2023_03_07_150503_create_liste_bouteilles_table', 1),
(41, '2023_03_07_150520_create_notes_table', 1),
(42, '2023_03_07_150535_create_commentaires_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
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
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'utilisateur', NULL, NULL),
(2, 'administration', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `provenances`
--

CREATE TABLE `provenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pays` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `permission_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pénélope Ducharme', 'penelope@gmail.com', NULL, '$2y$10$Blgo6P/RTD9NEXM/b.lXEeZ/K.EZgLVVDXreB5/q1xskY59VoCzSG', 1, NULL, '2023-03-10 03:05:53', '2023-03-10 03:05:53');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bouteilles`
--
ALTER TABLE `bouteilles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `celliers`
--
ALTER TABLE `celliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `celliers_user_id_foreign` (`user_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_bouteille_id_foreign` (`bouteille_id`),
  ADD KEY `commentaires_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `liste_bouteilles`
--
ALTER TABLE `liste_bouteilles`
  ADD PRIMARY KEY (`bouteille_id`,`cellier_id`),
  ADD KEY `liste_bouteilles_cellier_id_foreign` (`cellier_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`bouteille_id`,`user_id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `provenances`
--
ALTER TABLE `provenances`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bouteilles`
--
ALTER TABLE `bouteilles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `celliers`
--
ALTER TABLE `celliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `provenances`
--
ALTER TABLE `provenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `celliers`
--
ALTER TABLE `celliers`
  ADD CONSTRAINT `celliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `liste_bouteilles`
--
ALTER TABLE `liste_bouteilles`
  ADD CONSTRAINT `liste_bouteilles_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `liste_bouteilles_cellier_id_foreign` FOREIGN KEY (`cellier_id`) REFERENCES `celliers` (`id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_bouteille_id_foreign` FOREIGN KEY (`bouteille_id`) REFERENCES `bouteilles` (`id`),
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
