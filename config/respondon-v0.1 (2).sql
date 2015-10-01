-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2015 at 04:56 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `respondon-v0.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `chapters` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `chapters`, `userId`) VALUES
(1, 'El buey adventista', 'No conocía a nadie. No había nadie a quien le importara lo que podía sucederle. Mientras se agitaba y daba vueltas tratando de dormirse, su mente comenzó repentinamente a entrar en pánico y a gritar en protesta: iCómo me metí en esto!', 35, 1),
(32, 'Demo', 'Demo', 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `score` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `name`, `score`, `userId`, `bookId`) VALUES
(5, 'joas', 14, 1, 1),
(6, 'brian', 9, 1, 1),
(7, 'carlos', 9, 1, 1),
(8, 'oscar', 0, 1, 1),
(9, 'josue', 0, 1, 1),
(10, 'judith', 7, 1, 1),
(11, 'vania', 9, 1, 1),
(12, 'ania', 0, 1, 1),
(13, 'julia', 0, 1, 9),
(14, 'mailen', 0, 1, 1),
(15, 'dianela', 0, 1, 1),
(16, 'saul', 7, 1, 1),
(17, 'luis', 7, 1, 1),
(18, 'wildor', 9, 1, 1),
(19, 'ronal', 8, 1, 1),
(20, 'wolf', 10, 1, 1),
(21, 'alfredo', 5, 1, 1),
(22, 'hugo', 11, 1, 1),
(23, 'raul', 6, 1, 1),
(24, 'ester', 14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `chapter` int(11) NOT NULL,
  `response` varchar(1000) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `bookId`, `title`, `type`, `chapter`, `response`, `userId`) VALUES
(11, 1, '¿Cuales en titulo del libro?', 'VoF', 1, '[{"value":"la vaca adventista","response":false},{"value":"el buey adventista","response":true},{"value":"el buey dentista","response":false}]', 1),
(12, 1, '¿Porqué Nickolai fue encerrado en una caja?', 'MULTIPLE', 9, '[{"value":"por que no quiso comer","response":false},{"value":"por que no quiso trabajar en sabado","response":true},{"value":"por que se durmio","response":false},{"value":"por que no le daba ganas","response":false}]', 1),
(13, 1, '¿que es lo que mas le dolia a Nickolai en la caja?', 'MULTIPLE', 9, '[{"value":"los pies","response":true},{"value":"la cabeza","response":false},{"value":"las piernas","response":true}]', 1),
(15, 1, '¿cual era su miedo de Nickolai cuando estaba llegando el sabado?', 'MULTIPLE', 9, '[{"value":"no poder orar","response":false},{"value":"que le quitaran la comida","response":false},{"value":"que lo volvieran a pegar","response":true}]', 1),
(16, 1, '¿en que cosas pensaba Nickolai cuando estaba dentro la caja?', 'MULTIPLE', 9, '[{"value":"cuanto tiempo estaria dentro la caja","response":true},{"value":"si le traerian comida","response":true},{"value":"en su familia","response":false},{"value":"en lo que estaban trabajando sus amigos","response":false}]', 1),
(17, 1, '¿que trabajo tenia que hacer Nickolai antes que lo metieran a la caja?', 'MULTIPLE', 9, '[{"value":"traer agua","response":false},{"value":"comprar pan","response":false},{"value":"reparar el techo","response":true},{"value":"hacer comer a las vacas","response":false}]', 1),
(18, 1, '¿en donde le dejo encerrado el alcaide a Nickolai?', 'MULTIPLE', 9, '[{"value":"en un hueco","response":false},{"value":"en un horno","response":false},{"value":"en una caja","response":true}]', 1),
(19, 1, 'la caja donde lo encerraron estaba lleno de: tela de arañas', 'VoF', 9, '[{"value":"Falso","response":false},{"value":"Verdad","response":true}]', 1),
(20, 1, 'cuantos capitulos tiene el libro', 'VoF', 1, '[{"value":"24","response":false},{"value":"25","response":false},{"value":"26","response":false},{"value":"ninguno","response":true}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `cel`) VALUES
(1, 'wolf@wolf.com', 'wolf', 'wolf', '70156988'),
(8, 'fox@wolf.com', 'wolf', 'fox', '70156988');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
