-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 mai 2023 à 21:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `resto_delice`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `montant_total` double NOT NULL,
  `total_qtt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `created_at`, `montant_total`, `total_qtt`) VALUES
(1, 1, '2023-05-25 03:20:28', 70, 3);

-- --------------------------------------------------------

--
-- Structure de la table `commande_item`
--

CREATE TABLE `commande_item` (
  `id` int(11) NOT NULL,
  `commandes_id` int(11) NOT NULL,
  `plats_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `plats_nom` varchar(255) NOT NULL,
  `plats_prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande_item`
--

INSERT INTO `commande_item` (`id`, `commandes_id`, `plats_id`, `quantite`, `plats_nom`, `plats_prix`) VALUES
(1, 1, 1, 2, 'Plat grillade', 25),
(2, 1, 2, 1, 'Plat gastronomique', 20);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230525083123', '2023-05-25 10:32:02', 73);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_size` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `image_name`, `image_size`, `titre`, `description`, `prix`, `created_at`) VALUES
(1, 'p1.jpg', 150, 'Plat grillade', 'Plat grillade composé de crevettes, poulets ou viande rouge selon votre choix, avec grande quantité.', 25, '2023-05-25 02:41:03'),
(2, 'p2.jpg', 150, 'Plat gastronomique', 'Plat gastronomique, composé du saumons fumés en cubes avec avocats et des morceaux de poires.', 20, '2023-05-25 02:51:24'),
(3, 'p3.jpg', 150, 'Plat végetarien', 'Plat végetarien composé de hamburger à base de céreales et divers légumes associés au huile d\'olive.', 12, '2023-05-28 13:33:23'),
(4, 'p4.jpg', 150, 'Plat sushi', 'Plat sushi composé de crevettes, poulets, saumon, riz de qualités enrobées avec des algues, divers sauces.', 25, '2023-05-28 13:36:04'),
(5, 'p5.jpg', 150, 'Plat poisson', 'Plat poisson avec légumes cuites de mais, tomates, courgettes, chouxfleurs avec une sauce verte au Basilic.', 15, '2023-05-25 02:41:03'),
(6, 'p6.jpg', 150, 'Plat salade tomate', 'Plat salade tomate, basilic et mozzarella, avec du fromage Local fait maison et tomates saisonnières de notre région.', 8, '2023-05-25 02:51:24'),
(7, 'p7.jpg', 150, 'Plat pâtes de poissons', 'Plat pâtes de poissons, avec du phampignons farcies, tomates, fine Herbes et sauce basilic, Une de nos Spécialité maison.', 20, '2023-05-28 13:33:23'),
(8, 'p8.jpg', 150, 'Plat de Boeuf grillet', 'Plat de Boeuf grillet, bon quantité avec du riz, du tomate et sauce fromagière ou sauce Basilic aux choix.', 18, '2023-05-28 13:36:04'),
(9, 'p9.jpg', 150, 'Plat huitres', 'Plat huitres, de grande qualité, avec du citrons et du pérsil, spécialité fêtes, Très apprécié par nos clients.', 30, '2023-05-28 16:36:26'),
(10, 'd1.jpg', 150, 'Salade de fruits', 'Salade de fruits', 6, '2023-05-28 18:52:19'),
(11, 'd2.jpg', 150, 'Créme brulée', 'créme brulée', 5, '2023-05-28 21:32:05'),
(12, 'd3.jpg', 150, 'Créme noix de coco', 'Créme noix de coco', 6, '2023-05-28 21:33:05'),
(13, 'd4.jpg', 150, 'Gâteau au chocolat', 'Gâteau au chocolat', 4, '2023-05-28 21:33:57'),
(14, 'd5.jpg', 150, 'Tarte meringue', 'Tarte meringue', 4, '2023-05-28 21:34:42'),
(15, 'd6.jpg', 150, 'Tarte framboise', 'Tarte framboise', 6, '2023-05-28 21:35:24'),
(16, 'd7.jpg', 150, 'Jus de fraise', 'Jus de fraise', 3, '2023-05-28 21:36:00'),
(17, 'd8.jpg', 150, 'Jus agrumes', 'Jus agrumes', 4, '2023-05-28 21:38:47'),
(18, 'd9.jpg', 150, 'Tarte au fruits', 'Tarte au fruits', 7, '2023-05-28 21:39:32');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `city` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`, `address`, `zipcode`, `city`, `created_at`, `phone`) VALUES
(1, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$RuU3CzSyCqoO6ZqpqJiCouFCT2RDFIFKIKc9J/6z1YFPhyVVLW9qO', 'ADMIN', 'Admin', '39  rue george', '75000', 'Paris', '2023-05-24 17:35:36', '0666666666'),
(2, 'demonstration@gmail.com', '[\"ROLE_USER\"]', '$2y$13$QkZh6Ps5AgPVhoCYuv/bR.w0vrZdvkRqCL3TeJsX0NN390o1VaDvK', 'Bienvenue', 'Visiteur', '39 rue George', '75000', 'Paris', '2023-05-24 21:05:56', '0666666666');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_35D4282CA76ED395` (`user_id`);

--
-- Index pour la table `commande_item`
--
ALTER TABLE `commande_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_747724FD8BF5C2E6` (`commandes_id`),
  ADD KEY `IDX_747724FDAA14E1C8` (`plats_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commande_item`
--
ALTER TABLE `commande_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_35D4282CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `commande_item`
--
ALTER TABLE `commande_item`
  ADD CONSTRAINT `FK_747724FD8BF5C2E6` FOREIGN KEY (`commandes_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `FK_747724FDAA14E1C8` FOREIGN KEY (`plats_id`) REFERENCES `plats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
