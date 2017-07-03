-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 01:29 AM
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
  `post_id` varchar(10) NOT NULL,
  `comment_author` varchar(50) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_content` text NOT NULL
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
(5, 'home', '4', 'home'),
(8, 'bloglisting', '6', 'list');

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
(4, 'home', 'home', 'home								\n						', 'home							\n						'),
(6, 'list', 'list', 'list								\n						', 'listing								\n						');

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
(121, '4', '5', 'footer.css'),
(148, '6', '1', 'bootstrap.css'),
(149, '6', '2', 'bootstrap.min.css'),
(150, '6', '3', 'navbar.css'),
(151, '6', '4', 'footer.css'),
(152, '6', '5', 'index-style.css'),
(153, '6', '6', 'font-awesome.css');

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
(74, '4', '3', 'bootstrap.min.js'),
(93, '6', '1', 'jquery-3.1.1.min.js'),
(94, '6', '2', 'bootstrap.js'),
(95, '6', '3', 'bootstrap.min.js');

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
(1, 'navbar', '&lt;nav&gt; &lt;ul id=&quot;navbar&quot;&gt; &lt;a class=&quot;navbar-link&quot; href=&quot;../../official/index/home&quot;&gt;&lt;li&gt;Home&lt;/li&gt;&lt;/a&gt; &lt;a class=&quot;navbar-link&quot; href=&quot;../../official/blogs/list&quot;&gt;&lt;li&gt;Blogs&lt;/li&gt;&lt;/a&gt; &lt;/ul&gt; &lt;/nav&gt;'),
(2, 'about', '&lt;h2&gt;About Us&lt;/h2&gt; &lt;br/&gt; &lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/monitor.png&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/blogging.png&quot;&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;img class=&quot;icons&quot; src=&quot;/../localhost/../../img/reading-glasses.png&quot;&quot;&gt; &lt;br/&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc gravida vitae ante sit amet sollicitudin. Nullam bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. &lt;/div&gt; &lt;/div&gt;'),
(3, 'location', '&lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;br/&gt; &lt;h2&gt;Visit Our Location&lt;/h2&gt; &lt;br/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;div id=&quot;googleMap&quot; style=&quot;width:100%;height:400px;&quot;&gt;&lt;/div&gt; &lt;script&gt; function myMap() {var mapProp= {center:new google.maps.LatLng(14.7559869,121.0471342),zoom:12, }; var map=new google.maps.Map(document.getElementById(&quot;googleMap&quot;),mapProp); } &lt;/script&gt; &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=AIzaSyBqCLySQLspygtFiDU4NcjAvGlYA8SdC0E&amp;callback=myMap&quot;&gt;&lt;/script&gt; &lt;/div&gt; &lt;/div&gt;'),
(4, 'contact', '&lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-12&quot;&gt; &lt;br/&gt; &lt;h2&gt;Contact Us&lt;/h2&gt; &lt;br/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; Your Name &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Full Name...&quot;/&gt; &lt;br/&gt; Email Address &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;sample@example.com...&quot;/&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-8&quot;&gt; Message &lt;textarea style=&quot;width:100%;height:122px;&quot; class=&quot;form-control&quot;&gt;&lt;/textarea&gt; &lt;br/&gt; &lt;input style=&quot;float:right;&quot; type=&quot;button&quot; class=&quot;btn btn-primary&quot; value=&quot;Send Message&quot;/&gt; &lt;/div&gt; &lt;/div&gt;'),
(5, 'footer', '&lt;footer&gt; &lt;div class=&quot;container&quot;&gt; &lt;div class=&quot;row&quot;&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;More About Writer&lt;/h4&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt nibh eu diam malesuada tempus vel nec velit. Suspendisse potenti. &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;Visit Our Pages&lt;/h4&gt;&lt;br/&gt; &lt;a href=&quot;../../../../facebook.com&quot; target=&quot;_blank&quot;&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;../../img/facebook.png&quot;&gt;&amp;nbsp; &lt;/a&gt; &lt;a href=&quot;../../../../twitter.com&quot; target=&quot;_blank&quot;&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;../../img/twitter.png&quot;&gt;&amp;nbsp; &lt;/a&gt; &lt;a href=&quot;../../../../gmail.com&quot; target=&quot;_blank&quot;&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;../../img/gmail.png&quot;&gt;&amp;nbsp; &lt;/a&gt; &lt;a href=&quot;../../../../instagram.com&quot; target=&quot;_blank&quot;&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;../../img/instagram.png&quot;&gt;&amp;nbsp; &lt;/a&gt; &lt;a href=&quot;../../../../youtube.com&quot; target=&quot;_blank&quot;&gt; &lt;img class=&quot;iconfoot&quot; src=&quot;../../img/youtube.png&quot;&gt; &lt;/a&gt; &lt;/div&gt; &lt;div class=&quot;col-sm-4&quot;&gt; &lt;br/&gt; &lt;h4&gt;Writer &lt;?php echo date(&quot;Y&quot;);?&gt; &amp;copy;&lt;/h4&gt; All rights reserved. &lt;/div&gt; &lt;/div&gt; &lt;/div&gt; &lt;/footer&gt;');

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
  `post_status` varchar(50) NOT NULL,
  `post_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `author_name`, `post_title`, `post_content`, `date_posted`, `time_posted`, `post_status`, `post_url`) VALUES
(6, 'jerom', 'What is Lorem Ipsum', '&lt;p style=&quot;text-align: justify;&quot;&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 'Jun Thu 2017', '8:14 AM', 'Immediate', 'What-is-Lorem-Ipsum'),
(7, 'jerom', 'Why do we use it', '&lt;p style=&quot;text-align: justify;&quot;&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', 'Jun Thu 2017', '8:19 AM', 'Immediate', 'Why-do-we-use-it'),
(8, 'jerom', 'Where can I get some', '&lt;p style=&quot;text-align: justify;&quot;&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.hjhohhnon&lt;/p&gt;', 'Jun Thu 2017', '8:20 AM', 'Immediate', 'Where-can-I-get-some'),
(9, 'jerom', 'Where does it come froms', '&lt;p style=&quot;text-align: justify;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;', 'Jun Thu 2017', '8:21 AM', 'Immediate', 'Where-does-it-come-from'),
(10, 'jerom', 'Lorem Ipsum', '&lt;p style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus venenatis aliquam dignissim. Cras hendrerit ornare tempus. In convallis hendrerit nibh, fringilla facilisis lectus ullamcorper ut. Vivamus nulla nunc, vestibulum quis fringilla id, maximus non felis. Suspendisse sollicitudin elementum sem, ac dignissim leo. Ut lobortis lectus a eros aliquet vulputate. Nunc commodo quam nunc, quis tincidunt nisl venenatis sed. Aliquam et justo ullamcorper tortor sagittis viverra. Nam ut sagittis lorem. Vivamus egestas neque a lacus malesuada dapibus vel vitae tortor. Ut auctor est vel dolor ultrices tempor. Praesent malesuada a nisi at ullamcorper. Donec non erat non orci accumsan vehicula sed vitae leo. Mauris ornare, diam nec tempus aliquet, sem lectus vestibulum mi, at vestibulum magna nisl eu sem.&lt;/p&gt;\n&lt;div id=&quot;Content&quot;&gt;\n&lt;div class=&quot;boxed&quot;&gt;\n&lt;div id=&quot;lipsum&quot;&gt;\n&lt;ul style=&quot;list-style-type: square;&quot;&gt;\n&lt;li style=&quot;text-align: justify;&quot;&gt;Duis quam libero, convallis eu sollicitudin vitae, eleifend id erat. Proin quis ex mauris. Sed accumsan orci non erat malesuada pharetra. Phasellus gravida odio sit amet eros efficitur rhoncus. Suspendisse et nisi mi. Ut a justo nec justo convallis mattis. Cras eu purus euismod, iaculis orci eu, porta velit. Nullam congue venenatis diam, quis vulputate leo. Duis at fringilla ligula. Suspendisse nec magna ex. Phasellus ex erat, tempor eu erat et, mattis pulvinar nulla. Sed ligula est, mollis pulvinar tristique eget, varius iaculis risus. Integer nec dolor rutrum, ornare ligula at, placerat dui. Maecenas sed nisi orci. Ut at ornare nibh.&lt;/li&gt;\n&lt;li style=&quot;text-align: justify;&quot;&gt;Ut at elit sit amet metus dignissim aliquam sodales ac augue. Sed eleifend, dolor non lacinia cursus, erat erat tincidunt nulla, lobortis placerat erat nulla non nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla eget tempor elit. Suspendisse efficitur ligula eu elit convallis, vitae ullamcorper risus sodales. Vivamus lacinia ex ac nisl viverra, porttitor varius sem dictum. Fusce vel efficitur turpis. Phasellus at hendrerit ante. Aliquam a felis at metus maximus pharetra. Nullam sagittis augue sed feugiat volutpat. Suspendisse finibus, libero sed iaculis rutrum, massa massa tincidunt risus, ut auctor risus tortor ac enim. Proin maximus bibendum magna at luctus. Integer et dui volutpat augue vulputate aliquet. Proin maximus eleifend metus eu gravida. Duis suscipit purus quis nunc viverra, et rutrum mauris commodo.&lt;/li&gt;\n&lt;li style=&quot;text-align: justify;&quot;&gt;Maecenas scelerisque quam sagittis, faucibus elit ut, ultrices ipsum. Maecenas imperdiet mauris eu lorem facilisis porta. Proin venenatis purus id ipsum condimentum blandit. Duis et tempor urna, nec condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam feugiat feugiat felis, nec dapibus diam varius vel. Quisque lacinia cursus ligula, at pretium ante ullamcorper et. Vivamus eget rutrum justo. Vivamus rutrum quis mi eu dignissim. Pellentesque nec massa urna.&lt;/li&gt;\n&lt;li style=&quot;text-align: justify;&quot;&gt;Nullam et laoreet mi, a malesuada mauris. Integer sed nulla mi. Sed ullamcorper eros sed rutrum pulvinar. Nam aliquet finibus neque, dapibus lobortis urna vehicula vel. Duis nec enim neque. Mauris ullamcorper sollicitudin eros, sit amet porta augue dignissim nec. Sed nisl neque, rhoncus eget ultricies at, aliquet quis nisi. Vestibulum eget nibh et massa lacinia finibus et a sem. Nam eu aliquet lacus, at tempor libero. Vivamus ac libero et justo rutrum venenatis eu sed mauris. Morbi molestie facilisis elit. Sed interdum non libero posuere hendrerit.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;', 'Jun Thu 2017', '8:24 AM', 'Immediate', 'Lorem-Ipsum');

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
(127, '4', 'Footer', '5', 'index.php'),
(142, '6', 'Navbar', '1', 'blogs.php'),
(143, '6', 'Footer', '5', 'blogs.php');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_page_css`
--
ALTER TABLE `tbl_page_css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `tbl_page_js`
--
ALTER TABLE `tbl_page_js`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tbl_panels`
--
ALTER TABLE `tbl_panels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
