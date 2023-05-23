-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 nov. 2022 à 19:54
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `egest`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `designation` varchar(300) NOT NULL,
  `quantite` int(12) NOT NULL,
  `typeart` int(11) NOT NULL,
  `stocksecu` int(10) NOT NULL,
  `unite` int(11) NOT NULL,
  `prixachat` int(11) NOT NULL,
  `prixvente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `reference`, `designation`, `quantite`, `typeart`, `stocksecu`, `unite`, `prixachat`, `prixvente`) VALUES
(1, 'A1', 'Poignet droite HJ 125', 2, 1, 5, 3, 5000, 5000),
(2, 'A2', 'Poignet gauche HJ 125', 2, 1, 10, 1, 6000, 6000),
(3, 'A3', 'Cable compteur HJ 125', 0, 1, 15, 1, 2500, 2500),
(4, 'A4', 'Cable gaz TZ', 0, 1, 15, 1, 2000, 2000),
(5, 'A5', 'Patin HJ 110', 0, 1, 5, 1, 2000, 2000),
(6, 'A6', 'Patin AR HJ 125', 0, 1, 5, 1, 2500, 2500),
(7, 'A7', 'Dent chaîne Complet 110', 4, 1, 6, 1, 7000, 7000),
(8, 'A8', 'Dent chaîne Complet UH', 0, 1, 9, 1, 7500, 7500),
(9, 'A9', 'Dent chaîne Complet 150-9', 3, 1, 3, 1, 10000, 10000),
(10, 'A10', 'Dent chaîne HJ KA', 5, 1, 5, 1, 10000, 10000),
(11, 'A11', 'Fourche DM HJ 125', 0, 1, 3, 1, 25000, 25000),
(12, 'A12', 'Fourche DMS HJ 125', 2, 1, 2, 1, 25000, 25000),
(13, 'A13', 'Fourche Xpress 125', 4, 1, 4, 1, 32000, 32000),
(14, 'A14', 'Fourche HJ 125-8', 3, 1, 3, 1, 24000, 24000),
(15, 'A15', 'Amortisseur HJ 110', 0, 1, 1, 1, 14000, 14000),
(16, 'A16', 'Fourche HJ 110-6', 0, 1, 1, 1, 12000, 12000),
(17, 'A17', 'Fourche HJ 110-5', 5, 1, 3, 1, 11000, 11000),
(18, 'A18', 'Rétroviseur HJ 125', 0, 1, 3, 1, 6000, 6000),
(19, 'A19', 'Rétroviseur HJ', 0, 1, 2, 1, 5000, 5000),
(20, 'A20', 'Cable frein HLX', 3, 1, 3, 2, 1000, 1000),
(21, 'A21', 'Cable gaz Néo', 3, 1, 3, 1, 1200, 1200),
(22, 'A22', 'Cable embrayage Rock Z', 2, 1, 2, 1, 1500, 1500),
(23, 'A23', 'Chaine motrice Néo | Rock Z | HLX', 5, 1, 5, 1, 2500, 2500),
(24, 'A24', 'Cable compteur Apache', 5, 1, 5, 1, 6000, 6000),
(25, 'A24', 'Plastique vert Apache', 2, 1, 2, 1, 500, 500),
(26, 'A26', 'Vilbricaine HJ 125', 2, 1, 2, 1, 23000, 23000),
(27, 'A27', 'Filtre a huile Apache', 0, 1, 10, 1, 700, 700),
(28, 'A28', 'Rétroviseur Apache', 5, 1, 5, 1, 2500, 2500),
(29, 'A29', 'Rétroviseur Néo', 2, 1, 5, 1, 1500, 1500),
(30, 'A30', 'Amortisseur arrière Apache', 1, 1, 2, 1, 15000, 15000),
(31, 'A31', 'Filtre Apsonic 175', 1, 1, 1, 1, 4500, 4500),
(32, 'A32', 'Cable gaz Apsonic ', 4, 1, 2, 1, 1000, 1000),
(33, 'A33', 'Chargeur HLX 125', 2, 1, 2, 1, 5000, 5000),
(34, 'A34', 'Pose Pied AV Apache', 5, 1, 5, 1, 2500, 2500),
(35, 'A35', 'Pose Pied AR Apache', 2, 1, 2, 1, 2500, 2500),
(36, 'A36', 'Bille guidon HLX 125', 2, 1, 2, 1, 2500, 2500),
(37, 'A37', 'Casque AP', 0, 1, 10, 1, 5000, 5000),
(38, 'A38', 'Casque HJ', 15, 1, 5, 1, 6000, 6000),
(39, 'A39', 'Imperméable Apsonic', 24, 1, 10, 1, 2000, 2000),
(40, 'A40', 'Chaine motrice Apache', 5, 1, 5, 1, 5000, 5000),
(41, 'A41', 'Patin Avant Apache', 6, 1, 3, 1, 3000, 3000),
(42, 'A42', 'Clignontant droit Apache', 2, 1, 2, 1, 2500, 2500),
(43, 'A43', 'Clignontan gauche Néo', 0, 1, 1, 1, 4500, 4500),
(44, 'A44', 'Joint disque Apache', 1, 1, 10, 1, 500, 500),
(45, 'A45', 'Ecrou vidange TVS', 1, 1, 2, 1, 500, 500),
(46, 'A46', 'Soupape P Néo', 11, 1, 5, 1, 2500, 2500),
(47, 'A47', 'Soupape G Néo', 3, 1, 3, 1, 2500, 2500),
(48, 'A48', 'Soupape P Moto 100', 4, 1, 2, 1, 1500, 1500),
(49, 'A49', 'Soupape G Moto 100', 0, 1, 2, 1, 1000, 1000),
(50, 'A50', 'Soupape P Apache', 3, 1, 3, 1, 3000, 3000),
(51, 'A51', 'Soupape G Apache', 3, 1, 3, 1, 3000, 3000),
(52, 'A52', 'Piston Néo', 1, 1, 2, 1, 5000, 5000),
(53, 'A53', 'Piston HLX 100', 1, 1, 2, 1, 3500, 3500),
(54, 'A54', 'Piston HLX 125', 3, 1, 3, 1, 3500, 3500),
(55, 'A55', 'Piston ++ Apache 160', 0, 1, 2, 1, 10000, 10000),
(56, 'A56', 'Piston ++ Apache 180', 4, 1, 3, 1, 10000, 10000),
(57, 'A57', 'Piston + Apache 160', 3, 1, 2, 1, 10000, 10000),
(58, 'A58', 'Joint coté disque HLX 125', 4, 1, 3, 1, 500, 500),
(59, 'A59', 'Cable gaz HLX 125', 2, 1, 2, 1, 1000, 1000),
(60, 'A60', 'Cable embrayage Apache ', 8, 1, 5, 1, 1500, 1500),
(61, 'A61', 'Cable gaz Apache ', 1, 1, 3, 1, 1000, 1000),
(62, 'A62', 'Cable embrayage HLX 125', 4, 1, 3, 1, 1000, 1000),
(63, 'A63', 'Cable gaz Moto 100', 5, 1, 5, 1, 1000, 1000),
(64, 'A64', 'Cable embrayage Moto 100', 3, 1, 3, 1, 1000, 1000),
(65, 'A', 'Boite a Reverse AP 175', 3, 1, 3, 2, 19000, 19000),
(66, 'A', 'Moteur AP 150', 3, 1, 3, 3, 160000, 160000),
(67, 'A', 'Moteur AP 175', 2, 1, 2, 2, 170000, 170000),
(68, 'A', 'Clé Contact HJ 110-5', 3, 1, 3, 2, 10000, 10000),
(69, 'A', 'Clé Contact HJ TZ Pro', 2, 1, 2, 2, 11000, 11000),
(70, 'A', 'Clé Contact HJ DM', 0, 1, 2, 2, 11000, 11000),
(71, 'A', 'Clé Contact X Press', 0, 1, 1, 2, 7000, 7000),
(72, 'A', 'Chargeur HJ 125', 1, 1, 2, 2, 4500, 4500),
(73, 'A', 'Rétroviseur HJ 115 UH', 6, 1, 6, 1, 6000, 6000),
(74, 'A', 'Rétroviseur HJ 110-6', 11, 1, 4, 2, 5000, 5000),
(75, 'A', 'Huile a Moteur SANYA', 97, 1, 2, 6, 2500, 2500),
(76, 'A', 'Huile a Moteur AP', 300, 1, 2, 6, 2700, 2700),
(77, 'A', 'Huile a Moteur HJ', 40, 1, 20, 6, 3500, 3500),
(78, 'A', 'Huile a Moteur True 4', 536, 1, 2, 6, 3500, 3500),
(79, 'A', 'Cylindre Apache 160', 2, 1, 2, 2, 30000, 30000),
(80, 'A', 'Cylindre Apache 180', 2, 1, 2, 2, 30000, 30000),
(81, 'A', 'Carburateur Moto 100 TVS', 1, 1, 2, 1, 15000, 15000),
(82, 'A', 'Carburateur Moto Rock Z', 1, 1, 2, 3, 18000, 18000),
(83, 'A', 'Carburateur Apache ', 1, 1, 1, 1, 35000, 35000),
(84, 'A', 'Cylindre Moto 100/KS', 0, 1, 1, 1, 12000, 12000),
(85, 'A', 'Bache king TVS', 1, 1, 2, 1, 25000, 25000),
(86, 'A', 'Couvre Chaîne Néo', 1, 1, 1, 1, 2500, 2500),
(87, 'a10', 'Clignontant HJ 110-6', 0, 1, 1, 1, 1500, 1500),
(88, '', 'Clignontant avant 110-6', 0, 1, 2, 3, 4500, 4500),
(89, '', 'Clignontant avant UH', 0, 1, 2, 1, 4500, 4500),
(90, '', 'Clignontant avant UH', 0, 1, 2, 1, 4500, 4500),
(91, '', 'Clignontant arriere HJ', 0, 1, 2, 3, 4000, 4000),
(92, '', 'Foreaux HJ 110', 0, 1, 2, 1, 2000, 2000),
(93, '', 'Feux stop arriere HJ 110-6', 2, 1, 2, 1, 3500, 3500),
(94, '', 'Feux stop arriere HJ 110-2', 2, 1, 2, 1, 8000, 8000),
(95, '', 'Feux stop arriere HJ TZ Pro', 3, 1, 2, 1, 6000, 6000),
(96, '', 'Globe phare TZ Pro', 2, 1, 2, 1, 5000, 5000),
(97, '', 'Feux stop arriere 125-8', 2, 1, 2, 1, 8000, 8000),
(98, '', 'Pose Pied HJ TZ Central', 3, 1, 2, 1, 5000, 5000),
(99, '', 'Pose Pied HJ TZ ', 0, 1, 2, 1, 1500, 1500),
(100, '', 'Cylindre HJ 110-5', 2, 1, 2, 1, 17000, 17000),
(101, '', 'Cylindre HJ 110-3', 0, 1, 2, 1, 17000, 17000),
(102, '', 'Ampoule Feux stop 110 HJ', 10, 1, 2, 1, 600, 600),
(103, '', 'Ampoule Feux stop arriere 110-2', 0, 1, 2, 1, 200, 200),
(104, '', 'Manette droite HJ 125', 0, 1, 2, 1, 6000, 6000),
(105, '', 'Alarme HJ 115 UH', 1, 1, 1, 1, 17000, 17000),
(106, '', 'Bobine d\'allumage HJ 125', 6, 1, 2, 1, 7000, 7000),
(107, '', 'Feux stop arriere UH 115', 1, 1, 2, 1, 8000, 8000),
(108, '', 'Chaine motrice HJ 150-9', 2, 1, 2, 1, 7000, 7000),
(109, '', 'Patin arriere TVS 125', 0, 1, 2, 1, 2000, 2000),
(110, '', 'Patin arriere TVS 110', 26, 1, 2, 1, 2000, 2000),
(111, '', 'Gomme Pose Pied HJ 110', 7, 1, 2, 1, 1000, 1000),
(112, '', 'Filtre a aire Apache ', 2, 1, 2, 1, 2000, 2000),
(113, '', 'Disque embrayage Moto 100', 4, 1, 2, 1, 2000, 2000),
(114, '', 'Disque embrayage TVS 125', 0, 1, 2, 1, 3000, 3000),
(115, '', 'Disque embrayage Néo', 3, 1, 2, 1, 5000, 5000),
(116, '', 'Disque embrayage Rock Z', 5, 1, 2, 1, 5000, 5000),
(117, '', 'Dent chaine TVS 125', 0, 1, 2, 1, 6000, 6000),
(118, '', 'Dent chaine TVS 100', 0, 1, 2, 1, 5500, 5500),
(119, '', 'Dent chaine Rock Z', 4, 1, 2, 1, 8000, 8000),
(120, '', 'Dent chaine Apache 160', 1, 1, 2, 1, 11000, 11000),
(121, '', 'Disque embrayage Apache ', 2, 1, 2, 1, 8000, 8000),
(122, '', 'Feux stop arriere Moto 100/HLX', 2, 1, 2, 1, 1000, 1000),
(123, '', 'Vilbricain Moto 100', 1, 1, 2, 1, 25000, 25000),
(124, '', 'Vilbricain HLX 125', 1, 1, 2, 1, 25000, 25000),
(125, '', 'Vilbricain Apache 160', 1, 1, 2, 1, 35000, 35000),
(126, '', 'Vilbricain Apache 180', 1, 1, 2, 1, 35000, 35000),
(127, '', 'Feux stop arriere HLX 125', 0, 1, 2, 1, 2500, 2500),
(128, '', 'Amortisseur Néo', 2, 1, 2, 1, 8000, 8000),
(129, '', 'Amortisseur Moto 100 TVS', 1, 1, 2, 1, 7500, 7500),
(130, '', 'Clé Contact Rock Z', 1, 1, 2, 1, 10000, 10000),
(131, '', 'Joint Complet HLX 125 ', 3, 1, 2, 1, 2500, 2500),
(132, '', 'Phare HJ 110-2', 7, 1, 2, 1, 11000, 11000),
(133, '', 'Phare HJ 110-6', 0, 1, 2, 1, 8000, 8000),
(134, '', 'Phare TZ Pro', 0, 1, 2, 1, 7500, 7500),
(135, '', 'Phare HJ 125-8', 10, 1, 2, 1, 14000, 14000),
(136, '', 'Phare TF', 0, 1, 2, 1, 27500, 27500),
(137, '', 'Phare HJ 150-9', 0, 1, 2, 1, 15000, 15000),
(138, '', 'Phare UH 115', 0, 1, 2, 1, 12000, 12000),
(139, '', 'Phare HJ KA', 1, 1, 2, 1, 16500, 16500),
(140, '', 'Phare HJ DM/S', 0, 1, 2, 1, 14000, 14000),
(141, '', 'Compteur HJ TZ Pro', 5, 1, 2, 1, 16000, 16000),
(142, '', 'Compteur HJ EG', 1, 1, 2, 1, 17000, 17000),
(143, '', 'Compteur HJ UH 115', 0, 1, 2, 1, 14000, 14000),
(144, '', 'Bougie HJ 110', 7, 1, 1200, 1, 1200, 1200),
(145, '', 'Bougie HJ 125', 6, 1, 2, 1, 1500, 1500),
(146, '', 'KA Pha KA', 0, 1, 2, 1, 6000, 6000),
(147, '', 'Clé Contact HJ 110-6', 1, 1, 2, 1, 5500, 5500),
(148, '', 'Clé Contact HJ 110-2', 1, 1, 2, 1, 5500, 5500),
(149, '', 'Clé Contact HJ KA', 2, 1, 2, 1, 11500, 11500),
(150, '', 'Piston HJ 110', 1, 1, 2, 1, 2500, 2500),
(151, '', 'Piston HJ UH 115', 5, 1, 2, 1, 7000, 7000),
(152, '', 'Pose Pied HJ 110-5 AR', 2, 1, 2, 1, 7000, 7000),
(153, '', 'Garde-vous avant HJ 110-2', 2, 1, 2, 1, 8000, 8000),
(154, '', 'Garde-vous avant HJ 115 UH', 1, 1, 2, 1, 11000, 11000),
(155, '', 'Garde-vous avant HJ 110-6', 4, 1, 2, 1, 8000, 8000),
(156, '', 'Porte Phare HJ 110-6', 1, 1, 2, 1, 8000, 8000),
(157, '', 'Porte Phare HJ 110-2', 2, 1, 2, 1, 8000, 8000),
(158, '', 'Gantre arrière HJ 110-5', 0, 1, 2, 1, 24000, 24000),
(159, '', 'Gantre avant HJ KA', 1, 1, 2, 1, 35000, 35000),
(160, '', 'Gantre arrière HJ TZ', 0, 1, 2, 1, 15000, 15000),
(161, '', 'Gantre arrière HJ 110-2', 0, 1, 2, 1, 18000, 18000),
(162, '', 'Pneu Avant HJ 110-2', 3, 1, 2, 1, 11000, 11000),
(163, '', 'Pneu arrière HJ 110-2', 2, 1, 2, 1, 13000, 13000),
(164, '', 'Pneu arrière HJ UH 115', 0, 1, 2, 1, 18000, 18000),
(165, '', 'Pneu avant HJ UH 115', 2, 1, 2, 1, 12500, 12500),
(166, '', 'Pneu avant HJ 125', 1, 1, 2, 1, 15000, 15000),
(167, '', 'Pneu arrière HJ 110-5', 2, 1, 2, 1, 19000, 19000),
(168, '', 'Pneu avant HJ DM/DH', 0, 1, 2, 1, 27000, 27000),
(169, '', 'Pneu arrière HJ 125-8', 3, 1, 2, 1, 28000, 28000),
(170, '', 'Pneu Avant AP 275-17', 1, 1, 2, 1, 5000, 5000),
(171, '', 'Pneu Avant AP 275-18', 2, 1, 2, 1, 6000, 6000),
(172, '', 'Pneu AR HJ KA', 1, 1, 2, 1, 32000, 32000),
(173, '', 'Pneu AR 4.50-12 AP', 4, 1, 2, 1, 14500, 14500),
(174, '', 'Pneu AV TVS 2.75-17', 4, 1, 2, 1, 14000, 14000),
(175, '', 'Pneu AR TVS 300-17', 3, 1, 2, 1, 14000, 14000),
(176, '', 'Pneu AV Apache ', 3, 1, 2, 1, 75000, 75000),
(177, '', 'Pneu AR Apache', 3, 1, 2, 1, 90000, 90000),
(178, '', 'Chambre à aire 2.75-18', 4, 1, 2, 1, 2000, 2000),
(179, '', 'Culbiteur HJ 110', 2, 1, 2, 1, 3500, 3500),
(180, '', 'Patin avant HJ 125-8', 4, 1, 2, 1, 2000, 2000),
(181, '', 'Manuvelle HJ 110', 1, 1, 2, 1, 2000, 2000),
(182, '', 'Culbiteur HJ 150-9', 5, 1, 2, 1, 3500, 3500),
(183, '', 'Optique Phare HJ 110-6', 4, 1, 2, 1, 1500, 1500),
(184, '', 'Cable Compteur HJ 115', 2, 1, 2, 1, 2000, 2000),
(185, '', 'Bille démarreur HJ 110', 8, 1, 2, 1, 1000, 1000),
(186, '', 'Chaine motrice HJ 110', 2, 1, 2, 1, 3000, 3000),
(187, '', 'Roulette culase HJ 110', 1, 1, 2, 1, 1000, 1000),
(188, '', 'Roulette chaine mottrice HJ 110', 5, 1, 2, 1, 500, 500),
(189, '', 'Clé Contact Honda 125', 2, 1, 2, 1, 7000, 7000),
(190, '', 'Optique Phare HJ 110-2', 0, 1, 2, 1, 2000, 2000),
(191, '', 'Couvre  chappement HJ 110-2', 1, 1, 2, 1, 3500, 3500),
(192, '', 'Carburateur AP 175/150', 0, 1, 2, 1, 7000, 7000),
(193, '', 'Roulement SANYLI', 11, 1, 2, 1, 1000, 1000),
(194, '', 'Vilbricain BAJAJ 100', 1, 1, 2, 1, 27000, 27000),
(195, '', 'Soupape HJ 110', 8, 1, 2, 1, 1500, 1500),
(196, '', 'Soupape HJ 150-9', 1, 1, 2, 1, 3000, 3000),
(197, '', 'Carburateur HJ 110', 0, 1, 2, 1, 7500, 7500),
(198, '', 'Carburateur HJ 110-5', 1, 1, 2, 1, 13000, 13000),
(199, '', 'Couvre battérie SANYA 125', 0, 1, 2, 1, 3000, 3000),
(200, '', 'Chappement HJ 110-6', 1, 1, 2, 1, 20000, 20000),
(201, '', 'Cable gaz HJ 125', 20, 1, 2, 1, 2000, 2000),
(202, '', 'Patin arriere HJ 125', 2, 1, 1, 1, 3000, 3000),
(203, '', 'Phare HJ TF', 2, 1, 1, 1, 5000, 5000),
(204, '', 'Retroviseur DH', 0, 1, 1, 2, 2000, 2000),
(205, '', 'Compteur HJ KA', 0, 1, 1, 1, 1000, 1000),
(206, '', 'Ampoule clignontant HJ 110-2', 0, 1, 1, 1, 300, 300),
(207, '', 'Amortisseur arriere 110-6', 0, 1, 1, 1, 5000, 5000),
(208, '', 'Retroviseur Tz', 3, 1, 1, 1, 2000, 2000),
(209, '', 'Clignontant avant Wave S', 8, 1, 1, 1, 1000, 1000),
(210, '', 'Clignontant arriere Tz', 22, 1, 1, 1, 1000, 1000),
(211, '', 'Disque embrayage HLX 125', 4, 1, 2, 3, 3000, 3000),
(212, '', 'Dent chaine Apache 180', 5, 1, 2, 1, 12000, 12000),
(213, '', 'Dent chaine HLX 125', 4, 1, 2, 1, 7500, 7500),
(214, '', 'Dent chaine Moto 100', 6, 1, 2, 1, 5500, 5500),
(215, '', 'Dent chaine Neo', 6, 1, 2, 3, 8000, 8000),
(216, '', 'Dent chaine XL 100', 1, 1, 2, 1, 8500, 8500),
(217, '', 'Patin arriere Apache', 9, 1, 2, 2, 3500, 3500),
(218, '', 'Cable Compteur Moto 100', 5, 1, 1, 1, 1000, 1000),
(219, '', 'Arret d\'huile soupape ', 30, 1, 2, 1, 1000, 1000),
(220, '', 'Bougie Apache', 0, 1, 2, 1, 3000, 3000),
(221, '', 'Gantre avant HJ 110-5', 0, 1, 2, 1, 22000, 22000),
(222, '', 'Gantre arrière HJ 125', 0, 1, 2, 1, 24000, 24000),
(223, '', 'Gantre avant HJ 110-2', 0, 1, 1, 1, 15000, 15000),
(224, '', 'Gomme Pose Pied HJ 125', 0, 1, 2, 1, 1000, 1000),
(225, '', 'Cylindre HLX 100/ks', 0, 1, 2, 1, 1000, 1000),
(226, '', 'Feu stop Arriere Neo', 0, 1, 2, 1, 1500, 1500),
(227, '', 'Patin avant HLX 125', 0, 1, 1, 1, 2500, 2500),
(228, '', 'Phare Xpress', 0, 1, 1, 1, 1000, 1000),
(229, '', 'Patin avant HJ 110', 0, 1, 1, 1, 1000, 1000),
(230, '', 'Dent chaine HJ 115', 0, 1, 1, 1, 5000, 5000),
(231, '', 'Fourche HJ 201', 0, 1, 1, 1, 2000, 2000),
(232, '', 'Clignontant avant 110-5', 0, 1, 1, 1, 1000, 1000),
(233, '', 'Clignontant avant HJ 115', 0, 1, 1, 1, 200, 200),
(234, '', 'Clignontant arriere Wave S', 0, 1, 1, 1, 1000, 1000),
(235, '', 'Couvre battérie SANYA 112', 0, 1, 1, 1, 1000, 1000),
(236, '', 'carburateur AP 150', 0, 1, 2, 3, 5500, 7500),
(237, 'AA', 'Lait en poudre', 0, 1, 2, 2, 1000, 1500);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `codeclient` varchar(200) NOT NULL,
  `nomprenomscl` varchar(200) NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `quartier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `codeclient`, `nomprenomscl`, `tel`, `email`, `ville`, `quartier`) VALUES
(2, 'CL1', 'Client Divers', 40507319, 'clentdivers@gmail.com', 'Djougoubenin', 'Taifa');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `idarticle` int(20) NOT NULL,
  `quantite` int(20) NOT NULL,
  `montantttc` int(100) NOT NULL,
  `datecommande` date NOT NULL,
  `reference` varchar(260) NOT NULL,
  `etat` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`stock_id`, `idarticle`, `quantite`, `montantttc`, `datecommande`, `reference`, `etat`) VALUES
(1, 135, 10, 140000, '2022-10-19', 'A', '0'),
(2, 149, 2, 23000, '2022-10-19', 'A', '0'),
(3, 139, 1, 16500, '2022-10-19', 'A', '0'),
(4, 151, 5, 35000, '2022-10-19', 'A', '0'),
(5, 141, 5, 80000, '2022-10-19', 'A', '0'),
(6, 201, 20, 40000, '2022-10-19', 'A', '0'),
(7, 1, 3, 15000, '2022-10-19', 'A', '0'),
(8, 2, 7, 42000, '2022-10-19', 'A', '0'),
(9, 150, 1, 2500, '2022-10-19', 'A', '0'),
(10, 202, 2, 6000, '2022-10-19', 'A', '0'),
(11, 203, 2, 10000, '2022-10-19', 'A', '0'),
(12, 148, 1, 5500, '2022-10-19', 'A', '0'),
(13, 147, 1, 5500, '2022-10-19', 'A', '0'),
(14, 96, 2, 10000, '2022-10-19', 'A', '0'),
(15, 132, 7, 77000, '2022-10-19', 'A', '0'),
(16, 39, 24, 48000, '2022-10-19', 'A', '0'),
(17, 145, 6, 9000, '2022-10-19', 'A', '0'),
(18, 144, 7, 8400, '2022-10-19', 'A', '0'),
(19, 142, 1, 17000, '2022-10-19', 'A', '0'),
(20, 152, 2, 14000, '2022-10-19', 'A', '0'),
(21, 179, 2, 7000, '2022-10-19', 'A', '0'),
(22, 186, 2, 6000, '2022-10-19', 'A', '0'),
(23, 9, 3, 30000, '2022-10-19', 'A', '0'),
(24, 194, 1, 27000, '2022-10-19', 'A', '0'),
(25, 185, 8, 8000, '2022-10-19', 'A', '0'),
(26, 178, 4, 8000, '2022-10-19', 'A', '0'),
(27, 12, 2, 50000, '2022-10-19', 'A', '0'),
(28, 17, 5, 55000, '2022-10-19', 'A', '0'),
(29, 14, 3, 72000, '2022-10-19', 'A', '0'),
(30, 187, 1, 1000, '2022-10-19', 'A', '0'),
(31, 188, 5, 2500, '2022-10-19', 'A', '0'),
(32, 180, 4, 8000, '2022-10-19', 'A', '0'),
(33, 7, 4, 28000, '2022-10-19', 'A', '0'),
(34, 10, 5, 50000, '2022-10-19', 'A', '0'),
(35, 181, 1, 2000, '2022-10-19', 'A', '0'),
(36, 184, 2, 4000, '2022-10-19', 'A', '0'),
(37, 183, 4, 6000, '2022-10-19', 'A', '0'),
(38, 182, 5, 17500, '2022-10-19', 'A', '0'),
(39, 189, 2, 14000, '2022-10-19', 'A', '0'),
(40, 107, 1, 8000, '2022-10-19', 'A', '0'),
(41, 191, 1, 3500, '2022-10-19', 'A', '0'),
(42, 74, 11, 55000, '2022-10-19', 'A', '0'),
(43, 155, 4, 32000, '2022-10-19', 'A', '0'),
(44, 153, 2, 16000, '2022-10-19', 'A', '0'),
(45, 156, 1, 8000, '2022-10-19', 'A', '0'),
(46, 157, 2, 16000, '2022-10-19', 'A', '0'),
(47, 154, 1, 11000, '2022-10-19', 'A', '0'),
(48, 97, 2, 16000, '2022-10-19', 'A', '0'),
(49, 102, 10, 6000, '2022-10-19', 'A', '0'),
(50, 26, 2, 46000, '2022-10-19', 'A', '0'),
(51, 106, 6, 42000, '2022-10-19', 'A', '0'),
(52, 105, 1, 17000, '2022-10-19', 'A', '0'),
(53, 195, 8, 12000, '2022-10-19', 'A', '0'),
(54, 196, 1, 3000, '2022-10-19', 'A', '0'),
(55, 108, 2, 14000, '2022-10-19', 'A', '0'),
(56, 210, 22, 22000, '2022-10-19', 'A', '0'),
(57, 23, 5, 12500, '2022-10-19', 'A', '0'),
(58, 61, 1, 1000, '2022-10-19', 'A', '0'),
(59, 59, 2, 2000, '2022-10-19', 'A', '0'),
(60, 60, 8, 12000, '2022-10-19', 'A', '0'),
(61, 44, 1, 500, '2022-10-19', 'A', '0'),
(62, 131, 3, 7500, '2022-10-19', 'A', '0'),
(63, 58, 4, 2000, '2022-10-19', 'A', '0'),
(64, 64, 3, 3000, '2022-10-19', 'A', '0'),
(65, 63, 5, 5000, '2022-10-19', 'A', '0'),
(66, 86, 1, 2500, '2022-10-19', 'A', '0'),
(67, 30, 1, 15000, '2022-10-19', 'A', '0'),
(68, 130, 1, 10000, '2022-10-19', 'A', '0'),
(69, 28, 5, 12500, '2022-10-19', 'A', '0'),
(70, 29, 2, 3000, '2022-10-19', 'A', '0'),
(71, 85, 1, 25000, '2022-10-19', 'A', '0'),
(72, 66, 3, 480000, '2022-10-19', 'A', '0'),
(73, 67, 2, 340000, '2022-10-19', 'A', '0'),
(74, 65, 3, 57000, '2022-10-19', 'A', '0'),
(75, 38, 15, 90000, '2022-10-19', 'A', '0'),
(76, 100, 2, 34000, '2022-10-19', 'A', '0'),
(77, 98, 3, 15000, '2022-10-19', 'A', '0'),
(78, 93, 2, 7000, '2022-10-19', 'A', '0'),
(79, 94, 2, 16000, '2022-10-19', 'A', '0'),
(80, 95, 3, 18000, '2022-10-19', 'A', '0'),
(81, 193, 11, 11000, '2022-10-19', 'A', '0'),
(82, 169, 3, 84000, '2022-10-19', 'A', '0'),
(83, 167, 2, 38000, '2022-10-19', 'A', '0'),
(84, 163, 2, 26000, '2022-10-19', 'A', '0'),
(85, 162, 3, 33000, '2022-10-19', 'A', '0'),
(86, 166, 1, 15000, '2022-10-19', 'A', '0'),
(87, 165, 2, 25000, '2022-10-19', 'A', '0'),
(88, 171, 2, 12000, '2022-10-19', 'A', '0'),
(89, 170, 1, 5000, '2022-10-19', 'A', '0'),
(90, 73, 6, 36000, '2022-10-19', 'A', '0'),
(91, 68, 3, 30000, '2022-10-19', 'A', '0'),
(92, 198, 1, 13000, '2022-10-19', 'A', '0'),
(93, 72, 1, 4500, '2022-10-19', 'A', '0'),
(94, 69, 2, 22000, '2022-10-19', 'A', '0'),
(95, 110, 26, 52000, '2022-10-19', 'A', '0'),
(96, 31, 1, 4500, '2022-10-19', 'A', '0'),
(97, 32, 4, 4000, '2022-10-19', 'A', '0'),
(98, 200, 1, 20000, '2022-10-19', 'A', '0'),
(99, 13, 4, 128000, '2022-10-19', 'A', '0'),
(100, 173, 4, 58000, '2022-10-19', 'A', '0'),
(101, 176, 3, 225000, '2022-10-19', 'A', '0'),
(102, 177, 3, 270000, '2022-10-19', 'A', '0'),
(103, 174, 4, 56000, '2022-10-19', 'A', '0'),
(104, 175, 3, 42000, '2022-10-19', 'A', '0'),
(105, 159, 1, 35000, '2022-10-19', 'A', '0'),
(106, 111, 7, 7000, '2022-10-19', 'A', '0'),
(107, 79, 2, 60000, '2022-10-19', 'A', '0'),
(108, 80, 2, 60000, '2022-10-19', 'A', '0'),
(109, 112, 2, 4000, '2022-10-19', 'A', '0'),
(110, 62, 4, 4000, '2022-10-19', 'A', '0'),
(111, 41, 6, 18000, '2022-10-19', 'A', '0'),
(112, 122, 2, 2000, '2022-10-19', 'A', '0'),
(113, 119, 4, 32000, '2022-10-19', 'A', '0'),
(114, 120, 1, 11000, '2022-10-19', 'A', '0'),
(115, 81, 1, 15000, '2022-10-19', 'A', '0'),
(116, 82, 1, 18000, '2022-10-19', 'A', '0'),
(117, 83, 1, 35000, '2022-10-19', 'A', '0'),
(118, 121, 2, 16000, '2022-10-19', 'A', '0'),
(119, 113, 4, 8000, '2022-10-19', 'A', '0'),
(120, 116, 5, 25000, '2022-10-19', 'A', '0'),
(121, 115, 3, 15000, '2022-10-19', 'A', '0'),
(122, 124, 1, 25000, '2022-10-19', 'A', '0'),
(123, 125, 1, 35000, '2022-10-19', 'A', '0'),
(124, 126, 1, 35000, '2022-10-19', 'A', '0'),
(125, 45, 1, 500, '2022-10-19', 'A', '0'),
(126, 51, 3, 9000, '2022-10-19', 'A', '0'),
(127, 50, 3, 9000, '2022-10-19', 'A', '0'),
(128, 46, 11, 27500, '2022-10-19', 'A', '0'),
(129, 47, 3, 7500, '2022-10-19', 'A', '0'),
(130, 25, 2, 1000, '2022-10-19', 'A', '0'),
(131, 36, 2, 5000, '2022-10-19', 'A', '0'),
(132, 22, 2, 3000, '2022-10-19', 'A', '0'),
(133, 21, 3, 3600, '2022-10-19', 'A', '0'),
(134, 20, 3, 3000, '2022-10-19', 'A', '0'),
(135, 128, 2, 16000, '2022-10-19', 'A', '0'),
(136, 129, 1, 7500, '2022-10-19', 'A', '0'),
(137, 52, 1, 5000, '2022-10-19', 'A', '0'),
(138, 53, 1, 3500, '2022-10-19', 'A', '0'),
(139, 54, 3, 10500, '2022-10-19', 'A', '0'),
(140, 57, 3, 30000, '2022-10-19', 'A', '0'),
(141, 56, 4, 40000, '2022-10-19', 'A', '0'),
(142, 24, 5, 30000, '2022-10-19', 'A', '0'),
(143, 40, 5, 25000, '2022-10-19', 'A', '0'),
(144, 34, 5, 12500, '2022-10-19', 'A', '0'),
(145, 35, 2, 5000, '2022-10-19', 'A', '0'),
(146, 42, 2, 5000, '2022-10-19', 'A', '0'),
(147, 123, 1, 25000, '2022-10-19', 'A', '0'),
(148, 33, 2, 10000, '2022-10-19', 'A', '0'),
(149, 211, 4, 12000, '2022-10-19', 'A', '0'),
(150, 215, 6, 48000, '2022-10-19', 'A', '0'),
(151, 216, 1, 8500, '2022-10-19', 'A', '0'),
(152, 212, 5, 60000, '2022-10-19', 'A', '0'),
(153, 213, 4, 30000, '2022-10-19', 'A', '0'),
(154, 214, 6, 33000, '2022-10-19', 'A', '0'),
(155, 217, 9, 31500, '2022-10-19', 'A', '0'),
(156, 218, 5, 5000, '2022-10-19', 'A', '0'),
(157, 48, 4, 6000, '2022-10-19', 'A', '0'),
(158, 172, 1, 32000, '2022-10-19', 'A', '0'),
(159, 208, 3, 6000, '2022-10-19', 'A', '0'),
(160, 209, 8, 8000, '2022-10-19', 'A', '0'),
(161, 78, 536, 1876000, '2022-10-19', 'A', '0'),
(162, 76, 300, 810000, '2022-10-19', 'A', '0'),
(163, 75, 97, 242500, '2022-10-19', 'A', '0'),
(164, 77, 40, 140000, '2022-10-19', 'A', '0'),
(165, 219, 30, 30000, '2022-10-19', 'A', '0');

-- --------------------------------------------------------

--
-- Structure de la table `typearticle`
--

CREATE TABLE `typearticle` (
  `id` int(11) NOT NULL,
  `nomtype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typearticle`
--

INSERT INTO `typearticle` (`id`, `nomtype`) VALUES
(1, 'Stockable'),
(2, 'Service');

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE `unite` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `unite`
--

INSERT INTO `unite` (`id`, `nom`) VALUES
(1, 'Sachet'),
(2, 'Boîte'),
(3, 'Carton'),
(4, 'Feuille'),
(5, 'Kg'),
(6, 'Bidon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `type`, `password`) VALUES
(1, 'superviseur', '12345'),
(2, 'vendeur', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `vente_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `unite_id` int(11) NOT NULL,
  `qtevendu` int(11) NOT NULL,
  `datevente` date NOT NULL,
  `refvente` varchar(100) NOT NULL,
  `client_id` int(11) NOT NULL,
  `prixvente` int(100) NOT NULL,
  `montantvente` int(100) NOT NULL,
  `etat` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`vente_id`, `article_id`, `unite_id`, `qtevendu`, `datevente`, `refvente`, `client_id`, `prixvente`, `montantvente`, `etat`) VALUES
(1, 219, 1, 10, '2022-10-23', 'v', 2, 1000, 10000, '1'),
(2, 1, 3, 1, '2022-11-27', 'VT', 2, 5000, 5000, '0'),
(3, 2, 1, 5, '2022-11-27', 'VT', 2, 6000, 30000, '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeart` (`typeart`),
  ADD KEY `unite` (`unite`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `idarticle` (`idarticle`),
  ADD KEY `idarticle_2` (`idarticle`);

--
-- Index pour la table `typearticle`
--
ALTER TABLE `typearticle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`vente_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `unite_id` (`unite_id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT pour la table `typearticle`
--
ALTER TABLE `typearticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `vente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`typeart`) REFERENCES `typearticle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`unite`) REFERENCES `unite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
