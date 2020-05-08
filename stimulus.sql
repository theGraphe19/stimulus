-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 02:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stimulus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `rights` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`, `rights`) VALUES
(1, 'Master Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-12-12 12:29:05', 'r11-r12-r13-r21-r22-r23-r24-r25-r31-r32-r33'),
(12, 'Domino', 'Sanny', 'sanny67', '2020-02-24 10:57:26', 'r32-r22-r13-r12'),
(13, 'fsdfd', 'Sayantani', '0d19a0dcb1c360b911c41097d00ec4da', '2020-02-24 11:01:18', 'r21-r12'),
(14, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-02-24 13:22:29', ''),
(16, 'asdfaf', 'XYZ', 'd16fb36f0911f878998c136191af705e', '2020-02-24 15:26:15', 'r24-r22-r12');

-- --------------------------------------------------------

--
-- Table structure for table `agent_trips`
--

CREATE TABLE `agent_trips` (
  `trip_id` int(11) NOT NULL,
  `trip_agent_id` varchar(20) NOT NULL,
  `trip_people` int(11) NOT NULL,
  `trip_place` int(11) NOT NULL,
  `trip_food` int(11) NOT NULL,
  `trip_date` varchar(50) NOT NULL,
  `trip_time` int(11) NOT NULL,
  `trip_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = No ; 1 = Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `food_type_id` int(11) NOT NULL,
  `food_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`food_type_id`, `food_type_name`) VALUES
(6, 'Jain'),
(7, 'Gujarati/Marwadi'),
(8, 'Maharashtrian'),
(9, 'South Indian'),
(10, 'Rajasthani'),
(11, 'Bengali'),
(12, 'Punjabi'),
(13, 'Vegetarian'),
(14, 'Non Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages`
--

CREATE TABLE `holiday_packages` (
  `ho_id` int(11) NOT NULL,
  `ho_code` varchar(100) NOT NULL,
  `ho_days` int(5) NOT NULL,
  `ho_nights` int(5) NOT NULL,
  `ho_destination` varchar(100) NOT NULL,
  `ho_country` int(11) NOT NULL,
  `ho_price` varchar(50) NOT NULL,
  `ho_child_price` varchar(50) NOT NULL,
  `ho_pic` varchar(200) NOT NULL,
  `ho_doc` varchar(200) NOT NULL DEFAULT '0',
  `ho_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Not Visible, 1 = Visible',
  `ho_best` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_packages`
--

INSERT INTO `holiday_packages` (`ho_id`, `ho_code`, `ho_days`, `ho_nights`, `ho_destination`, `ho_country`, `ho_price`, `ho_child_price`, `ho_pic`, `ho_doc`, `ho_status`, `ho_best`) VALUES
(47, 'STIM241220ULUS3233', 6, 5, 'ANDAMAN', 99, '32750', '', 'assets/holiday_packages/Andaman.jpg', 'assets/documents/STIM241220ULUS3233.pdf', 1, 1),
(48, 'STIM244120ULUS5636', 6, 5, 'BHUTAN', 99, '49000', '', 'assets/holiday_packages/BHUTAN.jpg', 'assets/documents/STIM244120ULUS5636.pdf', 1, 1),
(49, 'STIM243220ULUS3035', 5, 4, 'Golden Triangle Tour', 99, '45456', '', 'assets/holiday_packages/Golden Triangle Tour.jpg', 'assets/documents/STIM243220ULUS3035.pdf', 1, 0),
(50, 'STIM242720ULUS5662', 4, 3, 'Haseen Himachal Tour Packages', 99, '43545', '', 'assets/holiday_packages/Manali.jpg', 'assets/documents/STIM242720ULUS5662.pdf', 1, 0),
(51, 'STIM242520ULUS6591', 7, 6, 'Haseen Himachal with Manali and Shimla', 99, '54545', '', 'assets/holiday_packages/Shimla Manali.jpg', '0', 1, 0),
(52, 'STIM243020ULUS8108', 10, 9, 'Haseen Himachal with Amritsar', 99, '34345', '', 'assets/holiday_packages/Amritsar.jpg', 'assets/documents/STIM243020ULUS8108.pdf', 1, 0),
(53, 'STIM241320ULUS2557', 10, 9, 'KERALA KANYAKUMARI SPECIAL', 99, '23250', '', 'assets/holiday_packages/Kerala.jpg', 'assets/documents/STIM241320ULUS2557.pdf', 1, 1),
(54, 'STIM255220ULUS2856', 11, 10, 'RAJASTHAN SPECIAL', 99, '34750', '', 'assets/holiday_packages/Rajasthan.jpg', 'assets/documents/STIM255220ULUS2856.pdf', 1, 1),
(55, 'STIM250320ULUS6992', 7, 6, 'MARWAD SPECIAL', 99, '22250', '', 'assets/holiday_packages/Marwad.jpg', 'assets/documents/STIM250320ULUS6992.pdf', 1, 1),
(64, 'STIM285420ULUS5014', 3, 2, 'Turkey', 218, '66,999', '34,999', 'assets/holiday_packages/sti1.jpg', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages_cost_excludes`
--

CREATE TABLE `holiday_packages_cost_excludes` (
  `ho_ex_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `ho_ex_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_packages_cost_excludes`
--

INSERT INTO `holiday_packages_cost_excludes` (`ho_ex_id`, `ho_id`, `ho_ex_content`) VALUES
(17, 47, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(18, 47, 'To and From economy class air travel for â€˜I-fly tourâ€™ guests as mentioned in the itinerary'),
(19, 47, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(20, 47, 'Porterage, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(21, 47, 'Any extra cost incurred on behalf of an individual due to illness, accident, hospitalisation, or any personal emergency'),
(22, 47, 'Anything specifically not mentioned in the â€˜tour price includesâ€™ column'),
(23, 48, 'To and From economy class air travel / Train,'),
(24, 48, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(25, 48, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(26, 48, 'Any extra expense such as route change, Airline change, Date change, Accommodation facilities, etc incurred due to the unforeseen, unavoidable forced majeuere circumstances during the tour'),
(27, 48, 'Porterage, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu â€¢	Any extra cost incurred on behalf of an individual due to illness, accident, hospitalisation, or any personal emergency'),
(28, 49, 'To and From economy class Air Ticket or Train'),
(29, 49, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(30, 49, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(31, 49, 'Cost of pre or post tour hotel accommodation'),
(32, 49, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu â€¢	Any extra cost incurred on behalf of an individual due to illness, accident, hospitalization, or any personal emergency'),
(33, 50, 'To and From economy class Air Ticket '),
(34, 50, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(35, 50, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(36, 50, 'Any extra expense such as route change, Airline change, Date change, Accommodation facilities, etc incurred due to the unforeseen, unavoidable forced majeuere circumstances during the tour'),
(37, 50, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(38, 51, 'To and From economy class Air Ticket '),
(39, 51, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(40, 51, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(41, 51, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(42, 51, 'Cost of insurance'),
(43, 51, 'Any extra cost incurred on behalf of an individual due to illness, accident, hospitalization, or any personal emergency'),
(44, 52, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(45, 52, 'To and From economy class Air Ticket '),
(46, 52, 'Any extra expense such as route change, Airline change, Date change, Accommodation facilities, etc incurred due to the unforeseen, unavoidable forced majeuere circumstances during the tour'),
(47, 52, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(48, 53, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(49, 53, 'To and From economy class Air Ticket '),
(50, 53, 'Any increase in Airfare, Visa fees, Airport taxes, Govt Taxes, Fuel Surcharges and any applicability of new taxes from Govt'),
(51, 53, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(52, 53, 'Any extra cost incurred on behalf of an individual due to illness, accident, hospitalization, or any personal emergency'),
(53, 54, 'Govt Tax of 5.00% over and above the Tour Cost mentioned'),
(54, 54, 'Porter age, laundry, telephone charges, shopping, wines & alcoholic beverages, mineral water, items of personal nature and food or drink which is not part of a set group menu'),
(55, 54, 'Entrance fees of all sightseeing places to be visited from inside'),
(56, 54, 'Any extra cost incurred on behalf of an individual due to illness, accident, hospitalization, or any personal emergency'),
(57, 54, 'To and From economy class Air Ticket ');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages_cost_includes`
--

CREATE TABLE `holiday_packages_cost_includes` (
  `ho_in_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `ho_in_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_packages_cost_includes`
--

INSERT INTO `holiday_packages_cost_includes` (`ho_in_id`, `ho_id`, `ho_in_content`) VALUES
(15, 36, 'Breakfast'),
(16, 36, 'Entry Ticket for All tours'),
(17, 36, '3 Nights Stay in Swiss Belhotel Kuta'),
(18, 41, 'Air Ticket, Sightseeing, Hotels, Meals'),
(19, 42, '* Mumbai - Portblair - Mumbai Flight tickets as per schedule'),
(20, 42, '* All Sightseeing as per tour itinerary by Non A/c Vehicle'),
(21, 42, '* Accommodation on twin sharing basis in 03 Star Hotels'),
(22, 42, '* Breakfast, Lunch & * Dinner as per mention in tour plan'),
(23, 42, '* Portblair - Havelock â€“ Portblair Ship Tickets on Makruzz/Green Ocean / Costal Cruise'),
(24, 42, '* All entry tickets, Forest Permit & Boat Tickets'),
(25, 42, '* Daily 1 Mineral water bottle of 1 Liter'),
(26, 42, '* Snacks Hamper during the Tour'),
(27, 42, '* Evening Tea/Coffee/Coconut Water'),
(28, 42, '* Professional Tour escort'),
(29, 47, 'Tour Manager Services  from Day 01 Meeting point till the dropping point on last day'),
(30, 47, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerary'),
(31, 47, 'Accommodation in comfortable and convenient hotels'),
(32, 47, 'All Meals â€“ Breakfast, Lunch, Dinner (set menu) as mentioned in the itinerary'),
(33, 47, '1 Lt. Water Bottle per person per day'),
(34, 48, 'Tour Manager Services  from Day 01 to Last day'),
(35, 48, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerary'),
(36, 48, 'Accommodation in comfortable and convenient hotels'),
(37, 48, 'All Meals â€“ Breakfast, Lunch, Dinner (set menu) as mentioned in the itinerary'),
(38, 48, '1 Lt. Water Bottle per person per day'),
(39, 49, 'Tour Manager Services  from Day 01 to Last day'),
(40, 49, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerary'),
(41, 49, 'Entrance fees of all sightseeing places to be visited from inside'),
(42, 49, 'All Meals â€“ Breakfast, Lunch, Dinner (set menu) as mentioned in the itinerary'),
(43, 49, '1 Lt. Water Bottle per person per day'),
(44, 50, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerary'),
(45, 50, 'Entrance fees of all sightseeing places to be visited from inside'),
(46, 50, 'Accommodation in comfortable and convenient hotels'),
(47, 50, 'All Meals â€“ Breakfast, Dinner (set menu) as mentioned in the itinerary'),
(48, 51, 'Accommodation on twin sharing Basis in Deluxe rooms.'),
(49, 51, 'Meal on MAPAI basis (Bed Tea, Breakfast and Lunch/ Dinner)'),
(50, 51, 'All sight seeing as per the tour itenrary as disposal basis.'),
(51, 51, 'All Transportation Indica / Indigo / Xylo / Innova / Tempo Traveller.'),
(52, 51, 'Welcome drink on arrival.'),
(53, 51, 'All toll taxes, parking, state taxes and driver allownece.'),
(54, 52, 'Accommodation on twin sharing Basis in Deluxe rooms'),
(55, 52, 'Meal on MAPAI basis (Bed Tea, Breakfast and Lunch/ Dinner).'),
(56, 52, 'All sight seeing as per the tour itenrary as disposal basis.'),
(57, 52, 'All Transportation Indica / Indigo / Xylo / Innova / Tempo Traveller.'),
(58, 52, 'All toll taxes, parking , state taxes and driver allownece.'),
(59, 53, 'Accommodation in comfortable and convenient hotels'),
(60, 53, 'All Meals â€“ Breakfast, Lunch, Dinner (set menu) as mentioned in the itinerary'),
(61, 53, 'Tour Manager Services  from Day 01 to Last day'),
(62, 53, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerar'),
(63, 53, '1 Lt. Water Bottle per person per day'),
(64, 54, 'Accommodation in comfortable and convenient hotels'),
(65, 54, 'All Meals â€“ Breakfast, Lunch, Dinner (set menu) as mentioned in the itinerary'),
(66, 54, '1 Lt. Water Bottle per person per day'),
(67, 54, 'Tour Manager Services  from Day 01 to Last day'),
(68, 54, 'Travel by comfortable A/c or Non A/c coach / Vehicle as per the tour itinerary');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages_country`
--

CREATE TABLE `holiday_packages_country` (
  `ho_con_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `ho_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages_dates`
--

CREATE TABLE `holiday_packages_dates` (
  `ho_dates_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `ho_dates` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_packages_dates`
--

INSERT INTO `holiday_packages_dates` (`ho_dates_id`, `ho_id`, `ho_dates`) VALUES
(77, 47, '2020-05-03'),
(78, 47, '2020-02-03'),
(79, 53, '2020-02-03'),
(80, 53, '2020-12-03'),
(81, 54, '2020-02-03'),
(82, 54, '2020-12-02'),
(83, 55, '2020-12-02'),
(84, 55, '2020-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_packages_itineary`
--

CREATE TABLE `holiday_packages_itineary` (
  `ho_it_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL,
  `ho_day` int(11) NOT NULL,
  `ho_title` varchar(200) NOT NULL DEFAULT 'Title',
  `ho_pic` varchar(200) NOT NULL DEFAULT '0',
  `ho_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_packages_itineary`
--

INSERT INTO `holiday_packages_itineary` (`ho_it_id`, `ho_id`, `ho_day`, `ho_title`, `ho_pic`, `ho_content`) VALUES
(309, 47, 1, 'Mumbai - Portblair', 'assets/holiday_packages/Mumbai - Portblair.jpg', 'On arrival at Port Blair airport, proceed to the hotel. After check-in at the hotel and little relax / lunch Proceed Cellular jail( visit from inside ) In evening, move for the Light and Sound Show at Cellular Jail where the saga of the freedom struggle brought alive. Overnight at Port Blair. (L,D)'),
(310, 47, 2, 'Title', '0', ''),
(311, 47, 3, 'Port Blair â€“Jolly Buoy island - City Sightseeing', 'assets/holiday_packages/Jolly Buoy Island.jpg', 'After Breakfast, we take you to wandoor Beach, where we catch a ferry to Jolly Buoy Island, Time free for water sports activities. Later transfer back to portblair for the tour of Port Blair city which covers Chatham saw mill (the oldest and biggest mill in Asia), Forest Museum, Samundrika (Naval Marine Museum). . Overnight at Port Blair. (B/L/D)'),
(312, 47, 4, 'Port Blair - Swaraj Dweep (Havelock Island)', 'assets/holiday_packages/Swaraj Dweep (Havelock Island).jpg', 'After breakfast check out from hotel & drive towards Havelock Island via Makruzz cruise from Port Blair Harbour. On arrival at Havelock Island, we proceed to Radhanagar Beach , the Times Magazine rated the finest beach among the best beaches in Asia. It is an ideal place for swimming, sea bathing and basking on the sun kissed beach. After noon we precede back towards Port Blair via Makruzz cruise and overnight at Havelock. (B/L/D)'),
(313, 47, 5, 'Swaraj Dweep (Havelock Island) - Port Blair', 'assets/holiday_packages/shopping in Port Blair.jpg', 'After breakfast we proceed to Port Blair . Evening free for shopping in Port Blair. Over night stay at Port Blair (B,L,D)'),
(314, 47, 6, 'Depart From Andaman Islands', 'assets/holiday_packages/Mumbai - Portblair.jpg', 'Departure - Pune / Mumbai .Its time now to say goodbye to Andamans,And meet again on yet another memorable tour.'),
(315, 48, 1, 'Arrive Paro â€“ Thimphu (2Nights) (Approx 65kms, 2 hrs drive)', 'assets/holiday_packages/Thimphu.jpg', 'The most spectacular mountain flights you will ever experience in a life time. Flying in from the heat of the plains of India one can witness from the left side of the aircrafts window a series of the worldâ€™s highest peaks. Your pilot will announce the names of the peaks if the weather is clear. You will descend into the high mountains and as the plane lowers you will not find any airstrip or any city but instead you will enjoy the view of the approaching valley of Paro, the alpine forests, little monasteries, temples and farm houses. Before the plane touches the runaway you will get a glimpse of the fertile valley of Paro, the Paro Dzong and Paro chu(river). Our representative will be at the airport to assist you, meet and greet and transfer to the capital city Thimphu and rest of the day at leisure. O/n at Thimphu. (B/D)'),
(316, 48, 2, 'Thimphu â€“ City tour', 'assets/holiday_packages/Thimphu â€“ City tour.jpg', 'When in Thimphu you got to prepare for surprises where this unique capital has no traffic lights but adopted its own version of the British â€“ Indian colonial times traffic policemen who can startle you and memorize others with his elaborate hand gestures, sometimes he may be signaling stop when it looks like go but donâ€™t worry you can observe the flow and notice his smile as you stare at him. Sightseeing includes visit to the National Memorial Chorten a stupa dedicated to the third king of Bhutan and Buddha statue, Takin Zoo where you will find national animal of Bhutan and drive down hill stop at the junction to take a glimpse of Trashichho Dzong. Proceed towards National Library and Folk Heritage Museum. Afternoon take a short walk to Handicraft Bazaar to view the traditional arts and Centenary Park take a walk to the main city from Clock tower square for shopping. Overnight at Thimphu.(B/D)'),
(317, 48, 3, 'Thimphu - Punakha via Dochula pass (1 Night) (Approx 77 km 3 hours drive)', 'assets/holiday_packages/Thimphu â€“ City tour.jpg', 'Morning drive to low lands of Punakha valley touching Dochula pass 10,000 ft and on the stop at Hongtsho village. Stop at the immigration check point to stamp in your permit. Next to the check point you will find small local stalls selling fresh juicy local apples available for sale in plastic bags you could try some. You will be driving through the first mountain pass in the western part of Bhutan. You will find the 108 Druk Wangyal chortens on the top of the pass where the ridges are draped in colorful prayer flags greet you. You could take three rounds and offer prayers, take some best photo shots. If the weather is clear you will be able to see the highest peaks towards the north,Gangar Punsum among others is the highest unclimbed peak (24,000 ft) in the world. Proceed down towards Punakha through Thinleygang village and upon reaching Lobesa turn left and drive down further. Stop and take a short walk through the villages to Chimmi Lhakhang - The divine madman also known, as Drukpa Kinley is a famous teacher with whom the phallic symbol is associated. Tales told by your guide would have excited you to visit Chimmi Lhakhang. Do not miss the masterâ€™s deeds painted on the walls. Japanese and several American couples visited this temple and were blessed miraculously with children. Afternoon visit majestic Punakha Dzong placed strategically at the junction of the Pho Chu and Mo Chu rivers, the dzong was built in 1637 by Zhabdrung Ngawang Namgyal to serve as the religious and administrative seat of the region. It was here that the dual system of government was introduced in the 17th century and in 1907, enthroned the first King Gongsar Ugyen Wangchuk. Evening at leisure. Overnight at Punakha.(B/D)'),
(318, 48, 4, 'Punakha â€“ Paro (2 Nights) (Approx 145 km 4 hrs drive)', 'assets/holiday_packages/Royal Botanical Park.jpg', 'Morning drive to Thimphu via same road and stop at Lamperi. Visit the Royal Botanical Park for 30 minutes. If you are lucky you could see red pandas, different species of birds, you can take some photo shot close to the natural lake. You could watch a short documentary about the park. Proceed to Paro via Semtokha and check in the hotel. Day at leisure. Overnight at Paro.(B/D)'),
(319, 48, 5, 'Paro sightseeing', 'assets/holiday_packages/National Museum housed.jpg', 'Morning visit Paro Dzong, the National Museum housed in a round fortress called as the Ta Dzong considered to be one of the best natural history museums in Asia where it has a fine collection of natural and historic artifacts. Kyichu Lhakhang the monastery dates back to 7th century and is one of the oldest and most sacred. Afternoon visit the ruins of Drukgyel Dzong, a 17th century fortress that used to keep invaders from Tibet and in 1951 the fort was destroyed by fire. Your last stop for the day will be at the base of the Tigers Nest. Evening visit the town for leisure or shopping. Overnight at Paro.(B/D)'),
(320, 48, 6, 'Paro â€“Hometown', 'assets/holiday_packages/Paro Airport to board flight.jpg', 'After breakfast proceed to Paro Airport to board flight to your hometown.\r\n\r\n'),
(321, 49, 1, 'Title', '0', ''),
(322, 49, 2, 'Delhi - Agra (195kms/5hr)', 'assets/holiday_packages/Agra.jpg', 'Early morning after breakfast drive to Agra. On arrival check in at hotel. Proceed for sightseeing. Agra Fort - This Fort, built by the successive contribution of three Mughal generations â€“ Akbar, Jehangir and Shah Jahan â€“ still fascinates the entire world with its majestic glory. More like a city inside, the fort was built to fulfill the military purpose which spreads on the banks of Yamuna enclosing a humongous area of 3 km radius. The Agra Fort gained its actual elegance, lavishness and royalty of a palace at the time of Emperor Shah Jahan. The Fort also serves as a vantage point to view the Taj Mahal from a distance and it is believed that the Emperor Shah Jahan spent his days in exile watching the Taj from here.If time allows visit colourful bazzarsnight return back to the Hotel. Overnight stay in Agra hotel.\r\n\r\n\r\nAgra : Two great Mughal monarchs, Akbar and Shah Jahan, transformed the little village of Agra into a befitting second capital of the Mughal Empire - giving it the name Dar-ul-Khilafat {seat of the Emperor}. Today a visitor to Agra is caught up in a world of contrasting edifices, of red sandstone and white marble, narrow galleys and quaint buggies, and that irresistible charm that this favorite city of the Mughals still retains. It is not surprising, that modern Agra still reflects its Mughal heritage most conspicuously. A walk down the narrow bustling streets of the city will introduce the visitor to the wafting aroma of Mughlai cuisine.'),
(323, 49, 3, 'Agra - Jaipur (240kms/6hr)', 'assets/holiday_packages/Jaipur.jpg', 'Early morning visit Taj Mahal - a poem written in white marble, the most extravagant monument ever built for love. Taj Mahal â€“ One of the eight wonders of the world .The Taj Mahal is often described as \"the epitome of love\" & \"a monument of immeasurable beauty\". Taj Mahal was built by Mughal Emperor Shah Jahan to enshrine the remains of his beloved wife Begum MumtazMahal which manifested the immortal love between the two. The purity of the white marble, the exquisite ornamentation, precious gemstones used and its picturesque location, all make this monument gain a place amongst the most magnificent buildings of the world. You can stay on to view the monument changing its mood with the soft light of the setting sun. The Taj Mahal remains closed on Fridays. Later transfer to the hotel for breakfast and checkout direct drive to Jaipur on arrival check in the hotel if time allows evenings go to ChokhiDhani - An ethnic village resort and enjoy Rajasthani Food served in Traditional style enjoying folk dances and music (At your own). Overnight stay in Jaipur hotel.\r\n\r\n\r\nJaipur : Popularly known as the Pink City, is the capital of Rajasthan state, the city that once had been the capital of the royalty, now serves as the capital city of Rajasthan. The very structure of Jaipur resembles the taste of the Rajputs and the Royal family. Jaipur is the former capital of the princely state of Jaipur. Founded in 1727 by Maharaja Sawai Jai Singh II, the ruler of Amber, the city today has a population of more than 5 million residents.\r\n\r\n\r\nHis Highness SawaiBhawani Singh Bahadur (born 1931) is the current titular Maharaja of Jaipur. Jaipur is the first planned city of India, located in the desert lands of Rajasthan. In the present date, Jaipur is the major business centre for the natives of Rajasthan with all requisites of a metropolitan city. The city of Jaipur, painted in pink, grasp the appreciation of every visitor. One can see that hoary charm still alive in the avenues of Jaipur.'),
(324, 49, 4, 'Jaipur', 'assets/holiday_packages/Amber Fort.jpg', 'Morning after breakfast visit Amber Fort, and enjoy elephant ride (At your own). Visit world famous Astrological Observatory, City Palace - Museums of precious and semi - precious stones, Typical Rajasthani handicrafts & free for shopping. Overnight stay in Jaipur hotel.'),
(325, 49, 5, 'Jaipur - Delhi (265kms/6hr)', 'assets/holiday_packages/Delhi To Mumbai.jpg', 'Morning after breakfast checkout from the hotel and drive to Delhi to catch your flight for next destination. Tour End.'),
(326, 50, 1, 'Delhi â€“ Manali (570 km and 12 hrs overnight journey)', 'assets/holiday_packages/Delhi to Manali Rd.jpg', 'Evening Pickup from airport and railway station and drive to Manali via kullu by morning reach at Manali.'),
(327, 50, 2, 'Manali local', 'assets/holiday_packages/KUFRI.jpg', 'Full day sightseeing visiting Indian Institute Of Advanced Studies, Sankat Mochan Temple and Jakhu Temple and Visit KUFRI a beautiful snow hill station in evening visit the Mall & the Ridge back to hotel have dinner and overnight stay.'),
(328, 50, 3, 'Manali - Rohtang pass or Solang valley', 'assets/holiday_packages/Shimla.jpg', 'Full day excursion visiting Kothi Gorge, Gulaba, Marhi, Rohtang Pass -(tourist spot in himalaya having snow all 12 months) is the most visited tourist spot in Himalaya having snow round the year (Upto Snow Line in case Rohtang is closed due to snow fall) and Sollang Valley and visit the famous mall road. evening return to hotel. Diner and Overnight at hotel.'),
(329, 50, 4, 'Manali â€“ Kullu â€“ Manali', 'assets/holiday_packages/white water rafting.jpg', 'Afetr early breakfast have drive Kullu do white water rafting over there / River crossing and also do shoping in Kullu Shawl factory by night reach back to Manali have dinner and overnight stay.'),
(330, 51, 1, 'Delhi â€“ Shimla (380 kms)', 'assets/holiday_packages/Delhi to Manali Rd.jpg', 'On Arrival in Delhi we will meet you and transfer by to Shimla (343 kms / 8 hrs). Shimla is capital of himachal former capital of Britishers also set amidst, the snow copper, shaivalik, mountains which offer some of the most beautifull view of himalaya Reach there and check in hotel Dinner and overnight at Shimla.'),
(331, 51, 2, 'Shimla', 'assets/holiday_packages/Shimla1.jpg', 'Full day sightseeing visiting Indian Institute Of Advanced Studies, Sankat Mochan Temple and Jakhu Temple and Visit KUFRI a beautiful snow hill station in evening visit the Mall & the Ridge back to hotel have dinner and overnight stay.'),
(332, 51, 3, 'Shimla â€“ Manali', 'assets/holiday_packages/Snow mountains and beautiful water falls.jpg', 'After early breakfast you will proceed to Manali (320 kms / 8 hrs) Manali is a perfect hill station covered with snow mountains and beautiful water falls. On arrival check in at hotel. Dinner and overnight at Manali.'),
(333, 51, 4, 'Manali', 'assets/holiday_packages/Hadimba Devi Temple.jpg', 'Morning after breakfast go for city tour visiting Hadimba Devi Temple, Manu Temple, Tibetan Monastery and Vashisht Village. Enjoy your dinner in hotel. Overnight at hotel.'),
(334, 51, 5, 'Manali â€“ Rohtang Pass â€“ Solang Valley', 'assets/holiday_packages/Solang Valley.jpg', 'Full day excursion visiting Kothi Gorge, Gulaba, Marhi, Rohtang Pass - (tourist spot in himalaya having snow all 12 months) is the most visited tourist spot in Himalaya having snow round the year (Upto Snow Line in case Rohtang is closed due to snow fall) and Sollang Valley evening return to hotel. Diner and Overnight at hotel.'),
(335, 51, 6, 'Manali â€“ Delhi', 'assets/holiday_packages/manali and drive to Delhi.jpg', 'After breakfast depart manali and drive to Delhi 570km (11 hrs) by night reaches at Delhi have dinner and overnight stay.'),
(336, 51, 7, 'Delhi local and departure', 'assets/holiday_packages/Delhi To Mumbai.jpg', 'After breakfast check out from the hotel and do full day city tour of Delhi India gate / President house / Parliamnet house / Qutub minar / Akshardham temple / Lakshminarayn temple etc. and also do shoping in famous Karol bagh gaffer market by evening transfer to airport / railway station.'),
(337, 52, 1, 'Delhi â€“ Shimla', 'assets/holiday_packages/Delhi to Manali Rd.jpg', 'Morning arrival at Delhi Airport / Railway station meets our representative of Verma Holidays and drive to Shimla. Shimla is capital of himachal former capital of Britishers also set amidst, the snow copper, shaivalik, mountains which offer some of the most beautifull view of himalaya Reach there and check in hotel Dinner and overnight at Shimla.'),
(338, 52, 2, 'Shimla', 'assets/holiday_packages/Shimla1.jpg', 'Full day sightseeing visiting Indian Institute Of Advanced Studies, Sankat Mochan Temple and Jakhu Temple and Visit KUFRI a beautiful snow hill station in evening visit the Mall & the Ridge back to hotel have dinner and overnight stay.'),
(339, 52, 3, 'Shimla â€“ Manali', 'assets/holiday_packages/Snow mountains and beautiful water falls.jpg', 'After early breakfast you will proceed to Manali (320 kms / 8 hrs) Manali is a perfect hill station covered with snow mountains and beautiful water falls. On arrival check in at hotel. Dinner and overnight at Manali.'),
(340, 52, 4, 'Manali local', 'assets/holiday_packages/Manali.jpg', 'Morning after breakfast go for city tour visiting Hadimba Devi Temple, Manu Temple, Tibetan Monastery and Vashisht Village. Enjoy your dinner in hotel. Overnight at hotel.'),
(341, 52, 5, 'Manali - Rohtang pass â€“ Solang valley', 'assets/holiday_packages/Solang Valley.jpg', 'Full day excursion visiting Kothi Gorge, Gulaba, Marhi, Rohtang Pass - (tourist spot in himalaya having snow all 12 months) is the most visited tourist spot in Himalaya having snow round the year (Upto Snow Line in case Rohtang is closed due to snow fall) and Sollang Valley evening return to hotel. Diner and Overnight at hotel.\r\n\r\n'),
(342, 52, 6, 'Manali â€“ Dharamshala (220 kms / 5 hrs)', 'assets/holiday_packages/Dharamshala.jpg', 'Early morning after having breakfast checkout from the hotel and drive to Dharamshala via Kullu by evening reach at Dharamshala check inn into hotel have dinner and overnight stay.'),
(343, 52, 7, 'Dharamshala local â€“ Dalhousie (119 kms / 3 hrs)', 'assets/holiday_packages/Dalhousie.jpg', 'Morning after breakfast check out from the hotel and half day local sightseeing Water fall / Bhagsunag temple / Tibetian monestry / Dharsmhala stadioum / Naddi village etc. & drive to dalhousie. On arrival at Dalhousie check inn the hotel & do some local sightseeing near by hotel. Overnight stay at hotel.'),
(344, 52, 8, 'Dalhousie â€“ Khajiar â€“ Dalhousie', 'assets/holiday_packages/Khajiar.jpg', 'Morning have breakfast and go for execursion trip to Khajiar wihich is also called as Mini Switzerland do all adventure activities over there and enjoy the nature evening back to hotel and overnight stay.'),
(345, 52, 9, 'Dalhousie â€“ Wagha border - Amritsar (185 kms / 4 hrs)', 'assets/holiday_packages/Wagha border.jpg', 'Early morning after breakfast drive to Amritsar. Amritsar is thecity of Amritsar is a glittering showcase of compound traditions and secular culture. A thriving city with important devout centers and historical sites Amritsar exhibits a glorious past, magnificient present and a hopeful future. A significant city of Majha region, it has been entitled the prestigious title of the jewel of Punjab. A prosperous depository of national heritage and religion, it has been renowned as the abode of all merits. Evening reach at Amritsar and visit Wagha Border & Golden Temple. Then after check inn the hotel & overnight stay in Amritsar hotel.'),
(346, 52, 10, 'Amritsar â€“ Jalianwalan Bagh â€“ Delhi (460 kms / 11 hrs)', 'assets/holiday_packages/Jalianwalan Bagh.jpg', 'Early morning after breakfast check out from the Hotel and drive to visit Jalianwala Bagh & do Shopping of juttis, then drive to Delhi by evening reach at Delhi and transfer to you on railway station / airport for your next destinations. Tour ends'),
(347, 53, 1, 'Arrival In Cochin', 'assets/holiday_packages/Cochin Airport.jpg', 'Cochin arrival 7 PM,Proceed to Hotel, ( Guest arriving by flight will Directly join at cochin hotel ) Overnight at Cochin. (D)\r\n\r\n'),
(348, 53, 2, 'Cochin â€“ Athirapally - Kaladi - Guruvayur - Cochin', 'assets/holiday_packages/Athirappalli waterfalls.jpg', 'Today we Visit to athiramapally Falls On chalkudi river, Birth Place of Shri Shankaracharya(Kaladi),Guruvayur Temple, Overnight at Cochin (B,L,D)'),
(349, 53, 3, 'Cochin â€“ Munnar ( 140 KMS / 4 Hrs )', 'assets/holiday_packages/Munnar.jpg', 'In the morning Take a Harbour Cruise Ride to see Chinese Fishing Nets Visit St. Francis Church, Jewish Synagogue and Dutch Palace. After Lunch Proceed to Munnar. Overnight at Munnar. (B,L,D)'),
(350, 53, 4, 'Munnar', 'assets/holiday_packages/Mattupetty Dam.jpg', 'Enjoy speed boat ride at Mattupetty Dam. View Tea Garden/Tea Factory, visit Echo Point. Overnight at Munnar (B,L,D)\r\n\r\n'),
(351, 53, 5, 'Munnar â€“ Thekkady (Periyar) ( 120 KMS / 3 Hrs )', 'assets/holiday_packages/Thekkady.jpg', 'Morning Departure from Munnar towards thekkady,upon arrival Enjoy Kathakali Show ( optional ) at Thekkadi,visit to Spice Gardern,Evening free for shopping. Overnight at Thekkady (B,L,D)'),
(352, 53, 6, 'Thekkady (Periyar) â€“ Kottayam ( 115 Kms / 4 Hrs )', 'assets/holiday_packages/Kottayam.jpg', 'Early Morning boat ride at periyar wildlife sanctury ( Sub to availability) , later proceed to Kottayam. Enjoy the famous Kerala Backwaters ride from Alleppey/ kottayam. Overnight at kottayam (B,L,D)'),
(353, 53, 7, 'Kottayam â€“ Trivandrum ( 166 KMS / 5 Hrs )', 'assets/holiday_packages/Trivandrum.jpg', 'AfterBreakfast proceed to Trivendrum. In the evening visit Famous Kovalam beach. Overnight at Trivandrum. (B,L,D)'),
(354, 53, 8, 'Trivandrum â€“ Suchindrum â€“ Kanyakumari. ( 90 Kms / 2 Hrs )', 'assets/holiday_packages/Suchindrum â€“ Kanyakumari.jpg', 'Today we visit the famous Padmanabhswami Temple along with Zoo and Art gallery. After Lunch Proceed to Kanyakumari On the way visit Suchindram temple. Overnight at Kanyakumari. (B,L,D)'),
(355, 53, 9, 'Kanyakumari', 'assets/holiday_packages/Kanyakumari.jpg', 'Early morning take a ferry ride to Swami Vivekanand Rock Memorial to see meditation hall and smarak, Later Visit Kanyakumari Mandir and Gandhi Mandapam. . Enjoy Sunset in evening . Overnight at Kanyakumari (B,L,D)'),
(356, 53, 10, 'Kanyakumari- Mumbai Departure', 'assets/holiday_packages/Kanyakumari Return.jpg', 'Departure from Kanyakumari, .( Guest coming by flight can take a train to Trivandrum / Cochin )Board the train for your hometown. (Packed Breakfast)'),
(357, 54, 1, 'Jodhpur', 'assets/holiday_packages/Jodhpur Train Station.jpg', 'Jodhpur arrival at 17.35. Overnight at Jodhpur.( guest arriving by flight will directly join at hotel )(D)'),
(358, 54, 2, 'Jodhpur- Jaisalmer (290Kms / 6Hrs)', 'assets/holiday_packages/Jodhpur City Tours.jpg', 'In the morning Enjoy the city tour of Jodhpur. Visit Ummaid Bhavan Palace museum, Mehrangarh Fort which includes Moti Mahal, Phool Mahal, Sheesh Mahal, Silah Khana, Daulat Khana and Rang Mahal, After Lunch procced to Jaisalmer. Overnight at Jaisalmer. (B,L,D)'),
(359, 54, 3, 'Jaisalmer', 'assets/holiday_packages/Gandhi Sagar Lake.jpg', 'Visit Gadhisagar Lake, Golden Fort and Jain Mandir in the morning. Later visit Patwan ki Haweli,Then Transfer to Sun Dunes Enjoy Camel ride, folk dance and magnificent sunset in famous Sam Sand Dunes with dinner. Overnight at Jaisalmer.Tented accommodation. (B,L,D)'),
(360, 54, 4, 'Jaisalmer â€“ Bikaner (360 Kms / 6Hrs)', 'assets/holiday_packages/Jaipur.jpg', 'After breakfast proceed to Bikaner, Visit Junagarh Fort,Deshnok rat Temple also know as Karni Mata Mandir, Overnight at Bikaner. (B,L,D)'),
(361, 54, 5, 'Jaipur', 'assets/holiday_packages/Jaipur 1.jpg', 'After Breakfast visit Birla Mandir, Hawa Mahal,Jantar Mantar and City Palace,After lunch visit Amber Palace and Jal maha ( Amer fort ), evening free for shopping. Overnight at Jaipur. (B,L,D)'),
(362, 54, 6, 'Title', '0', ''),
(363, 54, 7, 'Title', '0', ''),
(364, 54, 8, 'Title', '0', ''),
(365, 54, 9, 'Title', '0', ''),
(366, 54, 10, 'Title', '0', ''),
(367, 54, 11, 'Title', '0', ''),
(368, 55, 1, 'Title', '0', ''),
(369, 55, 2, 'Title', '0', ''),
(370, 55, 3, 'Title', '0', ''),
(371, 55, 4, 'Title', '0', ''),
(372, 55, 5, 'Title', '0', ''),
(373, 55, 6, 'Title', '0', ''),
(374, 55, 7, 'Title', '0', ''),
(400, 64, 1, 'Title', '0', ''),
(401, 64, 2, 'Title', '0', ''),
(402, 64, 3, 'Title', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(200) NOT NULL,
  `h_password` varchar(200) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `h_food_type` int(11) NOT NULL,
  `h_capacity` int(11) NOT NULL,
  `h_location` int(11) NOT NULL,
  `h_phn_code` int(11) NOT NULL,
  `h_phn` varchar(20) NOT NULL,
  `h_email` varchar(200) NOT NULL,
  `h_status` int(11) NOT NULL DEFAULT 0 COMMENT '1 = Verified; 0 = Not Verified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `ho_book_id` varchar(100) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_reser_date` varchar(50) NOT NULL,
  `hotel_food_type` int(11) NOT NULL,
  `hotel_time` int(11) NOT NULL,
  `hotel_location` int(11) NOT NULL,
  `hotel_remarks` varchar(1000) NOT NULL DEFAULT '0',
  `hotel_capacity` int(11) NOT NULL,
  `hotel_reserved_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_set`
--

CREATE TABLE `hotel_set` (
  `h_set_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `h_name` varchar(200) NOT NULL,
  `h_date` varchar(20) NOT NULL,
  `h_food` int(11) NOT NULL,
  `h_time` int(11) NOT NULL,
  `h_vac` int(11) NOT NULL,
  `h_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_set`
--

INSERT INTO `hotel_set` (`h_set_id`, `h_id`, `h_name`, `h_date`, `h_food`, `h_time`, `h_vac`, `h_msg`) VALUES
(4, 24, 'Brewhive', '14 Feb, 2020', 1, 13, 100, '50 seats can go away so not sure about that. 50 can be confirmed for now. Thanks!');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_update`
--

CREATE TABLE `hotel_update` (
  `ho_book_id` varchar(50) NOT NULL,
  `food_type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `total_seat` int(11) NOT NULL DEFAULT 0,
  `total_people` int(11) NOT NULL DEFAULT 0,
  `total_confirmed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_numbers`
--

CREATE TABLE `mobile_numbers` (
  `mobile_id` int(11) NOT NULL,
  `mobile_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Verified, 0=Not verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobile_numbers`
--

INSERT INTO `mobile_numbers` (`mobile_id`, `mobile_number`, `verification_code`, `verified`) VALUES
(97, '919647513679', '60487', 1),
(98, '919647513679', '10073', 0),
(99, '917908024082', '66384', 1),
(100, '917908024082', '65135', 0),
(101, '917908024082', '67388', 0),
(102, '919647513679', '54876', 0),
(103, '917908024082', '13022', 1),
(104, '917700024494', '99421', 1),
(105, '917700024494', '63163', 1),
(106, '919819661717', '91743', 1),
(107, '917908024082', '29521', 1),
(108, '917700024494', '46627', 1),
(109, '7700024494', '33182', 0),
(110, '7700024494', '84187', 0),
(111, '7700024494', '19750', 0),
(112, '7700024494', '98506', 0),
(113, '919903348739', '49607', 1),
(114, '919647513679', '33086', 1),
(115, '919647513679', '22159', 0),
(116, '919647513679', '50102', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_booking`
--

CREATE TABLE `package_booking` (
  `pc_b_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pc_email` varchar(100) NOT NULL,
  `pc_phone_code` int(11) NOT NULL,
  `pc_phone` varchar(20) NOT NULL,
  `pc_people` varchar(20) NOT NULL,
  `pc_b_code` varchar(200) NOT NULL,
  `pc_b_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_booking`
--

INSERT INTO `package_booking` (`pc_b_id`, `pc_id`, `pc_email`, `pc_phone_code`, `pc_phone`, `pc_people`, `pc_b_code`, `pc_b_status`) VALUES
(10, 68547, 'dfgf@g.com', 0, '5656', '45', 'STIM241220ULUS3233, STIM242520ULUS6591, STIM243220ULUS3035', 1),
(11, 43671, 'xcg@g.com', 91, '9647513679', '40', 'STIM285420ULUS5018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_users`
--

CREATE TABLE `package_users` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(200) NOT NULL,
  `pc_email` varchar(200) NOT NULL,
  `pc_password` varchar(100) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `pc_phone_code` int(11) NOT NULL,
  `pc_phone` varchar(20) NOT NULL,
  `pc_status` int(11) NOT NULL DEFAULT 0,
  `pc_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_users`
--

INSERT INTO `package_users` (`pc_id`, `pc_name`, `pc_email`, `pc_password`, `pc_phone_code`, `pc_phone`, `pc_status`, `pc_registered`) VALUES
(43671, 'Rohit Singh', 'xcg@h.com', '28baf0a98a867550c05f22e9b7bb4e5b', 91, '+91 9647513679', 4, '2020-01-30 19:15:16'),
(68547, 'cnvh', 'xcg@g.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '+91 9647513679', 2, '2020-01-27 18:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `pl_id` int(11) NOT NULL,
  `pl_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`pl_id`, `pl_name`) VALUES
(11, 'Singapore'),
(15, 'Thailand'),
(16, 'Russia'),
(17, 'China'),
(18, 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `qr_url`
--

CREATE TABLE `qr_url` (
  `qr_id` int(11) NOT NULL,
  `qr_hotel` varchar(200) NOT NULL,
  `qr_code` varchar(200) NOT NULL,
  `qr_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qr_url`
--

INSERT INTO `qr_url` (`qr_id`, `qr_hotel`, `qr_code`, `qr_status`) VALUES
(5849, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31132_1', 1),
(5850, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31627_6', 0),
(5851, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31528_5', 0),
(5852, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311320_13', 0),
(5853, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311518_15', 0),
(5854, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546342_3', 0),
(5855, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31258_25', 0),
(5856, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31429_4', 0),
(5857, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31330_33', 0),
(5858, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546144_1', 0),
(5859, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a312310_23', 0),
(5860, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31249_24', 0),
(5861, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461134_11', 0),
(5862, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5462223_22', 0),
(5863, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546639_6', 0),
(5864, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461233_12', 0),
(5865, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311419_14', 0),
(5866, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a312211_22', 0),
(5867, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31312_31', 0),
(5868, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31231_2', 1),
(5869, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461728_17', 0),
(5870, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546936_9', 0),
(5871, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311221_12', 0),
(5872, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461530_15', 0),
(5873, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461629_16', 0),
(5874, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31267_26', 0),
(5875, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31321_32', 0),
(5876, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31285_28', 0),
(5877, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311617_16', 0),
(5878, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461827_18', 0),
(5879, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31330_3', 0),
(5880, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311716_17', 0),
(5881, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546441_4', 0),
(5882, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31276_27', 0),
(5883, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461926_19', 0),
(5884, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546243_2', 0),
(5885, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311914_19', 0),
(5886, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311815_18', 0),
(5887, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546540_5', 0),
(5888, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461035_10', 0),
(5889, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461431_14', 0),
(5890, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a312112_21', 0),
(5891, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d5461332_13', 0),
(5892, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31294_29', 0),
(5893, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31303_30', 0),
(5894, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31825_8', 0),
(5895, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31726_7', 0),
(5896, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546837_8', 0),
(5897, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311023_10', 0),
(5898, '30 Jan, 2020.Veg.1300 - 1400 hrs', '30c37395131371af814725035573d546738_7', 0),
(5899, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a31924_9', 0),
(5900, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a311122_11', 0),
(5901, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'f28a460cdb8e5fad38e33aeb0ea84a312013_20', 0),
(5902, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3231_2', 0),
(5903, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3627_6', 0),
(5904, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3528_5', 0),
(5905, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3330_3', 0),
(5906, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3726_7', 0),
(5907, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3429_4', 0),
(5908, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3924_9', 0),
(5909, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3825_8', 0),
(5910, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31221_12', 0),
(5911, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31320_13', 0),
(5912, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31122_11', 0),
(5913, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31419_14', 0),
(5914, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31617_16', 0),
(5915, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3132_1', 0),
(5916, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31914_19', 0),
(5917, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31518_15', 0),
(5918, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31716_17', 0),
(5919, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b32013_20', 0),
(5920, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31815_18', 0),
(5921, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b31023_10', 0),
(5922, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3249_24', 0),
(5923, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b32112_21', 0),
(5924, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b32211_22', 0),
(5925, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3267_26', 0),
(5926, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3285_28', 0),
(5927, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3294_29', 0),
(5928, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3258_25', 0),
(5929, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3312_31', 0),
(5930, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3276_27', 0),
(5931, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3303_30', 0),
(5932, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3321_32', 0),
(5933, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b32310_23', 0),
(5934, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2243_2', 0),
(5935, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2441_4', 0),
(5936, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2144_1', 0),
(5937, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2639_6', 0),
(5938, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3d07977f0cbf75ec87448716fd3110b3330_33', 0),
(5939, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2540_5', 0),
(5940, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2342_3', 0),
(5941, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2738_7', 0),
(5942, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2936_9', 0),
(5943, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21233_12', 0),
(5944, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21035_10', 0),
(5945, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21332_13', 0),
(5946, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21134_11', 0),
(5947, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21431_14', 0),
(5948, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21728_17', 0),
(5949, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21827_18', 0),
(5950, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2837_8', 0),
(5951, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21530_15', 0),
(5952, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21629_16', 0),
(5953, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22025_20', 0),
(5954, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22322_23', 0),
(5955, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22421_24', 0),
(5956, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22520_25', 0),
(5957, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22223_22', 0),
(5958, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22718_27', 0),
(5959, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22619_26', 0),
(5960, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac21926_19', 0),
(5961, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22124_21', 0),
(5962, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23114_31', 0),
(5963, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23015_30', 0),
(5964, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23213_32', 0),
(5965, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23411_34', 0),
(5966, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22916_29', 0),
(5967, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23312_33', 0),
(5968, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2378_37', 0),
(5969, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac22817_28', 0),
(5970, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2369_36', 0),
(5971, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2387_38', 0),
(5972, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2414_41', 0),
(5973, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac23510_35', 0),
(5974, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2405_40', 0),
(5975, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2432_43', 0),
(5976, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2396_39', 0),
(5977, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2423_42', 0),
(5978, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2450_45', 0),
(5979, '30 Jan, 2020.Veg.1300 - 1400 hrs', '1c23982ef00feccb2047a1fc4dcaeac2441_44', 0),
(5980, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a132_1', 0),
(5981, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a429_4', 0),
(5982, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a528_5', 0),
(5983, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a330_3', 0),
(5984, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a627_6', 0),
(5985, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a825_8', 0),
(5986, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1023_10', 0),
(5987, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a726_7', 0),
(5988, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1122_11', 0),
(5989, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1320_13', 0),
(5990, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a924_9', 0),
(5991, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1419_14', 0),
(5992, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1617_16', 0),
(5993, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1716_17', 0),
(5994, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1914_19', 0),
(5995, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1815_18', 0),
(5996, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a2013_20', 0),
(5997, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1221_12', 0),
(5998, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a2112_21', 0),
(5999, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a231_2', 0),
(6000, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a1518_15', 0),
(6001, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a258_25', 0),
(6002, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a267_26', 0),
(6003, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a276_27', 0),
(6004, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a285_28', 0),
(6005, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a2310_23', 0),
(6006, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a249_24', 0),
(6007, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a294_29', 0),
(6008, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a303_30', 0),
(6009, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a2211_22', 0),
(6010, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a312_31', 0),
(6011, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a330_33', 0),
(6012, '30 Jan, 2020.Veg.0800 - 0900 hrs', '943e3cf10ab5a854af973489a978606a321_32', 0),
(6013, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20144_1', 0),
(6014, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20540_5', 0),
(6015, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20342_3', 0),
(6016, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20441_4', 0),
(6017, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20243_2', 0),
(6018, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20738_7', 0),
(6019, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20837_8', 0),
(6020, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201035_10', 0),
(6021, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20639_6', 0),
(6022, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20936_9', 0),
(6023, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201233_12', 0),
(6024, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201332_13', 0),
(6025, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201530_15', 0),
(6026, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201629_16', 0),
(6027, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201431_14', 0),
(6028, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201926_19', 0),
(6029, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201728_17', 0),
(6030, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201827_18', 0),
(6031, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202223_22', 0),
(6032, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff201134_11', 0),
(6033, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202421_24', 0),
(6034, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202025_20', 0),
(6035, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202124_21', 0),
(6036, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202520_25', 0),
(6037, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202916_29', 0),
(6038, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202322_23', 0),
(6039, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202619_26', 0),
(6040, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202817_28', 0),
(6041, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff202718_27', 0),
(6042, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203114_31', 0),
(6043, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203213_32', 0),
(6044, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203015_30', 0),
(6045, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20369_36', 0),
(6046, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203312_33', 0),
(6047, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20378_37', 0),
(6048, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20396_39', 0),
(6049, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20405_40', 0),
(6050, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20387_38', 0),
(6051, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20423_42', 0),
(6052, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20432_43', 0),
(6053, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20414_41', 0),
(6054, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20441_44', 0),
(6055, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203510_35', 0),
(6056, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff20450_45', 0),
(6057, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'cbf50f7f17c97deadfe112c01744ff203411_34', 0),
(6058, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb132_1', 0),
(6059, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb528_5', 0),
(6060, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb330_3', 0),
(6061, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb429_4', 0),
(6062, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb726_7', 0),
(6063, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb924_9', 0),
(6064, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb825_8', 0),
(6065, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1122_11', 0),
(6066, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb627_6', 0),
(6067, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb231_2', 0),
(6068, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1023_10', 0),
(6069, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1221_12', 0),
(6070, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1320_13', 0),
(6071, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1518_15', 0),
(6072, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1716_17', 0),
(6073, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1419_14', 0),
(6074, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1617_16', 0),
(6075, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb2112_21', 0),
(6076, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb2013_20', 0),
(6077, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb2211_22', 0),
(6078, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1914_19', 0),
(6079, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb2310_23', 0),
(6080, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb267_26', 0),
(6081, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb249_24', 0),
(6082, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb258_25', 0),
(6083, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb1815_18', 0),
(6084, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb294_29', 0),
(6085, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb312_31', 0),
(6086, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb285_28', 0),
(6087, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb321_32', 0),
(6088, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb330_33', 0),
(6089, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c144_1', 0),
(6090, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb303_30', 0),
(6091, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c243_2', 0),
(6092, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c540_5', 0),
(6093, '30 Jan, 2020.Veg.0800 - 0900 hrs', '2ce00a6b3965e5a70ddc33fbf4be83cb276_27', 0),
(6094, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c342_3', 0),
(6095, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c441_4', 0),
(6096, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c837_8', 0),
(6097, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c639_6', 0),
(6098, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c936_9', 0),
(6099, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1035_10', 0),
(6100, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c738_7', 0),
(6101, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1233_12', 0),
(6102, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1332_13', 0),
(6103, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1629_16', 0),
(6104, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1134_11', 0),
(6105, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1926_19', 0),
(6106, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1728_17', 0),
(6107, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2025_20', 0),
(6108, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2124_21', 0),
(6109, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1431_14', 0),
(6110, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2223_22', 0),
(6111, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2421_24', 0),
(6112, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2520_25', 0),
(6113, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2619_26', 0),
(6114, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1530_15', 0),
(6115, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2322_23', 0),
(6116, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2916_29', 0),
(6117, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3114_31', 0),
(6118, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c1827_18', 0),
(6119, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3015_30', 0),
(6120, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3312_33', 0),
(6121, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2817_28', 0),
(6122, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3411_34', 0),
(6123, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c2718_27', 0),
(6124, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c369_36', 0),
(6125, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c396_39', 0),
(6126, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3213_32', 0),
(6127, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c378_37', 0),
(6128, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c3510_35', 0),
(6129, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c414_41', 0),
(6130, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c423_42', 0),
(6131, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c387_38', 0),
(6132, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c432_43', 0),
(6133, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c450_45', 0),
(6134, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c405_40', 0),
(6135, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'd9ed9ddc01b55ad24b72e77a689a816c441_44', 0),
(6136, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247132_1', 0),
(6137, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247429_4', 0),
(6138, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247726_7', 0),
(6139, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247528_5', 0),
(6140, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247825_8', 0),
(6141, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247627_6', 0),
(6142, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471023_10', 0),
(6143, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247231_2', 0),
(6144, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247924_9', 0),
(6145, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471419_14', 0),
(6146, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247330_3', 0),
(6147, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471122_11', 0),
(6148, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471320_13', 0),
(6149, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471716_17', 0),
(6150, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471617_16', 0),
(6151, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471815_18', 0),
(6152, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471221_12', 0),
(6153, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2472013_20', 0),
(6154, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2472112_21', 0),
(6155, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2472310_23', 0),
(6156, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247258_25', 0),
(6157, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471518_15', 0),
(6158, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2472211_22', 0),
(6159, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247276_27', 0),
(6160, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247285_28', 0),
(6161, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247249_24', 0),
(6162, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247267_26', 0),
(6163, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce2471914_19', 0),
(6164, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247294_29', 0),
(6165, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247312_31', 0),
(6166, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247330_33', 0),
(6167, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432144_1', 0),
(6168, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432243_2', 0),
(6169, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432342_3', 0),
(6170, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432639_6', 0),
(6171, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247303_30', 0),
(6172, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432540_5', 0),
(6173, '30 Jan, 2020.Veg.0800 - 0900 hrs', '3a201d935c19db6571c51d95953ce247321_32', 0),
(6174, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432441_4', 0),
(6175, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432837_8', 0),
(6176, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321134_11', 0),
(6177, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321035_10', 0),
(6178, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321332_13', 0),
(6179, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432738_7', 0),
(6180, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321233_12', 0),
(6181, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321530_15', 0),
(6182, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432936_9', 0),
(6183, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321431_14', 0),
(6184, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321629_16', 0),
(6185, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321728_17', 0),
(6186, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322124_21', 0),
(6187, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321827_18', 0),
(6188, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322421_24', 0),
(6189, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322223_22', 0),
(6190, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322322_23', 0),
(6191, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322520_25', 0),
(6192, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322025_20', 0),
(6193, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4321926_19', 0),
(6194, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322619_26', 0),
(6195, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322916_29', 0),
(6196, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322718_27', 0),
(6197, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4322817_28', 0),
(6198, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323015_30', 0),
(6199, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323213_32', 0),
(6200, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323411_34', 0),
(6201, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323510_35', 0),
(6202, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323312_33', 0),
(6203, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432378_37', 0),
(6204, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432369_36', 0),
(6205, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f4323114_31', 0),
(6206, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432396_39', 0),
(6207, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432405_40', 0),
(6208, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432432_43', 0),
(6209, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432387_38', 0),
(6210, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432441_44', 0),
(6211, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432423_42', 0),
(6212, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432414_41', 0),
(6213, '30 Jan, 2020.Veg.1300 - 1400 hrs', 'e41ae26384a4efaf190c1ec5ada9f432450_45', 0),
(6214, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6132_1', 0),
(6215, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6231_2', 0),
(6216, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6627_6', 0),
(6217, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6429_4', 0),
(6218, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6528_5', 0),
(6219, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6924_9', 0),
(6220, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6330_3', 0),
(6221, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6825_8', 0),
(6222, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61023_10', 0),
(6223, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61221_12', 0),
(6224, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6726_7', 0),
(6225, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61518_15', 0),
(6226, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61320_13', 0),
(6227, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61617_16', 0),
(6228, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61716_17', 0),
(6229, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61419_14', 0),
(6230, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61914_19', 0),
(6231, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61122_11', 0),
(6232, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a61815_18', 0),
(6233, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6249_24', 0),
(6234, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a62112_21', 0),
(6235, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a62211_22', 0),
(6236, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6267_26', 0),
(6237, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6258_25', 0),
(6238, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a62310_23', 0),
(6239, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6303_30', 0),
(6240, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6285_28', 0),
(6241, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a62013_20', 0),
(6242, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6312_31', 0),
(6243, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6294_29', 0),
(6244, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4144_1', 0),
(6245, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6321_32', 0),
(6246, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4441_4', 0),
(6247, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6276_27', 0),
(6248, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4243_2', 0),
(6249, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4540_5', 0),
(6250, '30 Jan, 2020.Veg.0800 - 0900 hrs', '54ca0d925ce7d48b90a21f140532a0a6330_33', 0),
(6251, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4936_9', 0),
(6252, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4639_6', 0),
(6253, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41035_10', 0),
(6254, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4837_8', 0),
(6255, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4738_7', 0),
(6256, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4342_3', 0),
(6257, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41134_11', 0),
(6258, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41431_14', 0),
(6259, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41629_16', 0),
(6260, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41233_12', 0),
(6261, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41728_17', 0),
(6262, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41827_18', 0),
(6263, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42025_20', 0),
(6264, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42124_21', 0),
(6265, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41332_13', 0),
(6266, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41926_19', 0),
(6267, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b41530_15', 0),
(6268, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42223_22', 0),
(6269, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42619_26', 0),
(6270, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42520_25', 0),
(6271, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42421_24', 0),
(6272, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42322_23', 0),
(6273, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42817_28', 0),
(6274, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43015_30', 0),
(6275, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42718_27', 0),
(6276, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43411_34', 0),
(6277, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43114_31', 0),
(6278, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43213_32', 0),
(6279, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43510_35', 0),
(6280, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b42916_29', 0),
(6281, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b43312_33', 0),
(6282, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4405_40', 0),
(6283, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4414_41', 0),
(6284, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4378_37', 0),
(6285, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4396_39', 0),
(6286, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4432_43', 0),
(6287, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4423_42', 0),
(6288, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4450_45', 0),
(6289, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4441_44', 0),
(6290, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4369_36', 0),
(6291, '30 Jan, 2020.Veg.1300 - 1400 hrs', '5d01db173fa8b18445f24a1eed5058b4387_38', 0),
(6292, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319132_1', 0),
(6293, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319429_4', 0),
(6294, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319330_3', 0),
(6295, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319231_2', 0),
(6296, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319528_5', 0),
(6297, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319627_6', 0),
(6298, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319726_7', 0),
(6299, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191122_11', 0),
(6300, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191023_10', 0),
(6301, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191320_13', 0),
(6302, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319825_8', 0),
(6303, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191518_15', 0),
(6304, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191716_17', 0),
(6305, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191221_12', 0),
(6306, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191617_16', 0),
(6307, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191419_14', 0),
(6308, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191815_18', 0),
(6309, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319924_9', 0),
(6310, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3192211_22', 0),
(6311, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3191914_19', 0),
(6312, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3192013_20', 0),
(6313, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319249_24', 0),
(6314, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319276_27', 0),
(6315, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319267_26', 0),
(6316, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319258_25', 0),
(6317, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319285_28', 0),
(6318, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319303_30', 0),
(6319, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319312_31', 0),
(6320, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3192112_21', 0),
(6321, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319330_33', 0),
(6322, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319321_32', 0),
(6323, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe3192310_23', 0),
(6324, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522144_1', 0),
(6325, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522243_2', 0),
(6326, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522342_3', 0),
(6327, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522441_4', 0),
(6328, '30 Jan, 2020.Veg.0800 - 0900 hrs', '23bcc62afa42638ccd45165e062fe319294_29', 0),
(6329, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522540_5', 0),
(6330, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522837_8', 0),
(6331, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522738_7', 0),
(6332, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522639_6', 0),
(6333, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221332_13', 0),
(6334, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221035_10', 0),
(6335, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221134_11', 0),
(6336, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221431_14', 0),
(6337, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221629_16', 0),
(6338, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221728_17', 0),
(6339, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221233_12', 0),
(6340, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221827_18', 0),
(6341, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221530_15', 0),
(6342, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522936_9', 0),
(6343, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222124_21', 0),
(6344, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5221926_19', 0),
(6345, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222421_24', 0),
(6346, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222025_20', 0),
(6347, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222520_25', 0),
(6348, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222223_22', 0),
(6349, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222817_28', 0),
(6350, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222619_26', 0),
(6351, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222718_27', 0),
(6352, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223114_31', 0),
(6353, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223312_33', 0),
(6354, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223015_30', 0),
(6355, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222322_23', 0),
(6356, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223411_34', 0),
(6357, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522378_37', 0),
(6358, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5222916_29', 0),
(6359, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223213_32', 0),
(6360, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522396_39', 0),
(6361, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522369_36', 0),
(6362, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522414_41', 0),
(6363, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522387_38', 0),
(6364, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522405_40', 0),
(6365, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522432_43', 0),
(6366, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf5223510_35', 0),
(6367, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522450_45', 0),
(6368, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522423_42', 0),
(6369, '30 Jan, 2020.Veg.1300 - 1400 hrs', '6e80731d77d413d949280f025bbbf522441_44', 0),
(6370, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec429_4', 0),
(6371, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec132_1', 0),
(6372, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec330_3', 0),
(6373, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec726_7', 0),
(6374, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec627_6', 0),
(6375, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec528_5', 0),
(6376, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1023_10', 0),
(6377, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec924_9', 0),
(6378, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec231_2', 0),
(6379, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1419_14', 0),
(6380, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1320_13', 0),
(6381, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1122_11', 0),
(6382, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec825_8', 0),
(6383, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1221_12', 0),
(6384, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1815_18', 0),
(6385, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1716_17', 0),
(6386, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec2013_20', 0),
(6387, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1617_16', 0),
(6388, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec2112_21', 0),
(6389, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec249_24', 0),
(6390, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec2310_23', 0),
(6391, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec258_25', 0),
(6392, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1518_15', 0),
(6393, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec267_26', 0),
(6394, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec1914_19', 0),
(6395, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec276_27', 0),
(6396, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec294_29', 0),
(6397, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec303_30', 0),
(6398, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec2211_22', 0),
(6399, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6144_1', 0),
(6400, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec312_31', 0),
(6401, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6243_2', 0),
(6402, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6342_3', 0),
(6403, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6441_4', 0),
(6404, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6540_5', 0),
(6405, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec321_32', 0),
(6406, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec285_28', 0),
(6407, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6837_8', 0),
(6408, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6639_6', 0),
(6409, '30 Jan, 2020.Veg.0800 - 0900 hrs', '84f2a6d0136ffac2201daa470ff11cec330_33', 0),
(6410, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee61035_10', 0),
(6411, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6738_7', 0),
(6412, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee61233_12', 0),
(6413, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee6936_9', 0),
(6414, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee61332_13', 0),
(6415, '30 Jan, 2020.Veg.1300 - 1400 hrs', '8fb81ee55871380c5f2f6288c0881ee61134_11', 0),
(6416, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d330_3', 0),
(6417, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d132_1', 0),
(6418, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d429_4', 0),
(6419, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d231_2', 0),
(6420, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d627_6', 0);
INSERT INTO `qr_url` (`qr_id`, `qr_hotel`, `qr_code`, `qr_status`) VALUES
(6421, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d924_9', 0),
(6422, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1023_10', 0),
(6423, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d528_5', 0),
(6424, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d726_7', 0),
(6425, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d825_8', 0),
(6426, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1221_12', 0),
(6427, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1320_13', 0),
(6428, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1122_11', 0),
(6429, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1419_14', 0),
(6430, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1518_15', 0),
(6431, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1716_17', 0),
(6432, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1617_16', 0),
(6433, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1815_18', 0),
(6434, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d2112_21', 0),
(6435, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d2013_20', 0),
(6436, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d2211_22', 0),
(6437, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d258_25', 0),
(6438, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d1914_19', 0),
(6439, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d2310_23', 0),
(6440, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d249_24', 0),
(6441, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d267_26', 0),
(6442, '30 Jan, 2020.Veg.0800 - 0900 hrs', 'fa10714210afd6630efee3d40aed1d9d276_27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin_rights`
--

CREATE TABLE `sub_admin_rights` (
  `sa_id` int(11) NOT NULL,
  `sa_name` varchar(100) NOT NULL,
  `sa_rights` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_admin_rights`
--

INSERT INTO `sub_admin_rights` (`sa_id`, `sa_name`, `sa_rights`) VALUES
(1, 'Sayanatni', 'r21-r25-r32-r11'),
(2, 'Sayantani', 'r25-r21-r33'),
(3, 'Sayantani', 'r32-r13-r24-r21'),
(4, 'Sayantani', 'r21-r25-r32-r11');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL,
  `time_time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time_time`) VALUES
(11, '0000 - 0100 hrs'),
(12, '0100 - 0200 hrs'),
(13, '0200 - 0300 hrs'),
(14, '0300 - 0400 hrs'),
(15, '0400 - 0500 hrs'),
(16, '0500 - 0600 hrs'),
(17, '0600 - 0700 hrs'),
(18, '0700 - 0800 hrs'),
(19, '0800 - 0900 hrs'),
(20, '0900 - 1000 hrs'),
(21, '1000 - 1100 hrs'),
(22, '1100 - 1200 hrs'),
(23, '1200 - 1300 hrs'),
(24, '1300 - 1400 hrs'),
(25, '1400 - 1500 hrs'),
(26, '1500 - 1600 hrs'),
(27, '1600 - 1700 hrs'),
(28, '1700 - 1800 hrs'),
(29, '1800 - 1900 hrs'),
(30, '1900 - 2000 hrs'),
(31, '2000 - 2100 hrs'),
(32, '2100 - 2200 hrs'),
(33, '2200 - 2300 hrs'),
(34, '2300 - 0000 hrs');

-- --------------------------------------------------------

--
-- Table structure for table `travel_agents`
--

CREATE TABLE `travel_agents` (
  `ta_id` varchar(20) NOT NULL,
  `ta_com_name` varchar(200) NOT NULL,
  `ta_name` varchar(200) NOT NULL,
  `ta_email` varchar(200) NOT NULL,
  `ta_password` varchar(200) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `ta_phn_code` int(11) NOT NULL,
  `ta_phn` varchar(20) NOT NULL,
  `ta_doc` varchar(500) NOT NULL,
  `ta_registerd_on` datetime DEFAULT current_timestamp(),
  `ta_status` int(10) NOT NULL DEFAULT 0 COMMENT '1 = Registered; 0 = Not Registered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_agents`
--

INSERT INTO `travel_agents` (`ta_id`, `ta_com_name`, `ta_name`, `ta_email`, `ta_password`, `ta_phn_code`, `ta_phn`, `ta_doc`, `ta_registerd_on`, `ta_status`) VALUES
('3', 'Company', 'Sayantani', 'asfaefj@jkafh.sdkhj', 'e10adc3949ba59abbe56e057f20f883e', 91, '1234567890', '0', '2020-02-14 17:49:31', 0),
('4', 'Company', 'Sanny', 'sadfjal@jkad.asdjkfh', 'e10adc3949ba59abbe56e057f20f883e', 91, '3463534536', '0', '2020-02-14 17:50:35', 0),
('ajsfh', 'Company', 'Sanny', 'sadfjal@jkad.asdjkfh', 'e10adc3949ba59abbe56e057f20f883e', 91, '3463534536', '0', '2020-02-14 17:50:48', 0),
('STIAG12725786', 'JetSetGrow', 'Bhushan R.', 'wazzongrass@gmail.com', '53b16adabb835ea1ca4f23f676c82a57', 91, '7700024490', 'assets/documents/sti1.jpg', '2020-01-29 09:01:38', 1),
('STIAG64801394', 'Pankaj Travels', 'Pankaj', 'pk@g.com', '7d8ceae341b3961ee38a996ebe418bcf', 91, '7908024082', 'assets/documents/adult-adventure-backpack-1483024.jpg', '2020-01-29 15:22:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `v_id` int(10) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_phone_code` int(11) NOT NULL,
  `v_phone` varchar(15) NOT NULL,
  `v_email` varchar(200) NOT NULL,
  `v_password` varchar(200) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `v_destination` varchar(200) NOT NULL,
  `v_purpose` varchar(100) NOT NULL,
  `v_remarks` varchar(1000) NOT NULL DEFAULT '0',
  `a_remarks` varchar(1000) NOT NULL DEFAULT '0',
  `v_docs` varchar(200) NOT NULL DEFAULT '0',
  `v_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = new, 1 = seen',
  `v_request` int(11) NOT NULL DEFAULT 0 COMMENT '0 = null, 1 = accepted, 2 = verified, 3 = processing, 4 = shipped',
  `v_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`v_id`, `v_name`, `v_phone_code`, `v_phone`, `v_email`, `v_password`, `v_destination`, `v_purpose`, `v_remarks`, `a_remarks`, `v_docs`, `v_status`, `v_request`, `v_type`) VALUES
(33, 'Rohit SIngh', 91, '9647513679', 'sd@g.com', '245159c260ab9af62becc5cc6172b835', '18', 'Tourist Visa', 'zdfasrfawr', 'nhfghfghf', 'assets/documents/document (7).xls', 1, 3, 0),
(37, 'Rohit SInghh', 91, '9647513679', 'sf@g.com', 'a236d80b29b5bde12e9359cfd11f158d', '18', 'Tourist Visa', '0', 'askfbfae', '0', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visa_con`
--

CREATE TABLE `visa_con` (
  `visa_id` int(11) NOT NULL,
  `visa_about` text NOT NULL,
  `visa_business` text NOT NULL,
  `visa_tourist` text NOT NULL,
  `visa_transit` text NOT NULL,
  `visa_employment` text NOT NULL,
  `visa_electronic` text NOT NULL,
  `visa_time` text NOT NULL,
  `visa_ref` text NOT NULL,
  `visa_link` text NOT NULL,
  `visa_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_con`
--

INSERT INTO `visa_con` (`visa_id`, `visa_about`, `visa_business`, `visa_tourist`, `visa_transit`, `visa_employment`, `visa_electronic`, `visa_time`, `visa_ref`, `visa_link`, `visa_status`) VALUES
(1, 'AFGHANISTHAN', '', '', '', '', '', '', '', '', 1),
(2, '', '', '', '', '', '', '', '', '', 0),
(3, '', '', '', '', '', '', '', '', '', 0),
(4, '', '', '', '', '', '', '', '', '', 0),
(5, '', '', '', '', '', '', '', '', '', 0),
(6, '', '', '', '', '', '', '', '', '', 0),
(7, '', '', '', '', '', '', '', '', '', 0),
(8, '', '', '', '', '', '', '', '', '', 1),
(9, '', '', '', '', '', '', '', '', '', 0),
(10, 'Consulate General and Promotion Centre of the Argentine Republic,  $ Chandra Mukhi, 10th Floor, Nariman Point, Mumbai. Tel. 22871381 / 82 / 83   $ E-mail: visa@cgmum.co.in | Website: http://cgmum.mrecic.gov.ar', '2 Original Visa Application Forms - print on separate page - should not be back to back and also typed visa form will not be accepted and to be filled in blue pen   $ Original Passport (Old & New) valid for 6 months and also require passport copy 1st and last page 2 sets   $ 2 Recent Photos [4 cm x 4 cm white background, 80% face to be seen - showing front] (Photographs should not be old for more than 6 months)   $ Covering letter with 10 line briefing about the company in English and the same needs to be translated in Spanish language. - Download SAMPLE letter  $ Require bank statements for 6 months in original with seal and sign and name and account  $ Air Ticket   $ Invitation letter from Argentina IN English and Spanish in Original which should be notarized and also require RENNURE no   $ Letter from Chamber of Commerce and also translated in Spanish or Clear copy of the Indian company registration copy   $ Hotel Confirmation with guest name, check-in, check-out details, payment confirmation details and hotel name and address.   $ Salary slip for the last 3 months   $ Copy of Income tax papers for the last 3 years   $ Insurance', '2 Original Visa Application Forms - print on separate page - should not be back to back and also typed visa form will not be accepted and to be filled in blue pen   $ Original Passport (Old & New) valid for 6 months and also require passport copy 1st and last page 2 sets   $ 2 Recent Photos [4 cm x 4 cm white background, 80% face to be seen - showing front] (Photographs should not be old for more than 6 months)   $ Personal covering letter (detailed), also needs to be translated into Spanish   $ Leave letter from company on company letterhead   $ Hotel Confirmation with guest name, check-in, check-out details, payment confirmation details and hotel name and address.   $ Require bank statements for 6months in original with seal and sign and name and account  $ Air Ticket   $ Salary slip for the last 3 months   $ Copy of Income tax papers for the last 3 years   $ Insurance   $ Copy of Credit Card', 'Not Available', 'Not Available', 'Only for Passport holder of India, Nepal and Maldives, For TOURISM Purpose Only   $ For the holders of Valid B2 US Visa (Valid for 6 months) OR   $ For the holders of valid Category C Schengen Visa (Valid for 6 months)  $ Validity of ETA will be 3 Months from date of issue  $ Stay Period will be 3 Months with multiple Entry/Exit  $ Fees for ETA will be USD $ 50   $ Processing Time of ETA is 20 working Days   $ For more information and to start the process: http://www.migraciones.gov.ar/ave/index.htm  $ For any query please write us to email: ave@migraciones.gov.ar', 'Appointment need to be taken with the Consulate after showing the documents and applicant might have to come personal interview after interview done and payment done through NEFT  take 8 to 10 Working Days.', '<a target=\"_blank\" href=\"https://www.royalservices.in/vi/argentina.html\">https://www.royalservices.in/vi/argentina.html</a>', '<a target=\"_blank\" href=\"https://www.royalservices.in/vf/Argentina%20fsv-2019-neutro.pdf\">https://www.royalservices.in/vf/Argentina%20fsv-2019-neutro.pdf</a>\r\n$ <a target=\"_blank\" href=\"https://www.royalservices.in/vf/Argentina%20fsv-2019-neutro.pdf\">https://www.royalservices.in/vf/Argentina%20fsv-2019-neutro.pdf</a>', 1),
(11, '', '', '', '', '', '', '', '', '', 0),
(12, '', '', '', '', '', '', '', '', '', 0),
(13, 'VFS: Urmi Axis Bldg., 2nd Floor, Behind Famous Studio, Opp. E. Moses Road, Mahalaxmi (W), Mumbai 400011 Tel. 022-67866006 | Website: www.vfs-au-in.com  VFS: G Block, 1st Floor, Trade Centre Tower, Brandra-Kurla Complex, Bandra (W), Mumbai 400051 | Tel.: 022-6786 6053', 'Business Visa  Duly filled one Form No. 1415,  Form No. 956 ( duly filled - should be typed with agent details OR handwritten but should be neat and readable )  2 Recent Photos, 35mm x 45mm, 80% of the face should be seen (Photographs should not be old for more than 6 months)  Covering letter in Company letterhead with seal and address and contact number [ Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses  - Download SAMPLE letter.  Invite letter in Company letterhead with seal and address and contact number [ Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses.  Updated Bank statement for the last 6 months with applicant\'s name, a/c no. with bank seal & sign  Xerox copies of Income Tax Papers last 03 years.  NOTARIZED COPIES OF PASSPORTS (OLD & NEW - ALL USED & UNUSED PAGES) IS MUST.', 'Tourist Visa  Duly filled one form No. 1419  1 Personal Particular Form  Form No. 956 ( duly filled - should be typed with agent details OR handwritten but should be neat and readable )  2 Recent Photos, 35mm x 45mm, 80% of the face should be seen (Photographs should not be old for more than 6 months)  Covering letter  Xerox copies of Income Tax Papers last 3 years  Updated Bank statement for the last 6 months with applicant\'s name, a/c no. with bank seal & sign  Employers Leave Certificate.  If sponsored by somebody from Australia for a a tourist visa, then require passport copy, financial document and Invitation letter from the sponsor  NOTARIZED COPIES OF PASSPORTS (OLD & NEW - ALL USED & UNUSED PAGES) IS MUST.  Health Insurance must if above 70 years. (ALL PAX ABOVE 70 YRS. TO GO THROUGH MEDICALS).', 'Not Available', 'Not Available', 'Not Available', 'Not Available', 'Not Available', 'Not Available', 1),
(14, 'aMBASSY OF aUSTRIA\r\nAddress : EP-13, Chandragupta Marg, New Delhi, Tel : 24192700, Fax : 26886929\r\nEmail : new-delhi-ob@bmeia.gv.at , new-delhi-ka@bmeia.gv.at\r\nWeb: www.vfs-austria.co.in\r\n\r\nVFS : Trade Centre, 3rd Floor, â€œGâ€ Block,\r\nBandra Kurla Complex, Bandra (East), Mumbai-400051\r\nWebsite: www.vfs-austria.co.in\r\n\r\nEffective 02 November 2015, Indian citizens applying a Schengen visa will have to appear in person in order to provide biometric data (fingerprints and digital photography).  \r\n\r\n \r\n\r\nThe subsequent application to a Schengen Countries (after the first application effective 02 Nov 2015) for next 5 years, need not appear in person for biometric.\r\n\r\nâ€‹There are certain exemptions as follows:\r\n\r\nÂ·         Children under 12\r\n\r\nÂ·         Persons for whom the collection of fingerprints is physically impossible\r\n\r\nÂ·         Sovereigns and other senior members of a royal family, Heads of State and members of the national Governments with their official delegations and spouses) if they travel for official purposes.\r\n\r\n \r\n\r\nSchengen States Consulate require Approved list of Indian Travel Insurance Companies Providing Travel Medical Insurance For Schengen Visa. Apollo Munich , Bajaj Allianz , HDFC Ergo , ICICI Lombard , IFFCO Tokyo, Future Generali, National, Reliance, Tata AIG, Oriental Insurance Company.', 'AUSTRIA Business Visa Requirements \r\n\r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - Form duly filled and signed at by applicant \r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Embassy of Austria, New Delhi) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Invitation letter in Company letterhead with seal and address and contact number, Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses.\r\n6.	Confirmed Return Ticket.\r\n7.	If Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id)\r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n1.	Income Tax Paper Last 3 years.\r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.', 'AUSTRIA Tourist Visa Requirements \r\n\r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - 1 Form duly filled and signed at by applicant \r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Embassy of Austria, New Delhi) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Confirmed Return Ticket.\r\n6.	If Booked Tours or Package â€“ Day to Day Itinerary with Tour Confirmation,\r\n7.	If Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id)\r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n9.	Income Tax Paper Last 3 years.\r\n10.	Fixed Assets â€“ Fix Deposit, Share Certificate, Home Agreement, \r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.\r\n', 'trt', 'NA', 'NA', 'PROCESSING tIME : 15 Working Day', 'NA', '', 1),
(15, '', '', '', '', '', '', '', '', '', 0),
(16, '', '', '', '', '', '', '', '', '', 0),
(17, '', '', '', '', '', '', '', '', '', 0),
(18, 'Consulate General of Bangladesh\r\nAddress : Bunglow no. 8, Jolly Maker 3, J. D. Somani Road, Cuff Parade, Mumbai 400005.\r\nTel. 022-22180101, Website: www.mofa.gov.bd,\r\n', 'BANGLADESH Business Visa Requirements \r\n\r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - Form duly filled and signed at by applicant \r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Consulate General of Bangladesh, New Delhi) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Invitation letter in Company letterhead with seal and address and contact number, Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses.\r\n6.	Confirmed Return Ticket.\r\n7.	Visiting Card of the applicant or the company ID copy\r\n8.	If Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id)\r\n9.	Bank Statements last 6 months with branch address and telephone numbers.\r\n10.	Income Tax Paper Last 3 years.\r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.', '', 'trt', '', '', 'Processing Time : Expected 7 calendar Days', '', '', 1),
(19, '', '', '', '', '', '', '', '', '', 0),
(20, '', '', '', '', '', '', '', '', '', 0),
(21, 'Consulate General of Belgium \r\nAddress : TCG Financial Centre, 7th Flr, C-53, G Block, Bandra-Kurla Complex, Bandra (E), Mumbai 400 051   Tel.: 2652 1016 / 17 / 19 Website: www.diplomati.belgium.be/india\r\n\r\nEffective 02 November 2015, Indian citizens applying a Schengen visa will have to appear in person in order to provide biometric data (fingerprints and digital photography).  \r\n\r\nThe subsequent application to a Schengen Countries (after the first application effective 02 Nov 2015) for next 5 years, need not appear in person for biometric.\r\n\r\nâ€‹There are certain exemptions as follows:\r\n\r\nÂ·         Children under 12\r\n\r\nÂ·         Persons for whom the collection of fingerprints is physically impossible\r\n\r\nÂ·         Sovereigns and other senior members of a royal family, Heads of State and members of the national Governments with their official delegations and spouses) if they travel for official purposes.\r\n\r\nSchengen States Consulate require Approved list of Indian Travel Insurance Companies Providing Travel Medical Insurance For Schengen Visa. Apollo Munich , Bajaj Allianz , HDFC Ergo , ICICI Lombard , IFFCO Tokyo, Future Generali, National, Reliance, Tata AIG, Oriental Insurance Company.\r\n\r\n', 'BELGIUM Business Visa Requirements \r\n\r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - Online Visa Form duly filled and signed at by applicant \r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Consulate General of Belgium, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Invitation letter in Company letterhead with seal and address and contact number, Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses.\r\n6.	Confirmed Return Ticket.\r\n7.	If Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id)\r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n1.	Income Tax Paper Last 3 years.\r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.', 'BELGIUM Tourist Visa Requirements \r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - duly filled and signed at by applicant.\r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Consulate General of Belgium, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id) with Day to Day Itinerary, \r\n6.	Confirmed Return Ticket.\r\n7.	Travel Insurance Policy \r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n9.	Income Tax Paper last 03 Years\r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.\r\n', 'trt', '', '', 'Processing Time : 03 Working Days', '', '', 1),
(22, '', '', '', '', '', '', '', '', '', 0),
(23, '', '', '', '', '', '', '', '', '', 0),
(24, '', '', '', '', '', '', '', '', '', 0),
(25, '', '', '', '', '', '', '', '', '', 0),
(26, 'sdsdasaf', 'dcdfdfdsf', 'sfsdfsdf', 'trt', 'sdfdfsdfsdf', 'e-visa', '24 hours', 'sdsadasd', '', 1),
(27, '', '', '', '', '', '', '', '', '', 0),
(28, '', '', '', '', '', '', '', '', '', 0),
(29, '', '', '', '', '', '', '', '', '', 0),
(30, 'Consulate General of Belgium\r\nUnit 12/B, 12th Floor, Bakhtawar Bldg, Nariman Point, Mumbai - 400021, Tel : 2283 4467 / 69 Email: cg.mumbai@itamaraty.gov.br, Website: http://mumbai.itamaraty.gov.br/en-us/\r\n\r\nOnly Passports Issued in  MAHARASHTRA, GOA and KARNATAKA states applications are accepted here in Mumbai consulate and for rest have to provide additional stay proof like updated Electricity bill, telephone bill or lease agreement copy. \r\n\r\nWhile traveling to Brazil, applicant has to carry the yellow fever vaccination.', 'BRAZIL Business Visa Requirements\r\n1.	Online Application Form:- Visa Form to fill online at website address ,must aplod sing , photo ,air ticket,invitation bank statement ,and passport copy(sign has to be in blue ink only) https://formulario-mre.serpro.gov.br/sci/pages/web/pacomPasesWebInicial.jsf\r\n2.	Passport with validity of minimum 6 months ( Handwritten passport is not allowed ) All Old Passports also required\r\n3.	Photo:- 2 photos 35mm x 45mm, 80% face appearance, white back ground, glossy finish\r\n4.	Notarized Original Invitation Letter has to be in English and Portugal language with CNPJ No. mentioned in it (mandatory to submit in both the languages) mentioning that he/she is very much aware of the business clause Norms and Regulations will neither engage in any kind of Technical work out there nor share or receive any sort of Technical knowledge.\r\n5.	Covering Letter (Addressed to The Consulate General of Brazil, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, with authority person sing and company seal\r\n6.	Personal Bank Statement for lat 06 months updated till date with Minimum Balance of Rs. 1 lacs or above , duly signed and stamped by bank on all pages.\r\n7.	For child traveling with one of the parents will have to give an affidavit of Authorization attested and Notarized by Mantralaya which is attached (Minor Authorization form) with birth certificate notary mantralaya\r\n8.	Ticket itinerary with atleast 10 working days gap from the submission.\r\n9.	Company Registration, Company memo, partnership deal, establishment license or proprietorship etc are required. Copy\r\n\r\nNote\r\n\r\nPax can be called personally for interview, if required by the Consular.\r\n\r\nApart from the above mentioned category visa, please apply for the other category visa from the Consulate General of Brazil, Mumbai.\r\n\r\nEngineers and Software Consultants may be refused Business Visa and ask to apply for Type 5 Visa. \r\n\r\nWith Effect From 12-Jan-2015, The Embassy of Brazil has made it mandatory to upload all documents while filling up the on line form, else embassy will not accept any visa application\r\n', 'BRAZIL Tourist Visa Requirements \r\n\r\n1.	Online Application Form:- Visa Form to fill online at website address ,must aplod sing , photo ,air ticket,invitation bank statement ,and passport copy(sign has to be in blue ink only) https://formulario-mre.serpro.gov.br/sci/pages/web/pacomPasesWebInicial.jsf\r\n2.	Passport: - Original Valid Passport  and all old passport(Handwritten passport is not allowed)\r\n3.	Photo: - 2 photographs - 35mm x 45mm, White back ground, Glossy finish, 80% face appearance\r\n4.	Confirmed Return Ticket\r\n5.	Covering Letter (Addressed to The Consulate General of Brazil, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, with authority person seal and sing\r\n6.	Original Updated Personal Bank statement of last 6 months, Bal. 1 Lack above with Bank Name, Seal and Signature\r\n7.	For child traveling with one of the parents will have to give an affidavit of Authorization attested and Notarized by Mantralaya which is attached (Minor Authorization form) with birth certificate hotey mantralaya\r\n8.	Hotel as per Ticket\r\n9.	Day to day Schedule\r\n10.	In case of Employee - leave letter on company letter head with company seal Pay slip of last 3 months.\r\n11.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n\r\nNote\r\n\r\nPax can be called personally for interview, if required by the Consular.\r\n\r\nApart from the above mentioned category visa, please apply for the other category visa from the Consulate General of Brazil, Mumbai.\r\n\r\nWith Effect From 12-Jan-2015, The Consulate of Brazil has made it mandatory to upload all documents while filling up the on line form, else Consulate will not accept any visa application.\r\n', 'trt', '', '', 'Processing Time : 10 to 12 WORKING DAYS\r\n', '', '', 1),
(31, '', '', '', '', '', '', '', '', '', 0),
(32, '', '', '', '', '', '', '', '', '', 0),
(33, '', '', '', '', '', '', '', '', '', 0),
(34, '', '', '', '', '', '', '', '', '', 0),
(35, '', '', '', '', '', '', '', '', '', 0),
(36, '', '', '', '', '', '', '', '', '', 0),
(37, '', '', '', '', '', '', '', '', '', 0),
(38, 'Canadian High Commission\r\nHigh Commission : Canadian High Commission, 7/8 Shantipath Chanakyapuri New Delhi , India 110021, \r\n\r\nVFS : Trade Centre, 3rd Floor, â€œGâ€ Block, Bandra Kurla Complex, Bandra (East), Mumbai-400051 Tel. 6786 6002\r\nWebsite: https://www.vfsglobal.ca/canada/india/\r\n\r\nEffective 03 November 2018, prior appointment is mandatory for Biometric Enrolment at all the Canada Visa Application Centres (CVAC) in India. Depending on your nationality, you may already need to give biometrics.\r\n\r\nPlease note that appointments are mandatory in order to enroll biometrics at the Visa Application Centre. A planned visit with a preferred time slot at the Visa Application Centre guarantees prompt service thus eliminating longer waiting time resulting in inconvenience.', '\r\nCANADA Business Visa Requirements \r\n\r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - Online Visa Form duly filled and signed at by applicant \r\n3.	Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Canadian High Commission, New Delhi) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Invitation letter in Company letterhead with seal and address and contact number, Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses.\r\n6.	Confirmed Return Ticket.\r\n7.	If Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id)\r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n9.	Income Tax Paper Last 3 years.\r\n10.	Any Fixed Deposit\r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.\r\n', '\r\nCANADA Tourist Visa Requirements \r\n1.	Passport: - Valid passport not be older than 10 years, must be valid at least THREE MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.\r\n2.	Application Form: - Visa form to be filled online from the VSF website https://www.vfsglobal.ca/canada/india/ - 2 set of visa forms and applicant has to sign in both.\r\n3.	Photo:- 4 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling [without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background\r\n4.	Covering Letter (Addressed to Canadian High Commission, New Delhi) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, expenses clause .Details of all Applicants with name, passport number, If Applicable\r\n5.	Confirmed Hotel as per the ticket sectors (with hotel Name, Address, Telephone no and Email. Id) with Day to Day Itinerary, \r\n6.	Confirmed Return Ticket.\r\n7.	Travel Insurance Policy \r\n8.	Bank Statements last 6 months with branch address and telephone numbers.\r\n9.	Income Tax Paper last 03 Years\r\n10.	Any Fixed Deposit, \r\nOccupation proof\r\n1.	In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.\r\n2.	In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.\r\n3.	If the applicant is sponsored - proof of sponsorship and/or private accommodation by completing a national form of the Schengen State concerned (seethe website of the Member State of destination)\r\n4.	If the applicant is retired- Proof of retirement, pension statements for the last three months; - proof of regular income generated by ownership of property or business.\r\n', 'trt', '', '', 'processing time : 25 - 30 days', '', '', 1),
(39, '', '', '', '', '', '', '', '', '', 0),
(40, '', '', '', '', '', '', '', '', '', 0),
(41, '', '', '', '', '', '', '', '', '', 0),
(42, '', '', '', '', '', '', '', '', '', 0),
(43, '', '', '', '', '', '', '', '', '', 0),
(44, '', '', '', '', '', '', '', '', '', 0),
(45, '', '', '', '', '', '', '', '', '', 0),
(46, '', '', '', '', '', '', '', '', '', 0),
(47, '', '', '', '', '', '', '', '', '', 0),
(48, '', '', '', '', '', '', '', '', '', 0),
(49, '', '', '', '', '', '', '', '', '', 0),
(50, '', '', '', '', '', '', '', '', '', 0),
(51, '', '', '', '', '', '', '', '', '', 0),
(52, '', '', '', '', '', '', '', '', '', 0),
(53, '', '', '', '', '', '', '', '', '', 0),
(54, '', '', '', '', '', '', '', '', '', 0),
(55, '', '', '', '', '', '', '', '', '', 0),
(56, '', '', '', '', '', '', '', '', '', 0),
(57, '', '', '', '', '', '', '', '', '', 0),
(58, '', '', '', '', '', '', '', '', '', 0),
(59, '', '', '', '', '', '', '', '', '', 0),
(60, '', '', '', '', '', '', '', '', '', 0),
(61, '', '', '', '', '', '', '', '', '', 0),
(62, '', '', '', '', '', '', '', '', '', 0),
(63, '', '', '', '', '', '', '', '', '', 0),
(64, '', '', '', '', '', '', '', '', '', 0),
(65, '', '', '', '', '', '', '', '', '', 0),
(66, '', '', '', '', '', '', '', '', '', 0),
(67, '', '', '', '', '', '', '', '', '', 0),
(68, '', '', '', '', '', '', '', '', '', 0),
(69, '', '', '', '', '', '', '', '', '', 0),
(70, '', '', '', '', '', '', '', '', '', 0),
(71, '', '', '', '', '', '', '', '', '', 0),
(72, '', '', '', '', '', '', '', '', '', 0),
(73, '', '', '', '', '', '', '', '', '', 0),
(74, '', '', '', '', '', '', '', '', '', 0),
(75, '', '', '', '', '', '', '', '', '', 0),
(76, '', '', '', '', '', '', '', '', '', 0),
(77, '', '', '', '', '', '', '', '', '', 0),
(78, '', '', '', '', '', '', '', '', '', 0),
(79, '', '', '', '', '', '', '', '', '', 0),
(80, '', '', '', '', '', '', '', '', '', 0),
(81, '', '', '', '', '', '', '', '', '', 0),
(82, '', '', '', '', '', '', '', '', '', 0),
(83, '', '', '', '', '', '', '', '', '', 0),
(84, '', '', '', '', '', '', '', '', '', 0),
(85, '', '', '', '', '', '', '', '', '', 0),
(86, '', '', '', '', '', '', '', '', '', 0),
(87, '', '', '', '', '', '', '', '', '', 0),
(88, '', '', '', '', '', '', '', '', '', 0),
(89, '', '', '', '', '', '', '', '', '', 0),
(90, '', '', '', '', '', '', '', '', '', 0),
(91, '', '', '', '', '', '', '', '', '', 0),
(92, '', '', '', '', '', '', '', '', '', 0),
(93, '', '', '', '', '', '', '', '', '', 0),
(94, '', '', '', '', '', '', '', '', '', 0),
(95, '', '', '', '', '', '', '', '', '', 0),
(96, '', '', '', '', '', '', '', '', '', 0),
(97, '', '', '', '', '', '', '', '', '', 0),
(98, '', '', '', '', '', '', '', '', '', 0),
(99, '', '', '', '', '', '', '', '', '', 0),
(100, '', '', '', '', '', '', '', '', '', 0),
(101, '', '', '', '', '', '', '', '', '', 0),
(102, '', '', '', '', '', '', '', '', '', 0),
(103, '', '', '', '', '', '', '', '', '', 0),
(104, '', '', '', '', '', '', '', '', '', 0),
(105, '', '', '', '', '', '', '', '', '', 0),
(106, '', '', '', '', '', '', '', '', '', 0),
(107, '', '', '', '', '', '', '', '', '', 0),
(108, '', '', '', '', '', '', '', '', '', 0),
(109, '', '', '', '', '', '', '', '', '', 0),
(110, '', '', '', '', '', '', '', '', '', 0),
(111, '', '', '', '', '', '', '', '', '', 0),
(112, '', '', '', '', '', '', '', '', '', 0),
(113, '', '', '', '', '', '', '', '', '', 0),
(114, '', '', '', '', '', '', '', '', '', 0),
(115, '', '', '', '', '', '', '', '', '', 0),
(116, '', '', '', '', '', '', '', '', '', 0),
(117, '', '', '', '', '', '', '', '', '', 0),
(118, '', '', '', '', '', '', '', '', '', 0),
(119, '', '', '', '', '', '', '', '', '', 0),
(120, '', '', '', '', '', '', '', '', '', 0),
(121, '', '', '', '', '', '', '', '', '', 0),
(122, '', '', '', '', '', '', '', '', '', 0),
(123, '', '', '', '', '', '', '', '', '', 0),
(124, '', '', '', '', '', '', '', '', '', 0),
(125, '', '', '', '', '', '', '', '', '', 0),
(126, '', '', '', '', '', '', '', '', '', 0),
(127, '', '', '', '', '', '', '', '', '', 0),
(128, '', '', '', '', '', '', '', '', '', 0),
(129, '', '', '', '', '', '', '', '', '', 0),
(130, '', '', '', '', '', '', '', '', '', 0),
(131, '', '', '', '', '', '', '', '', '', 0),
(132, '', '', '', '', '', '', '', '', '', 0),
(133, '', '', '', '', '', '', '', '', '', 0),
(134, '', '', '', '', '', '', '', '', '', 0),
(135, '', '', '', '', '', '', '', '', '', 0),
(136, '', '', '', '', '', '', '', '', '', 0),
(137, '', '', '', '', '', '', '', '', '', 0),
(138, '', '', '', '', '', '', '', '', '', 0),
(139, '', '', '', '', '', '', '', '', '', 0),
(140, '', '', '', '', '', '', '', '', '', 0),
(141, '', '', '', '', '', '', '', '', '', 0),
(142, '', '', '', '', '', '', '', '', '', 0),
(143, '', '', '', '', '', '', '', '', '', 0),
(144, '', '', '', '', '', '', '', '', '', 0),
(145, '', '', '', '', '', '', '', '', '', 0),
(146, '', '', '', '', '', '', '', '', '', 0),
(147, '', '', '', '', '', '', '', '', '', 0),
(148, '', '', '', '', '', '', '', '', '', 0),
(149, '', '', '', '', '', '', '', '', '', 0),
(150, '', '', '', '', '', '', '', '', '', 0),
(151, '', '', '', '', '', '', '', '', '', 0),
(152, '', '', '', '', '', '', '', '', '', 0),
(153, '', '', '', '', '', '', '', '', '', 0),
(154, '', '', '', '', '', '', '', '', '', 0),
(155, '', '', '', '', '', '', '', '', '', 0),
(156, '', '', '', '', '', '', '', '', '', 0),
(157, '', '', '', '', '', '', '', '', '', 0),
(158, '', '', '', '', '', '', '', '', '', 0),
(159, '', '', '', '', '', '', '', '', '', 0),
(160, '', '', '', '', '', '', '', '', '', 0),
(161, '', '', '', '', '', '', '', '', '', 0),
(162, '', '', '', '', '', '', '', '', '', 0),
(163, '', '', '', '', '', '', '', '', '', 0),
(164, '', '', '', '', '', '', '', '', '', 0),
(165, '', '', '', '', '', '', '', '', '', 0),
(166, '', '', '', '', '', '', '', '', '', 0),
(167, '', '', '', '', '', '', '', '', '', 0),
(168, '', '', '', '', '', '', '', '', '', 0),
(169, '', '', '', '', '', '', '', '', '', 0),
(170, '', '', '', '', '', '', '', '', '', 0),
(171, '', '', '', '', '', '', '', '', '', 0),
(172, '', '', '', '', '', '', '', '', '', 0),
(173, '', '', '', '', '', '', '', '', '', 0),
(174, '', '', '', '', '', '', '', '', '', 0),
(175, '', '', '', '', '', '', '', '', '', 0),
(176, '', '', '', '', '', '', '', '', '', 0),
(177, '', '1. Passport: - Valid passport not be older than 10 years, must be valid at least SIX MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.  2. Application Form: - Form duly filled and Signature  3. Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background  4. Covering Letter (Addressed to The Consulate General of Russia, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, hotel details, expenses clause .Details of all Applicants with name, passport number, If Applicable  5. The official invitation issued by the Federal Migration Service of the Russian Federation on request of a Russian receiving organization / company in original only sent to an applicant by post or courier. Faxed and scanned copies are not accepted.  or  Original Invitation Letter from ministry of foreign affair mostly if it is a Multiple entry visa or Colour copy Invite in Company letterhead with seal and address and contact number [ Details like travel dates in and out, passport number, designation, a brief company profile and other details about trip and expenses..   6. Return Ticket Itinerary  Occupation proof  7. In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.  8. In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.Russia Visa Fees and Processing Days    02 to 03 Working Days Single Entry Fees Rs. 3960/-     01 to 02 Working Days Single Entry Fees Rs. 6090/-    02 to 03 Working Days Double Entry Fees Rs. 5238/-    01 to 02 Working Days Double Entry Fees Rs. 8646/-    04 to 10 Working Days Multiple Entry Fees Rs. 8220/-    03 to 04 Working Days Multiple Entry Fees Rs. 14,610/-', '1. Passport: - Valid passport not be older than 10 years, must be valid at least SIX MONTHS longer than the intended stay. The passport must also have at least TWO BLANK PAGES to affix the visa along with all old passport booklets. Handwritten passports, Passports with observation and passports of 20-year validity are NOT acceptable.  2. Application Form: - Form duly filled and Signature  3. Photo:- 2 Recent Colored Photograph (Fresh ones i.e. NOT used earlier for any visa) should be: - 35mm x 45mm in dimension, On matte finish paper, With White background, With 80% face coverage, non-smiling without sunglasses, a hat/cap or other head covering, unless the applicant wears such items because of their religious belief or ethnic background  4. Covering Letter (Addressed to The Consulate General of Russia, Mumbai) on Letter Head with brief Company details, with mentioning duration of visit, purpose of visit, hotel details, expenses clause .Details of all Applicants with name, passport number, If Applicable  5. The original tourist/hotel voucher issued by a Russian tourist agency/hotel, which is registered with the Ministry of Foreign Affairs (MFA) of the Russian Federation containing the necessary data of a traveler (name, date of birth, etc.), period of stay (date of entry and departure), name of receiving Russian travel agency, list of services paid for (transportation, accommodation, sightseeing, etc.), signed by a representative of the tourist agency, stamped with the agency\'s seal and bearing an official MFA reference number. Good quality copies are accepted. Or the original hotel confirmation.   6. Return Ticket Itinerary  Occupation proof  7. In case of Employee -Proof of employment (employment certificate/NOC) and Pay slip of last 3 months.  8. In case applicant is the proprietor / owner of the company-,Cover letter on company`s letter head ,company`s Original 3 month`s bank statement (with bank seal and signature), proof of paid income tax (for 3 years), company memo, partnership deal, establishment license or proprietorship etc are required.', '', '', '', '', '', '', 0),
(178, '', '', '', '', '', '', '', '', '', 0),
(179, '', '', '', '', '', '', '', '', '', 0),
(180, '', '', '', '', '', '', '', '', '', 0),
(181, '', '', '', '', '', '', '', '', '', 0),
(182, '', '', '', '', '', '', '', '', '', 0),
(183, '', '', '', '', '', '', '', '', '', 0),
(184, '', '', '', '', '', '', '', '', '', 0),
(185, '', '', '', '', '', '', '', '', '', 0),
(186, '', '', '', '', '', '', '', '', '', 0),
(187, '', '', '', '', '', '', '', '', '', 0),
(188, '', '', '', '', '', '', '', '', '', 0),
(189, '', '', '', '', '', '', '', '', '', 0),
(190, '', '', '', '', '', '', '', '', '', 0),
(191, '', '', '', '', '', '', '', '', '', 0),
(192, '', '', '', '', '', '', '', '', '', 0),
(193, '', '', '', '', '', '', '', '', '', 0),
(194, '', '', '', '', '', '', '', '', '', 0),
(195, '', '', '', '', '', '', '', '', '', 0),
(196, '', '', '', '', '', '', '', '', '', 0),
(197, '', '', '', '', '', '', '', '', '', 0),
(198, '', '', '', '', '', '', '', '', '', 0),
(199, '', '', '', '', '', '', '', '', '', 0),
(200, '', '', '', '', '', '', '', '', '', 0),
(201, '', '', '', '', '', '', '', '', '', 0),
(202, '', '', '', '', '', '', '', '', '', 0),
(203, '', '', '', '', '', '', '', '', '', 0),
(204, '', '', '', '', '', '', '', '', '', 0),
(205, '', '', '', '', '', '', '', '', '', 0),
(206, '', '', '', '', '', '', '', '', '', 0),
(207, '', '', '', '', '', '', '', '', '', 0),
(208, '', '', '', '', '', '', '', '', '', 0),
(209, '', '', '', '', '', '', '', '', '', 0),
(210, '', '', '', '', '', '', '', '', '', 0),
(211, '', '', '', '', '', '', '', '', '', 0),
(212, '', '', '', '', '', '', '', '', '', 0),
(213, '', '', '', '', '', '', '', '', '', 0),
(214, '', '', '', '', '', '', '', '', '', 0),
(215, '', '', '', '', '', '', '', '', '', 0),
(216, '', '', '', '', '', '', '', '', '', 0),
(217, '', '', '', '', '', '', '', '', '', 0),
(218, '', '', '', '', '', '', '', '', '', 0),
(219, '', '', '', '', '', '', '', '', '', 0),
(220, '', '', '', '', '', '', '', '', '', 0),
(221, '', '', '', '', '', '', '', '', '', 0),
(222, '', '', '', '', '', '', '', '', '', 0),
(223, '', '', '', '', '', '', '', '', '', 0),
(224, '', '', '', '', '', '', '', '', '', 0),
(225, '', '', '', '', '', '', '', '', '', 0),
(226, '', '', '', '', '', '', '', '', '', 0),
(227, '', '', '', '', '', '', '', '', '', 0),
(228, '', '', '', '', '', '', '', '', '', 0),
(229, '', '', '', '', '', '', '', '', '', 0),
(230, '', '', '', '', '', '', '', '', '', 0),
(231, '', '', '', '', '', '', '', '', '', 0),
(232, '', '', '', '', '', '', '', '', '', 0),
(233, '', '', '', '', '', '', '', '', '', 0),
(234, '', '', '', '', '', '', '', '', '', 0),
(235, '', '', '', '', '', '', '', '', '', 0),
(236, '', '', '', '', '', '', '', '', '', 0),
(237, '', '', '', '', '', '', '', '', '', 0),
(238, '', '', '', '', '', '', '', '', '', 0),
(239, '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visa_docs`
--

CREATE TABLE `visa_docs` (
  `v_doc_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `v_docs_location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_docs`
--

INSERT INTO `visa_docs` (`v_doc_id`, `v_id`, `v_docs_location`) VALUES
(1, 13, 'assets/visa/australiaimage.jpg'),
(2, 13, 'assets/visa/australiaimage2.jpg'),
(3, 1, 'assets/visa/australiaimage.jpg'),
(4, 8, 'assets/visa/australia3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `visa_pics`
--

CREATE TABLE `visa_pics` (
  `id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `visa_pic` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_pics`
--

INSERT INTO `visa_pics` (`id`, `visa_id`, `visa_pic`) VALUES
(1, 13, 'assets/visa/Australia 1.jpg'),
(2, 26, 'assets/visa/sti1.jpg'),
(3, 14, 'assets/visa/Austria.jpg'),
(4, 14, 'assets/visa/Austria.jpg'),
(5, 18, 'assets/visa/Bangladesh.jpg'),
(6, 21, 'assets/visa/Belgium.jpg'),
(7, 30, 'assets/visa/Brazil.jpg'),
(8, 38, 'assets/visa/Canada.jpg'),
(9, 1, 'assets/visa/australiaimage2.jpg'),
(10, 8, 'assets/visa/australia4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `agent_trips`
--
ALTER TABLE `agent_trips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`food_type_id`);

--
-- Indexes for table `holiday_packages`
--
ALTER TABLE `holiday_packages`
  ADD PRIMARY KEY (`ho_id`);

--
-- Indexes for table `holiday_packages_cost_excludes`
--
ALTER TABLE `holiday_packages_cost_excludes`
  ADD PRIMARY KEY (`ho_ex_id`);

--
-- Indexes for table `holiday_packages_cost_includes`
--
ALTER TABLE `holiday_packages_cost_includes`
  ADD PRIMARY KEY (`ho_in_id`);

--
-- Indexes for table `holiday_packages_country`
--
ALTER TABLE `holiday_packages_country`
  ADD PRIMARY KEY (`ho_con_id`);

--
-- Indexes for table `holiday_packages_dates`
--
ALTER TABLE `holiday_packages_dates`
  ADD PRIMARY KEY (`ho_dates_id`);

--
-- Indexes for table `holiday_packages_itineary`
--
ALTER TABLE `holiday_packages_itineary`
  ADD PRIMARY KEY (`ho_it_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD PRIMARY KEY (`ho_book_id`);

--
-- Indexes for table `hotel_set`
--
ALTER TABLE `hotel_set`
  ADD PRIMARY KEY (`h_set_id`);

--
-- Indexes for table `hotel_update`
--
ALTER TABLE `hotel_update`
  ADD PRIMARY KEY (`ho_book_id`);

--
-- Indexes for table `mobile_numbers`
--
ALTER TABLE `mobile_numbers`
  ADD PRIMARY KEY (`mobile_id`);

--
-- Indexes for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD PRIMARY KEY (`pc_b_id`);

--
-- Indexes for table `package_users`
--
ALTER TABLE `package_users`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `qr_url`
--
ALTER TABLE `qr_url`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `sub_admin_rights`
--
ALTER TABLE `sub_admin_rights`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_time`);

--
-- Indexes for table `travel_agents`
--
ALTER TABLE `travel_agents`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `visa_con`
--
ALTER TABLE `visa_con`
  ADD PRIMARY KEY (`visa_id`);

--
-- Indexes for table `visa_docs`
--
ALTER TABLE `visa_docs`
  ADD PRIMARY KEY (`v_doc_id`);

--
-- Indexes for table `visa_pics`
--
ALTER TABLE `visa_pics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `agent_trips`
--
ALTER TABLE `agent_trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `food_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `holiday_packages`
--
ALTER TABLE `holiday_packages`
  MODIFY `ho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `holiday_packages_cost_excludes`
--
ALTER TABLE `holiday_packages_cost_excludes`
  MODIFY `ho_ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `holiday_packages_cost_includes`
--
ALTER TABLE `holiday_packages_cost_includes`
  MODIFY `ho_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `holiday_packages_country`
--
ALTER TABLE `holiday_packages_country`
  MODIFY `ho_con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `holiday_packages_dates`
--
ALTER TABLE `holiday_packages_dates`
  MODIFY `ho_dates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `holiday_packages_itineary`
--
ALTER TABLE `holiday_packages_itineary`
  MODIFY `ho_it_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hotel_set`
--
ALTER TABLE `hotel_set`
  MODIFY `h_set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobile_numbers`
--
ALTER TABLE `mobile_numbers`
  MODIFY `mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `package_booking`
--
ALTER TABLE `package_booking`
  MODIFY `pc_b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `qr_url`
--
ALTER TABLE `qr_url`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6443;

--
-- AUTO_INCREMENT for table `sub_admin_rights`
--
ALTER TABLE `sub_admin_rights`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `visa_con`
--
ALTER TABLE `visa_con`
  MODIFY `visa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `visa_docs`
--
ALTER TABLE `visa_docs`
  MODIFY `v_doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visa_pics`
--
ALTER TABLE `visa_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
