-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 12:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_b1`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`, `published_at`) VALUES
(1, 2, 'Q kajete sega koi e po piqn az ili vie????????', 'zdxbDSGDSGSDGSDGS\r\nDGsdg\r\nsdg\r\nsDG\r\nsDGSDGsDGSDGsDG\r\nsDG\r\nSD\r\nGsd\r\nGs\r\nDG\r\nSDG\r\nsDG\r\ns\r\nDGS\r\nDG', '2015-04-27 06:54:50', '2015-04-27 06:54:50', '2015-04-27 06:54:50'),
(2, 1, 'first article', 'body body head', '2015-04-26 07:16:29', '2015-04-26 07:16:29', '2015-04-26 07:16:29'),
(3, 2, 'Long article Lorem ipsumLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem i', ' Lorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra long', '2015-04-27 08:26:47', '2015-04-27 08:26:47', '2015-04-27 08:26:47'),
(4, 4, 'Lorem ipsum very very extra long', 'Lorem ipsum very very extra long\r\nLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra long\r\nLorem ipsum very very extra longLorem ipsum very very extra longLorem ipsum very very extra long\r\n\r\nLorem ipsum very very extra longLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra longLorem ipsum very very extra long\r\nLorem ipsum very very extra longLorem ipsum very very extra long\r\n\r\nLorem ipsum very very extra longLorem ipsum very very extra long\r\n\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra longLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\nLorem ipsum very very extra long\r\n\r\nLorem ipsum very very extra long\r\n\r\n\r\n\r\nLorem ipsum very very extra long\r\n\r\n\r\n\r\nLorem ipsum very very extra long\r\n\r\n\r\n\r\nLorem ipsum very very extra long\r\n\r\n\r\n\r\n\r\nLorem ipsum very very extra long', '2015-04-27 05:27:56', '2015-04-27 05:27:56', '2015-04-27 05:27:56'),
(5, 3, 'Las Vegas', 'Located on the Las Vegas Strip just south of Russell Road, this historic sign famously reads, "Welcome to Fabulous Las Vegas, Nevada" on the front and "Drive Carefully" and "Come Back Soon" on the back. The sign was designed by Betty Willis while she worked for Western Neon Company and cost $4,000 to build and install. Willis also designed the iconic signs for the Moulin Rouge hotel. When it was created in 1959, access to the sign was very limited -- the median''s curbs (along with the lack of close parking) made it challenging to stand right next to one of city''s oldest symbols. The result? People either jaywalked, or risked parking in one of the Las Vegas travel lanes. But scurrying across the street and dodging speeding cars is now a thing of the past. You and your group can now pose by the sign and snap away with ease. The iconic "Welcome to Las Vegas" sign features a 12-car parking lot, which is designed to improve pedestrian safety and even provide access for the disabled. There is also enough space to park two buses. Another sign of progress for the iconic sign -- it is now solar powered. The city recently installed power trees on the signs west side. While the trees might temporarily block your view while driving by, you can easily park and get an unobstructed photo in front of it. The sign''s original creation was inspired by her father, Las Vegas pioneer S.R. Whitehead, Clark County''s first tax assessor, who died 18 years before the sign went up. "Dad was so strong on getting people to come here," Willis told the Las Vegas Sun in 2005. "I think my dad would be proud of what the sign has accomplished." On May 1, 2009, the "Welcome to Las Vegas" sign was added to the National Register of Historic Places.', '2015-04-27 18:52:52', '2015-04-27 18:52:52', '2015-04-27 18:52:52'),
(6, 4, 'Bulgaria', 'Bulgaria Listeni/bʌlˈɡɛəriə/, /bʊlˈ.../ (Bulgarian: България, IPA: [bɐɫˈɡarijɐ]), officially the Republic of Bulgaria (Bulgarian: Република България, IPA: [rɛˈpublikɐ bɐɫˈɡarijɐ]), is a country in southeastern Europe. It is bordered by Romania to the north, Serbia and Macedonia to the west, Greece and Turkey to the south, and the Black Sea to the east. With a territory of 110,994 square kilometres (42,855 sq mi), Bulgaria is Europe''s 16th-largest country.\r\n\r\nOrganised prehistoric cultures began developing on Bulgarian lands during the Neolithic period. Its ancient history saw the presence of the Thracians and later the Greeks and Romans. The emergence of a unified Bulgarian state dates back to the establishment of the First Bulgarian Empire in 681 AD, which dominated most of the Balkans and functioned as a cultural hub for Slavs during the Middle Ages. With the downfall of the Second Bulgarian Empire in 1396, its territories came under Ottoman rule for nearly five centuries. The Russo-Turkish War (1877–78) led to the formation of the Third Bulgarian State. The following years saw several conflicts with its neighbours, which prompted Bulgaria to align with Germany in both world wars. In 1946 it became a single-party socialist state as part of the Soviet-led Eastern Bloc. In December 1989 the ruling Communist Party allowed multi-party elections, which subsequently led to Bulgaria''s transition into a democracy and a market-based economy.\r\n\r\nBulgaria''s population of 7.4 million people is predominantly urbanised and mainly concentrated in the administrative centres of its 28 provinces. Most commercial and cultural activities are centred on the capital and largest city, Sofia. The strongest sectors of the economy are heavy industry, power engineering, and agriculture, all of which rely on local natural resources.\r\n\r\nThe country''s current political structure dates to the adoption of a democratic constitution in 1991. Bulgaria is a unitary parliamentary republic with a high degree of political, administrative, and economic centralisation. It is a member of the European Union, NATO, and the Council of Europe; a founding state of the Organization for Security and Co-operation in Europe (OSCE); and has taken a seat at the UN Security Council three times.', '2015-04-27 14:59:31', '2015-04-27 14:59:31', '2015-04-27 14:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_23_075203_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aleksdimitrov85@gmail.com', '9c880a1c22987c7f0019ff0ac1994a2820920559d6dcd4d2b658db2555761295', '2015-04-27 10:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aleksandar', 'aleksnadar85@abv.bg', '$2y$10$I9cSNu3dabdIvva9gL/LieC99xhfyplwehHyGCGZo.kZNWiUVasDu', NULL, '2015-04-25 11:14:31', '2015-04-25 11:14:31'),
(2, 'Александър Димитров', 'aleksdimitrov85@gmail.com', '$2y$10$U.pUYtIF8ljdgupY67YShOHciaxaDu/u0mBk2mlfj8juE9W2Wugw.', '34lTrANnWFcjGVRkWSDRSGox6mIIDhY22pH6TrQ3YUDcc4EKYcmJQeCoGV2e', '2015-04-25 11:16:17', '2015-04-27 13:22:37'),
(3, 'ivaylo', 'fsfafafa@gmail.com', '$2y$10$oFnmXq5gTszRfFTQzeSQluPx8vvK3CIg4UBh01hrrLNtKdN3qp14i', '6GPwJf8O3Yzy4jR1NHbUqIuE1epJtdhgEoOfURygfTcBLAertYSyc5k4y8yM', '2015-04-27 18:50:00', '2015-04-27 18:57:17'),
(4, 'Joana', 'joana@yahoo.com', '$2y$10$fs1zG5AxMghrr.aNkwuHgeeYm6tc/yatysEO1q54A1UhNWRYlOsIW', 'clT7ADo5RT0peslcnoNhz0xUqM4RDlxIMvqBqvb8lfZapjNvF18wFWSudtHF', '2015-04-27 18:57:55', '2015-04-27 19:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
