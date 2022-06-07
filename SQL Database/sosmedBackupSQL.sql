-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14271558_uas_online`
--
CREATE DATABASE IF NOT EXISTS `id14271558_uas_online` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `id14271558_uas_online`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nama` mediumtext NOT NULL,
  `username` mediumtext NOT NULL,
  `profile-picture` mediumtext NOT NULL,
  `comment` mediumtext NOT NULL,
  `gambar` mediumtext NOT NULL,
  `code` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `nama`, `username`, `profile-picture`, `comment`, `gambar`, `code`) VALUES
(2, 'Akun User (Developer)', 'user123', 'app_icon.png', 'Headset buat mimin biar makin semangat buat kembangin web ini', '5f1fe8a697a29.jpg', 'GeLE4N0C1nznmGCBDbky'),
(3, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg', 'Hallo Ryan', '', 'x3GayZVkhs8FHhqafv3Q'),
(4, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg', '', '5f1ff77bb7327.jpg', 'x3GayZVkhs8FHhqafv3Q'),
(5, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg', 'Bruh', '5f2002fcb8c8f.jpeg', 'x8fptPVXh6aNfm9dBne9'),
(6, 'Tes aja', 'tes123', 'app_icon.png', 'Lumayan ah gan', '', 'HMvnqsPWigjiqWEnJGI5'),
(7, 'Maulalwi', 'maulalwi', 'app_icon.png', 'Mantap min ', '', 'GeLE4N0C1nznmGCBDbky'),
(8, 'stevanus', 'stevanusidea', 'app_icon.png', 'oke', '', 'HMvnqsPWigjiqWEnJGI5'),
(9, 'nicky', 'nickynicky11', 'app_icon.png', 'mantaff minnn semoga lancar jayaaa', '', 'GeLE4N0C1nznmGCBDbky'),
(10, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'Haloo Sobb ', '', '9EPSvSnfdB0GQ0VaBXsN'),
(11, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'Thankyou broo ajak teman mu juga yaa', '', 'B0Mv43Jf1pHeMofupe9U'),
(12, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', '@Stevanus &amp; @Tes aja gw dah Bikin versi Web nya cmn gk sesuai sama Ekspektasi wkwkk', '', 'HMvnqsPWigjiqWEnJGI5'),
(13, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'Kasarr Gambar sape itu wkwk ', '', 'bJCV3aqTQx4UfEI2L1h2'),
(14, 'stevanus ide anggitya', 'stevanusidea', '5f2247fe115e5.jpg', 'gambar siapa ya akwokeoe', '', 'bJCV3aqTQx4UfEI2L1h2'),
(16, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'Accept your Challange', '5f224aa30af07.jpeg', 'LgY9LG3AQ46pStaEKP36'),
(19, 'DeadlyShooter', 'deadlyshooter', '5f22518e25f93.png', 'Good bro', '', 'pIm7cZWUY50GbnqqlaRJ'),
(21, 'najibz', 'nen', 'app_icon.png', 'kaga keliatan', '', 'HMvnqsPWigjiqWEnJGI5'),
(22, 'User Administrator Management', 'useradmin', 'app_icon.png', 'apaan ini anjing', '', 'zuZPV7PN849iuTES8JPQ'),
(23, 'User Administrator Management', 'useradmin', 'app_icon.png', 'woey kontol bagi link\r\n', '', '6K4WVc4ouVOq65YO68kU'),
(24, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'awkakkaw iya anjir ', '', 'OINBgjWL6a24x2dAUMGF'),
(25, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'flip edition', '614c85090713a.jpg', 'OINBgjWL6a24x2dAUMGF'),
(27, 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'awkwkwkakw TOLOL :v ', '6158637708387.png', 'DULntCIRUoLL2nDKr8Wb'),
(28, 'Samid', 'samid21', '615862d30c4db.jpg', 'Wedus', '', 'DULntCIRUoLL2nDKr8Wb'),
(29, 'Samid', 'samid21', '615862d30c4db.jpg', 'Helo', '', '9EPSvSnfdB0GQ0VaBXsN'),
(30, 'Memek', 'memek', 'app_icon.png', 'Kualitas gambarnya bang', '', 'Pn6TxWews8X6xzGgzySl'),
(31, 'Memek', 'memek', 'app_icon.png', 'Scroll di hp gua ga smooth', '', 'Pn6TxWews8X6xzGgzySl');

-- --------------------------------------------------------

--
-- Table structure for table `lupa`
--

CREATE TABLE `lupa` (
  `id` int(11) NOT NULL,
  `nama` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `akun_lupa` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lupa`
--

INSERT INTO `lupa` (`id`, `nama`, `email`, `akun_lupa`) VALUES
(1, 'stevanus', 'stevanussia@gmail.com', 'stevanus24'),
(2, 'Satria', 'supermansakau@gmail.com', 'Satria18');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `post` mediumtext NOT NULL,
  `gambar` varchar(10000) NOT NULL,
  `nama` mediumtext NOT NULL,
  `username` mediumtext NOT NULL,
  `profile-picture` varchar(1000) NOT NULL,
  `code` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `post`, `gambar`, `nama`, `username`, `profile-picture`, `code`) VALUES
(1, 'Postingan Pertama.. Tampilan UI untuk aplikasi musik player Saya... gimana menurut kalian ??', '5f1fe7a4c8a91.png', 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg', 'HMvnqsPWigjiqWEnJGI5'),
(3, 'Halo Semua.. SELAMAT DATANG DI SOSIAL MEDIA PERTAMA SAYA.... Developer saya Sendiri Muhamad Ferdiansyah dan baru kuliah semester 2 (Mau naik ke 3 tinggal nunggu nilai). Saya harap kalian suka dengan apa yang saya ciptakan saat ini maaf kalau untuk kompresi gambar nya gk sebagus IG FB dll nya... dan oh iya Untuk login saya sarankan jangan menggunakan data yang sama dengan data akun kalian yang lain ya seperti GOOGLE, APPLE ID, FACEBOOK dll nya... Happy gibah silahkan ramaikann ^_^ /', '', 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg', 'GeLE4N0C1nznmGCBDbky'),
(4, 'Hallo semua.. saya user account.. saya hanya sebagai akun uji coba aja disini antara Master Admin, Admin, dan User tersendiri... oh iya Keep Washing Hand yaa', '', 'Akun User (Developer)', 'user123', 'app_icon.png', '2VjAj4AvXs1qRivYAtO4'),
(5, 'Hallo Semua,, saya User Database,, dimana saya yang akan mengatur setiap user yang ada disini (Master Admin),, jadi jika kalian menemukan adanya user yang menakutkan dan mencurigakan silahkan di masukin aja data di From Lupa Password saat kalian mau login hanya itu aja sih sementara untuk membuat laporan.. nanti akan kami kembangkan lagi jika ramai', '5f1fe97255b10.jpg', 'User Administrator Management', 'useradmin', 'app_icon.png', 's4ZUnb4o5i7BksDNBMdM'),
(6, 'Test check', '', 'Ryan', 'ryan', 'app_icon.png', 'x3GayZVkhs8FHhqafv3Q'),
(7, 'P', '5f1ffa9468314.jpg', 'TDR-3000', 'rasyiedfahmi', 'app_icon.png', 'x8fptPVXh6aNfm9dBne9'),
(8, 'Mantap gan... ', '', 'Maulalwi', 'maulalwi', 'app_icon.png', 'B0Mv43Jf1pHeMofupe9U'),
(10, 'Maaf Ya Buat kemaren yg udah login tapi malah gk bisa.. jadi kemarin sekitar 3 Hari gw nambahin fitur baru yaitu Account Profile dan beberapa perbaikan... Buat sekarang Kalian bisa pake lagi website nya dan semoga kalian suka ^_^', '5f21b089bb779.jpg', 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'ttS65gHYzFSP7D6kLk8O'),
(12, 'hallo ges salam kenal semua :)', '', 'nicky', 'nickynicky11', 'app_icon.png', '9EPSvSnfdB0GQ0VaBXsN'),
(13, 'Kira Kira apa yang kurang dari web ini ??? Kirim Saran Kalian di Comment ya biar Adminnya ngeliat ', '', 'Antivirus Corona', 'ferdiadit72', '5f223b381dedc.jpeg', 'Pn6TxWews8X6xzGgzySl'),
(14, 'no copyright png akwkwwo', '5f22491450c44.png', 'stevanus ide anggitya', 'stevanusidea', '5f2247fe115e5.jpg', 'bJCV3aqTQx4UfEI2L1h2'),
(15, 'Lo gabut?\r\nDi rumah kerjaan nya maen hp trooss?\r\nMending join2 lah ama kita di challenge gambar digital.\r\nAnda dapat berkreasi sesuka hati dengan menggambarkan imajinasi liar anda :)\r\nBtw karya2 kalian paling lambat dikumpulin tanggal 29 pukul 23.59\r\nlink \r\nhttps://bit.ly/2D2c4xX\r\n# rebahan sambil berkarya \r\nTTD: \r\nStevanus ide anggitya :) \r\n\r\nGw Accept Tantangan dia.. Gambar gw ada di Comment', '5f224a42c4846.jpeg', 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'LgY9LG3AQ46pStaEKP36'),
(18, 'Deadly Shooter ID (PUBG)', '5f22531a8f601.png', 'DeadlyShooter', 'deadlyshooter', '5f22518e25f93.png', 'pIm7cZWUY50GbnqqlaRJ'),
(20, 'Bladient iOS13', '5f2301387ae0c.png', 'Muhamad Ferdiansyah', 'ferdiadit12', '5f202477543ca.jpg\r\n', 'D0KTJFlLEAQkl266vE7K'),
(25, 'lagi rame kyk ginian ya angab ragil ?', '614c84dfa81ad.jpg', 'Admin Management System', 'useradmin', 'app_icon.png', 'OINBgjWL6a24x2dAUMGF'),
(28, 'Keren mantul', '', 'Bamg Ganteng', 'bangganteng_456', 'app_icon.png', 'qvw3wwlSeK2FQqFTEAvO'),
(33, 'hellow gess', '', 'New Muhamad Ferdiansyah', 'ferdimoci', '6161fc6f72f16.jpg', '9CaMW9XFmlnH8GZChWwe');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `profile-picture` mediumtext NOT NULL,
  `hoby` varchar(1000) NOT NULL,
  `City` varchar(1000) NOT NULL,
  `born` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `profile-picture`, `hoby`, `City`, `born`) VALUES
(67, 'Muhamad Ferdiansyah', 'ferdiadit12', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'user', '5f202477543ca.jpg\r\n', 'Art, Design, Programming', 'Jakarta, Indonesia', 'Dec, 22 2000'),
(69, 'Akun User (Developer)', 'user123', 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', 'user', 'app_icon.png', '', '', ''),
(109, 'Ferdi', 'ferdi123', '5a9a19e5efde037419c017bdf095ea54712376c4f750be668844f41e02971caf', 'user', '6186998007b53.jpg', 'Football', 'JAKARTA, Indonesia', 'Nov 10, 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lupa`
--
ALTER TABLE `lupa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lupa`
--
ALTER TABLE `lupa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"id14271558_uas_online\",\"table\":\"posting\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-12-20 14:35:52', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
