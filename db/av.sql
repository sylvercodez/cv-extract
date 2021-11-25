-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table av.av_admin_master
CREATE TABLE IF NOT EXISTS `av_admin_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_admin_master: ~1 rows (approximately)
/*!40000 ALTER TABLE `av_admin_master` DISABLE KEYS */;
INSERT INTO `av_admin_master` (`id`, `name`, `password`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0, '2018-03-15 21:36:40', '', 0, '2018-03-15 21:36:40', '', 0);
/*!40000 ALTER TABLE `av_admin_master` ENABLE KEYS */;

-- Dumping structure for table av.av_card_master
CREATE TABLE IF NOT EXISTS `av_card_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_card_master: ~2 rows (approximately)
/*!40000 ALTER TABLE `av_card_master` DISABLE KEYS */;
INSERT INTO `av_card_master` (`id`, `name`, `number`, `expiry_date`, `code`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, NULL, NULL, '2017-12-18', '', 1, 0, '2018-03-15 16:16:37', '', 0, '2018-03-15 16:16:37', '', 0),
	(2, '', '', '0000-00-00', '', 1, 0, '2018-03-15 17:14:58', '', 0, '2018-03-15 17:14:58', '', 0);
/*!40000 ALTER TABLE `av_card_master` ENABLE KEYS */;

-- Dumping structure for table av.av_cv_master
CREATE TABLE IF NOT EXISTS `av_cv_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `html` varchar(100) DEFAULT NULL,
  `price` float(10,2) DEFAULT '0.00',
  `social_discount` float(10,2) DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_cv_master: ~4 rows (approximately)
/*!40000 ALTER TABLE `av_cv_master` DISABLE KEYS */;
INSERT INTO `av_cv_master` (`id`, `image`, `html`, `price`, `social_discount`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, '1521133425_Jellyfish.jpg', '', 1000.00, 250.00, 1, 1, '2018-03-14 14:46:09', '', 0, '2018-03-15 22:35:27', '', 0),
	(2, 'cv2.png', 'cv2.html', 1200.00, 300.00, 1, 0, '2018-03-14 14:46:09', '', 0, '2018-03-15 14:42:18', '', 0),
	(3, 'cv3.png', 'cv3.html', 1500.00, 300.00, 1, 0, '2018-03-14 14:46:09', '', 0, '2018-03-15 14:42:26', '', 0),
	(4, '1521391347_logo-04.jpg', '', 1500.00, 0.00, 1, 0, '2018-03-15 22:34:01', '', 0, '2018-03-18 22:12:27', '', 0);
/*!40000 ALTER TABLE `av_cv_master` ENABLE KEYS */;

-- Dumping structure for table av.av_quote_master
CREATE TABLE IF NOT EXISTS `av_quote_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_quote_master: ~3 rows (approximately)
/*!40000 ALTER TABLE `av_quote_master` DISABLE KEYS */;
INSERT INTO `av_quote_master` (`id`, `name`, `description`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, 'Vulputate M., Dolor', 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur.', 1, 0, '2018-03-14 14:31:26', '', 0, '2018-03-14 14:31:44', '', 0),
	(2, 'Fringilla A., Vulputate Sit', 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur.', 1, 0, '2018-03-14 14:32:08', '', 0, '2018-03-14 14:32:08', '', 0),
	(3, 'Aenean A., Justo Cras', 'Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et', 1, 0, '2018-03-14 14:32:24', '', 0, '2018-03-14 14:32:24', '', 0);
/*!40000 ALTER TABLE `av_quote_master` ENABLE KEYS */;

-- Dumping structure for table av.av_user_cv
CREATE TABLE IF NOT EXISTS `av_user_cv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT '0',
  `cv_id` int(10) DEFAULT '0',
  `cv_info` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_user_cv: ~2 rows (approximately)
/*!40000 ALTER TABLE `av_user_cv` DISABLE KEYS */;
INSERT INTO `av_user_cv` (`id`, `user_id`, `cv_id`, `cv_info`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, 3, 2, '{"cv":"2","first_name":"","last_name":"","job_title":"","phone":"","email":"","website":"","description":"","edu":[{"year":"","degree":"","school":""}],"award":[{"title":"","year":""}],"skills":"","hobbies":"","facebook":"","twitter":"","linkedin":"","instagram":"","cvinfo":{"id":"2","image":"cv2.png","html":"cv2.html","price":"1200.00","social_discount":"300.00","status":"1","is_delete":"0","created_time":"2018-03-14 14:46:09","created_ip":"","created_by":"0","modified_time":"2018-03-15 14:42:18","modified_ip":"","modified_by":"0"},"user_id":0}', 1, 0, '2018-03-15 16:17:05', '', 0, '2018-03-15 20:44:36', '', 0),
	(2, 3, 1, '{"cv":"1","first_name":"","last_name":"","job_title":"","phone":"","email":"","website":"","description":"","edu":[{"year":"","degree":"","school":""}],"award":[{"title":"","year":""}],"skills":"","hobbies":"","facebook":"","twitter":"","linkedin":"","instagram":"","cvinfo":{"id":"1","image":"cv1.png","html":"cv1.html","price":"1000.00","social_discount":"250.00","status":"1","is_delete":"0","created_time":"2018-03-14 14:46:09","created_ip":"","created_by":"0","modified_time":"2018-03-15 14:42:35","modified_ip":"","modified_by":"0"},"user_id":1}', 1, 0, '2018-03-15 17:14:58', '', 0, '2018-03-15 20:44:33', '', 0);
/*!40000 ALTER TABLE `av_user_cv` ENABLE KEYS */;

-- Dumping structure for table av.av_user_master
CREATE TABLE IF NOT EXISTS `av_user_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) NOT NULL,
  `created_by` int(10) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table av.av_user_master: ~2 rows (approximately)
/*!40000 ALTER TABLE `av_user_master` DISABLE KEYS */;
INSERT INTO `av_user_master` (`id`, `name`, `email`, `password`, `image`, `gender`, `city`, `country`, `age`, `status`, `is_delete`, `created_time`, `created_ip`, `created_by`, `modified_time`, `modified_ip`, `modified_by`) VALUES
	(1, 'john doe', 'test@gmail.com', '1aedb8d9dc4751e229a335e371db8058', NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-03-15 17:08:50', '', 0, '2018-03-15 17:08:50', '', 0),
	(3, 'test name', 'tst@gmail.com', '4297f44b13955235245b2497399d7a93', '1521129525Hydrangeas.jpg', 'Male', 'rajkot', 'india', 20, 1, 0, '2018-03-15 17:16:15', '', 0, '2018-03-15 21:28:45', '', 0);
/*!40000 ALTER TABLE `av_user_master` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
