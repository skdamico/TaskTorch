-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2012 at 04:16 PM
-- Server version: 5.1.60
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lisestat_stickyspaces`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `color` varchar(6) NOT NULL DEFAULT '000000',
  `position_x` float(4,1) NOT NULL DEFAULT '0.0',
  `position_y` float(4,1) NOT NULL DEFAULT '0.0',
  `workspace_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `color`, `position_x`, `position_y`, `workspace_id`, `created`, `modified`) VALUES
(1, 7, 'hello there', '000000', 37.5, 65.6, 1, '2011-12-09 04:51:13', '2011-12-09 08:16:48'),
(2, 7, 'This is a sticky!\n\nYou can drag me around.', '000000', 249.5, 79.6, 1, '2011-12-09 04:51:25', '2011-12-09 04:52:49'),
(3, 7, 'If you''re done with a sticky, throw it out.', '000000', 473.5, 62.6, 1, '2011-12-09 04:51:48', '2011-12-09 08:16:54'),
(4, 0, 'wow this is a sticky?', '000000', 86.5, 42.6, 3, '2011-12-09 08:11:38', '2011-12-09 08:11:56'),
(5, 0, '\n\n Throw it in the trash?', '000000', 405.5, 69.6, 3, '2011-12-09 08:11:40', '2011-12-09 08:12:31'),
(6, 0, 'what can you do with these?', '000000', 108.5, 256.6, 3, '2011-12-09 08:11:42', '2011-12-09 08:12:36'),
(7, 0, 'wow', '000000', 110.5, 53.6, 5, '2011-12-09 08:59:17', '2011-12-09 08:59:26'),
(8, 0, 'this is a sticky', '000000', 313.5, 165.6, 5, '2011-12-09 08:59:18', '2011-12-09 08:59:38'),
(12, 9, 'Hover over me to access my controls.', '000000', 102.0, 55.0, 6, '2011-12-09 09:17:10', '2011-12-11 18:33:01'),
(14, 9, NULL, '000000', 59.5, 55.6, 10, '2011-12-09 09:38:26', '2011-12-09 09:38:28'),
(15, 9, NULL, '000000', 91.5, 214.6, 10, '2011-12-09 09:38:26', '2011-12-09 09:38:26'),
(16, 9, NULL, '000000', 266.5, 77.6, 10, '2011-12-09 09:38:27', '2011-12-09 09:38:27'),
(18, 9, NULL, '000000', 190.5, 128.6, 10, '2011-12-09 09:40:25', '2011-12-09 09:40:43'),
(21, 9, NULL, '000000', 39.5, 246.6, 10, '2011-12-09 09:40:37', '2011-12-09 09:40:45'),
(22, 9, NULL, '000000', 336.5, 121.6, 10, '2011-12-09 09:40:39', '2011-12-09 09:40:40'),
(24, 9, 'licker', '000000', 431.0, 64.0, 11, '2011-12-09 17:35:08', '2011-12-09 17:35:34'),
(25, 9, NULL, '000000', 408.0, 359.0, 6, '2011-12-11 18:33:06', '2011-12-11 18:33:06'),
(26, 9, NULL, '000000', 354.0, 73.0, 6, '2011-12-11 18:33:08', '2011-12-11 18:33:08'),
(27, 9, NULL, '000000', 164.0, 238.0, 6, '2011-12-11 18:33:08', '2011-12-11 18:33:08'),
(28, 9, NULL, '000000', 33.0, 29.0, 12, '2011-12-11 18:33:48', '2011-12-11 18:34:05'),
(29, 9, NULL, '000000', 30.0, 191.0, 12, '2011-12-11 18:33:50', '2011-12-11 18:34:07'),
(30, 9, NULL, '000000', 12.0, 79.0, 12, '2011-12-11 18:34:18', '2011-12-11 18:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(7, 'skdamico', 'skdamico@gmail.com', '1afd61d6dfe2409ccdf60bb8bc848db03bb96b70', '2011-12-09 01:49:37', '2011-12-09 01:49:37'),
(8, 'skdamico', 'skdamico@gmail.com', '1afd61d6dfe2409ccdf60bb8bc848db03bb96b70', '2011-12-09 08:09:51', '2011-12-09 08:09:51'),
(9, 'testuser', 'testuser@test.com', '14bc35b1ca8822857c752a8f3dc95e3ad8eea162', '2011-12-09 08:46:31', '2011-12-09 08:46:31'),
(10, 'mike', 'skdamico@gmail.com', '17811bf0b6b5bd055f1a721332ad89475bc40906', '2011-12-11 18:36:29', '2011-12-11 18:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `users_workspaces`
--

DROP TABLE IF EXISTS `users_workspaces`;
CREATE TABLE IF NOT EXISTS `users_workspaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_workspaces`
--

INSERT INTO `users_workspaces` (`id`, `workspace_id`, `user_id`) VALUES
(1, 1, 7),
(2, 2, 7),
(3, 6, 9),
(4, 9, 9),
(5, 10, 9),
(6, 11, 9),
(7, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

DROP TABLE IF EXISTS `workspaces`;
CREATE TABLE IF NOT EXISTS `workspaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `workspaces`
--

INSERT INTO `workspaces` (`id`, `name`, `created`, `modified`) VALUES
(1, 'workspace1', '2011-12-09 04:49:38', '2011-12-09 04:49:38'),
(2, 'workspace2', '2011-12-09 04:49:44', '2011-12-09 04:49:44'),
(3, 'Workspace 1', '2011-12-09 08:11:32', '2011-12-09 08:11:32'),
(4, 'hhhhh', '2011-12-09 08:46:42', '2011-12-09 08:46:42'),
(6, 'Sample', '2011-12-09 09:11:33', '2011-12-09 09:11:33'),
(9, 'Wow', '2011-12-09 09:16:34', '2011-12-09 09:16:34'),
(10, 'Workspace', '2011-12-09 09:38:20', '2011-12-09 09:38:20'),
(11, 'Lauren', '2011-12-09 17:34:50', '2011-12-09 17:34:50'),
(12, 'jfkldsjflk', '2011-12-11 18:33:24', '2011-12-11 18:33:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
