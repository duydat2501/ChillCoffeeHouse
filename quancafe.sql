-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 29, 2024 lúc 09:27 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quancafe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cases`
--

CREATE TABLE `cases` (
  `casebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cases`
--

INSERT INTO `cases` (`casebook`, `name`) VALUES
('coffee', 'Coffee'),
('monannhe', 'Món Ăn Nhẹ'),
('thucuongkhac', 'Thức Uống Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounting`
--

CREATE TABLE `discounting` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `time_start` date NOT NULL,
  `time_end` date NOT NULL,
  `percent` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `discounting`
--

INSERT INTO `discounting` (`id`, `title`, `time_start`, `time_end`, `percent`) VALUES
(1, 'Khai trương', '2024-01-29', '2024-02-04', 30),
(2, 'Khai trương shop', '2024-02-11', '2024-02-25', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `informationorder`
--

CREATE TABLE `informationorder` (
  `idPackage` int(255) UNSIGNED NOT NULL,
  `idProduct` int(255) UNSIGNED NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `informationorder`
--

INSERT INTO `informationorder` (`idPackage`, `idProduct`, `qty`, `price`) VALUES
(1, 32, 1, 25000),
(2, 31, 2, 30000),
(2, 32, 1, 25000),
(3, 54, 1, 32000),
(3, 2, 1, 25000),
(3, 6, 1, 35000),
(3, 55, 1, 5000),
(3, 43, 1, 10000),
(4, 1, 1, 20000),
(4, 2, 1, 25000),
(4, 3, 1, 15000),
(4, 5, 1, 40000),
(4, 11, 1, 12000),
(4, 9, 1, 50000),
(5, 55, 1, 5000),
(5, 56, 1, 45000),
(5, 54, 1, 32000),
(6, 3, 1, 15000),
(6, 26, 1, 23000),
(6, 30, 1, 17000),
(6, 1, 1, 20000),
(7, 55, 1, 5000),
(8, 47, 1, 28000),
(8, 55, 2, 5000),
(8, 4, 1, 10000);

--
-- Bẫy `informationorder`
--
DELIMITER $$
CREATE TRIGGER `Them_Don_Hang` AFTER INSERT ON `informationorder` FOR EACH ROW UPDATE products
SET amount = amount - New.qty
WHERE products.id = NEW.idProduct
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `informationorder_discounting`
--

CREATE TABLE `informationorder_discounting` (
  `id` int(255) UNSIGNED NOT NULL,
  `idOrder` int(255) UNSIGNED NOT NULL,
  `idDiscounting` int(255) UNSIGNED NOT NULL,
  `idProduct` int(255) UNSIGNED NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `informationorder_discounting`
--

INSERT INTO `informationorder_discounting` (`id`, `idOrder`, `idDiscounting`, `idProduct`, `price`, `qty`) VALUES
(1, 5, 2, 55, 30, 1),
(2, 8, 2, 4, 30, 2);

--
-- Bẫy `informationorder_discounting`
--
DELIMITER $$
CREATE TRIGGER `Them_Don_Hang_Giam_Gia` AFTER INSERT ON `informationorder_discounting` FOR EACH ROW UPDATE products
SET amount = amount - New.qty
WHERE products.id = NEW.idProduct
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(255) UNSIGNED NOT NULL,
  `idUser` int(255) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(255) NOT NULL,
  `delivery` int(10) NOT NULL,
  `total_discounting` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `datetime`, `total`, `delivery`, `total_discounting`) VALUES
(1, 1, '2024-02-25 22:15:41', 25000, 1, 0),
(2, 1, '2024-02-25 00:53:02', 85000, 1, 0),
(3, 2, '2024-02-25 00:59:39', 107000, 0, 0),
(4, 1, '2024-02-25 02:00:53', 162000, 0, 0),
(5, 1, '2024-02-25 02:04:39', 82000, 0, 0),
(6, 1, '2024-02-25 02:11:01', 75000, 0, 0),
(7, 1, '2024-02-25 02:16:42', 5000, 0, 0),
(8, 1, '2024-02-25 02:25:27', 48000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `casebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `price` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `love` int(255) NOT NULL,
  `count_buying` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `img`, `title`, `summary`, `casebook`, `price`, `amount`, `love`, `count_buying`) VALUES
(1, 'img/product/AilenCoffee.jpeg', 'Alien Coffee', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 20000, 98, 20, 30),
(2, 'img/product/americano1.jpeg', 'Americano', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 25000, 173, 40, 45),
(3, 'img/product/bac_xiu2.jpg', 'Bạc xỉu', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 15000, 97, 55, 60),
(4, 'img/product/banh_mi_cafe1.jpeg', 'Bánh Mì Coffee', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 10000, 197, 77, 80),
(5, 'img/product/cafe cam1.jpeg', 'Coffee Cam', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 40000, 49, 10, 20),
(6, 'img/product/cafe cốt dừa2.jpeg', 'Cafe Cốt Dừa', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 35000, 29, 5, 25),
(7, 'img/product/cafe đen nóng1.jpeg', 'Cafe đen nóng', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 20000, 300, 200, 250),
(8, 'img/product/cafe kiểu ailen.jpeg', 'Cafe kiểu Ailen', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 30000, 250, 100, 150),
(9, 'img/product/cafe mocha1.jpeg', 'Cafe Mocha', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 50000, 99, 30, 20),
(10, 'img/product/cafe nâu sữa lắc1.jpg', 'Cafe Nâu Sửa Lắc', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 32000, 40, 30, 10),
(11, 'img/product/cafe pha phin1.png', 'Cafe pha phin', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 12000, 399, 350, 300),
(12, 'img/product/cafe sữa đá1.jpeg\r\n', 'Cafe sữa đá', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 15000, 500, 400, 450),
(13, 'img/product/cafe trứng1.jpeg', 'Cafe Trứng', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 30000, 222, 111, 123),
(14, 'img/product/cafe-chồn-1.jpg', 'Cafe Chồn', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 70000, 100, 77, 88),
(15, 'img/product/caffe-ristretto1.jpg', 'Cafe Ristretto', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 60000, 88, 77, 80),
(16, 'img/product/capuchino1.jpg', 'Capuchino', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 50000, 99, 77, 88),
(17, 'img/product/download (8)1.jpeg', 'Cafe Sữa', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 23000, 123, 78, 100),
(18, 'img/product/esp1.jpeg', 'Cafe Esp', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 33000, 122, 66, 77),
(19, 'img/product/espresso con panna1.jpeg', 'Cafe espresso con panna', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 55000, 56, 33, 44),
(20, 'img/product/espresso1.jpeg', 'Cafe espresso', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 44000, 56, 34, 45),
(21, 'img/product/fappuccino coffee1.jpeg', 'Cafe fappuccino coffee', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 35000, 67, 45, 56),
(22, 'img/product/Irish-Coffee1.jpg', 'Irish Coffee', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 44000, 89, 56, 67),
(23, 'img/product/latte machiato1.jpeg', 'Latte Machiato', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 43000, 78, 45, 67),
(24, 'img/product/latte1.jpg', 'Cafe latte', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 34000, 100, 78, 98),
(25, 'img/product/LatteMachiato1.jpeg', 'Latte Machiato', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 44000, 56, 34, 45),
(26, 'img/product/ly-ca-phe-bac-xiu-da1.jpg', 'Cafe Bạc Xỉu Đá', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 23000, 44, 23, 34),
(27, 'img/product/machiato1.jpeg', 'Cafe Machiato', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 55000, 230, 123, 213),
(28, 'img/product/mocha1.jpeg', 'Mocha', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 37000, 87, 43, 65),
(29, 'img/product/sữa lắc cafe1.jpeg', 'Cafe Sữa Lắc', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 19000, 98, 65, 87),
(30, 'img/product/xbac-xiu1.png', 'Bạc Xĩu', 'cafe giúp tỉnh táo mỗi buổi sáng', 'coffee', 17000, 42, 21, 34),
(31, 'img/product/black tea macchiato1.jpeg', 'black tea macchiato', 'Nước giải khác tuyệt vời', 'thucuongkhac', 30000, 98, 65, 78),
(32, 'img/product/nước ép dưa hấu1.jpeg', 'Nước ép dưa hấu', 'Nước giải khác tuyệt vời', 'thucuongkhac', 25000, 88, 56, 78),
(33, 'img/product/nuocepdua1.jpeg', 'Nước ép Dứa', 'Nước giải khác tuyệt vời', 'thucuongkhac', 28000, 90, 78, 85),
(34, 'img/product/sinh tố bơ1.jpeg', 'Sinh tố bơ', 'Nước giải khác tuyệt vời', 'thucuongkhac', 35000, 150, 123, 145),
(35, 'img/product/sinh tố xoài1.jpeg', 'Sinh tố Xoài', 'Nước giải khác tuyệt vời', 'thucuongkhac', 36000, 160, 98, 123),
(36, 'img/product/soda blue sky1.jpeg', 'Soda Blue', 'Nước giải khác tuyệt vời', 'thucuongkhac', 15000, 50, 30, 40),
(37, 'img/product/soda cherry1.jpeg', 'Soda Cherry', 'Nước giải khác tuyệt vời', 'thucuongkhac', 28000, 333, 222, 111),
(38, 'img/product/trà đào1.jpeg', 'Trà Đào', 'Nước giải khác tuyệt vời', 'thucuongkhac', 25000, 321, 123, 231),
(39, 'img/product/trà hoa đậu biếc1.jpeg', 'Trà hoa đậu biếc', 'Nước giải khác tuyệt vời', 'thucuongkhac', 22000, 123, 99, 120),
(40, 'img/product/trà sữa matcha1.jpeg', 'Trà sữa matcha', 'Nước giải khác tuyệt vời', 'thucuongkhac', 40000, 150, 68, 100),
(41, 'img/product/trà sữa vị trân châu.jpeg', 'trà sữa vị trân châu', 'Nước giải khác tuyệt vời', 'thucuongkhac', 35000, 300, 123, 213),
(42, 'img/product/trà tắc1.jpeg', 'Trà tắc', 'Nước giải khác tuyệt vời', 'thucuongkhac', 10000, 145, 111, 122),
(43, 'img/product/trà vải1.jpeg', 'Trà Vải', 'Nước giải khác tuyệt vời', 'thucuongkhac', 10000, 332, 111, 222),
(44, 'img/product/cach-nau-che-do-den1.jpg', 'Chè đỏ đen', 'đồ ăn để lắp đầy bụng', 'monannhe', 20000, 40, 25, 30),
(45, 'img/product/chedauxanh1.jpg', 'Chè đậu xanh', 'đồ ăn để lắp đầy bụng', 'monannhe', 25000, 50, 25, 40),
(46, 'img/product/cheesecake coffee1.jpg', 'cheesecake coffee', 'đồ ăn để lắp đầy bụng', 'monannhe', 35000, 100, 70, 80),
(47, 'img/product/chehatsen1.jpg', 'Chè Hạt Sen', 'đồ ăn để lắp đầy bụng', 'monannhe', 28000, 69, 50, 66),
(48, 'img/product/chehoacau1.jpg', 'Chè Hoa Cầu', 'đồ ăn để lắp đầy bụng', 'monannhe', 30000, 66, 44, 55),
(49, 'img/product/chehoadaubiec1.jpg', 'Chè hoa đậu biếc', 'đồ ăn để lắp đầy bụng', 'monannhe', 23000, 77, 44, 55),
(50, 'img/product/che-thap-cam-mien-trung1.jpg', 'Chè thập cẩm', 'đồ ăn để lắp đầy bụng', 'monannhe', 30000, 90, 45, 78),
(51, 'img/product/coffee cupcakes1.jpeg', 'coffee cupcakes', 'đồ ăn để lắp đầy bụng', 'monannhe', 45000, 66, 33, 44),
(52, 'img/product/kem vani1.jpeg', 'kem vani', 'đồ ăn để lắp đầy bụng', 'monannhe', 20000, 321, 123, 231),
(53, 'img/product/pudding cafe1.jpeg', 'pudding cafe', 'đồ ăn để lắp đầy bụng', 'monannhe', 17000, 88, 44, 77),
(54, 'img/product/tao-pho-caphe1.jpg', 'tào phớ caphe', 'đồ ăn để lắp đầy bụng', 'monannhe', 32000, 76, 34, 56),
(55, 'img/product/thạch cafe1.jpg', 'Thạch cafe', 'đồ ăn để lắp đầy bụng', 'monannhe', 5000, 394, 345, 456),
(56, 'img/product/tiramisu cafe1.jpeg', 'tiramisu cafe', 'đồ ăn để lắp đầy bụng', 'monannhe', 45000, 320, 123, 234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_discounting`
--

CREATE TABLE `products_discounting` (
  `id` int(100) UNSIGNED NOT NULL,
  `idProduct` int(255) UNSIGNED NOT NULL,
  `idDiscounting` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products_discounting`
--

INSERT INTO `products_discounting` (`id`, `idProduct`, `idDiscounting`) VALUES
(1, 3, 1),
(2, 1, 2),
(3, 44, 2),
(4, 29, 2),
(5, 4, 2),
(6, 47, 2),
(7, 55, 2),
(8, 1, 1),
(9, 2, 1),
(10, 4, 1),
(11, 5, 1),
(12, 6, 1),
(13, 23, 1),
(14, 24, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL DEFAULT ' img/user/defaultavata.jpg',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `img`, `username`, `password`, `firstname`, `lastname`, `email`, `dob`, `sex`, `address`, `phone_number`, `admin`) VALUES
(1, ' img/user/defaultavata.jpg', 'admin', 'admin', 'Duy', 'Đạt', 'dinhdat25012004@gmail.com', '25/01/2004', 1, 'Hóc Môn', '0325017900', 1),
(2, ' img/user/defaultavata.jpg', 'user', 'user', 'Gia', 'Minh', 'giaminh@gmail.com', '2004-09-09', 0, 'tp HCM', '0123456789', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`casebook`);

--
-- Chỉ mục cho bảng `discounting`
--
ALTER TABLE `discounting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `informationorder`
--
ALTER TABLE `informationorder`
  ADD KEY `informationorder_ibfk_2` (`idProduct`),
  ADD KEY `informationorder_ibfk_3` (`idPackage`);

--
-- Chỉ mục cho bảng `informationorder_discounting`
--
ALTER TABLE `informationorder_discounting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informationorder_discounting_ibfk_1` (`idDiscounting`),
  ADD KEY `informationorder_discounting_ibfk_3` (`idOrder`),
  ADD KEY `informationorder_discounting_ibfk_4` (`idProduct`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`idUser`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`casebook`);

--
-- Chỉ mục cho bảng `products_discounting`
--
ALTER TABLE `products_discounting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_discounting_ibfk_1` (`idProduct`),
  ADD KEY `products_discounting_ibfk_2` (`idDiscounting`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `discounting`
--
ALTER TABLE `discounting`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `informationorder_discounting`
--
ALTER TABLE `informationorder_discounting`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `products_discounting`
--
ALTER TABLE `products_discounting`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `informationorder`
--
ALTER TABLE `informationorder`
  ADD CONSTRAINT `informationorder_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informationorder_ibfk_3` FOREIGN KEY (`idPackage`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `informationorder_discounting`
--
ALTER TABLE `informationorder_discounting`
  ADD CONSTRAINT `informationorder_discounting_ibfk_1` FOREIGN KEY (`idDiscounting`) REFERENCES `discounting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informationorder_discounting_ibfk_3` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informationorder_discounting_ibfk_4` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`casebook`) REFERENCES `cases` (`casebook`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products_discounting`
--
ALTER TABLE `products_discounting`
  ADD CONSTRAINT `products_discounting_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_discounting_ibfk_2` FOREIGN KEY (`idDiscounting`) REFERENCES `discounting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
