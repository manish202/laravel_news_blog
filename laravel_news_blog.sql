-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 01:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_news_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(50) NOT NULL,
  `post_under_cat` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `post_under_cat`, `created_at`, `updated_at`) VALUES
(1, 'bollywood', 0, '2023-10-26 05:57:21', '2023-10-26 05:57:21'),
(2, 'hollywood', 0, '2023-10-26 05:57:29', '2023-10-26 05:57:29'),
(4, 'dance', 0, '2023-10-26 05:57:42', '2023-10-26 05:57:42'),
(5, 'politics', 0, '2023-10-26 05:57:51', '2023-10-26 05:57:51'),
(6, 'sports', 2, '2023-10-26 05:57:57', '2023-10-26 05:58:39'),
(7, 'music', 2, '2023-10-26 06:01:45', '2023-10-26 06:01:45'),
(8, 'cooking', 3, '2023-10-26 23:06:27', '2023-10-26 23:06:27'),
(9, 'business', 4, '2023-10-26 23:06:34', '2023-10-26 23:06:34');

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
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_10_25_124144_create_category_table', 1),
(11, '2023_10_25_130524_create_users_table', 1),
(12, '2023_10_25_130852_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` bigint(20) UNSIGNED NOT NULL,
  `ptitle` varchar(100) NOT NULL,
  `pdesc` text NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pcat` bigint(20) UNSIGNED NOT NULL,
  `pauthor` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `ptitle`, `pdesc`, `pimage`, `pcat`, `pauthor`, `created_at`, `updated_at`) VALUES
(1, 'i am just testing my blog post.', 'hey kkk ppp uuuu iiii ooo ppp jjjj hhhh ggg llll jjjj yyyy tttt rrr.', '1698381632.jpg', 7, 1, '2023-10-26 07:43:18', '2023-10-26 23:10:32'),
(2, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.\r\n\r\nAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1698381023.jpg', 8, 8, '2023-10-26 07:56:38', '2023-10-26 23:11:04'),
(3, 'lorem ipsume doller sit amet kkk ppp', 'hello i am just testing how its going.', '1698380577.jpg', 9, 1, '2023-10-26 22:52:57', '2023-10-26 23:11:30'),
(4, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1698380749.jpg', 9, 6, '2023-10-26 22:55:49', '2023-10-26 23:11:49'),
(5, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1698380890.png', 9, 6, '2023-10-26 22:58:10', '2023-10-26 23:12:06'),
(6, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '1698380936.png', 9, 6, '2023-10-26 22:58:56', '2023-10-26 23:12:29'),
(9, 'Aenean sed lectus rhoncus, consequat libero in.', 'lobortis turpis. Aenean maximus ex erat, id venenatis sapien sodales ac. Phasellus arcu urna, efficitur non ligula in, fermentum tincidunt tellus. Nunc non nibh felis. Nam eget fermentum nulla. Integer in pulvinar tellus. In eu risus odio. Duis pulvinar suscipit dolor eu molestie. Pellentesque id velit viverra, fringilla augue id, tempor dolor. Vestibulum eget lorem id neque congue pulvinar. Integer sed dui massa. Duis facilisis, ligula et ullamcorper facilisis, risus arcu finibus quam, ac commodo ipsum massa eu augue.', '1698381807.jpg', 7, 7, '2023-10-26 23:04:51', '2023-10-26 23:13:27'),
(10, 'Mauris ut ligula gravida, efficitur risus placerat', 'congue lorem. Curabitur at elit egestas, bibendum tortor sit amet, facilisis dolor. Aliquam non suscipit nunc, at tincidunt eros. Sed at ultrices nisl. Quisque erat nulla, dapibus in congue eget, pellentesque vitae magna. Integer scelerisque pretium metus, eget mollis lacus rutrum nec. Mauris sed ultrices sapien. Aenean volutpat sollicitudin erat, ac sollicitudin dolor suscipit scelerisque. Nulla molestie magna ipsum. Nulla facilisi. Maecenas egestas nulla in neque porttitor, vel vestibulum nibh rhoncus. Vivamus vel ultrices lacus, non laoreet turpis.', '1698381855.png', 6, 7, '2023-10-26 23:05:33', '2023-10-26 23:14:15'),
(11, 'Ut fringilla lectus ante. Quisque finibus augue sit amet quam aliquam, ac feugiat eros venenatis', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc eget ullamcorper dolor, vel consequat metus. Sed blandit malesuada tellus, non vestibulum justo tincidunt sed. Praesent commodo pulvinar dui, eget feugiat nulla vehicula eget. Fusce finibus dolor ac neque sollicitudin, a maximus nulla accumsan. Maecenas consequat, justo vitae tempus ultricies, augue justo mollis eros, in convallis orci augue sed quam. Phasellus pellentesque ultrices turpis ac laoreet. Integer id auctor neque, id vulputate odio. Vestibulum convallis finibus eros, quis accumsan tellus malesuada sit amet. Aliquam vel tortor posuere, consectetur risus dictum, iaculis lorem', '1698381900.jpg', 6, 7, '2023-10-26 23:06:10', '2023-10-26 23:15:00'),
(12, 'Aenean volutpat sollicitudin erat, ac sollicitudin dolor suscipit scelerisque.', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc eget ullamcorper dolor, vel consequat metus. Sed blandit malesuada tellus, non vestibulum justo tincidunt sed. Praesent commodo pulvinar dui, eget feugiat nulla vehicula eget. Fusce finibus dolor ac neque sollicitudin, a maximus nulla accumsan. Maecenas consequat, justo vitae tempus ultricies, augue justo mollis eros, in convallis orci augue sed quam. Phasellus pellentesque ultrices turpis ac laoreet. Integer id auctor neque, id vulputate odio. Vestibulum convallis finibus eros, quis accumsan tellus malesuada sit amet. Aliquam vel tortor posuere, consectetur risus dictum, iaculis lorem', '1698384184.jpg', 8, 8, '2023-10-26 23:53:04', '2023-10-26 23:53:04'),
(13, 'fermentum tincidunt tellus. Nunc non nibh felis.', 'Aenean sed lectus rhoncus, consequat libero in, lobortis turpis. Aenean maximus ex erat, id venenatis sapien sodales ac. Phasellus arcu urna, efficitur non ligula in, fermentum tincidunt tellus. Nunc non nibh felis. Nam eget fermentum nulla. Integer in pulvinar tellus. In eu risus odio. Duis pulvinar suscipit dolor eu molestie. Pellentesque id velit viverra, fringilla augue id, tempor dolor. Vestibulum eget lorem id neque congue pulvinar. Integer sed dui massa. Duis facilisis, ligula et ullamcorper facilisis, risus arcu finibus quam, ac commodo ipsum massa eu augue.', '1698384236.jpg', 8, 8, '2023-10-26 23:53:41', '2023-10-26 23:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(80) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `post_under_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `uname`, `pword`, `role`, `post_under_user`, `created_at`, `updated_at`) VALUES
(1, 'manish', 'prajapati', 'manish@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2023-10-26 10:44:50', '2023-10-26 10:44:50'),
(2, 'sanjay', 'prajapati', 'sanjay@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 0, '2023-10-26 05:42:03', '2023-10-26 05:42:03'),
(5, 'sagar', 'singh', 'sagar@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2023-10-26 05:43:27', '2023-10-26 05:43:27'),
(6, 'vyom', 'patel', 'vyom@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 3, '2023-10-26 05:43:54', '2023-10-26 05:44:36'),
(7, 'dhruv', 'patel', 'dhruv@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 3, '2023-10-26 05:56:04', '2023-10-26 05:56:04'),
(8, 'ajay', 'patel', 'ajay@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 3, '2023-10-26 05:56:28', '2023-10-26 05:56:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_cname_unique` (`cname`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `posts_pcat_foreign` (`pcat`),
  ADD KEY `posts_pauthor_foreign` (`pauthor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_pauthor_foreign` FOREIGN KEY (`pauthor`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `posts_pcat_foreign` FOREIGN KEY (`pcat`) REFERENCES `category` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
