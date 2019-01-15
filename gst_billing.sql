-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 11:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gst_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `companymaster`
--

CREATE TABLE `companymaster` (
  `cmId` int(11) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `address` text,
  `contactNo` int(15) DEFAULT NULL,
  `emailId` varchar(255) DEFAULT NULL,
  `gistinNo` text,
  `panNo` text,
  `cinNo` text,
  `aadhaarNo` varchar(12) DEFAULT NULL,
  `estimateSeries` text,
  `requiredBarcode` text,
  `TaxForProduct` text,
  `logo` text,
  `logoImage` text,
  `invoiceFormat` text,
  `barcodeFormat` text,
  `natureOfBusiness` text,
  `cashSalesConditions` text,
  `creditSalesConditions` text,
  `accountMode` text,
  `subTitle` text,
  `requiredRateCalculator` float DEFAULT NULL,
  `requiredProductImage` text,
  `packingCalculator` text,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='companyMaster';

--
-- Dumping data for table `companymaster`
--

INSERT INTO `companymaster` (`cmId`, `companyName`, `address`, `contactNo`, `emailId`, `gistinNo`, `panNo`, `cinNo`, `aadhaarNo`, `estimateSeries`, `requiredBarcode`, `TaxForProduct`, `logo`, `logoImage`, `invoiceFormat`, `barcodeFormat`, `natureOfBusiness`, `cashSalesConditions`, `creditSalesConditions`, `accountMode`, `subTitle`, `requiredRateCalculator`, `requiredProductImage`, `packingCalculator`, `active`) VALUES
(15, 'alina software1', 'mp nagar bhopal', 4578954, 'anjah@gmail.com', '87465465', '65748564', '687456', '6874654657', '5745', '0', 'No', 'logo mmmmmmm', '63.png', '1', '1', '1', '9845564', '', '1', 'asdd', 1, '1', '1', 0),
(21, 'BHKY1', 'HOSangabad indore', 256314789, 'anjan@gmail.com', '12487324536', '87465857465', '87465456', '536451324', '874654', '0', 'No', '54656', '12.png', '1', '1', '1', 'sadas', '', '1', 'sad', 1, '1', '2', 0),
(23, 'BHKY', 'HOSangabad', 256314789, 'asd@gmail.com', '12487324536', '87465857465', '87465456', '536451324', '874654', '0', NULL, 'HJUIOPp', '11.png', '1', '1', '1', 'sadas', '', '1', 'sad', 1, '1', '2', 0),
(32, 'alina software', 'bhopal, bhopal', 4578954, 'shayam@gmail.com', '87465465', '65748564', '687456', '6874654657', '5745', '0', 'No', 'assets/images/', 'LOGO', '1', '1', '1', '9845564', '', '1', 'asdd', 1, '1', '1', 1),
(34, 'beangate', 'bpl', 1236547896, 'asdf@gmail.com', '12365478', '78965478965', '5236985632', '258963147789', 'shi', '0', 'Yes', 'adfdf', 'LOGO', '1', '1', '1', 'asd', '', '1', 'asduj', 2, '1', '1', 1),
(35, 'abc', 'bhopal, bhopal', 2147483647, 'manish09.chakravarti@gmail.com', '1', '1', '1', '1', 'a', 'no', 'Yes', '', 'LOGO', '0', '0', '1', '', '', '1', '', 0, '0', '0', 1),
(36, 'xyz', 'bhopal, bhopal', 2147483647, 'manish99.chakravarti@gmail.com', '', '', '', '', '', '0', 'Yes', '', 'LOGO', '0', '0', '1', '', '', '1', '', 0, '0', '0', 1),
(37, 'manish', 'manish@gmail.com', 2147483647, 'manish@gmail.com', '', '', '', '', '', '0', 'Yes', '', '65.png', '0', '0', '1', '', '', '1', '', 0, '0', '0', 0),
(38, 'new com', 'bhopal', 9856985, 'new@gmail.com', '', '', '', '', '', '0', 'Yes', '', NULL, '0', '0', '1', '', '', '1', '', 0, '0', '0', 0),
(39, 'rahul', 'bhopal', 2147483647, 'rahul@gmail.com', '', '', '', '', '', '0', 'Yes', '', NULL, '0', '0', '1', '', '', '1', '', 0, '0', '0', 0),
(40, 'demo', 'demo', 985698555, 'demo@gmail.com', '123456', '123456', '252535', '123654788', '', '0', 'Yes', 'logo mmmmmmm', '13.png', '0', '0', '1', 'dsa', '4444', '2', 'gsdfg', 1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_bank`
--

CREATE TABLE `company_bank` (
  `cmId` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `bankAccountNo` varchar(20) DEFAULT NULL,
  `bankAccountName` text,
  `bankIfscCode` varchar(10) DEFAULT NULL,
  `bankName` text,
  `branchName` text,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='companyMaster';

--
-- Dumping data for table `company_bank`
--

INSERT INTO `company_bank` (`cmId`, `company_id`, `bankAccountNo`, `bankAccountName`, `bankIfscCode`, `bankName`, `branchName`, `active`) VALUES
(1, 39, '', '', '', '', '', 1),
(2, 40, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_barcode`
--

CREATE TABLE `company_barcode` (
  `barcode_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `barCodeTitle` text,
  `barCodeMrpPrefix` text,
  `barCodeSendingPricePrefix` text,
  `barCodeField` text,
  `barCodePriceCode` text,
  `barCodeField1` text,
  `barCodeField2` text,
  `barCodeField3` text,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='companyMaster';

--
-- Dumping data for table `company_barcode`
--

INSERT INTO `company_barcode` (`barcode_id`, `company_id`, `barCodeTitle`, `barCodeMrpPrefix`, `barCodeSendingPricePrefix`, `barCodeField`, `barCodePriceCode`, `barCodeField1`, `barCodeField2`, `barCodeField3`, `active`) VALUES
(1, 37, '', '', '', '0', '0', '0', '0', '0', 1),
(2, 38, '', '', '', '0', '0', '0', '0', '0', 1),
(3, 39, '', '', '', '0', '0', '0', '0', '0', 1),
(4, 40, '', '', '123456', NULL, NULL, NULL, NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msd_bank_details`
--

CREATE TABLE `msd_bank_details` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `accountId` varchar(255) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `accountHolder` varchar(255) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `ifscCode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_bank_details`
--

INSERT INTO `msd_bank_details` (`id`, `company_id`, `accountId`, `bankName`, `accountHolder`, `accountNumber`, `branch`, `ifscCode`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 3, '123456', '1', 'manish chakravarti', 'fghd', 'sdaf', 'sdfg', 1, NULL, 0, '2019-01-03 08:36:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 2, '123456', '1', 'manish', '123456', '22', '2222', 1, NULL, 0, '2019-01-03 08:42:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 2, '123456', '1', 'manish', '123456', '225645', 'BOI123456', 1, NULL, 0, '2019-01-03 08:44:32', '0000-00-00 00:00:00', '2019-01-03 08:45:05', NULL),
(4, 2, '123456', '1', 'manish', '123456', '22', '2222', 1, NULL, 0, '2019-01-03 08:44:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 40, '123456', '2', 'manish chakravarti', 'fghd', 'sdaf', 'sdfg', 1, NULL, 0, '2019-01-10 10:10:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 40, '123456', '2', 'manish chakravarti', 'fghd', 'sdaf', 'new', 1, NULL, 0, '2019-01-10 10:10:54', '0000-00-00 00:00:00', '2019-01-10 13:16:53', NULL),
(7, 40, '123456', '1', 'manish chakravarti', 'fghd', 'sdaf', 'sdfg4444', 1, NULL, 0, '2019-01-10 10:14:29', '0000-00-00 00:00:00', '2019-01-10 13:16:42', NULL),
(8, 36, '123456', '1', 'manish chakravarti', 'fghd', 'sdaf', 'sdfg', 1, NULL, 0, '2019-01-15 09:01:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_group_master`
--

CREATE TABLE `msd_group_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_group_master`
--

INSERT INTO `msd_group_master` (`id`, `company_id`, `groupName`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, '2', 1, NULL, 0, '2018-12-23 15:59:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 0, '1', 1, NULL, 0, '2018-12-23 16:03:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 0, '1', 1, NULL, 0, '2018-12-24 06:40:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 0, '1', 1, NULL, 0, '2018-12-24 06:55:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 36, 'ghjfg', 1, NULL, 0, '2019-01-15 09:01:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_party_master`
--

CREATE TABLE `msd_party_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `partyImage` varchar(255) DEFAULT NULL,
  `customerType` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `primaryContactPerson` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `billingAddress` varchar(255) NOT NULL,
  `addressLine2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `gstinNo` int(11) NOT NULL,
  `panNo` varchar(255) NOT NULL,
  `collectionRoute` varchar(255) NOT NULL,
  `openingBalance` varchar(255) NOT NULL,
  `requiredSms` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_party_master`
--

INSERT INTO `msd_party_master` (`id`, `company_id`, `partyImage`, `customerType`, `customer`, `primaryContactPerson`, `email`, `mobile`, `billingAddress`, `addressLine2`, `city`, `state`, `pin`, `gstinNo`, `panNo`, `collectionRoute`, `openingBalance`, `requiredSms`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, NULL, '1', 'dsds', 'sdsadsd', 'sunil123@gmail.com', '9993967305', '55345', 'address one', 'sdsas', 'sdaf', 0, 0, 'sadsa', '2', '5665', '2', 0, NULL, 0, '2018-12-23 19:00:23', '0000-00-00 00:00:00', '2018-12-29 11:19:14', NULL),
(2, 0, NULL, '1', 'dsds', 'sdsadsd', 'sunil123@gmail.com', '9993967305', '55345', 'address one', 'sdsas', 'sdaf', 0, 0, '645123', '2', '5665', '2', 1, NULL, 0, '2018-12-23 19:00:23', '0000-00-00 00:00:00', '2018-12-29 11:58:25', NULL),
(3, 0, NULL, '1', 'dsds', 'sdsadsd', 'sunil123@gmail.com', '9993967305', '55345', 'address one', 'sdsas', 'sdaf', 0, 0, 'sadsa', '2', '5665', '2', 0, NULL, 0, '2018-12-23 19:00:23', '0000-00-00 00:00:00', '2018-12-29 11:22:02', NULL),
(4, 40, NULL, '1', 'dsds', 'sdsadsd', 'sunil123@gmail.com', '9993967305', '55345', 'address one', 'sdsas', 'sdaf', 0, 0, 'sadsa', '2', '5665', '2', 0, NULL, 0, '2018-12-23 19:00:23', '0000-00-00 00:00:00', '2019-01-10 10:21:48', NULL),
(5, 0, NULL, '1', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-10 10:17:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 40, NULL, '1', 'manish chakravarti', 'sdsadsd', 'sunil.neel88@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 0, NULL, 0, '2019-01-10 10:21:03', '0000-00-00 00:00:00', '2019-01-10 10:21:54', NULL),
(7, 36, NULL, '1', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:04:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 36, NULL, '1', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:04:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 36, '1.png', '2', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, 'sadsa', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:13:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 36, 'a518695f30f8d1b2079eaa8a26005bb6.png', '1', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:14:56', '0000-00-00 00:00:00', '2019-01-15 09:33:38', NULL),
(11, 36, 'ed667e80164fba6ebf5c6c32c51065df.png', '2', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:15:31', '0000-00-00 00:00:00', '2019-01-15 09:33:22', NULL),
(12, 36, 'e335b1b3f172f4e83b2c0041bd296fde.png', '1', 'manish chakravarti', 'sdsadsd', 'manish09.chakravarti@gmail.com', '9926331375', 'bhopal', 'bhopal', 'bhopal', 'Madhya Pradesh', 462038, 0, '65748564', '1', '5665', '1', 1, NULL, 0, '2019-01-15 09:18:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_product_services`
--

CREATE TABLE `msd_product_services` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `productImage` varchar(255) DEFAULT NULL,
  `productCode` varchar(255) NOT NULL,
  `productGroup` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `sellingPrice` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `mrpPrice` varchar(255) NOT NULL,
  `openingStock` varchar(255) NOT NULL,
  `unitType` varchar(255) NOT NULL,
  `salesType` varchar(255) NOT NULL,
  `purchaseType` varchar(255) NOT NULL,
  `calculation` varchar(255) NOT NULL,
  `negativeStock` varchar(255) NOT NULL,
  `hsnCode` varchar(255) NOT NULL,
  `minQty` varchar(255) NOT NULL,
  `subUnit` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_product_services`
--

INSERT INTO `msd_product_services` (`id`, `company_id`, `productImage`, `productCode`, `productGroup`, `productName`, `productType`, `productDescription`, `sellingPrice`, `productPrice`, `mrpPrice`, `openingStock`, `unitType`, `salesType`, `purchaseType`, `calculation`, `negativeStock`, `hsnCode`, `minQty`, `subUnit`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, 'f8f45120d2d5e925fc2ba858db5d9d97.png', 'sdsad', 'dfds', 'dsfs', '1', 'dfds', '2123', '1231', '2332', '31321', 'one', 'GST', 'GST', 'Excluding', 'yes', '213', '2323233', 'No', 1, NULL, 0, '2018-12-24 13:14:32', '0000-00-00 00:00:00', '2019-01-15 08:35:59', NULL),
(2, 0, '5b739b9c2c650ae70c4c35dd8469b8e1.png', 'sdsad', 'dfds', 'zfdf', '3', 'dsfsd', 'dsfsd', 'dsfsd', 'dfsd', 'dfsdsd', 'one', 'GST', 'GST', 'Including', 'yes', 'dfsdf', '1212', 'yes', 1, NULL, 0, '2018-12-25 10:11:43', '0000-00-00 00:00:00', '2019-01-15 08:41:17', NULL),
(3, 36, 'ac559102bf7f1bb25164fcb4d78e1d71.png', 'new code', 'sdaf', 'hjj', '2', 'fdsgd', '12', '12', '21', '55', 'one', 'GST', 'GST', 'Including', 'yes', '1234566', '5', 'yes', 1, NULL, 0, '2019-01-15 07:46:34', '0000-00-00 00:00:00', '2019-01-15 08:26:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_route_master`
--

CREATE TABLE `msd_route_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `routeName` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_route_master`
--

INSERT INTO `msd_route_master` (`id`, `company_id`, `routeName`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, 'r3', 1, NULL, 0, '2018-12-24 07:14:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 0, 'r2', 1, NULL, 0, '2018-12-28 06:42:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 0, 'fgsdf', 1, NULL, 0, '2019-01-10 10:22:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 40, 'DSSA', 1, NULL, 0, '2019-01-10 10:23:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_tex_master`
--

CREATE TABLE `msd_tex_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `texName` varchar(255) NOT NULL,
  `texPercentage` varchar(255) NOT NULL,
  `texType` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_tex_master`
--

INSERT INTO `msd_tex_master` (`id`, `company_id`, `texName`, `texPercentage`, `texType`, `sgst`, `cgst`, `igst`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 2, 'GST', '18', 'sales', '9', '9', '3', 1, NULL, 0, '2019-01-03 09:46:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 2, 'GST one dfsd', '18', 'purchase', '9', '9', '3', 1, NULL, 0, '2019-01-03 09:46:46', '0000-00-00 00:00:00', '2019-01-03 09:47:12', NULL),
(3, 36, 'GST', '18', 'sales', '9', '9', '0', 1, NULL, 0, '2019-01-15 07:45:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 36, 'GST', '18', 'purchase', '5', '3', '9', 1, NULL, 0, '2019-01-15 07:45:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_unit_master`
--

CREATE TABLE `msd_unit_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_unit_master`
--

INSERT INTO `msd_unit_master` (`id`, `company_id`, `unit`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, 'unit', 1, NULL, 0, '2018-12-24 07:56:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 36, 'one', 1, NULL, 0, '2019-01-15 07:44:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 36, 'two', 1, NULL, 0, '2019-01-15 07:44:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msd_user_datails`
--

CREATE TABLE `msd_user_datails` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `accountId` varchar(255) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `accountHolder` varchar(255) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `ifscCode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msd_user_master`
--

CREATE TABLE `msd_user_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msd_user_master`
--

INSERT INTO `msd_user_master` (`id`, `company_id`, `userName`, `name`, `email`, `mobile`, `password`, `active`, `status`, `created_by`, `created_date`, `deleted_date`, `updated_date`, `updated_by`) VALUES
(1, 0, 'admin1@gmail.com', 'manish chakravarti', 'manish09.chakravarti@gmail.com', '9926331375', '123456', 1, NULL, 0, '2019-01-03 08:51:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `loginId` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `userId` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` int(11) NOT NULL DEFAULT '0' COMMENT '0-admin',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`loginId`, `company_id`, `fullName`, `userId`, `password`, `userRole`, `status`) VALUES
(1, 15, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1),
(2, 21, 'admin', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(3, 36, 'Company Name', 'manish99.chakravarti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(4, 39, 'rahul', 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(5, 40, 'demo', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companymaster`
--
ALTER TABLE `companymaster`
  ADD PRIMARY KEY (`cmId`),
  ADD UNIQUE KEY `companyName` (`companyName`),
  ADD UNIQUE KEY `emailId` (`emailId`);

--
-- Indexes for table `company_bank`
--
ALTER TABLE `company_bank`
  ADD PRIMARY KEY (`cmId`),
  ADD UNIQUE KEY `companyName` (`company_id`);

--
-- Indexes for table `company_barcode`
--
ALTER TABLE `company_barcode`
  ADD PRIMARY KEY (`barcode_id`),
  ADD UNIQUE KEY `companyName` (`company_id`);

--
-- Indexes for table `msd_bank_details`
--
ALTER TABLE `msd_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_group_master`
--
ALTER TABLE `msd_group_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_party_master`
--
ALTER TABLE `msd_party_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_product_services`
--
ALTER TABLE `msd_product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_route_master`
--
ALTER TABLE `msd_route_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_tex_master`
--
ALTER TABLE `msd_tex_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_unit_master`
--
ALTER TABLE `msd_unit_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_user_datails`
--
ALTER TABLE `msd_user_datails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msd_user_master`
--
ALTER TABLE `msd_user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`loginId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companymaster`
--
ALTER TABLE `companymaster`
  MODIFY `cmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `company_bank`
--
ALTER TABLE `company_bank`
  MODIFY `cmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_barcode`
--
ALTER TABLE `company_barcode`
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msd_bank_details`
--
ALTER TABLE `msd_bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `msd_group_master`
--
ALTER TABLE `msd_group_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `msd_party_master`
--
ALTER TABLE `msd_party_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `msd_product_services`
--
ALTER TABLE `msd_product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `msd_route_master`
--
ALTER TABLE `msd_route_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msd_tex_master`
--
ALTER TABLE `msd_tex_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msd_unit_master`
--
ALTER TABLE `msd_unit_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `msd_user_datails`
--
ALTER TABLE `msd_user_datails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msd_user_master`
--
ALTER TABLE `msd_user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `loginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
