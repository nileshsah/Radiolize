-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 11:39 AM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radiolize`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadcasts`
--

CREATE TABLE IF NOT EXISTS `broadcasts` (
  `radio_name` varchar(255) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `playlist` varchar(255) NOT NULL,
  UNIQUE KEY `radio_name` (`radio_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcasts`
--

INSERT INTO `broadcasts` (`radio_name`, `session_start`, `playlist`) VALUES
('', '2013-06-09 07:53:32', '.xml'),
('local', '2013-11-09 06:35:15', 'local.xml'),
('nick', '2013-06-11 12:34:18', 'nick.xml');

-- --------------------------------------------------------

--
-- Table structure for table `user_broadcast`
--

CREATE TABLE IF NOT EXISTS `user_broadcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`, `FirstName`, `LastName`) VALUES
(1, 'nellex', 'e10adc3949ba59abbe56e057f20f883e', 'Nilesh', 'Sah');

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE IF NOT EXISTS `user_playlist` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `playtime` int(255) NOT NULL,
  `hashtag` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_playlist`
--

INSERT INTO `user_playlist` (`id`, `userid`, `name`, `playtime`, `hashtag`, `updated`) VALUES
(6, 1, 'Radio', 1180, NULL, '2013-12-07 09:02:33'),
(7, 1, 'Test', 528, NULL, '2013-12-07 13:54:17'),
(8, 1, 'Lol', 210, '%23lol', '2013-12-08 09:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_radio_playlist`
--

CREATE TABLE IF NOT EXISTS `user_radio_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `song_href` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_songs`
--

CREATE TABLE IF NOT EXISTS `user_songs` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `song_name` varchar(255) NOT NULL,
  `song_href` varchar(255) NOT NULL,
  `song_time` int(255) NOT NULL,
  `userid` int(50) NOT NULL,
  `playlist_id` int(50) NOT NULL,
  `pid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `user_songs`
--

INSERT INTO `user_songs` (`id`, `song_name`, `song_href`, `song_time`, `userid`, `playlist_id`, `pid`) VALUES
(211, 'Alex Party - Alex Party (Saturday Night Party) - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/04/16/65230589/1/6_30.mp3', 30, 1, 6, 0),
(212, 'Eric Clapton - Eric Clapton - Layla Acoustic ', 'http://myoncell.mobi/sounds/10003443683/original/Eric_Clapton_-_Layla_Acoustic.mp3', 286, 1, 6, 1),
(213, 'OsckY Alex Mica - OsckY feat Alex Mica - Dalinda ( R.M.X M.P.3 ) ', 'http://media.shax-dag.ru/Music/users/music___151115_7.mp3', 280, 1, 6, 2),
(214, 'Bruno Mars - Gorilla ', 'http://old.frendz4m.com/attachments/59/9/4/1354675916-frendz4m.com-03._Bruno_Mars_-_Gorilla_Killer_boy.mp3', 241, 1, 6, 3),
(215, 'Eric Clapton - Mean Old Frisco - Eric Clapton ', 'http://vol4.music-bazaar.com/samples/vol4/346/346742/preview-4f44670520.mp3.mp3', 60, 1, 6, 4),
(216, 'Eric Clapton - Blues Power (Eric Clapton) ', 'http://vol4.music-bazaar.com/samples/vol4/346/346745/preview-97400b2879.mp3.mp3', 60, 1, 6, 5),
(217, 'Selena Gomez - Who Says - Selena Gomez', 'http://210.211.99.70/teenpro.vn/files/song/2011/10/08/f2fc3739a91031bf3509bf0964ea6ce2.mp3', 193, 1, 6, 6),
(218, 'Selena Gomez - Who Says - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/12/87/60532404/1/3_30.mp3', 30, 1, 6, 7),
(225, 'Akcent - Love Stoned ', 'http://files.navsi100.com/download/HIT_LAB_music/Akcent_-_Love_Stoned.mp3', 223, 1, 7, 0),
(226, 'voila ', 'http://chumpco.com/~merii/aprillasagna/voila.mp3', 230, 1, 7, 1),
(227, 'tp 20050628 voila ', 'http://todayspodcast.com/podcast/tp_20050628_voila.mp3', 75, 1, 7, 2),
(228, 'Avicii - Silhouettes - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/13/90/11465294/2/8_30.mp3', 30, 1, 8, 0),
(229, 'Rihanna - Whats My Name - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/13/52/11162995/1/6_30.mp3', 30, 1, 8, 1),
(230, 'Armin Van Buuren feat. Laura V - Drowning (Avicii Remix) - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/12/79/60483706/1/1_30.mp3', 30, 1, 8, 2),
(231, 'Rihanna feat. Eminem - Numb - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/15/40/12059232/1/3_30.mp3', 30, 1, 8, 3),
(232, 'Avicii vs. Nicky Romero - I Could Be The One (Radio Edit) - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/16/17/13278564/2/5_30.mp3', 30, 1, 8, 4),
(233, 'Selena Gomez - Who Says - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/12/87/60532404/1/3_30.mp3', 30, 1, 8, 5),
(234, 'Rihanna - Where Have You Been - fragment ', 'http://mp3.ecsmedia.pl/track/music/00/00/13/90/11465294/1/3_30.mp3', 30, 1, 8, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
