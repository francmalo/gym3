-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 06:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymnsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `AccessMember` int(11) DEFAULT 0,
  `AccessEquipment` int(11) DEFAULT 0,
  `AccessAttendance` int(11) DEFAULT 0,
  `AccessCustomerprogress` int(11) DEFAULT 0,
  `AccessStatus` int(11) DEFAULT 0,
  `AccessPayment` int(11) DEFAULT 0,
  `AccessAnnouncement` int(11) DEFAULT 0,
  `AccessStaff` int(11) DEFAULT 0,
  `AccessAccounting` int(11) DEFAULT 0,
  `AccessReport` int(11) DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `nationalid` int(11) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `payrollno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`, `AccessMember`, `AccessEquipment`, `AccessAttendance`, `AccessCustomerprogress`, `AccessStatus`, `AccessPayment`, `AccessAnnouncement`, `AccessStaff`, `AccessAccounting`, `AccessReport`, `email`, `address`, `nationalid`, `gender`, `contact`, `designation`, `payrollno`) VALUES
(2, 'admin', 'f2d0ff370380124029c2b807a924156c', 'admin', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 'admin@gmail.com', 'P.O BOX 90100', 34567321, 'Male', '798739756', '', ''),
(5, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ian', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'frncsmalombe7328@gmail.com', '01 kitui', NULL, 'Male', '790309700', 'Cashier', ''),
(6, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Grace', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'frncsmalombe7328@gmail.com', '01 kitui', NULL, 'Male', '790309700', 'Cashier', ''),
(7, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'One', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'frncsmalombe7328@gmail.com', '01 kitui', NULL, 'Male', '790309700', 'Cashier', ''),
(8, 'two', '5f4dcc3b5aa765d61d8327deb882cf99', 'Two', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'frncsmalombe7328@gmail.com', '01 kitui', NULL, 'Female', '790309700', 'Cashier', ''),
(10, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Francis Mutua', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'frncsmalombe7328@gmail.com', '01 kitui', 23455266, 'Male', '790309700', 'Front Desk Staff', 'kp1234567');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `message`, `date`) VALUES
(7, 'This is to announce that our GYM will remain close for 51 days due to COVID-19.', '2020-03-30'),
(8, 'Opening of GYM Halls and Clubs are not fixed yet. Stay tuned for more updates!!', '2020-04-03'),
(9, 'Renovation Going On...', '2020-04-04'),
(10, 'This is a demo announcement from admin', '2022-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `vendor`, `description`, `address`, `contact`, `date`, `status`, `location`) VALUES
(3, 'Treadmill', 909, 4, 'DnS', 'Edited Description', '7 Cedarstone Drive', '8521479633', '2019-03-07', '', NULL),
(4, 'Vertical Press Machine', 949, 3, 'SS Industries', 'For Biceps And Triceps, Upper Back, Chest', '7 Cedarstone Drive', '1245558980', '2020-03-19', '', NULL),
(5, 'Dumbell - Adjustable', 102, 26, 'Uptown Suppliers', 'Material: Steel, Rubber Plastic, Concrete', '7 Cedarstone Drive', '9875552100', '2020-03-29', '', NULL),
(6, 'Multi Bench Press Machine', 219, 2, 'DnS Suppliers', '6 In 1 Multi Bench With Incline, Flat, Decline Ben', '7 Cedarstone Drive', '7410001010', '2020-04-05', '', NULL),
(7, 'Demo', 265, 5, 'Demo', 'This is a demo test.', '77 Demo Lane', '8524445452', '2020-04-03', '', NULL),
(10, 'RowWarrior Fitness Rowing Mach', 5616, 12, 'Roww Stores', 'HIGHEST QUALITY: This best of class air rowing mac', '52 Weekley Street', '7412585555', '2021-06-12', '', NULL),
(13, 'ddd', 51000, 3, 'DataPost', 'Comodo PositiveSSL Wildcard (', 'P.O BOX 1463-00515', '0789484744', '2024-01-31', 'Operational', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `Invoiceno` varchar(200) NOT NULL,
  `paidto` varchar(200) NOT NULL,
  `dateofinvoice` varchar(220) NOT NULL,
  `datepaid` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `proceedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `attendance_count` int(11) DEFAULT 0,
  `ini_weight` int(11) NOT NULL DEFAULT 0,
  `curr_weight` int(11) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) DEFAULT '',
  `curr_bodytype` varchar(50) DEFAULT '',
  `progress_date` date DEFAULT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `dor`, `services`, `amount`, `paid_date`, `p_year`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`, `reminder`) VALUES
(8, 'Charles Anderson', 'charles', 'f2d0ff370380124029c2b807a924156c', 'Male', '2020-01-02', 'Fitness', 165, '2023-12-07', 2020, '3', '99 Heron Way', '8520258520', 'Active', 17, 91, 85, 'Fat', 'Bulked', '2023-12-06', 0),
(11, 'Justin Schexnayder', 'justin', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2019-01-25', 'Cardio', 40, '2023-12-06', 2020, '1', '14 Blair Court', '7535752220', 'Active', 9, 0, 0, '', '', '0000-00-00', 1),
(14, 'Ryan Crowl', 'ryan', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2019-07-13', 'Fitness', 165, '2023-12-06', 2020, '3', '34 Twin Oaks Drive', '1578880010', 'Active', 13, 59, 63, 'Slim', 'Slim', '2020-04-23', 0),
(17, 'Karen McGray', 'karen', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-04-02', 'Cardio', 120, '2022-05-31', 2020, '3', '23 Rubaiyat Road', '7441002540', 'Active', 12, 0, 0, '', '', '0000-00-00', 0),
(18, 'Jeanne Pratt', 'prattj', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-04-04', 'Fitness', 55, '2021-06-11', 2021, '1', '86 Hilltop Street', '7854445410', 'Active', 11, 0, 0, '', '', '0000-00-00', 0),
(19, 'George Fann', 'george', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2019-04-02', 'Fitness', 55, '2021-06-11', 2021, '1', '43 Oak Drive', '0258987850', 'Active', 22, 0, 0, '', '', '0000-00-00', 1),
(20, 'Wendy Scott', 'wendy', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-03-21', 'Fitness', 55, '2021-06-11', 2021, '1', '24 Cody Ridge Road', '8547896520', 'Active', 18, 0, 0, '', '', '0000-00-00', 0),
(21, 'Patrick Wilson', 'patrick', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2020-04-02', 'Cardio', 120, '2022-06-01', 2021, '3', '24 Cody Ridge Road', '9874568520', 'Active', 11, 0, 0, '', '', '0000-00-00', 0),
(24, 'Richard G Langston', 'richard', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '1990-02-02', 'Sauna', 420, '2022-05-31', 2022, '12', '541  Raoul Wallenber', '7012545580', 'Active', 1, 0, 0, '', '', '0000-00-00', 0),
(25, 'Raymond Ledesma', 'raymond', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '1986-02-19', 'Cardio', 480, '2023-12-07', 2022, '12', '2954  Robinson Lane', '4785450002', 'Active', 2, 0, 0, '', '', '0000-00-00', 0),
(26, 'Mattie F. Maher', 'mattie', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '1995-05-18', 'Sauna', 420, '2022-06-01', 2022, '12', '73 Settlers Lane', '9995554444', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(27, 'Justin C. Lusk', 'justin', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '1995-12-12', 'Cardio', 40, '2022-05-30', 2022, '1', '45 Bell Street', '3545785540', 'Active', 1, 0, 0, '', '', '0000-00-00', 0),
(29, 'Kathy J. Glennon', 'kathy', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2022-06-02', 'Fitness', 330, '2022-06-02', 0, '6', '87 Harry Place', '7896587458', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(30, 'Ian Summer', 'Ian', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', '2023-12-07', 'Cardio', 40, '2023-12-07', 2023, '1', '01 kitui', '0489484744', 'Active', 0, 0, 0, '', '', NULL, 0),
(32, 'Francis Mutua', 'Francis', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', '2023-12-07', 'Cardio', 40, '2023-12-07', 2023, '1', '01 kitui', '0489484744', 'Active', 0, 0, 0, '', '', NULL, 0),
(33, 'Marriane Luke', 'Marriane', '5f4dcc3b5aa765d61d8327deb882cf99', 'Female', '2023-12-07', 'Cardio', 360, '2023-12-07', 2023, '3', 'P.O BOX 1463-00515', '0489484744', 'Active', 0, 0, 0, '', '', NULL, 0),
(34, 'Francis Mutua', 'Francis', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', '2023-12-07', 'Cardio', 120, '2023-12-07', 2023, '3', 'P.O BOX 1463-00515', '0489484744', 'Active', 0, 0, 0, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `charge`) VALUES
(1, 'Fitness', '55'),
(2, 'Sauna', '35'),
(3, 'Cardio', '40');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `name`, `message`, `status`, `date`, `user_id`) VALUES
(12, 'staff', 'asd', 'unread', '2020-04-16 22:39:59', 0),
(13, 'staff', 'asdasdas', 'unread', '2020-04-16 22:40:49', 0),
(14, 'staff', 'ASasA', 'unread', '2020-04-16 22:41:59', 0),
(15, 'staff', 'asdasdasd', 'unread', '2020-04-16 22:42:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `username`, `password`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(1, 'bruno', 'f2d0ff370380124029c2b807a924156c', 'brunoden@mail.com', 'Bruno Den', '26 Morris Street', 'Cashier', 'Male', 852028120),
(2, 'admin', 'cac29d7a34687eb14b37068ee4708e7b', 'michelle@mail.com', '', 'P.O BOX 90100', 'Manager', 'Male', 798739756),
(3, 'james', 'cac29d7a34687eb14b37068ee4708e7b', 'jamesb@mail.com', 'James Brown', '12 Deer Ridge Drive', 'Trainer', 'Male', 2147483647),
(5, 'Francis', '5f4dcc3b5aa765d61d8327deb882cf99', 'frncsmalombe7328@gmail.com', 'Francis Mutua', '01 kitui', 'GYM Assistant', 'Male', 790309700);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(20, 'In Progress', 'Test Completed', 14),
(21, 'In Progress', 'Mastering Crunches', 6),
(22, 'In Progress', 'Standing Workouts For Flat Abs', 6),
(23, 'In Progress', 'Triceps Buildup - 3 set', 14),
(24, 'Pending', 'Decline dumbbell bench press', 6),
(27, 'Pending', 'dddd', 0),
(28, 'In Progress', 'Test 1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `weight_log`
--

CREATE TABLE `weight_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weight_log`
--

INSERT INTO `weight_log` (`id`, `user_id`, `weight`, `entry_date`) VALUES
(1, 8, 74.00, '2023-12-15'),
(2, 8, 46.00, '2023-12-18'),
(3, 8, 56.00, '2023-12-18'),
(4, 8, 84.00, '2023-12-19'),
(5, 8, 65.00, '2023-12-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_log`
--
ALTER TABLE `weight_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `weight_log`
--
ALTER TABLE `weight_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weight_log`
--
ALTER TABLE `weight_log`
  ADD CONSTRAINT `weight_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
