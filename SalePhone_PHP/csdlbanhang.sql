-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2021 lúc 02:12 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdlbanhang`
--
CREATE DATABASE IF NOT EXISTS `csdlbanhang` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `csdlbanhang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `ID` int(11) NOT NULL,
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT '1',
  `GiaDatHang` float DEFAULT '0',
  `GiamGia` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`ID`, `SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(1, 1, 1, 4, 999, 0),
(2, 1, 13, 1, 249, 0),
(3, 2, 3, 10, 1299, 0),
(4, 2, 7, 3, 1899, 0),
(5, 3, 5, 1, 1499, 0),
(6, 3, 6, 5, 1599, 0),
(7, 3, 7, 1, 1899, 0),
(8, 3, 14, 1, 449, 0),
(9, 4, 8, 5, 1859, 0),
(10, 5, 11, 7, 549, 0),
(11, 6, 8, 20, 1859, 0),
(12, 7, 12, 10, 549, 0),
(13, 8, 1, 15, 999, 0),
(14, 9, 15, 2, 219, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) NOT NULL,
  `NgayDH` timestamp NULL DEFAULT NULL,
  `NgayGH` timestamp NULL DEFAULT NULL,
  `TrangThaiDH` int(11) DEFAULT '1',
  `DiaChi` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `DiaChi`) VALUES
(1, 2, 1, '2021-11-24 12:30:19', '2021-11-26 12:03:29', 3, 'Vị Thanh, Hậu Giang'),
(2, 1, 2, '2021-11-24 12:31:47', '2021-11-24 12:31:53', 3, 'Vị Thanh - Hậu Giang'),
(3, 3, 2, '2021-11-24 12:36:55', '2021-11-24 12:37:08', 3, 'TP Bạc Liêu'),
(4, 1, 1, '2021-11-25 14:28:34', '2021-11-25 14:29:02', 3, 'Vị Thanh - Hậu Giang'),
(5, 2, 1, '2021-11-26 12:16:05', '2021-11-26 12:16:26', 3, 'Vị Thanh, Hậu Giang'),
(6, 3, 1, '2021-11-26 12:21:06', NULL, 1, 'TP Bạc Liêu'),
(7, 3, 1, '2021-11-26 12:21:19', '2021-11-26 12:22:39', 0, 'TP Bạc Liêu'),
(8, 1, 1, '2021-11-26 12:21:47', '2021-11-26 12:22:31', 0, 'Vị Thanh - Hậu Giang'),
(9, 1, 1, '2021-11-26 12:21:58', NULL, 1, 'Vị Thanh - Hậu Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` text COLLATE utf8_vietnamese_ci NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'Vị Thanh - Hậu Giang', 1),
(2, 'Vị Thanh, Hậu Giang', 2),
(3, 'TP Bạc Liêu', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `QuyCach` text COLLATE utf8_vietnamese_ci,
  `Gia` float DEFAULT '0',
  `SoLuongHang` int(11) DEFAULT '0',
  `MaLoaiHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(1, 'iPhone 12', 'Màn hình 6.1\", Chip Apple A14 Bionic,\r\nRAM 4 GB, ROM 64 GB,\r\nCamera sau: 2 camera 12 MP,\r\nCamera trước: 12 MP,\r\nPin 2815 mAh, Sạc 20 W', 999, 31, 1),
(2, 'iPhone 12 Pro', 'Màn hình 6.1\", Chip Apple A14 Bionic,\r\nRAM 6 GB, ROM 128 GB,\r\nCamera sau: 3 camera 12 MP,\r\nCamera trước: 12 MP,\r\nPin 2815 mAh, Sạc 20 W', 1199, 50, 1),
(3, 'iPhone 12 Pro Max', 'Màn hình 6.7\", Chip Apple A14 Bionic,\r\nRAM 6 GB, ROM 128 GB,\r\nCamera sau: 3 camera 12 MP,\r\nCamera trước: 12 MP,\r\nPin 3687 mAh, Sạc 20 W', 1299, 40, 1),
(4, 'iPhone 13', 'Màn hình 6.1\", Chip Apple A15 Bionic\r\nRAM 4 GB, ROM 128 GB\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nPin 3240 mAh, Sạc 20 W', 1399, 50, 1),
(5, 'iPhone 13 Pro', 'Màn hình 6.1\", Chip Apple A15 Bionic\r\nRAM 6 GB, ROM 128 GB\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nPin 3095 mAh, Sạc 20 W', 1499, 49, 1),
(6, 'iPhone 13 Pro Max', 'Màn hình 6.7\", Chip Apple A15 Bionic\r\nRAM 6 GB, ROM 128 GB\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nPin 4352 mAh, Sạc 20 W', 1599, 45, 1),
(7, 'Samsung Galaxy Z Fold3 5G', 'Màn hình Chính 7.6\" & Phụ 6.2\", Chip Snapdragon 888,\r\nRAM 12 GB, ROM 512 GB,\r\nCamera sau: 3 camera 12 MP,\r\nCamera trước: 10 MP & 4 MP,\r\nPin 4400 mAh, Sạc 25 W', 1899, 46, 2),
(8, 'Samsung Galaxy Z Fold2 5G', 'Màn hình Chính 7.6\" & Phụ 6.2\", Chip Snapdragon 865+,\r\nRAM 12 GB, ROM 512 GB,\r\nCamera sau: 3 camera 12 MP,\r\nCamera trước: 10 MP & 4 MP,\r\nPin 4500 mAh, Sạc 25 W', 1859, 25, 2),
(9, 'Samsung Galaxy A03s', 'Màn hình 6.5\", Chip MediaTek MT6765\r\nRAM 4 GB, ROM 64 GB\r\nCamera sau: Chính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước: 5 MP\r\nPin 5000 mAh, Sạc 7.75 W', 189, 50, 2),
(10, 'Samsung Galaxy A52s', 'Màn hình 6.5\", Chip Snapdragon 778G 5G 8 nhân\r\nRAM 8 GB, ROM 256 GB\r\nCamera sau: Chính 64 MP & Phụ 12 MP, 5 MP, 5 MP\r\nCamera trước: 32 MP\r\nPin 4500 mAh, Sạc 25 W', 599, 50, 2),
(11, 'Samsung Galaxy A72', 'Màn hình 6.7\", Chip Snapdragon 720G\r\nRAM 8 GB, ROM 256 GB\r\nCamera sau: Chính 64 MP & Phụ 12 MP, 8 MP, 5 MP\r\nCamera trước: 32 MP\r\nPin 5000 mAh, Sạc 25 W', 549, 43, 2),
(12, 'Xiaomi 11T 5G', 'Màn hình 6.67\", Chip MediaTek Dimensity 1200,\r\nRAM 8 GB, ROM 128 GB,\r\nCamera sau: Chính 108 MP & Phụ 8 MP, 5 MP,\r\nCamera trước: 16 MP,\r\nPin 5000 mAh, Sạc 67 W', 549, 40, 3),
(13, 'Xiaomi Redmi Note 10S', 'Màn hình 6.43\", Chip MediaTek Helio G95,\r\nRAM 8 GB, ROM 128 GB,\r\nCamera sau: Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP,\r\nCamera trước: 13 MP,\r\nPin 5000 mAh, Sạc 33 W', 249, 49, 3),
(14, 'Xiaomi Redmi Note 10 Pro', 'Màn hình 6.67\", Chip Snapdragon 732G,\r\nRAM 8 GB, ROM 128 GB,\r\nCamera sau: Chính 108 MP & Phụ 8 MP, 5 MP, 2 MP,\r\nCamera trước: 16 MP,\r\nPin 5020 mAh, Sạc 33 W', 449, 49, 3),
(15, 'Xiaomi Redmi 9T', 'Màn hình 6.53\", Chip Snapdragon 662,\r\nRAM 6 GB, ROM 128 GB,\r\nCamera sau: Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP,\r\nCamera trước: 8 MP,\r\nPin 6000 mAh, Sạc 18 W', 219, 48, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'iphone-12', 1),
(2, 'iphone-12-pro', 2),
(3, 'iphone-12-pro-max', 3),
(4, 'iphone-13', 4),
(5, 'iphone-13-pro', 5),
(6, 'iphone-13-pro-max', 6),
(7, 'samsung-galaxy-z-fold3', 7),
(8, 'samsung-galaxy-z-fold2', 8),
(9, 'samsung-galaxy-a03s', 9),
(10, 'samsung-galaxy-a52s', 10),
(11, 'samsung-galaxy-a72', 11),
(12, 'xiaomi-11t-5g', 12),
(13, 'xiaomi-redmi-note-10s', 13),
(14, 'xiaomi-redmi-note-10-pro', 14),
(15, 'xiaomi-redmi-9t', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenCongTy` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoDienThoai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `SoFax` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `taikhoan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `taikhoan`, `matkhau`) VALUES
(1, 'Nguyễn Văn A', 'Công ty phần mềm ACB', '0123456789', NULL, 'khachhang1', '123456'),
(2, 'Trần Văn B', '', '094xxxxxxx', NULL, 'VanB', '123456'),
(3, 'Nguyễn Văn Tèo', 'Công ty Công nghệ phần mềm', '0931xxxxxx', NULL, 'VanTeo', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ChucVu` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoDienThoai` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `username`, `pass`) VALUES
(1, 'Huỳnh Văn Khôi', 'Quản lý', 'Vị Thanh - Hậu Giang', '0963657120', 'admin', '123456'),
(2, 'Nguyễn Văn B', 'Bán hàng', 'Ninh Kiều - Cần Thơ', '0123456789', 'VanB', '123456'),
(3, 'Nguyễn Văn K', 'Bán Hàng', 'TP Trà Vinh', '0238xxxxxx', 'VanK', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_chitietdathang_sodon` (`SoDonDH`),
  ADD KEY `fk_chitietdathang_hanghoa` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `fk_dathang_khachhang` (`MSKH`),
  ADD KEY `fk_dathang_nhanvien` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `fk_diachikh` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `fk_hanghoa` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `fk_hinhhanghoa` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `fk_chitietdathang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  ADD CONSTRAINT `fk_chitietdathang_sodon` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `fk_dathang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `fk_dathang_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `fk_diachikh` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `fk_hanghoa` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `fk_hinhhanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
