-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2021 at 09:21 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `phone`, `email`) VALUES
(1, 'admin', 'admin', 1234567890, 'aa@aa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `b_name` varchar(255) NOT NULL,
  `b_description` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `category` varchar(2552) NOT NULL,
  `isbn` int(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_name`, `b_description`, `quantity`, `author`, `year`, `category`, `isbn`, `photo`, `language`) VALUES
('Let us C', 'Programming', 3, 'Yashwant Kanitker', 2010, 'Programming', 1231, 'uploads/60d79219a6bda0.90114376.png', 'English'),
('Flask', 'Programming', 8, 'KK', 2008, 'Programming', 1981, 'uploads/60d82dc79296e0.63577235.png', 'English'),
('Node.js', 'Programming', 10, 'whatever', 2010, 'Programming', 1992, 'uploads/60cefe53c5dd94.98713064.png', 'English'),
('C++', 'Programming', 5, 'KK', 2008, 'Programming', 3231, 'uploads/60d79462702902.28865575.png', 'English'),
('Django', '', 12, 'KK', 2014, 'Programming', 5555, 'uploads/60e16762dc0956.15729749.png', 'English'),
('Flask', 'Programming', 14, 'Jugantar', 2010, 'Programming', 6121, 'uploads/60ccf67f08a2e6.58247174.png', 'English'),
('Django', 'Programming', 15, 'Whomever', 2010, 'Programming', 6454, 'uploads/60ccf61f53f215.48680638.png', 'English'),
('JAva', '', 5, 'Khesari', 2018, 'Programming', 6677, 'uploads/60e1fdc6710bb8.01623630.png', 'English'),
('javascript', 'programming', 5, 'medhi', 2019, 'programming', 8222, 'uploads/60d82febf066a3.67124425.png', 'English'),
('Django', 'Programming', 3, 'whatever', 2010, 'Programming', 19998, 'uploads/60d792a40b01d4.39269158.png', 'English'),
('Let us C', 'Programming', 0, 'Whomever', 2006, 'Programming', 66666, 'uploads/60d771c0a823a3.91349448.png', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

DROP TABLE IF EXISTS `book_issue`;
CREATE TABLE IF NOT EXISTS `book_issue` (
  `transaction_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`transaction_id`, `b_id`, `s_id`, `issue_date`, `return_date`, `status`) VALUES
(1, 1444, 1996, '2021-06-01', '2021-09-01', 'RET'),
(2, 19998, 1444, '2021-03-01', '2021-06-01', 'ACQ'),
(3, 6677, 1444, '2021-05-01', '2021-08-01', 'ACQ'),
(4, 5555, 1445, '2021-05-01', '2021-08-01', 'ACQ'),
(5, 6121, 1445, '2021-06-25', '2021-09-25', 'ACQ'),
(6, 6121, 1446, '2021-04-01', '2021-07-01', 'ACQ'),
(7, 6677, 1446, '2021-06-01', '2021-09-01', 'RET'),
(8, 1231, 1447, '2021-04-01', '2021-07-01', 'RET'),
(10, 1231, 1445, '2021-07-05', '2021-10-05', 'ACQ'),
(11, 1231, 1445, '2021-07-05', '2021-10-05', 'ACQ');

--
-- Triggers `book_issue`
--
DROP TRIGGER IF EXISTS `trigger_quantity_book_update`;
DELIMITER $$
CREATE TRIGGER `trigger_quantity_book_update` AFTER UPDATE ON `book_issue` FOR EACH ROW BEGIN
  	IF(NEW.status != OLD.status AND NEW.status = 'RET') THEN
    	UPDATE books SET quantity = quantity + 1 WHERE isbn = NEW.b_id;
    ELSEIF(NEW.status != OLD.status AND NEW.status = 'ACQ') THEN
    	UPDATE books SET quantity = quantity - 1 WHERE isbn = NEW.b_id;
    END IF;    
  END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_quantity_on_insert`;
DELIMITER $$
CREATE TRIGGER `update_quantity_on_insert` AFTER INSERT ON `book_issue` FOR EACH ROW update books set quantity= quantity-1 where isbn=NEW.b_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

DROP TABLE IF EXISTS `book_status`;
CREATE TABLE IF NOT EXISTS `book_status` (
  `b_id` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `isbn` (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`b_id`, `isbn`, `status`) VALUES
(802267, '1992', 0),
(594137, '1981', 0),
(154997, '1981', 0),
(586809, '1981', 0),
(652527, '8222', 0),
(845249, '8222', 0),
(709298, '8222', 0),
(537541, '8222', 0),
(624132, '8222', 0),
(425710, '5555', 0),
(672723, '1981', 0),
(466151, '1981', 0),
(658106, '1981', 0),
(366485, '1981', 0),
(486904, '1981', 0),
(667160, '6677', 0),
(289100, '6677', 0),
(744438, '6677', 0),
(402139, '6677', 0),
(261580, '6677', 0);

--
-- Triggers `book_status`
--
DROP TRIGGER IF EXISTS `decrease_quantity_of _books`;
DELIMITER $$
CREATE TRIGGER `decrease_quantity_of _books` AFTER DELETE ON `book_status` FOR EACH ROW UPDATE `books` set quantity = quantity-1 where isbn = OLD.isbn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(255) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(2552) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_phone` int(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1448 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_phone`, `s_address`, `department`) VALUES
(1444, 'Kaushik Medhi', 'k@m.com', 78998798, 'JKJSHkshKJSH', 'MCA'),
(1445, 'Meghna Dutta', 'meghna@gmail.com', 1234567, 'Assam', 'MCA'),
(1446, 'Ankur Das', 'ankur@gmail.com', 1234567, 'Assam', 'MCA'),
(1447, 'Anirban Sharma', 'anirban@gmail.com', 1234567, 'Assam', 'MCA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
