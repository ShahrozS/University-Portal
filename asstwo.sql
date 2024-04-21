-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 11:40 AM
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
-- Database: `asstwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `lectureno` int(11) NOT NULL,
  `date` date NOT NULL,
  `presence` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userid`, `courseid`, `lectureno`, `date`, `presence`) VALUES
(1, 2, 1, 1, '2024-04-21', 'P'),
(2, 5, 1, 1, '2024-04-21', 'A'),
(3, 12, 1, 1, '2024-04-21', 'P'),
(4, 3, 8, 2, '2024-04-21', 'A'),
(5, 9, 8, 2, '2024-04-21', 'P'),
(6, 2, 1, 2, '2024-04-21', 'A'),
(7, 5, 1, 2, '2024-04-21', 'P'),
(8, 12, 1, 2, '2024-04-21', 'A'),
(9, 2, 1, 3, '2024-04-21', 'P'),
(10, 5, 1, 3, '2024-04-21', 'A'),
(11, 12, 1, 3, '2024-04-21', 'P'),
(12, 2, 1, 4, '2024-04-12', 'A'),
(13, 5, 1, 4, '2024-04-12', 'P'),
(14, 12, 1, 4, '2024-04-12', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `instructor_id`) VALUES
(1, 'Programming', 22),
(2, 'Mathematics', 23),
(3, 'Biology', 24),
(4, 'Chemistry', 25),
(5, 'Physics', 26),
(6, 'Literature', 23),
(7, 'History', 23),
(8, 'Geography', 22),
(9, 'Economics', 24),
(10, 'Psychology', 26);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `assigment` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `midterm` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `userid`, `courseid`, `project`, `assigment`, `quiz`, `midterm`, `final`, `grade`) VALUES
(1, 1, 2, 0, 0, 0, 0, 0, 'I'),
(2, 2, 2, 0, 0, 0, 0, 0, 'I'),
(3, 2, 3, 0, 0, 0, 0, 0, 'I'),
(4, 2, 4, 0, 0, 0, 0, 0, 'I'),
(5, 2, 5, 0, 0, 0, 0, 0, 'I'),
(6, 3, 6, 0, 0, 0, 0, 0, 'I'),
(7, 3, 7, 0, 0, 0, 0, 0, 'I'),
(8, 3, 8, 0, 0, 0, 0, 0, 'I'),
(9, 4, 9, 0, 0, 0, 0, 0, 'I'),
(10, 4, 10, 0, 0, 0, 0, 0, 'I'),
(11, 5, 1, 12, 41, 12, 32, 23, 'B'),
(12, 5, 2, 0, 0, 0, 0, 0, 'I'),
(13, 5, 3, 0, 0, 0, 0, 0, 'I'),
(14, 6, 4, 0, 0, 0, 0, 0, 'I'),
(15, 6, 5, 0, 0, 0, 0, 0, 'I'),
(16, 7, 6, 0, 0, 0, 0, 0, 'I'),
(17, 8, 7, 0, 0, 0, 0, 0, 'I'),
(18, 9, 8, 0, 0, 0, 0, 0, 'I'),
(19, 10, 9, 0, 0, 0, 0, 0, 'I'),
(20, 11, 10, 0, 0, 0, 0, 0, 'I'),
(21, 12, 1, 0, 0, 0, 0, 0, 'I'),
(22, 13, 2, 0, 0, 0, 0, 0, 'I'),
(23, 14, 3, 0, 0, 0, 0, 0, 'I'),
(24, 15, 4, 0, 0, 0, 0, 0, 'I');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `uid`, `cid`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 4, 9),
(10, 4, 10),
(11, 5, 1),
(12, 5, 2),
(13, 5, 3),
(14, 6, 4),
(15, 6, 5),
(16, 7, 6),
(17, 8, 7),
(18, 9, 8),
(19, 10, 9),
(20, 11, 10),
(21, 12, 1),
(22, 13, 2),
(23, 14, 3),
(24, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'Ali', 'Khann', 'ali123', 'password123', 'student'),
(3, 'Ahmed', 'Hussain', 'ahmed456', 'password456', 'student'),
(4, 'Fatima', 'Ali', 'fatima789', 'password789', 'student'),
(5, 'Aisha', 'Iqbal', 'aisha101', 'password101', 'student'),
(6, 'Muhammad', 'Shah', 'muhammad202', 'password202', 'student'),
(7, 'Hassan', 'Raza', 'hassan303', 'password303', 'student'),
(8, 'Hussein', 'Hassan', 'hussein404', 'password404', 'student'),
(9, 'Zainab', 'Nawaz', 'zainab505', 'password505', 'student'),
(10, 'Sana', 'Akhtar', 'sana606', 'password606', 'student'),
(11, 'Hamza', 'Siddiqui', 'hamza707', 'password707', 'student'),
(12, 'Saim', 'Malik', 'saim808', 'password808', 'student'),
(13, 'Hina', 'Zaidi', 'hina909', 'password909', 'student'),
(14, 'Tariq', 'Amin', 'tariq101', 'password101', 'student'),
(15, 'Sadia', 'Abbasi', 'sadia202', 'password202', 'student'),
(22, 'Kamran', 'alii', 'kamran123', 'password123', 'faculty'),
(23, 'Ayesha', 'Hussain', 'ayesha456', 'password456', 'faculty'),
(24, 'Imran', 'Ahmed', 'imran789', 'password789', 'faculty'),
(25, 'Sadia', 'Khan', 'sadia101', 'password101', 'faculty'),
(26, 'Nida', 'Shah', 'nida202', 'password202', 'faculty'),
(31, 'shahroz', 'salman', 'shahroz', '123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid_attendance` (`userid`),
  ADD KEY `fk_courseid_attendance` (`courseid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instructorid_course` (`instructor_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courseid_course` (`courseid`),
  ADD KEY `fk_userid_grades` (`userid`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_courseid_attendance` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userid_attendance` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_instructorid_course` FOREIGN KEY (`instructor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_courseid_course` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userid_grades` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
