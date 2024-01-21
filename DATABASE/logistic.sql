-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 02:48 AM
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
(1012, 'Palestine State', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-03-16'),
(1021, 'Belgium', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-01-31'),
(1024, 'Andorra', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-29');

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
  `pickup_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_countries`
--

INSERT INTO `pickup_countries` (`pickup_id`, `pickup_country`, `pickup_address`, `transportation`, `user_id`, `pickup_date`) VALUES
(1012, 'Vanuatu', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-24'),
(1021, 'Antigua and Barbuda', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-01-21'),
(1024, 'Algeria', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-01-21');

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
(1012, 'Papaya', 23, 'Fragile', 'Plastic Containers', 1000, 1035),
(1021, 'Mango', 42, 'Fragile', 'Crates', 1000, 1890),
(1024, 'Basketball', 24, 'Sturdy', 'Pallets', 1000, 1440);

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
(1000, 'user_nicko', 'Nicko Ronem', 'Geronaga', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'nickogeronaga16@gmail.com', '09828828381'),
(1001, 'user_raymond', 'Raymond', 'Cunanan', 'wKP6041@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'raymond@gmail.com', '09912871213');

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
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `pickup_countries`
--
ALTER TABLE `pickup_countries`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `user_shippings`
--
ALTER TABLE `user_shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

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
