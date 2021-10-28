-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 03:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` bigint(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(25) DEFAULT NULL,
  `module` varchar(50) NOT NULL,
  `event` varchar(25) NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `log_description` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `company_id`, `user_id`, `user_type`, `module`, `event`, `ipaddress`, `log_description`, `date`) VALUES
(1, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson logged in to the mobile app', '2021-10-23 21:52:12'),
(2, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson logged in to the mobile app', '2021-10-23 21:52:47'),
(3, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-23 21:53:01'),
(4, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-23 21:54:52'),
(5, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-23 21:56:04'),
(6, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-23 21:56:25'),
(7, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-23 21:58:14'),
(8, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-26 02:27:09'),
(9, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-26 03:19:29'),
(10, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-26 13:43:14'),
(11, 1, 7, NULL, 'LOGIN', 'LOGIN', '127.0.0.1', 'Jayson Sarino has been Login.', '2021-10-26 23:40:37'),
(12, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-27 04:30:47'),
(13, 1, 7, NULL, 'LOGIN', 'LOGIN', '127.0.0.1', 'Jayson Sarino has been Login.', '2021-10-27 04:57:52'),
(14, 1, 7, NULL, 'LOGIN', 'LOGIN', '127.0.0.1', 'Jayson Sarino has been Login.', '2021-10-28 00:48:27'),
(15, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-28 01:20:20'),
(16, 1, 7, NULL, 'Mobile App - Login', 'Login', '127.0.0.1', 'Jayson Sarino logged in to the mobile app', '2021-10-28 01:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `api_key` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `api_limit`
--

CREATE TABLE `api_limit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uri` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_limit`
--

INSERT INTO `api_limit` (`id`, `user_id`, `uri`, `class`, `method`, `ip_address`, `time`) VALUES
(1, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634909837'),
(2, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634909920'),
(3, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634909952'),
(4, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634910072'),
(5, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634910095'),
(6, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634910528'),
(7, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634910541'),
(8, NULL, 'api/user/demo', 'api_test', 'demo', '127.0.0.1', '1634910596');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address1` mediumtext NOT NULL,
  `address2` mediumtext DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL,
  `state` varchar(75) DEFAULT NULL,
  `country` varchar(75) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `fax` varchar(75) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `primary_email` varchar(75) DEFAULT NULL,
  `twitter_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `default_timezone` varchar(255) NOT NULL,
  `last_modified_by` int(11) DEFAULT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - InActive; 1 - Active;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `logo`, `name`, `address1`, `address2`, `city`, `state`, `country`, `zip_code`, `fax`, `phone1`, `phone2`, `primary_email`, `twitter_link`, `linkedin_link`, `instagram_link`, `default_timezone`, `last_modified_by`, `last_modified_date`, `created_by`, `created_date`, `nStatus`) VALUES
(1, 'logo-53172-1565944358.png', 'Heemah', 'Riyadh, Saudi Arabia', NULL, 'Silang', 'Cavite', 'Select Country', '4118', '', '0569875254', '', 'info@heemah.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', '', NULL, '2020-09-09 12:05:26', 0, '2019-08-15 04:59:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `developer` varchar(125) DEFAULT NULL,
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `company_id`, `developer`, `nStatus`) VALUES
(1, 1, 'THE NEW APEC DEVELOPMENT CORP.', 1),
(2, 1, 'BORLAND DEVELOPMENT CORP.', 1),
(3, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `division` varchar(155) DEFAULT NULL,
  `division_user_id` int(11) NOT NULL,
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `company_id`, `division`, `division_user_id`, `nStatus`) VALUES
(3, 1, 'Sales Division', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `position` varchar(155) DEFAULT NULL,
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `company_id`, `position`, `nStatus`) VALUES
(2, 1, 'Sales Agent', 1),
(3, 1, 'Unit manager', 1),
(4, 1, 'Sales Associate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `developer_id` int(11) DEFAULT NULL,
  `project_name` varchar(125) DEFAULT NULL,
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `developer_id`, `project_name`, `nStatus`) VALUES
(1, 1, 'CITADEL RESIDENCES', 1),
(2, 1, 'CASA ESPERANZA', 1),
(3, 1, 'BIRMINGHAM VILLAGE', 1),
(4, 1, 'HIGHLAND RESIDENCES', 1),
(5, 1, 'SAN ISIDRO HEIGHTS', 1),
(6, 1, 'BRIXTON HOMES', 1),
(7, 1, 'MORGAN RESIDENCES', 1),
(8, 1, 'CENTENNIAL DE CALAMBA', 1),
(9, 1, 'GRANDVIEW HEIGHTS', 1),
(10, 1, 'CASA ISABEL', 1),
(11, 1, 'AZALEA VISTA', 1),
(12, 1, 'MOSAIC TOWNHOMES', 1),
(13, 1, 'ALPHINE RESIDENCES ', 1),
(14, 1, 'BRENTWOOD RESIDENCES', 1),
(15, 1, 'CASA SEGOVIA', 1),
(16, 1, 'MONTANA HEIGHTS', 1),
(17, 1, 'THE RIDGE', 1),
(18, 1, 'UPTOWN VILLAGE', 1),
(19, 1, 'VERDANZA HOMES', 1),
(20, 1, 'VILLA MARCELA', 1),
(21, 2, 'LA BELLA', 1),
(22, 2, 'SOTHWIND HOMES', 1),
(23, 2, 'RIO VERDE', 1),
(24, 2, 'AMIRA TOWNHOMES', 1),
(25, 2, 'BRIGHTWOOD VILLAS', 1),
(26, 2, 'SOUTHSPRING HEIGHTS', 1),
(27, 2, 'PLAINCREST SUBDIVISION', 1),
(28, 1, 'VILLA DE CHARLOTTE', 1),
(29, 3, '11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `buyer_name` varchar(175) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `tel_cell` varchar(55) DEFAULT NULL,
  `occupation` varchar(125) DEFAULT NULL,
  `name_of_project` int(11) DEFAULT NULL,
  `location` varchar(75) DEFAULT NULL,
  `developer` int(11) DEFAULT NULL,
  `financing_scheme` varchar(55) DEFAULT NULL,
  `blk_floor` varchar(25) DEFAULT NULL,
  `lot_unit` varchar(25) DEFAULT NULL,
  `phase` varchar(25) DEFAULT NULL,
  `lot_area` varchar(55) DEFAULT NULL,
  `floor_area` varchar(55) NOT NULL,
  `net_total_contract_price` double(11,2) NOT NULL DEFAULT 0.00,
  `das_amount` double(11,2) NOT NULL DEFAULT 0.00,
  `miscellaneous` double(11,2) NOT NULL DEFAULT 0.00,
  `downpayment` double(11,2) NOT NULL DEFAULT 0.00,
  `schedule_downpayment` double(11,2) NOT NULL DEFAULT 0.00,
  `monthly_dp` double(11,2) NOT NULL DEFAULT 0.00,
  `sales_person` varchar(125) DEFAULT NULL,
  `prepared_by` int(11) NOT NULL,
  `commission_rate` float DEFAULT NULL,
  `attachments` mediumtext DEFAULT NULL,
  `tl_sd` varchar(55) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) NOT NULL,
  `lastModifiedDate` timestamp NULL DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  `approvedDate` timestamp NULL DEFAULT NULL,
  `sr_number` varchar(55) DEFAULT NULL,
  `sr_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-Pending; 1-Approved; 2-Canceled',
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`id`, `reservation_date`, `buyer_name`, `address`, `tel_cell`, `occupation`, `name_of_project`, `location`, `developer`, `financing_scheme`, `blk_floor`, `lot_unit`, `phase`, `lot_area`, `floor_area`, `net_total_contract_price`, `das_amount`, `miscellaneous`, `downpayment`, `schedule_downpayment`, `monthly_dp`, `sales_person`, `prepared_by`, `commission_rate`, `attachments`, `tl_sd`, `createdDate`, `createdBy`, `lastModifiedDate`, `lastModifiedBy`, `approvedBy`, `approvedDate`, `sr_number`, `sr_status`, `nStatus`) VALUES
(4, '2021-01-13', 'JAYSON N. MACATIAG', '', '09230821777', '', 10, '', 1, 'HDMF', '5', '4', '1', '', '', 1203564.00, 1059136.32, 0.00, 0.00, 0.00, 0.00, 'ROWELL VIEJO', 16, NULL, 'a:1:{i:0;s:51:\"mycitihomes-elyanarcdpearlhomes20210311101959AM.png\";}', 'EMMA VIEJO', '2021-03-11 02:19:59', 16, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, '2021-03-12', 'MARICON PADILLA', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '6', '4', '1', '40', '46.60', 1068157.44, 962304.00, 0.00, 153157.44, 0.00, 7055.12, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:49:\"padilla,_mariconrcdpearlhomes20210408123517PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:35:17', 17, '2021-04-11 03:14:10', 13, 13, '2021-04-10 05:45:27', 'SR2021-0300', 1, 1),
(7, '2020-11-03', 'JENNELYN SERRANO', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '2', '14', '1', '40', '46.60', 1048129.49, 944260.80, 0.00, 148129.49, 0.00, 5963.73, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:43:\"serrano,_jrcdpearlhomes20210408124148PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:41:48', 17, '2021-04-10 08:27:23', 13, 13, '2021-04-10 05:44:50', 'SR2020-0620', 1, 1),
(8, '2020-10-19', 'ROMEO LAZAR JR.', 'BACOOR CAVITE', '09338669004', 'OFW', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '6', '12', '1', '70', '54', 2092170.00, 1841109.60, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:40:\"lazar_2rcdpearlhomes20210408124633PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:46:33', 17, '2021-04-10 08:26:24', 13, 13, '2021-04-10 05:44:15', 'SR2020-0587', 1, 1),
(9, '2020-10-13', 'JUNIRENE EMPLEO', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '14', '4', '1', '70', '54', 1944750.00, 1711380.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:39:\"empleorcdpearlhomes20210408125046PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:50:46', 17, '2021-04-10 08:24:42', 13, 13, '2021-04-10 05:44:00', 'SR2020-0586', 1, 1),
(10, '2020-03-15', 'LUTHY JEANNE MACASLING', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '5', '66', '1', '34', '31', 624103.20, 562255.14, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:42:\"macaslingrcdpearlhomes20210408125506PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:55:06', 17, '2021-04-10 08:23:21', 13, 13, '2021-04-10 05:43:38', 'SR2020-0341', 1, 1),
(11, '2020-03-15', 'DEOSA MAE CAPALAD', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '5', '15', '1', '40', '46.60', 1048129.49, 944260.80, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:38:\"deosarcdpearlhomes20210408125700PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:57:00', 17, '2021-04-10 08:22:27', 13, 13, '2021-04-10 05:43:17', 'SR2020-0343', 1, 1),
(12, '2020-06-07', 'JULIE MOZAR', 'BACOOR CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '4', '6', '1', '40', '46.60', 1048129.49, 944260.80, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:38:\"mozarrcdpearlhomes20210408125907PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 04:59:07', 17, '2021-04-10 08:21:41', 13, 13, '2021-04-10 05:42:59', 'SR2020-0344', 1, 1),
(13, '2020-06-08', 'SHAIRA MAE BARAQUIAO', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '7', '11', '1', '31', '34', 624103.20, 562255.14, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:42:\"baraquiaorcdpearlhomes20210408130120PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:01:20', 17, '2021-04-10 07:37:34', 13, 13, '2021-04-10 05:42:36', 'SR2020-0342', 1, 1),
(14, '2020-06-15', 'SHIELA MAY FERNANDEZ', 'BACOOR CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '7', '11', '1', '64', '46.60', 1413052.20, 1273020.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:54:\"fernandez,_shiela_mayrcdpearlhomes20210408130339PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:03:39', 17, '2021-04-10 07:36:32', 13, 13, '2021-04-10 05:42:13', 'SR2020-0346', 1, 1),
(15, '2020-06-28', 'KRIZTIN ROSELLE LARSON', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '5', '25', '1', '85', '46.60', 1509317.75, 1359745.72, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:48:\"larson,_kriztinrcdpearlhomes20210408130653PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:06:53', 17, '2021-04-10 07:34:59', 13, 13, '2021-04-10 05:41:52', 'SR2020-0345', 1, 1),
(16, '2020-07-04', 'GILDEN MAGSANAY', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '9', '94', '1', '31', '34', 639705.78, 576311.51, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:41:\"magsanayrcdpearlhomes20210408130846PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:08:46', 17, '2021-04-10 07:33:22', 13, 13, '2021-04-10 05:41:32', 'SR2020-0347', 1, 1),
(17, '2020-07-05', 'ALYSSA MARIE BALID', 'BACOOR CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '2', '4', '1', '40', '46.60', 1068157.44, 962304.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:45:\"balid_alyssarcdpearlhomes20210408131140PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:11:40', 17, '2021-04-10 07:29:25', 13, 13, '2021-04-10 05:41:11', 'SR2020-0348', 1, 1),
(18, '2020-07-12', 'LARISON BONUS', 'TANZA CAVITE', '09338669004', 'OFW', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '2', '3', '1', '40', '46.60', 1068157.44, 962304.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:46:\"bonus_larisonrcdpearlhomes20210408131353PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:13:53', 17, '2021-04-10 07:25:24', 13, 13, '2021-04-10 05:40:39', 'SR2020-0349', 1, 1),
(19, '2020-07-25', 'NEIL CEDRIC DELA PAZ', 'TRECE MARTIREZ CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '5', '22', '1', '40', '46.60', 1048129.49, 944260.72, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, 'a:1:{i:0;s:47:\"dela_paz,_neilrcdpearlhomes20210408131604PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:16:04', 17, '2021-04-10 06:27:39', 13, 13, '2021-04-10 05:40:00', 'SR2020-0350', 1, 1),
(20, '2020-08-29', 'ANJOBEL CABAJA-AN', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '9', '19', '1', '70', '46.60', 1408847.08, 1269231.60, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:50:\"cabaja-an_anjobelrcdpearlhomes20210408131903PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:19:03', 17, '2021-04-10 06:22:56', 13, 13, '2021-04-10 05:31:07', 'SR2020-0351', 1, 1),
(21, '2020-08-29', 'ELACE CRUZ', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '6', '23', '1', '40', '46.60', 1048129.49, 944260.80, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:44:\"cruz,_elacercdpearlhomes20210408132035PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:20:34', 17, '2021-04-10 06:19:54', 13, 13, '2021-04-10 05:30:59', 'SR2020-0340', 1, 1),
(22, '2020-09-05', 'FLORO LUBAY JR.', 'IMUS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '6', '31', '1', '70', '54', 1942750.00, 1709620.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:45:\"lubay,_flororcdpearlhomes20210408132532PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:25:32', 17, '2021-04-10 06:12:55', 13, 13, '2021-04-10 05:30:50', 'SR2020-0588', 1, 1),
(23, '2020-09-07', 'HAZELLE ANNE ANGKICO', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '16', '6', '1', '70', '54', 1956750.00, 1721940.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:54:\"angkico,_hazelle_annarcdpearlhomes20210408132736PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:27:36', 17, '2021-04-10 06:11:55', 13, 13, '2021-04-10 05:30:40', 'SR2020-0554', 1, 1),
(24, '2020-09-11', 'ISMAEL ARINGO', 'DASMARINAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '3', '10', '1', '40', '46.60', 1068154.44, 96230001.29, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:47:\"aringo,_ismaelrcdpearlhomes20210408132920PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:29:20', 17, '2021-04-10 06:18:18', 13, 13, '2021-04-10 05:30:31', 'SR2020-0583', 1, 1),
(25, '2020-09-19', 'JASMINE ALONZO', 'STA ROSA LAGUNA', '09338669004', 'OFW', 23, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '7', '6', '1', '50', '46.60', 1161397.44, 1046304.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:48:\"alonzo,_jasminercdpearlhomes20210408133116PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:31:16', 17, '2021-04-10 06:17:27', 13, 13, '2021-04-10 05:30:20', 'SR2020-0621', 1, 1),
(26, '2020-09-27', 'AYEN PANGANIBAN', 'CARMONA CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '11', '5', '1', '70', '54', 1940750.00, 1707860.00, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.51, 'a:1:{i:0;s:48:\"panganiban_ayenrcdpearlhomes20210408133307PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:33:07', 17, '2021-04-10 05:58:19', 13, 13, '2021-04-10 05:30:08', 'SR2020-0590', 1, 1),
(27, '2020-10-12', 'MAYCHELLE ANNE LORENZO', 'GENERAL TRIAS CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 19, 'BRGY. PINAGTIPUNAN GENERAL TRIAS CAVITE', 1, 'PAG-IBIG', '7', '2', '1', '70', '54', 1996677.50, 1757076.20, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:47:\"maychelle_annercdpearlhomes20210408133701PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:37:01', 17, '2021-04-10 06:00:30', 13, 13, '2021-04-10 05:29:49', 'SR2020-0582', 1, 1),
(28, '2020-09-29', 'HAROLD TOLLEDO', 'PASIG CITY', '09338669004', 'PRIVATE EMPLOYEE', 9, 'TANAUAN BATANGAS', 1, 'PAG-IBIG', '7', '33', '2', '36', '44', 985408.00, 867159.04, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6.5, 'a:1:{i:0;s:42:\"tolledo_2rcdpearlhomes20210408134208PM.jpg\";}', 'LUCHIE MACA', '2021-04-08 05:42:08', 17, '2021-04-10 05:59:24', 13, 13, '2021-04-10 01:27:08', 'SR2020-0607', 1, 1),
(29, '2021-03-07', 'Ruel Torrado', '', '0995461146', '', 15, '', 1, 'HDMF', '13', '7', 'N/A', '', '', 2050445.80, 1804392.04, 0.00, 0.00, 0.00, 0.00, 'Irish Fajilagot', 19, 7, 'a:4:{i:0;s:80:\"179573602_3887819207977135_131211294407153100_nrcdpearlhomes20210504122324PM.jpg\";i:1;s:81:\"180224606_2849778555275294_3335679352761416873_nrcdpearlhomes20210504122324PM.jpg\";i:2;s:79:\"180279063_2871799759725863_97529497561783097_nrcdpearlhomes20210504122324PM.jpg\";i:3;s:81:\"180633635_1369351016771006_8139756066049644003_nrcdpearlhomes20210504122324PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-04 04:23:24', 19, '2021-05-09 08:53:55', 13, 13, '2021-05-08 06:52:08', 'SR2021-0386', 1, 1),
(30, '2021-02-04', 'Hector Garcilla Cainong', '', '09329595538', '', 10, '', 1, 'HDMF', '1', '28', 'N/A', '', '', 1071646.00, 1071646.00, 0.00, 0.00, 0.00, 0.00, 'Aleth Ronda', 19, 7, 'a:2:{i:0;s:80:\"174670081_456052255687952_8892481067602678133_nrcdpearlhomes20210504144842PM.jpg\";i:1;s:80:\"175970385_292558359108353_7825132102392928533_nrcdpearlhomes20210504144842PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-04 06:48:42', 19, '2021-05-09 08:53:33', 13, 13, '2021-05-08 06:48:25', 'SR2021-0385', 1, 1),
(31, '2021-04-21', 'Hector Garcilla Cainong', '', '09329595538', '', 10, '', 1, 'HDMF', '1', '32', 'N/A', '', '', 1308676.00, 1308676.00, 0.00, 0.00, 0.00, 0.00, 'Aleth Ronda', 19, 7, 'a:2:{i:0;s:80:\"175557565_456878042053183_6920576030931367230_nrcdpearlhomes20210504145040PM.jpg\";i:1;s:80:\"175682263_228501105720811_7394580964691413193_nrcdpearlhomes20210504145040PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-04 06:50:40', 19, '2021-05-09 08:53:11', 13, 13, '2021-05-08 06:37:30', 'SR2021-0384', 1, 1),
(32, '2021-04-17', 'Jimmy Mark Montero Perias', '', '09158892658', '', 10, '', 1, 'HDMF', '3', '8', 'N/A', '', '', 1010600.00, 1010600.00, 0.00, 0.00, 0.00, 0.00, 'Anjo Aguilar', 19, 7, 'a:2:{i:0;s:80:\"179669939_320047752796087_8921907965151053017_nrcdpearlhomes20210504145257PM.jpg\";i:1;s:80:\"180174955_505650620481202_2957547997969813461_nrcdpearlhomes20210504145257PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-04 06:52:57', 19, '2021-05-09 08:52:18', 13, 13, '2021-05-08 06:32:47', 'SR2021-0383', 1, 1),
(33, '2021-03-08', 'Mary Jane Garzon Dalisay', '', '09486117419', '', 9, '', 1, 'HDMF', '40', '29', 'N/A', '', '', 996968.00, 996968.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:2:{i:0;s:83:\"180611551_144698777622245_872268715522611945_n_(1)rcdpearlhomes20210508113828AM.jpg\";i:1;s:79:\"180611551_144698777622245_872268715522611945_nrcdpearlhomes20210505175112PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-05 09:51:12', 19, '2021-05-09 08:39:57', 13, 13, '2021-05-08 03:45:15', 'SR2021-0373', 1, 1),
(34, '2021-03-08', 'Mary Jane Garzon Dalisay', '', '09486117419', '', 9, '', 1, 'HDMF', '40', '31', 'N/A', '', '', 966968.00, 996968.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:81:\"180740971_1380324942360837_2114837460903324899_nrcdpearlhomes20210508114142AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 03:41:42', 19, '2021-05-09 08:41:03', 13, 13, '2021-05-08 06:15:03', 'SR2021-0382', 1, 1),
(35, '2021-04-30', 'Marvic Morada Manguera', '', '09065740183', '', 9, '', 1, 'HDMF', '32', '18', 'N/A', '', '', 1183168.00, 1183168.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:78:\"179613646_555284582103865_44416121319238089_nrcdpearlhomes20210508114949AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 03:49:49', 19, '2021-05-09 08:51:51', 13, 13, '2021-05-08 05:50:05', 'SR2021-0381', 1, 1),
(36, '2021-03-29', 'Melvin L. Martizes', '', '09955067405', '', 9, '', 1, 'HDMF', '41', '9', 'N/A', '', '', 1000968.00, 1000968.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"178391622_740265096640403_3700429504062915225_nrcdpearlhomes20210508115706AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 03:57:06', 19, '2021-05-09 08:50:44', 13, 13, '2021-05-08 05:23:44', 'SR2021-0380', 1, 1),
(37, '2021-04-22', 'Cirila B. Balba', '', '09955292167', '', 10, '', 1, 'HDMF', '4', '4', 'N/A', '', '', 1010600.00, 1010600.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"181450121_547153549605922_2976170826665766566_nrcdpearlhomes20210508120410PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:04:10', 19, '2021-05-09 08:49:23', 13, 13, '2021-05-08 05:20:17', 'SR2021-0379', 1, 1),
(38, '2021-04-21', 'Joselyn C. Vega', '', '09971269970', '', 10, '', 1, 'HDMF', '3', '6', 'N/A', '', '', 1010600.00, 1010600.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"180203113_511938899975442_1601748218212463140_nrcdpearlhomes20210508120842PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:08:42', 19, '2021-05-09 08:47:57', 13, 13, '2021-05-08 05:16:22', 'SR2021-0378', 1, 1),
(39, '2021-04-21', 'Myla Magpantay Masicat', '', '09985732059', '', 10, '', 1, 'HDMF', '3', '4', 'N/A', '', '', 1010600.00, 1010600.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"181984945_462434668414295_4798896134970034590_nrcdpearlhomes20210508121148PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:11:48', 19, '2021-05-09 08:42:37', 13, 13, '2021-05-08 05:12:50', 'SR2021-0377', 1, 1),
(40, '2021-04-24', 'Joan Cenizal', '', '09955292167', '', 10, '', 1, 'HDMF', '1', '18', 'N/A', '', '', 1062600.00, 1062600.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"181140337_358950159148838_2974416785870180812_nrcdpearlhomes20210508121410PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:14:10', 19, '2021-05-09 08:42:15', 13, 13, '2021-05-08 05:09:24', 'SR2021-0376', 1, 1),
(41, '2021-05-07', 'Vince Adrian Reyes Tucay', '', '09754437103', '', 10, '', 1, 'HDMF', '6', '22', 'N/A', '', '', 1238320.00, 1238320.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:84:\"182327626_772088540336175_1583979655141158940_n_(1)rcdpearlhomes20210508121722PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:17:22', 19, '2021-05-09 08:41:52', 13, 13, '2021-05-08 05:03:27', 'SR2021-0375', 1, 1),
(42, '2021-03-29', 'Jovi P. Pesico', '', '09081529082', '', 9, '', 1, 'HDMF', '2', '28', 'N/A', '', '', 1266640.00, 1266640.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:45:\"pesico-new-rrcdpearlhomes20210508122413PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 04:24:13', 19, '2021-05-09 08:41:28', 13, 13, '2021-05-08 04:49:40', 'SR2021-0374', 1, 1),
(43, '2021-04-29', 'Marlyn Hicap Tañedo', '', '09760135621', '', 10, '', 1, 'HDMF', '3', '21', 'N/A', '', '', 1209464.00, 1209464.00, 0.00, 0.00, 0.00, 0.00, 'Aldrin Morado', 19, 7, 'a:1:{i:0;s:80:\"171715729_307995174048929_1874126574148434701_nrcdpearlhomes20210508161508PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 08:15:08', 19, '2021-05-09 08:55:38', 13, 13, '2021-05-09 03:14:39', 'SR2021-0390', 1, 1),
(44, '2021-04-26', 'Von Bautista Carandang', '', '09506642767', '', 10, '', 1, 'HDMF', '1', '25', 'N/A', '', '', 1062556.00, 1062556.00, 0.00, 0.00, 0.00, 0.00, 'Elizabeth Nuno', 19, 7, 'a:2:{i:0;s:80:\"176949178_281892293415618_3388065423485930840_nrcdpearlhomes20210508161729PM.jpg\";i:1;s:80:\"176782438_812683829345599_5923209046329233215_nrcdpearlhomes20210508161729PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 08:17:29', 19, '2021-05-09 08:55:15', 13, 13, '2021-05-09 03:09:05', 'SR2021-0389', 1, 1),
(45, '2021-04-17', 'John Mar Jaca Garcia', '', '09636502060', '', 10, '', 1, 'HDMF', '1', '3', 'N/A', '', '', 1064600.00, 1064600.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:2:{i:0;s:80:\"174226216_465754941415212_4368603822874267328_nrcdpearlhomes20210508162037PM.png\";i:1;s:80:\"174170626_278271460624489_2537330058856278491_nrcdpearlhomes20210508162037PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 08:20:37', 19, '2021-05-09 08:54:48', 13, 13, '2021-05-09 03:06:07', 'SR2021-0388', 1, 1),
(46, '2021-04-27', 'Jelly Berdonar Silvan', '', '09392333247', '', 10, '', 1, 'HDMF', '2', '60', 'N/A', '', '', 1061692.00, 1061692.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:3:{i:0;s:80:\"177919187_460952221802889_1459070287584011604_nrcdpearlhomes20210508163141PM.png\";i:1;s:79:\"178157632_455576992177760_971028508310223196_nrcdpearlhomes20210508163141PM.png\";i:2;s:80:\"178030555_742609619738617_1489050981077774603_nrcdpearlhomes20210508163141PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-08 08:31:41', 19, '2021-05-09 08:54:22', 13, 13, '2021-05-09 03:03:05', 'SR2021-0387', 1, 1),
(47, '2021-01-11', 'Jovelyn Bernaldes Osida', '', '090666251643', '', 10, '', 1, 'HDMF', '15', '17', 'N/A', '', '', 1110245.00, 977015.60, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa', 19, 7, 'a:2:{i:0;s:80:\"137518410_890940371735307_1908879312702673755_nrcdpearlhomes20210514153247PM.png\";i:1;s:79:\"137534220_406833273864312_436317887394076330_nrcdpearlhomes20210514153247PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-14 07:32:47', 19, '2021-05-30 04:36:33', 13, 13, '2021-05-30 04:07:36', 'SR2021-0227', 1, 1),
(48, '2020-09-30', 'Roberto Velchez Ortiz Jr.', '', '09073621528', '', 9, '', 1, 'HDMF', '10', '9', '2', '', '', 970968.00, 854451.84, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa', 19, 7, 'a:2:{i:0;s:80:\"120567594_697842421076599_8988003421119110812_nrcdpearlhomes20210514153817PM.png\";i:1;s:80:\"120363341_328934028208375_3155594105817326012_nrcdpearlhomes20210514153817PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-14 07:38:17', 19, '2021-05-30 04:35:01', 13, 13, '2021-05-30 04:02:34', 'SR2021-0451', 1, 1),
(49, '2020-09-15', 'Armilida Abella Tan', '', '09265409699', '', 9, '', 1, 'HDMF', '40', '16', '2', '', '', 1297940.00, 1142187.20, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa', 19, 7, 'a:2:{i:0;s:80:\"119474682_2476130309346425_617794789608788450_nrcdpearlhomes20210514154122PM.png\";i:1;s:80:\"119466069_684047398865978_5039400762329310505_nrcdpearlhomes20210514154122PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-14 07:41:22', 19, '2021-05-30 04:33:45', 13, 13, '2021-05-30 03:48:23', 'SR2021-0450', 1, 1),
(50, '2020-09-06', 'Francisco Gregorio Lim', '', '09338157579', '', 9, '', 1, 'HDMF', '4', '17', '2', '', '', 1115120.00, 981305.60, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa', 19, 7, 'a:2:{i:0;s:80:\"118772224_315329119688870_2320371685977482652_nrcdpearlhomes20210514154742PM.png\";i:1;s:80:\"118828982_767768477331365_8756328497923538206_nrcdpearlhomes20210514154742PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-14 07:47:42', 19, '2021-05-30 04:33:12', 13, 13, '2021-05-30 03:38:04', 'SR2021-0448', 1, 1),
(51, '2021-05-09', 'Rizza Perdon Sapugay', '', '09090249291', '', 10, '', 1, 'HDMF', '7', '29', '2', '', '', 1032984.00, 909025.92, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:38:\"page1rcdpearlhomes20210520134717PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-20 05:47:17', 19, '2021-05-30 04:32:25', 13, 13, '2021-05-30 03:08:53', 'SR2021-0449', 1, 1),
(52, '2021-05-14', 'ABDUL - AZIZ SANKA JAUHARI', '', '09121387324', '', 10, '', 1, 'HDMF', '4', '30', 'N/A', '', '', 1021792.00, 899176.96, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:81:\"185764493_1142772402912957_5359172522122136524_nrcdpearlhomes20210520140106PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-05-20 06:01:06', 19, '2021-05-30 04:30:09', 13, 13, '2021-05-30 02:48:08', 'SR2021-0447', 1, 1),
(53, '2021-06-03', 'CYRIL POBLETE', 'KAWIT CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '8', '76', '1', '31', '34', 639705.78, 639705.78, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, '', 'LUCHIE MACA', '2021-06-06 07:09:36', 17, '2021-07-02 06:32:16', 13, 13, '2021-06-18 03:26:49', 'SR2021-0623', 1, 1),
(54, '2021-06-03', 'VINALYN RAMOS', 'KAWIT CAVITE', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '8', '78', '1', '31', '34', 639705.78, 639705.78, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, '', 'LUCHIE MACA', '2021-06-06 07:11:07', 17, '2021-07-02 06:32:50', 13, 13, '2021-06-18 03:23:14', 'SR2021-0627', 1, 1),
(55, '2021-06-03', 'CATHERINE FLORES', 'MAKATI CITY', '09338669004', 'PRIVATE EMPLOYEE', 22, 'BRGY. CABUCO TRECE MARTIRES CAVITE', 2, 'PAG-IBIG', '8', '74', '1', '58', '34', 910406.28, 910406.28, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, '', 'LUCHIE MACA', '2021-06-06 07:12:39', 17, '2021-07-02 06:33:05', 13, 13, '2021-06-18 03:19:23', 'SR2021-0624', 1, 1),
(56, '2020-07-01', 'Adrian G. Rongalerios', '', '0961824693', '', 9, '', 1, 'HDMF', '39', '6', 'N/A', '', '', 978968.00, 978968.00, 0.00, 0.00, 0.00, 0.00, 'Maricel Wagan', 19, 7, 'a:1:{i:0;s:81:\"136767133_1720244504815877_6924000573515524936_nrcdpearlhomes20210608150334PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-08 07:03:34', 19, '2021-07-02 06:33:21', 13, 13, '2021-06-18 03:15:02', 'SR2021-0628', 1, 1),
(57, '2020-10-05', 'Shawee Ann A. San Agustin', '', '09365201731', '', 10, '', 1, 'HDMF', '13', '26', 'N/A', '', '', 1178680.00, 1178680.00, 0.00, 0.00, 0.00, 0.00, 'Evangeline Almazan', 19, 7, 'a:2:{i:0;s:80:\"120649341_377066316756529_7796519002429799861_nrcdpearlhomes20210608150844PM.jpg\";i:1;s:80:\"120765365_998210560684098_3625597136301309136_nrcdpearlhomes20210608150844PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-08 07:08:44', 19, '2021-07-02 06:33:35', 13, 13, '2021-06-18 03:10:30', 'SR2021-0629', 1, 1),
(58, '2020-05-16', 'Jealla Maria Mahipos', '', '09298449773', '', 17, '', 1, 'HDMF', '16', '37', 'N/A', '', '', 947184.00, 947184.00, 0.00, 0.00, 0.00, 0.00, 'Bon Vincent Chua', 19, 7, 'a:1:{i:0;s:83:\"97325411_246621800007210_2474257026306277376_n_(1)rcdpearlhomes20210608151249PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-08 07:12:49', 19, '2021-07-02 06:34:03', 13, 13, '2021-06-18 03:05:13', 'SR2021-0630', 1, 1),
(59, '2020-04-26', 'Jemson Bagayan', '', '09283218626', '', 1, '', 1, 'HDMF', '73', '24', 'N/A', '', '', 1193272.00, 1193272.00, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa - Asuncion', 19, 7, 'a:1:{i:0;s:79:\"94376325_534903783892970_7304381769988440064_nrcdpearlhomes20210608151732PM.png\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-08 07:17:32', 19, '2021-07-02 06:34:18', 13, 13, '2021-06-18 02:57:16', 'SR2021-0626', 1, 1),
(60, '2021-06-17', 'RAM KEI BAUTISTA', 'PASAY CITY', '09338669004', 'PRIVATE EMPLOYEE', 23, 'MONTESSA HEIGHTS,  BRGY. SANJA MAYOR TANZA CAVITE', 2, 'PAG-IBIG', '3', '29', '1', '70', '46.60', 1500377.26, 1500377.26, 0.00, 0.00, 0.00, 0.00, 'ROBERT MACA', 17, 6, '', 'LUCHIE MACA', '2021-06-17 09:17:55', 17, '2021-07-02 06:34:35', 13, 13, '2021-06-18 03:27:54', 'SR2021-0625', 1, 1),
(61, '2021-06-15', 'Jeanette Fullon Pingol', '', '09186380207', '', 1, '', 1, 'HDMF', '8', '5', 'N/A', '', '', 1412440.00, 1412440.00, 0.00, 0.00, 0.00, 0.00, 'Marife Lopez', 19, 7, 'a:1:{i:0;s:85:\"199716171_1561397254215388_5890796616383389156_n_(1)rcdpearlhomes20210625110403AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-25 03:04:03', 19, '2021-07-13 05:19:38', 13, 13, '2021-07-02 05:37:12', 'SR2021-0668', 1, 1),
(62, '2021-06-21', 'Mary Jude Concepcion Estabaya Zuluete', '', '09173028316', '', 9, '', 1, 'HDMF', '54', '8', 'N/A', '', '', 1270560.00, 1270560.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan  Bautista', 19, 7, 'a:1:{i:0;s:41:\"maryjudercdpearlhomes20210625111137AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-25 03:11:37', 19, '2021-07-13 05:19:12', 13, 13, '2021-07-02 05:33:57', 'SR2021-0667', 1, 1),
(63, '2021-06-12', 'Jhon Rey Blosada Sentillas', '', '09462515755', '', 9, '', 1, 'HDMF', '19', '17', 'N/A', '', '', 1286080.00, 1286080.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:2:{i:0;s:80:\"192197601_532861451203441_3271176798855534742_nrcdpearlhomes20210625113227AM.jpg\";i:1;s:81:\"195481276_1671312659741053_8090271565762286817_nrcdpearlhomes20210625113227AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-25 03:32:27', 19, '2021-07-13 05:18:19', 13, 13, '2021-07-02 05:24:23', 'SR2021-0672', 1, 1),
(64, '2021-06-10', 'Andrew Mel C/ Azarias', '', '09178522708', '', 9, '', 1, 'HDMF', '23', '20', 'N/A', '', '', 1221168.00, 1221168.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:81:\"201436977_4085398364877810_3967928283180967219_nrcdpearlhomes20210626120920PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 04:09:20', 19, '2021-07-13 05:17:45', 13, 13, '2021-07-02 05:22:12', 'SR2021-0670', 1, 1),
(65, '2021-06-10', 'Andrew Mel C. Azarias', '', '09178522708', '', 9, '', 1, 'HDMF', '23', '22', 'N/A', '', '', 1219168.00, 1219168.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:81:\"200659711_3945734532191201_7410947196138935541_nrcdpearlhomes20210626121320PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 04:13:20', 19, '2021-07-13 05:17:15', 13, 13, '2021-07-02 05:11:27', 'SR2021-0669', 1, 1),
(66, '2021-06-10', 'Carolyn C. Azarias', '', '09178672366', '', 9, '', 1, 'HDMF', '23', '16', 'N/A', '', '', 1040968.00, 1040968.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:80:\"196824673_245436077344281_7418537531859118175_nrcdpearlhomes20210626122134PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 04:21:34', 19, '2021-07-13 05:16:17', 13, 13, '2021-07-02 05:08:39', 'SR2021-0671', 1, 1),
(67, '2021-06-16', 'Jade Bernal Bernades', '', '09666426419', '', 9, '', 1, 'HDMF', '55', '6', 'N/A', '', '', 1013600.00, 1013600.00, 0.00, 0.00, 0.00, 0.00, 'Maria Catherine Recolizado', 19, 7, 'a:1:{i:0;s:80:\"206130875_317849886666083_7900689436027098034_nrcdpearlhomes20210626135007PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 05:50:07', 19, '2021-07-13 05:20:49', 13, 13, '2021-07-02 05:06:09', 'SR2021-0674', 1, 1),
(68, '2021-06-04', 'Angelbert Mamauag Abbariao', '', '09667945762', '', 1, '', 1, 'HDMF', '46', '11', 'N/A', '', '', 1167404.00, 1167404.00, 0.00, 0.00, 0.00, 0.00, 'Zenaida Manarin', 19, 7, 'a:1:{i:0;s:80:\"202165745_215120627142797_2731114004698131300_nrcdpearlhomes20210626135320PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 05:53:20', 19, '2021-07-13 05:15:35', 13, 13, '2021-07-02 05:03:22', 'SR2021-0675', 1, 1),
(69, '2021-06-10', 'Carolyn C. Azarias', '', '09178672366', '', 9, '', 1, 'HDMF', '23', '18', 'N/A', '', '', 1040968.00, 1040968.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:84:\"198882934_171533598281432_4229484567323942853_n_(1)rcdpearlhomes20210703161600PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 06:01:52', 19, '2021-07-13 05:14:48', 13, 13, '2021-07-02 03:03:35', 'SR2021-0666', 1, 1),
(70, '2021-06-04', 'Jinky Soberano Besonia', '', '0912219809', '', 1, '', 1, 'HDMF', '6', '3', 'N/A', '', '', 1183000.00, 1183000.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan Bautista', 19, 7, 'a:1:{i:0;s:78:\"188514253_765276257490935_99662009947746858_nrcdpearlhomes20210626140535PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 06:05:35', 19, '2021-07-13 05:13:42', 13, 13, '2021-07-02 02:58:41', 'SR2021-0673', 1, 1),
(71, '2021-06-07', 'Zenaida Asis Caribo', '', '09397153947', '', 1, '', 1, 'HDMF', '1', '33', 'N/A', '', '', 1375930.00, 1375930.00, 0.00, 0.00, 0.00, 0.00, 'Zenaida Manarin', 19, 7, 'a:1:{i:0;s:80:\"193817166_483153222769111_3791215786782148208_nrcdpearlhomes20210626140847PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 06:08:47', 19, '2021-07-13 05:13:06', 13, 13, '2021-07-02 02:55:23', 'SR2021-0676', 1, 1),
(72, '2021-06-11', 'Ma. Jean Burcag Servano', '', '09471928078', '', 20, '', 1, 'HDMF', '2', '6', 'N/A', '', '', 1151840.00, 1151840.00, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa - Asuncion', 19, 7, 'a:1:{i:0;s:80:\"195542178_838793520386894_8402922183019791530_nrcdpearlhomes20210626143907PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 06:39:07', 19, '2021-07-13 05:12:37', 13, 13, '2021-07-02 02:40:16', 'SR2021-0677', 1, 1),
(73, '2021-06-22', 'Aldren Jorn Acana Masbaño', '', '09064435163 | 09564728216', '', 9, '', 1, 'HDMF', '20', '14', 'N/A', '', '', 1042968.00, 1042968.00, 0.00, 0.00, 0.00, 0.00, 'Marife Lopez', 19, 7, 'a:1:{i:0;s:80:\"205516847_319476563000893_4020468983658262317_nrcdpearlhomes20210626145553PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-26 06:55:53', 19, '2021-07-13 05:12:14', 13, 13, '2021-07-02 02:37:42', 'SR2021-0678', 1, 1),
(74, '2021-05-29', 'Melanie Almariego Caday', '', '09982054705', '', 9, '', 1, 'HDMF', '33', '24', 'N/A', '', '', 1000968.00, 1000968.00, 0.00, 0.00, 0.00, 0.00, 'Nilo Millar', 19, 7, 'a:1:{i:0;s:80:\"186523998_873777563482642_5512488365265743762_nrcdpearlhomes20210628173916PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-28 09:39:16', 19, '2021-07-13 05:09:36', 13, 13, '2021-07-02 02:32:24', 'SR2021-0679', 1, 1),
(75, '2021-05-30', 'Danica G. Tuanda', '', '09481857326', '', 9, '', 1, 'HDMF', '33', '27', 'N/A', '', '', 1002968.00, 1002968.00, 0.00, 0.00, 0.00, 0.00, 'Nilo Millar', 19, 7, 'a:1:{i:0;s:80:\"189391486_174917334461493_5276690537097377169_nrcdpearlhomes20210628174242PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-06-28 09:42:42', 19, '2021-07-13 05:09:10', 13, 13, '2021-07-02 01:51:14', 'SR2021-0680', 1, 1),
(76, '2021-05-21', 'Sheryl Sante Calinisan', '', '09174555648', '', 9, '', 1, 'HDMF', '47', '18', 'N/A', '', '', 994968.00, 994968.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"189010768_914810202707363_2103446902719157546_nrcdpearlhomes20210712111800AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-12 03:18:00', 19, '2021-07-23 08:24:38', 13, 13, '2021-07-14 06:38:28', 'SR2021-0692', 1, 1),
(77, '2021-05-24', 'Ogie Rapista Sablon', '', '09514045171', '', 10, '', 1, 'HDMF', '6', '28', '2', '', '', 1032984.00, 909025.92, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"190360459_320613466329154_1053468253756768514_nrcdpearlhomes20210712112057AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-12 03:20:57', 19, '2021-07-23 08:25:21', 13, 13, '2021-07-14 06:29:35', 'SR2021-0688', 1, 1),
(78, '2021-05-24', 'Warnie Sablon Cosio', '', '0948448590', '', 10, '', 1, 'HDMF', '6', '26', 'N/A', '', '', 1032984.00, 1032984.00, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"191219235_174513701272177_1035168085502823731_nrcdpearlhomes20210712112601AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-12 03:26:01', 19, '2021-07-23 08:25:52', 13, 13, '2021-07-14 06:24:14', 'SR2021-0689', 1, 1),
(79, '2021-05-27', 'Maria Carmela Piamonte Ladiana', '', '09270189929', '', 9, '', 1, 'HDMF', '33', '16', 'N/A', '', '', 1002968.00, 882611.84, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"192092430_387424472549724_3073609664378545861_nrcdpearlhomes20210712113307AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-12 03:33:07', 19, '2021-07-23 08:37:37', 13, 13, '2021-07-13 05:32:06', 'SR2021-0690', 1, 1),
(80, '2021-05-30', 'Fherilyn Ramirez Joseph', '', '09177121981', '', 9, '', 1, 'HDMF', '33', '11', '2', '', '', 1004968.00, 884371.84, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"193876400_379584430131909_6571377372376157974_nrcdpearlhomes20210712113502AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-12 03:35:02', 19, '2021-07-23 08:38:07', 13, 13, '2021-07-13 05:28:11', 'SR2021-0691', 1, 1),
(81, '2021-07-01', 'Ma. Azel Gamalo Sabellano', '', '09161478671', '', 9, '', 1, 'HDMF', '18', '50', 'N/A', '', '', 1094968.00, 1094968.00, 0.00, 0.00, 0.00, 0.00, 'Analiza Lerpido', 19, 7, 'a:1:{i:0;s:80:\"202450165_523908328857071_4709655704493755445_nrcdpearlhomes20210716170824PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-16 09:08:24', 19, '2021-07-23 08:38:52', 13, 13, '2021-07-21 06:32:29', 'SR2021-0703', 1, 1),
(82, '2021-06-30', 'Norton Cantela Baconowa', '', '09100374679', '', 9, '', 1, 'HDMF', '22', '6', 'N/A', '', '', 1092968.00, 1092968.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:3:{i:0;s:80:\"208710689_183007080504493_2813099487926149247_nrcdpearlhomes20210716173140PM.gif\";i:1;s:80:\"208650689_330046275433310_4495821178940011718_nrcdpearlhomes20210716173140PM.gif\";i:2;s:80:\"211666152_592211028411706_2619392011968592821_nrcdpearlhomes20210716173140PM.gif\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-16 09:31:40', 19, '2021-07-23 08:40:20', 13, 13, '2021-07-21 06:15:27', 'SR2021-0702', 1, 1),
(83, '2021-07-20', 'Josephine Patriarca Oliquino', '', '09567423530', '', 10, '', 1, 'HDMF', '48', '39', 'N/A', '', '', 1114420.00, 1114420.00, 0.00, 0.00, 0.00, 0.00, 'Analaine Carag', 19, 7, 'a:1:{i:0;s:80:\"217038279_362248245321483_6233407554754819040_nrcdpearlhomes20210721153842PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-21 07:38:42', 19, '2021-08-27 03:22:10', 13, 13, '2021-07-23 08:15:33', 'SR2021-0713', 1, 1),
(84, '2021-07-20', 'Shaira Lee Dycotang Oliquino', '', '09230821896', '', 10, '', 1, 'HDMF', '48', '37', 'N/A', '', '', 1114420.00, 1114420.00, 0.00, 0.00, 0.00, 0.00, 'Analaine Carag', 19, 7, 'a:1:{i:0;s:80:\"211708921_538618717277909_5500585360101729002_nrcdpearlhomes20210721154133PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-21 07:41:33', 19, '2021-08-27 03:23:31', 13, 13, '2021-07-23 08:10:54', 'SR2021-0715', 1, 1),
(85, '2021-06-05', 'Romenie Ursonal Castillo', '', '09317909428', '', 28, '', 1, 'HDMF', '26', '11', 'N/A', '', '', 1194768.00, 1194768.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_14-51-20rcdpearlhomes20210722145159PM.jpg\";i:1;s:58:\"photo_2021-07-22_14-36-32rcdpearlhomes20210722145159PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 06:51:59', 19, '2021-08-26 07:59:58', 13, 13, '2021-07-23 08:08:27', 'SR2021-0706', 1, 1),
(86, '2021-06-09', 'John  Paiki Terrible Medina', '', '09284641981', '', 28, '', 1, 'HDMF', '32', '28', 'N/A', '', '', 1387440.00, 1387440.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan  Bautista', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_14-54-26rcdpearlhomes20210722145653PM.jpg\";i:1;s:58:\"photo_2021-07-22_14-54-33rcdpearlhomes20210722145653PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 06:56:53', 19, '2021-08-26 07:57:56', 13, 13, '2021-07-23 08:06:24', 'SR2021-0707', 1, 1),
(87, '2021-06-05', 'Eillen Mendiola Enaño', '', '09972581424', '', 28, '', 1, 'HDMF', '20', '13', 'N/A', '', '', 1123200.00, 1123200.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_14-58-54rcdpearlhomes20210722150153PM.jpg\";i:1;s:58:\"photo_2021-07-22_14-58-57rcdpearlhomes20210722150153PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 07:01:53', 19, '2021-08-26 07:47:31', 13, 13, '2021-07-23 08:03:03', 'SR2021-0708', 1, 1),
(88, '2021-06-09', 'Rommel Delos Santos Sevillo', '', '09658133703', '', 28, '', 1, 'HDMF', '31', '34', 'N/A', '', '', 1137924.00, 1137924.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan  Bautista', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_16-12-57rcdpearlhomes20210722161327PM.jpg\";i:1;s:58:\"photo_2021-07-22_16-12-54rcdpearlhomes20210722161327PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 08:13:27', 19, '2021-08-26 07:45:05', 13, 13, '2021-07-23 08:00:59', 'SR2021-0709', 1, 1),
(89, '2021-06-05', 'Cherryl Canillas Esponilla', '', '09266134031', '', 28, '', 1, 'HDMF', '42', '23', 'N/A', '', '', 1146024.00, 1146024.00, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_16-22-03rcdpearlhomes20210722162520PM.jpg\";i:1;s:58:\"photo_2021-07-22_16-22-08rcdpearlhomes20210722162520PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 08:25:20', 19, '2021-08-26 07:43:58', 13, 13, '2021-07-23 07:58:41', 'SR2021-0710', 1, 1),
(90, '2021-06-09', 'Jalyne  Abalos Cara', '', '09502019304', '', 28, '', 1, 'HDMF', '10', '4', 'N/A', '', '', 1238000.00, 1238000.00, 0.00, 0.00, 0.00, 0.00, 'Crystal Capadosa - Asuncion', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_16-35-06rcdpearlhomes20210722163723PM.jpg\";i:1;s:58:\"photo_2021-07-22_16-35-04rcdpearlhomes20210722163723PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 08:37:23', 19, '2021-08-26 07:39:29', 13, 13, '2021-07-23 07:54:15', 'SR2021-0711', 1, 1),
(91, '2021-06-09', 'Ramil Calamba Minaves', '', '09302179281', '', 28, '', 1, 'HDMF', '33', '29', 'N/A', '', '', 1141200.00, 1141200.00, 0.00, 0.00, 0.00, 0.00, 'Maria Catherine Recolizado', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_17-25-55rcdpearlhomes20210722172619PM.jpg\";i:1;s:58:\"photo_2021-07-22_17-25-57rcdpearlhomes20210722172619PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 09:26:19', 19, '2021-08-26 07:37:53', 13, 13, '2021-07-23 07:51:39', 'SR2021-0712', 1, 1),
(92, '2021-06-09', 'Rochelle Constantino Mallorca', '', '09171487804', '', 28, '', 1, 'HDMF', '42', '34', 'N/A', '', '', 1161972.00, 1161972.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan Bautista', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_17-35-41rcdpearlhomes20210722173641PM.jpg\";i:1;s:58:\"photo_2021-07-22_17-35-43rcdpearlhomes20210722173641PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 09:36:41', 19, '2021-07-23 07:48:58', 13, 13, '2021-07-23 07:48:58', NULL, 1, 1),
(93, '2021-06-05', 'Loida Molidar De Claro', '', '09678291470', '', 28, '', 1, 'HDMF', '30', '1', 'N/A', '', '', 1542240.00, 1357171.20, 0.00, 0.00, 0.00, 0.00, 'Omer Fidel', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-07-22_18-10-47rcdpearlhomes20210722181135PM.jpg\";i:1;s:58:\"photo_2021-07-22_18-10-48rcdpearlhomes20210722181135PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-22 10:11:35', 19, '2021-08-26 07:38:14', 13, 13, '2021-07-23 07:23:27', 'SR2021-0714', 1, 1),
(94, '2021-05-17', 'Marklee Cecilio', '', '1234567', '', 25, 'Sto. Tomas, Batangas', 2, 'Pag-ibig', 'Blk. 6', 'Lot 28', 'Ph 1', '40 sqm.', '46.6 sqmm', 1039350.31, 1039350.31, 0.00, 144350.31, 0.00, 0.00, 'Dante Barela', 26, 6, '', 'Ritchelle Bahala Cruz', '2021-07-25 05:49:48', 26, '2021-08-26 07:04:47', 13, 13, '2021-08-21 07:00:11', 'SR2021-0745', 1, 1),
(95, '2020-02-08', 'John Daved Mislang', '', '1234567', '', 27, 'Tanauan City, Batangas', 2, 'Pag-ibig', 'Blk. 12', 'Lot 36', '?', '40 sqm.', '46.6 sqmm', 1079591.67, 1079591.67, 0.00, 0.00, 24.00, 0.00, 'Dante Barela', 26, 6, '', 'Ritchelle Bahala Cruz', '2021-07-25 06:01:34', 26, '2021-08-26 07:05:17', 13, 13, '2021-08-21 06:57:30', 'SR2021-0067', 1, 1),
(96, '2021-05-24', 'Elposar, Felix Jr.', '', '1234567', '', 28, 'Sta. Rosa, Laguna', 1, 'Pag-ibig', 'Blk. 30', 'Lot 17', 'Ph', '', '', 1329360.00, 1169836.80, 0.00, 0.00, 26.00, 0.00, 'Michelle Surio', 26, 6.5, '', 'Ritchelle Bahala Cruz', '2021-07-28 04:21:40', 26, '2021-09-19 03:31:49', 13, 13, '2021-08-21 06:28:45', 'SR2021-0808', 1, 1),
(97, '2021-05-26', 'SR20Cosio, John Michael Francis', '', '0000000', '', 28, 'Sta. Rosa, Laguna', 1, 'Pag-ibig', 'Blk. 10', 'Lot 11', 'Ph', '45 sqm.', '', 1456440.00, 1211267.20, 0.00, 190440.00, 29.00, 7805.86, 'Michelle Surio', 26, 7, '', 'Ritchelle Bahala Cruz', '2021-07-28 04:25:37', 26, '2021-09-19 03:30:10', 13, 13, '2021-08-21 04:54:25', 'SR2021-0809', 1, 1),
(98, '2021-05-26', 'Purugganan, Marny', '', '0000000', '', 28, 'Sta. Rosa, Laguna', 1, 'Pag-ibig', 'Blk. 26?', 'Lot 24?', 'Ph', '', '', 1648160.00, 1450380.80, 0.00, 0.00, 0.00, 0.00, 'Michelle Surio', 26, 7, '', 'Ritchelle Bahala Cruz', '2021-07-28 04:54:09', 26, '2021-09-19 03:29:35', 13, 13, '2021-08-21 04:51:39', 'SR2021-0765', 1, 1),
(99, '2021-07-26', 'Ursua, Deanna Faye Ruiz', '', '09976753591', '', 10, '', 1, 'HDMF', '48', '21', 'N/A', '', '', 1121840.00, 987219.20, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:3:{i:0;s:80:\"214791806_169654758563688_6298264518527899924_nrcdpearlhomes20210728144808PM.jpg\";i:1;s:81:\"217461883_1585354561670877_6694897644599806199_nrcdpearlhomes20210728144808PM.jpg\";i:2;s:80:\"217396760_345633270423671_8049532382746425621_nrcdpearlhomes20210728144808PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 06:48:08', 19, '2021-08-26 07:20:17', 13, 13, '2021-08-21 04:32:23', 'SR2021-0767', 1, 1),
(100, '2021-07-26', 'Palicpic, Ernesto Ebrico', '', '09486432315', '', 10, '', 1, 'HDMF', '48', '45', 'N/A', '', '', 1114420.00, 980689.60, 0.00, 0.00, 0.00, 0.00, 'Rosie Nocnoc', 19, 7, 'a:3:{i:0;s:80:\"220476865_338404374497145_4650959840300706164_nrcdpearlhomes20210728145122PM.jpg\";i:1;s:80:\"221307926_845520709736855_3004912555932319033_nrcdpearlhomes20210728145122PM.jpg\";i:2;s:80:\"221417148_171329415105789_8043193480189688906_nrcdpearlhomes20210728145122PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 06:51:22', 19, '2021-08-26 07:28:11', 13, 13, '2021-08-21 04:29:26', 'SR2021-0770', 1, 1),
(101, '2021-07-25', 'Geraldin Osorio Diaz', '', '09084809372', '', 10, '', 1, 'HDMF', '47', '44', 'N/A', '', '', 1116420.00, 982449.60, 0.00, 0.00, 0.00, 0.00, 'Rosie Nocnoc', 19, 7, 'a:3:{i:0;s:80:\"219738577_883914282475769_5440953688218285574_nrcdpearlhomes20210728145419PM.jpg\";i:1;s:80:\"219585975_338183274441676_4000722010048958663_nrcdpearlhomes20210728145419PM.jpg\";i:2;s:81:\"220006120_1008256536651708_7245397220098578224_nrcdpearlhomes20210728145419PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 06:54:19', 19, '2021-08-26 07:30:45', 13, 13, '2021-08-21 04:24:30', 'SR2021-0771', 1, 1),
(102, '2021-07-25', 'Alona Belardo Manito', '', '09436790661', '', 10, '', 1, 'HDMF', '45', '18', 'N/A', '', '', 1307160.00, 1150300.80, 0.00, 0.00, 0.00, 0.00, 'Nathaniel Miranda', 19, 7, 'a:1:{i:0;s:80:\"219474674_528019001786393_2197789264318276004_nrcdpearlhomes20210728151558PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 07:15:58', 19, '2021-08-26 07:31:54', 13, 13, '2021-08-21 04:18:06', 'SR2021-0772', 1, 1),
(103, '2020-01-26', 'Simbolas, Aljon', '', '0000000000', '', 25, 'Sto. Tomas, Batangas', 2, 'Pag-ibig', '12', '36', 'NA', '', '', 1039350.00, 936351.35, 0.00, 0.00, 24.00, 0.00, 'Dante Barela', 26, 7, '', 'Ritchelle Bahala Cruz', '2021-07-28 07:21:20', 26, '2021-08-26 06:24:40', 13, 13, '2021-08-19 07:49:22', 'SR2020-0037', 1, 1),
(104, '2021-07-23', 'Joselito Patriarca Alquino', '', '0966754833', '', 10, '', 1, 'HDMF', '48', '41', 'N/A', '', '', 1114420.00, 980689.60, 0.00, 0.00, 0.00, 0.00, 'Analaine Carag', 19, 7, 'a:1:{i:0;s:80:\"214202864_565700114622140_3882351688122755625_nrcdpearlhomes20210728154412PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 07:44:12', 19, '2021-08-26 06:16:56', 13, 13, '2021-08-19 07:43:33', 'SR2021-0773', 1, 1),
(105, '2021-07-22', 'Jo-Anne Marie Saragena Simata', '', '09605240001', '', 10, '', 1, 'HDMF', '47', '36', 'N/A', '', '', 1116420.00, 982449.60, 0.00, 0.00, 0.00, 0.00, 'Rosie Nocnoc', 19, 7, 'a:2:{i:0;s:80:\"218640110_845551839717748_4619840636107617000_nrcdpearlhomes20210728163634PM.jpg\";i:1;s:80:\"219258224_199027025404293_8761108666004943968_nrcdpearlhomes20210728163634PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 08:36:34', 19, '2021-08-26 06:16:04', 13, 13, '2021-08-19 07:38:15', 'SR2021-0774', 1, 1),
(106, '2021-07-23', 'Juvelyn Custodio Bedia', '', '09398639599', '', 9, '', 1, 'HDMF', '22', '21', 'N/A', '', '', 1094968.00, 963571.84, 0.00, 0.00, 0.00, 0.00, 'Analaine Carag', 19, 7, 'a:1:{i:0;s:83:\"225713153_528910751763344_164737890906583260_n_(1)rcdpearlhomes20210728172726PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 09:27:26', 19, '2021-08-26 06:15:22', 13, 13, '2021-08-19 06:54:53', 'SR2021-0775', 1, 1),
(107, '2021-07-17', 'Marcel Pagulong Diez', '', '09178371305', '', 10, '', 1, 'HDMF', '2', '53', 'N/A', '', '', 1110736.00, 977447.68, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:2:{i:0;s:81:\"216771061_1446045772461855_5838890558868973512_nrcdpearlhomes20210728180241PM.jpg\";i:1;s:80:\"217205097_612307503080687_2439592234154579125_nrcdpearlhomes20210728180241PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-07-28 10:02:41', 19, '2021-08-26 06:14:35', 13, 13, '2021-08-19 06:47:11', 'SR2021-0768', 1, 1),
(108, '2021-05-10', 'Ronquillo, Riza Embile', '', '09568823079', '', 10, '', 1, 'HDMF', '4', '34', 'N/A', '', '', 1021792.00, 899176.96, 0.00, 0.00, 0.00, 0.00, 'Anjo Aguilar', 19, 7, 'a:1:{i:0;s:80:\"183593381_468401614231707_3855881271767258489_nrcdpearlhomes20210802182447PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-02 10:24:47', 19, '2021-08-26 06:13:41', 13, 13, '2021-08-19 06:38:03', 'SR2021-0766', 1, 1),
(109, '2021-05-14', 'Mary Jean Gavardy Geling', '', '09427948467', '', 9, '', 1, 'HDMF', '28', '3', 'N/A', '', '', 1006968.00, 886131.84, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:80:\"185653329_141672251221870_6133843612315015938_nrcdpearlhomes20210802185555PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-02 10:55:55', 19, '2021-09-19 03:28:55', 13, 13, '2021-08-19 06:32:26', 'SR2021-0806', 1, 1),
(110, '2021-04-08', 'Hazel Ann Gonzales', '', '09516636436', '', 10, '', 1, 'HDMF', '14', '17', 'N/A', '', '', 984600.00, 866448.00, 0.00, 0.00, 0.00, 0.00, 'Angelo Alalay', 19, 7, 'a:1:{i:0;s:80:\"170053581_124031129654259_4891142631718877224_nrcdpearlhomes20210807141826PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-07 06:18:26', 19, '2021-08-19 03:35:13', 13, 13, '2021-08-19 03:35:13', '', 1, 1),
(111, '2021-04-26', 'Soberano, Cynthia Faner', '', '09501319219', '', 10, '', 1, 'HDMF', '1', '22', 'N/A', '', '', 1062556.00, 935049.28, 0.00, 0.00, 0.00, 0.00, 'Josephine Lucero', 19, 7, 'a:2:{i:0;s:81:\"176107546_1455183778161759_6233828130299251251_nrcdpearlhomes20210807144732PM.jpg\";i:1;s:80:\"175682358_166209942053878_5747329030822922620_nrcdpearlhomes20210807144732PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-07 06:47:32', 19, '2021-08-26 06:10:26', 13, 13, '2021-08-19 03:32:33', 'SR2021-0763', 1, 1),
(112, '2021-04-26', 'Reigner F. Soberano', '', '09953784740', '', 10, '', 1, 'HDMF', '2', '22', 'EXT', '', '', 1062556.00, 935049.28, 0.00, 0.00, 0.00, 0.00, 'Josephine Lucero', 19, 7, 'a:2:{i:0;s:80:\"172910750_181843783679867_4699978562690003680_nrcdpearlhomes20210807150339PM.jpg\";i:1;s:81:\"177343853_1109000822919689_3132940502928577451_nrcdpearlhomes20210807150339PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-07 07:02:31', 19, '2021-08-26 06:09:09', 13, 13, '2021-08-19 03:26:35', 'SR2021-0764', 1, 1),
(114, '2020-10-11', 'Jean Bolledo Macaraig', '', '09569485561', '', 10, '', 1, 'HDMF', '11', '25', 'N/A', '', '', 1175464.00, 1034408.32, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:80:\"121199297_469245700683675_1119533546808950137_nrcdpearlhomes20210817133637PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-17 05:36:37', 19, '2021-08-26 05:49:01', 13, 13, '2021-08-19 03:11:28', 'SR2021-0769', 1, 1),
(115, '2021-03-05', 'Evangel Pagurigan Cuaterno', '', '09163302259', '', 8, '', 1, 'HDMF', '8', '42', 'N/A', '', '', 786082.00, 691752.16, 0.00, 0.00, 0.00, 0.00, 'Elizabeth Nuno', 19, 7, 'a:1:{i:0;s:40:\"evangelrcdpearlhomes20210826165330PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-26 08:53:30', 19, '2021-09-19 03:36:38', 13, 1, '2021-08-31 03:05:14', 'SR2021-0234', 1, 1),
(116, '2021-02-27', 'Mary Christina Marte Jawili', '', '09215728888', '', 8, '', 1, 'HDMF', '32', '18', 'N/A', '', '', 708464.00, 623448.32, 0.00, 0.00, 0.00, 0.00, 'Elizabeth Nuno', 19, 7, 'a:1:{i:0;s:37:\"maryrcdpearlhomes20210826165647PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-26 08:56:47', 19, '2021-09-19 03:16:48', 13, 1, '2021-08-31 02:59:11', 'SR2021-0232', 1, 1);
INSERT INTO `sales_report` (`id`, `reservation_date`, `buyer_name`, `address`, `tel_cell`, `occupation`, `name_of_project`, `location`, `developer`, `financing_scheme`, `blk_floor`, `lot_unit`, `phase`, `lot_area`, `floor_area`, `net_total_contract_price`, `das_amount`, `miscellaneous`, `downpayment`, `schedule_downpayment`, `monthly_dp`, `sales_person`, `prepared_by`, `commission_rate`, `attachments`, `tl_sd`, `createdDate`, `createdBy`, `lastModifiedDate`, `lastModifiedBy`, `approvedBy`, `approvedDate`, `sr_number`, `sr_status`, `nStatus`) VALUES
(117, '2021-08-04', 'Angelo Laurence Mendoza Cabrera', '', '09173545498', '', 10, '', 1, 'HDMF', '46', '48', 'N/A', '', '', 1493555.00, 1314328.40, 0.00, 0.00, 0.00, 0.00, 'Nathanael Miranda', 19, 7, 'a:1:{i:0;s:79:\"226470284_607159096919647_536525412598575909_nrcdpearlhomes20210827113333AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-27 03:33:33', 19, '2021-09-19 02:50:29', 13, 1, '2021-08-31 02:33:23', 'SR2021-0804', 1, 1),
(118, '2021-07-31', 'Jamaica Olar Aclag', '', '09163412230', '', 10, '', 1, 'HDMF', '50', '26', 'N/A', '', '', 1131260.00, 995508.80, 0.00, 0.00, 0.00, 0.00, 'Nathanael Miranda', 19, 7, 'a:1:{i:0;s:80:\"223852563_789810368358852_7813067628538727703_nrcdpearlhomes20210827113527AM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-27 03:35:27', 19, '2021-09-19 03:12:34', 13, 1, '2021-08-31 02:22:33', 'SR2021-0816', 1, 1),
(119, '2021-06-04', 'Auro Claire Mercado Paulino', '', '09667946377', '', 10, '', 1, 'HDMF', '45', '28', 'N/A', '', '', 1109000.00, 975920.00, 0.00, 0.00, 0.00, 0.00, 'Marife Lopez', 19, 7, 'a:2:{i:0;s:84:\"193106738_149128843929551_6110642874438654911_n_(1)rcdpearlhomes20210827144649PM.jpg\";i:1;s:84:\"196844893_487153192538968_5248269381272450969_n_(1)rcdpearlhomes20210827144649PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-27 06:46:49', 19, '2021-09-19 02:50:56', 13, 1, '2021-08-31 02:17:53', 'SR2021-0815', 1, 1),
(120, '2021-06-09', 'John Paolo Terrible Medina', '', '0928464198', '', 28, '', 1, 'HDMF', '32', '28', 'N/A', '', '', 1541600.00, 1356608.00, 0.00, 0.00, 0.00, 0.00, 'Annalyn Bacsa', 19, 7, 'a:2:{i:0;s:58:\"photo_2021-08-27_14-59-20rcdpearlhomes20210827150705PM.jpg\";i:1;s:58:\"photo_2021-08-27_14-59-16rcdpearlhomes20210827150705PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-08-27 07:07:05', 19, '2021-09-19 03:20:57', 13, 1, '2021-08-31 02:09:57', 'SR2021-0810', 1, 1),
(121, '2021-05-25', 'MARK DANIE AMISTOSO', '', '09958765592', '', 28, 'BRGY.DILA STA.ROSA LAGUNA', 1, 'Pag-Ibig', '39', '18', '1', '', '', 1348000.00, 1186240.00, 0.00, 0.00, 0.00, 0.00, 'Michael Belarte', 27, 6.5, '', 'JOHN PERONA', '2021-08-30 05:38:11', 27, '2021-09-19 03:19:34', 13, 1, '2021-08-31 02:06:59', 'SR2021-0812', 1, 1),
(122, '2021-05-26', 'RONEL M. MERAÑA', '', '09958765592', '', 28, 'BRGY.DILA STA.ROSA LAGUNA', 1, 'Pag-Ibig', '10', '16', '1', '', '', 1456440.00, 1281667.20, 0.00, 0.00, 0.00, 0.00, 'Michael Belarte', 27, 6.5, '', 'JOHN PERONA', '2021-08-30 05:41:21', 27, '2021-09-19 03:19:11', 13, 1, '2021-08-31 01:58:52', 'SR2021-0813', 1, 1),
(123, '2021-05-26', 'PAULA REY', '', '09958765592', '', 28, 'BRGY.DILA STA.ROSA LAGUNA', 1, 'Pag-Ibig', '7', '15', '1', '', '', 1685000.00, 1482800.00, 0.00, 0.00, 0.00, 0.00, 'Michael Belarte', 27, 6.5, '', 'JOHN PERONA', '2021-08-30 05:43:52', 27, '2021-09-19 03:18:40', 13, 1, '2021-08-31 01:54:54', 'SR2021-0814', 1, 1),
(124, '2021-05-26', 'AMOR CRUZ', 'East drive  Sta.Rosa City of Laguna', '09564733897', 'Sales Supervisor at Victory  Mall Sta.Rosa', 28, 'Brgy Dita, Sta.Rosa Laguna', 1, 'PAG IBIG FINANCING', '30', '30', '1', '36 sqm', '44 sqm', 1407520.00, 1238617.60, 0.00, 191520.00, 7.00, 7366.15, 'JOSEPHINE ANTEGRA', 28, 7, '', 'JOLLY GALE A ALICBUSAN', '2021-08-31 09:04:21', 28, '2021-10-02 03:22:12', 13, 13, '2021-10-02 03:22:12', '', 1, 1),
(125, '2021-06-14', 'Charlynn Mark Gestiada', 'Malvar Batangas', '09270352108', '', 9, 'Grandview Heights Tanauan', 1, 'Pag ibig', '24', '4', 'na', '36', '44', 1040968.00, 916051.84, 0.00, 0.00, 0.00, 0.00, 'Teresa Caña', 18, 6.5, 'a:2:{i:0;s:53:\"ra_charlynn_gestiadarcdpearlhomes20210901103719AM.jpg\";i:1;s:52:\"reservation_paymentrcdpearlhomes20210901103719AM.jpg\";}', 'JULIE MAE CAÑA', '2021-09-01 02:37:19', 18, '2021-09-19 03:17:24', 13, 13, '2021-09-16 03:22:45', 'SR2021-0840', 1, 1),
(126, '2021-05-29', 'Danilo Lopez', 'Muntinlupa City', '09271561215', '', 9, 'Grandview Heights Tanauan', 1, 'Pag ibig', '28', '14', '-', '', '', 1004968.00, 884371.84, 0.00, 0.00, 0.00, 0.00, 'Teresa Caña', 18, 6.5, 'a:2:{i:0;s:48:\"ra_danilo_lopezrcdpearlhomes20210901104831AM.jpg\";i:1;s:47:\"payment_danilorcdpearlhomes20210901104831AM.jpg\";}', 'JULIE MAE CAÑA', '2021-09-01 02:48:31', 18, '2021-09-19 03:34:04', 13, 13, '2021-09-16 03:19:21', 'SR2021-0839', 1, 1),
(127, '2021-05-29', 'Dianne Lopez', 'Muntinlupa City', '09190797243', '', 9, 'Grandview Heights Tanauan', 1, 'Pag ibig', '28', '16', '-', '', '', 1004968.00, 884371.84, 0.00, 0.00, 0.00, 0.00, 'Teresa Caña', 18, 6.5, 'a:2:{i:0;s:48:\"ra_lopez_diannercdpearlhomes20210901105426AM.jpg\";i:1;s:53:\"payment_lopez_diannercdpearlhomes20210901105426AM.jpg\";}', 'JULIE MAE CAÑA', '2021-09-01 02:54:26', 18, '2021-09-19 03:08:44', 13, 13, '2021-09-16 02:59:23', 'SR2021-0838', 1, 1),
(128, '2021-06-05', 'Mary Rose Sagana Canta', '', '09185859068', '', 28, '', 1, 'HDMF', '9', '15', 'N/A', '', '', 1278080.00, 1124710.40, 0.00, 0.00, 0.00, 0.00, 'CRYSTAL CAPADOSA ASUNCION', 19, 7, 'a:1:{i:0;s:41:\"canta_rarcdpearlhomes20210907143020PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-07 06:30:20', 19, '2021-09-16 02:55:13', 13, 13, '2021-09-16 02:55:13', '', 1, 1),
(129, '2021-06-30', 'Jay-ar Selorico De La Cruz', '', '09184681071', '', 28, '', 1, 'HDMF', '30', '25', 'N/A', '', '', 1615640.00, 1421763.20, 0.00, 0.00, 0.00, 0.00, 'CRYSTAL CAPADOSA ASUNCION', 19, 7, 'a:1:{i:0;s:46:\"de_la_cruz_rarcdpearlhomes20210907143251PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-07 06:32:51', 19, '2021-09-19 02:54:50', 13, 13, '2021-09-16 02:51:47', 'SR2021-0845', 1, 1),
(130, '2021-06-05', 'PULVERA,  MICHELLE  MAY', 'SOUTHVILLE MARINIG CABUYAO LAGUNA', '0975524061', 'ENCODER', 28, '', 1, 'PAG IBIG FINANCING', '41/44.00', '7', '1', '', '', 1279720.00, 1126153.60, 0.00, 0.00, 0.00, 0.00, 'JOSEPHINE ANTEGRA', 28, 7, '', 'JOLLY GALE A ALICBUSAN', '2021-09-10 07:42:58', 28, '2021-09-19 02:54:19', 13, 13, '2021-09-16 02:48:22', 'SR2021-0841', 1, 1),
(131, '2021-03-20', 'DOLOSA, BENEDICK JIMENEZ', '', '09453155144', '', 13, 'ALPHINE RESIDENCES', 1, 'PAGIBIG', '6/44', '20/TOWNHOUSE 44', '1', '48', '44', 1208040.00, 1063075.20, 0.00, 155040.00, 4.00, 5963.00, 'JOEY VELASCO', 30, 6.5, 'a:1:{i:0;s:34:\"1rcdpearlhomes20210911200715PM.jpg\";}', 'EDELLWHIZZA OCAMPO', '2021-09-11 12:07:15', 30, '2021-09-19 02:53:59', 13, 13, '2021-09-16 02:42:55', 'SR2021-0836', 1, 1),
(132, '2021-03-20', 'DOLOSA, BENEDICK JIMENEZ', '', '09175764722', '', 13, 'ALPHINE RESIDENCES', 1, 'PAGIBIG', '6/72', '22/TOWNHOUSE 44 END', '1', '72', '44', 1488321.60, 1309723.00, 0.00, 698321.60, 5.00, 26858352.00, 'JOEY VELASCO', 30, 6.5, 'a:1:{i:0;s:34:\"2rcdpearlhomes20210911201228PM.jpg\";}', 'EDELLWHIZZA OCAMPO', '2021-09-11 12:12:28', 30, '2021-09-19 02:53:41', 13, 13, '2021-09-15 05:44:07', 'SR2021-0296', 1, 1),
(133, '2021-06-25', 'PEREZ, SHEENA MAE ANDAL', '', '09067271873', '', 13, 'BRGY. DEL ROSARIO, SAN FERNANDO PAMPANGA', 1, 'PAGIBIG', '7', '17', '1', '48', '44', 1208040.00, 1063075.20, 0.00, 80040.00, 8.00, 3078.46, 'JOEY VELASCO', 30, 6.5, 'a:1:{i:0;s:34:\"3rcdpearlhomes20210911201746PM.jpg\";}', 'EDELLWHIZZA OCAMPO', '2021-09-11 12:17:46', 30, '2021-09-19 02:49:14', 13, 13, '2021-09-15 05:39:20', 'SR2021-0847', 1, 1),
(134, '2021-02-08', 'BALILO, HAYDEE GOMEZ', '', '09171493087', '', 13, 'BRGY. DEL ROSARIO, SAN FERNANDO, PAMPANGA', 1, 'PAGIBIG', '14', '3', '1', '48', '44', 1235880.00, 1087574.40, 0.00, 42880.00, 9.00, 3573.33, 'JOEY VELASCO', 30, 6.5, 'a:1:{i:0;s:34:\"4rcdpearlhomes20210911202117PM.jpg\";}', 'EDELLWHIZZA OCAMPO', '2021-09-11 12:21:17', 30, '2021-09-14 08:58:31', 13, 13, '2021-09-14 08:58:31', '', 1, 1),
(135, '2021-06-28', 'Ricky Abon Gonzales', '', '093800083975', '', 9, '', 1, 'HDMF', '21', '7', 'N/A', '', '', 1096968.00, 965331.84, 0.00, 0.00, 0.00, 0.00, 'THELMA DELA VICTORIA', 19, 7, 'a:2:{i:0;s:43:\"gonzales-rrcdpearlhomes20210916092325AM.pdf\";i:1;s:43:\"gonzales-rrcdpearlhomes20210916092325AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-16 01:23:25', 19, '2021-09-19 02:38:59', 13, 13, '2021-09-16 02:39:29', 'SR2021-0844', 1, 1),
(136, '2021-06-05', 'Jedhel Anne Regalado Ferrer', '', '09190985487', '', 28, '', 1, 'HDMF', '8', '26', 'N/A', '', '', 1320000.00, 1161600.00, 0.00, 0.00, 0.00, 0.00, 'CRYSTAL CAPADOSA ASUNCION', 19, 7, 'a:1:{i:0;s:42:\"ferrer_rarcdpearlhomes20210916093135AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-16 01:31:35', 19, '2021-09-19 02:38:17', 13, 13, '2021-09-16 02:35:18', 'SR2021-0846', 1, 1),
(137, '2021-05-08', 'Leonard Subad Josoc', '', '09956513366', '', 10, '', 1, 'HDMF', '1', '43', 'N/A', '', '', 1423156.00, 1252377.28, 0.00, 0.00, 0.00, 0.00, 'THELMA DELA VICTORIA', 19, 7, 'a:1:{i:0;s:37:\"ra_1rcdpearlhomes20210916143514PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-16 06:35:14', 19, '2021-09-19 08:01:03', 13, 13, '2021-09-19 08:01:03', '', 1, 1),
(138, '2019-06-16', 'Mary Joy Alimout', '', '09388662250', '', 1, '', 1, 'HDMF', '57', '41', 'N/A', '', '', 1041800.00, 1041800.00, 0.00, 0.00, 0.00, 0.00, 'Rhea Perez', 19, 6.5, 'a:1:{i:0;s:80:\"241969619_861883357847131_5648508463058573897_nrcdpearlhomes20210917150145PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-17 07:01:45', 19, '2021-09-19 08:02:20', 13, 13, '2021-09-19 07:06:14', 'SR2019-0531', 1, 1),
(139, '2019-06-16', 'Mary Grace Clarete Febre', '', '09198946622', '', 1, '', 1, 'HDMF', '61', '7', 'N/A', '', '', 1059800.00, 1059800.00, 0.00, 0.00, 0.00, 0.00, 'Rhea Perez', 19, 6.5, 'a:1:{i:0;s:81:\"242059332_4207194312733231_3250137245611636267_nrcdpearlhomes20210917150621PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-17 07:06:21', 19, '2021-09-19 08:02:41', 13, 13, '2021-09-19 07:05:22', 'SR2019-0525', 1, 1),
(140, '2019-04-27', 'Mary Mechelle Claustro Lim', '', '09184248912', '', 1, '', 1, 'HDMF', '31', '22', 'N/A', '', '', 1005404.00, 1005404.00, 0.00, 0.00, 0.00, 0.00, 'Rhea Perez', 19, 6.5, 'a:1:{i:0;s:80:\"242019890_235062051893601_2823748932622730805_nrcdpearlhomes20210917152936PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-17 07:29:36', 19, '2021-09-19 08:04:45', 13, 13, '2021-09-19 07:03:12', 'SR2019-0341', 1, 1),
(141, '2021-06-21', 'MaryJude Concepcion Estabaya Zulueta', '', '09173028316', '', 9, '', 1, 'HDMF', '54', '8', '2', '', '', 1270560.00, 1118092.80, 0.00, 0.00, 0.00, 0.00, 'Angelo Alalay', 19, 7, 'a:1:{i:0;s:42:\"zulueta-rrcdpearlhomes20210921102024AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-21 02:20:24', 19, '2021-09-25 05:37:18', 13, 13, '2021-09-25 05:37:18', '', 1, 1),
(142, '2021-12-05', 'Raymond Salvador Soriano', '', '09236667562', '', 10, '', 1, 'HDMF', '5', '24', 'N/A', '', '', 1027388.00, 904101.44, 0.00, 0.00, 0.00, 0.00, 'Merlie Camo', 19, 7, 'a:1:{i:0;s:38:\"page1rcdpearlhomes20210922112234AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-22 03:22:34', 19, '2021-09-25 05:27:42', 13, 13, '2021-09-25 05:27:42', '', 1, 1),
(143, '2021-06-05', 'Ron Kevin Alvaran Mendoza', '', '09152098040', '', 28, '', 1, 'HDMF', '24', '17', 'N/A', '', '', 1362000.00, 1198560.00, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:59:\"received_2931003253805866rcdpearlhomes20210924100827AM.jpeg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-24 02:08:27', 19, '2021-09-25 05:18:44', 13, 13, '2021-09-25 05:18:44', '', 1, 1),
(144, '2021-06-05', 'Remy Martin Perdon Sapugay', '', '09461157873', '', 28, '', 1, 'HDMF', '19', '7', 'N/A', '', '', 1341360.00, 1180396.80, 0.00, 0.00, 0.00, 0.00, 'Judith Allego', 19, 7, 'a:1:{i:0;s:48:\"20210923_142604rcdpearlhomes20210924101519AM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-09-24 02:15:19', 19, '2021-09-25 03:24:31', 13, 13, '2021-09-25 03:24:31', '', 1, 1),
(145, '2021-04-25', 'Mahilum, Monique Angeli Chua', '2442 Onyx St. San Andres Bukid, Manila', '09566029000', 'Under Writing Specialist', 10, 'Brgy. San Isidro Norte, Sto. Tomas, Batangas', 1, 'HDMF', '1', '10', 'Extension', '60', '44', 1291624.00, 1286324.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:3:{i:0;s:42:\"mahilum_2rcdpearlhomes20211013151657PM.jpg\";i:1;s:40:\"mahilumrcdpearlhomes20211013151657PM.jpg\";i:2;s:43:\"mahilum_rarcdpearlhomes20211013151657PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 07:16:57', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(146, '2021-04-30', 'Latoza, Ansley Almendral', 'Blk 12 Lot 11 Grand Riverstone, Dita. Sta. Rosa City, Laguna', '09482981612', '', 10, 'Brgy. San Isidro Norte, Sto. Tomas, Batangas', 1, 'HDMF', '3', '22', 'Extension', '', '', 1216680.00, 1211380.00, 0.00, 0.00, 0.00, 0.00, 'Marife Lopez', 19, NULL, 'a:2:{i:0;s:39:\"latozarcdpearlhomes20211013154212PM.gif\";i:1;s:41:\"latoza_2rcdpearlhomes20211013154212PM.gif\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 07:42:12', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(147, '2021-05-14', 'Geling, Mary Jean Gavardy', '2343 Taal St. Singalong Manila', '09427948467, 09567263254', 'Manager', 9, 'Brgy. Sambat & Bagumabayan Tanauan, Batangas', 1, 'HDMF', '28', '3', '2', '36', '44', 1006968.00, 1003968.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:42:\"geling_rarcdpearlhomes20211013155108PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 07:51:08', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(148, '2021-05-15', 'Laguardia, Angelica Degrano', 'Blk 29 Lot 35 Brgy. San Isidro, Cabuyao, Laguna', '09496645713', '', 10, 'Brgy. San Isidro Norte, Sto. Tomas, Batangas', 1, 'HDMF', '5', '8', 'Extension', '', '', 1021792.00, 1018492.00, 0.00, 0.00, 0.00, 0.00, 'Anjo Aguilar', 19, NULL, 'a:2:{i:0;s:48:\"laguardia_b5_l8rcdpearlhomes20211013155858PM.jpg\";i:1;s:48:\"laguardia_b5_l8rcdpearlhomes20211013155858PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 07:58:58', 19, '2021-10-13 08:03:56', 19, NULL, NULL, '', 0, 1),
(149, '2021-05-15', 'Laguardia, Angelica Degrano', 'Blk 29 Lot 35 Brgy. San Isidro, Cabuyao, Laguna', '09496645713', '', 10, 'Brgy. San Isidro Norte, Sto. Tomas, Batangas', 1, 'HDMF', '5', '10', 'Extension', '', '', 1021792.00, 1018492.00, 0.00, 0.00, 0.00, 0.00, 'Anjo Aguilar', 19, NULL, 'a:2:{i:0;s:49:\"laguardia_b5_l10rcdpearlhomes20211013160648PM.jpg\";i:1;s:49:\"laguardia_b5_l10rcdpearlhomes20211013160648PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 08:06:48', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(150, '2021-05-15', 'Antonel, Jean Christine Granzori', '325 Zone 3, Brgy. Pansol, Calamba City, Laguna', '09688550109', '', 10, '', 1, 'HDMF', '7', '19', 'Extension', '', '', 1231112.00, 1225812.00, 0.00, 0.00, 0.00, 0.00, 'Carolyn Palermo', 19, NULL, 'a:1:{i:0;s:40:\"antonelrcdpearlhomes20211013161223PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 08:12:23', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(151, '2021-05-22', 'Del Rosario, Erick Boy', 'Blk 15 Lot 40 Kamachile St. St. Joseph homes, Brgy. Laguerta, Calamba, Laguna', '09954612365', '', 9, '', 1, 'HDMF', '29', '21', '2', '', '', 1006968.00, 1003668.00, 0.00, 0.00, 0.00, 0.00, 'Analyn Bacsa', 19, NULL, 'a:1:{i:0;s:44:\"del_rosariorcdpearlhomes20211013163540PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 08:35:40', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(152, '2021-05-23', 'Parungo, Renelyn Luces', 'Kassel Vista San Pedro 2 Malvar, Batangas', '09301574266', '', 10, '', 1, 'HDMF', '6', '25', 'Extension', '', '', 1027388.00, 1024088.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:41:\"parunggorcdpearlhomes20211013164738PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 08:47:38', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(153, '2021-05-23', 'Bautista, Romnick Floresta', 'Carmona, Cavite', '09159986813', '', 10, '', 1, 'HDMF', '6', '10', 'Extension', '', '', 1027388.00, 1024088.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:41:\"bautistarcdpearlhomes20211013165425PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 08:54:25', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(154, '2021-05-23', 'Corre, Emmanuel Ortega', '', '09294387228', 'DME Compound Brgy. Pulo, Cabuyao, Laguna', 10, '', 1, 'HDMF', '6', '12', 'Extension', '', '', 1027388.00, 1024088.00, 0.00, 0.00, 0.00, 0.00, 'Analyn Bacsa', 19, NULL, 'a:1:{i:0;s:38:\"corrercdpearlhomes20211013170854PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 09:08:54', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(155, '2021-05-23', 'Macatangay, Aizel Recaro', '', '09050391836', 'San Jose Lipa City, Batangas', 10, '', 1, 'HDMF', '6', '13', 'Extension', '', '', 1021792.00, 1018492.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:43:\"macatangayrcdpearlhomes20211013172315PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 09:23:15', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(156, '2021-05-24', 'Fuentes, Cirilo Del Rosarion', 'Patutong Malaki South Tagaytay', '09071868613', '', 10, '', 1, 'HDMF', '9', '6', 'Extension', '', '', 1006196.00, 1002896.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:40:\"fuentesrcdpearlhomes20211013174719PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 09:47:19', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(157, '2021-05-17', 'Soriano, Raymond Salvador', 'Blk 7 Lot 7 St. Luke St Phase 1 Sto. Niño Village, Tunasan, Muntinlupa City', '09236667562', 'Production Specialist', 10, 'Brgy. San Isidro Norte, Sto. Tomas, Batangas', 1, 'HDMF', '5', '24', 'Extension', '36', '44', 1027388.00, 1024088.00, 0.00, 0.00, 0.00, 0.00, 'Richard Allan Bautista', 19, NULL, 'a:1:{i:0;s:40:\"sorianorcdpearlhomes20211013182841PM.pdf\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 10:28:41', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(158, '2021-05-24', 'Agtarap, Michael John Arevalo', 'B1L1 Pine Rd, Acacia Park Homes, Saimsim, Calamba City, Laguna', '09294323591', '', 10, '', 1, 'HDMF', '6', '24', 'Extension', '', '', 1032984.00, 1029684.00, 0.00, 0.00, 0.00, 0.00, 'Leah Alap-ap', 19, NULL, 'a:1:{i:0;s:40:\"agtaraprcdpearlhomes20211013184117PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 10:41:17', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(159, '2021-05-25', 'Verson, Robie Jean Elejedo', '350 Taylor St. Pasay City', '09158778604', '', 10, '', 1, 'HDMF', '12', '17', 'Extension', '', '', 994600.00, 991300.00, 0.00, 0.00, 0.00, 0.00, 'JUDITH ALLEGO', 19, NULL, 'a:1:{i:0;s:39:\"versonrcdpearlhomes20211013184510PM.jpg\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 10:45:10', 19, NULL, NULL, NULL, NULL, NULL, 0, 1),
(160, '2021-05-25', 'Villorente, Hernan Delos Santos', '#66 Luna St. Brgy. Poblacion San Pedro, Laguna', '09208404235', '', 10, '', 1, 'HDMF', '13', '21', 'Extension', '', '', 992600.00, 989300.00, 0.00, 0.00, 0.00, 0.00, 'Leah Alap-ap', 19, NULL, 'a:1:{i:0;s:43:\"villorentercdpearlhomes20211013185228PM.gif\";}', 'EUNICE BUMATAY BAUTISTA', '2021-10-13 10:52:28', 19, NULL, NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_parameters`
--

CREATE TABLE `system_parameters` (
  `id` int(11) NOT NULL,
  `param_code` varchar(50) NOT NULL,
  `param_value` varchar(255) NOT NULL,
  `workerType` varchar(25) DEFAULT NULL COMMENT '1-Domestic; 2-Jobseeker',
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-Inactive; 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `cCode` varchar(255) NOT NULL,
  `cValue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `cCode`, `cValue`) VALUES
(4, 'default_language', 'arabic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `piid` varchar(55) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `hasDivision` tinyint(1) NOT NULL DEFAULT 0,
  `division_id` int(11) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `accre_number` varchar(125) DEFAULT NULL,
  `accre_exp_date` date DEFAULT NULL,
  `dhsud_number` varchar(125) DEFAULT NULL,
  `designated_broker` varchar(125) DEFAULT NULL,
  `token_id` varchar(100) NOT NULL,
  `api_token` longtext DEFAULT NULL,
  `session_id` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-No; 1-Yes',
  `isFixed` int(11) NOT NULL,
  `tl_sd` varchar(25) DEFAULT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `createdByUserID` int(11) NOT NULL,
  `createdDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedByUserID` int(11) NOT NULL,
  `modifiedDateTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isEnabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-No; 1-Yes',
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - InActive; 1 - Active;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `group_id`, `piid`, `position_id`, `hasDivision`, `division_id`, `job_title`, `firstname`, `lastname`, `email`, `phone`, `dob`, `address`, `accre_number`, `accre_exp_date`, `dhsud_number`, `designated_broker`, `token_id`, `api_token`, `session_id`, `username`, `password`, `isAdmin`, `isFixed`, `tl_sd`, `profile_picture`, `createdByUserID`, `createdDateTime`, `modifiedByUserID`, `modifiedDateTime`, `isEnabled`, `nStatus`) VALUES
(1, 1, 1, NULL, NULL, 0, NULL, NULL, 'Rowell', 'Viejo', 'rowellviejo@gmail.com', '09777205040', NULL, NULL, NULL, NULL, NULL, NULL, '3b7c5af0d016d7aee5021b42ffcedd04', NULL, '7c92e9e7b0695e1b3b7cbf89c4817898', '', '$P$BCz3ANV4N8VKz8Ldh.zfLzf/6Mg9Tu/', 1, 0, '1', 'profile-stL1x0BM1610690212.png', 0, '2019-08-15 04:59:23', 0, '2021-08-31 01:36:43', 1, 1),
(7, 1, 1, '111111', 2, 0, 3, NULL, 'Jayson', 'Sarino', 'jasonsarino27@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, 'af17226799a0ea58c93daa305aae1cf1', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl9pZCI6IjZkNzdlOWQ4NWU0NTExZjU1NTY5MjAzN2U2YjEyODU4IiwiZmlyc3RuYW1lIjoiSmF5c29uIiwibGFzdG5hbWUiOiJTYXJpbm8iLCJBUElfVElNRSI6MTYzNTM4NDA3N30.YfKEhSxkyVuJA_HV6K6vTBjqGGwvp_2nf2MCItpEARQ', 'e754fb5deed6f6d4977504c70dc82197', '', '$P$BBSqmkUFYw7EgkDWqlN9mgI2DKhSSl0', 0, 0, '', 'profile-BWG1fGLu1611308054.png', 1, '2021-01-22 09:34:14', 0, '2021-10-28 01:21:17', 1, 1),
(13, 1, 1, NULL, NULL, 0, NULL, NULL, 'RONALYN CLAIRE', 'VIEJO', 'rcdpearlhomes@gmail.com', '09230821777', NULL, NULL, NULL, NULL, NULL, NULL, '8ac8efaf0993ab4473af0e87a75a5e01', NULL, '29323f267ef81d074a756866bdb95f9b', '', '$P$BGQFnr/Rdh9Hbo91muVC//rB2KGL/7.', 0, 0, '', 'profile-1SVZkcGP1614134868.jpg', 1, '2021-02-24 01:08:04', 0, '2021-10-04 02:22:36', 1, 1),
(17, 1, 6, NULL, NULL, 0, NULL, NULL, 'LUCHIE', 'MACA', 'Luchie29@yahoo.com', '09338669004', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$Beqf4gWbfE/bpdRdZgGigRisEq.7EH/', 0, 0, 'LUCHIE MACA', '', 13, '2021-03-11 02:39:47', 0, '2021-06-17 09:20:55', 1, 1),
(18, 1, 6, NULL, NULL, 0, NULL, NULL, 'JULIE MAE', 'CAÑA', 'juliemae.cana@gmail.com', '09099243144', NULL, NULL, NULL, NULL, NULL, NULL, 'c6945444423088e114710c1d86d3d763', NULL, '1904ccaeb09a183abef9a5b9b76cb047', '', '$P$Baxny4hN5FP1Qm76Ma5JMkGYffGiE7/', 0, 0, 'JULIE MAE CAÑA', '', 13, '2021-03-11 03:01:35', 0, '2021-09-01 07:46:44', 1, 1),
(19, 1, 6, NULL, NULL, 0, NULL, NULL, 'EUNICE', 'BUMATAY-BAUTISTA', 'yeslandrealty88@gmail.com', '09610628618 / 09451197404', NULL, NULL, NULL, NULL, NULL, NULL, '8c96dd7192bb2ed3cde5764f20f4e8bf', NULL, '60eb96160e5e411d0333f233a2b000e4', '', '$P$BxZXuElTVJdSnPXHunUE6d9T224nyG1', 0, 0, 'EUNICE BUMATAY BAUTISTA', 'profile-qBja2NAX1615445292.png', 13, '2021-03-11 06:38:23', 0, '2021-10-13 06:07:15', 1, 1),
(22, 1, 6, NULL, NULL, 0, NULL, NULL, 'GRACE', 'SEGOVIA', '3RGSRealtyCorp@gmail.com', '09178747414', NULL, NULL, NULL, NULL, NULL, NULL, '695c49147c30d5c6640411528cc28833', NULL, '653b4cda6513a453dc751c56d9a0df51', '', '$P$BxjAD1c9EXPB2xobNjdMwK7U7TFQVs.', 0, 0, 'GRACE SEGOVIA', '', 13, '2021-03-26 07:10:31', 0, '2021-03-27 02:35:58', 1, 1),
(23, 1, 6, NULL, NULL, 0, NULL, NULL, 'LOLITA', 'ESCODILLA LUYA', 'lolitel219@gmail.com', '09957556106', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$B63VYPmnb6Gw4GVaE8s8jGynbyTFp..', 0, 0, 'LOLITA ESCODILLA LUYA', '', 13, '2021-03-26 08:21:28', 0, NULL, 1, 1),
(24, 1, 6, NULL, NULL, 0, NULL, NULL, 'REBECCA', 'LACSAMANA', 'rs_lacsamana@yahoo.com', '09178817636', NULL, NULL, NULL, NULL, NULL, NULL, 'ea9f724f04e929d7ad7848fb047663ef', NULL, 'c8ec95c9ae2032e1f942c7aaaad899c4', '', '$P$BZ7twfT6a0tQy6f4X2FQ9AZUR3iGsc.', 0, 0, 'JOHN KENNETH BLANCO', '', 13, '2021-03-26 08:24:44', 0, '2021-03-26 08:41:22', 1, 1),
(25, 1, 6, NULL, NULL, 0, NULL, NULL, 'JAMES', 'ATIENZA', 'thecityfavor@gmail.com', '09950192288', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$BKkb8Xrpb3V/Znq.HGwhRtIW3CBqOd0', 0, 0, 'JAMES ATIENZA', '', 13, '2021-03-26 08:54:10', 0, NULL, 1, 1),
(26, 1, 6, NULL, NULL, 0, NULL, NULL, 'Ritchelle', 'Cruz', '1praiserealty@gmail.com', '09754402398', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$BLqzSa7FnKMLTQtX52cviA2L2x1LJs/', 0, 0, 'Ritchelle Bahala Cruz', '', 13, '2021-07-14 09:06:43', 0, '2021-09-19 04:13:52', 1, 1),
(27, 1, 6, NULL, NULL, 0, NULL, NULL, 'JB', 'MATUGAS', 'Julius.matugas14@gmail.com', '09958765592', NULL, NULL, NULL, NULL, NULL, NULL, '5deabcf8d21b990a063a667e9ec15eff', NULL, '87ae3ae866d06fcf7fb32d4f0d9f0d1e', '', '$P$BPrBluJyWPI5..knNz4gNDwCI/2SiH/', 0, 0, 'JOHN PERONA', '', 13, '2021-08-29 06:40:50', 0, '2021-08-30 05:30:44', 1, 1),
(28, 1, 6, NULL, NULL, 0, NULL, NULL, 'JOSEPHINE', 'ANTEGRA', 'lcarealty@yahoo.com', '09563208301', NULL, NULL, NULL, NULL, NULL, NULL, '5c31c78615aa01f5623854347e562506', NULL, '2b75e9227e288307202f6972c9a2f2a5', '', '$P$BGC/XvnqUPu1jssDNdE.bQB56IIYuO0', 0, 0, 'JOLLY GALE A ALICBUSAN', '', 13, '2021-08-31 06:30:48', 0, '2021-09-30 13:25:27', 1, 1),
(29, 1, 6, NULL, NULL, 0, NULL, NULL, 'RONA', 'VIEJO', 'ronaviejo@gmail.com', '09230821777', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$BcoMGYNmTiXeJhlY48DCNFZNU779GR.', 0, 0, 'ROWELL VIEJO', '', 13, '2021-09-03 01:21:20', 0, '2021-09-03 01:50:24', 1, 1),
(30, 1, 6, NULL, NULL, 0, NULL, NULL, 'EDELLWHIZZA', 'OCAMPO', 'Izzaocampo@gmail.com', '09274675443', NULL, NULL, NULL, NULL, NULL, NULL, '430f3ed37d48f595b0c759f60ca7faac', NULL, 'fa93e43ab339881139f3c554518b5f41', '', '$P$B4gwTfWmar7yCahFH48oc8KiLM7tYk0', 0, 0, 'EDELLWHIZZA OCAMPO', '', 13, '2021-09-03 01:54:47', 0, '2021-09-17 09:51:46', 1, 1),
(33, 1, 1, '12345', 2, 0, 0, NULL, 'Jose', 'Rizal', 'jose.rizal@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '$P$BQ.JlalYZCX3Z//QljbNAQV2D5ErBs0', 0, 0, NULL, 'profile-UMnw2WbM1634814185.png', 7, '2021-10-21 11:03:06', 0, NULL, 1, 1),
(34, 1, 7, '123456', 4, 1, 3, NULL, 'Apo', 'Sarino', 'apo.sarino@gmail.com', '09777205040', '1989-09-27', 'Blk69 Lot16 Buklod Bahayan Subd. Tartaria Silang Caviteh', 'Accre-123456h', '2022-01-02', '112233', 'RCD Pearl Homes', '', NULL, '', '', '$P$BhCmfHhllRjtatO7SBiTjXS2KNmo4w/', 0, 0, NULL, 'profile-MLRVt5k21634821309.png', 7, '2021-10-21 11:34:51', 7, '2021-10-21 13:02:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_desc` mediumtext NOT NULL,
  `privileges` mediumtext NOT NULL,
  `isFixed` tinyint(1) DEFAULT NULL,
  `nStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 - Active; 0 - Disabled; 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `company_id`, `group_name`, `group_desc`, `privileges`, `isFixed`, `nStatus`) VALUES
(1, 1, 'Administrator', '', 'FULL-ACCESS', 1, 1),
(5, 1, 'Office Staff', '', 'a:6:{s:16:\"add.sales_report\";i:1;s:17:\"edit.sales_report\";i:1;s:19:\"delete.sales_report\";i:1;s:26:\"view_approved.sales_report\";i:1;s:20:\"approve.sales_report\";i:1;s:19:\"cancel.sales_report\";i:1;}', NULL, 1),
(6, 1, 'Broker', '', 'a:6:{s:16:\"add.sales_report\";i:1;s:17:\"edit.sales_report\";i:1;s:19:\"delete.sales_report\";i:1;s:25:\"view_pending.sales_report\";i:1;s:26:\"view_approved.sales_report\";i:1;s:20:\"reports.sales_report\";i:1;}', 1, 1),
(7, 1, 'Internal Network', '', 'a:6:{s:16:\"add.sales_report\";i:1;s:17:\"edit.sales_report\";i:1;s:19:\"delete.sales_report\";i:1;s:25:\"view_pending.sales_report\";i:1;s:26:\"view_approved.sales_report\";i:1;s:20:\"reports.sales_report\";i:1;}', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_limit`
--
ALTER TABLE `api_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_parameters`
--
ALTER TABLE `system_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_limit`
--
ALTER TABLE `api_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `system_parameters`
--
ALTER TABLE `system_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
