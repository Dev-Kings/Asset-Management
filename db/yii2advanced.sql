-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 07:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(50) NOT NULL,
  `asset_description` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset_name`, `asset_description`, `created_at`) VALUES
(1, 'Acer Laptop', 'Acer Laptop running on Windows OS.', '2022-02-14 21:02:39'),
(2, '1 TB HDD', 'Transcend External Hard Drive.', '2022-02-14 23:02:10'),
(3, 'Lenovo PC', 'Desktop Lenovo Computer.', '2022-02-20 22:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `assign_asset`
--

CREATE TABLE `assign_asset` (
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_asset`
--

INSERT INTO `assign_asset` (`asset_id`, `user_id`) VALUES
(1, 20),
(2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_assignment`
--

CREATE TABLE `auth_asset_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_assignment`
--

INSERT INTO `auth_asset_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '12', NULL),
('assign-asset', '12', NULL),
('register-user', '12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_item`
--

CREATE TABLE `auth_asset_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_item`
--

INSERT INTO `auth_asset_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can register user and assign assets', NULL, NULL, NULL, NULL),
('assign-asset', 1, 'user assigns asset to user', NULL, NULL, NULL, NULL),
('register-user', 1, 'allows to register user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_item_child`
--

CREATE TABLE `auth_asset_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_item_child`
--

INSERT INTO `auth_asset_item_child` (`parent`, `child`) VALUES
('admin', 'assign-asset'),
('admin', 'register-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_rule`
--

CREATE TABLE `auth_asset_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_user_assignment`
--

CREATE TABLE `auth_asset_user_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_user_assignment`
--

INSERT INTO `auth_asset_user_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '12', NULL),
('assign-asset', '12', NULL),
('create-user', '12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_user_item`
--

CREATE TABLE `auth_asset_user_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_user_item`
--

INSERT INTO `auth_asset_user_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can register user, assign assets', NULL, NULL, NULL, NULL),
('assign-asset', 1, 'allows to assign asset', NULL, NULL, NULL, NULL),
('create-user', 1, 'allows to create user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_user_item_child`
--

CREATE TABLE `auth_asset_user_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_asset_user_item_child`
--

INSERT INTO `auth_asset_user_item_child` (`parent`, `child`) VALUES
('admin', 'assign-asset'),
('admin', 'create-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_asset_user_rule`
--

CREATE TABLE `auth_asset_user_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can register user, create and assign asset', NULL, NULL, NULL, NULL),
('assign-asset', 1, 'allow user assign assets', NULL, NULL, NULL, NULL),
('create-asset', 1, 'allows to create asset', NULL, NULL, NULL, NULL),
('register-user', 1, 'allows to register a user', NULL, NULL, NULL, NULL),
('staff', 1, 'registered staff', NULL, NULL, NULL, NULL),
('view-asset', 1, 'allows user to view asset', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'assign-asset'),
('admin', 'create-asset'),
('admin', 'register-user'),
('staff', 'view-asset');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `companies_company_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `companies_company_id`, `branch_name`, `branch_address`, `branch_status`) VALUES
(5, 9, 'JKIA', 'Jkia', 'active'),
(6, 10, 'DevOps', 'Embakasi North', 'active'),
(7, 11, 'Cloud Team', 'Silver Lining', 'inactive'),
(8, 9, 'IT Support', 'Cabanas', 'active'),
(9, 10, 'Web_Tech', 'Kilindini', 'active'),
(10, 10, 'Drupal', 'Oldoinyo', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `company_created_date` datetime NOT NULL,
  `company_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_email`, `company_address`, `logo`, `company_created_date`, `company_status`) VALUES
(9, 'KingsTech', 'kingstech@tech.company', 'Nai 7th Street', '', '2022-02-07 10:02:49', 'active'),
(10, 'Solutions Inc.', 'solinc@coders.io', 'Nile Valley', '', '2022-02-08 03:02:36', 'active'),
(11, 'Sillicon Valley', 's_valley@dev.sv', 'Athi Street', '', '2022-02-08 03:02:43', 'inactive'),
(12, 'Techie', 'tech@sat.io', 'Rover Road', 'uploads/Techie.jpg', '2022-02-09 08:02:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `branches_branch_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `companies_company_id` int(11) NOT NULL,
  `department_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `branches_branch_id`, `department_name`, `companies_company_id`, `department_status`) VALUES
(3, 5, 'IT', 9, 'active'),
(4, 7, 'Azure', 9, 'active'),
(5, 7, 'AWS', 9, 'active'),
(6, 9, 'Full Stack', 10, 'active'),
(7, 8, 'Software/Hardware', 11, 'active'),
(8, 10, 'Containerization', 12, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1644163993),
('m130524_201442_init', 1644164003),
('m190124_110200_add_verification_token_column_to_user_table', 1644164003);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(12, 'Dev', 'Kings', 'DevKings', 'YcRKDavb7-RW6s6XsYQhG9yV5wcHYnNQ', '$2y$13$T.WqBoby42vwYNwJTwM7XuxAVXaL1GugbiYpmA9Xe7meUPGsdcK/G', NULL, 'kingasiadavid41@gmail.com', 10, 1644255759, 1644256034, 'R1ppi8MLNdV5CCvuacVUGtbNVayl9YLp_1644255759'),
(20, 'Dev', 'Kingasia', 'DKings', 'cotJWrAZIDApLzcDOrSmJ11LZv_BUBdc', '$2y$13$9AfXossuopl7ousxcSkJv.4AA..KoxNGO3zdGCHWfr9SEgkh1ciWe', NULL, 'dkings@gmail.com', 9, 1644607203, 1644607203, 'alSNpc5zQOokUi7nFa6XfTxQWpf1Q7l9_1644607203'),
(22, 'Kevo', 'De Voke', 'Voke', '1BELh4wmAuWvtGUhPfzOLp7buU6nvybN', '$2y$13$YKGF8MgMNv/mhrp7wlHE4euMfs5PpOjn18xNV7pkTDs38Bb7V7K.S', NULL, 'devoke@gmail.com', 9, 1644780933, 1644780933, 'NcS3389U-TNk9nZo_2gzzgPpyqVQULv1_1644780933');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD UNIQUE KEY `asset_name` (`asset_name`);

--
-- Indexes for table `assign_asset`
--
ALTER TABLE `assign_asset`
  ADD UNIQUE KEY `asset_id` (`asset_id`),
  ADD UNIQUE KEY `user-id` (`user_id`);

--
-- Indexes for table `auth_asset_assignment`
--
ALTER TABLE `auth_asset_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_asset_item`
--
ALTER TABLE `auth_asset_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_asset_item_child`
--
ALTER TABLE `auth_asset_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_asset_rule`
--
ALTER TABLE `auth_asset_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_asset_user_assignment`
--
ALTER TABLE `auth_asset_user_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_asset_user_item`
--
ALTER TABLE `auth_asset_user_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_asset_user_item_child`
--
ALTER TABLE `auth_asset_user_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_asset_user_rule`
--
ALTER TABLE `auth_asset_user_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `fk_branches_companies_idx` (`companies_company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `fk_departments_branches1_idx` (`branches_branch_id`),
  ADD KEY `fk_departments_companies1_idx` (`companies_company_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_asset`
--
ALTER TABLE `assign_asset`
  ADD CONSTRAINT `assign_asset_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`),
  ADD CONSTRAINT `assign_asset_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `auth_asset_assignment`
--
ALTER TABLE `auth_asset_assignment`
  ADD CONSTRAINT `auth_asset_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_asset_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_asset_item`
--
ALTER TABLE `auth_asset_item`
  ADD CONSTRAINT `auth_asset_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_asset_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_asset_item_child`
--
ALTER TABLE `auth_asset_item_child`
  ADD CONSTRAINT `auth_asset_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_asset_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_asset_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_asset_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_asset_user_assignment`
--
ALTER TABLE `auth_asset_user_assignment`
  ADD CONSTRAINT `auth_asset_user_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_asset_user_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_asset_user_item`
--
ALTER TABLE `auth_asset_user_item`
  ADD CONSTRAINT `auth_asset_user_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_asset_user_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_asset_user_item_child`
--
ALTER TABLE `auth_asset_user_item_child`
  ADD CONSTRAINT `auth_asset_user_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_asset_user_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_asset_user_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_asset_user_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `fk_branches_companies` FOREIGN KEY (`companies_company_id`) REFERENCES `companies` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_departments_branches1` FOREIGN KEY (`branches_branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departments_companies1` FOREIGN KEY (`companies_company_id`) REFERENCES `companies` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
