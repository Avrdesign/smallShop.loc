-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 14 2017 г., 15:44
-- Версия сервера: 5.6.35
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `OrderItem`
--

CREATE TABLE `OrderItem` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `pizzaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `OrderItem`
--

INSERT INTO `OrderItem` (`id`, `count`, `orderId`, `pizzaId`) VALUES
(7, 1, 2, 3),
(8, 1, 2, 4),
(9, 3, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orderTable`
--

CREATE TABLE `orderTable` (
  `orderId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPhone` varchar(16) NOT NULL,
  `userAddress` text NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  `totalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderTable`
--

INSERT INTO `orderTable` (`orderId`, `userName`, `userPhone`, `userAddress`, `dateCreate`, `status`, `totalPrice`) VALUES
(2, 'Дмитрий', '+375295558386', 'Орловского', '2017-08-14 13:37:54', 1, 58);

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prise` float NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `description`, `prise`, `icon`) VALUES
(3, 'Пицца Четыре четверти', 'Фирменный соус на основе томатов, сыр Моцарелла, салями, грудинка, куриное филе, ветчина.', 14, '4684edea3457b14b6bb9d91478435a7a.jpeg'),
(4, 'Пицца Ля Нотте Бианка', 'Фирменный соус на основе томатов, сыр Моцарелла, соус Песто, шампиньоны, репчатый лук, болгарский перец, маслины, оливки, томаты Черри, орегано. ', 14, '2096230f1d5e7b4166a9bca3b232644c.jpeg'),
(5, 'Пицца ', 'томатный соус, сыр Моцарелла, бекон, филе куриное, соус Барбекю, помидоры Черри, приправа к пицце, масло чесночное', 10, 'e65a00371a72b0aa27be86d79f089211.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mtsPhone` int(11) DEFAULT NULL,
  `velcomPhone` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `h1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userId`, `email`, `name`, `password`, `mtsPhone`, `velcomPhone`, `title`, `description`, `h1`) VALUES
(1, 'user@mail.ru', 'Max', 'qwerty', 0, 3213132, 'i want pizza', 'I`m really want pizza', 'Take A Pizza');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `pizzaId` (`pizzaId`);

--
-- Индексы таблицы `orderTable`
--
ALTER TABLE `orderTable`
  ADD PRIMARY KEY (`orderId`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `OrderItem`
--
ALTER TABLE `OrderItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `orderTable`
--
ALTER TABLE `orderTable`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `OrderItem`
--
ALTER TABLE `OrderItem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orderTable` (`orderId`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`pizzaId`) REFERENCES `pizza` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
