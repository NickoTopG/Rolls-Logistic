-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 02:49 AM
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
(1000, 'Andorra', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-26'),
(1001, 'Angola', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-29'),
(1002, 'Algeria', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-29'),
(1003, 'Bhutan', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-29'),
(1005, 'Benin', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-29'),
(1006, 'Bhutan', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1000, '2024-02-24'),
(1008, 'Albania', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1125, '2024-02-24'),
(1009, 'Bhutan', 'Blk 12 Lot 16 Guijo street Celina Mansion Subdivision, Brgy. Loma City of Binan', 1125, '2024-02-17'),
(1010, 'Benin', '121', 1000, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp_column` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`, `username`, `timestamp_column`) VALUES
(0, 'Screenshot 2024-02-07 075050.jpg', '0', '2024-02-07 00:01:53'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 00:08:03'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:04:33'),
(0, 'Screenshot 2024-02-07 090118.jpg', '0', '2024-02-07 01:04:54'),
(0, 'Screenshot 2024-02-07 072614.jpg', '0', '2024-02-07 01:05:27'),
(0, 'Screenshot 2024-02-07 090118.jpg', '0', '2024-02-07 01:06:51'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:09:43'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:10:06'),
(0, 'Screenshot 2024-02-07 090130.jpg', '0', '2024-02-07 01:15:03'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:16:14'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:18:03'),
(0, 'Screenshot 2024-02-07 080446.jpg', '0', '2024-02-07 01:23:55'),
(0, 'Screenshot 2024-02-06 213408.jpg', '0', '2024-02-07 01:24:06'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:24:24'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:27:37'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:28:22'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:31:48'),
(0, 'Screenshot 2024-02-07 090118.jpg', '0', '2024-02-07 01:32:42'),
(0, 'Screenshot 2024-02-07 090118.jpg', '0', '2024-02-07 01:33:55'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:35:32'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:35:54'),
(0, 'Profile-pick.jpg', '0', '2024-02-07 01:39:06');

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
(1000, 'Angola', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-23'),
(1001, 'Bangladesh', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-01'),
(1002, 'Angola', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-01'),
(1003, 'Bhutan', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-09'),
(1005, 'Angola', 'Manila, Tondo luwalhati 43rd street', 'Inland', 1000, '2024-02-02'),
(1006, 'Belize', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-06'),
(1008, 'Andorra', 'Manila, Tondo luwalhati 43rd street', 'Plane', 1125, '2024-02-07'),
(1009, 'Angola', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1125, '2024-02-06'),
(1010, 'Algeria', 'Manila, Tondo luwalhati 43rd street', 'Vessel', 1000, '2024-02-09');

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
  `shipment_price` int(255) DEFAULT NULL,
  `shipping_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_shippings`
--

INSERT INTO `user_shippings` (`shipping_id`, `declared_items`, `declared_weight`, `delicate_type`, `package_type`, `user_id`, `shipment_price`, `shipping_code`) VALUES
(1000, 'Cart', 23, 'Fragile', 'Bags/Sacks', 1000, 1880, 'of*wYwi9'),
(1001, 'Mango', 24, 'Fragile', 'Pallets', 1000, 1940, 'dyo3+nlY'),
(1002, 'Oil lubricant', 23, 'Sturdy', 'Tubes', 1000, 1535, 'ym$6sYui'),
(1003, 'Motor', 400, 'Sturdy', 'Crates', 1000, 18500, '4w@caf5B'),
(1005, 'Moon cake', 40, 'Fragile', 'Crates', 1000, 2650, '@A5pYiwq'),
(1006, 'Papaya', 23, 'Fragile', 'Crates', 1000, 1880, 'P3u?vyHh'),
(1008, 'Apple', 40, 'Sturdy', 'Crates', 1125, 2550, 'PTdg4x&n'),
(1009, 'Rocket', 42, 'Fragile', 'Crates', 1125, 3020, 'kzYt7K@b'),
(1010, 'Brush', 40, 'Fragile', 'Bags/Sacks', 1000, 2900, 'Cu7Op_hc');

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
(1120, 'user_ronem', 'Nemfa', 'Jerusalem', '221528671Revpal@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'nickogeronaga7@gmail.com', '99110187434'),
(1125, 'user_nayco', 'Nicko Ronem', 'Geroanga', 'nickoPogi123@', 'Blk 12 Lot 16 Guijo street Celina Mansion subdivision', 'nickoronemgeronaga@gmail.com', '05093992392');

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
  ADD UNIQUE KEY `shipping_code` (`shipping_code`),
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
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `pickup_countries`
--
ALTER TABLE `pickup_countries`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `user_shippings`
--
ALTER TABLE `user_shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1126;

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
