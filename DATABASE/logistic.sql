-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 01:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_countries`
--

CREATE TABLE `delivery_countries` (
  `delivery_id` int(11) NOT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_countries`
--

INSERT INTO `delivery_countries` (`delivery_id`, `delivery_country`, `delivery_address`, `user_id`, `arrival_date`) VALUES
(1000, 'Serbia', '41358 N Schnepf Rd San Tan Valley, Arizona(AZ), 85140', 1014, '2024-01-10'),
(1001, 'Switzerland', '506 Brenden Way Ossian, Indiana(IN), 46777', 1014, '2024-01-15'),
(1002, 'Uzbekistan', '1919 Atlantic Ave Manasquan, New Jersey(NJ), 08736', 1014, '2024-01-31'),
(1003, 'Australia', '311 W Murdock St Andover, Kansas(KS), 67002', 1014, '2024-01-15'),
(1004, 'Benin', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1014, '2023-12-31'),
(1005, 'Benin', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1014, '2023-12-31'),
(1006, 'Bahrain', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1014, '2023-12-31'),
(1007, 'Bhutan', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1014, '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_countries`
--

CREATE TABLE `pickup_countries` (
  `pickup_id` int(11) NOT NULL,
  `pickup_country` varchar(255) DEFAULT NULL,
  `pickup_address` varchar(255) DEFAULT NULL,
  `transportation` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `departure_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_countries`
--

INSERT INTO `pickup_countries` (`pickup_id`, `pickup_country`, `pickup_address`, `transportation`, `user_id`, `departure_date`) VALUES
(1000, 'Egypt', '2268 S Tongass Hwy Ketchikan, Alaska(AK), 99901', 'Plane', 1014, '2023-12-29'),
(1001, 'Canada', '2268 S Tongass Hwy Ketchikan, Alaska(AK), 99901', 'Vessel', 1014, '2024-01-03'),
(1002, 'Brazil', '5008 Newland Ave Cheyenne, Wyoming(WY), 82009', 'Vessel', 1014, '2024-01-14'),
(1003, 'Australia', '1286 S 240th St Pittsburg, Kansas(KS), 66762', 'Inland', 1014, '2024-01-14'),
(1004, 'Benin', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1014, '2023-12-29'),
(1005, 'Benin', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1014, '2023-12-29'),
(1006, 'Philippines', 'Manila, Tondo luwalhati 43rd street', 'Inland', 1014, '2023-12-29'),
(1007, 'Benin', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1014, '2023-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `route_countries`
--

CREATE TABLE `route_countries` (
  `countries` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route_countries`
--

INSERT INTO `route_countries` (`countries`) VALUES
('Afghanistan'),
('Albania'),
('Algeria'),
('Andorra'),
('Angola'),
('Antigua and Barbuda'),
('Argentina'),
('Armenia'),
('Australia'),
('Austria'),
('Azerbaijan'),
('Bahamas'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bhutan'),
('Bolivia'),
('Bosnia and Herzegovina'),
('Botswana'),
('Brazil'),
('Brunei'),
('Bulgaria'),
('Burkina Faso'),
('Burundi'),
('Cabo Verde'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Central African Republic'),
('Chad'),
('Chile'),
('China'),
('Colombia'),
('Comoros'),
('Congo (Congo-Brazzaville)'),
('Costa Rica'),
('Croatia'),
('Cuba'),
('Cyprus'),
('Czechia'),
('Denmark'),
('Djibouti'),
('Dominica'),
('Dominican Republic'),
('Ecuador'),
('Egypt'),
('El Salvador'),
('Equatorial Guinea'),
('Eritrea'),
('Estonia'),
('Eswatini'),
('Ethiopia'),
('Fiji'),
('Finland'),
('France'),
('Gabon'),
('Gambia'),
('Georgia'),
('Germany'),
('Ghana'),
('Greece'),
('Grenada'),
('Guatemala'),
('Guinea'),
('Guinea-Bissau'),
('Guyana'),
('Haiti'),
('Honduras'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Israel'),
('Italy'),
('Jamaica'),
('Japan'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Korea, North'),
('Korea, South'),
('Kosovo'),
('Kuwait'),
('Kyrgyzstan'),
('Laos'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall Islands'),
('Mauritania'),
('Mauritius'),
('Mexico'),
('Micronesia'),
('Moldova'),
('Monaco'),
('Mongolia'),
('Montenegro'),
('Morocco'),
('Mozambique'),
('Myanmar (formerly Burma)'),
('Namibia'),
('Nauru'),
('Nepal'),
('Netherlands'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('North Macedonia'),
('Norway'),
('Oman'),
('Pakistan'),
('Palau'),
('Palestine State'),
('Panama'),
('Papua New Guinea'),
('Paraguay'),
('Peru'),
('Philippines'),
('Poland'),
('Portugal'),
('Qatar'),
('Romania'),
('Russia'),
('Rwanda'),
('Saint Kitts and Nevis'),
('Saint Lucia'),
('Saint Vincent and the Grenadines'),
('Samoa'),
('San Marino'),
('Sao Tome and Principe'),
('Saudi Arabia'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Slovakia'),
('Slovenia'),
('Solomon Islands'),
('Somalia'),
('South Africa'),
('South Sudan'),
('Spain'),
('Sri Lanka'),
('Sudan'),
('Suriname'),
('Sweden'),
('Switzerland'),
('Syria'),
('Taiwan'),
('Tajikistan'),
('Tanzania'),
('Thailand'),
('Timor-Leste'),
('Togo'),
('Tonga'),
('Trinidad and Tobago'),
('Tunisia'),
('Turkey'),
('Turkmenistan'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('United Arab Emirates'),
('United Kingdom'),
('United States of America'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Vatican City'),
('Venezuela'),
('Vietnam'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `user_shippings`
--

CREATE TABLE `user_shippings` (
  `shipping_id` int(11) NOT NULL,
  `declared_items` varchar(255) DEFAULT NULL,
  `declared_weight` int(255) DEFAULT NULL,
  `delicate_type` varchar(255) DEFAULT NULL,
  `package_type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipment_price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_shippings`
--

INSERT INTO `user_shippings` (`shipping_id`, `declared_items`, `declared_weight`, `delicate_type`, `package_type`, `user_id`, `shipment_price`) VALUES
(1000, 'Basketball', 120, 'Sturdy', 'Crates', 1014, 18900),
(1001, 'Chico', 420, 'Fragile', 'Crates', 1014, 18900),
(1002, 'Honda car', 1200, 'Sturdy', 'Pallets', 1014, 54000),
(1003, 'Baseball cap', 50, 'Sturdy', 'Flexible Packaging', 1014, 2250),
(1004, 'Basketball', 120, 'Fragile', 'Cardboard boxes', 1014, 5400),
(1005, 'Basketball', 120, 'Fragile', 'Cardboard boxes', 1014, 675),
(1006, 'Basketball', 13, 'Fragile', 'Cardboard boxes', 1014, 780),
(1007, 'Apple', 12, 'Sturdy', 'Pallets', 1014, 1440);

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_address` varchar(250) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`id`, `username`, `first_name`, `last_name`, `password`, `user_address`, `email`, `mobile`) VALUES
(1000, 'jocko', 'Nemfa', 'Jerusalem', ' nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jocko@gmail.com', '99210382434'),
(1001, 'michael', 'Michael', 'Woods', ' nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', ' nickoPogi123@', '99140237434'),
(1002, 'user_riley', 'Riley', 'Jade', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'riley@gmail.com', '99110187434'),
(1004, 'Michael12', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'michael@gmail.com', '99120137434'),
(1005, 'jorge', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jorge@gmail.com', '99110187431'),
(1006, 'Kray', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'kray@gmail.com', '99410187432'),
(1007, 'miguel', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'miguel@gmail.com', '99110187432'),
(1010, 'Raymark', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'raymark@gmail', '99119187431'),
(1011, 'jaaan', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'john@gmail.com', '99710187434'),
(1012, 'jasper', 'Philipsen', 'Jasper', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jasper@gmail.com', '19110187434'),
(1013, 'paredes', 'Clark', 'Jamie', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jamie@gmail.com', '99110187444'),
(1014, 'user_nicko', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'judegeronaga@yahoo.com', '99110187436'),
(1016, 'Jayco', 'Jayco', 'Vallejo', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jayco@gmail.com', '19150147434'),
(1020, 'USER_NICKO', 'Nicko Ronem', 'Geronaga', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'nickogeronaga7@gmail.com', '99111187434'),
(1021, 'JOCKO', 'Jocko ', 'Willink', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'Jocko@gmail.com', '11110187439'),
(1022, 'Ruben', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'ruben@gmail.com', '99115187430'),
(1023, 'user_jonel', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jonelpogi@gmail.com', '11110187431'),
(1024, 'Jhon', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jhon@gmail.com', '22110187434'),
(1025, 'kristine', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'kristine@gmail.com', '11110187435'),
(1026, 'Klay', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'Klay@gmail.com', '69110187431'),
(1027, 'jordan', 'Nemfa', 'Jerusalem', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'jordan@gmail.com', '44110187434'),
(1028, 'Raydork', 'Nemfa', 'Jerusalem', 'nickoPogi1234@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'raydork@gmail.com', '99450187434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_countries`
--
ALTER TABLE `delivery_countries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pickup_countries`
--
ALTER TABLE `pickup_countries`
  ADD PRIMARY KEY (`pickup_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_shippings`
--
ALTER TABLE `user_shippings`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_countries`
--
ALTER TABLE `delivery_countries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `pickup_countries`
--
ALTER TABLE `pickup_countries`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `user_shippings`
--
ALTER TABLE `user_shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_countries`
--
ALTER TABLE `delivery_countries`
  ADD CONSTRAINT `delivery_countries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`id`);

--
-- Constraints for table `pickup_countries`
--
ALTER TABLE `pickup_countries`
  ADD CONSTRAINT `pickup_countries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`id`);

--
-- Constraints for table `user_shippings`
--
ALTER TABLE `user_shippings`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`id`),
  ADD CONSTRAINT `user_shippings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
