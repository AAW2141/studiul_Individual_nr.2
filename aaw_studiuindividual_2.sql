-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 09 2024 г., 22:54
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aaw_studiuindividual_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(8, 'Prima Sectiune', 'Obiectivele reprezintă rezultatele dorite pe care o afacere sau un proiect intenționează să le atingă într-un anumit interval de timp. Ele sunt esențiale pentru a ghida activitățile, a măsura succesul și a mobiliza resursele necesare.', '2024-12-09 19:58:49', '2024-12-09 19:58:49'),
(9, 'A doua sectiune', 'In concluzie, afacerea de închiriere a bicicletelor și trotinetelor electrice este o oportunitate viabilă de a satisface nevoile de mobilitate urbană ecologică și accesibilă. Având ca țintă un segment diversificat de clienți și cu un potențial semnificativ de creștere în următorii ani, aceasta se aliniază tendințelor moderne de transport sustenabil, contribuind la reducerea poluării și la îmbunătățirea calității vieții în mediul urban.', '2024-12-09 20:17:41', '2024-12-09 20:18:18'),
(10, 'A treia sectiune', 'Segmentul de piață țintit sunt turiștii, tinerii și localnicii din orașele cu potențial turistic, precum Cahul, care sunt interesați de un mod de transport rapid, ecologic și convenabil. Clienții vor fi în general persoane active, care caută soluții de mobilitate rapidă și ecologică, inclusiv familii și vizitatori ai atracțiilor locale.', '2024-12-09 20:18:01', '2024-12-09 20:18:01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nume`, `email`, `parola`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Alexandru', 'susanu.alexandru@elev.cihcahul.md', '$2y$10$cFg1BnSpwogTVC.1VdCCL.3CFouEdWQ7.a//nejW6XiIvIbHfxuC6', 'admin', '2024-12-09 19:28:09', '2024-12-09 19:28:09'),
(4, 'Alex', 'testemail@gmail.com', '$2y$10$IJQ3XCXune1g7k6Bz17F8uSHc/aveQw5GC1wRNMofWEbwAiWcG5Vm', 'user', '2024-12-09 20:00:07', '2024-12-09 20:00:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
