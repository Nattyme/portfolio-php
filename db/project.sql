-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7
-- Время создания: Июл 21 2024 г., 16:00
-- Версия сервера: 5.7.44
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `avatar_small` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `name`, `surname`, `country`, `city`, `avatar`, `avatar_small`) VALUES
(1, 'admin@admin.ru', 'admin', '$2y$10$6o0vaZdRNfGTBh54sdnkPOxf1t12zot0Y1eF9yNLoL/oBYdS/zjju', 'Admin', 'Adminovich', 'Administration', 'Adminsk', '194556674995.jpg', '48-194556674995.jpg'),
(2, 'user@user.ru', 'user', '$2y$10$c8uuWw01l7yWok.6Caurb.58bLPHSDavDvQJCmA.8jlTcq3ujAG1i', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'user2@user.ru', 'user', '$2y$10$5EuVwpkyVzRP42txA22J1udlgshVlnBzGnrfFQooUkEynC2njDZx.', 'User', 'Userovich', 'Useria', '', NULL, NULL),
(4, 'user3@user.ru', 'user', '$2y$10$y.EVBdyXVSSlp7k82RA3yuWeV2tIbu3rQSliSi3Upg11kxVd3run2', 'Usero', 'Userov', '', '', '769291148340.jpg', '48-769291148340.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
