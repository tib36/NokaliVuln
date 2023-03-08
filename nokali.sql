-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-03-08 12:18:15
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `nokali`
--

-- --------------------------------------------------------

--
-- 表的结构 `cms_index`
--

CREATE TABLE `cms_index` (
  `id` int(11) NOT NULL,
  `title` text,
  `content` longtext NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_index`
--

INSERT INTO `cms_index` (`id`, `title`, `content`, `user`) VALUES
(1, '欢迎来到nokali的简单靶场', 'nokali靶场是一款基于ThinkPHP5开发，内置了各项漏洞的靶场项目，适合新手入门渗透技术或者作为代码审计教学等用途，当然，由于它故意设计了大量的安全漏洞，它极其易受攻击，因此您不应该在任何情况下将其部署在真实的环境中，也不应该将其暴露在公网，您应该在可控情况下将其部署在虚拟机中练习（参考DVWA等）。\r\n它的特点是并不把各种漏洞孤立出来并单独展示，而是综合在一起形成一个可用的站点，相比于DVWA等靶场，更贴近真实环境。\r\n它存在各种容易发现的和不容易发现的安全问题，有些是故意的，有些可能是隐藏的（甚至我作为开发者也不一定知道），您可以多加尝试。\r\n可能出现的安全问题：SQL注入，弱口令，任意文件上传，越权访问等……', 'nokali'),
(2, 'SQL注入', 'SQL注入即由于程序过滤不严，而导致攻击者可以恶意拼接SQL语句到程序执行的语句中，从而造成任意SQL语句执行。', 'nokali'),
(3, '任意文件上传', '任意文件上传，即由于程序对上传文件功能存在限制缺陷，导致攻击者可以上传恶意程序造成对服务器的控制。', 'nokali'),
(4, '接口未授权访问', '接口未授权访问，即接口未做有效鉴权导致攻击者可以操纵服务器上的功能来实现恶意目的，例如任意创建用户或修改密码等。', 'nokali'),
(5, '逻辑漏洞', '逻辑漏洞是由于程序开发人员在设计业务逻辑时的缺陷，导致攻击者能够实现本不应该实现的操作，这类漏洞往往不会被扫描器发现，而且造成的影响也各不相同。', 'nokali'),
(6, 'test', '一篇测试文章', 'admin'),
(10, '测试文章2', '222', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `cms_user`
--

CREATE TABLE `cms_user` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_group` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_user`
--

INSERT INTO `cms_user` (`username`, `password`, `user_group`) VALUES
('admin', '7fef6171469e80d32c0559f88b377245', 0),
('test', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `cms_index`
--
ALTER TABLE `cms_index`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cms_index`
--
ALTER TABLE `cms_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
