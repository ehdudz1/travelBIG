-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- 생성 시간: 17-09-04 18:32
-- 서버 버전: 5.5.42
-- PHP 버전: 5.4.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `travel`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `id` int(2) NOT NULL,
  `title` varchar(10) NOT NULL,
  `idtitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`id`, `title`, `idtitle`) VALUES
(1, '자유게시판', 'free'),
(2, '국내', 'dome'),
(3, '해외', 'over'),
(4, 'Q&A', 'qna'),
(5, '이벤트공지', 'event'),
(6, '중고장터', 'market');

-- --------------------------------------------------------

--
-- 테이블 구조 `dome`
--

CREATE TABLE IF NOT EXISTS `dome` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `dome`
--

INSERT INTO `dome` (`id`, `title`, `descript`, `author`, `write`) VALUES
(5, '제주도', '가고싶다', 'ehdudz1', '2017-09-04 17:49:38'),
(6, '강원도', '감자먹고싶다.', 'jieun', '2017-09-04 18:05:53');

-- --------------------------------------------------------

--
-- 테이블 구조 `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `free`
--

CREATE TABLE IF NOT EXISTS `free` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `free`
--

INSERT INTO `free` (`id`, `title`, `descript`, `author`, `write`) VALUES
(9, '공지', '안녕하세요.', '운영자', '2017-09-04 18:05:22'),
(10, '지은이바보', '4랑해~~~', 'ehdudz1', '2017-09-04 18:23:49');

-- --------------------------------------------------------

--
-- 테이블 구조 `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `market`
--

INSERT INTO `market` (`id`, `title`, `descript`, `author`, `write`) VALUES
(3, '아이폰7 플러스 128기가 레드 팝니다', '삼송역에서 직거래해요', 'ehdudz1', '2017-09-04 17:08:28'),
(4, '신발팔아요', '반스 올드스쿨 ', 'ehdudz1', '2017-09-04 18:06:57');

-- --------------------------------------------------------

--
-- 테이블 구조 `over`
--

CREATE TABLE IF NOT EXISTS `over` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE IF NOT EXISTS `qna` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `author` varchar(10) NOT NULL,
  `write` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `dome`
--
ALTER TABLE `dome`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `free`
--
ALTER TABLE `free`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `over`
--
ALTER TABLE `over`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `dome`
--
ALTER TABLE `dome`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- 테이블의 AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `free`
--
ALTER TABLE `free`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- 테이블의 AUTO_INCREMENT `market`
--
ALTER TABLE `market`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- 테이블의 AUTO_INCREMENT `over`
--
ALTER TABLE `over`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
