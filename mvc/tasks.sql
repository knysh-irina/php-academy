-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 07 2017 г., 19:55
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(60) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `user_name`, `email`, `description`, `image`, `done`) VALUES
(1, 'Irina', '123@mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', 'http://localhost/new/mvc/uploads/1.jpg', 1),
(2, 'John', '123@mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', 'http://localhost/new/mvc/uploads/1.jpg', 0),
(3, 'Oleg', '123@mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', 'http://localhost/new/mvc/uploads/1.jpg', 0),
(4, 'Vania', '123@mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', 'http://localhost/new/mvc/uploads/1.jpg', 0),
(5, 'Kolia', '2$mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', '1.jpg', 0),
(6, 'Lika', '2$mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', '1.jpg', 0),
(7, 'Luyda', '2$mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', '1.jpg', 0),
(8, 'Dmitriy', '2$mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', '1.jpg', 0),
(9, 'Lora', '2$mail.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione delectus quasi reiciendis at libero, architecto tempora, minus illo. Culpa explicabo, voluptatem, cumque porro nobis distinctio nam error temporibus consequatur cupiditate?', '1.jpg', 0),
(10, 'fff', 'oleyniktsirina@gmail.com', 'dfgdfg', 'http://localhost/new/mvc/uploads/user.png', 0),
(11, 'Ira', 'sdfd@mail.ru', 'jnkjbj', '/new/mvc/uploads/3.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
