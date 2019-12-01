-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2019 at 08:26 AM
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
CREATE DATABASE IF NOT EXISTS `php2shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `php2shop`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idGoods` int(11) NOT NULL,
  `nCount` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `sSessionId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sStatusId` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sArticle` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sDescritpion` text COLLATE utf8_unicode_ci NOT NULL,
  `sImage` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noimage.jpg',
  `sThumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noimage_thumb.jpg',
  `fPrice` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица товаров';

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
