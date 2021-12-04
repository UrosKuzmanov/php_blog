-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 09:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Mercedes-Benz'),
(3, 'Audi'),
(5, 'Toyota'),
(34, 'Opel'),
(35, 'Peugeot');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapprove',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(9, 23, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(10, 22, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(11, 21, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(12, 21, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(13, 20, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(14, 20, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(15, 19, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(16, 24, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(17, 24, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(18, 15, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(19, 16, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(20, 16, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(21, 17, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(22, 17, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(23, 18, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(24, 18, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(25, 18, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(26, 18, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(27, 17, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(28, 17, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(29, 16, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(30, 16, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(31, 15, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(32, 15, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(33, 19, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(34, 19, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(35, 20, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(36, 20, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(37, 21, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21'),
(38, 21, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(39, 22, 'Ann', 'ann@gmail.com', 'e history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends i', 'Approve', '2002-12-21'),
(40, 23, 'Johan', 'johan@gamil.com', 'The wealth of innovations such as in the area of the driving assistance systems also was characteristic', 'Approve', '2002-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_img` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_img`, `post_content`, `post_tags`, `post_status`) VALUES
(19, 34, 'Electric OPC', 'Ned Zuann', '2021-12-02', 'opel.jpg', '         There seems to be an OPC version of the current Corsa. Well that is already interesting news, but the fact that the Corsa-e forms the basis is striking. The electric Mokka also awaits a sporty treatment and the Peugeot 208 and 2008 will probably go the same way.\r\n\r\nVauxhall, the UK branch of Opel, is working on a Corsa VXR. That confirms Vauxhall director Stephen Norman in conversation with AutoExpress. That undoubtedly means that a Corsa OPC is on the way for our market. The new Corsa OPC follows a different recipe than before. Instead of an extra potent petrol engine, the Corsa OPC will get its power from the Corsa-es well-known 136 hp electric motor. Although it is a blow weaker than the 207 hp 1.6 that was in the previous Corsa OPC, it puts down performance that is already quite an extension of that. For the 0-100 km / h sprint, he needs roughly a second longer.                           ', '', 'published'),
(20, 2, 'Mercedes E Class', 'Aurthur Kienlein', '2021-12-02', 'e_class.webp', 'Automotive intelligence is now getting exciting and dynamic: the E-Class Saloon and Estate have undergone a comprehensive update as the first representatives of this model series. Both models will arrive in the showrooms of our European dealers in summer 2020. The long-wheelbase version of the Saloon (China), as well as the Coupé and Cabriolet, will follow soon thereafter.\r\n\r\nWith over 14 million Saloon and Estate models delivered since 1946, the E-Class is the best-selling model series in the history of Mercedes-Benz. It is perceived by many as the “heart of the brand”. The tenth generation of the E-Class set styling trends in 2016 with its clean yet emotionally appealing design and an exclusive, high-quality interior. The wealth of innovations such as in the area of the driving assistance systems also was characteristic. This emotionally appealing and at the same time intelligent combination is extremely successful: to date, more than 1.2 million customers around the world have bought a current-generation E-Class Saloon or E-Class Estate.', 'Mercedes', 'published'),
(22, 34, 'The Opel Insignia ', 'Bob Pedron', '2021-12-02', 'Irmscher-Opel-Insignia-2.jpg', 'The Opel Insignia may not be the first car that springs to mind when you think about sporty sedans but thanks to tuning expert Irmscher, it will soon be upgraded into quite an impressive performer.\r\n\r\nIrmscher’s tuned Insignia is still being developed and currently known as the is3. Just two renderings of the car has been shared to social media but that appears to have been enough to get some Insignia fans very excited about what is on the way.                          ', '', 'published'),
(23, 5, 'Toyota Supra', 'Ned Zuann', '2021-12-02', 'Toyota_Supra_GTS_front_panning.jpg', 'All fifth-generation Toyota Supras sold in Australia have been placed under recall, owing to a potential vacuum pump issue in the car s braking system.\r\n\r\nAffecting 675 vehicles built between 2019 and 2021, the fault stems from the brake booster vacuum pump potentially being damaged under specific engine start conditions, triggered by the engine management software.\r\n\r\nThis could lead to a reduction in braking performance, which increases the risk of an incident – potentially harming occupants and other road users.\r\n\r\nToyota has said it is currently contacting known owners to make an appointment at their nearest Toyota dealer to rectify the problem, free of charge.         ', 'Toyota', 'published'),
(24, 3, 'Tested: 2017 Audi A6 3.0T Competition', 'Roddie Slafford', '2021-12-02', '2017-Audi-A6-3.0T-Competition-101.jpg', 'Among mid-size sedans, attractive design is easy to come by. Any number of average-priced family four-doors can be loaded up with big wheels and the latest electronics, and fancy versions approach the interior refinement that once was the exclusive province of German luxury sedans like the Audi A6. The current-gen A6 no longer stands out the way it did when it debuted in 2011, even when it’s sitting on 20-inch wheels and something lowlier such as a Mazda 6 Grand Touring or a Kia Optima SX pulls up alongside. But consider the A6 a primer for anyone unfamiliar with upscale badges: With this car, your extra expenditure buys substance, not just style.           ', '', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'Gost',
  `user_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_username`, `user_password`, `user_email`, `user_img`, `user_role`, `user_date`) VALUES
(15, 'Uross', 'Kuzmanov', 'uros', '$2y$12$u8OT3oaDopX9hZli0KwCQeJxRDOLhmA7wb93JgXYC4GzxcIGtvXxW', 'uros@gmail.com', '', 'Admin', '2021-12-02'),
(21, 'Roddie', 'Slafford', 'Slafford', '$2y$12$3JniV1An9F1hYYazruCCi.XcPJcxQgAf6o232Eg0xPLb84bAyca5u', 'rslafford0@wp.com', '', 'Admin', '2021-12-02'),
(22, 'Aurthur', 'Kienlein', 'Kienlein', '$2y$12$NEujKSohF/.rX/4t/LnfrunRKphwaroiWj5bRXW13Lpbl1.k.EDrq', 'akienlein1@lulu.com', '', 'Admin', '2021-12-02'),
(23, 'Bob', 'Pedron', 'bpedron2@hatena.ne.jp', '$2y$12$Ct.LAD8LBQ.vGTXYZJXjPuUWicPqZsDf93fQ9CKtN3KyEvW5rU/qu', 'bpedron2@hatena.ne.jp', '', 'Admin', '2021-12-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
