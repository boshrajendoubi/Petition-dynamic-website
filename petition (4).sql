-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 mai 2022 à 00:10
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `petition`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `prenom`, `nom`, `email`, `objet`, `message`, `date`) VALUES
(3, 'nidhal', 'tijani', 'nidhal.tijani@yahoo.com', 'aide', 'J\'ai lancé une pétition ça fait déjà un mois et je', '2022-05-02'),
(4, 'boshra', 'jendoubi', 'jboshra@gmail.com', 'demande d\'aide', 'SI vous permettez je voulais savoir comment  parta', '2022-05-02'),
(5, 'hamdy', 'ahmed', 'ahmed@gmail.com', 'petitionet', 'est ce que c\'est interdit de poster des pétitions ', '2022-05-02'),
(6, 'yasmine', 'hamrouni', 'hamyas@gmail.com', 'catégories', 'J\'espère que vous pensez ajouter quelques catégori', '2022-05-02');

-- --------------------------------------------------------

--
-- Structure de la table `firstpsw`
--

CREATE TABLE `firstpsw` (
  `id` int(11) NOT NULL DEFAULT 0,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `firstpsw`
--

INSERT INTO `firstpsw` (`id`, `password`) VALUES
(36, 'Zazou*1959'),
(37, 'Boshra*1234'),
(38, 'Test*1234'),
(44, 'Test*1234'),
(45, 'Testuser*1234'),
(49, 'Boshra*1959'),
(50, 'Zazou*1959'),
(51, 'Zazou*1959'),
(53, 'Zazou*1959'),
(55, 'Nidhal*1959'),
(56, 'Zazou*1959'),
(57, 'Zazou*1959'),
(58, 'Zazou*1959');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `message`, `date`, `heure`, `id_user`) VALUES
(1, 'bonjour', '2022-04-16', '20:55:00', 36),
(2, 'salut\r\n', '2022-04-16', '20:55:00', 36),
(3, 'test\r\n', '2022-04-16', '20:56:00', 36),
(4, 'test final', '2022-04-16', '20:57:00', 36),
(5, 'another test', '2022-04-16', '20:57:00', 36),
(6, 'last', '2022-04-16', '21:10:00', 36),
(7, 'ahla w sahla', '2022-04-16', '21:14:00', 37),
(10, 'lkqjsdlkqds', '2022-04-26', '09:37:00', 36),
(13, 'hello again', '2022-05-04', '18:48:00', 36),
(14, 'hello', '2022-05-04', '21:41:00', 36),
(15, 'hello', '2022-05-04', '21:42:00', 36),
(16, 'salut', '2022-05-04', '21:43:00', 36),
(17, 'hello', '2022-05-04', '21:48:00', 36),
(18, 'hello', '2022-05-04', '21:48:00', 36),
(19, 'hello', '2022-05-04', '21:49:00', 36),
(20, 'hello', '2022-05-04', '21:49:00', 36),
(21, 'hey', '2022-05-04', '21:49:00', 36),
(22, 'hi', '2022-05-04', '21:49:00', 36),
(23, 'k', '2022-05-04', '21:50:00', 36),
(24, 'k', '2022-05-04', '21:52:00', 36),
(25, 'coucou', '2022-05-04', '21:52:00', 36),
(26, 'salut', '2022-05-04', '21:53:00', 36),
(27, 'message test', '2022-05-04', '21:55:00', 36),
(28, 'last one', '2022-05-04', '21:59:00', 36),
(29, 'last one', '2022-05-04', '22:00:00', 36),
(30, 'hello', '2022-05-04', '22:00:00', 36),
(31, 'hello', '2022-05-04', '22:01:00', 36),
(32, 'hello', '2022-05-04', '22:02:00', 36),
(33, 'hello', '2022-05-04', '22:02:00', 36),
(34, 'same', '2022-05-04', '22:03:00', 36),
(35, 'ok', '2022-05-04', '22:04:00', 36),
(36, 'ok', '2022-05-04', '22:05:00', 36),
(37, 'hey', '2022-05-04', '22:05:00', 36),
(38, 'hey', '2022-05-04', '22:05:00', 36),
(39, 'hey', '2022-05-04', '22:06:00', 36),
(40, 'bnsr', '2022-05-04', '22:06:00', 36),
(41, 'coucou', '2022-05-04', '22:07:00', 36),
(42, 'boshra', '2022-05-04', '22:07:00', 36),
(43, 'nidhall', '2022-05-04', '22:07:00', 36),
(44, 'nidhall', '2022-05-04', '22:09:00', 36),
(45, 'nidhall', '2022-05-04', '22:09:00', 36),
(46, 'coucou', '2022-05-04', '22:11:00', 36),
(47, 'coucou', '2022-05-04', '22:12:00', 36),
(48, 'coucou', '2022-05-04', '22:14:00', 36),
(49, 'test btn', '2022-05-04', '22:15:00', 36),
(50, 'test btn', '2022-05-04', '22:16:00', 36),
(51, 'test btn', '2022-05-04', '22:17:00', 36),
(52, 'hey', '2022-05-04', '22:17:00', 36),
(53, 'salut', '2022-05-04', '22:21:00', 36);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'unread',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `idowner` int(11) NOT NULL,
  `idpetition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`, `idowner`, `idpetition`) VALUES
(1, '', 'approuved', 'un admin a approuvé votre pétition', 'read', '2022-05-02 15:12:34', 53, 12),
(2, 'nidhal tijani', 'signature', ' a signé votre pétition', 'read', '2022-05-03 00:38:11', 53, 12),
(3, 'sofien hamdy', 'signature', ' a signé votre pétition', 'read', '2022-05-03 01:08:54', 53, 12),
(4, 'sofien hamdy', 'commentaire', ' a commenté votre pétition', 'read', '2022-05-03 01:08:54', 53, 12),
(5, 'mouhamed khoukha', 'commentaire', ' a commenté votre pétition', 'read', '2022-05-03 01:11:55', 53, 12),
(7, 'boshra jendoubi', 'signature', ' a signé votre pétition', 'read', '2022-05-03 02:04:56', 53, 12),
(8, 'boshra jendoubi', 'commentaire', ' a commenté votre pétition', 'read', '2022-05-03 02:04:56', 53, 12),
(9, 'ghoul hamdy', 'signature', ' a signé votre pétition', 'read', '2022-05-03 15:35:11', 36, 5),
(10, 'ghoul hamdy', 'commentaire', ' a commenté votre pétition', 'read', '2022-05-03 15:35:11', 36, 5),
(11, '', 'approuved', 'un admin a approuvé votre pétition', 'read', '2022-05-04 16:58:07', 36, 15),
(12, '', 'approuved', 'un admin a approuvé votre pétition', 'unread', '2022-05-04 17:00:59', 53, 13);

-- --------------------------------------------------------

--
-- Structure de la table `petitions`
--

CREATE TABLE `petitions` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `createur` int(11) NOT NULL,
  `creation` date NOT NULL DEFAULT current_timestamp(),
  `nbSignatures` int(11) NOT NULL DEFAULT 0,
  `nbOpp` int(11) NOT NULL DEFAULT 0,
  `decision` varchar(50) DEFAULT 'refus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `petitions`
--

INSERT INTO `petitions` (`id`, `titre`, `categorie`, `description`, `image`, `createur`, `creation`, `nbSignatures`, `nbOpp`, `decision`) VALUES
(3, 'Help Save Grace the Ancient Turtle', 'animaux', 'Le français suit\n\nHelp us save Grace and her other shelled friends in Haliburton county. All turtles in Haliburton county are at risk due to insufficient wetland protection. Help us ensure this township employs controls to protect our heritage from now ', 'turtle.jpg', 36, '2022-05-03', 3, 1, 'accepte'),
(4, 'Sauvons les SDF!', 'politique', 'Monsieur le Premier ministre,\r\n\r\nNotre pays traverse une crise sanitaire sans précédent. Les Françaises et Français, confinés chez eux, adoptent progressivement les gestes barrière qui sauvent. Notre quotidien change, nos vies sont bouleversées, nous restons chez nous. Confinés mais chez nous.\r\n\r\nMais pour rester chez soi, il faut un chez soi.\r\n\r\nComment est-on confiné quand on est sans domicile ? Pour ceux qui vivent dans la rue, les plus fragiles d’entre nous, la vie est chaque jour un peu plus dure. Il y a urgence. Urgence à leur permettre d’accéder aux soins nécessaires pour ceux qui sont touchés par le CoVid-19. Urgence à débloquer des moyens supplémentaires pour les associations qui interviennent sur le terrain. Urgence à aider les collectivités locales qui organisent le confinement des personnes sans abri.', 'sdf.jpg', 36, '2022-05-03', 5, 2, 'accepte'),
(5, 'interdisez la vente des animaux domestiques', 'politique', 'Au Canada, plusieurs animaleries comme PetSmart, Petland et PJ’s Pets ont pris position contre les usines à chiots en arrêtant les ventes d’animaux et ne faisant que la promotion de l\'adoption. Toronto, Richmond, Mississauga et de plus en plus de villes canadiennes ont même interdites la vente de chiens et chats dans les animaleries. Cela tombe bien, car cela coupe une source majeure de revenus pour les usines à chiots qui fournissaient les animaleries, renforce l’adoption des animaux des refuges et des groupes de sauvetage et réduit l\'euthanasie des animaux de compagnie au Canada. Mais maintenant, il y a un problème beaucoup plus important: les usines à chiots et les éleveurs peu scrupuleux peuvent vendre directement à travers des sites d’annonces classées en ligne - comme Kijiji.ca.', 'dog.jpg', 36, '2022-05-03', 3, 0, 'refus'),
(6, 'Bitcoin', 'social', 'Bitcoin est une technologie pair à pair fonctionnant sans autorité centrale. La gestion des transactions et la création de bitcoins est prise en charge collectivement par le réseau. Bitcoin est libre et ouvert. Sa conception est publique, personne ne possède ni ne contrôle Bitcoin et tous peuvent s\'y joindre. Grâce à plusieurs de ses propriétés uniques, Bitcoin rend possible des usages prometteurs qui ne pourraient pas être couverts par les systèmes de paiement précédents.', 'cadd.jpg', 36, '2022-05-03', 0, 0, 'refus'),
(7, 'Familles séparées pour refus de visa', 'social', 'En Tunisie, nous sommes plus de 750 familles françaises bloquées.\r\n\r\nNous nous sommes mariés en France.\r\n\r\nNous avons épousés des tunisiens et tunisiennes qui était en France en situation irrégulière.\r\n\r\nUne personne en situation irrégulière qui se marie en France peut régulariser sa situation seulement en retournant dans son pays d’origine pour faire une demande de visa de conjoint de français pour pouvoir revenir en France légalement. \r\n\r\nSeulement depuis plus de 7 mois toute ses familles se voient refuser des visas en accusant tous ses mariages de « projet à caractères frauduleux » donc « mariage blanc ». Or toutes ces personnes on des familles, certains des enfants et toutes ces familles sont séparées et déchirées depuis plus de 7 mois, car les enfants sont obligés d’être scolarisés en France.\r\n\r\nEn attendant en France tout est à l’arrêt pour ces familles : travail, loyer, charges … car tous bloqués en Tunisie.\r\n\r\nOn aimerait essayer de se faire entendre et se libérer de ce cauchem', 'visa.jpg', 36, '2022-05-03', 1, 0, 'accepte'),
(11, 'Autoriser la reprise du sport amateur, de façon responsable. C\'est vital.', 'sport', 'Plus de 10 mois de privation, de frustration. Chaque jour qui passe laisse filer le peu d\'espoir qu\'il reste de reprendre le sport pour les 17 millions de pratiquants amateurs en France.\r\n\r\nCe combat, c\'est celui d\'un jeune basketteur de 18 ans que le gouvernement pousse sur le canapé devant la télé plutôt qu\'à tremper son tshirt de sueur. D\'une mère de famille qui a pour échappatoire, après le travail et les devoirs des enfants, de jouer au tennis avec ses amies. De l\'homme de 30 ans que je suis et qui s\'est construit avec le sport, à appris la discipline, le travail et la résilience.\r\n\r\nVous êtes des centaines à avoir exprimé le même dégout dans les commentaires ci-dessous et ce besoin vital de reprendre le sport car plus personne ne croit que dans 2-3 mois \"tout va s\'arranger\".\r\n\r\nJe me battrais, avec vous, pour que l\'on offre autre chose à ce monde amateur. Ce monde où le bien-être physique et mental règne, notre \"soupape de décompression\" et parfois le seul lien social de nos vies rythmées. Ce combat qui n\'a pas de couleur, pas de partie politique, rien de tout ça.\r\n\r\nNous avons mal mais devons nous battre comme à chaque fois où il était difficile de courir, de patiner, de renvoyer la balle, d\'encaisser les coups ou de faire cette répétition supplémentaire qui fait que nous sommes forts. Physiquement et mentalement.\r\n\r\nNos amis du sport professionnel nous soutiennent, ils savent d\'où ils viennent et n\'oublient pas que le sport amateur est une rampe de lancement pour le monde professionnel. Je les remercie chaleureusement, nous avons besoin de vos relais et de votre couverture médiatique.\r\n\r\nNous, les amateurs, licenciés, amoureux et passionnés de sport. Assurons-nous que nos amis, coéquipiers et camarades répondent présents et nous aident à reprendre le sport dans des conditions responsables et adaptées à chaque pratique, à chaque lieu. Nous saurons le faire.', 'sportif.jpg', 53, '2022-05-03', 0, 0, 'accepte'),
(12, 'STOP AU MASSACRE SANS SOMMATION DE TOUS LES CHIENS ERRANTS DE L\'OUEST', 'animaux', 'Suite à la découverte hier d\'un homme décédé portant des morsures de chiens, M. le Maire de St Paul et le TCO ont immédiatement organisé une grande rafle des chiens errants de l\'Ouest de l\'île durant 48h00, soit tout ce week-end. Ces animaux seront euthanasiés sous 4 jours si ce n\'est pas avant, vous le savez et ça ne réglera pas le problème, vous le savez également.\r\n\r\nPersonne dans l\'immédiat ne sait si cet homme est décédé des suites d\'une attaque ni si ce sont des errants ou divaguants qui l\'ont mordu. Les errants sont affaiblis, ont peur de l\'homme qui le pourchasse, les divaguants eux sont en pleine forme...\r\n\r\nTant que rien ne sera fait pour punir les abandons, sanctionner la divagation, la non-identification et faire cesser les ventes d\'animaux sur les réseaux sociaux, l\'errance animale perdurera sur l\'île. Les campagnes de stérilisation sont insuffisantes, non médiatisées et stoppées à tout moment pour insuffisance du budget alloué. Tout ceci, vous le savez.\r\n\r\nLa Réunion a le triste record du nombre d\'euthanasies en France. Si l\'euthanasie était la solution, nous n\'aurions plus de chiens errants.\r\n\r\nSTOPPEZ immédiatement ce massacre inutile et prenez enfin les bonnes décisions, c\'est urgent. Arrêtez ces méthodes moyenâgeuses où l\'on tue sans réfléchir.\r\n\r\nSylvie LEFEVRE\r\n\r\nBénévole en protection animale sur l\'île, parmi tant d\'autres qui sont épuisées.', 'chieeen.jpg', 53, '2022-05-03', 4, 1, 'accepte'),
(14, 'sportifet sportifet!!!', 'sport', 'sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? sportifs ? ', '', 36, '2022-05-04', 0, 0, 'refus'),
(15, 'Remake Game of Thrones Season 8', 'sport', 'David Benioff and D.B. Weiss have proven themselves to be woefully incompetent writers when they have no source material (i.e. the books) to fall back on. \r\n\r\nThis series deserves a final season that makes sense. \r\n\r\nSubvert my expectations and make it happen, HBO!', 'gott.jpg', 36, '2022-05-04', 0, 0, 'accepte');

-- --------------------------------------------------------

--
-- Structure de la table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(6, 'nidhal.tijani@yahoo.com', '01bc84eb8521236c', '$2y$10$O6yncfrmFiLSN2xHdLjrz.UHSEy/bwyyYuo7YFudT6H3almcFAuZC', '1648768214'),
(8, 'nidahl.tijani@yahoo.com', 'a0095c03453af217', '$2y$10$QO3zp6wORAL/L.iGCNvxZu2Sn30PMC1vUeLU6GJjAkY2.JZRhEvrS', '1648768876');

-- --------------------------------------------------------

--
-- Structure de la table `signature`
--

CREATE TABLE `signature` (
  `idPetition` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nomUser` varchar(50) NOT NULL,
  `prenomUser` varchar(50) NOT NULL,
  `commentaire` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `signature`
--

INSERT INTO `signature` (`idPetition`, `mail`, `nomUser`, `prenomUser`, `commentaire`) VALUES
(3, 'jendoubiboshra@gmail.com', 'Jendoubi', 'Boshra', ''),
(3, 'nada.tijani@gmail.com', 'Tijani', 'nada', ''),
(3, 'nidhal.tijani@yahoo.com', 'tijani', 'nidhal', ''),
(4, 'boshrajendoubi@gmail.com', 'Jendoubi ', 'Boshra', ''),
(4, 'boughanmimahdi@gmail.com', 'boughanmi', 'mahdi', 'j\'oppose'),
(4, 'hamdy@gmail.com', 'lajmi', 'hamdi', ''),
(4, 'nada.tijani@hotmail.com', 'tijani', 'nada', ''),
(4, 'nidhal.tijani@yahoo.com', 'tijani', 'nidhal', 'tous unis pour sauver les sdf'),
(4, 'prtest@gmail.com', 'zou', 'hariri', 'je suis pour il faut les sauver ASAP'),
(4, 'tester@gmail.com', 'Tester', ' Testeur', 'Help them'),
(5, 'hamdilghoul@gmail.com', 'hamdy', 'ghoul', 'les pauvres!!'),
(5, 'nada.tijani@hotmail.com', 'tijani', 'nada', ''),
(5, 'nidhal.tijani@yahoo.com', 'tijani', 'nidhal', ''),
(7, 'nidhal.tijani@yahoo.com', 'tijani', 'nidhal', ''),
(12, 'hamdi_ss@gmail.com', 'hamdy', 'sofien', 'il faut arrêter ce genre d\'acte inhumaine!!'),
(12, 'jboshra@gmail.com', 'jendoubi', 'boshra', 'soyons solidaires pour sauver ces pauvres'),
(12, 'mohamed_khoukha@gmail.com', 'khoukha', 'mouhamed', 'tous unis pour punir les abandons, sanctionner la divagation, la non-identification et faire cesser les ventes d\'animaux sur les réseaux sociaux.'),
(12, 'nidhal.tijani@yahoo.com', 'tijani', 'nidhal', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`, `image`, `inscription`) VALUES
(36, 'nidhal', 'tijani', 'nidhal.tijani@yahoo.com', 'Zazou*1959', 'administrateur', 'pdp.jpg', '2022-04-29'),
(37, 'boshraa', 'jendoubie', 'boshra@gmail.com', 'Boshra*1234', 'administrateur', 'hitler.jpg', '2022-04-29'),
(38, 'test', 'user', 'test_user@gmail.com', 'Test*1234', 'administrateur', 'ena.jpg', '2022-04-29'),
(44, 'nada', 'tijani', 'test@gmail.com', 'Test*1234', 'enseignant', 'default.png', '2022-04-29'),
(45, 'tester', 'users', 'test.user@gmail.com', 'Testuser*1234', 'administrateur', 'default.png', '2022-04-29'),
(49, 'nouveau', 'boshratest', 'boshboshtesttest@gmail.com', 'Boshra*1959', 'administrateur', '252543116_273038031420825_8669987298445458040_n.jpg', '2022-04-29'),
(50, 'users', 'user', 'useruser123@gmail.com', 'Zazou*1959', 'etudiant', 'default.png', '2022-04-29'),
(51, 'user', 'email', 'emailusertestsucc@gmail.com', 'Zazou*1959', 'etudiant', 'default.png', '2022-04-29'),
(53, 'ghodhbane', 'mohamad', 'mohamed_ghodh@gmail.com', 'Zazou*1959', 'etudiant', 'drake.jpg', '2022-04-30'),
(55, 'hamdi', 'abdou', 'abdou@gmail.com', 'Nidhal*1959', 'etudiant', 'default.png', '2022-05-03'),
(56, 'auiyze', 'azeyy', 'azerty@gmail.com', 'Zazou*1959', 'etudiant', 'default.png', '2022-05-04'),
(57, 'kljqdlkj', 'lkjqslkjdlkqjsd', 'qkljdklj@gmail.com', 'Zazou*1959', 'etudiant', 'default.png', '2022-05-04'),
(58, 'mohamed', 'naili', 'mohamed_naili@gmail.com', 'Zazou*1959', 'etudiant', 'default.png', '2022-05-04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Index pour la table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`idPetition`,`mail`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `petitions`
--
ALTER TABLE `petitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
