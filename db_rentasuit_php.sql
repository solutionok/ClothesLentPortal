-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2019 at 03:36 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentasuit_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `picture_custom_size` text COLLATE utf8_unicode_ci,
  `seo_url` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `description`, `picture`, `picture_custom_size`, `seo_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog 1 edited', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam. edited', 'uploads/blog/1497847145__blog-img-1.jpg', '/uploads/custom_size/1497847145__blog-img-1.jpg', 'blog-1-edited', '2017-06-18 20:39:05', '2018-04-10 23:03:50'),
(2, 1, 'Blog 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847174__blog-img-2.jpg', '/uploads/custom_size/1497847174__blog-img-2.jpg', 'blog-2', '2017-06-18 20:39:34', '2017-06-18 20:39:34'),
(3, 1, 'Blog 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847213__blog-img-3.jpg', '/uploads/custom_size/1497847213__blog-img-3.jpg', 'blog-3', '2017-06-18 20:40:13', '2017-06-18 20:40:13'),
(4, 1, 'Blog 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847589__blog-img-4.jpg', '/uploads/custom_size/1497847589__blog-img-4.jpg', 'blog-4', '2017-06-18 20:46:29', '2017-06-18 20:46:29'),
(5, 1, 'Blog 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847610__blog-img-5.jpg', '/uploads/custom_size/1497847610__blog-img-5.jpg', 'blog-5', '2017-06-18 20:46:51', '2017-06-18 20:46:51'),
(6, 1, 'Blog 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847655__blog-img-6.jpg', '/uploads/custom_size/1497847655__blog-img-6.jpg', 'blog-6', '2017-06-18 20:47:35', '2017-06-18 20:47:35'),
(7, 1, 'Blog 7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847680__blog-img-7.jpg', '/uploads/custom_size/1497847680__blog-img-7.jpg', 'blog-7', '2017-06-18 20:48:00', '2017-06-18 20:48:00'),
(8, 1, 'Blog 8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847702__blog-img-8.jpg', '/uploads/custom_size/1497847702__blog-img-8.jpg', 'blog-8', '2017-06-18 20:48:22', '2017-06-18 20:48:22'),
(9, 1, 'What to wear when it is raining?', '<p>Rain does not mean, dress up with no style exceptionally if you have a day interview.</p><p>SO what, you may ask?</p><p>I found this great article on \"what to wear for your job interview when it is raining\"</p><p><br></p><p>http://jobsearchalpha.com/124/job-interview-dress-code-for-a-rainy-day/</p><p><br></p><p><br></p>', 'uploads/blog/1497847728__blog-img-9.jpg', '/uploads/custom_size/1497847728__blog-img-9.jpg', 'what-to-wear-when-it-is-raining', '2017-06-18 20:48:48', '2018-12-14 03:18:05'),
(10, 1, 'Blog 10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi animi molestias debitis error iure nulla repellendus vitae perferendis rem earum illo asperiores nostrum pariatur repellat, laudantium unde? Nulla, excepturi, ipsam.', 'uploads/blog/1497847743__blog-img-10.jpg', '/uploads/custom_size/1497847743__blog-img-10.jpg', 'blog-10', '2017-06-18 20:49:04', '2017-06-18 20:49:04'),
(11, 1, 'Blog 11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/blog/1497851331__Desert.jpg', '/uploads/custom_size/1497851331__Desert.jpg', 'blog-11', '2017-06-18 21:48:52', '2017-06-18 21:48:52'),
(12, 1, 'Blog 12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/others/no_image.jpg', 'uploads/others/no_image.jpg', 'blog-12', '2017-06-18 21:49:34', '2017-06-18 21:49:34'),
(13, 1, 'Blog 13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/others/no_image.jpg', 'uploads/others/no_image.jpg', 'blog-13', '2017-06-18 21:49:57', '2017-06-18 21:49:57'),
(14, 1, 'Blog 14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/others/no_image.jpg', 'uploads/others/no_image.jpg', 'blog-14', '2017-06-18 21:50:09', '2017-06-18 21:50:09'),
(15, 1, 'Blog 15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/blog/1497851428__Tulips.jpg', '/uploads/custom_size/1497851428__Tulips.jpg', 'blog-15', '2017-06-18 21:50:29', '2017-06-18 21:50:29'),
(16, 1, 'Blog 16', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/blog/1497851445__Lighthouse.jpg', '/uploads/custom_size/1497851445__Lighthouse.jpg', 'blog-16', '2017-06-18 21:50:45', '2017-06-18 21:50:45'),
(17, 1, 'Blog 17', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae nemo cupiditate magni, debitis nostrum fuga consectetur vero numquam sed veniam dicta itaque in cumque, natus illum et esse ipsum.', 'uploads/blog/1497851461__download.jpg', '/uploads/custom_size/1497851461__download.jpg', 'blog-17', '2017-06-18 21:51:01', '2018-03-12 19:55:52'),
(18, 1, 'New post', '<p>New postt</p>', 'uploads/blog/1523376308__WhatsApp Image 2018-02-09 at 11.17.04.jpeg', '/uploads/custom_size/1523376308__WhatsApp Image 2018-02-09 at 11.17.04.jpeg', 'new-post', '2018-04-10 23:05:09', '2018-04-10 23:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = blog | 1 = product',
  `picture` text COLLATE utf8_unicode_ci,
  `shipping_fee_local` double DEFAULT NULL,
  `shipping_fee_nationwide` double DEFAULT NULL,
  `seo_url` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `picture`, `shipping_fee_local`, `shipping_fee_nationwide`, `seo_url`, `created_at`, `updated_at`) VALUES
(1, 'Suits', 1, 'uploads/categories/1513118881__collection-1.jpg', 20, 40, 'suits', '2017-06-18 20:26:18', '2017-12-13 06:48:01'),
(2, 'Dress', 1, 'uploads/categories/1513118934__collection-2.jpg', 14, 30, 'dress', '2017-06-18 20:26:30', '2017-12-13 06:48:54'),
(3, 'Jackets', 1, 'uploads/categories/1513118900__collection-3.jpg', 20, 40, 'jackets', '2017-06-18 20:26:41', '2017-12-13 06:48:20'),
(4, 'Coats', 1, 'uploads/categories/1513118960__collection-4.jpg', 20, 40, 'coats', '2017-06-18 20:26:58', '2017-12-13 06:49:20'),
(5, 'Tops', 1, 'uploads/categories/1513118825__blog-img-1.jpg', 14, 30, 'tops', '2017-06-18 20:27:05', '2017-12-13 06:47:05'),
(6, 'Accessories', 1, 'uploads/categories/1513118985__blog-img-10.jpg', 14, 30, 'accessories', '2017-06-18 20:27:18', '2017-12-13 06:49:45'),
(7, 'Skirt', 1, 'uploads/categories/1526883792__71SwsbbpDPL._UL1500_.jpg', 14, 30, 'skirt', '2018-05-21 13:23:12', '2018-05-21 13:23:12'),
(8, 'Pant', 1, 'uploads/categories/1526883883__0003192_men-cotton-pant.jpeg', 14, 30, 'pant', '2018-05-21 13:24:43', '2018-05-21 17:04:50'),
(9, 'Bags', 1, 'uploads/categories/1530537734__Girls-Hand-Bags-2014.png', 14, 30, 'bags', '2018-07-02 20:22:14', '2018-11-20 01:17:26'),
(10, 'Shoes', 1, 'uploads/categories/1530537794__New-2018-Fashion-Men-Shoes-Suede-Leather-Casual-Flat-Shoes-Lace-up-Men-s-Flats-for.png', 14, 30, 'shoes', '2018-07-02 20:23:14', '2018-07-02 20:23:14'),
(11, 'Let\'s Party', 1, 'uploads/categories/1536817610__lets_party.jpg', 20, 40, 'lets-party', '2018-09-13 12:46:50', '2018-09-13 12:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `cleaner`
--

CREATE TABLE `cleaner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `shop_name` varchar(255) NOT NULL DEFAULT '',
  `location` text NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `mobile_number` varchar(20) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaner`
--

INSERT INTO `cleaner` (`id`, `name`, `shop_name`, `location`, `latitude`, `longitude`, `mobile_number`, `created_at`, `updated_at`) VALUES
(13, 'Testing1234', 'Test mitajacorp 123', '61 Claireville Dr, Etobicoke, ON M9W 5Z7, Canada', 43.738744503450405, -79.62583645828641, '12345678', '2018-02-28 09:01:43', '2018-02-28 09:01:43'),
(14, 'cleaners Plus', 'Cleaner Plus', 'Cleaners Plus 4935 W Foster Ave Forest Glen', 41.975026, -87.751844, '0312312343213', '2018-11-28 14:28:55', '2018-11-28 14:28:55'),
(15, 'Canada Dry Cleaning and Alteration', 'Dry cleaning', '1349 Woodbine Ave 1349 Woodbine Ave East York', 43.6965607, -79.31732339999996, '4166960906', '2018-11-29 20:12:35', '2018-11-29 20:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `logo_footer` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `commision` double NOT NULL DEFAULT '0',
  `social_media_links` text COLLATE utf8_unicode_ci NOT NULL,
  `paypal_account` text COLLATE utf8_unicode_ci NOT NULL,
  `paypal_client_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_client_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_live_client_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_live_client_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `logo`, `logo_footer`, `name`, `email`, `copyright`, `phone_number`, `location`, `commision`, `social_media_links`, `paypal_account`, `paypal_client_id`, `paypal_client_secret`, `paypal_live_client_id`, `paypal_live_client_secret`, `paypal_mode`, `created_at`, `updated_at`) VALUES
(1, 'uploads/others/1496992927__logo.png', 'uploads/others/1496992927__footer-logo.png', 'Rent a Suit', 'info@rentasuit.ca', 'Rent a Suit. All Rights Reserved.', '1 (833) 311 7368 or 1 (833) RENT', '123 connecticut st.', 1.6, 'a:3:{s:8:\"facebook\";s:42:\"https://www.facebook.com/rentasuitclothes/\";s:9:\"instagram\";s:43:\"https://www.instagram.com/rentasuitclothes/\";s:7:\"twitter\";s:42:\"https://www.pinterest.ca/rentasuitclothes/\";}', 'a:7:{s:20:\"paypal_test_username\";N;s:20:\"paypal_test_password\";N;s:21:\"paypal_test_signature\";N;s:20:\"paypal_live_username\";N;s:20:\"paypal_live_password\";N;s:21:\"paypal_live_signature\";N;s:11:\"paypal_mode\";s:7:\"sandbox\";}', 'AeyCFjyOYWsn-8Y7DQQ98cvv2KIpYAYRZo6MqWWv_Vrqr5_nSIz7-Xk5K3Lj4cu58VvXH1fO821QYlCC', 'EJ_HfSAS6d2S1JJxEo_he09SzzDQGuQ2DpJ-BSUSfHKo5mVLRYhmLlzK9HMPPbcFxuiCSt049imkapMH', NULL, NULL, 'sandbox', '0000-00-00 00:00:00', '2019-03-04 16:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Code` char(3) NOT NULL DEFAULT '',
  `Name` char(52) NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia',
  `Region` char(26) NOT NULL DEFAULT '',
  `SurfaceArea` float(10,2) NOT NULL DEFAULT '0.00',
  `IndepYear` smallint(6) DEFAULT NULL,
  `Population` int(11) NOT NULL DEFAULT '0',
  `LifeExpectancy` float(3,1) DEFAULT NULL,
  `GNP` float(10,2) DEFAULT NULL,
  `GNPOld` float(10,2) DEFAULT NULL,
  `LocalName` char(45) NOT NULL DEFAULT '',
  `GovernmentForm` char(45) NOT NULL DEFAULT '',
  `HeadOfState` char(60) DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Code`, `Name`, `Continent`, `Region`, `SurfaceArea`, `IndepYear`, `Population`, `LifeExpectancy`, `GNP`, `GNPOld`, `LocalName`, `GovernmentForm`, `HeadOfState`, `Capital`, `Code2`) VALUES
('ABW', 'Aruba', 'North America', 'Caribbean', 193.00, NULL, 103000, 78.4, 828.00, 793.00, 'Aruba', 'Nonmetropolitan Territory of The Netherlands', 'Beatrix', 129, 'AW'),
('AFG', 'Afghanistan', 'Asia', 'Southern and Central Asia', 652090.00, 1919, 22720000, 45.9, 5976.00, NULL, 'Afganistan/Afqanestan', 'Islamic Emirate', 'Mohammad Omar', 1, 'AF'),
('AGO', 'Angola', 'Africa', 'Central Africa', 1246700.00, 1975, 12878000, 38.3, 6648.00, 7984.00, 'Angola', 'Republic', 'José Eduardo dos Santos', 56, 'AO'),
('AIA', 'Anguilla', 'North America', 'Caribbean', 96.00, NULL, 8000, 76.1, 63.20, NULL, 'Anguilla', 'Dependent Territory of the UK', 'Elisabeth II', 62, 'AI'),
('ALB', 'Albania', 'Europe', 'Southern Europe', 28748.00, 1912, 3401200, 71.6, 3205.00, 2500.00, 'Shqipëria', 'Republic', 'Rexhep Mejdani', 34, 'AL'),
('AND', 'Andorra', 'Europe', 'Southern Europe', 468.00, 1278, 78000, 83.5, 1630.00, NULL, 'Andorra', 'Parliamentary Coprincipality', '', 55, 'AD'),
('ANT', 'Netherlands Antilles', 'North America', 'Caribbean', 800.00, NULL, 217000, 74.7, 1941.00, NULL, 'Nederlandse Antillen', 'Nonmetropolitan Territory of The Netherlands', 'Beatrix', 33, 'AN'),
('ARE', 'United Arab Emirates', 'Asia', 'Middle East', 83600.00, 1971, 2441000, 74.1, 37966.00, 36846.00, 'Al-Imarat al-´Arabiya al-Muttahida', 'Emirate Federation', 'Zayid bin Sultan al-Nahayan', 65, 'AE'),
('ARG', 'Argentina', 'South America', 'South America', 2780400.00, 1816, 37032000, 75.1, 340238.00, 323310.00, 'Argentina', 'Federal Republic', 'Fernando de la Rúa', 69, 'AR'),
('ARM', 'Armenia', 'Asia', 'Middle East', 29800.00, 1991, 3520000, 66.4, 1813.00, 1627.00, 'Hajastan', 'Republic', 'Robert Kotšarjan', 126, 'AM'),
('ASM', 'American Samoa', 'Oceania', 'Polynesia', 199.00, NULL, 68000, 75.1, 334.00, NULL, 'Amerika Samoa', 'US Territory', 'George W. Bush', 54, 'AS'),
('ATA', 'Antarctica', 'Antarctica', 'Antarctica', 13120000.00, NULL, 0, NULL, 0.00, NULL, '–', 'Co-administrated', '', NULL, 'AQ'),
('ATF', 'French Southern territories', 'Antarctica', 'Antarctica', 7780.00, NULL, 0, NULL, 0.00, NULL, 'Terres australes françaises', 'Nonmetropolitan Territory of France', 'Jacques Chirac', NULL, 'TF'),
('ATG', 'Antigua and Barbuda', 'North America', 'Caribbean', 442.00, 1981, 68000, 70.5, 612.00, 584.00, 'Antigua and Barbuda', 'Constitutional Monarchy', 'Elisabeth II', 63, 'AG'),
('AUS', 'Australia', 'Oceania', 'Australia and New Zealand', 7741220.00, 1901, 18886000, 79.8, 351182.00, 392911.00, 'Australia', 'Constitutional Monarchy, Federation', 'Elisabeth II', 135, 'AU'),
('AUT', 'Austria', 'Europe', 'Western Europe', 83859.00, 1918, 8091800, 77.7, 211860.00, 206025.00, 'Österreich', 'Federal Republic', 'Thomas Klestil', 1523, 'AT'),
('AZE', 'Azerbaijan', 'Asia', 'Middle East', 86600.00, 1991, 7734000, 62.9, 4127.00, 4100.00, 'Azärbaycan', 'Federal Republic', 'Heydär Äliyev', 144, 'AZ'),
('BDI', 'Burundi', 'Africa', 'Eastern Africa', 27834.00, 1962, 6695000, 46.2, 903.00, 982.00, 'Burundi/Uburundi', 'Republic', 'Pierre Buyoya', 552, 'BI'),
('BEL', 'Belgium', 'Europe', 'Western Europe', 30518.00, 1830, 10239000, 77.8, 249704.00, 243948.00, 'België/Belgique', 'Constitutional Monarchy, Federation', 'Albert II', 179, 'BE'),
('BEN', 'Benin', 'Africa', 'Western Africa', 112622.00, 1960, 6097000, 50.2, 2357.00, 2141.00, 'Bénin', 'Republic', 'Mathieu Kérékou', 187, 'BJ'),
('BFA', 'Burkina Faso', 'Africa', 'Western Africa', 274000.00, 1960, 11937000, 46.7, 2425.00, 2201.00, 'Burkina Faso', 'Republic', 'Blaise Compaoré', 549, 'BF'),
('BGD', 'Bangladesh', 'Asia', 'Southern and Central Asia', 143998.00, 1971, 129155000, 60.2, 32852.00, 31966.00, 'Bangladesh', 'Republic', 'Shahabuddin Ahmad', 150, 'BD'),
('BGR', 'Bulgaria', 'Europe', 'Eastern Europe', 110994.00, 1908, 8190900, 70.9, 12178.00, 10169.00, 'Balgarija', 'Republic', 'Petar Stojanov', 539, 'BG'),
('BHR', 'Bahrain', 'Asia', 'Middle East', 694.00, 1971, 617000, 73.0, 6366.00, 6097.00, 'Al-Bahrayn', 'Monarchy (Emirate)', 'Hamad ibn Isa al-Khalifa', 149, 'BH'),
('BHS', 'Bahamas', 'North America', 'Caribbean', 13878.00, 1973, 307000, 71.1, 3527.00, 3347.00, 'The Bahamas', 'Constitutional Monarchy', 'Elisabeth II', 148, 'BS'),
('BIH', 'Bosnia and Herzegovina', 'Europe', 'Southern Europe', 51197.00, 1992, 3972000, 71.5, 2841.00, NULL, 'Bosna i Hercegovina', 'Federal Republic', 'Ante Jelavic', 201, 'BA'),
('BLR', 'Belarus', 'Europe', 'Eastern Europe', 207600.00, 1991, 10236000, 68.0, 13714.00, NULL, 'Belarus', 'Republic', 'Aljaksandr Lukašenka', 3520, 'BY'),
('BLZ', 'Belize', 'North America', 'Central America', 22696.00, 1981, 241000, 70.9, 630.00, 616.00, 'Belize', 'Constitutional Monarchy', 'Elisabeth II', 185, 'BZ'),
('BMU', 'Bermuda', 'North America', 'North America', 53.00, NULL, 65000, 76.9, 2328.00, 2190.00, 'Bermuda', 'Dependent Territory of the UK', 'Elisabeth II', 191, 'BM'),
('BOL', 'Bolivia', 'South America', 'South America', 1098581.00, 1825, 8329000, 63.7, 8571.00, 7967.00, 'Bolivia', 'Republic', 'Hugo Bánzer Suárez', 194, 'BO'),
('BRA', 'Brazil', 'South America', 'South America', 8547403.00, 1822, 170115000, 62.9, 776739.00, 804108.00, 'Brasil', 'Federal Republic', 'Fernando Henrique Cardoso', 211, 'BR'),
('BRB', 'Barbados', 'North America', 'Caribbean', 430.00, 1966, 270000, 73.0, 2223.00, 2186.00, 'Barbados', 'Constitutional Monarchy', 'Elisabeth II', 174, 'BB'),
('BRN', 'Brunei', 'Asia', 'Southeast Asia', 5765.00, 1984, 328000, 73.6, 11705.00, 12460.00, 'Brunei Darussalam', 'Monarchy (Sultanate)', 'Haji Hassan al-Bolkiah', 538, 'BN'),
('BTN', 'Bhutan', 'Asia', 'Southern and Central Asia', 47000.00, 1910, 2124000, 52.4, 372.00, 383.00, 'Druk-Yul', 'Monarchy', 'Jigme Singye Wangchuk', 192, 'BT'),
('BVT', 'Bouvet Island', 'Antarctica', 'Antarctica', 59.00, NULL, 0, NULL, 0.00, NULL, 'Bouvetøya', 'Dependent Territory of Norway', 'Harald V', NULL, 'BV'),
('BWA', 'Botswana', 'Africa', 'Southern Africa', 581730.00, 1966, 1622000, 39.3, 4834.00, 4935.00, 'Botswana', 'Republic', 'Festus G. Mogae', 204, 'BW'),
('CAF', 'Central African Republic', 'Africa', 'Central Africa', 622984.00, 1960, 3615000, 44.0, 1054.00, 993.00, 'Centrafrique/Bê-Afrîka', 'Republic', 'Ange-Félix Patassé', 1889, 'CF'),
('CAN', 'Canada', 'North America', 'North America', 9970610.00, 1867, 31147000, 79.4, 598862.00, 625626.00, 'Canada', 'Constitutional Monarchy, Federation', 'Elisabeth II', 1822, 'CA'),
('CCK', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', 14.00, NULL, 600, NULL, 0.00, NULL, 'Cocos (Keeling) Islands', 'Territory of Australia', 'Elisabeth II', 2317, 'CC'),
('CHE', 'Switzerland', 'Europe', 'Western Europe', 41284.00, 1499, 7160400, 79.6, 264478.00, 256092.00, 'Schweiz/Suisse/Svizzera/Svizra', 'Federation', 'Adolf Ogi', 3248, 'CH'),
('CHL', 'Chile', 'South America', 'South America', 756626.00, 1810, 15211000, 75.7, 72949.00, 75780.00, 'Chile', 'Republic', 'Ricardo Lagos Escobar', 554, 'CL'),
('CHN', 'China', 'Asia', 'Eastern Asia', 9572900.00, -1523, 1277558000, 71.4, 982268.00, 917719.00, 'Zhongquo', 'People\'sRepublic', 'Jiang Zemin', 1891, 'CN'),
('CIV', 'Côte d’Ivoire', 'Africa', 'Western Africa', 322463.00, 1960, 14786000, 45.2, 11345.00, 10285.00, 'Côte d’Ivoire', 'Republic', 'Laurent Gbagbo', 2814, 'CI'),
('CMR', 'Cameroon', 'Africa', 'Central Africa', 475442.00, 1960, 15085000, 54.8, 9174.00, 8596.00, 'Cameroun/Cameroon', 'Republic', 'Paul Biya', 1804, 'CM'),
('COD', 'Congo, The Democratic Republic of the', 'Africa', 'Central Africa', 2344858.00, 1960, 51654000, 48.8, 6964.00, 2474.00, 'République Démocratique du Congo', 'Republic', 'Joseph Kabila', 2298, 'CD'),
('COG', 'Congo', 'Africa', 'Central Africa', 342000.00, 1960, 2943000, 47.4, 2108.00, 2287.00, 'Congo', 'Republic', 'Denis Sassou-Nguesso', 2296, 'CG'),
('COK', 'Cook Islands', 'Oceania', 'Polynesia', 236.00, NULL, 20000, 71.1, 100.00, NULL, 'The Cook Islands', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 583, 'CK'),
('COL', 'Colombia', 'South America', 'South America', 1138914.00, 1810, 42321000, 70.3, 102896.00, 105116.00, 'Colombia', 'Republic', 'Andrés Pastrana Arango', 2257, 'CO'),
('COM', 'Comoros', 'Africa', 'Eastern Africa', 1862.00, 1975, 578000, 60.0, 4401.00, 4361.00, 'Komori/Comores', 'Republic', 'Azali Assoumani', 2295, 'KM'),
('CPV', 'Cape Verde', 'Africa', 'Western Africa', 4033.00, 1975, 428000, 68.9, 435.00, 420.00, 'Cabo Verde', 'Republic', 'António Mascarenhas Monteiro', 1859, 'CV'),
('CRI', 'Costa Rica', 'North America', 'Central America', 51100.00, 1821, 4023000, 75.8, 10226.00, 9757.00, 'Costa Rica', 'Republic', 'Miguel Ángel Rodríguez Echeverría', 584, 'CR'),
('CUB', 'Cuba', 'North America', 'Caribbean', 110861.00, 1902, 11201000, 76.2, 17843.00, 18862.00, 'Cuba', 'Socialistic Republic', 'Fidel Castro Ruz', 2413, 'CU'),
('CXR', 'Christmas Island', 'Oceania', 'Australia and New Zealand', 135.00, NULL, 2500, NULL, 0.00, NULL, 'Christmas Island', 'Territory of Australia', 'Elisabeth II', 1791, 'CX'),
('CYM', 'Cayman Islands', 'North America', 'Caribbean', 264.00, NULL, 38000, 78.9, 1263.00, 1186.00, 'Cayman Islands', 'Dependent Territory of the UK', 'Elisabeth II', 553, 'KY'),
('CYP', 'Cyprus', 'Asia', 'Middle East', 9251.00, 1960, 754700, 76.7, 9333.00, 8246.00, 'Kýpros/Kibris', 'Republic', 'Glafkos Klerides', 2430, 'CY'),
('CZE', 'Czech Republic', 'Europe', 'Eastern Europe', 78866.00, 1993, 10278100, 74.5, 55017.00, 52037.00, '¸esko', 'Republic', 'Václav Havel', 3339, 'CZ'),
('DEU', 'Germany', 'Europe', 'Western Europe', 357022.00, 1955, 82164700, 77.4, 2133367.00, 2102826.00, 'Deutschland', 'Federal Republic', 'Johannes Rau', 3068, 'DE'),
('DJI', 'Djibouti', 'Africa', 'Eastern Africa', 23200.00, 1977, 638000, 50.8, 382.00, 373.00, 'Djibouti/Jibuti', 'Republic', 'Ismail Omar Guelleh', 585, 'DJ'),
('DMA', 'Dominica', 'North America', 'Caribbean', 751.00, 1978, 71000, 73.4, 256.00, 243.00, 'Dominica', 'Republic', 'Vernon Shaw', 586, 'DM'),
('DNK', 'Denmark', 'Europe', 'Nordic Countries', 43094.00, 800, 5330000, 76.5, 174099.00, 169264.00, 'Danmark', 'Constitutional Monarchy', 'Margrethe II', 3315, 'DK'),
('DOM', 'Dominican Republic', 'North America', 'Caribbean', 48511.00, 1844, 8495000, 73.2, 15846.00, 15076.00, 'República Dominicana', 'Republic', 'Hipólito Mejía Domínguez', 587, 'DO'),
('DZA', 'Algeria', 'Africa', 'Northern Africa', 2381741.00, 1962, 31471000, 69.7, 49982.00, 46966.00, 'Al-Jaza’ir/Algérie', 'Republic', 'Abdelaziz Bouteflika', 35, 'DZ'),
('ECU', 'Ecuador', 'South America', 'South America', 283561.00, 1822, 12646000, 71.1, 19770.00, 19769.00, 'Ecuador', 'Republic', 'Gustavo Noboa Bejarano', 594, 'EC'),
('EGY', 'Egypt', 'Africa', 'Northern Africa', 1001449.00, 1922, 68470000, 63.3, 82710.00, 75617.00, 'Misr', 'Republic', 'Hosni Mubarak', 608, 'EG'),
('ERI', 'Eritrea', 'Africa', 'Eastern Africa', 117600.00, 1993, 3850000, 55.8, 650.00, 755.00, 'Ertra', 'Republic', 'Isayas Afewerki [Isaias Afwerki]', 652, 'ER'),
('ESH', 'Western Sahara', 'Africa', 'Northern Africa', 266000.00, NULL, 293000, 49.8, 60.00, NULL, 'As-Sahrawiya', 'Occupied by Marocco', 'Mohammed Abdel Aziz', 2453, 'EH'),
('ESP', 'Spain', 'Europe', 'Southern Europe', 505992.00, 1492, 39441700, 78.8, 553233.00, 532031.00, 'España', 'Constitutional Monarchy', 'Juan Carlos I', 653, 'ES'),
('EST', 'Estonia', 'Europe', 'Baltic Countries', 45227.00, 1991, 1439200, 69.5, 5328.00, 3371.00, 'Eesti', 'Republic', 'Lennart Meri', 3791, 'EE'),
('ETH', 'Ethiopia', 'Africa', 'Eastern Africa', 1104300.00, -1000, 62565000, 45.2, 6353.00, 6180.00, 'YeItyop´iya', 'Republic', 'Negasso Gidada', 756, 'ET'),
('FIN', 'Finland', 'Europe', 'Nordic Countries', 338145.00, 1917, 5171300, 77.4, 121914.00, 119833.00, 'Suomi', 'Republic', 'Tarja Halonen', 3236, 'FI'),
('FJI', 'Fiji Islands', 'Oceania', 'Melanesia', 18274.00, 1970, 817000, 67.9, 1536.00, 2149.00, 'Fiji Islands', 'Republic', 'Josefa Iloilo', 764, 'FJ'),
('FLK', 'Falkland Islands', 'South America', 'South America', 12173.00, NULL, 2000, NULL, 0.00, NULL, 'Falkland Islands', 'Dependent Territory of the UK', 'Elisabeth II', 763, 'FK'),
('FRA', 'France', 'Europe', 'Western Europe', 551500.00, 843, 59225700, 78.8, 1424285.00, 1392448.00, 'France', 'Republic', 'Jacques Chirac', 2974, 'FR'),
('FRO', 'Faroe Islands', 'Europe', 'Nordic Countries', 1399.00, NULL, 43000, 78.4, 0.00, NULL, 'Føroyar', 'Part of Denmark', 'Margrethe II', 901, 'FO'),
('FSM', 'Micronesia, Federated States of', 'Oceania', 'Micronesia', 702.00, 1990, 119000, 68.6, 212.00, NULL, 'Micronesia', 'Federal Republic', 'Leo A. Falcam', 2689, 'FM'),
('GAB', 'Gabon', 'Africa', 'Central Africa', 267668.00, 1960, 1226000, 50.1, 5493.00, 5279.00, 'Le Gabon', 'Republic', 'Omar Bongo', 902, 'GA'),
('GBR', 'United Kingdom', 'Europe', 'British Islands', 242900.00, 1066, 59623400, 77.7, 1378330.00, 1296830.00, 'United Kingdom', 'Constitutional Monarchy', 'Elisabeth II', 456, 'GB'),
('GEO', 'Georgia', 'Asia', 'Middle East', 69700.00, 1991, 4968000, 64.5, 6064.00, 5924.00, 'Sakartvelo', 'Republic', 'Eduard Ševardnadze', 905, 'GE'),
('GHA', 'Ghana', 'Africa', 'Western Africa', 238533.00, 1957, 20212000, 57.4, 7137.00, 6884.00, 'Ghana', 'Republic', 'John Kufuor', 910, 'GH'),
('GIB', 'Gibraltar', 'Europe', 'Southern Europe', 6.00, NULL, 25000, 79.0, 258.00, NULL, 'Gibraltar', 'Dependent Territory of the UK', 'Elisabeth II', 915, 'GI'),
('GIN', 'Guinea', 'Africa', 'Western Africa', 245857.00, 1958, 7430000, 45.6, 2352.00, 2383.00, 'Guinée', 'Republic', 'Lansana Conté', 926, 'GN'),
('GLP', 'Guadeloupe', 'North America', 'Caribbean', 1705.00, NULL, 456000, 77.0, 3501.00, NULL, 'Guadeloupe', 'Overseas Department of France', 'Jacques Chirac', 919, 'GP'),
('GMB', 'Gambia', 'Africa', 'Western Africa', 11295.00, 1965, 1305000, 53.2, 320.00, 325.00, 'The Gambia', 'Republic', 'Yahya Jammeh', 904, 'GM'),
('GNB', 'Guinea-Bissau', 'Africa', 'Western Africa', 36125.00, 1974, 1213000, 49.0, 293.00, 272.00, 'Guiné-Bissau', 'Republic', 'Kumba Ialá', 927, 'GW'),
('GNQ', 'Equatorial Guinea', 'Africa', 'Central Africa', 28051.00, 1968, 453000, 53.6, 283.00, 542.00, 'Guinea Ecuatorial', 'Republic', 'Teodoro Obiang Nguema Mbasogo', 2972, 'GQ'),
('GRC', 'Greece', 'Europe', 'Southern Europe', 131626.00, 1830, 10545700, 78.4, 120724.00, 119946.00, 'Elláda', 'Republic', 'Kostis Stefanopoulos', 2401, 'GR'),
('GRD', 'Grenada', 'North America', 'Caribbean', 344.00, 1974, 94000, 64.5, 318.00, NULL, 'Grenada', 'Constitutional Monarchy', 'Elisabeth II', 916, 'GD'),
('GRL', 'Greenland', 'North America', 'North America', 2166090.00, NULL, 56000, 68.1, 0.00, NULL, 'Kalaallit Nunaat/Grønland', 'Part of Denmark', 'Margrethe II', 917, 'GL'),
('GTM', 'Guatemala', 'North America', 'Central America', 108889.00, 1821, 11385000, 66.2, 19008.00, 17797.00, 'Guatemala', 'Republic', 'Alfonso Portillo Cabrera', 922, 'GT'),
('GUF', 'French Guiana', 'South America', 'South America', 90000.00, NULL, 181000, 76.1, 681.00, NULL, 'Guyane française', 'Overseas Department of France', 'Jacques Chirac', 3014, 'GF'),
('GUM', 'Guam', 'Oceania', 'Micronesia', 549.00, NULL, 168000, 77.8, 1197.00, 1136.00, 'Guam', 'US Territory', 'George W. Bush', 921, 'GU'),
('GUY', 'Guyana', 'South America', 'South America', 214969.00, 1966, 861000, 64.0, 722.00, 743.00, 'Guyana', 'Republic', 'Bharrat Jagdeo', 928, 'GY'),
('HKG', 'Hong Kong', 'Asia', 'Eastern Asia', 1075.00, NULL, 6782000, 79.5, 166448.00, 173610.00, 'Xianggang/Hong Kong', 'Special Administrative Region of China', 'Jiang Zemin', 937, 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'Antarctica', 'Antarctica', 359.00, NULL, 0, NULL, 0.00, NULL, 'Heard and McDonald Islands', 'Territory of Australia', 'Elisabeth II', NULL, 'HM'),
('HND', 'Honduras', 'North America', 'Central America', 112088.00, 1838, 6485000, 69.9, 5333.00, 4697.00, 'Honduras', 'Republic', 'Carlos Roberto Flores Facussé', 933, 'HN'),
('HRV', 'Croatia', 'Europe', 'Southern Europe', 56538.00, 1991, 4473000, 73.7, 20208.00, 19300.00, 'Hrvatska', 'Republic', 'Štipe Mesic', 2409, 'HR'),
('HTI', 'Haiti', 'North America', 'Caribbean', 27750.00, 1804, 8222000, 49.2, 3459.00, 3107.00, 'Haïti/Dayti', 'Republic', 'Jean-Bertrand Aristide', 929, 'HT'),
('HUN', 'Hungary', 'Europe', 'Eastern Europe', 93030.00, 1918, 10043200, 71.4, 48267.00, 45914.00, 'Magyarország', 'Republic', 'Ferenc Mádl', 3483, 'HU'),
('IDN', 'Indonesia', 'Asia', 'Southeast Asia', 1904569.00, 1945, 212107000, 68.0, 84982.00, 215002.00, 'Indonesia', 'Republic', 'Abdurrahman Wahid', 939, 'ID'),
('IND', 'India', 'Asia', 'Southern and Central Asia', 3287263.00, 1947, 1013662000, 62.5, 447114.00, 430572.00, 'Bharat/India', 'Federal Republic', 'Kocheril Raman Narayanan', 1109, 'IN'),
('IOT', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', 78.00, NULL, 0, NULL, 0.00, NULL, 'British Indian Ocean Territory', 'Dependent Territory of the UK', 'Elisabeth II', NULL, 'IO'),
('IRL', 'Ireland', 'Europe', 'British Islands', 70273.00, 1921, 3775100, 76.8, 75921.00, 73132.00, 'Ireland/Éire', 'Republic', 'Mary McAleese', 1447, 'IE'),
('IRN', 'Iran', 'Asia', 'Southern and Central Asia', 1648195.00, 1906, 67702000, 69.7, 195746.00, 160151.00, 'Iran', 'Islamic Republic', 'Ali Mohammad Khatami-Ardakani', 1380, 'IR'),
('IRQ', 'Iraq', 'Asia', 'Middle East', 438317.00, 1932, 23115000, 66.5, 11500.00, NULL, 'Al-´Iraq', 'Republic', 'Saddam Hussein al-Takriti', 1365, 'IQ'),
('ISL', 'Iceland', 'Europe', 'Nordic Countries', 103000.00, 1944, 279000, 79.4, 8255.00, 7474.00, 'Ísland', 'Republic', 'Ólafur Ragnar Grímsson', 1449, 'IS'),
('ISR', 'Israel', 'Asia', 'Middle East', 21056.00, 1948, 6217000, 78.6, 97477.00, 98577.00, 'Yisra’el/Isra’il', 'Republic', 'Moshe Katzav', 1450, 'IL'),
('ITA', 'Italy', 'Europe', 'Southern Europe', 301316.00, 1861, 57680000, 79.0, 1161755.00, 1145372.00, 'Italia', 'Republic', 'Carlo Azeglio Ciampi', 1464, 'IT'),
('JAM', 'Jamaica', 'North America', 'Caribbean', 10990.00, 1962, 2583000, 75.2, 6871.00, 6722.00, 'Jamaica', 'Constitutional Monarchy', 'Elisabeth II', 1530, 'JM'),
('JOR', 'Jordan', 'Asia', 'Middle East', 88946.00, 1946, 5083000, 77.4, 7526.00, 7051.00, 'Al-Urdunn', 'Constitutional Monarchy', 'Abdullah II', 1786, 'JO'),
('JPN', 'Japan', 'Asia', 'Eastern Asia', 377829.00, -660, 126714000, 80.7, 3787042.00, 4192638.00, 'Nihon/Nippon', 'Constitutional Monarchy', 'Akihito', 1532, 'JP'),
('KAZ', 'Kazakstan', 'Asia', 'Southern and Central Asia', 2724900.00, 1991, 16223000, 63.2, 24375.00, 23383.00, 'Qazaqstan', 'Republic', 'Nursultan Nazarbajev', 1864, 'KZ'),
('KEN', 'Kenya', 'Africa', 'Eastern Africa', 580367.00, 1963, 30080000, 48.0, 9217.00, 10241.00, 'Kenya', 'Republic', 'Daniel arap Moi', 1881, 'KE'),
('KGZ', 'Kyrgyzstan', 'Asia', 'Southern and Central Asia', 199900.00, 1991, 4699000, 63.4, 1626.00, 1767.00, 'Kyrgyzstan', 'Republic', 'Askar Akajev', 2253, 'KG'),
('KHM', 'Cambodia', 'Asia', 'Southeast Asia', 181035.00, 1953, 11168000, 56.5, 5121.00, 5670.00, 'Kâmpuchéa', 'Constitutional Monarchy', 'Norodom Sihanouk', 1800, 'KH'),
('KIR', 'Kiribati', 'Oceania', 'Micronesia', 726.00, 1979, 83000, 59.8, 40.70, NULL, 'Kiribati', 'Republic', 'Teburoro Tito', 2256, 'KI'),
('KNA', 'Saint Kitts and Nevis', 'North America', 'Caribbean', 261.00, 1983, 38000, 70.7, 299.00, NULL, 'Saint Kitts and Nevis', 'Constitutional Monarchy', 'Elisabeth II', 3064, 'KN'),
('KOR', 'South Korea', 'Asia', 'Eastern Asia', 99434.00, 1948, 46844000, 74.4, 320749.00, 442544.00, 'Taehan Min’guk (Namhan)', 'Republic', 'Kim Dae-jung', 2331, 'KR'),
('KWT', 'Kuwait', 'Asia', 'Middle East', 17818.00, 1961, 1972000, 76.1, 27037.00, 30373.00, 'Al-Kuwayt', 'Constitutional Monarchy (Emirate)', 'Jabir al-Ahmad al-Jabir al-Sabah', 2429, 'KW'),
('LAO', 'Laos', 'Asia', 'Southeast Asia', 236800.00, 1953, 5433000, 53.1, 1292.00, 1746.00, 'Lao', 'Republic', 'Khamtay Siphandone', 2432, 'LA'),
('LBN', 'Lebanon', 'Asia', 'Middle East', 10400.00, 1941, 3282000, 71.3, 17121.00, 15129.00, 'Lubnan', 'Republic', 'Émile Lahoud', 2438, 'LB'),
('LBR', 'Liberia', 'Africa', 'Western Africa', 111369.00, 1847, 3154000, 51.0, 2012.00, NULL, 'Liberia', 'Republic', 'Charles Taylor', 2440, 'LR'),
('LBY', 'Libyan Arab Jamahiriya', 'Africa', 'Northern Africa', 1759540.00, 1951, 5605000, 75.5, 44806.00, 40562.00, 'Libiya', 'Socialistic State', 'Muammar al-Qadhafi', 2441, 'LY'),
('LCA', 'Saint Lucia', 'North America', 'Caribbean', 622.00, 1979, 154000, 72.3, 571.00, NULL, 'Saint Lucia', 'Constitutional Monarchy', 'Elisabeth II', 3065, 'LC'),
('LIE', 'Liechtenstein', 'Europe', 'Western Europe', 160.00, 1806, 32300, 78.8, 1119.00, 1084.00, 'Liechtenstein', 'Constitutional Monarchy', 'Hans-Adam II', 2446, 'LI'),
('LKA', 'Sri Lanka', 'Asia', 'Southern and Central Asia', 65610.00, 1948, 18827000, 71.8, 15706.00, 15091.00, 'Sri Lanka/Ilankai', 'Republic', 'Chandrika Kumaratunga', 3217, 'LK'),
('LSO', 'Lesotho', 'Africa', 'Southern Africa', 30355.00, 1966, 2153000, 50.8, 1061.00, 1161.00, 'Lesotho', 'Constitutional Monarchy', 'Letsie III', 2437, 'LS'),
('LTU', 'Lithuania', 'Europe', 'Baltic Countries', 65301.00, 1991, 3698500, 69.1, 10692.00, 9585.00, 'Lietuva', 'Republic', 'Valdas Adamkus', 2447, 'LT'),
('LUX', 'Luxembourg', 'Europe', 'Western Europe', 2586.00, 1867, 435700, 77.1, 16321.00, 15519.00, 'Luxembourg/Lëtzebuerg', 'Constitutional Monarchy', 'Henri', 2452, 'LU'),
('LVA', 'Latvia', 'Europe', 'Baltic Countries', 64589.00, 1991, 2424200, 68.4, 6398.00, 5639.00, 'Latvija', 'Republic', 'Vaira Vike-Freiberga', 2434, 'LV'),
('MAC', 'Macao', 'Asia', 'Eastern Asia', 18.00, NULL, 473000, 81.6, 5749.00, 5940.00, 'Macau/Aomen', 'Special Administrative Region of China', 'Jiang Zemin', 2454, 'MO'),
('MAR', 'Morocco', 'Africa', 'Northern Africa', 446550.00, 1956, 28351000, 69.1, 36124.00, 33514.00, 'Al-Maghrib', 'Constitutional Monarchy', 'Mohammed VI', 2486, 'MA'),
('MCO', 'Monaco', 'Europe', 'Western Europe', 1.50, 1861, 34000, 78.8, 776.00, NULL, 'Monaco', 'Constitutional Monarchy', 'Rainier III', 2695, 'MC'),
('MDA', 'Moldova', 'Europe', 'Eastern Europe', 33851.00, 1991, 4380000, 64.5, 1579.00, 1872.00, 'Moldova', 'Republic', 'Vladimir Voronin', 2690, 'MD'),
('MDG', 'Madagascar', 'Africa', 'Eastern Africa', 587041.00, 1960, 15942000, 55.0, 3750.00, 3545.00, 'Madagasikara/Madagascar', 'Federal Republic', 'Didier Ratsiraka', 2455, 'MG'),
('MDV', 'Maldives', 'Asia', 'Southern and Central Asia', 298.00, 1965, 286000, 62.2, 199.00, NULL, 'Dhivehi Raajje/Maldives', 'Republic', 'Maumoon Abdul Gayoom', 2463, 'MV'),
('MEX', 'Mexico', 'North America', 'Central America', 1958201.00, 1810, 98881000, 71.5, 414972.00, 401461.00, 'México', 'Federal Republic', 'Vicente Fox Quesada', 2515, 'MX'),
('MHL', 'Marshall Islands', 'Oceania', 'Micronesia', 181.00, 1990, 64000, 65.5, 97.00, NULL, 'Marshall Islands/Majol', 'Republic', 'Kessai Note', 2507, 'MH'),
('MKD', 'Macedonia', 'Europe', 'Southern Europe', 25713.00, 1991, 2024000, 73.8, 1694.00, 1915.00, 'Makedonija', 'Republic', 'Boris Trajkovski', 2460, 'MK'),
('MLI', 'Mali', 'Africa', 'Western Africa', 1240192.00, 1960, 11234000, 46.7, 2642.00, 2453.00, 'Mali', 'Republic', 'Alpha Oumar Konaré', 2482, 'ML'),
('MLT', 'Malta', 'Europe', 'Southern Europe', 316.00, 1964, 380200, 77.9, 3512.00, 3338.00, 'Malta', 'Republic', 'Guido de Marco', 2484, 'MT'),
('MMR', 'Myanmar', 'Asia', 'Southeast Asia', 676578.00, 1948, 45611000, 54.9, 180375.00, 171028.00, 'Myanma Pye', 'Republic', 'kenraali Than Shwe', 2710, 'MM'),
('MNG', 'Mongolia', 'Asia', 'Eastern Asia', 1566500.00, 1921, 2662000, 67.3, 1043.00, 933.00, 'Mongol Uls', 'Republic', 'Natsagiin Bagabandi', 2696, 'MN'),
('MNP', 'Northern Mariana Islands', 'Oceania', 'Micronesia', 464.00, NULL, 78000, 75.5, 0.00, NULL, 'Northern Mariana Islands', 'Commonwealth of the US', 'George W. Bush', 2913, 'MP'),
('MOZ', 'Mozambique', 'Africa', 'Eastern Africa', 801590.00, 1975, 19680000, 37.5, 2891.00, 2711.00, 'Moçambique', 'Republic', 'Joaquím A. Chissano', 2698, 'MZ'),
('MRT', 'Mauritania', 'Africa', 'Western Africa', 1025520.00, 1960, 2670000, 50.8, 998.00, 1081.00, 'Muritaniya/Mauritanie', 'Republic', 'Maaouiya Ould Sid´Ahmad Taya', 2509, 'MR'),
('MSR', 'Montserrat', 'North America', 'Caribbean', 102.00, NULL, 11000, 78.0, 109.00, NULL, 'Montserrat', 'Dependent Territory of the UK', 'Elisabeth II', 2697, 'MS'),
('MTQ', 'Martinique', 'North America', 'Caribbean', 1102.00, NULL, 395000, 78.3, 2731.00, 2559.00, 'Martinique', 'Overseas Department of France', 'Jacques Chirac', 2508, 'MQ'),
('MUS', 'Mauritius', 'Africa', 'Eastern Africa', 2040.00, 1968, 1158000, 71.0, 4251.00, 4186.00, 'Mauritius', 'Republic', 'Cassam Uteem', 2511, 'MU'),
('MWI', 'Malawi', 'Africa', 'Eastern Africa', 118484.00, 1964, 10925000, 37.6, 1687.00, 2527.00, 'Malawi', 'Republic', 'Bakili Muluzi', 2462, 'MW'),
('MYS', 'Malaysia', 'Asia', 'Southeast Asia', 329758.00, 1957, 22244000, 70.8, 69213.00, 97884.00, 'Malaysia', 'Constitutional Monarchy, Federation', 'Salahuddin Abdul Aziz Shah Alhaj', 2464, 'MY'),
('MYT', 'Mayotte', 'Africa', 'Eastern Africa', 373.00, NULL, 149000, 59.5, 0.00, NULL, 'Mayotte', 'Territorial Collectivity of France', 'Jacques Chirac', 2514, 'YT'),
('NAM', 'Namibia', 'Africa', 'Southern Africa', 824292.00, 1990, 1726000, 42.5, 3101.00, 3384.00, 'Namibia', 'Republic', 'Sam Nujoma', 2726, 'NA'),
('NCL', 'New Caledonia', 'Oceania', 'Melanesia', 18575.00, NULL, 214000, 72.8, 3563.00, NULL, 'Nouvelle-Calédonie', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3493, 'NC'),
('NER', 'Niger', 'Africa', 'Western Africa', 1267000.00, 1960, 10730000, 41.3, 1706.00, 1580.00, 'Niger', 'Republic', 'Mamadou Tandja', 2738, 'NE'),
('NFK', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', 36.00, NULL, 2000, NULL, 0.00, NULL, 'Norfolk Island', 'Territory of Australia', 'Elisabeth II', 2806, 'NF'),
('NGA', 'Nigeria', 'Africa', 'Western Africa', 923768.00, 1960, 111506000, 51.6, 65707.00, 58623.00, 'Nigeria', 'Federal Republic', 'Olusegun Obasanjo', 2754, 'NG'),
('NIC', 'Nicaragua', 'North America', 'Central America', 130000.00, 1838, 5074000, 68.7, 1988.00, 2023.00, 'Nicaragua', 'Republic', 'Arnoldo Alemán Lacayo', 2734, 'NI'),
('NIU', 'Niue', 'Oceania', 'Polynesia', 260.00, NULL, 2000, NULL, 0.00, NULL, 'Niue', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 2805, 'NU'),
('NLD', 'Netherlands', 'Europe', 'Western Europe', 41526.00, 1581, 15864000, 78.3, 371362.00, 360478.00, 'Nederland', 'Constitutional Monarchy', 'Beatrix', 5, 'NL'),
('NOR', 'Norway', 'Europe', 'Nordic Countries', 323877.00, 1905, 4478500, 78.7, 145895.00, 153370.00, 'Norge', 'Constitutional Monarchy', 'Harald V', 2807, 'NO'),
('NPL', 'Nepal', 'Asia', 'Southern and Central Asia', 147181.00, 1769, 23930000, 57.8, 4768.00, 4837.00, 'Nepal', 'Constitutional Monarchy', 'Gyanendra Bir Bikram', 2729, 'NP'),
('NRU', 'Nauru', 'Oceania', 'Micronesia', 21.00, 1968, 12000, 60.8, 197.00, NULL, 'Naoero/Nauru', 'Republic', 'Bernard Dowiyogo', 2728, 'NR'),
('NZL', 'New Zealand', 'Oceania', 'Australia and New Zealand', 270534.00, 1907, 3862000, 77.8, 54669.00, 64960.00, 'New Zealand/Aotearoa', 'Constitutional Monarchy', 'Elisabeth II', 3499, 'NZ'),
('OMN', 'Oman', 'Asia', 'Middle East', 309500.00, 1951, 2542000, 71.8, 16904.00, 16153.00, '´Uman', 'Monarchy (Sultanate)', 'Qabus ibn Sa´id', 2821, 'OM'),
('PAK', 'Pakistan', 'Asia', 'Southern and Central Asia', 796095.00, 1947, 156483000, 61.1, 61289.00, 58549.00, 'Pakistan', 'Republic', 'Mohammad Rafiq Tarar', 2831, 'PK'),
('PAN', 'Panama', 'North America', 'Central America', 75517.00, 1903, 2856000, 75.5, 9131.00, 8700.00, 'Panamá', 'Republic', 'Mireya Elisa Moscoso Rodríguez', 2882, 'PA'),
('PCN', 'Pitcairn', 'Oceania', 'Polynesia', 49.00, NULL, 50, NULL, 0.00, NULL, 'Pitcairn', 'Dependent Territory of the UK', 'Elisabeth II', 2912, 'PN'),
('PER', 'Peru', 'South America', 'South America', 1285216.00, 1821, 25662000, 70.0, 64140.00, 65186.00, 'Perú/Piruw', 'Republic', 'Valentin Paniagua Corazao', 2890, 'PE'),
('PHL', 'Philippines', 'Asia', 'Southeast Asia', 300000.00, 1946, 75967000, 67.5, 65107.00, 82239.00, 'Pilipinas', 'Republic', 'Gloria Macapagal-Arroyo', 766, 'PH'),
('PLW', 'Palau', 'Oceania', 'Micronesia', 459.00, 1994, 19000, 68.6, 105.00, NULL, 'Belau/Palau', 'Republic', 'Kuniwo Nakamura', 2881, 'PW'),
('PNG', 'Papua New Guinea', 'Oceania', 'Melanesia', 462840.00, 1975, 4807000, 63.1, 4988.00, 6328.00, 'Papua New Guinea/Papua Niugini', 'Constitutional Monarchy', 'Elisabeth II', 2884, 'PG'),
('POL', 'Poland', 'Europe', 'Eastern Europe', 323250.00, 1918, 38653600, 73.2, 151697.00, 135636.00, 'Polska', 'Republic', 'Aleksander Kwasniewski', 2928, 'PL'),
('PRI', 'Puerto Rico', 'North America', 'Caribbean', 8875.00, NULL, 3869000, 75.6, 34100.00, 32100.00, 'Puerto Rico', 'Commonwealth of the US', 'George W. Bush', 2919, 'PR'),
('PRK', 'North Korea', 'Asia', 'Eastern Asia', 120538.00, 1948, 24039000, 70.7, 5332.00, NULL, 'Choson Minjujuui In´min Konghwaguk (Bukhan)', 'Socialistic Republic', 'Kim Jong-il', 2318, 'KP'),
('PRT', 'Portugal', 'Europe', 'Southern Europe', 91982.00, 1143, 9997600, 75.8, 105954.00, 102133.00, 'Portugal', 'Republic', 'Jorge Sampãio', 2914, 'PT'),
('PRY', 'Paraguay', 'South America', 'South America', 406752.00, 1811, 5496000, 73.7, 8444.00, 9555.00, 'Paraguay', 'Republic', 'Luis Ángel González Macchi', 2885, 'PY'),
('PSE', 'Palestine', 'Asia', 'Middle East', 6257.00, NULL, 3101000, 71.4, 4173.00, NULL, 'Filastin', 'Autonomous Area', 'Yasser (Yasir) Arafat', 4074, 'PS'),
('PYF', 'French Polynesia', 'Oceania', 'Polynesia', 4000.00, NULL, 235000, 74.8, 818.00, 781.00, 'Polynésie française', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3016, 'PF'),
('QAT', 'Qatar', 'Asia', 'Middle East', 11000.00, 1971, 599000, 72.4, 9472.00, 8920.00, 'Qatar', 'Monarchy', 'Hamad ibn Khalifa al-Thani', 2973, 'QA'),
('REU', 'Réunion', 'Africa', 'Eastern Africa', 2510.00, NULL, 699000, 72.7, 8287.00, 7988.00, 'Réunion', 'Overseas Department of France', 'Jacques Chirac', 3017, 'RE'),
('ROM', 'Romania', 'Europe', 'Eastern Europe', 238391.00, 1878, 22455500, 69.9, 38158.00, 34843.00, 'România', 'Republic', 'Ion Iliescu', 3018, 'RO'),
('RUS', 'Russian Federation', 'Europe', 'Eastern Europe', 17075400.00, 1991, 146934000, 67.2, 276608.00, 442989.00, 'Rossija', 'Federal Republic', 'Vladimir Putin', 3580, 'RU'),
('RWA', 'Rwanda', 'Africa', 'Eastern Africa', 26338.00, 1962, 7733000, 39.3, 2036.00, 1863.00, 'Rwanda/Urwanda', 'Republic', 'Paul Kagame', 3047, 'RW'),
('SAU', 'Saudi Arabia', 'Asia', 'Middle East', 2149690.00, 1932, 21607000, 67.8, 137635.00, 146171.00, 'Al-´Arabiya as-Sa´udiya', 'Monarchy', 'Fahd ibn Abdul-Aziz al-Sa´ud', 3173, 'SA'),
('SDN', 'Sudan', 'Africa', 'Northern Africa', 2505813.00, 1956, 29490000, 56.6, 10162.00, NULL, 'As-Sudan', 'Islamic Republic', 'Omar Hassan Ahmad al-Bashir', 3225, 'SD'),
('SEN', 'Senegal', 'Africa', 'Western Africa', 196722.00, 1960, 9481000, 62.2, 4787.00, 4542.00, 'Sénégal/Sounougal', 'Republic', 'Abdoulaye Wade', 3198, 'SN'),
('SGP', 'Singapore', 'Asia', 'Southeast Asia', 618.00, 1965, 3567000, 80.1, 86503.00, 96318.00, 'Singapore/Singapura/Xinjiapo/Singapur', 'Republic', 'Sellapan Rama Nathan', 3208, 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 'Antarctica', 3903.00, NULL, 0, NULL, 0.00, NULL, 'South Georgia and the South Sandwich Islands', 'Dependent Territory of the UK', 'Elisabeth II', NULL, 'GS'),
('SHN', 'Saint Helena', 'Africa', 'Western Africa', 314.00, NULL, 6000, 76.8, 0.00, NULL, 'Saint Helena', 'Dependent Territory of the UK', 'Elisabeth II', 3063, 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'Europe', 'Nordic Countries', 62422.00, NULL, 3200, NULL, 0.00, NULL, 'Svalbard og Jan Mayen', 'Dependent Territory of Norway', 'Harald V', 938, 'SJ'),
('SLB', 'Solomon Islands', 'Oceania', 'Melanesia', 28896.00, 1978, 444000, 71.3, 182.00, 220.00, 'Solomon Islands', 'Constitutional Monarchy', 'Elisabeth II', 3161, 'SB'),
('SLE', 'Sierra Leone', 'Africa', 'Western Africa', 71740.00, 1961, 4854000, 45.3, 746.00, 858.00, 'Sierra Leone', 'Republic', 'Ahmed Tejan Kabbah', 3207, 'SL'),
('SLV', 'El Salvador', 'North America', 'Central America', 21041.00, 1841, 6276000, 69.7, 11863.00, 11203.00, 'El Salvador', 'Republic', 'Francisco Guillermo Flores Pérez', 645, 'SV'),
('SMR', 'San Marino', 'Europe', 'Southern Europe', 61.00, 885, 27000, 81.1, 510.00, NULL, 'San Marino', 'Republic', NULL, 3171, 'SM'),
('SOM', 'Somalia', 'Africa', 'Eastern Africa', 637657.00, 1960, 10097000, 46.2, 935.00, NULL, 'Soomaaliya', 'Republic', 'Abdiqassim Salad Hassan', 3214, 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'North America', 'North America', 242.00, NULL, 7000, 77.6, 0.00, NULL, 'Saint-Pierre-et-Miquelon', 'Territorial Collectivity of France', 'Jacques Chirac', 3067, 'PM'),
('STP', 'Sao Tome and Principe', 'Africa', 'Central Africa', 964.00, 1975, 147000, 65.3, 6.00, NULL, 'São Tomé e Príncipe', 'Republic', 'Miguel Trovoada', 3172, 'ST'),
('SUR', 'Suriname', 'South America', 'South America', 163265.00, 1975, 417000, 71.4, 870.00, 706.00, 'Suriname', 'Republic', 'Ronald Venetiaan', 3243, 'SR'),
('SVK', 'Slovakia', 'Europe', 'Eastern Europe', 49012.00, 1993, 5398700, 73.7, 20594.00, 19452.00, 'Slovensko', 'Republic', 'Rudolf Schuster', 3209, 'SK'),
('SVN', 'Slovenia', 'Europe', 'Southern Europe', 20256.00, 1991, 1987800, 74.9, 19756.00, 18202.00, 'Slovenija', 'Republic', 'Milan Kucan', 3212, 'SI'),
('SWE', 'Sweden', 'Europe', 'Nordic Countries', 449964.00, 836, 8861400, 79.6, 226492.00, 227757.00, 'Sverige', 'Constitutional Monarchy', 'Carl XVI Gustaf', 3048, 'SE'),
('SWZ', 'Swaziland', 'Africa', 'Southern Africa', 17364.00, 1968, 1008000, 40.4, 1206.00, 1312.00, 'kaNgwane', 'Monarchy', 'Mswati III', 3244, 'SZ'),
('SYC', 'Seychelles', 'Africa', 'Eastern Africa', 455.00, 1976, 77000, 70.4, 536.00, 539.00, 'Sesel/Seychelles', 'Republic', 'France-Albert René', 3206, 'SC'),
('SYR', 'Syria', 'Asia', 'Middle East', 185180.00, 1941, 16125000, 68.5, 65984.00, 64926.00, 'Suriya', 'Republic', 'Bashar al-Assad', 3250, 'SY'),
('TCA', 'Turks and Caicos Islands', 'North America', 'Caribbean', 430.00, NULL, 17000, 73.3, 96.00, NULL, 'The Turks and Caicos Islands', 'Dependent Territory of the UK', 'Elisabeth II', 3423, 'TC'),
('TCD', 'Chad', 'Africa', 'Central Africa', 1284000.00, 1960, 7651000, 50.5, 1208.00, 1102.00, 'Tchad/Tshad', 'Republic', 'Idriss Déby', 3337, 'TD'),
('TGO', 'Togo', 'Africa', 'Western Africa', 56785.00, 1960, 4629000, 54.7, 1449.00, 1400.00, 'Togo', 'Republic', 'Gnassingbé Eyadéma', 3332, 'TG'),
('THA', 'Thailand', 'Asia', 'Southeast Asia', 513115.00, 1350, 61399000, 68.6, 116416.00, 153907.00, 'Prathet Thai', 'Constitutional Monarchy', 'Bhumibol Adulyadej', 3320, 'TH'),
('TJK', 'Tajikistan', 'Asia', 'Southern and Central Asia', 143100.00, 1991, 6188000, 64.1, 1990.00, 1056.00, 'Toçikiston', 'Republic', 'Emomali Rahmonov', 3261, 'TJ'),
('TKL', 'Tokelau', 'Oceania', 'Polynesia', 12.00, NULL, 2000, NULL, 0.00, NULL, 'Tokelau', 'Nonmetropolitan Territory of New Zealand', 'Elisabeth II', 3333, 'TK'),
('TKM', 'Turkmenistan', 'Asia', 'Southern and Central Asia', 488100.00, 1991, 4459000, 60.9, 4397.00, 2000.00, 'Türkmenostan', 'Republic', 'Saparmurad Nijazov', 3419, 'TM'),
('TMP', 'East Timor', 'Asia', 'Southeast Asia', 14874.00, NULL, 885000, 46.0, 0.00, NULL, 'Timor Timur', 'Administrated by the UN', 'José Alexandre Gusmão', 1522, 'TP'),
('TON', 'Tonga', 'Oceania', 'Polynesia', 650.00, 1970, 99000, 67.9, 146.00, 170.00, 'Tonga', 'Monarchy', 'Taufa\'ahau Tupou IV', 3334, 'TO'),
('TTO', 'Trinidad and Tobago', 'North America', 'Caribbean', 5130.00, 1962, 1295000, 68.0, 6232.00, 5867.00, 'Trinidad and Tobago', 'Republic', 'Arthur N. R. Robinson', 3336, 'TT'),
('TUN', 'Tunisia', 'Africa', 'Northern Africa', 163610.00, 1956, 9586000, 73.7, 20026.00, 18898.00, 'Tunis/Tunisie', 'Republic', 'Zine al-Abidine Ben Ali', 3349, 'TN'),
('TUR', 'Turkey', 'Asia', 'Middle East', 774815.00, 1923, 66591000, 71.0, 210721.00, 189122.00, 'Türkiye', 'Republic', 'Ahmet Necdet Sezer', 3358, 'TR'),
('TUV', 'Tuvalu', 'Oceania', 'Polynesia', 26.00, 1978, 12000, 66.3, 6.00, NULL, 'Tuvalu', 'Constitutional Monarchy', 'Elisabeth II', 3424, 'TV'),
('TWN', 'Taiwan', 'Asia', 'Eastern Asia', 36188.00, 1945, 22256000, 76.4, 256254.00, 263451.00, 'T’ai-wan', 'Republic', 'Chen Shui-bian', 3263, 'TW'),
('TZA', 'Tanzania', 'Africa', 'Eastern Africa', 883749.00, 1961, 33517000, 52.3, 8005.00, 7388.00, 'Tanzania', 'Republic', 'Benjamin William Mkapa', 3306, 'TZ'),
('UGA', 'Uganda', 'Africa', 'Eastern Africa', 241038.00, 1962, 21778000, 42.9, 6313.00, 6887.00, 'Uganda', 'Republic', 'Yoweri Museveni', 3425, 'UG'),
('UKR', 'Ukraine', 'Europe', 'Eastern Europe', 603700.00, 1991, 50456000, 66.0, 42168.00, 49677.00, 'Ukrajina', 'Republic', 'Leonid Kutšma', 3426, 'UA'),
('UMI', 'United States Minor Outlying Islands', 'Oceania', 'Micronesia/Caribbean', 16.00, NULL, 0, NULL, 0.00, NULL, 'United States Minor Outlying Islands', 'Dependent Territory of the US', 'George W. Bush', NULL, 'UM'),
('URY', 'Uruguay', 'South America', 'South America', 175016.00, 1828, 3337000, 75.2, 20831.00, 19967.00, 'Uruguay', 'Republic', 'Jorge Batlle Ibáñez', 3492, 'UY'),
('USA', 'United States', 'North America', 'North America', 9363520.00, 1776, 278357000, 77.1, 8510700.00, 8110900.00, 'United States', 'Federal Republic', 'George W. Bush', 3813, 'US'),
('UZB', 'Uzbekistan', 'Asia', 'Southern and Central Asia', 447400.00, 1991, 24318000, 63.7, 14194.00, 21300.00, 'Uzbekiston', 'Republic', 'Islam Karimov', 3503, 'UZ'),
('VAT', 'Holy See (Vatican City State)', 'Europe', 'Southern Europe', 0.40, 1929, 1000, NULL, 9.00, NULL, 'Santa Sede/Città del Vaticano', 'Independent Church State', 'Johannes Paavali II', 3538, 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'North America', 'Caribbean', 388.00, 1979, 114000, 72.3, 285.00, NULL, 'Saint Vincent and the Grenadines', 'Constitutional Monarchy', 'Elisabeth II', 3066, 'VC'),
('VEN', 'Venezuela', 'South America', 'South America', 912050.00, 1811, 24170000, 73.1, 95023.00, 88434.00, 'Venezuela', 'Federal Republic', 'Hugo Chávez Frías', 3539, 'VE'),
('VGB', 'Virgin Islands, British', 'North America', 'Caribbean', 151.00, NULL, 21000, 75.4, 612.00, 573.00, 'British Virgin Islands', 'Dependent Territory of the UK', 'Elisabeth II', 537, 'VG'),
('VIR', 'Virgin Islands, U.S.', 'North America', 'Caribbean', 347.00, NULL, 93000, 78.1, 0.00, NULL, 'Virgin Islands of the United States', 'US Territory', 'George W. Bush', 4067, 'VI'),
('VNM', 'Vietnam', 'Asia', 'Southeast Asia', 331689.00, 1945, 79832000, 69.3, 21929.00, 22834.00, 'Viêt Nam', 'Socialistic Republic', 'Trân Duc Luong', 3770, 'VN'),
('VUT', 'Vanuatu', 'Oceania', 'Melanesia', 12189.00, 1980, 190000, 60.6, 261.00, 246.00, 'Vanuatu', 'Republic', 'John Bani', 3537, 'VU'),
('WLF', 'Wallis and Futuna', 'Oceania', 'Polynesia', 200.00, NULL, 15000, NULL, 0.00, NULL, 'Wallis-et-Futuna', 'Nonmetropolitan Territory of France', 'Jacques Chirac', 3536, 'WF'),
('WSM', 'Samoa', 'Oceania', 'Polynesia', 2831.00, 1962, 180000, 69.2, 141.00, 157.00, 'Samoa', 'Parlementary Monarchy', 'Malietoa Tanumafili II', 3169, 'WS'),
('YEM', 'Yemen', 'Asia', 'Middle East', 527968.00, 1918, 18112000, 59.8, 6041.00, 5729.00, 'Al-Yaman', 'Republic', 'Ali Abdallah Salih', 1780, 'YE'),
('YUG', 'Yugoslavia', 'Europe', 'Southern Europe', 102173.00, 1918, 10640000, 72.4, 17000.00, NULL, 'Jugoslavija', 'Federal Republic', 'Vojislav Koštunica', 1792, 'YU'),
('ZAF', 'South Africa', 'Africa', 'Southern Africa', 1221037.00, 1910, 40377000, 51.1, 116729.00, 129092.00, 'South Africa', 'Republic', 'Thabo Mbeki', 716, 'ZA'),
('ZMB', 'Zambia', 'Africa', 'Eastern Africa', 752618.00, 1964, 9169000, 37.2, 3377.00, 3922.00, 'Zambia', 'Republic', 'Frederick Chiluba', 3162, 'ZM'),
('ZWE', 'Zimbabwe', 'Africa', 'Eastern Africa', 390757.00, 1980, 11669000, 37.8, 5951.00, 8670.00, 'Zimbabwe', 'Republic', 'Robert G. Mugabe', 4068, 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `dropzone`
--

CREATE TABLE `dropzone` (
  `id` int(11) NOT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `label_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rotate` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `section`, `category`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'lessee', 'Getting Started', 'How does Rent a suit.com works?', '<b>5 easy steps :</b><br><br>\r\n\r\n1.	Complete your profile<br>\r\n2.	Sign waiver<br>\r\n3.	Shine\r\n<br>4.	Return item', '2018-04-03 11:12:43', '2018-06-28 05:08:21'),
(2, 'lessee', 'Getting Started', 'What is the cancellation policy?', '<b>Check how the Business partner’s profile set up the cancellation of the item you booked.</br></b>\r\n<u>Aggressive</u> – bookings may be canceled without penalty more than ten (10) days before\r\nthe beginning of the Rental Period;</br>\r\n<u>Moderate </u>- bookings may be canceled without penalty of more than six (6) days before the\r\nbeginning of the Rental Period.</br>\r\nIf the booking is canceled with less than ten (10) days for aggressive or less than six (6)\r\ndays for moderate cancelation option, Lessee will still need to pay 100% of the Rental Period\r\nFees minus any saved costs.', '2018-04-03 11:12:55', '2018-12-11 04:35:02'),
(4, 'lessee', 'Getting Started', 'What types of clothes do you have?', 'All clothing are good quality pre-owned or new/high end designer labels\r\nLadies wear, for business attire, such as Calvin Klein, Hugo Boss, Nanette, etc.', '2018-04-10 13:34:03', '2018-12-11 04:37:01'),
(7, 'lessee', 'Returning item', 'The outfit is damaged? What should I do?', '1. Complete the form and provide the reason\r\n<br>2. Take pictures of item and email it to Rentasuit\r\n<br>3. Return item to sender', '0000-00-00 00:00:00', '2018-06-28 05:01:34'),
(3, 'lessee', 'Getting Started', 'Do you buy items?', 'No. This site is specialized in renting high end and ladies wear clothes.\r\nIf your items are overused, you are welcome to make donations to <i>Rent a suit </i>who will offer them to different charities.', '2018-04-03 11:13:06', '2018-12-11 04:36:08'),
(6, 'lessee', 'Returning item', 'The item does not look like what I have seen on the site, what should I do?', '1. Complete the form and provide the reason\r\n<br>2. Take pictures of item and email it to Rentasuit\r\n<br>3. Return item to sender', '0000-00-00 00:00:00', '2018-06-28 05:01:15'),
(5, 'lessee', 'Returning item', 'I don’t like it, how do I return it?', '1. Complete the form and provide the reason<br>\r\n2. Return item to sender', '0000-00-00 00:00:00', '2018-06-28 05:08:34'),
(8, 'lessee', 'PAYMENT', 'What type of credit cards do you take?', 'Yes! We take Visa, Mastercard and Debit Cards (Bank Cards).', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'lessee', 'SHIPPING', 'Who pay for shipping?', 'You are responsible for the payment of shipping to receive the item. You will be able to select the type of shipping that will best fit your need.\r\nExpress or Regular mail.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'lessee', 'SHIPPING', 'Responsible Lessee', '•	It is important to return the item in the same condition you received it (clean, and not damaged).<br>\r\n•	It is important to return the item on time to avoid any penalties.', '0000-00-00 00:00:00', '2018-12-11 04:40:26'),
(11, 'lessee', 'Process', 'How does the shipping work?', 'When you are ready to return the item…\r\n<br>•	You will receive a notification with a label/link\r\n<br>•	You need to print out the label \r\n<br>•	Remove the old label on the box you received the item in and place the new label .\r\n<br>•	Ready to return it.\r\n<br>•	Go to the post office or contact UPS (extra fee apply)', '0000-00-00 00:00:00', '2018-06-28 05:09:25'),
(12, 'lessee', 'SHIPPING? REGULAR / EXPRESS', 'Why does the same item cost a different price?', 'The price you pay for  a package is determined by the weight, size and destination of your item. Add-on options such as additional insurance or speeding of the delivery also affect cost.', '0000-00-00 00:00:00', '2018-06-28 05:09:44'),
(14, 'lessor', 'Deciding to rent(PROCESS)', 'How does Rent a suit.com works?', '<b>5 easy steps :</b><br>\r\n\r\n<br>1.    Complete your profile\r\n<br>2.	Verify your ID\r\n<br>3.	Post your item pictures\r\n<br>4.	Send your items\r\n<br>5.	Write review when your items are returned', '0000-00-00 00:00:00', '2018-06-28 05:15:33'),
(15, 'lessor', 'Deciding to rent\r\n(PROCESS)\r\n', 'How can I get great pictures?', 'High-resolution photographs that showcase your clothes are an important way to make your listing appealing to clients and to help build trust within the Rent a suit community.\r\nAvoid heavy background to display your items.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'lessor', 'Deciding to rent (PROCESS)', 'What types of clothes do you take?', 'We accept high-end brand name for business attire such as Hugo Boss, Calvin Klein, Armani, etc.', '0000-00-00 00:00:00', '2018-12-11 04:26:57'),
(17, 'lessor', 'Deciding to rent\r\n(PROCESS)\r\n', 'Clothes condition before submitting', 'All items must be in good condition, clean, laundered or dry cleaned. Items should be no more than 4 years old.. Exceptions may apply to classic pieces (e.g.: Christan Dior, Chanel, etc)\r\nAs a reference, we do not accept clothes that are:\r\n<br>•	Stained\r\n<br>•	Damaged\r\n<br>•	Missing or broken  Zipper\r\n<br>•	Smells \r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'lessor', 'Deciding to rent\r\n(PROCESS)\r\n', 'Do you buy items?', 'No. This site is specialized in renting high end clothes for work.\r\nIf your items are overused, you are welcome to make donations to Rent my suit who will offer them to different charities.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'lessor', 'Deciding to rent(PROCESS)', 'Why renting?', 'Renting will open up a world of opportunity.  Earn money sharing your used clothes or the one you left in the closet.', '0000-00-00 00:00:00', '2018-11-21 21:24:30'),
(20, 'lessor', 'Deciding to rent(PROCESS)', 'How can I rent the clothes?', 'Almost anyone can do it!<br><br><br>\r\nThe registration is free. You just need to sign up and display your high end quality clothes.', '0000-00-00 00:00:00', '2018-06-28 05:10:02'),
(21, 'lessor', 'Business Partner Standards', 'Responsible business partner', 'It is important to build a strong community built on trust and honesty. The clothes need to be slightly worn and in good condition.', '0000-00-00 00:00:00', '2018-12-11 04:27:56'),
(22, 'lessor', 'Getting paid', 'How do I get paid?', 'When the client confirms the booking of the item and the client is fully satisfied by the item she received, then the payment will be automatic within a few days.\r\nYou will receive an email to confirm that the payment has been made.', '0000-00-00 00:00:00', '2018-12-11 04:29:29'),
(23, 'lessor', 'Getting paid', 'What type of credit cards do you take?', 'Yes! We take Visa, MasterCard and Debit Cards (Bank Cards), and PayPal.', '0000-00-00 00:00:00', '2018-06-28 07:26:16'),
(24, 'lessor', 'shipping', 'Who is paying for shipping?', 'The Lessor will select (Express or Regular mail or localizaition) and pay for the shipping if applicable.\r\nYou will also select the type of shipping you want within your profile.', '0000-00-00 00:00:00', '2018-12-11 04:38:34'),
(25, 'lessor', 'shipping', 'How does the shipping work?', '•	When you get a booking for one of your items, you will automatically receive a notification on the preferred method of shipping  selected by the Lesser.\r\n<br>•	Then, within 15 min,  You will receive a link/label to be printed and put on the box for shipping.', '0000-00-00 00:00:00', '2018-06-28 07:24:51'),
(26, 'lessor', 'returning', 'The outfit was returned damaged. What should I do?', '1.	Take pictures of the item\r\n<br>2.	Report the damage to Rent a suit.com\r\n<br>3.	Write a review about the client and the item', '0000-00-00 00:00:00', '2018-06-28 05:12:14'),
(27, 'lessor', 'List your clothes', 'How much should I charge?', 'We suggest that you rent your item less than $10/day.', '0000-00-00 00:00:00', '2018-06-28 05:18:26'),
(28, 'lessor', 'List your clothes', 'Can I list multiple items?', 'You are welcome to list more than 1 item,<br><br>\r\nMake sure that they are in good condition.', '0000-00-00 00:00:00', '2018-12-11 04:39:50'),
(29, 'lessor', 'List your clothes', 'How do I edit my listing?', 'Go back to the item you need to edit.<br><br>\r\nClick on “edit item” and make the necessary changes.', '0000-00-00 00:00:00', '2018-06-28 05:18:45'),
(30, 'lessor', 'Review', 'How does it work?', 'When you receive the item back, you can rate the item  cleanness , timing, communication, etc.', '0000-00-00 00:00:00', '2018-06-28 05:13:21'),
(31, 'lessor', 'Review', 'Why are there reviews?', 'Feedbacks are meant to be constructive in order to offer better and stronger experience to all of us.', '0000-00-00 00:00:00', '2018-06-28 05:13:34'),
(32, 'lessor', 'Review', 'Can I delete a review?', 'Unfortunately it is not possible to. delete any reviews. We believe in open communication, honesty and trust. The community is built with people’s suggestions, comments and reactions.', '0000-00-00 00:00:00', '2018-06-28 07:25:06'),
(33, 'lessor', 'Review', 'Can I reply to a review?', 'Totally.  We encourage you to reply respectfully to the person writing the review. It will create a healthy learning experience to all of us.', '0000-00-00 00:00:00', '2018-06-28 05:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `room_id` int(11) UNSIGNED NOT NULL,
  `from_user_id` int(11) UNSIGNED NOT NULL COMMENT 'sender',
  `to_user_id` int(11) UNSIGNED NOT NULL COMMENT 'reciever',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = unread | 1 = read',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `room_id`, `from_user_id`, `to_user_id`, `content`, `status`, `updated_at`, `created_at`) VALUES
(1, 1, 374, 376, 'HI HOW ARE YOU', 0, '2018-11-30 09:40:10', '2018-11-30 09:40:10'),
(2, 1, 374, 374, 'HI HOW ARE YOU', 1, '2018-11-30 09:40:10', '2018-11-30 09:40:10'),
(3, 1, 374, 376, 'HELLO', 0, '2018-11-30 09:40:51', '2018-11-30 09:40:51'),
(4, 1, 374, 374, 'HELLO', 1, '2018-11-30 09:40:51', '2018-11-30 09:40:51'),
(5, 1, 374, 376, 'HELLO TDRD RTYY', 0, '2018-11-30 09:42:03', '2018-11-30 09:42:03'),
(6, 1, 374, 374, 'HELLO TDRD RTYY', 1, '2018-11-30 09:42:03', '2018-11-30 09:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `messages_room`
--

CREATE TABLE `messages_room` (
  `id` int(11) UNSIGNED NOT NULL,
  `md5_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages_room`
--

INSERT INTO `messages_room` (`id`, `md5_id`, `creator_id`, `updated_at`, `created_at`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 374, '2018-11-30 09:40:10', '2018-11-30 09:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_latter`
--

CREATE TABLE `news_latter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) UNSIGNED NOT NULL,
  `for_user` int(11) UNSIGNED NOT NULL,
  `from_user` int(11) UNSIGNED NOT NULL,
  `rent_id` int(11) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `response` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `read` tinyint(1) DEFAULT NULL,
  `status` int(11) UNSIGNED NOT NULL COMMENT '0 = unread | 1 = read',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `for_user`, `from_user`, `rent_id`, `title`, `message`, `type`, `response`, `read`, `status`, `updated_at`, `created_at`) VALUES
(4, 208, 212, 2, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-12 14:38:35', '2018-04-12 14:38:35'),
(5, 212, 208, 2, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-04-12 14:38:50', '2018-04-12 14:38:50'),
(6, 208, 212, 2, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', NULL, 0, '2018-04-12 14:45:53', '2018-04-12 14:45:53'),
(7, 215, 212, 3, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-12 19:44:25', '2018-04-12 19:44:25'),
(8, 212, 215, 3, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-04-12 19:47:01', '2018-04-12 19:47:01'),
(9, 215, 212, 3, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', NULL, 0, '2018-04-12 19:49:47', '2018-04-12 19:49:47'),
(13, 212, 220, 5, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-13 12:55:18', '2018-04-13 12:55:18'),
(14, 220, 212, 5, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-04-13 12:56:04', '2018-04-13 12:56:04'),
(15, 212, 220, 5, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', NULL, 0, '2018-04-13 12:59:11', '2018-04-13 12:59:11'),
(16, 212, 220, 5, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', NULL, 0, '2018-04-13 12:59:13', '2018-04-13 12:59:13'),
(17, 212, 220, 6, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-13 13:07:25', '2018-04-13 13:07:25'),
(18, 220, 212, 6, 'Declined your rental request', 'Declined your rental request', 'decline', '', NULL, 0, '2018-04-13 13:07:44', '2018-04-13 13:07:44'),
(19, 212, 220, 7, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-13 13:08:52', '2018-04-13 13:08:52'),
(20, 220, 212, 7, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-04-13 13:09:14', '2018-04-13 13:09:14'),
(21, 212, 220, 7, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-04-13 13:09:32', '2018-04-13 13:09:32'),
(22, 212, 224, 8, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-16 14:40:51', '2018-04-16 14:40:51'),
(23, 212, 224, 8, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-04-16 15:20:58', '2018-04-16 15:20:58'),
(24, 212, 224, 10, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-16 16:43:02', '2018-04-16 16:43:02'),
(25, 212, 225, 11, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-16 17:45:17', '2018-04-16 17:45:17'),
(26, 212, 225, 11, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-04-16 23:26:54', '2018-04-16 23:26:54'),
(27, 212, 301, 12, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-04-26 15:49:14', '2018-04-26 15:49:14'),
(28, 212, 301, 12, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-04-26 15:49:48', '2018-04-26 15:49:48'),
(29, 215, 306, 13, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-05-08 16:01:02', '2018-05-08 16:01:02'),
(30, 212, 310, 14, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-05-11 13:37:14', '2018-05-11 13:37:14'),
(31, 306, 310, 15, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-05-11 13:54:00', '2018-05-11 13:54:00'),
(32, 309, 312, 16, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-05-11 21:23:17', '2018-05-11 21:23:17'),
(33, 306, 312, 17, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-05-11 21:29:04', '2018-05-11 21:29:04'),
(34, 306, 312, 17, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-05-11 21:32:21', '2018-05-11 21:32:21'),
(40, 217, 217, 20, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:01', '2018-06-28 05:10:06'),
(41, 217, 217, 21, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:01', '2018-07-04 07:14:31'),
(42, 217, 217, 23, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:12', '2018-07-04 07:14:37'),
(43, 217, 217, 24, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:12', '2018-07-07 01:42:36'),
(44, 217, 217, 25, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:09', '2018-07-07 01:42:42'),
(45, 217, 217, 26, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:44', '2018-07-07 01:42:47'),
(46, 217, 217, 25, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2019-10-23 04:37:44', '2018-07-11 03:55:33'),
(47, 217, 217, 27, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:44', '2018-07-12 02:52:46'),
(48, 217, 217, 28, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:44', '2018-07-12 03:21:23'),
(49, 217, 217, 29, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:44', '2018-07-18 04:18:01'),
(50, 217, 217, 30, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:44', '2018-07-18 04:18:06'),
(51, 217, 217, 31, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:12', '2018-07-18 04:18:11'),
(52, 217, 217, 32, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:12', '2018-07-18 04:37:15'),
(53, 217, 217, 33, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:12', '2018-07-18 04:42:44'),
(58, 217, 217, 34, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:12', '2018-07-23 11:23:37'),
(59, 217, 217, 38, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:37:12', '2018-07-23 11:31:33'),
(60, 217, 217, 39, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-07-23 11:31:46', '2018-07-23 11:31:46'),
(61, 217, 217, 40, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-07-24 05:28:20', '2018-07-24 05:28:20'),
(62, 217, 208, 41, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-07-27 20:13:04', '2018-07-27 20:13:04'),
(65, 217, 217, 44, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-08-03 05:54:19', '2018-08-03 05:54:19'),
(68, 217, 217, 45, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-08-05 11:19:21', '2018-08-05 11:19:21'),
(69, 208, 217, 41, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-08-06 08:29:44', '2018-08-06 08:29:44'),
(70, 217, 208, 41, 'Reminder', 'Dress no sleeves booked on 2018-08-06 01:29:45 with $30, Please have this item sent out within 5 days', 'accept', '', NULL, 0, '2018-08-06 08:29:45', '2018-08-06 08:29:45'),
(72, 217, 217, 45, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-08-06 08:30:06', '2018-08-06 08:30:06'),
(73, 217, 217, 45, 'Reminder', 'Dress no sleeves booked on 2018-08-06 01:30:06 with $60, Please have this item sent out within 5 days', 'accept', '', NULL, 0, '2018-08-06 08:30:06', '2018-08-06 08:30:06'),
(74, 217, 217, 46, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-08-07 09:47:41', '2018-08-07 09:47:41'),
(75, 217, 217, 47, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-08-07 09:47:42', '2018-08-07 09:47:42'),
(203, 215, 217, 71, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-10-06 02:13:57', '2018-10-06 02:13:57'),
(245, 306, 338, 82, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-05 04:28:02', '2018-11-05 04:28:02'),
(250, 217, 351, 83, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-07 02:38:04', '2018-11-07 02:38:04'),
(253, 303, 363, 85, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-07 03:40:04', '2018-11-07 03:40:04'),
(254, 217, 303, 85, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-07 03:44:28', '2018-11-07 03:44:28'),
(255, 303, 217, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-07 04:16:40', '2018-11-07 04:16:40'),
(266, 217, 302, 93, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-11 02:49:39', '2018-11-11 02:49:39'),
(267, 217, 302, 93, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2018-12-11 05:43:00', '2018-11-11 02:59:45'),
(268, 217, 302, 94, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-11 05:43:00', '2018-11-11 03:07:15'),
(269, 302, 217, 94, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-11 03:18:14', '2018-11-11 03:18:14'),
(282, 217, 374, 98, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-11 05:43:00', '2018-11-16 06:18:52'),
(283, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-16 06:55:02', '2018-11-16 06:55:02'),
(284, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-17 06:55:02', '2018-11-17 06:55:02'),
(285, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-18 06:55:01', '2018-11-18 06:55:01'),
(286, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 16:20:00', '2018-11-18 16:20:00'),
(287, 217, 351, 85, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 1, 0, '2018-12-11 05:43:00', '2018-11-18 16:20:34'),
(288, 303, 351, 85, 'Declined your rental request', 'Declined your rental request', 'decline', '', NULL, 0, '2018-11-18 16:39:04', '2018-11-18 16:39:04'),
(290, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 18:25:31', '2018-11-18 18:25:31'),
(291, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 18:25:39', '2018-11-18 18:25:39'),
(293, 217, 303, 85, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 1, 0, '2018-12-11 05:43:00', '2018-11-18 19:25:10'),
(294, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:26:55', '2018-11-18 19:26:55'),
(295, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:27:04', '2018-11-18 19:27:04'),
(296, 217, 303, 85, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 1, 0, '2018-12-11 05:43:00', '2018-11-18 19:28:19'),
(298, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:30:59', '2018-11-18 19:30:59'),
(299, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:31:01', '2018-11-18 19:31:01'),
(301, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:43:24', '2018-11-18 19:43:24'),
(302, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:43:35', '2018-11-18 19:43:35'),
(304, 217, 303, 85, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-11-18 19:46:27', '2018-11-18 19:46:27'),
(305, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:46:34', '2018-11-18 19:46:34'),
(306, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:46:38', '2018-11-18 19:46:38'),
(307, 217, 303, 85, 'Canceled rental request', 'Canceled rental request', 'cancel', '', NULL, 0, '2018-11-18 19:46:48', '2018-11-18 19:46:48'),
(309, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:58:38', '2018-11-18 19:58:38'),
(310, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 19:58:49', '2018-11-18 19:58:49'),
(312, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 20:35:24', '2018-11-18 20:35:24'),
(313, 303, 351, 84, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 20:35:29', '2018-11-18 20:35:29'),
(314, 303, 351, 85, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', NULL, 0, '2018-11-18 20:35:31', '2018-11-18 20:35:31'),
(315, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-19 06:55:02', '2018-11-19 06:55:02'),
(316, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-20 06:55:02', '2018-11-20 06:55:02'),
(317, 303, 363, 100, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-20 15:46:23', '2018-11-20 15:46:23'),
(318, 303, 363, 101, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-20 16:16:11', '2018-11-20 16:16:11'),
(319, 303, 363, 101, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-20 16:17:30', '2018-11-20 16:17:30'),
(320, 215, 338, 102, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-20 23:06:01', '2018-11-20 23:06:01'),
(321, 217, 376, 103, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-20 23:14:48', '2018-11-20 23:14:48'),
(322, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-21 06:55:01', '2018-11-21 06:55:01'),
(323, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-22 06:55:02', '2018-11-22 06:55:02'),
(324, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-23 06:55:02', '2018-11-23 06:55:02'),
(325, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-24 06:55:02', '2018-11-24 06:55:02'),
(326, 217, 374, 105, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-25 02:40:47', '2018-11-25 02:40:47'),
(327, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-25 06:55:02', '2018-11-25 06:55:02'),
(328, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-26 06:55:01', '2018-11-26 06:55:01'),
(329, 215, 338, 106, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-27 01:55:24', '2018-11-27 01:55:24'),
(330, 217, 338, 107, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-27 02:28:59', '2018-11-27 02:28:59'),
(331, 217, 338, 108, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-27 02:36:31', '2018-11-27 02:36:31'),
(332, 217, 217, 108, 'Cancel rental request', 'Cancel rental request', 'cancel', '', NULL, 0, '2018-11-27 02:53:19', '2018-11-27 02:53:19'),
(333, 217, 338, 109, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-27 02:54:10', '2018-11-27 02:54:10'),
(334, 217, 338, 109, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', NULL, 0, '2018-11-27 02:55:50', '2018-11-27 02:55:50'),
(335, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-27 06:55:02', '2018-11-27 06:55:02'),
(336, 212, 215, 3, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>manan amin</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>manan amin</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Pick up From UPS</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523536891__Stile-europeo-Ferro-C-Forma-Arco-Vestiti-Cappello-Cremagliera-Stare-Sul-Pavimento-Negozio-di-Abbigliamento-di.jpg\'></div>', 'reminder', '', NULL, 0, '2018-11-27 06:55:03', '2018-11-27 06:55:03'),
(337, 220, 211, 4, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>test 123</b>, remember that <b>Mobile Mitaja</b> needs to receive this item by <b>test 123</b> on time. <b>Mobile Mitaja</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523518027__ebfedb9982d8aa84c296697955714bac--king-dresses.jpg\'></div>', 'reminder', '', NULL, 0, '2018-11-27 06:55:03', '2018-11-27 06:55:03'),
(338, 220, 212, 5, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>Manan Amin</b>, remember that <b>Mobile Mitaja</b> needs to receive this item by <b>Manan Amin</b> on time. <b>Mobile Mitaja</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523598837__wrapd-rent-party-dress-vaishali-nagar-jaipur-costumes-on-hire-cu1vov.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-27 06:55:03', '2018-11-27 06:55:03'),
(339, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-28 06:55:02', '2018-11-28 06:55:02'),
(340, 212, 215, 3, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>manan amin</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>manan amin</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Pick up From UPS</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523536891__Stile-europeo-Ferro-C-Forma-Arco-Vestiti-Cappello-Cremagliera-Stare-Sul-Pavimento-Negozio-di-Abbigliamento-di.jpg\'></div>', 'reminder', '', NULL, 0, '2018-11-28 06:55:02', '2018-11-28 06:55:02'),
(341, 220, 211, 4, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>test 123</b>, remember that <b>Mobile Mitaja</b> needs to receive this item by <b>test 123</b> on time. <b>Mobile Mitaja</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523518027__ebfedb9982d8aa84c296697955714bac--king-dresses.jpg\'></div>', 'reminder', '', NULL, 0, '2018-11-28 06:55:02', '2018-11-28 06:55:02'),
(342, 220, 212, 5, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>Manan Amin</b>, remember that <b>Mobile Mitaja</b> needs to receive this item by <b>Manan Amin</b> on time. <b>Mobile Mitaja</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523598837__wrapd-rent-party-dress-vaishali-nagar-jaipur-costumes-on-hire-cu1vov.jpeg\'></div>', 'reminder', '', NULL, 0, '2018-11-28 06:55:03', '2018-11-28 06:55:03'),
(343, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 14:33:34', '2018-11-28 14:33:34'),
(344, 379, 380, 110, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 1, 0, '2018-12-03 20:55:32', '2018-11-28 15:05:29'),
(345, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 15:17:37', '2018-11-28 15:17:37'),
(346, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:19:38', '2018-11-28 16:19:38'),
(347, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:24:27', '2018-11-28 16:24:27'),
(348, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:29:01', '2018-11-28 16:29:01'),
(349, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:31:22', '2018-11-28 16:31:22'),
(350, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:35:19', '2018-11-28 16:35:19'),
(351, 380, 379, 110, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', NULL, 0, '2018-11-28 16:38:47', '2018-11-28 16:38:47'),
(352, 217, 379, 111, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-01 22:45:52', '2018-11-28 16:46:43'),
(353, 217, 379, 112, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-01 22:45:52', '2018-11-28 16:59:39'),
(354, 217, 379, 113, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-01 22:45:52', '2018-11-28 17:15:09'),
(355, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-11-29 06:55:01', '2018-11-29 06:55:01'),
(356, 303, 384, 114, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-11-29 14:08:06', '2018-11-29 14:08:06'),
(357, 217, 379, 115, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-01 22:45:52', '2018-11-29 14:24:40'),
(358, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-11-30 06:55:01', '2018-11-30 06:55:01'),
(359, 376, 374, 116, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-11-30 10:14:39', '2018-11-30 09:25:08'),
(360, 217, 374, 105, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2018-12-01 22:45:52', '2018-11-30 09:26:42'),
(361, 217, 374, 98, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2019-01-07 07:37:00', '2018-11-30 09:26:52'),
(362, 376, 374, 117, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-11-30 10:14:39', '2018-11-30 10:13:18'),
(363, 374, 376, 116, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 1, 0, '2018-12-04 05:09:40', '2018-11-30 10:33:49'),
(364, 374, 375, 118, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-04 05:09:40', '2018-11-30 19:18:36'),
(365, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-01 06:55:01', '2018-12-01 06:55:01'),
(366, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-02 06:55:01', '2018-12-02 06:55:01'),
(367, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-03 06:55:02', '2018-12-03 06:55:02'),
(368, 217, 379, 119, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 14:34:20', '2018-12-03 14:34:20'),
(369, 217, 379, 120, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 14:47:06', '2018-12-03 14:47:06'),
(370, 217, 379, 121, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 15:06:59', '2018-12-03 15:06:59'),
(371, 217, 379, 122, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 15:24:33', '2018-12-03 15:24:33'),
(372, 217, 379, 123, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-01-07 07:37:00', '2018-12-03 15:27:49'),
(373, 217, 379, 123, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-01-07 07:37:00', '2018-12-03 20:31:01'),
(374, 338, 379, 126, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 20:31:37', '2018-12-03 20:31:37'),
(375, 217, 379, 123, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:29:52', '2018-12-03 20:34:03'),
(376, 217, 379, 123, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:29:52', '2018-12-03 20:37:43'),
(377, 379, 217, 123, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 1, 0, '2018-12-10 18:03:04', '2018-12-03 20:41:41'),
(378, 338, 379, 127, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2018-12-03 21:05:00', '2018-12-03 21:05:00'),
(379, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-04 06:55:01', '2018-12-04 06:55:01'),
(380, 217, 379, 123, 'Payment Accepted', 'Client Paid the Payment', 'payment accepted', '', 1, 0, '2019-10-23 04:29:52', '2018-12-04 13:54:39'),
(381, 379, 383, 128, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-10 18:03:04', '2018-12-04 19:57:45'),
(382, 383, 379, 128, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 1, 0, '2018-12-04 20:29:36', '2018-12-04 20:17:39'),
(383, 379, 383, 128, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2018-12-10 18:03:04', '2018-12-04 20:31:37'),
(384, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-05 06:55:01', '2018-12-05 06:55:01'),
(385, 379, 217, 123, 'Item Sent', 'Item <b>top</b> sent by <b>Anna BELLA</b>, Shipping Info: <b>2 rue George brassens</b>', 'sent', '', 1, 0, '2018-12-10 18:03:04', '2018-12-05 22:51:13'),
(386, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-06 06:55:02', '2018-12-06 06:55:02'),
(387, 379, 388, 129, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2018-12-10 18:03:04', '2018-12-06 19:12:21'),
(388, 388, 379, 129, '<b>Client Test</b> Declined your rental request', '<b>Client Test</b> cancelled your rental request for <b>test item</b>, Reason: <b>Change my mind</b>', 'decline', '', 1, 0, '2018-12-10 18:00:42', '2018-12-06 19:13:42'),
(389, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-07 06:55:01', '2018-12-07 06:55:01'),
(390, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-08 06:55:01', '2018-12-08 06:55:01'),
(391, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-09 06:55:02', '2018-12-09 06:55:02'),
(392, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-10 06:55:02', '2018-12-10 06:55:02'),
(393, 217, 303, 85, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', 1, 0, '2019-10-23 04:29:52', '2018-12-11 02:45:09'),
(394, 217, 303, 85, 'Payment Accepted', 'Payment Accepted', 'payment accepted', '', 1, 0, '2019-10-23 04:29:52', '2018-12-11 02:54:06'),
(395, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-11 06:55:01', '2018-12-11 06:55:01'),
(396, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-12 06:55:01', '2018-12-12 06:55:01'),
(397, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-13 06:55:02', '2018-12-13 06:55:02'),
(398, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-14 06:55:02', '2018-12-14 06:55:02'),
(399, 217, 379, 123, 'Item Arrived', 'Item <b>top</b> has arrived to <b>Client Test</b>', 'received', '', 1, 0, '2019-10-23 04:29:52', '2018-12-14 17:33:28'),
(400, 217, 379, 123, 'Payment Received', '<b>Client Test</b> satisfied to <b>top</b>, <br /> A payment has been made to you for this item, Total Amount: $22', 'satisfied', '', 1, 0, '2019-01-31 06:43:07', '2018-12-14 17:34:30'),
(401, 217, 379, 123, 'Item Returned', 'Item <b>top</b> is Returned by <b>Client Test</b>, Shipping Info: <b>shipped via ABC</b>', 'sent', '', 1, 0, '2019-01-31 06:43:07', '2018-12-14 17:38:48'),
(402, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-15 06:55:02', '2018-12-15 06:55:02'),
(403, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-16 06:55:02', '2018-12-16 06:55:02'),
(404, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-17 06:55:02', '2018-12-17 06:55:02'),
(405, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-18 06:55:02', '2018-12-18 06:55:02'),
(406, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-19 06:55:01', '2018-12-19 06:55:01'),
(407, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-20 06:55:01', '2018-12-20 06:55:01'),
(408, 379, 217, 123, 'Item received back', 'Item <b>top</b> Received to <b>Anna BELLA</b> and Refunded Security, Total Amount: $60', 'received', '', 0, 0, '2018-12-21 03:47:04', '2018-12-21 03:47:04'),
(409, 217, 379, 123, 'Item received back', '', 'received', '', 1, 0, '2019-01-31 06:43:07', '2018-12-21 03:47:04'),
(410, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-21 06:55:02', '2018-12-21 06:55:02'),
(411, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-22 06:55:02', '2018-12-22 06:55:02'),
(412, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-23 06:55:01', '2018-12-23 06:55:01'),
(413, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-24 06:55:02', '2018-12-24 06:55:02'),
(414, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-25 06:55:02', '2018-12-25 06:55:02'),
(415, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-26 06:55:01', '2018-12-26 06:55:01'),
(416, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-27 06:55:01', '2018-12-27 06:55:01'),
(417, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-28 06:55:01', '2018-12-28 06:55:01'),
(418, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-29 06:55:01', '2018-12-29 06:55:01'),
(419, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-30 06:55:02', '2018-12-30 06:55:02'),
(420, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2018-12-31 06:55:02', '2018-12-31 06:55:02'),
(421, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-01 06:55:01', '2019-01-01 06:55:01');
INSERT INTO `notification` (`id`, `for_user`, `from_user`, `rent_id`, `title`, `message`, `type`, `response`, `read`, `status`, `updated_at`, `created_at`) VALUES
(422, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-02 06:55:02', '2019-01-02 06:55:02'),
(423, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-03 06:55:02', '2019-01-03 06:55:02'),
(424, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-04 06:55:02', '2019-01-04 06:55:02'),
(425, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-05 06:55:01', '2019-01-05 06:55:01'),
(426, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-06 06:55:01', '2019-01-06 06:55:01'),
(427, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-07 06:55:02', '2019-01-07 06:55:02'),
(428, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-08 06:55:01', '2019-01-08 06:55:01'),
(429, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-09 06:55:01', '2019-01-09 06:55:01'),
(430, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-10 06:55:02', '2019-01-10 06:55:02'),
(431, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-11 06:55:02', '2019-01-11 06:55:02'),
(432, 217, 394, 133, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-01-31 06:43:07', '2019-01-11 23:50:51'),
(433, 394, 217, 133, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 0, 0, '2019-01-12 00:02:40', '2019-01-12 00:02:40'),
(434, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-12 06:55:02', '2019-01-12 06:55:02'),
(435, 217, 394, 134, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-01-31 06:43:07', '2019-01-13 06:47:56'),
(436, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-13 06:55:01', '2019-01-13 06:55:01'),
(437, 394, 217, 134, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>handbag</b>, Reason: <b>Change my mind</b>', 'decline', '', 0, 0, '2019-01-13 06:57:36', '2019-01-13 06:57:36'),
(438, 217, 376, 103, 'Cancel rental request', 'Cancel rental request', 'cancel', '', 1, 0, '2019-01-31 06:43:07', '2019-01-13 07:04:12'),
(439, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-14 06:55:01', '2019-01-14 06:55:01'),
(440, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-15 06:55:02', '2019-01-15 06:55:02'),
(441, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-16 06:55:02', '2019-01-16 06:55:02'),
(442, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-17 06:55:01', '2019-01-17 06:55:01'),
(443, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-18 06:55:01', '2019-01-18 06:55:01'),
(444, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-19 06:55:02', '2019-01-19 06:55:02'),
(445, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-20 06:55:01', '2019-01-20 06:55:01'),
(446, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-21 06:55:02', '2019-01-21 06:55:02'),
(447, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-22 06:55:01', '2019-01-22 06:55:01'),
(448, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-23 06:55:02', '2019-01-23 06:55:02'),
(449, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-24 06:55:01', '2019-01-24 06:55:01'),
(450, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-25 06:55:01', '2019-01-25 06:55:01'),
(451, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-26 06:55:01', '2019-01-26 06:55:01'),
(452, 374, 369, 135, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-01-27 05:41:06', '2019-01-27 05:41:06'),
(453, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-27 06:55:02', '2019-01-27 06:55:02'),
(454, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-28 06:55:01', '2019-01-28 06:55:01'),
(455, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-29 06:55:01', '2019-01-29 06:55:01'),
(456, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-30 06:55:02', '2019-01-30 06:55:02'),
(457, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-01-31 06:55:02', '2019-01-31 06:55:02'),
(458, 217, 369, 137, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-01-31 22:46:18', '2019-01-31 22:46:18'),
(459, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-01 06:55:01', '2019-02-01 06:55:01'),
(460, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-02 06:55:01', '2019-02-02 06:55:01'),
(461, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-03 06:55:02', '2019-02-03 06:55:02'),
(462, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-04 06:55:01', '2019-02-04 06:55:01'),
(463, 369, 217, 137, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>handbag</b>, Reason: <b>Item is not available</b>', 'decline', '', 1, 0, '2019-02-12 23:27:21', '2019-02-05 00:57:36'),
(464, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-05 06:55:01', '2019-02-05 06:55:01'),
(465, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-06 06:55:01', '2019-02-06 06:55:01'),
(466, 217, 369, 138, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-06 23:03:35', '2019-02-06 23:03:35'),
(467, 217, 395, 139, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-06 23:29:04', '2019-02-06 23:29:04'),
(468, 395, 217, 139, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Vintage coat</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-02-09 06:47:36', '2019-02-07 00:04:24'),
(469, 369, 217, 138, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>jacket</b>, Reason: <b>Change my mind</b>', 'decline', '', 1, 0, '2019-02-12 23:27:21', '2019-02-07 00:05:17'),
(470, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-07 06:55:02', '2019-02-07 06:55:02'),
(471, 374, 395, 140, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-07 14:30:27', '2019-02-07 14:30:27'),
(472, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-08 06:55:01', '2019-02-08 06:55:01'),
(473, 374, 395, 141, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-08 21:42:45', '2019-02-08 21:42:45'),
(474, 374, 395, 140, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-09 06:33:43', '2019-02-09 06:33:43'),
(475, 374, 395, 141, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-09 06:33:50', '2019-02-09 06:33:50'),
(476, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-09 06:55:01', '2019-02-09 06:55:01'),
(477, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-10 06:55:01', '2019-02-10 06:55:01'),
(478, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-11 06:55:01', '2019-02-11 06:55:01'),
(479, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-12 06:55:01', '2019-02-12 06:55:01'),
(480, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-13 06:55:02', '2019-02-13 06:55:02'),
(481, 217, 395, 146, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-13 07:31:08', '2019-02-13 07:31:08'),
(482, 217, 395, 146, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-13 18:59:35', '2019-02-13 18:59:35'),
(483, 217, 369, 147, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-13 20:09:19', '2019-02-13 20:09:19'),
(484, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-14 06:55:01', '2019-02-14 06:55:01'),
(485, 369, 217, 147, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>BAG</b>, Reason: <b>Change my mind</b>', 'decline', '', 0, 0, '2019-02-14 19:41:17', '2019-02-14 19:41:17'),
(486, 217, 369, 149, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 20:28:42', '2019-02-14 20:28:42'),
(487, 217, 369, 149, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 20:30:10', '2019-02-14 20:30:10'),
(488, 217, 369, 150, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 20:31:52', '2019-02-14 20:31:52'),
(489, 217, 369, 150, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 20:35:33', '2019-02-14 20:35:33'),
(490, 374, 369, 152, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 20:48:35', '2019-02-14 20:48:35'),
(491, 217, 369, 152, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 20:52:45', '2019-02-14 20:52:45'),
(492, 217, 369, 153, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:00:10', '2019-02-14 21:00:10'),
(493, 217, 369, 153, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 21:04:01', '2019-02-14 21:04:01'),
(494, 217, 369, 152, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 21:04:07', '2019-02-14 21:04:07'),
(495, 374, 369, 151, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 21:04:20', '2019-02-14 21:04:20'),
(496, 217, 369, 157, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:20:50', '2019-02-14 21:20:50'),
(497, 217, 369, 157, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:23:04', '2019-02-14 21:23:04'),
(498, 217, 369, 158, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:45:34', '2019-02-14 21:45:34'),
(499, 217, 369, 159, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:47:11', '2019-02-14 21:47:11'),
(500, 217, 369, 160, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:48:52', '2019-02-14 21:48:52'),
(501, 217, 369, 161, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:51:41', '2019-02-14 21:51:41'),
(502, 217, 369, 162, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 21:54:16', '2019-02-14 21:54:16'),
(503, 217, 369, 161, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 21:54:50', '2019-02-14 21:54:50'),
(504, 217, 369, 159, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 21:54:56', '2019-02-14 21:54:56'),
(505, 217, 369, 163, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:03:15', '2019-02-14 22:03:15'),
(506, 217, 369, 162, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 22:18:40', '2019-02-14 22:18:40'),
(507, 217, 369, 164, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:19:59', '2019-02-14 22:19:59'),
(508, 217, 369, 166, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:31:11', '2019-02-14 22:31:11'),
(509, 374, 369, 167, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:33:20', '2019-02-14 22:33:20'),
(510, 217, 369, 168, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:40:34', '2019-02-14 22:40:34'),
(511, 217, 369, 166, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 22:48:38', '2019-02-14 22:48:38'),
(512, 374, 369, 167, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 22:48:42', '2019-02-14 22:48:42'),
(513, 217, 369, 168, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-14 22:48:46', '2019-02-14 22:48:46'),
(514, 217, 369, 170, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 22:50:46', '2019-02-14 22:50:46'),
(515, 217, 369, 170, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 23:04:47', '2019-02-14 23:04:47'),
(516, 374, 369, 173, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 23:08:00', '2019-02-14 23:08:00'),
(517, 217, 369, 173, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 23:23:26', '2019-02-14 23:23:26'),
(518, 217, 369, 175, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-14 23:26:22', '2019-02-14 23:26:22'),
(519, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-15 06:55:02', '2019-02-15 06:55:02'),
(520, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-16 06:55:02', '2019-02-16 06:55:02'),
(521, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-17 06:55:02', '2019-02-17 06:55:02'),
(522, 217, 395, 176, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-17 08:00:06', '2019-02-17 08:00:06'),
(523, 217, 395, 177, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-02-17 08:11:28', '2019-02-17 08:11:28'),
(524, 217, 395, 177, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 0, 0, '2019-02-17 08:15:09', '2019-02-17 08:15:09'),
(525, 217, 395, 176, 'Canceled rental request', 'Canceled rental request', 'cancel', '', 1, 0, '2019-03-19 09:44:32', '2019-02-17 08:15:25'),
(526, 217, 395, 178, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-03-19 09:44:32', '2019-02-17 08:16:51'),
(527, 217, 395, 179, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-03-19 09:44:32', '2019-02-17 08:35:47'),
(528, 217, 395, 180, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-03-19 09:44:32', '2019-02-17 08:38:33'),
(529, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-18 06:55:01', '2019-02-18 06:55:01'),
(530, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-19 06:55:02', '2019-02-19 06:55:02'),
(531, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-20 06:55:02', '2019-02-20 06:55:02'),
(532, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-21 06:55:01', '2019-02-21 06:55:01'),
(533, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-02-22 06:55:02', '2019-02-22 06:55:02'),
(534, 217, 369, 182, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:26', '2019-02-22 16:30:56'),
(535, 217, 369, 183, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:26', '2019-02-22 16:34:38'),
(563, 407, 217, 184, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>jacket</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-03-02 02:37:48', '2019-03-02 02:37:48'),
(564, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-02 06:55:01', '2019-03-02 06:55:01'),
(565, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-03 06:55:01', '2019-03-03 06:55:01'),
(566, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-04 06:55:02', '2019-03-04 06:55:02'),
(567, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-05 06:55:02', '2019-03-05 06:55:02'),
(568, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-06 06:55:02', '2019-03-06 06:55:02'),
(569, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-07 06:55:02', '2019-03-07 06:55:02'),
(570, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-08 06:55:02', '2019-03-08 06:55:02'),
(571, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-09 06:55:01', '2019-03-09 06:55:01'),
(572, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-10 06:55:01', '2019-03-10 06:55:01'),
(573, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-11 06:55:02', '2019-03-11 06:55:02'),
(574, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-12 06:55:01', '2019-03-12 06:55:01'),
(575, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-13 06:55:01', '2019-03-13 06:55:01'),
(576, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-14 06:55:01', '2019-03-14 06:55:01'),
(577, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-15 06:55:01', '2019-03-15 06:55:01'),
(578, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-16 06:55:02', '2019-03-16 06:55:02'),
(579, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-17 06:55:01', '2019-03-17 06:55:01'),
(580, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-18 06:55:01', '2019-03-18 06:55:01'),
(581, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-19 06:55:01', '2019-03-19 06:55:01'),
(582, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-20 06:55:02', '2019-03-20 06:55:02'),
(583, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-21 06:55:01', '2019-03-21 06:55:01'),
(584, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-22 06:55:02', '2019-03-22 06:55:02'),
(585, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-23 06:55:02', '2019-03-23 06:55:02'),
(586, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-24 06:55:01', '2019-03-24 06:55:01'),
(587, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-25 06:55:01', '2019-03-25 06:55:01'),
(588, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-26 06:55:02', '2019-03-26 06:55:02'),
(589, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-27 06:55:02', '2019-03-27 06:55:02'),
(590, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-28 06:55:02', '2019-03-28 06:55:02');
INSERT INTO `notification` (`id`, `for_user`, `from_user`, `rent_id`, `title`, `message`, `type`, `response`, `read`, `status`, `updated_at`, `created_at`) VALUES
(591, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-29 06:55:02', '2019-03-29 06:55:02'),
(592, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-30 06:55:02', '2019-03-30 06:55:02'),
(593, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-03-31 06:55:02', '2019-03-31 06:55:02'),
(594, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-01 06:55:01', '2019-04-01 06:55:01'),
(595, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-02 06:55:02', '2019-04-02 06:55:02'),
(596, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-03 06:55:02', '2019-04-03 06:55:02'),
(597, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-04 06:55:02', '2019-04-04 06:55:02'),
(598, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-05 06:55:02', '2019-04-05 06:55:02'),
(599, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-06 06:55:02', '2019-04-06 06:55:02'),
(600, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-07 06:55:01', '2019-04-07 06:55:01'),
(601, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-08 06:55:02', '2019-04-08 06:55:02'),
(602, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-09 06:55:02', '2019-04-09 06:55:02'),
(603, 217, 388, 187, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:26', '2019-04-09 13:00:06'),
(604, 217, 388, 187, 'Payment Accepted', 'Client Paid the Payment', 'payment accepted', '', 1, 0, '2019-10-23 04:34:26', '2019-04-09 13:04:26'),
(605, 388, 217, 187, 'Item Sent', 'Item <b>Dress no sleeves</b> sent by <b>Anna BELLA</b>, Shipping Info: <b>444 western roadToronto, ON M3L 3N2</b>', 'sent', '', 0, 0, '2019-04-09 22:06:46', '2019-04-09 22:06:46'),
(606, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-10 06:55:01', '2019-04-10 06:55:01'),
(607, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-11 06:55:01', '2019-04-11 06:55:01'),
(608, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-12 06:55:02', '2019-04-12 06:55:02'),
(609, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-13 06:55:02', '2019-04-13 06:55:02'),
(610, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-14 06:55:02', '2019-04-14 06:55:02'),
(611, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-15 06:55:02', '2019-04-15 06:55:02'),
(612, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-16 06:55:02', '2019-04-16 06:55:02'),
(613, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-17 06:55:02', '2019-04-17 06:55:02'),
(614, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-18 06:55:01', '2019-04-18 06:55:01'),
(615, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-19 06:55:02', '2019-04-19 06:55:02'),
(616, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-20 06:55:02', '2019-04-20 06:55:02'),
(617, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-21 06:55:02', '2019-04-21 06:55:02'),
(618, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-22 06:55:01', '2019-04-22 06:55:01'),
(619, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-23 06:55:02', '2019-04-23 06:55:02'),
(620, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-26 06:55:01', '2019-04-26 06:55:01'),
(621, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-27 06:55:01', '2019-04-27 06:55:01'),
(622, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-28 06:55:01', '2019-04-28 06:55:01'),
(623, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-29 06:55:01', '2019-04-29 06:55:01'),
(624, 217, 409, 188, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:26', '2019-04-30 04:58:31'),
(625, 217, 409, 189, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:26', '2019-04-30 04:58:31'),
(626, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-04-30 06:55:01', '2019-04-30 06:55:01'),
(627, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-01 06:55:01', '2019-05-01 06:55:01'),
(628, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-02 06:55:02', '2019-05-02 06:55:02'),
(629, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-03 06:55:01', '2019-05-03 06:55:01'),
(630, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-04 06:55:02', '2019-05-04 06:55:02'),
(631, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-05 06:55:02', '2019-05-05 06:55:02'),
(632, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-06 06:55:01', '2019-05-06 06:55:01'),
(633, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-07 06:55:01', '2019-05-07 06:55:01'),
(634, 217, 410, 190, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-05-08 03:57:19'),
(635, 410, 217, 190, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 1, 0, '2019-07-28 16:21:14', '2019-05-08 04:13:14'),
(636, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-08 06:55:02', '2019-05-08 06:55:02'),
(637, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-09 06:55:02', '2019-05-09 06:55:02'),
(638, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-10 06:55:02', '2019-05-10 06:55:02'),
(639, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-11 06:55:02', '2019-05-11 06:55:02'),
(640, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-12 06:55:01', '2019-05-12 06:55:01'),
(641, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-13 06:55:01', '2019-05-13 06:55:01'),
(642, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-14 06:55:01', '2019-05-14 06:55:01'),
(643, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-15 06:55:02', '2019-05-15 06:55:02'),
(644, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-16 06:55:02', '2019-05-16 06:55:02'),
(645, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-17 06:55:01', '2019-05-17 06:55:01'),
(646, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-18 06:55:01', '2019-05-18 06:55:01'),
(647, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-19 06:55:03', '2019-05-19 06:55:03'),
(648, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-20 06:55:01', '2019-05-20 06:55:01'),
(649, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-21 06:55:02', '2019-05-21 06:55:02'),
(650, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-22 06:55:02', '2019-05-22 06:55:02'),
(651, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-23 06:55:01', '2019-05-23 06:55:01'),
(652, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-24 06:55:02', '2019-05-24 06:55:02'),
(653, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-25 06:55:01', '2019-05-25 06:55:01'),
(654, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-26 06:55:02', '2019-05-26 06:55:02'),
(655, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-27 06:55:02', '2019-05-27 06:55:02'),
(656, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-28 06:55:01', '2019-05-28 06:55:01'),
(657, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-29 06:55:01', '2019-05-29 06:55:01'),
(658, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-30 06:55:02', '2019-05-30 06:55:02'),
(659, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-05-31 06:55:02', '2019-05-31 06:55:02'),
(660, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-01 06:55:01', '2019-06-01 06:55:01'),
(661, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-02 06:55:02', '2019-06-02 06:55:02'),
(662, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-03 06:55:02', '2019-06-03 06:55:02'),
(663, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-04 06:55:01', '2019-06-04 06:55:01'),
(664, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-05 06:55:02', '2019-06-05 06:55:02'),
(665, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-06 06:55:02', '2019-06-06 06:55:02'),
(666, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-07 06:55:02', '2019-06-07 06:55:02'),
(667, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-08 06:55:02', '2019-06-08 06:55:02'),
(668, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-09 06:55:02', '2019-06-09 06:55:02'),
(669, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-10 06:55:02', '2019-06-10 06:55:02'),
(670, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-11 06:55:01', '2019-06-11 06:55:01'),
(671, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-12 06:55:01', '2019-06-12 06:55:01'),
(672, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-13 06:55:02', '2019-06-13 06:55:02'),
(673, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-14 06:55:02', '2019-06-14 06:55:02'),
(674, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-15 06:55:02', '2019-06-15 06:55:02'),
(675, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-16 06:55:02', '2019-06-16 06:55:02'),
(676, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-17 06:55:02', '2019-06-17 06:55:02'),
(677, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-18 06:55:01', '2019-06-18 06:55:01'),
(678, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-19 06:55:01', '2019-06-19 06:55:01'),
(679, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-20 06:55:01', '2019-06-20 06:55:01'),
(680, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-21 06:55:02', '2019-06-21 06:55:02'),
(681, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-22 06:55:01', '2019-06-22 06:55:01'),
(682, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-23 06:55:01', '2019-06-23 06:55:01'),
(683, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-24 06:55:02', '2019-06-24 06:55:02'),
(684, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-25 06:55:01', '2019-06-25 06:55:01'),
(685, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-26 06:55:02', '2019-06-26 06:55:02'),
(686, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-27 06:55:02', '2019-06-27 06:55:02'),
(687, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-28 06:55:01', '2019-06-28 06:55:01'),
(688, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-29 06:55:01', '2019-06-29 06:55:01'),
(689, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-06-30 06:55:01', '2019-06-30 06:55:01'),
(690, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-01 06:55:02', '2019-07-01 06:55:02'),
(691, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-02 06:55:02', '2019-07-02 06:55:02'),
(692, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-03 06:55:02', '2019-07-03 06:55:02'),
(693, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-04 06:55:01', '2019-07-04 06:55:01'),
(694, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-05 06:55:01', '2019-07-05 06:55:01');
INSERT INTO `notification` (`id`, `for_user`, `from_user`, `rent_id`, `title`, `message`, `type`, `response`, `read`, `status`, `updated_at`, `created_at`) VALUES
(695, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-06 06:55:02', '2019-07-06 06:55:02'),
(696, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-07 06:55:02', '2019-07-07 06:55:02'),
(697, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-08 06:55:02', '2019-07-08 06:55:02'),
(698, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-09 06:55:01', '2019-07-09 06:55:01'),
(699, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-10 06:55:02', '2019-07-10 06:55:02'),
(700, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-11 06:55:01', '2019-07-11 06:55:01'),
(701, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-12 06:55:02', '2019-07-12 06:55:02'),
(702, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-13 06:55:02', '2019-07-13 06:55:02'),
(703, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-14 06:55:01', '2019-07-14 06:55:01'),
(704, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-15 06:55:02', '2019-07-15 06:55:02'),
(705, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-16 06:55:01', '2019-07-16 06:55:01'),
(706, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-17 06:55:02', '2019-07-17 06:55:02'),
(707, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-18 06:55:02', '2019-07-18 06:55:02'),
(708, 217, 417, 192, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-07-18 15:46:32'),
(709, 374, 417, 193, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 0, 0, '2019-07-18 16:25:44', '2019-07-18 16:25:44'),
(710, 217, 417, 194, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-07-18 16:37:12'),
(711, 217, 417, 195, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-07-18 17:37:11'),
(712, 217, 417, 196, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-07-18 17:44:07'),
(713, 217, 417, 197, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:33:46', '2019-07-18 17:56:04'),
(714, 217, 417, 198, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:34:48', '2019-07-18 20:16:21'),
(715, 217, 417, 199, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:35:11', '2019-07-18 20:20:02'),
(716, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-19 06:55:02', '2019-07-19 06:55:02'),
(717, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-20 06:55:01', '2019-07-20 06:55:01'),
(718, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-21 06:55:02', '2019-07-21 06:55:02'),
(719, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-22 06:55:01', '2019-07-22 06:55:01'),
(720, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-23 06:55:01', '2019-07-23 06:55:01'),
(721, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-24 06:55:01', '2019-07-24 06:55:01'),
(722, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-25 06:55:01', '2019-07-25 06:55:01'),
(723, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-26 06:55:01', '2019-07-26 06:55:01'),
(724, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-27 06:55:02', '2019-07-27 06:55:02'),
(725, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-28 06:55:01', '2019-07-28 06:55:01'),
(726, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-29 06:55:02', '2019-07-29 06:55:02'),
(727, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-30 06:55:01', '2019-07-30 06:55:01'),
(728, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-07-31 06:55:02', '2019-07-31 06:55:02'),
(729, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-01 06:55:01', '2019-08-01 06:55:01'),
(730, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-02 06:55:01', '2019-08-02 06:55:01'),
(731, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-03 06:55:01', '2019-08-03 06:55:01'),
(732, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-04 06:55:01', '2019-08-04 06:55:01'),
(733, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-05 06:55:01', '2019-08-05 06:55:01'),
(734, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-06 06:55:02', '2019-08-06 06:55:02'),
(735, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-07 06:55:01', '2019-08-07 06:55:01'),
(736, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-08 06:55:02', '2019-08-08 06:55:02'),
(737, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-09 06:55:02', '2019-08-09 06:55:02'),
(738, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-10 06:55:02', '2019-08-10 06:55:02'),
(739, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-11 06:55:02', '2019-08-11 06:55:02'),
(740, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-12 06:55:01', '2019-08-12 06:55:01'),
(741, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-13 06:55:02', '2019-08-13 06:55:02'),
(742, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-14 06:55:01', '2019-08-14 06:55:01'),
(743, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-15 06:55:01', '2019-08-15 06:55:01'),
(744, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-16 06:55:01', '2019-08-16 06:55:01'),
(745, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-17 06:55:01', '2019-08-17 06:55:01'),
(746, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-18 06:55:01', '2019-08-18 06:55:01'),
(747, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-19 06:55:01', '2019-08-19 06:55:01'),
(748, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-20 06:55:01', '2019-08-20 06:55:01'),
(749, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-21 06:55:01', '2019-08-21 06:55:01'),
(750, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-22 06:55:02', '2019-08-22 06:55:02'),
(751, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-23 06:55:02', '2019-08-23 06:55:02'),
(752, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-24 06:55:02', '2019-08-24 06:55:02'),
(753, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-25 06:55:02', '2019-08-25 06:55:02'),
(754, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-26 06:55:01', '2019-08-26 06:55:01'),
(755, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-27 06:55:02', '2019-08-27 06:55:02'),
(756, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-28 06:55:01', '2019-08-28 06:55:01'),
(757, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-29 06:55:02', '2019-08-29 06:55:02'),
(758, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-30 06:55:01', '2019-08-30 06:55:01'),
(759, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-08-31 06:55:02', '2019-08-31 06:55:02'),
(760, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-01 06:55:01', '2019-09-01 06:55:01'),
(761, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-02 06:55:02', '2019-09-02 06:55:02'),
(762, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-03 06:55:01', '2019-09-03 06:55:01'),
(763, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-04 06:55:01', '2019-09-04 06:55:01'),
(764, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-05 06:55:01', '2019-09-05 06:55:01'),
(765, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-06 06:55:01', '2019-09-06 06:55:01'),
(766, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-07 06:55:02', '2019-09-07 06:55:02'),
(767, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-08 06:55:01', '2019-09-08 06:55:01'),
(768, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-09 06:55:01', '2019-09-09 06:55:01'),
(769, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-10 06:55:02', '2019-09-10 06:55:02'),
(770, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-11 06:55:02', '2019-09-11 06:55:02'),
(771, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-12 06:55:02', '2019-09-12 06:55:02'),
(772, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-13 06:55:01', '2019-09-13 06:55:01'),
(773, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-14 06:55:02', '2019-09-14 06:55:02'),
(774, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-15 06:55:01', '2019-09-15 06:55:01'),
(775, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-16 06:55:02', '2019-09-16 06:55:02'),
(776, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-17 06:55:02', '2019-09-17 06:55:02'),
(777, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-18 06:55:02', '2019-09-18 06:55:02'),
(778, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-19 06:55:02', '2019-09-19 06:55:02'),
(779, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-20 06:55:02', '2019-09-20 06:55:02'),
(780, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-21 06:55:02', '2019-09-21 06:55:02'),
(781, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-22 06:55:02', '2019-09-22 06:55:02'),
(782, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-23 06:55:01', '2019-09-23 06:55:01'),
(783, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-24 06:55:01', '2019-09-24 06:55:01'),
(784, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-25 06:55:01', '2019-09-25 06:55:01'),
(785, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-26 06:55:01', '2019-09-26 06:55:01'),
(786, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-27 06:55:01', '2019-09-27 06:55:01'),
(787, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-28 06:55:02', '2019-09-28 06:55:02'),
(788, 217, 418, 200, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:08', '2019-09-28 12:07:22'),
(789, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-29 06:55:02', '2019-09-29 06:55:02'),
(790, 217, 420, 202, 'Rented your item', 'New product are now pending for approval.', 'rental_request', '', 1, 0, '2019-10-23 04:36:08', '2019-09-29 19:51:20'),
(791, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-09-30 06:55:02', '2019-09-30 06:55:02'),
(792, 417, 217, 196, 'Accepted your rental request', 'Accepted your rental request', 'accept', '', 0, 0, '2019-09-30 21:11:53', '2019-09-30 21:11:53'),
(793, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-01 06:55:01', '2019-10-01 06:55:01'),
(794, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-02 06:55:01', '2019-10-02 06:55:01'),
(795, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-03 06:55:02', '2019-10-03 06:55:02'),
(796, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-04 06:55:01', '2019-10-04 06:55:01'),
(797, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-05 06:55:01', '2019-10-05 06:55:01'),
(798, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-06 06:55:01', '2019-10-06 06:55:01'),
(799, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-07 06:55:01', '2019-10-07 06:55:01'),
(800, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-08 06:55:02', '2019-10-08 06:55:02'),
(801, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-09 06:55:01', '2019-10-09 06:55:01');
INSERT INTO `notification` (`id`, `for_user`, `from_user`, `rent_id`, `title`, `message`, `type`, `response`, `read`, `status`, `updated_at`, `created_at`) VALUES
(802, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-10 06:55:01', '2019-10-10 06:55:01'),
(803, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-11 06:55:01', '2019-10-11 06:55:01'),
(804, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-12 06:55:01', '2019-10-12 06:55:01'),
(805, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-13 06:55:01', '2019-10-13 06:55:01'),
(806, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-14 06:55:02', '2019-10-14 06:55:02'),
(807, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-15 06:55:01', '2019-10-15 06:55:01'),
(808, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-16 06:55:01', '2019-10-16 06:55:01'),
(809, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-17 06:55:02', '2019-10-17 06:55:02'),
(810, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-18 06:55:02', '2019-10-18 06:55:02'),
(811, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-19 06:55:02', '2019-10-19 06:55:02'),
(812, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-20 06:55:01', '2019-10-20 06:55:01'),
(813, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-21 06:55:02', '2019-10-21 06:55:02'),
(814, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-22 06:55:02', '2019-10-22 06:55:02'),
(815, 217, 217, 20, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>LONG SKIRT</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:37:04', '2019-10-23 04:28:59'),
(816, 217, 217, 21, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>handbag</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:37:40', '2019-10-23 04:29:37'),
(817, 395, 217, 178, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:30:22', '2019-10-23 04:30:22'),
(818, 395, 217, 179, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:30:33', '2019-10-23 04:30:33'),
(819, 417, 217, 192, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:30:44', '2019-10-23 04:30:44'),
(820, 420, 217, 202, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:30:56', '2019-10-23 04:30:56'),
(821, 418, 217, 200, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>handbag</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:31:28', '2019-10-23 04:31:28'),
(822, 417, 217, 198, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>suit with pants</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:32:08', '2019-10-23 04:32:08'),
(823, 369, 217, 182, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:32:48', '2019-10-23 04:32:48'),
(824, 417, 217, 197, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:32:57', '2019-10-23 04:32:57'),
(825, 369, 217, 175, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:33:17', '2019-10-23 04:33:17'),
(826, 417, 217, 199, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Suit with skirt</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:33:25', '2019-10-23 04:33:25'),
(827, 409, 217, 188, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>BAG</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:34:38', '2019-10-23 04:34:38'),
(828, 217, 217, 31, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>jacket</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:35:04'),
(829, 217, 217, 24, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Dress no sleeves</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:35:25'),
(830, 217, 217, 27, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>LONG SKIRT</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:36:26'),
(831, 217, 217, 23, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>LONG SKIRT</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:36:37'),
(832, 217, 217, 38, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Dress no sleeves</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:37:21'),
(833, 395, 217, 144, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>Dress no sleeves</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 0, 0, '2019-10-23 04:37:32', '2019-10-23 04:37:32'),
(834, 217, 217, 28, '<b>Anna BELLA</b> Declined your rental request', '<b>Anna BELLA</b> cancelled your rental request for <b>jacket</b>, Reason: <b>Bad review on customer</b>', 'decline', '', 1, 0, '2019-10-23 04:38:10', '2019-10-23 04:38:01'),
(835, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-23 06:55:02', '2019-10-23 06:55:02'),
(836, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-24 06:55:01', '2019-10-24 06:55:01'),
(837, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-25 06:55:02', '2019-10-25 06:55:02'),
(838, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-26 06:55:01', '2019-10-26 06:55:01'),
(839, 212, 208, 2, 'Reminder to Merchant', '<div class=\'col-md-11\' style=\'padding-left: 0;\'>Hi <b>jitu vank</b>, remember that <b>Manan Amin</b> needs to receive this item by <b>jitu vank</b> on time. <b>Manan Amin</b> wants to receive the item via <b>Localization</b>. Thank you</div><div class=\'col-md-1\'><img style=\'width: 50px;\' src=\'http://rentasuit.ca/uploads/products/1523510549__1522328520__event_pic.jpeg\'></div>', 'reminder', '', 0, 0, '2019-10-27 06:55:02', '2019-10-27 06:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Home', '2017-03-06 02:42:44', '2017-03-06 02:42:44'),
(2, 'About', '2017-11-09 16:00:54', '2017-11-09 16:00:54'),
(3, 'Garments', '2017-11-09 16:42:30', '2017-11-09 16:42:30'),
(4, 'Blogs', '2017-11-09 16:51:18', '2017-11-09 16:51:18'),
(5, 'Contact Us', '2017-11-09 17:01:34', '2017-11-09 17:01:34'),
(6, 'Shipping Calculator', '2017-11-23 00:21:12', '2017-11-23 00:21:12'),
(7, 'Terms and Conditions', '2017-11-23 00:25:48', '2017-11-23 00:25:48'),
(8, 'Return Policy', '2017-11-23 00:28:27', '2017-11-23 00:28:27'),
(9, 'FAQ', '2017-11-23 00:32:08', '2017-11-23 00:32:08'),
(10, 'Cart', '2017-11-23 01:32:08', '2017-11-23 01:32:08'),
(11, 'Wishlist', '2017-11-23 01:38:46', '2017-11-23 01:38:46'),
(12, 'Test-Omar', '2018-04-10 22:58:49', '2018-04-10 22:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page_id` int(11) UNSIGNED NOT NULL,
  `section_id` int(11) UNSIGNED NOT NULL,
  `field_type` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'text, textarea, image, file, wysiwyg_basic, wysiwyg_full, repeater',
  `field_name` text COLLATE utf8_unicode_ci NOT NULL,
  `repeater_fields` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page_id`, `section_id`, `field_type`, `field_name`, `repeater_fields`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'text', 'Meta Title', NULL, 'Home', '2017-03-06 02:44:21', '2017-03-06 02:49:31'),
(2, 1, 1, 'textarea', 'Meta Description', NULL, 'Home', '2017-03-06 02:45:28', '2017-03-06 02:49:31'),
(3, 1, 1, 'text', 'Meta Keys', NULL, 'Home', '2017-03-06 02:45:42', '2017-03-06 02:49:31'),
(4, 1, 2, 'text', 'Title Text', NULL, 'IMPRESS THEM ALL,', '2017-11-09 14:57:47', '2017-11-09 15:07:15'),
(5, 1, 2, 'image', 'Image 1', NULL, 'uploads/cms/1510268908__rentasuit.png', '2017-11-09 15:08:00', '2017-11-09 15:08:28'),
(6, 1, 2, 'text', 'Text 1', NULL, 'QUALITY. STYLISH. ACCESSIBLE. PROFESSIONAL.', '2017-11-09 15:12:02', '2017-11-09 15:12:59'),
(7, 1, 2, 'text', 'Button Text 1', NULL, 'I want to RENT', '2017-11-09 15:13:36', '2017-11-09 15:17:44'),
(8, 1, 2, 'text', 'Button Text 2', NULL, 'I want to POST', '2017-11-09 15:13:49', '2017-11-09 15:17:44'),
(9, 1, 3, 'image', 'Image 1', NULL, 'uploads/cms/1510269790__section-2-img-wrapper.png', '2017-11-09 15:20:05', '2017-11-09 15:23:10'),
(10, 1, 3, 'image', 'Image 2', NULL, 'uploads/cms/1510269790__section-2-img.png', '2017-11-09 15:21:08', '2017-11-09 15:23:10'),
(11, 1, 3, 'text', 'Background Text', NULL, 'welcome', '2017-11-09 15:25:17', '2017-11-09 15:25:40'),
(12, 1, 3, 'text', 'Title Text 1', NULL, 'renting a suit', '2017-11-09 15:26:15', '2017-11-09 15:27:34'),
(13, 1, 3, 'text', 'Title Text 2', NULL, 'at an affordable price', '2017-11-09 15:26:26', '2017-11-09 15:27:34'),
(14, 1, 3, 'text', 'Text 1', NULL, 'Now you can rent or post the latest brand and garments for less.', '2017-11-09 15:28:41', '2017-11-09 15:31:19'),
(15, 1, 3, 'text', 'Text 2', NULL, 'Rent used quality clothes for business, special occasions  or events.', '2017-11-09 15:28:51', '2017-11-09 15:30:58'),
(16, 1, 3, 'text', 'Text 3', NULL, 'Why not be part of a supportive community while making someone else happy at the same time!', '2017-11-09 15:30:23', '2018-02-15 19:25:10'),
(18, 1, 4, 'text', 'Background Text', NULL, 'The Process', '2017-11-09 15:33:15', '2017-11-09 15:34:19'),
(19, 1, 4, 'text', 'Title Text 1', NULL, 'rentals that  suit you', '2017-11-09 15:35:20', '2017-11-09 15:36:14'),
(20, 1, 4, 'text', 'Title Text 2', NULL, 'is finally simple', '2017-11-09 15:35:32', '2017-11-09 15:35:58'),
(21, 1, 4, 'repeater', 'Process Content', 'a:3:{i:0;a:2:{s:10:\"field_type\";s:5:\"image\";s:10:\"field_name\";s:5:\"Image\";}i:1;a:2:{s:10:\"field_type\";s:4:\"text\";s:10:\"field_name\";s:6:\"Text 1\";}i:2;a:2:{s:10:\"field_type\";s:8:\"textarea\";s:10:\"field_name\";s:6:\"Text 2\";}}', 'YTozOntpOjA7YTozOntpOjA7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjU6ImltYWdlIjtzOjEwOiJmaWVsZF9uYW1lIjtzOjU6IkltYWdlIjtzOjExOiJmaWVsZF92YWx1ZSI7czozODoidXBsb2Fkcy9jbXMvMTUxMDI3MDkzN19faG9tZS1zdGVwMS5wbmciO31pOjE7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjQ6InRleHQiO3M6MTA6ImZpZWxkX25hbWUiO3M6NjoiVGV4dCAxIjtzOjExOiJmaWVsZF92YWx1ZSI7czoxNjoiU0VMRUNUIEFOIE9VVEZJVCI7fWk6MjthOjM6e3M6MTA6ImZpZWxkX3R5cGUiO3M6ODoidGV4dGFyZWEiO3M6MTA6ImZpZWxkX25hbWUiO3M6NjoiVGV4dCAyIjtzOjExOiJmaWVsZF92YWx1ZSI7czo3MDoiQ2hvb3NlIGEgY29tcGxldGUgb3V0Zml0LiBSZWNlaXZlIHlvdXIgc3VpdCBvbiB0aW1lIGJlZm9yZSB5b3VyIGV2ZW50LiI7fX1pOjE7YTozOntpOjA7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjU6ImltYWdlIjtzOjEwOiJmaWVsZF9uYW1lIjtzOjU6IkltYWdlIjtzOjExOiJmaWVsZF92YWx1ZSI7czozODoidXBsb2Fkcy9jbXMvMTUxMDI3MDkzN19faG9tZS1zdGVwMi5wbmciO31pOjE7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjQ6InRleHQiO3M6MTA6ImZpZWxkX25hbWUiO3M6NjoiVGV4dCAxIjtzOjExOiJmaWVsZF92YWx1ZSI7czoxNDoiTUVBU1VSRSBPTkxJTkUiO31pOjI7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjg6InRleHRhcmVhIjtzOjEwOiJmaWVsZF9uYW1lIjtzOjY6IlRleHQgMiI7czoxMToiZmllbGRfdmFsdWUiO3M6NTY6IlN1Ym1pdCB5b3VyIHNpemVzIHVzaW5nIGFueSBvZiBvdXIgdGhyZWUgc2ltcGxlIG9wdGlvbnMuIjt9fWk6MjthOjM6e2k6MDthOjM6e3M6MTA6ImZpZWxkX3R5cGUiO3M6NToiaW1hZ2UiO3M6MTA6ImZpZWxkX25hbWUiO3M6NToiSW1hZ2UiO3M6MTE6ImZpZWxkX3ZhbHVlIjtzOjM4OiJ1cGxvYWRzL2Ntcy8xNTEwMjcwOTM3X19ob21lLXN0ZXAzLnBuZyI7fWk6MTthOjM6e3M6MTA6ImZpZWxkX3R5cGUiO3M6NDoidGV4dCI7czoxMDoiZmllbGRfbmFtZSI7czo2OiJUZXh0IDEiO3M6MTE6ImZpZWxkX3ZhbHVlIjtzOjE2OiJSRVRVUk4gV0lUSCBFQVNFIjt9aToyO2E6Mzp7czoxMDoiZmllbGRfdHlwZSI7czo4OiJ0ZXh0YXJlYSI7czoxMDoiZmllbGRfbmFtZSI7czo2OiJUZXh0IDIiO3M6MTE6ImZpZWxkX3ZhbHVlIjtzOjU1OiJVc2UgdGhlIGluY2x1ZGVkIGxhYmVsIHRvIHNoaXAgeW91ciBzdWl0IGJhY2sgZm9yIGZyZWUuIjt9fX0=', '2017-11-09 15:40:58', '2017-11-09 15:43:37'),
(22, 1, 5, 'text', 'Background Text', NULL, 'Collections', '2017-11-09 15:44:12', '2017-11-09 15:47:20'),
(23, 1, 5, 'text', 'Title Text 1', NULL, 'TImeless classic beyond', '2017-11-09 15:44:30', '2017-11-09 15:45:17'),
(24, 1, 5, 'text', 'Title Text 2', NULL, 'our collections', '2017-11-09 15:44:43', '2017-11-09 15:45:17'),
(25, 1, 5, 'text', 'Button Text', NULL, 'view all categories', '2017-11-09 15:47:38', '2017-11-09 15:48:39'),
(26, 1, 6, 'text', 'Background Text', NULL, 'Collections', '2017-11-09 15:49:16', '2017-11-09 15:51:42'),
(28, 1, 6, 'text', 'Title Text 1', NULL, 'TImeless classic beyond', '2017-11-09 15:49:28', '2017-11-09 15:50:59'),
(29, 1, 6, 'text', 'Title Text 2', NULL, 'our collections', '2017-11-09 15:49:38', '2017-11-09 15:50:59'),
(30, 1, 6, 'text', 'Sign Up Text 1', NULL, 'GET THE LATEST UPDATE', '2017-11-09 15:52:25', '2017-11-09 15:53:51'),
(31, 1, 6, 'text', 'Sign Up Text 2', NULL, 'SIGN UP FOR OUR NEWSLETTER', '2017-11-09 15:52:37', '2017-11-09 15:52:52'),
(32, 2, 1, 'text', 'Meta Title', NULL, 'About rent a suit, impress them all, quality, stylish, accessible, professional, do you want to look like me', '2017-11-09 16:00:54', '2018-12-13 06:35:33'),
(33, 2, 1, 'textarea', 'Meta Description', NULL, 'This online service provides an opportunity for women to rent and display quality suits and garments for business, special occasions or events at an affordable price.', '2017-11-09 16:01:09', '2018-11-23 03:27:27'),
(34, 2, 1, 'text', 'Meta Keys', NULL, 'rent, clothes, garments, dress, affordable, high end, suit, corporate, quality, designers, brand, post, about, tops, pants, let\'s party, gown, cocktail dress, bags,', '2017-11-09 16:01:22', '2018-12-11 11:43:31'),
(35, 3, 1, 'text', 'Meta Title', NULL, 'Garments', '2017-11-09 16:42:30', '2017-11-09 16:44:06'),
(36, 3, 1, 'textarea', 'Meta Description', NULL, 'Garments', '2017-11-09 16:42:41', '2017-11-09 16:44:06'),
(37, 3, 1, 'text', 'Meta Keys', NULL, 'Garments', '2017-11-09 16:42:49', '2017-11-09 16:44:06'),
(38, 3, 2, 'text', 'Background Text', NULL, 'Collections', '2017-11-09 16:44:42', '2017-11-09 16:47:56'),
(39, 3, 2, 'text', 'Title Text 1', NULL, 'TImeless classic beyond', '2017-11-09 16:45:19', '2017-11-09 16:45:55'),
(40, 3, 2, 'text', 'Title Text 2', NULL, 'our collections', '2017-11-09 16:45:29', '2017-11-09 16:45:55'),
(41, 4, 1, 'text', 'Meta Title', NULL, 'Blogs', '2017-11-09 16:51:18', '2017-11-09 16:51:52'),
(42, 4, 1, 'textarea', 'Meta Description', NULL, 'Blogs', '2017-11-09 16:51:31', '2017-11-09 16:51:53'),
(43, 4, 1, 'text', 'Meta Keys', NULL, 'Blogs', '2017-11-09 16:51:40', '2017-11-09 16:51:53'),
(44, 4, 2, 'text', 'Background Text', NULL, 'Fashion Trends', '2017-11-09 16:52:08', '2017-11-09 17:00:57'),
(45, 4, 2, 'text', 'Title Text 1', NULL, 'Be on the loop with', '2017-11-09 16:52:17', '2017-11-09 16:59:42'),
(47, 4, 2, 'text', 'Title Text 2', NULL, 'the fashion trends', '2017-11-09 16:58:53', '2017-11-09 16:59:42'),
(48, 5, 1, 'text', 'Meta Title', NULL, 'Contact Us', '2017-11-09 17:01:34', '2017-11-09 17:02:28'),
(49, 5, 1, 'textarea', 'Meta Description', NULL, 'Contact Us', '2017-11-09 17:01:45', '2017-11-09 17:02:28'),
(50, 5, 1, 'text', 'Meta Keys', NULL, 'Contact Us', '2017-11-09 17:02:04', '2017-11-09 17:02:28'),
(51, 5, 2, 'text', 'Background Text', NULL, 'Contact us', '2017-11-09 17:03:12', '2017-11-09 17:15:42'),
(52, 5, 2, 'text', 'Title Text 1', NULL, 'Contact us', '2017-11-09 17:03:27', '2017-11-09 17:15:42'),
(53, 5, 2, 'text', 'Title Text 2', NULL, 'Send us a message', '2017-11-09 17:03:38', '2017-11-09 17:15:42'),
(54, 5, 2, 'text', 'Text 1', NULL, NULL, '2017-11-09 17:12:48', '2018-12-15 13:43:44'),
(55, 5, 2, 'text', 'Text 2', NULL, 'PHONE', '2017-11-09 17:13:01', '2017-11-09 17:15:42'),
(56, 5, 2, 'text', 'Text 3', NULL, 'EMAIL', '2017-11-09 17:13:11', '2017-11-09 17:15:42'),
(57, 5, 2, 'text', 'Name Placeholder', NULL, 'NAME', '2017-11-09 17:16:38', '2017-11-09 17:17:07'),
(58, 5, 2, 'text', 'Email Placeholder', NULL, 'EMAIL ADDRESS', '2017-11-09 17:16:54', '2017-11-09 17:17:07'),
(59, 5, 2, 'repeater', 'Subject', 'a:1:{i:0;a:2:{s:10:\"field_type\";s:4:\"text\";s:10:\"field_name\";s:16:\"Subject Category\";}}', 'YTo0OntpOjA7YToxOntpOjA7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjQ6InRleHQiO3M6MTA6ImZpZWxkX25hbWUiO3M6MTY6IlN1YmplY3QgQ2F0ZWdvcnkiO3M6MTE6ImZpZWxkX3ZhbHVlIjtzOjI4OiJJIHJlY2VpdmVkIHRoZSBpdGVtcyBkYW1hZ2VkIjt9fWk6MTthOjE6e2k6MDthOjM6e3M6MTA6ImZpZWxkX3R5cGUiO3M6NDoidGV4dCI7czoxMDoiZmllbGRfbmFtZSI7czoxNjoiU3ViamVjdCBDYXRlZ29yeSI7czoxMToiZmllbGRfdmFsdWUiO3M6MjQ6IkkgcmVjZWl2ZWQgdGhlIGl0ZW0gbGF0ZSI7fX1pOjI7YToxOntpOjA7YTozOntzOjEwOiJmaWVsZF90eXBlIjtzOjQ6InRleHQiO3M6MTA6ImZpZWxkX25hbWUiO3M6MTY6IlN1YmplY3QgQ2F0ZWdvcnkiO3M6MTE6ImZpZWxkX3ZhbHVlIjtzOjI1OiJJIHJlY2VpdmVkIHRoZSB3cm9uZyBpdGVtIjt9fWk6MzthOjE6e2k6MDthOjM6e3M6MTA6ImZpZWxkX3R5cGUiO3M6NDoidGV4dCI7czoxMDoiZmllbGRfbmFtZSI7czoxNjoiU3ViamVjdCBDYXRlZ29yeSI7czoxMToiZmllbGRfdmFsdWUiO3M6MzU6IlRlY2huaWNhbCBwcm9ibGVtcyB3aXRoIHRoZSB3ZWJzaXRlIjt9fX0=', '2017-11-09 17:19:59', '2017-12-13 08:01:08'),
(60, 5, 2, 'text', 'Message Placeholder', NULL, 'MESSAGE', '2017-11-21 02:18:41', '2017-11-21 02:19:21'),
(61, 5, 2, 'text', 'Button Text', NULL, 'SUBMIT', '2017-11-21 02:19:00', '2017-11-21 02:19:21'),
(62, 1, 2, 'text', 'Title Tab Text', NULL, 'Rent a Suit', '2017-11-22 23:56:01', '2018-11-29 13:04:01'),
(63, 2, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - About', '2017-11-22 23:58:35', '2018-02-24 14:40:03'),
(64, 3, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Garments', '2017-11-23 00:00:08', '2017-11-23 00:00:20'),
(65, 4, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Blogs', '2017-11-23 00:02:29', '2017-11-23 00:02:46'),
(66, 5, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Contact Us', '2017-11-23 00:19:23', '2017-11-23 00:19:49'),
(67, 6, 1, 'text', 'Meta Title', NULL, 'Shipping Calculator', '2017-11-23 00:21:12', '2017-11-23 00:22:39'),
(68, 6, 1, 'textarea', 'Meta Description', NULL, 'Shipping Calculator', '2017-11-23 00:21:25', '2017-11-23 00:22:39'),
(69, 6, 1, 'text', 'Meta Keys', NULL, 'Shipping Calculator', '2017-11-23 00:22:26', '2017-11-23 00:22:39'),
(70, 6, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Shipping Calculator', '2017-11-23 00:23:02', '2017-11-23 00:23:19'),
(71, 7, 1, 'text', 'Meta Title', NULL, 'Terms and Conditions', '2017-11-23 00:25:48', '2017-11-23 00:26:33'),
(72, 7, 1, 'textarea', 'Meta Description', NULL, 'Terms and Conditions', '2017-11-23 00:26:02', '2017-11-23 00:26:33'),
(73, 7, 1, 'text', 'Meta Keys', NULL, 'Terms and Conditions', '2017-11-23 00:26:18', '2017-11-23 00:26:33'),
(74, 7, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Terms and Conditions', '2017-11-23 00:26:43', '2017-11-23 00:27:03'),
(75, 8, 1, 'text', 'Meta Title', NULL, 'Return Policy', '2017-11-23 00:28:27', '2017-11-23 00:29:09'),
(76, 8, 1, 'textarea', 'Meta Description', NULL, 'Return Policy', '2017-11-23 00:28:38', '2017-11-23 00:29:09'),
(77, 8, 1, 'text', 'Meta Keys', NULL, 'Return Policy', '2017-11-23 00:28:50', '2017-11-23 00:29:09'),
(78, 8, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Return Policy', '2017-11-23 00:29:24', '2017-11-23 00:29:41'),
(79, 9, 1, 'text', 'Meta Title', NULL, 'FAQ', '2017-11-23 00:32:08', '2017-11-23 00:33:13'),
(80, 9, 1, 'textarea', 'Meta Description', NULL, 'FAQ', '2017-11-23 00:32:20', '2017-11-23 00:33:13'),
(81, 9, 1, 'text', 'Meta Keys', NULL, 'FAQ', '2017-11-23 00:32:34', '2017-11-23 00:33:13'),
(82, 9, 2, 'text', 'Title Tab Text', NULL, 'Why do I see different prices for the same product?  You could see different prices for the same product, as it could be listed by many Sellers.', '2017-11-23 00:32:48', '2018-03-22 16:31:40'),
(84, 10, 1, 'text', 'Meta Title', NULL, 'Cart', '2017-11-23 01:34:01', '2017-11-23 01:35:00'),
(85, 10, 1, 'textarea', 'Meta Description', NULL, 'Cart', '2017-11-23 01:34:15', '2017-11-23 01:35:00'),
(86, 10, 1, 'text', 'Meta Keys', NULL, 'Cart', '2017-11-23 01:34:27', '2017-11-23 01:35:00'),
(87, 10, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Cart', '2017-11-23 01:34:44', '2017-11-23 01:35:00'),
(88, 11, 1, 'text', 'Meta Title', NULL, 'Wishlist', '2017-11-23 01:38:46', '2017-11-23 01:39:45'),
(89, 11, 1, 'textarea', 'Meta Description', NULL, 'Wishlist', '2017-11-23 01:38:58', '2017-11-23 01:39:45'),
(90, 11, 1, 'text', 'Meta Keys', NULL, 'Wishlist', '2017-11-23 01:39:10', '2017-11-23 01:39:45'),
(91, 11, 2, 'text', 'Title Tab Text', NULL, 'Rent a suit - Wishlist', '2017-11-23 01:39:22', '2017-11-23 01:39:45'),
(92, 4, 3, 'text', 'Background Text', NULL, 'World of Fashion', '2017-11-23 02:56:24', '2017-11-23 02:58:17'),
(93, 4, 3, 'text', 'Title Text 1', NULL, 'Find out the hottest craze', '2017-11-23 02:56:43', '2017-11-23 02:58:17'),
(94, 4, 3, 'text', 'Title Text 2', NULL, 'in the world of fashion', '2017-11-23 02:56:58', '2017-11-23 02:58:17'),
(95, 12, 1, 'text', 'test', NULL, 'test edited2', '2018-04-10 22:58:49', '2018-04-10 22:59:32'),
(96, 9, 2, 'wysiwyg_full', 'FAQ', NULL, NULL, '2018-06-14 13:55:07', '2018-06-14 13:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `page_section`
--

CREATE TABLE `page_section` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_section`
--

INSERT INTO `page_section` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SEO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'First', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Second', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Third', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Fourth', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Fifth', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jitu.vank@gmail.com', 'cx581NwT4j0nraRO7cbW8TGkwHrIqmqIUfvcBq9M', '2018-04-12 19:36:24'),
('mobilemitaja@gmail.com', 'uu7O3VlLFuJ7J6bE7hK7j87cSjyRo5B7HVU5MKi5', '2018-04-13 12:06:28'),
('nanou8@yahoo.com', '5aCVbohXrllSoxohO2khcdkEA6gRSMswknMJoGGA', '2018-04-14 01:10:30'),
('nanouvilgrain@gmail.ca', '5aCVbohXrllSoxohO2khcdkEA6gRSMswknMJoGGA', '2018-04-14 01:13:02'),
('yurkozub@gmail.com', 'fqmJZjhLcIGppgq1j0nRAFksgaO4dPnq0WL585Qm', '2018-04-16 17:14:08'),
('yurkozub@gmail.com', 'PeDuLsAOSEfXGDQ9v2LaNn9BcOUNkpA2ugz4Y5xy', '2018-04-17 18:15:28'),
('yurkozub@gmail.com', 'PeDuLsAOSEfXGDQ9v2LaNn9BcOUNkpA2ugz4Y5xy', '2018-04-17 18:21:07'),
('admin@gmail.com', 'K2SoQyDIkK7lZJBZtn14Bsyl3RsVncvpJJtmI4xc', '2018-04-18 16:29:22'),
('admin@gmail.com', 'K2SoQyDIkK7lZJBZtn14Bsyl3RsVncvpJJtmI4xc', '2018-04-18 16:30:32'),
('admin@gmail.com', 'K2SoQyDIkK7lZJBZtn14Bsyl3RsVncvpJJtmI4xc', '2018-04-18 16:31:07'),
('admin@gmail.com', 'K2SoQyDIkK7lZJBZtn14Bsyl3RsVncvpJJtmI4xc', '2018-04-18 16:31:38'),
('jitu.vank@gmail.com', 'K2SoQyDIkK7lZJBZtn14Bsyl3RsVncvpJJtmI4xc', '2018-04-18 16:35:54'),
('yuriyzee@gmail.com', '4ZxecRn0FBde9a9eKzjpfakc64MOJRFncswM0BGS', '2018-04-18 18:00:24'),
('illia.zhyhalinskyi@gmail.com', 'p2pVMj6Hiq1CIFGFmejSD4XtCN0he3xz4NdCW6JG', '2018-04-26 03:15:05'),
('nanou8@yahoo.com', 'rh8pIOM6Nzi4HwxwxaDD3PZGvGfSIPaSENZpXwxu', '2018-04-27 22:57:16'),
('nanou8@yahoo.com', 'rh8pIOM6Nzi4HwxwxaDD3PZGvGfSIPaSENZpXwxu', '2018-04-27 22:59:03'),
('Sokmany.chea@gmail.com', 'iu5gnDH0osCKjDtyBpqPJCTJ7HTADt21HDJvOqc8', '2018-08-03 00:43:43'),
('noreply@aalasolutions.com', 'CMA17w5GLpTjXAcPRqa8shTqFCSyIko9gXXd41Pf', '2018-08-07 20:27:29'),
('sokmany.chea@gmail.com', 'f5ijeGK9W1MTOItLbYk7pTsCaRHCsHAkZWFqbuBw', '2018-08-10 00:46:57'),
('Sokmany.chea@gmail.com', 'f5ijeGK9W1MTOItLbYk7pTsCaRHCsHAkZWFqbuBw', '2018-08-10 00:55:03'),
('noreply@aalasolutions.com', '2npVfGKUGeKkmvWlgCQ9aJ9TSNTU1rV8CzZYOBgB', '2018-08-15 11:56:22'),
('noreply@aalasolutions.com', '2npVfGKUGeKkmvWlgCQ9aJ9TSNTU1rV8CzZYOBgB', '2018-08-15 12:57:14'),
('shahroz@aalasolutions.com', 'RBTWbdJogY8vR4rQQACc9OsVctfdwJ410f0nar6o', '2018-08-15 14:12:51'),
('noreply@aalasolutions.com', 'FYVclwsPNpeuHCAe8o71puoN0WivZG70AiLGpqHj', '2018-08-27 18:49:00'),
('noreply@aalasolutions.com', 'nubS6ityTU6YNHKEz4v48XzjBeAflhOyWi73b6RY', '2018-08-27 19:09:51'),
('noreply@aalasolutions.com', 'XlQRjiGVGUBHjoxEGYyxYFKaMkJNYf2jdwernQfQ', '2018-08-27 20:13:27'),
('noreply@aalasolutions.com', 'gVyjfNC5B7xz0pZ1WZLtIpu7bJVyM3UT7zDFZMzT', '2018-08-27 20:24:03'),
('noreply@aalasolutions.com', 'gVyjfNC5B7xz0pZ1WZLtIpu7bJVyM3UT7zDFZMzT', '2018-08-27 20:26:53'),
('noreply@aalasolutions.com', 'gVyjfNC5B7xz0pZ1WZLtIpu7bJVyM3UT7zDFZMzT', '2018-08-27 20:27:39'),
('karenfricot@hotmail.fr', 'EBPcbLHMrgHZffJDgJmkO5tIC1BSJENJwC7AxC4s', '2018-08-30 07:12:15'),
('Sokmany.chea@gmail.com', 'zKDc2dvMwWOZyHPEf0FhNqlaEib2yvNfKdqBGtwh', '2018-09-07 04:33:36'),
('fricotkaren@gmail.com', 'fENy3tVY4SHR9QZX98YVB7yXiZp24PW3Wfts7SGN', '2018-09-14 20:15:56'),
('meher.a.ayed@gmail.com', 'vsAtQq9zFB1o2AAYyAGoDal4kr3fThhpfrRYa4tp', '2018-09-20 17:20:40'),
('elice.valerie@gmail.com', 'BcZoJ8KQoaY6NW2Gl0lUwLrLPR0r3hSPL3DuEgeY', '2018-09-22 00:09:37'),
('elice.valerie@gmail.com', 'BcZoJ8KQoaY6NW2Gl0lUwLrLPR0r3hSPL3DuEgeY', '2018-09-22 00:10:37'),
('fricotkaren@gmail.com', 'toAMkFBBodz2GayOKvYyLxQyuQB2ar2MwAF5GSIr', '2018-09-22 00:12:22'),
('fricotkaren@gmail.com', 'toAMkFBBodz2GayOKvYyLxQyuQB2ar2MwAF5GSIr', '2018-09-22 00:13:47'),
('fricotkaren@gmail.com', 'SjiTPe1lKPJPjJ0ghrIzp1VNdSpOGl1PXjaGpjfn', '2018-09-22 00:21:46'),
('meher.a.ayed@gmail.com', '1vU19o58NpcMV6Oj1mi6FMtYGsBG5ScJsJwVlGph', '2018-10-05 04:24:28'),
('meher.a.ayed@gmail.com', '822fPUB5mZI5gel17pOKAK0698KJJPE6SZmWjRni', '2018-10-05 04:28:40'),
('po1@po.po', 'SxckMVqxXOGJEFQ4gGMlOswjYoCBI4qLSeAZQAbf', '2018-10-09 05:56:33'),
('said@gmail.com', 'rNPDREVW7tiCvNLrM6AcMPe6egAdKD5mA6vM5Ue5', '2018-10-13 19:58:21'),
('saidanihoussemesti@gmail.com', 'yrszUXY7eYnGgFexXD9kKEVe4yO3lFMnITnA0gXr', '2018-10-13 20:02:48'),
('haythemmm@gmail.com', 'QRdaKVtWgUMPVV6l8StWCncVekQRMMJ3Itr45423', '2018-10-21 16:59:35'),
('ba.bessem@gmail.com', 'JbJ9o6C3SYYhvV7x7BGbqGYU0b97l3bPoZnFvdqf', '2018-11-04 04:49:53'),
('nanouvilgrain@gmail.ca', 'C3EzsjR2Ls4o2Q3NGIsKcveiD36p2BXjd3yIkwas', '2018-12-01 22:30:03'),
('vinay.sahu@otssolutions.com', 'HN8lCPdpvc8YZgEN9JvV0PfTX5yFStpGw6xeJLDR', '2018-12-03 15:17:58'),
('dupontalen@gmail.com', 'wLWFShANy4bT88s0BDKOSMQ1Ph1bWIkMKcLEQg8I', '2018-12-07 22:44:51'),
('dupontalen@gmail.com', '89WbIJ16i3WxgBVwAmtVDJmIs8njlgrM6e4T7JZS', '2019-01-08 16:31:31'),
('moreiregister@gmail.com', 'VTUJYJND715Bc4b211scLchlzLE09zExC8xauJl9', '2019-04-29 19:39:48'),
('afterklugge@gmail.com', '8ITTImrIFGwlswNuE0Qq8hMH3T25MiqptE3fxs0c', '2019-09-16 17:48:48'),
('liaison.giovanni@laposte.net', '1kaj2VIayoPOhiz802vLSmmELwFLgNkZyWMkIu7D', '2019-09-28 11:51:34'),
('liaison.giovanni@laposte.net', 'raFqz2GWhtdXPApIJ4hxbCVevRaOg6jdKOum36wr', '2019-09-28 12:01:07'),
('afterklugge@gmail.com', 'M2PyFKbPRPUZvM0wyQfFICYGukibt1Y3cgG9X6Bn', '2019-09-29 19:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `size` text COLLATE utf8_unicode_ci NOT NULL,
  `season` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `seo_url` text COLLATE utf8_unicode_ci NOT NULL,
  `retail_price` double NOT NULL DEFAULT '0',
  `alteration` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `condition` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Like New',
  `designer` text COLLATE utf8_unicode_ci NOT NULL,
  `cancellation` text COLLATE utf8_unicode_ci NOT NULL,
  `cleaning_price` double DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `price`, `color`, `size`, `season`, `picture`, `seo_url`, `retail_price`, `alteration`, `condition`, `designer`, `cancellation`, `cleaning_price`, `is_deleted`, `created_at`, `updated_at`) VALUES
(339, 208, 'first', 'sadasd asdsad asdasdasdsa dDSAD', 12, '#9e2121', 'Extra Small', 'Summer', 'uploads/products/1523510549__1522328520__event_pic.jpeg', 'first', 121, 'No', 'Slightly Worn', 'asdasdasd', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 1, '2018-04-12 12:22:29', '2018-12-11 11:51:44'),
(340, 211, 'test 1', 'Lorem Ipsum', 2, 'Light sea green', 'Small', 'Summer', 'uploads/products/1523518027__ebfedb9982d8aa84c296697955714bac--king-dresses.jpg', 'test-1', 123, 'No', 'Like New', 'Lorem Ipsum', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 1, '2018-04-12 14:27:08', '2018-12-11 11:51:15'),
(342, 215, 'test 3', 'Lorem Ipsum', 3, 'Multi', 'Extra Small', 'Winter', 'uploads/products/1523536891__Stile-europeo-Ferro-C-Forma-Arco-Vestiti-Cappello-Cremagliera-Stare-Sul-Pavimento-Negozio-di-Abbigliamento-di.jpg', 'test-3', 234, 'No', 'Slightly Worn', 'Lorem Ipsum', 'Moderate (Item may be cancelled without penalty 6-8 days prior the rental period)', NULL, 1, '2018-04-12 19:41:34', '2018-12-11 11:53:32'),
(343, 212, 'test4', 'lorem ipsum', 5, 'Multi', 'Medium', 'Winter', 'uploads/products/1523598837__wrapd-rent-party-dress-vaishali-nagar-jaipur-costumes-on-hire-cu1vov.jpeg', 'test4', 1234, 'No', 'Like New', 'Lorem Ipsum', 'Moderate (Item may be cancelled without penalty 6-8 days prior the rental period)', NULL, 0, '2018-04-13 12:53:57', '2018-04-13 12:53:57'),
(344, 212, 'test 5', 'lorem ipsum', 2, 'Multi', 'Medium', 'Summer', 'uploads/products/1523599538__xtend_1.jpg', 'test-5', 123, 'Yes', 'Still Looks Good', 'Lorem Ipsum', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 1, '2018-04-13 13:05:38', '2018-12-11 11:52:16'),
(345, 306, 'Test002', 'asdf', 12, 'black', 'Extra Small', 'Spring', 'uploads/products/1525958021__35f9cd0e192f2a5a28fca18ad0cd7ce0d2adeb56-lg.jpg', 'test002', 12, 'No', 'Slightly Worn', 'Designer', 'Moderate (Item may be cancelled without penalty 6-8 days prior the rental period)', NULL, 1, '2018-05-10 20:13:41', '2018-12-11 11:50:37'),
(347, 217, 'Dress no sleeves', 'Very comfortable dress', 10, 'Black and grey', 'Medium', 'Summer', 'uploads/products/1526784419__DDRESS.BLACK AND GREY  (3).JPG', 'dress-no-sleeves', 120, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-05-20 09:46:59', '2019-02-04 05:06:51'),
(348, 217, 'Dress no sleeves', 'Brand new', 10, 'black and white', 'Large', 'Summer', 'uploads/products/1526784885__DRESS AKRIS COUTURE BLACK AND WHITE.JPG', 'dress-no-sleeves-1', 900, 'No', 'Like New', 'AKRIS COUTURE', '0', NULL, 0, '2018-05-20 09:54:45', '2019-02-04 05:00:25'),
(349, 217, 'Wrapped dress', 'Very comfortable dress. Can fit size 6-10', 15, 'blue and black', 'Medium', 'Summer', 'uploads/products/1526785014__DRESS BCBG  WRAPPED BLUE FLORAL (5).JPG', 'wrapped-dress', 150, 'No', 'Like New', 'BCBG', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-20 09:56:54', '2018-05-20 10:00:57'),
(350, 217, 'Dress no sleeves', 'There are pearls around the neck. the fabric is very soft on the skin.', 10, 'beige', 'Small', 'Summer', 'uploads/products/1526785193__DRESS BETSY JOHNSON BEIGE (4).JPG', 'dress-no-sleeves-2', 250, 'No', 'Like New', 'BETSEY JOHNSON', '0', NULL, 0, '2018-05-20 09:59:53', '2019-02-04 05:00:57'),
(351, 217, 'dress with sleeves', 'Heavy fabric. Very elegant look', 12, 'Black', 'Medium', 'Fall', 'uploads/products/1526785423__DRESS BROOKS BROTHER BLACK (7).JPG', 'dress-with-sleeves', 200, 'No', 'Like New', 'BROOK BROTHERS', '0', NULL, 0, '2018-05-20 10:03:43', '2019-02-04 05:14:54'),
(352, 217, 'Dress no sleeves', 'Very light fabric', 15, 'brown', 'Medium', 'Summer', 'uploads/products/1526785635__DRESS BCBG BROWN RAYURE..JPG', 'dress-no-sleeves-3', 200, 'No', 'Like New', 'BCBG', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-20 10:07:15', '2018-05-20 10:07:15'),
(353, 217, 'Dress no sleeves', 'Light and comfortable fabric', 10, 'Black', 'Medium', 'Summer', 'uploads/products/1526785766__DRESS CALVIN KLEIN BLACK  (2).JPG', 'dress-no-sleeves-4', 250, 'No', 'Like New', 'BCBG', '0', NULL, 0, '2018-05-20 10:09:27', '2019-02-04 05:05:47'),
(354, 217, 'WRAP DRESS', 'beautiful and classy dress for work meetings', 15, 'black and white', 'Medium', 'Spring', 'uploads/products/1526785958__DRESS DIANE VON FURSTENBERG  WRAPPED  FINE LINE BLACK & WHITEV.JPG', 'wrap-dress', 300, 'No', 'Like New', 'Diane Von Furstenberg', '0', NULL, 0, '2018-05-20 10:12:38', '2019-02-04 05:08:04'),
(355, 217, 'WRAP DRESS', 'Stylish dress for work meetings', 15, 'black and white', 'Medium', 'Spring', 'uploads/products/1526786115__DRESS DIANE VON FURSTENBERG ZEBRA WRAPPED  BLACK & WHITE .JPG', 'wrap-dress-1', 350, 'No', 'Like New', 'Diane Von Furstenberg', '0', NULL, 0, '2018-05-20 10:15:15', '2019-02-04 05:10:42'),
(356, 217, 'Dress with big button', 'Great corporate style', 10, 'Black', 'Medium', 'Fall', 'uploads/products/1526786318__DRESS DKNY WRAPPED WITH BIG BOTTON BLACK (2).JPG', 'dress-with-big-button', 150, 'No', 'Like New', 'DKNY', '0', NULL, 0, '2018-05-20 10:18:38', '2019-02-04 05:03:31'),
(357, 217, 'Dress with no sleeve', 'strechy!', 15, 'pink', 'Medium', 'Summer', 'uploads/products/1526786463__DRESS FLORAL (5).JPG', 'dress-with-no-sleeve', 300, 'No', 'Like New', 'Ellie Tahari', '0', NULL, 0, '2018-05-20 10:21:03', '2019-02-04 05:09:29'),
(358, 217, 'dress with short sleeves', 'There  is an elasic around the waist. You can wear it with a belt. I will provide the pink belt with it if you want it.', 12, 'blue and white dots', 'Medium', 'Summer', 'uploads/products/1526786657__DRESS PINK TARTAN BLUE AND WHITE DOTS  (5).JPG', 'dress-with-short-sleeves', 200, 'No', 'Like New', 'PINK TARTAN', '0', NULL, 0, '2018-05-20 10:24:17', '2019-02-04 05:04:11'),
(359, 217, 'long dress with sleeves', 'Speechless! You can wear at this special wok meeting.\r\nVery well cut. Just a statement piece.', 30, 'navy blue', 'Medium', 'Winter', 'uploads/products/1526786847__DRESS MAJE BLUE   (2).JPG', 'long-dress-with-sleeves', 500, 'No', 'Like New', 'MAJE', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-20 10:27:27', '2018-05-20 10:27:27'),
(360, 217, 'dress with long sleeves', 'This dress is well adjusted to fit body. Too much for me to keep my stomach flat. I like to eat (ol)', 10, 'Black', 'Medium', 'Fall', 'uploads/products/1526787062__DRESS MISONNI BLACK.JPG', 'dress-with-long-sleeves', 200, 'No', 'Like New', 'Missoni', '0', NULL, 0, '2018-05-20 10:31:02', '2019-02-04 05:02:41'),
(361, 217, 'Dress no sleeves', 'Pockets on the side. One piece dress.', 10, 'black and purple', 'Medium', 'Summer', 'uploads/products/1526789788__DRESS PURPLE AND BLACK (4).JPG', 'dress-no-sleeves-5', 100, 'No', 'Like New', 'BCBG', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-20 11:16:28', '2018-05-20 11:16:28'),
(362, 217, 'Dress no sleeves', 'Great dress', 15, 'white ,blue , black and red', 'Medium', 'Summer', 'uploads/products/1526789882__DRESS TERI JONES BLUE WHITE RED. (3).JPG', 'dress-no-sleeves-6', 300, 'No', 'Like New', 'TERI JONES', '0', NULL, 0, '2018-05-20 11:18:02', '2019-02-04 04:57:23'),
(363, 217, 'dress with long sleeves', 'great dress', 10, 'Black', 'Medium', 'Fall', 'uploads/products/1526789987__DRESS CALVIN KLEIN DENTEL BLACK.JPG', 'dress-with-long-sleeves-1', 200, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-05-20 11:19:47', '2019-02-04 04:58:16'),
(364, 217, 'JACKET AND PANT', 'GREAT OUTFIT', 20, 'Black', 'Medium', 'Fall', 'uploads/products/1526852198__SUIT CALVIN KLEIN WITH SATIN BLAC (2).JPG', 'jacket-and-pant', 250, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-05-21 04:36:38', '2019-02-04 04:56:28'),
(365, 217, 'JACKET AND PANTS', 'Great suit.', 25, 'Black', 'Medium', 'Fall', 'uploads/products/1526852343__SUIT PANT MAX MARA BLACK (4).JPG', 'jacket-and-pants', 250, 'Yes', 'Like New', 'MAX MARA', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:39:03', '2018-05-21 04:39:03'),
(366, 217, 'suit with pants', 'GREAT SUITS', 30, 'grey', 'Medium', 'Fall', 'uploads/products/1526852553__SUIT PANTS TIGER OF SWEDEN GREY (5).JPG', 'suit-with-pants', 300, 'No', 'Like New', 'TIGER OF SWEEDEN', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:42:33', '2018-05-21 04:42:33'),
(367, 217, 'suit with pants', 'GREAT OUTFIT', 25, 'brown', 'Medium', 'Fall', 'uploads/products/1526852694__SUIT PANTS WOOL HUGO BOSS BROWN (3).JPG', 'suit-with-pants-1', 250, 'No', 'Like New', 'HUGUO BOSS', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:44:54', '2018-05-21 04:44:54'),
(368, 217, 'Suit with skirt', 'GREAT OUTFIT', 15, 'blue and white dots', 'Medium', 'Fall', 'uploads/products/1526852826__SUIT SKIRT CALVIN KLEIN BLUE.JPG', 'suit-with-skirt', 150, 'Yes', 'Like New', 'CALVIN KLEIN', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:47:06', '2018-05-21 04:47:06'),
(369, 217, 'Suit with skirt', 'GREAT OUTFIT', 20, 'brown', 'Medium', 'Fall', 'uploads/products/1526852959__SUIT SKIRT HUGUO BOSS BROWN (9).JPG', 'suit-with-skirt-1', 200, 'No', 'Like New', 'HUGUO BOSS', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:49:19', '2018-05-21 04:49:19'),
(370, 217, 'Suit with skirt', 'GREAT OUTFIT. sKIRT HAS BEEN ALTERED BY THE WAIST.', 20, 'GREY', 'Medium', 'Fall', 'uploads/products/1526853116__SUIT SKIRT KENNETH COLE GREY.JPG', 'suit-with-skirt-2', 200, 'Yes', 'Like New', 'KENNETH COLE', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:51:56', '2018-05-21 04:51:56'),
(371, 217, 'Suit with skirt', 'GREAT OUTFIT. LIGHT FABRIC', 20, 'Black AND RED', 'Small', 'Summer', 'uploads/products/1526853267__SUIT SKIRT MOSCHINO FLORAL (8).JPG', 'suit-with-skirt-3', 350, 'No', 'Like New', 'MOSCHINO', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:54:27', '2018-05-21 04:54:27'),
(372, 217, 'Suit with skirt', 'GREAT OUTFIT', 20, 'beige', 'Medium', 'Fall', 'uploads/products/1526853387__SUIT SKIRT MUI MUI BEIGE.JPG', 'suit-with-skirt-4', 200, 'No', 'Like New', 'MUI MUI', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 04:56:27', '2018-05-21 04:56:27'),
(373, 217, 'CHEMISE', 'Very light fabric with a deep cleavage. in front.', 20, 'LIGHT PINK', 'Medium', 'Spring', 'uploads/products/1526853848__TOP ALC LIGHT PINK (8).JPG', 'chemise', 300, 'No', 'Like New', 'ALC', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:04:08', '2018-05-21 05:04:08'),
(374, 217, 'CHEMISE', 'great fabric, very light.', 10, 'beige', 'Medium', 'Fall', 'uploads/products/1526853951__TOP LONG SLEEVES CALVIN KEIN BEIGE (4).JPG', 'chemise-1', 200, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-05-21 05:05:51', '2019-02-04 04:55:31'),
(375, 217, 'CHEMISE', 'lovely Louis XiV style!. heavy fabric.', 10, 'beige', 'Medium', 'Fall', 'uploads/products/1526854144__TOP VINTAGE SAK 5TH AVENUE BEIGE (3).JPG', 'chemise-2', 200, 'No', 'Like New', 'vintage Fifth Avenue', '0', NULL, 0, '2018-05-21 05:09:04', '2019-02-04 05:13:14'),
(376, 217, 'CHEMISE', 'chemise with white threads. see through material.', 10, 'black and white', 'Medium', 'Fall', 'uploads/products/1526854327__TOP SHIRT BLACK AND WHITE (3).JPG', 'chemise-3', 100, 'No', 'Still Looks Good', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:12:07', '2018-05-21 05:12:07'),
(377, 217, 'TOP', 'great top.', 10, 'Black', 'Medium', 'Summer', 'uploads/products/1526855202__TOP HUGUO BOSS BLACK (6).JPG', 'top', 100, 'No', 'Still Looks Good', 'HUGUO BOSS', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:26:42', '2018-05-21 05:26:42'),
(378, 217, 'TOP without sleeves', 'great top. with pearls', 15, 'white', 'Medium', 'Fall', 'uploads/products/1526855368__TOP NO SLEEVES ROBERT RODRIGUEZ WHITE WITH BLACK DOTS (2).JPG', 'top-without-sleeves', 200, 'No', 'Like New', 'ROBERT RODRIGUEZ', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:29:28', '2018-05-21 05:29:28'),
(379, 217, 'top', 'great top..', 15, 'beige', 'Medium', 'Fall', 'uploads/products/1526855532__TOP NO SLEEVE TAHARI BEIGE.JPG', 'top-1', 200, 'No', 'Like New', 'Ellie Tahari', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:32:12', '2018-05-21 05:32:12'),
(380, 217, 'TOP with short sleeves', 'great top.', 10, 'black and white', 'Medium', 'Summer', 'uploads/products/1526855751__TOP WORTHINGTON BLACK AND GREEEN CALVIN KLEIN..JPG', 'top-with-short-sleeves', 150, 'No', 'Like New', 'WORTHINGTON', '0', NULL, 0, '2018-05-21 05:35:51', '2019-02-04 04:53:48'),
(381, 217, 'top with wrapped nexk', 'great top.', 10, 'LIGHT PINK', 'Medium', 'Summer', 'uploads/products/1526856141__TOP NO SLEEVES WRAPPED ON NECK LIGHT PINK.JPG', 'top-with-wrapped-nexk', 150, 'No', 'Like New', 'CALVIN KLEIN', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:42:21', '2018-05-21 05:42:21'),
(382, 217, 'top without sleeves', 'great top.', 10, 'white', 'Medium', 'Summer', 'uploads/products/1526856390__TOP NO SLEEVES WITH BOW KARL L WHITE (2).JPG', 'top-without-sleeves-1', 100, 'No', 'Like New', 'CALVIN KLEIN', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:46:30', '2018-05-21 05:46:30'),
(383, 217, 'TOP', 'great top. with double layer', 10, 'white', 'Medium', 'Summer', 'uploads/products/1526856557__TOP BEIGE (3).JPG', 'top-2', 150, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-05-21 05:49:17', '2019-02-04 04:53:00'),
(384, 217, 'TOP', 'simili leather', 15, 'pink', 'Medium', 'Fall', 'uploads/products/1526856739__TOP LEATHER BCCBG PINK  (4).JPG', 'top-3', 150, 'No', 'Like New', 'BCBG', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 05:52:19', '2018-05-21 05:52:19'),
(385, 217, 'TOP with short sleeves', 'great top..', 12, 'beige', 'Medium', 'Summer', 'uploads/products/1526856978__TOP.JPG', 'top-with-short-sleeves-1', 150, 'No', 'Slightly Worn', 'vintage', '0', NULL, 0, '2018-05-21 05:56:18', '2019-02-04 05:12:06'),
(386, 217, 'jacket', 'HEAVY FABRIC', 10, 'Mustard', 'Medium', 'Fall', 'uploads/products/1526857452__JACKET BROOKS BROTHER NULTI.JPG', 'jacket', 200, 'No', 'Like New', 'BROOK BROTHERS', '0', NULL, 0, '2018-05-21 06:04:12', '2019-02-04 04:51:28'),
(387, 217, 'jacket', 'GREAT JACKET', 15, 'brown', 'Medium', 'Fall', 'uploads/products/1526857640__JACKET DIESEL FLORAL DARK.JPG', 'jacket-1', 150, 'No', 'Slightly Worn', 'DIESEL', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:07:20', '2018-05-21 06:07:20'),
(388, 217, 'TOP', 'great top..', 10, 'brown', 'Medium', 'Fall', 'uploads/products/1526857885__JACKET  RALPH LAURE BROWN.JPG', 'top-4', 150, 'No', 'Like New', 'RALPH LAUREN', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:11:25', '2018-05-21 06:11:25'),
(389, 217, 'jacket', 'GREAT JACKET', 10, 'blue', 'Medium', 'Fall', 'uploads/products/1526858152__JACKET THICK WOOL  AGNES B BLUE._0799.JPG', 'jacket-2', 200, 'No', 'Like New', 'AGNES B', '0', NULL, 0, '2018-05-21 06:15:52', '2019-02-04 04:52:16'),
(390, 217, 'jacket', 'GREAT JACKET', 10, 'blue', 'Medium', 'Fall', 'uploads/products/1526858325__JACKET WOOL BLUE (3).JPG', 'jacket-3', 150, 'No', 'Like New', 'vintage', '0', NULL, 0, '2018-05-21 06:18:45', '2019-02-04 04:50:24'),
(391, 217, 'jacket', 'great jacket', 10, 'navy blue', 'Medium', 'Fall', 'uploads/products/1526858478__JACKET THOMMY HILFILGER BLUE.JPG', 'jacket-4', 100, 'No', 'Like New', 'TOMMY HILFIGER', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:21:18', '2018-05-21 06:21:18'),
(392, 217, 'jacket', 'jacket with simili leather sleeves', 10, 'dark grey', 'Medium', 'Fall', 'uploads/products/1526858815__JACKET WITH BALCK LEATHER.JPG', 'jacket-5', 100, 'No', 'Like New', 'vintage', '0', NULL, 0, '2018-05-21 06:26:55', '2019-02-04 04:49:14'),
(393, 217, 'Vintage coat', 'great coat', 15, 'blue and white dots', 'Medium', 'Fall', 'uploads/products/1526859329__COAT BLUE DOTS.JPG', 'vintage-coat', 100, 'No', 'Slightly Worn', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:35:29', '2018-05-21 06:35:29'),
(394, 217, 'RALPH LAUREN', 'great cap', 10, 'navy blue', 'Medium', 'Fall', 'uploads/products/1526859467__COAT CAPE RALPH LAURE BLUE (4).JPG.JPG', 'ralph-lauren', 300, 'No', 'Like New', 'RALPH LAUREN', '0', NULL, 0, '2018-05-21 06:37:47', '2019-02-04 04:45:41'),
(395, 217, 'leather coat', 'great leather coat', 20, 'DARK BROWN', 'Medium', 'Fall', 'uploads/products/1526859638__COAT LEATHER BROWN (3).JPG', 'leather-coat', 150, 'No', 'Like New', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:40:41', '2018-05-21 06:40:41'),
(396, 217, 'coat', 'GREAT DESIGNER COAT.', 20, 'ORANGE', 'Medium', 'Fall', 'uploads/products/1526859799__COAT ORANGE TEVROW & CHAS (2) - Copy.JPG', 'coat', 200, 'No', 'Like New', 'TEVROW', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 06:43:19', '2018-05-21 06:43:19'),
(397, 217, 'JACKET', 'GREAT JACKET', 15, 'YELLOW', 'Medium', 'Spring', 'uploads/products/1526866047__COAT VEST COACH YELLOW.JPG', 'jacket-6', 250, 'No', 'Like New', 'COACH', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 08:27:27', '2018-05-21 08:27:27'),
(398, 217, 'Vintage coat', 'lovely green coat. 60\'s style.\r\nThere is a tiny stain in the front. Barely visible though.', 20, 'green', 'Medium', 'Spring', 'uploads/products/1526866459__COAT VINTAGE JEUNE COUTURE GREEN (2).JPG', 'vintage-coat-1', 250, 'No', 'Like New', 'JEUNE COUTURE', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 08:34:19', '2018-05-21 08:34:19'),
(399, 217, 'Vintage coat', 'Leather with fur coat. This coat keeps you warm perfectly.', 25, 'browm', 'Medium', 'Winter', 'uploads/products/1526866647__COAT VINTAGE FUR BLACK.JPG', 'vintage-coat-2', 450, 'No', 'Like New', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 08:37:27', '2018-05-21 08:37:27'),
(400, 217, 'Vintage coat', 'vintage coat with a button in the front and fur collar.', 20, 'dark purple', 'Medium', 'Winter', 'uploads/products/1526867052__COAT VINTAGE FUR PURPLE. (5).JPG', 'vintage-coat-3', 400, 'No', 'Like New', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 08:44:12', '2018-05-21 08:44:12'),
(401, 217, 'coat', 'wool coat.', 20, 'navy blue', 'Medium', 'Fall', 'uploads/products/1526867995__COAT TNT RCW BLUE (2).JPG', 'coat-1', 300, 'No', 'Like New', 'TNT RCW', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 08:59:55', '2018-05-21 08:59:55'),
(402, 217, 'rain coat', 'rain coat with multiple pockets.', 20, 'navy blue', 'Medium', 'Spring', 'uploads/products/1526868093__COAT RAIN LIGHT MONCLER .JPG', 'rain-coat', 300, 'No', 'Like New', 'Montcler', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 09:01:33', '2018-05-21 09:01:33'),
(403, 217, 'coat', 'great coat with leather sleeves', 20, 'dark grey', 'Medium', 'Winter', 'uploads/products/1526869302__COAT DIESEL DARK GREY - Copy.JPG', 'coat-2', 250, 'No', 'Like New', 'DIESEL', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-21 09:21:42', '2018-05-21 09:21:42'),
(404, 217, 'long skirt', 'GREAT LONG SKIRT', 20, 'navy blue', 'Medium', 'Fall', 'uploads/products/1526869579__KIRT VALENTINO TULIPE BLUE .JPG', 'long-skirt-5', 400, 'No', 'Like New', 'VALENTINO', '0', NULL, 0, '2018-05-21 09:26:19', '2018-06-08 00:15:00'),
(405, 217, 'SKIRT', 'short skirt', 5, 'PINK', 'Medium', 'Fall', 'uploads/products/1526869777__SKIRT  SHORT BCBG FLORAL .JPG', 'skirt', 100, 'No', 'Like New', 'BCBG', '0', NULL, 0, '2018-05-21 09:29:37', '2019-02-04 05:04:41'),
(406, 217, 'LONG SKIRT', 'long black skirt with large flowers', 8, 'Black', 'Medium', 'Fall', 'uploads/products/1526869887__SKIRT FLORAL LONG (3).JPG', 'long-skirt', 100, 'No', 'Like New', 'vintage', '0', NULL, 0, '2018-05-21 09:31:27', '2018-06-08 00:13:08'),
(407, 217, 'Leather bag', 'great leatner bag.', 10, 'green', 'Medium', 'Summer', 'uploads/products/1526949128__DIDIER LAMARTHE green (2).JPG', 'leather-bag', 350, 'No', 'Like New', 'Didier Lamarthe', '0', NULL, 0, '2018-05-22 07:32:08', '2019-02-04 04:46:11'),
(408, 217, 'handbag', 'great Lancel bag, There is a small stain in the front.', 10, 'red', 'Medium', 'Fall', 'uploads/products/1526949275__LANCEL red. MADE IN FRANCE.JPG', 'handbag', 300, 'No', 'Like New', 'LANCEL', '0', NULL, 0, '2018-05-22 07:34:35', '2019-02-04 04:44:30'),
(409, 217, 'handbag', 'Light bag', 20, 'brown', 'Medium', 'Fall', 'uploads/products/1526949369__LONGCHAMP brown. MADE IN FRANCEJ (2).JPG', 'handbag-1', 250, 'No', 'Like New', 'LONGCHAMP', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-22 07:36:09', '2018-05-22 07:36:09'),
(410, 217, 'handbag', 'great bag. There is a zipper. This bag has been fixed up in the front.', 10, 'green', 'Large', 'Fall', 'uploads/products/1526949550__SAMSONITE SILHOUETTE green (2).JPG', 'handbag-2', 200, 'Yes', 'Like New', 'SAMSONITE SILHOUETTE', '0', NULL, 0, '2018-05-22 07:39:10', '2019-02-04 04:43:48'),
(411, 217, 'handbag', 'nice purple leather. Very soft material', 10, 'purple', 'Medium', 'Spring', 'uploads/products/1526949885__vintage purple (2).JPG', 'handbag-3', 250, 'No', 'Like New', 'Vintage', '0', NULL, 0, '2018-05-22 07:44:45', '2019-02-04 04:43:15'),
(412, 217, 'handbag', 'light leather', 10, 'red', 'Medium', 'Fall', 'uploads/products/1526949983__MO85 red made in Canada.JPG', 'handbag-4', 200, 'No', 'Like New', 'MOBS', '0', NULL, 0, '2018-05-22 07:46:23', '2019-02-04 04:42:48'),
(413, 217, 'pocket bag', 'lovely pocket bag.', 7, 'brown', 'Small', 'Summer', 'uploads/products/1526950470__VINTAGE SNAKE BROWN (2).JPG', 'pocket-bag', 200, 'No', 'Like New', 'vintage', '0', NULL, 0, '2018-05-22 07:54:30', '2019-02-04 04:39:46'),
(414, 217, 'handbag', 'lovely and stylish bag', 15, 'brown', 'Medium', 'Fall', 'uploads/products/1526950569__ACCESSORIES BAG VINTAGE FUR BROWN.JPG', 'handbag-5', 200, 'No', 'Like New', 'vintage and fur', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-22 07:56:09', '2018-05-22 07:56:09'),
(415, 217, 'LONG SKIRT', 'Nice long skirt', 10, 'Mustard', 'Medium', 'Summer', 'uploads/products/1526950760__SKIRT LONG BCBG MUSTARD (2).JPG', 'long-skirt-1', 150, 'No', 'Like New', 'BCBG', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-22 07:59:20', '2018-05-22 07:59:20'),
(416, 217, 'LONG SKIRT', 'Beautiful skirt.', 10, 'beige', 'Medium', 'Winter', 'uploads/products/1526950894__SKIRT THICK LONG  WOOL BROWN (4).JPG', 'long-skirt-2', 200, 'No', 'Like New', 'vintage', '0', NULL, 0, '2018-05-22 08:01:34', '2019-02-04 04:40:18'),
(417, 217, 'LONG SKIRT', 'very classy skirt', 15, 'Grey and black', 'Medium', 'Fall', 'uploads/products/1526951285__SKIRT TOMMY H  RAYURE BLACK RED GREY (4).JPG', 'long-skirt-3', 200, 'No', 'Like New', 'TOMMY HILFIGER', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-22 08:08:05', '2018-05-22 08:08:05'),
(418, 217, 'LONG SKIRT', 'Very fluffy skirt.', 10, 'brown', 'Medium', 'Spring', 'uploads/products/1526951424__SKIRT VINTAGE BROWN .JPG', 'long-skirt-4', 150, 'No', 'Like New', 'vintage', 'Aggressive (Item may be cancelled without penalty 9 days and up prior the rental period)', NULL, 0, '2018-05-22 08:10:24', '2018-05-22 08:10:24'),
(420, 217, 'snowboard', 'great snowboard', 10, 'brown', 'Small', 'Summer', 'uploads/products/1527968971__PHOTO CLOTHES IPHONE 105.JPG', 'snowboard', 100, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 2, '2018-06-03 02:49:33', '2018-07-23 06:13:31'),
(421, 217, 'Dress no sleeves', 'LIGHT SUMMER DRESS WITH OPEN BACK', 8, 'multicolored', 'Medium', 'Summer', 'uploads/products/1531351684__CLOVER CANYON  (3).JPG', 'dress-no-sleeves-7', 350, 'No', 'Like New', 'CLOVER CANYON', '0', NULL, 0, '2018-07-12 06:28:04', '2019-02-04 04:39:17'),
(422, 217, 'Dress no sleeves', 'HEAVY FABRIC.\r\nthis dress is open on the side and in the front with a very light filet', 10, 'multicolored', 'Medium', 'Summer', 'uploads/products/1531351814__CLOVER CANYON (3).JPG', 'dress-no-sleeves-8', 350, 'No', 'Like New', 'CLOVER CANYON', '0', NULL, 0, '2018-07-12 06:30:14', '2019-02-04 04:38:52'),
(423, 217, 'jacket', 'Great and stylish jacket. Narrow at the waist to give you a nice silhouette', 10, 'navy blue', 'Medium', 'Spring', 'uploads/products/1531351953__Nanette Lepore (3).JPG', 'jacket-7', 250, 'No', 'Like New', 'NANETTE LEPORE', '0', NULL, 0, '2018-07-12 06:32:33', '2019-02-04 04:37:27'),
(424, 217, 'jacket', 'heavy jacket', 15, 'white', 'Medium', 'Fall', 'uploads/products/1531352077__MICHAEL KORS.JPG', 'jacket-8', 200, 'No', 'Like New', 'MICHAEL KORS', '0', NULL, 0, '2018-07-12 06:34:37', '2018-07-12 06:34:37'),
(425, 217, 'TOP with short sleeves', 'sheer top in the back', 8, 'Black anf green', 'Medium', 'Summer', 'uploads/products/1531352236__DSC00072.JPG', 'top-with-short-sleeves-2', 100, 'No', 'Like New', 'WORTHINGTON', '0', NULL, 0, '2018-07-12 06:37:16', '2018-07-12 06:37:16'),
(426, 217, 'TOP with short sleeves', 'Heavy fabric', 8, 'beige', 'Medium', 'Spring', 'uploads/products/1531352336__Max Azria (4).JPG', 'top-with-short-sleeves-3', 350, 'No', 'Like New', 'MAZ AZRIA', '0', NULL, 0, '2018-07-12 06:38:56', '2018-07-12 06:38:56'),
(427, 217, 'dress with short sleeves', 'Great dress that makes you slimmer because of the pattern.', 10, 'Black', 'Medium', 'Fall', 'uploads/products/1531871054__ABS.jpg', 'dress-with-short-sleeves-1', 150, 'No', 'Slightly Worn', 'ABS', '0', NULL, 0, '2018-07-18 06:44:14', '2018-07-18 06:44:14'),
(428, 217, 'Dress no sleeves', 'THe fabric is doubled.', 15, 'Black', 'Medium', 'Spring', 'uploads/products/1531871148__Calvin Klein 1.jpg', 'dress-no-sleeves-9', 200, 'No', 'Like New', 'CALVIN KLEIN', '0', NULL, 0, '2018-07-18 06:45:48', '2018-07-18 06:45:48'),
(429, 217, 'Dress no sleeves', 'Very light fabric. I usually wear it with a belt as the waist is low.\r\nIt looks great. There is a large deco;ete om front so you cam wear it with a nice png', 10, 'electric blue', 'Medium', 'Spring', 'uploads/products/1531871362__Theory 1.jpg', 'dress-no-sleeves-10', 200, 'No', 'Like New', 'Theory', '0', NULL, 0, '2018-07-18 06:49:22', '2018-07-18 06:49:22'),
(431, 217, 'DRESS', 'great outfit', 15, 'brown', 'Extra Large', 'Fall', 'uploads/products/1533250353__Capture.PNG', 'dress', 140, 'No', 'Like New', 'Christian Dior', '0', NULL, 1, '2018-08-03 05:52:33', '2018-08-03 19:38:45'),
(435, 217, 'top', 'great shirt', 2, 'navy blue', 'Medium', 'Spring', 'uploads/products/1534044534__IMG_0482.jpg', 'top-5', 60, 'Yes', 'Like New', 'marathon', '1', NULL, 0, '2018-08-12 10:28:54', '2018-08-12 10:28:54'),
(442, 317, 'Sequin Dress', 'Short in lenght, almost mini - Long sleeves - Open back, V shape - In stretch sequined fabric - Stretch lining inside', 30, 'Black', 'Extra Small', 'Fall', 'uploads/products/1536272625__F3D1D3CB-867E-4D50-BBC5-7573A293992D.jpeg', 'sequin-dress', 160, 'No', 'Like New', 'Mosaïk', '1', NULL, 1, '2018-09-07 05:23:45', '2018-12-11 11:51:02'),
(443, 302, 'RL', 'Beautiful dress', 10, 'Red', 'Small', 'Summer', 'uploads/products/1536344456__IMG_2606.JPG', 'rl', 320, 'Yes', 'Like New', 'Ralph', '1', 15, 1, '2018-09-08 01:20:56', '2018-12-11 11:50:05'),
(445, 316, 'Dress', 'Dress for dinner party', 10, 'Brown', 'Medium', 'Spring', 'uploads/products/1536350226__4897AD60-69F9-4728-AC74-F736D8868C6E.jpeg', 'dress-1', 100, 'No', 'Like New', 'Bebe', '0', 40, 0, '2018-09-08 02:57:06', '2018-10-04 08:57:32'),
(446, 217, 'Short sleeve dress', 'Great and light beige dress with  pockets', 20, 'beige', 'Medium', 'Summer', 'uploads/products/1537126456__Philip Lim dress 2.jpg', 'short-sleeve-dress', 300, 'No', 'Like New', 'Phiilip Lim', '0', NULL, 0, '2018-09-17 02:34:16', '2018-09-17 02:34:16'),
(448, 217, 'SHORT', 'Light short', 10, 'dark blue', 'Medium', 'Spring', 'uploads/products/1537126660__Smythe short 1.JPG', 'short', 200, 'No', 'Like New', 'Smyth', '0', NULL, 1, '2018-09-17 02:37:41', '2018-10-27 09:01:58'),
(450, 217, 'Dress no sleeves', 'No sleeves summer dress. Long and silk', 20, 'Black', 'Medium', 'Summer', 'uploads/products/1537129509__IMG_1150.JPG', 'dress-no-sleeves-11', 300, 'No', 'Like New', 'ROBERTO CAVALLI', '0', NULL, 1, '2018-09-17 03:25:09', '2018-10-27 09:01:09'),
(451, 217, 'Shoe', 'Summer shoes. Size 38', 15, 'PINK', 'Medium', 'Summer', 'uploads/products/1537129775__BCBG SHOE 3.JPG', 'shoe-1', 200, 'No', 'Like New', 'BCBG GIRLS', '0', NULL, 1, '2018-09-17 03:29:35', '2018-10-27 09:00:48'),
(452, 315, 'canicule', 'Canicule Rent a suit', 150, 'jaune', 'Small', 'Spring', 'uploads/products/1537550400__IMG_4562.JPG', 'canicule', 10, 'Yes', 'Like New', 'Cane Icu', '1', 10, 0, '2018-09-22 00:20:00', '2018-09-22 00:20:00'),
(453, 316, 'Dress', 'Evening dress', 15, 'Black & white', 'Medium', 'Spring', 'uploads/products/1538618157__06FB10F5-9F12-433D-BA86-019DC6EE173B.jpeg', 'dress-3', 200, 'No', 'Like New', 'Bebe', '0', 40, 0, '2018-10-04 08:55:57', '2018-10-04 08:55:57'),
(457, 303, 'Test', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 10, 'Beige', 'Extra Small', 'Summer', 'uploads/products/1541532851__screenshot.PNG', 'test', 100, 'Yes', 'Slightly Worn', 'Tester', '1', 10, 1, '2018-11-07 02:34:11', '2018-12-11 11:50:51'),
(458, 303, 'Second item', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', 50, 'Red', 'Small', 'Spring', 'uploads/products/1542701587__shipping_detail.PNG', 'second-item', 150, 'No', 'Still Looks Good', 'Tester', '1', 64, 1, '2018-11-20 15:13:07', '2018-12-11 11:45:09'),
(459, 376, 'Shirt', 'Beautiful shirt', 5, 'white', 'Medium', 'Summer', 'uploads/products/1542735417__hugo-boss-polos-a32435.jpg', 'shirt', 70, 'No', 'Like New', 'Hugo Boss', '0', 4, 1, '2018-11-21 00:36:57', '2018-12-11 11:49:16'),
(460, 376, 'Shirt R-L', 'beautiful', 5, 'Blue', 'Medium', 'Spring', 'uploads/products/1542735709__images.jpeg', 'shirt-r-l', 90, 'No', 'Like New', 'Ralph Lauren', '0', 4, 1, '2018-11-21 00:41:49', '2018-12-11 11:48:00'),
(462, 374, 'Dress-shirt Polo', 'original', 10, 'blue', 'Medium', 'Summer', 'uploads/products/1542736134__17536-ralph-lauren-femme-robe.jpg', 'dress-shirt-polo', 170, 'No', 'Like New', 'Ralph Lauren', '0', 3, 1, '2018-11-21 00:48:54', '2018-12-11 11:48:09'),
(466, 379, 'test', 'test', 111, 'asdf', 'asdf', 'asdf', '', '', 0, 'No', 'Like New', '', '', NULL, 1, '2018-12-03 23:15:42', '2018-12-03 18:32:15'),
(468, 388, 'test item', 'asdf asdf asdf asdf asdf', 2, 'Red', 'Small', 'Summer', 'uploads/products/1543921960__20161104163720_18594.jpg', 'test-item', 20, 'Yes', 'Like New', 'Shinka', '0', NULL, 1, '2018-12-04 18:12:40', '2018-12-11 11:50:44'),
(470, 217, 'SMYTH', 'Warm jacket', 15, 'grey', 'Medium', 'Fall', 'uploads/products/1544481761__FRONT.jpg', 'smyth', 500, 'No', 'Like New', 'SMYTH', '0', NULL, 0, '2018-12-11 05:42:42', '2019-02-04 04:36:43'),
(471, 217, 'Dress no sleeves', 'silk', 10, 'Black', 'Medium', 'Summer', 'uploads/products/1544508554__IMG_1150.jpg', 'dress-no-sleeves-12', 400, 'No', 'Like New', 'ROBERTO CAVALLI', '0', NULL, 0, '2018-12-11 13:09:14', '2019-02-04 05:01:40'),
(472, 217, 'Shoe', 'SIze 9', 30, 'grey', '9', 'Summer', 'uploads/products/1544508671__shoe manolo.jpg', 'shoe', 450, 'Yes', 'Like New', 'Manollo', '0', NULL, 0, '2018-12-11 13:11:11', '2018-12-18 10:56:02'),
(473, 217, 'shoe', 'Size 8.5', 15, 'pink', '8.5', 'Summer', 'uploads/products/1544508840__BCBG SHOE 3.jpg', 'shoe-2', 250, 'No', 'Like New', 'BCBG', '0', NULL, 0, '2018-12-11 13:14:02', '2018-12-18 10:56:29'),
(474, 217, 'sweater', 'Nice sweater to wear with dress or pants.', 20, 'Black', 'Medium', 'Fall', 'uploads/products/1544730444__ACNE STUDIO.JPG', 'sweater', 350, 'No', 'Like New', 'ACNE STUDIO', '0', NULL, 0, '2018-12-14 02:47:29', '2018-12-14 02:47:29'),
(475, 217, 'Shoe', 'great and comfortable shoes.\r\nSize: 8.5\r\nColor: Drak green and white', 15, 'dark green', '8.5', 'Fall', 'uploads/products/1544730596__DSC00111.JPG', 'shoe-3', 250, 'No', 'Like New', 'MADE IN BELGIUM', '0', NULL, 0, '2018-12-14 02:50:02', '2018-12-18 10:54:37'),
(476, 217, 'shoes', 'High heels with a zipper in the back.\r\nSize 8.5', 20, 'Black', '8.5', 'Summer', 'uploads/products/1544731347__MARC JACOBS.JPG', 'shoes', 250, 'No', 'Like New', 'MARC JACOBS', '0', NULL, 0, '2018-12-14 03:02:32', '2018-12-18 10:54:06'),
(477, 217, 'BAG', 'Great andbag. Light .Small  Pocket inside and on the side', 8, 'DARK BLUE', 'Medium', 'Spring', 'uploads/products/1546792031__DSC00120.JPG', 'bag', 250, 'No', 'Like New', 'Maxime Lapeyrie', '0', NULL, 0, '2019-01-06 23:27:18', '2019-02-04 04:38:16'),
(478, 217, 'handbag', 'Great handbag. No stains. Pockets inside. Vintage style', 10, 'brown', 'Medium', 'Fall', 'uploads/products/1546792243__DSC00125.JPG', 'handbag-6', 450, 'No', 'Like New', 'COACH', '0', NULL, 0, '2019-01-06 23:30:47', '2019-02-04 04:35:57'),
(479, 217, 'ATLEIN', 'Great style Long dress with top section unaligned with the bottom section on purpose.\r\nVery tight bottom section and loose top.', 10, 'Black', 'Medium', 'Winter', 'uploads/products/1548891768__FRONT.JPG', 'atlein', 450, 'No', 'Like New', 'ATLEIN', '0', NULL, 0, '2019-01-31 06:42:52', '2019-02-04 04:34:54'),
(480, 217, 'Vintage coat', 'long coat vintage with 6 buttons', 10, 'brown', 'Medium', 'Fall', 'uploads/products/1549301904__BROWN SUEDE COAT FRONT .jpg', 'vintage-coat-4', 200, 'No', 'Like New', 'vintage', '0', NULL, 0, '2019-02-05 00:38:27', '2019-02-05 00:38:27'),
(481, 217, 'Vintage coat', 'Heavy coat.', 15, 'beige', 'Medium', 'Fall', 'uploads/products/1549302009__BEIGE VINTAGE STRATION  COAT FRONT.jpg', 'vintage-coat-5', 250, 'No', 'Like New', 'vintage', '0', NULL, 0, '2019-02-05 00:40:13', '2019-02-05 00:40:13'),
(482, 217, 'jacket', 'Stylish jacket', 8, 'brown', 'Small', 'Fall', 'uploads/products/1549423081__Brown JACKET MAXMARA front.jpg', 'jacket-9', 350, 'No', 'Like New', 'BCBG', '0', NULL, 0, '2019-02-06 10:18:05', '2019-02-06 10:18:05'),
(483, 217, 'jacket', 'Shiny light jacket with fabric belt .', 6, 'Black', 'Medium', 'Spring', 'uploads/products/1551987295__JACKET BLACK front.jpg', 'jacket-10', 100, 'No', 'Like New', 'ADRIANNA PAPELLE', '0', NULL, 0, '2019-03-08 02:35:00', '2019-03-08 02:35:00'),
(484, 217, 'Thick jacket', 'Great thick jacket with african pattern.', 8, 'brown', 'Medium', 'Fall', 'uploads/products/1551987428__JACKET AFRO FRONT.jpg', 'thick-jacket', 250, 'No', 'Like New', 'TAiLORED', '0', NULL, 0, '2019-03-08 02:37:11', '2019-03-08 02:37:11'),
(485, 217, 'Leather jacket', 'Great leather jacket. BUttons on the front.', 10, 'brown', 'Medium', 'Spring', 'uploads/products/1551987772__JACK BROWN FRONT.jpg', 'leather-jacket', 200, 'No', 'Like New', 'DANIER', '0', NULL, 0, '2019-03-08 02:42:52', '2019-03-08 02:42:52'),
(486, 217, 'jacket', 'Great and warm fur jacket', 10, 'GREY', 'Medium', 'Winter', 'uploads/products/1552962443__DSC00176.JPG', 'jacket-11', 200, 'Yes', 'Like New', 'vintage', '0', NULL, 0, '2019-03-19 09:27:31', '2019-03-19 09:27:31'),
(487, 217, 'handbag', 'Large handbag with pocket inside', 8, 'red', 'Large', 'Spring', 'uploads/products/1552962582__DSC00185.JPG', 'handbag-7', 150, 'No', 'Like New', 'LANCEL', '0', NULL, 0, '2019-03-19 09:29:46', '2019-03-19 09:29:46'),
(488, 217, 'BAG', 'great small bag to wear on the side of your body.', 8, 'Black', 'Small', 'Summer', 'uploads/products/1552963351__BAG BLACK.jpg', 'bag-1', 100, 'No', 'Like New', 'LONGCHAMP', '0', NULL, 0, '2019-03-19 09:42:38', '2019-03-19 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 339, 6, '2018-04-12 12:22:29', '2018-04-12 12:22:29'),
(2, 340, 2, '2018-04-12 14:27:08', '2018-04-12 14:27:08'),
(4, 342, 6, '2018-04-12 19:41:34', '2018-04-12 19:41:34'),
(5, 343, 2, '2018-04-13 12:53:57', '2018-04-13 12:53:57'),
(6, 344, 3, '2018-04-13 13:05:38', '2018-04-13 13:05:38'),
(7, 345, 4, '2018-05-10 20:13:41', '2018-05-10 20:13:41'),
(13, 349, 2, '2018-05-20 10:00:57', '2018-05-20 10:00:57'),
(15, 352, 2, '2018-05-20 10:07:15', '2018-05-20 10:07:15'),
(22, 359, 2, '2018-05-20 10:27:27', '2018-05-20 10:27:27'),
(24, 361, 2, '2018-05-20 11:16:28', '2018-05-20 11:16:28'),
(28, 365, 1, '2018-05-21 04:39:03', '2018-05-21 04:39:03'),
(29, 366, 1, '2018-05-21 04:42:33', '2018-05-21 04:42:33'),
(30, 367, 1, '2018-05-21 04:44:54', '2018-05-21 04:44:54'),
(31, 368, 1, '2018-05-21 04:47:06', '2018-05-21 04:47:06'),
(32, 369, 1, '2018-05-21 04:49:19', '2018-05-21 04:49:19'),
(33, 370, 1, '2018-05-21 04:51:56', '2018-05-21 04:51:56'),
(34, 371, 1, '2018-05-21 04:54:27', '2018-05-21 04:54:27'),
(35, 372, 1, '2018-05-21 04:56:27', '2018-05-21 04:56:27'),
(36, 373, 5, '2018-05-21 05:04:08', '2018-05-21 05:04:08'),
(39, 376, 5, '2018-05-21 05:12:07', '2018-05-21 05:12:07'),
(40, 377, 5, '2018-05-21 05:26:42', '2018-05-21 05:26:42'),
(41, 378, 5, '2018-05-21 05:29:28', '2018-05-21 05:29:28'),
(42, 379, 5, '2018-05-21 05:32:12', '2018-05-21 05:32:12'),
(44, 381, 5, '2018-05-21 05:42:21', '2018-05-21 05:42:21'),
(45, 382, 5, '2018-05-21 05:46:30', '2018-05-21 05:46:30'),
(47, 384, 5, '2018-05-21 05:52:19', '2018-05-21 05:52:19'),
(50, 387, 3, '2018-05-21 06:07:20', '2018-05-21 06:07:20'),
(51, 388, 5, '2018-05-21 06:11:25', '2018-05-21 06:11:25'),
(54, 391, 3, '2018-05-21 06:21:18', '2018-05-21 06:21:18'),
(56, 393, 4, '2018-05-21 06:35:29', '2018-05-21 06:35:29'),
(58, 395, 4, '2018-05-21 06:40:41', '2018-05-21 06:40:41'),
(59, 396, 4, '2018-05-21 06:43:19', '2018-05-21 06:43:19'),
(60, 397, 3, '2018-05-21 08:27:27', '2018-05-21 08:27:27'),
(61, 398, 4, '2018-05-21 08:34:19', '2018-05-21 08:34:19'),
(62, 399, 4, '2018-05-21 08:37:27', '2018-05-21 08:37:27'),
(63, 400, 4, '2018-05-21 08:44:12', '2018-05-21 08:44:12'),
(64, 401, 4, '2018-05-21 08:59:55', '2018-05-21 08:59:55'),
(65, 402, 4, '2018-05-21 09:01:33', '2018-05-21 09:01:33'),
(66, 403, 4, '2018-05-21 09:21:42', '2018-05-21 09:21:42'),
(72, 409, 6, '2018-05-22 07:36:09', '2018-05-22 07:36:09'),
(77, 414, 6, '2018-05-22 07:56:09', '2018-05-22 07:56:09'),
(78, 415, 7, '2018-05-22 07:59:20', '2018-05-22 07:59:20'),
(80, 417, 7, '2018-05-22 08:08:05', '2018-05-22 08:08:05'),
(81, 418, 7, '2018-05-22 08:10:24', '2018-05-22 08:10:24'),
(89, 420, 6, '2018-06-03 02:49:33', '2018-06-03 02:49:33'),
(91, 406, 7, '2018-06-08 00:13:08', '2018-06-08 00:13:08'),
(92, 404, 7, '2018-06-08 00:15:00', '2018-06-08 00:15:00'),
(97, 424, 3, '2018-07-12 06:34:37', '2018-07-12 06:34:37'),
(98, 425, 5, '2018-07-12 06:37:16', '2018-07-12 06:37:16'),
(99, 426, 5, '2018-07-12 06:38:56', '2018-07-12 06:38:56'),
(100, 427, 2, '2018-07-18 06:44:14', '2018-07-18 06:44:14'),
(101, 428, 2, '2018-07-18 06:45:48', '2018-07-18 06:45:48'),
(102, 429, 2, '2018-07-18 06:49:22', '2018-07-18 06:49:22'),
(104, 431, 2, '2018-08-03 05:52:33', '2018-08-03 05:52:33'),
(108, 435, 5, '2018-08-12 10:28:54', '2018-08-12 10:28:54'),
(124, 442, 2, '2018-09-11 22:19:19', '2018-09-11 22:19:19'),
(125, 443, 3, '2018-09-12 02:56:03', '2018-09-12 02:56:03'),
(126, 446, 2, '2018-09-17 02:34:16', '2018-09-17 02:34:16'),
(128, 448, 8, '2018-09-17 02:37:41', '2018-09-17 02:37:41'),
(130, 450, 2, '2018-09-17 03:25:09', '2018-09-17 03:25:09'),
(131, 451, 10, '2018-09-17 03:29:35', '2018-09-17 03:29:35'),
(133, 452, 8, '2018-09-22 00:21:26', '2018-09-22 00:21:26'),
(134, 453, 11, '2018-10-04 08:55:57', '2018-10-04 08:55:57'),
(136, 445, 11, '2018-10-04 08:57:32', '2018-10-04 08:57:32'),
(145, 457, 4, '2018-11-07 02:34:11', '2018-11-07 02:34:11'),
(148, 460, 5, '2018-11-21 00:41:49', '2018-11-21 00:41:49'),
(149, 459, 5, '2018-11-21 00:43:01', '2018-11-21 00:43:01'),
(151, 462, 2, '2018-11-21 00:48:54', '2018-11-21 00:48:54'),
(152, 458, 4, '2018-11-25 20:10:34', '2018-11-25 20:10:34'),
(157, 468, 9, '2018-12-04 18:12:40', '2018-12-04 18:12:40'),
(163, 474, 3, '2018-12-14 02:47:29', '2018-12-14 02:47:29'),
(168, 476, 10, '2018-12-18 10:54:06', '2018-12-18 10:54:06'),
(169, 475, 10, '2018-12-18 10:54:37', '2018-12-18 10:54:37'),
(170, 472, 10, '2018-12-18 10:56:02', '2018-12-18 10:56:02'),
(171, 473, 10, '2018-12-18 10:56:29', '2018-12-18 10:56:29'),
(175, 479, 2, '2019-02-04 04:34:54', '2019-02-04 04:34:54'),
(176, 478, 9, '2019-02-04 04:35:57', '2019-02-04 04:35:57'),
(177, 470, 3, '2019-02-04 04:36:43', '2019-02-04 04:36:43'),
(178, 423, 3, '2019-02-04 04:37:27', '2019-02-04 04:37:27'),
(179, 477, 9, '2019-02-04 04:38:16', '2019-02-04 04:38:16'),
(180, 422, 2, '2019-02-04 04:38:52', '2019-02-04 04:38:52'),
(181, 421, 2, '2019-02-04 04:39:17', '2019-02-04 04:39:17'),
(182, 413, 6, '2019-02-04 04:39:46', '2019-02-04 04:39:46'),
(183, 416, 7, '2019-02-04 04:40:18', '2019-02-04 04:40:18'),
(184, 412, 6, '2019-02-04 04:42:48', '2019-02-04 04:42:48'),
(185, 411, 6, '2019-02-04 04:43:15', '2019-02-04 04:43:15'),
(186, 410, 6, '2019-02-04 04:43:48', '2019-02-04 04:43:48'),
(187, 408, 6, '2019-02-04 04:44:30', '2019-02-04 04:44:30'),
(188, 394, 3, '2019-02-04 04:45:41', '2019-02-04 04:45:41'),
(189, 407, 6, '2019-02-04 04:46:11', '2019-02-04 04:46:11'),
(190, 392, 3, '2019-02-04 04:49:14', '2019-02-04 04:49:14'),
(191, 390, 3, '2019-02-04 04:50:24', '2019-02-04 04:50:24'),
(192, 386, 3, '2019-02-04 04:51:28', '2019-02-04 04:51:28'),
(193, 389, 3, '2019-02-04 04:52:16', '2019-02-04 04:52:16'),
(194, 383, 5, '2019-02-04 04:53:00', '2019-02-04 04:53:00'),
(195, 380, 5, '2019-02-04 04:53:48', '2019-02-04 04:53:48'),
(197, 374, 5, '2019-02-04 04:55:31', '2019-02-04 04:55:31'),
(198, 364, 1, '2019-02-04 04:56:28', '2019-02-04 04:56:28'),
(199, 362, 2, '2019-02-04 04:57:23', '2019-02-04 04:57:23'),
(200, 363, 2, '2019-02-04 04:58:16', '2019-02-04 04:58:16'),
(202, 348, 2, '2019-02-04 05:00:25', '2019-02-04 05:00:25'),
(203, 350, 2, '2019-02-04 05:00:57', '2019-02-04 05:00:57'),
(204, 471, 11, '2019-02-04 05:01:40', '2019-02-04 05:01:40'),
(205, 360, 2, '2019-02-04 05:02:41', '2019-02-04 05:02:41'),
(207, 356, 2, '2019-02-04 05:03:32', '2019-02-04 05:03:32'),
(208, 358, 2, '2019-02-04 05:04:11', '2019-02-04 05:04:11'),
(209, 405, 7, '2019-02-04 05:04:41', '2019-02-04 05:04:41'),
(210, 353, 2, '2019-02-04 05:05:47', '2019-02-04 05:05:47'),
(211, 347, 2, '2019-02-04 05:06:51', '2019-02-04 05:06:51'),
(212, 354, 2, '2019-02-04 05:08:04', '2019-02-04 05:08:04'),
(213, 357, 2, '2019-02-04 05:09:29', '2019-02-04 05:09:29'),
(214, 355, 2, '2019-02-04 05:10:42', '2019-02-04 05:10:42'),
(215, 385, 5, '2019-02-04 05:12:06', '2019-02-04 05:12:06'),
(216, 375, 5, '2019-02-04 05:13:14', '2019-02-04 05:13:14'),
(217, 351, 2, '2019-02-04 05:14:54', '2019-02-04 05:14:54'),
(218, 480, 4, '2019-02-05 00:38:27', '2019-02-05 00:38:27'),
(219, 481, 4, '2019-02-05 00:40:13', '2019-02-05 00:40:13'),
(220, 482, 3, '2019-02-06 10:18:05', '2019-02-06 10:18:05'),
(221, 483, 3, '2019-03-08 02:35:00', '2019-03-08 02:35:00'),
(222, 484, 3, '2019-03-08 02:37:11', '2019-03-08 02:37:11'),
(223, 485, 3, '2019-03-08 02:42:52', '2019-03-08 02:42:52'),
(224, 486, 3, '2019-03-19 09:27:31', '2019-03-19 09:27:31'),
(225, 487, 9, '2019-03-19 09:29:46', '2019-03-19 09:29:46'),
(226, 488, 9, '2019-03-19 09:42:38', '2019-03-19 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

CREATE TABLE `product_photos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `sub_photo` text COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = image',
  `size` int(11) NOT NULL,
  `rotate` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `product_id`, `sub_photo`, `type`, `size`, `rotate`, `created_at`, `updated_at`) VALUES
(1, 339, 'uploads/items/208/1523510536__1522328520__event_pic.jpeg', 0, 709960, NULL, '2018-04-12 12:22:29', '2018-04-12 12:22:29'),
(2, 340, 'uploads/items/211/1523517981__ebfedb9982d8aa84c296697955714bac--king-dresses.jpg', 0, 129248, NULL, '2018-04-12 14:27:08', '2018-04-12 14:27:08'),
(4, 342, 'uploads/items/215/1523536868__Stile-europeo-Ferro-C-Forma-Arco-Vestiti-Cappello-Cremagliera-Stare-Sul-Pavimento-Negozio-di-Abbigliamento-di.jpg', 0, 191246, NULL, '2018-04-12 19:41:34', '2018-04-12 19:41:34'),
(5, 343, 'uploads/items/212/1523598809__wrapd-rent-party-dress-vaishali-nagar-jaipur-costumes-on-hire-cu1vov.jpeg', 0, 159618, NULL, '2018-04-13 12:53:57', '2018-04-13 12:53:57'),
(6, 344, 'uploads/items/212/1523599505__xtend_1.jpg', 0, 104644, NULL, '2018-04-13 13:05:38', '2018-04-13 13:05:38'),
(16, 349, 'uploads/items/217/1526784937__DRESS BCBG  WRAPPED BLUE FLORAL (4).JPG', 0, 80043, NULL, '2018-05-20 10:00:57', '2018-05-20 10:00:57'),
(17, 349, 'uploads/items/217/1526784942__DRESS BCBG  WRAPPED BLUE FLORAL (6).JPG', 0, 34718, NULL, '2018-05-20 10:00:57', '2018-05-20 10:00:57'),
(18, 349, 'uploads/items/217/1526785222__DRESS BCBG  WRAPPED BLUE FLORAL (7).JPG', 0, 33154, NULL, '2018-05-20 10:00:57', '2018-05-20 10:00:57'),
(19, 349, 'uploads/items/217/1526785238__DRESS BCBG  WRAPPED BLUE FLORAL (8).JPG', 0, 34236, NULL, '2018-05-20 10:00:57', '2018-05-20 10:00:57'),
(23, 352, 'uploads/items/217/1526785575__DRESS BCBG BROWN RAYURE. (2).JPG', 0, 67552, NULL, '2018-05-20 10:07:15', '2018-05-20 10:07:15'),
(24, 352, 'uploads/items/217/1526785590__DRESS BCBG BROWN RAYURE. (3).JPG', 0, 31373, NULL, '2018-05-20 10:07:15', '2018-05-20 10:07:15'),
(38, 359, 'uploads/items/217/1526786739__DRESS MAJE BLUE   (4).JPG', 0, 96657, NULL, '2018-05-20 10:27:27', '2018-05-20 10:27:27'),
(39, 359, 'uploads/items/217/1526786752__DRESS MAJE BLUE   (5).JPG', 0, 60217, NULL, '2018-05-20 10:27:27', '2018-05-20 10:27:27'),
(41, 361, 'uploads/items/217/1526787121__DRESS PURPLE AND BLACK BCBG  (2).JPG', 0, 28694, NULL, '2018-05-20 11:16:28', '2018-05-20 11:16:28'),
(42, 361, 'uploads/items/217/1526787129__DRESS PURPLE AND BLACK BCBG  (3).JPG', 0, 38128, NULL, '2018-05-20 11:16:28', '2018-05-20 11:16:28'),
(43, 361, 'uploads/items/217/1526787138__DRESS PURPLE AND BLACK BCBG (3).JPG', 0, 30504, NULL, '2018-05-20 11:16:28', '2018-05-20 11:16:28'),
(51, 365, 'uploads/items/217/1526852234__SUIT PANT MAX MARA BLACK (5).JPG', 0, 40609, NULL, '2018-05-21 04:39:03', '2018-05-21 04:39:03'),
(52, 365, 'uploads/items/217/1526852247__SUIT PANT MAX MARA BLACK (7).JPG', 0, 32388, NULL, '2018-05-21 04:39:03', '2018-05-21 04:39:03'),
(53, 365, 'uploads/items/217/1526852253__SUIT PANT MAX MARA BLACK (8).JPG', 0, 35933, NULL, '2018-05-21 04:39:03', '2018-05-21 04:39:03'),
(54, 366, 'uploads/items/217/1526852423__SUIT PANTS TIGER OF SWEDEN GREY (3).JPG', 0, 140583, NULL, '2018-05-21 04:42:33', '2018-05-21 04:42:33'),
(55, 366, 'uploads/items/217/1526852433__SUIT PANTS TIGER OF SWEDEN GREY.JPG', 0, 85002, NULL, '2018-05-21 04:42:33', '2018-05-21 04:42:33'),
(56, 366, 'uploads/items/217/1526852446__SUIT PANTS TIGER OF SWEDEN GREY (6).JPG', 0, 44015, NULL, '2018-05-21 04:42:33', '2018-05-21 04:42:33'),
(57, 367, 'uploads/items/217/1526852605__SUIT PANTS WOOL HUGO BOSS BROWN (2).JPG', 0, 44445, NULL, '2018-05-21 04:44:54', '2018-05-21 04:44:54'),
(58, 367, 'uploads/items/217/1526852618__SUIT PANTS WOOL HUGO BOSS BROWN (4).JPG', 0, 46318, NULL, '2018-05-21 04:44:54', '2018-05-21 04:44:54'),
(59, 368, 'uploads/items/217/1526852742__SUIT SKIRT CALVIN KLEIN BLUE (7).JPG', 0, 74101, NULL, '2018-05-21 04:47:06', '2018-05-21 04:47:06'),
(60, 368, 'uploads/items/217/1526852757__SUIT SKIRT CALVIN KLEIN BLUE (3).JPG', 0, 172738, NULL, '2018-05-21 04:47:06', '2018-05-21 04:47:06'),
(61, 368, 'uploads/items/217/1526852767__SUIT SKIRT CALVIN KLEIN BLUE (2).JPG', 0, 191531, NULL, '2018-05-21 04:47:06', '2018-05-21 04:47:06'),
(62, 369, 'uploads/items/217/1526852893__SUIT SKIRT HUGUO BOSS BROWN .JPG', 0, 116634, NULL, '2018-05-21 04:49:19', '2018-05-21 04:49:19'),
(63, 369, 'uploads/items/217/1526852907__SUIT SKIRT HUGUO BOSS BROWN (8).JPG', 0, 48126, NULL, '2018-05-21 04:49:19', '2018-05-21 04:49:19'),
(64, 369, 'uploads/items/217/1526852919__SUIT SKIRT HUGUO BOSS BROWN.JPG', 0, 38224, NULL, '2018-05-21 04:49:19', '2018-05-21 04:49:19'),
(65, 370, 'uploads/items/217/1526853014__SUIT SKIRT KENNETH COLE GREY (3).JPG', 0, 147238, NULL, '2018-05-21 04:51:56', '2018-05-21 04:51:56'),
(66, 370, 'uploads/items/217/1526853020__SUIT SKIRT KENNETH COLE GREY (5).JPG', 0, 39627, NULL, '2018-05-21 04:51:56', '2018-05-21 04:51:56'),
(67, 370, 'uploads/items/217/1526853029__SUIT SKIRT KENNETH COLE GREY (2).JPG', 0, 126639, NULL, '2018-05-21 04:51:56', '2018-05-21 04:51:56'),
(68, 371, 'uploads/items/217/1526853147__SUIT SKIRT MOSCHINO FLORAL (6).JPG', 0, 37402, NULL, '2018-05-21 04:54:27', '2018-05-21 04:54:27'),
(69, 371, 'uploads/items/217/1526853156__SUIT SKIRT MOSCHINO FLORAL (9).JPG', 0, 32071, NULL, '2018-05-21 04:54:27', '2018-05-21 04:54:27'),
(70, 371, 'uploads/items/217/1526853166__SUIT SKIRT MOSCHINO FLORAL (3).JPG', 0, 134543, NULL, '2018-05-21 04:54:27', '2018-05-21 04:54:27'),
(71, 372, 'uploads/items/217/1526853315__SUIT SKIRT MUI MUI BEIGE].JPG', 0, 117855, NULL, '2018-05-21 04:56:27', '2018-05-21 04:56:27'),
(72, 372, 'uploads/items/217/1526853317__SUIT SKIRT MUI MUI BEIGE (7).JPG', 0, 38760, NULL, '2018-05-21 04:56:27', '2018-05-21 04:56:27'),
(73, 372, 'uploads/items/217/1526853332__SUIT SKIRT MUI MUI BEIGE (2).JPG', 0, 77680, NULL, '2018-05-21 04:56:27', '2018-05-21 04:56:27'),
(74, 373, 'uploads/items/217/1526853770__TOP ALC LIGHT PINK(11).JPG', 0, 32391, NULL, '2018-05-21 05:04:08', '2018-05-21 05:04:08'),
(75, 373, 'uploads/items/217/1526853775__TOP LONG SLEEVES CALVIN KEIN BEIG (2).JPG', 0, 48676, NULL, '2018-05-21 05:04:08', '2018-05-21 05:04:08'),
(80, 376, 'uploads/items/217/1526854211__TOP SHIRT BLACK AND WHITE (2).JPG', 0, 47167, NULL, '2018-05-21 05:12:07', '2018-05-21 05:12:07'),
(81, 376, 'uploads/items/217/1526854215__TOP SHIRT BLACK AND WHITE.JPG', 0, 33082, NULL, '2018-05-21 05:12:07', '2018-05-21 05:12:07'),
(82, 377, 'uploads/items/217/1526855149__TOP HUGUO BOSS BLACK (4).JPG', 0, 116379, NULL, '2018-05-21 05:26:42', '2018-05-21 05:26:42'),
(83, 377, 'uploads/items/217/1526855162__TOP HUGUO BOSS BLACK (2).JPG', 0, 81322, NULL, '2018-05-21 05:26:42', '2018-05-21 05:26:42'),
(84, 377, 'uploads/items/217/1526855176__TOP HUGUO BOSS BLACK (3).JPG', 0, 139743, NULL, '2018-05-21 05:26:42', '2018-05-21 05:26:42'),
(85, 378, 'uploads/items/217/1526855336__TOP NO SLEEVES ROBERT RODRIGUEZ WHITE WITH BLACK DOTS (2.JPG', 0, 1139175, NULL, '2018-05-21 05:29:28', '2018-05-21 05:29:28'),
(86, 379, 'uploads/items/217/1526855425__TOP NO SLEEVE TAHARI BEIGE (3).JPG', 0, 25564, NULL, '2018-05-21 05:32:12', '2018-05-21 05:32:12'),
(87, 379, 'uploads/items/217/1526855433__TOP ELI TAHARI LIGHT BROWN (4).JPG', 0, 46740, NULL, '2018-05-21 05:32:12', '2018-05-21 05:32:12'),
(90, 381, 'uploads/items/217/1526855975__TOP NO SLEEVES WRAPPED ON NECK LIGHT PINK (2).JPG', 0, 490029, NULL, '2018-05-21 05:42:21', '2018-05-21 05:42:21'),
(91, 382, 'uploads/items/217/1526856299__TOP NO SLEEVES ROBERT RODRIGUEZ WHITE WITH BLACK DOTS (3).JPG', 0, 1393677, NULL, '2018-05-21 05:46:30', '2018-05-21 05:46:30'),
(92, 382, 'uploads/items/217/1526856312__TOP NO SLEEVES WITH BOW KARL L WHITE.JPG', 0, 697792, NULL, '2018-05-21 05:46:30', '2018-05-21 05:46:30'),
(95, 384, 'uploads/items/217/1526856611__TOP LEATHER BCCBG PINK (2).JPG', 0, 52160, NULL, '2018-05-21 05:52:19', '2018-05-21 05:52:19'),
(96, 384, 'uploads/items/217/1526856645__TOP BCBG PINK (4).JPG', 0, 49531, NULL, '2018-05-21 05:52:19', '2018-05-21 05:52:19'),
(97, 384, 'uploads/items/217/1526856676__TOP LEATHER BCCBG PINK  (2).JPG', 0, 22858, NULL, '2018-05-21 05:52:19', '2018-05-21 05:52:19'),
(103, 387, 'uploads/items/217/1526857506__JACKET DIESEL FLORAL DARK (5).JPG', 0, 24167, NULL, '2018-05-21 06:07:20', '2018-05-21 06:07:20'),
(104, 387, 'uploads/items/217/1526857517__JACKET DIESEL FLORAL DARK (3).JPG', 0, 48199, NULL, '2018-05-21 06:07:20', '2018-05-21 06:07:20'),
(105, 387, 'uploads/items/217/1526857518__JACKET DIESEL FLORAL DARK (2).JPG', 0, 34268, NULL, '2018-05-21 06:07:20', '2018-05-21 06:07:20'),
(106, 388, 'uploads/items/217/1526857769__JACKET  RALPH LAURE BROWN (3).JPG', 0, 75053, NULL, '2018-05-21 06:11:25', '2018-05-21 06:11:25'),
(107, 388, 'uploads/items/217/1526857774__JACKET  RALPH LAURE BROWN (2).JPG', 0, 70979, NULL, '2018-05-21 06:11:25', '2018-05-21 06:11:25'),
(113, 391, 'uploads/items/217/1526858371__JACKET TOMMY HILFIGER BLUE (3).JPG', 0, 33626, NULL, '2018-05-21 06:21:18', '2018-05-21 06:21:18'),
(114, 391, 'uploads/items/217/1526858381__JACKET TOMMY HILFIGER BLUE (4).JPG', 0, 30479, NULL, '2018-05-21 06:21:18', '2018-05-21 06:21:18'),
(115, 391, 'uploads/items/217/1526858386__JACKET TOMMY HILFIGER BLUE (5).JPG', 0, 29735, NULL, '2018-05-21 06:21:18', '2018-05-21 06:21:18'),
(117, 393, 'uploads/items/217/1526859180__COAT BLUE DOTS (3).JPG', 0, 178554, NULL, '2018-05-21 06:35:29', '2018-05-21 06:35:29'),
(118, 393, 'uploads/items/217/1526859206__COAT BLUE DOTS (2).JPG', 0, 148461, NULL, '2018-05-21 06:35:29', '2018-05-21 06:35:29'),
(119, 393, 'uploads/items/217/1526859211__COAT BLUE DOTS (4).JPG', 0, 158584, NULL, '2018-05-21 06:35:29', '2018-05-21 06:35:29'),
(122, 395, 'uploads/items/217/1526859535__COAT LEATHER BROWN (4) - Copy.JPG', 0, 81793, NULL, '2018-05-21 06:40:41', '2018-05-21 06:40:41'),
(123, 395, 'uploads/items/217/1526859541__COAT LEATHER BROWN (5) - Copy.JPG', 0, 109402, NULL, '2018-05-21 06:40:41', '2018-05-21 06:40:41'),
(124, 396, 'uploads/items/217/1526859693__COAT ORANGE TEVROW & CHAS - Copy.JPG', 0, 38527, NULL, '2018-05-21 06:43:19', '2018-05-21 06:43:19'),
(125, 396, 'uploads/items/217/1526859710__COAT ORANGE TEVROW & CHAS (4).JPG', 0, 130020, NULL, '2018-05-21 06:43:19', '2018-05-21 06:43:19'),
(126, 396, 'uploads/items/217/1526859714__COAT ORANGE TEVROW & CHASE(8).JPG', 0, 54539, NULL, '2018-05-21 06:43:19', '2018-05-21 06:43:19'),
(127, 397, 'uploads/items/217/1526859905__COAT VEST COACH YELLOW (4).JPG', 0, 59289, NULL, '2018-05-21 08:27:27', '2018-05-21 08:27:27'),
(128, 397, 'uploads/items/217/1526859911__COAT VEST COACH YELLOW (2).JPG', 0, 64947, NULL, '2018-05-21 08:27:27', '2018-05-21 08:27:27'),
(129, 397, 'uploads/items/217/1526859942__COAT VEST COACH YELLOW (3).JPG', 0, 59207, NULL, '2018-05-21 08:27:27', '2018-05-21 08:27:27'),
(130, 398, 'uploads/items/217/1526866134__COAT VINTAGE GREEN (3).JPG', 0, 70125, NULL, '2018-05-21 08:34:19', '2018-05-21 08:34:19'),
(131, 398, 'uploads/items/217/1526866140__COAT VINTAGE JEUNE COUTURE GREEN (3).JPG', 0, 26259, NULL, '2018-05-21 08:34:19', '2018-05-21 08:34:19'),
(132, 398, 'uploads/items/217/1526866147__COAT VINTAGE JEUNE COUTURE GREEN (5).JPG', 0, 40621, NULL, '2018-05-21 08:34:19', '2018-05-21 08:34:19'),
(133, 399, 'uploads/items/217/1526866496__COAT VINTAGE FUR BLACK..JPG', 0, 135681, NULL, '2018-05-21 08:37:27', '2018-05-21 08:37:27'),
(134, 399, 'uploads/items/217/1526866502__COAT VINTAGE FUR BLACK. (2).JPG', 0, 111851, NULL, '2018-05-21 08:37:27', '2018-05-21 08:37:27'),
(135, 399, 'uploads/items/217/1526866533__COAT VINTAGE FUR BLACK. (2).JPG', 0, 111851, NULL, '2018-05-21 08:37:27', '2018-05-21 08:37:27'),
(136, 400, 'uploads/items/217/1526866937__COAT VINTAGE FUR PURPLE..JPG', 0, 28624, NULL, '2018-05-21 08:44:12', '2018-05-21 08:44:12'),
(137, 400, 'uploads/items/217/1526866944__COAT VINTAGE FUR PURPLE.JPG', 0, 30122, NULL, '2018-05-21 08:44:12', '2018-05-21 08:44:12'),
(138, 400, 'uploads/items/217/1526866956__COAT VINTAGE FUR PURPLE. (3).JPG', 0, 94630, NULL, '2018-05-21 08:44:12', '2018-05-21 08:44:12'),
(139, 401, 'uploads/items/217/1526867904__COAT TNT RCW BLUE.JPG', 0, 65857, NULL, '2018-05-21 08:59:55', '2018-05-21 08:59:55'),
(140, 402, 'uploads/items/217/1526868035__COAT RAIN MONTCLER BLUE (7).JPG', 0, 28881, NULL, '2018-05-21 09:01:33', '2018-05-21 09:01:33'),
(141, 402, 'uploads/items/217/1526868043__COAT RAIN LIGHT MONCLER 2).JPG', 0, 31723, NULL, '2018-05-21 09:01:33', '2018-05-21 09:01:33'),
(142, 403, 'uploads/items/217/1526869244__COAT DIESEL DARK GREY  (2).JPG', 0, 229625, NULL, '2018-05-21 09:21:42', '2018-05-21 09:21:42'),
(143, 403, 'uploads/items/217/1526869249__COAT DIESEL DARK GREY  - Copy.JPG', 0, 369875, NULL, '2018-05-21 09:21:42', '2018-05-21 09:21:42'),
(144, 403, 'uploads/items/217/1526869260__COAT DIESEL DARK GREY (2) - Copy.JPG', 0, 359559, NULL, '2018-05-21 09:21:42', '2018-05-21 09:21:42'),
(154, 409, 'uploads/items/217/1526949327__LONGCHAMP brown. MADE IN FRANCEJ.JPG', 0, 909907, NULL, '2018-05-22 07:36:09', '2018-05-22 07:36:09'),
(159, 414, 'uploads/items/217/1526950526__ACCESSORIES BAG VINTAGE FUR BROWN.JPG.JPG', 0, 21202, NULL, '2018-05-22 07:56:09', '2018-05-22 07:56:09'),
(160, 415, 'uploads/items/217/1526950715__SKIRT LONG BCBG MUSTARD (3).JPG', 0, 44618, NULL, '2018-05-22 07:59:20', '2018-05-22 07:59:20'),
(161, 415, 'uploads/items/217/1526950727__SKIRT LONG BCBG MUSTARD.JPG', 0, 40904, NULL, '2018-05-22 07:59:20', '2018-05-22 07:59:20'),
(165, 417, 'uploads/items/217/1526951198__SKIRT TOMMY H  RAYURE BLACK RED GREY (6).JPG', 0, 40218, NULL, '2018-05-22 08:08:05', '2018-05-22 08:08:05'),
(166, 417, 'uploads/items/217/1526951218__SKIRT TOMMY H  RAYURE BLACK RED GREY.JPG', 0, 32277, NULL, '2018-05-22 08:08:05', '2018-05-22 08:08:05'),
(167, 417, 'uploads/items/217/1526951230__SKIRT TOMMY H  RAYURE BLACK RED GREY (3).JPG', 0, 43550, NULL, '2018-05-22 08:08:05', '2018-05-22 08:08:05'),
(168, 418, 'uploads/items/217/1526951366__SKIRT VINTAGE BROWN.JPG', 0, 45282, NULL, '2018-05-22 08:10:24', '2018-05-22 08:10:24'),
(187, 420, 'uploads/items/217/1527968956__PHOTO CLOTHES IPHONE 104.JPG', 0, 1084780, NULL, '2018-06-03 02:49:33', '2018-06-03 02:49:33'),
(188, 406, 'uploads/items/217/1526869806__SKIRT FLORAL (5).JPG', 0, 91288, NULL, '2018-06-08 00:13:08', '2018-06-08 00:13:08'),
(189, 406, 'uploads/items/217/1526869810__SKIRT FLORAL LONG.JPG', 0, 34819, NULL, '2018-06-08 00:13:08', '2018-06-08 00:13:08'),
(190, 404, 'uploads/items/217/1526869429__KIRT VALENTINO TULIPE BLUE  (2).JPG', 0, 47843, NULL, '2018-06-08 00:15:00', '2018-06-08 00:15:00'),
(199, 424, 'uploads/items/217/1531352017__MICHAEL KORS.JPG', 0, 119908, NULL, '2018-07-12 06:34:37', '2018-07-12 06:34:37'),
(200, 425, 'uploads/items/217/1531352142__Worthington (3).JPG', 0, 78602, NULL, '2018-07-12 06:37:16', '2018-07-12 06:37:16'),
(201, 427, 'uploads/items/217/1531870990__abs 3.jpg', 0, 67149, NULL, '2018-07-18 06:44:14', '2018-07-18 06:44:14'),
(202, 427, 'uploads/items/217/1531870994__ABS 4.jpg', 0, 87844, NULL, '2018-07-18 06:44:14', '2018-07-18 06:44:14'),
(203, 427, 'uploads/items/217/1531870998__ABS.jpg', 0, 30428, NULL, '2018-07-18 06:44:14', '2018-07-18 06:44:14'),
(204, 428, 'uploads/items/217/1531871091__Calvin K;lein 3pg.jpg', 0, 64022, NULL, '2018-07-18 06:45:48', '2018-07-18 06:45:48'),
(205, 428, 'uploads/items/217/1531871094__Calvin Klein 4jpg.jpg', 0, 112892, NULL, '2018-07-18 06:45:48', '2018-07-18 06:45:48'),
(206, 429, 'uploads/items/217/1531871184__Theory 3.jpg', 0, 71768, NULL, '2018-07-18 06:49:22', '2018-07-18 06:49:22'),
(207, 429, 'uploads/items/217/1531871193__Theory 2jpg.jpg', 0, 59464, NULL, '2018-07-18 06:49:22', '2018-07-18 06:49:22'),
(208, 429, 'uploads/items/217/1531871206__Theory 3.jpg', 0, 71768, NULL, '2018-07-18 06:49:22', '2018-07-18 06:49:22'),
(209, 431, 'uploads/items/217/1533250313__Capture.PNG', 0, 155958, NULL, '2018-08-03 05:52:33', '2018-08-03 05:52:33'),
(214, 442, 'uploads/items/317/1536679153__F73364B8-099B-4A89-9765-92776F9E5D29.jpeg', 0, 133019, NULL, '2018-09-11 22:19:19', '2018-09-11 22:19:19'),
(215, 443, 'uploads/items/302/1536695755__BLXX8971.jpg', 0, 260341, NULL, '2018-09-12 02:56:03', '2018-09-12 02:56:03'),
(216, 443, 'uploads/items/302/1536695755__BFWC1807.jpg', 0, 265935, NULL, '2018-09-12 02:56:03', '2018-09-12 02:56:03'),
(217, 446, 'uploads/items/217/1537126361__Philip LIm dress 3.jpg', 0, 2355733, NULL, '2018-09-17 02:34:16', '2018-09-17 02:34:16'),
(218, 446, 'uploads/items/217/1537126369__PHILIP lim dress 1.jpg', 0, 2489298, NULL, '2018-09-17 02:34:16', '2018-09-17 02:34:16'),
(221, 448, 'uploads/items/217/1537126609__Smythe short 2.JPG', 0, 2541906, NULL, '2018-09-17 02:37:41', '2018-09-17 02:37:41'),
(224, 450, 'uploads/items/217/1537129445__IMG_1151.JPG', 0, 1528098, NULL, '2018-09-17 03:25:09', '2018-09-17 03:25:09'),
(225, 450, 'uploads/items/217/1537129451__IMG_1152.JPG', 0, 2021039, NULL, '2018-09-17 03:25:09', '2018-09-17 03:25:09'),
(226, 451, 'uploads/items/217/1537129700__BCBG SHOE 2.JPG', 0, 1887979, NULL, '2018-09-17 03:29:35', '2018-09-17 03:29:35'),
(227, 451, 'uploads/items/217/1537129709__BCBG Shoe 1.JPG', 0, 2042360, NULL, '2018-09-17 03:29:35', '2018-09-17 03:29:35'),
(228, 452, 'uploads/items/315/1537550484__IMG_5008.JPG', 0, 583650, NULL, '2018-09-22 00:21:26', '2018-09-22 00:21:26'),
(229, 453, 'uploads/items/316/1538617941__100801EE-0C75-41E1-830F-AC6E8209D2B7.jpeg', 0, 1810894, NULL, '2018-10-04 08:55:57', '2018-10-04 08:55:57'),
(230, 453, 'uploads/items/316/1538618008__3BDCBB14-3878-4CF6-B662-7A1E0279C091.jpeg', 0, 745445, NULL, '2018-10-04 08:55:57', '2018-10-04 08:55:57'),
(231, 453, 'uploads/items/316/1538618010__91FFBC64-596E-41E7-840A-C47167808F3F.jpeg', 0, 1567468, NULL, '2018-10-04 08:55:57', '2018-10-04 08:55:57'),
(245, 459, 'uploads/items/376/1542735287__Fotolia_98483556_S.jpg', 0, 31862, NULL, '2018-11-21 00:43:01', '2018-11-21 00:43:01'),
(252, 474, 'uploads/items/217/1544730216__ACNE STUDIO (2).JPG', 0, 7345946, 0, '2018-12-14 02:47:29', '2018-12-14 02:47:29'),
(253, 474, 'uploads/items/217/1544730236__ACNE STUDIO (4).JPG', 0, 7528968, 0, '2018-12-14 02:47:29', '2018-12-14 02:47:29'),
(260, 476, 'uploads/items/217/1544731273__MARC JACOBS (2).JPG', 0, 7641835, NULL, '2018-12-18 10:54:06', '2018-12-18 10:54:06'),
(261, 476, 'uploads/items/217/1544731281__MARC JACOBS (3).JPG', 0, 7165494, NULL, '2018-12-18 10:54:06', '2018-12-18 10:54:06'),
(262, 475, 'uploads/items/217/1544730506__MADE IN BELGIUM.JPG', 0, 7652598, NULL, '2018-12-18 10:54:37', '2018-12-18 10:54:37'),
(263, 472, 'uploads/items/217/1544508597__shoe manolo2.jpg', 0, 1652120, NULL, '2018-12-18 10:56:02', '2018-12-18 10:56:02'),
(264, 473, 'uploads/items/217/1544508784__BCBG SHOE 2.jpg', 0, 1717657, NULL, '2018-12-18 10:56:29', '2018-12-18 10:56:29'),
(274, 479, 'uploads/items/217/1548891610__BACK.JPG', 0, 5011454, NULL, '2019-02-04 04:34:54', '2019-02-04 04:34:54'),
(275, 479, 'uploads/items/217/1548891617__CLOSE UP.JPG', 0, 7754241, NULL, '2019-02-04 04:34:54', '2019-02-04 04:34:54'),
(276, 479, 'uploads/items/217/1548891627__SIDE.JPG', 0, 5754047, NULL, '2019-02-04 04:34:54', '2019-02-04 04:34:54'),
(277, 478, 'uploads/items/217/1546792090__DSC00127.JPG', 0, 7513391, NULL, '2019-02-04 04:35:57', '2019-02-04 04:35:57'),
(278, 478, 'uploads/items/217/1546792100__DSC00126.JPG', 0, 7534462, NULL, '2019-02-04 04:35:57', '2019-02-04 04:35:57'),
(279, 478, 'uploads/items/217/1546792113__DSC00129.JPG', 0, 7679739, NULL, '2019-02-04 04:35:57', '2019-02-04 04:35:57'),
(280, 470, 'uploads/items/217/1544481694__SIDE.jpg', 0, 494772, NULL, '2019-02-04 04:36:43', '2019-02-04 04:36:43'),
(281, 470, 'uploads/items/217/1544481699__BACK 2.jpg', 0, 1700174, NULL, '2019-02-04 04:36:43', '2019-02-04 04:36:43'),
(282, 423, 'uploads/items/217/1531351858__Nanette Lepore (4).JPG', 0, 109565, NULL, '2019-02-04 04:37:27', '2019-02-04 04:37:27'),
(283, 423, 'uploads/items/217/1531351869__Nanette Lepore (2).JPG', 0, 90761, NULL, '2019-02-04 04:37:27', '2019-02-04 04:37:27'),
(284, 477, 'uploads/items/217/1546791912__DSC00123.JPG', 0, 7709776, NULL, '2019-02-04 04:38:16', '2019-02-04 04:38:16'),
(285, 477, 'uploads/items/217/1546791921__DSC00122.JPG', 0, 7594157, NULL, '2019-02-04 04:38:16', '2019-02-04 04:38:16'),
(286, 477, 'uploads/items/217/1546791936__DSC00124.JPG', 0, 7467254, NULL, '2019-02-04 04:38:16', '2019-02-04 04:38:16'),
(287, 422, 'uploads/items/217/1531351744__CLOVER CANYON  (2).JPG', 0, 418543, NULL, '2019-02-04 04:38:52', '2019-02-04 04:38:52'),
(288, 422, 'uploads/items/217/1531351746__CLOVER CANYON (3).JPG', 0, 132076, NULL, '2019-02-04 04:38:52', '2019-02-04 04:38:52'),
(289, 421, 'uploads/items/217/1531351611__CLOVER CANYON  (4).JPG', 0, 118341, NULL, '2019-02-04 04:39:17', '2019-02-04 04:39:17'),
(290, 413, 'uploads/items/217/1526950413__VINTAGE SNAKE BROWN.JPG', 0, 879027, NULL, '2019-02-04 04:39:46', '2019-02-04 04:39:46'),
(291, 416, 'uploads/items/217/1526950821__SKIRT THICK LONG  WOOL BROWN (6).JPG', 0, 38756, NULL, '2019-02-04 04:40:18', '2019-02-04 04:40:18'),
(292, 416, 'uploads/items/217/1526950830__SKIRT THICK LONG  WOOL BROWN (7).JPG', 0, 36141, NULL, '2019-02-04 04:40:18', '2019-02-04 04:40:18'),
(293, 416, 'uploads/items/217/1526950846__SKIRT THICK LONG  WOOL BROWN.JPG', 0, 150621, NULL, '2019-02-04 04:40:18', '2019-02-04 04:40:18'),
(294, 411, 'uploads/items/217/1526949611__vintage purple.JPG', 0, 1252020, NULL, '2019-02-04 04:43:15', '2019-02-04 04:43:15'),
(295, 410, 'uploads/items/217/1526949424__SAMSONITE SILHOUETTE green (4).JPG', 0, 1049920, NULL, '2019-02-04 04:43:48', '2019-02-04 04:43:48'),
(296, 410, 'uploads/items/217/1526949430__SAMSONITE SILHOUETTE green (3).JPG', 0, 948641, NULL, '2019-02-04 04:43:48', '2019-02-04 04:43:48'),
(297, 408, 'uploads/items/217/1526949207__LANCEL red. MADE IN FRANCE (2).JPG', 0, 963157, NULL, '2019-02-04 04:44:30', '2019-02-04 04:44:30'),
(298, 394, 'uploads/items/217/1526859371__COAT CAPE RALPH LAURE BLUE (6).JPG.JPG', 0, 39947, NULL, '2019-02-04 04:45:41', '2019-02-04 04:45:41'),
(299, 394, 'uploads/items/217/1526859371__COAT CAPE RALPH LAURE BLUE (3).JPG.JPG', 0, 112494, NULL, '2019-02-04 04:45:41', '2019-02-04 04:45:41'),
(300, 407, 'uploads/items/217/1526949039__DIDIER LAMARTHE green (3).JPG', 0, 1113403, NULL, '2019-02-04 04:46:11', '2019-02-04 04:46:11'),
(301, 407, 'uploads/items/217/1526949047__DIDIER LAMARTHE green.JPG', 0, 1318971, NULL, '2019-02-04 04:46:11', '2019-02-04 04:46:11'),
(302, 392, 'uploads/items/217/1526858546__JACKET WITH LEATHER SLEEVE BLACK.JPG', 0, 40699, NULL, '2019-02-04 04:49:14', '2019-02-04 04:49:14'),
(303, 390, 'uploads/items/217/1526858208__JACKET WOOL BLUE (2).JPG', 0, 133769, NULL, '2019-02-04 04:50:24', '2019-02-04 04:50:24'),
(304, 390, 'uploads/items/217/1526858221__JACKET WOOL BLUE.J (2).JPG', 0, 27424, NULL, '2019-02-04 04:50:24', '2019-02-04 04:50:24'),
(305, 386, 'uploads/items/217/1526857352__JACKET BROOKS BROTHER NULTI (4).JPG', 0, 52331, NULL, '2019-02-04 04:51:28', '2019-02-04 04:51:28'),
(306, 386, 'uploads/items/217/1526857357__JACKET BROOKS BROTHER NULTI (2).JPG', 0, 150109, NULL, '2019-02-04 04:51:28', '2019-02-04 04:51:28'),
(307, 389, 'uploads/items/217/1526857989__JACKET THICK WOOL  AGNES B BLUE.JPG', 0, 42497, NULL, '2019-02-04 04:52:16', '2019-02-04 04:52:16'),
(308, 389, 'uploads/items/217/1526857993__JACKET THICK WOOL AGNES B THICK WOOL BLUE.JPG', 0, 40464, NULL, '2019-02-04 04:52:16', '2019-02-04 04:52:16'),
(309, 389, 'uploads/items/217/1526858000__JACKET THICK WOOL  AGNES B BLUE._0799 (2).JPG', 0, 44591, NULL, '2019-02-04 04:52:16', '2019-02-04 04:52:16'),
(310, 383, 'uploads/items/217/1526856461__TOP BEIGE (5).JPG', 0, 32837, NULL, '2019-02-04 04:53:00', '2019-02-04 04:53:00'),
(311, 383, 'uploads/items/217/1526856466__TOP BEIGE (7).JPG', 0, 38517, NULL, '2019-02-04 04:53:00', '2019-02-04 04:53:00'),
(312, 380, 'uploads/items/217/1526855688__TOP WORTHINGTON BLACK AND GREEEN CALVIN KLEIN. (2).JPG', 0, 904676, NULL, '2019-02-04 04:53:48', '2019-02-04 04:53:48'),
(313, 380, 'uploads/items/217/1526855700__TOP WORTHINGTON BLACK AND GREEEN CALVIN KLEIN. (3).JPG', 0, 1351847, NULL, '2019-02-04 04:53:48', '2019-02-04 04:53:48'),
(316, 374, 'uploads/items/217/1526853891__TOP LONG SLEEVES CALVIN KEIN BEIG.JPG', 0, 37246, NULL, '2019-02-04 04:55:31', '2019-02-04 04:55:31'),
(317, 374, 'uploads/items/217/1526853895__TOP LONG SLEEVES CALVIN KEIN BEIG (3).JPG', 0, 37074, NULL, '2019-02-04 04:55:31', '2019-02-04 04:55:31'),
(318, 364, 'uploads/items/217/1526852067__SUIT CALVIN KLEIN WITH SATIN BLAC.JPG', 0, 39155, NULL, '2019-02-04 04:56:28', '2019-02-04 04:56:28'),
(319, 364, 'uploads/items/217/1526852072__SUIT CALVIN KLEIN WITH SATIN BLACK.JPG', 0, 46936, NULL, '2019-02-04 04:56:28', '2019-02-04 04:56:28'),
(320, 362, 'uploads/items/217/1526789828__DRESS TERI JONES BLUE WHITE RED. (2).JPG', 0, 142330, NULL, '2019-02-04 04:57:23', '2019-02-04 04:57:23'),
(321, 362, 'uploads/items/217/1526789834__DRESS TERI JONES BLUE WHITE RED. (4).JPG', 0, 29452, NULL, '2019-02-04 04:57:23', '2019-02-04 04:57:23'),
(322, 362, 'uploads/items/217/1526789842__DRESS TERI JONES BLUE WHITE RED..JPG', 0, 121856, NULL, '2019-02-04 04:57:23', '2019-02-04 04:57:23'),
(323, 363, 'uploads/items/217/1526789915__DRESS CALVIN KLEIN DENTEL BLACK (2).JPG', 0, 30729, NULL, '2019-02-04 04:58:16', '2019-02-04 04:58:16'),
(324, 363, 'uploads/items/217/1526789924__DRESS CALVIN KLEIN DENTEL BLACK (3).JPG', 0, 26697, NULL, '2019-02-04 04:58:16', '2019-02-04 04:58:16'),
(328, 348, 'uploads/items/217/1526784828__DRESS AKRIS COUTURE BLACK AND WHITE (2).JPG', 0, 50630, NULL, '2019-02-04 05:00:25', '2019-02-04 05:00:25'),
(329, 348, 'uploads/items/217/1526784832__DRESS AKRIS COUTURE BLACK AND WHITE (4).JPG', 0, 55949, NULL, '2019-02-04 05:00:25', '2019-02-04 05:00:25'),
(330, 348, 'uploads/items/217/1526784836__DRESS AKRIS COUTURE BLACK AND WHITE.JPG', 0, 51611, NULL, '2019-02-04 05:00:25', '2019-02-04 05:00:25'),
(331, 350, 'uploads/items/217/1526785082__DRESS BETSY JOHNSON BEIGE (3).JPG', 0, 39031, NULL, '2019-02-04 05:00:57', '2019-02-04 05:00:57'),
(332, 350, 'uploads/items/217/1526785099__DRESS BETSY JOHNSON BEIGE (5).JPG', 0, 892030, NULL, '2019-02-04 05:00:57', '2019-02-04 05:00:57'),
(333, 350, 'uploads/items/217/1526785105__DRESS BETSY JOHNSON BEIGE (7).JPG', 0, 470487, NULL, '2019-02-04 05:00:57', '2019-02-04 05:00:57'),
(334, 471, 'uploads/items/217/1544508504__Roberto Cavalli.jpg', 0, 1890502, NULL, '2019-02-04 05:01:40', '2019-02-04 05:01:40'),
(335, 360, 'uploads/items/217/1526786948__DRESS MISONNI BLACK .JPG', 0, 56516, NULL, '2019-02-04 05:02:41', '2019-02-04 05:02:41'),
(337, 358, 'uploads/items/217/1526786520__DRESS PINK TARTAN BLUE AND WHITE DOTS .JPG', 0, 114857, NULL, '2019-02-04 05:04:11', '2019-02-04 05:04:11'),
(338, 358, 'uploads/items/217/1526786530__DRESS PINK TARTAN BLUE AND WHITE DOTS  (3).JPG', 0, 90010, NULL, '2019-02-04 05:04:11', '2019-02-04 05:04:11'),
(339, 358, 'uploads/items/217/1526786552__DRESS PINK TARTAN BLUE AND WHITE DOTS  (2).JPG', 0, 95981, NULL, '2019-02-04 05:04:11', '2019-02-04 05:04:11'),
(340, 405, 'uploads/items/217/1526869709__SKIRT SHORT BCBG FLORAL  (2).JPG', 0, 54776, NULL, '2019-02-04 05:04:41', '2019-02-04 05:04:41'),
(341, 405, 'uploads/items/217/1526869717__SKIRT SHORT BCBG FLORAL (2).JPG', 0, 43309, NULL, '2019-02-04 05:04:41', '2019-02-04 05:04:41'),
(342, 405, 'uploads/items/217/1526869723__SKIRT SHORT BCBG FLORAL.JPG', 0, 34376, NULL, '2019-02-04 05:04:41', '2019-02-04 05:04:41'),
(343, 353, 'uploads/items/217/1526785697__DRESS CALVIN KLEIN BLACK .JPG', 0, 73985, NULL, '2019-02-04 05:05:47', '2019-02-04 05:05:47'),
(344, 353, 'uploads/items/217/1526785709__DRESS CALVIN KLEIN BLACK  (6).JPG', 0, 27422, NULL, '2019-02-04 05:05:47', '2019-02-04 05:05:47'),
(345, 347, 'uploads/items/217/1526784306__DDRESS.BLACK AND GREY.JPG', 0, 29131, NULL, '2019-02-04 05:06:51', '2019-02-04 05:06:51'),
(346, 354, 'uploads/items/217/1526785836__DRESS DIANE VON FURSTENBERG  WRAPPED  FINE LINE BLACK & WHITE.JPG', 0, 34447, NULL, '2019-02-04 05:08:04', '2019-02-04 05:08:04'),
(347, 354, 'uploads/items/217/1526785849__DRESS DIANE VON FURSTENBERG  WRAPPED  FINE LINE BLACK & WHITE (2).JPG', 0, 32161, NULL, '2019-02-04 05:08:04', '2019-02-04 05:08:04'),
(348, 357, 'uploads/items/217/1526786365__DRESS FLORAL.JPG', 0, 146315, NULL, '2019-02-04 05:09:29', '2019-02-04 05:09:29'),
(349, 357, 'uploads/items/217/1526786373__DRESS FLORAL (7).JPG', 0, 32538, NULL, '2019-02-04 05:09:29', '2019-02-04 05:09:29'),
(350, 357, 'uploads/items/217/1526786426__DRESS ELLIE TAHARI BLACK.JPG', 0, 20411, NULL, '2019-02-04 05:09:29', '2019-02-04 05:09:29'),
(351, 355, 'uploads/items/217/1526786004__DRESS DIANE VON FURSTENBERG ZEBRA WRAPPED  BLACK & WHITE (5).JPG', 0, 32618, NULL, '2019-02-04 05:10:42', '2019-02-04 05:10:42'),
(352, 355, 'uploads/items/217/1526786012__DRESS DIANE VON FURSTENBERG ZEBRA WRAPPED  BLACK & WHITE (4).JPG', 0, 31214, NULL, '2019-02-04 05:10:42', '2019-02-04 05:10:42'),
(353, 385, 'uploads/items/217/1526856806__TOP (8).JPG', 0, 43418, NULL, '2019-02-04 05:12:06', '2019-02-04 05:12:06'),
(354, 385, 'uploads/items/217/1526856825__TOP (9).JPG', 0, 44344, NULL, '2019-02-04 05:12:06', '2019-02-04 05:12:06'),
(355, 385, 'uploads/items/217/1526856830__TOP (3).JPG', 0, 41932, NULL, '2019-02-04 05:12:06', '2019-02-04 05:12:06'),
(356, 375, 'uploads/items/217/1526853985__TOP VINTAGE SAK 5TH AVENUE BEIGE (2).JPG', 0, 116590, NULL, '2019-02-04 05:13:14', '2019-02-04 05:13:14'),
(357, 375, 'uploads/items/217/1526853988__TOP VINTAGE SAK 5TH AVENUE BEIGE.JPG', 0, 130259, NULL, '2019-02-04 05:13:14', '2019-02-04 05:13:14'),
(358, 351, 'uploads/items/217/1526785350__DRESS BROOKS BROTHER BLACK (6) - Copy - Copy.JPG', 0, 40650, NULL, '2019-02-04 05:14:54', '2019-02-04 05:14:54'),
(359, 351, 'uploads/items/217/1526785360__DRESS BROOKS BROTHER BLACK (8).JPG', 0, 30600, NULL, '2019-02-04 05:14:54', '2019-02-04 05:14:54'),
(360, 351, 'uploads/items/217/1526785371__DRESS BROOKS BROTHER BLACK (15).JPG', 0, 45881, NULL, '2019-02-04 05:14:54', '2019-02-04 05:14:54'),
(361, 480, 'uploads/items/217/1549301857__BROWN SUEDE COAT SIDET.jpg', 0, 5802432, 0, '2019-02-05 00:38:27', '2019-02-05 00:38:27'),
(362, 480, 'uploads/items/217/1549301863__BROWN SUEDE COAT BACKjpg.jpg', 0, 5578524, 0, '2019-02-05 00:38:27', '2019-02-05 00:38:27'),
(363, 480, 'uploads/items/217/1549301875__BROWN SUEDE  COAT BACK.jpg', 0, 5590326, 0, '2019-02-05 00:38:27', '2019-02-05 00:38:27'),
(364, 481, 'uploads/items/217/1549301960__BEIGE VINTAGE STRATION  COAT SIDE.jpg', 0, 5174207, 0, '2019-02-05 00:40:13', '2019-02-05 00:40:13'),
(365, 481, 'uploads/items/217/1549301952__BEIGE VINTAGE STRATION  COAT BACK.jpg', 0, 5832458, 0, '2019-02-05 00:40:13', '2019-02-05 00:40:13'),
(366, 481, 'uploads/items/217/1549301974__BEIGE VINTAGE STRATION  COAT FRONT.jpg', 0, 5413461, 0, '2019-02-05 00:40:13', '2019-02-05 00:40:13'),
(367, 482, 'uploads/items/217/1549423010__Brown JACKET MAXMARA back 2.jpg', 0, 5904584, 0, '2019-02-06 10:18:05', '2019-02-06 10:18:05'),
(368, 482, 'uploads/items/217/1549423010__Brown JACKET MAXMARA OPEN.jpg', 0, 5779761, 0, '2019-02-06 10:18:05', '2019-02-06 10:18:05'),
(369, 482, 'uploads/items/217/1549423029__Brown JACKET MAXMARA side.jpg', 0, 5316785, 0, '2019-02-06 10:18:05', '2019-02-06 10:18:05'),
(370, 483, 'uploads/items/217/1551987160__JACKET BLACK SIDE.jpg', 0, 4232393, 0, '2019-03-08 02:35:00', '2019-03-08 02:35:00'),
(371, 483, 'uploads/items/217/1551987169__JACKET BLACK BACK.jpg', 0, 3214845, 0, '2019-03-08 02:35:00', '2019-03-08 02:35:00'),
(372, 484, 'uploads/items/217/1551987368__JACKET AFRO BACK.jpg', 0, 5303360, 0, '2019-03-08 02:37:11', '2019-03-08 02:37:11'),
(373, 484, 'uploads/items/217/1551987376__JACKET AFRO SIDE.jpg', 0, 5526952, 0, '2019-03-08 02:37:11', '2019-03-08 02:37:11'),
(374, 485, 'uploads/items/217/1551987480__JACKET BROWN BACK.jpg', 0, 5201472, 0, '2019-03-08 02:42:52', '2019-03-08 02:42:52'),
(375, 485, 'uploads/items/217/1551987681__JACKET BROWN SIDE.jpg', 0, 3990848, 0, '2019-03-08 02:42:52', '2019-03-08 02:42:52'),
(376, 486, 'uploads/items/217/1552962391__DSC00177.JPG', 0, 7214912, 0, '2019-03-19 09:27:31', '2019-03-19 09:27:31'),
(377, 487, 'uploads/items/217/1552962489__DSC00183.JPG', 0, 7493527, 0, '2019-03-19 09:29:46', '2019-03-19 09:29:46'),
(378, 487, 'uploads/items/217/1552962511__DSC00184.JPG', 0, 7583509, 0, '2019-03-19 09:29:46', '2019-03-19 09:29:46'),
(379, 488, 'uploads/items/217/1552963284__BAG 2.jpg', 0, 6836203, 0, '2019-03-19 09:42:38', '2019-03-19 09:42:38'),
(380, 488, 'uploads/items/217/1552963291__BAG 3.jpg', 0, 7626476, 0, '2019-03-19 09:42:38', '2019-03-19 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_user_review`
--

CREATE TABLE `product_user_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_user_review`
--

INSERT INTO `product_user_review` (`id`, `user_id`, `product_id`, `rating`, `title`, `comment`, `created_at`, `updated_at`) VALUES
(1, 212, 339, '2', 'test', 'test', '2018-04-12 08:38:01', '2018-04-12 08:38:01'),
(2, 220, 340, '2', 'asd', 'asdad', '2018-04-13 05:43:55', '2018-04-13 05:43:55'),
(3, 220, 343, '5', 'sdas', 'asdsad', '2018-04-13 06:00:37', '2018-04-13 06:00:37'),
(4, 319, 433, '4', '', 'asdf asdf', '2018-08-15 08:36:11', '2018-08-15 08:36:11'),
(5, 319, 433, '4', '', 'All Comments', '2018-08-15 09:44:01', '2018-08-15 09:44:01'),
(6, 314, 436, '4', '', 'asdf asdf', '2018-08-16 11:52:46', '2018-08-16 11:52:46'),
(7, 379, 435, '4', '', 'The Product was perfect', '2018-12-14 10:34:28', '2018-12-14 10:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `rattings`
--

CREATE TABLE `rattings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `delivery_rat` varchar(50) NOT NULL,
  `time_rat` varchar(50) NOT NULL,
  `cleanliness_rat` varchar(50) NOT NULL,
  `accuracy_rat` varchar(50) NOT NULL,
  `communication_rat` varchar(50) NOT NULL,
  `quality_rat` varchar(50) NOT NULL,
  `condition_rat` varchar(50) NOT NULL,
  `overall_rat` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rattings`
--

INSERT INTO `rattings` (`id`, `user_id`, `product_id`, `delivery_rat`, `time_rat`, `cleanliness_rat`, `accuracy_rat`, `communication_rat`, `quality_rat`, `condition_rat`, `overall_rat`, `created_at`, `updated_at`) VALUES
(1, 379, 435, '4', '', '0', '5', '3', '5', '', '5', '2018-12-14 17:34:28', '2018-12-14 17:34:28'),
(2, 217, 435, '', '4', '5', '', '5', '', '', '5', '2018-12-21 03:47:00', '2018-12-21 03:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `rent_details`
--

CREATE TABLE `rent_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `delivery_option` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `return_delivery_option` text,
  `return_date` timestamp NULL DEFAULT NULL,
  `rental_start_date` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipping_info` varchar(255) DEFAULT NULL,
  `return_shipping_info` varchar(255) DEFAULT NULL,
  `rental_end_date` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street_number` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `route` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `pay_key` varchar(255) NOT NULL DEFAULT '',
  `cart_total` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `rating` varchar(255) DEFAULT NULL,
  `user_review_submitted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_details`
--

INSERT INTO `rent_details` (`id`, `user_id`, `product_id`, `delivery_option`, `return_delivery_option`, `return_date`, `rental_start_date`, `shipping_info`, `return_shipping_info`, `rental_end_date`, `street_number`, `route`, `address2`, `address3`, `city`, `state`, `postal_code`, `country`, `contact_number`, `email`, `description`, `status`, `reason`, `pay_key`, `cart_total`, `total`, `rating`, `user_review_submitted`, `created_at`, `updated_at`) VALUES
(1, 212, 340, 'Regular mail', NULL, NULL, '04/18/2018', NULL, NULL, '04/23/2018', '45', 'Rodovia Fernão Dias', 'sda', 'asd', 'asdsa', 'MG', '35460-000', 'Brazil', '123456789', 'aa@bb.com', 'asdad', 'Canceled', NULL, '', 0, 12, NULL, 0, '2018-04-12 14:31:12', '2018-04-12 14:32:46'),
(2, 212, 339, 'Localization', NULL, NULL, '04/16/2018', NULL, NULL, '04/18/2018', 'sad', 'asd', 'asd', 'asd', 'Rajkot', 'GJ', '360002', 'India', '2345', 'aa@bb.com', 'asdsad', 'Payment Accepted', NULL, 'AP-1GB210784G0594514', 0, 36, NULL, 1, '2018-04-12 14:38:27', '2018-04-12 15:38:01'),
(3, 212, 342, 'Pick up From UPS', NULL, NULL, '04/27/2018', NULL, NULL, '05/03/2018', 'jfjf', 'Ellisbridge', 'bfnd', '', 'Ahmedabad', 'Ahmedabad', '380006', 'India', '1234567890', 'bch@gmail.com', 'hxhd hxjdjd jxjdj', 'Payment Accepted', NULL, '', 0, 21, NULL, 0, '2018-04-12 19:44:20', '2018-04-12 19:49:47'),
(4, 220, 340, 'Localization', NULL, NULL, '04/19/2018', NULL, NULL, '04/21/2018', 'as', 'assdsa', 'sdsadasd', 'sada', 'Ahmedabad', 'GJ', '380013', 'India', '1234567', 'aa@bb.com', 'dsfghgfsw', 'Payment Accepted', NULL, 'AP-99L959502H071083T', 0, 6, NULL, 1, '2018-04-13 12:35:17', '2018-04-13 12:43:55'),
(5, 220, 343, 'Localization', NULL, NULL, '04/18/2018', NULL, NULL, '04/19/2018', '89', 'Paseo de la Castellana', 'gdfgfd', 'fdgd', 'Madrid', 'Comunidad de Madrid', '28046', 'Spain', '12345678', 'aa@bb.com', 'asdfgg', 'Payment Accepted', NULL, 'AP-2AV603822U7929904', 0, 10, NULL, 1, '2018-04-13 12:55:02', '2018-04-13 13:00:37'),
(6, 220, 344, 'Regular mail', NULL, NULL, '04/17/2018', NULL, NULL, '04/19/2018', '780', 'Avenida Corrientes', 'fds', 'sdfdsf', 'Adsda', 'CABA', 'C1043', 'Argentina', '12345678', 'aa@bb.com', 'asdsasad', 'Declined', NULL, '', 0, 6, NULL, 0, '2018-04-13 13:07:15', '2018-04-13 13:07:44'),
(7, 220, 343, 'Localization', NULL, NULL, '04/27/2018', NULL, NULL, '04/29/2018', '902', 'Broadway', 'dsff', 'dsfsd', 'New York', 'NY', '10010', 'United States', '12345678', 'aa@bb.com', 'sadfds', 'Canceled', NULL, '', 0, 15, NULL, 0, '2018-04-13 13:08:47', '2018-04-13 13:09:32'),
(8, 224, 343, 'Localization', NULL, NULL, '04/25/2018', NULL, NULL, '04/25/2018', '54', '5454', 'dvfbgdf', 'gdertfgbrd', 'Лондон', 'Англія', '25454', 'Великобританія', 'dgf', 'andrewbarchuk@gmail.com', '', 'Canceled', NULL, '', 0, 5, NULL, 0, '2018-04-16 14:40:23', '2018-04-16 15:20:58'),
(10, 224, 344, 'Localization', NULL, NULL, '04/18/2018', NULL, NULL, '04/19/2018', '26', '20', 'Rivna str', '', 'Kyiv', 'new', '02000', 'Ukraine', '050000000', 'andrewbarchuk@gmail.com', 'test description', 'Pending', NULL, '', 0, 4, NULL, 0, '2018-04-16 16:06:12', '2018-04-16 16:43:02'),
(11, 225, 344, 'Localization', NULL, NULL, '04/27/2018', NULL, NULL, '04/27/2018', 'd', 'd', 'd', 'd', 'Юкайа', 'CA', '95482', 'Сполучені Штати Америки', '05000000000000000000000000', 'yurkozub@gmail.com', '', 'Canceled', NULL, '', 0, 2, NULL, 0, '2018-04-16 17:45:03', '2018-04-16 23:26:54'),
(12, 301, 344, 'Localization', NULL, NULL, '04/27/2018', NULL, NULL, '05/01/2018', '111', 'Broadway', '', '', 'New York', 'NY', '10006', 'Сполучені Штати Америки', '05000000000000000000', 'illia.zhyhalinskyi@gmail.com', '111', 'Canceled', NULL, '', 0, 10, NULL, 0, '2018-04-26 15:48:52', '2018-04-26 15:49:48'),
(13, 306, 342, 'Regular mail', NULL, NULL, '05/11/2018', NULL, NULL, '05/13/2018', 'soborna', 'dsfa', 'gS', 'SDg', 'SFg', 'fdag', '1234', 'dgha', '1234567', 'sfgrea@gfths.fgy', '', 'Pending', NULL, '', 0, 9, NULL, 0, '2018-05-08 16:00:54', '2018-05-08 16:01:02'),
(14, 310, 344, 'Localization', NULL, NULL, '05/12/2018', NULL, NULL, '05/12/2018', '120', '150 ft road', 'Corporate levels', 'Head office', 'Brussels', 'Bruseels', '360006', 'Belgium', '9833448899', 'bhargavdjoshi@gmail.com', 'Suit', 'Pending', NULL, '', 0, 2, NULL, 0, '2018-05-11 13:36:13', '2018-05-11 13:37:14'),
(15, 310, 345, 'Localization', NULL, NULL, '05/15/2018', NULL, NULL, '05/15/2018', '12', '18', 'COrporate levels', 'head office', 'Brussels', 'Brussels', '360006', 'Belgium', '9833448899', 'bhargavdjoshi@gmail.com', 'hi', 'Pending', NULL, '', 0, 12, NULL, 0, '2018-05-11 13:53:51', '2018-05-11 13:54:00'),
(18, 217, 419, 'Localization', 'Regular mail', NULL, '06/07/2018', NULL, NULL, '06/09/2018', '15', 'Yonge', '', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Payment Accepted', NULL, 'PAY-57E94226UA562841KLMJPEYI', 0, 30, NULL, 0, '2018-06-03 02:21:17', '2018-06-03 02:40:34'),
(20, 217, 417, 'Localization', NULL, NULL, '06/30/2018', NULL, NULL, '06/30/2018', '61', '61', '', '', 'Toronto', 'ON', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 15, NULL, 0, '2018-06-28 05:05:23', '2019-10-23 04:28:59'),
(21, 217, 414, 'Ups', NULL, NULL, '06/30/2018', NULL, NULL, '06/30/2018', '61', 'Glenmore Rd', '', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 15, NULL, 0, '2018-06-28 05:14:49', '2019-10-23 04:29:37'),
(23, 217, 418, 'Localization', NULL, NULL, '07/11/2018', NULL, NULL, '07/16/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 60, NULL, 0, '2018-07-04 06:43:09', '2019-10-23 04:36:37'),
(24, 217, 361, 'Localization', NULL, NULL, '07/12/2018', NULL, NULL, '07/16/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 50, NULL, 0, '2018-07-04 07:23:04', '2019-10-23 04:35:25'),
(25, 217, 418, 'Please Select Delivery', NULL, NULL, '07/26/2018', NULL, NULL, '07/26/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Canceled', NULL, '', 0, 10, NULL, 0, '2018-07-06 20:19:04', '2018-07-11 03:55:33'),
(26, 217, 384, 'Please Select Delivery', NULL, NULL, '07/17/2018', NULL, NULL, '07/23/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 105, NULL, 0, '2018-07-07 01:24:09', '2018-07-07 01:42:47'),
(27, 217, 418, 'Localization', NULL, NULL, '07/25/2018', NULL, NULL, '07/25/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 10, NULL, 0, '2018-07-12 02:52:03', '2019-10-23 04:36:26'),
(28, 217, 386, 'Regular mail', NULL, NULL, '07/18/2018', NULL, NULL, '07/23/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 90, NULL, 0, '2018-07-12 03:20:49', '2019-10-23 04:38:01'),
(29, 217, 387, 'Localization', NULL, NULL, '07/25/2018', NULL, NULL, '07/25/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 15, NULL, 0, '2018-07-12 03:27:35', '2018-07-18 04:18:01'),
(30, 217, 425, 'Ups', NULL, NULL, '07/19/2018', NULL, NULL, '07/19/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 8, NULL, 0, '2018-07-14 05:04:50', '2018-07-18 04:18:06'),
(31, 217, 423, 'Regular mail', NULL, NULL, '07/26/2018', NULL, NULL, '07/26/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 15, NULL, 0, '2018-07-18 04:16:38', '2019-10-23 04:35:04'),
(32, 217, 420, 'Localization', NULL, NULL, '07/18/2018', NULL, NULL, '07/18/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 10, NULL, 0, '2018-07-18 04:36:52', '2018-07-18 04:37:15'),
(33, 217, 424, 'Regular mail', NULL, NULL, '07/18/2018', NULL, NULL, '07/18/2018', 'glenmore road', '', 'glenmore road', '', 'toronto', 'Ontario', '10012', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 15, NULL, 0, '2018-07-18 04:42:16', '2018-07-18 04:42:44'),
(34, 217, 422, 'Regular mail', NULL, NULL, '07/27/2018', NULL, NULL, '07/27/2018', 'glenmore road', '', 'glenmore road', '', 'toronto', 'Ontario', '10012', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 20, NULL, 0, '2018-07-18 04:44:37', '2018-07-23 11:23:37'),
(38, 217, 428, 'Regular mail', NULL, NULL, '07/25/2018', NULL, NULL, '07/31/2018', 'glenmore road', '', '', '', 'toronto', 'on', 'M4l3m2', 'canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 105, NULL, 0, '2018-07-23 11:26:46', '2019-10-23 04:37:21'),
(39, 217, 427, 'Regular mail', NULL, NULL, '07/25/2018', NULL, NULL, '08/01/2018', '61 glenmore road', '', '61 glenmore road', '', 'torotnto', 'on', 'm4l3m2', 'canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 80, NULL, 0, '2018-07-23 11:30:39', '2018-07-23 11:31:46'),
(40, 217, 415, 'Localization', NULL, NULL, '07/25/2018', NULL, NULL, '07/31/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 70, NULL, 0, '2018-07-24 05:27:28', '2018-07-24 05:28:19'),
(41, 208, 429, 'Localization', 'Localization', NULL, '07/28/2018', NULL, NULL, '07/30/2018', 'zcZcz', '', 'zcC', '', 'cZC', 'cZC', 'cCCC', 'CC', '12121212121', 'test@gmail.com', 'fasfasf', 'Accepted', NULL, '', 0, 30, NULL, 0, '2018-07-27 20:12:13', '2018-08-06 08:29:44'),
(44, 217, 431, 'Localization', NULL, NULL, '08/22/2018', NULL, NULL, '08/30/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 135, NULL, 0, '2018-08-03 05:54:01', '2018-08-03 05:54:19'),
(45, 217, 429, 'Localization', 'Localization', NULL, '08/23/2018', NULL, NULL, '08/28/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Accepted', NULL, '', 0, 60, NULL, 0, '2018-08-05 11:19:08', '2018-08-06 08:30:06'),
(46, 217, 375, 'Regular mail', NULL, NULL, '08/23/2018', NULL, NULL, '09/02/2018', '61', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 220, NULL, 0, '2018-08-07 09:44:27', '2018-08-07 09:47:41'),
(47, 217, 407, 'Localization', NULL, NULL, '08/15/2018', NULL, NULL, '08/19/2018', '61', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 100, NULL, 0, '2018-08-07 09:47:12', '2018-08-07 09:47:42'),
(51, 217, 430, 'Regular mail', 'Regular mail', NULL, '08/22/2018', NULL, NULL, '08/26/2018', 'glenmore road', '', 'glenmore road', '', 'Toronto', 'on', 'M4L 3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', 'glenmore road', 'Accepted', NULL, '', 0, 100, NULL, 0, '2018-08-10 05:22:52', '2018-08-15 17:35:27'),
(71, 217, 342, 'Localization', NULL, NULL, '10/16/2018', NULL, NULL, '10/16/2018', 'glenmore road', '', 'glenmore road', '', 'toronto', 'ON', 'M4L3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Pending', NULL, '', 0, 3, NULL, 0, '2018-10-06 02:12:43', '2018-10-06 02:13:57'),
(72, 351, 372, 'Localization', NULL, NULL, '10/28/2018', NULL, NULL, '10/30/2018', 'my street', '', 'my _address', '', 'tunis', 'tunis', '8021', 'tunisia', '20172954', 'saidanihoussemesti@gmail.com', 'description', 'Pending', NULL, '', 0, 60, NULL, 0, '2018-10-27 17:31:53', '2018-11-07 02:38:04'),
(81, 363, 456, 'Localization', NULL, NULL, '11/03/2018', NULL, NULL, '11/04/2018', 'N8, Tunis, Tunisie', '', 'N8, Tunis, Tunisie', '', 'Tunis', 'Tunis', '123456', 'Tunisie', '1234567890', 'saidhoussem@gmail.com', '', 'Declined', NULL, '', 0, 40, NULL, 0, '2018-11-04 02:43:49', '2018-11-08 19:37:11'),
(82, 338, 345, 'Localization', NULL, NULL, '11/04/2018', NULL, NULL, '11/05/2018', '55 rue degia', '', '22', '', 'Tunis', 'Tunis', '4011', 'Tunisie', '55650116', 'meher.ayed@yahoo.fr', 'hello', 'Pending', NULL, '', 0, 24, NULL, 0, '2018-11-05 04:27:43', '2018-11-05 04:28:02'),
(83, 363, 457, 'Localization', NULL, NULL, '11/06/2018', NULL, NULL, '11/07/2018', 'Unnamed Road, Tunisie', '', 'Unnamed Road, Tunisie', '', 'tunis', 'tunis', '123456', 'Tunisie', '1234567890', 'saidhoussem@gmail.com', '', 'Pending', NULL, '', 0, 20, NULL, 0, '2018-11-07 02:35:58', '2018-11-07 03:40:04'),
(85, 303, 446, 'Localization', 'Localization', NULL, '11/07/2018', NULL, NULL, '11/09/2018', 'tunisia', '', 'test', '', 'ariyana', 'ariyana', '8021', 'Tunisie', '20172954', 'saidanihoussemesti@gmail.com', 'test é description', 'Payment Accepted', NULL, '', 0, 60, NULL, 0, '2018-11-07 02:58:16', '2018-12-11 02:45:09'),
(86, 338, 454, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 66, NULL, 0, '2018-11-07 04:51:06', '2018-11-07 04:51:06'),
(87, 360, 454, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 66, NULL, 0, '2018-11-07 05:19:11', '2018-11-07 05:19:11'),
(88, 360, 435, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 6, NULL, 0, '2018-11-07 05:20:09', '2018-11-07 05:20:09'),
(89, 360, 433, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 60, NULL, 0, '2018-11-07 05:20:22', '2018-11-07 05:20:22'),
(91, 360, 443, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 30, NULL, 0, '2018-11-07 05:20:37', '2018-11-07 05:20:37'),
(92, 360, 456, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 60, NULL, 0, '2018-11-07 05:20:44', '2018-11-07 05:20:44'),
(93, 302, 446, 'Localization', NULL, NULL, '11/24/2018', NULL, NULL, '11/25/2018', '50', '', '', '', 'Toronto', 'ON', 'M5V 3W2', 'Canada', '+16473822794', 'elice.valerie@yahoo.fr', '', 'Canceled', NULL, '', 0, 40, NULL, 0, '2018-11-11 02:49:07', '2018-11-11 02:59:45'),
(94, 302, 446, 'Localization', 'Localization', NULL, '11/23/2018', NULL, NULL, '11/25/2018', '50', '', '', '', 'Toronto', 'ON', 'M5J 2X8', 'Canada', '+16473822794', 'elice.valerie@yahoo.fr', '', 'Accepted', NULL, '', 0, 60, NULL, 0, '2018-11-11 03:07:09', '2018-11-11 03:18:14'),
(96, 371, 454, 'Regular mail', NULL, NULL, '11/20/2018', NULL, NULL, '11/22/2018', 'asdf', '', 'asdf', '', 'Lahore', 'Punjab', '123', 'Pakistan', '123', 'asdf@ddd.com', 'asdf', 'Pending', NULL, '', 0, 66, NULL, 0, '2018-11-15 14:20:02', '2018-11-15 14:52:44'),
(97, 360, 457, 'Ups', NULL, NULL, '12/10/2018', NULL, NULL, '12/12/2018', '12', '', 'avenue nowhere', '', 'nowhere', 'nostate', '535353', 'somwhere', '232323', 'gg@gg.gg', 'test rent', 'Cart', NULL, '', 0, 30, NULL, 0, '2018-11-15 23:59:40', '2018-11-15 23:59:40'),
(98, 374, 369, 'Regular mail', NULL, NULL, '11/20/2018', NULL, NULL, '11/21/2018', '61', '', '21', '', 'Toronto', 'ON', 'M5H 2Y3', 'Canada', '16473822794', 'elice.valerie@yahoo.com', '', 'Canceled', NULL, '', 0, 40, NULL, 0, '2018-11-16 06:14:06', '2018-11-30 09:26:52'),
(99, 363, 458, 'Regular mail', NULL, NULL, '11/20/2018', NULL, NULL, '11/21/2018', 'Rue Ibn Mandhour, Ariana, Tunisie', '', 'Rue Ibn Mandhour, Ariana, Tunisie', '', 'Ariana', 'Ariana', '1234567', 'Tunisie', '1234567890', 'saidhoussem@gmail.com', '', 'Pending', NULL, '', 0, 100, NULL, 0, '2018-11-20 15:16:28', '2018-11-20 15:46:23'),
(100, 363, 457, 'Regular mail', NULL, NULL, '11/20/2018', NULL, NULL, '11/22/2018', '39 rue elferdaous, Ariana, Tunisie', '', '39 rue elferdaous, Ariana, Tunisie', '', 'Ariana', 'Ariana', '123_56789', 'Tunisie', '1234567890', 'saidhoussem@gmail.com', '', 'Pending', NULL, '', 0, 30, NULL, 0, '2018-11-20 15:21:03', '2018-11-20 16:16:11'),
(101, 363, 458, 'Regular mail', NULL, NULL, '11/24/2018', NULL, NULL, '11/28/2018', '39 rue elferdaous, Ariana, Tunisie', '', '39 rue elferdaous, Ariana, Tunisie', '', 'Ariana', 'Ariana', '23456', 'Tunisie', '1234567890', 'saidhoussem@gmail.com', '', 'Pending', NULL, '', 0, 250, NULL, 0, '2018-11-20 16:15:30', '2018-11-20 16:17:30'),
(102, 338, 342, 'Localization', NULL, NULL, '11/23/2018', NULL, NULL, '11/26/2018', '25', '', 'ttt', '', 'kk', 'hhhh', '5555', 'tn', '22222', 'meher.a.ayed@gmail.com', '', 'Pending', NULL, '', 0, 12, NULL, 0, '2018-11-20 23:05:39', '2018-11-20 23:06:01'),
(103, 376, 446, 'Localization', NULL, NULL, '11/29/2018', NULL, NULL, '12/02/2018', '50 john st', '', 'Suite 1017', '', 'Toronto', 'Toronto', 'M5V 3T5', 'Canada', '+16473822794', 'elice.valerie@yahoo.fr', '', 'Canceled', NULL, '', 0, 80, NULL, 0, '2018-11-20 23:14:39', '2019-01-13 07:04:12'),
(104, 376, 462, 'Localization', NULL, NULL, '11/29/2018', NULL, NULL, '12/02/2018', '50 john st', '', 'SUIte 1017', '', 'toronto', 'ontario', 'm5V 3T5', 'canada', '+33684917447', 'valerie.elice@yahoo.fr', '', 'Cart', NULL, '', 0, 40, NULL, 0, '2018-11-21 00:54:41', '2018-11-21 00:54:41'),
(105, 374, 446, 'Localization', NULL, NULL, '12/10/2018', NULL, NULL, '12/11/2018', '50 john street', '', 'suite 1017', '', 'toronto', 'ontario', 'm5V 3T5', 'CANADA', '+16473822794', 'sandbox.testaccount@rentasuit.ca', '', 'Canceled', NULL, '', 0, 40, NULL, 0, '2018-11-25 02:40:39', '2018-11-30 09:26:42'),
(106, 338, 342, 'Localization', NULL, NULL, '11/26/2018', NULL, NULL, '11/28/2018', '25', '', 'ttt', '', 'kk', 'hhhh', '5555', 'tn', '22222', 'meher.a.ayed@gmail.com', '', 'Pending', NULL, '', 0, 9, NULL, 0, '2018-11-27 01:55:08', '2018-11-27 01:55:24'),
(107, 338, 347, 'Localization', NULL, NULL, '11/26/2018', NULL, NULL, '11/28/2018', '25', '', 'ttt', '', 'kk', 'hhhh', '5555', 'tn', '22222', 'meher.a.ayed@gmail.com', '', 'Pending', NULL, '', 0, 45, NULL, 0, '2018-11-27 02:00:54', '2018-11-27 02:28:59'),
(108, 338, 347, 'Localization', NULL, NULL, '11/26/2018', NULL, NULL, '11/28/2018', '25', '', 'ttt', '', 'kk', 'hhhh', '5555', 'tn', '22222', 'meher.a.ayed@gmail.com', '', 'Canceled', NULL, '', 0, 45, NULL, 0, '2018-11-27 02:36:24', '2018-11-27 02:53:19'),
(109, 338, 347, 'Localization', NULL, NULL, '11/26/2018', NULL, NULL, '11/28/2018', '25', '', 'ttt', '', 'kk', 'hhhh', '5555', 'tn', '22222', 'meher.a.ayed@gmail.com', '', 'Payment Accepted', NULL, '', 0, 45, NULL, 0, '2018-11-27 02:54:05', '2018-11-27 02:55:50'),
(114, 384, 458, 'Localization', NULL, NULL, '11/30/2018', NULL, NULL, '12/02/2018', 'Chhawni', '', 'Chhawni', '', 'Indore', 'Maine', '452001', 'India', '9826450971', 'sauravjain.forebear@gmail.com', 'vbgbnh', 'Pending', NULL, '', 0, 150, NULL, 0, '2018-11-29 14:06:44', '2018-11-29 14:08:06'),
(116, 374, 460, 'Localization', 'Localization', NULL, '12/10/2018', NULL, NULL, '12/12/2018', '50', '', '', '', 'Toronto', 'ON', 'M5V 3W2', 'Canada', '+16473822794', 'elice.valerie@yahoo.Fr', '', 'Accepted', NULL, '', 0, 15, NULL, 0, '2018-11-30 09:25:01', '2018-11-30 10:33:50'),
(117, 374, 459, 'Localization', NULL, NULL, '01/01/2019', NULL, NULL, '01/04/2019', '50 john st', '', '', '', 'Toronto', 'Ontario', 'M5V 0C4', 'Canada', '+16473822794', 'elice.Valerie@yahoo.Fr', '', 'Pending', NULL, '', 0, 20, NULL, 0, '2018-11-30 10:13:13', '2018-11-30 10:13:18'),
(118, 375, 462, 'Localization', NULL, NULL, '12/19/2018', NULL, NULL, '12/24/2018', 'glenmore road', '', '', '', 'toronto', 'ON', 'M4L3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', 'hjkhk', 'Pending', NULL, '', 0, 60, NULL, 0, '2018-11-30 19:18:26', '2018-11-30 19:18:36'),
(123, 379, 435, 'Regular mail', 'Regular mail', '2018-12-14 17:38:48', '12/19/2018', '2 rue George brassens', 'shipped via ABC', '12/22/2018', 'asdf', '', 'asdf', '', 'Lahore', 'Punjab', '54660', 'Pakistan', '123', 'asdf@asdf.com', 'asdf', 'Merchant Received', NULL, 'PAY-5NP42997258718136LQDCE3A', 0, 8, NULL, 0, '2018-12-03 15:27:05', '2018-12-21 03:47:04'),
(124, 386, 442, 'Localization', NULL, NULL, '12/05/2018', NULL, NULL, '12/06/2018', '123', '', 'efdsf', '', 'gurgaon', 'haryana', '122001', 'india', '9898786540', 'gatehouse@foundationproperty.co.uk', 'dfdsfds', 'Cart', NULL, '', 0, 60, NULL, 0, '2018-12-03 17:30:24', '2018-12-03 17:30:24'),
(128, 383, 468, 'Ups', 'Ups', NULL, '12/05/2018', NULL, NULL, '12/06/2018', 'Queen Elisabeth Blvd', '', '366', '', 'Kipling', 'Saskatchewan', 'S4P 3Y2', 'Ca', '12345678', 'office@scriptshouse.com', 'description', 'Canceled', NULL, '', 0, 4, NULL, 0, '2018-12-04 19:57:16', '2018-12-04 20:31:37'),
(129, 388, 468, 'Ups', NULL, NULL, '12/20/2018', NULL, NULL, '12/23/2018', 'asdf', '', 'asdf', '', 'Lahore', 'Punjab', '54660', 'Pakistan', '123', 'asdf@asdf.com', 'asdf', 'Declined', NULL, '', 0, 8, NULL, 0, '2018-12-06 19:12:13', '2018-12-06 19:13:42'),
(130, 217, 453, 'Localization', NULL, NULL, '12/19/2018', NULL, NULL, '12/24/2018', 'glenmore road', '', 'glenmore road', '', 'toronto', 'ON', 'M4L3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Cart', NULL, '', 0, 90, NULL, 0, '2018-12-18 11:11:50', '2018-12-18 11:11:50'),
(131, 217, 452, 'Localization', NULL, NULL, '12/27/2018', NULL, NULL, '12/31/2018', 'glenmore road', '', 'glenmore road', '', 'toronto', 'ON', 'M4L3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Cart', NULL, '', 0, 750, NULL, 0, '2018-12-18 11:16:11', '2018-12-18 11:16:11'),
(132, 360, 442, 'Localization', NULL, NULL, '12/25/2019', NULL, NULL, '12/27/2019', 'dadas', '', 'test add', '', 'dadada', 'dadada', 'dadada', 'dadad', 'dada', 'test@gmail.com', 'test', 'Cart', NULL, '', 0, 90, NULL, 0, '2018-12-25 18:09:01', '2018-12-25 18:09:01'),
(133, 394, 477, 'Regular mail', 'Regular mail', NULL, '01/17/2019', NULL, NULL, '01/22/2019', '16', '', '', '', 'Ajax', 'ON', 'L1T 4H8', 'Canada', '+16472361413', 'KGYEBI@YAHOO.COM', '', 'Accepted', NULL, '', 0, 90, NULL, 0, '2019-01-11 23:23:37', '2019-01-12 00:02:40'),
(134, 394, 478, 'Regular mail', NULL, NULL, '01/23/2019', NULL, NULL, '01/27/2019', 'glenmore road', '', '', '', 'toronto', 'ON', 'M4L3M2', 'Canada', '6477180235', 'nanou8@yahoo.com', '', 'Declined', NULL, '', 0, 100, NULL, 0, '2019-01-13 06:43:26', '2019-01-13 06:57:36'),
(139, 395, 480, 'Localization', NULL, NULL, '02/07/2019', NULL, NULL, '02/09/2019', '1234', '', 'AZERT', '', 'AZERT', 'AZER', '12345', 'AZERT', '1245678', 'nechbawafa136@gmail.com', '', 'Declined', NULL, '', 0, 30, NULL, 0, '2019-02-06 23:28:21', '2019-02-07 00:04:24'),
(140, 395, 462, 'Localization', NULL, NULL, '02/07/2019', NULL, NULL, '04/07/2019', 'Unnamed Road, Tunisie', '', 'Unnamed Road, Tunisie', '', 'mounastir', 'azezz\nazeer', '1234', 'Tunisie', '1234544', 'nechbawafa136@gmail.com', '', 'Canceled', NULL, '', 0, 600, NULL, 0, '2019-02-07 13:18:45', '2019-02-09 06:33:43'),
(141, 395, 462, 'Localization', NULL, NULL, '02/07/2019', NULL, NULL, '03/07/2019', '11 Avenue des Martyrs, Jemmel, Tunisie', '', '11 Avenue des Martyrs, Jemmel, Tunisie', '', 'Jemmel', 'Jemmel', '3333', 'Tunisie', '22226y7', 'fgbbh@gmail.com', '', 'Canceled', NULL, '', 0, 290, NULL, 0, '2019-02-07 14:32:03', '2019-02-09 06:33:50'),
(143, 396, 372, 'Regular mail', NULL, NULL, '02/11/2019', NULL, NULL, '02/13/2019', 'Piet Retief, South Africa', '', 'Piet Retief, South Africa', '', 'Piet Retief', 'Piet Retief', '5020', 'South Africa', '002169872637', 'Hajer.amarah@gmail.com', 'Rent', 'Cart', NULL, '', 0, 60, NULL, 0, '2019-02-08 23:17:02', '2019-02-08 23:17:02'),
(144, 395, 428, 'Localization', NULL, NULL, '02/09/2019', NULL, NULL, '04/09/2019', '11 Avenue des Martyrs, Jemmel, Tunisie', '', '11 Avenue des Martyrs, Jemmel, Tunisie', '', 'Jemmel', 'Jemmel', '1212', 'Tunisie', '22222222', 'nechbawafa136@gmail.com', '', 'Declined', NULL, '', 0, 900, NULL, 0, '2019-02-09 06:35:31', '2019-10-23 04:37:32'),
(145, 395, 431, 'Localization', NULL, NULL, '02/09/2019', NULL, NULL, '03/09/2019', '11 Avenue des Martyrs, Jemmel, Tunisie', '', '11 Avenue des Martyrs, Jemmel, Tunisie', '', 'Jemmel', 'Jemmel', '1111', 'Tunisie', '22222222', 'nechbawafa136@gmail.com', '', 'Pending', NULL, '', 0, 435, NULL, 0, '2019-02-09 07:50:38', '2019-02-13 18:59:35'),
(146, 396, 442, 'Regular mail', NULL, NULL, '03/11/2019', NULL, NULL, '03/14/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '12345677', 'Hajer.amarah@gmail.com', 'Dress', 'Cart', NULL, '', 0, 120, NULL, 0, '2019-02-11 16:38:49', '2019-02-11 16:38:49'),
(166, 369, 479, 'Regular mail', NULL, NULL, '02/14/2019', NULL, NULL, '02/14/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '1', 'dupontalen@gmail.com', '', 'Canceled', NULL, '', 0, 10, NULL, 0, '2019-02-14 22:30:59', '2019-02-14 22:48:38'),
(167, 369, 462, 'Regular mail', NULL, NULL, '02/14/2019', NULL, NULL, '02/14/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '2', 'dupontalen@gmail.com', '', 'Canceled', NULL, '', 0, 10, NULL, 0, '2019-02-14 22:33:05', '2019-02-14 22:48:42'),
(168, 369, 482, 'Localization', NULL, NULL, '02/14/2019', NULL, NULL, '02/15/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '1245', 'dupontalen@gmail.com', '', 'Canceled', NULL, '', 0, 16, NULL, 0, '2019-02-14 22:40:20', '2019-02-14 22:48:46'),
(169, 369, 372, 'Regular mail', NULL, NULL, '02/14/2019', NULL, NULL, '02/16/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123', 'dupontalen@gmail.com', '', 'Pending', NULL, '', 0, 60, NULL, 0, '2019-02-14 22:49:44', '2019-02-14 22:50:46'),
(170, 369, 478, 'Regular mail', NULL, NULL, '02/16/2019', NULL, NULL, '02/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123', 'dupontalen@gmail.com', '', 'Pending', NULL, '', 0, 40, NULL, 0, '2019-02-14 22:50:31', '2019-02-14 23:04:47'),
(172, 369, 462, 'Regular mail', NULL, NULL, '02/14/2019', NULL, NULL, '02/16/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '2', 'dupontalen@gmail.com', '', 'Pending', NULL, '', 0, 30, NULL, 0, '2019-02-14 23:06:55', '2019-02-14 23:08:00'),
(173, 369, 477, 'Regular mail', NULL, NULL, '02/15/2019', NULL, NULL, '02/18/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '5', 'dupontalen@gmail.com', '', 'Pending', NULL, '', 0, 32, NULL, 0, '2019-02-14 23:07:38', '2019-02-14 23:23:26'),
(174, 369, 372, 'Regular mail', NULL, NULL, '02/14/2019', NULL, NULL, '02/15/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '5', 'dupontalen@gmail.com', '', 'Pending', NULL, '', 0, 40, NULL, 0, '2019-02-14 23:24:55', '2019-02-14 23:26:22'),
(175, 369, 368, 'Regular mail', NULL, NULL, '02/15/2019', NULL, NULL, '02/16/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '8', 'dupontalen@gmail.com', '', 'Declined', NULL, '', 0, 30, NULL, 0, '2019-02-14 23:25:36', '2019-10-23 04:33:17'),
(176, 395, 369, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '07/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '2222', 'Tunisia', '22222222', 'nechbawafa136@gmail.com', '', 'Canceled', NULL, '', 0, 3020, NULL, 0, '2019-02-17 07:56:35', '2019-02-17 08:15:25'),
(177, 395, 367, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '04/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '1111', 'Tunisia', '22222222', 'nechbawafa136@gmail.com', '', 'Canceled', NULL, '', 0, 1500, NULL, 0, '2019-02-17 08:10:33', '2019-02-17 08:15:09'),
(178, 395, 369, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '03/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '1111', 'Tunisia', '2222222', 'nechbawafa136@gmail.com', '', 'Declined', NULL, '', 0, 580, NULL, 0, '2019-02-17 08:16:35', '2019-10-23 04:30:22'),
(179, 395, 369, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '04/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '2222', 'Tunisia', '1111', 'nechbawafa136@gmail.com', '', 'Declined', NULL, '', 0, 1200, NULL, 0, '2019-02-17 08:35:24', '2019-10-23 04:30:33'),
(180, 395, 372, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '04/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '1111', 'Tunisia', '22222222', 'nechbawafa136@gmail.com', '', 'Pending', NULL, '', 0, 1200, NULL, 0, '2019-02-17 08:37:53', '2019-02-17 08:38:33'),
(181, 395, 372, 'Localization', NULL, NULL, '02/17/2019', NULL, NULL, '03/17/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '1111', 'Tunisia', '2222222', 'nechbawafa136@gmail.com', '', 'Cart', NULL, '', 0, 580, NULL, 0, '2019-02-17 08:41:44', '2019-02-17 08:41:44'),
(182, 369, 370, 'Localization', NULL, NULL, '02/22/2019', NULL, NULL, '02/23/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '45678', 'dupontalen@gmail.com', '', 'Declined', NULL, '', 0, 40, NULL, 0, '2019-02-22 16:30:35', '2019-10-23 04:32:48'),
(183, 369, 462, 'Localization', NULL, NULL, '02/22/2019', NULL, NULL, '02/23/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '4566', 'Tunisia', '4567', 'dupontalen@gmail.com', '', 'Cart', NULL, '', 0, 20, NULL, 0, '2019-02-22 16:34:21', '2019-02-22 16:34:21'),
(184, 407, 482, 'Localization', NULL, NULL, '02/28/2019', NULL, NULL, '03/05/2019', 'ghalib markeet', '', 'hous#25', '', 'Lahore', 'Punjab', '54660', 'Pakistan', '03011232123', 'sadia@aalasolutions.com', 'lorem ipsum lorem ipsum', 'Declined', NULL, '', 0, 48, NULL, 0, '2019-02-27 17:34:52', '2019-03-02 02:37:48'),
(185, 407, 479, 'Localization', NULL, NULL, '02/28/2019', NULL, NULL, '03/03/2019', 'tipu sultan road', '', 'hous#25', '', 'Lahore', 'Punjab', '54660', 'Pakistan', '03011232123', 'sadia@aalasolutions.com', 'lorem ipsum lorem ipsum', 'Pending', NULL, '', 0, 40, NULL, 0, '2019-02-27 17:44:31', '2019-02-27 17:44:56'),
(186, 407, 480, 'Localization', NULL, NULL, '03/02/2019', NULL, NULL, '03/04/2019', 'abca', '', '8th floor', '', 'Lahore', 'Punjab', '54660', 'Pakistan', '03011232123', 'sadia@aalasolutions.com', '', 'Cart', NULL, '', 0, 30, NULL, 0, '2019-03-01 16:55:41', '2019-03-01 18:14:43'),
(187, 388, 348, 'Regular mail', NULL, NULL, '04/23/2019', '444 western roadToronto, ON M3L 3N2', NULL, '04/24/2019', '123 123 123', '', 'asdf', '', 'asdf', 'asd f', '123', 'asdf', '123', 'asdf@asdf.com', 'asdf asdf asdf', 'Merchant Sent', NULL, 'PAYID-LSWDLTQ0KJ77688FU811643L', 0, 20, NULL, 0, '2019-04-09 12:57:37', '2019-04-09 22:06:46'),
(188, 409, 488, 'Localization', NULL, NULL, '04/30/2019', NULL, NULL, '05/01/2019', 'Wm nino str', '', '', '', 'Zugdidi', 'Samegrelo', '14000', 'Georgia', '557391199', 'teimuraz.kantaria@gmail.com', '', 'Declined', NULL, '', 0, 16, NULL, 0, '2019-04-29 20:24:58', '2019-10-23 04:34:38'),
(189, 409, 372, 'Localization', NULL, NULL, '04/30/2019', NULL, NULL, '04/30/2019', 'Wm nino str', '', '', '', 'Zugdidi', 'Samegrelo', '14000', 'Georgia', '557391199', 'teimuraz.kantaria@gmail.com', 'dfdsf', 'Pending', NULL, '', 0, 20, NULL, 0, '2019-04-30 04:58:18', '2019-04-30 04:58:31'),
(190, 410, 486, 'Localization', 'Localization', NULL, '05/16/2019', NULL, NULL, '05/24/2019', 'testing', '', '123', '', 'testing', 'testing', '49600', 'Pakistan', '+923310303003', 'sfkazmi0@gmail.com', 'testing', 'Accepted', NULL, '', 0, 90, NULL, 0, '2019-05-08 03:56:45', '2019-05-08 04:13:14'),
(191, 412, 486, 'Regular mail', NULL, NULL, '05/09/2019', NULL, NULL, '05/10/2019', 'a', '', '', '', 'Surendranagar', 'Gujarat', '363001', 'India', '123456789', 'gandhi.virat@gmail.com', '', 'Cart', NULL, '', 0, 20, NULL, 0, '2019-05-09 19:52:54', '2019-05-09 19:52:54'),
(192, 417, 369, 'Localization', NULL, NULL, '07/18/2019', NULL, NULL, '07/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123567899', 'Rentasuit02@yopmail.com', 'Pull', 'Declined', NULL, '', 0, 40, NULL, 0, '2019-07-18 15:45:00', '2019-10-23 04:30:44'),
(193, 417, 462, 'Localization', NULL, NULL, '07/18/2019', NULL, NULL, '07/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123578', 'Rentasuit02@yopmail.com', 'Pull', 'Pending', NULL, '', 0, 20, NULL, 0, '2019-07-18 16:25:31', '2019-07-18 16:25:44'),
(194, 417, 372, 'Localization', NULL, NULL, '07/18/2019', NULL, NULL, '07/20/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '1 28 9032', 'Rentasuit02@yopmail.com', 'Pull', 'Pending', NULL, '', 0, 60, NULL, 0, '2019-07-18 16:37:01', '2019-07-18 16:37:12'),
(195, 417, 486, 'Localization', NULL, NULL, '07/19/2019', NULL, NULL, '07/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '134567', 'Rentasuit02@yopmail.com', 'Pull', 'Pending', NULL, '', 0, 10, NULL, 0, '2019-07-18 17:36:50', '2019-07-18 17:37:11'),
(196, 417, 487, 'Localization', 'Localization', NULL, '07/18/2019', NULL, NULL, '07/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '125688', 'Rentasuit02@yopmail.com', 'Hjb', 'Accepted', NULL, '', 0, 16, NULL, 0, '2019-07-18 17:43:42', '2019-09-30 21:11:54'),
(197, 417, 370, 'Localization', NULL, NULL, '07/18/2019', NULL, NULL, '07/19/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '1234567', 'Rentasuit02@yopmail.com', 'Pull', 'Declined', NULL, '', 0, 40, NULL, 0, '2019-07-18 17:55:47', '2019-10-23 04:32:57'),
(198, 417, 367, 'Localization', NULL, NULL, '07/19/2019', NULL, NULL, '07/20/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123578', 'Rentasuit02@yopmail.com', 'Pull', 'Declined', NULL, '', 0, 50, NULL, 0, '2019-07-18 20:15:30', '2019-10-23 04:32:08'),
(199, 417, 368, 'Localization', NULL, NULL, '07/18/2019', NULL, NULL, '07/20/2019', '11 Avenue des Martyrs, Jemmel, Tunisia', '', '11 Avenue des Martyrs, Jemmel, Tunisia', '', 'Jemmel', 'Jemmel', '5020', 'Tunisia', '123567', 'Rentasuit02@yopmail.com', 'Pp', 'Declined', NULL, '', 0, 45, NULL, 0, '2019-07-18 20:19:48', '2019-10-23 04:33:25'),
(200, 418, 487, 'Localization', NULL, NULL, '10/02/2019', NULL, NULL, '10/02/2019', '14 corvus starway', '', '', '', 'North Yorth', 'Ontario', 'MP2 2J6', 'Canada', '1234567897', 'liaison.giovanni@laposte.net', '', 'Declined', NULL, '', 0, 8, NULL, 0, '2019-09-28 12:06:10', '2019-10-23 04:31:28'),
(201, 418, 479, 'Localization', NULL, NULL, '09/29/2019', NULL, NULL, '10/01/2019', '2627 eglinton avenue', '', '', '', 'Toronto', 'Ontario', 'M4P3J8', 'Canada', '45578963621', 'liaison.giovanni@laposte.net', '', 'Cart', NULL, '', 0, 30, NULL, 0, '2019-09-28 23:35:10', '2019-09-28 23:35:10'),
(202, 420, 369, 'Ups', NULL, NULL, '09/30/2019', NULL, NULL, '10/04/2019', 'King place', '', '12', '', 'Toronto', 'Toronto', '1231231', 'Canada', '+885123131231', 'erkinbekoffski@gmail.com', 'dasdadadada', 'Declined', NULL, '', 0, 100, NULL, 0, '2019-09-29 19:49:23', '2019-10-23 04:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `rent_details_transaction_detail`
--

CREATE TABLE `rent_details_transaction_detail` (
  `id` int(11) NOT NULL,
  `rented_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `payment_info` longtext,
  `pay_key` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_details_transaction_detail`
--

INSERT INTO `rent_details_transaction_detail` (`id`, `rented_detail_id`, `user_id`, `total_amount`, `detail`, `product_id`, `payment_info`, `pay_key`, `created_at`, `updated_at`) VALUES
(1, 2, 212, 36, NULL, NULL, NULL, 'AP-1GB210784G0594514', '2018-04-12 07:45:53', '2018-04-12 07:45:53'),
(2, 3, 212, 21, NULL, NULL, NULL, 'AP-1KY19925L4807181G', '2018-04-12 12:49:47', '2018-04-12 12:49:47'),
(3, 4, 220, 6, NULL, NULL, NULL, 'AP-99L959502H071083T', '2018-04-13 05:41:28', '2018-04-13 05:41:28'),
(4, 5, 220, 10, NULL, NULL, NULL, 'AP-2AV603822U7929904', '2018-04-13 05:59:11', '2018-04-13 05:59:11'),
(5, 5, 220, 10, NULL, NULL, NULL, 'AP-2AV603822U7929904', '2018-04-13 05:59:13', '2018-04-13 05:59:13'),
(6, 18, 217, 30, NULL, NULL, '{\n    \"id\": \"PAY-57E94226UA562841KLMJPEYI\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"34C16571HM1060250\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"sandbox.testaccount@rentasuit.ca\",\n            \"first_name\": \"Test\",\n            \"last_name\": \"Account\",\n            \"payer_id\": \"KJEUTXA72ET2G\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Test Account\",\n                \"line1\": \"1 Main St\",\n                \"city\": \"San Jose\",\n                \"state\": \"CA\",\n                \"postal_code\": \"95131\",\n                \"country_code\": \"US\"\n            },\n            \"phone\": \"4084899479\",\n            \"country_code\": \"US\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"300.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"280.00\",\n                    \"shipping\": \"20.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"test payment\",\n            \"invoice_number\": \"5b12f25cbb4ac\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Mask\",\n                        \"price\": \"280.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Test Account\",\n                    \"line1\": \"1 Main St\",\n                    \"city\": \"San Jose\",\n                    \"state\": \"CA\",\n                    \"postal_code\": \"95131\",\n                    \"country_code\": \"US\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"5S889305RV460721E\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"300.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"280.00\",\n                                \"shipping\": \"20.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"9.00\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-57E94226UA562841KLMJPEYI\",\n                        \"create_time\": \"2018-06-02T19:40:33Z\",\n                        \"update_time\": \"2018-06-02T19:40:33Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/5S889305RV460721E\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/5S889305RV460721E/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-57E94226UA562841KLMJPEYI\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-06-02T19:39:13Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-57E94226UA562841KLMJPEYI\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-57E94226UA562841KLMJPEYI', '2018-06-02 19:40:34', '2018-06-02 19:40:34'),
(8, 36, 311, 8, NULL, 430, '{\n    \"id\": \"PAY-3SD19967LG4526330LNYXCSQ\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"4SP87674R1526554D\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"personal.aamir@gmail.com\",\n            \"first_name\": \"Amir\",\n            \"last_name\": \"Personal\",\n            \"payer_id\": \"AVFGR2SQLZAN4\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Amir Personal\",\n                \"line1\": \"1 Main St\",\n                \"city\": \"San Jose\",\n                \"state\": \"CA\",\n                \"postal_code\": \"95131\",\n                \"country_code\": \"US\"\n            },\n            \"phone\": \"4084997377\",\n            \"country_code\": \"US\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"112.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"98.00\",\n                    \"shipping\": \"14.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"test payment\",\n            \"invoice_number\": \"5b717149af58c\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Skirt\",\n                        \"price\": \"98.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Amir Personal\",\n                    \"line1\": \"1 Main St\",\n                    \"city\": \"San Jose\",\n                    \"state\": \"CA\",\n                    \"postal_code\": \"95131\",\n                    \"country_code\": \"US\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"59A11499A0094773T\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"112.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"98.00\",\n                                \"shipping\": \"14.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"3.55\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-3SD19967LG4526330LNYXCSQ\",\n                        \"create_time\": \"2018-08-13T11:54:15Z\",\n                        \"update_time\": \"2018-08-13T11:54:15Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/59A11499A0094773T\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/59A11499A0094773T/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-3SD19967LG4526330LNYXCSQ\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-13T11:53:46Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-3SD19967LG4526330LNYXCSQ\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-3SD19967LG4526330LNYXCSQ', '2018-08-13 11:54:18', '2018-08-13 11:54:18'),
(9, 55, 319, 40, NULL, 433, '{\n    \"id\": \"PAY-0UN68919KA928131KLNZ56KI\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"1DH6905219820045S\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"personal.aamir@gmail.com\",\n            \"first_name\": \"Amir\",\n            \"last_name\": \"Personal\",\n            \"payer_id\": \"AVFGR2SQLZAN4\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Amir Personal\",\n                \"line1\": \"1 Main St\",\n                \"city\": \"San Jose\",\n                \"state\": \"CA\",\n                \"postal_code\": \"95131\",\n                \"country_code\": \"US\"\n            },\n            \"phone\": \"4084997377\",\n            \"country_code\": \"US\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"254.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"240.00\",\n                    \"shipping\": \"14.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"test payment\",\n            \"invoice_number\": \"5b73df275b4f6\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"asdf\",\n                        \"price\": \"240.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Amir Personal\",\n                    \"line1\": \"1 Main St\",\n                    \"city\": \"San Jose\",\n                    \"state\": \"CA\",\n                    \"postal_code\": \"95131\",\n                    \"country_code\": \"US\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"2MW86976GE603442F\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"254.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"240.00\",\n                                \"shipping\": \"14.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"7.67\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-0UN68919KA928131KLNZ56KI\",\n                        \"create_time\": \"2018-08-15T08:08:13Z\",\n                        \"update_time\": \"2018-08-15T08:08:13Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/2MW86976GE603442F\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/2MW86976GE603442F/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-0UN68919KA928131KLNZ56KI\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-15T08:07:05Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-0UN68919KA928131KLNZ56KI\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-0UN68919KA928131KLNZ56KI', '2018-08-15 08:08:16', '2018-08-15 08:08:16'),
(12, 56, 319, 47.2, NULL, 430, '{\n    \"id\": \"PAY-8LE73550AD732181GLN2U6MA\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"39G65692MN1914010\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"personal.aamir@gmail.com\",\n            \"first_name\": \"Amir\",\n            \"last_name\": \"Personal\",\n            \"payer_id\": \"AVFGR2SQLZAN4\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Amir Personal\",\n                \"line1\": \"1 Main St\",\n                \"city\": \"San Jose\",\n                \"state\": \"CA\",\n                \"postal_code\": \"95131\",\n                \"country_code\": \"US\"\n            },\n            \"phone\": \"4084997377\",\n            \"country_code\": \"US\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"47.20\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"33.20\",\n                    \"shipping\": \"14.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5b754f300fbca\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Skirt\",\n                        \"price\": \"33.20\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Amir Personal\",\n                    \"line1\": \"1 Main St\",\n                    \"city\": \"San Jose\",\n                    \"state\": \"CA\",\n                    \"postal_code\": \"95131\",\n                    \"country_code\": \"US\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"83C377354H1625046\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"47.20\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"33.20\",\n                                \"shipping\": \"14.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"1.67\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-8LE73550AD732181GLN2U6MA\",\n                        \"create_time\": \"2018-08-16T10:17:50Z\",\n                        \"update_time\": \"2018-08-16T10:17:50Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/83C377354H1625046\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/83C377354H1625046/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-8LE73550AD732181GLN2U6MA\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-16T10:17:20Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-8LE73550AD732181GLN2U6MA\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-8LE73550AD732181GLN2U6MA', '2018-08-16 10:17:52', '2018-08-16 10:17:52'),
(13, 58, 314, 73.2, NULL, 436, '{\n    \"id\": \"PAY-1FV448343L3720036LN2VN6Q\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"7X945407H24586409\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"merchant.aamir@gmail.com\",\n            \"first_name\": \"Merchant\",\n            \"last_name\": \"Aamir\",\n            \"payer_id\": \"W6KMEZFK6XKKU\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Merchant Aamir\",\n                \"line1\": \"1 Maire-Victorin\",\n                \"city\": \"Toronto\",\n                \"state\": \"Ontario\",\n                \"postal_code\": \"M5A 1E1\",\n                \"country_code\": \"CA\"\n            },\n            \"phone\": \"6139474875\",\n            \"country_code\": \"CA\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"73.20\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"33.20\",\n                    \"shipping\": \"40.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5b7556f986f84\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Navy Coat\",\n                        \"price\": \"33.20\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Merchant Aamir\",\n                    \"line1\": \"1 Maire-Victorin\",\n                    \"city\": \"Toronto\",\n                    \"state\": \"Ontario\",\n                    \"postal_code\": \"M5A 1E1\",\n                    \"country_code\": \"CA\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"9FH07146WV140634V\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"73.20\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"33.20\",\n                                \"shipping\": \"40.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"2.42\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-1FV448343L3720036LN2VN6Q\",\n                        \"create_time\": \"2018-08-16T10:51:24Z\",\n                        \"update_time\": \"2018-08-16T10:51:24Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/9FH07146WV140634V\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/9FH07146WV140634V/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-1FV448343L3720036LN2VN6Q\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-16T10:50:34Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-1FV448343L3720036LN2VN6Q\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-1FV448343L3720036LN2VN6Q', '2018-08-16 10:51:26', '2018-08-16 10:51:26'),
(14, 58, 314, 52, 'Rent and Shipping Cost Paid to Merchant', NULL, '', '', '2018-08-16 11:52:46', '2018-08-16 11:52:46'),
(15, 58, 314, -22, 'Late Fees: Deducted 50 Canadian Dollars + One day rent and Refunded remaining Retail price', NULL, '', '', '2018-08-16 12:01:47', '2018-08-16 12:01:47'),
(16, 58, 314, 42, 'Late Fees: Rent + Shipping Cost + One day Rent and 50 Canadian Dollars received', NULL, '', '', '2018-08-16 12:15:27', '2018-08-16 12:15:27'),
(17, 58, 314, -22, 'Late Fees: Deducted 50 Canadian Dollars + One day rent and Refunded remaining Retail price', NULL, '', '', '2018-08-16 12:20:35', '2018-08-16 12:20:35'),
(18, 63, 314, 226.5, 'Client Paid the Payment', 437, '{\n    \"id\": \"PAY-29P343025A089200RLN3JXPQ\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"76A84443FS003592P\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"merchant.aamir@gmail.com\",\n            \"first_name\": \"Merchant\",\n            \"last_name\": \"Aamir\",\n            \"payer_id\": \"W6KMEZFK6XKKU\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Merchant Aamir\",\n                \"line1\": \"1 Maire-Victorin\",\n                \"city\": \"Toronto\",\n                \"state\": \"Ontario\",\n                \"postal_code\": \"M5A 1E1\",\n                \"country_code\": \"CA\"\n            },\n            \"phone\": \"6139474875\",\n            \"country_code\": \"CA\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"226.50\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"226.50\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5b769bbdd4925\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Navy Pent\",\n                        \"price\": \"226.50\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Merchant Aamir\",\n                    \"line1\": \"1 Maire-Victorin\",\n                    \"city\": \"Toronto\",\n                    \"state\": \"Ontario\",\n                    \"postal_code\": \"M5A 1E1\",\n                    \"country_code\": \"CA\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"1KJ97823TJ850762Y\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"226.50\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"226.50\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"6.87\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-29P343025A089200RLN3JXPQ\",\n                        \"create_time\": \"2018-08-17T09:57:10Z\",\n                        \"update_time\": \"2018-08-17T09:57:10Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/1KJ97823TJ850762Y\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/1KJ97823TJ850762Y/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-29P343025A089200RLN3JXPQ\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-17T09:56:14Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-29P343025A089200RLN3JXPQ\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-29P343025A089200RLN3JXPQ', '2018-08-17 09:57:13', '2018-08-17 09:57:13'),
(19, 63, 314, 7.5, 'Paid half Rent to Merchant', NULL, '', '', '2018-08-17 10:42:17', '2018-08-17 10:42:17'),
(20, 63, 314, 217.5, 'Shipping Amount + Security and 50% of Rent without fees is Refunded', NULL, '', '', '2018-08-17 10:42:20', '2018-08-17 10:42:20'),
(21, 66, 314, 262, 'Client Paid the Payment', 437, '{\n    \"id\": \"PAY-1X687469AB1376620LOCUACI\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"6ES53175719546701\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"merchant.aamir@gmail.com\",\n            \"first_name\": \"Merchant\",\n            \"last_name\": \"Aamir\",\n            \"payer_id\": \"W6KMEZFK6XKKU\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Merchant Aamir\",\n                \"line1\": \"1 Maire-Victorin\",\n                \"city\": \"Toronto\",\n                \"state\": \"Ontario\",\n                \"postal_code\": \"M5A 1E1\",\n                \"country_code\": \"CA\"\n            },\n            \"phone\": \"6139474875\",\n            \"country_code\": \"CA\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"262.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"232.00\",\n                    \"shipping\": \"30.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5b8540091888e\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Navy Pent\",\n                        \"price\": \"232.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Merchant Aamir\",\n                    \"line1\": \"1 Maire-Victorin\",\n                    \"city\": \"Toronto\",\n                    \"state\": \"Ontario\",\n                    \"postal_code\": \"M5A 1E1\",\n                    \"country_code\": \"CA\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"1HE92593TJ227231C\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"262.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"232.00\",\n                                \"shipping\": \"30.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"7.90\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-1X687469AB1376620LOCUACI\",\n                        \"create_time\": \"2018-08-28T12:29:42Z\",\n                        \"update_time\": \"2018-08-28T12:29:42Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/1HE92593TJ227231C\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/1HE92593TJ227231C/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-1X687469AB1376620LOCUACI\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-08-28T12:28:57Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-1X687469AB1376620LOCUACI\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-1X687469AB1376620LOCUACI', '2018-08-28 12:29:44', '2018-08-28 12:29:44'),
(22, 109, 338, 45, NULL, 347, NULL, 'AP-5TP410403D625921X', '2018-11-26 19:55:50', '2018-11-26 19:55:50'),
(23, 123, 379, 82.8, 'Client Paid the Payment', 435, '{\n    \"id\": \"PAY-5NP42997258718136LQDCE3A\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"28940798L2649181N\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"merchant.aamir@gmail.com\",\n            \"first_name\": \"Merchant\",\n            \"last_name\": \"Aamir\",\n            \"payer_id\": \"W6KMEZFK6XKKU\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Merchant Aamir\",\n                \"line1\": \"1 Maire-Victorin\",\n                \"city\": \"Toronto\",\n                \"state\": \"Ontario\",\n                \"postal_code\": \"M5A 1E1\",\n                \"country_code\": \"CA\"\n            },\n            \"phone\": \"6139474875\",\n            \"country_code\": \"CA\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"82.80\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"68.80\",\n                    \"shipping\": \"14.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5c06226a8cac6\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"top\",\n                        \"price\": \"68.80\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Merchant Aamir\",\n                    \"line1\": \"1 Maire-Victorin\",\n                    \"city\": \"Toronto\",\n                    \"state\": \"Ontario\",\n                    \"postal_code\": \"M5A 1E1\",\n                    \"country_code\": \"CA\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"6RC23203UX387342L\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"82.80\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"68.80\",\n                                \"shipping\": \"14.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"2.70\",\n                            \"currency\": \"USD\"\n                        },\n                        \"parent_payment\": \"PAY-5NP42997258718136LQDCE3A\",\n                        \"create_time\": \"2018-12-04T06:54:37Z\",\n                        \"update_time\": \"2018-12-04T06:54:37Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/6RC23203UX387342L\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/6RC23203UX387342L/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-5NP42997258718136LQDCE3A\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2018-12-04T06:45:00Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAY-5NP42997258718136LQDCE3A\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAY-5NP42997258718136LQDCE3A', '2018-12-04 06:54:39', '2018-12-04 06:54:39'),
(24, 85, 303, 60, NULL, 446, NULL, 'AP-9G39189818797801N', '2018-12-10 19:45:09', '2018-12-10 19:45:09'),
(25, 85, 303, 60, NULL, 446, NULL, 'AP-72G49135VD425824F', '2018-12-10 19:54:06', '2018-12-10 19:54:06'),
(26, 123, 379, 22, 'Rent and Shipping Cost Paid to Merchant', NULL, '', '', '2018-12-14 10:34:28', '2018-12-14 10:34:28'),
(27, 123, 379, 60, 'Item <b>top</b> Received to <b>Anna BELLA</b> and Refunded Security, Total Amount: $60', NULL, '', '', '2018-12-20 20:47:00', '2018-12-20 20:47:00'),
(28, 187, 388, 936, 'Client Paid the Payment', 348, '{\n    \"id\": \"PAYID-LSWDLTQ0KJ77688FU811643L\",\n    \"intent\": \"sale\",\n    \"state\": \"approved\",\n    \"cart\": \"4MS48455CN317614D\",\n    \"payer\": {\n        \"payment_method\": \"paypal\",\n        \"status\": \"VERIFIED\",\n        \"payer_info\": {\n            \"email\": \"merchant.aamir@gmail.com\",\n            \"first_name\": \"Merchant\",\n            \"last_name\": \"Aamir\",\n            \"payer_id\": \"W6KMEZFK6XKKU\",\n            \"shipping_address\": {\n                \"recipient_name\": \"Merchant Aamir\",\n                \"line1\": \"1 Maire-Victorin\",\n                \"city\": \"Toronto\",\n                \"state\": \"Ontario\",\n                \"postal_code\": \"M5A 1E1\",\n                \"country_code\": \"CA\"\n            },\n            \"phone\": \"6139474875\",\n            \"country_code\": \"CA\"\n        }\n    },\n    \"transactions\": [\n        {\n            \"amount\": {\n                \"total\": \"936.00\",\n                \"currency\": \"USD\",\n                \"details\": {\n                    \"subtotal\": \"922.00\",\n                    \"shipping\": \"14.00\",\n                    \"insurance\": \"0.00\",\n                    \"handling_fee\": \"0.00\",\n                    \"shipping_discount\": \"0.00\"\n                }\n            },\n            \"payee\": {\n                \"merchant_id\": \"VP2E7GC7Y9J6C\",\n                \"email\": \"rentasuit.developer-facilitator@gmail.com\"\n            },\n            \"description\": \"Item payment\",\n            \"invoice_number\": \"5cac35cd79521\",\n            \"item_list\": {\n                \"items\": [\n                    {\n                        \"name\": \"Dress no sleeves\",\n                        \"price\": \"922.00\",\n                        \"currency\": \"USD\",\n                        \"tax\": \"0.00\",\n                        \"quantity\": 1\n                    }\n                ],\n                \"shipping_address\": {\n                    \"recipient_name\": \"Merchant Aamir\",\n                    \"line1\": \"1 Maire-Victorin\",\n                    \"city\": \"Toronto\",\n                    \"state\": \"Ontario\",\n                    \"postal_code\": \"M5A 1E1\",\n                    \"country_code\": \"CA\"\n                }\n            },\n            \"related_resources\": [\n                {\n                    \"sale\": {\n                        \"id\": \"8ME14392KF798405U\",\n                        \"state\": \"completed\",\n                        \"amount\": {\n                            \"total\": \"936.00\",\n                            \"currency\": \"USD\",\n                            \"details\": {\n                                \"subtotal\": \"922.00\",\n                                \"shipping\": \"14.00\",\n                                \"insurance\": \"0.00\",\n                                \"handling_fee\": \"0.00\",\n                                \"shipping_discount\": \"0.00\"\n                            }\n                        },\n                        \"payment_mode\": \"INSTANT_TRANSFER\",\n                        \"protection_eligibility\": \"ELIGIBLE\",\n                        \"protection_eligibility_type\": \"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\n                        \"transaction_fee\": {\n                            \"value\": \"27.44\",\n                            \"currency\": \"USD\"\n                        },\n                        \"receivable_amount\": {\n                            \"value\": \"936.00\",\n                            \"currency\": \"USD\"\n                        },\n                        \"exchange_rate\": \"0.942058597003025\",\n                        \"parent_payment\": \"PAYID-LSWDLTQ0KJ77688FU811643L\",\n                        \"create_time\": \"2019-04-09T06:04:24Z\",\n                        \"update_time\": \"2019-04-09T06:04:24Z\",\n                        \"links\": [\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/8ME14392KF798405U\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/sale/8ME14392KF798405U/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-LSWDLTQ0KJ77688FU811643L\",\n                                \"rel\": \"parent_payment\",\n                                \"method\": \"GET\"\n                            }\n                        ]\n                    }\n                }\n            ]\n        }\n    ],\n    \"create_time\": \"2019-04-09T06:03:58Z\",\n    \"update_time\": \"2019-04-09T06:04:24Z\",\n    \"links\": [\n        {\n            \"href\": \"https://api.sandbox.paypal.com/v1/payments/payment/PAYID-LSWDLTQ0KJ77688FU811643L\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'PAYID-LSWDLTQ0KJ77688FU811643L', '2019-04-09 06:04:26', '2019-04-09 06:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `username` text COLLATE utf8_unicode_ci,
  `first_name` text COLLATE utf8_unicode_ci,
  `last_name` text COLLATE utf8_unicode_ci,
  `contact_number` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `country` text COLLATE utf8_unicode_ci,
  `longitude` double NOT NULL DEFAULT '0',
  `latitude` double NOT NULL DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '0 = Extra Small | 1 = Small | 2 = Medium | 3 = Large | 4 = Extra Large',
  `height` text COLLATE utf8_unicode_ci,
  `breast` text COLLATE utf8_unicode_ci,
  `waist` text COLLATE utf8_unicode_ci,
  `hips` text COLLATE utf8_unicode_ci,
  `body_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - 5 image',
  `shipping_fee_local` double NOT NULL DEFAULT '0',
  `shipping_fee_nationwide` double NOT NULL DEFAULT '0',
  `cleaning_price` double(10,2) DEFAULT NULL,
  `privilege` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = admin | 1 = user',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not verify | 1 = verified',
  `profile_picture` text COLLATE utf8_unicode_ci,
  `profile_picture_custom_size` text COLLATE utf8_unicode_ci,
  `facebook_id` text COLLATE utf8_unicode_ci,
  `twitter_id` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci,
  `crypted_password` text COLLATE utf8_unicode_ci,
  `verification_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paypal_email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `verify_paypal_email` int(11) NOT NULL DEFAULT '0',
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remember_token` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) DEFAULT '0',
  `firebase_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `last_name`, `contact_number`, `location`, `country`, `longitude`, `latitude`, `birthday`, `size`, `height`, `breast`, `waist`, `hips`, `body_type`, `shipping_fee_local`, `shipping_fee_nationwide`, `cleaning_price`, `privilege`, `status`, `profile_picture`, `profile_picture_custom_size`, `facebook_id`, `twitter_id`, `password`, `crypted_password`, `verification_code`, `paypal_email_address`, `verify_paypal_email`, `api_token`, `remember_token`, `is_deleted`, `firebase_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, NULL, NULL, '', '123 connecticut st.', '', 0, 0, '0000-00-00', '', '', '', '0', '0', 1, 0, 0, NULL, 0, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$hOPZmQAutPNB7iSrNbinZecuFgzK9AFuoI6uPcMBKHX2NdlMS6rM2', 'eyJpdiI6IlB4S3pDd3hTWTFMeXYzcGJRYlJFemc9PSIsInZhbHVlIjoiWjJBcEJVc1NhaktxUTBHZ3pTK21EczFvRGdjamdsazhaelhNaFFTVXFzaz0iLCJtYWMiOiI4ZjUzZTQxYWJkMTY5YzA2OWY5M2RjN2NiZTY4MjZjMmQ0ZTNkNTBlOWJjNDJlOTY5MzFhMjJiZDc4ZTFkYTg0In0=', '', '', 1, '', 'ivBkeS3l7f9GHAg0sPXwmAKJMS3tbkN78hMgKrXzLKEeUjs6wmQWf2CxkOOq', 0, '', '2017-03-06 02:02:40', '2018-06-26 14:01:40'),
(208, 'jitu.vank@gmail.com', NULL, 'jitu', 'vank', '121212121212', 'Indianapolis, IN, USA', NULL, -86.158068, 39.768403, '2018-04-12', 'Small', '4\'2\"', '21\"', '22\"', '22\"', 1, 12, 12, NULL, 1, 1, 'uploads/profile_picture/208/1523510480__1475822_525874827507833_682292050_n.jpg', '/uploads/custom_size/1523510480__1475822_525874827507833_682292050_n.jpg', NULL, NULL, '$2y$10$nNBL3oKAR6aQKln/35V3W.JUxRkmFHUPtBS4JM2saO4bVPm5ZAibi', 'eyJpdiI6ImRBbnZmczB3VDM0dEwwSFVTWjBCcFE9PSIsInZhbHVlIjoiZU9DcUVGUjhXbDRBbE9mSEU0V01iUT09IiwibWFjIjoiOGIyYTZjNjBkODkwZGY0Y2E2NWIwOTQyNmFkOWMwMjI0NGM1Yjk4ZDRlMGRkYjM1MWFlMDQ4MGJlMGQ0NDcwNiJ9', '676802', 'vishal.patel-buyer@mitajacorp.com', 1, 'M87XLQrJHVNs94Vasue4rQx3qCr8b0CsZxDv6ZqQByQQaVARKhDYOYXPQG8VivsuD0p5VYdrzDMUCk6PtT5eoEMijkDYqeXy4MZY7XpLdeKvkJvo2xjKz4ZdYQCrhqEFPnQUDXn4NvlAJlu2GKKuNp2h1Mz6pdJZPXMnl36iezngiq4C1E9bEj9XOM5IELHtElhXpyjX', NULL, 1, 'PXu4Duo6s5Vc8hI4PK7Cm5aP0Zz2', '2018-04-12 12:18:47', '2019-03-04 12:40:30'),
(209, 'vankjitendra1@gmail.com', NULL, 'Vank', 'Jitendra', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v2.9/1601483916613580/picture?type=normal', 'https://graph.facebook.com/v2.9/1601483916613580/picture?type=normal', '1601483916613580', NULL, NULL, NULL, '', '', 0, '', NULL, 1, 'hwu5tg395KZUPkmpPwR7X5Wvhbf2', '2018-04-12 12:23:20', '2018-11-22 04:20:52'),
(211, 'aa@bb.com', NULL, 'test', '123', '56789', 'Ahmedabad, Gujarat, India', NULL, 72.571362, 23.022505, '2007-05-01', 'Small', '5\'2\"', '34\"', '34\"', '34\"', 2, 12, 78, NULL, 1, 0, 'http://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png', 'http://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png', NULL, '984047776404246528', NULL, NULL, '', 'vishal.patel-buyer@mitajacorp.com', 1, '', 'pLBwv2ou87uHLjAzvzSrH5HTl5pucEzxRkZ8RkTYZEpraghzylBBDWz9uwzT', 1, '7zQWSWE6adbKahvDWIuwPExUjaN2', '2018-04-12 13:02:13', '2018-12-03 10:17:05'),
(212, 'test.mitajacorp@gmail.com', NULL, 'Manan', 'Amin', '1234567', 'Ahmedabad, Gujarat, India', NULL, 72.571362, 23.022505, '2011-04-14', 'Small', '4\'2\"', '35\"', '37\"', '38\"', 1, 12, 123, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$CKO2cLgMqt5EyCNASLu12OBRjYPRAPUsrys7Vnr8ujqkiqbVPjwO.', 'eyJpdiI6IlZOVDB6R1R0ZUhWd0xTY2FcL2pTXC9pdz09IiwidmFsdWUiOiJuM1wvcU9EU0tzTHo3YWdyREZKMG9pT2dtNGtXQ3VWalBGRENpTkl1ZTh2az0iLCJtYWMiOiJhMzJkNjcyMjNmNDRhMTUxMGQ3YTIxMzFlMmI5Y2E0NTg2YjBjOGNjYTQxNmMwMmFiZjE2YmJhY2ZjMTc1MTk2In0=', '690703', 'vishal.patel-buyer@mitajacorp.com', 1, 'G2jUIkd8GmCQJL8JavKytWBTED67SzKNJq3xh7X0UddN9l3GCzrCetG6Zmbb94pzT747Szn1udhV6sz0vz44PydwVCDU3nxtwl5c9lu5M5G9aK541nTTKKJJ1vzSo4cd7rEW5ZE4jKGxlhXkx0QsGeH4zs18Ac6IEwAqGNdTuLkkjXLRhrgdvXkKYzpomZE5e0QGzDaG', NULL, 1, 'Bdo3gBePLjWoCpyQ3B6GDjZFtHq2', '2018-04-12 13:52:54', '2018-12-01 23:16:55'),
(214, 'manan10689@gmail.com', NULL, 'Manan', NULL, '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'http://pbs.twimg.com/profile_images/977966941036986368/W1poPH-F_normal.jpg', 'http://pbs.twimg.com/profile_images/977966941036986368/W1poPH-F_normal.jpg', NULL, '126861823', NULL, NULL, '', '', 0, '', NULL, 1, 'LOnq3RI6DYMCRciheyq4MIjWpCo1', '2018-04-12 14:24:38', '2018-12-01 23:26:56'),
(215, 'manan.amin@mitajacorp.com', NULL, 'manan', 'amin', '12345678', 'Ahmedabad, Gujarat, India', NULL, 0, 0, '1996-11-13', 'Extra Small', '4\'9\"', '28\"', '25\"', '23\"', 1, 34, 333, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$tOm03BjESFlW8mc0Cbi2KO0OJm9uFWqOURfZfFBt4bBo.g71Suv/m', 'eyJpdiI6ImlxNFZpc1gyZVNBNHhoZ0R0aTdxK0E9PSIsInZhbHVlIjoiSlNycWZScE5YUlFxbnc3WmRndmdLQlZlMTYxNzlyTG1uV09FNFwvNW1RUVk9IiwibWFjIjoiZGY2MTU3NTBhMTlmMTQ5NjY0MDhmYmVhOTNjOThlM2U0MzVhZjFlMWIzMTk4NzE5ZDhiYTNhMWUxNDViNjE4MyJ9', '326514', 'vishal.patel-buyer@mitajacorp.com', 1, 'q0Vd3MTpdCsXJ7LVqArCY6tcCw1dRdpUS0ZDh0Jh3zkQhdMYKECcRQRoZ2uZrKNkz1WEzKoS6aGj1Aq6mQCmHdW6j8EuZCrhkV7alUESy16Hpm5NYZNnlAoNWWpttMb3cT9CjLUKdycSfnuZ7mj5RkU8LJytHrzWXBIa5EmcG9a4FxJVphbWolvtz66d8PsU2M9t8uJ4', NULL, 1, 'pjyGmQwIr3MPCpQ3ysbOzgAnqG02', '2018-04-12 19:33:38', '2018-12-01 23:17:03'),
(216, 'client@gmail.com', NULL, 'anna', 'Labelle', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$TqM4yuidddgjkFQ76bEbBeLKEJ7Cqq2ttDga6XqRRYHgeVbPtORNq', 'eyJpdiI6Im1UaGxDdkp6a2RvRldpMXh5UktSR3c9PSIsInZhbHVlIjoiNUR6djdGT0t3S3psRGFBMzFwdlFkUT09IiwibWFjIjoiNWJiM2NhNmEwYTYzNWEwNTE5MDk3OTdjN2ViMDY5OWEyMmNjYTQ1YzUxNTQ0ZTcwNTRjYWRjYzFmYjQ2NGNlZCJ9', '198581', '', 0, 'ORIJ2r2csqbfyeNQfcOkqXkfB2g10JrhlwZVzvzrkNKNK9hCjcfx6cyrejPKR3jxzHN6Rs9vgwYKKcSglZNPxrsx9I6CETg6w72rQFreGJLRLXLuieJHZmffqKGcrSHHO7s1TqNWaxnqpXeC2eRPYsvsws1vWBZd0zVsiE7St2Al47xUbFJ7GEdifE2IczAVvtTGGio3', 'pg1nbXv5QiMDVGoFn9wyGHtt4Jx5txXJA4OOnOCR1dIxrLX10VcYhKHcsK5i', 1, '', '2018-04-13 00:32:06', '2018-12-03 10:13:57'),
(217, 'anna.lerus@compass-canada.com', NULL, 'Anna', 'BELLA', '6477180234', 'Toronto, ON, Canada', NULL, -79.383184, 43.653226, '1978-08-08', 'Medium', '5\'7\"', '35\"', '25\"', '29\"', 1, 13, 13, NULL, 1, 1, 'uploads/profile_picture/217/1523643546__anna afro2.jpg', '/uploads/custom_size/1523643546__anna afro2.jpg', NULL, NULL, '$2y$10$MiA8hmnvzbyFiSpMC.XfkOi49avJi.GKbilpsSa/0wHLhSKMT6MW2', 'eyJpdiI6InFkN1NieGVLeWJxcnRqVmNiQllsWVE9PSIsInZhbHVlIjoiYTZSbmdkSVBXeE1maVJubVFVdHYrcjdWd1pFRmRoSDMwZTNtQkJUdU9WVT0iLCJtYWMiOiIwYjc2YzMyODBjMWU3MjI4NGMzOThkYzM2ZjcwNmFiNzhkZDUzN2MzYWQ1MGRiODY0ZGU3MTU5ZWZjYWI5NjBiIn0=', '703463', 'buyer@rentsuit.ca', 1, 'NfTQQuGfSWtDv6myOyI1Mq6NaZa6M9D9natIivrSjm5XPF6bSlvMAFk73OyuikXQNT8wtKavSS9J5CJCS7slh0BguPjeaIbBFV5JwAuKg0LOUvWA9wof8BmPEMQZZKLiFv7orqxBymxTWSqUD1UbFnOZVp0auBZkV1FXRX01G84kLac3TOOEUZG16ypwht5oeF5yBxE1', NULL, 0, 'bL1m7JQeNNajcJU0kD2yKC3W7EP2', '2018-04-13 00:37:21', '2019-10-23 04:24:14'),
(218, 'jitu.vank@mitajacorp.com', NULL, 'jitu', 'mitaja', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$RuixQrFaHdkO.avbOEFxrumrb85lbwOpCHbXfnpGmd2CnjggY4KHe', 'eyJpdiI6Imo0MGExcmdmZXl2ZEQ5NTVzWVEzTEE9PSIsInZhbHVlIjoiRmVwNGk2cTFnSGhlNEhhQzduQVQzdz09IiwibWFjIjoiYWU4OGMxMzNkZWEwMDljY2IyZGFlNWZhZjE4ZGIzZTUzZDk0N2JkNGVjNzEwNTZjNTZlYTBmOTY2MzY0ZmJjYyJ9', '850773', '', 0, 'xMedRHtls0PPsX1oqzrVaEpNwFiVzgdYgpn405YEjTcle50z797K5xdBSZVzcRaM6doaNvCSfg2yg5IGew7mQWkW5fxCz7JkjIX8cPQhF47HbYdIk9kNAxlz0s047tvaKlMQ7CaihQ5K3cjYQeUzr3zF6tWyEstCWqZyssQEt4a4fqPqwFxGeHrnq66jK0O1cEfA9v8p', 'rhXWL1GUtjLP27lOudlXlzXzK9upVhsLzPOBdRrBvr06wpA01DL2kOMZxK4V', 1, 'ycYNqGBcnQg3JnIZ9I9cmTClVp82', '2018-04-13 01:30:18', '2018-12-01 23:26:28'),
(219, 'devendra.shah@mitajacorp.com', NULL, 'Devendra', 'Shah', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$z37VuKOQHJ2N5K/ASsYeb.KAsv7yPMVkdAG3ot8q2JjPl74VMOLnS', 'eyJpdiI6IllTZTVVQXVsb1hvUDhIMnk1ejFCSXc9PSIsInZhbHVlIjoiWFg1a1B6SVwvODBiZVFoNVFSWFpZY3c9PSIsIm1hYyI6ImFhOTcyNTQ1ZDdiODI4ODI4NWFmOTczMjA2ZjJiMGU3YjJiZDFhYTVkNDcyYzM4ZWY2YWFiMTk1ZWIyNDA2YWQifQ==', '849883', '', 0, 'KBeqVZaDW94sqqDAnDPUw2Iq0WUkCsDdSoalRsvZ0htcklh07wxOrN1TacgccJvbobewrECO2V1KiYmpJrsrYrUjIgIjdAbP8SmO9OAnLK9xmdNCnBRadC4qvgyxFGvMp9B3hDBDrJ7eaGa2rA5CLozXSTxbEO5tRv68R14LjESchUobNUYjXlsx0D0g5GNX7TRzCa2B', NULL, 1, '0ul2GVJv2IT2kXvV4Bzxi7ZuoEZ2', '2018-04-13 11:31:23', '2018-12-01 23:24:16'),
(220, 'mobilemitaja@gmail.com', NULL, 'Mobile', 'Mitaja', '123456789', 'Ahmedabad, Gujarat, India', NULL, 72.571362, 23.022505, '1995-04-12', 'Medium', '5\'2\"', '37\"', '36\"', '37\"', 2, 56, 87, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$Zs2IO1aai9iglpt0fAw12utFWxMliT/pP1RiMLEJ3ZSLIV.s/R9Au', 'eyJpdiI6Img0K0s5N0tZOUZWcjVzZmlNbmJiUVE9PSIsInZhbHVlIjoiaTdYY01ubXpYQzBzeGRpWjVFY0loeWJUQjdIcDlTXC9kcTh2Vis4OWVGN289IiwibWFjIjoiZmQ4OTA3YzNjYjg4NTIzMzNiZTVlYjA3YzMxNWIyZjEyMzA1ZDhhYjZmZGE5ZmUzYjI0NmYxYjY2ZmM0YTExMyJ9', '173271', 'vishal.patel@mitajacorp.com', 1, 'yIxvOcHfHHANhGh7yVLEQlnzvawMx5zpkVl273rXwfmmLBTSZNVsJxsUt7J6C8VjBjpuP1hAgjTScE2cWobRvMZl1hRmYw2vLtz8O4b9JflD2etUEtZt1bAjOkLm50r2I1D35qPhWJ9nAKZDHpmS0HI35yR41qHZrCPGgOOMhQZWvrMNa9uEJoAVynFN11C8VepldUTj', NULL, 1, 'J7C1gs3TxzNLQVmXe3eakdCotas2', '2018-04-13 11:54:25', '2018-12-01 23:34:01'),
(221, 'nanouvilgrain@gmail.ca', NULL, 'anna', 'LABELLE', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$c1OJDu088AHQnUS3AiF7LO1h/zVo2OXxSxOv3jYqDzHKeddy3hBFe', 'eyJpdiI6InB2N3FBTlNET0lsaXZVXC9zR1pWNWdnPT0iLCJ2YWx1ZSI6InpFTmxhenhaVVRaWE5Uak81ZkF1UDdlajVTZ0RHNmVtWWxoS0d1YlRHNEk9IiwibWFjIjoiYjcyMDNlZmNhYjA4NWJkMjEzN2I3ODM1M2UwYjJkNjdiNjI3MWE5YmY1NDZlYzI5OGMwZjM3Y2Y0ZTZjNGQ2NiJ9', '715456', '', 0, '0YtcoePCiJuIg9OVzXG5qEduChnvL0R4mU3YhUeYcEeIm4OJFjoBdv5O2V2NgzN6feZjWvGFdrvqbFUav6CIaLOTky3SoRjzZbM8B0pKs8oxhaAxuZLfefemi707Eqdttutng6goVqsruiZu7dlgVmsAkAl2TjI7rg720c2K4M5vGx6tOdDVaU3WkwY0im3Z9VKstntv', 'TmkEXvfrKiFMujd2AbNFxQAaURr0K11ScYZXmH4rzm2PHRMtb0IiJrBcV4Oo', 1, 'BtL6IKwbVdcqU9AtF9IKUMwOpHi2', '2018-04-14 00:57:45', '2018-11-28 09:13:53'),
(222, 'bhumik.bzrot@mitajacorp.com', NULL, 'bhumik', 'barot', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$VGevT4YDlGz/y1nK/hZVVuYn2.l5gheN5K4.V/vYczRbYnmLPZ0AK', 'eyJpdiI6IktkVE1sNnBYSnBDUTYwc2h3TDhHUEE9PSIsInZhbHVlIjoiQlllSCtFQjR4T3d5SnNXb2RscGRDdz09IiwibWFjIjoiZmE5ZDkwZTNmZmFhYTc4MzIxMzA4MzRiOGE5YmYxMTUzMjIwMTQ3NWE5MDAzNGRhMWI0YTlmNzY2OGU3NzBkMCJ9', '611247', '', 0, 'PDXjF8zX7Fx7eLP4gGe4ORK1EgWDCGJMARUREw5VviNeyaZNRHAgWiPMa4yuAedh8V9rCS5acCzWhIfzGcArfRVhoDrIu0V5Jx4g2VCxO7ZNywlZWzinTVQafc9MsEN2Na9Gn9UnUcXteTKp3cUBdLYdpddWzVNQrw1FoaJgfhfuYffnnhIMyWm0WZgEBgQB3j1QGiLm', NULL, 1, '', '2018-04-15 10:26:36', '2018-12-01 23:24:07'),
(223, 'bhumik.barot@mitajacorp.com', NULL, 'bhumik', 'barot', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$TJgxt7Dx.BU4gQ/qxAUtCeDc7Yt4OBml/OL.EfOstA2ZQxwC9LGbe', 'eyJpdiI6ImVPTDlrUDdLOVY2Rm1qZEFESUE1K2c9PSIsInZhbHVlIjoic2M2aUpTRGVwelwvRTZWSUo3YUlUMWc9PSIsIm1hYyI6ImM4NTU0ZDVlYTc2MjFmYzlhMDA1MTBlNTlhNDRiMGEwYmM1YjJmNDIwODRlYjY5YTMwYmFmYjU2MWEzODg4YzMifQ==', '797915', '', 0, 'MczCm85CDCczLKVM7n8DMmHO7vEBTWI61ShDZdgFkpZ2UGFhCHsMy6gkmLUwqUVoTxmELCqWxrT7729xILpt5swObRvkHJL3JyQc3tU16pYnE3dV8J4wHCyUU6MiGCfvEt2OVtJNJodJ3KTi8QRU9X6xGYl9cUDgdkwEhty3caIi1b3RJz7pBSb2jBaVCpA4d1v6R0PQ', NULL, 1, '9pfeIRhMBsNA1hoFbnCRqqRwuhy2', '2018-04-15 10:30:24', '2018-12-01 23:25:15'),
(224, 'andrewbarchuk@gmail.com', NULL, 'andrew', 'barchuk', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$5gBTIDm0kkEo6vbf9CQOZOC1rVTo30ls1FH97sTluSUshiC8khtFG', 'eyJpdiI6Im9HRG43aE9xMUE5SzlPK1d3amJuWlE9PSIsInZhbHVlIjoiMWpxSGs3Smw1ak5yZVBGaEc0emo4dz09IiwibWFjIjoiMGI3MmM5MTg1YmY5NjU4YmEzNGQ5YjUzOGEwMDAyMjk2MzFkMjFiNDU4NmZiODc4YjdlNGUwM2YzMDhhZWEyMSJ9', '681908', '', 0, '7N0fD6mOdX5TTKe2psFYe4xA2j9in6BFOzBcihLIj74jpejaInOezsze0HyIlGJvj8VOyBolV61tkBdIHWYRg0oE0VHlsw1jJNU6XMuAtxtEAZHOZN2WxRzCy6DVkl7shbBEXwoqqZyqmE2TV9wNFmCL7sL71XEArCdV0Bhyn8Le4LKj3GgXbKMqYTqXRSBfl6miRg2T', 'x5o3bZvvnz18kdWrDfnUA5cbRRDNj4sTbpme2JvXvKE21ZcXH1XtfWd8HZ6l', 1, '', '2018-04-16 14:36:30', '2018-12-01 23:23:25'),
(226, 'francisco.q0509@gmail.com', 'francisco.q', 'Francisco', 'Quinzanos', '', '', NULL, 0, 0, '2018-04-18', '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', NULL, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'illia.zhyhalinskyi@gmail.com', NULL, 'I', 'Z', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$GFzqZZ.ssZNUPOYkzukA6Ov3bLE2/7JhZxYr9GKwXqLgPBwojWRrC', 'eyJpdiI6IkZ3aWNoaFlGYllMKzdYSFpmQXQ2MUE9PSIsInZhbHVlIjoiN0lSUysrSlwvN1R6dHBrR0pFVjVXemc9PSIsIm1hYyI6ImNlZmVjMmE2Mjc3Y2QzMmE2NjA3N2YzNzNmMDg2NzdlZjY3NWZkZjlhODJmYzFhZDYxNjIwZDJjODliYTkzNmYifQ==', '859172', '', 0, 'Y2QgYFQNbiFOeNalni1CtJcgCYjDyzX7J7fOgvXcpvklKN4gZdUDe1BuW09s1hXcwqbYsj3imYERwQBTzmj7N2LPVPbTA6ndmIfmibPA5nvpnZqtBObQHJqoMMEeueeDUeHKtF25TKV3kHz54spE5N9dGlZhcaw7tAwgXkwnFPGvFFFDJ8m3XZr4tD8HxMshJoAxqYYW', NULL, 1, 'iRTwR9gi9rZ0NjgOFZwjHDoPJI52', '2018-04-18 23:07:58', '2018-12-01 23:27:19'),
(302, 'elice.valerie@yahoo.fr', NULL, 'Valérie', 'Eli-f', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v2.9/10213393312485053/picture?type=normal', 'https://graph.facebook.com/v2.9/10213393312485053/picture?type=normal', '10213393312485053', NULL, NULL, NULL, '', '', 0, '', NULL, 0, 'cuBBOX6MhhVd5rNBy3HG06gAv4e2', '2018-04-25 07:51:00', '2018-09-21 23:18:18'),
(303, 'saidanihoussemesti@gmail.com', NULL, 'houssem', 'saidani', '20172954', 'borj lousir', NULL, 0, 0, '1989-09-09', 'Medium', '5\'5\"', '0', '36\"', '0', 3, 0, 0, NULL, 1, 1, 'uploads/profile_picture/303/1542468540__1542468540.jpeg', '/uploads/custom_size/1542468540__1542468540.jpeg', NULL, NULL, '$2y$10$cN.nAfGvNLBsRc5M7f0pk.kUQmf15zRtfgFhk/6P1Xxp.wq7gxAIO', 'eyJpdiI6IlwvTmhUb2N2THZ6dWVlRmd0dHI0d0h3PT0iLCJ2YWx1ZSI6IlNBV3ZXVnZEV3hCRWxhRFdqdERcL1l2MlNUR3RlQ0QraHdFVzh4S0Z5WFwvTT0iLCJtYWMiOiJjOGZhYTE0MDA4MWUzNTQxZTExYjE5ZThkNzkxZDc5YTg5YjQ5ZDlhOTYzODA5N2M3ZjZjYzhiNmFhNGY3NjY4In0=', '770268', '', 0, 'uzJOIdL0ovduPtOc0XCt2dMmt366KHwaFEMJaK7EDc4vscMf1tmnAzIuL2iKlYVzjI7y1jYBZbgB8JfzBQGhHzJsAPjZDi8OeGgWHBHEIqwdSGsu2SijbLWDcyd2JNf5RoRhsYaFjJnw9ZcfGouFg6qgzjCwUuzsB2lov5ZsWVl1U6a59vRl45bPVycUlupQa7fdT0EC', NULL, 1, '53Hn1B2x1rPLstjbuJ61pLrbe5M2', '2018-04-26 01:44:26', '2018-12-11 02:08:48'),
(304, 'joshuadale0711@gmail.com', NULL, 'Joshua', 'Dray', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v2.9/195977767878905/picture?type=normal', 'https://graph.facebook.com/v2.9/195977767878905/picture?type=normal', '195977767878905', NULL, NULL, NULL, '', '', 0, '', NULL, 1, 'FimFRKxzJbRWiQvDqFgbWzE3YME2', '2018-04-28 00:33:22', '2018-12-01 23:26:35'),
(305, 'mihailbulin@gmail.com', NULL, 'михаил', 'булин', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v2.9/1935730279833404/picture?type=normal', 'https://graph.facebook.com/v2.9/1935730279833404/picture?type=normal', '1935730279833404', NULL, NULL, NULL, '', '', 0, '', NULL, 1, 'tVNthpljaEYh2z50U2iFgCi0TI32', '2018-05-08 14:22:26', '2018-11-20 01:08:12'),
(306, 'jb@div-art.com', NULL, 'Julian', 'Test', '1234567', 'Urbana, Іллінойс, Сполучені Штати Америки', NULL, -88.20727, 40.110587, '1988-05-03', 'Small', '4\'3\"', '24\"', '24\"', '23\"', 1, 12, 12, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$9NHeeWVaT46/bvBTcfw9CO7kD5NiPDMQrXnB71YcYLjPVfsxnvVcG', 'eyJpdiI6IjFyUUNtTmRlN3pCQm1wZFNRbjExbkE9PSIsInZhbHVlIjoiOUozV1NaZFdnelpMRXhHY09tQ0ZTcEZLVUIxakJOQ3UxZThTZFFzeUxPOD0iLCJtYWMiOiI1Zjg1OTdjMWIyMjNlZmI1NmNjYzkzMWFmZWI2YmY0MDRkODJhMjRiZWQ0MzIzOGNlM2ZhOGZlNTdmM2JkMzkwIn0=', '151611', 'jb@div-art.com', 1, '495ODtxCqXdVFoERZqC7reNb6mNH4co8tx5Vxk0MZTmqtBCaYnTAL9LVDxcJMalwRcqDO5XdevB9mkLY0NLd0V2yvVUWAzFnVLQDpC2cJaMXyH4wSTD11oHWM3x81c36S2P1YAiZuqcN4i21iM8TsEX2TZ1qUsvNg6uwlOkLkQYDtqIvoyJHtxx9gkP1as9KizSlg6P9', 'HDNzNwNTR32LjoQcEHpsUKBa0Nn2zRQ8wv5etORnDYjm3rMZKs8R86KZ2tPf', 1, 'Iby7V14cR5VTg5ml9vZLSykceCM2', '2018-05-08 15:50:30', '2018-12-01 23:32:42'),
(307, 'williamfowler08@outlook.com', NULL, 'Max', 'Lloyd', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$LDlER7ruEvzhpM2rc654gO7naRo1YyvGVuqWeoWSI7X.8PTEa.ED2', 'eyJpdiI6IlwvUFpRRmxDVnR2Y1FpYVwvMUZRdGVuUT09IiwidmFsdWUiOiJTSG9WMUxUdFVSY0w0RjZydHVcLzVlQT09IiwibWFjIjoiNDM1ZWZmOTcyOWM5ZTQ0YWRkNDFhOGUzMGFhOWIyMTExNjk0MWM1NTlmMzViOTI0NWE2Yjc3ZGQyM2YwM2RiMyJ9', '472606', '', 0, 'gUhHnJKkMhgfuSiOUsnoiAktYWlQKdhsjnwfoAFYBmd3x45zaAMBu84YV5366NHvkvlFqJchf5jR9BipVdGPn8v4CxuW0LReC7bk94jRIZ9Dn4kJvX5BX7zKuPmPPc9DhBf4TzrPip5kCItRdCT9qXoJ4dYUgKBQ2CLZTDdOMAlJgnlys2Esk7U0s6JSDiUk1b5ceUYZ', NULL, 1, 'DAggXlRq2Ifu8OtPTuZ6dO7NtIP2', '2018-05-09 09:30:23', '2018-12-01 23:16:35'),
(310, 'bhargavdjoshi@gmail.com', NULL, 'Bhargav', 'Joshi', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$wT2P.BFyP5MZ8BQBWhIKWuKQT2GOvMs3Na8A0fYzsjXjoYkUnuYZK', 'eyJpdiI6IkUxc29GWXZoQ1FheXFOQitxSzVFQ3c9PSIsInZhbHVlIjoiQzhSYnl0c09tVVNLYk9XQzZmZ1hWbHdSRDNsYis4VDZcL05VMnRib2hOWkE9IiwibWFjIjoiZTk0MzZjNWY3YjI0MDY2YTUwNTY4MDgzZTlkNTRhNmNkYWMzNjM2ZjQ5OWE5ZmM0NTBlYjBkOTkzNmE0MGI5NyJ9', '604078', '', 0, 'e9dJ4vBRxCj5eDQxBRJiOwJYdkhqAI4zwDHp52apC0XvuCtMlMI7BrFTtOrQnFbPQCFQTU5gDB15DJhqiCHUqYytHsKqhOtT5JjD0yLflBXCWvRgKHoeliyjREPwNGYGh8pyKcux2EsN36rk7iJPE0KoClqy9j8ylJkyXijYO0KATdze1JRoB1ENPgqhAF59ITYoL07b', 'ScC6t2KS55sQgJXVEyr8LC4uNYYrPXjsGmxjPL94LxYE1Clakp9kcWm9Znj5', 1, 'agGqCcxAyXZOb5vhdGnIrA4X0Tc2', '2018-05-11 13:23:51', '2018-12-01 23:25:01'),
(313, 'boomerx777@gmail.com', NULL, 'fgd', 'dfgdfgf', '', '', NULL, 0, 0, NULL, '', '', NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$il5o9LbVMLHshXeKjzTKh.uTacfJ4nbrMqf8rTLMzPEZFX0PvJbJK', 'eyJpdiI6InlVT0NqM2hlaTdCSXhSMjdcL3YrTmN3PT0iLCJ2YWx1ZSI6Im9ubE9HbjlTZjdTSXhYdTYyODhEZ2c9PSIsIm1hYyI6IjhjOTJmY2QzYjkwYmI4YmVkNDMwODgxNTljYjA0Nzg4ZTBkMWQ5YjkxM2MxZGFlY2E2OGQwN2UwNTU5NDg1NDcifQ==', '212616', '', 0, '8JU5wf8UIodEWDv1PgeahsElknqzemH6LsqRTy6718N05PjzGtYUe0BklBlCWA2SzHy7ABwFK5Z4cbMcRigsIcht3o5fhRoflRvxVmAfXFsAEjznfPsKP5S3b6DUvvro4jItc590I0f52jhpPctvJHG3LjftCod3Mnc72ivQSBarB7oCuDGiGHBiBSO5w10ULWlRhRzP', 'i5FJzfvRcVXWFFJPJnT7sg5vLxcLFRfmYZGTjjJ0Wr2bOSiNxxiPiMVrxYy', 1, 'eM0EoXKd2OhUim3OaAvX9b0afCf1', '2018-05-11 19:44:42', '2018-12-03 10:13:47'),
(315, 'fricotkaren@gmail.com', NULL, 'Karen', 'Fricot', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, 0.00, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$cj7PBZLk32Vhs.FCfNfXmuX8bFG.aYLQhNvroM0Xg1uFawwalu/Wa', 'eyJpdiI6ImxXSnJwdVJURk5MdnhDYlwvcERxc1VBPT0iLCJ2YWx1ZSI6Imx1cmgzWjZGXC9oYkk1TTNJR0lcL29ZTmFadmZsc2J5Yk5UeFYrbkRmSVwvU2s9IiwibWFjIjoiNmNjZjAxNTkwYThiYWFmNTkyMTU4NzEzYzQ5NWYwMzY4OGY0ZjU4Mzg5NjY2ZDY5ZWQzYzU1MTNiMjNmODU4NCJ9', '143856', '', 0, 'oITpmqmc23DPe5GfH1IXCFtH4Ev3r6L7Zfr3gxyZ9yieEAW4inFV2HhQoxFiPa2o79Hq79z0pXQGJ8KKf9YLcc9JcJJ8ppKev8sMcmHkzB3DRV42LnP7kIanVuW8ocvxUY2sgDzz4hjt3DL7BSSCugDcRIVty7X9UcMYD1g4M0gNGjEztnhKNnpMf5Qgr5J4BLC7aCNp', NULL, 0, 'bOz7pLyTCHQWrz3gwF1zDASP68K2', '2018-07-18 10:46:13', '2018-11-28 07:38:52'),
(316, 'karenfricot@hotmail.fr', NULL, 'Karen', 'Fricot', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, 0.00, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$3xhzdliQMK9stcget90Sj.rjFcYVtQtPIkD3LfxQmh2GlEM4GoI.2', 'eyJpdiI6IjRaMlBiY0hjbEkxbStBZWFMUXZpUEE9PSIsInZhbHVlIjoiS0k0UDhXbXBEWGZsUXlcL0lGWGluK3c9PSIsIm1hYyI6IjAzZTU3OTQ5ZmQxYmRhNGZjZWNmYmY1OGZjOWMyYjE0OGNjMDc0YjBjMTczOTcyZWI5OTNhZTI2NTYzOTE0ZjgifQ==', '708064', '', 0, '9MmBzdMd9NvzZhWdxEybvxp8keBJ99Ucz2DKSwmEMRfv63KYNT52ozcIp8lDXuvwb9KxZTQXet4C6HtZKz4I1O8bMy93LExc2Nmc3Xwjqiplf7klvvXiUD0HAKA1wjWwYiBMbSPl7G7dw9peSjnmPg4Zspoozoz8bbRAyKmjLwwZJTeQ0SIULtimDqKES2DzUNRdEx3f', NULL, 0, '6AshgN4ZV2byx3LCdiW2l2HKadQ2', '2018-07-18 10:48:41', '2018-11-28 07:41:06'),
(317, 'sokmany.chea@gmail.com', NULL, 'Many', 'Chea', '514-743-4927', 'Laval, QC, Canada', NULL, -73.712409, 45.606649, '1982-06-24', 'Small', '5\'2\"', '34\"', '29\"', '36\"', 4, 0, 0, NULL, 1, 1, 'uploads/profile_picture/317/1536270743__AA1F4499-9852-40A3-AEE1-DC8910F0D00E.jpeg', '/uploads/custom_size/1536270743__AA1F4499-9852-40A3-AEE1-DC8910F0D00E.jpeg', NULL, NULL, '$2y$10$t5U5FA.ia5dkqCvLLMZaWOoX0j3Nu0XQRwkYS2WhpzAgyaQFfgRwa', 'eyJpdiI6Im5aM1Q2dU52XC9WdXd1em1MeWJUS01nPT0iLCJ2YWx1ZSI6IndSM0UwQ3gxSjBMRnZHeXYzUm9YeGYzZ0RrRHlCQkduZGNuSUF3cjduWDA9IiwibWFjIjoiYjc2MTczZDc5NDliNjY5NGZlYjA1NGU3ODBlNTYxYWZhYjkzYzg4NWQ0ODgwMzkxZjI0MGYyODc1ZTlmZDc5ZCJ9', '566019', '', 0, '77snrfHhEc9L1f83xEMFdm9Jub8poEtMZeWgih6vSoZz8VIySeRaCuw3203iFkvNYyXqHe5k29u6dahCXjgBhER7HrCle757NcjihwHTwy247UrEQjrIhUgeWe2s0fEIWyaPQOav9FKrwTT7qfCjBBcwOR2wmiZZwp5vi45q7q3zg0QTzn3sUwljCjQKhrnGZxOdDlr8', 'BEwgyrrToCtl359VTMc1kMn7TlL98TBRNRSKSYG92SmyURg8QorB6XWNSUfh', 0, 'hhRaU46el5XA8MBoCUJgKRy4J9A3', '2018-08-03 00:40:00', '2018-09-11 22:18:22'),
(318, 'l_fongkee@hotmail.com', NULL, 'Lilian', 'Esco', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$2RQkENXbuvbrS2xb/spDg.2maoToc7OAww6N4CTIAviHe0r/ydMU.', 'eyJpdiI6ImF1a1pMTW1iUk1aNjk5Z2NSWWRYVFE9PSIsInZhbHVlIjoialZKMWJxWjZCZDNPM0RJQ09JcGZXdz09IiwibWFjIjoiYWY3MDA4M2NmNDUxN2ZkZTEwYjlmMTI1YjcwY2NlMGI5NTRlZTFmMGIzNDRmNzYyYjUzMmEzMThjMjY5MzYyMiJ9', '735562', '', 0, 'wSIhtz5uDH1Xvl4T6Bbmx0Ot2RCGoIHniuDsEjNFUB7f0l7iJVcoo0MnGxaQl80vJsBcVUD81NTMxE9xraUbw0aqlVZsB4YdwgqKzcqKKc4apyo12pmP4OswkCi7WGd6aFdrUyQcPLTZuIimqbmM6d3dZLIhXZxrKEWJqJkwU4cgYDLEtmfHCKap4Mlev70nb1ybbyYZ', 'Ev8h45nRIwSQwX4Q2M7WyiuxvuvBIsiHc4QwalzbbJX72GgtngJ2R6M82m5h', 1, '', '2018-08-03 04:13:28', '2018-12-01 23:26:46'),
(334, 'suissi.haythem@gmail.com', NULL, 'Haythem', 'Souissi', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/10215737307458235/picture?type=normal', 'https://graph.facebook.com/v3.0/10215737307458235/picture?type=normal', '10215737307458235', NULL, NULL, NULL, '', '', 0, '', NULL, 0, '', '2018-09-08 01:42:59', '2018-09-08 01:42:59'),
(335, 'stephenatere9@gmail.com', NULL, 'Stephen', 'Atere', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/2187989034783347/picture?type=normal', 'https://graph.facebook.com/v3.0/2187989034783347/picture?type=normal', '2187989034783347', NULL, NULL, NULL, '', '', 0, '', NULL, 1, '', '2018-09-15 23:41:50', '2018-12-01 23:21:07'),
(337, 'elice.valerie@gmail.com', NULL, 'Valerie', 'elice', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$cM.s/F.6MamGdsS6Kz3nhOTTCafH6b2UsFkRgMD4lf8fAHUcCFvu.', 'eyJpdiI6ImowdmR2SnpDZVM3TjZxZVRvZTBqeXc9PSIsInZhbHVlIjoianlXTkI3dTJFWmJ3Q1dmN090OGozMDVTUjNDanJ3U3paM3E1WHkwdnBlYz0iLCJtYWMiOiIzOTUxZjNiNWViZmI2ZjI0NTdjMjAxNDhlOTMwNzg0NmNlOGI0MTU2YTFiM2ZkY2M1NDg5MGM2ZmQ2NjNkM2FmIn0=', '853913', '', 0, 'YHYZ4ZFzfsoSnJNKgRQUxWKIf11BUYDs3hFvB7Bc7eVLnOA5MzHaruoGNbNmQCdVrTXRV6ZYt92YLnNheHcPWMvYFiJZ84O7rVMJrHaQd94z1L3otf6VDV48825wOF654bEtTjoZtu7px3yxf9I58unXhmb4yUeOZtf6te5aJVgQu4FRpA7HNjqDDnQZhSXMegzai9HU', NULL, 1, '8jI0JcstFpObRHAJbhjDXaul3h93', '2018-09-22 00:08:56', '2019-07-17 10:26:36'),
(338, 'meher.a.ayed@gmail.com', NULL, 'Meher', 'Ayed', '22222222', 'tunis', 'TN', 0, 0, '1989-11-12', 'Extra Small', '4\'1\"', '22\"', '20\"', '21\"', 4, 0, 0, NULL, 1, 1, 'uploads/profile_picture/338/1541187046__1541187046.png', '/uploads/custom_size/1541187046__1541187046.png', NULL, NULL, '$2y$10$toMXPOGDFJWigGf2NZB9ZOliHCzsUva5GESiKiZuPQVxb.OQN0hem', 'eyJpdiI6IjNMZWJwOWxWSjFOV2FQZFRPbVhHK3c9PSIsInZhbHVlIjoiODc5Z0s5ekNpeXFmbm0ycTNiTitJZz09IiwibWFjIjoiYTVhNTIwYWEzNjQwYmUwZmU3ZmMyZGE5MTcyNGNlNTM0ZDVhYmQ2NjFlMThiMWI5NjNlOTgxODExOGIwZDMxNyJ9', '981369', 'rent-suit-buyer@gmail.com', 1, 'GIfbmPsTVanz0Htr2dqhIOItY5TCTI5qzbOdYaeErWUyz3mu4jTEYK4deBjamW3ovHPqn7viWVG4qBl5KCIQRq5D0nYxFK1giKSh6AZtRGNznq4TL73jIUR3EO4XRdwqI94bfPw27dTKAaQ6g2dKcAGpbit5HwQyit4u4KckgHKBh5dbv4camvDr0IcGkDRLOpoSwCzY', 'yfJPxKJ8F1JaUlphbb3OKeELiKYQKahW0TSe1r4NWdPVs3m4vTVNfJfmbMom', 1, '', '2018-10-04 05:27:17', '2018-11-27 02:25:47'),
(339, 'meher..aa.ayed@gmail.com', NULL, 'ayed', 'Meher', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$r9F9uOJaoQiCaUDoDnO5HufATTHLuMn5FW5BxLpsPswuZHcawu0Ni', 'eyJpdiI6IjFCK0xmcHpubGFzUVA3emtxSkdZb0E9PSIsInZhbHVlIjoiRm40SjVIejQwUEJUN1JGelBJN1wvMnc9PSIsIm1hYyI6ImZiNmUyZmZkODViNzRkN2ZmY2Y4NWM3YWM3MTMxYmIxZjVjM2FlMGJmODUyNTA0NDRlNThjODI4ZTgwYjY5ODgifQ==', '791636', '', 0, '3J9VHfDw0KFPmSfC5SqslazaRVCO29hcJZPEJEKX00aqYy7tUyARfHVEnoM8B05Ijn0O2KNfe0UU3Jv0lZztwaxNkx6uTEHlSwHwilnlgrOxTHWSQZFtqpz11In7CIzvIMQ4RLBbsrqScMP5H8MmJLSfwqEqWQWOUubXmG2PXZfLcZRlI92nkaZmuyEaSz5RM9GS5Zwf', NULL, 1, '', '2018-10-05 03:38:06', '2018-11-28 09:14:10'),
(340, 'meher.aa.ayed@gmail.com', NULL, 'ayed', 'Meher', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$neieTChW1ssiH2nvxGXWbuYZiVqXugptMk0B0MbHrFMvzqRsQUeH2', 'eyJpdiI6InI1Mms3RHdKNXlhanR1TXBxd3RsaEE9PSIsInZhbHVlIjoiTm9Hd3VRNnpIM0lwRlgxYWFwZ2NFQT09IiwibWFjIjoiMzIwYTM2YTRlYWZkMjdkODA0ODI2M2I0ODM1ZDdjY2QxMmNkZWJhNjM0ODllYTUyNjk2NzliMmFmZDhhZmI5YyJ9', '968676', '', 0, 'YumIjlT0zFJqToiY7UEYjsV3T5hY1zfApxcPyFhYgo9B5CnR5fNPRM7wJCOzByC13RvtmWkUKnyN3t2IcmwNKWbhyQrsfbPZpByqzeSMQubhQVabo8L4An4o24JailvQmlasSwZRVDFt26LPYFKftAXZEVRZJk42hZ1gMWEZCXfdMo6OzdHuhv8ktUwqPMQCkLLtP3e0', NULL, 1, '', '2018-10-05 03:38:44', '2018-12-01 23:23:52'),
(342, 'meher.ayed@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$IuItGUUwoJ9ng011igWL8OeDpfr/KGnGZ2StkgcildOM4ZXAKXxVa', 'eyJpdiI6Ik01OThHNDRmN3V0UkxDSTlHUjk0SVE9PSIsInZhbHVlIjoiZEVSXC9LanBSRWZORGl4MStydjF5S3c9PSIsIm1hYyI6IjFlMWE1MTFiMmEyNzg1NTM2YzQzZTNiMmYxNGIyN2FkMjVlMjNhOGFiM2U0Nzk1MjRmYzdlMjhlZjBlZTNiZTYifQ==', '828901', '', 0, 'LGDyVbsU3ppjUoQuCk9e0fHPwfWkWv7laDzb5yVc6aYZFYkomVh6b15wRyoLpwRaT4BlQCu9sA064cjExCf3aVcFM6yRvLxt0p7SXOieRtpGaHaCzIjHt5W459ApVMteutZ21mJJzkkA6cfIPrCGBgAk5L7tr9l7VkDgkI2UHRoQXuMWt08S30pqZMauXfTRipq8ujbf', NULL, 1, '', '2018-10-05 03:46:22', '2018-12-01 23:24:38'),
(344, 'meher.a.ayed@gmail.com', NULL, 'ayed', 'Meher', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$Kc457TQIlTEWwv4Y8D97J.R5b0i6niFCw/CR/qCS37tU5bXdrJF96', 'eyJpdiI6IkRGc1ZRVUlmcU9oVnh4aUtETjBcL3lnPT0iLCJ2YWx1ZSI6IkR6SmMydHdZWVwvazJvN1lcL3BhT0lMQT09IiwibWFjIjoiNWE2OGIyNWUyYzQwNzg4OTZiYWI1M2EwNGE0OTQ0M2FlMDRkNWIxYWU4NDljZTcyZDYyYjZhZmJiNWQ2MjY3YyJ9', '382927', '', 0, '7FZUSS8fQOIvnsgqPkUXGH81MXCmnLLjUj5qp6S97eKxaHW9imxZYPXTWdvQuZaqsPx6oRRBmdYXqixrCY8oLqrNYG6BM4IQAQv1piXHHr6x7qUneUrmnw2KQ7X2ffk5Zsr49eZJWxlDbEAFKPZsj1a1eI3Ka5sf8JBR6hQXqJ1N3YgZCudliY3Nal5WaLhIgIXML1QJ', NULL, 1, '', '2018-10-05 04:02:18', '2018-12-01 23:24:50'),
(345, 'tt@rr.rr', NULL, 'tt@rr.rr', 'tt@rr.rr', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$jOLyM8u01fLePXJjR/.zlOkUdKdLoiG6sGJA5x0uS01DxmGsYSsve', 'eyJpdiI6ImRibGtLVWo2eGFsZGFPdTFyZXdPTFE9PSIsInZhbHVlIjoianpBMDZKdlRZc1BwNXNLblY5NXJvdz09IiwibWFjIjoiY2ZjMDk1ZDE1Mjk2ZmVlYjAxNGJkNTAwOTU3ZGI4YWMyZDAzNjkxNGU4NDk0NTE5ZTQzYmEyYWQ4N2ZkOWVmNiJ9', '680078', '', 0, 'zt9pXfNCDC45vhg9C4FAMGDeR4pjj1XOsjLGyazGBqir3Fhs5YLIXu4h3Zm6qQQV5durbdHulXQqQp5Puv67N0CXNk1v3HGwywcC1RCXyMjMAVlgBLQmAdvisQsKYQw6H6pMADXaxuMBalNFD3vlV0aOUvkGhf6ly9Vp0zxAQdR3w6HnozMjCJ1TpFqMJeMvX017pPe1', NULL, 1, '', '2018-10-08 04:02:35', '2018-12-01 23:23:06'),
(346, 'ta@rr.rr', NULL, 'ta@rr.rr', 'tt@rr.rr', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$S443c52dHuaZYl5YK23dUeXg0JfHqqV3a4q3jE2cpHkUOGKSLc5ZW', 'eyJpdiI6IjNWYWNBMEZNZXZyK3dUYUFUa0ZYeUE9PSIsInZhbHVlIjoiN2VRQUdrSXM4U2dURksyMm9BQUV5QT09IiwibWFjIjoiMGNjN2ZkMGYyYzk5ZGE3MmRmZjE5OTYzNjNmNTQ5ZjE0ZDE1M2QyNmYwZWM3OWRmMDhhYzU1MjUwODJmZjU5YSJ9', '626859', '', 0, 'lFBHd5TEBQVHmZCgDKyDwxVfa1VJylf3yj5CHJcZYY8fh7IQFEBTw48eIkUfR0LmtSI6gd8Ckh37NxlomFVGJbDFBLH6WWtKbuBzZkwXnmJUfune83T6C1rI5AUHzEL4zquHhHXrYRnmwBttp5Wjt2lm28p5hdfp9coYkoe7nAJrzoXBnjEVl3oujo87DB0dHmJy61dL', NULL, 1, '', '2018-10-09 04:19:55', '2018-12-01 23:21:14'),
(347, 'zaas@aaa.aa', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$niCtN1bsFK5VoLVJ37TOaOupFQwUqqt8C/vaAzgbr9cVeIZniCa7W', 'eyJpdiI6ImtyaHJFZTdwZndJVVliTVJGa0VlQmc9PSIsInZhbHVlIjoiMlp5R1BBUUlmMWFkT0pNaUJIMVVrUT09IiwibWFjIjoiZmI2ZTQ1MTlmMDA2MzgzNTQ0YmJlM2JhOThiMTRkNDMyZGI2MTZkOTJjMTc2ZWQyZDA2NDg1NTQzYjViNGRkMSJ9', '377469', '', 0, 'qxRAqOoFPHvVyLeYGNVWHbbtdynsw6teOW6esafFKGj1fTsH6LU195FleYkiBben7HSPIVBgua76fyE1gWOpHf0H5WL8Fa1SpmGdIiOkkloisnSCMVjJKSAn7xvlCs6scqfAzRWKDk1APNj43eRrndzXQB8k5Oo0YDuFWPRobPiLz4H54WiDoUY6FtaPVr1w0hfWZpef', NULL, 1, '', '2018-10-09 04:25:45', '2018-12-01 23:21:45'),
(348, 'sss@rr.rr', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$ylAhm9blVqyTTZymIZHrruH2V/XXsyn1xud9eDscGhT0LwH8Mhv..', 'eyJpdiI6IlVjaXRqRVhyUHUwU283Q1kyclNZUFE9PSIsInZhbHVlIjoiUUd2UzhlU0xmb3FmSmg0Qk5rYW1lZz09IiwibWFjIjoiNjI2MTJkMTU0NTRiNDExMWY3ZTE3YzZhY2Y0YWNjYTk4NjhlNDAwMWQ0MTZlYmYyMTJjZmI1OGU4YTkwZDAyNiJ9', '745128', '', 0, 'XJfKPwlSU5sjmpYa9OoJBDsGEV6K09Dr08clpIcZyBa1ietl3d3YE7FPYOylAExCZ4GAM0t8SJNtexOl9xlEbiwiyiyYLN2uXPmFLg71FezTHgWNPePvWiL5cphVVBklBBGXoepeGgqcCqNMyi1ngpUZJ4ta7MvoaQ7pzeDIO92FDJOC2JA18S96Qs6C4yH7Q0SYMF7l', NULL, 1, '', '2018-10-09 04:34:41', '2018-12-01 23:22:01'),
(349, 'yyy@nn.rr', NULL, 'yy', 'yy', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$fKnezT56PPHceZYBL7O92eKklbxJ4e2oqlEtoYmd6qqapq05FHlza', 'eyJpdiI6IktYakhhTnVcL1NLXC9KdmFiYzd2aW9Ndz09IiwidmFsdWUiOiI3NnJVTjdQRUx5TEpERnQ0ajQ2R2p3PT0iLCJtYWMiOiJlNzNjM2FjYTMwNzAxYTI1NWVmNmE2Y2E3N2RlNzQxNTNkM2RkNDI0MTA3MTliNTIwZjEwMjVmZGE1NzQ4MzE1In0=', '342798', '', 0, 'SqPLqo2FRo5n4H8vAbYD08mPVxFpGQXqkPhu9Rqo4AlCa9qhaGgEyNf7lXZ2j0QPU6lklwdu3bKQXPba2Oa4vSffovpavJMm6AeFbzolwKcS2U7pd4qmmsY1rsxUvHQBinkLheA5XzkWFAUPrfGryHwYApzHMeG65BQzZ1dp2V2n9gk8RhHsMBSOMESmyOc5wJii1PDs', NULL, 1, '', '2018-10-09 04:36:53', '2018-12-03 10:23:21'),
(350, 'po1@po.po', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$7/Zophqr6fR0fGNO42upz.Cp/CpWJYO6Qnx.qxVuXoty5ruCTY3VO', 'eyJpdiI6ImlZS3JEVzk3QkZ5TzNyaXVITjFuRXc9PSIsInZhbHVlIjoiNW0xY1A2bWFKeFwvSEFuSk0zVTdCZnc9PSIsIm1hYyI6IjllZjI1NjY3ZGZiZmM3Mjg2MTI1MWI4ZGQ5ZDg1N2UwZGQ0NTc3OTQxOWVjYjBlYjNiZTlmOGE1MTE1MWIyYmUifQ==', '599283', '', 0, 'xkpftRpReqhTSkHxfVGK54gsZXkzbqr01diOB6wtk3gkfjuQSFds9WKvW6AsubossVMyO4kxWhDAX9prsIbwMOwKF4ufiqqDsNS0QFEW9cUH29MGfyZfQE2mSeX1C2Svv2UDzyNNckcG0CBi01vVcdKFZWD6K9GEWXjTaohPNr0bInhDXT1ADnvu1eUsiDjgXcSG5amo', NULL, 1, '', '2018-10-09 05:45:06', '2018-12-01 23:21:53'),
(351, 'said@gmail.com', NULL, 'houssem', 'saidani', '22222222', 'tunis', NULL, 0, 0, NULL, '1', '2', '20', '3', '5', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/351/1541257922__1541257922.png', '/uploads/custom_size/1541257922__1541257922.png', NULL, NULL, '$2y$10$I2Nt3cP1R6HzwXqI2cj0B.qPSREFZ3BbM8s1fWygPtDwJAMXBzcsG', 'eyJpdiI6IjNcLzZoUE9XcTA0YU1kWm9qaVZDSlJBPT0iLCJ2YWx1ZSI6IkxvZUFZNHJ6ZUFua0FJQmdrcHlXK1E9PSIsIm1hYyI6ImRlMjAzMDcwYmFhZDNhNmI3YjdmNTM1ZTA5Y2RiZTBiN2Y1MGUwYmUwNDY5NmVmMWZmNjNkM2JiMzlmZjNiMDcifQ==', '206741', 'paypal@gmail.com', 1, 'rTgVNAis0VdoqpDBQ3yBf6gQomrGF0W6I1i9sMNivFFY9KaLAvVz8puaLxkFGOp6CbVZu8TNcIsb4jfXxkvptDpOdBIMzDI7IXCh2MQ16IWmG2FLhstzU1BnyzODzsC9YNsNjBMkwXDxezz1CJCBw72rg1nvdQgCQ8zYaV09RVH54Ncy9ikeGfUmN0BlS0Ga8evagsz6', NULL, 1, '', '2018-10-10 02:10:55', '2018-12-01 23:27:39'),
(352, 'saids@gmail.com', NULL, 'test', 'test', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$8Vx3vDxFAIKKXQyUwj5J5uQ/EsGBX6h/iOddVl48k2vnpgXc/U286', 'eyJpdiI6IllkeFN6VXdLbkk1SXlGVnluaDNPc3c9PSIsInZhbHVlIjoieVwvUkVhUGhBeWFoamQ5MUZZbjlaRW90a3RldXRcL2s5WWY5WUxFWFJlRWNVPSIsIm1hYyI6ImQ3NjdmM2JkZjc5MjczNzMzYmI4MGNkMjkyNjg1N2EzZDM3NmVlMDAzM2VmMjAxMzc1ZDE4N2VlZmE2ZTc1ZTIifQ==', '192282', '', 0, 'Xg3ITUXreg3tGzbJEK9L9RKnM6nnAe9opezzBAQmoYTZS0YxMeJMJuZ3ozQAoe55xWQZyqi32rBYJqRZwpde11psVcoH8NMotK7jYED6uabkgHcD2FrbgaxdipJFp3gwD0IYFChKA0NzlU03X1OVuCSkXLA7bK7b5WBtP2ioyNsDMOaK0jAC10kS5GrRSvj7RUKpKGVx', NULL, 1, '', '2018-10-10 04:20:15', '2018-12-03 10:16:56'),
(353, 'saidHousss@gmail.com', NULL, 'said', 'saidHouss', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$WUCekmJlFK0v4HFzqQuqSuFhk8KqQ1Hn130rOn5Q2PUkoY5OzbnE6', 'eyJpdiI6Iml4bjVqTGxLMnNBVXlvcUNsV1wvN2pnPT0iLCJ2YWx1ZSI6InZESk9nQ0JEOTg1Uk1zNis0aDFDOVE9PSIsIm1hYyI6IjUzNmM2NGE1ZTdkZDA0ZDcwMDg0NWQ4MzMyYmRmYmMzNzhlMDlmYmIzNjVmNmQzZDM3N2NhZDkyNTI5ZTFhN2EifQ==', '174111', '', 0, 'ZQ6PzieSrJvHqKeqL89xBmMcCEsuqDxeH1nM431fbf9INLeqlJkmgx4hAuKeKJ37qQqu6z0lM4vfvvBgzTKfLFmoiNGsJOOzcno7Timoo60h4FOIoIierHMYHgNisW2UO2CMT08bfkeMnwqTAVjLH46OLoEs2KQ51e8dNHZTIEHctR8IQOjSE8v44zjHTtSPCUSPM7jI', NULL, 1, '', '2018-10-10 04:27:21', '2018-12-01 23:32:53'),
(354, 'saidHoussss@gmail.com', NULL, 'said', 'saidHouss', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$69xOIxTH/GJ7UuZjm7c5UuiFeZRFmx0qyvUMT278yWwDeiXzlN.Z.', 'eyJpdiI6IjllUmVcL1pxSlwvY01PWVFLM3hMc1FWUT09IiwidmFsdWUiOiI4a3RlajBWQ3d5YXR5S3p0bFZiMDF3PT0iLCJtYWMiOiJkODg3MDIwMTM5ODRlNzRlMWU5Yjg5NTRiYjMxMzU4NzBkYmU4NjE0Y2ZkNzdmZDM3ZGJjYzY3Nzk0MWQ3NDJiIn0=', '150500', '', 0, 'H6UQ427qcE3Wr1ARiQAYvlfzLE6naHAUIIIhWfbJMLDQBQyknxOsP3x84326WgTjxlBnM1HsSYGOamAaQAH9tt0peIMc5AAysPNOMoBKmxbUUkobBBrcdbvgfQqCbtX9zv6jDwheEM7GvC9EmgfeFR1nEJ87W5icTEwt7ypMkfMAfMSetqtsQ03k5FQVXngRwCDJRXwU', NULL, 1, '', '2018-10-10 04:46:19', '2018-12-01 23:32:58'),
(355, 'saidHousssss@gmail.com', NULL, 'said', 'saidHouss', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$4agGqSj/MF/ALmgjJhP3YOBQG9dZ/bMBvhlhaQHfCSyZzcATT7WVu', 'eyJpdiI6IjdKZHJBd0UxZjkxU3dFZVNwODhUeWc9PSIsInZhbHVlIjoiWjJZaXRldzJiemY3M1wvRzQ0aHJyTWc9PSIsIm1hYyI6IjQ5ZDg2N2NhMzMyZDg5NzA3MGU0MGZhNjgwMzFkYmQwODJhYmU1NjM5YzQ5MzgwM2QyZjA5ZmQxNGI2NGI3ZWUifQ==', '948607', '', 0, 'b8QGmiKYnsUwt2xdaw9gfTK4WouQMZh22N9q4BJRAdl4IwSg9Q2H1uQVPaQEhj6h2gQw1qVUiGQShhL7cwKWNjQhQTq94XB3RCZ3OmzOqHQ3KYWxhMReKR6BIj7ALmfd6DOMs6OlzjdC2L7kRuVnpCckZIdbrS6LjZmsvZxAeBunhdOCrsRRTkzeHFzD74gUl3RgOC65', NULL, 1, '', '2018-10-10 04:48:35', '2018-12-01 23:33:03'),
(356, 'saidHousssssss@gmail.com', NULL, 'said', 'saidHouss', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$lWiGw/5LZSFM5zoSSmhu/OJOv1tX503Ohkiy2AAoAMJ8C2XLKafOC', 'eyJpdiI6IkR5TTFzWE03OVpqVzdyQlwvZURuakd3PT0iLCJ2YWx1ZSI6IndVZDR3dkJMU0VCNVJzTTNBcHhKXC93PT0iLCJtYWMiOiI2NjVmMmE0MTQwODU5OTQwMGY0MWNkNTc1YTI3MDVkYmU5YmM1NTE3YzAzYzY5NTBjMzc2YzEyNDNjYmNlMGFjIn0=', '856769', '', 0, 'ZQM8361M5KDAKjEvdw6LGrtRMGEtsyX5OBAAsAbNNzI6Epxogvzhtg0ktUgOqBAWSzLAdeKtoPtFjtTjzXcw3HeuOpzHi0ZoPeoPJ5ix9p4G7EytLOfNmzo6JqOAYzTeLV82NXv8EJkHCzYdSb9Pj7AOOMICSo6Zrxxtrh55Q1Cb17fy2bnNDpN94nl7A8VGz2WCwTsL', NULL, 1, '', '2018-10-10 05:40:53', '2018-12-03 10:16:36'),
(358, 'souissi.hajer@gmail.com', NULL, 'hajer', 'souissi', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$4FlOApaTO/0FYjHpF3yd1OoYPgtV/VkErbgDk2t1DMMwSdPm62Ggy', 'eyJpdiI6IlhUMG5panB6RDd6cTQwXC9RcFpsbzNnPT0iLCJ2YWx1ZSI6IkVocFFsYXQ5eHh2NVwvd2NVckRTeGRcL3dLXC9SekE3Mm1hdEdrNlpzSTlUOU09IiwibWFjIjoiOWMxMTA0N2M2YzE4NTczMTJjZTM2NDQyMWZlNTIxODM4MjJjZGI5ODI1ODlkZGFmOGYzYWUzMmVlYjlmMjQ2YSJ9', '990716', '', 0, 'm4dQYKc4S7jRSNXuitSQqjP0Aul37QQNPBMEMxOOi3syZkVHuX9igAQcsV0XJy8O30TBFcUJVUn5f7vqUqoQeJCOMMt72yWTapagWy2TMURXoaNFvFrhXJZIDvhbsZI8NpN49sfAROrXKCjJArPKx41HDOnZVMRwmWAdmhfKx6e7jbhhJMIj7ltWGF57L9niKnEY9L4n', NULL, 0, '', '2018-10-12 04:04:41', '2018-10-12 04:04:41'),
(359, 'po@po.po', NULL, 'po', 'po', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$hh4BpA8p.yiPC3ZGez7T5u4uDigoq2yByzCHHUflT1FS9ieMHWGZW', 'eyJpdiI6Im1Ha0tJdWgra3BzNE5zalRrbndLbEE9PSIsInZhbHVlIjoiWEk5d0JiSHJZbGZtWUdsYnNMQVNRVmRxODBSa090MURkQ2dlbkthWVpPZz0iLCJtYWMiOiI0YTJkZmYzZTM3YTY5ZjE4MjRiZTUxNWFlY2NiYjc5MTE3MzFlNGU3NWI5NDUxMzE4NDhmYmNiZDc4ZTUzNTk1In0=', '267376', '', 0, 'TBvCIla67qgqJfLLJD95tze5sMfv2aA3l0nsBHu2G6ZkyyxpLj1GqcaDbIzc4D9z5E3N9zhb4bkMWxzDEWMS2Onxp3WeuFkau2w7Ft9KoxUFfaw98DxXPHg3teQWIekAWo3Ct4oJt8YFNlt6siYr5f0z60K9sotXzKPtlcAKxT51sMqo41GQgFZ0RXLUSqJKJ2xhm29S', NULL, 1, 'HsRJdcJsIcReBsvi62CZTv4DRHm1', '2018-10-14 19:40:22', '2018-12-01 23:16:22'),
(360, 'jj@jj.jj', NULL, 'Carrie Anne', 'Moss', '00216525', 'Burnaby', NULL, 0, 0, '0000-00-00', '2', '5\'9', '22\"', '23\"', '29\"', 1, 0, 0, NULL, 1, 0, 'uploads/profile_picture/360/1543830665__1543830665.jpeg', '/uploads/custom_size/1543830665__1543830665.jpeg', NULL, NULL, '$2y$10$6QN.ivmsD6fDNFiKLpwkL.CIr7zWfzf6cv31Fs0wEs2DSrT66D/0q', 'eyJpdiI6InpvdlhlcEJuTDFxWVBkenREbEc5WEE9PSIsInZhbHVlIjoiNTJmeERwMXpEVjZTeUVNeHdydFZLZz09IiwibWFjIjoiNWY0N2Y2YTQ4YmU0NjI5NTM5MWVkNTkyYmUzYzQ2YzNkNzk4Njk4MWM1MDY4NDcyYmZmYzM5ZDQ3YWU1ODU4NCJ9', '461802', 'dupontalen@gmail.com', 0, 'CFDG8l8ZltpBxPESh6GNZAPVAVUniIFntMU2wadjq6MaLLIFnln6Ae0ICFgBjZ4OUEIljOpecAJ3pge33fEdd1gHOIBKC5b0a6rqXVwe2zoiWBcddcm9epuXn371GrAmZt0hMd5xIC3ASUerjiwNxEMsPCs5AFi5gbLAsjgbmJHd9QZnlpeAoFB6LrobwFAuNLp6WwOF', NULL, 1, '', '2018-10-15 02:12:11', '2018-12-03 16:51:27'),
(361, 'po2@po.po', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$n0CbZydtxWxfBaohjk82S./EtaOQDYE8WdXuD8mErf2zJhc.d5bue', 'eyJpdiI6IjRnejJhWTZuSWZSbFdJOGZCYjIxNkE9PSIsInZhbHVlIjoibzd2amtmT3RpZzQyMTg4K1wvdFdPYXc9PSIsIm1hYyI6ImRmNjRlZmU1MTdmMmE0ZWE2NGUxZDIzMjBhY2ZhNzBmYzhiNzMxNTQxYzE2NGU0MTE0NzdhMzgwMzAyZTY2MGUifQ==', '471885', '', 0, 'oyZe7eax1wfOhHkfUvRHlZVL9FzIDvoRnaRbD8w4my0CpSjKAQYmkreLtb1744ppO0ALVZ5QipiWFPzAQIRssQ7qKkTRXWpvotRaznRneVWIGPRtyHC8Th0ri6XaBdNDWcQV64TrKIewhqLUI0cmhMGa0OxRI6Ztpf5idBtKe1XDT5fMBtyEci7rSTo5Zgxji9jdN9GB', 'wbaJNQpr5Gc2jf5sKN55XN11p6H1tuRhXLk5yUhVIPcgoJIyMdt2R5aWrvj3', 1, '', '2018-10-15 20:45:19', '2018-12-01 23:23:11'),
(362, 'po4@po.po', NULL, 's', 's', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$lUtG3H6W9Swm3RW2ckzrweCgCRO2WH1pNlk.tt7lHrk6zhADjILAC', 'eyJpdiI6ImZrN21hMmk4TjJ0TGgwVjdIWXJCc2c9PSIsInZhbHVlIjoiZXN5bjJ5ZEl2aDRRcnd3aFwvbnFVcFE9PSIsIm1hYyI6ImQ2YzQ1YTc3ZjYyY2UzYTkzMGJiODM2MTI3NmJmOTZiODZmZjBmOTA3NjMzODE4NzhkMjQwNDBmOWQwNDBlNGMifQ==', '212427', '', 0, '7CfnYysNzPzxc5TU04m0MuxOoMjqDbMaVHVKUrgxNAKVnuQdfxhmHCoiPChCGwoYrdA61I02Hl0PrNqHjfPmx8IvcyMOymxyoaVCF2O1lqFPQxgprdBqMbyFAnylY9oLsHOvdjtNR7FRCzq1FLjHM9XEyldIRK1PtZoUJED9QIjh61l63aLFYULxgoC6ck7U92WVbB6a', NULL, 1, 'Ttz9w10eVnVaOYgvLmKV82aArtT2', '2018-10-19 20:16:51', '2018-12-01 23:16:17'),
(363, 'saidhoussem@gmail.com', NULL, 'test', 'test', '1234567890', NULL, NULL, 0, 0, NULL, '', NULL, '0', NULL, '0', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/363/1541259008__1541259008.jpeg', '/uploads/custom_size/1541259008__1541259008.jpeg', NULL, NULL, '$2y$10$9/T6Ia.vjgqJrZN01qGefudxnuf67UztthiO3ucxS/jeYQLqSesGi', 'eyJpdiI6IktLXC9DS1J6M1oxcEVmQkszTmYxalV3PT0iLCJ2YWx1ZSI6IkZLQ2VqRG1VT05YWTdOVXhJaFNKRmdDTjRuWnlPeGJaRkR3bXFScTlXakU9IiwibWFjIjoiYWNmOTRmNjY5ODI1NGZmZDg5MTVhZjNlODAyZTY4MTAzNGRhYWIxZTE4NzMzODk2MWE3N2UyMmVlM2IyMjVjNCJ9', '616756', '', 0, '8F5hFkO4Da5CIJCVz4H2OlJfdEpMmDbs0pueSG6Qtd3rE2B9QocoQqd8510NDO1rBEiM60Ikkly82m8bvquHPPyBDjuPtQ64Sc9ySkYoPaAvTpFk9hdwL2GKJTNNvpKwsyeC7KqSx7t7siLzHFnpeubYZCxYdUnSMtCvbuSsHD1eUjn6rfxQ9A1RLK32JSmA6oB0Icoy', NULL, 1, '', '2018-10-21 16:37:48', '2018-11-22 04:21:33'),
(364, 'haythemmm@gmail.com', NULL, 'haythem', 'souissi', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$jo8uLXIHZ6nkRPlKt5LKL.UWXcMI/Mup3TrsB7Bv4e0Yb./Qoqks6', 'eyJpdiI6IlRXeUNEVUdQN3JQbE9JUUdvKzNoYkE9PSIsInZhbHVlIjoiQVR3YkJ3WVlSemYwSWtaZFwva1U3Wmc9PSIsIm1hYyI6IjY2ZWM0ZWExY2NlYmE4ODg2YmE0NWQwOGY4NTI2ZTYxMTEzN2ExNzg3OWJlYWU4N2NjY2FkNWUwNDEyMGY2NTIifQ==', '746644', '', 0, 'vuwOxREaidsvXwUUB7WQKC55jnsdnjEGJ4VtpLTloTkLI5Fixp6Wu4ZvbTVdhb0qJm5bbp7oAUaiLxqGdFkDRRXB4T3Y7oTZVHvkGz7WpSsrlmYYtpLRIUKQTRraDgQXcM5ehIgEznYEwBbsANGrioEo9vz0Vjw9GRaNBWYHCGR90bllBaE9WgiNnWBPCWbf0BX3YTwW', 'ucMALbNx5JUggPN9GM3eiYb2mjdfjkX0uuDh1v0Cyk5Z4v6oKg4NgGl4AGZO', 0, 'WA4aLn9FxsVNFnYqvKvnEhzFJqu2', '2018-10-21 16:41:01', '2018-10-21 17:00:31'),
(366, 'ba.bessem@gmail.com', NULL, 'Bacem', 'ba', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$/M0U15XPE66KCN0D9S08M./vhjUHrpHaU3oA2zFvEkGDlfIohF/o6', 'eyJpdiI6ImhkcVN2ZTJmbm5WK1QzREFRa2JOTXc9PSIsInZhbHVlIjoiVW9pQXdLNlRBcW02M0tmSzRzdDVhOGhHK2ZSazh1c2Y5UGp3ZE5yNGdtRT0iLCJtYWMiOiI5ZTY4NGQ5ZWY3ODhmZDc3MGQyODllYjdkY2NhMzE2YTY2NzY1Zjc5ZjBjYWEzZmFkZGFjYjBjMGMxZWRiN2FjIn0=', '326421', '', 0, 'cxbskHDxeuUSVUuAM0v3MOc3YVZKJCpjvGhxFtKcpLueNHEQ39dgBoMyMXWLcoHDWJFCQedvFGFibMf9rBr1KCX9lEq1M9hUkWcyk18OYMr97nSqMysKEYwyEVnipqWGiNTHoqiFm8GJbHLIfWRmIXL79S1A5JZJu2MlP2AzBFdoCM04OjZmRJjfpeTnqciwNtqRO0TQ', 'O9M2LrqXCfMnbQ0eNdt4lhDwb1MDEyuYXeSER1MjxVzP6zrRXFPWKtZAC5tq', 1, 'ivtNFZ1GXka3jPEyk6gFVMOhDAb2', '2018-10-22 04:04:44', '2018-12-24 16:11:23'),
(367, 'tt@tt.tt', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$HaiI4wY2ydQPW/MMr5MOFOlwgtUhLg5tL7PcKl3SJsNm64GKrSIJi', 'eyJpdiI6IjlQQm9wS2VPVG1POFZiNEd6OXl6MFE9PSIsInZhbHVlIjoiYjBLekoySUtodHV2RXEyd1NRblcrQT09IiwibWFjIjoiNWZjY2NhYjlhOWJlZTVlYWUwNWI0Y2FiNmZlY2JlODk3OGRmMGFlNmU4YzI0MGQwMDE5M2JkYWYwZjdmOTkzOSJ9', '308374', '', 0, '62mzv8EVM9TmzacnyU0g6fL72SE0k1mDYceKBfpVcNeck9xc94J5UtYAauAazbQRQKooH6Ty2NcNCnmC0QJdtNLQrUfJDtWewT2tLyj2T6zNbnLC8Ab5JnVMwRBwJ6pcOLY4sgtVkiuwVLeBMyWlEWWgZXDRyxCHqAe17sdNEkConvEsZCqSUrp2H2wfrOqIYRRikcl6', NULL, 1, '', '2018-10-24 04:17:13', '2018-12-01 23:22:49'),
(368, 'tt1@tt.tt', NULL, 'tt', 'tt', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$eOcZHzE92ROo3KZs5BgHPe4P/10MQxNb0v2tSL5wlIPdO3BqDj1f2', 'eyJpdiI6IlZ1Z3o2a0V4aWpoYUFDQmVHXC9qbTh3PT0iLCJ2YWx1ZSI6IldKXC84V29mSU9EUFdMWGxGcnNRVktBPT0iLCJtYWMiOiI0ZTM4Zjg4NjZjODZmNDhmMWNkMTlhZTVmYmFkMWExZWEyMGMzYWUwOWUzZjNmMjJmNzNhOWVkZjNkOWMxNjUzIn0=', '965584', '', 0, 'WzQ8zwtLzR8NNHXlNrLsktZ0rrD7kLju8wbR5KQw0JmhokKfkJz0Yp4jh3Q5qrYdxJjEsxbMAtHQ7vVqQtI7w8kyCfno8iyPCdHFinK6Wpm5AfNYQzxPSmkQHS6EByEQ5Ewz54jSOPtBOrSLiYpXXe7JPlSgPXAzzeEfYaP8I5brUR5WOwdwaUsYtsJddD4wmxOCcOVZ', 'KMQJjHs75003MxaVHeVonZfgJm9liDAmLN6baBNCaqksPONIVXNIRw0xWJ0g', 1, 'uhjHcLs8pPWNScVISi8GTIW8WEM2', '2018-11-01 03:11:13', '2018-12-01 23:22:54'),
(369, 'dupontalen@gmail.com', NULL, 'dupont', 'alen', NULL, NULL, NULL, 0, 0, NULL, '', NULL, '0', NULL, '0', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/369/1549276188__1549276188.jpeg', '/uploads/custom_size/1549276188__1549276188.jpeg', NULL, NULL, '$2y$10$snC991DKbv5sq2o0phfkBe/ArSVtBE1ip5Gvzp78GcgllDVlokJCS', 'eyJpdiI6IkNJdUxHKzBtb1BNOTIweXpvZURkdXc9PSIsInZhbHVlIjoicVR3dXNJV0s3eVhOdDZDSU53ZjVHTldydVBWSElldWlQa2lFWTJZVEpRWT0iLCJtYWMiOiJlZGM3ODNhMGQ4MTA2MjQ1NzQ2MDAzNTNkMmE2NWE0MzE2YjljMWY3MDQ2NTgyYjA4MTVhMWFjNmJkZTA5YTRmIn0=', '377691', '', 0, 'JlFODjkHgFTU3eiXa3wJdF0NWrK3N64tiCxKko13QdobGPpAEvhTqydCCxRgkzXYc7doTeS2s85ExNCz1ebBKrs23v1HmTrGHyuYtl8sf1Cb8oWKIPxPSwVcDRlBJreuMoBbe4hM6pHSfNkmFuV3gko3rDmMqV4IGnTyDvezqeqQtPEYfCXQAQHVDB5WtQQ7hNhjtoFF', NULL, 1, 'MHjwf9KCI7WEGzjcxfd20fRBK6E3', '2018-11-01 23:05:40', '2019-02-26 15:58:03'),
(370, 'trimech.hsan@gmail.com', NULL, 'hsan', 'trimech', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$yue7mMlzahVDxfst1N0NFOT4.blE3NBE8RX9vloh3J/XiisJUB0fO', 'eyJpdiI6InVGQzRJRDVoZUhMUUVoUVh2RHR2c2c9PSIsInZhbHVlIjoiUzl1aExBRDBYU2Q4Snd4WTZwSHZaQT09IiwibWFjIjoiYjVhNTY4YjM3ZDBjN2FjN2RiMGEwZWJiYzA1NDFhNmM5MmYxZDgyMTljNmNhYzNiMjEyYjZlODAzNjJiNzJiYSJ9', '281054', '', 0, 'sULeYebYNaStOjwlkRB6saFivgshiw4nrGUsIyBtx7cW75blkMWNR4YNHBrm4kVQGhXtQphABOmOyCMy09yNUjrJXiGGWtIFJ9rQ21Sb8g4Xqr8WM5YhwLU1Dx0g2qzeTar5dCoi1v261aerpGxpyLMpjs2SU9FwZiUFw48wrXwExZ2aumeuUVUr2jTNE4j9RYi77Dg8', NULL, 1, 'GCSPDfISdvOBw47ttVDx94FTtZd2', '2018-11-11 17:58:55', '2018-12-20 18:20:40'),
(374, 'valerie.elice@yahoo.fr', NULL, 'Valérie', 'Elice', '+16473822794', '50 John Street, Toronto, ON, Canada', NULL, -79.389497, 43.645621, '1989-03-25', 'Extra Small', '4\'4\"', '25\"', '23\"', '24\"', 3, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/1213408132128888/picture?type=normal', 'https://graph.facebook.com/v3.0/1213408132128888/picture?type=normal', '1213408132128888', NULL, NULL, NULL, '', 'sandbox.testaccount@rentasuit.ca', 1, '', NULL, 1, '', '2018-11-16 02:18:52', '2019-07-17 10:26:42'),
(375, 'nanou8@yahoo.com', NULL, 'Anna', 'Lerus', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/10156155053838829/picture?type=normal', 'https://graph.facebook.com/v3.0/10156155053838829/picture?type=normal', '10156155053838829', NULL, NULL, NULL, '', '', 1, '', NULL, 1, '', '2018-11-20 01:34:28', '2018-12-03 10:13:32'),
(376, 'elice.valerie@yahoo.fr', NULL, 'Valérie', 'Eli-f', '+6473822794', '50 John St, Toronto, ON, Canada', NULL, -79.389497, 43.645621, '1989-03-25', 'Extra Small', '4\'4\"', '25\"', '25\"', '28\"', 4, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/10213220748611064/picture?type=normal', 'https://graph.facebook.com/v3.0/10213220748611064/picture?type=normal', '10213220748611064', NULL, NULL, NULL, '', '', 0, '', NULL, 1, '', '2018-11-20 22:56:05', '2019-07-17 10:26:24'),
(377, 'testlog@yopmail.com', NULL, 'test', 'will', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$9fh4wrcr5Ue6P6TYw08LWOmJaDKi28eBuNwTRhm7zKvYYDXojhsOm', 'eyJpdiI6InJqXC9xQU9kV3hzSEFQajhTY3RXM2FnPT0iLCJ2YWx1ZSI6IjByTmF2YmJEOXFJUE5scDY3bnhyaFE9PSIsIm1hYyI6ImFkZTllMDFmZjc3YWU0ZTUyYmVjYWFiZjVhMGFkNWM5N2QzM2Y2MjBmYTY3ZTI3NGJmOTExYTk4MDY3Y2I4MTcifQ==', '408125', '', 0, 'FNSTzmGTdYqrPCHoTbtfMArGSsIzOrgh2kaIqZMSFTSlSuDFqa3NXC2r4G6cGFkEDmju4U9DYehDae8qUdicqQ7OzulshZWDNlS7SCBuJIe9JiPNtL5UyE8MDTc5QSUnhSaxEN5oEDQSPPuHSe3mFdZySwmLeMfnlzrT6F7o8nb0cCZPWAxhcYC3CJoEcReG94qCNUw4', 'd8TFzwY11XU75BsOUEvxfqh8Jfppwuv3bKgbni9WEAN016pA9qR3ZnD5WC1H', 1, '4jEJGtNqNeaX2mAMStpPlx5TBWO2', '2018-11-27 22:36:20', '2018-12-03 10:17:12');
INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `last_name`, `contact_number`, `location`, `country`, `longitude`, `latitude`, `birthday`, `size`, `height`, `breast`, `waist`, `hips`, `body_type`, `shipping_fee_local`, `shipping_fee_nationwide`, `cleaning_price`, `privilege`, `status`, `profile_picture`, `profile_picture_custom_size`, `facebook_id`, `twitter_id`, `password`, `crypted_password`, `verification_code`, `paypal_email_address`, `verify_paypal_email`, `api_token`, `remember_token`, `is_deleted`, `firebase_id`, `created_at`, `updated_at`) VALUES
(379, 'zakriya@aalasolutions.com', NULL, 'Client', 'Test', '03121231232', 'Al Hafeez Shopping Mall, Al-Hafeez Shopping mall, Main Boulevard, Gulberg3، 321 Main Blvd Gulberg, Block D1 Block D 1 Gulberg III, Lahore, Punjab 54660, Pakistan', NULL, 0, 0, '1996-09-12', 'Extra Small', '4\'1\"', '20\"', '21\"', '20\"', 5, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$ltQbwou30E/LBVC.rBA0De8YBUGTeTWIkWrflZoFdCpjo9jczRHfS', 'eyJpdiI6InNVTHd4VTZRWUFmYVRsXC9WbWJtNWF3PT0iLCJ2YWx1ZSI6IjkzUXd6VTBEOEJIdHB1WExRVXNnaXc9PSIsIm1hYyI6IjFkMGEwZTk5N2NjZTFhMjZjNTVlZWI0ZTU2YmMwNTUyNjkzOGExOWRlZDA4MWJjOTNjOTkxNzMzMTg3NDA1NDIifQ==', '359921', 'personal.aamir@gmail.com', 1, 'sE2ZEKrELKoFEh7p3a4S1asm7M7KDnoXaYf1zw1mpij8eQScOoQYJnwKxUZGesHSMcm4CqJ7C2nFkR1yxTC9aUIpNRySgBqeOIXdVEE5kEzg5o2OgbxxyC4ytk1W1uvnyHTFr0gk2SeZCVsQFk111AgLxDoiLpc12I0no7SJB22XwBQoKDreeQpMJVNdLOlXn6QjsHkq', NULL, 1, 'GGZN8FXUbeYnLte6PxQedhETvcJ3', '2018-11-28 13:44:18', '2019-07-17 10:23:57'),
(383, 'office@scriptshouse.net', NULL, 'Test', 'Test2', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$AoTKCfsDhBSWsVdNFFdhh.RTVxMHjSqRLgC/e2v9vHcLqo.W2L3H6', 'eyJpdiI6Ijh5OGduakxiU0dnYVVYTDZyXC9hOU9nPT0iLCJ2YWx1ZSI6Ik5aUElRZ3Q5SUlLVlhBRGFEZ0lsNHc9PSIsIm1hYyI6ImI1Yzk0OTIzODQyMTNiYWY3ZTA0ZjM2MzUzZGI0YjU1NDYwNzg1OGViNWI1ZjczZDhkNzAwZmQ0NGI0ZGYyNjAifQ==', '611200', '', 0, 'GHuXj1vhDcEFReJFSwxXNEotUyhUb66gY9HogsK1dJr4zDkeiIubTU77yI8AgpnTUUKMe0NCLq3XLJVctPm3PYOreXoIwumYDbGVKV8H4BBciyo3kNA9I2mNNHbn0HI2g6L9PJ4BUiqZVS6lD2xAJTTNHsIEVvkTaofXvdwPdqV5UlCx136d4koGS5YNeYzXdvosrEdb', 'geTj0A9IY2WfCbBeTsHYB9Z8Md7oUHBvuWzQO9AfsRe4bjAGsw5lKtKGiiDA', 1, 'Bk7c5L3LIifHtRwPcxYcu84vVkh1', '2018-11-29 05:10:35', '2018-12-04 19:41:09'),
(384, 'forebearpro@gmail.com', NULL, 'Saurav', 'Jain', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$RyUq7Acd7Jn2uHStvcl2weDgYjEzKJ0USNDvAsxCvuLeK77NZvF2S', 'eyJpdiI6IlFSTEI5b0R5elNnUkRQVElYdVY0TGc9PSIsInZhbHVlIjoiUDRBRFlXd3BDRFN0dFIzbks5RkR0WHl0bUtUUkNwb0lIbE5rMng1Y29zMD0iLCJtYWMiOiI5NmYyYWI1MDNkZmNjNTUzM2M2MDE0OTNhYzJjZWUzY2VjZWFlODJmNzc0YjEyZjhlMTVmN2MyMDgxY2I2N2U2In0=', '889283', '', 0, 'XrKnQ68N3HI9yag3KRUL6mXAVymSIiXHO1VIgZdPdoLlVGB76sHP5ueRgKgvsjqfGei9QReTNeAVjhpQzCqvRLOUCgIhXpjfVd9Up7fRiqoAf5VlnC99NR9PLXbc8n0KylgPsKCTTt29a4y3GVawUfGcKZWZ6WjrUFHHWufICQ0lNa18PBRm6M6lRWrOW67KI0zsFR2B', 'FRkmz43SIcFDcYY3n1YFeJTaOCAFYnIcgVdgu5Kq7H7kAYVMpIlmmmAnBDuI', 1, 'FdtOfn3ex2f10TXYIIqIRqJexQC2', '2018-11-29 13:39:54', '2018-12-01 23:33:47'),
(385, 'vinay.sahu@otssolutions.com', NULL, 'vinay', 'sahu', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$GlqrnU2fGHIYz4Wm7gsd.eKYYI3F8zv7RGZTgrDVdS.79RTCU6GgK', 'eyJpdiI6Indva2pxUHNFY0srbUxqZDBzZEFiUGc9PSIsInZhbHVlIjoiaWxBZW13UnRJRk9qaTJsRXJJYWlKNk9HTFFwazVpQzd3U2NLemE1S0Vvaz0iLCJtYWMiOiIyYjMzNDVkMTU1MWMwMGMxOTk3MDlmOWYzNDNkM2U5ODQ3ZTQyMjkyM2JmZGRmMTFjOGFjYjJlODc0NmNjYWZlIn0=', '404881', '', 0, '0rc3P9CSU5DCX1ILjaKg9J4NMf9bftOp02qM6LDkqeeTSMLxoOx1niGy5OeA3Jnfy9xW7Bvt79ujfRA5hidhcULdsTa1rkhFc0NUNqnhnPwi271K44KZFCKXGVZTTw9DUMYimkzMhDLcZ9GE4h7KvGD3o1Fm2tXDsYfLS3Uh2BdcQaMblKwIYDvIMN7z5bbbJ0k6C1LI', 'QsvBhLpDZl51WVnMErQmZuZy8YZU6stngyFhrQSFC8FUYT3CtvAahYlSE4eN', 1, 'FzLMSwuMuYToxVJDl3hn8yXq0Hl2', '2018-12-03 15:08:05', '2019-07-17 10:25:47'),
(386, 'sahuvinay742@gmail.com', NULL, 'Vinay', 'Sahu', '9898786540', 'jki', NULL, 0, 0, '1987-03-09', 'Medium', '5\'10\"', '37\"', '30\"', '38\"', 4, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/2048615078762197/picture?type=normal', 'https://graph.facebook.com/v3.0/2048615078762197/picture?type=normal', '2048615078762197', NULL, NULL, NULL, '', '', 0, '', NULL, 1, '', '2018-12-03 15:25:14', '2019-07-17 10:25:42'),
(387, 'sahilvashist23@yahoo.in', NULL, 'Sahil', 'Vashist', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/1712290595542396/picture?type=normal', 'https://graph.facebook.com/v3.0/1712290595542396/picture?type=normal', '1712290595542396', NULL, NULL, NULL, '', '', 0, '', NULL, 1, '', '2018-12-03 16:54:31', '2019-07-17 10:25:00'),
(388, 'shahroz@aalasolutions.com', NULL, 'Merchant', 'User', '03121231232', 'Al Hafeez Shopping Mall, Al-Hafeez Shopping mall, Main Boulevard, Gulberg3، 321 Main Blvd Gulberg, Block D1 Block D 1 Gulberg III, Lahore, Punjab 54660, Pakistan', NULL, 0, 0, '1996-09-12', 'Extra Small', '4\'2\"', '22\"', '22\"', '26\"', 4, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$Hv9bA9fAh5QNMq5mnLvTteU1YyDDAc06PqY0tgIuYrK3UXp1QROZ6', 'eyJpdiI6IklSRVFOT0hmdHRTUHFRRjI2QTQ2VXc9PSIsInZhbHVlIjoiUUZ3M2lNWG1TNEtwa2YxN1pMbG1hZz09IiwibWFjIjoiZDQ0YTE0MmM3MmJiMmY4MjE0YjA5ZWJlNDRlY2I5MjVjNWUxYjU3OWJlZDBhZWYzODUyYzZmMzM4NjE4NTAwNCJ9', '764675', 'personal.aamir@gmail.com', 1, 'xjcG3Of7xnXqAy8ZWzL8df7VvOdNmd6Uk3HEXeiJcwKh2ZFcBkr2PdTJqJ6YTQzZlt4PEY3rfHj0EjGZ0YOHZ2OkF5G34Jl6jPHDISxROR8NI9PesimEusHyeWUbp9GRSSiKKGLh9HyrDCCrpRne87Nk0oSTI47QoBzOQeFoQG3z6oyEf4YFWNM9wtTKKx6OVjKgCxMM', NULL, 1, '32UbGyOyyBX2w1pnWTkOZxC1RRD3', '2018-12-04 17:20:07', '2019-07-17 10:25:24'),
(389, 'youneaajemss@gmail.com', NULL, 'dupont', 'alen', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$x3HFZK5SaFRtiAPk535whuCDkUdiJumZXXaomxZ.1tkGw3qv25/WK', 'eyJpdiI6IldOVkFRRGlPN0JOZE5RcWlGenhmTWc9PSIsInZhbHVlIjoiWTRaZ3p5dWJxSyt1SWhoeDlYMVpcL2dcL0pIQWcrZ05aaTZ2UDFRQkVUc20wPSIsIm1hYyI6ImQzMTAyYjhiYTY0N2I0ZDUzNDQzYWRmNDI3YWM3NzZhNDM4Yzk0ZjkzNDI2ZmJiYmVhY2JkYTdkNGNiNGVhMGEifQ==', '974983', '', 0, 'jmI2onJMdoqDw1Ar3CRLebWvfSty1gSyzWVLRElofjGzmxgbEVQAXUFDofNLxBn8AdO9WXRaHthntqRBa4xTXmcHVWJ9p2jDP4zjfvEXahskZ0Tk7DqFKhYYecpzf9biiV6wQmaXBzjNeZ3SvhEDSti7OZYh2r45U6PgRPRpuIaV4yUJUKivUr1U6tlRft0NCd53HiaA', 'gDevd9jXwspS6ZioXvC09I80eLTz8fawAmEGKfVL5D4F4tlgl9ZZmaYk3IkF', 1, 'OiBWlqf8oeXZSlUICpEel2tJnKR2', '2018-12-07 22:46:20', '2019-07-17 10:23:50'),
(390, 'aamir@aalasolutions.com', NULL, 'Aamir', 'Rajpoot', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'https://graph.facebook.com/v3.0/2096307827100310/picture?type=normal', 'https://graph.facebook.com/v3.0/2096307827100310/picture?type=normal', '2096307827100310', NULL, NULL, NULL, '', '', 0, '', NULL, 1, '', '2018-12-14 13:25:28', '2019-07-17 10:22:36'),
(391, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'XzhZx4Rag50zdMSOve1vJlqi6aTohiOsTqSbByy90R6oCm3JmPHnmIkHcOlHMUtwsw6JQCXNWmTRsYycj7fHReVdfJM3RFiqc083OB4LHr5Pd67c1n1qpUCvcG82OfWEhc4rc0zjc0nZlw4TmJg3dUauTrr8Ki8gjV1zcqkVRBD0HwGgnRvVvz188Q60mJVpv38d54eT', NULL, 1, '', '2018-12-20 19:01:42', '2019-07-17 10:21:58'),
(392, '10215430885518482', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'Rwj6Y2Gi5fYanDyLR1XLk14IYvlEX2xt6Bcu8LFdsZDOamt7fJlsv09uo4rR46NesJ8RTCtE0DP7HMVsETQ5oa8EVNZrfPOLLeoOD1IP7Uf3efz5nGpyBpfvyyRzcY9uF9jjnws33KCSAyeUv71qtAKjlJ1Dl8K4TImqih8su34AsHjkryKmoNt5T73YnIGFfoS1gZ1W', NULL, 1, '', '2018-12-20 19:03:38', '2019-07-17 10:22:41'),
(393, 'nechbawafa@gmail.com', NULL, 'Wafa', 'Nechba', NULL, NULL, NULL, 0, 0, NULL, '', NULL, '0', NULL, '0', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/393/1546368775__1546368775.jpeg', '/uploads/custom_size/1546368775__1546368775.jpeg', NULL, NULL, NULL, NULL, '', '', 0, 'wIV7nSeG4WZnpNgWtdX70HUBe7eNHLEKc2ypkr32ny1OEcPEgt7KLN8qoTDzZP2b73EyXMcQ213EHR85QubzhoTDRbtoPpzKmSq4raAmeHYJrt3shaen3XUU9KbRPIkgH7NvT77RVJ4Q4eG6EP4E0Qy5SqbSS1CwKurYaPVfOLfOfM5V9kojsZ6HrH5zQ2dDIoyu5N9O', NULL, 1, '', '2018-12-31 02:54:19', '2019-07-17 10:25:53'),
(394, 'anna@citygeeks.ca', NULL, 'anna', 'Fred', '+16472361413', '5 Glenmore Road, Toronto, ON, Canada', NULL, -79.310042, 43.676251, '2000-11-11', 'Medium', '5\'7\"', '35\"', '33\"', '36\"', 2, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$efY86KorAYta8RHKLI75OeBTOy2fbRP6XQH39ASqNX4/IiLLt8kuO', 'eyJpdiI6InRwY0NsSFU0UlZiTVJzVTRuc2hPa0E9PSIsInZhbHVlIjoiQnIrK1JFelpiRExVYTlwR0tnVHhxbkNxcVJOTEpxSVByWkczR2pjMXFNaz0iLCJtYWMiOiJmNTA2ODQ2YjY3OTE5NzI4M2JmNjRhZjYzNzczMWU2ZjE2NjI3OGZiOGU2YzhjNTQxNzE5MzY0MDFlYTgyYTJkIn0=', '317774', '', 0, 'HbmwxYxbW82txrufw5ZrZu1AGUp9ecTOgmgkMl3dwOpOCiP6enwznc8fLVwUwy9u1Go3ykAEIIo9ZvQXaPiQ8kQAiYHQN5MgWKzDYjHroLBNI6zrGxqmbmVADfworB9o6Gaumj4xPjXaKFe1BQHtj6hMIeZlK7v7nxUbUe6WN1b6dUsmMQ6gvce4ajGsssBx118EGAKp', NULL, 0, 'd7Bp3kJLPcWa97SubuJ4TfhLmxi2', '2019-01-11 23:10:03', '2019-01-13 06:42:05'),
(395, 'nechbawafa136@gmail.com', NULL, 'AZZER', 'AZZER', NULL, NULL, NULL, 0, 0, NULL, '', NULL, '0', NULL, '0', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/395/1548632347__1548632347.jpeg', '/uploads/custom_size/1548632347__1548632347.jpeg', NULL, NULL, '$2y$10$5v0hgUuk7Pu12G94msKto.4l5R9BhzSL0jzTDLNtgk/WEY6pF8bXS', 'eyJpdiI6ImhuXC9VZ1BpOXNEelpaRWNzRzQrbElnPT0iLCJ2YWx1ZSI6IjgrbGNzYUtpajljeUlPUDFsTUJUUEE9PSIsIm1hYyI6IjI4YzNlMmUwM2FhMmFjYWYzMDNlMDdmODIzODkzN2FkNWQxYzdiNTJkNzg0N2YwMDdlZDQ0NjliNTExZmJlYjcifQ==', '591089', '', 0, 'wSx3lsTIfdBsmPYwx3j8cM1dGBVVgEjarjzduzDEzmugeMe11i1WWmlkRImEvh74ppmlgFe1lQ4INMTheFuQZblSuYEwZaqqXz63F2W7NmpIOGmcR3j3B55dRnQakcp7uVhGTLuDYumKQFOHqtlVyhR55PMlm38eramESzF9JLmLLRjE4evwPVflCkIKw7CfRyq1sXl9', NULL, 1, '', '2019-01-21 15:15:08', '2019-07-17 10:24:22'),
(396, 'hajer.amarah@gmail.com', NULL, 'Hajer', 'Amara', '50951220', NULL, NULL, 0, 0, '1993-08-25', '3', '25', '1', '9', '13', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/396/1549965630__1549965630.jpeg', '/uploads/custom_size/1549965630__1549965630.jpeg', NULL, NULL, '$2y$10$hPCm4CV0GwX58UJ39aUMGu35bYaHv6q3mhqEDk72veZ4HW0yMs2VK', 'eyJpdiI6ImFTMnhiVlQ0REM4ZVo1S0E1dThiWXc9PSIsInZhbHVlIjoiNXAyeFBzSUs3dGhaT0hlTExSemUwdz09IiwibWFjIjoiOGMzNjU5Zjg1NjNkOTBiMmExMjE0MTQ3NmI1YzZiNWYwZjkwNDZkNzk5MWYyOWQwYzliNWZkYmRmYzdhZDgxZiJ9', '545494', 'Hajer.amarah@gmail.com', 0, 'dGpZvjbzC4uxtQWbICr1EQC9faXz94oumI9z0qstVvJpKYZxGiSSHTnob28dlFHPTqvdGGSDMSsoyIsjk8S8I2ik8ki1Prq5IvYXElKUE2wmEq7Z6kAH1EmNvaD338yBHktlOyGws2hw35MMEG8mS1Msjgc5pJOnhwB6uHjr9K6r0d31Ap8NPjR7auhu1n0Q5qjvIWfX', 'RNlDGPLIU9blGLHjltnfDi4X3YOJxy62w0Tw6SH949vqAXsb4v3wrYhw44v0', 1, 'HF7TaY5yFUNz164ARUjHyZ9O61T2', '2019-01-21 18:28:02', '2019-07-17 10:23:33'),
(397, 'hajoura-amara@hotmail.com', NULL, 'Hajer Amara', 'Hajer Amara', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'Ccob8FLdIYXG3lrJSFZ2G0GWokautMlyvLNDwjXTyV0FFuXGcAsX3Nhcot3yrOTtyU1NPRNuUbLpfqICQI0F4hx7oAC10UPhXD6ARYTxW32G8hUEvLC3qjAtLHo61QZPckasUZfJWgXJGlgcHYbx7mIix5glMVZzwT1lEnCwNNXLuiSxa3Jr4H9aQie3hrwCUq05TwWQ', NULL, 1, '', '2019-01-22 16:18:34', '2019-07-17 10:24:29'),
(398, 'younessjemaaa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'GGnLDNYhxuEJRr4x426rOoMleRiKH8FUauKwrfih9MUq84eAdqyfoymvsBP4JWGCiMTfl2MGVmgPc0ju3KNIh941NLgMbTXaF62Nb9AeSEL0K5t7xyWWftR6VfLTiReaRSpX13Cs4yRD5nopegYNf7QInO0RDlYdoEnOWvyXs48FDEbaKrSteyjvf6HTPWSKJ6DGsP8U', NULL, 1, '', '2019-01-28 20:03:37', '2019-07-17 10:22:04'),
(399, 'younessjemaaaa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, '49j365gp8s9JS5PiuBjfK4FpiIq7acLK1kDp1pBLEV4tByFv9WNrQVKlA615MXM2l9I7rUSkjKQEhtqyajvHpRSyXdmrWsALoTIJ5rjVq3eAFwwojqZa8CDkbX9hqe0H7HhxCuIiDvgRCdyb60jqnCNltLGSxj7Wjk1ccPkZLeQzuGNngs4isEAbwsjd9r6nBZKRqea7', NULL, 1, '', '2019-01-28 20:35:55', '2019-07-17 10:22:11'),
(400, 'azerty.wafa@gmail.com', NULL, 'azerty', 'azerty', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$aPiWdRcNZomuz6COhtkUneWGTC.BvBbf1N8i1J6maO6Q7NQoa0gPi', 'eyJpdiI6InBUUVFQV0ZpenlpNWY4d1JqQ05UNmc9PSIsInZhbHVlIjoia3Q2NmZ1WTcrbXRTVVF0aU1GcDAxUT09IiwibWFjIjoiMGYxNGI1YzcxYWRkYTcwOTNhMTAzZjZlZTQ3NDYwZTM4NDA3YmM3YTVjYmZlM2JmZGRkODUzYzA4YjFiYmRhZSJ9', '889879', '', 0, '8Adj4fhpQZS31AOlGBH7MhiN2mZEoHfIfp11dpMVjZuRdzsUqbwPycTvKI2ze6PF7oL5blU6DV1oSfda76vYGcDfat4DjYvVWgNDe5i5PA2zQeJPeqD112z2GQzTri40UDMOK6jY4P4fsPyWDcWjzWUVCsYKFtGsgrTFMK5Ss78ydGmSXJSRvy6L7WvEL3nfm3gKI6cg', NULL, 1, '', '2019-02-07 05:32:38', '2019-07-17 10:24:04'),
(401, 'azertyuio@gmail.com', NULL, 'azert', 'azert', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$X/7653aEvf.GtTeXr1FqpubbunSf9svawCIseHHqn71UhMN74jkaK', 'eyJpdiI6InF6MDhcL0NiZEpHRFpcL0RcL29hUWxKRkE9PSIsInZhbHVlIjoiVjlpS1dmc1BqdVJuXC8yengxQzlwcUE9PSIsIm1hYyI6IjJmYjU1YTA5YjRhY2MxYzllNTUwNjVmM2NkNGQ0Y2FmMGYyMjFkNTI2ZDlmNzYyMTljZThmOWRhNTQ5Y2QxNjcifQ==', '768556', '', 0, 'pWQU6yxh7eM8yUkbAJwi6kF32BbMJHuWpZ1a6jfuM1g2mIiwHa75ymPGUuj5BPeira63eGkVmbDSr41z5LENUczGzbUTN49nWFkKg85Ai3IvuN4os6A9LjeClpkI1Mb2ZVk3wnougQ7YmnLWxWhmsF9WsKneQsViSsC1sh3jgnh9FdbiJYUHoNt91xlJWyUUrwyOBmEf', NULL, 1, '', '2019-02-07 06:42:27', '2019-07-17 10:23:09'),
(402, 'azert@gmail.com', NULL, 'azert', 'azert', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$M/WFlPcSP1jUHvmiQUNy0.55ghZQOpxBJKUDjC8/GSfXiFDHpQlJS', 'eyJpdiI6Im1VXC9PSkNrMDJBcU1lQmcxc1FNTkNBPT0iLCJ2YWx1ZSI6IjUranZYbmI1UUVUZ0RGektcL1Yzd3NRPT0iLCJtYWMiOiI4ZTk2YWVkNGEwMGRhMmQyMjk0MDk1ZjMwMTIzNmY4YzNjMjdlNjdlNmM3YWYxNjlhODYwNjFlMTk4NmQ1ZDAzIn0=', '957214', '', 0, 'D0EH82Sis8iZyXeUnwJPa984m7FK7Q0e3re6aeSY7EzWjbI2QG5xgPKfGeyMtutOKnpurrtneJMrnha1iHnKyXyZ7k84UFSqbKTv1xCltC4YlubbY26UKVwXKyevAIZK3y5gQTfLcnt4XjfmwCuDa17VNiGeqUZ4rL5vtVFwzyNlxKLT6n7KTkiMq4WX2C4524bakOqe', NULL, 1, '', '2019-02-07 06:44:07', '2019-07-17 10:23:16'),
(403, 'azert@gmaill.com', NULL, 'azert', 'azert', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$adf74p4uFSrQW85iaovHr.e6.RMotkUIVJ4OrGjj4BM3Fbec9tWb.', 'eyJpdiI6IlEwQ2pINnZDUVg0OUZHVHhIdFdsREE9PSIsInZhbHVlIjoicGtoYTk2NTBXRkdRR0Z2VE1ONTFOdz09IiwibWFjIjoiOTc0ZWJlYTk2YWVkNTA1OWIyMjMzODY5MmYzMjQ4NTEyODI2NWE3YzA0N2M5NDFmYmFkZDZiY2IwNjNmNDMxOCJ9', '495433', '', 0, 'Glf4upwij6gIvBxoBair0RIjW2oQKldK9F1FMoyotheJbSu4cUCbFA2hDFIvI1BOspXfCXweeCoFivat8l4aDyApF8xl4EFkGjZHGW8AwhR5Lv1phLokEpWQCNWGxLRkIqcJmiFYJZxSNJPsTgBimsVUUY7zlBxrepwDksgQl2DbObTboqdxo56GMt7zTXBxmuZ7zw35', NULL, 1, '', '2019-02-07 06:46:07', '2019-07-17 10:23:23'),
(404, 'aghbvvh@gmail.com', NULL, 'wafa', 'wafa', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$GGbPq8gow8zKErJzH6jQk.ZymKWE.VtKSStxiPgOB8nk9Y41D3yAe', 'eyJpdiI6IlhqdEFHd1ZvVEI2M0JmM3lzb2FoV1E9PSIsInZhbHVlIjoibTlEUjJXc3UyRHA5SERmVlhyUGdPQT09IiwibWFjIjoiZmVmM2RjYTMyYTg4Mjc0MjRkNjAyZjFmN2I1YjZiNzIxMDkwYzEzZWI1NGIxYmQ1OWI4NmY5NTEzYjQ3NzRmZSJ9', '866553', '', 0, 'fTg3csuDUkh5DugR2w0xffHynsx2ENPhDbImNz2sgGi0L8OvB7Dlu9yfoPZf15WCTAJsLckHsIufFjoWFRqItEBJIuTkS9ZH9oGoIKfZ0Tq7DqelfoM4MrKrXapFQvi4PHua028Es5HxqJzOuPuNnzPVHjZR8joa0aWz0tzNxlYNrdS4I8MEGrS5KHhpoVVw2CflPeEd', NULL, 1, '', '2019-02-07 13:49:26', '2019-07-17 10:25:59'),
(405, 'hediamara55@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'X0VEbHUyEMYLyFCEB5Poux65ItXYhib1ZACZBEp9jJ9CPkqRmH2y3IAHZXkI8dUu5DoV8TekfcLZFVmguoQsjHKYtuTZbeUD0qVUarwvwMpIciieVzoeiPHa7ERbbT9Ax0XWBD8P2z8RrcdPUsMTQWvI6TYxKgdpR85jbIIqe0ZGxPWkqpyBcFiURUc7oAsWrSF8xExW', NULL, 1, '', '2019-02-08 23:00:07', '2019-07-17 10:22:17'),
(406, '119572065792881', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, NULL, NULL, '', '', 0, 'DvU7e1Mzv0OtkTFzkgwKTM3itnVFPk12TrWhSffuQjRVHQtzYovLpRAgjuOgUffBXUnxxk6UOiRBciT7cSwHUDSmwG0C25BEgLAEMptuggvzHAMF8ylEYVJFmf7u8bjcypLz2SYNNO7diXJv42P95cdM89hRgYW2NvHfI7shsQhCDYN228IaydeXOviW9gfBP3SjpWbJ', NULL, 1, '', '2019-02-11 20:13:33', '2019-07-17 10:22:24'),
(407, 'sadia@aalasolutions.com', NULL, 'sadia', 'anwar', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$Hv9bA9fAh5QNMq5mnLvTteU1YyDDAc06PqY0tgIuYrK3UXp1QROZ6', 'eyJpdiI6IklSRVFOT0hmdHRTUHFRRjI2QTQ2VXc9PSIsInZhbHVlIjoiUUZ3M2lNWG1TNEtwa2YxN1pMbG1hZz09IiwibWFjIjoiZDQ0YTE0MmM3MmJiMmY4MjE0YjA5ZWJlNDRlY2I5MjVjNWUxYjU3OWJlZDBhZWYzODUyYzZmMzM4NjE4NTAwNCJ9', '622614', '', 0, 'MOzb4rCUCHQemWVG9cmv8CwS1UTdhiNdSzCT0PfeBx1lTRjTp8ct1MGyXfT2VupSTmO6W9gHam4mct04wd2aSSsbtHjLlmWdyiN9mTLDFAg762LO8qrmGUBPrurBmnPFd96VMCR0IQqUleHgT1lRTGEM4KhqDHRorvLXaxZYXnvnKjmyIaUcy7lQyQ2OIeJ5Z21OY311', '7REIJQLq62rLU1wmn8NTvqYHz8yaFEXaoky5QbIdqucBzhQymc7SjaC44U3u', 1, 'uEhC41Gtw9XIuoIin9n7KTEK5Jo1', '2019-02-27 17:20:19', '2019-07-17 10:24:55'),
(408, 'moreiregister@gmail.com', NULL, 'moreo', 'register', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$H2aiWwwCDuGVL9yVKQM.Zelup1B5m8jPwHM2tNQ3Ih9fuHDgQN1ca', 'eyJpdiI6IjI5elBPY1VMRGk0NlpxTTFjS1FHY2c9PSIsInZhbHVlIjoiQ0VzdVd5RjlTOENjY2xwQ1dvc3hSVGxjSjJwMDZGSDUrMlM2UGtqZTdkWT0iLCJtYWMiOiI4NThiNjkwNzdhODc2ZGNjMGM3ZTExZGI2ZTRhYTA3NjhlOWJmNWEzZThlNTVkMTJkYWMyOGFhYjAxOTU0YTgxIn0=', '936282', '', 0, 'IcdW8C4wvwy2wCF0TsR4EWzP2buAGFHr7lcIGV2GxlSRJqbH0yF346RfiugN2ZQCY2idxUXBfaZDBacvVkRRwNy34TZNkCGg20Srll1e86RTsUSHjuqULg940yDabScCg50QTHkPbIjS47FF65oCeEJe9GHul1rWLOMz9i3RIPjMFgOrafCAfCdBLSTx2TeNtfmfeXaU', NULL, 1, 'mjqOyysr7JREfvlfDRqlkTTx9pI2', '2019-04-19 01:20:14', '2019-07-17 10:26:53'),
(409, 'teimuraz.kantaria@gmail.com', NULL, 'moreo', 'register', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$NQ5tkDE/UgCqNCgpTFFYe.tFVnjAsVr/cHfyB7DQvKScjaL/GRtAq', 'eyJpdiI6InAxU1ZSMXhtV2cyWUgzRFQwRzZCUFE9PSIsInZhbHVlIjoiYmx2YXBlRE9xNlk3VXlrb3BcL1IxczNGOU5mVnJiUkpFMVA2VDdtanM5MDg9IiwibWFjIjoiYTMwYWQ0OGYzMTc2NWRmOTQwNmRjZGFjYTZiMGVhMTVhMTZmMTQyNDUyNjNmM2U1NTM3MTE0MGQyZDdjMGZkNyJ9', '651449', '', 0, '93Dt5QnBqdvtzoIAoh1xhV4oe01bPNMYjZSZc0b4oUEqd8yF6ICB5EVDFF4me3x04nC0VgHcXTCRIT9TlHVRri59P35H6VciAFnsMQthl0XSU8MHWscAcIRzBC27LGHNXoPaV4wPGk1Z89trwfPVBdQIzEG88zGCclcaWrZk1vlbO51oOZe8xjrB7A2PBhSH8O9CAONY', NULL, 1, '9Efx9ezO1tRIZJfXeeeQEzT091Q2', '2019-04-29 19:40:40', '2019-07-17 10:24:50'),
(410, 'sfkazmi0@gmail.com', NULL, 'Syed', 'Kazmi', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/410/1564305515__67698527_2933254200080718_4535236304933224448_o.jpg', '/uploads/custom_size/1564305515__67698527_2933254200080718_4535236304933224448_o.jpg', NULL, NULL, '$2y$10$yVJ4D1n8iBkoJbOXhLHOruDncnKynAcTwu.wfWPBCP6kLA2Ys.9Gi', 'eyJpdiI6Im4zdmJNWGM3Q0d6Y1R0V2V1RGFiMlE9PSIsInZhbHVlIjoiQXRhQ1dlWVhaTWtSNFBDMk1BamdsUT09IiwibWFjIjoiMDI2MTA3NGEwZDk2Y2M5MTU3OWQxN2YwN2RhNTUyNjI2YzYxYTEyZWI4Y2EzOWFlNDk3NTQ3YjkwMzc3NjAzZiJ9', '486878', '', 0, 'UFA0OMHrcDVKjU98O6VQBPNLodu1Rc5NidXk776EILQaHXupjnErQySE7kPId6KDSsDs7VLv3ZB2D9Dmqrux8332VMwTzErI98ko0abAlT2SxE2TB1AXgr9vsRtufdoPEXa6OXegpMrRPW6JZOWEqKjyqbDUSIERyyeg3v9kRaZS1wzbuIZEXALe7oSvJNrprboMtZoZ', NULL, 0, 'rESw21jGeaa0UplRm0Uv1UDq2iv1', '2019-05-08 03:42:10', '2019-07-28 16:19:31'),
(411, 'muhamad.nadeem@crewlogix.com', NULL, 'Jam', 'Nadeem', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$kR6DPDnzdEcXHq93aYaOG.bJZH.DYv1C7SgZO.siORQFiUEUL67rG', 'eyJpdiI6IkQ5MWdUdFhEYzNEQ3JvK3VDU05zQ1E9PSIsInZhbHVlIjoiYlp5akZvemZBVVwvSnNBVmFLeHkyY2c9PSIsIm1hYyI6IjdjNzQ1NWU5YTZlMGIwZDU3MjBiY2QzMWQxZDMzYWI5NTk4NTVlOWRkYzE3NDE2ZDMyMzA5NGEwYTQ0NDQ1MTIifQ==', '619650', '', 0, 'z4JYOIq8rv2s9Zd5gpSOKH2gz6G8GdFOfxImubDqtAgYDrFcTlczURx1tRTPraWWQ1kBCUh3lDcLD5BTPW2GAkRaSV58Xh2xqoN3EkpP6VsyEeg6hUV2Ub2wXP3yJbwiKRIqx9f7nlA3WZ0IspB12Bnj6SGhFiQ57mRPfahDPpJsikkUcQwbTAXGmyT71HEaMdUlpopb', NULL, 1, 'gNfgOCegFNQQZDEQp7AlwzcoHQA3', '2019-05-09 14:38:47', '2019-07-17 10:27:07'),
(412, 'virat_it_ccet@yahoo.co.in', 'viratgandhi', 'Virat', 'Gandhi', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$tBXDmCl81ko/DVf/CW5k3O89/R.FGLASgKDGkajhdZEAIsQsuorSa', 'eyJpdiI6IkJkYTJBejd5ZzFJT3dmamdrYlNXT3c9PSIsInZhbHVlIjoiWVBQMnY2RENISG5RSGViN3dBXC8xd1E9PSIsIm1hYyI6IjVhOGQ5M2VmZjM5NWQxNDdiYjBkMGE0NzRmOWU4ZGM4NDk4ZTg2YjIzNmFmMWY1MGMwMmRlZGRkMGFjZmZmZDAifQ==', '465725', '', 0, 'sGlnKW5tDq9THdqaeLgKWQoP3sxa6yqiDLLbuFWZ9TzEWBXrq9s1EKjmFnRgRAfqkPtYC0EU1j4MWIyHqLhslSyF3bfWg2PtaiRc98hgro8hyCPFBl5Nxe8KawHwUz2I9zZaLWZcgD53BnrRjey7UEP3DCveSKKGSiZLUNYLoIN5pB3fNCHeJIEF24RUf856L2iHr1ZY', NULL, 1, 'XOrAheQOB1dsD1onZKsuIu21S2E3', '2019-05-09 19:44:38', '2019-05-09 20:01:33'),
(413, 'rafathaque1997@gmail.com', NULL, 'Rafat', 'Haque', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$REz3EBldY1fCvODoBKBzTuV43nhotuay.VqSZBvJpTHon.OV3Nt/u', 'eyJpdiI6IlJrXC96VGt1SW9oSUZcLzdMMTFqYnRCQT09IiwidmFsdWUiOiJjNkZ2cmlFMjdDYUhuTGk5T0oyXC9ZMVFyS1c2QVwvVUhhTEhVditmRjJ4SWc9IiwibWFjIjoiZGIxZDBjNTZkNDU1ZDc1YmU5MmE4NmMzMzc0ZWUwODNiNDM0Zjg1ZGU5YjBiNWYyMWM5M2RhMjYzYzcxOWU3MiJ9', '172762', '', 0, 'wDdMac1aFgXbmflVABpvEk3Tkb8iQ9YaHcR6XO18ZS7MHGl8WbtkUac3qjHsml7lVvdCnL1ci9AxW55R6RyJUvHjCw9CUKKv2uiFP9PAJqhwozlOJ0fuYwBA94YWbWuNnMnSGqmQZyCNT1VkHYJUYmLw1sczXA8P6N4LNNrBZ9w1E7PJv37L4q8fj09Hayyt95U9rudn', NULL, 1, 'J6IRRNgbMbUJ4TaAny2mynbkAr63', '2019-05-09 23:03:42', '2019-07-17 10:25:08'),
(414, 'rentasuit@yopmail.com', NULL, 'hajer', 'amara', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$jSGs2nNLan6misFt0YleXurC1vW.3RUn1flXaszSId0dxDCOTRc5a', 'eyJpdiI6Im5iYWo5TlFQUnFuS1NuMGljUG14VHc9PSIsInZhbHVlIjoiaHF0QmY5ZEZaTU1RWm55bEJxN251dz09IiwibWFjIjoiNDIxNDcyNjZiODIyMmQ4NGE4NmJlNjUzM2E1NjAzODU0MDdiN2RhMzE5YWMxNmViNDhhOGZlMGU5ZmFiNDRmOCJ9', '828837', '', 0, 'U2ut1jpt6ujamzsUMMW9kMCaW4Ujc7bPNXCdcB7oM9csJNDuQvE2R5MTi6Am9123d1o5UqilvPiG2BSh7pgQhZvhMHOClDplosGlURLjxFG0WWv0W2jq99wI05iqYhLmErWeiCxk0poHKOuEVDHuqW1lD0LDnAHm9z1oC3WwWe6qYX3AITgPmkLtSaPGnHEUwVsXxc24', NULL, 1, '', '2019-07-10 21:24:20', '2019-07-17 10:23:40'),
(415, 'rentasuit01@yopmail.com', NULL, 'tina', 'tin', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 0, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$qsRuyox2uYcNfU2dyuW7XOcgps8hr2DP9kj6bfz2UrvTrRZ.EIsX.', 'eyJpdiI6Ijl0SzVSMGtTMzF5SHlMblc0VVJ0S0E9PSIsInZhbHVlIjoiVHl0MmNldFwvSHM0Zm5MNGVqZWdhelBNRHY4NW5MZGZ6NXpWQzZWaXZLbjQ9IiwibWFjIjoiM2EwMjcyYjljMTVlZTgwYjU0MTEyMDAxY2FjZGVjNTIxYzFlNDhjMDZkNDFiYTA1ZTY1NTk5NzAxNzYwYTY3MyJ9', '973817', '', 0, '2bdQQP7T6wvyllmO62RA23bibXW6axluJMVouoLnImJ5rFzUVaRAj9MzS3KOs2fdySgQR1WhVImrylMaGUcSnzGtjBIEyEkrlThUnR1Am7sC7wFypf6qy5Ws9C6qCiy7MTtoGJoaa7jd8ihSphYKFRRQ7JIzP5pZWXDzOhFyGoRPFOzISk8agTMwTeRqNdijesLfaTYN', NULL, 1, '', '2019-07-11 15:42:23', '2019-07-17 10:25:18'),
(416, 'nanouvilgrain@gmail.com', NULL, 'NANOU', 'NANOU', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$H3cXhzbP1ZCspWQrYZZzHOEByFUmOz2zlX8q/xMhLy.e2dhWYiPhm', 'eyJpdiI6IlRvZDlaTFp4Sm1iZDFnOWFVRjh3M1E9PSIsInZhbHVlIjoiRkpiUDdXNVRmS2k0SzN6QkxxNDhFKzVZQXZSUGZuY3ZObEFOK3RrOXBLWT0iLCJtYWMiOiI2MjMxYzhkOTgwMzZkYmY0OWY2NWJmMTJjNjkyZjY4ZjkxM2U2MjUxNmFiYjMzZTkzZTQ3N2QxMjcyZTg2YmQ3In0=', '729304', '', 0, 'b8h27RbucyvNBAiIzExb4Y2JFUbPj1WilQz8l02Xhe6UOUOhcD6ZWaNObEVTBMtB5Q4Jd6TfstxoB4JwJ1Ddc8XJwpO00bRllYz7zNL1m2iN15CH8ffNNN0ha0WhVKe9GhxIXwoYgFn6ini52E0bNaWpm96DXnIpSVyHc60YOW2pRWdXKksC8xxJB0Nbe3dEEKxQCM27', NULL, 1, 'AYkKpH3P9KTjCt6ozPwnF3kKyDE3', '2019-07-17 10:53:14', '2019-07-17 10:57:07'),
(417, 'Rentasuit02@yopmail.com', NULL, 'Yannou', 'Yan', NULL, NULL, NULL, 0, 0, NULL, '', NULL, '0', NULL, '0', 1, 0, 0, NULL, 1, 1, 'uploads/profile_picture/417/1563448894__1563448894.jpeg', '/uploads/custom_size/1563448894__1563448894.jpeg', NULL, NULL, '$2y$10$fI24cfKQPBgRbQo1ZJIxauwEo9SDc96pdz.z554qX4TKe1VuNvhyC', 'eyJpdiI6Ild6MHpjQjVCWVRiVUNWUUp1dHBBaFE9PSIsInZhbHVlIjoiK3ZGT3lPK2NVTU1NdHBHbUFNbnZBMkVSUGZ3a3BhMEpFOHZ3dFhDWEo2RT0iLCJtYWMiOiJlOTU5YTIyYTg3YTdlMGVmZGZjNGZhZjU3OTI5YWI1NjBlMzgxZDliNDk4NTgxM2ViN2I4NTNkZjk5MTAwMTM1In0=', '716250', 'youneaajemss@gmail.com', 0, 'L31jWxygwiRUqpQCoKO5tFhNrSIdOpXPZQ502RDRNjYvg5rFVpJX1OEOw0A7tieoVVbn0QL2KHWJKgyvIcibY4BCUs0sp491Rtjuc9J5WwjIFAFBPXrb20Qeon28pVsGkuAnO2chSwPbZC3YRAYYnUY1BDDp4A72Z8HFfXNmeKVbbbKLNtAvcH2mDMr8egwCd3pfjCde', NULL, 0, '', '2019-07-18 15:40:45', '2019-07-18 18:21:35'),
(418, 'liaison.giovanni@laposte.net', NULL, 'giovanni', 'Test', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$E1Kh2D10QtaoX0LKGmTlA.ue5Q8vHopX3DCRKr9uGVDtbDyUndQI6', 'eyJpdiI6ImFjVXdmMTh6RTNBanpcL2ZIb0x2cHVRPT0iLCJ2YWx1ZSI6IkpabXlZVFROSit1S3o4eHZYdmF0MGt1ZTNYSkhHU3VBT1NQeVB6bWwzZ2s9IiwibWFjIjoiZTA3NjAxMzVmOGNlMWE0ZDliZGI4MzllZjUyMmY3YTg4OWI4NDFlZWMxOTU1ODRiNmM4MmZhYWZiMDJkMDhkZiJ9', '539015', '', 0, 'C7mfH0A6wOGQzf2lJpfGWLShcIruVQ451Hfz18u5KM8RB5X0zCyc4HfpW6iX1ndLyyCSIiAk0ggbjesec3euEHtPKZBRPszfs2Jg4S6zREV6SO8mGblf8zww6m3cVwba1IJJDnDv7UIMh2xq7OVV8DbK4LkAtI6Xa3WDh2dRFeyIwhpXgDvohrLWbza2iGBJ9UJ756Cg', 'tJK6z1w0eWTh7F0tzVXyV2zTJBga9Sxqva6TTtk9Q6u6JIxo4uWatPCednXe', 0, 'Pds8pOfuboatPLlUcnQjt7xMa5I3', '2019-09-12 05:39:16', '2019-10-27 07:06:45'),
(419, 'afterklugge@gmail.com', NULL, 'Adilet', 'Erkinbekov', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$Ndq9rs/HeKvSGYDN3qoskeHntRg5eusCb6laaNAshCphx9aUFDu7a', 'eyJpdiI6Ilg1MkxwMkhmXC9CcUx5ZENQYnVraGZRPT0iLCJ2YWx1ZSI6ImpITU9zV1RjT3dKSFZrUVd2ckF5ZHc9PSIsIm1hYyI6IjEwYzYyZDBlYjJkOTUwMDIyYTU4N2FjYjE3NjFlNDhhOTMyN2UyNDU3OGFmNjYzYzFjOWVmYTQ4N2I1MzI5ZDQifQ==', '527657', '', 0, 'SBxsSRajoIliYpjtkYUSzGDCZHm5MKbnRy95R1TPYkRrhKh9pvtNl2BH9O6NRpSWOKYOWoPh19vHie5y98i90HkkKdf7ijNKXpAeWe18lNuRYgCdcunYs2kbOfSsu03nEkhHPpBD0GzWlaTjXpBb7mXjtz13PUnemG71JXmKHMcaSPog6sz4tS9xQIEbGKnwoJMwbp7s', NULL, 0, 'oFyh8iINzba9YLSOKG7cIqkScWu2', '2019-09-16 17:47:04', '2019-09-16 17:50:34'),
(420, 'erkinbekoffski@gmail.com', NULL, 'Adilet', 'Erkinbekov', NULL, NULL, NULL, 0, 0, NULL, '', NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 1, 1, 'uploads/others/no_avatar.jpg', 'uploads/others/no_avatar.jpg', NULL, NULL, '$2y$10$pSN6Ja7tdo9/mljL/.WHLeI06c6AlkS0Xj1Sg88ojS2RqQ4JaYD06', 'eyJpdiI6IkVhVjlIZTNVMTYyZFdNbzhUb1JTV1E9PSIsInZhbHVlIjoiN1U4a2lvbmc1RUZkaHNyYjJKS2xxSjIwRzNPXC85cldCZjdhSFRpMUNYS3c9IiwibWFjIjoiNjk1Y2MzODFhMTI1YzM0NGNiYTI4NDE5ZDczZDdhZTQ5ZDdkNGYzNGM4MDY2YmNiNTBlYTBhMzYxZGMwODNmMyJ9', '160969', '', 0, 'iZYPQIvPCeK9N3pOd5B2tu9lpZpWOMDxnfTG7w30a8kcPyWHpRej3LuhLelE8dmmZzHnQgdxuqBkuItz4434JlwZVPZhOHInXBJr9mB7vQldApuLOpFcCzUmRh0794aqsMFUFwjFcaf1txP7V2ixto7dQwaDMnEJZwe7Iap2qnsvgTkGQtokW1aOUHltsOOsvTb5W2Wd', NULL, 0, 'kcyTZMeTwmVJ5WFkXDIoO6Oqj8Q2', '2019-09-29 19:38:37', '2019-09-29 19:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_device_token`
--

CREATE TABLE `user_device_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `device_type` enum('Android','IOS','','') NOT NULL DEFAULT 'Android',
  `device_token` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_device_token`
--

INSERT INTO `user_device_token` (`id`, `user_id`, `device_type`, `device_token`, `created_at`, `updated_at`) VALUES
(8, 215, 'Android', 'eMm6_EFNc-I:APA91bGrZ-nSeDukJF-Dswgvlx1BVcUunmWQ0eyijoy3IqFY11m71TxJ0Z0qdg_MoedI9ETy16yy3JHLK8YV9XeAxqkuzMcdU9yKC5iM7q1g5YdeROV5NCPVyZ_7Kx1x04f1NwLG0nN1', '2018-04-13 11:21:57', '2018-04-13 11:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 220, 340, '2018-04-13 12:15:25', '2018-04-13 12:15:25'),
(2, 220, 344, '2018-04-13 16:26:42', '2018-04-13 16:26:42'),
(3, 301, 344, '2018-04-26 15:36:54', '2018-04-26 15:36:54'),
(4, 303, 343, '2018-04-29 22:21:03', '2018-04-29 22:21:03'),
(5, 308, 344, '2018-05-09 20:36:50', '2018-05-09 20:36:50'),
(6, 310, 344, '2018-05-11 13:32:30', '2018-05-11 13:32:30'),
(7, 311, 419, '2018-07-03 18:05:14', '2018-07-03 18:05:14'),
(8, 311, 420, '2018-07-03 18:33:57', '2018-07-03 18:33:57'),
(9, 217, 416, '2018-07-07 02:04:07', '2018-07-07 02:04:07'),
(10, 217, 420, '2018-07-11 04:02:30', '2018-07-11 04:02:30'),
(11, 217, 386, '2018-07-12 03:19:50', '2018-07-12 03:19:50'),
(12, 314, 417, '2018-08-07 17:21:23', '2018-08-07 17:21:23'),
(13, 314, 428, '2018-08-07 17:42:23', '2018-08-07 17:42:23'),
(14, 319, 385, '2018-08-15 14:41:00', '2018-08-15 14:41:00'),
(15, 314, 437, '2018-08-17 13:23:38', '2018-08-17 13:23:38'),
(16, 217, 437, '2018-09-04 10:11:16', '2018-09-04 10:11:16'),
(17, 302, 439, '2018-09-08 01:55:25', '2018-09-08 01:55:25'),
(18, 302, 438, '2018-09-08 01:55:36', '2018-09-08 01:55:36'),
(19, 302, 442, '2018-09-08 01:55:42', '2018-09-08 01:55:42'),
(21, 335, 442, '2018-09-15 23:50:07', '2018-09-15 23:50:07'),
(26, 338, 454, '2018-10-10 03:27:11', '2018-10-10 03:27:11'),
(75, 361, 435, '2018-10-20 07:06:24', '2018-10-20 07:06:24'),
(76, 361, 448, '2018-10-21 00:17:14', '2018-10-21 00:17:14'),
(78, 361, 451, '2018-10-22 01:02:03', '2018-10-22 01:02:03'),
(80, 361, 443, '2018-10-22 04:16:19', '2018-10-22 04:16:19'),
(93, 351, 372, '2018-10-24 03:04:44', '2018-10-24 03:04:44'),
(94, 365, 450, '2018-10-24 03:45:48', '2018-10-24 03:45:48'),
(97, 365, 454, '2018-10-24 03:54:35', '2018-10-24 03:54:35'),
(98, 303, 372, '2018-10-27 02:40:07', '2018-10-27 02:40:07'),
(113, 360, 451, '2018-10-31 03:56:16', '2018-10-31 03:56:16'),
(117, 361, 366, '2018-11-01 05:06:37', '2018-11-01 05:06:37'),
(118, 361, 365, '2018-11-01 05:06:39', '2018-11-01 05:06:39'),
(120, 361, 371, '2018-11-01 05:06:43', '2018-11-01 05:06:43'),
(122, 361, 369, '2018-11-01 05:06:45', '2018-11-01 05:06:45'),
(125, 360, 443, '2018-11-02 04:30:48', '2018-11-02 04:30:48'),
(126, 360, 442, '2018-11-02 04:30:50', '2018-11-02 04:30:50'),
(130, 360, 435, '2018-11-03 05:59:59', '2018-11-03 05:59:59'),
(132, 366, 457, '2018-11-08 04:22:39', '2018-11-08 04:22:39'),
(134, 370, 457, '2018-11-15 03:17:37', '2018-11-15 03:17:37'),
(137, 371, 457, '2018-11-15 15:08:02', '2018-11-15 15:08:02'),
(141, 319, 456, '2018-11-15 16:45:46', '2018-11-15 16:45:46'),
(142, 319, 446, '2018-11-15 16:45:56', '2018-11-15 16:45:56'),
(143, 379, 464, '2018-11-28 14:04:25', '2018-11-28 14:04:25'),
(144, 384, 464, '2018-11-29 13:58:57', '2018-11-29 13:58:57'),
(145, 379, 435, '2018-11-29 14:11:33', '2018-11-29 14:11:33'),
(146, 386, 464, '2018-12-03 15:27:20', '2018-12-03 15:27:20'),
(151, 389, 471, '2018-12-11 16:30:37', '2018-12-11 16:30:37'),
(152, 389, 459, '2018-12-11 16:31:23', '2018-12-11 16:31:23'),
(153, 389, 473, '2018-12-12 22:22:16', '2018-12-12 22:22:16'),
(155, 370, 476, '2018-12-20 18:21:30', '2018-12-20 18:21:30'),
(156, 366, 476, '2018-12-20 22:34:39', '2018-12-20 22:34:39'),
(157, 394, 477, '2019-01-11 23:22:47', '2019-01-11 23:22:47'),
(158, 369, 473, '2019-01-15 22:31:19', '2019-01-15 22:31:19'),
(159, 361, 427, '2019-01-26 19:15:50', '2019-01-26 19:15:50'),
(160, 361, 462, '2019-01-26 19:16:20', '2019-01-26 19:16:20'),
(161, 361, 431, '2019-01-26 19:16:25', '2019-01-26 19:16:25'),
(163, 361, 478, '2019-01-31 03:00:56', '2019-01-31 03:00:56'),
(164, 361, 477, '2019-01-31 03:04:25', '2019-01-31 03:04:25'),
(165, 361, 475, '2019-01-31 03:04:29', '2019-01-31 03:04:29'),
(166, 361, 372, '2019-01-31 03:11:28', '2019-01-31 03:11:28'),
(167, 361, 370, '2019-01-31 03:14:03', '2019-01-31 03:14:03'),
(168, 396, 442, '2019-02-11 16:34:05', '2019-02-11 16:34:05'),
(169, 396, 423, '2019-02-11 16:40:20', '2019-02-11 16:40:20'),
(170, 396, 371, '2019-02-11 17:57:48', '2019-02-11 17:57:48'),
(171, 411, 488, '2019-05-09 14:42:13', '2019-05-09 14:42:13'),
(172, 411, 487, '2019-05-09 14:42:36', '2019-05-09 14:42:36'),
(173, 413, 488, '2019-05-09 23:07:14', '2019-05-09 23:07:14'),
(174, 419, 481, '2019-09-16 17:51:33', '2019-09-16 17:51:33'),
(175, 418, 487, '2019-09-28 12:02:55', '2019-09-28 12:02:55'),
(176, 420, 372, '2019-09-29 19:46:31', '2019-09-29 19:46:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`,`category_id`),
  ADD KEY `categories_blog_categories_category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cleaner`
--
ALTER TABLE `cleaner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `dropzone`
--
ALTER TABLE `dropzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `sender_id` (`from_user_id`),
  ADD KEY `reciever_id` (`to_user_id`);

--
-- Indexes for table `messages_room`
--
ALTER TABLE `messages_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_latter`
--
ALTER TABLE `news_latter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `page_section`
--
ALTER TABLE `page_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_user_review`
--
ALTER TABLE `product_user_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rattings`
--
ALTER TABLE `rattings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_details`
--
ALTER TABLE `rent_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_details_transaction_detail`
--
ALTER TABLE `rent_details_transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_device_token`
--
ALTER TABLE `user_device_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cleaner`
--
ALTER TABLE `cleaner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropzone`
--
ALTER TABLE `dropzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages_room`
--
ALTER TABLE `messages_room`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_latter`
--
ALTER TABLE `news_latter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `page_section`
--
ALTER TABLE `page_section`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `product_user_review`
--
ALTER TABLE `product_user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rattings`
--
ALTER TABLE `rattings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent_details`
--
ALTER TABLE `rent_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `rent_details_transaction_detail`
--
ALTER TABLE `rent_details_transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `user_device_token`
--
ALTER TABLE `user_device_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `users_blog_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_blog_categories_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_blog_categories_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_content`
--
ALTER TABLE `page_content`
  ADD CONSTRAINT `page_secion_page_content_section_id` FOREIGN KEY (`section_id`) REFERENCES `page_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pages_page_content_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `users_products_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `categories_product_categories_product_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_product_categories_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `products_product_photos_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
