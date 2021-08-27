-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 13 juil. 2021 à 11:25
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `idEleve` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEleve` (`idEleve`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `nom`, `idEleve`) VALUES
(1, 'violon', 3),
(2, 'football', 1),
(3, 'natation', 2),
(4, 'rugby', 4);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `teleph1` int(11) NOT NULL,
  `teleph2` int(11) DEFAULT NULL,
  `teleph3` int(11) DEFAULT NULL,
  `idType` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idType` (`idType`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `teleph1`, `teleph2`, `teleph3`, `idType`, `idUser`) VALUES
(1, 'benmoussa', 'mohamed', 597848500, NULL, NULL, 6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `checkbox` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `photo`, `description`, `checkbox`) VALUES
(1, 'machine learning', '../images/article/concours.png', 'L\'apprentissage automatique1,2 (en anglais : machine learning, litt. « apprentissage machine1,2 »), apprentissage artificiel1 ou apprentissage statistique est un champ d\'étude de l\'intelligence artificielle qui se fonde sur des approches mathématiques et statistiques pour donner aux ordinateurs la capacité d\'« apprendre » à partir de données, c\'est-à-dire d\'améliorer leurs performances à résoudre des tâches sans être explicitement programmés pour chacune.', 'primaire, moyen, secondaire, parent'),
(2, 'deep learning', '../images/article/concours.png', 'L\'apprentissage profond1,2 ou apprentissage en profondeur1 (en anglais : deep learning, deep structured learning, hierarchical learning) est un ensemble de méthodes d\'apprentissage automatique tentant de modéliser avec un haut niveau d’abstraction des données grâce à des architectures articulées de différentes transformations non linéaires3', 'primaire, moyen, secondaire, parent'),
(3, 'BIG DATA MINING', '../images/article/concours.png', 'L’exploration de données \r\nnotes 1, connue aussi sous l\'expression de fouille de données, forage de données, prospection de données, data mining1, ou encore extraction de connaissances à partir de données, a pour objet l’extraction d\'un savoir ou d\'une connaissance à partir de grandes quantités de données, par des méthodes automatiques ou semi-automatiques. ', 'enseignant'),
(4, 'PDC', '../images/article/concours.png', 'En informatique, et plus particulièrement en développement logiciel, un patron de conception est un arrangement caractéristique de modules, reconnu comme bonne pratique en réponse à un problème de conception d\'un logiciel. Il décrit une solution standard, utilisable dans la conception de différents logiciels', 'enseignant, primaire, moyen, secondaire, parent');

-- --------------------------------------------------------

--
-- Structure de la table `articleindex`
--

DROP TABLE IF EXISTS `articleindex`;
CREATE TABLE IF NOT EXISTS `articleindex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articleindex`
--

INSERT INTO `articleindex` (`id`, `titre`, `photo`, `description`) VALUES
(1, 'Enseignement en ligne!', 'images/article/covid.png', 'Toutes les écoles sont fermées, \r\n                    et tous les cours en salle de classe ont été transférés en ligne, \r\n                    dans le cadre des mesures visant à contenir tout danger de propagation du COVID-19.'),
(2, 'La distanciation sociale', 'images/article/distance.png', 'La distanciation sociale, est une mesure de contrôle utilisée pour arrêter ou ralentir la propagation \r\n                    d’une maladie contagieuse. Elle consiste essentiellement à limiter le nombre de personnes \r\n                    avec lesquelles vous êtes en contact étroit.'),
(3, 'Prix du meilleur poème', 'images/article/poem.png', 'Ce prix est décerné chaque année par El Amal Academy. \r\n                    Il s’appele « prix de la poésie / Mouloud Feraoun », en l’honneur au écrivain algérien.'),
(4, 'Sport et Covid?', 'images/article/sport.png\r\n', 'Depuis les décisions prises au niveau fédéral jeudi dans la soirée, \r\n                    nous sommes fréquemment interrogés sur l’opportunité ou les dangers d’encore \r\n                    pratiquer une activité physique et sportive durant l’épidémie de Covid-19.'),
(5, 'Les vacances du printemps', 'images/article/vacance.png', 'CALENDRIER VACANCES SCOLAIRES EN ALGÉRIE 2020 – 2021 \r\n                    Quand partir en vacances durant l\'année 2020-2021? \r\n                    Retrouvez les dates officielles des vacances scolaires en Algérie pour \r\n                    l\'année scolaire 2020-2021.'),
(6, 'Le planning des examens', 'images/article/examen.png', 'Les dates des examens scolaires en Algérie sont fixées par le ministère de l\'éducation nationale. \r\n                    Le calendrier examens scolaire  peut être modifié exceptionnellement par le \r\n                    ministère de l\'éducation nationale.'),
(7, 'Concours inter-école', 'images/article/concours.png', 'Après une série d’éliminatoires auxquelles ont participé des établissements scolaires relevant \r\n                    du District administratif de l’éducation n°13, les élèves de plusieurs écoles ont animé \r\n                    la finale dans les épreuves de mathématiques, des sciences sociales, et de culture générale.'),
(8, 'Soutance de doctorat', 'images/article/phd.png', 'Bravo a notre cher collègue et enseignant pour sa soutnance en doctorat.');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomc` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nomc`, `type`) VALUES
(1, '3ASG1', 4),
(2, '3ASG2', 4),
(3, '1ASG1', 4),
(4, '4AMG1', 3),
(5, '2AMG1', 3),
(6, '5APG1', 2),
(7, '5APG2', 2),
(8, '3AMG1', 3),
(9, '3AMG2', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `teleph1` int(11) NOT NULL,
  `teleph2` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `adresse`, `teleph1`, `teleph2`, `fax`) VALUES
(1, 'BP 68M, 16309, Oued-Smar, Alger, Algerie', 697646155, 597848562, 31565854);

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`id`, `source`) VALUES
(1, 'images/photos/schoolOne.png'),
(2, 'images/photos/schoolTwo.png'),
(3, 'images/photos/schoolThree.png');

-- --------------------------------------------------------

--
-- Structure de la table `edt`
--

DROP TABLE IF EXISTS `edt`;
CREATE TABLE IF NOT EXISTS `edt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(255) NOT NULL,
  `heure1` int(11) NOT NULL,
  `heure2` int(11) NOT NULL,
  `heure3` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `heure1` (`heure1`),
  KEY `heure2` (`heure2`),
  KEY `heure3` (`heure3`),
  KEY `idClasse` (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `edt`
--

INSERT INTO `edt` (`id`, `jour`, `heure1`, `heure2`, `heure3`, `idClasse`) VALUES
(3, 'dimanche', 1, 4, 3, 1),
(4, 'lundi', 3, 1, 4, 1),
(5, 'mardi', 3, 4, 1, 1),
(6, 'mercredi', 4, 1, 4, 1),
(7, 'jeudi', 4, 3, 1, 1),
(8, 'dimanche', 1, 4, 6, 4),
(9, 'lundi', 3, 1, 4, 4),
(10, 'mardi', 1, 4, 1, 4),
(11, 'mercredi', 4, 6, 1, 4),
(12, 'jeudi', 4, 6, 1, 4),
(13, 'Dimanche', 3, 1, 4, 2),
(14, 'Lundi', 5, 6, 1, 2),
(15, 'Mardi', 3, 3, 5, 2),
(16, 'Mercredi', 1, 4, 6, 2),
(17, 'Jeudi', 6, 1, 4, 2),
(28, 'Dimanche', 3, 5, 6, 6),
(29, 'Lundi', 5, 1, 4, 6),
(30, 'Mardi', 3, 6, 4, 6),
(31, 'Mercredi', 1, 3, 3, 6),
(32, 'Jeudi', 6, 1, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `teleph1` int(11) NOT NULL,
  `teleph2` int(11) DEFAULT NULL,
  `teleph3` int(11) DEFAULT NULL,
  `annee` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idParent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClasse` (`idClasse`),
  KEY `idType` (`idType`),
  KEY `idUser` (`idUser`),
  KEY `idParent` (`idParent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `nom`, `prenom`, `dateNaissance`, `teleph1`, `teleph2`, `teleph3`, `annee`, `adresse`, `idClasse`, `idType`, `idUser`, `idParent`) VALUES
(1, 'matougi', 'bilal', '2006-06-11', 667710614, 564310615, NULL, '4AM', 'rue etoile constantine', 4, 3, 7, 3),
(2, 'thabet', 'ahmad', '2003-02-10', 597646174, NULL, NULL, '3AS', 'rue 1600 el khroub constantine', 2, 4, 8, 1),
(3, 'zemar', 'nesrine', '2005-01-05', 591048564, NULL, NULL, '1AS', 'rue belouizdade constantine', 3, 4, 9, 2),
(4, 'thabet', 'ammar', '2001-02-17', 597646170, NULL, NULL, '4AM', 'log 500 constantine', 4, 4, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `teleph1` int(11) NOT NULL,
  `teleph2` int(11) DEFAULT NULL,
  `teleph3` int(11) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClasse` (`idClasse`),
  KEY `idType` (`idType`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `teleph1`, `teleph2`, `teleph3`, `adresse`, `idClasse`, `idType`, `idUser`) VALUES
(1, 'ouis', 'maya', 597848525, 564310615, NULL, '20 aout constantine', 1, 1, 4),
(2, 'brahim', 'mohamed', 594848577, NULL, NULL, 'log 500 constantine ', 3, 1, 5),
(3, 'derabli', 'nasira', 797048575, NULL, NULL, 'zone activite constantine', 6, 1, 6),
(4, 'amroun', 'azzedine', 541976521, NULL, NULL, 'rue les combattants', 2, 1, 1),
(5, 'belalia', 'meriem', 731449736, NULL, NULL, 'rue st agustain', 4, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `hreception`
--

DROP TABLE IF EXISTS `hreception`;
CREATE TABLE IF NOT EXISTS `hreception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hour` varchar(255) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEns` (`idEns`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hreception`
--

INSERT INTO `hreception` (`id`, `hour`, `idEns`) VALUES
(1, '10h', 1),
(2, '10:30h', 2),
(3, '15H', 3),
(4, '14h', 3),
(5, '12h', 1),
(6, '13h', 5),
(7, '15h', 4);

-- --------------------------------------------------------

--
-- Structure de la table `htravail`
--

DROP TABLE IF EXISTS `htravail`;
CREATE TABLE IF NOT EXISTS `htravail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hour` int(11) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  `idClass` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEns` (`idEns`),
  KEY `idClass` (`idClass`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `htravail`
--

INSERT INTO `htravail` (`id`, `hour`, `idEns`, `idClass`) VALUES
(1, 5, 1, 1),
(2, 4, 2, 3),
(3, 6, 3, 4),
(5, 5, 1, 1),
(7, 6, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `infopratique`
--

DROP TABLE IF EXISTS `infopratique`;
CREATE TABLE IF NOT EXISTS `infopratique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idtype` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `infopratique_ibfk_1` (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infopratique`
--

INSERT INTO `infopratique` (`id`, `titre`, `description`, `idtype`) VALUES
(1, 'Définition et histoire', 'Dans le système éducatif, le collège est l’appellation courante du premier cycle des études \r\n        du second degré. C’est un enseignement de quatre ans, qui fait suite à l’école élémentaire. \r\n        La fourchette d\'âge est, généralement, de 11-12 ans (en sixième) à 14-15 ans (en troisième).\r\n        Par extension, « collège » est le nom de l’établissement où se fait cet enseignement. \r\nLa Gaule romanisée possédait des écoles municipales : un maître enseignant dans les écoles primaires, \r\n        un grammairien dans les écoles secondaires et un rhéteur dans l\'enseignement supérieur.\r\n        Charlemagne crée au IXe siècle des écoles dans les abbayes pour éduquer le clergé et former un corps de \r\n        fonctionnaires efficaces, ce qui en exclu de facto les femmes, interdites de ces métiers[réf. nécessaire]. \r\n        Seule une petite élite de femmes, issues de milieux intellectuels, comme Radegonde ou Hildegarde de Bingen se\r\n         distinguent par leur savoir et leurs écrits. C\'est aussi le cas d\'Héloïse d\'Argenteuil pour laquelle son oncle \r\n         fait appel à Abélard comme professeur particulier.Les collèges sont créés au XIIe siècle en liaison avec les \r\n         universités. Les collèges assurent à la fois l’hébergement et une assistance spirituelle, mais également des \r\n         fonctions d’enseignement, en complément de celui de l’université. Petit à petit, ces collèges deviennent autonomes\r\n        vis-à-vis de l’université et leur enseignement tend à se suffire à lui-même.\r\n        Les collèges deviennent donc des établissements ayant leurs propres fonctions, assurant une formation de base à des \r\n        élèves issus de la bourgeoisie ou de la noblesse. Il existe à la fois des « collèges de plein exercice » et des \r\n        « petits collèges » dont les enseignements se limitent à deux ou trois classes. Si les uns et les autres dépendent \r\n        des municipalités, les collèges de plein exercice sont généralement confiés à des congrégations religieuses \r\n        enseignantes tandis que les autres relèvent de maîtres n’appartenant pas aux congrégations.\r\n        À la veille de la Révolution, le royaume compte 271 collèges mais la moitié environ ne sont que des « petits \r\n        collèges ». L’enseignement comprend quatre classes de grammaire, une classe d’humanité et une classe de rhétorique, \r\n        auxquelles s’ajoutent deux classes de philosophie. Il s’appuie sur les principes de la Ratio Studiorum ; les matières \r\n        les plus enseignées sont le français, le latin et le grec ancien. Dans les années 1730, s’ajoutent l’histoire et \r\n        la géographie, puis la physique. Les auteurs français commencent à être étudiés vers 1770.\r\n        Les femmes exclues de cet enseignement ne peuvent donc développer leurs connaissances que grâce à des pères, \r\n        des frères, des maris lettrés et possédant des bibliothèques, comme Christine de Pisan qui plaidait tant au XVe \r\n        siècle pour que les filles reçoivent une éducation comme les garçons et ne soient pas cantonnées à filer la laine \r\n        et aux ouvrages de broderie.', 3),
(2, 'Définition (a travers le monde)', 'L\'enseignement primaire est découpé en trois cycles pluri-annuels. \r\n        Ces cycles couvrent à la fois l\'école maternelle et l\'école élémentaire. \r\n        Cette forme de coopératin considération les décalages d\'apprentissage entre \r\n        les enfants dus aux différences de maturité.\r\nDes objectifs sont définis pour chacun des 3 cycles, dans les différentes \r\n        disciplines d\'enseignement, et déclinés en compétences à travailler avec les élèves. \r\n        \'est la somme des acquisitions de compétences qui permet de déclarer un objectif atteint ou non en \r\n        termes d\'apprentissage. Ces objectifs doivent être atteints non plus à la fin d\'une année scolaire, \r\n        comme auparavant, mais en fin de cycle.\r\n        De ce fait, l\'apprentissage de la lecture, par exemple, est décliné en une somme de compétences \r\n        à acquérir sur trois ans (tout au long du cycle 2), et non plus dévolu à la seule année du cours \r\n        préparatoire comme cela était traditionnellement le cas auparavant.\r\n        De plus, des compétences qui n\'auraient pas été acquises en fin de cycle peuvent donner lieu à un « maintien » \r\n        (l\'équivalent du traditionnel redoublement), pour laisser à l\'enfant une année supplémentaire devant permettre \r\n        de combler des besoins spécifiques et de travailler des compétences qui ne sont pas encore acquises.\r\n        Ce découpage a eu pour conséquence une restructuration en profondeur des équipes de travail en école,\r\n         notamment au travers des « conseils de cycle » et des « conseils d\'école », instances qui ont à évaluer \r\n         continuellement leur approche globale des objectifs et des compétences à travailler de manière cohérente \r\n         d\'une année à l\'autre.', 2),
(3, 'Définition (a travers le monde)', 'L\'enseignement secondaire couvre les degrés scolaires qui se situent entre la fin de l\'école primaire et le \r\n    début de l\'enseignement supérieur. Les systèmes retenus par les différents pays sont très variés. \r\nAu Canada, l\'éducation est de juridiction provinciale, ce qui a pour effet que l\'enseignement secondaire diffère énormément d\'une province à l\'autre. Le Québec a un système scolaire particulier (expliqué ci-dessous). La plupart des provinces, notamment l\'Ontario, suivent le système américain[réf. nécessaire]. Les écoles secondaires (« high school » en anglais) comprennent quatre niveaux, soit de la 9e à la 12e année.\r\n\r\nL\'Alberta, Terre-Neuve-et-Labrador, le Nouveau-Brunswick, la Nouvelle-Écosse et l\'Île-du-Prince-Édouard ne suivent pas ce système. Dans ces provinces, les écoles secondaires sont nommées « senior high school » et vont de la 10e à la 12e année d\'études. Entre l\'école primaire et l\'école secondaire, soit de la 7e à la 9e année inclusivement, les élèves vont au « junior high school » (équivalent du collège en France). La majorité des senior high schools sont simplement nommées « high schools » : ainsi, le terme « high school » désigne habituellement un senior high school.\r\n\r\nPlusieurs régions de la Colombie-Britannique utilisent un système similaire à celui de l\'Alberta : ainsi, le middle school (« école intermédiaire » en français), est implanté de la 6e à la 8e année. Cependant, dans d\'autres régions de la Colombie-Britannique, le middle school n\'existe pas : l\'enseignement secondaire comprend les niveaux 8 à 12, alors que l\'école primaire comprend les niveaux de la maternelle à la 7e année. Cette décision dépend de la commission scolaire.\r\n\r\nHistoriquement, plusieurs provinces avaient deux programmes d\'éducation secondaire. L\'un visait à préparer les élèves au marché du travail alors que l\'autre visait à les préparer pour l\'université.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEns` (`idEns`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nom`, `idEns`) VALUES
(1, 'arabe', 3),
(3, 'mathematique', 2),
(4, 'physique', 1),
(5, 'philosophie', 4),
(6, 'science', 5);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` int(11) NOT NULL,
  `valeur` float NOT NULL,
  `idEns` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  `remarque` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEleve` (`idEleve`),
  KEY `idEns` (`idEns`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `idModule`, `valeur`, `idEns`, `idEleve`, `remarque`) VALUES
(1, 4, 12, 1, 2, 'amélioration'),
(3, 1, 18, 3, 1, 'excellent'),
(4, 3, 16, 2, 4, 'bien'),
(10, 3, 11, 2, 3, 'moyen');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `teleph1` int(11) NOT NULL,
  `teleph2` int(11) DEFAULT NULL,
  `teleph3` int(11) DEFAULT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `idType` int(11) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idType` (`idType`),
  KEY `idEleve` (`idEleve`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id`, `nom`, `prenom`, `teleph1`, `teleph2`, `teleph3`, `dateNaissance`, `adresse`, `idType`, `idEleve`, `idUser`) VALUES
(1, 'thabet', 'ammar', 697646157, NULL, NULL, '1978-12-08', 'log 500 constantine', 5, 2, 10),
(2, 'zemar', 'hakima', 645977454, NULL, NULL, '1965-05-13', 'rue belouizdade constantine', 5, 3, 11),
(3, 'matougi', 'lotfi', 797998575, NULL, NULL, '1971-11-17', 'rue etoile constantine', 5, 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `paragraphe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id`, `photo`, `paragraphe`) VALUES
(1, '../images/present/schoolOne.png', 'El AMAL ACADEMY  a ouvert ses portes en 2010. Elle est constituee d un grand batiment accessible par deux entrees distinctes, l une pour le cycle primaire et les enseignants, l autre pour les cycles college et secondaire, compose de 14 salles de classes lumineuses. equipes, d une bibliotheques, deune  salle d informatique, d une salle de conference  et de deux laboratoires .'),
(2, '../images/present/schoolTwo', 'Ainsi d une annexe dediee au primaire qui  dispose egalement d une salle d art plastique, d une infirmerie, d une salle de langue interactive, d une salle de musique, de plusieurs refectoires et  d une grande salle de psychomotricite.\r\n\r\nNous disposons aussi d un gymnase pas loin de l ecole. les eleves sont encadres par un personnel qualifie. Des espaces de jeux et de recreation sont amenages pour le confort des petits et des grands.'),
(3, '../images/present/schoolThree', 'L ecole est equipee d une salle de restauration avec une zone reservee aux classes primaire. A partir de 2AP, vos enfants evoluent au  Self qui fait grandir  pour prendre leurs repas. La societe ROUIBA assure la confection des repas.\r\n'),
(4, '', 'En choisissant lecole EL AMAL ACADEMY  vous proposez  votre enfant ceci        une ecole accueillante avec des locaux agreables et des equipements adaptes. unee equipe enseignante attentive a ses besoins     une scolarite vivante integrant les projets de l Enseignement islamique dans le respect des programmes de l education Nationale.');

-- --------------------------------------------------------

--
-- Structure de la table `restauration`
--

DROP TABLE IF EXISTS `restauration`;
CREATE TABLE IF NOT EXISTS `restauration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateR` date NOT NULL,
  `plat` varchar(255) NOT NULL,
  `dessert` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `restauration`
--

INSERT INTO `restauration` (`id`, `dateR`, `plat`, `dessert`) VALUES
(1, '2021-02-16', 'pizza', 'yaourt'),
(2, '2021-02-10', 'humburger', 'jus'),
(3, '2021-02-11', 'petit pois', 'orange'),
(4, '2021-03-04', 'couscous', 'jus'),
(5, '2021-02-01', 'couscous', 'gazouz');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'enseignant'),
(2, 'primaire'),
(3, 'moyen'),
(4, 'secondaire'),
(5, 'parent'),
(6, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `idParent` int(11) DEFAULT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAdmin` (`idAdmin`),
  KEY `idEleve` (`idEleve`),
  KEY `idEns` (`idEns`),
  KEY `idParent` (`idParent`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `idEns`, `idEleve`, `idAdmin`, `idParent`, `idType`) VALUES
(1, 'a_amroun@school.dz', '6GxMl', 4, NULL, NULL, NULL, 1),
(2, 'm_belalia@school.dz', 'GGm4?n', 5, NULL, NULL, NULL, 1),
(4, 'm_ouis@school.dz', 'admin', 1, NULL, NULL, NULL, 1),
(5, 'm_brahim@school.dz', '58Fk4mP', 2, NULL, NULL, NULL, 1),
(6, 'n_derabli@school.dz', '5KKH4mlO', 3, NULL, NULL, NULL, 1),
(7, 'mb_maatougi@school.dz', '1Qax8', NULL, 1, NULL, NULL, 3),
(8, 'ma_tahebt@school.dz', '0lM8S', NULL, 2, NULL, NULL, 4),
(9, 'mn_zemar@school.dz', '22mNx', NULL, 3, NULL, NULL, 4),
(10, 'pa_thabet@school.dz', '4MloO7m', NULL, NULL, NULL, 1, 5),
(11, 'ph_zemar@school.dz', 'SOS404', NULL, NULL, NULL, 2, 5),
(12, 'pl_matougi@school.dz', 'Qs5Pl77', NULL, NULL, NULL, 3, 5),
(13, 'admin', 'admin', NULL, NULL, 1, NULL, 6),
(14, 'ia_thabet@school.dz', 'hl8jj', NULL, 4, NULL, NULL, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`id`);

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `administrateur_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `edt`
--
ALTER TABLE `edt`
  ADD CONSTRAINT `edt_ibfk_1` FOREIGN KEY (`heure1`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `edt_ibfk_2` FOREIGN KEY (`heure2`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `edt_ibfk_3` FOREIGN KEY (`heure3`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `edt_ibfk_4` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `eleve_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `eleve_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `eleve_ibfk_4` FOREIGN KEY (`idParent`) REFERENCES `parent` (`id`);

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `enseignant_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `enseignant_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `hreception`
--
ALTER TABLE `hreception`
  ADD CONSTRAINT `hreception_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`id`);

--
-- Contraintes pour la table `htravail`
--
ALTER TABLE `htravail`
  ADD CONSTRAINT `htravail_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`id`),
  ADD CONSTRAINT `htravail_ibfk_2` FOREIGN KEY (`idClass`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `infopratique`
--
ALTER TABLE `infopratique`
  ADD CONSTRAINT `infopratique_ibfk_1` FOREIGN KEY (`idtype`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`id`),
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`);

--
-- Contraintes pour la table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `parent_ibfk_3` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `parent_ibfk_4` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `administrateur` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`idParent`) REFERENCES `parent` (`id`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`idType`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
