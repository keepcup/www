-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 04 2014 г., 23:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `instabudka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `password`, `login`) VALUES
(1, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `title_small` text NOT NULL,
  `date` text NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `gallery_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `title_small`, `date`, `img`, `text`, `gallery_id`) VALUES
(1, 'Новейшее', 'мероприятие', '05.12', '../images/blog/images/0194c8fcffca.jpg', 'Выезд профессиональных фотографов на ваш праздник – свадьбу, корпоратив или другое событие\r\n• Фотосъемка со студийным освещением и оборудованием\r\n• Мгновенная печать фотоснимков размера 15х20 или 10х15\r\n• При желании нанесение логотипа или любой надписи на фотографи', '12'),
(2, 'Аренда', 'инстабудки', '02.08', '../images/blog/images/a418664b3851.jpg', 'Арендовав инстабудку, вы подарите себе, своим друзьям и близким или же просто вашим гостям возможность отлично провести время, повеселиться от души и потом унести эти радостные воспоминания у себя в кармане.', '5'),
(3, 'Интерактивная стойка', 'удобно и быстро', '08.07', '../images/blog/images/9fa9ea440d7e.jpg', 'Интерактивная стойка для быстрого и удобного размещения фото в социальных сетях Facebook, Twitter, а также отправка на  e-mail и MMS. \r\nЭто новшество позволит вам и вашим гостям делиться своими снимками из фотобудки\r\nс друзьями за считанные секунды.', '10');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `gallery_id` text NOT NULL,
  `main_position` int(255) NOT NULL,
  `contacts_position` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `img`, `gallery_id`, `main_position`, `contacts_position`) VALUES
(15, 'Intel', '../images/clients/a8dd8ec5825a.png', '12', 1, 1),
(16, 'Kia', '../images/clients/046d5c88a1f2.png', '12', 2, 2),
(17, 'Fuse', '../images/clients/3fc8eb8cb94d.png', '12', 3, 3),
(18, 'Loreal', '../images/clients/4973e8bc107c.png', '12', 4, 4),
(19, 'mtv', '../images/clients/7478f78d31ba.png', '12', 5, 5),
(20, 'Acer', '../images/clients/16d80bad8760.png', '12', 6, 6),
(21, 'mercedes', '../images/clients/ae70e2915b94.png', '12', 7, 7),
(22, 'innova', '../images/clients/79e5bdbe03e9.png', '12', 8, 8),
(23, 'paypal', '../images/clients/9d725091b51c.png', '12', 9, 9),
(24, 'московская весна', '../images/clients/113cfac6d082.png', '12', 10, 10),
(25, 'dreamhouse', '../images/clients/9651b803d428.png', '12', 11, 11),
(26, 'euromag', '../images/clients/52dd1909a5b9.png', '12', 12, 12),
(27, 'съезд волонтёров', '../images/clients/ad5e9e821146.png', '12', 13, 13),
(28, 'RemyMartin', '../images/clients/c941b44dbdf3.png', '12', 14, 14),
(29, 'samsung', '../images/clients/e104939307ec.png', '12', 15, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vk` text NOT NULL,
  `fb` text NOT NULL,
  `insta` text NOT NULL,
  `tw` text NOT NULL,
  `mail` text NOT NULL,
  `phone1` text NOT NULL,
  `phone2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `vk`, `fb`, `insta`, `tw`, `mail`, `phone1`, `phone2`) VALUES
(1, 'https://vk.com/instabudka', 'https://www.facebook.com/instabudka', 'https://instagram.com', 'https://twitter.com', 'info@instabudka.ru', '+7 (906) 098 26 93', '+7 (916) 034 62 54');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `title_small` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `photo_preview` text NOT NULL,
  `private` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url_name` text NOT NULL,
  `file_name` text NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `title_small`, `date`, `photo`, `photo_preview`, `private`, `password`, `url_name`, `file_name`, `position`) VALUES
(5, 'Well!', 'Done/', '22.12', '', '', 0, '', 'Well-Done-2212', '', '1,2,3,4,5,6,7,8'),
(10, 'Всё было', 'отлично', '05.09', '', '', 0, '', 'vs-bylo-otlichno-0509', '', '1'),
(12, 'Отлично', 'провели время', '01.08', '', '', 0, '', 'otlichno-proveli-vremya-0108', '', '1,2,3,4,5,6');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_img`
--

CREATE TABLE IF NOT EXISTS `gallery_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `img_preview` text NOT NULL,
  `gallery_id` int(255) NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `gallery_img`
--

INSERT INTO `gallery_img` (`id`, `img`, `img_preview`, `gallery_id`, `position`) VALUES
(3, '../images/gallery/images/07f55f83a3ee.jpg', '../images/gallery/images/preview_07f55f83a3ee.jpg', 5, '1'),
(4, '../images/gallery/images/9710f578199b.jpg', '../images/gallery/images/preview_9710f578199b.jpg', 5, '2'),
(5, '../images/gallery/images/2a4d1488357d.jpg', '../images/gallery/images/preview_2a4d1488357d.jpg', 5, '3'),
(6, '../images/gallery/images/6ef8356ee91b.jpg', '../images/gallery/images/preview_6ef8356ee91b.jpg', 5, '4'),
(7, '../images/gallery/images/803d399b0d53.jpg', '../images/gallery/images/preview_803d399b0d53.jpg', 5, '5'),
(8, '../images/gallery/images/28a7f4d1e3b8.jpg', '../images/gallery/images/preview_28a7f4d1e3b8.jpg', 5, '6'),
(9, '../images/gallery/images/18bc4c859a16.jpg', '../images/gallery/images/preview_18bc4c859a16.jpg', 5, '7'),
(10, '../images/gallery/images/71a70c9b8967.jpg', '../images/gallery/images/preview_71a70c9b8967.jpg', 5, '8'),
(11, '../images/gallery/images/cdfe8a195cac.jpg', '../images/gallery/images/preview_cdfe8a195cac.jpg', 10, '1'),
(12, '../images/gallery/images/917bee5a7410.jpg', '../images/gallery/images/preview_917bee5a7410.jpg', 12, '1'),
(13, '../images/gallery/images/9573f6dc2879.jpg', '../images/gallery/images/preview_9573f6dc2879.jpg', 12, '2'),
(14, '../images/gallery/images/748e8c38eca4.jpg', '../images/gallery/images/preview_748e8c38eca4.jpg', 12, '3'),
(15, '../images/gallery/images/b5ecbafaeff0.jpg', '../images/gallery/images/preview_b5ecbafaeff0.jpg', 12, '4'),
(16, '../images/gallery/images/79d6d4eb5e77.jpg', '../images/gallery/images/preview_79d6d4eb5e77.jpg', 12, '5'),
(17, '../images/gallery/images/ac187d2d228e.jpg', '../images/gallery/images/preview_ac187d2d228e.jpg', 12, '6');

-- --------------------------------------------------------

--
-- Структура таблицы `insta`
--

CREATE TABLE IF NOT EXISTS `insta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `insta`
--

INSERT INTO `insta` (`id`, `img`) VALUES
(1, '../images/instabudka/insta_1.jpg'),
(2, '../images/instabudka/insta_2.jpg'),
(3, '../images/instabudka/insta_3.jpg'),
(4, '../images/instabudka/insta_4.jpg'),
(5, '../images/instabudka/insta_5.jpg'),
(6, '../images/instabudka/insta_6.jpg'),
(7, '../images/instabudka/insta_7.jpg'),
(8, '../images/instabudka/insta_8.jpg'),
(9, '../images/instabudka/insta_9.jpg'),
(10, '../images/instabudka/insta_10.jpg'),
(11, '../images/instabudka/insta_11.jpg'),
(12, '../images/instabudka/insta_12.jpg'),
(13, '../images/instabudka/insta_13.jpg'),
(14, '../images/instabudka/insta_14.jpg'),
(15, '../images/instabudka/insta_15.jpg'),
(16, '../images/instabudka/insta_16.jpg'),
(17, '../images/instabudka/insta_17.jpg'),
(18, '../images/instabudka/insta_18.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `main_slider`
--

CREATE TABLE IF NOT EXISTS `main_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `main_slider`
--

INSERT INTO `main_slider` (`id`, `img`, `position`) VALUES
(28, '../images/index/mainslider/4962dbf03e61.jpg', '2'),
(29, '../images/index/mainslider/ab27c574b760.jpg', '1'),
(31, '../images/index/mainslider/4ff578fea506.jpg', '3'),
(32, '../images/index/mainslider/573846b7480d.jpg', '4');

-- --------------------------------------------------------

--
-- Структура таблицы `photography`
--

CREATE TABLE IF NOT EXISTS `photography` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `img_preview` text NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Дамп данных таблицы `photography`
--

INSERT INTO `photography` (`id`, `img`, `img_preview`, `position`) VALUES
(49, '../images/photography/e36b3b2e23e1.jpg', '../images/photography/preview_e36b3b2e23e1.jpg', '1'),
(50, '../images/photography/3b0ce3eb22fb.jpg', '../images/photography/preview_3b0ce3eb22fb.jpg', '2'),
(51, '../images/photography/bd2354f27160.jpg', '../images/photography/preview_bd2354f27160.jpg', '4'),
(52, '../images/photography/e38f9b26573c.jpg', '../images/photography/preview_e38f9b26573c.jpg', '3'),
(53, '../images/photography/5f4c7a59384e.jpg', '../images/photography/preview_5f4c7a59384e.jpg', '5'),
(54, '../images/photography/962577cabd56.jpg', '../images/photography/preview_962577cabd56.jpg', '6'),
(55, '../images/photography/e6a419e0383c.jpg', '../images/photography/preview_e6a419e0383c.jpg', '7'),
(56, '../images/photography/b451acb11372.jpg', '../images/photography/preview_b451acb11372.jpg', '8'),
(57, '../images/photography/ae5edf163382.jpg', '../images/photography/preview_ae5edf163382.jpg', '9'),
(58, '../images/photography/88c1184d0f1d.jpg', '../images/photography/preview_88c1184d0f1d.jpg', '11');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mainSlider` text NOT NULL,
  `mainClients` text NOT NULL,
  `photography` text NOT NULL,
  `gallery` text NOT NULL,
  `contactsClients` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `mainSlider`, `mainClients`, `photography`, `gallery`, `contactsClients`) VALUES
(1, '1,2,3,4', '14,13,12,11,10,9,8,7,6,5,4,3,2,1', '1,2,3,4,5,6,7,8,9,10,11', '', '14,13,12,11,10,9,8,7,6,5,4,3,2,1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
