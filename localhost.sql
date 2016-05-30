-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2016 at 10:23 AM
-- Server version: 5.5.36
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web-is-gr02w`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestilling`
--

CREATE TABLE IF NOT EXISTS `bestilling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bruker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bestilling_bruker1_idx` (`bruker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bestilling_flyvning`
--

CREATE TABLE IF NOT EXISTS `bestilling_flyvning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bestilling_id` int(11) NOT NULL,
  `flyvning_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bestilling_flyvning_flyvning1_idx` (`flyvning_id`),
  KEY `fk_bestilling_flyvning_bestilling1_idx` (`bestilling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bruker`
--

CREATE TABLE IF NOT EXISTS `bruker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brukernavn` varchar(255) DEFAULT NULL,
  `epost` varchar(255) DEFAULT NULL,
  `passord` varchar(255) NOT NULL,
  `land_id` int(11) DEFAULT NULL,
  `mobilnr` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bruker_land1_idx` (`land_id`),
  KEY `fk_bruker_person1_idx` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bruker`
--

INSERT INTO `bruker` (`id`, `brukernavn`, `epost`, `passord`, `land_id`, `mobilnr`, `person_id`) VALUES
(1, 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL),
(2, 'admin1', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bruker_tilgang`
--

CREATE TABLE IF NOT EXISTS `bruker_tilgang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bruker_id` int(11) NOT NULL,
  `tilgang_id` int(11) NOT NULL,
  `fra` int(11) NOT NULL,
  `til` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bruker_tilgang_tilgang1_idx` (`tilgang_id`),
  KEY `fk_bruker_tilgang_bruker1_idx` (`bruker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bruker_tilgang`
--

INSERT INTO `bruker_tilgang` (`id`, `bruker_id`, `tilgang_id`, `fra`, `til`) VALUES
(1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flyplass`
--

CREATE TABLE IF NOT EXISTS `flyplass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(255) NOT NULL,
  `flyplasskode` varchar(3) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `tidssone_gmt` int(2) NOT NULL,
  `land_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_flyplass_land1_idx` (`land_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flyplass_gruppe`
--

CREATE TABLE IF NOT EXISTS `flyplass_gruppe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gruppe_id` int(11) NOT NULL,
  `flyplass_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_flyplass_gruppe_flyplass1_idx` (`flyplass_id`),
  KEY `fk_flyplass_gruppe_gruppe1_idx` (`gruppe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flyvning`
--

CREATE TABLE IF NOT EXISTS `flyvning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `luftfartoy_id` int(11) NOT NULL,
  `rute_kombinasjon_id` int(11) NOT NULL,
  `avgang` int(11) DEFAULT NULL,
  `gate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_flyvning_rute_kombinasjon1_idx` (`rute_kombinasjon_id`),
  KEY `fk_flyvning_luftfartoy1_idx` (`luftfartoy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gruppe`
--

CREATE TABLE IF NOT EXISTS `gruppe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `beskrivelse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `klasse`
--

INSERT INTO `klasse` (`id`, `type`, `beskrivelse`) VALUES
(1, 'Voksen', '26+ år'),
(2, 'Ungdom', '20 - 25 år'),
(3, 'Tenåring', '13 - 19 år'),
(4, 'Barn', '2 - 12 år'),
(5, 'Spedbarn', 'Under 2 år');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(255) NOT NULL,
  `landskode` int(11) NOT NULL,
  `valuta_id` int(11) NOT NULL,
  `iso` varchar(2) NOT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_land_valuta1_idx` (`valuta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`id`, `navn`, `landskode`, `valuta_id`, `iso`, `iso3`) VALUES
(1, 'Afghanistan', 93, 1, 'AF', 'AFG'),
(2, 'Albania', 355, 1, 'AL', 'ALB'),
(3, 'Algeria', 213, 1, 'DZ', 'DZA'),
(4, 'American Samoa', 1684, 1, 'AS', 'ASM'),
(5, 'Andorra', 376, 1, 'AD', 'AND'),
(6, 'Angola', 244, 1, 'AO', 'AGO'),
(7, 'Anguilla', 1264, 1, 'AI', 'AIA'),
(8, 'Antarctica', 0, 1, 'AQ', NULL),
(9, 'Antigua and Barbuda', 1268, 1, 'AG', 'ATG'),
(10, 'Argentina', 54, 1, 'AR', 'ARG'),
(11, 'Armenia', 374, 1, 'AM', 'ARM'),
(12, 'Aruba', 297, 1, 'AW', 'ABW'),
(13, 'Australia', 61, 1, 'AU', 'AUS'),
(14, 'Austria', 43, 1, 'AT', 'AUT'),
(15, 'Azerbaijan', 994, 1, 'AZ', 'AZE'),
(16, 'Bahamas', 1242, 1, 'BS', 'BHS'),
(17, 'Bahrain', 973, 1, 'BH', 'BHR'),
(18, 'Bangladesh', 880, 1, 'BD', 'BGD'),
(19, 'Barbados', 1246, 1, 'BB', 'BRB'),
(20, 'Belarus', 375, 1, 'BY', 'BLR'),
(21, 'Belgium', 32, 1, 'BE', 'BEL'),
(22, 'Belize', 501, 1, 'BZ', 'BLZ'),
(23, 'Benin', 229, 1, 'BJ', 'BEN'),
(24, 'Bermuda', 1441, 1, 'BM', 'BMU'),
(25, 'Bhutan', 975, 1, 'BT', 'BTN'),
(26, 'Bolivia', 591, 1, 'BO', 'BOL'),
(27, 'Bosnia and Herzegovina', 387, 1, 'BA', 'BIH'),
(28, 'Botswana', 267, 1, 'BW', 'BWA'),
(29, 'Bouvet Island', 0, 1, 'BV', NULL),
(30, 'Brazil', 55, 1, 'BR', 'BRA'),
(31, 'British Indian Ocean Territory', 246, 1, 'IO', NULL),
(32, 'Brunei Darussalam', 673, 1, 'BN', 'BRN'),
(33, 'Bulgaria', 359, 1, 'BG', 'BGR'),
(34, 'Burkina Faso', 226, 1, 'BF', 'BFA'),
(35, 'Burundi', 257, 1, 'BI', 'BDI'),
(36, 'Cambodia', 855, 1, 'KH', 'KHM'),
(37, 'Cameroon', 237, 1, 'CM', 'CMR'),
(38, 'Canada', 1, 1, 'CA', 'CAN'),
(39, 'Cape Verde', 238, 1, 'CV', 'CPV'),
(40, 'Cayman Islands', 1345, 1, 'KY', 'CYM'),
(41, 'Central African Republic', 236, 1, 'CF', 'CAF'),
(42, 'Chad', 235, 1, 'TD', 'TCD'),
(43, 'Chile', 56, 1, 'CL', 'CHL'),
(44, 'China', 86, 1, 'CN', 'CHN'),
(45, 'Christmas Island', 61, 1, 'CX', NULL),
(46, 'Cocos (Keeling) Islands', 672, 1, 'CC', NULL),
(47, 'Colombia', 57, 1, 'CO', 'COL'),
(48, 'Comoros', 269, 1, 'KM', 'COM'),
(49, 'Congo', 242, 1, 'CG', 'COG'),
(50, 'Congo, the Democratic Republic of the', 242, 1, 'CD', 'COD'),
(51, 'Cook Islands', 682, 1, 'CK', 'COK'),
(52, 'Costa Rica', 506, 1, 'CR', 'CRI'),
(53, 'Cote D''Ivoire', 225, 1, 'CI', 'CIV'),
(54, 'Croatia', 385, 1, 'HR', 'HRV'),
(55, 'Cuba', 53, 1, 'CU', 'CUB'),
(56, 'Cyprus', 357, 1, 'CY', 'CYP'),
(57, 'Czech Republic', 420, 1, 'CZ', 'CZE'),
(58, 'Denmark', 45, 1, 'DK', 'DNK'),
(59, 'Djibouti', 253, 1, 'DJ', 'DJI'),
(60, 'Dominica', 1767, 1, 'DM', 'DMA'),
(61, 'Dominican Republic', 1809, 1, 'DO', 'DOM'),
(62, 'Ecuador', 593, 1, 'EC', 'ECU'),
(63, 'Egypt', 20, 1, 'EG', 'EGY'),
(64, 'El Salvador', 503, 1, 'SV', 'SLV'),
(65, 'Equatorial Guinea', 240, 1, 'GQ', 'GNQ'),
(66, 'Eritrea', 291, 1, 'ER', 'ERI'),
(67, 'Estonia', 372, 1, 'EE', 'EST'),
(68, 'Ethiopia', 251, 1, 'ET', 'ETH'),
(69, 'Falkland Islands (Malvinas)', 500, 1, 'FK', 'FLK'),
(70, 'Faroe Islands', 298, 1, 'FO', 'FRO'),
(71, 'Fiji', 679, 1, 'FJ', 'FJI'),
(72, 'Finland', 358, 1, 'FI', 'FIN'),
(73, 'France', 33, 1, 'FR', 'FRA'),
(74, 'French Guiana', 594, 1, 'GF', 'GUF'),
(75, 'French Polynesia', 689, 1, 'PF', 'PYF'),
(76, 'French Southern Territories', 0, 1, 'TF', NULL),
(77, 'Gabon', 241, 1, 'GA', 'GAB'),
(78, 'Gambia', 220, 1, 'GM', 'GMB'),
(79, 'Georgia', 995, 1, 'GE', 'GEO'),
(80, 'Germany', 49, 1, 'DE', 'DEU'),
(81, 'Ghana', 1, 1, 'GH', 'GHA'),
(82, 'Gibraltar', 350, 1, 'GI', 'GIB'),
(83, 'Greece', 30, 1, 'GR', 'GRC'),
(84, 'Greenland', 299, 1, 'GL', 'GRL'),
(85, 'Grenada', 1473, 1, 'GD', 'GRD'),
(86, 'Guadeloupe', 590, 1, 'GP', 'GLP'),
(87, 'Guam', 1671, 1, 'GU', 'GUM'),
(88, 'Guatemala', 502, 1, 'GT', 'GTM'),
(89, 'Guinea', 224, 1, 'GN', 'GIN'),
(90, 'Guinea-Bissau', 245, 1, 'GW', 'GNB'),
(91, 'Guyana', 592, 1, 'GY', 'GUY'),
(92, 'Haiti', 509, 1, 'HT', 'HTI'),
(93, 'Heard Island and Mcdonald Islands', 0, 1, 'HM', NULL),
(94, 'Holy See (Vatican City State)', 39, 1, 'VA', 'VAT'),
(95, 'Honduras', 504, 1, 'HN', 'HND'),
(96, 'Hong Kong', 852, 1, 'HK', 'HKG'),
(97, 'Hungary', 36, 1, 'HU', 'HUN'),
(98, 'Iceland', 354, 1, 'IS', 'ISL'),
(99, 'India', 91, 1, 'IN', 'IND'),
(100, 'Indonesia', 62, 1, 'ID', 'IDN'),
(101, 'Iran, Islamic Republic of', 98, 1, 'IR', 'IRN'),
(102, 'Iraq', 964, 1, 'IQ', 'IRQ'),
(103, 'Ireland', 353, 1, 'IE', 'IRL'),
(104, 'Israel', 972, 1, 'IL', 'ISR'),
(105, 'Italy', 39, 1, 'IT', 'ITA'),
(106, 'Jamaica', 1876, 1, 'JM', 'JAM'),
(107, 'Japan', 81, 1, 'JP', 'JPN'),
(108, 'Jordan', 962, 1, 'JO', 'JOR'),
(109, 'Kazakhstan', 7, 1, 'KZ', 'KAZ'),
(110, 'Kenya', 254, 1, 'KE', 'KEN'),
(111, 'Kiribati', 686, 1, 'KI', 'KIR'),
(112, 'Korea, Democratic People''s Republic of', 850, 1, 'KP', 'PRK'),
(113, 'Korea, Republic of', 82, 1, 'KR', 'KOR'),
(114, 'Kuwait', 965, 1, 'KW', 'KWT'),
(115, 'Kyrgyzstan', 996, 1, 'KG', 'KGZ'),
(116, 'Lao People''s Democratic Republic', 856, 1, 'LA', 'LAO'),
(117, 'Latvia', 371, 1, 'LV', 'LVA'),
(118, 'Lebanon', 961, 1, 'LB', 'LBN'),
(119, 'Lesotho', 266, 1, 'LS', 'LSO'),
(120, 'Liberia', 231, 1, 'LR', 'LBR'),
(121, 'Libyan Arab Jamahiriya', 218, 1, 'LY', 'LBY'),
(122, 'Liechtenstein', 423, 1, 'LI', 'LIE'),
(123, 'Lithuania', 370, 1, 'LT', 'LTU'),
(124, 'Luxembourg', 352, 1, 'LU', 'LUX'),
(125, 'Macao', 853, 1, 'MO', 'MAC'),
(126, 'Macedonia, the Former Yugoslav Republic of', 389, 1, 'MK', 'MKD'),
(127, 'Madagascar', 261, 1, 'MG', 'MDG'),
(128, 'Malawi', 265, 1, 'MW', 'MWI'),
(129, 'Malaysia', 60, 1, 'MY', 'MYS'),
(130, 'Maldives', 960, 1, 'MV', 'MDV'),
(131, 'Mali', 223, 1, 'ML', 'MLI'),
(132, 'Malta', 356, 1, 'MT', 'MLT'),
(133, 'Marshall Islands', 692, 1, 'MH', 'MHL'),
(134, 'Martinique', 596, 1, 'MQ', 'MTQ'),
(135, 'Mauritania', 222, 1, 'MR', 'MRT'),
(136, 'Mauritius', 230, 1, 'MU', 'MUS'),
(137, 'Mayotte', 269, 1, 'YT', NULL),
(138, 'Mexico', 52, 1, 'MX', 'MEX'),
(139, 'Micronesia, Federated States of', 691, 1, 'FM', 'FSM'),
(140, 'Moldova, Republic of', 373, 1, 'MD', 'MDA'),
(141, 'Monaco', 377, 1, 'MC', 'MCO'),
(142, 'Mongolia', 976, 1, 'MN', 'MNG'),
(143, 'Montserrat', 1664, 1, 'MS', 'MSR'),
(144, 'Morocco', 212, 1, 'MA', 'MAR'),
(145, 'Mozambique', 258, 1, 'MZ', 'MOZ'),
(146, 'Myanmar', 95, 1, 'MM', 'MMR'),
(147, 'Namibia', 264, 1, 'NA', 'NAM'),
(148, 'Nauru', 674, 1, 'NR', 'NRU'),
(149, 'Nepal', 977, 1, 'NP', 'NPL'),
(150, 'Netherlands', 31, 1, 'NL', 'NLD'),
(151, 'Netherlands Antilles', 599, 1, 'AN', 'ANT'),
(152, 'New Caledonia', 687, 1, 'NC', 'NCL'),
(153, 'New Zealand', 64, 1, 'NZ', 'NZL'),
(154, 'Nicaragua', 505, 1, 'NI', 'NIC'),
(155, 'Niger', 227, 1, 'NE', 'NER'),
(156, 'Nigeria', 234, 1, 'NG', 'NGA'),
(157, 'Niue', 683, 1, 'NU', 'NIU'),
(158, 'Norfolk Island', 672, 1, 'NF', 'NFK'),
(159, 'Northern Mariana Islands', 1670, 1, 'MP', 'MNP'),
(160, 'Norway', 47, 1, 'NO', 'NOR'),
(161, 'Oman', 968, 1, 'OM', 'OMN'),
(162, 'Pakistan', 92, 1, 'PK', 'PAK'),
(163, 'Palau', 680, 1, 'PW', 'PLW'),
(164, 'Palestinian Territory, Occupied', 970, 1, 'PS', NULL),
(165, 'Panama', 507, 1, 'PA', 'PAN'),
(166, 'Papua New Guinea', 675, 1, 'PG', 'PNG'),
(167, 'Paraguay', 595, 1, 'PY', 'PRY'),
(168, 'Peru', 51, 1, 'PE', 'PER'),
(169, 'Philippines', 63, 1, 'PH', 'PHL'),
(170, 'Pitcairn', 0, 1, 'PN', 'PCN'),
(171, 'Poland', 48, 1, 'PL', 'POL'),
(172, 'Portugal', 351, 1, 'PT', 'PRT'),
(173, 'Puerto Rico', 1787, 1, 'PR', 'PRI'),
(174, 'Qatar', 974, 1, 'QA', 'QAT'),
(175, 'Reunion', 262, 1, 'RE', 'REU'),
(176, 'Romania', 40, 1, 'RO', 'ROM'),
(177, 'Russian Federation', 70, 1, 'RU', 'RUS'),
(178, 'Rwanda', 250, 1, 'RW', 'RWA'),
(179, 'Saint Helena', 290, 1, 'SH', 'SHN'),
(180, 'Saint Kitts and Nevis', 1869, 1, 'KN', 'KNA'),
(181, 'Saint Lucia', 1758, 1, 'LC', 'LCA'),
(182, 'Saint Pierre and Miquelon', 508, 1, 'PM', 'SPM'),
(183, 'Saint Vincent and the Grenadines', 1784, 1, 'VC', 'VCT'),
(184, 'Samoa', 684, 1, 'WS', 'WSM'),
(185, 'San Marino', 378, 1, 'SM', 'SMR'),
(186, 'Sao Tome and Principe', 239, 1, 'ST', 'STP'),
(187, 'Saudi Arabia', 966, 1, 'SA', 'SAU'),
(188, 'Senegal', 221, 1, 'SN', 'SEN'),
(189, 'Serbia and Montenegro', 381, 1, 'CS', NULL),
(190, 'Seychelles', 248, 1, 'SC', 'SYC'),
(191, 'Sierra Leone', 232, 1, 'SL', 'SLE'),
(192, 'Singapore', 65, 1, 'SG', 'SGP'),
(193, 'Slovakia', 421, 1, 'SK', 'SVK'),
(194, 'Slovenia', 386, 1, 'SI', 'SVN'),
(195, 'Solomon Islands', 677, 1, 'SB', 'SLB'),
(196, 'Somalia', 252, 1, 'SO', 'SOM'),
(197, 'South Africa', 27, 1, 'ZA', 'ZAF'),
(198, 'South Georgia and the South Sandwich Islands', 0, 1, 'GS', NULL),
(199, 'Spain', 34, 1, 'ES', 'ESP'),
(200, 'Sri Lanka', 94, 1, 'LK', 'LKA'),
(201, 'Sudan', 249, 1, 'SD', 'SDN'),
(202, 'Suriname', 597, 1, 'SR', 'SUR'),
(203, 'Svalbard and Jan Mayen', 47, 1, 'SJ', 'SJM'),
(204, 'Swaziland', 268, 1, 'SZ', 'SWZ'),
(205, 'Sweden', 46, 1, 'SE', 'SWE'),
(206, 'Switzerland', 41, 1, 'CH', 'CHE'),
(207, 'Syrian Arab Republic', 963, 1, 'SY', 'SYR'),
(208, 'Taiwan, Province of China', 886, 1, 'TW', 'TWN'),
(209, 'Tajikistan', 992, 1, 'TJ', 'TJK'),
(210, 'Tanzania, United Republic of', 255, 1, 'TZ', 'TZA'),
(211, 'Thailand', 66, 1, 'TH', 'THA'),
(212, 'Timor-Leste', 670, 1, 'TL', NULL),
(213, 'Togo', 228, 1, 'TG', 'TGO'),
(214, 'Tokelau', 690, 1, 'TK', 'TKL'),
(215, 'Tonga', 676, 1, 'TO', 'TON'),
(216, 'Trinidad and Tobago', 1868, 1, 'TT', 'TTO'),
(217, 'Tunisia', 216, 1, 'TN', 'TUN'),
(218, 'Turkey', 90, 1, 'TR', 'TUR'),
(219, 'Turkmenistan', 7370, 1, 'TM', 'TKM'),
(220, 'Turks and Caicos Islands', 1649, 1, 'TC', 'TCA'),
(221, 'Tuvalu', 688, 1, 'TV', 'TUV'),
(222, 'Uganda', 256, 1, 'UG', 'UGA'),
(223, 'Ukraine', 380, 1, 'UA', 'UKR'),
(224, 'United Arab Emirates', 971, 1, 'AE', 'ARE'),
(225, 'United Kingdom', 44, 1, 'GB', 'GBR'),
(226, 'United States', 1, 1, 'US', 'USA'),
(227, 'United States Minor Outlying Islands', 1, 1, 'UM', NULL),
(228, 'Uruguay', 598, 1, 'UY', 'URY'),
(229, 'Uzbekistan', 998, 1, 'UZ', 'UZB'),
(230, 'Vanuatu', 678, 1, 'VU', 'VUT'),
(231, 'Venezuela', 58, 1, 'VE', 'VEN'),
(232, 'Viet Nam', 84, 1, 'VN', 'VNM'),
(233, 'Virgin Islands, British', 1284, 1, 'VG', 'VGB'),
(234, 'Virgin Islands, U.s.', 1340, 1, 'VI', 'VIR'),
(235, 'Wallis and Futuna', 681, 1, 'WF', 'WLF'),
(236, 'Western Sahara', 212, 1, 'EH', 'ESH'),
(237, 'Yemen', 967, 1, 'YE', 'YEM'),
(238, 'Zambia', 260, 1, 'ZM', 'ZMB'),
(239, 'Zimbabwe', 263, 1, 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `luftfartoy`
--

CREATE TABLE IF NOT EXISTS `luftfartoy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modell_id` int(11) NOT NULL,
  `tailnr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_luftfartoy_modell1_idx` (`modell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modell`
--

CREATE TABLE IF NOT EXISTS `modell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_luftfartoy_id` int(11) NOT NULL,
  `navn` varchar(255) NOT NULL,
  `kapasitet` int(4) NOT NULL COMMENT 'Antall sitteplasser',
  `rader` int(4) NOT NULL COMMENT 'Antall sitteplasser lengde',
  `bredde` int(4) NOT NULL COMMENT 'Antall sitteplasser bredde',
  PRIMARY KEY (`id`),
  KEY `fk_modell_type_luftfartoy1_idx` (`type_luftfartoy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `passasjer_flyvning`
--

CREATE TABLE IF NOT EXISTS `passasjer_flyvning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bestilling_flyvning_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `pris_id` int(11) NOT NULL,
  `seteoppsett_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_person_bestilling_flyvning_bestilling_flyvning1_idx` (`bestilling_flyvning_id`),
  KEY `fk_person_bestilling_flyvning_person1_idx` (`person_id`),
  KEY `fk_passasjer_flyvning_pris1_idx` (`pris_id`),
  KEY `fk_passasjer_flyvning_seteoppsett1_idx` (`seteoppsett_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `passasjertype`
--

CREATE TABLE IF NOT EXISTS `passasjertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `beskrivelse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(255) NOT NULL,
  `etternavn` varchar(255) NOT NULL,
  `fodselsdato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pris`
--

CREATE TABLE IF NOT EXISTS `pris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flyvning_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `passasjertype_id` int(11) NOT NULL,
  `fra_dato` int(11) NOT NULL,
  `til_dato` varchar(45) NOT NULL,
  `pris` int(11) NOT NULL,
  `valuta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pris_flyvning1_idx` (`flyvning_id`),
  KEY `fk_pris_klasse1_idx` (`klasse_id`),
  KEY `fk_pris_passasjertype1_idx` (`passasjertype_id`),
  KEY `fk_pris_valuta1_idx` (`valuta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE IF NOT EXISTS `rute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reisetid` int(11) NOT NULL COMMENT 'reisetid sekunder',
  `basis_pris` int(11) NOT NULL,
  `valuta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rute_valuta1_idx` (`valuta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rute_kombinasjon`
--

CREATE TABLE IF NOT EXISTS `rute_kombinasjon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rute_id` int(11) NOT NULL,
  `flyplass_id_fra` int(11) NOT NULL,
  `flyplass_id_til` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rute_kombinasjon_rute_idx` (`rute_id`),
  KEY `fk_rute_kombinasjon_flyplass_fra1_idx` (`flyplass_id_fra`),
  KEY `fk_rute_kombinasjon_flyplass_til1_idx` (`flyplass_id_til`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seteoppsett`
--

CREATE TABLE IF NOT EXISTS `seteoppsett` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modell_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `radnummer` int(11) NOT NULL,
  `sete_bokstav` varchar(1) NOT NULL,
  `flyvning_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seteoppsett_klasse1_idx` (`klasse_id`),
  KEY `fk_seteoppsett_flyvning1_idx` (`flyvning_id`),
  KEY `fk_seteoppsett_modell1_idx` (`modell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tilgang`
--

CREATE TABLE IF NOT EXISTS `tilgang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) NOT NULL,
  `beskrivelse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tilgang`
--

INSERT INTO `tilgang` (`id`, `navn`, `beskrivelse`) VALUES
(1, 'Adminsider', 'Tilgang til å logge inn på adminsider');

-- --------------------------------------------------------

--
-- Table structure for table `type_luftfartoy`
--

CREATE TABLE IF NOT EXISTS `type_luftfartoy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `valuta`
--

CREATE TABLE IF NOT EXISTS `valuta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valuta_navn` varchar(45) NOT NULL,
  `forkortelse` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `valuta`
--

INSERT INTO `valuta` (`id`, `valuta_navn`, `forkortelse`) VALUES
(1, 'Norsk korne', 'NOK');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestilling`
--
ALTER TABLE `bestilling`
  ADD CONSTRAINT `fk_bestilling_bruker1` FOREIGN KEY (`bruker_id`) REFERENCES `bruker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bestilling_flyvning`
--
ALTER TABLE `bestilling_flyvning`
  ADD CONSTRAINT `fk_bestilling_flyvning_bestilling1` FOREIGN KEY (`bestilling_id`) REFERENCES `bestilling` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bestilling_flyvning_flyvning1` FOREIGN KEY (`flyvning_id`) REFERENCES `flyvning` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bruker`
--
ALTER TABLE `bruker`
  ADD CONSTRAINT `fk_bruker_land1` FOREIGN KEY (`land_id`) REFERENCES `land` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bruker_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bruker_tilgang`
--
ALTER TABLE `bruker_tilgang`
  ADD CONSTRAINT `fk_bruker_tilgang_bruker1` FOREIGN KEY (`bruker_id`) REFERENCES `bruker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bruker_tilgang_tilgang1` FOREIGN KEY (`tilgang_id`) REFERENCES `tilgang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flyplass`
--
ALTER TABLE `flyplass`
  ADD CONSTRAINT `fk_flyplass_land1` FOREIGN KEY (`land_id`) REFERENCES `land` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flyplass_gruppe`
--
ALTER TABLE `flyplass_gruppe`
  ADD CONSTRAINT `fk_flyplass_gruppe_gruppe1` FOREIGN KEY (`gruppe_id`) REFERENCES `gruppe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flyplass_gruppe_flyplass1` FOREIGN KEY (`flyplass_id`) REFERENCES `flyplass` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flyvning`
--
ALTER TABLE `flyvning`
  ADD CONSTRAINT `fk_flyvning_rute_kombinasjon1` FOREIGN KEY (`rute_kombinasjon_id`) REFERENCES `rute_kombinasjon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flyvning_luftfartoy1` FOREIGN KEY (`luftfartoy_id`) REFERENCES `luftfartoy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `land`
--
ALTER TABLE `land`
  ADD CONSTRAINT `fk_land_valuta1` FOREIGN KEY (`valuta_id`) REFERENCES `valuta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `luftfartoy`
--
ALTER TABLE `luftfartoy`
  ADD CONSTRAINT `fk_luftfartoy_modell1` FOREIGN KEY (`modell_id`) REFERENCES `modell` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `modell`
--
ALTER TABLE `modell`
  ADD CONSTRAINT `fk_modell_type_luftfartoy1` FOREIGN KEY (`type_luftfartoy_id`) REFERENCES `type_luftfartoy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passasjer_flyvning`
--
ALTER TABLE `passasjer_flyvning`
  ADD CONSTRAINT `fk_person_bestilling_flyvning_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_person_bestilling_flyvning_bestilling_flyvning1` FOREIGN KEY (`bestilling_flyvning_id`) REFERENCES `bestilling_flyvning` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_passasjer_flyvning_pris1` FOREIGN KEY (`pris_id`) REFERENCES `pris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_passasjer_flyvning_seteoppsett1` FOREIGN KEY (`seteoppsett_id`) REFERENCES `seteoppsett` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pris`
--
ALTER TABLE `pris`
  ADD CONSTRAINT `fk_pris_flyvning1` FOREIGN KEY (`flyvning_id`) REFERENCES `flyvning` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pris_klasse1` FOREIGN KEY (`klasse_id`) REFERENCES `klasse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pris_passasjertype1` FOREIGN KEY (`passasjertype_id`) REFERENCES `passasjertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pris_valuta1` FOREIGN KEY (`valuta_id`) REFERENCES `valuta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `fk_rute_valuta1` FOREIGN KEY (`valuta_id`) REFERENCES `valuta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rute_kombinasjon`
--
ALTER TABLE `rute_kombinasjon`
  ADD CONSTRAINT `fk_rute_kombinasjon_rute` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rute_kombinasjon_flyplass_fra` FOREIGN KEY (`flyplass_id_fra`) REFERENCES `flyplass` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rute_kombinasjon_flyplass_til` FOREIGN KEY (`flyplass_id_til`) REFERENCES `flyplass` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seteoppsett`
--
ALTER TABLE `seteoppsett`
  ADD CONSTRAINT `fk_seteoppsett_klasse1` FOREIGN KEY (`klasse_id`) REFERENCES `klasse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seteoppsett_flyvning1` FOREIGN KEY (`flyvning_id`) REFERENCES `flyvning` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seteoppsett_modell1` FOREIGN KEY (`modell_id`) REFERENCES `modell` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
