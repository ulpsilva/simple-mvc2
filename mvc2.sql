-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 05:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(8, 'computer'),
(9, 'mouse');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `quantity`, `price`, `image`, `category_id`) VALUES
(11, 'apple', '<p text-align=\"justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis arcu quis dictum porta. Vestibulum a mi tortor. Maecenas sagittis laoreet diam a ullamcorper. Nunc id sollicitudin tellus. Suspendisse quis gravida enim, at tincidunt augue. Cras ultrices mauris at neque pretium accumsan. Aliquam semper lorem sit amet purus imperdiet, vehicula molestie ligula elementum. Donec finibus ornare magna eu ultricies. Nulla tempus, eros ac egestas mollis, ligula libero suscipit tellus, interdum vestibulum tortor dui nec urna. Praesent eros odio, posuere in erat eu, cursus fringilla quam. Etiam at est commodo, gravida orci ut, convallis neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque fermentum lorem eget dictum viverra.</p>', 12, '1000.00', 'public/uploads/products/1529471435.jpg', 8),
(12, 'lenovo', '<p text-align=\"justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis arcu quis dictum porta. Vestibulum a mi tortor. Maecenas sagittis laoreet diam a ullamcorper. Nunc id sollicitudin tellus. Suspendisse quis gravida enim, at tincidunt augue. Cras ultrices mauris at neque pretium accumsan. Aliquam semper lorem sit amet purus imperdiet, vehicula molestie ligula elementum. Donec finibus ornare magna eu ultricies. Nulla tempus, eros ac egestas mollis, ligula libero suscipit tellus, interdum vestibulum tortor dui nec urna. Praesent eros odio, posuere in erat eu, cursus fringilla quam. Etiam at est commodo, gravida orci ut, convallis neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque fermentum lorem eget dictum viverra.</p>', 5, '800.00', 'public/uploads/products/1529471494.jpg', 8),
(13, 'mouse', '<p text-align=\"justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis arcu quis dictum porta. Vestibulum a mi tortor. Maecenas sagittis laoreet diam a ullamcorper. Nunc id sollicitudin tellus. Suspendisse quis gravida enim, at tincidunt augue. Cras ultrices mauris at neque pretium accumsan. Aliquam semper lorem sit amet purus imperdiet, vehicula molestie ligula elementum. Donec finibus ornare magna eu ultricies. Nulla tempus, eros ac egestas mollis, ligula libero suscipit tellus, interdum vestibulum tortor dui nec urna. Praesent eros odio, posuere in erat eu, cursus fringilla quam. Etiam at est commodo, gravida orci ut, convallis neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque fermentum lorem eget dictum viverra.</p>', 24, '30.00', 'public/uploads/products/1529471557.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test', 'admin', 'admin'),
(24, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
