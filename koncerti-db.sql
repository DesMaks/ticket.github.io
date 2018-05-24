-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 24 2018 г., 10:06
-- Версия сервера: 5.7.21-20
-- Версия PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `koncerti-db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zap`
--

CREATE TABLE `zap` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `price_zone1` varchar(50) NOT NULL,
  `price_zone2` varchar(255) NOT NULL,
  `price_zone3` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_concert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zap`
--

INSERT INTO `zap` (`id`, `title`, `text`, `price_zone1`, `price_zone2`, `price_zone3`, `photo`, `date_concert`) VALUES
(4, 'Концерт 1', 'Этот концерт не отображается на главной странице т.к. он был 23 числа.', '5000', '4000', '2000', 'ticket.site/Admin/photo/.20180524093104.jpg', '2018-05-23 20:00:00'),
(6, 'Концерт2', 'Тестовое описание концерта.', '4000', '3000', '2000', 'ticket.site/Admin/photo/.20180524094709.jpg', '2018-05-31 18:30:00'),
(7, 'Концерт 3', 'цены указаны от 3000 до 1000, но места за 1000 раскупили и отображается от 3000 до 2000.', '3000', '2000', '1000', 'ticket.site/Admin/photo/.20180524094256.jpg', '2018-05-26 13:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `zayavk`
--

CREATE TABLE `zayavk` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payed` varchar(250) NOT NULL,
  `active` varchar(250) NOT NULL,
  `koncert_id` int(11) NOT NULL,
  `places` text NOT NULL,
  `date_adds` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zayavk`
--

INSERT INTO `zayavk` (`id`, `email`, `payed`, `active`, `koncert_id`, `places`, `date_adds`) VALUES
(2, 'sfgf@ff', '1', '1', 12, '4,9;4,10;4,11', '2018-05-18 09:44:06'),
(3, 'qwqw@ds', '1', '1', 12, '9,13;10,3;14,15', '2018-05-18 09:44:23'),
(4, 'sfgf@bv.ru', '1', '1', 12, '12,11', '2018-05-18 10:12:38'),
(5, 'cd@d', '1', '1', 22, '15,10', '2018-05-22 12:42:15'),
(6, 'sdsd@dsd', '1', '1', 21, '15,10', '2018-05-23 09:52:27'),
(19, 'cd@d', '1', '1', 1, '15,11', '2018-05-23 12:23:35'),
(20, 'DSD@dd', '0', '1', 7, '15,1;15,2;15,3;15,4;14,4;14,3;14,2;14,1', '2018-05-24 09:43:19'),
(21, 'ghr@fd', '1', '1', 7, '14,5;14,6;15,6;15,5;15,7;14,7;14,8;15,8;15,9;14,9', '2018-05-24 09:43:34'),
(22, 'ghr@fd', '1', '1', 7, '14,10;15,10;15,11;14,11;14,12;15,12;15,13;14,13;14,14;15,14;15,15;14,15', '2018-05-24 09:43:47'),
(23, 'dgg@f', '1', '1', 7, '14,16;14,17;15,16;14,18;15,18;15,17;15,19;14,19;14,20;15,20', '2018-05-24 09:44:06'),
(24, 'fd@df', '1', '1', 7, '13,1;12,1;11,1;11,2;12,2;13,2;13,3;12,3;11,3;11,4;12,4;13,4;13,5;12,5;11,5;11,6;12,6;13,6;13,7;12,7;11,7;11,8;12,8;13,8;13,9;12,9;11,9;11,10;12,10;13,10;13,11;12,11;11,11;11,12;12,12;13,12;13,13;12,13;11,13;11,14;12,14;13,14;13,15;12,15;11,15;11,16;12,16;13,16;13,17;12,17;11,17;11,18;12,18;13,18;12,19;11,19;11,20;12,20;13,20;13,19', '2018-05-24 09:44:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `zap`
--
ALTER TABLE `zap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`id`);

--
-- Индексы таблицы `zayavk`
--
ALTER TABLE `zayavk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `zap`
--
ALTER TABLE `zap`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `zayavk`
--
ALTER TABLE `zayavk`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
