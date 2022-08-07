-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 06:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `password`) VALUES
('administrator', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `aid` int(11) NOT NULL,
  `roll_no` text NOT NULL,
  `file_name` text NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`aid`, `roll_no`, `file_name`, `video_id`) VALUES
(1, 's1001', 'Balwesh_Puramkar_a133710cb2bedc27da8daaadb931553b.mp4', 3),
(3, 's2002', 'Shubham_More_6147246665001872dd5a886d418f990c.docx', 3),
(4, 's2002', 'Shubham_More_9653a371e569e87de203013fe8ed79a4.docx', 2),
(5, 's2002', 'Shubham_More_74af38ed813e9f4bb5d0328d067d2f47.docx', 1),
(6, 's1001', 'Balwesh_Puramkar_bafe9fd85b8a42c45540de606eb57534.docx', 3),
(7, 's104', 'vishal_lamsoge_70fa3e3aed5e5da45f0114c00fadfb41.pdf', 6);

-- --------------------------------------------------------

--
-- Table structure for table `semsub`
--

CREATE TABLE `semsub` (
  `sr` int(11) NOT NULL,
  `semester` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semsub`
--

INSERT INTO `semsub` (`sr`, `semester`, `subject`) VALUES
(1, 'Semester-1', '@#$english@#$chemistory@#$physics'),
(2, 'Semester-2', '@#$enginnering math@#$java@#$c++'),
(3, 'Semester-6', '@#$CN@#$DP@#$SEPM@#$AI@#$FE');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sr` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `sid` text NOT NULL,
  `semester` text NOT NULL,
  `sphone` text NOT NULL,
  `dob` text NOT NULL,
  `pass` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sr`, `fname`, `mname`, `lname`, `sid`, `semester`, `sphone`, `dob`, `pass`, `status`) VALUES
(1, 'Balwesh', 'b', 'Puramkar', 's1001', 'Semester-1', '9999999999', '2022-02-26', 'password', 'deactive'),
(3, 'Shubham', 'm', 'More', 's2002', 'Semester-1', '9999999999', '2022-02-28', 'password', 'deactive'),
(4, 'gaytri', 'gajanan', 'dandhare', 's103', 'Semester-6', '1234567890', '2022-02-28', 'password', 'active'),
(5, 'vishal', 'd.', 'lamsoge', 's104', 'Semester-6', '7684536798', '2022-02-28', 'password', 'active'),
(6, 'vishal', 'l', 'l', 's101', 'Semester-6', '8265479314', '2000-02-02', 'password', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `sr` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `tid` text NOT NULL,
  `semester` text NOT NULL,
  `subjects` text NOT NULL,
  `tphone` text NOT NULL,
  `tpass` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sr`, `fname`, `mname`, `lname`, `tid`, `semester`, `subjects`, `tphone`, `tpass`, `status`) VALUES
(1, 'Nandini', 'n', 'Kadao', 't1001', ', Semester-1', '%&~english%&~chemistory', '9856789542', 'password', 'Active'),
(3, 'Aparitosh', '', 'gahankari', 't102', ', Semester-6', '%&~AI', '2098765432', 'password', 'Active'),
(4, 'ankit', '', 'Mahule', 't103', ', Semester-6', '%&~DP', '0987654321', 'password', 'Active'),
(5, 'shraddha', '', 'raut', 't104', ', Semester-6', '%&~SEPM', '1234567890', 'password', 'Active'),
(6, 'Aditya', '', 'Tarunkar', 't101', ', Semester-1', '%&~chemistory%&~physics', '0987654321', 'password', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `tid` text NOT NULL,
  `semester` text NOT NULL,
  `subject` text NOT NULL,
  `date` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `video` text NOT NULL,
  `docs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `tid`, `semester`, `subject`, `date`, `title`, `description`, `video`, `docs`) VALUES
(1, 't1001', 'Semester-1', 'english', '26-02-2022', 'how to speak in english', 'grammer mistakes', '109506_33_52pm_2022-02-26_how to speak in english.mp4', '947506_33_52pm_2626-0202-2222how to speak in english.png'),
(2, 't1001', 'Semester-1', 'chemistory', '26-02-2022', 'chemical reaction', 'Ok, google', '978007_00_01pm_2022-02-26_chemical reaction.mp4', ''),
(3, 't1001', 'Semester-1', 'english', '27-02-2022', 'Grammer', 'Watch videos', '753206_04_33pm_2022-02-27_Grammer.mp4', ''),
(5, 't102', 'Semester-6', 'AI', '23-02-2022', 'chapter 2', 'watch video', '241301_17_34pm_2022-02-23_chapter 2.mp4', '917701_17_34pm_2323-0202-2222chapter 2.pptx'),
(6, 't104', 'Semester-6', 'SEPM', '26-02-2022', 'Chapter 2', 'watch the video', '421501_18_32pm_2022-02-26_Chapter 2.mp4', '509801_18_32pm_2626-0202-2222Chapter 2.pdf'),
(7, 't104', 'Semester-6', 'SEPM', '24-02-2022', 'chapter3', 'watach the video', '989901_29_00pm_2022-02-24_chapter3.mp4', '785701_29_00pm_2424-0202-2222chapter3.pdf'),
(8, 't104', 'Semester-6', 'SEPM', '28-02-2022', 'demo5', 'demo desc', '566402_37_49pm_2022-02-28_demo5.mp4', '161202_37_49pm_2828-0202-2222demo5.zip'),
(9, 't101', 'Semester-1', 'physics', '24-06-2022', 'law of gravity', 'description', '973110_53_32pm_2022-06-24_law of gravity.mp4', '809710_53_32pm_2424-0606-2222law of gravity.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aid_2` (`aid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `semsub`
--
ALTER TABLE `semsub`
  ADD KEY `sr` (`sr`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `sr` (`sr`),
  ADD KEY `sr_2` (`sr`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `sr` (`sr`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semsub`
--
ALTER TABLE `semsub`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
