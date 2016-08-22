-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 02:46 AM
-- Server version: 5.6.32-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(9) NOT NULL AUTO_INCREMENT,
  `survey_name` varchar(300) NOT NULL,
  `access` varchar(20) NOT NULL,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `survey_name`, `access`) VALUES
(1, 'Digital Craft', 'public'),
(2, 'Introductory Survey', 'private'),
(3, 'Cricket', 'public'),
(4, 'Football', 'public'),
(5, 'Soccer', 'private'),
(6, 'Badminton', 'private'),
(7, 'Polo', 'private'),
(8, 'Golf', 'public'),
(9, 'Tennis', 'public'),
(10, 'Localhost', 'public'),
(11, 'Random', 'public'),
(12, 'Musicc', 'public'),
(57, 'MotorBikes', 'Public'),
(58, 'Cars', 'Public'),
(59, 'Opium War', 'Public'),
(60, 'Opium War', 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE IF NOT EXISTS `survey_answers` (
  `answer_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `question_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `answer_body` mediumtext NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`answer_id`, `question_id`, `user_id`, `answer_body`) VALUES
(1, 1, 1, 'Yes I do.'),
(2, 2, 1, 'Maybe B?');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE IF NOT EXISTS `survey_questions` (
  `question_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `survey_id` int(9) NOT NULL,
  `question_body` mediumtext NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`question_id`, `survey_id`, `question_body`) VALUES
(1, 1, 'Do you like Digital Craft?'),
(2, 1, 'What grade should I get?'),
(3, 2, 'What is your Name?'),
(4, 2, 'How old are you?'),
(5, 2, 'What is your Father''s Name?'),
(16, 57, 'Model?'),
(17, 57, 'Horsepower?'),
(18, 58, 'Model No?'),
(19, 58, 'Make?'),
(20, 58, 'Door?'),
(21, 60, 'Why is opium harmful?'),
(22, 60, 'Do you smoke?'),
(23, 60, 'Are you happy?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'faiq', 'pass', 'faiqfarhan1@gmail.com'),
(2, 'faiq123', 'pass', 'faiqfarhan1@gmail.com'),
(3, 'jkhan', 'pass', 'jaferkhan@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
