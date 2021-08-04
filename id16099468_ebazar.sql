-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2021 at 06:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16099468_ebazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`, `active_status`) VALUES
(1, 'Prabhakar', 'prabharar2@gmail.com', '9115486817', 'prabhakar', 1),
(2, 'Saurabh', 'saurabh@gmail.com', '9115486817', 'saurabh', 1),
(3, 'Rishabh', 'rishabh@gmail.com', '9115486885', 'Rishabh@123', 1),
(4, 'abhay', 'abhay.jnv11@gmail.com', '9801677419', 'A@11111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`) VALUES
(6, 3),
(6, 14),
(5, 10),
(2, 6),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedbacks`
--

CREATE TABLE `customer_feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_feedbacks`
--

INSERT INTO `customer_feedbacks` (`feedback_id`, `user_id`, `feedback`) VALUES
(1, 1, 'Best e-commerce platform I heve ever find,They are providing really good and genuine service. kEEP IT UP!'),
(2, 2, 'Best e-commerce platform I heve ever find,They are providing really good and genuine service. kEEP IT UP!'),
(3, 3, 'I loved their service so for and looking forward to make more purchase from this site!');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(250) NOT NULL,
  `product_cat` varchar(250) NOT NULL,
  `product_subcat` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_details` text NOT NULL,
  `product_images` varchar(250) NOT NULL,
  `product_color` varchar(250) NOT NULL,
  `product_size` varchar(250) NOT NULL,
  `product_price` int(250) NOT NULL,
  `product_discount` int(250) NOT NULL,
  `seller_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_subcat`, `product_name`, `product_details`, `product_images`, `product_color`, `product_size`, `product_price`, `product_discount`, `seller_id`) VALUES
(1, 'man', 't-shirt', 'Men\'s half t-shirt', '', 'm1.jpeg,m1.1.jpeg,m1.2.jpeg,m1.3.jpeg', 'red, white, blue', 'S,M,L,XL', 2000, 80, 1),
(2, 'man', 't-shirt', 'Men\'s Full T-Shirt', '', 'm2.jpeg,m2.1.jpeg,m2.2.jpeg,m2.3,jpeg ', 'black, blue, red', 'S,M,L,XL', 1600, 60, 1),
(3, 'man', 't-shirt', 'Men\'s Full T-Shirt', 'np', 'm3.jpeg,m3.1.jpeg', 'yelllow,red', 'S,M,L,XL', 600, 20, 2),
(4, 'man', 't-shirt', 'Men\'s Full T-Shirt Black', 'np', 'm4.jpeg,m4.1.jpeg,m4.2.jpeg,m4.3.jpeg,m4.4.jpeg', 'Black', 'S,M,L,XL', 800, 20, 2),
(5, 'man', 't-shirt', 'Men\'s Full T-Shirt Black', 'np', 'm4.jpeg,m4.1.jpeg,m4.2.jpeg,m4.3.jpeg,m4.4.jpeg', 'Black', 'S,M,L,XL', 800, 20, 3),
(6, 'man', 't-shirt', 'Men\'s half T-Shirt', 'np', 'm5.jpeg,m5.1.jpeg,m5.2.jpeg,m5.3.jpeg,m5.4.jpeg,m5.5.jpeg,m5.6.jpeg', 'Black', 'S,M,L,XL', 800, 20, 3),
(7, 'man', 't-shirt', 'Men\'s full T-Shirt', 'np', 'm6.jpeg,m6.1.jpeg,m6.2.jpeg', 'Black', 'S,M,L,XL', 800, 20, 4),
(8, 'women', 'top', 'women\'s fit top', 'np', 'w1.jpeg,w1.1.jpeg,w1.2.jpeg,w1.3.jpeg,w1.4.jpeg', 'Yellow', 'S,M,L,XL', 800, 20, 1),
(9, 'women', 'top', 'women\'s fit top', 'np', 'w2.jpeg,w2.1.jpeg,w2.2.jpeg,w2.3.jpeg,w2.4.jpeg', 'Black', 'S,M,L,XL', 1000, 30, 4),
(10, 'women', 't-shirt', 'women\'s fit t-shirt', 'np', 'w3.jpeg,w3.1.jpeg,w3.2.jpeg,w3.3.jpeg,w3.4.jpeg', 'Yellow', 'S,M,L,XL', 2000, 40, 4),
(11, 'women', 'shirt', 'women\'s important shirt', 'np', 'w4.jpeg,w4.1.jpeg,w4.2.jpeg,w4.3.jpeg,w4.4.jpeg,jpeg,w4.5.jpeg', 'Red', 'S,M,L,XL', 800, 20, 3),
(12, 'women', 'shirt', 'women\'s important shirt', 'np', 'w5.jpeg,w5.1.jpeg,w5.2.jpeg,w5.3.jpeg,w5.4.jpeg,jpeg,w5.5.jpeg', 'Black', 'S,M,L,XL', 800, 20, 2),
(13, 'women', 't-shirt', 'women\'s fit t-shirt', 'np', 'w6.jpeg,w6.1.jpeg,w6.2.jpeg,w6.3.jpeg,w6.4.jpeg', 'Gray', 'S,M,L,XL', 2000, 40, 2),
(14, 'kids', 'T Shirt', 'Boys Solid Pure Cotton', 'Brand\r\nRockhard\r\nStyle Code\r\nKIDS-MASKHOOD-MRN\r\nSize\r\n8 - 9 Years\r\nBrand Color\r\nMaroon\r\nIdeal For\r\nBoys\r\nFabric\r\nPure Cotton\r\nPrimary Color\r\nMaroon\r\nPattern\r\nSolid\r\nFit\r\nRegular\r\nOccasion\r\nCasual\r\nType\r\nHooded\r\nSleeve Type\r\nFull Sleeve\r\nNumber of T-Shirts\r\n1\r\nFabric Care\r\nCold water wash only\r\nReversible\r\nNo\r\nRockhard Kids Hooded Neck Tshirt With Mask', 'k1.jpeg,k1.1.jpeg,k1.2.jpeg,k1.3,jpeg', 'red', '8-9 year,9-10 year,10-11 year,11-12 year 12-13 year 13-14 year, 14-15 year', 1200, 60, 4),
(15, 'kids', 'Party Kurta', 'Boys Festive & Party Kurta, Waistcoat and Breeches Set', '\r\n1 Breeches, 1 Waistcoat, 1 Kurta\r\nBrand\r\nDigimart\r\nStyle Code\r\nDIGIBC001\r\nSize\r\n2 - 3 Years\r\nBrand Color\r\nBLACK\r\nIdeal For\r\nBoys\r\nLabel Size\r\n2 - 3 Years\r\nType\r\nKurta, Waistcoat and Breeches Set\r\nFabric\r\nArt Silk\r\nPattern\r\nSolid\r\nSuitable For\r\nWestern Wear\r\nSleeve Type\r\nFull Sleeve\r\nPrimary Color\r\nBlack\r\nFabric Care\r\nDry clean only\r\nNumber of Sets\r\n1\r\nSecondary Color\r\nGrey\r\nFabric Details\r\nArt Silk\r\nDIGIMART brings you a Ethinic Set with Waistcoat of Cotton Fabrics Kurta & Paint and Jacket of Dupoion Silk\r\nGeneric Name\r\nKids Ethnic Set\r\nCountry of Origin\r\nIndia', 'k2.jpeg,k2.1.jpeg,k2.2.jpeg', 'Gray', '1-2 year,2-3 year', 2000, 30, 3),
(16, 'kids', 'Ethnic Wear,Choli and Dupatta', 'Girls Lehenga Choli Fusion Wear, Ethnic Wear, Party Wear Embroidered Lehenga, Choli and Dupatta', 'Product Details\r\n\r\nBrand\r\nLeons Fab\r\nStyle Code\r\nK_LC.02\r\nSize\r\n9 - 10 Years\r\nBrand Color\r\nDark Blue\r\nIdeal For\r\nGirls\r\nLabel Size\r\nFree Size\r\nType\r\nLehenga, Choli and Dupatta Set\r\nPrimary Color\r\nBlue\r\nLehenga Fabric\r\nSatin\r\nCholi Fabric\r\nSatin\r\nOccasion\r\nFusion Wear, Ethnic Wear, Party Wear\r\nPattern\r\nEmbroidered\r\nSleeve Type\r\nShort Sleeve\r\nFabric Care\r\nDry clean only\r\nEmbellishments Present\r\nZari\r\nNumber of Lehenga Choli\r\n1\r\nDupatta Fabric\r\nNet\r\nLining Material\r\nSilk\r\nFabric Details\r\nSatin\r\nLeons Fab Provided Best Quality Product.\r\nGeneric Name\r\nKids Lehenga & Choli\r\nCountry of Origin\r\nIndia', 'k3.jpeg,k3.1.jpeg', 'red, black', '7 - 8 Years,9 - 10 Years 11 - 12 Years,13 - 14 Years', 800, 20, 2),
(17, 'kids', 'Waistcoat and Pant Set', 'Boys Casual, Festive & Party Shirt, Waistcoat and Pant Set', '1 Waistcoat, 1 shirt and 1 trousers\r\nBrand\r\nFashion 4 Ever\r\nStyle Code\r\n01\r\nSize\r\n2 - 3 Years\r\nBrand Color\r\nBlack\r\nIdeal For\r\nBoys\r\nLabel Size\r\n20\r\nType\r\nShirt, Waistcoat and Pant Set\r\nFabric\r\nCotton Blend\r\nPattern\r\nSelf Design\r\nSuitable For\r\nWestern Wear\r\nSleeve Type\r\nFull Sleeve\r\nPrimary Color\r\nBlack\r\nFabric Care\r\nRegular Machine Wash\r\nNumber of Sets\r\n1\r\nSecondary Color\r\nGrey\r\nLining Material\r\nCotton\r\nWeave Type\r\nPlain Weave\r\nFabric Details\r\nCotton\r\nGeneric Name\r\nKids Ethnic Set\r\nCountry of Origin\r\nIndia', 'k4.jpeg,k4.1.jpeg,k4.2.jpeg,k4.3.jpeg,k4.4.jpeg', 'Gray,Black', '1 - 2 Years,1 - 2 Years,2 - 3 Years,3 - 4 Years,4 - 5 Years,5 - 6 Years,6 - 7 Years,7 - 8 Years,8 - 9 Years,9 - 10 Years', 2000, 25, 1),
(18, 'kids', 'Party Kurta', 'Boys Festive & Party Kurta, Waistcoat and Breeches Set', '\r\n1 Kurta, 1 Waistcoat, 1 Breeches\r\nBrand\r\nAJ Dezines\r\nStyle Code\r\n137-RED\r\nSize\r\n8 - 9 Years\r\nBrand Color\r\nRed\r\nIdeal For\r\nBoys\r\nLabel Size\r\n8\r\nType\r\nKurta, Waistcoat and Breeches Set\r\nFabric\r\nPoly Silk\r\nPattern\r\nEmbroidered\r\nSuitable For\r\nWestern Wear\r\nSleeve Type\r\nFull Sleeve\r\nPrimary Color\r\nRed\r\nFabric Care\r\nHand wash\r\nNumber of Sets\r\n1\r\nSecondary Color\r\nBeige\r\nFabric Details\r\nSilk Cotton Blend\r\nYour son will certainly look adorable and super stylish wearing this Red party wear Blue Indo-western set for boys from AJ Dezines. Made from silk cotton blend fabric, this Indo-western set is comfortable to wear and exhibits a fine finish. The fit is regular for boys clothing. Amazingly designed of dress for kids, the boys ethnic wear set comprises Kurta, a classy waistcoat and breeches. The sleeveless jacket makes your boy look all the more stylish. We are leading Brand in kids wear with wide range of kids clothing which includes kids ethnic wear, accessories and a lot more.\r\n', 'k5.jpeg,k5.1.jpeg,k5.2.jpeg,k5.3.jpeg', 'red,black', '1 - 2 Years,1 - 2 Years,2 - 3 Years,3 - 4 Years,4 - 5 Years,5 - 6 Years,6 - 7 Years,7 - 8 Years,8 - 9 Years,9 - 10 Years', 2500, 30, 4),
(19, 'electronics', 'Bluetooth Headset', 'Boult Audio ProBass Curve Neckband Bluetooth Headset ', 'This Boult Bluetooth headset comes with a durable flexi-band and magnetic earbuds. Music at its best, this headset provides you with HDR quality sound output with deep basses and balanced lows and highs. With support for 3D acoustics, this headset has stellar connectivity with a 10-metre range.', 'e1.jpeg,e1.1.jpeg,e1.2.jpeg,e1.3.jpeg,e1.4.jpeg', 'red,blue,yellow', '', 3499, 62, 0),
(20, 'electronics', 'Bluetooth Headset', 'boAt Rockerz 235v2 with ASAP charging Version 5.0 Bluetooth Headset', 'Let music brighten up your mood anytime, anywhere with the boAt 235v2 Fast Charging Bluetooth Headset. This Bluetooth headset features a Call Vibration Alert, a Fast Charging Technology, and Easy Access Controls to listen to and manage your favorite music with ease.', 'e2.jpeg,e2.1.jpeg,e2.2.jpeg,e2.3.jpeg,e2.4.jpeg,e2.5.jpeg,e2.6.jpeg', 'red,blue,yellow,black', '', 2990, 59, 2367),
(21, 'electronics', 'Smartwatch', 'Huami Amazfit Verge Lite Smartwatch', 'Strap the Huami Amazfit Verge Lite smartwatch and power through your day with ease. Its stylish design encompasses a host of features, such as multiple sports modes and an optical sensor to help you keep a check on your heart rate and sleep pattern', 'e3.jpeg,e3.1.jpeg,e3.2.jpeg,e3.3.jpeg', 'Grey,White', '', 8999, 33, 4),
(22, 'electronics', 'Smartwatch', 'Apple Watch Series 3 GPS - 42 mm Space Grey Aluminium Case with Black Sport Band  (Black Strap, Regular)', 'The Apple Watch Series 3 is a sleek accessory that\'s a must-have if you\'re all about staying fit. The watch features an enhanced Heart Rate app, and a built-in altimeter. Also carry and listen to your favourite songs on your wrist. Equipped with Siri, this smartwatch makes being active and staying connected enjoyable.', 'e4.jpeg,e4.1.jpeg,e4.2.jpeg,e4.3.jpeg', 'Black', '', 23990, 4, 3),
(23, 'electronics', 'Iron', 'Nova Plus 1100 w Amaze NI 10 1100 W Dry Iron ', 'Nova presents the Nova Plus 1100 W Amaze NI 10 Dry Iron to ensure that you wear crisp, creaseless, and smooth garments every single day. This essential home appliance features a Non-stick Triple-coated Soleplate, Quick Heat Technology, and a Temperature Adjustment Dial for easy ironing of clothes at your home.', 'e5.jpeg,e5.1.jpeg,e5.2.jpeg,e5.3.jpeg', 'Grey', '', 899, 50, 2),
(25, 'electronics', 'headphone', 'Zebronics Zeb-Thunder Wireless BT Headphone', 'Zebronics Zeb-Thunder Wireless BT Headphone Comes with 40mm Drivers, AUX Connectivity, Built in FM, Call Function, 9Hrs* Playback time and Supports Micro SD Card (Red)', '1616786655_img1.jpg,1616786655_img2.jpg,1616786655_img3.jpg', 'red,blue', '', 781, 10, 3),
(30, 'electronics', 'Refrigerator', 'Samsung 192 L 2 Star', 'Samsung 192 L 2 Star Direct Cool Single Door Refrigerator (RR19A241BGS/NL, Gray Silver)', '1618939370_img1.jpg,1618939370_img2.jpg,1618939370_img3.jpg,1618939370_img4.jpg,1618939370_img5.jpg', '', '', 12090, 5, 3),
(31, 'electronics', 'Refrigerator', 'Whirlpool 190 L 3 Star', 'Whirlpool 190 L 3 Star Direct-Cool Single Door Refrigerator (WDE 205 CLS 3S, Blue)', '1618939606_img1.jpg,1618939606_img2.jpg,1618939606_img3.jpg,1618939606_img4.jpg', '', '', 12290, 10, 3),
(32, 'electronics', 'Refrigerator', 'LG 260 L 3 Star', 'LG 260 L 3 Star Frost Free Double Door Refrigerator (GL-I292RPZL, Shiny Steel, Smart Inverter Compressor)', '1618939782_img1.jpg,1618939782_img2.jpg,1618939782_img3.jpg,1618939782_img4.jpg,1618939782_img5.jpg', '', '', 26950, 12, 3),
(33, 'electronics', 'Refrigerator', 'Haier 195 L 4 Star', 'Haier 195 L 4 Star Direct-Cool Single-Door Refrigerator (HED- 20CFDS, Dazzle Steel)', '1618939957_img1.jpg,1618939957_img2.jpg,1618939957_img3.jpg,1618939957_img4.jpg', '', '', 13440, 5, 3),
(34, 'electronics', 'Refrigerator', 'Samsung 198 L 5 Star', 'Samsung 198 L 5 Star Inverter Direct-Cool Single Door Refrigerator (RR21T2G2WCR/HL, Camellia Purple)', '1618940091_img1.jpg,1618940091_img2.jpg,1618940091_img3.jpg', '', '', 16590, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `shop_name`, `owner`, `seller_email`, `seller_phone`, `seller_password`, `seller_address`, `seller_city`, `seller_state`, `seller_pincode`) VALUES
(1, 'Readymade House', 'P. Deverakonda', 'readymadehouse@gmail.com', '9115486817', 'Readymade@123', 'Pilibhit', 'Bareliye', 'Uttar Pradesh', '234568'),
(2, 'Mordern Dresses', 'NA', 'morderndresses@gmail.com', '9760800504', 'Mordern@123', '', '', '', ''),
(3, 'Abhay shop', 'Abhay', 'abhay.jnv11@gmail.com', '9841677419', 'A@11111111', 'arwal', 'patna', 'Bihar', '804419'),
(4, 'Pd house', 'NA', 'pdhouse@gmail.com', '9115486817', 'Saurabh@123', 'NA', 'NA', 'NA', 'NA'),
(5, 'IT Communication', 'NA', 'itcommunication@gmail.com', '7839476468', 'Itcommunication@123', 'NA', 'NA', 'NA', 'NA'),
(6, 'pdshop', 'NA', 'pd123@gmail.com', '9115486852', 'pd@12345678', 'NA', 'NA', 'NA', 'NA'),
(7, 'myshop', 'NA', '498rish@gmail.com', '9026514108', 'Rish@123', 'NA', 'NA', 'NA', 'NA'),
(8, 'HumaraDukan', 'NA', 'viraj123@gmail.com', '9115486811', 'Prabhakar@123', 'Bareilly', 'Pilibhit', 'UP', '262122');

-- --------------------------------------------------------

--
-- Table structure for table `seller_feedbacks`
--

CREATE TABLE `seller_feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `feedback` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller_feedbacks`
--

INSERT INTO `seller_feedbacks` (`feedback_id`, `seller_id`, `feedback`) VALUES
(1, 1, 'Before registering my shop on E-bazar, I merely sell 1 or 2 products per day but after REGISTERING ON E-BAZAR, my daily sell has increased significantly.'),
(2, 2, 'Selling products has been redefined through E-BAZAR. Customers are diverse we are glad to serve them.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_pass`, `active_status`) VALUES
(1, 'Prabhakar2', '9115486817', 'prabhakar@gmail.com', 'prabhakar', 1),
(2, 'Viraj', '8360886817', 'viraj@gmail.com', 'viraj', 1),
(3, 'Pd', '9115486818', 'pd@gmail.com', 'pd', 1),
(5, 'Saurabh Kumar', '7905966858', 'saurabhanshraj@gmail.com', 'Saurabh@123', 1),
(13, 'gajru', '9867567897', 'gajru@gmail.com', 'Saurabh@123', 1),
(14, 'Rajat1', '9115486825', 'rajat@gmail.com', 'Rajat@123', 1),
(15, 'abhay', '9801677419', 'abhay.jnv11@gmail.com', 'A@11111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(50) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `buyer_number` varchar(50) NOT NULL,
  `buyer_town` varchar(50) NOT NULL,
  `buyer_state` varchar(50) NOT NULL,
  `buyer_pin` varchar(50) NOT NULL,
  `buyer_locality` varchar(50) NOT NULL,
  `buyer_address` text NOT NULL,
  `address_type` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `buyer_name`, `buyer_number`, `buyer_town`, `buyer_state`, `buyer_pin`, `buyer_locality`, `buyer_address`, `address_type`, `user_id`) VALUES
(1, 'Prabhakar', '8638952652', 'Bareilly', 'Uttar Pradesh', '262122', 'Bareilly', 'Near Bus Stand', 'Home', 1),
(2, 'Viraj', '9115486817', 'Pilibhit', 'Uttar Pradesh', '262120', 'Puranpur', 'Moh Kayasthan ', 'Home', 1),
(3, 'user', '9536845287', 'Bareilly', 'Uttar Pradesh', '263514', 'Bareilly', 'Satelight', 'Work', 4),
(4, 'Rajat', '9115486847', 'Delhi', 'Delhi', '262154', 'Delhi', 'delhi', 'Home', 14),
(5, 'Viraj', '9115486817', 'Pilibhit', 'Uttar Pradesh', '262120', 'Bareilly', 'Moh Kayasthan', 'Home', 2),
(6, 'Saurabh kumar', '7905966858', 'Ballia', 'Uttar pradesh', '277208', 'Raniganj', 'Raniganj bazar ballia', 'Home', 5),
(7, 'abhay ', '9801677419', 'arwal', 'Bihar', '804419', 'arwal', 'arwal ', 'Home', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `address_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `address_id`, `product_id`, `payment_method`, `order_date`) VALUES
(1, 1, 1, 8, 'Cash On Delivery', '2022-03-21'),
(2, 4, 3, 9, 'Cash On Delivery', '2023-03-21'),
(3, 4, 3, 1, 'Cash On Delivery', '2023-03-21'),
(4, 4, 3, 11, 'Cash On Delivery', '2023-03-21'),
(5, 1, 1, 4, 'Cash On Delivery', '2023-03-21'),
(6, 1, 1, 8, 'Cash On Delivery', '2021-05-21'),
(7, 14, 4, 1, 'Cash On Delivery', '2026-05-21'),
(8, 15, 7, 21, 'Cash On Delivery', '2004-06-21'),
(9, 15, 7, 19, 'Cash On Delivery', '2004-06-21'),
(10, 1, 1, 15, 'Cash On Delivery', '2011-07-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer_feedbacks`
--
ALTER TABLE `customer_feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `seller_feedbacks`
--
ALTER TABLE `seller_feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_feedbacks`
--
ALTER TABLE `customer_feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller_feedbacks`
--
ALTER TABLE `seller_feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_feedbacks`
--
ALTER TABLE `customer_feedbacks`
  ADD CONSTRAINT `customer_feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `customer_feedbacks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `seller_feedbacks`
--
ALTER TABLE `seller_feedbacks`
  ADD CONSTRAINT `seller_feedbacks_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
