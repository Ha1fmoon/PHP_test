-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 01 2021 г., 17:16
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `faces`
--

CREATE TABLE `faces` (
  `F_ID` int(11) NOT NULL COMMENT 'Код физ. Лица',
  `FullName` varchar(32) NOT NULL COMMENT 'Полное имя Фамилия + Имя + Отчество',
  `Soname` varchar(32) NOT NULL COMMENT 'Фамилия',
  `Name` varchar(32) NOT NULL COMMENT 'Имя',
  `FathersName` varchar(32) NOT NULL COMMENT 'Отчество',
  `BirthDate` date NOT NULL COMMENT 'Дата рождения',
  `Gender` int(11) NOT NULL COMMENT 'Пол 1 - мужской, 2 - женский'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `faces`
--

INSERT INTO `faces` (`F_ID`, `FullName`, `Soname`, `Name`, `FathersName`, `BirthDate`, `Gender`) VALUES
(1, 'Иванов Иван Иванович', 'Иванов', 'Иван', 'Иванович', '1983-02-11', 1),
(2, 'Иванова Наталья Ивановна', 'Наталья', 'Иванова', 'Ивановна', '1989-11-11', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `faces`
--
ALTER TABLE `faces`
  ADD PRIMARY KEY (`F_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `faces`
--
ALTER TABLE `faces`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код физ. Лица', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
