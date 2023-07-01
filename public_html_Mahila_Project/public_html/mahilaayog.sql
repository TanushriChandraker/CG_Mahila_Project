-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 07:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahilaayog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `caseid` bigint(20) NOT NULL,
  `casepws` varchar(20) NOT NULL,
  `complaint` varchar(20) NOT NULL,
  `comname` varchar(50) NOT NULL,
  `comadd` longtext NOT NULL,
  `comtele` bigint(20) NOT NULL,
  `commob` bigint(20) NOT NULL,
  `commail` varchar(50) NOT NULL,
  `vicname` varchar(50) NOT NULL,
  `vicadd` longtext NOT NULL,
  `victele` bigint(20) NOT NULL,
  `vicmob` bigint(20) NOT NULL,
  `vicmail` varchar(50) NOT NULL,
  `relation` varchar(15) NOT NULL,
  `district` varchar(20) NOT NULL,
  `accname` varchar(50) NOT NULL,
  `accuadd` longtext NOT NULL,
  `acctele` bigint(20) NOT NULL,
  `accmob` bigint(20) NOT NULL,
  `accumail` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `crimedate` date DEFAULT NULL,
  `registerdate` date NOT NULL,
  `complaintstype` varchar(30) NOT NULL,
  `subject` longtext NOT NULL,
  `casestatus` varchar(20) NOT NULL,
  `casedefi` longtext NOT NULL,
  `casedeci` longtext NOT NULL,
  `note` longtext NOT NULL,
  `files` varchar(2000) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `caseid`, `casepws`, `complaint`, `comname`, `comadd`, `comtele`, `commob`, `commail`, `vicname`, `vicadd`, `victele`, `vicmob`, `vicmail`, `relation`, `district`, `accname`, `accuadd`, `acctele`, `accmob`, `accumail`, `year`, `crimedate`, `registerdate`, `complaintstype`, `subject`, `casestatus`, `casedefi`, `casedeci`, `note`, `files`, `ipaddress`, `Is_Active`, `created_at`, `updated_at`) VALUES
(32, 4918244701, 'FVFJA3IE57', 'yes', 'amarjeet gupta', 'bdfghfgbghfghfh', 676567546, 6464654654, 'sdfdsfds@mail.com', 'amarjeet gupta', 'bdfghfgbghfghfh', 676567546, 6464654654, 'sdfdsfds@mail.com', 'पत्नी', 'बलरामपुर', 'hgnjbhghjghjgh', 'hghjghjmnbmgjnnbnm', 75675675676, 676767567756, 'asdvasg@mail.com', 2019, '2022-07-07', '0000-00-00', 'टोनही प्रताड़ना', 'fghnbfghfgh', '', 'hfghfghf', '', '', 'case_5466116459.pdf,case_8360767439.pdf,case_2240681747.pdf,case_5929562429.pdf', '::1', 1, '2022-07-27 09:07:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintstype`
--

CREATE TABLE `complaintstype` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintstype`
--

INSERT INTO `complaintstype` (`id`, `type`, `created_at`, `Is_Active`) VALUES
(40, 'अपहरण', '2022-05-08 06:05:53', 1),
(41, 'आर्थिक प्रताड़ना', '2022-05-08 06:05:01', 1),
(42, 'एसिड अटैक', '2022-05-08 06:05:07', 1),
(43, 'कार्यस्थल पर लैंगिक उत्पीड़न', '2022-05-08 06:05:14', 1),
(44, 'टोनही प्रताड़ना', '2022-05-08 06:05:20', 1),
(45, 'दहेज प्रताड़ना', '2022-05-08 06:05:39', 1),
(46, 'दैहिक शोषण', '2022-05-08 06:05:48', 1),
(47, 'बलात्कार', '2022-05-08 06:05:54', 1),
(48, 'बाल विवाह', '2022-05-08 06:05:01', 1),
(49, 'भरण पोषण', '2022-05-08 06:05:07', 1),
(50, 'मानव तस्करी', '2022-05-08 06:05:21', 1),
(51, 'मानसिक प्रताड़ना', '2022-05-08 06:05:27', 1),
(52, 'मारपीट', '2022-05-08 06:05:32', 1),
(53, 'यौन प्रताड़ना', '2022-05-08 06:05:37', 1),
(54, 'विविध', '2022-05-08 06:05:43', 1),
(55, 'शारीरिक प्रताड़ना', '2022-05-08 06:05:48', 1),
(56, 'सम्पत्ति विवाद', '2022-05-08 06:05:54', 1),
(57, 'हत्या', '2022-05-08 06:05:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `cmorg` bigint(20) NOT NULL,
  `cashnld` bigint(20) NOT NULL,
  `cassol` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `cmorg`, `cashnld`, `cassol`, `created_at`, `updated_at`, `Is_Active`) VALUES
(1, 1, 1, 1, '2022-05-15', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district` varchar(55) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`, `created_at`, `Is_Active`) VALUES
(22, 'सूरजपुर', '2022-05-08 06:05:58', 1),
(23, 'सुकमा', '2022-05-08 06:05:03', 1),
(24, 'सरगुजा', '2022-05-08 06:05:09', 1),
(25, 'रायपुर', '2022-05-08 06:05:15', 1),
(26, 'रायगढ', '2022-05-08 06:05:21', 1),
(27, 'राजनांदगांव', '2022-05-08 06:05:26', 1),
(28, 'मुंगेली', '2022-05-08 06:05:39', 1),
(29, 'महासमुन्द', '2022-05-08 06:05:53', 1),
(30, 'बेमेतरा', '2022-05-08 06:05:00', 1),
(31, 'बीजापुर', '2022-05-08 06:05:06', 1),
(32, 'बिलासपुर', '2022-05-08 06:05:12', 1),
(33, 'बालोद', '2022-05-08 06:05:17', 1),
(34, 'बस्तर', '2022-05-08 06:05:23', 1),
(35, 'बलोदा बाज़ार', '2022-05-08 06:05:30', 1),
(36, 'बलरामपुर', '2022-05-08 06:05:35', 1),
(37, 'नारायणपुर', '2022-05-08 06:05:41', 1),
(38, 'धमतरी', '2022-05-08 06:05:47', 1),
(39, 'दुर्ग', '2022-05-08 06:05:58', 1),
(40, 'दंतेवाडा', '2022-05-08 06:05:04', 1),
(41, 'जांजगीर चांपा', '2022-05-08 06:05:11', 1),
(42, 'जशपुर', '2022-05-08 06:05:16', 1),
(43, 'गरियाबंद', '2022-05-08 06:05:23', 1),
(44, 'कोरिया', '2022-05-08 06:05:46', 1),
(45, 'कोरबा', '2022-05-08 06:05:53', 1),
(46, 'कोंडागांव', '2022-05-08 06:05:00', 1),
(47, 'कांकेर', '2022-05-08 06:05:05', 1),
(48, 'कबीरधाम', '2022-05-08 06:05:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagecategory`
--

CREATE TABLE `imagecategory` (
  `id` int(11) NOT NULL,
  `imagecat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imagecategory`
--

INSERT INTO `imagecategory` (`id`, `imagecat`, `created_at`, `Is_Active`) VALUES
(1, 'hello', '2022-05-08 11:05:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagegallery`
--

CREATE TABLE `imagegallery` (
  `id` int(11) NOT NULL,
  `imagecat` varchar(255) NOT NULL,
  `imahead` longtext NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imagegallery`
--

INSERT INTO `imagegallery` (`id`, `imagecat`, `imahead`, `files`, `created_at`, `Is_Active`) VALUES
(38, 'hello', 'dfgdfghh', 'gallery_7196664644.png', '2022-05-16 11:05:01', 1),
(39, 'hello', 'hyhtytyh', 'gallery_2673912539.png', '2022-05-16 11:05:08', 1),
(40, 'hello', 'tyhdfghghdg', 'gallery_3918103874.png', '2022-05-16 11:05:17', 1),
(41, 'hello', 'dfgdfgdfgdfg', 'gallery_4547970898.png', '2022-05-16 11:05:39', 1),
(42, 'hello', 'dfgdfgdfgdfg', 'gallery_5577281503.png', '2022-05-16 11:05:47', 1),
(43, 'hello', 'fghgdfggdfgdfgdfg', 'gallery_7203520033.png', '2022-05-16 11:05:56', 1),
(44, 'hello', 'fgdfgdfgdfgdfgf', 'gallery_8363743975.png', '2022-05-16 11:05:04', 1),
(45, 'hello', 'fdgdfghdfgghdfgdfg', 'gallery_2180264319.png', '2022-05-16 11:05:19', 1),
(46, 'hello', 'gdfgdfgdfg', 'gallery_4830764511.png', '2022-05-16 11:05:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsdate` date NOT NULL,
  `newshed` varchar(255) NOT NULL,
  `news` longtext NOT NULL,
  `public` varchar(20) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsclips`
--

CREATE TABLE `newsclips` (
  `id` int(11) NOT NULL,
  `clipdate` date NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passed_event`
--

CREATE TABLE `passed_event` (
  `id` int(11) NOT NULL,
  `passdate` date NOT NULL,
  `passhed` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `press_prakashni`
--

CREATE TABLE `press_prakashni` (
  `id` int(11) NOT NULL,
  `pressdate` date NOT NULL,
  `presshed` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `relation`, `created_at`, `Is_Active`) VALUES
(23, 'अन्य', '2022-05-08 06:05:26', 1),
(24, 'दोस्त', '2022-05-08 06:05:31', 1),
(25, 'पत्नी', '2022-05-08 06:05:40', 1),
(26, 'पुत्री', '2022-05-08 06:05:45', 1),
(27, 'बहन', '2022-05-08 06:05:50', 1),
(28, 'भाई', '2022-05-08 06:05:57', 1),
(29, 'माता', '2022-05-08 06:05:02', 1),
(30, 'रिश्तेदार', '2022-05-08 06:05:07', 1),
(31, 'हियरिंग लिस्ट', '2022-05-08 06:05:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event`
--

CREATE TABLE `upcoming_event` (
  `id` int(11) NOT NULL,
  `up_date` date NOT NULL,
  `uphed` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','operator') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `created_at`, `updated_at`, `Is_Active`) VALUES
(1, 'admin', 'head', 'd5674507dc461fc877f27344e3f406ff', 'Super Admin', '2022-05-07 09:15:01', '2022-05-07 09:15:38', 1),
(15, 'operator', 'SWC2', '827ccb0eea8a706c4c34a16891f84e7b', 'amarjeet', '2022-05-07 11:21:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `id` int(11) NOT NULL,
  `vid` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `Is_Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`id`, `vid`, `created_at`, `Is_Active`) VALUES
(9, 'Bk6LtL7IS8I', '2022-05-16 00:00:00', 1),
(10, 'Bk6LtL7IS8I', '2022-05-16 00:00:00', 1),
(11, 'Bk6LtL7IS8I', '2022-05-16 00:00:00', 1),
(12, 'Bk6LtL7IS8I', '2022-05-16 00:00:00', 1),
(13, 'Bk6LtL7IS8I', '2022-05-16 00:00:00', 1),
(15, 'RfuYrOCxa0Q', '2022-05-16 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintstype`
--
ALTER TABLE `complaintstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagecategory`
--
ALTER TABLE `imagecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagegallery`
--
ALTER TABLE `imagegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsclips`
--
ALTER TABLE `newsclips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passed_event`
--
ALTER TABLE `passed_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_prakashni`
--
ALTER TABLE `press_prakashni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `complaintstype`
--
ALTER TABLE `complaintstype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `imagecategory`
--
ALTER TABLE `imagecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imagegallery`
--
ALTER TABLE `imagegallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsclips`
--
ALTER TABLE `newsclips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `passed_event`
--
ALTER TABLE `passed_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `press_prakashni`
--
ALTER TABLE `press_prakashni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
