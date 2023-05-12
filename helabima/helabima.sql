-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 11:39 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helabima`
--
CREATE DATABASE IF NOT EXISTS `helabima` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `helabima`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--
-- Creation: Oct 07, 2021 at 02:14 PM
-- Last update: Oct 10, 2021 at 09:06 AM
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `adID` varchar(6) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `img` varchar(10) NOT NULL,
  `pub_date` timestamp NULL DEFAULT current_timestamp(),
  `user_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `ads`:
--   `user_id`
--       `sellers` -> `user_id`
--

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`adID`, `heading`, `type`, `area`, `price`, `address`, `district`, `province`, `description`, `img`, `pub_date`, `user_id`) VALUES
('A13396', 'A paddy land for sale in kandy', 'Paddy Land', 15, 15000000, 'Diam eros, porta id venenatis', 'Anuradhapura', 'North Central', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-09 06:47:53', 'S1681'),
('A18033', 'Cinnamon land for sale', 'Cinnamon land', 5, 5000000, 'Address', 'Kegalle', 'Sabaragamuwa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-10 06:46:14', 'S8037'),
('A18138', 'Banana land for sale in Sooriyawewa', 'Banana land', 10, 10000000, 'Address', 'Hambantota', 'Southern', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-10 06:59:28', 'S8037'),
('A24487', 'Beach land for sale', 'Beachfront land', 10, 2000000, 'No. 17, Sed id mollis nulla, Suspendisse blandit', 'Mannar', 'Northern', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce convallis, est at eleifend suscipit, arcu orci eleifend arcu, quis malesuada metus lectus non turpis. Donec tempor sollicitudin ex, eget ornare velit feugiat ac. Suspendisse ut elit sit amet felis iaculis mattis. Nulla sed lorem nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas convallis pharetra dictum. Morbi id volutpat erat, at blandit magna. Cras elementum est id consequat lacinia.\r\n\r\nNunc urna ligula, maximus at consectetur a, volutpat in justo. Duis magna nisl, pellentesque id metus quis, luctus faucibus tortor. Sed non dui et nulla sagittis lobortis nec ac nisl. Donec a fermentum mauris. Vivamus interdum suscipit elit sit amet pharetra. Donec vel tincidunt nibh. Praesent a ante elit. Etiam est magna, gravida in lorem quis, sagittis finibus sapien. Praesent sagittis eros nec nisl vestibulum rhoncus. Nam mollis vel orci vel pretium. Curabitur ac justo luctus, tempus lorem tristique, pellentesque est. Ut eget pretium elit, dignissim sollicitudin risus. Proin ac dignissim ipsum. Cras blandit accumsan sapien sit amet varius. Ut dictum, quam a interdum auctor, lectus est tempus libero, ac posuere augue diam in augue.\r\n\r\nPraesent in scelerisque quam. Nullam convallis, nisl ac interdum finibus, risus diam placerat lacus, et scelerisque metus nisi a sem. Nam scelerisque quam sed erat condimentum, viverra tristique turpis bibendum. Aenean aliquam diam id odio pulvinar, id finibus sapien fringilla. Cras libero enim, volutpat vel nibh vitae, varius consectetur dolor. Duis ultrices odio in nisi porta auctor. Donec imperdiet, justo quis consectetur eleifend, eros diam tincidunt arcu, ut maximus orci eros sit amet nulla. Nullam aliquet diam eu velit varius consectetur. Etiam fermentum elementum est, quis aliquam nunc laoreet non. Suspendisse eget odio velit. ', 'jpg', '2021-10-07 07:07:53', 'S1305'),
('A25284', 'Coconut land for sale', 'Coconut Land', 15, 15000000, '\r\nDiam eros, porta venenatis', 'Kurunegala', 'North Western', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'JPG', '2021-10-09 07:14:19', 'S7134'),
('A36635', 'Bare land for sale', 'Bare land', 8, 1600000, '\r\nInteger diam eros, porta id', 'Batticaloa', 'Eastern', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-09 06:53:57', 'S1681'),
('A38926', 'A rubber land for sale', 'Rubber land', 10, 10000000, '\r\nInteger diam eros, porta id venenatis', 'Ratnapura', 'Sabaragamuwa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'webp', '2021-10-09 06:43:41', 'S0388'),
('A55519', 'Advertisement for bare land', 'Bare land', 9, 900000, 'Address ', 'Gampaha', 'Western', 'Sed at nunc ut leo sodales condimentum non condimentum ligula. Praesent in scelerisque quam. Nullam convallis, nisl ac interdum finibus, risus diam placerat lacus, et scelerisque metus nisi a sem. Nam scelerisque quam sed erat condimentum, viverra tristique turpis bibendum. Aenean aliquam diam id odio pulvinar, id finibus sapien fringilla. Cras libero enim, volutpat vel nibh vitae, varius consectetur dolor. Duis ultrices odio in nisi porta auctor. Donec imperdiet, justo quis consectetur eleifend, eros diam tincidunt arcu, ut maximus orci eros sit amet nulla. Nullam aliquet diam eu velit varius consectetur. Etiam fermentum elementum est, quis aliquam nunc laoreet non. Suspendisse eget odio velit.\r\n\r\nDuis ut erat at lectus consectetur feugiat at sed metus. Etiam imperdiet, libero a accumsan feugiat, mauris purus auctor nibh, nec tincidunt tortor tortor congue nibh. Aenean ultrices blandit dui eu malesuada. Aliquam erat volutpat. Maecenas erat enim, mattis et vehicula a, mattis sed urna. Integer quis condimentum sapien. Aenean ut aliquet nunc. Praesent quis auctor nulla. Cras consequat id justo quis feugiat. Quisque vel enim a arcu interdum condimentum sed eu ipsum. In eu faucibus orci, in posuere leo. Nulla dapibus dapibus ligula, a pretium eros facilisis et. In nec diam fringilla enim consectetur interdum ut a arcu. Nullam aliquam ex id condimentum porta.\r\n\r\nIn molestie sapien eu quam iaculis elementum. Donec eget lectus consequat risus blandit dictum. In id dignissim est. Fusce consectetur, ipsum sit amet auctor rhoncus, tortor sapien sodales orci, vel tempus tellus libero vitae arcu. Sed auctor tellus erat, at vestibulum ipsum interdum ac. Phasellus tempus lectus id dignissim volutpat. Nullam volutpat dui urna, non accumsan lectus convallis eleifend. Quisque non vehicula nulla, ut scelerisque lectus. Morbi sed dignissim massa. Nulla tempus ex at congue lobortis. Aliquam elementum enim mi, id ultrices orci pretium ac. Phasellus eget nunc lacus. Nam pellentesque mattis mauris. Ut finibus a velit vitae sollicitudin. Maecenas vitae. ', 'jpeg', '2021-10-06 13:56:11', 'S1305'),
('A64605', 'Tea land for sale in kandy', 'Tea land', 15, 15000000, 'Address', 'Kandy', 'Central', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-10 07:01:39', 'S7134'),
('A65902', 'Paddy land for sale', 'Paddy land', 12, 12000000, '\r\nInteger diam eros, porta id venenatis ut', 'Ampara', 'Eastern', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla nunc sit amet posuere sodales. Proin mi lacus, condimentum sit amet turpis sit amet, scelerisque vehicula ante. Nam et justo vitae quam viverra malesuada fringilla sed tellus. Pellentesque condimentum ut ipsum non molestie. Maecenas laoreet finibus bibendum. Morbi ut bibendum dui. Morbi quis magna neque. Nunc facilisis tellus et mauris pretium, vel efficitur sem tincidunt. Nullam porta posuere leo, quis viverra urna accumsan et. Mauris tincidunt, nisi eu lacinia luctus, eros libero finibus eros, sed tempus risus purus vitae ante. Donec scelerisque malesuada nisi, vitae interdum eros mollis ut. Phasellus eget libero vel nulla tincidunt commodo. Nunc pharetra et dui sed porta. Ut vitae enim consectetur dui pretium auctor. Vestibulum imperdiet eros nec ex elementum, quis sodales mauris maximus. Praesent iaculis risus at ex sollicitudin, id laoreet dolor tempus.\r\n\r\nInteger diam eros, porta id venenatis ut, mattis ege', 'jpg', '2021-10-08 10:03:39', 'S0388');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--
-- Creation: Oct 03, 2021 at 05:47 AM
--

DROP TABLE IF EXISTS `buyers`;
CREATE TABLE `buyers` (
  `user_id` varchar(21) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `buyers`:
--

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`user_id`, `user_name`, `email`, `password`, `date`) VALUES
('B19701519792027168242', 'IT21098246', 'it21098246@sliit.lk', '1234', '2021-10-08 07:48:07'),
('B19957977472906535816', 'IT21081934', 'it21081934@sliit.lk', '1234', '2021-10-08 07:47:44'),
('B24390990339362093650', 'IT21006852', 'it21006852@sliit.lk', '1234', '2021-10-08 07:48:37'),
('B71822059898070384413', 'IT21047688', 'it21047688@sliit.lk', '1234', '2021-10-08 07:47:22'),
('B95841949601701983857', 'IT21118340', 'it21118340@mail.com', '1234', '2021-10-08 11:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--
-- Creation: Oct 10, 2021 at 09:09 AM
-- Last update: Oct 10, 2021 at 09:15 AM
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payID` varchar(6) NOT NULL,
  `cardType` varchar(25) NOT NULL,
  `cardNumber` varchar(25) NOT NULL,
  `expireDate` date NOT NULL,
  `amount` float NOT NULL,
  `adID` varchar(6) NOT NULL,
  `payDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `payment`:
--   `adID`
--       `ads` -> `adID`
--

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payID`, `cardType`, `cardNumber`, `expireDate`, `amount`, `adID`, `payDate`) VALUES
('P01234', 'test', '01234', '2025-10-31', 200, 'A13396', '2021-10-10 09:08:22'),
('P12345', 'test', '12345', '2025-10-31', 200, 'A18033', '2021-10-10 09:08:50'),
('P23456', 'test', '23456', '2025-10-31', 200, 'A18138', '2021-10-10 09:10:51'),
('P34567', 'test', 'P34567', '2025-10-31', 200, 'A24487', '2021-10-10 09:11:46'),
('P45678', 'test', '45678', '2025-10-31', 200, 'A25284', '2021-10-10 09:14:59'),
('P56789', 'test', '56789', '2025-10-31', 200, 'A36635', '2021-10-10 09:15:00'),
('P67890', 'test', '67890', '2025-10-31', 200, 'A38926', '2021-10-10 09:15:00'),
('P78901', 'test', '78901', '2025-10-31', 200, 'A55519', '2021-10-10 09:15:00'),
('P89012', 'test', '89012', '2025-10-31', 200, 'A64605', '2021-10-10 09:15:00'),
('P90123', 'test', '90123', '2025-10-31', 200, 'A65902', '2021-10-10 09:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--
-- Creation: Oct 08, 2021 at 11:27 AM
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers` (
  `user_id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenum` char(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sellers`:
--

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`user_id`, `name`, `email`, `mobilenum`, `password`, `date`) VALUES
('S0388', 'D. S. Kumarathunga', 'dkumarathunga@mail.com', '0021118340', '1234', '2021-10-08 07:55:58'),
('S1305', 'Samiru Gamage', 'samirugamage@gmail.com', '0123456', '1234', '2021-10-06 11:34:17'),
('S1681', 'D. Liyanage', 'dliyanage@mail.com', '0021047688', '1234', '2021-10-08 10:08:36'),
('S7134', 'Tharu Samadhi', 'tharusamadhi@mail.com', '0111', '1234', '2021-10-09 06:40:59'),
('S8037', 'K. Padmika', 'kpadmika@mail.com', '0021081934', '1234', '2021-10-08 10:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--
-- Creation: Oct 08, 2021 at 04:38 PM
-- Last update: Oct 10, 2021 at 07:41 AM
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `user_id` varchar(21) NOT NULL,
  `adID` varchar(6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `wishlist`:
--   `user_id`
--       `buyers` -> `user_id`
--   `adID`
--       `ads` -> `adID`
--

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `adID`, `date`) VALUES
('B19701519792027168242', 'A13396', '2021-10-10 07:31:55'),
('B19701519792027168242', 'A18033', '2021-10-10 07:33:08'),
('B19957977472906535816', 'A18138', '2021-10-10 07:34:22'),
('B19957977472906535816', 'A25284', '2021-10-10 07:35:59'),
('B24390990339362093650', 'A36635', '2021-10-10 07:36:32'),
('B24390990339362093650', 'A38926', '2021-10-10 07:36:59'),
('B71822059898070384413', 'A13396', '2021-10-10 07:39:15'),
('B71822059898070384413', 'A18138', '2021-10-10 07:39:15'),
('B71822059898070384413', 'A64605', '2021-10-10 07:37:25'),
('B71822059898070384413', 'A65902', '2021-10-10 07:37:25'),
('B95841949601701983857', 'A18138', '2021-10-10 07:41:39'),
('B95841949601701983857', 'A25284', '2021-10-10 07:38:34'),
('B95841949601701983857', 'A38926', '2021-10-10 07:37:58'),
('B95841949601701983857', 'A55519', '2021-10-10 07:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`adID`),
  ADD KEY `fk` (`user_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`),
  ADD UNIQUE KEY `adID` (`adID`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`adID`),
  ADD KEY `fk02` (`adID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `fk` FOREIGN KEY (`user_id`) REFERENCES `sellers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fkPayAds` FOREIGN KEY (`adID`) REFERENCES `ads` (`adID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk01` FOREIGN KEY (`user_id`) REFERENCES `buyers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk02` FOREIGN KEY (`adID`) REFERENCES `ads` (`adID`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table ads
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'helabima', 'ads', '{\"sorted_col\":\"`ads`.`adID` ASC\"}', '2021-10-10 09:10:21');

--
-- Metadata for table buyers
--

--
-- Metadata for table payment
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'helabima', 'payment', '{\"sorted_col\":\"`payment`.`payID`  DESC\"}', '2021-10-10 09:16:43');

--
-- Metadata for table sellers
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'helabima', 'sellers', '{\"sorted_col\":\"`sellers`.`password`  ASC\"}', '2021-10-06 12:52:02');

--
-- Metadata for table wishlist
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'helabima', 'wishlist', '{\"sorted_col\":\"`date` DESC\"}', '2021-10-10 07:32:26');

--
-- Metadata for database helabima
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
