-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2016 at 11:53 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tsinhuaitalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tt_temp_user`
--

CREATE TABLE IF NOT EXISTS `tt_temp_user` (
  `temp_user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '临时注册id',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱地址',
  `cellphone` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `salt` char(32) DEFAULT NULL COMMENT '盐值',
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `mail_verified` tinyint(1) DEFAULT '0' COMMENT '邮箱是否验证（1是；0否）',
  `mail_verified_time` int(11) DEFAULT NULL COMMENT '邮箱验证时间',
  `register_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `register_ip` char(15) DEFAULT NULL COMMENT '注册IP地址',
  `register_latitude` decimal(10,8) DEFAULT NULL COMMENT '注册经度',
  `register_longitude` decimal(11,8) DEFAULT NULL COMMENT '注册维度',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否被锁定（1是；0否）',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否被删除（1是；0否）',
  PRIMARY KEY (`temp_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='临时用户表' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user`
--

CREATE TABLE IF NOT EXISTS `tt_user` (
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '用户id',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `avatar_path` varchar(255) DEFAULT NULL COMMENT '头像路径',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱地址',
  `cellphone` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `password` char(64) DEFAULT NULL COMMENT '密码',
  `salt` char(32) DEFAULT NULL COMMENT '盐值',
  `role_id` smallint(5) DEFAULT NULL COMMENT '角色id',
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `age` tinyint(3) DEFAULT NULL COMMENT '年龄',
  `register_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `register_ip` char(15) DEFAULT NULL COMMENT '注册IP',
  `register_longitude` decimal(11,8) DEFAULT NULL COMMENT '注册经度',
  `register_latitude` decimal(10,8) DEFAULT NULL COMMENT '注册纬度',
  `last_login_ip` char(15) DEFAULT NULL COMMENT '上次登录的IP地址',
  `last_login_latitude` decimal(10,8) DEFAULT NULL COMMENT '上次登录的经度',
  `last_login_longitude` decimal(11,8) DEFAULT NULL COMMENT '上次登录的维度',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否被锁定（1是；0否）',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否被删除（1是；0否）',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- Dumping data for table `tt_user`
--

INSERT INTO `tt_user` (`user_id`, `user_name`, `avatar_path`, `nickname`, `email`, `cellphone`, `password`, `salt`, `role_id`, `real_name`, `age`, `register_time`, `register_ip`, `register_longitude`, `register_latitude`, `last_login_ip`, `last_login_latitude`, `last_login_longitude`, `is_lock`, `is_del`) VALUES
(1, '', NULL, NULL, 'ningerjohn@163.com', NULL, '282b3bd1c769a29e640cad737ad94a44', '65055e3f0322d7f89888261a0f104eb7', NULL, NULL, NULL, 1458482768, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_action_node`
--

CREATE TABLE IF NOT EXISTS `tt_user_action_node` (
  `node_id` int(11) NOT NULL COMMENT '节点ID',
  `parent_node_id` int(11) DEFAULT NULL COMMENT '父级节点ID',
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID',
  `node_title` varchar(50) DEFAULT NULL COMMENT '节点名字',
  `module_name` varchar(30) DEFAULT NULL COMMENT '模块名字',
  `controller_name` varchar(30) DEFAULT NULL COMMENT '控制器名字',
  `method_name` varchar(30) DEFAULT NULL COMMENT '方法名字',
  `description` varchar(100) DEFAULT NULL COMMENT '节点描述',
  `is_menu` tinyint(1) DEFAULT NULL COMMENT '是否是菜单（1是0否）',
  `creater_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是0否）',
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_article`
--

CREATE TABLE IF NOT EXISTS `tt_user_article` (
  `article_id` int(11) NOT NULL COMMENT '文章ID',
  `title` varchar(50) DEFAULT NULL COMMENT '文章标题',
  `content` varchar(1000) DEFAULT NULL COMMENT '文章博客的内容',
  `tag_name` varchar(100) DEFAULT NULL COMMENT '用户给文章添加的标签字符串',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '发布人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) NOT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_article_cmt`
--

CREATE TABLE IF NOT EXISTS `tt_user_article_cmt` (
  `article_cmt_id` int(11) DEFAULT NULL COMMENT '文章评论ID',
  `at_article_cmt_id` int(11) DEFAULT NULL COMMENT '评论的“文章评论ID”',
  `article_cmt_content` varchar(1000) DEFAULT NULL COMMENT '文章的评论内容',
  `article_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) DEFAULT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说评论的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说评论的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_article_directory`
--

CREATE TABLE IF NOT EXISTS `tt_user_article_directory` (
  `article_dir_id` int(11) NOT NULL COMMENT '目录ID',
  `article_dir_name` varchar(50) DEFAULT NULL COMMENT '目录名字',
  `description` varchar(500) DEFAULT NULL COMMENT '目录描述',
  `tag_name` varchar(100) DEFAULT NULL COMMENT '用户给说说添加的标签字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '发布人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) NOT NULL COMMENT '更新时的IP',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）',
  PRIMARY KEY (`article_dir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_info`
--

CREATE TABLE IF NOT EXISTS `tt_user_info` (
  `user_info_id` int(11) NOT NULL COMMENT '用户信息id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `gender` tinyint(1) DEFAULT NULL COMMENT '性别',
  `major_id` int(11) DEFAULT NULL COMMENT '专业ID',
  `major_title` varchar(35) DEFAULT NULL COMMENT '专业名字',
  `job_id` int(11) DEFAULT NULL COMMENT '工作ID',
  `job_title` varchar(35) DEFAULT NULL COMMENT '工作称呼',
  `hometown_ids` int(11) DEFAULT NULL COMMENT '家乡ID',
  `hometown_names` varchar(100) DEFAULT NULL COMMENT '家乡名字',
  `crt_location_ids` int(11) DEFAULT NULL COMMENT '所在地ID',
  `crt_location_names` varchar(100) DEFAULT NULL COMMENT '所在地名字',
  `university_id` int(11) DEFAULT NULL COMMENT '大学ID',
  `university_name` varchar(100) DEFAULT NULL COMMENT '大学名字',
  `high_school_id` int(11) DEFAULT NULL COMMENT '高中ID',
  `high_school_name` varchar(100) DEFAULT NULL COMMENT '高中名字',
  `primary_school_id` int(11) DEFAULT NULL COMMENT '小学ID',
  `primary_school_name` varchar(100) DEFAULT NULL COMMENT '小学名字',
  PRIMARY KEY (`user_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_login_log`
--

CREATE TABLE IF NOT EXISTS `tt_user_login_log` (
  `login_log_id` int(11) NOT NULL COMMENT '登录日志ID',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `login_time` int(11) DEFAULT NULL COMMENT '登录时间',
  `login_ip_address` char(15) DEFAULT NULL COMMENT '登录IP地址',
  `logout_time` int(11) DEFAULT NULL COMMENT '退出时间',
  `logout_ip_address` char(15) DEFAULT NULL COMMENT '退出IP地址',
  `latitude` decimal(10,8) DEFAULT NULL COMMENT '经度',
  `longitude` decimal(11,8) DEFAULT NULL COMMENT '维度',
  `client_type` tinyint(1) DEFAULT NULL COMMENT '平台登陆客户端的类型：\r\nWEB,\r\nApp, \r\nWechat, \r\nPC(Ubuntu, Win, OSX)',
  PRIMARY KEY (`login_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_role`
--

CREATE TABLE IF NOT EXISTS `tt_user_role` (
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `role_title` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `node_id_str` varchar(500) DEFAULT NULL COMMENT '节点ID集合字串',
  `creater_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_share`
--

CREATE TABLE IF NOT EXISTS `tt_user_share` (
  `share_id` int(11) NOT NULL COMMENT '说说ID',
  `content` varchar(1000) DEFAULT NULL COMMENT '分享内容',
  `link` varchar(350) DEFAULT NULL COMMENT '分享的链接URL地址',
  `tag_name` varchar(100) DEFAULT NULL COMMENT '用户给分享添加的标签字符串',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '发布人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) NOT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该分享的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除分享的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）',
  PRIMARY KEY (`share_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_share_cmt`
--

CREATE TABLE IF NOT EXISTS `tt_user_share_cmt` (
  `shar_cmt_id` int(11) DEFAULT NULL COMMENT '分享评论ID',
  `at_share_cmt_id` int(11) DEFAULT NULL COMMENT '评论的“分享的评论ID”',
  `share_cmt_content` varchar(1000) DEFAULT NULL COMMENT '分享的评论内容',
  `share_id` int(11) DEFAULT NULL COMMENT '分享ID',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) DEFAULT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说评论的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说评论的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_ucit`
--

CREATE TABLE IF NOT EXISTS `tt_user_ucit` (
  `ucit_id` int(11) NOT NULL COMMENT '说说ID',
  `content` varchar(1000) DEFAULT NULL COMMENT '说说内容',
  `tag_name` varchar(100) DEFAULT NULL COMMENT '用户给说说添加的标签字符串',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '发布人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) NOT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）',
  PRIMARY KEY (`ucit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tt_user_ucit_cmt`
--

CREATE TABLE IF NOT EXISTS `tt_user_ucit_cmt` (
  `ucit_cmt_id` int(11) DEFAULT NULL COMMENT '说说评论ID',
  `at_ucit_cmt_id` int(11) DEFAULT NULL COMMENT '评论的“说说评论ID”',
  `ucit_cmt_content` varchar(1000) DEFAULT NULL COMMENT '说说的评论内容',
  `ucit_id` int(11) DEFAULT NULL COMMENT '说说ID',
  `at_user_id` varchar(100) DEFAULT NULL COMMENT '@特别提醒的用户ID集合字符串',
  `creater_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_ip` char(15) DEFAULT NULL COMMENT '创建的IP地址',
  `create_latitude` decimal(10,8) DEFAULT NULL COMMENT '创建时的经度',
  `create_longitude` decimal(11,8) DEFAULT NULL COMMENT '创建时的纬度',
  `updater_id` int(11) DEFAULT NULL COMMENT '更新人ID',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_ip` char(15) DEFAULT NULL COMMENT '更新时的IP',
  `update_latitude` decimal(10,8) DEFAULT NULL COMMENT '更新时的经度',
  `update_longitude` decimal(11,8) DEFAULT NULL COMMENT '更新时的纬度',
  `lock_user_id` int(11) DEFAULT NULL COMMENT '锁定该说说评论的后台用户ID',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否锁定（1是0否）',
  `delete_user_id` int(11) DEFAULT NULL COMMENT '删除说说评论的后台用户ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除（1是；0否）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
