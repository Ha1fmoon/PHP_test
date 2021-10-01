-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 01 2021 г., 17:17
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
-- Структура таблицы `kids`
--

CREATE TABLE `kids` (
  `K_ID` int(11) NOT NULL COMMENT 'Код ребёнка',
  `F_ID` int(11) NOT NULL COMMENT 'Код физ.Лица',
  `FullName` varchar(32) NOT NULL COMMENT 'Полное имя Фамилия + Имя + Отчество',
  `Soname` varchar(32) NOT NULL COMMENT 'Фамилия',
  `Name` varchar(32) NOT NULL COMMENT 'Имя',
  `FathersName` varchar(32) NOT NULL COMMENT 'Отчество',
  `BirthDate` date NOT NULL COMMENT 'Дата рождения',
  `Gender` int(11) NOT NULL COMMENT 'Пол 1 - мужской, 2 - женский'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kids`
--

INSERT INTO `kids` (`K_ID`, `F_ID`, `FullName`, `Soname`, `Name`, `FathersName`, `BirthDate`, `Gender`) VALUES
(1, 2, 'Иванова Ирина Ивановна', 'Иванова', 'Ирина', 'Ивановна', '2019-02-13', 2),
(2, 2, 'Иванова Мария Ивановна', 'Иванова', 'Мария', 'Ивановна', '2019-02-13', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`K_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kids`
--
ALTER TABLE `kids`
  MODIFY `K_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код ребёнка', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
