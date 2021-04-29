-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 05:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onepiece`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `coverLetter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `User_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `coverLetter`, `attachment`, `status`, `User_id`, `Position_id`, `created_at`, `updated_at`) VALUES
(31, 'Please accept me', NULL, 'Pending', 57, 44, '2021-04-29 11:23:47', '2021-04-29 11:23:47'),
(32, 'Pleeeeas', NULL, 'Pending', 58, 44, '2021-04-29 11:24:04', '2021-04-29 11:24:04'),
(33, NULL, NULL, 'Pending', 62, 45, '2021-04-29 11:24:18', '2021-04-29 11:24:18'),
(34, 'Obcaecati vero ullam', NULL, 'Accepted', 65, 47, '2021-04-29 11:24:24', '2021-04-29 11:24:24'),
(35, 'Culpa soluta illum', NULL, 'Pending', 66, 49, '2021-04-29 11:24:27', '2021-04-29 11:24:27'),
(36, 'Illo totam et iure v', NULL, 'Accepted', 86, 48, '2021-04-29 11:24:31', '2021-04-29 11:24:31'),
(37, 'Qui quis dolore est', NULL, 'Rejected', 65, 45, '2021-04-29 11:24:34', '2021-04-29 11:24:34'),
(38, 'Consequatur Enim pr', NULL, 'Rejected', 61, 46, '2021-04-29 11:24:37', '2021-04-29 11:24:37'),
(39, 'Dignissimos enim tem', NULL, 'Pending', 70, 49, '2021-04-29 11:24:41', '2021-04-29 11:24:41'),
(40, 'Amet natus modi ea', NULL, 'Accepted', 62, 47, '2021-04-29 11:24:44', '2021-04-29 11:24:44'),
(41, 'Libero suscipit quos', NULL, 'Pending', 73, 44, '2021-04-29 11:24:47', '2021-04-29 11:24:47'),
(42, 'Ut maxime tempor qui', NULL, 'Rejected', 66, 46, '2021-04-29 11:24:50', '2021-04-29 11:24:50'),
(43, 'Eum cupidatat dolore', NULL, 'Pending', 70, 44, '2021-04-29 11:24:53', '2021-04-29 11:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `comments`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 'Steel Bernard', 'wemul@mailinator.com', 'Nisi veritatis ad su', 'Lorem facere facilis', NULL, '2021-04-27 20:49:25', '2021-04-27 20:49:25'),
(2, 'Elaine Hull', 'dovag@mailinator.com', 'In quis incididunt f', 'Consectetur officia', NULL, '2021-04-27 20:49:30', '2021-04-27 20:49:30'),
(3, 'Imani Obrien', 'dupuk@mailinator.com', 'Quae est ex voluptat', 'Aut non mollit volup', NULL, '2021-04-27 20:49:35', '2021-04-27 20:49:35'),
(4, 'Fitzgerald Dodson', 'pusiw@mailinator.com', 'Nostrum reprehenderi', 'Officiis voluptatem', NULL, '2021-04-27 20:49:41', '2021-04-27 20:49:41'),
(5, 'Emily Hernandez', 'vosubak@mailinator.com', 'Ad odit eos sunt la', 'Pariatur Consequatu', NULL, '2021-04-27 20:49:46', '2021-04-27 20:49:46'),
(6, 'User Name', 'wuhigyzifu@mailinator.com', 'Company request account', 'Batatataaa', '1619625917.jpg', '2021-04-28 13:05:17', '2021-04-28 13:05:17'),
(7, 'Medge Weber', 'malel@mailinator.com', 'Aut sed sed ab incid', 'Quia id omnis autem', NULL, '2021-04-28 15:19:47', '2021-04-28 15:19:47'),
(8, 'Dean Bright', 'kaje@mailinator.com', 'Enim reprehenderit', 'Voluptatem Ratione', NULL, '2021-04-29 11:36:23', '2021-04-29 11:36:23'),
(9, 'Darius Bauer', 'suzezabep@mailinator.com', 'Odit aliquid earum a', 'Commodo labore eaque', NULL, '2021-04-29 11:38:55', '2021-04-29 11:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `College` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major`, `College`, `created_at`, `updated_at`) VALUES
(2, 'Electrical Engineering', '', '2021-04-14 19:04:21', '2021-04-14 19:04:21'),
(3, 'Mechanical Engineering', 'Engineering', '2021-04-14 19:04:32', '2021-04-23 09:20:52'),
(4, 'Biomedical Engineering', '', '2021-04-14 19:04:36', '2021-04-14 19:04:36'),
(5, 'Industrial Engineering', '', '2021-04-14 19:04:44', '2021-04-14 19:04:44'),
(6, 'Aeronautical Engineering', '', '2021-04-14 19:04:50', '2021-04-14 19:04:50'),
(7, 'Nuclear Engineering', '', '2021-04-14 19:04:55', '2021-04-14 19:04:55'),
(9, 'Doctor Of Pharmacy', '', '2021-04-14 19:05:27', '2021-04-14 19:05:27'),
(10, 'Nursing', '', '2021-04-14 19:05:41', '2021-04-14 19:05:41'),
(11, 'Midwifery', '', '2021-04-14 19:05:47', '2021-04-14 19:05:47'),
(12, 'Computer Engineering', '', '2021-04-14 19:06:00', '2021-04-14 19:06:00'),
(13, 'Computer Science', '', '2021-04-14 19:06:05', '2021-04-14 19:06:05'),
(14, 'Computer Information Systems', '', '2021-04-14 19:06:11', '2021-04-14 19:06:11'),
(15, 'Network Engineering And Security', '', '2021-04-14 19:06:18', '2021-04-14 19:06:18'),
(16, 'Software Engineering', '', '2021-04-14 19:06:23', '2021-04-14 19:06:23'),
(17, 'Arabic Language', '', '2021-04-14 19:06:52', '2021-04-14 19:06:52'),
(18, 'English Language & Linguistics', '', '2021-04-14 19:06:58', '2021-04-14 19:06:58'),
(19, 'Humanities', '', '2021-04-14 19:07:03', '2021-04-14 19:07:03'),
(20, 'Mathematics', '', '2021-04-14 19:07:09', '2021-04-14 19:07:09'),
(21, 'Chemistry', '', '2021-04-14 19:07:14', '2021-04-14 19:07:14'),
(22, 'Physics', '', '2021-04-14 19:07:20', '2021-04-14 19:07:20'),
(23, 'Applied Biological Sciences', '', '2021-04-14 19:07:31', '2021-04-14 19:07:31'),
(24, 'Biotechnology & Genetic Engineering', '', '2021-04-14 19:07:37', '2021-04-14 19:07:37'),
(25, 'orensic Sciences', '', '2021-04-14 19:07:43', '2021-04-14 19:07:43'),
(26, 'Animal Production', '', '2021-04-14 19:08:09', '2021-04-14 19:08:09'),
(27, 'Plant Production', '', '2021-04-14 19:08:15', '2021-04-14 19:08:15'),
(28, 'Nutrition & Food Technology', '', '2021-04-14 19:08:20', '2021-04-14 19:08:20'),
(29, 'Natural Resources & Environment', '', '2021-04-14 19:08:25', '2021-04-14 19:08:25'),
(30, 'Doctor Of Medicine', '', '2021-04-14 19:08:41', '2021-04-14 19:08:41'),
(31, 'Public Health', '', '2021-04-14 19:08:47', '2021-04-14 19:08:47'),
(32, 'Health Managment And Policy', '', '2021-04-14 19:08:52', '2021-04-14 19:08:52'),
(33, 'Paramedics', '', '2021-04-14 19:09:08', '2021-04-14 19:09:08'),
(34, 'Radiologic Technology', '', '2021-04-14 19:09:13', '2021-04-14 19:09:13'),
(35, 'Medical Laboratory Sciences', '', '2021-04-14 19:09:18', '2021-04-14 19:09:18'),
(36, 'Dental Technology', '', '2021-04-14 19:09:23', '2021-04-14 19:09:23'),
(37, 'Allied Dental Sciences', '', '2021-04-14 19:09:28', '2021-04-14 19:09:28'),
(38, 'Optometry', '', '2021-04-14 19:09:35', '2021-04-14 19:09:35'),
(39, 'Physical Therapy', '', '2021-04-14 19:09:41', '2021-04-14 19:09:41'),
(40, 'Occupational Therapy', '', '2021-04-14 19:09:47', '2021-04-14 19:09:47'),
(41, 'Audiology & Speech Pathology', '', '2021-04-14 19:09:52', '2021-04-14 19:09:52'),
(42, 'Clinical Rehabilitation Science', '', '2021-04-14 19:09:58', '2021-04-14 19:09:58'),
(43, 'Civil Engineering', 'Engineering', '2021-04-27 03:21:23', '2021-04-27 03:21:23');

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
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2021_04_01_121001_create_Majors_table', 1),
(40, '2021_04_03_000000_create_users_table', 1),
(41, '2021_04_05_192703_create_positions_table', 1),
(42, '2021_04_06_195025_create_testimonials_table', 1),
(43, '2021_04_08_201657_create_applications_table', 1),
(44, '2021_04_22_211909_create_contacts_table', 1),
(45, '2021_04_27_192610_create_reports_table', 1);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `majors` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `name`, `cover`, `title`, `skills`, `majors`, `type`, `address`, `attachment`, `city`, `status`, `User_id`, `about`, `created_at`, `updated_at`) VALUES
(44, 'Full stack-Developer', 'JobCoverPlaceholder.png', NULL, 'hi,Git,jQuery,bootstrap,angular,Maven,Bamboo ,JEE', 'Computer Engineering,Computer Science,Computer Information Systems,Network Engineering And Security,Software Engineering', 'Full time Paid', NULL, NULL, 'Amman', 'Open', 75, 'Develop and mentor technically Android team, role requires hands-on software development skills, deep technical expertise across the entire software delivery process, from content generation to delivery.\r\nWork closely with apple on new product and feature launches.\r\nDevelop mobile requirements & work closely with the product, design, third-party providers, vendors and the services teams to convert ideas to reality while managing all aspects of the software development lifecycle.\r\nProvide architectural guidance and direction to solve complex problems with simple solutions.\r\nProvide operational oversight to the developers on the team.\r\nUnderstand and share the big picture with the developers on the team.\r\nCreate technical documentation and keep it current.\r\nExpert knowledge of building responsive user experiences across phones and tablets.\r\nExpertise in performance, scalability, security, architecture, and engineering best practices.\r\nWillingness to stay up-to-date with the latest in emerging technologies/trends on mobile platforms.\r\nExperience engineering video centric products with knowledge of multi-bitrate streaming and casting.\r\nExperience integrating with third-party libraries such as video and display advertising.\r\nExperience implementing in-app purchase would be nice to have.\r\nExperience implementing personalization solutions would be nice to have.\r\nExperience providing guidance and oversight to the developers on the team Growth and Efficiency: Program mgmt. and governance to achieve Orange strategy targets (“Fit for Growth” and “Accelerate”) and ensure long term competitiveness (benchmark).\r\nOperational Support: provide support to operational units to ensure smooth operations and in building & monitoring budget, spend and forecasts vs targets, manage both monthly and yearly closing activities.\r\nSourcing Management: provide governance to increase sharing of teams across services and customers according to Digital services  Resource Management framework: support teams’ staffing by optimizing  balance of internal movements of resources to fulfill new demand vs new onboarding; internals vs externals; attrition; drop-outs; cross-service movements; workforce planning & supplier management.\r\nProcess Management: Quality and Improvements.\r\nEvolution: provide input to strategy to drive evolution and develop structural plans to improve organizational agility and adapt to customer requirements.', '2021-04-29 11:11:36', '2021-04-29 11:11:36'),
(45, 'Intermediate Developer', 'JobCoverPlaceholder.png', NULL, 'hi,Linux ,JavaScript,Rest – API,GWT,JSF,OpenLDAP,ReactJS,Maven', 'Computer Engineering,Computer Science,Computer Information Systems,Network Engineering And Security,Software Engineering', 'Full time Paid', NULL, NULL, 'Irbid', 'Open', 75, 'As part of a small Agile team distributed across multiple locations, our developer will:\r\n\r\nAssess, design, develop, integrate, test, and document software evolutions with a strong focus on Web based platform development with complex business features\r\nTroubleshoot software issues and fix bugs.\r\nParticipate actively and proactively to all project overviews and team meetings\r\n Overall daily tasks:\r\nCode developing\r\nOwnership of technical designs, code development, and component test execution to demonstrate alignment to the functional specification.\r\nUsing configuration management and integration/build automation tools to lead and deploy Java code.\r\nApplying knowledge of common, relevant architecture frameworks in defining and evaluating application architectures.\r\nDocumentation creation\r\nPerforming code reviews and providing critical suggestions for fixes and improvements\r\nSupporting issue analysis and fix activities during test phases, as well as providing support to project manager for production issue resolution.\r\nPerformance tuning Java-based applications.\r\nDeveloping and demonstrating a broad set of technology skills in Java technologies, micro service design patterns, Open Source libraries and frameworks, and technology architecture concepts.\r\nCollaborating within a project team with diverse and complementary skills', '2021-04-29 11:13:13', '2021-04-29 11:13:13'),
(46, 'Business Development Executive', 'JobCoverPlaceholder.png', NULL, 'hi,TCP,accounting , business and management,Demonstrated,selling technology solutions', 'Electrical Engineering,Mechanical Engineering,Industrial Engineering,Computer Engineering,Network Engineering And Security,Software Engineering,Applied Biological Sciences', 'Full time Paid', NULL, NULL, 'Zarqa', 'Open', 75, 'Like to work in IT & Communication,\r\n\r\nToying with cutting edge technologies and enjoying your life at the same time? Come closer to #LifeAtOrange.\r\n\r\nWe’ll recruit\r\n\r\nYou from the safety of your home and we’ll prepare you for the challenges of these\r\n\r\nTroubled times.For the\r\n\r\nTime being, our activity is carried out remotely.\r\n\r\n\r\nWhat we\'re looking for\r\nAn\r\nExperienced and at the\r\n\r\nSame time a self-improvement profile who likes to play on the ground of the highest\r\n\r\nBusiness sales approach;\r\n\r\nAn\r\nAmbitious and entrepreneurial spirit close to the core values of this position;\r\n\r\nhas advanced\r\nKnowledge of the sales process with the ability to understand and interpret\r\n\r\nCustomer needs, using fact-finding to identify sales opportunities;\r\n\r\nSomeone who has a high passion\r\nFor success and strong self motivation;\r\n\r\nSomeone who has technical\r\nKnowledge related to IT datacenter and cloud solutions (including server\r\n\r\nAnd storage services and equipment), CRM, ERP, mobile device management,\r\n\r\nSFA, M2M solutions, etc;\r\n\r\nSomeone who shows a keen interest\r\nIn the telecom industry and appetite for technology related topics and IT\r\n\r\nApplications;\r\n\r\nSomeone who is an effective team\r\nPlayer with strong work ethics;\r\n\r\nSomeone\r\nWho is patient\r\n\r\nWith repetitive tasks and has strong analytical skills;\r\n\r\nSomeone who is customer oriented\r\nAnd tries to deliver the best results, being able to listen to and meet\r\n\r\nThe expectations of our customers;\r\n\r\nSomeone who is able to work in a\r\n(Sometimes) stressful environment and is able to meet deadlines and track\r\n\r\nThe issues until they are resolved;', '2021-04-29 11:15:29', '2021-04-29 11:15:29'),
(47, 'Software Engineer', 'JobCoverPlaceholder.png', NULL, 'hi,Bootstrap,JQuery ,CSS,HTML,ReactJS', 'Mechanical Engineering,Computer Engineering,Computer Science,Computer Information Systems,Software Engineering', 'Full time Unpaid', NULL, NULL, 'Zarqa', 'Open', 78, 'Building, testing and deploying enhancements to new and existing software\r\nWrite a well-documented, tested code and ensure adherence to guidelines and standards, maintaining the best possible performance, quality, and responsiveness of the\r\napplications\r\nImplement and develop apps using JavaScript, NodeJS, ReactJS, HTML, CSSand Bootstrap\r\nEnsure the best possible performance, quality, and responsiveness of the applications\r\nIdentify bottlenecks and bugs, and devise solutions\r\nWork in all phases of software development life cycle, including design, research, development, deployment and testing to create a great user experience for users', '2021-04-29 11:18:49', '2021-04-29 11:18:49'),
(48, 'Senior Software Engineer', 'JobCoverPlaceholder.png', NULL, 'hi,Android ,Dagger,Rxjava,JSON,REST , Android SDK', 'Computer Engineering,Computer Science,Network Engineering And Security,Software Engineering,English Language & Linguistics', 'Part time Unpaid', NULL, NULL, 'Jerash', 'Open', 78, 'Design and build advanced applications for the Android platform\r\nCollaborate with cross-functional teams to define, design, and ship new feature\r\nWork with outside data sources and APIs\r\nUnit-test code for robustness, including edge cases, usability, and general reliability\r\nWork on bug fixing and improving application performance\r\nContinuously discover, evaluate, and implement new technologies to maximize development efficiency', '2021-04-29 11:20:29', '2021-04-29 11:20:29'),
(49, 'DIRECTOR - PROGRAM QUALITY', 'JobCoverPlaceholder.png', NULL, 'hi,planning ,communication,management ,strategic', 'Midwifery,Computer Science,Arabic Language,English Language & Linguistics,Humanities,Applied Biological Sciences,Public Health,Paramedics,Dental Technology,Occupational Therapy,Clinical Rehabilitation Science', 'Full time Unpaid', NULL, NULL, 'Mafraq', 'Closed', 80, 'CARE Turkey is seeking an experienced and innovative Director, Program Quality (DPQ) who will be a member of CARE Turkey\'s CORE Management Team (CMT). The DPQ will assume overall responsibility, leadership, and management of the CO\'s Program Quality Unit. The DPQ is expected to provide strategic leadership in the areas of program development, monitoring and evaluation, and learning as well as crosscutting technical expertise.\r\n\r\nIn this role, the Director, Program Quality, will lead the development of a coherent approach and set priorities to advance CI\'s Global Vision and Mission and Regional and Country Office priorities. S/he will oversee program quality for both the Cross Border and Refugee Program including, Knowledge management, program design and development, and program quality: monitoring, evaluation, learning, and impact measurement.\r\n\r\nThe DPQ will contribute significantly to the Country Office\'s commitment to long-term, quality programming. S/he will be expected to lead technical improvements in program design and development to ensure quality and adherence to programming standards and CARE\'s programming principles and also manage a team of professionals focused on the design, funding, monitoring, and evaluation of programs and projects (including emergency programs), , research, advocacy and communications that is informed by lessons learned and realities on the ground.', '2021-04-29 11:22:59', '2021-04-29 11:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `else` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `Date`, `time`, `page`, `pageLink`, `describe`, `device`, `OS`, `browser`, `version`, `else`, `email`, `created_at`, `updated_at`) VALUES
(1, '2021-04-14', 'Elit voluptate cons', 'In id atque iure qui', 'Illo vel quia omnis', 'Laborum molestiae ar', 'Desktop computer', 'Mac', 'Safari', 'Quis et qui molestia', 'Sunt in ea et irure', 'lekerubu@mailinator.com', '2021-04-27 20:49:18', '2021-04-27 20:49:18'),
(2, NULL, 'Id voluptas irure d', 'Adipisicing amet no', 'Aliquid modi aliqua', 'Quibusdam aut harum', 'Laptop', 'Mac', 'Samsung Internet', 'Quis quaerat cillum', 'Unde ipsum consequu', 'pyvez@mailinator.com', '2021-04-27 20:49:56', '2021-04-27 20:49:56'),
(3, NULL, 'Nam vero qui qui vol', 'Cum qui alias dolore', 'Sit quo velit labor', 'Sit saepe quidem an', 'Desktop computer', 'Linux', 'Firefox', 'Voluptatibus laborio', 'Officia exercitation', 'tymasyhol@mailinator.com', '2021-04-27 20:50:06', '2021-04-27 20:50:06'),
(4, NULL, 'Aut voluptatem Impe', 'Quae molestias labor', 'Aliquid rerum qui ex', 'Tempor delectus ape', 'Laptop', 'Windows', 'Samsung Internet', 'Commodi suscipit nul', 'Officia veniam anim', 'wicinumyk@mailinator.com', '2021-04-27 20:50:14', '2021-04-27 20:50:14'),
(5, NULL, 'Eaque amet dolorem', 'Dolor enim voluptate', 'Anim quae incidunt', 'Suscipit ipsa eaque', 'Desktop computer', 'Linux', 'Opera', 'Consectetur asperio', 'Aut quaerat qui beat', 'pegihydiwi@mailinator.com', '2021-04-27 20:51:04', '2021-04-27 20:51:04'),
(6, NULL, 'Modi laboriosam in', 'Ad exercitationem an', 'Quas aperiam qui mag', 'Voluptas id velit n', 'Tablet', 'Android', 'Safari', 'Eiusmod sit nostrud', 'Quae voluptatum qui', 'cykybaxo@mailinator.com', '2021-04-27 23:55:15', '2021-04-27 23:55:15'),
(7, NULL, 'Consequatur volupta', 'Qui ducimus vitae c', 'Et quas reprehenderi', 'Aperiam hic qui proi', 'Phone', 'Android', 'Firefox', 'Reiciendis sunt sit', 'Enim perferendis arc', 'soqixaxiw@mailinator.com', '2021-04-28 15:20:15', '2021-04-28 15:20:15'),
(8, NULL, 'Sunt laudantium exp', 'Quisquam cupidatat i', 'Dolores enim non dol', 'Debitis repudiandae', 'Phone', 'Linux', 'Brave', 'Quia culpa repellen', 'Cillum enim facere a', 'kugafod@mailinator.com', '2021-04-29 11:29:02', '2021-04-29 11:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultProfile.png',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `name`, `image`, `title`, `text`, `User_id`, `created_at`, `updated_at`) VALUES
(3, 'Ahmed E3mar', '16196220278f493a85197371.5d76b8fc0b8dd.gif', 'Full-Stack web developer', 'Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art.', NULL, '2021-04-28 09:00:27', '2021-04-28 09:00:27'),
(4, 'Hanan S. Al-Nimry', '1619622175Hi.jpg', 'Civil Engineering Professor', 'Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art.', NULL, '2021-04-28 09:02:55', '2021-04-28 09:02:55'),
(5, 'Khadeejah Hamdan', '1619622529NEOBK.jpg', 'Expert Lead Trainer', 'Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art.', NULL, '2021-04-28 09:08:49', '2021-04-28 09:08:49'),
(6, 'David Peterson', '161962256682069080_1280387222150662_2816459121140695040_o.jpg', 'Freelancer', 'Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable sources.', NULL, '2021-04-28 09:09:26', '2021-04-28 09:09:26'),
(7, 'Osama ahmed', '1619622639Tak.jpg', 'QC Manager', 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.', NULL, '2021-04-28 09:10:39', '2021-04-28 09:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultProfile.png',
  `coverImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'defultBack.jpg',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `phone`, `name`, `lname`, `image`, `coverImage`, `title`, `skills`, `nationality`, `linkedin`, `github`, `twitter`, `behance`, `portfolio`, `address`, `city`, `uni`, `about`, `cv`, `type`, `major_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(57, 'Abdallah.Eid@yahoo.com', '$2y$10$q5LyE7W1THuSi3iTUlMUM.WmCGDxYrHDQyp8UbNRnRlpzEoyyi.Au', '07735492571', 'Abdallah', 'AL Haj Eid', '1619645068Abdallah.jpg', '16196450684.jpg', 'Full Stack Junior Developer', ',HTML,Laravel,JavaScript,React,NodeJS', 'Jordanian', 'https://www.linkedin.com/in/abdallah-alhajeid/', 'https://github.com/Abdallah-Alhajeid', NULL, NULL, NULL, 'Samad', 'Irbid', NULL, 'Description about the trainee: ex: Highly talented individual with strong analytical skills desires to work as a Jr. Web Developer at XXX where ability to provide accurate analysis to complex business system problems and suggest useful solutions is needed. Bringing good knowledge of UMPH-specific business functions and similar computer systems, relevant programming and software tools, and basic knowledge of business systems and similar concepts.', '1619645068abdallah-Alhajeid-Cv.pdf', 'user', 13, NULL, NULL, '2021-04-28 18:24:28', '2021-04-29 11:41:42'),
(58, 'Adam@gmail.com', '$2y$10$iIUaZL4h/UHwilohce0laOe8pye7KD2jXVG.LH0XJNl5Mum4bCf4W', '0774351476', 'Adam', 'Abu Samra', '1619645469Personal_Pic.png', '1619645469purple-and-blue-cosmos-and-crocuses-flowers-painting-facebook-cover.jpg', 'Full-Stack web developer', ',PHP,Laravel,NodeJS,HTML,CSS', 'Jordanian', 'linkedin.com/in/adam-abusamra', 'https://trello.com/c/Yy8LnoXF/377-github', NULL, NULL, NULL, 'second circle', 'Amman', 'Tafila Technical University', 'I am Adam Abusamra a trainee at Coding Academy by Orange studying Full-Stack Web Development.\r\n\r\nDuring my training at the academy, I have developed a strong grasp over multiple programming languages and tools including but not limited to HTML, CSS, JavaScript, PHP/Laravel, MYSQL, Mongo DB, Express.js, React & React Native, Node.js, Python and other technologies.\r\n\r\nIn addition to my technical skills, I also possess a firm set of interpersonal and soft skills enabling me to interact and communicate with co-workers and teammates in an efficient and professional way, I have gained these skills by taking sessions in various soft skills topics that sum up to a total of 100 hours of sessions like, communication skills, Time & Responsibilities Management, Searching Skills, Design Thinking, Agile Project Management techniques, Work Ethics …and others, not only was it these sessions that sharpened my interpersonal skills, but it was also the collaborative work and projects in which we worked as groups and teams to accomplish a certain task or project.', '1619645469Adam_Abusamra_Web-Developer_CV.pdf', 'user', 25, NULL, NULL, '2021-04-28 18:31:09', '2021-04-28 18:31:09'),
(59, 'AnasMilhem@hotmail.com', '$2y$10$a/35yP8r/UVC2exrvTQKIOXTAsZl/YicRVhIPFRzBdq7O4A4inW2e', '0774236982', 'Anas', 'Milhem', '1619645636WhatsApp_Image_2021-03-22_at_12.01.22_AM.jpeg.jpg', '16196456363a16df8d7ddb3840a57e5aadf79b8ee2.jpg', 'trainee', ',Laravel,PHP,HTML,CSS,React', 'Jordanian', NULL, 'Milhem', NULL, NULL, NULL, NULL, 'Jerash', 'Jadara University', 'Coding has changed my world. It\'s not just about apps. Learning to code gave me problem-solving skills as well as a way to communicate with others on a technical level. I can also develop websites and use coding skills to get a better chance to find my favorite job. further, I learned it all at Coding Academy by Orange where they build your self-esteem and keep you motivated with different technology and language and a lot of soft skills training around 100 hour', '1619645636Anas_Melhem__CV.pdf', 'user', 31, NULL, NULL, '2021-04-28 18:33:56', '2021-04-28 18:33:56'),
(60, 'Aljawabrah@orange.com', '$2y$10$dJUEJeZsn7wm7u9lvO36TuoR3RjtJgqzNwBtjJRXld7wmJUeJhVbq', '07743236584', 'Anas', 'Aljawabrah', '1619646549anas.png', '1619646549download.jfif', 'Full Stack Junior Developer', ',NodeJS,LAravel,PHP,SASS,JavaScript', 'Jordanian', 'https://www.linkedin.com/in/anasjawabrah/', NULL, NULL, NULL, NULL, NULL, NULL, 'Jerash Private University', 'Jr. Web Developer with strong analytical skills desires to provide accurate analysis to complex business system problems and suggest useful solutions is needed via master web development framework and developer tools, and to acquire the technical info by practicing self-learning methodology.', '1619646549AnasAljawabrah_cv.pdf', 'user', NULL, NULL, NULL, '2021-04-28 18:49:09', '2021-04-28 18:49:09'),
(61, 'Ashraf.Jabari@pwc.com', '$2y$10$quu8r7zhm7z17TPWs9yVB.O9ODqfEysKkTxyyzovxGLova.XoLDYW', '0774125896', 'Ashraf', 'Al Jabari', '1619646671Ashraf_Al_Jabari.jpg', '1619646671nature-design.jpg', 'Full Stack Junior Developer', ',PHP,NodeJS,CSS,SASS,React', 'Jordanian', 'https://www.linkedin.com/in/ashraf-aljabari/', NULL, NULL, NULL, NULL, 'Szél utca 11-13', 'Amman', NULL, 'Since I was a little boy I was passionate about IT, this spark inside of me pushed me to learn everything actively and enjoy working on projects for days without getting procrastinating. Aspiring to learn the latest technologies and develop actual projects.', '1619646671Ashraf_Aljabari_-_Resume.pdf', 'user', NULL, NULL, NULL, '2021-04-28 18:51:11', '2021-04-28 18:51:11'),
(62, 'Data@pwc.com', '$2y$10$ED6ya6mx1/lWoA1JpgcwVuIDF.QXUXqfuSZHhpqBzQnNBsjnbUw.W', '0774125635', 'Dana', 'Toughoz', '1619646794Dana_Toughoj.jpg', '16196467944.jpg', 'Full Stack Junior Developer', ',PHP,NodeJS,CSS,SASS,React', 'Jordanian', 'https://www.linkedin.com/in/dana-toughoj/', NULL, NULL, NULL, NULL, NULL, 'Mafraq', 'Al al-Bayt University', 'A computer information system graduate, who has been established as a team-player; knowing how to effectively communicate with other people throughout university years, and also has a passion for learning new things; always aiming to continue growing both as a developer and as an individual.', NULL, 'user', 10, NULL, NULL, '2021-04-28 18:53:14', '2021-04-28 18:53:14'),
(63, 'Diaa@gmail.com', '$2y$10$8FiiM5A1JOmopIvgpl.B1OXUBNs4JkkddSHNtK56JLlhk8F1khLau', '0774125358', 'Dia\'a', 'Mohammad', '1619646921diaa.jpg', '1619646921cover_image.jpg.760x400_q85_crop_upscale.jpg', 'Full-Stack web developer', ',PHP,Laravel,React,CSS,SASS', 'Jordanian', NULL, NULL, NULL, NULL, NULL, NULL, 'Karak', NULL, 'Self-motivated, ambitious and eager to learn. I am a responsible individual\r\nwith strong communication skills and work ethics besides being creative, focused and highly determined. I am willing to take responsibility and work\r\nindependently. One of my objectives is to work in a challenging environment in a business company where I can utilize my capabilities to advance in my career in Customer Experience Field CX/UX/UI Design.', '1619646921DiaaJamilCV.pdf', 'user', 13, NULL, NULL, '2021-04-28 18:55:21', '2021-04-28 18:55:21'),
(64, 'Hala@pwc.com', '$2y$10$KNksOiI6DVQq7TY9iw.r/.J.WFsVigL7EV4V4i1byKur.1yfFVGQ.', '0771238546', 'Hala', 'Al-Hyasat', '1619647096IMG_20210404_115002.jpg', '161964709649588bb573d521482b58174210adbb77.jpg', 'Software Engineering', ',PHP,NodeJS,CSS,SASS,React', 'Jordanian', 'https://www.linkedin.com/in/hala-alhyasat/', NULL, NULL, NULL, NULL, NULL, 'Amman', 'Tafila Technical University', 'Dedicated and efficient full-stack developer, proficient in creating a user\r\ninterfaces, writing and testing codes, and troubleshooting issues.\r\nSeeking to further improve skills as the future full stack developer, excited\r\nto be at the deployment phase of my new career as a web developer, and\r\nlove to take up new challenges.', '1619647096Hala_-_CV.pdf', 'user', 12, NULL, NULL, '2021-04-28 18:58:16', '2021-04-28 18:58:16'),
(65, 'Zayed@gmail.com', '$2y$10$rqpunGl.Jfu16BSq6sOU..6iCXXY9FKtB8vQxHsBj9xvnHUSaXtvG', '0774258930', 'Laith', 'Zayed', '1619647875Screenshot_20210321-163544_Gallery.jpg', '16196478752019 IngramSpark Headers (March --_)-4.png', 'trainee', ',MongoDB,MERN,HTML,SASS,REACT', 'Jordanian', NULL, NULL, NULL, NULL, NULL, NULL, 'Amman', 'Hashemite University', 'I’m a Full-Stack Web and Mobile Development with engineering background, I got trained at coding academy by Orange, with a great knowledge in problem solving, technical skills and soft skills. I’m looking to bring my creativity with your opening job position.\r\n\r\nI had achieved a good skills in Back-end and front-end development, with 10 full project assigned and one of them as a master project for graduation, I have been used problem solving and time management technique to achieve all the required tasks and deliver projects according to requirements and standards accurately and within a specific period of time for each project.\r\n\r\nDuring the training period, more than 100 hours of soft skills were attended; most of this course focused on agile project management, innovation in IT world, market study and analyses, communication skills, design thinking, visual identity, time and responsibilities management, technical problem solving and UX/UI design.', '1619647875Laith-Zayed-CV.pdf', 'user', 16, NULL, NULL, '2021-04-28 19:11:15', '2021-04-28 19:11:15'),
(66, 'Lubna.Almaaweed@yahoo.com', '$2y$10$LJhci6oixT2fJcb73RbAiOzTFVS0qzFUaZW8Bxjy/BqahbT.uhzfe', '0774125800', 'Lubna', 'Almaaweed', '1619648043mine_(1).jpg', '1619648043purple-and-blue-cosmos-and-crocuses-flowers-painting-facebook-cover.jpg', 'Software Engineering', ',Laravel,React,MongoDB,SASS', 'Jordanian', 'Facere aut quis offi', 'Qui illum voluptas', 'Vero sequi exercitat', 'Nesciunt qui amet', 'Sit fugit exercita', NULL, NULL, 'Zarqa Private University', 'Take a challenging role as Full Stack\r\nWeb Developer in a highly technical\r\ncompany where I could utilize my skills in,\r\nWeb Development, and use these skills in\r\nproviding quality service to the company.', '1619648043cheatsheet-a5.pdf', 'user', 16, NULL, NULL, '2021-04-28 19:14:03', '2021-04-28 19:14:03'),
(67, 'Mohammad.Alzoubi@gmail.com', '$2y$10$xz98mCRoh2lW1O14R.I98Oilpx3seXLHeiMmYu41xubf2PPhXR.QC', '0774120059', 'Mohammad', 'Alzoubi', '1619648164mohammad.png', '161964816449588bb573d521482b58174210adbb77.jpg', 'Full-Stack web developer', ',PHP,Laravel,MERN,CSS', 'Jordanian', 'Rerum explicabo Ad', 'Saepe facere dolores', 'Amet magna et autem', 'Quidem quia quos dol', 'A nostrum illum vol', 'Irbid-Samad', 'Irbid', 'Jordan Academy of Music', 'I am a graduate of Computer engineering from Philadelphia University and\r\na Full-stack developer from Coding Academy by Orange.\r\n\r\nI am a junior Full-Stack Developer, with a wide knowledge\r\nI learned the following technologies:\r\nHTML5, CSS3, JavaScript, jQuery, SASS, Bootstrap, WordPress, React,\r\nReact Native, PHP/laravel,and Mysql.\r\nIn addition to the technical training I have taken one hundred hours of soft skills such as communication skills, Entrepreneurship, Presentation Skills, UX UI design, Agile Project Management techniques, Visual Identity, Technical Problem solving.', '1619648164abdallah-Alhajeid-Cv.pdf', 'user', 15, NULL, NULL, '2021-04-28 19:16:04', '2021-04-28 19:16:04'),
(68, 'Mohammed.Aljasem@hotMail.com', '$2y$10$s.CITEGPdmbnIwYhARAn6ueIHmAwszkxfpu2RhRXu61ESWD33adpK', '0774200593', 'Mohammed', 'Aljasem', '1619648269My_image.png', '16196482695853.jpg', 'trainee', ',Laravel,HTML,CSS,REACT', 'Jordanian', 'Rerum explicabo Ad', 'Elit ex consectetur', 'Vero est dolore vel', NULL, 'Culpa quasi qui amet', 'Irbid-Ajloun', 'Amman', 'Arab Open University', 'I come with highly valuable skill in web development with high energy to add, great value to provide and teamwork spirit and passion for developing websites. I have leadership and monitoring qualities, self-learning abilities, and I love to learn new technologies and share my knowledge with others.\r\n\r\nIf you are interested in a team-player who can make an immediate impact and add tangible value to your business, don\'t hesitate to contact me, I am your guy.', '1619648269cheatsheet-a5.pdf', 'user', 16, NULL, NULL, '2021-04-28 19:17:49', '2021-04-28 19:17:49'),
(69, 'Mohammed.Alshatnawi@gmail.com', '$2y$10$VBqfdJ.2/qDFEIz2O19FhOwY4.HJjYRGxIxbIQhjm1Vqwcedj9q3y', '0774103679', 'Mohammed', 'Alshatnawi', '1619648372Mohammed_Alshatnawi.PNG.png', '1619648372shutterstock_728178127-1520x800.png', 'OCA Trainer', ',PHP,Laravel,MERN,HTML,CSS,SASS', 'Jordanian', 'Doloremque ipsum re', 'Elit ex consectetur', 'Vero est dolore vel', 'Quidem quia quos dol', NULL, NULL, 'Amman', 'Amman Arab University', 'Description about the trainee: ex: Highly talented individual with strong analytical skills desires to work as a Jr. Web Developer at XXX where ability to provide accurate analysis to complex business system problems and suggest useful solutions is needed. Bringing good knowledge of UMPH-specific business functions and similar computer systems, relevant programming and software tools, and basic knowledge of business systems and similar concepts.', '1619648372abdallah-Alhajeid-Cv.pdf', 'user', 14, NULL, NULL, '2021-04-28 19:19:32', '2021-04-28 19:19:32'),
(70, 'Osama.Aburabie@gmail.com', '$2y$10$ZQkt04sZSKiEUqVXqsGqUeogB0Ly1Ma6ijPOmoNsVoxT7mdcbrPgu', '0774102368', 'Osama', 'Aburabi\'e', '1619648492F.jpg', '16196484928fa1ef705a6329d1d08069b3ec1e1aa7.jpg', 'Full-Stack web developer', ',PHP,LAravel,React,MERN,CSS,SASS,MongoDB', 'Jordanian', 'Doloremque ipsum re', 'Saepe facere dolores', 'Vero est dolore vel', 'Quidem quia quos dol', 'A nostrum illum vol', NULL, 'Zarqa', 'Petra University', 'Highly talented individual with strong analytical skills desires where ability to provide accurate analysis to complex business system problems and suggest useful solutions is needed. Bringing good knowledge of business functions and similar computer systems, relevant programming and software tools, and basic knowledge of business systems and similar concepts.', '1619648492Adam_Abusamra_Web-Developer_CV.pdf', 'user', 15, NULL, NULL, '2021-04-28 19:21:32', '2021-04-28 19:21:32'),
(71, 'RazanZuaiter@yahoo.com', '$2y$10$yKqe0.Bk1uNW2t9RWORyEu6Av9NDi6IuLQfLWZDWAyxq8Qw83dUTa', '0774266308', 'Razan', 'Zuaiter', '1619648593Screenshot_20210318-180150_Gallery_-_Copy.jpg', '161964859349588bb573d521482b58174210adbb77.jpg', 'Full Stack Junior Developer', ',CSS,SASS,MongoDB,MERN,Photoshop', 'Jordanian', 'Facere aut quis offi', NULL, 'Amet magna et autem', NULL, NULL, NULL, 'Zarqa', NULL, 'I am a recently graduated Communication engineering student from al Yarmouk university and a full-stack developer from Coding Academy by Orange.\r\nI am a junior Full-Stack Developer with a wide knowledge I have a lot of skills in web technologies using modern HTML, CSS, JavaScript, React, MERN, WordPress, PHP, Laravel, Python, and React Native.\r\nAlso, we have been training on major soft skills for 90 hours and implementing them, like UX/UI Design, Visual Identity, Design Thinking, Business Modeling, and more.', '1619648593cheatsheet-a5.pdf', 'user', 12, NULL, NULL, '2021-04-28 19:23:13', '2021-04-28 19:23:13'),
(72, 'Sara.Adas@bbc.com', '$2y$10$TZW3FHMztJUHiiTL.XlsruOEdHu1oQf2p2A41ZOVm3nxkwA7rntvK', '0774125630', 'Sara', 'Adas', '161964870546440632_1102819226553226_9030093165595459584_o_(2).jpg', '161964870549588bb573d521482b58174210adbb77.jpg', 'trainee', ',PHP,Laravel,VueJS,Angular', 'Jordanian', 'Rerum explicabo Ad', 'Elit ex consectetur', 'Harum nisi aspernatu', 'Quidem quia quos dol', NULL, NULL, 'Zarqa', 'Middle East University', 'Creative web developer dedicated to developing and optimizing interactive, user-friendly, and feature-rich websites. Leverage analytical skills and strong attention to detail in order to deliver original and efficient web solutions, provide technical knowledge and expertise, build new websites from start to finish, and successfully manage a team of web developers.', '1619648705Ashraf_Aljabari_-_Resume.pdf', 'user', 15, NULL, NULL, '2021-04-28 19:25:05', '2021-04-28 19:25:05'),
(73, 'Taima.Alfokaha@yahoo.com', '$2y$10$JEvtvVX.jIKPKwq0JJ0MVe4Rt2ueFRx/JOvdyNl3Zy3Hh9NhjzPyG', '07741259635', 'Taima', 'Al-fokaha\'', '1619648836taimaaaa.jpg', '16196488362019 IngramSpark Headers (March --_)-4.png', 'trainee', ',CSS,HTML,REACT,MERN', 'Jordanian', 'Doloremque ipsum re', 'Saepe facere dolores', 'Harum nisi aspernatu', 'Aut omnis cum a recu', NULL, NULL, 'Amman', 'Mutah University', 'Looking for a challenging role to utilize my technical, and\r\nmanagement skills for the growth of the organization as\r\nwell as to enhance my knowledge about new and emerging\r\ntrends in the IT sector.', '1619648836AnasAljawabrah_cv.pdf', 'user', 17, NULL, NULL, '2021-04-28 19:27:16', '2021-04-28 19:27:16'),
(74, 'mhmdobdour@gmail.com', '$2y$10$PS5XWK7RjIJHNMmk/W3KD.FsINN0m8Hng.Pvr68j8FQhq4QfErRkS', '0778982290', 'Mohammad', 'Omar', '161964941815493674_621516641371060_3632182591405634963_o.jpg', '1619649418Inside out.jpg', 'Full Stack Junior Developer', ',PHP,LAravel,REACT,MERN,JavaScript,Python,Django', 'Jordanian', 'https://www.linkedin.com/in/mohammad-bdour/', 'https://github.com/mhmdbdour', 'Vero est dolore vel', 'Quidem quia quos dol', 'Ea laborum Quis aut', 'Irbid-Samad', 'Irbid', 'Jordan University of Science and Technology', 'I learn new technologies quickly and apply those abilities to improve the work I do. Additionally, I have the passion to share my knowledge with others and work together and get projects done right.\r\n\r\nMy adaptability allows me to work in many different environments, in addition to speaking with people from various backgrounds.', '1619649418Mohammad Bdour CV.pdf', 'admin', 16, NULL, NULL, '2021-04-28 19:34:56', '2021-04-28 19:36:58'),
(75, 'Info@orange.com', '$2y$10$RgCn6d5bDRCaoHdpxJ/1NuE28fTvbTv/EvFEpizohcU3d8XC8Ijo2', '07777777777', 'Orange Jordan', NULL, '16196497261519911921408.png', '16196497261618249493768.jfif', 'Telecommunications', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amman', NULL, 'Jordan Telecom Group (JTG) plays a prominent role in the information and communications technology sector. It’s fixed, mobile, and internet services constitute the real base for the kingdom\'s telecommunications renaissance and contribute to its integration with regional and world countries.\r\nIn the biggest integration of its kind in the market, the JTG, in 2006, combined its four companies under one umbrella becoming the sole integrated operator in Jordan. In 2007, the Group adopted the Orange brand, one of the world\'s leading telecommunications companies, for all its fixed, mobile, internet and content services marking another significant achievement in the ICT sector. This step aimed at providing the Jordanian market with the standardized world class services of the Orange brand creating a clear difference in the lives of people who joined the Orange global family which encompasses 244 million customers in 220 countries and territories worldwide.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:42:06', '2021-04-28 19:42:06'),
(76, 'Esterdad@gmail.com', '$2y$10$WNBuGalNQob5IPOfDOb0b.PisulZAsIqGP7/rPSwMJbRBXFpP881a', '7741258962', 'Esterdad Center', NULL, '16196498011559097479459.png', '16196498011559098868531.jfif', 'Civic & Social Organization', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Irbid', NULL, 'A non-profit organization that works to qualifying people who wish to develop themselves through workshops, lect', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:43:22', '2021-04-28 19:43:22'),
(77, 'Info@pwc.com', '$2y$10$MG5NMFEn36bS7kyDTU/mWurjZtW2m/MmoNURfPAsRKbgOTV6W/16y', '0772653048', 'PwC', NULL, '16196499141593613945636.jfif', '16196499141593634856906.jfif', 'Accounting', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amman', NULL, 'At PwC, our purpose is to build trust in society and solve important problems. We’re a network of firms in 155 countries with over 284,000 people who are committed to delivering quality in assurance, advisory and tax services. Find out more and tell us what matters to you by visiting us at www.pwc.com. PwC refers to the PwC network and/or one or more of its member firms, each of which is a separate legal entity.\r\n\r\nContent on this page has been prepared for general information only and is not intended to be relied upon as accounting, tax or professional advice. Please reach out to your advisors for specific advice.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:45:14', '2021-04-28 19:45:14'),
(78, 'info@aspire.com', '$2y$10$n7sptYlvM9d7DL6tZstnyun1Ip33LessKnEdtEJPzNYxcM.CqPR5i', '0774123068', 'Aspire IT Services Partner', NULL, '16196500271571131151993.jfif', '16196500271589806382573.jfif', 'Information Technology & Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aspire is a leader in IT services based in Amman, Jordan. Since its launch in 2002, Aspire’s current team of 300+ professionals partner with primarily US and MENA clients to deliver a frictionless customer experience to more than 50M global online users. Aspire supports a variety of web based and digital enterprises focusing on 6 main service offerings across various industries:\r\n\r\n1. Mobile Development\r\n2. Software Development\r\n3. Professional Services\r\n4. Digital Transformation\r\n5. Cloud & DevOps\r\n6. QA & Testing\r\n\r\nAspire’s knowledge and experience with proven tools and frameworks allows for clients to achieve a higher return on investment and effectively deploy staff resources, while supporting flexibility and corporate objectives. Aspire offers a host of end-to-end services through custom-designed engagement models from a choice-list of geographical locations. Aspire has consistently remained a strong and steady vendor/partner to its clients, as evidenced by its long-standing client engagements. Aspire’s agile approach to service delivery ensures that the focus is always on “Value Derived for the Client”.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:47:08', '2021-04-28 19:47:08'),
(79, 'info@nrc.com', '$2y$10$dVmz3DRx9diPhlVFB2KUF.TIS3HD49kSz0zl3Y2jQQZFWoEwxE/x.', '0777565756', 'International Rescue Committee', NULL, '16196501631522173173886.png', '16196501631606924152214.jfif', 'Non-profit Organization Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Irbid-Samad', 'Irbid', NULL, 'The International Rescue Committee responds to the world’s worst humanitarian crises and help people to survive, recover, and gain control of their future.\r\n\r\nFounded in 1933 at the request of Albert Einstein, the IRC offers lifesaving care and life-changing assistance to refugees and displaced people forced to flee from war or disaster.\r\n\r\nAt work today in over 40+ countries and in 29 U.S. cities, the IRC restores safety, dignity and hope to millions who are uprooted and struggling to endure', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:49:23', '2021-04-28 19:49:23'),
(80, 'info@care.com', '$2y$10$yvnTRb5rz0ppZmgshZNPvuQDnH9BiD4iSFdV44huoF9qCHu5M/WDC', '0774523658', 'Care', NULL, '16196502791582566481306.png', '16196502791617218815390.jfif', 'Non-profit Organization Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CARE is a leading humanitarian global organization. We deliver lasting change to some of the world\'s poorest communities and place special focus on working alongside poor women because, equipped with the proper resources, women have the power to help whole families and entire communities escape poverty. In 2020, CARE worked in over 100 countries, reaching more than 90 million people through 1,300 projects. To learn more about CARE, visit www.CARE.org.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:51:19', '2021-04-28 19:51:19'),
(81, 'info@sci.com', '$2y$10$Z/OfHW4fMjPksd.WAyJmYuxJbbDaooAvboul0bME0KdZ649MHflQS', '07741259893', 'Save the Children International', NULL, '16196503741611134232129.jfif', '16196503741599207480927.jfif', 'Non-profit Organization Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Save the Children\r\n\r\nSave the Children is the world\'s leading independent organisation for children. We work in around 120 countries. Our vision is to live in a world in which every child attains the right to survival, protection, development and participation.\r\n\r\nLast year Save the Children\'s programmes and campaigns reached more than 55 million children directly around the world, through our and our partners\'​ work.\r\n\r\nWe work to inspire breakthroughs in the way the world treats children and to achieve immediate and lasting change in their lives. Across all of our work, we pursue several core values: accountability, ambition, collaboration, creativity and integrity.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:52:54', '2021-04-28 19:52:54'),
(82, 'info@plan.com', '$2y$10$BhmQ/37yw1e89BKNDFJFQ.xmMImIZPMEiJUeOi5Mx7jeY6pEDOqVu', '0774125896', 'Plan International', NULL, '16196505071576082712199.jfif', '16196505071614847729363.jfif', 'Non-profit Organization Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Plan International is a development and humanitarian organisation that advances children’s rights and equality for girls.\r\n\r\nWe strive for a just world, working together with children, young people, our supporters and partners.\r\n\r\nWe are independent of governments, religions and political parties.\r\n\r\nWhat does Plan International do?\r\n\r\nWe work with children, young people and communities to tackle the root causes of discrimination against girls, exclusion and vulnerability.\r\n\r\nWe support children’s rights from birth until they reach adulthood. Our work enables children to prepare for and respond to crises and adversity.\r\n\r\nWe drive changes in practice and policy at local, national and global levels using our reach, experience and knowledge.\r\n\r\nPlan International has been building powerful partnerships for children for over 75 years, and is active in over 70 countries', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:55:07', '2021-04-28 19:55:07'),
(83, 'info@Oxfam.com', '$2y$10$psRsIh2GK.4JXUFzq6247O8rZrZN8QhTLHP5KdqgqxPKTTkRG9zki', '0774103658', 'Oxfam', NULL, '16196506021551261387275.jfif', '16196506021611083403187.jfif', 'Non-profit Organization Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oxfam is a vibrant global movement of dedicated people fighting poverty - together.\r\n\r\nOxfam fights poverty in three ways: Campaigning, Development and Emergency Response.\r\n\r\nCampaigning for change: Poverty isn’t just about lack of resources. In a wealthy world it’s about bad decisions made by powerful people. Oxfam campaigns hard, putting pressure on leaders for real lasting change.\r\n\r\nDevelopment work: Poor people can take control, solve their own problems, and rely on themselves – with the right support. Fighting poverty, we fund long-term work worldwide.\r\n\r\nEmergency response: People need help in an emergency – fast. We save lives, swiftly delivering aid, support and protection; and we help people prepare for future crises.\r\n\r\nOxfam also has around 670 shops in the UK and an online shop selling over 100,000 volunteer-listed second-hand clothes, books, music and collectables, plus Fairtrade and ethical gifts: http://www.oxfam.org.uk/shop\r\n\r\nInterested in working for Oxfam? Why not click on our Linkedin \'careers\'​ tab or visit jobs.oxfam.org.uk. We\'re also on Twitter @oxfamgbjobs.\r\n\r\nNB This profile represents and is run by Oxfam GB in the UK - www.oxfam.org.uk.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:56:42', '2021-04-28 19:56:42'),
(84, 'info@NextGen.com', '$2y$10$VGO4bCzCeYOIw4zQcgITpuMW64QUPvtazmEVHbrdCwv3lEQSo3uwu', '0774125931', 'NextGen Healthcare', NULL, '16196507461519906935700.png', '16196507461612383714164.jfif', 'Information Technology & Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NextGen Healthcare is on a relentless quest to improve the lives of those who practice medicine and those they care for. We provide tailored solutions to fit the precise needs of ambulatory practices, as they strive to reach the quadruple aim while navigating the journey of value-based care. The result? Healthier patients and happier providers.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 19:59:06', '2021-04-28 19:59:06'),
(85, 'info@Amazon.com', '$2y$10$buEsu1swH1hVf0wirXUQFuUCDvG2uACMNfK.CSc.3uqcUBXiyhHw6', '07741203698', 'Amazon', NULL, '16196508981612205615891.jfif', '16196508981619644672652.jfif', 'Internet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amazon is guided by four principles: customer obsession rather than competitor focus, passion for invention, commitment to operational excellence, and long-term thinking. We are driven by the excitement of building technologies, inventing products, and providing services that change lives. We embrace new ways of doing things, make decisions quickly, and are not afraid to fail. We have the scope and capabilities of a large company, and the spirit and heart of a small one.\r\n\r\nTogether, Amazonians research and develop new technologies from Amazon Web Services to Alexa on behalf of our customers: shoppers, sellers, content creators, and developers around the world.\r\n\r\nOur mission is to be Earth\'s most customer-centric company. Our actions, goals, projects, programs, and inventions begin and end with the customer top of mind.\r\n\r\nYou\'ll also hear us say that at Amazon, it\'s always \"Day 1.\"​ What do we mean? That our approach remains the same as it was on Amazon\'s very first day - to make smart, fast decisions, stay nimble, invent, and focus on delighting our customers.', NULL, 'company', NULL, NULL, NULL, '2021-04-28 20:01:38', '2021-04-28 20:01:38'),
(86, 'Ayah.Khawaldeh@gmail.com', '$2y$10$UZEx5VBokb1zYO4CQQ3yKe/HHomTAxlMn9XhFpUOgVdVQ.Uk1Fg3q', '0774120369', 'Ayah', 'Khawaldeh', '1619690471received_256000959494417.jpeg.jpg', '16196904834.jpg', 'Full-Stack web developer', ',PHP,MongoDB,Django,Python,HTML,CSS,SASS', 'Jordanian', 'Facere aut quis offi', 'Elit ex consectetur', 'Amet magna et autem', 'Aut omnis cum a recu', 'Non voluptas vel ea', 'Irbid-Samad', 'Irbid', 'JUST', 'I\'m a Full-Stack web developer who trained at Coding\r\nAcademy from Orange, and so is me\r\nThe third year in computer engineering at the University of\r\nJordan during the training period that she obtained\r\nBasic and technical coding skills and the most used programming\r\nlanguages including (HTML, CSS, PHP,\r\nJavascript, jQuery, Sass) in addition to some other frameworks and\r\ntechnologies such as (WordPress,\r\nMySQL, javascript, bootstrap, Visual Studio, Git, laravel) with the ability to teach me\r\nOnline resource when needed.\r\nI am flexible enough to work nights, weekends, and even vacations\r\nif needed. I have a good eye for details along with excellent project\r\nmanagement and problem-solving skills due to\r\nSoft Skills Academy Training Camp for 100 hours. I also have\r\ngreat organizational skills with the ability to work efficiently and\r\nmeet tight deadlines.\r\nMy goal is to learn as many skills and techniques as possible,as\r\nwell as acquire them. That will help me achieve a good career in IT\r\n. This position will give me the boost I need to get started. I am a\r\nhard worker and a quick learner', '1619690644cheatsheet-a5.pdf', 'user', 13, NULL, NULL, '2021-04-29 06:59:38', '2021-04-29 07:54:26'),
(87, 'Monther.Twaissi@gmail.com', '$2y$10$d/rEvQRRaPOrE2Y8Nij65elMlv6VZR3XKjRXk0Bjev4pz6h7drjby', '0773158039', 'Monther', 'Twaissi', '161970485520200710_160823_(1).jpg', '1619704855cover_image.jpg.760x400_q85_crop_upscale.jpg', 'Full-Stack web developer', ',PHP,Laravel,HTML,CSS,SASS,Python ,Django', 'Jordanian', 'Doloremque ipsum re', 'Saepe facere dolores', 'Vero est dolore vel', 'Tempor provident ve', 'Culpa quasi qui amet', 'Irbid-Samad', 'Irbid', 'The University of Jordan', 'I started my career as a civil engineer, which allowed me to build analytical logic and problem-solving. But I have always been passionate about programming, so after finishing university I started thinking of a career in it. Joining the Coding Academy by Orange was my serious move towards refining both: hard and soft skills and empowering my active learning mindset.\r\nAlways working on mastering required skills to get the chance to be productive and implement real technical products.', '1619704921Mohammad.pdf', 'admin', 12, NULL, NULL, '2021-04-29 11:00:41', '2021-04-29 11:06:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD UNIQUE KEY `applications_user_id_position_id_unique` (`User_id`,`Position_id`),
  ADD KEY `applications_position_id_foreign` (`Position_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `positions_user_id_foreign` (`User_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `testimonials_user_id_foreign` (`User_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_major_id_foreign` (`major_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_position_id_foreign` FOREIGN KEY (`Position_id`) REFERENCES `positions` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`major_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
