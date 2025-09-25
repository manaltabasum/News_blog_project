-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 05:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `is_parent` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`cat_id`, `cat_name`, `is_parent`, `status`) VALUES
(10, 'sports', 0, 1),
(11, 'Education', 0, 1),
(12, 'Politics', 0, 1),
(13, 'Global', 0, 1),
(21, 'HSC result', 11, 1),
(22, 'Diploma result', 11, 1),
(27, 'ssc result', 11, 1),
(28, 'cricket', 10, 1),
(30, 'Economics', 0, 1),
(32, 'Education', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `cmt_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `cmt_post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `cmt_name`, `comment`, `cmt_post_id`, `email`, `status`, `cmt_date`) VALUES
(9, 'manal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 11, 'lorem@gmail.com', 1, '2025-09-13'),
(10, 'Mina', 'কৃত্রিম বুদ্ধিমত্তা বা এআই চাকরি কেড়ে নিতে পারে বা চাকরির বাজার এমনভাবে পাল্টে দিতে পারে ', 12, 'mina@gmail.com', 1, '2025-09-16'),
(11, 'Rina', 'ডলারের দর ধরে রাখার কৌশল হিসেবে ব্যাংকগুলোর কাছ থেকে প্রধান এ বিদেশি মুদ্রা কেনা অব্যাহত', 11, 'rina@gmail.com', 1, '2025-09-16'),
(12, 'Tina', 'গাজায় আকাশ থেকে ত্রাণ ফেলছে জর্ডান ও আরব আমিরাত', 4, 'tina@gmail.com', 1, '2025-09-16'),
(13, 'Hina', 'Burn institute releases names of 32 victims from Milestone School jet crash\r\nPolitics', 5, 'hina@gmail.com', 1, '2025-09-16'),
(14, 'Lily', 'হিমাগারে আলুর দাম কেজিতে ২২ টাকা বেঁধে দিল সরকার', 10, 'lotus@gmail.com', 2, '2025-09-16'),
(15, 'Lily', 'হিমাগারে আলুর দাম কেজিতে ২২ টাকা বেঁধে দিল সরকার', 10, 'lotus@gmail.com', 2, '2025-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category_id`, `author_id`, `status`, `tags`, `image`, `post_date`) VALUES
(4, 'গাজায় আকাশ থেকে ত্রাণ ফেলছে জর্ডান ও আরব আমিরাত', 'ইসরায়েল গাজার কিছু অংশে প্রতিদিন নির্দিষ্ট সময়ের জন্য অভিযান বন্ধ ও নতুন ত্রাণ করিডর চালুর ঘোষণা দেওয়ার পর সেখানে আকাশপথে বিমান থেকে ত্রাণ ফেলা শুরু করেছে জর্ডান ও সংযুক্ত আরব আমিরাত।\r\n\r\nকয়েক মাসের মধ্যে রোববার প্রথম এই দুই দেশ গাজায় প্যারাসুটে করে ২৫ টন খাবার ফেলেছে। জর্ডানের এক কর্মকর্তা একথা জানিয়েছেন।\r\n\r\nতাছাড়া, জর্ডান স্থলপথেও ৬০ ট্রাক খাদ্য সরবরাহ গাজায় পাঠিয়েছে বলে জানিয়েছে দেশটির রাষ্ট্রপরিচালিত সংবাদমাধ্যম। স্থলপথে গাজায় সাহায্য সরবরাহ করছে মিশরও।', 13, NULL, 1, 'গাজায় আকাশ থেকে ত্রাণ ', '9859279_project_img_1.jpg', '2025-07-27'),
(5, 'Burn institute releases names of 32 victims from Milestone School jet crash', 'The National Burn and Plastic Surgery Institute has released a list of 32 people injured in a Bangladesh Air Force jet crash at Milestone School and College in Dhaka’s Diabari area.\r\n\r\nMost of those listed, aged between 10 and 13, are identified with single names.\r\n\r\nSix of them are being treated in the Intensive Care Unit (ICU).\r\n\r\nThe ICU patients are Nafis, Shamim, Shayan Yusuf, Mahia, Afnan, and Samia.\r\n\r\nAmong them, Nafis has suffered 95 percent burns. The list does not specify the burn percentage for the other five.\r\n\r\nTwo students, Erickson and Mehrin, have sustained 100 percent burns.\r\n\r\nNazia and Mahtab, both aged 13, have burns covering 80 percent of their bodies.\r\n\r\nMakin, 15, has suffered burns across 62 percent. Ayan, 14, and Masuma each have 60 percent burns.\r\n\r\nAmong the others, Tasnia has 35 percent burns, 11-year-old Arian 55 percent, Ashraful Islam 15 percent, Rohan 50 percent, Shreya 5 percent, Kabyo 20 percent, Yusha 6 percent and Rupi Barua 6 percent.', 12, NULL, 1, 'Milestone School jet crash', '4245603_project_img_2.jpeg', '2025-07-27'),
(10, 'হিমাগারে আলুর দাম কেজিতে ২২ টাকা বেঁধে দিল সরকার', 'ব্যবসায়ীদের দাবি মেনে নিয়ে হিমাগারের গেইটে আলুর দাম কেজিপ্রতি ২২ টাকা নির্ধারণ করে দিয়েছে সরকার।\r\n\r\nপাশাপাশি ৫০ হাজার মেট্রিক টন আলু সরকারি উদ্যোগে কিনে হিমাগারে সংরক্ষণ করা হবে এবং আগামী অক্টোবর-নভেম্বর মাসে তা বাজারে বিক্রি করা হবে বলে কৃষি মন্ত্রণালয়ের পক্ষ থেকে জানানো হয়েছে।\r\n\r\nবুধবার মন্ত্রণালয়ের এক সংবাদ বিজ্ঞপ্তিতে বলা হয়, সাম্প্রতিক সময়ে আলুর বিক্রয়মূল্য উৎপাদন খরচের সঙ্গে ‘সামঞ্জস্যপূর্ণ না হওয়ায়’ কৃষকরা ক্ষতির মুখে পড়েছেন।', 30, NULL, 1, 'আলুর দাম', '2400673_munshiganj-patato.jpg', '2025-08-27'),
(11, 'আরও ১৫ কোটি ডলার কিনল বাংলাদেশ ব্যাংক', 'ডলারের দর ধরে রাখার কৌশল হিসেবে ব্যাংকগুলোর কাছ থেকে প্রধান এ বিদেশি মুদ্রা কেনা অব্যাহত রেখেছে বাংলাদেশ ব্যাংক; সপ্তাহের শেষ দিবসে কিনেছে প্রায় ১৫ কোটি ডলার।\r\n\r\nবৃহস্পতিবার ১২১ টাকা ৭০ পয়সা দরে ১৩টি ব্যাংক থেকে এ পরিমাণ ডলার কেনার তথ্য দিয়েছেন বাংলাদেশ ব্যাংকের মুখপাত্র নির্বাহী পরিচালক আরিফ হোসেন খান।\r\n\r\nবিডিনিউজ টোয়েন্টিফোর ডটকমকে তিনি বলেন, “ডলার দর স্থিতিশীল রাখতেই এ পদ্ধতি ব্যবহার করছে কেন্দ্রীয় ব্যাংক।”\r\nবাংলাদেশ ব্যাংকের ঊর্ধ্বতন একজন কর্মকর্তা বলেন, বৃহস্পতিবার ব্যাংকগুলো নিলামে বিক্রি করতে চেয়েছিল ১৬ কোটি ডলার। এর মধ্যে কেন্দ্রীয় ব্যাংক কিনেছে ১৪ কোটি ৯৫ লাখ ডলার।\r\n\r\nডলার কেনার বিষয়ে মিউচুয়াল ট্রাস্ট ব্যাংকের ব্যবস্থাপনা পরিচালক সৈয়দ মাহবুবুর রহমান বিডিনিউজ টোয়েন্টিফোর ডটকমকে বলেন, রেমিটেন্স ও রপ্তানি বাড়ায় ডলার প্রবাহ এখন বেশ ভালো। তাই দাম যাতে পড়ে না যায় সেজন্য বাংলাদেশ ব্যাংক নিলামে ডলার কিনছে। এ পদ্ধতি ডলার বাজারকে স্থিতিশীল রাখতে সাহায্য করছে, যা রেমিটেন্স আসা অব্যাহত রাখতে ভূমিকা রাখবে।', 30, NULL, 1, 'বাংলাদেশ ব্যাংক', '87467_us-dollar.jpg', '2025-08-31'),
(12, 'এআই নিয়ে চাকরি-শঙ্কায় যুক্তরাজ্যে দুই-তৃতীয়াংশ তরুণ', 'কৃত্রিম বুদ্ধিমত্তা বা এআই চাকরি কেড়ে নিতে পারে বা চাকরির বাজার এমনভাবে পাল্টে দিতে পারে যে, তা আর চেনার উপায় থাকবে না বলে উদ্বিগ্ন যুক্তরাজ্যের অর্ধেকেরও বেশি প্রাপ্তবয়স্ক নাগরিক– এমনই উঠে এসেছে নতুন এক জরিপে।\r\n\r\nজরিপটি পরিচালনা করেছে যুক্তরাজ্যের ‘ট্রেডস ইউনিয়ন কংগ্রেস’ বা টিইউসি। তারা বলেছে, জরিপের ফলাফল মন্ত্রিসভার জন্য এমন এক সতর্কবার্তা হওয়া উচিত, যাতে দ্রুত প্রযুক্তিগত পরিবর্তনের জন্য প্রস্তুতি নিতে পারে তারা।\r\n\r\nজরিপে উঠে এসেছে, এআইয়ের কারণে নিজেদের চাকরি নিয়ে উদ্বিগ্ন যুক্তরাজ্যের ৫১ শতাংশ কর্মরত প্রাপ্তবয়স্ক। তরুণ কর্মীদের মধ্যে এ উদ্বেগ আরও বেশি। ২৫ থেকে ৩৪ বছর বয়সীদের মধ্যে ৬২ শতাংশই এ নিয়ে আশঙ্কা প্রকাশ করেছেন।\r\nএ উদ্বেগ রাজনৈতিক মতাদর্শ ভেদেও স্পষ্টভাবে দেখা গিয়েছে বলে প্রতিবেদনে লিখেছে ব্রিটিশ দৈনিক ইন্ডিপেনডেন্ট। লেবার, কনজারভেটিভ ও রিফর্ম যুক্তরাজ্যের এ তিনটি দলের প্রায় অর্ধেক ভোটারই এআই নিয়ে উদ্বেগ প্রকাশ করেছেন।\r\n\r\nজরিপটি এমন সময়ে এল যখন বিটি, অ্যামাজন ও মাইক্রোসফটসহ বেশ কয়েকটি বড় মার্কিন কোম্পানি সতর্ক করে বলেছে, সাম্প্রতিক মাসগুলোতে এআইয়ের অগ্রগতি ভবিষ্যতে চাকরি ছাঁটাইয়ের কারণ হতে পারে।\r\n\r\nটিইউসি’র সহকারী মহাসচিব কেইট বেল বলেছেন, “এআইয়ের রয়েছে পরিবর্তন আনার আমূল সম্ভাবনা। তবে এ প্রযুক্তিটিকে সঠিকভাবে উন্নয়ন করা গেলে এর কারণে উৎপাদনশীলতা বৃদ্ধির ফলে কর্মীরাও উপকার পেতে পারেন।', 32, NULL, 1, ' চাকরি', '718725_ai.jpg', '2025-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `image`, `role`, `status`) VALUES
(1, 'Manal', 'manal@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'flower.jpg', 1, 1),
(2, 'tabasum', 'tabasum@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'flower2.jpg\r\n', 1, 1),
(4, 'Lata akter', 'lata@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
