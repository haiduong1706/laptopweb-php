-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2024 lúc 01:26 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptopstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(100) NOT NULL,
  `cart_payment` varchar(100) NOT NULL,
  `cart_shipping` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`, `cart_payment`, `cart_shipping`) VALUES
(52, 7, '1775', 0, '2024-11-27 19:49:31', 'tienmat', 5),
(53, 7, '8965', 0, '2024-11-27 21:11:50', 'tienmat', 5),
(54, 7, '4787', 0, '2024-11-27 21:13:39', 'chuyenkhoan', 5),
(55, 20, '834', 0, '2024-11-27 21:18:23', 'chuyenkhoan', 6),
(56, 7, '4534', 0, '2024-11-27 22:00:52', 'chuyenkhoan', 5),
(57, 7, '5469', 0, '2024-11-28 07:23:02', 'chuyenkhoan', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(61, '1775', 19, 3),
(62, '8965', 6, 1),
(63, '4787', 8, 3),
(64, '834', 6, 1),
(65, '4534', 8, 4),
(66, '4534', 9, 4),
(67, '5469', 8, 2),
(68, '5469', 9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(7, 'Lê Quang Hải Dương', 'haiiduong1706@gmail.com', 'Thái Bình', '123456', '0963545007'),
(18, 'Lê Quang Hải Dương', 'haiiduong1706@gmail.com', 'Bắc Từ Liêm', '123', '09222222222'),
(19, 'Lê Anh Minh', 'duongdeptroai1706@gmail.com', 'Trịnh Văn Bô, Nam Từ Liêm, Hà Nội', '1', '0123456789'),
(20, 'Lê Anh Minh', 'duongdeptroai1706@gmail.com', 'Trịnh Văn Bô, Nam Từ Liêm, Hà Nội', '123456', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(500) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Laptop', 1),
(2, 'PC, Màn Hình', 2),
(3, 'Phụ Kiện Máy Tính', 3),
(4, 'Linh Kiện PC, Laptop', 4),
(5, 'TV', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tomtat` varchar(500) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(6, 'Laptop Dell Inspiron 15 3520-5810BLK 102F0', 'DELL', '12990000', 10, '1731771149_laptop2.webp', 'New 100%', 'abc', 1, 1),
(7, 'Laptop Dell Latitude 3540 71038100', 'DELL', '16990000', 10, '1731771793_laptop3.webp', 'New 100%', 'abc', 1, 1),
(8, 'Apple MacBook Air M1 256GB 2020', 'MAC', '18290000', 10, '1731771899_laptop4.webp', 'New 100%', 'abc', 1, 1),
(9, 'Laptop ASUS Gaming VivoBook K3605ZF-RP634W', 'ASUS', '17390000', 10, '1731771983_laptop5.webp', 'New 99%', 'abc', 1, 1),
(10, 'MacBook Pro 14 M3 Pro 18GB - 1TB', 'MAC', '56990000', 10, '1731772086_laptop6.webp', 'New 100%', 'aa', 1, 1),
(11, 'Màn hình Gaming LG UltraGear OLED 45GR95QE-B 45 inch', 'LG', '30990000', 3, '1731772231_manhinh1.webp', 'New 100%', 'a', 1, 2),
(13, 'Màn hình MSI MP251 E2 25 inch 120Hz', 'MSI', '2390000', 5, '1731772330_manhinh1.webp', 'New 100%', 'q', 1, 2),
(14, 'Màn hình LG 27UP850N 27 inch', 'LG', '7690000', 6, '1731772830_manhinh3.webp', 'New 100%', 'w', 1, 2),
(15, 'Bàn Phím Cơ Gaming không dây Asus', 'ASUS', '300000', 5, '1731772937_banphim1.jpg', 'New 100%', 'q', 1, 3),
(16, 'Chuột Gaming không dây Asus ', 'ASUS', '1200000', 5, '1731773018_chuot1.jpg', 'New 100%', 'Q', 1, 3),
(17, 'Google Tivi Coocaa FHD 43 inch 43Z72', 'TV', '4900000', 5, '1731891854_tv1.webp', 'New 100%', 'a', 1, 5),
(18, 'Tivi Xiaomi A Pro 4K 55 inch QLED 2025', 'TV', '6000000', 10, '1731891932_tv2.webp', 'New 100%', 'e', 1, 5),
(19, 'Smart Tivi Samsung QLED 4K 55 inch 2024', 'TV', '8000000', 6, '1731891996_tv3.webp', 'New 100%', 'e', 1, 5),
(20, 'Mainboard ASUS TUF GAMING X870-PLUS', 'ASUS', '9500000', 10, '1731892160_linhkien3.jpg', 'New 100%', 'q', 1, 4),
(21, 'Card màn hình Asus DUAL-RTX 3060-O12G-V2', 'ASUS', '7790000', 10, '1731892224_linhkien1.jpg', 'New 100%', 'r', 1, 4),
(22, 'Card màn hình Asus DUAL-RTX 3050-O6G', 'ASUS', '6990000', 10, '1731892287_linhkien3.jpg', 'New 100%', 'a', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `id_dangky` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(5, 'haiduong', '03239239', 'an tân,thái thụy, thái binh', 'siêu tốc', 7),
(6, 'minh', '123', 'xóm 3 ,an tân, thái thụy, thái bình', 'nhanh', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(100) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(200) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(1, '2024-11-20', 10, '150000000', 20),
(2, '2024-11-21', 14, '120000000', 44),
(3, '2024-11-22', 38, '441000000', 48),
(4, '2024-11-23', 33, '321000000', 20),
(5, '2024-11-19', 33, '333000000', 20),
(6, '2024-08-17', 24, '233222000', 12),
(9, '2024-01-17', 22, '323220000', 23),
(11, '2024-10-10', 12, '12000000', 2),
(12, '2024-11-27', 9, '659140000', 30),
(13, '2024-11-28', 1, '71360000', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
