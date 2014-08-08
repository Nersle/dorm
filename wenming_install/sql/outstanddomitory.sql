-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 18 日 12:54
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `outstanddomitory`
--

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE `album` (
  `albumId` bigint(10) NOT NULL auto_increment,
  `albumName` varchar(20) NOT NULL,
  `caption` varchar(50) NOT NULL,
  PRIMARY KEY  (`albumId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 导出表中的数据 `album`
--

INSERT INTO `album` (`albumId`, `albumName`, `caption`) VALUES
(19, '风采展示一', '文明寝室风采展示'),
(20, '风采展示二', '优秀寝室风采展示'),
(21, '风采展示四', '先进个人风采展示');

-- --------------------------------------------------------

--
-- 表的结构 `gongyu`
--

CREATE TABLE `gongyu` (
  `did` int(11) NOT NULL,
  `dname` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `gongyu`
--

INSERT INTO `gongyu` (`did`, `dname`) VALUES
(1, 'A01'),
(2, 'A02'),
(3, 'A03'),
(4, 'A04'),
(5, 'A05'),
(6, 'A06'),
(7, 'A07'),
(8, 'A08'),
(9, 'A09'),
(10, 'A10'),
(11, 'A11'),
(12, 'A12'),
(13, 'A13'),
(15, 'A15'),
(16, 'A16'),
(17, 'A17'),
(101, 'B01'),
(102, 'B02'),
(103, 'B03'),
(104, 'B04'),
(105, 'B05'),
(106, 'B06'),
(107, 'B07');

-- --------------------------------------------------------

--
-- 表的结构 `outstandperson`
--

CREATE TABLE `outstandperson` (
  `outId` bigint(20) NOT NULL auto_increment COMMENT '优秀个人编号',
  `did` int(10) NOT NULL COMMENT '公寓号',
  `roomId` int(11) NOT NULL COMMENT '寝室号',
  `outName` varchar(20) NOT NULL COMMENT '姓名',
  `intro` varchar(100) NOT NULL,
  `rewardType` int(5) NOT NULL COMMENT '获奖类型',
  `headerUrl` varchar(50) character set macce NOT NULL,
  PRIMARY KEY  (`outId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='优秀个人信息表' AUTO_INCREMENT=16 ;

--
-- 导出表中的数据 `outstandperson`
--

INSERT INTO `outstandperson` (`outId`, `did`, `roomId`, `outName`, `intro`, `rewardType`, `headerUrl`) VALUES
(15, 1, 23, '233', '23', 3, 'static/header/13400228356896.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `outstandroom`
--

CREATE TABLE `outstandroom` (
  `outId` bigint(20) NOT NULL auto_increment COMMENT '文明寝室编号',
  `did` int(10) NOT NULL COMMENT '公寓号',
  `roomId` int(11) NOT NULL COMMENT '寝室号',
  `monitor` varchar(20) NOT NULL COMMENT '寝室长',
  `intro` varchar(100) NOT NULL,
  `rewardType` int(5) NOT NULL COMMENT '获奖类型',
  PRIMARY KEY  (`outId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='优秀寝室表' AUTO_INCREMENT=49 ;

--
-- 导出表中的数据 `outstandroom`
--


-- --------------------------------------------------------

--
-- 表的结构 `photos`
--

CREATE TABLE `photos` (
  `albumID` bigint(20) NOT NULL,
  `photoID` bigint(10) NOT NULL auto_increment,
  `commentary` varchar(50) NOT NULL,
  `photoUrl` varchar(50) NOT NULL,
  PRIMARY KEY  (`photoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `photos`
--

INSERT INTO `photos` (`albumID`, `photoID`, `commentary`, `photoUrl`) VALUES
(19, 19, '', 'upload/13390702235514.JPG'),
(19, 18, '', 'upload/13390702196317.JPG'),
(19, 17, '', 'upload/13390702144615.JPG'),
(19, 16, '', 'upload/13390702099965.JPG'),
(19, 15, '', 'upload/13390702013361.JPG'),
(19, 20, '', 'upload/13390702292120.JPG'),
(20, 21, '', 'upload/13390702373492.jpg'),
(20, 22, '', 'upload/13390702512786.jpg'),
(20, 23, '', 'upload/13390702589995.JPG'),
(20, 24, '', 'upload/13390702644133.JPG');

-- --------------------------------------------------------

--
-- 表的结构 `reward`
--

CREATE TABLE `reward` (
  `rewardId` int(5) NOT NULL,
  `rewardName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `reward`
--

INSERT INTO `reward` (`rewardId`, `rewardName`) VALUES
(1, '文明寝室'),
(2, '特色寝室'),
(3, '最佳寝室长'),
(4, '最佳值周生');

-- --------------------------------------------------------

--
-- 表的结构 `systemrule`
--

CREATE TABLE `systemrule` (
  `indexName` varchar(50) NOT NULL,
  `indexValue` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `systemrule`
--

INSERT INTO `systemrule` (`indexName`, `indexValue`) VALUES
('rules', ' <div style="font-family: Simsun;font-size:16px; "><h2 style="text-align: center;"><span style="background-color: rgb(255, 255, 255);"><br /></span></h2><h2 style="text-align: center;"><span style="background-color: rgb(255, 255, 255);">附一&nbsp; “文明寝室”申报及评定办法</span></h2><p><span style="background-color: rgb(255, 255, 255);">一、文明寝室创建宗旨：&nbsp;<strong></strong><br />通过文明寝室的创建，展示学生的自我管理、自我服务、自我教育的精神风貌，在学生寝室内形成优雅、自然、朴素、健康向上的文化氛围。&nbsp;<br />二、文明寝室创建标准：&nbsp;<br />1．寝室环境：卫生整洁、物品摆放统一整齐，空气清新、整体环境温馨、高雅。&nbsp;<br />2．寝室氛围：寝室成员思想进步，团结协作互帮互助，具有良好的生活习惯。寝室文化健康向上，具有良好的学习风气，成员成绩良好。&nbsp;<br />3．遵章守纪：模范遵守校规校纪及公寓规章制度，积极参加校、院（系）组织的各项活动，积极参与公寓建设，主动配合公寓各项工作，尊重他人劳动成果，具有较强的自律性。&nbsp;<br />三、文明寝室创建评选时间：&nbsp;<br />每年五月份，由学生公寓管理中心、校学工部联合开展一次文明寝室创建评选活动。&nbsp;<br />四、文明寝室评选程序：</span></p><div align="center"><span style="background-color: rgb(255, 255, 255);"><img align="center" src="http://home.hit.edu.cn//apartment//image/logo/0.JPG" alt="" width="681" height="410" /></span></div><p><span style="background-color: rgb(255, 255, 255);">五、文明寝室表彰办法：&nbsp;<br />1．授予哈尔滨工业大学“文明寝室”称号。&nbsp;<br />2．为寝室成员颁发荣誉证书。&nbsp;<br />3．给予物质奖励。</span></p><p align="center"><span style="background-color: rgb(255, 255, 255);">附二&nbsp; “特色寝室”申报及评定办法</span></p><p><span style="background-color: rgb(255, 255, 255);">一、特色寝室创建宗旨：&nbsp;<br />通过特色寝室的创建，增强同学自我约束、自我监督、自我管理的意识，展现学生个性，激发广大同学参与公寓建设的积极性和创造性。&nbsp;<br />二、特色寝室创建标准：&nbsp;<br />1、符合文明寝室的创建标准。&nbsp;<br />2、符合以下特色标准之一。&nbsp;<br />（1）我爱我家型：热爱学校、热爱公寓、热爱寝室<strong>，</strong>积极配合、参与学校的各项建设；为公寓文化建设积极提供建设性意见并产生明显实际效果。&nbsp;<br />（2）百尺竿头型：在某一方面已经达到很高境界、并仍在继续努力寝室成员之一连续三学期获得一等人民奖学金；在课题研究方面表现突出，发表文章能力在全院名列前茅的研究生。&nbsp;<br />（3）百炼成钢型：在生活上自强不息，迎难而上，取得优异成绩寝室部分成员家境贫寒但乐观向上；寝室成员学习成绩较突出；部分寝室成员曾有勤工助学经历。&nbsp;<br />（4）阳光使者型：生活氛围活泼开朗，健康向上寝室成员注重身心协调发展，幽默豁达，积极向上；寝室整体文化氛围轻松愉悦，能带动和感染周围的同学和寝室，在公寓内有一定的影响力。&nbsp;<br />（5）同舟共济型：团结互助，共度难关有寝室同学互帮互助共渡难关的突出事迹；寝室成员互助协作，团结一致，积极向上；寝室成员共同学习，共同进步。&nbsp;<br />（6）爱心奉献型：在生活、学习中乐于助人，积极参加志愿者活动有过集体参加公益活动或志愿服务的经历；寝室成员在日常生活中乐于帮助师生、同学；寝室成员参加过无偿献血活动。&nbsp;<br />（7）星光灿烂型：在文艺或体育方面表现突出寝室部分成员在体育比赛中获得较高荣誉，在体育活动中表现积极；寝室部分成员在文艺比赛中获得较好成绩，积极参与学校文艺活动；寝室成员有特殊才艺。&nbsp;<br />（8）一尘不染型：寝室周检查打分全年优秀，随时保持窗明几净、井然有序，积极配合公寓接待各方面的学习、参观和检查，表现突出。&nbsp;<br />（9）一枝独秀型：个性突出，形象鲜明。寝室个性特点突出，符合创建的基本标准，而以上的类型设置未考虑在内的可以自由申报，设计符合自身特点的寝室类型。&nbsp;<br />（10）全面发展型：各方面表现突出寝室全体成员学习成绩优异；寝室全体成员积极参与学校及院系各项活动；寝室多数为共产党员或主要学生干部。&nbsp;<br />三、特色寝室创建评选时间：每学年末，由学生公寓管理中心、校学工部联合开展一次特色寝室创建评选活动。时间安排在三月份，各项考核成绩按照上一学期为准。&nbsp;<br />四、特色寝室评选程序：</span></p><div align="center"><p><span style="background-color: rgb(255, 255, 255);"><img src="http://home.hit.edu.cn//apartment//image/logo/1.JPG" alt="" width="651" height="419" /></span></p></div><p align="center"><span style="background-color: rgb(255, 255, 255);">&nbsp;</span></p><p><span style="background-color: rgb(255, 255, 255);">五、特色寝室表彰办法：&nbsp;<br />1．授予哈尔滨工业大学“特色寝室”称号。&nbsp;<br />2．为寝室成员颁发荣誉证书。&nbsp;<br />3．给予物质奖励。</span></p><p align="center"><span style="background-color: rgb(255, 255, 255);">附三&nbsp; &nbsp;&nbsp;年度十佳寝室长评选办法&nbsp;<br /></span></p><span style="background-color: rgb(255, 255, 255);">一、评选宗旨： 通过十佳寝室长的评选，鼓励寝室长做好寝室卫生、纪律、生活等方面的管理，激发寝室长参与公寓建设的积极性和创造性。 二、评选标准：&nbsp;<br />1．所在寝室为文明寝室的。&nbsp;<br />2．所在寝室每次寝室卫生打分成绩都排在所在公寓寝室数量的前5%。&nbsp;<br />3．所在寝室经常开展健康有益的文体活动和其他活动，其寝室成员积极参加。&nbsp;<br />4．所在寝室热心支持、参与公寓开展的各项工作和活动。&nbsp;<br />5．所在寝室无因违反纪律受到公寓通报批评或处分。&nbsp;<br />6．寝室成员团结和睦，有良好的学习生活习惯和氛围。&nbsp;<br />三、十佳寝室长评选时间：五月份由学生公寓管理中心、校学工部联合开展评选。&nbsp;<br />四、十佳寝室长评选程序：</span><div align="center"><p><span style="background-color: rgb(255, 255, 255);"><img src="http://home.hit.edu.cn//apartment//image/logo/3.JPG" width="519" height="373" alt="" /></span></p></div><span style="background-color: rgb(255, 255, 255);">五、十佳寝室长表彰办法：&nbsp;<br />1．授予哈尔滨工业大学“社会活动积极分子”称号。&nbsp;<br />2．颁发荣誉证书。&nbsp;<br />3．给予物质奖励。</span><p align="center"><span style="background-color: rgb(255, 255, 255);">附四&nbsp; 年度十佳值周生评选办法&nbsp;<br /></span></p><span style="background-color: rgb(255, 255, 255);">一、评选宗旨：&nbsp;<br />通过十佳值周生的评选，使同学树立集体的事情，要分工合作，勇挑重担的<strong>责任意识和</strong>主动管理意识<strong>，</strong>激发同学真诚为他人服务的奉献精神。&nbsp;<br />二、评选标准：&nbsp;<br />1．值周生值周期间，每次寝室卫生打分成绩都排在所在公寓寝室数量的前5%。&nbsp;<br />2．值周期间，积极协助和支持寝室长工作。&nbsp;<br />三、十佳值周生评选时间：每学年末，由学生公寓管理中心、校学工部联合开展。时间安排在三月份，各项考核成绩按照上一学期为准。&nbsp;<br />四、十佳值周生评选程序：</span><div align="center"><p><span style="background-color: rgb(255, 255, 255);"><img src="http://home.hit.edu.cn//apartment//image/logo/4.JPG" width="521" height="366" alt="" /></span></p></div><p><span style="background-color: rgb(255, 255, 255);">五、十佳值周生表彰办法：&nbsp;<br />1．授予哈尔滨工业大学“社会活动积极分子”称号。&nbsp;<br />2．颁发荣誉证书。&nbsp;<br />3．给予物质奖励。</span></p></div> ');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `username` varchar(50) character set utf8 NOT NULL,
  `password` varchar(50) character set utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2;

--
-- 导出表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`) VALUES
(1, 'admin', 'admins');
