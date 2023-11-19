-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2022 lúc 08:23 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerceshoe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brands_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brands_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_name`, `category`, `created_at`, `updated_at`) VALUES
('T001', 'Addias', 'D001', '2022-10-27 21:02:33', '2022-10-27 21:02:33'),
('T002', 'Nike', 'D001', '2022-10-27 21:15:38', '2022-10-27 21:15:38'),
('T003', 'Zara', 'D004', '2022-10-27 21:16:06', '2022-10-27 21:16:06'),
('T004', 'Mango', 'D004', '2022-10-27 21:16:16', '2022-10-27 21:16:16'),
('T005', 'Louis Vuitton', 'D003', '2022-10-27 21:16:47', '2022-10-27 21:16:47'),
('T006', 'Gucci', 'D003', '2022-10-27 21:17:42', '2022-10-27 21:17:42'),
('T007', 'Zocker', 'D002', '2022-10-27 21:18:58', '2022-10-27 21:18:58'),
('T008', 'Jogabola', 'D002', '2022-10-27 21:19:41', '2022-10-27 21:19:41'),
('T009', 'Erosska', 'D005', '2022-10-27 21:21:44', '2022-10-27 21:21:44'),
('T010', 'Vascara', 'D005', '2022-10-27 21:21:58', '2022-10-27 21:21:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `price`, `quantity`, `image`, `Product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0333490341', 'Thành phố Hồ Chí Minh', 'DARUMO 9M', '1299000', '1', 'BB70661667053314.jpg', 'BB7066', '1', '2022-11-11 10:04:06', '2022-11-11 10:04:06'),
(2, 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0333490341', 'Thành phố Hồ Chí Minh', 'AIR FORCE 1', '6398000', '2', 'CW22881667053698.jpg', 'CW2288', '1', '2022-11-11 10:04:11', '2022-11-11 10:04:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`catagory_id`, `catagory_name`, `catagory_des`, `created_at`, `updated_at`) VALUES
('D001', 'Giày thể thao', 'Giày chuyên dụng cho thể thao', '2022-10-27 20:47:54', '2022-10-27 20:47:54'),
('D002', 'Giày Sneaker', 'Các đôi giày thể thao nhưng theo khuynh hướng năng động hơn.', '2022-10-27 20:50:30', '2022-10-27 20:50:30'),
('D003', 'Giày cao gót', 'Những mẫu giày có gót cao', '2022-10-27 20:51:00', '2022-10-27 20:51:00'),
('D004', 'Giày búp bê', 'Những đôi giày thiết kế đẹp', '2022-10-27 20:51:32', '2022-10-27 20:51:32'),
('D005', 'Giày sandal', 'Giày sandal là một loại giày được không chỉ các bạn trẻ mà cả những người lớn tuổi ưa thích. Đây là một loại giày có cấu trúc mở', '2022-10-27 20:53:30', '2022-10-27 20:53:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(126, '2014_10_12_000000_create_users_table', 1),
(127, '2014_10_12_100000_create_password_resets_table', 1),
(128, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(129, '2019_08_19_000000_create_failed_jobs_table', 1),
(130, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(131, '2022_10_26_185151_create_sessions_table', 1),
(132, '2022_10_27_100853_create_categories_table', 1),
(133, '2022_10_28_133540_create_products_table', 1),
(134, '2022_10_29_071958_create_brands_table', 1),
(135, '2022_10_29_185708_create_carts_table', 1),
(136, '2022_11_02_073633_create_orders_table', 1),
(137, '2022_11_03_174423_create_notifications_table', 1),
(138, '2022_11_03_193542_create_comments_table', 1),
(139, '2022_11_03_193629_create_replies_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, '7HP1GD', 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0333490341', 'Thành phố Hồ Chí Minh', '1', 'DARUMO 9M', '1', '1299000', 'BB70661667053314.jpg', 'BB7066', 'Thanh toán COD', 'Chuyển tới kho', '2022-11-10 08:44:56', '2022-11-10 08:59:04'),
(2, '7HP1GD', 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0333490341', 'Thành phố Hồ Chí Minh', '1', 'AIR FORCE 1', '1', '3199000', 'CW22881667053698.jpg', 'CW2288', 'Thanh toán COD', 'Chuyển tới kho', '2022-11-10 08:44:56', '2022-11-10 12:33:38'),
(3, '9VHCZ1', 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0333490341', 'Thành phố Hồ Chí Minh', '1', 'DARUMO 9M', '1', '1299000', 'BB70661667053314.jpg', 'BB7066', 'Thanh toán COD', 'Đợi xử lý', '2022-11-10 12:30:41', '2022-11-10 12:30:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `image`, `category`, `brand`, `category_name`, `brand_name`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
('BB7066', 'DARUMO 9M', 'DARUMO 9M', 'BB70661667053314.jpg', 'D002', 'T001', 'Giày Sneaker', 'Addias', '99', '1600000', '1299000', '2022-10-28 03:21:54', '2022-11-10 08:59:04'),
('CW2288', 'AIR FORCE 1', 'AIR FORCE 1', 'CW22881667053698.jpg', 'D002', 'T002', 'Giày Sneaker', 'Nike', '0', '3300000', '3199000', '2022-10-28 03:28:18', '2022-11-10 12:33:38'),
('DA7758100', 'PG 5', 'PG 5', 'DA77581001667053547.jpeg', 'D002', 'T002', 'Giày Sneaker', 'Nike', '100', '3200000', '2990000', '2022-10-28 03:25:47', '2022-10-28 03:25:47'),
('DH5425-002', 'Nike ZoomX Invincible Run Flyknit 2', 'Men\'s Road Running Shoes', 'DH5425-0021667052821.jpg', 'D002', 'T002', 'Giày Sneaker', 'Nike', '100', '4500000', '3990000', '2022-10-28 03:13:41', '2022-10-28 03:13:41'),
('DM1182-991', 'Nike Air Max 95 By You', 'Celebrate workwear’s wide appeal with a new take on the Nike Air Max 95 By You', 'DM1182-9911667052912.jpg', 'D002', 'T002', 'Giày Sneaker', 'Nike', '100', '4790000', '4590000', '2022-10-28 03:15:12', '2022-10-28 03:15:12'),
('FY7756', 'FORUM LOW BLUE', 'FORUM LOW BLUE', 'FY77561667053191.jpg', 'D002', 'T001', 'Giày Sneaker', 'Addias', '100', '2900000', '2900000', '2022-10-28 03:19:51', '2022-10-28 03:19:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tJlTiy5z1qyOVsXbyAkGs9bJUmE98rm5c22UMzh1', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXdjUjR6ZDUwc0ZsNXVZWkJUMWdnSjZrS3BjSnJ5MHFYNnhMOVVDcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1668186850);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh Lê Nhất Nghĩa', 'namtrinh548@gmail.com', '0', '0333490341', 'Thành phố Hồ Chí Minh', '2022-11-02 06:20:09', '$2y$10$8FROuXTYZu0nYjucR2jOFOwNW7knAnIruZV4SrZt0sdlMOmPMFCdG', NULL, NULL, NULL, 'lsuJzIFOjviTBBJn6MUdxSIwdntmkDFfNOLjbjmPu1wySEivYp8GYMOH8CXi', NULL, NULL, '2022-10-27 20:31:02', '2022-11-10 01:37:25'),
(2, 'admin', 'nhatnghiatyper@gmail.com', '1', '0394281210', 'Hà Nội', '2022-11-02 06:15:51', '$2y$10$eINBmqFLu/8WHbSsQhUv7ukC2DkaQQ8QRTfxmRhjGlHLU0RiaO/Mi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-27 20:31:31', '2022-11-02 06:15:51'),
(3, 'Nghia', 'haoduongcd@gmail.com', '0', '0394281211', 'Hà Nội', '2022-11-02 09:28:58', '$2y$10$mdPNDin4kv6d4NttL0zgyulAYUcAuAWO9Q7UIrK0LkNYkSyqokRqC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 06:04:53', '2022-11-02 09:28:58'),
(4, 'Huynh', 'tvu254303@gmail.com', '0', '0394281210', 'Tp HCM', NULL, '$2y$10$oUtBkAF9AmhZxcJKlYbCfeYSd80oZTrcT5KM83VYgQGEHyi7xb1zi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-10 12:55:13', '2022-11-10 12:55:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD UNIQUE KEY `brands_brands_id_unique` (`brands_id`),
  ADD UNIQUE KEY `brands_brands_name_unique` (`brands_name`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `categories_catagory_id_unique` (`catagory_id`),
  ADD UNIQUE KEY `categories_catagory_name_unique` (`catagory_name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
