/*
Navicat MySQL Data Transfer

Source Server         : WAMP_MYSQL
Source Server Version : 50714
Source Host           : localhost:3307
Source Database       : qlsanpham

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-12-30 20:14:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chitietsp
-- ----------------------------
DROP TABLE IF EXISTS `chitietsp`;
CREATE TABLE `chitietsp` (
  `MaSP` int(11) DEFAULT NULL,
  `ChiTietSP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `FK_SanPham_ChiTietSP` (`MaSP`),
  CONSTRAINT `FK_SanPham_ChiTietSP` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chitietsp
-- ----------------------------
INSERT INTO `chitietsp` VALUES ('1', 'Màn Hình: 	5.1 inch (1440 x 2560 pixels);Ram: 3GB;Chip: Exynos 8890;Hệ Điều Hành: Andoid 6.0');
INSERT INTO `chitietsp` VALUES ('2', 'Màn Hình: 	4.7 inch(1334 x 750 pixel);Ram: 2GB; Chip: Apple A10;Hệ Điều Hành:IOS 10');
INSERT INTO `chitietsp` VALUES ('3', 'Màn Hình: 	5.1 inch (1440 x 2560 pixels);Ram: 3GB;Chip: Exynos 8890;Hệ Điều Hành: Andoid 6.0');
INSERT INTO `chitietsp` VALUES ('4', 'Màn Hình: 	5.1 inch (1440 x 2560 pixels);Ram: 3GB;Chip: Exynos 8890;Hệ Điều Hành: Andoid 6.0');
INSERT INTO `chitietsp` VALUES ('5', 'Màn Hình: 	4.7 inch(1334 x 750 pixel);Ram: 2GB; Chip: Apple A10;Hệ Điều Hành:IOS 10');
INSERT INTO `chitietsp` VALUES ('6', 'Màn Hình: 	4.7 inch(1334 x 750 pixel);Ram: 2GB; Chip: Apple A10;Hệ Điều Hành:IOS 10');
INSERT INTO `chitietsp` VALUES ('7', 'Màn Hình: 	4.7 inch(1334 x 750 pixel);Ram: 2GB; Chip: Apple A10;Hệ Điều Hành:IOS 10');
INSERT INTO `chitietsp` VALUES ('8', 'Màn Hình: 	5.1 inch (1440 x 2560 pixels);Ram: 3GB;Chip: Exynos 8890;Hệ Điều Hành: Andoid 6.0');
INSERT INTO `chitietsp` VALUES ('9', 'Màn Hình: 	4.7 inch(1334 x 750 pixel);Ram: 2GB; Chip: Apple A10;Hệ Điều Hành:IOS 10');
INSERT INTO `chitietsp` VALUES ('10', 'Màn Hình: 	5.1 inch (1440 x 2560 pixels);Ram: 3GB;Chip: Exynos 8890;Hệ Điều Hành: Andoid 6.0');

-- ----------------------------
-- Table structure for donhang
-- ----------------------------
DROP TABLE IF EXISTS `donhang`;
CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL AUTO_INCREMENT,
  `MaTK` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaTien` int(255) DEFAULT NULL,
  `TinhTrang` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaDonHang`),
  UNIQUE KEY `FK_MaDonHang` (`MaDonHang`) USING BTREE,
  KEY `FK_MaTK` (`MaTK`),
  KEY `FK_MaSP` (`MaSP`),
  CONSTRAINT `FK_MaSP` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_MaTK` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of donhang
-- ----------------------------
INSERT INTO `donhang` VALUES ('1', '2', '1', '2', '24000000', '1');
INSERT INTO `donhang` VALUES ('2', '2', '2', '1', '13000000', '1');
INSERT INTO `donhang` VALUES ('3', '2', '3', '1', '6990000', '1');

-- ----------------------------
-- Table structure for dstinhthanh
-- ----------------------------
DROP TABLE IF EXISTS `dstinhthanh`;
CREATE TABLE `dstinhthanh` (
  `MaTinh` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTinh`),
  UNIQUE KEY `FK_MaTinh` (`MaTinh`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dstinhthanh
-- ----------------------------
INSERT INTO `dstinhthanh` VALUES ('1', 'An Giang');
INSERT INTO `dstinhthanh` VALUES ('2', 'Bà Rịa - Vùng Tàu');
INSERT INTO `dstinhthanh` VALUES ('3', 'Bắc Giang');
INSERT INTO `dstinhthanh` VALUES ('4', 'Bắc Kạn');
INSERT INTO `dstinhthanh` VALUES ('5', 'Bạc Liêu');
INSERT INTO `dstinhthanh` VALUES ('6', 'Bắc Ninh');
INSERT INTO `dstinhthanh` VALUES ('7', 'Bến Tre');
INSERT INTO `dstinhthanh` VALUES ('8', 'Bình Định');
INSERT INTO `dstinhthanh` VALUES ('9', 'Bình Dương');
INSERT INTO `dstinhthanh` VALUES ('10', 'Bình Phước');
INSERT INTO `dstinhthanh` VALUES ('11', 'Bình Thuận');
INSERT INTO `dstinhthanh` VALUES ('12', 'Cà Mau');
INSERT INTO `dstinhthanh` VALUES ('13', 'Cao Bằng');
INSERT INTO `dstinhthanh` VALUES ('14', 'Đắk Lắk');
INSERT INTO `dstinhthanh` VALUES ('15', 'Đắk Nông');
INSERT INTO `dstinhthanh` VALUES ('16', 'Điện Biên');
INSERT INTO `dstinhthanh` VALUES ('17', 'Đồng Nai');
INSERT INTO `dstinhthanh` VALUES ('18', 'Đồng Tháp');
INSERT INTO `dstinhthanh` VALUES ('19', 'Gia Lai');
INSERT INTO `dstinhthanh` VALUES ('20', 'Hà Giang');
INSERT INTO `dstinhthanh` VALUES ('21', 'Hà Nam');
INSERT INTO `dstinhthanh` VALUES ('22', 'Hà Tĩnh');
INSERT INTO `dstinhthanh` VALUES ('23', 'Hải Dương');
INSERT INTO `dstinhthanh` VALUES ('24', 'Hậu Giang');
INSERT INTO `dstinhthanh` VALUES ('25', 'Hòa Bình');
INSERT INTO `dstinhthanh` VALUES ('26', 'Hưng Yên');
INSERT INTO `dstinhthanh` VALUES ('27', 'Khánh Hòa');
INSERT INTO `dstinhthanh` VALUES ('28', 'Kiên Giang');
INSERT INTO `dstinhthanh` VALUES ('29', 'Kon Tum');
INSERT INTO `dstinhthanh` VALUES ('30', 'Lai Châu');
INSERT INTO `dstinhthanh` VALUES ('31', 'Lâm Đồng');
INSERT INTO `dstinhthanh` VALUES ('32', 'Lạng Sơn');
INSERT INTO `dstinhthanh` VALUES ('33', 'Lào Cai');
INSERT INTO `dstinhthanh` VALUES ('34', 'Long An');
INSERT INTO `dstinhthanh` VALUES ('35', 'Nam Định');
INSERT INTO `dstinhthanh` VALUES ('36', 'Nghệ An');
INSERT INTO `dstinhthanh` VALUES ('37', 'Ninh Bình');
INSERT INTO `dstinhthanh` VALUES ('38', 'Ninh Thuận');
INSERT INTO `dstinhthanh` VALUES ('39', 'Phú Thọ');
INSERT INTO `dstinhthanh` VALUES ('40', 'Quảng Bình');
INSERT INTO `dstinhthanh` VALUES ('41', 'Quảng Nam');
INSERT INTO `dstinhthanh` VALUES ('42', 'Quảng Ngãi');
INSERT INTO `dstinhthanh` VALUES ('43', 'Quảng Ninh');
INSERT INTO `dstinhthanh` VALUES ('44', 'Quảng Trị');
INSERT INTO `dstinhthanh` VALUES ('45', 'Sóc Trăng');
INSERT INTO `dstinhthanh` VALUES ('46', 'Sơn La');
INSERT INTO `dstinhthanh` VALUES ('47', 'Tây Ninh');
INSERT INTO `dstinhthanh` VALUES ('48', 'Thái Bình');
INSERT INTO `dstinhthanh` VALUES ('49', 'Thái Nguyên');
INSERT INTO `dstinhthanh` VALUES ('50', 'Thanh Hóa');
INSERT INTO `dstinhthanh` VALUES ('51', 'Thừa Thiên Huế');
INSERT INTO `dstinhthanh` VALUES ('52', 'Tiền Giang');
INSERT INTO `dstinhthanh` VALUES ('53', 'Trà Vinh');
INSERT INTO `dstinhthanh` VALUES ('54', 'Tuyên Quang');
INSERT INTO `dstinhthanh` VALUES ('55', 'Vĩnh Long');
INSERT INTO `dstinhthanh` VALUES ('56', 'Vĩnh Phúc');
INSERT INTO `dstinhthanh` VALUES ('57', 'Yên Bái');
INSERT INTO `dstinhthanh` VALUES ('58', 'Phú Yên');
INSERT INTO `dstinhthanh` VALUES ('59', 'Cần Thơ');
INSERT INTO `dstinhthanh` VALUES ('60', 'Đà Nẵng');
INSERT INTO `dstinhthanh` VALUES ('61', 'Hải Phòng');
INSERT INTO `dstinhthanh` VALUES ('62', 'Hà Nội');
INSERT INTO `dstinhthanh` VALUES ('63', 'TP HCM');

-- ----------------------------
-- Table structure for loaisanpham
-- ----------------------------
DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE `loaisanpham` (
  `MaLoai` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoai`),
  UNIQUE KEY `FK_MaLoai` (`MaLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loaisanpham
-- ----------------------------
INSERT INTO `loaisanpham` VALUES ('1', 'Apple');
INSERT INTO `loaisanpham` VALUES ('2', 'SamSung');
INSERT INTO `loaisanpham` VALUES ('3', 'Sony');
INSERT INTO `loaisanpham` VALUES ('4', 'Oppo');

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TenHinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TinhTrang` int(11) DEFAULT NULL,
  `GiaBan` double(255,0) DEFAULT NULL,
  `SoLuong` int(255) DEFAULT NULL,
  PRIMARY KEY (`MaSP`),
  UNIQUE KEY `FK_SP` (`MaSP`),
  KEY `FK_LoaiSP_SP` (`MaLoai`),
  CONSTRAINT `FK_LoaiSP_SP` FOREIGN KEY (`MaLoai`) REFERENCES `loaisanpham` (`MaLoai`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
INSERT INTO `sanpham` VALUES ('1', 'SamSung Galaxy S7', '2', 'samsunggalaxys7.jpg', '1', '12000000', '10');
INSERT INTO `sanpham` VALUES ('2', 'iphone 7', '1', 'iphone7.jpg', '1', '13000000', '100');
INSERT INTO `sanpham` VALUES ('3', 'SamSung Galaxy A5', '2', 'samsunggalaxya5.jpg', '1', '6990000', '5');
INSERT INTO `sanpham` VALUES ('4', 'SamSung Galaxy A7', '2', 'samsunggalaxya7.jpg', '1', '7200000', '3');
INSERT INTO `sanpham` VALUES ('5', 'iphone 7 plus', '1', 'iphone7plus.jpg', '1', '15900000', '0');
INSERT INTO `sanpham` VALUES ('6', 'iphone 6', '1', 'iphone6.jpg', '1', '8990000', '3');
INSERT INTO `sanpham` VALUES ('7', 'iphone 6 plus', '1', 'iphone6plus.jpg', '1', '11900000', '6');
INSERT INTO `sanpham` VALUES ('8', 'Sony Xperia X', '3', 'sonyxperiax.jpg', '0', '12990000', '1');
INSERT INTO `sanpham` VALUES ('9', 'iphone 6s', '1', 'iphone6s.jpg', '1', '14990000', '7');
INSERT INTO `sanpham` VALUES ('10', 'Sony Xperia XZ', '3', 'sonyxperiaxz.jpg', '1', '12300000', '3');

-- ----------------------------
-- Table structure for taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiTaiKhoan` int(11) DEFAULT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `MaTinhThanh` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaTK`),
  UNIQUE KEY `FK_MaTK` (`MaTK`) USING BTREE,
  KEY `FK_MatInhthanh_tinhthanh` (`MaTinhThanh`),
  CONSTRAINT `FK_MatInhthanh_tinhthanh` FOREIGN KEY (`MaTinhThanh`) REFERENCES `dstinhthanh` (`MaTinh`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of taikhoan
-- ----------------------------
INSERT INTO `taikhoan` VALUES ('1', 'admin', '25f9e794323b453885f5181f1b624d0b', '1', 'Huỳnh Vinh Phát', 'Theshadow159@yahoo.com', '01212130469', '1996-11-08', '63');
INSERT INTO `taikhoan` VALUES ('2', 'user1', '25f9e794323b453885f5181f1b624d0b', '2', 'user1', 'abc@yahoo.com', '01212121212', '2016-07-13', '61');
INSERT INTO `taikhoan` VALUES ('3', 'user2', '25f9e794323b453885f5181f1b624d0b', '2', 'user2', 'xyz@yahoo.com', '01313131313', '2011-07-14', '23');
INSERT INTO `taikhoan` VALUES ('45', 'dsds', '698d51a19d8a121ce581499d7b701668', '2', '121w1', '123456789@yahoo.com', '1234567890', '1980-01-01', '13');
