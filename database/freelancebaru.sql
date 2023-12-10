-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 02:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancebaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `meta_field` text,
  `meta_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`meta_field`, `meta_value`) VALUES
('mobile', '0123456789'),
('email', 'info@sampple.com'),
('facebook', 'https://facebook.com/profile'),
('twitter', ''),
('linkin', ''),
('address', 'Sample Address, Sample, Sample, 12345');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(30) NOT NULL,
  `school` text,
  `degree` text,
  `month` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `description` text,
  `order_by` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `degree`, `month`, `year`, `description`, `order_by`) VALUES
(1, 'Sample School', 'Sample', 'April', 2017, '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"><span style=\"font-weight: bolder;\">Lorem ipsum dolor sit amet,</span> consectetur adipiscing elit. Quisque malesuada, odio ullamcorper ornare pellentesque, orci quam consectetur urna, sed fringilla nunc lorem lacinia quam. Ut pellentesque luctus mi vitae vestibulum. Vivamus scelerisque congue turpis, vel rutrum felis ultricies ac. Duis vitae ligula pellentesque erat fermentum mattis. Ut fringilla blandit est sit amet malesuada. Mauris ultrices interdum tellus nec tincidunt. Nulla malesuada sem lorem. Pellentesque blandit augue eu mi iaculis faucibus. Vestibulum in nisl at turpis bibendum efficitur. Integer dapibus volutpat nisl eget lobortis. Nam sit amet scelerisque felis. Praesent euismod quis eros et facilisis. Vivamus vitae nibh vitae nunc dapibus placerat. Duis ac accumsan enim, at semper tortor. Nunc aliquet augue eu diam semper sodales. Maecenas pulvinar dignissim ex, vel lacinia massa consectetur ut.</span></p><p><br></p>', 0),
(2, 'School 2', 'Degree 2', 'March', 2018, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sed dui diam, aliquet vel porttitor non, placerat vitae ligula. Donec ut neque at massa accumsan volutpat vitae vitae augue. Morbi dapibus finibus nulla, vitae ultricies lectus iaculis vitae. Morbi maximus vel justo ut consequat. Fusce ut ex feugiat, pulvinar velit sit amet, cursus lorem. Aliquam ullamcorper tempor commodo. Etiam faucibus diam sed arcu vehicula, blandit accumsan nulla placerat.</span><br></p>', 0),
(3, 'Sample School 33', 'Degree 3', 'April', 2019, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Etiam viverra sem sit amet dapibus imperdiet. Integer vitae eros ex. Cras ac nunc eleifend, malesuada ligula iaculis, posuere massa. Donec congue tincidunt vehicula. Pellentesque in sem est. Cras venenatis eros eget ipsum blandit, et vulputate ipsum rhoncus. Donec euismod non lacus eu venenatis. Nam magna velit, fringilla sed commodo non, accumsan at elit. Suspendisse sagittis purus ex, sit amet mollis sem vehicula vitae. Vivamus consectetur faucibus libero, efficitur feugiat nibh tempus sed.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 0),
(4, 'sv', 'sv', 'January', 2023, '&lt;p&gt;sv&lt;/p&gt;', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id`, `nama`, `komen`) VALUES
(2, 'kimiwa', 'Kemampuan orang ini untuk mengatasi tantangan dan memberikan solusi yang efektif\r\n                  '),
(3, 'koko', 'Pilihan orang yang tepat untuk proyek ini! Kreativitas dan inovasinya benar-benar                                     membuat hasilnya berbeda dan menonjol.'),
(4, 'afasfdasdf', 'asdfasfasddaf'),
(5, 'sdfdsf', 'dsfdsfd'),
(6, 'rere', 'Setelah memahami apa itu teks secara umum, tentu saja Anda juga harus mengerti dan memahami mengenai apa saja jenis teks yang ada.Di bawah ini akan dijelaskan secara detail mengenai jenis teks sebagai berikut :');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(30) NOT NULL,
  `name` text,
  `summary` text,
  `description` text,
  `banner` text,
  `client` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `summary`, `description`, `banner`, `client`) VALUES
(27, 'as', '', '', 'uploads/1702154820_teratai.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Freelance/Portfolio Website Creator'),
(2, 'address', 'Philippines'),
(3, 'contact', '+1234567890'),
(4, 'email', 'info@sample.com'),
(6, 'short_name', 'My Website'),
(9, 'logo', 'uploads/1616118180_aclc.jpg'),
(11, 'welcome_message', 'I\'m a Web Developer creating awesome and effective Web Applications for companies of all sizes around the globe. Let\'s start scrolling and learn more about me.');

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `id` int(30) NOT NULL,
  `name` text,
  `summary` text,
  `description` text,
  `banner` text,
  `client` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trends`
--

INSERT INTO `trends` (`id`, `name`, `summary`, `description`, `banner`, `client`) VALUES
(21, 'ogrk ', '', '', 'uploads/1701424680_Purple Neon Game Presentations (1).png', ''),
(22, 'ogek ', '', '', 'uploads/1701424920_Video berdurasi 3 menit, yang akan menginspirasi hidup ANDA!!.mp4', ''),
(23, 'jjj', '', '', 'uploads/1702200960_1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `date_added`, `date_updated`) VALUES
(1, 'John', 'Smith Docs', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1619140500_avatar.png', NULL, '2021-01-20 14:02:37', '2023-12-09 21:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(30) NOT NULL,
  `company` text,
  `position` text,
  `started` varchar(250) NOT NULL,
  `ended` varchar(250) NOT NULL,
  `description` text,
  `order_by` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `company`, `position`, `started`, `ended`, `description`, `order_by`) VALUES
(1, 'Company 101', 'Web Developer', 'March_2014', 'July_2017', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Curabitur venenatis tortor semper finibus congue. Praesent eget tellus ac libero euismod pulvinar sed tincidunt odio. Cras sed viverra orci. Suspendisse cursus faucibus augue, sed feugiat ante commodo vitae. Praesent ut tempus neque. Donec ac ultricies orci, sed egestas nunc. Nunc lacinia, tortor sit amet elementum cursus, ante erat dictum lorem, ut feugiat sapien mi quis nulla. Nunc diam erat, lobortis nec posuere in, tempus non dui. Phasellus eleifend est at neque luctus, in placerat dolor pretium. Integer sagittis lacinia placerat. Nulla in dolor dapibus purus pharetra consectetur ac et tortor. Morbi blandit viverra ipsum, at lobortis odio lacinia tempus. Maecenas ac lobortis nisi. Suspendisse potenti.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 0),
(2, 'sv', 'sv', 'May_2018', 'March_2023', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trends`
--
ALTER TABLE `trends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trends`
--
ALTER TABLE `trends`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
