-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 21, 2020 lúc 04:15 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user`, `price`, `product`, `qty`, `created_at`) VALUES
(195, 21, '1000', 14, 1, '2020-12-20 01:24:16'),
(196, 21, '1000', 20, 1, '2020-12-20 01:24:17'),
(200, 18, '1000', 20, 4, '2020-12-20 15:04:01'),
(201, 18, '1000', 14, 1, '2020-12-20 15:04:02'),
(202, 18, '16000000', 22, 9, '2020-12-20 17:06:54'),
(203, 18, '43990000', 23, 1, '2020-12-21 02:17:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_user` int(11) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_user`, `description`, `active`, `created_at`) VALUES
(11, 'Laptop', 18, '123456', 1, '2020-12-03 09:32:40'),
(12, 'Phone', 18, 'Điện thoại thông minh', 1, '2020-12-20 16:50:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `c_order`
--

CREATE TABLE `c_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `c_order`
--

INSERT INTO `c_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`) VALUES
(3, 18, 4, 3, '2000', 0, '2020-12-20 14:47:07'),
(4, 18, 5, 4, '2000', 0, '2020-12-20 14:48:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `c_order_details`
--

CREATE TABLE `c_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallary`
--

CREATE TABLE `gallary` (
  `gallary_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `man_id` int(11) NOT NULL,
  `man_name` varchar(255) NOT NULL,
  `man_user` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`man_id`, `man_name`, `man_user`, `active`, `description`, `created_at`) VALUES
(4, 'Samsung', 18, 1, '123456', '2020-12-03 09:39:58'),
(5, 'Apple', 18, 1, '123456', '2020-12-03 09:40:09'),
(6, 'Dell', 18, 1, 'Nhà sản xuất', '2020-12-21 02:52:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` tinyint(2) NOT NULL DEFAULT 0,
  `payment_shipping` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`Payment_id`, `payment_method`, `payment_status`, `payment_shipping`, `created_at`) VALUES
(1, 'cash', 0, 2, '2019-04-28 11:33:30'),
(2, 'cash', 0, 3, '2019-05-18 08:22:07'),
(3, 'Thanh toan khi nhan hang', 0, 4, '2020-12-20 14:47:07'),
(4, 'Thanh toan khi nhan hang', 0, 5, '2020-12-20 14:48:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cat` int(11) NOT NULL,
  `man` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `cat`, `man`, `user`, `active`, `image`, `color`, `size`, `price`, `created_at`) VALUES
(23, 'Iphone 12 Pro Max', 'Màn hình:	OLED, 6.7\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	3 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	512 GB', 12, 5, 18, 1, 'iphone-12-pro-max-vang-new-600x600-600x6001608483991.jpg', 'Vàng đồng, Xanh Dương, Xám', ' 6.7\"', 43990000, '2020-12-20 17:06:31'),
(24, 'Iphone 12', 'Màn hình:	OLED, 6.1\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	128 GB', 12, 5, 18, 1, 'iphone-12-trang-new-600x600-600x6001608517319.jpg', 'Trắng  Xanh Dương  Đỏ  Đen', ' 6.1\"', 26990000, '2020-12-21 02:21:59'),
(25, 'iPhone 12 Pro ', 'Màn hình:	OLED, 6.1\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	3 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB', 12, 5, 18, 1, 'iphone-12-pro-xanh-duong-new-600x600-600x6001608517439.jpg', 'Xanh Dương  Xám', '6.1\"', 30990000, '2020-12-21 02:23:59'),
(26, 'Iphone 12 mini', 'Màn hình:	OLED, 5.4\", Super Retina XDR\r\nHệ điều hành:	iOS 14\r\nCamera sau:	2 camera 12 MP\r\nCamera trước:	12 MP\r\nCPU:	Apple A14 Bionic 6 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	256 GB', 12, 5, 18, 1, 'iphone-23-mini-den-new-600x600-600x6001608517790.jpg', 'Đen  Trắng  Đỏ  Xanh Dương  Xanh lá', '5.4\"', 25, '2020-12-21 02:29:50'),
(27, 'Samsung Galaxy Note 20 Ultra', 'Màn hình:	Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB', 12, 4, 18, 1, 'samsung-galaxy-note-20-ultra-vangdong-600x600-600x6001608517943.jpg', 'Vàng đồng Đen Trắng', '6.9\"', 27990000, '2020-12-21 02:32:23'),
(28, 'Samsung Galaxy Note 20 Ultra 5G', 'Màn hình:	Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	12 GB\r\nBộ nhớ trong:	256 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB', 12, 4, 18, 1, 'samsunggalaxynote20ultratrangnew-600x600-600x6001608518039.jpg', 'Trắng', '6.9\"', 30990000, '2020-12-21 02:33:59'),
(29, ' Samsung Galaxy Note 20', 'Màn hình:	Super AMOLED Plus, 6.7\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 12 MP & Phụ 64 MP, 12 MP\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB', 12, 4, 18, 1, 'samsung-galaxy-note-20-062220-122200-fix-600x6001608518234.jpg', 'Xám Xanh lá', '6.7\"', 21990000, '2020-12-21 02:37:14'),
(30, 'Samsung Galaxy S20+', 'Màn hình:	Dynamic AMOLED 2X, 6.7\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 12 MP & Phụ 64 MP, 12 MP, TOF 3D\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB', 12, 4, 18, 1, 'samsung-galaxy-s20-plus-xanh-600x600-600x6001608518334.jpg', 'Xanh Dương  Xám', ' 6.7\"', 23990000, '2020-12-21 02:38:54'),
(31, 'Samsung Galaxy S20', 'Màn hình:	Dynamic AMOLED 2X, 6.2\", Quad HD+ (2K+)\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 12 MP & Phụ 64 MP, 12 MP\r\nCamera trước:	10 MP\r\nCPU:	Exynos 990 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 1 TB', 12, 4, 18, 1, 'samsung-galaxy-s20-plus-xanh-600x600-600x6001608518459.jpg', 'Hồng', '6.2\"', 21490000, '2020-12-21 02:40:59'),
(33, 'Apple MacBook Pro Touch 2020', 'CPU:	Intel Core i5 Thế hệ 8, Hãng không công bố, 1.40 GHz\r\nRAM:	8 GB, LPDDR3 (On board), 2133 MHz\r\nỔ cứng:	SSD: 256 GB\r\nMàn hình:	13.3 inch, Retina (2560 x 1600)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Plus Graphics 645\r\nCổng kết nối:	2 x Thunderbolt 3 (USB-C)\r\nHệ điều hành:	Mac OS\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 15.6 mm, 1.4 kg\r\nThời điểm ra mắt:	2020', 11, 5, 18, 1, 'macbook-pro-touch-2020-i5-14ghz-8gb-256gb-mxk32sa-600x6001608518993.jpg', 'Xám', '13.3\"', 34990000, '2020-12-21 02:49:53'),
(34, 'Apple MacBook Air 2020', 'CPU:	Intel Core i3 Thế hệ 10, 1.10 GHz\r\nRAM:	8 GB, LPDDR4X (On board), 3733 MHz\r\nỔ cứng:	SSD: 256 GB\r\nMàn hình:	13.3 inch, Retina (2560 x 1600)\r\nCard màn hình:	Card đồ họa tích hợp, Intel Iris Plus Graphics\r\nCổng kết nối:	2 x Thunderbolt 3 (USB-C)\r\nHệ điều hành:	Mac OS\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 4.1 mm đến 16.1 mm, 1.29 kg\r\nThời điểm ra mắt:	2020', 11, 5, 18, 1, 'apple-macbook-air-2020-i3-11ghz-8gb-256gb-mwtj2sa-600x6001608519083.jpg', 'Xám', '13.3\"', 28990000, '2020-12-21 02:51:23'),
(35, 'Dell Inspiron 5593 i5', 'CPU:	Intel Core i5 Ice Lake, 1035G1, 1.00 GHz\r\nRAM:	8 GB, DDR4 (2 khe), 2666 MHz\r\nỔ cứng:	SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa rời, NVIDIA GeForce MX230 2GB\r\nCổng kết nối:	2 x USB 3.1, HDMI, LAN (RJ45), USB 2.0, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.90 mm, 2.05 kg\r\nThời điểm ra mắt:	2019', 11, 6, 18, 1, 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-213570-600x6001608519231.jpg', 'Bạc', '15.6\"', 17990000, '2020-12-21 02:53:51'),
(36, 'Dell Inspiron 5594 i5 ', 'CPU:	Intel Core i5 Ice Lake, 1035G1, 1.00 GHz\r\nRAM:	8 GB, DDR4 (On board +1 khe), 2666 MHz\r\nỔ cứng:	SSD 512 GB M.2 PCIe\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel UHD Graphics\r\nCổng kết nối:	2 x USB 3.1, HDMI, LAN (RJ45), USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 19.9 mm, 1.83 kg\r\nThời điểm ra mắt:	2019', 11, 6, 18, 1, 'dell-inspiron-5593-i5-7wgnv1-213535-600x6001608519491.jpg', 'Bạc', '15.6\"', 17990000, '2020-12-21 02:58:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `full_name`, `email`, `mobile`, `address`, `city`, `created_at`) VALUES
(1, 'ibrahim elgadid', 'ibrahimelgadid30@gmail.com', '00102 487 6339', 'elsalam', 'kafr sqr', '2019-04-28 11:19:46'),
(2, 'ibrahim elgadid', 'ibrahimelgadid30@gmail.com', '00102 487 6339', 'elsalam', 'kafr sqr', '2019-04-28 11:33:30'),
(3, 'ibrahim elgadid', 'will123@gmail.com', '01024876339', 'elsalam', 'ÙƒÙØ± ØµÙ‚Ø±', '2019-05-18 08:22:06'),
(4, 'nguyen kien', 'kien@gmail.com', '0369771213', 'phu xuyen', 'hà noi', '2020-12-20 14:47:07'),
(5, 'nguyen kien', 'kien@gmail.com', '0369771213', 'phu xuyen', 'hà noi', '2020-12-20 14:48:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `vkey` varchar(255) NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `image`, `active`, `vkey`, `token_expire`, `verified`, `admin`, `created_at`) VALUES
(18, 'kien nguyen', 'tranbaolong2214@gmail.com', '$2y$10$MqaTywTgUnZow1Q4dMa2veJ6JmvPZ7HChT/6FCuIB1YzhMgEM9SD2', 'samsung galaxy s815602462391606441560.jpg', 1, '37eb433c9b9ba4c2f2e4332672fa19d2', '2020-11-27 01:46:00', 1, 1, '2020-11-25 13:51:00'),
(21, 'nguyen dinh kien', 'nguyendinhkien12344321@gmail.com', '$2y$10$OCzX0RkkYxU96zCxQQ5Af.jb/.0dqX3KeBb85pGXVm9MKINr2vNNO', '0315602460331608027275.png', 1, 'iH59GK', '2020-12-19 17:18:59', 1, 0, '2020-12-12 01:43:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_user` (`cat_user`);

--
-- Chỉ mục cho bảng `c_order`
--
ALTER TABLE `c_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `o_shipping` (`shipping_id`),
  ADD KEY `o_payment` (`payment_id`),
  ADD KEY `o_user` (`customer_id`);

--
-- Chỉ mục cho bảng `c_order_details`
--
ALTER TABLE `c_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_order` (`order_id`),
  ADD KEY `d_product` (`product_id`);

--
-- Chỉ mục cho bảng `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`gallary_id`),
  ADD KEY `g_pro` (`product_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`man_id`),
  ADD KEY `man_user` (`man_user`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `pay_shipping` (`payment_shipping`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `p_user` (`user`),
  ADD KEY `p_man` (`man`),
  ADD KEY `p_cat` (`cat`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `c_order`
--
ALTER TABLE `c_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `c_order_details`
--
ALTER TABLE `c_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `gallary`
--
ALTER TABLE `gallary`
  MODIFY `gallary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `man_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `cat_user` FOREIGN KEY (`cat_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `c_order`
--
ALTER TABLE `c_order`
  ADD CONSTRAINT `o_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`Payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `o_shipping` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`shipping_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `o_user` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `c_order_details`
--
ALTER TABLE `c_order_details`
  ADD CONSTRAINT `d_order` FOREIGN KEY (`order_id`) REFERENCES `c_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gallary`
--
ALTER TABLE `gallary`
  ADD CONSTRAINT `g_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD CONSTRAINT `man_user` FOREIGN KEY (`man_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `pay_shipping` FOREIGN KEY (`payment_shipping`) REFERENCES `shipping` (`shipping_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `p_cat` FOREIGN KEY (`cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_man` FOREIGN KEY (`man`) REFERENCES `manufactures` (`man_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_user` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
