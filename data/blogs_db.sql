-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 02:00 PM
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
-- Database: `blogs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs_posts`
--

CREATE TABLE `blogs_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `posted_at` date DEFAULT curdate(),
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs_posts`
--

INSERT INTO `blogs_posts` (`id`, `title`, `subtitle`, `author`, `content`, `posted_at`, `created_by`) VALUES
(89, 'The Power of Mindfulness in Everyday Life', 'How Being Present Can Improve Mental Health, Focus, and Overall Well-being', 'Alishba H', '<h3 class=\"\" data-start=\"288\" data-end=\"332\"><strong data-start=\"292\" data-end=\"330\">Introduction: What is Mindfulness?</strong></h3>\r\n<p class=\"\" data-start=\"333\" data-end=\"656\">Mindfulness is the practice of being fully present and engaged in the moment, without judgment. It&rsquo;s not about emptying your mind but rather observing your thoughts, emotions, and sensations with clarity. In today&rsquo;s fast-paced world, <strong data-start=\"567\" data-end=\"626\">mindfulness has become a vital tool for managing stress</strong> and improving mental clarity.</p>\r\n<hr class=\"\" data-start=\"658\" data-end=\"661\">\r\n<h3 class=\"\" data-start=\"663\" data-end=\"713\"><strong data-start=\"667\" data-end=\"711\">1. Mental Health Benefits of Mindfulness</strong></h3>\r\n<h4 class=\"\" data-start=\"714\" data-end=\"750\"><strong data-start=\"719\" data-end=\"748\">A Natural Stress Reliever</strong></h4>\r\n<p class=\"\" data-start=\"751\" data-end=\"978\">Practicing mindfulness regularly has been shown to reduce anxiety and depression. Through techniques like deep breathing and body scanning, individuals can calm their nervous systems and ground themselves in the present moment.</p>\r\n<hr class=\"\" data-start=\"980\" data-end=\"983\">\r\n<h3 class=\"\" data-start=\"985\" data-end=\"1031\"><strong data-start=\"989\" data-end=\"1029\">2. Enhancing Focus and Concentration</strong></h3>\r\n<h4 class=\"\" data-start=\"1032\" data-end=\"1074\"><strong data-start=\"1037\" data-end=\"1072\">Training the Mind Like a Muscle</strong></h4>\r\n<p class=\"\" data-start=\"1075\" data-end=\"1303\">Just like physical exercise strengthens the body, mindfulness strengthens attention. <strong data-start=\"1160\" data-end=\"1235\">Studies show that mindfulness meditation can improve cognitive function</strong> and help people stay focused longer, even during challenging tasks.</p>\r\n<hr class=\"\" data-start=\"1305\" data-end=\"1308\">\r\n<h3 class=\"\" data-start=\"1310\" data-end=\"1361\"><strong data-start=\"1314\" data-end=\"1359\">3. Emotional Regulation Through Awareness</strong></h3>\r\n<h4 class=\"\" data-start=\"1362\" data-end=\"1397\"><strong data-start=\"1367\" data-end=\"1395\">Responding, Not Reacting</strong></h4>\r\n<p class=\"\" data-start=\"1398\" data-end=\"1632\">Mindfulness teaches you to observe your emotions without immediately reacting to them. This creates space to make <strong data-start=\"1512\" data-end=\"1545\">conscious, thoughtful choices</strong>&mdash;especially in difficult situations&mdash;leading to better emotional control and resilience.</p>\r\n<hr class=\"\" data-start=\"1634\" data-end=\"1637\">\r\n<h3 class=\"\" data-start=\"1639\" data-end=\"1693\"><strong data-start=\"1643\" data-end=\"1691\">4. Incorporating Mindfulness into Daily Life</strong></h3>\r\n<h4 class=\"\" data-start=\"1694\" data-end=\"1729\"><strong data-start=\"1699\" data-end=\"1727\">Small Habits, Big Impact</strong></h4>\r\n<p class=\"\" data-start=\"1730\" data-end=\"1952\">Mindfulness doesn\'t require hours of meditation. It can be as simple as paying full attention while brushing your teeth, eating, or walking. <strong data-start=\"1871\" data-end=\"1952\">Consistency in small practices often leads to significant benefits over time.</strong></p>\r\n<hr class=\"\" data-start=\"1954\" data-end=\"1957\">\r\n<h3 class=\"\" data-start=\"1959\" data-end=\"2014\"><strong data-start=\"1963\" data-end=\"2012\">Conclusion: A Lifestyle Shift Worth Embracing</strong></h3>\r\n<p class=\"\" data-start=\"2015\" data-end=\"2279\">Mindfulness isn&rsquo;t just a practice&mdash;it&rsquo;s a way of life. It encourages us to live more intentionally, improve our mental clarity, and experience life more deeply. With just a few minutes a day, mindfulness can transform how we think, feel, and connect with the world.</p>\r\n<p class=\"\" data-start=\"2015\" data-end=\"2279\">&nbsp;</p>\r\n<p class=\"\" data-start=\"2015\" data-end=\"2279\"><img src=\"/clean-blog-project/uploads/1744042412_mindfree-img.jpg\" alt=\"\" width=\"419\" height=\"279\"></p>', '2025-04-07', 'Alishba Hanif'),
(90, 'The Digital Nomad Lifestyle: Freedom or Illusion?', 'Exploring the realities behind the dream of working remotely from anywhere.', 'Alishba Hanif', '<p class=\"\" data-start=\"77\" data-end=\"396\"><strong data-start=\"77\" data-end=\"96\">🌍 Introduction</strong><br data-start=\"96\" data-end=\"99\">In recent years, the idea of becoming a <strong data-start=\"139\" data-end=\"156\">digital nomad</strong> has captivated the minds of thousands. Social media is flooded with images of laptops on beachside cafes, early morning hikes before meetings, and a lifestyle that blends work with wanderlust. <strong data-start=\"350\" data-end=\"396\">But is the reality as idyllic as it seems?</strong></p>\r\n<hr class=\"\" data-start=\"398\" data-end=\"401\">\r\n<p class=\"\" data-start=\"403\" data-end=\"758\"><strong data-start=\"403\" data-end=\"444\">✈️ The Perks of Location Independence</strong><br data-start=\"444\" data-end=\"447\">There&rsquo;s no denying the allure of working from wherever you want. The freedom to choose your workspace&mdash;be it a cozy caf&eacute; in Paris or a quiet hut in Bali&mdash;can be incredibly empowering. For many, it\'s the answer to escaping the monotony of office life, and it opens doors to new cultures, people, and experiences.</p>\r\n<p class=\"\" data-start=\"760\" data-end=\"980\">Moreover, this lifestyle often fosters <strong data-start=\"799\" data-end=\"827\">better work-life balance</strong>. Without rigid schedules and long commutes, digital nomads can prioritize wellness and productivity in a way traditional 9-to-5 jobs don&rsquo;t always allow.</p>\r\n<hr class=\"\" data-start=\"982\" data-end=\"985\">\r\n<p class=\"\" data-start=\"987\" data-end=\"1353\"><strong data-start=\"987\" data-end=\"1027\">⚠️ The Challenges Behind the Glamour</strong><br data-start=\"1027\" data-end=\"1030\">However, this lifestyle isn&rsquo;t without its hurdles. Unstable internet connections, time zone differences, and the lack of a stable routine can make work harder than expected. Not to mention the <strong data-start=\"1223\" data-end=\"1237\">loneliness</strong> that can come from constantly moving and never settling in one place long enough to build meaningful relationships.</p>\r\n<p class=\"\" data-start=\"1355\" data-end=\"1516\">Additionally, managing finances and visas can become a complex task, especially for freelancers or remote employees navigating international laws and currencies.</p>\r\n<hr class=\"\" data-start=\"1518\" data-end=\"1521\">\r\n<p class=\"\" data-start=\"1523\" data-end=\"1864\"><strong data-start=\"1523\" data-end=\"1540\">🧠 Conclusion</strong><br data-start=\"1540\" data-end=\"1543\">The digital nomad lifestyle offers a taste of freedom that many crave&mdash;but it&rsquo;s not a universal solution. Behind the Instagram aesthetics lies a need for <strong data-start=\"1696\" data-end=\"1710\">discipline</strong>, <strong data-start=\"1712\" data-end=\"1728\">adaptability</strong>, and a willingness to face discomfort. For the right kind of person, though, it can be one of the most rewarding ways to live and work.</p>\r\n<p class=\"\" data-start=\"1523\" data-end=\"1864\">&nbsp;</p>\r\n<p class=\"\" data-start=\"1523\" data-end=\"1864\">&nbsp;</p>', '2025-04-07', 'Alishba Hanif'),
(91, 'The Rise of Remote Work: Transforming the Modern Workplace', 'How Remote Work is Reshaping Productivity, Culture, and the Future of Employment', 'Areesha Hanif', '<p class=\"\" data-start=\"85\" data-end=\"516\"><strong data-start=\"85\" data-end=\"131\">Introduction: A Shift in the Work Paradigm</strong><br data-start=\"131\" data-end=\"134\">Over the last few years, <strong data-start=\"159\" data-end=\"174\">remote work</strong> has shifted from a temporary solution to a permanent model for many businesses. What started as an emergency response to global events has evolved into a widespread transformation of how and where we work. The <strong data-start=\"385\" data-end=\"411\">remote work revolution</strong> is not just about location&mdash;it\'s about flexibility, autonomy, and reimagining traditional office culture.</p>\r\n<hr class=\"\" data-start=\"518\" data-end=\"521\">\r\n<p class=\"\" data-start=\"523\" data-end=\"950\"><strong data-start=\"523\" data-end=\"558\">1. The Evolution of Remote Work</strong><br data-start=\"558\" data-end=\"561\"><strong data-start=\"561\" data-end=\"587\">From Cubicles to Cloud</strong><br data-start=\"587\" data-end=\"590\">Traditionally, the workplace was confined to physical spaces&mdash;offices, conference rooms, and workstations. However, advances in technology, particularly cloud computing and collaboration tools, have made it possible for teams to work efficiently from virtually anywhere. Tools like <strong data-start=\"871\" data-end=\"879\">Zoom</strong>, <strong data-start=\"881\" data-end=\"890\">Slack</strong>, and <strong data-start=\"896\" data-end=\"916\">Google Workspace</strong> have become the new office desks.</p>\r\n<hr class=\"\" data-start=\"952\" data-end=\"955\">\r\n<p class=\"\" data-start=\"957\" data-end=\"1347\"><strong data-start=\"957\" data-end=\"994\">2. Productivity in the Remote Era</strong><br data-start=\"994\" data-end=\"997\"><strong data-start=\"997\" data-end=\"1049\">Breaking the Myth of &ldquo;Out of Sight, Out of Work&rdquo;</strong><br data-start=\"1049\" data-end=\"1052\">One of the major concerns employers had was whether productivity would dip without physical oversight. Surprisingly, many studies have shown the opposite. Remote employees often report higher productivity due to <strong data-start=\"1264\" data-end=\"1286\">fewer distractions</strong>, <strong data-start=\"1288\" data-end=\"1313\">less commuting stress</strong>, and <strong data-start=\"1319\" data-end=\"1346\">more flexible schedules</strong>.</p>\r\n<hr class=\"\" data-start=\"1349\" data-end=\"1352\">\r\n<p class=\"\" data-start=\"1354\" data-end=\"1779\"><strong data-start=\"1354\" data-end=\"1393\">3. Challenges Faced by Remote Teams</strong><br data-start=\"1393\" data-end=\"1396\"><strong data-start=\"1396\" data-end=\"1433\">Communication Gaps and Loneliness</strong><br data-start=\"1433\" data-end=\"1436\">While remote work offers flexibility, it also brings challenges like communication delays, isolation, and difficulty in building team rapport. Without watercooler conversations and face-to-face meetings, some employees feel disconnected. Organizations need to invest in better <strong data-start=\"1713\" data-end=\"1740\">communication practices</strong> and <strong data-start=\"1745\" data-end=\"1778\">virtual team-building efforts</strong>.</p>\r\n<hr class=\"\" data-start=\"1781\" data-end=\"1784\">\r\n<p class=\"\" data-start=\"1786\" data-end=\"2133\"><strong data-start=\"1786\" data-end=\"1819\">4. Redefining Company Culture</strong><br data-start=\"1819\" data-end=\"1822\"><strong data-start=\"1822\" data-end=\"1857\">Culture Beyond the Office Walls</strong><br data-start=\"1857\" data-end=\"1860\">A strong workplace culture doesn&rsquo;t need an office. <strong data-start=\"1911\" data-end=\"1937\">Remote-first companies</strong> are redefining culture through regular virtual meetups, clear documentation, and inclusive decision-making. The focus has shifted from <strong data-start=\"2073\" data-end=\"2094\">physical presence</strong> to <strong data-start=\"2098\" data-end=\"2115\">shared values</strong> and <strong data-start=\"2120\" data-end=\"2132\">outcomes</strong>.</p>\r\n<hr class=\"\" data-start=\"2135\" data-end=\"2138\">\r\n<p class=\"\" data-start=\"2140\" data-end=\"2486\"><strong data-start=\"2140\" data-end=\"2184\">5. The Future of Work: Hybrid and Beyond</strong><br data-start=\"2184\" data-end=\"2187\">As the world adjusts, many businesses are adopting <strong data-start=\"2238\" data-end=\"2255\">hybrid models</strong>&mdash;a blend of remote and in-office work. This allows flexibility while retaining the benefits of occasional in-person interaction. The future of work lies in <strong data-start=\"2411\" data-end=\"2430\">personalization</strong>, allowing employees to choose what works best for them.</p>\r\n<hr class=\"\" data-start=\"2488\" data-end=\"2491\">\r\n<p class=\"\" data-start=\"2493\" data-end=\"2790\"><strong data-start=\"2493\" data-end=\"2529\">Conclusion: Embracing the Change</strong><br data-start=\"2529\" data-end=\"2532\">Remote work is more than just a trend&mdash;it&rsquo;s a new standard. Businesses that adapt and embrace this model will not only retain top talent but also unlock new levels of <strong data-start=\"2698\" data-end=\"2712\">innovation</strong> and <strong data-start=\"2717\" data-end=\"2731\">efficiency</strong>. The future of work is here, and it&rsquo;s <strong data-start=\"2770\" data-end=\"2789\">remote-friendly</strong>.</p>\r\n<p class=\"\" data-start=\"2493\" data-end=\"2790\">&nbsp;</p>\r\n<p class=\"\" data-start=\"2493\" data-end=\"2790\"><img src=\"/clean-blog-project/uploads/1744042647_test.jpg\" alt=\"\" width=\"465\" height=\"237\"></p>', '2025-04-07', 'Areesha Hanif');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `identifier`, `password`, `login_time`) VALUES
(1, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 10:32:45'),
(2, 'areesha1@gmail.com', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 10:33:52'),
(3, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:08:35'),
(4, 'Areesha Hanif', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 11:09:15'),
(5, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:11:07'),
(6, 'Areesha Hanif', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 11:14:01'),
(7, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:17:22'),
(8, 'osama', '$2y$10$1WDAlTpDyp9j4yFpDW9UKeq3WNFtlxQ.sla/luFw6IFGQiKklPyHm', '2025-04-07 11:20:48'),
(9, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:26:12'),
(10, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:32:37'),
(11, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 11:34:41'),
(12, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 13:42:19'),
(13, 'Areesha Hanif', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 13:46:01'),
(14, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 13:51:04'),
(15, 'Areesha Hanif', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 14:52:13'),
(16, 'test', '$2y$10$sbXr4TBTyGohsEf41oTOiOJCTSIJ3R9.zmJyTCCdazey5tWY1pHbW', '2025-04-07 15:07:05'),
(17, 'Alishba Hanif', '$2y$10$y/kBah1R9yy70q3lFA/av.8B27EATGRK9Dn5XQ.uASMbWcL/80RbC', '2025-04-07 15:17:31'),
(18, 'Areesha Hanif', '$2y$10$ojjILxdb3jV2KDEJcN/oyu.L.mDl/BpXwj8UYnn9mySfFwuwpSVom', '2025-04-07 15:18:28'),
(19, 'Alishba Hanif', '$2y$10$j4raFxMs2XJwrbGtjc3EMOtoupzyIgGnWWJb8.Lwr6ilqqJtXSHqi', '2025-04-07 16:06:52'),
(20, 'Alishba Hanif', '$2y$10$AZQ4iZhZ7oWYdXcp2szX7O4yO4odLAQvKSauATd7VdDtSFsSOwM3K', '2025-04-07 16:10:04'),
(21, 'areesha1@gmail.com', '$2y$10$ITJmxOziXXQ1tdP5GC6Vr.p.RB/YuFOQ6ng4SSxd.4cXjcCR3bvS.', '2025-04-07 16:16:16'),
(22, 'Alishba Hanif', '$2y$10$AZQ4iZhZ7oWYdXcp2szX7O4yO4odLAQvKSauATd7VdDtSFsSOwM3K', '2025-04-07 16:22:30'),
(23, 'Alishba Hanif', '$2y$10$AZQ4iZhZ7oWYdXcp2szX7O4yO4odLAQvKSauATd7VdDtSFsSOwM3K', '2025-04-08 11:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_registered`
--

CREATE TABLE `user_registered` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registered`
--

INSERT INTO `user_registered` (`id`, `username`, `email`, `password`) VALUES
(6, 'Alishba Hanif', 'alishba6@gmail.com', '$2y$10$AZQ4iZhZ7oWYdXcp2szX7O4yO4odLAQvKSauATd7VdDtSFsSOwM3K'),
(7, 'Areesha Hanif', 'areesha1@gmail.com', '$2y$10$ITJmxOziXXQ1tdP5GC6Vr.p.RB/YuFOQ6ng4SSxd.4cXjcCR3bvS.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs_posts`
--
ALTER TABLE `blogs_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registered`
--
ALTER TABLE `user_registered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs_posts`
--
ALTER TABLE `blogs_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_registered`
--
ALTER TABLE `user_registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
