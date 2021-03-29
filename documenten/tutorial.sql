-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mrt 2021 om 14:51
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
('52086616-c85c-4363-98f0-4dcd698ec356', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mathijs54@Gmail.com', 'Mathijs Clasener', 'uploads/profile/logo.png');

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
  `bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('02b95889-5448-47e4-8ee1-bff1d5574483', 'PHP is niet PHP', '<p>In dit document ga ik het hebben over halfmoon, wat is halfmoon en waarom is het beter om te gebruiken dan bootstrap. Dat zal ik zelf hier vertelen.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i0.wp.com/css-tricks.com/wp-content/uploads/2020/07/halfmoon.png?fit=1200%2C600&amp;ssl=1\" alt=\"\" width=\"598\" height=\"299\" /></p>\r\n<p>&nbsp;</p>', '<p>Een bootstrap framework met built-in night mode</p>', 'OK_JCtrrv-c', 'PHP', '2021-03-29 12:04:28', 0, 'uploads/what-is-php-3-1.png');

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
