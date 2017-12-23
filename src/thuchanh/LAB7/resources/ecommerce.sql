-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 08:09 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`, `description`) VALUES
(3, 'Tivi', ''),
(4, 'Tủ Lạnh', ''),
(5, 'Máy Giặt', ''),
(6, 'Lò Vi Sóng', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`productID`,`orderID`),
  KEY `orderID` (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `orderDate` datetime NOT NULL,
  `shipDate` datetime NOT NULL,
  `shipName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `shipAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `catID` int(11) NOT NULL,
  `productName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `catID` (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `catID`, `productName`, `price`, `quantity`, `description`, `picture`) VALUES
(14, 3, 'Smart Tivi Toshiba 55 inch 55U7650', 20900000, 100, 'Công nghệ CEVO 4K Engine cho chất lượng hình ảnh cao nhất Tấm nền IPS đảm bảo vẻ đẹp nguyên vẹn của nội dung hiển thị Công nghệ tăng cường màu sắc Full Color Gamut Giao diện My Home Screen cùng nhiều tiện ích hấp dẫn ', 'images/tivi-1.jpg'),
(15, 3, 'Smart Tivi Toshiba 55 inch 55U7650', 20900000, 100, 'Công nghệ CEVO 4K Engine cho chất lượng hình ảnh cao nhất Tấm nền IPS đảm bảo vẻ đẹp nguyên vẹn của nội dung hiển thị Công nghệ tăng cường màu sắc Full Color Gamut Giao diện My Home Screen cùng nhiều tiện ích hấp dẫn ', 'images/tivi-1.jpg'),
(16, 3, 'Smart Tivi Toshiba 55 inch 55U7650', 20900000, 100, 'Công nghệ CEVO 4K Engine cho chất lượng hình ảnh cao nhất Tấm nền IPS đảm bảo vẻ đẹp nguyên vẹn của nội dung hiển thị Công nghệ tăng cường màu sắc Full Color Gamut Giao diện My Home Screen cùng nhiều tiện ích hấp dẫn ', 'images/tivi-1.jpg'),
(19, 4, 'Tủ Lạnh Mini Aqua AQR-95AR (90L) - Bạc', 2499000, 100, '\r\n\r\nTiết kiệm điện năng\r\n\r\nThiết kế gọn gàng, đẹp mắt\r\n\r\nDễ dàng di chuyển, lắp đặt\r\n\r\nLàm lạnh nhanh chóng\r\n\r\nKhay ngăn thiết kế linh hoạt, tiện ích\r\n\r\nPhù hợp với người độc thân, sinh viên, nhà ít người\r\n', 'uploads/151289390052396_aqr95arss.u600.d20160801.t215522.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(5) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `order_product` (`orderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
