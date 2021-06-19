-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2021-06-20 06:00:06
-- 服务器版本： 5.7.32
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `forum`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `password`, `mail`, `sex`, `tel`) VALUES
('admin', 'admin', 'admin@admin', '男', '100');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` tinytext NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `username`, `title`, `content`, `date`, `type`) VALUES
(5, 'admin', 'test', 'test-ad', '2021-06-18 22:38:09', '体育');

-- --------------------------------------------------------

--
-- 表的结构 `reply_message`
--

CREATE TABLE `reply_message` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` tinytext NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reply_message`
--

INSERT INTO `reply_message` (`id`, `username`, `title`, `content`, `date`, `reply_id`) VALUES
(10, 'admin', 'test', 'qqq', '2021-06-19 00:01:49', 5),
(11, 'admin', 'test', 'qqqqqqq', '2021-06-19 00:01:53', 5);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `password`, `mail`, `sex`, `tel`) VALUES
('test', 'test111', 'test@test111', '女', '11111'),
('user', 'user', 'user@user11', '男', '001');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `reply_message`
--
ALTER TABLE `reply_message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `reply_message`
--
ALTER TABLE `reply_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
