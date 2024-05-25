-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 06:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_media`
--

CREATE TABLE `blog_media` (
  `media_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `media_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_media`
--

INSERT INTO `blog_media` (`media_id`, `post_id`, `media_name`) VALUES
(1, 1, 'ai_future.jpg'),
(2, 2, 'healthy_tips.png'),
(3, 3, 'budget_travel.pdf'),
(4, 4, 'travel_destinations.jpg'),
(5, 5, 'vegan_recipes.png');

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE `blog_user` (
  `user_id` varchar(30) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_bio`, `user_status`) VALUES
('user1', 'John Doe', 'john.doe@example.com', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'user1.jpg', 'Hello, I am John Doe. I love writing about technology.', 1),
('user2', 'Jane Smith', 'jane.smith@example.com', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'user2.jpg', 'Hi there! I\'m Jane Smith, passionate about health and fitness.', 1),
('user3', 'Alice Johnson', 'alice.johnson@example.com', '5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764', 'user3.jpg', 'Welcome! I\'m Alice Johnson. Travel enthusiast and budget traveler.', 2),
('user4', 'Bob Brown', 'bob.brown@example.com', 'b97873a40f73abedd8d685a7cd5e5f85e4a9cfb83eac26886640a0813850122b', 'user4.jpg', 'Hey, I\'m Bob Brown. I enjoy exploring new destinations and cultures.', 1),
('user5', 'Carol White', 'carol.white@example.com', '8b2c86ea9cf2ea4eb517fd1e06b74f399e7fec0fef92e3b482a6cf2e2b092023', 'user5.jpg', 'Nice to meet you! I\'m Carol White. Food lover and aspiring chef.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `post_title` text NOT NULL,
  `post_detailed` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `cat_id`, `post_title`, `post_detailed`, `post_status`, `post_date`) VALUES
(1, 'user1', 1, 'The Future of AI', 'A detailed article about the future of artificial intelligence.', 0, '2024-05-01 10:30:00'),
(2, 'user2', 2, 'Healthy Living Tips', 'Tips for maintaining a healthy lifestyle.', 0, '2024-05-02 11:00:00'),
(3, 'user3', 3, 'Travel on a Budget', 'How to travel the world without breaking the bank.', 1, '2024-05-03 09:45:00'),
(4, 'user4', 4, 'Top Travel Destinations', 'Discover the top travel destinations for 2024.', 0, '2024-05-04 08:30:00'),
(5, 'user5', 5, 'Delicious Vegan Recipes', 'Try these delicious vegan recipes for a healthy diet.', 1, '2024-05-05 07:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_categorise`
--

CREATE TABLE `post_categorise` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categorise`
--

INSERT INTO `post_categorise` (`cat_id`, `cat_name`) VALUES
(1, 'Technology'),
(2, 'Health'),
(3, 'Lifestyle'),
(4, 'Travel'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `reported_psot`
--

CREATE TABLE `reported_psot` (
  `reported_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `report_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reported_psot`
--

INSERT INTO `reported_psot` (`reported_id`, `post_id`, `user_id`, `report_status`) VALUES
(1, 1, 'user2', 0),
(2, 2, 'user1', 1),
(3, 3, 'user2', 2),
(4, 4, 'user3', 0),
(5, 5, 'user4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_media`
--
ALTER TABLE `blog_media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `post_categorise`
--
ALTER TABLE `post_categorise`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `reported_psot`
--
ALTER TABLE `reported_psot`
  ADD PRIMARY KEY (`reported_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_media`
--
ALTER TABLE `blog_media`
  ADD CONSTRAINT `blog_media_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `blog_user` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `post_categorise` (`cat_id`);

--
-- Constraints for table `reported_psot`
--
ALTER TABLE `reported_psot`
  ADD CONSTRAINT `reported_psot_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `reported_psot_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blog_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
