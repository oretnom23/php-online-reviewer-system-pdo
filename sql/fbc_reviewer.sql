-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 04:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbc_reviewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `examproper`
--

CREATE TABLE `examproper` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `passing_rate` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `access_code` text NOT NULL,
  `test_desc` text NOT NULL,
  `category_exam` text NOT NULL,
  `date_time` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examproper`
--

INSERT INTO `examproper` (`test_id`, `user_id`, `total_questions`, `passing_rate`, `time_limit`, `access_code`, `test_desc`, `category_exam`, `date_time`, `date_expired`) VALUES
(71, 48, 1, 100, 10, 'SDSNDZ', 'CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 25, 1, 75, 60, '5WC8HD', ' CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', '2018-12-20 12:12:00', '2018-12-21 12:13:00'),
(94, 25, 4, 100, 60, 'GDUKAQ', 'CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', '2019-01-09 02:34:00', '2019-01-10 03:34:00'),
(96, 25, 1, 100, 60, 'FNQMHB', 'ECE', 'Sturctural Design', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 25, 2, 100, 60, 'CXXVYG', 'ECE', 'Sturctural Design', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 25, 2, 90, 60, 'ABCDE', 'CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `q_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_desc` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`q_id`, `test_id`, `question_desc`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `user_id`, `test_desc`) VALUES
(84, 70, '2', '2', '1', '3', '3', '2', 25, ''),
(85, 70, '2', '2', '3', '4', '4', '2', 25, ''),
(86, 70, '123', '123', '123', '123', '213', '123', 25, ''),
(87, 72, 'QUESTION PROPER', '1', '2', '3', '4', '1', 25, ''),
(88, 81, 'porper2', '123', '312', '123', '123', '123', 25, ''),
(89, 89, 'test', '1', '2', '3', '4', '1', 25, ''),
(90, 90, 'wala', 'wala', 'wala', 'wala', 'wala', 'wala', 25, ''),
(91, 91, 'finals', '11', '22', '33', '44', '11', 25, ''),
(92, 92, 'miss', 'miss', 'miss', 'miss', 'miss', 'miss', 25, ''),
(93, 92, 'missa', 'missa', 'missa', 'missa', 'miss', 'missa', 25, ''),
(94, 93, 'proper', '1', '2', '3', '4', '1', 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `pre_questions`
--

CREATE TABLE `pre_questions` (
  `q_id` int(10) NOT NULL,
  `test_id` int(10) NOT NULL,
  `question_desc` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_questions`
--

INSERT INTO `pre_questions` (`q_id`, `test_id`, `question_desc`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `user_id`) VALUES
(0, 0, 'qw', 'qwe', 's', 'qwe', 'qe', 'qwe', 25),
(0, 3, 'wqe', 'qwe', 'wqe', 'qwe', 'qwe', 'qwe', 25);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_desc` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment_file` varchar(90) NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  `subject` varchar(90) NOT NULL,
  `Course` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `test_id`, `question_desc`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `user_id`, `attachment_file`, `difficulty_id`, `subject`, `Course`) VALUES
(223, 138, 'where', '1', '2', '3', '4', '1', 48, '', 0, '', ''),
(233, 0, 'sa', 'qw', 'aq', 'aq', 'q', 'qw', 25, 'files/', 2, 'Sturctural Design', 'ECE'),
(234, 0, 'asd', 's', 's', 'as', 'sad', 's', 25, 'files/', 2, 'Sturctural Design', 'ECE'),
(235, 0, 'sad', 'sad', 'sad', 'sad', 'sad', 'sad', 25, 'files/', 1, 'Mathematics, Surveying and Transportation Engineering', 'CIVIL ENGINEERING'),
(237, 0, 'sad', 'sad', 'd', 'sad', 'asd', 'sad', 25, 'files/', 1, 'Mathematics, Surveying and Transportation Engineering', 'CIVIL ENGINEERING'),
(238, 0, 'Sample Question', 'Right', 'Wrong', 'Wrong', 'Wrong', 'Right', 25, 'files/', 1, 'Mathematics, Surveying and Transportation Engineering', 'CIVIL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata_exams`
--

CREATE TABLE `studentdata_exams` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata_exams`
--

INSERT INTO `studentdata_exams` (`id`, `test_id`, `q_id`, `answer`, `status`, `student_id`, `access_code`) VALUES
(1, 94, 228, 'asd', 1, 53, 'GDUKAQ'),
(2, 94, 212, '21', 0, 53, 'GDUKAQ'),
(3, 94, 214, '2', 0, 53, 'GDUKAQ'),
(4, 94, 213, '3', 1, 53, 'GDUKAQ'),
(5, 97, 233, 'qw', 1, 53, 'CXXVYG'),
(6, 97, 234, '', 0, 53, 'CXXVYG'),
(7, 98, 237, 'sad', 1, 55, 'ABCDE'),
(8, 98, 238, 'Right', 1, 55, 'ABCDE');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata_tests`
--

CREATE TABLE `studentdata_tests` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata_tests`
--

INSERT INTO `studentdata_tests` (`id`, `test_id`, `q_id`, `answer`, `status`, `student_id`) VALUES
(1, 136, 212, '2', 1, 53),
(2, 136, 213, '3', 1, 53),
(3, 137, 228, 'asd', 1, 53),
(4, 136, 212, '', 0, 53),
(5, 136, 213, '', 0, 53),
(6, 136, 212, '', 0, 53),
(7, 136, 213, '', 0, 53),
(8, 136, 212, '', 0, 53),
(9, 136, 213, '', 0, 53),
(10, 136, 212, '21', 0, 53),
(11, 136, 213, '3', 1, 53),
(12, 136, 212, '2', 1, 53),
(13, 136, 213, '3', 1, 53),
(14, 136, 212, '2', 1, 53),
(15, 136, 213, '', 0, 53),
(16, 136, 228, '', 0, 53),
(17, 137, 228, 'asd', 1, 53),
(18, 151, 238, 'Right', 1, 55),
(19, 151, 238, 'Right', 1, 55),
(20, 151, 238, 'Right', 1, 55),
(21, 151, 238, '', 0, 55),
(22, 151, 238, 'Right', 1, 55),
(23, 151, 238, '', 0, 55),
(24, 151, 238, 'Right', 1, 55);

-- --------------------------------------------------------

--
-- Table structure for table `studentresult_exams`
--

CREATE TABLE `studentresult_exams` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_taken` text NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult_exams`
--

INSERT INTO `studentresult_exams` (`id`, `student_id`, `test_id`, `score`, `percentage`, `remarks`, `date_taken`, `access_code`) VALUES
(183, 47, 70, 1, 50, 'FAILED', 'Nov, 28 2018', ''),
(184, 47, 137, 0, 0, 'FAILED', 'Nov, 28 2018', ''),
(185, 47, 136, 4, 100, 'PASSED', 'Nov, 28 2018', ''),
(186, 47, 72, 1, 100, 'PASSED', 'Dec, 16 2018', ''),
(187, 47, 89, 1, 100, 'PASSED', 'Dec, 16 2018', ''),
(188, 47, 89, 0, 0, 'FAILED', 'Dec, 16 2018', ''),
(189, 47, 90, 1, 100, 'PASSED', 'Dec, 16 2018', ''),
(190, 47, 91, 1, 100, 'PASSED', 'Dec, 16 2018', ''),
(191, 52, 91, 0, 0, 'FAILED', 'Dec, 16 2018', ''),
(192, 47, 92, 1, 100, 'PASSED', 'Dec, 17 2018', ''),
(193, 53, 93, 0, 0, 'FAILED', 'Dec, 17 2018', ''),
(194, 53, 136, 1, 25, 'FAILED', 'Jan, 04 2019', ''),
(195, 53, 136, 0, 0, 'FAILED', 'Jan, 04 2019', ''),
(196, 25, 136, 1, 50, 'PASSED', 'Jan, 08 2019', ''),
(197, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(198, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(199, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(200, 53, 137, 1, 33, 'FAILED', 'Jan, 10 2019', ''),
(201, 53, 94, 0, 0, 'FAILED', 'Jan, 10 2019', ''),
(202, 53, 94, 2, 50, 'FAILED', 'Jan, 10 2019', ''),
(203, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(204, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(205, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(206, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(207, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(208, 53, 136, 2, 100, 'PASSED', 'Jan, 10 2019', ''),
(209, 53, 136, 0, 0, 'FAILED', 'Jan, 10 2019', ''),
(210, 53, 137, 2, 67, 'FAILED', 'Jan, 10 2019', ''),
(211, 53, 97, 1, 50, 'FAILED', 'Jan, 17 2019', ''),
(212, 55, 151, 1, 100, 'PASSED', 'Jan, 29 2021', ''),
(213, 55, 160, 0, 0, 'FAILED', 'Jan, 29 2021', ''),
(214, 55, 151, 1, 100, 'PASSED', 'Jan, 29 2021', ''),
(215, 55, 151, 1, 100, 'PASSED', 'Jan, 29 2021', ''),
(216, 55, 98, 2, 100, 'PASSED', 'Jan, 29 2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentresult_test`
--

CREATE TABLE `studentresult_test` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_taken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentresult_test`
--

INSERT INTO `studentresult_test` (`id`, `student_id`, `test_id`, `score`, `percentage`, `remarks`, `date_taken`) VALUES
(11, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018'),
(12, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018'),
(13, 47, 133, 0, 0, 'FAILED', 'Nov, 28 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tblexamquestion`
--

CREATE TABLE `tblexamquestion` (
  `eq_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `access_code` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexamquestion`
--

INSERT INTO `tblexamquestion` (`eq_id`, `q_id`, `access_code`) VALUES
(1, 214, 'Z846LR'),
(6, 212, '5WC8HD'),
(7, 228, 'GDUKAQ'),
(8, 212, 'GDUKAQ'),
(9, 214, 'GDUKAQ'),
(10, 213, 'GDUKAQ'),
(11, 233, 'FNQMHB'),
(12, 233, 'CXXVYG'),
(13, 234, 'CXXVYG'),
(14, 237, 'ABCDE'),
(15, 238, 'ABCDE');

-- --------------------------------------------------------

--
-- Table structure for table `tblprequestion`
--

CREATE TABLE `tblprequestion` (
  `pq_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprequestion`
--

INSERT INTO `tblprequestion` (`pq_id`, `q_id`, `test_id`) VALUES
(36, 233, 155),
(37, 233, 156),
(38, 233, 157),
(39, 233, 159),
(43, 0, 161),
(51, 238, 151);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `passing_rate` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `test_desc` text NOT NULL,
  `test_subject` text NOT NULL,
  `access_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `user_id`, `difficulty_id`, `total_questions`, `passing_rate`, `time_limit`, `test_desc`, `test_subject`, `access_code`) VALUES
(151, 25, 1, 1, 100, 60, 'CIVIL ENGINEERING', 'CIVIL ENGINEERING', ''),
(159, 25, 2, 1, 100, 5, 'ECE', 'Sturctural Design', ''),
(160, 25, 1, 1, 100, 5, 'CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', ''),
(161, 25, 1, 1, 100, 5, 'CIVIL ENGINEERING', 'Mathematics, Surveying and Transportation Engineering', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL,
  `course` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usertype_id`, `fname`, `mname`, `lname`, `username`, `password`, `user_type`, `course`, `year`) VALUES
(25, 1, 'admin', 'admin', 'admin', 'admin', 'admin', 'Admin', '', ''),
(48, 2, 'Anelyn', 'a', 'be', 'anelyn', '123', 'Teacher', 'CIVIL ENGINEERING', '1ST SEMESTER'),
(49, 2, 'Nonoy', 's', 'zuniga', 'nonoy', '123', 'Teacher', '', ''),
(51, 2, 'a', 'a', 'a', 'teacher2', '123', 'Teacher', '', ''),
(53, 3, 'micheal', 'learns', 'to rock', 'micheal', '123', 'Student', 'CIVIL ENGINEERING', '1ST SEMESTER'),
(54, 2, 'jan', 'a', 'a', 'a', 'a', 'Teacher', 'ECE', ''),
(55, 3, 'Claire', 'C', 'Blake', 'cblake@sample.com', 'cblake123', 'Student', 'CIVIL ENGINEERING', '1ST SEMESTER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examproper`
--
ALTER TABLE `examproper`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `studentdata_exams`
--
ALTER TABLE `studentdata_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdata_tests`
--
ALTER TABLE `studentdata_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentresult_exams`
--
ALTER TABLE `studentresult_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentresult_test`
--
ALTER TABLE `studentresult_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexamquestion`
--
ALTER TABLE `tblexamquestion`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `tblprequestion`
--
ALTER TABLE `tblprequestion`
  ADD PRIMARY KEY (`pq_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examproper`
--
ALTER TABLE `examproper`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `studentdata_exams`
--
ALTER TABLE `studentdata_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentdata_tests`
--
ALTER TABLE `studentdata_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `studentresult_exams`
--
ALTER TABLE `studentresult_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `studentresult_test`
--
ALTER TABLE `studentresult_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblexamquestion`
--
ALTER TABLE `tblexamquestion`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblprequestion`
--
ALTER TABLE `tblprequestion`
  MODIFY `pq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
