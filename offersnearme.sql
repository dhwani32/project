-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 11:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offersnearme`
--

-- --------------------------------------------------------

--
-- Table structure for table `activepackage`
--

CREATE TABLE `activepackage` (
  `ActivePackageId` int(5) NOT NULL,
  `PackageId` int(5) NOT NULL,
  `BusinessId` int(5) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Duration` varchar(50) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `PackageTransactionNumber` varchar(100) NOT NULL,
  `PaymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activepackage`
--

INSERT INTO `activepackage` (`ActivePackageId`, `PackageId`, `BusinessId`, `StartDate`, `EndDate`, `Duration`, `PaymentStatus`, `PackageTransactionNumber`, `PaymentMethod`) VALUES
(13, 3, 12, '2020-06-16', '2021-06-11', '12', 'success', '801f09d408a7e3a44084', 'CC'),
(14, 4, 13, '2020-06-16', '2022-06-06', '24', 'success', '87173bc19fceb1375d47', 'CC'),
(15, 3, 14, '2020-06-16', '2021-06-11', '12', 'success', '94a5f6aea13f00878ce4', 'CC'),
(16, 3, 15, '2020-06-16', '2021-06-11', '12', 'success', '3dafe0fba537f563174f', 'CC'),
(17, 4, 16, '2020-06-16', '2022-06-06', '24', 'success', '5ed95009bdf2bb763566', 'CC'),
(23, 2, 27, '2020-06-19', '2020-12-15', '6', 'success', 'a0f6fd259f202aee8dfc', 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `adminbusinesschat`
--

CREATE TABLE `adminbusinesschat` (
  `AdminBusinessChatId` int(5) NOT NULL,
  `BusinessId` int(5) DEFAULT NULL,
  `Message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `FromBusiness` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `AdminId` int(5) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL,
  `SecurityQuestion` varchar(150) NOT NULL,
  `Answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`AdminId`, `AdminName`, `AdminPassword`, `SecurityQuestion`, `Answer`) VALUES
(1, 'offersnearme', '202cb962ac59075b964b07152d234b70', 'Which is your primary school?', 'DEMO');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `AreaId` int(5) NOT NULL,
  `AreaName` varchar(50) NOT NULL,
  `CityId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`AreaId`, `AreaName`, `CityId`) VALUES
(1, 'Katargam', 1),
(2, 'Varachha', 1),
(3, 'Amroli', 1),
(4, 'Adajan', 1),
(5, 'Bhadaj', 2),
(6, 'CG Road', 2),
(7, 'Chandlodiya', 2),
(8, 'ChandKheda', 2),
(9, 'Dhoraji', 3),
(10, 'Jetpur', 3),
(11, 'Sardhar', 3),
(12, 'Atkot', 3),
(13, 'Soma Talav', 4),
(14, 'Ankhol', 4),
(15, 'Gotri', 4),
(16, 'Baroda', 4),
(17, 'Borivali', 5),
(18, 'Andheri', 5),
(19, 'Malad', 5),
(20, 'Wadala', 5),
(21, 'Aundh', 6),
(22, 'Katraj', 6),
(23, 'Hingewadi', 6),
(24, 'Baner', 6),
(25, 'Itwari', 7),
(26, 'Sitabuldi', 7),
(27, 'Dharampeth', 7),
(28, 'Moninpura', 7),
(29, 'Trimbak', 8),
(30, 'Chunchale', 8),
(31, 'Dasak', 8),
(32, 'Igatpuri', 8),
(33, 'Nath Mandir Road', 9),
(34, 'Shivaji Nagar', 9),
(35, 'South TuKoganj', 9),
(36, 'Mp Nagar', 10),
(37, 'Arera Colony', 10),
(38, 'Kolar Road', 10),
(39, 'Bhatavli', 11),
(40, 'Hathilal', 11),
(41, 'Premnagar', 11),
(42, 'Halton', 12),
(43, 'Peel', 12),
(44, 'City Of Toronto', 12),
(45, 'York', 12),
(46, 'Durham', 12),
(47, 'Kanata', 13),
(48, 'Vanier', 13),
(49, 'Hull North', 13),
(50, 'Hull South', 13),
(51, 'Leamington', 14),
(52, 'Essex', 14),
(53, 'Lakeshore', 14),
(54, 'Killarneg', 15),
(55, 'Hastings', 15),
(56, 'Yaletown', 15),
(57, 'Kitsilano', 15),
(58, 'Saanich', 16),
(59, 'Oakbay', 16),
(60, 'Cordovabay', 16),
(61, 'North Glenmore', 17),
(62, 'Spall', 17),
(63, 'Rutland North', 17),
(64, 'Ellison', 17),
(65, 'Papanui', 18),
(66, 'Merivale', 18),
(67, 'Hornby', 18),
(68, 'Linwood', 18),
(69, 'Tawa', 19),
(70, 'Johnsonuille', 19),
(71, 'Miramar', 19),
(72, 'Tearo', 19),
(73, 'Kodaira', 20),
(74, 'Mitaka', 20),
(75, 'Tachikawa', 20),
(76, 'Ome', 21),
(77, 'Koganei', 21),
(78, 'Inagi', 21),
(79, 'Fussa', 22),
(80, 'Hinode', 22),
(81, 'Oshima', 22),
(82, 'Sakai', 23),
(83, 'Takatsuki', 23),
(84, 'Ibaraki', 23),
(85, 'Yao', 24),
(86, 'Izumi', 24),
(87, 'Mino', 24),
(88, 'Kaizuka', 25),
(89, 'Settsu', 25),
(90, 'Sennam', 25);

-- --------------------------------------------------------

--
-- Table structure for table `businessdetails`
--

CREATE TABLE `businessdetails` (
  `BusinessId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `AreaId` int(5) NOT NULL,
  `Pincode` varchar(6) NOT NULL,
  `CategoryId` int(5) NOT NULL,
  `BusinessEmail` varchar(50) NOT NULL,
  `BusinessPhone` varchar(10) NOT NULL,
  `PackageId` int(5) DEFAULT NULL,
  `BusinessImage` varchar(150) NOT NULL,
  `OffersCounter` varchar(10) NOT NULL DEFAULT '0',
  `BusinessLocation` varchar(1000) NOT NULL,
  `BusinessBankName` varchar(100) DEFAULT NULL,
  `BusinessBankAccNo` varchar(20) DEFAULT NULL,
  `BusinessBankIFSC` varchar(15) DEFAULT NULL,
  `BusinessPanNo` varchar(20) DEFAULT NULL,
  `BusinessBankBranch` varchar(50) DEFAULT NULL,
  `BusinessWallate` varchar(10) NOT NULL DEFAULT '0',
  `activeStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businessdetails`
--

INSERT INTO `businessdetails` (`BusinessId`, `UserId`, `CompanyName`, `AreaId`, `Pincode`, `CategoryId`, `BusinessEmail`, `BusinessPhone`, `PackageId`, `BusinessImage`, `OffersCounter`, `BusinessLocation`, `BusinessBankName`, `BusinessBankAccNo`, `BusinessBankIFSC`, `BusinessPanNo`, `BusinessBankBranch`, `BusinessWallate`) VALUES
(12, 1, 'Baby Shop', 1, '395004', 36, 'hardik@gmail.com', '1234567890', 3, 'YjbO.jpg', '5', '', NULL, NULL, NULL, NULL, NULL, '0'),
(13, 2, 'Electronics ', 4, '395004', 77, 'dixita@gmail.com', '1234567890', 4, '70Yr.jpg', '7', '', NULL, NULL, NULL, NULL, NULL, '0'),
(14, 3, 'Gift & Flower', 75, '395004', 89, 'mr.vaghasiya197@gmail.com', '6353824140', 3, 'Oob9.jpg', '8', '', NULL, NULL, NULL, NULL, NULL, '0'),
(15, 4, 'Travel', 43, '395004', 124, 'bheem@gmail.com', '1234567890', 3, 'I4FH.jpg', '12', '', NULL, NULL, NULL, NULL, NULL, '0'),
(16, 6, 'Vehicle Service', 71, '395004', 132, 'dhwani@gmail.com', '1234567890', 4, 'wFgx.jpg', '8', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.215736353868!2d72.88184401422956!3d21.223292085893327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f68d7a71365%3A0xd18f7ccde2751b53!2sMonghiba%20Medical%20Center!5e0!3m2!1sen!2sin!4v1592426586337!5m2!1sen!2sin', NULL, NULL, NULL, NULL, NULL, '345.6'),
(27, 23, 'Abhay CO', 1, '395010', 100, 'abhay@gmail.com', '1234657890', 2, 'Abhayz3c8.jpg', '0', '', NULL, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `businesstransactiondetails`
--

CREATE TABLE `businesstransactiondetails` (
  `BusinessTransactionId` int(5) NOT NULL,
  `TransactionRequestId` int(5) NOT NULL,
  `BusinessId` int(5) NOT NULL,
  `TransactionId` int(5) NOT NULL,
  `RequestDate` date NOT NULL,
  `TransactionDate` date NOT NULL,
  `RequestStatus` varchar(10) NOT NULL,
  `TransactionAmount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(5) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `ParentCategoryId` int(5) NOT NULL,
  `CategoryImage` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `ParentCategoryId`, `CategoryImage`) VALUES
(23, 'Arts , Crafts & Colletibles', 0, '81.jpg'),
(24, 'Antiques', 23, '83.jpg'),
(25, 'Art and Craft Supplies', 23, '86.jpg'),
(26, 'Art Dealers & Galleries', 23, '88.jpg'),
(27, 'Camera & Photographic Supplies', 23, '91.jpg'),
(28, 'Digital Art', 23, '94.jpg'),
(29, 'Memorabilia', 23, '997.jpg'),
(30, 'Music Store', 23, '99.jpg'),
(31, 'Sewing, Needlework & Fabrics', 23, '102.jpg'),
(32, 'Stamp and Coin', 23, '105.jpg'),
(33, 'Stationary, Printing & Writing Paper', 23, '108.jpg'),
(34, 'Vintage & Collectibles', 23, '115.jpg'),
(35, 'Baby', 0, '117.jpg'),
(36, 'Baby Products', 35, '128.jpg'),
(37, 'Clothing', 35, '120.jpg'),
(38, 'Furniture', 35, '124.jpg'),
(39, 'Safety & Health', 35, '131.jpg'),
(40, 'Beauty and Fragrances', 0, '134.jpg'),
(41, 'Bath & Body', 40, '136.jpg'),
(42, 'Fragrances & Perfumes', 40, '138.jpg'),
(43, 'Makeup & Cosmetics', 40, '143.jpg'),
(44, 'Books & Magazines', 0, '144.jpg'),
(45, 'Audio Books', 44, '147.jpg'),
(46, 'Digital Content', 44, '152.jpg'),
(47, 'Educational & Textbooks', 44, '154.jpg'),
(48, 'Fiction & Nonfiction', 44, '158.jpg'),
(49, 'Magazines', 44, '160.jpg'),
(50, 'Publishing & Printing', 44, '163.jpg'),
(51, 'Rare & Used Books', 44, '168.jpg'),
(52, 'Business to Business', 0, '170.jpg'),
(53, 'Accounting', 52, '172.jpg'),
(54, 'Advertising', 52, '175.jpg'),
(55, 'Agricultural', 52, '179.jpg'),
(56, 'Architectural, Engineering & Surveying Services', 52, '181.jpg'),
(57, 'Chemicals & Allied Products', 52, '185.jpg'),
(58, 'Commercial Photography, Art & Graphics', 52, '188.jpg'),
(59, 'Construction', 52, '190.jpg'),
(60, 'Consulting Services', 52, '194.jpg'),
(61, 'Educational Services', 52, '196.jpg'),
(62, 'Equipment Rentals & Leasing Services', 52, '199.jpg'),
(63, 'Equipment Repair Services', 52, '203.jpg'),
(64, 'Hiring Services', 52, '204.jpeg'),
(65, 'Industrial & Manufacturing Supplies', 52, '208.jpg'),
(66, 'Clothing, Accessories & Shoes', 0, '219.jpg'),
(67, 'Fashion Jewelry', 66, '226.jpg'),
(68, 'Men\'s Clothing', 66, '223.jpg'),
(69, 'Shoes', 66, '225.jpg'),
(70, 'Computers, Accessories & Services', 0, '229.jpg'),
(71, 'Networking', 70, '231.jpg'),
(72, 'Training Services', 70, '500.jpg'),
(73, 'Education', 0, '234.jpg'),
(74, 'Child Daycare Services', 73, '236.jpg'),
(75, 'Dance Halls, Studios & Schools', 73, '503.jpg'),
(76, 'Electronics & Telecom', 0, '237.jpg'),
(77, 'General Electronic Accessories', 76, '239.jpg'),
(78, 'Home Audio', 76, '505.jpg'),
(79, 'Entertainment & Media', 0, '242.jpg'),
(80, 'Gambling', 79, '507.jpg'),
(81, 'Toys & Games', 79, '244.jpg'),
(82, 'Financial Services & Products', 0, '246.jpg'),
(83, 'Finance Company', 82, '248.jpg'),
(84, 'Insurance', 82, '508.jpg'),
(85, 'Food Retail & Service', 0, '249.jpg'),
(86, 'Alcoholic Beverages', 85, '511.jpg'),
(87, 'Coffee & Tea', 85, '252.jpg'),
(88, 'Gifts & Flowers', 0, '253.jpg'),
(89, 'Nursery Plants & Flowers', 88, '513.jpg'),
(90, 'Party Supplies', 88, '256.jpg'),
(91, 'Government', 0, '257.jpg'),
(92, 'Government Services', 91, '259.png'),
(93, 'Health & Personal Care', 0, '262.jpg'),
(94, 'Dental Care', 93, '263.jpg'),
(95, 'Vision Care', 93, '516.jpg'),
(96, 'Home & Garden', 0, '265.jpg'),
(97, 'Home Decor', 96, '268.jpg'),
(98, 'Kitchenware', 96, '517.jpg'),
(99, 'Nonprofit', 0, '270.jpg'),
(100, 'Educational', 99, '520.jpg'),
(101, 'Religious', 99, '271.jpg'),
(102, 'Pets & Animals', 0, '274.jpg'),
(103, 'Medication & Supplements', 102, '522.jpg'),
(104, 'Pet Shops, Pet Food, & Supplies', 102, '275.jpg'),
(105, 'Religion & Spirituality', 0, '277.jpg'),
(106, 'Membership Services', 105, '279.jpg'),
(107, 'Merchandise', 105, '525.jpg'),
(108, 'Retail', 0, '281.jpg'),
(109, 'Department Store', 108, '283.jpg'),
(110, 'Used & Secondhand Store', 108, '526.jpg'),
(111, 'Services - Other', 0, '286.jpg'),
(112, 'Cleaning & Maintenance', 111, '528.jpg'),
(113, 'Shopping Services & Buying Clubs', 111, '287.jpg'),
(114, 'Sports & Outdoors', 0, '289.jpg'),
(115, 'Camping & Outdoors', 114, '291.jpg'),
(116, 'Exercise & Fitness', 114, '531.jpg'),
(117, 'Toys & Hobbies', 0, '39.jpg'),
(118, 'Arts & Crafts', 117, '442.jpg'),
(119, 'Camera & Photographic Supplies', 117, '452.jpg'),
(120, 'Hobby, Toy & Game Shops', 117, '453.jpg'),
(121, 'Video Games & Systems', 117, '459.jpg'),
(122, 'Travel', 0, '3.jpg'),
(123, 'Sporting & Recreation Camps', 122, '438.jpg'),
(124, 'Tours', 122, '428.jpg'),
(125, 'Trailer Parks or Campgrounds', 122, '430.jpg'),
(126, 'Vehicle Sales', 0, '417.jpg'),
(127, 'Auto Dealer-New & Used', 126, '420.jpg'),
(128, 'Boat Dealer', 126, '423.jpg'),
(129, 'Motorcycle Dealer', 126, '425.jpg'),
(130, 'Vehicle Service & Accessories', 0, '409.jpg'),
(131, 'Car Wash', 130, '408.jpg'),
(132, 'Auto Service', 130, '404.jpg'),
(133, 'Auto Body Repair & Paint', 130, '412.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatId` int(5) NOT NULL,
  `SenderId` int(5) NOT NULL DEFAULT 0,
  `ReceiverId` int(5) NOT NULL DEFAULT 0,
  `Message` varchar(50) NOT NULL,
  `ChatDate` date NOT NULL,
  `ChatTime` time NOT NULL,
  `SenderBusinessId` int(5) NOT NULL DEFAULT 0,
  `ReceiverBusinessId` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(5) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `CityName`, `StateId`) VALUES
(1, 'Surat', 1),
(2, 'Ahemdabad', 1),
(3, 'Rajkot', 1),
(4, 'Vadodara', 1),
(5, 'Mumbai', 2),
(6, 'Pune', 2),
(7, 'Nagpur', 2),
(8, 'Nashik', 2),
(9, 'Indore', 3),
(10, 'Bhopal', 3),
(11, 'Jabalpur', 3),
(12, 'Toronto', 4),
(13, 'Ottawa', 4),
(14, 'Windsor', 4),
(15, 'Vancouver', 6),
(16, 'Victoria', 6),
(17, 'Kelowna', 6),
(18, 'Christchurch', 7),
(19, 'Wellington', 7),
(20, 'Hachioji', 8),
(21, 'Machida', 8),
(22, 'Fuchu', 8),
(23, 'Daito', 9),
(24, 'Fujiidera', 9),
(25, 'Habikino', 9);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryId` int(5) NOT NULL,
  `CountryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `CountryName`) VALUES
(1, 'India'),
(2, 'Canada'),
(3, 'Newzealand'),
(4, 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageId`, `OfferId`, `Image`) VALUES
(57, 58, 'babyoil1.jpg'),
(58, 59, 'babywipes1.jpg'),
(59, 60, 'babybathliquid1.jpg'),
(60, 61, 'babyshampoo1.jpg'),
(61, 62, 'electronicmobail1.jpg'),
(62, 63, 'electronicwachingmachine1.jpg'),
(63, 64, 'electronicrefrigerater.jpg'),
(64, 65, 'electronicowen1.jpg'),
(65, 66, 'electronicac1.jpg'),
(66, 67, 'electronictv1.jpg'),
(67, 68, 'giftoffers1.jpg'),
(68, 69, 'giftoffers2.jpg'),
(69, 70, 'giftoffers3.jpg'),
(70, 71, 'giftoffers4.jpg'),
(71, 72, 'giftflower5.jpg'),
(72, 73, 'giftoffers6.jpg'),
(73, 74, 'giftoffers10.jpg'),
(74, 75, 'travelrajshthan1.jpg'),
(75, 76, 'travelhimachalpradesh1.jpg'),
(76, 77, 'travelkerala.jpg'),
(77, 78, 'travelsrilanka1.jpg'),
(78, 79, 'travelkasmir1.jpg'),
(79, 80, 'travelasham1.jpg'),
(80, 81, 'travelgoa1.jpg'),
(81, 82, '1587466310_dubai_new_2.jpg'),
(82, 83, 'travelandman1.jpg'),
(83, 84, 'travelmaldives1.jpg'),
(84, 85, 'traveleqypt1.jpg'),
(85, 86, 'vehicleservicesoilfilter1.jpg'),
(86, 87, 'vehicleserviceswiperreplacement1.jpg'),
(87, 88, 'vehicleservicesreplace_air_filter1.jpg'),
(88, 89, 'vehicleserviceschangetier1.jpg'),
(89, 90, 'vehicleservicesbreak1.jpg'),
(90, 91, 'vehicleservicesenginetuneup1.jpg'),
(91, 92, 'vehicleserviceswheelalighnment1.jpg'),
(92, 93, 'vehicleservicescarwash1.jpg'),
(93, 94, 'babydigitaltermometer1.jpg'),
(94, 95, 'electronicleptop1.jpg'),
(95, 96, 'travelchardhamyatra11.jpg'),
(96, 97, 'giftoffers9.jpg'),
(97, 98, '147.jpg'),
(98, 99, '149.jpg'),
(99, 100, '234.jpg'),
(100, 101, '232.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offercomments`
--

CREATE TABLE `offercomments` (
  `OfferCommentId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `Comment` varchar(150) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `OfferId` int(5) NOT NULL,
  `BusinessId` int(5) NOT NULL,
  `OfferName` varchar(25) NOT NULL,
  `OfferPrice` varchar(15) NOT NULL,
  `OfferDescription` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CategoryId` int(5) NOT NULL,
  `OfferPr` varchar(3) NOT NULL,
  `OfferPayablePrice` varchar(15) NOT NULL,
  `OfferPaymentMode` varchar(10) NOT NULL DEFAULT 'CC'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`OfferId`, `BusinessId`, `OfferName`, `OfferPrice`, `OfferDescription`, `StartDate`, `EndDate`, `CategoryId`, `OfferPr`, `OfferPayablePrice`, `OfferPaymentMode`) VALUES
(58, 12, 'Baby Oil', '300', 'Johnson\'s Baby oil is formulated to spread easily ', '2020-06-16', '2020-08-24', 36, '10', '270', 'CC'),
(60, 12, 'Bath Liquid', '350', 'Soap-soap formula,Safe and effective on skin...', '2020-06-16', '2020-10-19', 36, '10', '315', 'CC'),
(61, 12, 'Shampoo', '450', 'No Harmful Chemicals are used, Dermatologically Te', '2020-06-15', '2020-09-20', 36, '5', '427.5', 'CC'),
(62, 13, 'Mobail', '30000', 'We are getting 5% discount on each an every mobile', '2020-06-16', '2021-01-17', 77, '5', '28500', 'COD'),
(63, 13, 'washing machine', '45000', 'Smart Inverter Motor & Long Motor Life & Most Powe', '2020-06-17', '2020-11-23', 77, '10', '40500', 'CC'),
(64, 13, 'Fridge', '65000', 'Auto fridge defrost to stop ice-build up...', '2020-06-17', '2021-01-17', 77, '20', '52000', 'COD'),
(65, 13, 'Microwave own', '18000', 'Time defrost,cooking complete alarm , timer and lo', '2020-06-16', '2021-01-17', 77, '5', '17100', 'CC'),
(66, 13, 'Air Conditioner', '55000', 'Highest level of power and comfort with advance te', '2020-06-17', '2021-01-17', 77, '5', '52250', 'CC'),
(67, 13, 'Television', '35000', 'Pure prism panel with best viewing exeperience...', '2020-06-17', '2021-01-17', 77, '5', '33250', 'COD'),
(68, 14, 'Flowers & Cake Combo', '650', 'Decorating Kit Combos...', '2020-06-16', '2020-12-20', 89, '3', '630.5', 'CC'),
(69, 14, 'Roses', '350', 'In size & shape & are usually large & showy...', '2020-06-15', '2020-11-20', 89, '10', '315', 'COD'),
(70, 14, 'Chocolate', '270', 'Chocolate\'s richness and creaminess....', '2020-06-16', '2020-10-20', 89, '2', '264.6', 'CC'),
(71, 14, 'Flowers & Bouquets', '750', 'The Elegant warpping of collephane....', '2020-06-16', '2020-11-22', 89, '5', '712.5', 'COD'),
(72, 14, 'Frams & paint gift', '800', 'Designed digitally & printed on satin silk paper..', '2020-06-17', '2020-10-26', 89, '2', '784', 'CC'),
(73, 14, 'Flower Bunches', '350', 'Fresh colour, Poisoless & Harmless, Home Decor...', '2020-06-16', '2020-11-22', 89, '5', '332.5', 'CC'),
(74, 14, 'Teddy Bear', '1050', 'Soft fur & smellness,non-toxic plush fabrics...', '2020-06-16', '2020-10-18', 89, '5', '997.5', 'COD'),
(75, 15, 'Rajasthan', '9999', 'This package include Jaipur, Shekhawati, Jodhpur..', '2020-06-14', '2020-11-25', 124, '5', '9499.05', 'CC'),
(76, 15, 'Himachal', '14999', '100%Money Safe Guarantee, Secure & Safe Online...', '2020-06-07', '2021-01-05', 124, '10', '13499.1', 'COD'),
(77, 15, 'Kerala', '17499', 'Affordable houseboat tour & hill station...', '2020-06-07', '2020-11-12', 124, '5', '16624.05', 'CC'),
(78, 15, 'Sri Lanka', '18999', 'Best time to visit place is from June to April...', '2020-06-01', '2021-04-12', 124, '5', '18049.05', 'CC'),
(79, 15, 'Kashmir', '25499', 'Visit the place like Kashmir valley,Chenab Valley,', '2020-06-08', '2020-10-11', 124, '10', '22949.1', 'CC'),
(80, 15, 'North East', '14999', 'Make the most of your time by exploring the hills ', '2020-06-14', '2020-09-20', 124, '5', '14249.05', 'CC'),
(81, 15, 'Goa', '12999', 'The city has a very vibrant nightfire, ranked 6th ', '2020-06-14', '2020-10-18', 124, '5', '12349.05', 'CC'),
(82, 15, 'Dubai', '49499', 'This trip has something to suit every kind of trav', '2020-06-14', '2020-08-25', 124, '5', '47024.05', 'CC'),
(83, 15, 'Andaman', '35499', 'Starting at point blair, you can visit spots like ', '2020-06-07', '2020-06-28', 124, '5', '33724.05', 'CC'),
(84, 15, 'Maldives', '65299', 'Maldives is easily year round destination...', '2020-06-01', '2020-09-20', 124, '5', '62034.05', 'CC'),
(85, 15, 'Egypt', '75399', 'It is considered the most tourist friendly country', '2020-06-04', '2020-08-26', 124, '10', '67859.1', 'CC'),
(86, 16, 'oil & oil filter changed', '360', 'Passenger car oil... ', '2020-06-09', '2020-12-28', 132, '4', '345.6', 'CC'),
(87, 16, 'wiper blades replacement', '550', 'Easy smooth operation, safe reliable & good for al', '2020-06-17', '2021-01-11', 132, '5', '522.5', 'CC'),
(88, 16, 'Replace air filter', '750', 'Breath fresh air while at home with air-conditione', '2020-06-16', '2020-11-27', 132, '5', '712.5', 'CC'),
(89, 16, 'New tyres', '39999', 'it is ideal tyre for city drives and highway use..', '2020-06-16', '2020-10-28', 132, '10', '35999.1', 'CC'),
(90, 16, 'Brake work', '450', 'a typical dual circuit braking system....', '2020-06-16', '2020-12-15', 132, '3', '436.5', 'CC'),
(91, 16, 'Engine tune up', '3499', 'with a speed a range up to maximum width absolute ', '2020-06-16', '2020-12-24', 132, '5', '3324.05', 'CC'),
(92, 16, 'Wheel aligned/balance', '299', '3D wheel alignment machine....', '2020-06-09', '2020-11-25', 132, '5', '284.05', 'CC'),
(93, 16, 'Car wash', '350', 'Portable car pressure washer with air composer....', '2020-06-16', '2020-11-25', 132, '10', '315', 'COD'),
(94, 12, 'Digital Thermometer', '230', 'Flexible Tip Digital Thermometer...', '2020-06-15', '2020-10-20', 36, '5', '218.5', 'COD'),
(95, 13, 'Laptop', '43000', 'Super fast connectivity,expect more from your ente', '2020-06-17', '2021-01-17', 77, '5', '40850', 'CC'),
(96, 15, 'Char-dham Yatra', '32299', 'This is one of the most important pilgrimanges in ', '2020-06-08', '2020-10-25', 124, '5', '30684.05', 'CC'),
(97, 14, 'Lucky Bambo Collection', '249', 'Lucky Bomboo is well-known for bringing good fortu', '2020-06-16', '2021-01-20', 89, '5', '236.55', 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailsId` int(5) NOT NULL,
  `OrderId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `OfferPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `TransectionId` varchar(100) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderMethod` varchar(50) NOT NULL,
  `CouponId` int(5) NOT NULL,
  `OrderAmount` varchar(15) NOT NULL,
  `BusinessId` int(5) DEFAULT NULL,
  `OfferId` int(5) DEFAULT NULL,
  `OfferRedeemCode` varchar(7) NOT NULL,
  `OfferDistributeState` int(2) NOT NULL DEFAULT 0,
  `OfferDistributeDate` date DEFAULT NULL,
  `OfferOrderPayment` varchar(20) NOT NULL DEFAULT 'Payed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageId` int(5) NOT NULL,
  `PackagePrice` int(5) NOT NULL,
  `PackageDuration` varchar(50) NOT NULL,
  `PackageDescription` varchar(500) NOT NULL,
  `TotalOffers` int(10) NOT NULL,
  `PackageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PackageId`, `PackagePrice`, `PackageDuration`, `PackageDescription`, `TotalOffers`, `PackageName`) VALUES
(1, 0, '1 Month', 'In this package you get 30 offers for One Month ', 30, 'Trail Package'),
(2, 2999, '6 Month', 'In this package you get 200 offers for Six Month ', 200, 'Silver Package'),
(3, 5249, '12 Month', 'In this package you get 350 offers for Twelve Month ', 350, 'Gold Package'),
(4, 7499, '24 Month', 'In this package you get 500 offers for Twenty-Four Month ', 500, 'Platinium Package');

-- --------------------------------------------------------

--
-- Table structure for table `ratingstar`
--

CREATE TABLE `ratingstar` (
  `RatingStartId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `Rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `Review` varchar(50) NOT NULL,
  `Stars` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsordetails`
--

CREATE TABLE `sponsordetails` (
  `SponsorDetailsId` int(5) NOT NULL,
  `BusinessId` int(5) NOT NULL,
  `SponsorPlanId` int(5) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `TransactionAmount` int(10) NOT NULL,
  `TransactionMode` varchar(10) NOT NULL,
  `TransactionId` varchar(50) NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsordetails`
--

INSERT INTO `sponsordetails` (`SponsorDetailsId`, `BusinessId`, `SponsorPlanId`, `TransactionDate`, `TransactionAmount`, `TransactionMode`, `TransactionId`, `EndDate`) VALUES
(4, 14, 4, '2020-06-19 02:25:47', 5000, 'CC', '4c4f3b21d86f80f2755d', '2020-12-15'),
(5, 12, 9, '2020-06-19 02:27:33', 100000, 'CC', 'a8ac743f6f080172e8c6', '2028-05-07'),
(6, 13, 5, '2020-06-19 02:28:38', 10000, 'CC', 'e433fa828fc48af9d5af', '2021-06-13'),
(7, 16, 6, '2020-06-19 02:29:42', 20000, 'CC', 'd4d218c73f512ba5cc1b', '2022-06-08'),
(8, 15, 7, '2020-06-19 02:30:33', 50000, 'CC', '7d27bc1b6ee2e837fb6b', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorplans`
--

CREATE TABLE `sponsorplans` (
  `SponsorPlanId` int(5) NOT NULL,
  `PlanName` varchar(50) NOT NULL,
  `PlanPrice` varchar(10) NOT NULL,
  `PlanDuration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsorplans`
--

INSERT INTO `sponsorplans` (`SponsorPlanId`, `PlanName`, `PlanPrice`, `PlanDuration`) VALUES
(4, 'Silver', '5000', '6 month'),
(5, 'Gold', '10000', '12 month'),
(6, 'Platinum', '20000', '24 month'),
(7, 'Grand Father', '50000', '48 month'),
(8, 'Indra', '70000', '52 month'),
(9, 'God', '100000', '96 month');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateId` int(5) NOT NULL,
  `StateName` varchar(50) NOT NULL,
  `CountryId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateId`, `StateName`, `CountryId`) VALUES
(1, 'Gujarat', 1),
(2, 'Maharastra', 1),
(3, 'Madhyapradesh', 1),
(4, 'Ontario', 2),
(6, 'British Columbia', 2),
(7, 'Canterbury', 3),
(8, 'Tokyo', 4),
(9, 'Osaka', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptiondetails`
--

CREATE TABLE `subscriptiondetails` (
  `SubscriptionDetailsId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `BusinessId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserId` int(5) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPhone` varchar(10) NOT NULL,
  `JoinDate` date NOT NULL,
  `UserAddress` varchar(50) NOT NULL,
  `ReferalCode` varchar(20) NOT NULL,
  `AreaId` int(5) DEFAULT NULL,
  `Pincode` int(6) NOT NULL,
  `UserGender` varchar(10) NOT NULL,
  `UserImage` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `ReferalPoints` varchar(10) NOT NULL,
  `UserType` int(11) NOT NULL,
  `UserAllow` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserId`, `UserName`, `UserEmail`, `UserPhone`, `JoinDate`, `UserAddress`, `ReferalCode`, `AreaId`, `Pincode`, `UserGender`, `UserImage`, `UserPassword`, `ReferalPoints`, `UserType`, `UserAllow`) VALUES
(1, 'Hardik', 'hardik.r2000@gmail.com', '9054928611', '2020-06-16', '', 'v$Y3&FqmxWEc', 1, 0, 'male', 'defaultforMen.png', '0a169b8cf2abca3e6749f8e872bfde3b', '0', 0, 1),
(2, 'Dixita', 'dixitapatel1128@gmail.com', '6353870772', '2020-06-16', '', 'zY2UFDYX%_hK', 4, 0, 'female', 'defaultforWomen.png', '2f07e18321b39f3660fa03ccde23d1d1', '0', 0, 1),
(3, 'Mitul', 'mr.vaghasiya197@gmail.com', '6353824140', '2020-06-16', '', 'G_kL1&)jLWHw', 75, 0, 'male', 'defaultforMen.png', '8287dbc30dd558f1f2d103fe507602bd', '0', 0, 1),
(4, 'Vivek', 'ravalbheem1999@gmail.com', '9054928611', '2020-06-16', '', '3L+nNh)CDO^z', 43, 0, 'male', 'defaultforMen.png', 'ff30ae718005ca6ac31617a4684ced8c', '0', 0, 1),
(6, 'dhwani', 'dhwanishiroya32@gmail.com', '9664955248', '2020-06-16', '', '5bTviKKy2Xf-', 71, 0, 'female', 'defaultforWomen.png', '22662445741a491d4551b9a9c159c9bd', '0', 0, 1),
(8, 'william', 'kaushiksuhagiya11@gmail.com', '9106852781', '2020-06-16', '', '4pJZPubjgYkg', 43, 0, 'male', 'defaultforMen.png', '48b67e06bd44bb96a0248a1fb88b0458', '0', 0, 1),
(9, 'liam', 'jakjilsutariya10179@gmail.com', '8849352556', '2020-04-06', '', '|[K*8m%Wxc|6', 42, 0, 'male', 'defaultforMen.png', 'dfc2875648fc808e0a369a22d3f9db78', '0', 0, 1),
(10, 'justin', 'vaibhavtalaviya123@gmail.com', '7434935733', '2020-04-06', '', 'eQCXp+cJpS2T', 44, 0, 'male', 'defaultforMen.png', '0789df8cb334cc9b2e401e8903b8fba0', '0', 0, 1),
(11, 'laukhik', 'laukhikpatidar2000@gmail.com', '9157989164', '2020-04-06', '', 'qS%d^[yC{FLU', 1, 0, 'male', 'defaultforMen.png', '0c10561eef5cc61503355d0409773111', '0', 0, 1),
(12, 'dharmik', 'dharmikkalsariya28@gmail.com', '9737510271', '2020-04-06', '', 'XMzEWjKgc^2R', 4, 0, 'male', 'defaultforMen.png', '886fa5bcce63df15598f0e8c20e2dc06', '0', 0, 1),
(13, 'yuito', 'naitikghaskata786@gmail.com', '8487978467', '2020-04-06', '', 'dc_h{kaU8CbE', 74, 0, 'male', 'defaultforMen.png', 'bc73999a087e6e24bf4b64dbd8139758', '0', 0, 1),
(14, 'hinata', 'parthvora1860@gmail.com', '8488070052', '2020-04-06', '', 'YLv{i7dxh[I|', 73, 0, 'male', 'defaultforMen.png', '67350058da9fa17b3e76f99817b6b63e', '0', 0, 1),
(15, 'minato', 'shyamsatasiya27@gmail.com', '8238328930', '2020-04-06', '', 'Bmb(0Q_|tO9(', 74, 0, 'male', 'defaultforMen.png', '7c4d6a23a7b06603caf6a953c2da1683', '0', 0, 1),
(16, 'george', 'st050647@gmail.com', '9638288636', '2020-04-07', '', 'dvA5hPG&RPuY', 71, 0, 'male', 'defaultforMen.png', 'a2942e7a93e512263ed19aeafd4281ed', '0', 0, 1),
(17, 'ethan', 'yashpte123@gmail.com', '9879413664', '2020-04-07', '', '*-TlwMJy}Gki', 71, 0, 'male', 'defaultforMen.png', 'bc9018a258f1d8e0a938658b34e043d7', '0', 0, 1),
(18, 'khushal', 'guddidangariya1128@gmail.com', '6353874772', '2020-06-17', '', 'KpB|FEj23[5)', 65, 0, 'male', 'defaultforMen.png', '8f9fa57e711dac6236b5acd3a3cb02fb', '0', 0, 1),
(19, 'nilam', 'guddidangariya@gmail.com', '6353870772', '2020-06-17', '', '{aRJnWn^evwp', 29, 0, 'female', 'defaultforWomen.png', 'f2d7c3d436ca78f9020e00cddaab8806', '0', 0, 1),
(20, 'akta', 'akta@gmail.com', '6353870772', '2020-06-18', '', 'VCG|t*jW6vx+', 1, 0, 'female', 'defaultforWomen.png', 'fe46d38dd0c45843b97ae9951c9b0ba1', '0', 0, 1),
(21, 'ekta', 'ekta@gmail.com', '9638498986', '2020-06-18', '', 'zgBW5G(LUHem', 1, 0, 'female', 'defaultforWomen.png', 'fe46d38dd0c45843b97ae9951c9b0ba1', '0', 0, 1),
(23, 'Abhay', 'AbhayHegde55105510@gmail.com', '9054928611', '2020-06-18', '', '2kR^1%6TS9MI', 1, 0, 'male', 'defaultforMen.png', '6d8255f20ec665fdad68889b321535e4', '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinquiry`
--

CREATE TABLE `userinquiry` (
  `UserInquiryId` int(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinquiry`
--

INSERT INTO `userinquiry` (`UserInquiryId`, `FirstName`, `LastName`, `Email`, `Subject`, `Message`) VALUES
(8, 'mitul', 'vaghasiya', 'mr.vaghasiya197@gmail.com', 'demo', 'demo msg.....');

-- --------------------------------------------------------

--
-- Table structure for table `userlogreport`
--

CREATE TABLE `userlogreport` (
  `UserLogReportId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL,
  `Action` varchar(200) NOT NULL,
  `UserActionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogreport`
--

INSERT INTO `userlogreport` (`UserLogReportId`, `UserId`, `Action`, `UserActionDate`) VALUES
(179, 24, 'User Register', '2020-06-16'),
(180, 1, 'User Register', '2020-06-16'),
(181, 1, 'User Login', '2020-06-16'),
(182, 1, 'User Login', '2020-06-16'),
(183, 1, 'User Logout', '2020-06-16'),
(184, 2, 'User Register', '2020-06-16'),
(185, 2, 'User Login', '2020-06-16'),
(186, 2, 'User Logout', '2020-06-16'),
(187, 3, 'User Register', '2020-06-16'),
(188, 3, 'User Login', '2020-06-16'),
(189, 3, 'User Logout', '2020-06-16'),
(190, 4, 'User Register', '2020-06-16'),
(191, 4, 'User Login', '2020-06-16'),
(192, 4, 'User Logout', '2020-06-16'),
(193, 5, 'User Register', '2020-06-16'),
(194, 6, 'User Register', '2020-06-16'),
(195, 6, 'User Login', '2020-06-16'),
(196, 6, 'User Logout', '2020-06-16'),
(197, 7, 'User Register', '2020-06-16'),
(198, 8, 'User Register', '2020-06-16'),
(199, 8, 'User Login', '2020-06-16'),
(200, 8, 'User Logout', '2020-06-16'),
(201, 1, 'User Login', '2020-06-16'),
(202, 1, 'User Logout', '2020-06-16'),
(203, 2, 'User Login', '2020-06-16'),
(204, 2, 'User Logout', '2020-06-16'),
(205, 3, 'User Login', '2020-06-16'),
(206, 3, 'User Logout', '2020-06-16'),
(207, 4, 'User Login', '2020-06-16'),
(208, 4, 'User Logout', '2020-06-16'),
(209, 6, 'User Login', '2020-06-16'),
(210, 6, 'User Logout', '2020-06-16'),
(211, 1, 'User Login', '2020-06-16'),
(212, 1, 'User Logout', '2020-06-16'),
(213, 2, 'User Login', '2020-06-16'),
(214, 2, 'User Logout', '2020-06-16'),
(215, 4, 'User Login', '2020-06-16'),
(216, 4, 'User Logout', '2020-06-16'),
(217, 3, 'User Login', '2020-06-16'),
(218, 3, 'User Logout', '2020-06-16'),
(219, 8, 'User Login', '2020-06-16'),
(220, 2, 'User Login', '2020-06-17'),
(221, 2, 'User Logout', '2020-06-17'),
(222, 1, 'User Login', '2020-06-17'),
(223, 1, 'Add offer in favorite list', '2020-06-17'),
(224, 1, 'User Logout', '2020-06-17'),
(225, 3, 'User Login', '2020-06-17'),
(226, 3, 'User Logout', '2020-06-17'),
(227, 4, 'User Login', '2020-06-17'),
(228, 4, 'User Logout', '2020-06-17'),
(229, 6, 'User Login', '2020-06-17'),
(230, 6, 'User Logout', '2020-06-17'),
(231, 18, 'User Register', '2020-06-17'),
(232, 18, 'User Login', '2020-06-17'),
(233, 18, 'Purchase Offer', '2020-06-17'),
(234, 18, 'Purchase Offer', '2020-06-17'),
(235, 19, 'User Register', '2020-06-17'),
(236, 19, 'User Login', '2020-06-17'),
(237, 19, 'Add offer in favorite list', '2020-06-17'),
(238, 19, 'User Logout', '2020-06-17'),
(239, 19, 'User Login', '2020-06-17'),
(240, 19, 'User Login', '2020-06-18'),
(241, 19, 'User Logout', '2020-06-18'),
(242, 1, 'User Login', '2020-06-18'),
(243, 1, 'User Logout', '2020-06-18'),
(244, 1, 'User Login', '2020-06-18'),
(245, 1, 'User Logout', '2020-06-18'),
(246, 18, 'User Login', '2020-06-18'),
(247, 18, 'User Logout', '2020-06-18'),
(248, 6, 'User Login', '2020-06-18'),
(249, 6, 'User Logout', '2020-06-18'),
(250, 20, 'User Register', '2020-06-18'),
(251, 21, 'User Register', '2020-06-18'),
(252, 21, 'User Login', '2020-06-18'),
(253, 21, 'Add offer in favorite list', '2020-06-18'),
(254, 21, 'Purchase Offer', '2020-06-18'),
(255, 21, 'User Logout', '2020-06-18'),
(256, 6, 'User Login', '2020-06-18'),
(257, 6, 'User Logout', '2020-06-18'),
(258, 6, 'User Login', '2020-06-18'),
(259, 3, 'User Login', '2020-06-18'),
(260, 3, 'User Logout', '2020-06-18'),
(261, 22, 'User Register', '2020-06-18'),
(262, 22, 'User Login', '2020-06-18'),
(263, 22, 'Add offer in favorite list', '2020-06-18'),
(264, 22, 'User Logout', '2020-06-18'),
(265, 1, 'User Login', '2020-06-18'),
(266, 3, 'User Logout', '2020-06-18'),
(267, 3, 'User Logout', '2020-06-18'),
(268, 1, 'User Logout', '2020-06-18'),
(269, 22, 'User Login', '2020-06-18'),
(270, 22, 'User Logout', '2020-06-18'),
(271, 22, 'User Login', '2020-06-18'),
(272, 22, 'User Logout', '2020-06-18'),
(273, 3, 'User Login', '2020-06-18'),
(274, 3, 'User Logout', '2020-06-18'),
(275, 1, 'User Login', '2020-06-18'),
(276, 1, 'User Logout', '2020-06-18'),
(277, 2, 'User Login', '2020-06-18'),
(278, 2, 'User Logout', '2020-06-18'),
(279, 6, 'User Login', '2020-06-18'),
(280, 6, 'User Logout', '2020-06-18'),
(281, 4, 'User Login', '2020-06-18'),
(282, 4, 'User Logout', '2020-06-18'),
(283, 23, 'User Register', '2020-06-18'),
(284, 23, 'User Login', '2020-06-18'),
(285, 3, 'User Login', '2020-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `userson`
--

CREATE TABLE `userson` (
  `uvon` varchar(32) NOT NULL,
  `dt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WishlistId` int(5) NOT NULL,
  `OfferId` int(5) NOT NULL,
  `UserId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishlistId`, `OfferId`, `UserId`) VALUES
(15, 59, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activepackage`
--
ALTER TABLE `activepackage`
  ADD PRIMARY KEY (`ActivePackageId`),
  ADD KEY `PackageId` (`PackageId`),
  ADD KEY `BusinessId` (`BusinessId`);

--
-- Indexes for table `adminbusinesschat`
--
ALTER TABLE `adminbusinesschat`
  ADD PRIMARY KEY (`AdminBusinessChatId`),
  ADD KEY `BusinessId` (`BusinessId`);

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`AreaId`),
  ADD KEY `CityId` (`CityId`);

--
-- Indexes for table `businessdetails`
--
ALTER TABLE `businessdetails`
  ADD PRIMARY KEY (`BusinessId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `AreaId` (`AreaId`),
  ADD KEY `PackageId` (`PackageId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `businesstransactiondetails`
--
ALTER TABLE `businesstransactiondetails`
  ADD PRIMARY KEY (`BusinessTransactionId`),
  ADD KEY `businessdetails` (`BusinessId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`),
  ADD KEY `ParentCategoryId` (`ParentCategoryId`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatId`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`),
  ADD KEY `StateId` (`StateId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageId`),
  ADD KEY `OfferId` (`OfferId`);

--
-- Indexes for table `offercomments`
--
ALTER TABLE `offercomments`
  ADD PRIMARY KEY (`OfferCommentId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `OfferId` (`OfferId`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OfferId`),
  ADD KEY `BusinessId` (`BusinessId`),
  ADD KEY `CategoryId` (`CategoryId`) USING BTREE;

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailsId`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `OfferId` (`OfferId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CouponId` (`CouponId`),
  ADD KEY `BusinessId` (`BusinessId`),
  ADD KEY `OfferId` (`OfferId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `ratingstar`
--
ALTER TABLE `ratingstar`
  ADD PRIMARY KEY (`RatingStartId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `OfferId` (`OfferId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewId`),
  ADD KEY `OfferId` (`OfferId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `sponsordetails`
--
ALTER TABLE `sponsordetails`
  ADD PRIMARY KEY (`SponsorDetailsId`),
  ADD KEY `BusinessId` (`BusinessId`),
  ADD KEY `SponsorPlanId` (`SponsorPlanId`) USING BTREE;

--
-- Indexes for table `sponsorplans`
--
ALTER TABLE `sponsorplans`
  ADD PRIMARY KEY (`SponsorPlanId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateId`),
  ADD KEY `CountryId` (`CountryId`);

--
-- Indexes for table `subscriptiondetails`
--
ALTER TABLE `subscriptiondetails`
  ADD PRIMARY KEY (`SubscriptionDetailsId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `BusinessId` (`BusinessId`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `AreaId` (`AreaId`);

--
-- Indexes for table `userinquiry`
--
ALTER TABLE `userinquiry`
  ADD PRIMARY KEY (`UserInquiryId`);

--
-- Indexes for table `userlogreport`
--
ALTER TABLE `userlogreport`
  ADD PRIMARY KEY (`UserLogReportId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `userson`
--
ALTER TABLE `userson`
  ADD PRIMARY KEY (`uvon`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishlistId`),
  ADD KEY `OfferId` (`OfferId`),
  ADD KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activepackage`
--
ALTER TABLE `activepackage`
  MODIFY `ActivePackageId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `adminbusinesschat`
--
ALTER TABLE `adminbusinesschat`
  MODIFY `AdminBusinessChatId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `AdminId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `AreaId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `businessdetails`
--
ALTER TABLE `businessdetails`
  MODIFY `BusinessId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `businesstransactiondetails`
--
ALTER TABLE `businesstransactiondetails`
  MODIFY `BusinessTransactionId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `offercomments`
--
ALTER TABLE `offercomments`
  MODIFY `OfferCommentId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `OfferId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailsId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratingstar`
--
ALTER TABLE `ratingstar`
  MODIFY `RatingStartId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sponsordetails`
--
ALTER TABLE `sponsordetails`
  MODIFY `SponsorDetailsId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sponsorplans`
--
ALTER TABLE `sponsorplans`
  MODIFY `SponsorPlanId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscriptiondetails`
--
ALTER TABLE `subscriptiondetails`
  MODIFY `SubscriptionDetailsId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userinquiry`
--
ALTER TABLE `userinquiry`
  MODIFY `UserInquiryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userlogreport`
--
ALTER TABLE `userlogreport`
  MODIFY `UserLogReportId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishlistId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activepackage`
--
ALTER TABLE `activepackage`
  ADD CONSTRAINT `activepackage_ibfk_1` FOREIGN KEY (`PackageId`) REFERENCES `package` (`PackageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activepackage_ibfk_2` FOREIGN KEY (`BusinessId`) REFERENCES `businessdetails` (`BusinessId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `businessdetails`
--
ALTER TABLE `businessdetails`
  ADD CONSTRAINT `businessdetails_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `userdetails` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businessdetails_ibfk_3` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businessdetails_ibfk_4` FOREIGN KEY (`AreaId`) REFERENCES `area` (`AreaId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `businessdetails_ibfk_5` FOREIGN KEY (`PackageId`) REFERENCES `package` (`PackageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`StateId`) REFERENCES `state` (`StateId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`BusinessId`) REFERENCES `businessdetails` (`BusinessId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
