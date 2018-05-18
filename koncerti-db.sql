-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 18 2018 г., 10:13
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
(12, 'Би-2', 'Альтернативная рок-группа, образованная в 1988 году в Бобруйске. Основатели и бессменные участники - Шура Би-2 и Лёва Би-2. В состав команды также входят: Андрей Звонков; Макс Лакмус; Борис Лифшиц; Ян Николенко. В данный момент Би-2 завершили работу над десятым студийным альбомом &quot;Горизонт событий&quot;.', '3000', '2400', '1600', 'ticket.site/Admin/photo/20180518094124.jpg', '2018-05-24 23:00:00'),
(13, 'Руки вверх', 'Российская музыкальная поп-группа. До августа 2006 года состояла из Сергея Жукова и Алексея Потехина. После Сергей Жуков решил остаться один вместе с официальным названием группы.', '2400', '2000', '1800', 'ticket.site/Admin/photo/20180518094316.jpg', '2018-05-27 20:00:00');

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
  `name_concert` varchar(255) NOT NULL,
  `places` text NOT NULL,
  `date_adds` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zayavk`
--

INSERT INTO `zayavk` (`id`, `email`, `payed`, `active`, `koncert_id`, `name_concert`, `places`, `date_adds`) VALUES
(2, 'sfgf@ff', '1', '1', 12, 'Би-2', '4,9;4,10;4,11', '2018-05-18 09:44:06'),
(3, 'qwqw@ds', '1', '1', 12, 'Би-2', '9,13;10,3;14,15', '2018-05-18 09:44:23'),
(4, 'sfgf@bv.ru', '1', '1', 12, 'Би-2', '12,11', '2018-05-18 10:12:38');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `zayavk`
--
ALTER TABLE `zayavk`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
