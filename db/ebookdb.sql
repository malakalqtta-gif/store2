-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 ديسمبر 2026 الساعة 23:04
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookdb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `CategorieID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`CategorieID`, `Name`) VALUES
(1, 'عطور نسائية'),
(2, 'عطور رجاليه'),
(5, 'عطور شرقيه');

-- --------------------------------------------------------

--
-- بنية الجدول `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `massages`
--

CREATE TABLE `massages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `massage_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `massages`
--

INSERT INTO `massages` (`id`, `full_name`, `email`, `massage_text`) VALUES
(1, 'مرام محمد الحمودي', 'maram@gmail.com', 'lhgf'),
(3, '', '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `order_details`
--

CREATE TABLE `order_details` (
  `OrderDetail_ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_details`
--

INSERT INTO `order_details` (`OrderDetail_ID`, `OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
(11, 379, 22, 1, 300),
(12, 379, 22, 1, 300),
(13, 379, 26, 1, 150);

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`productID`, `Name`, `Price`, `image`, `Description`, `CategoryID`) VALUES
(21, 'Qissa pink', 550, '25f8fb22c86ce610891386c75ebcecc6.jpg', 'عطر انثوي ناعم وحلو ', 1),
(22, 'Assaf wild colt', 300, '4ec0b5f5eede526e8c5255666a718c13.jpg', 'عطر قوي بطابع رجولي', 2),
(26, 'Guerlain', 150, 'a2915e0c1bc8a7a75ed99566ee8dc822.jpg', 'اشهر العطور الشرقية رمز للفخامة والرقي', 5),
(30, 'Aventus', 120, 'ac51948e1db6796dd527507f5d9086e1.jpg', 'فاكهي تشايبر مميز بنفحات الأناناس والمسك والأخشاب—قوي وفخم', 2),
(31, 'Dior Sauvage', 110, '4603c4b685117df57c5d0427158f5a58.jpg', 'فلفل وبرغموت مع لمسة خشبية—حضور قوي ومميز', 2),
(34, 'Light Blue', 87, 'ca84577718ab7f38da3f29f696a3a30d.jpg', 'نعش وخفيف بنكهات الحمضيات—ممتع للصيف واليوميات', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategorieID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OrderDetail_ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `OrderDetail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`customerID`);

--
-- قيود الجداول `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`productID`);

--
-- قيود الجداول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategorieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
