-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 09 mai 2019 à 17:01
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

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
  `promotion` tinyint(1) NOT NULL,
  `coup_de_coeur` tinyint(1) NOT NULL,
  `nouveaute` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poids` double NOT NULL,
  `date_peremption` datetime NOT NULL,
  `ingredients` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `nom`, `description`, `prix`, `reference`, `stock`, `promotion`, `coup_de_coeur`, `nouveaute`, `slug`, `photo`, `poids`, `date_peremption`, `ingredients`) VALUES
(1, 1, 'Savon à la carotte/miel', 'Le savon à la carotte fait maison est très facile à préparer. De plus, vous pouvez obtenir ses ingrédients à très bas prix. La couleur du savon peut varier en fonction de la qualité de chacun des ingrédients.', 7, NULL, 10, 1, 0, 0, 'savon-a-la-carotte', 'savon-miel.jpg', 100, '2019-07-19 00:00:00', 'Le savon à la carotte et miel'),
(2, 1, 'Savon lilas un gant de velours', 'Savon surgras aux fleurs de lilas stimule l’élasticité de votre épiderme et ravive le teint fatigué ou terne. C’est un booster de beauté et de bien-être. Le savon contient d’huile d’olive qui protège, nourrit et assouplit l’épiderme. L’idée de cette fragrance est simplissime : évoquer un bouquet de lilas fraîchement coupées. Son parfum, troublant, entre mystère et lumière, s’épanouit peu à peu, en l’accord avec votre peau. La nature devient l’atout de votre beauté. Un excellent cadeau, aux arômes exquis, à offrir ou à s’offrir !', 10, NULL, 16, 0, 1, 0, 'savon-lilas-un-gant-de-velours', 'savon-fleurs de lilas.jpg', 100, '2019-08-29 00:00:00', 'fleurs de lilas, huile d’olive '),
(3, 1, 'Bain de gourmandise framboise', 'Une boule de bain à la Framboise pour les amoureux des fruits rouges et leur parfum gourmand. La relaxation profonde et fascinante en prenant un bain de gourmandise est assurée ! Ce bain au sel de mer vous procure une peau nette, douce et apaisée pour bien terminer la journée.', 12, NULL, 8, 0, 1, 0, 'bain-de-gourmandise-framboise', 'bain-de-gourmandises-framboise.jpg', 200, '2019-09-08 00:00:00', 'framboise, sel de bain'),
(4, 1, 'Sels de bain', 'Sel de bain Lavande qui apaise la nervosité. Si vos nerfs vous jouent des tours, angoisse, stress et idées noires se dissoudront dans un bain à la lavande. La lavande est connue pour ses propriétés calmantes, aussi bien lors des états de stress que des troubles du sommeil et maux de tête. Un bain à la lavande est également conseillé dans les cas des affections cutanées et de maladies de la peau. Le sel de bain à la lavande diffuse un parfum très agréable et ajoute une couleur bleu violacé à l’eau de votre bain. Ce sel de bain est aussi recommandé pour faire des bains de pieds régulièrement pour avoir un bon sommeil. Le pot contient la quantité nécessaire de sel à la lavande pour faire 4 à 5 bains.', 5, NULL, 6, 1, 0, 0, 'sels-de-bain', 'sel-de-bain-lavande.jpg', 150, '2019-10-08 00:00:00', 'Sel de bain Lavande qui apaise la nervosité. Si vos nerfs vous jouent des tours, angoisse, stress et idées noires se dissoudront dans un bain à la lavande. La lavande est connue pour ses propriétés calmantes,'),
(5, 1, 'Douche homme le Boss', 'Un gel douche d’un remarquable parfum pour se laver en douceur et réparer l’équilibre de la peau masculine. Un produit de bain et de douche parfait pour maintenir un bon taux d’hydratation et de lipides afin que l’état de la peau ne s’aggrave pas. Avec ce gel douche surgras la peau est souple et bien hydratée.', 6, NULL, 7, 0, 1, 0, 'douche-homme-le-boss', 'Douche-homme-le-boss.jpg', 100, '2019-11-27 00:00:00', 'Un gel douche d’un remarquable parfum pour se laver en douceur et réparer l’équilibre de la peau masculine. Un produit de bain et de douche parfait pour maintenir un bon taux d’hydratation et de lipides afin que l’état de la peau ne s’aggrave pas. Avec ce gel douche surgras la peau est souple et bien hydratée.'),
(6, 2, 'Shampoing solide activateur de pousse', 'Le shampoing mousse à merveille grâce au tensioactif SCI, les cheveux crissent et sentent bons le citron. Le shampoing se rince très facilement et laisse un fini doux tout en prenant soin de les démêler grâce au shikakaï. C\'est une pure merveille ! L\'huile végétale de brocoli permet d\' ajouter encore plus de brillance et éviter les frisottis.', 4, NULL, 12, 0, 0, 1, 'shampoing-solide-activateur-de-pousse', 'shampoing-bio-activateur-de-pousse.png', 100, '2019-07-23 00:00:00', 'Appliquez un peu de produit sur vos cheveux mouillés et massez le cuir chevelu. Rincez. Utilisez votre shampoing au quotidien pour avoir des cheveux plus lisses et plus brillants.\r\nConservez votre flacon dans un endroit sec et à l\'abri de la lumière.'),
(7, 2, 'Shampoing à l\'avoine', 'Appliquez un peu de produit sur vos cheveux mouillés et massez le cuir chevelu. Rincez. Utilisez votre shampoing au quotidien pour avoir des cheveux plus lisses et plus brillants.\r\nConservez votre flacon dans un endroit sec et à l\'abri de la lumière.', 2.5, NULL, 3, 1, 0, 0, 'shampoing-a-l-avoine', 'shampoing-avoine.jpeg', 80, '2019-11-13 00:00:00', 'Appliquez un peu de produit sur vos cheveux mouillés et massez le cuir chevelu. Rincez. Utilisez votre shampoing au quotidien pour avoir des cheveux plus lisses et plus brillants.\r\nConservez votre flacon dans un endroit sec et à l\'abri de la lumière.'),
(8, 2, 'Shampoing solide au shikakai', 'Le Shikakaï : Le Shikakaï est une poudre ayurvédique utilisée en Inde pour laver et redonner un bel éclat aux cheveux. Naturellement riche en saponines, cette poudre ajoutée à de l’eau s’utilise en tant qu’ingrédient cosmétique pour réaliser des shampooings sans avoir à ajouter de tensioactifs, nettoyant ainsi en douceur les cheveux et le cuir chevelu. Cette poudre est également réputée pour favoriser la pousse des cheveux, mais aussi pour les démêler tout en leur donnant un aspect brillant et un toucher soyeux. Utile pour laver tout type de cheveux, il est particulièrement adapté pour le soin des cheveux emmêlés et fatigués', 9, NULL, 4, 0, 1, 0, 'shampoing-solide-au-shikakai', 'shampoing-solide-shikakai.png', 200, '2019-05-24 00:00:00', 'Le Shikakaï : Le Shikakaï est une poudre ayurvédique utilisée en Inde pour laver et redonner un bel éclat aux cheveux. Naturellement riche en saponines, cette poudre ajoutée à de l’eau s’utilise en tant qu’ingrédient cosmétique pour réaliser des shampooings sans avoir à ajouter de tensioactifs, nettoyant ainsi en douceur les cheveux et le cuir chevelu.'),
(9, 2, 'Apres-shampoing solide mangue-illipe-macadamia', 'C\'est un véritable soin pour tous types de cheveux, nourrissant grâce à la mangue et à l\'huile de macadamia. Vos cheveux seront plus souples, soyeux et brillants.', 9, NULL, 5, 0, 1, 0, 'apres-shampoing-solide-mangue-illipe-macadamia', 'apres-shampoin-mangue-illipe-macadamia.jpg', 100, '2019-11-12 00:00:00', 'C\'est un véritable soin pour tous types de cheveux, nourrissant grâce à la mangue et à l\'huile de macadamia. Vos cheveux seront plus souples, soyeux et brillants.'),
(10, 3, 'Liniment au calendula', 'Parfait pour la toilette des bouts de chou, ce liniment onctueux au Calendula est un incontournable ! Idéal pour nettoyer le siège des tout-petits, les mamans peuvent aussi l\'utiliser comme démaquillant naturel. A appliquer à l\'aide de coton ou d\'une lingette lavable, sans rincer. Par principe de précaution, nous conseillons de faire un test dans le pli du coude avant application pour vérifier qu\'aucune réaction allergique n\'apparait dans les 48H.', 1.5, NULL, 3, 0, 0, 1, 'liniment-au-calendula', 'liniment-naturel-bouts-chou-maman_web.jpg', 120, '2019-12-10 00:00:00', 'Parfait pour la toilette des bouts de chou, ce liniment onctueux au Calendula est un incontournable ! Idéal pour nettoyer le siège des tout-petits, les mamans peuvent aussi l\'utiliser comme démaquillant naturel. A appliquer à l\'aide de coton ou d\'une lingette lavable, sans rincer. Par principe de précaution, nous conseillons de faire un test dans le pli du coude avant application pour vérifier qu\'aucune réaction allergique n\'apparait dans les 48H.'),
(11, 3, 'Talc douceur pour bébé', 'Adapté à la toilette quotidienne des bouts de chou, ce talc prévient rougeurs et irritations grâce à son fort pouvoir d’absorption. Sa poudre toute douce protège et adoucit la peau. Après la toilette, vaporisez sur la peau parfaitement propre et sèche du siège. \r\nNB : Pour une vaporisation efficace, il est recommandé de régulièrement agiter le flacon afin d’éviter que la poudre ne se tasse.', 1.5, NULL, 30, 1, 0, 0, 'talc-douceur-bebe', 'talc-douceur-fesses-bb_web.jpg', 150, '2019-12-18 00:00:00', 'Adapté à la toilette quotidienne des bouts de chou, ce talc prévient rougeurs et irritations grâce à son fort pouvoir d’absorption. Sa poudre toute douce protège et adoucit la peau. Après la toilette, vaporisez sur la peau parfaitement propre et sèche du siège. \r\nNB : Pour une vaporisation efficace, il est recommandé de régulièrement agiter le flacon afin d’éviter que la poudre ne se tasse.'),
(12, 3, 'Crème nutritive pour bébé à l\'huile d\'olive', 'Cette crème testée sous contrôle dermatologique est parfaitement adaptée à l\'épiderme délicat des bébés. Riche en huile d\'Olive nutritive, elle adoucit la peau de bébé.', 3, NULL, 14, 0, 0, 1, 'creme-nutritive-pour-bebe-a-l-huile-d-olive', 'creme-nutritive-bebe-huile-olive_web.jpg', 150, '2020-01-25 00:00:00', 'Cette crème testée sous contrôle dermatologique est parfaitement adaptée à l\'épiderme délicat des bébés. Riche en huile d\'Olive nutritive, elle adoucit la peau de bébé.'),
(13, 3, 'Lotion nettoyante sans rinçage', 'Une lotion sans rinçage à emporter partout pour nettoyer le visage, le corps et les mains des tout-petits. Baignée de fleur d\'oranger, elle rafraîchit et parfume délicatement la peau. Imbibez un coton ou une lingette lavable puis passez délicatement sur la peau.', 1, NULL, 9, 0, 1, 0, 'lotion-nettoyante-sans-rincage', 'lotion-nettoyante-douceur_web.jpg', 150, '2019-10-16 00:00:00', 'Une lotion sans rinçage à emporter partout pour nettoyer le visage, le corps et les mains des tout-petits. Baignée de fleur d\'oranger, elle rafraîchit et parfume délicatement la peau. Imbibez un coton ou une lingette lavable puis passez délicatement sur la peau.'),
(14, 3, 'Beurre Peau Zébrée pour femme enceinte', 'La nature est bien faite ! Profitez du bonheur d\'être maman et oubliez les potentiels désagréments liés à la grossesse avec ce beurre 100 % naturel aux 4 huiles/beurre végétaux : Macadamia ou Noisette, Rose musquée, Avocat et Karité BIO. Une préparation crémeuse à l\'odeur végétale et légèrement vanillée, qui s\'utilise en massage sur l\'ensemble du corps et notamment les zones les plus concernées : ventre, cuisses et poitrine.', 6, NULL, 4, 0, 1, 0, 'beurre-peaup-zébrée-pour-femme-enceinte', 'petit-pot-de-beurre-anti-vergeture-pour-femme-enceinte.jpg', 70, '2019-10-19 00:00:00', 'Profitez du bonheur d\'être maman et oubliez les potentiels désagréments liés à la grossesse avec ce beurre 100 % naturel aux 4 huiles/beurre végétaux : Macadamia ou Noisette, Rose musquée, Avocat et Karité BIO. Une préparation crémeuse à l\'odeur végétale et légèrement vanillée, qui s\'utilise en massage sur l\'ensemble du corps et notamment les zones les plus concernées : ventre, cuisses et poitrine.'),
(16, 5, 'Tous produits menagers', 'Respirer un air plus sain\r\nPour nettoyer leur maison du sol au plafond, pour la désinfecter, la désodoriser, la faire reluire et bien sûr pour laver leur linge et leur vaisselle, les ménagères modernes ont à leur disposition une multitude de produits d’entretien efficaces et pratiques. Malheureusement, la plupart de ces produits sont agressifs et polluants pour l’environnement. C’est ainsi que l’air intérieur de nos maisons en arrive à être plus pollué encore que l’air extérieur ! Les conséquences sur notre organisme sont multiples : irritations respiratoires, asthme et, plus grave encore, risque de cancer entraîné par l’exposition au formaldéhyde, un produit chimique qui entre dans la composition des produits détergents pour la vaisselle, des produits désinfectants et des lingettes de nettoyage.\r\n\r\nChaque fois qu’on remplace l’un de ces produits par un produit d\'entretien écologique, on se donne une chance de respirer un air plus sain.\r\nUtiliser des produits moins dangereux pour la santé\r\nParmi les produits d’entretien courants, beaucoup présentent des risques de brûlures ou d’irritations des yeux et des muqueuses. C’est le cas des gels liquides pour WC, des nettoyants pour salle de bain, des produits contenant de l’eau de Javel et des détergents pour lave-vaisselle. Les blocs désodorisants pour WC contiennent souvent du paradichlorobenzène qui peut avoir à long terme des effets cancérigènes sur le foie et les reins. Les nettoyants multi-usages contiennent du toluène, un produit neurotoxique susceptible de provoquer de la fatigue, des étourdissements et des troubles de la mémoire. Ils peuvent même contenir des éthers de glycol, soupçonnés produire des stérilités masculines.\r\n\r\nTout cela fait froid dans le dos et conduit une part croissante des consommateurs à utiliser chaque fois que possible un produit naturel plutôt qu’un produit ménager chimique.', 5, NULL, 5, 0, 0, 1, 'tous-produits-menagers', 'item5.png', 2.5, '2020-01-01 00:00:00', 'vinaigre blanc, jus de citron, bicarbonate de soude, savon noir'),
(17, 5, 'Produits menagers maison', 'Fabriquer ses produits d’entretien n’est vraiment pas sorcier. En seulement quelques minutes, vous pouvez obtenir votre propre lessive, votre nettoyant multi-usages ou encore votre poudre pour lave-vaisselle.', 1.5, NULL, 2, 0, 1, 0, 'produits-menagers-maison', 'item4.jpeg', 1.5, '2019-05-01 00:00:00', 'Du vinaigre blanc (on en trouve partout)\r\nDu savon de Marseille\r\nDes cristaux de soude\r\nDu bicarbonate de soude\r\nDe l’acide citrique\r\nDes huiles essentielles'),
(18, 5, 'Sain produit d\'entretien maison', 'Vous aimeriez nettoyer votre maison sans endommager la planète ? Vous souhaitez utiliser des produits moins nocifs pour votre santé et pour l’environnement ? Fabriquez vous-mêmes vos produits d’entretien. C’est beaucoup plus simple que ça n’en a l’air.\r\n\r\nFabriquer ses produits d’entretien n’est vraiment pas sorcier. En seulement quelques minutes, vous pouvez obtenir votre propre lessive, votre nettoyant multi-usages ou encore votre poudre pour lave-vaisselle.', 2, NULL, 2, 1, 0, 1, 'sain-produits-entretien-maison', 'item1.jpeg', 0.5, '2020-07-19 00:00:00', '1 cuillère à soupe de bicarbonate de soude\r\n1 cuillère à soupe de vinaigre blanc\r\n1 litre d’eau\r\n10 gouttes d’huile essentielle d’arbre à thé (à l’action anti-bactérienne)'),
(19, 5, 'Bon et plonge', 'Transition vers des produits ménagers plus écolos et responsables. \r\nL’idée, c’est de recréer les produits de tous les jours avec une base d’ingrédients immuable qui sert à tout. Moins de déchets et moins de produits de synthèse, un peu plus de place dans les placards… Pourquoi s’en priver ?', 8, NULL, 5, 1, 0, 0, 'bon-et-plonge', 'service6.jpeg', 3, '2023-06-01 00:00:00', '60 g de cristaux de soude\r\n60 g de bicarbonate de soude\r\n60 g d’acide citrique\r\n60 g de gros sel de mer\r\n30 gouttes d’huile essentielle de citron\r\nun peu d’eau'),
(20, 6, 'Pure cire d’abeille bio', 'Une bougie de pilier de cire d’abeille biologique naturel. Il est de 4\" de diamètre et 2\" de hauteur. Il est décoré avec 3 couleurs de tous les corde de chanvre naturel et d’une breloque coeur en argent.\r\nIl est non parfumé autre que la douce odeur de miel de la cire d’abeille naturelle.', 15, NULL, 13, 0, 1, 0, 'pure-cire-d-abeille-bio', 'bougie-deco-coeur.jpg', 250, '2021-09-18 00:00:00', 'Corde de chanvre naturel, Mèche de coton, Cire d’abeille'),
(21, 6, 'Bougie aux huiles essentielles bio Vanille & bergamote', 'Une bougie d’ambiance aux parfums suaves et caramélisés de la vanille combiné aux effets assainissant et relaxant de la bergamote. Un mariage à succès pour obtenir cette bougie parfumée qui mettra votre intérieur dans une atmosphère propice à la détente.\r\nBougies de cire d’abeille bio sont purs, naturels et respectueux de l’environnement. L’ambiance que vous recherchez sera rehaussée par la douce lueur ambre et parfum de miel naturellement doux.', 16, NULL, 32, 0, 0, 1, 'bougie-aux-huiles-essentielles-bio-Vanille-&-bergamote', 'bougie-vanille-bergamote.jpg', 150, '2020-08-15 00:00:00', 'Cire de soja 100% naturelle et sans OGM\r\nExtrait naturel de Vanille bio\r\nHuile essentielle de Bergamote bio\r\nMèche en coton sans plomb'),
(22, 6, 'Bougie naturelle sans parfum', 'Bougie écologique qui diffuse une lumière douce. Se consume entièrement et ne laisse pas de résidus', 12.5, NULL, 8, 0, 0, 0, 'bougie-naturelle-sans-parfum', 'bougie-soja.jpg', 120, '2014-01-01 00:00:00', 'Cire soja, mèche coton'),
(23, 6, 'Bougie de massage barbe à papa', 'Laissez vous surprendre par la douce chaleur de l\'huile et par son parfum délicat qui vous procureront une sensation de bien être.\r\n100% naturelle, sans paraben, sans plomb, sans pétrole,et sans danger pour l\'environnement !\r\n\r\nA base d\'huile de soja, de noix de coco et de cire d\'abeille, cette bougie a une texture et une viscosité raffinée pour mieux masser.\r\n\r\nLaissez vous surprendre par la douce chaleur de l\'huile et par son parfum délicat qui vous procureront une sensation de bien être.\r\n\r\nFabrication 100% française et artisanale', 12.5, NULL, 13, 0, 1, 0, 'bougie-massage-barbe-a-papa', 'bougie-massage-barbe-a-papa.webp', 100, '2021-03-28 00:00:00', 'huile de soja, de noix de coco et de cire d\'abeille'),
(24, 6, 'Bougie de massage évasion à SHANGYU', 'Se transforme en huile\r\nBec verseur pour faciliter l\'utilisation\r\nUne senteur fleurie exotique\r\nOffrez à vos sens une évasion bien-être vers la Chine. Grâce à cette bougie de massage, prenez le temps de vous détendre avec le parfum délicat du lotus mêlé à l\'iris.\r\n\r\nAllumée quelques minutes avant le massage, cette bougie se transforme en une huile de massage tiède et douce. Il sut alors de déposer, grâce au bec verseur, quelques gouttes d’huile sur le corps pour qu\'elles induisent un effet de détente. Une fois éteinte, la bougie se solidifiera de nouveau en attendant la prochaine séance.\r\n\r\nLégère et élégante, cette senteur raffinée évoque des pétales de lotus, de rose et d\'iris sur un fond très féminin de vanille et d\'ylang-ylang. Un bouquet tendre et doux qui invite à l\'apaisement et au recentrage.\r\nConseils d’utilisation : Allumer la bougie 10 minutes avant le massage. Tester la chaleur dans l’intérieur du poignet avant de verser l’huile chaude pour le massage.', 13, NULL, 7, 0, 0, 0, 'Bougie-de-massage-évasion', 'bougie-de-massage-evasion-a-shangyu.jpg', 150, '2014-01-01 00:00:00', 'Hydrogenated soybean oil, cocos nucifera (coconut) oil, cera alba (beeswax), citral, citronellol, geraniol, limonene, linalool'),
(25, 2, 'Crème des iles - passion et frangipanier vanille', 'Ce beurre fouetté s\'applique sur l\'ensemble du corps en légers massages circulaires jusqu\'à pénétration complète du produit. Le beurre de Karité nourrit, protège et adoucit la peau tandis que l\'huile d\'Amande douce apaise, assouplit et laisse un aspect velours à la peau. Son parfum tropical divin est un vrai voyage !', 6, NULL, 7, 0, 0, 1, 'baume-corporel-des-iles-passion-et-frangipanier-vanillé', 'baume-corporel_passion-frangipanier-vanille.jpg', 250, '2020-06-14 17:00:00', 'Beurre végétal Karité\r\nMacérât huileux Vanille BIO\r\nAbsolue Frangipanier\r\nExtrait aromatique naturel Fruit de la passion\r\nExtrait aromatique naturel Vanille BIO'),
(26, 1, 'Beurre \"anti-peau de crocro\" citron vert et coco', 'Ce beurre de Karité \"anti-peau de Croco\" très nourrissant s\'applique sur l\'ensemble du corps en insistant sur les zones sèches. D\'une extrême onctuosité, il enrobe la peau de ses notes enivrantes de Coco et Citron vert.', 3, NULL, 5, 0, 0, 0, 'beurre-citron-vert-et-coco', 'beurre-citro-vert.jpg', 100, '2019-11-17 00:00:00', 'Beurre végétal Karité Nilotica BIO\r\nHuile essentielle Citron vert\r\nExtrait aromatique naturel Coco'),
(27, 3, 'Brume fraîcheur pour le corps', 'Véritable splash de fraîcheur, cette brume est un régal à appliquer ! Parfaite pour apaiser les peaux échauffées, elle tonifie et rafraichit le corps après le bain ou la douche. A vaporiser sur tout le corps.', 1.5, NULL, 15, 0, 0, 1, 'brume-fraîcheur-pour-le-corps', 'brume-fraicheur-corps_web.jpg', 100, '2019-10-17 00:00:00', 'Base neutre Base parfum BIO\r\nHydrolat Ravintsara\r\nActif cosmétique Menthol en cristaux BIO\r\nHydrolat Lavande aspic de Provence BIO');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `slug`, `image`) VALUES
(1, 'Corps', 'soin-corps', 'service1.jpg'),
(2, 'Cheveux', 'soin-cheveux', 'service2.jpg'),
(3, 'Bébé et maman', 'soin-pour-bebe-et-maman', 'bebe-et-maman.jpg'),
(4, 'Maquillage', 'produits-maquillage', 'service3.jpg'),
(5, 'Maison', 'entretien-maison', 'service6.jpeg'),
(6, 'Bougie', 'bougie', 'service5.jpeg');

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
  `paiement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

CREATE TABLE `commande_article` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
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
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `adresse_livraison` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `adresse_facturation` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `email`, `password`, `date_inscription`, `date_derniere_connexion`, `roles`, `adresse_livraison`, `adresse_facturation`) VALUES
(4, 'Ilansegarin', 'Stevenson', 'steve@test.com', '$2y$13$EEGZ8QpiHHQG6Jq8Uj7uY.ySFXDc1/81UKMQ/3.yHU0dJjraxStaS', '2019-05-09 16:36:02', NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'a:3:{i:0;s:16:\"7 rue du marché\";i:1;s:5:\"78190\";i:2;s:7:\"Trappes\";}', 'a:3:{i:0;s:16:\"7 rue du marché\";i:1;s:5:\"78190\";i:2;s:7:\"Trappes\";}'),
(5, 'Ali Dankintafo', 'Saadatou', 'saada@test.com', '$2y$13$q33UjkgvFu4D2qTSeWNs5.jkP46tTn4yJ3aaJT4gQ3HiDhoBP2xU6', '2019-05-09 16:37:13', NULL, 'a:1:{i:0;s:11:\"ROLE_MEMBRE\";}', 'a:3:{i:0;s:9:\"5 rue zen\";i:1;s:5:\"78990\";i:2;s:10:\"Élancourt\";}', 'a:3:{i:0;s:9:\"5 rue zen\";i:1;s:5:\"78990\";i:2;s:10:\"Élancourt\";}'),
(6, 'N\'Guyen', 'Zita', 'zita@test.com', '$2y$13$aHxbAWxAKKioFe/Z.fyeV.ZXdIwmKcYW2pBAgmXSibtClx0hjgcMu', '2019-05-09 16:38:46', NULL, 'a:1:{i:0;s:11:\"ROLE_MEMBRE\";}', 'a:3:{i:0;s:12:\"7 rue du lac\";i:1;s:5:\"78280\";i:2;s:10:\"Guyancourt\";}', 'a:3:{i:0;s:12:\"7 rue du lac\";i:1;s:5:\"78280\";i:2;s:10:\"Guyancourt\";}'),
(7, 'Ramet', 'François', 'francois@test.com', '$2y$13$4dAbJFNKc5eh.WE4ZZT4I.F.Rof5FErsD1LPta.38KR9HrgxDqVMK', '2019-05-09 16:39:00', NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'a:3:{i:0;s:19:\"9 chemin de Laforet\";i:1;s:5:\"78280\";i:2;s:10:\"Guyancourt\";}', 'a:3:{i:0;s:19:\"9 chemin de Laforet\";i:1;s:5:\"78280\";i:2;s:10:\"Guyancourt\";}');

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
('20190502140135', '2019-05-02 14:01:54'),
('20190503080901', '2019-05-03 08:09:11'),
('20190503081427', '2019-05-03 08:18:05'),
('20190503101110', '2019-05-09 10:08:52'),
('20190506084229', '2019-05-06 08:42:39'),
('20190506094634', '2019-05-06 09:46:44'),
('20190506101727', '2019-05-06 10:17:38'),
('20190506121656', '2019-05-06 12:17:04'),
('20190507084705', '2019-05-07 08:48:22');

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
  ADD KEY `IDX_F4817CC682EA2E54` (`commande_id`),
  ADD KEY `IDX_F4817CC61EBAF6CC` (`articles_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `FK_F4817CC61EBAF6CC` FOREIGN KEY (`articles_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_F4817CC682EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
