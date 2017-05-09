-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2017 г., 21:16
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dogs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `full name` varchar(14) NOT NULL,
  `name` varchar(10) NOT NULL,
  `breed` varchar(10) NOT NULL,
  `pedigree number` int(11) NOT NULL,
  `hallmark number` int(11) NOT NULL,
  `chip number` int(11) NOT NULL,
  `date of the last vaccination against rabies` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `dogs`
--

INSERT INTO `dogs` (`id`, `full name`, `name`, `breed`, `pedigree number`, `hallmark number`, `chip number`, `date of the last vaccination against rabies`) VALUES
(1, 'Jessy Joe', 'Jessy', 'duberman', 1234, 35546, 46465, '2017-05-03'),
(3, 'Bekie Marvel', 'Bekie', 'haskey', 234234, 46456, 353534, '2017-05-01'),
(4, 'Bekie Marvel', 'Bekie', 'haskey', 234234, 46456, 353534, '2017-05-01'),
(6, 'Santa Claus', 'Santa', 'labrador', 654654, 46356, 4646, '2017-05-01'),
(7, 'Diksi Mur', 'Diksi', 'duberman', 5354, 35345345, 3545345, '2017-05-01'),
(9, 'Diksi Mur', 'Diksi', 'duberman', 5354, 35345345, 3545345, '2017-05-01'),
(11, 'Diksi Mur', 'Diksi', 'duberman', 5354, 35345345, 3545345, '2017-05-01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
