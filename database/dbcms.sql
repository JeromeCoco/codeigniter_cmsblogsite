-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 10:22 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `comment_author` varchar(50) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_desc` varchar(200) NOT NULL,
  `file_date_uploaded` varchar(50) NOT NULL,
  `file_time_uploaded` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `author`, `file_name`, `file_desc`, `file_date_uploaded`, `file_time_uploaded`) VALUES
(3, 'jerom', 'bscslogo.jpg', 'sample', 'Jun Thu 2017', '7:11 AM'),
(4, 'jerom', '4.jpg', 'image', 'Jun Thu 2017', '7:12 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE `tbl_links` (
  `id` int(11) NOT NULL,
  `link_name` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `page_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_links`
--

INSERT INTO `tbl_links` (`id`, `link_name`, `page_id`, `page_url`) VALUES
(5, 'home', '4', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `page_desc` varchar(200) NOT NULL,
  `page_keywords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `page_name`, `page_title`, `page_desc`, `page_keywords`) VALUES
(4, 'home', 'home', 'home								\n						', 'home							\n						');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_css`
--

CREATE TABLE `tbl_page_css` (
  `id` int(11) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `css_order` varchar(10) NOT NULL,
  `css_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page_css`
--

INSERT INTO `tbl_page_css` (`id`, `page_id`, `css_order`, `css_name`) VALUES
(117, '4', '1', 'index-style.css'),
(118, '4', '2', 'bootstrap.css'),
(119, '4', '3', 'font-awesome.css'),
(120, '4', '4', 'navbar.css'),
(121, '4', '5', 'footer.css');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_js`
--

CREATE TABLE `tbl_page_js` (
  `id` int(11) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `js_order` varchar(10) NOT NULL,
  `js_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page_js`
--

INSERT INTO `tbl_page_js` (`id`, `page_id`, `js_order`, `js_name`) VALUES
(72, '4', '1', 'jquery-3.1.1.min.js'),
(73, '4', '2', 'bootstrap.js'),
(74, '4', '3', 'bootstrap.min.js');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panels`
--

CREATE TABLE `tbl_panels` (
  `id` int(11) NOT NULL,
  `panel_name` varchar(50) NOT NULL,
  `panel_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_panels`
--

INSERT INTO `tbl_panels` (`id`, `panel_name`, `panel_content`) VALUES
(1, 'navbar', '&lt;nav&gt; &lt;ul id=&quot;navbar&quot;&gt; &lt;a class=&quot;navbar-link&quot; href=&quot;/../../official/index/home&quot;&gt;&lt;li&gt;Home&lt;/li&gt;&lt;/a&gt; &lt;a class=&quot;navbar-link&quot; href=&quot;/../../official/index/bloglist&quot;&gt;&lt;li&gt;Blogs&lt;/li&gt;&lt;/a&gt; &lt;/ul&gt; &lt;/nav&gt;'),
(2, 'about', '&lt;h2&gt;About Us&lt;/h2&gt; &lt;br/&gt; &lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/monitor.png&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/blogging.png&quot;&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/reading-glasses.png&quot;&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;/div&gt;'),
(3, 'location', '&lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;br/&gt; &lt;h2&gt;Visit Our Location&lt;/h2&gt; &lt;br/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;div id=&quot;googleMap&quot; style=&quot;width:100%;height:400px;&quot;&gt;&lt;/div&gt; &lt;script&gt; function myMap() {var mapProp= {center:new google.maps.LatLng(14.7559869,121.0471342),zoom:12, }; var map=new google.maps.Map(document.getElementById(&quot;googleMap&quot;),mapProp); } &lt;/script&gt; &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=AIzaSyBqCLySQLspygtFiDU4NcjAvGlYA8SdC0E&amp;callback=myMap&quot;&gt;&lt;/script&gt; &lt;/div&gt; &lt;/div&gt;'),
(4, 'contact', '&lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;br/&gt; &lt;h2&gt;Contact Us&lt;/h2&gt; &lt;br/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; Your Name &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Full Name...&quot;/&gt; &lt;br/&gt; Email Address &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;sample@example.com...&quot;/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-8&quot;&gt; Message &lt;textarea style=&quot;width:100%;height:122px;&quot; class=&quot;form-control&quot;&gt;&lt;/textarea&gt; &lt;br/&gt; &lt;input style=&quot;float:right;&quot; type=&quot;button&quot; class=&quot;btn btn-primary&quot; value=&quot;Send Message&quot;/&gt; &lt;/div&gt; &lt;/div&gt;'),
(5, 'footer', '&lt;footer&gt; &lt;div class=&quot;container&quot;&gt; &lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;More About Writer&lt;/h4&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt nibh eu diam malesuada tempus vel nec velit. Suspendisse potenti. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;Visit Our Pages&lt;/h4&gt;&lt;br/&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;/../localhost/../../img/facebook.png&quot;&gt;&amp;nbsp; &lt;img class=&quot;iconfoot&quot; src=&quot;/../localhost/../../img/twitter.png&quot;&gt;&amp;nbsp; &lt;img class=&quot;iconfoot&quot; src=&quot;/../localhost/../../img/gmail.png&quot;&gt;&amp;nbsp; &lt;img class=&quot;iconfoot&quot; src=&quot;/../localhost/../../img/instagram.png&quot;&gt;&amp;nbsp; &lt;img class=&quot;iconfoot&quot; src=&quot;/../localhost/../../img/youtube.png&quot;&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;Writer &lt;?php echo date(&quot;Y&quot;);?&gt; &amp;copy;&lt;/h4&gt; All rights reserved. &lt;/div&gt; &lt;/div&gt; &lt;/div&gt; &lt;/footer&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `date_posted` varchar(50) NOT NULL,
  `time_posted` varchar(50) NOT NULL,
  `post_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `author_name`, `post_title`, `post_content`, `date_posted`, `time_posted`, `post_status`) VALUES
(2, 'jeromecoco', 'Sample', '&lt;p&gt;&lt;em&gt;Content&lt;/em&gt;&lt;/p&gt;', 'May Tue 2017', '9:15 AM', 'Immediate'),
(4, 'jerom', 'Blog', '&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;em&gt;Lorem Ipsum&lt;/em&gt;&lt;/h3&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;em&gt;&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;&lt;/em&gt;&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;em&gt;&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;&lt;/em&gt;&lt;/p&gt;\n&lt;hr /&gt;\n&lt;div id=&quot;Content&quot;&gt;\n&lt;div class=&quot;boxed&quot;&gt;\n&lt;div id=&quot;lipsum&quot;&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo velit, congue nec nisi et, egestas efficitur elit. Maecenas urna urna, dapibus vel sodales ac, vehicula eget sapien. Fusce vestibulum neque quis dolor ultricies interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam consectetur elementum interdum. Aliquam erat volutpat. Aliquam lectus quam, pharetra a placerat sit amet, venenatis malesuada turpis. Pellentesque aliquam mi ac bibendum tristique. In ante velit, cursus eu pharetra vitae, laoreet ut ante. Quisque tristique imperdiet venenatis. Ut placerat dolor a velit hendrerit porttitor. Mauris blandit varius libero id ultricies. Duis blandit lacus vulputate massa rhoncus, ut tincidunt sapien gravida.&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Sed sit amet hendrerit risus, eu interdum leo. Quisque eleifend nisi in nulla dictum, eu pellentesque nisi tristique. Integer in dapibus dolor, at imperdiet mi. Nulla finibus lacus et augue sagittis consectetur vitae id nulla. Ut ornare in tellus sed porttitor. Donec cursus mi eu viverra tempor. Pellentesque quis pharetra neque. Morbi elementum aliquet sapien rutrum elementum. Nulla libero metus, lacinia id risus quis, porta porta erat. Praesent ac aliquam nisi. Aenean pellentesque dolor dolor, dictum molestie nibh tempus in. Sed suscipit varius turpis, id mollis purus dignissim in. Duis at tellus ut odio pharetra placerat ut eu eros.&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nam nisi sem, pulvinar ut nibh eu, rhoncus vehicula velit. Integer aliquam lacus ac nulla accumsan posuere. Maecenas ornare, dui eu ultricies egestas, nibh nisl scelerisque elit, a semper quam neque euismod ipsum. Nunc at lorem molestie, tristique risus sed, luctus tellus. Suspendisse feugiat turpis dignissim tortor malesuada, eu accumsan neque facilisis. Integer in purus congue, placerat massa sed, fringilla neque. Nulla facilisi. In eu sapien vel lorem fringilla pulvinar. Aliquam non feugiat nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam et enim at metus vehicula vulputate.&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nullam sollicitudin urna nec tempus hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec leo lorem, tempus tincidunt interdum placerat, vehicula nec ipsum. Quisque efficitur interdum turpis nec vulputate. Nulla quis leo eros. Cras luctus accumsan volutpat. Quisque tincidunt ut tortor rhoncus interdum. Suspendisse diam lorem, dignissim in mi at, convallis scelerisque diam. Proin sodales justo sed mauris finibus, a convallis nisl iaculis. Nunc vulputate congue tempus. Nunc finibus metus tincidunt, fringilla magna pellentesque, semper magna. Praesent congue nulla ut diam bibendum varius. Donec eros nibh, efficitur ut nunc ut, fringilla egestas mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at varius turpis.&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Donec vel urna eget ligula auctor lobortis. Donec quis risus faucibus nunc blandit ultrices quis a quam. Sed lacinia faucibus nisi. Donec scelerisque justo ut luctus dictum. Pellentesque ullamcorper tempus nibh vel condimentum. Sed eu purus nisi. Sed quis justo quis enim eleifend suscipit. Nulla pellentesque risus vel metus dapibus, ac ultrices ipsum faucibus. Proin nec sem a nisl varius consectetur non id mi.&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', 'Jun Tue 2017', '3:34 PM', 'Immediate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `id` int(11) NOT NULL,
  `page_id` varchar(10) NOT NULL,
  `section_label` varchar(100) NOT NULL,
  `panel_id` varchar(100) NOT NULL,
  `layout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`id`, `page_id`, `section_label`, `panel_id`, `layout`) VALUES
(123, '4', 'Navbar', '1', 'index.php'),
(124, '4', 'About', '2', 'index.php'),
(125, '4', 'Location', '3', 'index.php'),
(126, '4', 'Contact', '4', 'index.php'),
(127, '4', 'Footer', '5', 'index.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `site_title` varchar(100) NOT NULL,
  `site_tagline` text NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `date_format` varchar(50) NOT NULL,
  `time_format` varchar(50) NOT NULL,
  `date_format_custom` varchar(50) NOT NULL,
  `time_format_custom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`site_title`, `site_tagline`, `email_address`, `date_format`, `time_format`, `date_format_custom`, `time_format_custom`) VALUES
('writer', 'hahaha', 'jeromcoco1@gmail.com', 'M D Y', 'g:i A', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `date_registered` varchar(50) NOT NULL,
  `time_registered` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `mobile_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `first_name`, `last_name`, `password`, `user_type`, `date_registered`, `time_registered`, `email_address`, `mobile_number`) VALUES
(2, 'jerom', 'Jerome', 'Coco', '202cb962ac59075b964b07152d234b70', 'Admin', 'May Tue 2017', '9:19 AM', 'jeromcoco1@gmail.cm', '9078651993');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_links`
--
ALTER TABLE `tbl_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page_css`
--
ALTER TABLE `tbl_page_css`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page_js`
--
ALTER TABLE `tbl_page_js`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_panels`
--
ALTER TABLE `tbl_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_links`
--
ALTER TABLE `tbl_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_page_css`
--
ALTER TABLE `tbl_page_css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tbl_page_js`
--
ALTER TABLE `tbl_page_js`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_panels`
--
ALTER TABLE `tbl_panels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
