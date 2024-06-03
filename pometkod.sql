-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2024 г., 14:25
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pometkod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `problems`
--

CREATE TABLE `problems` (
  `id` int NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `oborud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `neispravnost` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `opisanie` text COLLATE utf8mb4_general_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` set('в ожидании','в работе','выполнено') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'в ожидании',
  `date_end` timestamp NULL DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_worker` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `problems`
--

INSERT INTO `problems` (`id`, `date_start`, `oborud`, `neispravnost`, `opisanie`, `fio`, `status`, `date_end`, `id_user`, `id_worker`) VALUES
(1, '2024-04-08 09:51:17', '', '', 'не работает', 'Стегалин Н.С.', 'выполнено', '2024-04-08 10:58:23', 1, NULL),
(2, '2024-04-08 09:52:48', '', '', 'сломалось', 'Козяр Н.Д.', 'в ожидании', NULL, 2, NULL),
(3, '2024-04-08 10:50:14', '', '', 'tre', 'rt', 'в ожидании', NULL, 10, NULL),
(4, '2024-04-08 10:56:08', '', '', 'ckjvfkjcm', 'rt', 'в ожидании', NULL, 10, NULL),
(5, '2024-04-08 11:06:15', '', '', '09лшо-0шол9', 'rt', 'в ожидании', NULL, 10, NULL),
(6, '2024-04-08 11:07:24', '', '', 'iii', 'rt', 'в ожидании', NULL, 10, NULL),
(7, '2024-04-08 11:09:07', '', '', 'kjnblkjn', 'rt', 'в ожидании', NULL, 10, NULL),
(8, '2024-04-08 11:10:42', '', '', 'iubhno', 'rt', 'в ожидании', NULL, 10, NULL),
(9, '2024-04-08 11:13:36', '', '', 'knmp', 'rt', 'в ожидании', NULL, 10, NULL),
(10, '2024-04-08 11:14:17', '', '', 'njp-iom', 'rt', 'в ожидании', NULL, 10, NULL),
(11, '2024-04-08 11:17:28', 'Ноутбук', 'iii', 'iii', 'rt', 'в ожидании', NULL, 10, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status`) VALUES
(1, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 1),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', 1),
(3, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 1),
(4, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 1),
(5, 'user5', '0a791842f52a0acfbb3a783378c066b8', 1),
(6, 'user6', 'affec3b64cf90492377a8114c86fc093', 1),
(7, 'worker1', 'ebad64149cc767ba26ef069819279fd5', 2),
(8, 'worker2', '01925b7892e2ca194993afdd20a7c761', 2),
(9, 'worker3', 'b504f5a746deafd3e78b9c85c20ca653', 2),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_worker` (`id_worker`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `problems`
--
ALTER TABLE `problems`
  ADD CONSTRAINT `problems_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `problems_ibfk_2` FOREIGN KEY (`id_worker`) REFERENCES `workers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
