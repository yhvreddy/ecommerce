-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 10:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecom_admins`
--

CREATE TABLE `ecom_admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(350) NOT NULL,
  `last_name` varchar(350) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(350) NOT NULL,
  `type` int(11) NOT NULL,
  `password` text NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_status` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_banners`
--

CREATE TABLE `ecom_banners` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `red_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='upload banners for website';

-- --------------------------------------------------------

--
-- Table structure for table `ecom_categories`
--

CREATE TABLE `ecom_categories` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(50) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `image` varchar(350) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='storing categories Ex: Electronics, TVs & Appliances, Men, Women, Books, etc..';

-- --------------------------------------------------------

--
-- Table structure for table `ecom_merchants`
--

CREATE TABLE `ecom_merchants` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(25) DEFAULT NULL,
  `first_name` varchar(350) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(350) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `pincode` int(11) NOT NULL,
  `otp` int(6) NOT NULL,
  `otp_status` int(5) NOT NULL DEFAULT 0 COMMENT '0-No, 1-Yes',
  `status` int(5) NOT NULL DEFAULT 0,
  `password` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Add Merchants to manage accounts';

-- --------------------------------------------------------

--
-- Table structure for table `ecom_products`
--

CREATE TABLE `ecom_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(350) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `original_price` int(11) NOT NULL COMMENT 'MRP Rate',
  `discount` int(11) NOT NULL COMMENT 'In %',
  `status` int(11) NOT NULL DEFAULT 1,
  `reg_id` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_by_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Add products details';

-- --------------------------------------------------------

--
-- Table structure for table `ecom_product_type`
--

CREATE TABLE `ecom_product_type` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(50) NOT NULL,
  `product_name` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_site_details`
--

CREATE TABLE `ecom_site_details` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(50) NOT NULL,
  `site_name` varchar(280) NOT NULL,
  `website` varchar(280) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `mail_id` varchar(250) NOT NULL,
  `alter_mail_id` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `fav_icon` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_sub_categories`
--

CREATE TABLE `ecom_sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `reg_id` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_tags`
--

CREATE TABLE `ecom_tags` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tags like :Brands, etc';

-- --------------------------------------------------------

--
-- Table structure for table `ecom_users`
--

CREATE TABLE `ecom_users` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(25) DEFAULT NULL,
  `first_name` varchar(350) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(350) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `pincode` int(11) NOT NULL,
  `otp` int(6) NOT NULL,
  `otp_status` int(5) NOT NULL DEFAULT 0 COMMENT '0-No, 1-Yes',
  `status` int(5) NOT NULL DEFAULT 0,
  `password` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_users_types`
--

CREATE TABLE `ecom_users_types` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-superadmin, 2-admin, 3-employees',
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_users_types`
--

INSERT INTO `ecom_users_types` (`id`, `name`, `type`, `status`, `created`) VALUES
(1, 'superadmin', 1, 1, '2019-10-18 18:36:07'),
(2, 'admin', 2, 1, '2019-10-18 18:36:07'),
(3, 'employees', 3, 1, '2019-10-18 18:36:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecom_admins`
--
ALTER TABLE `ecom_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `mail_id` (`mail_id`);

--
-- Indexes for table `ecom_banners`
--
ALTER TABLE `ecom_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_categories`
--
ALTER TABLE `ecom_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_merchants`
--
ALTER TABLE `ecom_merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- Indexes for table `ecom_products`
--
ALTER TABLE `ecom_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_product_type`
--
ALTER TABLE `ecom_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_site_details`
--
ALTER TABLE `ecom_site_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- Indexes for table `ecom_sub_categories`
--
ALTER TABLE `ecom_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_tags`
--
ALTER TABLE `ecom_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- Indexes for table `ecom_users`
--
ALTER TABLE `ecom_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- Indexes for table `ecom_users_types`
--
ALTER TABLE `ecom_users_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecom_admins`
--
ALTER TABLE `ecom_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_banners`
--
ALTER TABLE `ecom_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_categories`
--
ALTER TABLE `ecom_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_merchants`
--
ALTER TABLE `ecom_merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_products`
--
ALTER TABLE `ecom_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_product_type`
--
ALTER TABLE `ecom_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_site_details`
--
ALTER TABLE `ecom_site_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_sub_categories`
--
ALTER TABLE `ecom_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_tags`
--
ALTER TABLE `ecom_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_users`
--
ALTER TABLE `ecom_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecom_users_types`
--
ALTER TABLE `ecom_users_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
