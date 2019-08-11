-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2019 at 02:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_jogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aulas`
--

CREATE TABLE `tbl_aulas` (
  `id` int(11) NOT NULL,
  `id_sequencia` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_aulas`
--

INSERT INTO `tbl_aulas` (`id`, `id_sequencia`, `id_professor`, `data`, `id_turma`) VALUES
(1, 1, 21, '2019-04-10', 9),
(16, 3, 21, '2019-05-13', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_avaliacao_coletiva`
--

CREATE TABLE `tbl_avaliacao_coletiva` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `frequencia` int(11) NOT NULL,
  `porcentagem` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compartilhamentos`
--

CREATE TABLE `tbl_compartilhamentos` (
  `id` int(11) NOT NULL,
  `id_compartilhador` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `id_compartilhado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destinos`
--

CREATE TABLE `tbl_destinos` (
  `id` int(11) NOT NULL,
  `numero_pergunta` int(11) NOT NULL,
  `quantidade_perguntas` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_bin NOT NULL,
  `resposta_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `resposta_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `resposta_3` varchar(10) COLLATE utf8_bin NOT NULL,
  `destino_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `destino_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `destino_3` varchar(10) COLLATE utf8_bin NOT NULL,
  `pontos_1` int(11) NOT NULL,
  `pontos_2` int(11) NOT NULL,
  `pontos_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_destinos`
--

INSERT INTO `tbl_destinos` (`id`, `numero_pergunta`, `quantidade_perguntas`, `codigo`, `resposta_1`, `resposta_2`, `resposta_3`, `destino_1`, `destino_2`, `destino_3`, `pontos_1`, `pontos_2`, `pontos_3`) VALUES
(2, 2, 0, '2Pa', '2APa', '2BPa', '2CPa', '3Pa', '3Pb', '3Pc', 0, 50, 100),
(3, 2, 0, '2Pb', '2APb', '2BPb', '2CPb', '3Pa', '3Pb', '3Pc', 0, 50, 100),
(4, 2, 0, '2Pc', '2APc', '2BPc', '2CPc', '3Pa', '3Pb', '3Pc', 0, 50, 100),
(5, 3, 0, '3Pa', '3APa', '3BPa', '3CPa', '4Pa', '4Pb', '4Pc', 0, 50, 100),
(6, 3, 0, '3Pb', '3APb', '3BPb', '3CPb', '4Pa', '4Pb', '4Pc', 0, 50, 100),
(7, 3, 0, '3Pc', '3APc', '3BPc', '3CPc', '4Pa', '4Pb', '4Pc', 0, 50, 100),
(8, 4, 0, '4Pa', '4APa', '4BPa', '4CPa', '5Pa', '5Pb', '5Pc', 0, 50, 100),
(9, 4, 0, '4Pb', '4APb', '4BPb', '4CPb', '5Pa', '5Pb', '5Pc', 0, 50, 100),
(10, 4, 0, '4Pc', '4APc', '4BPc', '4CPc', '5Pa', '5Pb', '5Pc', 0, 50, 100),
(11, 5, 0, '5Pa', '5APa', '5BPa', '5CPa', '6Pa', '6Pb', '6Pc', 0, 50, 100),
(12, 5, 0, '5Pb', '5APb', '5BPb', '5CPb', '6Pa', '6Pb', '6Pc', 0, 50, 100),
(13, 5, 0, '5Pc', '5APc', '5BPc', '5CPc', '6Pa', '6Pb', '6Pc', 0, 50, 100),
(14, 6, 0, '6Pa', '6APa', '6BPa', '6CPa', '7Pa', '7Pb', '7Pc', 0, 50, 100),
(15, 6, 0, '6Pb', '6APb', '6BPb', '6CPb', '7Pa', '7Pb', '7Pc', 0, 50, 100),
(16, 6, 0, '6Pc', '6APc', '6BPc', '6CPc', '7Pa', '7Pb', '7Pc', 0, 50, 100),
(17, 7, 0, '7Pa', '7APa', '7BPa', '7CPa', '8Pa', '8Pb', '8Pc', 0, 50, 100),
(18, 7, 0, '7Pb', '7APb', '7BPb', '7CPb', '8Pa', '8Pb', '8Pc', 0, 50, 100),
(19, 7, 0, '7Pc', '7APc', '7BPc', '7CPc', '8Pa', '8Pb', '8Pc', 0, 50, 100),
(20, 8, 0, '8Pa', '8APa', '8BPa', '8CPa', '9Pa', '9Pb', '9Pc', 0, 50, 100),
(21, 8, 0, '8Pb', '8APb', '8BPb', '8CPb', '9Pa', '9Pb', '9Pc', 0, 50, 100),
(22, 8, 0, '8Pc', '8APc', '8BPc', '8CPc', '9Pa', '9Pb', '9Pc', 0, 50, 100),
(23, 9, 0, '9Pa', '9APa', '9BPa', '9CPa', '10Pa', '10Pb', '10Pc', 0, 50, 100),
(24, 9, 0, '9Pb', '9APb', '9BPb', '9CPb', '10Pa', '10Pb', '10Pc', 0, 50, 100),
(25, 9, 0, '9Pc', '9APc', '9BPc', '9CPc', '10Pa', '10Pb', '10Pc', 0, 50, 100),
(26, 10, 0, '10Pa', '10APa', '10BPa', '10CPa', '11Pa', '11Pb', '11Pc', 0, 50, 100),
(27, 10, 0, '10Pb', '10APb', '10BPb', '10CPb', '11Pa', '11Pb', '11Pc', 0, 50, 100),
(28, 10, 0, '10Pc', '10APc', '10BPc', '10CPc', '11Pa', '11Pb', '11Pc', 0, 50, 100),
(29, 11, 0, '11Pa', '11APa', '11BPa', '11CPa', '12Pa', '12Pb', '12Pc', 0, 50, 100),
(30, 11, 0, '11Pb', '11APb', '11BPb', '11CPb', '12Pa', '12Pb', '12Pc', 0, 50, 100),
(31, 11, 0, '11Pc', '11APc', '11BPc', '11CPc', '12Pa', '12Pb', '12Pc', 0, 50, 100),
(32, 12, 0, '12Pa', '12APa', '12BPa', '12CPa', '13Pa', '13Pb', '13Pc', 0, 50, 100),
(33, 12, 0, '12Pb', '12APb', '12BPb', '12CPb', '13Pa', '13Pb', '13Pc', 0, 50, 100),
(34, 12, 0, '12Pc', '12APc', '12BPc', '12CPc', '13Pa', '13Pb', '13Pc', 0, 50, 100),
(35, 13, 0, '13Pa', '13APa', '13BPa', '13CPa', '14Pa', '14Pb', '14Pc', 0, 50, 100),
(36, 13, 0, '13Pb', '13APb', '13BPb', '13CPb', '14Pa', '14Pb', '14Pc', 0, 50, 100),
(37, 13, 0, '13Pc', '13APc', '13BPc', '13CPc', '14Pa', '14Pb', '14Pc', 0, 50, 100),
(38, 14, 0, '14Pa', '14APa', '14BPa', '14CPa', '15Pa', '15Pb', '15Pc', 0, 50, 100),
(39, 14, 0, '14Pb', '14APb', '14BPb', '14CPb', '15Pa', '15Pb', '15Pc', 0, 50, 100),
(40, 14, 0, '14Pc', '14APc', '14BPc', '14CPc', '15Pa', '15Pb', '15Pc', 0, 50, 100),
(41, 15, 0, '15Pa', '15APa', '15BPa', '15CPa', '16Pa', '16Pb', '16Pc', 0, 50, 100),
(42, 15, 0, '15Pb', '15APb', '15BPb', '15CPb', '16Pa', '16Pb', '16Pc', 0, 50, 100),
(43, 15, 0, '15Pc', '15APc', '15BPc', '15CPc', '16Pa', '16Pb', '16Pc', 0, 50, 100),
(44, 16, 0, '16Pa', '16APa', '16BPa', '16CPa', '17Pa', '17Pb', '17Pc', 0, 50, 100),
(45, 16, 0, '16Pb', '16APb', '16BPb', '16CPb', '17Pa', '17Pb', '17Pc', 0, 50, 100),
(46, 16, 0, '16Pc', '16APc', '16BPc', '16CPc', '17Pa', '17Pb', '17Pc', 0, 50, 100),
(47, 17, 0, '17Pa', '17APa', '17BPa', '17CPa', '18Pa', '18Pb', '18Pc', 0, 50, 100),
(48, 17, 0, '17Pb', '17APb', '17BPb', '17CPb', '18Pa', '18Pb', '18Pc', 0, 50, 100),
(49, 17, 0, '17Pc', '17APc', '17BPc', '17CPc', '18Pa', '18Pb', '18Pc', 0, 50, 100),
(50, 18, 0, '18Pa', '18APa', '18BPa', '18CPa', '19Pa', '19Pb', '19Pc', 0, 50, 100),
(51, 18, 0, '18Pb', '18APb', '18BPb', '18CPb', '19Pa', '19Pb', '19Pc', 0, 50, 100),
(52, 18, 0, '18Pc', '18APc', '18BPc', '18CPc', '19Pa', '19Pb', '19Pc', 0, 50, 100),
(53, 19, 0, '19Pa', '19APa', '19BPa', '19CPa', '20Pa', '20Pb', '20Pc', 0, 50, 100),
(54, 19, 0, '19Pb', '19APb', '19BPb', '19CPb', '20Pa', '20Pb', '20Pc', 0, 50, 100),
(55, 19, 0, '19Pc', '19APc', '19BPc', '19CPc', '20Pa', '20Pb', '20Pc', 0, 50, 100),
(56, 20, 0, '20Pa', '20APa', '20BPa', '20CPa', '21Pa', '21Pb', '21Pc', 0, 50, 100),
(57, 20, 0, '20Pb', '20APb', '20BPb', '20CPb', '21Pa', '21Pb', '21Pc', 0, 50, 100),
(58, 20, 0, '20Pc', '20APc', '20BPc', '20CPc', '21Pa', '21Pb', '21Pc', 0, 50, 100),
(59, 21, 0, '21Pa', '21APa', '21BPa', '21CPa', '22Pa', '22Pb', '22Pc', 0, 50, 100),
(60, 21, 0, '21Pb', '21APb', '21BPb', '21CPb', '22Pa', '22Pb', '22Pc', 0, 50, 100),
(61, 21, 0, '21Pc', '21APc', '21BPc', '21CPc', '22Pa', '22Pb', '22Pc', 0, 50, 100),
(62, 22, 0, '22Pa', '22APa', '22BPa', '22CPa', '23Pa', '23Pb', '23Pc', 0, 50, 100),
(63, 22, 0, '22Pb', '22APb', '22BPb', '22CPb', '23Pa', '23Pb', '23Pc', 0, 50, 100),
(64, 22, 0, '22Pc', '22APc', '22BPc', '22CPc', '23Pa', '23Pb', '23Pc', 0, 50, 100),
(65, 23, 0, '23Pa', '23APa', '23BPa', '23CPa', '24Pa', '24Pb', '24Pc', 0, 50, 100),
(66, 23, 0, '23Pb', '23APb', '23BPb', '23CPb', '24Pa', '24Pb', '24Pc', 0, 50, 100),
(67, 23, 0, '23Pc', '23APc', '23BPc', '23CPc', '24Pa', '24Pb', '24Pc', 0, 50, 100),
(68, 24, 0, '24Pa', '24APa', '24BPa', '24CPa', '25Pa', '25Pb', '25Pc', 0, 50, 100),
(69, 24, 0, '24Pb', '24APb', '24BPb', '24CPb', '25Pa', '25Pb', '25Pc', 0, 50, 100),
(70, 24, 0, '24Pc', '24APc', '24BPc', '24CPc', '25Pa', '25Pb', '25Pc', 0, 50, 100),
(71, 25, 0, '25Pa', '25APa', '25BPa', '25CPa', '26Pa', '26Pb', '26Pc', 0, 50, 100),
(72, 25, 0, '25Pb', '25APb', '25BPb', '25CPb', '26Pa', '26Pb', '26Pc', 0, 50, 100),
(73, 25, 0, '25Pc', '25APc', '25BPc', '25CPc', '26Pa', '26Pb', '26Pc', 0, 50, 100),
(74, 26, 0, '26Pa', '26APa', '26BPa', '26CPa', '27Pa', '27Pb', '27Pc', 0, 50, 100),
(75, 26, 0, '26Pb', '26APb', '26BPb', '26CPb', '27Pa', '27Pb', '27Pc', 0, 50, 100),
(76, 26, 0, '26Pc', '26APc', '26BPc', '26CPc', '27Pa', '27Pb', '27Pc', 0, 50, 100),
(77, 27, 0, '27Pa', '27APa', '27BPa', '27CPa', '28Pa', '28Pb', '28Pc', 0, 50, 100),
(78, 27, 0, '27Pb', '27APb', '27BPb', '27CPb', '28Pa', '28Pb', '28Pc', 0, 50, 100),
(79, 27, 0, '27Pc', '27APc', '27BPc', '27CPc', '28Pa', '28Pb', '28Pc', 0, 50, 100),
(80, 28, 0, '28Pa', '28APa', '28BPa', '28CPa', '29Pa', '29Pb', '29Pc', 0, 50, 100),
(81, 28, 0, '28Pb', '28APb', '28BPb', '28CPb', '29Pa', '29Pb', '29Pc', 0, 50, 100),
(82, 28, 0, '28Pc', '28APc', '28BPc', '28CPc', '29Pa', '29Pb', '29Pc', 0, 50, 100),
(83, 29, 0, '29Pa', '29APa', '29BPa', '29CPa', '30Pa', '30Pb', '30Pc', 0, 50, 100),
(84, 29, 0, '29Pb', '29APb', '29BPb', '29CPb', '30Pa', '30Pb', '30Pc', 0, 50, 100),
(85, 29, 0, '29Pc', '29APc', '29BPc', '29CPc', '30Pa', '30Pb', '30Pc', 0, 50, 100),
(86, 30, 0, '30Pa', '30APa', '30BPa', '30CPa', '31Pa', '31Pb', '31Pc', 0, 50, 100),
(87, 30, 0, '30Pb', '30APb', '30BPb', '30CPb', '31Pa', '31Pb', '31Pc', 0, 50, 100),
(88, 30, 0, '30Pc', '30APc', '30BPc', '30CPc', '31Pa', '31Pb', '31Pc', 0, 50, 100),
(89, 31, 0, '31Pa', '31APa', '31BPa', '31CPa', '32Pa', '32Pb', '32Pc', 0, 50, 100),
(90, 31, 0, '31Pb', '31APb', '31BPb', '31CPb', '32Pa', '32Pb', '32Pc', 0, 50, 100),
(91, 31, 0, '31Pc', '31APc', '31BPc', '31CPc', '32Pa', '32Pb', '32Pc', 0, 50, 100),
(92, 32, 0, '32Pa', '32APa', '32BPa', '32CPa', '33Pa', '33Pb', '33Pc', 0, 50, 100),
(93, 32, 0, '32Pb', '32APb', '32BPb', '32CPb', '33Pa', '33Pb', '33Pc', 0, 50, 100),
(94, 32, 0, '32Pc', '32APc', '32BPc', '32CPc', '33Pa', '33Pb', '33Pc', 0, 50, 100),
(95, 33, 0, '33Pa', '33APa', '33BPa', '33CPa', '34Pa', '34Pb', '34Pc', 0, 50, 100),
(96, 33, 0, '33Pb', '33APb', '33BPb', '33CPb', '34Pa', '34Pb', '34Pc', 0, 50, 100),
(97, 33, 0, '33Pc', '33APc', '33BPc', '33CPc', '34Pa', '34Pb', '34Pc', 0, 50, 100),
(98, 34, 0, '34Pa', '34APa', '34BPa', '34CPa', '35Pa', '35Pb', '35Pc', 0, 50, 100),
(99, 34, 0, '34Pb', '34APb', '34BPb', '34CPb', '35Pa', '35Pb', '35Pc', 0, 50, 100),
(100, 34, 0, '34Pc', '34APc', '34BPc', '34CPc', '35Pa', '35Pb', '35Pc', 0, 50, 100),
(101, 35, 0, '35Pa', '35APa', '35BPa', '35CPa', '36Pa', '36Pb', '36Pc', 0, 50, 100),
(102, 35, 0, '35Pb', '35APb', '35BPb', '35CPb', '36Pa', '36Pb', '36Pc', 0, 50, 100),
(103, 35, 0, '35Pc', '35APc', '35BPc', '35CPc', '36Pa', '36Pb', '36Pc', 0, 50, 100),
(104, 36, 0, '36Pa', '36APa', '36BPa', '36CPa', '37Pa', '37Pb', '37Pc', 0, 50, 100),
(105, 36, 0, '36Pb', '36APb', '36BPb', '36CPb', '37Pa', '37Pb', '37Pc', 0, 50, 100),
(106, 36, 0, '36Pc', '36APc', '36BPc', '36CPc', '37Pa', '37Pb', '37Pc', 0, 50, 100),
(107, 37, 0, '37Pa', '37APa', '37BPa', '37CPa', '38Pa', '38Pb', '38Pc', 0, 50, 100),
(108, 37, 0, '37Pb', '37APb', '37BPb', '37CPb', '38Pa', '38Pb', '38Pc', 0, 50, 100),
(109, 37, 0, '37Pc', '37APc', '37BPc', '37CPc', '38Pa', '38Pb', '38Pc', 0, 50, 100),
(110, 38, 0, '38Pa', '38APa', '38BPa', '38CPa', '39Pa', '39Pb', '39Pc', 0, 50, 100),
(111, 38, 0, '38Pb', '38APb', '38BPb', '38CPb', '39Pa', '39Pb', '39Pc', 0, 50, 100),
(112, 38, 0, '38Pc', '38APc', '38BPc', '38CPc', '39Pa', '39Pb', '39Pc', 0, 50, 100),
(113, 39, 0, '39Pa', '39APa', '39BPa', '39CPa', '40Pa', '40Pb', '40Pc', 0, 50, 100),
(114, 39, 0, '39Pb', '39APb', '39BPb', '39CPb', '40Pa', '40Pb', '40Pc', 0, 50, 100),
(115, 39, 0, '39Pc', '39APc', '39BPc', '39CPc', '40Pa', '40Pb', '40Pc', 0, 50, 100),
(116, 40, 0, '40Pa', '40APa', '40BPa', '40CPa', 'mFa', 'mFb', 'mFc', 0, 50, 100),
(117, 40, 0, '40Pb', '40APb', '40BPb', '40CPb', 'mFa', 'mFb', 'mFc', 0, 50, 100),
(118, 40, 0, '40Pc', '40APc', '40BPc', '40CPc', 'mFa', 'mFb', 'mFc', 0, 50, 100),
(119, 41, 0, 'mFa', '0', '0', '0', 'Fim', 'Fim', 'Fim', 0, 50, 100),
(120, 41, 0, 'mFb', '0', '0', '0', 'Fim', 'Fim', 'Fim', 0, 50, 100),
(121, 41, 0, 'mFc', '0', '0', '0', 'Fim', 'Fim', 'Fim', 0, 50, 100),
(122, 1, 1, '1P', '1AP', '1BP', '1CP', '41Pa', '41Pb', '41Pc', 0, 50, 100),
(123, 1, 4, '1P', '1AP', '1BP', '1CP', '38Pa', '38Pb', '38Pc', 0, 50, 100),
(124, 1, 7, '1P', '1AP', '1BP', '1CP', '35Pa', '35Pb', '35Pc', 0, 50, 100),
(125, 1, 10, '1P', '1AP', '1BP', '1CP', '32Pa', '32Pb', '32Pc', 0, 50, 100),
(126, 1, 13, '1P', '1AP', '1BP', '1CP', '29Pa', '29Pb', '29Pc', 0, 50, 100),
(127, 1, 16, '1P', '1AP', '1BP', '1CP', '26Pa', '26Pb', '26Pc', 0, 50, 100),
(128, 1, 19, '1P', '1AP', '1BP', '1CP', '23Pa', '23Pb', '23Pc', 0, 50, 100),
(129, 1, 22, '1P', '1AP', '1BP', '1CP', '20Pa', '20Pb', '20Pc', 0, 50, 100),
(130, 1, 25, '1P', '1AP', '1BP', '1CP', '17Pa', '17Pb', '17Pc', 0, 50, 100),
(131, 1, 28, '1P', '1AP', '1BP', '1CP', '14Pa', '14Pb', '14Pc', 0, 50, 100),
(132, 1, 31, '1P', '1AP', '1BP', '1CP', '11Pa', '11Pb', '11Pc', 0, 50, 100),
(133, 1, 34, '1P', '1AP', '1BP', '1CP', '8Pa', '8Pb', '8Pc', 0, 50, 100),
(134, 1, 37, '1P', '1AP', '1BP', '1CP', '5Pa', '5Pb', '5Pc', 0, 50, 100),
(135, 1, 40, '1P', '1AP', '1BP', '1CP', '2Pa', '2Pb', '2Pc', 0, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finais`
--

CREATE TABLE `tbl_finais` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_sequencia` int(11) NOT NULL,
  `final` mediumtext COLLATE utf8_bin NOT NULL,
  `pctg_min` decimal(11,2) NOT NULL,
  `pctg_max` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_finais`
--

INSERT INTO `tbl_finais` (`id`, `id_professor`, `id_sequencia`, `final`, `pctg_min`, `pctg_max`) VALUES
(1, 21, 1, 'Na noite do dia seguinte, Ainoã recebe um e-mail da empresa:\r\n\r\n\"Olá Ainoã,\r\nInfelizmente não poderemos contratar o seu serviço.\r\nAnalisamos as condições financeiras da empresa e, dentro do que você disse ser necessário fazer, nós não teremos condições de pagar pelos materiais e por seu serviço.\r\nAgradecemos a sua disponibilidade para se reunir conosco.\r\nSucesso em sua jornada.\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.\"\r\n\r\nAinoã já esperava que isso poderia acontecer. Através da experiência adquirida, decide que continuará buscando a oportunidade de trabalhar com Segurança da Informação. Para isso, promete para si que irá se dedicar mais aos estudos.', '0.00', '6.00'),
(2, 21, 1, 'Na tarde do dia seguinte, Ainoã recebe um e-mail da empresa:\r\n\r\n\"Olá Ainoã,\r\nInfelizmente não poderemos contratar os seus serviços.\r\nContudo, ficamos extremamente gratos com todas as informações que você nos passou durante a reunião.\r\nPor isso, decidimos que iremos pagar pelo seu serviço de consultoria.\r\nTem disponibilidade de vir amanhã à empresa buscar seu pagamento?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.\"\r\n\r\nAinoã já esperava que isso poderia acontecer, mas fica muito feliz em saber que irá receber um pagamento pela consultoria. Motivada, decide que irá se dedicar mais aos estudos e continuar buscando experiências práticas na área de Segurança da Informação.', '7.00', '13.00'),
(3, 21, 1, 'Na manhã do dia seguinte, Ainoã recebe um e-mail da empresa:\r\n\r\n\"Olá Ainoã,\r\nNós ficamos muito encantados com todo o seu conhecimento sobre a Segurança da Informação.\r\nIremos contratar os seus serviços!\r\nQuando você pode começar?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.\"\r\n\r\nMuito feliz com o e-mail, Ainoã responde que está disponível para começar desde já, dentro dos horários que ela  havia passado para Brigite durante a reunião. Percebendo os resultados de seus esforços, Ainoã decide que irá focar ainda mais nos estudos e que fornecerá o melhor serviço possível para a Transportadora Brigite Ltda.', '14.00', '20.00'),
(7, 21, 3, 'No fim do expediente, Romeu, um dos sócios da Companhia Segurança da Informação Ltda., chama Douglas para ter uma conversa.\r\n\r\n\"Olá Douglas. Na verdade, a cliente Renata não existe. Foi um teste que fizemos com você, para verificar como se daria o seu atendimento, e também seus conhecimentos sobre Segurança da Informação. Infelizmente, percebemos que você não se enquadra no que compõe as necessidades da empresa. Portanto, iremos rescindir o contrato de trabalho com você. Agradecemos sua preferência por nossa empresa.\"\r\n\r\nDouglas agradece a Romeu pela oportunidade que foi dada. Ele vai para casa pensando em como pode aperfeiçoar os conhecimentos sobre Segurança da Informação.', '0.00', '6.00'),
(8, 21, 3, 'No fim do expediente, Romeu, um dos sócios da Companhia Segurança da Informação Ltda., chama Douglas para ter uma conversa.\r\n\r\n\"Olá Douglas. Na verdade, a cliente Renata não existe. Foi um teste que fizemos com você, para verificar como se daria o seu atendimento, e também seus conhecimentos sobre Segurança da Informação. Você tem um bom conhecimento sobre Segurança da Informação, mas não vimos como suficiente para compor o quadro de nossos especialistas. Porém, pensamos em contratá-lo como assistente dos especialistas. Você aceita?\"\r\n\r\nDouglas agradece a Romeu pela oportunidade e aceita a vaga de assistente. Ele vai para casa pensando em como pode aperfeiçoar os conhecimentos sobre Segurança da Informação, para que um dia possa conseguir uma vaga de especialista.', '7.00', '13.00'),
(9, 21, 3, 'No fim do expediente, Romeu, um dos sócios da Companhia Segurança da Informação Ltda., chama Douglas para ter uma conversa.\r\n\r\n\"Olá Douglas. Na verdade, a cliente Renata não existe. Foi um teste que fizemos com você, para verificar como se daria o seu atendimento, e também seus conhecimentos sobre Segurança da Informação. Percebemos que você se enquadra no que compõe as necessidades da empresa. Parabéns! Iremos contratá-lo para ser um de nossos especialistas. Agradecemos sua preferência por nossa empresa.\"\r\n\r\nDouglas agradece a Romeu pela oportunidade que foi dada. Ele vai para casa muito feliz, pensando em como pode aprender ainda mais sobre Segurança da Informação.', '14.00', '20.00'),
(10, 21, 5, 'aaa', '0.00', '25.00'),
(11, 21, 5, 'aaaa', '37.50', '62.50'),
(12, 21, 5, 'aaa', '75.00', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_midia`
--

CREATE TABLE `tbl_midia` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_bin NOT NULL,
  `posicao` varchar(30) COLLATE utf8_bin NOT NULL,
  `midia` varchar(30) COLLATE utf8_bin NOT NULL,
  `width` varchar(10) COLLATE utf8_bin NOT NULL,
  `height` varchar(10) COLLATE utf8_bin NOT NULL,
  `diretorio` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perguntas`
--

CREATE TABLE `tbl_perguntas` (
  `id` int(11) NOT NULL,
  `id_sequencia` int(11) NOT NULL,
  `pergunta` mediumtext COLLATE utf8_bin NOT NULL,
  `resposta1` mediumtext COLLATE utf8_bin NOT NULL,
  `resposta2` mediumtext COLLATE utf8_bin NOT NULL,
  `resposta3` mediumtext COLLATE utf8_bin NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_pergunta_seq` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `n_p_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_perguntas`
--

INSERT INTO `tbl_perguntas` (`id`, `id_sequencia`, `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_pergunta_seq`, `id_destino`, `n_p_destino`) VALUES
(1, 1, 'Este parecia ser mais um sábado normal para Ainoã. Ela acordou, tomou banho, vestiu sua roupa, tomou café e escovou os dentes. Quando ia sentar para estudar para a aula de Segurança da Informação, pegou seu celular e reparou que tinha recebido o seguinte e-mail:\r\n\r\n\"Bom dia Ainoã.\r\nVimos que você trabalha na área de informática.\r\nEstamos precisando de alguém para nos auxiliar na proteção dos dados.\r\nComo você é uma excelente aluna, o professor Daves te indicou para nós.\r\nEstá disponível para marcarmos uma reunião?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.\"\r\n\r\nAinoã respondeu que estava disponível para marcar uma reunião, agradecendo a oportunidade. Feliz com o e-mail recebido, logo foi preparando algumas perguntas para realizar para Brigite.', 'Tendo em mente que um dos pilares da segurança da informação é a CAUSALIDADE, uma das perguntas que Ainoã deve fazer durante a reunião é sobre as relações de causa e efeito que ocorrem entre os dados na intranet da empresa.', 'Tendo em mente que um dos pilares da segurança da informação é a INTEGRIDADE, uma das perguntas que Ainoã deve fazer durante a reunião é sobre a disponibilidade das informações a cada trabalhador da empresa.', 'Tendo em mente que um dos pilares da segurança da informação é a CONFIDENCIALIDADE, uma das perguntas que Ainoã deve fazer durante a reunião é sobre como funciona o acesso às informações da empresa pelos trabalhadores.', 21, 1, 125, 1),
(2, 1, 'Ainoã faz uma revisão das perguntas que anotou e repara que errou alguns termos. Lembra então que deve estudar para a disciplina de Segurança da Informação. Ao fim da tarde, recebe um novo e-mail da empresa:\r\n\r\n“Olá Ainoã,\r\nPodemos agendar para amanhã às 08h, aqui na empresa?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.”\r\n\r\nEla responde que sim. Empolgada e se sentindo preparada para a reunião, resolve tirar a noite para descansar, assistindo sua série favorita. No dia seguinte ela acorda atrasada para a reunião, se arruma correndo e chega na porta da empresa às 08h15min. Pede desculpas pelo atraso e é chamada por Brigite para começar a reunião. Reparando que a entrada em determinadas áreas da empresa é autorizada mediante o uso de cartão de controle de acesso, Ainoã diz para Brigite:', 'Todos os trabalhadores e visitantes devem ter acesso irrestrito a qualquer área da empresa, conforme diz a norma ISO 17007. Logo, o uso de cartões de controle de acesso é desnecessário.', 'A norma ISO 27001 diz que todas as informações da empresa devem estar disponíveis para quem solicitar. Ao restringir o acesso a determinadas áreas, vocês estão cumprindo perfeitamente o que a norma solicita.', 'De acordo com a norma ISO 27002, é conveniente que o acesso às áreas onde existem dados mais sensíveis da empresa seja realizado somente por pessoas autorizadas. Vocês estão de parabéns ao garantir isso.', 21, 2, 92, 32),
(3, 1, 'Ao revisar as perguntas que anotou, Ainoã repara que confundiu alguns termos com seus significados. Lembra então que deve estudar para a disciplina de Segurança da Informação. Ao fim da tarde, recebe um novo e-mail da empresa:\r\n\r\n“Olá Ainoã,\r\nPodemos agendar para amanhã às 08h, aqui na empresa?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.”\r\n\r\nEmpolgada, ela responde que sim. Estuda mais e resolve descansar a mente antes de dormir, assistindo sua série favorita. No dia seguinte ela acorda no horário, toma banho, se arruma, toma um café reforçado e chega pontualmente na empresa. Brigite estava aguardando por ela, e logo a chama para começarem a reunião. Ainoã repara que algumas áreas da empresa só são acessíveis através do uso de cartão de controle de acesso. Curiosa, pergunta para Brigite:', 'Todos os trabalhadores e visitantes podem solicitar acesso irrestrito a qualquer área da empresa? Pois é isso que a norma ISO 17007 menciona.', 'Conforme a norma ISO 27001 todos os dados devem estar disponíveis para quem solicitar. A restrição do acesso a determinadas áreas é feita para garantir isso?', 'Os dados mais sensíveis da empresa estão em áreas onde somente pessoas autorizadas têm acesso? A norma ISO 27002 recomenda isso.', 21, 3, 93, 32),
(4, 1, 'Ainoã analisa as perguntas que anotou e percebe que estão coerentes, com os termos e significados corretos. Resolve anotar mais algumas perguntas, onde opta por estudar para a disciplina de Segurança da Informação. Dessa forma, ela pode se lembrar de algo e até aprender coisas novas, para incrementar suas perguntas. Ao fim da tarde, recebe o seguinte e-mail:\r\n\r\n“Olá Ainoã,\r\nPodemos agendar para amanhã às 08h, aqui na empresa?\r\nAtt,\r\nJonas Andrew Brigite\r\nTransportadora Brigite Ltda.”\r\n\r\nInstantaneamente, Ainoã responde que sim. Vendo que o sol já está se pondo, resolve dar mais uma revisada na matéria e ir descansar a mente antes de dormir, assistindo sua série favorita. No dia seguinte ela acorda cedo, toma banho, se arruma, toma um café reforçado e chega às 07h45min na porta da empresa. Brigite chega junto com ela e, agradecendo que tenha se adiantado, oferece para apresentar a empresa antes da reunião. Ele mostra cada área e pergunta o que Ainoã achou. Lembrando do conteúdo que estudou, ela responde:', 'Cada área possui fácil acesso mas, ao mesmo tempo, este é restringido pelo uso de cartões de controle de acesso. Conforme a norma ISO 17007, essa restrição é desnecessária pois todos os trabalhadores e visitantes devem ter acesso irrestrito a qualquer área da empresa.', 'Gosto da forma como as áreas da empresa estão dispostas. Como o uso de cartões de controle de acesso é constante para acessar cada área, a disponibilização dos dados é garantida para todos os trabalhadores e visitantes, conforme recomenda a norma ISO 27001. Parabéns!', 'Amei a organização da empresa. Os dados mais sensíveis ficam armazenados em áreas onde somente pessoas autorizadas têm acesso, o que é recomendado pela norma ISO 27002. Parabéns!', 21, 4, 94, 32),
(5, 1, 'Brigite responde para Ainoã:\r\n\r\n\"Não sabia que essa norma existia. Inclusive, quem me orientou a colocar o sistema de cartões de controle de acesso na empresa foi o professor Daves, após o ataque aos nossos dados.\"\r\n\r\nAinoã questiona:\r\n\r\n\"Ataque aos dados?\"\r\n\r\nBrigite responde:\r\n\r\n\"Sim. Entraram em nosso servidor e conseguiram acesso a todas as rotas que fazemos, os tipos de cargas que levamos em cada caminhão, quanto vale cada carga e cada frete, entre outras informações. Isso aconteceu semana passada, e nós só descobrimos pois as cargas de três caminhões foram roubadas em um só dia.\"\r\n\r\nAinda chocada com o ocorrido e curiosa sobre o que foi feito com o servidor, Ainoã questiona:', 'Nossa! E por quais motivos vocês têm um servidor? É muito mais seguro conectar todos os computadores em rede e permitir que cada um tenha suas próprias informações armazenadas, garantindo o acesso à todas as informações por todos os computadores.', 'Isso é muito comum. Em 2018, estima-se que mais de 3 milhões de ataques desse tipo foram feitos em São Paulo. Após o ataque, vocês trocaram de servidor? É importante garantir que aquele jamais seja usado novamente.', 'Nossa! Como se dá o acesso às informações do servidor por cada computador? Os funcionários não devem ter acesso direto ao servidor, muito menos acessarem navegadores de internet através dele, por exemplo.', 21, 5, 95, 33),
(6, 1, 'Brigite responde para Ainoã:\r\n\r\n\"Todos os dados estão sim disponíveis, mas é necessário fazer uma solicitação a alguém que tenha acesso aos dados que se quer antes de conseguir acessá-los. É principalmente por isso que implantamos o sistema de cartões de controle de acesso. Foi justamente o acesso irrestrito aos dados, como era feito anteriormente, que permitiu que o ataque aos nossos dados fosse realizado.\"\r\n\r\nAinoã questiona:\r\n\r\n\"Ataque aos dados?\"\r\n\r\nBrigite responde:\r\n\r\n\"Sim. Entraram em nosso servidor e conseguiram acesso a todas as rotas que fazemos, os tipos de cargas que levamos em cada caminhão, quanto vale cada carga e cada frete, entre outras informações. Isso aconteceu semana passada, e nós só descobrimos pois as cargas de três caminhões foram roubadas em um só dia.\"\r\n\r\nDiante do exposto por Brigite, Ainoã responde:', 'Esse é o principal problema de usar servidores. Eles não são recomendados em nenhuma hipótese. O melhor é colocar todos os computadores em rede e garantir que cada um tenha acesso às informações armazenadas nele e nos outros.', 'Esses ataques ocorrem bastante. Mais de 3 milhões deles aconteceram em São Paulo, em 2018. E não tem como recuperar o servidor após esses ataques. O melhor é descartá-lo e adquirir outro.', 'O ideal é que os funcionários não tenham acesso direito ao servidor, sendo que não devem ter direito de realizar modificações nos arquivos, muito menos de acessar navegadores de internet, por exemplo.', 21, 6, 96, 33),
(7, 1, 'Brigite responde para Ainoã:\r\n\r\n\"Principalmente após o ataque aos nossos dados, fizemos questão de garantir que os dados mais sensíveis tenham o acesso liberado para poucas pessoas, sendo essas de confiança. Obrigado por me mostrar que estamos no caminho certo.\"\r\n\r\nAinoã questiona:\r\n\r\n\"Ataque aos dados?\"\r\n\r\nBrigite responde:\r\n\r\n\"Sim. Entraram em nosso servidor e conseguiram acesso a todas as rotas que fazemos, os tipos de cargas que levamos em cada caminhão, quanto vale cada carga e cada frete, entre outras informações. Isso aconteceu semana passada, e nós só descobrimos pois as cargas de três caminhões foram roubadas em um só dia.\"\r\n\r\nSurpresa com essa informação, Ainoã solicita permissão para averiguar se:', 'Todos os computadores foram colocados em rede após o ataque e o servidor foi descartado, que é o melhor a se fazer.', 'O servidor foi descartado e trocado por outro, haja vista que após ataques do tipo o servidor fica irrecuperável.', 'O acesso direto ao servidor foi bloqueado para os funcionários, pois ataques do tipo podem começar por cliques em spams, banners de propaganda falsos, entre outros.', 21, 7, 97, 33),
(8, 1, 'Brigite diz para Ainoã que o servidor foi formatado pelo professor Daves, e que ele mesmo fez a instalação e configuração do servidor na empresa. Diz ainda que em nenhum momento mencionou a opção de descartar o servidor e colocar todos os computadores em rede.\r\n\r\n\"Pode ser por fazermos licitações e algumas de nossas informações serem de acesso público.\" - diz Brigite.\r\n\r\nAinoã responde:', 'Não há relação entre as informações de acesso público e o uso de servidor. Na verdade, nenhuma informação de empresas deve ser pública. O melhor é sempre buscar a segurança dos dados da empresa, mesmo que para isso seja necessário restringir cada vez mais o acesso a esses dados.', 'A importância de colocar os computadores em rede está em garantir que qualquer funcionário possa fazer alterações nas informações da empresa, principalmente nas públicas. Se alguém acessar alguma informação desatualizada, isso pode trazer problemas para a empresa.', 'É importante garantir que essas informações públicas não sejam modificadas sem autorização prévia. Há algum mecanismo de proteção sendo usado para isso?', 21, 8, 98, 34),
(9, 1, '\"O servidor foi formatado, instalado e configurado na empresa pelo professor Daves. Ele não disse que era necessário trocar de servidor, acredito que até mesmo por ele ser caro e nós não termos condições financeiras de comprar outro.\" - responde Brigite.\r\n\r\n\"Entendo.\" - diz Ainoã.\r\n\r\n\"Eu estou curioso sobre nossos dados que são publicamente acessíveis. Como fazemos licitações com a prefeitura, as informações referentes a essas ficam disponíveis para que quem precisar consiga acesso. Nesses casos, há como fazer a segurança dos dados?\" - pergunta Brigite.\r\n\r\nAinoã responde:', 'Nenhuma empresa deve manter quaisquer informações acessíveis publicamente. Por estar buscando a segurança dos dados, o melhor é restringir o acesso a um número mínimo de pessoas.', 'Para garantir essa segurança, o ideal é permitir que todos os funcionários possam modificar as informações da empresa a qualquer momento. Os dados da empresa não podem ficar desatualizados, e permitir esse acesso é uma das formas de garantir isso.', 'Para fazer a segurança desses dados, é importante ter mecanismos de proteção que garantam a integridade das informações e impeçam que as mesmas sejam modificadas sem autorização prévia.', 21, 9, 99, 34),
(10, 1, 'Brigite diz para Ainoã que antes qualquer um poderia acessar facilmente o servidor, mas que agora isso não é mais permitido. Ele diz que apenas os dados publicamente acessíveis, como os de trabalhos realizados através de licitações com a prefeitura, são acessíveis para todos. Ainoã questiona:', 'Por quais motivos você mantêm alguns dados acessíveis para todos? Nenhuma informação de empresas deve ser pública. Mesmo em caso de licitações, é importante garantir que o acesso a essas informações seja restrito, buscando a segurança dos dados da empresa.', 'Essas informações podem ser alteradas por qualquer funcionário? É importante garantir isso, pois elas podem precisar de atualização a qualquer instante. Principalmente por serem públicas, alguém pode acabar acessando alguma informação que esteja desatualizada, e isso é perigoso para a empresa.', 'São utilizados mecanismos de proteção para garantir a integridade dessas informações que são disponibilizadas publicamente? Isso para evitar que sofram modificações não autorizadas.', 21, 10, 100, 34),
(11, 1, 'Brigite diz que independente deles manterem essas informações públicas ou não, por serem informações de licitações, a própria prefeitura deixa as informações acessíveis. Mas, diante do dito por Ainoã, ele questiona se existe algum documento que pode ser feito para não deixar dúvidas a quem desejar acessar os dados da empresa, sobre como funcionam as políticas de segurança dessa. Ainoã diz:', 'Não conheço nenhum documento assim. O que pode ser feito é o oferecimento de um curso para que todos os funcionários e clientes estejam por dentro de como funcionam as políticas de segurança da empresa.', 'O Documento da Gestão de Segurança dos Dados tem essa função. Através dele, os funcionários e clientes compreendem os processos realizados pela empresa para manter a segurança dos dados.', 'O documento Política de Segurança da Informação tem essa função. Com ele, os funcionários e clientes podem entender como estão estabelecidas as diretrizes corporativas para a proteção das informações da empresa.', 21, 11, 101, 35),
(12, 1, 'Brigite diz:\r\n\r\n\"O professor Daves me orientou a não permitir que todos os funcionários acessem e modifiquem as informações a qualquer momento, principalmente após o ataque que foi realizado. Independente dos funcionários terem acesso à modificação das informações ou não, há algum documento que pode ser redigido para fazer com que os funcionários, clientes, e outros, compreendam as políticas de segurança adotadas pela empresa?\"\r\n\r\nAinoã responde:', 'Até onde eu saiba, não existe um documento com essas especificações. É melhor juntar os funcionários e clientes e fornecer um curso a eles, os orientando acerca de tais políticas adotadas pela empresa.', 'Eu posso redigir o Documento da Gestão de Segurança dos Dados, que serve para  fornecer aos funcionários e clientes as bases para a compreensão de como a empresa mantém a segurança dos dados.', 'Tem o documento Política de Segurança da Informação, que visa orientar os funcionários e clientes sobre as diretrizes corporativas para a proteção das informações da empresa.', 21, 12, 102, 35),
(13, 1, 'Brigite diz para Ainoã que o professor Daves não teve tempo para terminar todos os procedimentos, e por isso a indicou para realizar as demais tarefas. De acordo com as informações já passadas por Ainoã, ele questiona se há algum documento que deve ser feito para que todos os funcionários, clientes, e demais pessoas que possuem acesso às informações da empresa possam agir de acordo com as políticas de segurança adotadas pela empresa. Ainoã responde que:', 'Não existe nenhum documento do tipo.Todos os funcionários e clientes devem passar por um curso para compreender o funcionamento das políticas de segurança adotadas pela empresa.', 'Há um documento intitulado de Documento da Gestão de Segurança dos Dados, que serve para demonstrar aos funcionários e clientes como devem ser realizados o acesso aos dados da empresa.', 'Há um documento chamado de Política de Segurança da Informação, que tem a função de orientar e estabelecer diretrizes corporativas para a proteção das informações da empresa.', 21, 13, 103, 35),
(14, 1, 'Brigite diz para Ainoã que pensava ser possível fazer algum documento explicando tais políticas. Isso principalmente pelo fato de algumas informações da empresa não poderem passar por todos os crivos de segurança. Ele questiona o que deve ser feito nesse caso de exclusão de alguns critérios de aceitação dos riscos. Ainoã diz que:', 'Tal como não existe nenhum documento onde sejam inseridas as políticas de segurança adotadas pela empresa, também não há nada a ser feito nesse caso. Cada avaliação de segurança é importante e, portanto, todas devem ser seguidas na íntegra.', 'Como existem níveis diferentes de acesso às informações para os funcionários, o ideal é que cada um cuide da segurança das informações a quem tem acesso, ainda que essas não passem por todos os crivos de segurança.', 'No caso de exclusão de alguns critérios de aceitação dos riscos, a empresa precisa apresentar justificativa e evidências de que os riscos serão aceitos pelas pessoas responsáveis.', 21, 14, 104, 36),
(15, 1, 'Brigite diz não ter conhecimento desse documento mencionado por Ainoã. Ele complementa sua fala:\r\n\r\n\"Já ia me esquecendo! Há algumas informações da empresa que não podem passar por todas as avaliações de segurança. Nessa situação, como iremos excluir alguns critérios de aceitação dos riscos, o que deve ser feito?\"\r\n\r\nAinoã responde:', 'Nada. Todo crivo de segurança é necessário, e eles estão ali justamente para garantir a segurança das informações da empresa. Não recomendo que nenhum deles seja anulado.', 'As informações devem ser protegidas por cada funcionário que possui acesso às mesmas. Ainda que alguma avaliação de segurança não seja feita, são os funcionários que precisam garantir a segurança dessas informações.', 'A empresa fica encarregada de apresentar justificativa e evidências de que as pessoas responsáveis estão aceitando os riscos de algumas informações não passarem pelas avaliações de segurança.', 21, 15, 105, 36),
(16, 1, '\"Perfeitamente!\" - responde Brigite - \"Mesmo após o ataque que sofremos, nós entramos em acordo que algumas informações não podem passar cem por cento por todos as avaliações de segurança, sendo necessário a exclusão de alguns critérios de aceitação dos riscos. Como devemos agir nesse caso?\"\r\n\r\nAinoã analisa a situação, pensa bem, e responde:', 'Não há nada a ser feito. Todas as avaliações de segurança devem ser seguidas na íntegra e a empresa não pode se negar a utilizar quaisquer delas.', 'Os funcionários que têm acesso a essas informações devem garantir a segurança delas, ainda que não passem nas avaliações de segurança.', 'A empresa deve apresentar justificativa e evidências de que os riscos serão aceitos pelas pessoas responsáveis.', 21, 16, 106, 36),
(17, 1, 'Ainoã pergunta a Brigite como eles lidam com os documentos impressos e mesmo os escritos a mão. Brigite responde:\r\n\r\n\"Todos os documentos são guardados em armários dentro do galpão. Lá os funcionários guardam os documentos necessários, conforme o sistema de organização dos documentos que adotamos, e também podem pegar os documentos que precisarem.\"\r\n\r\nAinoã diz que:', 'A empresa está muito correta em sua ação. Todos os funcionários devem ter acesso às informações que estão em documentos impressos e escritos a mão.', 'A empresa deve ter mais cautela quanto à disposição desses documentos. O certo seria que cada área tivesse armários próprios, onde os documentos pertinentes fossem ali guardados.', 'Não é certo que todos os funcionários tenham acesso a esses documentos. O ideal é que um profissional de confiança seja contratado para ficar responsável por arquivar os documentos e entregar para quem solicitar.', 21, 17, 107, 37),
(18, 1, 'Brigite diz para Ainoã que além das informações disponíveis nos computadores, há também aquelas que estão em documentos impressos e escritos a mão. Esses documentos são armazenados em armários dentro de um galpão, onde todos os funcionários possuem acesso e podem guardar e pegar os documentos que precisarem. Brigite pede a opinião de Ainoã sobre essa ação da empresa. Ela responde:', 'Todos os documentos devem ser acessíveis para quem precisar. A empresa está de parabéns por lidar dessa forma com seus documentos impressos e escritos a mão.', 'É perigoso ter um galpão central para todos os documentos. O ideal é que cada área tenha seus próprios armários, onde os documentos pertinentes possam ser guardados.', 'A empresa deve contratar um profissional de confiança para ficar responsável por armazenar os documentos impressos e escritos a mão e os entregar quando solicitado por alguém.', 21, 18, 108, 37),
(19, 1, 'Ainoã observa que há um galpão onde ela ainda não foi. Ela pergunta a Brigite o que tem ali. Ele responde:\r\n\r\n\"Ali são guardados todos os documentos impressos e escritos a mão da empresa. Eles são armazenados em armários dispostos conforme o sistema de organização que adotamos. Cada funcionário pode entrar, guardar os documentos que tiver e pegar os que forem necessários.\"\r\n\r\nAinõa diz para Brigite:', 'Parabéns por essa ação! Todos os documentos impressos e escritos a mão devem ser acessíveis para todos os funcionários, pois podem ser necessários em momentos não planejados.', 'Não é certo ter um local fixo onde todos os documentos sejam guardados. Cada área da empresa deve ter armários onde os funcionários possam guardar e acessar os documentos necessários.', 'Isso é perigoso! Tal como com as informações armazenadas nos computadores, devemos ter cuidado com as armazenadas em documentos impressos e escritos a mão. O certo é contratar um profissional de confiança responsável por guardar os documentos e os entregar quando solicitado por alguém.', 21, 19, 109, 37),
(20, 1, 'Brigite agradece o elogio, mas diz que o professor Daves havia chamado a atenção para a questão da organização dos documentos impressos e escritos a mão na empresa.\r\n\r\n\"Aproveitando, o que você nos orienta a fazer com os documentos que já passaram do prazo necessário para ficarem guardados, como as Comunicações de Acidente de Trabalho (CAT\"s) que estão guardadas há mais de 10 anos? Nós estamos com alguns para serem descartados, mas não sabemos o que fazer com os mesmos.\" - fala Brigite.\r\n\r\nAinoã responde:', 'Nenhum documento deve ser descartado. Todos devem ser armazenados para sempre, mesmo se a empresa vier a deixar de existir.', 'Como cada área deve cuidar da documentação a ela pertinente, o certo é que os próprios funcionários fiquem encarregados de descartar os documentos ao passar o prazo.', 'Um dos dirigentes da empresa ou um funcionário de confiança deve ser responsável por picar os documentos, de preferência com uma fragmentadora de papel, e descartá-los.', 21, 20, 110, 38),
(21, 1, 'Brigite diz que pesquisou anteriormente e havia lido que o ideal seria ter um local onde todos os documentos estivessem armazenados e organizados, principalmente para facilitar o acesso a eles quando necessário.\r\n\r\n\"A propósito, como devemos descartar os documentos armazenados há mais tempo que o necessário, como as Comunicações de Acidente de Trabalho (CAT\"s) que estão guardadas há mais de 10 anos?\" - questiona Brigite.\r\n\r\nAinoã diz que:', 'Todos os documentos precisam ser guardados para sempre. A empresa precisa ter um local onde possa deixar esses documentos armazenados para garantir os acessos futuros a eles.', 'Cada funcionário deve ser responsável por cuidar da documentação da área na qual trabalha. Portanto, os descartes dos documentos que passaram do prazo deve também ser realizado por eles.', 'Como os documentos contêm dados importantes da empresa, devem ser cuidados por um dos dirigentes dessa ou por um funcionário de confiança, que deve picar os documentos em uma fragmentadora de papel antes de descartá-los.', 21, 21, 111, 38),
(22, 1, '\"Não sabia que os documentos impressos e escritos a mão demandavam esse cuidado! Muito obrigado por essa informação.\" - diz Brigite - \"Aproveitando o assunto, o que devemos fazer com os documentos que já estão guardados há mais tempo que o prazo necessário, como as Comunicações de Acidente de Trabalho (CAT\"s) que estão armazenadas há mais de 10 anos?\"\r\n\r\nAinoã pensa bem e responde:', 'Guarde todos os documentos para sempre. Tenha locais onde eles possam ser devidamente armazenados e cuidados, para garantir o acesso aos mesmos se e quando for necessário.', 'Os funcionários que possuem acesso a esses documentos devem ser responsáveis por realizar o descarte dos mesmos quando passado o prazo necessário. É importante garantir que eles façam isso.', 'A empresa deve garantir que um dos dirigentes ou um funcionário de confiança pique esses documentos, de preferência em uma fragmentadora de papel, e depois faça o descarte dos mesmos devidamente.', 21, 22, 112, 38),
(23, 1, 'Brigite fica surpreso com a informação, e diz que não tem ideia de como poderá fazer para garantir que esses documentos sejam devidamente armazenados para sempre. Diz ainda que, de tempos e tempos, são buscadas informações relevantes que tornem a manutenção e reavaliação dos planos de continuidade do negócio necessárias. Ele questiona a Ainoã se, entre essas informações, os nomes, endereços e telefones de participantes e as estratégias de negócio devem estar presentes.\r\n\r\nAinoã responde:', 'Como são informações desnecessárias, elas não devem estar presentes entre as informações relevantes que tornem a manutenção e reavaliação dos planos de continuidade do negócio necessárias.', 'As estratégias de negócio não compõem o quadro de informações relevantes da empresa que tornam a manutenção e a reavaliação dos planos de continuidade do negócio necessárias, de acordo com a norma ISO 27002.', 'Os nomes, endereços e telefones de participantes e as estratégias de negócio são informações relevantes para a empresa, sendo que a atualização dessas pode levar à manutenção e reavaliação dos planos de continuidade de negócio, conforme a norma ISO 27002.', 21, 23, 113, 39),
(24, 1, 'Brigite agradece a Ainoã pela informação, e diz que garantirá que os funcionários fiquem responsáveis pelo descarte dos devidos documentos. Aproveitando a situação, ele questiona se nomes, endereços e telefones de participantes e as estratégias de negócio devem estar presentes entre as informações relevantes que tornem a manutenção e reavaliação dos planos de continuidade do negócio necessárias.\r\n\r\nAinoã diz que:', 'Os nomes, endereços e telefones de participantes e as estratégias de negócio não fazem parte das informações relevantes da empresa e, portanto, são desnecessárias.', 'A norma ISO 27002 diz que a manutenção e a reavaliação dos planos de continuidade do negócio devem ser realizadas também quando informações relevantes são atualizadas, sendo que as estratégias de negócio não fazem parte destas.', 'A norma ISO 27002 diz que a manutenção e a reavaliação dos planos de continuidade do negócio devem ser realizadas também quando informações relevantes são atualizadas, sendo que tanto os nomes, endereços e telefones de participantes quanto as estratégias de negócio fazem parte destas.', 21, 24, 114, 39),
(25, 1, '\"Eu não sabia que era importante garantir que o descarte fosse realizado dessa forma. Muito obrigado pela informação!\" - agradece Brigite - \"Como estamos tratando de documentos impressos e escritos a mão, aproveito para dizer que de tempos em tempos, buscamos informações relevantes que demonstrem que a manutenção e a reavaliação dos planos de continuidade do negócio são necessárias. Os nomes, endereços e telefones de participantes e as estratégias de negócio devem estar presentes entre essas informações?\"\r\n\r\nAinoã pensa bem e responde:', 'Somente as informações necessárias são relevantes para a manutenção e reavaliação dos planos de continuidade do negócio. Os nomes, endereços e telefones de participantes e as estratégias de negócio não fazem parte dessas informações.', 'Conforme a norma ISO 27002, os nomes, endereços e telefones dos participantes devem estar entre as informações relevantes que tornem a manutenção e a reavaliação dos planos de continuidade do negócio necessárias, mas não as estratégias de negócio.', 'Conforme a norma ISO 27002, tanto os nomes, endereços e telefones dos participantes quanto as estratégias de negócio são informações que, se atualizadas, podem levar à manutenção e reavaliação dos planos de continuidade do negócio.', 21, 25, 115, 39),
(26, 1, 'Agradecendo a Ainoã pela reunião, Brigite aproveita para perguntar se deixou de levantar algum ponto importante. Ainoã diz:', 'É importante garantir que todos os funcionários tenham um bom inglês. Muitos programas possuem textos em inglês, e garantir que os funcionários saibam ler tranquilamente nessa língua é fundamental.', 'Realmente há necessidade de ser realizado um trabalho de Segurança da Informação nessa empresa? Tudo está funcionando tão bem, mesmo após o ataque que vocês sofreram.', 'Como iremos medir a eficácia dos controles e grupos de controles escolhidos? Isso é importante, pois é necessário comparar ou reproduzir os resultados da implementação destes controles.', 21, 26, 116, 40),
(27, 1, 'Prestes a encerrar a reunião, Brigite agradece a Ainoã pelo tempo que disponibilizou para a empresa e questiona se há algum assunto relevante que não foi tratado durante a reunião. Ainoã responde que:', 'Os funcionários precisam fazer um bom curso de inglês. Diversos programas possuem muitos textos em inglês, e os funcionários precisam saber lê-los.', 'A empresa está funcionando muito bem, mesmo após o ataque. Por isso, ela não vê necessidade de ser realizado um trabalho de Segurança da Informação na mesma.', 'Eles precisam conversar sobre como serão feitas as medidas da eficácia dos controles ou grupos de controles escolhidos, haja vista a necessidade de comparação ou reprodução dos resultados da implementação de tais controles.', 21, 27, 117, 40),
(28, 1, 'Brigite agradece a Ainoã pela reunião. Antes de encerrá-la, questiona se há algo a ser realizado na empresa que ele não mencionou, e que precisa ser levado em consideração. Ainoã responde que:', 'O treinamento do inglês dos funcionários é essencial. Como a maioria dos programas possuem textos em inglês, treinar os funcionários para compreender esses textos é de extrema importância para a organização.', 'Deve ser averiguado se realmente há necessidade da ser realizado um trabalho de Segurança da Informação na empresa, haja vista que mesmo após o ataque todos os setores têm trabalhado bem.', 'Precisa ser definido como será realizada a medida da eficácia dos controles ou grupos de controles escolhidos, pois é importante comparar ou reproduzir os resultados da implementação destes controles.', 21, 28, 118, 40),
(29, 1, 'Brigite agradece a Ainoã pela reunião. Pensativa pelas respostas dadas, ela fica o dia todo ansiosa, olhando o celular a cada minuto, aguardando uma resposta da empresa.', '-', '-', '-', 21, 29, 119, 41),
(30, 1, 'Brigite agradece a Ainoã pela reunião. Após sair da empresa, Ainoã percebe que cometeu alguns equívocos em suas respostas a Brigite. Ela se questiona se mesmo assim a empresa dará uma oportunidade a ela.', '-', '-', '-', 21, 30, 120, 41),
(31, 1, 'Brigite agradece a Ainoã pela reunião. Ela vai contente para a casa, e fica o dia todo sorridente aguardando algum e-mail com uma resposta da empresa.', '-', '-', '-', 21, 31, 121, 41),
(45, 3, '\"Olá! Meu nome é Renata. Contratei os serviços de vocês pois estou abrindo uma seguradora de veículos, e vou precisar de todo suporte possível para não correr riscos no que tange à segurança de nossas informações. O mercado de seguros é muito competitivo e qualquer vazamento pode comprometer nosso trabalho.\"\r\n\r\n\"Olá Renata! Meu nome é Douglas. Seja bem-vinda à Companhia Segurança da Informação Ltda. Obrigado por entrar em contato através do suporte online. Este é o nosso cantinho, onde estamos dispostos todos os dias, 24hrs por dia, a tirar suas dúvidas e propor soluções. Saiba que as informações de sua seguradora estão seguras, com o perdão do trocadilho, conosco. Em que posso ser útil?\"\r\n\r\n\"Douglas, há uma semana recebi a notícia de que está tudo certo e vou conseguir abrir a seguradora. De início, quero algumas dicas sobre como posso dar os primeiros passos no que tange a proteger as informações da empresa.\"\r\n\r\nDouglas responde:', '\"Parabéns por ter conseguido dar um dos primeiros grandes passos para o sucesso de sua seguradora! Para proteger as informações, eu preciso que você instale alguns softwares em todos os computadores da empresa, cujos posso te mandar os links para que você faça a compra dos mesmos. São bem baratos e fáceis de instalar e usar.\"', '\"Preciso das informações referentes às prioridades da empresa e o orçamento disponível para a realização dos serviços e compra dos equipamentos necessários. E parabéns por conseguir dar início à abertura da seguradora!\"', '\"Estou verificando o seu cadastro no sistema e identifiquei que foi colocado como prioridade a compra de equipamentos em primeiro lugar e a preservação das informações da empresa em segundo, além do orçamento máximo, a princípio, no valor de R$50.000,00 (cinquenta mil reais). Estas informações estão corretas? Preciso saber para dar continuidade às orientações. A propósito, parabéns por ter dado tudo certo para você abrir sua seguradora!\"', 21, 1, 125, 1),
(46, 3, '\"Eu ainda não tenho os equipamentos para realizar estas instalações. Cadastrei algumas prioridades no site assim que contratei os serviços de vocês. A primeira delas é justamente a compra de equipamentos. Elas não estão aparecendo aí?\" - diz Renata.\r\n\r\n\"Na verdade eu não cheguei a verificar estas informações Renata. Sobre a compra de equipamentos, eu preciso saber quantos funcionários sua empresa tem.\"\r\n\r\n\"A seguradora não tem nenhum funcionário, já que ainda não foi aberta. Quando ela estiver em funcionamento, tenho pensado em quatro funcionários a princípio.\" - responde Renata.', '\"Como são poucos funcionários, recomendo que seja montado um Data Center e efetuada a compra de apenas 4 computadores, sendo um para cada funcionário. Posso fazer o orçamento deles para você e te enviar no prazo de 7 dias.\" - responde Douglas.', '\"Como são poucos funcionários, você pode utilizar o orçamento para adquirir mais equipamentos. Por isso, recomendo que seja montado um Data Center, para guardar e fazer backup dos dados dos sistemas utilizados pela empresa; 4 impressoras, para agilizar os processos de impressão; 4 armários, para guardar  toda a documentação da empresa e 10 computadores e 10 telefones ou celulares, sendo um computador e um telefone para você e um de cada para cada funcionário, além de 5 de cada reservas. Faço o orçamento destes equipamentos e te encaminho no prazo de 5 dias.\" - responde Douglas.', '\"No seu caso, o ideal é que seja montado um Data Center, para armazenar e fazer backup dos dados dos sistemas utilizados na empresa; adquirir 2 impressoras, para agilizar os serviços de impressão; 2 armários, onde será armazenada toda a documentação da empresa; 5 computadores e 5 telefones ou celulares, para você e para os funcionários. Irei fazer o orçamento destes e te encaminhar em no máximo 3 dias.\" - responde Douglas.', 21, 2, 92, 32),
(47, 3, '\"Estas informações foram cadastradas no site assim que eu contratei os serviços de vocês. Elas não aparecem para você?\" - diz Renata.\r\n\r\n\"Mil perdões Renata! Acabei de conferir aqui e elas estão aparecendo para mim sim. A sua prioridade é a compra de equipamentos, certo? Como se trata de uma seguradora que está começando agora, acredito que terá por volta de sete funcionários trabalhando com os computadores e acesso às informações da empresa, correto?\"\r\n\r\n\"Não acredito que a demanda será tão grande assim a princípio. Tenho pensado em quatro funcionários.\" - responde Renata.', '\"Por ser uma empresa que está começando agora, o ideal é comprar o mínimo de equipamentos possíveis. Por isso recomendo que apenas monte um Data Center e adquira  4 computadores, sendo um para cada funcionário. Faço o orçamento de tudo e te envio em 7 dias.\" - responde Douglas.', '\"Por ser uma empresa que está começando agora, o ideal é comprar o máximo de equipamentos possíveis. Por isso recomendo que você adquira 10 computadores e 10 telefones ou celulares, sendo um computador e um telefone para você e um de cada para cada funcionário, além de 5 de cada reservas; que seja montado um Data Center, para armazenar e fazer backup das informações da empresa; 4 impressoras, para agilizar os processos de impressão; 4 armários, para armazenar todos os documentos da seguradora. Faço o orçamento para você e te envio no máximo em 5 dias.\" - responde Douglas.', '\"Recomendo o seguinte: montar um Data Center, para armazenar e fazer backup dos dados dos sistemas utilizados; 2 impressoras, para agilizar os serviços de impressão; 5 computadores e 5 telefones ou celulares, sendo um computador e um telefone ou celular para você, e os demais para os funcionários; 2 armários, para armazenar os documentos da seguradora. Posso fazer o orçamento de tudo e te encaminhar em no máximo 3 dias.\" - responde Douglas.', 21, 3, 93, 32),
(48, 3, '\"Obrigada! E as informações estão corretas sim.\" -  diz Renata.\r\n\r\n\"Como a prioridade da empresa é a compra de equipamentos, torna-se necessário levantar algumas projeções. A princípio suponho que você terá um quadro de até quatro funcionários trabalhando com os computadores e acesso às informações da empresa, certo?\" - diz Douglas.\r\n\r\n\"Sim. Na verdade tenho pensado em exatamente quatro funcionários\" - responde Renata.', '\"Alguns equipamentos adquiridos por empresas são desnecessários. Para agilizar o processo e facilitar sua vida, vou fazer o orçamento da montagem de um Data Center e da compra de 4 computadores, sendo um para cada funcionário. Envio ele para você no prazo de 7 dias.\" - responde Douglas.', '\"Conheço empresas que pecaram por terem poucos equipamentos. O ideal é ter equipamentos para o uso e outros reservas. Por isso, vou fazer o orçamento e te enviar no prazo de 5 dias, de: 4 impressoras, para agilizar os processos de impressão; 10 computadores e 10 telefones ou celulares, sendo um computador e um telefone para você e um de cada para cada funcionário, além de 5 de cada reservas; 4 armários, para armazenar todos os documentos da empresa; e a montagem de um Data Center, para armazenar e fazer backup dos dados dos sistemas utilizados pela empresa.\" - responde Douglas.', '\"Nesse caso, irei encaminhar, em no máximo 3 dias, um orçamento referente à compra de 5 computadores e 5 telefones ou celulares, sendo um computador e um telefone ou celular para cada funcionário e um para você; 1 Data Center (incluindo a montagem dele), onde ficarão armazenados e será feito o backup dos dados dos sistemas utilizados na empresa; 2 impressoras, para agilizar os serviços de impressão;  e 2 armários, onde serão armazenados os documentos da seguradora.\" - responde Douglas.', 21, 4, 94, 32),
(49, 3, '\"Você consegue fazer o orçamento em menos tempo para mim? Preciso agilizar a compra dos equipamentos para colocar a empresa em funcionamento, e uma semana é um prazo muito longo. Além, quais suas recomendações para que possamos preservar as informações da empresa?\" - pergunta Renata.', '\"Uma das melhores formas de preservar as informações da empresa é garantindo que cada funcionário cuide dos dados a ele pertinentes. Assim, além de diminuir o tempo de serviço necessário para essa atividade, haja vista que ela será dividida entre todos os funcionários, cada um irá se especializar em preservar as informações com as quais trabalha, oferecendo uma segurança de maior qualidade.\" - responde Douglas.', '\"Podemos trabalhar com o documento referente à gestão do acesso de controle dos dados da empresa, partindo da definição de quais direitos e regras os grupos de usuários terão para acessar os dispositivos lógicos da seguradora. E sobre o orçamento, prometo tentar agilizar o máximo possível para você!\" - responde Douglas.', '\"Devemos fazer uma política de controle de acesso das informações da empresa, definindo as regras e os direitos que cada usuário, o que inclui você e todos aqueles que terão acesso às informações, têm para acessar os dispositivos lógicos e físicos da seguradora. Sobre o orçamento, eu vou tentar agilizar o máximo possível para você!\" - responde Douglas.', 21, 5, 95, 33),
(50, 3, '\"Tomara que meu orçamento dê conta de adquirir todos esses equipamentos. Você acha que consegue me enviar antes dos 5 dias? Quero agilizar a compra de tudo que for necessário, para colocar a seguradora em funcionamento. O que você me recomenda no que tange à preservação das informações da empresa?\" - pergunta Renata.', '\"Como contrapartida no que tange à questão orçamental da empresa, podemos tornar cada funcionário especialista em preservar as informações com as quais trabalha. Desta forma, economizamos em softwares necessários para vigiar o caminho que os dados fazem para entrar e sair do sistema, além de ter um serviço de maior qualidade, baseado na especialização dos funcionários.\" - responde Douglas.', '\"Prometo agilizar o orçamento o máximo possível para você! Sobre as informações da empresa, devemos cuidar do acesso de controle das mesmas. Podemos definir uma gestão do acesso de controle dos dados da empresa, onde estarão as regras e os direitos de cada usuário (qualquer um que possa ter acesso às informações da empresa) para acessar os dispositivos lógicos da seguradora.\" - responde Douglas.', '\"Vou fazer um esforço para conseguir te enviar o orçamento em no máximo 3 dias. Sobre as informações da empresa, devemos cuidar do acesso às mesmas. Podemos definir uma política de controle de acesso, onde as regras e os direitos que cada usuário, ou seja, qualquer um que possa ter acesso às informações da empresa, têm para acessar os dispositivos físicos e lógicos da seguradora.\" - responde Douglas.', 21, 6, 96, 33),
(51, 3, '\"Perfeitamente. O prazo de 3 dias parece ótimo para mim. Sendo estes os equipamentos recomendados a princípio, quais são suas recomendações no que tange à preservação das informações da empresa?\" - pergunta Renata.', '\"Podemos realizar um treinamento com os funcionários da sua seguradora, presencial ou online, conforme seu interesse, visando torná-los especialistas em preservar as informações com as quais trabalham. Essa descentralização faz com que a carga horária necessária para realizar a preservação seja diminuída, já que cada funcionário cuidará apenas daquelas referentes a ele, além de proporcionar economia para a empresa.\" - responde Douglas.', '\"O primeiro passo é definir a gestão do acesso de controle dos dados da empresa, com os direitos e as regras de cada usuário (o que inclui todos os funcionários, você, e qualquer um que terá acesso às informações) para acessar os dispositivos lógicos da seguradora.\" - responde Douglas.', '\"Para preservar as informações da empresa, em um primeiro momento, devemos cuidar do acesso às mesmas. Por isso o ideal é que façamos a política de controle de acesso, definindo as regras e os direitos que cada usuário (incluindo os funcionários, você e outras pessoas que possam ter acesso às informações) têm para acessar os dispositivos lógicos e físicos da seguradora.\" - responde Douglas.', 21, 7, 97, 33),
(52, 3, '\"Mas os funcionários que eu vou contratar não são meus conhecidos. Eu estou analisando os currículos que chegaram para mim, para decidir quem irei colocar para trabalhar na empresa.\" - diz Renata.\r\n\r\n\"Entendo.\" - diz Douglas.\r\n\r\n\"Então Douglas, como posso colocar a responsabilidade de preservar as informações nas mãos deles e, ao mesmo tempo, garantir que não irão apagar ou perder informações que estão no Data Center, por exemplo?\"', '\"O Data Center ficará armazenado dentro da empresa, por isso não é necessário se preocupar em garantir a segurança física ao mesmo. A Companhia Segurança da Informação Ltda. será responsável por manter a segurança dos dados e fazer backup dos mesmos em nossos servidores, tornando possível retorná-los para seus sistemas ainda que sejam apagados ou perdidos.\" - responde Douglas.', '\"Você precisa confiar em seus funcionários! Nós iremos proporcionar treinamento a eles, tornando-os aptos, até mesmo, para realizarem a vigilância do Data Center, impedindo o apagamento, acesso e/ou roubo, dos dados armazenados, por terceiros.\" - responde Douglas.', '\"No orçamento do Data Center, Renata, estarão inclusos os custos referentes à instalação do Data Center na empresa, no caso, com materiais de construção para fazer paredes ao redor do mesmo, e uma porta com acesso por biometria. Assim, somente você e, se for o caso, algum Técnico de Informática contratado terão o cadastro biométrico e acesso ao Data Center. Com isso evitamos os apagamentos e roubos das informações.\"', 21, 8, 98, 34),
(53, 3, '\"Interessante! O controle das informações da empresa é muito importante para mim. Como a concorrência é grande, preciso evitar que dados sobre os locais que estamos associados, por exemplo, sejam vazados. Sendo assim, todas essas informações serão registradas no sistema e armazenadas no Data Center, certo?\" - pergunta Renata.\r\n\r\n\"Para você esse tema é realmente muito importante. Ainda bem que escolheu nossa empresa para trabalhar com você e garantir a segurança das informações da seguradora! E, sim, as informações serão armazenadas no Data Center.\" - responde Douglas.\r\n\r\n\"Então como iremos garantir a segurança no acesso ao Data Center, Douglas?\"', '\"O Data Center estará internamente na empresa, Renata. Por isso não e necessário garantir a segurança física do mesmo. A Companhia Segurança da Informação Ltda. ficará responsável por manter a segurança dos dados e fazer backup dos mesmos em nossos servidores, tornando possível retorná-los para seus sistemas ainda que sejam apagados ou perdidos.\"', '\"Nós seremos responsáveis por proporcionar um treinamento para seus funcionários, garantindo que os mesmos se tornem especialistas em realizarem a vigilância do Data Center, impedindo que os dados armazenados no mesmo sejam acessados e/ou roubados por terceiros.\" - responde Douglas.', '\"Renata, no orçamento do Data Center está a instalação do mesmo, o que inclui a estrutura onde será armazenado (irei orçar tijolos para montar paredes bem robustas, fazendo um \"quartinho\" para ele), e uma porta com acesso biométrico. Por hora, o ideal é que apenas você e, se for o caso, um Técnico de Informática contratado tenha o cadastro biométrico e, portanto, acesso ao Data Center. Isso para garantir a segurança física dele e, com isso, evitar roubo de suas informações.\"', 21, 9, 99, 34),
(54, 3, '\"Perfeitamente! Tenho pensado bastante sobre a questão do controle do acesso às informações. Alguns contratos de seguros não podem ser vazados, principalmente para evitar que a concorrência busque vínculos com os locais que já estamos associados. No caso, todos os contratos lançados no sistema terão os dados armazenados no Data Center?\" - pergunta Renata.\r\n\r\n\"A nossa função é buscar o máximo de segurança para estas informações. E elas serão todas armazenadas no Data Center sim.\" - responde Douglas.\r\n\r\n\"Mas Douglas, como garantir segurança no acesso ao Data Center?\"', '\"Como o Data Center está dentro da empresa, não é preciso garantir segurança física ao mesmo. No caso, nós garantiremos a segurança dos dados, até mesmo fazendo backup deles para nossos servidores, garantindo que você não os perca.\" - responde Douglas.', '\"Através do treinamento proporcionado por nossa equipe, podemos garantir que todos os funcionários da sua empresa estarão aptos para realizarem a vigilância do Data Center, impedindo que os dados armazenados no mesmo sejam acessados e/ou roubados por terceiros.\" - responde Douglas.', '\"Renata, dentro do orçamento do Data Center, irei acrescentar o material necessário para fazer a estrutura onde ele irá ficar (no caso, recomendo paredes de tijolos, para ficar bem robusto), e uma porta com acesso biométrico. Por hora, o ideal é que apenas você e, se for o caso, um Técnico de Informática contratado tenham o cadastro biométrico e, portanto, acesso ao Data Center. Isso para garantir a segurança física dele e, com isso, evitar roubo de suas informações.\"', 21, 10, 100, 34);
INSERT INTO `tbl_perguntas` (`id`, `id_sequencia`, `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_pergunta_seq`, `id_destino`, `n_p_destino`) VALUES
(55, 3, '\"Sobre a segurança física do Data Center, eu tenho uma dúvida.\" - diz Renata. - \"Na verdade, eu vou te contar três casos e vou tirar três dúvidas, uma em cada caso. Pode ser?\"\r\n\r\n\"Pode sim.\" - responde Douglas.\r\n\r\n\"Pois bem Douglas. Um amigo meu está sofrendo com um incêndio que aconteceu na empresa dele. Na situação, todos os equipamentos eletrônicos foram perdidos. Na verdade, tudo que estava na empresa foi tomado pelo fogo. A questão é que todos os dados dos clientes foram juntos com os equipamentos, o que está fazendo ele perder noites de sono atrás das informações de alguns clientes, principalmente daqueles que frequentaram a empresa e não voltaram lá mais. Como podemos garantir que isso não irá acontecer comigo?\"', '\"As medidas contra incêndios não são 100% seguras. Ou seja, não posso afirmar que um incêndio não irá acontecer em sua empresa. O que é possível fazer é planejar como iremos correr atrás de todas as informações caso as mesmas sejam perdidas, principalmente aquelas que estão salvas no Data Center. Mas, ainda assim, não é algo 100% seguro, e não garante que, no mínimo, alguns dados serão realmente perdidos.\" responde Douglas.', '\"Renata, fico triste com a situação do seu amigo! Em seu caso, iremos fazer o Plano de Emergência Contra Incêndio. Nele estará todas as medidas cabíveis para evitar que um incêndio aconteça e, ainda que infelizmente ele venha a acontecer, também estará ali o planejamento para que a empresa retorne à ativa no menor tempo possível.\"', '\"A situação que seu amigo está passando não é fácil, Renata! Fico triste com isso. Em seu caso, iremos fazer o Plano de Continuidade de Negócios. Nele teremos as medidas necessárias para garantir que, mesmo após um desastre, a empresa retorne à ativa no menor tempo possível.\"', 21, 11, 101, 35),
(56, 3, '\"Ainda não estou certa se devo confiar tanto assim em meus funcionários, rs.\" - responde Renata - \"Mas, mudando de assunto, tenho três casos, alguns que aconteceram com amigos meus, que me trouxeram algumas dúvidas e quero tirá-las com você. O primeiro é sobre um incêndio que aconteceu na empresa de um amigo meu, levando ele a perder praticamente tudo que estava lá dentro, inclusive os equipamentos elétricos. Por isso ele perdeu todos os dados dos clientes da empresa, o que está gerando um grande transtorno para que ele consiga, ao menos, as informações de alguns clientes que frequentaram a empresa há alguns anos e não voltaram mais. Há alguma forma de evitar essa perda de informações?\"', '\"Este é um caso atípico, o que nos impede de ter qualquer controle sobre. Nós teremos uma reunião para decidirmos as medidas necessárias para, em casos como esse, corrermos atrás da maioria das informações perdidas possíveis. Mesmo assim, preciso te dizer que existe o risco de perder todas as informações e não consegui-las de volta.\" - responde Douglas.', '\"O Plano de Emergência Contra Incêndio, que iremos fazer em uma reunião futura, serve justamente para tomarmos medidas que possam evitar que um incêndio aconteça na empresa ou, em casos onde não seja possível impedi-lo, garantir que a empresa retome os serviços rapidamente. No caso dos dados salvos no Data Center, nós estaremos fazendo constantemente um backup em nossos servidores, tornando possível que eles possam ser recuperados rapidamente.\" - diz Douglas.', '\"O Plano de Continuidade de Negócios, que iremos fazer em uma reunião futura, serve justamente para tomarmos medidas que possam garantir que a empresa retome os serviços rapidamente, mesmo após um desastre. No caso dos dados salvos no Data Center, nós estaremos fazendo constantemente um backup em nossos servidores, tornando possível que eles possam ser recuperados rapidamente.\" - diz Douglas.', 21, 12, 102, 35),
(57, 3, '\"Que chique! Rsrs\" - responde Renata - \"Por falar em porta, eu lembrei da porta corta-fogo, o que me lembrou de três casos com três perguntas que preciso te fazer. O primeiro se refere à empresa de um amigo meu, que infelizmente sofreu um problema elétrico que gerou um incêndio, no qual ele perdeu praticamente tudo, incluindo os equipamentos elétricos. Todos os dados dos clientes dele também foram perdidos, o que está trazendo uma grande dor de cabeça para ele, para que consiga ao menos algumas informações de alguns clientes. Como podemos evitar isso?\"', '\"Bem, apesar de todas medidas cabíveis, não é possível garantir que sua empresa não sofrerá um incêndio. No caso, o que podemos fazer é planejar como correr atrás das informações perdidas se algum desastre acontecer e fazer com que você perca os dados armazenados no Data Center. Mas, ainda assim, não é certo que você irá conseguir todas as informações de volta.\" - responde Douglas.', '\"Que triste a situação do seu amigo Renata! Para evitar que isso ocorra em sua empresa, nós iremos fazer uma reunião para definirmos o Plano de Emergência Contra Incêndio. Nesse plano estaremos ressaltando todos os pontos necessários para garantir que, mesmo se não conseguirmos evitar o incêndio, a empresa possa assumir o controle da situação e retomar os serviços. Por exemplo, no caso dos dados contidos em equipamentos eletrônicos, nós fazemos um backup desses dados também aqui nos servidores de nossa empresa, tornando possível recuperá-los rapidamente para você.\"', '\"Lamento pelo seu amigo Renata! Para evitar que isso ocorra em sua empresa, nós iremos fazer uma reunião para definirmos o Plano de Continuidade de Negócios. Nesse plano estaremos ressaltando todos os pontos necessários para garantir que, mesmo após um desastre, a empresa possa rapidamente assumir o controle da situação e retomar os serviços. Por exemplo, no caso dos dados contidos em equipamentos eletrônicos, nós fazemos um backup desses dados também aqui nos servidores de nossa empresa, tornando possível recuperá-los rapidamente para você.\"', 21, 13, 103, 35),
(58, 3, '\"Caramba, essa notícia me deixou triste. Um desastre pode fazer com que anos de trabalho sejam praticamente jogados fora.\" - diz Renata. \"Enfim, a outra dúvida é referente à uma situação que aconteceu com uma amiga minha. Na empresa dela, um funcionário era responsável por fazer serviços externos, recebendo os pagamentos dos clientes para a empresa. Só que ele estava deixando de emitir a nota fiscal para os clientes, embolsando o dinheiro dos serviços para si. Infelizmente ela só veio a descobrir isso três meses após ele estar cometendo esse ato. Acabou saindo no prejuízo de R$45.000,00 (quarenta e cinco mil reais), já que não tinha provas do ato do roubo. Há algo a ser feito para evitar essa situação?', '\"Não é possível prever que um funcionário fará algo do tipo, Renata. Por isso, o ideal é que você analise a índole de cada candidato, de preferência entrando em contato com as empresas nas quais eles já trabalharam. Infelizmente, o certo é evitar antes que a situação aconteça, pois não há o que fazer depois que algo do tipo acontecer.\"', '\"Nesse caso a vigilância é a melhor solução. Devemos realizar a instalação de câmeras de segurança dentro da seguradora, para que você possa controlar tudo que os funcionários estão fazendo, ainda que não esteja nas dependências da empresa. Outro benefício é a possibilidade de identificação de pessoas que entrem na seguradora sem permissão, como em casos de furtos, por exemplo.\" - diz Douglas.', '\"Renata, no caso, podemos reservar um lugar dentro do espaço da empresa onde será armazenada toda a documentação da seguradora, de preferência contratando um funcionário de confiança responsável por armazenar os documentos e conferir diariamente aqueles que os funcionários devem entregar e aqueles que já estão armazenados.\"', 21, 14, 104, 36),
(59, 3, '\"O incêndio foi um exemplo que eu trouxe por causa da situação que aconteceu com meu amigo. No caso, gostaria de medidas que pudessem ser mais abrangentes. Mas, discutimos sobre isso na reunião.\" - diz Renata - \"O outro caso foi de um roubo que ocorreu na empresa de uma amiga. Um funcionário era responsável por fazer serviços externos, recebendo os pagamentos dos clientes para a empresa. Mas ele não estava emitindo a nota fiscal para os clientes e, com isso, embolsava o dinheiro pago por eles pelos serviços. Infelizmente minha amiga só veio a descobrir isso após três meses e, como não tinha nenhuma prova do ato, teve que ficar com o prejuízo de R$45.000,00 (quarenta e cinco mil reais). O que pode ser feito para evitar essa situação?\"', '\"Renata, certifique-se de sempre analisar a índole dos funcionários, principalmente procurando as empresas onde os candidatos já trabalharam, para evitar que situações como essa aconteçam. Infelizmente, não há muito o que fazer com o que já aconteceu, e não é possível prever que um funcionário terá uma atitude como essa.\"', '\"Eu deveria ter incluído no orçamento a questão da instalação de câmeras de segurança na empresa. Irei orçar também e te passo dentro do prazo que estabelecemos. No caso, as câmeras servem para manter a segurança do local, já que tornam possível que você veja o que os funcionários estão fazendo, ainda que não esteja presente na seguradora; além de poder identificar pessoas que acessem a empresa sem permissão, como em caso de furtos, por exemplo.\" - diz Douglas.', '\"O ideal é que a empresa faça a contratação de um funcionário de confiança que fique responsável por armazenar a documentação da seguradora, conferindo diariamente os documentos que cada funcionário deve entregar para ele e aqueles que já estão armazenados. Dessa forma é possível identificar quando algum documento deixar de ser entregue, como ocorreu com as notas fiscais que o funcionário não gerou e, portanto, não entregou para sua amiga.\" - diz Douglas.', 21, 15, 105, 36),
(60, 3, '\"Perfeito!\" - diz Renata - \"A outra situação é referente à empresa de uma amiga minha. Um dos funcionários era responsável por fazer serviços externos, recebendo os pagamentos dos clientes para a empresa. Porém, ele estava recebendo valores dos clientes e não emitia a nota fiscal para eles, embolsando o dinheiro dos serviços para si. Ela só foi descobrir isso três meses após o funcionário já estar fazendo constantemente, mas não tinha nenhuma prova material de que houve roubo. No fim das contas, ela apenas realizou a demissão dele, e saiu no prejuízo de R$45.000,00 (quarenta e cinco mil reais). O que podemos fazer para evitar tal situação desagradável?\"', '\"Renata, por isso a importância de você realizar a contratação apenas de pessoas confiáveis. Não há muito o que fazer quando essas situações acontecem, e não é possível prever que um funcionário irá tomar uma atitude como essa. Ao analisar os currículos, procure as empresas que os candidatos já trabalharam e faça um levantamento da índole deles. É o melhor a se fazer.\"', '\"Uma boa opção é incluirmos no orçamento a instalação de câmeras de segurança. Assim você pode verificar o que cada funcionário está fazendo, mesmo que você não esteja na empresa. Além, torna o ambiente mais seguro, já que faz ser possível a identificação de pessoas que entrem na empresa sem permissão, em caso de furtos, por exemplo.\" - diz Douglas.', '\"Renata, é importante ter uma política constante de conferência dos documentos da empresa e do que os funcionários estão fazendo. Para solucionar essa situação, a empresa pode ter um espaço reservado para armazenar os documentos, de preferência com um funcionário de confiança que ficará responsável por fazer a conferência diária dos documentos que cada outro funcionário deve entregar para ele, além daqueles que já estão armazenados.\"', 21, 16, 106, 36),
(61, 3, '\"É muito complicado ter certeza que um funcionário não irá vacilar em algum momento com a empresa, mesmo que ele tenha um histórico de boa índole. Contudo, irei seguir sua dica.\" - diz Renata - \"Douglas, o último caso é de uma notícia que eu vi, que me deixou um pouco assustada. Um ex-funcionário de uma empresa farmacêutica nos EUA apagou a maior parte da infraestrutura dos computadores da companhia. Ele acessou a rede da empresa e disparou um vírus que já havia inserido na rede da companhia quando foi colocado sob aviso prévio. Quase cem servidores dos sistemas de hospedagem da empresa foram apagados! Houve falha da empresa nesse caso? O que pode ser feito para evitar isso?\"', '\"A empresa não pode ser culpada por ter confiado na índole de um funcionário. Na verdade, é através da confiança nos funcionários que a empresa irá funcionar bem. Como ninguém pode prever que algo do tipo iria acontecer, o ideal é que os responsáveis pela Segurança da Informação da empresa (no seu caso, nós) garantam que os servidores, e outros aparelhos eletrônicos, voltem à ativa o mais rápido possível.\" - diz Douglas.', '\"Os responsáveis pela implementação dos controles relativos à segurança de recursos humanos falharam por não seguirem aquilo que recomenda a norma ISO 27005, de que os direitos de acesso às informações da empresa não devem ser dados aos funcionários, visando garantir que eles façam um trabalho isento.\" - diz Douglas.', '\"Os responsáveis pela implementação dos controles relativos à segurança de recursos humanos falharam por não seguirem aquilo que recomenda a norma ISO 27002, de que os direitos de acesso às informações da empresa devem ser retirados dos usuários imediatamente após o encerramento de suas atividades, contratos ou acordos.\" - diz Douglas.', 21, 17, 107, 37),
(62, 3, '\"A situação que aconteceu com minha amiga foi de um funcionário que fazia serviços externos à empresa. Não vejo como as câmeras de segurança poderiam auxiliar nisso. Contudo, pode colocar no orçamento a instalação delas sim, pois é algo que me interessa.\" - diz Renata.\r\n\r\n\"Renata, realmente, nesse caso as câmeras não ajudariam muito. Mesmo assim irei incluir a instalação delas no orçamento, conforme sua solicitação.\"\r\n\r\n\"Douglas, o último caso é de uma notícia que eu vi, que me deixou um pouco assustada. Um ex-funcionário de uma empresa farmacêutica nos EUA apagou a maior parte da infraestrutura dos computadores da companhia. Ele acessou a rede da empresa e disparou um vírus que já havia inserido na rede da companhia quando foi colocado sob aviso prévio. Quase cem servidores dos sistemas de hospedagem da empresa foram apagados! Houve falha da empresa nesse caso? O que pode ser feito para evitar isso?\"', '\"É realmente uma situação muito complicada essa, Renata. A empresa não errou no que fez. A confiança em seus funcionários é algo essencial para garantir que a mesma siga funcionando bem. Como ninguém pode prever que algo do tipo iria acontecer, o ideal é que os responsáveis pela Segurança da Informação da empresa (no seu caso, nós) garantam que os servidores, e outros aparelhos eletrônicos, voltem à ativa o mais rápido possível.\"', '\"Foi erro na implementação dos controles relativos à segurança de recursos humanos. A norma ISO 27005 recomenda que os direitos de acesso às informações da empresa não seja dado aos funcionários. Isso para garantir que o trabalho seja realizado de forma isenta, sem que eles saibam as informações da empresa. A empresa farmacêutica não se ateve a isso e, portanto, acabou sofrendo as consequências com um ex-funcionário que se revoltou.\" - diz Douglas', '\"Renata, segundo a norma ISO 27002, os direitos de acesso às informações da empresa de qualquer usuário, incluindo os funcionários, devem ser retirados após o encerramento de suas atividades, contratos ou acordos. Portanto, houve sim falha daqueles responsáveis por realizar a implementação dos controles relativos à segurança de recursos humanos, haja vista que não se ativeram a retirar o acesso às informações da empresa do ex-funcionário assim que ele foi demitido, possibilitando que o mesmo se aproveitasse de uma falha que encontrou.\"', 21, 18, 108, 37),
(63, 3, '\"Então já pode incluir mais um computador no orçamento, pois irei realizar a contratação de um funcionário para ficar por conta de fazer a tarefa de armazenar os documentos da empresa.\" - diz Renata.\r\n\r\n\"Opa, pode deixar!\" - responde Douglas.\r\n\r\n\"Douglas, o último caso é de uma notícia que eu vi, que me deixou um pouco assustada. Um ex-funcionário de uma empresa farmacêutica nos EUA apagou a maior parte da infraestrutura dos computadores da companhia. Ele acessou a rede da empresa e disparou um vírus que já havia inserido na rede da companhia quando foi colocado sob aviso prévio. Quase cem servidores dos sistemas de hospedagem da empresa foram apagados! Houve falha da empresa nesse caso? O que pode ser feito para evitar isso?\"', '\"Não houve falha da empresa. Infelizmente, ela precisa confiar nos funcionários que contrata. O que ele fez foi por má índole, e ninguém da empresa é capaz de prever que algo do tipo pode acontecer. No caso, após o ocorrido, os responsáveis pela Segurança da Informação da empresa (no seu caso, nós) devem garantir que os servidores, e outros aparelhos eletrônicos, voltem à ativa o mais rápido possível.\" - diz Douglas.', '\"Renata, houve sim falha daqueles responsáveis por realizar a implementação dos controles relativos à segurança de recursos humanos. Uma das recomendações da norma ISO 27005 é de que os direitos de acesso às informações da empresa não seja dado aos funcionários, garantindo que os mesmos executem as tarefas de forma isenta, sem saberem nada sobre as informações da empresa. No caso da empresa farmacêutica, como permitiram que o funcionário tivesse acesso às informações dela, principalmente após ser demitido, acabaram sofrendo as consequências.\"', '\"Renata, houve sim falha daqueles responsáveis por realizar a implementação dos controles relativos à segurança de recursos humanos. Uma das recomendações da norma ISO 27002 é de que os direitos de acesso às informações da empresa de qualquer usuário, incluindo os funcionários, sejam retirados imediatamente após o encerramento de suas atividades, contratos ou acordos. Ou seja, caso você venha a terminar um contrato com alguém, ou demitir algum funcionário, certifique-se de retirar o acesso dele às informações da empresa, e nos avise para que façamos o mesmo com o usuário nos sistemas da seguradora.\"', 21, 19, 109, 37),
(64, 3, '\"Eu não concordo com essa confiança exacerbada nos funcionários. É muito complicado saber quando um funcionário realmente está ali para ajudar, e quando pretende prejudicar a empresa de alguma forma.\" - diz Renata - \"Uma dúvida, se o incidente de segurança for externo, há algo a ser feito?\"', '\"No caso, é de responsabilidade da empresa contatar aqueles que causaram o distúrbio em seus sistemas, e solicitar que eles corrijam o problema. Conforme indica a norma ISO 27001, os incidentes de segurança externos devem ser tratados diretamente com as pessoas que os causaram.\" - diz Douglas.', '\"Renata, o ideal é que sejamos reportados imediatamente após os incidentes, para resolvermos o problema o mais rápido possível, e garantirmos que os sistemas voltem a operar corretamente. Menos em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio e monitoramento indevido de troca de mensagens, haja vista que os próprios sistemas são responsáveis por corrigirem esses problemas.\"', '\"Renata, o ideal é que sejamos reportados imediatamente após os incidentes, para resolvermos o problema o mais rápido possível, e garantirmos que os sistemas voltem a operar corretamente. Por exemplo, em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio e monitoramento indevido de troca de mensagens, nós devemos ser avisados o mais rápido possível. Qualquer incidente de segurança precisa ser comunicado para nós.\" - diz Douglas.', 21, 20, 110, 38),
(65, 3, '\"No caso da seguradora, acho difícil que os funcionários consigam trabalhar sem terem acesso às informações da empresa. De qualquer forma, vamos tentar utilizar os métodos que você recomendar.\" - diz Renata - \"No caso, quando o incidente de segurança for externo, o que deve ser feito?\"', '\"A norma ISO 27001 diz que as pessoas que causam distúrbios em sistemas alheios devem se responsabilizar por suas atitudes. Por isso, é de responsabilidade da empresa buscar os meios cabíveis para garantir que haja reparação dos danos, ainda que se dê pela via judicial.\" - diz Douglas.', '\"Nós devemos ser avisados imediatamente sobre os incidentes, para que possamos resolver o problema o quanto antes. Menos em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio e monitoramento indevido de troca de mensagens, haja vista que os próprios sistemas são responsáveis por corrigirem esses problemas.\" - diz Douglas.', '\"Nós devemos ser avisados imediatamente sobre os incidentes, para que possamos resolver o problema o quanto antes. Por exemplo, em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio e monitoramento indevido de troca de mensagens, nós devemos ser avisados o mais rápido possível. Qualquer incidente de segurança precisa ser comunicado para nós.\" - diz Douglas.', 21, 21, 111, 38),
(66, 3, '\"Obrigado por essa informação Douglas! Eu não imaginava que era importante garantir este controle do acesso às informações da empresa. Mas, uma dúvida, e quando o incidente de segurança é externo? O que deve ser feito?\"', '\"A norma ISO 27001 diz que os incidentes de segurança externos devem ser tratados diretamente com as pessoas que os causaram. Nesse caso, você deve entrar em contato com quem causar algum distúrbio em seus sistemas, e solicitar à pessoa que corrija o problema. Caso não consiga resolver por essa via, o ideal é recorrer a um processo judicial.\" - diz Douglas.', '\"O ideal é reportar imediatamente para nós, para que possamos resolver o problema o mais rápido possível. Menos em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio e monitoramento indevido de troca de mensagens, haja vista que os próprios sistemas são responsáveis por corrigirem esses problemas.\" - diz Douglas.', '\"O ideal é reportar imediatamente para nós, para que possamos resolver o problema o mais rápido possível. Por exemplo, em casos de propagação de vírus ou outros códigos maliciosos; ataques de engenharia social; modificações em um sistema, sem o seu consentimento prévio; monitoramento indevido de troca de mensagens; entre outros, nós devemos ser avisados o mais rápido possível. Qualquer incidente de segurança precisa ser comunicado para nós.\" - diz Douglas.', 21, 22, 112, 38),
(67, 3, '\"Nossa Douglas! Se isso acontecer eu prefiro até deixar para lá, para não me dar dor de cabeça de ter que ficar procurando quem foi o responsável por realizar o distúrbio, além de conseguir entrar em contato com essa pessoa. Contudo, tenho percebido que muitas responsabilidades estão somente sobre vocês. Elas serão divididas de alguma forma, ou realmente ficará do jeito que está?\"', '\"Não há necessidade de realizar uma distribuição das responsabilidades. Conforme regulamenta a norma ISO 27001, as responsabilidades devem cair sobre a empresa que for contratada para prestar o serviço de Segurança da Informação. No caso, nós seremos os responsáveis.\" - diz Douglas.', '\"Façamos assim: a empresa cuida da gestão de continuidade do negócio, enquanto nós cuidamos da atribuição de responsabilidades para a segurança da informação e da gestão de vulnerabilidades técnicas. Dessa forma estaremos seguindo o que recomenda a norma ISO 27002.\" - diz Douglas.', '\"Renata, levando em consideração a norma ISO 27002, as melhores práticas de segurança da informação incluem a atribuição de responsabilidades para a segurança da informação, a gestão de vulnerabilidades técnicas e a gestão de continuidade do negócio. Em nossa futura reunião podemos conversar melhor sobre a atribuição de responsabilidade que cada um deve ter.\"', 21, 23, 113, 39),
(68, 3, '\"Não sabia que o sistema era capaz de resolver sozinho esses problemas. Que ótimo!\" - diz Renata - \"Ainda assim, tenho percebido que muitas responsabilidades estão somente sobre vocês. Elas serão divididas de alguma forma, ou realmente ficará do jeito que está?\"', '\"Renata, tudo ficará do jeito que está! Como você fez a contratação de nossos serviços, é justo que as responsabilidades caiam todas sobre nós, conforme recomenda a norma ISO 27001. Você não precisa se preocupar!\"', '\"Podemos combinar seguindo o que recomenda a norma ISO 27002, de que a gestão de continuidade do negócio fica sob a responsabilidade da empresa, enquanto a atribuição de responsabilidades para a segurança da informação e a gestão de vulnerabilidades técnicas fica sob nossa responsabilidade.\" - diz Douglas.', '\"A norma ISO 27002 diz que fazem parte das melhores práticas de segurança da informação a atribuição de responsabilidades para a segurança da informação, a gestão de vulnerabilidades técnicas e a gestão de continuidade do negócio. Levando isso em consideração, em nossa futura reunião, iremos conversar melhor sobre a atribuição de responsabilidade que cada um deve ter.\" - diz Douglas.', 21, 24, 114, 39),
(69, 3, '\"Entendido Douglas. Prometo que não irei tomar muito seu tempo! Tenho apenas mais algumas duvidas que gostaria de tirar de uma vez. Por exemplo, eu percebi que muitas das responsabilidades estão sobre vocês. Será realmente assim, ou haverá uma distribuição dessas responsabilidades?\"', '\"A norma ISO 27001 diz que as atribuições de responsabilidades para a segurança da informação devem ser do funcionário Técnico de Informática e/ou da empresa contratada para a prestação de tal serviço. Portanto, não há com o que você se preocupar! As responsabilidades ficarão conosco.\" - diz Douglas.', '\"Renata, de acordo com a norma ISO 27002, atribuir responsabilidades para a segurança da informação e realizar a gestão de vulnerabilidades técnicas estão entre as melhores práticas de segurança da informação. A empresa deve ser responsável por garantir a gestão de continuidade do negócio, enquanto nós cuidamos do restante.\"', '\"Renata, de acordo com a norma ISO 27002, as melhores práticas de segurança da informação estão em: atribuir responsabilidades para a segurança da informação, realizar a gestão de vulnerabilidades técnicas e a gestão de continuidade do negócio. Portanto, em nossa futura reunião, estaremos conversando melhor sobre a atribuição de responsabilidade que cada um deve ter.\"', 21, 25, 115, 39),
(70, 3, '\"Pois bem Douglas. Baseado em nossa conversa, eu gostaria que você resumisse, em algumas palavras, para eu anotar aqui, quais são as ações possíveis para o tratamento do risco de segurança da informação.\"', '\"Renata, de acordo com a norma ISO 27002, são: planejamento do risco, identificação do risco, mitigação do risco e eliminação do risco.\"', '\"Renata, de acordo com a norma ISO 27001, são: retenção do risco, redução do risco, mitigação do risco e transferência do risco.\"', '\"Renata, de acordo com a norma ISO 27005, são: redução do risco, retenção do risco, prevenção do risco e transferência do risco.\"', 21, 26, 116, 40),
(71, 3, '\"Perfeitamente Douglas. Irei garantir que a gestão de continuidade do negócio seja realizada com louvor!\"\r\n\r\n\"Tenho certeza que você fará isso Renata.\"\r\n\r\n\"Por fim Douglas, baseado em nossa conversa, eu gostaria que você resumisse, em algumas palavras, para eu anotar aqui, quais são as ações possíveis para o tratamento do risco de segurança da informação.\"', '\"Renata, de acordo com a norma ISO 27002, são: planejamento do risco, identificação do risco, mitigação do risco e eliminação do risco.\"', '\"Renata, de acordo com a norma ISO 27001, são: retenção do risco, redução do risco, mitigação do risco e transferência do risco.\"', '\"Renata, de acordo com a norma ISO 27005, são: redução do risco, retenção do risco, prevenção do risco e transferência do risco.\"', 21, 27, 117, 40),
(72, 3, '\"Douglas, muito obrigado por toda sua ajuda até aqui! Esta conversa foi muito enriquecedora para mim. Tenho apenas mais uma última dúvida para tirar com você.\"\r\n\r\n\"Eu quem agradeço Renata. Está sendo um prazer poder te ajudar nessa jornada em prol da sua seguradora. Em que mais posso ser útil?\"\r\n\r\n\"Na verdade não é uma dúvida. Baseado em nossa conversa, eu gostaria que você resumisse em algumas palavras, para que eu possa anotar aqui, quais são as ações possíveis para o tratamento do risco de segurança da informação.\" - diz Renata.', '\"Renata, de acordo com a norma ISO 27002, são: planejamento do risco, identificação do risco, mitigação do risco e eliminação do risco.\"', '\"Renata, de acordo com a norma ISO 27001, são: retenção do risco, redução do risco, mitigação do risco e transferência do risco.\"', '\"Renata, de acordo com a norma ISO 27005, são: redução do risco, retenção do risco, prevenção do risco e transferência do risco.\"', 21, 28, 118, 40),
(73, 3, 'Renata agradece a Douglas pelo atendimento e encerra o suporte por chat. Douglas aproveita a pausa para ir tomar um café, e fica pensativo sobre as informações que passou para Renata, percebendo que errou em algumas informações que foram passadas.', '-', '-', '-', 21, 29, 119, 41),
(74, 3, 'Renata agradece a Douglas pelo atendimento e encerra o suporte por chat. Douglas imediatamente atende outra solicitação de suporte e, enquanto responde o novo cliente, fica pensativo sobre as informações que passou para Renata, tendo praticamente certeza que deu alguma informação errada.', '-', '-', '-', 21, 30, 120, 41),
(75, 3, 'Renata agradece a Douglas pelo atendimento e encerra o suporte por chat. Douglas aproveita a pausa para ir tomar um café. Ele fica muito contente com as respostas que deu para Renata, e à espera de um novo cliente solicitar o suporte por chat.', '-', '-', '-', 21, 31, 121, 41),
(76, 5, 'a', 'a\r\na', '\r\na', 'a\r\n', 21, 1, 123, 1),
(77, 5, 'a', 'aa', 'aaa', 'a', 21, 2, 110, 38),
(78, 5, 'aaaa', 'a', 'a', 'a', 21, 3, 111, 38),
(79, 5, 'a', 'a', 'a', 'a\r\na', 21, 4, 112, 38),
(80, 5, 'a', 'a', 'a', 'a', 21, 5, 113, 39),
(81, 5, 'a', 'a', 'a', 'a', 21, 6, 114, 39),
(82, 5, 'a', 'a', 'a', 'a\r\na', 21, 7, 115, 39),
(83, 5, 'a', 'a', 'a', 'a', 21, 8, 116, 40),
(84, 5, 'a', 'a', 'a', 'a', 21, 9, 117, 40),
(85, 5, 'a', 'a', 'a', 'a\r\n', 21, 10, 118, 40),
(86, 5, 'saaa', '-', '-', '-', 21, 11, 119, 41),
(87, 5, 'aa', '-', '-', '-', 21, 12, 120, 41),
(88, 5, 'aaaa', '-', '-', '-', 21, 13, 121, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professor`
--

CREATE TABLE `tbl_professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `login` varchar(15) COLLATE utf8_bin NOT NULL,
  `senha` varchar(100) COLLATE utf8_bin NOT NULL,
  `adm` int(11) NOT NULL DEFAULT '0',
  `verificado` int(1) NOT NULL,
  `confirmado` int(1) NOT NULL,
  `descricao` mediumtext COLLATE utf8_bin NOT NULL,
  `lattes` mediumtext COLLATE utf8_bin NOT NULL,
  `codigo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_professor`
--

INSERT INTO `tbl_professor` (`id`, `nome`, `email`, `login`, `senha`, `adm`, `verificado`, `confirmado`, `descricao`, `lattes`, `codigo`) VALUES
(1, 'Misael', 'misaelg.freitas2000@gmail.com', 'misaruto', '1661f80dd0f0c49b7f2011833a5898bd', 2, 1, 1, '', '', 0),
(21, 'Wallacy Oliveira Pasqualini Nerio', 'wallacypasqualini@gmail.com', 'wall', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1, '', 'http://lattes.cnpq.br/4456793183001300', 496948),
(24, 'dfhsf', 'leilaoifet@gmail.com', 'aalskfnajkbvf', '25d55ad283aa400af464c76d713c07ad', 0, 1, 1, '', '', 552500),
(27, 'Daves Martins', 'daves.martins@ifsudestemg.edu.br', 'daves', '25f9e794323b453885f5181f1b624d0b', 0, 0, 1, '', 'http://lattes.cnpq.br/0767556327924829', 220947);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requisicoes`
--

CREATE TABLE `tbl_requisicoes` (
  `id` int(11) NOT NULL,
  `posicao` varchar(20) COLLATE utf8_bin NOT NULL,
  `porque` mediumtext COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `atendida` int(11) NOT NULL,
  `aprovada_adm` int(1) NOT NULL,
  `id_adm` int(11) NOT NULL,
  `aprovada_root` int(11) NOT NULL,
  `id_root` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_requisicoes`
--

INSERT INTO `tbl_requisicoes` (`id`, `posicao`, `porque`, `id_user`, `atendida`, `aprovada_adm`, `id_adm`, `aprovada_root`, `id_root`) VALUES
(1, '0', 'Recem cadastrado, decidir aprovar ou não', 22, 1, 0, 0, 0, 0),
(2, '0', 'Recem cadastrado, decidir aprovar ou não', 24, 1, 0, 0, 0, 0),
(3, '0', 'Recem cadastrado, decidir aprovar ou não', 25, 0, 0, 0, 0, 0),
(4, '0', 'Recem cadastrado, decidir aprovar ou não', 26, 0, 0, 0, 0, 0),
(5, '0', 'Recem cadastrado, decidir aprovar ou não', 27, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_respostas`
--

CREATE TABLE `tbl_respostas` (
  `id` int(11) NOT NULL,
  `resposta` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_respostas`
--

INSERT INTO `tbl_respostas` (`id`, `resposta`, `id_usuario`, `id_pergunta`, `id_aula`) VALUES
(1, '100', 10, 1, 1),
(2, '100', 10, 4, 1),
(3, '100', 10, 7, 1),
(4, '100', 10, 10, 1),
(5, '100', 10, 13, 1),
(6, '100', 10, 16, 1),
(7, '100', 10, 19, 1),
(8, '100', 10, 22, 1),
(9, '100', 10, 25, 1),
(10, '100', 10, 28, 1),
(11, '0', 10, 32, 3),
(12, '100', 10, 33, 3),
(13, '50', 10, 38, 3),
(14, '0', 10, 40, 3),
(15, '100', 10, 1, 1),
(16, '100', 10, 4, 1),
(17, '100', 10, 7, 1),
(18, '100', 10, 10, 1),
(19, '100', 10, 13, 1),
(20, '100', 10, 16, 1),
(21, '100', 10, 19, 1),
(22, '100', 10, 22, 1),
(23, '100', 10, 25, 1),
(24, '100', 10, 28, 1),
(25, '50', 30, 1, 1),
(26, '100', 30, 3, 1),
(27, '100', 30, 7, 1),
(28, '100', 30, 10, 1),
(29, '100', 30, 13, 1),
(30, '0', 30, 16, 1),
(31, '50', 30, 17, 1),
(32, '100', 30, 21, 1),
(33, '100', 30, 25, 1),
(34, '100', 30, 28, 1),
(35, '100', 31, 1, 1),
(36, '100', 31, 4, 1),
(37, '100', 31, 7, 1),
(38, '100', 31, 10, 1),
(39, '100', 31, 13, 1),
(40, '50', 31, 16, 1),
(41, '100', 31, 18, 1),
(42, '100', 31, 22, 1),
(43, '100', 31, 25, 1),
(44, '100', 31, 28, 1),
(45, '50', 32, 1, 1),
(46, '100', 32, 3, 1),
(47, '100', 32, 7, 1),
(48, '100', 32, 10, 1),
(49, '100', 32, 13, 1),
(50, '100', 32, 16, 1),
(51, '100', 32, 19, 1),
(52, '100', 32, 22, 1),
(53, '100', 32, 25, 1),
(54, '100', 32, 28, 1),
(55, '100', 21, 1, 1),
(56, '100', 21, 4, 1),
(57, '100', 21, 7, 1),
(58, '100', 21, 10, 1),
(59, '100', 21, 13, 1),
(60, '100', 21, 16, 1),
(61, '100', 21, 19, 1),
(62, '100', 21, 22, 1),
(63, '100', 21, 25, 1),
(64, '100', 21, 28, 1),
(65, '100', 45, 1, 1),
(66, '100', 45, 4, 1),
(67, '100', 45, 7, 1),
(68, '100', 45, 10, 1),
(69, '100', 45, 13, 1),
(70, '100', 45, 16, 1),
(71, '100', 45, 19, 1),
(72, '100', 45, 22, 1),
(73, '100', 45, 25, 1),
(74, '100', 45, 28, 1),
(75, '50', 43, 1, 1),
(77, '100', 43, 3, 1),
(78, '0', 43, 7, 1),
(79, '100', 43, 8, 1),
(80, '100', 43, 13, 1),
(81, '100', 43, 16, 1),
(82, '100', 43, 19, 1),
(83, '100', 43, 22, 1),
(84, '50', 43, 25, 1),
(85, '100', 43, 27, 1),
(86, '100', 35, 1, 1),
(87, '0', 35, 4, 1),
(88, '100', 35, 5, 1),
(89, '50', 35, 10, 1),
(90, '0', 35, 12, 1),
(91, '50', 35, 14, 1),
(92, '100', 35, 18, 1),
(93, '50', 35, 22, 1),
(94, '0', 35, 24, 1),
(95, '100', 35, 26, 1),
(96, '100', 37, 1, 1),
(97, '100', 37, 4, 1),
(98, '100', 37, 7, 1),
(99, '50', 33, 1, 1),
(100, '100', 37, 10, 1),
(101, '100', 37, 13, 1),
(102, '100', 33, 3, 1),
(103, '100', 33, 7, 1),
(104, '100', 37, 16, 1),
(105, '100', 37, 19, 1),
(106, '100', 37, 22, 1),
(107, '100', 33, 10, 1),
(108, '100', 33, 13, 1),
(109, '50', 33, 16, 1),
(110, '100', 33, 18, 1),
(111, '100', 33, 22, 1),
(112, '50', 33, 25, 1),
(113, '50', 37, 25, 1),
(114, '100', 33, 27, 1),
(115, '0', 37, 27, 1),
(116, '100', 39, 1, 1),
(117, '100', 39, 4, 1),
(118, '50', 39, 7, 1),
(119, '0', 39, 9, 1),
(120, '100', 39, 11, 1),
(121, '0', 39, 16, 1),
(122, '50', 39, 17, 1),
(123, '100', 39, 21, 1),
(124, '100', 39, 25, 1),
(125, '100', 39, 28, 1),
(126, '50', 17, 1, 1),
(127, '100', 17, 3, 1),
(128, '100', 17, 7, 1),
(129, '100', 17, 10, 1),
(130, '100', 17, 13, 1),
(131, '100', 17, 16, 1),
(132, '100', 17, 19, 1),
(133, '0', 17, 22, 1),
(134, '100', 17, 23, 1),
(135, '0', 17, 28, 1),
(136, '50', 36, 1, 1),
(137, '100', 36, 3, 1),
(138, '100', 36, 7, 1),
(139, '100', 36, 10, 1),
(140, '50', 36, 13, 1),
(141, '50', 36, 15, 1),
(142, '100', 36, 18, 1),
(143, '100', 36, 22, 1),
(145, '100', 36, 25, 1),
(146, '100', 36, 28, 1),
(147, '50', 38, 1, 1),
(148, '100', 38, 3, 1),
(149, '100', 38, 7, 1),
(150, '0', 38, 10, 1),
(152, '100', 18, 1, 1),
(154, '100', 18, 4, 1),
(155, '100', 18, 7, 1),
(156, '0', 18, 10, 1),
(161, '100', 18, 11, 1),
(162, '100', 18, 16, 1),
(164, '100', 18, 19, 1),
(165, '100', 18, 22, 1),
(170, '100', 38, 11, 1),
(171, '100', 18, 25, 1),
(172, '100', 38, 16, 1),
(173, '100', 38, 19, 1),
(174, '0', 18, 28, 1),
(175, '100', 38, 22, 1),
(176, '0', 38, 25, 1),
(177, '0', 38, 26, 1),
(178, '100', 40, 1, 1),
(179, '100', 40, 4, 1),
(180, '100', 40, 7, 1),
(181, '100', 40, 10, 1),
(182, '100', 40, 13, 1),
(183, '100', 40, 16, 1),
(184, '100', 40, 19, 1),
(185, '100', 40, 22, 1),
(186, '100', 40, 25, 1),
(187, '100', 40, 28, 1),
(188, '50', 53, 1, 1),
(189, '100', 53, 3, 1),
(190, '100', 53, 7, 1),
(191, '0', 53, 10, 1),
(192, '100', 53, 11, 1),
(193, '50', 53, 16, 1),
(194, '50', 53, 18, 1),
(195, '100', 53, 21, 1),
(196, '0', 53, 25, 1),
(197, '50', 53, 26, 1),
(198, '100', 50, 1, 1),
(199, '100', 50, 4, 1),
(200, '100', 50, 7, 1),
(201, '100', 50, 10, 1),
(202, '100', 50, 13, 1),
(203, '50', 50, 16, 1),
(204, '100', 50, 18, 1),
(205, '100', 50, 22, 1),
(206, '100', 50, 25, 1),
(207, '100', 50, 28, 1),
(208, '100', 49, 1, 1),
(209, '100', 49, 4, 1),
(210, '100', 49, 7, 1),
(211, '100', 49, 10, 1),
(212, '100', 49, 13, 1),
(213, '100', 49, 16, 1),
(214, '100', 49, 19, 1),
(215, '100', 49, 22, 1),
(216, '100', 49, 25, 1),
(217, '100', 49, 28, 1),
(218, '100', 51, 1, 1),
(219, '100', 51, 4, 1),
(220, '100', 51, 7, 1),
(221, '100', 51, 10, 1),
(222, '100', 51, 13, 1),
(223, '50', 51, 16, 1),
(224, '50', 51, 18, 1),
(225, '100', 51, 21, 1),
(226, '50', 51, 25, 1),
(227, '100', 51, 27, 1),
(228, '50', 23, 1, 1),
(229, '100', 23, 3, 1),
(230, '100', 23, 7, 1),
(231, '100', 23, 10, 1),
(232, '100', 23, 13, 1),
(233, '100', 23, 16, 1),
(234, '50', 23, 19, 1),
(235, '100', 23, 21, 1),
(236, '50', 23, 25, 1),
(237, '100', 23, 27, 1),
(238, '100', 52, 1, 1),
(239, '50', 52, 4, 1),
(240, '100', 52, 6, 1),
(241, '50', 52, 10, 1),
(242, '100', 52, 12, 1),
(243, '50', 52, 16, 1),
(244, '100', 52, 18, 1),
(245, '100', 48, 1, 1),
(246, '100', 52, 22, 1),
(247, '50', 52, 25, 1),
(248, '100', 52, 27, 1),
(249, '100', 48, 4, 1),
(250, '100', 48, 7, 1),
(251, '100', 48, 10, 1),
(252, '100', 48, 13, 1),
(253, '50', 48, 16, 1),
(254, '100', 48, 18, 1),
(255, '50', 48, 22, 1),
(256, '100', 48, 24, 1),
(257, '0', 48, 28, 1),
(258, '100', 42, 1, 1),
(259, '100', 42, 4, 1),
(260, '100', 42, 7, 1),
(261, '100', 42, 10, 1),
(262, '100', 42, 13, 1),
(263, '100', 42, 16, 1),
(264, '100', 42, 19, 1),
(265, '100', 42, 22, 1),
(266, '0', 42, 25, 1),
(267, '100', 42, 26, 1),
(268, '100', 41, 1, 1),
(269, '100', 41, 4, 1),
(270, '100', 41, 1, 1),
(271, '50', 41, 4, 1),
(272, '100', 41, 6, 1),
(273, '100', 41, 10, 1),
(274, '0', 10, 1, 1),
(275, '0', 10, 2, 1),
(276, '0', 10, 5, 1),
(277, '0', 10, 8, 1),
(278, '0', 10, 11, 1),
(279, '0', 10, 14, 1),
(280, '0', 10, 17, 1),
(281, '0', 10, 20, 1),
(282, '0', 10, 23, 1),
(283, '50', 10, 26, 1),
(284, '100', 10, 45, 16),
(285, '100', 10, 48, 16),
(286, '100', 10, 51, 16),
(287, '100', 10, 54, 16),
(288, '100', 10, 57, 16),
(289, '100', 10, 60, 16),
(290, '100', 10, 63, 16),
(291, '100', 10, 66, 16),
(292, '100', 10, 69, 16),
(293, '100', 10, 72, 16),
(294, '100', 50, 45, 16),
(295, '100', 50, 48, 16),
(296, '100', 50, 51, 16),
(297, '100', 50, 54, 16),
(298, '100', 50, 57, 16),
(299, '100', 50, 60, 16),
(300, '50', 50, 63, 16),
(301, '100', 50, 65, 16),
(302, '100', 50, 69, 16),
(303, '0', 50, 72, 16),
(304, '100', 45, 45, 16),
(305, '100', 45, 48, 16),
(306, '0', 45, 51, 16),
(307, '100', 45, 52, 16),
(309, '100', 45, 57, 16),
(310, '50', 45, 60, 16),
(311, '100', 45, 62, 16),
(312, '100', 45, 66, 16),
(313, '0', 45, 69, 16),
(314, '0', 45, 70, 16),
(315, '100', 54, 1, 1),
(316, '100', 54, 4, 1),
(317, '100', 54, 7, 1),
(318, '100', 54, 10, 1),
(319, '100', 54, 13, 1),
(320, '100', 54, 16, 1),
(321, '100', 54, 19, 1),
(322, '100', 54, 22, 1),
(323, '0', 54, 25, 1),
(324, '100', 54, 26, 1),
(325, '50', 54, 45, 16),
(326, '100', 54, 47, 16),
(327, '100', 54, 51, 16),
(328, '100', 54, 54, 16),
(329, '50', 54, 57, 16),
(330, '50', 54, 59, 16),
(331, '100', 54, 62, 16),
(332, '100', 54, 66, 16),
(334, '100', 54, 69, 16),
(335, '0', 54, 72, 16),
(336, '50', 49, 45, 16),
(337, '100', 49, 47, 16),
(338, '100', 49, 51, 16),
(339, '100', 49, 54, 16),
(340, '50', 49, 57, 16),
(341, '50', 49, 59, 16),
(342, '100', 49, 62, 16),
(343, '100', 49, 66, 16),
(344, '100', 49, 69, 16),
(345, '0', 49, 72, 16),
(346, '50', 53, 45, 16),
(347, '50', 10, 45, 16),
(348, '100', 53, 47, 16),
(349, '100', 53, 51, 16),
(350, '100', 53, 54, 16),
(351, '50', 53, 57, 16),
(352, '50', 53, 59, 16),
(353, '100', 53, 62, 16),
(354, '100', 53, 66, 16),
(355, '100', 53, 69, 16),
(356, '0', 53, 72, 16),
(357, '50', 10, 47, 16),
(358, '0', 10, 50, 16),
(359, '50', 10, 52, 16),
(360, '0', 10, 56, 16),
(361, '0', 10, 58, 16),
(362, '0', 10, 61, 16),
(363, '0', 10, 64, 16),
(364, '0', 10, 67, 16),
(365, '50', 10, 70, 16),
(377, '100', 51, 48, 16),
(378, '100', 51, 51, 16),
(379, '100', 51, 54, 16),
(380, '100', 51, 57, 16),
(381, '50', 51, 60, 16),
(382, '100', 51, 62, 16),
(383, '100', 51, 66, 16),
(384, '100', 51, 69, 16),
(385, '0', 51, 72, 16),
(386, '50', 32, 45, 16),
(387, '100', 32, 47, 16),
(388, '100', 32, 51, 16),
(389, '100', 32, 54, 16),
(390, '100', 32, 57, 16),
(391, '100', 32, 60, 16),
(392, '100', 32, 63, 16),
(393, '100', 32, 66, 16),
(394, '100', 32, 69, 16),
(395, '100', 32, 72, 16),
(403, '50', 42, 45, 16),
(404, '100', 42, 47, 16),
(405, '100', 42, 51, 16),
(406, '100', 42, 54, 16),
(407, '100', 42, 57, 16),
(408, '100', 42, 60, 16),
(409, '100', 42, 63, 16),
(410, '100', 42, 66, 16),
(411, '100', 42, 69, 16),
(412, '100', 42, 72, 16),
(413, '100', 39, 1, 16),
(414, '50', 39, 4, 16),
(415, '100', 39, 6, 16),
(416, '0', 39, 10, 16),
(417, '0', 39, 11, 16),
(418, '50', 39, 14, 16),
(419, '50', 39, 18, 16),
(420, '50', 39, 21, 16),
(421, '100', 39, 24, 16),
(422, '50', 39, 28, 16),
(443, '50', 17, 45, 16),
(444, '100', 17, 47, 16),
(445, '100', 17, 51, 16),
(446, '100', 17, 54, 16),
(447, '100', 17, 57, 16),
(448, '50', 17, 60, 16),
(449, '100', 17, 62, 16),
(450, '100', 17, 66, 16),
(451, '0', 17, 69, 16),
(452, '0', 17, 70, 16),
(453, '50', 33, 45, 16),
(454, '100', 33, 47, 16),
(455, '100', 33, 51, 16),
(456, '100', 33, 54, 16),
(457, '100', 33, 57, 16),
(458, '100', 33, 60, 16),
(459, '100', 33, 63, 16),
(460, '100', 33, 66, 16),
(461, '50', 33, 69, 16),
(462, '0', 33, 71, 16),
(473, '50', 43, 45, 16),
(474, '100', 43, 47, 16),
(475, '100', 43, 51, 16),
(476, '100', 43, 54, 16),
(477, '50', 43, 57, 16),
(478, '50', 43, 59, 16),
(479, '50', 43, 62, 16),
(480, '100', 43, 65, 16),
(481, '100', 43, 69, 16),
(482, '100', 43, 72, 16),
(483, '50', 40, 45, 16),
(484, '100', 40, 47, 16),
(485, '100', 40, 51, 16),
(486, '100', 40, 54, 16),
(487, '50', 40, 57, 16),
(488, '50', 40, 59, 16),
(489, '100', 40, 62, 16),
(490, '100', 40, 66, 16),
(491, '100', 40, 69, 16),
(492, '0', 40, 72, 16),
(493, '50', 36, 45, 16),
(494, '100', 36, 47, 16),
(495, '100', 36, 51, 16),
(496, '100', 36, 54, 16),
(497, '50', 36, 57, 16),
(498, '50', 36, 59, 16),
(499, '100', 36, 62, 16),
(500, '100', 36, 66, 16),
(501, '100', 36, 69, 16),
(502, '0', 36, 72, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sequencia_perguntas`
--

CREATE TABLE `tbl_sequencia_perguntas` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `id_professor` int(11) NOT NULL,
  `np` int(11) NOT NULL,
  `pontuacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_sequencia_perguntas`
--

INSERT INTO `tbl_sequencia_perguntas` (`id`, `nome`, `id_professor`, `np`, `pontuacao`) VALUES
(1, 'Segurança da Informação 1', 21, 10, 20),
(3, 'Segurança da Informação 2', 21, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turma`
--

CREATE TABLE `tbl_turma` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_turma`
--

INSERT INTO `tbl_turma` (`id`, `nome`, `id_professor`) VALUES
(9, 'SEGURANCA_DA_INFORMACAO', 21),
(10, 'TESTE', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turmas_aula`
--

CREATE TABLE `tbl_turmas_aula` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `completa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_turmas_aula`
--

INSERT INTO `tbl_turmas_aula` (`id`, `id_aula`, `id_turma`, `completa`) VALUES
(149, 27, 9, 0),
(150, 27, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `senha` varchar(40) COLLATE utf8_bin NOT NULL,
  `pontos` varchar(11) COLLATE utf8_bin NOT NULL,
  `codigo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nome`, `email`, `senha`, `pontos`, `codigo`) VALUES
(8, 'Misael', 'misaelg.freitas2000@gmail.com', '1661f80dd0f0c49b7f2011833a5898bd', '', 258469),
(10, 'wallacy', 'wallacypasqualini@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0', 0),
(17, 'Paulo Henrique do Carmo Müller', 'pmullerjf@gmail.com', '306dc883b369d9acd9612a069a13bb52', '0', 0),
(18, 'Arthur Rodrigues Oliveira', 'thurrjf@gmail.com', '164096683bdfce7853f133260694f33d', '0', 0),
(21, 'Guilherme Malvar Baptista Lima', 'guilhermebaptista255@gmail.com', '2c4ad28e9cb695d236de95a87911134d', '0', 0),
(23, 'Giuliano', 'giuliano.leite2002@gmail.com', '889417dd99fae51cc8fe0cdd2c47ece9', '0', 0),
(30, 'Gabriel de Oliveira Marques', 'aprendizsenacgabriel@gmail.com', '9750d800d7c5838d53865160e2e5e907', '0', 0),
(31, 'Vitória Gabrielle Silva Costa', 'agabriellesilva.costa@gmail.com', 'c8974227f85a1a2f5ca7bb05b6c2d5b9', '0', 0),
(32, 'Tiago Calado de Souza', 'tripedomacaco@outlook.com', '4daaed10d00f88929b0516a1028b8cb3', '0', 0),
(33, 'Bernardo André', 'bernardoandrerocha@gmail.com', '76957bf2e2c762b8691df50cff682d1b', '0', 0),
(36, 'João Vitor', 'jv155gomes@gmail.com', 'a7ad4103e7d070dfd7b5ee4ee0eea037', '0', 0),
(37, 'Arthur Guedes Salles Almeida ', 'arthur.salles26@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0', 0),
(38, 'Laura Pravato', 'laurapvieira@live.com', 'd18951fc86658de33252386568590f4b', '0', 0),
(39, 'Cassiano Amorim Araujo', 'dbofan50@gmail.com', '475339f675d3ead4fbc9dc82c1450919', '0', 0),
(40, 'Viviane Serafim', 'viviserafina.2002@gmail.com', 'e467fa43ee0f0baf2dc488a4e2e721ba', '0', 0),
(42, 'Gustavo do Valle Ribeiro', 'gustavovalleribeiro@gmail.com', 'ec0c933904c58a727bbaf920185bdab3', '0', 0),
(43, 'Ágatha', 'agathacastilho0204@gmail.com', '44dcd6a8b530976b2d816c9f58e2c8f9', '0', 0),
(45, 'Rafael de Oliveira Vargas', 'kurivargas@gmail.com', 'ebfc42a2fb17ca09cb9c929b02875d74', '0', 0),
(48, 'igor mateus ferreira', 'igormateusferreira2015@gmail.com', '341846a9cd0e23d7bd0cfff89ec342b3', '0', 0),
(49, 'Kaio', 'kaio.maskara@gmail.com', '00f7c70bbaf1405aeb048f655d6cdcb1', '0', 0),
(50, 'Ana Clara Martins Rocha', 'anaclararocha1984@gmail.com', '30eaf9fc98ab7f0f012beb2ca99e28d8', '0', 0),
(51, 'Milena Amorim', 'divaamorim.milena@gmail.com', '3a0f76eaa5a70249ee60722c2c3a6bed', '0', 0),
(52, 'Emanuelle Salviano', 'emanuellesalviano031@gmail.com', '5641395fcd8930fe609d24c8f058740e', '0', 0),
(53, 'Charles Lelis Braga', 'charles.braga.jf.cb@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0', 0),
(54, 'Arthur Vieira', 'tulipedico@hotmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario_aula`
--

CREATE TABLE `tbl_usuario_aula` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `completa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_usuario_aula`
--

INSERT INTO `tbl_usuario_aula` (`id`, `id_usuario`, `id_aula`, `completa`) VALUES
(1, 10, 1, 1),
(2, 16, 1, 0),
(3, 17, 1, 1),
(4, 18, 1, 1),
(5, 19, 1, 0),
(6, 20, 1, 0),
(7, 21, 1, 1),
(8, 22, 1, 0),
(9, 23, 1, 1),
(10, 29, 1, 0),
(11, 10, 3, 1),
(12, 10, 1, 1),
(13, 34, 1, 0),
(14, 33, 1, 1),
(15, 32, 1, 1),
(16, 31, 1, 1),
(17, 30, 1, 1),
(18, 42, 1, 1),
(19, 41, 1, 0),
(20, 40, 1, 1),
(21, 39, 1, 1),
(22, 38, 1, 1),
(23, 37, 1, 1),
(24, 36, 1, 1),
(26, 43, 1, 1),
(27, 44, 1, 0),
(28, 45, 1, 1),
(29, 46, 1, 0),
(30, 47, 1, 0),
(31, 48, 1, 1),
(32, 49, 1, 1),
(33, 50, 1, 1),
(34, 51, 1, 1),
(35, 52, 1, 1),
(36, 53, 1, 1),
(37, 10, 1, 1),
(38, 17, 1, 1),
(39, 18, 1, 0),
(40, 19, 1, 0),
(41, 20, 1, 0),
(42, 21, 1, 0),
(43, 22, 1, 0),
(44, 23, 1, 0),
(45, 29, 1, 0),
(46, 30, 1, 0),
(47, 31, 1, 0),
(48, 32, 1, 0),
(49, 33, 1, 0),
(50, 34, 1, 0),
(52, 36, 1, 0),
(53, 37, 1, 0),
(54, 38, 1, 0),
(55, 39, 1, 1),
(56, 40, 1, 0),
(57, 41, 1, 0),
(58, 42, 1, 0),
(59, 43, 1, 0),
(60, 44, 1, 0),
(61, 45, 1, 0),
(62, 46, 1, 0),
(63, 47, 1, 0),
(64, 48, 1, 0),
(65, 49, 1, 0),
(66, 50, 1, 0),
(67, 51, 1, 1),
(68, 52, 1, 1),
(69, 53, 1, 0),
(70, 17, 16, 1),
(71, 18, 16, 0),
(72, 19, 16, 0),
(73, 20, 16, 0),
(74, 21, 16, 0),
(75, 22, 16, 0),
(76, 23, 16, 0),
(77, 29, 16, 0),
(78, 30, 16, 0),
(79, 31, 16, 0),
(80, 32, 16, 1),
(81, 33, 16, 1),
(82, 34, 16, 0),
(83, 35, 16, 0),
(84, 36, 16, 1),
(85, 37, 16, 0),
(86, 38, 16, 0),
(87, 39, 16, 1),
(88, 40, 16, 1),
(89, 41, 16, 0),
(90, 42, 16, 0),
(91, 43, 16, 1),
(92, 44, 16, 0),
(93, 45, 16, 1),
(94, 46, 16, 0),
(95, 47, 16, 0),
(96, 48, 16, 0),
(97, 49, 16, 0),
(98, 50, 16, 1),
(99, 51, 16, 1),
(100, 52, 16, 0),
(101, 53, 16, 0),
(102, 10, 16, 1),
(103, 54, 1, 1),
(104, 54, 16, 1),
(105, 55, 16, 1),
(106, 56, 16, 1),
(107, 42, 16, 1),
(108, 10, 16, 1),
(109, 57, 1, 0),
(110, 57, 16, 0),
(111, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario_turma`
--

CREATE TABLE `tbl_usuario_turma` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_usuario_turma`
--

INSERT INTO `tbl_usuario_turma` (`id`, `id_aluno`, `id_turma`) VALUES
(35, 17, 9),
(36, 18, 9),
(39, 21, 9),
(41, 23, 9),
(43, 30, 9),
(44, 31, 9),
(45, 32, 9),
(46, 33, 9),
(49, 36, 9),
(50, 37, 9),
(51, 38, 9),
(52, 39, 9),
(53, 40, 9),
(56, 43, 9),
(58, 45, 9),
(61, 48, 9),
(62, 49, 9),
(63, 50, 9),
(64, 51, 9),
(65, 52, 9),
(66, 53, 9),
(67, 10, 10),
(73, 42, 9),
(74, 54, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adm` (`id_professor`),
  ADD KEY `id_sequencia` (`id_sequencia`);

--
-- Indexes for table `tbl_avaliacao_coletiva`
--
ALTER TABLE `tbl_avaliacao_coletiva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_compartilhamentos`
--
ALTER TABLE `tbl_compartilhamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_destinos`
--
ALTER TABLE `tbl_destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_finais`
--
ALTER TABLE `tbl_finais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor` (`id_professor`),
  ADD KEY `sequencia` (`id_sequencia`);

--
-- Indexes for table `tbl_midia`
--
ALTER TABLE `tbl_midia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pergunta` (`id_pergunta`);

--
-- Indexes for table `tbl_perguntas`
--
ALTER TABLE `tbl_perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_sequencia` (`id_sequencia`),
  ADD KEY `destino` (`id_destino`);

--
-- Indexes for table `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requisicoes`
--
ALTER TABLE `tbl_requisicoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adm` (`id_adm`) USING BTREE;

--
-- Indexes for table `tbl_respostas`
--
ALTER TABLE `tbl_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_pergunta`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_pergunta` (`id_pergunta`);

--
-- Indexes for table `tbl_sequencia_perguntas`
--
ALTER TABLE `tbl_sequencia_perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor` (`id_professor`);

--
-- Indexes for table `tbl_turma`
--
ALTER TABLE `tbl_turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor` (`id_professor`);

--
-- Indexes for table `tbl_turmas_aula`
--
ALTER TABLE `tbl_turmas_aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuario_aula`
--
ALTER TABLE `tbl_usuario_aula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuario_turma`
--
ALTER TABLE `tbl_usuario_turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno` (`id_aluno`),
  ADD KEY `turma` (`id_turma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_avaliacao_coletiva`
--
ALTER TABLE `tbl_avaliacao_coletiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_compartilhamentos`
--
ALTER TABLE `tbl_compartilhamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_destinos`
--
ALTER TABLE `tbl_destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_finais`
--
ALTER TABLE `tbl_finais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_midia`
--
ALTER TABLE `tbl_midia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_perguntas`
--
ALTER TABLE `tbl_perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_professor`
--
ALTER TABLE `tbl_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_requisicoes`
--
ALTER TABLE `tbl_requisicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_respostas`
--
ALTER TABLE `tbl_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `tbl_sequencia_perguntas`
--
ALTER TABLE `tbl_sequencia_perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_turma`
--
ALTER TABLE `tbl_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_turmas_aula`
--
ALTER TABLE `tbl_turmas_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_usuario_aula`
--
ALTER TABLE `tbl_usuario_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_usuario_turma`
--
ALTER TABLE `tbl_usuario_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
