-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 12:05 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `shop_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `shop_link`, `image`, `position`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Women Fashion', 'categories/women', '1563961837.jpg', 1, 1, '2019-07-24 09:50:37', '2019-08-12 09:32:38'),
(16, 'Men Fashion', 'categories/men', '1563961856.jpg', 2, 1, '2019-07-24 09:50:56', '2019-08-12 09:33:09'),
(17, 'Children Fashion', 'categories/children', '1563961867.jpg', 3, 1, '2019-07-24 09:51:07', '2019-08-12 09:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `short_description`, `description`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Black Friday Guide: Best Sales & Discount Codes', 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra', '<p><span style=\"color: rgb(136, 136, 136); font-family: Muli; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel magna vel neque porta ultricies non eget mauris. Suspendisse potenti.</span></p><p><span style=\"color: rgb(136, 136, 136); font-family: Muli; font-size: 15px;\">Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in. Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare libero.</span><span style=\"color: rgb(136, 136, 136); font-family: Montserrat-Regular; font-size: 15px;\"><br></span><br></p>', 'black-friday-guide-best-sales-discount-codes-.jpg', 'black-friday-guide-best-sales-discount-codes', 1, '2019-09-06 12:24:01', '2020-04-01 13:02:55'),
(4, 'The White Sneakers Nearly Every Fashion Girls Own', 'Admin', NULL, '<p class=\"p-b-25\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; font-family: Montserrat-Regular; font-size: 15px; line-height: 1.7; color: rgb(136, 136, 136);\"><span style=\"font-family: Muli;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel magna vel neque porta ultricies non eget mauris. Suspendisse potenti.</span></p><p class=\"p-b-25\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; font-family: Montserrat-Regular; font-size: 15px; line-height: 1.7; color: rgb(136, 136, 136);\"><span style=\"font-family: Muli;\">Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in. Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare libero.</span></p>', 'the-white-sneakers-nearly-every-fashion-girls-own-.jpg', 'the-white-sneakers-nearly-every-fashion-girls-own', 1, '2019-09-06 12:26:41', '2020-04-01 13:02:40'),
(5, 'New York SS 2018 Street Style: Annina Mislin', 'Admin', NULL, '<p class=\"p-b-25\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; font-family: Montserrat-Regular; font-size: 15px; line-height: 1.7; color: rgb(136, 136, 136);\"><span style=\"font-family: Verdana;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel magna vel neque porta ultricies non eget mauris. Suspendisse potenti.</span></p><p class=\"p-b-25\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 25px; font-family: Montserrat-Regular; font-size: 15px; line-height: 1.7; color: rgb(136, 136, 136);\"><span style=\"font-family: Muli;\">Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in. Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare libero.</span></p>', 'new-york-ss-2018-street-style-annina-mislin-.jpg', 'new-york-ss-2018-street-style-annina-mislin', 1, '2019-09-06 12:31:33', '2020-04-01 13:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `url`, `status`, `created_at`, `updated_at`) VALUES
(5, 'First Blog', 'first-blog', 1, '2019-09-05 09:31:44', '2019-09-05 09:38:40'),
(6, 'Hello World', 'hello-world', 1, '2019-09-05 09:38:51', '2019-09-05 09:38:51'),
(7, 'Testing', 'testing', 1, '2019-09-05 09:38:58', '2019-09-05 09:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cids`
--

CREATE TABLE `blog_cids` (
  `id` int(10) UNSIGNED NOT NULL,
  `bid` int(10) UNSIGNED NOT NULL,
  `bcid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_cids`
--

INSERT INTO `blog_cids` (`id`, `bid`, `bcid`, `created_at`, `updated_at`) VALUES
(22, 5, 6, '2020-04-01 13:02:14', '2020-04-01 13:02:14'),
(23, 4, 6, '2020-04-01 13:02:40', '2020-04-01 13:02:40'),
(24, 3, 5, '2020-04-01 13:02:55', '2020-04-01 13:02:55'),
(25, 3, 7, '2020-04-01 13:02:55', '2020-04-01 13:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `bid` int(10) UNSIGNED NOT NULL,
  `tag` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `bid`, `tag`, `created_at`, `updated_at`) VALUES
(18, 5, 'hello', '2020-04-01 13:02:14', '2020-04-01 13:02:14'),
(19, 4, 'hello', '2020-04-01 13:02:40', '2020-04-01 13:02:40'),
(20, 3, 'StreetStyle', '2020-04-01 13:02:55', '2020-04-01 13:02:55'),
(21, 3, 'Crafts', '2020-04-01 13:02:55', '2020-04-01 13:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `userdata` varchar(255) NOT NULL,
  `cid` int(10) UNSIGNED DEFAULT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `position`, `image`, `status`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, 'men-1586497901.jpg', 1, 'men', '2019-06-15 08:30:05', '2020-04-10 05:51:41'),
(4, 'Women', 2, 'women-1565329959.jpg', 1, 'women', '2019-06-15 08:37:25', '2019-08-09 05:52:39'),
(5, 'Children', 3, 'children-1586498583.jpg', 1, 'children', '2019-06-15 08:48:28', '2020-04-10 06:03:03'),
(6, 'Accesories', 4, 'accesories-1586498818.jpg', 1, 'accesories', '2019-07-24 09:13:45', '2020-04-10 06:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Testing', 'Testing', 'Testing', 'testing@gmail.com', '$2y$10$zU//ltKUKQ/WZK4wrujhJuOS5dmOs/LHls38zOtOXnZv/zb1dNyaq', '2019-11-15 07:56:31', '2019-12-31 06:59:33'),
(2, 'hello', NULL, 'world', 'hello@gmail.com', '$2y$10$IeQt9QCFyrQzjKcfOgJ3POwJINo5Qx6T5vVcbKSpnzYNUavRx853W', '2019-11-15 08:33:09', '2019-11-15 08:33:09'),
(6, 'Testing', NULL, 'Testing', 'testing123@gmail.com', '$2y$10$o.vYFt7S3b5UziMmVv3MF.al0LPD1Qlx2aqKBUS7ikic5bmTiTz66', '2020-04-06 07:09:29', '2020-04-06 07:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_08_092347_create_banner_table', 2),
(4, '2019_06_13_122551_create_category_table', 3),
(5, '2019_06_14_113333_add_url_category_table', 4),
(6, '2019_06_20_174800_create_products_table', 5),
(7, '2019_06_20_182255_add_url_product_table', 6),
(8, '2019_07_23_141845_create_products_images_table', 7),
(9, '2019_07_24_145029_add_featured_product_table', 8),
(10, '2019_08_09_110624_add_header_image_category', 9),
(11, '2019_08_12_145156_edit_banners_table', 10),
(12, '2019_08_12_152126_create_options_table', 11),
(13, '2019_09_05_142630_create_blog_categories_table', 12),
(14, '2019_09_06_131815_create_blog_table', 13),
(15, '2019_09_06_141254_create_blog_cid_table', 14),
(16, '2019_09_06_141703_create_blog_tags_table', 15),
(17, '2019_09_16_114543_create_cart_table', 16),
(18, '2019_11_15_121043_create_customer_table', 17),
(19, '2020_04_03_112215_create_contact_table', 18),
(20, '2020_04_03_162315_add_cid_to_cart_table', 19),
(21, '2020_04_04_180112_create_orders_table', 20),
(22, '2020_04_06_124226_create_order_products_table', 21),
(23, '2020_04_07_115900_create_wishlist_table', 22),
(24, '2020_04_10_125603_crate_blog_comments_table', 23),
(25, '2020_04_13_102600_create_subscribers_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'eCommerce | Men Fashion, Women Fashion, Children Fashion, Accessories', '2019-08-12 09:56:00', '2019-09-19 11:57:38'),
(2, 'favicon', 'favicon-1568894258.png', '2019-08-12 09:56:00', '2019-09-19 11:57:38'),
(3, 'logo', 'logo-1568893715.png', '2019-08-12 09:56:00', '2019-09-19 11:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `cid` int(10) UNSIGNED DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `checkout_as` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `comment` text,
  `order_status` varchar(100) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `cid`, `firstname`, `lastname`, `email`, `mobileno`, `address1`, `address2`, `zipcode`, `city`, `state`, `country`, `checkout_as`, `payment_method`, `comment`, `order_status`, `created_at`, `updated_at`) VALUES
(4, '200410163539381', 1, 'Testing', 'Testing', 'testing@gmail.com', '9635874100', 'Testing address', 'Please ignore', '395007', 'Surat', 'Gujarat', 'India', 'registered', 'cod', 'Dummy Order', 'pending', '2020-04-10 11:05:39', '2020-04-10 11:05:39'),
(5, '200410163917551', 1, 'Testing', 'Testing', 'testing@gmail.com', '9632587400', 'Hello World', 'How are you', '395007', 'Surat', 'Gujarat', 'India', 'registered', 'cod', NULL, 'pending', '2020-04-10 11:09:17', '2020-04-10 11:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oid` bigint(20) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `oid`, `pid`, `qty`, `unit_price`) VALUES
(9, 4, 20, 1, 1000.00),
(10, 4, 23, 1, 1000.00),
(11, 5, 31, 1, 900.00),
(12, 5, 32, 1, 2500.00),
(13, 5, 35, 1, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `tag_line` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `cid`, `product_name`, `stock`, `price`, `tag_line`, `description`, `status`, `is_featured`, `url`, `created_at`, `updated_at`) VALUES
(18, 100000, 4, 'Boxy T-Shirt with Roll Sleeve Detail', 1000, 5000.00, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 'Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat', 1, 1, 'boxy-t-shirt-with-roll-sleeve-detail', '2019-08-08 12:53:42', '2019-08-09 08:20:52'),
(20, 100002, 4, 'Frayed denim shorts', 100, 1000.00, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 'Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat', 1, 1, 'frayed-denim-shorts', '2019-08-09 07:46:20', '2019-08-09 08:20:58'),
(21, 100003, 1, 'Highlander Maroon Slim Fit Casual Shirt', 100, 500.00, 'The model (height 6\') is wearing a size 40 Fits run slim, so please choose the next size if you are used to regular or comfort fits of other national brands', 'Maroon (Brand colour name: Coffee) casual shirt, has a mandarin collar, a full button placket, long sleeves with roll-up button tabs, a patch pocket, a curved hemline', 1, 1, 'highlander-maroon-slim-fit-casual-shirt', '2019-08-27 12:32:10', '2019-08-27 12:32:10'),
(22, 100004, 1, 'Men Black Solid Sweatshirt', 100, 700.00, 'Top in soft sweatshirt fabric in a slightly looser fit with dropped shoulders and ribbing around the neckline, cuffs and hem. Soft brushed inside.', 'Top in soft sweatshirt fabric in a slightly looser fit with dropped shoulders and ribbing around the neckline, cuffs and hem. Soft brushed inside.', 1, 1, 'men-black-solid-sweatshirt', '2019-08-27 12:33:38', '2019-08-27 12:33:38'),
(23, 100005, 1, 'Men Beige Solid Shorts', 100, 1000.00, 'Shorts in soft fabric with an elasticated drawstring waist and side pockets.', 'Shorts in soft fabric with an elasticated drawstring waist and side pockets.', 1, 1, 'men-beige-solid-shorts', '2019-08-27 12:34:37', '2019-08-27 12:34:37'),
(24, 100006, 1, 'Bene Kleed Men Off-White & Blue Slim Fit Printed Casual Shirt', 10, 1000.00, 'Off-White and blue printed casual shirt, has a spread collar, long sleeves, curved hem,', 'Off-White and blue printed casual shirt, has a spread collar, long sleeves, curved hem,', 1, 0, 'bene-kleed-men-off-white-blue-slim-fit-printed-casual-shirt', '2019-09-23 05:10:13', '2019-09-23 05:10:13'),
(25, 100007, 1, 'DILLINGER Men Navy Blue Colourblocked Round Neck T-shirt', 10, 500.00, 'Navy Blue and green colourblocked T-shirt, has a round neck, short sleeves', 'Navy Blue and green colourblocked T-shirt, has a round neck, short sleeves', 1, 0, 'dillinger-men-navy-blue-colourblocked-round-neck-t-shirt', '2019-09-23 05:12:49', '2019-09-23 05:12:49'),
(26, 100008, 1, 'Roadster Men Navy Solid Round Neck T-shirt', 10, 700.00, 'Navy Blue solid T-shirt, has a round neck, long sleeves', 'Navy Blue solid T-shirt, has a round neck, long sleeves', 1, 0, 'roadster-men-navy-solid-round-neck-t-shirt', '2019-09-23 05:13:22', '2019-09-23 05:13:22'),
(27, 100009, 1, 'FIDO DIDO Men Pink Solid Polo Collar Slim Fit T-shirt', 50, 800.00, 'Pink solid T-shirt, has a polo collar, short sleeves.', 'Pink solid T-shirt, has a polo collar, short sleeves.', 1, 0, 'fido-dido-men-pink-solid-polo-collar-slim-fit-t-shirt', '2019-09-23 05:14:01', '2019-09-23 05:14:01'),
(28, 100010, 1, 'Tommy Hilfiger Men Grey Solid Round Neck T-shirt', 15, 1500.00, 'Grey solid T-shirt, has a round neck, and short sleeves', 'Grey solid T-shirt, has a round neck, and short sleeves', 1, 0, 'tommy-hilfiger-men-grey-solid-round-neck-t-shirt', '2019-09-23 05:14:35', '2019-09-23 05:14:35'),
(29, 100011, 1, 'Roadster Men Navy Printed Round Neck T-sh', 10, 400.00, 'Navy blue printed T-shirt, has a round neck, short sleeves', 'Navy blue printed T-shirt, has a round neck, short sleeves', 1, 0, 'roadster-men-navy-printed-round-neck-t-sh', '2019-09-23 05:15:10', '2019-09-23 05:15:10'),
(30, 100012, 1, 'The North Face Men Charcoal Grey Self-Design 24/7 Tech T-shirt', 10, 2000.00, 'Charcoal grey self-design T-shirt', 'Charcoal grey self-design T-shirt\r\nhas a round neck\r\nlong sleeves\r\nReflective logo', 1, 0, 'the-north-face-men-charcoal-grey-self-design-24-7-tech-t-shirt', '2019-09-23 05:16:37', '2019-09-23 05:16:37'),
(31, 100013, 1, 'HERE&NOW Men Grey Solid V-Neck T-shirt', 20, 900.00, 'Grey solid T-shirt, has a V-neck, long sleeves', 'Grey solid T-shirt, has a V-neck, long sleeves', 1, 0, 'here-now-men-grey-solid-v-neck-t-shirt', '2019-09-23 05:17:25', '2019-09-23 05:17:25'),
(32, 100014, 1, 'Tommy Hilfiger Men Navy Blue Solid Polo T-shirt', 40, 2500.00, 'Navy blue solid T-shirt, has a polo collar, and short sleeves', 'Navy blue solid T-shirt, has a polo collar, and short sleeves', 1, 0, 'tommy-hilfiger-men-navy-blue-solid-polo-t-shirt', '2019-09-23 05:19:29', '2019-09-23 05:19:29'),
(33, 100015, 1, 'Calvin Klein Jeans Men Black Solid Round Neck T-shirt', 12, 3000.00, 'Black and red solid T-shirt with printed detail, has a round neck and short sleeves', 'Black and red solid T-shirt with printed detail, has a round neck and short sleeves', 1, 0, 'calvin-klein-jeans-men-black-solid-round-neck-t-shirt', '2019-09-23 05:20:20', '2019-09-23 05:20:20'),
(34, 100016, 5, 'YK Basics', 10, 1000.00, 'Boys Pack of 5 Tshirts', 'Pack of 5 T-shirts\r\nWhite printed T-shirt, has a round neck, short sleeves\r\nBlue printed T-shirt, has a round neck, short sleeves\r\nYellow printed T-shirt, has a round neck, short sleeves\r\nRed solid T-shirt, has a round neck, short sleeves, one pocket\r\nBlack printed T-shirt, has a round neck, short sleeves', 1, 0, 'yk-basics', '2020-01-04 06:25:08', '2020-01-04 06:25:08'),
(35, 100017, 5, 'U.S. Polo Assn. Kids', 5, 500.00, 'Boys Yellow & White Striped Henley Neck T-shirt', 'Yellow and white striped T-shirt, has a Henley neck, and long roll-up sleeves', 1, 0, 'u-s-polo-assn-kids', '2020-01-04 06:27:32', '2020-01-04 06:27:32'),
(36, 100018, 6, 'WildHorn', 10, 1000.00, 'Men Accessory Gift Set', 'This accessory consists of a wallet and a belt\r\n\r\nWallet:Blue twofold genuine leather walletTwo main compartmentsThe left fold has a flap with three card holdersThe right fold has a coin pocket\r\n\r\nBelt:\r\nBlack leather beltSecured with a tang clasp\r\n\r\nComes in a signature WildHorn box', 1, 0, 'wildhorn', '2020-04-10 06:12:04', '2020-04-10 06:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `pid`, `image`, `created_at`, `updated_at`) VALUES
(22, 18, 'boxy-t-shirt-with-roll-sleeve-detail-15653283990.jpg', '2019-08-09 05:26:40', '2019-08-09 05:26:40'),
(23, 18, 'boxy-t-shirt-with-roll-sleeve-detail-15653284001.jpg', '2019-08-09 05:26:41', '2019-08-09 05:26:41'),
(24, 18, 'boxy-t-shirt-with-roll-sleeve-detail-15653284002.jpg', '2019-08-09 05:26:41', '2019-08-09 05:26:41'),
(37, 33, 'calvin-klein-jeans-men-black-solid-round-neck-t-shirt-15781140200.jpg', '2020-01-04 05:00:22', '2020-01-04 05:00:22'),
(38, 33, 'calvin-klein-jeans-men-black-solid-round-neck-t-shirt-15781140221.jpg', '2020-01-04 05:00:23', '2020-01-04 05:00:23'),
(39, 33, 'calvin-klein-jeans-men-black-solid-round-neck-t-shirt-15781140222.jpg', '2020-01-04 05:00:23', '2020-01-04 05:00:23'),
(40, 32, 'tommy-hilfiger-men-navy-blue-solid-polo-t-shirt-15781141600.jpg', '2020-01-04 05:02:41', '2020-01-04 05:02:41'),
(41, 32, 'tommy-hilfiger-men-navy-blue-solid-polo-t-shirt-15781141601.jpg', '2020-01-04 05:02:41', '2020-01-04 05:02:41'),
(42, 32, 'tommy-hilfiger-men-navy-blue-solid-polo-t-shirt-15781141612.jpg', '2020-01-04 05:02:42', '2020-01-04 05:02:42'),
(43, 31, 'here-now-men-grey-solid-v-neck-t-shirt-15781143110.jpg', '2020-01-04 05:05:11', '2020-01-04 05:05:11'),
(44, 31, 'here-now-men-grey-solid-v-neck-t-shirt-15781143111.jpg', '2020-01-04 05:05:12', '2020-01-04 05:05:12'),
(45, 31, 'here-now-men-grey-solid-v-neck-t-shirt-15781143112.jpg', '2020-01-04 05:05:12', '2020-01-04 05:05:12'),
(46, 30, 'the-north-face-men-charcoal-grey-self-design-24-7-tech-t-shirt-15781145020.jpg', '2020-01-04 05:08:22', '2020-01-04 05:08:22'),
(47, 30, 'the-north-face-men-charcoal-grey-self-design-24-7-tech-t-shirt-15781145021.jpg', '2020-01-04 05:08:22', '2020-01-04 05:08:22'),
(48, 30, 'the-north-face-men-charcoal-grey-self-design-24-7-tech-t-shirt-15781145022.jpg', '2020-01-04 05:08:23', '2020-01-04 05:08:23'),
(49, 29, 'roadster-men-navy-printed-round-neck-t-sh-15781148860.jpg', '2020-01-04 05:14:47', '2020-01-04 05:14:47'),
(50, 29, 'roadster-men-navy-printed-round-neck-t-sh-15781148861.jpg', '2020-01-04 05:14:47', '2020-01-04 05:14:47'),
(51, 29, 'roadster-men-navy-printed-round-neck-t-sh-15781148872.jpg', '2020-01-04 05:14:47', '2020-01-04 05:14:47'),
(54, 28, 'tommy-hilfiger-men-grey-solid-round-neck-t-shirt-15781150582.jpg', '2020-01-04 05:17:39', '2020-01-04 05:17:39'),
(55, 28, 'tommy-hilfiger-men-grey-solid-round-neck-t-shirt-15781151970.jpg', '2020-01-04 05:19:57', '2020-01-04 05:19:57'),
(56, 28, 'tommy-hilfiger-men-grey-solid-round-neck-t-shirt-15781151971.jpg', '2020-01-04 05:19:58', '2020-01-04 05:19:58'),
(57, 27, 'fido-dido-men-pink-solid-polo-collar-slim-fit-t-shirt-15781153370.jpg', '2020-01-04 05:22:18', '2020-01-04 05:22:18'),
(58, 27, 'fido-dido-men-pink-solid-polo-collar-slim-fit-t-shirt-15781153381.jpg', '2020-01-04 05:22:18', '2020-01-04 05:22:18'),
(59, 27, 'fido-dido-men-pink-solid-polo-collar-slim-fit-t-shirt-15781153382.jpg', '2020-01-04 05:22:18', '2020-01-04 05:22:18'),
(60, 26, 'roadster-men-navy-solid-round-neck-t-shirt-15781154610.jpg', '2020-01-04 05:24:22', '2020-01-04 05:24:22'),
(61, 26, 'roadster-men-navy-solid-round-neck-t-shirt-15781154621.jpg', '2020-01-04 05:24:22', '2020-01-04 05:24:22'),
(62, 26, 'roadster-men-navy-solid-round-neck-t-shirt-15781154622.jpg', '2020-01-04 05:24:22', '2020-01-04 05:24:22'),
(63, 25, 'dillinger-men-navy-blue-colourblocked-round-neck-t-shirt-15781155830.jpg', '2020-01-04 05:26:23', '2020-01-04 05:26:23'),
(64, 25, 'dillinger-men-navy-blue-colourblocked-round-neck-t-shirt-15781155831.jpg', '2020-01-04 05:26:23', '2020-01-04 05:26:23'),
(65, 25, 'dillinger-men-navy-blue-colourblocked-round-neck-t-shirt-15781155832.jpg', '2020-01-04 05:26:24', '2020-01-04 05:26:24'),
(66, 24, 'bene-kleed-men-off-white-blue-slim-fit-printed-casual-shirt-15781157100.jpg', '2020-01-04 05:28:31', '2020-01-04 05:28:31'),
(67, 24, 'bene-kleed-men-off-white-blue-slim-fit-printed-casual-shirt-15781157101.jpg', '2020-01-04 05:28:31', '2020-01-04 05:28:31'),
(68, 24, 'bene-kleed-men-off-white-blue-slim-fit-printed-casual-shirt-15781157102.jpg', '2020-01-04 05:28:31', '2020-01-04 05:28:31'),
(69, 23, 'men-beige-solid-shorts-15781158990.jpg', '2020-01-04 05:31:40', '2020-01-04 05:31:40'),
(70, 23, 'men-beige-solid-shorts-15781158991.jpg', '2020-01-04 05:31:40', '2020-01-04 05:31:40'),
(71, 23, 'men-beige-solid-shorts-15781159002.jpg', '2020-01-04 05:31:40', '2020-01-04 05:31:40'),
(72, 22, 'men-black-solid-sweatshirt-15781161750.jpg', '2020-01-04 05:36:15', '2020-01-04 05:36:15'),
(73, 22, 'men-black-solid-sweatshirt-15781161751.jpg', '2020-01-04 05:36:15', '2020-01-04 05:36:15'),
(74, 22, 'men-black-solid-sweatshirt-15781161752.jpg', '2020-01-04 05:36:15', '2020-01-04 05:36:15'),
(75, 21, 'highlander-maroon-slim-fit-casual-shirt-15781163370.jpg', '2020-01-04 05:38:57', '2020-01-04 05:38:57'),
(76, 21, 'highlander-maroon-slim-fit-casual-shirt-15781163371.jpg', '2020-01-04 05:38:57', '2020-01-04 05:38:57'),
(77, 21, 'highlander-maroon-slim-fit-casual-shirt-15781163372.jpg', '2020-01-04 05:38:57', '2020-01-04 05:38:57'),
(78, 20, 'frayed-denim-shorts-15781188780.jpg', '2020-01-04 06:21:19', '2020-01-04 06:21:19'),
(79, 20, 'frayed-denim-shorts-15781188781.jpg', '2020-01-04 06:21:19', '2020-01-04 06:21:19'),
(80, 34, 'yk-basics-15781191080.jpg', '2020-01-04 06:25:09', '2020-01-04 06:25:09'),
(81, 34, 'yk-basics-15781191081.jpg', '2020-01-04 06:25:09', '2020-01-04 06:25:09'),
(82, 34, 'yk-basics-15781191082.jpg', '2020-01-04 06:25:09', '2020-01-04 06:25:09'),
(83, 35, 'u-s-polo-assn-kids-15781192520.jpg', '2020-01-04 06:27:33', '2020-01-04 06:27:33'),
(84, 35, 'u-s-polo-assn-kids-15781192531.jpg', '2020-01-04 06:27:33', '2020-01-04 06:27:33'),
(85, 36, 'wildhorn-15864991250.jpg', '2020-04-10 06:12:07', '2020-04-10 06:12:07'),
(86, 36, 'wildhorn-15864991261.jpg', '2020-04-10 06:12:07', '2020-04-10 06:12:07'),
(87, 36, 'wildhorn-15864991272.jpg', '2020-04-10 06:12:07', '2020-04-10 06:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '4eversolutions', 'admin', 'testing@4eversolutions.co.in', NULL, '$2y$10$.t4fm82rXXDGBdeHnBh4/OlOigxHdTrBJFrmh.hMNM2SkUADL.MiC', 'orI9cVM82KS4nTRp64s9bHs0uaAHsuFlXmlgLU8yBVt2rTtXmAxO90boIrSH', '2019-05-31 09:54:00', '2019-05-31 09:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD KEY `url` (`url`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_title_unique` (`title`),
  ADD UNIQUE KEY `blog_categories_url_unique` (`url`);

--
-- Indexes for table `blog_cids`
--
ALTER TABLE `blog_cids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_cids_bid_foreign` (`bid`),
  ADD KEY `blog_cids_bcid_foreign` (`bcid`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_bid_foreign` (`bid`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tags_bid_foreign` (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_pid_foreign` (`pid`),
  ADD KEY `cart_cid_foreign` (`cid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_url_unique` (`url`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `orders_cid_foreign` (`cid`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_oid_foreign` (`oid`),
  ADD KEY `order_products_pid_foreign` (`pid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD UNIQUE KEY `products_url_unique` (`url`),
  ADD KEY `products_cid_foreign` (`cid`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_images_pid_foreign` (`pid`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_cid_foreign` (`cid`),
  ADD KEY `wishlist_pid_foreign` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_cids`
--
ALTER TABLE `blog_cids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_cids`
--
ALTER TABLE `blog_cids`
  ADD CONSTRAINT `blog_cids_bcid_foreign` FOREIGN KEY (`bcid`) REFERENCES `blog_categories` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `blog_cids_bid_foreign` FOREIGN KEY (`bid`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_bid_foreign` FOREIGN KEY (`bid`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD CONSTRAINT `blog_tags_bid_foreign` FOREIGN KEY (`bid`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `customers` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_products_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wishlist_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
