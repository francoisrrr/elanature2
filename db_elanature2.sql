-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 mai 2019 à 15:58
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_elanature2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `photos` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `promotion` tinyint(1) NOT NULL,
  `coup_de_coeur` tinyint(1) NOT NULL,
  `nouveaute` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `nom`, `description`, `prix`, `reference`, `stock`, `photos`, `promotion`, `coup_de_coeur`, `nouveaute`, `slug`) VALUES
(1, 1, 'Savon à la carotte/miel', 'Le savon à la carotte fait maison est très facile à préparer. De plus, vous pouvez obtenir ses ingrédients à très bas prix. La couleur du savon peut varier en fonction de la qualité de chacun des ingrédients.', 7, NULL, 10, 'a:1:{i:0;s:14:\"savon-miel.jpg\";}', 1, 0, 0, 'savon-a-la-carotte'),
(2, 1, 'Savon lilas un gant de velours', 'Savon surgras aux fleurs de lilas stimule l’élasticité de votre épiderme et ravive le teint fatigué ou terne. C’est un booster de beauté et de bien-être. Le savon contient d’huile d’olive qui protège, nourrit et assouplit l’épiderme. L’idée de cette fragrance est simplissime : évoquer un bouquet de lilas fraîchement coupées. Son parfum, troublant, entre mystère et lumière, s’épanouit peu à peu, en l’accord avec votre peau. La nature devient l’atout de votre beauté. Un excellent cadeau, aux arômes exquis, à offrir ou à s’offrir !', 10, NULL, 16, 'a:1:{i:0;s:25:\"savon-fleurs de lilas.jpg\";}', 0, 1, 0, 'savon-lilas-un-gant-de-velours'),
(3, 1, 'Bain de gourmandise framboise', 'Une boule de bain à la Framboise pour les amoureux des fruits rouges et leur parfum gourmand. La relaxation profonde et fascinante en prenant un bain de gourmandise est assurée ! Ce bain au sel de mer vous procure une peau nette, douce et apaisée pour bien terminer la journée.', 12, NULL, 8, 'a:1:{i:0;s:34:\"bain-de-gourmandises-framboise.jpg\";}', 0, 1, 0, 'bain-de-gourmandise-framboise'),
(4, 1, 'Sels de bain', 'Sel de bain Lavande qui apaise la nervosité. Si vos nerfs vous jouent des tours, angoisse, stress et idées noires se dissoudront dans un bain à la lavande. La lavande est connue pour ses propriétés calmantes, aussi bien lors des états de stress que des troubles du sommeil et maux de tête. Un bain à la lavande est également conseillé dans les cas des affections cutanées et de maladies de la peau. Le sel de bain à la lavande diffuse un parfum très agréable et ajoute une couleur bleu violacé à l’eau de votre bain. Ce sel de bain est aussi recommandé pour faire des bains de pieds régulièrement pour avoir un bon sommeil. Le pot contient la quantité nécessaire de sel à la lavande pour faire 4 à 5 bains.', 5, NULL, 6, 'a:1:{i:0;s:23:\"sel-de-bain-lavande.jpg\";}', 1, 0, 0, 'sels-de-bain'),
(5, 1, 'Douche homme le Boss', 'Un gel douche d’un remarquable parfum pour se laver en douceur et réparer l’équilibre de la peau masculine. Un produit de bain et de douche parfait pour maintenir un bon taux d’hydratation et de lipides afin que l’état de la peau ne s’aggrave pas. Avec ce gel douche surgras la peau est souple et bien hydratée.', 6, NULL, 7, 'a:1:{i:0;s:20:\"Douche-homme-le-boss\";}', 0, 1, 0, 'douche-homme-le-boss'),
(6, 2, 'Shampoing solide activateur de pousse', 'Le shampoing mousse à merveille grâce au tensioactif SCI, les cheveux crissent et sentent bons le citron. Le shampoing se rince très facilement et laisse un fini doux tout en prenant soin de les démêler grâce au shikakaï. C\'est une pure merveille ! L\'huile végétale de brocoli permet d\' ajouter encore plus de brillance et éviter les frisottis.', 4, NULL, 12, 'a:1:{i:0;s:34:\"shampoing-bio-activateur-de-pousse\";}', 0, 0, 1, 'shampoing-solide-activateur-de-pousse'),
(7, 2, 'Shampoing à l\'avoine', 'Appliquez un peu de produit sur vos cheveux mouillés et massez le cuir chevelu. Rincez. Utilisez votre shampoing au quotidien pour avoir des cheveux plus lisses et plus brillants.\r\nConservez votre flacon dans un endroit sec et à l\'abri de la lumière.', 2.5, NULL, 3, 'a:1:{i:0;s:16:\"shampoing-avoine\";}', 1, 0, 0, 'shampoing-a-l-avoine'),
(8, 2, 'Shampoing solide au shikakai', 'Le Shikakaï : Le Shikakaï est une poudre ayurvédique utilisée en Inde pour laver et redonner un bel éclat aux cheveux. Naturellement riche en saponines, cette poudre ajoutée à de l’eau s’utilise en tant qu’ingrédient cosmétique pour réaliser des shampooings sans avoir à ajouter de tensioactifs, nettoyant ainsi en douceur les cheveux et le cuir chevelu. Cette poudre est également réputée pour favoriser la pousse des cheveux, mais aussi pour les démêler tout en leur donnant un aspect brillant et un toucher soyeux. Utile pour laver tout type de cheveux, il est particulièrement adapté pour le soin des cheveux emmêlés et fatigués', 9, NULL, 4, 'a:1:{i:0;s:29:\"shampoing-solide-shikakai.png\";}', 0, 0, 0, 'shampoing-solide-au-shikakai'),
(9, 2, 'Apres-shampoing solide mangue-illipe-macadamia', 'C\'est un véritable soin pour tous types de cheveux, nourrissant grâce à la mangue et à l\'huile de macadamia. Vos cheveux seront plus souples, soyeux et brillants.', 9, NULL, 5, 'a:1:{i:0;s:42:\"apres-shampoin-mangue-illipe-macadamia.jpg\";}', 0, 1, 0, 'apres-shampoing-solide-mangue-illipe-macadamia'),
(10, 3, 'Liniment au calendula', 'Parfait pour la toilette des bouts de chou, ce liniment onctueux au Calendula est un incontournable ! Idéal pour nettoyer le siège des tout-petits, les mamans peuvent aussi l\'utiliser comme démaquillant naturel. A appliquer à l\'aide de coton ou d\'une lingette lavable, sans rincer. Par principe de précaution, nous conseillons de faire un test dans le pli du coude avant application pour vérifier qu\'aucune réaction allergique n\'apparait dans les 48H.', 1.5, NULL, 3, 'a:1:{i:0;s:41:\"liniment-naturel-bouts-chou-maman_web.jpg\";}', 0, 0, 0, 'liniment-au-calendula'),
(11, 3, 'Talc douceur pour bébé', 'Adapté à la toilette quotidienne des bouts de chou, ce talc prévient rougeurs et irritations grâce à son fort pouvoir d’absorption. Sa poudre toute douce protège et adoucit la peau. Après la toilette, vaporisez sur la peau parfaitement propre et sèche du siège. \r\nNB : Pour une vaporisation efficace, il est recommandé de régulièrement agiter le flacon afin d’éviter que la poudre ne se tasse.', 1.5, NULL, 30, 'a:0:{}', 0, 0, 0, 'talc-douceur-bebe'),
(12, 3, 'Crème nutritive pour bébé à l\'huile d\'olive', 'Cette crème testée sous contrôle dermatologique est parfaitement adaptée à l\'épiderme délicat des bébés. Riche en huile d\'Olive nutritive, elle adoucit la peau de bébé.', 3, NULL, 14, 'a:1:{i:0;s:40:\"creme-nutritive-bebe-huile-olive_web.jpg\";}', 0, 0, 1, 'creme-nutritive-pour-bebe-a-l-huile-d-olive'),
(13, 3, 'Lotion nettoyante sans rinçage', 'Une lotion sans rinçage à emporter partout pour nettoyer le visage, le corps et les mains des tout-petits. Baignée de fleur d\'oranger, elle rafraîchit et parfume délicatement la peau. Imbibez un coton ou une lingette lavable puis passez délicatement sur la peau.', 1, NULL, 9, 'a:1:{i:0;s:33:\"lotion-nettoyante-douceur_web.jpg\";}', 0, 0, 0, 'lotion-nettoyante-sans-rincage'),
(14, 3, 'Beurre Peau Zébrée pour femme enceinte', 'La nature est bien faite ! Profitez du bonheur d\'être maman et oubliez les potentiels désagréments liés à la grossesse avec ce beurre 100 % naturel aux 4 huiles/beurre végétaux : Macadamia ou Noisette, Rose musquée, Avocat et Karité BIO. Une préparation crémeuse à l\'odeur végétale et légèrement vanillée, qui s\'utilise en massage sur l\'ensemble du corps et notamment les zones les plus concernées : ventre, cuisses et poitrine.', 6, NULL, 4, 'a:1:{i:0;s:58:\"petit-pot-de-beurre-anti-vergeture-pour-femme-enceinte.jpg\";}', 0, 1, 0, 'beurre-peaup-zébrée-pour-femme-enceinte');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `slug`) VALUES
(1, 'Corps', 'soin-corps'),
(2, 'Cheveux', 'soin-cheveux'),
(3, 'Bébé et maman', 'soin-pour-bebe-et-maman'),
(4, 'Maquillage', 'produits-maquillage'),
(5, 'Maison', 'entretien-maison'),
(6, 'Nos coffrets', 'coffret-thematique');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `code_reduction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livraison` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paiement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

CREATE TABLE `commande_article` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `role` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `email`, `password`, `date_inscription`, `date_derniere_connexion`, `role`) VALUES
(1, 'ALI', 'Saadatou', 'saada@test.com', 'test', '2019-03-01 00:00:00', NULL, 'a:1:{i:0;s:5:\"admin\";}'),
(2, 'TOUT', 'Francois', 'francois@test.com', 'test', '2019-04-01 00:00:00', NULL, 'a:1:{i:0;s:5:\"admin\";}');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190429103942', '2019-04-30 09:14:51'),
('20190502125325', '2019-05-02 13:38:03'),
('20190502132252', '2019-05-02 13:38:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E66BCF5E72D` (`categorie_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67D6A99F74A` (`membre_id`);

--
-- Index pour la table `commande_article`
--
ALTER TABLE `commande_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F4817CC67294869C` (`article_id`),
  ADD KEY `IDX_F4817CC682EA2E54` (`commande_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande_article`
--
ALTER TABLE `commande_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E66BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `commande_article`
--
ALTER TABLE `commande_article`
  ADD CONSTRAINT `FK_F4817CC67294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_F4817CC682EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
