-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.40 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 wenjing 的数据库结构
CREATE DATABASE IF NOT EXISTS `wenjing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wenjing`;


-- 导出  表 wenjing.student_kb 结构
CREATE TABLE IF NOT EXISTS `student_kb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(50) NOT NULL DEFAULT '0',
  `dept` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 wenjing.teacher_kb 结构
CREATE TABLE IF NOT EXISTS `teacher_kb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(50) NOT NULL DEFAULT '0',
  `dept` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。


-- 导出  表 wenjing.wenjing_exam 结构
CREATE TABLE IF NOT EXISTS `wenjing_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL DEFAULT '0' COMMENT '考试时间',
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT '课程名',
  `class` varchar(50) NOT NULL DEFAULT '0' COMMENT '考试班级',
  `num` varchar(50) NOT NULL DEFAULT '0' COMMENT '人数',
  `room` varchar(50) NOT NULL DEFAULT '0' COMMENT '考场',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 wenjing.wenjing_js 结构
CREATE TABLE IF NOT EXISTS `wenjing_js` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `build` varchar(50) NOT NULL DEFAULT '0' COMMENT '教学楼',
  `room` varchar(50) NOT NULL DEFAULT '0' COMMENT '教室号',
  `type` varchar(50) NOT NULL DEFAULT '0' COMMENT '教室类型',
  `seat` int(11) NOT NULL DEFAULT '0' COMMENT '座位数',
  `section` int(11) NOT NULL DEFAULT '0' COMMENT '小节',
  `day` int(11) NOT NULL DEFAULT '0' COMMENT '星期',
  `week` varchar(50) NOT NULL DEFAULT '0' COMMENT '周期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
