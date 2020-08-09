-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2019 lúc 02:30 CH
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `user_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`user_admin`, `password_admin`) VALUES
('admin', '1708');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount_bill` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `date_recive` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `email`, `amount_bill`, `payment`, `date_order`, `date_recive`, `status`) VALUES
(1, 'thanhduy@gmail.com', '450000', 'cod', '2019-04-10', '2019-04-15', 2),
(2, 'thanhduy@gmail.com', '1350000', 'cod', '2019-04-03', '2019-04-08', 1),
(3, 'haiduong@gmail.com', '450000', 'cod', '2019-04-09', '2019-04-14', 0),
(4, 'haiduong@gmail.com', '297000', 'cod', '2019-04-03', '2019-04-08', 0),
(5, 'thanhduy@gmail.com', '450000', 'cod', '2019-04-05', '2019-04-10', 0),
(6, 'thanhduy@gmail.com', '1650000', 'cod', '2019-04-05', '2019-04-10', 0),
(7, 'thanhduy@gmail.com', '900000', 'cod', '2019-04-17', '2019-04-22', 0),
(8, 'haiduong@gmail.com', '330000', 'cod', '2019-04-21', '2019-04-26', 0),
(9, 'thanhduy@gmail.com', '810000', 'cod', '2019-04-21', '2019-04-26', 0),
(10, 'thanhduy@gmail.com', '330000', 'cod', '2019-04-21', '2019-04-26', 1),
(11, 'quocbao@gmail.com', '910000', 'cod', '2019-04-21', '2019-04-26', 0),
(12, 'haiduong@gmail.com', '330000', 'cod', '2019-04-24', '2019-04-29', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_cmt` int(11) NOT NULL,
  `id_user_cmt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_sp_cmt` int(11) NOT NULL,
  `noidung_cmt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_cmt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_cmt`, `id_user_cmt`, `id_sp_cmt`, `noidung_cmt`, `date_cmt`) VALUES
(2, 'haiduong@gmail.com', 1031, 'chẳng có gì', '2019-03-12'),
(23, 'thanhduy@gmail.com', 1020, 'sản phẩm đúng với hình ảnh', '2019-03-30'),
(24, 'hoangvu@gmail.com', 1046, 'Váy màu trắng đẹp', '2019-04-21'),
(6, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-03-27'),
(7, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-03-25'),
(8, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-03-26'),
(9, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-03-24'),
(10, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-02-12'),
(21, 'thanhduy@gmail.com', 1022, 'thái độ a giao hàng ko muốn giao hàng , mua đi biếu quà , mà sáng sớm 7 h  doạ tự đến lấy hàng đi tui báo cáo lên lazada mua đi bán lại là khoá níck , nên tự lại kho tân kỳ tân quý nhân hàng , hơi trần trừ 1 tý buổi trưa a giao nhận giao hàng với thái độ bực bội giao 2 kiện hàng mà thôi cũng hiểu là làm việc cực quá , thấy cũng thương nhưng nghĩ lại mình mua hàng và dịch vụ ko phải xin mà thái độ', '2019-03-28'),
(20, 'hoangvu@gmail.com', 1031, 'giao hàng đúng giờ, nhân viên nhiệt tình, sản phẩm đúng', '2019-03-28'),
(19, 'hoangvu@gmail.com', 1031, 'giao hàng đúng giờ, nhân viên nhiệt tình, sản phẩm đúng', '2019-03-28'),
(18, 'hoangvu@gmail.com', 1020, 'đầm này hợp với Vũ nè', '2019-03-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `id_disc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rate_disc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `id_disc`, `rate_disc`) VALUES
(1, '630393C06F', 10),
(2, '940FB650DD', 40),
(7, 'AB1A4D0DD4', 40),
(6, '3B5020BB89', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id_hang` int(11) NOT NULL,
  `ten_hang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`id_hang`, `ten_hang`) VALUES
(101, 'Váy'),
(102, 'Đầm'),
(103, 'Áo'),
(104, 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hot`
--

CREATE TABLE `hot` (
  `id_hot` int(11) NOT NULL,
  `masp_hot` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hot`
--

INSERT INTO `hot` (`id_hot`, `masp_hot`) VALUES
(1, 1020),
(2, 1022),
(3, 1021),
(4, 1023),
(5, 1024);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id_order` int(11) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `size_sp` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `amount_order` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id_order`, `id_bill`, `id_sp`, `size_sp`, `qty`, `amount_order`) VALUES
(25, 4, 1021, 'S', '1', '330000'),
(24, 3, 1023, 'S', '1', '450000'),
(23, 2, 1032, 'L', '2', '900000'),
(22, 2, 1032, 'M', '1', '450000'),
(21, 1, 1032, 'S', '1', '450000'),
(26, 5, 1022, 'S', '1', '450000'),
(27, 6, 1031, 'S', '1', '1650000'),
(28, 7, 1022, 'S', '2', '900000'),
(29, 8, 1021, 'S', '1', '330000'),
(30, 9, 1022, 'S', '2', '900000'),
(31, 10, 1021, 'S', '1', '330000'),
(32, 11, 1032, 'S', '2', '910000'),
(33, 12, 1021, 'S', '1', '330000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gia` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `hang`, `gia`, `hinh_sp`) VALUES
(1032, 'Váy dập li lai cắt M', '101', '156000', 'Vay-dap-li-lai-cat-M.png'),
(1031, 'Đầm kẻ ô vuông cổ tím tay lở', '102', '1650000', 'dam-ke-o-vuong-co-tim-tay-lo.png'),
(1030, 'Đầm tay dài in họa tiết fw18', '102', '1500000', 'dam-tay-dai-in-hoa-tiet-fw18.png'),
(1029, 'Áo thun cổ lọ bảng lớn', '103', '500000', 'ao-thun-co-lo-bang-lon.png'),
(1028, 'Quần kaki ống đứng', '104', '1300000', 'quan-kaki-ong-dung.png'),
(1027, 'Váy họa tiết da animal', '101', '540000', 'vay-hoa-tiet-da-animal.png'),
(1026, 'Váy midi gấm dệt 3D xếp li tròn', '101', '400000', 'vay-midi-gam-det-3d-xep-li-tron.png'),
(1025, 'Váy midi đấp trùng trước đính khoen tròn', '101', '900000', 'vay-midi-dap-trung-truoc-dinh-khoen-tron.png'),
(1024, 'Đầm nhung midi cổ tím phối lưới bi', '102', '800000', 'dam-nhung-midi-co-tim-phoi-luoi-bi.png'),
(1061, 'Áo crotop cúp ngực cổ vuông tay lỡ', '103', '510000', 'Ao-crotop-cup-nguc-co-vuong-tay-lo.png'),
(1023, 'Đầm dưới đạp ly phối chéo ngang vai', '102', '450000', 'dam-duoi-dap-ly-phoi-cheo-ngang-vai.png'),
(1022, 'Đầm midi bèo ren cotton thêu', '102', '450000', 'dam-midi-beo-ren-cotton-theu.png'),
(1021, 'Áo bẹt vai in họa tiết tay lỡ', '103', '330000', 'ao-bet-vai-in-hoa-tiet-tai-lo.png'),
(1020, 'Áo thun sọc đỏ tay dài', '103', '550000', 'ao-thun-soc-do-tay-dai.png'),
(1033, 'Quần short túi hộp đính nút', '104', '450000', 'quan-short-tui-hop-dinh-nut.png'),
(1034, 'Đầm nhấn túi da dây kéo thân trước', '102', '1650000', 'dam-nhan-tui-da-day-keo-than-tuoc.png'),
(1035, 'Đầm form xuông rả bèo tùng nhấn nút', '102', '1230000', 'dam-form-suong-ra-beo-tung-nhan-nut.png'),
(1036, 'Quần caro dài nhấn nút', '104', '280000', 'quan-caro-dai-nhan-nut.png'),
(1037, 'Đầm rút dây cổ tím form suông', '102', '1300000', 'dam-rut-day-co-tim-form-suong.png'),
(1038, 'Quần dài linen form suông', '104', '890000', 'quan-dai-linen-form-suong.png'),
(1039, 'Đầm sọc phối da tùng', '102', '1800000', 'dam-soc-phoi-da-tung.png'),
(1040, 'Váy nhún nẹp thân trước', '101', '480000', 'vay-nhun-nep-than-truoc.png'),
(1041, 'Đầm ngang in họa tiết prefall18', '102', '1340000', 'dam-ngang-in-hoa-tiet-prefall18.png'),
(1042, 'Quần short lưng xếp ly 1 bên', '104', '650000', 'quan-short-lung-xep-ly-1-ben.png'),
(1043, 'Đầm cổ vét đính nút', '102', '780000', 'dam-co-vet-dinh-nut.png'),
(1044, 'Đầm 2 dây midi dập li tùng', '102', '980000', 'dam-2-day-midi-dap-li-tung.png'),
(1045, 'Váy midi basic fall18', '101', '350000', 'vay-midi-basic-fall18.png'),
(1046, 'Váy dập li phối sheer xuyên thấu', '101', '780000', 'vay-dap-li-phoi-sheer-xuyen-thau.png'),
(1047, 'Áo cổ tim cột dây cổ', '103', '160000', 'ao-co-tim-cot-day-co.png'),
(1048, 'Áo cổ tròn nhấn 2 nút ngực trên li', '103', '145000', 'ao-co-tron-nhan-2-nut-nguc-tren-li.png'),
(1049, 'Áo cổ tim thân trước nhấn ren thắt dây', '103', '350000', 'ao-co-tim-than-truoc-nhan-ren-that-day.png'),
(1050, 'Áo sọc cổ tim nhấn ren ngực và tay', '103', '265000', 'ao-soc-co-tim-nhan-ren-nguc-va-tay.png'),
(1051, 'Áo sơ mi bản cổ tim tay lỡ', '103', '450000', 'ao-so-mi-ban-co-tim-tay-lo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `id_sp_slide` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `id_sp_slide`) VALUES
(1, 1020),
(2, 1021),
(3, 1022);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusbill`
--

CREATE TABLE `statusbill` (
  `id_statusbill` int(11) NOT NULL,
  `trangthai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statusbill`
--

INSERT INTO `statusbill` (`id_statusbill`, `trangthai`) VALUES
(0, 'Đang xử lí'),
(1, 'Đang giao hàng'),
(2, 'Đã giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `noidung` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_tintuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `ngay`, `noidung`, `hinh_tintuc`) VALUES
(1, 'THẮC MẮC THƯỜNG GẶP VỚI CHƯƠNG TRÌNH KHÁCH HÀNG THÂN THIẾT MỚI', '2019-01-20', '1. Điểm khác biệt giữa Chương trình khách hàng thân thiết mới và Chương trình khách hàng thân thiết cũ?\n- Chương trình khách hàng thân thiết cũ bao gồm 2 hạng thành viên:\nVIP và Diamond, số điểm tích luỹ được bảo toàn từ năm này qua năm khác, chỉ mất đi khi khách hàng dùng số điểm đó để đổi quà.\n- Chương trình khách hàng thân thiết mới bao gồm 3 hạng thành viên: Silver, Gold, Diamond, sau 12 tháng kể từ ngày được thăng hạng (hoặc ngày xếp hạng cuối cùng) thành viên sẽ được xếp hạng lại dựa trên số điểm tích luỹ của 12 tháng đó.\n\n\n2. Lợi ích của Chương trình khách hàng thân thiết mới?\n- Khách hàng trở thành Thành viên MARC và bắt đầu tích luỹ điểm ngay lần mua hàng đầu tiên.\n- Mọi thông tin của khách hàng được lưu giữ trong hệ thống dữ liệu truy xuất thông qua số điện thoại, mỗi lần mua hàng khách hàng chỉ cần đọc số điện thoại để được tích luỹ điểm và nhận ưu đãi riêng cho từng hạng thành viên.\n- Nhiều hạng thành viên hơn (Silver, Gold, Diamond) để những khách hàng tích luỹ điểm chưa nhiều cũng nhận được ưu đãi của hạng thành viên thấp hơn.\n\n\n3. Làm sao để trở thành khách hàng thân thiết của Cỏ 3 Lá?\nBạn sẽ trở thành Khách hàng thân thiết của Cỏ 3 Lá ngay khi mua sản phẩm bất kỳ đầu tiên và để lại thông tin đăng ký: họ tên, số điện thoại, ngày sinh, email, địa chỉ liên lạc.', 'blog_giai_dap_thac_mac.png'),
(3, 'Chương trình tích điểm mới', '2019-03-15', 'Với mong muốn chăm sóc khách hàng tốt hơn và ngày càng hoàn thiện trong dịch vụ chăm sóc khách hàng, nhân dịp vừa tròn 1 tuổi Cỏ 3 Lára mắt chương trình khách hàng thân thiết mới với nhiều ưu điểm vượt trội so với chương trình cũ:\n\nKhách hàng trở thành thành viên MARC và bắt đầu tích điểm ngay lần mua hàng đầu tiên.\nKhách hàng không cần lưu giữ thẻ cứng, mọi thông tin cá nhân và điểm tích luỹ sẽ được lưu trong hệ thống dữ liệu và truy xuất thông qua số điện thoại.\nĐiểm tích luỹ theo năm và hạng thành viên được xét lại mỗi năm 1 lần.', 'chuong_trinh_tich_diem_moi.png'),
(4, 'MẶC ĐẸP VỚI BRALETTE', '2019-03-21', 'Bralette – vốn được biết đến là loại áo lót mềm mại, phá vỡ mọi chuẩn mực của các loại bra truyền thống – đang mê hoặc các cô gái hiện đại bởi sự mềm mại, yêu chiều làn da và cứ thế trở thành xu hướng thời trang đình đám trên thế giới.\n\nBên cạnh sự gợi cảm vốn có, với thiết kế ngày một tinh tế hơn, bralette không đơn thuần chỉ là chiếc áo lót ẩn dưới các lớp trang phục kín đáo mà đã trở thành một must-have-item quyến rũ mà bất kì cô nàng nào cũng phải sở hữu cho mình ít nhất một chiếc trong tủ đồ. Cùng Cỏ 3 Lá tham khảo những cách phối đồ sau đây để làm mới phong cách thường ngày của bạn nhé.', 'mac_dep_voi_bralette.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_bir` date DEFAULT NULL,
  `count_login` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fullname`, `phone`, `address`, `sex`, `date_bir`, `count_login`) VALUES
(21, 'thanhduy@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Nguyễn Thành Duy', '0936649364', 'đông tư , lái thiêu , thuận an , bình dương', 'Nam', '1998-08-17', 85),
(20, 'haiduong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Huỳnh Hải Dương', '0965432653', 'Châu đốc, an giang', 'Nam', '1998-05-18', 5),
(19, 'hoangvu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Trịnh Hoàng Vũ', '0384213366', NULL, 'Nam', '2019-01-01', 2),
(17, 'ngocthanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Ngọc Thành', '0931292584', NULL, 'Nữ', '2019-01-01', 1),
(22, 'quocbao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Quốc Bảo', '0344833111', 'Vũng Tàu nha.', 'Nam', '1998-09-26', 4),
(24, 'ngthanhduy178@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thành Duy', '', NULL, NULL, '2019-01-01', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_admin`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id_hang`);

--
-- Chỉ mục cho bảng `hot`
--
ALTER TABLE `hot`
  ADD PRIMARY KEY (`id_hot`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statusbill`
--
ALTER TABLE `statusbill`
  ADD PRIMARY KEY (`id_statusbill`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `id_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT cho bảng `hot`
--
ALTER TABLE `hot`
  MODIFY `id_hot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1062;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
