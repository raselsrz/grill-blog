-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2024 at 01:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `post_id`, `user_id`, `comment`, `added`) VALUES
(26, 12, 8, 'Nice Blog', '2024-08-08 04:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Technology', 'techonology'),
(2, 'Tips', 'tips'),
(3, 'Laravel & PHP', 'laravel & php'),
(4, 'Wordpress', 'wordpress'),
(5, 'Web Development', 'web development'),
(6, 'Css', 'css'),
(7, 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `address`, `message`, `email`) VALUES
(3, 'Sohag Srz', 'Saidpur,Bangladesh', 'hello World Rasel Srz', 'sohag@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post_data`
--

CREATE TABLE `post_data` (
  `id` int NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `author` int NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `post_category` int NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_data`
--

INSERT INTO `post_data` (`id`, `title`, `content`, `slug`, `author`, `img`, `post_category`, `created_at`) VALUES
(1, 'Why Laravel is My Go-To PHP Framework', 'Laravel has become a favorite for many PHP developers, including myself. In this post, I’ll discuss why Laravel stands out with its elegant syntax, powerful tools like Eloquent ORM, and built-in features like authentication. Whether you’re building a small project or a complex application, Laravel makes development smoother and more enjoyable.', 'why-laravel-is-my-go-to-php-framework', 1, 'assets/img/copy-Why-Laravel.jpg', 3, '0000-00-00 00:00:00'),
(12, 'Why I Love Being a Web Developer', 'As a web developer, every day brings new challenges and opportunities to create something unique. From the moment I wrote my first line of code, I knew this was my passion. I’m Md Rasel Islam, and I’ve been developing websites for several years now, specializing in PHP, Laravel, and WordPress.\r\n\r\nOne of the things I love most about web development is the constant evolution of technology. There’s always something new to learn, whether it’s a new framework, a coding technique, or an innovative way to solve a problem. This keeps my work exciting and fresh, and I’m always eager to dive into the next project.', 'why-i-love-being-a-web-developer', 1, 'assets/img/copy-0_YnId1SCTSSkgeV3t.png', 2, '0000-00-00 00:00:00'),
(13, '5 Essential Plugins for WordPress Developers', 'As a WordPress developer, plugins are your best friends. In this blog post, I’ll share my top five essential plugins that can enhance your WordPress development workflow, from security to performance optimization and custom fields management. These plugins can help streamline your work and add powerful features to your projects.\r\n', '5-essential-plugins-for-wordpress-developers', 1, 'assets/img/images (1).jpeg', 4, '2024-08-04 17:57:42'),
(14, 'The Importance of Responsive Design in Modern Web Development', 'Responsive design isn’t just a trend; it’s a necessity in today’s mobile-first world. In this post, I’ll explore why making your websites responsive is crucial for user experience and SEO. I’ll also share some tips and best practices for ensuring your designs look great on any device.\r\n\r\n', 'the-importance-of-responsive-design-in-modern-web-development', 1, 'assets/img/images.png', 2, '2024-08-04 17:59:11'),
(15, 'How to Optimize Your PHP Code for Better Performance', 'Performance is key to a successful web application. In this blog, I’ll discuss some simple yet effective ways to optimize your PHP code, including using caching, minimizing database queries, and leveraging PHP’s built-in functions. These techniques can significantly improve your site’s speed and efficiency.\r\n\r\n', 'how-to-optimize-your-php-code-for-better-performance', 1, 'assets/img/images (1).png', 3, '2024-08-04 18:00:20'),
(16, 'Getting Started with Custom WordPress Theme Development', 'Creating a custom WordPress theme can be a rewarding experience. In this post, I’ll provide a beginner-friendly guide to getting started with theme development, covering the basics of theme structure, template files, and best practices. Whether you’re looking to create a unique design or build a theme for a client, this guide will help you get started.', 'getting-started-with-custom-wordpress-theme-development', 1, 'assets/img/copy-sddefault.jpg', 4, '2024-08-04 18:04:08'),
(17, 'The Benefits of Using a CSS Framework', 'Explore the advantages of using CSS frameworks like Bootstrap or Tailwind CSS. Discuss how they can speed up development, ensure consistency, and provide a range of pre-built components.', 'the-benefits-of-using-a-css-framework', 1, 'assets/img/images (2).png', 6, '2024-08-04 18:05:32'),
(18, 'How to Secure Your Laravel Application', 'Security is crucial for any application. This post will cover essential security practices for Laravel applications, including protecting against SQL injection, XSS attacks, and ensuring proper authentication.\r\n', 'how-to-secure-your-laravel-application', 1, 'assets/img/images (2).jpeg', 3, '2024-08-04 18:06:29'),
(19, 'Hey I am Rasel Srz', 'hello World', 'hey-i-am-rasel-srz', 1, 'assets/img/2023-skills-ideyl.jpg', 7, '2024-08-07 18:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `address`, `email`, `password`, `role`, `phone`, `full_name`) VALUES
(1, 'rasel', 'rasel@gmail.com', '4521', 'admin', '01839636973', 'Md Rasel Islam'),
(2, 'Rasel Srz_4521', 'rasel4521@gmail.com', '4242', 'user', '01798965123', 'Md Rasel Islam'),
(3, 'Sohag', 'sohag4521@gmail.com', '6262', 'user', '01798965122', 'Md Sohag Islam'),
(4, 'raju4521', 'rajuislam4521Y@gmail', '1234', 'user', '01798965122', 'Md Raju Islam'),
(8, 'Saidpur,Bangladesh', 'srz@gmail.com', '452100', 'user', '8801542154875', 'Rasel Srz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_data`
--
ALTER TABLE `post_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_data`
--
ALTER TABLE `post_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
