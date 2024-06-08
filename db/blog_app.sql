-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 09:18 AM
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
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_media`
--

CREATE TABLE `blog_media` (
  `media_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `media_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_media`
--

INSERT INTO `blog_media` (`media_id`, `post_id`, `media_name`) VALUES
(1, 1, 'ai_future.jpg'),
(2, 2, 'healthy_tips.png'),
(3, 3, 'budget_travel.pdf'),
(4, 4, 'travel_destinations.jpg'),
(5, 5, 'vegan_recipes.png');

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE `blog_user` (
  `user_id` varchar(30) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_bio`, `user_status`) VALUES
('user1', 'John Doe', 'john.doe@example.com', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'user1.jpg', 'Hello, I am John Doe. I love writing about technology.', 1),
('user2', 'Jane Smith', 'jane.smith@example.com', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'user2.jpg', 'Hi there! I\'m Jane Smith, passionate about health and fitness.', 1),
('user3', 'Alice Johnson', 'alice.johnson@example.com', '5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764', 'user3.jpg', 'Welcome! I\'m Alice Johnson. Travel enthusiast and budget traveler.', 2),
('user4', 'Bob Brown', 'bob.brown@example.com', 'b97873a40f73abedd8d685a7cd5e5f85e4a9cfb83eac26886640a0813850122b', 'user4.jpg', 'Hey, I\'m Bob Brown. I enjoy exploring new destinations and cultures.', 1),
('user5', 'Carol White', 'carol.white@example.com', '8b2c86ea9cf2ea4eb517fd1e06b74f399e7fec0fef92e3b482a6cf2e2b092023', 'user5.jpg', 'Nice to meet you! I\'m Carol White. Food lover and aspiring chef.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `post_title` text NOT NULL,
  `post_detailed` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `cat_id`, `post_title`, `post_detailed`, `post_status`, `post_date`) VALUES
(1, 'user1', 1, 'The Future of AI', 'The future of AI is shaping up to be incredibly exciting and transformative. Ethical considerations will be at the forefront, ensuring AI systems are fair, transparent, and accountable as they become more prevalent in our daily lives. Rather than replacing humans, AI will increasingly work alongside people, augmenting their capabilities in various fields such as healthcare, education, and creative endeavors. Understanding how AI systems arrive at their decisions will become more important, driving the development of explainable AI (XAI) techniques to enhance transparency and trust.\r\n\r\nAI will revolutionize healthcare, from personalized medicine to medical image analysis and patient care. Autonomous systems, including autonomous vehicles and robotics, will become more prevalent, transforming transportation and manufacturing. In education, personalized learning experiences powered by AI will cater to individual student needs, improving educational outcomes. AI technologies will also optimize farming practices in agriculture, from precision agriculture to automated harvesting.\r\n\r\nNatural Language Processing (NLP) will continue to advance, leading to more sophisticated virtual assistants, language translation systems, and AI-powered content generation. AI will play a crucial role in addressing climate change by optimizing energy usage, predicting weather patterns, and facilitating sustainable practices. Moreover, AI will increasingly be used in creative fields such as art, music, and literature, either as tools to assist human creators or even as creators themselves.\r\n\r\nWith this rapid advancement, there will be a growing need for regulations and policies to govern the development, deployment, and use of AI to ensure it is used responsibly and ethically. AI systems will become more adaptive and capable of continual learning, evolving, and improving over time. Collaboration between researchers, policymakers, industry leaders, and society will be essential in shaping a future where AI benefits everyone.', 0, '2024-05-01 10:30:00'),
(2, 'user2', 2, 'Healthy Living Tips', 'Maintaining a healthy lifestyle is crucial for overall well-being. This involves several key aspects, starting with a balanced diet rich in fruits, vegetables, whole grains, lean proteins, and healthy fats, while limiting processed foods, sugary snacks, and excessive salt intake. Staying hydrated by drinking plenty of water throughout the day is essential for bodily functions and overall health.\r\n\r\nRegular exercise is another important component of a healthy lifestyle. Aim for at least 150 minutes of moderate aerobic activity or 75 minutes of vigorous activity per week, along with strength training exercises at least two days a week. Adequate sleep is crucial as well, aiming for 7-9 hours each night to support physical and mental health.\r\n\r\nManaging stress is key; practicing stress-reducing techniques such as deep breathing, meditation, or spending time in nature can help. Maintaining social connections with friends and family is also vital for mental and emotional well-being.\r\n\r\nLimiting alcohol consumption and avoiding tobacco are important for reducing the risk of various health problems. Regular health check-ups with your healthcare provider for screenings and preventive care can catch health issues early for better outcomes.\r\n\r\nPracticing good hygiene, including regular handwashing and oral hygiene, helps prevent illness and promotes overall health. Staying active throughout the day, incorporating physical activity into your routine, and minimizing screen time are also beneficial for your health.\r\n\r\nFinally, practicing mindful eating, paying attention to hunger and fullness cues, and eating slowly can help prevent overeating and promote healthier food choices. Making small, sustainable changes in these areas can lead to significant improvements in your overall health and well-being.', 0, '2024-05-02 11:00:00'),
(3, 'user3', 3, 'Travel on a Budget', 'Traveling on a budget is possible with careful planning and smart choices. Here are some tips for enjoying travel without breaking the bank:\r\n\r\nPlan Ahead: Research your destination thoroughly and plan your trip well in advance. Look for deals on accommodations, transportation, and activities.\r\n\r\nTravel Off-Season: Consider traveling during the off-peak season when prices for flights, accommodations, and attractions are often lower. You\'ll also encounter fewer crowds.\r\n\r\nFlexible Dates: Be flexible with your travel dates to take advantage of lower prices. Use fare comparison websites or flexible date search options to find the best deals on flights.\r\n\r\nBudget Accommodations: Stay in budget-friendly accommodations such as hostels, guesthouses, or vacation rentals. Consider options like Airbnb, Couchsurfing, or staying in budget hotels or hostels.\r\n\r\nCook Your Own Meals: Save money on food by shopping at local markets and cooking your own meals. Look for accommodations with kitchen facilities to prepare your own breakfast or dinner.\r\n\r\nUse Public Transportation: Opt for public transportation over taxis or rental cars to save money on getting around. Many cities have affordable and efficient public transportation systems.\r\n\r\nSeek Free Activities: Look for free or low-cost activities and attractions at your destination, such as parks, museums with free admission days, walking tours, or hiking trails.\r\n\r\nTravel Rewards and Discounts: Take advantage of travel rewards programs, credit card points, and discounts to save on flights, accommodations, and activities.\r\n\r\nPack Light: Avoid extra baggage fees by packing light and bringing only the essentials. Consider packing versatile clothing that can be mixed and matched.\r\n\r\nTravel Locally: Explore destinations closer to home to save money on transportation costs. You might discover hidden gems in your own region that are budget-friendly.\r\n\r\nAvoid Tourist Traps: Be mindful of tourist traps that are often overpriced. Research restaurants and attractions frequented by locals for more authentic and affordable experiences.\r\n\r\nStay Flexible: Remain flexible with your itinerary and be open to spontaneous opportunities or last-minute deals that can help you save money.\r\n\r\nTraveling on a budget doesn\'t mean sacrificing experiences; it\'s about finding ways to make the most of your resources while still enjoying your trip. With careful planning and creativity, you can have a memorable travel experience without breaking the bank.', 1, '2024-05-03 09:45:00'),
(4, 'user4', 4, 'Top Travel Destinations', 'There are countless incredible travel destinations around the world, each offering unique experiences and attractions. Here are some top destinations to consider for your next adventure:\r\n\r\nParis, France: Known as the \"City of Light,\" Paris is renowned for its iconic landmarks such as the Eiffel Tower, Notre-Dame Cathedral, and the Louvre Museum. Visitors can stroll along the charming streets, indulge in delicious French cuisine, and explore world-class art and culture.\r\n\r\nKyoto, Japan: With its stunning temples, traditional tea houses, and picturesque gardens, Kyoto is a treasure trove of Japanese history and culture. Visitors can experience the beauty of cherry blossoms in spring, participate in tea ceremonies, and wander through historic districts like Gion.\r\n\r\nSantorini, Greece: Famous for its whitewashed buildings, blue-domed churches, and breathtaking sunsets, Santorini is a dream destination for many travelers. Explore the island\'s charming villages, relax on stunning beaches, and savor fresh seafood overlooking the Aegean Sea.\r\n\r\nRome, Italy: As the capital of the ancient Roman Empire, Rome is a city steeped in history and architectural wonders. Highlights include the Colosseum, Vatican City, Roman Forum, and the Trevi Fountain. Don\'t forget to indulge in authentic Italian cuisine and gelato.\r\n\r\nMachu Picchu, Peru: Nestled high in the Andes Mountains, Machu Picchu is one of the most famous archaeological sites in the world. Hike the Inca Trail to reach this ancient citadel, marvel at the breathtaking views, and learn about the fascinating history of the Inca civilization.\r\n\r\nCape Town, South Africa: Offering a stunning coastline, diverse wildlife, and vibrant culture, Cape Town is a must-visit destination. Explore the iconic Table Mountain, visit the colorful Bo-Kaap neighborhood, and take a scenic drive along the Cape Peninsula.\r\n\r\nNew York City, USA: The bustling metropolis of New York City offers endless attractions, including Times Square, Central Park, the Statue of Liberty, and Broadway shows. Experience world-class museums, diverse cuisine, and vibrant neighborhoods in the city that never sleeps.\r\n\r\nBangkok, Thailand: A vibrant mix of ancient temples, bustling street markets, and modern skyscrapers, Bangkok is a city of contrasts. Explore historic sites like the Grand Palace and Wat Arun, sample delicious street food, and experience the city\'s vibrant nightlife.\r\n\r\nBarcelona, Spain: Known for its unique architecture, beautiful beaches, and lively atmosphere, Barcelona is a vibrant city with something for everyone. Explore the whimsical designs of Antoni Gaudí, stroll along the bustling Las Ramblas, and enjoy tapas in charming neighborhood cafes.\r\n\r\nDubai, UAE: A futuristic city known for its record-breaking skyscrapers, luxurious shopping malls, and desert adventures, Dubai offers a unique blend of modernity and tradition. Visit the iconic Burj Khalifa, explore traditional souks, and enjoy thrilling desert safaris.\r\n\r\nEach of these destinations offers its own charm, history, and experiences, making them top choices for travelers seeking unforgettable adventures around the world.', 0, '2024-05-04 08:30:00'),
(5, 'user5', 5, 'Delicious Vegan Recipes', 'Delicious vegan recipes offer a wide array of flavorful options that are both nutritious and satisfying. One popular recipe is vegan chickpea curry, combining chickpeas, vegetables, and aromatic spices like cumin, turmeric, and coriander for a hearty and flavorful dish. Another favorite is vegan lentil soup, packed with protein-rich lentils, vegetables, and herbs like thyme and bay leaves for a comforting and nutritious meal. For a lighter option, try a vegan Buddha bowl, featuring a mix of grains, roasted vegetables, leafy greens, and a flavorful tahini or avocado dressing. Additionally, vegan tacos filled with spicy black beans, avocado, salsa, and crunchy cabbage make for a delicious and easy-to-make meal. For dessert, indulge in vegan banana bread or chocolate avocado mousse, both satisfying treats made without animal products. These recipes showcase the versatility and deliciousness of plant-based cooking, proving that vegan meals can be both nutritious and incredibly tasty.', 0, '2024-05-05 07:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_categorise`
--

CREATE TABLE `post_categorise` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categorise`
--

INSERT INTO `post_categorise` (`cat_id`, `cat_name`) VALUES
(1, 'Technology'),
(2, 'Health'),
(3, 'Lifestyle'),
(4, 'Travel'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `reported_post`
--

CREATE TABLE `reported_post` (
  `reported_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `report_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reported_post`
--

INSERT INTO `reported_post` (`reported_id`, `post_id`, `user_id`, `report_status`) VALUES
(1, 1, 'user2', 0),
(2, 2, 'user1', 1),
(3, 3, 'user2', 2),
(4, 4, 'user3', 0),
(5, 5, 'user4', 1),
(6, 1, 'user1', 0),
(7, 1, 'user1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_media`
--
ALTER TABLE `blog_media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `post_categorise`
--
ALTER TABLE `post_categorise`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `reported_post`
--
ALTER TABLE `reported_post`
  ADD PRIMARY KEY (`reported_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_categorise`
--
ALTER TABLE `post_categorise`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reported_post`
--
ALTER TABLE `reported_post`
  MODIFY `reported_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_media`
--
ALTER TABLE `blog_media`
  ADD CONSTRAINT `blog_media_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `blog_user` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `post_categorise` (`cat_id`);

--
-- Constraints for table `reported_post`
--
ALTER TABLE `reported_post`
  ADD CONSTRAINT `reported_post_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `reported_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blog_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
