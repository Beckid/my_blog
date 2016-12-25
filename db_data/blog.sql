-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-25 07:05:14
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE `articles` (
  `Id` int(6) UNSIGNED NOT NULL,
  `Title` char(50) NOT NULL,
  `Author` char(20) NOT NULL,
  `Content` text,
  `PostTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`Id`, `Title`, `Author`, `Content`, `PostTime`) VALUES
(1, 'A 3D Game Environment', 'cxh', 'This is a very important research in Computer Science (CS) Area.', '2016-12-21 16:19:05'),
(2, 'Research on the use of water bottles in NUS', 'admin', 'This research aims at protecting the environment in NUS by reducing the use of water bottles.', '2016-12-22 08:29:28'),
(10, 'A new running time system for JavaScript', 'yw', 'This project will build a new and efficient system when we need an interpreter for JavaScript programs', '2016-12-22 12:56:48'),
(11, 'A collaborative IDE', 'admin', 'This IDE aims at helping programmers to be able to work on the same segment of source at the same time so that it will increase the working efficiency.', '2016-12-23 08:56:09'),
(12, 'A kind of new teaching style in NUS', 'cxh', 'This article points out the current problems of NUS teaching style and declares the possible improvement of it.', '2016-12-23 09:08:02'),
(13, 'Cross-platform application development', 'cxh', 'This course is an introduction to the development methodology of cross-platform applications.', '2016-12-23 09:21:52'),
(14, 'How to writer a new article', 'jls', 'How to write a new article? \r\nDo you know it? \r\nAt least I do not know. haha~', '2016-12-23 09:23:07'),
(15, '		A major/minor use of _SESSION super global 	', 'cxh', '		In PHP Programming,super globals are a class of global variables pre-defined by the PHP system to perform certain task. 	', '2016-12-23 16:26:30'),
(16, 'A new way of creating objects in JavaScript', 'yw', 'This article describes a new method to create object in JavaScript. This is important for web programming, especially OOP.', '2016-12-23 11:43:36'),
(17, 'Consideration of game engines (new)', 'cxh', '1. Adobe Flash with ActionScript<br>\r\nThis is a traditional way for developing web games. It is supported widely by most mainstream browsers (including but not limited to, Chrome, Firefox, Edge). However, it is more suitable for â€œsmallerâ€ games, which does not have request for high-quality videos and audios. Due to the high-speed development of web game industry, Flash is not as popular as before.<br>\r\n3D support: Flash 11 introduces Stage3D, based on OpenGL ES 2.0.<br>\r\n<br><br>\r\n2. HTML5 engines<br>\r\nHTML5 has been quickly supported by more and more browsers. Compared to Flash, its compatibility is much better. Also, the consumption of system resources has been reduced. The general trend is that HTML5 is going to replace Flash gradually in the marketspace.<br>\r\n3D support: WebGL<br>\r\n<br><br>\r\n3. Unreal 3/4<br>\r\nUnreal engines have been well-known for its products due to high-quality videos and audios. However, too high quality in graphics and sounds may not be appropriate for web-based games due to long loading time and pressure on the server. Nevertheless, it is attractive not only due to the perfect quality in graphics but it is free and open-source as well. <br>\r\n3D support: WebGL<br>\r\n<br><br>\r\n3. Unity 3D<br>\r\nUnity is a powerful game engine with huge success. It supports a lot of platforms, including Windows, OSX, Linux, Wii U, Xbox360, Android, iOS, Windows Phone and web browsers. In addition, just a few weeks ago, Unity Technology has announced their plan of â€œFree Unity for Education!â€. More details can be seen at http://unity3d.com/freeforedu. Unity has well-maintained documentation and online tutorials.<br>\r\nMore excitingly, its asset store provides a bunch of well-designed plugin-ins, models, textures, sounds and special effects. In Unity Asset Store, some of the materials are quite useful for the Source Academy, including<br>\r\n1) Space Station: Store	Video1		Video2<br>\r\n2) Moon: Store<br>\r\nThey save a lot of time for development and can improve the quality of graphs and sounds used by the Source Academy a lot.<br>\r\n3D support: WebGL<br>\r\nLanguage Support: C#, UnityScript (based on JavaScript), BOO (inspired by Python and based on .NET Framework)<br>\r\nAbout web-based support: Before Unity 5.3, a Unity game is built and run on the browser by Unity Web Player (a useful plugin for browsers). However, both Chrome and Firefox has removed NPAPI due to security issues, therefore, Unity Web Player is also no longer support.<br>\r\nFrom Unity 5.4 onwards, Unity naturally supports WebGL. Since browsers do not need any plugins to run Unity games, it becomes a better choice for mobile platforms. WebGL in Unity is implemented thanks to the help of IL2CPP, Emscripten and asm.js. Google and Mozilla have indicated their great interest in this technology.<br>\r\n	', '2016-12-23 13:35:13');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `Username` char(20) NOT NULL,
  `Password` char(50) NOT NULL,
  `Email` char(70) DEFAULT NULL,
  `RegTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`Username`, `Password`, `Email`, `RegTime`) VALUES
('admin', '86395676', 'postmaster@blog.com', '2016-12-20 17:23:36'),
('cxh', 'cxhcxh', 'cxh@blog.com', '2016-12-20 17:24:40'),
('jls', 'jlsjls', 'jls@blog.com', '2016-12-20 17:24:27'),
('yw', 'ywyw', 'yw@blog.com', '2016-12-20 17:23:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
