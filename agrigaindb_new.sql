-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2023 at 01:53 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrigaindb_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `nicno` varchar(12) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `title`, `firstname`, `lastname`, `nicno`, `no`, `lane`, `city`, `phoneno`, `email`, `createddate`, `modifieddate`, `status`) VALUES
(9, 'Mr', 'Sarath', 'Somasiri', '786765224V', '74', 'Panadura Rd', 'Kotte', '0789421648', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(10, 'Mr', 'Nuwan', 'Gamage', '198965480993', '99/5/1', 'Piliyandala Rd', 'Piliyandala', '0773549924', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(11, 'Mrs', 'Sarasi', 'Gamage', '776486224V', '99/5/1', 'Piliyandala Rd', 'Athimale', '0779462557', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(12, 'Ms', 'Pradeepa', 'Athawuda', '797886243V', '20', 'Jambugasmulla Rd', 'Piliyandala', '0779462557', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(13, 'Mr', 'Yasas', 'Perera', '926485224V', '44/3', 'Godawaya Lane', 'Athimale', '0773549924', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(17, 'Mr', 'Jagath', 'Witharana', '747257243V', '20/1C', 'Raja Mw', 'Mihinthale', '0776421748', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(18, 'Mr', 'Nimal', 'Abegunawaradhana', '786735224V', '54/5', 'Jambugasmulla Rd', 'Nugegoda', '0779422648', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(19, 'Mr', 'Ajith', 'Gunapala', '846124348V', '54/5', 'Siyambalanduwa', 'Monaragala', '0789421648', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(21, 'Mr', 'Prabhath', 'Madhusanka', '199145480793', '54/5', 'Padawiya', 'Anuradhapura', '0779462557', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(22, 'Mr', 'Shivaneshan', 'Kannasami', '198347780448', '99B/5/1', 'Keeremalei', 'Jaffna', '0779721648', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(23, 'Mrs', 'Nimali', 'Gunawansa', '865812765V', '72/1', 'Sevanagala Rd', 'Monaragala', '0768549724', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(24, 'Ms', 'Priyadarshani', 'Senarathna', '875812765V', '88/B', 'Thamankaduwa', 'Polonnaruwa', '0789452557', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(25, 'Mr', 'Sandaru', 'Hewage', '615712765V', '94/1', 'Bibile', 'Monaragala', '0763879924', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(26, 'Mr', 'Sahan', 'Tharaka', '197845470993', '92', 'New Town ', 'Wellawaya', '0786424648', 'lakdeadm@gmail.com', NULL, NULL, '1'),
(27, 'Mr', 'dvbfvgn', 'xzcvbb', '764689243V', '99/2', 'dfggh', 'adsf', '0789422648', 'lakdeadm@gmail.com', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `buyeritem`
--

DROP TABLE IF EXISTS `buyeritem`;
CREATE TABLE IF NOT EXISTS `buyeritem` (
  `bi_id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `item_i_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bi_id`),
  KEY `fk_buyeritem_buyer1_idx` (`buyer_id`),
  KEY `fk_buyeritem_item1_idx` (`item_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyeritem`
--

INSERT INTO `buyeritem` (`bi_id`, `buyer_id`, `item_i_id`) VALUES
(16, 9, 4),
(17, 10, 19),
(18, 11, 19),
(19, 12, 19),
(35, 18, 4),
(36, 18, 24),
(37, 19, 19),
(38, 19, 26),
(40, 21, 19),
(41, 22, 4),
(42, 22, 25),
(43, 23, 23),
(44, 24, 26),
(45, 25, 4),
(46, 26, 23),
(47, 26, 24),
(48, 27, 20),
(49, 27, 21),
(56, 13, 4),
(57, 13, 19),
(76, 17, 24),
(77, 17, 26);

-- --------------------------------------------------------

--
-- Table structure for table `buyingorder`
--

DROP TABLE IF EXISTS `buyingorder`;
CREATE TABLE IF NOT EXISTS `buyingorder` (
  `bo_id` int(11) NOT NULL AUTO_INCREMENT,
  `createddate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `status` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `bo_grand_total` double NOT NULL,
  `b_billing_address` text NOT NULL,
  `actstatus` int(11) NOT NULL,
  PRIMARY KEY (`bo_id`),
  KEY `fk_buyingorder_buyer1_idx` (`buyer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyingorder`
--

INSERT INTO `buyingorder` (`bo_id`, `createddate`, `modifieddate`, `status`, `buyer_id`, `location_id`, `date_from`, `date_to`, `bo_grand_total`, `b_billing_address`, `actstatus`) VALUES
(92, '0000-00-00', '0000-00-00', 1, 17, 1, '2022-11-23', '2022-11-30', 14000, '197C, Padaviya, Anuradhapura', 0),
(91, '0000-00-00', '0000-00-00', 1, 17, 4, '2022-11-23', '2022-11-28', 8400, '47, Homagama Rd, Homagama', 0),
(90, '0000-00-00', '0000-00-00', 1, 17, 2, '2022-11-08', '2022-11-16', 5600, '54, Monaragala Rd, Monaragala', 0),
(94, '0000-00-00', '0000-00-00', 0, 13, 2, '2022-11-20', '2022-11-30', 18725, '97/2, Athimale, Monaragala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyingorderitem`
--

DROP TABLE IF EXISTS `buyingorderitem`;
CREATE TABLE IF NOT EXISTS `buyingorderitem` (
  `boitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `buyingorder_bo_id` int(11) NOT NULL,
  `item_i_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `sellingprice` double NOT NULL,
  `bo_balance_qty` int(11) NOT NULL,
  `boi_status` int(11) NOT NULL,
  PRIMARY KEY (`boitem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyingorderitem`
--

INSERT INTO `buyingorderitem` (`boitem_id`, `buyingorder_bo_id`, `item_i_id`, `item_quantity`, `sellingprice`, `bo_balance_qty`, `boi_status`) VALUES
(142, 92, 26, 25, 560, 0, 1),
(135, 91, 26, 15, 560, 0, 1),
(134, 90, 26, 10, 560, 0, 1),
(141, 94, 4, 35, 535, 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buying_supplying_order`
--

DROP TABLE IF EXISTS `buying_supplying_order`;
CREATE TABLE IF NOT EXISTS `buying_supplying_order` (
  `bs_id` int(11) NOT NULL AUTO_INCREMENT,
  `createddate` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Supplier agreed - Ready to Advance Payment(is_buyer_agree) 1, Buyer agreed - Ready to Advance Payment(is_supplier_agree)2, Advance Payment - Assign Agri Officer (advance_to_be_paid)3, Ready to purchase(advance_paid)4, Ready to distpatch(purchased)5, finish_process6',
  `buyer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `bs_quanitiy` decimal(10,0) NOT NULL,
  `invoice` int(11) DEFAULT NULL,
  `grn` int(11) DEFAULT NULL,
  `buyerorder_boi_id` int(11) DEFAULT NULL,
  `supplierorder_soi_id` int(11) DEFAULT NULL,
  `bo_so_type` decimal(10,0) NOT NULL COMMENT '1- buyer. 2-supplier',
  `employee_id` int(11) NOT NULL,
  `vehicle_v_id` int(11) NOT NULL,
  `b_app_date` date NOT NULL,
  `s_app_date` date NOT NULL,
  `full_amount` double NOT NULL,
  `balance_amount` double NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`bs_id`),
  KEY `fk_buying_supplying_order_buyer_order_item1_idx` (`buyerorder_boi_id`),
  KEY `fk_buying_supplying_order_supplier_order_item1_idx` (`supplierorder_soi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buying_supplying_order`
--

INSERT INTO `buying_supplying_order` (`bs_id`, `createddate`, `status`, `buyer_id`, `supplier_id`, `bs_quanitiy`, `invoice`, `grn`, `buyerorder_boi_id`, `supplierorder_soi_id`, `bo_so_type`, `employee_id`, `vehicle_v_id`, `b_app_date`, `s_app_date`, `full_amount`, `balance_amount`, `item_id`) VALUES
(95, '2022-11-25 00:00:00', 3, 17, 38, '15', NULL, NULL, 91, 87, '1', 0, 0, '0000-00-00', '0000-00-00', 0, 0, 26),
(94, '2022-11-25 00:00:00', 6, 17, 38, '10', NULL, 1, 90, 86, '1', 54, 8, '2022-11-09', '2022-11-11', 0, 0, 26),
(97, '2023-02-22 00:00:00', 6, 17, 38, '25', NULL, 2, 92, 88, '1', 53, 3, '2022-11-25', '2022-11-27', 0, 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `category`, `unit`) VALUES
(1, 'Vegetables', 'Vegetables/එළවළු/காய்கறிகள்', 'Kg'),
(2, 'Fruits', 'Fruits/ පළතුරු/பழங்கள்', 'Kg'),
(3, 'Cereals', 'Cereals/ධාන්‍ය වර්ග/ தானியங்கள்', 'Kg'),
(7, 'Rice', ' Rice/සහල්/அரிசி', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `createddate`, `modifieddate`, `status`) VALUES
(1, 'Admin', '2022-06-07 13:06:03', NULL, '1'),
(2, 'Stock Keeper', NULL, NULL, NULL),
(3, 'Agriculture Officer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designationmodule`
--

DROP TABLE IF EXISTS `designationmodule`;
CREATE TABLE IF NOT EXISTS `designationmodule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_designationmodule_designation1_idx` (`designation_id`),
  KEY `fk_designationmodule_module1_idx` (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designationmodule`
--

INSERT INTO `designationmodule` (`id`, `designation_id`, `module_id`) VALUES
(122, 1, 1),
(123, 1, 2),
(124, 1, 3),
(125, 1, 4),
(126, 1, 5),
(127, 1, 6),
(128, 1, 7),
(129, 1, 8),
(130, 1, 9),
(131, 1, 10),
(132, 1, 11),
(133, 1, 12),
(134, 1, 13),
(135, 1, 14),
(136, 1, 15),
(137, 1, 16),
(138, 1, 17),
(139, 1, 18),
(140, 1, 19),
(141, 1, 20),
(142, 1, 21),
(143, 1, 22),
(144, 1, 23),
(145, 1, 24),
(146, 1, 25),
(147, 1, 26),
(148, 1, 27),
(149, 1, 28),
(150, 1, 29),
(151, 1, 30),
(152, 1, 31),
(153, 1, 32),
(154, 1, 33),
(155, 1, 34),
(156, 1, 35),
(197, 2, 1),
(198, 2, 4),
(199, 2, 5),
(200, 2, 9),
(201, 2, 10),
(202, 2, 11),
(203, 2, 14),
(204, 2, 15),
(205, 2, 18),
(206, 2, 19),
(207, 2, 20),
(208, 2, 21),
(209, 2, 22),
(210, 2, 23),
(211, 2, 24),
(212, 2, 28),
(213, 2, 29),
(214, 2, 30),
(215, 2, 34);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `nicno` varchar(12) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `maritalstatus` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dateofrecruitment` date DEFAULT NULL,
  `dateofresigned` date DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `leavestatus` varchar(45) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_location1_idx` (`location_id`),
  KEY `fk_employee_designation1_idx` (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `title`, `firstname`, `lastname`, `nicno`, `dateofbirth`, `maritalstatus`, `gender`, `no`, `lane`, `city`, `phoneno`, `email`, `dateofrecruitment`, `dateofresigned`, `createddate`, `modifieddate`, `leavestatus`, `location_id`, `designation_id`) VALUES
(12, 'Mr', 'Hasith', 'Gamage', '786485224V', '1978-06-07', 'Married', 'Male', '20', 'Lotus Lane', 'Colombo ', '0779462557', 'hasitha@gmail.com', '2017-05-04', NULL, '2022-08-06 18:20:55', NULL, 'work', 4, 1),
(43, 'Mr', 'Sarath', 'Gunadasa', '796465724V', '1979-06-08', 'Married', 'Male', '8/B', 'Godawaya Lane', 'Athimale', '0773549924', 'sarath@gmail.com', '2020-07-08', NULL, NULL, NULL, 'work', 2, 2),
(46, 'Mr', 'Nuwan', 'Athawuda', '884466723V', '1988-11-05', 'Unmarried', 'Male', '98', 'High Level Rd', 'Nugegoda', '0789476678', 'nuwan@gmail.com', '2018-10-05', NULL, NULL, NULL, 'work', 4, 2),
(47, 'Mr', 'Nimal', 'Senarathna', '856124348V', '1985-10-20', 'Married', 'Male', '64/2/C', 'New Town ', 'Anuradhapura', '0774581248', 'nimal@gmail.com', '2018-04-08', NULL, NULL, NULL, 'work', 1, 2),
(48, 'Mrs', 'Sarala', 'Wariyapola', '198675240549', '1986-08-30', 'Married', 'Female', '21/A', 'Jambugasmulla Rd', 'Nugegoda', '0769318645', 'sarala@gmail.com', '2019-12-02', NULL, NULL, NULL, 'work', 4, 3),
(49, 'Ms', 'Nilupuli', 'Perera', '199185870159', '1991-09-12', 'Unmarried', 'Female', '8/B', 'Piliyandala Rd', 'Piliyandala', '0725435315', 'nilupuli@gamil.com', '2019-11-26', NULL, NULL, NULL, 'work', 4, 3),
(50, 'Mr', 'Piyal', 'Siriwardhana', '198217600448', '1982-03-04', 'Married', 'Male', '556', 'Ekamuth Lane', 'Kirulapone', '0774676777', 'piyal@gmail.com', '2019-07-07', NULL, NULL, NULL, 'work', 4, 3),
(51, 'Ms', 'Sewwandi', 'Silva', '877425812V', '1987-01-10', 'Unmarried', 'Female', '7A/1', 'Udaya Mw', 'Anuradhapura', '0772421248', 'sewwandi@gmail.com', '2018-06-14', NULL, NULL, NULL, 'work', 1, 3),
(52, 'Mrs', 'Nadeeka', 'Munasinghe', '917504978V', '1991-10-25', 'Married', 'Female', '321', 'Wewa Rd', 'Anuradhapura', '0779047148', 'nadeeka@gmail.com', '2019-05-05', NULL, NULL, NULL, 'work', 1, 3),
(53, 'Mr', 'Gamini', 'Piyarathna', '782487248V', '1978-09-25', 'Married', 'Male', '91/C/1', 'Mihindu Mw', 'Anuradhapura', '0779728748', 'gamini@gmail.com', '2019-11-09', NULL, NULL, NULL, 'work', 1, 3),
(54, 'Mr', 'Saman', 'Sevirathna', '869587843V', '1986-08-09', 'Married', 'Male', '74/5B', 'Wickrama Rd', 'Bibile', '0778247415', 'saman@gmail.com', '2018-09-24', NULL, NULL, NULL, 'work', 2, 3),
(55, 'Mrs', 'Padmini', 'Piyadasa', '198798100754', '1987-10-09', 'Married', 'Female', '17/15', 'Perakum Rd', 'Buttala', '0789763497', 'padmini@gmail.com', '2019-08-30', NULL, NULL, NULL, 'work', 2, 3),
(56, 'Mr', 'Jayalath', 'Chandrasekara', '924746257V', '1992-03-15', 'Married', 'Male', '48', 'Wijaya Mw', 'Monaragala', '0726744785', 'jayalath@gmail.com', '2018-07-29', NULL, NULL, NULL, 'work', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_code` varchar(45) DEFAULT NULL,
  `item` varchar(45) DEFAULT NULL,
  `itemimage` varchar(45) DEFAULT NULL,
  `sellingprice` decimal(10,0) DEFAULT '0',
  `buyingprice` decimal(10,0) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `i_status` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`i_id`),
  KEY `fk_item_category1_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_code`, `item`, `itemimage`, `sellingprice`, `buyingprice`, `createdate`, `modifieddate`, `i_status`, `category_id`) VALUES
(4, 'Carrot', 'Carrot/කැරට්/கேரட்', 'carrot.jpg', '535', '530', NULL, NULL, 'active', 1),
(19, 'Basmathi', 'Basmathi/බාස්මතී/பாஸ்மதி', 'basmathi.jpg', '485', '480', NULL, NULL, 'active', 7),
(20, 'eggplant', 'Eggplant/ වම්බටු/  கத்திரிக்காய்', 'eggplant.jpg', '420', '400', NULL, NULL, 'active', 1),
(21, 'Oats', 'Oats/  ඕට්ස්/ ஓட்ஸ்', 'Oats.jpg', '1250', '1100', NULL, NULL, 'active', 3),
(22, 'Orange', 'Orange/ දොඩම්/ ஆரஞ்சு', 'orange.jpg', '740', '700', NULL, NULL, 'active', 2),
(23, 'Corn', 'Corn/ඉරිඟු/சோளம்', 'corn.jpg', '1120', '1110', NULL, NULL, 'active', 3),
(24, 'Green Beans', 'Green Beans/බෝංචි/பீன்ஸ்', 'greenbeans.jpg', '420', '410', NULL, NULL, 'active', 1),
(25, 'Grapes -Red', 'Grapes -Red/ රතු මිදි/ சிவப்பு திராட்சை', 'grapes-red.jpg', '2150', '2100', NULL, NULL, 'active', 2),
(26, 'Nadu Rice', 'Nadu Rice/නාඩු සහල්/ நாட்டு அரிசி', 'nadurice.jpg', '560', '530', NULL, NULL, 'active', 7),
(27, 'Beetroot', 'Beetroot/ බීට්රූට්/ பீட்ரூட்', 'beetroot.jpg', '620', '600', NULL, NULL, 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `code`, `location`) VALUES
(1, 'Anuradhapura', 'Anuradhapura/අනුරාධපුරය/அனுராதபுரம்'),
(2, 'Monaragala', 'Monaragala/‌මොණරාගල/மொனோராகல'),
(4, 'Colombo', 'Colombo/කොළඹ/ கொழும்பு');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `code`, `name`, `createddate`, `modifieddate`, `status`) VALUES
(1, 'employee_list', 'Employee List', '2022-06-07 14:01:02', '2022-06-07 14:01:02', '1'),
(2, 'employee_create', 'Employee Create', '2022-06-22 13:39:40', NULL, '1'),
(3, 'employee_edit', 'Employee Edit', '2022-06-22 13:39:40', NULL, '1'),
(4, 'supplier_list', 'Supplier List', '2022-06-22 13:43:56', NULL, '1'),
(5, 'supplier_create', 'Supplier Create', '2022-06-22 13:43:56', NULL, '1'),
(6, 'module_list', 'Module List', NULL, NULL, NULL),
(7, 'module_create', 'Module Create', NULL, NULL, NULL),
(8, 'module_edit', 'Module Edit', NULL, NULL, NULL),
(9, 'buyer_create', 'Buyer Create', NULL, NULL, NULL),
(10, 'buyer_edit', 'Buyer Edit', NULL, NULL, NULL),
(11, 'buyer_list', 'Buyer List', NULL, NULL, NULL),
(12, 'category_create', 'Category Create', NULL, NULL, NULL),
(13, 'category_edit', 'Category Edit', NULL, NULL, NULL),
(14, 'category_list', 'Category List', NULL, NULL, NULL),
(15, 'item_list', 'Item List', NULL, NULL, NULL),
(16, 'item_create', 'Item Create', NULL, NULL, NULL),
(17, 'item_edit', 'Item Edit', NULL, NULL, NULL),
(18, 'supplier_edit', 'Supplier Edit', NULL, NULL, NULL),
(19, 'buyingorder_create', 'Buyingorder Create', NULL, NULL, NULL),
(20, 'buyingorder_list', 'Buyingorder List', NULL, NULL, NULL),
(21, 'buyingorder_edit', 'Buyingorder Edit', NULL, NULL, NULL),
(22, 'supplyingorder_list', 'Supplyingorder List', NULL, NULL, NULL),
(23, 'supplyingorder_create', 'Supplyingorder Create', NULL, NULL, NULL),
(24, 'supplyingorder_edit', 'Supplyingorder Edit', NULL, NULL, NULL),
(25, 'location_list', 'Location List', NULL, NULL, NULL),
(26, 'Location_edit', 'Location Edit', NULL, NULL, NULL),
(27, 'location_create', 'Location Create', NULL, NULL, NULL),
(28, 'vehicle_create', 'Vehicle Create', NULL, NULL, NULL),
(29, 'vehicle_list', 'Vehicle List', NULL, NULL, NULL),
(30, 'vehicle_edit', 'Vehicle Edit', NULL, NULL, NULL),
(31, 'designation_create', 'Designation Create', NULL, NULL, NULL),
(32, 'designation_list', 'Designation List', NULL, NULL, NULL),
(33, 'designation_edit', 'Designation_Edit', NULL, NULL, NULL),
(34, 'manageorderindex_list', 'Manageorder Index List', NULL, NULL, NULL),
(35, 'category_delete', 'Category  Delete', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

DROP TABLE IF EXISTS `stakeholder`;
CREATE TABLE IF NOT EXISTS `stakeholder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`id`, `username`, `password`, `createddate`, `modifieddate`, `status`, `type`, `employee_id`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2022-08-06 18:19:18', NULL, NULL, 'employee', 12),
(11, 'nuwan', '30e02acd16df6c6eb5e3a3d19f34a636', NULL, NULL, NULL, 'employee', 46),
(12, 'nimal', '8e238955d8926765a95329a6635bcd42', NULL, NULL, NULL, 'employee', 47),
(13, 'sarala', '960f29a595277b6db7aeae2a6972fa58', NULL, NULL, NULL, 'employee', 48),
(14, 'nilupuli', '577767c1bff4bdcf4e740c673569cc57', NULL, NULL, NULL, 'employee', 49),
(15, 'piyal', '4d88977fefd63bf11c39bb65f62304db', NULL, NULL, NULL, 'employee', 50),
(16, 'sewwandi', '1b1f799d1f9e3ce21d173efcd70ffd29', NULL, NULL, NULL, 'employee', 51),
(17, 'nadeeka', '0dd18b654833a2ab0522ae779bc12eb4', NULL, NULL, NULL, 'employee', 52),
(18, 'gamini', '87515d7bf34bd1f88b4643df1400b1f4', NULL, NULL, NULL, 'employee', 53),
(19, 'saman', 'ce5d68981471ae0ee9dcf1e6b654ae98', NULL, NULL, NULL, 'employee', 54),
(20, 'padmini', '46a7ddd0b542b678946382811a08a022', NULL, NULL, NULL, 'employee', 55),
(21, 'jayalath', 'ec214b63bd8f8cd27e9223308768accf', NULL, NULL, NULL, 'employee', 56),
(22, 'nuwan10', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '1', 'buyer', 10),
(24, 'sarasi11', '5d758a3', NULL, NULL, NULL, 'buyer', 11),
(25, 'pradeepa12', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '1', 'buyer', 12),
(26, 'yasas13', '38e9e3e3c8416b6e325a57e28bdd8654', NULL, NULL, '1', 'buyer', 13),
(27, 'nayana12', '4272ee3c5fdd712be531de9cf1931c97', NULL, NULL, '1', 'supplier', 12),
(56, 'nimali14', 'eb002b0844d177c8cc38e1e28c64d372', NULL, NULL, '1', 'supplier', 14),
(76, 'wijitha31', '99a6b0c86de47e0ef6c7b4d2ef71b54d', NULL, NULL, NULL, 'supplier', 31),
(77, 'nimal32', '70a00c37cf26463009a23cb81dc33156', NULL, NULL, '1', 'supplier', 32),
(78, 'sarath', '48128c60c3c3610a41cb37fc97be80ea', NULL, NULL, NULL, 'employee', 43),
(79, 'nimali33', 'f92d3bb23f3b9b078418a88b34c4cc64', NULL, NULL, NULL, 'supplier', 33),
(81, 'jagath17', 'cd2172640917f1d6b488817400b7f684', NULL, NULL, '1', 'buyer', 17),
(82, 'nimal18', '6891f1dab467fc68c903518d09c4b604', NULL, NULL, NULL, 'buyer', 18),
(83, 'ajith19', '83c5c871f7ab47fd032776aedf45d536', NULL, NULL, NULL, 'buyer', 19),
(85, 'prabhath21', '64b2b1a8dde3e8da0477132ec9e05c39', NULL, NULL, NULL, 'buyer', 21),
(86, 'shivaneshan22', 'ae657f04d1e407447ce01941ca4119d3', NULL, NULL, NULL, 'buyer', 22),
(87, 'nimali23', 'c2fc39e934102caa5aaba6e3507c1591', NULL, NULL, NULL, 'buyer', 23),
(88, 'priyadarshani24', 'd7ecdad0754737fd2787934918581fff', NULL, NULL, NULL, 'buyer', 24),
(89, 'sandaru25', '0dc42cd5f5d50d4914363bb5e7bec01d', NULL, NULL, NULL, 'buyer', 25),
(90, 'prapeep33', 'c0e82afc55c7c0a29797d498067dbc1e', NULL, NULL, NULL, 'supplier', 33),
(91, 'jagath34', '0b8b3aecacbd978aea564f92ed97ae25', NULL, NULL, NULL, 'supplier', 34),
(92, 'shanmugaraja35', 'f534830696d914db8f97cc216276929c', NULL, NULL, NULL, 'supplier', 35),
(93, 'gamini36', '78cf35e966626182ea26247c6549d96c', NULL, NULL, NULL, 'supplier', 36),
(94, 'tharuni37', '2b74ef57b11d6662caeb79d4ec5687a1', NULL, NULL, NULL, 'supplier', 37),
(95, 'sahan26', '88bd7330018b1546d073b855c893f032', NULL, NULL, NULL, 'buyer', 26),
(96, 'chamath38', 'eefa94c7e5d03cdde92667d64fbdc8f5', NULL, NULL, '1', 'supplier', 38),
(97, 'dvbfvgn27', '91faecb8ab372a2bdf9b78f33339a883', NULL, NULL, NULL, 'buyer', 27),
(98, 'abc39', 'f374cbd83caca037d253c4f6cbfc3244', NULL, NULL, NULL, 'supplier', 39);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `nicno` varchar(12) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `title`, `firstname`, `lastname`, `nicno`, `no`, `lane`, `city`, `phoneno`, `email`, `createddate`, `modifieddate`, `status`, `age`) VALUES
(10, 'Mr', 'Nuwan', 'Athawuda', '197865480993', '8/B', 'Lotus Lane', 'Anuradhapura', '0789421648', 'lakdeadm@gmail.com', NULL, NULL, '1', 44),
(12, 'Mrs', 'Nayana', 'Abewardhana', '956185224V', '8/B', 'Lotus Lane', 'Piliyandala', '0789422648', 'lakdeadm@gmail.com', NULL, NULL, '1', 27),
(14, 'Mrs', 'Nimali', 'Pathirana', '906472162V', '99/5/1B', 'Panadura Rd', 'colombo', '0776487956', 'lakdeadm@gmail.com', NULL, NULL, '1', 32),
(31, 'Mr', 'Wijitha', 'Gunasinghe', '197878480683', '245', 'Athimale', 'Monaragala', '0776849512', 'lakdeadm@gmail.com', NULL, NULL, '1', 44),
(32, 'Mr', 'Nimal', 'Athawuda', '198879480993', '44/3', 'Godawaya Lane', 'colombo', '0779462557', 'lakdeadm@gmail.com', NULL, NULL, '1', 34),
(33, 'Mr', 'Prapeep', 'Sirisena', '946468724V', '70/5A', 'Nochciyagama', 'Anuradhapura', '0789424648', 'lakdeadm@gmail.com', NULL, NULL, '1', 28),
(34, 'Mr', 'Jagath', 'Witharana', '914746257V', '25', 'Rambewa', 'Anuradhapura', '0789461648', 'lakdeadm@gmail.com', NULL, NULL, '1', 31),
(35, 'Mr', 'Shanmugaraja', 'Sathyanadan', '198965484693', '92/5C', 'Uduvil', 'Jaffna', '0763544964', 'lakdeadm@gmail.com', NULL, NULL, '1', 33),
(36, 'Mr', 'Gamini', 'Priyashantha', '695872765V', '58/2', 'Dimbulagala Rd', 'Dimbulagala', '0786421648', 'lakdeadm@gmail.com', NULL, NULL, '1', 53),
(37, 'Mrs', 'Tharuni', 'Nisansala', '729812765V', '85', 'Badulla Rd', 'Badulla', '0773949924', 'lakdeadm@gmail.com', NULL, NULL, '1', 50),
(38, 'Mr', 'Chamath', 'Hatharasinghe', '855812765V', '73B', 'Kalpitiya', 'Puththalama', '0779422448', 'lakdeadm@gmail.com', NULL, NULL, '1', 37);

-- --------------------------------------------------------

--
-- Table structure for table `supplieritem`
--

DROP TABLE IF EXISTS `supplieritem`;
CREATE TABLE IF NOT EXISTS `supplieritem` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `item_i_id` int(11) NOT NULL,
  PRIMARY KEY (`si_id`),
  KEY `fk_supplieritem_supplier1_idx` (`supplier_id`),
  KEY `fk_supplieritem_item1_idx` (`item_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplieritem`
--

INSERT INTO `supplieritem` (`si_id`, `supplier_id`, `item_i_id`) VALUES
(13, 10, 4),
(46, 32, 19),
(51, 14, 4),
(52, 14, 20),
(54, 33, 26),
(55, 31, 19),
(56, 31, 23),
(57, 34, 4),
(58, 34, 24),
(59, 35, 25),
(60, 36, 26),
(61, 37, 4),
(62, 37, 27),
(67, 12, 4),
(68, 12, 19),
(72, 38, 20),
(73, 38, 26);

-- --------------------------------------------------------

--
-- Table structure for table `supplyingorder`
--

DROP TABLE IF EXISTS `supplyingorder`;
CREATE TABLE IF NOT EXISTS `supplyingorder` (
  `so_id` int(11) NOT NULL AUTO_INCREMENT,
  `createddate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `status` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `so_grand_total` double NOT NULL,
  `s_billing_address` text NOT NULL,
  `actstatus` int(11) NOT NULL,
  PRIMARY KEY (`so_id`),
  KEY `fk_supplyingorder_buyer1_idx` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplyingorder`
--

INSERT INTO `supplyingorder` (`so_id`, `createddate`, `modifieddate`, `status`, `supplier_id`, `location_id`, `date_from`, `date_to`, `so_grand_total`, `s_billing_address`, `actstatus`) VALUES
(88, '0000-00-00', '0000-00-00', 1, 38, 1, '2022-11-24', '2022-11-29', 13250, '14, New Town, Anuradhapura', 0),
(87, '0000-00-00', '0000-00-00', 1, 38, 4, '2022-11-24', '2022-11-27', 7950, '15, Awissawella Rd, Colombo', 0),
(86, '0000-00-00', '0000-00-00', 1, 38, 2, '2022-11-09', '2022-11-14', 5300, '74, Bilbile, Monaragala', 0),
(85, '0000-00-00', '0000-00-00', 0, 14, 1, '2022-11-27', '2022-12-01', 5300, '15, New Town, Anuradhapura', 0),
(91, '0000-00-00', '0000-00-00', 0, 14, 2, '2022-11-23', '2022-11-28', 18550, '12, Monaragala Rd, Monaragala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplyingorderitem`
--

DROP TABLE IF EXISTS `supplyingorderitem`;
CREATE TABLE IF NOT EXISTS `supplyingorderitem` (
  `soitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplyingorder_so_id` int(11) NOT NULL,
  `item_i_id` int(11) NOT NULL,
  `sitem_quantity` int(11) NOT NULL,
  `buying_price` double NOT NULL,
  `so_balance_qty` int(11) NOT NULL,
  `soi_status` int(11) NOT NULL,
  PRIMARY KEY (`soitem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplyingorderitem`
--

INSERT INTO `supplyingorderitem` (`soitem_id`, `supplyingorder_so_id`, `item_i_id`, `sitem_quantity`, `buying_price`, `so_balance_qty`, `soi_status`) VALUES
(131, 88, 26, 25, 530, 0, 1),
(130, 87, 26, 15, 530, 0, 1),
(129, 86, 26, 10, 530, 0, 1),
(128, 85, 4, 10, 530, 10, 0),
(134, 91, 4, 35, 530, 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicleno` varchar(11) NOT NULL,
  `ownername` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `v_status` tinyint(1) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `vehicleno`, `ownername`, `location_id`, `v_status`, `createddate`, `modifieddate`) VALUES
(8, '65-6489', 'Mrs. Priyanthi Rjapaksha', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'QA-2648', 'Mr. Susantha Prabath', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'BE-3479', 'Mr. Shriyantha Hewa', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '36-7591', 'Mr. Indunil Prakrama', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '52-4756', 'Mr. Sahan Ranwaka', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'AD-2478', 'Mr. Gayantha Chandrapala', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '64-7915', 'Mrs. Hema Walikanna', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '49-7820', 'Mr. Athula Fernando', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'DE-5931', 'Mr.Jagath Thilakasiri', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '24-5975', 'Mrs. Siriyalatha Mudunkotuwa', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '58-7468', 'Mrs. Chandrika Silva', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '67-5784', 'Mr. Prasad Dalugama', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyeritem`
--
ALTER TABLE `buyeritem`
  ADD CONSTRAINT `fk_buyeritem_buyer1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buyeritem_item1` FOREIGN KEY (`item_i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `designationmodule`
--
ALTER TABLE `designationmodule`
  ADD CONSTRAINT `fk_designationmodule_designation1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_designationmodule_module1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_designation1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplieritem`
--
ALTER TABLE `supplieritem`
  ADD CONSTRAINT `fk_supplieritem_item1` FOREIGN KEY (`item_i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplieritem_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
