-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 07:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunga`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `billingAddress` varchar(255) DEFAULT NULL,
  `biilingCity` varchar(150) DEFAULT NULL,
  `billingState` varchar(100) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `billingCountry` varchar(100) DEFAULT NULL,
  `shippingAddress` varchar(300) DEFAULT NULL,
  `shippingCity` varchar(150) DEFAULT NULL,
  `shippingState` varchar(100) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `shippingCountry` varchar(100) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `billingAddress`, `biilingCity`, `billingState`, `billingPincode`, `billingCountry`, `shippingAddress`, `shippingCity`, `shippingState`, `shippingPincode`, `shippingCountry`, `postingDate`) VALUES
(6, 10, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-06-20 10:50:44'),
(7, 12, '96-11-12kampung limau jalan pantai dalam', 'w.p', 'Kuala Lumpur', 59200, 'Malaysia', '96-11-12kampung limau jalan pantai dalam', 'w.p', 'Kuala Lumpur', 59200, 'Malaysia', '2023-06-27 14:05:39'),
(10, 18, 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', 'The Arc @ Cyberjaya Blocks C & D, Persiaran Bestari, Cyber 11,', 'Cyberjaya', 'Selangor', 63000, 'Malaysia', '2023-07-12 06:23:04'),
(11, 11, 'No.10, Jalan 12, Taman Perdana', 'Nilai', 'Negeri Sembilan', 71800, 'Malaysia', 'No.10, Jalan 12, Taman Perdana', 'Nilai', 'Negeri Sembilan', 71800, 'Malaysia', '2024-01-13 18:12:07'),
(12, 19, 'No.23, Jalan 15, Taman Nilai Perdana,', 'Nilai', 'Negeri Sembilan', 71800, 'Malaysia', 'No.23, Jalan 15, Taman Nilai Perdana,', 'Nilai', 'Negeri Sembilan', 71800, 'Malaysia', '2024-01-13 18:17:43'),
(13, 20, 'No.5, Jalan 7, Taman Impian', 'Shah Alam', 'Selangor', 42000, 'Malaysia', 'No.5, Jalan 7, Taman Impian', 'Shah Alam', 'Selangor', 42000, 'Malaysia', '2024-01-13 18:20:09'),
(14, 21, 'No.9, Jalan 13, Taman Indah,', 'Bagan Serai', 'Perak', 34300, 'Malaysia', 'No.9, Jalan 13, Taman Indah,', 'Bagan Serai', 'Perak', 34300, 'Malaysia', '2024-01-13 18:22:23'),
(15, 22, 'No. 8, Aras 3, Blok 7,', 'Subang Jaya', 'Selangor', 40300, 'Malaysia', 'No. 8, Aras 3, Blok 7,', 'Subang Jaya', 'Selangor', 40300, 'Malaysia', '2024-01-13 18:25:00'),
(16, 23, 'No.8, Jalan 14, Taman Melur,', 'Petaling Jaya', 'Selangor', 46000, 'Malaysia', 'No.8, Jalan 14, Taman Melur,', 'Petaling Jaya', 'Selangor', 46000, 'Malaysia', '2024-01-13 18:27:19'),
(17, 24, '54, F16, Blok 3,', 'Putrajaya', 'WP Putrajaya', 62000, 'Malaysia', '54, F16, Blok 3,', 'Putrajaya', 'WP Putrajaya', 62000, 'Malaysia', '2024-01-13 18:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `CatPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `createdBy`, `CatPhoto`) VALUES
(15, 'Men Collection', 'BungaBoulevard Collection', '2023-12-27 05:28:46', NULL, 1, 'admin/productimages/db3d3a4907543c2e0e3315b6a691e915.jpg'),
(16, 'Women Collection', 'BungaBoulevard Collection', '2023-12-27 05:29:26', NULL, 1, 'admin/productimages/070c097499250c99ccbb91175fcbb042.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `txnType` varchar(200) DEFAULT NULL,
  `txnNumber` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(120) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `userId`, `addressId`, `totalAmount`, `txnType`, `txnNumber`, `orderStatus`, `orderDate`) VALUES
(21, 457660706, 11, 11, 108.00, 'Internet Banking', '12345', 'In Transit', '2024-01-13 18:12:34'),
(22, 861126983, 18, 10, 98.00, 'Internet Banking', '12345', 'Out For Delivery', '2024-01-13 18:15:56'),
(23, 608014363, 19, 12, 99.00, 'Debit/Credit Card', '12345', 'Packed', '2024-01-13 18:17:55'),
(24, 800921729, 20, 13, 94.00, 'Internet Banking', '12345', 'Dispatched', '2024-01-13 18:20:16'),
(25, 710019161, 21, 14, 218.00, 'Cash on Delivery', '', 'In Transit', '2024-01-13 18:22:31'),
(26, 250284995, 22, 15, 69.00, 'Internet Banking', '12345', 'Packed', '2024-01-13 18:25:09'),
(27, 837124083, 23, 16, 177.00, 'Cash on Delivery', '', 'Delivered', '2024-01-13 18:27:28'),
(28, 499213505, 24, 17, 203.00, 'Debit/Credit Card', '12345', 'Dispatched', '2024-01-13 18:30:16'),
(29, 282896420, 11, 11, 99.00, 'Internet Banking', '12345', NULL, '2024-01-13 18:31:20'),
(30, 738821194, 18, 10, 69.00, 'Debit/Credit Card', '12345', NULL, '2024-01-13 18:32:04'),
(31, 908026702, 22, 15, 25.00, 'Debit/Credit Card', '12345', 'Cancelled', '2024-01-13 18:47:04'),
(32, 456072749, 23, 16, 109.00, 'e-Wallet', '12345', 'Cancelled', '2024-01-13 18:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` int(11) NOT NULL,
  `orderNumber` bigint(12) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `orderNumber`, `userId`, `productId`, `quantity`, `orderDate`, `orderStatus`) VALUES
(25, 457660706, 11, 89, 1, '2024-01-13 18:12:34', NULL),
(26, 457660706, 11, 87, 1, '2024-01-13 18:12:34', NULL),
(28, 861126983, 18, 69, 2, '2024-01-13 18:15:56', NULL),
(29, 608014363, 19, 88, 1, '2024-01-13 18:17:55', NULL),
(30, 800921729, 20, 74, 1, '2024-01-13 18:20:16', NULL),
(31, 800921729, 20, 72, 1, '2024-01-13 18:20:16', NULL),
(33, 710019161, 21, 83, 1, '2024-01-13 18:22:31', NULL),
(34, 710019161, 21, 87, 1, '2024-01-13 18:22:31', NULL),
(36, 250284995, 22, 84, 1, '2024-01-13 18:25:10', NULL),
(37, 837124083, 23, 71, 3, '2024-01-13 18:27:28', NULL),
(38, 499213505, 24, 81, 1, '2024-01-13 18:30:16', NULL),
(39, 499213505, 24, 84, 1, '2024-01-13 18:30:16', NULL),
(40, 499213505, 24, 70, 1, '2024-01-13 18:30:16', NULL),
(41, 282896420, 11, 88, 1, '2024-01-13 18:31:20', NULL),
(42, 738821194, 18, 84, 1, '2024-01-13 18:32:04', NULL),
(43, 908026702, 22, 72, 1, '2024-01-13 18:47:04', NULL),
(44, 456072749, 23, 86, 1, '2024-01-13 18:48:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `actionBy` int(3) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `canceledBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `actionBy`, `postingDate`, `canceledBy`) VALUES
(19, 21, 'In Transit', 'In transit to delivery hub', 1, '2024-01-13 18:35:08', NULL),
(20, 22, 'Out For Delivery', 'Out for delivery by courier', 1, '2024-01-13 18:35:44', NULL),
(21, 23, 'Packed', 'Packing process at warehouse', 1, '2024-01-13 18:36:06', NULL),
(22, 24, 'Dispatched', 'Delivered to our courier', 1, '2024-01-13 18:37:22', NULL),
(23, 25, 'In Transit', 'In transit to delivery hub', 1, '2024-01-13 18:37:39', NULL),
(24, 31, 'Cancelled', 'Wrong Size', 1, '2024-01-13 18:49:59', ' Admin'),
(25, 32, 'Cancelled', 'Wrong Item', 1, '2024-01-13 18:50:12', ' Admin'),
(26, 26, 'Packed', 'Packing process at warehouse', 1, '2024-01-13 18:51:13', NULL),
(27, 27, 'In Transit', 'In transit to delivery hub', 1, '2024-01-13 18:51:34', NULL),
(28, 28, 'Dispatched', 'Delivered to our courier', 1, '2024-01-13 18:51:51', NULL),
(29, 27, 'Delivered', 'Successfully delivered to customer', 1, '2024-01-13 18:52:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productPrice` decimal(10,2) DEFAULT NULL,
  `productPriceBeforeDiscount` decimal(10,2) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` decimal(10,2) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `addedBy` int(11) DEFAULT NULL,
  `lastUpdatedBy` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productsize`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`, `addedBy`, `lastUpdatedBy`) VALUES
(69, 16, 26, 'Collar Shirt - Soft Blue', NULL, 'XS, S, M, L, XL', 49.00, 69.00, 'Material - Cotton and Polyester\r\nNeckline - Collar Neck\r\nPattern - Plain', '4efbf6bf7ada4ba78436d810ec456f25.jpg', 'd639b2a01146d4f0ec9790dadbbab8ea.jpg', 'a912280174d541b812a0939c9bcaea6f.jpg', 5.00, 'In Stock', '2023-12-27 06:13:57', '2023-12-27 07:44:02', 1, 1),
(70, 16, 26, 'Peplum Blouse - Green', NULL, 'XS, S, M, L, XL', 55.00, 75.00, 'Material - Cotton Twistcone\r\nNeckline - O-neck\r\nPattern - Plain and Peplum', 'a69f374846f81417371026adbc53c6c1.jpg', 'cad170469d8bcb7c0cd5b8dcf0baaddc.jpg', '24aaa6e79dc7a4f1476c442850dc9034.jpg', 5.00, 'In Stock', '2023-12-27 06:20:04', NULL, 1, NULL),
(71, 15, 24, 'Waffle Henley Shirt - Cream', NULL, 'XS, S, M, L, XL', 59.00, 79.00, 'Material - Cotton and Polyester\r\nSoft waffle fabric\r\nThick and contoured feel\r\nAdjustable buttons', 'fe4586aa1373e4720216be52a4edeb7d.jpg', '000512eeeb8508ece3f188f82349b1ea.jpg', 'd8bce5bc121230fdaaff771bd2e6e21a.jpg', 5.00, 'In Stock', '2023-12-27 06:21:04', '2023-12-27 07:50:08', 1, 1),
(72, 16, 26, 'Round Shirt - Black', NULL, 'XS, S, M, L, XL', 25.00, 45.00, 'Material - Cotton\r\nNeckline - Round Neck\r\nPattern - Plain\r\nWrinkle-resistant and ultra-durable', '3e037dfa9d407d45c7c1996918cd3d97.jpg', '98a3438f1abdc4b8f106638572bbd584.jpg', '94a66da892426265423f2d542979ed2b.jpg', 5.00, 'In Stock', '2023-12-27 06:36:12', '2023-12-27 06:41:40', 1, 1),
(73, 16, 26, 'Wrapped Blouse - Pink', NULL, 'XS, S, M, L, XL', 59.00, 79.00, 'Material - Moscrepe\r\nNeckline - Collar Neck\r\nPattern - Plain', '0560a364e1d4b9c5ee4ca1d04b43e0f4jpeg', '83f9fca5eea19b685dab048cc72af760.jpg', '24830949d1b41cfa5804fddb61bd55c5.jpg', 5.00, 'In Stock', '2023-12-27 06:37:12', '2023-12-27 07:56:08', 1, 1),
(74, 16, 27, 'Cardigan - Khaki', NULL, 'XS, S, M, L, XL', 69.00, 89.00, 'Material - Cotton\r\nLoose Long Sleeve\r\nKnitted Cardigan', '584b448c7958aaf158d66cad0196eb94.jpg', '3c1e4e2f4ab5a3603eacd84abb5ea77e.jpg', 'b36ac3f088f8dd47565284cb6bbd3118.jpg', 5.00, 'In Stock', '2023-12-27 06:39:43', NULL, 1, NULL),
(75, 15, 24, 'Crew Neck Sweatshirt - Gray', NULL, 'XS, S, M, L, XL', 79.00, 99.00, 'Material - Cotton and Polyester\r\nFine sweat fabric\r\nPilling-resistant lining', 'fb8e32b007223328e80dbf7b6ac756ba.jpg', '6628d81c4a1a1e3be36c0e6c15f9b7f5.jpg', 'b330cc9fdb319fbe9c1b61a5c905681d.jpg', 5.00, 'In Stock', '2023-12-27 06:42:57', NULL, 1, NULL),
(76, 16, 27, 'Blazer - Black', NULL, 'XS, S, M, L, XL', 119.00, 139.00, 'Material - Polyester\r\nNeckline - Turn-down Collar\r\nPattern - Solid color', 'd11b017d2e6966d41a9355a013e2c047.jpg', '11fd8d1a271cfb619b8522f8a84755ab.jpg', '65556a71ecf70863eafed0f6b6c32b12.jpg', 5.00, 'In Stock', '2023-12-27 06:56:09', '2023-12-27 06:56:59', 1, 1),
(77, 16, 27, 'Denim Jacket - Blue', NULL, 'XS, S, M, L, XL', 159.00, 179.00, 'Material - Cotton and Polyester\r\nNeckline - Turn-down Collar\r\nPattern - Solid', '4ca4780bbfee7b78c670f6d9822b5720.jpg', 'f4d42d5e204c31bbed9d4fa8215a8411.jpg', '07ec72a7c8df0b2cbf4e45dfc5af77cf.jpg', 5.00, 'In Stock', '2023-12-27 07:09:40', NULL, 1, NULL),
(78, 15, 25, 'Sweat Pullover Hoodie - Light Greige', NULL, 'XS, S, M, L, XL', 119.00, 139.00, 'Material - Cotton and Polyester\r\nFine sweat fabric\r\nPilling-resistant lining', '04dc128bacf06dda353ca99bf9eb9740jpeg', '6251931b27ca140692049c8e43fcefddjpeg', 'ce4ec8dd444ae0092e355ad9d191cfdejpeg', 5.00, 'In Stock', '2023-12-27 07:11:00', '2023-12-27 07:58:35', 1, 1),
(79, 16, 27, 'Coats - Beige', NULL, 'XS, S, M, L, XL', 159.00, 179.00, 'Material - Cotton \r\nNeckline - Turn-down Collar\r\nPattern - Solid', '1bc45816ae961eb3678c3a2f3d88683b.png', '986e39ffb1df49c9ef6935bdd2642c44.jpg', 'aa8e9785226ce437ab68c2eeaefdbbd0.jpg', 5.00, 'In Stock', '2023-12-27 07:14:13', NULL, 1, NULL),
(80, 16, 28, 'Satin Dress - Blue', NULL, 'XS, S, M, L, XL', 79.00, 89.00, 'Material - Satin\r\nNeckline - V-neck\r\nPattern - Plain', '22a4617e480d60e00ca42970866b1a87.jpg', 'ff1a6f050b61e003b9617cdaabf1b556.jpg', 'a187438bfe88895839f8c4a5d4a0372f.jpg', 5.00, 'In Stock', '2023-12-27 07:28:19', NULL, 1, NULL),
(81, 16, 28, 'Floral Dress - Brown', NULL, 'XS, S, M, L, XL', 79.00, 99.00, 'Material - Polyester and Spandex\r\nNeckline - O-neck\r\nPattern - Floral Printed', 'b4af3a4c4c993a1da42bcf43410c5b49.jpg', '6abeff6ff62f0afd941cc5e45b05be06.jpg', '8734c7c9adc18514ac8bd99738b48fc2.jpg', 5.00, 'In Stock', '2023-12-27 07:30:24', NULL, 1, NULL),
(83, 15, 25, 'Denim Utility Jacket - Blue', NULL, 'XS, S, M, L, XL', 149.00, 169.00, 'Material - Cotton and Polyester\r\nAuthentic workwear material and design\r\nLarge pockets', '4eee26bd89b29c7b35f116185d78068f.jpg', '4c3b5706d7477fb766384f3674529b89.jpg', 'b586769662e4ae775b597e5a5c6c9c58.jpg', 5.00, 'In Stock', '2023-12-27 07:33:26', '2023-12-27 07:59:57', 1, 1),
(84, 16, 28, 'Plain Dress - Beige', NULL, 'XS, S, M, L, XL', 69.00, 89.00, 'Material - Chiffon and Cotton\r\nNeckline - Round Neck\r\nPattern - Plain', '7329203cc9e2cf62d0790157e2486b23.jpg', '4f2c8dce3343445adea7c3836ba23d08.jpg', 'e5cdd68702b67ca5393c58823fe094c1.jpg', 5.00, 'In Stock', '2023-12-27 07:35:24', '2023-12-27 07:38:18', 1, 1),
(85, 16, 28, 'Pleated Dress - Light Grey', NULL, 'XS, S, M, L, XL', 99.00, 109.00, 'Material - Polyester\r\nNeckline - Collar Neck\r\nPattern - Plain Pleated', '070c097499250c99ccbb91175fcbb042.jpg', '9d30395b4bdb92ec4d148b2c029ff853.jpg', '3ad1d2fe3b363f616914ab820ea4c2e6.jpg', 5.00, 'In Stock', '2023-12-27 07:36:41', '2023-12-27 07:39:05', 1, 1),
(86, 15, 25, 'Jacket - Beige', NULL, 'XS, S, M, L, XL', 109.00, 129.00, 'Regular Fit\r\nMaterial - Cotton and Polyester\r\nGenerous cut for easy layering\r\nConvenient side pockets', '08e26706314abb09f055149999757035jpeg', '1de86d6b0206a35e3dc15e311fa6e2c5jpeg', '13db4eebb0cb2717e55f5310f8a11b07jpeg', 5.00, 'In Stock', '2023-12-27 07:41:50', '2023-12-27 08:23:53', 1, 1),
(87, 15, 25, 'Flannel - Grey Checkered', NULL, 'XS, S, M, L, XL', 69.00, 89.00, 'Regular-fit shirt\r\nSoft cotton flannel\r\nTurn-down collar\r\nFrench front and yoke at the back\r\nLong sleeves\r\nAdjustable buttoning at the cuffs\r\nRounded hem', '1ceac8e31f3caa26d0807b15bf42e0bdjpeg', '7be2cb394585609112443faa26984c1a.jpg', 'd31b4827547640305502787906c86738.jpg', 5.00, 'In Stock', '2023-12-27 08:22:12', '2023-12-27 08:23:39', 1, 1),
(88, 15, 24, 'Waffled Sweatshirt - Black', NULL, 'XS, S, M, L, XL', 99.00, 119.00, 'Loose Fit\r\nRound and rib-trimmed neckline\r\nDropped shoulders\r\nLong sleeves\r\nWide ribbing at the cuffs and hem', '7256182d118f800b38ac95f456cae942jpeg', '871e8341a927e761cdde1367170b06b5.jpg', '58e209b69d28fbdc4b5dddd8b3b07f03.jpg', 5.00, 'In Stock', '2023-12-27 08:25:55', NULL, 1, NULL),
(89, 15, 24, 'Linen-Blend Shirt - White', NULL, 'XS, S, M, L, XL', 39.00, 59.00, 'Relaxed Fit shirt \r\nMaterial - Cotton and Linen weave\r\nTurn-down collar\r\nClassic front \r\nA yoke that has a box pleat at the back\r\nLong sleeves\r\nAdjustable buttoning at the cuffs\r\nA sleeve placket with a link button\r\nRounded hem', 'b7ef5ef8f5aa53b04dd297b719f6ff79jpeg', '96a016653325ebbbb77504fed30fca25.jpg', 'cf3d0102156cb9138bce60e802ee7ea0.jpg', 5.00, 'In Stock', '2023-12-27 08:34:59', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategoryName`, `creationDate`, `updationDate`, `createdBy`) VALUES
(24, 15, 'Shirt', '2023-12-27 05:30:11', NULL, 1),
(25, 15, 'Outerwear', '2023-12-27 05:30:57', NULL, 1),
(26, 16, 'Top', '2023-12-27 05:31:14', NULL, 1),
(27, 16, 'Outerwear', '2023-12-27 05:31:29', NULL, 1),
(28, 16, 'Dresses', '2023-12-27 05:31:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactNumber` bigint(12) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `contactNumber`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 183152142, '2022-01-24 16:21:18', '2024-01-13 18:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(11, 'Aiman Daniel', 'aimandaniel@gmail.com', 43743247367, '827ccb0eea8a706c4c34a16891f84e7b', '2023-06-21 07:13:00', '2024-01-13 17:34:49'),
(18, 'Sara Maya', 'saramaya@gmail.com', 123456789, '827ccb0eea8a706c4c34a16891f84e7b', '2023-07-12 06:20:19', NULL),
(19, 'Azfar Fahmi', 'azfarfahmi@gmail.com', 1139951540, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 17:32:38', NULL),
(20, 'Sharifah Syafiqah', 'sharifahsyafiqah@gmail.com', 176872572, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 17:52:49', NULL),
(21, 'Aqil Rashid', 'aqilrashid@gmail.com', 183653756, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 18:03:57', NULL),
(22, 'Sabrina Wong', 'sabrinawong@gmail.com', 133546735, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 18:04:20', NULL),
(23, 'Ikhmal Fakhri', 'ikhmalfakhri@gmail.com', 135837538, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 18:04:46', NULL),
(24, 'Adriana Azman', 'adrianaazman@gmail.com', 164353788, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-13 18:05:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(32, 11, 71, '2024-01-13 18:07:34'),
(34, 18, 77, '2024-01-13 18:15:25'),
(35, 19, 86, '2024-01-13 18:17:10'),
(36, 20, 79, '2024-01-13 18:18:30'),
(37, 21, 75, '2024-01-13 18:21:25'),
(38, 22, 76, '2024-01-13 18:23:05'),
(39, 22, 73, '2024-01-13 18:23:14'),
(40, 23, 78, '2024-01-13 18:26:13'),
(41, 24, 79, '2024-01-13 18:28:28'),
(42, 24, 77, '2024-01-13 18:28:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userrrid` (`userId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uiid` (`userID`),
  ADD KEY `piddd` (`productId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uidddd` (`userId`),
  ADD KEY `addressid` (`addressId`),
  ADD KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidd` (`orderNumber`),
  ADD KEY `useridd` (`userId`),
  ADD KEY `productiddd` (`productId`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderidddddd` (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catidddd` (`category`),
  ADD KEY `subCategory` (`subCategory`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catid` (`categoryid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usseridddd` (`userId`),
  ADD KEY `ppiidd` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
