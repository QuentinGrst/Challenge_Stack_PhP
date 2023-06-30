-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 juin 2023 à 06:35
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sell_me_out`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_reset` datetime DEFAULT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `date_reset`, `status`, `user_id`, `datetime`) VALUES
(1, NULL, 0, 2, '2023-06-26 15:42:18'),
(2, '2023-06-27 08:38:51', 1, 2, '2023-06-27 08:38:51'),
(3, NULL, 1, 11, '2023-06-29 10:48:51'),
(4, NULL, 0, 11, '2023-06-29 11:04:42'),
(5, NULL, 0, 13, '2023-06-29 15:25:31'),
(6, NULL, 0, 18, '2023-06-29 21:22:06'),
(7, NULL, 0, 20, '2023-06-29 21:55:11'),
(8, NULL, 0, 21, '2023-06-29 22:03:55');

-- --------------------------------------------------------

--
-- Structure de la table `order_elements`
--

DROP TABLE IF EXISTS `order_elements`;
CREATE TABLE IF NOT EXISTS `order_elements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `order_elements`
--

INSERT INTO `order_elements` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 4),
(3, 1, 6, 4),
(4, 1, 8, 1),
(5, 1, 7, 1),
(6, 1, 10, 4),
(7, 1, 9, 1),
(8, 1, 11, 8),
(9, 3, 9, 1),
(21, 5, 8, 2),
(22, 6, 19, 1),
(23, 6, 18, 1),
(24, 6, 20, 1),
(25, 7, 20, 1),
(26, 7, 21, 1),
(27, 7, 22, 1),
(28, 8, 20, 1),
(29, 8, 21, 1),
(30, 8, 22, 1),
(31, 8, 18, 1),
(32, 8, 19, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float(7,2) NOT NULL,
  `seller_id` int NOT NULL,
  `state` tinyint NOT NULL DEFAULT '1',
  `picture` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `seller_id`, `state`, `picture`) VALUES
(1, 'Test', 'Coucou', 12.00, 3, 0, ''),
(2, 'Product 2', 'aa', 2.00, 1, 0, ''),
(3, 'ezazae', '4', 78.00, 0, 1, ''),
(4, 'ezazae', '4', 78.00, 0, 1, ''),
(5, 'zaezae', 'eezfe', 78.00, 0, 1, ''),
(6, 'zaezae', 'eezfe', 78.00, 0, 1, '/image/product/Screenshot_20230405-103352-1687939259.png'),
(7, 'zaezae', 'eezfe', 78.00, 3, 1, '/image/product/Screenshot_20230405-103352-1687939259.png'),
(8, 'zaezae', 'eezfe', 78.00, 3, 1, '/image/product/Screenshot_20230405-103352-1687939259.png'),
(9, 'zaezae', 'eezfe', 78.00, 3, 1, '/image/product/Screenshot_20230405-103352-1687939259.png'),
(10, 'zaezae', 'eezfe', 78.00, 0, 1, '/image/product/Screenshot_20230405-103352-1687939259.png'),
(11, 'GuiGui', 'Salut', 100.00, 3, 1, '/image/product/661494-battle-net-avatars-1687943673.jpg'),
(12, 'Yo', 'DESCCCC', 1234.00, 0, 1, '/image/product/Capture d’écran 2023-02-06 094149-1688021779.jpg'),
(13, 'COUCOU', 'MARCHE STP', 4578.00, 9, 1, '/image/product/Capture d’écran 2023-02-06 093912-1688021845.jpg'),
(14, 'Quentin', 'azzfaze', 123.00, 10, 0, '/image/product/FxAfT7pacAMNNqv-1688030705.jpg'),
(15, 'Sexe', 'gros sexe ', 999.00, 10, 0, '/image/product/DSC03381-1688045168.jpg'),
(16, 'aze', 'aze', 123.00, 10, 0, '/image/product/FvHbjTQakAArg9n-1688049160.jpg'),
(17, 'Clavier Corsair K65', ' RGB MINI 60% Clavier Gaming Mécanique (Rétroéclairage RGB par touche personnalisable, Switchs mécaniques CHERRY MX Red, Touches à Double Injection PBT, Technologie AXON) AZERTY, Blanc ', 120.00, 10, 1, '/image/product/71nXT0KJcWL._AC_SL1500_-1688055825.jpg'),
(18, 'Clavier Corsair K65', 'RGB MINI 60% Clavier Gaming Mécanique (Rétroéclairage RGB par touche personnalisable, Switchs mécaniques CHERRY MX Red, Touches à Double Injection PBT, Technologie AXON) AZERTY, Blanc ', 99.99, 18, 1, '/image/product/71nXT0KJcWL._AC_SL1500_-1688056007.jpg'),
(19, 'Souris Corsair', 'DARK CORE RGB PRO SE Souris gaming sans fil FPS/MOBA (Technologie SLIPSTREAM WIRELESS, Rétroéclairée RGB LED, 18 000 DPI Certifiée Charge sans fil Qi) Noir ', 104.00, 18, 1, '/image/product/81Mv2zoClyS._AC_SL1500_-1688056046.jpg'),
(20, 'Dell G15 5520', 'Intel Core i5-12500H Portable Gaming 15.6\" Full HD Dark Shadow Grey 16Go de RAM SSD 512Go NVIDIA GeForce RTX 3050 4Go Win 11 Home Plus Clavier AZERTY Français ', 1349.00, 18, 1, '/image/product/713sp0N+DOL._AC_SL1500_-1688056117.jpg'),
(21, 'MINIS FORUM Mini PC HX80G', 'processeur AMD Ryzen 7 5800H 8 cœurs CPU 32 Go DDR4/1 TB SSD Mini Ordinateur de Bureau avec Windows 11 Pro,Connexion HDMI/DP,WiFi,BT,USB 3.2×5 ', 799.00, 18, 1, '/image/product/81Rb7phduJL._AC_SL1500_-1688056160.jpg'),
(22, 'GeForce RTX 4060 Ti VENTUS 3X 8G OC', 'Gaming Carte Graphique 8G ', 499.00, 18, 1, '/image/product/71jGci8Qn6L._AC_SL1500_-1688056270.jpg'),
(23, 'AMD Ryzen 9 7950X3D', 'Processeur avec La Technologie 3D V-Cache, 16 Cœurs/32 Threads Débridés, Architecture Zen 4, 144MB Cache, 120W TDP, Jusqu\'à 5,7 GHz Fréquence Boost, Socket AMD 5, DDR5 & PCIe 5.0 ', 754.00, 18, 1, '/image/product/51fRtv4UyBL._AC_SL1500_-1688056313.jpg'),
(24, 'Corsair LL120 RGB', 'Ventilateur de Boitier Dual Light Loop RGB LED PWM 120mm avec Lighting Node et Hub (Triple Pack) ', 89.99, 18, 1, '/image/product/81RUSinXh-L._AC_SL1500_-1688056465.jpg'),
(25, 'ASUS ROG STRIX Z690-G GAMING', 'Carte mère Intel LGA 1700 ATX (14+1 phases d’alimentation, DDR5, PCIe 5.0, WiFi 6E, LAN 2,5Gb, 3 x M.2 avec dissipateurs, USB 3.2 Gén.2x2 Type-C et Aura Sync) ', 314.99, 18, 1, '/image/product/81G8bWooS3L._AC_SL1500_-1688056639.jpg'),
(26, 'Samsung 990 Pro MZ-V9P2T0BW', 'Disque SSD Interne NVMe M.2, PCIe 4.0, 2 to, Contrôle Thermique Intelligent - Compatible PS5 ', 165.88, 18, 1, '/image/product/71ByVZ1x2vL._AC_SL1500_-1688056676.jpg'),
(27, 'MSI MPG A850GF', 'Bloc d\'Alimentation, Prise EU, 850W, Certifié 80 Plus Gold, PSU ATX Entièrement Modulaire, Support GPU 3 x 6+2 Pin, Condensateurs Japonais 105°C, Câbles Noirs Plats, Garantie 10 ans ', 167.16, 18, 1, '/image/product/71aveM8VMXL._AC_SL1500_-1688056714.jpg'),
(28, 'Razer Mamba Elite', 'Souris Gaming Filaire 16 000 DPI Capteur Optique Chroma RGB Éclairage 9 Boutons Programmables Commutateurs Mécaniques ', 49.95, 18, 1, '/image/product/61YTpIudkeL._AC_SL1499_-1688057150.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stars` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `is_smo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `seller_reviews`
--

DROP TABLE IF EXISTS `seller_reviews`;
CREATE TABLE IF NOT EXISTS `seller_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stars` int NOT NULL,
  `seller_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seller_reviews`
--

INSERT INTO `seller_reviews` (`id`, `stars`, `seller_id`, `user_id`) VALUES
(1, 1, 0, 18),
(2, 1, 18, 18),
(3, 1, 18, 19),
(4, 1, 18, 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `is_seller` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `pseudo`, `is_seller`, `is_admin`, `description`) VALUES
(18, 'q@t.fr', '$2y$10$lyhoL09FRQ2QPdKyp.vFr.pWwqGOW/uMVxdExXE1ND.5iegGEt7tS', 'Quentin', 1, 0, ''),
(19, 'q@t.com', '$2y$10$/KmjCFAcOa8RASTuNky5Lu/xRx9umxKl9JmzrxOJ58QW0Kmf6G7pa', 'Quentin', 0, 0, ''),
(20, 'quentin@gmail.com', '$2y$10$iBc0GVsr/joBoaGDPd7HmOhFou4dbPEwC.UWNPwQ2VVGVvA1lZ/Aa', 'Mideae', 0, 0, 'Hello'),
(21, 'test@gmail.com', '$2y$10$r72NYYVs9f1KbGbT5Qp2Pu/V.xSpsoiotPHbbwu2feaSsf9mehzzG', 'test', 0, 0, '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
