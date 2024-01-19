-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2023 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ticketweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(255) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`discount_id`, `ticket_id`, `discount`, `start_date`, `end_date`) VALUES
(4, '13', 1, '2023-12-01', '2023-12-10'),
(5, '11', 99, '2023-11-28', '2023-12-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location`
--

CREATE TABLE `location` (
  `location_id` int(255) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `country`, `city`, `image`) VALUES
(6, 'Sân Vận Động Mỹ Đình', 'Việt Nam', 'Hà Nội', 'svdmd.jpg'),
(7, 'Nhà Hát Lớn Hà Nội', 'Việt Nam', 'Hà Nội', 'nhlhn.jpg'),
(12, 'EDC Las Vegas', 'America', 'Las Vegas', 'EDC6.jpg'),
(13, 'Nhà Hát Opera Sydney', 'Australia', 'Sydney', 'opera-sydney.jpg'),
(14, 'Disneyland', 'Japan', 'Tokyo', '1194935.jpg'),
(15, 'KINTEX', 'South Korea', 'Seoul', 'kintex.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `total` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Đang Xử Lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `create_date`, `total`, `user_id`, `status`) VALUES
('thuan261020232', '2023-10-26', 300000, 'thuan226102023', 'Thành Công'),
('thuan261020233', '2023-10-26', 100200000, 'thuan326102023', 'Đang Xử Lý'),
('thuan261020234', '2023-10-26', 100000, 'thuan426102023', 'Đang Xử Lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` varchar(255) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `ticket_id`, `quantity`, `price`) VALUES
('1', '1', 1, 1),
('thuan261020230', '1', 1, 100000),
('thuan261020231', '1', 2, 100000),
('thuan261020232', '1', 3, 100000),
('thuan261020233', '1', 2, 100000),
('thuan261020233', '4', 1, 100000000),
('thuan261020234', '1', 1, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(255) NOT NULL,
  `ticket_code` varchar(255) NOT NULL,
  `location_id` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Còn Vé',
  `quantity` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_code`, `location_id`, `start_date`, `price`, `status`, `quantity`, `type`, `image`) VALUES
(9, 'AGF 2023', 'KINTEX', '2023-12-31', 672800, 'Còn Vé', 36, 'Triển Lãm', 'seoul.png'),
(10, 'Việt Nam vs Iran', 'Sân Vận Động Mỹ Đình', '2023-12-11', 84000, 'Còn Vé', 999, 'Thể Thao', '16x9.jpg'),
(11, 'Magic Mike', 'EDC Las Vegas', '2024-01-24', 25000000, 'Còn Vé', 754, 'Hòa Nhạc', 'magic-mike.webp'),
(12, 'The Nun 3', 'Nhà Hát Lớn Hà Nội', '2024-12-02', 96000, 'Còn Vé', 666, 'Rạp', 'the-nun_top.jpg'),
(13, 'Connect The World', 'EDC Las Vegas', '2024-01-24', 360000, 'Còn Vé', 23, 'Hòa Nhạc', 'FrflcnuaQAEqDqn.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'thuan123', 'manhthuan113@gmail.com', '123'),
(3, 'thuan69', 'thuan69', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
