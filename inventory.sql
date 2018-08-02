-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE IF NOT EXISTS `tbl_inventory` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `stock_added` int(11) NOT NULL,
  `purchase_price` varchar(100) NOT NULL,
  `stock_sold` int(11) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `date_added_sold` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `product_id`, `sale_id`, `stock_added`, `purchase_price`, `stock_sold`, `total_price`, `date_added_sold`) VALUES
(1, 3, 0, 5, '25', 0, '', '2018-08-02'),
(2, 4, 1, 0, '', 1, '12', '2018-08-02'),
(3, 4, 0, -1, '', 0, '', '2018-08-02'),
(4, 4, 0, 5, '', 0, '', '2018-08-02'),
(5, 4, 0, 5, '1000', 0, '', '2018-08-02'),
(6, 3, 0, 5, '100', 0, '', '2018-08-02'),
(7, 3, 0, 5, '5100', 0, '', '2018-08-02'),
(8, 3, 2, 0, '', 2, '24', '2018-08-02'),
(9, 3, 0, -2, '5100', 0, '', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
`id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `product_desc`, `price`) VALUES
(3, 'qwe', 'qwe', '12'),
(4, 'asd', 'ad', '12');

--
-- Triggers `tbl_products`
--
DELIMITER //
CREATE TRIGGER `add_prod_stock` AFTER INSERT ON `tbl_products`
 FOR EACH ROW INSERT INTO tbl_stock(id,product_id)VALUES('',NEW.id)
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `del_prod_stock` AFTER DELETE ON `tbl_products`
 FOR EACH ROW DELETE FROM tbl_stock WHERE product_id = OLD.id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE IF NOT EXISTS `tbl_sale` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_sold` varchar(64) NOT NULL,
  `total_price` varchar(64) NOT NULL,
  `temp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`id`, `product_id`, `customer_name`, `seller_id`, `qty`, `date_sold`, `total_price`, `temp_id`) VALUES
(1, 4, 'Syndee Ann', 12014330, 1, '2018-08-02', '12', 0),
(2, 3, 'Gigi', 12014330, 2, '2018-08-02', '24', 0);

--
-- Triggers `tbl_sale`
--
DELIMITER //
CREATE TRIGGER `add_sale_inventory` AFTER INSERT ON `tbl_sale`
 FOR EACH ROW INSERT INTO tbl_inventory(product_id, sale_id, stock_sold, total_price, date_added_sold)VALUES(NEW.product_id, NEW.id, NEW.qty, NEW.total_price, NEW.date_sold)
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `delete_sale_inventory` AFTER DELETE ON `tbl_sale`
 FOR EACH ROW DELETE FROM tbl_inventory WHERE sale_id = OLD.id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `purchase_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `product_id`, `stock_qty`, `purchase_price`) VALUES
(3, 3, 13, 5100),
(4, 4, 9, 1000);

--
-- Triggers `tbl_stock`
--
DELIMITER //
CREATE TRIGGER `addstock` AFTER UPDATE ON `tbl_stock`
 FOR EACH ROW INSERT INTO tbl_inventory(product_id,stock_added,purchase_price, date_added_sold)
VALUES(NEW.product_id,NEW.stock_qty - OLD.stock_qty,NEW.purchase_price,CURDATE())
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_temp_trans` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `lastname`, `firstname`, `middlename`, `age`, `gender`, `position_user`, `username`, `password`, `type`) VALUES
(12, 'qwe', 'wqe', 'wqe', 12, 'Male', 'sa', 'sa', '', 'user'),
(34, 'dfg', 'dfg', 'fg', 445, 'Female', 'dfg', 'dfg', 'fgd', 'user'),
(787, '7', '757gh', 'nmb', 65, 'Female', 'jb', 'khj', 'jh', 'user'),
(129897, 'New', 'New', 'N', 12, 'Male', 'Sales', 'new', 'new', 'user'),
(1201433, 'Sevilla', 'Syndee', 'Sales', 22, 'female', 'intern', 'user', 'user', 'user'),
(12014330, 'Sevilla', 'Admin', 'Sales', 22, 'female', 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_prod_stock` (`product_id`);

--
-- Indexes for table `tbl_temp_trans`
--
ALTER TABLE `tbl_temp_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_temp_trans`
--
ALTER TABLE `tbl_temp_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
