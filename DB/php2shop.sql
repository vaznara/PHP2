-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2019 at 02:36 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2shop`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
`ID` int(11)
,`idGoods` int(11)
,`sArticle` varchar(100)
,`sName` varchar(100)
,`sDescription` text
,`sImage` varchar(100)
,`sThumb` varchar(100)
,`fPrice` float
,`nCount` int(11)
,`idUser` varchar(100)
,`sSessionId` varchar(100)
,`sStatusId` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
CREATE TABLE IF NOT EXISTS `cartitem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idGoods` int(11) NOT NULL,
  `nCount` int(11) NOT NULL,
  `fPrice` float NOT NULL,
  `idUser` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sStatusId` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=408 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`ID`, `idGoods`, `nCount`, `fPrice`, `idUser`, `sSessionId`, `sStatusId`) VALUES
(402, 2, 2, 475, 'test name', '8m2m137v2bm90fuikt53lgk9s7', NULL),
(398, 2, 2, 475, 'test', '8m2m137v2bm90fuikt53lgk9s7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sArticle` varchar(100) NOT NULL,
  `sName` varchar(100) NOT NULL,
  `sDescription` text NOT NULL,
  `sImage` varchar(100) NOT NULL,
  `sThumb` varchar(100) NOT NULL,
  `fPrice` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Таблица товаров';

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`ID`, `sArticle`, `sName`, `sDescription`, `sImage`, `sThumb`, `fPrice`) VALUES
(1, '0001', 'Ноутбук ASUS D540YA-DM790D, 90NB0CN1-M11800', '<p>Ноутбук для ежедневного использования должен справляться с ресурсоемкими задачами, обеспечивать стабильную и комфортную работу и обладать эргономичным дизайном. Ноутбук ASUS VivoBook D540YA в полной мере соответствует ключевым требованиям к компьютерной технике, что делает его оптимальным для работы и развлечений. Ноутбук в прочном легком корпусе со стильной шлифованной отделкой весит всего 1,9 кг, поэтому его удобно брать с собой в дорогу.</p>', '1_good.jpg', '1_good_thumb.jpg', 447),
(2, '0002', 'Телевизор Витязь 24LH1102', '<p>Телевизор Витязь 24LH1102 изготовлен на высококачественной ЖК-матрице с LED-подсветкой и обеспечивает прием цифровых каналов, а также каналов кабельного телевидения. Он способен воспроизводить видео с разрешением HD, что позволит просматривать контент с улучшенной четкостью. С телевизором Витязь 24LH1102 возможна навигация по сети Интернет без использования персонального компьютера, а встроенный медиаплеер позволит воспроизводить файлы с USB-накопителей</p>', '2_good.jpg', '2_good_thumb.jpg', 475),
(3, '0003', 'Смартфон Samsung Galaxy A70 6/128Gb blue', '<p>Смартфон Samsung Galaxy A70 - устройство с флагманскими характеристиками. На большом 6.7-дюймовом FHD+ sAMOLED безграничном U-экране смартфона вы реально оцените эффект полного погружения в происходящее на экране. Смотрите ли вы стриминговый контент или ваши любимые шоу, сверхширокий экран с уникальным соотношением сторон 20:9 станет окном в удивительный мир новых визуальных ощущений. Galaxy A70 оснащен тремя камерами, включая ультраширокоугольную камеру со 123-градусным углом обзора, камеру 32 Мп (F1.7) для ярких и четких снимков в любое время суток. Третья камера 5 Мп камера предназначена для управления глубиной резкости снимка. Аккумулятор емкостью 4500 мАч обеспечит вам заряд на целый день, позволяя насладиться каждым моментом. А супербыстрая зарядка Galaxy A70 мощностью 25 Вт позволит не выпадать из динамичного ритма вашей насыщенной жизни.</p>', '3_good.jpg', '3_good_thumb.jpg', 282),
(4, '0004', 'Western Digital Elements, WDBMTM0010BBK-EEUE, 1ТБ, черный', '<p>Внешние жесткие диски Western Digital Elements изготовлены в прочном компактном корпусе и имеют стильное оформление. Они оснащены современным интерфейсом USB 3.0 и обеспечивают устойчивую работу на высоких скоростях. Накопители Western Digital Elements отлично подойдут для хранения больших объемов данных, включая файлы видео и фотоснимки высокого разрешения. За счет дополнительных функций защиты обеспечивается сохранность ваших персональных данных.</p>', '4_good.jpg', '4_good_thumb.jpg', 407),
(5, '0005', 'сушилка для овощей и фруктов TESLER FD-521', '<p>Сушилка для овощей и фруктов Tesler FD-521 мощностью 230 Вт снабжена пятью пластиковыми регулируемыми по высоте поддонами и вентилятором, который равномерно разгоняет теплый воздух, что обеспечивает оптимальную обработку продуктов. Нескользящее основание помогает ей сохранять устойчивое положение даже при установке на гладкой поверхности. В модели предусмотрена регулировка температуры и настройка таймера от 1 до 48 часов.</p>', '5_good.jpg', '5_good_thumb.jpg', 435),
(6, '0006', 'Смартфон Samsung Galaxy A50 64Gb (2019) black', '<p>Galaxy A50 - это чистейшая премиальная эстетика. Тонкий корпус, удобно лежит в руке, а задняя 3D-панель из стеклопластика и экранный сканер отпечатков создают плавные очертания корпуса со всех сторон. Станьте ближе к тому, что важно для вас, c 6,4-дюймовом Infinity-U экраном Galaxy A50. Практически безрамочный дисплей покрывает телефон от края до края. А благодаря разрешению FHD+ и цветопередаче sAMOLED вы можете с головой окунуться в свои любимые видеоблоги и прямые трансляции. Благодаря емкости 4000 мАч аккумулятор обеспечит вам заряд на целый день, позволяя транслировать и показывать контент, а также играть.</p>', '6_good.jpg', '6_good_thumb.jpg', 895),
(7, '0007', 'Смартфон Xiaomi Redmi 6 3/32GB black', '<p>Смартфон Xiaomi Redmi 6 оснащен 8-ядерным процессором MediaTek Helio P22, обеспечивающим просто невероятную производительность! Благодаря исполнению по 12-нм техпроцессу, процессор не только мощный, но и энергоэффективный, чему еще больше способствуют энергосберегающие технологии MIUI 9 и программно-аппаратная оптимизация. Гладкие закругленные углы, Full HD дисплей 18:9, который покрывает 80.5% передней поверхности устройства. Изящный тонкий корпус, который приятно ощущается в руке. Вы не захотите выпускать его из рук.', '7_good.jpg', '7_good_thumb.jpg', 388),
(8, '0008', 'Смартфон Samsung Galaxy A30 (2019) black', '<p>Galaxy A30 отличается тонким, но прочным корпусом толщиной 7,7 мм с глянцевым покрытием, приятным на ощупь. Переверните его, и вы увидите скрытый датчик отпечатков пальцев и заднюю 3D-панель из стеклопластика, которые дополняют элегантный премиальный дизайн Galaxy A30. Выберите аскетичный белый или черный цвет корпуса либо решитесь на яркий красный или синий. 6,4-дюймовый экран Infinity-U от края до края - это возможность полностью погрузиться в ваши любимые игры и видео. Безрамочный экран sAMOLED с разрешением FHD+ в Galaxy A30 - это принципиально новый взгляд на развлечения. Благодаря емкости 4000 мАч аккумулятор обеспечит вам заряд на целый день, позволяя насладиться каждым моментом. А быстрая зарядка Galaxy A30 мощностью 15 Вт позволит не выпадать из динамичного ритма вашей насыщенной жизни.</p>', '8_good.jpg', '8_good_thumb.jpg', 301);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idOrder` int(11) NOT NULL,
  `idGoods` int(11) NOT NULL,
  `nCount` int(11) NOT NULL,
  `fPrice` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`ID`, `idOrder`, `idGoods`, `nCount`, `fPrice`) VALUES
(208, 124, 2, 5, '475'),
(207, 123, 7, 1, '388'),
(206, 122, 2, 1, '475'),
(205, 122, 1, 1, '447'),
(204, 121, 2, 2, '475'),
(203, 121, 3, 2, '282'),
(202, 121, 7, 1, '388'),
(201, 120, 7, 1, '388'),
(200, 120, 6, 1, '895'),
(199, 120, 5, 5, '435'),
(198, 119, 2, 2, '475'),
(197, 119, 1, 2, '447'),
(196, 119, 4, 1, '407'),
(195, 118, 2, 2, '475'),
(194, 117, 2, 2, '475'),
(193, 116, 2, 1, '475'),
(192, 116, 3, 1, '282'),
(191, 115, 2, 2, '475'),
(190, 114, 2, 2, '475'),
(189, 114, 3, 2, '282'),
(188, 113, 2, 2, '475'),
(187, 112, 2, 2, '475'),
(186, 112, 3, 1, '282'),
(185, 111, 2, 1, '475'),
(184, 111, 3, 1, '282'),
(183, 110, 2, 1, '475'),
(182, 110, 1, 1, '447'),
(181, 110, 8, 1, '301'),
(180, 109, 3, 1, '282'),
(179, 109, 2, 2, '475'),
(178, 109, 1, 1, '447'),
(177, 108, 2, 2, '475'),
(176, 108, 3, 1, '282'),
(175, 107, 2, 2, '475'),
(174, 107, 3, 2, '282'),
(173, 106, 2, 2, '475'),
(172, 105, 2, 2, '475'),
(171, 104, 2, 3, '475'),
(170, 104, 1, 2, '447'),
(169, 103, 2, 1, '475'),
(168, 102, 3, 1, '282'),
(167, 102, 1, 1, '447'),
(166, 101, 1, 2, '447'),
(165, 101, 3, 2, '282'),
(164, 100, 2, 2, '475'),
(163, 100, 1, 1, '447'),
(162, 99, 2, 1, '475'),
(161, 99, 7, 2, '388'),
(160, 98, 4, 1, '407'),
(159, 97, 1, 1, '447'),
(158, 97, 7, 3, '388'),
(157, 97, 8, 3, '301'),
(156, 96, 1, 2, '447'),
(155, 96, 2, 2, '475'),
(154, 96, 4, 2, '407'),
(153, 96, 6, 1, '895'),
(152, 96, 8, 1, '301'),
(151, 95, 1, 4, '447'),
(150, 95, 2, 5, '475'),
(149, 94, 6, 1, '895'),
(148, 94, 8, 1, '301'),
(147, 94, 1, 1, '447'),
(146, 94, 3, 1, '282'),
(145, 93, 1, 1, '447'),
(144, 93, 3, 4, '282'),
(143, 93, 7, 2, '388');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orders`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
`ID` int(11)
,`idGoods` int(11)
,`sThumb` varchar(100)
,`sName` varchar(100)
,`fPrice` decimal(10,0)
,`nCount` int(11)
,`fSum` decimal(20,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

DROP TABLE IF EXISTS `orderstatus`;
CREATE TABLE IF NOT EXISTS `orderstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sStatusID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sStatusValue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`ID`, `sStatusID`, `sStatusValue`) VALUES
(1, 'NEW', 'Новый'),
(2, 'PACKED', 'Собран'),
(3, 'SENT', 'Отправлен'),
(4, 'DELIVERED', 'Доставлен'),
(5, 'PAID', 'Оплачен');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sLogin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sPassword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sGroup` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'USER',
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sHash` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `sLogin`, `sPassword`, `sName`, `sGroup`, `sSessionId`, `sHash`) VALUES
(17, 'vaska', '$2y$10$i.skBJooHInNpXZIm/.cwOCCn.4CGuMc5vLkOEg6d/2bfp.ymituW', 'vaska', 'USER', '5lk3e9iv27213bev9r1mjlac2u', NULL),
(16, 'admin', '$2y$10$oZoGCSic7go65jFm0mJa8.ogMWzIxSwHus7Fk9jIqFR0Lg5SxB99K', 'Administrator', 'ADMIN', '5lk3e9iv27213bev9r1mjlac2u', NULL),
(18, 'vaznara', '$2y$10$hba6JidQoCjDFrxHGuTSMOqn4YLNoGqn10xYjcp9Zc6YngzzovF8W', 'Vasil Titov', 'USER', 't09inja13rn6th1leipn6h1igu', NULL),
(19, 'test', '$2y$10$VDgbLSMIeYPLITnIQ4lltOEZRYQawRh2p7V/NPDZZXn//qLX8s5d2', 'test', 'USER', 't09inja13rn6th1leipn6h1igu', NULL),
(20, 'test2', '$2y$10$n6o8N7ioMPFL/NLym/iJPeJpDQyFtBfX.BMY8V4J.fdV5emv/gtKa', 'test name', 'USER', 't09inja13rn6th1leipn6h1igu', NULL),
(21, 'geekbrains', '$2y$10$oMdqEb4x3Yp.hHSeXnJicO28FI8dlTqwIoRz/g0Um3mfrY0bS6sY2', 'GeekBrains', 'USER', 't09inja13rn6th1leipn6h1igu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

DROP TABLE IF EXISTS `userorder`;
CREATE TABLE IF NOT EXISTS `userorder` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sStatusId` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NEW',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`ID`, `idUser`, `sSessionId`, `sStatusId`) VALUES
(111, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'SENT'),
(110, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'PAID'),
(109, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'PACKED'),
(108, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'PACKED'),
(107, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(106, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(105, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(103, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(104, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(100, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(101, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(102, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(99, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(98, 'GeekBrains', NULL, 'NEW'),
(97, 'vaska', 't09inja13rn6th1leipn6h1igu', 'PAID'),
(95, 'GeekBrains', 't09inja13rn6th1leipn6h1igu', 'PACKED'),
(96, 'Administrator', 't09inja13rn6th1leipn6h1igu', 'NEW'),
(94, 'GeekBrains', 't09inja13rn6th1leipn6h1igu', 'SENT'),
(93, 'test', 't09inja13rn6th1leipn6h1igu', 'NEW'),
(112, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(113, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(114, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(115, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(116, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(117, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(118, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(119, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(120, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(121, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(122, 'test name', '8m2m137v2bm90fuikt53lgk9s7', 'NEW'),
(123, 'GeekBrains', '8m2m137v2bm90fuikt53lgk9s7', 'PACKED'),
(124, 'Administrator', '8m2m137v2bm90fuikt53lgk9s7', 'NEW');

-- --------------------------------------------------------

--
-- Structure for view `cart`
--
DROP TABLE IF EXISTS `cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart`  AS  select `ci`.`ID` AS `ID`,`g`.`ID` AS `idGoods`,`g`.`sArticle` AS `sArticle`,`g`.`sName` AS `sName`,`g`.`sDescription` AS `sDescription`,`g`.`sImage` AS `sImage`,`g`.`sThumb` AS `sThumb`,`g`.`fPrice` AS `fPrice`,`ci`.`nCount` AS `nCount`,`ci`.`idUser` AS `idUser`,`ci`.`sSessionId` AS `sSessionId`,`ci`.`sStatusId` AS `sStatusId` from (`cartitem` `ci` left join `goods` `g` on(`g`.`ID` = `ci`.`idGoods`)) ;

-- --------------------------------------------------------

--
-- Structure for view `orders`
--
DROP TABLE IF EXISTS `orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders`  AS  select `oi`.`idOrder` AS `ID`,`oi`.`idGoods` AS `idGoods`,`g`.`sThumb` AS `sThumb`,`g`.`sName` AS `sName`,`oi`.`fPrice` AS `fPrice`,`oi`.`nCount` AS `nCount`,`oi`.`fPrice` * `oi`.`nCount` AS `fSum` from (`orderitem` `oi` left join `goods` `g` on(`g`.`ID` = `oi`.`idGoods`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
