-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 08:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image1`, `image2`, `description`) VALUES
(1, 'https://shorturl.at/eEHUV', 'https://shorturl.at/eEHUV', '3BookParadime is a fantastic online library where you can read books for free. With a large collection of titles across a wide variety of genres, BookParadime has something for every reader. Whether you love mystery novels, sci-fi epics, historical nonfiction, or any other kind of literature, you will find great reads on BookParadime . One of the best parts of BookParadime is the user-friendly interface. The site is cleanly designed and very easy to navigate. You can quickly search for books by title, author, or genre. Managing your reading list and tracking your progress is seamless. Everything is optimized for a smooth reading experience. And if you cant find a book you want, you can easily request new titles to be added to the collection. Overall, BookParadime offers an accessible, enjoyable way to access a huge selection of free books. With a great UI and new titles being added all the time, its a paradise for book lovers.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cover_image_link` varchar(255) DEFAULT NULL,
  `book_link` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover_image_link`, `book_link`, `title`, `author`, `description`) VALUES
(2, 'https://shorturl.at/eEHUV', 'google.com', 'a', 'a', 'a'),
(9, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQCUw-7MYF2ERuNRFDiyKbc9l6kE5YGwD8jd3SW3Oec95RiVOgw', 'https://drive.google.com/file/d/1f19ZkMgElmqQSC_FeodpSMcpkVL0vst1/view?usp=sharing', 'A Brief History of Time ', 'Stephen Hawking', 'A Brief History of Time: From the Big Bang to Black Holes is a book on theoretical cosmology by English physicist Stephen Hawking. It was first published in 1988. Hawking wrote the book for readers who had no prior knowledge of physics'),
(10, 'https://static-01.daraz.com.np/p/66658e9a937132b551ef76d73a5df9d0.jpg', 'https://drive.google.com/file/d/14MWVhqG2pzGKWLo2wZLF3ySBQQQW7z1o/view', 'The Monk Who Sold His Ferrari', 'Robin Sharma', 'The Monk Who Sold His Ferrari is a self-help book by Robin Sharma, a writer and motivational speaker. The book is a business fable derived from Sharmas personal experiences after leaving his career as a litigation lawyer at the age of 25. '),
(12, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTnQJ0v9g8oGB5QKfVUK7fKQALrhrJL3UmQZimYyZpQB4W-JPrh', 'https://drive.google.com/file/d/12F-gbda3pYxsw5wroPtsMiP9BoxoUBmH/view', 'Everything Is F*cked', 'Mark Manson', 'Everything Is F*cked: A Book About Hope is the third book by blogger and author Mark Manson published in 2019. It followed previous self-help books from Mark Manson, including The Subtle Art of Not Giving a F*ck bestseller.'),
(15, 'https://m.media-amazon.com/images/I/51McL7SzsUL._SL500_.jpg', 'https://drive.google.com/file/d/1gYwC-odtb910Fk0BDnSHyxSXz9FfXIYa/view', 'The Story of an Hour', ' Kate Chopin', '\"The Story of an Hour\" is a short story written by Kate Chopin on April 19, 1894. It was originally published in Vogue on December 6, 1894, as \"The Dream of an Hour\". It was later reprinted in St. Louis Life on January 5, 1895, as \"The Story of an Hour\"'),
(16, 'https://g.christianbook.com/g/slideshow/8/817010/main/817010_1_ftc_dp.jpg', 'https://drive.google.com/file/d/1fTQ0scZgP_EUebfe_49vCV97aku0GXIq/view', 'The Gift of the Magi ', 'O. Henry', '\"The Gift of the Magi\" is a short story by O. Henry first published in 1905. The story tells of a young husband and wife and how they deal with the challenge of buying secret Christmas gifts for each other with very little money.');

-- --------------------------------------------------------

--
-- Table structure for table `requested_books`
--

CREATE TABLE `requested_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requested_books`
--

INSERT INTO `requested_books` (`id`, `book_name`, `isbn`, `author`, `release_date`) VALUES
(5, 'as', '23', 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`) VALUES
(8, 'admin', 'adm1n@gmail.com', '$2y$10$vvVgwcvZ5wnILi6x/uBif.pwXdfaQL0rnA75KTd33go.MqUyEiXCi', '2023-08-01 09:00:19', 1),
(12, 'rijan', 'use@gmail.com', '$2y$10$YxWxkKNxxG69PiAcDsuZ4e8JYk9DDSBUbUkKC7DPPESDidTpLu8zW', '2023-08-09 16:23:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_books`
--
ALTER TABLE `requested_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requested_books`
--
ALTER TABLE `requested_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
