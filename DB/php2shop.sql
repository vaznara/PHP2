-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2019 at 12:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
,`sArticle` varchar(100)
,`sName` varchar(100)
,`sDescription` text
,`sImage` varchar(100)
,`sThumb` varchar(100)
,`fPrice` float
,`nCount` int(11)
,`idUser` int(11)
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
  `idUser` int(11) DEFAULT NULL,
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sStatusId` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`ID`, `idGoods`, `nCount`, `idUser`, `sSessionId`, `sStatusId`) VALUES
(7, 1, 1, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL),
(8, 1, 1, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL),
(9, 6, 1, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL),
(10, 8, 3, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL),
(11, 2, 1, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL),
(12, 2, 1, NULL, 'og0cvqsongneu1tsddnlq497pp', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `sGroup` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sHash` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `sLogin`, `sPassword`, `sName`, `sGroup`, `sSessionId`, `sHash`) VALUES
(12, 'newTest 555', '123456', 'testUser', 'GroupAdmin', 'test', 'test'),
(10, 'Login', 'Password', 'Test Name', 'Test Group', '', ''),
(9, 'Login', 'Password', 'Test Name', 'Test Group', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

DROP TABLE IF EXISTS `userorder`;
CREATE TABLE IF NOT EXISTS `userorder` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `sNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sStatusId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`ID`, `idUser`, `sNumber`, `sStatusId`) VALUES
(1, 111, '123', 'NEW'),
(2, 111, '123', 'NEW');

-- --------------------------------------------------------

--
-- Structure for view `cart`
--
DROP TABLE IF EXISTS `cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart`  AS  select `g`.`ID` AS `ID`,`g`.`sArticle` AS `sArticle`,`g`.`sName` AS `sName`,`g`.`sDescription` AS `sDescription`,`g`.`sImage` AS `sImage`,`g`.`sThumb` AS `sThumb`,`g`.`fPrice` AS `fPrice`,`ci`.`nCount` AS `nCount`,`ci`.`idUser` AS `idUser`,`ci`.`sSessionId` AS `sSessionId`,`ci`.`sStatusId` AS `sStatusId` from (`cartitem` `ci` left join `goods` `g` on((`g`.`ID` = `ci`.`idGoods`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
