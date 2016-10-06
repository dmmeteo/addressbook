-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2016 г., 19:39
-- Версия сервера: 5.5.50
-- Версия PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `addressbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `title`, `country_id`) VALUES
(1, 'New York', 'USA'),
(2, 'California', 'USA'),
(3, 'Kiev', 'Ukraine'),
(4, 'Odessa', 'Ukraine'),
(5, 'Toronto', 'Canada'),
(6, 'Ottawa', 'Canada');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `title`) VALUES
(1, 'USA'),
(2, 'Ukraine'),
(3, 'Canada');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `country`, `city`, `photo`, `note`) VALUES
(1, 'John', 'Doe', 'john@doe.com', 'USA', 'California', '1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis harum, saepe! Fuga ipsa asperiores iusto consequuntur, aut dicta nam minima. Earum quidem reiciendis laborum consequatur, architecto et repellat quibusdam sed.'),
(2, 'Vasya', 'Pupkin', 'vasya@pupkin.ua', 'Ukraine', 'Odessa', '2.png', 'Numquam eos rerum, inventore deserunt eius illo nam adipisci dolor voluptatibus, incidunt, maiores consectetur amet. Laudantium dicta quidem praesentium tempora aliquam nulla reprehenderit sint eum impedit blanditiis, expedita, earum! Delectus.'),
(3, 'Anna', 'Son', 'anna@son.com', 'Canada', 'Toronto', '3.png', 'Natus voluptatem aliquid, quia assumenda totam expedita inventore neque illum perferendis culpa deleniti at magnam sunt provident, nisi unde, accusantium cupiditate! Dignissimos, molestias, animi! Nihil, quis nam labore cum repellendus.'),
(4, 'Bob', 'Mac', 'bob@mac.com', 'USA', 'New York', '4.png', 'Quidem culpa sunt veniam, voluptatibus, laboriosam sapiente ullam quaerat delectus quia sit dolores soluta odit similique, atque repellat beatae exercitationem mollitia. Porro adipisci repellat amet, inventore enim. Quis, consectetur, ipsum?'),
(12, 'Forest', 'Gump', 'forest@gump.com', 'USA', 'California', 'Forrest-Gump-74.jpg', ''),
(16, 'Cenny', 'McCormick', 'сenny@die.true', 'USA', 'South Park', '200px-Kenny.png', 'Magni repellendus minus, necessitatibus distinctio delectus facere, nulla officia reprehenderit, harum provident ipsam. Assumenda enim repellat earum, dignissimos in fugiat nisi quaerat laboriosam, reprehenderit quis. Amet reprehenderit perspiciatis voluptas rem.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
