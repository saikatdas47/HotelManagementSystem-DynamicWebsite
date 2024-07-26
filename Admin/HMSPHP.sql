-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2024 at 02:04 PM
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
-- Database: `HMSPHP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`sr_no`, `name`, `password`) VALUES
(1, 'saikat', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(300) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `totalprice` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `cardNumber` varchar(300) NOT NULL,
  `expiryMonth` int(11) NOT NULL,
  `expiryYear` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_name`, `name`, `email`, `checkin`, `checkout`, `totalprice`, `room_id`, `cardNumber`, `expiryMonth`, `expiryYear`, `cvv`) VALUES
(4, 'saikatdas47', 'w', 'w@gmail.com', '2024-07-25', '2024-08-28', 3400, 23, '3', 3, 3, 3),
(5, 'saikatdas47', 'ww', 'ww@gmail.com', '2024-07-25', '2024-07-27', 200, 23, '1', 1, 1, 1),
(7, 'saikatdas47', 'dd', 'dd@gmail.com', '2024-07-31', '2024-08-20', 2000, 23, '33', 3, 3, 3),
(8, 'saikatdas33', 'Saikat Das', 'ss@gmail.com', '2024-07-26', '2024-07-30', 400, 23, '36366363', 3, 3, 33),
(9, 'saikatdas33', 'Saikat Das', 'ss@gmail.com', '2024-07-26', '2024-07-31', 750, 24, '3', 33, 33, 33);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `features_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`features_id`, `name`, `image`, `description`) VALUES
(3, 'AC', 'images/features/ac.svg', 'ac'),
(4, 'WIFI', 'images/features/wifi.svg', 'wifi'),
(5, 'Landry', 'images/features/londry.svg', 'ss'),
(6, 'Heater', 'images/features/heater.svg', 'dd'),
(7, 'Claner', 'images/features/cleaner.svg', 'ss'),
(10, 'www', 'images/features/londry.svg', 'www'),
(11, 'new Fes', 'images/features/ac.svg', 'fes new');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(500) NOT NULL,
  `descriptions` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `features` varchar(500) NOT NULL,
  `area` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `descriptions`, `image`, `price`, `features`, `area`, `quantity`, `adult`, `child`) VALUES
(23, 'Room 1', 'A cozy room with modern amenities', 'images/rooms/2.png', 100, 'AC', 20, 2, 2, 1),
(24, 'Room 2', 'Spacious room with a great view', 'images/rooms/3.png', 150, 'Cleaner', 25, 3, 3, 2),
(25, 'Room 3', 'Comfortable room with free Wi-Fi', 'images/rooms/4.png', 120, 'Heater', 22, 1, 2, 1),
(26, 'Room 4', 'Luxurious room with all facilities', 'images/rooms/5.png', 200, 'Laundry', 30, 4, 4, 2),
(27, 'Room 5', 'Budget-friendly room with essentials', 'images/rooms/6.png', 80, 'TV', 18, 2, 2, 1),
(28, 'Room 6', 'Elegant room with modern decor', 'images/rooms/7.png', 130, 'WiFi', 23, 3, 3, 2),
(29, 'Room 7', 'Room with a beautiful view of the city', 'images/rooms/8.png', 160, 'AC', 28, 4, 4, 2),
(30, 'Room 8', 'Compact room perfect for a short stay', 'images/rooms/2.png', 90, 'Cleaner', 19, 2, 2, 1),
(31, 'Room 9', 'Spacious room with luxury bedding', 'images/rooms/3.png', 170, 'Heater', 26, 3, 3, 2),
(32, 'Room 10', 'Affordable room with essential amenities', 'images/rooms/4.png', 85, 'Laundry', 21, 2, 2, 1),
(33, 'Room 11', 'Stylish room with modern facilities', 'images/rooms/5.png', 140, 'TV', 24, 3, 3, 2),
(34, 'Room 12', 'Room with great amenities', 'images/rooms/6.png', 125, 'WiFi', 22, 1, 2, 1),
(35, 'Room 13', 'Comfortable room for family stays', 'images/rooms/7.png', 180, 'AC', 29, 4, 4, 2),
(36, 'Room 14', 'Room with beautiful interiors', 'images/rooms/8.png', 110, 'Cleaner', 20, 2, 2, 1),
(37, 'Room 15', 'Room with a modern touch', 'images/rooms/2.png', 135, 'Heater', 27, 3, 3, 2),
(38, 'Room 16', 'Economical room with good facilities', 'images/rooms/3.png', 95, 'Laundry', 19, 2, 2, 1),
(52, 'New', 'new', 'images/rooms/3.png', 44, 'WIFI, Landry, new Fes', 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `hotelname` varchar(100) NOT NULL,
  `hoteldes` varchar(100) NOT NULL,
  `map` varchar(1000) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `hotelname`, `hoteldes`, `map`, `insta`, `fb`, `tw`, `phone`, `email`) VALUES
(1, 'The Mark', 'Description PPP', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509197!2d144.95592831531645!3d-37.81720997975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf57720c7a21b7f0!2sVictoria%20Market!5e0!3m2!1sen!2sau!4v1614084412841!5m2!1sen!2sau', 'TheMark', 'TheMark', 'TheMark', '+123 456 7892', 'themark@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userData`
--

CREATE TABLE `userData` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userData`
--

INSERT INTO `userData` (`user_id`, `name`, `user_name`, `email`, `password`) VALUES
(7, 'Saikat Das', 'saikatdas47', 'saikatdas@gmail.com', '$2y$10$GyVqRuYxpSR56YyMz4Tqf.yFzolYJlT7ZPD4v1nBui3ABkdPgtbBu'),
(9, 'SaikatDas', 'saikatdas55', 'saikatdas55@gmail.com', '$2y$10$4tjHNHNYOiN35xE1qxvc0OgxMR6pdx9fCm3OEHUO32IPxkYifiLs2'),
(10, 'Saikat Das', 'saikatdas33', 'saikatdas33@gmail.com', '$2y$10$27wrJpWE4FD4oUOu/nudV.8vMfE7P.dxRMvOqueFWCOKl4dbSeOPK');

-- --------------------------------------------------------

--
-- Table structure for table `userMsg`
--

CREATE TABLE `userMsg` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userMsg`
--

INSERT INTO `userMsg` (`id`, `username`, `useremail`, `subject`, `msg`) VALUES
(1, 'Alice', 'alice@example.com', 'Inquiry', 'I would like to know more about your services.'),
(2, 'Bob', 'bob@example.com', 'Feedback', 'Great service! I had an amazing experience.'),
(3, 'Charlie', 'charlie@example.com', 'Complaint', 'I had an issue with my last order.'),
(4, 'Diana', 'diana@example.com', 'Suggestion', 'Consider adding more payment options.'),
(5, 'Ethan', 'ethan@example.com', 'Question', 'What are your business hours?'),
(6, 'Fiona', 'fiona@example.com', 'Thank You', 'Thank you for your excellent support!'),
(7, 'George', 'george@example.com', 'Inquiry', 'Do you offer discounts for bulk orders?'),
(8, 'Hannah', 'hannah@example.com', 'Request', 'Could you send me your latest catalog?'),
(9, 'Ian', 'ian@example.com', 'Feedback', 'Your website is very user-friendly!'),
(10, 'Jane', 'jane@example.com', 'Support', 'I need help with my account settings.'),
(39, 'ss', 'ss@gmail.com', 's', 's'),
(40, 'saikatdas33', 'saikatdas33@gmail.com', 'saikat das 33', 'Saikat DAs 33'),
(41, 'saikatdas33', 'saikatdas33@gmail.com', 'hello Update', 'Update'),
(43, 'saikatdas33', 'saikatdas33@gmail.com', 'rr', 'ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`features_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userMsg`
--
ALTER TABLE `userMsg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userData`
--
ALTER TABLE `userData`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userMsg`
--
ALTER TABLE `userMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
