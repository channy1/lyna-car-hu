-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2022 at 08:40 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savongz_trial_version`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_registeration`
--

CREATE TABLE `event_registeration` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_registeration`
--

INSERT INTO `event_registeration` (`id`, `event_id`, `name`, `phone`, `email`, `created_on`) VALUES
(2, 1, 'Surya Singh', '08950341811', 'sample@gmail.com', '2020-12-07 11:53:27'),
(3, 1, 'Surya Singh', '08950341811', 'amanalfa991@gmail.com', '2020-12-07 11:57:39'),
(4, 1, 'Surya Singh', '08950341811', 'amanalfa991@gmail.com', '2020-12-07 11:57:56'),
(5, 8, 'himanshu', '9795021132', 'singh.himanshu989@gmail.com', '2020-12-07 20:36:50'),
(6, 1, 'himanshu', '09795021132', 'hsingh@sdlcinfotech.com', '2020-12-11 10:48:51'),
(7, 6, 'Surya Singh', '08950341811', 'sachin@dukami.com', '2020-12-23 11:30:44'),
(8, 6, 'Surya Singh', '08950341811', 'sachin@dukami.com', '2020-12-23 11:32:16'),
(9, 10, 'testdate12366', '09795021132', 'testdate@gmail.com', '2021-01-08 01:00:34'),
(10, 10, 'Savongz Meas', '012924517', 'info@lyna-carrental.com', '2021-01-08 02:18:36'),
(11, 10, 'Savongz Meas', '012924517', 'info@lyna-carrental.com', '2021-01-08 05:45:40'),
(12, 10, 'Savongz Meas', '+85512924517', 'info@lyna-carrental.com', '2021-01-08 05:48:20'),
(13, 19, '', '', '', '2021-01-25 02:11:02'),
(14, 19, '', '', '', '2021-01-25 02:12:16'),
(15, 19, '', '', '', '2021-01-25 02:26:22'),
(16, 19, '', '', '', '2021-01-25 02:26:40'),
(17, 19, '', '', '', '2021-01-25 03:42:20'),
(18, 19, '', '', 'sdfsdsfsdfsdf@gmail.com', '2021-01-25 03:52:32'),
(19, 19, '', '', 'testdate@gmail.com', '2021-01-25 03:54:22'),
(20, 19, '', '', 'testdate@gmail.com', '2021-01-25 04:09:57'),
(21, 19, '', '', 'info@lyna-carrental.com', '2021-01-25 09:38:10'),
(22, 19, '', '', 'testdate@gmail.com', '2021-01-25 11:01:42'),
(23, 20, '', '', 'testdate@gmail.com', '2021-01-26 10:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `ticket_name` varchar(200) DEFAULT NULL,
  `ticket_price` float DEFAULT NULL,
  `quanitity` int(11) DEFAULT NULL,
  `created_on` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `event_id`, `ticket_name`, `ticket_price`, `quanitity`, `created_on`) VALUES
(1, 19, 'Ticket 1', 10, 5, '1610389302'),
(2, 19, 'Ticket 2', 20, 30, '1610389302'),
(3, 20, 'ticket1', 5, 10, '1611681030'),
(4, 20, 'ticket2', 10, 10, '1611681030'),
(5, 20, 'ticket3', 15, 10, '1611681030'),
(6, 21, 'Tour Guide Ticket', 35, 5, '1615634451'),
(7, 21, 'Tour Guide Ticket', 25, 10, '1615634451'),
(8, 21, 'Tour Guide Ticket', 20, 20, '1615634451'),
(9, 22, 'Become a Tour Guide', 35, 5, '1615990490'),
(10, 22, 'Become a Tour Guide', 25, 10, '1615990490'),
(11, 23, 'Become an Introducer', 35, 1, '1615992460'),
(12, 23, 'Become an Introducer', 30, 5, '1615992460'),
(13, 23, 'Become an Introducer', 25, 10, '1615992460'),
(14, 24, 'Become an Introducer', 35, 1, '1615993991'),
(15, 24, 'Become an Introducer', 30, 5, '1615993991'),
(16, 24, 'Become an Introducer', 25, 10, '1615993991'),
(17, 25, 'Become an Introducer', 35, 1, '1615993996'),
(18, 25, 'Become an Introducer', 30, 5, '1615993996'),
(19, 25, 'Become an Introducer', 25, 10, '1615993996'),
(20, 26, 'Become an Introducer', 35, 1, '1615994037'),
(21, 26, 'Become an Introducer', 30, 5, '1615994037'),
(22, 26, 'Become an Introducer', 25, 10, '1615994037'),
(23, 27, 'Become an Introducer', 35, 1, '1615995905'),
(24, 27, 'Become an Introducer', 30, 5, '1615995905'),
(25, 27, 'Become an Introducer', 25, 10, '1615995905'),
(26, 28, 'Become an Introducer', 35, 1, '1615996063'),
(27, 28, 'Become an Introducer', 30, 5, '1615996063'),
(28, 28, 'Become an Introducer', 25, 10, '1615996063'),
(29, 29, 'Become an Introducer', 35, 1, '1615997944'),
(30, 29, 'Become an Introducer', 30, 5, '1615997944'),
(31, 29, 'Become an Introducer', 25, 10, '1615997944'),
(32, 30, 'Alfa', 10, 12, '1616003938'),
(33, 31, 'fsfdsf', 12, 12, '1616004280'),
(34, 32, 'sfsfdsdf', 12, 12, '1616004536');

-- --------------------------------------------------------

--
-- Table structure for table `job_announment`
--

CREATE TABLE `job_announment` (
  `ann_id` int(11) NOT NULL,
  `ann_title_en` char(200) NOT NULL,
  `ann_salary` char(100) NOT NULL,
  `ann_hiring` int(11) NOT NULL,
  `ann_term` varchar(255) NOT NULL,
  `ann_closing_date` date NOT NULL,
  `post_date` date DEFAULT NULL,
  `intro_duct` text NOT NULL,
  `job_des` text NOT NULL,
  `job_respone` text NOT NULL,
  `job_re` text NOT NULL,
  `duty_station` text NOT NULL,
  `salary_and_benifit` text NOT NULL,
  `how_apply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_announment`
--

INSERT INTO `job_announment` (`ann_id`, `ann_title_en`, `ann_salary`, `ann_hiring`, `ann_term`, `ann_closing_date`, `post_date`, `intro_duct`, `job_des`, `job_respone`, `job_re`, `duty_station`, `salary_and_benifit`, `how_apply`) VALUES
(1, 'IT WEB PROGRAMMER & ADVERTISING ASSISTANT', '180$', 2, 'Full Time', '2019-03-30', '2019-03-08', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>ពិពណនាក្រុមហ៊ុន</strong><br />\r\n<strong>យាន​​​​​ដ្ឋាន​​ លីណា</strong>​&nbsp;​​​​គីជាអាជីវកម្មគ្រូសារគ្រីស្ទាន ដែលបានបង្កើតឡើងនៅថ្ងៃទី​ ១​ ខែ មិថុនា ឆ្នាំ​២០០១ ដែលមានទីតាំងនៅ ទីក្រុងភ្នំពេញ។</span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><span style=\"font-size:10pt\"><span style=\"color:#2d2d2d\"><span style=\"font-family:DaunPenh\">យានដ្ឋាន-លីណា ជួសជុលរថយន្តគ្រប់ប្រភេទ ពីស៊េរីទាបបំផុតដល់សេរី ទំនើប បំផុត គ្រប់ស៊េរីគ្រប់ម៉ូដែល!</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\">សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ចូលរួមជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\">លើសពីរនេះទៅទៀត យើងខ្ញុំមានគោលបំណងបង្កើតឧិកាស​ការងារ​ដល់ក្រុម សិស្ស​ និសិត្សដែល​បានបញ្ចប់​ការ​សិក្សាផ្នែកគ្រឿងយន្ត និងយន្តសាស្រ្ត ​ពីបណ្តា អង្គការក្រៅ​ រដ្ឋាភិបាលនានា​នៅទីក្រុងភ្នំពេញ​​ និងមកពីបណ្តា ខេត្តនានាទូទាំងប្រទេសកម្ពុជា និង​ ដើម្បីចូលរូមជាមូយរាជរដ្ឋាភិបាល​កាត់បន្ថយភាពក្រីក្រ។</span></span></span></p>\r\n', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>ពិពណ៌នាតួនាទី</strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>តួនាទី</strong><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">: មន្រ្តីជំនួយការពត៌មានវិទ្យា ផ្នែកគេហទំព័រ</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">/</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ផលិតកម្មវិធី និងផ្សព្វផ្សាយ</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">&nbsp;-&nbsp;</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">IT Web/Program &amp; Advertising Assistant</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>ប្រភេទការងារ</strong><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">:&nbsp;</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ផ្នែកចាត់ចែង រៀបចំ និងគ្រប់គ្រងការងារទូទៅពត៌មានវិទ្យា ផ្នែកគេហទំព័រ</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">/</span></span></span><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ផលិតកម្មវិធី និងផ្សព្វផ្សាយ</span></span></span>&nbsp;</span></span></span></p>\r\n', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>តួនាទី​ ​ភារកិច្ច និង ទំហ៊ំការងារប្រចាំថ្ងៃ</strong></span></span></span></p>\r\n\r\n<ol start=\"1\" style=\"list-style-type:decimal\">\r\n	<li>ទទួលបដិសណ្ឋារកិច្ជ ភ្ញៀវទាំងខ្មែរនិងជនបរទេស ។</li>\r\n	<li>សហការល្អជាមួយមិត្តរួមការងារទាំងផ្នែក&nbsp;LGC&nbsp;និង&nbsp;LCRC</li>\r\n	<li>រាយការណ៍ដោយផ្ទាល់ទៅអ្នកគ្រប់គ្រង ឬ ម្ចាស់យានដ្ឋាន</li>\r\n	<li>ជួយបំរើភេសជ្ជដល់ភ្ញៀវទាំងផ្នែកជួលរថយន្តនិងយានដ្ឋាន&nbsp;Serving Tea, Coffee and Cool drink to both the LGC&rsquo;s + LCRC&rsquo;s customers&nbsp;</li>\r\n</ol>\r\n', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>អកប្បកិរិយានិងកាយសម្បទា:</strong></span></span></span></p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li>កាយសម្បទាមាំមួន​និង​មានសុខភាពល្អ</li>\r\n	<li>ធ្វើការងាររហាស់រហួន</li>\r\n	<li>ស្មោះត្រង់</li>\r\n	<li>គោរពពេលវេលា</li>\r\n	<li>រួសរាយរាក់ទាក់</li>\r\n	<li>អាចធ្ចើការបានច្រើនយ៉ាងក្នុងពេលតែមួយ&nbsp; fff</li>\r\n</ul>\r\n ', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14.7456px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ទីកន្លែងធ្វើការ</span></span></span></strong><span style=\"font-size:10pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:#2d2d2d\">:&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14.7456px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ក្រុងភ្នំពេញ</span></span></span><br />\r\n<span style=\"font-size:10pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#2d2d2d\">ការគ្រប់គ្រង​និងទទួលខុសត្រូវ តាមមូលដ្ឋាននៅក្នុង បណ្តាញ / សាខា នាយកដ្ឋាន ផ្នែកទិញនិងជួល</span></span></span></span></span></span></p>\r\n', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\"><strong>ប្រាក់បៀវត្សនិងអត្ថប្រយោជន៌</strong></span></span></span></p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li>ប្រាក់ខែពី&nbsp;$180.00 ដល់&nbsp;$280.00&nbsp;និងអាចតម្លើងបានបន្ទាប់ពីចប់ការសាកល្បង3&nbsp;ខែ&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0px; text-align:start\"><span style=\"font-size:14px\"><span style=\"background-color:white\"><span style=\"color:#2d2d2d\">រួមផ្សំនិងការរីកចំរើននិងយល់ដឹងការងារបានល្អនិងស្ទាត់ជំនាញ</span></span></span></p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li>​​​​អាហារថ្ងៃត្រង់ (មាននៅកន្លែង)</li>\r\n	<li>ឯកសណ្ឋាន (នឹងពិចារណានៅពេលក្រោយ)</li>\r\n	<li>ប្រាក់បៀវត្ស&nbsp;13&nbsp;ខែ (នឹងពិចារណានៅពេលក្រោយ)</li>\r\n	<li>មានប្រាក់លើកទឹកចិត្ត ប្រចាំឆ្នាំ (នឹងពិចារណានៅពេលក្រោយ)</li>\r\n	<li>មានប្រាក់លើកទឹកចិត្ត ប្រចាំឆ្នាំ (នឹងពិចារណានៅពេលក្រោយ)</li>\r\n</ul>\r\n', '<p>កន្លែងទទួលពាក្យ បេក្ខជន មានចំណាប់អារម្មណ៌ សូមផ្ញើ ប្រវត្តិរូបសង្ខេប CV, សំបុត្រអម ឯកសារពាក់ព័ន្ឋនិងការសិក្សា និង រូបថត (4 x 6 ) បញ្ជូនមកកាន់អាស័យដ្ឋាន ដូចខាងក្រោមនេះ: No. 132, Intersection Streets 430 | 432 | 173 Sangkat Tumnop Teuk | Khan Chamcarmon Phnom Penh | Kingdom of Cambodia Tel : +855 (0)71 5 14 30 14 E-mail: info@lyna-garage.com</p>\r\n'),
(2, 'TOUR OPERATOR & ADMIN ASSISTANT', '500', 2, 'FULL-TIME', '2019-05-15', '2019-05-29', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n ', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n', '<p>សេវាកម្មយើងខ្ងុំ​ មានទស្សនវិស្ស័យ បំរើសេវាកម្ម​ក្នុងវិស័យថែទាំ និងជួសជុល រថយន្តទូទៅ ជូនដល់ក្រុមការងារបេសកជន គ្រូសារគ្រីស្ទាន ជនបរទេស ដែលមកបំរើការងារដល់អង្កការក្រៅដ្ឋាភិបាល​ អង្គការអន្តរជាតិ​ អង្្គការសហ​​​​​ប្រជាជាតិ ក្រុមហ៊ុមឯកជនជាតិ អន្តរជាតិ ក្របខ័ណ្ឌរដ្ឋ ដូចជា ក្រសួង មន្ទីរ ដែលមាន​យានយន្តសំរាប់ប្រើប្រា​ស់ ។​ ទស្សនវិស័យរបស់យើងខ្ញុំ គឺ​ជួយ​​កាត់បន្ថយ ការចំណាយខ្ពស់​ ឬ​​ ​ការពារការកេងបន្លំ លើសេវាកម្មជួសជុល រថយន្ត ​និង ចូលរួមមហាបេសកម្មបំ​រើការងារព្រះ​ និង ​ស្វែងរកប្រជារាស្រ្ត ទ្រង់ថ្វាយព្រះ។</p>\r\n'),
(3, 'JAVA SCRIPTS PROGRAMMER', '500', 2, 'FULL-TIME', '2019-06-05', '2019-07-10', '<p>ENGLISH</p>\r\n', '<p>ខ្មែរ</p>\r\n', '<p>feer</p>\r\n', '<p>fsrea</p>\r\n ', '<p>sfeetraet</p>\r\n', '<p>sfetert</p>\r\n', '<p>fetr</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `package_posting_type`
--

CREATE TABLE `package_posting_type` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_2` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_posting_type`
--

INSERT INTO `package_posting_type` (`id`, `description`, `description_2`, `status`) VALUES
(1, 'Car\'s Owner', NULL, NULL),
(2, 'Rickshaw\'s Owner', NULL, NULL),
(3, 'Hotel & Guesthouse', NULL, NULL),
(4, 'Tour Guide', NULL, NULL),
(5, 'Dirver', NULL, NULL),
(6, 'Introducer', NULL, NULL),
(7, 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `about_title` char(100) NOT NULL,
  `about_text` text NOT NULL,
  `about_text_kh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_title`, `about_text`, `about_text_kh`) VALUES
(1, 'ABOUT US', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\">ABOUT US</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Lyna-CarRental.Com is one of the top 10 Car Rental Companies in Cambodia with more than 38 cars and more than 30 employees. It was founded on June 1, 2001 in Phnom Penh, Cambodia.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Lyna-CarRental.Com not only rents cars at a competitive price but also creates employment and training opportunities for local young students graduated from NGOs, OIs or any private institution and poor students from remote provinces so that they can enjoy internship in the field of tourism.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Resources</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">We, a married couple owner with more than 15 years of experience in the related fields, would like to appreciate your support to our Lyna-CarRental.Com and your feeling us as the place of effective response to your personal or corporate rental needs. We have many vehicles with a variety of brands, marks, series and prices for your optimum selection, such as: Toyota, Lexus, Mitsubishi, Honda, Hyundai, and so on. In addition we have more than 30 employees available for serving the customers.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\">Car Rental Option</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">We have two options of car rental service: 1) self-dive car rental service; 2) English-spoken driver car rental service. The customers can use the rented car in many purposes but not for overloading and illegal purposes.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Target Customers</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Our target customers are: local people, Non-Governmental Organization (NGO), International Organization (IO), United Nations organization (UNO), embassies, private companies, national and international tourists from any country around the world.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Vision</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Lyna will become the most famous <em>Car Rental Agency</em>&nbsp;in Cambodia, which provides comprehensive and professional car rental services comparable to those of developped countries in the world</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Mission</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Provide local and foreign people in Cambodia&nbsp;&nbsp;with professional and affordable vehicle rental service so that they can access and enjoy any place at their desire</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Values</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">We attach real professionalism and great value to trustworthiness, integrity and accountability, and we always deal with all levels of customers with a manner of reliability and in a friendly environment.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Services</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Solve any car problems for either local &amp; foreign car owners </span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Solve residential problems for foreign car owners</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Car repair &amp; maintenance with modern devices</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Automotive spare parts sale &amp; replacement</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Car sale and rent and car marketing</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n ', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">អំពីក្រុមហ៊ុន​លីណា-ជួលរថយន្តទេសចរណ៍យើងខ្ញុំ</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">លីណា​ជួល​រថយន្តទេសចរណ៍គឺ​ជា​ក្រុមហ៊ុនមួយ​ក្នុង​ចំណោម​ក្រុមហ៊ុនជួលរថយន្ត​​​​កំពូលទាំង​១០នៅ​កម្ពុជា។​ ក្រុមហ៊ុន​យើង​​ចាប់​កំណើត​នៅ​ថ្ងៃទី១ មិថុនា ឆ្នាំ ២០០១ នៅទីក្រុង​ភ្នំពេញ​ ប្រទេស​កម្ពុជា។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ក្រុមហ៊ុន​លីណាជួលរថយន្តទេសចរណ៍ មិនត្រឹមតែ​ជួលរថយន្ត ក្នុង​តម្លៃ​ដែល​អាច​ប្រកួត​ប្រជែង​ជាមួយ​គេ​បាន​តែប៉ុណ្ណោះទេ ក្រុមហ៊ុន​នេះ​ថែមទាំង​ផ្តល់​ឱកាស​ការងារ​ និង​ការ​ហ្វឹកហាត់​ដល់និស្សិត​វ័យ​ក្មេង​នានា​នៅ​កម្ពុជា ដែល​មាន​សញ្ញាប័ត្រ​ចេញ​ពី​អង្គការ​មិន​មែន​រដ្ឋា​ភិបាលភិបាល ពីអង្គការ​អន្តរជាតិ និង​ពី​ស្ថាប័នឯក​ជន​ ព្រម​ទាំង និស្សិត​ក្រីក្រ​ដែល​មកពី​ខេត្ត​ដាច់​ស្រយាល​នានាទៀត​ផង​ដើម្បី​ឲ្យ​ពួក​គេអាច​ធ្វើ​កម្មសិក្សាក្នុង​វិស័យ​ទេស​ចរណ៍​យ៉ាងរីករាយ ​។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">ធនធាន​របស់​យើង​ខ្ញុំ</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">យើងទាំងពីរ​នាក់​ស្វាមី ភរិយា ជា​ម្ចាស់​ក្រុមហ៊ុន ដែល​មាន​បទពិសោធន៍​ការងារ​លើ​វិស័យ​នេះ​រយៈពេល​ជាង​១៥​ឆ្នាំ សូម​ធ្វើការ​កោត​សរសើរ អស់​លោក លោក​ស្រី​ នាង​កញ្ញា​ដែល​បាន​​ការ​គាំទ្រ ដល់​​ក្រុមហ៊ុន​លីណាជួលរថយន្តទេសចរណ៍​របស់​យើង​ខ្ញុំ​ដែល​តែង​តែ​បំពេញ​នូវ​សេចក្តី​ត្រូវ​ការ​ជួល​រយន្ត​ជូនអស់​លោក លោក​ស្រី​ នាង​កញ្ញា​​ជាលក្ខណៈ​បុគ្គល ក្តី ឬ​ជា​លក្ខណៈ​ក្រុមហ៊ុន​ក្តី។&nbsp; ក្រុមហ៊ុនយើង​ខ្ញុំ មាន​យានយន្ត​ ប្រមាណ​ជាង​៣៨​គ្រឿងសំរាប់​ជួល​ដែល​​មាន​ច្រើន​ម៉ូដែល ​ច្រើន​​ម៉ាក និង​ច្រើនសេរី​ក្នុង​តម្លៃ​ខុសៗ​គ្នា សំរាប់​ការ​​ជ្រើស​រើស​ដ៏​ពេញចិត្ត​បំផុតដូចជា​ </span><span style=\"font-size:10.0pt\">TOYOTA, LEXUS, MITSUBISHI, HONDA, HYUNDAI &nbsp;ជាដើម។ មិន​តែ​ប៉ុណ្ណោះយើង​ខ្ញុំ​មាន​បុគ្គលិក​ចំនួន​ជាង​៣០​នាក់​សំរាប់​បំរើ​អតិថិជន។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">ជំរើស​នៃ​ការ​ជួល​រថយន្ត<span style=\"font-size:10.0pt\">​</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">យើង​ខ្ញុំ​មាន​ សេវាកម្ម​ជួល​រថយន្ត​ពីរ​ប្រភេទ​សំរាប់​​ជ្រើសរើស៖ ១) ការ​ជួល​រថយន្ត​ដើម្បី​បើកបរ​ខ្លួន​ឯង ២) ការ​ជួល​រថយន្ត​ដោយ​មាន​អ្នក​បើកបរ​អាច​និយាយ​ភាសារ​អង់គ្លេស។ អតិថិជន​អាច​ប្រើរថយន្ត​ជួល​ក្នុង​គោល​បំណង​ច្រើនយ៉ាង ប៉ុន្តែ​​មិន​មែនប្រើ​​ក្នុង​គោល​បំណង​ផ្ទុក​ហួស​ចំណុះ និង ប្រើ​ខុស​ច្បាប់ទេ។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">អតិថិជន​ជាមុខ​សញ្ញា​របស់​ក្រុមហ៊ុន​យើង</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">អតិថិជន​ជាមុខ​សញ្ញា​របស់​ក្រុមហ៊ុន​យើង&nbsp; ពលរដ្ឋ​ខ្មែរ អង្គការមិនមែនរដ្ឋាភិបាល អង្គការ​អន្តរជាតិ ស្ថាន​ទូត ក្រុមហ៊ុន​ឯកជន ទេសចរ​ជាតិ និង​អន្តរជាតិ មក​ពី​បណ្តា​ប្រទេស​នានា​ជុំវិញពិភព​លោក</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">ចក្ខុវិស័យ</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">លីណាជួលរថយន្តទេសចរណ៍នឹង​ក្លាយ​ទៅជា​ទី​ភ្នាក់​ងារ​ជួល​រថយន្ត​ដ៏​ល្បី​ល្បាញ​បំផុត ដោយ​ផ្តល់​ដល់​អតិថិជន​នូវ​សេវាកម្ម​ជួល​រថយន្ត​ក្នុង​លំដាប់​អាជីព ដែល​អាច​ប្រៀប​ធៀប​ទៅនឹង​សេវាកម្ម​ជួល​រថយន្តនៃ​ប្រទេស​ជឿនលឿន​ទូទាំង​ពិភពលោក។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">បេសកកម្ម</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ផ្តល់សេវាកម្មជួល​រថយន្តជាលក្ខណៈអាជីព ដែលអាច​ទទួល​យក​បាន&nbsp;ជូនប្រជាពលរដ្ឋទាំងខ្មែរនិងបរទេស​ដែល​មាន​លក្ខណៈអាជីព និង​អាច​ទទួល​យបាននៅក​ម្ពុជា ដើម្បីឲ្យពួកគេ​អាចទៅកំសាន្តដល់ទីណាក៏បាន​តាមចិត្តចង់។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">គុណតម្លៃ​​</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">យើង​ចាត់​ទុក​ថា​ភាព​ទំនុក​ចិត្ត សុចរិត​ភាប​និង​គណនេយ្យភាព​ មាន​លក្ខណៈអាពីព​ពិត​ប្រាកដ​ និង​មាន​តម្លៃ ខ្ពស់​បំផុត ហើយ​យើង​តែងតែ​ប្រាស្រ័យ​ទាក់ទង​ជាមួយ​អតិថិជន​គ្រប់​លំដាប់ក្នុង​លក្ខណៈ​គួរ​ឲ្យ​ទុក​ចិត្ត និង​ក្នុង​បរិយាកាស​មិត្តភាព​ជានិច្ច។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\">សេវាកម្ម</span></span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ដោះស្រាយ​បញ្ហា​រថយន្ត​ជូនម្ចាស់យានយន្ត​ទាំង​ខ្មែរ​និងបរទេស</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ដោះស្រាយ​បញ្ហា​ផ្លូវ​ច្បាប់​នៃលំនៅដ្ឋានជូន​ជន​បរទេស</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ជួសជុល​និង​ថែទាំ​រថយន្ត​ដោយ​ឧបករណ៍ទំនើប</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">លក់ និង​ដោះដូរគ្រឿង​បន្លាស់​រថយន្ត</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10.0pt\">លក់ ឬ​ជួល​រថយន្ត និងទីផ្សាររថយន្ត</span></li>\r\n</ul>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessories_rental`
--

CREATE TABLE `tbl_accessories_rental` (
  `ac_id` int(11) NOT NULL,
  `ac_title` text,
  `ve_year` varchar(255) NOT NULL,
  `ve_make` varchar(255) NOT NULL,
  `ve_model` varchar(255) NOT NULL,
  `ac_province_name` varchar(350) DEFAULT NULL,
  `ve_sub_model` varchar(255) NOT NULL,
  `ve_color` varchar(255) NOT NULL,
  `ac_image` text,
  `ac_ref_no` text,
  `ac_days(1-7)` text,
  `ac_extradays(1-7)` text,
  `ac_days(15-26)` text,
  `ac_extradays(15-26)` text,
  `ac_monthly` text,
  `ac_extramonthly` text,
  `ac_yearly` text,
  `ac_extrayearly` text,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `refun_deposit` varchar(255) DEFAULT NULL,
  `note` text NOT NULL,
  `created_on` varchar(20) DEFAULT '1616245136',
  `updated_on` varchar(20) DEFAULT NULL,
  `total_view` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_accessories_rental`
--

INSERT INTO `tbl_accessories_rental` (`ac_id`, `ac_title`, `ve_year`, `ve_make`, `ve_model`, `ac_province_name`, `ve_sub_model`, `ve_color`, `ac_image`, `ac_ref_no`, `ac_days(1-7)`, `ac_extradays(1-7)`, `ac_days(15-26)`, `ac_extradays(15-26)`, `ac_monthly`, `ac_extramonthly`, `ac_yearly`, `ac_extrayearly`, `discount`, `vat`, `refun_deposit`, `note`, `created_on`, `updated_on`, `total_view`) VALUES
(1, 'CHILD CAR SEAT RENTAL', '', '', '', '7', '', '', '20190808_4964.png', 'CCS-44R040002', '6.50', '5.50', '5.50', '4.50', '120', '4.50', '280', '4.50', '10', '10', '150', '', '1616245136', '1616247727', 23),
(2, 'CHILD CAR SEAT RENTAL', '', 'RASTAR', '', NULL, 'WEIGHT: 9-18KG & 15-25KG', 'PINK', '20190808_3258.png', 'CCS-040239', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '150.00', '', '1616245136', NULL, 16),
(3, 'CHILD CAR SEAT RENTAL', '', '', '', NULL, '', '', '20190808_5978.png', 'CCS-C157', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '150', '', '1616245136', NULL, 16),
(4, 'GPS NAVIGATOR RENTAL', '', '', '', NULL, '', '', '20190808_4970.png', 'GPS-N -GARMIN-001', '7.50', '6.50', '6.50', '5.50', '150.50', '4.50', '320.50', '4.50', '10.00', '10.00', '175.00', '', '1616245136', NULL, 16),
(5, 'BABY STROLLER RENTAL', '', '', '', NULL, '', '', '20190808_3117.png', 'BSTROLLER-001', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '200.00', '', '1616245136', NULL, 16),
(6, 'POWER BANK RENTAL', '', '', '', NULL, '', '', '20190808_5257.png', 'PWBK-001', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '120.00', '', '1616245136', NULL, 16),
(7, 'CAR DVR RENTAL', '', '', '', NULL, '', '', '20190808_7959.png', '', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '155.00', '', '1616245136', NULL, 16),
(8, 'CELL PHONE RENTAL', '', '', '', NULL, '', '', '20190808_2549.png', '', '6.50', '5.50', '5.50', '4.50', '120.50', '4.50', '280.50', '4.50', '10.00', '10.00', '250.00', '', '1616245136', NULL, 17),
(9, 'SIM CARD RENTAL', '', '', '', NULL, '', '', '20190808_3080.png', '', '6.50', '4.50', '3.50', '2.50', '15.50', '2.50', '30.50', '2.50', '10.00', '10.00', '10.00', '', '1616245136', NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessories_rental_img`
--

CREATE TABLE `tbl_accessories_rental_img` (
  `img_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accessories_rental_img`
--

INSERT INTO `tbl_accessories_rental_img` (`img_id`, `acc_id`, `img_sub`) VALUES
(7, 1, '../image/accessories rental//1616333738-20190808_4964.png'),
(8, 1, '../image/accessories rental//1616333738-20190808_3258.png'),
(9, 1, '../image/accessories rental//1616333741-20190808_5257.png'),
(10, 1, '../image/accessories rental//1616333742-20190808_2549.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessory_admin`
--

CREATE TABLE `tbl_accessory_admin` (
  `acc_id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `sub_model` varchar(255) NOT NULL,
  `imei` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accessory_admin`
--

INSERT INTO `tbl_accessory_admin` (`acc_id`, `ref_no`, `acc_name`, `make_id`, `model_id`, `sub_model`, `imei`, `status`) VALUES
(1, '009', 'test1', 2, 1, 'sub', 'imi111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessory_make`
--

CREATE TABLE `tbl_accessory_make` (
  `make_id` int(11) NOT NULL,
  `make_name` varchar(255) NOT NULL,
  `add_bye` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accessory_make`
--

INSERT INTO `tbl_accessory_make` (`make_id`, `make_name`, `add_bye`, `order_number`) VALUES
(1, 'test1', 5, '1'),
(2, 'test2', 5, '2'),
(3, 'test3', 5, '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessory_model`
--

CREATE TABLE `tbl_accessory_model` (
  `model_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `add_bye` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accessory_model`
--

INSERT INTO `tbl_accessory_model` (`model_id`, `make_id`, `model_name`, `order_number`, `add_bye`) VALUES
(1, 2, 'cc', 'txt_order', 5),
(2, 3, 'dd', '3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agreement`
--

CREATE TABLE `tbl_agreement` (
  `ag_id` int(11) NOT NULL,
  `ag_ref_no` varchar(255) DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `ag_name_owner` int(11) DEFAULT NULL,
  `ag_customer_name` int(11) DEFAULT NULL,
  `ag_passport` int(11) DEFAULT NULL,
  `ag_id_card` int(11) DEFAULT NULL,
  `ag_residentail_book` int(11) DEFAULT NULL,
  `ag_fuel` int(11) DEFAULT NULL,
  `ag_fuel_full_tank` int(11) DEFAULT NULL,
  `ag_inception_date` date DEFAULT NULL,
  `ag_inception_time` varchar(255) DEFAULT NULL,
  `ag_return_date` date DEFAULT NULL,
  `ag_return_time` varchar(255) DEFAULT NULL,
  `ag_period_day` varchar(255) DEFAULT NULL,
  `ag_extra_day` varchar(255) DEFAULT NULL,
  `ag_rate` decimal(10,2) DEFAULT NULL,
  `ag_extra_rate` decimal(10,2) DEFAULT NULL,
  `ag_total` decimal(10,2) DEFAULT NULL,
  `ag_extra_total` decimal(10,2) DEFAULT NULL,
  `ag_deposited` decimal(10,2) DEFAULT NULL,
  `ag_long_dast` decimal(10,2) DEFAULT NULL,
  `ag_amount` decimal(10,2) DEFAULT NULL,
  `ag_discount_percent` decimal(10,2) DEFAULT NULL,
  `ag_discount_amount` decimal(10,2) DEFAULT NULL,
  `ag_vat` decimal(10,2) DEFAULT NULL,
  `ag_vat_amount` decimal(10,2) NOT NULL,
  `ag_amount_aft_d` decimal(10,2) DEFAULT NULL,
  `ag_total_net_pay` decimal(10,0) DEFAULT NULL,
  `ag_name_owner_sign` char(255) DEFAULT NULL,
  `ag_name_witness` char(255) DEFAULT NULL,
  `ag_name_renter` char(255) DEFAULT NULL,
  `ag_regular_maintenance` int(11) DEFAULT NULL,
  `ag_unlimited_millage` int(11) DEFAULT NULL,
  `ag_repair` int(11) DEFAULT NULL,
  `ag_insurance` int(11) DEFAULT NULL,
  `ag_articles_from` char(255) DEFAULT NULL,
  `ag_articles_to` char(255) DEFAULT NULL,
  `ag_no_driver_from` char(255) DEFAULT NULL,
  `ag_no_driver_to` char(255) DEFAULT NULL,
  `ag_other_from` char(255) DEFAULT NULL,
  `ag_other_to` char(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` date DEFAULT NULL,
  `type_agreement` varchar(11) NOT NULL COMMENT '1=car,2=driver,3=tour guide',
  `recipt_no` varchar(255) DEFAULT NULL,
  `pay_for` text,
  `pay_word` text,
  `return_deposit` varchar(255) DEFAULT NULL,
  `pay_cash_cheque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_agreement`
--

INSERT INTO `tbl_agreement` (`ag_id`, `ag_ref_no`, `car_id`, `ag_name_owner`, `ag_customer_name`, `ag_passport`, `ag_id_card`, `ag_residentail_book`, `ag_fuel`, `ag_fuel_full_tank`, `ag_inception_date`, `ag_inception_time`, `ag_return_date`, `ag_return_time`, `ag_period_day`, `ag_extra_day`, `ag_rate`, `ag_extra_rate`, `ag_total`, `ag_extra_total`, `ag_deposited`, `ag_long_dast`, `ag_amount`, `ag_discount_percent`, `ag_discount_amount`, `ag_vat`, `ag_vat_amount`, `ag_amount_aft_d`, `ag_total_net_pay`, `ag_name_owner_sign`, `ag_name_witness`, `ag_name_renter`, `ag_regular_maintenance`, `ag_unlimited_millage`, `ag_repair`, `ag_insurance`, `ag_articles_from`, `ag_articles_to`, `ag_no_driver_from`, `ag_no_driver_to`, `ag_other_from`, `ag_other_to`, `user_id`, `date_created`, `date_updated`, `type_agreement`, `recipt_no`, `pay_for`, `pay_word`, `return_deposit`, `pay_cash_cheque`) VALUES
(1, 'LCRC-201907191561', 15, 7, 9, 1, 0, 0, 1, 1, '2019-07-10', '11:45 AM', '2019-07-18', '10:45 AM', '7', '2', 0.50, 20.00, 200.00, 20.00, 700.00, 344.00, 1200.00, 0.00, 0.00, 10.00, 0.00, 300.00, 1500, 'kemun', 'Torn', 'Meas', 1, 1, 1, 1, '11', '3wr', 'q3e', 'w3r', 'wer', 'wer', 9, '2019-07-24 02:58:30', '2019-07-24', '', NULL, NULL, NULL, NULL, NULL),
(2, 'LCRC-201907244155', 15, 7, 21, 0, 1, 1, 1, 1, '2019-07-03', '13:20PM', '2019-07-12', '10:11AM', '10', '3', 0.50, 20.00, 200.00, 200.00, 700.00, 344.00, 1200.00, 0.00, 0.00, 10.00, 0.00, 300.00, 1500, 'Lyna Master', 'Torn Kemun', 'Yun sivatha', 1, 1, 1, 1, '11th', '3th', '14th', '15th', '3th', '7th', 21, '2019-07-24 03:24:55', '2019-07-24', '', NULL, NULL, NULL, NULL, NULL),
(3, 'LCRC-201907258955', 15, 1, 9, 0, 1, 1, 1, 2, '2019-07-10', '13:20PM', '2019-07-18', '10:11AM', '9', '2', 0.50, 20.00, 200.00, 200.00, 700.00, 344.00, 1200.00, 0.00, 0.00, 10.00, 0.00, 300.00, 1500, 'Lyna Master', 'Torn Kemun', 'Yun sivatha', 2, 1, 1, 1, '', '', '', '', '', '', 72, '2020-01-04 10:34:12', '2020-01-04', '', NULL, NULL, NULL, NULL, NULL),
(4, 'LCRC-201907313990', 19, 1, 9, 0, 1, 1, 1, 1, '2019-07-10', '13:20PM', '2019-07-18', '10:11AM', '7', '2', 45.00, 42.00, 315.00, 84.00, 700.00, 150.00, 549.00, 10.00, 13.50, 10.00, 13.50, 549.00, 1249, 'Lyna Master', 'Torn Kemun', 'Yun sivatha', 1, 1, 1, 1, '11th', '3th', '14th', '15th', '3th', '7th', 72, '2020-01-04 10:34:48', '2020-01-04', '1', 'REC-201908097470', 'sdfsdfdxfd', 'sfdgf', '200', '1'),
(5, 'LCRC-201908168459', 19, 1, 9, 0, 0, 0, 2, 2, '2019-08-10', '0', '2019-08-22', '0', '7', '6', 45.00, 30.00, 315.00, 180.00, 500.00, 1200.00, 1695.00, 2.00, 38.70, 10.00, 13.50, 1830.60, 2331, 'Kemun', 'Vatha', 'Bora', 1, 2, 2, 2, '', '', '', '', '', '', 9, '2019-08-16 07:05:17', '2019-08-16', '1', 'REC-201908169369', 'Kemeee', 'srtryrsy', '400', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_air_port`
--

CREATE TABLE `tbl_air_port` (
  `air_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `pro_from` varchar(255) DEFAULT NULL,
  `pro_to` varchar(255) NOT NULL,
  `one_way` varchar(255) NOT NULL,
  `two_way` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_air_port`
--

INSERT INTO `tbl_air_port` (`air_id`, `car_id`, `vat`, `province_id`, `pro_from`, `pro_to`, `one_way`, `two_way`, `note`, `status`) VALUES
(1, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំ', 'ទួលទំពួង', '110', '170', 'kk', '1'),
(2, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំ', 'ផ្សារថ្មី', '110', '170', 'kk', '1'),
(3, 15, '8', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'វត្តភ្នំ', '110', '170', 'hh', '1'),
(4, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'វាំងស្តេច', '110', '170', 'gg', '1'),
(5, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'សារមន្ទីរជាតិ', '110', '170', 'gg', '1'),
(6, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'ស៊ីសុវត្តិ', '110', '170', 'hh', '1'),
(7, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'សុវណ្ណារ', '110', '170', '', '1'),
(8, 15, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'បូកគោ', '110', '170', '', '1'),
(9, 16, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'ទន្លេបាទី', '110', '170', 'rr', '1'),
(24, 19, '0', 10, 'ឈូក', 'បូកគោ', '17', '19', 'll', '0'),
(25, 19, '0', 19, '(អាកាសយាន្តដ្ឋានភ្នំពេញ', 'វត្តភ្នំ', '110', '170', 'ii', '0'),
(22, 19, '10', 19, 'អាកាសយាន្តដ្ឋានភ្នំ', 'បូកគោ', '77', '80', 'kk', '0'),
(20, 16, '10', 6, 'អាកាសយាន្តដ្ឋានភ្នំពេញ', 'លូ៥', '110', '170', 'hh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_air_port_booking`
--

CREATE TABLE `tbl_air_port_booking` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date DEFAULT NULL,
  `pickup_location` int(11) DEFAULT NULL,
  `drop_off_location` int(11) DEFAULT NULL,
  `date_time_book` varchar(255) DEFAULT NULL,
  `trip_way` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `total_pay` varchar(255) NOT NULL,
  `term_id` varchar(255) NOT NULL,
  `map_pick_up` text NOT NULL,
  `map_return` text NOT NULL,
  `return_location` text NOT NULL,
  `departur_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_air_port_booking`
--

INSERT INTO `tbl_air_port_booking` (`book_id`, `user_id`, `booking_date`, `pickup_location`, `drop_off_location`, `date_time_book`, `trip_way`, `transaction_id`, `total_pay`, `term_id`, `map_pick_up`, `map_return`, `return_location`, `departur_date`) VALUES
(1, 38, '2019-06-19', 1, 2, '01:00', '2', '20190619532567', '192.61', '1', 'kk', 'ss', 'jj', '0000-00-00'),
(2, 38, '2019-06-19', 1, 3, '14:01', '2', '20190619497533', '362.56', '1', 'jkk', 'kk', 'ss', '0000-00-00'),
(4, 5, '2019-07-19', 1, 3, '', '2', '20190719972016', '385.22', '1', 'dfgfdg', 'dfgdg', 'dfgdfg', '2019-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_air_port_book_car`
--

CREATE TABLE `tbl_air_port_book_car` (
  `book_car_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_air_port_book_car`
--

INSERT INTO `tbl_air_port_book_car` (`book_car_id`, `booking_id`, `car_id`, `price`, `discount`, `vat`) VALUES
(1, 1, 15, '170', '0', '10'),
(2, 2, 15, '170', '0', '10'),
(3, 2, 16, '150', '0', '10'),
(7, 4, 19, '170', '0', '0'),
(6, 4, 15, '170', '0', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_job`
--

CREATE TABLE `tbl_app_job` (
  `ap_id` int(11) NOT NULL,
  `ap_user_id` int(11) NOT NULL,
  `ap_job_id` int(11) NOT NULL,
  `date_app` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_app_job`
--

INSERT INTO `tbl_app_job` (`ap_id`, `ap_user_id`, `ap_job_id`, `date_app`) VALUES
(1, 38, 1, '2019-05-31'),
(2, 5, 1, '2019-05-31'),
(3, 5, 2, '2019-05-31'),
(4, 39, 1, '2019-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bonus`
--

CREATE TABLE `tbl_bonus` (
  `id` int(11) NOT NULL,
  `partner_type_id` int(11) DEFAULT NULL,
  `partner_type_description` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `bonus_amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bonus`
--

INSERT INTO `tbl_bonus` (`id`, `partner_type_id`, `partner_type_description`, `amount`, `status`, `bonus_amount`) VALUES
(4, NULL, NULL, 2000, NULL, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_accessory`
--

CREATE TABLE `tbl_book_accessory` (
  `book_acc_id` int(11) NOT NULL,
  `book_infor_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_discount` varchar(255) NOT NULL,
  `acc_vat` varchar(255) NOT NULL,
  `acc_price_order` varchar(255) NOT NULL,
  `acc_book_type` int(11) NOT NULL COMMENT '1=interest',
  `day_daily` varchar(255) NOT NULL,
  `day_extra` varchar(255) NOT NULL,
  `price_daily` varchar(255) NOT NULL,
  `price_extra` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_accessory`
--

INSERT INTO `tbl_book_accessory` (`book_acc_id`, `book_infor_id`, `acc_id`, `acc_discount`, `acc_vat`, `acc_price_order`, `acc_book_type`, `day_daily`, `day_extra`, `price_daily`, `price_extra`) VALUES
(12, 27, 1, '2', '10', '', 3, '7', '2', '20', 15),
(19, 34, 1, '2', '10', '', 5, '7', '2', '20', 15),
(18, 33, 1, '2', '10', '', 5, '7', '2', '20', 15),
(16, 32, 1, '2', '10', '', 2, '7', '2', '20', 15),
(15, 31, 1, '2', '10', '', 2, '7', '2', '20', 15),
(20, 40, 1, '2', '10', '', 3, '7', '2', '20', 15),
(21, 41, 1, '2', '10', '', 1, '7', '2', '20', 15),
(22, 42, 1, '2', '10', '', 1, '7', '2', '20', 15),
(23, 43, 1, '2', '10', '', 1, '7', '2', '20', 15),
(24, 44, 1, '2', '10', '', 1, '7', '2', '20', 15),
(25, 45, 1, '2', '10', '', 2, '7', '2', '20', 15),
(26, 0, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5),
(27, 51, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5),
(28, 52, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5),
(29, 53, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5),
(30, 54, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5),
(31, 55, 2, '10.00', '10.00', '', 2, '365', '18122', '280.5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_car`
--

CREATE TABLE `tbl_book_car` (
  `book_car_id` int(11) NOT NULL,
  `book_infor_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `car_discount` varchar(255) NOT NULL,
  `car_vat` varchar(255) NOT NULL,
  `car_price_order` varchar(255) NOT NULL,
  `car_amount` varchar(255) NOT NULL,
  `car_book_type` int(11) NOT NULL COMMENT '1=interest',
  `extra_day` varchar(255) NOT NULL,
  `daily_day` varchar(255) NOT NULL,
  `price_daily` varchar(255) NOT NULL,
  `price_extra` varchar(255) NOT NULL,
  `price_pickup` varchar(255) NOT NULL,
  `vat_pick_up` varchar(255) NOT NULL,
  `discount_pickup` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_car`
--

INSERT INTO `tbl_book_car` (`book_car_id`, `book_infor_id`, `car_id`, `price`, `car_discount`, `car_vat`, `car_price_order`, `car_amount`, `car_book_type`, `extra_day`, `daily_day`, `price_daily`, `price_extra`, `price_pickup`, `vat_pick_up`, `discount_pickup`) VALUES
(13, 25, 16, '', '2', '10', '489.5', '', 2, '2', '7', '418.803', '108.878', '300', '20', '0'),
(12, 24, 16, '', '2', '10', '489.5', '', 2, '2', '7', '418.803', '108.878', '300', '20', '0'),
(11, 23, 16, '', '2', '10', '489.5', '', 2, '2', '7', '418.803', '108.878', '300', '20', '0'),
(10, 22, 16, '', '2', '10', '489.5', '', 2, '2', '7', '418.803', '108.878', '300', '20', '0'),
(21, 43, 15, '0', '0', '10', '445.75', '0', 1, '2', '7', '50.25', '47', '0', '0', '0'),
(22, 44, 15, '0', '0', '10', '445.75', '0', 1, '2', '7', '50.25', '47', '0', '0', '0'),
(20, 42, 15, '0', '0', '10', '445.75', '0', 1, '2', '7', '386.925', '103.4', '0', '0', '0'),
(19, 41, 15, '0', '0', '10', '445.75', '0', 1, '2', '7', '386.925', '103.4', '0', '0', '0'),
(18, 32, 16, '', '2', '10', '489.5', '', 2, '2', '7', '55.5', '50.5', '0', '0', '0'),
(17, 31, 16, '', '2', '10', '489.5', '', 2, '2', '7', '418.803', '108.878', '150', '0', '0'),
(16, 30, 15, '0', '0', '10', '445.75', '0', 1, '2', '7', '386.925', '103.4', '0', '0', '0'),
(23, 45, 15, '', '0', '10', '445.75', '', 2, '2', '7', '50.25', '47', '0', '0', '0'),
(24, 0, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(25, 49, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(26, 50, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(27, 51, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(28, 52, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(29, 53, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(30, 54, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(31, 55, 16, '', '10.00', '10.00', '3766069.5', '', 2, '18122', '365', '8406.5', '38.5', '0', '0', '0'),
(32, 58, 16, '', '10.00', '10.00', '40.5', '', 2, '', '1', '40.5', 'NAN', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_drive`
--

CREATE TABLE `tbl_book_drive` (
  `b_driver_id` int(11) NOT NULL,
  `b_book_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `b_discount` varchar(255) NOT NULL,
  `b_vat` varchar(255) NOT NULL,
  `driver_type` int(11) NOT NULL COMMENT '1=interest',
  `language_id` int(11) DEFAULT NULL,
  `day_daily` varchar(255) NOT NULL,
  `day_extra` varchar(255) NOT NULL,
  `holiday_number` varchar(255) NOT NULL,
  `price_daily` varchar(255) NOT NULL,
  `price_extra` varchar(255) NOT NULL,
  `price_holiday` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_drive`
--

INSERT INTO `tbl_book_drive` (`b_driver_id`, `b_book_id`, `driver_id`, `b_discount`, `b_vat`, `driver_type`, `language_id`, `day_daily`, `day_extra`, `holiday_number`, `price_daily`, `price_extra`, `price_holiday`) VALUES
(19, 25, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(18, 24, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(16, 22, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(17, 23, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(29, 41, 25, '2', '10', 1, 0, '4', '2', '3', '20', '35', '30'),
(28, 35, 25, '2', '10', 3, 1, '4', '2', '3', '20', '35', '30'),
(27, 34, 25, '2', '10', 5, 0, '4', '2', '3', '20', '35', '30'),
(26, 33, 25, '2', '10', 5, 0, '4', '2', '3', '20', '35', '30'),
(24, 32, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(23, 31, 25, '2', '10', 2, 0, '4', '2', '3', '20', '35', '30'),
(30, 42, 25, '2', '10', 1, 0, '4', '2', '3', '20', '35', '30'),
(31, 43, 25, '2', '10', 1, 0, '4', '2', '3', '20', '35', '30'),
(32, 44, 25, '2', '10', 1, 0, '4', '2', '3', '20', '35', '30'),
(33, 45, 25, '2', '10', 2, 0, '7', '2', '0', '20', '35', 'NAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_info`
--

CREATE TABLE `tbl_book_info` (
  `book_info_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `pickup_time` varchar(255) NOT NULL,
  `return_time` varchar(255) NOT NULL,
  `total_day` varchar(255) NOT NULL,
  `term_id` int(11) NOT NULL,
  `user_book_id` int(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `refund_deposit` varchar(255) NOT NULL,
  `ld_assistant` varchar(255) NOT NULL,
  `amount_web_pay` varchar(255) NOT NULL,
  `transactionId` varchar(255) NOT NULL,
  `book_type_order` int(11) NOT NULL COMMENT '1=interest,2=carent,3=driver',
  `pickup_map` varchar(255) NOT NULL,
  `return_map` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `return_location` int(11) NOT NULL,
  `des_name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_info`
--

INSERT INTO `tbl_book_info` (`book_info_id`, `pickup_date`, `return_date`, `pickup_time`, `return_time`, `total_day`, `term_id`, `user_book_id`, `book_date`, `refund_deposit`, `ld_assistant`, `amount_web_pay`, `transactionId`, `book_type_order`, `pickup_map`, `return_map`, `pickup_location`, `return_location`, `des_name`) VALUES
(52, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073654521915129568', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(51, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073653021529796851', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(50, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '1607365022197971703', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(49, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073648471241809511', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(48, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073647871801464324', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(47, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073647171598265851', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(46, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '0', '16073641601117723324', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '', 7, '                         hii this is text here....                       '),
(53, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073655881176919730', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(54, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073657491234888687', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(55, '2020-08-12', '1970-01-01', '03:10', '10:05', '', 1, 86, '2020-12-08 00:00:00', '', '', '4,027,816.02', '16073659191263217040', 2, 'sdfsdfdsfsfsdfsfs', 'sdfsdfsfdsdfsdfsfsdfs', '1', 7, '                         hii this is text here....                       '),
(56, '2020-12-08', '2020-12-30', '00:12', '00:12', '', 1, 86, '2020-12-08 00:00:00', '', '0', '128.99', '1607432387956494388', 10, '0', '0', '0', 0, 'fdsfsfdsdfsfsd'),
(57, '2020-12-08', '2020-12-30', '00:12', '00:12', '', 1, 86, '2020-12-08 00:00:00', '', '0', '128.99', '1607432464181675799', 10, '0', '0', '0', 0, 'fdsfsfdsdfsfsd'),
(58, '2020-12-15', '2020-12-15', '11:05', '01:10', '', 1, 86, '2020-12-14 00:00:00', '', '', '47.93', '16079216782070577698', 2, 'fsfsdfdffsfsdfsdfdsffsf', 'sfsdfsdfsdfsfsdfsdsdfsdfsdf', '1', 7, '                         hiiii                       ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_province`
--

CREATE TABLE `tbl_book_province` (
  `book_pro_id` int(11) NOT NULL,
  `book_info_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `pro_price` varchar(255) NOT NULL,
  `pro_discount` varchar(255) NOT NULL,
  `pro_vat` varchar(255) NOT NULL,
  `province_type` int(11) NOT NULL COMMENT '1=interest'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_province`
--

INSERT INTO `tbl_book_province` (`book_pro_id`, `book_info_id`, `province_id`, `pro_price`, `pro_discount`, `pro_vat`, `province_type`) VALUES
(1, 30, 5, '200', '0', '10', 1),
(2, 30, 8, '231', '0', '10', 1),
(3, 41, 5, '200', '0', '10', 1),
(4, 41, 8, '231', '0', '10', 1),
(5, 42, 5, '200', '0', '10', 1),
(6, 42, 8, '231', '0', '10', 1),
(7, 43, 5, '200', '0', '10', 1),
(8, 43, 8, '231', '0', '10', 1),
(9, 44, 5, '200', '0', '10', 1),
(10, 44, 8, '231', '0', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_rickshaw`
--

CREATE TABLE `tbl_book_rickshaw` (
  `book_car_id` int(11) NOT NULL,
  `book_infor_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `car_discount` varchar(255) NOT NULL,
  `car_vat` varchar(255) NOT NULL,
  `car_price_order` varchar(255) NOT NULL,
  `car_amount` varchar(255) NOT NULL,
  `car_book_type` int(11) NOT NULL COMMENT '1=interest'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_rickshaw`
--

INSERT INTO `tbl_book_rickshaw` (`book_car_id`, `book_infor_id`, `car_id`, `price`, `car_discount`, `car_vat`, `car_price_order`, `car_amount`, `car_book_type`) VALUES
(1, 30, 1, '20', '0', '10', '20', '198', 1),
(2, 0, 3, '15', '0', '10', '15', '148.5', 5),
(3, 33, 3, '15', '0', '10', '15', '148.5', 5),
(4, 34, 3, '15', '0', '10', '15', '148.5', 5),
(5, 41, 1, '20', '0', '10', '20', '198', 1),
(6, 42, 1, '20', '0', '10', '20', '198', 1),
(7, 43, 1, '20', '0', '10', '20', '198', 1),
(8, 44, 1, '20', '0', '10', '20', '198', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_tour_quide`
--

CREATE TABLE `tbl_book_tour_quide` (
  `tour_id` int(11) NOT NULL,
  `t_book_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `t_discount` varchar(255) NOT NULL,
  `t_vat` varchar(255) NOT NULL,
  `t_type` int(11) NOT NULL COMMENT '1=interest',
  `language_id` int(11) DEFAULT NULL,
  `day_daily` varchar(255) NOT NULL,
  `day_extra` varchar(255) NOT NULL,
  `holiday_number` varchar(255) NOT NULL,
  `price_daily` varchar(255) NOT NULL,
  `price_extra` varchar(255) NOT NULL,
  `price_holiday` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book_tour_quide`
--

INSERT INTO `tbl_book_tour_quide` (`tour_id`, `t_book_id`, `t_id`, `t_discount`, `t_vat`, `t_type`, `language_id`, `day_daily`, `day_extra`, `holiday_number`, `price_daily`, `price_extra`, `price_holiday`) VALUES
(12, 23, 28, '0', '0', 2, 0, '4', '2', '3', '20', '20', '20'),
(11, 22, 28, '0', '0', 2, 0, '4', '2', '3', '20', '20', '20'),
(13, 24, 28, '0', '0', 2, 0, '4', '2', '3', '20', '20', '20'),
(14, 25, 28, '0', '0', 2, 0, '4', '2', '3', '20', '20', '20'),
(15, 28, 33, '0', '10', 4, 1, '7', '0', '0', '20', '', ''),
(23, 36, 33, '0', '10', 4, 1, '4', '2', '3', '20', '30', '25'),
(22, 34, 28, '0', '0', 5, 0, '4', '2', '3', '20', '25', '20'),
(21, 33, 28, '0', '0', 5, 0, '4', '2', '3', '20', '25', '20'),
(20, 0, 28, '0', '0', 5, 0, '4', '2', '3', '20', '25', '20'),
(19, 32, 28, '0', '0', 2, 0, '4', '2', '3', '20', '25', '20'),
(18, 31, 28, '0', '0', 2, 0, '4', '2', '3', '20', '25', '20'),
(24, 37, 33, '0', '10', 4, 1, '4', '2', '3', '20', '30', '25'),
(25, 38, 33, '0', '10', 4, 1, '4', '2', '3', '20', '30', '25'),
(26, 39, 33, '0', '10', 4, 1, '4', '2', '3', '20', '30', '25'),
(27, 41, 28, '0', '0', 1, 0, '4', '2', '3', '20', '25', '20'),
(28, 42, 28, '0', '0', 1, 0, '4', '2', '3', '20', '25', '20'),
(29, 43, 28, '0', '0', 1, 0, '4', '2', '3', '20', '25', '20'),
(30, 44, 28, '0', '0', 1, 0, '4', '2', '3', '20', '25', '20'),
(31, 45, 28, '0', '0', 2, 0, '7', '2', '0', '20', '25', 'NAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buy_package`
--

CREATE TABLE `tbl_buy_package` (
  `buy_package_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_buy_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `try` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_limit` varchar(255) NOT NULL,
  `buy_date` date NOT NULL,
  `date_expired` date DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=trail,2=aba,3=wing'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buy_package`
--

INSERT INTO `tbl_buy_package` (`buy_package_id`, `package_id`, `user_buy_id`, `position_id`, `transaction_id`, `try`, `period`, `price`, `discount`, `description`, `post_limit`, `buy_date`, `date_expired`, `qty`, `status`) VALUES
(3, 9, 36, 1, '20190528544560', '11', '11', '12', '0', '<p>11</p>\r\n', '17', '2019-05-28', '2020-05-27', NULL, 2),
(4, 10, 36, 2, NULL, '22', '22', '22', '10', '<h2>About us</h2>\r\n\r\n<p>East View maintains thousands of supplier/publisher relationships throughout the world for maps and geospatial data and Russian, Arabic and Chinese-produced social and hard science content. East View manages a data center, library and warehouse in Minneapolis where it hosts and stores dozens of foreign language databases, hundreds of thousands of maps and atlases and millions of geospatial, Russian, Chinese and Arabic metadata records. East View was founded in 1989 and is headquartered in Minneapolis, Minnesota, USA. and is comprised of East View Information Services (www.eastview.com), East View Geospatial (www.geospatial.com) and East View Map Link (www.evmaplink.com). Uncommon Information. Extraordinary Places. East View</p>\r\n', '22', '2019-05-28', '2019-06-19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carrental_pickup_price`
--

CREATE TABLE `tbl_carrental_pickup_price` (
  `air_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `pro_from_id` int(11) NOT NULL,
  `pro_to_id` int(11) DEFAULT NULL,
  `carrental_price` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `vat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_carrental_pickup_price`
--

INSERT INTO `tbl_carrental_pickup_price` (`air_id`, `car_id`, `pro_from_id`, `pro_to_id`, `carrental_price`, `note`, `status`, `vat`) VALUES
(1, 16, 6, 6, '120', 'hhh', '1', '0'),
(7, 16, 6, 13, '0', 'ttt', '1', '0'),
(3, 15, 13, 17, '200', 'yy', '1', '0'),
(8, 15, 6, 13, '0', 'yy', '1', '0'),
(9, 15, 19, 19, '0', 'No fee', '1', '0'),
(10, 15, 19, 2, '150', '', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_sale`
--

CREATE TABLE `tbl_car_sale` (
  `car_sale_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `inv_id` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_owner_id` int(11) NOT NULL,
  `name_owner` varchar(255) NOT NULL,
  `name_buyer` varchar(255) NOT NULL,
  `buyer_witness` varchar(255) NOT NULL,
  `seller_witness` varchar(255) NOT NULL,
  `sale_date` date NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_sale`
--

INSERT INTO `tbl_car_sale` (`car_sale_id`, `car_id`, `inv_id`, `customer_id`, `car_owner_id`, `name_owner`, `name_buyer`, `buyer_witness`, `seller_witness`, `sale_date`, `price`) VALUES
(1, 19, 'CS-201908064469', 9, 1, 'kemun', 'Tan Lyna (Mrs)', 'Sreyboeb Chun', 'Meas Savongz (Mr)', '2019-08-06', '15000'),
(2, 15, 'CS-201908093680', 9, 1, 'ftyf', 'ytryt', 'rytry', 'ftytfy', '2019-08-14', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_sales`
--

CREATE TABLE `tbl_car_sales` (
  `cars_id` int(11) NOT NULL,
  `cars_title` varchar(255) NOT NULL,
  `cars_desc` text NOT NULL,
  `cars_detail` text NOT NULL,
  `cars_image` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car_sales`
--

INSERT INTO `tbl_car_sales` (`cars_id`, `cars_title`, `cars_desc`, `cars_detail`, `cars_image`) VALUES
(2, 'Title', 'Description', '<p>Detail</p>\r\n ', '20190308_5048.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cash_voucher`
--

CREATE TABLE `tbl_cash_voucher` (
  `id` int(11) NOT NULL,
  `v_date_record` date NOT NULL,
  `v_amount` varchar(255) NOT NULL,
  `tran_saction` text NOT NULL,
  `v_to` text NOT NULL,
  `the_sum_of` text NOT NULL,
  `app_by` varchar(255) NOT NULL,
  `manager_by` varchar(255) NOT NULL,
  `v_inv_no` varchar(255) NOT NULL,
  `payee` int(11) NOT NULL,
  `v_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cash_voucher`
--

INSERT INTO `tbl_cash_voucher` (`id`, `v_date_record`, `v_amount`, `tran_saction`, `v_to`, `the_sum_of`, `app_by`, `manager_by`, `v_inv_no`, `payee`, `v_note`) VALUES
(1, '2019-09-09', '500', 'Computer', 'Test168', 'Dolla kemun', 'Lyna Tan', 'Savongz', '20190909683493', 40, 'eartsysry'),
(2, '2019-09-11', '500', 'COMPUTER REPAIR & MAINTENANCE', 'ANNANA CONPUTER SHOP', 'COMPUTER REPAIR & MAINTENANCE', 'Lyna Tan', 'Savongz', '20190909725924', 40, 'u76868');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_comment`
--

CREATE TABLE `tbl_contact_comment` (
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_post` date NOT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_comment`
--

INSERT INTO `tbl_contact_comment` (`comment_id`, `name`, `subject`, `email`, `website`, `comment`, `date_post`, `status`, `img`) VALUES
(1, 'kemun', 'Request', 'kemun.dev@gmail.com', 'http://newdayopensource.website', 'Dear Mrs Tan, We already rent a car with you in 2014 and we were happy of this. We wish to rent your Toyota Hilux (2J-4148-PHP-001) with insurance from Dec 9th till Dec 31st. for self driving. My wife is from Cambodia with a permanent K visa and she still has a close family in Phnom Penh and province. I was self-driving everywhere in Cambodia for a total of 7 months since 2000. However I will need a new Cambodian licence (my Belgian driving licence is issued in French). My previous provisional Cambodian driving licence ', '2019-03-11', 0, ''),
(5, 'test168', 'sad', 'kemun.dev@gmail.com', 'http://newdayopensource.website', 'Street No. 430 toward to the Sovanna Shopping Center about 50 meters on the Left Hand Side you will find th', '2019-03-11', 1, ''),
(6, 'kemun', 'test', 'kemun.dev@gmail.com', 'newdayopensource.website', 'hello admin', '2019-04-01', 0, ''),
(7, 'kemun', 'test', 'kemun.dev@gmail.com', 'newdayopensource.website', 'kkkk', '2019-04-08', 1, 'blank.png'),
(8, 'kemun', 'test', 'kemun.dev@gmail.com', 'newdayopensource.website', 'test', '2019-04-08', 1, 'blank.png'),
(9, 'hh', 'test', 'kemun.dev@gmail.com', 'newdayopensource.website', 'kkk', '2019-04-08', 1, '20190408_1176.jpg'),
(10, 'hh', 'test', 'kemun.dev@gmail.com', 'newdayopensource.website', 'kkk', '2019-04-08', 1, '20190408_5869.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_images`
--

CREATE TABLE `tbl_contact_images` (
  `con_id` int(11) NOT NULL,
  `images` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_images`
--

INSERT INTO `tbl_contact_images` (`con_id`, `images`, `status`) VALUES
(1, '20190519_2599.png', 1),
(2, '20190519_7837.png', 1),
(4, '20190519_3851.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_information`
--

CREATE TABLE `tbl_contact_information` (
  `c_id` int(11) NOT NULL,
  `map_url` text NOT NULL,
  `description` mediumtext NOT NULL,
  `description_kh` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_information`
--

INSERT INTO `tbl_contact_information` (`c_id`, `map_url`, `description`, `description_kh`) VALUES
(1, '                                                                                                                  <iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3788.5488306994002!2d104.9221131!3d11.5367737!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109516fc03452fb%3A0x878e35fd599be161!2sBoeung%20Trabek%20Plaza!5e1!3m2!1sen!2skh!4v1568175811217!5m2!1sen!2skh\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>                                                                                                            ', '<h3><strong>Mrs Lyna Tan</strong></h3>\r\n\r\n<p><strong>Streets Guidance!</strong></p>\r\n\r\n<p>Level 1, Room Grace Trading Co., Ltd. Logo<br />\r\nBoeng Trabek Plaza<br />\r\n<br />\r\n<strong>Suggestion Road:</strong><br />\r\n<br />\r\n1. From PTT Gas Station Preah Monivong Blvd. turn left toward Street No. 95 turn right toward Street No. 456 turn left about 50m, you arrival at your destination.<br />\r\n<br />\r\n2. From PTT Gas Station Preah Monivong Blvd. across the Mao Tse Tung&nbsp;Blvd. straight to the South about 1 kilometer turn right on Street No. 456​ about 100m, you will arrive at your destination.<br />\r\n<br />\r\n3. From Russian Market take Mao Tse Tung Blvd. toward to Preah Monivong Blvd. turn right on Street No. 105 about 800 metres turn left on Street 456, you will arrive at your destination.<br />\r\n<br />\r\nClick on this location link:&nbsp;<a href=\"https://maps.app.goo.gl/vYJ7ojSeZXZb47EX7?fbclid=IwAR3nbM1xbMy7RUKZdOmWjQZccHyNAsZG3UD8slnSRCCZoJir7_wiKYpkFBM\" rel=\"nofollow noopener\" target=\"_blank\">https://maps.app.goo.gl/vYJ7ojSeZXZb47EX7</a></p>\r\n\r\n<p>CONTACT ADDRESS</p>\r\n\r\n<p><strong>Address:</strong>&nbsp;<br />\r\nRoom No. 9C2 | 9th Floor H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)<br />\r\nNo. 430 | Street 271 | Tumnop Teuk | Chamcarmon | Phnom Penh | Kingdom of Cambodia</p>\r\n\r\n<ul>\r\n	<li><strong>Phone:</strong>&nbsp;+855 (0) 12 55 42 47</li>\r\n	<li><strong>Phone:</strong>&nbsp;+855 (0)&nbsp;12 924 517</li>\r\n	<li><strong>Phone:&nbsp;</strong>+855 (0)&nbsp;92 14 30 14</li>\r\n	<li><strong>E-mail:</strong>&nbsp;<a href=\"mailto:info@lyna-carrental.com\">info@lyna-carrental.com</a></li>\r\n	<li><strong>Website:</strong>&nbsp;<a href=\"https://www.lyna-carrental.com/\">www.Lyna-CarRental.com</a></li>\r\n</ul>\r\n\r\n<h3><strong>BUSINESS HOURS</strong></h3>\r\n\r\n<table style=\"float:left\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Sales Department</strong></td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mon:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tue:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wed:</td>\r\n			<td>7:50am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thu:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fri:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sat:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Sun</strong>:</td>\r\n			<td><strong>Closed</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"float:right\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Service Department</strong></td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mon:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tue:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wed:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thu:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fri:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sat:</td>\r\n			<td>7:00am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Sun:</strong></td>\r\n			<td><strong>Closed</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<h3><strong>អ្នកស្រី តាន់ លីណា</strong></h3>\r\n\r\n<p><strong>ការណែនាំផ្លូវ!</strong></p>\r\n\r\n<p>ការិយាល័យនៅជាន់ទី១, បន្ទប់មានសញ្ញាឡូហ្គោ Grace Trading Co., Ltd. ជាប់ទ្វារ<br />\r\nផ្សាបឹងត្របែកផ្លាហ្សា<br />\r\n<br />\r\n<strong>ផ្លូវដែលអាចមកដល់ទីតាំង:</strong><br />\r\n<br />\r\n1. ចេញពីហាងសាំង ប៉ថថ មហាវិថីព្រះមុន្នីវង្ស បត់ឆ្វេង លើផ្លូវេលខ ៩៥ បត់ស្តាំ សំដៅទៅផ្លូវលេខ ៤៥៦ និងបត់ឆ្វេង ២០ ម៉ែត្រដល់ទីតាំង។<br />\r\n<br />\r\n2. ចេញពីហាងសាំង ប៉ថថ មហាវិថីព្រះមុន្នីវង្ស&nbsp;ឆ្លងកាត់មហាវិថីម៉ៅសេទុង ត្រង់ទៅត្បូងប្រហែល១គីឡូម៉ែត្រ&nbsp;បត់ស្តាំលើផ្លូវលេខ ៤៥៦ ប្រហែល១០០ម៉ែត្រ អ្នកនឹងមកដល់ទីតាំង។<br />\r\n<br />\r\n3. ចេញពីផ្សាទួលទំពូងលើមហាវិថីម៉ៅសេទុងបត់ស្តាំលើផ្លូវ១០៥ប្រហែល៨០០ម៉ែត្រ និងបត់ឆ្វេងលើផ្លូវលេខ៤៥៦ ប្រហែល៥០ម៉ែត្រ&nbsp;លោកអ្នកនឹងមកដល់ទីតាំង។<br />\r\n<br />\r\nសូមចុចលើតំណភ្ជាប់ទីតាំង ដើម្បីអាចមកដល់ទីតាំងនេះ:&nbsp;<a href=\"https://maps.app.goo.gl/vYJ7ojSeZXZb47EX7?fbclid=IwAR3nbM1xbMy7RUKZdOmWjQZccHyNAsZG3UD8slnSRCCZoJir7_wiKYpkFBM\" rel=\"nofollow noopener\" target=\"_blank\">https://maps.app.goo.gl/vYJ7ojSeZXZb47EX7</a></p>\r\n\r\n<p><strong>អស័យដ្ឋានទំនាក់ទំនង</strong></p>\r\n\r\n<p><strong>អស៧យដ្ឋាន:</strong>&nbsp;<br />\r\n<br />\r\nជាន់ទី១, បន្ទប់ដែលមានស្លាកឡូហ្គោក្រុម&nbsp;Grace Trading Co., Ltd.<br />\r\nផ្សារបឹងត្របែកផ្លាហ្សា<br />\r\nផ្លូវលេខ ៤៥៦<br />\r\nសង្កាត់ បឹងត្របែក | ខ័ណ្ឌ ចំការមន<br />\r\nរាជធានីភ្នំពេញ | ព្រះរាជាណាច័ក្រកម្ពុជា</p>\r\n\r\n<ul>\r\n	<li><strong>Phone:</strong>&nbsp;+855 (0) 12 55 42 47</li>\r\n	<li><strong>Phone:</strong>&nbsp;+855 (0)&nbsp;12 924 517</li>\r\n	<li><strong>Phone:&nbsp;</strong>+855 (0)&nbsp;92 14 30 14</li>\r\n	<li><strong>E-mail:</strong>&nbsp;<a href=\"mailto:info@lyna-carrental.com\">info@lyna-carrental.com</a></li>\r\n	<li><strong>Website:</strong>&nbsp;<a href=\"https://www.lyna-carrental.com/\">www.Lyna-CarRental.com</a></li>\r\n</ul>\r\n\r\n<h3><strong>BUSINESS HOURS</strong></h3>\r\n\r\n<table style=\"float:left\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Sales Department</strong></td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mon:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tue:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wed:</td>\r\n			<td>7:50am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thu:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fri:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sat:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Sun</strong>:</td>\r\n			<td><strong>Closed</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"float:right\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Service Department</strong></td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mon:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tue:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wed:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thu:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fri:</td>\r\n			<td>7:30am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sat:</td>\r\n			<td>7:00am - 5:00pm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Sun:</strong></td>\r\n			<td><strong>Closed</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `cop_no` int(11) NOT NULL,
  `cop_intro` text COLLATE utf8_bin NOT NULL,
  `cop_id_user` int(11) NOT NULL,
  `cop_province` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`cop_no`, `cop_intro`, `cop_id_user`, `cop_province`) VALUES
(420, 'CUS20190304876218', 19, ''),
(421, 'CUS20190304876218', 19, ''),
(422, 'CUS20190304876218', 19, ''),
(423, 'CUS20190304876218', 19, ''),
(424, 'CUS20190304876218', 19, ''),
(425, 'CUS20190304876218', 19, ''),
(426, 'CUS20190304876218', 19, ''),
(427, 'CUS20190304876218', 19, ''),
(428, 'CUS20190304876218', 19, ''),
(429, 'CUS20190304876218', 19, ''),
(430, 'CUS20190304876218', 19, ''),
(431, 'CUS20190304876218', 19, ''),
(432, 'CUS20190304876218', 19, ''),
(433, 'CUS20190304876218', 19, ''),
(434, 'CUS20190304876218', 19, ''),
(435, 'CUS20190304876218', 19, ''),
(436, 'CUS20190304876218', 19, ''),
(437, 'CUS20190304876218', 19, ''),
(438, 'CUS20190304876218', 19, ''),
(439, 'CUS20190304876218', 19, ''),
(440, 'CUS20190304876218', 19, ''),
(441, 'CUS20190304876218', 19, ''),
(442, 'CUS20190304876218', 19, ''),
(443, 'CUS20190304876218', 19, ''),
(444, 'CUS20190304876218', 19, ''),
(445, 'CUS20190304876218', 19, ''),
(446, 'CUS20190304876218', 19, ''),
(447, 'CUS20190304876218', 19, ''),
(448, 'CUS20190304876218', 19, ''),
(449, 'CUS20190304876218', 19, ''),
(450, 'CUS20190304876218', 19, ''),
(451, 'CUS20190304876218', 19, ''),
(452, 'CUS20190304876218', 19, ''),
(453, 'CUS20190304876218', 19, ''),
(454, 'CUS20190304876218', 19, ''),
(455, 'CUS20190304876218', 19, ''),
(456, 'CUS20190304876218', 19, ''),
(457, 'CUS20190304876218', 19, ''),
(458, 'CUS20190304876218', 19, ''),
(459, 'CUS20190304876218', 19, ''),
(460, 'CUS20190304876218', 19, ''),
(461, 'CUS20190304876218', 19, ''),
(462, 'CUS20190304876218', 19, ''),
(463, 'CUS20190304876218', 19, ''),
(464, 'CUS20190304876218', 19, ''),
(465, 'CUS20190304876218', 19, ''),
(466, 'CUS20190304876218', 19, ''),
(467, 'CUS20190304876218', 19, ''),
(468, 'CUS20190304876218', 19, ''),
(469, 'CUS20190304876218', 19, ''),
(470, 'CUS20190304876218', 19, ''),
(471, 'CUS20190304876218', 19, ''),
(472, 'CUS20190304876218', 19, ''),
(473, 'CUS20190304876218', 19, ''),
(474, 'CUS20190304876218', 19, ''),
(475, 'CUS20190304876218', 19, ''),
(476, 'CUS20190304876218', 19, ''),
(477, 'CUS20190304876218', 19, ''),
(478, 'CUS20190304876218', 19, ''),
(479, 'CUS20190304876218', 19, ''),
(480, 'CUS20190304876218', 19, ''),
(481, 'CUS20190304876218', 19, ''),
(482, 'CUS20190304876218', 19, ''),
(483, 'CUS20190304876218', 19, ''),
(484, 'CUS20190304876218', 19, ''),
(485, 'CUS20190304876218', 19, ''),
(486, 'CUS20190304876218', 19, ''),
(487, 'CUS20190304876218', 19, ''),
(488, 'CUS20190304876218', 19, ''),
(489, 'CUS20190304876218', 19, ''),
(490, 'CUS20190304876218', 19, ''),
(491, 'CUS20190304876218', 19, ''),
(492, 'CUS20190304876218', 19, ''),
(493, 'CUS20190304876218', 19, ''),
(494, 'CUS20190304876218', 19, ''),
(495, 'CUS20190304876218', 19, ''),
(496, 'CUS20190304876218', 19, ''),
(497, 'CUS20190304876218', 19, ''),
(498, 'CUS20190304876218', 19, ''),
(499, 'CUS20190304876218', 19, ''),
(500, 'CUS20190304876218', 19, ''),
(501, 'CUS20190304876218', 19, ''),
(502, 'CUS20190304876218', 19, ''),
(503, 'CUS20190304876218', 19, ''),
(504, 'CUS20190304876218', 19, ''),
(505, 'CUS20190304876218', 19, ''),
(506, 'CUS20190304876218', 19, ''),
(507, 'CUS20190304876218', 19, ''),
(508, 'CUS20190304876218', 19, ''),
(509, 'CUS20190304876218', 19, ''),
(510, 'CUS20190304876218', 19, ''),
(511, 'CUS20190304876218', 19, ''),
(512, 'CUS20190304876218', 19, ''),
(513, 'CUS20190304876218', 19, ''),
(514, 'CUS20190304876218', 19, ''),
(515, 'CUS20190304876218', 19, ''),
(516, 'CUS20190304876218', 19, ''),
(517, 'CUS20190304876218', 19, ''),
(518, 'CUS20190304876218', 19, ''),
(519, 'CUS20190304876218', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_date_record` char(255) NOT NULL,
  `cus_customer` text NOT NULL,
  `cus_position` int(11) NOT NULL,
  `cus_organization` char(255) NOT NULL,
  `cus_address` char(255) NOT NULL,
  `cus_phone_number` char(255) NOT NULL,
  `cus_email_address` char(255) NOT NULL,
  `cus_reference` char(255) NOT NULL,
  `cus_note` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_date_record`, `cus_customer`, `cus_position`, `cus_organization`, `cus_address`, `cus_phone_number`, `cus_email_address`, `cus_reference`, `cus_note`, `user_id`, `date_created`, `date_updated`) VALUES
(1, '123', 'Vanda', 1, 'test', 'test', 'test', 'test', 'test', 'test', 1, '2019-02-19 17:10:00', '2019-02-23'),
(2, '123', 'Vanda', 1, 'test', 'test', 'test', 'test', 'test', 'test', 1, '2019-02-19 17:10:00', '2019-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_position`
--

CREATE TABLE `tbl_customer_position` (
  `cpos_id` int(11) NOT NULL,
  `cpos_name` char(255) NOT NULL,
  `cpos_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_position`
--

INSERT INTO `tbl_customer_position` (`cpos_id`, `cpos_name`, `cpos_note`) VALUES
(1, 'Admin', 'test'),
(2, 'customer', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_provide`
--

CREATE TABLE `tbl_customer_provide` (
  `cpr_id` int(11) NOT NULL,
  `cpr_name` char(255) NOT NULL,
  `cpr_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_provide`
--

INSERT INTO `tbl_customer_provide` (`cpr_id`, `cpr_name`, `cpr_note`) VALUES
(1, 'Original Passport', '<p><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Original Passport</span></span></p>\r\n'),
(2, 'Original ID Card', '<p><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Original ID Card</span></span></p>\r\n'),
(3, 'Residential Book', '<p><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;\">Residential Book</span></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cus_letter`
--

CREATE TABLE `tbl_cus_letter` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `in_date` date NOT NULL,
  `out_date` date NOT NULL,
  `action_by` varchar(200) NOT NULL,
  `status_remarks` text NOT NULL,
  `type` varchar(1) NOT NULL COMMENT '1=thank you letter, 2=list income & outcome'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cus_letter`
--

INSERT INTO `tbl_cus_letter` (`id`, `cus_name`, `email_address`, `subject`, `in_date`, `out_date`, `action_by`, `status_remarks`, `type`) VALUES
(1, 'kuy piseth', 'piseth121235@gmail.com', 'thank you letter', '2019-08-01', '2019-08-03', '37', 'អរគុណ', '1'),
(2, 'kemun Torn', 'kemuntorn@yahoo.con', 'income', '2019-08-03', '2019-08-04', '41', 'ប្រាក់ចំណូល', '2'),
(3, 'kuy piseth2', 'piseth121235@gmail.com', 'income', '2019-08-01', '2019-08-16', '22', 'អរគុណ', '2'),
(6, 'kuy piseth', 'piseth121235@gmail.com', 'fewfwfewe', '2019-08-01', '2019-08-20', '41', 'wefwefweew', '1'),
(7, 'kuy piseth', 'piseth121235@gmail.com', 'ewfw', '2019-08-21', '2019-08-13', '41', 'ប្រាក់ចំណូលនិងចំណាយ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv_education`
--

CREATE TABLE `tbl_cv_education` (
  `education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `from_cv` varchar(255) NOT NULL,
  `to_cv` varchar(255) NOT NULL,
  `school_university` varchar(255) NOT NULL,
  `study_field` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cv_education`
--

INSERT INTO `tbl_cv_education` (`education_id`, `user_id`, `qualification`, `from_cv`, `to_cv`, `school_university`, `study_field`, `description`) VALUES
(1, 39, '3', '2019-05-14', '2019-05-08', 'pri', 'cc', '          test          '),
(7, 39, '4', '2019-05-07', '2019-05-14', 'ass', 'acc', '                    ttt'),
(8, 39, '6', '2019-05-29', '2019-05-01', 'mas', 'mas', '                    mas'),
(11, 100, '1', '', '', '', '', '                    ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv_information`
--

CREATE TABLE `tbl_cv_information` (
  `info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cv_title` varchar(255) NOT NULL,
  `hight_qualification` varchar(255) NOT NULL,
  `last_career_level` varchar(255) NOT NULL,
  `year_exper` varchar(255) NOT NULL,
  `last_job_function` varchar(255) NOT NULL,
  `last_salary` varchar(255) NOT NULL,
  `last_position` varchar(255) NOT NULL,
  `last_industry` varchar(255) NOT NULL,
  `per_industry` varchar(255) NOT NULL,
  `per_location` varchar(255) NOT NULL,
  `per_function` varchar(255) NOT NULL,
  `per_position` varchar(255) NOT NULL,
  `expect_salary` varchar(255) NOT NULL,
  `term_of_work` varchar(255) NOT NULL,
  `available_work` varchar(255) NOT NULL,
  `language` mediumtext NOT NULL,
  `work_exper` mediumtext NOT NULL,
  `other_training` mediumtext NOT NULL,
  `hobby` mediumtext NOT NULL,
  `refer` mediumtext NOT NULL,
  `certificate` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cv_information`
--

INSERT INTO `tbl_cv_information` (`info_id`, `user_id`, `cv_title`, `hight_qualification`, `last_career_level`, `year_exper`, `last_job_function`, `last_salary`, `last_position`, `last_industry`, `per_industry`, `per_location`, `per_function`, `per_position`, `expect_salary`, `term_of_work`, `available_work`, `language`, `work_exper`, `other_training`, `hobby`, `refer`, `certificate`) VALUES
(1, 39, 'Web Developer', '2', 'Leader Team', '5', 'Information Technology', '600', 'Leader Team', 'Information Technology', 'Programming', 'Phnom Penh', 'Prefered Function', 'Web Developer', '800', 'Full-Time', '3', '<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Khmer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Native </span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Writing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span><span style=\"color:black\">Medium</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Spoken&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span><span style=\"color:black\">Medium</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Listening &nbsp; : </span><span style=\"color:black\">Medium</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Reading.&nbsp;&nbsp;&nbsp; : </span><span style=\"color:black\">Medium</span></span></li>\r\n</ul>\r\n', '<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">2013&nbsp; :Training at(</span>Cambodia-India Entrepreneurship Development Institute<span style=\"font-size:14.0pt\">)</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">2014-2015&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <span style=\"font-size:12.0pt\">Web Developer and Design at(IDG)</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">2015-2017&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span><span style=\"font-size:12.0pt\">Web Developer at(KW and IIS)</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">2017-2018&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span style=\"font-size:12.0pt\"> Web Developer BackEnd and Front End at(Augeo)</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">08/2018-Now&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span><span style=\"font-size:12.0pt\">Web Developer at(New Day)</span></span></li>\r\n</ul>\r\n', '<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Computer</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:10pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Design&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Adobe Photoshop CS6, CorelDraw</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Program&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Java Programming,ASP.net, C++,C#</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Database&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Access, SQL server 2008,DBMS, Analaysis and Design,</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Microsoft Project, Navicate, SQLite, SQL</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Application Software&nbsp; &nbsp; &nbsp; &nbsp;: Microsoft word, Excel, PowerPoint,Git,Source Tree</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Web Design&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HTML,CSS, CSS3,Dreamweaver,Boostrap,JavaScript</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Web Developer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Framework,MVC ,Codeigniter,Json,Sqlite,Scraping,Opencart, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; , PHP and MySQL,Word Press,Ajax ,Jquery,TextCrawler,</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Html Dom Parser</span></span></p>\r\n', '<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Social&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Finding, about people need, explaining people took now the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Communication, information, economic and technology service.</span></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Sport&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Playing Tennis, Football, and volleyball and go jogging.</span></span></li>\r\n</ul>\r\n', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"color:black\"><strong><span style=\"font-size:14.0pt\">Mr. Bou Chhun: Deputy Head of Database </span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"color:black\"><strong><span style=\"font-size:11.5pt\">Administration </span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"color:black\"><strong><span style=\"font-size:11.5pt\">Cisco Instructor </span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"color:black\"><strong><span style=\"font-size:11.5pt\">E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size:14.0pt\">bouchhun@aeu.edu.kh </span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:10pt\"><span style=\"font-size:11.5pt\">Tell: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(855)89 780 615, (855)16 333 188</span></span></p>\r\n', '<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate Academic Award for having successfully obtained number 1</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate Academic Award for having successfully obtained number 1</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate Academic Award for having successfully obtained number 1</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate Academic Award for having successfully obtained number 1</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate ScholarShip Award for having successfully obtained number 1</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate of Computer Course C# Programming I </span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate of Computer Course C# Advanced</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate of Computer Course JavaScript</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate of Course Completion Discovery 1</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Certificate of </span><span style=\"font-size:11.0pt\">Cambodia-India Entrepreneurship Development </span><span style=\"font-size:11.0pt\">Institute</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11.0pt\">Recommendation Letter (</span><span style=\"font-size:11.0pt\">Cambodia-India Entrepreneurship Development </span><span style=\"font-size:11.0pt\">Institute</span></p>\r\n'),
(3, 100, 'My Resume', '1', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_duties`
--

CREATE TABLE `tbl_daily_duties` (
  `id` int(11) NOT NULL,
  `opt_checked` varchar(200) NOT NULL,
  `remark` varchar(220) NOT NULL,
  `date_re` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_daily_duties`
--

INSERT INTO `tbl_daily_duties` (`id`, `opt_checked`, `remark`, `date_re`) VALUES
(29, '1.1,1.33,1.11,1.13,2.1,2.11,2.12,2.13,2.14', '', '2019-09-09'),
(30, '1.1,1.2,1.3', '', '2019-09-08'),
(31, '1.7,2.4,2.6,2.7', '', '2019-09-10'),
(33, '2.7,2.8', '', '2019-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_input_coupon`
--

CREATE TABLE `tbl_data_input_coupon` (
  `tdc_id` int(11) NOT NULL,
  `tdc_image` text NOT NULL,
  `tdc_description` text NOT NULL,
  `tdc_title` char(50) NOT NULL,
  `tdc_price` float NOT NULL,
  `tdc_vihicle` text NOT NULL,
  `tdc_note` text CHARACTER SET ucs2 NOT NULL,
  `tdc_sys_type` int(11) NOT NULL COMMENT '1=silver,2=platinum,3=gold,4=diamond'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_data_input_coupon`
--

INSERT INTO `tbl_data_input_coupon` (`tdc_id`, `tdc_image`, `tdc_description`, `tdc_title`, `tdc_price`, `tdc_vihicle`, `tdc_note`, `tdc_sys_type`) VALUES
(14, '20190502_1455.PNG', '1', '1', 1, '1', '1', 0),
(15, '20190502_6125.PNG', '2', '2', 2, '2', '2', 0),
(16, '20190502_8279.PNG', '3', '3', 3, '3', '3', 0),
(20, '20190503_1438.png', 'dfgfdg', 'dgfd', 0, 'dfgdf', 'dfgdf', 0),
(21, '20190506_2118.PNG', '1 to 5 cars', 'Car Owner', 100, '', 'for 1 year', 0),
(22, '20190507_8978.PNG', 't', 't', 0, 't', 't', 0),
(23, '20190508_2872.PNG', '1', '1', 1, '1', '1', 0),
(24, '20190508_7447.PNG', '123', '123', 123, '123', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination_list`
--

CREATE TABLE `tbl_destination_list` (
  `des_id` int(11) NOT NULL,
  `des_destination` text COLLATE utf8_bin NOT NULL,
  `des_note` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver_rent`
--

CREATE TABLE `tbl_driver_rent` (
  `dr_id` int(11) NOT NULL,
  `dr_discount` int(11) NOT NULL,
  `dr_vat` int(11) NOT NULL,
  `dr_price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_driver_rent`
--

INSERT INTO `tbl_driver_rent` (`dr_id`, `dr_discount`, `dr_vat`, `dr_price`) VALUES
(1, 2, 10, '30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_promotion`
--

CREATE TABLE `tbl_event_promotion` (
  `e_pro_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_kh` varchar(255) NOT NULL,
  `event_type` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `description_kh` text NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `event_time` varchar(50) NOT NULL,
  `event_ticket` int(11) NOT NULL,
  `event_location` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event_promotion`
--

INSERT INTO `tbl_event_promotion` (`e_pro_id`, `title`, `title_kh`, `event_type`, `images`, `description`, `description_kh`, `event_date`, `event_time`, `event_ticket`, `event_location`) VALUES
(19, 'Become an Introducer', 'ចុះឈ្មោះជាអ្នកណែនាំអតិថិជន        ', 1, '151615990271.png', '', '', '10/10/2022', '7:30 AM', 100, 'Inter-Continental Hotel, Ball Room'),
(21, 'Become a Tour Guide', 'ចុះឈ្មោះជាអ្នកមគុទេសទេសចរណរណ៍    ', 1, '701615990225.png', '', '', '04/17/2021', '8:30AM', 250, 'Inter-Continental Hotel, Queen Room'),
(29, 'Become an Introducer', 'ចុះឈ្មោះជាអ្នកណែនាំអតិថិជន ', 1, '411616003748.png', '', '', '05/01/2021', '9:00', 250, 'Inter-Continental Hotel, Queen Room, Phnom Penh, Cambodia'),
(32, 'sfsdf', 'sfsdf', 1, '821616004536.png', '<p>sfsfsfd</p>\r\n', '<p>sfsfsdf</p>\r\n', '03/31/2021', 'sfdsfsf', 12, 'sdfsfsaf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_promotion_img`
--

CREATE TABLE `tbl_event_promotion_img` (
  `img_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event_promotion_img`
--

INSERT INTO `tbl_event_promotion_img` (`img_id`, `event_id`, `img_sub`) VALUES
(1, 1, '../image/vehicle_rental//1565877768-1559284855-9. 2AB - 5151-PHP-005.jpg'),
(2, 1, '../image/vehicle_rental//1565877786-1559284859-2. 2AB - 5151-PHP-005.jpg'),
(3, 1, '../image/vehicle_rental//1565877787-1559285762-7. 2AB-5151-PHP-005.jpg'),
(4, 1, '../image/vehicle_rental//1565877789-1559285767-2. 2AB - 5151-PHP-005.jpg'),
(5, 1, '../image/vehicle_rental//1608830228-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_category`
--

CREATE TABLE `tbl_expense_category` (
  `exca_id` int(11) NOT NULL,
  `exca_name` varchar(255) NOT NULL,
  `exca_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_category`
--

INSERT INTO `tbl_expense_category` (`exca_id`, `exca_name`, `exca_note`) VALUES
(2, 'ថ្លៃជួលរថយន្ត', 'Vehicle Rental'),
(4, 'ថ្លៃជួលអ្នកបើកបររថយន្ត', 'Driver Rental'),
(5, 'ថ្លៃជួលមគ្គុទេសទេសចរណ៌', 'Tour Guide Rental'),
(6, 'ថ្លៃធ្វើឈៀករថយន្ត', 'Vehicle Motor Technical Inspection'),
(7, 'ថ្លៃទិញពន្ធផ្លូវរថយន្តប្រចាំឆ្នាំ', 'Annual Road Tax'),
(8, 'ថ្លៃផ្ទេរកម្មសិទ្ធរថយន្ត', 'Vehicle Ownership Transfer'),
(9, 'ថ្លៃចំណាយការធ្វើប្រត្តិបត្តិការទេសចរណ៍ក្នុងក្រុង', 'City Tour'),
(10, 'ថ្លៃលាង និងជួសជុលម៉ាស៊ីនត្រជាក់រថយន្ត', 'AC System Servicing'),
(11, 'ថ្លៃបាញ់ថ្នាំរថយន្ត', 'Car Painting'),
(12, 'ថ្លៃធ្វើប័ណ្ណការងារជនបរទេស', 'Work Permit'),
(13, 'ថ្លៃចំណាយបន្តទិដ្ឋាការជនបរទេស', 'Visa Extension'),
(14, 'ថ្លៃជួសជុល និងថែទាំរថយន្ត', 'Automotive Repair and Maintenance'),
(15, 'ថ្លៃលក់គ្រឿងបន្លាស់រថយន្ត', 'Automotive Spare Parts'),
(16, 'ថ្លៃជួលការិយាល័យប្រចាំខែ', 'Office Space Rental'),
(17, 'ថ្លៃជួលចំណតរថយន្ត', 'Car Parking Fee Monthly'),
(18, 'ថ្លៃចំណាយផ្សេងៗ', 'Sundries');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_list`
--

CREATE TABLE `tbl_expense_list` (
  `exp_id` int(11) NOT NULL,
  `exp_date_record` date NOT NULL,
  `exp_description` varchar(255) NOT NULL,
  `exp_expense_category` int(11) NOT NULL,
  `exp_amount` float NOT NULL,
  `exp_employee` int(11) NOT NULL,
  `exp_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_list`
--

INSERT INTO `tbl_expense_list` (`exp_id`, `exp_date_record`, `exp_description`, `exp_expense_category`, `exp_amount`, `exp_employee`, `exp_note`) VALUES
(2, '2019-09-04', '2AB-5151-PHP-001', 2, 100, 40, 'hkjhkjjhkhk jk jk hk'),
(3, '2019-09-11', '2AC-9989-PHP-009', 2, 50, 40, 'hshdkhfkj hjk hk jk'),
(4, '2019-09-12', '2AD-0998-PHP-002', 2, 25, 40, 'jhshdkj hjk hj kj'),
(5, '2019-09-20', 'test by kemun cey', 4, 150, 40, 'adaaewer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expen_request`
--

CREATE TABLE `tbl_expen_request` (
  `id` int(11) NOT NULL,
  `em_id` int(11) NOT NULL,
  `inv_no` text,
  `date_record` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `ex_category` int(11) NOT NULL,
  `ex_qty` varchar(255) NOT NULL,
  `ex_price` varchar(255) NOT NULL,
  `ex_amount` varchar(255) NOT NULL,
  `ex_note` text NOT NULL,
  `pcv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expen_request`
--

INSERT INTO `tbl_expen_request` (`id`, `em_id`, `inv_no`, `date_record`, `description`, `ex_category`, `ex_qty`, `ex_price`, `ex_amount`, `ex_note`, `pcv`) VALUES
(1, 40, '20190907896272', '2019-08-07', 'gdg', 2, '2', '15', '30', 'rteyt', ''),
(2, 40, '20190907686269', '2019-09-12', 'gdg', 2, '2', '20', '40', '                            ertraey                             ', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `fa_id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL,
  `order_rate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `question_kh` text NOT NULL,
  `answer_kh` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`fa_id`, `question`, `answer`, `order_rate`, `status`, `f_name`, `f_email`, `question_kh`, `answer_kh`) VALUES
(1, 'Are there any other options for me to rent your car if I don’t want to leave my passport at your office?                                                                                                                                                                                                                        ', 'There is another option. If you would not like to deposit your passport you are required to pay an extra the refundable deposit with the amount ranging between $2,000. and $2,500.00.                                                                                                                                                                                                                        ', '2', 1, '', '', 'តើមានជំរើសផ្សេងទៀតក្នុងការជួលរថយន្តដោយមិនចាំបាច់កក់លិខិតឆ្លងដែនទុកដែរទេ?                                                                                                                                                                                                                        ', 'មានជំរើសមួយផ្សេងទៀត ប្រសិនបើលោកអ្នកមិនចង់កក់លិខិតឆ្លងដែនទុកនោះទេ គេតម្រូវឲ្យលោកអ្នក បង់ប្រាកក់បន្ថែមក្នុងចន្លោះតម្លៃពី២,០០០.00 ដុល្លាសហរដ្ឋអាមេរិក ទៅ ២,៥០០.00 ដុល្លាសហរដ្ឋអាមេរិក ហើយប្រាក់កក់នោះលោកអ្នកអាចដកវិញបាន។                                                                                                                                                                                                                        '),
(2, 'Can I rent a car for a self-drive without leaving my original passport?                                                                                                                                                                                    ', 'Yeah, you can do that, but you will be requested to pay an additional refundable deposit with the amount ranging between $2,000. and $2,500.00.                                                                                                                                                                                    ', '3', 1, '', '', 'តើខ្ញុំអាចអាចជួលរថយន្តដើម្បីបើកបរខ្លួនឯងដោយមិនចាំបាច់ទុកលិខិតឆ្លងដែនច្បាប់ដើមនៅកន្លែងលោកអ្នកបានដែរឬទេ?                                                                                                                                                                                    ', 'លោកអ្នកអាចធ្វើដូច្នេះបាន ប៉ុន្តែត្រូវបង់ប្រាក់កក់បន្ថែម ក្នុងចន្លោះរវាង $2.000.00 ទៅ $25,000.00 ដុល្លាសហរដ្ឋអាមេរិក។                                                                                                                                                                                    '),
(4, 'How shall I deal with local authorities or police when they check for my original passport during the trip around Cambodia?', 'While travelling around Cambodia, the passport won’t be legally required by the police or local authorities except when crossing the border. The foreigner’s passport will never be used for any other purposes in Cambodia, except the rent of motorbike or car for a self-drive. So when the passport is asked to show, you shall not show them the original one, or else it won’t be returned to you until you give them a certain amount of money according to their demand.', '4', 1, 'kemun', 'kem@gmail.com', 'តើខ្ញុំត្រូវដោះស្រាយយ៉ាងណាជាមួយអាជ្ញាធរមូលដ្ឋានពេលពួកគេធ្វើការត្រួតពិនិត្យរកលិខិតឆ្លងដែនច្បាប់ដើមក្នុងខណៈដែលខ្ញុំកំពុងធ្វើដំណើរនៅក្នុងប្រទេសកម្ពុជា?                                                                                                            ', 'ក្នុងអំឡុងពេលធ្វើដំណើរនៅក្នុងប្រទេសកម្ពុជា អាជ្ញាធរមិនមានសិទ្ធិទាមទាររកលិខិតឆ្លងដែនទេ លើកលែងតែនៅតាមទល់ដែន។  នៅកម្ពុជា លិខិតឆ្លងដែនរបស់ជនបរទេសគេមិនដែលប្រើក្នុងកោលបំណងផ្សេងក្រៅពីជួលរថយន្តឬម៉ូតូដើម្បីបើកបរខ្លួនឯងឡើយ។ អាស្រ័យហេតុនេះ នៅពេលដែលពួកគេសួររកលិខិតឆ្លងដែន សូមកុំបង្ហាញដល់ពួកគេឲ្យសោះ បើពុំដូច្នោះទេលោកអ្នកមិនអាចយកមកវិញបានទេ ទាល់តែលោកអ្នកឲ្យលុយគេទៅតាមចំនួនដែលគេទាមទារ។                                                                                                            '),
(7, 'Is it safe or secured to leave my passport in your office?                                    ', 'Keeping the passport with us is safer, because it will be locked in a safe and key.                                    ', '7', 1, '', '', 'តើទុកលិខិតឆ្លងដែននៅកន្លែងធ្វើការលោកអ្នកតើមានសុវត្ថិភាពដែរឬទេ?                                    ', 'ទុកលិខិតឆ្លងដែននៅជាមួយយើងខ្ញុំមានសុវត្ថភាពជាង ដោយសារឯកសារនេះនឹងត្រូវចាក់សោរទុកនៅនឹងមួយកន្លែងដ៏មានសុវត្ថភាព។                                    '),
(5, 'Does Lyna-CarRental.Com also have its branch offices in other provinces/cities?', 'Presently we don’t have any branch office in any province/city yet.', '5', 1, 'kemun', 'kem@gmail.com', 'តើលីណា-ជួលរថយន្តទេសចរណ៍មានទីស្នាក់ការសាខានៅតាមបណ្តាខេត្តក្រុងដែរឬទេ?                                                             ', 'បច្ចុប្បន្ននេះយើងខ្ញុំមិនទាន់មានទីស្នាក់ការសាខានៅតាមបណ្តាខេត្ត-ក្រុងនៅឡើយទេ។                                    '),
(11, '                                        If you don’t have such provincial branch offices how can I hire your car in the distance?                                     ', '                                        Although no branch office is available in each of the other provinces, we can also deliver the rented car to the place you need. The fee rate of the car delivering and that of car collecting back are the same namely it depends on the distance in Kilometer from Phnom Penh to the destination. For detail: \r\ni) If the distance is between 1 km to 300 Km the fee is $150; \r\nii) If the distance is between 301 km to 600 Km the fee is $250. \r\nPlease note that the car rental fee is charged separately.                                    ', '11', 1, '', '', '                                        ប្រសិនបើលោក ឬអ្នកស្រីពុំមានការិយាល័យសាខានៅតាមបណ្តាខេត្ត តើខ្ញុំត្រូវធ្វើដូចម្តេចទើបអាចជួលរថយន្តរបស់លោកឬលោកស្រីបាន?                                    ', '                                        ពិតមែនតែពួកយើងគ្មានការិយាល័យសាខានៅតាមបណ្តាខេត្តក៏ដោយពួកយើងក៏អាចយករថយន្តជួលនោះទៅជូនលោកអ្នកដល់កន្លែងដែលលោកអ្នកត្រូវការបានដែរ។ អត្រាថ្លៃឈ្នួលយករថយន្តជូនដល់ដល់កន្លែងនិងអត្រាថ្លៃឈ្នួលទៅទទួលរថយន្តវិញដល់កន្លែងគឺស្មើគ្នា  គឺថាតម្លៃនេះគិតតាមចម្ងាយផ្លូវពីភ្នំពេញដល់កន្លែងដែលត្រូវទៅ។ និយាយឲ្យបានលំអិតជាងនេះគឺ \r\n១) ក្នុងចម្ងាយផ្លូវពី១គម ដល់៣០០គម ថ្លៃឈ្នួលគឺ ១៥០ដុល្លា \r\n២)ក្នុងចម្ងាយផ្លូវពី៣០១គម ដល់៦០០គម ថ្លៃឈ្នួលគឺ ២៥០ដុល្លា។ \r\nសូមជំរាបជូនថា ថ្លៃជួលរថយន្តគិតផ្សេង។                                    '),
(6, 'Can you tell me your clear reason why I am required to leave my passport here when renting a car for a self-drive?                                    ', 'Because most of our cars are under the policies of the insurance company that requires keeping the foreign driver’s passport based on which your personal insurance coverage will be applied when the rented car get an accident.                                    ', '6', 1, '', '', 'តើលោកអាចអាចបង្ហាញហេតុផលច្បាស់លាស់ឲ្យខ្ញុំបានដឹងផងបានទេថាតើហេតុអ្វីបានជាត្រូវទុកលិខិតឆ្លងដែននៅទីនេះក្នុងការជួលរថយន្ត?                                     ', 'ពីព្រោះរថយន្តរបស់យើងភាគ ច្រើន ស្ថិនៅក្រោមឥទ្ធិពលនៃគោលការណ៍របស់ក្រុមហ៊ុនធានារ៉ាប់រង ដែលតម្រូវឲ្យអ្នកបើកបរបរទេសកក់លិខិតឆ្លងដែនច្បាប់ដើម ដើម្បីជាមូលដ្ឋានសំរាប់សំណងបុគ្គលក្នុងករណីមានគ្រោះថ្នាក់ចរាចរ។                                    '),
(8, '                                                                                How many options of car rental service that I can choose?                                                                        ', '                                                                                There are three options of car rental service that you can choose:\r\nOption 1: Self-drive - Leaving your passport + a refundable deposit payment of between $500 and $1,000.\r\nOption 2: With driver - Without leaving your passport but you will be requested to some refundable deposit between $300 to $500.\r\nOption 3: Without leaving your passport - Just paying a more cost of refundable deposit between $2500 and $3,500.                                          ', '8', 1, '', '', '                                                                                តើសេវាជួលរថយន្តមានប៉ុន្មានប្រភេទដែលខ្ញុំអាចជ្រើសយកបាន?                                                                        ', '                                                                                មានសេវាជួលរថយន្ត៣យ៉ាងដែលលោកអ្នកអាចជ្រើសយកគឺ៖\r\nជំរើសទី១៖ ក្នុងករណីបើកបរដោយខ្លួនឯង ដម្កល់ទុកលិខិតឆ្លងដែននៅកន្លែងយើង រួចបង់ប្រាក់កក់ចំនួនពី៥០០ដុល្លាដល់១០០០ដុល្លា\r\nជំរើសទី២៖ ករណីមានអ្នកបើកបរ។  មិនចាំបាច់ដម្កល់ទុកលិខិតឆ្លងដែនទេ ប៉ុន្តែលោកអ្នកចាំបាច់ត្រូវបង់ប្រាក់កក់ ពី៣០០ដុល្លាដល់ ៥០០ដុល្លា។ \r\nជំរើសទី៣៖ មិនចាំបាច់ដម្កល់លិខិតឆ្លងដែនទេ គឺគ្រាន់តែបង់ប្រាក់កក់ឲ្យច្រើនជាងធម្មតា ក្នុងតម្លៃពី២៥០០ដុល្លា ទៅ៣៥០០ដុល្លាប៉ុណ្ណោះ។\r\n                                                                        '),
(9, 'As we will need our passports for hotel check-in, how is it possible for us to leave a copy one with you?                                                                        ', 'The hotel check-in requires only a copy of the passport, not the original one. \r\n\r\nMost of our cars are bound with the insurance company agreement based on which any the foreign driver are required to deposit the passport.                                                                        ', '3', 1, '', '', 'ត្រូវការលិខិតឆ្លងដែនសម្រាប់ចូលស្នាក់នៅក្នុងសណ្ឋាគារ  តើខ្ញុំត្រូវទុកលិខិតឆ្លងដែននៅកន្លែងលោកអ្នកដូចម្តេចកើត?                                                                        ', 'ការចូលស្នាក់នៅក្នុងសណ្ឋាគារគេត្រូវការតែច្បាប់ចម្លងលិខិតឆ្លងដែនតែប៉ុណ្ណោះ គេមិនត្រូវការច្បាប់ដើមទេ។\r\nរថយន្តរបស់យើងខ្ញុំ ភាគច្រើន តែងតែជាប់កិច្ចព្រមព្រៀងជាមួយក្រុមហ៊ុនធានារ៉ាប់រងដែលក្នុងនោះរាល់អ្នកបើកបរជាជនបរទេសតម្រូវឲ្យកក់លិខិតឆ្លងដែនទុក។                                                                        '),
(10, 'Will it be safe for me if I hold my password during my travel in Cambodia?                                                                        ', 'Holding a passport while travelling in Cambodia can be problematic as you will face a pickpocket or gangster who can eventually steals your bag in which your passport has been kept.                                                                        ', '10', 1, '', '', 'ប្រសិនបើខ្ញុំកាន់លិខិតឆ្លងដែនជាប់ខ្លួនពេលធ្វើដំណើរនៅក្នុងប្រទេសកម្ពុជា តើមានសុវត្ថភាពដែរឬទេ?                                                                        ', 'ការកាន់លិខិតឆ្លងដែនជាប់នឹងខ្លួនពេលធ្វើដំណើរនៅក្នុងប្រទេសកម្ពុជាអាចនឹងមានបញ្ហា ពីព្រោះលោកអ្នកអាចនឹងជួបនិងចោរ ឬជនខិលខូចដែលលួចយកកាបូបលោកអ្នកដោយទាំងលិខិតឆ្លងដែនទៅបាត់។                                                                        '),
(12, ' Is there any driving mileage limitation?                                    ', 'No, not at all. You could drive the rented car as far as you like within the Kingdom of Cambodia territory.                                    ', '12', 1, '', '', 'តើមានកំណត់ចម្ងាយផ្លូវបើកបរដែរឬទេ?                                    ', 'គ្មានដាច់ខាត។  លោកអ្នកអាចបើកបរក្នុងចម្ងាយផ្លូវប្រវែងណាក៏បានដែរឲ្យតែនៅក្នុងទឹកដីនៃ ព្រះរាជាណាចក្រកម្ពុជា។                                    '),
(13, '                                        How can I return the rented car on any off day in case of need?                                    ', '                                        As we don’t work on off days you cannot return the car at that time unless you notify us (such as by phone call) at least one hour in advance of your arrival to Phnom Penh. In this case, you need to pay an overtime fee for the assigned person to receive the returned car.                                    ', '13', 1, '', '', '                                        តើខ្ញុំត្រូវប្រគល់រថយន្តជួលជូនលោកវិញនៅថ្ងៃឈប់សំរាកដោយរបៀបណា?                                    ', '                                        ដោយសារតែពួកយើងមិនធ្វើនៅថ្ងៃឈប់សំរាក លោកអ្នកមិនអាចប្រគល់រថយន្តជួលមកពួកយើងនៅពេលនោះបានទេ លើកលែងតែលោកអ្នកផ្តល់ដំណឹងមកយើងខ្ញុំ(តាមទូរស័ព្ទជាដើម) យ៉ាងហោចណាស់ឲ្យបាន១ម៉ោងមុនលោកអ្នកអញ្ជើញមកដល់ភ្នំពេញ។  ក្នុងករណីនេះលោកអ្នក ចាំបាច់ត្រូវតែបង់ថ្លៃធ្វើការក្នុងម៉ោងលើស ទៅឲ្យអ្នកដែលយើងបញ្ជូនឲ្យទៅទទួល។                                    '),
(14, '                                        May I return the rented car at lunch time?                                    ', 'Of course not. You may not return it at lunch time from 12:00 MP to 02:00 PM because we do not work at lunch time.  In an emergency, you may be requested to pay extra $10.00 for an assigned staff to work over time.                                   ', '14', 1, '', '', '                                        តើខ្ញុំអាចប្រគល់រថយន្តជូនលោកឬលោកស្រីវិញនៅពេលបាយថ្ងៃត្រង់បានទេ?                                    ', 'ពិតជាមិនអាចទេ លោកអ្នកមិនអាចប្រគល់រថយន្តវិញនៅពេលថ្ងៃត្រង់ពីម៉ោង១២:០០ ទៅម៉ោង១:៣០នាទីបានទេពីព្រោះពេលបាយពួកយើងមិនធ្វើការទេ។   ក្នុងករណីចាំបាច់ណាមួយ, លោកអ្នកអាចប្រគល់រថយន្តបាននៅម៉ោងនេះ តែត្រូវចំណាយប្រាក់ $10.00 ដល់ការចាត់តាំងមន្រ្តីម្នាក់ឲ្យមកធ្វើការក្រៅម៉ោង។                                 '),
(15, 'May I call you at night time?', 'Of course not. Especially after 8:00 PM', '15', 1, '', '', 'តើខ្ញុំអាចទូរស័ព្ទទាក់ទងលោក ឬលោកស្រីនៅពេលយប់បានទេ?', 'ពិតជាមិនអាចទេ ជាពិសេសចាប់ពីម៉ោង៨:០០យប់ទៅ។'),
(16, 'How to count the length of car rental period?', ' Like the hotel check-in, the car rental can be started at any time of our working hours, but unlike the hotel check-out which can be processed no later than 12:00 PM, whereas the vehicle returning time is no later than 5:00 PM of the last day of car rental agreement. If later than 5:00pm as stated above the vehicle returning is automatically counted as extended to the next day. Here are the following examples:\r\n (i) If you take the rented car out on Monday for example at 12:00 PM, (whereas our office opens from 7:30 AM to 5:00 PM) and you take the car back to our office by 5:30 PM on the same day, the car rental will be counted as one full day. \r\n(ii) If you take the rented car on Monday between 7:50 am to 12:00 PM, for example and turn it back to our office on Wednesday of the same week by 5:30 PM, the rental period is counted as three full days.', '16', 1, '', '', 'តើរយៈពេលនៃការជួលរថយន្តគេគិតរបៀបដូចម្តេច?', 'ដូចគ្នាទៅនឹងការចូលស្នាក់នៅក្នុងសណ្ឋាគារដែល ការចាប់ផ្តើមជួលរថយន្តគេអាចមកជួលពេលណាក៏បានឲ្យតែនៅក្នុងម៉ោងធ្វើការ  ក៏ប៉ុន្តែវាខុសគ្នាត្រង់ថាការឈប់ស្នាក់នៅសណ្ឋាគារគេកំណត់ត្រឹមម៉ោង១២:០០ ថ្ងៃត្រង់ មិនឲ្យលើស  រីឯការឈប់ជួលរថយន្តប្រព្រឹត្តទៅនៅថ្ងៃចុងក្រោយនៃកិច្ចព្រមព្រៀងដោយកំណត់ត្រឹមម៉ោង៥:0០ល្ងាចមិនឲ្យលើស។ បើហួសម៉ោង៥:០០ល្ងាចដូចកំណត់ ខាងលើថ្ងៃឈប់ជួលរថយន្តក្តីត្រូវគិតទៅដល់ថ្ងៃបន្ទាប់វិញជាស្វ័យប្រវត្តិ។ សូមលើកជាឧទាហរណ៍ដូចខាងក្រោម៖\r\n(១) ឧបមាថាលោកអ្នកយករថយន្តជួលចេញនៅថ្ងៃចន្ទនៅម៉ោង១២:០០ថ្ងៃត្រង់(រីឯការិយាល័យយើងខ្ញុំធ្វើការពីម៉ោង ៧:៣០ព្រឹក ដល់ ម៉ោង៥:៣០ ល្ងាច ហើយលោកអ្នក យករថយន្តមកប្រគល់វិញនៅម៉ោង៥:៣០ល្ងាចនាថ្ងៃដដែល ក្នុងករណីនេះ រយៈពេលនេះរយៈពេលនៃការជួលរថយន្តត្រូវរាប់ថា១(មួយ)ថ្ងៃពេញ។ \r\n(២) ឧបមាថាលោកអ្នកយករថយន្តជួលចេញនៅថ្ងៃចន្ទនៅម៉ោងក្នុងចន្លោះពី០៧:៣០ ទៅ១២:០០ថ្ងៃត្រង់ រួចយករថយន្តនោះមកប្រគល់វិញនៅថ្ងៃពុធនៃសប្តាហ៍ដដែលក្នុងវេលា ម៉ោង៥:៣០នាទីល្ងាច  រយៈពេលនៃការជួលរថយន្តគេរាប់ថា៣(បី)ថ្ងៃពេញ។'),
(17, 'As per monthly car rental how is the length of car rental period counted?', 'As the number of days per month ranges between 28 and 31, one month of car rental shall be counted as 30 days no matter how many days the month comprises, but you will need to return the rented car on the last day by 5:30 PM.', '17', 1, '', '', 'ចំពោះការជួលរថយន្តប្រចាំខែ តើរយៈពេលនៃការជួលរថយន្តគេគិតយ៉ាងដូចម្តេច?', 'ដោយសារចំនួនថ្ងៃក្នុង១ខែវាប្រែប្រួលពី២៨ ដល់៣១ ១ខែនៃ ការជួលរថយន្តគឺរាប់ថា៣០ថ្ងៃ ទោះបីជាក្នុងខែនោះមានប៉ុន្មានថ្ងៃក៏ដោយ ក៏ប៉ុន្តែនៅថ្ងៃចុងក្រោយ លោកអ្នកត្រូវតែប្រគល់រថយន្តវិញមិនឲ្យហួសពីម៉ោង៥:៣០ល្ងាច។'),
(18, 'If I happen to cancel my trip before the termination of car rental agreement, will the booking/rental fee be refunded to me?', 'For the monthly car rental, both of your booking fee and deposit fee won\'t be refunded. For daily car rental, the rental deposit will be refundable but the rental fee will not be. \r\nOur past experience: \r\nSuch non-refundable deposit is proved by a past experience of one of our colleagues as stated below.  Once on Wednesday, December 23, 2015, she missed her flight from Norway to France where she needed to celebrate a Christmas party with her relatives, and that round-trip flight fee was $600. Her flight failure was caused by a traffic jam: One car hit another on the road by which she needed to go past and this made a heavy traffic jam for two hours. Then she went to the flight company at the airport in Kristiansand and inquired whether her ticket could be used for the next flight. Unfortunately, her fly ticket could not be renewed and the validity could not be extended. Then she was required to buy another one. Similarly the car rental fee cannot be refunded.', '18', 1, '', '', 'ប្រសិនបើខ្ញុំចង់ផ្អាកការធ្វើដំណើររបស់ខ្ញុំដោយប្រការណាមួយមុនពេលកំណត់កិច្ចព្រមព្រៀងតើប្រាក់កក់ឬប្រាក់ឈ្នួលអាចបង្វិលមកខ្ញុំវិញបានទេ?', 'សម្រាប់ការជួលរថយន្តគិតជាខែ ទាំងប្រាក់ឈ្នួល ទាំងប្រាក់កក់មិនអាចដកវិញបានទេ។ រីឯការជួលគិតជាថ្ងៃ ប្រាក់កក់អាចដកវិញបាន ប៉ុន្តែប្រាក់ឈ្នួលមិនអាចដកវិញបានទេ។\r\n\r\nការជួបប្រទះរបស់យើងកន្លងមក៖ \r\nបទពិសោធន៍របស់សហការីរបស់យើងម្នាក់កន្លងមកដែលនឹងត្រូវលើកឡើងដូចខាងក្រោម គឺជាភ័ស្តុតាងបញ្ជាក់ថា ហេតុអ្វីបានជាប្រាក់កក់គេមិនអាចដកវិញបាន។ នាថ្ងៃមួយគឺថ្ងៃពុធ ទី២៣ ខែធ្នូ ឆ្នាំ២០១៥ គាត់បានខកជើងយន្តហោះពីប្រទេសន័រវ៉េ ទៅប្រទេសបារាំង ដោយគាត់បាច់បាច់ត្រូវរៀបចំពិធីបុណ្យណូអែលជាមួយសាច់ញាតិនៅទីនោះ ហើយតម្លៃយន្តហោះទៅមកគឺ ៦០០ដុល្លា។ ការបរាជ័យក្នុងការឡើងយន្តហោះនោះគឺ បណ្តាលមកពីការស្ទះចរាចរ។ មានរថយន្តបុកគ្នានៅតាមផ្លូវដែលគាត់ត្រូវធ្វើដំណើរឆ្លងកាត់ ដែលបង្កឲ្យមានការស្ទះចរាចរយ៉ាងធ្ងន់ធ្ងរអស់រយៈពេលពីរម៉ោង។ បន្ទាប់មកគាត់ក៏ទៅកាន់ក្រុមហ៊ុនអាកាសចរ ក្នុង Kristiansand  ដើម្បីចង់ដឹងថាតើសំបុត្រយន្តហោះរបស់គាត់អាចប្រើប្រាស់សំរាប់យន្តហោះជើងក្រោយបានដែរឬទេ។  ជាអកុសល សំបុត្រយន្តហោះនោះមិនអាចដូរថ្មីបានទេ ហើយការហួសកំណត់ក៏មិនអាចបន្តទៅ ទៀតបានដែរ។  គេតម្រូវឲ្យគាត់ទិញសំបុត្រយន្តហោះថ្មីមួយទៀត។ យ៉ាងណាម៉ិញ ការជួលរថយន្តរបស់លោកអ្នកមិនអាចដកវិញបានដូចគ្នា។'),
(19, 'Can I hire a car for a self-drive with my national driver\'s licenses in Cambodia? ', 'No, you cannot. You can use only the Cambodian driver’s license. The Royal Government of Cambodia and the local insurance agency require you to exchange it with the Cambodian one. Lyna-CarRental.Com\'s office can deal with it for you, and it will take only a few minutes to get National Driver\'s License replaced with the Provisional Cambodian Driver\'s License.', '19', 1, '', '', 'តើខ្ញុំអាចជួលរថយន្តដើម្បីបើកបរដោយខ្លួនឯងដោយប្រើប័ណ្ណបើកបរមកពីប្រទេសខ្ញុំ ដែរឬទេ?', 'ទេមិនអាចទេ។  លោកអ្នកអាចប្រើបានតែប័ណ្ណបើកបរកម្ពុជាតែប៉ុណ្ណោះ។  រាជរដ្ឋាភិបាលនៃព្រះរាជាណាចក្រកម្ពុជា និងទីភ្នាក់ងារធានារ៉ាប់រងនៅកម្ពុជា តម្រូវឲ្យប្តូរយកប័ណ្ណបើកបរកម្ពុជា  វិញ។ លីណា-ជួលរថយន្តទេសចរណ៍អាចដោះស្រាយការងារនេះជូនលោកអ្នកបាន ហើយក្នុងរយៈពេលតែប៉ុន្មាននាទីប៉ុណ្ណោះលោកអ្នកនឹងបានប្តូរបណ្ណបើបរមកពីប្រទេសលោកអ្នកទៅជាប័ណ្ណបើកបរកម្ពុជាបណ្តោះអាសន្នវិញភ្លាម។'),
(20, 'Can I hire a car for a self-drive with my international driver\'s licenses in Cambodia? ', 'Yeah, you can. But you will be allowed to use it only 1 month.', '20', 1, '', '', 'តើខ្ញុំអាចជួលរថយន្តដើម្បីបើកបរនៅកម្ពុជាដោយខ្លួនឯងដោយប្រើប័ ប័ណ្ណបើកបរអន្តរជាតិបានដែរឬទេ?', 'ពិតជាអាច ក៏ប៉ុន្តែ លោកអ្នកអាចប្រើបានតែប័ណ្ណបើកបរអន្តរជាតិតែក្នុងរយៈពេលតែ១ខែប៉ុណ្ណោះ។'),
(21, 'Is there any extra charge, if I deliver the rented car in another place than the Phnom Penh one?', 'Of course there is. Since we do not have any branch offices in other provinces we have to go from Phnom Penh to the proposed destinations for delivering/receiving the rented car. It will take 2 days at the earliest to take the round trip from Phnom Penh to the scene including the accommodation time. So, we will charge you based on the distance between Phnom Penh and the destination, for example:\r\n1. Sihanouk Ville $150.00\r\n2. Siem Reap province $150.00\r\n3. Battambang province $179.00\r\n4. Koh Kong province $165.00', '21', 1, '', '', 'ប្រសិនបើខ្ញុំប្រគល់រថយន្តវិញនៅកន្លែងផ្សេងក្រៅពីទីក្រុងភ្នំពេញ តើខ្ញុំត្រូវចំណាយប្រាក់បន្ថែមដែរឬទេ?', 'ប្រាកដជាត្រូវចំំណាយហើយ។  ដោយសារតែយើងខ្ញុំពុំមានការិយាល័យសាខានៅតាមបណ្តាខេត្តដទៃៗទៀត យើងខ្ញុំចាំបាច់ត្រូវតែធ្វើដំណើរពីភ្នំពេញទៅកាន់កន្លែងដែលបានស្នើនោះ ដើម្បីប្រគល់ឬទទួលរថយន្តជួល។  យ៉ាងលឿនបំផុតក៏ត្រូវប្រើប្រាស់រយៈពេលពេល២ថ្ងៃដែរសម្រាប់ធ្វើដំណើរទៅមកទៅដើម្បីប្រគល់ឬទទួលរថយន្តបន្ថែមទាំងរយៈពេលស្នាក់នៅទៀតផង។ ដូច្នេះយើងខ្ញុំត្រូវតែគិតថ្លៃឈ្នួលដោយផ្អែកទៅលើចម្ងាយផ្លូវពីភ្នំពេញ។ ជាឧទាហរណ៍៖ \r\n១) ក្រុងព្រះសីហនុ ១៥០ដុល្លា\r\n២) ខេត្តសៀមរាប ១៥០ដុល្លា\r\n៣) ខេត្តបាត់ដំបង ១៧០ដុល្លា\r\n៤) ខេត្តកោះកុង ១៦៥ដុល្លា'),
(22, 'Have your rented car contracted with any insurance company?', 'Yes, there is full insurance coverage for all of our rented cars', '22', 1, '', '', 'តើរថយន្តជួលរបស់លោកអ្នក មានជាប់កិច្ចសន្យាជាមួយក្រុមហ៊ុនធានារ៉ាប់រងដែរឬទេ?', 'មានជាប់។  រថយន្តជួលទាំងអស់សុទ្ធតែមានធានារ៉ាប់រងសព្វបែបយ៉ាងទាំងអស់។'),
(23, 'How many options of full insurance coverage are there?', 'There are five of the following options: \r\n1. Third Party Liability (TPL), \r\n2. Own Damage (OD), \r\n3. Passenger Liability (PL), \r\n4. Accident to the Driver (AD), and \r\n5. Theft/robbery', '23', 1, '', '', 'តើជំរើសនៃការធានារ៉ាប់រងពេញលេញមានអ្វីខ្លះ?', ' មានជំរើសប្រាំយ៉ាង៖\r\n១) ការទួលខុសត្រូវលើភាគីទី៣ (តីតជន)\r\n២) ការខូចខាតរថយន្តផ្ទាល់ខ្លួន\r\n៣) ការទទួលខុសត្រូវលើអ្នករួមដំណើរ\r\n៤) គ្រោះថ្នាក់ដែលកើតមានចំពោះអ្នកបើកបរ\r\n៥) ចោរកម្ម'),
(24, 'What should I do if I get an accident during the period of the self-drive car rental?', 'You will have to call directly to the insurance agency representatives, tell them the spot of accident, wait them, and report them what have happened but do not escape nor move the car away from the scene or else the insurance company will not be involved in compensation for the loss. ', '24', 1, '', '', 'តើខ្ញុំត្រូវធ្វើដូចម្តេច ប្រសិនបើខ្ញុំមានគ្រោះថ្នាក់ក្នុងអំឡុងពេលជួលរថយន្តដោយបើកបរខ្លួនឯង?', 'អ្នកត្រូវតែទាក់ទងទៅតំណាងទីភ្នាក់ងារធានារ៉ាប់រងដោយផ្ទាល់ ដោយប្រាប់ពួកគេអំពីកន្លែងកើតគ្រោះថ្នាក់ រង់ចាំពួកគេ ហើយរាយការណ៍ប្រាប់ពួកគេអំពីហេតុការណ៍ដែលកើតឡើង តែសូមគេចចេញ ឬក៏រំកិលរថយន្តចេញពីកន្លែងកើតហេតុឲ្យសោះ បើពុំដូច្នោះទេក្រុមហ៊ុនធានារ៉ាប់រងមុខជាមិនចូលរួមដោះស្រាយសំណងលើការខូចខាតឡើយ។'),
(25, 'Will I need to pay for the driver’s meal and accommodation?', 'Not at all! He will pay for meal and accommodation by himself.\r\nIn rare case if you need the driver to send you to an remote/unknown area or you leave him in an unknown place for your private stay where there is no restaurant and guesthouse you will be required to pay for him', '25', 1, '', '', 'តើខ្ញុំចាំបាច់ត្រូវចំណាយលើថ្លៃស្នាក់នៅ និងអាហារសំរាប់អ្នកបើកបរដែរឬទេ?', 'មិនចាំបាច់ទាល់តែសោះ។ អ្នកបើកបរនឹងចេញប្រាក់ថ្លៃអាហារ និងស្នាក់នៅដោយខ្លួនឯង។ \r\nមានករណីមួយ ជាករណីដ៏កម្របំផុតគឺ ប្រសិនបើលោកអ្នកត្រូវការឲ្យអ្នកបើកបរជូនទៅនៅតំបន់ដាច់ស្រយាលឬជាតំបន់ដែលគមិនដែលស្គាល់ ឬលោកអ្នកទុកអ្នកបើកបរចោលនៅកន្លែងដែលគ្មានអ្នកណាស្គាល់ ដើម្បីភាពស្ងប់ស្ងាត់ គ្មានផ្ទះសំណាក់ដែលគ្មានអាហារដ្ឋាន គ្មានផ្ទះសំណាក់ លោកអ្នកត្រូវតែ ចំណាយជូនគាត់។'),
(26, 'In rare case if you need the driver to send you to an remote/unknown area or you leave him in an unknown place for your private stay where there is no restaurant and guesthouse you will be required to pay for him.', 'If you happen to return the car on Sunday or off day, you are required to pay $10.00 for input of our employee’s over time work payment on Sunday and call us one hour in advance of your arrival to the neighboring area of Phnom Penh.', '26', 1, '', '', 'តើខ្ញុំត្រូវធ្វើដូចម្តេច ប្រសិនបើខ្ញុំចាំបាច់ត្រូវប្រគល់រថយន្តជួលត្រឡប់វិញប៉ះចំថ្ងៃអាទិត្យ ឬថ្ងៃដែលគេសំរាកមិនធ្វើការ?', 'ប្របើជាចៃដន្យលោកអ្នកប្រគល់រថយន្តវិញនៅចំថ្ងៃអាទិត្យឬថ្ងៃឈប់លោកអ្នកចាំបាច់ត្រូវតែបង់ថ្លៃបន្ថែមចំនួន១០ដុល្លា សំរាប់ការងារថែមម៉ោងបុគ្គលិក រួចទូរស័ព្ទមកយើងខ្ញុំឲ្យបានមួយម៉ោងមុនមកដល់តំបន់ជុំវិញភ្នំពេញ។'),
(27, 'Is it safe for me to drive a car in Cambodia?', 'For the foreigner who comes to Cambodia for the first time, the drive is risky. If you are cool-headed, it will be a very good to have more privacy to do a self-drive. \r\n\r\nIn the contrary if you are distracted while driving you will face multiple problems. Therefore we would like to recommend that you take a car rental with a driver. The driver can speak English and knows all places around Cambodia in particular the interesting places or resort centers.', '27', 1, '', '', 'តើការបើកបររថយន្តនៅកម្ពុជាមានសុវត្ថភាពដែរឬទេសំរាប់ខ្ញុំ?', 'សំរាប់ជនបរទេសដែលមិនធ្លាប់ដែលមកកម្ពុជាការបើកបរអាចប្រឈមនឹងគ្រោះថ្នាក់។ ប្រសិនបើលោក លោកស្រីឬនាងកញ្ញាមានអារម្មណ៍ស្ងប់ល្អនោះ ការបើកបររបស់លោកអ្នកកាន់តែមានលក្ខណៈឯករាជ្យខ្លាំងឡើងថែមទៀត។ ផ្ទុយទៅវិញប្រសិនបើអស់លោកលោកស្រីមានអារម្មណ៍មិននឹងន លោកអ្នកអាចនឹងជួបប្រទះបញ្ហាច្រើនយ៉ាង។  អាស្រ័យហេតុនេះ យើងសំណូមពរលោកឬលោកស្រីមេត្តាជួលរថយន្ត ដោយថែមទាំងអ្នកបើកបរ ផងដែរ។  អ្នកបើករបស់យើងចេះនិយាយភាសារអង់គ្លេស និងស្គាល់គ្រប់ទីកន្លែងនៅកម្ពុជា ជាពិសេសកន្លែងសំខាន់ៗ និងមណ្ឌលកំសាន្តទៀតផង។'),
(28, 'How to avoid any car accident during the car drive in Cambodia?', 'There are some of the following tips that can help you avoid the accidents when driving in Cambodia: \r\n1. Never drive as fast as in other countries \r\n2. Do not drive on high way at night as there may be animals or wildlife lying on the road or it is possible that vehicles such as ox cart, trailer, lorry/truck, or motorbike can also park on the road without switching on the warning light. Besides, there may also be drunk people or gangsters driving badly or coming to hit the car you are driving  \r\n3. You will need to be beware of cross road or reduce the speed when arriving at the crossroad in case you run over another car that accidentally pass by there..\r\n4. Avoid over taking that can cause accident as the roads in Cambodia are mostly rough and narrow.', '28', 1, '', '', ' តើខ្ញុំគួរបើកបរដូចម្តេចទើបជាសផុតពីគ្រោះថ្នាក់រថយន្តបាន?', 'មានការបំភ្លឺជូនមួយចំនួនដូចខាងក្រោមដែលជាជំនួយសំរាប់លោកឬលោកស្រីផុតពីគ្រោះថ្នាក់នៅពេលធ្វើការបើកបររថយន្តនៅកម្ពុជា។\r\n១)  ជាសវាងការបើកបរលឿនដាច់ខាតដូចនៅប្រទេសដទៃៗទៀត \r\n២) សូមកុំបើកបរលើផ្លូវជាតិនៅពេលយប់ ដោយហេតុថាអាចនឹងមានសត្វស្រុកឬសត្វព្រៃដេលលើថ្នល់ ឬអាចមានយានវន្ត រទេះគោ រ៉ឺម៉ក រថយន្តដឹកទំនិញ  ឬម៉ូតូជាដើមចតនៅលើដងផ្លូវមិនបានបើកភ្លើងសញ្ញា។ មិនតែប៉ុណ្ណោះវាអាចនឹងមានអ្នកស្រវឹងស្រា ឬជនពាលបើកបរច្រងេងច្រងាង មកបុករថន្តដែលលោក ឬលោកស្រីដែលកំពុងបើកបរ។\r\n ៤) លោកឬលោកស្រីចាំបាច់ត្រូវតែប្រុងប្រយ័ត្នឬបង្អន់ល្បឿននៅពេលបើករដល់ផ្លូវបំបែកព្រោះវាអាចបុកគ្នាជាមួយនឹងរថយន្តផ្សេងទៀតដែលឆ្លងកាត់។\r\n៣) ជាសវាងការបើកបរជែងគ្នាដែលអាចបង្កឲ្យមានគ្រោះថ្នាក់ពីព្រោះផ្លូវនៅកម្ពុជាភាគច្រើនមិនល្អហើយថែមទាំងតូចចង្អៀតទៀតផង។'),
(29, 'Is there a limitation of fuel consummation based on distance in kilometer for a self-drive car rental or car rental with an English-spoken driver?                                    ', 'No, there isn’t. You can use or drive the rented car as far as you like because the car rental does not include the fuel cost, but you need to pay the fuel by yourself.     \r\nNote: As all of our cars are always ready to deliver to you with full tank of fuel prior to your departure from Phnom Penh Office, you are required to either refill the car with a full tank of fuel or repay us between $75 & $85 in compensation with the cost of fuel to be refilled when you return the car to us at Phnom Penh Office.                               ', '29', 1, '', '', 'តើក្នុងការជួលរថយន្តបើកបរដោយខ្លួនឯងក្តីឬជួលដោយមានអ្នកបើកបរចេះនិយាយភាសាអង់គ្លេសក្តី មានការកំណត់ប្រើសាំងដោយផ្អែកទៅលើចម្ងាយផ្លូវគិតជាគីឡូម៉ែត្រដែរឬទេ?                                    ', ' ទេគ្មានការកំណត់ទេ លោកអ្នកអាចបើកបរទៅដល់ទីណាក៏បានតាមចិត្តចង់ ពីព្រោះថ្លៃជួលរថយន្តមិនបានបញ្ចូល លើថ្លៃសាំងឡើយ ក៏ប៉ុន្តែលោកអ្នក​ចាំបាច់​ត្រូវ​ចេញ​ថ្លៃសាំង​ដោយ​ខ្លួនឯង។\r\nសម្គាល់៖ ដោយសារតែរថយន្តរបស់យើងទាំងអស់បានចាក់សាំងពេញធុងជាមុនត្រៀមដើម្បីប្រគល់ជូនមុននឹងលោកអ្នកចេញដំណើរពីការិយាល័យភ្នំពេញលោកអ្នកត្រូវតែចាក់សាំងឲ្យពេញធុងវិញឬក៏ចំណាយលើថ្លៃសាំងពី៧៥ដុល្លា ទៅ៨៥ដុល្លាជំនួសការចាក់សាំងក្នុងធុង នៅពេលប្រគល់រថយន្តឲ្យយើងខ្ញុំវិញនៅភ្នំពេញ។'),
(30, 'Can I rent a car for a self-drive if I do not have a Cambodian driver\'s license?', 'If you do not have a Cambodian driver\'s license you will have the following two options: \r\n\r\n1)	Taking the car rental with a driver where you will pay a less cost of refundable deposit than that of the self-drive car rental.\r\n\r\n2) Taking the car rental for self-drive with a requirement to pay a more cost of refundable deposit in addition to the car rental. In this case, you will have no access to insurance benefit.', '30', 1, '', '', 'តើខ្ញុំជួលរថយន្តបើកបរដោយខ្លួនឯងបានទេ ប្រសិនបើខ្ញុំពុំមានប័ណ្ណបរខ្មែរ?', 'ប្រសិនបើលោកអ្នកពុំមានប័ណ្ណបើកបរខ្មែរទេ លោកអ្នកមានជំរើស២យ៉ាងដូចខាងក្រោម៖ \r\n\r\n១) ប្រើសេវាជួលរថយន្តមានបន្ថែមអ្នកបើកបរ ដោយតម្រូវឲ្យបង់ប្រាក់កក់តិចជាងប្រាក់កក់ដែលបង់សំរាប់ជួលដើម្បីបើកបរខ្លួនឯង។ \r\n\r\n២)  ប្រើសេវាជួលរថយន្តបើកបរដោយខ្លួនឯង ដោយតម្រូវឲ្យបង់ប្រាក់កក់ច្រើនជាងប្រាក់កក់ដែលជួលមានអ្នកបើកបរ។  ក្នុងករណីនេះលោកអ្នកពុំអាចទទួលអត្ថប្រយោជន៍ពីការធានារ៉ាប់រងបានទេ។'),
(31, 'What are your requirements for the self-drive car rental?', 'There are two options for you: \r\n\r\nOption 1. If you do not possess a Cambodian driver\'s license, you have to:\r\n\r\n1.1.	Deposit a valid passport with entry visa for your insurance purpose. \r\n\r\n\r\n1.2. Pay a refundable deposit with the amount ranging between $500 and $1,000.\r\n\r\n1.3. Leave us an English legible valid National or International Driver\'s License to which the General Department of Public Work and Transport can refer so as to get your driver’s license temporarily replaced by a Cambodian Driver\'s License.\r\n\r\n1.4. Get your Cambodian Driver\'s License renewed or have its expiry date extended.\r\n\r\n1.5. Leave 6 sheets of passport-size photos.  If you do not have any of them, our office can make some for you just within a few minutes with the cost of $2.  \r\n\r\n\r\n1.6. Our office will issue for you a Provisional Driver\'s License Receipt in just a few minutes, and then you can immediately start driving around in Cambodia.\r\n\r\n1.7. The Real Cambodian Driver\'s License is valid for only one year but renewable. It can be renewed in a week at the latest. It could be sent to your country with the additional postage charge of $5.\r\n\r\nOption 2. If you have already had a Cambodian driver\'s license, you have to:\r\n\r\n2.1. Deposit a valid passport with entry visa (of all kinds) for your insurance purpose. \r\n\r\n2.2. Get your valid Cambodian Driver\'s License photocopied on both sides\r\n\r\n2.3. Pay a refundable deposit with the amount ranging between $500 and $1,000.\r\n \r\n\r\n2.4. Our office will provide you with a Provisional Driver\'s License just within a few minutes, then you can immediately start driving around in Cambodia.\r\n\r\nNote: In the event that you do not have national or international driver\'s license in English, you must have it endorsed by the Embassy.', '31', 1, '', '', 'ដើម្បីជួលរថយន្តបើកបរដោយខ្លួនឯងតើលោកអ្នកមានតម្រូវការអ្វីខ្លះ?', 'មានពីរប្រភេទសំរាប់លោកអ្នកធ្វើការជ្រើសរើស៖\r\nជំរើសទី១៖ ប្រសិនបើលោកអ្នកគ្មានប័ណ្ណបើកបរកម្ពុជាទេ លោកអ្នកត្រូវតែ៖\r\n១.១. កក់លិខិតឆ្លងដែនដែលមានសុពលភាព និងដែលមានទិដ្ឋាការច្រកចូល ដើម្បីបុព្វហេតុធានារ៉ាប់រង។  \r\n\r\n១.២. បង់ប្រាក់ដំកល់ដែលអាចដកវិញបានក្នុងចំនួនពី៥០០ដុល្លា ទៅ១០០០ដុល្លា។\r\n១.៣. កក់ទុកនូវប័ណ្ណបើកបរដែលធ្វើដោយប្រទេសសមីជន ឬប័ណ្ណបើកបរអន្តរជាតិដែលជាភាសាអង់គ្លេសដែលនៅមានសុពលភាព ហើយ ដែលក្រសួងសាធារណការអាចធ្វើជាឯកសារយោង ដើម្បីអាចឲ្យលោកអ្នកប្តូរយកប័ណ្ណបើកបរកម្ពុជាមកប្រើជំនួសបណ្តោះអាសន្នបាន\r\n\r\n១.៤. ធ្វើប័ណ្ណបើកបរកម្ពុជាជាថ្មី ឬបន្តសុពលភាពជូនលោកអ្នក។\r\n១.៥. ទុករូបថតដែលមានទំហំដូចរូបថតក្នុងលិខិតឆ្លងដែនចំនួន៦សន្លឹក។  ប្រសិនបើលោកអ្នកគ្មានទេយើងខ្ញុំអាចដោះស្រាយជូនលោកអ្នកបានក្នុងរយៈពេល២ឬបីនាទីប៉ុណ្ណោះដោយត្រូវចំណាយ២ដុល្លា។\r\n១.៦. ការិយាល័យយើងខ្ញុំនឹងចេញប័ណ្ណបើកបរបណ្តោះអាសន្នជូនលោកអ្នកតែក្នុងក្នុងរយៈពេលប៉ុន្មាននាទីប៉ុណ្ណោះ ដែលអាចឲ្យលោកអ្នកធ្វើការបើកបរជុំវិញប្រទេសកម្ពុជាបានមួយរំពេជ។\r\n១.៧. ប័ណ្ណបើកបរកម្ពុជាពិតប្រាកដមានសុពលភាពត្រឹមតែ១ឆ្នាំប៉ុណ្ណោះ ប៉ុន្តែគេអាចធ្វើថ្មីបានតែក្នុងរយៈពេល១សប្តាហ៍យ៉ាងយូរ។  ប័ណ្ណបើកបរនេះគេអាចនឹងផ្ញើរទៅប្រទេសរបស់លោកអ្នកក្នុងតម្លៃប្រៃណីបន្ថែមចំនួន៥ដុល្លា។\r\n\r\nជំរើសទី២៖ ប្រសិនបើលោកអ្នកមានប័ណ្ណបើកបរកម្ពុជារួចជាស្រេច លោកអ្នកត្រូវតែ៖\r\n២.១. កក់លិខិតឆ្លងដែនដែលមានទិដ្ឋាការចូល(ប្រភេទណាក៏បាន) ដើម្បីបុព្វហេតុធានារ៉ាប់រងរបស់លោកអ្នក។  \r\n២.២. ថតចម្លងទាំងសងខាងនូវប័ណ្ណបើកបរកម្ពុជាដែលមានសុពលភាព។\r\n២.៣.  បង់ប្រាក់កក់ដែលអាចដកវិញបានក្នុងចំនួនចាប់ពី៥០០ដុល្លា ដល់ ១០០ដុល្លា។\r\n២.៤. ការិយាល័យយើងខ្ញុំនឹងចេញប័ណ្ណបើកបរបណ្តោះអាសន្នជូនលោកអ្នកក្នុងរយៈពេលតែប៉ុន្មាននាទីប៉ុណ្ណោះ ដែលអាចឲ្យលោកអ្នកធ្វើការបើកបរជុំវិញប្រទេសកម្ពុជាបានភ្លាម។\r\n\r\n\r\nសម្គាល់៖ ក្នុងករណីដែលលោកអ្នកពុំមានប័ណ្ណបើកបរនៃប្រទេសលោកអ្នក ឬប័ណ្ណបើកបរអន្តរជាតិ ដែលជាភាសាអង់គ្លេសទេ លោកអ្នកត្រូវតែទៅឲ្យស្ថានទូតធ្វើការបញ្ជាក់ជាផ្លូវការ។'),
(32, 'Why doesn’t your company charge the cost of fuel consumption?', 'Because we do not know your exact destinations', '32', 1, '', '', 'ហេតុអ្វីបានជាក្រុមហ៊ុនលោកអ្នកមិនគិតថ្លៃលើការចំណាយសាំង?', 'ដោយសារតែយើងខ្ញុំពុំដឹងច្បាស់ថាលោកអ្នកត្រូវទៅទីណាឲ្យប្រាកដ។'),
(33, 'Is the daily car rental price includes the cost of fuel?', 'Absolutely not. Our car rental service is not like a chartered tour service.', '33', 1, '', '', 'តើថ្លៃជួលរថយន្តប្រចាំថ្ងៃមានបញ្ចូលលថ្លៃសាំងដែរឬទេ?', 'ប្រាកដជាមិន ។ សេវាជួលរថយន្តរបស់យើងមែនដូចជាសេវាទេសចរណ៍ដែលជាប់កិច្ចសន្យាទេ។'),
(34, 'What should I do, if the rented car with my own driving is broken down on the way?', ' From our personal experience, our car for rent is rarely breakdown on the way, as before getting the car started we usually do the following general performance checking especially in the morning: \r\n\r\n1. Check the level of water in the radiator to see in case it is at low level.  \r\n2. Check the level and quality of lubricant in case it is at low level or in bad quality. \r\n3. Check the level of brake fluid and refill it when it is at low level. \r\n4. Check the quality of belts system and replace it when it bad.\r\n5. Check the fans performance before closing the hood.\r\n\r\nBut if the car is still broken down on the way you will need to contact us for solution, and you have to get it towed to Phnom Penh office where you will pay only for the towing fee whereas the rest of the repair costs are our responsibility even the the repair cost is up to thousands US Dollars if the scene is within our liability coverage areas where the radius from Phnom Penh is within 50 Km. Beyond this, we still can help you but the mobile repair service is needed to take place and will charge you at the rate of $0.75/Km.', '34', 1, '', '', 'តើខ្ញុំគួរធ្វើដូចម្តេចប្រសិនបើរថយន្តជួលនោះខូចតាមផ្លូវពេលខ្ញុំកំពុងតែបើកបរ?', 'យោងតាមបទពិសោធន៍របស់យើង រថយន្តសំរាប់ជួលរបស់យើងកម្រនឹងខូចនៅតាមផ្លូវណាស់ ដោយហេតុថាមុននឹងឲ្យរថយន្តចេញដំណើរ យើងតែងតែធ្វើការត្រួតពិនិត្យស្ថានភាពរថយន្តសព្វគ្រប់ជាពិសេសនៅពេលព្រឹកដូចជា៖\r\n\r\n១. ពិនិត្យកំរិតទឹកក្នុងធុងទឹក ក្រែងលោកំរិតទឹកមិនគ្រប់\r\n២. ពិនិត្យមើលកំរិត និងគុណភាពប្រេងម៉ាស៊ីន ក្រែងលោមិនគ្រប់ឬឡើងខ្មៅ\r\n៣. ពិនិត្យមើលកំរិតប្រេងហ្វ្រាំង ប្រសិនបើខ្វះត្រូវបន្ថែម\r\n៤. ពិនិត្យមើលប្រព័ន្ធខ្សែពាន បើវាអន់ឬខូចយើងដូរវាចេញ\r\n៥. ពិនិត្យមើលស្ថានភាពកង្ហារមុននឹងបិទគំរបរថយន្ត។\r\n\r\nក៏ប៉ុន្តែបើរថយន្តនៅតែខូចនៅតាមផ្លូវទៀត លោកអ្នកចាំបាច់ត្រូវតែទាក់ទងមកកាន់យើងខ្ញុំដើម្បីធ្វើការដោះស្រាយ ដោយចាំបាច់ត្រូវតែឲ្យគេសណ្តោងវាមកភ្នំពេញ ហើយលោកអ្នកត្រូវតែបង់ប្រាក់ថ្ថៃសណ្តោង រីឯការខូចខាតផ្សេងៗយើងខ្ញុំជាអ្នកទទួលខុសត្រូវទោះបីជាការចំណាយថ្លៃដល់រាប់ពាន់ដុល្លាក៏ដោយឲ្យតែកន្លែងកើតហេតុនោះស្ថិតនៅក្នុងតំបន់ទទួលខុសត្រូវរបស់យើងដែលកំណត់ត្រឹម៥០គីឡូម៉ែត្រ។ បើនៅផុតពីតំបន់សេវានេះ យើងក៏អាចជួលលោក ឬលោកស្រីបានដែរតែបាំបាច់ត្រូវប្រើប្រាស់សេវាជួសជុលចល័ត ដោយគិតអត្រាតម្លៃ០.៧៥ដុល្លាក្នុង១គីឡូម៉ែត្រ។'),
(35, 'Is the car driving easy in Cambodia?', 'The car driving in Cambodia is more or less difficult. If you are very new to Cambodia, we would like to recommend you taking a car with an English-spoken driver. The driver can send you to anywhere around Cambodia, especially the interesting resorts.', '35', 1, '', '', 'តើការបើកបររថយន្តនៅកម្ពុជាមានភាពងាយស្រួលដែរឬទេ?', 'ការបើកបររថយន្តនៅកម្ពុជាប្រហែលជាពិបាកបន្តិចហើយ។  ប្រសិនបើលោកអ្នក ទើបនឹងមកកម្ពុជាជាលើកដំបូង យើងសុំផ្តល់យោបល់ ឲ្យលោកអ្នក ប្រើប្រាស់សេវាជួលរថយន្តដោយជួលទាំងអ្នកបើកបរផងដែរ។  អ្នកបើកបរអាចជូនលោកអ្នកទៅគ្រប់ទីកន្លែងនៃប្រទេសកម្ពុជា ជាពិសេសនៅមណ្ឌលកំសាន្តសំខាន់ៗ។'),
(36, 'What shall I do if I get an accident during the period of car rental associated with a driver?', 'None of your responsibility for this, if the car is driven by the driver. In the contrary, if you drive the car by yourself you will take your own responsibility for any loss caused by the accident.', '36', 1, '', '', 'តើខ្ញុំត្រូវធ្វើដូចម្តេចប្រសិនបើខ្ញុំជួបគ្រោះថ្នាក់ចរាចរក្នុងអំឡុងពេលជួលរថយន្ត ដែលមានអ្នកបើកបរ?', 'ក្នុងករណីនេះលោកឬអ្នកស្រីពុំមានការទទួលខុសត្រូវលើអ្វីទាំងអស់ ប្រសិនបើរថយន្តបើកបរដោយអ្នកបើកបររបស់យើង។  ផ្ទុយទៅវិញប្រសិនបើ លោកអ្នកបើកបរដោយខ្លួនឯង លោកអ្នកនឹងត្រូវទទួលខុសត្រូវលើរាល់ការខូចខាតដែលបង្កដោយគ្រោះថ្នាក់។'),
(37, 'Can the driver work overtimes?', 'Yes, he can', '37', 1, '', '', 'តើអ្នកបើកបរអាចធ្វើការលើសម៉ោងបានទេ?', 'ពិតជាអាច'),
(38, 'Shall I pay overtime for the driver?', 'Yes. The overtime is always paid to the driver if overtime driving is required.  In this case the overtime shall be included in the car rental fee.', '38', 1, '', '', 'តើខ្ញុំត្រូវតែបង់ប្រាក់បន្ថែមដល់អ្នកបើកបរដែលធ្វើការលើសម៉ោងដែរឬទេ?', 'ន។ អ្នកបើកបរតែងតែទទួលបាននូវប្រាក់លើសម៉ោងជានិច្ច ប្រសិនបើគាត់មានតម្រូវការបើកបរក្នុងម៉ោងលើស ក្នុងករណីនេះ ប្រាក់លើសម៉ោងត្រូវតែបញ្ចូលទៅក្នុងថ្លៃជួលរថយន្តជាដាច់ខាត។'),
(39, 'When are the driver’s overtimes?', 'Before 7:30 AM and after 6:00 PM', '39', 1, '', '', 'តើម៉ោងលើសសំរាប់អ្នកបើកបរមាននៅពេលណាខ្លះ?', 'មុនម៉ោង៧:៣០ព្រឹក និងក្រោយម៉ោង៦:០០ ល្ងាច'),
(40, 'How much is the overtime payment for the driver?', 'The OT payment is $3 per hour for monthly car rental and $5.00 per hour for daily car rental.', '40', 1, '', '', 'តើប្រាក់កំរ៉ៃលើសម៉ោងសំរាប់អ្នកបើកបរប៉ុន្មាន?', 'ប្រាក់កម្រៃលើសម៉ោងគឺ៣ដុល្លាក្នុង១ថ្ងៃ សំរាប់ការជួលរថយន្តតាមខែនិង៥ដុល្លាក្នុងម៉ោងសំរាប់ ការជួលរថយន្តគិតជាម៉ោង។'),
(41, 'What is the deductible or excessive insurance coverage to: \r\n\r\n1. Third Party Liability (TPL) \r\n2. Passenger Liability (PL) \r\n3. Accident to the Driver (AD) \r\n4. Own Damage (OD) \r\n5. Theft/Robbery', 'There are:\r\n1. Third Party Liability (TPL) $100 \r\n2. Passenger Liability (PL) $100\r\n3. Accident to the Driver (AD) $100\r\n4. Own Damage (OD) $100\r\n5. Theft 20%.', '41', 1, '', '', 'តើកំរិតមិនធ្វើសំណងរបស់ក្រុមហ៊ុនធានារ៉ាប់រង មានកំរិតប៉ុន្មាន ទៅនិងករណីដូចខាងក្រោម:\r\n១) ការទទួលខុសត្រូវលើភាគីទី៣  \r\n២) ការទទួលខុសត្រូវលើអ្នកដំណើរ  \r\n៣) ការទទួលខុសត្រូវលើអ្នកបើកបរ  \r\n៥) ការទទួលខុសត្រូវលើចោរកម្ម', 'ប្រភេទនៃប្រាក់ធានារ៉ាប់រងមានដូចតទៅ៖\r\n១. ការទទួលខុសត្រូវលើភាគីទី៣ ចំនួន១០០ដុល្លា\r\n២. ការទទួលខុសត្រូវលើអ្នកដំណើរ ចំនួន១០០ដុល្លា\r\n៣. ការទទួលខុសត្រូវលើអ្នកបើកបរ  ចំនួន១០០ដុល្លា\r\n៤.ការទទួលខុសត្រូវលើការខាតបង់ផ្ទាល់ខ្លួន១០០ដុល្លា\r\n៥. ការទទួលខុសត្រូវចោរកម្មចំនួន ២០%'),
(42, 'Can I rent your car for my own driving?                                    ', 'Of course you can, but you need to meet some of our requirements such as leave your valid passport and pay some amount of refundable deposit in accordance with our company policy.                                    ', '42', 1, '', '', ' តើខ្ញុំអាចជួលរថយន្តរបស់លោកអ្នក ដើម្បីបើកបរដោយខ្លួនឯងបានឬទេ?                                    ', 'ប្រាកដជាអាច ប៉ុន្តែលោកអ្នក ត្រូវតែបំពេញតាមតម្រូវការរបស់យើងមួយចំនួនដូចជា ទុកលិខិតឆ្លងដែនដែលមានសុពលភាពនៅកន្លែងយើង ហើយត្រូវបង់ប្រាក់កក់មួយចំនួនទៅតាមគោលការណ៍របស់ក្រុមហ៊ុន។                                    '),
(43, 'Why doesn’t your company include the cost of the fuel in the car rental?                                    ', 'Because we don’t know at all how far you will drive the rented car.                                    ', '43', 1, '', '', 'ហេតុអ្វីបានជាក្រុមហ៊ុនរបស់លោកអ្នកជួលរថយន្តមិនគិតបញ្ជូលទាំងសាំងផង?                                    ', 'ដោយយើងមិនដឹងទាល់តែសោះថាលោកអ្នកបើកបរទៅឆ្ងាយប៉ុណ្ណា។                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer_status`
--

CREATE TABLE `tbl_footer_status` (
  `footer_id` int(12) NOT NULL,
  `pre_title` text COLLATE utf8_bin NOT NULL,
  `pre_title_kh` varchar(255) COLLATE utf8_bin NOT NULL,
  `pre_detail` text COLLATE utf8_bin NOT NULL,
  `pre_detail_kh` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_footer_status`
--

INSERT INTO `tbl_footer_status` (`footer_id`, `pre_title`, `pre_title_kh`, `pre_detail`, `pre_detail_kh`) VALUES
(1, 'Statutes', 'លក្ខ័ន្តិក:', '<h5><strong>CHAPTER I: GOALS</strong></h5>\r\n\r\n<p><strong>A</strong><strong>rticle 1:&nbsp;</strong>This established Business Association shall be an independent organisation, shall not be under the supervision of any political party, and shall work for the interests of its members.</p>\r\n\r\n<p><span style=\"display:none\">&nbsp;</span><strong>Article 2:&nbsp;</strong><span style=\"display:none\">&nbsp;</span>The Business Association&rsquo;s membership shall be open to businesspeople or&nbsp;professionals regardless of their political affiliations on the basis set out these Statutes.<br />\r\nArticle 3:<strong>&nbsp;</strong>This Business Association shall carry out the activities set out in Article 6 and may set up branches&nbsp;anywhere in the Kingdom of Cambodia or abroad.<br />\r\nArticle 4:&nbsp;The Business Association shall operate permanently with no defined term of expiry.</p>\r\n\r\n<h5><strong>CHAPTER II: NAME AND ADDRESS</strong></h5>\r\n\r\n<p>Article 5:&nbsp;The Business Association&rsquo;s name shall be:&nbsp;European Chamber of Commerce in Cambodia. It shall have the abbreviated name:&nbsp;EuroCham Cambodia&nbsp;or&nbsp;ECCC. The Business Association&rsquo;s address shall be:&nbsp;# No. 30, Preah Norodom Boulevard Sangkat Phsar Thmey 3, Khan Daun Penh, Phnom Penh Cambodia. The name and address can be changed in accordance with a decision of EuroCham Cambodia&rsquo;s Board of Directors.</p>\r\n\r\n<h5><strong>CHAPTER III: EUROCHAM CAMBODIA&#39;S DUTIES</strong></h5>\r\n\r\n<p>Article 6:&nbsp;EuroCham Cambodia is established to represent European businesses and entrepreneurs living and working in Cambodia, and to act on their behalf where appropriate. Its mission is to become a major resource for issues of trade, investment and business intelligence in the country. It aims at fostering business, exchanging information on regulatory matters, advocating with the Cambodian government on issues of interest to European businesses as well as promoting economic and cultural relations between Europe and Cambodia and vice versa.</p>\r\n\r\n<p>EuroCham Cambodia may, in particular, have the following duties:</p>\r\n\r\n<ul>\r\n	<li>To facilitate and increase two way investment, business and trade flows between Cambodia and European Union (EU) Member States.</li>\r\n	<li>To assist in the development of the Cambodian economy.</li>\r\n	<li>To raise the profile of Cambodia and Cambodian businesses in the EU business community and the profile of the EU in the Cambodian business community.&nbsp;</li>\r\n	<li>To complement the bilateral activities carried out by missions and/or business organisations of EU Member States.&nbsp;</li>\r\n	<li>To provide services to Members and non Members relating to economic, legal, technical, financial, market and other business issues;</li>\r\n	<li>To facilitate the creation of strategic alliances between small and medium size companies of Cambodia and EU Member States;</li>\r\n	<li>To undertake all activities to achieve the above stated objects, in conformity with these Statutes, EuroCham&nbsp;&nbsp;\r\n	<p>Cambodia&rsquo;s Internal Rules which supplement these Statutes and EuroCham Cambodia&rsquo;s decisions.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h5><strong>CHAPTER IV: MEMBERSHIP</strong></h5>\r\n\r\n<p><strong>Article 7:</strong></p>\r\n\r\n<p><strong>7.1:</strong>&nbsp;Membership in EuroCham Cambodia shall be divided into three (3) main categories:</p>\r\n\r\n<p><u>Ordinary Members may be either:</u></p>\r\n\r\n<p><em><strong>Ordinary Corporate Members:</strong></em>&nbsp;companies in good standing which have a legal presence in Cambodia or intend to set up a presence in Cambodia and:</p>\r\n\r\n<ul>\r\n	<li>(1) established under the laws of any EU Member State; or</li>\r\n	<li>(2) majority owned subsidiaries of such companies; or</li>\r\n	<li>(3) are directly or indirectly, majority owned by citizens of any EU Member State; or</li>\r\n	<li>(4) can demonstrate to the satisfaction of the EuroCham Cambodia&rsquo;s Executive Committee that they have substantial ties to the EU; or</li>\r\n</ul>\r\n\r\n<p><strong>O</strong><strong>rdinary&nbsp;<em>Individual Members:&nbsp;</em></strong>individuals of good standing</p>\r\n\r\n<ul>\r\n	<li>(1) who are nationals of any EU Member State; or</li>\r\n	<li>(2) who are ordinary residents in Cambodia who can demonstrate to the satisfaction of the Executive Committee that they are actively involved in business, trade, investment and/or other permitted activities in Cambodia.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong><u>Associate&nbsp;Members</u></strong>&nbsp;may be either:</p>\r\n\r\n<p><strong><strong>A</strong><strong>ssociate&nbsp;<em>Corporate Members:</em></strong></strong>&nbsp;(1) companies in good standing which are established under the laws of Cambodia; or&nbsp;(2) companies&nbsp;in good standing which do not have a legal presence in Cambodia, but which are established under the laws of any EU Member State, majority-owned subsidiaries of such companies&nbsp;or which can demonstrate to the satisfaction of the Executive Committee that they have substantial ties to the EU and Cambodia;​ or</p>\r\n\r\n<p><strong>A</strong><strong>ssociate &nbsp;<em>Individual &nbsp;Members: &nbsp;</em></strong>individuals of good standing who are&nbsp;nationals of any EU Member State or who&nbsp;can demonstrate to the satisfaction of the Executive Committee that they are actively involved in business, trade, investment and/or other permitted activities in Cambodia and/or the EU and&nbsp;(1) who are not ordinarily resident in Cambodia, but are not&nbsp;members of an organisation which could become a Corporate member.</p>\r\n\r\n<p>EuroCham Cambodia may deny an application for individual membership from anyone who is also a member of a company that is eligible for corporate membership of EuroCham Cambodia determines that the applicant&#39;s intention is to represent that company.&nbsp;</p>\r\n\r\n<p>Honorary Membership</p>\r\n\r\n<p>Honorary Members may include:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>The duly appointed Ambassadors of European Union Member States in Cambodia;</p>\r\n	</li>\r\n	<li>\r\n	<p>Any person, partnership, corporation or entity invited by the&nbsp;Executive Committee, which have made, or are likely to make, a distinguished contribution in furthering the purposes of EuroCham Cambodia;</p>\r\n	</li>\r\n	<li>\r\n	<p>The &nbsp;Ambassador of the European Union in the Kingdom of Cambodia or his/her representative.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Honorary Members</strong>&nbsp;may be appointed for life or for such period as the Board of Directros&nbsp;shall decide and such membership may be removed by resolution of the Board of Directors. Except as otherwise stated herein, Honorary Members &nbsp;shall be entitled to all the privileges of Associate Members.</p>\r\n\r\n<p><strong>7.2:</strong>&nbsp;<strong>Founding Association</strong></p>\r\n\r\n<ul>\r\n	<li>The Founding Associations are ADW, BRITCHAM and CCIFC who, together, initiated the establishment of EuroCham Cambodia and developed its original Statutes.</li>\r\n	<li>CCIFC &nbsp;and &nbsp;ADW &nbsp;have &nbsp;decided &nbsp;to &nbsp;integrate &nbsp;EuroCham Cambodia &nbsp;as &nbsp;National Chapters (as defined in Article 9).</li>\r\n	<li>&nbsp;As at the date of effect of these Statutes:</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>All members of ADW and CCIFC who were members of EuroCham when EuroCham was established in 2011 are granted the status of EuroCham Cambodia Ordinary Members and are also granted the right to preserve that quality in the future as long as they remain members in good standing.&nbsp;</li>\r\n	<li>EuroCham &nbsp;Cambodia&rsquo;s &nbsp;retained &nbsp;earnings &nbsp;remain &nbsp;theirs, &nbsp;ADW&rsquo;s &nbsp;retained earnings remain theirs, and CCIFC&rsquo;s retained earnings remain theirs.</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>BRITCHAM remains a Founding Member of EuroCham Cambodia and retains special status via one seat on the Board of Directors. BRITCHAM&#39;s members shall pay 50% of EuroCham Cambodia&#39;s membership fees, should they choose to become EuroCham Cambodia Associate Members.&nbsp;</li>\r\n	<li>In &nbsp;order &nbsp;to &nbsp;protect &nbsp;BRITCHAM&#39;s&nbsp; independence,&nbsp; British members of EuroCham may not form a National Chapter (Article 9). BRITCHAM however may decide at any time to integrate into EuroCham Cambodia fully as a founding association in the same manner as CCIFC and ADW giving them the same rights and responsibilities.</li>\r\n</ul>\r\n\r\n<p><strong>7.3:</strong>&nbsp;<strong>Admission</strong></p>\r\n\r\n<p>Any natural or legal entities that wish to become members of EuroCham Cambodia shall be required to submit an application for membership in compliance with the procedures prescribed in EuroCham Cambodia&rsquo;s Internal Rules. All such applications will be reviewed and are required to be approved by the Board of Directors.</p>\r\n\r\n<p><strong>A</strong><strong>rticle 8:&nbsp;</strong>EuroCham Cambodia&rsquo;s members will forfeit their membership for any of the following reasons:</p>\r\n\r\n<ul>\r\n	<li>Resignation or non-payment of membership fees;</li>\r\n	<li>Death or bankruptcy;</li>\r\n	<li>Decision made with the vote of 2/3 (two thirds) of the entire Board of Directors;</li>\r\n	<li>Conviction for criminal offense of the member or the representative of the member</li>\r\n	<li>Becomeing non-complant with the eligibility requirements set out in 7.1</li>\r\n</ul>\r\n\r\n<h5>CHAPTER V: NATIONAL CHAPTERS WITHIN EUROCHAM CAMBODIA</h5>\r\n\r\n<p>Article 9:&nbsp;EuroCham&nbsp;Cambodia explicitly supports European cultural diversity and supports the creation of National Chapters by members of any single European country.</p>\r\n\r\n<ul>\r\n	<li>National Chapters can be established with a minimum of 10 ordinary EuroCham Cambodia members.</li>\r\n	<li>National Chapters may submit their own Bylaws to the approval of EuroCham Cambodia&#39;s Board of Directors, or use default Bylaws as recommended within EuroCham Cambodia&#39;s own Bylaws.&nbsp;</li>\r\n	<li>Any National Chapter with a minimum of 20 members may nominate one (1)&nbsp; member to EuroCham Cambodia&rsquo;s Board of Directors. If the chapter membership decreases to below 20 members for a period of more than two years, the board seat will be&nbsp;temporarily suspended until such time as the membership again reaches the minimum number of 20 members again.&nbsp;</li>\r\n	<li>The Founding Associations CCIFC and ADW, although integrated as National Chapters, do not have the right to nominate any additional members to EuroCham Cambodia&rsquo;s &nbsp;Board of Directors beyond those provided for in Art. 17.3.</li>\r\n	<li>National Chapters&rsquo; budgets are administered by EuroCham Cambodia. Every national Chapter with a minimum of 10 members has the right to autonomously administer a subset of budget equal to 40% of its members&rsquo; annual membership fees, and to allocate that budget to its own cultural activities (i.e. activities not related to business nor business services, for which EUROCHAM Cambodia is responsible).</li>\r\n	<li>If the membership of a national chapter falls below 10 members for a period greater than two years it shall be dissolved.&nbsp;</li>\r\n	<li>Both New and Existing EuroCham Cambodia members may choose to join one (1) or more than one (1)&nbsp;&nbsp;National Chapter(s) of their choice subject to validation of the membership by the relevant National Chapter(s).&nbsp;New and Existing EuroCham Cambodia members, who wish to join more than one additional National Chapters, shall pay an additional fee representing 40% of&nbsp; the annual applicable membership fee per one (1) additional National Chapter. Such additional fee shall be entirely allocated to the relevant National Chapter(s).</li>\r\n</ul>\r\n\r\n<h5>CHAPTER VI: RIGHTS AND RESPONSIBILITIES OF THE MEMBERS</h5>\r\n\r\n<p>Article 10<strong>:&nbsp;</strong>All members shall be entitled:</p>\r\n\r\n<ul>\r\n	<li>To participate in EuroCham Cambodia&rsquo;s meetings in accordance with EuroCham Cambodia&rsquo;s invitations;</li>\r\n	<li>If an Ordinary Member, to stand for election and to elect the Board of Directors;</li>\r\n	<li>To participate in EuroCham Cambodia&rsquo;s activities as determined by the General Meetings; and,</li>\r\n	<li>To have such other privileges and rights as determined by the Board of Directors.</li>\r\n</ul>\r\n\r\n<p>Article 11<strong>:&nbsp;</strong>Each member has the responsibility and obligation to comply with the decisions made by EuroCham Cambodia&rsquo;s General Meetings.</p>\r\n\r\n<h5>CHAPTER VII: GENERAL MEETINGS</h5>\r\n\r\n<p>Article 12<strong>:</strong>&nbsp;EuroCham Cambodia is &nbsp;to &nbsp;be &nbsp;governed &nbsp;by &nbsp;General &nbsp;Meetings. &nbsp;General &nbsp;Meetings consist of Annual General Meetings and Extraordinary General Meetings. Invited participants of a General Meeting shall include all members and representatives from relevant administrative entities invited by the Board of Directors. Only Ordinary Members may vote at a General Meeting.</p>\r\n\r\n<p>Article 13<strong>:&nbsp;</strong>The matters dealt with at Annual General Meetings shall include:</p>\r\n\r\n<ul>\r\n	<li>The election of eligible EuroCham Cambodia&rsquo;s members to the Board of Directors;</li>\r\n	<li>The examination and approval of EuroCham Cambodia&rsquo;s annual budget;</li>\r\n	<li>The consideration of EuroCham Cambodia&rsquo;s activities and approval of its policies and development programs.</li>\r\n</ul>\r\n\r\n<p>EuroCham Cambodia&rsquo;s Chairperson (all references to a Chairperson in these statutes refers to the Chairperson appointed under Article 17.5) and its Board of Directors are in charge of the implementation of all decisions made at Ordinary General Meetings.</p>\r\n\r\n<p>Article 14<strong>:&nbsp;</strong>Convening Annual General Meetings.</p>\r\n\r\n<ul>\r\n	<li>An Ordinary General Meeting shall be held once every 12 (twelve) months in accordance with the invitation of the Board of Directors;</li>\r\n	<li>All Annual General Meetings shall be chaired by EuroCham Cambodia&rsquo;s Chairperson or, in the Chairperson&rsquo;s absence, the next highest rank within the Board of Directors;</li>\r\n	<li>The quorum of any Annual&nbsp;General Meeting shall consist of 50% + 01 of the aggregate of the Ordinary Members of EuroCham Cambodia&nbsp; either present in person or represented by proxy;</li>\r\n	<li>If after a period of thirty (30) minutes subsequent to the scheduled time as mentioned in the invitation for the Annual General Meeting there is &nbsp;not &nbsp;a quorum present, EuroCham Cambodia&rsquo;s Chairperson shall summon a second meeting in seven days&rsquo; time, and the quorum for such second meeting shall consist of one-third of all Ordinary Members either present in person or represented by poxy (&ldquo;Second Meeting Quorum&rdquo;);</li>\r\n	<li>If after a period of thirty (30) minutes subsequent to the scheduled time for such Second Meeting, there is not a Second Meeting Quorum present, the Board of Directors shall convene a third meeting in three days&rsquo; time, and such Third Meeting shall not require a quorum to conduct business.</li>\r\n	<li>The Chairperson shall provide all members with the agenda for an &nbsp;Ordinary General Meeting at least 7 days prior to commencement of such Ordinary General Meeting. This does not apply with respect to any meeting called as a result of the process set out above to deal with the lack of quorum.</li>\r\n</ul>\r\n\r\n<p><strong>A</strong><strong>rticle 15:&nbsp;</strong>Decisions of Annual General Meetings:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Can only be approved by a simple majority from within the attending Ordinary Members.</li>\r\n	<li>The decisions made by the Ordinary General Meetings shall be duly recorded in the minutes;</li>\r\n	<li>Any dissemination of information about Ordinary General Meetings shall require prior permission from EUROCHAM Cambodia&rsquo;s Chairperson.</li>\r\n</ul>\r\n\r\n<p><strong>A</strong><strong>rticle 16:&nbsp;</strong>Extraordinary General Meetings<br />\r\nAn Extraordinary General Meeting may be called at the request of EUROCHAM Cambodia&rsquo;s Chairperson with the approval of the Board of Directors or must be called upon the request of at least 40% of all Ordinary Members. Such a request from the Ordinary Members must be submitted to the Chairman of the Board of Directors and must provide details of the specific purposes for such meeting. The Chairman shall call the Extraordinary General Meeting within 4 weeks after receipt of the request.</p>\r\n\r\n<p>The quorum of an Extraordinary General Meeting shall be at least a simple majority of 50% plus 1 of the Ordinary Members of EUROCHAM Cambodia either present in person or represented by proxy.&nbsp;</p>\r\n\r\n<p>Decisions of an Extraordinary General Meeting shall require the approval of the smaller of:</p>\r\n\r\n<p>a) 75% of the Ordinary Members present in person or duly represented at such meeting; or</p>\r\n\r\n<p>b)&nbsp; 50% + 1 of all Ordinary Members of EuroCham.</p>\r\n\r\n<h5>CHAPTER VIII:&nbsp;<strong>BOAR</strong><strong>D OF DIRECTORS AND EXECUTIVE COMMITTEE OF THE EUROPEAN CHAMBER OF COMMERCE</strong></h5>\r\n\r\n<p><strong>Article 17:&nbsp;</strong>The activities of EUROCHAM Cambodia shall be managed by a Board of Directors made up of 2 representatives each from the founding associations CCIFC and ADW, one from BRITCHAM, one from each additional national chapter and 7 directly elected board members.&nbsp;</p>\r\n\r\n<p>The Founding Associations integrated as National Chapters shall each nominate two of their members to be Board of Directors Members. Other National Chapters that have been established shall be entitled to nominate one of their &nbsp;members &nbsp;to &nbsp;be &nbsp;a &nbsp;Board &nbsp;of &nbsp;Directors &nbsp;Member. The Ordinary Members shall elect the remaining Board of Directors&rsquo; members &nbsp;of persons of good standing who are either Ordinary Individual Members or Corporate Representatives of Ordinary Corporate Members (&quot;Board of Directors Members&quot;).</p>\r\n\r\n<p>&nbsp;<strong>17.1:&nbsp;</strong>The day-to-day operations of EUROCHAM Cambodia shall be managed by an Executive Director who shall be a European national duly appointed by the Board of Directors to be the Executive Director of EUROCHAM Cambodia. The Executive &nbsp;Director shall execute the general affairs of EUROCHAM Cambodia in accordance with the objectives, policies, constitution, Internal Rules and other regulations of EUROCHAM Cambodia under the supervision and control of the Executive Committee. The Executive Director shall not participate in the vote of resolutions of the Board of Directors, but can provide recommendations to the Board of Directors. The Executive Director shall be assisted by the support staff of EUROCHAM Cambodia.&nbsp;</p>\r\n\r\n<p><strong>17.2</strong><strong>:&nbsp;</strong>Election of Board of Directors Members shall take place in accordance with the voting procedures set out in EUROCHAM Cambodia Internal Rules provided that 1) at least Seven (7) Board of Directors Members are passport holders of a EU Member State, or 2) no more than four (4) passport holders from any one country may be elected or nominated to the Board of Directors at any one time.</p>\r\n\r\n<p><strong>17.3</strong><strong>:&nbsp;</strong>National Chapters shall notify the Executive Director of the identity of the individual(s) they propose to nominate to be a Board of Directors Member at least 10 days prior to the first Board of Directors meeting following the ANnual General Meeting. The Board of Directors shall have the right to veto over the person nominated within 7 days of being notified of the proposed nominee. In the event that the veto is exercised then, the relevant National Chapter shall notify the Board of Directors of an alternative nominee within 14 days of having been advised that the previous nominee has been rejected.&nbsp;</p>\r\n\r\n<p>Ordinary General Meeting. The Board of Directors shall have a right of veto over the person nominated within 7 days of being notified of the proposed nominee. In the event that the right of veto is exercised, then the relevant National Chapter shall notify the Board of Directors of an alternative nominee within 14 days of having been advised that the previous nominee has been rejected.</p>\r\n\r\n<p><strong>17.4</strong>: Board &nbsp;of &nbsp;Directors &nbsp;Members &nbsp;shall &nbsp;be &nbsp;elected at the Annual General Meeting for a term of two years commencing on the date of his/her election and, subject to Article 17.6, terminating on the Annual General Meeting at which a new Board of Directors is elected. This regular election should occur every two years at alternating Annual General Meetings.&nbsp;</p>\r\n\r\n<p>Board of Director Members may be re-elected for subsequent terms.&nbsp;</p>\r\n\r\n<p><strong>17.5</strong>: The Board of Directors shall elect, from among the Board of Directors Members, an Executive Committee comprising of a Chairperson, a Treasurer and a General Secretary, on a majority vote and for a term of office commencing on the date of his/her election, subject to Article 17.6, terminating on the date of&nbsp;the next Annual General Meeting at which new elections take place, and may be re-elected for subsequent terms.</p>\r\n\r\n<p>The Executive Committee shall also include three Vice-Chairpersons: one Vice-Chairperson nominated by each of the three Founding Associations respectively.&nbsp;</p>\r\n\r\n<p><strong>17.6</strong><strong>:&nbsp;</strong>If a Board of Directors Member wishes to resign from the Board of Directors, or is absent from three consecutive Board of Directors Meetings, or ceases to be ordinarily resident in Cambodia, or ceases to be the&nbsp;Corporate Representative of the Ordinary Corporate Member he or she was elected to represent, or ceases to be an Ordinary Individual Member, or is requested to resign from office at any time pursuent to a resolution of a two-thirds&#39; (2/3) majority vote of the Board of Directors Members, then he/she shall give written notice of his/her resignation to the Board of Directors. If no such notice is given within two weeks of any of the aforementioned conditions being met, he/she shall be deemed to have resigned from the Board of Directors.&nbsp;</p>\r\n\r\n<p>On resignation or termination of office of any Board of Directors Member for any reason before the expiration of his/her normal tenure of office, the Board of Directors may invite another eligible Ordinary Member to fill the vacancy and such Ordinary Member shall remain in office until the next Annual General Meeting at which time a Special Election for that position must take place. Any person elected in a Special Election shall serve until that current board term is completed.</p>\r\n\r\n<p>If a resigning or terminated Board of Directors Member is also a member of the Executive Committee, the Board of Directors shall elect by majority vote another Board of Directors Member to take his/her place on the same terms as set out in Article 17.5.</p>\r\n\r\n<p><strong>17.7</strong><strong>:&nbsp;</strong>The Board of Directors shall regulate its own proceedings as it sees fit in accordance with the provisions of these Statutes and EUROCHAM&nbsp;Cambodia Internal Rules. Generally and without limiting its powers, the Board of Directors shall:</p>\r\n\r\n<ul>\r\n	<li>Elect the Members of the Executive Committee;</li>\r\n	<li>Decide the establishment of Sectoral Committees or sub-Committees of common interest;</li>\r\n	<li>Approve the Internal Rules of EuroCham Cambodia;</li>\r\n	<li>Approve the recruitment of the Executive Director;</li>\r\n	<li>Approve the strategic direction of EuroCham Cambodia;</li>\r\n	<li>Approve budgets and account statements;</li>\r\n	<li>Approve the Annual Report to the Members;</li>\r\n	<li>Approve the Board of Directors decisions;</li>\r\n	<li>Monitor EuroCham Cambodia&#39;s policies and practices with regards to compliance with Internal Rules, local laws and regulations.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>17.8:&nbsp;</strong>The Board of Directors Chairperson shall hold office for a term equal to his/her term as a&nbsp;Board of Directors Member and shall call and chair all Board of Directors Meetings (or, in his/her absence, a Vice Chairperson or another Board of Directors Member nominated by him/her shall chair Board of Directors Meetings).</p>\r\n\r\n<p><strong>17.9</strong><strong>:&nbsp;</strong>The Board of Directors shall meet at least once every three (3) months. If the Board of Directors Chairperson&nbsp;fails to call sufficient&nbsp;Board&nbsp;of Directors&nbsp;Meetings, then any three Board of Directors Members may by written notice to all Board of Directors Members, call a Board of Directors Meeting.&nbsp;</p>\r\n\r\n<p><strong>17.10</strong><strong>:&nbsp;</strong>The quorum for all Board of Directors Meetings shall consist of a simple majority of the Board of Directors Members.</p>\r\n\r\n<p><strong>17.11</strong><strong>:&nbsp;</strong>At Board of Directors Meetings, each Board of Directors Member present shall have one vote and resolutions shall be passed by majority vote. In the event of a tie at any Board of Directors Meeting, the Board of Directors Chairperson shall have a casting vote.&nbsp;</p>\r\n\r\n<p><strong>17.12</strong>: The Board of Directors may pass a resolution without holding a Board of Directors Meeting, provided that a five (5) days written notice is given to the Board of Director Members prior to casting the vote. Such resolution shall be valid and enforceable as if it were passed at a Board of Directors Meeting if it is signed by at least seven (7) Board of Directors Members. The &nbsp;signature of the&nbsp;Directors&nbsp;may be contained in a&nbsp;single document or may consist of several documents, all in like form. For the purpose of this Article, &ldquo;in writing&rdquo; and &ldquo;signed&rdquo; include approval by email or other electronic communication as agreed by the Board of Directors. The duly signed resolution shall be delivered by the Chairman.&nbsp;</p>\r\n\r\n<p><strong>17.13</strong><strong>:&nbsp;</strong>The Board of Directors may invite, at its discretion, any Members or other persons to attend Board of Directors Meetings on a regular or a case-by-case basis, as decided by the Executive Committee.</p>\r\n\r\n<p><strong>17.14</strong><strong>:&nbsp;</strong>Unless specifically stated otherwise &nbsp;herein, all documents relating to EuroCham Cambodia shall be valid if approved at a Board of Directors Meeting and signed by any two (2) of its Board of Directors Members.</p>\r\n\r\n<p><strong>17.15</strong><strong>:&nbsp;</strong>All Board of Directors Members including the Board of Directors Chairperson and Vice Chairpersons shall be indemnified and held harmless by EuroCham Cambodia against all &nbsp;losses, liabilities &nbsp;and &nbsp;expenses &nbsp;threatened,&nbsp; incurred &nbsp;or&nbsp; suffered &nbsp;by &nbsp;him/her &nbsp;in connection with his/her term of office as a&nbsp;Board of Directors Member and/or as Chairperson and Vice Chairperson (whether arising during or after such term of office) provided that such Board of Directors Member has acted honestly and in good faith and in a manner he/she believed to be in, or not opposed to, the best interests of EuroCham&nbsp;Cambodia.</p>\r\n\r\n<p><strong>17.15</strong><strong>: &nbsp;</strong>The Executive Committee members shall have the following responsibilities:</p>\r\n\r\n<ul>\r\n	<li>The Chairperson is responsible for guiding/directing the activities of EuroCham Cambodia;</li>\r\n	<li>The Vice-Chair persons are the deputies to the Chairpersons and one of them shall be assigned by the Chairperson, or by the Board of Directors if the Chairperson has not already done so, to act as the Chairperson during the absence of the Chairperson or if the Chairperson resigns from his position;</li>\r\n	<li>The Treasurer&nbsp;supervises&nbsp;the&nbsp;preparation&nbsp;of&nbsp;the&nbsp;accounts&nbsp;of&nbsp;EuroCham, which are to be audited by a duly-registered&nbsp;auditing company;</li>\r\n	<li>The General Secretary ensures that EuroCham Cambodia operates in accordance with its Statutes and its Internal Rules. He/she is responsible for the minutes of the Executive Committee meetings and of the Board of Directors meetings or may delegate such task to the Executive Director.&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>17.16:&nbsp;</strong>The Executive Committee shall meet as often as necessary and at least once every month. The quorum shall comprise of not less than three (3) Executive Committee Members.</p>\r\n\r\n<p><strong>17.17:&nbsp;</strong>The Executive Committee shall regulate its own proceedings as it sees fit and generally and without limiting its power shall:</p>\r\n\r\n<ul>\r\n	<li>Through the Executive Director manage and supervise the day-to-day operations of EuroCham Cambodia and the implementation of any EuroCham Cambodia and the implementation of any EuroCham Cambodia contracts;</li>\r\n	<li>Prepare the Internal Rules of EuroCham Cambodia to be submitted to the approval of the Board of Directors;</li>\r\n	<li>Propose the annual Budgets of EuroCham Cambodia to be submitted to the approval of the Board of Directors;</li>\r\n	<li>Approve any remuneration for senior personnel;&nbsp;</li>\r\n	<li>Propose &nbsp;activities &nbsp;that &nbsp;it &nbsp;considers &nbsp;desirable &nbsp;or &nbsp;necessary &nbsp;for &nbsp;EuroCham Cambodia to operate;</li>\r\n	<li>Confirm the approval of new members;</li>\r\n	<li>Prepare the accounts of EuroCham Cambodia to be submitted to the approval of the Board of Directors;</li>\r\n	<li>Report on EuroCham Cambodia&rsquo;s activities to the Board of Directors;</li>\r\n	<li>Make recommendations to the Board of Directors;;</li>\r\n	<li>Implement the decisions of the Board of Directors.</li>\r\n</ul>\r\n\r\n<h5><strong>CHAPTER IX: BUDGET AND SOURCE OF RESOURCE</strong></h5>\r\n\r\n<p><strong>Article 18:</strong>&nbsp;The Budget and source of revenue of EuroCham Cambodia shall derive and originate from:</p>\r\n\r\n<ul>\r\n	<li>Contributions and fees of members;</li>\r\n	<li>Grants or donations from local and international organisations; and</li>\r\n	<li>Miscellaneous revenues derived from its services.</li>\r\n</ul>\r\n\r\n<p><strong>A</strong><strong>rticle 19:&nbsp;</strong>All EuroCham Cambodia&rsquo;s expenses must be within its approved budget or, if not, requires prior written consent by the Chairman or the Board of Directors.</p>\r\n\r\n<h5><strong>CHAPTER X: STATUTE AMENDMENT, DISSOLUTION AND LIQUIDATION</strong></h5>\r\n\r\n<p><strong>A</strong><strong>rticle 20:&nbsp; &nbsp;</strong>Until the first Ordinary General Meeting following the acceptance of these Statutes by the Founding Associations, modifications of the Statutes shall be effective if supported by a majority vote 50% + 1 of the Board of Directors including at least one representative of each of the three Founding Associations.</p>\r\n\r\n<p>After such first Ordinary General Meeting, modifications to these Statutes may only be made at an Extraordinary General Meeting called for such purpose and shall require the approval of at least 75% of the meetings participants.&nbsp;</p>\r\n\r\n<p>Any proposal for amendment of the Statutes presented for approval to General Meetings must have the prior approval a majority vote 50% + 1 of the Board of Directors including at least one representative of each of the three Founding Associations.</p>\r\n\r\n<p>Any such proposal shall be submitted to the Board of Directors at least a month prior to the proposed General Meetings at which the amendments will be considered.</p>\r\n\r\n<p><strong>A</strong><strong>rticle 21:&nbsp;</strong>Matters not addressed in these Statutes shall be dealt with in EuroCham Cambodia&rsquo;s Internal Rules or any other internal procedures.&nbsp;</p>\r\n\r\n<p><strong>A</strong><strong>rticle 22:&nbsp;</strong>Should the Board of Directors decide &nbsp;that &nbsp;EuroCham &nbsp;Cambodia &nbsp;is &nbsp;not &nbsp;able &nbsp;to continue operating, the Board of Directors shall convene an Extraordinary General Meeting to:</p>\r\n\r\n<p>&bull;&nbsp; &nbsp; &nbsp; Call for an election to dissolve EuroCham Cambodia;</p>\r\n\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Form&nbsp;a&nbsp;commission&nbsp;to&nbsp;liquidate&nbsp;moveable&nbsp;and&nbsp;immoveable&nbsp;property&nbsp;of EuroCham Cambodia;</p>\r\n\r\n<p>A decision on dissolution of the association shall require the approval of 2/3 of the Ordinary General Members present for the Extraordinary General Meeting called for such purpose.&nbsp;</p>\r\n\r\n<h5><strong>CHAPTER XI: FINAL PROVISIONS</strong></h5>\r\n\r\n<p><strong>Article 23:</strong>&nbsp;Members of EuroCham Cambodia must strictly comply with the Statutes and EuroCham Cambodia&rsquo;s Internal Rules.</p>\r\n\r\n<p>Phnom Penh, March 2018</p>\r\n\r\n<p>Arnaud Darc - CHAIRMAN</p>\r\n ', '<p>ជំពូកទី 1: គោលដៅ<br />\r\nមាត្រា 1: សមាគមអាជីវកម្មដែលបង្កើតឡើងនេះជាអង្គការឯករាជ្យមិនត្រូវស្ថិតនៅក្រោមការត្រួតពិនិត្យរបស់គណបក្សនយោបាយទេហើយត្រូវធ្វើការដើម្បីផលប្រយោជន៍របស់សមាជិក។<br />\r\nមាត្រាទី 2: សមាជិកភាពនៃសមាគមពាណិជ្ជកម្មត្រូវបើកចំហដល់ពាណិជ្ជករឬអ្នកជំនាញការដោយមិនគិតពីសម្ព័ន្ធភាពនយោបាយរបស់ពួកគេដោយផ្អែកលើមូលដ្ឋានដែលកំណត់លក្ខន្តិកៈទាំងនេះ។<br />\r\nមាត្រា 3 សមាគមអាជីវកម្មនេះត្រូវអនុវត្តសកម្មភាពដូចមានចែងក្នុងមាត្រា 6 ហើយអាចបង្កើតសាខានៅគ្រប់ទីកន្លែងក្នុងព្រះរាជាណាចក្រកម្ពុជាឬនៅបរទេស។<br />\r\nមាត្រា 4: សមាគមអាជីវកម្មត្រូវប្រតិបត្តិជាអចិន្ត្រៃយ៍ដោយពុំមានអាណត្តិនៃការផុតកំណត់កំណត់។</p>\r\n\r\n<p>ជំពូកទី 2: ឈ្មោះនិងអាសយដ្ឋាន<br />\r\nមាត្រា 5: ឈ្មោះរបស់សមាគមអាជីវកម្មគឺ: សភាពាណិជ្ជកម្មអឺរ៉ុបនៅកម្ពុជា។ វាត្រូវមានឈ្មោះជាអក្សរកាត់: EuroCham Cambodia ឬអ។ វ។ ត។ ក។ អាស័យដ្ឋានរបស់សមាគមធុរកិច្ចគឺជា: អគារលេខ 30 មហាវិថីព្រះនរោត្តមសង្កាត់ផ្សារថ្មី 3 ខណ្ឌដូនពេញភ្នំពេញកម្ពុជា។ ឈ្មោះនិងអាសយដ្ឋានអាចត្រូវបានផ្លាស់ប្តូរស្របតាមការសម្រេចចិត្តរបស់ក្រុមប្រឹក្សាភិបាលរបស់ EuroCham ។</p>\r\n\r\n<p>ជំពូកទី 3: ភារកិច្ចរបស់អង្គការយូណេស្កូ<br />\r\nមាត្រា 6: EuroCham Cambodia ត្រូវបានបង្កើតឡើងដើម្បីតំណាងឱ្យពាណិជ្ជករនិងសហគ្រិននៅអឺរ៉ុបដែលកំពុងរស់នៅនិងធ្វើការនៅប្រទេសកម្ពុជានិងធ្វើសកម្មភាពជំនួសពួកគេនៅពេលដែលសមស្រប។ បេសកកម្មរបស់ខ្លួនគឺដើម្បីក្លាយទៅជាធនធានដ៏សំខាន់មួយសម្រាប់បញ្ហាជំនួញវិនិយោគនិងបញ្ញាពាណិជ្ជកម្មនៅក្នុងប្រទេស។ វាមានគោលបំណងជំរុញការធ្វើពាណិជ្ជកម្មផ្លាស់ប្តូរព័ត៌មានស្តីពីបទបញ្ញត្តិតស៊ូមតិជាមួយរាជរដ្ឋាភិបាលកម្ពុជាលើបញ្ហាពាក់ព័ន្ធនឹងពាណិជ្ជកម្មអឺរ៉ុបក៏ដូចជាការលើកកម្ពស់ទំនាក់ទំនងសេដ្ឋកិច្ចនិងវប្បធម៌រវាងអឺរ៉ុបនិងកម្ពុជាហើយផ្ទុយទៅវិញ។</p>\r\n\r\n<p>ជាពិសេសក្រុមហ៊ុនទូរស័ព្ទ EuroCham មានភារកិច្ចដូចតទៅ:</p>\r\n\r\n<p>ដើម្បីជួយសម្រួលនិងបង្កើនការវិនិយោគពីរវិធីលំហូរពាណិជ្ជកម្មនិងពាណិជ្ជកម្មរវាងប្រទេសកម្ពុជានិងសហភាពអឺរ៉ុប។<br />\r\nដើម្បីជួយក្នុងការអភិវឌ្ឍសេដ្ឋកិច្ចកម្ពុជា។<br />\r\nដើម្បីលើកកំពស់ទម្រង់នៃប្រទេសកម្ពុជានិងអាជីវកម្មនៅកម្ពុជាក្នុងសហគមន៍ធុរកិច្ចសហភាពអឺរ៉ុបនិងទម្រង់នៃសហភាពអឺរ៉ុបនៅក្នុងសហគមន៍ធុរកិច្ចកម្ពុជា។<br />\r\nបំពេញបន្ថែមសកម្មភាពទ្វេភាគីដែលអនុវត្តដោយបេសកកម្មនិង / ឬអង្គការពាណិជ្ជកម្មនៃរដ្ឋជាសមាជិកសហភាពអឺរ៉ុប។<br />\r\nផ្តល់សេវាកម្មដល់សមាជិកនិងសមាជិកមិនមែនទាក់ទងទៅនឹងបញ្ហាសេដ្ឋកិច្ចពាណិជ្ជកម្មច្បាប់ផ្នែកបច្ចេកទេសហិរញ្ញវត្ថុទីផ្សារនិងបញ្ហាផ្សេងៗទៀត។<br />\r\nសម្រួលដល់ការបង្កើតសម្ព័ន្ធភាពយុទ្ធសាស្ត្ររវាងក្រុមហ៊ុនខ្នាតតូចនិងមធ្យមនៃប្រទេសកម្ពុជានិងរដ្ឋជាសមាជិកសហភាពអឺរ៉ុប។<br />\r\nដើម្បីអនុវត្តសកម្មភាពទាំងអស់ដើម្បីសម្រេចបាននូវវត្ថុដែលបានបញ្ជាក់ខាងលើនេះស្របតាមលក្ខន្តិកៈទាំងនេះវិធានផ្ទៃក្នុងរបស់អឺរ៉ុសខេមបូឌាដែលបំពេញបន្ថែមលក្ខន្តិកៈទាំងនេះនិងការសម្រេចចិត្តរបស់ EuroCham Cambodia ។<br />\r\nជំពូកទី 4: សមាជិក<br />\r\n&nbsp;<br />\r\nមាត្រា 7:</p>\r\n\r\n<p>7.1: សមាជិកភាពនៅក្នុង EuroCham កម្ពុជាត្រូវបានបែងចែកជា 3 ប្រភេទសំខាន់ៗ:</p>\r\n\r\n<p>សមាជិកសាមញ្ញអាចជា:</p>\r\n\r\n<p>សមាជិកក្រុមហ៊ុនធម្មតា: ក្រុមហ៊ុនដែលមានជំហរល្អដែលមានវត្តមានស្របច្បាប់នៅក្នុងប្រទេសកម្ពុជាឬមានបំណងបង្កើតវត្តមាននៅក្នុងប្រទេសកម្ពុជានិង:</p>\r\n\r\n<p>(1) បានបង្កើតឡើងនៅក្រោមច្បាប់នៃរដ្ឋជាសមាជិកសហភាពអឺរ៉ុបណាមួយ; ឬ<br />\r\n(2) ក្រុមហ៊ុនបុត្រសម្ព័ន្ធភាគច្រើននៃក្រុមហ៊ុនទាំងនោះ ឬ<br />\r\n(3) ដោយផ្ទាល់ឬដោយប្រយោលដែលភាគច្រើនជាកម្មសិទ្ធិរបស់ប្រជាពលរដ្ឋនៃរដ្ឋជាសមាជិកសហភាពអឺរ៉ុបណាមួយ។ ឬ<br />\r\n(4) អាចបង្ហាញពីការពេញចិត្តរបស់គណៈកម្មាធិការប្រតិបត្តិនៃអង្គការអ៊ឺរ៉ុបខេមបូឌាថាពួកគេមានទំនាក់ទំនងយ៉ាងសំខាន់ជាមួយសហភាពអឺរ៉ុប។<br />\r\nឬ</p>\r\n\r\n<p>សមាជិកបុគ្គលសាមញ្ញ: បុគ្គលដែលមានជំហរល្អ</p>\r\n\r\n<p>(1) ដែលជាជនជាតិនៃរដ្ឋជាសមាជិកសហភាពអឺរ៉ុបណាមួយ។ ឬ<br />\r\n(2) ដែលជាប្រជាជនសាមញ្ញនៅកម្ពុជាដែលអាចបង្ហាញពីការពេញចិត្តរបស់គណៈកម្មាធិការប្រតិបត្តិថាពួកគេចូលរួមយ៉ាងសកម្មនៅក្នុងពាណិជ្ជកម្មពាណិជ្ជកម្មការវិនិយោគនិង / ឬសកម្មភាពផ្សេងទៀតដែលបានអនុញ្ញាតនៅក្នុងប្រទេសកម្ពុជា។<br />\r\nសមាជិករងអាចជា:</p>\r\n\r\n<p>សមាជិកសមាគម: (1) ក្រុមហ៊ុនដែលមានជំហរល្អដែលត្រូវបានបង្កើតឡើងក្រោមច្បាប់របស់ប្រទេសកម្ពុជា។ ក្រុមហ៊ុនដែលមានជំហរល្អដែលមិនមានវត្តមានស្របច្បាប់នៅក្នុងប្រទេសកម្ពុជាប៉ុន្តែត្រូវបានបង្កើតឡើងក្រោមច្បាប់របស់រដ្ឋជាសមាជិកសហភាពអឺរ៉ុបណាដែលជាក្រុមហ៊ុនបុត្រសម្ព័ន្ធភាគច្រើននៃក្រុមហ៊ុនទាំងនោះឬដែលអាចបង្ហាញការពេញចិត្តរបស់គណៈកម្មាធិការប្រតិបត្តិថា ពួកគេមានទំនាក់ទំនងយ៉ាងសំខាន់ជាមួយសហភាពអឺរ៉ុបនិងកម្ពុជា។</p>\r\n\r\n<p>ឬ</p>\r\n\r\n<p>សមាជិកដែលជាសមាជិករួមគ្នា: បុគ្គលដែលមានសភាពល្អដែលជាសញ្ជាតិរបស់រដ្ឋសមាជិកសហភាពអឺរ៉ុបណាម្នាក់ឬដែលអាចបង្ហាញពីការពេញចិត្តរបស់គណកម្មាធិការប្រតិបត្តិថាពួកគេចូលរួមយ៉ាងសកម្មនៅក្នុងពាណិជ្ជកម្មជំនួញការវិនិយោគនិង / ឬសកម្មភាពផ្សេងទៀតដែលបានអនុញ្ញាតនៅក្នុងប្រទេសកម្ពុជានិង / ឬ សហភាពអឺរ៉ុបនិង (1) អ្នកដែលមិនមានជាទូទៅរស់នៅក្នុងប្រទេសកម្ពុជាប៉ុន្តែមិនមែនជាសមាជិកនៃអង្គការដែលអាចក្លាយជាសមាជិកនៃសាជីវកម្មនោះទេ។</p>\r\n\r\n<p>ក្រុមហ៊ុនអឺរ៉ូខមខេមបូឌាអាចបដិសេធការស្នើសុំសមាជិកភាពរបស់បុគ្គលម្នាក់ៗដែលជាសមាជិកនៃក្រុមហ៊ុនដែលមានសិទ្ធិចូលរួមជាសមាជិកក្រុមហ៊ុនរបស់ក្រុមហ៊ុនអឺរ៉ុមខេមកម្ពុជាបានកំណត់ថាគោលបំណងរបស់អ្នកស្នើសុំគឺដើម្បីតំណាងឱ្យក្រុមហ៊ុននោះ។</p>\r\n\r\n<p>សមាជិកភាពកិត្តិយស</p>\r\n\r\n<p>សមាជិកកិត្តិយសអាចរួមមាន:</p>\r\n\r\n<p>ឯកអគ្គរដ្ឋទូតនៃរដ្ឋសមាជិកសហភាពអឺរ៉ុបដែលត្រូវបានតែងតាំងក្នុងប្រទេសកម្ពុជា។</p>\r\n\r\n<p>មនុស្សម្នាក់ភាពជាដៃគូក្រុមហ៊ុនសាជីវកម្មឬអង្គភាពដែលត្រូវបានអញ្ជើញដោយគណៈកម្មាធិការប្រតិបត្តិដែលបានបង្កើតឬទំនងជា</p>\r\n '),
(2, 'Terms of Use ', 'លក្ខ័ណ្ឌនៃការប្រើប្រាស់', '<p>English Text</p>\r\n ', '<p>អត្ថបទជាភាសាខ្មែរ</p>\r\n '),
(3, 'Privacy Policy ', 'គោលការណ៍រក្សារការសម្ងាត់', '<p>English Text</p>\r\n ', '<p>អត្ថបទជាភាសាខ្មែរ</p>\r\n '),
(4, 'Contact', 'ទំនាក់ទំនង', '<p>English Text</p>\r\n ', '<p>អត្ថបទជាភាសាខ្មែរ</p>\r\n '),
(5, 'Sponsorship ', 'ការឧបត្ថម្ភ', '<p>English Text</p>\r\n ', '<p>អត្ថបទជាភាសាខ្មែរ</p>\r\n '),
(6, 'Sitemap ', 'ផែនទីប្រាប់ទីតាំង', '<p>English Text</p>\r\n ', '<p>អត្ថបទជាភាសាខ្មែរ</p>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer_text`
--

CREATE TABLE `tbl_footer_text` (
  `ft_id` int(11) NOT NULL,
  `ft_text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_footer_text`
--

INSERT INTO `tbl_footer_text` (`ft_id`, `ft_text`) VALUES
(1, '<p>Lyna-CarRental.Com</p>\r\n '),
(2, '<p>Copyright &copy;2001 - 2019 All Rights Reserved by Lyna-CarRental.Com</p>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ft_img_foooter`
--

CREATE TABLE `tbl_ft_img_foooter` (
  `ft_id` int(11) NOT NULL,
  `ft_title` text COLLATE utf8_bin NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ft_img_foooter`
--

INSERT INTO `tbl_ft_img_foooter` (`ft_id`, `ft_title`, `ft_detail`) VALUES
(1, 'https://www.facebook.com/Lyna-CarRentalCom-705428602878507/', 'fa fa-facebook   '),
(2, 'https://twitter.com/LCarrental', 'fa fa-twitter  '),
(3, 'https://plus.google.com/', 'fa fa-google '),
(4, 'https://www.linkedin.com/in/lyna-carrental-a37410138/', 'fa fa-linkedin  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ft_job_announ`
--

CREATE TABLE `tbl_ft_job_announ` (
  `ft_id` int(11) NOT NULL,
  `ft_title` text COLLATE utf8_bin NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ft_job_announ`
--

INSERT INTO `tbl_ft_job_announ` (`ft_id`, `ft_title`, `ft_detail`) VALUES
(1, 'Assistant Operations Manager, Medical Services', '<h4><a href=\"Lyna-CarRental/job/247/Assistant-Operations-Manager-Medical-Services.html\">Assistant Operations Manager, Medical Services</a>&nbsp;detailccccv</h4>\r\n '),
(2, 'Assistant Operations Manager, Medical Services', '<h4><a href=\"http://localhost:88/Lyna-CarRental/job/247/Assistant-Operations-Manager-Medical-Services.html\">Assistant Operations Manager, Medical Services</a></h4>\r\n '),
(3, 'Business Development Manager', '<h4><a href=\"http://localhost:88/Lyna-CarRental/job/248/Business-Development-Manager.html\">Business Development Manager</a></h4>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ft_latest_news`
--

CREATE TABLE `tbl_ft_latest_news` (
  `ft_id` int(11) NOT NULL,
  `ft_title` text COLLATE utf8_bin NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ft_latest_news`
--

INSERT INTO `tbl_ft_latest_news` (`ft_id`, `ft_title`, `ft_detail`) VALUES
(1, 'Event Recap: Breakfast Talk on Laos Business Opportunitiesddd', '<h4><a href=\"http://localhost:88/Lyna-CarRental/#\">Event Recap: Breakfast Talk on Laos Business Opportunities</a>&nbsp;Detail</h4>\r\n '),
(2, 'Lyna-CarRental.Com will release its new car rental system to the public within the next two months', '<h4>jkhjkkjfdhjkadfhkjadfghjjhiuko</h4>\r\n '),
(3, 'LCRC, chambers and other business associations sign an MoU with the Cambodia Chamber of Commerce.', '<h4><a href=\"http://localhost:88/Lyna-CarRental/#\">LCRC, chambers and other business associations sign an MoU with the Cambodia Chamber of Commerce.</a></h4>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ft_phone`
--

CREATE TABLE `tbl_ft_phone` (
  `ft_id` int(11) NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ft_phone`
--

INSERT INTO `tbl_ft_phone` (`ft_id`, `ft_detail`) VALUES
(1, '+855 (0)92 14 30 14 '),
(2, '+855 (0)12 345 644  '),
(3, '+855 (0)12 55 42 47  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ft_upcoming`
--

CREATE TABLE `tbl_ft_upcoming` (
  `ft_id` int(11) NOT NULL,
  `ft_title` text COLLATE utf8_bin NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ft_upcoming`
--

INSERT INTO `tbl_ft_upcoming` (`ft_id`, `ft_title`, `ft_detail`) VALUES
(1, 'Event Recap: Breakfast Talk on Laos Business Opportunities', '<h4><a href=\"http://localhost:88/Lyna-CarRental/#\">Event Recap: Breakfast Talk on Laos Business Opportunities</a>&nbsp;Detail more</h4>\r\n '),
(3, 'Breakfast Talk on Managerial Delegation', '<h4><a href=\"http://localhost:88/Lyna-CarRental/event/526/Breakfast-Talk-on-Managerial-Delegation.html\">Breakfast Talk on Managerial Delegation</a>&nbsp;detail</h4>\r\n '),
(8, 'NEW SYSTEM ORIENTATION SEMINAR CONDUCTED IN SEPTEMBER 2019', '<h4>Hello everyone,</h4>\r\n\r\n<p>Lyna-CarRental.Com will organize a 3-day&nbsp;seminar on how to operate&nbsp;a new system in September 2019 in Battambang province. For more details:<br />\r\n<br />\r\nDate: ____ / ____/____<br />\r\nTime: 00:00AM to 12:00 Noon<br />\r\nVenue: Steung Sangke Hotel, Address: ____, Street: ____, Phum: ___, Khum: ____<br />\r\nObjective of the Seminar: ______________<br />\r\nAdminssion Fee: Free of charge<br />\r\nMaximun of Participants: 60 persons<br />\r\nDuration: _________</p>\r\n\r\n<p>Note: As the number of seats is limited, please book for your seat as so soon as possible. &quot;First comes first serves&quot; will be applied.<br />\r\n<br />\r\nPlease stay-tuned with us!<br />\r\n<br />\r\nFor further information about the seminar, please send call to 092 14 30 14 or send note to info@lyna-carrental.com<br />\r\n&nbsp;</p>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guestbook`
--

CREATE TABLE `tbl_guestbook` (
  `gues_id` int(11) NOT NULL,
  `gues_name` varchar(50) NOT NULL,
  `gues_subject` char(100) NOT NULL,
  `gues_email` char(100) NOT NULL,
  `gues_img` char(100) NOT NULL,
  `gues_text` text NOT NULL,
  `date_audit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_guestbook`
--

INSERT INTO `tbl_guestbook` (`gues_id`, `gues_name`, `gues_subject`, `gues_email`, `gues_img`, `gues_text`, `date_audit`) VALUES
(1, 'Vattana', 'Promote', 'yunvattana@yahoo.com', '20190304_7362.jpg', 'Dear Mrs Tan, We already rent a car with you in 2014 and we were happy of this. We wish to rent your Toyota Hilux (2J-4148-PHP-001) with insurance from Dec 9th till Dec 31st. for self driving. My wife is from Cambodia with a permanent K visa and she still has a close family in Phnom Penh and province. I was self-driving everywhere in Cambodia for a total of 7 months since 2000. However I will need a new Cambodian licence (my Belgian driving licence is issued in French). My previous provisional Cambodian driving licence expired in July 2015. So I would like to know if it is possible to renewed it and if in this situation I need to ask a business visa. Please also kindly note that I would prefer not to let you my passport, so I would agree about an extra deposit. Finally I noticed that your monthly rental price would be more advantageous than your daily price for a 3-week rental. Which could be your best conditions for this car (it seems that I missed your 15% promotion!)? Thank you very much for your kind answer and consideration. Best regards, Pierre Roger -- Pierre Roger 1 rue des Trévires B-1040 Brussels, Belgium Tel +32 (0) 2 7367376 proger@skynet.be', '2019-03-04 07:24:36'),
(2, 'KAKA', 'Cambodia', 'test@gmail.com', '20190304_3284.jpg', 'We are 4 persons and we want to rent a car with driver for go only one way from Phnom Penh to Siem Reap in October. Can you give me the price for this reservation ? Thanks We are French poeple and it\'s the first time that we come in Cambodgia Best regards REVILION Mirreille Dear M Revillion Mireille, Firstly, we would like to express our profoundly thanks for your interesting in our service and query. We saw your mail in the Testimonial page which usually it is used for the guests to view about the comments of the experienced users. Anyway, we are very happy to providing you herewith our answers against to your questions in the blue ones: We are 4 persons and we want to rent a car with driver for go only one way from Phnom Penh to Siem Reap in October. Can you give me the price for this reservation ? Thanks Is it just a drop off service or you would like to use the service for some hours after arriving to Siem Reap? We are French poeple and it\'s the first time that we come in Cambodgia Welcome to Cambodia for your first time here! Hopefully, we are the only one who can help to make you happy in Cambodia while you are here. We look forward to hearing from you and have a great chance to fruitfully serving you in the future. Should you require any further information regarding to the above-mentioned, please feel free to contact us. We are always at your disposal. Yours faithfully, Lyna Tan (Mrs) Founder/Chairwoman Office Address: Building 132, Intersection Streets 430 | 432 | 173 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia T: +855 92 14 30 14 (Office) | T: +855 12 55 42 47 (Cambodian) | T: +855 12 924 517 (English) E: info@lyna-garage.com | W: www.Lyna-Garage.Com Skype: Lyna-CarRental.Com | Line | Viber | WeChat | WhatApp: 012924517 | FB: Lyna-CarRental.Com & Lyna-Garage.C', '2019-03-04 07:32:02'),
(3, 'kemun', 'subject', 'kemun.dev@gmail.com', '20190304_2355.jpg', 'hello', '2019-03-04 07:48:56'),
(4, 'kem', 'dfgfdsg', 'ertet', 'blank.png', 'test', '2019-04-08 10:46:40'),
(5, 'kem', 'dfgfdsg', 'ertet', 'blank.png', 'test', '2019-04-08 10:48:26'),
(6, 'kem', 'dfgfdsg', 'ertet', 'blank.png', 'test', '2019-04-08 10:49:20'),
(7, 'sfsdf', 'ssfsf', 'sfdsf@gmail.com', 'blank.png', 'sfdsdfsdfsfsdfs', '2020-12-15 17:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `holiday_id` int(11) NOT NULL,
  `date_public` date NOT NULL,
  `order_number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_holiday`
--

INSERT INTO `tbl_holiday` (`holiday_id`, `date_public`, `order_number`) VALUES
(14, '2019-01-13', '4'),
(15, '2019-01-20', '5'),
(13, '2019-01-06', '3'),
(12, '2019-01-02', '2'),
(11, '2019-01-01', '1'),
(16, '2019-01-27', '6'),
(17, '2019-02-03', '7'),
(18, '2019-02-10', '8'),
(19, '2019-02-17', '9'),
(20, '2019-02-24', '10'),
(39, '2019-04-07', '16'),
(41, '2019-04-14', '18'),
(40, '2019-04-13', '17'),
(34, '2019-03-31', '11'),
(35, '2019-03-03', '12'),
(36, '2019-03-10', '13'),
(37, '2019-03-17', '14'),
(38, '2019-03-24', '15'),
(42, '2019-04-15', '19'),
(43, '2019-04-16', '20'),
(44, '2019-04-17', '21'),
(45, '2019-04-21', '22'),
(46, '2019-04-28', '23'),
(47, '2019-05-05', '24'),
(48, '2019-05-12', '25'),
(49, '2019-05-19', '26'),
(50, '2019-05-26', '27'),
(51, '2019-06-30', '28'),
(52, '2019-06-02', '29'),
(53, '2019-06-09', '30'),
(54, '2019-06-16', '31'),
(55, '2019-06-23', '32'),
(56, '2019-07-07', '33'),
(57, '2019-07-14', '34'),
(58, '2019-07-21', '35'),
(59, '2019-07-28', '36'),
(60, '2019-08-04', '37'),
(61, '2019-08-11', '38'),
(62, '2019-08-18', '39'),
(63, '2019-08-25', '40'),
(64, '2019-09-01', '41'),
(65, '2019-09-08', '42'),
(66, '2019-09-15', '43'),
(67, '2019-09-22', '44'),
(68, '2019-09-26', '45'),
(69, '2019-09-27', '46'),
(70, '2019-09-28', '47'),
(71, '2019-09-29', '48'),
(72, '2019-09-30', '49'),
(73, '2019-10-06', '50'),
(74, '2019-10-13', '51'),
(75, '2019-10-20', '52'),
(76, '2019-10-27', '53'),
(77, '2019-11-03', '54'),
(78, '2019-11-09', '55'),
(79, '2019-11-10', '56'),
(80, '2019-11-11', '57'),
(81, '2019-11-12', '58'),
(82, '2019-11-13', '59'),
(83, '2019-11-17', '60'),
(84, '2019-11-24', '61'),
(85, '2019-12-01', '62'),
(86, '2019-12-08', '63'),
(87, '2019-12-15', '64'),
(88, '2019-12-22', '65'),
(89, '2019-12-24', '66'),
(90, '2019-12-25', '67'),
(91, '2019-12-29', '68'),
(92, '2020-01-01', '69'),
(93, '2020-01-02', '70'),
(94, '2020-01-05', '71'),
(95, '2020-01-12', '72'),
(96, '2020-01-19', '73'),
(97, '2020-01-26', '74'),
(98, '2020-02-02', '75'),
(99, '2020-02-09', '76'),
(100, '2020-02-16', '77'),
(101, '2020-02-23', '78'),
(102, '2020-03-01', '79'),
(103, '2020-03-08', '80'),
(104, '2020-03-15', '81'),
(105, '2020-03-22', '82'),
(106, '2020-03-29', '83'),
(107, '2020-04-05', '84'),
(108, '2020-04-12', '85'),
(109, '2020-04-13', '86'),
(110, '2020-04-14', '87'),
(111, '2020-04-15', '88'),
(112, '2020-04-16', '89'),
(113, '2020-04-17', '90'),
(114, '2020-04-19', '91'),
(115, '2020-04-26', '92'),
(116, '2020-05-03', '93'),
(117, '2020-05-10', '94'),
(118, '2020-05-17', '95'),
(119, '2020-05-24', '96'),
(120, '2020-06-07', '97'),
(121, '2020-06-14', '98'),
(122, '2020-06-21', '99'),
(123, '2020-06-28', '100'),
(124, '2020-07-05', '101'),
(125, '2020-07-12', '102'),
(126, '2020-07-19', '103'),
(127, '2020-07-26', '104'),
(128, '2020-08-02', '105'),
(129, '2020-08-09', '106'),
(130, '2020-08-16', '107'),
(131, '2020-08-23', '108'),
(132, '2020-08-30', '109'),
(133, '2020-09-06', '110'),
(134, '2020-09-13', '111'),
(135, '2020-09-20', '112'),
(136, '2020-09-26', '113'),
(137, '2020-09-27', '114'),
(138, '2020-09-28', '115'),
(139, '2020-09-29', '116'),
(140, '2020-09-30', '117'),
(141, '2020-10-04', '118'),
(142, '2020-10-11', '119'),
(143, '2020-10-18', '120'),
(144, '2020-10-25', '121'),
(145, '2020-11-01', '122'),
(146, '2020-11-08', '123'),
(147, '2020-11-09', '124'),
(148, '2020-11-11', '125'),
(149, '2020-11-12', '126'),
(150, '2020-11-13', '127'),
(151, '2020-11-15', '128'),
(152, '2020-11-29', '129'),
(153, '2020-12-06', '130'),
(154, '2020-12-13', '131'),
(155, '2020-12-20', '132'),
(156, '2020-12-24', '133'),
(157, '2020-12-25', '134'),
(158, '2020-12-27', '135');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `ht_id` int(11) NOT NULL,
  `ht_title` text COLLATE utf8_bin,
  `ht_image` text COLLATE utf8_bin,
  `ht_location` text COLLATE utf8_bin,
  `ht_phone` text COLLATE utf8_bin,
  `ht_website` text COLLATE utf8_bin,
  `ht_distance` text COLLATE utf8_bin,
  `ht_detail` text COLLATE utf8_bin,
  `price` varchar(255) COLLATE utf8_bin NOT NULL,
  `adult` varchar(11) COLLATE utf8_bin NOT NULL,
  `children` varchar(11) COLLATE utf8_bin NOT NULL,
  `room_total` varchar(11) COLLATE utf8_bin NOT NULL,
  `province_id` int(11) NOT NULL,
  `discount` varchar(255) COLLATE utf8_bin NOT NULL,
  `vat` varchar(255) COLLATE utf8_bin NOT NULL,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`ht_id`, `ht_title`, `ht_image`, `ht_location`, `ht_phone`, `ht_website`, `ht_distance`, `ht_detail`, `price`, `adult`, `children`, `room_total`, `province_id`, `discount`, `vat`, `add_by`) VALUES
(1, 'KAMPONG THOM', '20190724_9734.png', 'Phsar Leu', '012 914 517', 'www.GraceTrading', '30Km', '', '14', '2', '2', '10', 4, '10', '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel_booking`
--

CREATE TABLE `tbl_hotel_booking` (
  `ho_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `adult_number` varchar(255) NOT NULL,
  `children_number` varchar(255) NOT NULL,
  `total_day` varchar(255) NOT NULL,
  `term_id` varchar(255) NOT NULL,
  `transactionId` varchar(255) NOT NULL,
  `amount_web_pay` varchar(255) NOT NULL,
  `book_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel_booking`
--

INSERT INTO `tbl_hotel_booking` (`ho_book_id`, `user_id`, `province_id`, `check_in_date`, `check_out_date`, `adult_number`, `children_number`, `total_day`, `term_id`, `transactionId`, `amount_web_pay`, `book_date`) VALUES
(2, 5, 10, '2019-07-10', '2019-07-12', '2', '1', '3', '1', '20190703646946', '324.9444', '2019-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel_book_items`
--

CREATE TABLE `tbl_hotel_book_items` (
  `item_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_book_romm` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel_book_items`
--

INSERT INTO `tbl_hotel_book_items` (`item_id`, `booking_id`, `hotel_id`, `discount`, `vat`, `price`, `total_book_romm`) VALUES
(10, 2, 24, '2', '10', '35', 2),
(9, 2, 4, '10', '10', '15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel_img`
--

CREATE TABLE `tbl_hotel_img` (
  `img_id` int(11) NOT NULL,
  `hol_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel_img`
--

INSERT INTO `tbl_hotel_img` (`img_id`, `hol_id`, `img_sub`) VALUES
(13, 1, '../image/hotel//1560930616-Chrysanthemum.jpg'),
(15, 1, '../image/hotel//1560930639-Hydrangeas.jpg'),
(7, 5, '../image/hotel//1556651363-2. 2AB - 5151-PHP-005.jpg'),
(8, 5, '../image/hotel//1556651376-8. 2AB-5151-PHP-005.jpg'),
(16, 1, '../image/hotel//1560930639-Desert.jpg'),
(9, 5, '../image/hotel//1556651380-9. 2AB - 5151-PHP-005.jpg'),
(10, 5, '../image/hotel//1556651384-2. 2AB - 5151-PHP-005.jpg'),
(11, 5, '../image/hotel//1556651387-3. 2AB - 5151-PHP-005.jpg'),
(12, 5, '../image/hotel//1556651392-1. 2AB - 5151-PHP-005.jpg'),
(14, 1, '../image/hotel//1560930625-Penguins.jpg'),
(17, 1, '../image/hotel//1560930641-Penguins.jpg'),
(18, 4, '../image/hotel//1560929802-Chrysanthemum.jpg'),
(19, 4, '../image/hotel//1560929802-Desert.jpg'),
(20, 4, '../image/hotel//1560929805-Hydrangeas.jpg'),
(21, 4, '../image/hotel//1560929806-Jellyfish.jpg'),
(22, 26, '../../admin/image/hotel//1562136277-Koala.jpg'),
(23, 26, '../../admin/image/hotel//1562136283-Penguins.jpg'),
(24, 26, '../../admin/image/hotel//1562136290-Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel_include_option`
--

CREATE TABLE `tbl_hotel_include_option` (
  `option_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel_include_option`
--

INSERT INTO `tbl_hotel_include_option` (`option_id`, `hotel_id`, `name`) VALUES
(12, 20, '5'),
(224, 1, '8'),
(223, 1, '7'),
(222, 1, '6'),
(221, 1, '5'),
(220, 1, '4'),
(74, 25, '6'),
(73, 25, '5'),
(219, 1, '3'),
(218, 1, '2'),
(217, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_center`
--

CREATE TABLE `tbl_info_center` (
  `info_center_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_kh` varchar(255) NOT NULL,
  `event_type` int(11) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `description_kh` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0=>info_center 1=>Recent Post'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_info_center`
--

INSERT INTO `tbl_info_center` (`info_center_id`, `title`, `title_kh`, `event_type`, `images`, `description`, `description_kh`, `type`) VALUES
(1, 'TEAM RETREAT TO SIHANOUK VILLE', 'ដំណើរប្រកបគ្នារវាងក្រុមការងារនៅក្រុងព្រះសីហនុ', 1, '20190815_8616.png', '<p>Former Manchester United midfielder Marouane Fellaini scores a goal while playing for Chinese Premier League club Shandong Luneng in a match against China. Beijing Renhe Club in the Chinese Super League.</p>\r\n\r\n<p>Fellaini fouled the net after a fine cross from Chinese striker Xinghan Wu in the second half. Six minutes. Fellaini&#39;s goal was also the first goal of the 2019 Chinese Premier League.</p>\r\n\r\n<p>The match ended 1-0, giving Fellaini&#39;s three points in the opening day of the league. .</p>\r\n\r\n<p>Belgium midfielder Marouane Fellaini has left Manchester United and transferred to Chinese club Shandong Luneng for a fee. $ 2 million last February.</p>\r\n', '<p>អតីត​ខ្សែ​បម្រើ​ក្លឹប​ Manchester United កីឡាករ​ Marouane Fellaini រក​បាន​គ្រាប់​បាល់​មួយ​គ្រាប់​ពេល​លេង​ឲ្យ​ក្លឹប​លីគ​កំពូល​ចិន Shandong Luneng នៅ​ប្រកួត​ប៉ះ​នឹង​ក្លឹប​ Beijing Renhe ក្នុង​ក្របខ័ណ្ឌ Chinese Super League។</p>\r\n\r\n<p>Fellaini បាន​បំប៉ោង​សំណាញ់​គ្រាប់​បើក​ឆាក​ ក្រោយ​ពី​មាន​ការ​បញ្ជូន​បាល់​បាន​យ៉ាង​ល្អ​ពី​ខ្សែ​ប្រយុទ្ធ​ចិន Xinghan Wu បន្ទាប់​ពី​ចូល​តង់​ទី ២ រយៈពេល ៦​នាទី។ មួយ​គ្រាប់​របស់​ Fellaini ក៏​ជា​គ្រាប់​បាល់​ដំបូង​នៃ​លីគ​កំពូល​ចិន​រដូវ​កាល​ ២០១៩។</p>\r\n\r\n<p>ការ​ប្រកួត​បញ្ចប់​ទៅ​ក្នុង​លទ្ធផល​ ១-០ ដែល​ធ្វើ​ឲ្យ​ក្លឹប​របស់​ Fellaini មាន​ ៣​ពិន្ទុ​ក្នុង​ប្រកួត​បើក​ឆាក​ក្នុង​ថ្ងៃ​ប្រកួត​លីគ​ដំបូង​។</p>\r\n\r\n<p>សូម​បញ្ជាក់​ផង​ដែរ​ថា​ ខ្សែ​បម្រើ​បែលហ្សិក​កីឡាករ​ Marouane Fellaini បាន​ចាកចេញ​ពី​ក្លឹប​ Manchester United ហើយ​ផ្ទេរ​ទៅ​ក្លឹប​ចិន Shandong Luneng ក្នុង​តម្លៃ​ខ្លួន​ ១៣.២​លាន​ដុល្លារ​កាល​ពី​ខែ​កុម្ភៈ​កន្លង​ទៅ៕</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0),
(2, 'TEAM RETREAT TO SIEM REAP PROVINCE', 'ដំណើរប្រកបគ្នានៅក្រុងសៀមរាប', 1, '20190815_9915.png', '<p>Former Manchester United midfielder Marouane Fellaini scores a goal while playing for Chinese Premier League club Shandong Luneng in a match against China. Beijing Renhe Club in the Chinese Super League.</p>\r\n\r\n<p>Fellaini fouled the net after a fine cross from Chinese striker Xinghan Wu in the second half. Six minutes. Fellaini&#39;s goal was also the first goal of the 2019 Chinese Premier League.</p>\r\n\r\n<p>The match ended 1-0, giving Fellaini&#39;s three points in the opening day of the league. .</p>\r\n\r\n<p>Belgium midfielder Marouane Fellaini has left Manchester United and transferred to Chinese club Shandong Luneng for a fee. $ 2 million last February....</p>\r\n', '<p>កីឡាករ​សញ្ជាតិ​កូរ៉េ​ខាង​ត្បូង​បាន​ក្លាយ​ជា​កីឡាករ​សំខាន់​សម្រាប់ Spurs​ រដូវ​កាល​នេះ រក​បាន​១៦​គ្រាប់​និង​៩ Assist ក្នុង​ការ​បង្ហាញ​ខ្លួន​៣៤​ប្រកួត។ Son ដែល​បាន​ជួយ​ប្រទេស​របស់​ខ្លួន​ឈ្នះ​មេដាយ​មាស Asian Games កាល​ពី​ឆ្នាំ​មុន បាន​វ៉ា​មិត្តរួម​ក្រុម Harry Kane ខ្សែ​ប្រយុទ្ធ Pierre-Emerick Aubameyang&nbsp;របស់ Arsenal និង Eden Hazard​ របស់ Chelsea ក្នុង​ការ​ឈ្នះ​ពាន កីឡាករ Premier League ឆ្នើម​ប្រចាំ​ឆ្នាំ​នេះ។</p>\r\n\r\n<p>សម្រាប់​លោក &nbsp;Mauricio Pochettino ក៏​ត្រូវ​បាន​បោះឆ្នោត​​ឈ្នះ​ពាន​អ្នក​ចាត់​ការ​ Premier League ឆ្នើម​ជាង​គេ​ផង​ដែរ។ London Football Awards ជា​កម្មវិធី​សម្រាប់​ផ្ដល់​ពាន​ដល់​​កីឡាករ​ដែល​លេង​ក្នុង​ក្លឹប​មាន​មូលដ្ឋាន​ក្នុង​ទីក្រុង​ឡុងដ៏។</p>\r\n\r\n<p>កីឡាករ Heung-min Son ត្រូវ​បាន​បោះឆ្នោត​​ឈ្នះ​ពាន​កីឡាករ Premier League ឆ្នើម​ប្រចាំ​ឆ្នាំ​ ក្នុង​កម្មវិធី London Football Awards។</p>\r\n', 0),
(3, 'ANNUAL STAFF MEETING', 'ប្រជុំបុគ្គលឹកប្រចាំឆ្នាំ', 1, '20190815_4183.png', '<p>Lyon striker Ada Hegerberg, the first female Ballon d&#39;Or champion, will not be available in Norway for the event. The World Cup in the summer of 2019, Norway coach Martin Sjogren has confirmed.</p>\r\n\r\n<p>&quot;We tried to solve the problem too,&quot; he said. &quot;We have met several times and she still refuses Join in. &quot;</p>\r\n\r\n<p>Ada Hegerberg has left Norway since the fall of the Women&#39;s European Championship in 2017.</p>\r\n\r\n<p>The 23-year-old striker has decided not to play for Norway because she understands her country. Failure to pay enough respect to women footballers for equal pay.</p>\r\n\r\n<p>Ada Hegerberg has left Norway since the fall of the Women&#39;s European Championship in 2017.</p>\r\n\r\n<p>The 23-year-old striker has decided not to play for Norway because she understands her country. Failure to pay enough respect to women footballers for equal pay.</p>\r\n', '<p>ខ្សែ​ប្រយុទ្ធ​ក្លឹប​ Lyon កីឡាករ Ada Hegerberg ដែល​ជា​ជើងឯក​ Ballon d&#39;Or នារី​ដំបូង​គេ​ នឹង​មិន​មាន​វត្តមាន​ក្នុង​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​សម្រាប់​ព្រឹត្តិការណ៍​បាល់ទាត់​ពិភពលោក​នៅ​រដូវ​ក្ដៅ​ ឆ្នាំ២០១៩​ ទេ នេះ​បើ​តាម​ការ​បញ្ជាក់​របស់​គ្រូ​បង្វឹក​ក្រុម​ន័រវែស​លោក Martin Sjogren។</p>\r\n\r\n<p>លោក​បាន​និយាយ​ថា​៖ &quot; ពួក​យើង​ព្យាយាម​ដោះស្រាយ​បញ្ហា​នេះ​ដែរ​ ដោយ​យើង​បាន​ជួប​គ្នា​ច្រើន​ដង​ ហើយ​នាង​នៅ​តែ​បដិសេធ​មិន​ចូល​រួម &quot; ។</p>\r\n\r\n<p>Ada Hegerberg បាន​ចាកចេញ​ពី​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស តាំង​ពី​ន័រវែស​បាន​ធ្លាក់​ចេញ​ពី​ Women&#39;s European Championship នៅ​ឆ្នាំ២០១៧។</p>\r\n\r\n<p>ខ្សែ​ប្រយុទ្ធ​នារី​វ័យ​ ២៣​ឆ្នាំ​រូប​នេះ បាន​សម្រេច​មិន​លេង​ឲ្យ​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​ ដោយសារ​តែ​នាង​បាន​យល់​ថា​ ប្រទេស​របស់​នាង​មិន​បាន​ផ្ដល់​ការ​គោរព​គ្រប់គ្រាន់​ទៅ​លើ​កីឡាករ​បាល់ទាត់​នារីៗ ដែល​ទាក់ទង​នឹង​ប្រាក់​ឈ្នួល​មិន​ស្មើ​គ្នា៕</p>\r\n\r\n<p>Ada Hegerberg បាន​ចាកចេញ​ពី​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស តាំង​ពី​ន័រវែស​បាន​ធ្លាក់​ចេញ​ពី​ Women&#39;s European Championship នៅ​ឆ្នាំ២០១៧។</p>\r\n\r\n<p>ខ្សែ​ប្រយុទ្ធ​នារី​វ័យ​ ២៣​ឆ្នាំ​រូប​នេះ បាន​សម្រេច​មិន​លេង​ឲ្យ​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​ ដោយសារ​តែ​នាង​បាន​យល់​ថា​ ប្រទេស​របស់​នាង​មិន​បាន​ផ្ដល់​ការ​គោរព​គ្រប់គ្រាន់​ទៅ​លើ​កីឡាករ​បាល់ទាត់​នារីៗ ដែល​ទាក់ទង​នឹង​ប្រាក់​ឈ្នួល​មិន​ស្មើ​គ្នា៕</p>\r\n', 0),
(4, 'ណាត់ បូរី ភ្ជាប់ពាក្យម្តង ផ្អើលអស់អ្នកស្វាយរៀង', '', 1, '20190422_5954.png', '<p>ក្នុង​ពិធី​ភ្ជាប់​ពាក្យ​នេះ​ក្រុម​គ្រួសារ​លោក និង​គូ​ដណ្ដឹង​បាន​រៀប​ចំ​ទទួល​ភ្ញៀវ​កិត្តិយស​ទាំង​ក្នុង និងក្រៅសិល្បៈឲ្យចូលរួមចន្លោះពី៦០​ទៅ​៧០​តុ​ធ្វើ​ឲ្យ​ផ្អើល​អស់​មហាជន​ដែល​មាន​វត្តមាន​នៅ​ទី​នោះ​ផ្ទាល់​ដោយ​ពួក​គេ​មិន​នឹក​ស្មាន​តារា​សម្ដែង​រូប​នេះ​គ្រាន់​តែ​ភ្ជាប់​ពាក្យ​សោះ​រៀប​ចំ​ធំ​ដុំ​លើស​ពី​មង្គលការ​មួយ​ចំនួន​ទៀត។ ​បើ​តាម​ឲ្យ​ដឹង​ ម្ចាស់​ចិត្ត​របស់​លោក​បូរី ​មាន​ឈ្មោះ​ថា នួន ស្រី​រ័ត្ន ជា​កូន​អ្នក​ខេត្ត​ស្វាយ​រៀង នៅ​ក្រុង​បាវិត ដោយ​បាន​មើល​ចិត្ត​ថ្លើម​គ្នា​អស់​រយៈពេល​២​ឆ្នាំ។​</p>\r\n\r\n<p>ក្នុង​ពិធី​ភ្ជាប់​ពាក្យ​នេះ​ក្រុម​គ្រួសារ​លោក និង​គូ​ដណ្ដឹង​បាន​រៀប​ចំ​ទទួល​ភ្ញៀវ​កិត្តិយស​ទាំង​ក្នុង និងក្រៅសិល្បៈឲ្យចូលរួមចន្លោះពី៦០​ទៅ​៧០​តុ​ធ្វើ​ឲ្យ​ផ្អើល​អស់​មហាជន​ដែល​មាន​វត្តមាន​នៅ​ទី​នោះ​ផ្ទាល់​ដោយ​ពួក​គេ​មិន​នឹក​ស្មាន​តារា​សម្ដែង​រូប​នេះ​គ្រាន់​តែ​ភ្ជាប់​ពាក្យ​សោះ​រៀប​ចំ​ធំ​ដុំ​លើស​ពី​មង្គលការ​មួយ​ចំនួន​ទៀត។ ​បើ​តាម​ឲ្យ​ដឹង​ ម្ចាស់​ចិត្ត​របស់​លោក​បូរី ​មាន​ឈ្មោះ​ថា នួន ស្រី​រ័ត្ន ជា​កូន​អ្នក​ខេត្ត​ស្វាយ​រៀង នៅ​ក្រុង​បាវិត ដោយ​បាន​មើល​ចិត្ត​ថ្លើម​គ្នា​អស់​រយៈពេល​២​ឆ្នាំ។​</p>\r\n\r\n<p>ក្នុង​ពិធី​ភ្ជាប់​ពាក្យ​នេះ​ក្រុម​គ្រួសារ​លោក និង​គូ​ដណ្ដឹង​បាន​រៀប​ចំ​ទទួល​ភ្ញៀវ​កិត្តិយស​ទាំង​ក្នុង និងក្រៅសិល្បៈឲ្យចូលរួមចន្លោះពី៦០​ទៅ​៧០​តុ​ធ្វើ​ឲ្យ​ផ្អើល​អស់​មហាជន​ដែល​មាន​វត្តមាន​នៅ​ទី​នោះ​ផ្ទាល់​ដោយ​ពួក​គេ​មិន​នឹក​ស្មាន​តារា​សម្ដែង​រូប​នេះ​គ្រាន់​តែ​ភ្ជាប់​ពាក្យ​សោះ​រៀប​ចំ​ធំ​ដុំ​លើស​ពី​មង្គលការ​មួយ​ចំនួន​ទៀត។ ​បើ​តាម​ឲ្យ​ដឹង​ ម្ចាស់​ចិត្ត​របស់​លោក​បូរី ​មាន​ឈ្មោះ​ថា នួន ស្រី​រ័ត្ន ជា​កូន​អ្នក​ខេត្ត​ស្វាយ​រៀង នៅ​ក្រុង​បាវិត ដោយ​បាន​មើល​ចិត្ត​ថ្លើម​គ្នា​អស់​រយៈពេល​២​ឆ្នាំ។​</p>\r\n', '', 0),
(5, 'កក្រើក​ពាក់​កណ្ដាល​​សប្ដាហ៍', '', 1, '20190226_4033.png', '<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n\r\n<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n\r\n<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n', '', 0),
(6, 'LCRC WILL LAUNCH THE NEW SYSTEM IN SEPTEMBER 2019', 'LCRC នឹងបង្ហោះ SYSTEM ថ្មីនាខែសីហា ២០១៩', 2, '20190815_9931.png', '<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n', '<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n', 0),
(7, 'KEMUN TORN WILL FINISH HIS SYSTEM IN SEPTEMBER 2019', 'KEMUN TORN នឹងបញ្ចប់គម្រោងSYSTEMនេះនាខែ សីហា ២០១៩', 2, '20190815_6363.png', '<p>A standard menu item is defined as a restaurant type food that is routinely included on a menu.</p>\r\n\r\n<p>Examples</p>\r\n\r\n<ul>\r\n	<li>Standard meal from a full service restaurant</li>\r\n	<li>Standard snack or drink from a coffee shop or bakery</li>\r\n	<li>Food purchased at a drive thru window</li>\r\n	<li>Take out or delivery food</li>\r\n	<li>Made to order meals like burrito bowls and sandwiches</li>\r\n	<li>Self serve food from a salad bar</li>\r\n	<li>Alcoholic beverages that are standard menu items</li>\r\n</ul>\r\n\r\n<p>Exempt items</p>\r\n', '<p>មុខម្ហូបតាមស្តង់ដារត្រូវបានកំណត់ជាប្រភេទអាហារប្រភេទភោជនីយដ្ឋានដែលត្រូវបានរាប់បញ្ចូលជាប្រចាំនៅលើមុខម្ហូប។</p>\r\n\r\n<p>ឧទាហរណ៍</p>\r\n\r\n<p>អាហារស្តង់ដារពីភោជនីយដ្ឋានសេវាកម្មពេញលេញ។<br />\r\nអាហារសម្រន់ឬភេសជ្ជៈស្តង់ដារពីហាងកាហ្វេឬហាងនំ។<br />\r\nម្ហូបដែលបានទិញនៅតាមបង្អួចដ្រាយ។<br />\r\nយកចេញឬចែកចាយអាហារ។<br />\r\nផលិតឡើងដើម្បីកុម្ម៉ង់អាហារដូចជាចានប៊ឺរីកូនិងនំសាំងវិច។<br />\r\nបម្រើម្ហូបដោយខ្លួនឯងពីរបារសាឡាត់។<br />\r\nភេសជ្ជៈមានជាតិអាល់កុលដែលជាមុខម្ហូបតាមស្តង់ដារ។<br />\r\nធាតុលើកលែង។</p>\r\n', 0),
(8, 'LCRC WILL LOOK FOR NEW DEVELOPER', 'LCRC កំពុងស្វែងរកអ្នកជំនាញការថ្មី', 2, '20190815_7095.png', '<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n', '<p>Liverpool នៅ​តែ​បន្ត​ឈរ​កំពូល​តារាង​ក្នុង​លីគ​ក្រោយ​បំបាក់ Watford ដល់​ទៅ ៥-០។ ចំណែក​​ក្រុម​លេខ​២ Manchester City យក​ឈ្នះ​ទាំង​ប្រផិតប្រផើយ​លើ West Ham United ១-០ ដែល​ជា​ការ​រក​គ្រាប់​បាន​ពី​កីឡាករ Sergio Aguero ដោយ​បាល់​ប៉េណាល់ទី។</p>\r\n\r\n<p>Chelsea បាន​យក​ឈ្នះ​ក្រុម​ខ្លាំង Spurs ២-០ ស្របពេល Arsenal ឈ្នះ Bournemouth ៥-១។ ឯ Manchester United វិញ​ឈ្នះ​ក្រៅ​ដី​លើ​ក្រុម Crystal Palace ៣-១។ ៣​គ្រាប់​របស់​បិសាច​ក្រហម​ធ្វើ​បានដោយ​កីឡាករ Romelu Lukaku ២​គ្រាប់ និង Asley Young ១​</p>\r\n', 0),
(9, 'MEETING ON REGULATIONS UPDATE', 'កិច្ចប្រជុំលើការធ្វើបច្ចុប្បន្នភាពគោលការការងារ', 3, '20190815_3369.png', '<p>Lyon striker Ada Hegerberg, the first female Ballon d&#39;Or champion, will not be available in Norway for the event. The World Cup in the summer of 2019, Norway coach Martin Sjogren has confirmed.</p>\r\n\r\n<p>&quot;We tried to solve the problem too,&quot; he said. &quot;We have met several times and she still refuses Join in. &quot;</p>\r\n\r\n<p>Ada Hegerberg has left Norway since the fall of the Women&#39;s European Championship in 2017.</p>\r\n\r\n<p>The 23-year-old striker has decided not to play for Norway because she understands her country. Failure to pay enough respect to women footballers for equal pay.</p>\r\n\r\n<p>Ada Hegerberg has left Norway since the fall of the Women&#39;s European Championship in 2017.</p>\r\n\r\n<p>The 23-year-old striker has decided not to play for Norway because she understands her country. Failure to pay enough respect to women footballers for equal pay.</p>\r\n', '<p>ខ្សែ​ប្រយុទ្ធ​ក្លឹប​ Lyon កីឡាករ Ada Hegerberg ដែល​ជា​ជើងឯក​ Ballon d&#39;Or នារី​ដំបូង​គេ​ នឹង​មិន​មាន​វត្តមាន​ក្នុង​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​សម្រាប់​ព្រឹត្តិការណ៍​បាល់ទាត់​ពិភពលោក​នៅ​រដូវ​ក្ដៅ​ ឆ្នាំ២០១៩​ ទេ នេះ​បើ​តាម​ការ​បញ្ជាក់​របស់​គ្រូ​បង្វឹក​ក្រុម​ន័រវែស​លោក Martin Sjogren។</p>\r\n\r\n<p>លោក​បាន​និយាយ​ថា​៖ &quot; ពួក​យើង​ព្យាយាម​ដោះស្រាយ​បញ្ហា​នេះ​ដែរ​ ដោយ​យើង​បាន​ជួប​គ្នា​ច្រើន​ដង​ ហើយ​នាង​នៅ​តែ​បដិសេធ​មិន​ចូល​រួម &quot; ។</p>\r\n\r\n<p>Ada Hegerberg បាន​ចាកចេញ​ពី​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស តាំង​ពី​ន័រវែស​បាន​ធ្លាក់​ចេញ​ពី​ Women&#39;s European Championship នៅ​ឆ្នាំ២០១៧។</p>\r\n\r\n<p>ខ្សែ​ប្រយុទ្ធ​នារី​វ័យ​ ២៣​ឆ្នាំ​រូប​នេះ បាន​សម្រេច​មិន​លេង​ឲ្យ​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​ ដោយសារ​តែ​នាង​បាន​យល់​ថា​ ប្រទេស​របស់​នាង​មិន​បាន​ផ្ដល់​ការ​គោរព​គ្រប់គ្រាន់​ទៅ​លើ​កីឡាករ​បាល់ទាត់​នារីៗ ដែល​ទាក់ទង​នឹង​ប្រាក់​ឈ្នួល​មិន​ស្មើ​គ្នា៕</p>\r\n\r\n<p>Ada Hegerberg បាន​ចាកចេញ​ពី​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស តាំង​ពី​ន័រវែស​បាន​ធ្លាក់​ចេញ​ពី​ Women&#39;s European Championship នៅ​ឆ្នាំ២០១៧។</p>\r\n\r\n<p>ខ្សែ​ប្រយុទ្ធ​នារី​វ័យ​ ២៣​ឆ្នាំ​រូប​នេះ បាន​សម្រេច​មិន​លេង​ឲ្យ​ក្រុម​ជម្រើស​ជាតិ​ន័រវែស​ ដោយសារ​តែ​នាង​បាន​យល់​ថា​ ប្រទេស​របស់​នាង​មិន​បាន​ផ្ដល់​ការ​គោរព​គ្រប់គ្រាន់​ទៅ​លើ​កីឡាករ​បាល់ទាត់​នារីៗ ដែល​ទាក់ទង​នឹង​ប្រាក់​ឈ្នួល​មិន​ស្មើ​គ្នា៕</p>\r\n', 0),
(10, 'Recent Post Title', 'Recent Post Title', NULL, '20210201_3623.png', '<p>Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.</p>\r\n', '<p>Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.Be an integral part of client&rsquo;s discovery team and provide focused integrated drug discovery services.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_center_img`
--

CREATE TABLE `tbl_info_center_img` (
  `img_id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info_center_img`
--

INSERT INTO `tbl_info_center_img` (`img_id`, `info_id`, `img_sub`) VALUES
(1, 1, '../image/vehicle_rental//1565878450-1559282773-1. 2AB - 5151-PHP-005.jpg'),
(2, 1, '../image/vehicle_rental//1565878468-1559284852-7. 2AB-5151-PHP-005.jpg'),
(3, 1, '../image/vehicle_rental//1565878477-1559282813-9. 2AB - 5151-PHP-005.jpg'),
(4, 1, '../image/vehicle_rental//1565878478-1559282773-1. 2AB - 5151-PHP-005.jpg'),
(5, 1, '../image/vehicle_rental//1565878479-1559284848-1. 2AB - 5151-PHP-005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interesting_place`
--

CREATE TABLE `tbl_interesting_place` (
  `pl_id` int(11) NOT NULL,
  `province` text NOT NULL,
  `link_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_interesting_place`
--

INSERT INTO `tbl_interesting_place` (`pl_id`, `province`, `link_detail`) VALUES
(2, 'Kampong Thom', 'kompong_thom.php '),
(3, 'KOMPONG CHHNANG', 'KOMPONG CHHNANG.php    '),
(4, 'takao', 'takao.php'),
(5, 'Banteay Meanchey', 'banteay_meanchey.php'),
(6, 'Battambang', 'Battambang.php'),
(7, 'Preah Vihear', 'Preah_Vihear.php  '),
(8, 'kampong cham', 'kompong_chnnang.php  '),
(9, 'Kampong Speu', 'kampong_speu.php'),
(10, 'Kampot', 'kampot.php'),
(11, 'Kandal', 'Kandal.php'),
(12, 'Koh Kong', 'Koh_Kong.php'),
(13, 'Kep', 'kep.php'),
(14, 'Kratie', 'kratie.php'),
(15, 'Mondulkiri', 'mondulkiri.php'),
(16, 'Oddar Meanchey', 'oddar_meanchey.php'),
(17, 'Pailin', 'Pailin.php'),
(18, 'Sihanoukville', 'Sihanoukville.php'),
(19, 'Phnom penh', 'phnom penh.php '),
(20, 'Pursat', 'pursat.php'),
(21, 'Prey Veng', 'prey_veng.php'),
(22, 'Ratanakiri', 'Ratanakiri,php'),
(23, 'Siem Reap', 'Siem_Reap.php'),
(24, 'Stung Treng', 'Stung_Treng.php'),
(25, 'Svay Rieng', 'Svay_Rieng.php'),
(26, 'Tbong Khmum', 'Tbong_Khmum.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layout_content`
--

CREATE TABLE `tbl_layout_content` (
  `pb_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `hidden_position` int(11) NOT NULL,
  `kh_title` varchar(255) NOT NULL,
  `title_kh` varchar(255) NOT NULL,
  `description_kh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_layout_content`
--

INSERT INTO `tbl_layout_content` (`pb_id`, `title`, `description`, `hidden_position`, `kh_title`, `title_kh`, `description_kh`) VALUES
(1, 'Partner\'s Benefit', '<p style=\"margin-left:18.1pt; margin-right:0cm; text-align:center\">&nbsp;</p>\r\n\r\n<p><strong><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Each Lyna-CarRental.Com (LCRC) Partner will enjoy the following benefits:</span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Reduce market competitiveness among partners</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Reduce serious loss or bankruptcy</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Keep the service fee or product price away from being depletion or decreased</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Have mutual benefits</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Have access to&nbsp;a wider range of marketing research and/or advertising&nbsp;on services or products</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Have stronger ideas or effort on income earning and problem solving</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Have more potential investors via mutual share of information</span></span></li>\r\n</ul>\r\n ', 3, 'អត្ថប្រយោជន៏សម្រាប់ដៃគូរអជីវកម្ម', 'អត្ថប្រយោជន៍​សំរាប់​ដៃគូអាជីវកម្ម', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ដៃគូអាជីវកម្ម​របស់​ ក្រុមហ៊ុនលីណា-ជួលរថយន្តទេសចរណ៍ នីមួយៗ​នឹង​ទទួលបាននូវអត្ថប្រយោជន៍​គួរ​ជាទី​ពេញ​ចិត្ត​ដូច​ខាង​ក្រោម៖</span></span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">កាត់​បន្ថយ​ការ​ប្រកួត​ប្រជែងទីផ្សារ​លក់​ដូរ​រវាង​ដៃគូ</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">កាត់​បន្ថយ​ការ​ខាតបង់ធ្ងន់ធ្ងរ​​ និង​ការក្ស័យ​ធន</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ធ្វើ​ឲ្យ​តម្លៃ​ផលិតផល ឬ​សេវាកម្ម នៅស្ថិត​ស្ថេរ មិន​ថយ​ចុះ</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">ផ្តល់ផលប្រយោជន៍ដល់គ្នាទៅវិញទៅមក</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">មានឱកាសស្វែងរកទីផ្សារ ការផ្សាយពាណិជ្ជកម្ម លើផលិតផល និងសេវាកម្ម កាន់តែទូលំទូលាយ</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">មានគំនិតកាន់តែទូលំទូលាយ ឬមានកម្លាំងកាន់តែរឹងមាំក្នុងការរកប្រាក់ចំណូល និងក្នុងការដោះស្រាយបញ្ហា</span></span></span></li>\r\n	<li><span style=\"font-size:10.0pt\">មានអ្នកវិនិយោគកាន់តែច្រើន តាមរយៈការចែករំលែកព័ត៌មានគ្នាទៅវិញទៅមក។</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n '),
(2, 'Customer\'s Benefits', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><strong><span style=\"font-size:18px\"><span style=\"font-family:Calibri,sans-serif\">Each Lyna-CarRental.Com Company (LCRC) Compant Customer will enjoy the following benefits:</span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; Affordable services due to non-deception</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; Safe and reliable trip</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; Reliable and responsible tour guide/driver</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp; Insurance coverage in case of accident </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp;Getting discount during special occasions</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp;Getting discount on regular basis if the customer takes the service through the Introducer</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp;Ability to view the history of using times of the services and each&nbsp;cost</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp; &nbsp;Getting some bonus of &nbsp;$____ /year when the customer hits the LCRC income target</span></span></li>\r\n</ul>\r\n ', 2, 'អត្ថប្រយោជន៏សម្រាប់អតិថិជន', 'អត្ថប្រយោជន៍សំរាប់​​អតិថិជន', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><strong><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">អតិថិជនក្រុមហ៊ុន ​លីណា-ជួលរថយន្តទេសចរណ៍ នឹង​បាន​ទទួល​អត្ថ​ប្រយោជន៍យ៉ាង​រីករាយ​ដូច​ខាងក្រោម៖</span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">សេវាកម្ម​មាន​តម្លៃ​សមរម្យ ដោយសារ​គ្មាន​ការ​កេង​បន្លំ </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ការ​ធ្វើ​ដំណើរ​មាន​សុវត្ថភាព គួរ​ជាទីទុក​ចិត្ត</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">អ្នក​បើកបរ/ អ្នក​បកប្រែ​មាន​ការ​ទទួល​ខុស​ត្រូវ​គួរ​ជាទី​ទុក​ចិត្ត</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">មាន​ការ​ធានារ៉ាប់រងក្នុង​ពេល​មាន​បញ្ហាឬ​មាន​​គ្រោះថ្នាក់​</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">មាន​ការ​បញ្ចុះ​តម្លៃ​នៅ​ក្នុង​ឱកាស​ពិសេស</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">មាន​ការ​បញ្ចុះ​តម្លៃ​ជា​ប្រចាំប្រសិនបើ​អតិថិជន​​ប្រើប្រាស់​​សេវាកម្ម​តាម​រយៈ​អ្នក​ណែនាំ</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">អាច​បើក​មើល​របាយការណ៍​ចំនួនលើកនៃ​ការ​​ប្រើប្រាស់​ និង​ការ​ចំណាយ​លើ​សេវាកម្ម</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">បាន​ទទួល​ប្រាក់​លើក​ទឹកចិត្ត​ចំនួន ____ដុល្លាក្នុង១ឆ្នាំ ​នៅ​ពេល​អតិថិជន​បាន​​ប្រើប្រាស់​សេវាកម្ម​ដល់​កំរិត​មួយ​ដែល​លីណា-ជួលរថយន្តទេសចរណ៍រកចំណូល​​បានតាម​ការគ្រោងទុក។ </span></span></li>\r\n</ul>\r\n '),
(3, 'Become A Partner', '<p><strong>HOW TO BECOME A BUSINESS PARTNER</strong><br />\r\n<br />\r\n<big><strong>WHO ARE THE PARTNERS?</strong></big></p>\r\n\r\n<p><big>For those who want to join this potential platform and are owning the following businesses or belongings:</big><br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Own a car or own more than one cars in any province/city and want to rent them out to our malti-national customers.&nbsp;</li>\r\n	<li><big>Own a rickshaw or own more than one rickshaws in any province/city and want to share the transportation, such as: City Tour, Pickup &amp; Drop-off, and Airport Transfer.</big></li>\r\n	<li><big>Hotel &amp; Guesthouse&#39;s Owner in any province/city</big></li>\r\n	<li><big>Tour Guide in any province/city.</big></li>\r\n	<li><big>Driver in any province/city.</big></li>\r\n	<li><big>Introducer in any province/city&nbsp;</big></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11.0pt\">Any prospective partner needs to fulfill the following criteria:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Subscription</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Be aware of Lyna-CarRental.Com Company (LCRC)&nbsp;policy </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Sign the agreement between the subscriber and Lyna-CarRental.Com Company (LCRC) with refundable deposit and/or attachment of some legal documents.</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Assist Lyna-CarRental.Com Company (LCRC) in advertising extension</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">Build mutual trust </span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">The Car and its Owner: </span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The car must be in very good condition and its model year must not be later than 2002 whereas the car owner shall agree to pay the following at different rates for every transaction:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3% for the maintenance System fee </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">5% to the Introducer </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3.50% for the bank fee &nbsp;</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">10% for the Discount System fee whenever the customer uses the coupon </span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Auto </span><span style=\"font-size:11.0pt\">Rickshaw and its Owner:</span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The auto rickshaw can be used for only in a short distance of travel and must be in very good condition. The rickshaw owner shall pay the following at different rates for every transaction:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3% the Maintenance System fee </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">5% to the Introducer </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3.50% for the bank fee</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">10% for the Discount System when the customer use the coupon </span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Hotel &amp; Guesthouse and their owners:</span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The hotels and guesthouse must be with nice and neat rooms and the owners shall pay the following at different rates for every transaction:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3% for the Maintenance System fee </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">5% to the introducer </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3.50% for the bank fee </span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">10% for the discount system whenever the customer uses the coupon </span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Communication with Airport:</span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The </span><span style=\"font-size:11.0pt\">owner of </span><span style=\"font-size:11.0pt\">car or rickshaw can join this service, but must serve the customer with a nice or friendly way.</span></p>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Pickup &amp; Drop-off Service: </span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The </span><span style=\"font-size:11.0pt\">owner of </span><span style=\"font-size:11.0pt\">car or rickshaw can join this service, but must serve the customer with a friendly way.</span></p>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Tour Guide:</span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The tour guide must be able to pleasantly speak many languages and provide very good or friendly service for the customer. He shall pay the following at different rates for every transaction:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3% for the Maintenance System fee </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">5% to the Introducer </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3.50% for the bank fee &nbsp;</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">10% for the Discount System whenever the customer uses the coupon.</span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Driver:&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"font-size:11.0pt\">The driver must be able to speak some international languages and provide the customer with a very good or friendly service to the customer. He shall agree to pay the following at different rates for every transaction:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3% for the maintenance System fee </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">5% to the Introducer </span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">3.50% for the bank fee &nbsp;</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">10% for the Discount System whenever the customer uses the coupon </span></li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:11.0pt\">Requirements</span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ID Card (Local customer)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Passport (International customer)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Driver&rsquo;s License (Both local and international customer)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Family Residence Book (Local customer)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Business License (Optional)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Patent (Optional)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Current Address Endorsement (Optional)</span></span></li>\r\n	<li><span style=\"font-size:11.0pt\">Photo 4 x 6</span></li>\r\n</ul>\r\n ', 3, 'ចង់ក្លាយជាដៃគូរអជីវកម្ម', 'ក្លាយជាដៃគូអាជីវកម្ម', '<p><strong>ធ្វើយ៉ាងណា​ទើបក្លាយទៅជាដៃគូអាជីវកម្ម របស់ក្រុមហ៊ុន លីណា-ជួលរថយន្តទេសចរណ៍</strong><br />\r\n<br />\r\n<strong>តើអ្នកណាជាដៃគូអាជីវកម្ម?</strong></p>\r\n\r\n<p><strong>ដៃគូអាជីវកម្ម គឺជាអ្នកដែលចង់ចូលរួមក្នុងវេទិកាដ៏មានសក្តានុពលនេះ និងជាម្ចាស់អាជីវកម្ម ឬទ្រព្យសម្បត្តិដូចខាងក្រោមៈ</strong></p>\r\n\r\n<ul>\r\n	<li>1. ជាម្ចាស់រថយន្ត ដែលមានលើសពីមួយគ្រឿង នៅខេត្ត/ក្រុងណាមួយ ហើយចង់ជួលវា ឲ្យទៅអតិថិជនរបស់យើង</li>\r\n	<li>2. ជាម្ចាស់ត្រីចក្រយានយន្ត ដែលមានលើសពីមួយគ្រឿង នៅតាមខេត្ត/ក្រុងណាមួយ ហើយចង់បំរើសេវាកម្មលើការដឹកជញ្ជូនដូចជា៖ ដំណើរកម្សាន្តទេសចរណ៍ក្នុងទីក្រុង ការជូនភ្ញៀវពីកន្លែងមួយទៅកន្លែងមួយ និងការជូនភ្ញៀវទៅ ឬដឹកភ្ញៀវពីអាកាសយានដ្ឋាន</li>\r\n	<li>3. ម្ចាស់សណ្ឋាគារនិងផ្ទះសំណាក់ នៅក្នុងខេត្ត/ក្រុងណាមួយ</li>\r\n	<li>4. មគ្គុទេ្ទសក៍ទេសចរណ៍ នៅក្នុងខេត្ត/ក្រុងណាមួយ។</li>\r\n	<li>៥. អ្នកបើកបរ នៅខេត្ត/ក្រុងណាមួយ</li>\r\n	<li>៦. អ្នកណែនាំភ្ញៀវពីសេវាកម្មផ្សេងៗដែលមាននៅក្នុងវេទិកានេះ នៅក្នុងខេត្ត/ក្រុងណាមួយ</li>\r\n</ul>\r\n\r\n<p><strong>ក្នុងករណីនេះ អស់អ្នកដែលចាប់អារម្មណ៍ចង់ធ្វើជាដៃគូអាជីវកម្ម ត្រូវតែបំពេញតាមលក្ខណៈវិនិច្ឆ័យដូចខាងក្រោម៖</strong></p>\r\n\r\n<ul>\r\n	<li>ចុះឈ្មោះជាសមាជិក</li>\r\n	<li>ដឹង​ច្បាស់​ពី​គោលការណ៍​របស់ក្រុមហ៊ុនលីណា-ជួល​រថយន្ត​ទេសចរណ៍​</li>\r\n	<li>ចុះ​ហត្ថលេខា លើ​​​កិច្ច​ព្រមព្រៀងរវាង​អ្នក​ចុះឈ្មោះ និងម្ចាស់ក្រុមហ៊ុន ​​លីណា-ជួល​រថយន្ត​ទេសចរណ៍</li>\r\n	<li>ជួយក្រុមហ៊ុន​លីណា-ជួល​រថយន្ត​ទេសចរណ៍ក្នុង​ការ​ផ្សព្វផ្សាយ​បន្ត</li>\r\n	<li>មាន​ទំនុកចិត្ត​គ្នា​ទៅវិញ​ទៅមក។</li>\r\n</ul>\r\n\r\n<p><strong>រថយន្ត និង​ម្ចាស់​រថយន្ត</strong></p>\r\n\r\n<p>រថយន្ត​ចាំបាច់​ត្រូវ​តែ​ស្ថិត​ក្នុង​ស្ថានភាព​ល្អ ហើយ​ឆ្នាំ​ផលិតមិន​ត្រូវ​មុន​ឆ្នាំ២០០២ជា​ដាច់​ខាត រី​ឯ​ម្ចាស់​រថយន្ត​ត្រូវ​តែ​បង់​លើ​ការ​​ចំណាយផ្សេងៗ ​ដូច​ខាង​ក្រោម​ក្នុង​អត្រា​ខុសៗ​គ្នាពេល​ប្រតិបត្តិការ​ម្តងៗ៖</p>\r\n\r\n<ul>\r\n	<li>៣%​​ សម្រាប់​ថ្លៃប្រព័ន្ធ​ថែទាំ</li>\r\n	<li>៥% សម្រាប់​​អ្នក​ណែនាំ</li>\r\n	<li>៣.៥% សម្រាប់​ថ្ថៃធនាគារ</li>\r\n	<li>១០% សម្រាប់​ថ្ថៃប្រព័ន្ធ​​បញ្ចុះតម្លៃ នៅ​រាល់​ពេល​ដែលអតិថិជន​ប្រើ​ប័ណ្ណ​ចាប់​វេន។</li>\r\n	<li>ត្រីចក្រយានយន្តនិង​អ្នកបើកបរ​ជាម្ចាស់</li>\r\n</ul>\r\n\r\n<p><strong>ត្រីចក្រយានយន្ត និងម្ចាស់ត្រីចក្តយានយន្ត</strong><br />\r\n<br />\r\nគេ​អាច​ប្រើសំរាប់​តែការ​ធ្វើ​ដំណើរ​ក្នុង​ចំងាយ​ផ្លូវ​ជិត​តែប៉ុណ្ណោះ ហើយត្រូវ​មាន​គុណភាព​នៅ​ល្អ​ទាំង​អស់។​ ម្ចាស់​ត្រីចក្រយានយន្ត ​ត្រូវ​តែ​បង់​លើ​ការ​​ចំណាយផ្សេងៗ ​ដូច​ខាង​ក្រោម​ក្នុង​អត្រា​​ខុសៗ​គ្នាពេល​ប្រតិបត្តិការ​ម្តងៗ៖​</p>\r\n\r\n<ul>\r\n	<li>៣%​​ សម្រាប់​ថ្លៃប្រព័ន្ធ​ថែទាំ</li>\r\n	<li>៥% សម្រាប់​​អ្នក​ណែនាំ</li>\r\n	<li>៣.៥% សម្រាប់​ថ្ថៃធនាគារ</li>\r\n	<li>១០% សម្រាប់​ថ្ថៃប្រព័ន្ធ​​បញ្ចុះតម្លៃ នៅ​រាល់​ពេល​ដែលអតិថិជន​ប្រើ​ប័ណ្ណ​ចាប់​វេន។</li>\r\n</ul>\r\n\r\n<p><strong>សណ្ឋាគារ​ និង​ផ្ទះសំណាក់</strong></p>\r\n\r\n<p>ត្រូវ​តែ​មាន​បន្ទប់​ស្អាត​រៀបរយ​ល្អ ហើយម្ចាស់​សណ្ឋាគារ និងផ្ទះសំណាក់​ទាំង​នេះ​​ត្រូវ​តែ​បង់​លើ​ការ​​ចំណាយផ្សេងៗ ​ដូច​ខាង​ក្រោម​ក្នុង​អត្រា​​ខុសៗ​គ្នាតាម​ប្រតិបត្តិការ​និមួយៗ៖</p>\r\n\r\n<ul>\r\n	<li>៣%​​ សម្រាប់​ថ្លៃប្រព័ន្ធ​ថែទាំ</li>\r\n	<li>៥% សម្រាប់​​អ្នក​ណែនាំ</li>\r\n	<li>៣.៥% សម្រាប់​ថ្ថៃធនាគារ</li>\r\n	<li>១០% សម្រាប់​ថ្ថៃប្រព័ន្ធ​​បញ្ចុះតម្លៃ នៅ​រាល់​ពេល​ដែលអតិថិជន​ប្រើ​ប័ណ្ណ​ចាប់​វេន។</li>\r\n</ul>\r\n\r\n<p><strong>ការ​ដឹកដាក់ទៅមកនៅ​ព្រលាន​យន្ត​ហោះ</strong></p>\r\n\r\n<p>ម្ចាស់​រថយន្ត និង​ម្ចាស់​ត្រីចក្រយានយន្តអាច​ចូលរួម​ក្នុង​កម្មវិធី​នេះ ប៉ុន្តែ​ត្រូវ​ចេះ​រួស​រាយ​រាក់ទាក់​ក្នុង​ការ​បំរើ​អតិថិជន​</p>\r\n\r\n<p><strong>សេវា​ដឹកដល់​កន្លែង​និង​ដាក់​ចុះ</strong></p>\r\n\r\n<p>ម្ចាស់​រថយន្ត និង​ម្ចាស់​ត្រីចក្រយានយន្តអាច​ចូលរួម​ក្នុង​កម្មវិធី​នេះ ប៉ុន្តែ​ត្រូវ​ចេះ​រួស​រាយ​រាក់ទាក់​ក្នុង​ការ​បំរើ​អតិថិជន</p>\r\n\r\n<p><strong>អ្នកបកប្រែ​ផ្នែកទេសចរណ៍ (មគ្គុទេសទេសចរណ៍)</strong></p>\r\n\r\n<p>អ្នកបកប្រែ​ផ្នែកទេសចរណ៍ (មគ្គុទេសទេសចរណ៍) ត្រូវ​តែរួសរាយ ​អាចនិយាយ​បាន​ច្រើន​ភាសា​ និង​បំរើ​អតិថិជនយ៉ាង​រាក់​ទាក់​បំផុត។&nbsp;&nbsp;អ្នក​បក​ប្រែផ្នែកទេសចរណ៍ (មគ្គុទេសទេសចរណ៍) ប្រភេទនេះ​ ត្រូវ​តែ​សុខចិត្ត​បង់​លើ​ការ​​ចំណាយផ្សេងៗ ​ដូច​ខាង​ក្រោម​ក្នុង​អត្រា​​ខុសៗ​គ្នា ទៅតាម​ប្រតិបត្តិការនិមួយៗ៖</p>\r\n\r\n<ul>\r\n	<li>៣%​​ សម្រាប់​ថ្លៃប្រព័ន្ធ​ថែទាំ</li>\r\n	<li>៥% សម្រាប់​​អ្នក​ណែនាំ</li>\r\n	<li>៣.៥% សម្រាប់​ថ្ថៃធនាគារ</li>\r\n	<li>១០% សម្រាប់​ថ្ថៃប្រព័ន្ធ​​បញ្ចុះតម្លៃ នៅ​រាល់​ពេល​ដែលអតិថិជន​ប្រើ​ប័ណ្ណ​ចាប់​វេន។</li>\r\n</ul>\r\n\r\n<p><strong>អ្នក​បើកបរ​រថយន្ត</strong></p>\r\n\r\n<p>អ្នក​បើកបរ​រថយន្ត​ត្រូវ​តែ​ចេះ​និយាយ​ភាសា​អន្តរជាតិ​មួយ​ចំនួន ហើយ​ត្រូវ​បំរើ​អតិថិជនយ៉ាង​រាក់​ទាក់​បំផុត។&nbsp;&nbsp;អ្នក​បើកបរ​នេះ​ត្រូវ​តែសុខចិត្ត​​បង់​លើ​ការ​​ចំណាយផ្សេងៗ ​ដូច​ខាង​ក្រោម​ក្នុង​អត្រា​​ខុសៗ​គ្នា ទៅតាម​ប្រតិបត្តិការនិមួយៗ៖</p>\r\n\r\n<ul>\r\n	<li>៣%​​ សម្រាប់​ថ្លៃប្រព័ន្ធ​ថែទាំ</li>\r\n	<li>៥% សម្រាប់​​អ្នក​ណែនាំ</li>\r\n	<li>៣.៥% សម្រាប់​ថ្ថៃធនាគារ</li>\r\n	<li>១០% សម្រាប់​ថ្ថៃប្រព័ន្ធ​​បញ្ចុះតម្លៃ នៅ​រាល់​ពេល​ដែលអតិថិជន​ប្រើ​ប័ណ្ណ​ចាប់​វេន។</li>\r\n</ul>\r\n\r\n<p><strong>តម្រូវការចាំបាច់​</strong></p>\r\n\r\n<ul>\r\n	<li>អត្ត​សញ្ញាណប័ណ្ណ (សំរាប់​អតិថិជនខ្មែរ)</li>\r\n	<li>លិខិត​ឆ្លងដែន (សម្រាប់អតិថិជន​បរទេស)</li>\r\n	<li>ប័ណ្ណបើកបរ (សំរាប់​អតិថិជនខ្មែរ និង​បរទេស)</li>\r\n	<li>ប័ណ្ណគ្រួសារ (សំរាប់​អតិថិជនខ្មែរ)</li>\r\n	<li>ប៉ាតង់ (ប្រសិនបើមាន)</li>\r\n	<li>លិខិត​បញ្ជាក់​អាស័យដ្ឋានបច្ចុប្បន្ន (ប្រសិនបើមាន)</li>\r\n	<li>រូបថត ទំហំ ៤ គុណ ៦</li>\r\n</ul>\r\n '),
(4, 'Become A Customer', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><strong>How to Become a Customer</strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><strong>A. Requirements (Compulsory)</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Accomplish subscription</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Be aware of Lyna-CarRental.Com (LCRC) policy</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Assist Lyna-CarRental.Com company (LCRC) in advertising extension</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Build mutual trust.</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><strong>B. Documents needed for subscription</strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><em>Local Customer</em></span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Either ID card or Family Residence Book (Compulsory)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Passport (If available)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Cambodian Driver&rsquo;s License (Compulsory for self-drive car rental)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Business License (For Company)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Patent (For Company)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Current Address Endorsement (If available)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Photo Size 4 cm x 6 cm (Compulsory)&nbsp;</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\"><em>Foreign Customer</em></span></span></strong></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Passport (Compulsory)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Either International or Cambodian Driver&rsquo;s License (Compulsory)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Work permit (If available)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Business License (If available)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Patent (For Company)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Current Address Endorsement (If available)</span></span></li>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:Calibri,sans-serif\">Photo Size 4 cm x 6 cm (Compulsory)</span></span></li>\r\n</ul>\r\n ', 2, 'ចង់ក្លាយជាអតិថិជន', 'ក្លាយជាអតិថិជន', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\">ធ្វើយ៉ាង​ណា​ទើប​ក្លាយទៅជា​អតិថិជន</span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>ក) តម្រូវការ (ចាំបាច់)</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">បំពេញ​ការ​ចុះ​ឈ្មោះ</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ដឹង​អំពី​គោលការណ៍​​របស់​លីណា-ជួល​រថយន្ត​ទេសចរណ៍​</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ជួយលីណា-ជួល​រថយន្ត​ទេសចរណ៍​</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">មាន​ទំនុកចិត្ទចំពោះ​គ្នា​ទៅវិញ​ទៅមក</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>ខ) ឯកសារ​ចាំបាច់​សំរាប់​ការ​ចុះ​ឈ្មោះ</strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em>ជំពោះអតិថិជន​ជា​ជន​ជាតិ​ខ្មែរ</em></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">អត្តសញ្ញាណប័ណ្ណ​ ឬ បញ្ណគ្រួសារ (ចាំបាច់)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">លិខិត​ឆ្លង​ដែន (ប្រសិនបើមាន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប័ណ្ណបើកបរកម្ពុជា (ចាំបាច់​សំរាប់​អ្នក​ជួល​រថយន្ត​បើកបរ​ខ្លួន​ឯង)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប័ណ្ណ​អាជីវកម្ម (សំរាប់ក្រុមហ៊ុន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប៉ាតង់​ (សំរាប់ក្រុមហ៊ុន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">លិខិត​បញ្ជាក់​ទីលំនៅ (ប្រសិន​បើមាន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">រូបថតទំហំ ៤ គុណ ៦​ (ចាំបាច់)</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em>សំរាប់​អតិថិជន​បរទេស</em></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">លិខិត​ឆ្លង​ដែន (ប្រសិនបើមាន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប័ណ្ណបើកបរកម្ពុជា (ចាំបាច់​)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប័ណ្ណការងារ (ប្រសិន​បើមាន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប័ណ្ណ​អាជីវកម្ម (សំរាប់ក្រុមហ៊ុន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">ប៉ាតង់​ (សំរាប់ក្រុមហ៊ុន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">លិខិត​បញ្ជាក់​ទីលំនៅ (ប្រសិន​បើមាន)</span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">រូបថត​ទំហំ ៤ គុណ ៦ (ចាំបាច់)</span></span></li>\r\n</ul>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ld_ass`
--

CREATE TABLE `tbl_ld_ass` (
  `ld_id` int(11) NOT NULL,
  `ld_price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ld_ass`
--

INSERT INTO `tbl_ld_ass` (`ld_id`, `ld_price`) VALUES
(1, '150');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `lg_id` int(11) NOT NULL,
  `lg_image` text COLLATE utf8_bin NOT NULL,
  `lg_title` text COLLATE utf8_bin NOT NULL,
  `lg_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`lg_id`, `lg_image`, `lg_title`, `lg_detail`) VALUES
(2, '301643692641.png', '', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_description` varchar(50) DEFAULT NULL,
  `price` decimal(50,0) DEFAULT NULL,
  `trial` varchar(50) DEFAULT NULL,
  `period` varchar(50) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `num_pay` varchar(255) DEFAULT NULL,
  `add_by_user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`id`, `package_id`, `package_description`, `price`, `trial`, `period`, `discount`, `num_pay`, `add_by_user_id`, `created_date`) VALUES
(1, 1, 'SILVER', 10, NULL, '10', '10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_memberships`
--

CREATE TABLE `tbl_memberships` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `membership_name` varchar(100) NOT NULL,
  `membership_description` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `trial` varchar(50) DEFAULT NULL,
  `period` varchar(50) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `net_pay` decimal(10,2) DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `add_by_user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_memberships`
--

INSERT INTO `tbl_memberships` (`id`, `group_id`, `membership_name`, `membership_description`, `price`, `trial`, `period`, `discount`, `net_pay`, `date`, `add_by_user_id`, `created_date`, `status`) VALUES
(1, 1, 'PLATINUM', '', 50.00, '30', '365', '10', 45.00, '1580814521', NULL, NULL, 1),
(2, 1, 'GOLD', '', 100.00, '30', '365', '15', 85.00, '1580814550', NULL, NULL, 1),
(3, 1, 'DIAMOND', '', 200.00, '30', '365', '25', 150.00, '1580814568', NULL, NULL, 1),
(4, 2, 'PLATINUM', '', 35.00, '30', '365', '10', 31.50, '1580814597', NULL, NULL, 1),
(5, 2, 'GOLD', '', 75.00, '30', '365', '10', 67.50, '1580814615', NULL, NULL, 1),
(6, 2, 'DIAMOND', '', 150.00, '30', '365', '10', 135.00, '1580814630', NULL, NULL, 1),
(7, 3, 'PLATINUM', '', 50.00, '30', '365', '10', 45.00, '1580814646', NULL, NULL, 1),
(8, 3, 'GOLD', '', 100.00, '30', '365', '15', 85.00, '1580814662', NULL, NULL, 1),
(9, 3, 'DIAMOND', '', 200.00, '30', '365', '25', 150.00, '1580814678', NULL, NULL, 1),
(10, 4, 'PLATINUM', '', 50.00, '30', '365', '10', 45.00, '1580814693', NULL, NULL, 1),
(11, 4, 'GOLD', '', 75.00, '30', '365', '15', 63.75, '1580814706', NULL, NULL, 1),
(12, 4, 'DIAMOND', '', 100.00, '30', '365', '25', 75.00, '1580814737', NULL, NULL, 1),
(13, 5, 'PLATINUM', '', 50.00, '30', '365', '10', 45.00, '1580814764', NULL, NULL, 1),
(14, 5, 'GOLD', '', 75.00, '30', '365', '15', 63.75, '1580814780', NULL, NULL, 1),
(15, 5, 'DIAMOND', '', 100.00, '30', '365', '25', 75.00, '1580814794', NULL, NULL, 1),
(16, 6, 'MEMBERSHIP FEE', '', 50.00, '30', '365', '10', 45.00, '1580814809', NULL, NULL, 1),
(17, 6, 'COUPON CARD BUYING', '<p>ggg</p>\r\n', 25.00, '30', '365', '10', 22.50, '1580814822', NULL, NULL, 1),
(18, 6, 'COUPON CARD BUYING', '', 75.00, '30', '365', '15', 63.75, '1580814835', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership_type`
--

CREATE TABLE `tbl_membership_type` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_2` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_membership_type`
--

INSERT INTO `tbl_membership_type` (`id`, `description`, `description_2`, `status`) VALUES
(1, 'Car\'s Owner', NULL, NULL),
(2, 'Rickshaw\'s Owner', NULL, NULL),
(3, 'Hotel & Guesthouse', NULL, NULL),
(4, 'Tour Guide', NULL, NULL),
(5, 'Dirver', NULL, NULL),
(6, 'Introducer', NULL, NULL),
(7, 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_footer`
--

CREATE TABLE `tbl_menu_footer` (
  `ft_id` int(11) NOT NULL,
  `ft_title` text COLLATE utf8_bin NOT NULL,
  `ft_detail` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_menu_footer`
--

INSERT INTO `tbl_menu_footer` (`ft_id`, `ft_title`, `ft_detail`) VALUES
(1, 'Statutes', '<p>link to12</p>\r\n '),
(2, 'Terms of Use ', '<p><a href=\"http://localhost:88/Lyna-CarRental/terms_of_use.html\">Terms of Use</a>&nbsp;</p>\r\n '),
(3, 'Privacy Policy ', '<p><a href=\"http://localhost:88/Lyna-CarRental/privacy_policy.html\">Privacy Policy</a>&nbsp;</p>\r\n '),
(4, 'Contact', '<p><a href=\"http://localhost:88/Lyna-CarRental/contact.html\">Contact</a></p>\r\n '),
(5, 'Sponsorship', '<p><a href=\"http://localhost:88/Lyna-CarRental/members/sponsorship_advertising.html\">Sponsorship</a></p>\r\n '),
(6, 'Sitemap', '<p><a href=\"http://localhost:88/Lyna-CarRental/sitemap.html\">Sitemap</a></p>\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly_commission`
--

CREATE TABLE `tbl_monthly_commission` (
  `m_c_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_no` varchar(255) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `comm` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `ex_fuel` varchar(255) NOT NULL,
  `ex_driver` varchar(255) NOT NULL,
  `ex_ot` varchar(255) NOT NULL,
  `ex_guide` varchar(255) NOT NULL,
  `ex_partner` varchar(255) NOT NULL,
  `ex_comm` varchar(255) NOT NULL,
  `ex_discount` varchar(255) NOT NULL,
  `ex_other` varchar(255) NOT NULL,
  `ex_total` varchar(255) NOT NULL,
  `profit` varchar(255) NOT NULL,
  `free_comm` varchar(255) NOT NULL,
  `net_profit` varchar(255) NOT NULL,
  `type_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_monthly_commission`
--

INSERT INTO `tbl_monthly_commission` (`m_c_id`, `ref_no`, `from_date`, `to_date`, `customer_name`, `customer_no`, `partner_id`, `comm`, `income`, `invoice_no`, `ex_fuel`, `ex_driver`, `ex_ot`, `ex_guide`, `ex_partner`, `ex_comm`, `ex_discount`, `ex_other`, `ex_total`, `profit`, `free_comm`, `net_profit`, `type_ref`) VALUES
(1, 15, '2019-08-10', '2019-08-18', 'kemun torns', 'LCRC', 22, '5', '200', 'REC-2018-08-0514', '10', '5', '5', '2', '5', '5', '10', '2', '44', '156', '7.80', '148.20', 'Vehicle'),
(2, 19, '2019-08-10', '2019-08-18', 'kemun tornh', 'LCRC', 37, '5', '200', 'REC-2018-08-0514', '10', '5', '5', '2', '5', '5', '10', '2', '44', '156', '7.80', '148.20', 'Vehicle'),
(3, 1, '2019-08-10', '2019-08-18', 'kemun torn', 'OUT', 37, '5', '200', 'REC-2018-08-0514', '10', '5', '5', '2', '5', '5', '10', '2', '44', '156', '7.80', '148.20', 'RickShaw'),
(4, 1, '2019-08-11', '2019-08-18', 'kemun torn', 'OUT', 37, '5', '200', 'REC-2018-08-0514', '10', '5', '5', '2', '5', '5', '10', '2', '44', '156', '7.80', '148.20', 'Accessories'),
(5, 19, '2019-08-10', '2019-08-20', 'kemun torn', 'OUT', 37, '2', '1000', 'REC-2018-08-0514', '5', '5', '5', '5', '5', '5', '15', '5', '35', '815', '16.3', '798.7', 'Vehicle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_payment`
--

CREATE TABLE `tbl_online_payment` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `service_char` varchar(100) DEFAULT NULL,
  `acc` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `net_total` varchar(100) DEFAULT NULL,
  `transactionId` varchar(100) DEFAULT NULL,
  `book_date` varchar(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_online_payment`
--

INSERT INTO `tbl_online_payment` (`id`, `first_name`, `last_name`, `pay_type`, `amount`, `gender`, `service_char`, `acc`, `phone`, `email`, `net_total`, `transactionId`, `book_date`, `note`) VALUES
(1, 'test', 'singh', '1', '100', '1', '3.00', 'sfsfsfsf', '09795021132', 'hsingh@sdlcinfotech.com', '103.00', '1607495445745868211', '2020-12-09', 'sdfsdsdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_customer`
--

CREATE TABLE `tbl_our_customer` (
  `ou_id` int(11) NOT NULL,
  `ou_title` varchar(255) NOT NULL,
  `ou_image` varchar(255) NOT NULL,
  `ou_detail` mediumtext NOT NULL,
  `url` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_our_customer`
--

INSERT INTO `tbl_our_customer` (`ou_id`, `ou_title`, `ou_image`, `ou_detail`, `url`) VALUES
(13, 'Campore Company', '20190723_2330.png', ' ', 'http://www.campore.com/'),
(4, 'AAPTIP', '20190723_2603.png', ' ', 'https://www.aaptip.org/'),
(6, 'AEON', '20190723_7657.png', ' ', 'https://aeonmallphnompenh.com/'),
(7, 'Amsa Shop', '20190723_7035.png', ' ', 'www.Amsashop.com'),
(8, 'Archetype', '20190723_7006.png', ' ', 'https://www.archetype-group.com'),
(9, 'BBC Media Action', '20190723_4780.png', ' ', 'https://www.bbc.co.uk/mediaaction/'),
(10, 'Bollore Logistics', '20190723_8216.png', ' ', 'https://www.bollore-logistics.com/en'),
(11, 'Cambodia Autrement', '20190723_2793.png', ' ', 'www.cambodgeautrement.com'),
(14, 'Mobitel Cambodia', '20190723_7602.png', ' ', 'https://www.cellcard.com.kh/en'),
(15, 'CENTION', '20190723_8232.png', ' ', 'https://www.cention.com/'),
(17, 'CIIG INFO', '20190723_6479.png', ' ', 'http://www.ciig.info'),
(18, 'East West International School', '20190723_2518.png', ' ', 'http://www.ewiscambodia.org/'),
(19, 'EUROPEAN UNION', '20190723_8171.png', ' ', 'https://europa.eu/european-union/index_en'),
(20, 'GLOBAL GREEN INSTITUTE', '20190723_6646.png', ' ', 'https://gggi.org/careers-2/'),
(21, 'GRASS SAVOYE', '20190723_1592.png', ' ', 'http://www.grassavoye.fr'),
(22, 'HERTEL', '20190723_9314.png', ' ', 'http://www.hertel.com/'),
(23, 'HR INC', '20190723_6504.png', ' ', 'https://www.hrinc.com.kh/'),
(24, 'JICA', '20190723_9495.png', ' ', 'https://www.jica.go.jp/english/?'),
(25, 'KfW', '20190723_9643.png', ' ', 'https://www.kfw.de'),
(26, 'LEGRAND', '20190723_7091.png', ' ', 'www.legrand.com'),
(27, 'MR PIZZA', '20190723_1257.png', ' ', 'www.mrpizza.co.kr; www.mpkgroup.co'),
(28, 'NEXUS', '20190723_8281.png', ' ', 'https://www.cbsa-asfc.gc.ca/prog/nexus/application-demande-eng.html'),
(29, 'PEACE CORP CAMBODIA', '20190723_5736.png', ' ', 'https://www.peacecorps.gov/cambodia/'),
(30, 'PENOID RECARD PHILIPPINES', '20190723_8480.png', ' ', 'www.pernod-ricard.com'),
(31, 'PHILLIP BANK', '20190723_5188.png', ' ', 'https://www.phillipbank.com.kh'),
(32, 'SAFFRON', '20190723_2876.png', ' ', 'https://www.developmentaid.org/#!/home'),
(33, 'SMART', '20190723_9212.png', ' ', 'https://www.smart.com.kh/get-smart/plans/'),
(34, 'SWISS LIFE', '20190723_9017.png', ' ', 'https://www.swisslife.com/en/home.html'),
(35, 'TERRA RENAISSANCE', '20190723_4602.png', ' ', 'https://www.devex.com/organizations/terra-renaissance-124475'),
(36, 'TRUNK SIEM REAP', '20190723_4979.png', ' ', 'https://www.facebook.com/trunkh/'),
(37, 'UNFPA', '20190723_1363.png', ' ', 'https://www.unfpa.org/'),
(38, 'WILD LIFE CONSERVATION CAMBODIA', '20190723_2771.png', ' ', 'https://cambodia.wcs.org/'),
(39, 'WORLD VISION CAMBODIA', '20190723_8627.png', ' ', 'https://www.wvi.org/cambodia'),
(41, 'ZEN TRIP', '20190723_8838.png', ' ', 'http://zentrips.net/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_service`
--

CREATE TABLE `tbl_our_service` (
  `se_id` int(11) NOT NULL,
  `se_title` varchar(255) NOT NULL,
  `se_image` varchar(255) NOT NULL,
  `se_detail` mediumtext NOT NULL,
  `se_title_kh` mediumtext NOT NULL,
  `se_detail_kh` mediumtext NOT NULL,
  `se_price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_our_service`
--

INSERT INTO `tbl_our_service` (`se_id`, `se_title`, `se_image`, `se_detail`, `se_title_kh`, `se_detail_kh`, `se_price`) VALUES
(9, 'Getting Foreign Work Permit', '20190723_4331.png', '<ol>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#3f3f3f\">Work Permit For Foreigner</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">According to Articles 261, 264, 265 of the Cambodian Labor Law, and Prakas No. 196, dated August 20, 2014; all foreign nationals working in the Kingdom are required to hold a work permit.</span></span></span></span></span><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">E (Business) visa is used for employment opportunity in the Kingdom of Cambodia. So you are required to apply for a work permit if you start holding E (Business) - multiple entries visa.&nbsp;&nbsp;</span></span></span></span></span><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">All E (Business) visa holders in the Kingdom</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:DaunPenh\">​</span></span></span> <span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">of Cambodia </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">now can apply for your work permit online through www.fwcms.mlvt.gov.kh</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> If you don&rsquo;t know how to complete the process by yourself you can entrust someone to apply for your work permit. The following are our procedures:</span></span></span><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Required Checklist for registered Employer</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">- Company incorporation certificate issued by the Ministry of Commerce (MOC)&nbsp;</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">- Articles of Incorporation with MOC (if applicant is a shareholder only)</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">- Patent certificate issued by the General Department of Taxation (GDT)</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">- Valid passport</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">- Previous E (Business) visa</span></span></span><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">- Current E (Business) visa</span><br />\r\n<span style=\"background-color:white\">- Passport photo (4cm x 6cm, white background, 2 sheets)</span><br />\r\n<span style=\"background-color:white\">- Medical checkup certificate</span><br />\r\n<span style=\"background-color:white\">- Current work permit card (if renewal is needed) &nbsp;</span><br />\r\n&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Required Checklist for Employee (registered employee):</span></span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Quota/Employee registration certificate with MOLVT&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Employment contract in Khmer</span></span></span><br />\r\n	<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">Valid passport</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Previous E</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:DaunPenh\">​ </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">(Business) visa</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Current E (Business) visa</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Passport photo (4cm x 6cm, white background, 2 sheets)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Medical checkup certificate</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Current work permit card (if renewal is needed)</span></span></span><br />\r\n	<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;</span></span></span></span><br />\r\n	<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Required Checklist for Self-Employed/Freelancer</span></span></span></strong>&nbsp;</span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">(He/she is not a registered employer, nor a registered employee. He/she makes a living in Cambodia and holding E-Business visa.):</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Residency permit issued by the Sangkat office</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Valid passport</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Previous E (Business) visa</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Current E(Business) visa</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Passport photo (4cm x 6 cm, white background, 2 sheets)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Medical checkup certificate</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Current work permit card (if renewal is needed)</span></span></span><br />\r\n	<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">&nbsp;</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Processing Period:&nbsp;&nbsp;</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">It will take at least 30 working days</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> to get it done after all supporting documents have been submitted and the payment has been made.</span></span></span><br />\r\n&nbsp;</span></span><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">For information on the cost of the work permit, please feel free to contact us.</span></span></span></strong><br />\r\n<strong>&nbsp;</strong><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><strong><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Payment Methods:&nbsp;&nbsp;</span></span></strong></span></span></strong></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cash</span></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Bank deposit</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Bank transfer</span></span></span><br />\r\n	<strong style=\"font-size:11pt\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Notice:&nbsp;</span></span></strong></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Work permit expires on December 31st.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Work permit renewal needs to be submitted </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">from</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> 1<sup>st</sup> January to </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">31st M</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">arch. Late renewal is subject to penalty.</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The penalty on late renewal is $10 times 90 days =</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:DaunPenh\">​ </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">$900). </span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The penalty starts on April 1st unless notified by the MOLVT.&nbsp;&nbsp;&nbsp;</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The recall penalty is $100/year, the calendar year during which the customer holds E (Business visa).</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">We can also arrange all supporting documents for you if needed.</span></span></span><br />\r\n<span style=\"font-size:8.0pt\"><span style=\"color:#3f3f3f\">&nbsp;</span></span><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Our Free Consultancy Service:&nbsp;</span></span></span></strong><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">Please feel free to come to&nbsp;our office as indicated in the paragraph below and get our 30-minute free consultancy</span></span></span> <span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">services</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">. The quickest and best way to discuss what you need is to bring at our office your passport your expired work permit and your other related documents.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong>Our Contact Address</strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">#132 Street 430 Tumnop TeukI Chamcarmorn</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Phnom Penh I </span></span></span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Cambodia</span></span></span><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Name: </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">TAN LYNA</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Position: Founder &amp; CEO</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Tel: +855 (0) 12 55 42 47</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Email: </span></span><a href=\"mailto:info@lyna-carrental.com\" style=\"color:blue; text-decoration:underline\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">info@lyna-carrental.com</span></span></a></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Website: www.Lyna-CarRental.Com</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">Working Days: Monday - Saturday </span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Working hours:&nbsp; </span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">8</span></span></span><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">:00am-5:00pm</span></span></span><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"background-color:white\">Off Days: Sundays&nbsp;and Annual Holidays</span></span></span></p>\r\n ', 'ធ្វើប័ណ្ណការងារជនបរទេស', '<p>ខ្មែរ</p>\r\n\r\n<p>អង់គ្លេស</p>\r\n\r\n<p>ចិន (អក្សរកាត់)</p>\r\n\r\n<p>3725/5000</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">១. <strong>ប័ណ្ណការងារ​សំរាប់​ជន​បរទេស</strong></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">យោង​តាម​​ច្បាប់ការងារ​នៃ​ប្រទេស​កម្ពុជា មាត្រា២៦១ ២៦៤ ២៦៥ និង​ប្រកាស​លេខ ១៩៦​ចុះថ្ងៃទី២០ ខែ សីហា ឆ្នាំ​២០១៤ រាល់​អនិកជនដែល​ធ្វើការ​ព្រះរាជាណាចក្រ​កម្ពុជា តម្រូវ​ឲ្យ​មាន​ប័ណ្ណ​ការងារ។ </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E (សំរាប់​ប្រភេទ​ពាណិជ្ជកម្ម) គឺ​ប្រើសម្រាប់ឱកាសការងារ​នៅ​ក្នុង​ព្រះរាជាណាចក្រ​កម្ពុជា។ ​អាស្រ័យ​ហេតុ​នេះ លោក​អ្នកត្រូវ​តែ​ដាក់​ពាក្យ​សុំ​ប័ណ្ណ​ការងារ ប្រ​សិន​បើលោកអ្នកកំពុងកាន់ទិដ្ឋាការប្រភេទ E (សំរាប់ប្រភេទពាណិជ្ជកម្ម) - អាចចេញចូលបានច្រើនដងដោយសេរីក្នុងរយ:ពេលនៃអាណត្តទិដ្ឋាការ ។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ឥឡូវ​នេះ​អ្នក​កាន់ទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E ទាំង​អស់នៅព្រះរាជាណាចក្រ​កម្ពុជា​អាច​ដាក់ពាក្យ​ស្នើសុំ​ប័ណ្ណការងារ​ជាលក្ខណៈ​អនឡាញតាមរយ:គេហទំព័រ www.fwcms.mlvt.gov.kh ។&nbsp; ប្រសិន​បើ​លោក​អ្នក​មិន​ដឹង​ពី​របៀប​បំពេញ​ពាក្យ​សុំ ដោយ​ខ្លួន​ឯង​​បានទេ លោក អ្នក​ អាចឲ្យ​អ្នកម្នាក់​ដែល​ទុកចិត្ត​​ដើម្បី​ដាក់​ពាក្យ​សុំ​ប័ណ្ណ​ការងារ ។&nbsp; ​នីតិវិធី​របស់​ពួក​យើង​មាន​ដូច​តទៅ៖ </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">​<strong>តារាង​ត្រួតពិនិត្យជា​តម្រូវការ​សំរាប់​និយោជក ដែល​បាន​ចុះបញ្ជី</strong></span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​បញ្ជាក់ការ​ចុះបញ្ជីក្រុមហ៊ុនដោយ​ក្រសួង​ពាណិជ្ជកម្ម</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">អនុសារណៈបង្កើតក្រុមហ៊ុន ដោយ​​ក្រសួង​ពាណិជ្ជកម្ម (​ប្រសិន​បើ​​អ្នក​ដាក់​ពាក្យ​គ្រាន់​តែ​ជា​ម្ចាស់​ភាគហ៊ុន)</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណប៉ាតង់​ចេញ​ដោយ​អគ្គ​នាយកដ្ឋាន​ពន្ធដារ</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​ឆ្លងដែន​ដែល​នៅ​មាន​សុពលភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E ពីមុន</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E ​បច្ចុប្បន្ន</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">រូបថតលិខិត​ឆ្លងដែន ៤​គុណ​ ៦ (ផ្ទៃពណ៌ស) ២ សន្លឹក</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​បញ្ជាក់​សុខភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណបញ្ជាក់​ការងារ​បច្ចុប្បន្ន (ប្រសិន​បើ​ត្រូវធ្វើ​ថ្មី)</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">តារាង​ត្រួត​ពិនិត្យ​ដែល​តម្រូវ​លើ​និយោជិត​ (ដែល​មាន​ឈ្មោះក្នុង​បញ្ជី)</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​បញ្ជាក់​ការ​ចុះ​ឈ្មោះ​បញ្ជី​កូតា</span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">/និយោជិត​នៅ​ក្រសួង​ការងារ និង​ បណ្តុះ​បណ្តាល​វិជ្ជាជីវៈ​</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​ឆ្លងដែន​ដែលនៅ​មាន​សុពលភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:red\"><ins>​</ins></span>ទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E ​ពីមុន</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">រូបថតលិខិត​ឆ្លងដែន ៤​គុណ​ ៦ (ផ្ទៃពណ៌ស) ២ សន្លឹក</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​បញ្ជាក់​សុខភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណបញ្ជាក់​ការងារ​បច្ចុប្បន្ន (ប្រសិន​បើ​ត្រូវធ្វើ​ថ្មី)</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">តារាង​ត្រួត​ពិនិត្យ​ដែល​តម្រូវ​សម្រាប់​អ្នកធ្វើការ​ងារ​ខ្លួន​ឯងឬ​អ្នក​ធ្វើការ​ក្រៅ​ម៉ោង</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">(បុគ្គល​ប្រភេទ​នេះ​មិន​មែន​ជា​និយោជក ឬ​និយោជិត ដែល​មាន​ឈ្មោះក្នុង​​បញ្ជីទេ។ ពួក​គេ​ប្រកប​ការ​រស់​នៅ​ក្នុង​ប្រទេស​កម្ពុជា​ ហើយមានទិដ្ឋាការប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E នៅនឹង​ដៃ):</span></span></span></span><br />\r\n<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណ​ស្នាក់​នៅ ដែល​ចេញ​ដោយ​សាលា​សង្កាត់</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​ឆ្លងដែន​ដែលនៅ​មាន​សុពលភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទិដ្ឋាកាប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E​ ពីមុន</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទិដ្ឋាកាប្រភេទ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">E​ បច្ចុប្បន្ន</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">រូបថតលិខិត​ឆ្លងដែន ៤​គុណ​ ៦ (ផ្ទៃពណ៌ស) ២ សន្លឹក</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លិខិត​បញ្ជាក់​សុខភាព</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណបញ្ជាក់​ការងារ​បច្ចុប្បន្ន (ប្រសិន​បើ​ត្រូវធ្វើ​ថ្មី)</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">រយៈពេលរត់​ការ</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">នឹង​ត្រូវប្រើរយៈពេលយ៉ាងតិច ៣០ ថ្ងៃការងារ ដើម្បីសដំរេចកិច្ច​ការ​នេះ​បានក្រោយ​ពី​បាន​ដាក់​ឯកសារពិនិត្យ និង​បាន​បង់​ប្រាក់រួច។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទាក់ទងទៅនិងពត៌មានតម្លៃនៃប័ណ្ណការងារ សូមទាក់ទងមកយើងខ្ញុំ។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">របៀប​បង់​ប្រាក់៖</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">បង់​ជា​សាច់​ប្រាក់</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ដាក់​ក្នុង​ធនាគារ</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">កា​រផ្ទេរ​តាម​ធនាគារ</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">សំគាល់៖</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប័ណ្ណ​បញ្ជាក់​ការងារ​ផុត​កំណត់​នៅ​ថ្ងៃទី​៣១​ធ្នូ</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">&nbsp;ការ​ធ្វើប័ណ្ណ​ការងារបន្ត​ត្រូវ​ដាក់​ពិនិត្យ​នៅ​ចន្លោះ​ថ្ងៃទី​១ មករា ដល់ ៣១ មិនា។ ការ​យឺត​យ៉ាវ​ក្នុង​ការ​បន្តនឹង​ត្រូវ​ទទួល​​​ការ​ពិន័យ។</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប្រាក់​ពិន័យ​លើ​ការ​យឺតយ៉ាវ​ក្នុង​ការ​បន្ត គឺ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">$10 x 90​ ថ្ងៃ = $900 ។ </span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">​ការ​បង់​ពិន័យ គឺ ប្រព្រឹត្ត​ទៅនៅ​ថ្ងៃ​ទី ១ ខែ​មេសា ​លើកលែង​តែ​មាន​ការ​ជូន​ដំណឹង​ពី​ក្រសួងការងារ និង​បណ្តុះបណ្តាលវិជ្ជាជីវៈ។</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ការ​ពិន័យសរុបរាប់​តាំង​ពីមុនគឺ​ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">$100 ក្នុង​១ឆ្នាំ គឺឆ្នាំ​ក្នុង​ប្រតិទិនដែល​អតិថិជន​កាន់​ទិដ្ឋាកាប្រភេទ E។</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">យើង​ក៏អាច​សម្រួល​ឯកសារ​ភ្ជាប់​ទាំង​អស់​ជូន​អស់​លោក​អ្នក ប្រសិនបើ​ត្រូវការ។</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">សេវាពិគ្រោះយោបល់​ឥតគិត​ថ្លៃ​របស់​យើងខ្ញុំ</span></span></strong></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">សូម​លោក​អ្នក​អញ្ជើញ​មក​កាន់ការិយាល័យ​យើង​ខ្ញុំដែល​មាន​បង្ហាញ​ជូន​នៅក្នុង​កថាខ័ណ្ឌខាងក្រោម ដើម្បី​ទទួល​សេវាពិគ្រោះយោបល់​ឥតគិត​ថ្លៃ​របស់​យើងខ្ញុំចំនួន​៣០​នាទី។ មធ្យោបាយ​ដ៏លឿន​នឹង​ប្រសើរ​បំផុតក្នុង​ការ​ពិភាក្សា​អំពី​តម្រូវ​ការ​របស់​លោក​អ្នក​គឺ​ត្រូវ​យក​មក​កាន់​ការិយាល័យ​យើង​ខ្ញុំ​នូវ​លិខិត​ឆ្លងដែន ប័ណ្ណការងារ​ដែល​ផុត​កំណត់ ព្រមទាំង​ឯកសារពាក់​ព័ន្ធ​ផ្សេងៗ​ទៀត​របស់​លោក​អ្នក។</span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">អាស័យដ្ខាន​ទំនាក់ទំនង​របស់​យើង​ខ្ញុំ</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ផ្ទះលេខ​១៣២ ផ្លូវ​៤៣០ សង្កាត់​ទំនប់​ទឹក ខ័ណ្ឌ​ចម្ការ​មន​ ភ្នំពេញ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ឈ្មោះ៖ តាន់ លីណា</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">តួនាទី៖ ស្ថាបនិក និង​ជា​អគ្គនាយក</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ទូរស័ព្ទ៖ </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">+855 (0) 12 55 42 47</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">អ៊ីមែល៖ </span></span><a href=\"mailto:info@lyna-carrental.com\" style=\"color:blue; text-decoration:underline\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">info@lyna-carrental.com</span></span></a></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">វែបសាយ៖ </span></span><a href=\"http://www.Lyna-CarRental.Com\" style=\"color:blue; text-decoration:underline\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">www.Lyna-CarRental.Com</span></span></a></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ថ្ងៃ​ធ្វើការ៖ ពី​ថ្ងៃ​ច័ន្ទ ដល់​ថ្ងៃ​សៅរ៍</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ម៉ោង​ធ្វើការ៖ ពីម៉ោង ៨</span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">:០០ព្រឹក ដល់ ៥:០០ រសៀល</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ថ្ងៃឈប់​សម្រាក៖ រាល់ថ្ងៃអាទិត្យ និង​ថ្ងៃ​សំរាក​ប្រចាំ​ឆ្នាំ</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n ', '300'),
(10, 'Car Insurance in Cambodia', '20190723_7431.png', '<p style=\"margin-left:0in; margin-right:0in\"><strong><span style=\"font-size:10.0pt\">Car Insurance in Cambodia</span></strong></p>\r\n\r\n<p><span style=\"font-size:10.0pt\"><span style=\"color:#333333\">According to the Cambodian Law Blog, more than 2,000 people die of road accidents each year. Due to the high risk of these accidents, all company and commercial vehicles are now required by law to have Liability Insurance Coverage. However, this does not guarantee coverage for private car owners. Expats are advised to purchase an international car insurance plan to avoid large accident-related bills</span></span></p>\r\n ', 'ធានារ៉ាប់រ៉ងលើរថយន្តនៅកម្ពុជា', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\">២. ការធានារ៉ាប់រង​រថយន្ត​នៅ​កម្ពុជា</span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">យោង​តាម</span><span style=\"font-size:8.0pt\"> Cambodian Law Blog</span><span style=\"font-size:8.0pt\"> ​ ក្នុង​មួយ​ឆ្នាំៗ ប្រជា​ពល​រដ្ឋ​ប្រមាណ​ជាង​២០០០​នាក់ បាន​ស្លាប់​ដោយសារ​គ្រោះ​ថ្នាក់​ចរាចរ​នៅ​តាម​ដង​ផ្លូវ។</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:8.0pt\">ដោយសារ​ហានិភ័យនៃ​គ្រោះថ្នាក់​នេះ​មាន​កំរិត​ខ្ពស់ ទើប​បច្ចុប្បន្ន ច្បាប់​តម្រូវ​ឲ្យ​រាល់​រថយន្តនៃក្រុមហ៊ុន ឬរថយន្ត​​ផ្នែក​ពាណិជ្ជកម្ម​ទាំង​អស់ ត្រូវតែ​គិតគូរឲ្យ​មាន​​​ការ​ទទួល​ខុស​ត្រូវ​ពី​ផ្នែក​​ធានារ៉ាប់រង។&nbsp; ការ​ធានារ៉ាប់រង​នេះក៏​អនុវត្តលើ ម្ចាស់​រថយន្ត​ប្រភេទ​ឯកជនផង​ដែរ។&nbsp; ​ជន​បរទេស​បាន​ទទួល​ការណែនាំ​ឲ្យ​ទិញ គំរោងធានារ៉ាប់រងរថយន្ត​ ដើម្បី​ជៀសវាង​ការ​ចំណាយ​ច្រើន​ទៅលើ​ការ​គ្រោះថ្នាក់។</span></p>\r\n ', '$50.00');
INSERT INTO `tbl_our_service` (`se_id`, `se_title`, `se_image`, `se_detail`, `se_title_kh`, `se_detail_kh`, `se_price`) VALUES
(11, 'Service of getting Cambodian Driver\'s License Certified', '20190723_4495.png', '<ol start=\"3\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2b2b2b\">Processing Service of getting Driver&rsquo;s License certified in Cambodia</span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:10.0pt\">In term of law, each driver who drives in the Kingdom of Cambodia is required to hold a valid Cambodian driver&rsquo;s license.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:10.0pt\">The customer can apply at once for a driver&rsquo;s license by taking a driving test to get the driver&rsquo;s license comprising Types A and Type B issued by Department of Public Works and Transport of each province/city of Cambodia. The test can be either in Khmer or in English and takes place in Aeon Mall I and Aeon Mall II.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:10.0pt\">The customer can make an appointment for test taking at either of these centers or take online test by visiting the MPWT &lsquo;website of </span><span style=\"color:blue\"><u><span style=\"font-size:10.0pt\"><span style=\"background-color:white\">https://driverlicense. mpwt.gov.kh</span></span></u></span><span style=\"font-size:10.0pt\">. </span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:10.0pt\">The customer who needs to apply for driver&rsquo;s license of Type C or a higher type is required to learn lessons at an officially </span><span style=\"font-size:10.0pt\">authorized</span><span style=\"font-size:10.0pt\"> driving school</span><span style=\"font-size:10.0pt\">.</span><span style=\"font-size:10.0pt\">. You can contact the Driver&rsquo;s License Center for more information.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">For Cambodian citizens, the documents required for taking test, renewing, and extending validity of the driving license are:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">Cambodian National</span> <span style=\"font-size:10.0pt\">ID card</span><span style=\"font-size:10.0pt\"> with</span><span style=\"font-size:10.0pt\"><span style=\"font-family:DaunPenh\">​ </span></span><span style=\"font-size:10.0pt\">3 photos of 4cm x 6cm </span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">Medical Certificate (obtained at the Driver&rsquo;s License Center. </span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">Expired driver&rsquo;s license (for </span><span style=\"font-size:10.0pt\">2nd</span><span style=\"font-size:10.0pt\"> and 3rd renewing)</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">The Driver&rsquo;s License Type C, D &amp; E: The types of those driver&rsquo;s licenses shall be certified by a driving school &nbsp;</span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-size:10.0pt\">For the foreigners who want to obtain a Cambodian driving license, the following documents are required:</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">The </span><span style=\"font-size:10.0pt\">valid national</span><span style=\"font-size:10.0pt\"> driver&rsquo;s license</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">His/her valid passport</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">His/her valid visa</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">His/her certificate of residence in Cambodia</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">3 photos 4 x 6 cm with white background &nbsp;</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\">Medical Certificate (obtained at the </span><span style=\"font-size:10.0pt\">Ministry of Health)</span><span style=\"font-size:10.0pt\">. </span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:10.0pt\">On completion of the driving test, the customer will have to wait at least 20 or 30 minutes so as to get his/her driver&rsquo;s license renewed after the driving test.</span></p>\r\n ', 'រត់ការធ្វើប័ណ្ណបើកបររថយន្ត', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"color:green\">សេវា​រត់ការយកប័ណ្ណបើកបរនៅប្រទេសកម្ពុជា</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">តាមផ្លូវ​ច្បាប់​ អ្នកដែល​បើកបរ​នៅ​ក្នុង​ព្រះរាជាណាចក្រ​កម្ពុជា គេតម្រូវ​ឲ្យ​មាន​ប័ណ្ណបើកបរ​ខ្មែរដែល​មាន​សុពលភាព។</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">អតិថិជនអាច​​ដាក់​ពាក្យ​សុំប័ណ្ណបើកបរជាបន្ទាន់​ដោយ​ធ្វើការ​ប្រឡង​យក​ប័ណ្ណបើកបរ​ប្រភេទ</span><strong><span style=\"font-size:8.0pt\">A</span></strong><span style=\"font-size:8.0pt\"> និង​ប្រភេទ​</span><strong><span style=\"font-size:8.0pt\">B​ </span></strong><span style=\"font-size:8.0pt\">ដែល​​ចេញ​ដោយ​​​នាយក​ដ្ឋាន​​សាធារណៈការ​ និង​ ដឹក​ជញ្ជូនដែលមាន​ទីតាំង​នៅ​តាម​បណ្តា​ខេត្តក្រុង​នានានៃប្រទេស​កម្ពុជា។ ការ​ប្រឡង​ធ្វើឡើង​ជា​ភាសា​ខ្មែរ ឬ​ជាភាសា​អង់គ្លេស នៅមណ្ឌល​អ៊ីអន​១ និងមណ្ឌល​​អ៊ីអន​២។ </span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">អតិថិជន​អាច​ធ្វើការណាត់ជួបនៅ​មណ្ឌល​ណាមួយ​នៃ​មណ្ឌល​ទាំង​ពីរ​ខាងលើ&nbsp; ឬធ្វើតេស្ត​តាម​អនឡាញ​របស់​ក្រសួង​សាធារណការ​ដែល​មាន​គេហទំព័រ</span><span style=\"font-size:8.0pt\"><span style=\"background-color:white\"><a href=\"https://driverlicense.%20mpwt.gov.kh\" style=\"color:blue; text-decoration:underline\">https://driverlicense.<span style=\"color:red\"><ins><u> </u></ins></span>mpwt.gov.kh</a></span></span><span style=\"font-size:8.0pt\">.</span>&nbsp; </span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">អតិថិជន​ទាំង​ឡាយ​ណា​ដែលត្រូវ​ការ​ដាក់​ពាក្យ​យក​ប័ណ្ណបើកបរ ប្រ​ភេទ</span><span style=\"font-size:8.0pt\"> C​ ឬ​ប្រភេទ​ខ្ពស់​ជាង​នេះ ត្រូវ​តែទៅរៀន​​មេរៀន​នៅ​សាលារៀន​មួយ​ដែល​មាន​ការ​អនុញ្ញាត​ជា​ផ្លូវការ។ លោក​អ្នក​អាច​ទាក់​ទង​មណ្ឌល​ប័ណ្ណធ្វើបើកបរដើម្បី​ព័ត៌មាន​បន្ថែម:</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"color:green\">សំ</span></span><span style=\"font-size:8.0pt\">រាប់​ប្រជាពលរដ្ឋ​ខ្មែរ ឯកសារ​ដែលគេ​តម្រូវ​ឲ្យ​មាន​សំរាប់​ការ​ប្រឡង​ ការ​ធ្វើ​ថ្មី និង​ការ​បន្ត​សុពល​ភាព​ប័ណ្ណ​បើកបរគឺ៖</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">អត្តសញ្ញាណ្ណប័ណ្ណខ្មែរ ​ភ្ជាប់​រូប​ថត ទំហំ ៤</span><span style=\"font-size:8.0pt\"> x ៦ សន្ទីរម៉ែត្រ</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">លិខិត​បញ្ជាក់​សុខភាព មក​ពី​មណ្ឌល​ប័ណ្ណ​បើកបរ។ </span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">ប័ណ្ណបើកបរ​ផុត​សុពលភាព (សំរាប់​ការ​បន្ត​លើកទី២ និង​លើក​ទី៣)</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">&nbsp;ប័ណ្ណ​បើកបរ​ប្រភេទ គ ឃ និង​ ង​ ត្រូវ​បញ្ជាក់​ដោយ​សាលា​បើកបរ។</span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">ចំពោះអតិថិជនបរទេស ​ដែល​ចង់​បាន​ប័ណ្ណ​បើកបរ​ខ្មែរ ត្រូវ​តែ​មាន​ឯក​សារ​ដូច​ខាង​ក្រោម៖</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">ប័ណ្ណ​បើកបរ​សញ្ជាតិ​លោក​អ្នក​ផ្ទាល់។ </span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">លិខិត​ឆ្លង​ដែន </span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">ទិដ្ឋាការដែល​មាន​សុពល​ភាព</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">ប័ណ្ណ​បញ្ជាក់​ទី​លំនៅប្រទេសកម្ពុជា</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">រូបថត ៤​គុណ៦​ដែលមាន​ផ្ទៃ​ព័ណ៌ស​ចំនួន​៣​សន្លឹក</span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\">កោសល្យវិច្ច័យវេជ្ជសាស្ត្រចេញ​ដោយ​ក្រសួងសុខាភិបាល </span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:8.0pt\">ក្រោយ​ពី​ការ​ប្រឡង​បើកបររួចអតិថិជន​ត្រូវ​រង់​ចាំ​​ទទួល​ ​ប័ណ្ណ​បើកបរ​ថ្មីក្នុង​រយៈ​ពេលយ៉ាង​ហោច​ណាស់​ ​​​​២០ ឬ ​៣០​នាទី​ ក្រោយ​ពី​ការ​ប្រឡង​បើកបរ។</span></p>\r\n ', '30.00'),
(12, 'Recommend Local Driving School to Foreigner', '20190723_2427.png', '<div style=\"border-bottom:solid #e1e1e1 1.0pt; padding:0in 0in 15.0pt 0in\">\r\n<h2 style=\"margin-left:0in; margin-right:0in\"><span style=\"background-color:white\"><span style=\"font-size:13pt\"><span style=\"background-color:white\"><span style=\"font-family:Cambria,serif\"><span style=\"color:#4f81bd\"><strong><span style=\"font-size:10.0pt\"><span style=\"color:#2d2d2d\">Introducing Good Driving School for the Foreigner</span></span></strong></span></span></span></span></span></h2>\r\n</div>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">4.</span></span></span></strong><strong> </strong><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Introducing Good Driving School for foreigners</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">The foreigners who are living in Cambodia need to hold </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">a Cambodian Driver&rsquo;s License or International Driver&rsquo;s License or else </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">they are not legally authorized to drive any car in Cambodia.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Lyna-CarRental.Com would also like to help </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">both </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">local and foreign car owners who are in need to get trained on driving at the best driving school and get a driver&rsquo;s license for their legal drive in Cambodia.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">For this the </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">customers</span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> are required to come to our office first and follow our instructions by bringing along with them </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:DaunPenh\">​</span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">the following:</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:26.7pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">1. The passport and valid entry visa.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:26.7pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">2. Six photos with the same size of passport photo</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:26.7pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3. The total fee including: </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42.8pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3.1. Driving Lessons &amp; Traffic law</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42.8pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3.2. Driving Practice</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42.8pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3.3. Driving Test</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42.8pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3.4. Process of getting </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">a </span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Driver&#39;s License </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Duration of Training: 10 hours</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Daily Training Service</span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:11.2pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">1. For Manual Transmission Vehicle: 30 minutes per day<span style=\"color:red\"><ins> </ins></span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:9.1pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">2. For Automatic Transmission Vehicle: 1hour per day</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Training Days: Monday through Friday</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">When will the Cambodian Driver&#39;s License be obtained?</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">It will take 10 or 20 days to get it after completion of the driving test. </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Should you require any further information regarding the above-mentioned section, please do not hesitate to contact us. We are always at your disposal.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n ', 'ជួយស្វែងរកសាលាបើកបររថយន្តដល់ជនបរទេស', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៤. </span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ការ​ណែនាំ​អំពី​សាលា​បើកបរ​រថយន្តល្អ​ៗដល់​ជន​បរទេស</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">​ជន​បរទេស​ទាំង​ឡាយ​ដែល​រស់​នៅ​ក្នុង​ប្រទេស​កម្ពុជា ត្រូវតែមាន​ប័ណ្ណបើកបរ​ខ្មែរ ឬ ប័ណ្ណបើកបរអន្តជាតិ បើពុំដូច្នោះទេ ពួកគេពុំមាន​សិទ្ធិ​បើកបរ​រថយន្ត​នៅ​កម្ពុជា​បានតាមផ្លូវច្បាប់​។ ​</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លីណា-ជួលរថយន្តទេសចរណ៍​ ​មាន​បំណង​ចង់​ជួយដល់​ម្ចាស់​រថយន្តខ្មែរ និង​បរទេស​ ដើម្បី​ពួក​បាន​ចូល​រៀន​​នៅ​សាលា​បើកបរណា​ដែល​រថយន្ត​ល្អ បំផុត ក្នុង​គោលបំណងបាន​ទទួល​ប័ណ្ណបើកបរ​​ ​ដើម្បី​ឲ្យ​ពួក​គេ​មាន​សិទ្ធិ​ពិត​ប្រាកដ​ក្នុង​ការ​បើកបររថយន្តនៅកម្ពុជា។&nbsp; ​</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ក្នុង​ករណី​នេះ អស់លោក ​ត្រូវ​តែ​​អញ្ជើញមក​កាន់​ការិយាល័យ​យើង​ខ្ញុំ ហើយ​អនុវត្ត​តាម​ការ​ណែនាំ របស់​យើង​ខ្ញុំ​ដោយ​នាំ​មក​ជាមួយ​នូវឯកសារ​មួយ​ចំនួន​ដូច​ខាង​ក្រោម៖</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">១. លិខិត​ឆ្លងដែន ដែល​ទិដ្ឋាការនៅ​មាន​សុពលភាព</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">២.​ រូប​ថត​ដែល​មាន​ទំហំ​ដូច​រូបថត​ក្នុង​លិខិត​ឆ្លង​ដែន​ចំនួន​៦​សន្លឹក</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៣. បង់​ប្រាក់​សំរាប់​ចំណាយ​លើ៖​</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៣.១. មេរៀន​ទ្រឹស្តី​បើក​បរ​ និងរៀន​ច្បាប់​ចរាចរណ៍</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៣.២. ការ​ហាត់​បើកបរ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៣.៣.​ការ​ប្រឡង​បើកបរ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៣.៤. ថ្លៃរត់​ការ​​យកប័ណ្ណបើកបរ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">រយៈពេល​នៃ​ការ​ហ្វឹកហាត់៖ ១០​ម៉ោង</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">សេវា​ហ្វឹកហាត់​ប្រចាំ​ថ្ងៃ</span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">៖ </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">១. រថយន្ត​ប្រើលេខ​ដៃ៖ ៣០​នាទីក្នុង​១​ថ្ងៃ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">២. ​រថយន្ត​ប្រ​លេខ​អូតូ៖ ១ម៉ោង​ ក្នុង​១​ថ្ងៃ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ថ្ងៃ​ហ្វឹកហាត់៖ ពី​ថ្ងៃ​ចន្ទ ដល់​ថ្ងៃ សុក្រ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">​តើ​ពេល​ណា​ទើប​គេ​អាច​ទទួល​បាន​ប័ណ្ណបើកបរខ្មែរ?</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">គេ​អាច​ទទួល​បាន​ប័ណ្ណ​បើកបរ​នេះ​ក្នុង​រយៈពេល​ពី១០ ទៅ២០​ថ្ងៃ បន្ទាប់ពី​ប្រឡង​បើកបរ​រួច។ </span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ប្រសិន​បើ​ត្រូវ​ការ​ព័ត៌មាន​បន្ថែម​ទាក់​នឹង​ចំណុច​ទាំង​ឡាយ​ដូច​ខាងលើ សូម​មេត្តា​ទាក់​ទង​មក​កាន់​យើង​ខ្ញុំ​ចុះ យើង​ខ្ញុំ​នឹង​រង់​ចាំ​ទទួល​លោក​អ្នក​ជានិច្ច។​</span></span></p>\r\n ', '60.00'),
(13, 'Getting Cambodian Visa Extension', '20190723_9940.png', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\"><span style=\"color:red\">Cambodia Visa</span></span></span><br />\r\n<br />\r\n<span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\"><span style=\"color:#555555\">For most visitors to the Kingdom, visa are obtainable upon arrival at both Phnom Penh and Siem Reap International Airports in&nbsp;<a href=\"https://www.tourismcambodia.com/travelguides/provinces/phnom-penh.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\" target=\"_blank\"><span style=\"color:#3498db\">Phnom Penh</span></a>&nbsp;and&nbsp;<a href=\"https://www.tourismcambodia.com/travelguides/provinces/siem-reap.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\" target=\"_blank\"><span style=\"color:#3498db\">Siem Reap</span></a>. At land crossing from Thailand, Vietnam and Laos, visa&nbsp;can be obtained at&nbsp;International Check Point&nbsp;border.&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\"><span style=\"color:#555555\">Tourists also can get their visas prior to their arrival through a&nbsp;<u><a href=\"https://www.tourismcambodia.com/tripplanner/essential-information/embassy-abroad.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\"><span style=\"color:#3498db\">Cambodian Embassy or Consulate overseas</span></a></u></span></span></span>. Tourists also can&nbsp;get&nbsp;eVisa through online&nbsp;<a href=\"https://www.evisa.gov.kh/\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\" target=\"_blank\"><span style=\"color:#3498db\">E-Visa</span></a>&nbsp;before travelling.<br />\r\n<br />\r\n<strong><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\">Some nationalities are required to get visa in advance at&nbsp;<u><a href=\"https://www.tourismcambodia.com/tripplanner/essential-information/embassy-abroad.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\"><span style=\"color:#3498db\">Royal Embassy of Kingdom of Cambodia</span></a></u></span>&nbsp;in their country</strong>: Afghanistan, Algeria, Arab Saudi, Bangladesh, Iran, Iraq, Pakistan, Sri Lanka, Sudan, Nigeria.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:start\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\"><span style=\"color:#555555\">A passport and visa are required. Tourists and business travelers may purchase a Cambodian visa valid for one month at the airports in&nbsp;<a href=\"https://www.tourismcambodia.com/travelguides/provinces/phnom-penh.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\" target=\"_blank\"><span style=\"color:#3498db\">Phnom Penh</span></a>&nbsp;and&nbsp;<a href=\"https://www.tourismcambodia.com/travelguides/provinces/siem-reap.htm\" style=\"box-sizing:border-box; border-radius:0px; outline:0px !important; color:blue; text-decoration:underline\" target=\"_blank\"><span style=\"color:#3498db\">Siem Reap</span></a>&nbsp;and borders. Both require a passport valid for at least six (6) months from the expiry date, 01 recent passport-sized photo. A departure tax is charged on all domestic and international flights.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">You will need a valid passport and a&nbsp;<strong>Cambodian visa</strong>&nbsp;to enter<strong>Cambodia</strong>. Tourist and business&nbsp;<strong>visas</strong>&nbsp;are valid for one month from the date of entry into&nbsp;<strong>Cambodia</strong>. ... Tourists and business travelers may also obtain a&nbsp;<strong>Cambodian visa</strong>&nbsp;at the airports in Phnom Penh, Siem Reap, and at all major border crossings.</span></span></span><span style=\"font-size:9.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#777777\">Jul 3, 2019</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">PASSPORT VALIDITY:&nbsp;</span></span></span></strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#777777\">Six months.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#222222\">Email:&nbsp;</span></span></span></strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#777777\">ACSPhnompenh@state.gov</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Cambria,serif\"><span style=\"color:#4f81bd\"><strong><u><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#660099\"><a href=\"https://travel.state.gov/content/travel/en/international-travel/International-Travel-Country-Information-Pages/Cambodia.html\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#660099\">Cambodia International Travel Information - Travel.gov</span></a></span></span></u></strong></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><cite><u><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#006621\"><a href=\"https://travel.state.gov/content/travel/en/international-travel/International-Travel-Country-Information-Pages/Cambodia.html\" style=\"color:blue; text-decoration:underline\"><span style=\"color:#006621\">https://travel.state.gov/content/travel/en/international-travel/...Travel.../Cambodia.html</span></a></span></span></span></u></cite></span></span></span></p>\r\n ', 'ជួររត់ការបន្តទិដ្ឋាការសំរាប់ជនបរទេស', '<p>ទិដ្ឋាការកម្ពុជា</p>\r\n\r\n<p>សម្រាប់អ្នកទស្សនាភាគច្រើនមកកាន់ព្រះរាជាណាចក្រកម្ពុជាទិដ្ឋាការអាចទទួលបាននៅពេលមកដល់ព្រលានយន្តហោះទាំងពីររាជធានីភ្នំពេញនិងសៀមរាបនៅរាជធានីភ្នំពេញនិងខេត្តសៀមរាប។ នៅពេលឆ្លងកាត់ពីប្រទេសថៃវៀតណាមនិងឡាវទិដ្ឋាការអាចទទួលបាននៅតាមព្រំដែនអន្ដរជាតិ។</p>\r\n\r\n<p>អ្នកទេសចរក៏អាចទទួលបានទិដ្ឋាការរបស់ពួកគេមុនពេលពួកគេមកដល់តាមរយៈស្ថានទូតកម្ពុជាឬស្ថានកុងស្យុងនៅក្រៅប្រទេស។ អ្នកទេសចរក៏អាចទទួលបាន eVisa តាមរយៈអេឡិចត្រូនិចអនឡាញមុនពេលធ្វើដំណើរ។</p>\r\n\r\n<p>ប្រជាពលរដ្ឋមួយចំនួនត្រូវបានតម្រូវឱ្យទទួលបានទិដ្ឋាការជាមុននៅស្ថានទូតនៃព្រះរាជាណាចក្រកម្ពុជានៅក្នុងប្រទេសរបស់ខ្លួនគឺអាហ្គានីស្ថានអាល់ហ្សេរីអារ៉ាប់អារ៉ាប៊ីសាឡង់អ៊ីរ៉ង់អ៊ីរ៉ាក់ប៉ាគីស្ថានស្រីលង្កាស៊ូដង់នីហ្សេរីយ៉ា។</p>\r\n\r\n<p>លិខិតឆ្លងដែននិងទិដ្ឋាការត្រូវបានទាមទារ។ អ្នកទេសចរនិងអ្នកធ្វើជំនួញអាចទិញទិដ្ឋាការកម្ពុជាដែលមានសុពលភាពរយៈពេលមួយខែនៅព្រលានយន្តហោះនៅភ្នំពេញនិងសៀមរាបនិងព្រំប្រទល់។ អ្នកទាំងពីរតម្រូវឱ្យមានលិខិតឆ្លងដែនដែលមានសុពលភាពយ៉ាងហោចណាស់ប្រាំមួយ (6) ខែគិតចាប់ពីថ្ងៃផុតកំណត់។ ពន្ធចេញដំណើរត្រូវបានគិតទៅលើជើងហោះហើរក្នុងស្រុកនិងអន្តរជាតិទាំងអស់។</p>\r\n\r\n<p>អ្នកនឹងត្រូវការលិខិតឆ្លងដែនត្រឹមត្រូវនិងទិដ្ឋាការកម្ពុជាដើម្បីចូលប្រទេសកម្ពុជា។ ទិដ្ឋាការទេសចរណ៍និងជំនួញមានសុពលភាពក្នុងរយៈពេល 1 ខែគិតចាប់ពីថ្ងៃចូលប្រទេសកម្ពុជា។ ... អ្នកទេសចរនិងអ្នកធ្វើជំនួញក៏អាចទទួលបានទិដ្ឋាការកម្ពុជានៅព្រលានយន្តហោះនៅភ្នំពេញសៀមរាបនិងនៅតាមច្រកព្រំដែនសំខាន់ៗទាំងអស់។ ថ្ងៃទី 3 ខែមីនាឆ្នាំ 2019</p>\r\n\r\n<p>សុពលភាព PASSPORT: ប្រាំមួយខែ។</p>\r\n\r\n<p>អ៊ីមែល: ACSPhnompenh@state.gov</p>\r\n\r\n<p>ព័ត៌មានទេសចរណ៍អន្តរជាតិកម្ពុជា - Travel.gov</p>\r\n\r\n<p>https://travel.state.gov/content/travel/en/international-travel/...Travel.../Cambodia.html</p>\r\n ', '30.00'),
(14, 'Roadside Car Breakdown Assistance', '20190724_6600.png', '<p><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/1.%20Long%20Distance%20Assistance.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/1.%20Long%20Distance%20Assistance.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/2.%20Long%20Distance%20Assistance.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/3.%20Long%20Distance%20Assistance.jpg\" style=\"width:100%\" /></p>\r\n\r\n<h2>Car Breakdown Assistance</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear Valuable customers and friends,</p>\r\n\r\n<p>Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</p>\r\n\r\n<p>We are offerring the service of car breakdown assisnce for all types of vehicles which is broken down on the roads or at home. This service is applicable only in Phnom Penh at the reasonable price. Our service is very fast.&nbsp;</p>\r\n\r\n<p>Please call us any times during working hours and days.</p>\r\n\r\n<p>Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</p>\r\n\r\n<p><strong>WORKING DAYS</strong><br />\r\nMonday to Saturday -&nbsp;Sunday&nbsp;is holiday!</p>\r\n\r\n<p><strong>WORKING HOURS</strong><br />\r\nMorning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</p>\r\n\r\n<p><strong>PUBLIC HOLIDAYS</strong>&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</p>\r\n\r\n<p>1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p><strong>OFFICE ADDRESS</strong></p>\r\n\r\n<p>#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</p>\r\n\r\n<p>E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</p>\r\n\r\n<p><strong>Have A Wonderful Stay In Cambodia!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Service Fee($)</h2>\r\n ', 'សេវាជួយសង្រ្គោះរថយន្តខូចតាមផ្លូវ', '<p>យើងកំពុងផ្តល់សេវាកម្មជួសជុលរថយន្ដគ្រប់ប្រភេទដែលត្រូវបានបែកខ្ញែកនៅលើផ្លូវឬនៅផ្ទះ។ សេវាកម្មនេះអាចអនុវត្តបានតែនៅក្នុងទីក្រុងភ្នំពេញក្នុងតម្លៃសមរម្យ។ សេវាកម្មរបស់យើងគឺលឿនណាស់។</p>\r\n\r\n<p>សូមទូរស័ព្ទមកយើងរាល់ពេលម៉ោងនិងម៉ោងធ្វើការ។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>ថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!</p>\r\n\r\n<p>ម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល</p>\r\n\r\n<p>ថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>អាសយដ្ឋានការិយាល័យ</p>\r\n\r\n<p>លេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា</p>\r\n\r\n<p>អ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)</p>\r\n\r\n<p>មានការរស់នៅដ៏អស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!</p>\r\n\r\n<p>ថ្លៃសេវាកម្ម ($)</p>\r\n ', '35.00'),
(15, 'Vehicle Annual Road Tax', '20190724_9426.png', '<p><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/1.%20Annual%20Road%20Tax.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/1.%20Annual%20Road%20Tax.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/2.%20Annual%20Road%20Tax.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/3.%20Annual%20Road%20Tax.jpg\" style=\"width:100%\" /></p>\r\n\r\n<h2>Buying Annual Road Tax Service</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear Valuable customers and friends,</p>\r\n\r\n<p>Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</p>\r\n\r\n<p>We are offerring the service of buying the annual road tax&nbsp;for all types of vehicles. This service is applicable everywhere who are residing in the Kingdom of Cambodia at the reasonable price. Our service is very fast.&nbsp;</p>\r\n\r\n<p>Please call us any times during working hours and days.</p>\r\n\r\n<p>Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</p>\r\n\r\n<p><strong>Buying Annual Road Tax Service</strong></p>\r\n\r\n<p><strong>Special Notice:&nbsp;</strong><em>For the Road Tax collection of the year 2012 is now starting since the 15th of February and the deadline will be the 15th of June 2012! Please make yourself alert! Do not wait till the penalty which would cost you money and times!</em></p>\r\n\r\n<p>The Department of Customs and Tax is always doing the Annual Road Tax collection to all type of the vehicles between June and July every year.</p>\r\n\r\n<p>We are offering this type of business at the very reasonable, and fast services. We are mainly focusing on the foreign private companies, embassies, NGO, OI and UN agencies for whom are staying, working and/or living in Phnom Penh and own the vehicle(s).</p>\r\n\r\n<p>For your further information about the processing and the documents required, please kindly go through the below-mentioned details:<br />\r\n1. Last year receipt*, and<br />\r\n2. Copy of your Vehicle Registration ID Card,</p>\r\n\r\n<p>In the case that you lost the last year original receipt in the item No. 1, you will be requested to pay double as a penalty. Please always keep all your vehicle documents in the safe place and/or for easy retrieval.</p>\r\n\r\n<p>If you have a newly bought vehicle and have never had paid once for the Road Tax, a New ID Card of the newly bought vehicle in original is required for endorsement.</p>\r\n\r\n<p>Regarding to the price, it depends on your last year sticker plus the service charge! In 2010 onward, the annual road tax for all type of the vehicles will be doubly increased.</p>\r\n\r\n<p>Should you require any further information and/or any either personal or official assistance, please feel free to contact us. We are always at your disposal.</p>\r\n\r\n<p><strong>WORKING DAYS</strong><br />\r\nMonday to Saturday -&nbsp;Sunday&nbsp;is holiday!</p>\r\n\r\n<p><strong>WORKING HOURS</strong><br />\r\nMorning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</p>\r\n\r\n<p><strong>PUBLIC HOLIDAYS</strong>&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</p>\r\n\r\n<p>1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p><strong>OFFICE ADDRESS</strong></p>\r\n\r\n<p>#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</p>\r\n\r\n<p>E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</p>\r\n\r\n<p><strong>Have A Wonderful Stay In Cambodia!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Service Fee($)</h2>\r\n ', 'សេវាទិញពន្ធផ្លូវសំរាប់រថយន្ត', '<p>ដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់សេវានៃការទិញពន្ធផ្លូវប្រចាំឆ្នាំសម្រាប់រថយន្តគ្រប់ប្រភេទ។ សេវាកម្មនេះអាចប្រើបាននៅគ្រប់ទីកន្លែងដែលកំពុងរស់នៅក្នុងព្រះរាជាណាចក្រកម្ពុជាក្នុងតម្លៃសមរម្យ។ សេវាកម្មរបស់យើងគឺលឿនណាស់។</p>\r\n\r\n<p>សូមទូរស័ព្ទមកយើងរាល់ពេលម៉ោងនិងម៉ោងធ្វើការ។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>ការទិញសេវាកម្មពន្ធប្រចាំឆ្នាំ</p>\r\n\r\n<p>សេចក្តីជូនដំណឹងពិសេស: សម្រាប់ការប្រមូលពន្ធលើផ្លូវថ្នល់ប្រចាំឆ្នាំ 2012 ឥឡូវនេះត្រូវចាប់ផ្តើមចាប់ពីថ្ងៃទី 15 ខែកុម្ភៈហើយថ្ងៃផុតកំណត់នឹងត្រូវថ្ងៃទី 15 ខែមិថុនាឆ្នាំ 2012! សូមធ្វើឱ្យខ្លួនអ្នកប្រុងប្រយ័ត្ន! កុំរង់ចាំរហូតទាល់តែពិន័យដែលនឹងចំណាយអស់លុយនិងពេលវេលា!</p>\r\n\r\n<p>នាយកដ្ឋានពន្ធដារនិងពន្ធដារតែងតែធ្វើការប្រមូលពន្ធលើរថយន្តប្រចាំឆ្នាំទៅគ្រប់ប្រភេទនៃយានយន្តនៅចន្លោះខែមិថុនានិងខែកក្កដារៀងរាល់ឆ្នាំ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់ជូននូវជំនួញបែបនេះនៅតាមតំរូវការនិងសេវាកម្មរហ័ស។ យើងផ្តោតសំខាន់ទៅលើក្រុមហ៊ុនឯកជនស្ថានទូតអង្គការក្រៅរដ្ឋាភិបាលអង្គការសហប្រជាជាតិនិងទីភ្នាក់ងារអ។ ស។ បដែលកំពុងស្នាក់នៅធ្វើការនិង / ឬរស់នៅក្នុងរាជធានីភ្នំពេញហើយមានរថយន្តផ្ទាល់ខ្លួន។</p>\r\n\r\n<p>សំរាប់ពត៌មានបន្ថែមរបស់អ្នកអំពីដំណើរការនិងឯកសារដែលត្រូវការសូមមេត្តាទៅតាមពត៌មានលំអិតដូចខាងក្រោម:<br />\r\n1. បង្កាន់ដៃឆ្នាំមុននិង *<br />\r\n2. ថតចំលងកាតអត្តសញ្ញាណប័ណ្ណយានយន្តរបស់អ្នក។</p>\r\n\r\n<p>ក្នុងករណីដែលអ្នកបានទទួលវិក័យប័ត្រដើមកាលពីឆ្នាំមុននៅក្នុងធាតុលេខ 1 អ្នកនឹងត្រូវបានស្នើសុំឱ្យបង់ពីរដងជាការពិន័យ។ សូមរក្សាឯកសារយានយន្តរបស់អ្នកទាំងអស់នៅកន្លែងដែលមានសុវត្តិភាពនិង / ឬងាយស្រួលក្នុងការទៅយក។</p>\r\n\r\n<p>ប្រសិនបើអ្នកមានរថយន្តដែលទើបទិញថ្មីហើយមិនដែលបានបង់ប្រាក់ម្តងសម្រាប់ពន្ធផ្លូវទេនោះកាតថ្មីនៃយានយន្តដែលទើបទិញថ្មីត្រូវបានទាមទារសម្រាប់ការយល់ព្រម។</p>\r\n\r\n<p>ទាក់ទងទៅនឹងតម្លៃវាអាស្រ័យទៅលើផ្ទាំងក្រដាសឆ្នាំចុងក្រោយរបស់អ្នកបូកនឹងថ្លៃសេវាកម្ម! ក្នុងឆ្នាំ 2010 ពន្ធផ្លូវប្រចាំឆ្នាំសម្រាប់ប្រភេទរថយន្តទាំងអស់នឹងកើនឡើងទ្វេដង។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការព័ត៌មានបន្ថែមនិង / ឬជំនួយផ្ទាល់ឬជំនួយណាមួយសូមកុំទាក់ទងមកយើងខ្ញុំ។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>ថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!</p>\r\n\r\n<p>ម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល</p>\r\n\r\n<p>ថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>អាសយដ្ឋានការិយាល័យ</p>\r\n\r\n<p>លេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា</p>\r\n\r\n<p>អ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)</p>\r\n\r\n<p>មានការរស់នៅដ៏អស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!</p>\r\n\r\n<p>ថ្លៃសេវាកម្ម ($)</p>\r\n ', '10');
INSERT INTO `tbl_our_service` (`se_id`, `se_title`, `se_image`, `se_detail`, `se_title_kh`, `se_detail_kh`, `se_price`) VALUES
(16, 'Vehicle Motor Technical Inspection (MOT)', '20190724_5827.png', '<p><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/1.%20Motor%20Vehicle%20Technical%20Inspection.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/1.%20Motor%20Vehicle%20Technical%20Inspection.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image 2\" src=\"https://lyna-carrental.com/public/images/2.%20Motor%20Vehicle%20Technical%20Inspection.jpg\" style=\"width:100%\" /><img alt=\"Portfolio Image\" src=\"https://lyna-carrental.com/public/images/3.%20Motor%20Vehicle%20Technical%20Inspection.jpg\" style=\"width:100%\" /></p>\r\n\r\n<h2>Motor Vehicle Technical Inspection</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dear Valuable customers and friends,</p>\r\n\r\n<p>Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</p>\r\n\r\n<p>We are offerring the service of doing the bi-yearly&nbsp;<strong>Motor Vehicle Technical Inspection</strong>&nbsp;for all types of vehicles. This service is applicable only in Phnom Penh at the reasonable price. Our service is very fast.&nbsp;</p>\r\n\r\n<p>Please call us any times during working hours and days.</p>\r\n\r\n<p>Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</p>\r\n\r\n<p><strong>Bi-yearly Motor Vehicle Technical Inspection</strong></p>\r\n\r\n<p>Lyna-Garage.Com is not only having long experience over many years to legally repairing, servicing and/or rebuilding all type of vehicles industry in the Kingdom of Cambodia, but also we are accredited by the Ministry of Public Work and Transport to providing us the permit to do the general vehicle inspection to all local and foreign vehicle users in all over the country.</p>\r\n\r\n<p>It should also be viewed as vehicle health check regularly to provide assurance that your vehicle is safe, roadworthy, for you and your families safety. As part of the&nbsp; MOT testing process, we assess and test a wide variety of components in your car.</p>\r\n\r\n<p>Our standards are monitored and tested ensuring that your car is safe and roadworthy to drive. Not only are these essential for the proper and safe functioning of your vehicle, poorly maintained components and tires can have a huge impact on vehicle efficiency, performance and causes unnecessary environmental damage. Our test certificates information are on display in the public area of our garage as required by law and for your re-assurance.</p>\r\n\r\n<p>The MOT also requires the assessment and testing of your vehicles that is more vital components, such as:<br />\r\n■ Braking System,<br />\r\n■ Exhaust Emission,<br />\r\n■ Exhaust System,<br />\r\n■ Lights System,<br />\r\n■ Seat Belts System,<br />\r\n■ Steering and/or Power Steering,<br />\r\n■ Suspension System, and<br />\r\n■ Tire Conditions and Tread Depth.</p>\r\n\r\n<p>The MOT should always be considered as an additional test of road worthiness in conjunction with a regular service. It is required by law. The vehicles without MOT&rsquo;s are not insured whilst driven unless they have a special exemption. The MOT testing system has recently been changed and is now computerized with each vehicles details maintained&nbsp;on a central database and a new style MOT certificate.</p>\r\n\r\n<p>The documents required and the requirements are:</p>\r\n\r\n<p>1. Car ID Card</p>\r\n\r\n<p>2. Passport</p>\r\n\r\n<p>3. Two pieces of passport photo size</p>\r\n\r\n<p>4. Bi-yearly Certificate of Motor Vehicle&nbsp;Technical Inspection from last year</p>\r\n\r\n<p>6. We require a car for half day preferably in the morning for taking it into the Ministry of Public Work and Transport for taking the Chassis and Engine Numbers</p>\r\n\r\n<p>7. Price depends on the year, model, and horse power of the vehicle</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We look forward with pleasure to have a great chance to fruitfully serving you in the near future.</p>\r\n\r\n<p>If you would like to arrange to have your vehicle for a MOT General Checkup by Lyna-Garage.Com. Please feel free to contact us at any time most convenience to you. If your vehicle felt the MOT, we have the facilities at our garage to repair your vehicle and re-test when should this be required.</p>\r\n\r\n<p><strong>WORKING DAYS</strong><br />\r\nMonday to Saturday -&nbsp;Sunday&nbsp;is holiday!</p>\r\n\r\n<p><strong>WORKING HOURS</strong><br />\r\nMorning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</p>\r\n\r\n<p><strong>PUBLIC HOLIDAYS</strong>&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</p>\r\n\r\n<p>1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p><strong>OFFICE ADDRESS</strong></p>\r\n\r\n<p>#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</p>\r\n\r\n<p>E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</p>\r\n\r\n<p><strong>Have A Wonderful Stay In Cambodia!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Service Fee($)</h2>\r\n ', 'សេវាឆៀករថយន្តរប្រចាំ២ឆ្នាំម្តង', '<p>ត្រួតពិនិត្យយានយន្តបច្ចេកទេសយានយន្ត</p>\r\n\r\n<p>ជូនចំពោះអតិថិជននិងមិត្តភក្តិដែលមានតម្លៃ។</p>\r\n\r\n<p>ដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់សេវាធ្វើអធិការកិច្ចបច្ចេកទេសរថយន្តពីរដងក្នុងមួយឆ្នាំសម្រាប់រថយន្តគ្រប់ប្រភេទ។ សេវាកម្មនេះអាចអនុវត្តបានតែនៅក្នុងទីក្រុងភ្នំពេញក្នុងតម្លៃសមរម្យ។ សេវាកម្មរបស់យើងគឺលឿនណាស់។</p>\r\n\r\n<p>សូមទូរស័ព្ទមកយើងរាល់ពេលម៉ោងនិងម៉ោងធ្វើការ។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>អធិការកិច្ចបច្ចេកទេសយានយន្តប្រចាំឆមាស</p>\r\n\r\n<p>ក្រុមហ៊ុន Lyna-Garage.Com មិនត្រឹមតែមានបទពិសោធន៏យូរអង្វែងក្នុងរយៈពេលជាច្រើនឆ្នាំដើម្បីជួសជុលជួសជុលនិង / ឬស្ថាបនាឡើងវិញនូវប្រភេទយានយន្តគ្រប់ប្រភេទនៅក្នុងព្រះរាជាណាចក្រកម្ពុជានោះទេប៉ុន្តែយើងក៏ត្រូវបានទទួលស្គាល់ដោយក្រសួងសាធារណការនិងដឹកជញ្ជូនផងដែរ។ លិខិតអនុញ្ញាតដើម្បីធ្វើការត្រួតពិនិត្យរថយន្តទូទៅដល់អ្នកប្រើយានយន្តក្នុងនិងក្រៅស្រុកទាំងអស់នៅទូទាំងប្រទេស។</p>\r\n\r\n<p>វាក៏គួរត្រូវបានគេមើលឃើញថាជាការពិនិត្យសុខភាពរថយន្តជាប្រចាំដើម្បីផ្តល់ការធានាថាយានយន្តរបស់អ្នកមានសុវត្ថិភាពសុវត្ថិភាពផ្លូវចិត្តសម្រាប់អ្នកនិងគ្រួសាររបស់អ្នក។ ជាផ្នែកមួយនៃដំណើរការសាកល្បង MOT យើងវាយតំលៃនិងសាកល្បងសមាសធាតុជាច្រើននៅក្នុងរថយន្តរបស់អ្នក។</p>\r\n\r\n<p>ស្តង់ដាររបស់យើងត្រូវបានត្រួតពិនិត្យនិងធ្វើតេស្តដោយធានាថារថយន្តរបស់អ្នកមានសុវត្ថិភាពនិងមានសុវត្ថិភាពក្នុងការបើកបរ។ មិនត្រឹមតែមានសារៈសំខាន់ទាំងនេះសម្រាប់ការដំណើរការត្រឹមត្រូវនិងសុវត្ថិភាពរបស់រថយន្តរបស់អ្នក, សមាសធាតុថែទាំមិនបានល្អនិងសំបកកង់អាចមានឥទ្ធិពលយ៉ាងខ្លាំងទៅលើប្រសិទ្ធភាពនៃរថយន្តនិងការបំផ្លិចបំផ្លាញបរិស្ថានដែលមិនចាំបាច់។ ព័ត៌មានវិញ្ញាបនប័ត្រអំពីការធ្វើតេស្តរបស់យើងត្រូវបានដាក់បង្ហាញនៅកន្លែងសាធារណៈនៃយានដ្ឋានរបស់យើងដូចដែលបានតម្រូវដោយច្បាប់និងសម្រាប់ការធានាឡើងវិញរបស់អ្នក។</p>\r\n\r\n<p>យន្តការក៏តម្រូវឱ្យមានការវាយតម្លៃនិងការធ្វើតេស្តលើយានយន្តរបស់អ្នកដែលមានសារសំខាន់ចាំបាច់ដូចជា:<br />\r\n■ប្រព័ន្ធហ្វ្រាំង,<br />\r\n■ការបំភាយឧស្ម័ន,<br />\r\n■ប្រព័ន្ធហួត,<br />\r\n■ប្រព័ន្ធភ្លើង,<br />\r\n■ប្រព័ន្ធខ្សែក្រវ៉ាត់កៅអី,<br />\r\n■ចង្កូតនិង / ឬចង្កូតថាមពល,<br />\r\n■ប្រព័ន្ធផ្អាកនិង<br />\r\nល័ក្ខខ័ណ្ឌនៃសំបកកង់និងជម្រៅ។</p>\r\n\r\n<p>MOT គួរតែតែងតែត្រូវបានគេចាត់ទុកថាជាការធ្វើតេស្តបន្ថែមទៀតនៃភាពសក្តានុពលផ្លូវថ្នល់ដោយភ្ជាប់ជាមួយសេវាកម្មធម្មតា។ វាត្រូវបានទាមទារដោយច្បាប់។ យានយន្តដែលគ្មានយានយន្តមិនត្រូវបានធានាទេលើកលែងតែពួកគេមានការលើកលែងពិសេស។ ប្រព័ន្ធធ្វើតេស្តម៉ូទ័រត្រូវបានផ្លាស់ប្តូរថ្មីៗនេះហើយឥឡូវនេះត្រូវបានគេបញ្ចូលកុំព្យូទ័រជាមួយព័ត៌មានលំអិតដែលត្រូវបានរក្សានៅមូលដ្ឋានទិន្នន័យកណ្តាលនិងវិញ្ញាបនបត្រ MOT ថ្មី។</p>\r\n\r\n<p>ឯកសារដែលត្រូវការនិងតម្រូវការគឺ:</p>\r\n\r\n<p>1. កាតអត្តសញ្ញាណប័ណ្ណ<br />\r\n2. លិខិតឆ្លងដែន<br />\r\n3. ទំហំនៃលិខិតឆ្លងដែនពីរសន្លឹក<br />\r\n4- វិញ្ញាបនបត្របោសសម្អាតយានជំនិះពីរដងក្នុងមួយឆ្នាំពីឆ្នាំមុន<br />\r\n6. យើងត្រូវការឡានសម្រាប់រយៈពេលកន្លះថ្ងៃល្អប្រសើរជាងមុននៅពេលព្រឹកដើម្បីយកវាចូលទៅក្នុងក្រសួងសាធារណការនិងដឹកជញ្ជូនដើម្បីយកលេខតួនិងម៉ាស៊ីន។<br />\r\n7. តម្លៃអាស្រ័យទៅតាមឆ្នាំម៉ូដែលនិងកម្លាំងសេះរបស់រថយន្ត<br />\r\n&nbsp;<br />\r\nយើងទន្ទឹងរងចាំដោយក្ដីរីករាយដែលមានឱកាសដ៏អស្ចារ្យក្នុងការបម្រើអ្នកយ៉ាងជោគជ័យនាពេលអនាគត។<br />\r\nប្រសិនបើអ្នកចង់រៀបចំឱ្យមានយានជំនិះរបស់អ្នកសម្រាប់ការត្រួតពិនិត្យទូទៅរបស់ម៉ូតូដោយ Lyna-Garage.Com ។ សូមទំនាក់ទំនងមកកាន់យើងនៅគ្រប់ពេលដែលមានភាពងាយស្រួលបំផុត។ ប្រសិនបើរថយន្តរបស់អ្នកមានអារម្មណ៍ថាមានម៉ូតូយើងមានគ្រឿងបរិក្ខារនៅយានដ្ឋានរបស់យើងដើម្បីជួសជុលយានយន្តរបស់អ្នកហើយធ្វើការសាកល្បងម្តងទៀតនៅពេលដែលវាត្រូវបានទាមទារ។</p>\r\n\r\n<p>ថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!</p>\r\n\r\n<p>ម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល</p>\r\n\r\n<p>ថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>អាសយដ្ឋានការិយាល័យ</p>\r\n\r\n<p>លេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា</p>\r\n\r\n<p>អ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)</p>\r\n\r\n<p>មានការរស់នៅដ៏អស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!</p>\r\n\r\n<p>ថ្លៃសេវាកម្ម ($)</p>\r\n ', '20.00'),
(17, 'Car Buying Consultation', '20190724_8991.png', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Car Buying &amp; Selling Consultation<br />\r\n<br />\r\nDear Valuable customers and friends,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">We are offerring the service of Car Buying and Selling Consultation &amp; Evaluation&nbsp;for both Cambodian and all foreign nationalities who are residing in the Kingdom of Cambodia and would like to buy a very good car at the very good price. Nowaday, there are many wrecked cars importing into Cambodia about 50% are very bad crushed, cut and rejoined. After the rejoining and reconditioning, they display them for sales at the carshops.&nbsp;We are the only one having a very good experience and connection with the carshops&nbsp;and had never failt in finding a very good car for our customers.&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">WORKING DAYS</span></span></span></strong><br />\r\n<span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Monday to Saturday -&nbsp;</span></span></span><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:red\">Sunday</span></span></span><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">&nbsp;is holiday!</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">WORKING HOURS</span></span></span></strong><br />\r\n<span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Morning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">PUBLIC HOLIDAYS</span></span></span></strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n_____________________________________________________________________</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">OFFICE ADDRESS</span></span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:center\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.5pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Have A Wonderful Stay In Cambodia!</span></span></span></strong></span></span></span></p>\r\n\r\n<div style=\"border-bottom:solid #e1e1e1 1.0pt; padding:0in 0in 15.0pt 0in\">\r\n<h2 style=\"margin-left:0in; margin-right:0in\"><span style=\"background-color:white\"><span style=\"font-size:13pt\"><span style=\"background-color:white\"><span style=\"color:inherit\"><span style=\"font-family:Cambria,serif\"><strong><span style=\"font-size:15.0pt\"><span style=\"font-family:&quot;Open Sans&quot;,&quot;serif&quot;\"><span style=\"color:#2d2d2d\">Service Fee($)</span></span></span></strong></span></span></span></span></span></h2>\r\n</div>\r\n ', 'សេវាពិគ្រោះយោបល់ទិញរថយន្ត', '<p>ពិគ្រោះយោបល់ទិញនិងលក់រថយន្ត</p>\r\n\r\n<p>ជូនចំពោះអតិថិជននិងមិត្តភក្តិដែលមានតម្លៃ។<br />\r\nដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។<br />\r\nយើងកំពុងផ្តល់ជូននូវសេវាកម្មពិគ្រោះយោបល់និងការទិញលក់រថយន្តសម្រាប់ជនជាតិខ្មែរនិងជនជាតិបរទេសទាំងអស់ដែលកំពុងរស់នៅក្នុងព្រះរាជាណាចក្រកម្ពុជាហើយចង់ទិញរថយន្តល្អ ៗ ក្នុងតម្លៃសមរម្យ។ សព្វថ្ងៃមានរថយន្តជាច្រើនគ្រឿងដែលនាំចូលមកកម្ពុជាប្រមាណ 50% ត្រូវបានគេកំទេចកាត់បន្ថយនិងចូលរួមឡើងវិញ។ បន្ទាប់ពីការបញ្ចូលឡើងវិញនិងការជួសជុលឡើងវិញពួកគេបានបង្ហាញវាសម្រាប់ការលក់នៅរោងសិប្បកម្ម។ យើងគឺជាក្រុមហ៊ុនតែមួយគត់ដែលមានបទពិសោធន៏ល្អនិងមានការផ្សារភ្ជាប់ជាមួយនឹងការតាំងពិព័រណ៍នេះហើយយើងមិនដែលបានស្វែងរករថយន្តល្អសម្រាប់អតិថិជនរបស់យើងឡើយ។<br />\r\nប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។<br />\r\nថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!<br />\r\nម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល<br />\r\nថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។<br />\r\n1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________<br />\r\nអាសយដ្ឋានការិយាល័យ<br />\r\nលេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា<br />\r\nអ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)<br />\r\nមានការរស់នៅដ៏អស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!<br />\r\nថ្លៃសេវាកម្ម ($)</p>\r\n ', '150'),
(18, 'Vehicle General Checkup by our Experts', '20190724_6587.png', '<p>Dear Valuable customers and friends,</p>\r\n\r\n<p>Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</p>\r\n\r\n<p>We are offerring the service of car general checkup for all types of vehicles. This service is applicable only in Phnom Penh at the reasonable price. Our service is very fast.&nbsp;</p>\r\n\r\n<p>Please call us any times during working hours and days.</p>\r\n\r\n<p>Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</p>\r\n\r\n<p><strong>General Checkup is always FREE of Charge!</strong></p>\r\n\r\n<p>We offer a Comprehensive Checking Service for your car by using the latest diagnostic technology plus our skillful with long-experienced (1). mechanics/technician, (2). Suspension (3). Transmission (Auto and Manual), (4). electricians (repair/rewire), (5). knockers/welders and (6). painters etc . . .</p>\r\n\r\n<p><strong>Servicing the vehicles at Lyna-Garage.Com includes checking the following components:</strong></p>\r\n\r\n<ul>\r\n	<li>Air Filter (Induction Air Filter Replacement)</li>\r\n	<li>Water in the Radiator, Reservoir, Coolant and Hoses (Pipes)</li>\r\n	<li>Water for Washers, Wipers and Quality of the Washer Blades</li>\r\n	<li>Engine Oil and Filter Quality</li>\r\n	<li>Brake Fluid Quality</li>\r\n	<li>Gearbox/Transmission, Rear Axle, Transfer Fluid Quality</li>\r\n	<li>Power Steering Fluid Quality</li>\r\n	<li>Battery Terminals and Leads</li>\r\n	<li>Auxiliary Drive Belts</li>\r\n	<li>Vacuum Pump and Valves</li>\r\n	<li>Brake System Discs, Pads and Drums</li>\r\n	<li>Handbrake Mechanism</li>\r\n	<li>Tire Conditions, Tread Depth including Spare Tire, and Wheel nuts</li>\r\n	<li>Timing Belt Quality</li>\r\n	<li>Fuel Feed Lines</li>\r\n	<li>Doors Check, Straps and Hinges</li>\r\n	<li>Exterior/Interior Respective Control Lights, and Warning Gauges</li>\r\n	<li>Hood Latch and Safety Catch</li>\r\n	<li>Ignition, Spark Plugs, and Glow Plugs</li>\r\n	<li>Pollen Filter Replacement</li>\r\n	<li>Service Interval Indicator</li>\r\n	<li><strong>Underbody Condition</strong>: Suspension Linkages, Ball/CV Joints, Tie-Rods Set, Drivershafts, Gaiter, Propshafts, and Boots</li>\r\n</ul>\r\n\r\n<p>It is vitally important to service your car at regular intervals to maintain the mechanics of the car, reduce overall wear and tear which will reduce your costs in the long run.&nbsp; In our experience, many engine related problems arise due to insufficient and poor servicing resulting in excessive wear on the engine components.</p>\r\n\r\n<p>Contact Lyna-Garage.Com to arrange a regular servicing schedule with our comprehensive maintenance checks, utilizing our powerful diagnostic technology by our highly skilled technicians.</p>\r\n\r\n<p>WORKING DAYS<br />\r\nMonday to Saturday -&nbsp;Sunday&nbsp;is holiday!<br />\r\nWORKING HOURS<br />\r\n<strong>Morning</strong>: 07:00 AM to 12:00 Noon<br />\r\n<strong>Afternoon</strong>: 01:30 PM to 05:00 PM<br />\r\nPUBLIC HOLIDAYS (For Lyna-CarRental.Com official holidays are 12 days per year).</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>1. International New Year Day</td>\r\n			<td>1 January (1 day)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2. Cambodian New Year Days</td>\r\n			<td>14-16 April (3 days)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3. National Pchum Ben Days</td>\r\n			<td>. . . September (3 days)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4. Water Festival Days</td>\r\n			<td>. . . November (3 days)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5. Christmas Days</td>\r\n			<td>25 December (1 day)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Service Fee($)</h2>\r\n ', 'សេវាត្រួតសុខរថយន្តដោយអ្នកជំនាញរបស់យើង', '<p>ជូនចំពោះអតិថិជននិងមិត្តភក្តិដែលមានតម្លៃ។</p>\r\n\r\n<p>ដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់ជូននូវសេវាពិនិត្យរថយន្តទូទៅសម្រាប់រថយន្តគ្រប់ប្រភេទ។ សេវាកម្មនេះអាចអនុវត្តបានតែនៅក្នុងទីក្រុងភ្នំពេញក្នុងតម្លៃសមរម្យ។ សេវាកម្មរបស់យើងគឺលឿនណាស់។</p>\r\n\r\n<p>សូមទូរស័ព្ទមកយើងរាល់ពេលម៉ោងនិងម៉ោងធ្វើការ។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>ការពិនិត្យទូទៅគឺតែងតែឥតគិតថ្លៃដោយឥតគិតថ្លៃ!</p>\r\n\r\n<p>យើងផ្តល់ជូននូវសេវាកម្មពិនិត្យគ្រប់ជ្រុងជ្រោយសម្រាប់រថយន្តរបស់អ្នកដោយប្រើបច្ចេកវិជ្ជាវិនិច្ឆ័យចុងក្រោយបំផុតរួមជាមួយនឹងជំនាញដែលមានបទពិសោធន៍យូរអង្វែងរបស់យើង (1) ។ មេកានិច / អ្នកបច្ចេកទេស, (2) ។ ផ្អាក (3) ។ ការបញ្ជូន (ស្វ័យប្រវត្តិនិងសៀវភៅដៃ), (4) ។ អគ្គីសនី (ជួសជុល / វិលត្រឡប់) (5) ។ knockers / welders និង (6) ។ វិចិត្រករល។ ។ ។</p>\r\n\r\n<p>ការផ្តល់សេវាកម្មដល់យានយន្តនៅ Lyna-Garage.Com រួមបញ្ចូលនូវការត្រួតពិនិត្យនូវសមាសធាតុដូចខាងក្រោម:</p>\r\n\r\n<p>តម្រងខ្យល់ (ការផ្លាស់ប្តូរតម្រងខ្យល់ដោយបង្ខំ)<br />\r\nទឹកនៅក្នុងធារាសាស្រ្តអាងស្តុកទឹកត្រជាក់និងបំពង់ (បំពង់)<br />\r\nទឹកសម្រាប់វ៉ោធ័រ, រន្ទះនិងគុណភាពនៃវ៉ែនចន្ទ្រៃ<br />\r\nគុណភាពម៉ាស៊ីនប្រេងនិងតម្រង<br />\r\nគុណភាពហ្វ្រាំងហ្វ្រាំង<br />\r\nប្រអប់ម៉ាស៊ីន / ការបញ្ជូន, ចំណុចកណ្តាល, ផ្ទេរគុណភាពទឹក<br />\r\nចង្កូតថាមពលគុណភាពទឹក<br />\r\nអាគុយនិងខ្សែ<br />\r\nខ្សែក្រវាត់ជំនួយ<br />\r\nម៉ាស៊ីនបូមធូលីនិងសន្ទះបិទបើក<br />\r\nឌីសប្រព័ន្ធហ្វ្រាំង, ស្គរនិងស្គរ<br />\r\nយន្តការដោយដៃ<br />\r\nលក្ខខ័ណរបស់សំបកកង់រថយន្តមានជម្រៅជ្រៅរួមទាំងសំបកកង់រថយន្តនិងគ្រាប់កង់<br />\r\nគុណភាពពេលវេលាខ្សែកាប<br />\r\nបន្ទាត់ចំណីប្រេង<br />\r\nទ្វារការពិនិត្យ, ខ្សែនិងហ៊ីង<br />\r\nភ្លើងខាងក្រោមដែលមានពន្លឺត្រួតពិនិត្យផ្ទៃខាងក្នុងនិងមហាផ្ទៃនិងរង្វាស់ព្រមាន<br />\r\nក្រណាត់និងបាវសុវត្ថិភាព<br />\r\nបញ្ឆេះបញ្ឆេះស្ពែមនិងដោតផ្លិត<br />\r\nការជំនួសតម្រងបំពង់<br />\r\nសូចនករចន្លោះពេលសេវាកម្ម<br />\r\nលក្ខខណ្ឌរបស់អ្នកណាម្នាក់: ការផ្អាកការតភ្ជាប់សន្លឹកបៀ / សន្លាក់ CV, ឈ្នូតខ្សែអក្សរ, អ្នកបើកបរ, ហ្គីតធើ, Propshafts, និងស្បែកជើង។<br />\r\nវាមានសារៈសំខាន់ណាស់ក្នុងការបម្រើរថយន្តរបស់អ្នកក្នុងចន្លោះពេលជាទៀងទាត់ដើម្បីថែរក្សាគ្រឿងម៉ាស៊ីនរបស់រថយន្តកាត់បន្ថយការពាក់និងការបង្ហូរទឹកភ្នែកដែលនឹងកាត់បន្ថយចំណាយរបស់អ្នកក្នុងរយៈពេលវែង។ នៅក្នុងបទពិសោធន៍របស់យើងបញ្ហាដែលទាក់ទងនឹងម៉ាស៊ីនជាច្រើនកើតឡើងដោយសារតែការផ្តល់សេវាកម្មមិនគ្រប់គ្រាន់និងមិនសូវមានប្រសិទ្ធិភាពដែលជាលទ្ធផលនៃការពាក់លើសលប់លើសមាសធាតុម៉ាស៊ីន។</p>\r\n\r\n<p>ទាក់ទងមក Lyna-Garage.Com ដើម្បីរៀបចំកាលវិភាគសេវាកម្មជាទៀងទាត់ជាមួយនឹងការត្រួតពិនិត្យថែរក្សាដ៏ទូលំទូលាយរបស់យើងដោយប្រើប្រាស់បច្ចេកវិទ្យាវិនិច្ឆ័យដ៏មានឥទ្ធិពលរបស់យើងដោយអ្នកបច្ចេកទេសដែលមានជំនាញខ្ពស់។</p>\r\n\r\n<p>ថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!<br />\r\nម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល<br />\r\nថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\nថ្លៃសេវាកម្ម ($)</p>\r\n ', '15.00'),
(19, 'Vehicle General Maintenance by our Experts', '20190724_8207.png', '<p>Dear Valuable customers and friends,</p>\r\n\r\n<p>Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</p>\r\n\r\n<p>We are offerring the service of car maintenance including the services of periodical maintenance A B C D for all types of vehicles</p>\r\n\r\n<p>Why should I opt to use the Vehicle Periodical Maintenance at Lyna-Garage.Com?</p>\r\n\r\n<p>1. You will have a very good hospital to take a very good care of your vehicle to maintain it in good health and in good working condition.</p>\r\n\r\n<p>2. Save your vehicle from broken down so often which leading to a serious damage and you may have to pay a lot of money to restore.</p>\r\n\r\n<p>3. If your vehicle won&rsquo;t break down so often, it will bring you to the good saving, such as: towing fee, wasting your times waiting on the road under the rain, sunshine, dusty, in the dark area and smell of smoke.&nbsp;</p>\r\n\r\n<p>4. You won&rsquo;t be necessary to waste times looking for the unknown garage workshop, paying for the unknown or pre-informed service fee etc . . .</p>\r\n\r\n<p>5. You will get some benefit of free vehicle inspection by our experts.</p>\r\n\r\n<p>6. Whereas the vehicle general inspection by our experts will do it thoroughly, to all parts of the vehicle to ensure that your vehicle is safe, in good health and transparency.</p>\r\n\r\n<p>7. You will regularly get a very reliable report with free of charge plus a free quotation and then you could make a selection or decision according to your budget.</p>\r\n\r\n<p>8. You will have a privilege to select one of the following Vehicle Periodical Maintenance Service Price as attached herewith:&nbsp;</p>\r\n\r\n<p>8.1. Price List in Khmer of the Vehicle Periodical Maintenance Service<br />\r\n8.3. Price List in English of the Vehicle Periodical Maintenance Service<br />\r\n8.3. Agreement in Khmer of the Vehicle Periodical Maintenance Service<br />\r\n8.4. Agreement in English of the Vehicle Periodical Maintenance Service</p>\r\n\r\n<p>Please don&rsquo;t be desperate, come immediately to Lyna-Garage.Com to get the agreement signed and accept an uniquely Vehicle Periodical Maintenance Service in the Kingdom of Cambodia.</p>\r\n\r\n<p>Our skillful, well-trained staff and experts will be welcome you with pleasure!</p>\r\n\r\n<p>This service is applicable only in Phnom Penh at the reasonable price. Our service is very fast.&nbsp;</p>\r\n\r\n<p>Please call us any times during working hours and days.</p>\r\n\r\n<p>Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</p>\r\n\r\n<p><strong>WORKING DAYS</strong><br />\r\nMonday to Saturday -&nbsp;Sunday&nbsp;is holiday!</p>\r\n\r\n<p><strong>WORKING HOURS</strong><br />\r\nMorning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</p>\r\n\r\n<p><strong>PUBLIC HOLIDAYS</strong>&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</p>\r\n\r\n<p>1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p><strong>OFFICE ADDRESS</strong></p>\r\n\r\n<p>#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</p>\r\n\r\n<p>E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</p>\r\n\r\n<p><strong>Have A Wonderful Stay In Cambodia!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Service Fee($)</h2>\r\n ', 'សេវាទំហែទាំរថយន្តដោយអ្នជំនាញរបស់យើង', '<p>ជូនចំពោះអតិថិជននិងមិត្តភក្តិដែលមានតម្លៃ។</p>\r\n\r\n<p>ដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់សេវាកម្មជួសជុលរថយន្តរួមទាំងសេវាកម្មថែទាំជាប្រចាំផងដែរសម្រាប់រថយន្តគ្រប់ប្រភេទ</p>\r\n\r\n<p>ហេតុអ្វីបានជាខ្ញុំគួរតែជ្រើសរើសយកការថែទាំតាមកាលកំណត់តាមរថយន្តនៅ Lyna-Garage.Com?</p>\r\n\r\n<p>1. អ្នកនឹងមានមន្ទីរពេទ្យដ៏ល្អមួយដើម្បីថែរក្សាយានយន្តរបស់អ្នកឱ្យមានសុខភាពល្អនិងមានស្ថានភាពល្អ។</p>\r\n\r\n<p>2. សន្សំសំចៃរថយន្តរបស់អ្នកពីការបែកខ្ញែកជាញឹកញាប់ដែលនាំទៅរកការខូចខាតធ្ងន់ធ្ងរហើយអ្នកប្រហែលជាត្រូវចំណាយប្រាក់ច្រើនដើម្បីស្តារឡើងវិញ។</p>\r\n\r\n<p>ប្រសិនបើរថយន្តរបស់អ្នកមិនបែកគ្នាជាញឹកញាប់វានឹងនាំអ្នកទៅរកការសន្សំប្រាក់ដូចជា: ថ្លៃឈ្នួលការខ្ជះខ្ជាយពេលវេលារបស់អ្នករង់ចាំនៅតាមផ្លូវក្រោមភ្លៀងពន្លឺព្រះអាទិត្យរិលនៅកន្លែងងងឹតនិងក្លិន ផ្សែង។</p>\r\n\r\n<p>4. អ្នកនឹងមិនចាំបាច់ចំណាយពេលច្រើនក្នុងការស្វែងរកសិក្ខាសាលានៅក្នុងយានដ្ឋានដែលមិនស្គាល់ឡើយដោយបង់ថ្លៃសេវាកម្មដែលមិនស្គាល់ឬមុនម៉ោង។ ។ ។</p>\r\n\r\n<p>5. អ្នកនឹងទទួលបានអត្ថប្រយោជន៍មួយចំនួនពីការត្រួតពិនិត្យរថយន្តដោយអ្នកជំនាញរបស់យើង។</p>\r\n\r\n<p>6. ខណៈពេលដែលការត្រួតពិនិត្យទូទៅរថយន្តដោយអ្នកជំនាញរបស់យើងនឹងធ្វើវាយ៉ាងហ្មត់ចត់ទៅផ្នែកទាំងអស់នៃយានយន្តដើម្បីធានាថារថយន្តរបស់អ្នកមានសុវត្ថិភាពក្នុងសុខភាពល្អនិងតម្លាភាព។</p>\r\n\r\n<p>7. អ្នកនឹងទទួលបាននូវរបាយការណ៍ដែលអាចទុកចិត្តបានដោយមិនគិតថ្លៃនិងបូកសរុបដោយឥតគិតថ្លៃហើយបន្ទាប់មកអ្នកអាចធ្វើការជ្រើសរើសឬការសម្រេចចិត្តយោងទៅតាមថវិការបស់អ្នក។</p>\r\n\r\n<p>8. អ្នកនឹងមានឯកសិទ្ធិក្នុងការជ្រើសរើសយកមួយក្នុងចំណោមតំលៃសេវាថែទាំតាមកាលកំណត់តាមយានយន្តដូចខាងក្រោម:</p>\r\n\r\n<p>8.1 ។ បញ្ជីតម្លៃជាភាសាខ្មែរសេវាកម្មជួសជុលយានយន្ត<br />\r\n8.3 ។ បញ្ជីតម្លៃជាភាសាអង់គ្លេសនៃសេវាកម្មជួសជុលយានយន្ត<br />\r\n8.3 ។ កិច្ចព្រមព្រៀងជាភាសាខ្មែរនៃសេវាកម្មជួសជុលយានយន្ត<br />\r\n8.4 ។ កិច្ចព្រមព្រៀងជាភាសាអង់គ្លេសនៃសេវាកម្មជួសជុលយានយន្ត</p>\r\n\r\n<p>សូមកុំអស់សង្ឃឹមសូមមកកាន់ Lyna-Garage.Com ភ្លាមៗដើម្បីទទួលបានកិច្ចព្រមព្រៀងចុះហត្ថលេខានិងទទួលយកនូវសេវាថែទាំកំណត់ពេលយានជំនិះនៅក្នុងព្រះរាជាណាចក្រកម្ពុជា។</p>\r\n\r\n<p>បុគ្គលិកនិងអ្នកជំនាញដែលបានទទួលការបណ្តុះបណ្តាលយ៉ាងស្ទាត់ជំនាញរបស់យើងនឹងស្វាគមន៍អ្នកដោយភាពរីករាយ!</p>\r\n\r\n<p>សេវាកម្មនេះអាចអនុវត្តបានតែនៅក្នុងទីក្រុងភ្នំពេញក្នុងតម្លៃសមរម្យ។ សេវាកម្មរបស់យើងគឺលឿនណាស់។</p>\r\n\r\n<p>សូមទូរស័ព្ទមកយើងរាល់ពេលម៉ោងនិងម៉ោងធ្វើការ។</p>\r\n\r\n<p>ប្រសិនបើអ្នកត្រូវការជំនួយបន្ថែមទៀតវាទាក់ទងទៅនឹងអ្នកផ្ទាល់ឬអ្នកប្រើផ្លូវការសូមកុំស្ទាក់ស្ទើរក្នុងការទាក់ទងមកយើង។ យើងតែងតែមាននៅក្នុងការចោលរបស់អ្នក។</p>\r\n\r\n<p>ថ្ងៃ​ធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!</p>\r\n\r\n<p>ម៉ោង​ធ្វើការ<br />\r\nពេលព្រឹក: 07:00 AM រហូតដល់ 12:00 រសៀល<br />\r\nរសៀលពីម៉ោង 1:30 ដល់ 5:00 រសៀល</p>\r\n\r\n<p>ថ្ងៃឈប់សម្រាកសាធារណៈ (សម្រាប់ថ្ងៃឈប់សម្រាកផ្លូវការលីណា - ការ៉ាតថល .Com មាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1. ទិវាចូលឆ្នាំសកល 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យភ្ជុំបិណ្ឌជាតិ។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\n4. ពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>អាសយដ្ឋានការិយាល័យ</p>\r\n\r\n<p>លេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា</p>\r\n\r\n<p>អ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)</p>\r\n\r\n<p>មានការរស់នៅដ៏អស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!</p>\r\n\r\n<p>ថ្លៃសេវាកម្ម ($)</p>\r\n ', '15.00'),
(20, 'Vehicle Ownership Transfer', '20190724_4557.png', '<p>ff</p>\r\n ', 'សេវាផ្ទេរកម្មសិទ្ទរថយន្ត', '<p>ff</p>\r\n ', '100');
INSERT INTO `tbl_our_service` (`se_id`, `se_title`, `se_image`, `se_detail`, `se_title_kh`, `se_detail_kh`, `se_price`) VALUES
(22, 'Vehicle Registration Service', '20190724_9215.png', '<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Dear Valuable customers and friends,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Firstly, we would like to express our profoundly thanks for your viewing our website and going through everything in this contents.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">We are offering the service of Vehicle Registration after purchasing&nbsp;either the brand new and the second hand one for both the Cambodian and all foreign nationalities.&nbsp;We are the only one having a very good experience and good connection with the Ministry of Public Work and Transport. We had never failt in this business.&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Should you require any further assistance either it is related to your personal or official ones, please do not hesitate to contact us. We are always at your disposal.&nbsp;</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:red\">Vehicle Registration After Buying</span></span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">We have long and long-term experience of doing the Vehicle Registration for all, such as: (1). Brand New Car, (2). 2nd-hand, and (3). 3rd-hand vehicle for either the local and the expat people.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">In order to start the processing, the following documents are seriously required:</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">1. Copy your valid passport<br />\r\n2. Copy your valid entry visa<br />\r\n3. Copy your current house lease agreement translated into Khmer<br />\r\n4. Copy your Cambodian Driver&rsquo;s License<br />\r\n5. Copy Letter of Sale<br />\r\n6. Copy ID Card of the previous owner<br />\r\n7. Current Address Certificate from your Section Leader<br />\r\n8. Three photos in the passport size<br />\r\n9. Registration charge in US$____/__ upon the real model and the size of the engine of the vehicle.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Should you require any further information regarding to the above-mentioned and/or any either personal or official assistance, please feel free to contact us. We are always at your disposal.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">WORKING DAYS</span></span></span></strong><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Monday to Saturday -&nbsp;</span></span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:red\">Sunday</span></span></span><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">&nbsp;is holiday!</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">WORKING HOURS</span></span></span></strong><br />\r\n<span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Morning: 07:00 AM to 12:00 Noon<br />\r\nAfternoon: 01:30 PM to 05:00 PM</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">PUBLIC HOLIDAYS</span></span></span></strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">&nbsp;(For Lyna-CarRental.Com official holidays are 12 days per year).</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">1. International New Year Day&nbsp;&nbsp; &nbsp;1 January (1 day)<br />\r\n2. Cambodian New Year Days&nbsp;&nbsp; &nbsp;14-16 April (3 days)<br />\r\n3. National Pchum Ben Days &nbsp; &nbsp; . . . September (3 days)<br />\r\n4. Water Festival Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. . . November (3 days)<br />\r\n5. Christmas Days &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;25 December (1 day)<br />\r\n____________________________________________</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">OFFICE ADDRESS</span></span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">#132, Intersection Streets 430 | 432 | 173<br />\r\nSangkat Tumnop Teuk<br />\r\nKhan Chamcarmon<br />\r\nPhnom Penh<br />\r\nKingdom of Cambodia</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">E-mail: info@lyna-carrental.com<br />\r\nTel: +855 (0) 12 55 42 47 (Cambodian)<br />\r\nTel: +855 (0) 12 924 517 (English)<br />\r\nTel: +855 (0) 92 14 30 14 (Office)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2d2d2d\">Have A Wonderful Stay In Cambodia!</span></span></span></strong></span></span></span></p>\r\n ', 'សេវាកម្មចុះបញ្ជីររថយន្ត', '<p>អតិថិជនសម្រាប់អតិថិជននិងមិត្តភក្ដិដែលមានតម្លៃ។</p>\r\n\r\n<p>ដំបូងយើងសូមថ្លែងអំណរគុណយ៉ាងជ្រាលជ្រៅចំពោះការមើលគេហទំព័ររបស់យើងនិងការឆ្លងកាត់អ្វីៗគ្រប់យ៉ាងនៅក្នុងខ្លឹមសារនេះ។</p>\r\n\r\n<p>យើងកំពុងផ្តល់សេវាកម្មចុះបញ្ជីរថយន្តបន្ទាប់ពីទិញផ្លាកលេខថ្មីនិងលេខពីរសម្រាប់ជនជាតិខ្មែរនិងជនជាតិបរទេសទាំងអស់។ យើងមានបទពិសោធន៍ល្អជាមួយក្រសួងសាធារណការនិងដឹកជញ្ជូន។ យើងមិនដែលបរាជ័យក្នុងជំនួញនេះទេ។</p>\r\n\r\n<p>ទាក់ទងមកយើងខ្ញុំ។ យើងតែងតែមានហាមឃាត់។</p>\r\n\r\n<p>ការចុះបញ្ជីយានយន្តបន្ទាប់ពីទិញ</p>\r\n\r\n<p>យើងមានបទពិសោធន៍យូរអង្វែងក្នុងការអនុវត្តយានយន្តគ្រប់ប្រភេទដូចជា: (1) ។ រថយន្តម៉ាកថ្មី, (2) ។ ដៃទី 2 និង (3) ។ យានជំនិះទី 3 សំរាប់ប្រជាជនក្នុងស្រុកនិងជនបរទេស។</p>\r\n\r\n<p>ដើម្បីចាប់ផ្តើមដំណើរការយ៉ាងម៉ត់ចត់:<br />\r\nចម្លងតាមលិខិតឆ្លងដែនរបស់អ្នក<br />\r\n2. ថតចម្លងត្រឹមត្រូវ<br />\r\nត្រលប់ទៅផ្ទះរបស់អ្នកវិញ<br />\r\nអ្នកថតរូប<br />\r\nចម្លងការលក់<br />\r\n6. ចម្លងអត្តសញ្ញាណប័ណ្ណរបស់ម្ចាស់មុន<br />\r\nវិញ្ញាបនបត្ររបស់អ្នក<br />\r\n8 សន្លឹក 3 សន្លឹកក្នុងទំហំលិខិតឆ្លងដែន<br />\r\nថ្លៃឈ្នួលអប្បបរមាគិតជាដុល្លារអាមេរិក ____ / __ លើម៉ូដែលពិតនិងទំហំនៃយានយន្ត</p>\r\n\r\n<p>សូមទាក់ទងមកយើងខ្ញុំដោយឥតគិតថ្លៃ។ យើងតែងតែមានហាមឃាត់។</p>\r\n\r\n<p>ថ្ងៃធ្វើការ<br />\r\nថ្ងៃច័ន្ទដល់ថ្ងៃសៅរ៍ - ថ្ងៃអាទិត្យគឺថ្ងៃឈប់សម្រាក!</p>\r\n\r\n<p>ម៉ោងធ្វើការ<br />\r\nម៉ោង: 07:00 ព្រឹកដល់ម៉ោង 12:00 ល្ងាច<br />\r\nម៉ោង 1: 30-5: 00 រសៀល</p>\r\n\r\n<p>ថ្ងៃឈប់សម្រាក (សម្រាប់ថ្ងៃឈប់សម្រាកលីណា - ការ៉ាតតរៈមាន 12 ថ្ងៃក្នុងមួយឆ្នាំ) ។</p>\r\n\r\n<p>1 ថ្ងៃ 1 មករា (1 ថ្ងៃ)<br />\r\n2. ថ្ងៃចូលឆ្នាំខ្មែរ 14-16 មេសា (3 ថ្ងៃ)<br />\r\n3 ។ បុណ្យណូអែល។ ។ ។ ខែកញ្ញា (3 ថ្ងៃ)<br />\r\nពិធីបុណ្យអុំទូក។ ។ ។ ខែវិច្ឆិកា (3 ថ្ងៃ)<br />\r\n5. ថ្ងៃបុណ្យណូអែល 25 ធ្នូ (1 ថ្ងៃ)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>អាសយដ្ឋានការិយាល័យ</p>\r\n\r\n<p>លេខ 132, ផ្លូវប្រសព្វ 430 | 432 | 173<br />\r\nសង្កាត់ទួលទំពូង<br />\r\nខណ្ឌចំការមន<br />\r\nភ្នំពេញ<br />\r\nព្រះរាជាណាចក្រកម្ពុជា</p>\r\n\r\n<p>អ៊ីមែល: info@lyna-carrental.com<br />\r\nទូរស័ព្ទ: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\nទូរស័ព្ទ: +855 (0) 12 924 517 (អង់គ្លេស)<br />\r\nទូរស័ព្ទ: +855 (0) 92 14 30 14 (ការិយាល័យ)</p>\r\n\r\n<p>មានអស្ចារ្យនៅក្នុងប្រទេសកម្ពុជា!</p>\r\n\r\n<p>ថ្លៃសេវា ($)<br />\r\nchounchampoh atethechn ning mitt phokte del meanotamlei ។</p>\r\n\r\n<p>នៅពេលដែលអ្នកមានអារម្មណ៍ភ្ញាក់ផ្អើល។</p>\r\n\r\n<p>អ្នកគាំទ្រអាចទទួលបានអ្វីដែលពួកគេចង់បាន។ យឿងឆាណាម៉ាន់សាសាមុចឆិកខាចខាខាស្សាវតាតាសូរសៅថុងមានន័យថាថេនថិនថុនណុងឡាឡាមុយូគក្សុនវររ័រណនឌុកចនរចន។ អ្វីដែលជាការរំលោភបំពានយ៉ាងធ្ងន់ធ្ងរ។</p>\r\n\r\n<p>ស្រទាប់ថ្មត្រូវបានផលិតឡើងដោយធ្យូងថ្មនិងគ្រាប់ពូជដែលមានគុណភាពល្អបំផុត។ ឥលូវនាងតេងធេងថេនណារ៉ាយបាននិយាយថា &quot;</p>\r\n\r\n<p>kar chohchhmoh yeanoyont kraoypel tinh</p>\r\n\r\n<p>អ្នកអាចដឹងថាអ្នកមានអារម្មណ៍ដូច: (1) ។ rothayont meak thmei, (2) ។ ទី 2 (3) ។ អ្នកមានអាយុ 3 ឆ្នាំហើយ។</p>\r\n\r\n<p>ក្នុងក្រុមរបស់អ្នក:<br />\r\nchamlong tam likhtachhlangden robsa anak<br />\r\n2. សូមកុំភ្លេចដាស់តឿន<br />\r\n3 ។ ខាមុនឈិចឃ្យូឈិចសុផុនឈិនហួត<br />\r\nthatachamlong likhetaanounhnhat anakbaekabr khmer<br />\r\n5<br />\r\n6 chamlong khasanhnhean bnn robsa mcheasa moun<br />\r\n7. អ្នកដែលមានសុភមង្គលអប្បបរាទបាស់ចំពុះកូនប្រុសព្រលឹងវិញ្ញាណ<br />\r\n8 ។ roubatht chamnuon 3 sanluk nowknong tomham likhetachlang<br />\r\n9. តៃហ្គិនឡាលឡៃហាំញ៉ូកាឈីហាំញ៉ូខេមបូឌា ____ / __</p>\r\n\r\n<p>brasenbae អាក់អន់ចិត្តដែលមិនគួរធុញទ្រាន់ដែលមានជាតិពុលតិចតួចដែលអាចបណ្តាលអោយមានជម្ងឺដាច់សរសៃឈាមខួរក្បាលឬញ័រ។ ឥលូវនាងតេងធេងថេនណារ៉ាយបាននិយាយថា &quot;</p>\r\n\r\n<p>thngai thveukear<br />\r\nthngaichnt dl thngaisaw - thngaiaeatity ku thngai chhbsamreak!</p>\r\n\r\n<p>maong thveukear<br />\r\nថ្ងៃសៅរ៍: 07:00 ព្រឹកព្រហស្បតិ៍ 12:00 យប់<br />\r\n1:30 dl 5:00 rsiel</p>\r\n\r\n<p>មានន័យថា 12 ដង) ។</p>\r\n\r\n<p>1. ចូវចូវសាន់ 1 ម៉ម (1 ថៃ្ង)<br />\r\n2. ខែលចចចខេ: ខ្មែរ 14-16 ខែ (3 ថៃ្ង)<br />\r\n3 ។ bonyaphchoumbend បន្លំ។ ។ ។ កុម្ភៈ (3 ថៃ្ង)<br />\r\n4. pithi bonyaomtouk ។ ។ ។ ឃីវឈិះគា (3 ថៃ្ង)<br />\r\n5 ថូខេន 25 ឆ្នាំ (1 ថៃ្ង)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>asayodthan kariyealy</p>\r\n\r\n<p>លេខ 132, ព្រ្រខ្រស 430 | 432 | 173<br />\r\nsangkeat tuoltompoung<br />\r\nkhandachamkaromn<br />\r\nភ្នំពេញ<br />\r\npreahreacheaneachakr kampouchea</p>\r\n\r\n<p>aimel: info@lyna-carrental.com<br />\r\ntoursapt: +855 (0) 12 55 42 47 (ខ្មែរ)<br />\r\ntoursapt: +855 (0) 12 924 517 (ចក្រភពអង់គ្លេស<br />\r\natethechn samreab atethechn ning mittaphokde del meanotamlei .</p>\r\n\r\n<p>&nbsp;dambaung yeung saum thlengamnarkoun yeang chrealochrow champoh kar meul kehtompr robsa yeung ning kar chhlangkat avei &nbsp;krobyeang nowknong khloemsaar nih .</p>\r\n\r\n<p>&nbsp;yeung kampoung phtal sevakamm chohbanhchi rothayont banteabpi tinh phlak lekh thmei ning lekh pir samreab choncheate khmer ning choncheate bartesa teangoasa . &nbsp;yeung meanobatpisaoth la cheamuoy krasuongsaathearonkar ning doekachonhchoun . &nbsp;yeung min del breachy knong chomnuonh nih te .</p>\r\n\r\n<p>&nbsp;teaktng mk yeungokhnhom . &nbsp;yeung tengteman hamkhat .</p>\r\n\r\n<p>&nbsp;karchohbanhchi yeanoyont banteabpi tinh</p>\r\n\r\n<p>&nbsp;yeung meanobatpisaoth youroangveng knong karoanouvott yeanoyont krob braphet dauchchea: (1) &nbsp;. &nbsp;rothayont meak thmei, (2) &nbsp;. &nbsp;dai ti 2 ning (3) &nbsp;. &nbsp;yeanchomniah ti 3 &nbsp;saamreab brachachn knong srok ning chonobartesa .</p>\r\n\r\n<p>&nbsp;daembi chabphtaem damnaerkar yeang mtcht:<br />\r\n&nbsp;chamlong tam likhetachhlangden robsa anak<br />\r\n2. &nbsp;thatachamlong troemotrauv<br />\r\n&nbsp;tralb towphteah robsa anak vinh<br />\r\nanakathatroub<br />\r\n&nbsp;chamlong kar lk<br />\r\n6. &nbsp;chamlong attasanhnhean bnn robsa mcheasa moun<br />\r\n&nbsp;vinhnheabanobatr robsa anak<br />\r\n8 sanluk 3 &nbsp;sanluk knong tomham likhetachhlangden<br />\r\n&nbsp;thlaichhnuol abbabarmea kitchea dollar amerik ____ / __ &nbsp;leu maudel pit ning tomham nei yeanoyont</p>\r\n\r\n<p>&nbsp;saum teaktng mk yeungokhnhom daoy itkitathlai . &nbsp;yeung tengteman hamkhat .</p>\r\n\r\n<p>&nbsp;thngaithveukear<br />\r\n&nbsp;thngaichnt dl thngaisaw - &nbsp;thngaiaeatity ku thngai chhbsamreak!</p>\r\n\r\n<p>&nbsp;maong thveukear<br />\r\n&nbsp;maong: 07:00 &nbsp;pruk dlmaong 12:00 lngeach<br />\r\nmaong 1: 30-5: 00 rsiel</p>\r\n\r\n<p>&nbsp;thngaichhb samreak ( samreab thngai chhbsamreak li na - &nbsp;ka rea tt r mean 12 &nbsp;thngai knong muoy chhna) &nbsp;.</p>\r\n\r\n<p>1 thngai 1 mokrea (1 &nbsp;thngai)<br />\r\n2. &nbsp;thngaichaulochhna khmer 14-16 mesaea (3 &nbsp;thngai)<br />\r\n3 &nbsp;. &nbsp;bonyanauel . &nbsp;. &nbsp;. khekanhnhea (3 &nbsp;thngai)<br />\r\n&nbsp;pithi bonyaomtouk . &nbsp;. &nbsp;. khevichchheka (3 &nbsp;thngai)<br />\r\n5. &nbsp;thngaibony nauel 25 thnou (1 &nbsp;thngai)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>&nbsp;asayodthan kariyealy</p>\r\n\r\n<p>lekh 132, &nbsp;phlauv brasapv 430 | 432 | 173<br />\r\n&nbsp;sangkeat tuoltompoung<br />\r\nkhandachamkaromn<br />\r\nphnompenh<br />\r\n&nbsp;preahreacheaneachakr kampouchea</p>\r\n\r\n<p>&nbsp;aimel: info@lyna-carrental.com<br />\r\n&nbsp;toursapt: +855 (0) 12 55 42 47 ( khmer)<br />\r\n&nbsp;toursapt: +855 (0) 12 924 517 ( angklesa)<br />\r\n&nbsp;toursapt: +855 (0) 92 14 30 14 ( kariyealy)</p>\r\n\r\n<p>&nbsp;mean aschary nowknong bratesa kampouchea!</p>\r\n\r\n<p>&nbsp;thlai seva ($)<br />\r\nchounchampoh atethechn ning mitt phokte del meanotamlei &nbsp;.</p>\r\n\r\n<p>&nbsp;nowpel del anak mean arommo phnheakphaael .</p>\r\n\r\n<p>&nbsp;anakkeatr ach ttuol ban avei del puokke chngban . &nbsp;yue ng cha na mean sa sa mou ch che k kha ch kha kha ssaa v ta ta saur saw tho ng meannytha the n the n tho n nong la la mou you k ksao n vr r r n n dou k ch n r ch n . &nbsp;avei del chea kar romlophbampean yeangothngonthngor .</p>\r\n\r\n<p>&nbsp;sratab thm trauv ban phlit laeng daoy thyoungothm ning kreabpouch del mean kounpheap la bamphot . &nbsp;ilouv neang te ng theng the nna rea y ban niyeay tha &quot;</p>\r\n\r\n<p>kar chohchhmoh yeanoyont kraoypel tinh</p>\r\n\r\n<p>&nbsp;anak ach doeng tha anak mean arommo dauch: (1) &nbsp;. rothayont meak thmei, (2) &nbsp;. ti 2 (3) &nbsp;. &nbsp;anak mean ayou 3 &nbsp;chhnam haey .</p>\r\n\r\n<p>&nbsp;knong krom robsa anak:<br />\r\nchamlong tam likhtachhlangden robsa anak<br />\r\n2. &nbsp;saumkom phlech dasatuen<br />\r\n3 &nbsp;. &nbsp;kha moun chhi ch khyou chhi ch so pho n chhi n huot<br />\r\nthatachamlong likhetaanounhnhat anakbaekabr khmer<br />\r\n5<br />\r\n6 chamlong khasanhnhean bnn robsa mcheasa moun<br />\r\n7. &nbsp;anak del mean sophomongkol abb brea t ba sa champouh kaunobrosa prolungvinhnhean<br />\r\n8 &nbsp;. roubatht chamnuon 3 sanluk nowknong tomham likhetachlang<br />\r\n9. &nbsp;tai hke n la l lai ham nhau ka chhi ham nhau khe m bau dea ____ / __</p>\r\n\r\n<p>brasenbae &nbsp;akan chett del min kuor thounhotrean del mean cheatepoul techtuoch del ach b nta l aoy mean chomngu dach sarsaichham khuorokbal ryy nhr . &nbsp;ilouv neang te ng theng the nna rea y ban niyeay tha &quot;</p>\r\n\r\n<p>thngai thveukear<br />\r\nthngaichnt dl thngaisaw - thngaiaeatity ku thngai chhbsamreak!</p>\r\n\r\n<p>maong thveukear<br />\r\n&nbsp;thngaisaw: 07:00 &nbsp;pruk prohasbat 12:00 yb<br />\r\n1:30 dl 5:00 rsiel</p>\r\n\r\n<p>meannytha 12 &nbsp;dng) &nbsp;.</p>\r\n\r\n<p>1. &nbsp;chau v chau v sa n 1 mm (1 &nbsp;thai &nbsp;ng)<br />\r\n2. &nbsp;khe l ch ch ch khe: khmer 14-16 khe (3 &nbsp;thai &nbsp;ng)<br />\r\n3 &nbsp;. bonyaphchoumbend &nbsp;banlom . &nbsp;. &nbsp;. komph (3 &nbsp;thai &nbsp;ng)<br />\r\n4. pithi bonyaomtouk &nbsp;. &nbsp;. &nbsp;. &nbsp;khi v chhiah kea (3 &nbsp;thai &nbsp;ng)<br />\r\n5 &nbsp;thau khen 25 chhnam (1 &nbsp;thai &nbsp;ng)<br />\r\n_____________________________________________________________________</p>\r\n\r\n<p>asayodthan kariyealy</p>\r\n\r\n<p>lekh 132, &nbsp;prr khrasa 430 | 432 | 173<br />\r\nsangkeat tuoltompoung<br />\r\nkhandachamkaromn<br />\r\nphnompenh<br />\r\npreahreacheaneachakr kampouchea</p>\r\n\r\n<p>aimel: info@lyna-carrental.com<br />\r\ntoursapt: +855 (0) 12 55 42 47 ( khmer)<br />\r\ntoursapt: +855 (0) 12 924 517 ( chakraphp angkles<br />\r\nបង្ហាញ​ច្រើនទៀត</p>\r\n ', '60.00');
INSERT INTO `tbl_our_service` (`se_id`, `se_title`, `se_image`, `se_detail`, `se_title_kh`, `se_detail_kh`, `se_price`) VALUES
(23, 'Damaged Vehicle Towing Service', 'blank.png', '<h2 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:13pt\"><span style=\"background-color:white\"><span style=\"font-family:Cambria,serif\"><span style=\"color:#4f81bd\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Towing Service for the damaged cars on the way</span></span></strong></span></span></span></span></h2>\r\n\r\n<p style=\"margin-left:7.55pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Lyna-CarRental.Com is offering a towing service for the broken-down car in the Kingdom of Cambodia.<br />\r\nWe usually consider helping the customers, such as: private, local or international companies, NGO, IO and UN agencies in Cambodia<span style=\"color:red\"><ins> </ins></span>solve their vehicle problems in remote area. </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:7.55pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">According to<span style=\"color:red\"><ins> </ins></span>our past experience, most car users had their wrong decision in getting their vehicles repaired by a garage in the remote areas where there were not enough parts, tools and equipment</span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">.</span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"> Some of them had to pay between $500.00 and $2,000.00 to get their vehicles fully repaired. Still the repaired vehicles did not work well. In order to avoid such inconvenience, we would like to recommend that you should use more of our affordable Towing Service instead of letting your vehicle repaired at the scene of the remote areas. For this the following process is required:</span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">1.&nbsp; Requesting for getting vehicle </span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">r</span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">eplaced by another one from Phnom Penh. The daily fee for the vehicle replacement varies depending on the distance in Kilometer from our office in Phnom Penh to the scene.&nbsp; For details:</span></span></p>\r\n\r\n<table cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:undefined; width:321px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">No.</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Place </span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Km</span></span></strong></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">$</span></span></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">1</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Poipet</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">468</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$328 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">2</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Banteay Meanchey</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">432</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$393 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">3</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Battambang</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">291</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$204 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">4</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kampong Chhnang</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">92</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$64 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">5</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Anlong Veng</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">425</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$298</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">6</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kompong Thom</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">169</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$118 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">7</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kampong Cham</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">124</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$ &nbsp;&nbsp;89 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">8</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Mondulkiri</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">277</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$194 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">9</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Bavet</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">162</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$113 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">10</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Prey Veng</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">95</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$67 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">11</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Phnom Den</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">120</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$84 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">12</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Chiso</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">50</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$35 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">13</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kampot</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">148</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$104 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">14</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Sihanouk Ville</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">227</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$159 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">15</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Pich Nil</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">90</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 63 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">16</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kampong Speu</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">48</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 34 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">17</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Odor Meanchey</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">469</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$328 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">18</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Sisophon</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">422</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$295 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">19</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Pailin</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">368</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$258 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">20</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Pursat</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">153</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$107 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">21</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Oudong</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">43</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$30 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">22</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Siem Reap</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">318</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$223 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">23</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Skun</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">78</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$55 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">24</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kratie</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">262</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$183 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">25</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Ratanakiri</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">531</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$372 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">26</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Svay Rieng</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">124</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 87 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">27</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Neak Loeung</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">66</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 46 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">28</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Takeo</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">90</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 63 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">29</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Bati</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">36</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$&nbsp;&nbsp; 25 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">30</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kep</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">158</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$111 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">32</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Kirirum</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">114</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$80 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">33</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Preah Vihear</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">273</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$191 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">34</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:99.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">Veal Rinh</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:33.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">183</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:74.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\">&nbsp;$128 </span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">The fee for towing from the scene to Phnom Penh is counted as follows</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">:</span></span></span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:36.0pt; margin-right:0cm\"><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">&nbsp;DSA for 2-Mechanics (Go &amp; return on the same day) US$20.00 per person per day. </span></span></span></span></span></span></p>\r\n\r\n<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Overnight DSA for 2-Mechanics US$25.00 per person per day.</span></span></span></span></span></span></li>\r\n</ol>\r\n\r\n<h3 style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Cambria,serif\"><span style=\"color:#4f81bd\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Working Days: </span></span></span></strong></span></span></span></span></h3>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Monday to Saturday &ndash; Sundays are off days</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Working Hours:</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Morning: </span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">From </span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">07:00 AM to 12:00 PM</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Afternoon:</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> From 01:30 PM to 05:00 PM</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Annual Holidays for LCRC </span></span></span></strong></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">International New Year Day: </span></span></span></strong><strong>&nbsp;</strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">1 January (1 day)</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Chinese New Year Days<span style=\"color:red\"><ins>: </ins></span></span></span></span></strong><strong>&nbsp;</strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">5, 6 &amp; 7 February (3 days)</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Khmer New Year Days<span style=\"color:red\"><ins>: </ins></span>&nbsp;&nbsp;14, 15 &amp;16 April&nbsp; (3 days)</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Pchum Ben Days: </span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​ </span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">27, 28, 29 </span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​ </span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">September (3 days)<span style=\"color:red\"><ins> </ins></span></span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Water Festival Days</span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span></strong><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">: </span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">&nbsp;10, 11 &amp; 12 November (3 days)</span></span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Christmas Days&nbsp; 24 &amp; 25 December (2 days)</span></span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Total: 15 days</span></span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">If you think that your vehicle needs any of our services, please feel free to contact us<span style=\"color:red\"><ins> </ins></span>via the following: </span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Office Address</span></span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">#132 1 Street 430 Tumnop TeukI Chamcarmorn</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Phnom Penh I Cambodia </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Email: </span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">info@lyna-carrental.com</span></span></span>&nbsp; </span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Website: www.Lyna-CarRental.Com</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Tel: +855 12&nbsp; 55 42 47 (Khmer)</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">Tel: +855 12 924 517 (English)</span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n ', 'សេវាអូសសណ្តោង​រថយន្ត​ខូច', '<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">សេវាកម្មអូសសណ្តោងរថយន្តខូចតាមផ្លូវ</span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">លីណា-ជួលរថយន្តទេសចរណ៍មាន​សេវាកម្មអូសសណ្តោងរថយន្តខូចតាមផ្លូវ ទូរទាំង​ប្រទេស​កម្ពុជា​​។ </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">យើង​ខ្ញុំ ​ពិចារណា​ជួយ​ដោះស្រាយ​បញ្ហា​រថយន្តខូច​នៅតំបន់​ដាច់​ស្រយាល​ អតិថិជន​​ទាំង​ឡាយ ដូចជា ក្រុមហ៊ុន​ខ្មែរ ​និង​បរទេស ក្រុមហ៊ុន​ឯកជន ខ្មែរ និង​បរទេស អង្គការមិនមែនរដ្ឋាភិបាល អង្គការអន្តរជាតិ និង​បណ្តា​ទី​ភ្នាក់ងារ​អង្គការ​សហប្រជាជាតិនានានៅកម្ពុជា។&nbsp; </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">ផ្អែក​លើ​បទពីសោធន៍​របស់​ពួក​យើង​កន្លង​មក ម្ចាស់​រថយន្ត​ភាគច្រើន តែងតែសម្រេចចិត្តខុស​ ដោយ​​អនិញ្ញាត្តិឲ្យយានដ្ឋានដែលនៅដាច់ស្រយាល ធ្វើការ​ជួសជុល​រថយន្តរបស់​ខ្លួន &nbsp;គឺ​ជា​កន្លែង​ដែល​គ្មាន​គ្រឿង​បន្លាស់​ និង​គ្រឿង​ឧបករណ៍​គ្រប់​គ្រាន់។&nbsp; ជួនការ​ពួក​គេ​ចំណាយ​ប្រាក់​ ​ពី៥០០​ដុល្លា ទៅ ២០០០​ដុល្លា​ ដើម្បី​ឲ្យ​រថ​យន្ត​របស់​ពួក​គេ​បាន​ជួសជុល​សព្វគ្រប់ ក៏ប៉ុន្តែ​រថយន្ត​នោះ​នៅ​តែ​ដំណើរ​ការ​មិន​ស្រួល​ដដែល។&nbsp; ដើម្បីជាសវាង​បញ្ហានេះ ពួក​យើង​សូម​ផ្តល់​ជា​យោបល់​ថា​ លោក​អ្នក​គួរ​តែប្រើសេវារបស់​យើង​ផ្សេង​ទៀតដែល​ធូរ​ថ្លៃ ​គឺសេវា​សណ្តាងរថយន្ត​ចេញពី​កន្លែង​កើតហេតុ ដោយ​មិនចាំបាច់ទុល​ជួសជុល​នៅទីដាច់​ស្រយាល។ សម្រាប់​​ដំណោះស្រាយនេះគឺ​ត្រូវ​តែអនុវត្ត​តាម​ដំណើរ​ដូច​ខាង​ក្រោម៖ </span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\">១.​ សំណើយក​រថយន្តមួយទៀត ​ពី​ភ្នំពេញមក​ជំនួស។ រីឯថ្លៃ​សេវាប្តូរ​រថយន្ត​វា​ប្រែប្រួលទៅតាម​ចម្ងាយ​ផ្លូវគិតជាគីឡូម៉ែត្រ​ ពីការរិយាល័យនៅភ្នំពេញ​ទៅ​កន្លែង​ដែល​រថយន្ត​ខូច។ ចូរ​មើល​តារាង​លំអិត​ដូច​ខាង​ក្រោម៖</span></span></p>\r\n\r\n<table cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:undefined; width:333px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:white\">លរ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:white\">ទីកន្លែង</span></span></span> </span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:white\">គម</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c00000; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:white\">$</span></span></span></strong></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">1</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ប៉ោយប៉ែត</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">468</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$328 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">2</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">បន្ទាយ​មាន​ជ័យ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">432</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$393 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">3</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">បាត់ដំបង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">291</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$204 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">4</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កំពង់ឆ្នាំង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">92</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$64 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">5</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">អន្លង់វែង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">425</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$298</span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">6</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កំពង់ធំ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">169</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$118 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">7</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កំពង់ចាម</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">124</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$&nbsp;&nbsp; 89 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">8</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">មណ្ឌលគីរី</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">277</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$194 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">9</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">បាវិត</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">162</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$113 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">10</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ព្រៃវែង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">95</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$67 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">11</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ភ្នំដិន</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">120</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$84 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">12</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ជីសូ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">50</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$35 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">13</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កំពត</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">148</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$104 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">1</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ក្រុងព្រះសីហនុ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">227</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$159 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">15</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ពិចនិល</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">90</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$ </span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;63 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\">&nbsp;</p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">6</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កំពង់​ស្ពឺ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">48</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$&nbsp;&nbsp; 34 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">17</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ឧត្តរ​មាន​ជ័យ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\">&nbsp;</p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">69</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$328 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">18</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ស៊ីសុផុន</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">422</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$295 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">19</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ប៉ៃលិន</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">368</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$258 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">20</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ពោធិ៍សាត់</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">153</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$107 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">21</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ឧត្តុង្គ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">43</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$30 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">22</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">សៀមរាប</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">318</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$223 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">23</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ស្គន់</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">78</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$55 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">24</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ក្រចេះ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">262</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\">&nbsp;</p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">$183 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">25</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">រតនៈគីរី</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">531</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$372 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">26</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ស្វាយរៀង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">1</span></span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">4</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$87</span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">27</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">អ្នកលឿង</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">66</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$46 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">28</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">តាកែវ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">90</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$63 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">2</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">បាទី</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">36</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$25 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">30</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">កែប</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">158</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$111 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">32</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">គីរីរម្យ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">114</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$80 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">33</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ព្រះវិហារ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">273</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;$191 </span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#d9d9d9; height:15.0pt; width:35.0pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">34</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#c5d9f1; height:15.0pt; width:106.2pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">វាលរិញ</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#dce6f1; height:15.0pt; width:45.5pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">183</span></span></span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e4dfec; height:15.0pt; width:63.05pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:6.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">$12</span></span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">២. ថ្លៃ​ឈ្នួល​សណ្តោង​ពី​កន្លែង​កើត​ហេតុ​ទៅ​ភ្នំពេញគេ​គិត​ដូច​តទៅ៖</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">១. ចំណាយប្រចាំ​ថ្ងៃ សំរាប់​ជាង ​២​នាក់​ (ទាំង​ទៅ​ទាំង​មក​ក្នុង​ថ្ងៃដដែល)​ គឺ៖ តម្លៃ ២០​ដុល្លា ក្នុង​១​នាក់​ក្នុង​១​ថ្ងៃ</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">២.​ ​ចំណាយ​សំរាប់​ការ​ស្នាក់​នៅរបស់​ក្រុមជាង ២​នាក់​គឺ៖ តម្លៃ ២៥​ដុល្លា​ក្នុង​១នាក់​ក្នុង​១​ថ្ងៃ។</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ថ្ងៃ​ធ្វើការ</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៖ </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ពី​ថ្ងៃ​ចន្ទ ដល់​ថ្ងៃ​សៅរ៍។&nbsp; រាល់ថ្ងៃ​អាទិត្យ​ជា​ថ្ងៃ​សម្រាក។</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ម៉ោង​ធ្វើការ</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៖</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ព្រឹក</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៖ ពី​ម៉ោង​៧</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">:​០០ព្រឹក ដល់​ ម៉ោង​១២:០០​ថ្ងៃត្រង់</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">រសៀល</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៖ ពី​ម៉ោង១</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">:៣០​នាទី ដល់​ម៉ោង​៥:០០​ល្ងាច </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ថ្ងៃ​ឈប់​សំរាក​ប្រចាំ​ឆ្នាំ​របស់​ លីណា-ជួលរថយន្តទេសចរណ៍</span></span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ទិវា​ចូល​ឆ្នាំ​សកល ១​ថ្ងៃ (១ មករា)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ទិវា​ចូល​ឆ្នាំចិន ​៣​ថ្ងៃ (ថ្ងៃ​ទី៥ ៦ និង​៧ កុម្ផៈ)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">&nbsp;ទិវា​ចូល​ឆ្នាំខ្មែរ ​៣​ថ្ងៃ (ថ្ងៃ​ទី១៤&nbsp; ១៥ និង ១៦ មេសា)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ទិវាបុណ្យ​ភ្ជំបិណ្ឌ ៣ថ្ងៃ (២៧&nbsp; ២៨ និង​ ២៩ កញ្ញា)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ទិវា​បុណ្យ​អំទូក ៣​ថ្ងៃ (ថ្ងៃ​ទី​ ១០ ១១ និង​១២ វិច្ឆិកា)</span></span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ទិវាបុណ្យ​ណូអែល ២​ថ្ងៃ (ថ្ងៃទី ២៤ និង ២៥​ ថ្នូ)</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:36pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">សរុប៖​ ១៥​ថ្ងៃ</span></span></span></strong></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ប្រសិន​បើ​លោក​អ្នក​គិត​ថារថយន្ត​របស់​លោក​អ្នក ត្រូវ​ការ​សេវា​ណាមួយ​របស់​យើង​ខ្ញុំ សូម​ទាក់​ទង​មក​កាន់​យើង​ខ្ញុំ​តាម​អាស័យដ្ឋាន​ដូច​ខាង​ក្រោម៖</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">អាស័យដ្ឋាន​ការិយាល័យ</span></span></span></strong><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">៖</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ផ្ទះលេខ</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">១៣២</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ផ្លូវ</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៤៣០</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">សង្កាត់</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ទំនប់</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ទឹក</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ខណ្ឌ</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ចម្ការមន</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ភ្នំពេញ</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">អាស័យដ្ឋាន​អ៊ីមែល</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៖</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​ </span></span></span><span style=\"color:black\"><a href=\"mailto:info@lyna-carrental.com\" style=\"color:blue; text-decoration:underline\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">info@lyna-carrental.com</span></span></span></a></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">វែបសាយ៖</span></span></span> <span style=\"color:black\"><a href=\"http://www.Lyna-CarRental.Com\" style=\"color:blue; text-decoration:underline\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">www.Lyna-CarRental.Com</span></span></span></a></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">លេខ​ទូរស័ព្ទ៖</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​ </span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ខ្សែរទី១៖</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> +</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">១២</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៥៥</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៤២</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​ </span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៤៧</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> (</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">សម្រាប់</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ភាសាខ្មែរ</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">)</span></span></span><br />\r\n<span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer OS Siemreap&quot;\"><span style=\"color:black\">ខ្សែរ​ទី២៖</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">+</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">១២</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៩២</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">៤៥</span></span></span> <span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">១៧</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\"> (</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">សម្រាប់</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">​</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Khmer UI&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">ភាសាអង់គ្លេស</span></span></span><span style=\"font-size:8.0pt\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:black\">)</span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\">&nbsp;</p>\r\n ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_service_img`
--

CREATE TABLE `tbl_our_service_img` (
  `img_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_our_service_img`
--

INSERT INTO `tbl_our_service_img` (`img_id`, `ser_id`, `img_sub`) VALUES
(2, 4, '../image/our_service//1556652589-2. 2AB - 5151-PHP-005.jpg'),
(3, 4, '../image/our_service//1556652593-4. 2AB - 5151-PHP-005.jpg'),
(4, 4, '../image/our_service//1556652597-7. 2AB-5151-PHP-005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner_list`
--

CREATE TABLE `tbl_owner_list` (
  `ow_id` int(11) NOT NULL,
  `ow_name` char(255) NOT NULL,
  `ow_note` text NOT NULL,
  `own_title` varchar(255) NOT NULL,
  `own_card` varchar(255) NOT NULL,
  `hand_phone` varchar(255) NOT NULL,
  `owner_sex` varchar(255) NOT NULL,
  `owner_age` varchar(255) NOT NULL,
  `owner_address` text NOT NULL,
  `owner_nationality` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_organization` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_owner_list`
--

INSERT INTO `tbl_owner_list` (`ow_id`, `ow_name`, `ow_note`, `own_title`, `own_card`, `hand_phone`, `owner_sex`, `owner_age`, `owner_address`, `owner_nationality`, `owner_email`, `owner_organization`) VALUES
(1, 'test owner', 'tt', '', '', '', '', '', '', '', '', ''),
(4, 'nn', 'jj', '', '', '', '', '', '', '', '', ''),
(3, 'tes333', 'uu', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `title`, `images`) VALUES
(2, 'PLATINUM', ''),
(3, 'GOLD', ''),
(4, 'DIAMOND', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_detail`
--

CREATE TABLE `tbl_package_detail` (
  `p_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `qty_posting` int(11) NOT NULL,
  `trial` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `net_pay` decimal(10,2) NOT NULL,
  `package_disc` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package_detail`
--

INSERT INTO `tbl_package_detail` (`p_id`, `package_id`, `member_type`, `qty_posting`, `trial`, `period`, `qty`, `price`, `total`, `discount`, `net_pay`, `package_disc`, `date`, `status`) VALUES
(1, 1, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '<p>new&nbsp;</p>\r\n', '1580808366', 1),
(2, 1, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580808397', 1),
(3, 1, 3, 15, 30, '356', 15, 50.00, 750.00, '20', 600.00, '', '1580808426', 1),
(4, 1, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580808456', 1),
(5, 2, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580808730', 1),
(6, 2, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580808744', 1),
(7, 2, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580808759', 1),
(8, 2, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580808781', 1),
(9, 3, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580808815', 1),
(10, 3, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580808825', 1),
(11, 3, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580808836', 1),
(12, 3, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580808846', 1),
(13, 4, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580808887', 1),
(14, 4, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580808895', 1),
(15, 4, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580808905', 1),
(16, 4, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580808915', 1),
(17, 5, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580808928', 1),
(18, 5, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580808938', 1),
(19, 5, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580808949', 1),
(20, 5, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580808958', 1),
(21, 7, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580809015', 1),
(22, 7, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580809025', 1),
(23, 7, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580809034', 1),
(24, 7, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580809042', 1),
(25, 8, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580809063', 1),
(26, 8, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580809073', 1),
(27, 8, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580809083', 1),
(28, 8, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580809092', 1),
(29, 9, 1, 2, 30, '365', 2, 50.00, 100.00, '10', 90.00, '', '1580809104', 1),
(30, 9, 2, 5, 30, '365', 5, 50.00, 250.00, '15', 212.50, '', '1580809113', 1),
(31, 9, 3, 15, 30, '365', 15, 50.00, 750.00, '20', 600.00, '', '1580809121', 1),
(32, 9, 4, 25, 30, '365', 25, 40.00, 1000.00, '25', 750.00, '', '1580809131', 1),
(33, 10, 1, 20, 30, '365', 20, 50.00, 1000.00, '10', 900.00, '', '1580809184', 1),
(34, 10, 2, 40, 30, '365', 40, 50.00, 2000.00, '15', 1700.00, '', '1580809196', 1),
(35, 10, 3, 60, 30, '365', 60, 50.00, 3000.00, '20', 2400.00, '', '1580809213', 1),
(36, 10, 4, 100, 30, '365', 100, 35.00, 3500.00, '25', 2625.00, '', '1580809231', 1),
(37, 11, 1, 20, 30, '365', 20, 50.00, 1000.00, '10', 900.00, '', '1580809269', 1),
(38, 11, 2, 40, 30, '365', 40, 50.00, 2000.00, '15', 1700.00, '', '1580809292', 1),
(39, 11, 3, 60, 30, '365', 60, 50.00, 3000.00, '20', 2400.00, '', '1580809306', 1),
(40, 11, 4, 100, 30, '365', 100, 35.00, 3500.00, '25', 2625.00, '', '1580809319', 1),
(41, 12, 1, 20, 30, '365', 20, 50.00, 1000.00, '10', 900.00, '', '1580809336', 1),
(42, 12, 2, 40, 30, '365', 40, 50.00, 2000.00, '15', 1700.00, '', '1580809349', 1),
(43, 12, 3, 60, 30, '365', 60, 50.00, 3000.00, '20', 2400.00, '', '1580809359', 1),
(44, 12, 4, 100, 30, '365', 100, 35.00, 3500.00, '25', 2625.00, '', '1580809377', 1),
(45, 13, 1, 20, 30, '365', 20, 50.00, 1000.00, '10', 900.00, '', '1580809389', 1),
(46, 13, 2, 40, 30, '365', 40, 50.00, 2000.00, '15', 1700.00, '', '1580809400', 1),
(47, 13, 3, 60, 30, '365', 60, 50.00, 3000.00, '20', 2400.00, '', '1580809409', 1),
(48, 13, 4, 100, 30, '365', 100, 35.00, 3500.00, '25', 2625.00, '', '1580809419', 1),
(49, 14, 0, 0, 30, '365', 1, 0.00, 0.00, '0', 0.00, '', '1580809478', 1),
(50, 15, 2, 1, 30, '365', 1, 50.00, 50.00, '10', 45.00, '', '1580809493', 1),
(51, 16, 3, 1, 30, '365', 1, 85.00, 85.00, '15', 72.25, '', '1580809508', 1),
(52, 17, 4, 1, 30, '365', 1, 135.00, 135.00, '20', 108.00, '', '1580809522', 1),
(53, 18, 0, 0, 30, '365', 1, 0.00, 0.00, '0', 0.00, '', '1580810296', 1),
(54, 19, 2, 1, 30, '365', 1, 50.00, 50.00, '10', 45.00, '', '1580810313', 1),
(55, 20, 3, 1, 30, '365', 1, 85.00, 85.00, '15', 72.25, '', '1580810324', 1),
(56, 21, 4, 1, 30, '365', 1, 135.00, 135.00, '20', 108.00, '', '1580810333', 1),
(57, 22, 0, 1, 30, '365', 1, 50.00, 50.00, '10', 45.00, '', '1580810370', 1),
(58, 23, 0, 1, 30, '0', 1, 25.00, 25.00, '10', 22.50, '', '1580810387', 1),
(59, 24, 0, 0, 30, '365', 1, 0.00, 0.00, '15', 0.00, '', '1580810394', 1),
(60, 25, 0, 0, 30, '365', 1, 0.00, 0.00, '20', 0.00, '', '1580810400', 1),
(61, 26, 0, 0, 30, '365', 1, 25.00, 25.00, '10', 22.50, '', '1580810521', 1),
(62, 26, 0, 0, 30, '365', 2, 25.00, 50.00, '15', 42.50, '', '1580810540', 1),
(63, 26, 0, 0, 30, '365', 3, 25.00, 75.00, '20', 60.00, '', '1580810553', 1),
(64, 26, 0, 0, 30, '365', 4, 26.00, 104.00, '21', 82.16, '', '1580810575', 1),
(65, 26, 0, 0, 30, '365', 5, 27.00, 135.00, '22', 105.30, '', '1580810588', 1),
(66, 27, 2, 10, 30, '365', 10, 10.00, 100.00, '15', 85.00, '', '1580811240', 1),
(67, 28, 0, 0, 30, '365', 10, 40.00, 400.00, '15', 340.00, '', '1580811256', 1),
(68, 29, 0, 0, 30, '365', 15, 40.00, 600.00, '20', 480.00, '', '1580811269', 1),
(69, 30, 0, 0, 30, '365', 20, 40.00, 800.00, '25', 600.00, '', '1580811285', 1),
(70, 31, 0, 1, 30, '120', 120, 0.50, 60.00, '15', 51.00, '', '1580811319', 1),
(71, 32, 0, 0, 30, '365', 10, 40.00, 400.00, '15', 340.00, '', '1580811330', 1),
(72, 33, 0, 0, 30, '365', 15, 40.00, 600.00, '20', 480.00, '', '1580811338', 1),
(73, 34, 0, 0, 30, '365', 20, 40.00, 800.00, '25', 600.00, '', '1580811347', 1),
(74, 35, 2, 1, 30, '120', 120, 0.50, 60.00, '15', 51.00, '', '1580811373', 1),
(75, 36, 0, 0, 30, '365', 10, 40.00, 400.00, '15', 340.00, '', '1580811381', 1),
(76, 37, 0, 0, 30, '365', 15, 40.00, 600.00, '20', 480.00, '', '1580811389', 1),
(77, 38, 0, 0, 30, '365', 20, 40.00, 800.00, '25', 600.00, '', '1580811399', 1),
(78, 23, 0, 1, 30, '0', 3, 25.00, 75.00, '15', 63.75, '', '1580975912', 1),
(79, 23, 0, 1, 30, '0', 5, 25.00, 125.00, '20', 100.00, '', '1580975944', 1),
(80, 23, 0, 1, 30, '0', 7, 25.00, 175.00, '25', 131.25, '', '1580975989', 1),
(81, 27, 3, 15, 30, '365', 15, 10.00, 150.00, '20', 120.00, '', '1580978485', 1),
(82, 27, 4, 25, 30, '365', 25, 10.00, 250.00, '25', 187.50, '', '1580978522', 1),
(83, 31, 3, 1, 30, '240', 240, 0.50, 120.00, '20', 96.00, '', '1580978685', 1),
(84, 31, 4, 1, 30, '365', 365, 0.50, 182.50, '25', 136.88, '', '1580978719', 1),
(85, 35, 3, 1, 30, '240', 240, 0.50, 120.00, '20', 96.00, '', '1580978793', 1),
(86, 35, 4, 1, 30, '365', 365, 0.50, 182.50, '25', 136.88, '', '1580978814', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_position`
--

CREATE TABLE `tbl_package_position` (
  `p_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `try` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `n_pay` decimal(10,2) NOT NULL,
  `posting_type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_limit` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package_position`
--

INSERT INTO `tbl_package_position` (`p_id`, `package_id`, `level_id`, `position_id`, `try`, `period`, `qty`, `amount`, `n_pay`, `posting_type`, `price`, `discount`, `description`, `post_limit`) VALUES
(1, 1, 1, 1, '120', '45', 0, 0.00, 0.00, 0, '150', '10', '<p>This package will allow you post upto the maximum 5 cars.</p>\r\n', '5'),
(2, 2, 1, 2, '30', 'werwr', 0, 0.00, 0.00, 0, '50', '10', '<p>This package allow you to post upto 8 cars.</p>\r\n', '8'),
(3, 3, 1, 3, '30', 'wer', 0, 0.00, 0.00, 0, '100', '15', '<p>This package allow you to post upto 10 cars.</p>\r\n', '10'),
(4, 4, 1, 4, '30', 'ewr', 0, 0.00, 0.00, 0, '200', '25', '<p>This package allow you to post upto 15 cars.</p>\r\n', '15'),
(5, 1, 2, 1, '22', '22', 0, 0.00, 0.00, 0, '22', '22', '22', ''),
(6, 2, 2, 2, '30', '22', 0, 0.00, 0.00, 0, '35', '10', '<p>22</p>\r\n', ''),
(7, 3, 2, 3, '30', '33', 0, 0.00, 0.00, 0, '75', '10', '<p>33</p>\r\n', ''),
(8, 4, 2, 4, '30', '44', 0, 0.00, 0.00, 0, '150', '10', '<p>44</p>\r\n', ''),
(9, 1, 3, 1, '11', '11', 0, 0.00, 0.00, 0, '12', '0', '<p>11</p>\r\n', '17'),
(10, 2, 3, 2, '30', '22', 0, 0.00, 0.00, 0, '50', '10', '<h2>About us</h2>\r\n\r\n<p>East View maintains thousands of supplier/publisher relationships throughout the world for maps and geospatial data and Russian, Arabic and Chinese-produced social and hard science content. East View manages a data center, library and warehouse in Minneapolis where it hosts and stores dozens of foreign language databases, hundreds of thousands of maps and atlases and millions of geospatial, Russian, Chinese and Arabic metadata records. East View was founded in 1989 and is headquartered in Minneapolis, Minnesota, USA. and is comprised of East View Information Services (www.eastview.com), East View Geospatial (www.geospatial.com) and East View Map Link (www.evmaplink.com). Uncommon Information. Extraordinary Places. East View</p>\r\n', '22'),
(11, 3, 3, 3, '30', '33', 0, 0.00, 0.00, 0, '100', '15', '<p>33</p>\r\n', '17'),
(12, 4, 3, 4, '30', '44', 0, 0.00, 0.00, 0, '200', '25', '<p>444</p>\r\n', '17'),
(13, 1, 4, 1, '11', '11', 0, 0.00, 0.00, 0, '11', '11', '11', ''),
(14, 2, 4, 2, '30', '22', 0, 0.00, 0.00, 0, '50', '10', '<p>22</p>\r\n', '22'),
(15, 3, 4, 3, '30', '33', 0, 0.00, 0.00, 0, '75', '15', '<p>33</p>\r\n', '33'),
(16, 4, 4, 4, '30', '44', 0, 0.00, 0.00, 0, '100', '25', '<p>44</p>\r\n', '4'),
(17, 1, 5, 1, '11', '11', 0, 0.00, 0.00, 0, '11', '11', '11', ''),
(18, 2, 5, 2, '22', '22', 0, 0.00, 0.00, 0, '22', '22', '22', '22'),
(19, 3, 5, 3, '33', '33', 0, 0.00, 0.00, 0, '33', '33', '33', '33'),
(20, 4, 5, 4, '44', '44', 0, 0.00, 0.00, 0, '44', '44', '44', '44'),
(21, 1, 6, 1, '11', '11', 0, 0.00, 0.00, 0, '11', '11', '11', '11'),
(22, 2, 6, 2, '22', '22', 0, 0.00, 0.00, 0, '22', '22', '22', '22'),
(23, 3, 6, 3, '33', '33', 0, 0.00, 0.00, 0, '33', '33', '333', '33'),
(24, 4, 6, 4, '44', '44', 0, 0.00, 0.00, 0, '44', '44', '44', '44'),
(25, 1, 7, 1, '1', '1', 0, 0.00, 0.00, 0, '1', '1', '1', '1'),
(26, 2, 7, 2, '2', '2', 0, 0.00, 0.00, 0, '2', '2', '2', '2'),
(27, 3, 7, 3, '3', '3', 0, 0.00, 0.00, 0, '3', '3', '3', '3'),
(28, 4, 7, 4, '4', '4', 0, 0.00, 0.00, 0, '4', '4', '4', '4'),
(29, 1, 8, 1, '11', '11', 0, 0.00, 0.00, 0, '11', '11', '11', ''),
(30, 2, 8, 2, '30', '2', 0, 0.00, 0.00, 0, '50', '10', '<p>2</p>\r\n', '2'),
(31, 3, 8, 3, '30', '3', 0, 0.00, 0.00, 0, '75', '15', '<p>3</p>\r\n', '3'),
(32, 4, 8, 4, '30', '4', 0, 0.00, 0.00, 0, '100', '25', '<p>4</p>\r\n', '4'),
(33, 1, 9, 1, '1', '1', 0, 0.00, 0.00, 0, '1', '1', '<p>1</p>\r\n', '1'),
(34, 2, 9, 2, '30', '2', 0, 0.00, 0.00, 0, '50', '10', '<p>2</p>\r\n', '2'),
(35, 3, 9, 3, '30', '3', 0, 0.00, 0.00, 0, '75', '15', '<p>3</p>\r\n', '3'),
(36, 4, 9, 4, '30', '4', 0, 0.00, 0.00, 0, '100', '25', '<p>4</p>\r\n', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_allow`
--

CREATE TABLE `tbl_page_allow` (
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_page` varchar(255) DEFAULT NULL,
  `partner_page` varchar(255) DEFAULT NULL,
  `pakage_page` varchar(255) DEFAULT NULL,
  `vendor_page` varchar(255) DEFAULT NULL,
  `customer_page` varchar(255) DEFAULT NULL,
  `qt_page` varchar(255) DEFAULT NULL,
  `agree_page` varchar(255) DEFAULT NULL,
  `rent_planer_page` varchar(255) DEFAULT NULL,
  `account_page` varchar(255) DEFAULT NULL,
  `invoice_page` varchar(255) DEFAULT NULL,
  `report_page` varchar(255) DEFAULT NULL,
  `custom_report_page` varchar(255) DEFAULT NULL,
  `module_user_page` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_page_allow`
--

INSERT INTO `tbl_page_allow` (`page_id`, `user_id`, `home_page`, `partner_page`, `pakage_page`, `vendor_page`, `customer_page`, `qt_page`, `agree_page`, `rent_planer_page`, `account_page`, `invoice_page`, `report_page`, `custom_report_page`, `module_user_page`) VALUES
(2, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner_income_paid_history`
--

CREATE TABLE `tbl_partner_income_paid_history` (
  `p_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `car_income` varchar(255) NOT NULL,
  `richshaw_incom` varchar(255) NOT NULL,
  `tour_guide_income` varchar(255) NOT NULL,
  `driver_income` varchar(255) NOT NULL,
  `free_lancer_income` varchar(255) NOT NULL,
  `dis_income` varchar(255) NOT NULL,
  `dis_total_income` varchar(255) NOT NULL,
  `total_income` varchar(255) NOT NULL,
  `car_ex` varchar(255) NOT NULL,
  `richshaw_ex` varchar(255) NOT NULL,
  `tour_guide_ex` varchar(255) NOT NULL,
  `driver_ex` varchar(255) NOT NULL,
  `free_lancer_ex` varchar(255) NOT NULL,
  `rate_one` varchar(255) NOT NULL,
  `rate_two` varchar(255) NOT NULL,
  `rate_three` varchar(255) NOT NULL,
  `rate_four` varchar(255) NOT NULL,
  `total_ex` varchar(255) NOT NULL,
  `amount_payable` varchar(255) NOT NULL,
  `time_use` varchar(111) NOT NULL,
  `date_paid` date NOT NULL,
  `note` text NOT NULL,
  `pre_by` varchar(255) NOT NULL,
  `app_by` varchar(255) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_partner_income_paid_history`
--

INSERT INTO `tbl_partner_income_paid_history` (`p_id`, `partner_id`, `car_income`, `richshaw_incom`, `tour_guide_income`, `driver_income`, `free_lancer_income`, `dis_income`, `dis_total_income`, `total_income`, `car_ex`, `richshaw_ex`, `tour_guide_ex`, `driver_ex`, `free_lancer_ex`, `rate_one`, `rate_two`, `rate_three`, `rate_four`, `total_ex`, `amount_payable`, `time_use`, `date_paid`, `note`, `pre_by`, `app_by`, `start_date`) VALUES
(1, 27, '500', '500', '500', '500', '500', '4', '100', '2400', '50', '50', '50', '50', '50', '10', '15', '20', '25', '320', '2080', '1', '2019-08-15', 'kk', 'Torn Kemun', 'Savongz', '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petty_cash_deposit`
--

CREATE TABLE `tbl_petty_cash_deposit` (
  `id` int(11) NOT NULL,
  `date_deposit` date NOT NULL,
  `amount_deposit` varchar(255) NOT NULL,
  `de_em_id` int(11) NOT NULL,
  `note_deposit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_petty_cash_deposit`
--

INSERT INTO `tbl_petty_cash_deposit` (`id`, `date_deposit`, `amount_deposit`, `de_em_id`, `note_deposit`) VALUES
(1, '2019-08-01', '500', 40, 'sgrdtrsy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone_line`
--

CREATE TABLE `tbl_phone_line` (
  `id` tinyint(4) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `title` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_phone_line`
--

INSERT INTO `tbl_phone_line` (`id`, `contact_person`, `title`, `tel`, `remark`, `type`) VALUES
(4, 'piseth', 'car rental', '964746466', 'thank you', 4),
(5, 'trading', 'Trading.com', '096444676', 'Trading.com', 4),
(6, 'garage', 'garage', '964746466', 'Garage.com', 3),
(7, 'piseth', 'car rental', '964746466/964746466', 'thank you', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_booking`
--

CREATE TABLE `tbl_pickup_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pick_up_location` int(11) NOT NULL,
  `drop_location` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `departur_date` date NOT NULL,
  `departur_time` varchar(255) NOT NULL,
  `trip_way` varchar(255) NOT NULL,
  `pick_up_map` text NOT NULL,
  `return_map` text NOT NULL,
  `term_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `total_pay` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pickup_booking`
--

INSERT INTO `tbl_pickup_booking` (`booking_id`, `user_id`, `pick_up_location`, `drop_location`, `booking_date`, `departur_date`, `departur_time`, `trip_way`, `pick_up_map`, `return_map`, `term_id`, `transaction_id`, `total_pay`) VALUES
(5, 5, 1, 1, '2019-07-03', '2019-07-10', '', '2', 'dd', 'dd', '1', '20190703859407', '236.811729');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_book_car`
--

CREATE TABLE `tbl_pickup_book_car` (
  `pi_b_car_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pickup_book_car`
--

INSERT INTO `tbl_pickup_book_car` (`pi_b_car_id`, `booking_id`, `car_id`, `price`, `discount`, `vat`) VALUES
(9, 5, 16, '140', '0', '5'),
(8, 5, 15, '77.49', '10', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_drop_off`
--

CREATE TABLE `tbl_pickup_drop_off` (
  `air_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `pro_from_id` int(11) NOT NULL,
  `province_id` varchar(50) DEFAULT NULL,
  `pro_to_id` int(11) DEFAULT NULL,
  `distant` varchar(255) NOT NULL,
  `rate_one` varchar(255) NOT NULL,
  `rate_two` varchar(255) NOT NULL,
  `discount_one` varchar(255) NOT NULL,
  `discount_two` varchar(255) NOT NULL,
  `round_trip` varchar(255) NOT NULL,
  `one_way` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pickup_drop_off`
--

INSERT INTO `tbl_pickup_drop_off` (`air_id`, `car_id`, `vat`, `pro_from_id`, `province_id`, `pro_to_id`, `distant`, `rate_one`, `rate_two`, `discount_one`, `discount_two`, `round_trip`, `one_way`, `note`, `status`) VALUES
(1, 15, '7', 19, NULL, 10, '123', '0.5', '0.7', '10', '10', '77.49', '55.35', '', '1'),
(2, 15, '10', 19, NULL, 13, '120', '0.5', '0.7', '10', '10', '75.6', '54', '', '1'),
(3, 15, '10', 19, NULL, 11, '22', '0.5', '0.7', '0', '10', '13.86', '11', '', '1'),
(4, 15, '10', 10, NULL, 2, '200', '0.5', '0.7', '0', '0', '140', '100', '', '1'),
(5, 16, '10', 10, NULL, 2, '200', '0.5', '0.7', '0', '0', '140', '100', '', '1'),
(6, 16, '10', 10, NULL, 13, '11', '0.5', '0.7', '0', '0', '7.699', '5.5', '', '1'),
(8, 15, '10', 10, NULL, 13, '22', '0.5', '0.7', '0', '0', '15.399', '11', '', '1'),
(9, 16, '10', 19, NULL, 13, '200', '0.5', '0.7', '10', '0', '140', '90', '', '1'),
(10, 19, '10', 10, NULL, 13, '20', '0.5', '0.7', '0', '0', '14', '10', '', '0'),
(11, 16, '5', 19, NULL, 10, '200', '0.5', '0.7', '0', '0', '140', '100', '', '1'),
(12, 19, '0', 19, NULL, 10, '30', '0.5', '0.7', '0', '0', '21', '15', 'kk', '0'),
(13, 20, '0', 3, '2', 3, '', '', '', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posting_package`
--

CREATE TABLE `tbl_posting_package` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `package_name` varchar(555) NOT NULL,
  `package_disc` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_posting_package`
--

INSERT INTO `tbl_posting_package` (`id`, `group_id`, `member_type`, `package_name`, `package_disc`, `status`) VALUES
(1, 1, 1, 'RENT A CAR FOR SELF-DRIVE', '<p>hello</p>\r\n', 1),
(2, 1, 2, 'RENT A CAR WITH DRIVER', '<p>gh</p>\r\n', 1),
(3, 1, 0, 'PICKUP & DROP-OFF', '<p>gh</p>\r\n', 1),
(4, 1, 0, 'AIRPORT TRANSFER', '<p>AIRPORT TRANSFER</p>\r\n', 1),
(5, 1, 0, 'CITY TOUR', '', 1),
(7, 2, 0, 'PICKUP & DROP-OFF', '', 1),
(8, 2, 0, 'AIRPORT TRANSFER', '', 1),
(9, 2, 0, 'CITY TOUR', '', 1),
(10, 3, 0, 'STUDIO ROOM', '', 1),
(11, 3, 0, 'STANDARD ROOM', '', 1),
(12, 3, 0, 'VIP ROOM', '', 1),
(13, 3, 0, 'FAMILY ROOM', '', 1),
(15, 4, 0, 'LANGUAGE 1', '', 1),
(16, 4, 0, 'LANGUAGE 2', '', 1),
(17, 4, 0, 'LANGUAGE 3', '', 1),
(19, 5, 0, 'LANGUAGE 1', '', 1),
(20, 5, 0, 'LANGUAGE 2', '', 1),
(21, 5, 0, 'LANGUAGE 3', '', 1),
(22, 6, 0, 'MEMBERSHIP FEE', '', 1),
(23, 6, 0, 'COUPON CARD BUYING', '', 1),
(27, 7, 0, 'PLACES', '', 1),
(31, 9, 0, 'NO NEED ', '', 1),
(35, 10, 0, 'NO NEED ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pre_info`
--

CREATE TABLE `tbl_pre_info` (
  `pre_id` int(12) NOT NULL,
  `pre_image` text NOT NULL,
  `pre_title` text NOT NULL,
  `pre_title_kh` varchar(255) NOT NULL,
  `pre_detail` text NOT NULL,
  `pre_detail_kh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pre_info`
--

INSERT INTO `tbl_pre_info` (`pre_id`, `pre_image`, `pre_title`, `pre_title_kh`, `pre_detail`, `pre_detail_kh`) VALUES
(26, '20201224_1503.png', 'Why Choose Us?', 'ហេតុអ្វីបានជ្រើសរើសយើង', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">1. Rental Cars Conditions</span></span></strong><strong> </strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">1.1. There are many cars with different prices and models at the customer&rsquo;s choice<span style=\"color:red\"><ins> </ins></span><br />\r\n1.2. With comprehensive Insurance Coverage </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">1.3. The rented car can be driven with Unlimited Mileages ​of distance.&nbsp;</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"color:black; font-family:Calibri,sans-serif; font-size:11pt\">1.4. All parts of the rented car<span style=\"color:red; font-family:Calibri,sans-serif; font-size:11pt\"><ins> </ins></span>are in a very good condition, in terms of: air conditioning system, sound system, tires, Battery and engine performance and the risk of car damage on the way has been strongly minimized and prevented.</span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">1.5. Both the Interior &amp; Exterior&nbsp; of the car are nice, neaty &amp; clean</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">1.6. Regular car inspection and&nbsp;&nbsp;maintenance. </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">1.7. Full legal papers and support documents</span> </span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">2. Customer&rsquo;s Opportunity &amp; Benefits</span></span></strong><strong> </strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">2.1. We are the first to ever provide car rental service for self drive or with English-spoken driver in Cambodia </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">2.2. Each of our cars can be taken from any location to any location around the Kingdom of Cambodia </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">2.3. With our economical cars our customers can reach all the interesting places around Cambodia </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">2.4. The customer will be provided with privacy, peace and enjoyment </span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">3. Driver&#39;s Behavior, Qualification &amp; Experience</span></span></strong> </span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"color:black\">3.1. Ability to communicate with the foreign customers in English</span></span><br />\r\n<span style=\"font-size:10.5pt\"><span style=\"color:black\">3.2. Ability to drive long distance, and being aware of all the interesting places/resorts in Cambodia. &nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"color:black\">3.3. Responsible and persistent driving</span></span><br />\r\n<span style=\"font-size:10.5pt\"><span style=\"color:black\">3.4. Professional, friendly&nbsp;and helpful driving </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:black\">4. Easy Communication</span></span></strong><strong> </strong></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.5pt\"><span style=\"color:black\">The car owners and all ranks of employees are friendly&nbsp; and easy to communicate with and quickly responsive to the customer. </span></span></span></span></p>\r\n ', '<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">១. លក្ខណៈនៃរថយន្ត​ជួល</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.១. មាន​រថយន្ត​ជា​ច្រើន​ដែល​មាន​តម្លៃ និង​ម៉ូត​ខុសៗ​គ្នា​សំរាប់​អតិថិជន​ធ្វើ​ការ​ជ្រើស​រើស</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.២.​មាន​ការ​ធានារ៉ាប់រង​ពេញលេញ</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.៣.​បើកបរ​រថយន្ត​ជួល​ដោយ​មិនមានការ​កំណត់​ចម្ងាយផ្លុវ</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">​​១.៤.គ្រឿងនៅក្នុង​រថយន្ត​ជួល​សុទ្ធ​តែ​មាន​គុណភាព​ល្អ​បំផុត ដូច​ជា​ប្រព័ន្ធ​ម៉ាស៊ីន​ត្រជាក់​ សំបង​កៅស៊ូកង់ អាគុយ និង​ដំណើរ​ការ​ម៉ាស៊ីន។ ម៉្យាងទៀតមាន​ការកាត់​បន្ថយ និង​ការពារយ៉ាង​ហ្មត់ចត់មិនឲ្យមាន​ការ​ខូចរថយន្តនៅតាមផ្លូវដាច់ខាត។</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.៥.​ប៉ែក​ខាង​ក្រៅ​ក្តី ប៉ែក​ខាង​ក្នុង​ក្តី​សុទ្ធតែ​ល្អ មានរបៀបនិង​ស្អាតទាំង​អស់</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.៦. មាន​ការ​ថែទាំ ត្រួត​ពិនិត្យ និងថែទាំ​​ជា​ប្រចាំ</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:black\">១.៧. មាន​ឯកសារ​ច្បាប់ និង​ឯកសារ​ភ្ជាប់ ពេញលេញេ</span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">២. ឱកាស និង​ផល​ប្រយោជន៍​របស់​អតិថិជន</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">២.១. យើង​គឺ​ជា​អ្នក​ផ្តល់​សេវាកម្ម ជួល​រថ​យន្តមុនគេ​ដែល​ពី​មុន​មក​នៅ​កម្ពុជាមិន​ធ្លាប់​មាន​ គឺ ជួល​ដើម្បី​បើកបរ​ដោយ​ខ្លួន​ឯង ឬ ជួល​ដោយ​មាន​អ្នក​បើក​បរ​ចេះ​និយាយ​ភាសាអង់គ្លេស។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">២.២. រថយន្ត​របស់​យើង​នីមួយៗ អាច​យកពី​កន្លែង​ណា​ក៏បាន​ហើយទៅកន្លែងណាក៏បានឲ្យ​តែ​នៅ​ក្នុងព្រះរាជាណាចក្រ​កម្ពុជា</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">២.៣. ដោយ​សារ​តែ​រថន្ត​របស់​យើង​មាន​លក្ខណៈ​​​សន្សំសំចៃ ទើប​អតិថិជន​របស់​យើង​អាច​ទៅ​ដល់​ទីកន្លែងគួរ​ឲ្យ​ចាប់​អារម្មណ៍​ជា​ច្រើននៅ​ជុំវិញ​ប្រទេស​កម្ពុជា។</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">២.៤. អតិថិជន​របស់​យើង នឹង​បាន​ទទួល​នួវ​បរិយាកាស​ឯករាជ្យ ភាព​សុខសាន្ត និង​ភាពរីករាយ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៣. គុណភាព សមត្ថភាព និង​បទ​ពិសោធន៍​របស់​​អ្នកបើកបរ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៣.១. មាន​សមត្ថភាពក្នុង​ការ​ទំនាក់ទំនងជាភាសាអង់គ្លេស​ជាមួយ​អតិថិជន​បរទេស</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៣.២. មាន​សមត្ថភាពក្នុង​ការ​បើកបរ​ទៅកាន់​ទី​ឆ្ងាយ ហើយ​ដឹង​ច្បាស់​អំពី​ទី​កន្លែង​ឬ​ទីកំសាន្ត​សំខាន់ៗ ទាំង​អស់​នៅក្នុង​ប្រទេស​កម្ពុជា</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៣.៣. ការ​បើកបរមាន​ការ​ព្យាយាម និង​ការ​ទទួល​ខុស​ត្រូវ</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៣.៤. ការ​បើកបរមាន​លក្ខណៈអាជីព មាន​ភាព​ភាព​រួសរាយ និងអាច​ពឹង​ពាក់​បាន</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18.1pt; margin-right:0cm\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">៤. ភាព​ងាយ​ស្រួល​ក្នុង​ការ​ទំនាក់ទំនង</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"color:black\">ម្ចាស់​រថយន្ត ព្រមទាំង​បុគ្គលិក​គ្រប់​ជាន់​ថ្នាក់​ទាំង​អស់​សុទ្ធតែ​ងាយ​ស្រួល​ក្នុង​ការ​ទំនាក់ទំនង ដោយ​មាន​ភាព​រួសរាយ​រាក់​ទាក់​ និង​ដោះស្រាយ​បញ្ហា​បានភ្លាមៗ​ជូន​អតិថិជន។</span></span></p>\r\n '),
(27, '20201224_2046.png', 'Car Rental With Driver', 'ជួលរថយន្តជាមួយអ្នកបើកបរ', '<h6>VEHICLE RENTAL &ndash; TERMS &amp; CONDITIONS WITH DRIVER</h6>\r\n\r\n<p><strong>VEHICLE RENTAL &ndash; TERMS &amp; CONDITIONS</strong></p>\r\n\r\n<p><span style=\"color:#ec3323\"><strong>WITH DRIVER</strong></span></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;1. Driver&rsquo;s Working Days and Hours</strong></p>\r\n\r\n<p>1.1.&nbsp;<strong>Working Days</strong>: Monday to Saturday,&nbsp;<strong>Working Hours</strong>: From 0730 to 1200 and from 1330 to 1800. The break of 1 hour and 30 minutes is for lunch.</p>\r\n\r\n<p>1.2. The driver&rsquo;s working hours are exceptional for the driver of the tourist travelling from one province to another. In case of driving on&nbsp;<strong>Sunday</strong>&nbsp;or any&nbsp;<strong>Public Holiday,&nbsp;</strong>the customer will have to pay extra fee of $30/day as mentioned in the vehicle rental agreement.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;2. Sunday/Public Holiday Driving</strong></p>\r\n\r\n<p>If the customer requires the driver to work on&nbsp;<strong>Sunday/Public Holiday</strong>, he/she will need to pay an extra daily rental fee of US$30 in addition to the daily rental fee.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;3.&nbsp;</strong><strong>Overtime Rate (OT)</strong></p>\r\n\r\n<p>Overtime payment of US$5 per hour will be applicable before 07:30 or after 18:00. It is payable to the owner with the second invoice of the daily/monthly driver&rsquo;s hiring fee issued by the owner.</p>\r\n\r\n<p><strong>4.&nbsp;</strong><strong>Driver&rsquo;s Daily or Monthly Rental Rates</strong></p>\r\n\r\n<p>4.1.&nbsp;<strong>Daily Driving Service Rates</strong>: It ranges between $30 and $35 per day depending on the driver&rsquo;s qualification and experience. They are mentioned in the price list posted on the website. The price includes the driver&rsquo;s daily meal and accommodation when the driver fulfills his duty outside the normal stations.</p>\r\n\r\n<p>4.2.&nbsp;<strong>Monthly Driving Service Rates</strong>: It ranges between $250 and $350 per month depending on the driver&rsquo;s qualification and experience. They are also mentioned in the price list posted on the website. The price includes the driver&rsquo;s daily meal and accommodation when the driver fulfills his duty outside the normal stations.</p>\r\n\r\n<p><strong>&nbsp; &nbsp;5. Overnight Stay Rate in The Province</strong></p>\r\n\r\n<p>The customer will pay extra Daily Subsistence Allowance (DSA) at the rate of US$30/night for the driver and payable to the owner prior to the departure, and the fee for the extended stay shall be paid with the next invoice on the arrival. This article is applicable to both the daily and monthly customer.</p>\r\n\r\n<p><strong>&nbsp; 6. National Public Holidays For The Driver:</strong></p>\r\n\r\n<p>There are 12 National Public Holidays during a whole year. If the customer wishes to use the driving service during the holidays the customer will be required to pay more $30 per day:</p>\r\n\r\n<p>6.1. International New Year Day - January 1 (1 day)</p>\r\n\r\n<p>6.2. Cambodian New Year Days - April 13 | 14 | 15 (3 days)</p>\r\n\r\n<p>6.3. National Pchum Ben Days - September . . . (3 days)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;6.4. Water Festival Days - November . . . (3 days)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;6.5.&nbsp;Christmas Days - December 24 - 25 (2 days)</p>\r\n\r\n<ol start=\"7\">\r\n	<li><span style=\"color:#ec3323\"><strong>Refundable Deposit</strong></span></li>\r\n</ol>\r\n\r\n<p>The Refundable Deposit (RD) is a security deposit to deal with any breach of the rental agreement. When all of the obligations of customer under the rental agreement are fully accomplished, the security deposit shall be returned to the customer, if no any breach of rental agreement.</p>\r\n\r\n<ol start=\"8\">\r\n	<li><span style=\"color:#ec3323\"><strong>Payment Procedure</strong></span></li>\r\n	<li>\r\n	<ol>\r\n		<li>The customer can pay via cash/check/credit/master card to Tan Lyna (Ms), the business owner of Lyna-CarRental.</li>\r\n	</ol>\r\n	</li>\r\n	<li>\r\n	<ol start=\"2\">\r\n		<li>For daily or monthly rental, the customer is required to pay in advance the rental fee in full amount plus refundable deposit and surcharge, if any. For the payment delay, the customer shall bear the extra payment of 17% over the total payment.</li>\r\n		<li>In case of monthly rental extension to two months or more, the customer is required to pay in advance for the next rental fee in full amount and surcharge, if any, on the same day of the initial Vehicle Rental Agreement signature. For the payment delay, the customer shall bear the extra payment of 17% over the total payment.</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol start=\"9\">\r\n	<li><span style=\"color:#ec3323\"><strong>Dangerous Places, Situation Or Very Bad Road Condition</strong></span></li>\r\n	<li>\r\n	<ol>\r\n		<li>Lyna-CarRental&rsquo;s Team and its driver reserve the rights to refuse to travel in the dangerous places or along very bad condition road. If the customer still wants to go there, the customer shall take his/her own risk and agree to be responsible to cover all the expenses for the damages caused by the unforeseen accident.</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol start=\"10\">\r\n	<li><span style=\"color:#ec3323\"><strong>Unlimited Mileages</strong></span></li>\r\n</ol>\r\n\r\n<p>Lyna-CarRental is hiring out a vehicle with Unlimited Mileages, with most of the vehicles being initially in full tank. Therefore, the customer shall refill it upon returning the rented vehicle with the same level of fuel.</p>\r\n\r\n<ol start=\"11\">\r\n	<li><strong>Fuel Grade And Filling Stations Recommendations</strong></li>\r\n</ol>\r\n\r\n<p>We strongly recommend the use of premium grade (95 grade or Super) and the use of only the recognized brands of fuel such as: PTT, CALTEX, and TOTAL and lubricant for the rented vehicle.</p>\r\n\r\n<ol start=\"12\">\r\n	<li><span style=\"color:#ec3323\"><strong>Share Of Responsibilities For Maintenance And Repair</strong></span></li>\r\n	<li>&nbsp; 12.1.&nbsp;<strong>Maintenance and Repair:</strong>&nbsp;&ndash; Free of Charge!</li>\r\n	<li>&nbsp; 12.2.<strong>Other Vehicle Maintenance Services</strong>: Each service includes replacement of lubricant, oil filter, air filter, fuel filter and labor charges will be paid by the owner, and the service must be done in Phnom Penh only. Any extra charges which are not included in the maintenance service list will be paid by the customer.</li>\r\n	<li>&nbsp; 12.3.&nbsp;If the vehicle can&rsquo;t come to get the service at Lyna-Garage in Phnom Penh, the owner will provide the service of the maintenance at the site, but the customer shall pay for the transfer fee of vehicle replacement including the daily mechanic&rsquo;s fee, and the fees of other services such as fuel, food, accommodation, overtime, and round-trip transport .</li>\r\n	<li>&nbsp; 12.4.&nbsp;<strong>Vehicle Damage:</strong>&nbsp;In case of rented vehicle driven by an English-spoken driver, the owner will be responsible for the vehicle damage and all the related costs.&nbsp; &nbsp;&nbsp;</li>\r\n	<li>&nbsp; 12.5.&nbsp;<strong>Compensation Deduction During Accident</strong>: It is under the owner&rsquo;s responsibility.</li>\r\n	<li>&nbsp; 12.6.&nbsp;The customer&rsquo;s responsibility is nothing, except paying for the fuel of the hired vehicle.</li>\r\n	<li>&nbsp; 12.7.&nbsp;<strong>Maintenance and Repair:</strong>&nbsp;All types of maintenance and repair services are under the owner&rsquo;s responsibility!</li>\r\n	<li>&nbsp; 12.8.&nbsp;The owner observes the rights at any case to carry out inspection of the rented vehicle. In case of actual of negligence or abuse from part of the customer, the owner has the rights to terminate the rental agreement, and all the related cost must be paid by the customer.</li>\r\n	<li>&nbsp; 12.9.&nbsp;The owner reserves the rights to take the vehicles back at any time if the customer fails to perform the obligations as stated in the Terms and Conditions of Vehicle Rental Agreement.</li>\r\n	<li>&nbsp; &nbsp;12.10.&nbsp;In case of rented vehicle damage all related costs must be paid by the owner, but the customer must let the owner to deal with it.&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</li>\r\n	<li>13.&nbsp;<strong>Vehicle Rental Extension</strong></li>\r\n	<li>On completion of the Vehicle Rental Agreement, if the customer does not return the rented vehicle, the Vehicle Rental Agreement will be automatically extended on daily basis. The vehicle rental fee will be based on the standardized rental market price, or by the price imposed by the owner. It will continue until the vehicle is returned to the owner</li>\r\n	<li>14.&nbsp;<strong>Insurance Coverage</strong>\r\n	<ol>\r\n		<li>14.1.&nbsp;The vehicle rental shall be in compliance with full insurance coverage options such as:</li>\r\n	</ol>\r\n	</li>\r\n	<li>\r\n	<ol>\r\n		<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;14.1.1.&nbsp;Third Party Liability (TPL),\r\n		<ol>\r\n			<li>14.1.2.&nbsp;Passenger Liability (LP),</li>\r\n			<li>14.1.3.Own Damage (OD),</li>\r\n			<li>14.1.4.Accident to the Driver, and</li>\r\n			<li>14.1.5.Theft or Robbery.</li>\r\n		</ol>\r\n		</li>\r\n	</ol>\r\n	</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;14.2.&nbsp;The owner will cover all expenses for the accident deduction/excess claims such as: 1. Third Party Liability (TPL), 2. Passenger Liability (LP), 3. Own Damage (OD), 4.&nbsp; Accident to the Driver, and 5. Theft or Robbery</li>\r\n	<li>15.&nbsp;<strong>Vehicle Rental Agreement Termination</strong>\r\n	<ol>\r\n		<li>15.1.&nbsp;The owner has the rights to terminate the lease, if the customer breaches of Vehicle Rental Agreement. The owner shall notify the customer in written form.</li>\r\n		<li>15.2.&nbsp;In case of vehicle rental agreement breaches or late payment, there will be a penalty of 17% over the total payment.</li>\r\n		<li>15.3.&nbsp;The owner has the rights to end the vehicle rental agreement without any delay, if the customer seriously breaches this agreement. The owner reserves the rights to claim remedies or file a complaint to the court in accordance with the law of the Kingdom of Cambodia. The owner can repossess the vehicle and requires the customer&rsquo;s compensation, and the customer has no rights to ask for the compensation.</li>\r\n	</ol>\r\n	16.&nbsp;<strong>Valuable Added Tax (VAT)</strong></li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;16.1.&nbsp;The customer will pay Value Added Tax and all other taxes, if any, and payable in accordance with the invoice or the charge list.</li>\r\n	<li>17.&nbsp;<strong>Extra Costs</strong></li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 17.1.&nbsp;The customer shall pay for the costs of ferry crossing fee, airport parking fee, tolls fee and minor repair cost such as: adding air to the tires, fixing flat tires, changing engine oil at every 3,000km or 2,000 miles, changing of oil filter at every 6,000km or 4,000 miles, replacing bulb, refilling air-con refrigerant, wheels alignment or balancing and cleanliness of the vehicle.</li>\r\n	<li>18.&nbsp;<strong>Use Of The Vehicle</strong></li>\r\n	<li><strong>&nbsp;&nbsp;</strong><strong>The Rented Vehicle Must Not Be Used:</strong></li>\r\n	<li><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 19.1.</strong><strong>&nbsp;</strong>By anyone else than the assigned customer or any other driver named on page 1;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;19.2.&nbsp;By anyone else without holding a valid Cambodian Driver&rsquo;s or International Driver&rsquo;s Licenses of all types or anyone under 18 years old;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;19.3.&nbsp;By someone else who need to extend hiring or rewarding;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;19.4.&nbsp;For any illegal purpose;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;19.5.&nbsp;For racing, pace-making, speed testing or teaching someone for a drive;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 19.6.&nbsp;For drunk driver or driver addicted with drugs;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 19.7.&nbsp;For driving outside the Kingdom of Cambodia without the &nbsp;permission of the owner;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;19.8.In overloading passengers;</li>\r\n	<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;19.9.&nbsp;In propelling or towing any other vehicle or trailer;</li>\r\n	<li>\r\n	<p>THANK YOU FOR YOUR COOPERATION AND CHOOSING OUR SERVICES!</p>\r\n\r\n	<p>With Best Luck And A Wonderful Trip In Cambodia!</p>\r\n	</li>\r\n	<li>\r\n	<p><span style=\"color:#ec3323\"><strong>Prohibitions:</strong></span></p>\r\n	1. No load of durian is allowed or else the fine of US$100 will be imposed.</li>\r\n	<li>2. No smoking is allowed or else the fine of US$100 will be imposed.</li>\r\n	<li>3. No load of seafood is allowed or else the fine of US$100 will be imposed.</li>\r\n	<li>4. No opening the windows while driving on the dusty road or else the fine of US$100 will be imposed.</li>\r\n	<li>5. No loss of the key in the contrary there will be a fine of USD80 including remote controller re-installation</li>\r\n	<li>\r\n	<p><span style=\"color:#ec3323\"><strong>OFFICE HOURS:</strong></span></p>\r\n	</li>\r\n	<li>\r\n	<p>Weekday: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monday &ndash; Saturday</p>\r\n\r\n	<p>Weekend: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sunday is closed</p>\r\n\r\n	<p>Office Working Hours: 0800 - 1700</p>\r\n	</li>\r\n</ol>\r\n ', ' '),
(28, '20201224_8924.png', 'Car Rental For Self-Drive', 'ជួលរថយន្តបើកបរខ្លួនឯង', '<p><span style=\"color:#ec3323\"><strong>RENT A CAR FOR A SELF-DRIVE [RISK, SAVE AND REQUIREMENT]</strong></span></p>\r\n\r\n<p><strong>1. FOREIGN CUSTOMERS WITH THEIR CAMBODIAN OR INTERNATIONAL DRIVER\'S LICENSES</strong><br />\r\nIn this case, the customers must present their Driver’s Licenses as a proof to our Lyna-CarRental front-desk on the arrival.</p>\r\n\r\n<p><strong>2. CONDITIONS IMPOSED TO THE CUTOMERS WHEN HIRING A CAR FOR A SELF-DRIVE</strong><br />\r\nThe customers need to leave their valid passport with the valid entry business visa at the Lyna-CarRental’s office in exchange of taking out the rented car for securing our car in case it will be lost during the renting period. This is required by the insurance company.</p>\r\n\r\n<p><strong>3. REFUNDABLE DEPOSIT FOR THE SELF-DRIVE CUSTOMERS</strong><br />\r\nThe Refundable Deposit (RD) amount is between $500.00 to $1,000.00 according to the years and models of the vehicles with the deposit of a valid passport.</p>\r\n\r\n<p><strong>4. CAR DAMAGE AND RESCUE</strong><br />\r\nThe car damage within the coverage areas of 50km limitation from Phnom Penh radius, the rescue is free of charge. Beyond the 50km away from Phnom Penh radius, the customer will be responsible to pay for fixing and payment for all the related costs. In the contrary, if the customer does not want to get it repaired at the spot, the customer can get it towed to Phnom Penh. In this case, the customer will pay only for the towing fee whereas the owner will have to be responsible for getting it repaired or restored.</p>\r\n\r\n<p><strong>5. CAMBODIAN DRIVER\'S LICENSE FOR E-VISA OR TOURIST VISA</strong><br />\r\ne-Visa or Tourist Visa cannot have access to Cambodian Driver\'s License. In this case, the customer cannot rent a car for his/her self-drive within insurance coverage. Please always ask for the Business Visa on the arrival at the airport\'s checkpoint or at any land checkpoint at the border. The Business Visa costs just $5.00 different from e-Visa or Tourist Visa. The customer must always ask for Business Visa, because the customer never knows what will happen, and the customer will be recommended to delay the trip and to stay more than one month in Cambodia. In another case, the customer can also ask to extend the Business Visa for one month or one year more for staying or looking for a job in Cambodia.</p>\r\n\r\n<p><strong>6.<span style=\"color:#ec3323\"> </span>INTERNATIONAL DRIVER\'S LICENSE</strong> <br />\r\nAs there are many types of International Driver\'s Licenses, Lyna-CarRental Management Team takes two of them for consideration:</p>\r\n\r\n<p>    6.1. Convention On Road Traffic Dated 8 November 1968</p>\r\n\r\n<p>This convention is not acceptable for the Royal Government of Cambodia as it did not mention the names of the countries which allow the holder of this driver’s license to drive a car in Cambodia.<br />\r\n<br />\r\nIn the case that the bearer had this one on hand, and then would like to drive a car in Cambodia, the bearer may have to take a car for a self-drive at his/her own risk and without insurance coverage.</p>\r\n\r\n<p>    6.2. Convention On Road Traffic Dated 19 September 1949</p>\r\n\r\n<p>This convention is acceptable for the Royal Government of Cambodia as it mentions the name of the countries which allow the holder of this driver’s license to drive a car in Cambodia.<br />\r\nIf the holder would like to do a self-drive, please take this one from your country. It is very useful in Cambodia for a self-drive as it is inside the insurance coverage.</p>\r\n\r\n<p><strong>7.<span style=\"color:#ec3323\"> </span>FUEL</strong></p>\r\n\r\n<p>    7.1 The quoted prices shown on the internet did not include fuel – Firstly, Lyna-CarRental Management Team supplies the customer with full tank of fuel.<br />\r\n    7.2 The customer will load it in tank when necessary. On the last day of the service, the customer is required to refill the full tank.<br />\r\n    7.3 Unlimited Mileages: Locations and destinations do not matter. The customer may go as far as he/she likes.<br />\r\n    7.4 Petrol: The grade must be 95 (Super, Gold or Excellium) as recommended by the respective stations such as PTT, CALTEX, and TOTAL, and must not be of other grades sold elsewhere.<br />\r\n    7.5 Diesel: The customer can buy it from any station except the one loaded in bottle or can sold elsewhere.</p>\r\n\r\n<p><strong>8. PAYMENT PROCEDURE</strong></p>\r\n\r\n<p>    8.1  The customer can pay via cash/check/credit/master card to Tan Lyna (Ms), the business owner of Lyna-CarRental.<br />\r\n    8.2  For daily or monthly rental, the customer is required to pay in advance the rental fee in full amount plus refundable deposit and surcharge, if any. For the payment delay, the customer shall bear the extra payment of 17% over the total payment.<br />\r\n    8.3  In case of monthly rental extension or the rental of more than one month, the customer is required to pay in advance again for the next rental fee in full amount and surcharge, if any, on the same day of the initial Vehicle Rental Agreement signature. For the payment delay, the customer shall bear the extra payment of 17% over the total payment.</p>\r\n\r\n<p><strong>9. TERMS AND CONIDTIONS</strong></p>\r\n\r\n<p>    9.1. The supplied vehicle shall be in good condition, with a full tank of fuel, equipped with spare wheel, lifting jack, tools and wheel spanner. The customer shall return the vehicle with the same level of fuel and the same condition as it was. We strongly recommend the mere use of premium recognized brand of fuel and lubricants<br />\r\n    9.2. The customer shall pay USD1,000.00 to the owner as a down payment as a security deposit (Refundable Deposit) for either daily or monthly rental fee before the delivery of vehicle(s) by cash or by Credit Cards (Visa, Western Union, and/or ACLEDA Unity) at Lyna-CarRental Office for the car reservation. The security deposit is intended for preventing any breach against the rental agreement. When all obligations of customer under the rental agreement are completely performed, the security deposit shall be returned to customer in 100 per cent, if no any breach against of the rental agreement is committed<br />\r\n    9.3. The Lyna-CarRental coverage areas are about 50Km from Phnom Penh.<br />\r\n    9.4.  All vehicles shall be insured by the insurance company in Cambodia only for comprehensive insurance coverage which includes:</p>\r\n\r\n<p>        9.4.1. Third Party Liability (TPL)<br />\r\n        9.4.2. Own Damage (OD),<br />\r\n        9.4.3. Theft<br />\r\n        9.4.4. Passenger Liability (PL), and<br />\r\n        9.4.5. Accident to the Driver (AD)</p>\r\n\r\n<p>    9.5. An insurance excess/deductible is between US$50.00 to US$100.00 per case of accident.<br />\r\n    9.6. In case of vehicle loss or stolen, the customer shall pay an additional 20% of the vehicle insurance cost.<br />\r\n    9.7. When the rented vehicle is damaged within the coverage areas of 50km from Phnom Penh radius, Lyna-CarRental shall replace it with another one of the same rental fee without extra charge.<br />\r\n    9.8. In the event that the rented vehicle is damaged by traffic accident or unintentional damage beyond the Lyna-CarRental coverage area, a car replacement fee shall be paid with the amount of USD0.7 per kilometer according to the distance in kilometer indicated by the mileage counter.</p>\r\n\r\n<p>10. The customer shall pay for the repair fee set by the owner if the damage or loss of any car parts is caused by the customer’s mistakes/guilts in the areas which are not covered by the insurance company.<br />\r\n11. Any car parts loss which is not included in the insurance policy will be covered by the customer. The customer shall pay the owner on the excessive loss within 5-working days, and the late payment shall be charged at 17% of the total annual payment.<br />\r\n12. During the rental period, the rented car shall be maintained and inspected at the garage assigned by the owner at least once a month for general checkup and necessary repair or replacement.<br />\r\n13. Customer shall use and operate the rented vehicle only in his/her normal business operation, namely within the loading capacity of the vehicle, and in accordance with governmental traffic laws and regulations.<br />\r\n14. The rented vehicles shall be used only by skilled drivers, in accordance with the manufacturer’s operating instructions without abuse whereas the customer shall not make any modification, alteration or addition to the vehicles without the written consent expressed by the owner.<br />\r\n15. Customer shall be responsible for the expense to maintain the vehicles in good operating condition on both motor and appearance. The customer shall take into account the normal wear and tear of the vehicle which is under the customer’s control. The customer shall be cautious to prevent damage, injury or theft with regard to the vehicles.<br />\r\n16. The owner observes the rights at any case to carry out inspection of the rented vehicle. In case of actual of negligent or abuse from part of the customer, the owner has the rights to terminate the rental agreement, and all the related cost must be paid by customer.<br />\r\n17. At the end of the daily vehicle using, the vehicle must be parked at the customer’s parking lot. This location shall not be changed without prior notification to the owner.<br />\r\n18. Both delivery and return time of the rented vehicle shall be accepted by the owner. The customer shall bear the entire risk of loss, damage, theft, robbery and destruction of the vehicles. No loss, damage, theft or destruction of the vehicles shall ever relieve the customer’s obligations in accordance with the rental agreement. The customer shall promptly notify the owner in written form on any loss, damage, theft, robbery or destruction of the vehicle.<br />\r\n19. According to the terms and conditions of the vehicle rental agreement, the rented vehicles, shall remain in the possession and under the control of the customer, and shall not be sublet to or reused by any third party. Meanwhile, the rights and obligations of the customer under the rental agreement shall not be assigned to anyone else.<br />\r\n20. The customer shall indemnify and hold the owner harmless from any liability, loss, injury, damage, cost and expense (including all taxes, duties, registrations, tickets, registration fees, and attorney’s fees) of any kind whatsoever arising in connection with the vehicles. This indemnity shall not be affected by reason of the termination of the rental agreement.<br />\r\n21. The customer is prohibited to take out a rented car to another country without any owner\'s authorization.<br />\r\n22. Using the rented vehicle for unlawful purposes is strictly prohibited by Lyna-CarRental, and the customer shall be liable to all charges in accordance with the law of the Royal Government of Cambodian.<br />\r\n23. The owner reserves the rights to take the rented vehicles back at any time if the customer fails to perform his/her obligations or the terms and conditions of the vehicle rental agreement.<br />\r\n24. The guarantor (if any) shall be in compliance with the terms and conditions of the vehicle rental agreement in case any problem caused by the customer.<br />\r\n25. Upon completion of the rental term, if the customer fails to return the rented vehicles, the vehicle rental agreement will automatically be renewed on daily basis. The daily rate will be accordingly based on the rental type as mentioned in the vehicle rental agreement or as determined by the owner. This is applicable until the rental vehicle is returned to owner.<br />\r\n26. PROHIBITION: No smoke and no transportation of seafood, and durian in the rented vehicle are allowed. No vehicle window opening is allowed while driving on the dusty/bad smell road. Otherwise, the customer will be fined by the vehicle owner.</p>\r\n\r\n<p><span style=\"color:#ec3323\"><strong>SPECIAL NOTICES</strong></span></p>\r\n\r\n<p>No Durian allowed. US$100.00 will be imposed.<br />\r\nNo Smoking allowed. US$100.00 will be imposed.<br />\r\nNo Seafood allowed. US$100.00 will be imposed.<br />\r\nNo Open the windows while driving on the dusty road. US$100.00 will be imposed.<br />\r\nLoss of key – USD80.00 including remote controller re-installation</p>\r\n\r\n<p><span style=\"color:#ec3323\"><strong>OFFICE HOURS</strong></span><br />\r\nWeekday: Monday – Saturday<br />\r\nWeekend: Sunday is closed<br />\r\nWorking Hours: 08h00 - 17h00</p>\r\n  ', '  '),
(29, '20201224_1141.png', 'Driver Activities ', 'សកម្មភាពអ្នកបើកបររថយន្ត', '<p><img alt=\" 28 February 2017  28 February 2017, Kampong Cham Province . . . Lyna-CarRental.Com is the first supplier of supplying the fleets of Vehicles Rental with and English speaking drivers for the sub-contract agreement of Metro Global Services Pte Ltd., from Singapore to do the Signal Survey Project for NOKIA (Cambodia) Co., Ltd. on 3-monthagreements to cover all around the 25 provinces and municipalities in the Kingdom of Cambodia.Mr Makara Ben is one of our pleasant lokking and an English speaking drivers who is now working with an Indian Team and one-to-one customer.In Kampong Cham starting from the 10th of February, 2017 till now, we are deploying 3 cars and 3 drivers.Two cars and Drivers in Sihanouk Ville and 1 car plus driver in Phnom Penh.We wish them a very happy drive and be succeeded in their works and careers!\" src=\"/Lyna-CarRental/system/plugin/ckeditor_4.7.0_full/kcfinder-master/upload/images/1111.jpg\" /></p>\r\n\r\n<p><br />\r\n28 February 2017</p>\r\n\r\n<p>28 February 2017, Kampong Cham Province . . . Lyna-CarRental.Com is the first supplier of supplying the fleets of Vehicles Rental with and English speaking drivers for the sub-contract agreement of Metro Global Services Pte Ltd., from Singapore to do the Signal Survey Project for NOKIA (Cambodia) Co., Ltd. on 3-monthagreements to cover all around the 25 provinces and municipalities in the Kingdom of Cambodia.Mr Makara Ben is one of our pleasant lokking and an English speaking drivers who is now working with an Indian Team and one-to-one customer.In Kampong Cham starting from the 10th of February, 2017 till now, we are deploying 3 cars and 3 drivers.Two cars and Drivers in Sihanouk Ville and 1 car plus driver in Phnom Penh.We wish them a very happy drive and be succeeded in their works and careers!</p>\r\n ', ' '),
(30, '20201224_7383.png', 'Customer\'s Activities', 'សកម្មភាពអតិថិជន', '<p style=\"text-align:justify\"><img alt=\"Customer Activities On the 27th of February 2017 at 10:00AM at  Lyna-CarRental.Com\'s Office, Dadanee Vongza is signing Vehicle Rental Agreement and taking a group photo for souvenir with Ms Melina Coutand Marie, her brother and father, for 2001 Toyota Camry for 15-day self-drive to move around Cambodia.We wish them a wonderful drive and trip in Cambodia.Thanks for your support.Lyna-CarRental.Com Management Team\" src=\"/Lyna-CarRental/system/plugin/ckeditor_4.7.0_full/kcfinder-master/upload/images/Customer_Activities.jpg\" style=\"height:192px; width:315px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\">Customer Activities</h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">On the 27th of February 2017 at 10:00AM at &nbsp;<a href=\"http://lyna-carrental.com/\" rel=\"nofollow noopener\" target=\"_blank\">Lyna-CarRental.Com&#39;s Office,&nbsp; &nbsp;</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://lyna-carrental.com/\" rel=\"nofollow noopener\" target=\"_blank\">Dadanee Vongza is signing Vehicle Rental Agreement and taking a group photo for souvenir with Ms Melina Coutand Marie, her brother and father, for 2001 Toyota Camry for 15-day self-drive to move around Cambodia.We wish them a wonderful drive and trip in Cambodia.Thanks for your support.</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2FLyna-CarRental.Com%2F&amp;h=ATNx2KzLfT7yerSkC08ps6HKYsO3VMxltibvWcit2TBz-Oa0V6DHBZpXYUWYAzPb63RlMkfL4ll37QNAfY3p78gpBs4TVDD6ybrkKWB3Ck6__kbu2IY710-lU64akKlXI4CIiHs&amp;enc=AZOskjkS9lQxBJIcihQ0zauDSu48HKkcIji3PoRDInlNqzz6C23bFQSZm0sE68mv1cHqlMZmWVxq88_8xSoTPwUUb-A0dW8-gftN0SCls3EwAHqM8tONH6V49LLeJJIExYWuGBO4fVQGLil06xJHaWkCib7dcsPnUjBAw2Vn4LpfSyslJQHTObbED8g94-6oyzwALdpAjLSKxYafIKf5wSZ8&amp;s=1\" rel=\"nofollow noopener\" target=\"_blank\">Lyna-CarRental.Com</a>&nbsp;Management Team</p>\r\n\r\n<hr />\r\n<p><img alt=\"\" src=\"/Lyna-CarRental/system/plugin/ckeditor_4.7.0_full/kcfinder-master/upload/images/5_October_2015.jpg\" style=\"height:192px; width:315px\" /></p>\r\n\r\n<h2>5 October 2015</h2>\r\n\r\n<p>5 October 2015 - Meeting with client (Mr Puchkov Pavel, from Russia) at&nbsp;<a href=\"http://lyna-carrental.com/\" rel=\"nofollow noopener\" target=\"_blank\">Lyna-CarRental.Com</a>&#39;s Office in Phnom Penh, Cambodia, to preparing the Provisional Cambodian Driver&#39;s License to be able and to let him doing the self-drive the rental vehicle in Cambodia&nbsp;</p>\r\n ', ' '),
(31, '20201224_7418.png', 'More Information', 'ពត៌មានបន្ថែម', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `id` int(11) NOT NULL,
  `redirect_url` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `promotion` mediumtext NOT NULL,
  `promotion_kh` text NOT NULL,
  `created_on` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`id`, `redirect_url`, `images`, `promotion`, `promotion_kh`, `created_on`) VALUES
(2, 'http://choicecart.xyz/carrental/vehical_rental_detail.php?id=24', '261616083749.png', 'Rent a Car for Self-drive!\r\nReserved Now & Get 60% Off\r\n', 'Rent a Car for Self-drive!\r\nReserved Now & Get 60% Off\r\n', '2020-12-24 09:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `pv_id` int(11) NOT NULL,
  `pv_image` text,
  `pv_title` text,
  `pv_title_kh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`pv_id`, `pv_image`, `pv_title`, `pv_title_kh`) VALUES
(2, '20190213_6678.png', 'BATTAMBANG', 'បាត់ដំបង'),
(3, '20190213_8762.png', 'KAMPONG CHAM', 'កំពង់ចាម'),
(4, '20190213_2525.png', 'KAMPONG THOM', 'កំពង់ធំ'),
(5, '20190214_8732.png', 'KOMPONG CHHNANG', 'កំពង់ឆ្នាំង'),
(6, '20190214_1941.png', 'TAKEO', 'តាកែវ'),
(7, '20190723_7410.png', 'BANTEAY MEANCHEY', 'បន្ទាយមានជ័យ'),
(8, '20190214_4657.png', 'PREAH VIHEAR', 'ព្រះវិហារ'),
(9, '20190214_7350.png', 'KAMPONG SPEU', 'កំពង់ស្ភឺ'),
(10, '20190214_7055.png', 'KAMPOT', 'កំពត'),
(11, '20190214_7493.png', 'KANDAL', 'កណ្តាល'),
(12, '20190214_3787.png', 'KOH KONG', 'កោះកុង'),
(13, '20190214_2418.png', 'KEP', 'កែប'),
(14, '20190214_6526.png', 'KRATIE', 'ក្រចេះ'),
(15, '20190214_6332.png', 'MONDULKIRI', 'មណ្ឌលគីរី'),
(16, '20190214_7506.png', 'ODDAR MEANCHEY', 'ឧត្តរមានជ័យ'),
(17, '20190214_3147.png', 'PAILIN', 'ប៉ៃលិន'),
(18, '20190214_2769.png', 'SIHANOUK VILLE', 'ក្រុងព្រះ សីហនុ'),
(19, '20190214_6902.png', 'PHNOM PENH', 'ភ្នំពេញ'),
(20, '20190214_6249.png', 'PURSAT', 'ពោធិសាត់'),
(21, '20190214_3914.png', 'PREY VENG', 'ព្រៃវែង'),
(22, '20190214_4176.png', 'RATANAKIRI', 'រតនគីរី'),
(23, '20190214_2264.png', 'SIEM REAP', 'សៀមរាប'),
(24, '20190214_5024.png', 'STUNG TRENG', 'ស្ទឹងត្រែង'),
(25, '20190214_2739.png', 'SVAY RIENG', 'ស្វាយរៀង'),
(26, '20190214_5134.png', 'TBONG KHMUM', 'ត្បូងឃ្មុំ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province_detail`
--

CREATE TABLE `tbl_province_detail` (
  `pl_id` int(11) NOT NULL,
  `pl_image` text NOT NULL,
  `pl_title` text NOT NULL,
  `pl_price` varchar(255) NOT NULL,
  `pl_distance` text,
  `pl_pro_id` int(11) NOT NULL,
  `pl_time_leave` text NOT NULL,
  `pl_time_arrive` text NOT NULL,
  `detail` text NOT NULL,
  `detail_kh` text NOT NULL,
  `allow_time` text NOT NULL,
  `add_by_id` int(11) DEFAULT NULL,
  `show_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_province_detail`
--

INSERT INTO `tbl_province_detail` (`pl_id`, `pl_image`, `pl_title`, `pl_price`, `pl_distance`, `pl_pro_id`, `pl_time_leave`, `pl_time_arrive`, `detail`, `detail_kh`, `allow_time`, `add_by_id`, `show_url`) VALUES
(3, '20190828_1529.png', 'ROYAL PALACE', '20.00', '5 min (1.5 km) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '3 Hrs 30 Minutes', NULL, 'https://www.youtube.com/watch?v=jIQ2p0pCO84'),
(4, '20190828_7719.png', 'WAT PHNOM', '20.00', '9 min (2.8 km) via Preah Norodom Blvd (41)', 19, '07:30', '07:45', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=HUuTh1pfu9A'),
(5, '20190828_8846.png', 'TOUL SLENG GENOCIDE MUSEUM', '20.00', '8 min (1.8 km) via St 310', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=1k3yt0T46fw'),
(6, '20190828_4074.png', 'CHOEUNG EK GENOCIDAL CENTER', '40.00', '31 min (15.6 km) via Hun Sen Blvd', 19, '07:00', '07:30', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ehAfBM5-7t4'),
(7, '20190828_5143.png', 'SILVER PAGODA, PHNOM PENH', '20.00', '3 min (1.0 km) via Preah Norodom Blvd (41) and Oknha Chhun St (240)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=qN3VTqzjCWg'),
(8, '20190828_4576.png', 'CENTRAL MARKET', '20.00', '8 min (2.1 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=9flRZ0NpDB4'),
(9, '20190828_2678.png', 'NATIONAL MUSEUM OF CAMBODIA', '20.00', '5 min (1.6 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=F0RESBApZvk'),
(10, '20190828_3053.png', 'INDEPENDENCE MONUMENT PHNOM PENH', '20.00', 'Don\'t know', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=jUIBNTVoBac'),
(11, '20190828_3347.png', 'TOUL TOMPOUNG MARKET', '20.00', '15 min (3.2 km) via Preah Norodom Blvd (41) and Mao Tse Toung Boulevard (245)', 19, '08:00', '08:05', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=IRjccTTybz8'),
(12, '20190828_2344.png', 'ORUSSEY MARKET', '20.00', '10 min (1.9 km) via Preah Norodom Blvd (41) and Keo Chea St (184)', 19, '08:00', '08:15', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kK7qw-BxUwc'),
(13, '20190828_6167.png', 'TONLE BATI', '20.00', '1 h 7 min (32.2 km) via Hun Sen Blvd and NR2', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=aRrWB1rV3Sg'),
(14, '20190828_3284.png', 'PREAH SISOWAT QUAY', '20.00', '8 min (2.7 km) via Preah Sisowath Quay', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=r0wqmKi-OHA'),
(15, '20190828_1669.png', 'PHNOM PENH NIGHT MARKET', '20.00', '8 min (3.0 km) via Preah Sisowath Quay', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=eyaZit2BrJg'),
(16, '20190828_7234.png', 'SILK ISLAND', '20.00', '1 h 6 min (18.5 km) via AH11/NR6', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=f8FMqWEJvnE'),
(17, '20190828_9368.png', 'PHSAR KANDAL MARKET', '20.00', '7 min (1.9 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sp6rUyUvcWM'),
(18, '20190828_7883.png', 'OLYMPIC MARKET', '20.00', '12 min (2.3 km) via Preah Sihanouk Blvd (274)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RoJ0QiV9Olk'),
(19, '20190828_6069.png', 'OLD MARKET (PHSAR CHAS)', '20.00', '9 min (2.2 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ZpuyoibdC5M'),
(20, '20190828_5939.png', 'CAMBODIA-VIETNAM MONUMENT', '20.00', '2 min (800.0 m) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=WJMSMYN6G_0'),
(21, '20190828_7576.png', 'CAMBODIA-JAPANESE FRIENDSHIP BRIDGE', '20.00', '18 min (5.7 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=LRkPLwojgMw'),
(22, '20190828_1320.png', 'BOTUMVATEY PAGODA', '20.00', '4 min (1.0 km) via Preah Sihanouk Blvd (274)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=S2wMt_si07I'),
(23, '20190828_4235.png', 'WAT LANGKA', '20.00', '3 min (600.0 m) via Preah Suramarit Blvd (268)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=B93oNCxRuss'),
(24, '20190828_5621.png', 'PHNOM PENH SAFARI', '20.00', '45 min (22.6 km) via AH11/NR6', 19, '08:00', '08:30', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=WbQ5aGmE4Sc'),
(25, '20190828_9008.png', 'CAMBODIA LIVING ART', '20.00', '3 min (950.0 m) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=AiMQUI5ERFo'),
(26, '20190828_1517.png', 'STATUE OF KING FATHER NORODOM SIHANOUK', '20.00', '1 min (190.0 m) via Preah Sihanouk Blvd (274)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7RUP9CTCoyA'),
(27, '20190828_8914.png', 'KOH CHEN', '20.00', '54 min (34.9 km) via AH11/NR6', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=BwF9ouhzA9s'),
(28, '20190828_4661.png', 'PHNOM BASET', '20.00', '1 h 4 min (29.5 km) via AH1/NR5 and 130', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=0SwmxaBKTx8'),
(29, '20190828_9305.png', 'AL-SERKAL MOSQUE', '20.00', '16 min (3.7 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Wd_0AjFHvzI'),
(30, '20190828_3911.png', 'OUNNALOM PAGODA', '20.00', '6 min (1.9 km) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=xXxo2iy2m3c'),
(31, '20190828_4874.png', 'SOVANNAPHUM ARTS', '20.00', '13 min (3.3 km) via Preah Norodom Blvd (41) and AH1/NR1', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=2faeVDIchUs'),
(32, '20190828_1965.png', 'KINGDOM BREWERIES (CAMBODIA) LTD.', '20.00', '20 min (5.7 km) via Preah Norodom Blvd (41) and AH1/NR5', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=75js49xMK4E'),
(33, '20190828_2424.png', 'KOH PICH NIGHT MARKET', '20.00', '8 min (2.6 km) via Preah Sihanouk Blvd (274)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=MWiV9hjRmzY'),
(34, '20190828_3205.png', 'SAMAI DISTILLERY', '20.00', '4 min (1.2 km) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=vW1rxtmW60Q'),
(35, '20190828_5393.png', 'ROYAL CAMBODIA PHNOM PENH GOLF CLUB', '20.00', '58 min (20.8 km) via Russian Federation Blvd. (110)/AH11', 19, '08:00', '08:30', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=OPlWNBcRHdg'),
(36, '20190828_8235.png', 'GRAND PHNOM PENH WATER PARK', '20.00', '37 min (13.8 km) via AH1/NR5', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=lOhnjzIeIOk'),
(37, '20190828_4476.png', 'WAT MOHA MONTREY', '20.00', '9 min (1.8 km) via Preah Sihanouk Blvd (274)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=m-tkGcBAGm0'),
(38, 'blank.png', 'MOHA PRASAT KHEMRIN', '20.00', 'Don\'t know', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t know'),
(39, '20190828_2735.png', 'TOUL TUMPOUNG PAGODA', '20.00', '12 min (2.9 km) via Preah Norodom Blvd (41) and Mao Tse Toung Boulevard (245)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=zPn_w4WO5gY'),
(40, '20190828_2455.png', 'PREAH TINEANG CHAN CHHAYA', '20.00', '5 min (1.5 km) via Preah Sihanouk Blvd (274) and Samdach Sothearos Blvd (3)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7WKLXhHO-XU'),
(41, '20190828_6499.png', 'DINART GALLERY', '20.00', '8 min (2.0 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=FUjhE4qSL7Q'),
(42, '20190828_3088.png', 'KOH OKNHA TEI', '20.00', '1 h 8 min (18.4 km) via AH11/NR6', 19, '08:00', '08:30', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Rh64X6OBJLA'),
(43, '20190828_6021.png', 'BOENG SNOR LAKE', '20.00', '23 min (6.5 km) via Preah Norodom Blvd (41) and AH1/NR1', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(44, '20190828_6505.png', 'NATIONAL LIBRARY OF CAMBODIA', '20.00', '12 min (2.8 km) via Preah Norodom Blvd (41)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=-lfOjFtbPt0'),
(45, '20190828_4835.png', 'PREAH TINEANG DHEVA VINNICHHAY (THRONE HALL)', '20.00', '5 min (1.1 km) via Preah Norodom Blvd (41) and Oknha Chhun St (240)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(46, '20190828_8936.png', 'PHNOM PENH HERITAGE TOUR', '20.00', '9 min (3.3 km) via Preah Sisowath Quay', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=fUJDt-RSC-A'),
(47, '20190828_7845.png', 'HANG CHAU TOURIST BOAT PLATFORM', '20.00', '8 min (3.1 km) via Preah Sisowath Quay', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Gk8a67VAh7Q'),
(48, 'blank.png', 'PREAH PUTH MEAN BON', '20.00', '12 min (2.6 km) via Samdach Pan Ave (214)', 19, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(50, '20190828_6238.png', 'BAMBOO TRAIN BATTAMBANG', '20.00', '11 min (4.4 km) via Street 716', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=jj8piFadRTg'),
(51, '20190828_8685.png', 'WAT EK PHNOM', '20.00', '20 min (9.5 km) via Street 520 and Street 1734', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Kra_Rvt0Tpw'),
(52, '20190828_2490.png', 'BATTAMBANG PROVINCIAL MUSEUM', '20.00', '2 min (700.0 m) via Street 207 and Rd No 1', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=FiPw-3k5YP0'),
(53, '20190828_9731.png', 'MRS BUN ROEUNG\'S ANCIENT HOUSE', '20.00', '8 min (3.1 km) via 159 D', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PX3SedwHl4k'),
(54, '20190828_5806.png', 'ROMCHEK 5 ARTSPACE & CAFE', '20.00', '4 min (1.1 km) via 203', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(55, '20190828_9261.png', 'LOK TA DAMBONG KRA NHOUNG', '20.00', '3 min (1.1 km) via Street 202 and 213', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=9ERXycKGURA'),
(56, '20190828_1775.png', 'PHSAR NAT MARKET', '20.00', '3 min (1.1 km) via Rd No 1', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RrEV3WN-lus'),
(57, '20190828_9918.png', 'BATTAMBANG CROCODILE FARM', '20.00', '11 min (4.3 km) via 153', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=vk-C719dz3o'),
(58, '20190828_6754.png', 'DAMREY SOR PAGODA', '20.00', '3 min (1.0 km) via Rd No 1', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=MWsBywLtltQ'),
(59, '20190828_1298.png', 'PHNOM SAMPOV TEMPLE', '20.00', '30 min (15.5 km) via NR57', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7n_9mT8oBuo'),
(60, '20190828_4746.png', 'THE KILLING CAVE', '20.00', '30 min (15.3 km) via NR57', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=9NkNEsIlwyI'),
(61, '20190828_6236.png', 'EK PHNOM TEMPLE', '20.00', '19 min (9.2 km) via Street 520 and Street 1734', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=u39_AFtEw3s'),
(62, '20190828_8692.png', 'TEP KAO SOL / LOEU LORN GALLERY', '20.00', '3 min (800.0 m) via Street 207 and Rd No 2', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(63, '20190828_8685.png', 'WAT SAMRONG KNONG', '20.00', '13 min (5.3 km) via Street 616', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Y2vEkbpoIH4'),
(64, '20190828_1644.png', 'SAMRONG KNONG KILLING FIELD', '20.00', '13 min (5.5 km) via Street 616', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Y2vEkbpoIH4'),
(65, 'blank.png', 'BATTAMBANG EXPLORATION TOUR', '20.00', '1 min (170.0 m) via Street 202', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(66, '20190828_3453.png', 'THE WELL OF SHADOWS', '20.00', '13 min (5.5 km) via Street 616', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=NpUUwbSg0d4'),
(67, '20190828_6376.png', 'WAT KANDAL PAGODA', '20.00', '1 min (180.0 m) via Street 202 and Street 207', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=KF49o_R_3O8'),
(68, '20190828_4166.png', 'PHNOM TOUCH MOUNTAIN', '20.00', 'Don\'t know', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=eEmATXH9OWY'),
(69, '20190828_8351.png', 'WAT SAMPOV', '20.00', 'Don\'t know', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=BZNAOXdgF4k'),
(70, '20190828_5885.png', 'SANGKE PAGODA', '20.00', '2 min (350.0 m) via Street 202', 2, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=brVIwWtTx6Q'),
(71, '20190828_1135.png', 'ANGKOR WAT', '20.00', '16 min (6.3 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kOiOY0LBO7g'),
(72, '20190828_9002.png', 'BAYON TEMPLE', '20.00', '23 min (10.0 km) via Sivutha Blvd/NR63', 23, '08:02', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PVGamoZuTJU'),
(73, '20190828_8514.png', 'TA PROHM TEMPLE', '20.00', '26 min (12.7 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=FCePdq8VsXc'),
(74, '20190828_7547.png', 'ANGKOR THOM TEMPLE', '20.00', 'Don\'t know', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=gkXMpxDuxmw'),
(75, '20190828_8620.png', 'BANTEAY SREY TEMPLE', '20.00', '1 h 2 min (35.2 km) via NR67', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=zEGFzTSxLKw'),
(76, '20190828_5472.png', 'PREAH KHAN TEMPLE', '20.00', '31 min (13.1 km) via Sivutha Blvd/NR63', 23, '08:00', '08:02', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=MYhHKVhErVU'),
(77, '20190828_8916.png', 'BAPOUN TEMPLE', '20.00', '25 min (10.4 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=OJhWyQ3q2Rc'),
(78, '20190828_6409.png', 'PHNOM BAKHENG', '20.00', '18 min (8.0 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=WZAxHwYgEnE'),
(79, '20190828_2386.png', 'PRE RUB TEMPLE', '20.00', '25 min (13.8 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=auPEorHO6xo'),
(80, '20190828_8787.png', 'TERRACE OF THE ELEPHANE', '20.00', '25 min (10.7 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=c26X-G_61KM'),
(81, '20190828_2248.png', 'STREET 08', '20.00', '2 min (350.0 m) via 2 Thnou St', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RTt2pZ69aB0'),
(82, '20190828_3208.png', 'BANTEAY KDEI TEMPLE', '20.00', '22 min (11.4 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kth1AMNRrS0'),
(83, '20190828_2033.png', 'ANGKOR NATIONAL MUSEUM', '20.00', '6 min (1.7 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=4l0S7ACa7Rk'),
(84, '20190828_2148.png', 'NEAK POAN TEMPLE', '20.00', '35 min (16.6 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=IzsRJEhTCTc&pbjreload=10'),
(85, '20190828_8952.png', 'PHIMEAN AKAS TEMPLE', '20.00', '24 min (10.6 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=MJnrARgksAk'),
(86, '20190828_1522.png', 'SRAH SRANG', '20.00', '25 min (11.8 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=o4zxBHuBZZY'),
(87, '20190828_9965.png', 'BANTEAY SAMRE TEMPLE', '20.00', '37 min (19.1 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=vafeF8rfe4Y'),
(88, '20190828_2952.png', 'EAST MEBON TEMPLE', '20.00', '28 min (15.1 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=d-o_a4rfn-w'),
(89, '20190828_2156.png', 'TERRACE OF THE LEPER KING', '20.00', '25 min (10.8 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=EkukaqUvTHE'),
(90, '20190828_2749.png', 'TA SOM TEMPLE', '20.00', '32 min (17.6 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=AcVSNUatgyo'),
(91, '20190828_8408.png', 'BAKONG TEMPLE', '20.00', '30 min (15.4 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=suxZvw4IYGM'),
(92, '20190828_8510.png', 'TONLE SAP', '20.00', '52.4 km', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Be6EOmcNmZ0'),
(93, '20190828_4372.png', 'PHARE, THE CAMBODIAN CIRCUS', '20.00', '8 min (2.2 km) via Sok San Rd', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=v_Ne0tzQ5xM'),
(94, '20190828_9345.png', 'TAKEO TEMPLE', '20.00', '30 min (14.9 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=_cin6KallBQ'),
(95, '20190828_6480.png', 'PRASAT KRAVAN TEMPLE', '20.00', '20 min (10.1 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=6820Bwp9Fv8'),
(96, '20190828_9648.png', 'BOENG MEALEA', '20.00', '1 h 22 min (61.1 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=352gp1RtCAg'),
(97, '20190828_4438.png', 'PREAH KO TEMPLE', '20.00', '25 min (13.9 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=wK08nPrtrLM'),
(98, '20190828_9988.png', 'THOMMANON TEMPLE', '20.00', '30 min (12.5 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=87RQ8H0qQgI'),
(99, '20190828_4437.png', 'ANM KHMER MARKET', '20.00', '3 min (400.0 m) via Sivutha Blvd/NR63 and Night Market St', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=nK7Ywl6uSmk'),
(100, '20190828_6231.png', 'CAMBODIA LANDMINE MUSEUM', '20.00', '46 min (27.5 km) via NR67', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kuOIcOu0to8'),
(101, '20190828_2902.png', 'LOLEI TEMPLE', '20.00', '28 min (14.7 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=-Q0muxb566s'),
(102, '20190828_9486.png', 'PHASA CHAS MARKET', '20.00', '5 min (900.0 m) via Sivutha Blvd/NR63 and Pokambor Ave', 23, '08:00', '08:02', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=KHoR8c6y2CE'),
(103, '20190828_3002.png', 'KHLEANGS TEMPLE', '20.00', '17 min (6.3 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=5TstLEc0axk'),
(104, '20190828_7654.png', 'ARTISANS ANGKOR', '20.00', '4 min (750.0 m) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=rMKE0yMCrRI'),
(105, '20190828_8282.png', 'WEST BARAY LAKE', '20.00', '25 min (12.3 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=_cw-8D-BZG4'),
(106, '20190828_9636.png', 'CHAU SAY TEVODA TEMPLE', '20.00', '30 min (12.4 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=r4YSEtj68TE'),
(107, '20190828_2610.png', 'OLD MARKET BRIDGE', '20.00', '4 min (850.0 m) via Sivutha Blvd/NR63 and Pokambor Ave', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=JPOQTXQ1AtQ'),
(108, '20190828_2360.png', 'PHNOM KROM', '20.00', '28 min (11.9 km) via NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=f1EVgFa0WrE'),
(109, '20190828_4393.png', 'FLOATING VILLAGE, ON TONLE SAP LAKE CAMBODIA', '20.00', '37 min (16.2 km) via NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=m22Lp5NhgCU'),
(110, '20190828_1138.png', 'BAKSEI CHAMKRONG', '20.00', '19 min (8.1 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=JMSIItNYDME'),
(111, '20190828_3025.png', 'AMANSARA', '20.00', '6 min (1.8 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=zAAW855-eDk'),
(112, '20190828_5079.png', 'TA NEI TEMPLE', '20.00', '34 min (15.9 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=VWcHN-ExEZU'),
(113, '20190828_5746.png', 'PRASAT SOUR PRAT TEMPLE', '20.00', '17 min (6.3 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=HOGsFALYJcc'),
(114, '20190828_6079.png', 'ANGKOR NIGHT MARKET STREEM', '20.00', '2 min (400.0 m) via Sivutha Blvd/NR63 and Night Market St', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=VAUyR9VP_wk'),
(115, '20190828_7038.png', 'PUB STREET SIEM REAP', '20.00', '2 min (350.0 m) via 2 Thnou St', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RTt2pZ69aB0'),
(116, '20190828_1861.png', 'ROLUOS GROUP TEMPLE', '20.00', '8 min (2.1 km) via River Rd', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RU2RkF3oFto'),
(117, '20190828_5722.png', 'VICTORY GATE', '20.00', '29 min (12.0 km) via Sivutha Blvd/NR63', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=GuzvDl4cLac'),
(118, '20190828_6969.png', 'ANGKOR WAT SMALL TOUR', '20.00', '3 min (550.0 m) via Preah Sangreach Tep Vong St and Oknha Oum-Chhay St', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sq4MaTAnemw'),
(119, '20190828_6807.png', 'WEST MEBON TEMPLE', '20.00', '42 min (19.2 km) via NR6', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Elq89NypBg8'),
(120, '20190828_3030.png', 'EAST BARAY TEMPLE', '20.00', '27 min (13.8 km) via Charles De Gaulle', 23, '08:00', '08:20', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=RTh1l8Yo9gs'),
(121, '20190826_4474.png', 'PHNOM AURAL', '20.00', '51.6 km', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=KAnCcIp3-dI'),
(122, '20190826_6412.png', 'CHAMBOK HIGH SCHOOL', '20.00', '51 min (33.8 km) via NR44', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=scFpaJDSRDU'),
(123, '20190826_5778.png', 'KIRIRUM NATIONAL PARK', '20.00', '2 h 18 min (91.5 km) via AH11/NR4', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=w932s8jERUE'),
(124, '20190826_4724.png', 'CHREAV WATERFALL', '20.00', '1 h 27 min (53.2 km) via 132', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=e71jV1r6XCc'),
(125, '20190826_6958.png', 'HOT SPRING', '20.00', 'don\'t know', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=q71flZO8byk'),
(126, '20190826_9822.png', 'PHNOM PICH NIL', '20.00', '1 h 46 min (81.6 km) via NR44 and AH11/NR4', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=sWKAP3ubn3I'),
(127, '20190826_3853.png', 'PREAH REACH TROAP MOUNTAIN', '20.00', '1 h 30 min (58.4 km) via ផ្លូវលេខ ១៣៦', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=3fRcUlntEx4'),
(128, '20190826_1304.png', 'KIRIRUM WATERFALL', '20.00', '1 h 49 min (69.4 km) via AH11/NR4 and NR46', 9, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=TeKObD5FLjE'),
(129, '20190826_3056.png', 'PHNOM CHISO', '20.00', '1 h (38.7 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=s0mI9u5Yu6o'),
(130, '20190826_7082.png', 'PHNOM TAMAO ZOOLOGICAL PARK & WILDLIFE RESCUE CENTER', '20.00', '1 h 1 min (43.2 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=n2htcqC__Fw'),
(131, '20190826_8235.png', 'ANGKOR BOREI & PHNOM DA', '20.00', '1 h 46 min (75.3 km) via NR2 and អង្គរបូរី', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=u2Pdy6_x3Es'),
(132, '20190826_9849.png', 'TAMAO MOUNTAIN', '20.00', '1 h 15 min (51.4 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=1BWj3NPmHUg'),
(134, '20190826_8384.png', 'TONLE BATI', '20.00', '1 h 29 min (60.2 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=-GVczikis7o'),
(135, '20190826_4042.png', 'DA MOUNTAIN', '20.00', '1 h 45 min (75.2 km) via NR2 and អង្គរបូរី', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=FznsNG15fL0'),
(136, '20190826_4759.png', 'PHNOM BAYONG', '20.00', '54 min (41.0 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=jwSfj--IVyk'),
(137, '20190826_6782.png', 'ASRAM MOHA RUSSEI', '20.00', '1 h 32 min (67.4 km) via NR2 and អង្គរបូរី', 6, '08:00', '08:21', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=gt72H4m9fys'),
(138, '20190826_2451.png', 'CHOUB POUL TEMPLE', '20.00', '38 min (22.7 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'Don\'t have'),
(139, '20190826_5969.png', 'TAPROHM TEMPLE', '20.00', '1 h 19 min (54.5 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=raucwyvUFeM'),
(140, '20190826_6771.png', 'NEANG KMAO PAGODA', '20.00', '48 min (34.8 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=PjZLw2AaLu8'),
(141, '20190826_9993.png', 'PHNOM BAYONG TEMPLE', '20.00', '59 min (38.7 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=jwSfj--IVyk'),
(142, '20190826_3527.png', 'ANGKOR BOREI MUSEUM', '20.00', '1 h 38 min (71.3 km) via NR2 and អង្គរបូរី', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=SdUc94b5Tn4'),
(143, '20190826_9649.png', 'INDEPENDENT MONUMENT TAKEO PROVINCIAL', '20.00', '17 min (9.2 km) via NR2', 6, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=hFJLtoKrX8A'),
(144, '20190828_9234.png', 'KOH TONSAY', '20.00', '22 min (12.7 km) via AH123/NR33 and NR33A', 13, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=wwRMaxcm37s'),
(145, '20190828_4001.png', 'KEP BEACH', '20.00', '24 min (14.9 km) via AH123/NR33 and NR33A', 13, '08:00', '08:12', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=xgErY2NAqOw'),
(146, '20190828_4175.png', 'KEP NATIONAL PARK', '20.00', '31 min (15.5 km) via AH123/NR33 and NR33A', 13, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=vVqm5Vka1AQ'),
(147, '20190828_3675.png', 'SOTHY\'S PEPPER FARM', '20.00', '14 min (7.9 km) via AH123/NR33 and 1333', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=L7WCqkYQZ2w'),
(148, '20190828_6816.png', 'LA PLANTATION', '20.00', '48 min (23.2 km) via AH123/NR33', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=ZM_QzKMHDEc'),
(149, '20190828_9346.png', 'WAT SAMANTHI PAGODA', '20.00', '21 min (12.0 km) via AH123/NR33 and NR33A', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=0vYxE7hQ8nk'),
(150, '20190828_4304.png', 'KOH TONSAY BEACH', '20.00', '22 min (12.7 km) via AH123/NR33 and NR33A', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=eKTq28eeclk'),
(151, '20190828_4479.png', 'PHNOM SORSIA', '20.00', '49 min (23.7 km) via 1333', 13, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=9WaKS03PZPM'),
(152, '20190828_8517.png', 'KEP CRAB STATUE', '20.00', '14 min (9.8 km) via NR33A', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=qDOf7hGW8GU'),
(153, '20190828_1959.png', 'BATTERFLY GARDEN', '20.00', '15 min (9.3 km) via NR33A', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=bQpzieGRBAM'),
(154, 'blank.png', 'LA PIEDRA DEL OCASO', '20.00', 'Dont know', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'Don\'t have'),
(155, '20190828_1759.png', 'BRATEAK KROLA LAKE', '20.00', '26 min (12.1 km) via AH123/NR33', 13, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=5u-IjxMyqvI'),
(156, '20190828_8492.png', 'WHITE LADY STATUE', '20.00', '15 min (10.2 km) via NR33A', 13, '08:00', '08:20', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=d8L4pTv-Kzw'),
(157, '20190828_7571.png', 'POPOKVIL WATERFALL', '20.00', '1 h (38.5 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=PHOnhYWQWSQ'),
(158, '20190828_7984.png', 'LA PLANTATION', '20.00', '57 min (22.6 km) via AH123/NR33 and 1331 Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=4ujAVDDOG30'),
(159, '20190828_1210.png', 'PHNOM CHHNGOK CAVE TEMPLE', '20.00', '42 min (17.3 km) via AH123/NR33 and 139', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=C1fplGDJWps'),
(160, '20190828_1685.png', 'PREAH MONIVONG NATIONAL PARK', '20.00', '54 min (34.5 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=kikU-Vvv0So'),
(161, '20190828_4552.png', 'DURIAN ROUNDABOUT', '20.00', '12 min (4.7 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=W-9bcIBrlnU'),
(162, '20190828_4965.png', 'SAMPOV PRAM PAGODA', '20.00', '59 min (36.8 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=uH4TYqZJUik'),
(163, '20190828_7767.png', 'KAMPOT KNIGHT MARKET', '20.00', '12 min (4.6 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=r2YvNHGNDUs'),
(164, '20190828_6811.png', 'FARM LINK', '20.00', '8 min (3.4 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=9FZan53JGAY'),
(165, '20190828_3480.png', 'PHNOM BOKOR', '20.00', '53 min (34.5 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=o8PgtaTiSuU'),
(166, '20190828_1405.png', 'TEUK CHHOU RAPIDS', '20.00', '21 min (11.4 km) via Tuek Chhu Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=B1FV-1NSBig'),
(167, '20190828_9751.png', 'SALT FIELD KAMPOT', '20.00', '47 min (29.0 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=6ZZnVksWdGo'),
(168, '20190828_6426.png', 'PHNOM SORSIA', '20.00', '59 min (24.4 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=RI2J49Mdu1A'),
(169, '20190828_6530.png', 'KAMPOT PROVINCIAL MUSEUM', '20.00', '12 min (5.2 km) via AH123/NR3 and ផ្លូវលេខ ៧៣៥', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=7kVrKIBMEuo'),
(170, '20190828_7892.png', 'TADA ROUNG CHAN WATERFALL', '20.00', '36 min (16.4 km) via Tuek Chhu Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=IYwoRFhDqWA'),
(171, '20190828_7947.png', 'RIVER PARK', '20.00', '24 min (10.5 km) via AH123/NR3 and Tuek Chhu Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=98euhoOgChw'),
(172, '20190828_5958.png', 'HATIEN VEGAS ENTERTAINMENT RESORT', '20.00', '1 h 6 min (45.0 km) via AH123/NR33 and 1332', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=zWQ8c-WX-9E'),
(173, '20190828_9175.png', 'KAMPONG TRACH MOUNTAIN RESORT', '20.00', '1 h 5 min (42.9 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=GMeZ-z0PKAs'),
(174, '20190828_2594.png', 'SOTHY\'S PEPPER FARM', '20.00', '48 min (29.6 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=pq-aTtXVd9Y'),
(175, '20190828_7557.png', 'LOK YEAY MAO', '20.00', '42 min (27.3 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=WwNOqiU4QsA'),
(176, '20190828_5624.png', 'KAMPOT ART GALLERY', '20.00', '12 min (5.2 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=LupoMgXL-gM'),
(177, '20190828_2209.png', 'PUTKIRI PAGODA', '20.00', '1 h 56 min (89.7 km) via NR41', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=UFG897bFth8'),
(178, 'blank.png', 'SUNDAY CASINO', '20.00', 'Don\'t know', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'Don\'t have'),
(179, '20190828_8193.png', 'NATAYA BEACH', '20.00', '23 min (16.1 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=oM5I-7xy2co'),
(180, '20190828_7718.png', '2000 ROUNDABOUT', '20.00', '12 min (4.9 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'Don\'t have'),
(181, '20190828_2779.png', 'BRATEAK KROLA LAKE', '20.00', '45 min (18.7 km) via AH123/NR33 and 1331 Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=OSwKl__lov0'),
(182, '20190828_2129.png', 'SWIMMING CAVE', '20.00', '1 h 7 min (44.2 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=JS3Vx0y7Oks'),
(183, '20190828_5282.png', 'BOTUM SAKOR NATIONAL PARK', '20.00', 'Don\'t know', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=qj4YHWJrsRs'),
(184, '20190828_9560.png', 'PHNOM KBAL ROMEAS', '20.00', '29 min (12.2 km) via AH123/NR3 and AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=COSKIG-3dLU'),
(185, '20190828_8871.png', 'BOKOR CHURCH', '20.00', '58 min (37.2 km) via NR32', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=61YHb_sRHBY'),
(186, '20190828_1392.png', 'PREK KAMPOT', '20.00', '30 min (15.6 km) via Tuek Chhu Rd', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'Don\'t have'),
(187, '20190828_7119.png', 'KAMPOT PAGODA', '20.00', '4 min (1.3 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=iX3hy5H2QI8'),
(188, '20190828_3507.png', 'FIREFLY CRUISE', '20.00', '10 min (4.6 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=C1fplGDJWps'),
(189, '20190828_1802.png', 'PHNOM DONG', '20.00', '23 min (10.2 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=Z27C-zfMUuY'),
(190, '20190828_1527.png', 'ANLONG PRING CRANE BIRD', '20.00', '1 h 26 min (54.5 km) via AH123/NR33', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=T1Zk4m3txd4'),
(191, '20190828_5676.png', 'PHNOM DOUNG BEACH', '20.00', '28 min (11.7 km) via AH123/NR3', 10, '08:00', '11:00', '', '', '2 hrs 00 minues', NULL, 'https://www.youtube.com/watch?v=AxibNXMdOn0'),
(192, '20190824_9508.png', 'OTRES BEACH', '20.00', '34 min (9.7 km) via Poulowai Street 300', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=l-u3jLRYP54'),
(193, '20190824_6113.png', 'REAM NATIONAL PARK', '20.00', '1 h 5 min (28.2 km) via AH11/NR4 and Sun Moon Resort Rd', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kEUT1GClJWo'),
(194, '20190824_1754.png', 'OCHHEUTEAL BEACH', '20.00', '20 min (5.9 km) via Ekareach Street 100 and Ochheuteal Street 500', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=yKPFJUOZT6k'),
(195, '20190824_8552.png', 'KOH RUSSEI', '20.00', '1 h 5 min (16.1 km) via Koh Russei', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Gp9tekU2UHQ'),
(196, '20190824_4227.png', 'LAZY BEACH', '20.00', '24.8 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=g91qk-mjKXA'),
(197, '20190824_7783.png', 'SOKHA BEACH', '20.00', '14 min (3.0 km) via Street 115', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=5RVut-cmqLw'),
(198, '20190824_3672.png', 'INDEPENDENCE BEACH', '20.00', '10 min (3.7 km) via Ekareach Street 100 and 28 Mithona St', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=5RVut-cmqLw'),
(199, '20190824_6821.png', 'KOH TA KIEV', '20.00', '1 h 38 min (20.5 km) via កោះឫស្សី', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=UnRfqdfJvzU'),
(200, '20190824_1357.png', 'LONG SET BEACH', '20.00', '26.4 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sMGWq6Z2RPg'),
(201, '20190824_6706.png', 'LEU PAGODA', '20.00', '9 min (2.1 km) via Street 801', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=f88nw_k443s'),
(202, '20190824_4378.png', 'PHSAR LEU MARKET', '20.00', '7 min (1.0 km) via Mittapheap St', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=1SRL3DAHx7o'),
(203, 'blank.png', 'VICTORY BEACH PIER', '20.00', '10 min (3.4 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=w9okC-GYZs0'),
(204, '20190826_2233.png', 'KBAL CHHAY WATERFALL', '20.00', '47 min (19.0 km) via AH11/NR4 and ផ្លូវក្បាលឆាយ', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=zZ8so3FRtxA'),
(205, '20190826_8986.png', 'HIGH POINT ROPE PARK', '20.00', '27.8 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=-_xfF1oyGIo'),
(206, '20190826_5890.png', 'GOLDEN LIONS ROUNDABOUT', '20.00', '9 min (2.3 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=DiyGeVKjV5o'),
(207, '20190826_9999.png', 'WAT INTNEAN CALLED WAT KROM', '20.00', '11 min (3.3 km) via Ekareach Street 100 and Santepheap St', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=LHnjIOfanLM'),
(208, '20190826_7060.png', 'KOH SEH', '20.00', '37.9 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=wZz6FPgZUrM'),
(209, '20190826_6706.png', 'REAM BEACH', '20.00', '46 min (25.2 km) via AH11/NR4 and NR45', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ILqKGfsZMcQ'),
(210, '20190826_2489.png', 'KOH POUS', '20.00', '19 min (5.9 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ZgPsUyzkaLo'),
(211, '20190826_5118.png', 'THE DIVE SHOP', '20.00', '11 min (2.8 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7KpsoGEb208'),
(212, 'blank.png', 'PREAH MONIVING NATIONAL PARK', '20.00', '', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, ''),
(213, '20190826_2993.png', 'PURA VITA RESORT', '20.00', '26.6 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=3ZJG3c5hJg0'),
(214, '20190826_9172.png', 'OTRES ONE', '20.00', '47 min (9.4 km) via Poulowai Street 300', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=UKWWmXALcEY'),
(215, 'blank.png', 'KAOH POAH', '20.00', '', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, ''),
(216, '20190826_6890.png', 'KOH THAS', '20.00', '11.3 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=HyyzFu8aI7M'),
(217, '20190826_1442.png', 'SARACEN BAY BEACH', '20.00', '22.7 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sswdhU3ZulM'),
(218, '20190826_7913.png', 'PREK TRENG BEACH', '20.00', '30 min (9.7 km) via Tomnub Rolork Rd', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, ' https://www.youtube.com/watch?v=qyINTbCQmnc'),
(219, '20190826_3961.png', 'JINBEI CASINO & HOTEL', '20.00', '8 min (2.1 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=EyunZ4N18TA'),
(220, '20190826_3350.png', 'CLEAR WATER BAY', '20.00', '22.6 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=v5OHsyXfrXw'),
(221, '20190826_5114.png', 'KOH THANSOUR RESORT', '20.00', '37.2 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ujtL_4BCSQA'),
(222, '20190826_8208.png', 'KOH KOUN', '20.00', '24.5 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ZW40XL07Eys'),
(223, '20190826_4730.png', 'PREK CHAK BEACH', '20.00', '1 h 1 min (31.9 km) via AH11/NR4 and NR45', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(224, '20190826_3809.png', 'THANSUR ISLAND', '20.00', '37.5 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=cCftAW3r_ck'),
(225, '20190826_1767.png', 'KIRIROM NATIONAL PARK', '20.00', 'Don\'t Know', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=mQZ7UTT9PpY'),
(226, '20190826_7924.png', 'HAWAII BEACH', '20.00', '12 min (3.4 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=4QvF3tDa5yw'),
(227, '20190826_9564.png', 'CHHAK SARACEN', '20.00', '22.8 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=VDJbG1BnEB0&list=PL5QQqrIJ7X44G6bqcEDE-U-b_QAYCRFCZ&index=1'),
(228, '20190826_3162.png', 'FUN BUGGYS', '20.00', '1 min (15.0 m) via Street Koh Rong 110', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=pOnQDrlUrFY'),
(229, '20190826_6573.png', 'THMOR ROUNG NATIONAL RESORT', '20.00', 'Don\'t know', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=kXKYDVxP9Q4'),
(230, '20190826_9498.png', 'JIN BEI CASINO', '20.00', '8 min (2.1 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=O57U3O-DeHA'),
(231, '20190826_3956.png', 'BLUE BAY RESORT', '20.00', '11 min (3.6 km) via Ekareach Street 100 and 28 Mithona St', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=xmHmq1dVhF8'),
(232, '20190826_5012.png', 'TA BARANG RESORT', '20.00', '1 h 45 min (51.9 km) via វិថីសុវត្ថិភាព ទេព វង្', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=tZ76phoQLnI'),
(233, '20190826_2308.png', 'YADOLY CASINO', '20.00', '11 min (2.9 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(234, '20190826_2730.png', 'OU TREH PAGODA', '20.00', '38 min (11.4 km) via AH11/NR4', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=N_HFNDTvOK8'),
(235, '20190826_7861.png', 'KOH RONG SANLOEM', '20.00', '25.3 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Liwn1tP2ioM'),
(237, '20190826_5270.png', 'MLOP CHREY BEACH', '20.00', '14 min (3.8 km) via Ekareach Street 100', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=lyoc3ZjI3TI'),
(238, '20190826_7843.png', 'KOH RONG SANLOEM LIGHTHOUSE', '20.00', '24.1 km', 18, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=22nVH0U-CUc'),
(239, '20190826_6245.png', 'TONLE SAP', '20.00', '100 km', 5, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=lk_VBzxA93E'),
(240, '20190826_6803.png', 'PRASAT KAMPONG PREACH', '20.00', '58 min (42.9 km) via AH1/NR5', 5, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(241, '20190826_6847.png', 'PHNOM KONG REI', '20.00', '1 h 4 min (17.1 km) via កំពង់ឆ្នាំង កំពង់ហៅ', 5, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=KzlMZcMdttg'),
(243, '20190826_4754.png', 'TONLE SAP RIVER', '20.00', '55 min (39.4 km) via AH1/NR5', 5, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=DIJiWY5o0Ic'),
(244, 'blank.png', 'PHREACH REACH TRAOP MOUNTAIN', '20.00', 'Don\'t Know', 5, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(245, 'blank.png', 'PHONOM TRAP', '20.00', '', 20, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, ''),
(246, '20190826_7987.png', 'SAMPOV MEAS ISLAND', '20.00', '19 min (12.7 km) via 146', 20, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=hHIVGWv-pYA'),
(247, '20190826_2937.png', 'YAT MOUNTAIN', '20.00', '29 min (15.8 km) via NR57', 17, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=neWbe3XiEyM'),
(248, '20190826_1151.png', 'PHNOM KHEV WATERFALL', '20.00', '46 min (25.8 km) via NR57', 17, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=OGXpKFrfsKI'),
(249, '20190826_2076.png', 'WAT PHNOM YAT', '20.00', '29 min (15.6 km) via NR57', 17, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=AoTofapszBE'),
(251, '20190826_6731.png', 'GCLUB', '20.00', '1 h 26 min (67.6 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(253, '20190826_8855.png', 'HOLIDAY PALACE CASINO', '20.00', '1 h 23 min (67.0 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PhlhtWtwNBE'),
(254, '20190826_2193.png', 'STAR VAGAS CASINO', '20.00', '1 h 25 min (67.4 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=uvFCRu-u3fQ'),
(255, '20190826_2788.png', 'CROWN CASINO', '20.00', '1 h 25 min (67.2 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7yVTBHs5Hp8'),
(256, '20190826_9611.png', 'POIPET RESORT CASINO', '20.00', '1 h 23 min (67.0 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=UkyxzTklXH4'),
(257, '20190826_1260.png', 'TRAPEANG THMA LANK', '20.00', '1 h 22 min (50.8 km) via 268B', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=nB5sP9iW8iI'),
(258, '20190826_2392.png', 'BANTEAY CHMAR TEMPLE', '20.00', '48 min (45.4 km) via NR56', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=s7GWxqcr64I'),
(259, '20190826_9149.png', 'HOLIDAY PALACE CASINO & HOTEL', '20.00', '1 h 23 min (67.0 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=5qyryXEyvmo'),
(260, '20190826_9170.png', 'TROPICANA RESORT & CASINO', '20.00', '1 h 24 min (67.1 km) via AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ip_3oKPWRd8'),
(261, '20190826_4747.png', 'AURSNGUOT PRIMARY SCHOOL', '20.00', '59 min (38.4 km) via NR56 and AH1/NR5', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(262, '20190826_7878.png', 'TA PROHM TEMPLE', '20.00', '2 h 28 min (134.5 km) via NR6', 7, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(263, '20190826_2511.png', 'SAMBOR PREI KUK', '20.00', '35 min (17.4 km) via 219', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=84jdzRvArf4'),
(264, '20190826_7388.png', 'PHNOM SANTUK', '20.00', '2 h 41 min (108.9 km) via NR6', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=SxqqyZQqoXw'),
(265, '20190826_7869.png', 'TONLE SAP', '20.00', '117 km', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=IF90qgRmY0g');
INSERT INTO `tbl_province_detail` (`pl_id`, `pl_image`, `pl_title`, `pl_price`, `pl_distance`, `pl_pro_id`, `pl_time_leave`, `pl_time_arrive`, `detail`, `detail_kh`, `allow_time`, `add_by_id`, `show_url`) VALUES
(266, '20190826_5567.png', 'PRASAT KUH NOKOR', '20.00', '2 h 1 min (86.6 km) via NR6', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PPfOCZ1ZvlM'),
(267, '20190826_4461.png', 'BRONZE LAKE', '20.00', '1 h 39 min (58.4 km) via NR6', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PQ8y-ay-dDo'),
(268, '20190826_5933.png', 'ANDET TEMPLE', '20.00', '1 h 29 min (66.8 km) via 219 and NR6', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=mcVl7RU61Fo'),
(269, '20190826_9422.png', 'PREY PROS LAKE', '20.00', '1 h 12 min (52.6 km) via 219', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=iZB_bPa-kQk'),
(270, '20190826_3575.png', 'PHNOM SANTOUK TOURISM SITE', '20.00', '2 h 41 min (108.9 km) via NR6', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=4_i2GEiWifg'),
(272, '20190826_4286.png', 'PRASAT KAMPONG PREACH', '20.00', 'Don\'t know', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(273, '20190826_2327.png', 'BENG PER WILDLIFE SANCTUARY', '20.00', '52.8 km', 4, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(274, '20190826_7662.png', 'KIZUNA BRIDGE', '20.00', '7 min (3.1 km) via AH11/NR7', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=6uB0EMAaq4M'),
(275, '20190826_3535.png', 'BAMBOO BRIDGE', '20.00', '9 min (2.2 km) via PR222 and Suramarit St', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=jeYzi9mJKdo'),
(276, '20190826_5458.png', 'PHNOM SREI', '20.00', ' min (7.8 km) via AH11/NR7', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=mzLcu6CQ-DQ'),
(277, '20190826_4077.png', 'NOKOR BACHEY PAGODA', '20.00', '7 min (3.2 km) via ផ្លូវ​ជាតិលេខ​៧​ចាស់', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Iu13uJG1iFU'),
(278, '20190826_4988.png', 'KING\'S RESIDENCE', '20.00', '3 min (1.1 km) via Khemarak Phoumin', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(279, '20190826_4511.png', 'CHEUNG KOK ECOTOURISM', '20.00', '16 min (9.1 km) via AH11/NR7', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=vtiekSF3oaE'),
(280, '20190826_3032.png', 'PHNOM PROS', '20.00', '14 min (7.6 km) via AH11/NR7', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=pLqSViEKNvA'),
(281, '20190826_3892.png', 'WAT KOH', '20.00', 'Don\'t know', 3, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(282, '20190826_1733.png', 'NEAK LOEUNG BRIDGE', '20.00', '1 h 9 min (40.2 km) via NR11', 21, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ZFTkJuWKhWk'),
(283, '20190826_5229.png', 'NEW WORLD CASINO', '20.00', '1 h 3 min (42.1 km) via AH1/NR1', 25, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(284, '20190826_4829.png', 'SUN CITY CASINO', '20.00', '1 h 6 min (42.4 km) via AH1/NR1', 25, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(285, '20190826_7918.png', 'SILK ISLAND', '20.00', '3 h 13 min (92.9 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=v4spmJenWOA'),
(286, '20190826_8700.png', 'PHNOM PENH SAFARI', '20.00', '2 h 55 min (97.8 km) via NR21', 11, '08:00', '10:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=6xQSQJ2yC0o'),
(287, '20190826_2883.png', 'KOH CHEN', '20.00', '3 h 5 min (110.0 km) via NR21 and AH11/NR6', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=AM5sKQ44O9U'),
(288, '20190826_9214.png', 'NEAK LOEUNG BRIDGE', '20.00', '2 h 27 min (93.2 km) via NR21B and AH1/NR1', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=1P25ZWMFcYM'),
(289, '20190826_7898.png', 'KOH OKNHA TEI', '20.00', '3 h 16 min (93.5 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=bKes3UcMz3A'),
(290, '20190826_8157.png', 'TONLE BATI', '20.00', '2 h 18 min (76.6 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=wa2iqpJZwe0'),
(291, '20190826_5832.png', 'GRAND DRAGON RESORTS', '20.00', '1 h 7 min (38.5 km) via NR21B and NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=m4zXu6Zqr_4'),
(292, '20190826_7556.png', 'WIN-WIN MEMORIAL', '20.00', '2 h 54 min (96.9 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=i3h1gnKHA20'),
(293, '20190826_2128.png', 'WAT KROPEU HA', '20.00', '1 h 48 min (66.6 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Lbwne5-bItI'),
(294, '20190826_4485.png', 'PHREAH REACH TRAOP MOUNTAIN', '20.00', '3 h 20 min (117.7 km) via NR21 and AH1/NR5', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(295, '20190826_3096.png', 'QUEEN OF PEACH CHURCH', '20.00', '2 h 44 min (75.6 km) via NR21B', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(296, '20190826_2893.png', 'WAT KIEN SVAY KRAO', '20.00', '1 h 48 min (53.8 km) via NR21B', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=VwSXp7R-B38'),
(298, '20190826_8126.png', 'PHNOM BASET', '20.00', '3 h 11 min (104.7 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=6E8Y-MzpIJc'),
(299, '20190826_9793.png', 'BOENG CHEUNG LOUNG', '20.00', '2 h 13 min (70.9 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(300, '20190826_6834.png', 'BOENG CHOEUNG AEK', '20.00', '1 h 57 min (74.2 km) via NR21', 11, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(301, '20190826_8951.png', 'KOH TRONG', '20.00', '3.1 km', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Yd6ofBRtOgs'),
(302, '20190826_7653.png', 'PHNOM SAMBOK PAGODA', '20.00', '1 h 13 min (27.5 km) via 308/NR73', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=jKzOHTBD02w'),
(303, '20190822_3574.png', '100 COLUMNS PAGODA', '20.00', '1 h 54 min (53.9 km) via 308/NR73', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://youtu.be/fLcct8MCVJE'),
(304, '20190826_8642.png', 'PIR THNU MEMORIAL PARK', '20.00', '2 h 15 min (103.2 km) via AH11/NR7', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=2YO3HKz-WMo'),
(306, '20190826_5432.png', 'SOMBOK MOUNTAIN', '20.00', '1 h 13 min (27.5 km) via 308/NR73', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=X4LX31hwv4E'),
(307, '20190826_1839.png', 'SNOUL WILDLIFE SANCTUARY', '20.00', '3 h 11 min (140.2 km) via AH11/NR7', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=cdvTLe8cArE'),
(308, '20190826_4099.png', 'PHNOM SOPORKALEY', '20.00', '1 h 27 min (51.5 km) via ស្ពានព្រែកបាង', 14, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=rQl5bG7MxLQ'),
(310, '20190826_1408.png', 'VIRACHEY NATIONAL PARK', '20.00', '118 km', 24, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=vjK_RP4CT2A'),
(311, '20190826_4613.png', 'VEUN SAI-SIEM PANG NATIONAL PARK', '20.00', '99.8 km', 24, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=FqtjVVPxBOc'),
(312, '20190826_7933.png', 'STUNG TRENG WOMEN\'S DEVELOPMENT CENTER', '20.00', '33 min (24.5 km) via NR64', 24, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=7whjkkyVWN4'),
(313, '20190826_1835.png', 'KOH HAN', '20.00', '58 min (43.9 km) via NR64 and AH11/NR7', 24, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=CY6pVjrdKNs'),
(314, '20190826_1473.png', 'XE PIAN NATIONAL BIO-DEVERSITY CONSERVATION AREA', '20.00', '110 km', 24, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(315, '20190826_1707.png', 'BOU SRA WATERFALL', '20.00', '42.3 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=EpJOG4d5Xto'),
(316, '20190826_5663.png', 'ELEPHANT VALLEY PROJECT', '20.00', 'Don\'t know', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=e1c6ln-HsRE'),
(317, '20190826_7698.png', 'MONDULKIRI PROJECT', '20.00', '38.1 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=KDKwPKpwZRQ'),
(318, '20190826_6494.png', 'MONDULKIRI ELEPHANT & WILDLIFE SANCTUARY', '20.00', '37.9 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=fpnQIvP6PQU'),
(319, '20190826_6060.png', 'PHNOM PRICH WILDLIFE SANCTUARY', '20.00', '25.8 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=dzoqksH_RPY'),
(320, '20190826_4693.png', 'MONDULKIRI ELEPHANT & SANCTUARY', '20.00', '38.6 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=I8aPkC94SrQ'),
(321, '20190826_8035.png', 'MONDULKIRI ELEPHANT & WILDLIFE SANCTUARY-L.E.A.F CAMBODIA', '20.00', '37.9 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=YPQAfgDtlfM'),
(322, '20190826_4264.png', 'SEN MONOROM WATERFALL', '20.00', '39.0 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=VNspbRFS6x8'),
(323, '20190826_4207.png', 'SEA FOREST', '20.00', '33.7 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=05d7Qjv7pWA'),
(324, '20190826_8891.png', 'DAKDAM WATERFALL', '20.00', '47.9 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=4PmyIKFYqVg'),
(325, '20190826_8668.png', 'KBAL PREAH WATERFALL', '20.00', '39.7 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=dwLesgbQqy8'),
(327, '20190826_2280.png', 'BOUSRA ECO-PARK', '20.00', '42.3 km', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=EpJOG4d5Xto'),
(328, '20190826_6191.png', 'KEO SEIMA WILDLIFE SANCTUARY', '20.00', 'Don\'t have', 15, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=QDVjhdPRXUs'),
(329, '20190826_2166.png', 'TEMPLE OF PREAH VIHEAR', '20.00', '46.0 km', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=MrBftm0SGAI'),
(330, '20190826_4036.png', 'PREAH KHAN KOMPONG SVAY', '20.00', '2 h 11 min (98.3 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sUH50my8wcc'),
(331, '20190826_6262.png', 'PHA MOR E DAENG', '20.00', '1 h 32 min (81.8 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=IjkSjVBpe-8'),
(332, '20190826_4184.png', 'EMERALD TRIANGLE', '20.00', 'Don\'t know', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=72CkhNKuEzE'),
(335, '20190826_8789.png', 'KHAO PHRA WIHAM NATIONAL PARK', '20.00', '1 h 31 min (81.6 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=nBrN1SyITMM'),
(336, '20190826_9102.png', 'BAS REILEF', '20.00', 'Don\'t have', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=cmwicYnMNow'),
(337, 'blank.png', 'CHONG BOK', '20.00', '2 h 26 min (127.4 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(338, '20190826_7845.png', 'PHNUM PREAH VIHEAR', '20.00', '46.0 km', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=gWxHAiEQkbw'),
(339, '20190826_6926.png', 'PRAM TEMPLE', '20.00', '52 min (61.0 km) via NR62 and NR64', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=X6MZpJEDmpQ'),
(340, '20190826_1301.png', 'PRASAT DAMREI', '20.00', '2 h 4 min (94.4 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=FWF3ptPoz7E'),
(341, '20190826_1695.png', 'THOM TEMPLE', '20.00', '58 min (64.9 km) via NR62 and NR64', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Jw8gmZQkB1s'),
(343, '20190826_6371.png', 'KULEN PRUM TEP WILDLIFE SANCTUARY', '20.00', '58 min (51.3 km) via NR62', 8, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=fptb_I-5Pn4'),
(344, '20190826_7788.png', 'LAKE YEAK LAOM', '20.00', '1 h 2 min (32.1 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=E-vcp6ZHUJs'),
(345, '20190826_3294.png', 'KATIENG WATERFALL', '20.00', '1 h 23 min (44.5 km) via NR78', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=cqOSNst4vBk'),
(346, '20190826_3529.png', 'KACHANH WATERFALL', '20.00', '1 h 5 min (35.0 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=sHffprATnfM'),
(347, '20190826_8667.png', '7 STEPS WATERFALL', '20.00', '1 h 38 min (50.9 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=bKGsUZ5QxL8'),
(348, '20190826_9632.png', 'BOENG YEAK LAOM', '20.00', '1 h 2 min (32.1 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=wuPJEilS1mg'),
(349, '20190826_3012.png', 'GREEN JUNGLE TREKKING TOURS-CAMBODIA', '20.00', '1 h 1 min (30.7 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=Yj7hyJUIjMo'),
(351, '20190826_7539.png', 'VIRACHEY NATIONAL PARK', '20.00', 'a44.7 km', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ppGtlx8gASg'),
(352, '20190826_5000.png', 'KAN SENG LAKE', '20.00', '53 min (27.1 km) via NR78A', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=WJEUW4BOcoo'),
(353, '20190826_9579.png', 'LUMPHAT WILDLIFE SANCTUARY', '20.00', '3 h 29 min (149.9 km) via NR76', 22, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=fptb_I-5Pn4'),
(355, '20190826_7064.png', 'BOTUM SAKOR NATIONAL PARK', '20.00', '2 h 19 min (133.1 km) via AH123/NR48', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=qj4YHWJrsRs'),
(356, '20190826_7442.png', 'KOH SDACH', '20.00', '77.6 km', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=uyvUvAPrkU0'),
(357, '20190826_1752.png', 'TATAI WATERFALL', '20.00', '42 min (33.1 km) via AH123/NR48', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=40A0YyI6I_s'),
(358, '20190826_6417.png', 'NOMADS LAND', '20.00', '2 h 1 min (136.5 km) via AH123/NR48 and Union Rd', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=0_Z5McX5vTw'),
(359, '20190826_9509.png', 'CHIPHAT VILLAGE', '20.00', '1 h 56 min (78.2 km) via 431', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ZClzAFsvvAI'),
(360, '20190826_7116.png', 'KOH TOTUNG', '20.00', '2 h 10 min (141.0 km) via AH123/NR48 and Union Rd', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=UNeMsUiGjlc'),
(361, '20190826_6080.png', 'KOH KONG BEACH', '20.00', '1 h 2 min (52.7 km) via AH123/NR48', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=e6xPHNjolrk'),
(362, '20190826_7807.png', 'PINEAPPLE ISLAND', '20.00', '2 h 7 min (143.9 km) via AH123/NR48 and Union Rd', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=hJaD9amRxKA'),
(363, '20190826_2529.png', 'KOH SMACH', '20.00', '1 h 56 min (133.9 km) via AH123/NR48 and Union Rd', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=PG53blk2lZo'),
(364, 'blank.png', 'KOH MOUL', '20.00', 'a', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=i1n7wVm2SxY'),
(366, '20190826_7532.png', 'KOH AMPIL THOM', '20.00', '81.0 km', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=CLM_LqZcr10'),
(368, '20190826_4811.png', 'PHNOM SAMKOS WILDLIFE SANCTUARY', '20.00', '5 h 50 min (176.0 km) via NR55', 12, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=4n91KZPwakU'),
(369, '20190826_2588.png', 'PRASAT SA MUEN THOM', '20.00', '63.3 km', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=xMPXQ_8AMe0'),
(370, '20190826_8743.png', 'CHONG CHOM', '20.00', 'Don\'t know', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=s_Kx-m6e4Cs'),
(371, '20190826_9682.png', 'CHONG SA-NGAM', '20.00', '33.0 km', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=ufvr8nbGX1s'),
(372, '20190826_2178.png', 'TAMOK HOUSE', '20.00', '29.4 km', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=AqWaSrtihNE'),
(373, '20190826_4405.png', 'TA MOAN COMPLEX', '20.00', '63.7 km', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=A6cnj1UxzGU'),
(374, '20190826_7139.png', 'KULEN PRUM TEP WILDLIFE SANCTUARY', '20.00', '80.3 km', 16, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=hfTlML4PwFE'),
(375, '20190826_7732.png', 'PHNOM SAMKOS', '20.00', '99.7 km', 20, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=2-2pt6n_UlI'),
(376, '20190826_7904.png', 'KAMPONG LOUNG FLOATING VILLAGE', '20.00', '54 min (44.7 km) via AH1/NR5', 20, '08:00', '11:00', '', '', '2 hrs 00 minutes', NULL, 'https://www.youtube.com/watch?v=tfbmbSsdytc'),
(377, '20190826_6074.png', 'PHNOM SAMKOS WILDLIFE SANCTUARY', '20.00', 'Don\'t know', 20, '08:10', '08:11', '', '', '2 hrs 00 minutes', NULL, 'Don\'t have'),
(378, 'blank.png', 'PHUMI PKA TROKOUN', '60', '27kM via Road 21B from Takhmau to Saang District.', 11, '08:00', '09:00', '', '<p>#ភូមិផ្កាត្រកួន បច្ចុប្បន្ន<br />\r\n<br />\r\nបងប្អូនមិនទាន់មានគម្រោងទៅដើរលេងឆ្លងឆ្នាំនៅទីណា សូមអញ្ជើញឆ្លងឆ្នាំទាំងអស់គ្នានៅរមណីយដ្ឋាន ភូមិផ្កាត្រកួន ធានាថានឹងទទួលអារម្មណ៍ស្រស់ថ្លាមិនខាន។<br />\r\n<br />\r\nចំពោះទីតាំង៖ ភូមិឫស្សីជ្រោយ ឃុំស្វាយប្រទាល ស្រុកស្អាងខេត្តកណ្តាលបេីគិតពីស្ពានតាខ្មៅផ្លូវ​ 21B ធ្វេីដំណេីរមករហូតប្រហែល​​17 km ឃេីញខាងឆ្វេងដៃមាន បឋម​និងអនុវិទ្យាល័យ​ហ៊ុនសែនឫស្សីជ្រោយនិងនៅខាងស្តាំដៃគឺវត្ត​ឫស្សីជ្រោយបទឆ្វេងតាមរបងសាលាមក​តែបន្តិចនិងឃេីញរមណីដ្ឋានផ្កាត្រកួនហេីយ​ ៕ពត៌មានបន្ថែម៖ 012381199</p>\r\n', '7 hrs 00 min', NULL, 'https://www.facebook.com/pichphay/videos/10220705324452453/?t=90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province_detail_img`
--

CREATE TABLE `tbl_province_detail_img` (
  `img_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_province_detail_img`
--

INSERT INTO `tbl_province_detail_img` (`img_id`, `pro_id`, `img_sub`) VALUES
(971, 4, '../image/province_detail//1566962522-download.jpg'),
(969, 4, '../image/province_detail//1566962518-download (1).jpg'),
(970, 4, '../image/province_detail//1566962522-download (3).jpg'),
(968, 4, '../image/province_detail//1566962518-download (2).jpg'),
(6, 2, '../image/province_detail//1565845234-1. 2AI-4997-PHP-001.jpg'),
(7, 2, '../image/province_detail//1565845234-2. 2AI-4997-PHP-001.jpg'),
(8, 2, '../image/province_detail//1565845235-3. 2AI-4997-PHP-001.jpg'),
(9, 2, '../image/province_detail//1565845237-4. 2AI-4997-PHP-001.jpg'),
(369, 306, '../image/province_detail//1566792996-download.jpg'),
(368, 306, '../image/province_detail//1566792992-download (2).jpg'),
(367, 306, '../image/province_detail//1566792992-download (1).jpg'),
(366, 304, '../image/province_detail//1566792948-maxresdefault.jpg'),
(365, 304, '../image/province_detail//1566792944-6.jpg'),
(364, 304, '../image/province_detail//1566792944-DSC_0447.JPG'),
(363, 303, '../image/province_detail//1566792890-images.jpg'),
(362, 303, '../image/province_detail//1566792887-images (1).jpg'),
(361, 303, '../image/province_detail//1566792887-images (2).jpg'),
(360, 303, '../image/province_detail//1566792881-download.jpg'),
(359, 303, '../image/province_detail//1566792881-download (3).jpg'),
(358, 303, '../image/province_detail//1566792870-download (1).jpg'),
(22, 192, '../image/province_detail//1566620066-5202380-Cantina_Del_Mar_at_Outres_Beach-0.jpg'),
(23, 192, '../image/province_detail//1566620084-maxresdefault.jpg'),
(24, 192, '../image/province_detail//1566620085-s-115110-land-for-sale-at-outres-b96-c.jpg'),
(25, 193, '../image/province_detail//1566620461-download.jpg'),
(26, 193, '../image/province_detail//1566620461-ream-national-park.jpg'),
(27, 193, '../image/province_detail//1566620475-Ream-National-Park-1.jpg'),
(28, 193, '../image/province_detail//1566620477-ream-national-park-day-tour-from-sihanoukville-tour-2-213518_1510029029.jpg'),
(31, 194, '../image/province_detail//1566620674-download.jpg'),
(32, 194, '../image/province_detail//1566620674-cem-cambodia-beach-shv-ochheuteal-09.jpg'),
(30, 193, '../image/province_detail//1566620487-Ream-National-Park-Cambodia-air-view.jpg'),
(33, 194, '../image/province_detail//1566620690-occweb1.jpg'),
(34, 194, '../image/province_detail//1566620690-Ochheuteal-Beach-sihanoukville-2.jpg'),
(35, 194, '../image/province_detail//1566620701-postcard_sight_smallR_292_1511146402.jpg'),
(36, 195, '../image/province_detail//1566620810-5acde1e985383f87a36.jpg'),
(37, 195, '../image/province_detail//1566620810-5214dccc_1538272477t.jpg'),
(38, 195, '../image/province_detail//1566620822-6881606_orig.jpg'),
(39, 195, '../image/province_detail//1566620823-Bungalows_On_Koh_Russei.jpg'),
(40, 195, '../image/province_detail//1566620830-download.jpg'),
(41, 196, '../image/province_detail//1566620963-download (1).jpg'),
(42, 196, '../image/province_detail//1566620963-Lazy-Beach-on-Koh-Rong-Samloem-2-1024x768.jpg'),
(43, 196, '../image/province_detail//1566620972-Lazy-Beach-on-Koh-Rong-Samloem-Island-in-Cambodia-2-1.jpg'),
(44, 196, '../image/province_detail//1566620972-Lazy-Beach-Pier-on-Koh-Rong-Samloem.jpg'),
(45, 197, '../image/province_detail//1566621059-44559_15081316300034221715.jpg'),
(46, 197, '../image/province_detail//1566621067-5902494fe479aad6e14232220acf0f0d-sokha-beach.jpg'),
(47, 197, '../image/province_detail//1566621070-download.jpg'),
(48, 197, '../image/province_detail//1566621082-maxresdefault.jpg'),
(49, 198, '../image/province_detail//1566621344-360_sihanoukville_beach.jpg'),
(50, 198, '../image/province_detail//1566621344-attraction-Independence-Beach-3.jpg'),
(51, 198, '../image/province_detail//1566621383-independence-beach.jpg'),
(52, 198, '../image/province_detail//1566621383-sihanoukville_beaches_indep2.jpg'),
(53, 199, '../image/province_detail//1566621466-download.jpg'),
(54, 199, '../image/province_detail//1566621466-download (1).jpg'),
(55, 199, '../image/province_detail//1566621485-Koh-Ta-Kiev-beach-chill.jpg'),
(56, 199, '../image/province_detail//1566621485-Koh-Ta-Kiev.jpg'),
(57, 200, '../image/province_detail//1566621695-download (1).jpg'),
(58, 200, '../image/province_detail//1566621695-download (2).jpg'),
(59, 200, '../image/province_detail//1566621701-download.jpg'),
(60, 200, '../image/province_detail//1566621701-getlstd-property-photo.jpg'),
(61, 201, '../image/province_detail//1566621803-download (3).jpg'),
(62, 201, '../image/province_detail//1566621803-at-the-wat-krom-pagoda.jpg'),
(63, 201, '../image/province_detail//1566621809-download.jpg'),
(64, 201, '../image/province_detail//1566621809-stopp-at-wat-leu-pagoda.jpg'),
(65, 202, '../image/province_detail//1566621921-caption.jpg'),
(66, 202, '../image/province_detail//1566621921-7Night_market_Phnom_Penh4.jpg'),
(67, 202, '../image/province_detail//1566621927-download.jpg'),
(68, 202, '../image/province_detail//1566621927-phsar-chas-old-market-siem-reap.jpg'),
(69, 204, '../image/province_detail//1566783740-download (2).jpg'),
(70, 204, '../image/province_detail//1566783741-attraction-Kbal-Chhay-Waterfall-3.jpg'),
(71, 204, '../image/province_detail//1566783747-download.jpg'),
(72, 204, '../image/province_detail//1566783747-kbal-chhay-waterfall-att-b.jpg'),
(73, 205, '../image/province_detail//1566783828-download.jpg'),
(74, 205, '../image/province_detail//1566783829-High-Point-Adventure-Park.jpg'),
(75, 205, '../image/province_detail//1566783833-images.jpg'),
(76, 205, '../image/province_detail//1566783833-high-point-rope-park.jpg'),
(77, 206, '../image/province_detail//1566783901-Golden-Lion-Roundabout-Sihanoukville-Cambodia.jpg'),
(78, 206, '../image/province_detail//1566783901-21.3.1-sihanoukville-golden-lions-roundabout_2.jpg'),
(79, 206, '../image/province_detail//1566783905-images.jpg'),
(80, 207, '../image/province_detail//1566784361-31650781984_6143729e3f_b.jpg'),
(81, 207, '../image/province_detail//1566784361-attraction-Wat-Krom.jpg'),
(82, 207, '../image/province_detail//1566784366-download.jpg'),
(83, 207, '../image/province_detail//1566784366-building-great-buddhist-temple-wat-intnhean-called-wat-krom-sihanoukville-also-known-as-kampong-som-cambodia-wat-intnhean-121908720.jpg'),
(84, 208, '../image/province_detail//1566784468-koh-seh-island-cambodia496.jpg'),
(85, 208, '../image/province_detail//1566784468-koh-seh-island-cambodia-1024x768.jpg'),
(86, 208, '../image/province_detail//1566784473-koh-seh-island-cambodia-e96.jpg'),
(87, 208, '../image/province_detail//1566784474-maxresdefault.jpg'),
(88, 209, '../image/province_detail//1566784546-Ream-Beach-1.jpg'),
(89, 209, '../image/province_detail//1566784546-attraction-Ream-Beach-2.jpg'),
(90, 209, '../image/province_detail//1566784552-Ream-Beach-sihanoukville.jpg'),
(91, 209, '../image/province_detail//1566784552-ream-beach-guesthouse.jpg'),
(92, 210, '../image/province_detail//1566784627-5ad5bf29aebd2f87a36.jpg'),
(93, 210, '../image/province_detail//1566784627-500_F_270140034_aqht5KqWtwfECCoc0NZQp2HcqZGO86KY.jpg'),
(94, 210, '../image/province_detail//1566784632-download.jpg'),
(95, 210, '../image/province_detail//1566784633-image4.jpg'),
(96, 211, '../image/province_detail//1566784689-download.jpg'),
(97, 213, '../image/province_detail//1566784837-download (1).jpg'),
(98, 213, '../image/province_detail//1566784837-163158443.jpg'),
(99, 213, '../image/province_detail//1566784842-download (2).jpg'),
(100, 213, '../image/province_detail//1566784842-download.jpg'),
(101, 213, '../image/province_detail//1566784846-pura-vita-resort.jpg'),
(102, 214, '../image/province_detail//1566784895-2.jpg'),
(103, 214, '../image/province_detail//1566784895-a.jpg'),
(104, 214, '../image/province_detail//1566784900-index.jpg'),
(105, 214, '../image/province_detail//1566784900-b.jpg'),
(106, 216, '../image/province_detail//1566784980-download.jpg'),
(107, 216, '../image/province_detail//1566784980-maxresdefault.jpg'),
(108, 216, '../image/province_detail//1566784984-snapshots-2017-2-koh-thas.jpg'),
(109, 217, '../image/province_detail//1566785057-najpiekniejsza-plaza.jpg'),
(110, 217, '../image/province_detail//1566785057-Nothing-Familiar-10.jpg'),
(111, 217, '../image/province_detail//1566785065-Saracen-Bay-on-Koh-Rong-Samloem-Island-in-Cambodia.jpg'),
(112, 217, '../image/province_detail//1566785066-Saracen-Bay-on-Koh-Rong-Samloem-14-1024x768.jpg'),
(113, 218, '../image/province_detail//1566785133-cambodia-travel-to-prek-treng-beach.jpg'),
(114, 218, '../image/province_detail//1566785133-360_sihanoukville_beach.jpg'),
(115, 218, '../image/province_detail//1566785138-download.jpg'),
(116, 218, '../image/province_detail//1566785138-maxresdefault.jpg'),
(117, 219, '../image/province_detail//1566785202-deluxe-twin.jpg'),
(118, 219, '../image/province_detail//1566785202-casino-game 3.jpg'),
(119, 219, '../image/province_detail//1566785206-download.jpg'),
(120, 220, '../image/province_detail//1566785286-download (1).jpg'),
(121, 220, '../image/province_detail//1566785286-120626145952945.jpg'),
(122, 220, '../image/province_detail//1566785293-download (2).jpg'),
(123, 220, '../image/province_detail//1566785293-download.jpg'),
(124, 221, '../image/province_detail//1566785354-6baeb2334f09289d769f427baeec67db.jpg'),
(125, 221, '../image/province_detail//1566785354-3643811_18020916250061677997.jpg'),
(126, 221, '../image/province_detail//1566785358-Koh-Thansour-Resort-photos-Exterior-Koh-Thansour-Resort.jpg'),
(127, 222, '../image/province_detail//1566785409-cem-cambodia-island-koun-01.jpg'),
(128, 222, '../image/province_detail//1566785409-cem-cambodia-island-koun-06.jpg'),
(129, 222, '../image/province_detail//1566785414-download.jpg'),
(130, 222, '../image/province_detail//1566785414-easy-tiger.jpg'),
(131, 223, '../image/province_detail//1566785469-P_20180613_181024.jpg'),
(132, 224, '../image/province_detail//1566785544-2018-11-28.jpg'),
(133, 224, '../image/province_detail//1566785544-ed9d8c_743ea750580c45409265167779ce16eb_mv2_d_2048_1365_s_2.jpg'),
(134, 225, '../image/province_detail//1566785629-download.jpg'),
(135, 225, '../image/province_detail//1566785629-IMG_8424.jpg'),
(136, 225, '../image/province_detail//1566785634-Kirirom-National-Park-Cambodia-3.jpg'),
(137, 225, '../image/province_detail//1566785634-KiriromNationalParkTripfromPhnomPenh.jpg'),
(138, 226, '../image/province_detail//1566785726-download.jpg'),
(139, 226, '../image/province_detail//1566785726-download (1).jpg'),
(140, 226, '../image/province_detail//1566785732-IMG_0647.JPG'),
(141, 226, '../image/province_detail//1566785732-hqdefault.jpg'),
(142, 227, '../image/province_detail//1566785799-download (2).jpg'),
(143, 227, '../image/province_detail//1566785799-download (1).jpg'),
(144, 227, '../image/province_detail//1566785804-download.jpg'),
(145, 227, '../image/province_detail//1566785804-GPExportPhoto-0001 with tag.jpg'),
(146, 228, '../image/province_detail//1566785875-download (1).jpg'),
(147, 228, '../image/province_detail//1566785875-download.jpg'),
(148, 228, '../image/province_detail//1566785881-fun-buggy-s-sihanoukville.jpg'),
(149, 228, '../image/province_detail//1566785881-fun-buggy-s.jpg'),
(150, 229, '../image/province_detail//1566785960-download.jpg'),
(151, 229, '../image/province_detail//1566785960-download (2).jpg'),
(152, 229, '../image/province_detail//1566785965-2017-11-23.jpg'),
(153, 230, '../image/province_detail//1566786020-20190316_220512.jpg'),
(154, 230, '../image/province_detail//1566786020-download (1).jpg'),
(155, 231, '../image/province_detail//1566786126-download (1).jpg'),
(156, 231, '../image/province_detail//1566786126-download.jpg'),
(157, 231, '../image/province_detail//1566786138-2018-11-13.jpg'),
(158, 231, '../image/province_detail//1566786138-111111.jpg'),
(159, 232, '../image/province_detail//1566786237-2019-05-21.jpg'),
(160, 232, '../image/province_detail//1566786237-download.jpg'),
(161, 232, '../image/province_detail//1566786291-download (2).jpg'),
(162, 233, '../image/province_detail//1566786349-2018-01-01.jpg'),
(163, 233, '../image/province_detail//1566786349-yaduoli.jpg'),
(164, 234, '../image/province_detail//1566786413-2017-08-05.jpg'),
(165, 235, '../image/province_detail//1566786472-download (1).jpg'),
(166, 235, '../image/province_detail//1566786473-Aerial-View-of-Saracen-Bay-on-Koh-Rong-Samloem-2223.jpg'),
(167, 235, '../image/province_detail//1566786477-download.jpg'),
(168, 235, '../image/province_detail//1566786477-koh-rong-saloem-island.jpg'),
(169, 237, '../image/province_detail//1566786594-download (1).jpg'),
(170, 237, '../image/province_detail//1566786594-download (2).jpg'),
(171, 237, '../image/province_detail//1566786599-download.jpg'),
(172, 237, '../image/province_detail//1566786599-P1050193.JPG'),
(173, 238, '../image/province_detail//1566786655-20190121_131604.jpg'),
(174, 238, '../image/province_detail//1566786655-spectacular-view-from.jpg'),
(175, 239, '../image/province_detail//1566786857-download (1).jpg'),
(176, 239, '../image/province_detail//1566786857-download (2).jpg'),
(177, 239, '../image/province_detail//1566786862-download.jpg'),
(178, 240, '../image/province_detail//1566786926-download (1).jpg'),
(179, 240, '../image/province_detail//1566786926-download (3).jpg'),
(180, 240, '../image/province_detail//1566786931-download.jpg'),
(181, 240, '../image/province_detail//1566786931-IMG_4861.JPG'),
(182, 241, '../image/province_detail//1566786985-download (2).jpg'),
(183, 241, '../image/province_detail//1566786985-attraction-Phnom Neang Kang Rey 1.jpg'),
(184, 241, '../image/province_detail//1566786992-download.jpg'),
(185, 241, '../image/province_detail//1566786993-gallery_sight_thumbR_462_1477983067.jpg'),
(186, 243, '../image/province_detail//1566787160-phnom-penh-tonle-sap.jpg'),
(187, 246, '../image/province_detail//1566787341-2016-06-09.jpg'),
(188, 246, '../image/province_detail//1566787341-2018-07-09.jpg'),
(189, 246, '../image/province_detail//1566787345-pursat-tourist-attraction.jpg'),
(190, 375, '../image/province_detail//1566787498-download.jpg'),
(191, 375, '../image/province_detail//1566787498-Phnom-Samkos-Mt-the-second-high-peak-of-the-Cardamoms-as-viewed-from-an-escarpment-of.png'),
(192, 376, '../image/province_detail//1566787575-2018-10-27.jpg'),
(193, 376, '../image/province_detail//1566787575-the-streets-of-kompong-luong.jpg'),
(194, 377, '../image/province_detail//1566787652-20170917_132744-EFFECTS.jpg'),
(195, 247, '../image/province_detail//1566787886-download.jpg'),
(196, 247, '../image/province_detail//1566787886-unnamed.jpg'),
(197, 247, '../image/province_detail//1566787892-download (1).jpg'),
(198, 247, '../image/province_detail//1566787892-5b1a055f2c6a8f87a36.jpg'),
(199, 248, '../image/province_detail//1566787954-20181123_120419.jpg'),
(200, 248, '../image/province_detail//1566787954-download (1).jpg'),
(201, 248, '../image/province_detail//1566787958-download (2).jpg'),
(202, 248, '../image/province_detail//1566787958-download.jpg'),
(203, 249, '../image/province_detail//1566788050-IMG_20190515_081708.jpg'),
(204, 249, '../image/province_detail//1566788050-download (3).jpg'),
(205, 251, '../image/province_detail//1566788217-IMG_25610207_005303.jpg'),
(206, 253, '../image/province_detail//1566788434-2016-10-23.jpg'),
(207, 254, '../image/province_detail//1566788492-download (1).jpg'),
(208, 254, '../image/province_detail//1566788492-poipet-city-star-vegas.jpg'),
(209, 254, '../image/province_detail//1566788496-download.jpg'),
(210, 255, '../image/province_detail//1566788544-download (1).jpg'),
(211, 255, '../image/province_detail//1566788544-download (2).jpg'),
(212, 255, '../image/province_detail//1566788549-download.jpg'),
(213, 256, '../image/province_detail//1566788598-download (1).jpg'),
(214, 256, '../image/province_detail//1566788598-286632_120511144117423.jpg'),
(215, 256, '../image/province_detail//1566788603-download.jpg'),
(216, 257, '../image/province_detail//1566788670-IMG20190707130223.jpg'),
(217, 257, '../image/province_detail//1566788670-5ad5772fb5244f87a36.jpg'),
(218, 258, '../image/province_detail//1566788865-download (1).jpg'),
(219, 258, '../image/province_detail//1566788865-Banteay-Chhmar-900x600.jpg'),
(220, 258, '../image/province_detail//1566788870-download.jpg'),
(221, 258, '../image/province_detail//1566788870-download (2).jpg'),
(222, 259, '../image/province_detail//1566788937-ai-dormis-dans-cet-hotel.jpg'),
(223, 259, '../image/province_detail//1566788937-122824369.jpg'),
(224, 260, '../image/province_detail//1566788994-download.jpg'),
(225, 260, '../image/province_detail//1566788994-download (1).jpg'),
(226, 262, '../image/province_detail//1566789149-unnamed.jpg'),
(227, 262, '../image/province_detail//1566789149-download (1).jpg'),
(228, 262, '../image/province_detail//1566789152-download.jpg'),
(229, 263, '../image/province_detail//1566789259-download (1).jpg'),
(230, 263, '../image/province_detail//1566789259-download (2).jpg'),
(231, 263, '../image/province_detail//1566789264-download (3).jpg'),
(232, 263, '../image/province_detail//1566789264-download.jpg'),
(233, 264, '../image/province_detail//1566789345-download (1).jpg'),
(234, 264, '../image/province_detail//1566789345-download (4).jpg'),
(235, 264, '../image/province_detail//1566789349-images.jpg'),
(236, 264, '../image/province_detail//1566789349-download.jpg'),
(237, 265, '../image/province_detail//1566789433-PC231202.JPG'),
(238, 265, '../image/province_detail//1566789433-1551259391-7486-03_crop_flip_800_450_f2f2f2_center-center.jpg'),
(239, 266, '../image/province_detail//1566789516-download (2).jpg'),
(240, 266, '../image/province_detail//1566789516-download (1).jpg'),
(241, 266, '../image/province_detail//1566789521-download (3).jpg'),
(242, 266, '../image/province_detail//1566789521-download.jpg'),
(243, 267, '../image/province_detail//1566789574-download.jpg'),
(244, 267, '../image/province_detail//1566789574-download (1).jpg'),
(245, 267, '../image/province_detail//1566789579-images.jpg'),
(246, 267, '../image/province_detail//1566789579-unnamed.jpg'),
(247, 268, '../image/province_detail//1566789628-download (1).jpg'),
(248, 268, '../image/province_detail//1566789628-download (2).jpg'),
(249, 268, '../image/province_detail//1566789633-EE7243F6-3505-4F3A-9587-22214778CC05-1921-00000107DAA9A368.jpg'),
(250, 268, '../image/province_detail//1566789633-download.jpg'),
(251, 269, '../image/province_detail//1566789687-download (1).jpg'),
(252, 269, '../image/province_detail//1566789687-download (2).jpg'),
(253, 269, '../image/province_detail//1566789692-download (3).jpg'),
(254, 269, '../image/province_detail//1566789692-download.jpg'),
(255, 269, '../image/province_detail//1566789697-prey-pros-rest-area.jpg'),
(256, 270, '../image/province_detail//1566789754-2018-03-18.jpg'),
(257, 270, '../image/province_detail//1566789754-download (4).jpg'),
(258, 272, '../image/province_detail//1566789911-download.jpg'),
(259, 272, '../image/province_detail//1566789911-download (1).jpg'),
(260, 272, '../image/province_detail//1566789915-IMG_4861.JPG'),
(261, 273, '../image/province_detail//1566790069-IMG_20181020_123829.jpg'),
(262, 273, '../image/province_detail//1566790069-wc002.jpg'),
(263, 274, '../image/province_detail//1566790322-2018-11-07.jpg'),
(264, 274, '../image/province_detail//1566790322-105619245-landscape-view-at-mekong-river-and-kizuna-bridge-in-kampong-cham-cambodia-.jpg'),
(265, 274, '../image/province_detail//1566790327-images.jpg'),
(266, 274, '../image/province_detail//1566790327-kizuna-bridge.jpg'),
(267, 275, '../image/province_detail//1566790384-cfdade7662f12a10d6701ec6bd708cad.jpg'),
(268, 275, '../image/province_detail//1566790385-4ECA46D500000578-6023301-image-m-11_1533298172665.jpg'),
(269, 275, '../image/province_detail//1566790390-download.jpg'),
(270, 275, '../image/province_detail//1566790390-maxresdefault.jpg'),
(271, 276, '../image/province_detail//1566790444-5b1e4e85025bdf87a36.jpg'),
(272, 276, '../image/province_detail//1566790444-banteay-srei-temple-angkor-siem-reap-cambodia-G1G8HC.jpg'),
(273, 276, '../image/province_detail//1566790448-images.jpg'),
(274, 276, '../image/province_detail//1566790448-download.jpg'),
(275, 277, '../image/province_detail//1566790581-download (1).jpg'),
(276, 277, '../image/province_detail//1566790581-download.jpg'),
(277, 277, '../image/province_detail//1566790585-download (2).jpg'),
(278, 277, '../image/province_detail//1566790586-hqdefault.jpg'),
(279, 278, '../image/province_detail//1566790660-download (1).jpg'),
(280, 278, '../image/province_detail//1566790660-download.jpg'),
(281, 278, '../image/province_detail//1566790667-vht_559412715b3f78.87597996.jpg'),
(282, 279, '../image/province_detail//1566790728-getlstd-property-photo.jpg'),
(283, 279, '../image/province_detail//1566790728-my-visit-to-real-cambodian-village.jpg'),
(284, 279, '../image/province_detail//1566790734-download (2).jpg'),
(285, 279, '../image/province_detail//1566790736-cheung-kok-village6.jpg'),
(287, 280, '../image/province_detail//1566790827-500_F_115324378_ukr1haD1MjCUOEjnUcZBOW0imsKkwush.jpg'),
(288, 280, '../image/province_detail//1566790828-a-beautiful-buddhist-pagoda-and-stupa-stand-in-the-sunlight-at-phnom-H2P4HD.jpg'),
(289, 280, '../image/province_detail//1566790832-img-20190616-091349-1.jpg'),
(290, 280, '../image/province_detail//1566790832-img-20190616-095155-largejpg.jpg'),
(291, 281, '../image/province_detail//1566790904-20190329-154527-largejpg.jpg'),
(292, 281, '../image/province_detail//1566790905-41597517124_4603ed4b47_b.jpg'),
(293, 281, '../image/province_detail//1566790909-IMG_20170920_072317.jpg'),
(294, 282, '../image/province_detail//1566791078-download (1).jpg'),
(295, 282, '../image/province_detail//1566791078-2019-05-21.jpg'),
(296, 282, '../image/province_detail//1566791083-download.jpg'),
(297, 282, '../image/province_detail//1566791083-download (2).jpg'),
(298, 282, '../image/province_detail//1566791088-images.jpg'),
(299, 283, '../image/province_detail//1566791219-20190415_195911.jpg'),
(300, 283, '../image/province_detail//1566791228-new-world-casino-hotel-murder.jpg'),
(301, 283, '../image/province_detail//1566791232-New-world-bavet.jpg'),
(302, 284, '../image/province_detail//1566791379-2018-07-14.jpg'),
(303, 285, '../image/province_detail//1566791500-download (1).jpg'),
(304, 285, '../image/province_detail//1566791500-download (2).jpg'),
(305, 285, '../image/province_detail//1566791507-download (4).jpg'),
(306, 285, '../image/province_detail//1566791507-download (3).jpg'),
(307, 285, '../image/province_detail//1566791513-download.jpg'),
(308, 286, '../image/province_detail//1566791566-download (5).jpg'),
(309, 286, '../image/province_detail//1566791566-download.jpg'),
(310, 286, '../image/province_detail//1566791572-images.jpg'),
(311, 286, '../image/province_detail//1566791572-Phnom-Penh-Safari.jpg'),
(312, 287, '../image/province_detail//1566791620-3647-ed060474619.jpg'),
(313, 287, '../image/province_detail//1566791620-111055422-koh-chen-kingdom-of-cambodia-august-21-2018-the-picturesque-village.jpg'),
(314, 287, '../image/province_detail//1566791626-download (1).jpg'),
(315, 287, '../image/province_detail//1566791626-koh_chen_1.jpg'),
(316, 288, '../image/province_detail//1566791704-download (1).jpg'),
(317, 288, '../image/province_detail//1566791704-150406-phnom-penh-april-6-2015-xinhua-people-travel-on-the-newly-built-EK317H.jpg'),
(318, 288, '../image/province_detail//1566791709-download.jpg'),
(319, 288, '../image/province_detail//1566791709-images.jpg'),
(320, 289, '../image/province_detail//1566791762-JH020416-3.jpg'),
(321, 289, '../image/province_detail//1566791762-42433888441_8ef0957911_b.jpg'),
(322, 289, '../image/province_detail//1566791766-little-noodle-shop.jpg'),
(323, 289, '../image/province_detail//1566791766-maxresdefault.jpg'),
(324, 290, '../image/province_detail//1566791814-download (1).jpg'),
(325, 290, '../image/province_detail//1566791814-download.jpg'),
(326, 291, '../image/province_detail//1566791864-download (1).jpg'),
(327, 291, '../image/province_detail//1566791864-download (2).jpg'),
(328, 291, '../image/province_detail//1566791869-download.jpg'),
(329, 291, '../image/province_detail//1566791869-g3.jpg'),
(330, 292, '../image/province_detail//1566791915-download (1).jpg'),
(331, 292, '../image/province_detail//1566791915-a-military-officer-walks-down-the-win-win-monument-steps.-heng-chivoan.jpg'),
(332, 292, '../image/province_detail//1566791920-download (2).jpg'),
(333, 292, '../image/province_detail//1566791920-download.jpg'),
(334, 293, '../image/province_detail//1566792106-download (3).jpg'),
(335, 293, '../image/province_detail//1566792106-5640401308_b8114cecb0_b.jpg'),
(336, 293, '../image/province_detail//1566792111-photo_2016-10-17_13-35-30.jpg'),
(337, 293, '../image/province_detail//1566792112-noeun-28092018-1.jpg'),
(338, 295, '../image/province_detail//1566792238-2017-03-22.jpg'),
(339, 296, '../image/province_detail//1566792305-download (1).jpg'),
(340, 296, '../image/province_detail//1566792305-download.jpg'),
(341, 296, '../image/province_detail//1566792313-hqdefault.jpg'),
(342, 298, '../image/province_detail//1566792407-download (1).jpg'),
(343, 298, '../image/province_detail//1566792407-download (2).jpg'),
(344, 298, '../image/province_detail//1566792413-download.jpg'),
(345, 298, '../image/province_detail//1566792413-download (3).jpg'),
(346, 299, '../image/province_detail//1566792464-download.jpg'),
(347, 299, '../image/province_detail//1566792464-IMG_4627.JPG'),
(348, 300, '../image/province_detail//1566792513-2019-05-09 (1).jpg'),
(349, 300, '../image/province_detail//1566792513-download (1).jpg'),
(350, 301, '../image/province_detail//1566792659-download (1).jpg'),
(351, 301, '../image/province_detail//1566792659-Cambodia_Kratie_Koh-Trong_man-cows-H.jpg'),
(352, 301, '../image/province_detail//1566792664-download (2).jpg'),
(353, 301, '../image/province_detail//1566792664-download.jpg'),
(354, 302, '../image/province_detail//1566792718-download (1).jpg'),
(355, 302, '../image/province_detail//1566792718-download (2).jpg'),
(356, 302, '../image/province_detail//1566792722-download (3).jpg'),
(357, 302, '../image/province_detail//1566792722-download.jpg'),
(370, 306, '../image/province_detail//1566792996-download (3).jpg'),
(371, 307, '../image/province_detail//1566793047-download (2).jpg'),
(372, 307, '../image/province_detail//1566793047-download (1).jpg'),
(373, 307, '../image/province_detail//1566793052-download (4).jpg'),
(374, 307, '../image/province_detail//1566793052-download.jpg'),
(375, 308, '../image/province_detail//1566793114-360_dolphins-1.jpg'),
(376, 308, '../image/province_detail//1566793114-845-9.jpg'),
(377, 308, '../image/province_detail//1566793119-847-9.jpg'),
(378, 308, '../image/province_detail//1566793119-download.jpg'),
(379, 310, '../image/province_detail//1566793615-download (1).jpg'),
(380, 310, '../image/province_detail//1566793615-download (2).jpg'),
(381, 310, '../image/province_detail//1566793619-download (3).jpg'),
(382, 310, '../image/province_detail//1566793619-download.jpg'),
(383, 311, '../image/province_detail//1566793670-download (2).jpg'),
(384, 311, '../image/province_detail//1566793670-download (1).jpg'),
(385, 311, '../image/province_detail//1566793674-download.jpg'),
(386, 311, '../image/province_detail//1566793674-download (4).jpg'),
(387, 312, '../image/province_detail//1566793722-download.jpg'),
(388, 312, '../image/province_detail//1566793722-download (1).jpg'),
(389, 312, '../image/province_detail//1566793731-DSC2947-768x509.jpg'),
(390, 312, '../image/province_detail//1566793732-home-hero-03.jpg'),
(391, 313, '../image/province_detail//1566793786-download (2).jpg'),
(392, 313, '../image/province_detail//1566793786-download (1).jpg'),
(393, 313, '../image/province_detail//1566793791-download (3).jpg'),
(394, 313, '../image/province_detail//1566793791-download.jpg'),
(395, 314, '../image/province_detail//1566793863-2017-12-10.jpg'),
(396, 315, '../image/province_detail//1566793963-download (1).jpg'),
(397, 315, '../image/province_detail//1566793963-download (2).jpg'),
(398, 315, '../image/province_detail//1566793969-download.jpg'),
(399, 315, '../image/province_detail//1566793969-slide-show2.jpg'),
(400, 316, '../image/province_detail//1566794127-download (1).jpg'),
(401, 316, '../image/province_detail//1566794127-download (2).jpg'),
(402, 316, '../image/province_detail//1566794132-download.jpg'),
(403, 316, '../image/province_detail//1566794132-download (3).jpg'),
(404, 317, '../image/province_detail//1566794266-download (1).jpg'),
(405, 317, '../image/province_detail//1566794266-download (2).jpg'),
(406, 317, '../image/province_detail//1566794271-download (3).jpg'),
(407, 317, '../image/province_detail//1566794271-download (4).jpg'),
(408, 317, '../image/province_detail//1566794275-download.jpg'),
(409, 318, '../image/province_detail//1566794355-download (1).jpg'),
(410, 318, '../image/province_detail//1566794355-download (2).jpg'),
(411, 318, '../image/province_detail//1566794360-download (4).jpg'),
(412, 318, '../image/province_detail//1566794360-download.jpg'),
(413, 319, '../image/province_detail//1566794414-download (1).jpg'),
(414, 319, '../image/province_detail//1566794414-download (2).jpg'),
(415, 319, '../image/province_detail//1566794420-download (3).jpg'),
(416, 319, '../image/province_detail//1566794420-download.jpg'),
(417, 320, '../image/province_detail//1566794502-download (4).jpg'),
(418, 320, '../image/province_detail//1566794502-images (1).jpg'),
(419, 320, '../image/province_detail//1566794506-images.jpg'),
(420, 320, '../image/province_detail//1566794506-images (2).jpg'),
(421, 321, '../image/province_detail//1566794768-download.jpg'),
(422, 321, '../image/province_detail//1566794768-images (1).jpg'),
(423, 321, '../image/province_detail//1566794773-images (2).jpg'),
(424, 321, '../image/province_detail//1566794773-images.jpg'),
(425, 322, '../image/province_detail//1566794828-download (1).jpg'),
(426, 322, '../image/province_detail//1566794828-download (2).jpg'),
(427, 322, '../image/province_detail//1566794832-download.jpg'),
(428, 322, '../image/province_detail//1566794832-download (3).jpg'),
(429, 323, '../image/province_detail//1566794891-download (1).jpg'),
(430, 323, '../image/province_detail//1566794891-download (2).jpg'),
(431, 323, '../image/province_detail//1566794896-download.jpg'),
(432, 323, '../image/province_detail//1566794897-standard_sl-sea-forest-pic2.jpg'),
(433, 324, '../image/province_detail//1566794944-download (1).jpg'),
(434, 324, '../image/province_detail//1566794944-download (2).jpg'),
(435, 324, '../image/province_detail//1566794949-download (3).jpg'),
(436, 324, '../image/province_detail//1566794949-download.jpg'),
(437, 325, '../image/province_detail//1566795007-download (1).jpg'),
(438, 325, '../image/province_detail//1566795007-download (2).jpg'),
(439, 325, '../image/province_detail//1566795012-download.jpg'),
(440, 325, '../image/province_detail//1566795012-download (4).jpg'),
(441, 327, '../image/province_detail//1566795118-download (1).jpg'),
(442, 327, '../image/province_detail//1566795118-download (2).jpg'),
(443, 327, '../image/province_detail//1566795123-download (3).jpg'),
(444, 327, '../image/province_detail//1566795123-download.jpg'),
(445, 328, '../image/province_detail//1566795238-download (4).jpg'),
(446, 329, '../image/province_detail//1566804880-download (1).jpg'),
(447, 329, '../image/province_detail//1566804880-download (2).jpg'),
(448, 329, '../image/province_detail//1566804887-download (3).jpg'),
(449, 329, '../image/province_detail//1566804887-download (5).jpg'),
(450, 329, '../image/province_detail//1566804892-download.jpg'),
(451, 330, '../image/province_detail//1566804966-download (2).jpg'),
(452, 330, '../image/province_detail//1566804966-download (1).jpg'),
(453, 330, '../image/province_detail//1566804974-download.jpg'),
(454, 330, '../image/province_detail//1566804974-images.jpg'),
(455, 331, '../image/province_detail//1566805046-download (1).jpg'),
(456, 331, '../image/province_detail//1566805046-download (3).jpg'),
(457, 331, '../image/province_detail//1566805051-download.jpg'),
(460, 332, '../image/province_detail//1566805204-2016-01-29.jpg'),
(459, 331, '../image/province_detail//1566805062-stock-photo-cliff-of-pha-mor-e-daeng-524640013.jpg'),
(461, 332, '../image/province_detail//1566805204-download.jpg'),
(462, 332, '../image/province_detail//1566805210-Pha-Taem-view-blog.jpg'),
(463, 332, '../image/province_detail//1566805211-DSC02116.JPG'),
(464, 335, '../image/province_detail//1566805469-download (1).jpg'),
(465, 335, '../image/province_detail//1566805469-download (2).jpg'),
(466, 335, '../image/province_detail//1566805477-download.jpg'),
(467, 335, '../image/province_detail//1566805477-Khao_Phra_Wihan_National_Park_–_Border_between_Thailand_and_Cambodia._-_panoramio.jpg'),
(468, 336, '../image/province_detail//1566805611-download (1).jpg'),
(469, 336, '../image/province_detail//1566805611-download (2).jpg'),
(470, 336, '../image/province_detail//1566805617-download.jpg'),
(471, 336, '../image/province_detail//1566805617-download (3).jpg'),
(472, 338, '../image/province_detail//1566805837-220px-Gopura_V_at_Preah_Vihear_temple.jpg'),
(473, 338, '../image/province_detail//1566805837-220px-Preahvihear112.jpg'),
(474, 338, '../image/province_detail//1566805844-Preah_Vihear_1.jpg'),
(475, 338, '../image/province_detail//1566805844-preah-vihear-temple1.jpg'),
(476, 339, '../image/province_detail//1566805906-download (1).jpg'),
(477, 339, '../image/province_detail//1566805906-download.jpg'),
(478, 339, '../image/province_detail//1566805912-images (1).jpg'),
(479, 339, '../image/province_detail//1566805912-images.jpg'),
(480, 340, '../image/province_detail//1566805957-download (1).jpg'),
(481, 340, '../image/province_detail//1566805957-bc53d507c26770e8f294fcbf92ef0864_XL.jpg'),
(482, 340, '../image/province_detail//1566805963-download (2).jpg'),
(483, 340, '../image/province_detail//1566805963-download.jpg'),
(484, 341, '../image/province_detail//1566806077-images (1).jpg'),
(485, 341, '../image/province_detail//1566806077-images.jpg'),
(486, 341, '../image/province_detail//1566806080-download (3).jpg'),
(487, 343, '../image/province_detail//1566806245-DSC_1867.JPG'),
(488, 344, '../image/province_detail//1566806333-download (1).jpg'),
(489, 344, '../image/province_detail//1566806333-download (2).jpg'),
(490, 344, '../image/province_detail//1566806338-download (3).jpg'),
(491, 344, '../image/province_detail//1566806338-download.jpg'),
(492, 345, '../image/province_detail//1566806422-download (1).jpg'),
(493, 345, '../image/province_detail//1566806422-download (2).jpg'),
(494, 345, '../image/province_detail//1566806427-download (4).jpg'),
(495, 345, '../image/province_detail//1566806427-download.jpg'),
(496, 346, '../image/province_detail//1566806481-download (2).jpg'),
(497, 346, '../image/province_detail//1566806481-download (3).jpg'),
(498, 346, '../image/province_detail//1566806489-download (1).jpg'),
(499, 346, '../image/province_detail//1566806493-download.jpg'),
(500, 347, '../image/province_detail//1566806546-download (1).jpg'),
(501, 347, '../image/province_detail//1566806546-download (2).jpg'),
(502, 347, '../image/province_detail//1566806551-download (4).jpg'),
(503, 347, '../image/province_detail//1566806551-download.jpg'),
(504, 348, '../image/province_detail//1566806603-download (3).jpg'),
(505, 348, '../image/province_detail//1566806603-download (1).jpg'),
(506, 348, '../image/province_detail//1566806607-download.jpg'),
(507, 348, '../image/province_detail//1566806607-images.jpg'),
(508, 349, '../image/province_detail//1566806658-download (1).jpg'),
(509, 349, '../image/province_detail//1566806658-download (2).jpg'),
(510, 349, '../image/province_detail//1566806663-download.jpg'),
(511, 349, '../image/province_detail//1566806663-download (3).jpg'),
(512, 351, '../image/province_detail//1566806723-2019-03-26.jpg'),
(513, 351, '../image/province_detail//1566806723-download (1).jpg'),
(514, 351, '../image/province_detail//1566806727-download.jpg'),
(515, 351, '../image/province_detail//1566806727-download (2).jpg'),
(516, 352, '../image/province_detail//1566806788-download (1).jpg'),
(517, 352, '../image/province_detail//1566806788-download (2).jpg'),
(518, 352, '../image/province_detail//1566806792-download (3).jpg'),
(519, 352, '../image/province_detail//1566806792-download.jpg'),
(520, 353, '../image/province_detail//1566806853-download (2).jpg'),
(521, 353, '../image/province_detail//1566806853-download (1).jpg'),
(522, 353, '../image/province_detail//1566806859-download.jpg'),
(523, 353, '../image/province_detail//1566806859-download (4).jpg'),
(524, 355, '../image/province_detail//1566806930-download (2).jpg'),
(525, 355, '../image/province_detail//1566806930-download (1).jpg'),
(526, 355, '../image/province_detail//1566806934-download (3).jpg'),
(527, 355, '../image/province_detail//1566806934-download.jpg'),
(528, 356, '../image/province_detail//1566806994-download (1).jpg'),
(529, 356, '../image/province_detail//1566806995-download (2).jpg'),
(530, 356, '../image/province_detail//1566806999-download.jpg'),
(531, 356, '../image/province_detail//1566806999-download (4).jpg'),
(532, 357, '../image/province_detail//1566807063-download (1).jpg'),
(533, 357, '../image/province_detail//1566807063-download (2).jpg'),
(534, 357, '../image/province_detail//1566807068-download (3).jpg'),
(535, 357, '../image/province_detail//1566807068-download.jpg'),
(536, 358, '../image/province_detail//1566807284-download (1).jpg'),
(537, 358, '../image/province_detail//1566807284-download (4).jpg'),
(538, 358, '../image/province_detail//1566807289-images.jpg'),
(539, 358, '../image/province_detail//1566807289-download.jpg'),
(540, 359, '../image/province_detail//1566807385-download (1).jpg'),
(541, 359, '../image/province_detail//1566807385-download (2).jpg'),
(542, 359, '../image/province_detail//1566807391-images.jpg'),
(543, 359, '../image/province_detail//1566807391-download.jpg'),
(544, 360, '../image/province_detail//1566807495-download (1).jpg'),
(545, 360, '../image/province_detail//1566807495-download (2).jpg'),
(546, 360, '../image/province_detail//1566807499-download.jpg'),
(547, 360, '../image/province_detail//1566807499-download (3).jpg'),
(548, 361, '../image/province_detail//1566807617-download (1).jpg'),
(549, 361, '../image/province_detail//1566807617-download.jpg'),
(550, 361, '../image/province_detail//1566807622-images (1).jpg'),
(551, 361, '../image/province_detail//1566807622-images.jpg'),
(552, 362, '../image/province_detail//1566807675-2019-03-15.jpg'),
(553, 362, '../image/province_detail//1566807675-images (2).jpg'),
(554, 363, '../image/province_detail//1566807814-download.jpg'),
(555, 363, '../image/province_detail//1566807814-download (1).jpg'),
(556, 363, '../image/province_detail//1566807818-images (1).jpg'),
(557, 363, '../image/province_detail//1566807818-images.jpg'),
(558, 366, '../image/province_detail//1566807875-2019-07-04.jpg'),
(559, 368, '../image/province_detail//1566807940-20170917_132744-EFFECTS.jpg'),
(560, 368, '../image/province_detail//1566807941-download.jpg'),
(561, 369, '../image/province_detail//1566808106-download (1).jpg'),
(562, 369, '../image/province_detail//1566808106-download (2).jpg'),
(563, 369, '../image/province_detail//1566808110-download.jpg'),
(564, 370, '../image/province_detail//1566808200-download.jpg'),
(565, 370, '../image/province_detail//1566808200-2018-09-06.jpg'),
(566, 371, '../image/province_detail//1566808252-download (2).jpg'),
(567, 371, '../image/province_detail//1566808252-download (1).jpg'),
(568, 371, '../image/province_detail//1566808257-download.jpg'),
(569, 372, '../image/province_detail//1566808299-download (2).jpg'),
(570, 372, '../image/province_detail//1566808299-download (1).jpg'),
(571, 372, '../image/province_detail//1566808302-download.jpg'),
(572, 372, '../image/province_detail//1566808302-download (3).jpg'),
(573, 373, '../image/province_detail//1566808556-download (1).jpg'),
(574, 373, '../image/province_detail//1566808556-download (2).jpg'),
(575, 373, '../image/province_detail//1566808562-download (4).jpg'),
(576, 373, '../image/province_detail//1566808562-download (3).jpg'),
(577, 373, '../image/province_detail//1566808566-download.jpg'),
(578, 374, '../image/province_detail//1566808621-111.jpg'),
(579, 374, '../image/province_detail//1566808621-download (1).jpg'),
(580, 374, '../image/province_detail//1566808625-download (4).jpg'),
(581, 374, '../image/province_detail//1566808625-download.jpg'),
(582, 374, '../image/province_detail//1566808629-DSC_1867.JPG'),
(583, 121, '../image/province_detail//1566809945-download (1).jpg'),
(584, 121, '../image/province_detail//1566809945-download (2).jpg'),
(585, 121, '../image/province_detail//1566809950-download.jpg'),
(586, 121, '../image/province_detail//1566809950-download (5).jpg'),
(587, 121, '../image/province_detail//1566809954-images.jpg'),
(588, 122, '../image/province_detail//1566810085-download (1).jpg'),
(589, 122, '../image/province_detail//1566810085-download (2).jpg'),
(590, 122, '../image/province_detail//1566810091-download (4).jpg'),
(591, 122, '../image/province_detail//1566810091-download (3).jpg'),
(592, 122, '../image/province_detail//1566810096-download.jpg'),
(593, 123, '../image/province_detail//1566810276-download (5).jpg'),
(594, 123, '../image/province_detail//1566810276-download.jpg'),
(595, 123, '../image/province_detail//1566810281-download (3).jpg'),
(596, 123, '../image/province_detail//1566810281-download (2).jpg'),
(597, 123, '../image/province_detail//1566810286-download (1).jpg'),
(598, 124, '../image/province_detail//1566810400-download (1).jpg'),
(599, 124, '../image/province_detail//1566810400-download (2).jpg'),
(600, 124, '../image/province_detail//1566810404-download (4).jpg'),
(601, 124, '../image/province_detail//1566810404-download (3).jpg'),
(602, 124, '../image/province_detail//1566810408-download.jpg'),
(603, 125, '../image/province_detail//1566810572-download (1).jpg'),
(604, 125, '../image/province_detail//1566810572-download (5).jpg'),
(605, 125, '../image/province_detail//1566810579-download.jpg'),
(606, 125, '../image/province_detail//1566810579-images (1).jpg'),
(607, 125, '../image/province_detail//1566810593-images.jpg'),
(608, 126, '../image/province_detail//1566810814-images (2).jpg'),
(609, 127, '../image/province_detail//1566811190-download (1).jpg'),
(610, 127, '../image/province_detail//1566811191-download (2).jpg'),
(611, 127, '../image/province_detail//1566811196-download.jpg'),
(612, 127, '../image/province_detail//1566811196-download (3).jpg'),
(613, 127, '../image/province_detail//1566811200-images.jpg'),
(614, 128, '../image/province_detail//1566811445-download (2).jpg'),
(615, 128, '../image/province_detail//1566811445-download (1).jpg'),
(616, 128, '../image/province_detail//1566811451-download (3).jpg'),
(617, 128, '../image/province_detail//1566811451-download (4).jpg'),
(618, 128, '../image/province_detail//1566811455-download.jpg'),
(619, 129, '../image/province_detail//1566811823-download (1).jpg'),
(620, 129, '../image/province_detail//1566811823-download (2).jpg'),
(621, 129, '../image/province_detail//1566811829-download (5).jpg'),
(622, 129, '../image/province_detail//1566811829-download (3).jpg'),
(623, 129, '../image/province_detail//1566811833-download.jpg'),
(624, 130, '../image/province_detail//1566811948-download (1).jpg'),
(625, 130, '../image/province_detail//1566811948-download (2).jpg'),
(626, 130, '../image/province_detail//1566811954-download (4).jpg'),
(627, 130, '../image/province_detail//1566811954-download.jpg'),
(628, 130, '../image/province_detail//1566811958-images.jpg'),
(629, 131, '../image/province_detail//1566812163-download (1).jpg'),
(630, 131, '../image/province_detail//1566812163-download (2).jpg'),
(631, 131, '../image/province_detail//1566812168-download.jpg'),
(632, 131, '../image/province_detail//1566812168-download (3).jpg'),
(633, 131, '../image/province_detail//1566812171-images.jpg'),
(634, 132, '../image/province_detail//1566812313-download.jpg'),
(635, 132, '../image/province_detail//1566812313-download (4).jpg'),
(636, 132, '../image/province_detail//1566812318-download (2).jpg'),
(637, 132, '../image/province_detail//1566812318-download (3).jpg'),
(638, 132, '../image/province_detail//1566812321-download (1).jpg'),
(639, 134, '../image/province_detail//1566812678-download (1).jpg'),
(640, 134, '../image/province_detail//1566812678-download (2).jpg'),
(641, 134, '../image/province_detail//1566812683-download (5).jpg'),
(642, 134, '../image/province_detail//1566812683-download.jpg'),
(643, 134, '../image/province_detail//1566812687-images.jpg'),
(644, 135, '../image/province_detail//1566812833-download (1).jpg'),
(645, 135, '../image/province_detail//1566812833-download (2).jpg'),
(646, 135, '../image/province_detail//1566812838-download (4).jpg'),
(647, 135, '../image/province_detail//1566812838-download (3).jpg'),
(648, 135, '../image/province_detail//1566812843-download.jpg'),
(649, 136, '../image/province_detail//1566812980-download (2).jpg'),
(650, 136, '../image/province_detail//1566812980-download (1).jpg'),
(651, 136, '../image/province_detail//1566812984-download (3).jpg'),
(652, 136, '../image/province_detail//1566812984-download (5).jpg'),
(653, 136, '../image/province_detail//1566812989-download.jpg'),
(654, 137, '../image/province_detail//1566813145-download (4).jpg'),
(655, 137, '../image/province_detail//1566813145-download.jpg'),
(656, 138, '../image/province_detail//1566813385-2017-03-01.jpg'),
(657, 139, '../image/province_detail//1566813507-download (2).jpg'),
(658, 139, '../image/province_detail//1566813508-download (1).jpg'),
(659, 139, '../image/province_detail//1566813516-download (3).jpg'),
(660, 139, '../image/province_detail//1566813516-download (4).jpg'),
(661, 139, '../image/province_detail//1566813519-download.jpg'),
(662, 140, '../image/province_detail//1566813772-download (1).jpg'),
(663, 140, '../image/province_detail//1566813773-download (5).jpg'),
(664, 140, '../image/province_detail//1566813778-images.jpg'),
(665, 140, '../image/province_detail//1566813778-download.jpg'),
(666, 141, '../image/province_detail//1566813998-download (2).jpg'),
(667, 141, '../image/province_detail//1566813998-download (1).jpg'),
(668, 141, '../image/province_detail//1566814002-download (3).jpg'),
(669, 141, '../image/province_detail//1566814002-download.jpg'),
(670, 142, '../image/province_detail//1566814120-download (1).jpg'),
(671, 142, '../image/province_detail//1566814121-download (2).jpg'),
(672, 142, '../image/province_detail//1566814125-download (3).jpg'),
(673, 142, '../image/province_detail//1566814125-download (4).jpg'),
(674, 142, '../image/province_detail//1566814128-download.jpg'),
(675, 143, '../image/province_detail//1566814235-download (5).jpg'),
(676, 143, '../image/province_detail//1566814235-download.jpg'),
(677, 144, '../image/province_detail//1566955134-download (2).jpg'),
(678, 144, '../image/province_detail//1566955134-download (1).jpg'),
(679, 144, '../image/province_detail//1566955141-download (3).jpg'),
(680, 144, '../image/province_detail//1566955141-download (4).jpg'),
(681, 144, '../image/province_detail//1566955146-download.jpg'),
(682, 145, '../image/province_detail//1566955268-download.jpg'),
(683, 145, '../image/province_detail//1566955268-P1220543-600x450.jpg'),
(684, 145, '../image/province_detail//1566955273-download (2).jpg'),
(685, 145, '../image/province_detail//1566955273-download (5).jpg'),
(686, 145, '../image/province_detail//1566955276-download (1).jpg'),
(687, 146, '../image/province_detail//1566955385-download (1).jpg'),
(688, 146, '../image/province_detail//1566955385-download (2).jpg'),
(689, 146, '../image/province_detail//1566955390-download (4).jpg'),
(690, 146, '../image/province_detail//1566955390-download (3).jpg'),
(691, 146, '../image/province_detail//1566955394-download.jpg'),
(692, 147, '../image/province_detail//1566955456-download (1).jpg'),
(693, 147, '../image/province_detail//1566955456-download (2).jpg'),
(694, 147, '../image/province_detail//1566955462-download (3).jpg'),
(695, 147, '../image/province_detail//1566955462-download (5).jpg'),
(696, 147, '../image/province_detail//1566955467-download.jpg'),
(697, 148, '../image/province_detail//1566955538-download (1).jpg'),
(698, 148, '../image/province_detail//1566955538-download (2).jpg'),
(699, 148, '../image/province_detail//1566955544-download.jpg'),
(700, 148, '../image/province_detail//1566955545-download (4).jpg'),
(701, 149, '../image/province_detail//1566955599-download (1).jpg'),
(702, 149, '../image/province_detail//1566955599-download (2).jpg'),
(703, 149, '../image/province_detail//1566955604-download (4).jpg'),
(704, 149, '../image/province_detail//1566955604-download (3).jpg'),
(705, 149, '../image/province_detail//1566955619-download.jpg'),
(706, 150, '../image/province_detail//1566955694-download (2).jpg'),
(707, 150, '../image/province_detail//1566955694-download (1).jpg'),
(708, 150, '../image/province_detail//1566955699-download.jpg'),
(709, 150, '../image/province_detail//1566955699-download (5).jpg'),
(710, 150, '../image/province_detail//1566955705-images.jpg'),
(711, 151, '../image/province_detail//1566955799-download (2).jpg'),
(712, 151, '../image/province_detail//1566955799-download (1).jpg'),
(713, 151, '../image/province_detail//1566955805-download (3).jpg'),
(714, 151, '../image/province_detail//1566955805-download (4).jpg'),
(715, 151, '../image/province_detail//1566955811-download.jpg'),
(716, 152, '../image/province_detail//1566955866-download (5).jpg'),
(717, 152, '../image/province_detail//1566955866-a.jpg'),
(718, 152, '../image/province_detail//1566955873-IMG_20181203_123744.jpg'),
(719, 152, '../image/province_detail//1566955873-Kep-Crab-Statue.jpg'),
(720, 153, '../image/province_detail//1566956002-download (1).jpg'),
(721, 153, '../image/province_detail//1566956002-download (2).jpg'),
(722, 153, '../image/province_detail//1566956012-download (3).jpg'),
(723, 153, '../image/province_detail//1566956013-download.jpg'),
(724, 153, '../image/province_detail//1566956018-images.jpg'),
(725, 155, '../image/province_detail//1566956085-download (1).jpg'),
(726, 155, '../image/province_detail//1566956085-download (4).jpg'),
(727, 155, '../image/province_detail//1566956091-download.jpg'),
(728, 156, '../image/province_detail//1566956201-20190128_092749.300x200.jpg'),
(729, 156, '../image/province_detail//1566956201-download (2).jpg'),
(730, 156, '../image/province_detail//1566956212-hqdefault.jpg'),
(731, 156, '../image/province_detail//1566956212-images.jpg'),
(732, 156, '../image/province_detail//1566956218-Lady Statue 3.jpg'),
(733, 50, '../image/province_detail//1566956601-download (1).jpg'),
(734, 50, '../image/province_detail//1566956601-bamboo-train-battambang.jpg'),
(735, 50, '../image/province_detail//1566956608-download (2).jpg'),
(736, 50, '../image/province_detail//1566956608-download.jpg'),
(737, 50, '../image/province_detail//1566956612-images.jpg'),
(738, 51, '../image/province_detail//1566956712-download (2).jpg'),
(739, 51, '../image/province_detail//1566956712-download (1).jpg');
INSERT INTO `tbl_province_detail_img` (`img_id`, `pro_id`, `img_sub`) VALUES
(740, 51, '../image/province_detail//1566956717-download.jpg'),
(741, 51, '../image/province_detail//1566956717-download (3).jpg'),
(742, 51, '../image/province_detail//1566956721-images.jpg'),
(743, 52, '../image/province_detail//1566956884-download (2).jpg'),
(744, 52, '../image/province_detail//1566956884-download (1).jpg'),
(745, 52, '../image/province_detail//1566956888-download (4).jpg'),
(746, 52, '../image/province_detail//1566956888-download (3).jpg'),
(747, 52, '../image/province_detail//1566956892-download.jpg'),
(748, 53, '../image/province_detail//1566956937-download (4).jpg'),
(749, 53, '../image/province_detail//1566956937-download (1).jpg'),
(750, 53, '../image/province_detail//1566956941-download.jpg'),
(751, 53, '../image/province_detail//1566956941-mrs-bun-roeung-s-ancient.jpg'),
(752, 54, '../image/province_detail//1566956995-2018-06-04.jpg'),
(753, 54, '../image/province_detail//1566956995-download (2).jpg'),
(754, 54, '../image/province_detail//1566957001-download.jpg'),
(755, 54, '../image/province_detail//1566957002-entrance-of-the-museum.jpg'),
(756, 54, '../image/province_detail//1566957008-full-day-battambang-with-the-road-of-arts-in-krong-battambang-500320.jpg'),
(757, 55, '../image/province_detail//1566957093-back.jpg'),
(758, 55, '../image/province_detail//1566957093-D_L3fZwU0AAQyhI.jpg'),
(759, 55, '../image/province_detail//1566957098-hqdefault.jpg'),
(760, 55, '../image/province_detail//1566957098-the-namesake-of-the-city.jpg'),
(761, 56, '../image/province_detail//1566957173-download (1).jpg'),
(762, 56, '../image/province_detail//1566957174-download (2).jpg'),
(763, 56, '../image/province_detail//1566957178-download (3).jpg'),
(764, 56, '../image/province_detail//1566957178-download (4).jpg'),
(765, 56, '../image/province_detail//1566957182-download.jpg'),
(766, 57, '../image/province_detail//1566957253-download (1).jpg'),
(767, 57, '../image/province_detail//1566957253-download (5).jpg'),
(768, 57, '../image/province_detail//1566957305-download.jpg'),
(769, 57, '../image/province_detail//1566957305-images (1).jpg'),
(770, 57, '../image/province_detail//1566957316-images.jpg'),
(771, 58, '../image/province_detail//1566957384-download (1).jpg'),
(772, 58, '../image/province_detail//1566957384-download (2).jpg'),
(773, 58, '../image/province_detail//1566957388-download (4).jpg'),
(774, 58, '../image/province_detail//1566957388-download (3).jpg'),
(775, 58, '../image/province_detail//1566957392-download.jpg'),
(776, 59, '../image/province_detail//1566957714-download (1).jpg'),
(777, 59, '../image/province_detail//1566957714-banan_(2).jpg'),
(778, 59, '../image/province_detail//1566957720-download (5).jpg'),
(779, 59, '../image/province_detail//1566957720-download (2).jpg'),
(780, 59, '../image/province_detail//1566957723-download.jpg'),
(781, 60, '../image/province_detail//1566957775-download (1).jpg'),
(782, 60, '../image/province_detail//1566957775-download (2).jpg'),
(783, 60, '../image/province_detail//1566957780-download (4).jpg'),
(784, 60, '../image/province_detail//1566957780-download (3).jpg'),
(785, 60, '../image/province_detail//1566957784-download.jpg'),
(786, 60, '../image/province_detail//1566957784-images.jpg'),
(787, 61, '../image/province_detail//1566957864-download (2).jpg'),
(788, 61, '../image/province_detail//1566957864-download (1).jpg'),
(789, 61, '../image/province_detail//1566957869-download (3).jpg'),
(790, 61, '../image/province_detail//1566957869-download (5).jpg'),
(791, 61, '../image/province_detail//1566957872-download.jpg'),
(792, 62, '../image/province_detail//1566957974-download (1).jpg'),
(793, 62, '../image/province_detail//1566957974-download (2).jpg'),
(794, 62, '../image/province_detail//1566957979-download (3).jpg'),
(795, 62, '../image/province_detail//1566957979-download (4).jpg'),
(796, 62, '../image/province_detail//1566957985-download.jpg'),
(797, 63, '../image/province_detail//1566958044-download (1).jpg'),
(798, 63, '../image/province_detail//1566958044-download (5).jpg'),
(799, 63, '../image/province_detail//1566958049-images (1).jpg'),
(800, 63, '../image/province_detail//1566958049-download.jpg'),
(801, 63, '../image/province_detail//1566958053-images.jpg'),
(802, 64, '../image/province_detail//1566958135-images (1).jpg'),
(803, 64, '../image/province_detail//1566958135-images (2).jpg'),
(804, 64, '../image/province_detail//1566958142-images.jpg'),
(805, 64, '../image/province_detail//1566958142-reflections-at-the-wat.jpg'),
(806, 66, '../image/province_detail//1566958399-download (2).jpg'),
(807, 66, '../image/province_detail//1566958399-download (1).jpg'),
(808, 66, '../image/province_detail//1566958407-download.jpg'),
(809, 66, '../image/province_detail//1566958407-IMG_1445.JPG'),
(810, 66, '../image/province_detail//1566958413-IMG_1446.JPG'),
(811, 67, '../image/province_detail//1566958506-download (3).jpg'),
(812, 67, '../image/province_detail//1566958506-download.jpg'),
(813, 67, '../image/province_detail//1566958511-images.jpg'),
(814, 69, '../image/province_detail//1566958749-download (1).jpg'),
(815, 69, '../image/province_detail//1566958749-download (2).jpg'),
(816, 69, '../image/province_detail//1566958754-download.jpg'),
(817, 69, '../image/province_detail//1566958754-download (3).jpg'),
(818, 69, '../image/province_detail//1566958758-images.jpg'),
(819, 70, '../image/province_detail//1566958804-download (1).jpg'),
(820, 70, '../image/province_detail//1566958804-download (2).jpg'),
(821, 70, '../image/province_detail//1566958808-download (4).jpg'),
(822, 70, '../image/province_detail//1566958808-download (3).jpg'),
(823, 70, '../image/province_detail//1566958811-download.jpg'),
(824, 157, '../image/province_detail//1566958889-download (2).jpg'),
(825, 157, '../image/province_detail//1566958889-download (1).jpg'),
(826, 157, '../image/province_detail//1566958893-download (5).jpg'),
(827, 157, '../image/province_detail//1566958893-download (3).jpg'),
(828, 157, '../image/province_detail//1566958897-download.jpg'),
(829, 158, '../image/province_detail//1566958991-download (1).jpg'),
(830, 158, '../image/province_detail//1566958991-download (2).jpg'),
(831, 158, '../image/province_detail//1566958997-download.jpg'),
(832, 158, '../image/province_detail//1566958997-download (4).jpg'),
(833, 158, '../image/province_detail//1566959000-images.jpg'),
(834, 159, '../image/province_detail//1566959059-download (1).jpg'),
(835, 159, '../image/province_detail//1566959059-download (3).jpg'),
(836, 159, '../image/province_detail//1566959076-download.jpg'),
(837, 160, '../image/province_detail//1566959146-download (2).jpg'),
(838, 160, '../image/province_detail//1566959146-download.jpg'),
(839, 160, '../image/province_detail//1566959150-images (1).jpg'),
(840, 160, '../image/province_detail//1566959150-images (2).jpg'),
(841, 160, '../image/province_detail//1566959154-images.jpg'),
(842, 161, '../image/province_detail//1566959308-download (1).jpg'),
(843, 161, '../image/province_detail//1566959308-download (2).jpg'),
(844, 161, '../image/province_detail//1566959312-download.jpg'),
(845, 161, '../image/province_detail//1566959312-Durian-Roundabout-Kampot-Cambodia.jpg'),
(846, 162, '../image/province_detail//1566959375-download (1).jpg'),
(847, 162, '../image/province_detail//1566959375-download (2).jpg'),
(848, 162, '../image/province_detail//1566959382-download (3).jpg'),
(849, 162, '../image/province_detail//1566959382-download (4).jpg'),
(850, 162, '../image/province_detail//1566959386-download.jpg'),
(851, 163, '../image/province_detail//1566959522-download (1).jpg'),
(852, 163, '../image/province_detail//1566959522-22259_og_1.jpeg'),
(853, 163, '../image/province_detail//1566959527-download.jpg'),
(854, 163, '../image/province_detail//1566959527-kampot-night-market.jpg'),
(855, 163, '../image/province_detail//1566959531-photo0jpg.jpg'),
(856, 164, '../image/province_detail//1566959578-download (1).jpg'),
(857, 164, '../image/province_detail//1566959578-20150923_153245_resized_1 (Small).jpg'),
(858, 164, '../image/province_detail//1566959583-download.jpg'),
(859, 164, '../image/province_detail//1566959583-download (2).jpg'),
(860, 165, '../image/province_detail//1566959654-download (3).jpg'),
(861, 165, '../image/province_detail//1566959654-download.jpg'),
(862, 165, '../image/province_detail//1566959659-images (2).jpg'),
(863, 165, '../image/province_detail//1566959659-images (1).jpg'),
(864, 165, '../image/province_detail//1566959662-images.jpg'),
(865, 166, '../image/province_detail//1566959712-download (1).jpg'),
(866, 166, '../image/province_detail//1566959712-download (2).jpg'),
(867, 166, '../image/province_detail//1566959716-download (4).jpg'),
(868, 166, '../image/province_detail//1566959716-download (3).jpg'),
(869, 166, '../image/province_detail//1566959720-download.jpg'),
(870, 167, '../image/province_detail//1566959797-download (1).jpg'),
(871, 167, '../image/province_detail//1566959797-download (5).jpg'),
(872, 167, '../image/province_detail//1566959801-download.jpg'),
(873, 167, '../image/province_detail//1566959801-images.jpg'),
(874, 167, '../image/province_detail//1566959805-kampot-salt-fields-2.jpg'),
(875, 168, '../image/province_detail//1566959858-download (1).jpg'),
(876, 168, '../image/province_detail//1566959858-download (2).jpg'),
(877, 168, '../image/province_detail//1566959863-images (1).jpg'),
(878, 168, '../image/province_detail//1566959863-download.jpg'),
(879, 168, '../image/province_detail//1566959866-images.jpg'),
(880, 169, '../image/province_detail//1566960006-download (1).jpg'),
(881, 169, '../image/province_detail//1566960006-download (2).jpg'),
(882, 169, '../image/province_detail//1566960011-download (3).jpg'),
(883, 169, '../image/province_detail//1566960011-download.jpg'),
(884, 169, '../image/province_detail//1566960015-images.jpg'),
(885, 170, '../image/province_detail//1566960120-Tada-Water-fall-550x420.jpg'),
(886, 170, '../image/province_detail//1566960120-Tada-Water-fall_2-550x420.jpg'),
(887, 170, '../image/province_detail//1566960125-download.jpg'),
(888, 171, '../image/province_detail//1566960184-download (1).jpg'),
(889, 171, '../image/province_detail//1566960185-download (2).jpg'),
(890, 171, '../image/province_detail//1566960189-download (4).jpg'),
(891, 171, '../image/province_detail//1566960189-download (3).jpg'),
(892, 171, '../image/province_detail//1566960192-download.jpg'),
(893, 172, '../image/province_detail//1566960238-ha_tien_vegas_1a.jpg'),
(894, 172, '../image/province_detail//1566960238-download.jpg'),
(895, 172, '../image/province_detail//1566960243-4.png'),
(896, 173, '../image/province_detail//1566960312-download (1).jpg'),
(897, 173, '../image/province_detail//1566960312-download (2).jpg'),
(898, 173, '../image/province_detail//1566960316-download (4).jpg'),
(899, 173, '../image/province_detail//1566960316-download (3).jpg'),
(900, 173, '../image/province_detail//1566960319-download.jpg'),
(901, 174, '../image/province_detail//1566960401-download.jpg'),
(902, 174, '../image/province_detail//1566960401-images.jpg'),
(903, 174, '../image/province_detail//1566960404-download (2).jpg'),
(904, 175, '../image/province_detail//1566960465-download (3).jpg'),
(905, 175, '../image/province_detail//1566960465-download.jpg'),
(906, 175, '../image/province_detail//1566960469-images (1).jpg'),
(907, 175, '../image/province_detail//1566960469-images (2).jpg'),
(908, 175, '../image/province_detail//1566960473-images.jpg'),
(909, 176, '../image/province_detail//1566960532-download (1).jpg'),
(910, 176, '../image/province_detail//1566960532-download (2).jpg'),
(911, 176, '../image/province_detail//1566960536-download.jpg'),
(912, 176, '../image/province_detail//1566960536-download (3).jpg'),
(913, 176, '../image/province_detail//1566960539-images.jpg'),
(914, 177, '../image/province_detail//1566960599-download (4).jpg'),
(915, 177, '../image/province_detail//1566960599-65440242_376569739666614_2811396417229265264_n.jpg'),
(916, 177, '../image/province_detail//1566960603-download.jpg'),
(917, 177, '../image/province_detail//1566960604-Putkirimountain-341024-973x649.jpg'),
(918, 179, '../image/province_detail//1566960707-download (1).jpg'),
(919, 179, '../image/province_detail//1566960707-download (2).jpg'),
(920, 179, '../image/province_detail//1566960713-download (3).jpg'),
(921, 179, '../image/province_detail//1566960713-download (4).jpg'),
(922, 179, '../image/province_detail//1566960716-download.jpg'),
(923, 181, '../image/province_detail//1566960827-download (1).jpg'),
(924, 181, '../image/province_detail//1566960827-download (2).jpg'),
(925, 181, '../image/province_detail//1566960831-download (3).jpg'),
(926, 181, '../image/province_detail//1566960831-download.jpg'),
(927, 182, '../image/province_detail//1566960882-download (1).jpg'),
(928, 182, '../image/province_detail//1566960882-download (4).jpg'),
(929, 182, '../image/province_detail//1566960887-download.jpg'),
(930, 182, '../image/province_detail//1566960887-images (1).jpg'),
(931, 182, '../image/province_detail//1566960892-images.jpg'),
(932, 183, '../image/province_detail//1566961000-download.jpg'),
(933, 183, '../image/province_detail//1566961000-download (4).jpg'),
(934, 183, '../image/province_detail//1566961004-download (2).jpg'),
(935, 183, '../image/province_detail//1566961004-download (3).jpg'),
(936, 183, '../image/province_detail//1566961007-download (1).jpg'),
(937, 184, '../image/province_detail//1566961069-download (1).jpg'),
(938, 184, '../image/province_detail//1566961070-download (2).jpg'),
(939, 184, '../image/province_detail//1566961074-download (3).jpg'),
(940, 184, '../image/province_detail//1566961074-download (5).jpg'),
(941, 184, '../image/province_detail//1566961079-download.jpg'),
(942, 185, '../image/province_detail//1566961125-download (4).jpg'),
(943, 185, '../image/province_detail//1566961125-download (1).jpg'),
(944, 185, '../image/province_detail//1566961129-download.jpg'),
(945, 185, '../image/province_detail//1566961129-images (1).jpg'),
(946, 185, '../image/province_detail//1566961133-images.jpg'),
(947, 186, '../image/province_detail//1566961336-download (1).jpg'),
(948, 186, '../image/province_detail//1566961336-download (2).jpg'),
(949, 186, '../image/province_detail//1566961340-download.jpg'),
(950, 187, '../image/province_detail//1566961405-download (3).jpg'),
(951, 187, '../image/province_detail//1566961405-download.jpg'),
(952, 187, '../image/province_detail//1566961408-download (1).jpg'),
(953, 188, '../image/province_detail//1566961758-download (2).jpg'),
(954, 188, '../image/province_detail//1566961758-download.jpg'),
(955, 189, '../image/province_detail//1566961809-download (1).jpg'),
(956, 189, '../image/province_detail//1566961809-download.jpg'),
(957, 190, '../image/province_detail//1566961872-download (2).jpg'),
(958, 190, '../image/province_detail//1566961872-images.jpg'),
(959, 191, '../image/province_detail//1566961918-download (1).jpg'),
(960, 191, '../image/province_detail//1566961918-download (2).jpg'),
(961, 191, '../image/province_detail//1566961925-download (3).jpg'),
(962, 191, '../image/province_detail//1566961925-download.jpg'),
(963, 3, '../image/province_detail//1566962447-download (4).jpg'),
(964, 3, '../image/province_detail//1566962447-download.jpg'),
(965, 3, '../image/province_detail//1566962451-images (2).jpg'),
(966, 3, '../image/province_detail//1566962451-images (1).jpg'),
(967, 3, '../image/province_detail//1566962454-images.jpg'),
(972, 4, '../image/province_detail//1566962525-images.jpg'),
(973, 5, '../image/province_detail//1566963308-download (4).jpg'),
(974, 5, '../image/province_detail//1566963308-download (1).jpg'),
(975, 5, '../image/province_detail//1566963318-images (1).jpg'),
(976, 5, '../image/province_detail//1566963319-download.jpg'),
(977, 5, '../image/province_detail//1566963328-images.jpg'),
(978, 6, '../image/province_detail//1566963418-choeung-ek-genocidal.jpg'),
(979, 6, '../image/province_detail//1566963418-Cambodia-2013-19_new.jpg'),
(980, 6, '../image/province_detail//1566963428-download.jpg'),
(981, 6, '../image/province_detail//1566963428-download (1).jpg'),
(982, 6, '../image/province_detail//1566963439-P6140040.JPG'),
(983, 7, '../image/province_detail//1566963526-download (1).jpg'),
(984, 7, '../image/province_detail//1566963527-download (2).jpg'),
(985, 7, '../image/province_detail//1566963540-download (3).jpg'),
(986, 7, '../image/province_detail//1566963541-download.jpg'),
(987, 7, '../image/province_detail//1566963550-images.jpg'),
(988, 8, '../image/province_detail//1566963605-download (1).jpg'),
(989, 8, '../image/province_detail//1566963605-download (4).jpg'),
(990, 8, '../image/province_detail//1566963616-download.jpg'),
(991, 8, '../image/province_detail//1566963616-images (1).jpg'),
(992, 8, '../image/province_detail//1566963625-images.jpg'),
(993, 9, '../image/province_detail//1566963722-images.jpg'),
(994, 9, '../image/province_detail//1566963722-images (2).jpg'),
(995, 9, '../image/province_detail//1566963728-download (2).jpg'),
(996, 10, '../image/province_detail//1566963817-images (1).jpg'),
(997, 10, '../image/province_detail//1566963817-download (1).jpg'),
(998, 10, '../image/province_detail//1566963828-images (2).jpg'),
(999, 10, '../image/province_detail//1566963832-images.jpg'),
(1000, 11, '../image/province_detail//1566963889-download (1).jpg'),
(1001, 11, '../image/province_detail//1566963889-download (2).jpg'),
(1002, 11, '../image/province_detail//1566963893-images (1).jpg'),
(1003, 11, '../image/province_detail//1566963893-download.jpg'),
(1004, 11, '../image/province_detail//1566963897-images.jpg'),
(1005, 12, '../image/province_detail//1566964001-download (3).jpg'),
(1006, 12, '../image/province_detail//1566964001-download (1).jpg'),
(1007, 12, '../image/province_detail//1566964006-images (1).jpg'),
(1008, 12, '../image/province_detail//1566964006-download.jpg'),
(1009, 13, '../image/province_detail//1566964089-download (2).jpg'),
(1010, 13, '../image/province_detail//1566964089-images (1).jpg'),
(1011, 13, '../image/province_detail//1566964094-images.jpg'),
(1012, 14, '../image/province_detail//1566964139-download (2).jpg'),
(1013, 14, '../image/province_detail//1566964139-download (1).jpg'),
(1014, 14, '../image/province_detail//1566964146-download.jpg'),
(1015, 14, '../image/province_detail//1566964146-download (3).jpg'),
(1016, 15, '../image/province_detail//1566964202-download (1).jpg'),
(1017, 15, '../image/province_detail//1566964202-download (2).jpg'),
(1018, 15, '../image/province_detail//1566964207-download (4).jpg'),
(1019, 15, '../image/province_detail//1566964207-download (3).jpg'),
(1020, 16, '../image/province_detail//1566964264-download (2).jpg'),
(1021, 16, '../image/province_detail//1566964264-download (1).jpg'),
(1022, 16, '../image/province_detail//1566964269-download (5).jpg'),
(1023, 16, '../image/province_detail//1566964269-download (3).jpg'),
(1024, 16, '../image/province_detail//1566964274-download.jpg'),
(1025, 17, '../image/province_detail//1566964318-download (2).jpg'),
(1026, 17, '../image/province_detail//1566964318-download (1).jpg'),
(1027, 17, '../image/province_detail//1566964323-download (4).jpg'),
(1028, 17, '../image/province_detail//1566964323-download.jpg'),
(1029, 17, '../image/province_detail//1566964327-images.jpg'),
(1030, 18, '../image/province_detail//1566964376-download.jpg'),
(1031, 18, '../image/province_detail//1566964376-download (3).jpg'),
(1032, 18, '../image/province_detail//1566964381-images (1).jpg'),
(1033, 18, '../image/province_detail//1566964381-images.jpg'),
(1034, 19, '../image/province_detail//1566964437-download (1).jpg'),
(1035, 19, '../image/province_detail//1566964437-download (2).jpg'),
(1036, 19, '../image/province_detail//1566964441-download (4).jpg'),
(1037, 19, '../image/province_detail//1566964442-download (3).jpg'),
(1038, 19, '../image/province_detail//1566964445-download.jpg'),
(1039, 20, '../image/province_detail//1566964495-download (5).jpg'),
(1040, 20, '../image/province_detail//1566964495-download.jpg'),
(1041, 20, '../image/province_detail//1566964500-images.jpg'),
(1042, 20, '../image/province_detail//1566964500-photo0jpg.jpg'),
(1043, 20, '../image/province_detail//1566964504-photo8jpg.jpg'),
(1044, 21, '../image/province_detail//1566964545-download (2).jpg'),
(1045, 21, '../image/province_detail//1566964545-download (1).jpg'),
(1046, 21, '../image/province_detail//1566964550-download (4).jpg'),
(1047, 21, '../image/province_detail//1566964550-download (3).jpg'),
(1048, 21, '../image/province_detail//1566964554-download.jpg'),
(1049, 22, '../image/province_detail//1566964637-download (1).jpg'),
(1050, 22, '../image/province_detail//1566964637-download (2).jpg'),
(1051, 22, '../image/province_detail//1566964642-download (5).jpg'),
(1052, 23, '../image/province_detail//1566964692-download (1).jpg'),
(1053, 23, '../image/province_detail//1566964692-download (4).jpg'),
(1054, 23, '../image/province_detail//1566964697-download.jpg'),
(1055, 23, '../image/province_detail//1566964697-images (1).jpg'),
(1056, 23, '../image/province_detail//1566964701-images.jpg'),
(1057, 24, '../image/province_detail//1566964749-download (2).jpg'),
(1058, 24, '../image/province_detail//1566964749-download (1).jpg'),
(1059, 24, '../image/province_detail//1566964772-images.jpg'),
(1060, 24, '../image/province_detail//1566964772-download.jpg'),
(1061, 25, '../image/province_detail//1566964825-download (1).jpg'),
(1062, 25, '../image/province_detail//1566964826-download (3).jpg'),
(1063, 25, '../image/province_detail//1566964831-images.jpg'),
(1064, 25, '../image/province_detail//1566964831-download.jpg'),
(1065, 26, '../image/province_detail//1566964896-download.jpg'),
(1066, 26, '../image/province_detail//1566964896-images (1).jpg'),
(1067, 26, '../image/province_detail//1566964906-images.jpg'),
(1068, 27, '../image/province_detail//1566964956-download (1).jpg'),
(1069, 27, '../image/province_detail//1566964956-download (2).jpg'),
(1070, 27, '../image/province_detail//1566964961-download (4).jpg'),
(1071, 27, '../image/province_detail//1566964961-download (3).jpg'),
(1072, 27, '../image/province_detail//1566964966-download.jpg'),
(1073, 28, '../image/province_detail//1566965012-download (2).jpg'),
(1074, 28, '../image/province_detail//1566965012-download (1).jpg'),
(1075, 28, '../image/province_detail//1566965017-download (3).jpg'),
(1076, 28, '../image/province_detail//1566965017-download (5).jpg'),
(1077, 28, '../image/province_detail//1566965022-download.jpg'),
(1078, 29, '../image/province_detail//1566965081-images (2).jpg'),
(1079, 29, '../image/province_detail//1566965081-8a.jpg'),
(1080, 30, '../image/province_detail//1566965143-download (1).jpg'),
(1081, 30, '../image/province_detail//1566965143-download (2).jpg'),
(1082, 30, '../image/province_detail//1566965148-download.jpg'),
(1083, 30, '../image/province_detail//1566965149-Wat-Ounalom-Phnom-Penh-Cambodia-001-nf729nae5mtws4rrbf3cgn0hytff6q5d5obznk98fi.jpg'),
(1084, 30, '../image/province_detail//1566965154-wat-ounalom-phnom-penh.jpg'),
(1085, 31, '../image/province_detail//1566965213-download (1).jpg'),
(1086, 31, '../image/province_detail//1566965213-download (3).jpg'),
(1087, 31, '../image/province_detail//1566965218-download.jpg'),
(1088, 31, '../image/province_detail//1566965218-hqdefault.jpg'),
(1089, 33, '../image/province_detail//1566965358-images (1).jpg'),
(1090, 33, '../image/province_detail//1566965358-download (2).jpg'),
(1091, 33, '../image/province_detail//1566965363-images (2).jpg'),
(1092, 33, '../image/province_detail//1566965363-images (3).jpg'),
(1093, 33, '../image/province_detail//1566965370-images.jpg'),
(1094, 34, '../image/province_detail//1566965420-download (1).jpg'),
(1095, 34, '../image/province_detail//1566965420-download (2).jpg'),
(1096, 34, '../image/province_detail//1566965424-download.jpg'),
(1097, 34, '../image/province_detail//1566965424-download (3).jpg'),
(1098, 35, '../image/province_detail//1566965474-download (1).jpg'),
(1099, 35, '../image/province_detail//1566965474-download (2).jpg'),
(1100, 35, '../image/province_detail//1566965479-download.jpg'),
(1101, 35, '../image/province_detail//1566965479-download (4).jpg'),
(1102, 35, '../image/province_detail//1566965482-images.jpg'),
(1103, 36, '../image/province_detail//1566965527-download (1).jpg'),
(1104, 36, '../image/province_detail//1566965527-download (2).jpg'),
(1105, 36, '../image/province_detail//1566965533-download (4).jpg'),
(1106, 36, '../image/province_detail//1566965533-download (3).jpg'),
(1107, 36, '../image/province_detail//1566965536-download.jpg'),
(1108, 37, '../image/province_detail//1566965602-download (1).jpg'),
(1109, 37, '../image/province_detail//1566965602-download (5).jpg'),
(1110, 37, '../image/province_detail//1566965607-images.jpg'),
(1111, 37, '../image/province_detail//1566965607-download.jpg'),
(1112, 39, '../image/province_detail//1566965697-download (1).jpg'),
(1113, 39, '../image/province_detail//1566965697-download (2).jpg'),
(1114, 39, '../image/province_detail//1566965701-download (3).jpg'),
(1115, 39, '../image/province_detail//1566965701-download.jpg'),
(1116, 39, '../image/province_detail//1566965705-maxresdefault.jpg'),
(1117, 41, '../image/province_detail//1566965790-download (2).jpg'),
(1118, 41, '../image/province_detail//1566965790-download (1).jpg'),
(1119, 41, '../image/province_detail//1566965795-download (4).jpg'),
(1120, 41, '../image/province_detail//1566965795-download (3).jpg'),
(1121, 41, '../image/province_detail//1566965798-download.jpg'),
(1122, 42, '../image/province_detail//1566965856-download (5).jpg'),
(1123, 42, '../image/province_detail//1566965856-download (1).jpg'),
(1124, 42, '../image/province_detail//1566965863-download.jpg'),
(1125, 42, '../image/province_detail//1566965863-sddefault.jpg'),
(1126, 44, '../image/province_detail//1566965960-download (1).jpg'),
(1127, 44, '../image/province_detail//1566965960-Cambodia-National-Library.jpg'),
(1128, 44, '../image/province_detail//1566965965-download (2).jpg'),
(1129, 44, '../image/province_detail//1566965965-download.jpg'),
(1130, 45, '../image/province_detail//1566966074-download (1).jpg'),
(1131, 45, '../image/province_detail//1566966074-download (3).jpg'),
(1132, 45, '../image/province_detail//1566966078-download.jpg'),
(1133, 46, '../image/province_detail//1566966119-download (2).jpg'),
(1134, 46, '../image/province_detail//1566966119-download (1).jpg'),
(1135, 46, '../image/province_detail//1566966123-download (4).jpg'),
(1136, 46, '../image/province_detail//1566966123-download (3).jpg'),
(1137, 46, '../image/province_detail//1566966128-download.jpg'),
(1138, 47, '../image/province_detail//1566966176-download (2).jpg'),
(1139, 47, '../image/province_detail//1566966176-download (1).jpg'),
(1140, 47, '../image/province_detail//1566966181-download (5).jpg'),
(1141, 47, '../image/province_detail//1566966181-download (3).jpg'),
(1142, 47, '../image/province_detail//1566966185-download.jpg'),
(1143, 71, '../image/province_detail//1566966632-download (1).jpg'),
(1144, 71, '../image/province_detail//1566966633-5104226627001_5434711148001_5413965430001-vs.jpg'),
(1145, 71, '../image/province_detail//1566966638-download.jpg'),
(1146, 71, '../image/province_detail//1566966638-images.jpg'),
(1147, 71, '../image/province_detail//1566966645-veQKQrhqeLXwXHw4Q6qM3N-320-80.jpg'),
(1148, 72, '../image/province_detail//1566966787-download (1).jpg'),
(1149, 72, '../image/province_detail//1566966789-5d01caca24c71.png'),
(1150, 72, '../image/province_detail//1566966810-download (2).jpg'),
(1151, 72, '../image/province_detail//1566966811-5d01caca24c71.png'),
(1152, 72, '../image/province_detail//1566966817-images.jpg'),
(1153, 73, '../image/province_detail//1566967052-download (1).jpg'),
(1154, 73, '../image/province_detail//1566967054-158530_Viator_Shutterstock_118760.jpg'),
(1155, 73, '../image/province_detail//1566967076-images (1).jpg'),
(1156, 73, '../image/province_detail//1566967076-download.jpg'),
(1157, 73, '../image/province_detail//1566967087-images.jpg'),
(1158, 74, '../image/province_detail//1566967255-download (1).jpg'),
(1159, 74, '../image/province_detail//1566967255-download (2).jpg'),
(1160, 74, '../image/province_detail//1566967270-download.jpg'),
(1161, 74, '../image/province_detail//1566967270-images.jpg'),
(1162, 75, '../image/province_detail//1566967423-download (2).jpg'),
(1163, 75, '../image/province_detail//1566967423-download (1).jpg'),
(1164, 75, '../image/province_detail//1566967428-download (3).jpg'),
(1165, 75, '../image/province_detail//1566967428-download.jpg'),
(1166, 75, '../image/province_detail//1566967432-images (2).jpg'),
(1167, 76, '../image/province_detail//1566967687-download (4).jpg'),
(1168, 76, '../image/province_detail//1566967688-download.jpg'),
(1169, 76, '../image/province_detail//1566967693-images (2).jpg'),
(1170, 76, '../image/province_detail//1566967693-images (1).jpg'),
(1171, 76, '../image/province_detail//1566967698-images.jpg'),
(1172, 77, '../image/province_detail//1566975812-download.jpg'),
(1173, 77, '../image/province_detail//1566975812-download (1).jpg'),
(1174, 77, '../image/province_detail//1566975819-images.jpg'),
(1175, 77, '../image/province_detail//1566975819-images (2).jpg'),
(1176, 78, '../image/province_detail//1566976244-download.jpg'),
(1177, 78, '../image/province_detail//1566976244-images (2).jpg'),
(1178, 78, '../image/province_detail//1566976249-images (3).jpg'),
(1179, 78, '../image/province_detail//1566976249-images.jpg'),
(1180, 79, '../image/province_detail//1566976379-download (1).jpg'),
(1181, 79, '../image/province_detail//1566976379-download (2).jpg'),
(1182, 79, '../image/province_detail//1566976385-images.jpg'),
(1183, 79, '../image/province_detail//1566976385-download.jpg'),
(1184, 80, '../image/province_detail//1566976473-download (1).jpg'),
(1185, 80, '../image/province_detail//1566976473-download (2).jpg'),
(1186, 80, '../image/province_detail//1566976478-download.jpg'),
(1187, 80, '../image/province_detail//1566976478-download (3).jpg'),
(1188, 81, '../image/province_detail//1566976715-images (1).jpg'),
(1189, 81, '../image/province_detail//1566976715-download.jpg'),
(1190, 81, '../image/province_detail//1566976720-images (2).jpg'),
(1191, 81, '../image/province_detail//1566976720-images.jpg'),
(1192, 82, '../image/province_detail//1566976814-download (1).jpg'),
(1193, 82, '../image/province_detail//1566976814-download (2).jpg'),
(1194, 82, '../image/province_detail//1566976825-download.jpg'),
(1195, 82, '../image/province_detail//1566976825-images.jpg'),
(1196, 83, '../image/province_detail//1566976914-download (3).jpg'),
(1197, 83, '../image/province_detail//1566976914-download (1).jpg'),
(1198, 83, '../image/province_detail//1566976920-download.jpg'),
(1199, 83, '../image/province_detail//1566976920-images (1).jpg'),
(1200, 83, '../image/province_detail//1566976925-images.jpg'),
(1201, 84, '../image/province_detail//1566976985-download (1).jpg'),
(1202, 84, '../image/province_detail//1566976985-download (4).jpg'),
(1203, 84, '../image/province_detail//1566976990-images.jpg'),
(1204, 84, '../image/province_detail//1566976990-download.jpg'),
(1205, 85, '../image/province_detail//1566977046-download (1).jpg'),
(1206, 85, '../image/province_detail//1566977046-download (2).jpg'),
(1207, 85, '../image/province_detail//1566977051-download.jpg'),
(1208, 85, '../image/province_detail//1566977051-download (3).jpg'),
(1209, 86, '../image/province_detail//1566977157-download (1).jpg'),
(1210, 86, '../image/province_detail//1566977157-download (2).jpg'),
(1211, 86, '../image/province_detail//1566977162-download.jpg'),
(1212, 86, '../image/province_detail//1566977162-the-lake-offers-peace.jpg'),
(1213, 87, '../image/province_detail//1566977229-download (1).jpg'),
(1214, 87, '../image/province_detail//1566977230-download (2).jpg'),
(1215, 87, '../image/province_detail//1566977235-download (3).jpg'),
(1216, 87, '../image/province_detail//1566977235-download (4).jpg'),
(1217, 87, '../image/province_detail//1566977239-download.jpg'),
(1218, 88, '../image/province_detail//1566977778-download.jpg'),
(1219, 88, '../image/province_detail//1566977778-download (5).jpg'),
(1220, 88, '../image/province_detail//1566977783-download (1).jpg'),
(1221, 88, '../image/province_detail//1566977783-download (2).jpg'),
(1222, 89, '../image/province_detail//1566977873-download.jpg'),
(1223, 89, '../image/province_detail//1566977873-download (4).jpg'),
(1224, 89, '../image/province_detail//1566977877-download (2).jpg'),
(1225, 89, '../image/province_detail//1566977877-download (3).jpg'),
(1226, 89, '../image/province_detail//1566977881-download (1).jpg'),
(1227, 90, '../image/province_detail//1566977943-download (1).jpg'),
(1228, 90, '../image/province_detail//1566977943-download (5).jpg'),
(1229, 90, '../image/province_detail//1566977947-download.jpg'),
(1230, 90, '../image/province_detail//1566977947-images (1).jpg'),
(1231, 90, '../image/province_detail//1566977951-images.jpg'),
(1232, 91, '../image/province_detail//1566978000-download (1).jpg'),
(1233, 91, '../image/province_detail//1566978000-download (2).jpg'),
(1234, 91, '../image/province_detail//1566978005-download (4).jpg'),
(1235, 91, '../image/province_detail//1566978005-download (3).jpg'),
(1236, 91, '../image/province_detail//1566978010-download.jpg'),
(1237, 92, '../image/province_detail//1566978178-download.jpg'),
(1238, 92, '../image/province_detail//1566978178-download (5).jpg'),
(1239, 92, '../image/province_detail//1566978182-images.jpg'),
(1240, 93, '../image/province_detail//1566978332-download (1).jpg'),
(1241, 93, '../image/province_detail//1566978332-download (2).jpg'),
(1242, 93, '../image/province_detail//1566978337-download (3).jpg'),
(1243, 93, '../image/province_detail//1566978337-download (4).jpg'),
(1244, 93, '../image/province_detail//1566978342-download.jpg'),
(1245, 94, '../image/province_detail//1566978398-download (1).jpg'),
(1246, 94, '../image/province_detail//1566978398-download (2).jpg'),
(1247, 94, '../image/province_detail//1566978403-download (5).jpg'),
(1248, 94, '../image/province_detail//1566978403-download (3).jpg'),
(1249, 94, '../image/province_detail//1566978409-download.jpg'),
(1250, 95, '../image/province_detail//1566978576-download (1).jpg'),
(1251, 95, '../image/province_detail//1566978576-download (2).jpg'),
(1252, 95, '../image/province_detail//1566978582-download (4).jpg'),
(1253, 95, '../image/province_detail//1566978582-download.jpg'),
(1254, 95, '../image/province_detail//1566978586-images.jpg'),
(1255, 96, '../image/province_detail//1566978697-download (1).jpg'),
(1256, 96, '../image/province_detail//1566978697-download (2).jpg'),
(1257, 96, '../image/province_detail//1566978702-download (3).jpg'),
(1258, 96, '../image/province_detail//1566978702-download (4).jpg'),
(1259, 96, '../image/province_detail//1566978705-download.jpg'),
(1260, 97, '../image/province_detail//1566978797-download (1).jpg'),
(1261, 97, '../image/province_detail//1566978797-download (2).jpg'),
(1262, 97, '../image/province_detail//1566978802-download (5).jpg'),
(1263, 97, '../image/province_detail//1566978802-download (3).jpg'),
(1264, 97, '../image/province_detail//1566978806-download.jpg'),
(1265, 98, '../image/province_detail//1566978890-download (2).jpg'),
(1266, 98, '../image/province_detail//1566978890-download (1).jpg'),
(1267, 98, '../image/province_detail//1566978895-download (3).jpg'),
(1268, 98, '../image/province_detail//1566978895-download (4).jpg'),
(1269, 98, '../image/province_detail//1566978898-download.jpg'),
(1270, 99, '../image/province_detail//1566978965-download (1).jpg'),
(1271, 99, '../image/province_detail//1566978965-5111aeca8ac021be8ed16e160e9723e6.jpg'),
(1272, 99, '../image/province_detail//1566978972-download (2).jpg'),
(1273, 99, '../image/province_detail//1566978972-download (3).jpg'),
(1274, 99, '../image/province_detail//1566978978-download.jpg'),
(1275, 100, '../image/province_detail//1566979158-download (1).jpg'),
(1276, 100, '../image/province_detail//1566979158-download (2).jpg'),
(1277, 100, '../image/province_detail//1566979163-download.jpg'),
(1278, 100, '../image/province_detail//1566979163-download (4).jpg'),
(1279, 100, '../image/province_detail//1566979167-images.jpg'),
(1280, 101, '../image/province_detail//1566979232-download (1).jpg'),
(1281, 101, '../image/province_detail//1566979232-download (2).jpg'),
(1282, 101, '../image/province_detail//1566979238-download (3).jpg'),
(1283, 101, '../image/province_detail//1566979238-download (4).jpg'),
(1284, 101, '../image/province_detail//1566979243-download.jpg'),
(1285, 102, '../image/province_detail//1566979322-download (2).jpg'),
(1286, 102, '../image/province_detail//1566979322-download (1).jpg'),
(1287, 102, '../image/province_detail//1566979330-download.jpg'),
(1288, 102, '../image/province_detail//1566979330-download (5).jpg'),
(1289, 102, '../image/province_detail//1566979338-images.jpg'),
(1290, 104, '../image/province_detail//1566979483-download (1).jpg'),
(1291, 104, '../image/province_detail//1566979483-download (2).jpg'),
(1292, 104, '../image/province_detail//1566979488-download (3).jpg'),
(1293, 104, '../image/province_detail//1566979489-download (4).jpg'),
(1294, 104, '../image/province_detail//1566979493-download.jpg'),
(1295, 105, '../image/province_detail//1566979622-download (2).jpg'),
(1296, 105, '../image/province_detail//1566979622-download (1).jpg'),
(1297, 105, '../image/province_detail//1566979627-download (5).jpg'),
(1298, 105, '../image/province_detail//1566979627-download.jpg'),
(1299, 106, '../image/province_detail//1566979686-download (1).jpg'),
(1300, 106, '../image/province_detail//1566979686-download (2).jpg'),
(1301, 106, '../image/province_detail//1566979692-download (3).jpg'),
(1302, 106, '../image/province_detail//1566979692-download (4).jpg'),
(1303, 106, '../image/province_detail//1566979695-download.jpg'),
(1304, 107, '../image/province_detail//1566979759-download (1).jpg'),
(1305, 107, '../image/province_detail//1566979759-download (2).jpg'),
(1306, 107, '../image/province_detail//1566979766-download (5).jpg'),
(1307, 107, '../image/province_detail//1566979766-download.jpg'),
(1308, 108, '../image/province_detail//1566979894-download (1).jpg'),
(1309, 108, '../image/province_detail//1566979894-download (2).jpg'),
(1310, 108, '../image/province_detail//1566979899-download.jpg'),
(1311, 108, '../image/province_detail//1566979899-download (3).jpg'),
(1312, 109, '../image/province_detail//1566979993-download (1).jpg'),
(1313, 109, '../image/province_detail//1566979993-download (2).jpg'),
(1314, 109, '../image/province_detail//1566979997-download (3).jpg'),
(1315, 109, '../image/province_detail//1566979997-download (4).jpg'),
(1316, 109, '../image/province_detail//1566980002-download.jpg'),
(1317, 110, '../image/province_detail//1566980063-download (2).jpg'),
(1318, 110, '../image/province_detail//1566980063-download (1).jpg'),
(1319, 110, '../image/province_detail//1566980069-download (5).jpg'),
(1320, 110, '../image/province_detail//1566980069-download.jpg'),
(1321, 111, '../image/province_detail//1566980138-download (1).jpg'),
(1322, 111, '../image/province_detail//1566980138-download (2).jpg'),
(1323, 111, '../image/province_detail//1566980142-download.jpg'),
(1324, 111, '../image/province_detail//1566980142-download (3).jpg'),
(1325, 112, '../image/province_detail//1566980203-download (1).jpg'),
(1326, 112, '../image/province_detail//1566980203-download (2).jpg'),
(1327, 112, '../image/province_detail//1566980208-download (4).jpg'),
(1328, 112, '../image/province_detail//1566980208-download (3).jpg'),
(1329, 112, '../image/province_detail//1566980212-download.jpg'),
(1330, 113, '../image/province_detail//1566980293-download (1).jpg'),
(1331, 113, '../image/province_detail//1566980293-download (3).jpg'),
(1332, 113, '../image/province_detail//1566980298-download (5).jpg'),
(1333, 113, '../image/province_detail//1566980298-download.jpg'),
(1334, 114, '../image/province_detail//1566980410-download (4).jpg'),
(1335, 114, '../image/province_detail//1566980410-download.jpg'),
(1336, 114, '../image/province_detail//1566980415-download (2).jpg'),
(1337, 115, '../image/province_detail//1566980496-images (1).jpg'),
(1338, 115, '../image/province_detail//1566980496-images.jpg'),
(1339, 115, '../image/province_detail//1566980502-download (3).jpg'),
(1340, 115, '../image/province_detail//1566980502-download.jpg'),
(1341, 116, '../image/province_detail//1566980611-download (1).jpg'),
(1342, 116, '../image/province_detail//1566980611-download (2).jpg'),
(1343, 116, '../image/province_detail//1566980623-download (3).jpg'),
(1344, 116, '../image/province_detail//1566980623-download.jpg'),
(1345, 117, '../image/province_detail//1566980697-images.jpg'),
(1346, 117, '../image/province_detail//1566980697-images (1).jpg'),
(1347, 117, '../image/province_detail//1566980717-download (4).jpg'),
(1348, 118, '../image/province_detail//1566980788-download (1).jpg'),
(1349, 118, '../image/province_detail//1566980788-images (1).jpg'),
(1350, 118, '../image/province_detail//1566980794-images (2).jpg'),
(1351, 118, '../image/province_detail//1566980794-images.jpg'),
(1352, 119, '../image/province_detail//1566980848-download (2).jpg'),
(1353, 119, '../image/province_detail//1566980848-download (1).jpg'),
(1354, 119, '../image/province_detail//1566980855-download (4).jpg'),
(1355, 119, '../image/province_detail//1566980855-download (3).jpg'),
(1356, 119, '../image/province_detail//1566980861-download.jpg'),
(1357, 120, '../image/province_detail//1566980915-download (5).jpg'),
(1358, 120, '../image/province_detail//1566980915-images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `q_id` int(11) NOT NULL,
  `q_ref_no` char(255) NOT NULL,
  `q_vat_no` int(11) NOT NULL,
  `q_subject` char(255) NOT NULL,
  `q_range_day_type` char(255) NOT NULL,
  `q_destination_from` int(11) NOT NULL,
  `q_destination_to` int(11) NOT NULL,
  `q_period_from` date NOT NULL,
  `q_period_to` date NOT NULL,
  `q_customer` int(11) NOT NULL,
  `q_date_sign` date NOT NULL,
  `q_total_fee` decimal(10,2) NOT NULL,
  `q_discount` decimal(10,2) NOT NULL,
  `q_total_vat` decimal(10,2) NOT NULL,
  `q_total_refundable` decimal(10,2) NOT NULL,
  `q_net_total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `q_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`q_id`, `q_ref_no`, `q_vat_no`, `q_subject`, `q_range_day_type`, `q_destination_from`, `q_destination_to`, `q_period_from`, `q_period_to`, `q_customer`, `q_date_sign`, `q_total_fee`, `q_discount`, `q_total_vat`, `q_total_refundable`, `q_net_total`, `user_id`, `date_created`, `date_updated`, `q_menu_type`) VALUES
(1, '1234555', 1234555, '1234555', '4321', 1233, 2332, '2019-02-23', '2019-02-27', 33, '2019-02-23', 231.00, 123.00, 1233.00, 123.00, 1234.00, 12341, '2019-02-19', '2019-03-12', 1),
(2, '1234', 0, '12321', '123123', 123123, 12312, '2019-02-23', '2019-02-24', 1, '0000-00-00', 123.00, 321.00, 123.00, 213.00, 213.00, 123, '2019-02-23', '2019-02-23', 2),
(3, '4345', 54646, '54646', '44', 55, 66, '2019-02-27', '2019-03-20', 30, '2019-03-13', 22.00, 3.00, 44.00, 5.00, 6.00, 1, '2019-03-14', '2019-03-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_acc`
--

CREATE TABLE `tbl_quotation_acc` (
  `q_acc_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_daily_day` varchar(255) NOT NULL,
  `acc_extra_day` varchar(255) NOT NULL,
  `acc_daily_price` varchar(255) NOT NULL,
  `acc_extra_price` varchar(255) NOT NULL,
  `acc_discount` varchar(255) NOT NULL,
  `acc_vat` varchar(255) NOT NULL,
  `acc_amount_daily` varchar(255) NOT NULL,
  `acc_mount_extra` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_acc`
--

INSERT INTO `tbl_quotation_acc` (`q_acc_id`, `q_id`, `acc_id`, `acc_daily_day`, `acc_extra_day`, `acc_daily_price`, `acc_extra_price`, `acc_discount`, `acc_vat`, `acc_amount_daily`, `acc_mount_extra`) VALUES
(1, 1, 1, '7', '2', '20', '15', '2', '10', '150.92', '32.339999999999996'),
(2, 2, 1, '7', '2', '20', '15', '2', '10', '150.92', '32.339999999999996'),
(3, 6, 1, '7', '2', '20', '15', '2', '10', '150.92', '32.339999999999996');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_admin`
--

CREATE TABLE `tbl_quotation_admin` (
  `q_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `signator_owner` varchar(255) NOT NULL,
  `signator_prepare` varchar(255) NOT NULL,
  `signator_renter` varchar(255) NOT NULL,
  `ld_ass` varchar(255) NOT NULL,
  `refun_deposit` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `subject_type` varchar(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_admin`
--

INSERT INTO `tbl_quotation_admin` (`q_id`, `customer_id`, `owner_id`, `ref_no`, `signator_owner`, `signator_prepare`, `signator_renter`, `ld_ass`, `refun_deposit`, `booking_date`, `subject_type`) VALUES
(1, 9, 7, 'QU-201908038768', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '150', '700', '2019-08-06', '1'),
(2, 9, 7, 'QU-201908038914', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '0', '1100', '', '2'),
(3, 9, 7, 'QU-201908038065', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '0', '400', '2019-08-14', '4'),
(4, 9, 7, 'QU-201908035446', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '0', '400', '2019-08-13', '5'),
(5, 9, 7, 'QU-20190803308', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '0', '400', '2019-08-13', '5'),
(6, 9, 7, 'QU-201908033730', 'Lyna Master', 'Torn Kemun', 'Yun sivatha', '0', '400', '2019-08-13', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_car`
--

CREATE TABLE `tbl_quotation_car` (
  `q_car_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `car_daily_day` varchar(255) NOT NULL,
  `car_extra_day` varchar(255) NOT NULL,
  `car_daily_price` varchar(255) NOT NULL,
  `car_extra_price` varchar(255) NOT NULL,
  `car_discount` varchar(255) NOT NULL,
  `car_vat` varchar(255) NOT NULL,
  `car_amount_daily` varchar(255) NOT NULL,
  `car_mount_extra` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_car`
--

INSERT INTO `tbl_quotation_car` (`q_car_id`, `q_id`, `car_id`, `car_daily_day`, `car_extra_day`, `car_daily_price`, `car_extra_price`, `car_discount`, `car_vat`, `car_amount_daily`, `car_mount_extra`) VALUES
(1, 1, 19, '7', '2', '55.50', '50.50', '2', '10', '418.803', '108.878');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_detail`
--

CREATE TABLE `tbl_quotation_detail` (
  `qd_id` int(11) NOT NULL,
  `qd_ref_no` int(11) NOT NULL,
  `qd_date_record` text NOT NULL,
  `qd_item` int(11) NOT NULL,
  `qd_period_qty` decimal(10,0) NOT NULL,
  `qd_item_qty` decimal(10,0) NOT NULL,
  `qd_price` decimal(10,2) NOT NULL,
  `qd_deposition` decimal(10,2) NOT NULL,
  `qd_vat` decimal(10,2) NOT NULL,
  `qd_amount` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_driver`
--

CREATE TABLE `tbl_quotation_driver` (
  `driver_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `dr_rent_id` int(11) NOT NULL,
  `dr_daily_day` varchar(255) NOT NULL,
  `dr_extra_day` varchar(255) NOT NULL,
  `dr_holiday_day` varchar(255) NOT NULL,
  `dr_price_daily` varchar(255) NOT NULL,
  `dr_price_extra` varchar(255) NOT NULL,
  `dr_price_holiday` varchar(255) NOT NULL,
  `dr_discount` varchar(255) NOT NULL,
  `dr_vat` varchar(255) NOT NULL,
  `dr_amount_daily` varchar(255) NOT NULL,
  `dr_amount_extra` varchar(255) NOT NULL,
  `dr_amount_holiday` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_driver`
--

INSERT INTO `tbl_quotation_driver` (`driver_id`, `q_id`, `dr_rent_id`, `dr_daily_day`, `dr_extra_day`, `dr_holiday_day`, `dr_price_daily`, `dr_price_extra`, `dr_price_holiday`, `dr_discount`, `dr_vat`, `dr_amount_daily`, `dr_amount_extra`, `dr_amount_holiday`) VALUES
(1, 1, 26, '4', '2', '3', '20', '35', '30', '2', '10', '86.24000000000001', '75.46', '97.02000000000001'),
(2, 2, 25, '4', '2', '3', '20', '35', '30', '2', '10', '86.24000000000001', '75.46', '97.02000000000001'),
(3, 3, 27, '4', '2', '3', '20', '35', '30', '2', '10', '86.24000000000001', '75.46', '97.02000000000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_rickshaw`
--

CREATE TABLE `tbl_quotation_rickshaw` (
  `q_rick_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `rick_id` int(11) NOT NULL,
  `rick_daily_day` varchar(255) NOT NULL,
  `rick_daily_price` varchar(255) NOT NULL,
  `rick_discount` varchar(255) NOT NULL,
  `rick_vat` varchar(255) NOT NULL,
  `rick_amount_daily` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_rickshaw`
--

INSERT INTO `tbl_quotation_rickshaw` (`q_rick_id`, `q_id`, `rick_id`, `rick_daily_day`, `rick_daily_price`, `rick_discount`, `rick_vat`, `rick_amount_daily`) VALUES
(1, 2, 1, '9', '15', '0', '10', '148.5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_setting`
--

CREATE TABLE `tbl_quotation_setting` (
  `qs_id` int(11) NOT NULL,
  `qs_vat_no` text COLLATE utf8_bin NOT NULL,
  `qs_notices` text COLLATE utf8_bin NOT NULL,
  `qs_name_sign` text COLLATE utf8_bin NOT NULL,
  `qs_position` int(11) NOT NULL,
  `qs_self_driver_info` text COLLATE utf8_bin NOT NULL,
  `qs_speaking_driver` text COLLATE utf8_bin NOT NULL,
  `qs_footer` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_tour`
--

CREATE TABLE `tbl_quotation_tour` (
  `tour_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `tr_rent_id` int(11) NOT NULL,
  `tr_daily_day` varchar(255) NOT NULL,
  `tr_extra_day` varchar(255) NOT NULL,
  `tr_holiday_day` varchar(255) NOT NULL,
  `tr_price_daily` varchar(255) NOT NULL,
  `tr_price_extra` varchar(255) NOT NULL,
  `tr_price_holiday` varchar(255) NOT NULL,
  `tr_discount` varchar(255) NOT NULL,
  `tr_vat` varchar(255) NOT NULL,
  `tr_amount_daily` varchar(255) NOT NULL,
  `tr_amount_extra` varchar(255) NOT NULL,
  `tr_amount_holiday` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_tour`
--

INSERT INTO `tbl_quotation_tour` (`tour_id`, `q_id`, `tr_rent_id`, `tr_daily_day`, `tr_extra_day`, `tr_holiday_day`, `tr_price_daily`, `tr_price_extra`, `tr_price_holiday`, `tr_discount`, `tr_vat`, `tr_amount_daily`, `tr_amount_extra`, `tr_amount_holiday`) VALUES
(1, 1, 28, '4', '2', '3', '20', '25', '20', '2', '10', '86.24000000000001', '53.9', '64.67999999999999'),
(2, 2, 28, '4', '2', '3', '20', '25', '20', '0', '0', '80', '50', '60'),
(3, 5, 28, '4', '2', '3', '20', '30', '25', '0', '10', '88', '66', '82.5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_type_menu`
--

CREATE TABLE `tbl_quotation_type_menu` (
  `qtm_id` int(11) NOT NULL,
  `qtm_type` char(255) NOT NULL,
  `qtm_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_type_menu`
--

INSERT INTO `tbl_quotation_type_menu` (`qtm_id`, `qtm_type`, `qtm_note`) VALUES
(1, 'Car Rental Quotation', ''),
(2, 'Driver Rental Quotation', ''),
(3, 'Tour Guide Rental Quotation', ''),
(4, ' City Tour Service Quotation', ''),
(5, 'Pickup & Drop-off Service Quotation', ''),
(6, 'Pickup & Drop-off Service Quotation', ''),
(7, 'Customized Quotation', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relationship_users_position`
--

CREATE TABLE `tbl_relationship_users_position` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relationship_users_position`
--

INSERT INTO `tbl_relationship_users_position` (`id`, `user_id`, `user_position_id`) VALUES
(56, 86, 3),
(57, 87, 3),
(58, 88, 3),
(59, 89, 3),
(60, 90, 3),
(61, 93, 3),
(62, 94, 3),
(63, 95, 3),
(64, 96, 3),
(65, 97, 3),
(66, 98, 3),
(67, 99, 3),
(68, 102, 3),
(69, 103, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_report`
--

CREATE TABLE `tbl_rental_report` (
  `rental_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_paid` date NOT NULL,
  `pre_by` varchar(255) NOT NULL,
  `app_by` varchar(255) NOT NULL,
  `time_use` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `discount_pre` varchar(255) NOT NULL,
  `discount_record` varchar(255) NOT NULL,
  `after_discount` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `bonus_save` varchar(255) NOT NULL,
  `net_income` varchar(255) NOT NULL,
  `broke` text NOT NULL,
  `note` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `status_type` varchar(255) NOT NULL,
  `deposit_report` varchar(255) NOT NULL,
  `refund_report` varchar(255) NOT NULL DEFAULT '0',
  `ld_ass_report` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rental_report`
--

INSERT INTO `tbl_rental_report` (`rental_id`, `customer_id`, `ref_id`, `start_date`, `end_date`, `date_paid`, `pre_by`, `app_by`, `time_use`, `amount`, `discount_pre`, `discount_record`, `after_discount`, `commission`, `bonus_save`, `net_income`, `broke`, `note`, `type`, `status_type`, `deposit_report`, `refund_report`, `ld_ass_report`) VALUES
(2, 9, 15, '2019-08-01', '2019-08-09', '2019-08-10', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                 frr  \r\n                 ', 'Vehicle', '1', '', '', ''),
(3, 34, 33, '2019-08-06', '2019-08-15', '2019-08-15', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 gg', 'T.Quide', '1', '', '', ''),
(4, 9, 19, '2019-08-05', '2019-08-15', '2019-08-21', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'city_tour', '1', '', '', ''),
(5, 10, 26, '2019-08-05', '2019-08-08', '2019-08-20', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'Driver', '1', '', '', ''),
(6, 27, 1, '2019-08-05', '2019-08-06', '2019-08-21', 'Torn Kemun', 'Savongz', '5', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'RickShaw', '1', '', '', ''),
(7, 34, 19, '2019-08-07', '2019-08-14', '2019-08-14', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'pickup_drop', '1', '', '', ''),
(8, 34, 1, '2019-08-06', '2019-08-15', '2019-08-22', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'Accessories', '1', '', '', ''),
(11, 25, 4, '2019-08-06', '2019-08-15', '2019-08-20', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                                      \r\n                                  ', 'hotel_quest', '1', '500', '300', '150'),
(12, 34, 15, '2019-07-30', '2019-08-07', '2019-08-20', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                 fgfgd  \r\n                 ', 'city_tour', '1', '500', '300', '150'),
(13, 24, 3, '2019-07-30', '2019-08-19', '2019-08-20', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   ff\r\n                 ', 'RickShaw', '1', '', '', ''),
(14, 27, 33, '2019-08-05', '2019-08-06', '2019-08-20', 'Torn Kemun', 'Savongz', '1', '1000', '10', '100', '900', '3', '27', '873', 'tt', '                   \r\n                 ', 'T.Quide', '1', '500', '300', '150');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE `tbl_repair` (
  `report_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `name_grage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type_box` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `record_price` varchar(255) NOT NULL,
  `record_discount` varchar(255) NOT NULL,
  `record_total` varchar(255) NOT NULL,
  `record_note` text NOT NULL,
  `type_report` varchar(255) NOT NULL,
  `prepare_by` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `status_report` varchar(255) NOT NULL COMMENT '1=maintenance,2=expense',
  `time_use` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_repair`
--

INSERT INTO `tbl_repair` (`report_id`, `ref_no`, `vender_id`, `add_date`, `mileage`, `name_grage`, `description`, `type_box`, `qty`, `record_price`, `record_discount`, `record_total`, `record_note`, `type_report`, `prepare_by`, `approved_by`, `status_report`, `time_use`) VALUES
(1, 16, 3, '2019-08-01', '99999999', '', '                                                  kemun\r\n                                                                    ', 'SET', '2', '15', '2', '29.4', '                                                                       jkiti7     \r\n                                                                    ', 'Vehicle', '', '', '1', '1'),
(2, 3, 1, '2019-08-07', '99999999', '', '                                      gjgj\r\n                                  ', 'BOX', '2', '12', '0', '24', '                              fdgfh        \r\n                                  ', 'RickShaw', 'Torn Kemun', 'Savongz', '1', '1'),
(3, 1, 1, '2019-08-08', '99999999', 'lyna-carrental.com', '                   \r\n                 ertre', 'PCS', '3', '15', '2', '44.1', '                   ertet\r\n                 ', 'Accessories', '', '', '1', '1'),
(4, 16, 1, '2019-08-09', '99999999', '', '                                      \r\n                 uikyfi                 ', 'BOX', '2', '15', '2', '29.4', '                                      \r\n     yiyi                             ', 'Vehicle', 'Torn Kemun', 'Savongz', '1', '1'),
(5, 19, 1, '2019-08-08', '99999999', '', '                                      \r\n        sdfdsf                          ', 'BOX', '2', '15', '2', '29.4', '                                      \r\n          note km             ', 'Vehicle', 'Torn Kemun', 'Savongz', '2', '1'),
(6, 3, 1, '2019-08-09', '99999999', 'lyna-carrental.com', '                   rt\r\n                 ', 'SET', '2', '15', '2', '29.4', '                   \r\n                 tt', 'RickShaw', 'Torn Kemun', 'Savongz', '2', '5'),
(7, 1, 1, '2019-08-08', '99999999', 'lyna-carrental.com', '                   \r\n                 hhh', 'BOX', '2', '12', '10', '21.6', '                   yyy\r\n                 ', 'Accessories', 'Torn Kemun', 'Savongz', '2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_revenue_category`
--

CREATE TABLE `tbl_revenue_category` (
  `reca_id` int(11) NOT NULL,
  `reca_name` varchar(255) NOT NULL,
  `reca_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_revenue_category`
--

INSERT INTO `tbl_revenue_category` (`reca_id`, `reca_name`, `reca_note`) VALUES
(2, 'ចំណូលពីការជួលរថយន្ត', 'Car Rental'),
(4, 'ចំណូលពីការជួលអ្នកបើកបររថយន្ត', 'Driver Rental'),
(5, 'ចំណូលពីការជួលមគ្គុទេសទេសចរណ៍', 'Tour Guide Rental'),
(6, 'ចំណូលពីការធ្វើឈៀករថយន្ត', 'Bi-yearly Vehicle Motor Technical Inspection'),
(7, 'ចំណូលពីការទិញពន្ធផ្លូវរថយន្តប្រចាំឆ្នាំ', 'Annual Road Tax'),
(8, 'ចំណូលពីការផ្ទេរកម្មសិទ្ធិរថយន្ត', 'Ownership Transfer '),
(9, 'ចំណូលពីការប្រត្តិបត្តិទេសចរណ៌ក្នុងក្រុង', 'City Tour'),
(10, 'ចំណូលពីការលាងនិងជួសជុលម៉ាស៊ីនត្រជាក់រថយន្ត', 'AC System Servicing'),
(11, 'ចំណូលពីការបាញ់ថ្នាំរថយន្ត', 'Car Painting'),
(12, 'ចំណូលពីការធ្វើប័ណ្ណការងារជនបរទេស', 'Foreign Work Permit'),
(13, 'ចំណូលពីការធ្វើបន្តទិដ្ខាការជនបរទេស', 'Visa Extension'),
(14, 'ចំណូលពីការធ្វើជួសជុលនិងថែទាំរថយន្ត', 'Automotive Repair and Maintenance'),
(15, 'ចំណូលពីការលក់គ្រឿងបន្លាស់រថយន្ត', 'Automotive Spare Parts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_revenue_list`
--

CREATE TABLE `tbl_revenue_list` (
  `rev_id` int(11) NOT NULL,
  `rev_date_record` date NOT NULL,
  `rev_description` varchar(255) NOT NULL,
  `rev_revenue_category` int(11) NOT NULL,
  `rev_amount` float NOT NULL,
  `rev_employee` int(11) NOT NULL,
  `rev_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_revenue_list`
--

INSERT INTO `tbl_revenue_list` (`rev_id`, `rev_date_record`, `rev_description`, `rev_revenue_category`, `rev_amount`, `rev_employee`, `rev_note`) VALUES
(2, '2019-09-12', '2AB-5151-PHP-001 - ជូលអ្នកបើកបរនិងរថយន្តមិនគិតថ្លៃសាំង', 2, 1500, 40, 'hkjhkhkhkghkfhgkhglhlk  jljlbkjflkvjfdlvjksdf'),
(3, '2019-09-10', '2AD-0998-PHP-002', 2, 2500, 40, 'huyiyfuiyadfuigyadoarugo \r\ndfgudprgupdougpguperogpero'),
(4, '2019-09-10', '2AC-9989-PHP-009', 2, 500, 40, 'hshskfhkskjfhksjd'),
(5, '2019-09-09', '2AE-0090-PHP-008', 2, 850, 40, 'ggdgsdkfGKkj k hkhkhklhvkjD'),
(6, '2019-09-11', '2AC-9989-PHP-009', 2, 500, 40, 'jhhhjjkjk'),
(7, '2019-09-06', '2AD-0998-PHP-002', 2, 850, 40, 'yeye ryrty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rick_shaw_rental`
--

CREATE TABLE `tbl_rick_shaw_rental` (
  `ve_id` int(11) NOT NULL,
  `ve_title` text,
  `ve_image` text,
  `ve_detail` text,
  `ve_ref_no` text,
  `ve_year` varchar(15) DEFAULT NULL,
  `ve_make` text,
  `ve_model` text,
  `ve_sub_model` text,
  `ve_color` text,
  `ve_horse_pow` text,
  `ve_no_of_seat` text,
  `ve_note` text,
  `vat` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `rick_price` varchar(255) NOT NULL,
  `price_rent` varchar(255) NOT NULL,
  `order_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rick_shaw_rental`
--

INSERT INTO `tbl_rick_shaw_rental` (`ve_id`, `ve_title`, `ve_image`, `ve_detail`, `ve_ref_no`, `ve_year`, `ve_make`, `ve_model`, `ve_sub_model`, `ve_color`, `ve_horse_pow`, `ve_no_of_seat`, `ve_note`, `vat`, `discount`, `status`, `rick_price`, `price_rent`, `order_date`, `to_date`) VALUES
(2, 'Richsahaw kemun', '20190408_3220.png', '<p>test de</p>\r\n ', 'tyutu', 'tyuyt', 'tyutyu', 'tyutyu', 'tyut', 'tyuydtu', NULL, NULL, 'tyutyu', '10', '2', 1, '2500', '60', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rick_shaw_rental_last`
--

CREATE TABLE `tbl_rick_shaw_rental_last` (
  `ve_id` int(11) NOT NULL,
  `ve_title` text,
  `ve_image` text,
  `ve_province_name` varchar(350) DEFAULT NULL,
  `ve_detail` text,
  `ve_ref_no` text,
  `ve_year` varchar(15) DEFAULT NULL,
  `ve_make` text,
  `ve_model` text,
  `ve_sub_model` text,
  `ve_color` text,
  `ve_horse_pow` text,
  `ve_no_of_seat` text,
  `ve_transmission_type` text,
  `ve_vehical_type` text,
  `ve_type` text,
  `ve_maximum_weight` text,
  `ve_steering_wheel_type` text,
  `ve_no_of_axles` text,
  `ve_no_of_eylinders` text,
  `ve_cylinders_disp` text,
  `ve_test_drive_url` text,
  `ve_show_url` text,
  `ve_note` text,
  `vat` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `car_price` varchar(255) NOT NULL,
  `order_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `add_by_id` varchar(11) NOT NULL,
  `check_member_type` int(11) DEFAULT NULL,
  `price_rent` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `refun_deposit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rick_shaw_rental_last`
--

INSERT INTO `tbl_rick_shaw_rental_last` (`ve_id`, `ve_title`, `ve_image`, `ve_province_name`, `ve_detail`, `ve_ref_no`, `ve_year`, `ve_make`, `ve_model`, `ve_sub_model`, `ve_color`, `ve_horse_pow`, `ve_no_of_seat`, `ve_transmission_type`, `ve_vehical_type`, `ve_type`, `ve_maximum_weight`, `ve_steering_wheel_type`, `ve_no_of_axles`, `ve_no_of_eylinders`, `ve_cylinders_disp`, `ve_test_drive_url`, `ve_show_url`, `ve_note`, `vat`, `discount`, `status`, `car_price`, `order_date`, `to_date`, `add_by_id`, `check_member_type`, `price_rent`, `province_id`, `refun_deposit`) VALUES
(1, 'Rickshaw Rental', '20190703_6356.png', 'bnm', '<p>dfgsfgvv</p>\r\n ', '077', 'adsfas', 'sdfas', 'dsfa', '', 'sdfadsf', 'dfadf', 'dfadsf', 'dfgad', '', 'dfga', '', '', '', '', '', '', '', '', '10', '0', 1, '25', NULL, NULL, '0', NULL, '20', 10, '500'),
(3, 'sdfsf', '20190703_6285.png', NULL, ' ', 'sdfsa', '2017', 'ttyyy', 'rtyyyrr', 'sdfs', 'sdfsf', 'sdf', 'sdfsf', 'dfsdsf', 'sdfs', 'sdfsdf', 'sdf', 'sdf', 'sdf', 'sdfsf', 'dfssef', 'dfssf', '', '', '', '', 1, '', NULL, NULL, '35', NULL, '15', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rick_shaw_rental_last_img`
--

CREATE TABLE `tbl_rick_shaw_rental_last_img` (
  `img_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rick_shaw_rental_last_img`
--

INSERT INTO `tbl_rick_shaw_rental_last_img` (`img_id`, `car_id`, `img_sub`) VALUES
(1, 1, '../image/vehicle_rental//1562136996-Chrysanthemum.jpg'),
(2, 1, '../image/vehicle_rental//1562137020-Penguins.jpg'),
(3, 1, '../image/vehicle_rental//1562137026-Koala.jpg'),
(4, 1, '../image/vehicle_rental//1562137031-Tulips.jpg'),
(5, 3, '../../admin/image/vehicle_rental//1562138465-Chrysanthemum.jpg'),
(6, 3, '../../admin/image/vehicle_rental//1562138472-Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_product_report`
--

CREATE TABLE `tbl_sale_product_report` (
  `product_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `buyer_id_card` varchar(255) NOT NULL,
  `buyer_address` text NOT NULL,
  `sale_witness_name` varchar(255) NOT NULL,
  `sale_witness_phone` varchar(255) NOT NULL,
  `mileage_record` varchar(255) NOT NULL,
  `discount_pre` varchar(255) NOT NULL,
  `discount_record` varchar(255) NOT NULL,
  `sale_mount` varchar(255) NOT NULL,
  `net_sale` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `pre_by` varchar(255) NOT NULL,
  `app_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale_product_report`
--

INSERT INTO `tbl_sale_product_report` (`product_id`, `ref_no`, `customer_id`, `start_date`, `buyer_id_card`, `buyer_address`, `sale_witness_name`, `sale_witness_phone`, `mileage_record`, `discount_pre`, `discount_record`, `sale_mount`, `net_sale`, `note`, `type`, `pre_by`, `app_by`) VALUES
(1, 19, 25, '2019-08-01', '0044', 'kampot', 'Yun Sivatha', '092882626', '464747', '10', '1800', '18000', '16200', '                                                                                    \r\n                 test                                                           ', 'Vehicle', 'Torn Kemun', 'Savongz'),
(2, 1, 27, '2019-08-07', '0044', 'kampot', 'Yun Sivatha', '0977666', '464747', '10', '1800', '18000', '16200', '                 yrtyr    \r\n                   ', 'RickShaw', 'Torn Kemun', 'Savongz'),
(3, 1, 9, '2019-08-06', '0044', 'kampot', 'Yun Sivatha', '0977666', '464747', '2', '360', '18000', '17640', 'tyjt                     \r\n                   ', 'Accessories', 'Torn Kemun', 'Savongz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_admin`
--

CREATE TABLE `tbl_schedule_admin` (
  `se_id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `cell_phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `color_note` varchar(255) NOT NULL,
  `sc_type` varchar(255) NOT NULL,
  `sc_status` varchar(255) NOT NULL,
  `sc_title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_schedule_admin`
--

INSERT INTO `tbl_schedule_admin` (`se_id`, `ref_no`, `from_date`, `to_date`, `customer_name`, `cell_phone`, `email`, `remark`, `color_note`, `sc_type`, `sc_status`, `sc_title`, `user_id`) VALUES
(10, '26', '2019-08-10', '2019-08-14', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                    kemun\r\n                  ', '#ff0000', 'Driver', '0', '', 0),
(11, '19', '2019-08-10', '2019-08-15', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                                        \r\n                  dgfty                  ', '#ff0000', 'Vehicle', '0', '12:00pm', 0),
(12, '19', '2019-08-20', '2019-08-22', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                                        uougouou\r\n                                    ', '#9995ff', 'Vehicle', '0', '13:00PM', 0),
(14, '33', '2019-08-07', '2019-08-12', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                    \r\n               uiutituo   ', '#ff2ffa', 'T.Quide', '0', '', 0),
(15, '3', '2019-08-10', '2019-08-15', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                    tdydt\r\n                  ', '#d0ff83', 'RickShaw', '0', '', 0),
(16, '1', '2019-08-09', '2019-08-15', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                    \r\n                  fft', '#180e19', 'Accessories', '0', '', 0),
(18, '26', '2019-08-20', '2019-08-23', 'sokha', '0974433117', 'kemun.dev@gmail.com', '                                                                                \r\n                  dsgfdzgdzgdzytryrstyrstyrstyrstyrstyrtsysryrstyrt\r\ny\r\nyyryrsyrsyrty\r\n                                                      ', '#ffca75', 'Driver', 'confirm by phone', 'Managers', 0),
(19, '24', '2019-08-20', '2019-08-22', 'kemun', '0974433117', 'kemun.dev@gmail.com', '                    dxgfdfgdgdz\r\n                  ', '#b6afff', 'Vehicle', 'NOT YET', 'Manager', 0),
(20, '27', '2019-12-30', '2020-01-31', 'Channy Miech', '012 988 777', 'channy.miech@gmail.com', '        Channy will pay $10,000 on Wednesday. Dadanee will go and the collect this payment not later than the promised date.            \r\n                  ', '#fefe01', 'Vehicle', 'Follow-up', '7:30AM', 0),
(21, '16', '2019-12-01', '2019-12-31', 'Channy Miech', '012999 8888', 'channy.miech@gmail.com', '         Please follow up with Channy and ask her to pay the rest of the payment. Otherwise don\'t rent her a car.           \r\n                  ', '#f8ec07', 'Vehicle', 'Follow-up', '7:30AM', 0),
(22, '16', '2019-12-01', '2019-12-15', 'Channy Miech', '012999 8888', 'channy.miech@gmail.com', '                             Please follow up with Channy and ask her to pay the rest of the payment. Otherwise don\'t rent her a car.           \r\n                                    ', '#f8ec07', 'Vehicle', 'Follow-up', '7:30AM', 0),
(23, '1', '2019-12-02', '2019-12-26', 'test', '', '', '                    \r\n                  ', '#ff0000', 'RickShaw', 'Confirmed', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_rent`
--

CREATE TABLE `tbl_tour_rent` (
  `tour_id` int(11) NOT NULL,
  `tour_discount` int(11) NOT NULL,
  `tour_vat` int(11) NOT NULL,
  `tour_price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tour_rent`
--

INSERT INTO `tbl_tour_rent` (`tour_id`, `tour_discount`, `tour_vat`, `tour_price`) VALUES
(1, 2, 10, '60');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_try_free`
--

CREATE TABLE `tbl_try_free` (
  `tf_id` int(11) NOT NULL,
  `intro_use_id` int(11) NOT NULL,
  `tf_name` char(50) CHARACTER SET utf8 NOT NULL,
  `tf_company` char(50) CHARACTER SET utf8 NOT NULL,
  `tf_email` text CHARACTER SET utf8 NOT NULL,
  `tf_phone` text CHARACTER SET utf8 NOT NULL,
  `tf_info` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=request,1=approve,2=reject'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_try_free`
--

INSERT INTO `tbl_try_free` (`tf_id`, `intro_use_id`, `tf_name`, `tf_company`, `tf_email`, `tf_phone`, `tf_info`, `status`) VALUES
(2, 0, 'q', 'q', 'q', 'q', '', 0),
(3, 0, '11', '11', '11', '11', 'Family Friend', 0),
(4, 0, '1', '1', '1', '1', 'Search Engine', 0),
(5, 0, 'q', 'qq', 'q', 'q', 'Other', 0),
(6, 0, '11', '11', '11', '11', 'Other Website', 0),
(7, 0, '', '', '', '', '', 0),
(8, 0, '', '', '', '', '', 0),
(9, 0, 'mmm', 'qq', '1234567', '123456', '', 0),
(10, 0, 'mmm', 'ppp', 'ppppppppppp', 'ppppppppppppp', '', 0),
(11, 21, 'mmm', 'qq', '1', '1', 'Search Engine', 0),
(12, 21, 'GG', 'GG', 'GG', '123456', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` char(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `user_link` text NOT NULL,
  `user_phone_number` char(255) NOT NULL,
  `user_gender` char(255) NOT NULL,
  `user_status` char(255) NOT NULL,
  `user_position` int(11) NOT NULL,
  `user_note` varchar(255) NOT NULL,
  `user_originattion` char(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_photo`, `user_link`, `user_phone_number`, `user_gender`, `user_status`, `user_position`, `user_note`, `user_originattion`, `user_created_at`, `user_updated_at`) VALUES
(2, 'Admin LCRC', 'cb*%77m123@2021$!', 'info@lyna-carrental.com', 'blank.png', '', '', '1', '1', 1, '', '', '2018-03-29 08:40:30', '2018-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroup`
--

CREATE TABLE `tbl_usergroup` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_type` int(11) NOT NULL COMMENT '1= partner, 2= customer',
  `group_disc` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usergroup`
--

INSERT INTO `tbl_usergroup` (`id`, `group_name`, `group_type`, `group_disc`, `status`) VALUES
(1, 'CAR\'S OWNER', 1, '<p>Car&#39;s Owner</p>\r\n', 1),
(2, 'RICKSHAW\'S OWNER', 1, '<p>Rickshaw&#39;s Owner</p>\r\n', 1),
(3, 'HOTEL & GUESTHOUSE', 1, '<p>Hotel &amp; Guesthouse</p>\r\n', 1),
(4, 'TOUR GUIDE', 1, '<p>Tour Guide</p>\r\n', 1),
(5, 'DRIVER', 1, '<p>Dirver</p>\r\n', 1),
(6, 'INTRODUCER', 1, '<p>Introducer</p>\r\n', 1),
(7, 'CITY TOUR PACKAGE', 2, '<p>Partner</p>\r\n', 1),
(9, 'AIRPORT TRANSFER SERVICE PACKAGES', 2, '', 1),
(10, 'PICKUP & DROP OFF SERVICE PACKAGES', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_photo` varchar(250) DEFAULT NULL,
  `user_phone_number` varchar(50) DEFAULT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_status` char(50) DEFAULT NULL,
  `user_position` int(11) NOT NULL,
  `user_id_number` varchar(250) DEFAULT NULL,
  `user_origination` varchar(250) DEFAULT NULL,
  `user_introducer_id` varchar(250) DEFAULT NULL,
  `user_first_name` varchar(200) NOT NULL,
  `user_last_name` varchar(200) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_title` varchar(250) DEFAULT NULL,
  `user_birthday` varchar(250) DEFAULT NULL,
  `user_passport` varchar(250) DEFAULT NULL,
  `user_driver_licence` varchar(255) DEFAULT NULL,
  `user_company` varchar(250) DEFAULT NULL,
  `user_website` varchar(255) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` date DEFAULT NULL,
  `user_coupon_code` text,
  `add_bye` int(11) DEFAULT NULL,
  `user_seft_thru` int(11) DEFAULT NULL COMMENT '1=seft,2 thru',
  `province_id` int(11) DEFAULT NULL,
  `socail_user` varchar(255) DEFAULT NULL,
  `review_user` varchar(255) DEFAULT NULL,
  `daily_rate` varchar(255) DEFAULT NULL,
  `weekend_holidate_rate` varchar(255) DEFAULT NULL,
  `monthly_rate` varchar(255) DEFAULT NULL,
  `extra_rate` varchar(255) DEFAULT NULL,
  `refun_deposit` varchar(255) DEFAULT NULL,
  `black_list` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_photo`, `user_phone_number`, `user_gender`, `user_status`, `user_position`, `user_id_number`, `user_origination`, `user_introducer_id`, `user_first_name`, `user_last_name`, `user_address`, `user_title`, `user_birthday`, `user_passport`, `user_driver_licence`, `user_company`, `user_website`, `user_created_at`, `user_updated_at`, `user_coupon_code`, `add_bye`, `user_seft_thru`, `province_id`, `socail_user`, `review_user`, `daily_rate`, `weekend_holidate_rate`, `monthly_rate`, `extra_rate`, `refun_deposit`, `black_list`, `vat`, `discount`) VALUES
(96, 'partner', '$partner@123!#', 'info@lyna-garage.com\r\n', '20210217_1371_us880_91_p.jpg', '09795021132', 'Male', '1', 5, 'PN20210217743346', 'Register', 'PN20210217743346', 'himanshu', 'singh', '504 T8 Nirala estate', 'Jaunpur', '1992-08-02', '20210217_2003_us880_91_p.jpg', '20210217_6427_us880_91_p.jpg', '', '', '2021-02-17 07:16:44', NULL, 'PN20210217743346', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'customer', '$cus@123!#$', 'meassavongz@gmail.com', '20210303_9183_sugar_cane_logo.gif', '09795021132', 'Male', '1', 4, 'CU2021030399357', 'Register', 'CU20210303908500', 'ganesh2', 'singh', 'Lozenberg 15   SINT-STEVENS-WOLUWE,  1932 BE', 'ecommerce', '2021-03-25', '20210303_9865_sugar_cane_logo.gif', '20210303_5181_sugar_cane_logo.gif', 'IGC ACQUISITION', 'IGC ACQUISITION', '2021-03-03 16:18:35', NULL, '', 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_agreement`
--

CREATE TABLE `tbl_user_agreement` (
  `agree_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mr_mrs` varchar(255) NOT NULL,
  `occ_user` varchar(255) NOT NULL,
  `pob` varchar(255) NOT NULL,
  `nation_lity` varchar(255) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `group_no` varchar(255) NOT NULL,
  `home_no` varchar(255) NOT NULL,
  `street_no` mediumtext NOT NULL,
  `commnune_name` varchar(255) NOT NULL,
  `district_no` varchar(255) NOT NULL,
  `fax_no` varchar(255) NOT NULL,
  `add_line_one` varchar(255) NOT NULL,
  `add_line_two` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `cell_phone` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `iss_pass` varchar(255) NOT NULL,
  `exp_pass` varchar(255) NOT NULL,
  `id_card_no` varchar(255) NOT NULL,
  `iss_card` varchar(255) NOT NULL,
  `exp_card` varchar(255) NOT NULL,
  `rb_no` varchar(255) NOT NULL,
  `iss_book` varchar(255) NOT NULL,
  `exp_book` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_agreement`
--

INSERT INTO `tbl_user_agreement` (`agree_id`, `customer_id`, `mr_mrs`, `occ_user`, `pob`, `nation_lity`, `customer_type`, `note`, `group_no`, `home_no`, `street_no`, `commnune_name`, `district_no`, `fax_no`, `add_line_one`, `add_line_two`, `city`, `zip_code`, `state`, `country`, `cell_phone`, `passport_no`, `iss_pass`, `exp_pass`, `id_card_no`, `iss_card`, `exp_card`, `rb_no`, `iss_book`, `exp_book`) VALUES
(1, 9, 'Mr', '', 'kampot', 'khmer', 'Persional', 'test note', '11B', '24B', '#A102', 'Chuck', 'snoul', '98746584', 'pp', 'pp2', 'city', '1200', 'kampot pp', 'cambodia', '+885453333', '444411111', '2019-07-17', '2019-08-01', '112334444', '2019-07-24', '2019-07-25', 'N-06686868', '2019-07-10', '2019-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_gender`
--

CREATE TABLE `tbl_user_gender` (
  `ug_id` int(11) NOT NULL,
  `ug_name` varchar(255) NOT NULL,
  `ug_assign` int(11) NOT NULL,
  `ug_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_gender`
--

INSERT INTO `tbl_user_gender` (`ug_id`, `ug_name`, `ug_assign`, `ug_note`) VALUES
(1, 'Male', 0, ''),
(2, 'Female', 0, ''),
(3, 'Miss', 0, ''),
(4, 'Mr.', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_position`
--

CREATE TABLE `tbl_user_position` (
  `up_id` int(11) NOT NULL,
  `up_name` varchar(255) NOT NULL,
  `up_assign` varchar(255) NOT NULL,
  `up_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_position`
--

INSERT INTO `tbl_user_position` (`up_id`, `up_name`, `up_assign`, `up_note`) VALUES
(1, 'Admin', 'full control', ''),
(2, 'IT Team', 'IT Team', ''),
(3, 'Administrator', 'Administrator', ''),
(4, 'Customer', 'Customer', ''),
(5, 'Partner', 'Partner', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_status`
--

CREATE TABLE `tbl_user_status` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(255) NOT NULL,
  `us_assign` int(11) NOT NULL,
  `us_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_status`
--

INSERT INTO `tbl_user_status` (`us_id`, `us_name`, `us_assign`, `us_note`) VALUES
(1, 'active', 0, ''),
(2, 'disable', 0, ''),
(3, 'pendding', 0, ''),
(1, 'active', 0, ''),
(2, 'disable', 0, ''),
(3, 'pendding', 0, ''),
(1, 'active', 0, ''),
(2, 'disable', 0, ''),
(3, 'pendding', 0, ''),
(1, 'active', 0, ''),
(2, 'disable', 0, ''),
(3, 'pendding', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_rantal`
--

CREATE TABLE `tbl_vehicle_rantal` (
  `ve_id` int(11) NOT NULL,
  `ve_title` text,
  `ve_image` text,
  `ve_detail` text,
  `ve_ref_no` text,
  `ve_year` varchar(15) DEFAULT NULL,
  `ve_make` text,
  `ve_model` text,
  `ve_sub_model` text,
  `ve_color` text,
  `frame` varchar(255) DEFAULT NULL,
  `chassis_no` varchar(255) DEFAULT NULL,
  `engine_no` varchar(255) DEFAULT NULL,
  `cylinder_size` varchar(255) DEFAULT NULL,
  `placque_no` varchar(255) DEFAULT NULL,
  `ve_horse_pow` text,
  `ve_no_of_seat` text,
  `ve_transmission_type` text,
  `ve_vehical_type` text,
  `ve_type` text,
  `ve_maximum_weight` text,
  `ve_steering_wheel_type` text,
  `ve_no_of_axles` text,
  `ve_no_of_eylinders` text,
  `ve_cylinders_disp` text,
  `ve_test_drive_url` text,
  `ve_show_url` text,
  `ve_note` text,
  `ve_days(1-7)` text,
  `ve_extra_days(1-7)` text,
  `ve_day(15-26)` text,
  `ve_extra_day(15-26)` text,
  `ve_monthly` text,
  `ve_monthy_extra_days` text,
  `ve_yearly` text,
  `ve_yearly_extra_days` text,
  `vat` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `car_price` varchar(255) NOT NULL,
  `order_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `add_by_id` varchar(11) DEFAULT NULL,
  `check_member_type` int(11) DEFAULT NULL,
  `ld_assistant` varchar(255) DEFAULT NULL,
  `refun_deposit` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `total_view` bigint(20) DEFAULT '0',
  `created_on` varchar(20) NOT NULL DEFAULT '1616231037',
  `updated_on` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vehicle_rantal`
--

INSERT INTO `tbl_vehicle_rantal` (`ve_id`, `ve_title`, `ve_image`, `ve_detail`, `ve_ref_no`, `ve_year`, `ve_make`, `ve_model`, `ve_sub_model`, `ve_color`, `frame`, `chassis_no`, `engine_no`, `cylinder_size`, `placque_no`, `ve_horse_pow`, `ve_no_of_seat`, `ve_transmission_type`, `ve_vehical_type`, `ve_type`, `ve_maximum_weight`, `ve_steering_wheel_type`, `ve_no_of_axles`, `ve_no_of_eylinders`, `ve_cylinders_disp`, `ve_test_drive_url`, `ve_show_url`, `ve_note`, `ve_days(1-7)`, `ve_extra_days(1-7)`, `ve_day(15-26)`, `ve_extra_day(15-26)`, `ve_monthly`, `ve_monthy_extra_days`, `ve_yearly`, `ve_yearly_extra_days`, `vat`, `discount`, `status`, `car_price`, `order_date`, `to_date`, `add_by_id`, `check_member_type`, `ld_assistant`, `refun_deposit`, `province_id`, `total_view`, `created_on`, `updated_on`) VALUES
(15, '2002 TOYOTA RAV-4L', '20190808_5049.png', ' ', '2AD-8567-PHP-006', '2002', 'TOYOTA', 'RAV-4', 'L', 'WHITE', 'JTEGH20V920044138', 'NIL', '1AZ4043540', '2000', '2AD-8567-PHP', '148HP', '5', 'AUTOMATIC', 'SUV', 'WAGON', 'UNKNOWN', 'LHD', '2', '4', '2000', '', '', '', '45.50', '42.50', '40.50', '38.50', '700.50', '38.50', '8406.50', '38.50', '10', '10', 1, '15000', NULL, NULL, '', NULL, '150.00', '500.00', 7, 82, '1616231037', '1616244109'),
(16, '2002 TOYOTA RAV-4L', '20190808_6946.png', ' ', '2AO-9708-PHP-007', '2002', 'TOYOTA', 'RAV-4', 'L', 'WHITE', 'JTEHH20V520137324', 'NIL', '1AZ4053667', '2000', '2AO-9708-PHP', '148HP', '5', 'AUTOMATIC', '4WD', 'SUV', 'UNKNOWN', 'LHD', '2', '4', '2000', '', '', '', '40.50', '42.50', '40.50', '38.50', '700.50', '38.50', '8406.50', '38.50', '10.00', '10.00', 1, '8000', NULL, NULL, '', NULL, '150.00', '500.00', 19, 82, '1616231037', NULL),
(19, '2002 TOYOTA RAV-4L', '20190808_9091.png', ' ', '2AB-5151-PHP-005', '2002', 'TOYOTA', 'RAV-4', 'L', 'WHITE', 'JTEGH20V020050720', 'NIL', '1AZ4055036', '2000', '2AB-5151-PHP', '139HP', '5', 'AUTOMATIC', 'SUV', '4WD', 'UNKNOWN', 'LHD', '2', '4', '2000', '', '', '', '45.50', '42.50', '40.50', '38.50', '700.50', '38.50', '8406.00', '88', '10', '56', 1, '15000', NULL, NULL, '38', 5, '150.00', '500.00', 19, 82, '1616231037', NULL),
(20, '2002 LEXUS RX300', '20190809_1825.png', ' ', '2AM-2003-PHP-001', '2002', 'LEXUS', 'RX', '300', 'WHITE', 'JTJHF10U320238922', 'NIL', '1MZ4515315', '3000', '2AM-2003-PHP', '220HP', '5', 'AUTOMATIC', 'SUV', '4WD', 'UNKNOWN', 'LHD', '2', '6', '3000', '', '', '', '60.50', '57.50', '55.50', '53.50', '900.50', '53.50', '8956.50', '53.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000.00', 19, 82, '1616231037', NULL),
(21, '2002 LEXUS RX300', '20190809_6687.png', ' ', '2AM-9707-PHP-002', '2002', 'LEXUS', 'RX', '300', 'WHITE', '', '', '', '', '', '220HP', '5', 'AUTOMATIC', '4WD', 'SUV', 'UNKNOWN', 'LHD', '2', '6', '3000', '', '', '', '60.50', '57.50', '55.50', '53.50', '900.50', '53.50', '8956.50', '53.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000', 19, 86, '1616231037', NULL),
(22, '2002 LEXUS RX300', '20190809_3085.png', ' ', '2AK-9471-PHP-003', '2002', 'LEXUS', 'RX', '300', 'WHITE', '', '', '', '', '', '220HP', '5', 'AUTOMATIC', '4WD', 'SUV', 'UNKNOWN', 'LHD', '2', '6', '3000', '', '', '', '60.50', '57.50', '55.50', '53.50', '900.50', '53.50', '8956.50', '53.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000', 19, 85, '1616231037', NULL),
(23, '2001 MIT. MONTERO LIMITED', '20190809_7186.png', ' ', '2AI-4997-PHP-002', '2001', 'MITUBISHI', 'MONTERO', 'LIMITED', 'GOLDEN', '', '', '', '', '', '194HP', '7', 'AUTOMATIC', '4WD', 'SUV', 'UNKNOWN', 'LHD', '2', '6', '3500', '', '', '', '60.50', '57.50', '55.50', '53.50', '1050.50', '53.50', '12600.50', '53.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '500', 19, 82, '1616231037', NULL),
(24, '2002 TOYOTA HIGH LANDER LIMITED', '20190809_5718.png', ' ', '2Y-4368-PHP-001', '2002', 'TOYOTA', 'HIGH LANDER', 'LIMITED', 'SILVER', '', '', '', '', '', '220HP', '5', 'AUTOMATIC', '4WD', 'SUV', 'UNKNOWN', 'LHD', '2', '6', '3500', '', '', '', '55.50', '47.50', '45.50', '43.50', '900.50', '43.50', '10800.50', '43.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '500', 19, 82, '1616231037', NULL),
(25, '2003 HIGH LANDER LIMITED', '20190809_6719.png', ' ', '2AD-0386-PHP-002', '2003', 'TOYOTA', 'HIGH LANDER', 'LIMITED', 'WHITE', '', '', '', '', '', '157HP', '5', 'AUTOMATIC', '2WD', 'SUV', 'UNKNOWN', 'LHD', '2', '4', '2400', '', '', '', '55.50', '47.50', '45.50', '43.50', '900.50', '43.50', '10800.50', '43.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '500', 19, 82, '1616231037', NULL),
(26, '2006 NISSAN FRONTIER LE', '20190809_4120.png', ' ', '2AR-9813-PHP-001', '2006', 'NISSAN', 'FRONTIER', 'LE', 'GRAY', '', '', '', '', '', '265HP', '5', 'AUTOMATIC', '4WD', 'PICKUP', 'UNKNOWN', 'LHD', '2', '6', '4000', '', '', '', '70.50', '67.50', '65.50', '62.50', '1800.50', '62.50', '21600.50', '62.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '500', 19, 82, '1616231037', NULL),
(27, '2008 NISSAN NAVARA LE', '20190809_3473.png', ' ', '2V-6295-PHP-002', '2008', 'NISSAN ', 'NAVARA', 'LE', 'SILVER', '', '', '', '', '', '', '5', 'AUTOMATIC', '4WD', 'PICKUP', 'UNKNOWN', 'LHD', '2', '', '', '', '', '', '70.50', '67.50', '65.50', '62.50', '1800.50', '62.50', '21600.50', '62.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000', 19, 82, '1616231037', NULL),
(28, '2002 SSANGYONG ISTANA GL', '20190809_4591.png', ' ', '2AA-0871-PHP-001', '2002', 'SSANGYONG', 'ISTANA', 'GL', 'WHITE', '', '', '', '', '', '250HP', '15', 'MANUAL', 'VAN', 'VAN', 'UNKNOWN', 'LHD', '2', '4', '2500', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '', '', 19, 82, '1616231037', NULL),
(29, '2013 ISUZU D-MAX', '20190809_3242.png', ' ', '2O-7257-PHP-001', '2013', 'ISUZU', 'D-MAX', 'MAX', 'GOLDEN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '70.50', '67.50', '65.50', '62.50', '1800.50', '62.50', '21800.50', '62.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000', 19, 84, '1616231037', NULL),
(30, '2013 ISUZU D-MAX', '20190810_5829.png', ' ', '2O-7257-PHP-001', '2013', 'ISUZU', 'D-MAX', 'MAX', 'GOLDEN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '70.50', '67.50', '65.50', '62.50', '1800.50', '62.50', '21800.50', '62.50', '10.00', '10.00', 1, '', NULL, NULL, NULL, NULL, '150.00', '1000', 19, 83, '1616231037', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_rantal_img`
--

CREATE TABLE `tbl_vehicle_rantal_img` (
  `img_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `img_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle_rantal_img`
--

INSERT INTO `tbl_vehicle_rantal_img` (`img_id`, `car_id`, `img_sub`) VALUES
(35, 19, '../../admin/image/vehicle_rental//1559285767-2. 2AB - 5151-PHP-005.jpg'),
(34, 19, '../../admin/image/vehicle_rental//1559285762-7. 2AB-5151-PHP-005.jpg'),
(106, 15, '../image/vehicle_rental//1565920727-3. 2AB - 5151-PHP-005.jpg'),
(105, 15, '../image/vehicle_rental//1565920725-1. 2AB - 5151-PHP-005.jpg'),
(104, 15, '../image/vehicle_rental//1565920725-2. 2AB - 5151-PHP-005.jpg'),
(27, 19, '../../admin/image/vehicle_rental//1559282773-1. 2AB - 5151-PHP-005.jpg'),
(29, 19, '../../admin/image/vehicle_rental//1559282813-9. 2AB - 5151-PHP-005.jpg'),
(36, 23, '../image/vehicle_rental//1565844513-1. 2AI-4997-PHP-001.jpg'),
(37, 23, '../image/vehicle_rental//1565844513-2. 2AI-4997-PHP-001.jpg'),
(38, 23, '../image/vehicle_rental//1565844520-3. 2AI-4997-PHP-001.jpg'),
(39, 23, '../image/vehicle_rental//1565844521-4. 2AI-4997-PHP-001.jpg'),
(40, 23, '../image/vehicle_rental//1565844539-5. 2AI-4997-PHP-001.jpg'),
(41, 23, '../image/vehicle_rental//1565844539-6. 2AI-4997-PHP-001.jpg'),
(42, 23, '../image/vehicle_rental//1565844540-7. 2AI-4997-PHP-001.jpg'),
(43, 23, '../image/vehicle_rental//1565844542-8. 2AI-4997-PHP-001.jpg'),
(44, 23, '../image/vehicle_rental//1565844560-10. 2AI-4997-PHP-001.jpg'),
(45, 23, '../image/vehicle_rental//1565844560-9. 2AI-4997-PHP-001.jpg'),
(46, 23, '../image/vehicle_rental//1565844562-11. 2AI-4997-PHP-001.jpg'),
(47, 23, '../image/vehicle_rental//1565844563-12. 2AI-4997-PHP-001.jpg'),
(48, 20, '../image/vehicle_rental//1565920407-1. 2AM-2003-PHP-001.jpg'),
(49, 20, '../image/vehicle_rental//1565920407-2. 2AM-2003-PHP-001.jpg'),
(50, 20, '../image/vehicle_rental//1565920410-3. 2AM-2003-PHP-001.jpg'),
(51, 20, '../image/vehicle_rental//1565920411-4. 2AM-2003-PHP-001.jpg'),
(52, 20, '../image/vehicle_rental//1565920425-5. 2AM-2003-PHP-001.jpg'),
(53, 20, '../image/vehicle_rental//1565920426-6. 2AM-2003-PHP-001.jpg'),
(54, 20, '../image/vehicle_rental//1565920427-7. 2AM-2003-PHP-001.jpg'),
(55, 20, '../image/vehicle_rental//1565920428-8. 2AM-2003-PHP-001.jpg'),
(56, 20, '../image/vehicle_rental//1565920455-10. 2AM-2003-PHP-001.jpg'),
(57, 20, '../image/vehicle_rental//1565920455-9. 2AM-2003-PHP-001.jpg'),
(58, 20, '../image/vehicle_rental//1565920456-11. 2AM-2003-PHP-001.jpg'),
(59, 20, '../image/vehicle_rental//1565920457-12. 2AM-2003-PHP-001.jpg'),
(60, 21, '../image/vehicle_rental//1565920493-1. 2AM-2003-PHP-001.jpg'),
(61, 21, '../image/vehicle_rental//1565920494-2. 2AM-2003-PHP-001.jpg'),
(62, 21, '../image/vehicle_rental//1565920495-3. 2AM-2003-PHP-001.jpg'),
(63, 21, '../image/vehicle_rental//1565920497-4. 2AM-2003-PHP-001.jpg'),
(64, 21, '../image/vehicle_rental//1565920505-5. 2AM-2003-PHP-001.jpg'),
(65, 21, '../image/vehicle_rental//1565920505-6. 2AM-2003-PHP-001.jpg'),
(66, 21, '../image/vehicle_rental//1565920507-7. 2AM-2003-PHP-001.jpg'),
(67, 21, '../image/vehicle_rental//1565920516-10. 2AM-2003-PHP-001.jpg'),
(68, 21, '../image/vehicle_rental//1565920516-9. 2AM-2003-PHP-001.jpg'),
(69, 21, '../image/vehicle_rental//1565920517-11. 2AM-2003-PHP-001.jpg'),
(70, 21, '../image/vehicle_rental//1565920519-12. 2AM-2003-PHP-001.jpg'),
(71, 22, '../image/vehicle_rental//1565920537-2. 2AM-2003-PHP-001.jpg'),
(72, 22, '../image/vehicle_rental//1565920537-1. 2AM-2003-PHP-001.jpg'),
(73, 22, '../image/vehicle_rental//1565920539-3. 2AM-2003-PHP-001.jpg'),
(74, 22, '../image/vehicle_rental//1565920540-4. 2AM-2003-PHP-001.jpg'),
(75, 22, '../image/vehicle_rental//1565920550-5. 2AM-2003-PHP-001.jpg'),
(76, 22, '../image/vehicle_rental//1565920550-6. 2AM-2003-PHP-001.jpg'),
(77, 22, '../image/vehicle_rental//1565920551-7. 2AM-2003-PHP-001.jpg'),
(78, 22, '../image/vehicle_rental//1565920553-8. 2AM-2003-PHP-001.jpg'),
(79, 22, '../image/vehicle_rental//1565920561-9. 2AM-2003-PHP-001.jpg'),
(80, 22, '../image/vehicle_rental//1565920561-10. 2AM-2003-PHP-001.jpg'),
(81, 22, '../image/vehicle_rental//1565920562-11. 2AM-2003-PHP-001.jpg'),
(82, 22, '../image/vehicle_rental//1565920563-12. 2AM-2003-PHP-001.jpg'),
(83, 28, '../image/vehicle_rental//1565920595-1. 2002 - 2AA-1373-PHP-002.jpg'),
(84, 28, '../image/vehicle_rental//1565920595-2. 2002 - 2AA-1373-PHP.jpg'),
(85, 28, '../image/vehicle_rental//1565920597-3. 2002 - 2AA-1373-PHP.jpg'),
(86, 28, '../image/vehicle_rental//1565920598-4. 2002 - 2AA-1373-PHP.jpg'),
(87, 28, '../image/vehicle_rental//1565920606-5. 2002 - 2AA-1373-PHP-002.jpg'),
(88, 28, '../image/vehicle_rental//1565920606-6. 2002 - 2AA-1373-PHP.jpg'),
(89, 28, '../image/vehicle_rental//1565920608-7. 2002 - 2AA-1373-PHP.jpg'),
(90, 28, '../image/vehicle_rental//1565920609-8. 2002 - 2AA-1373-PHP.jpg'),
(91, 28, '../image/vehicle_rental//1565920615-10. 2002 SsangYong Istana - 2AA-1373-PHP-002.jpg'),
(92, 28, '../image/vehicle_rental//1565920615-9. 2002 SsangYong Istana - 2AA-1373-PHP-002.jpg'),
(93, 24, '../image/vehicle_rental//1565920652-2. 2Y-4368-PHP-001.jpg'),
(94, 24, '../image/vehicle_rental//1565920652-3. 2Y-4368-PHP-001.jpg'),
(95, 24, '../image/vehicle_rental//1565920653-4. 2Y-4368-PHP-001.jpg'),
(96, 24, '../image/vehicle_rental//1565920654-5. 2Y-4368-PHP-001.jpg'),
(97, 24, '../image/vehicle_rental//1565920665-6. 2Y-4368-PHP-001.jpg'),
(98, 24, '../image/vehicle_rental//1565920665-7. 2Y-4368-PHP-001.jpg'),
(99, 24, '../image/vehicle_rental//1565920666-8. 2Y-4368-PHP-001.jpg'),
(100, 24, '../image/vehicle_rental//1565920667-9. 2Y-4368-PHP-001.jpg'),
(101, 24, '../image/vehicle_rental//1565920675-11. 2Y-4368-PHP-001.jpg'),
(102, 24, '../image/vehicle_rental//1565920675-10. 2Y-4368-PHP-001.jpg'),
(103, 24, '../image/vehicle_rental//1565920676-12. 2Y-4368-PHP-001.jpg'),
(107, 15, '../image/vehicle_rental//1565920728-4. 2AB - 5151-PHP-005.jpg'),
(108, 15, '../image/vehicle_rental//1565920736-5. 2AB - 5151-PHP-005.jpg'),
(109, 15, '../image/vehicle_rental//1565920736-6. 2AB - 5151-PHP-005.jpg'),
(110, 15, '../image/vehicle_rental//1565920738-7. 2AB-5151-PHP-005.jpg'),
(111, 15, '../image/vehicle_rental//1565920738-8. 2AB-5151-PHP-005.jpg'),
(112, 15, '../image/vehicle_rental//1565920746-9. 2AB - 5151-PHP-005.jpg'),
(113, 15, '../image/vehicle_rental//1565920746-10. 2AB - 5151-PHP-005.jpg'),
(114, 15, '../image/vehicle_rental//1565920748-11. 2AB - 5151-PHP-005.jpg'),
(115, 15, '../image/vehicle_rental//1565920748-12. 2AB - 5151-PHP-005.jpg'),
(116, 16, '../image/vehicle_rental//1565920789-2. 2AO-9708-PHP-007.jpg'),
(117, 16, '../image/vehicle_rental//1565920789-1. 2AO-9708-PHP-007.jpg'),
(118, 16, '../image/vehicle_rental//1565920791-3. 2AO-9708-PHP-007.jpg'),
(119, 16, '../image/vehicle_rental//1565920792-4. 2AO-9708-PHP-007.jpg'),
(120, 16, '../image/vehicle_rental//1565920800-5. 2AO-9708-PHP-007.jpg'),
(121, 16, '../image/vehicle_rental//1565920800-6. 2AO-9708-PHP-007.jpg'),
(122, 16, '../image/vehicle_rental//1565920802-7. 2AO-9708-PHP-007.jpg'),
(123, 16, '../image/vehicle_rental//1565920803-8. 2AO-9708-PHP-007.jpg'),
(124, 16, '../image/vehicle_rental//1565920811-10. 2AO-9708-PHP-007.jpg'),
(125, 16, '../image/vehicle_rental//1565920811-9. 2AO-9708-PHP-007.jpg'),
(126, 16, '../image/vehicle_rental//1565920812-11. 2AO-9708-PHP-007.jpg'),
(127, 16, '../image/vehicle_rental//1565920812-12. 2AO-9708-PHP-007.jpg'),
(128, 19, '../image/vehicle_rental//1565920854-1. 2AB - 5151-PHP-005.jpg'),
(129, 19, '../image/vehicle_rental//1565920854-2. 2AB - 5151-PHP-005.jpg'),
(130, 19, '../image/vehicle_rental//1565920855-3. 2AB - 5151-PHP-005.jpg'),
(131, 19, '../image/vehicle_rental//1565920856-4. 2AB - 5151-PHP-005.jpg'),
(132, 19, '../image/vehicle_rental//1565920863-5. 2AB - 5151-PHP-005.jpg'),
(133, 19, '../image/vehicle_rental//1565920863-6. 2AB - 5151-PHP-005.jpg'),
(134, 19, '../image/vehicle_rental//1565920865-7. 2AB-5151-PHP-005.jpg'),
(135, 19, '../image/vehicle_rental//1565920866-8. 2AB-5151-PHP-005.jpg'),
(136, 19, '../image/vehicle_rental//1565920873-9. 2AB - 5151-PHP-005.jpg'),
(137, 19, '../image/vehicle_rental//1565920873-10. 2AB - 5151-PHP-005.jpg'),
(138, 19, '../image/vehicle_rental//1565920874-11. 2AB - 5151-PHP-005.jpg'),
(139, 19, '../image/vehicle_rental//1565920876-12. 2AB - 5151-PHP-005.jpg'),
(140, 25, '../image/vehicle_rental//1565920912-1. 2AD-0386-PHP-002.jpg'),
(141, 25, '../image/vehicle_rental//1565920912-2. 2AD-0386-PHP-002.jpg'),
(142, 25, '../image/vehicle_rental//1565920914-3. 2AD-0386-PHP-002.jpg'),
(143, 25, '../image/vehicle_rental//1565920914-4. 2AD-0386-PHP-002.jpg'),
(144, 25, '../image/vehicle_rental//1565920922-5. 2AD-0386-PHP-002.jpg'),
(145, 25, '../image/vehicle_rental//1565920922-6. 2AD-0386-PHP-002.jpg'),
(146, 25, '../image/vehicle_rental//1565920923-7. 2AD-0386-PHP-002.jpg'),
(147, 25, '../image/vehicle_rental//1565920924-8. 2AD-0386-PHP-002.jpg'),
(148, 25, '../image/vehicle_rental//1565920931-9. 2AD-0386-PHP-002.jpg'),
(149, 25, '../image/vehicle_rental//1565920931-10. 2AD-0386-PHP-002.jpg'),
(150, 25, '../image/vehicle_rental//1565920933-11. 2AD-0386-PHP-002.jpg'),
(151, 25, '../image/vehicle_rental//1565920933-12. 2AD-0386-PHP-002.jpg'),
(152, 26, '../image/vehicle_rental//1565920967-1. 2AR-9813-PHP-002.jpg'),
(153, 26, '../image/vehicle_rental//1565920967-2. 2AR-9813-PHP-002.jpg'),
(154, 26, '../image/vehicle_rental//1565920968-3. 2AR-9813-PHP-002.jpg'),
(155, 26, '../image/vehicle_rental//1565920969-4. 2AR-9813-PHP-002.jpg'),
(156, 26, '../image/vehicle_rental//1565920976-6. 2AR-9813-PHP-002.jpg'),
(157, 26, '../image/vehicle_rental//1565920976-5. 2AR-9813-PHP-002 copy.jpg'),
(158, 26, '../image/vehicle_rental//1565920977-7. 2AR-9813-PHP-002.jpg'),
(159, 26, '../image/vehicle_rental//1565920978-8. 2AR-9813-PHP-002.jpg'),
(160, 26, '../image/vehicle_rental//1565920985-9. 2AR-9813-PHP-002.jpg'),
(161, 26, '../image/vehicle_rental//1565920985-10. 2AR-9813-PHP-002.jpg'),
(162, 26, '../image/vehicle_rental//1565920986-11. 2AR-9813-PHP-002.jpg'),
(163, 26, '../image/vehicle_rental//1565920987-12. 2AR-9813-PHP-002.jpg'),
(164, 27, '../image/vehicle_rental//1565921023-1. 2V-6295-PHP-003A.jpg'),
(165, 27, '../image/vehicle_rental//1565921023-2. 2V-6295-PHP-003A.jpg'),
(166, 27, '../image/vehicle_rental//1565921025-3. 2V-6295-PHP-003A.jpg'),
(167, 27, '../image/vehicle_rental//1565921025-4. 2V-6295-PHP-003A.jpg'),
(168, 27, '../image/vehicle_rental//1565921032-5. 2V-6295-PHP-003A.jpg'),
(169, 27, '../image/vehicle_rental//1565921032-6. 2V-6295-PHP-003A.jpg'),
(170, 27, '../image/vehicle_rental//1565921034-7. 2V-6295-PHP-003A.jpg'),
(171, 27, '../image/vehicle_rental//1565921034-8. 2V-6295-PHP-003A.jpg'),
(172, 27, '../image/vehicle_rental//1565921042-9. 2V-6295-PHP-003A.jpg'),
(173, 27, '../image/vehicle_rental//1565921042-10. 2V-6295-PHP-003A.jpg'),
(174, 27, '../image/vehicle_rental//1565921043-11. 2V-6295-PHP-003A.jpg'),
(175, 29, '../image/vehicle_rental//1565921097-1. 2O-7257-PHP-001.jpg'),
(176, 29, '../image/vehicle_rental//1565921097-2. 2O-7257-PHP-001.jpg'),
(177, 29, '../image/vehicle_rental//1565921098-3. 2O-7257-PHP-001.jpg'),
(178, 29, '../image/vehicle_rental//1565921100-4. 2O-7257-PHP-001.jpg'),
(179, 29, '../image/vehicle_rental//1565921106-6. 2O-7257-PHP-001.jpg'),
(180, 29, '../image/vehicle_rental//1565921107-5. 2O-7257-PHP-001.jpg'),
(181, 29, '../image/vehicle_rental//1565921108-7. 2O-7257-PHP-001.jpg'),
(182, 29, '../image/vehicle_rental//1565921110-8. 2O-7257-PHP-001.jpg'),
(183, 29, '../image/vehicle_rental//1565921122-10. 2O-7257-PHP-001.jpg'),
(184, 29, '../image/vehicle_rental//1565921122-9. 2O-7257-PHP-001.jpg'),
(185, 29, '../image/vehicle_rental//1565921123-11. 2O-7257-PHP-001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL,
  `verdor_name` char(255) NOT NULL,
  `gender` char(225) NOT NULL,
  `current_address` char(255) NOT NULL,
  `images` mediumtext NOT NULL,
  `phone` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `remark` text NOT NULL,
  `id_card` text NOT NULL,
  `residence_boook` text NOT NULL,
  `passport` text NOT NULL,
  `dob` date NOT NULL,
  `review` text NOT NULL,
  `black_list` text NOT NULL,
  `s_fb` text NOT NULL,
  `s_tw` text NOT NULL,
  `s_lin` text NOT NULL,
  `s_google` text NOT NULL,
  `s_email` text NOT NULL,
  `ref_no` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `verdor_name`, `gender`, `current_address`, `images`, `phone`, `email`, `remark`, `id_card`, `residence_boook`, `passport`, `dob`, `review`, `black_list`, `s_fb`, `s_tw`, `s_lin`, `s_google`, `s_email`, `ref_no`) VALUES
(1, 'kemun', 'Female', 'kampot', '20190304_5403.png', '0974433117', 'kemun.dev@gmail.com', 'remakr', '20190304_5898.png', '20190304_1749.png', '20190304_1192.png', '2019-03-27', 'renew', 'Blacklist', 'https://www.facebook.com/yun.sivattha', '', '', '', '', 'km007'),
(2, 'kemun', 'Male', 'lll', '20190304_6505.png', '09758585', 'krm@gmail.com', 're', '20190304_9505.png', '20190304_1419.png', '20190304_3276.png', '2019-03-06', '10', 'Excellency', 'https://www.facebook.com/search/top/?q=yun%20sivattha&epa=SEARCH_BOX', '', '', '', '', 'km00777'),
(3, 'km', 'Female', 'kp', '20190309_1289.png', '0963825719', 'kk@gmail.com', '66', '20190309_9302.png', '20190309_7636.png', '20190309_9193.png', '2019-03-14', '90', 'Blacklist', 'https://www.facebook.com/yun.sivattha', '', '', '', 'https://www.facebook.com/yun.sivattha', '007');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_info`
--

CREATE TABLE `tbl_website_info` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_data` text NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_website_info`
--

INSERT INTO `tbl_website_info` (`id`, `section_name`, `section_data`, `priority`, `status`) VALUES
(1, 'phone', '+855 92 14 30 14,+855 16 91 61 51', 3, 1),
(2, 'email', 'info@lyna-carrental.com', 4, 1),
(3, 'address', 'H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)\r\nStreet 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia\r\nEng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517\r\nSkype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517\r\nE-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com\r\n', 1, 1),
(4, 'website', 'Lyna-CarRental.Com', 5, 1),
(5, 'copyright', 'Lyna-CarRental.Com', 0, 1),
(6, 'zipcode', '123016', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yes_no`
--

CREATE TABLE `tbl_yes_no` (
  `yn_id` int(11) NOT NULL,
  `yn_name` char(255) NOT NULL,
  `yn_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yes_no`
--

INSERT INTO `tbl_yes_no` (`yn_id`, `yn_name`, `yn_note`) VALUES
(1, 'Yes', ''),
(2, 'No', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_registeration`
--
ALTER TABLE `event_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_announment`
--
ALTER TABLE `job_announment`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `package_posting_type`
--
ALTER TABLE `package_posting_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_accessories_rental`
--
ALTER TABLE `tbl_accessories_rental`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `tbl_accessories_rental_img`
--
ALTER TABLE `tbl_accessories_rental_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_accessory_admin`
--
ALTER TABLE `tbl_accessory_admin`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_accessory_make`
--
ALTER TABLE `tbl_accessory_make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `tbl_accessory_model`
--
ALTER TABLE `tbl_accessory_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  ADD PRIMARY KEY (`ag_id`);

--
-- Indexes for table `tbl_air_port`
--
ALTER TABLE `tbl_air_port`
  ADD PRIMARY KEY (`air_id`);

--
-- Indexes for table `tbl_air_port_booking`
--
ALTER TABLE `tbl_air_port_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_air_port_book_car`
--
ALTER TABLE `tbl_air_port_book_car`
  ADD PRIMARY KEY (`book_car_id`);

--
-- Indexes for table `tbl_app_job`
--
ALTER TABLE `tbl_app_job`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `tbl_bonus`
--
ALTER TABLE `tbl_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book_accessory`
--
ALTER TABLE `tbl_book_accessory`
  ADD PRIMARY KEY (`book_acc_id`);

--
-- Indexes for table `tbl_book_car`
--
ALTER TABLE `tbl_book_car`
  ADD PRIMARY KEY (`book_car_id`);

--
-- Indexes for table `tbl_book_drive`
--
ALTER TABLE `tbl_book_drive`
  ADD PRIMARY KEY (`b_driver_id`);

--
-- Indexes for table `tbl_book_info`
--
ALTER TABLE `tbl_book_info`
  ADD PRIMARY KEY (`book_info_id`);

--
-- Indexes for table `tbl_book_province`
--
ALTER TABLE `tbl_book_province`
  ADD PRIMARY KEY (`book_pro_id`);

--
-- Indexes for table `tbl_book_rickshaw`
--
ALTER TABLE `tbl_book_rickshaw`
  ADD PRIMARY KEY (`book_car_id`);

--
-- Indexes for table `tbl_book_tour_quide`
--
ALTER TABLE `tbl_book_tour_quide`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbl_buy_package`
--
ALTER TABLE `tbl_buy_package`
  ADD PRIMARY KEY (`buy_package_id`);

--
-- Indexes for table `tbl_carrental_pickup_price`
--
ALTER TABLE `tbl_carrental_pickup_price`
  ADD PRIMARY KEY (`air_id`);

--
-- Indexes for table `tbl_car_sale`
--
ALTER TABLE `tbl_car_sale`
  ADD PRIMARY KEY (`car_sale_id`);

--
-- Indexes for table `tbl_car_sales`
--
ALTER TABLE `tbl_car_sales`
  ADD PRIMARY KEY (`cars_id`);

--
-- Indexes for table `tbl_cash_voucher`
--
ALTER TABLE `tbl_cash_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_comment`
--
ALTER TABLE `tbl_contact_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_contact_images`
--
ALTER TABLE `tbl_contact_images`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_contact_information`
--
ALTER TABLE `tbl_contact_information`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`cop_no`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_customer_position`
--
ALTER TABLE `tbl_customer_position`
  ADD PRIMARY KEY (`cpos_id`);

--
-- Indexes for table `tbl_customer_provide`
--
ALTER TABLE `tbl_customer_provide`
  ADD PRIMARY KEY (`cpr_id`);

--
-- Indexes for table `tbl_cus_letter`
--
ALTER TABLE `tbl_cus_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cv_education`
--
ALTER TABLE `tbl_cv_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `tbl_cv_information`
--
ALTER TABLE `tbl_cv_information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tbl_daily_duties`
--
ALTER TABLE `tbl_daily_duties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_input_coupon`
--
ALTER TABLE `tbl_data_input_coupon`
  ADD PRIMARY KEY (`tdc_id`);

--
-- Indexes for table `tbl_destination_list`
--
ALTER TABLE `tbl_destination_list`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `tbl_driver_rent`
--
ALTER TABLE `tbl_driver_rent`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `tbl_event_promotion`
--
ALTER TABLE `tbl_event_promotion`
  ADD PRIMARY KEY (`e_pro_id`);

--
-- Indexes for table `tbl_event_promotion_img`
--
ALTER TABLE `tbl_event_promotion_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  ADD PRIMARY KEY (`exca_id`);

--
-- Indexes for table `tbl_expense_list`
--
ALTER TABLE `tbl_expense_list`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `tbl_expen_request`
--
ALTER TABLE `tbl_expen_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `tbl_footer_status`
--
ALTER TABLE `tbl_footer_status`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `tbl_footer_text`
--
ALTER TABLE `tbl_footer_text`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_ft_img_foooter`
--
ALTER TABLE `tbl_ft_img_foooter`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_ft_job_announ`
--
ALTER TABLE `tbl_ft_job_announ`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_ft_latest_news`
--
ALTER TABLE `tbl_ft_latest_news`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_ft_phone`
--
ALTER TABLE `tbl_ft_phone`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_ft_upcoming`
--
ALTER TABLE `tbl_ft_upcoming`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `tbl_guestbook`
--
ALTER TABLE `tbl_guestbook`
  ADD PRIMARY KEY (`gues_id`);

--
-- Indexes for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`ht_id`);

--
-- Indexes for table `tbl_hotel_booking`
--
ALTER TABLE `tbl_hotel_booking`
  ADD PRIMARY KEY (`ho_book_id`);

--
-- Indexes for table `tbl_hotel_book_items`
--
ALTER TABLE `tbl_hotel_book_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_hotel_img`
--
ALTER TABLE `tbl_hotel_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_hotel_include_option`
--
ALTER TABLE `tbl_hotel_include_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `tbl_info_center`
--
ALTER TABLE `tbl_info_center`
  ADD PRIMARY KEY (`info_center_id`);

--
-- Indexes for table `tbl_info_center_img`
--
ALTER TABLE `tbl_info_center_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_interesting_place`
--
ALTER TABLE `tbl_interesting_place`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_ld_ass`
--
ALTER TABLE `tbl_ld_ass`
  ADD PRIMARY KEY (`ld_id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`lg_id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_memberships`
--
ALTER TABLE `tbl_memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membership_type`
--
ALTER TABLE `tbl_membership_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_monthly_commission`
--
ALTER TABLE `tbl_monthly_commission`
  ADD PRIMARY KEY (`m_c_id`);

--
-- Indexes for table `tbl_online_payment`
--
ALTER TABLE `tbl_online_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_our_customer`
--
ALTER TABLE `tbl_our_customer`
  ADD PRIMARY KEY (`ou_id`);

--
-- Indexes for table `tbl_our_service`
--
ALTER TABLE `tbl_our_service`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `tbl_our_service_img`
--
ALTER TABLE `tbl_our_service_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_owner_list`
--
ALTER TABLE `tbl_owner_list`
  ADD PRIMARY KEY (`ow_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_package_detail`
--
ALTER TABLE `tbl_package_detail`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_package_position`
--
ALTER TABLE `tbl_package_position`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_page_allow`
--
ALTER TABLE `tbl_page_allow`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tbl_partner_income_paid_history`
--
ALTER TABLE `tbl_partner_income_paid_history`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_petty_cash_deposit`
--
ALTER TABLE `tbl_petty_cash_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phone_line`
--
ALTER TABLE `tbl_phone_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pickup_booking`
--
ALTER TABLE `tbl_pickup_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_pickup_book_car`
--
ALTER TABLE `tbl_pickup_book_car`
  ADD PRIMARY KEY (`pi_b_car_id`);

--
-- Indexes for table `tbl_pickup_drop_off`
--
ALTER TABLE `tbl_pickup_drop_off`
  ADD PRIMARY KEY (`air_id`);

--
-- Indexes for table `tbl_posting_package`
--
ALTER TABLE `tbl_posting_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pre_info`
--
ALTER TABLE `tbl_pre_info`
  ADD PRIMARY KEY (`pre_id`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`pv_id`);

--
-- Indexes for table `tbl_province_detail`
--
ALTER TABLE `tbl_province_detail`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_province_detail_img`
--
ALTER TABLE `tbl_province_detail_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tbl_quotation_acc`
--
ALTER TABLE `tbl_quotation_acc`
  ADD PRIMARY KEY (`q_acc_id`);

--
-- Indexes for table `tbl_quotation_admin`
--
ALTER TABLE `tbl_quotation_admin`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tbl_quotation_car`
--
ALTER TABLE `tbl_quotation_car`
  ADD PRIMARY KEY (`q_car_id`);

--
-- Indexes for table `tbl_quotation_detail`
--
ALTER TABLE `tbl_quotation_detail`
  ADD PRIMARY KEY (`qd_id`);

--
-- Indexes for table `tbl_quotation_driver`
--
ALTER TABLE `tbl_quotation_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_quotation_rickshaw`
--
ALTER TABLE `tbl_quotation_rickshaw`
  ADD PRIMARY KEY (`q_rick_id`);

--
-- Indexes for table `tbl_quotation_setting`
--
ALTER TABLE `tbl_quotation_setting`
  ADD PRIMARY KEY (`qs_id`);

--
-- Indexes for table `tbl_quotation_tour`
--
ALTER TABLE `tbl_quotation_tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbl_quotation_type_menu`
--
ALTER TABLE `tbl_quotation_type_menu`
  ADD PRIMARY KEY (`qtm_id`);

--
-- Indexes for table `tbl_relationship_users_position`
--
ALTER TABLE `tbl_relationship_users_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rental_report`
--
ALTER TABLE `tbl_rental_report`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_revenue_category`
--
ALTER TABLE `tbl_revenue_category`
  ADD PRIMARY KEY (`reca_id`);

--
-- Indexes for table `tbl_revenue_list`
--
ALTER TABLE `tbl_revenue_list`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `tbl_rick_shaw_rental`
--
ALTER TABLE `tbl_rick_shaw_rental`
  ADD PRIMARY KEY (`ve_id`);

--
-- Indexes for table `tbl_rick_shaw_rental_last`
--
ALTER TABLE `tbl_rick_shaw_rental_last`
  ADD PRIMARY KEY (`ve_id`);

--
-- Indexes for table `tbl_rick_shaw_rental_last_img`
--
ALTER TABLE `tbl_rick_shaw_rental_last_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_sale_product_report`
--
ALTER TABLE `tbl_sale_product_report`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_schedule_admin`
--
ALTER TABLE `tbl_schedule_admin`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `tbl_tour_rent`
--
ALTER TABLE `tbl_tour_rent`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbl_try_free`
--
ALTER TABLE `tbl_try_free`
  ADD PRIMARY KEY (`tf_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `position` (`user_position`) USING BTREE;

--
-- Indexes for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_agreement`
--
ALTER TABLE `tbl_user_agreement`
  ADD PRIMARY KEY (`agree_id`);

--
-- Indexes for table `tbl_user_gender`
--
ALTER TABLE `tbl_user_gender`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indexes for table `tbl_user_position`
--
ALTER TABLE `tbl_user_position`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `tbl_vehicle_rantal`
--
ALTER TABLE `tbl_vehicle_rantal`
  ADD PRIMARY KEY (`ve_id`);

--
-- Indexes for table `tbl_vehicle_rantal_img`
--
ALTER TABLE `tbl_vehicle_rantal_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `tbl_website_info`
--
ALTER TABLE `tbl_website_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_yes_no`
--
ALTER TABLE `tbl_yes_no`
  ADD PRIMARY KEY (`yn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_registeration`
--
ALTER TABLE `event_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `job_announment`
--
ALTER TABLE `job_announment`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_posting_type`
--
ALTER TABLE `package_posting_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_accessories_rental`
--
ALTER TABLE `tbl_accessories_rental`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_accessories_rental_img`
--
ALTER TABLE `tbl_accessories_rental_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_accessory_admin`
--
ALTER TABLE `tbl_accessory_admin`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_accessory_make`
--
ALTER TABLE `tbl_accessory_make`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_accessory_model`
--
ALTER TABLE `tbl_accessory_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  MODIFY `ag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_air_port`
--
ALTER TABLE `tbl_air_port`
  MODIFY `air_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_air_port_booking`
--
ALTER TABLE `tbl_air_port_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_air_port_book_car`
--
ALTER TABLE `tbl_air_port_book_car`
  MODIFY `book_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_app_job`
--
ALTER TABLE `tbl_app_job`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bonus`
--
ALTER TABLE `tbl_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_book_accessory`
--
ALTER TABLE `tbl_book_accessory`
  MODIFY `book_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_book_car`
--
ALTER TABLE `tbl_book_car`
  MODIFY `book_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_book_drive`
--
ALTER TABLE `tbl_book_drive`
  MODIFY `b_driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_book_info`
--
ALTER TABLE `tbl_book_info`
  MODIFY `book_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_book_province`
--
ALTER TABLE `tbl_book_province`
  MODIFY `book_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_book_rickshaw`
--
ALTER TABLE `tbl_book_rickshaw`
  MODIFY `book_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_book_tour_quide`
--
ALTER TABLE `tbl_book_tour_quide`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_buy_package`
--
ALTER TABLE `tbl_buy_package`
  MODIFY `buy_package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_carrental_pickup_price`
--
ALTER TABLE `tbl_carrental_pickup_price`
  MODIFY `air_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_car_sale`
--
ALTER TABLE `tbl_car_sale`
  MODIFY `car_sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car_sales`
--
ALTER TABLE `tbl_car_sales`
  MODIFY `cars_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cash_voucher`
--
ALTER TABLE `tbl_cash_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contact_comment`
--
ALTER TABLE `tbl_contact_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_contact_images`
--
ALTER TABLE `tbl_contact_images`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contact_information`
--
ALTER TABLE `tbl_contact_information`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `cop_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_position`
--
ALTER TABLE `tbl_customer_position`
  MODIFY `cpos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_provide`
--
ALTER TABLE `tbl_customer_provide`
  MODIFY `cpr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cus_letter`
--
ALTER TABLE `tbl_cus_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cv_education`
--
ALTER TABLE `tbl_cv_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cv_information`
--
ALTER TABLE `tbl_cv_information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_daily_duties`
--
ALTER TABLE `tbl_daily_duties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_data_input_coupon`
--
ALTER TABLE `tbl_data_input_coupon`
  MODIFY `tdc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_destination_list`
--
ALTER TABLE `tbl_destination_list`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_driver_rent`
--
ALTER TABLE `tbl_driver_rent`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_event_promotion`
--
ALTER TABLE `tbl_event_promotion`
  MODIFY `e_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_event_promotion_img`
--
ALTER TABLE `tbl_event_promotion_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  MODIFY `exca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_expense_list`
--
ALTER TABLE `tbl_expense_list`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expen_request`
--
ALTER TABLE `tbl_expen_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_footer_status`
--
ALTER TABLE `tbl_footer_status`
  MODIFY `footer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_footer_text`
--
ALTER TABLE `tbl_footer_text`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ft_job_announ`
--
ALTER TABLE `tbl_ft_job_announ`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ft_latest_news`
--
ALTER TABLE `tbl_ft_latest_news`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ft_phone`
--
ALTER TABLE `tbl_ft_phone`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ft_upcoming`
--
ALTER TABLE `tbl_ft_upcoming`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_guestbook`
--
ALTER TABLE `tbl_guestbook`
  MODIFY `gues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `ht_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hotel_booking`
--
ALTER TABLE `tbl_hotel_booking`
  MODIFY `ho_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hotel_book_items`
--
ALTER TABLE `tbl_hotel_book_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_hotel_img`
--
ALTER TABLE `tbl_hotel_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_hotel_include_option`
--
ALTER TABLE `tbl_hotel_include_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `tbl_info_center`
--
ALTER TABLE `tbl_info_center`
  MODIFY `info_center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_info_center_img`
--
ALTER TABLE `tbl_info_center_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_interesting_place`
--
ALTER TABLE `tbl_interesting_place`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_ld_ass`
--
ALTER TABLE `tbl_ld_ass`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_memberships`
--
ALTER TABLE `tbl_memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_membership_type`
--
ALTER TABLE `tbl_membership_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_monthly_commission`
--
ALTER TABLE `tbl_monthly_commission`
  MODIFY `m_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_online_payment`
--
ALTER TABLE `tbl_online_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_our_customer`
--
ALTER TABLE `tbl_our_customer`
  MODIFY `ou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_our_service`
--
ALTER TABLE `tbl_our_service`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_our_service_img`
--
ALTER TABLE `tbl_our_service_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_owner_list`
--
ALTER TABLE `tbl_owner_list`
  MODIFY `ow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_package_detail`
--
ALTER TABLE `tbl_package_detail`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_package_position`
--
ALTER TABLE `tbl_package_position`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_page_allow`
--
ALTER TABLE `tbl_page_allow`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_partner_income_paid_history`
--
ALTER TABLE `tbl_partner_income_paid_history`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_petty_cash_deposit`
--
ALTER TABLE `tbl_petty_cash_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_phone_line`
--
ALTER TABLE `tbl_phone_line`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pickup_booking`
--
ALTER TABLE `tbl_pickup_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pickup_book_car`
--
ALTER TABLE `tbl_pickup_book_car`
  MODIFY `pi_b_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pickup_drop_off`
--
ALTER TABLE `tbl_pickup_drop_off`
  MODIFY `air_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_posting_package`
--
ALTER TABLE `tbl_posting_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_pre_info`
--
ALTER TABLE `tbl_pre_info`
  MODIFY `pre_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_province_detail`
--
ALTER TABLE `tbl_province_detail`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `tbl_province_detail_img`
--
ALTER TABLE `tbl_province_detail_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1359;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quotation_acc`
--
ALTER TABLE `tbl_quotation_acc`
  MODIFY `q_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quotation_admin`
--
ALTER TABLE `tbl_quotation_admin`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_quotation_car`
--
ALTER TABLE `tbl_quotation_car`
  MODIFY `q_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_quotation_detail`
--
ALTER TABLE `tbl_quotation_detail`
  MODIFY `qd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quotation_driver`
--
ALTER TABLE `tbl_quotation_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quotation_rickshaw`
--
ALTER TABLE `tbl_quotation_rickshaw`
  MODIFY `q_rick_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_quotation_setting`
--
ALTER TABLE `tbl_quotation_setting`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quotation_tour`
--
ALTER TABLE `tbl_quotation_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quotation_type_menu`
--
ALTER TABLE `tbl_quotation_type_menu`
  MODIFY `qtm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_relationship_users_position`
--
ALTER TABLE `tbl_relationship_users_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_rental_report`
--
ALTER TABLE `tbl_rental_report`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_revenue_category`
--
ALTER TABLE `tbl_revenue_category`
  MODIFY `reca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_revenue_list`
--
ALTER TABLE `tbl_revenue_list`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rick_shaw_rental`
--
ALTER TABLE `tbl_rick_shaw_rental`
  MODIFY `ve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rick_shaw_rental_last`
--
ALTER TABLE `tbl_rick_shaw_rental_last`
  MODIFY `ve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rick_shaw_rental_last_img`
--
ALTER TABLE `tbl_rick_shaw_rental_last_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sale_product_report`
--
ALTER TABLE `tbl_sale_product_report`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_schedule_admin`
--
ALTER TABLE `tbl_schedule_admin`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_tour_rent`
--
ALTER TABLE `tbl_tour_rent`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_try_free`
--
ALTER TABLE `tbl_try_free`
  MODIFY `tf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_user_agreement`
--
ALTER TABLE `tbl_user_agreement`
  MODIFY `agree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_gender`
--
ALTER TABLE `tbl_user_gender`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_vehicle_rantal`
--
ALTER TABLE `tbl_vehicle_rantal`
  MODIFY `ve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_vehicle_rantal_img`
--
ALTER TABLE `tbl_vehicle_rantal_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_website_info`
--
ALTER TABLE `tbl_website_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_yes_no`
--
ALTER TABLE `tbl_yes_no`
  MODIFY `yn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
