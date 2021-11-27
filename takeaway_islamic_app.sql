-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2016 at 06:03 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `takeaway_islamic_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin123', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Tawheed'),
(2, 'Salah'),
(3, 'Zakat'),
(5, 'Ramadan'),
(6, 'Hajj'),
(7, 'Prophets/Sahaba'),
(8, 'History'),
(9, 'Hadith'),
(10, 'Tafseer'),
(11, 'Dua & Izkar'),
(12, 'Different topics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bookurl` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `cat_id`, `name`, `author`, `description`, `bookurl`, `image`) VALUES
(94, 9, 'Sunan Darmi', '', ' ', 'Sunan_Darmi_(Saudiya)_J-1_02.pdf', 'sunandarmi.jpg'),
(100, 6, 'Hajj Guide', '', 'This is one of the best book for learning hajj and umrah rituals .', 'merged_document.pdf', 'Hajj-and-Umrah-guide-e1365107889395.jpg'),
(104, 7, 'AbuBakar Sadique R.A', '', ' ', 'merged_document_3.pdf', 'Abubakar_(p520j).jpg'),
(105, 11, 'Asmaa ul husna', 'Abdul Khaliq Sadique', ' ', 'Asmaa_ul_husna.pdf', 'Asmaa-e-Husna-.jpg'),
(106, 12, 'Dil sa Dil Tak', 'Dr. Usman Alkhamees', ' ', 'Dil_sa_Dil_Tak.pdf', 'Untitled.png'),
(107, 12, 'Islam main Orat ka Maqaam', '', ' ', 'auraat_ka_mouqaam.pdf', 'file.jpeg'),
(109, 11, 'Masnoon Zikar Elahi', 'Abdul Khaliq Sadique', ' ', 'Masnoo_Zikr-e-Elahi(Shk.Abdulkhaliq).pdf', 'images_(1).jpg'),
(110, 7, 'Khalid Bin waleed', 'Abu Rehan zia ur rehan sadique', ' ', 'Khalid_bin_Waleed_RA.pdf', 'images.jpg'),
(119, 7, 'Hazrat Usman Ghani R.A ', '', '', 'Usman_Ghani_R.A.pdf', 'images_(4).jpg'),
(122, 12, 'Matta Ki Haqeeqat', '', ' ', 'Mata_Ki_Haqeeqat.pdf', 'Mata_Ki_Haqeeqat.gif'),
(123, 2, 'Namaz e Mustafa', '', ' ', 'Namaz-e-Mustafa(Abo-Hamza-Abdulkhaliq_old_1).pdf', 'Namaz-e-Mustafa(Abo-Hamza-Abdulkhaliq).jpg'),
(124, 12, 'Kharji Firqay Ki Pehchan', '', ' ', 'ur_Kharji_Firqe_Ki_Pehchan_-_Copy.pdf', 'ur_Kharji_Firqe_Ki_Pehchan.gif'),
(125, 5, 'Rozo k Masail', '', '', 'Rozon_K_Masayal(Muhammad_Iqbal_Kalani).pdf', '1897__77589_zoom.jpg'),
(128, 12, 'Quran in English translation', '', ' ', 'Holy_Quran_English_Translation_by_Pikhtal.pdf', 'romanayali.jpg'),
(132, 1, 'Gunah Or Toba', '', ' ', 'Gunah_Aur_Toba.pdf', 'image_Gunah_Aur_Toba).gif'),
(133, 11, 'Islamic Wazaif', '', ' ', 'Islami-Wazaif.pdf', 'Islami-Wazaif.gif'),
(134, 1, 'Shirk K Chor Darwazay', '', ' ', 'Shirk_Ke_Chor_Darvazy(Abdulkhaliq).pdf', 'shirk-ke-chor-darwaze.jpg'),
(135, 1, 'QURAN DICTIONARY ', '', ' ', 'Quran_Dictionary.pdf', 'quran_dictionary.gif'),
(139, 1, 'Kalma Go Mushrik', '', '', 'kalma_go_mushrik.pdf', 'Kalma_Go_Mushrik.JPG'),
(141, 7, 'Shan-e-Mustafa', '', '', 'Shan-e-Mustafa(Shk.Abdulkhaliq).pdf', 'Shan_e_Mustafa_s-a-w.JPG'),
(142, 7, 'Shan e Sahaba Baazaban e Mustafa s-a-w', '', '', 'Shaan-e-Sahaba(Shk.Abdulkhaliq).pdf', 'Shan_e_Sahaba_Baazaban_e_Mustafa_s-a-w.JPG'),
(143, 8, 'Tarekh e Khulafa ', '', '', 'Tareekh-ul-Khulafa.pdf', 'Tarekh_e_khulafa_1423741812.png'),
(144, 12, 'Aurat Ka Mouqam', '', ' ', 'Islam_main_auraat_ka_mouqaam.pdf', 'Aurat_ka_mouqaam_1423750945.jpg'),
(145, 10, 'Tafseer e Usmani', '', ' ', 'Tarseer-E-usmani.pdf', 'Tafseer_e_usmani_1423752008.jpg'),
(146, 1, 'Saniha e Karbala', 'dr israr', ' ', 'BU-2-06_Saniha_Karbala.pdf', 'saniha-e-karbala_1423829585.jpg'),
(147, 8, 'Essiat aur Islam', 'Dr. Israr', ' ', 'Essiat_aur_Islam.pdf', 'Essiat_aur_Islam_1423845662.jpg'),
(148, 1, 'Haqeeqat-o-Iqsaam-e-Shirk', '', ' ', 'Haqeeqat-o-Iqsaam-e-Shirk.pdf', 'Haqeeqat-o-Iqsam-e-Shirk_1423908413.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
