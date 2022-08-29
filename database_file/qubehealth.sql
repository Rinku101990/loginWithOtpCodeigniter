-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 11:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qubehealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `slr_id` int(11) NOT NULL,
  `slr_name` varchar(100) NOT NULL,
  `slr_img` text NOT NULL,
  `slr_updated` datetime NOT NULL,
  `slr_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`slr_id`, `slr_name`, `slr_img`, `slr_updated`, `slr_created`) VALUES
(15, 'Maria Documents', '20220828110848_976191.jpg', '0000-00-00 00:00:00', '2022-08-28 11:18:48'),
(16, 'estaaa', '20220829090809_940826.png', '0000-00-00 00:00:00', '2022-08-29 09:09:09'),
(17, 'estaaa', '20220829090800_31896.png', '0000-00-00 00:00:00', '2022-08-29 09:14:00'),
(18, 'Dummy File', '20220829110821_395157.png', '0000-00-00 00:00:00', '2022-08-29 11:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master`
--

CREATE TABLE `tbl_master` (
  `mst_id` int(11) NOT NULL,
  `mst_ref_id` varchar(200) NOT NULL,
  `mst_email` varchar(200) NOT NULL,
  `mst_password` varchar(200) NOT NULL,
  `mst_otp` varchar(10) DEFAULT NULL,
  `mst_name` varchar(200) NOT NULL,
  `mst_mobile_number` varchar(15) NOT NULL,
  `mst_picture` varchar(200) NOT NULL,
  `mst_address` varchar(50) DEFAULT NULL,
  `mst_role` int(11) NOT NULL DEFAULT 0 COMMENT '0:Admin,1:Users',
  `mst_status` varchar(20) NOT NULL,
  `mst_updated` datetime DEFAULT NULL,
  `mst_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master`
--

INSERT INTO `tbl_master` (`mst_id`, `mst_ref_id`, `mst_email`, `mst_password`, `mst_otp`, `mst_name`, `mst_mobile_number`, `mst_picture`, `mst_address`, `mst_role`, `mst_status`, `mst_updated`, `mst_created`) VALUES
(1, 'MST00001', 'master@gmail.com', '7ece99e593ff5dd200e2b9233d9ba654', '178219_v', 'Qube Health', '9015807445', '20200129130123_170774.png', 'test', 0, 'active', '2020-05-21 16:26:31', '2019-11-01 00:00:00'),
(4, 'MST00003', 'master11@gmail.com', '96e79218965eb72c92a549dd5a330112', '954781_v', 'Rinku Vishwakarma', '8447092838', '', NULL, 1, 'active', '2022-08-28 09:54:11', '2022-08-28 09:54:11'),
(11, 'MST00004', 'rinku10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '725999_v', 'rinku', '9087654123', '', NULL, 1, 'active', '2022-08-29 06:52:38', '2022-08-29 06:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timezone`
--

CREATE TABLE `tbl_timezone` (
  `zone_id` int(11) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_timezone`
--

INSERT INTO `tbl_timezone` (`zone_id`, `country_code`, `zone_name`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Currie'),
(37, 'AU', 'Australia/Melbourne'),
(38, 'AU', 'Australia/Sydney'),
(39, 'AU', 'Australia/Broken_Hill'),
(40, 'AU', 'Australia/Brisbane'),
(41, 'AU', 'Australia/Lindeman'),
(42, 'AU', 'Australia/Adelaide'),
(43, 'AU', 'Australia/Darwin'),
(44, 'AU', 'Australia/Perth'),
(45, 'AU', 'Australia/Eucla'),
(46, 'AW', 'America/Aruba'),
(47, 'AX', 'Europe/Mariehamn'),
(48, 'AZ', 'Asia/Baku'),
(49, 'BA', 'Europe/Sarajevo'),
(50, 'BB', 'America/Barbados'),
(51, 'BD', 'Asia/Dhaka'),
(52, 'BE', 'Europe/Brussels'),
(53, 'BF', 'Africa/Ouagadougou'),
(54, 'BG', 'Europe/Sofia'),
(55, 'BH', 'Asia/Bahrain'),
(56, 'BI', 'Africa/Bujumbura'),
(57, 'BJ', 'Africa/Porto-Novo'),
(58, 'BL', 'America/St_Barthelemy'),
(59, 'BM', 'Atlantic/Bermuda'),
(60, 'BN', 'Asia/Brunei'),
(61, 'BO', 'America/La_Paz'),
(62, 'BQ', 'America/Kralendijk'),
(63, 'BR', 'America/Noronha'),
(64, 'BR', 'America/Belem'),
(65, 'BR', 'America/Fortaleza'),
(66, 'BR', 'America/Recife'),
(67, 'BR', 'America/Araguaina'),
(68, 'BR', 'America/Maceio'),
(69, 'BR', 'America/Bahia'),
(70, 'BR', 'America/Sao_Paulo'),
(71, 'BR', 'America/Campo_Grande'),
(72, 'BR', 'America/Cuiaba'),
(73, 'BR', 'America/Santarem'),
(74, 'BR', 'America/Porto_Velho'),
(75, 'BR', 'America/Boa_Vista'),
(76, 'BR', 'America/Manaus'),
(77, 'BR', 'America/Eirunepe'),
(78, 'BR', 'America/Rio_Branco'),
(79, 'BS', 'America/Nassau'),
(80, 'BT', 'Asia/Thimphu'),
(81, 'BW', 'Africa/Gaborone'),
(82, 'BY', 'Europe/Minsk'),
(83, 'BZ', 'America/Belize'),
(84, 'CA', 'America/St_Johns'),
(85, 'CA', 'America/Halifax'),
(86, 'CA', 'America/Glace_Bay'),
(87, 'CA', 'America/Moncton'),
(88, 'CA', 'America/Goose_Bay'),
(89, 'CA', 'America/Blanc-Sablon'),
(90, 'CA', 'America/Toronto'),
(91, 'CA', 'America/Nipigon'),
(92, 'CA', 'America/Thunder_Bay'),
(93, 'CA', 'America/Iqaluit'),
(94, 'CA', 'America/Pangnirtung'),
(95, 'CA', 'America/Atikokan'),
(96, 'CA', 'America/Winnipeg'),
(97, 'CA', 'America/Rainy_River'),
(98, 'CA', 'America/Resolute'),
(99, 'CA', 'America/Rankin_Inlet'),
(100, 'CA', 'America/Regina'),
(101, 'CA', 'America/Swift_Current'),
(102, 'CA', 'America/Edmonton'),
(103, 'CA', 'America/Cambridge_Bay'),
(104, 'CA', 'America/Yellowknife'),
(105, 'CA', 'America/Inuvik'),
(106, 'CA', 'America/Creston'),
(107, 'CA', 'America/Dawson_Creek'),
(108, 'CA', 'America/Fort_Nelson'),
(109, 'CA', 'America/Vancouver'),
(110, 'CA', 'America/Whitehorse'),
(111, 'CA', 'America/Dawson'),
(112, 'CC', 'Indian/Cocos'),
(113, 'CD', 'Africa/Kinshasa'),
(114, 'CD', 'Africa/Lubumbashi'),
(115, 'CF', 'Africa/Bangui'),
(116, 'CG', 'Africa/Brazzaville'),
(117, 'CH', 'Europe/Zurich'),
(118, 'CI', 'Africa/Abidjan'),
(119, 'CK', 'Pacific/Rarotonga'),
(120, 'CL', 'America/Santiago'),
(121, 'CL', 'America/Punta_Arenas'),
(122, 'CL', 'Pacific/Easter'),
(123, 'CM', 'Africa/Douala'),
(124, 'CN', 'Asia/Shanghai'),
(125, 'CN', 'Asia/Urumqi'),
(126, 'CO', 'America/Bogota'),
(127, 'CR', 'America/Costa_Rica'),
(128, 'CU', 'America/Havana'),
(129, 'CV', 'Atlantic/Cape_Verde'),
(130, 'CW', 'America/Curacao'),
(131, 'CX', 'Indian/Christmas'),
(132, 'CY', 'Asia/Nicosia'),
(133, 'CY', 'Asia/Famagusta'),
(134, 'CZ', 'Europe/Prague'),
(135, 'DE', 'Europe/Berlin'),
(136, 'DE', 'Europe/Busingen'),
(137, 'DJ', 'Africa/Djibouti'),
(138, 'DK', 'Europe/Copenhagen'),
(139, 'DM', 'America/Dominica'),
(140, 'DO', 'America/Santo_Domingo'),
(141, 'DZ', 'Africa/Algiers'),
(142, 'EC', 'America/Guayaquil'),
(143, 'EC', 'Pacific/Galapagos'),
(144, 'EE', 'Europe/Tallinn'),
(145, 'EG', 'Africa/Cairo'),
(146, 'EH', 'Africa/El_Aaiun'),
(147, 'ER', 'Africa/Asmara'),
(148, 'ES', 'Europe/Madrid'),
(149, 'ES', 'Africa/Ceuta'),
(150, 'ES', 'Atlantic/Canary'),
(151, 'ET', 'Africa/Addis_Ababa'),
(152, 'FI', 'Europe/Helsinki'),
(153, 'FJ', 'Pacific/Fiji'),
(154, 'FK', 'Atlantic/Stanley'),
(155, 'FM', 'Pacific/Chuuk'),
(156, 'FM', 'Pacific/Pohnpei'),
(157, 'FM', 'Pacific/Kosrae'),
(158, 'FO', 'Atlantic/Faroe'),
(159, 'FR', 'Europe/Paris'),
(160, 'GA', 'Africa/Libreville'),
(161, 'GB', 'Europe/London'),
(162, 'GD', 'America/Grenada'),
(163, 'GE', 'Asia/Tbilisi'),
(164, 'GF', 'America/Cayenne'),
(165, 'GG', 'Europe/Guernsey'),
(166, 'GH', 'Africa/Accra'),
(167, 'GI', 'Europe/Gibraltar'),
(168, 'GL', 'America/Godthab'),
(169, 'GL', 'America/Danmarkshavn'),
(170, 'GL', 'America/Scoresbysund'),
(171, 'GL', 'America/Thule'),
(172, 'GM', 'Africa/Banjul'),
(173, 'GN', 'Africa/Conakry'),
(174, 'GP', 'America/Guadeloupe'),
(175, 'GQ', 'Africa/Malabo'),
(176, 'GR', 'Europe/Athens'),
(177, 'GS', 'Atlantic/South_Georgia'),
(178, 'GT', 'America/Guatemala'),
(179, 'GU', 'Pacific/Guam'),
(180, 'GW', 'Africa/Bissau'),
(181, 'GY', 'America/Guyana'),
(182, 'HK', 'Asia/Hong_Kong'),
(183, 'HN', 'America/Tegucigalpa'),
(184, 'HR', 'Europe/Zagreb'),
(185, 'HT', 'America/Port-au-Prince'),
(186, 'HU', 'Europe/Budapest'),
(187, 'ID', 'Asia/Jakarta'),
(188, 'ID', 'Asia/Pontianak'),
(189, 'ID', 'Asia/Makassar'),
(190, 'ID', 'Asia/Jayapura'),
(191, 'IE', 'Europe/Dublin'),
(192, 'IL', 'Asia/Jerusalem'),
(193, 'IM', 'Europe/Isle_of_Man'),
(194, 'IN', 'Asia/Kolkata'),
(195, 'IO', 'Indian/Chagos'),
(196, 'IQ', 'Asia/Baghdad'),
(197, 'IR', 'Asia/Tehran'),
(198, 'IS', 'Atlantic/Reykjavik'),
(199, 'IT', 'Europe/Rome'),
(200, 'JE', 'Europe/Jersey'),
(201, 'JM', 'America/Jamaica'),
(202, 'JO', 'Asia/Amman'),
(203, 'JP', 'Asia/Tokyo'),
(204, 'KE', 'Africa/Nairobi'),
(205, 'KG', 'Asia/Bishkek'),
(206, 'KH', 'Asia/Phnom_Penh'),
(207, 'KI', 'Pacific/Tarawa'),
(208, 'KI', 'Pacific/Enderbury'),
(209, 'KI', 'Pacific/Kiritimati'),
(210, 'KM', 'Indian/Comoro'),
(211, 'KN', 'America/St_Kitts'),
(212, 'KP', 'Asia/Pyongyang'),
(213, 'KR', 'Asia/Seoul'),
(214, 'KW', 'Asia/Kuwait'),
(215, 'KY', 'America/Cayman'),
(216, 'KZ', 'Asia/Almaty'),
(217, 'KZ', 'Asia/Qyzylorda'),
(218, 'KZ', 'Asia/Qostanay'),
(219, 'KZ', 'Asia/Aqtobe'),
(220, 'KZ', 'Asia/Aqtau'),
(221, 'KZ', 'Asia/Atyrau'),
(222, 'KZ', 'Asia/Oral'),
(223, 'LA', 'Asia/Vientiane'),
(224, 'LB', 'Asia/Beirut'),
(225, 'LC', 'America/St_Lucia'),
(226, 'LI', 'Europe/Vaduz'),
(227, 'LK', 'Asia/Colombo'),
(228, 'LR', 'Africa/Monrovia'),
(229, 'LS', 'Africa/Maseru'),
(230, 'LT', 'Europe/Vilnius'),
(231, 'LU', 'Europe/Luxembourg'),
(232, 'LV', 'Europe/Riga'),
(233, 'LY', 'Africa/Tripoli'),
(234, 'MA', 'Africa/Casablanca'),
(235, 'MC', 'Europe/Monaco'),
(236, 'MD', 'Europe/Chisinau'),
(237, 'ME', 'Europe/Podgorica'),
(238, 'MF', 'America/Marigot'),
(239, 'MG', 'Indian/Antananarivo'),
(240, 'MH', 'Pacific/Majuro'),
(241, 'MH', 'Pacific/Kwajalein'),
(242, 'MK', 'Europe/Skopje'),
(243, 'ML', 'Africa/Bamako'),
(244, 'MM', 'Asia/Yangon'),
(245, 'MN', 'Asia/Ulaanbaatar'),
(246, 'MN', 'Asia/Hovd'),
(247, 'MN', 'Asia/Choibalsan'),
(248, 'MO', 'Asia/Macau'),
(249, 'MP', 'Pacific/Saipan'),
(250, 'MQ', 'America/Martinique'),
(251, 'MR', 'Africa/Nouakchott'),
(252, 'MS', 'America/Montserrat'),
(253, 'MT', 'Europe/Malta'),
(254, 'MU', 'Indian/Mauritius'),
(255, 'MV', 'Indian/Maldives'),
(256, 'MW', 'Africa/Blantyre'),
(257, 'MX', 'America/Mexico_City'),
(258, 'MX', 'America/Cancun'),
(259, 'MX', 'America/Merida'),
(260, 'MX', 'America/Monterrey'),
(261, 'MX', 'America/Matamoros'),
(262, 'MX', 'America/Mazatlan'),
(263, 'MX', 'America/Chihuahua'),
(264, 'MX', 'America/Ojinaga'),
(265, 'MX', 'America/Hermosillo'),
(266, 'MX', 'America/Tijuana'),
(267, 'MX', 'America/Bahia_Banderas'),
(268, 'MY', 'Asia/Kuala_Lumpur'),
(269, 'MY', 'Asia/Kuching'),
(270, 'MZ', 'Africa/Maputo'),
(271, 'NA', 'Africa/Windhoek'),
(272, 'NC', 'Pacific/Noumea'),
(273, 'NE', 'Africa/Niamey'),
(274, 'NF', 'Pacific/Norfolk'),
(275, 'NG', 'Africa/Lagos'),
(276, 'NI', 'America/Managua'),
(277, 'NL', 'Europe/Amsterdam'),
(278, 'NO', 'Europe/Oslo'),
(279, 'NP', 'Asia/Kathmandu'),
(280, 'NR', 'Pacific/Nauru'),
(281, 'NU', 'Pacific/Niue'),
(282, 'NZ', 'Pacific/Auckland'),
(283, 'NZ', 'Pacific/Chatham'),
(284, 'OM', 'Asia/Muscat'),
(285, 'PA', 'America/Panama'),
(286, 'PE', 'America/Lima'),
(287, 'PF', 'Pacific/Tahiti'),
(288, 'PF', 'Pacific/Marquesas'),
(289, 'PF', 'Pacific/Gambier'),
(290, 'PG', 'Pacific/Port_Moresby'),
(291, 'PG', 'Pacific/Bougainville'),
(292, 'PH', 'Asia/Manila'),
(293, 'PK', 'Asia/Karachi'),
(294, 'PL', 'Europe/Warsaw'),
(295, 'PM', 'America/Miquelon'),
(296, 'PN', 'Pacific/Pitcairn'),
(297, 'PR', 'America/Puerto_Rico'),
(298, 'PS', 'Asia/Gaza'),
(299, 'PS', 'Asia/Hebron'),
(300, 'PT', 'Europe/Lisbon'),
(301, 'PT', 'Atlantic/Madeira'),
(302, 'PT', 'Atlantic/Azores'),
(303, 'PW', 'Pacific/Palau'),
(304, 'PY', 'America/Asuncion'),
(305, 'QA', 'Asia/Qatar'),
(306, 'RE', 'Indian/Reunion'),
(307, 'RO', 'Europe/Bucharest'),
(308, 'RS', 'Europe/Belgrade'),
(309, 'RU', 'Europe/Kaliningrad'),
(310, 'RU', 'Europe/Moscow'),
(311, 'UA', 'Europe/Simferopol'),
(312, 'RU', 'Europe/Kirov'),
(313, 'RU', 'Europe/Astrakhan'),
(314, 'RU', 'Europe/Volgograd'),
(315, 'RU', 'Europe/Saratov'),
(316, 'RU', 'Europe/Ulyanovsk'),
(317, 'RU', 'Europe/Samara'),
(318, 'RU', 'Asia/Yekaterinburg'),
(319, 'RU', 'Asia/Omsk'),
(320, 'RU', 'Asia/Novosibirsk'),
(321, 'RU', 'Asia/Barnaul'),
(322, 'RU', 'Asia/Tomsk'),
(323, 'RU', 'Asia/Novokuznetsk'),
(324, 'RU', 'Asia/Krasnoyarsk'),
(325, 'RU', 'Asia/Irkutsk'),
(326, 'RU', 'Asia/Chita'),
(327, 'RU', 'Asia/Yakutsk'),
(328, 'RU', 'Asia/Khandyga'),
(329, 'RU', 'Asia/Vladivostok'),
(330, 'RU', 'Asia/Ust-Nera'),
(331, 'RU', 'Asia/Magadan'),
(332, 'RU', 'Asia/Sakhalin'),
(333, 'RU', 'Asia/Srednekolymsk'),
(334, 'RU', 'Asia/Kamchatka'),
(335, 'RU', 'Asia/Anadyr'),
(336, 'RW', 'Africa/Kigali'),
(337, 'SA', 'Asia/Riyadh'),
(338, 'SB', 'Pacific/Guadalcanal'),
(339, 'SC', 'Indian/Mahe'),
(340, 'SD', 'Africa/Khartoum'),
(341, 'SE', 'Europe/Stockholm'),
(342, 'SG', 'Asia/Singapore'),
(343, 'SH', 'Atlantic/St_Helena'),
(344, 'SI', 'Europe/Ljubljana'),
(345, 'SJ', 'Arctic/Longyearbyen'),
(346, 'SK', 'Europe/Bratislava'),
(347, 'SL', 'Africa/Freetown'),
(348, 'SM', 'Europe/San_Marino'),
(349, 'SN', 'Africa/Dakar'),
(350, 'SO', 'Africa/Mogadishu'),
(351, 'SR', 'America/Paramaribo'),
(352, 'SS', 'Africa/Juba'),
(353, 'ST', 'Africa/Sao_Tome'),
(354, 'SV', 'America/El_Salvador'),
(355, 'SX', 'America/Lower_Princes'),
(356, 'SY', 'Asia/Damascus'),
(357, 'SZ', 'Africa/Mbabane'),
(358, 'TC', 'America/Grand_Turk'),
(359, 'TD', 'Africa/Ndjamena'),
(360, 'TF', 'Indian/Kerguelen'),
(361, 'TG', 'Africa/Lome'),
(362, 'TH', 'Asia/Bangkok'),
(363, 'TJ', 'Asia/Dushanbe'),
(364, 'TK', 'Pacific/Fakaofo'),
(365, 'TL', 'Asia/Dili'),
(366, 'TM', 'Asia/Ashgabat'),
(367, 'TN', 'Africa/Tunis'),
(368, 'TO', 'Pacific/Tongatapu'),
(369, 'TR', 'Europe/Istanbul'),
(370, 'TT', 'America/Port_of_Spain'),
(371, 'TV', 'Pacific/Funafuti'),
(372, 'TW', 'Asia/Taipei'),
(373, 'TZ', 'Africa/Dar_es_Salaam'),
(374, 'UA', 'Europe/Kiev'),
(375, 'UA', 'Europe/Uzhgorod'),
(376, 'UA', 'Europe/Zaporozhye'),
(377, 'UG', 'Africa/Kampala'),
(378, 'UM', 'Pacific/Midway'),
(379, 'UM', 'Pacific/Wake'),
(380, 'US', 'America/New_York'),
(381, 'US', 'America/Detroit'),
(382, 'US', 'America/Kentucky/Louisville'),
(383, 'US', 'America/Kentucky/Monticello'),
(384, 'US', 'America/Indiana/Indianapolis'),
(385, 'US', 'America/Indiana/Vincennes'),
(386, 'US', 'America/Indiana/Winamac'),
(387, 'US', 'America/Indiana/Marengo'),
(388, 'US', 'America/Indiana/Petersburg'),
(389, 'US', 'America/Indiana/Vevay'),
(390, 'US', 'America/Chicago'),
(391, 'US', 'America/Indiana/Tell_City'),
(392, 'US', 'America/Indiana/Knox'),
(393, 'US', 'America/Menominee'),
(394, 'US', 'America/North_Dakota/Center'),
(395, 'US', 'America/North_Dakota/New_Salem'),
(396, 'US', 'America/North_Dakota/Beulah'),
(397, 'US', 'America/Denver'),
(398, 'US', 'America/Boise'),
(399, 'US', 'America/Phoenix'),
(400, 'US', 'America/Los_Angeles'),
(401, 'US', 'America/Anchorage'),
(402, 'US', 'America/Juneau'),
(403, 'US', 'America/Sitka'),
(404, 'US', 'America/Metlakatla'),
(405, 'US', 'America/Yakutat'),
(406, 'US', 'America/Nome'),
(407, 'US', 'America/Adak'),
(408, 'US', 'Pacific/Honolulu'),
(409, 'UY', 'America/Montevideo'),
(410, 'UZ', 'Asia/Samarkand'),
(411, 'UZ', 'Asia/Tashkent'),
(412, 'VA', 'Europe/Vatican'),
(413, 'VC', 'America/St_Vincent'),
(414, 'VE', 'America/Caracas'),
(415, 'VG', 'America/Tortola'),
(416, 'VI', 'America/St_Thomas'),
(417, 'VN', 'Asia/Ho_Chi_Minh'),
(418, 'VU', 'Pacific/Efate'),
(419, 'WF', 'Pacific/Wallis'),
(420, 'WS', 'Pacific/Apia'),
(421, 'YE', 'Asia/Aden'),
(422, 'YT', 'Indian/Mayotte'),
(423, 'ZA', 'Africa/Johannesburg'),
(424, 'ZM', 'Africa/Lusaka'),
(425, 'ZW', 'Africa/Harare');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `usr_id` bigint(20) NOT NULL,
  `usr_fullname` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_profile_photo` text DEFAULT NULL,
  `usr_mobile` varchar(255) DEFAULT NULL,
  `usr_status` int(11) NOT NULL COMMENT '0:Active,1:Inactivve',
  `usr_updated` datetime DEFAULT NULL,
  `usr_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_info`
--

CREATE TABLE `tbl_website_info` (
  `web_id` int(11) NOT NULL,
  `web_company_name` varchar(250) NOT NULL,
  `web_hour_of_operation` varchar(200) NOT NULL,
  `web_company_logo` varchar(50) NOT NULL,
  `web_favicon_icon` varchar(50) NOT NULL,
  `web_site_url` varchar(250) NOT NULL,
  `web_address` text NOT NULL,
  `web_addressmap` longtext NOT NULL,
  `web_copy_right` text NOT NULL,
  `web_meta_title` text NOT NULL,
  `web_meta_keyword` text NOT NULL,
  `web_meta_description` text NOT NULL,
  `web_timezone` varchar(255) NOT NULL,
  `web_status` varchar(20) NOT NULL,
  `web_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `web_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_website_info`
--

INSERT INTO `tbl_website_info` (`web_id`, `web_company_name`, `web_hour_of_operation`, `web_company_logo`, `web_favicon_icon`, `web_site_url`, `web_address`, `web_addressmap`, `web_copy_right`, `web_meta_title`, `web_meta_keyword`, `web_meta_description`, `web_timezone`, `web_status`, `web_created`, `web_updated`) VALUES
(1, 'Qube Health', 'Monday to Friday: 10am to 7pm </br> Saturday: 10am to 4pm </br> Sunday: 12am to 4pm', '20201020191035_125688.png', '20200521180522_438380.PNG', 'https://qubehealth.com/', '                                                                                                                                                                                    Office #75, 2nd Floor, Commercial Bank of Dubai Building, Mankhool road, Bur Dubai, Dubai, U.A.E.                                                                                                                                                                                                                                                                                                                                   ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.6300866785664!2d77.31541931493366!3d28.5808686931685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7075711e380937c1!2sOrdius+IT+Solutions+Pvt+Ltd+(Website+Design+Company%2C+E-Commerce+Website+Development+Company%2C+SEO+Services+in+India%2C+PPC+Services%2C+Wordpress+Website+Development+Company%2C+Mobile+Application+Development+Company)!5e0!3m2!1sen!2sin!4v1553584919123                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ', 'Qube Health – Information Technologies', 'Qube Health', 'Qube Health', 'Qube Health', '', 'Active', '2019-03-26 06:11:16', '2022-08-29 09:40:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`slr_id`);

--
-- Indexes for table `tbl_master`
--
ALTER TABLE `tbl_master`
  ADD PRIMARY KEY (`mst_id`),
  ADD UNIQUE KEY `mst_mobile_number` (`mst_mobile_number`),
  ADD UNIQUE KEY `mst_email` (`mst_email`);

--
-- Indexes for table `tbl_timezone`
--
ALTER TABLE `tbl_timezone`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `tbl_website_info`
--
ALTER TABLE `tbl_website_info`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `slr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_master`
--
ALTER TABLE `tbl_master`
  MODIFY `mst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_timezone`
--
ALTER TABLE `tbl_timezone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `usr_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_website_info`
--
ALTER TABLE `tbl_website_info`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
