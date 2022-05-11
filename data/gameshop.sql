-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2022 г., 19:15
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gameshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `idBasket` int NOT NULL,
  `idUserBasket` int NOT NULL,
  `dataOrder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`idBasket`, `idUserBasket`, `dataOrder`) VALUES
(1, 1, '2021-11-08'),
(2, 1, '2021-11-08'),
(3, 1, '2021-11-09'),
(4, 1, '2021-11-09'),
(5, 1, '2021-11-12'),
(6, 1, '2021-12-03');

-- --------------------------------------------------------

--
-- Структура таблицы `developer`
--

CREATE TABLE `developer` (
  `idDeveloper` int NOT NULL,
  `developers` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `developer`
--

INSERT INTO `developer` (`idDeveloper`, `developers`) VALUES
(1, 'Bethesda Game Studios'),
(2, 'Facepunch Studios'),
(3, 'DICE'),
(4, 'Limbic Entertainment'),
(5, 'CD PROJEKT RED'),
(6, 'EA Canada'),
(7, 'Guerrilla'),
(8, 'NetherRealm Studios'),
(9, 'QLOC'),
(10, 'Shiver'),
(11, 'Avalanche Studios'),
(12, 'Bohemia Interactive'),
(13, 'Ghost Games'),
(14, 'Zenimax Online Studios'),
(15, 'Ubisoft Montreal');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_smezh`
--

CREATE TABLE `dev_smezh` (
  `idDevelopersSmezh` int NOT NULL,
  `idProduct` int NOT NULL,
  `idDevelopers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `dev_smezh`
--

INSERT INTO `dev_smezh` (`idDevelopersSmezh`, `idProduct`, `idDevelopers`) VALUES
(1, 1, 8),
(2, 1, 9),
(3, 1, 10),
(4, 2, 5),
(5, 3, 2),
(6, 4, 3),
(7, 5, 4),
(8, 6, 5),
(9, 7, 15),
(10, 8, 6),
(11, 9, 7),
(12, 10, 11),
(13, 11, 12),
(14, 12, 13),
(15, 13, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `orderbasket`
--

CREATE TABLE `orderbasket` (
  `id` int NOT NULL,
  `idOrder` int NOT NULL,
  `idOrderProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orderbasket`
--

INSERT INTO `orderbasket` (`id`, `idOrder`, `idOrderProduct`) VALUES
(15, 1, 2),
(13, 1, 7),
(14, 1, 10),
(16, 2, 7),
(17, 2, 12),
(19, 3, 13),
(20, 4, 12),
(21, 5, 2),
(22, 6, 4),
(23, 6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `photoalbum`
--

CREATE TABLE `photoalbum` (
  `id` int NOT NULL,
  `idProduct` int NOT NULL,
  `IMG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `photoalbum`
--

INSERT INTO `photoalbum` (`id`, `idProduct`, `IMG`) VALUES
(4, 2, 'Cyberpunk_2077_1.png'),
(5, 11, 'DayZ_1.png'),
(6, 12, 'Need_for_Speed_Heat_1.png'),
(7, 13, 'The_Elder_Scrolls_Online_1.png'),
(8, 2, 'Cyberpunk_2077_2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `idProduct` int NOT NULL,
  `idCategory` int NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `idPhotoAlbum` int NOT NULL,
  `titleImg` text NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `publisher` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `developers` int NOT NULL,
  `price` int NOT NULL,
  `discount` int DEFAULT NULL,
  `idSystemRequirements` int NOT NULL,
  `idSubCategories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `idCategory`, `title`, `description`, `idPhotoAlbum`, `titleImg`, `releaseDate`, `publisher`, `developers`, `price`, `discount`, `idSystemRequirements`, `idSubCategories`) VALUES
(1, 1, 'Mortal Kombat 11: Aftermath Expansion', 'Mortal Kombat 11 – новая часть популярного файтинга от американской студии NetherRealm Studios. Вместе с вернувшимися добиваниями — Фаталити и Бруталити, в геймплее появились новые приёмы, такие как Fatal Blow (Смертельный удар) и Krushing Blow (Сокрушительный удар). Fatal Blow — особый приём, который наносит большой урон противнику, но становится доступным только тогда, когда здоровье игрока ниже 30 %. Fatal Blow является заменой приёма X-Ray (Рентген) и может быть выполнен только один раз за матч. Krushing Blow — особая кинематографическая разновидность данного специального приёма, срабатываемая при выполнении определённых требований.\r\n\r\nMortal Kombat 11 также представляет систему экипировки, аналогичную последней игре NetherRealm Studios по вселенной DC Injustice 2. Однако система экипировки в Mortal Kombat 11 в большей степени косметическая, и в то же время она сохраняет настройки списка приёмов в системе вариаций, которые были впервые представлены в Mortal Kombat X, что позволяет игрокам создавать собственные списки приёмов на основе вариаций выбранных персонажей.', 1, 'MortalKombat11AftermathExpansion.jpg', '2019-04-23', 'Warner Bros Interactive Entertainment', 1, 825, 70, 1, 1),
(2, 1, 'Cyberpunk 2077', 'Cyberpunk 2077 — приключенческая ролевая игра, действие которой происходит в мегаполисе Найт-Сити, где власть, роскошь и модификации тела ценятся выше всего. Вы играете за V, наёмника в поисках устройства, позволяющего обрести бессмертие. Вы сможете менять киберимпланты, навыки и стиль игры своего персонажа, исследуя открытый мир, где ваши поступки влияют на ход сюжета и всё, что вас окружает.\r\nИГРАЙТЕ ЗА ГОРОДСКОГО НАЁМНИКА\r\nСтаньте киберпанком — оснащённым имплантами наёмником — и сделайте себе имя на улицах Найт-Сити.\r\nЖИВИТЕ В ГОРОДЕ БУДУЩЕГО\r\nИсследуйте огромный мир Найт-Сити, который выглядит ярче, сложнее и глубже всего, что вы видели раньше.\r\nИЩИТЕ ИМПЛАНТ, ДАЮЩИЙ ВЕЧНУЮ ЖИЗНЬ\r\nВозьмитесь за самое опасное задание в своей жизни и найдите прототип импланта, позволяющего обрести бессмертие.', 2, 'Cyberpunk2077.png', '2020-09-17', 'CD PROJEKT RED', 2, 2000, 50, 2, 2),
(3, 1, 'RUST', 'Rust (Раст) – онлайн игра на тему выживания в жестоких условиях. Ты попадаешь на остров, который населен жуткими тварями, а также другими игроками, которые запросто могут стать твоими врагами. Твоими врагами станут не только живые существа, а и голод, и постоянно переменчивая погода. Ты можешь умереть от голода, либо замерзнуть в холодную ночь. Каждая твоя минута, проведенная на острове, буде на счету, поэтому будь очень внимательным, чтобы не лишиться жизни. Ты сможешь бродить по локациям в поисках предметов, при этом преодолевая многочисленные препятствия и борясь с врагами. Но не все игроки в игре будут настроены враждебно, здесь ты также сможешь завести новые знакомства и вместе построить защищенную базу. Другие игроки будут постоянно нападать на ваше убежище, желая забрать все ваши припасы, поэтому вам нужно как следует вооружиться, чтобы дать отпор противнику.', 3, 'rust.png', '2013-12-11', 'Facepunch Studios', 3, 1500, 33, 3, 3),
(4, 1, 'Battlefield V', 'Вас ждёт максимальное погружение в атмосферу Battlefield™ V. Примите участие в величайшем конфликте за всю историю человечества с полным арсеналом оружия, техники и устройств, а также лучшими элементами персонализации за первые два года существования игры.\r\n\r\nBattlefield V ориентирована на внутриигровое отрядное взаимодействие. В игру введена система нехватки ресурсов, которая вынуждает игрока продумывать действия, а также экономить ресурсы и очки здоровья. Особое внимание уделено кастомизации с помощью новой системы, где игроки могут создавать персонажей с различной внешностью и оружием. Косметические предметы и валюта, используемая для их покупки, зарабатываются путём выполнения внутриигровых задач. Также появилась возможность строить небольшие защитные сооружения.', 4, 'BattlefieldV.jpg', '2018-11-09', 'Electronic Arts', 4, 3500, 43, 4, 4),
(5, 1, 'Might and Magic: Heroes VII', 'В центре сюжета дополнения Trial by Fire - конфликт между Священной империей Грифона и королевством гномов - Гримхеймом. Вас ждет новая захватывающая история в полюбившейся вселенной.\r\n\r\nНовый контент и разнообразие тактических приемов\r\n\r\nПройдите две новые захватывающие кампании, повествующие о недавно коронованном императоре Иване Грифоне и легендарных героях народа гномов. Насладитесь усовершенствованными игровыми механиками и дополнительным контентом, включающим шесть новых карт для игры в режиме «Схватка» и два дополнительных сценария, созданных знаменитым сценаристом Терри Б. Рэем, работавшим над созданием игры Heroes of Might and Magic IV.\r\n', 5, 'MightandMagicHeroesVII.jpg', '2015-09-29', 'Ubisoft', 5, 1400, 50, 5, 5),
(6, 1, 'Total War: WARHAMMER II', 'Total War: WARHAMMER II - это стратегическая игра поистине грандиозных масштабов. Вам предстоит выбрать одну из четырех уникальных рас и начать эпическую войну с целью спасти или уничтожить огромный и яркий фэнтезийный мир.\r\n\r\nИгра состоит из двух основных частей - походовой стратегической кампании в открытом мире и тактических сражений в реальном времени среди причудливых ландшафтов Нового Света.\r\n\r\nВы сможете вникать в тонкости глобальной политики в тщательно проработанной кампании и наслаждаться бесконечным разнообразием сетевых сражений, составив собственную армию из любимых отрядов. Какими бы ни были ваши предпочтения, Total War: WARHAMMER II подарит вам сотни часов увлекательной игры.', 6, 'TotalWarWARHAMMERII.jpg', '2017-09-28', 'CD PROJEKT RED', 6, 2489, 66, 6, 6),
(7, 1, 'Tom Clancy\'s Rainbow Six® Siege', 'Освойте искусство разрушения и использования устройств в Rainbow Six Осада. Игроков ждут напряженные бои на коротких дистанциях и открытом пространстве. Новая часть серии игр Tom Clancy’s Rainbow Six выводит жаркие перестрелки, сноровку и опыт, тактическое планирование и соревновательный аспект на новый уровень.\r\n\r\nРазрушение — основа игрового процесса Rainbow Six Осада.\r\nКасательно стратегии защиты игра предоставляет практически неограниченные возможности: оперативникам доступны всевозможные средства усиления стен и полов, ростовые щиты, колючая проволока, и многое другое.\r\nАтакующая сторона сможет захватить позицию противника с помощью разведывательных роботов, пробивных зарядов и других инструментов, используемых при штурме.\r\n\r\nНабирайте команду из опытнейших оперативников спецподразделений со всего мира. Используйте новейшие технологии выслеживания врага. Разрушайте стены, чтобы создать новые огневые позиции. Пробивайте бреши в полу и потолке и используйте их как новые точки входа. Применяйте оружие и устройства, доступные в снаряжении, чтобы изменить окружение, обнаружить врага, перехитрить его и устранить угрозу.', 7, 'TomClancysRainbowSixSiege.png', '2015-12-01', 'Ubisoft', 7, 2489, 66, 7, 7),
(8, 1, 'FIFA 22', 'Заряжено футболом. EA SPORTS™ FIFA 22 приближает игру к реальности с фундаментальными улучшениями игрового процесса и инновациями во всех режимах.\r\n\r\nЧто такое FIFA?\r\n\r\nИграйте во всемирную игру — в вашем распоряжении более 17 000 игроков, 700 команд и 90 стадионов, а также более 30 лиг со всего мира.\r\n\r\nИГРОВЫЕ РЕЖИМЫ\r\nРежим карьеры – Воплотите свои мечты — как тренера, так и игрока — в жизнь в FIFA 22. Соберите новый клуб в FIFA, придумайте дизайн формы, создайте стиль стадиона и выбирайте — играть среди элиты или поднимать ваш клуб к славе из нижних дивизионов. Или же проверьте свое мастерство в качестве игрока в режиме карьеры: оцените новые способы прогрессировать и добиваться успеха и с головой погрузитесь в восхождение вашего игрока в футбольной иерархии.\r\n\r\n\r\nVOLTA FOOTBALL – Верните футбол на улицы в режиме VOLTA FOOTBALL. Создайте игрока, выберите экипировку и демонстрируйте свой уличный стиль в одиночку или в команде на игровых площадках по всему миру. Новый стиль игрового процесса вознаграждает вас за ваше мастерство работы с мячом. Играйте в уникальных событиях в особых локациях в каждом сезоне и открывайте новую экипировку в новой системе сезонного прогресса, с которой вы зарабатываете опыт для всех представленных в VOLTA FOOTBALL наград, в каком бы режиме вы ни играли.\r\nFIFA Ultimate Team — Играйте в самом популярном режиме в FIFA — FIFA Ultimate Team. Соберите состав вашей мечты из тысяч игроков со всего мира, придайте своему клубу настоящую индивидуальность, выбрав уникальные формы, эмблемы и даже внешний вид целого стадиона FUT, и участвуйте с вашей командой в матчах против ИИ или других игроков из сообщества FUT. А еще встречайте возвращение в игру самых памятных футболистов в качестве Героев FUT — они снова выйдут на поле.\r\n\r\nНепревзойденная реалистичность— Играйте самыми знаменитыми игроками в главных турнирах мира, таких как UEFA Champions League, UEFA Europa League, новая UEFA Europa Conference League, CONMEBOL Libertadores, CONMEBOL Sudamericana, Премьер-Лига, Бундеслига и LaLiga Santander.\r\n', 8, 'fifa22.png', '2021-09-27', 'Electronic Arts', 8, 3500, NULL, 8, 8),
(9, 1, 'Horizon Zero Dawn™ Complete Edition', 'БОЛЬШЕ НЕ НАША ЗЕМЛЯ\r\n\r\nВместе с Элой отправляйтесь в путешествие по загадочному миру смертоносных машин.\r\n\r\nЮная охотница-изгой стремится узнать свое предназначение... и остановить катастрофу.\r\n\r\nИспользуйте сокрушительные атаки против уникальных машин и представителей враждебных племен, исследуя опасную дикую природу.\r\n\r\nПолное издание для ПК включает получившую множество наград ролевую игру Horizon Zero Dawn™ и дополнение The Frozen Wilds с новыми землями, умениями, оружием и машинами.\r\n\r\nВКЛЮЧАЕТ:\r\n• Игра Horizon Zero Dawn\r\n• Дополнение The Frozen Wilds\r\n• Костюм следопыта шторма и мощный лук племени Карха\r\n• Набор торговца племени Карха\r\n• Костюм первопроходца и бронебойный лук племени Банук\r\n• Набор путешественницы племени Банук\r\n• Набор хранительницы племени Нора\r\n', 9, 'HorizonZeroDawnCompleteEdition.jpg', '2017-03-01', 'PlayStation Mobile, Inc.', 9, 2800, 40, 9, 9),
(10, 1, 'Mad Max', 'Играйте за Безумного Макса, непрогибаемого героя и настоящего бойца, единственное чего он хочет - оставить безумие позади и найти покой.\r\nСтаньте Безумным Максом, одиноким воином в диком постапокалиптическом мире, где ключ к выживанию - автомобиль. В этом мире, полном опасностей, действие происходит от третьего лица. Чтобы выжить в Пустоши, вы должны драться, участвуя в рукопашных и автомобильных боях против бандитских шаек. Макс - несгибаемый герой и отчаянный боец, единственное чего он хочет - оставить безумие позади и найти утешение в легендарной «Безмолвной Равнине». Игрокам предстоит пройти множество коварных миссий, глубже и глубже исследуя бескрайние просторы Пустоши в поисках запасов и материалов для постройки безотказной и совершенной боевой машины.\r\n', 10, 'madMax.png', '2015-09-01', 'Warner Bros. Interactive Entertainment', 10, 899, 75, 10, 10),
(11, 1, 'DayZ', 'DayZ — это хардкорная игра про выживание в открытом мире, где у вас одна цель: выжить любой ценой. Но когда за каждым углом вас поджидает опасность, это не так просто сделать...\r\n\r\nКлючевые особенности:\r\nВ игре нет контрольных точек или сохранений. Если вы умрете, то потеряете все и начнете все сначала.\r\nСложная механика выживания, включающая охоту, создание предметов, строительство, сохранение здоровья и управление ресурсами.\r\nНепредсказуемые и часто эмоциональные взаимодействия с другими игроками, создающие многообразие запоминающихся игровых моментов.\r\nБольшая карта в 230 км2 с обилием красивых мест и достопримечательностей с реальными прототипами.\r\nДо 60 игроков, стремящихся выжить любой ценой. Заводите друзей, убивайте, похищайте и подчиняйте своей воле незнакомцев, или потеряйте все из-за банки фасоли. В игре возможно все.\r\nМножество угроз, которые проверят ваши способности. От непредсказуемой погоды и опасных зверей до кромешной тьмы и яростных зараженных.\r\n', 11, 'DayZ.png', '2018-12-13', 'Bohemia Interactive', 11, 1200, 25, 11, 11),
(12, 1, 'Need for Speed™ Heat', 'Захватывающая игра, в которой вам предстоит столкнуться с лучшими силами полиции и покорить мир уличных гонок. Устраивайте гонки днём и ставьте на кон всё ночью в издании Deluxe Need for Speed™ Heat — захватывающей дух игре об уличных гонках, где закон меняется с заходом солнца.\r\n\r\nКонтент издания Deluxe:\r\n1 стартовый автомобиль — Стартовый автомобиль K.S Edition Mitsubishi Lancer Evolution X, доступный в гараже с самого начала\r\n3 дополнительные машины K.S Edition, которые откроются по мере прохождения игры\r\n4 эксклюзивных костюма, доступных при настройке персонажа; все предметы взаимозаменяемы и подходят для персонажей любого пола\r\nБонус к репутации и деньгам:\r\n+5% к репутации\r\n+5% к деньгам\r\n', 12, 'nfs.jpg', '2019-06-08', 'Electronic Arts', 12, 3999, 86, 12, 12),
(13, 1, 'The Elder Scrolls® Online', 'Online является частью игровой серии The Elder Scrolls. Как и в других играх серии, действие разворачивается на континенте Тамриэль на планете Нирн. События игры происходят примерно за 1000 лет до событий, описанных в The Elder Scrolls V: Skyrim, в период Междуцарствия, когда 10 рас, проживающих в Тамриэле в составе трёх альянсов пытаются захватить власть над центральной провинцией Сиродил. В это же время Молаг Бал, Князь Даэдра, пытается объединить Нирн со своим измерением, Хладной Гаванью, а также поработить всех жителей планеты.\r\nPvE-контент представлен заданиями, подземельями, испытаниями и событиями в открытом мире. Базовая игра имеет как основную сюжетную линию, так и ряд побочных заданий. Основная сюжетная линия базовой версии игры рассчитана на одного игрока, в то время, как побочные миссии могут выполняться группой игроков.', 13, 'thescrolls.png', '2014-04-04', 'Bethesda Softworks', 13, 800, 60, 13, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `productcategory`
--

CREATE TABLE `productcategory` (
  `idMainCategory` int NOT NULL,
  `categoryName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `productcategory`
--

INSERT INTO `productcategory` (`idMainCategory`, `categoryName`) VALUES
(1, 'Игры'),
(2, 'Программы'),
(3, 'Ключи');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `idСategory` int NOT NULL,
  `idProduct` int NOT NULL,
  `idCategorySubcategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`idСategory`, `idProduct`, `idCategorySubcategory`) VALUES
(1, 1, 3),
(2, 1, 13),
(5, 2, 1),
(6, 2, 3),
(7, 3, 7),
(8, 3, 1),
(9, 4, 1),
(10, 5, 4),
(11, 6, 4),
(12, 6, 12),
(13, 7, 1),
(14, 7, 4),
(15, 8, 6),
(16, 9, 8),
(17, 10, 2),
(18, 10, 13),
(19, 11, 8),
(20, 11, 11),
(21, 12, 2),
(22, 13, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory`
--

CREATE TABLE `subcategory` (
  `idSubcategory` int NOT NULL,
  `nameOfTheSubcategory` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IMG` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `subcategory`
--

INSERT INTO `subcategory` (`idSubcategory`, `nameOfTheSubcategory`, `IMG`) VALUES
(1, 'Шутеры', NULL),
(2, 'Гонки', NULL),
(3, 'Файтинг', NULL),
(4, 'Стратегии', NULL),
(5, 'RPG', NULL),
(6, 'Спорт', NULL),
(7, 'Симуляторы', NULL),
(8, 'Выживание', NULL),
(9, 'Аниме', NULL),
(10, 'Инди', NULL),
(11, 'Зомби', NULL),
(12, 'Фэнтези', NULL),
(13, 'Экшен', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `system_req`
--

CREATE TABLE `system_req` (
  `idSystemReq` int NOT NULL,
  `type` text NOT NULL,
  `OS` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `processor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dram` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videocard` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diskSpace` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `system_req`
--

INSERT INTO `system_req` (`idSystemReq`, `type`, `OS`, `processor`, `dram`, `videocard`, `diskSpace`) VALUES
(1, 'minimal', '64-bit Windows 7 / Windows 10', 'Intel Core i5-750, 2.66 GHz / AMD Phenom II X4 965, 3.4 GHz or AMD Ryzen™ 3 1200, 3.1 GHz', '8 GB ОЗУ', 'NVIDIA® GeForce™ GTX 670 or NVIDIA® GeForce™ GTX 1050 / AMD® Radeon™ HD 7950 or AMD® Radeon™ R9 270', '16 GB'),
(2, 'minimal', 'Windows 7 or 10\r\n', 'Intel Core i5-3570K or AMD FX-8310', '8 GB ОЗУ', 'NVIDIA GeForce GTX 780 or AMD Radeon RX 470', '70 GB'),
(3, 'minimal', 'Windows 8.1 64bit', 'Intel Core i7-3770 / AMD FX-9590 or better', '10 GB', 'GTX 670 2GB / AMD R9 280 better', '20 GB'),
(4, 'minimal', '64-bit Windows 7, Windows 8.1 and Windows 10', 'AMD FX-8350/ Core i5 6600K', '8 GB', 'NVIDIA GeForce® GTX 1050 / NVIDIA GeForce® GTX 660 2GB or AMD Radeon™ RX 560 / HD 7850 2GB', '50 GB'),
(5, 'minimal', 'Windows 7 SP1 or Windows 8/8.1 (64bit only)', 'Intel Core i5 660 3.3 GHz or AMD Phenom II X4 955 @ 3.2 GHz', '4 GB', 'nVidia GeForce GTX460 or AMD Radeon HD5850 (1024 MB VRAM)', '13.79 GB'),
(6, 'minimal', 'Windows 7 64Bit', 'Intel® Core™ 2 Duo 3.0Ghz', '5 GB', 'NVIDIA GTX 460 1GB | AMD Radeon HD 5770 1GB | Intel HD4000 @720p', '60 GB'),
(7, 'minimal', 'Windows 7, Windows 8.1, Windows 10 (64bit versions required)', 'Intel Core i3 560 @ 3.3 GHz or AMD Phenom II X4 945 @ 3.0 GHz', '6 GB', 'NVIDIA GeForce GTX 460 or AMD Radeon HD 5870 (DirectX-11 compliant with 1GB of VRAM)', '61 GB'),
(8, 'minimal', 'Windows 10 - 64-Bit', 'Intel Core i3-6100 @ 3.7GHz or AMD Athlon X4 880K @4GHz', '8 GB', 'NVIDIA GTX 660 2GB or AMD Radeon HD 7850 2GB', ' 50 GB'),
(9, 'minimal', 'Windows 10 64-bits', 'Intel Core i5-2500K@3.3GHz or AMD FX 6300@3.5GHz', '8 GB', 'Nvidia GeForce GTX 780 (3 GB) or AMD Radeon R9 290 (4GB)', '100 GB'),
(10, 'minimal', '64 bit: Vista, Win 7, Win 8, Win 10', 'Intel Core i5-650, 3.2 GHz or AMD Phenom II X4 965, 3.4 Ghz', '6 GB', 'NVIDIA GeForce GTX 660ti (2 GB Memory or higher) or AMD Radeon HD 7870 (2 GB Memory or higher)', '32 GB'),
(11, 'minimal', 'Windows 7/8.1 64-bit', 'Intel Core i5-4430', '8 GB', 'NVIDIA GeForce GTX 760 or AMD R9 270X', '16 GB'),
(12, 'minimal', ' Windows 10', 'FX-6350 or Equivalent; Core i5-3570 or Equivalent', '8 GB', 'AMD: Radeon 7970/Radeon R9 280x or Equivalent; NVIDIA: GeForce GTX 760 or Equivalent', '50 GB'),
(13, 'minimal', 'Windows 7 64-bit', 'Intel® Core i3 540 or AMD A6-3620 or higher', '3 GB', 'Direct X 11.0 compliant video card with 1GB RAM (NVidia GeForce 460 or AMD Radeon 6850)', '85 GB');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `image`, `password`) VALUES
(1, 'Polytech', 'gameshop@mail.ru', 'default.png', 'gameshop'),
(4, 'dfgergf', 'ace4liteds@gmail.com', 'default.png', '2e3234234234'),
(7, 'frazel3108', 'frazel3108@mail.ru', 'default.png', 'frazel3108'),
(8, 'test', 'test@mail.ru', 'default.png', '$2y$10$I8OvdV1CQnueewagUIFqJep7E0ctBBZ9nlPKIreCN4YuuPb1JWbiS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`idBasket`),
  ADD KEY `idUserBasket` (`idUserBasket`);

--
-- Индексы таблицы `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`idDeveloper`);

--
-- Индексы таблицы `dev_smezh`
--
ALTER TABLE `dev_smezh`
  ADD PRIMARY KEY (`idDevelopersSmezh`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idDevelopers` (`idDevelopers`);

--
-- Индексы таблицы `orderbasket`
--
ALTER TABLE `orderbasket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrder` (`idOrder`,`idOrderProduct`),
  ADD KEY `idOrderProduct` (`idOrderProduct`);

--
-- Индексы таблицы `photoalbum`
--
ALTER TABLE `photoalbum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `developers` (`developers`,`idSystemRequirements`),
  ADD KEY `idPhotoAlbum` (`idPhotoAlbum`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idSystemRequirements` (`idSystemRequirements`),
  ADD KEY `idSubCategories` (`idSubCategories`);

--
-- Индексы таблицы `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`idMainCategory`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`idСategory`),
  ADD KEY `idCategorySubcategory` (`idCategorySubcategory`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Индексы таблицы `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`idSubcategory`);

--
-- Индексы таблицы `system_req`
--
ALTER TABLE `system_req`
  ADD PRIMARY KEY (`idSystemReq`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `idBasket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `developer`
--
ALTER TABLE `developer`
  MODIFY `idDeveloper` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `dev_smezh`
--
ALTER TABLE `dev_smezh`
  MODIFY `idDevelopersSmezh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `orderbasket`
--
ALTER TABLE `orderbasket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `photoalbum`
--
ALTER TABLE `photoalbum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `idMainCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `idСategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT для таблицы `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `idSubcategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `system_req`
--
ALTER TABLE `system_req`
  MODIFY `idSystemReq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`idUserBasket`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `dev_smezh`
--
ALTER TABLE `dev_smezh`
  ADD CONSTRAINT `dev_smezh_ibfk_1` FOREIGN KEY (`idDevelopers`) REFERENCES `developer` (`idDeveloper`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dev_smezh_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`developers`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orderbasket`
--
ALTER TABLE `orderbasket`
  ADD CONSTRAINT `orderbasket_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `basket` (`idBasket`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderbasket_ibfk_2` FOREIGN KEY (`idOrderProduct`) REFERENCES `product` (`idProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `photoalbum`
--
ALTER TABLE `photoalbum`
  ADD CONSTRAINT `photoalbum_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idPhotoAlbum`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `productcategory` (`idMainCategory`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_6` FOREIGN KEY (`idSystemRequirements`) REFERENCES `system_req` (`idSystemReq`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`idCategorySubcategory`) REFERENCES `subcategory` (`idSubcategory`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `subcategories_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idSubCategories`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
