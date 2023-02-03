-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 07:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mundiatheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `idBook` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `author` longtext NOT NULL,
  `genre` longtext NOT NULL,
  `quantity` int(5) NOT NULL,
  `imgFullNameBook` longtext NOT NULL,
  `keywords` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`idBook`, `title`, `description`, `author`, `genre`, `quantity`, `imgFullNameBook`, `keywords`) VALUES
(3, 'Math geek', 'Do you dream about long division in your sleep? Does the thought of solving abstruse equations bring a smile to your face? Do you love celebrating pi every March? Then, Math Geek was made for you! With this guide, you\'ll learn even more about the power of numbers as you explore their brilliant nature in ways you\'ve never imagined. From manhole covers to bubbles to subway maps, each page gives you a glimpse of the world through renowned mathematicians\' eyes and reveals how their theorems and equations can be applied to nearly everything you encounter. Covering dozens of your favorite math topics, you\'ll find fascinating answers to questions like:\r\n\r\nHow are the waiting times for buses determined?\r\nWhy is Romanesco Broccoli so mesmerizing?\r\nHow do you divide a cake evenly?\r\nShould you run or walk to avoid rain showers?\r\nFilled with compelling mathematical explanations, Math Geek sheds light on the incredible world of numbers hidden deep within your day-to-day life.', 'Raphael Rosen', 'math', 3, 'math-geek.629941fb113a14.07611304.jpg', 'Math book equations theorems klein bottles chaos theory'),
(4, 'Java In A Nutshell', 'This updated edition of Java in a Nutshell not only helps experienced Java programmers get the most out of Java versions 9 through 11, it\'s also a learning path for new developers. Chock full of examples that demonstrate how to take complete advantage of modern Java APIs and development best practices, this thoroughly revised book includes new material on Java Concurrency Utilities.\r\n\r\nThe book\'s first section provides a fast-paced, no-fluff introduction to the Java programming language and the core runtime aspects of the Java platform. The second section is a reference to core concepts and APIs that explains how to perform real programming work in the Java environment.', 'Benjamain J.Evans & David Flanagan', 'computer_science', 3, 'java-in-a-nusthell.62997e12cd9787.16764672.jpg', 'Java programming language Oriented object poo oop open jdk I/O APIs syntax java9 java11'),
(6, 'TOTAL CRPE MATH', 'La nouvelle épreuve d\'admission du concours de recrutement de professeur des écoles demande au candidat de présenter, en une heure, une leçon de français puis une leçon de mathématiques, et de répondre à des questions d\'entretien.\r\nCet ouvrage a été conçu pour aider dans leur préparation les candidats aux concours de recrutement des professeurs des écoles, afin qu\'ils se préparent de façon autonome ou dans le cadre des INSPÉ ', 'Manuelle Duszynski & Thomas Petit', 'math', 3, 'total-crpe.629a94ba984a69.58934284.jpg', 'INSPE EPREUVE ORALE FRANCAIS MATHEMATIQUE NOUVEAU CONCOURS 2022 METHODOLOGIE ELLIPSES '),
(7, 'Statistique Descriptive', 'Ce guide progressif permettra à chaque étudiant d\'apprivoiser la statistique et de l\'utiliser de manière autonome et critique. Un véritable passeport pour la réussite !\r\nChaque fiche contient :\r\n•	Un résumé de cours avec les grands concepts à maîtriser\r\n•	Des applications, notamment sur R\r\n•	Des conseils méthodologiques\r\n•	Des exercices avec corrigés détaillés\r\n', 'Stéphane Deline & Stéphanie Baggio & Stéphane Rothen', 'math', 3, 'statistique-descriptive.629a955b25c4b4.68139125.jpg', 'ep en poche l1 l2 deboeck exercices logiciel R exercice corrigés'),
(8, 'STMG Intervalle', 'Le programme de mathématiques en 6 chapitres avec, pour chacun, une partie cours proposant notamment une synthèse, et des exercices de difficulté variable.', 'Albert Hugon & Jean-Luc Dianoux', 'Genre', 3, 'terme-stmg-intervalle.629a96a9c0f413.63398020.jpg', '2013  Nathan collection intervalle yellow jaune  '),
(9, 'Ptimum ', 'Mathématiques : Toute la probabilité en prépa , Le programme, la méthodologie et des exercices corrigés pour réussir l\'épreuve de probabilité en prépa commerciale.', 'Hédi Joulak', 'Genre', 3, 'la-probabilité-en-prépa-.629a975a467375.10274271.jpg', 'Méthode Fiches Exercice ellipses prépa rose '),
(10, '500 exercices de mathématiques ', 'Les exercices et problèmes proposés sont à difficultés variables. Deux impératifs ont guidé le choix des exercices : diversifier les notions et idées de résolution et recenser les astuces et techniques qui servent fréquemment. On trouvera ainsi :\r\n•	les exercices basiques, d\'application directe du cours, pour être certain d\'avoir les bons bagages pour voyager vers la suite ;\r\n•	les exercices classiques, ceux que l\'on voit assez souvent aux écrits ;\r\n•	les exercices d\'approfondissement, les originaux, les « high level » ; ceux-là vont certainement vous sécher (ou faire suer) mais ce sont ces petites douleurs passagères qui vous ouvriront les plus belles portes.\r\n', 'Hédi Joulak', 'math', 3, '500-exercices-de-mathématiques-.629a97cd625f49.78424610.jpg', 'ECS 1ere annee ellipses PTIMUM 2eme edition'),
(11, 'Physique Quantique Pour Les Nuls ', 'Beaucoup d\'entre nous ignorent à quoi la physique quantique renvoie précisément : d\'où vient le terme « quantique » ? Quand cette science a-t-elle vu le jour ? Pourquoi doit-on la distinguer de la physique classique ? En 50 notions, Blandine Pluchet vous emmène dans un fascinant voyage au coeur de l\'infiniment petit. Grâce aux découvertes de physiciens du XXe siècle tels que Planck, Einstein ou encore Bohr, quanta, photons, électrons et autres composants de la matière n\'auront bientôt plus de secrets pour vous !', 'Blandine Pluchet', 'physics', 3, 'physique-quantique-pour-les-nuls-.629a99001e6899.48049031.jpg', 'Le corps noir\r\nLa dualité de la lumière\r\nLe chat de Schrödinger Les quanta L\'interprétation de Copenhague 50 notions clés facile \r\n'),
(12, 'L\'eau et la physique quantique ', 'Cette hypothèse expliquerait l\'omniprésence de l\'eau dans les cellules (sur 100 molécules constitutives d\'une cellule, 99 sont des molécules d\'eau) et donnerait également une base théorique à l\'efficacité de l\'homéopathie. Les travaux très controversés de Jacques Benveniste, repris depuis 2004 par le professeur Luc Montagnier, en mettant au-devant de la scène médiatique la théorie de la « mémoire de l\'eau », ont suscité une vive polémique au sein des cercles scientifiques.', 'Marc Henry', 'physics', 3, 'l\'eau-et-la-physique-quantique-.629a9a601be571.76197343.jpg', 'Vers une révolution de la médecine  dangles dna science '),
(13, 'Physique PCSI - Programme 2021', 'Les ouvrages de la collection Prépas Sciences sont le complément indispensable à la réussite en CPGE. Ils ont été conçus et rédigés par des professeurs enseignant en classes préparatoires dans différents lycées de notre pays. Leur contenu a été discuté et pensé avec soin pour permettre la meilleure adéquation avec les attentes et les besoins des étudiants.\r\n•	Le résumé de cours\r\nIl vous permettra d\'accéder à une connaissance synthétique des notions.\r\n•	Les méthodes\r\nElles vous initieront aux techniques usuelles qu\'il faut savoir mettre en place.\r\n•	Le vrai/faux\r\nIl testera votre compréhension du cours et vous évitera de tomber dans les erreurs classiques.\r\n•	Les exercices, avec des indications\r\nSouvent tirés d\'annales de concours, ils vous entraîneront aux écrits comme aux oraux.\r\n•	Les corrigés\r\nToujours rédigés avec soin, ils vous aideront à progresser dans la résolution d\'exercices\r\n', 'Sébastien Fayolle & David Legrand & Vincent Parmentier', 'physics', 3, 'physique-pcsi---programme-2021.629a9ae5410f18.25496191.jpg', 'Concours sujet concours classe prepas resumes ellipses nouveaux programmes sciences  Bertrand Hauchecorne'),
(14, 'Les bases de la physique', 'Partant du principe qu\'un sujet, même complexe, est assimilable s\'il est présenté de manière adaptée et accessible, ce guide permet de s\'affranchir peu à peu des bases pour aborder les concepts importants de la physique et de l\'astrophysique modernes. Les illustrations didactiques et colorées occupent une place prépondérante et viennent en appui des textes. Des exemples tirés de la vie quotidienne aident à la compréhension, tandis que les notions importantes sont regroupées dans des récapitulatifs très visuels.', 'Kurt Baker', 'physics', 3, 'les-bases-de-la-physique.629a9d6ebab150.37251799.jpg', 'Domaines traités : les forces fondamentales, le mouvement linéaire et de rotation, les lois de conservation de l\'énergie, l\'électricité, l\'électromagnétisme, le comportement des ondes, l\'étude de la lumière, le pouvoir de la chaleur en thermodynamique, la mécanique des fluides.\r\nSont également abordés : de grandes formules mathématiques (comme les lois de Newton ou la loi de Faraday) de célèbres théories (celle de la relativité restreinte ou celle du Big Bang) ou encore le mystérieux phénomène des trous noirs.\r\n60 notions illustrés plane avion  '),
(15, 'Voyage au coeur de l\'atome', 'La physique quantique n\'est pas l\'apanage de quelques savants dans leur laboratoire : omniprésente dans notre quotidien, elle s\'incarne dans la plupart des objets électroniques qui nous entourent. Les années à venir nous promettent des révolutions technologiques toujours plus étonnantes, des trains à lévitation magnétique aux ordinateurs quantiques.\r\nLudique et accessible, ce livre s\'appuie sur dix innovations spectaculaires de la physique quantique pour en décrypter les objets et concepts les plus déroutants : photons, spins, intrication, superposition...\r\nEmbarquez pour un voyage aux confins de l\'infiniment petit !\r\n', 'Adrien Bouscal & Stéphane d\' Ascoli', 'physics', 3, 'voyage-au-coeur-de-l\'atome.629a9dec515f65.60622034.jpg', 'À quoi ressemble un atome ?\r\nLa matière est-elle vide ?\r\nL\'ordinateur quantique menace-t-il la sécurité de nos données personnelles ?\r\nphysique quantique en dix innovations spectaculaires'),
(16, 'Tout JavaScript ', 'Ce livre s\'adresse à tous les développeurs web, qu\'ils soient débutants ou avancés.\r\nLe JavaScript sert avant tout à rendre les pages web interactives et dynamiques du côté de l\'utilisateur, mais il est également de plus en plus utilisé pour créer des applications complètes, y compris côté serveur.\r\n', 'Olivier Hondermarck', 'computer_science', 3, 'tout-javascript-.629a9fa4591950.08071017.jpg', 'La première partie de ce livre couvre l\'ensemble des fonctionnalités du JavaScript (version ECMAScript 6 jusque ES2020) et passe en revue les bonnes pratiques de programmation.\r\nLa deuxième partie porte sur l\'interactivité avec les utilisateurs (interfaces, formulaires, gestion des erreurs, appels asynchrones, géolocalisation, notifications, dessin...).\r\nLa troisième partie permet de s\'initier aux aspects les plus avancés du JavaScript tels que Node.js, React, Vue.js, jQuery ou les Web Workers.\r\nDUNOD'),
(19, ' Aide-mémoire - C#', 'C# est un langage orienté objet compilé créé par Microsoft en 2001 pour sa plateforme .NET Framework. Le langage C# est un dérivé de C++ et partage de nombreuses similitudes avec Java.\r\nCet aide-mémoire aborde l\'architecture de la plateforme .NET avec le CLR, le langage C# puis des éléments importants de la BCL comme les flux I/O, le réseau, la sérialisation, l\'accès aux données AD0.NET, le multithreading, la reflection, Tinterop native et COM. La troisième partie est consacrée à .NET Core, la version multi-plateformes qui tourne sous Windows, Mac et Linux, avec des introductions à UWP, au développement moderne Windows 10 et un dernier chapitre sur le développement sous Linux avec Kubernetes pour le monde des micro-services.\r\n', 'Christophe Pichaud', 'computer_science', 3, '-aide-mémoire---c.629aa23db55932.19053063.jpg', '.net framework asynchronisme BCL base class library clr multithreading'),
(20, 'Apprendre à programmer avec Python 3', 'Un support de cours réputé et adopté par de nombreux enseignants, avec 60 pages d\'exercices corrigés Reconnu et utilisé par les enseignants de nombreuses écoles et IUT, complété d\'exercices accompagnés de leurs corrigés, cet ouvrage original et érudit est une référence sur tous les fondamentaux de la programmation : choix d\'une structure de données, paramétrage, modularité, orientation objet en héritage, conception d\'interface, multithreading et gestion d\'événements, protocoles de communication et gestion réseau, bases de données... jusqu\'à la désormais indispensable norme Unicode (le format UTF-8). On verra notamment la réalisation avec Python 3 d\'une application web interactive et autonome, intégrant une base de données SQLite. Cette nouvelle édition traite de la possibilité de produire des documents imprimables (PDF) de grande qualité en exploitant les ressources combinées de Python 2 et Python 3.', 'Gérard Swinnen', 'computer_science', 3, 'apprendre-à-programmer-avec-python-3.629aa3087bedf9.00510470.jpg', 'eyerolles  BASE DE DONEES MULTITHREADING PROGRAMMATION WEB PROGRAMMATION RESEAU CHERRYPY TKINTER '),
(21, ' Le livre de Java premier langage', 'Vous apprendrez d\'abord, à travers des exemples simples en Java, à maîtriser les notions communes à tous les langages : variables, types de données, boucles et instructions conditionnelles, etc. Vous franchirez un nouveau pas en découvrant par la pratique les concepts de la programmation orientée objet (classes, objets, héritage), puis le fonctionnement des librairies graphiques AWT et Swing (fenêtres, gestion de la souris, tracé de graphiques). Cet ouvrage vous expliquera aussi comment réaliser des applications Java dotées d\'interfaces graphiques conviviales grâce au logiciel libre NetBeans (version 12). Enfin, vous vous initierez au développement d\'applications avec l\'interface Android Studio.', 'Anne Tasso', 'computer_science', 3, '-le-livre-de-java-premier-langage.629aa39b8e3880.52424867.jpg', 'EXERCIce corrigés best seller '),
(22, 'HTML & JavaScript pour les nuls', 'Apprenez à parler Web !\r\nGrâce à ce livre, HTML, le langage de base du Web, et JavaScript celui qui permet d\'animer vos pages sont enfin à la portée du commun des mortels ! Apprenez à mettre en oeuvre les balises, les frames, la gestion des cookies, les images réactives et les rollovers en quelques heures, et bientôt, HTML et JavaScript n\'auront plus de secret pour vous !\r\n', 'Chris Minnick & Eva Holland & Emily A. VanderVeer & Sue Jenkis & Ed Tittel', 'computer_science', 3, 'html-&-javascript-pour-les-nuls.629aa4081ed364.80068617.jpg', 'Découvrez comment\r\nLes bases pour créer des pages Web\r\nLes CSS ajax json scripts\r\nLes tableaux\r\n'),
(23, 'Guide de mécanique ', 'Un manuel présentant l\'essentiel des connaissances nécessaires aux applications usuelles de la mécanique. Il aborde la statique, la cinématique, la dynamique, la résistance aux matériaux, l\'analyse des contraintes ainsi que la mécanique des fluides et propose des exercices variés tels que des exécutions manuelles, des modélisations, des résolutions, des solutions graphiques ou calculées.', 'Jean-Louis Fanchon', 'mechanics', 3, 'guide-de-mécanique-.629aa4da1f7545.33051353.jpg', 'statique cinematique dynamique  resistance des materiaux  analyse des contrainte mecanique des fluides '),
(24, 'Méchanique analitique (1788)', 'Le présent ouvrage s\'inscrit dans une politique de conservation patrimoniale des ouvrages de la littérature Française mise en place avec la BNF.\r\nHACHETTE LIVRE et la BNF proposent ainsi un catalogue de titres indisponibles, la BNF ayant numérisé ces œuvres et HACHETTE LIVRE les imprimant à la demande.\r\nCertains de ces ouvrages reflètent des courants de pensée caractéristiques de leur époque, mais qui seraient aujourd\'hui jugés condamnables.\r\nIls n\'en appartiennent pas moins à l\'histoire des idées en France et sont susceptibles de présenter un intérêt scientifique ou historique.\r\nLe sens de notre démarche éditoriale consiste ainsi à permettre l\'accès à ces œuvres sans pour autant que nous en cautionnions en aucune façon le contenu.\r\n', 'Joseph-Louis Lagrange', 'mechanics', 3, 'méchanique-analitique.629aa5205ae225.20664189.jpg', 'Bnf  hachette livre '),
(25, 'Mécanique des fluides', 'Cet ouvrage permet d’appliquer les bases de la mécanique des fluides aux problématiques industrielles actuelles. Partant des définitions et propriétés des fluides et allant jusqu’à la notion d’écoulements compressibles, cette nouvelle édition actualisée aborde également la statique, la cinématique, les pertes de charge, les équations de Navier-Stokes, la similitude, la rhéologie, ainsi que les écoulements turbulents.', 'Sakir Amiroudine & Jean-Luc Battaglia', 'mechanics', 3, 'mécanique-des-fluides.629aa625160656.65188310.jpg', 'LICENCE MASTER SCIENCE D\'INGENIEUR SI COURS 70 EXERCICES CORRIGES SCIENCE SLIP'),
(26, 'Mécanique quantique', 'Il y a un paradoxe de la mécanique quantique : voilà une théorie considérable de la physique contemporaine dont on est bien en peine de dire sur quoi elle porte et ce qu\'elle signifie, car cela même ne va pas de soi. Le but de ce livre est de tenter d\'élucider ce paradoxe. Pour cela, il convient de refaire table rase. Dans un premier temps, l\'auteur entend n\'appuyer sa construction que sur les certitudes tacites et les normes qui conditionnent la vie, la communication, et le travail au laboratoire.', 'Michel Bitbol', 'mechanics', 3, 'mécanique-quantique.629aa666a31da4.42781365.jpg', 'CHAMPS SCIENCE INTRODUCTION PHILOSOPHIQUE '),
(27, 'Mécanique pour l\'ingénieur ', 'De la description de la déformation des milieux matériels aux structures multipoutres, cet ouvrage présente en un seul volume toutes les bases modernes théoriques de mécanique des milieux continus étendus aux fluides, solides indéformables et structures élancées.\r\nChaque chapitre débute avec une motivation précise et présente de façon hiérarchisée les éléments et illustrations nécessaires à l\'appropriation des différentes notions, qui sont mises en valeur au travers de résumés synthétiques. Les concepts physiques et mathématiques sont tous définis lors de leur apparition.\r\n', 'Denis Aubry & Anne-Lenaig Hamon', 'mechanics', 3, 'mécanique-pour-l\'ingénieur-.629aaa5447e991.08999206.jpg', 'science slip licence master science d\'ingenieur si milieu continus solides systemes multicores structures '),
(28, 'Les bases de la chimie organique ', 'L’ouvrage conforme au programme de chimie organique du 1er cycle universitaire scientifique, il permet une approche concise et cohérente de cette discipline ; approche fondée avant tout sur une réflexion logique, grâce à l\'étude de 4 mécanismes essentiels en chimie organique (substitution, élimination, addition, transposition) et à une abondante iconographie. Le cours est complété par un chapitre d\'exercices corrigés et commentés.', 'Guy Decodts', 'chemistry', 3, 'les-bases-de-la-chimie-organique-.629aaaea7e7a60.38863032.jpg', 'L’auteur Guy Decodts, maître de conférences à l\'université paris/sud Orsay.\r\nLe public étudiants du 1er cycle universitaire scientifique : médecine, pharmacie, deug a, b et iut, classes préparatoires aux grandes écoles.\r\n medicales'),
(29, 'Chimie, BCPST-Véto', 'Retrouvez dans cet ouvrage :\r\n•	La synthèse du cours\r\nPour apprendre et comprendre, sous forme résumée, les points fondamentaux à retenir.\r\n•	Des savoir-faire clés et conseils méthodologiques\r\nPour acquérir plus d\'efficacité dans votre travail.\r\n•	Des exercices et annales corrigés\r\nDes sujets découpés par chapitre, exploitables au fur et à mesure de l\'année, ainsi que les annales complètes des nouveaux programmes.\r\n', 'Pierre Grécias & Stéphane Rédoglia', 'chemistry', 3, 'chimie,-bcpst-véto.629aab40745cf4.33084249.jpg', 'tout en 1 classe prepas scientifique cp '),
(30, 'Qcm paces national ue1 chimie générale', 'Objectifs :\r\n•	Permettre à son utilisateur d\'acquérir des automatismes\r\n•	Mieux réussir son épreuve\r\n•	Améliorer son classement\r\nContenu :\r\n•	Fiches de synthèse reprenant tous les points essentiels du cours.\r\n•	160 QCM de type concours pour un entraînement complet sur tout le programme et être prêt le jour J.\r\nQCM d\'évaluation des connaissances en début de chapitre.\r\nCorrection détaillée et argumentée pour comprendre les erreurs et ne pas retomber dans les pièges.\r\nSystème-miroir, avec « questions à gauche, réponses à droite ».\r\n', 'Michaël Shum & Romain Guitton', 'Genre', 3, 'qcm-paces-national-ue1-chimie-générale.629aab81d183d9.60080145.jpg', 'VG EDITION '),
(31, 'Qcm paces national ue1 chimie organique', 'Objectifs :\r\n•	Permettre à son utilisateur d\'acquérir des automatismes\r\n•	Mieux réussir son épreuve\r\n•	Améliorer son classement\r\nContenu :\r\n•	Fiches de synthèse reprenant tous les points essentiels du cours.\r\n•	151 QCM de type concours pour un entraînement complet sur tout le programme et être prêt le jour J.\r\nQCM d\'évaluation des connaissances en début de chapitre.\r\nCorrection détaillée et argumentée pour comprendre les erreurs et ne pas retomber dans les pièges.\r\nSystème-miroir, avec « questions à gauche, réponses à droite » \r\n', 'Romain Guitton & Michaël Shum', 'chemistry', 3, 'qcm-paces-national-ue1-chimie-organique.629aabc2f1beb2.89162251.jpg', 'VG EDITION'),
(32, 'Concentré de chimie.', 'Le manuel présente, en 10 chapitres, les bases de la chimie générale, de façon rigoureuse, logique et progressive. Il s\'organise en trois parties :\r\n•	la première partie décrit la matière : atomes, molécules, organisations à l\'état solide, liquide ou gazeux et en solution ;\r\n•	la seconde partie établit les principes de conservation de la matière et d\'énergie qui posent les bases de l\'établissement d\'équations chimiques pondérées et sous-tendent toute transformation chimique ou physico-chimique. Les facteurs cinétiques qui affectent les vitesses de transformations (bio) chimiques sont également décrits ;\r\n•	la troisième partie passe en revue, en les expliquant, les grandes classes de réactions qui s\'observent en solution aqueuse : réactions d\'oxydoréduction, acide-base, de précipitation et de complexation.\r\n', 'Johan Wouters', 'chemistry', 3, 'concentré-de-chimie..629aac43ab6ac1.66011854.jpg', 'atomes 2eme edition universite de namur  press universitaire namur '),
(33, 'Le guide officiel du test Cambridge English Certificate', 'Tout ce qu\'il faut savoir sur le test et ses 4 compétences (Reading and Use of English, Writing, Listening et Speaking)\r\n¤ 150 exercices pour s\'entraîner\r\n¤ 2 tests officiels complets et corrigés pour se tester « en vrai »\r\n¤ De nombreux conseils et astuces pour réussir le test\r\n¤ 26 fiches de grammaire et de vocabulaire\r\n¤ Les fichiers audio téléchargeables en mp3\r\n', 'unknown', 'Genre', 3, 'le-guide-officiel-du-test-cambridge-english-certificate.629aad0c602916.53170908.jpg', 'hachette edition ouvrage approive par createur du test cambridge niveau b2 '),
(34, 'English pictogrammar', 'Une grammaire 100 % visuelle qui s\'adresse à Tous, collégiens, lycéens ou adultes.\r\n¤ 44 infographies : les règles essentielles de l\'anglais, en un clin d\'oeil\r\n¤ 44 explications simples : les éléments-clés à comprendre\r\n¤ des tableaux synthétiques pour mémoriser\r\n¤ 5 infographies à écouter pour mieux décrypter l\'anglais parlé et apprendre à le prononcer de manière authentique\r\n', 'Rebecca Dahm', 'english', 3, 'english-pictogrammar.629aad63ae1124.07038418.jpg', 'good better the best grammaire anglaise infographie Belin  regles essentiels en un clin d\'oeil'),
(35, 'Larousse Vocabulaire anglais', 'Le compagnon idéal pour acquérir tout le vocabulaire indispensable et pouvoir communiquer au quotidien\r\nComplet et pratique\r\n•	Plus de 10 000 mots et expressions\r\n•	Plus de 40 thèmes couvrant le vocabulaire de la vie de tous les jours, des médias, des tendances économiques et de la société contemporaine...\r\n•	De nombreux américanismes\r\n•	Des expressions idiomatiques\r\n', 'unknown', 'english', 3, 'larousse-vocabulaire-anglais.629aadb16342e4.10324161.jpg', 'clés de la reussite  ideal pour progresser en anglais LAROUSSE ');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `textComment` longtext NOT NULL,
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `dateComment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`idUser`, `idBook`) VALUES
(22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE `last_seen` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `seenDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `last_seen`
--

INSERT INTO `last_seen` (`idUser`, `idBook`, `seenDate`) VALUES
(22, 3, '2022-06-04 07:03:45'),
(22, 4, '2022-06-04 07:03:54'),
(22, 6, '2022-06-04 07:17:16'),
(22, 8, '2022-06-04 07:04:16'),
(22, 16, '2022-06-04 07:04:26'),
(22, 25, '2022-06-04 07:17:25'),
(22, 30, '2022-06-04 07:17:43'),
(22, 33, '2022-06-04 07:17:34'),
(23, 3, '2022-06-03 10:24:43'),
(23, 4, '2022-06-03 06:26:30'),
(25, 3, '2022-06-03 08:49:30'),
(25, 4, '2022-06-03 08:49:34'),
(25, 7, '2022-06-04 02:59:38'),
(25, 12, '2022-06-04 02:59:47'),
(25, 15, '2022-06-04 02:59:20'),
(25, 19, '2022-06-04 02:59:16'),
(25, 21, '2022-06-04 02:59:13'),
(25, 23, '2022-06-04 02:59:23'),
(25, 24, '2022-06-04 02:59:27'),
(25, 26, '2022-06-04 02:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idNews` int(11) NOT NULL,
  `textNews` longtext NOT NULL,
  `imgFullNameNews` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `idNotification` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `textNotification` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`idNotification`, `idUser`, `textNotification`) VALUES
(40, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 01:34:31pm</strong>, and should returned before <strong>2022-06-08 01:34:31pm</strong>'),
(41, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 01:34:31pm</strong>, and should returned before <strong>2022-06-08 01:34:31pm</strong>'),
(43, 25, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 01:34:35pm</strong>, and should returned before <strong>2022-06-08 01:34:35pm</strong>'),
(44, 26, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 01:34:35pm</strong>, and should returned before <strong>2022-06-08 01:34:35pm</strong>'),
(46, 25, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 02:58:08pm</strong>, and should returned before <strong>2022-06-08 02:58:08pm</strong>'),
(47, 26, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 02:58:08pm</strong>, and should returned before <strong>2022-06-08 02:58:08pm</strong>'),
(49, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 03:02:56pm</strong>, and should returned before <strong>2022-06-08 03:02:56pm</strong>'),
(50, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 03:02:56pm</strong>, and should returned before <strong>2022-06-08 03:02:56pm</strong>'),
(52, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 03:19:24pm</strong>, and should returned before <strong>2022-06-08 03:19:24pm</strong>'),
(53, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 03:19:24pm</strong>, and should returned before <strong>2022-06-08 03:19:24pm</strong>'),
(55, 25, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 09:15:17pm</strong>, and should returned before <strong>2022-06-08 09:15:17pm</strong>'),
(56, 26, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 09:15:17pm</strong>, and should returned before <strong>2022-06-08 09:15:17pm</strong>'),
(58, 25, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 09:16:06pm</strong>, and should returned before <strong>2022-06-08 09:16:06pm</strong>'),
(59, 26, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-01 09:16:06pm</strong>, and should returned before <strong>2022-06-08 09:16:06pm</strong>'),
(60, 25, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:26:27pm</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-08 09:26:27pm</strong>'),
(61, 25, 'admin have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:26:27pm</strong>, and should returned before <strong>2022-06-08 09:26:27pm</strong>'),
(62, 26, 'admin have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:26:27pm</strong>, and should returned before <strong>2022-06-08 09:26:27pm</strong>'),
(63, 25, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:29:07pm</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-08 09:29:07pm</strong>'),
(64, 25, 'admin have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:29:07pm</strong>, and should returned before <strong>2022-06-08 09:29:07pm</strong>'),
(65, 26, 'admin have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:29:07pm</strong>, and should returned before <strong>2022-06-08 09:29:07pm</strong>'),
(67, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:30:04pm</strong>, and should returned before <strong>2022-06-08 09:30:04pm</strong>'),
(68, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-01 09:30:04pm</strong>, and should returned before <strong>2022-06-08 09:30:04pm</strong>'),
(69, 22, 'You have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 04:11:43am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-09 04:11:43am</strong>'),
(70, 25, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 04:11:43am</strong>, and should returned before <strong>2022-06-09 04:11:43am</strong>'),
(71, 26, 'llizuna2001ll have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 04:11:43am</strong>, and should returned before <strong>2022-06-09 04:11:43am</strong>'),
(72, 22, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-02 04:56:25am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-09 04:56:25am</strong>'),
(73, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-02 04:56:25am</strong>, and should returned before <strong>2022-06-09 04:56:25am</strong>'),
(74, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-02 04:56:25am</strong>, and should returned before <strong>2022-06-09 04:56:25am</strong>'),
(75, 25, 'You have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:09:42am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-09 05:09:42am</strong>'),
(76, 25, 'admin have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:09:42am</strong>, and should returned before <strong>2022-06-09 05:09:42am</strong>'),
(77, 26, 'admin have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:09:42am</strong>, and should returned before <strong>2022-06-09 05:09:42am</strong>'),
(78, 25, 'You have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:10:51am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-09 05:10:51am</strong>'),
(79, 25, 'admin have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:10:51am</strong>, and should returned before <strong>2022-06-09 05:10:51am</strong>'),
(80, 26, 'admin have reserved: <strong>BOOK1</strong> on <strong>2022-06-02 05:10:51am</strong>, and should returned before <strong>2022-06-09 05:10:51am</strong>'),
(81, 23, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:23:24am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:23:24am</strong>'),
(82, 25, 'izuna2001 have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:23:24am</strong>, and should returned before <strong>2022-06-10 06:23:24am</strong>'),
(83, 26, 'izuna2001 have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:23:24am</strong>, and should returned before <strong>2022-06-10 06:23:24am</strong>'),
(84, 23, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:24:02am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:24:02am</strong>'),
(85, 25, 'izuna2001 have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:24:02am</strong>, and should returned before <strong>2022-06-10 06:24:02am</strong>'),
(86, 26, 'izuna2001 have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:24:02am</strong>, and should returned before <strong>2022-06-10 06:24:02am</strong>'),
(87, 23, 'You have reserved: <strong>Java In A Nutshell</strong> on <strong>2022-06-03 06:26:22am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:26:22am</strong>'),
(88, 25, 'izuna2001 have reserved: <strong>Java In A Nutshell</strong> on <strong>2022-06-03 06:26:22am</strong>, and should returned before <strong>2022-06-10 06:26:22am</strong>'),
(89, 26, 'izuna2001 have reserved: <strong>Java In A Nutshell</strong> on <strong>2022-06-03 06:26:22am</strong>, and should returned before <strong>2022-06-10 06:26:22am</strong>'),
(90, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:39:56am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:39:56am</strong>'),
(91, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:39:56am</strong>, and should returned before <strong>2022-06-10 06:39:56am</strong>'),
(92, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:39:56am</strong>, and should returned before <strong>2022-06-10 06:39:56am</strong>'),
(93, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:42:35am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:42:35am</strong>'),
(94, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:42:35am</strong>, and should returned before <strong>2022-06-10 06:42:35am</strong>'),
(95, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:42:35am</strong>, and should returned before <strong>2022-06-10 06:42:35am</strong>'),
(96, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:43:11am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:43:11am</strong>'),
(97, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:43:11am</strong>, and should returned before <strong>2022-06-10 06:43:11am</strong>'),
(98, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 06:43:11am</strong>, and should returned before <strong>2022-06-10 06:43:11am</strong>'),
(99, 22, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:44:35am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:44:35am</strong>'),
(100, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:44:35am</strong>, and should returned before <strong>2022-06-10 06:44:35am</strong>'),
(101, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:44:35am</strong>, and should returned before <strong>2022-06-10 06:44:35am</strong>'),
(102, 22, 'You have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:48:17am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 06:48:17am</strong>'),
(103, 25, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:48:17am</strong>, and should returned before <strong>2022-06-10 06:48:17am</strong>'),
(104, 26, 'llizuna2001ll have reserved: <strong>TITLE 2</strong> on <strong>2022-06-03 06:48:17am</strong>, and should returned before <strong>2022-06-10 06:48:17am</strong>'),
(105, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:00:13am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 08:00:13am</strong>'),
(106, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:00:13am</strong>, and should returned before <strong>2022-06-10 08:00:13am</strong>'),
(107, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:00:13am</strong>, and should returned before <strong>2022-06-10 08:00:13am</strong>'),
(108, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:05:21am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 08:05:21am</strong>'),
(109, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:05:21am</strong>, and should returned before <strong>2022-06-10 08:05:21am</strong>'),
(110, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:05:21am</strong>, and should returned before <strong>2022-06-10 08:05:21am</strong>'),
(111, 22, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:08:53am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 08:08:53am</strong>'),
(112, 25, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:08:53am</strong>, and should be returned before <strong>2022-06-10 08:08:53am</strong>'),
(113, 26, 'llizuna2001ll have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:08:53am</strong>, and should be returned before <strong>2022-06-10 08:08:53am</strong>'),
(114, 25, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:24:34am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 08:24:34am</strong>'),
(115, 25, 'admin have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:24:34am</strong>, and should be returned before <strong>2022-06-10 08:24:34am</strong>'),
(116, 26, 'admin have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:24:34am</strong>, and should be returned before <strong>2022-06-10 08:24:34am</strong>'),
(117, 25, 'You have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:26:15am</strong>, please visit the library to claim your book. And dont forget to return it before <strong>2022-06-10 08:26:15am</strong>'),
(118, 25, 'admin have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:26:15am</strong>, and should be returned before <strong>2022-06-10 08:26:15am</strong>'),
(119, 26, 'admin have reserved: <strong>Math geek</strong> on <strong>2022-06-03 08:26:15am</strong>, and should be returned before <strong>2022-06-10 08:26:15am</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `bookRating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`idUser`, `idBook`, `bookRating`) VALUES
(22, 3, 3.7),
(22, 4, 4.5),
(22, 6, 3.5),
(22, 8, 3.5),
(22, 16, 3.4),
(22, 25, 3.5),
(23, 3, 3.4);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idUser` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `typeUser` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `typeUser`) VALUES
(22, 'llizuna2001ll', 'issam.fladi@gmail.com', '$2y$10$JHO3AeoGU6/ndDBidMWz4eFpt90Fb/C9nqbCTkuPuLxu86vvoFVBy', 'student'),
(23, 'izuna2001', 'issaw.fladi@gmail.com', '$2y$10$kq/FPjgrMks/zm0IE.SRS.N6ppyAYRWBm0J5zqj3KDRdesCEL8VHG', 'professor'),
(25, 'admin', 'admin@admin.com', '$2y$10$P5RRkLDbRnqoyUJFb4CiCuBK644dNN2Z.jjNaWuxHRMOGpazbBh5e', 'admin'),
(26, 'admin2', 'admin2@admin.com', '$2y$10$4WOoJguYhnQclFBnsR8Dr.BnB5nbVAdxZxpOuIa6t8Qqek6Y4A7HS', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`idUser`,`idBook`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `last_seen`
--
ALTER TABLE `last_seen`
  ADD PRIMARY KEY (`idUser`,`idBook`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idNotification`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idUser`,`idBook`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idUser`,`idBook`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `idNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `last_seen`
--
ALTER TABLE `last_seen`
  ADD CONSTRAINT `last_seen_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `last_seen_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
