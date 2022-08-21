-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 09:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclerent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$IdRe5PrI4IoK8d.lQoUFzuENfJ1GrShInbnJsBcwI9/BQtCbq8.oq', NULL, '2022-08-21 00:31:27', '2022-08-21 00:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Bid` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `bookingNumber` int(11) NOT NULL,
  `vehicleId` bigint(20) UNSIGNED NOT NULL,
  `Uid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Bid`, `email`, `FromDate`, `ToDate`, `message`, `status`, `bookingNumber`, `vehicleId`, `Uid`, `created_at`, `updated_at`) VALUES
(1, NULL, '2022-08-05', '2022-08-12', 'wgsdg', 1, 299119065, 7, 1, '2022-08-21 01:32:15', '2022-08-21 01:33:51'),
(2, NULL, '2022-08-19', '2022-08-22', 'lhohl', 0, 593509682, 7, 1, '2022-08-21 01:32:35', '2022-08-21 01:32:35'),
(3, NULL, '2022-08-11', '2022-08-20', 'adfaf', 1, 159791525, 9, 1, '2022-08-21 01:32:50', '2022-08-21 01:34:10'),
(4, NULL, '2022-08-01', '2022-08-05', 'afaf', 0, 975985950, 5, 1, '2022-08-21 01:33:13', '2022-08-21 01:33:13'),
(5, NULL, '2022-08-13', '2022-08-17', 'aafafa', 2, 238543166, 3, 1, '2022-08-21 01:33:29', '2022-08-21 01:34:28'),
(6, NULL, '2022-08-05', '2022-08-20', 'aasdasd', 1, 519975912, 4, 1, '2022-08-21 01:35:10', '2022-08-21 01:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Vtype` int(11) NOT NULL,
  `Bname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `Vtype`, `Bname`, `created_at`, `updated_at`) VALUES
(1, 2, 'HONDA', NULL, NULL),
(3, 2, 'Bajaj', NULL, NULL),
(4, 2, 'suzuki', NULL, NULL),
(5, 2, 'YAMAHA', NULL, NULL),
(6, 4, 'Mahindra', NULL, NULL),
(7, 4, 'Maruti', NULL, NULL),
(8, 4, 'Hyundai', NULL, NULL),
(9, 4, 'Volvo', NULL, '2022-08-21 01:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_03_16_140936_create_admins_table', 1),
(16, '2022_03_30_105715_create_brands_table', 1),
(17, '2022_04_13_152315_create_vehicles_table', 1),
(18, '2022_05_28_045926_create_bookings_table', 1),
(19, '2022_06_04_061803_create_notifications_table', 1),
(20, '2022_06_19_080946_create_ranks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('10f28f4e-f04b-45c2-a69c-bf544fe6ac75', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"name\":\"user\",\"status\":\"Your Request Have been Approved\"}', '2022-08-21 01:34:42', '2022-08-21 01:33:52', '2022-08-21 01:34:42'),
('18aee18a-8cad-4920-856c-29b113080531', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"name\":\"user\",\"status\":\"Your Request Have been Declined\"}', '2022-08-21 01:34:42', '2022-08-21 01:34:28', '2022-08-21 01:34:42'),
('2f97d0eb-bb05-428b-9a97-a7680ff9bee8', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"name\":\"user\",\"status\":\"Your Request Have been Approved\"}', '2022-08-21 01:34:42', '2022-08-21 01:34:10', '2022-08-21 01:34:42'),
('b2048030-4a73-4ebd-a1a4-a9c2602e4b44', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"name\":\"user\",\"status\":\"Your Request Have been Approved\"}', NULL, '2022-08-21 01:35:19', '2022-08-21 01:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `Rid` bigint(20) UNSIGNED NOT NULL,
  `Vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`Rid`, `Vehicle_id`, `rank`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2022-08-21 01:33:51', '2022-08-21 01:33:51'),
(2, 9, 1, '2022-08-21 01:34:10', '2022-08-21 01:34:10'),
(3, 4, 1, '2022-08-21 01:35:19', '2022-08-21 01:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', 'Bhadrapur-6', '9806097599', NULL, '$2y$10$n06zT2FvmNzq.2ChSup1/uXs6i315uI8pMP98z6tGD7sYelGyBZmi', NULL, '2022-08-20 23:56:35', '2022-08-20 23:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `Vid` bigint(20) UNSIGNED NOT NULL,
  `Vtype` int(11) NOT NULL,
  `Brand` bigint(20) UNSIGNED NOT NULL,
  `Vname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fuel` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Overview` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`Vid`, `Vtype`, `Brand`, `Vname`, `Model`, `Vno`, `Fuel`, `Capacity`, `Rate`, `Overview`, `img1`, `img2`, `img3`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'HONDA GRAZIA 125 BS6', '2020', '258963', 'Petrol', 2, 2500, 'With a stunningly bold design and incredibly intelligent features, its time for you to experience the best of both worlds. The all-new Honda Grazia 125 is a looker with brains and is styled for those who like to always stay ahead in life.', 'grazia-matte-axis-grey-metallic-500x500.png', 'grazia-matte-axis-grey-metallic-500x500.png', 'grazia-matte-axis-grey-metallic-500x500.png', '2022-08-21 00:42:07', '2022-08-21 00:42:07'),
(2, 2, 3, 'Discover 125 st', '2019', '147852', 'Petrol', 2, 2000, 'Discover 125 st is a single bike where you can find everything from beautiful design to cutting edge technology and to thrill of riding. The super-sporty Nitrox Monoshock is something to look for in Discover 125 st. It provides a petal disc brake in the bike which ensures safety by providing better brake cooling and less brake fade.', 'discover-125-st-500x500.jpg', 'discover-125-st-500x500.jpg', 'discover-125-st-500x500.jpg', '2022-08-21 01:02:50', '2022-08-21 01:02:50'),
(3, 2, 1, 'HONDA ACTIVA 110CC', '2021', '258963', 'Petrol', 2, 3000, 'Vehicle Model	HONDA ACTIVA 110CC\r\nColor	White\r\nEngine Type	110CC\r\nStarting Method	SELF START\r\nBRAKE	DRUM BRAKE\r\nBrand	HONDA\r\nMinimum Order Quantity	24', 'activa-110cc-500x500.png', 'activa-110cc-500x500.png', 'activa-110cc-500x500.png', '2022-08-21 01:04:52', '2022-08-21 01:04:52'),
(4, 2, 5, 'Black YAMAHA FZ25, 249cc', '2019', '321654', 'Petrol', 2, 2500, 'The design emphasizes both the senses of forward mass layout and downforce, evoking the powerful muscles of an athlete. This newly launched street model delivers riding enjoyment as well as excellent fuel efficiency and environmental performance.\r\n\r\n\r\nUnique Selling Points\r\n250cc AIR COOLED ENGINE\r\nMONOSHOCK SUSPENSION\r\nLED HEAD LAMP', 'yamaha-fz25-500x500.jpg', 'yamaha-fz25-500x500.jpg', 'yamaha-fz25-500x500.jpg', '2022-08-21 01:07:17', '2022-08-21 01:07:17'),
(5, 2, 5, 'Yamaha FZS', '2020', '741258', 'Petrol', 2, 3000, 'The Yamaha FZS measures of 153cc and it has a 4 stroke engine with 2 valves and single cylinder. It has an elongated fender which prevents mud and grime from being deposited on the tyres and the rear grab bar is there to provide back support to the pillion as well as act as something to hold on to for the pillion. The mono cross suspension allows a wheel travel of 120mm and the graphics on the bike are vivid. It is very much in the league of the Yamaha bikes.', 'yamaha-fzs-250x250.jpg', 'yamaha-fzs-250x250.jpg', 'yamaha-fzs-250x250.jpg', '2022-08-21 01:08:58', '2022-08-21 01:08:58'),
(6, 4, 6, 'Mahindra Scorpio Classic', '2021', '258963', 'Diesel', 8, 8000, 'The Mahindra Scorpio Classic SUV has been launched in India starting at Rs 11.99 lakh (ex-showroom). It\'s a facelifted version of the older generation Scorpio and comes with all-around improvements and new features.\r\n\r\nIt\'ll slot below the new-generation Scorpio N SUV in Mahindra\'s lineup.\r\n\r\nMahindra Scorpio Classic Engine\r\nThe Scorpio Classic is equipped with Mahindra\'s latest all-aluminium mHawk diesel engine. The 2.2-litre unit produces 132PS and 300Nm in the SUV and is paired with a 6-speed manual gearbox as standard. Automatic and 4x4 options are no longer offered on the Scorpio Classic.\r\nMahindra Scorpio Classic Variants\r\nThe Scorpio Classic is offered in two variants, base-spec Classic S and fully loaded Classic S 11.\r\n\r\nMahindra Scorpio Classic Features\r\nThe Scorpio Classic offers equipment such as a 9-inch infotainment screen with Android Auto and Apple CarPlay, automatic climate control, cruise control and reversing camera. On the safety front, it gets dual front airbags, parking sensors and ABS.\r\nMahindra Scorpio Classic Competitors\r\nThe Scorpio Classic goes up against the Kia Seltos, Hyundai Creta, Tata Harrier and Skoda Kushaq.', 'scorpio-classic_600x400.webp', 'scorpio-classic_600x400.webp', 'scorpio-classic_600x400.webp', '2022-08-21 01:12:22', '2022-08-21 01:12:22'),
(7, 4, 7, 'Maruti Alto K10', '2020', '123987', 'Petrol', 6, 8500, 'Maruti has launched the new Alto K10 with prices starting from Rs 4 lakh. It slots above the existing model, which will be sold alongside the new Alto K10, but with a new moniker- Alto 800.\r\n\r\nMaruti Alto K10 Engine\r\nPropulsion duties are carried out by a (67PS/89Nm) 1-litre DualJet petrol engine, paired to a standard 5-speed manual and a 5-speed AMT. It has a claimed fuel efficiency of 24.39kmpl with the manual, while it claims to return 24.90kmpl when paired to the automatic unit. The hatchback is 3530mm long, 1490mm wide and 1520mm tall. It has a wheelbase of 2380mm and a boot space of 214 litres.\r\nMaruti Alto K10 Variants\r\nThere are four trim options available: Std(O), LXi, VXi, and VXi+.\r\n\r\nYou can spec the hatchback in six colour hues: Solid White, Metallic Silky Silver, Metallic Granite Grey, Metallic Sizzling Red, Pearl Metallic Earth Gold and Metallic Speedy Blue\r\n\r\n\r\nMaruti Alto K10 Features\r\nIts features list includes a 7-inch infotainment system, steering mounted audio and calling controls, manual AC, keyless entry, power-adjustable ORVMs, and a 4-speaker sound system. Passenger safety is ensured by dual front airbags, ABS with EBD, and rear parking sensors.\r\nMaruti Alto K10 Competitors\r\nThe Maruti Alto K10 takes on the Renault Kwid.', 'maruti_suzuki_alto_k10_600x400.webp', 'maruti_suzuki_alto_k10_600x400.webp', 'maruti_suzuki_alto_k10_600x400.webp', '2022-08-21 01:15:11', '2022-08-21 01:15:11'),
(8, 4, 8, 'Hyundai Tucson 2022', '2022', '74128', 'Petrol', 5, 7000, 'Tucson price starts from Rs. 27.69 Lakh (ex-showroom Delhi). Tucson 2022 comes in 8 variants with 7 colour options. The price of Tucson petrol models ranges between Rs. 27.69 Lakh to Rs. 30.32 Lakh while the price of Tucson diesel models start at Rs. 30.19 Lakh and the top diesel model is priced at Rs. 34.54 Lakh.', 'hyundai-tucson-2022_600x400.webp', 'hyundai-tucson-2022_600x400.webp', 'hyundai-tucson-2022_600x400.webp', '2022-08-21 01:17:26', '2022-08-21 01:17:26'),
(9, 4, 9, 'Volvo XC40', '2022', '852369', 'Electric', 5, 9000, 'The Volvo XC40 Recharge has been launched in India at Rs 55.90 lakh (ex-showroom). It\'s the first locally assembled global EV in India, and it\'s sold exclusively on the carmaker\'s online platform.\r\n\r\nThe XC40 Recharge is powered by a 78kWh battery with a claimed range of 418km. It\'s available in a single top-spec variant fully loaded with the top-spec features, including advanced driver assistance systems (ADAS).\r\n\r\nVolvo XC40 Recharge Engine\r\nThe XC40 Recharge is powered by a 78kWh battery paired with a dual-motor all-wheel-drive(AWD) setup that produces 408PS of power and 660Nm of torque. It offers a WLTP-claimed (World harmonized Light-duty vehicles Test Procedure) range of 419km. The SUV is capable of fast-charging from 0 to 80 per cent in 40 minutes when plugged into a 150kW fast charger.\r\nVolvo XC40 Recharge Range\r\nXC40 Recharge can go upto 418 after a full charge.\r\nVolvo XC40 Recharge Charging Time\r\nUsing an 11kW AC charger, the XC40 Recharge can do a 0-100 per cent charge in around 8-10 hours. A 150kW DC fast charger takes 40 minutes to do a 0-80 per cent charge.\r\nVolvo XC40 Recharge Variants\r\nThe XC40 Recharge is offered in one fully-loaded variant, so every feature in the list comes as standard. It\'s available in Crystal White, Thunder Grey, Fjord Blue, Onyx Black and Sage Green paint shades.\r\n\r\nVolvo XC40 Recharge Features\r\nIf you’re one of the wealthy younglings in the market for a luxury SUV, we’d bet you’d want something unique. That begins with the platform of the XC40. This SUV is the first model ever to be based on Volvo’s Compact Modular Architecture or CMA. That aside, the design does have distinctive Volvo elements like the concave front grille and “Thor’s Hammer” DRLs but the latter gets its own little styling tweak. The profile doesn\'t look like any other Volvo either. The short and stout stance, flat bonnet and squared off pillars make the look, say SUV, not crossover, which automatically gives it a distinctive allure. It even sits tall on a cool set of 18-inch alloy wheels and offers a full 211mm of ground clearance.\r\n\r\nFor an SUV targeted towards new and millennial luxury car buyers, the driving position has some old-school charm. You do sit perched up while overlooking the bonnet, so this certainly won\'t give you the hatchback-on-tippy-toes vibe. Fit and finish quality is appreciable too, and feels premium, especially because of the Alcantara + faux leather-draped seats. But Volvo has made some minor concessions for costs. The plastic quality, for example, isn\'t as rich as it is in larger Volvos. The features list is long though. The 9-inch touchscreen has been carried over from big Volvos and includes Apple CarPlay and Android Auto. Safety features like the lane-keeping aid, radar-guided cruise control, hill start and hill descent control, and park pilot assist all come as standard. Other features include 2-zone climate control with rear AC vents, heated front and rear seats, an inductive phone charger, a panoramic sunroof and a 13-speaker Harman Kardon sound system.\r\nVolvo XC40 Recharge Competitors\r\nKia EV6: The Kia EV6 is the XC40 Recharge\'s key electric rival. It has a low, wide stance and can be had in rear-wheel drive and all-wheel drive variants.', 'xc40-recharge-3_600x400.webp', 'xc40-recharge-3_600x400.webp', 'xc40-recharge-3_600x400.webp', '2022-08-21 01:20:30', '2022-08-21 01:20:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Bid`),
  ADD UNIQUE KEY `bookings_email_unique` (`email`),
  ADD KEY `bookings_vehicleid_foreign` (`vehicleId`),
  ADD KEY `bookings_uid_foreign` (`Uid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`Rid`),
  ADD KEY `ranks_vehicle_id_foreign` (`Vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`Vid`),
  ADD KEY `vehicles_brand_foreign` (`Brand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Bid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `Rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `Vid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_uid_foreign` FOREIGN KEY (`Uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_vehicleid_foreign` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`Vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ranks`
--
ALTER TABLE `ranks`
  ADD CONSTRAINT `ranks_vehicle_id_foreign` FOREIGN KEY (`Vehicle_id`) REFERENCES `vehicles` (`Vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_brand_foreign` FOREIGN KEY (`Brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
