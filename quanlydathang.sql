-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2021 lúc 09:03 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdachang`
--

CREATE TABLE `chitietdachang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` float NOT NULL,
  `GiamGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) NOT NULL,
  `TongTien` float NOT NULL,
  `NgayDH` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NgayGH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `TongTien`, `NgayDH`, `NgayGH`) VALUES
(116, 19, 0, 182575000, '2021-05-28 14:50:00', '2021-05-31'),
(117, 19, 0, 79000000, '2021-06-04 03:23:00', '2021-06-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuyCach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia` float NOT NULL,
  `SoLuongHang` int(4) NOT NULL,
  `MaLoaiHang` int(11) NOT NULL,
  `GhiChu` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `Images`) VALUES
(55, 'iPhone 12 ProMax 256GB', '', 42900000, 1000, 1, '', '../img/ip12pm.png'),
(56, 'iPhone 11 128GB', '', 23000000, 200, 1, '', '../img/ip11den.jpg'),
(57, 'iPhone 11 Mini Rose 64GB', '', 21990000, 3000, 1, '', '../img/ip12minitim.jpg'),
(58, 'iPhone SE 64GB', '', 15000000, 200, 1, '', '../img/ipse.jpg'),
(59, 'iPhone 11 Mimi Red 128GB', '', 15000000, 100, 1, '', '../img/ipminido.jpg'),
(60, 'Xiaomi Mi11 5G 256GB', '', 23000000, 1000, 2, '', '../img/mi11.jpg'),
(61, 'OPPO A54 64GB', '', 5990000, 200, 5, '', '../img/oppoa54.jpg'),
(62, 'OPPO A93 64GB', '', 6990000, 200, 5, '', '../img/oppoa93.jpg'),
(63, 'OPPO A94 64GB', '', 5900000, 200, 5, '', '../img/oppoa94.jpg'),
(64, 'OPPO Reno 5 Limited', '', 25000000, 500, 5, '', '../img/opporeno5limit.png'),
(65, 'SamSung Galaxy Note 20 512GB', '', 45000000, 1000, 3, '', '../img/ssnote20.jpg'),
(66, 'SamSung Galaxy Note 10 512GB', '', 35900000, 200, 3, '', '../img/ssnote10.jpg'),
(67, 'SamSung Galaxy S20 512GB', '', 34000000, 200, 3, '', '../img/sss20.jpg'),
(68, 'SamSung Galaxy A52 54GB', '', 6490000, 200, 3, '', '../img/ssa52.jpg'),
(70, 'VIVO V11 Red 64GB', '', 4699000, 100, 6, '', '../img/vivoy11.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenCongTy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `DiaChi`, `SoDienThoai`, `Email`, `MatKhau`) VALUES
(19, 'Ngân Tuyết', '', '', '0919191919', 'ntuyet@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(20, 'Huyền', '', '', '09191919194', 'h@gmail.com', '202cb962ac59075b964b07152d234b70'),
(21, 'Lưu Bị', '', 'Cần Thơ', '0919191919', 'bi@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(22, 'Trần Văn An', '', 'Sóc Trăng', '0919191919', 'tranvanan@gmail.com', '202cb962ac59075b964b07152d234b70'),
(23, 'Mạc Trần ', '', 'Sóc Trăng', '12345678', 'mac@gmail.com', '202cb962ac59075b964b07152d234b70'),
(24, 'Nhật Trần', '', 'Vĩnh Long', '0919123143', 'nhat@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(27, 'tt', '', 'qưe', '123', 'tt@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'IPHONE'),
(2, 'XIAOMI'),
(3, 'SAMSUNG'),
(5, 'OPPO'),
(6, 'VIVO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChucVu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
(4, 'Trần Thị A', 'Trưởng phòng', '22/5 Lý Tự Trọng', '88888888', '202cb962ac59075b964b07152d234b'),
(5, 'Quang Vũ', 'Kế toán', '12A TPHCM', '12345678', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Văn', '', '', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdachang`
--
ALTER TABLE `chitietdachang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `chitietdachang_ibfk_1` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `dathang_ibfk_1` (`MSNV`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

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
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdachang`
--
ALTER TABLE `chitietdachang`
  ADD CONSTRAINT `chitietdachang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdachang_ibfk_2` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
