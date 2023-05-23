-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 09:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `user_name` varchar(255) NOT NULL,
  `passward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`user_name`, `passward`) VALUES
('alshimaa ahmed', '1234$alsh');

-- --------------------------------------------------------

--
-- Table structure for table `cheifs`
--

CREATE TABLE `cheifs` (
  `id` int(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nationalitiy` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `about_you` varchar(450) NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cheifs`
--

INSERT INTO `cheifs` (`id`, `name`, `nationalitiy`, `qualification`, `about_you`, `userid`) VALUES
(52, 'sos', 'egyptian', 'I studied cooking in college', 'iam chef', 20230037);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_name`, `email`, `massage`) VALUES
(17, 'sagda', 'sagda@gmail.com', 'this website is perfect!!\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`id`, `name`, `path`) VALUES
(46, 'cake.mp4', 'C:/xampp2/htdocs/IT/cake.mp4'),
(47, 'Teramiso.mp4', 'C:/xampp2/htdocs/IT/Teramiso.mp4'),
(0, 'Teramiso.mp4', 'C:/xampp/htdocs/IT_Project_new_version_Aya_24-4/videos/Teramiso.mp4'),
(0, 'Pizza.mp4', 'C:/xampp/htdocs/IT_Project_new_version_Aya_24-4/videos/Pizza.mp4'),
(0, 'cook.mp4', 'C:/xampp/htdocs/IT_Project_new_version_Aya_24-4/videos/cook.mp4'),
(0, 'cook.mp4', 'C:/xampp/htdocs/IT_Project_new_1-5/videos/cook.mp4'),
(0, 'Pizza.mp4', 'C:/xampp/htdocs/IT_Project_new_1-5/videos/Pizza.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `dessert_description`
--

CREATE TABLE `dessert_description` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dessert_description`
--

INSERT INTO `dessert_description` (`id`, `name`, `description`) VALUES
(3, 'sagda fathy', 'sweety cripe is a famouse recipe in paris'),
(4, 'sagda fathy', 'sweety cripe is a famouse recipe in paris'),
(5, 'ayaragab', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quam adipisci repellat, voluptates eaque vitae maiores rem magnam consequuntur. Saepe labore consectetur perferendis laborum! Officia eligendi officiis iure voluptatum culpa?'),
(6, 'sagda fathy', 'bla bla bla'),
(10, 'sagda', 'hmmmmmmmmm'),
(11, 'sagda', 'hmmmmmmmmm'),
(12, 'soso', 'lloooooool');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `title_post` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_e` int(255) NOT NULL,
  `n_comments` int(255) NOT NULL,
  `loves` int(255) NOT NULL,
  `hahas` int(255) NOT NULL,
  `dislikes` int(255) NOT NULL,
  `total_reacts` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`title_post`, `content`, `photo`, `userid`, `username`, `id_e`, `n_comments`, `loves`, `hahas`, `dislikes`, `total_reacts`) VALUES
('About sushi', 'I love sushi verryyy muchhh', '2020-09-01.jpg', 20230013, 'ayaragab', 12, 36, 105, 29, 11, 145),
('The last post....', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias beatae libero veniam iure eum ipsam ipsum inventore facere consequuntur temporibus labore non, facilis pariatur illo, placeat corporis. Harum, et exercitationem?\r\n', 'Quick-Veggie-Pasta-V1.jpg', 20230025, 'Aya Ragab', 20, 0, 5, 0, 0, 5),
('\';iluyjth', 'mnbgftyhgvfcfvghjuhygthj bghyjn vghjnm vcfgbhnmjhubg nmjuhb nmjhbvgfthyjn bhjuygtfvc bncvfghjn nmjhnbv vbghjum mjhgbv nmnvbnhj', '2020-09-01.jpg', 20230036, 'soso', 23, 0, 1, 0, 0, 1),
('kyjdkyuj', ' cvfghn ,kjhb bvghjmn mjkuhygtfv nmvfghn vbvc vbgfc bnhbgv nmkjhbgv mkijuhygbv nmjhygtfvc njhgvfc nmjhgv nmjhbgv njhbgv njhbgv ', 'ENP.jpeg', 20230043, 'omnia', 24, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `healthy_food`
--

CREATE TABLE `healthy_food` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthy_food`
--

INSERT INTO `healthy_food` (`id`, `name`, `path`) VALUES
(46, 'Healthy chicken recipe.mp4', 'C:/xampp2/htdocs/IT/Healthy chicken recipe.mp4'),
(0, 'cook.mp4', 'C:/xampp/htdocs/IT_Project_new_version_Aya_24-4/videos/cook.mp4'),
(0, 'Pizza.mp4', 'C:/xampp/htdocs/IT_Project_new_version_Aya_24-4/videos/Pizza.mp4'),
(0, 'Pizza.mp4', 'C:/xampp/htdocs/IT_Project_new_1-5/videos/Pizza.mp4'),
(0, 'Healthy chicken recipe.mp4', 'C:/xampp/htdocs/IT_Project_new_1-5/videos/Healthy chicken recipe.mp4'),
(0, 'Healthy chicken recipe.mp4', 'C:/xampp/htdocs/IT_Project_new_1-5/videos/Healthy chicken recipe.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `healthy_food_description`
--

CREATE TABLE `healthy_food_description` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `healthy_food_description`
--

INSERT INTO `healthy_food_description` (`id`, `name`, `description`) VALUES
(1, 'sagda fathy', 'good'),
(2, 'deku', 'bla bla bla'),
(3, 'soso', 'setjdgyjg'),
(4, 'soso', 'hmmmmm'),
(5, 'sos', 'bla bla bla'),
(6, 'sos', 'bla bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `popular_recipe`
--

CREATE TABLE `popular_recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_recipe`
--

INSERT INTO `popular_recipe` (`id`, `name`, `path`) VALUES
(49, 'Pizza.mp4', 'C:/xampp2/htdocs/IT/Pizza.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `popular_recipe_description`
--

CREATE TABLE `popular_recipe_description` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `popular_recipe_description`
--

INSERT INTO `popular_recipe_description` (`id`, `name`, `description`) VALUES
(1, 'sagda fathy', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE `prize` (
  `prize` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `num` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`prize`, `photo`, `num`) VALUES
('TV', 'TV.jpeg', 1),
('Microwave', 'microwave.jpeg', 2),
('Refrigerator', 'Refrigerator.jpeg', 3),
('Oven', 'Oven.jpeg', 4),
('Dishwasher', 'dishwasher.jpeg', 5),
('coffee machine', 'coffee machine.jpeg', 6),
('Washing Machine', 'Washing Machine.jpeg', 7),
('Air Fryer', 'Air Fryer.jpeg', 8),
('blender', 'blender.jpeg', 9),
('deep fridge', 'deep fridge.jpeg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Question` varchar(255) NOT NULL,
  `choose1` varchar(255) NOT NULL,
  `choose2` varchar(255) NOT NULL,
  `choose3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `choose4` varchar(255) NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id` int(100) NOT NULL,
  `id_q` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question`, `choose1`, `choose2`, `choose3`, `choose4`, `answer`, `id`, `id_q`) VALUES
('Do you know what does confit mean? \r\n            ', 'A. To cook a dish in hot water.', 'B. To cut something into tiny little pieces.', 'C. To cook a thing in its very own fat.', 'D. I don\'t know.', 'B. To cut something into tiny little pieces.', 2, 1),
('The correct description for boiling is?', 'A. Small bubbles breaking at the surface 98 degrees celsius.\r\n\r\n', 'B. Large bubbles breaking at the surface 100 degrees celsius.\r\n', 'C. No bubbles 95 degrees celsius.', 'D.I don\'t know', 'B. Large bubbles breaking at the surface 100 degrees celsius.\r\n', 2, 2),
('In Italian cuisine, what term means a dish cooked in the oven?  \r\n', ' A. Al dente.', 'B. Cacciatore.\r\n', 'C. Bianca.', 'D. Al forno.', 'D. Al forno.', 4, 3),
('What is the name given to meat obtained from deer?\r\n', 'A. Venison.', 'B. Spatchcock.\r\n', 'C. Cassoulet.\r\n', 'D. Veal.', 'A. Venison.', 1, 4),
('What is a ganache? \r\n', 'A. a gourmet salt.\r\n', 'B. a salad dressing.\r\n', 'C. a mixture of chocolate and cream.', 'D. a type of bean.', 'C. a mixture of chocolate and cream.', 3, 5),
('Which of the following is NOT a type of bread? ', 'A. Ciabatta bread.\r\n', 'B. Amaranth bread.\r\n', 'C. Pumpernickel bread.', 'D. Non above.', 'D. Non above.', 4, 6),
('Stollen cake is traditionally served at what time of year in Germany?      \r\n', 'A. Birthday.\r\n', 'B. Halloween.\r\n', 'C. Easter.\r\n', 'D. Christmas.', 'D. Christmas.', 4, 7),
('What is tempeh?     \r\n', 'A. Japanese candy.', 'B. soybean-based meat substitute.\r\n', 'C. Moroccan barbecue.', 'D. oily fish.', 'B. soybean-based meat substitute.\r\n', 2, 8),
('What is the ideal fat - to - lean ratio for a delicious hamburger? \r\n\r\n', 'A. 70% meat with 30% fat.\r\n', 'B. 95% meat with 5% fat.', 'C. 50% meat and 50% fat.', 'D. 70% fat with 30% meat.', 'A. 70% meat with 30% fat.\r\n', 1, 9),
('Do you know what does confit mean?', ' A. To cook a dish in hot water.\r\n\r\n', ' B. To cut something into tiny little pieces.\r\n', ' C. To cook a thing in its very own fat.\r\n', ' D. I don\'t know.\r\n', ' B. To cut something into tiny little pieces.', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(9) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `choose1` text NOT NULL,
  `choose2` text NOT NULL,
  `choose3` text NOT NULL,
  `choose4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ingredients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_chef` int(100) NOT NULL,
  `id_r` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_name`, `ingredients`, `photo`, `id_chef`, `id_r`) VALUES
('wra2 3namd', 'For 6-8 people:\r\n\r\n500g vine leaves in brine, rinsed\r\n\r\n1 large onion, cut into 1 inch rings\r\n\r\n500g mince meat\r\n\r\n350g Egyptian rice\r\n\r\n1 large white onion, minced\r\n\r\n1/2 cup (120g) room temperature ghee \r\n\r\n2 tsp salt\r\n\r\n1 tsp pepper\r\n\r\n1 tsp boharat (s', 'ENP.jpeg', 20230037, 22),
('cookies', 'Ingredients\r\nfor 12 cookies\r\n\r\n½ cup granulated sugar(100 g)\r\n¾ cup brown sugar(165 g), packed\r\n1 teaspoon salt\r\n½ cup unsalted butter(115 g), melted\r\n1 egg\r\n1 teaspoon vanilla extract\r\n1 ¼ cups all-purpose flour(155 g)\r\n½ teaspoon baking soda\r\n4 oz milk ', '087d17eb-500e-4b26-abd1-4f9ffa96a2c6.jpg', 20230037, 23);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id_r` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `saved` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id_r`, `id_user`, `saved`) VALUES
(22, 20230036, 13),
(23, 20230036, 14),
(22, 20230037, 15),
(25, 20230036, 16),
(23, 20230042, 17),
(24, 20230043, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `what'snum` int(100) NOT NULL,
  `age` int(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `chef` tinyint(10) NOT NULL,
  `competition` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `what'snum`, `age`, `dateofbirth`, `chef`, `competition`) VALUES
(20230036, 'soso', 'soso@gmail.com', '1234567890', 2147483647, 19, '2023-01-31', 0, 0),
(20230037, 'sos', 'sos@gmail.com', '123456789', 2147483647, 18, '2023-05-01', 1, 1),
(20230038, 'soos', 'sooos@gmail.com', '1234567890', 0, 19, '2023-04-30', 1, 0),
(20230039, 'sagda fathy', 'lutdtu@gmail.com', '1234567890', 0, 19, '2022-11-08', 1, 0),
(20230041, 'sagooda', 'sagooda@gmail.com', 'sagooda123456', 1129657851, 19, '2023-01-03', 1, 1),
(20230043, 'omnia', 'omnia@gmail.com', '1234567890', 1129657851, 18, '2023-03-27', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id_p` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `prize` varchar(255) NOT NULL,
  `photo_p` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id_p`, `username`, `id_user`, `prize`, `photo_p`) VALUES
(220, 'soso ', 20230036, 'Dishwasher', 'dishwasher.jpeg'),
(221, 'sos ', 20230037, 'Microwave', 'microwave.jpeg.jpeg'),
(222, 'sagooda ', 20230041, 'Refrigerator', 'Refrigerator.jpeg'),
(223, 'omnia ', 20230042, 'Refrigerator', 'Refrigerator.jpeg'),
(224, 'omnia ', 20230043, 'Microwave', 'microwave.jpeg.jpeg'),
(225, 'omnia ', 20230043, 'Microwave', 'microwave.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheifs`
--
ALTER TABLE `cheifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dessert_description`
--
ALTER TABLE `dessert_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_e`) USING BTREE;

--
-- Indexes for table `healthy_food_description`
--
ALTER TABLE `healthy_food_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_recipe_description`
--
ALTER TABLE `popular_recipe_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_q`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id_r`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`saved`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id_p`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheifs`
--
ALTER TABLE `cheifs`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dessert_description`
--
ALTER TABLE `dessert_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_e` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `healthy_food_description`
--
ALTER TABLE `healthy_food_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `popular_recipe_description`
--
ALTER TABLE `popular_recipe_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_q` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id_r` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `saved` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20230044;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id_p` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
