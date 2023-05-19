-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 04:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadi_domasno`
--

-- --------------------------------------------------------

--
-- Table structure for table `alergens`
--

CREATE TABLE `alergens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alergen_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alergens`
--

INSERT INTO `alergens` (`id`, `alergen_name`, `created_at`, `updated_at`) VALUES
(1, 'Млеко', NULL, NULL),
(2, 'Јајца', NULL, NULL),
(3, 'Риба', NULL, NULL),
(4, 'Морски Плодови', NULL, NULL),
(5, 'Јаткасти плодови', NULL, NULL),
(6, 'Пченица', NULL, NULL),
(7, 'Соја', NULL, NULL),
(8, 'Јагоди', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alergen_dish`
--

CREATE TABLE `alergen_dish` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `alergen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alergen_dish`
--

INSERT INTO `alergen_dish` (`id`, `dish_id`, `alergen_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 6, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 4, 6, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 5, 2, NULL, NULL),
(9, 5, 5, NULL, NULL),
(10, 5, 6, NULL, NULL),
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 6, 5, NULL, NULL),
(14, 6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `available_date` datetime DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `portions_nr` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `dish_id`, `available_date`, `is_available`, `portions_nr`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-24 00:00:00', 1, 3, '2023-04-24 09:17:47', '2023-04-24 09:17:47'),
(2, 1, '2023-04-25 00:00:00', 1, 8, '2023-04-24 09:17:52', '2023-04-24 09:17:52'),
(3, 1, '2023-04-25 00:00:00', 1, 8, '2023-04-24 09:17:55', '2023-04-24 09:17:55'),
(5, 2, '2023-04-25 00:00:00', 1, 10, '2023-04-24 09:19:37', '2023-04-24 09:19:37'),
(6, 2, '2023-04-24 00:00:00', 1, 8, '2023-04-24 09:19:53', '2023-04-24 09:19:53'),
(7, 3, '2023-04-26 00:00:00', 1, 5, '2023-04-26 12:04:32', '2023-04-26 12:04:32'),
(8, 3, '2023-04-27 00:00:00', 1, 3, '2023-04-26 12:04:37', '2023-04-26 12:04:37'),
(9, 3, '2023-04-28 00:00:00', 1, 4, '2023-04-26 12:04:43', '2023-04-26 12:04:43'),
(10, 4, '2023-04-26 00:00:00', 1, 6, '2023-04-26 12:07:45', '2023-04-26 12:07:45'),
(11, 4, '2023-04-27 00:00:00', 1, 10, '2023-04-26 12:07:52', '2023-04-26 12:07:52'),
(12, 5, '2023-04-26 00:00:00', 1, 4, '2023-04-26 12:11:34', '2023-04-26 12:11:34'),
(13, 5, '2023-04-27 00:00:00', 1, 6, '2023-04-26 12:11:40', '2023-04-26 12:11:40'),
(14, 5, '2023-04-28 00:00:00', 1, 8, '2023-04-26 12:11:45', '2023-04-26 12:11:45'),
(15, 5, '2023-04-29 00:00:00', 1, 2, '2023-04-26 12:11:50', '2023-04-26 12:11:50'),
(16, 6, '2023-04-26 00:00:00', 1, 4, '2023-04-26 12:14:58', '2023-04-26 12:14:58'),
(17, 6, '2023-04-27 00:00:00', 1, 8, '2023-04-26 12:15:04', '2023-04-26 12:15:04'),
(18, 6, '2023-04-28 00:00:00', 1, 12, '2023-04-26 12:15:10', '2023-04-26 12:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT 1.00,
  `dish_amount` double(8,2) NOT NULL DEFAULT 1.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `dish_id`, `order_id`, `quantity`, `dish_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3.00, 230.00, '2023-04-24 11:27:23', '2023-04-24 11:27:23'),
(2, 2, 2, 2.00, 250.00, '2023-04-24 11:28:02', '2023-04-24 11:28:02'),
(3, 6, 5, 2.00, 110.00, '2023-04-26 14:20:15', '2023-04-26 14:20:15'),
(4, 5, 5, 2.00, 130.00, '2023-04-26 14:20:15', '2023-04-26 14:20:15'),
(5, 3, 6, 1.00, 123.00, '2023-04-26 14:23:58', '2023-04-26 14:23:58'),
(6, 4, 6, 2.00, 80.00, '2023-04-26 14:23:58', '2023-04-26 14:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Традиционална Кујна', NULL, NULL),
(2, 'Вегетаријанска Кујна', NULL, NULL),
(3, 'Веганска Кујна', NULL, NULL),
(4, 'Десерти', NULL, NULL),
(5, 'Пецива', NULL, NULL),
(6, 'Италијанска Кујна', NULL, NULL),
(7, 'Здрава Храна', NULL, NULL),
(8, 'Безглутенска Храна', NULL, NULL),
(9, 'Чорби и Супи', NULL, NULL),
(10, 'Raw храна', NULL, NULL),
(11, 'Домашни бургери и пици', NULL, NULL),
(12, 'Нискокалорична Храна', NULL, NULL),
(13, 'Мексиканска кујна', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_dish`
--

CREATE TABLE `category_dish` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_dish`
--

INSERT INTO `category_dish` (`id`, `dish_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 3, 6, NULL, NULL),
(6, 3, 7, NULL, NULL),
(7, 3, 8, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 4, 4, NULL, NULL),
(10, 5, 1, NULL, NULL),
(11, 5, 4, NULL, NULL),
(12, 5, 5, NULL, NULL),
(13, 6, 1, NULL, NULL),
(14, 6, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `dish_id`, `user_id`, `rate_level`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 5, 'Great cake. Very delicious...', '2023-04-26 14:32:24', '2023-04-26 14:32:24'),
(2, 4, 3, 4, 'Comment text ....', '2023-04-26 14:36:22', '2023-04-26 14:36:22'),
(3, 1, 3, 3, 'Comment text ....', '2023-04-26 14:36:22', '2023-04-26 14:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `cooks`
--

CREATE TABLE `cooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cook_avg_rating` double(8,2) DEFAULT NULL,
  `delivery_instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cooks`
--

INSERT INTO `cooks` (`id`, `user_id`, `cook_avg_rating`, `delivery_instructions`, `web`, `facebook`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 2, 4.65, 'home address', NULL, NULL, NULL, '2023-04-24 09:15:03', '2023-04-24 09:15:03'),
(2, 4, 5.00, 'Repudiandae illo quibusdam ut quia.', NULL, NULL, NULL, '2023-04-26 11:54:54', '2023-04-26 11:54:54'),
(3, 5, 3.60, 'Neque id officiis eu', NULL, NULL, NULL, '2023-04-26 11:57:13', '2023-04-26 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cook_id` bigint(20) UNSIGNED NOT NULL,
  `spiciness_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dish_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dish_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prep_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heating_instructions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portion_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `promo_price` double(8,2) DEFAULT NULL,
  `promo_price_date` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `cook_id`, `spiciness_id`, `dish_name`, `dish_img`, `hashtag`, `ingredients`, `description`, `prep_time`, `heating_instructions`, `portion_size`, `price`, `promo_price`, `promo_price_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Pasta', 'https://takethemameal.com/files_images_v2/stam.jpg', 'dddd', 'Pasta, Bread, Tomatto', 'asdasd', '45 min', 'dsda', '250 g', 22.00, 17.00, '2023-04-27 00:00:00', NULL, '2023-04-24 09:17:39', '2023-04-25 11:14:34'),
(2, 1, 2, 'Pasta-with Sauce', 'https://assets.cntraveller.in/photos/60ba26c9bfe773a828a47151/16:9/w_1024%2Cc_limit/mumbai-meals1-1366x768.jpg', 'aaaaaaa', 'wqeqwe,qweq,ewew', 'dddddddddd', '60 min', 'ssssssssss', '300 g', 560.00, NULL, NULL, NULL, '2023-04-24 09:18:59', '2023-04-24 09:18:59'),
(3, 2, 4, 'Grilled Fish', 'https://www.freshnlean.com/wp-content/uploads/2021/03/Meal-Plan-plate-protein.png', 'fish', 'Fish, rice', 'Reprehenderit odio b', '35 min', 'No heating', '200 g', 267.00, 250.00, '2023-04-28 00:00:00', NULL, '2023-04-26 12:04:25', '2023-04-26 12:04:25'),
(4, 2, 3, 'Fried ice cream', 'https://www.tasteofhome.com/wp-content/uploads/2019/05/Fried-Ice-Cream-Dessert-Bars-_EXPS_SDJJ19_232652_B02_06_1b_rms-2.jpg', 'icecream', 'Milk, Eggs, sugar', 'Consequat Dolorem e', '45 min', 'keep in a fridge', '1 piece', 100.00, NULL, NULL, NULL, '2023-04-26 12:07:33', '2023-04-26 12:07:33'),
(5, 3, 1, 'IceCream Chocolate', 'https://t3.ftcdn.net/jpg/03/01/97/86/360_F_301978652_O0aPwap1JaEVaAhj3mIlbqNnJGmRyCzC.jpg', 'icecream', 'Milk, eggs, chocolate, sugar, flour.', 'Sed quisquam qui ten', '40 min', 'Keep in the refrigerator', '2 pieces', 130.00, 100.00, '2023-04-29 00:00:00', NULL, '2023-04-26 12:11:20', '2023-04-26 12:11:20'),
(6, 3, 1, 'Cake', 'https://www.wholesomeyum.com/wp-content/uploads/2017/01/wholesomeyum-Sugar-Free-Dessert-Sex-In-A-Pan-26.jpg', 'cake', 'Flour, milk, eggs, sugar, chocolate, nuts', 'Et quis velit volup', '2 hours', 'Keep in a cold place', '1 piece', 80.00, NULL, NULL, NULL, '2023-04-26 12:14:46', '2023-04-26 12:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_03_15_093421_create_roles_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2020_10_11_105219_create_municipalities_table', 1),
(4, '2020_10_12_000000_create_users_table', 1),
(5, '2020_10_12_100000_create_password_reset_tokens_table', 1),
(6, '2022_08_19_000000_create_failed_jobs_table', 1),
(7, '2023_03_15_095818_create_cooks_table', 1),
(8, '2023_03_15_100731_create_categories_table', 1),
(9, '2023_03_15_101002_create_spicies_table', 1),
(10, '2023_03_15_101150_create_alergens_table', 1),
(11, '2023_03_15_101353_create_dishes_table', 1),
(12, '2023_03_15_104836_create_category_dish_table', 1),
(13, '2023_03_15_105716_create_alergen_dish_table', 1),
(14, '2023_03_15_105912_create_offers_table', 1),
(15, '2023_03_15_110438_create_availabilities_table', 1),
(16, '2023_03_15_114228_create_statuses_table', 1),
(17, '2023_03_15_114407_create_deliveries_table', 1),
(18, '2023_03_15_114630_create_orders_table', 1),
(19, '2023_03_15_114635_create_carts_table', 1),
(20, '2023_03_27_133044_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `municipality`, `created_at`, `updated_at`) VALUES
(1, 'Аеродром', NULL, NULL),
(2, 'Бутел', NULL, NULL),
(3, 'Гази Баба', NULL, NULL),
(4, 'Ѓорче Петров', NULL, NULL),
(5, 'Карпош', NULL, NULL),
(6, 'Кисела Вода', NULL, NULL),
(7, 'Сарај', NULL, NULL),
(8, 'Центар', NULL, NULL),
(9, 'Чаир', NULL, NULL),
(10, 'Шуто Оризари', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cook_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `cook_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Nekoj naslov', 'Poraka 1 .....', '2023-04-26 11:16:46', '2023-04-26 11:16:46'),
(2, 6, 2, 'Cody Offer Nr 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel fringilla ex, sed viverra ipsum. Maecenas facilisis laoreet scelerisque. Curabitur eget felis sit amet magna nam.', '2023-04-26 12:27:35', '2023-04-26 12:27:35'),
(3, 6, 3, 'Cody Offer request Nr 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel fringilla ex, sed viverra ipsum. Maecenas facilisis laoreet scelerisque. Curabitur eget felis sit amet magna nam.', '2023-04-26 12:28:39', '2023-04-26 12:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cook_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `total_order_amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cook_id`, `status_id`, `total_order_amount`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 5, 555.00, '2023-04-24 11:26:15', '2023-04-26 11:15:46'),
(5, 3, 3, 1, 800.00, '2023-04-26 14:19:16', '2023-04-26 14:19:16'),
(6, 6, 2, 2, 1850.00, '2023-04-26 14:22:45', '2023-04-26 12:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'cook', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spicies`
--

CREATE TABLE `spicies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `spicylevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spicies`
--

INSERT INTO `spicies` (`id`, `spicylevel`, `created_at`, `updated_at`) VALUES
(1, 'Не е луто', NULL, NULL),
(2, 'Малку луто', NULL, NULL),
(3, 'Луто', NULL, NULL),
(4, 'Пиканто / луто', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_type`, `created_at`, `updated_at`) VALUES
(1, 'Нарaчката е успешно направена', NULL, NULL),
(2, 'Нарачката е прифатена', NULL, NULL),
(3, 'Нарачката е подготвена', NULL, NULL),
(4, 'Нарачката е во достава', NULL, NULL),
(5, 'Нарачката е доставена', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `municipality_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_link_expiration` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `municipality_id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `birth_date`, `phone`, `address`, `profile_img_url`, `about`, `other`, `is_active`, `activation_code`, `activation_link_expiration`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'John', 'Doe', 'admin@admin.com', NULL, '$2y$10$Kpxsv7Aewm.Eg4.pq0zTpuvuUbNervEQ4PyzOhDYsHVo1PNm7Enra', NULL, '123123', 'Street 123', 'https://png.pngtree.com/png-vector/20190629/ourmid/pngtree-office-work-user-icon-avatar-png-image_1527655.jpg', NULL, NULL, 1, 'oQXtoA8XVMQoKCP9rbMQ', NULL, NULL, NULL, '2023-04-24 09:13:39', '2023-04-24 09:13:39'),
(2, 2, 6, 'Jane', 'Doe', 'jane@doe.com', '2023-04-24 09:15:36', '$2y$10$6CkxA20kYTWGoQTzdo2u7eAoV2R9BZrWhR2LBSVjMwjTy/5EC2IEm', '2023-03-27', '12333333', 'Street -123/6', 'https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg', 'asdsad', 'asdasd', 1, NULL, NULL, NULL, NULL, '2023-04-24 09:15:03', '2023-04-24 09:15:36'),
(3, 3, 7, 'Alice', 'Cooper', 'alice@cooper.com', '2023-04-24 09:23:47', '$2y$10$0wBRI4aNqgEvSVXAj4abueziM0/M.Vzyc2zQKyoTvk0/rrrD7YbZ6', '2023-03-26', '444444', 'Some street Name 123/22/99', 'https://writestylesonline.com/wp-content/uploads/2018/11/Three-Statistics-That-Will-Make-You-Rethink-Your-Professional-Profile-Picture.jpg', 'eeeeeeeeeeee', 'rrrrrrrrrrrrrrrrr', 1, NULL, NULL, NULL, NULL, '2023-04-24 09:23:36', '2023-04-24 09:23:47'),
(4, 2, 7, 'Vivien', 'Stafford', 'zofum@mailinator.com', '2023-04-26 11:55:06', '$2y$10$P599IKxx3xelMBi3AAhXI.WqSig1YYWhaGqeniTx8n4GsPrfB3.na', '1988-01-06', '+1 (159) 322-5224', 'Quam aliqua Enim et', 'https://www.rd.com/wp-content/uploads/2017/09/01-shutterstock_476340928-Irina-Bg.jpg', 'Blanditiis perspicia', 'Mollitia nisi volupt', 1, NULL, NULL, NULL, NULL, '2023-04-26 11:54:54', '2023-04-26 11:55:06'),
(5, 2, 6, 'Marcia', 'Knight', 'mywugy@mailinator.com', '2023-04-26 11:57:35', '$2y$10$.rt39ZmskC3Hj9VywtyNZOjrNtDKrSCV2VPGtqEyvokNm2CnlKtf2', '2003-02-07', '+1 (663) 369-2302', 'Dolor et sed consect', 'https://shotkit.com/wp-content/uploads/bb-plugin/cache/cool-profile-pic-matheus-ferrero-landscape.jpeg', 'Cumque quas non cill', 'Id error vitae volup', 1, NULL, NULL, NULL, NULL, '2023-04-26 11:57:13', '2023-04-26 11:57:35'),
(6, 3, 2, 'Cody', 'Barber', 'rile@mailinator.com', '2023-04-26 12:01:17', '$2y$10$l9wv1Z5OQ/71IlvD46jiQ.0eA4QEq2Tfw/xTov2WCy5Pbep5o43Ly', '1980-12-25', '+1 (859) 689-3764', 'Non similique cupida', 'https://images.squarespace-cdn.com/content/v1/5dfb51321047cf33eb90b6df/1581602814946-NLSD2Y3725ASHPBDEFQ2/Nick-MyHeartSkipped-1948.jpg', 'Tempor aute dolores', 'Excepturi pariatur', 1, NULL, NULL, NULL, NULL, '2023-04-26 12:01:02', '2023-04-26 12:01:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alergens`
--
ALTER TABLE `alergens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alergen_dish`
--
ALTER TABLE `alergen_dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alergen_dish_dish_id_foreign` (`dish_id`),
  ADD KEY `alergen_dish_alergen_id_foreign` (`alergen_id`);

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availabilities_dish_id_foreign` (`dish_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_dish_id_foreign` (`dish_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_dish`
--
ALTER TABLE `category_dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_dish_dish_id_foreign` (`dish_id`),
  ADD KEY `category_dish_category_id_foreign` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_dish_id_foreign` (`dish_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `cooks`
--
ALTER TABLE `cooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cooks_user_id_foreign` (`user_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_cook_id_foreign` (`cook_id`),
  ADD KEY `dishes_spiciness_id_foreign` (`spiciness_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_user_id_foreign` (`user_id`),
  ADD KEY `offers_cook_id_foreign` (`cook_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_cook_id_foreign` (`cook_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spicies`
--
ALTER TABLE `spicies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_municipality_id_foreign` (`municipality_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergens`
--
ALTER TABLE `alergens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `alergen_dish`
--
ALTER TABLE `alergen_dish`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_dish`
--
ALTER TABLE `category_dish`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cooks`
--
ALTER TABLE `cooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spicies`
--
ALTER TABLE `spicies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alergen_dish`
--
ALTER TABLE `alergen_dish`
  ADD CONSTRAINT `alergen_dish_alergen_id_foreign` FOREIGN KEY (`alergen_id`) REFERENCES `alergens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alergen_dish_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_dish`
--
ALTER TABLE `category_dish`
  ADD CONSTRAINT `category_dish_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_dish_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cooks`
--
ALTER TABLE `cooks`
  ADD CONSTRAINT `cooks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_cook_id_foreign` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dishes_spiciness_id_foreign` FOREIGN KEY (`spiciness_id`) REFERENCES `spicies` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_cook_id_foreign` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cook_id_foreign` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_municipality_id_foreign` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
