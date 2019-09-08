-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 07:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'bootstrap'),
(2, 'ahmed shoft'),
(3, 'PHP mo'),
(4, 'musatafa'),
(9, 'muhammed'),
(10, 'Ù„Ø§ Ø§Ù„Ù‡ Ø§Ù„Ø§ Ø§Ù„Ù„Ù‡ Ù…Ø­Ù…Ø¯ Ø±Ø³ÙˆÙ„ Ø§Ù„Ù„Ù‡');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 1, 'muhammed', 'mohsen@emaill.com', 'Ø§Ù„Ø­Ù…Ø¯Ù„Ù„Ù‡ Ø±Ø¨ Ø§Ù„Ø¹Ø§Ù„Ù…ÙŠÙ† ÙŠØ§Ø±Ø¨ Ù„Ùƒ Ø§Ù„Ø­Ù…Ø¯ Ø­ØªÙ‰ ØªØ¶ÙŠ ÙˆÙ„Ùƒ Ø§Ù„Ø­Ù…Ø¯ Ø¨Ø¹Ø¯ Ø§Ù„Ø±Ø¶ÙŠ ÙˆÙ„Ùƒ Ø§Ù„Ø­Ù…Ø¯ Ø§Ø¨Ø¯ Ø§Ø¨Ø¯ \r\n', 'approved', '2019-02-14'),
(4, 1, 'Muhammed Mohsen nassar', 'mohsen@gmail.com', 'Ù„Ø§ØªØ®Ø´Ù‰ Ù…Ù† ØªØ¯Ø§Ø¨ÙŠØ± Ø§Ù„Ø¨Ø´Ø± ÙØ§Ø£Ù‚ØµÙŠ Ù…Ø§ÙŠØ³ØªØ·ÙŠØ¹ÙˆÙ† ÙØ¹Ù„Ù‡ Ù‡ÙˆØªÙ†ÙÙŠØ° Ù…Ø§Ø±Ø§Ø¯Ù‡ Ø§Ù„Ù„Ù‡ Ù„Ùƒ', 'approved', '2019-02-14'),
(21, 1, 'tghw4h', 'thgsrth', 'shrtshsg', 'unapproved', '2019-02-14'),
(22, 1, 'ytjj', 'eyjeytje', 'ryjjrehh', 'unapproved', '2019-02-14'),
(23, 11, 'muhammed', 'muahmmed@mohsen.com', 'jnlbc dfbh hvb \r\n\r\n', 'unapproved', '2019-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 10, 'muhammed\'s cms PHP course is  awesome ', 'MUHAMMED MOHSEN', '2019-02-10', 'download.png\r\n', '   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis hic, placeat nam iusto accusantium error alias temporibus similique tempora. Tempore ratione, beatae iste ea nobis accusantium sunt vel nulla facilis!           \r\n                   ', 'muhammed , javascript , php', 5, 'puplished'),
(8, 10, 'etyjet', 'dghn', '2019-02-13', '', 'hbjk    \r\n            ', 'vj', 4, 'jbkvgv'),
(9, 3, 'gmjg', 'm', '2019-02-13', 'Screenshot (9).png', '    gmfhjmf\r\nfgmnf\r\n            ', 'fmf', 4, 'fgmfg'),
(10, 0, 'gvrtgv', 'grvwr', '2019-02-16', 'Screenshot (43).png', '    wdfvgfv\r\n            ', 'wvfvdcv', 0, 'wvgfv'),
(11, 0, 'lablablabla', 'sfhg', '2019-02-16', 'Screenshot (44).png', '   dcvefvf\r\nefvcfcvf \r\n            ', 'fqeve', 1, 'puplished');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(1, 'muhammed', 'mohsen', 'Muhammed', 'mohsen', 'muhammmed.mohsen43@yahoo.com', '', 'admin', ''),
(2, 'saeed', 'muhammed', 'egresg', 'sgdfg', 'muhammed@mohsen.com', '', 'subscriber', ''),
(4, '', '', '', '', '', '', 'Seclect Option', ''),
(5, 'muhammed v', 'kjlasbdhbvgrvg', 'muhammed', 'mohsen', 'mohsewn@mon.com', '', 'Admin', ''),
(6, 'avfafdv', 'asdcvca', 'gvear', 'advfv', 'avfaf@kdfklvn.com', '', 'Seclect Option', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
