-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 03:39 AM
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
-- Database: `himalya_wellness`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `identifier`, `title`, `heading`, `description`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(2, 'block-heading', 'block1', 'block heading', '<p>bloack data</p>', 1, 1, '2024-11-18 00:29:38', '2024-11-18 00:29:38'),
(3, 'bloack2-heading', 'block2', 'bloack2 heading', '<p>block2 desc</p>', 2, 1, '2024-11-18 00:30:30', '2024-11-18 00:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `show_in_menu` int(11) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category`, `name`, `status`, `show_in_menu`, `url_key`, `meta_tag`, `meta_title`, `meta_description`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Animal health', 1, 2, 'animal-health', 'Animal health', 'Animal health', 'Animal health', '<p>Animal health</p>', '<p>Animal health</p>', '2024-11-17 22:41:28', '2024-11-17 22:41:28'),
(3, 0, 'Baby Care', 1, 2, 'baby-care', 'Baby Care', 'Baby Care', 'Baby Care', '<p>Baby Care</p>', '<p>Baby Care</p>', '2024-11-17 22:44:35', '2024-11-17 22:44:35'),
(4, 0, 'Himalaya FOR MOMS', 1, 2, 'himalaya-for-moms', 'Himalaya FOR MOMS', 'Himalaya FOR MOMS', 'Himalaya FOR MOMS', '<p>Himalaya FOR MOMS</p>\r\n\r\n<p>&nbsp;</p>', '<p>Himalaya FOR MOMS</p>', '2024-11-17 22:45:24', '2024-11-17 22:45:24'),
(5, 0, 'Home Care', 1, 2, 'home-care', 'Home Care', 'Home Care', 'Home Care', '<p>Home Care</p>\r\n\r\n<p>&nbsp;</p>', '<p>Home Care</p>\r\n\r\n<p>&nbsp;</p>', '2024-11-17 22:45:53', '2024-11-17 22:45:53'),
(6, 0, 'Personal Care', 1, 2, 'personal-care', 'Personal Care', 'Personal Care', 'Personal Care', '<p>Personal Care</p>\r\n\r\n<p>&nbsp;</p>', '<p>Personal Care</p>\r\n\r\n<p>&nbsp;</p>', '2024-11-17 22:46:20', '2024-11-17 22:46:20'),
(7, 0, 'Pharmaceuticals', 1, 2, 'pharmaceuticals', 'Pharmaceuticals', 'Pharmaceuticals', 'Pharmaceuticals', '<p>Pharmaceuticals</p>', '<p>Pharmaceuticals</p>', '2024-11-17 22:46:44', '2024-11-17 22:46:44'),
(8, 0, 'Nutrition', 1, 2, 'nutrition', 'Nutrition', 'Nutrition', 'Nutrition', '<p>Nutrition</p>', '<p>Nutrition</p>', '2024-11-17 22:47:07', '2024-11-17 22:47:07'),
(9, 0, 'Wellness', 1, 2, 'wellness', 'Wellness', 'Wellness', 'Wellness', '<p>Wellness</p>', '<p>Wellness</p>', '2024-11-17 22:47:31', '2024-11-17 22:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Daria Vaughn', 'tave@mailinator.com', 'Sint qui et est in', '2024-12-01 22:57:16', '2024-12-01 22:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(8, 'App\\Models\\User', 7, '263e3203-5e35-4f7f-89d0-39df892f465e', 'image', '465504994_3792037107750940_2860899748828962219_n', '465504994_3792037107750940_2860899748828962219_n.jpeg', 'image/jpeg', 'public', 'public', 83412, '[]', '[]', '[]', '[]', 1, '2024-11-17 07:56:03', '2024-11-17 07:56:03'),
(17, 'App\\Models\\Slider', 3, 'bd1b3fac-dc78-4f3e-b7b9-ade8cb2311b4', 'image', 'banner1', 'banner1.webp', 'image/webp', 'public', 'public', 125616, '[]', '[]', '[]', '[]', 1, '2024-11-17 23:12:18', '2024-11-17 23:12:18'),
(18, 'App\\Models\\Slider', 4, '4dd3e3de-3172-4ff5-b228-9e805129e7e8', 'image', 'banner2', 'banner2.webp', 'image/webp', 'public', 'public', 67828, '[]', '[]', '[]', '[]', 1, '2024-11-17 23:12:33', '2024-11-17 23:12:33'),
(19, 'App\\Models\\Slider', 5, 'e5fdeea7-33be-409e-b711-895a81a9f9ad', 'image', 'banner3', 'banner3.jpg', 'image/jpeg', 'public', 'public', 146998, '[]', '[]', '[]', '[]', 1, '2024-11-17 23:12:59', '2024-11-17 23:12:59'),
(20, 'App\\Models\\Block', 2, '195e9e0f-e6a8-4e5c-935e-730efc9e9a9d', 'image', 'Pure-Homes-Sanitizing-Floor-Cleaner-Herbal-Green-Fragrance_1800x1800', 'Pure-Homes-Sanitizing-Floor-Cleaner-Herbal-Green-Fragrance_1800x1800.webp', 'image/webp', 'public', 'public', 78418, '[]', '[]', '[]', '[]', 1, '2024-11-18 00:29:38', '2024-11-18 00:29:38'),
(21, 'App\\Models\\Block', 3, 'af894bc0-d72e-4943-976a-3861f7a5c2e8', 'image', 'happy-baby-gift-pack-mega-basket-various_large', 'happy-baby-gift-pack-mega-basket-various_large.webp', 'image/webp', 'public', 'public', 24186, '[]', '[]', '[]', '[]', 1, '2024-11-18 00:30:30', '2024-11-18 00:30:30'),
(22, 'App\\Models\\Category', 1, 'c20305a2-bde2-4304-9023-038ea5634197', 'image', 'animal', 'animal.webp', 'image/webp', 'public', 'public', 14562, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:05:42', '2024-11-24 00:05:42'),
(23, 'App\\Models\\Category', 3, '3a7ec4ca-a52b-4f43-9fab-b7ce07c09a5a', 'image', 'baby', 'baby.webp', 'image/webp', 'public', 'public', 21778, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:09:34', '2024-11-24 00:09:34'),
(24, 'App\\Models\\Category', 4, '5f59bbe4-1795-4c99-8503-c4c83333dc43', 'image', 'mom', 'mom.webp', 'image/webp', 'public', 'public', 14168, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:09:47', '2024-11-24 00:09:47'),
(25, 'App\\Models\\Category', 5, '523ed006-503e-4872-9683-91a5844b1deb', 'image', 'home', 'home.webp', 'image/webp', 'public', 'public', 16156, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:10:22', '2024-11-24 00:10:22'),
(26, 'App\\Models\\Category', 6, '0bb7a0f8-7583-4a30-a75c-85c5efa18083', 'image', 'personal', 'personal.webp', 'image/webp', 'public', 'public', 26934, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:10:37', '2024-11-24 00:10:37'),
(27, 'App\\Models\\Category', 7, '8f1acbba-007d-4917-847c-5fa1e05e7956', 'image', 'pharma', 'pharma.webp', 'image/webp', 'public', 'public', 19858, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:11:00', '2024-11-24 00:11:00'),
(28, 'App\\Models\\Category', 8, '16857976-6833-4515-8a66-c352c4291a07', 'image', 'nutri', 'nutri.webp', 'image/webp', 'public', 'public', 31288, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:11:15', '2024-11-24 00:11:15'),
(29, 'App\\Models\\Category', 9, '044eeb5b-51d9-401d-8d26-3c4d934fea19', 'image', 'wellness', 'wellness.webp', 'image/webp', 'public', 'public', 28070, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:11:29', '2024-11-24 00:11:29'),
(30, 'App\\Models\\Product', 4, 'badcb6e2-5e5e-4bee-8966-0d4e918a10f1', 'image', 'anxocare_9a254b3d-24c3-4dc7-9845-5d2538b4d5ae', 'anxocare_9a254b3d-24c3-4dc7-9845-5d2538b4d5ae.webp', 'image/webp', 'public', 'public', 15428, '[]', '[]', '[]', '[]', 1, '2024-11-24 00:15:55', '2024-11-24 00:15:55'),
(31, 'App\\Models\\Product', 5, '19f7ee16-07dc-4341-9fcd-1a4c1c63dd07', 'image', 'RumInfla', 'RumInfla.webp', 'image/webp', 'public', 'public', 6682, '[]', '[]', '[]', '[]', 1, '2024-11-24 05:00:31', '2024-11-24 05:00:31'),
(32, 'App\\Models\\Product', 6, 'b7e0dc2a-d49b-4f72-8ecf-1017e745bae2', 'image', 'gentle-baby-shampoo-100ml_large', 'gentle-baby-shampoo-100ml_large.webp', 'image/webp', 'public', 'public', 17316, '[]', '[]', '[]', '[]', 1, '2024-11-24 23:42:30', '2024-11-24 23:42:30'),
(33, 'App\\Models\\Page', 2, 'cfb73868-1a76-4647-a4e0-f574640d33bc', 'image', 'Himalaya-Happy-Baby-Gift-Pack-8N_large', 'Himalaya-Happy-Baby-Gift-Pack-8N_large.webp', 'image/webp', 'public', 'public', 31710, '[]', '[]', '[]', '[]', 1, '2024-12-01 23:48:01', '2024-12-01 23:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_16_150106_create_sliders_table', 2),
(5, '2024_11_16_150950_create_media_table', 2),
(6, '2024_11_17_034753_create_products_table', 2),
(7, '2024_11_17_044536_create_blocks_table', 3),
(9, '2024_11_17_045530_create_pages_table', 4),
(10, '2024_11_17_114947_create_permission_tables', 5),
(11, '2024_11_17_123634_add_cols_in_users_table', 6),
(12, '2024_11_18_035542_create_categories_table', 7),
(13, '2024_11_18_041303_create_product_categories_table', 8),
(14, '2024_12_02_042212_create_enquiries_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `show_in_menu` int(11) NOT NULL,
  `show_in_footer` int(11) NOT NULL,
  `meta_tag` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `heading`, `description`, `ordering`, `status`, `url_key`, `show_in_menu`, `show_in_footer`, `meta_tag`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 'offer', 'Special Offer', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;<br />\r\n<img alt=\"\" src=\"https://himalayawellness.in/cdn/shop/files/1080X1080_782bbd23-ad02-4582-8bf2-8a4044cf5bb7.png?height=1200&amp;v=1732763332\" style=\"float:right; height:50%; margin:22px; width:100%\" /></p>', 1, 1, 'special-offer', 1, 1, 'test', 'test', 'test', '2024-12-01 23:47:57', '2024-12-01 23:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user_index', 'web', '2024-11-17 06:34:41', '2024-11-17 06:34:41'),
(2, 'user_create', 'web', '2024-11-17 06:34:42', '2024-11-17 06:34:42'),
(3, 'user_edit', 'web', '2024-11-17 06:34:42', '2024-11-17 06:34:42'),
(4, 'user_update', 'web', '2024-11-17 06:34:42', '2024-11-17 06:34:42'),
(5, 'user_destroy', 'web', '2024-11-17 06:34:42', '2024-11-17 06:34:42'),
(6, 'user_show', 'web', '2024-11-17 06:34:42', '2024-11-17 06:34:42'),
(7, 'permission_index', 'web', '2024-11-17 06:35:45', '2024-11-17 06:35:45'),
(8, 'permission_create', 'web', '2024-11-17 06:35:45', '2024-11-17 06:35:45'),
(9, 'permission_edit', 'web', '2024-11-17 06:35:45', '2024-11-17 06:35:45'),
(10, 'permission_update', 'web', '2024-11-17 06:35:45', '2024-11-17 06:35:45'),
(11, 'permission_store', 'web', '2024-11-17 06:35:45', '2024-11-17 06:35:45'),
(12, 'user_store', 'web', '2024-11-17 06:37:36', '2024-11-17 06:37:36'),
(13, 'permission_destroy', 'web', '2024-11-17 06:38:21', '2024-11-17 06:38:52'),
(14, 'role_index', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(15, 'role_create', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(16, 'role_store', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(17, 'role_edit', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(18, 'role_update', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(19, 'role_delete', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(20, 'slider_index', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(21, 'slider_create', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(22, 'slider_store', 'web', '2024-11-17 06:40:23', '2024-11-17 06:40:23'),
(23, 'slider_edit', 'web', '2024-11-17 06:40:24', '2024-11-17 06:40:24'),
(24, 'slider_update', 'web', '2024-11-17 06:40:24', '2024-11-17 06:40:24'),
(25, 'slider_destroy', 'web', '2024-11-17 06:40:24', '2024-11-17 06:40:24'),
(26, 'block_index', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(27, 'block_create', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(28, 'block_store', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(29, 'block_edit', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(30, 'block_update', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(31, 'block_destroy', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(32, 'page_index', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(33, 'page_create', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(34, 'page_store', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(35, 'page_edit', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(36, 'page_update', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(37, 'page_destroy', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(38, 'product_index', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(39, 'product_create', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(40, 'product_store', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(41, 'product_edit', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(42, 'product_update', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(43, 'product_destroy', 'web', '2024-11-17 06:42:41', '2024-11-17 06:42:41'),
(44, 'category_index', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(45, 'category_create', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(46, 'category_store', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(47, 'category_edit', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(48, 'category_update', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(49, 'category_destroy', 'web', '2024-11-17 06:43:30', '2024-11-17 06:43:30'),
(50, 'dashboard_index', 'web', '2024-11-17 06:43:56', '2024-11-17 06:43:56'),
(51, 'enquiry_index', 'web', '2024-11-17 06:43:56', '2024-11-17 06:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `stock_status` int(11) DEFAULT NULL,
  `weight` double NOT NULL,
  `price` double NOT NULL,
  `special_price` double DEFAULT NULL,
  `special_price_from` date DEFAULT NULL,
  `special_price_to` date DEFAULT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `related_product` varchar(300) DEFAULT NULL,
  `url_key` varchar(300) NOT NULL,
  `meta_tag` varchar(250) NOT NULL,
  `meta_title` varchar(300) NOT NULL,
  `meta_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `status`, `is_featured`, `sku`, `qty`, `stock_status`, `weight`, `price`, `special_price`, `special_price_from`, `special_price_to`, `short_description`, `description`, `related_product`, `url_key`, `meta_tag`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(4, 'anxocare', 1, 2, NULL, NULL, NULL, 50, 100, 80, '2024-10-10', '2024-12-20', '<p>anxocare</p>', '<p>anxocare</p>', '', 'anxocare', 'anxocare', 'anxocare', 'anxocare', '2024-11-24 00:15:55', '2024-11-24 00:15:55'),
(5, 'RumInfla', 1, 2, NULL, NULL, NULL, 100, 200, 199, NULL, NULL, '<p>RumInfla</p>', '<p>RumInfla</p>', '', 'ruminfla', 'RumInfla', 'RumInfla', 'RumInfla', '2024-11-24 05:00:31', '2024-11-24 05:00:31'),
(6, 'gentle baby shampoo', 1, 2, NULL, NULL, NULL, 100, 120, 100, '2024-10-10', '2026-02-20', '<p>gentle baby shampoo</p>', '<p>gentle baby shampoo</p>', '', 'gentle-baby-shampoo', 'gentle baby shampoo', 'gentle baby shampoo', 'gentle baby shampoo', '2024-11-24 23:42:29', '2024-11-24 23:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 0, 2, NULL, NULL),
(2, 4, 1, NULL, NULL),
(3, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-11-17 06:48:23', '2024-11-17 06:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('I80w0J9hSceZ3LBHuY9ASmvBJNarpltYkDHsRXXa', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmZRS2g3WjA0R0lmdFFBMjRDN2l2Mk13NWc3R2dDZ2piSGhUR0NFayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jYXRlZ29yeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1733216042);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(3, 'slider1', 1, 1, '2024-11-17 23:12:16', '2024-11-17 23:12:16'),
(4, 'slider2', 2, 1, '2024-11-17 23:12:33', '2024-11-17 23:12:33'),
(5, 'slider3', 3, 1, '2024-11-17 23:12:59', '2024-11-17 23:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `phone`, `gender`, `created_at`, `updated_at`) VALUES
(3, 'Test User', 'admin@gmail.com', '2024-11-16 04:31:37', '$2y$12$GdMnyxfEVFkPAXaCIE9wLeXE4G7stiYxhA/TUB9Sqn9h7hP34Gcim', 'mP4yfYiu6y6dHWdu8UjpFM76sr2jfv4ihR1HVz9jAmljVyiWKSbZLYvo1rtW', 0, NULL, 'm', '2024-11-16 04:31:37', '2024-11-17 07:56:42'),
(7, 'naresh', 'naresh@gmail.com', NULL, '$2y$12$stgMBBHrRE1EkGxtx0UuheghKPGmxqqjRS.YN8DFGzAn.VmmedNc6', NULL, 1, '90293840', 'm', '2024-11-17 07:56:03', '2024-11-17 07:56:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blocks_identifier_unique` (`identifier`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_url_key_unique` (`url_key`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
