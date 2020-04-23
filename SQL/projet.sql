-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 avr. 2020 à 15:56
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `dieux`
--

CREATE TABLE `dieux` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dieux`
--

INSERT INTO `dieux` (`id`, `name`, `description`, `content`, `image`) VALUES
(1, 'Odin', 'Odin (du vieux norrois Óðinn) est le dieu principal de la mythologie nordique. Il existe dans la mythologie germanique en général, où il est appelé Wōden en vieil anglais, Wodan en vieux saxon des Pays-Bas ou Wotan en vieux haut-allemand ou Gaut. Son nom proto-germanique est Wōdanaz. L\'étymologie de son nom fait référence à Ód, et signifie « fureur », aux côtés d\'« esprit » et de « poésie », d\'où l\'allemand Wut (fureur) et le néerlandais woede de même sens. C\'est un dieu polymorphe.', 'Odin (du vieux norrois Óðinn) est le dieu principal de la mythologie nordique. Il existe dans la mythologie germanique en général, où il est appelé Wōden en vieil anglais, Wodan en vieux saxon des Pays-Bas ou Wotan en vieux haut-allemand ou Gaut. Son nom proto-germanique est *Wōdanaz. L\'étymologie de son nom fait référence à Ód, et signifie « fureur », aux côtés d\'« esprit » et de « poésie », d\'où l\'allemand Wut (fureur) et le néerlandais woede de même sens. C\'est un dieu polymorphe.\r\n\r\nSon rôle, comme pour la plupart des dieux nordiques, est complexe, étant donné que ses fonctions sont multiples : il est le dieu des morts, de la victoire, et du savoir. Dans une moindre mesure, il est également considéré comme le patron de la magie, de la poésie, des prophéties, de la guerre et de la chasse. Il est considéré comme étant le principal membre des Ases. Odin partage la fête de Yule, qui est célébrée le 21 décembre, avec le dieu Ull. Son fils est nommé Thor.\r\n\r\nLe lieu de résidence d\'Odin est le palais de Valaskjálf, situé en Ásgard, où se trouve également son trône, appelé Hlidskjalf, d\'où il peut observer les neuf mondes de la cosmologie nordique. Il possède plusieurs objets fabuleux, sa lance Gungnir et son anneau Draupnir, et monte son cheval à huit jambes nommé Sleipnir. Son domaine n\'est pas accessible aux mortels et est relié à la terre par un arc-en-ciel que seuls les dieux et quelques créatures les servant peuvent apercevoir1.\r\n\r\nFils de Bor et de la géante Bestla, il a pour frères Vili et Vé. Son épouse est Frigg ; il a de nombreux enfants, dont les dieux Thor, Baldr, Höd et Hermöd.', 'app/public/images/odin.jpg'),
(2, 'Frigg', 'Dans la mythologie nordique, Frigg était l’épouse d’Odin et par conséquent la reine des Ases. Mère de Balder et Höd, elle était la seule femme autorisée à s’asseoir sur Hlidskjalf (« tour de guet ») d’où elle conseillait son mari sur les questions importantes. Dans sa demeure à Ásgard, nommée Fensalir (« salle des marécages »), elle occupait ses journées à filer les nuages. D’ailleurs, elle est souvent représentée avec un rouet. Elle était la patronne des sibylles, des devineresses et des fées.\r\n\r\n', 'Dans la mythologie nordique, Frigg était l’épouse d’Odin et par conséquent la reine des Ases. Mère de Balder et Höd, elle était la seule femme autorisée à s’asseoir sur Hlidskjalf (« tour de guet ») d’où elle conseillait son mari sur les questions importantes. Dans sa demeure à Ásgard, nommée Fensalir (« salle des marécages »), elle occupait ses journées à filer les nuages. D’ailleurs, elle est souvent représentée avec un rouet. Elle était la patronne des sibylles, des devineresses et des fées.\r\n\r\nÉgalement connue sous les noms de Friggja (en Suède), Fricka (dans les opéras de Wagner) ou Frea (au sud de l’Allemagne), elle était la déesse de l’amour, du mariage, de la maternité et pouvait prédire l’avenir.\r\n\r\nDans la mythologie nordique, Frigg appartient à la plus haute hiérarchie des Ases (un des deux panthéons de la mythologie nordique, l’autre étant les Vanes). Devenue la reine du Ciel (en) par son mariage avec Odin, elle préfère s’installer dans sa propre demeure, Fensalir, plutôt que dans le somptueux palais de son époux. Mère de Balder et Höd, elle est la seule femme autorisée à s’asseoir sur le trône Hlidskjálf, d’où elle pouvait admirer les Neuf Mondes.\r\n\r\nDéesse de la fertilité, l’amour, la gestion du ménage, le mariage et la maternité, Frigg était célèbre pour sa prescience. En effet, elle avait la réputation de connaître la destinée de chaque individu, mais ne la révélait jamais. Frigg était le patron des femmes et des agriculteurs. Elle était également associée à la guérison et était appelée auprès des agonisants, afin de faciliter leur transition entre la vie et la mort.\r\n\r\nRéputée pour être une mère et épouse dévouée, la déesse nourrissait une passion dévorante envers l’or. Un mythe raconte qu’elle était devenue jalouse d’une statue d’or à l’effigie de son époux, sculptée par ses adorateurs. Elle n’hésita pas à passer la nuit avec l’un de ses serviteurs, afin de le convaincre de détruire la statue et de récupérer l’or pour lui en faire des bijoux.', 'app/public/images/frigg.jpg'),
(3, 'Baldr', 'Dans la mythologie nordique, Baldr (latin : Balderus) est le dieu Ase de la lumière, la beauté, la jeunesse et l\'amour. Il est le fils d\'Odin et de Frigg. Son épouse est Nanna, et leur fils Forseti. Son domaine est Breidablik, qui est dans les cieux (ou en Suède, selon la Ynglinga Saga), dans une contrée d\'où le mal est banni. Par jalousie, le dieu Loki cause sa mort.', 'Dans la mythologie nordique, Baldr (latin : Balderus) est le dieu Ase de la lumière, la beauté, la jeunesse et l\'amour. Il est le fils d\'Odin et de Frigg. Son épouse est Nanna, et leur fils Forseti. Son domaine est Breidablik, qui est dans les cieux (ou en Suède, selon la Ynglinga Saga), dans une contrée d\'où le mal est banni. Par jalousie, le dieu Loki cause sa mort. Baldr est alors envoyé dans le monde des morts et Loki est puni pour ses méfaits, précipitant l\'arrivée de la bataille prophétique du Ragnarök où la majorité des dieux périront. Néanmoins Baldr en sera épargné et avec quelques autres survivants il prendra part au renouveau.', 'app/public/images/baldr.jpg'),
(4, 'Loki', 'Loki, aussi appelé Loptr ou Hveðrungr (et Loge dans la tétralogie de Wagner), est le dieu de la malice, de la discorde et des illusions dans la mythologie nordique. Il est le fils du géant Farbauti et de Laufey. Loki est le père de plusieurs monstres : le serpent Jörmungand, le loup Fenrir et la déesse du monde des morts Hel. Il est également le parent du cheval d\'Odin à huit jambes Sleipnir. Malgré ses origines, il est accueilli dans le panthéon divin des Ases par Odin.', 'Loki, aussi appelé Loptr ou Hveðrungr (et Loge dans la tétralogie de Wagner), est le dieu de la malice, de la discorde et des illusions dans la mythologie nordique. Il est le fils du géant Farbauti et de Laufey. Loki est le père de plusieurs monstres : le serpent Jörmungand, le loup Fenrir et la déesse du monde des morts Hel. Il est également le parent du cheval d\'Odin à huit jambes Sleipnir. Malgré ses origines, il est accueilli dans le panthéon divin des Ases par Odin.\r\n\r\nLoki est capable de métamorphose ; il est aussi impulsif et irresponsable que malin et rusé. Les Ases ont souvent recours à lui pour régler des problèmes dont il est bien souvent lui-même la cause. De nature fondamentalement négative et traître, sa jalousie l\'amène à causer la mort du dieu Baldr. Furieux, les Ases le punissent en l\'attachant avec les entrailles d\'un de ses fils sous un serpent dont le venin goutte sur son visage. Il en sera ainsi jusqu\'à la fin prophétique du monde, le Ragnarök, où Loki se libèrera et mènera les géants à l\'assaut contre les dieux et les hommes. Loki et son dieu opposé, Heimdall, s\'entretueront pendant la bataille.\r\n\r\nLa nature changeante et ambiguë de Loki est sujette à débats chez les spécialistes quant à son rôle dans le panthéon divin, et il a été comparé à divers personnages d\'autres mythologies. Loki est un dieu récurrent et célèbre qui a survécu dans le folklore moderne d\'Europe du Nord ; son personnage est référencé et source d\'inspiration dans de nombreuses œuvres de la culture moderne.', 'app/public/images/loki.jpg'),
(5, 'Thor', 'Thor est le dieu du Tonnerre dans la mythologie nordique. Il est l\'un des principaux dieux du panthéon nordique, et fut vénéré dans l\'ensemble du monde germanique. On trouve ainsi différentes formes et graphies de son nom selon les régions : Þórr ou Þunarr en vieux norrois, Þunor en anglo-saxon, Þonar en frison occidental, Donar en vieux haut-allemand, du proto-germanique þunraR qui signifie « tonnerre ». Initialement Thor est le « Tonnerre », un attribut du Ciel-Père.', 'Thor est le dieu du Tonnerre dans la mythologie nordique. Il est l\'un des principaux dieux du panthéon nordique, et fut vénéré dans l\'ensemble du monde germanique. On trouve ainsi différentes formes et graphies de son nom selon les régions : Þórr ou Þunarr en vieux norrois, Þunor en anglo-saxon, Þonar en frison occidental, Donar en vieux haut-allemand, du proto-germanique *þunraR qui signifie « tonnerre ». Initialement Thor est le « Tonnerre », un attribut du Ciel-Père.\r\n\r\nSon culte est d\'abord rapporté dans le monde germanique par des chroniqueurs extérieurs, notamment par Tacite. Toutefois, les mythes qui lui sont associés se retrouvent principalement dans les Eddas, textes scandinaves rédigés et compilés aux alentours du xiiie siècle, soit quelques siècles après la christianisation officielle des derniers royaumes vikings.\r\n\r\nD\'après ces textes scandinaves, Thor est le plus puissant des dieux guerriers. Symbolisant la force, la valeur, l\'agilité et la victoire, il utilise la foudre et apaise ou excite les tempêtes. Ses pouvoirs sont ainsi liés au ciel. Il possède un char tiré par deux boucs qui lui permet de traverser les mondes. Son attribut le plus célèbre est son marteau Mjöllnir, avec lequel il crée la foudre, et qui lui permet surtout d\'être le protecteur des dieux et des hommes face aux forces du chaos, comme les géants, qu\'il abat régulièrement et dont il est le pire ennemi. En tant que dieu de l\'orage, il apporte la pluie, ce qui fait également de lui une divinité liée à la fertilité. Il est le fils d\'Odin et de Jörd, et a pour épouse la déesse aux cheveux d\'or Sif.', 'app/public/images/thor.jpg'),
(6, 'Freyja', 'Freyja est une déesse majeure dans le paganisme germanique et nordique, où de nombreux contes l’impliquent ou la représentent. Néanmoins les meilleures sources documentées de cette tradition religieuse, la mythologie nordique, sont à prendre avec prudence car elles ont pu subir l\'influence des représentations chrétiennes ou classiques.', 'Freyja est une déesse majeure dans le paganisme germanique et nordique, où de nombreux contes l’impliquent ou la représentent. Néanmoins les meilleures sources documentées de cette tradition religieuse, la mythologie nordique, sont à prendre avec prudence car elles ont pu subir l\'influence des représentations chrétiennes ou classiques.\r\n\r\nEn effet, elles nous ont été transmises, en grande partie, par l\'intermédiaire d\'historiens médiévaux islandais, alors que l\'île était convertie au christianisme depuis plus de deux siècles. La majorité de ces textes, issus de la tradition orale scandinave, ont été mis à l\'écrit en Islande au xiie siècle et xiiie siècle par des auteurs chrétiens. Le culte et les pratiques rituelles associées à cette déesse sont de ce fait mal connus. Dans les croyances pré-chrétiennes, Freyja représenterait un des trois visages de la Grande Déesse Mère, avec les déesses Frigg et Skadi.\r\n\r\nDans la mythologie nordique, Freyja est de la famille des dieux Vanes, elle est la fille de Njörd et la sœur jumelle de Freyr. Ses filles s\'appellent Hnoss et Gersimi.', 'app/public/images/freyja.jpg'),
(7, 'Freyr', 'Freyr (parfois francisé en Frey) est un des principaux dieux de la mythologie nordique. Il est associé à la prospérité, et selon plusieurs sources il commande la pluie et les rayons du Soleil, faisant de lui un dieu de la fertilité - d\'autant plus qu\'il est parfois représenté dans l\'art ancien avec son pénis en érection.', 'Freyr (parfois francisé en Frey) est un des principaux dieux de la mythologie nordique. Il est associé à la prospérité, et selon plusieurs sources il commande la pluie et les rayons du Soleil, faisant de lui un dieu de la fertilité - d\'autant plus qu\'il est parfois représenté dans l\'art ancien avec son pénis en érection.\r\n\r\nSon mythe est connu grâce aux Eddas, textes de mythologie nordique rédigés au xiiie siècle à partir de sources plus anciennes, qui font de Freyr un dieu Ase, frère de Freyja, la déesse de l\'amour, et le fils de Njörd. Dans son mythe le plus célèbre, il observe les mondes depuis le trône d\'Odin, et aperçoit la géante Gerd, dont il tombe désespérément amoureux. Il envoie alors son écuyer au pays des géants pour la convaincre de l\'épouser. Freyr sera finalement tué par Surt lors de la bataille prophétique du Ragnarök.\r\n\r\nFreyr est également un protagoniste dans la Geste des Danois, où il porte le nom de Frø, et la Saga des Ynglingar, où il est également appelé Yngvi ou Ygnvi-Freyr, textes fortement évhéméristes écrits respectivement aux xiie et xiiie siècles. Sa plus ancienne mention date du xie siècle, où Adam de Brême le nomme Fricco et décrit son culte. Son culte est également évoqué dans de nombreuses sagas islandaises, mais ces œuvres ayant été écrites quelques siècles après la Christianisation de l\'Islande, elles sont à prendre avec précaution.\r\n\r\nSi peu de mythes sur Freyr nous sont parvenus, l\'importance du dieu est attestée par les dires des sources primaires et sa récurrence dans la toponymie des pays nordiques. Plusieurs spécialistes estiment qu\'avec Odin et Thor, Freyr faisait partie de la principale triade divine.', 'app/public/images/freyr.jpg'),
(8, 'Heimdall', 'Heimdall (de Heimdallr en vieux norrois qui signifie peut-être « pôle du monde ») est un dieu ase de la mythologie nordique. Il est le gardien du pont Bifröst (l\'arc-en-ciel qui sépare Ásgard des mondes inférieurs) et a pour charge de souffler dans Gjallarhorn lorsque viendra le Ragnarök.', 'Heimdall (de Heimdallr en vieux norrois qui signifie peut-être « pôle du monde ») est un dieu ase de la mythologie nordique. Il est le gardien du pont Bifröst (l\'arc-en-ciel qui sépare Ásgard des mondes inférieurs) et a pour charge de souffler dans Gjallarhorn lorsque viendra le Ragnarök. Pendant le Ragnarök, Heimdall est destiné à tuer Loki et à être tué par lui. Il est également le dieu de la lumière et de la lune, fils des neuf mères appelées les vierges ou filles de Geirrendour ou d\'Ægir.\r\n\r\nHeimdall est probablement originellement un dieu du feu et « un dieu de la colonne du monde, c\'est-à-dire le dieu du centre du monde et de l\'ordre sacré ».\r\n\r\nDe manière comparable au dieu latin Janus, il est un dieu des commencements. Il engendre la société avec ses trois classes différenciées. Il est le dieu de l\'ordre primordial.\r\n\r\nL\'opposition de nature qui existe entre Heimdall et Loki est révélatrice de leur profond antagonisme. Il n\'est pas étonnant qu\'ils se disputent le collier des Brisingar et qu\'ils s\'affrontent lors du Ragnarök. Heimdall est le dieu d\'un âge d\'or.\r\n\r\n« Face à lui, Loki incarne la subversion sous toutes ses formes, destructrice de cet ordre, et cause de la décadence qui conduit à la catastrophe cosmique ». C\'est la raison pour laquelle les destins de Heimdall et de Loki sont étroitement liés et qu\'ils sont appelés à se combattre durant le Ragnarök.', 'app/public/images/heimdall.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `god` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `god`, `image`) VALUES
(1, '1', 'app/public/images/gallery/odin-wallpaper1.jpg'),
(2, '1', 'app/public/images/gallery/odin-wallpaper2.jpg'),
(3, '1', 'app/public/images/gallery/odin-wallpaper3.jpg'),
(4, '1', 'app/public/images/gallery/odin-wallpaper4.jpg'),
(5, '2', 'app/public/images/gallery/frigg-wallpaper1.jpg'),
(6, '2', 'app/public/images/gallery/frigg-wallpaper2.jpg'),
(7, '4', 'app/public/images/gallery/thor-vs-loki.jpg'),
(8, '6', 'app/public/images/gallery/freya-wallpaper.jpg'),
(9, '6', 'app/public/images/gallery/freya-wallpaper1.jpg'),
(10, '6', 'app/public/images/gallery/freya-wallpaper2.jpg'),
(11, '5', 'app/public/images/gallery/thor-wallpaper.jpg'),
(12, '5', 'app/public/images/gallery/thor-wallpaper1.jpg'),
(14, '6', 'app/public/images/gallery/freya-wallpaper.jpg'),
(15, '5', 'app/public/images/gallery/thor-wallpaper2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`) VALUES
(1, 'admin', '$2y$10$AhIeiBej2KW0zDXVoHOpL.NnS4KQNEsIUL74mJkuHLAwEt04/KFky');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dieux`
--
ALTER TABLE `dieux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dieux`
--
ALTER TABLE `dieux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
