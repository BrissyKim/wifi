-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 18-05-25 09:53
-- 서버 버전: 5.7.21
-- PHP 버전: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
USE 'n9332260';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `dbname`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `siteID` int(11) NOT NULL,
  `writer` varchar(300) NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`id`, `siteID`, `writer`, `content`, `rating`) VALUES
(2, 24, 'Bob', 'Awesome', 0),
(3, 24, 'Bob', 'GOOD', 3),
(4, 20, 'tpdud123', 'good', 3);

-- --------------------------------------------------------

--
-- 테이블 구조 `locations`
--

CREATE TABLE `locations` (
  `siteID` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `suburbID` int(11) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `found` varchar(3) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `locationscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `locations`
--

INSERT INTO `locations` (`siteID`, `name`, `address`, `suburbID`, `rating`, `found`, `lat`, `lon`, `locationscol`) VALUES
(1, '7th Brigade Park, Chermside', 'Delaware St', 12, 4, 'Yes', -27.3789, 153.045, NULL),
(2, 'Annerley Library Wifi', '450 Ipswich Road', 1, 3, 'No', -27.5094, 153.033, NULL),
(3, 'Ashgrove Library Wifi', '87 Amarina Avenue', 3, 2, 'Yes', -27.4439, 152.987, NULL),
(4, 'Banyo Library Wifi', '284 St. Vincents Road', 4, 3, 'No', -27.374, 153.078, NULL),
(5, 'Booker Place Park', 'Birkin Rd & Sugarwood St', 5, 2, 'No', -27.5635, 152.894, NULL),
(6, 'Bracken Ridge Library Wifi', 'Corner Bracken and Barrett Street', 6, 5, 'Yes', -27.318, 153.038, NULL),
(7, 'Brisbane Botanic Gardens', 'Mt Coot-tha Rd', 39, 0, 'No', -27.4772, 152.976, NULL),
(8, 'Brisbane Square Library Wifi', 'Brisbane Square, 266 George Street', 7, 4, 'No', -27.4709, 153.022, NULL),
(9, 'Bulimba Library Wifi', 'Corner Riding Road & Oxford Street', 8, 0, 'No', -27.452, 153.063, NULL),
(10, 'Calamvale District Park', 'Formby & Ormskirk Sts', 9, 1, 'No', -27.6215, 153.037, NULL),
(11, 'Carina Library Wifi', 'Corner Mayfield Road & Nyrang Street', 10, 3, 'No', -27.4917, 153.091, NULL),
(12, 'Carindale Library Wifi', 'The Home and Leisure Centre, Corner Carindale Street  & Banchory Court, Westfield Carindale Shopping Centre', 11, 1, 'Yes', -27.5048, 153.1, NULL),
(13, 'Carindale Recreation Reserve', 'Cadogan and Bedivere Sts', 11, 5, 'No', -27.497, 153.111, NULL),
(14, 'Chermside Library Wifi', '375 Hamilton  Road', 12, 4, 'No', -27.3856, 153.035, NULL),
(15, 'City Botanic Gardens Wifi', 'Alice Street', 7, 1, 'No', -27.4756, 153.03, NULL),
(16, 'Coopers Plains Library Wifi', '107 Orange Grove Road', 14, 4, 'No', -27.5651, 153.04, NULL),
(17, 'Corinda Library Wifi', '641 Oxley Road', 15, 4, 'No', -27.5388, 152.981, NULL),
(18, 'D.M. Henderson Park', 'Granadilla St', 27, 0, 'No', -27.5774, 153.076, NULL),
(19, 'Einbunpin Lagoon', 'Brighton Rd', 34, 2, 'No', -27.3195, 153.068, NULL),
(20, 'Everton Park Library Wifi', '561 South Pine Road', 16, 5, 'No', -27.4053, 152.99, NULL),
(21, 'Fairfield Library Wifi', 'Fairfield Gardens Shopping Centre, 180 Fairfield Road', 17, 4, 'No', -27.5091, 153.026, NULL),
(22, 'Forest Lake Parklands', 'Forest Lake Bld', 19, 3, 'No', -27.6202, 152.966, NULL),
(23, 'Garden City Library Wifi', 'Garden City Shopping Centre, Corner Logan and Kessels Road', 40, 2, 'No', -27.5624, 153.081, NULL),
(24, 'Glindemann Park', 'Logan Rd', 23, 5, 'No', -27.5255, 153.069, NULL),
(25, 'Grange Library Wifi', '79 Evelyn Street', 20, 1, 'No', -27.4253, 153.017, NULL),
(26, 'Gregory Park', 'Baroona Rd', 33, 0, 'No', -27.467, 153, NULL),
(27, 'Guyatt Park', 'Sir Fred Schonell Dve', 36, 4, 'No', -27.493, 153.002, NULL),
(28, 'Hamilton Library Wifi', 'Corner Racecourt Road and Rossiter Parade', 21, 5, 'No', -27.4379, 153.064, NULL),
(29, 'Hidden World Park', 'Roghan Rd', 18, 4, 'No', -27.3397, 153.035, NULL),
(30, 'Holland Park Library Wifi', '81 Seville Road', 22, 3, 'No', -27.5229, 153.072, NULL),
(31, 'Inala Library Wifi', 'Inala Shopping centre, Corsair Ave', 24, 1, 'No', -27.5983, 152.974, NULL),
(32, 'Indooroopilly Library Wifi', 'Indrooroopilly Shopping centre, Level 4, 322 Moggill Road', 25, 0, 'No', -27.4976, 152.974, NULL),
(33, 'Kalinga Park', 'Kalinga St', 13, 3, 'No', -27.4067, 153.052, NULL),
(34, 'Kenmore Library Wifi', 'Kenmore Village Shopping Centre, Brookfield Road', 26, 2, 'No', -27.5059, 152.939, NULL),
(35, 'King Edward Park (Jacob\'s Ladder)', 'Turbot St and Wickham Tce', 7, 1, 'No', -27.4659, 153.024, NULL),
(36, 'King George Square', 'Ann & Adelaide Sts', 7, 5, 'No', -27.4684, 153.024, NULL),
(37, 'Mitchelton Library Wifi', '37 Helipolis Parada', 28, 1, 'No', -27.417, 152.978, NULL),
(38, 'Mt Coot-tha Botanic Gardens Library Wifi', 'Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road', 39, 4, 'No', -27.4753, 152.976, NULL),
(39, 'Mt Gravatt Library Wifi', '8 Creek Road', 29, 2, 'Yes', -27.5386, 153.08, NULL),
(40, 'Mt Ommaney Library Wifi', 'Mt Ommaney Shopping Centre, 171 Dandenong Road', 30, 0, 'No', -27.5482, 152.938, NULL),
(41, 'New Farm Library Wifi', '135 Sydney Street', 31, 0, 'No', -27.4674, 153.05, NULL),
(42, 'New Farm Park Wifi', 'Brunswick Street', 31, 0, 'No', -27.4705, 153.052, NULL),
(43, 'Nundah Library Wifi', '1 Bage Street', 32, 3, 'No', -27.4013, 153.058, NULL),
(44, 'Oriel Park', 'Cnr of Alexandra & Lancaster Rds', 2, 3, 'No', -27.4293, 153.058, NULL),
(45, 'Orleigh Park', 'Hill End Tce', 41, 3, 'No', -27.49, 153.003, NULL),
(46, 'Post Office Square', 'Queen & Adelaide Sts', 7, 2, 'No', -27.4674, 153.027, NULL),
(47, 'Rocks Riverside Park', 'Counihan Rd', 35, 4, 'No', -27.5415, 152.959, NULL),
(48, 'Sandgate Library Wifi', 'Seymour Street', 34, 2, 'No', -27.3206, 153.07, NULL),
(49, 'Stones Corner Library Wifi', '280 Logan Road', 37, 4, 'No', -27.498, 153.044, NULL),
(50, 'Sunnybank Hills Library Wifi', 'Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads', 38, 5, 'No', -27.6109, 153.055, NULL),
(51, 'Teralba Park', 'Pullen & Osborne Rds', 16, 4, 'No', -27.4029, 152.981, NULL),
(52, 'Toowong Library Wifi', 'Toowon Village Shopping Centre, Sherwood Road', 39, 0, 'No', -27.4851, 152.993, NULL),
(53, 'West End Library Wifi', '178 - 180 Boundary Street', 41, 3, 'No', -27.4825, 153.012, NULL),
(54, 'Wynnum Library Wifi', 'Wynnum Civic Centre, 66 Bay Terrace', 42, 3, 'No', -27.4424, 153.173, NULL),
(55, 'Zillmere Library Wifi', 'Corner Jennings Street and Zillmere Road', 43, 5, 'No', -27.3601, 153.041, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `register`
--

CREATE TABLE `register` (
  `userID` int(11) NOT NULL,
  `userName` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `register`
--

INSERT INTO `register` (`userID`, `userName`, `email`, `password`) VALUES
(1, 'Bob', 'Bob@the.apple', 'mmmm'),
(2, 'Sam', 'Gamgee@middle.earth', 'mmmm'),
(3, 'Jerry', 'Handle@outlook.com', '_123'),
(4, 'Jack', 'Luck@here.ac', 'aaa213'),
(5, 'Alice', 'Alice@myplace.co', '213aaa'),
(6, 'Sam', 'Sam@theman.washere', 'JSK'),
(7, 'Jerry', 'Jezza@USUSUS.A', 'Justice'),
(8, 'test', '1234', '1234'),
(9, 'test1', '1234', '1234'),
(10, NULL, NULL, NULL),
(11, 'tpdud123', 'ksy4961@gmail.com', 'tpdud123!');

-- --------------------------------------------------------

--
-- 테이블 구조 `suburb`
--

CREATE TABLE `suburb` (
  `suburbID` int(11) NOT NULL,
  `suburbName` varchar(256) DEFAULT NULL,
  `postcode` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `suburb`
--

INSERT INTO `suburb` (`suburbID`, `suburbName`, `postcode`) VALUES
(1, 'Annerley', 4103),
(2, 'Ascot', 4007),
(3, 'Ashgrove', 4060),
(4, 'Banyo', 4014),
(5, 'Bellbowrie', 4070),
(6, 'Bracken Ridge', 4017),
(7, 'Brisbane', 4000),
(8, 'Bulimba', 4171),
(9, 'Calamvale', 4116),
(10, 'Carina', 4152),
(11, 'Carindale', 4152),
(12, 'Chermside', 4032),
(13, 'Clayfield', 4011),
(14, 'Coopers Plains', 4108),
(15, 'Corinda', 4075),
(16, 'Everton park', 4053),
(17, 'Fairfield', 4103),
(18, 'Fitzgibbon', 4018),
(19, 'Forest Lake', 4078),
(20, 'Grange', 4051),
(21, 'Hamilton', 4007),
(22, 'Holland Park', 4121),
(23, 'Holland Park West', 4121),
(24, 'Inala', 4077),
(25, 'Indooroopilly', 4068),
(26, 'Kenmore', 4069),
(27, 'MacGregor', 4109),
(28, 'Mitchelton', 4053),
(29, 'Mount Gravatt', 4122),
(30, 'Mount Ommaney', 4074),
(31, 'New Farm', 4005),
(32, 'Nundah', 4012),
(33, 'Paddington', 4064),
(34, 'Sandgate', 4017),
(35, 'Seventeen Mile Rocks', 4073),
(36, 'St Lucia', 4067),
(37, 'Stones Corner', 4120),
(38, 'Sunnybank Hills', 4109),
(39, 'Toowong', 4066),
(40, 'Upper Mount Gravatt', 4122),
(41, 'West End', 4101),
(42, 'Wynnum', 4178),
(43, 'Zillmere', 4034),
(44, '', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`siteID`),
  ADD KEY `suburbID_idx` (`suburbID`);

--
-- 테이블의 인덱스 `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userID`);

--
-- 테이블의 인덱스 `suburb`
--
ALTER TABLE `suburb`
  ADD PRIMARY KEY (`suburbID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `locations`
--
ALTER TABLE `locations`
  MODIFY `siteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 테이블의 AUTO_INCREMENT `register`
--
ALTER TABLE `register`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `suburb`
--
ALTER TABLE `suburb`
  MODIFY `suburbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `suburbID` FOREIGN KEY (`suburbID`) REFERENCES `suburb` (`suburbID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
