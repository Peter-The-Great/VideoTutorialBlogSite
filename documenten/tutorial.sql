-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2021 om 15:00
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(64) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(60) NOT NULL,
  `realname` varchar(60) NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `email`, `realname`, `profile`) VALUES
('52086616-c85c-4363-98f0-4dcd698ec356', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mathijs54@Gmail.com', 'Mathijs Clasener', 'uploads/60740afe5996b_60740afe59975.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cat`
--

CREATE TABLE `cat` (
  `ID` int(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subtext` text NOT NULL,
  `headimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `cat`
--

INSERT INTO `cat` (`ID`, `name`, `subtext`, `headimage`) VALUES
(1, 'HTML', 'Making the structure of the page', 'uploads/simg/HTML.png'),
(2, 'PHP', 'Backend of every website', 'uploads/simg/PHP.svg'),
(3, 'C#', 'Code for Unity and other .net framworks', 'uploads/simg/CS.png'),
(4, 'CSS', 'Styling a pretty webpage', 'uploads/simg/CSS3.svg'),
(5, 'JS', 'Making things interactive', 'uploads/simg/JS.svg'),
(6, 'Jquery', 'Making things easier in javascript', 'uploads/simg/jquery.png'),
(7, 'Python', 'Time to create an AI', 'uploads/simg/python.png'),
(8, 'Ruby', 'Make music with Ruby', 'uploads/simg/Ruby.svg'),
(9, 'SQL', 'Database stuff', 'uploads/simg/sql.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `info`
--

CREATE TABLE `info` (
  `id` int(1) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `info`
--

INSERT INTO `info` (`id`, `text`) VALUES
(1, '<p>Mijn naam is Matthijs Clasener en ik ben leraar bij het Grafisch Lyceum Rotterdam en ik maak tutorial videos die ik op deze website wil tentoonstellen. Pellentesque sit amet orci arcu. Donec maximus lacus nunc, sed sagittis arcu tristique non. Cras pulvinar, libero non mollis malesuada, tellus magna cursus leo, commodo consequat ipsum lacus vel neque. Morbi sagittis congue ante vel aliquam. Hallo ik ben een persoon</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://84669.ict-lab.nl/Beroeps/VideoTutorialBlogSite/uploads/simg/logo.png\" alt=\"\" width=\"177\" height=\"177\" /></p>\r\n<p>Morbi finibus elit justo, vel gravida lectus elementum ullamcorper. Quisque dapibus sollicitudin tincidunt. Nam rutrum sem sed arcu tempus sodales. Suspendisse ullamcorper eget mi quis lobortis. Donec condimentum aliquam ipsum, quis accumsan massa placerat in. Suspendisse libero nulla, accumsan sed quam eget, maximus iaculis erat. erat erat. Take me to your x-box</p>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subject`
--

CREATE TABLE `subject` (
  `id` varchar(64) NOT NULL,
  `titel` varchar(64) NOT NULL,
  `text` longtext NOT NULL,
  `subtext` text NOT NULL,
  `video` varchar(48) NOT NULL,
  `leerlijn` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `uitgelicht` int(1) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `subject`
--

INSERT INTO `subject` (`id`, `titel`, `text`, `subtext`, `video`, `leerlijn`, `date`, `uitgelicht`, `image`) VALUES
('02b95889-5448-47e4-8ee1-bff1d5574483', 'PHP is niet PHP', '<p>In dit document ga ik het hebben over halfmoon, wat is halfmoon en waarom is het beter om te gebruiken dan bootstrap. Dat zal ik zelf hier vertelen.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i0.wp.com/css-tricks.com/wp-content/uploads/2020/07/halfmoon.png?fit=1200%2C600&amp;ssl=1\" alt=\"\" width=\"598\" height=\"299\" /></p>\r\n<p>&nbsp;</p>', '<p>Een bootstrap framework met built-in night mode</p>', 'OK_JCtrrv-c', '2', '2021-03-29 12:04:28', 1, 'uploads/what-is-php-3-1.png'),
('5b59a25d-4ec6-4fc2-8e9a-d246100d69cf', 'Cool', '<p>Top gear</p>', '<p>Top gear</p>', 'cDoRmT0iRic', '6', '2021-04-12 13:08:35', 0, 'uploads/60742a3326478_60742a332647d.jpg'),
('64f8385d-958a-494a-b916-e0a62027ce67', 'PHP is niet PHP', '<p>In dit document ga ik het hebben over halfmoon, wat is halfmoon en waarom is het beter om te gebruiken dan bootstrap. Dat zal ik zelf hier vertelen.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i0.wp.com/css-tricks.com/wp-content/uploads/2020/07/halfmoon.png?fit=1200%2C600&amp;ssl=1\" alt=\"\" width=\"598\" height=\"299\" /></p>\r\n<p>&nbsp;</p>', '<p>Een bootstrap framework met built-in night mode</p>', 'OK_JCtrrv-c', '2', '2021-03-29 12:04:28', 1, 'uploads/PHP1.jpg'),
('cac348f9-4492-46ec-9a22-c492d7d97e98', 'Top gear', '<p>Gearsssssssssssss</p>', '<p>Top gearssssssssssssss</p>', 'cDoRmT0iRic', '6', '2021-04-12 13:27:09', 0, 'uploads/607430e29dc9c_607430e29dca0.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cat`
--
ALTER TABLE `cat`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
