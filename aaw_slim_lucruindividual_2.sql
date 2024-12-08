-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 08 2024 г., 20:45
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
-- База данных: `aaw_slim_lucruindividual_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(3, '123331', '1fff', '2024-12-08 18:01:52', '2024-12-08 18:10:36'),
(4, 'Cum să construiești un site web dinamic folosind PHP și MySQL', 'Un site web dinamic este esențial pentru orice aplicație modernă, permițându-le utilizatorilor să interacționeze cu site-ul prin intermediul formularelor, autentificării, și a altor funcționalități personalizabile. În acest articol, vom explora pașii necesari pentru a crea un site web dinamic folosind PHP și MySQL, două tehnologii esențiale în dezvoltarea web.\r\n\r\n1. Ce este un site web dinamic?\r\nUn site web dinamic este un site care își poate modifica conținutul în funcție de interacțiunile utilizatorilor sau de datele stocate într-o bază de date. Spre deosebire de un site static, care rămâne neschimbat indiferent de cine îl vizualizează, un site dinamic permite personalizarea conținutului pe măsură ce utilizatorii interacționează cu el.\r\n\r\n2. Pași pentru construirea unui site dinamic\r\nPentru a crea un site dinamic, vom folosi două tehnologii fundamentale: PHP și MySQL. PHP va gestiona logica aplicației și va procesa formularele, în timp ce MySQL va stoca și gestiona datele utilizatorilor și ale conținutului.\r\n\r\nPasul 1: Crearea bazei de date MySQL\r\nPrimul pas în crearea unui site web dinamic este să construim o bază de date MySQL. Vom crea două tabele: unul pentru utilizatori și unul pentru articole. Iată un exemplu de structură:\r\n\r\nsql\r\nКопировать код\r\nCREATE DATABASE site_dinamic;\r\n\r\nUSE site_dinamic;\r\n\r\nCREATE TABLE users (\r\n    id INT AUTO_INCREMENT PRIMARY KEY,\r\n    username VARCHAR(255) NOT NULL UNIQUE,\r\n    password VARCHAR(255) NOT NULL,\r\n    email VARCHAR(255) NOT NULL UNIQUE,\r\n    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP\r\n);\r\n\r\nCREATE TABLE articles (\r\n    id INT AUTO_INCREMENT PRIMARY KEY,\r\n    title VARCHAR(255) NOT NULL,\r\n    content TEXT NOT NULL,\r\n    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\r\n);\r\nPasul 2: Conectarea la baza de date din PHP\r\nPentru a interacționa cu baza de date, vom folosi PDO (PHP Data Objects), care este o metodă sigură și flexibilă pentru a accesa bazele de date.\r\n\r\nphp\r\nКопировать код\r\n$dsn = \'mysql:host=localhost;dbname=site_dinamic\';\r\n$username = \'root\';\r\n$password = \'\';\r\n$options = [\r\n    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,\r\n    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC\r\n];\r\n\r\ntry {\r\n    $pdo = new PDO($dsn, $username, $password, $options);\r\n} catch (PDOException $e) {\r\n    die(\'Connection failed: \' . $e->getMessage());\r\n}\r\nPasul 3: Crearea unui sistem de autentificare\r\nUnul dintre cele mai importante aspecte ale unui site dinamic este autentificarea utilizatorilor. Vom crea un sistem simplu de login și înregistrare. Parolele vor fi salvate folosind funcția password_hash din PHP pentru a le securiza.\r\n\r\nPasul 4: Crearea unui panou de administrare pentru gestionarea articolelor\r\nAdministratorii vor putea adăuga, edita și șterge articole. Pentru a face acest lucru, vom crea un formular simplu în PHP care va interacționa cu baza de date pentru a salva și actualiza articolele.\r\n\r\nphp\r\nКопировать код\r\nif ($_SERVER[\'REQUEST_METHOD\'] === \'POST\') {\r\n    $title = $_POST[\'title\'];\r\n    $content = $_POST[\'content\'];\r\n\r\n    $stmt = $pdo->prepare(\'INSERT INTO articles (title, content) VALUES (:title, :content)\');\r\n    $stmt->execute([\'title\' => $title, \'content\' => $content]);\r\n\r\n    echo \"Articolul a fost adăugat cu succes!\";\r\n}\r\nPasul 5: Validarea datelor\r\nEste important să validăm datele introduse de utilizatori pentru a preveni erorile și pentru a securiza aplicația. Vom folosi validări de bază pentru câmpurile de formular, dar și măsuri de securitate pentru a preveni atacurile XSS și CSRF.\r\n\r\n3. Concluzie\r\nCrearea unui site web dinamic folosind PHP și MySQL este o abilitate esențială pentru orice dezvoltator web. Cu ajutorul acestui ghid, ar trebui să ai acum o înțelegere mai clară a pașilor necesari pentru a construi un site dinamic care include funcționalități de autentificare și gestionare a conținutului. Această abordare îți permite să creezi aplicații web interactive și personalizabile care să răspundă nevoilor utilizatorilor.\r\n\r\nAșadar, începe să construiești aplicații web dinamic și folosește aceste tehnologii pentru a crea soluții puternice și eficiente!\r\n\r\n', '2024-12-08 18:12:56', '2024-12-08 18:12:56');

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
(1, 'Arnautu Cristian', 'arnautu.cristian@elev.cihcahul.md', '$2y$10$.nuNV.s8tnkiY2kuTw98RegyjfDF4N.pvXjpCvKvNG4IGoCcQIdAe', 'admin', '2024-12-08 16:57:11', '2024-12-08 16:57:11'),
(2, 'Sasa', 'cristi-arnautu12@mail.ru', '$2y$10$M3LLbKFGMhUIrvYjyRnc../CITvBgtZ5LstOA1j8Vk8nmWsI0k7h.', 'user', '2024-12-08 18:03:19', '2024-12-08 18:03:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
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
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
