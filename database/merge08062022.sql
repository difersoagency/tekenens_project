-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 11:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merge`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `og_image` text NOT NULL,
  `meta_desc` text DEFAULT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, '3d'),
(2, 'anime'),
(3, '2d'),
(4, 'manga'),
(5, 'tips'),
(6, 'diy'),
(7, 'fyi'),
(8, 'tmi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `instagram` varchar(20) DEFAULT NULL,
  `youtube` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `description`, `email`, `address`, `page_id`, `whatsapp`, `instagram`, `youtube`) VALUES
(2, 's simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', 'gemosiws@gmail.com', 'Jl. Patiunus 123, Jakarta Barat', NULL, '081234567819', '@tekenens', 'tekenens');

-- --------------------------------------------------------

--
-- Table structure for table `detail_page_desc`
--

CREATE TABLE `detail_page_desc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `media` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_portofolio`
--

CREATE TABLE `detail_portofolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `portofolio_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_portofolio`
--

INSERT INTO `detail_portofolio` (`id`, `portofolio_id`, `title`, `media`) VALUES
(6, 30, 'shutterstock-pic0', '629ffe379f17c_nicolette-meade-RL3F99l0XYE-unsplash.jpg'),
(8, 30, 'shutterstock-pic0', '62a001086d95f_kadir-celep-A8aJwJ49rVM-unsplash.jpg'),
(11, 31, 'Testing-the-Portofolio0', '62a005fcb9c75_5076524.jpg'),
(12, 31, 'Testing-the-Portofolio1', '62a0060b29083_3222.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `media` text DEFAULT NULL,
  `page_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `meta_desc`, `media`, `page_name`) VALUES
(1, 'test', NULL, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `page_id`, `name`, `photo`) VALUES
(10, NULL, 'Circle Company', 'images\\partner/3kP47HGTqD7OV9BZ7qOW6xFTTg5RpfiXpCAI1hlA.png'),
(11, NULL, 'Yourname Talent Production', 'images\\partner/UR5CAYxSj4LgRlhEQoEBI8y8JoNZFXUETllsnNa9.jpg'),
(12, NULL, 'Light Ai', 'images\\partner/2f7rNTY6G4vdj21hgGEK7EUdmAVJanycFi8NqJt3.png'),
(13, NULL, 'Xonxxus Company', 'images\\partner/chYlu3XCbbRdZV8TsFgW8pgUzebeLeMsbk27cs1G.png'),
(14, NULL, 'Treva Unity', 'images\\partner/cW77CTQbttP6yF6nVtMx183vqC4IzIi5zxh07Apk.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `publish_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `title`, `slug`, `description`, `publish_date`, `status`) VALUES
(30, 'Shutterstock', 'shutterstock-pic', 'This is Shutterstock pic that can be download freely', '2022-06-08 00:00:00', '1'),
(31, 'Testing the Portofolio', 'Testing-the-Portofolio', 'It\'s made for testing the portofolio page', '2022-06-08 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_category`
--

CREATE TABLE `portofolio_category` (
  `portofolio_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio_category`
--

INSERT INTO `portofolio_category` (`portofolio_id`, `category_id`) VALUES
(27, 3),
(27, 4),
(30, 3),
(30, 4),
(31, 1),
(31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_team`
--

CREATE TABLE `portofolio_team` (
  `portofolio_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio_team`
--

INSERT INTO `portofolio_team` (`portofolio_id`, `team_id`) VALUES
(27, 1),
(27, 2),
(30, 2),
(30, 3),
(31, 2),
(31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `photo`, `role`, `status`) VALUES
(1, 'Alfred', 'images\\team/MzzAlehNCuZvEAPbzln5riKlVZ0nEYee2eqyq3QW.jpg', 'Editor', '1'),
(2, 'Johnson', 'images\\team/tdAI9uZtR1Y18HYptW0hvlau8HLggeMDOPu0GLHr.png', 'Programmer', '1'),
(3, 'Frederick', 'images\\team/bt6Tk89nN5GwHTSIgiQ3CQ3nAVcNTWfsfYDWpoMe.png', 'Video Grapher', '1'),
(4, 'Christina', 'images\\team/kHVgdoCQHpcu7kFx7PCYgyefFAXpNJdHTmmGX51J.jpg', 'Quality Control', '1'),
(5, 'Stephania', 'images\\team/GxNRInwISYReVpqzBuWY89p3uu4ppUPD3zALFQ4L.jpg', 'Editor', '1'),
(6, 'Yulianti', 'images\\team/YKevlGPKH7rbDDEoVlXNRSU8PRPX0aXmpTbeDkuL.png', 'Purchasing', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `name`, `description`, `photo`) VALUES
(3, 'Indri Kartika', 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli', 'images\\testimoni/AYLafWfsg1VjqulcaY6jO7thPEiMYDEDWGVy7odm.jpg'),
(4, 'Savira Rusmini', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. N', 'images\\testimoni/ElSdgTfjhqFyo2UYYMdbUxV3pbahFn1WJknvUdE1.jpg'),
(5, 'Geraldine', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis d', 'images\\testimoni/l1xaiYcITHaeaXZbuEYvXBpySoTY6Rj2QDb7xPlH.jpg'),
(6, 'John Andreas', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', 'images\\testimoni/Nurmr2k9Mf2XxNCCOW9KUcKqOpQbrue5nun0On4a.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-05-17 02:09:27', '$2y$10$4j2G7c6pbszi9yt96PHyK.iIDBI2fnWHFI9mv4x.pCz4xyyNy0ZLi', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `detail_page_desc`
--
ALTER TABLE `detail_page_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `detail_portofolio`
--
ALTER TABLE `detail_portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portofolio_id` (`portofolio_id`),
  ADD KEY `portofolio_id_2` (`portofolio_id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_page_desc`
--
ALTER TABLE `detail_page_desc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_portofolio`
--
ALTER TABLE `detail_portofolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Constraints for table `detail_page_desc`
--
ALTER TABLE `detail_page_desc`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);

--
-- Constraints for table `detail_portofolio`
--
ALTER TABLE `detail_portofolio`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolio` (`id`);

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
