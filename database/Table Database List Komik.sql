-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 06:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id`, `jenis`) VALUES
(1, 'Manga'),
(2, 'Light Novel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komik`
--

CREATE TABLE `tbl_komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `jenis` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_komik`
--

INSERT INTO `tbl_komik` (`id`, `judul`, `slug`, `cover`, `sinopsis`, `jenis`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Naruto Volume 1', 'naruto-volume-1', 'naruto_1.jpg', 'Whenever Naruto Uzumaki proclaims that he will someday become the Hokage—a title bestowed upon the best ninja in the Village Hidden in the Leaves—no one takes him seriously. Since birth, Naruto has been shunned and ridiculed by his fellow villagers. But their contempt isn\'t because Naruto is loud-mouthed, mischievous, or because of his ineptitude in the ninja arts, but because there is a demon inside him. Prior to Naruto\'s birth, the powerful and deadly Nine-Tailed Fox attacked the village. In order to stop the rampage, the Fourth Hokage sacrificed his life to seal the demon inside the body of the newborn Naruto.\r\n\r\nAnd so when he is assigned to Team 7—along with his new teammates Sasuke Uchiha and Sakura Haruno, under the mentorship of veteran ninja Kakashi Hatake—Naruto is forced to work together with other people for the first time in his life. Through undergoing vigorous training and taking on challenging missions, Naruto must learn what it means to work in a team and carve his own route toward becoming a full-fledged ninja recognized by his village.\r\n\r\n[Written by MAL Rewrite]', 1, 50000, '2022-06-24 18:15:28', '2022-06-24 18:16:22'),
(2, 'Spy x Family Volume 1', 'spy-x-family-volume-1', 'spy x family vol 1.jpg', 'For the agent known as \"Twilight,\" no order is too tall if it is for the sake of peace. Operating as Westalis\' master spy, Twilight works tirelessly to prevent extremists from sparking a war with neighboring country Ostania. For his latest mission, he must investigate Ostanian politician Donovan Desmond by infiltrating his son\'s school: the prestigious Eden Academy. Thus, the agent faces the most difficult task of his career: get married, have a child, and play family.\r\n\r\nTwilight, or \"Loid Forger,\" quickly adopts the unassuming orphan Anya to play the role of a six-year-old daughter and prospective Eden Academy student. For a wife, he comes across Yor Briar, an absent-minded office worker who needs a pretend partner of her own to impress her friends. However, Loid is not the only one with a hidden nature. Yor moonlights as the lethal assassin \"Thorn Princess.\" For her, marrying Loid creates the perfect cover. Meanwhile, Anya is not the ordinary girl she appears to be; she is an esper, the product of secret experiments that allow her to read minds. Although she uncovers their true identities, Anya is thrilled that her new parents are cool secret agents! She would never tell them, of course. That would ruin the fun.\r\n\r\nUnder the guise of \"The Forgers,\" the spy, the assassin, and the esper must act as a family while carrying out their own agendas. Although these liars and misfits are only playing parts, they soon find that family is about far more than blood relations.\r\n\r\n[Written by MAL Rewrite]', 1, 100000, '2022-06-24 18:17:37', '2022-06-24 18:17:37'),
(4, 'Naruto Volume 3', 'naruto-volume-3', 'naruto-3.jpg', 'Whenever Naruto Uzumaki proclaims that he will someday become the Hokage—a title bestowed upon the best ninja in the Village Hidden in the Leaves—no one takes him seriously. Since birth, Naruto has been shunned and ridiculed by his fellow villagers. But their contempt isn\'t because Naruto is loud-mouthed, mischievous, or because of his ineptitude in the ninja arts, but because there is a demon inside him. Prior to Naruto\'s birth, the powerful and deadly Nine-Tailed Fox attacked the village. In order to stop the rampage, the Fourth Hokage sacrificed his life to seal the demon inside the body of the newborn Naruto.\r\n\r\nAnd so when he is assigned to Team 7—along with his new teammates Sasuke Uchiha and Sakura Haruno, under the mentorship of veteran ninja Kakashi Hatake—Naruto is forced to work together with other people for the first time in his life. Through undergoing vigorous training and taking on challenging missions, Naruto must learn what it means to work in a team and carve his own route toward becoming a full-fledged ninja recognized by his village.\r\n\r\n[Written by MAL Rewrite]', 1, 50000, '2022-06-24 18:24:16', '2022-06-24 18:24:16'),
(5, 'Spy x Family Volume 2', 'spy-x-family-volume-2', 'spy x family vol 2.jpg', 'For the agent known as \"Twilight,\" no order is too tall if it is for the sake of peace. Operating as Westalis\' master spy, Twilight works tirelessly to prevent extremists from sparking a war with neighboring country Ostania. For his latest mission, he must investigate Ostanian politician Donovan Desmond by infiltrating his son\'s school: the prestigious Eden Academy. Thus, the agent faces the most difficult task of his career: get married, have a child, and play family. Twilight, or \"Loid Forger,\" quickly adopts the unassuming orphan Anya to play the role of a six-year-old daughter and prospective Eden Academy student. For a wife, he comes across Yor Briar, an absent-minded office worker who needs a pretend partner of her own to impress her friends. However, Loid is not the only one with a hidden nature. Yor moonlights as the lethal assassin \"Thorn Princess.\" For her, marrying Loid creates the perfect cover. Meanwhile, Anya is not the ordinary girl she appears to be; she is an esper, the product of secret experiments that allow her to read minds. Although she uncovers their true identities, Anya is thrilled that her new parents are cool secret agents! She would never tell them, of course. That would ruin the fun. Under the guise of \"The Forgers,\" the spy, the assassin, and the esper must act as a family while carrying out their own agendas. Although these liars and misfits are only playing parts, they soon find that family is about far more than blood relations. [Written by MAL Rewrite]', 1, 100000, '2022-06-24 18:27:06', '2022-06-24 18:27:06'),
(6, 'Kage no Jitsuryokusha ni Naritakute! Volume 1', 'kage-no-jitsuryokusha-ni-naritakute-volume-1', 'Kage no Jitsuryokusha ni Naritakute Volume 1_1.jpg', 'Shadowbrokers are those who go unnoticed, posing as unremarkable people, when in truth, they control everything from behind the scenes. Sid wants to be someone just like that more than anything, and something as insignificant as boring reality isn’t going to get in his way! He trains in secret every single night, preparing for his eventual rise to power—only to denied his destiny by a run-of-the-mill (yet deadly) traffic accident. But when he wakes up in a another world and suddenly finds himself at the head of an actual secret organization doing battle with evil in the shadows, he’ll finally get a chance to act out all of his delusional fantasies!', 2, 80000, '2022-06-24 19:02:21', '2022-06-24 19:56:33'),
(7, 'Kage no Jitsuryokusha ni Naritakute! Volume 2', 'kage-no-jitsuryokusha-ni-naritakute-volume-2', 'Kage no Jitsuryokusha ni Naritakute Volume 2.jpg', 'Shadowbrokers are those who go unnoticed, posing as unremarkable people, when in truth, they control everything from behind the scenes. Sid wants to be someone just like that more than anything, and something as insignificant as boring reality isn’t going to get in his way! He trains in secret every single night, preparing for his eventual rise to power—only to denied his destiny by a run-of-the-mill (yet deadly) traffic accident. But when he wakes up in a another world and suddenly finds himself at the head of an actual secret organization doing battle with evil in the shadows, he’ll finally get a chance to act out all of his delusional fantasies!', 2, 85000, '2022-06-24 19:56:14', '2022-06-24 19:56:14'),
(8, 'One Piece Volume 2', 'one-piece-volume-2', 'One Piece Volume 2.jpg', 'Gol D. Roger, a man referred to as the \"Pirate King,\" is set to be executed by the World Government. But just before his demise, he confirms the existence of a great treasure, One Piece, located somewhere within the vast ocean known as the Grand Line. Announcing that One Piece can be claimed by anyone worthy enough to reach it, the Pirate King is executed and the Great Age of Pirates begins.\r\n\r\nTwenty-two years later, a young man by the name of Monkey D. Luffy is ready to embark on his own adventure, searching for One Piece and striving to become the new Pirate King. Armed with just a straw hat, a small boat, and an elastic body, he sets out on a fantastic journey to gather his own crew and a worthy ship that will take them across the Grand Line to claim the greatest status on the high seas.', 1, 85000, '2022-06-24 19:59:27', '2022-06-24 19:59:27'),
(9, 'One Piece Volume 3', 'one-piece-volume-3', 'One Piece Volume 3.jpg', 'Gol D. Roger, a man referred to as the \"Pirate King,\" is set to be executed by the World Government. But just before his demise, he confirms the existence of a great treasure, One Piece, located somewhere within the vast ocean known as the Grand Line. Announcing that One Piece can be claimed by anyone worthy enough to reach it, the Pirate King is executed and the Great Age of Pirates begins.\r\n\r\nTwenty-two years later, a young man by the name of Monkey D. Luffy is ready to embark on his own adventure, searching for One Piece and striving to become the new Pirate King. Armed with just a straw hat, a small boat, and an elastic body, he sets out on a fantastic journey to gather his own crew and a worthy ship that will take them across the Grand Line to claim the greatest status on the high seas.', 1, 85000, '2022-06-24 20:00:59', '2022-06-24 20:00:59'),
(10, 'One Piece Volume 4', 'one-piece-volume-4', 'One Piece Volume 4.jpg', 'Gol D. Roger, a man referred to as the \"Pirate King,\" is set to be executed by the World Government. But just before his demise, he confirms the existence of a great treasure, One Piece, located somewhere within the vast ocean known as the Grand Line. Announcing that One Piece can be claimed by anyone worthy enough to reach it, the Pirate King is executed and the Great Age of Pirates begins.\r\n\r\nTwenty-two years later, a young man by the name of Monkey D. Luffy is ready to embark on his own adventure, searching for One Piece and striving to become the new Pirate King. Armed with just a straw hat, a small boat, and an elastic body, he sets out on a fantastic journey to gather his own crew and a worthy ship that will take them across the Grand Line to claim the greatest status on the high seas.', 1, 85000, '2022-06-24 20:02:14', '2022-06-24 23:46:34'),
(11, 'Black Clover Volume 1', 'black-clover-volume-1', 'black clover.jpg', 'In a world full of magic, Asta—an orphan who is overly loud and energetic—possesses none whatsoever. Despite this, he dreams of becoming the Wizard King, a title bestowed upon the strongest mage in the Clover Kingdom. Possessing the same aspiration, Asta\'s childhood friend and rival Yuno has been blessed with the ability to control powerful wind magic. Even with this overwhelming gap between them, hoping to somehow awaken his magical abilities and catch up to Yuno, Asta trains his body relentlessly every day.\r\n\r\nIn the Clover Kingdom, once a person turns 15 years old, it is time for them to receive their Grimoire, an item allowing its wielder to use their magic to its full capacity. At the ceremony, Yuno obtains a Grimoire with a legendary four-leaf clover, indicating the exceptional strength of its wielder, while Asta pointlessly waits for his. Feeling dejected, yet unwilling to give up, Asta sees Yuno caught by a mage who is trying to steal Yuno\'s special Grimoire. Despite being completely overpowered by Yuno\'s captor, Asta\'s will to keep fighting rewards him with his very own Grimoire—one with an unheard-of black five-leaf clover.\r\n', 1, 50000, '2022-06-24 20:39:10', '2022-06-24 20:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `user` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kirim` varchar(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `cover`, `judul`, `user`, `alamat`, `harga`, `kirim`, `created_at`, `updated_at`) VALUES
(1, 'black clover.jpg', 'Black Clover Volume 1', '1', '-', '50000', 'Dikirim', '2022-06-25 09:25:20', '2022-06-25 09:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `unik` text NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `alamat`, `nohp`, `username`, `password`, `unik`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '-', '', 'Admin@gmail.com', '123', '1234567890', '335000', '2022-06-24 18:01:18', '2022-06-25 09:25:20'),
(2, 'user', '', '', 'user@gmail.com', '123', '', '50000', '2022-06-25 18:24:05', '2022-06-25 18:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_komik`
--
ALTER TABLE `tbl_komik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis` (`jenis`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_komik`
--
ALTER TABLE `tbl_komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_komik`
--
ALTER TABLE `tbl_komik`
  ADD CONSTRAINT `tbl_komik_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `tbl_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
