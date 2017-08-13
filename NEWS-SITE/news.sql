-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 13 2017 г., 10:17
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `recomment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `text`, `points`, `date`, `recomment`) VALUES
(1, 1, 4, 'Its very interesting article', 3, '0000-00-00', 0),
(2, 1, 4, 'Cool I loved it', 2, '2017-08-12', 0),
(3, 2, 1, 'Wow Im shoked', 1, '0000-00-00', 0),
(4, 2, 2, 'Wow Im shoked nononon', 0, '2017-08-12', 0),
(5, 1, 3, 'Wow Im shoked', 0, '2017-08-12', 0),
(6, 1, 4, 'Lorem ipsum dolor', 10, '2017-08-12', 0),
(7, 3, 5, 'Wow Im shoked', 2, '0000-00-00', 0),
(8, 1, 6, 'Wow Im shoked', 5, '0000-00-00', 0),
(9, 3, 7, 'Wow Im shoked', 1, '0000-00-00', 0),
(10, 1, 8, 'Lorem ipsum dolor', 20, '0000-00-00', 0),
(11, 4, 9, 'Wow Im shoked', 0, '0000-00-00', 0),
(12, 4, 10, 'Wow Im shoked', 0, '0000-00-00', 0),
(13, 5, 1, 'rngjerngjek', 1, '0000-00-00', 0),
(14, 1, 5, 'dngklnhklr', 0, '0000-00-00', 0),
(16, 1, 1, 'lsdngjkdnbgkj', 0, '0000-00-00', 0),
(18, 1, 1, '.dngkrlg', 2, '0000-00-00', 0),
(19, 1, 2, 'Усе буде добре!!', 0, '0000-00-00', 4),
(20, 1, 1, 'Я так не вважаю!', 0, '0000-00-00', 3),
(21, 1, 5, 'I cant beliave it!', 0, '0000-00-00', 7),
(23, 1, 1, 'fkfkf', 0, '0000-00-00', 3),
(24, 1, 1, 'fflflf', 0, '0000-00-00', 3),
(25, 6, 6, 'jkbjk', 0, '0000-00-00', 0),
(26, 6, 6, 'jjkjlk', 0, '0000-00-00', 0),
(27, 6, 6, 'fkfkfk', 0, '0000-00-00', 0),
(28, 6, 6, 'fkfkfk', 0, '0000-00-00', 0),
(29, 6, 6, 'fkfkfk', 0, '0000-00-00', 0),
(30, 6, 1, 'kfkfkf', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `analitics` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `user_id`, `section`, `name`, `content`, `date`, `image`, `analitics`) VALUES
(1, 1, 'Економіка', 'В Україні хочуть збирати персональні дані усіх мобільних абонентів', ' \n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\n', '2017-08-07', '1.jpg', 1),
(2, 2, 'Економіка', 'Кабмін запустив підготовку до конкурсу з видачі ліцензій 4G, в планах заробити на цьому 6 млрд', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-07', '2.jpg', 1),
(3, 3, 'Економіка', 'Україна отримала змогу закуповувати зброю у Чехії, – посол', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-03', '3.jpg', NULL),
(4, 4, 'Економіка', 'Бальчун у прощальному пості похвалився здобутками «Укрзалізниці»', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-04', '4.jpg', NULL),
(5, 5, 'Економіка', ' Осучаснення» пенсій: хто і яку надбавку отримає', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-05', '5.jpg', NULL),
(6, 1, 'Події', 'Стала відомою доля українських заробітчан у Фінляндії', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '6.jpg', NULL),
(7, 2, 'Події', ' На будівництві «стіни Яценюка» розікрали 16 мільйонів гривень', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '7.jpg', NULL),
(8, 3, 'Події', ' Громадянин Росії намагався вивезти з України старовинні книги та марки 9', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '8.jpg', 1),
(9, 4, 'Події', '  На Донбасі командування РФ складає «чорні списки» бойовиків, – розвідка', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '9.jpg', NULL),
(10, 5, 'Події', 'Росія заборонила рух суден через Керченську протоку', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '10.jpg', NULL),
(11, 1, 'Людина', 'Українські археологи знайшли скіфську амазонку', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-01', '11.jpg', NULL),
(12, 2, 'Людина', 'Багато моїх побратимів загинули за українську пісню, – Дворський', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-05', '12.jpg', NULL),
(13, 3, 'Людина', 'Маємо, зціпивши зуби, творити українську музику, – Дворський', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-05', '13.jpg', 1),
(14, 4, 'Людина', 'На кінофестивалі в Локарно відбулася світова прем’єра українсько-італійського фільму «Ізі»', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-05', '14.jpg', NULL),
(15, 5, 'Людина', 'Безвізом скористалося майже 170 тисяч українців', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-05', '15.jpg', NULL),
(16, 1, 'Світ', 'Хорватський острів Хвар вимагає від туристів дотримуватися норм поведінки', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-02', '16.jpg', 1),
(17, 2, 'Світ', 'Наїзд на військових у Франції назвали спланованим актом', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-01', '17.jpg', NULL),
(18, 3, 'Світ', 'У столиці Чорногорії пролунав вибух у бізнес-центрі', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-01', '18.jpg', NULL),
(19, 4, 'Світ', 'Поблизу Парижа автомобіль в’їхав у групу французьких військових', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-01', '19.jpg', NULL),
(20, 5, 'Світ', 'У столиці Грузії спалахнула лісова пожежа', '\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, beatae officia quas error qui cupiditate a, magnam asperiores earum harum delectus itaque totam molestiae provident nam. Soluta a aliquam voluptatum?</div>\r\n<div>Aliquam est maxime optio quis, voluptates neque harum dolorum dolorem perspiciatis enim perferendis quam similique. Voluptas obcaecati deserunt deleniti, sint aut esse labore provident. Dolore nam nihil quisquam aliquam ut.</div>\r\n<div>Harum veritatis perspiciatis mollitia accusantium, placeat? Perspiciatis minima temporibus earum placeat nesciunt ullam qui ipsa. Animi dicta similique ratione ad repellendus numquam minima velit tempore eaque, sapiente, excepturi placeat quisquam.</div>\r\n<div>Voluptatibus alias rerum fuga consectetur velit, pariatur, maxime deleniti, id dicta laudantium libero! At quod praesentium, rerum ad temporibus? Vero nisi fuga consequuntur delectus similique incidunt voluptatem saepe molestias voluptatibus?</div>\r\n', '2017-08-01', '20.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `comments_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `comments_count`) VALUES
(1, 'John', 'sdfd@mail.ru', '1111', 15),
(2, 'Jack', 'ndff@gfg', '3434', 2),
(3, 'Maria', 'ndff@gfg', '3535', 2),
(4, 'Ira', 'ndff@gfbkjkjj', 'njknj', 2),
(5, 'Klara', 'ndff@gfbkjkjjjkljk', '78687', 1),
(6, 'admin', 'admin', '1234', 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
