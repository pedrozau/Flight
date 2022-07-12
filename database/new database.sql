-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Jul-2022 às 09:11
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `flight_booking_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `airlines_list`
--

DROP TABLE IF EXISTS `airlines_list`;
CREATE TABLE IF NOT EXISTS `airlines_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `airlines` text NOT NULL,
  `logo_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `airlines_list`
--

INSERT INTO `airlines_list` (`id`, `airlines`, `logo_path`) VALUES
(1, 'AirAsia', '1600999080_kisspng-flight-indonesia-airasia-airasia-japan-airline-tic-asia-5abad146966736.8321896415221927106161.jpg'),
(2, 'Philippine Airlines', '1600999200_Philippine-Airlines-Logo.jpg'),
(3, 'Cebu Pacific', '1600999200_43cada0008538e3c1a1f4675e5a7aabe.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `airport_list`
--

DROP TABLE IF EXISTS `airport_list`;
CREATE TABLE IF NOT EXISTS `airport_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `airport` text NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `airport_list`
--

INSERT INTO `airport_list` (`id`, `airport`, `location`) VALUES
(1, 'NAIA', 'Metro Manila'),
(2, 'Beijing Capital International Airport', 'Chaoyang-Shunyi, Beijing'),
(3, 'Los Angeles International Airport', 'Los Angeles, California'),
(4, 'Dubai International Airport', 'Garhoud, Dubai'),
(5, 'Mactan-Cebu Airport', 'Cebu'),
(6, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `booked_flight`
--

DROP TABLE IF EXISTS `booked_flight`;
CREATE TABLE IF NOT EXISTS `booked_flight` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `flight_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `booked_flight`
--

INSERT INTO `booked_flight` (`id`, `flight_id`, `name`, `address`, `contact`) VALUES
(2, 3, 'James Smith', 'Sample Address', '+4545 6456'),
(3, 4, 'John Smith', 'Sample Address', '+18456-5455-55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `flight_list`
--

DROP TABLE IF EXISTS `flight_list`;
CREATE TABLE IF NOT EXISTS `flight_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `airline_id` int(30) NOT NULL,
  `plane_no` text NOT NULL,
  `departure_airport_id` int(30) NOT NULL,
  `arrival_airport_id` int(30) NOT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  `seats` int(10) NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `flight_list`
--

INSERT INTO `flight_list` (`id`, `airline_id`, `plane_no`, `departure_airport_id`, `arrival_airport_id`, `departure_datetime`, `arrival_datetime`, `seats`, `price`, `date_created`) VALUES
(1, 1, 'GB623-14', 1, 3, '2022-07-12 04:00:00', '2022-07-14 10:00:00', 150, 7500, '2020-09-25 11:23:52'),
(2, 2, 'TIPS14-15', 1, 2, '2020-10-14 11:00:00', '2020-10-16 09:00:00', 100, 5000, '2020-09-25 11:46:12'),
(3, 3, 'CEB-1101', 5, 1, '2020-09-30 08:00:00', '2020-09-30 08:45:00', 100, 2500, '2020-09-25 11:57:31'),
(4, 3, 'CEB10023', 1, 5, '2020-10-07 01:00:00', '2020-10-07 01:45:00', 100, 2500, '2020-09-25 14:50:47'),
(5, 1, 'Scry', 3, 3, '2022-07-12 22:50:00', '2022-07-14 23:00:00', 200, 500000, '2022-06-28 09:00:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paiment`
--

DROP TABLE IF EXISTS `paiment`;
CREATE TABLE IF NOT EXISTS `paiment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_name` varchar(30) DEFAULT NULL,
  `status_paiment` enum('Pago','Ainda Não Pago') DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paiment`
--

INSERT INTO `paiment` (`id`, `cliente_name`, `status_paiment`, `Date`) VALUES
(1, 'Pedro Zau', 'Ainda Não Pago', '2022-07-05'),
(2, 'Teodora João', 'Ainda Não Pago', '2022-07-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Companhia Aérea Económica Nacional', 'info@sample.comm', '+6948 8542 623', '1600998360_travel-cover.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=admin , 2 = doctor,3=patient',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'Administrator', '', '', 'admin', 'admin123', 1),
(7, 0, 'George Wilson', 'Sample Only', '+18456-5455-55', 'gwilson@sample.com', 'd40242fb23c45206fadee4e2418f274f', 3),
(9, 2, 'DR.James Smith, M.D.', 'Sample Clinic Address', '+1456 554 55623', 'jsmith@sample.com', 'jsmith123', 2),
(10, 3, 'DR.Claire Blake, M.D.', 'Sample Only', '+5465 555 623', 'cblake@sample.com', 'blake123', 2),
(11, 0, 'Sample Only', 'Sample', '+5465 546 4556', 'sample@sample.com', '4e91b1cbe42b5c884de47d4c7fda0555', 3),
(15, 9, 'DR.Sample Doctor, M.D.', 'Sample Address', '+1235 456 623', 'sample2@sample.com', 'sample123', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
