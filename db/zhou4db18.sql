-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-07 07:13:26
-- 服务器版本： 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `zhou4db18`
--
CREATE DATABASE IF NOT EXISTS `zhou4db18` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `zhou4db18`;

-- --------------------------------------------------------

--
-- 表的结构 `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `company` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '创业公司',
  `job` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '职务',
  `address` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '公司地址',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '公司电话',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='创业表';

--
-- 转存表中的数据 `business`
--

INSERT INTO `business` (`ID`, `company`, `job`, `address`, `phonenum`, `isuse`) VALUES
('users1', '依梵', 'CEO', '童话世界里', '18045635489', 1),
('users2', '万事屋', '老板', '歌舞伎町', '13548711111', 1);

-- --------------------------------------------------------

--
-- 表的结构 `employment`
--

DROP TABLE IF EXISTS `employment`;
CREATE TABLE IF NOT EXISTS `employment` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `company` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '就职公司',
  `job` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '职务',
  `address` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '公司地址',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '公司电话',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='就业表';

--
-- 转存表中的数据 `employment`
--

INSERT INTO `employment` (`ID`, `company`, `job`, `address`, `phonenum`, `isuse`) VALUES
('users1', '阿凡达环游', '外星人管理登记', '潘多拉星球', '13548711111', 1);

-- --------------------------------------------------------

--
-- 表的结构 `graduate`
--

DROP TABLE IF EXISTS `graduate`;
CREATE TABLE IF NOT EXISTS `graduate` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `school` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '就读学校',
  `speciality` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '专业',
  `address` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学校地址',
  `advisor` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '导师',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '导师联系电话',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='读研表';

--
-- 转存表中的数据 `graduate`
--

INSERT INTO `graduate` (`ID`, `school`, `speciality`, `address`, `advisor`, `phonenum`, `isuse`) VALUES
('users1', '重庆大学', '动画专业', '重庆市', '王五', '18764268431', 1);

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号/工号',
  `password` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '123' COMMENT '密码',
  `question` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '问题',
  `answer` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '答案',
  `realname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '真实姓名',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='登录表';

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`ID`, `password`, `question`, `answer`, `realname`, `isuse`) VALUES
('admin1', '123456', '我最喜欢的动物是？', '树懒', '琼木', 1),
('admin2', '123', '我的老师是？', '琼木三三', '伊藤健太郎', 1),
('user2', '123', 'null', 'null', '三桥', 1),
('users1', '123456', '我的老师是？', '琼木三三', '依梵', 1),
('users2', '123456', '我的搭档是？', '伊藤', '三桥', 1);

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `nickname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '昵称',
  `realname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '真实名',
  `sex` int(11) NOT NULL COMMENT '性别(0为男)',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '电话号码',
  `email` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '邮箱',
  `college` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学院',
  `class` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '班级',
  `year` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '入学年份',
  `image` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '../images/头像.png' COMMENT '头像',
  `go` int(20) NOT NULL COMMENT '就业去向(1-4,1就业,2创业,3读研,4待业)',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='学生表';

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`ID`, `nickname`, `realname`, `sex`, `phonenum`, `email`, `college`, `class`, `year`, `image`, `go`, `isuse`) VALUES
('user2', 'null', '三桥', 0, 'null', 'null', 'null', 'null', 'null', '../images/头像.png', 1, 1),
('users1', '万物生', '依梵', 1, '15487456281', '77714@163.com', '杭州国际服务工程学院', '中文141', '2011', '../images/头像.png', 3, 1),
('users2', '三三', '三桥', 0, '15487456281', '55514@163.com', '外国语学院', '英语151', '2015', '../images/头像.png', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '工号',
  `nickname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '昵称',
  `realname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '真实名',
  `sex` int(11) NOT NULL COMMENT '性别',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '电话号码',
  `email` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '邮箱',
  `college` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '任职学院',
  `class` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '任教班级',
  `year` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '入职年份',
  `image` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '../images/头像.png' COMMENT '头像',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='老师表';

--
-- 转存表中的数据 `teachers`
--

INSERT INTO `teachers` (`ID`, `nickname`, `realname`, `sex`, `phonenum`, `email`, `college`, `class`, `year`, `image`, `isuse`) VALUES
('admin1', '三三', '琼木', 0, '13452494310', '55514@163.com', '理学院', '数学171', '2012', '../images/头像.png', 1),
('admin2', '伊藤', '伊藤健太郎', 0, '15487456281', '77714@163.com', '文创', '动画162', '2011', '../images/头像.png', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wait`
--

DROP TABLE IF EXISTS `wait`;
CREATE TABLE IF NOT EXISTS `wait` (
  `ID` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `address` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '家庭住址',
  `phonenum` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '家庭电话',
  `isuse` int(11) NOT NULL DEFAULT '1' COMMENT '用于软删除',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='待业表';

--
-- 转存表中的数据 `wait`
--

INSERT INTO `wait` (`ID`, `address`, `phonenum`, `isuse`) VALUES
('users1', '地球村', '18754832674', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
