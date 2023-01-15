-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.20 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table eshop.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`email`, `verification_code`, `fname`, `lname`) VALUES
	('abdulrahumanmuhammedwaseem@gmail.com', '617cb845b0f49', 'Abdul Rahman', 'Muhammed Waseem');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table eshop.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.brand: ~6 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Sony'),
	(2, 'Samsung'),
	(3, 'HTC'),
	(4, 'Huawei'),
	(5, 'Vivo'),
	(6, 'Oppo');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table eshop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id`, `product_id`, `user_email`, `qty`) VALUES
	(13, 18, 'abdulrahumanmuhammedwaseem@gmail.com', 3);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table eshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Cell Phones & Accessories'),
	(2, 'Computers & Tablets'),
	(3, 'Cameras'),
	(4, 'Camera Drones'),
	(5, 'Video Game Consoles');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table eshop.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user1_idx` (`from`),
  KEY `fk_chat_user2_idx` (`to`),
  KEY `fk_chat_status1_idx` (`status_id`),
  CONSTRAINT `fk_chat_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `fk_chat_user2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.chat: ~0 rows (approximately)
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Dumping structure for table eshop.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `district_id` int NOT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_district1_idx` (`district_id`),
  CONSTRAINT `fk_table1_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.city: ~1 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `district_id`, `postal_code`) VALUES
	(1, 'Kandy', 1, '3');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table eshop.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.color: ~6 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`) VALUES
	(1, 'Green'),
	(2, 'Blue'),
	(3, 'Gold'),
	(4, 'Silver'),
	(5, 'Graphite'),
	(6, 'Rose Gold');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table eshop.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.condition: ~2 rows (approximately)
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Used'),
	(2, 'New');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;

-- Dumping structure for table eshop.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.district: ~5 rows (approximately)
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Kandy', 1),
	(2, 'Ampara', 2),
	(3, 'Colombo', 3),
	(4, 'Galle', 4),
	(5, 'Jaffna', 5);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table eshop.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `feed` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `user_email`, `product_id`, `feed`, `date`) VALUES
	(1, 'abdulrahumanmuhammedwaseem@gmail.com', 18, 'This is a very good quality product.', '2021-10-30 03:14:51');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table eshop.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table eshop.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(32) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_imges_product1_idx` (`product_id`),
  CONSTRAINT `fk_imges_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.images: ~4 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`code`, `product_id`) VALUES
	('617880cdcf21b.jpeg', 18),
	('617ae18226bd0huawei_p20.png', 19),
	('617880ef4def8.jpeg', 20),
	('617ad8168c36ahtc_u.jpg', 25);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table eshop.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.invoice: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `order_id`, `product_id`, `user_email`, `date`, `total`, `qty`) VALUES
	(1, '617c5418098a5', 18, 'abdulrahumanmuhammedwaseem@gmail.com', '2021-10-30 01:36:53', 30200, 1),
	(2, '617c5dcd2548f', 18, 'abdulrahumanmuhammedwaseem@gmail.com', '2021-10-30 02:18:19', 30200, 1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table eshop.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.model: ~6 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'Ericson 1'),
	(2, 'Galaxy S3'),
	(3, 'Ultra'),
	(4, 'P20'),
	(5, 'Y20'),
	(6, 'A95');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table eshop.model_has_brand
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_has_brand_brand1_idx` (`brand_id`),
  KEY `fk_model_has_brand_model1_idx` (`model_id`),
  CONSTRAINT `fk_model_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_model_has_brand_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.model_has_brand: ~6 rows (approximately)
/*!40000 ALTER TABLE `model_has_brand` DISABLE KEYS */;
INSERT INTO `model_has_brand` (`id`, `brand_id`, `model_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 4),
	(5, 5, 5),
	(6, 6, 6);
/*!40000 ALTER TABLE `model_has_brand` ENABLE KEYS */;

-- Dumping structure for table eshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `color_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_kandy` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  KEY `fk_product_color1_idx` (`color_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.product: ~4 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `model_has_brand_id`, `title`, `color_id`, `price`, `qty`, `description`, `condition_id`, `status_id`, `user_email`, `datetime_added`, `delivery_fee_kandy`, `delivery_fee_other`) VALUES
	(18, 1, 1, 'Sony Ericson 1', 1, 30000, 26, '32 GB \n2 GB RAM \n', 1, 1, 'abdulrahumanmuhammedwaseem@gmail.com', '2021-10-27 03:57:25', 200, 400),
	(19, 1, 2, 'Samsung Galaxy S3', 2, 30000, 30, '32 GB \n3 GB RAM \n7 MP \n300mAh Battery\n', 1, 1, 'abdulrahumanmuhammedwaseem@gmail.com', '2021-10-27 03:57:57', 350, 470),
	(20, 1, 4, 'Huawei P20', 1, 33000, 20, '32 GB \n2 GB RAM \n', 1, 1, 'abdulrahumanmuhammedwaseem@gmail.com', '2021-10-27 03:57:59', 200, 400),
	(25, 1, 3, 'HTC Ultra', 4, 37000, 25, '32GB \n3GB RAM \n7MP \n250mAh Battery', 2, 1, 'hazeemdonz@gmail.com', '2021-10-28 00:06:47', 300, 350);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table eshop.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `code` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_profile_img_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_img_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.profile_img: ~0 rows (approximately)
/*!40000 ALTER TABLE `profile_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_img` ENABLE KEYS */;

-- Dumping structure for table eshop.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.province: ~5 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Central'),
	(2, 'Eastern'),
	(3, 'Western'),
	(4, 'Southern'),
	(5, 'Northern');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table eshop.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.recent: ~10 rows (approximately)
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(1, 20, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(2, 19, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(3, 20, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(4, 25, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(5, 18, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(6, 18, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(7, 18, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(8, 18, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(9, 18, 'abdulrahumanmuhammedwaseem@gmail.com'),
	(10, 18, 'abdulrahumanmuhammedwaseem@gmail.com');
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;

-- Dumping structure for table eshop.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table eshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  KEY `fk_user_status1_idx` (`status_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `gender_id`, `register_date`, `verification_code`, `status_id`) VALUES
	('abdulrahumanmuhammedwaseem@gmail.com', 'Abdul Rahman', 'Muhammed Waseem', 'kurundugolla335', '0773337887', 1, '2021-09-20 20:37:53', '6148b42d7ddfb', 1),
	('hazeemdonz@gmail.com', 'Abdul Rahman', 'Muhammed Azeem', 'kurundugolla334', '0762345678', 1, '2021-09-08 23:10:58', '613b9ded05bca', 1),
	('kurundugolla@gmail.com', 'Kurundugolla', 'Kurundu', 'kurundugolla3', '0763334567', 1, '2021-08-30 00:43:29', '6138f1647aa61', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table eshop.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `line1` text,
  `line2` text,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.user_has_address: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `city_id`) VALUES
	(1, 'abdulrahumanmuhammedwaseem@gmail.com', '32/1, 2/3, First street, Kandy', '', 1);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table eshop.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table eshop.watchlist: ~0 rows (approximately)
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
