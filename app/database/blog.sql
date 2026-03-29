-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2026 at 09:39 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `publish` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `publish`, `created_at`) VALUES
(85, 71, 18, 'life of war', '1774792181_IMG-20220928-WA0000.jpg', '&lt;p&gt;War is one of humanity&rsquo;s most tragic and devastating realities. It is a force that disrupts societies, destroys lives, and leaves lasting scars on both individuals and nations. The life of war is not just about battles and strategies; it is about suffering, resilience, and the constant struggle between hope and despair.&lt;/p&gt;&lt;p&gt;The Human Cost&lt;/p&gt;&lt;p&gt;The most immediate impact of war is the suffering of people. Civilians are often caught in the crossfire, losing their homes, loved ones, and access to basic necessities such as food, water, and healthcare. Soldiers, too, face unimaginable hardships, confronting violence and death on a daily basis. PTSD, physical injuries, and emotional trauma become part of their daily reality. The life of war is a life of fear, uncertainty, and constant vigilance, where normalcy becomes a distant memory.&lt;/p&gt;&lt;p&gt;Social and Economic Consequences&lt;/p&gt;&lt;p&gt;War reshapes societies in profound ways. Economies collapse as industries shut down, trade stops, and infrastructure is destroyed. Education is disrupted, leaving children and young adults without the opportunity to learn and grow. Communities fracture under the weight of displacement and mistrust. In many cases, entire generations bear the scars of instability, struggling to rebuild what was lost for decades.&lt;/p&gt;&lt;p&gt;Psychological Impact&lt;/p&gt;&lt;p&gt;Beyond the physical and social devastation, war affects the human psyche deeply. Witnessing violence can lead to depression, anxiety, and a pervasive sense of hopelessness. Families are torn apart, and children may grow up without parents, mentors, or role models. The psychological burden of war often persists long after the conflict ends, influencing how survivors perceive the world and relate to others.&lt;/p&gt;&lt;p&gt;Resilience and Hope&lt;/p&gt;&lt;p&gt;Despite the horrors of war, human resilience often shines through. Communities come together to rebuild, support one another, and preserve their culture and dignity. Stories of courage, survival, and solidarity remind us that even in the darkest times, hope can persist. Human beings have an extraordinary ability to adapt, heal, and pursue peace, even after experiencing the most devastating conflicts.&lt;/p&gt;&lt;p&gt;Conclusion&lt;/p&gt;&lt;p&gt;The life of war is marked by destruction, suffering, and loss, but it also reveals the resilience of the human spirit. It is a life where fear and uncertainty dominate, yet where courage and hope emerge in unexpected ways. Understanding the realities of war is crucial&mdash;not to glorify it, but to recognize the importance of peace, empathy, and efforts to prevent conflicts. Only by learning from the tragedies of war can humanity aspire to a world where life is defined not by violence, but by understanding, cooperation, and lasting harmony.&lt;/p&gt;', 1, '2026-03-29 06:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(18, 'war', '<p>war &nbsp;zone</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(69, 1, 'robert', 'robert@gmail.com', '$2y$10$wN/DAG2N7awn/pRPGFPrQ.qGoVHsG.adrXy6O48SICU1lzvUEWnl2', '2026-03-29 12:59:30', 'user'),
(71, 0, 'john ', 'john@gmail.com', '$2y$10$bpknXbrNaw2WO2.ZQOdDb.fETS/dOv1BZvGTmj/b2ioZAn6Dp0.72', '2026-03-29 13:32:47', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
