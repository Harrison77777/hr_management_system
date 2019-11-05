-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 10:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application_with_jwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Human resource', '2019-10-17 23:37:42', '2019-10-17 23:37:42'),
(7, 'IT Section', '2019-10-18 20:39:51', '2019-10-18 20:39:51'),
(8, 'Accounting', '2019-10-28 02:39:44', '2019-10-28 02:39:44'),
(9, 'Machtizier', '2019-11-02 07:28:43', '2019-11-02 07:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` bigint(20) NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `got_current_month_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_salary_pay_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_salary_pay_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qualification` mediumtext COLLATE utf8mb4_unicode_ci,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `place`, `previous_place`, `got_current_month_salary`, `last_salary_pay_month`, `last_salary_pay_date`, `department_id`, `qualification`, `address`, `email`, `phone`, `photo`, `employee_id`, `created_at`, `updated_at`) VALUES
(6, 'Shahin Hossain', 10000, 'Product Manager', 'Manager', 'November', 'November', '02-11-2019', 1, 'H.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shahin@gmail.com', '123412123477', '5dabcc9456b30.jpg', 'G-78ed59e', '2019-10-19 20:55:16', '2019-11-02 13:34:14'),
(7, 'Xohir', 25000, 'Product Manager', 'Product Manager', 'November', 'November', '03-11-2019', 1, 'B.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'xohir@gmail.com', '01854284712', '5dacdea444cb0.jpg', 'G-568q3g5', '2019-10-20 16:24:37', '2019-11-03 06:41:03'),
(8, 'Akash', 25000, 'Manager', NULL, 'November', 'November', '03-11-2019', 7, 'M.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'akash@gamil.com', '01854284712', '5dacdf711ef2c.png', 'G-2387ede', '2019-10-20 16:28:01', '2019-11-03 07:36:12'),
(9, 'Milon', 30000, 'Visitor', NULL, 'November', 'November', '03-11-2019', 1, 'C.S.E', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'milon@gmail.com', '01854284712', '5dacdfb65a670.png', 'G-89317el', '2019-10-20 16:29:10', '2019-11-03 06:41:15'),
(10, 'Tamim', 25000, 'Programmer', NULL, 'November', 'November', '03-11-2019', 7, 'SE', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'tamim@gmail.com', '1231231234', '5dace016cdf0c.jpeg', 'G-000eue9', '2019-10-20 16:30:46', '2019-11-03 07:36:21'),
(11, 'Shagour', 10000, 'Manager', 'General employee', 'November', 'November', '03-11-2019', 1, 'H.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shagour@gmail.com', '1251259874', '5dace0527755f.png', 'G-e5e5258', '2019-10-20 16:31:46', '2019-11-03 06:41:21'),
(12, 'Shohagh', 20000, 'Technician', NULL, 'October', 'October', '27-10-2019', 7, 'B.S.S', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shohagh@gmail.com', '987654321789', '5dace0cb5ec87.png', 'G-583078e', '2019-10-20 16:33:47', '2019-10-27 13:05:14'),
(13, 'Manik', 20000, 'Asses tent manager', NULL, 'November', 'November', '03-11-2019', 1, 'B.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'manik@gmail.com', '52139787452', '5dace131b6f70.png', 'G-eiu8669', '2019-10-20 16:35:29', '2019-11-03 07:41:17'),
(14, 'Shohal', 10000, 'General employee', NULL, 'November', 'November', '04-11-2019', 1, 'H.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shohal@gmail.com', '8752147899785', '5dace17a45132.png', 'G-5298dej', '2019-10-20 16:36:42', '2019-11-03 18:45:26'),
(15, 'Kabir', 35000, 'Adviser', NULL, 'October', 'October', '25-10-2019', 1, 'M.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'kabir@gmail.com', '87632147985', '5dace1bb5b4f0.png', 'G-eui523e', '2019-10-20 16:37:47', '2019-10-25 06:06:34'),
(16, 'Shakil', 10000, 'General employee', NULL, 'October', 'October', '27-10-2019', 7, 'Bachelor Degree', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shakil@gmail.com', '475621478997', '5dace1f4da678.jpg', 'G-58621ed', '2019-10-20 16:38:44', '2019-10-27 13:05:37'),
(17, 'Monir Shaikh', 10000, 'General employe', NULL, 'October', 'October', '27-10-2019', 7, 'B.S.S', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'monir@gmail.com', '75546987557', '5dace317ddd92.jpeg', 'G-78899de', '2019-10-20 16:43:35', '2019-10-27 13:05:53'),
(18, 'Hamdi', 50000, 'Manager', NULL, 'October', 'October', '27-10-2019', 7, 'M.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'hamdi@gmail.com', '87787558965', '5dace35f55b8e.png', 'G-5897ede', '2019-10-20 16:44:47', '2019-10-27 13:06:53'),
(19, 'Faria', 40000, 'Trainer', NULL, 'October', 'October', '25-10-2019', 1, 'B.S.C in C.S.E', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'faria@gmail.com', '78587585787', '5dace3b031b89.jpeg', 'G-583369e', '2019-10-20 16:46:08', '2019-10-25 06:02:20'),
(20, 'Mokbul Hossin', 35000, 'Product manager', NULL, 'November', 'November', '03-11-2019', 7, 'B.S.C in C.S.E', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'mokbul@gmail.com', '8545775556877', '5dace41975631.png', 'G-ueiki89', '2019-10-20 16:47:53', '2019-11-03 07:36:31'),
(21, 'Babu', 20000, 'General employee', NULL, 'October', 'October', '25-10-2019', 1, 'Masters in Management', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'babu@gmail.com', '78842575898', '5dace46d26379.png', 'G-866989', '2019-10-20 16:49:17', '2019-10-25 06:00:34'),
(22, 'Monir Shaikh', 10000, 'General employe', NULL, 'October', 'October', '27-10-2019', 1, 'H.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'mo@gmail.com', '01854284712', '5db59b91a6a74.png', 'G-01ea27a', '2019-10-27 07:28:50', '2019-10-27 13:32:44'),
(23, 'Shehab Hossain', 60000, 'Accountant', NULL, 'October', 'October', '28-10-2019', 8, 'M.B.A', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shehab@gmail.com', '01854284712', '5db6a9b8d2f46.png', 'G-a56c991', '2019-10-28 02:41:29', '2019-10-28 09:10:25'),
(24, 'Parvin', 10000, 'General employee', NULL, 'October', 'October', '28-10-2019', 1, 'H.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'developer.harrison.api@gmail.com', '01854284712', '5db6ab7cbe2f4.jpeg', 'G-5f44d09', '2019-10-28 02:49:00', '2019-10-28 10:34:27'),
(25, 'Nadim', 10000, 'General employe', NULL, 'October', 'October', '28-10-2019', 1, 'dfvsdfsd', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'ermhroy@gmail.com', '01854284712', '5db6b0db6cc8e.jpeg', 'G-a59f1fd', '2019-10-28 03:11:55', '2019-10-28 09:22:34'),
(26, 'Shawon', 25000, 'General employe', NULL, 'October', 'October', '28-10-2019', 7, 'dsafasdf', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'shawon@gmail.com', '454557868', '5db6b3963bb0e.jpg', 'G-7ea92a9', '2019-10-28 03:23:34', '2019-10-28 09:27:34'),
(27, 'Noman', 30000, 'Programmer', NULL, 'October', 'October', '28-10-2019', 7, 'B.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'noman@gmail.com', '4558875', '5db6b567b3620.png', 'G-5b7c17f', '2019-10-28 03:31:20', '2019-10-28 09:31:37'),
(28, 'Amir', 15000, 'Pion', NULL, 'October', 'October', '28-10-2019', 1, 'S.S.C', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'amir@gmail.com', '455878', '5db714f236696.png', 'G-eab2aff', '2019-10-28 10:18:59', '2019-10-28 16:32:13'),
(29, 'Hamdi hossin', 20000, 'Office Assistant', NULL, 'October', 'October', '29-10-2019', 8, 'Noakhali, Bangladesh', 'M.pasa (utter) Bonickpara, Kuet, Daulatpur, Khulna, Bangladesh', 'hamdi2@gmail.com', '4557888545', '5db7f0caa439a.png', 'G-67058c9', '2019-10-29 01:56:59', '2019-10-29 07:57:44'),
(30, 'Asadurzzaman Edited', 50000, 'MD', 'Machtizier', NULL, NULL, NULL, 9, 'H.S.C', 'Khulna, Bangladesh', 'Asadurzzaman@gmail.com', '7455455878528', '5dbd84f5c311a.jpg', 'G-4f0f80e', '2019-11-02 07:30:30', '2019-11-02 07:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `expanses`
--

CREATE TABLE `expanses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expanses`
--

INSERT INTO `expanses` (`id`, `details`, `amount`, `month`, `year`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Buy some snacks', 500, 'October', '2019', '22-10-2019', '2019-10-21 21:59:42', '2019-10-21 21:59:42'),
(2, '20 Pen', 100, 'October', '2019', '22-10-2019', '2019-10-21 22:00:19', '2019-10-21 22:00:19'),
(3, 'Snacks 500', 500, 'October', '2019', '23-10-2019', '2019-10-23 00:25:36', '2019-10-23 00:25:36'),
(4, 'Net Bill 2000', 2000, 'October', '2019', '23-10-2019', '2019-10-23 00:58:16', '2019-10-23 00:58:16'),
(5, 'Buy some papers 200', 200, 'October', '2019', '23-10-2019', '2019-10-23 08:24:02', '2019-10-23 08:24:02'),
(6, 'Lunch 5000', 5000, 'October', '2019', '28-10-2019', '2019-10-28 09:28:36', '2019-10-28 09:28:36'),
(7, 'Snacks 1000', 1000, 'October', '2019', '28-10-2019', '2019-10-28 09:28:58', '2019-10-28 09:28:58'),
(8, 'dfsdf', 100, 'October', '2019', '28-10-2019', '2019-10-28 09:29:06', '2019-10-28 09:29:06'),
(9, 'Snacks 200', 200, 'October', '2019', '30-10-2019', '2019-10-30 17:45:49', '2019-10-30 17:45:49'),
(10, 'Snacks', 10000, 'November', '2019', '02-11-2019', '2019-11-02 13:32:08', '2019-11-02 13:32:08'),
(11, 'Net Bill 600', 600, 'November', '2019', '04-11-2019', '2019-11-03 18:24:49', '2019-11-03 18:24:49'),
(12, 'Current Bill 2500', 2500, 'November', '2019', '04-11-2019', '2019-11-03 18:25:03', '2019-11-03 18:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_17_231520_create_departments_table', 2),
(9, '2019_10_19_013555_create_employees_table', 3),
(10, '2019_10_22_034837_create_expanses_table', 4),
(11, '2019_10_23_142509_create_salaries_table', 5),
(12, '2019_10_30_060150_create_vacancies_table', 6),
(13, '2019_10_31_043437_create_qualifications_table', 7),
(14, '2019_10_31_122114_create_projects_table', 8),
(15, '2019_10_31_124456_create_tasks_table', 8),
(16, '2019_11_03_170721_create_reports_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_contributor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible_team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_budget` bigint(20) NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_length` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_brief` text COLLATE utf8mb4_unicode_ci,
  `completion_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `main_contributor`, `responsible_team`, `project_budget`, `client_name`, `project_length`, `project_brief`, `completion_status`, `created_at`, `updated_at`) VALUES
(1, 'Currency selling web site', 'Hamdi', 'Laravel Team A', 30000, 'Monir hossain/ A currency seller', '10-10-2019', NULL, 1, '2019-10-31 10:36:09', '2019-11-04 02:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_qualification` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_qualification` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `place_name`, `education_qualification`, `skill_qualification`, `created_at`, `updated_at`) VALUES
(1, 'Accountant', 'M.B.A from any reputed University', 'Have to have a great knowledge about computer', '2019-10-30 23:30:58', '2019-10-30 23:30:58'),
(2, 'Office Assestant', 'S.S.C Pass\nResult: GPA upto 3.00 Out of 5', 'Have to Have a minimum knowledge about computer', '2019-10-31 04:03:09', '2019-10-31 04:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `employee_name`, `employee_id`, `report`, `created_at`, `updated_at`) VALUES
(3, 'Xohir', 'G-568q3g5', 'He is a Good employee', '2019-11-03 11:55:54', '2019-11-03 11:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `salary_amount` bigint(20) NOT NULL,
  `emp_id_for_search` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `salary_amount`, `emp_id_for_search`, `date`, `year`, `month`, `paid_by`, `created_at`, `updated_at`) VALUES
(1, 8, 25000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 05:53:46', '2019-10-25 05:53:46'),
(2, 9, 30000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 05:58:50', '2019-10-25 05:58:50'),
(3, 11, 10000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 06:00:14', '2019-10-25 06:00:14'),
(4, 21, 20000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 06:00:34', '2019-10-25 06:00:34'),
(5, 19, 40000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 06:02:20', '2019-10-25 06:02:20'),
(6, 15, 35000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 06:06:34', '2019-10-25 06:06:34'),
(7, 14, 10000, '', '25-10-2019', '2019', 'October', NULL, '2019-10-25 06:11:30', '2019-10-25 06:11:30'),
(8, 10, 25000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:05:02', '2019-10-27 13:05:02'),
(9, 12, 20000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:05:14', '2019-10-27 13:05:14'),
(10, 16, 10000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:05:37', '2019-10-27 13:05:37'),
(11, 17, 10000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:05:53', '2019-10-27 13:05:53'),
(12, 18, 50000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:06:53', '2019-10-27 13:06:53'),
(13, 20, 35000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:07:02', '2019-10-27 13:07:02'),
(14, 13, 20000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:20:14', '2019-10-27 13:20:14'),
(15, 22, 10000, '', '27-10-2019', '2019', 'October', NULL, '2019-10-27 13:32:44', '2019-10-27 13:32:44'),
(16, 24, 10000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 09:08:26', '2019-10-28 09:08:26'),
(17, 23, 60000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 09:10:25', '2019-10-28 09:10:25'),
(18, 25, 10000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 09:22:34', '2019-10-28 09:22:34'),
(19, 26, 25000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 09:27:34', '2019-10-28 09:27:34'),
(20, 27, 30000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 09:31:37', '2019-10-28 09:31:37'),
(21, 28, 10000, '', '28-10-2019', '2019', 'October', NULL, '2019-10-28 16:32:13', '2019-10-28 16:32:13'),
(22, 29, 20000, 'G-67058c9', '29-10-2019', '2019', 'October', NULL, '2019-10-29 07:57:44', '2019-10-29 07:57:44'),
(23, 6, 10000, 'G-78ed59e', '02-11-2019', '2019', 'November', NULL, '2019-11-02 13:34:14', '2019-11-02 13:34:14'),
(24, 7, 25000, 'G-568q3g5', '03-11-2019', '2019', 'November', NULL, '2019-11-03 06:41:03', '2019-11-03 06:41:03'),
(25, 9, 30000, 'G-89317el', '03-11-2019', '2019', 'November', NULL, '2019-11-03 06:41:15', '2019-11-03 06:41:15'),
(26, 11, 10000, 'G-e5e5258', '03-11-2019', '2019', 'November', NULL, '2019-11-03 06:41:21', '2019-11-03 06:41:21'),
(27, 8, 25000, 'G-2387ede', '03-11-2019', '2019', 'November', NULL, '2019-11-03 07:36:12', '2019-11-03 07:36:12'),
(28, 10, 25000, 'G-000eue9', '03-11-2019', '2019', 'November', NULL, '2019-11-03 07:36:21', '2019-11-03 07:36:21'),
(29, 20, 35000, 'G-ueiki89', '03-11-2019', '2019', 'November', NULL, '2019-11-03 07:36:31', '2019-11-03 07:36:31'),
(30, 13, 20000, 'G-eiu8669', '03-11-2019', '2019', 'November', NULL, '2019-11-03 07:41:17', '2019-11-03 07:41:17'),
(31, 14, 10000, 'G-5298dej', '04-11-2019', '2019', 'November', NULL, '2019-11-03 18:45:26', '2019-11-03 18:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` tinyint(1) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `is_completed`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'First creation a database design', 1, 1, '2019-11-01 03:10:37', '2019-11-01 23:17:06'),
(2, 'Creation a Front-end design', 1, 1, '2019-11-01 03:17:46', '2019-11-01 08:56:33'),
(3, 'Creation a best user experienced user and Admin user dashboard design', 1, 1, '2019-11-01 03:19:10', '2019-11-01 23:17:01'),
(4, 'Testing', 1, 1, '2019-11-01 09:54:09', '2019-11-01 23:19:09'),
(5, 'Deploy in live server', 1, 1, '2019-11-01 09:55:04', '2019-11-01 23:13:25'),
(6, 'dskfujsajd', 1, 1, '2019-11-02 07:49:23', '2019-11-02 07:49:34'),
(7, 'Completed', 1, 1, '2019-11-03 13:04:28', '2019-11-03 13:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `google_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `facebook_avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `google_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `google_id`, `facebook_id`, `facebook_avatar`, `google_avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harrison', 'harri@gmail.com', NULL, '$2y$10$laP/K.bq1Aw4yNzwSFyRduh/iiqSymQgz87zYCdWyXHNwQS80d.ae', '5dbd6051b6d71.jpeg', NULL, NULL, 'default.png', NULL, 1, NULL, '2019-10-14 16:16:00', '2019-11-02 12:43:39'),
(2, 'Shagour', 'shagour@gmail.com', NULL, '$2y$10$dE.u2lzBDZZBnSg7AOzgxO8nzqowKoCKFRE5T0NsDLv2Z60vmE9d2', '5dbef3b0996d7.png', NULL, NULL, 'default.png', NULL, 2, NULL, '2019-11-03 09:17:48', '2019-11-03 09:35:13'),
(3, 'Visitor X', 'visitor@gmail.com', NULL, '$2y$10$j9.W.RANm9EsW3SCEAklb.RAKOi11EnntJ1mmhzSSB7lXEgxhThmq', 'default.png', NULL, NULL, 'default.png', NULL, 1, NULL, '2019-11-03 12:43:51', '2019-11-03 12:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vacancy_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `needle_number` tinyint(4) NOT NULL,
  `education_requirement` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_requirement` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_mail_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_opportunities` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `vacancy_name`, `needle_number`, `education_requirement`, `skill_requirement`, `company_address`, `company_mail_address`, `all_opportunities`, `salary_range`, `created_at`, `updated_at`) VALUES
(2, 'Need a Senior Developer of Django', 1, 'B.S.C in C.S.E form any reputed University', 'Language: HTML, CSS, JavaScript, Python . Framework: Django, React.js/Vue.js', 'Uttara, Dhaka, Bangaldesh', 'developer.harrison.api@gmail.com', 'Every day lunch facilities', '25000-40000', '2019-10-30 06:57:05', '2019-11-03 12:45:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_department_id_foreign` (`department_id`);

--
-- Indexes for table `expanses`
--
ALTER TABLE `expanses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `expanses`
--
ALTER TABLE `expanses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
