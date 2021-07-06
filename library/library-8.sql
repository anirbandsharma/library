-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2021 at 08:51 AM
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
(2, 19998, 1444, '2021-03-01', '2021-06-01', 'RET'),
(3, 6677, 1444, '2021-05-01', '2021-08-01', 'ACQ'),
(4, 5555, 1445, '2021-05-01', '2021-08-01', 'RET'),
(5, 6121, 1445, '2021-06-25', '2021-09-25', 'RET'),
(6, 6121, 1446, '2021-04-01', '2021-07-01', 'ACQ'),
(7, 6677, 1446, '2021-06-01', '2021-09-01', 'RET'),
(8, 1231, 1447, '2021-04-01', '2021-07-01', 'RET'),
(10, 1231, 1445, '2021-07-05', '2021-10-05', 'RET'),
(11, 1231, 1445, '2021-07-05', '2021-10-05', 'RET');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
