-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 02:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `รหัสลูกค้า` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `รหัสลูกค้า`) VALUES
('cream', '957609', 'COS02'),
('mayojin', '123456', 'COS01'),
('rainy', '987654', 'COS03');

-- --------------------------------------------------------

--
-- Table structure for table `account_employee`
--

CREATE TABLE `account_employee` (
  `username_emp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `รหัสพนักงาน` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_employee`
--

INSERT INTO `account_employee` (`username_emp`, `password`, `รหัสพนักงาน`) VALUES
('Butterfly', '9057432', 'ST104'),
('Kanunnoey', '4907741', 'ST102'),
('meenanud', '6588412', 'ST101'),
('Somsukdena', '03852553', 'ST103');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `รหัสประเภทสินค้า` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `ชื่อประเภทสินค้า` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`รหัสประเภทสินค้า`, `ชื่อประเภทสินค้า`) VALUES
('BL', 'พาเล็ตต'),
('BO', 'บลัชออน'),
('LS', 'ลิปสติก'),
('SK', 'สกินแคร์'),
('TN', 'อุปกรณ์แต่งหน้า');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `รหัสลูกค้า` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `ชื่อ-นามสกุล` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `เบอร์` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `อีเมล์` varchar(500) NOT NULL,
  `ที่อยู่` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`รหัสลูกค้า`, `ชื่อ-นามสกุล`, `เบอร์`, `อีเมล์`, `ที่อยู่`) VALUES
('COS01', 'เมธาวี ลวนะลาภานนท์', '0800000123', 'matawee@email.com', 'บ้านเลขที่ 12/8 ถนนพหลโยธิน ตําบลสายไหม อำเภอเมือง จังหวัดกรุงเทพมหานคร รหัสไปรษณีย์ 12940'),
('COS02', 'ธนาภา ธาดาสีห์', '0800000321', 'thanapa@gmail.com', 'บ้านเลขที่ 36/9 ถนน กาญจนาภิเษก ตําบลบางม่วง อําเภอเมือง จังหวัด นนทบุรี รหัสไปรษณีย์ 11111'),
('COS03', 'ธนารีย์ บริบูรณ์หิรั', '0800000867', 'thanaree@gmail.com', 'บ้านเลขที่ 100/1 ถนน กัลปพฤกษ์ ตําบลบางนา อําเภอเมือง  จังหวัดกรุงเทพมหานคร รหัสไปรษณีย์ 24567');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `name`, `password`, `email`, `phone`, `address`) VALUES
('ZECHI', 'gift', '180801', 'gift@gmail.com', '0873453448', '134/11หมู่4ตำบลคูคตอำเภอลำลูกกาจังหวัดปทุมธานี12130'),
('mayojin', 'may', '1234', 'zeramaple@gmail.com', '0897867141', '134/11หมู่4ตำบลคูคตอำเภอลำลูกกาจังหวัดปทุมธานี12130'),
('cream', 'creaming', '555', 'zeramaple@gmail.com', '0897867141', '134/11หมู่4ตำบลคูคตอำเภอลำลูกกาจังหวัดปทุมธานี12130'),
('', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `เลขออเดอร์` int(5) UNSIGNED ZEROFILL NOT NULL,
  `วันที่` date NOT NULL DEFAULT current_timestamp(),
  `เวลา` time DEFAULT current_timestamp(),
  `สถานะการชําระเงิน` varchar(20) NOT NULL,
  `รวมจำนวนเงิน` longtext NOT NULL,
  `Username` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`เลขออเดอร์`, `วันที่`, `เวลา`, `สถานะการชําระเงิน`, `รวมจำนวนเงิน`, `Username`) VALUES
(00001, '2022-09-13', '00:00:19', 'รอดำเนินการ', '', 'mayojin'),
(00002, '2022-09-15', '00:00:20', 'รอดำเนินการ', '', 'mayojin'),
(00003, '2022-09-24', '12:20:00', 'สำเร็จ', '', 'rainy'),
(00004, '2022-09-25', '16:20:00', 'สำเร็จ', '', 'cream'),
(00046, '2022-10-27', '23:23:17', 'รอดำเนินการ', '1380', 'mayojin'),
(00047, '2022-10-27', '23:23:17', 'รอดำเนินการ', '1380', 'mayojin'),
(00048, '2022-10-27', '23:26:22', 'รอดำเนินการ', '1290', 'mayojin'),
(00049, '2022-10-27', '23:28:12', 'รอดำเนินการ', '210', 'mayojin'),
(00058, '2022-10-28', '22:43:16', 'รอดำเนินการ', '690', 'mayojin');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `เลขออเดอร์` int(5) UNSIGNED ZEROFILL NOT NULL,
  `รหัสสินค้า` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `จำนวน` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`เลขออเดอร์`, `รหัสสินค้า`, `จำนวน`) VALUES
(00001, '001', 2),
(00002, '002', 5),
(00003, '003', 4),
(00004, '003', 1),
(00046, '004', 2),
(00049, '023', 1),
(00050, '023', 1),
(00051, '001', 1),
(00052, '004', 2),
(00053, '001', 1),
(00054, '001', 2),
(00055, '001', 2),
(00056, '004', 3),
(00057, '004', 3),
(00058, '004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `รหัสสินค้า` varchar(50) NOT NULL,
  `ชื่อสินค้า` varchar(50) NOT NULL,
  `ราคาสินค้า` int(11) NOT NULL,
  `จำนวนสินค้า` int(11) NOT NULL,
  `รายละเอียดสินค้า` varchar(100) NOT NULL,
  `รหัสพนักงาน` varchar(50) NOT NULL,
  `รหัสประเภทสินค้า` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`รหัสสินค้า`, `ชื่อสินค้า`, `ราคาสินค้า`, `จำนวนสินค้า`, `รายละเอียดสินค้า`, `รหัสพนักงาน`, `รหัสประเภทสินค้า`, `img`) VALUES
('001', 'ลิปสติก  Paris', 150, 78, 'สีชมพู', 'ST101', 'LP', 'pro_63558aeb410c7.jpg'),
('002', 'lilybyred tint', 250, 50, 'สีแดงอมส้ม', 'ST102', 'LP', 'pro_63558d4f0cbf6.jpg'),
('003', 'oh my eyes shimer', 99, 100, 'ม่วง  เนื้อชิมเมอร์', 'ST103', 'BL', 'pro_635595c96472a.jpg'),
('004', 'SK-II Skinpower Cream 15g', 690, 115, 'มอบความชุ่มชื้นเข้มข้น เพื่อผิวกระชับ ', 'ST104', 'SK', 'pro_635596425f14a.jpg'),
('005', 'Origins Dr.Andrew Weil For Origins Mega-Mushroom', 1290, 48, 'ปลอบโยนผิวให้ชุ่มฉ่ำสุขภาพดีด้วยทรีทเมนท์โลชั่น', 'ST104', 'SK', 'pro_63559673862dd.jpg'),
('007', 'CE-VELVET LIP TINT', 175, 89, 'สี #LikeGentle', 'ST102', 'LP', 'pro_635596bd98e8b.jpg'),
('008', 'Amuse Dew Velvet', 165, 132, 'เนื้อเวลเวท', 'ST103', 'LP', 'pro_635596e2450f6.jpg'),
('009', 'Dior Lip Maximizer Collagen Activ', 210, 28, '#028', 'ST101', 'LP', 'pro_635597337be0d.jpg'),
('010', '4U2 Est. Harder', 99, 42, '#26 In A Minute', 'ST103', 'LP', 'pro_6355975516084.jpg'),
('011', 'ANUA Heartleaf 77% Soothing Toner', 520, 34, 'with extracts of heart leaf to 77% Light texture', 'ST102', 'SK', 'pro_6355977a3a365.jpg'),
('012', 'Sulwhasoo First Care Activating Serum', 3120, 20, 'ลดเลือนริ้วรอยที่จำเป็นอย่างยิ่ง', 'ST104', 'SK', 'pro_635597ac015c0.jpg'),
('013', 'SK-II Facial Treatment Essence', 2390, 111, 'ส่วนประกอบจาก Pitera มากกว่า 90% ปรับสมดุลผิว', 'ST101', 'SK', 'pro_635597d1836db.jpg'),
('014', 'Browit Highlight and Contour Pro Palette', 442, 210, 'เนรมิตใบหน้าให้สวยชัดทุกองศาด้วยพาเลทที่รวมไฮไล', 'ST102', 'BL', 'pro_635597fbc0444.jpg'),
('015', 'ODBO Lovely Pantone Blusher OD197-02', 149, 222, 'พาเลทเลิฟๆ สุดลิมิเต็ด ที่รวมบลัชออน 4 เฉดสี', 'ST103', 'BL', 'pro_6355982a45621.jpg'),
('016', 'Baby Bright Bronze Brown Contour Palette 4g x 3', 159, 88, 'เนื้อประกายชิมเมอร์', 'ST104', 'BL', 'pro_6355985279261.jpg'),
('017', 'Charlotte Tilbury Nudegasm Face Palette', 3035, 46, 'เพิ่มมิติ แสง เงา ให้ผิวฉ่ำวาวเปล่งประกายถึงขีดสุด', 'ST101', 'BL', 'pro_63559872cac86.jpg'),
('018', 'Cute Press Nonstop Beauty Ombre Blush 5g', 194, 300, 'ผิวดูโกลว์ ด้วยบลัชออนที่ผสานสองเฉดสี', 'ST102', 'BO', 'pro_6355989b02369.jpg'),
('019', 'MAC Powder Blush 6g #Melba', 1008, 4, 'แต่งแต้มพวงแก้มให้สวยสุขภาพดี', 'ST103', 'BO', 'pro_635598c731935.jpg'),
('020', 'NARS Air Matte Blush 6g #Orgasm', 999, 56, 'เติมเต็มสีสันบนพวงแก้มให้ดูสวยกว่าที่เคย', 'ST104', 'BO', 'pro_635598e8868dd.jpg'),
('021', 'Hourglass Ambient Lighting Blush 4.2g', 1620, 104, 'ผสานสีสันที่สวยเด่นคมชัดและแป้งที่ช่วยให้ผิวดูนวล', 'ST101', 'BO', 'pro_6355991ebf7a5.jpg'),
('022', 'ODBO Professional Three Color Blush 10.5g OD183 #0', 89, 111, 'บลัชออนเนื้อฝุ่นสัมผัสนุ่ม 3 เฉดสี ', 'ST102', 'BO', 'pro_6355994b15307.jpg'),
('023', 'Merrez\'ca Excellent Covering Skin Setting Pressed ', 210, 140, 'เนื้อแป้งเนียนละเอียด ปกปิดได้ดีเยี่ยม กันน้ำ', 'ST103', 'TN', 'pro_6355996ec8ee8.jpg'),
('024', 'NARS Light Reflecting Pressed Setting Powder 10g #', 1290, 87, 'ล็อคเมคอัพให้เป๊ะปัง ด้วยแป้งอัดแข็งเนื้อบางเบา', 'ST104', 'TN', 'pro_6355998f674a0.jpg'),
('025', 'Laura Mercier Translucent Loose Setting Powder 9.3', 650, 32, 'อณูละเอียดเนียนนุ่มดุจใยไหม เกลี่ยง่ายทุกสัมผัส', 'ST101', 'TN', 'pro_635599b10223d.jpg'),
('026', 'แป้งเจ้านาง Perfect Bright UV 2 Way Powder Foundat', 370, 84, 'แป้งผสมรองพื้นสูตรพิเศษ เน้นการปกปิด เกลี่ยง่าย', 'ST102', 'TN', 'pro_635599d13f9db.jpg'),
('027', 'Goldberry Simplify Nature Compact Foundation SPF25', 298, 66, 'ปรับสีผิวสว่างใสด้วยแป้งพัฟผสมรองพื้นสูตรความงามจา', 'ST102', 'TN', 'pro_635599ef80542.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `เลขการจัดส่ง` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `บริษัทจัดส่ง` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `สถานะ` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `เลขออเดอร์` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`เลขการจัดส่ง`, `บริษัทจัดส่ง`, `สถานะ`, `เลขออเดอร์`) VALUES
('SRN01', 'speed express', 'เตรียมสินค้า', '00001'),
('SRN02', 'ninja cat', 'จัดส่งสำเร็จ', '00003'),
('SRN03', 'ninja cat', 'จัดส่งสำเร็จ', '00004');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `รหัสพนักงาน` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `ชื่อ-นามสกุล` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `เบอร์` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `อีเมล` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`รหัสพนักงาน`, `ชื่อ-นามสกุล`, `เบอร์`, `อีเมล`) VALUES
('ST101', 'ทำดี ได้มาก', '080-123-6548', 'Tumdee11@gmail.com'),
('ST102', 'สวัสดี วันจันทร์', '081-123-7777', 'Monday55@gmail.com'),
('ST103', 'มีเงิน มั่งคั่ง', '082-123-9876', 'MeeNgern_naja@gmail.com'),
('ST104', 'สมศรี มีมานะ', '083-123-2643', 'Somsri_M@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `รหัสลูกค้า` (`รหัสลูกค้า`);

--
-- Indexes for table `account_employee`
--
ALTER TABLE `account_employee`
  ADD PRIMARY KEY (`username_emp`,`รหัสพนักงาน`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`รหัสประเภทสินค้า`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`รหัสลูกค้า`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`เลขออเดอร์`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`เลขออเดอร์`,`รหัสสินค้า`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`รหัสสินค้า`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`เลขการจัดส่ง`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`รหัสพนักงาน`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `เลขออเดอร์` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`รหัสลูกค้า`) REFERENCES `customer` (`รหัสลูกค้า`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
