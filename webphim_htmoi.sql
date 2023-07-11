-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 07:40 AM
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
-- Database: `webphim_htmoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Phim chiếu rạp', '123', '1', 'phim-chieu-rap', '2023-07-05 21:41:36', '2023-07-05 21:41:48'),
(2, 'Phim bộ', '123', '1', 'phim-bo', '2023-07-05 21:42:03', '2023-07-05 21:42:03'),
(3, 'Phim lẻ', '123', '1', 'phim-le', '2023-07-05 21:42:21', '2023-07-05 21:42:27'),
(4, 'Anime', '123', '1', 'anime', '2023-07-05 23:29:21', '2023-07-05 23:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', '123', '1', 'viet-nam', '2023-07-05 21:43:13', '2023-07-05 21:43:13'),
(2, 'Hàn Quốc', '123', '1', 'han-quoc', '2023-07-05 21:43:26', '2023-07-05 21:43:26'),
(3, 'Nhật Bản', '123', '1', 'nhat-ban', '2023-07-05 23:29:52', '2023-07-05 23:29:52'),
(4, 'Mỹ', 'usa', '1', 'my', '2023-07-09 02:12:30', '2023-07-09 02:12:30'),
(5, 'Trung Quốc', 'china', '1', 'trung-quoc', '2023-07-10 20:47:49', '2023-07-10 20:47:49'),
(6, 'Âu Mỹ', 'au my', '1', 'au-my', '2023-07-10 21:13:19', '2023-07-10 21:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `linkphim` varchar(1024) NOT NULL,
  `episode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `created_at`, `updated_at`) VALUES
(10, 15, 'asd', 1, '2023-07-10 09:07:08', '2023-07-11 04:21:14'),
(11, 15, 'asd', 3, '2023-07-10 09:07:14', '2023-07-11 04:21:24'),
(12, 15, 'asd', 2, '2023-07-10 09:07:23', '2023-07-11 04:21:06'),
(13, 16, 'asd', 1, '2023-07-11 03:09:48', '2023-07-11 04:20:55'),
(14, 17, 'asd', 1, '2023-07-11 03:59:08', '2023-07-11 04:20:47'),
(15, 17, 'asd', 2, '2023-07-11 03:59:17', '2023-07-11 04:20:36'),
(16, 18, 'https://kd.opstream3.com/share/bb4df4040cf296bb8e3e4e090827da37', 1, '2023-07-11 04:16:52', '2023-07-11 04:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kinh dị', '123', '1', 'kinh-di', '2023-07-05 21:42:38', '2023-07-05 21:51:32'),
(2, 'Hài kịch', '123', '1', 'hai-kich', '2023-07-05 21:42:46', '2023-07-05 21:42:46'),
(3, 'Viễn tưởng', '123', '1', 'vien-tuong', '2023-07-05 21:42:55', '2023-07-05 21:42:55'),
(4, 'Hoạt hình', 'hoạt hình', '1', 'hoat-hinh', '2023-07-08 02:47:47', '2023-07-08 02:47:47'),
(5, 'Phiêu lưu', 'phiêu lưu', '1', 'phieu-luu', '2023-07-08 02:48:32', '2023-07-08 02:48:32'),
(6, 'Cổ Trang', 'co trang', '1', 'co-trang', '2023-07-10 20:41:37', '2023-07-10 20:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2023_07_05_071306_create_categories_table', 2),
(22, '2023_07_05_071355_create_genres_table', 2),
(23, '2023_07_05_071402_create_countries_table', 2),
(24, '2023_07_05_071412_create_movies_table', 2),
(25, '2023_07_05_071430_create_episodes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `movie_hot` int(10) UNSIGNED NOT NULL,
  `title_other` varchar(255) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `vietsub` int(11) NOT NULL DEFAULT 0,
  `year` varchar(20) DEFAULT '2023',
  `duration` varchar(50) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `trailer` varchar(100) DEFAULT NULL,
  `episode_number` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `description`, `status`, `image`, `category_id`, `country_id`, `genre_id`, `created_at`, `updated_at`, `movie_hot`, `title_other`, `resolution`, `vietsub`, `year`, `duration`, `tags`, `topview`, `season`, `trailer`, `episode_number`) VALUES
(7, 'NIMONA', 'nimona', 'Nimona là một bộ phim hài phiêu lưu khoa học giả tưởng hoạt hình trên máy tính của Mỹ năm 2023 do Nick Bruno và Troy Quane đạo diễn từ kịch bản của Robert L. Baird và Lloyd Taylor. Nó dựa trên tiểu thuyết đồ họa cùng tên năm 2015 của ND Stevenson. Bị đổ oan tội ác bi thảm, hiệp sĩ nọ bắt tay với một thiếu nữ kiên cường, có khả năng thay đổi hình dạng để minh oan. Nhưng sẽ ra sao nếu cô là con quái vật anh thề sẽ tiêu diệt?', '1', 'PF3clszl79.jpg', 4, 3, 2, '2023-07-05 23:31:06', '2023-07-07 02:27:34', 1, 'Nimona (2023)', 0, 0, '2021', '135 Phút', NULL, 0, 0, NULL, 1),
(8, 'ANH EM SUPER MARIO', 'anh-em-super-mario', 'Phim anh em Super Mario là một bộ phim điện ảnh hoạt hình máy tính thuộc thể loại kỳ ảo hành động giả tưởng công chiếu năm 2023 dựa trên thương hiệu trò chơi điện tử nổi tiếng Mario của Nintendo, do công ty Illumination sản xuất dưới sự tài trợ của Universal Pictures và Nintendo, và được phân phối phát hành bởi Universal. Bộ phim kể về một câu chuyện về hai anh em mang tên Mario và Luigi, hai anh thợ sửa ống nước người Mỹ gốc Ý được chuyển đến một thế giới khác và bị vướng vào trận chiến giữa Vương quốc Nấm, do Công chúa Peach lãnh đạo và Koopas, do Bowser lãnh đạo.', '1', 'lpvaYY2l34.jpg', 1, 2, 2, '2023-07-05 23:31:59', '2023-07-07 02:27:28', 1, 'The Super Mario Bros. Movie (2023)', 2, 0, '2022', '133 Phút', NULL, 2, 0, NULL, 1),
(9, 'QUÂN ĐOÀN SIÊU ANH HÙNG', 'quan-doan-sieu-anh-hung', 'Quân Đoàn Siêu Anh Hùng – Legion of Super Heroes là bộ phim hành động do mỹ sản xuất năm 2023, dưới sự chỉ đạo của Jeff Wamester, cùng các diễn viên tham gia: Jensen Ackles, Matt Bomer, Darin De Paul,… Nội dung phim xoay quanh cuộc sống của Kara sau khi người minh yêu là Krypton chết đã làm cho cô vô cùng đau buồn, giờ đây cô ấy phải cố gắng tập quen dần cuộc sống mới, bên cạnh nhờ những người bạn siêu nhiên chăm sóc tận tình. Chuyện chưa yên ổn thì Kara phải đối đầu với 1 thế lực bí ẩn tên là “Vòng Tròn Đen Tối” chúng đang truy tìm 1 loại vũ khí đáng sợ được cất giữ trong học viện. Mời các bạn cùng đón xem phim Quân Đoàn Siêu Anh Hùng – Legion of Super Heroes.', '1', 'ZNKhUEel35.jpg', 4, 3, 2, '2023-07-05 23:52:50', '2023-07-06 19:55:05', 1, 'Legion of Super Heroes (2023)', 1, 0, '2022', '152 Phút', 'CÔ BẠN TÔI, THẦM THÍCH, LẠI QUÊN MANG KÍNH RỒI, giải trí', 0, 0, NULL, 1),
(10, 'CÔ BẠN TÔI THẦM THÍCH LẠI QUÊN MANG KÍNH RỒI', 'co-ban-toi-tham-thich-lai-quen-mang-kinh-roi', 'Komura thích Mie, người ngồi cạnh anh ấy. Tuy nhiên, một ngày nọ, Komura phát hiện ra rằng đôi mắt của Mie trở nên rất hung dữ. Hóa ra cô ấy quên đeo kính, vì vậy Komura đã cố gắng giúp Mie, người không thể không nhìn rõ. Chỉ là Mie-san quên đeo kính hơn một ngày thôi. Đối mặt với tất cả các loại cuộc gặp gỡ gần gũi do tầm nhìn ba chiều kém, trái tim của Komura có thể chịu nổi không?', '1', 'cEEXGKel88.jpg', 4, 3, 2, '2023-07-05 23:53:47', '2023-07-06 19:54:55', 1, '好きな子がめがねを忘れた (2023)', 4, 1, '2023', '135 Phút', 'CÔ BẠN TÔI, THẦM THÍCH, LẠI QUÊN MANG KÍNH RỒI, giải trí', 1, 0, NULL, 1),
(11, 'XÁC ƯỚP: CUỘC PHIÊU LƯU ĐẾN LONDON', 'xac-uop-cuoc-phieu-luu-den-london', 'Xác Ướp: Cuộc Phiêu Lưu Đến London – Mummies, là một bộ phim hài hoạt hình máy tính bằng tiếng Anh năm 2023 của Tây Ban Nha do Juan Jesús García Galocha đạo diễn từ kịch bản của Javier López Barreira và Jordi Gasull và một câu chuyện của Gasull. Phim có sự tham gia lồng tiếng của Joe Thomas, Eleanor Tomlinson, Celia Imrie, Hugh Bonneville và Sean Bean.\r\n\r\nSâu dưới lòng đất, một vương quốc xác ướp với lịch sử cả ngàn năm đang rất thịnh vượng. Theo thông lệ, công chúa Nefer phải kết hôn với Thut dù cả hai đều không bằng lòng với chuyện này. Nhưng vì không thể thoát khỏi yêu cầu của thần, Thut bắt buộc phải kết hôn với Nefer trong vòng 7 ngày, cùng với chiếc nhẫn các Pharaoh đã ban cho anh. Bước ngoặt xảy ra khi chiếc nhẫn bị đánh cắp, vậy nên cả Thut, Nefer cùng cậu em trai Sekhem và chú cá sấu đáng yêu Croc cùng nhau chu du đến London nhằm tìm lại chiếc nhẫn quý giá, và rồi nhận ra những thay đổi trong trái tim mình.', '1', 'rY2KQJll42.jpg', 1, 3, 2, '2023-07-07 01:54:47', '2023-07-08 06:29:36', 1, 'Mummies (2023)', 5, 0, '2023', '88 Phút', 'xác ướp, cuộc phiêu lưu, londo,', 1, 0, 'KQpu_Uvr920', 1),
(14, 'MAVKA: THẦN THOẠI RỪNG XANH', 'mavka-than-thoai-rung-xanh', 'Mavka: Thần Thoại Rừng Xanh – Mavka: The Forest Song là một bộ phim hài kịch giả tưởng hoạt hình bằng máy tính tiếng Anh năm 2023 của Ukraine do Oleh Malamuzh và Oleksandra Ruban đạo diễn. Dựa trên vở kịch The Forest Song của nhà thơ Lesya Ukrainka, bộ phim lấy cảm hứng từ thần thoại dân gian Ukraine và Slavic.\r\n\r\nCâu chuyện kể về Mavka – người nắm giữ linh hồn của rừng xanh phải đối mặt với sự lựa chọn bất khả thi giữa tình yêu và nghĩa vụ bảo vệ khu rừng. Khi cô vô tình gặp và phải lòng với Lukas – nhạc sĩ tài ba đến khu rừng nhằm tìm kiếm loài cây mang đến sự sống vĩnh cửu theo lời dụ dỗ của Kylina – kẻ ác đang tham vọng chiếm đoạt lấy sự bình yên của khu rừng.', '1', 'j1GmPEJl34.jpg', 4, 4, 4, '2023-07-10 09:04:03', '2023-07-10 02:06:50', 1, 'Mavka: The Forest Song', 2, 1, '2023', '99 Phút', 'Mavka, Thần thoại rừng xanh', 1, 0, NULL, 5),
(15, 'NGUỒN NHÂN LỰC', 'nguon-nhan-luc', 'Nguồn Nhân Lực Phần 2 - Human Resources Season 2 phim xoay quanh cuộc sống trong một công ty đại diện cho thế giới nhân vật quái vật từ loạt phim hoạt hình Big Mouth. Những con quái vật, mỗi người mang một đặc điểm riêng biệt như Hormone Monster, Hormone Monstress, Maury, Connie, Jay, Missy, Nick, Jessi và các nhân vật khác, tất cả đều phải làm việc trong môi trường công sở.', '1', 'wZ1sALil82.jpg', 1, 4, 5, '2023-07-10 09:06:24', '2023-07-10 02:06:46', 1, 'Human Resources', 4, 0, '2022', '25 phút/tập', 'NGUỒN NHÂN LỰC', 1, 2, NULL, 10),
(16, 'VỆ BINH DẢI NGÂN HÀ 3', 've-binh-dai-ngan-ha-3', 'Vệ Binh Dải Ngân Hà 3 - Guardians of the Galaxy Vol. 3, sau cái chết của Gamora, Peter Quill và phi hành đoàn của mình tiếp tục lao vào cuộc chiến mới để bảo vệ hòa bình của dải ngân hà. Và trong lần này, nhóm của Quill chỉ được phép thắng nếu không đến cả mạng sống của chính mình cũng không thể bảo toàn được.', '1', 'q53OhLXl47.jpg', 3, 4, 3, '2023-07-11 03:07:13', '2023-07-10 20:11:44', 1, 'Guardians of the Galaxy Volume 3 (2023)', 4, 1, '2023', '150 Phút', 'vệ binh, giải ngân hà', 0, 3, NULL, 1),
(17, 'TRƯỜNG PHONG ĐỘ', 'truong-phong-do', 'Trường Phong Độ – Destined (2023) là bộ phim cổ trang do Doãn Đào đạo diễn với sự tham gia của Bạch Kính Đình và Tống Dật. Bộ phim được chuyển thể từ tiểu thuyết cùng tên của Mặc Thư Bạch, kể về câu chuyện của Liễu Ngọc Như con gái của một thương gia buôn vải ở Dương Châu, người đã bị bạo hành từ khi còn nhỏ, và Cố Cửu Tư một tay chơi nổi tiếng ở địa phương.\r\n\r\nĐó là câu chuyện cảm động về hai con người với những tính cách rất khác nhau trong một cuộc hôn nhân đặt nhầm chỗ, từ xung đột lẫn nhau đến hỗ trợ lẫn nhau và hàn gắn lẫn nhau. Ngọc Như con gái của một thương gia buôn vải ở Dương Châu, mẹ ruột bị bệnh nặng, người vợ lẽ đối xử tệ bạc với cô từ khi còn nhỏ.\r\n\r\nCô đã bị gia đình sắp đặt để kết hôn với Cửu Tư – một tay chơi nổi tiếng ở Dương Châu. Cửu Tư cho rằng cô kết hôn với anh ta vì anh ta có quyền lực, nên rất khinh thường cô. Ngọc Như chợt nhận ra rằng số phận của cô không thể bị ràng buộc bởi cuộc hôn nhân với người khác, vì vậy cô quyết định học cách kinh doanh, để độc lập và tìm ra giá trị bản thân.\r\n\r\nSau khi làm việc chăm chỉ, Ngọc Như đã xuất sắc vượt qua bài kiểm tra của mẹ Cố và dần trở nên thành thạo trong kinh doanh, trong quá trình đó, cô đã thay đổi cách nhìn về Cửu Tư và khám phá ra khía cạnh tốt đẹp của đối phương. Tuy nhiên, vào thời điểm này, sứ thần Dương Châu Vương Thiện Tuyền độc ác và ngang ngược, khiến người dân phải di dời, và Cố Gia cũng phải di dời đi.\r\n\r\nĐể chấm dứt tình trạng hỗn loạn và để người dân được sống trong hòa bình, Cửu Tư bắt đầu hành động, quét sạch những tệ nạn và giảm nhẹ thuế. Ngọc Như đã xây dựng các hội trường từ thiện và giao lưu thương mại với bên ngoài, điều này làm cho vật tư thịnh vượng và người dân khỏe mạnh, hai người cùng nhau viết nên một câu chuyện về một cuộc sống tươi đẹp.', '1', 'xlwptZHl66.jpg', 2, 5, 6, '2023-07-11 03:43:05', '2023-07-11 03:48:26', 1, 'Destined (2023)', 4, 0, '2023', '45 phút/ tập', 'TRƯỜNG PHONG ĐỘ', NULL, 0, 'm4yCuKqdeLs', 36),
(18, 'TRÒ TIÊU KHIỂN', 'tro-tieu-khien', 'Trong khi bị thẩm vấn bởi một bác sĩ tâm thần của cảnh sát, Tabitha gần như bị căng thẳng cố gắng giải thích lý do tại sao cô và hai người bạn thời thơ ấu của mình lại bị săn lùng bởi một kẻ giết người hàng loạt. Sự thật sắp được phơi bày đan kết ba bí mật bi thảm từ quá khứ của họ lại với nhau. Hai bạn trai của các cô gái vô tình trở thành mục tiêu trong trò chơi chết người của họ.', '1', 'tro-tieu-khien-thumb54.jpg', 1, 6, 1, '2023-07-11 04:15:33', '2023-07-11 04:15:33', 1, 'Amusement', 4, 0, '2023', '85 Phút', 'TRÒ TIÊU KHIỂN, Amusement', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HieuDev', 'hieu29dhxd@gmail.com', NULL, '$2y$10$ciy0RhEqo7eau/sWs3uFoOQduBcS3qdm8yT46aLlajoZgSt2u9n.O', 'weWuJU25gPZrrbteTv5pasTTAgqVNBbv1QlfuKhPKUX8mQC4oz74rYxdfqdf', '2023-07-04 22:03:51', '2023-07-04 22:03:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_category_id_foreign` (`category_id`),
  ADD KEY `movies_country_id_foreign` (`country_id`),
  ADD KEY `movies_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `movies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `movies_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
